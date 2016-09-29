<?php

class CartModel extends ModelBase{
	
	protected $result;
	protected $goods;
	protected $items;
	protected $cart;			//DaoCartを格納
	protected $purchase;		//DaoPurchaseを格納
	protected $order_no;		//注文番号
	protected $processing_id;	//処理ID
	protected $number;			//処理する量を指定
	protected $cart_items;		//カートの中身
	protected $ary_img_path;	//商品画像へのパス（配列）
	protected $ary_goods_id;	//カートに入ってる商品の商品ID（配列）
	protected $ary_goods_name;	//カートに入ってる商品の商品名（配列）
	protected $ary_price;		//カートに入ってる商品の価格
	protected $ary_amount;		//カートに入ってる商品の商品ごとの個数（配列）
	protected $ary_sum;			//カートに入ってる商品の商品ごとの総合金額（配列）
	protected $total;			//カートに入ってる商品の総合金額
	protected $nodata;			//カートに商品がない時に文言を格納
	protected $msg;				//処理完了後に画面に表示するメッセージを格納
	protected $btn_diabled;		//カートに商品が入っていない場合はボタン押下不可
	protected $err_Msg;			//エラーメッセージを格納
	
	public function addCart($goods_id,$id,$number){
		$sum;
		
		$this->goods = new DaoGoods();
		$items = $this->goods->getPrice($goods_id);
		$sum = $items[0]['PRICE'] * $number;

		$this->cart = new DaoCart();
		$this->cart->addCart($goods_id,$id,$number,$sum);
	}
	
	public function getCart($id){
		
		$this->cart = new DaoCart();
		$result = $this->cart->getCart($id);
		return $result;
	}
	

	public function deleteGoods($goods_id,$id){	
		$this->cart = new DaoCart();
		$this->cart->deleteGoods($goods_id,$id);
	}
	
	public function getOrderNo($date_y){
		$this->purchase = new DaoPurchase();
		$date_y = $date_y.'0000000';
		$result = $this->purchase->getOrderNo(intVal($date_y));
		return $result;
	}
	
	public function purchase($order_no, $id, $goods_id, $price, $number, $sum){
		$this->purchase = new DaoPurchase();
		$this->cart = new DaoCart();
		$result = $this->purchase->insertPurchase($order_no, $id, $goods_id, $price, $number, $sum);
		$this->cart->deleteCart($id);
	}
	
	public function doCart($processing_id,$id,$goods_id,$select_item,$number){
		
		$ary_img_path = array();
		$ary_goods_id = array();
		$ary_goods_name = array();
		$ary_price = array();
		$ary_amount = array();
		$ary_sum = array();
		$total = 0;
		$nodata = "";
		$msg = "";
		$err_Msg = "";
		
		switch($processing_id){
			case 1:
				//追加
				$this->addCart($goods_id,$id,$number);
				$msg = $select_item."をカートに追加しました。";
				break;
			case 2:
			//削除
				$this->deleteGoods($goods_id,$id);
				break;
			case 3:
			//更新(削除してから追加する)
				if(!is_numeric($number)){
					$err_Msg = "数字を入力してください。";
				}elseif($number > 100){
					$err_Msg = "同一商品を100個以上購入することはできません。";
				}else{
					$this->deleteGoods($goods_id,$id);
					$this->addCart($goods_id,$id,$number);
				}
				break;
			default:
				break;
		}
		//カートの中身を取得
		$cart_items = $this->getCart($id);
		
		if(count($cart_items) > 0){
			$btn_diabled = "";
			for($i = 0; $i < count($cart_items); $i++){
				array_push($ary_img_path,"../images/goods/".$cart_items[$i]["FOLDER"]."/".$cart_items[$i]["GOODS_ID"].".jpg");
				array_push($ary_goods_id ,$cart_items[$i]["GOODS_ID"]);
				array_push($ary_goods_name ,$cart_items[$i]["GOODS_NAME"]);
				array_push($ary_price ,$cart_items[$i]["PRICE"]."Yen");
				array_push($ary_sum ,$cart_items[$i]["SUM"]."Yen");
				array_push($ary_amount ,$cart_items[$i]["AMOUNT"]);
				$total += $cart_items[$i]["SUM"];
			}
		}else{
			$nodata = "<tr><td colspan='7'>カートに商品がありません。</td></tr>";
			$btn_diabled = "disabled=disabled";
		}
	
		$result = array(
			"IMG_PATH" => $ary_img_path,
			"GOODS_ID" => $ary_goods_id,
			"GOODS_NAME" => $ary_goods_name,
			"PRICE" => $ary_price,
			"SUM" => $ary_sum,
			"AMOUNT" => $ary_amount,
			"TOTAL" => $total,
			"MSG" => $msg,
			"NODATA" => $nodata,
			"BTN_DISABLED" => $btn_diabled,
			"ERR_MSG" => $err_Msg
			);
		return $result;
	}
	
	public function buy($id){
		
		$str_Order_no = "";
		
		//注文番号作成
		$order_no = $this->getOrderNo(date('y'));
		if(is_null($order_no)){
			$order_no = 1;
		}else{
			$str_Order_no = substr(strval($order_no[0]['MAX']),3,7);
			$order_no = intval($str_Order_no) + 1;
		}
		
		$str_Order_no = date('y').str_pad(strval($order_no), 7, 0, STR_PAD_LEFT);
		$order_no = intval($str_Order_no);
		
		//カートに入ってる商品の取得
		$cart_items = $this->getCart($id);
		
		for($i = 0; $i < count($cart_items); $i++){
			$this->purchase($order_no, $id, $cart_items[$i]["GOODS_ID"], $cart_items[$i]["PRICE"], $cart_items[$i]["AMOUNT"],$cart_items[$i]["SUM"]);
		}
		
		return $order_no;

	}
}

?>