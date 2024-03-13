<?php
namespace Jd\Request;

class FopServiceDeliveryOutstockRequest
{

	private $requestInfo = [];
	private $outstockDto = [];
	private $goodsDto = [];


	private $gatewayUser;
	private $customerCode;
	private $customerBillCode;
	private $operator;
	private $sourceSystem;
	private $systemType;
	private $language;

	private $outstockType;
	private $orderType;
	private $scCode;
	private $scOrderNo;
	private $cargoOwnerId;
	private $scOrderCreateTime;
	private $orderAccount;
	private $sellerRemark;
	private $buyerRemark;
	private $receiverName;
	private $receiverCountry;
	private $receiverProvince;
	private $receiverCity;
	private $receiverCounty;
	private $receiverTown;
	private $receiverAddress;
	private $receiverAddress2;
	private $receiverPhone;
	private $receiverMobile;
	private $receiverExtNumber;
	private $receiverMail;
	private $receiverZipCode;
	private $warehouseCode;
	private $expectDate;
	private $receiveType;
	private $wayBillCode;
	private $pdfBase64str;
	private $expressSheetFormat;
	private $otherSheetBase64;
	private $carrierCode;
	private $performanceSpDTOList;
	private $houseNumber;
	private $invoiceNumber;
	private $invoiceDate;
	private $tradeClause;
	private $selfPickUpCode;
	private $level;
	private $billingInfoDTO;
	private $packingListJsonInfo;
	private $ioss;
	private $vat;
	private $eori;
	private $tailShipmentType;
	private $attentionName;
	private $customerOrderType;
	private $ecommercePlatformCode;
	private $pickingTimeMark;
	private $pickingTimeStr;
	private $pickingTimeZone;
	private $transAsn;
	private $collectWaybillCodeFlag;
	private $collectFromStoreNumber;
	private $collectFromStoreName;
	private $thirdAccountType;
	private $thirdAccountInfo;
	private $thirdBillCountry;
	private $thirdBillZipcode;
	private $returnTrackingNo;
	private $returnBillUrl;
	private $distributionCenter;
	private $customerInstockCode;

	public function getApiMethodName()
	{
		return "jingdong.fop.service.deliveryOutstock";
	}

	/**
	 * @throws \Exception
	 */
	public function getApiParams()
	{
		$this->check();

		$outstockDto = $this->outstockDto;
		$outstockDto['goodsDtoList'] = $this->goodsDto;

		return json_encode([$this->requestInfo, $outstockDto]);
	}

	public function check()
	{
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
		if ( ! isset($this->outstockType) ) {
			throw new \Exception('Missing required outstockType parameter');
		}
		if ( ! isset($this->customerBillCode) ) {
			throw new \Exception('Missing required customerBillCode parameter');
		}
		if ( ! isset($this->orderType) ) {
			// Empty OrderType only for RTV outbound
			if ( $this->outstockType != 21 ) {
				throw new \Exception( 'Missing required orderType parameter' );
			}
		} else {
			if ( $this->outstockType == 21 ) {
				throw new \Exception( 'OrderType parameter should be empty for RTV outbound' );
			}
		}

		//if ( ! isset($this->scCode) ) {
		//	throw new \Exception('Missing required scCode parameter');
		//}

		if ( ! isset($this->scOrderNo) ) {
			throw new \Exception('Missing required scOrderNo parameter');
		}

		if ( ! isset($this->cargoOwnerId) ) {
			throw new \Exception('Missing required cargoOwnerId parameter');
		}

		if ( ! isset($this->scOrderCreateTime) ) {
			if ( $this->outstockType != 21 ) {
				throw new \Exception( 'Missing required scOrderCreateTime parameter' );
			}
		}

		if ( ! isset($this->orderAccount) ) {
			throw new \Exception( 'Missing required orderAccount parameter' );
		}

		if ( ! isset($this->receiverName) ) {
			throw new \Exception( 'Missing required receiverName parameter' );
		}

		if ( ! isset($this->receiverCountry) ) {
			throw new \Exception( 'Missing required receiverCountry parameter' );
		}

		if ( ! isset($this->receiverProvince) ) {
			throw new \Exception( 'Missing required receiverProvince parameter' );
		}

		if ( ! isset($this->receiverCity) ) {
			throw new \Exception( 'Missing required receiverCity parameter' );
		}

		if ( ! isset($this->receiverAddress) ) {
			throw new \Exception( 'Missing required receiverAddress parameter' );
		}

		if ( ! isset($this->receiverMobile) ) {
			throw new \Exception( 'Missing required receiverMobile parameter' );
		}

		if ( ! isset($this->receiverZipCode) ) {
			throw new \Exception( 'Missing required receiverZipCode parameter' );
		}

		if ( ! isset($this->warehouseCode) ) {
			throw new \Exception( 'Missing required warehouseCode parameter' );
		}

		if ( empty($this->goodsDto) ) {
			throw new \Exception( 'Missing required order product list' );
		}

		if ( ! isset($this->performanceSpDTOList) ) {
			throw new \Exception( 'Missing required performanceSpDTOList parameter' );
		}

		return true;
	}

