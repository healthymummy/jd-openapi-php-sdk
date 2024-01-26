<?php
namespace Jd\Request;

class FopOutstockQueryOutStockListRequest {
	private $fopRequestHeader = [];
	private $outStockPageQueryDto = [];


	private $gatewayUser;
	private $customerCode;
	private $customerBillCode;
	private $operator;
	private $sourceSystem;
	private $systemType;
	private $language;


	private $page;
	private $pageSize;
	private $updateTimeStart;
	private $updateTimeEnd;
	private $code;
	private $serviceBillCode;
	private $warehouseCode;
	private $status;
	private $createTimeStart;
	private $createTimeEnd;
	private $scOrderCreateTimeStart;
	private $scOrderCreateTimeEnd;

	public function getApiMethodName() {
		return "jingdong.fop.outstock.queryOutStockList";
	}

	public function getApiParams() {
		$this->check();

		$fopRequestHeader = empty($this->fopRequestHeader) ? new \stdClass() : $this->fopRequestHeader;
		$outStockPageQueryDto = empty($this->outStockPageQueryDto) ? new \stdClass() : $this->outStockPageQueryDto;

		return json_encode([$fopRequestHeader, $outStockPageQueryDto]);
	}

	public function check() {
		if ( ! isset($this->gatewayUser) ) {
			throw new \Exception('Missing required gatewayUser parameter');
		}
		if (! isset($this->customerCode) ) {
			throw new \Exception('Missing required customerCode parameter');
		}
		if ( ! isset($this->operator) ) {
			throw new \Exception('Missing required operator parameter');
		}
		if ( ! isset( $this->sourceSystem) ) {
			throw new \Exception('Missing required sourceSystem parameter');
		}
		if ( ! isset ($this->systemType) ) {
			throw new \Exception('Missing required systemType parameter');
		}


		if (! empty( $this->pageInfo) && ( empty($this->page) || empty($this->pageSize))) {
			throw new \Exception('Missing required page parameter');
		}
		if ( ! isset ($this->updateTimeStart) ) {
			throw new \Exception('Missing required updateTimeStart parameter');
		}
		if ( ! isset ($this->updateTimeEnd) ) {
			throw new \Exception('Missing required updateTimeEnd parameter');
		}
		if ( ! isset ($this->warehouseCode) ) {
			throw new \Exception('Missing required warehouseCode parameter');
		}

		return true;
	}

	public function putOtherTextParam( $key, $value ) {
		$this->apiParams[ $key ] = $value;
		$this->$key              = $value;
	}

	public function setGatewayUser($gatewayUser)
	{
		$this->gatewayUser                     = $gatewayUser;
		$this->fopRequestHeader["gatewayUser"] = $gatewayUser;
	}

	public function getGatewayUser()
	{
		return $this->gatewayUser;
	}

	public function setCustomerCode($customerCode)
	{
		$this->customerCode                     = $customerCode;
		$this->fopRequestHeader["customerCode"] = $customerCode;
		$this->outStockPageQueryDto["customerCode"] = $customerCode;
	}

	public function getCustomerCode()
	{
		return $this->customerCode;
	}

	public function setCustomerBillCode($customerBillCode)
	{
		$this->customerBillCode                     = $customerBillCode;
		$this->fopRequestHeader["customerBillCode"] = $customerBillCode;
		$this->outStockPageQueryDto["customerBillCode"] = $customerBillCode;
	}

	public function getCustomerBillCode()
	{
		return $this->customerBillCode;
	}

	public function setOperator($operator)
	{
		$this->operator                     = $operator;
		$this->fopRequestHeader["operator"] = $operator;
	}

	public function getOperator()
	{
		return $this->operator;
	}


	public function setSourceSystem($sourceSystem)
	{
		$this->sourceSystem                     = $sourceSystem;
		$this->fopRequestHeader["sourceSystem"] = $sourceSystem;
	}

	public function getSourceSystem()
	{
		return $this->sourceSystem;
	}

	public function setSystemType($systemType)
	{
		$this->systemType                     = $systemType;
		$this->fopRequestHeader["systemType"] = $systemType;
	}

	public function getSystemType()
	{
		return $this->systemType;
	}

	public function setLanguage($language)
	{
		$this->language                     = $language;
		$this->fopRequestHeader["language"] = $language;
	}

	public function getLanguage()
	{
		return $this->language;
	}


	public function setPage($page)
	{
		$this->page             = $page;
		$this->outStockPageQueryDto["page"] = $page;
	}

	public function getPage()
	{
		return $this->page;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize             = $pageSize;
		$this->outStockPageQueryDto["pageSize"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function setUpdateTimeStart($updateTimeStart)
	{
		$this->updateTimeStart                     = $updateTimeStart;
		$this->outStockPageQueryDto["updateTimeStart"] = $updateTimeStart;
	}

	public function getUpdateTimeStart()
	{
		return $this->updateTimeStart;
	}

	public function setUpdateTimeEnd($updateTimeEnd)
	{
		$this->updateTimeEnd                     = $updateTimeEnd;
		$this->outStockPageQueryDto["updateTimeEnd"] = $updateTimeEnd;
	}

	public function getUpdateTimeEnd()
	{
		return $this->updateTimeEnd;
	}

	public function setCode($code)
	{
		$this->code                     = $code;
		$this->outStockPageQueryDto["code"] = $code;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function setServiceBillCode($serviceBillCode)
	{
		$this->serviceBillCode                     = $serviceBillCode;
		$this->outStockPageQueryDto["serviceBillCode"] = $serviceBillCode;
	}

	public function getServiceBillCode()
	{
		return $this->serviceBillCode;
	}

	public function setWarehouseCode($warehouseCode)
	{
		$this->warehouseCode                     = $warehouseCode;
		$this->outStockPageQueryDto["warehouseCode"] = $warehouseCode;
	}

	public function getWarehouseCode()
	{
		return $this->warehouseCode;
	}

	public function setStatus($status)
	{
		$this->status                     = $status;
		$this->outStockPageQueryDto["status"] = $status;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setCreateTimeStart($createTimeStart)
	{
		$this->createTimeStart                     = $createTimeStart;
		$this->outStockPageQueryDto["createTimeStart"] = $createTimeStart;
	}

	public function getCreateTimeStart()
	{
		return $this->createTimeStart;
	}

	public function setCreateTimeEnd($createTimeEnd)
	{
		$this->createTimeEnd                     = $createTimeEnd;
		$this->outStockPageQueryDto["createTimeEnd"] = $createTimeEnd;
	}

	public function getCreateTimeEnd()
	{
		return $this->createTimeEnd;
	}

	public function setScOrderCreateTimeStart($scOrderCreateTimeStart)
	{
		$this->scOrderCreateTimeStart                     = $scOrderCreateTimeStart;
		$this->outStockPageQueryDto["scOrderCreateTimeStart"] = $scOrderCreateTimeStart;
	}

	public function getScOrderCreateTimeStart()
	{
		return $this->scOrderCreateTimeStart;
	}

	public function setScOrderCreateTimeEnd($scOrderCreateTimeEnd)
	{
		$this->scOrderCreateTimeEnd                     = $scOrderCreateTimeEnd;
		$this->outStockPageQueryDto["scOrderCreateTimeEnd"] = $scOrderCreateTimeEnd;
	}

	public function getScOrderCreateTimeEnd()
	{
		return $this->scOrderCreateTimeEnd;
	}
	

}