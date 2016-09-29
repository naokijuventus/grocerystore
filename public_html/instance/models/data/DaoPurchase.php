<?php

class DaoPurchase extends ModelBase{
	
	protected $array;
	
	public function getOrderNo($date_y){

		$sql = "SELECT MAX(ORDER_NO) AS MAX
				  FROM PURCHASE
				 WHERE ORDER_NO > :ORDER_NO";
				
	//	$array = null;
		$array = array(
			"ORDER_NO" => $date_y
		);
		$result = $this->query($sql,$array);
		return $result;
    }
	
	public function insertPurchase($order_no, $id, $goods_id, $price, $number, $sum){

		$now = date('Y/m/d H:i:s');
		$this->name = 'PURCHASE';
		$array = array(
			"ORDER_NO" => $order_no,
			"ID" => $id,
			"GOODS_ID" => $goods_id,
			"PRICE" => $price,
			"NUMBER" => $number,
			"SUM" => $sum,
			"UPDDT" => $now,
			"REGDT" => $now
		);
		$this->insert($array);
    }
	
	public function searchOrderNo($id){

		$sql = "SELECT DISTINCT ORDER_NO
				   FROM PURCHASE
				  WHERE ID = :ID
				 ORDER BY ORDER_NO DESC";
				
		$array = array(
			"ID" => $id
		);
		$result = $this->query($sql,$array);
		return $result;
    }
	
	public function searchPurchaseHistory($id,$order_no){

		$sql = "SELECT REGDT 
					  ,GOODS_ID
					  ,NUMBER
					  ,SUM
				  FROM PURCHASE 
				 WHERE ID = :ID
				   AND ORDER_NO = :ORDER_NO
				 ORDER BY REGDT DESC";
				
		$array = array(
			"ID" => $id,
			"ORDER_NO" => $order_no
		);
		$result = $this->query($sql,$array);
		return $result;
    }
}

?>