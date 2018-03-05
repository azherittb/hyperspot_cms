/**
 * @file
 * Hide the permissions grid for all field permission types except custom.
 */

(function ($) {

  Drupal.behaviors.hyperspot_core = {
    attach: function (context, settings) {
	$( document ).ready(function() {
		
	
	//pure javascript
	var pathname = window.location.pathname;
	var resultvalue_page=pathname.split('/');
	     nodevalue=resultvalue_page['3'];
	$('.event_page_like_us').html('<a class="checkarrow  get_value_'+nodevalue+' '+nodevalue+' like_us" href="#"><i class="fa fa-check fa_value_'+nodevalue+'"></i></a>');
	$('.event_page_may_be').html('<a class="thumbsarrow get_thumb_value_'+nodevalue+' '+nodevalue+' may_be" href="#"><i class="fa fa-thumbs-o-up thumbs_value_'+nodevalue+'"></i></a>');
	});
	
			
	
	 $( '.checkarrow' ).on( 'click', function() {
	 var node_id_value=$(this).attr('class');
	 var result_vakue=node_id_value.split(' ');
	     node_value=result_vakue['3'];
		 			$.ajax({
        url: "/merchant/pages/like_us/"+node_value, 
        method :'GET',
        dataType: "json", 
        success: function(){
			jQuery('.get_value_'+node_value).addClass('not_active');
        }
    });
				});
	 $( '.thumbsarrow' ).on( 'click', function() {
	 var node_id_value=$(this).attr('class');
     var result_vakue=node_id_value.split(' ');
	     node_value=result_vakue['3'];
        			$.ajax({
        url: "/merchant/pages/may_be/"+node_value, 
        method :'GET',
        dataType: "json", 
        success: function(){
           jQuery('.get_thumb_value__'+node_value).addClass('not_active');
        }
    });
				});	

//$('.fa-thumbs-o-up').on( 'click', function() {alert('ksjdfkj')});
    }};
})(jQuery);
