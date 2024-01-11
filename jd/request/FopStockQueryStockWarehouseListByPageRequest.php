<?php
namespace Jd\request;

class FopStockQueryStockWarehouseListByPageRequest
{
    private $apiParas = array();
    private $pin;
    private $loadType;

    public function getApiMethodName()
    {
        return "jingdong.fop.stock.queryStockWarehouseListByPage";
    }

    public function getApiParas()
    {
        return json_encode($this->apiParas);
    }

    public function check()
    {
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

    public function setPin($pin)
    {
        $this->pin = $pin;
        $this->apiParas["pin"] = $pin;
    }

    public function getPin()
    {
        return $this->pin;
    }


    public function setLoadType($loadType)
    {
        $this->loadType = $loadType;
        $this->apiParas["loadType"] = $loadType;
    }

    public function getLoadType()
    {
        return $this->loadType;
    }
}
