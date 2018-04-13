<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ITC2 Test</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/jquery/jquery.min.js"></script>
	<script src="assets/jquery/jquery-1.12.4.js"></script>
	<script src="assets/jquery/jquery.dataTables.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">

	.container {
		padding:30px;
	}
	.container table, .dataTables_wrapper {
		margin-top: 30px;
	}
	.table-bordered {
		font-weight: bold;
	}
	tbody.total-product {
	    font-weight: normal;
	}

</style>
<body>
<div class="container col-md-12">
	<div class="col-md-8 left">
		<div class="table-responsive">	
			<table id="example" class="display table">
		        <thead>
		            <tr>		
		                <th>Product id</th>
		                <th>Product Name</th>
		                <th>Product Price</th>
		                <th>Product Weight</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($products as $product):?>
					    <tr>
							<td><?php echo $product['id']; ?></td>
							<td><?php echo $product['name']; ?></td>
							<td><?php echo '$'.$product['price']; ?></td>
							<td><?php echo $product['weight'].'g'; ?></td>
		            	</tr>
					<?php  endforeach?>
		        </tbody>
		        <tfoot>
		            <tr>		
		                <th>Product Name</th>
		                <th>Product Price</th>
		                <th>Product Weight</th>
		            </tr>
		        </tfoot>
		        <div>
		    	    <button id="button" class="btn btn-primary">Save</button>
		        </div>

		    </table>
		 </div>
	</div>
	<div class="col-md-4 right">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td class="qty">User added</td>
						</tr>
						<tr>
							<td class="totalWeight">Total Weight: </td>
						</tr>
						<tr> 
							<td>Total Price: </td>
						</tr>
					</thead>
				</table>
			</div>
		</div>

		<div class="col-md-12">
			<div class="table-responsive">

				<table class="table table-bordered">

					
					<thead >
						<tr><td class="" colspan="3">Package 1</td></tr>
					</thead>
					<tbody class="total-product">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

</body>
</html>	
<script type="text/javascript">
	$(document).ready(function() {
	    var table = $('#example').DataTable();
	 
	    $('#example tbody').on( 'click', 'tr', function () {
	        $(this).toggleClass('selected');
	    } );
	 
	    $('#button').click( function () {
	    	$('.total-product').empty();
	    	var data = table.rows('.selected').data();
	    	$(".qty").html('User added '+table.rows('.selected').data().length + ' items')
	    	console.log(data);
	    	
	    	allFields = $( [] ).add( data );

	    	for(i=0;i<=data.length;i++){
	    		$('.total-product').append('<tr ><td >'+data[i][1]+'</td><td >'+data[i][2]+'</td><td class="totalWeight">'+data[i][3]+'</td></tr>');
	    	}

			 var TotalValue = 0;
			    $(".total-product tr").each(function(){
			          TotalValue += parseFloat($(this).find('.totalWeight').text());
			    });
			    alert(TotalValue);

			$.ajax({
			 type: "POST",
			 url: "<?php echo site_url('Products/insertProduct') ?>",
			 data: allFields,
				 success: function() {
				 	console.log(allFields);
				 }	
			});


	    });
	} );
</script>

