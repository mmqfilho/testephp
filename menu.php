<div class="nav-side-menu">
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
  		<ul id="menu-content" class="menu-content collapse out">
      	
      		<li>
      			<a href="/"><i class="fa fa-home fa-lg"></i> Produtos</a>
      		</li>
      		
	        <li data-toggle="collapse" data-target="#categorias" class="collapsed <?php echo (isset($_GET['cat']))?'active':''; ?>">
	        	<a href="javascript:void(0);"><i class="fa fa-tags fa-lg"></i> Por Categorias <span class="arrow"></span></a>
	        </li>
	        <ul class="sub-menu collapse" id="categorias">
	        	<li><a href="/">Todas</a></li>
	        	<?php 
	        	$categorias = $md->getCategorias();
	        	foreach ($categorias['result'] as $c) {
					?><li class="<?php echo (isset($_GET['cat']) && $_GET['cat'] == $c['categoria_id']) ? 'active' : ''; ?>"><a href="?cat=<?php echo $c['categoria_id']; ?>"><?php echo ucfirst($c['categoria_nome']); ?></a></li><?php
				}
	        	?>
	        </ul>
	        
	        <li data-toggle="collapse" data-target="#usuario" class="collapsed <?php echo (isset($_GET['g']) && $_GET['g']=='user')?'active':''; ?>"><a href="javascript:void(0);"><i class="fa fa-user fa-lg"></i> Usuário  <span class="arrow"></span></a></li>
	        <ul class="sub-menu collapse" id="usuario">
	        
	        	<?php if (!isset($_SESSION['user_id'])) : ?>
	        	<li><a href="javascript:void(0);" class="loginShow">Logar</a></li>
	        	<li><a href="?g=user">Novo cadastro</a></li>
	        	<?php else :?>
	        	<li><a href="?g=logout&token=<?php echo md5(session_id()); ?>">Deslogar</a></li>
	        	<li><a href="?g=user">Alterar cadastro</a></li>
	        	<?php endif;?>
	        </ul>
	        
		</ul>
	</div>
</div>