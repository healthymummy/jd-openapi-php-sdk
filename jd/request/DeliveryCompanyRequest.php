<?php
namespace Jd\request;

class DeliveryCompanyRequest
{
    private $apiParams = array();
    private $fields;

    public function getApiMethodName()
    {
        return "360buy.get.vender.all.delivery.company";
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

    public function setFields($fields)
    {
        $this->fields = $fields;
        $this->apiParams["fields"] = $fields;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
