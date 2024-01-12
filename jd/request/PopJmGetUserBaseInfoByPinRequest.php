<?php
namespace Jd\request;

class PopJmGetUserBaseInfoByPinRequest
{
    private $apiParams = array();
    private $pin;
    private $loadType;

    public function getApiMethodName()
    {
        return "jingdong.pop.jm.getUserBaseInfoByPin";
    }

    public function getApiParams()
    {
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

    public function setPin($pin)
    {
        $this->pin = $pin;
        $this->apiParams["pin"] = $pin;
    }

    public function getPin()
    {
        return $this->pin;
    }


    public function setLoadType($loadType)
    {
        $this->loadType = $loadType;
        $this->apiParams["loadType"] = $loadType;
    }

    public function getLoadType()
    {
        return $this->loadType;
    }
}
