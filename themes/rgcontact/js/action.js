$(function(){

	var rtn = $('.rtn');
	var btn   = $('button[name="submit"]');
	var path  = 'themes/rgcontact/php/action.php';

	btn.attr("type","submit");
	
	/*DEFAULT ajax Load*/
	function debugjs(datas){
		rtn.empty().html('<pre>'+datas+'</pre>');
	}
	function successjs(datas){
		if(datas.jrtn){
			rtn.queue(function(){$(this).fadeOut('slow').dequeue();});
			rtn.queue(function(){$(this).empty().css('display','block').dequeue();});
			rtn.queue(function(){
				$(this).fadeOut(function(){
					$(this).html("<div class='trigger success'><span>O registro <strong>"+datas.nome+"</strong> foi efetuado com sucesso.</span></div>").fadeIn(1500);
				}).dequeue();	
				rtn.queue(function(){$(this).fadeOut(2000).dequeue();});		
			});
		}else{
			rtn.queue(function(){$(this).fadeOut('slow').dequeue();});
			rtn.queue(function(){$(this).empty().css('display','block').dequeue();});
			rtn.queue(function(){
				$(this).fadeOut(function(){
					$(this).html("<div class='trigger error'><span>Preencha os campos obrigatórios.</span></div>").fadeIn(1500);
				}).dequeue();
				rtn.queue(function(){$(this).fadeOut(2000).dequeue();});			
			});
		}
	}
	function errorjs(){
		rtn.empty().css('display','block');
		rtn.empty().html("<div class='trigger info'><span>Erro no sistema, contacte o administrador.</span></div>");
	}
	function loadjs(){
		rtn.empty().css('display','inline-block');
		rtn.empty().html("<div class='xs-load'></div>");
	}
	$.ajaxSetup({
		type : 'POST',		
		url  : path,
		dataType: 'json',
		beforeSend : loadjs,
		success : successjs,
		error : errorjs
	});

	/*REGISTER - client*/
	var form  = $('form[name="registerform"]');
	form.submit(function(){
		var run = "&run=register";
		var sdados = form.serialize();
		var dados = sdados + run;
		$.ajax({
			data : dados
		});
		return false;
	});
});