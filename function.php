<?php 

	function C($name,$method){
		require_once($name.'controller.class.php');
		$controller = $name.'controller';
		$obj = new $controller();
		$obj->$method();
	}
	// C('test','show');

	function M($name){
		require_once($name.'model.class.php');
		$model = $name.'model';
		$obj = new $model();
		return $obj;
	}

	function V($name){
		require_once($name.'view.class.php');
		$view = $name.'view';
		$obj = new $view();
		return $obj;
	}

	function daddslashes($str){
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}
 ?>