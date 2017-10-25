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
		$('#frmBuscar').submit();
	});
	
	/*ordenacao produtos*/
	$('.btnOrder ').click(function(){
		setUrlParams({o:$(this).attr('data-val'), p:1});
	});
	
});