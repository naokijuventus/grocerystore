<?php

class CartController extends ControllerBase{
	
	public function IndexAction(){
		
		if(!isset($_SESSION)){ 
			session_start(); 
		} 
		
		$processing_id;
		$goods_id;
		$number;
		$select_item;
		$name;
		$nodata;
		$cart;
		
		$this->name = new CartModel();
		$msg = "";
		$goods_id = "";
		$select_item = "";
		$nodata = "";
		$number = 0;
		$processing_id = 0;
		
		//カートに追加
		if(isset($_POST['selectBtn'])){
			$goods_id = $_POST['selectBtn'];
			$processing_id = 1;
			//購入個数はとりあえず１に設定
			$number = 1;
			$select_item = $_POST['selectItem'];
		}
		
		//削除
		if(isset($_POST['deleteId'])){
			$processing_id = 2;
			$goods_id = $_POST['deleteId'];
		}
		
		//更新
		if(isset($_POST['fixedAmount']) && !(empty($_POST['fixedAmount']))){
			$processing_id = 3;
			$goods_id = $_POST['fixId'];
			$number = $_POST['fixedAmount'];
		}
		
		$cart = $this->name->doCart($processing_id,$_SESSION['id'],$goods_id,$select_item,$number);
		
		//表示
		
		//画面表示
		$this->view->assign('nodata',$cart["NODATA"]);
		$this->view->assign('msg',$cart["MSG"]);
		$this->view->assign('img_path',$cart["IMG_PATH"]);
		$this->view->assign('id',$cart["GOODS_ID"]);
		$this->view->assign('name',$cart["GOODS_NAME"]);
		$this->view->assign('price',$cart["PRICE"]);
		$this->view->assign('sum',$cart["SUM"]);
		$this->view->assign('amount',$cart["AMOUNT"]);
		$this->view->assign('total',$cart["TOTAL"]);
		$this->view->assign('btn_disabled',$cart["BTN_DISABLED"]);
		$this->view->assign('err_msg',$cart["ERR_MSG"]);
	}
	
	public function PurchaseAction(){
			
		if(!isset($_SESSION)){ 
			session_start(); 
		} 
		
		if(isset($_POST['purchaseFlg'])){
			if($_POST['purchaseFlg'] == "1"){
				$order_no; //西暦下二桁+連番7桁
				$name;
				$this->name = new CartModel();
				
				$order_no = $this->name->buy($_SESSION['id']);
				
				$this->view->assign('order_no',$order_no);
			}
		}
	}
}
?>