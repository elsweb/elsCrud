//DOCUMENT
/*
 - required "<div class="rtn"></div>" in file for rtn variable.
 - required insert name "submit" on button for btn variable.
 - required "<meta name="theme" content="url"/>" in file for theme variable. 
 - in case required fields, use class ".require".
 */

 $(function(){
 	var rtn = $('.rtn');
 	var btn   = $('button[name="submit"]');
 	var theme = $("meta[name=theme]").attr("content");
 	var path  = theme + '/php/action.php';
 	var require = $('.require');

 	btn.attr("type","submit");
 	/*DEFAULT ajax Load*/
 	function debugjs(datas){
 		rtn.empty().html('<pre>'+datas+'</pre>');
 	}
 	function successjs(datas){
 		if(datas.rtnjs){
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
 	function errorjs(msg){
 		rtn.empty().css('display','block');
 		if(msg){
 			rtn.empty().html("<div class='trigger info'><span>"+msg+"</span></div>");
 		}else{
 			rtn.empty().html("<div class='trigger info'><span></span>Erro no sistema, contacte o administrador.</div>");
 		}

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
 	require.blur(function () {
 		if ($(this).val().length === 0 ) {
 			$(this).addClass('warning');
 			console.log(upCaseWord($(this).attr('name'),4));
 		}else{
 			$(this).removeClass('warning');
 		}
 	});

 	/*REGISTER - client*/
 	var form  = $('form[name="registerform"]');
 	form.submit(function(){
 		var run = "&run=register";
 		var sdados = form.serialize();
 		var dados = sdados + run;
 		$.ajax({
 			data : dados,
 			complete : function(datas){
 				//location.href="http://www.elsweb.com.br";
 				//console.log(datas.responseJSON.rtnjs);
 				if(datas.responseJSON.rtnjs){
 					form.find("input[type=text],input[type=email]").val('');
 				}else{
 					console.log('campos em branco');
 				}
 				
 			}
 		});
 		return false;
 	});
 });
//$(this).replaceWith('<input type="text" name="txt_nome" class="form-control require warning"><span>Campo Obrígatório</span>');