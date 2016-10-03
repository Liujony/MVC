<?php 
	
	header("Content-type:text/html; charset:utf-8");
	session_start();
	ini_set("display_errors", "On");
	require_once('config.php');
	require_once('pc.php');
	PC::run($config);
	error_reporting(E_ALL | E_STRICT);

 ?>