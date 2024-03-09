<?php
namespace Jd;

use \Exception;

class JdClient
{
    public $debug = false;
    public $serverUrl = "https://api.jd.com/routerjson";
    public $accessToken;
    public $connectTimeout = 0;
    public $readTimeout = 0;
    public $appKey;
    public $appSecret;
    public $version = "2.0";
    public $format = "json";
    private $charset_utf8 = "UTF-8";
    private $json_param_key = "param_json";

    protected function generateSign($params)
    {
        ksort($params);
        $stringToBeSigned = $this->appSecret;
        foreach ($params as $k => $v) {
            if("@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        $stringToBeSigned .= $this->appSecret;
        return strtoupper(md5($stringToBeSigned));
    }

    public function curl($url, $postFields = null)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json;charset='utf-8'"]);
        if ($this->readTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
        }
        if ($this->connectTimeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        }
        //https request
        if( str_starts_with( $url,"https" ) ) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        if (! empty( $postFields ) ) {
            //curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        }
        if ( $this->debug ) {
			echo "Sending request: \n";
            echo "URL: " . $url . "\n";
			echo "POST: ";
			print_r($postFields);
			echo "\n\n";
        }

        $response = curl_exec($ch);
        $this->recordAccessOutLog($ch, 'POST', $url, $response, $postFields, ['logResponse' => true]);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }

    public function execute($request, $access_token = null)
    {
        // Setting system parameters
	    $sysParams["method"] = $request->getApiMethodName();
	    if (null != $access_token) {
		    $sysParams["access_token"] = $access_token;
	    }
	    $sysParams["app_key"] = $this->appKey;
	    $sysParams["timestamp"] = date("Y-m-d H:i:s");
	    $sysParams["v"] = $this->version;

        // Getting service parameters
        $apiParams = $request->getApiParams();

        // Signature
	    $signature = $this->generateSign(array_merge($sysParams, ['param_json' => $apiParams] ) );
		$newSysParams = [];
		foreach ($sysParams as $sysParamKey => $sysParamValue) {
			if ($sysParamKey === 'timestamp') {
				$newSysParams['sign'] = $signature;
			}
			$newSysParams[$sysParamKey] = $sysParamValue;
		}
		$sysParams = $newSysParams;

	    // System parameters are put into the GET request string

	    $requestUrl = $this->serverUrl;

        foreach ($sysParams as $sysParamKey => $sysParamValue) {
	        if (strpos($requestUrl, '?') !== false) {
		        $requestUrl .= "&";
	        } else {
		        $requestUrl .= "?";
	        }
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue);
        }
        // Make an HTTP request
        try {
            $resp = $this->curl($requestUrl, $apiParams);
        } catch (Exception $e) {
			$result = new \stdClass();
            $result->code = $e->getCode();
            $result->msg = $e->getMessage();
            return $result;
        }

        // Parsing results returned by JD
        $respWellFormed = false;
        if ("json" == $this->format) {
            $respObject = json_decode($resp, true);
            if (null !== $respObject) {
                $respWellFormed = true;
                foreach ($respObject as $propKey => $propValue) {
                    $respObject = $propValue;
                }
            }
        } else if("xml" == $this->format) {
            $respObject = @simplexml_load_string($resp);
            if (false !== $respObject) {
                $respWellFormed = true;
            }
        }

        // The returned HTTP text is not standard JSON or XML. Write down the error log.
        if (false === $respWellFormed) {
			$result = new \stdClass();
            $result->code = 0;
            $result->msg = "HTTP_RESPONSE_NOT_WELL_FORMED";
            return $result;
        }

        return $respObject;
    }

	private function camelize($uncamelized_words, $separator = '_')
	{
		$uncamelized_words = $separator . str_replace($separator , " ", $uncamelized_words);
		return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator );
	}

