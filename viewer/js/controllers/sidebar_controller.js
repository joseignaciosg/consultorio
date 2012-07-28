$(document).ready(function() {
	
			var company = getCookie("company");
			$.Controller("Sidebar", {
				"ul li #show  click" : function() {//image clicks
					setCookie("click_type", 1);
					var jump = $("body").find("#jump").attr("value");
					$("#click_viewer").empty().html('<img id="loader" src="../resources/images/loader.gif" alt="" />');

					$("#click_viewer").load("../php/showClicks.php?last_register=0&jump="+jump+"&func=1&company="+ company+"&type="+1);
					$("#breadscrumbs").html(
							"<ul><li><a id=\"prevpage\" href=\"#\">Pagina Anterior</a></li>" + "<li> - </li>"
									+ "<li><a id=\"nextpage\" href=\"#\">Pagina Siguiente</a></li></ul>");
					$('#breadscrumbs').breadscrumbs();
					$("body").find("#last_register_type1").attr("value",parseInt(jump));	
					//seting Shoclicks controller
					$("#click_viewer").showclicks();
				},
				"ul li #showclicks  click" : function() {//link clicks
					setCookie("click_type", 2);
					var jump = $("body").find("#jump").attr("value");
					$("#click_viewer").empty().html('<img id="loader" src="../resources/images/loader.gif" alt="" />');

					$("#click_viewer").load("../php/showClicks.php?last_register=0&jump="+jump+"&func=1&company="+ company+"&type="+2);
					$("#breadscrumbs").html(
							"<ul><li><a id=\"prevpage\" href=\"#\">Pagina Anterior</a></li>" + "<li> - </li>"
									+ "<li><a id=\"nextpage\" href=\"#\">Pagina Siguiente</a></li></ul>");
					$('#breadscrumbs').breadscrumbs();
					$("body").find("#last_register_type2").attr("value",parseInt(jump));	
					//seting Showclicks controller
					$("#click_viewer").showclicks();
				},
				"ul li #gen_track_link  click" : function() {
					$("#breadscrumbs").empty();
					$("#click_viewer").empty().html('<img id="loader" src="../resources/images/loader.gif" alt="" />');
					$("#click_viewer").load("../html/trackLinkForm.html");
					$("#click_viewer").tracklinkform();
				}
				
			});
			
});