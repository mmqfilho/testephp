<?php 
/**
 * Chama as configurações e demais arquivos de CORE do sistema
 */
require_once 'config.php';

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