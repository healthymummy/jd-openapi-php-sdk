<?php
namespace Jd\request;

class AscQueryListRequest
{
    private $apiParams = array();
    private $buId;
    private $operatePin;
    private $operateNick;
    private $serviceId;
    private $orderId;
    private $applyTimeBegin;
    private $applyTimeEnd;
    private $finishTimeBegin;
    private $finishTimeEnd;
    private $verificationCode;
    private $expressCode;
    private $orderType;
    private $processResult;
    private $customerPin;
    private $customerName;
    private $customerTel;
    private $approveTimeBegin;
    private $approveTimeEnd;
    private $pageSize;
    private $extJsonStr;
    private $pageNumber;

    public function getApiMethodName()
    {
        return "jingdong.asc.query.list";
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

    public function setBuId($buId)
    {
        $this->buId = $buId;
        $this->apiParams["buId"] = $buId;
    }

    public function getBuId()
    {
        return $this->buId;
    }

    public function setOperatePin($operatePin)
    {
        $this->operatePin = $operatePin;
        $this->apiParams["operatePin"] = $operatePin;
    }

    public function getOperatePin()
    {
        return $this->operatePin;
    }

    public function setOperateNick($operateNick)
    {
        $this->operateNick = $operateNick;
        $this->apiParams["operateNick"] = $operateNick;
    }

    public function getOperateNick()
    {
        return $this->operateNick;
    }

    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->apiParams["serviceId"] = $serviceId;
    }

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        $this->apiParams["orderId"] = $orderId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setApplyTimeBegin($applyTimeBegin)
    {
        $this->applyTimeBegin = $applyTimeBegin;
        $this->apiParams["applyTimeBegin"] = $applyTimeBegin;
    }

    public function getApplyTimeBegin()
    {
        return $this->applyTimeBegin;
    }

    public function setApplyTimeEnd($applyTimeEnd)
    {
        $this->applyTimeEnd = $applyTimeEnd;
        $this->apiParams["applyTimeEnd"] = $applyTimeEnd;
    }

    public function getApplyTimeEnd()
    {
        return $this->applyTimeEnd;
    }

    public function setFinishTimeBegin($finishTimeBegin)
    {
        $this->finishTimeBegin = $finishTimeBegin;
        $this->apiParams["finishTimeBegin"] = $finishTimeBegin;
    }

    public function getFinishTimeBegin()
    {
        return $this->finishTimeBegin;
    }

    public function setFinishTimeEnd($finishTimeEnd)
    {
        $this->finishTimeEnd = $finishTimeEnd;
        $this->apiParams["finishTimeEnd"] = $finishTimeEnd;
    }

    public function getFinishTimeEnd()
    {
        return $this->finishTimeEnd;
    }

    public function setVerificationCode($verificationCode)
    {
        $this->verificationCode = $verificationCode;
        $this->apiParams["verificationCode"] = $verificationCode;
    }

    public function getVerificationCode()
    {
        return $this->verificationCode;
    }

    public function setExpressCode($expressCode)
    {
        $this->expressCode = $expressCode;
        $this->apiParams["expressCode"] = $expressCode;
    }

    public function getExpressCode()
    {
        return $this->expressCode;
    }

    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;
        $this->apiParams["orderType"] = $orderType;
    }

    public function getOrderType()
    {
        return $this->orderType;
    }

    public function setProcessResult($processResult)
    {
        $this->processResult = $processResult;
        $this->apiParams["processResult"] = $processResult;
    }

    public function getProcessResult()
    {
        return $this->processResult;
    }

    public function setCustomerPin($customerPin)
    {
        $this->customerPin = $customerPin;
        $this->apiParams["customerPin"] = $customerPin;
    }

    public function getCustomerPin()
    {
        return $this->customerPin;
    }

    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        $this->apiParams["customerName"] = $customerName;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }

    public function setCustomerTel($customerTel)
    {
        $this->customerTel = $customerTel;
        $this->apiParams["customerTel"] = $customerTel;
    }

    public function getCustomerTel()
    {
        return $this->customerTel;
    }

    public function setApproveTimeBegin($approveTimeBegin)
    {
        $this->approveTimeBegin = $approveTimeBegin;
        $this->apiParams["approveTimeBegin"] = $approveTimeBegin;
    }

    public function getApproveTimeBegin()
    {
        return $this->approveTimeBegin;
    }

    public function setApproveTimeEnd($approveTimeEnd)
    {
        $this->approveTimeEnd = $approveTimeEnd;
        $this->apiParams["approveTimeEnd"] = $approveTimeEnd;
    }

    public function getApproveTimeEnd()
    {
        return $this->approveTimeEnd;
    }

    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        $this->apiParams["pageNumber"] = $pageNumber;
    }

    public function getPageNumber()
    {
        return $this->pageNumber;
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

    public function setExtJsonStr($extJsonStr)
    {
        $this->extJsonStr = $extJsonStr;
        $this->apiParams["extJsonStr"] = $extJsonStr;
    }

    public function getExtJsonStr()
    {
        return $this->extJsonStr;
    }
}
