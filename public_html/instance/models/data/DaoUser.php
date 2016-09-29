<?php

class DaoUser extends ModelBase{
	
	protected $name;
	protected $array;
	protected $LoginId;
	protected $LoginPass;
	
    public function loginChk($id, $pass){
		/*
		$this->name = new Request();
		$LoginId = $this->name->getPost("LoginId");
		$LoginPass = $this->name->getPost("LoginPass");
		*/
		$sql = "SELECT ID FROM USER WHERE ID = :LoginId AND PASS = :LoginPass";
		$array = array(
			"LoginId" => $id,
			"LoginPass" => sha1($pass)
		);
		$result = $this->query($sql, $array);
		return $result;
    }
	
	public function searchMyInfo($id){
		$sql = "SELECT ID,NAME,PHONETIC,POSTAL_CODE,ADDRESS,PHONE,MAIL,PAYMENT,BIRTH FROM USER WHERE ID = :ID";
		$array = array(
			"ID" => $id
		);
		$result = $this->query($sql, $array);
		return $result;
    }
}

?>