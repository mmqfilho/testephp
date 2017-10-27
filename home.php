<?php 
// marca ordenacao padrao como menor preco
if (!isset($_GET['o'])) $_GET['o'] = ORDENACAO_DEFAULT;

// pagina 1 como padrao
if (!isset($_GET['p'])) $_GET['p'] = 1;

// pega os produtos
$produtos = $md->getProdutos(
		(isset($_GET['o']))  	?$_GET['o']:ORDENACAO_DEFAULT, 	// ordenacao
		(isset($_GET['cat']))	?$_GET['cat']:null,				// categoria
		(isset($_GET['p']))		?$_GET['p']:1,					// pagina
		(isset($_GET['texto']) && strlen($_GET['texto']) >= DB_MIN_FT)?$_GET['texto']:null	// texto de busca (padrao fulltext mysql de 4 ou mais caracteres)
);

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 prod-result-line">
			<h2>
			<?php if ($produtos['total_produtos'] > 1) : ?>
				Foram encontrados <?php echo $produtos['total_produtos'];?> produtos. Página <?php echo $produtos['pagina_atual'] . ' de ' . $produtos['total_paginas']; ?>
			<?php elseif ($produtos['total_produtos'] == 1) : ?>
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
			<img itemprop="image" width="200" height="200" src="<?php echo IMG_PROD_DIR; ?>/<?php echo $p['produto_imagem']?>" onerror="this.src='<?php echo IMG_PROD_DIR; ?>/produtoSemFoto.jpg'">
			<h1><?php echo $p['produto_nome']?></h1>
			<h3>R$<?php echo number_format($p['produto_preco'], 2, ',', '.')?></h3>
		</div>
	</a>
<?php endforeach; ?>	
</div>

<?php 
// paginacao
if ($produtos['total_paginas'] > 1) { 
?>
	<div class="container-fluid">
		<div class="col-md-1"></div>
		<div class="col-md-8"><?php include_once 'paginacao.php'; ?></div>
	</div>
<?php
}
