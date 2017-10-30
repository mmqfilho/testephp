<?php
$produtos = array();

if (isset($_COOKIE["produtos"]) && $_COOKIE["produtos"] != ''){
	
	$produtos_cookie = explode(';', $_COOKIE["produtos"]);
	
	$valor_total = 0;
	foreach ($produtos_cookie as $p){
		if ($p == '') continue;
		
		$prod = explode(':', $p);
		$produto_id = $prod[0];
		$qtd = $prod[1];
		
		// pega os produtos
		$prod = $md->getProduto($produto_id);
		$prod['produto']['qtd'] = $qtd;
		$produtos[] = $prod;
		
		$valor_total += $prod['produto']['produto_preco'] * $qtd;
	}
}
?>
<div class="container-fluid text-left">
	<div class="row text-left">
		<div class="col-md-12">
			<h1 class="titulo">Sua cesta de compras</h1>
		</div>
	</div>
	
	<?php if (count($produtos) > 0) :?>
	
		<div class="row text-right">
			<div class="col-md-1">&nbsp;</div>
			<div class="col-md-8">
				<button type="button" class="btn btn-primary finalizar-compra">Finalizar compra</button>
			</div>
		</div>
	
		<?php foreach ($produtos as $p): $preco_soma = ($p['produto']['qtd'] * $p['produto']['produto_preco']); ?>
		<div class="row">
		
			<div class="col-md-2 image">
				<img itemprop="image" alt="" width="160" height="160" src="<?php echo IMG_PROD_DIR; ?>/<?php echo $p['produto']['produto_imagem']?>" onerror="this.src='<?php echo IMG_PROD_DIR; ?>/produtoSemFoto.jpg'">
			</div>
			<div class="col-md-8 data">
				<h4><?php echo $p['produto']['produto_nome']; ?></h4>
				<p class="preco">Preço unitário: R$ <?php echo number_format($p['produto']['produto_preco'], 2, ',', '.'); ?></p>
				<span>
					<input class="prod-qtd" type="number" min="1" max="20" value="<?php echo $p['produto']['qtd']; ?>">
					<button type="button" class="btn btn-warning btn-xs cart-qtd" data-id="<?php echo $p['produto']['produto_id']; ?>">Alterar</button>
				</span>	
				<div>
					<p class="preco_total">
					Total: R$<?php echo number_format($preco_soma, 2, ',', '.'); ?>
					</p>
				</div>
			</div>
		
		</div>
		<?php endforeach; ?>
		
		
		<div class="row preco_total">
		
			<div class="col-md-2 text-right">
				Total à pagar:
			</div>
			<div class="col-md-8 text-left">
				R$ <?php echo number_format($valor_total, 2, ',', '.')?>
			</div>
		
		</div>
		
		<div class="row text-right">
			<div class="col-md-1">&nbsp;</div>
			<div class="col-md-8">
				<button type="button" class="btn btn-primary finalizar-compra">Finalizar compra</button>
			</div>
		</div>
	<?php else:?>
		<div class="row"><div class="col-md-2">Cesta vazia!</div></div>
	<?php endif; ?>
	
</div>
