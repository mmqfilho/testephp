<?php 
// pega os produtos
$produtos = $md->getProdutos(
		(isset($_GET['o']))  	?$_GET['o']:null, 		// ordenacao
		(isset($_GET['cat']))	?$_GET['cat']:null,		// categoria
		(isset($_GET['p']))		?$_GET['p']:1,			// pagina
		(isset($_GET['texto']))	?$_GET['texto']:null	// texto de busca
);

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 prod-result-line">
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
		<div class="col-md-3 prod-order-line">
			<h2>
			<button type="button" class="btnOrder btn btn-sm btn-default <?php echo (isset($_GET['o']) && $_GET['o'] == 1) ? 'active':''; ?>" data-val="1">Nome</button>
			<button type="button" class="btnOrder btn btn-sm btn-default <?php echo (isset($_GET['o']) && $_GET['o'] == 2) ? 'active':''; ?>" data-val="2">Menor Preço</button>
			<button type="button" class="btnOrder btn btn-sm btn-default <?php echo (isset($_GET['o']) && $_GET['o'] == 3) ? 'active':''; ?>" data-val="3">Maior Preço</button>
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