<?php
session_start();
require_once 'config.php';
require_once INC_DIR . DS . 'init.php';

$ret = $md->login($_POST['user'], $_POST['pass']);
if ($ret !== false){
	$_SESSION['user_id'] = $ret;
	setcookie('user_id', $ret);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode(array('retorno'=>$ret));