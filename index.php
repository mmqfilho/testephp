<?php 
session_start();
/**
 * Inicializa as configurações
 */
require_once 'config.php';

/**
 * Inicializador do CORE do sistema
 */
require_once INC_DIR . DS . 'init.php';

/**
 * TEMPLATE
 */
require 'header.php'; 
 ?>
		
<div class="row">
	<div class="menu-container col-md-2">
		<?php require 'menu.php';?>
	</div>
	
	<div role="main" class="col-md-10">
    <?php 
	if (isset($_REQUEST['g'])){
		if (file_exists($_REQUEST['g'].'.php')){
			include $_REQUEST['g'].'.php';
		}else{
			include 'error.php';
		}						
	}else{
		include 'home.php';
	}
    ?>
	</div>
</div>

<?php require 'footer.php'; ?>