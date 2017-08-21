$(function(){

	var rtn = $('.rtn');
	var form  = $('form[name="registerform"]');
	var btn   = $('button[name="submit"]');
	var path  = 'themes/rgcontact/php/action.php?run=register';

	btn.attr("type","submit");
	
	function debugjs(datas){
		rtn.empty().html('<pre>'+datas+'</pre>');
	}
	
	function successjs(datas){		
		rtn.empty().css('display','block');
		//rtn.empty().html('<pre>'+datas+'</pre>');
		rtn.empty().html("<div class='trigger success'><span>"+datas+"</span></div>");
	}
	function errorjs(){
		rtn.empty().html('<h1>Erro ao Enviar</h1>');
	}
	function loadjs(){
		rtn.empty().css('display','inline-block');
		rtn.empty().html("<div class='xs-load'></div>");
	}

	

	form.submit(function(){
		var dados = form.serialize()
		$.ajax({
			type : 'POST',
			url  : path,
			data : dados,
			beforeSend : loadjs,
			success : successjs,
			error : errorjs
		});
		return false;
	});
});