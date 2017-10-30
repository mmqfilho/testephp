<?php 

if (isset($_GET['msg'])){
	echo $_GET['msg'];
	
}elseif (isset($_GET['e']) && $_GET['e'] == 'login'){
	echo 'Você deve fazer o login para continuar!';
	
}else{
	echo 'Ocorreu um erro: Página não encontrada!';	
}
?>

