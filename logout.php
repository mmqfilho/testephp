<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		
		<?php
		if(isset($_GET['g']) && $_GET['g'] == 'logout' && isset($_GET['token']) && $_GET['token'] === md5(session_id())) {
		   session_destroy();
		   header("location: /");
		   exit();
		} else {
			?><h3><a href="?g=logout&token=<?php echo md5(session_id());?>">Clique aqui para fazer o logout</a></h3><?php 
		}
		?>
		</div>
	</div>
</div>