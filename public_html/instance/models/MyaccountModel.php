<?php

class MyaccountModel extends ModelBase{
	
	protected $result;						//取得した結果を格納
	protected $goods;						//商品名を取得
	protected $purchase;					//購入履歴情報を取得
	protected $info;						//ユーザー情報オブジェクトを取得
	protected $order_no;					//注文番号
	protected $const_max_history_items;		//購入履歴の最大表示件数
	protected $history_items_display_cnt;	//購入履歴の表示件数
	protected $history_items;				//購入履歴情報を格納
	protected $goods_name;					//商品名を配列で格納
	protected $str_goods_name;				//配列で取得した商品名を文字列として結合
	protected $total_price;					//注文番号毎の金額
	protected $ary_order_no;				//注文番号（配列）
	protected $ary_purchase_date;			//購入日（配列）
	protected $ary_goods;					//ひとつの注文番号に含まれる全ての商品名を格納する配列
	protected $ary_price;					//注文番号毎の金額を格納する配列
	protected $nodata;						//購入履歴がないときのメッセージを格納
	
	
	//ユーザー情報取得
	public function searchMyInfo($id){
		$this->info = new DaoUser();
		$result = $this->info->searchMyInfo($id);
		return $result;
	}
	
	//購入履歴情報取得
	public function searchHistory($id){
		
		//初期化
		$str_goods_name = "";
		$total_price = 0;
		$nodata = "";
		$const_max_history_items = 10;	//購入履歴最大表示件数を10件で初期化
		$ary_order_no = array();
		$ary_purchase_date = array();
		$ary_goods = array();
		$ary_price = array();
		
		$this->purchase = new DaoPurchase();
		$order_no = $this->purchase->searchOrderNo($id);
		
		//購入履歴が10件以下であれば全ての件数を表示
		if(count($order_no) <= $const_max_history_items){
			$history_items_display_cnt = count($order_no);
		}else{
			$history_items_display_cnt = $const_max_history_items;
		}
		
		if($history_items_display_cnt > 0){
			for($i = 0;$i < $history_items_display_cnt;$i++){
				$history_items = $this->searchPurchaseHistory($id,$order_no[$i]['ORDER_NO']);
				for($j = 0;$j < count($history_items);$j++){
					$goods_name = $this->getGoodsName($history_items[$j]['GOODS_ID']);
					$str_goods_name = $str_goods_name.$goods_name[0]['GOODS_NAME']."(".$history_items[$j]['NUMBER']."個)"."<Br>";
					$total_price = $total_price + $history_items[$j]['SUM'];
				}
				
				array_push($ary_order_no ,$order_no[$i]['ORDER_NO']);
				array_push($ary_purchase_date ,$history_items[0]['REGDT']);
				array_push($ary_goods ,$str_goods_name);
				array_push($ary_price ,$total_price);
				
				$str_goods_name = "";
				$total_price = 0;
			}
		}else{
			$nodata = "<tr><td colspan='4'>購入履歴はありません。</td></tr>";
		}
		
		$result = array(
			"NODATA" => $nodata,
			"ORDER_NO" => $ary_order_no,
			"PURCHASE_DATE" => $ary_purchase_date,
			"GOODS" => $ary_goods,
			"PRICE" => $ary_price
			);
		return $result;
	}

	//購入履歴情報取得（ユーザーIDと注文番号を元にPURCHASEテーブルからそのままデータを取得）
	public function searchPurchaseHistory($id,$order_no){
		$this->purchase = new DaoPurchase();
		$result = $this->purchase->searchPurchaseHistory($id, $order_no);
		return $result;
	}
	//GOODS_IDから対応する商品名を取得
	public function getGoodsName($goods_id){
		$this->goods = new DaoGoods();
		$result = $this->goods->getGoodsName($goods_id);
		return $result;
	}
}

?>