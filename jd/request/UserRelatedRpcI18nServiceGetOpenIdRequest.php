<?php
namespace Jd\request;

class UserRelatedRpcI18nServiceGetOpenIdRequest
{
    private $apiParams = array();
    private $version;
    private $pin;

    public function getApiMethodName()
    {
        return 'jingdong.UserRelatedRpcI18nService.getOpenId';
    }

    public function getApiParams()
    {
        if (empty($this->apiParams)) {
            return '{}';
        }
        return json_encode($this->apiParams);
    }

    public function check()
    {
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParams[$key] = $value;
        $this->$key = $value;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setPin($pin)
    {
        $this->pin = $pin;
        $this->apiParams['pin'] = $pin;
    }

    public function getPin()
    {
        return $this->pin;
    }
}
