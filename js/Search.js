$(document).ready(function() {
	$("#result").hide();

	function load_show(){
		$("#loading").html("<img src = 'img/loading.gif' />").fadeIn('fast');
	}
	function load_hide(){
		$("#loading").fadeOut('fast');
	}
	$("#keyword").keyup(function(event){
		var keyword = $("#keyword").val();

		if(keyword != 0){
			load_show();
			$.ajax({
				type: "POST",
				data:({keyword:keyword}),
				url: "quicksearch.php",
				success: function(response){
					load_hide();
					$("#result").slideDown().html(response);
				}
			})
		}else{
			$("#result").slideUp();
			$("#result").val("");
		}
	})

})