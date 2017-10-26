<?php
session_start();
require_once 'config.php';

$ret = $md->login($_POST['user'], $_POST['pass']);
if ($ret !== false){
	$_SESSION['user_id'] = $ret;
}
echo json_encode($ret);