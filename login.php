<?php
session_start();
require_once 'config.php';

$ret = $md->login($_POST['user'], $_POST['pass']);
if ($ret !== false){
	$_SESSION['user_id'] = $ret;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode(array('retorno'=>$ret));