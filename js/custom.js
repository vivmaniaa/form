$(document).ready(function(){
	$('#catagory').change(function(){
		var value = $(this).val();
		$.post('cat_process.php', {catagory: value}, function(data){
			var options = "<option value='none'>Select Sub Catagory</option>";
			$.each(data, function(key, value){
				options += "<option value='"+value+"'>"+value+"</option>";
			});

			$('#sub_catagory').html(options);
		}, "json");
	});

	$("#total_amount").focus(function(){
		$(this).val($("#product_quantity").val() * $('#product_amount').val());
	})
})