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
		
		<!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	</head>
	
	<body>
		<div class="container-fluid">
			<header class="row">
				<div class="col-md-2">
					<!-- <img alt="teste php mobly" src="images/logo-mobly4.svg" width="120">  -->
				</div>
       			<div class="col-md-6">
       				<form method="GET" action="/" id="frmBuscar" name="frmBuscar" >
       					<input type="hidden" name="p" value="1">
       					<input class="busca" type="text" name="texto" id="texto" placeholder="Pesquise um produto" maxlength="200" value="<?php echo (isset($_GET['texto']) && strlen($_GET['texto'] > DB_MIN_FT)) ? $_GET['texto'] : ''; ?>">
       					<button type="button" class="btn btn-info" id="btnTopoBuscar">
					      <i class="fa fa-search"></i> Pesquisar
					    </button>
       				</form>
       			</div>
       			<div class="col-md-4">
       				<i class="fa fa-shopping-cart fa-2x"></i>
       				<i class="fa fa-user fa-2x"></i>
       				<i class="fa fa-user-times fa-2x"></i>
       				
       			</div>
			</header>