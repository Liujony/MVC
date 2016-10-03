<?php 

	// $currentdir = dirname(__FILE__);
	include_once('include.list.php');
	foreach($paths as $path){
		include_once($path);
	}

	class PC{
		public static $controller;
		public static $method;
		private static $config;

		private function init_db(){
			DB::init('mysql',self::$config['dbconfig']);
		}

		private function init_controller(){
			self::$controller = isset($controller)?daddslashes($controller):"test";
		}

		private function init_method(){
			self::$method = isset($method)?daddslashes($method):"show";
		}

		public function run($config){
			self::$config=$config;
			self::init_db();
			self::init_controller();
			self::init_method();
			C(self::$controller,self::$method);
		}
	}


 ?>