    public function exec($paramsArray, $attachRequestToResponse = false)
    {
        if (!isset($paramsArray["method"])) {
            trigger_error("No api name passed");
        }

        $requestClassName = '\\Jd\\Request\\'.ucfirst($this->camelize(substr($paramsArray["method"], 8), ".")) . "Request";
        if (!class_exists($requestClassName)) {
            trigger_error("No such api: " . $paramsArray["method"]);
        }

        $session = isset($paramsArray["session"]) ? $paramsArray["session"] : $this->accessToken;

        $req = new $requestClassName;
        foreach($paramsArray as $paraKey => $paraValue)
        {
	        $setterMethodName = $this->camelize($paraKey, "_");
            $setterMethodName = "set" . $this->camelize($setterMethodName, ".");
            if (method_exists($req, $setterMethodName)) {
                $req->$setterMethodName($paraValue);
            } else {
	            $setterMethodName = $this->camelize($paraKey, "_");
				$setterMethodName =  $this->camelize('add.' . $setterMethodName, ".") . 'Line';
				if (method_exists($req, $setterMethodName)) {
					foreach( $paraValue as $rowParaValue ) {
						call_user_func_array( [$req, $setterMethodName], $rowParaValue );
					}
				}
            }
        }
        $result = $this->execute($req, $session);

		if ( $attachRequestToResponse && is_array( $result ) ) {
			$result['request'] = array_merge ([$req->getApiMethodName()], json_decode( $req->getApiParams(), true));
		}

		return $result;
    }

    private function recordAccessOutLog($ch, $method, $url, $content, $params, $options = [])
    {
        // If you are running a test case, skip it directly.
        if (defined("YII_ENV") && YII_ENV == 'test') {
            return true;
        }

        $info = curl_getinfo($ch);
        $message = [
            'type' => 'accessOut',
            'remoteAddr' => $info['primary_ip'],
            'reqId' => defined('REQUEST_ID') ? REQUEST_ID : '00000000-0000-0000-0000-000000000000',
            'scheme' => parse_url($url, PHP_URL_SCHEME),
            'host' => parse_url($url, PHP_URL_HOST),
            'port' => $info['primary_port'],
            'method' => $method,
            'url' => substr($url, strpos($url, parse_url($url, PHP_URL_PATH))),
            'responseStatus' => $info['http_code'],
            'responseTime' => floor($info['total_time'] * 1000), // Unit: milliseconds
            'others' => [
                'contentType' => $info['content_type'],
                'namelookupTime' => floor($info['namelookup_time'] * 1000),
                'connectTime' => floor($info['connect_time'] * 1000),
                'pretransferTime' => floor($info['pretransfer_time'] * 1000),
                'starttransferTime' => floor($info['starttransfer_time'] * 1000),
            ],
        ];

        if (!empty($params) && in_array($method, ['POST', 'PUT'])) {
            $message['body'] = $params;
        }

        if (isset($options['logResponse']) && $options['logResponse']) {
            $message['others']['responseBody'] = $content;
        }

		$encodedMessage = json_encode($message) . "\n";

        if (defined('DISABLE_ACCESS_OUT_LOG')) {
			if (class_exists("Yii")) {
				$logFile = \Yii::$app->getRuntimePath() . '/logs/access-out.log';
			} else {
				$logFile = defined('JD_ACCESS_OUT_LOG_FILE') ? JD_ACCESS_OUT_LOG_FILE : '';
			}
            $logPath = dirname($logFile);
            if (!is_dir($logPath)) {
                if ( ! mkdir( $logPath, 0775, true ) && ! is_dir( $logPath ) ) {
                    throw new \RuntimeException( sprintf( 'Directory "%s" was not created', $logPath ) );
                }
            }
            $text = '[' . date('Y-m-d H:i:s', time()) . ']' . $encodedMessage;
            $file = fopen($logFile, 'a');
            fwrite($file, $text);
            fclose($file);

            return true;
        }

        if (PHP_SAPI === 'cli') {
            echo $encodedMessage;
        } else {
            error_log($encodedMessage);
        }

        return true;
    }
}
