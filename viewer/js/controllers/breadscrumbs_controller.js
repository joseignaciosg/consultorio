$(document).ready(function() {

			var company = getCookie("company");
//			alert(company);
			var jump = $("body").find("#jump").attr("value");
			
			$.Controller("Breadscrumbs", {
				"#nextpage click" : function() {
					var type = getCookie("click_type");
					type = parseInt(type);
					var last_register = $("body").find("#last_register_type1").attr("value");
						switch(type){
							case 1: 
								last_register = $("body").find("#last_register_type1").attr("value");
								break;
							case 2:
								last_register = $("body").find("#last_register_type2").attr("value");
								break;
						}
						var jump = $("body").find("#jump").attr("value");
						
						$("#click_viewer").empty().html('<img id="loader" src="../resources/images/loader.gif" alt="" />');
						
						$("#click_viewer").load("../php/showClicks.php?last_register="+last_register+"&jump="+jump+"&func=1&company="+ company+"&type="+type);
						var aux = parseInt(last_register)+parseInt(jump);
						switch(type){
							case 1: 
								$("body").find("#last_register_type1").attr("value",aux);
								break;
							case 2:
								$("body").find("#last_register_type2").attr("value",aux);
								break;
						}
				},
				"#prevpage click" : function() {
						var type = getCookie("click_type");
						type = parseInt(type);
						var last_register = $("body").find("#last_register_type1").attr("value");
						switch(type){
							case 1: 
								last_register = $("body").find("#last_register_type1").attr("value");
								break;
							case 2:
								last_register = $("body").find("#last_register_type2").attr("value");
								break;
						}
						var aux = parseInt(last_register)-parseInt(jump);
						if( aux == 0 ){
							 $.msg({  content : "No hay p&aacute;ginas previas.",
				          		});
						}
						if (aux > 0 ){
							$("#click_viewer").empty().html('<img id="loader" src="../resources/images/loader.gif" alt="" />');
							$("#click_viewer").load("../php/showClicks.php?last_register="+last_register+"&jump="+jump+"&func=-1&company="+ company+"&type="+type);
							switch(type){
								case 1: 
									$("body").find("#last_register_type1").attr("value",aux);
									break;
								case 2:
									$("body").find("#last_register_type2").attr("value",aux);
									break;
							}						}else{
							switch(type){
								case 1: 
									$("body").find("#last_register_type1").attr("value",aux);
									break;
								case 2:
									$("body").find("#last_register_type2").attr("value",aux);
									break;
							}
						}						
				},
			});
			
});