	public function putOtherTextParam($key, $value)
	{
		$this->requestInfo[$key] = $value;
		$this->$key              = $value;
	}

	public function setCustomerCode($customerCode)
	{
		$this->customerCode                              = $customerCode;
		$this->requestInfo["customerCode"]               = $customerCode;
		$this->outstockDto["customerCode"] = $customerCode;
	}

	public function getCustomerCode()
	{
		return $this->customerCode;
	}

	public function setCustomerBillCode($customerBillCode)
	{
		$this->customerBillCode                = $customerBillCode;
		$this->outstockDto['customerBillCode'] = $customerBillCode;
	}

	public function getCustomerBillCode()
	{
		return $this->customerBillCode;
	}

	public function setOperator($operator)
	{
		$this->operator                = $operator;
		$this->requestInfo["operator"] = $operator;
	}

	public function getOperator()
	{
		return $this->operator;
	}

	public function setGatewayUser($gatewayUser)
	{
		$this->gatewayUser                = $gatewayUser;
		$this->requestInfo["gatewayUser"] = $gatewayUser;
	}

	public function getGatewayUser()
	{
		return $this->gatewayUser;
	}

	public function setSourceSystem($sourceSystem)
	{
		$this->sourceSystem                = $sourceSystem;
		$this->requestInfo["sourceSystem"] = $sourceSystem;
	}

	public function getSourceSystem()
	{
		return $this->sourceSystem;
	}

	public function setSystemType($systemType)
	{
		$this->systemType                = $systemType;
		$this->requestInfo["systemType"] = $systemType;
	}

	public function getSystemType()
	{
		return $this->systemType;
	}

	public function setLanguage($language)
	{
		$this->language                = $language;
		$this->requestInfo["language"] = $language;
	}

	public function getLanguage()
	{
		return $this->language;
	}


	public function setOutstockType($outstockType)
	{
		$this->outstockType                = $outstockType;
		$this->outstockDto["outstockType"] = $outstockType;
	}

	public function getOutstockType()
	{
		return $this->outstockType;
	}

	public function setOrderType($orderType)
	{
		$this->orderType                = $orderType;
		$this->outstockDto["orderType"] = $orderType;
	}

	public function getOrderType()
	{
		return $this->orderType;
	}

	public function setScCode($scCode)
	{
		$this->scCode                = $scCode;
		$this->outstockDto["scCode"] = $scCode;
	}

	public function getScCode()
	{
		return $this->scCode;
	}

	public function setScOrderNo($scOrderNo)
	{
		$this->scOrderNo                = $scOrderNo;
		$this->outstockDto["scOrderNo"] = $scOrderNo;
	}

	public function getScOrderNo()
	{
		return $this->scOrderNo;
	}

	public function setCargoOwnerId($cargoOwnerId)
	{
		$this->cargoOwnerId                = $cargoOwnerId;
		$this->outstockDto["cargoOwnerId"] = $cargoOwnerId;
	}

	public function getCargoOwnerId()
	{
		return $this->cargoOwnerId;
	}

