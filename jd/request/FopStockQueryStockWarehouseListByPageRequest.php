<?php
namespace Jd\request;

class FopStockQueryStockWarehouseListByPageRequest {
	private $fopRequestHeader = [];
	private $pageInfo = [];
	private $stockWarehouseReqDto = [];


	private $customerCode;
	private $customerBillCode;
	private $operator;
	private $gatewayUser;
	private $sourceSystem;
	private $systemType;
	private $language;
	private $page;
	private $pageSize;
	private $goodsCode;
	private $sku;
	private $cargoOwnerId;
	private $warehouseCode;
	public function getApiMethodName() {
		return "jingdong.fop.stock.queryStockWarehouseListByPage";
	}

	public function getApiParams() {
		$this->check();

		$fopRequestHeader = empty($this->fopRequestHeader) ? new \stdClass() : $this->fopRequestHeader;
		$pageInfo = empty($this->pageInfo) ? new \stdClass() : $this->pageInfo;
		$stockWarehouseReqDto = empty($this->stockWarehouseReqDto) ? new \stdClass() : $this->stockWarehouseReqDto;

		return json_encode([$fopRequestHeader, $pageInfo, $stockWarehouseReqDto]);
	}

	public function check() {
		if (! isset($this->customerCode) ) {
			throw new \Exception('Missing required customerCode parameter');
		}
		if ( ! isset($this->operator) ) {
			throw new \Exception('Missing required operator parameter');
		}
		if ( ! isset($this->gatewayUser) ) {
			throw new \Exception('Missing required gatewayUser parameter');
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
		return true;
	}

	public function putOtherTextParam( $key, $value ) {
		$this->apiParams[ $key ] = $value;
		$this->$key              = $value;
	}

	public function setCustomerCode($customerCode)
	{
		$this->customerCode                     = $customerCode;
		$this->fopRequestHeader["customerCode"] = $customerCode;
		$this->stockWarehouseReqDto["customerCode"] = $customerCode;
	}

	public function getCustomerCode()
	{
		return $this->customerCode;
	}

	public function setCustomerBillCode($customerBillCode)
	{
		$this->customerBillCode                     = $customerBillCode;
		$this->fopRequestHeader["customerBillCode"] = $customerBillCode;
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

	public function setGatewayUser($gatewayUser)
	{
		$this->gatewayUser                     = $gatewayUser;
		$this->fopRequestHeader["gatewayUser"] = $gatewayUser;
	}

	public function getGatewayUser()
	{
		return $this->gatewayUser;
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
		$this->pageInfo["page"] = $page;
	}

	public function getPage()
	{
		return $this->page;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize             = $pageSize;
		$this->pageInfo["pageSize"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function setGoodsCode($goodsCode)
	{
		$this->goodsCode                     = $goodsCode;
		$this->stockWarehouseReqDto["goodsCode"] = $goodsCode;
	}

	public function getGoodsCode()
	{
		return $this->goodsCode;
	}

	public function setSku($sku)
	{
		$this->sku                     = $sku;
		$this->stockWarehouseReqDto["sku"] = $sku;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function setCargoOwnerId($cargoOwnerId)
	{
		$this->cargoOwnerId                     = $cargoOwnerId;
		$this->stockWarehouseReqDto["cargoOwnerId"] = $cargoOwnerId;
	}

	public function getCargoOwnerId()
	{
		return $this->cargoOwnerId;
	}

	public function setWarehouseCode($warehouseCode)
	{
		$this->warehouseCode                     = $warehouseCode;
		$this->stockWarehouseReqDto["warehouseCode"] = $warehouseCode;
	}

	public function getWarehouseCode()
	{
		return $this->warehouseCode;
	}

}