<?php
namespace Jd\request;

class SellerVenderInfoGetRequest
{
    private $apiParams = array();
    private $extJsonParam;

    public function getApiMethodName()
    {
        return "jingdong.seller.vender.info.get";
    }

    public function getApiParams()
    {
        return json_encode(new \stdClass());
    }

    public function check()
    {
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParams[$key] = $value;
        $this->$key = $value;
    }

    public function setExtJsonParam($extJsonParam)
    {
        $this->extJsonParam = $extJsonParam;
        $this->apiParams["ext_json_param"] = $extJsonParam;
    }

    public function getExtJsonParam()
    {
        return $this->extJsonParam;
    }
}
