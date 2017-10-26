<?php 

// se nao tem id manda pra home
if (!isset($_GET['id'])) {
	header('Location: /');
	exit();
}
// pega os produtos
$produto = $md->getProduto($_GET['id']);

?>

<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-2">
			<img itemprop="image" alt="" width="200" height="200" src="<?php echo IMG_PROD_DIR; ?>/<?php echo $p['produto_imagem']?>" onerror="this.src='<?php echo IMG_PROD_DIR; ?>/produtoSemFoto.jpg'">
		</div>
		<div class="col-md-10">dados</div>
	</div>
	<div class="row">
	
	</div>
	
</div>