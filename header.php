<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">
		<title>Teste PHP</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  id="bootstrap-css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href="<?php echo CSS_DIR ?>/style.css" rel="stylesheet">
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="<?php echo JS_DIR ?>/jquery.cookie.min.js"></script>
		
		<!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	</head>
	
	<body>
	
	<!-- Modal Login -->
	<div id="divLoginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Login</h4>
		      	</div>
		      	<div class="modal-body">
		        	<div class="alert alert-danger" style="display: none" id="modalMsgError">
  						Email ou senha inválidos!
					</div>
					
		        	<form name="frmModal" id="frmModal" method="post" action="javascript:void(0);">
  						<div class="form-group">
    						<label for="modalEmail">Email:</label>
    						<input type="email" class="form-control" id="modalEmail" name="modalEmail">
  						</div>
  						
  						<div class="form-group">
    						<label for="modalSenha">Senha:</label>
    						<input type="password" class="form-control" id="modalSenha" name="modalSenha">
  						</div>
  						
  						<div class="checkbox">
    						<label><a href="?g=user">Criar novo cadastro</a></label>
  						</div>
  						<button type="submit" class="btn btn-default" id="btnModalLogin">Logar</button>
					</form>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		      	</div>
		    </div>
		</div>
	</div>

	
	<div class="container-fluid">
		<header class="row">
			<div class="col-md-2">
				<!-- <img alt="teste php mobly" src="images/logo-mobly4.svg" width="120">  -->
			</div>
       		
       		<div class="col-md-6">
       			<form method="GET" action="/" id="frmBuscar" name="frmBuscar" >
       				<input type="hidden" name="p" value="1">
       				<input class="busca" type="text" name="texto" id="texto" placeholder="Pesquise um produto" maxlength="200" value="<?php echo (isset($_GET['texto']) && strlen($_GET['texto']) >= DB_MIN_FT) ? $_GET['texto'] : ''; ?>">
       				<button type="button" class="btn btn-info" id="btnTopoBuscar">
						<i class="fa fa-search"></i> Pesquisar
				    </button>
       			</form>
       		</div>
       		
       		<div class="col-md-4 ico-topo">
       			<a href="?g=cart"><i class="fa fa-shopping-cart fa-2x"></i></a>
       			<?php if (!isset($_SESSION['user_id'])) : ?>
       			<a href="javascript:void(0);" class="loginShow" data-toggle="tooltip" title="Logar"><i class="fa fa-user fa-2x"></i></a>
       			<?php else :?>
       			<a href="?g=logout&token=<?php echo md5(session_id()); ?>" data-toggle="tooltip" title="Deslogar"><i class="fa fa-user-times fa-2x"></i></a>
       			<?php endif;?>	
       		</div>
       		
		</header>