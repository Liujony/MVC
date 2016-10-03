<?php 
	
	class mysql{

		// Show the error messages.
		function ShowError($error){
			die('Sorry, You operation has some problems:'.$error);
		}

		// Connet with mysql.
		function connect($config){
			extract($config);
			header('content-type:text/html;charset=utf8');
			$mysqli = new mysqli($dbaddress,$dbuser,$dbpasswd,$dbname);
			if($mysqli->connect_error){
				$this->ShowError($mysqli->connect_errno.$mysqli->connect_error);
			}
			$mysqli->set_charset('utf8');

		}

		// Query the information, and return the information.
		function query($sql){
			if(!($mysqli_result=$mysqli->query($sql))){
				$this->ShowError($mysqli->errno.$mysqli->error);
			}else{
				return $mysqli_result;
			}
		}
		
		// Find the information more than one row. 
		function findAll($query){
			if($query && $query->num_rows>0){
				while ($row=$query->fetch_assoc()){
					$rows[]=$row;
				}
				return $rows;
			}else{
				$this->ShowError($mysqli->errno.$mysqli->error);
			}
		}

		// Find one row of information.
		function findOne($query){
			$rs = $query->fetch_assoc();
			return $rs;
		}

		// Find the specified information
		function findResult($query,$row=0,$field=0){
			$query->data_seek($rom);
			$rs = $query->fetch_array();
			return $rs[$field];



			// $res->data_seek($row); 
			// $datarow = $res->fetch_array(); 
			// return $datarow[$field]; 
		}

		// Insert the information
		function ins($dbtable,$arr){
			foreach($arr as $key=>$value){
				$keyArray[] = '`'.$key.'`';
				$valueArray[] = "'".$value."'";
			}
			$keys = implode(',',$keyArray);
			$values = implode(',',$valueArray);
			$sql = "insert ".$dbtable."(".$keys.") value(".$values.");";
			$this->query($sql);
		}

		// Update the information
		function upd($dbtable,$arr,$where){
			foreach($arr as $key=>$value){
				$keysAndValuesArr[] = "`".$key."`='".$value."'";
			}
			$keysAndValues = implode(",",$keysAndValuesArr);
			$sql = "update ".$dbtable." set ".$keysAndValues." where ".$where.";";
			$this->query($sql);
		}

		// Delete the information
		function del($dbtable,$where){
			$sql = "delete from ".$dbtable." where ".$where.";";
			$this->query($sql);
		}
		
		// function close(){

		// }


	}


 ?>