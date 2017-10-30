function setUrlParams(params){
	window.location = replaceParams(window.location.href, params);
}

function replaceParams(url, params){
	var qstr = (url.match(/^[^\?]*\?(.+)$/) || [])[1] || '';
	var query = {};
	var a = qstr.split('&');
	for (var i = 0; i < a.length; i++) {
		var b = a[i].split('=');
		query[decodeURIComponent(b[0])] = decodeURIComponent(b[1] || '');
	}

	for(var param in params){
		query[param] = params[param];
	}

	var queries = [];
	for(var param in query){
		var arr = query[param];
		if(!Array.isArray(arr)){
			arr = [arr];
		}
		if(arr.length == 0){
			continue;
		}
		var separator = ',';
		queries.push(param+'='+encodeURIComponent(arr.join(separator)));
	}
	var resultUrl = '//'+window.location.host+'/?'+queries.join('&').replace(/%2B/g,'+');
	return resultUrl;
}

$(document).ready(function(){
	
	/*busca topo*/
	$('#btnTopoBuscar').click(function(){
		if ($('#texto').val().length < 4 ){
			alert('Utilize palavras com 4 ou mais caracteres!');
			return;
		}
		$('#frmBuscar').submit();
	});
	
	/*ordenacao produtos*/
	$('.btnOrder ').click(function(){
		setUrlParams({o:$(this).attr('data-val'), p:1});
	});
	
	/*paginacao*/
	$('a.paginator').click(function(){
		setUrlParams({p:$(this).attr('data-page')});
	});
	
	/* tela cadastro usuario*/
	$('.lg').click(function(){
		$(this).parent('li').addClass('active');
		$('.end').parent('li').removeClass('active');
		$('.div-lg').show();
		$('.div-end').hide();
	});
	/* tela cadastro usuario*/
	$('.end').click(function(){
		$(this).parent('li').addClass('active');
		$('.lg').parent('li').removeClass('active');
		$('.div-end').show();
		$('.div-lg').hide();

	});
	
	/*tela cadastro usuario*/
	$('#btnNew').click(function(e){
		e.preventDefault();
		
		if ( $('#email').val() == '' ) {
			$('.lg').click();
			alert('Preencha o seu email');
			$('#email').focus();
			return;
		}
		
		if ( $('#user_id').val() == '') {
			if ( $('#senha').val() == '' ) {
				$('.lg').click();
				alert('Preencha a sua senha');
				('#senha').focus();
				return;
			}
			
			if ( $('#senha2').val() == '' ) {
				$('.lg').click();
				alert('Preencha a confirmação da sua senha');
				('#senha2').focus();
				return;
			}
		}
		
		if ($('#senha2').val() != $('#senha').val()) {
			$('.lg').click();
			alert('A senha não confere');
			('#senha2').focus();
			return;
		}
		
		if ( $('#logradouro').val() == '' ) {
			$('.end').click();
			alert('Preencha o seu endereço');
			('#logradouro').focus();
			return;
		}
		
		if ( $('#numero').val() == '' ) {
			$('.end').click();
			alert('Preencha o número do seu endereço');
			('#numero').focus();
			return;
		}
		
		if ( $('#bairro').val() == '' ) {
			$('.end').click();
			alert('Preencha o bairro');
			('#bairro').focus();
			return;
		}
		
		if ( $('#cep').val() == '' ) {
			$('.end').click();
			alert('Preencha o cep');
			('#cep').focus();
			return;
		}
		
		$("#frmNew").attr('action', '?g=user').submit();
	});
	
	/* modal login*/
	$('#btnModalLogin').click(function(e){
		e.preventDefault();
		
		$.ajax({
	        url: 'http://testephp.local/login.php',
	        method: "POST",
	        data: {'user': $('#modalEmail').val(), 'pass': $('#modalSenha').val()},
	        dataType: "json",
	    })
	    .done(function( response ){
	    	
	    	console.log(response.retorno);
	    	
	    	if (response.retorno == false) {
	    		$('#modalMsgError').show();
	    		$('#modalEmail').val('');
	    		$('#modalSenha').val('');
	    	}else{
	    		$('#divLoginModal').modal('hide');
	    		location.reload();
	    	}
	    })
	    .error( function (jqXHR, textStatus, errorThrown) {
	    	 console.log("erro :" + textStatus );
	    })
	    .always(function() {
	    });
	});
	
	$('.loginShow').click(function(){
		$('#modalMsgError').hide();
		$('#divLoginModal').modal('show');
		
	});
	
	
	$('#divLoginModal').on('shown.bs.modal', function () {
		$('#modalEmail').focus();
	})
	
	/* detalhes*/
	$('.shop-cart-add').click(function(){
		p = $.cookie('produtos');
		if (p == undefined) {
			p = "";
		}

		p += $(this).attr('data-id')+':1;';
		$.cookie('produtos', p);
		
		document.location.href="//testephp.local/?g=cart";
	});
	
	/* carrinho */
	$('.finalizar-compra').click(function(){
		
		if ($.cookie('user_id')) {
			document.location.href="//testephp.local/?g=finaliza";
		}else{
			alert('Faça o login para finalizar sua compra!');
			$('#divLoginModal').modal('show');
		}
	});
	
	// altera quantidades do cookie de carrinho
	$('.cart-qtd').click(function(){
		id = $(this).attr('data-id');
		qtd = $(this).parent().find('.prod-qtd').val();
		
		p = $.cookie('produtos');
		
		p = p.split(';');
		
		novo_cookie_val = '';
		$.each(p, function(i,item){
			if (item != ''){
				p2 = item.split(':');
				console.log(p2);
				
				if (p2[0] == id){
					p2[1] = qtd;
				}
				
				novo_cookie_val += p2[0]+':'+p2[1]+';';
			}
		});
		
		$.cookie('produtos', novo_cookie_val);
		document.location.href="//testephp.local/?g=cart";
		
	});
	
});


