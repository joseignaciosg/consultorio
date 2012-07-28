
$(document).ready(function(){
	
	var company = getCookie("company");

			$.Controller("Tracklinkform", {
				init : function() {
					
					setTimeout(function(){
						$("#news_select").load("../php/getNewslettesOptions.php?company="+company);
					},1000);
				},
				"#gen_link click":function(){
					var newsletter = $("select#news_select option:selected").val();
					var campaigname = $("#campaign_name").val();
					var link ='&lt;img src="http://www.doctorjosegalindo.com/'
						+'consultorio/viewer/imagetrack2.php?name=#name#&mail=#e-mail#&news='+newsletter+'&campaign='
						+campaigname+'&company='+company+'" /&gt';
					
//			        &lt;img src="angry.gif" alt="Angry face" /&gt;    
//					link = escape(link);
//					alert(link);
				   $.msg({  content : "Su link es: "+ link +"",
			          		autoUnblock : false ,

			          		});

//					alert('Su link es:  <img src="http://www.categorymanagement.com.ar/'
//							+'images-nl/imagetrack2.php?name=#name#&mail=#e-mail#&news='+newsletter+'&campaign='
//							+campaigname+'&company='+company+'">');
				}
			});
			
});