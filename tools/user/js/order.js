$(document).ready(function(){
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(this).attr("remove_id");
		$.ajax({
			url	:	"delete_order",
			method	:	"POST",
			data	:	{removeItem:1,rid:remove_id},
			success	:	function(data){
				$("#showcart").html(data);
				window.setTimeout(function(){window.location.reload()},10)
			}
		})
	})
	$('.inc').click(function(){
		var prod_id = $(this).attr('prod_id');
		var qty1 = $("#qty-"+prod_id).val();
		var total_count = parseInt(qty1) + 1;
		$("#qty-"+prod_id).val(total_count);
											
		var row = $("#qty-"+prod_id).parent().parent();
		var price = row.find(".price").val();
		var qty = row.find(".quantity").val();
		var update_id = row.find(".quantity").attr("update_id");
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		$(".total-"+prod_id).val(total);
		$(".total-"+prod_id).html('&#x20B1 ' +total+'.00');
		$(".cartqty-"+prod_id).html(qty +'x');
								
		$.ajax({
			url	:	"/update_order",
			method	:	"POST",
			data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
			success	:	function(data){
				$(".total_price").html('&#x20B1 ' +data+'.00');
				$("#total_amt").val(data);
													
				var delivery = $("#deliverycost").val();
				var t_amt = $("#total_amt").val();
				if(delivery == 0){
					$("#total_order").html('');
					$("#totalorder").val(0);
					
				}else{
					var total = parseInt(delivery) + parseInt(t_amt);
					$("#total_order").html('&#x20B1 ' +total+'.00');
					$("#totalorder").val(total);
					
				}
			}
		});
	});
	$('.dec').click(function(){
		var prod_id = $(this).attr('prod_id');
		var qty1 = $("#qty-"+prod_id).val();
		if(parseInt(qty1) > 1){
			var total_count = parseInt(qty1) - 1;
			$("#qty-"+prod_id).val(total_count);
		}else{
			var total_count = 1;
			$("#qty-"+prod_id).val(total_count);
		}
		
		
											
		var row = $("#qty-"+prod_id).parent().parent();
		var price = row.find(".price").val();
		var qty = row.find(".qty").val();
		var update_id = row.find(".qty").attr("update_id");
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		$(".total-"+prod_id).val(total);
		$(".total-"+prod_id).html('&#x20B1 ' +total+'.00');
		$(".cartqty-"+prod_id).html(qty +'x');
											
		$.ajax({
			url	:	"update_order",
			method	:	"POST",
			data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
			success	:	function(data){
				$(".total_amt").html('&#x20B1 ' +data+'.00');
				$("#total_amt").val(data);
													
				var delivery = $("#deliverycost").val();
				var t_amt = $("#total_amt").val();
				if(delivery == 0){
					$("#total_order").html('');
					$("#totalorder").val(0);
				}else{
					var total = parseInt(delivery) + parseInt(t_amt);
					$("#total_order").html('&#x20B1 ' +total+'.00');
					$("#totalorder").val(total);
				}						
			}
		});
	});
	$('.checked').click(function(){
		var prod_id = $(this).val();
		$.ajax({
			url	:	"check_order",
			method	:	"POST",
			data	:	{prod_id:prod_id},
			success	:	function(data){
				$('#CheckProd').html(data);
				var row = $("#qty-"+prod_id).parent().parent();
				var price = row.find(".price").val();
				var qty = row.find(".qty").val();
				var update_id = row.find(".qty").attr("update_id");
				if (isNaN(qty)) {
					qty = 1;
				};
				if (qty < 1) {
					qty = 1;
				};
				var total = price * qty;
				$(".total-"+prod_id).val(total);
				$(".total-"+prod_id).html('&#x20B1 ' +total+'.00');
				$.ajax({
					url	:	"update_order",
					method	:	"POST",
					data	:	{updateItem:1,update_id:update_id,qty:qty, total:total},
					success	:	function(data){
						if(data != 0){
							$(".total_amt").html('&#x20B1 ' +data+'.00');
							$("#total_amt").val(data);
						}else{
							$(".total_amt").html('');
							$("#total_amt").val(data);
						}
						$.ajax({
							url	:	"get_additional",
							method	:	"POST",
							data	:	{},
							success	:	function(data){
								$("#addtion").val(data);
								$.ajax({
									url: "check_cart",
									method	:	"get",
									data	:	{},
									success	:	function(data){
										var addtion =$("#addtion").val();
										var costs = parseInt(data) + parseInt(addtion);
										if(costs == 0  || costs =='' ||  isNaN(costs)){
											$("#delivery_cost").html('Not Available');
											$("#deliverycost").val(0);
										}else{
											$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
											$("#deliverycost").val(costs);
										}
										
										var delivery = $("#deliverycost").val();
										var t_amt = $("#total_amt").val()
										var total = parseInt(delivery) + parseInt(t_amt);
										
										if(delivery == 0){
											$("#total_order").html('');
											$("#totalorder").val(0);
											if(t_amt == 0 || t_amt == ''){
												$('#submit').attr('disabled', true)
												$('#submit').removeAttr('href')
											}else{
												$('#submit').attr('href', "checkout")
												$('#submit').removeAttr('disabled')
											}
											
										}else{
											
											$("#total_order").html('&#x20B1 ' +total+'.00');
											$("#totalorder").val(total);
											$('#submit').attr('href', "checkout")
											$('#submit').removeAttr('disabled')
										}
									}
							});	
						}
					});
				}
			});
			}
		});
	});
	$('.checked_all').change(function(){
	var store_id = $(this).val();
	var checked = $(this).is(':checked');
	if(checked){
		$(".checked"+store_id).each(function(){
			$(this).prop('checked', true)
			$.ajax({
				url	:	"check_all_order",
				method	:	"POST",
				data	:	{store_id:store_id},
				success	:	function(data){
					$('#CheckProd').html(data);
					$.ajax({
						url	:	"get_additional",
						method	:	"POST",
						data	:	{},
						success	:	function(data){
							$(".addtion").val(data);
							$.ajax({
								url: "check_cart",
								method	:	"get",
								data	:	{},
								success	:	function(data){
									var addtion =$(".addtion").val();
									var costs = parseInt(data) + parseInt(addtion);
									if(costs == 0  || costs =='' || isNaN(costs)){
										$("#delivery_cost").html('Not Available');
										$("#deliverycost").val(0);
									}else{
										$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
										$("#deliverycost").val(costs);
									}
									
										$.ajax({
											url: "t_amt",
											method: "POST",
											data:{},
											success: function(data){
												if(data == 0){
													$(".total_amt").html('');
													$("#total_amt").val(data);
												}else{
													$(".total_amt").html('&#x20B1 ' +data+'.00');
													$("#total_amt").val(data);
													
													var delivery = $("#deliverycost").val();
													var total = parseInt(delivery) + parseInt(data);
													
													if(delivery == 0){
													
														$("#total_order").html('');
														$("#totalorder").val(0);
														if(data == 0 || data == ''){
															$('#btn_checkout').html("<a type='submit' class='btn' id='submit' style='width:100%; background:#ff9100; color:#fff; font-size:22px'  name='submit' value='' disabled ><b>Proceed to Checkout</b></a>");
														}else{
															$('#submit').href = "<?=site_url('user/checkout')?>";
															$('#submit').removeAttr('disabled')
														}
													}else{
														$("#total_order").html('&#x20B1 ' +total+'.00');
														$("#totalorder").val(total);
														$('#submit').href = "<?=site_url('user/checkout')?>";
														$('#submit').removeAttr('disabled')
													}
												}
												
												
												
											}
										})	
								}
							});	
						}
					});
				}
			});
		});
		}else {
			$(".checked"+store_id).each(function(){
				$(this).prop('checked', false)
				$.ajax({
					url	:	"uncheck_all_order",
					method	:	"POST",
					data	:	{store_id:store_id},
					success	:	function(data){
						$('#CheckProd').html(data);
						$.ajax({
							url	:	"get_additional",
							method	:	"POST",
							data	:	{},
							success	:	function(data){
								$(".addtion").val(data);
								$.ajax({
									url: "check_cart",
									method	:	"get",
									data	:	{},
									success	:	function(data){
										var addtion =$(".addtion").val();
										var costs = parseInt(data) + parseInt(addtion);
										
										if(costs == 0  || costs =='' || isNaN(costs)){
											$("#delivery_cost").html('Not Available');
											$("#deliverycost").val(0);
										}else{
											$("#delivery_cost").html('&#x20B1 ' +costs+'.00');
											$("#deliverycost").val(costs);
										}
										
										$.ajax({
											url: "t_amt",
											method: "POST",
											data:{},
											success: function(data){
												if(data == 0){
													$(".total_amt").html('');
													$("#total_amt").val(data);
													$("#total_order").html('');
													$("#totalorder").val(0);
														if(data == 0 || data == ''){
															$('#btn_checkout').html("<a type='submit' class='btn' id='submit' style='width:100%; background:#ff9100; color:#fff; font-size:22px'  name='submit' value='' disabled ><b>Proceed to Checkout</b></a>");
														}else{
															$('#submit').href = "<?=site_url('user/checkout')?>";
															$('#submit').removeAttr('disabled')
														}
												}else{
													$(".total_amt").html('&#x20B1 ' +data+'.00');
													$("#total_amt").val(data);
													
													var delivery = $("#deliverycost").val();
													var total = parseInt(delivery) + parseInt(data);
													
													
														$("#total_order").html('&#x20B1 ' +total+'.00');
														$("#totalorder").val(total);
														$('#submit').href = "<?=site_url('user/checkout')?>";
														$('#submit').removeAttr('disabled')
												}
												
												
												
											}
										})
									}
								});	
							}
						});
					}
				});
			});
		}
	});
	
})