	public function setScOrderCreateTime($scOrderCreateTime)
	{
		$this->scOrderCreateTime                = $scOrderCreateTime;
		$this->outstockDto["scOrderCreateTime"] = $scOrderCreateTime;
	}

	public function getScOrderCreateTime()
	{
		return $this->scOrderCreateTime;
	}

	public function setOrderAccount($orderAccount)
	{
		$this->orderAccount                = $orderAccount;
		$this->outstockDto["orderAccount"] = $orderAccount;
	}

	public function getOrderAccount()
	{
		return $this->orderAccount;
	}

	public function setSellerRemark($sellerRemark)
	{
		$this->sellerRemark                = $sellerRemark;
		$this->outstockDto["sellerRemark"] = $sellerRemark;
	}

	public function getSellerRemark()
	{
		return $this->sellerRemark;
	}

	public function setBuyerRemark($buyerRemark)
	{
		$this->buyerRemark                = $buyerRemark;
		$this->outstockDto["buyerRemark"] = $buyerRemark;
	}

	public function getBuyerRemark()
	{
		return $this->buyerRemark;
	}

	public function setReceiverName($receiverName)
	{
		$this->receiverName                = $receiverName;
		$this->outstockDto["receiverName"] = $receiverName;
	}

	public function getReceiverName()
	{
		return $this->receiverName;
	}

	public function setReceiverCountry($receiverCountry)
	{
		$this->receiverCountry                = $receiverCountry;
		$this->outstockDto["receiverCountry"] = $receiverCountry;
	}

	public function getReceiverCountry()
	{
		return $this->receiverCountry;
	}

	public function setReceiverProvince($receiverProvince)
	{
		$this->receiverProvince                = $receiverProvince;
		$this->outstockDto["receiverProvince"] = $receiverProvince;
	}

	public function getReceiverProvince()
	{
		return $this->receiverProvince;
	}

	public function setReceiverCity($receiverCity)
	{
		$this->receiverCity                = $receiverCity;
		$this->outstockDto["receiverCity"] = $receiverCity;
	}

	public function getReceiverCity()
	{
		return $this->receiverCity;
	}

	public function setReceiverCounty($receiverCounty)
	{
		$this->receiverCounty                = $receiverCounty;
		$this->outstockDto["receiverCounty"] = $receiverCounty;
	}

	public function getReceiverCounty()
	{
		return $this->receiverCounty;
	}

	public function setReceiverTown($receiverTown)
	{
		$this->receiverTown                = $receiverTown;
		$this->outstockDto["receiverTown"] = $receiverTown;
	}

	public function getReceiverTown()
	{
		return $this->receiverTown;
	}

	public function setReceiverAddress($receiverAddress)
	{
		$this->receiverAddress                = $receiverAddress;
		$this->outstockDto["receiverAddress"] = $receiverAddress;
	}

	public function getReceiverAddress()
	{
		return $this->receiverAddress;
	}

	public function setReceiverAddress2($receiverAddress2)
	{
		$this->receiverAddress2                = $receiverAddress2;
		$this->outstockDto["receiverAddress2"] = $receiverAddress2;
	}

	public function getReceiverAddress2()
	{
		return $this->receiverAddress2;
	}

	public function setReceiverPhone($receiverPhone)
	{
		$this->receiverPhone                = $receiverPhone;
		$this->outstockDto["receiverPhone"] = $receiverPhone;
	}

	public function getReceiverPhone()
	{
		return $this->receiverPhone;
	}

	public function setReceiverMobile($receiverMobile)
	{
		$this->receiverMobile                = $receiverMobile;
		$this->outstockDto["receiverMobile"] = $receiverMobile;
	}

	public function getReceiverMobile()
	{
		return $this->receiverMobile;
	}

	public function setReceiverExtNumber($receiverExtNumber)
	{
		$this->receiverExtNumber                = $receiverExtNumber;
		$this->outstockDto["receiverExtNumber"] = $receiverExtNumber;
	}

	public function getReceiverExtNumber()
	{
		return $this->receiverExtNumber;
	}

