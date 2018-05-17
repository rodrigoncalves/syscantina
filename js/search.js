$(document).ready(function(){
	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	});
});

$('#filter').change(function() {
		var val = $("#filter option:selected").val();
		$("#myTable tr").filter(function() {
			$(this).toggle(true);
		});

		if (val == "finalizados") {
			$("#myTable tr.pendent").filter(function() {
				$(this).toggle(false);
			});
		} else if (val == "pendentes") {
			$("#myTable tr.success").filter(function() {
				$(this).toggle(false);
			});
		}
});
