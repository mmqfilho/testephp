<?php
$produtos = array();

if (isset($_SESSION['user_id']) && isset($_COOKIE["produtos"]) && $_COOKIE["produtos"] != ''){
	
	$produtos_cookie = explode(';', $_COOKIE["produtos"]);
	
	$valor_total = 0;
	foreach ($produtos_cookie as $p){
		if ($p == '') continue;
		
		$prod = explode(':', $p);
		$produto_id = $prod[0];
		$qtd = $prod[1];
		
		// pega os produtos
		$prod = $md->getProduto($produto_id);
		$produtos[] = $prod;
		
		$valor_total += $prod['produto']['produto_preco'] * $qtd;
	}
	
	$pedido = $md->savePedido($_COOKIE["produtos"]);
	$pedido_id = $pedido['last_inserted_id'];
	
	?>
	<div class="container-fluid text-left">
		<div class="row">
			<div class="col-md-12">
				<h1 class="titulo">Obrigado por comprar em nossa loja!</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div>O ID de seu pedido é <?php echo $pedido_id; ?></div>
				<div>O valor total de sua compra é: R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></div>
			</div>
		</div>
		
		<script>
		$(document).ready(function(){ 
			$.removeCookie("produtos");
		});
		</script>
	</div>
	
	<?php 
}else{
	echo '<script>document.location.href="http://testephp.local/?g=error&e=login"</script>';
	die();
}
?>