	public function setReceiverMail($receiverMail)
	{
		$this->receiverMail                = $receiverMail;
		$this->outstockDto["receiverMail"] = $receiverMail;
	}

	public function getReceiverMail()
	{
		return $this->receiverMail;
	}

	public function setReceiverZipCode($receiverZipCode)
	{
		$this->receiverZipCode                = $receiverZipCode;
		$this->outstockDto["receiverZipCode"] = $receiverZipCode;
	}

	public function getReceiverZipCode()
	{
		return $this->receiverZipCode;
	}

	public function setWarehouseCode($warehouseCode)
	{
		$this->warehouseCode                = $warehouseCode;
		$this->outstockDto["warehouseCode"] = $warehouseCode;
	}

	public function getWarehouseCode()
	{
		return $this->warehouseCode;
	}

	public function setExpectDate($expectDate)
	{
		$this->expectDate                = $expectDate;
		$this->outstockDto["expectDate"] = $expectDate;
	}

	public function getExpectDate()
	{
		return $this->expectDate;
	}

	public function setReceiveType($receiveType)
	{
		$this->receiveType                = $receiveType;
		$this->outstockDto["receiveType"] = $receiveType;
	}

	public function getReceiveType()
	{
		return $this->receiveType;
	}

	public function setWayBillCode($wayBillCode)
	{
		$this->wayBillCode                = $wayBillCode;
		$this->outstockDto["wayBillCode"] = $wayBillCode;
	}

	public function getWayBillCode()
	{
		return $this->wayBillCode;
	}

	public function setPdfBase64str($pdfBase64str)
	{
		$this->pdfBase64str                = $pdfBase64str;
		$this->outstockDto["pdfBase64str"] = $pdfBase64str;
	}

	public function getPdfBase64str()
	{
		return $this->pdfBase64str;
	}

	public function setExpressSheetFormat($expressSheetFormat)
	{
		$this->expressSheetFormat                = $expressSheetFormat;
		$this->outstockDto["expressSheetFormat"] = $expressSheetFormat;
	}

	public function getExpressSheetFormat()
	{
		return $this->expressSheetFormat;
	}

	public function setOtherSheetBase64($otherSheetBase64)
	{
		$this->otherSheetBase64                = $otherSheetBase64;
		$this->outstockDto["otherSheetBase64"] = $otherSheetBase64;
	}

	public function getOtherSheetBase64()
	{
		return $this->otherSheetBase64;
	}

	public function setCarrierCode($carrierCode)
	{
		$this->carrierCode                = $carrierCode;
		$this->outstockDto["carrierCode"] = $carrierCode;
	}

	public function getCarrierCode()
	{
		return $this->carrierCode;
	}

	public function setPerformanceSpDTOList($performanceSpDTOList)
	{
		$this->performanceSpDTOList                = $performanceSpDTOList;
		$this->outstockDto["performanceSpDTOList"] = $performanceSpDTOList;
	}

	public function getPerformanceSpDTOList()
	{
		return $this->performanceSpDTOList;
	}

	public function setHouseNumber($houseNumber)
	{
		$this->houseNumber                = $houseNumber;
		$this->outstockDto["houseNumber"] = $houseNumber;
	}

	public function getHouseNumber()
	{
		return $this->houseNumber;
	}

	public function setInvoiceNumber($invoiceNumber)
	{
		$this->invoiceNumber                = $invoiceNumber;
		$this->outstockDto["invoiceNumber"] = $invoiceNumber;
	}

	public function getInvoiceNumber()
	{
		return $this->invoiceNumber;
	}

	public function setInvoiceDate($invoiceDate)
	{
		$this->invoiceDate                = $invoiceDate;
		$this->outstockDto["invoiceDate"] = $invoiceDate;
	}

	public function getInvoiceDate()
	{
		return $this->invoiceDate;
	}

	public function setTradeClause($tradeClause)
	{
		$this->tradeClause                = $tradeClause;
		$this->outstockDto["tradeClause"] = $tradeClause;
	}

	public function getTradeClause()
	{
		return $this->tradeClause;
	}

