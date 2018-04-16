<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ITC2 Test</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/select.dataTables.min.css">

	<!-- Latest compiled and minified JavaScript -->
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
	.table-bordered , .bold{
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
		            	<th></th>
		                <th>Product id</th>
		                <th>Product Name</th>
		                <th>Product Price</th>
		                <th>Product Weight</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($products as $product):?>
					    <tr>
					    	<td></td>
							<td><?php echo $product['id']; ?></td>
							<td><?php echo $product['name']; ?></td>
							<td><?php echo '$'.$product['price']; ?></td>
							<td><?php echo $product['weight'].'g'; ?></td>
		            	</tr>
					<?php  endforeach?>
		        </tbody>
		        <tfoot>
		            <tr>		
		            	<th></th>
		                <th>Product id</th>
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
							<td class="totalPrice">Total Price: </td>
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

	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gagal</h4>
        </div>
        <div class="modal-body">
          <p>Pilih produk.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>	
<script type="text/javascript">
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
				        columnDefs: [ {
				            orderable: false,
				            className: 'select-checkbox',
				            targets:   0
				        } ],
				        select: {
				            style:    'os',
				            selector: 'td:first-child'
				        },
				        order: [[ 1, 'asc' ]]
				    } );
	    $('#example tbody').on( 'click', 'tr', function () {
	        $(this).toggleClass('selected');
	    } );
	 
	    $('#button').click( function () {

	    	$('.total-product').empty();
	    	var data = table.rows('.selected').data();
	    	dataLength =table.rows('.selected')["0"].length;

	    	if (dataLength > 0) {


				var allFields = $( [] ).add( data );
				    totalWeight = [];
				    totalPrice = [];

				$(".qty").html('User added '+table.rows('.selected').data().length + ' items');

				for (var i  = 0; i < allFields.length; i++){

				   totalWeight.push(parseInt(allFields[i][4].replace("g","")));
				   totalPrice.push(parseInt(allFields[i][3].replace("$","")));
				}

				if (totalWeight.reduce(getSum) >1000) {

					// $('.modal-body').html('Berat tidak boleh lebih dari 1000')
	    // 		    $('#myModal').modal('toggle');
	    		    
	    		    alert('Berat tidak boleh lebih dari 1000g');
	    		    location.reload();
					return false;
				}
				if (totalPrice.reduce(getSum)>251) {
					
					// $('.modal-body').html('Total tidak melibihi $250')
	    		    // $('#myModal').modal('toggle');
	    		    alert('Total tidak melibihi $250');
	    		    location.reload();
					return false;
				}

				function getSum(total, num) {
						return total + num;
				}
				// console.log(total.reduce(getSum));

				$(".totalWeight").html('Total Weight: '+totalWeight.reduce(getSum)+ 'g');
				$(".totalPrice").html('Total Price: $'+totalPrice.reduce(getSum));

				for(i=0;i<data.length;i++){
					row = 	'<tr >'+
							    '<td >'+data[i][1]+'</td>'+
							    '<td >'+data[i][2]+'</td>'+
							    '<td class="totalWeight">'+data[i][3]+'</td>'+
						    '</tr>';
					$('.total-product').append(row);
				}

				shippingPrice = totalWeight.reduce(getSum);
				switch (true) {
				    case (shippingPrice <= 200):
				         detailShipping	= '1-200gram : $5';
				         shippingPrice = '5';
				        break;
				    case (shippingPrice >= 201 && shippingPrice < 500):
				         detailShipping	= '201-500gram : $10';
				        shippingPrice = '10';
				        break;
				    case (shippingPrice >= 501 && shippingPrice <= 1000):
				         detailShipping	= '501-1000gram : $15';
				         shippingPrice = '15';
				        break;
				}

				total = parseInt(totalPrice.reduce(getSum))+parseInt(shippingPrice);
				row = '<tr>'+
				           '<td colspan=2 class="bold">Sub Total</td>'+
				           '<td>$'+totalPrice.reduce(getSum)+'</td>'+
				       '</tr>'+
				       '<tr>'+
				           '<td colspan=2 class="bold">Total Pengiriman ('+detailShipping+')</td>'+
				           '<td>$'+shippingPrice+'</td>'+
				       '</tr>'+
				       '<tr>'+
				           '<td colspan=2 class="bold">Total</td>'+
				           '<td>$'+total+'</td>'+
				       '</tr>';
				$('.total-product').append(row);
				var TotalValue = 0;
				$(".total-product tr").each(function(){
				      TotalValue += parseFloat($(this).find('.totalWeight').text());
				});

	    	}else{
	    		console.log('show');
	    		$('#myModal').modal('toggle');
	    	}
	    });
	} );
</script>

