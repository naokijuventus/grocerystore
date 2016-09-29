<?php

class GoodsModel extends ModelBase{
	
	protected $name;
	protected $result;
	protected $goods;
	protected $items;
	protected $header_mode;
	protected $ary_img_path;
	protected $ary_goods_id;
	protected $ary_goods_name;
	protected $ary_goods_price;
	protected $ary_goods_note;
	protected $ary_goods_folder;
	protected $btn_diabled;

    public function loginCheck($id, $pass){
		$result = "";
		$this->name = new DaoUser();
		$result = $this->name->loginChk($id, $pass);
		if(count($result) > 0){
			$_SESSION['id'] = $result[0]["ID"];
		}
		return $result;
	}
	
	public function selectItem($category, $detail){
		$this->goods = new DaoGoods();
		$items = $this->goods->searchItems($category, $detail);
		
		$ary_img_path = array();
		$ary_goods_id = array();
		$ary_goods_name = array();
		$ary_goods_price = array();
		$ary_goods_note = array();
		$ary_goods_folder = array();
		
		for($i = 0; $i < count($items); $i++){
			array_push($ary_img_path,"images/goods/".$items[$i]["FOLDER"]."/".$items[$i]["GOODS_ID"].".jpg");
			array_push($ary_goods_id ,$items[$i]["GOODS_ID"]);
			array_push($ary_goods_name ,$items[$i]["GOODS_NAME"]);
			array_push($ary_goods_price ,$items[$i]["PRICE"]);
			array_push($ary_goods_note ,$items[$i]["NOTE"]);
			array_push($ary_goods_folder ,$items[$i]["FOLDER"]);
		}
		
		if(isset($_SESSION['id'])){
			$btn_diabled = "";
		}else{
			$btn_diabled = "disabled=disabled";
		}
		
		$result = array(
			"IMG_PATH" => $ary_img_path,
			"GOODS_ID" => $ary_goods_id,
			"GOODS_NAME" => $ary_goods_name,
			"PRICE" => $ary_goods_price,
			"NOTE" => $ary_goods_note,
			"FOLDER" => $ary_goods_folder,
			"BTN_DISABLED" => $btn_diabled
			);
		return $result;
	}
	
	public function createHeader($header_mode){
		switch($header_mode){
			case 1:
				$result = "";
				$result = $result."<ul>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='myaccount'>My Account</a></li>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='cart'>Cart</a></li>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='index'>Home</a></li>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='goods' onclick='destroySession(); return false;'>Log Out</a></li>\n";
				$result = $result."</ul>\n";
				break;
			case 2:
				$result = "";
				$result = $result."<form action='goods' method='POST'>\n";
				$result = $result."<ul>\n";
				$result = $result."<li class='LonginHead'>Log In/Sign Up</li>\n";
				$result = $result."<li class='LoginId'>ID:<input type='text' name='LoginId' value='' size='8' maxlength='8'></li>\n";
				$result = $result."<li class='LoginPass'>Pass:<input type='password' name='LoginPass' value='' size='8' maxlength='8'></li>\n";
				$result = $result."<li class='Loginbtn'><input type='submit' value='Login'></li>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='index'>Home</a></li>\n";
				$result = $result."<li class='HeaderItem'><a class='CreatA' href='#'>Create a New Acoount</a></li>\n";
				$result = $result."</ul>\n";
				$result = $result."</form>\n";
				break;
			default:
				$result = "";
				break;
		}
		return $result;
	}
}

?>