	public function setSelfPickUpCode($selfPickUpCode)
	{
		$this->selfPickUpCode                = $selfPickUpCode;
		$this->outstockDto["selfPickUpCode"] = $selfPickUpCode;
	}

	public function getSelfPickUpCode()
	{
		return $this->selfPickUpCode;
	}

	public function setLevel($level)
	{
		$this->level                = $level;
		$this->outstockDto["level"] = $level;
	}

	public function getLevel()
	{
		return $this->level;
	}

	public function setBillingInfoDTO($billingInfoDTO)
	{
		$this->billingInfoDTO                = $billingInfoDTO;
		$this->outstockDto["billingInfoDTO"] = $billingInfoDTO;
	}

	public function getBillingInfoDTO()
	{
		return $this->billingInfoDTO;
	}

	public function setPackingListJsonInfo($packingListJsonInfo)
	{
		$this->packingListJsonInfo                = $packingListJsonInfo;
		$this->outstockDto["packingListJsonInfo"] = $packingListJsonInfo;
	}

	public function getPackingListJsonInfo()
	{
		return $this->packingListJsonInfo;
	}

	public function setIoss($ioss)
	{
		$this->ioss                = $ioss;
		$this->outstockDto["ioss"] = $ioss;
	}

	public function getIoss()
	{
		return $this->ioss;
	}

	public function setVat($vat)
	{
		$this->vat                = $vat;
		$this->outstockDto["vat"] = $vat;
	}

	public function getVat()
	{
		return $this->vat;
	}

	public function setEori($eori)
	{
		$this->eori                = $eori;
		$this->outstockDto["eori"] = $eori;
	}

	public function getEori()
	{
		return $this->eori;
	}

	public function setTailShipmentType($tailShipmentType)
	{
		$this->tailShipmentType                = $tailShipmentType;
		$this->outstockDto["tailShipmentType"] = $tailShipmentType;
	}

	public function getTailShipmentType()
	{
		return $this->tailShipmentType;
	}

	public function setAttentionName($attentionName)
	{
		$this->attentionName                = $attentionName;
		$this->outstockDto["attentionName"] = $attentionName;
	}

	public function getAttentionName()
	{
		return $this->attentionName;
	}

	public function setCustomerOrderType($customerOrderType)
	{
		$this->customerOrderType                = $customerOrderType;
		$this->outstockDto["customerOrderType"] = $customerOrderType;
	}

	public function getCustomerOrderType()
	{
		return $this->customerOrderType;
	}

	public function setEcommercePlatformCode($ecommercePlatformCode)
	{
		$this->ecommercePlatformCode                = $ecommercePlatformCode;
		$this->outstockDto["ecommercePlatformCode"] = $ecommercePlatformCode;
	}

	public function getEcommercePlatformCode()
	{
		return $this->ecommercePlatformCode;
	}

	public function setPickingTimeMark($pickingTimeMark)
	{
		$this->pickingTimeMark                = $pickingTimeMark;
		$this->outstockDto["pickingTimeMark"] = $pickingTimeMark;
	}

	public function getPickingTimeMark()
	{
		return $this->pickingTimeMark;
	}

	public function setPickingTimeStr($pickingTimeStr)
	{
		$this->pickingTimeStr                = $pickingTimeStr;
		$this->outstockDto["pickingTimeStr"] = $pickingTimeStr;
	}

	public function getPickingTimeStr()
	{
		return $this->pickingTimeStr;
	}

	public function setPickingTimeZone($pickingTimeZone)
	{
		$this->pickingTimeZone                = $pickingTimeZone;
		$this->outstockDto["pickingTimeZone"] = $pickingTimeZone;
	}

	public function getPickingTimeZone()
	{
		return $this->pickingTimeZone;
	}

	public function setTransAsn($transAsn)
	{
		$this->transAsn 			  = $transAsn;
		$this->outstockDto["transAsn"] = $transAsn;
	}

	public function getTransAsn()
	{
		return $this->transAsn;
	}

	public function setCollectWaybillCodeFlag($collectWaybillCodeFlag)
	{
		$this->collectWaybillCodeFlag 			  = $collectWaybillCodeFlag;
		$this->outstockDto["collectWaybillCodeFlag"] = $collectWaybillCodeFlag;
	}

