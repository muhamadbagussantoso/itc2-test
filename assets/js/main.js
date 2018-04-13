$(document).ready(function(){
	$(document).on("click", "a.switch-lang", function(){
		var ctrl = $(this);
        var lang = ctrl.attr("data-lang") || "id_";
        var url = location.href.split('?')[0];
        var switchUrl = $("#hexpharm-base-url").val()+ "langswitch/switch/"+lang+"?redirect="+url;
        location.href = switchUrl;
    });

    $("#popup-directors").modal({
	    show: false,
	    backdrop: 'static'
	});

	$(document).on( "click", ".modal-popup", function(){
	 	//var id = $(this).attr('id');
	 	var id = $(this).parent().attr("id");
	    console.log( "id:", id, $(this).parent().attr("id") );
	 	$( "#popup-directors .modal-header .img" ).html( $("#"+id+" .img" ).html());
	 	$( "#popup-directors .modal-header .title" ).html( $("#"+id+" .name" ).html());
	 	$( "#popup-directors .modal-body .content" ).html( $("#"+id+" .content-popup" ).html());
	 	$("#popup-directors").modal("show");      
	});
});