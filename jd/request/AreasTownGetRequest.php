<?php
namespace Jd\request;

class AreasTownGetRequest
{
    private $apiParams = array();
    private $parentId;

    public function getApiMethodName()
    {
      return "jingdong.areas.town.get";
    }

    public function getApiParams()
    {
        return json_encode($this->apiParams);
    }

    public function check(){

    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParams[$key] = $value;
        $this->$key = $value;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        $this->apiParams["parent_id"] = $parentId;
    }

    public function getParentId()
    {
        return $this->parentId;
    }
}
