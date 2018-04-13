$("#popup-directors").modal({
    show: false,
    backdrop: 'static'
});

$(document).on( "click", ".modal-popup", function(){
 	var id = $(this).attr('id');
    $( "#popup-directors .modal-header .img" ).html( $("#"+id+" .img" ).html());
 	$( "#popup-directors .modal-header .title" ).html( $("#"+id+" .name" ).html());
 	$( "#popup-directors .modal-body .content" ).html( $("#"+id+" .content-popup" ).html());
 	$("#popup-directors").modal("show");      
});

$('#add').click(function(){
       
       
       //for(var i =0; i < timelineLength; i++){
           
       if($('ul.timeline li').length % 2 == 0){
            $('.timeline').prepend(
            '<li class="timeline-inverted">'
            +'<div class="timeline-badge info"><i class="glyphicon glyphicon-hand-left"></i></div>'
            +'<div class="timeline-panel">'
            +'<div class="timeline-heading">'
            +'<h4 class="timeline-title">Bootstrap 3 released</h4>'
            +'<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> August 2013</small></p>'
            +'</div>'
            +'<div class="timeline-body">'
            +'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.'
            +'Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis'
            +'dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.'
            +'Aliquam in felis sit amet augue.</p>'
            +'</div>'
            +'</div>'
            +'</li>'
        );   
           
       }
       else{
           
            $('.timeline').prepend(
            '<li>'
            +'<div class="timeline-badge info"><i class="glyphicon glyphicon-hand-left"></i></div>'
            +'<div class="timeline-panel">'
            +'<div class="timeline-heading">'
            +'<h4 class="timeline-title">Bootstrap 3 released</h4>'
            +'<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> August 2013</small></p>'
            +'</div>'
            +'<div class="timeline-body">'
            +'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.'
            +'Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis'
            +'dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.'
            +'Aliquam in felis sit amet augue.</p>'
            +'</div>'
            +'</div>'
            +'</li>'
        );
        alert(timelineLength);
        }
   });