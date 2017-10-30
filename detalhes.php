<?php 

// se nao tem id manda pra home
if (!isset($_GET['id'])) {
	header('Location: /');
	exit();
}
// pega os produtos
$p = $md->getProduto($_GET['id']);
?>

<div class="container-fluid">
	<div class="row topo">
		<div class="col-md-2 image">
			<img itemprop="image" alt="" width="200" height="200" src="<?php echo IMG_PROD_DIR; ?>/<?php echo $p['produto']['produto_imagem']?>" onerror="this.src='<?php echo IMG_PROD_DIR; ?>/produtoSemFoto.jpg'">
		</div>
		<div class="col-md-8 data">
			<h1 class="titulo"><?php echo $p['produto']['produto_nome']; ?></h1>
			<p class="preco">R$ <?php echo number_format($p['produto']['produto_preco'], 2, ',', '.'); ?></p>
			<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
		</div>
	</div>
	<div class="row descricao">
		<div class="col-md-12">
			<p><?php echo $p['produto']['produto_descricao']; ?></p>
		</div>
	</div>
	<div class="row caracteristicas">
		<div class="col-md-6">
			<table class="table table-striped">
		    <tbody>
		    <?php foreach($p['caracteristicas'] as $c) :?>
		      <tr>
		        <td><?php echo $c['caracteristica_nome']?></td>
		        <td><?php echo $c['caracteristica_valor']?></td>
		      </tr>
		      <?php endforeach; ?>
		    </tbody>
	    </table>
		</div>
	</div>
</div>