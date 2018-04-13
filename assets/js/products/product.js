$("#popup-img").modal({
    show: false,
    backdrop: 'static'
});

$('.modal-popup').click(function(){

 	var id = $(this).attr('id');
 	console.log(id);
 	$( "#popup-img .modal-body .img" ).html( $("#"+id+" .img" ).html());
 	$("#popup-img").modal("show");      
});