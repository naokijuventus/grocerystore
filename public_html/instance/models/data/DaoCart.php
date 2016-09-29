<?php

class DaoCart extends ModelBase{
	
	protected $array;
	
    public function addCart($goods_id,$id,$number,$sum){
	
		$now = date('Y/m/d H:i:s');
		$this->name = 'CART';
		$array = array(
			"GOODS_ID" => $goods_id,
			"ID" => $id,
			"NUMBER" => $number,
			"SUM" => $sum,
			"UPDDT" => $now,
			"REGDT" => $now
		);
		$this->insert($array);
    }
	
	public function getCart($id){

		$sql = "SELECT CART.GOODS_ID AS GOODS_ID
					  ,GOODS.GOODS_NAME AS GOODS_NAME
					  ,GOODS.PRICE AS PRICE
					  ,SUM(CART.NUMBER) AS AMOUNT
					  ,(GOODS.PRICE * SUM(CART.NUMBER)) AS SUM
					  ,GOODS.FOLDER AS FOLDER
				FROM CART
		  INNER JOIN GOODS 
				  ON CART.GOODS_ID = GOODS.GOODS_ID 
				 AND CART.ID = :ID
				 GROUP BY CART.GOODS_ID
				 ORDER BY CART.GOODS_ID ASC";
		
		$array = array(
			"ID" => $id
		);
		$result = $this->query($sql, $array);
		return $result;
    }
	
	public function deleteGoods($goods_id, $id){
	
		$this->name = 'CART';
		
		$where = 'GOODS_ID = :GOODS_ID AND ID = :ID';
		$params = array(
			"GOODS_ID" => $goods_id,
			"ID" => $id
		);
		$this->delete($where,$params);
    }

	/*
	public function updateCart($goods_id,$amount){
	
		$this->name = 'CART';
		
		$where = 'GOODS_ID = :GOODS_ID AND :';
		$params = array(
			"GOODS_ID" => $goods_id
		);
		$this->update($where,$params);
    }
	*/
	
	public function deleteCart($id){
	
		$this->name = 'CART';
		
		$where = 'ID = :ID';
		$params = array(
			"ID" => $id
		);
		$this->delete($where,$params);
    }
}

?>