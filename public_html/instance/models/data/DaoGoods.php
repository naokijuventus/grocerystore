<?php

class DaoGoods extends ModelBase{
	
	protected $name;
	protected $array;
	protected $category;
	protected $detail;
	
    public function searchItems($category, $detail){
		$sql = "SELECT GOODS_ID, GOODS_NAME, PRICE, NOTE, CATEGORY, DETAIL, FOLDER
				  FROM GOODS 
				  WHERE CATEGORY = :CATEGORY 
				    AND DETAIL = :DETAIL";
		$array = array(
			"CATEGORY" => $category,
			"DETAIL" => $detail
		);
		$result = $this->query($sql, $array);
		return $result;
    }
	
	public function getPrice($goods_id){

		$sql = "SELECT PRICE,FOLDER
				  FROM GOODS 
				  WHERE GOODS_ID = :GOODS_ID";
		$array = array(
			"GOODS_ID" => $goods_id,
		);
		$result = $this->query($sql, $array);
		return $result;
    }
	
	public function getGoodsName($goods_id){

		$sql = "SELECT GOODS_NAME
				  FROM GOODS 
				  WHERE GOODS_ID = :GOODS_ID";
		$array = array(
			"GOODS_ID" => $goods_id
		);
		$result = $this->query($sql, $array);
		return $result;
    }
}

?>