	public function getCollectWaybillCodeFlag()
	{
		return $this->collectWaybillCodeFlag;
	}

	public function setCollectFromStoreNumber($collectFromStoreNumber)
	{
		$this->collectFromStoreNumber 			  = $collectFromStoreNumber;
		$this->outstockDto["collectFromStoreNumber"] = $collectFromStoreNumber;
	}

	public function getCollectFromStoreNumber()
	{
		return $this->collectFromStoreNumber;
	}

	public function setCollectFromStoreName($collectFromStoreName)
	{
		$this->collectFromStoreName 			  = $collectFromStoreName;
		$this->outstockDto["collectFromStoreName"] = $collectFromStoreName;
	}

	public function getCollectFromStoreName()
	{
		return $this->collectFromStoreName;
	}

	public function setThirdAccountType($thirdAccountType)
	{
		$this->thirdAccountType 			  = $thirdAccountType;
		$this->outstockDto["thirdAccountType"] = $thirdAccountType;
	}

	public function getThirdAccountType()
	{
		return $this->thirdAccountType;
	}

	public function setThirdAccountInfo($thirdAccountInfo)
	{
		$this->thirdAccountInfo 			  = $thirdAccountInfo;
		$this->outstockDto["thirdAccountInfo"] = $thirdAccountInfo;
	}

	public function getThirdAccountInfo()
	{
		return $this->thirdAccountInfo;
	}

	public function setThirdBillCountry($thirdBillCountry)
	{
		$this->thirdBillCountry 			  = $thirdBillCountry;
		$this->outstockDto["thirdBillCountry"] = $thirdBillCountry;
	}

	public function getThirdBillCountry()
	{
		return $this->thirdBillCountry;
	}

	public function setThirdBillZipcode($thirdBillZipcode)
	{
		$this->thirdBillZipcode 			  = $thirdBillZipcode;
		$this->outstockDto["thirdBillZipcode"] = $thirdBillZipcode;
	}

	public function getThirdBillZipcode()
	{
		return $this->thirdBillZipcode;
	}

	public function setReturnTrackingNo($returnTrackingNo)
	{
		$this->returnTrackingNo 			  = $returnTrackingNo;
		$this->outstockDto["returnTrackingNo"] = $returnTrackingNo;
	}

	public function getReturnTrackingNo()
	{
		return $this->returnTrackingNo;
	}

	public function setReturnBillUrl($returnBillUrl)
	{
		$this->returnBillUrl 			  = $returnBillUrl;
		$this->outstockDto["returnBillUrl"] = $returnBillUrl;
	}

	public function getReturnBillUrl()
	{
		return $this->returnBillUrl;
	}

	public function setDistributionCenter($distributionCenter)
	{
		$this->distributionCenter 			  = $distributionCenter;
		$this->outstockDto["distributionCenter"] = $distributionCenter;
	}

	public function getDistributionCenter()
	{
		return $this->distributionCenter;
	}

	public function setCustomerInstockCode($customerInstockCode)
	{
		$this->customerInstockCode 			  = $customerInstockCode;
		$this->outstockDto["customerInstockCode"] = $customerInstockCode;
	}

	public function getCustomerInstockCode()
	{
		return $this->customerInstockCode;
	}

	public function getGoodsDto()
	{
		return $this->goodsDto;
	}

	public function addOutstockGoodsLine($sku, $num, $outUnit, $price=null, $currency=null, $productType=null, $batchAttrDtoList=null)
	{
		$row = [
			'sku' => $sku,
			'num' => $num,
			'outUnit' => $outUnit,
		];

		if ( ! empty($price) ) {
			$row['price'] = $price;
		}

		if ( ! empty($currency) ) {
			$row['currency'] = $currency;
		}

		if ( ! empty($productType) ) {
			$row['productType'] = $productType;
		}

		if ( ! empty($batchAttrDtoList) ) {
			$row['batchAttrDtoList'] = $batchAttrDtoList;
		}

		$this->goodsDto[] = $row;
	}


}
