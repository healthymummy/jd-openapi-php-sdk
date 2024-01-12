<?php
namespace Jd\request;

class PopOrderNotPayOrderInfoRequest
{
    private $apiParams = array();
    private $startDate;
    private $endDate;
    private $page;
    private $pageSize;

    public function getApiMethodName()
    {
        return "jingdong.pop.order.notPayOrderInfo";
    }

    public function getApiParams()
    {
        return json_encode($this->apiParams);
    }

    public function check()
    {}

    public function putOtherTextParam($key, $value)
    {
        $this->apiParams[$key] = $value;
        $this->$key = $value;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        $this->apiParams["startDate"] = $startDate;
    }

    public function getStartDate()
    {
      return $this->startDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        $this->apiParams["endDate"] = $endDate;
    }

    public function getEndDate()
    {
      return $this->endDate;
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
        $this->apiParams["pageSize"] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }
}
