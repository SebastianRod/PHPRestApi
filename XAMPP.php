<?php
	include('Operaciones.php');
	require_once('DB.php');

	$requestMethod = $_SERVER["REQUEST_METHOD"];
	$api = new Operaciones($conexion);

	switch($requestMethod){
		case 'GET':
		$usrId = '';
		if($_GET["ID_USUARIO"]){
			$usrId = $_GET["ID_USUARIO"];
		}
		$api->getUser($usrId);
		break;
		default:
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	}
?>
