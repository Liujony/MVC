<?php 

	class DB{
		public static $db;

		public static function init($dbtype,$config){
			self::$db = new $dbtype;
			self::$db->connect($config);
		}

		public static function query($sql){
			return self::$db->query($sql);
		}

		public static function findAll($sql){
			$query = self::$db->query($sql);
			return self::$db->findAll($query);
		}

		public static function findOne($sql){
			$query = self::$db->query($sql);
			return self::$db->findOne($query);
		}

		public static function findResult($sql,$row=0,$field=0){
			$query = self::$db->query($sql);
			return self::$db->findResult($query,$row=0,$field=0);
		}

		public static function ins($dbtable,$arr){
			return self::$db->ins($dbtable,$arr);
		}

		public static function upd($dbtable,$arr,$where){
			return self::$db->upd($dbtable,$arr,$where);
		}

		public static function del($dbtable,$where){
			return self::$db->del($dbtable,$where);
		}
	}



 ?>