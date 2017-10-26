<?php 
$erro = $ok = false;
$erroMsg = $okMsg = "";

// se nao ta logado so consegue fazer novo cadastro
if (!isset($_SESSION['user_id']) && isset($_POST['email'])){
	
	if ($md->verificaEmail($_POST['email'])) {
		$erro = true;
		$erroMsg = "Email já cadastrado!";
	}else{
		$cad = $md->setUsuario($_POST);
		if ($cad === true){
			$ok = true;
			$okMsg = "Cadastro efetuado com sucesso!";
		}else{
			$erro = true;
			$erroMsg = "Um erro ocorreu, tente novamente mais tarde! : (".$cad.")";
		}
	}
	
// se ta logado só faz update
}elseif(isset($_SESSION['user_id']) && isset($_POST['email'])){
	// pega dados do usuario
}

?>
<div class="container-fluid">
	<div class="row container-formulario">
		<div class="col-md-10">
		
		<?php if ($erro) :?>
			<div class="alert alert-danger" role="alert"><?php echo $erroMsg; ?></div>
		<?php elseif ($ok):?>
			<div class="alert alert-success" role="alert"><?php echo $okMsg; ?></div>
		<?php endif; ?>	
		
		
			<form class="form-horizontal" name="frmNew" id="frmNew" method="post" action="">
			
				<ul class="nav nav-tabs">
		  			<li role="presentation" class="active"><a class="lg" href="javascript:void(0);">Login</a></li>
		  			<li role="presentation"><a class="end" href="javascript:void(0);">Endereço</a></li>
				</ul>
	
				<input type="hidden" name="user_id" id="user_id" value="<?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:'';?>">
				
				<div class="div-lg">
					<div class="form-group">
				    	<label class="control-label col-sm-2" for="email">Email:</label>
				    	<div class="col-sm-10">
				    		<input type="email" class="form-control" id="email" name="email" placeholder="Informe seu email" value="<?php echo (isset($_POST['email']))?$_POST['email']:''; ?>">
				    	</div>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="senha">Senha:</label>
				    	<div class="col-sm-10"> 
				    		<input type="password" class="form-control" id="senha" name="senha" placeholder="Informe uma senha">
				    	</div>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="senha2">Re-digite a senha:</label>
				    	<div class="col-sm-10"> 
				    		<input type="password" class="form-control" id="senha2" name="senha2" placeholder="Re-digite a senha">
				    	</div>
				  	</div>
			  	</div>
			  	
			  	<div class="div-end" style="display:none">
					<div class="form-group">
				    	<label class="control-label col-sm-2" for="logradouro">Logradouro:</label>
				    	<div class="col-sm-10">
				    		<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe seu endereço" value="<?php echo (isset($_POST['logradouro']))?$_POST['logradouro']:''; ?>">
				    	</div>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="numero">Número:</label>
				    	<div class="col-sm-10"> 
				    		<input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o número" value="<?php echo (isset($_POST['numero']))?$_POST['numero']:''; ?>">
				    	</div>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="bairro">Bairro</label>
				    	<div class="col-sm-10"> 
				    		<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro" value="<?php echo (isset($_POST['bairro']))?$_POST['bairro']:''; ?>">
				    	</div>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" for="cep">CEP</label>
				    	<div class="col-sm-10"> 
				    		<input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP" value="<?php echo (isset($_POST['cep']))?$_POST['cep']:''; ?>">
				    	</div>
				  	</div>
			  	</div>
			  	
			  	
			  
			  	<div class="form-group"> 
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<button name="btnNew" id="btnNew" type="submit" class="btn btn-default">Enviar</button>
			    	</div>
			  	</div>
			</form>
		</div>
	</div>
</div>