/*
 Author: Emanuel L.D. Silva
 Author URI: http://elsweb.com.br/
 Year 2016
 Version: 1.0
 License: copyright all rights reserved
 Text Domain: elsweb
 */

 /*Convert uppercase first word.*/
 function upCaseWord(wd,qtd){
 	var nr = wd.substring(qtd);
 	var word = nr.charAt(0).toUpperCase() + nr.slice(1);
 	return word;
 }