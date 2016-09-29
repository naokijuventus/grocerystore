<?php

require_once 'smarty/libs/Smarty.class.php';
require_once 'Request.php';

class Dispatcher{
	private $SysRoot;
	
	public function setSystemRoot($path){
		$this->sysRoot = rtrim($path,'/');
	}
	
	public function dispatch(){
		//パラメーター取得（末尾の/は削除）
		//デリミタ追加
		$param = preg_replace('#^/?#','',$_SERVER['REQUEST_URI']);
		$param = preg_replace('#/?$#','',$param);
		
		$params = array();
		if($param != ''){
			//パラメーターを/で分割
			$params = explode('/',$param);
		}
		//１番目のパラメーターをコントローラーとして取得
		$controller = "index";
		if(count($params) > 0){
			$controller = $params[0];
		}
		
		//１番目のパラメーターをもとにコントローラークラスインスタンス取得
        $controllerInstance = $this->getControllerInstance($controller);
        if (null == $controller) {
            header("HTTP/1.0 404 Not Found");
            exit;
        }
		
		//2番目のパラメーターをアクションとして取得
		$action = 'index';
		if(count($params) > 1){
			$action = $params[1];
		}
		
		// アクションメソッドの存在確認
        if (method_exists($controllerInstance, $action . 'Action') == false) {
			//テスト
            header("HTTP/1.0 404 Not Found");
            exit;
        }
		
		// コントローラー初期設定
        $controllerInstance->setSystemRoot($this->sysRoot);
        $controllerInstance->setControllerAction($controller, $action);
        // 処理実行
        $controllerInstance->run();
		
	}
	// コントローラークラスのインスタンスを取得
    private function getControllerInstance($controller){
		//パラメーターより取得したコントローラー名によりクラス振り分け
		$className = ucfirst(strtolower($controller)).'Controller';
		// コントローラーファイル名
		$controllerFileName = sprintf('%s/controllers/%s.php', $this->sysRoot, $className);

		// ファイル存在チェック
        if (file_exists($controllerFileName) == false) {
            return null;
        }
		// クラスファイルを読込
		require_once $controllerFileName;
        // クラスが定義されているかチェック
        if (false == class_exists($className)) {
            return null;
        }
		// クラスインスタンス生成
        $controllerInstarnce = new $className();

        return $controllerInstarnce;
	}
}