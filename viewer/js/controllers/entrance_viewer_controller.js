$(document).ready(function(){

			$.Controller("Entranceviewer", {
				init: function (){
					var company = getCookie("company"); 
					setCookie("company", company); 
				   $.msg({ content : 'Bienvenido' });

					var hrefnews;
					var hrefcamp;
					var hrefcountry;
					var hrefdownload;
					var img; 
					if(company==1){
						$("#by_news").attr("href","../php/genNewsPie.php?company=1");
						$("#company_name").html("Consultorio del Dr. Galindo").fadeIn(1000);
						hrefnews = "../php/genNewsPie.php?company=1";
						hrefcamp ="../php/genCampPie.php?company=1";
						hrefcountry = "../php/genGeoChart.php?company=1";
						hrefdownload = "../php/downloadClicks.php?company=1";
						img = "../resources/images/logo_CM.jpg";
					}else if (company==2){
					Á
					}
					
					$("#by_news").attr("href",hrefnews);
					$("#by_camp").attr("href",hrefcamp);
					$("#by_country").attr("href",hrefcountry);
					$("#download").attr("href",hrefdownload);
					$("#logo img").attr("src",img);
					
					
			},
			"#log_out click":function(){
				deleteCookie("company");
				window.location = "http://www.doctorjosegalindo.com/consultorio/viewer";
			}
		});
			
});
	