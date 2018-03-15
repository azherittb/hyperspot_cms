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
nodevalue=resultvalue_page['2'];
		$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
 $('.thumbcheck_values').html('<div class="count_going">0</div><div class="count_maybe">0</div><a class="checkarrow  get_value_'+nodevalue+' '+nodevalue+' like_us" href="#"><i class="fa fa-check fa_value_'+nodevalue+'"></i></a><a class="thumbsarrow get_thumb_value_'+nodevalue+' '+nodevalue+' may_be" href="#"><i class="fa fa-thumbs-o-up thumbs_value_'+nodevalue+'"></i></a>');
  $.ajax({
								url: "/merchant/pages/event_count/"+nodevalue, 
								method :'GET',
								dataType: "json", 
								success: function(result){
									jQuery('.count_going').html(result);
								}
							}); 
  $.ajax({
								url: "/merchant/pages/event_count_maybe/"+nodevalue, 
								method :'GET',
								dataType: "json", 
								success: function(result){
									jQuery('.count_maybe').html(result);
								}
							}); 
  $.ajax({
								url: "/merchant/pages/event_count_value/"+nodevalue, 
								method :'GET',
								dataType: "json", 
								success: function(result){
									if(result>0){
										jQuery('.get_value_'+nodevalue).addClass('not_active');
									}
								}
							}); 
  $.ajax({
								url: "/merchant/pages/event_maybeuser_count/"+nodevalue, 
								method :'GET',
								dataType: "json", 
								success: function(result){
									if(result>0){
										jQuery('.get_thumb_value_'+nodevalue).addClass('not_active');
									}
								}
							}); 	
  $.ajax({
	  						url: "/merchant/pages/eventpage_going", 
								method :'GET',
								dataType: "json", 
								success: function(result){
									for(var j=0;j<result.length;j++) {
										var node_id_value=result[j].field_event_target_id;
										jQuery('.get_value_'+node_id_value).addClass('not_active');
									}
									
								}
							}); 
 $.ajax({
	  						url: "/merchant/pages/eventpage_maybe", 
								method :'GET',
								dataType: "json", 
								success: function(result){
									for(var j=0;j<result.length;j++) {
										var node_id_value=result[j].field_event_target_id;
										jQuery('.get_thumb_value_'+node_id_value).addClass('not_active');
									}
									
								}
							}); 							
});


	
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
									window.location.reload();
								}
							});
				});
		$( '.block-entity-fieldnodefield-custom-text' ).on( 'click','.checkarrow', function() {
					var node_id_value=$(this).attr('class');
					var result_vakue=node_id_value.split(' ');
					node_value=result_vakue['3'];
					$.ajax({
						url: "/merchant/pages/like_us/"+node_value, 
						method :'GET',
						dataType: "json", 
						success: function(){
								jQuery('.get_value_'+node_value).addClass('not_active');
								window.location.reload();
						}
				});
		});
		$( '.block-entity-fieldnodefield-custom-text' ).on( 'click','.thumbsarrow', function() {
					var node_id_value=$(this).attr('class');
					var result_vakue=node_id_value.split(' ');
					node_value=result_vakue['2'];
                    $.ajax({
						url: "/merchant/pages/may_be/"+node_value, 
						method :'GET',
						dataType: "json", 
						success: function(){
							jQuery('.get_thumb_value__'+node_value).addClass('not_active');
							window.location.reload();
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
							jQuery('.get_thumb_value_'+node_value).addClass('not_active');
							window.location.reload();
						}
					});
		});	
	}};
})(jQuery);
