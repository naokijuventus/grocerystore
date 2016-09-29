<?php

class GoodsController extends ControllerBase{
	
	public function indexAction(){
		
		if(!isset($_SESSION)){
			if(!isset($_POST['logOutFlg'])){
				session_start();
			}else{
				// セッション変数を全て解除
				$_SESSION = array();

				// セッションを切断するためにセッションクッキーも削除。
				// セッション情報だけでなくセッションを破壊する。
				if(isset($_COOKIE[session_name()])) {
					setcookie(session_name(), '', time()-42000, '/');
				}
				// 最終的に、セッションを破壊する
				@session_destroy();
			}
		}
		
		$name;
		$result;
		$header;
		$category;
		$detail;
		$detail_name;
		$items;
		
		$header = array();
		$this->name = new GoodsModel();
		
		//ログイン判定
		if(isset($_SESSION['id'])){
			//ヘッダー情報格納
			$header = $this->name->createHeader(1);
		}else{
			if(isset($_POST['LoginId']) && isset($_POST['LoginPass'])){
				$result = $this->name->loginCheck($_POST['LoginId'], $_POST['LoginPass']);
				if(count($result) > 0){
					$this->run();
					exit();
				}
			}
			//ヘッダー情報格納
			$header = $this->name->createHeader(2);
		}

		//メイン表示部
		if(isset($_POST['category']) && $_POST['detail'] && $_POST['detailName']){
			$category = $_POST['category'];
			$detail = $_POST['detail'];
			$detail_name = $_POST['detailName'];
		}else{
			$category = '1';
			$detail = '1';
			$detail_name = 'Clock';
		}
		
		$items = $this->name->selectItem($category, $detail);
		

		//画面表示
		$this->view->assign('header',$header);
		$this->view->assign('detail_name',$detail_name);
		$this->view->assign('items',$items["IMG_PATH"]);
		$this->view->assign('id',$items["GOODS_ID"]);
		$this->view->assign('name',$items["GOODS_NAME"]);
		$this->view->assign('price',$items["PRICE"]);
		$this->view->assign('note',$items["NOTE"]);
		$this->view->assign('imgF',$items["FOLDER"]);
		$this->view->assign('btn_disabled',$items["BTN_DISABLED"]);
		
    }
}
?>