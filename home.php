<?php 
// pega os produtos
$produtos = $md->getProdutos(isset($_REQUEST['o'])?$_REQUEST['o']:null, (isset($_REQUEST['cat'])?$_REQUEST['cat']:null));

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 prod-result-line">
			<h2>
			<?php if ($produtos['affected_rows'] > 1) : ?>
				Foram encontrados <?php echo $produtos['affected_rows'];?> produtos.
			<?php elseif ($produtos['affected_rows'] == 1) : ?>
				Foi encontrado 1 produto.
			<?php else : ?>
				Não foi encontrado nenhum produto.
			<?php endif; ?>
			</h2>
		</div>
	</div>
</div>
<div class="container-fluid">

<?php foreach ($produtos["result"] as $p): ?>
	<a href="?g=detalhes&id=<?php echo $p['produto_id']; ?>">
		<div class="col-md-3 container-product">
			<img itemprop="image" alt="" width="200" height="200" src="<?php echo IMG_PROD_DIR; ?>/<?php echo $p['produto_imagem']?>" onerror="this.src='<?php echo IMG_PROD_DIR; ?>/produtoSemFoto.jpg'">
			<h1><?php echo $p['produto_nome']?></h1>
			<h3>R$<?php echo number_format($p['produto_preco'], 2, ',', '.')?></h3>
		</div>
	</a>
<?php endforeach; ?>	
	
</div>