$(document).ready(function(){
	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
			console.log($(this).text().toLowerCase());
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	});
});
