$(document).ready(function(){
	$('#catagory').change(function(){
		var value = $(this).val();
		$.post('cat_process.php', {catagory: value}, function(data){
			var options = "<option value='none'>Please wait...</option>";
			$('#sub_catagory').html(options);

			options = "<option value='none'>Select Sub Catagory</option>";
			$.each(data, function(key, value){
				options += "<option value='"+value+"'>"+value+"</option>";
			});

			$('#sub_catagory').html(options);
		}, "json");
	});
	var product_quantity = $('#product_quantity').val();

	$("#total_amount").focus(function(){
		if(product_quantity < 1){
			product_quantity = 1;
		}else{
			product_quantity = $('#product_quantity').val();
		}
		$(this).val(product_quantity * $('#product_amount').val());
	});

	$('#product_quantity, #product_amount').change(function(){	
		if(product_quantity < 1){
			product_quantity = 1;
		}else{
			product_quantity = $('#product_quantity').val();
		}
		
		$('#total_amount').val(product_quantity * $('#product_amount').val());

	});
	$("#show_all").click(function(){
		window.location.href = "products.php";
	});
	$('.delete_btn').click(function(){
		var dis = $(this);
		dis.parent().append('<div id="dialog_box" style="display: none;"><center><h3>Are you sure you want to delete this?</h3></center></div>');
		var del_id = dis.attr('data-id');

		$('#dialog_box').dialog({
		  title: '',
		  width: 500,
		  height: 300,
		  modal: true,
		  resizable: false,
		  draggable: false,
		  buttons: [{
		  text: 'Yes',
		  click: function(){
		  	$.post('del_process.php', {id: del_id}, function(data){
		  		if(data){
		  			location.reload();
		  		}else{
		  			alert('something went wrong try later.');
		  		}
		  	});
		    $(this).dialog('close').remove();
		    }
		  },
		  {
		  text: 'No',
		  click: function() {
		      $(this).dialog('close').remove();
		    }
		  }]
		});
	});
	$('.edit_btn').click(function(){
		var edit_id = $(this).attr('data-id');
		window.location.href = "edit_product.php?id="+edit_id;

	})



})//document.ready