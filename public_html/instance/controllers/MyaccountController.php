<?php

class MyaccountController extends ControllerBase{
	
	public function IndexAction(){
		
		if(!isset($_SESSION)){ 
			session_start(); 
		} 
		
		$info;						//MyaccountModelオブジェクトを格納
		$myinfo;					//ユーザー情報を格納
		$history;					//購入履歴情報を格納
		
		$this->info = new MyaccountModel();
		
		
		//ユーザー情報取得
		$myinfo = $this->info->searchMyInfo($_SESSION['id']);
		//購入履歴取得
		$history = $this->info->searchHistory($_SESSION['id']);
		
		//ユーザー情報表示
		$this->view->assign('name',$myinfo[0]["NAME"]);
		$this->view->assign('phonetic',$myinfo[0]["PHONETIC"]);
		$this->view->assign('phone',$myinfo[0]["PHONE"]);
		$this->view->assign('postal_code',$myinfo[0]["POSTAL_CODE"]);
		$this->view->assign('address',$myinfo[0]["ADDRESS"]);
		$this->view->assign('mail',$myinfo[0]["MAIL"]);
		$this->view->assign('birth',$myinfo[0]["BIRTH"]);
		$this->view->assign('payment',$myinfo[0]["PAYMENT"]);
		
		
		//購入履歴情報表示
		$this->view->assign('nodata',$history["NODATA"]);
		$this->view->assign('order_no',$history["ORDER_NO"]);
		$this->view->assign('purchase_date',$history["PURCHASE_DATE"]);
		$this->view->assign('goods',$history["GOODS"]);
		$this->view->assign('price',$history["PRICE"]);
	}
}
?>