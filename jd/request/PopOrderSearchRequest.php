<?php
namespace Jd\request;

class PopOrderSearchRequest
{
    private $apiParams = array();
    private $startDate;
    private $endDate;
    private $orderState;
    private $optionalFields;
    private $page;
    private $pageSize;
    private $sortType;
    private $dateType;

    public function getApiMethodName()
    {
        return "jingdong.pop.order.search";
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

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        $this->apiParams["start_date"] = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }


    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        $this->apiParams["end_date"] = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setOrderState($orderState)
    {
        $this->orderState = $orderState;
        $this->apiParams["order_state"] = $orderState;
    }

    public function getOrderState()
    {
        return $this->orderState;
    }

    public function setOptionalFields($optionalFields)
    {
        $this->optionalFields = $optionalFields;
        $this->apiParams["optional_fields"] = $optionalFields;
    }

    public function getOptionalFields()
    {
        return $this->optionalFields;
    }

    public function setPage($page)
    {
        $this->page = $page;
        $this->apiParams["page"] = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        $this->apiParams["page_size"] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setSortType($sortType)
    {
        $this->sortType = $sortType;
        $this->apiParams["sortType"] = $sortType;
    }

    public function getSortType()
    {
        return $this->sortType;
    }

    public function setDateType($dateType)
    {
        $this->dateType = $dateType;
        $this->apiParams["dateType"] = $dateType;
    }

    public function getDateType()
    {
        return $this->dateType;
    }
}
