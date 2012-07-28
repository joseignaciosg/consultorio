$(document).ready(function(){

			$.Controller("Entrance", {
				"form submit": function (){
					setCookie("company", 1); //default CM
					/*var vec = loc.split("?");
					var aux = vec[1];
					vec = aux.split("=");
					var arg1 = vec[0];
					var company = vec[1];*/
					var company = $("select option:selected").val();
//					alert(company);
					setCookie("company", company); 

					window.location = "http://www.doctorjosegalindo.com/consultorio/viewer/html/viewer.html"
					return false;
				}
			});
			
			$("body").entrance();
});
			

