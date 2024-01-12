<?php
namespace Jd\request;

class VenderShopQueryRequest
{
    private $apiParams = array();

    public function getApiMethodName()
    {
        return "jingdong.vender.shop.query";
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
}
