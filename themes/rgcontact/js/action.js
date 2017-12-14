/*
	[DOCUMENTS]
 - required "<div class="load-ajax"></div>" in file for load variable.
 - required "<div class="msg-ajax"></div>" in file for msg variable.
 - required insert name "submit" on button for btn_submit variable.
 - required "<meta name="theme" content="url"/>" in file for url_home variable. 
 - in case required fields, use class ".require".
 */
$(document).ready(function(){
	/*
		[CHECKOUT javascript]
		Somente quando o javascript estiver ativo, a tag <button>
		recebe o atributo type como submit para submeter o formulário.
	*/
	var btn_submit   = $('button[name="submit"]');
 	btn_submit.attr("type","submit");
	
	/*	[GLOBAL variables]*/
	var msg = $('.msg-ajax');
	var load = $('.load-ajax');
    var url_home = $("meta[name=theme]").attr("content");
 	var path  = url_home + '/php/action.php';
 	var form  = $('form[name="registerform"]');
 	var require = $('.require'); // Validação por campo
 	
 	/*	[REGISTER] - Client*/
 	form.submit(function(){
 		var run = "&run=register"; /*Seleciona a Ação no arquivo action.php*/
 		var serialize = form.serialize();/*Recupera dados do formulário do atributo [name] dos input*/
 		var dados = serialize + run;
 		$.ajax({
 			url : path,
 			type : 'POST',
 			data : dados,
 			dataType: 'json',
 			beforeSend : function(){
 				load.css('display','inline-block');
 				load.html("<div class='xs-load'></div>");
 			},
 			success : function(datas){
 				load.fadeOut('slow').queue(function(){
	 					if(datas.rtnjs){
	 						if($('.trigger').is(":visible")){
								msg.fadeOut('slow').queue(function(){
			 						$(this).fadeIn('slow');
			 						$(this).html("<div class='trigger success'><span>O registro <strong>"+datas.nome+"</strong> foi efetuado com sucesso.</span></div>");
				 					$(this).dequeue();
			 					})
	 						}else{
	 							msg.toggle(function(){
				 					$(this).html("<div class='trigger success'><span>O registro <strong>"+datas.nome+"</strong> foi efetuado com sucesso.</span></div>");
				 					$(this).fadeIn('slow');				 								 					
			 					});
	 						}
			 				form.find("input[type=text],input[type=email]").val('');
			 			}else{
			 				if($('.trigger').is(":visible")){
			 					msg.fadeOut('slow').queue(function(){
			 						$(this).fadeIn('slow');
			 						$(this).html("<div class='trigger error'><span>Preencha os campos obrigatórios.</span></div>");
				 					$(this).dequeue();
			 					})
			 				}else{
			 					msg.toggle(function(){
				 					$(this).html("<div class='trigger error'><span>Preencha os campos obrigatórios.</span></div>");
				 					$(this).fadeIn('slow');				 					
			 					});
			 				}
			 				 				
			 			}
 					$(this).dequeue();
 				});
 				return false;
 				console.log(datas);
			},
			error:function(exception){
				console.log(exception);
 				load.queue(function(){$(this).fadeOut('slow').dequeue();});
 			}
 		});
 	   return false;
 	
 	});

 	/*	[READ] - Client*/
 	var loadclient = $('.loadclient');
 	var tableclient = $('.client-ajax');
 	var moreclient = $('.moreclient');
 	tableclient.empty();
 	$.ajax({
 		url : path,
 		type : 'POST',
 		data :"run=readAll&offset=0&limit=2",
 		beforeSend: '',
 		error:'',
 		success: function(data){
 			tableclient.append(data);
 			console.log(data);
 		}
 	});
	/*
		[CHECKOUT field]
		Quando sair do campo em foco e o mesmo permanecer vazio,
		será adicionado uma borda vermelha sinalizando o preenchimento
		obrigatório.
	*/
	require.blur(function () {
 		if ($(this).val().length === 0 ) {
 			$(this).addClass('warning');
 			console.log(upCaseWord($(this).attr('name'),4));
 		}else{
 			$(this).removeClass('warning');
 		}
 	});

	/*	[DEBUG development]*/
 	function debugjs(datas){
 		msg.empty().html('<pre>'+datas+'</pre>');
 	}
});