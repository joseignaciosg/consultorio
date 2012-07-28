$(document).ready(function() {

			$.Controller("Showclicks", {
				"#deltuple click" : function(tuple) {
					var tupleid = tuple.attr("href");
					var trTodel = "#"+tupleid;
					$(trTodel).fadeOut(1000);
					$.ajax({
						type: "POST",
				      url: '../php/deleteTuple.php',
				      data: 'tupleid='+parseInt(tupleid),
						success: function(data){
//							alert("deleted:"+data);
						}
					});
					
					return false;
				}
			});
			
});