jQuery(document).ready(function($){	

$('li[id*="_hlm_sports_most_popular"]').unbind('click').live('click', function(e) {
        $( '.repeatable-rows' ).sortable({
            axis: 'y',
            handle: '.image-preview',
            placeholder: 'row-holder',
            opacity: 0.6, 
            cursor: 'move', 
            update: function() {
                $(this).find('input').change();      
            }
        });
});

$( '.widget[id*=hlm_sports_most_popular] .repeatable-rows' ).sortable({
    axis: 'y',
    handle: '.image-preview',
    placeholder: 'row-holder',
    opacity: 0.6, 
    cursor: 'move', 
    update: function() {
        $(this).find('input').change();       
    }
});
 
$(document).ajaxSuccess(function() {
    $( '.widget[id*=hlm_sports_most_popular] .repeatable-rows' ).sortable({
        axis: 'y',
        handle: '.image-preview',
        placeholder: 'row-holder',
        opacity: 0.6, 
        cursor: 'move', 
        update: function(){
            $(this).find('input').change();         
        }
    });
});




$('.widget[id*=hlm_sports_most_popular] .add-row-repeater').unbind('click').live('click', function(e) {
    e.preventDefault();
    var row = $(this).parents('.widget-content').find('.row').eq(0).clone(true);
    row.find('input, textarea').not('.button').removeAttr('value');
    row.find('.image-preview').attr('src', window.location.protocol +'//'+ $(location).attr('host')+'/hlm-sports/wp-content/themes/hlm-sports/images/hlm-logo.png');
    row.insertAfter($(this).parents('.widget-content').find('.row').last()).find('input').change(); 
});

    $('.widget[id*=hlm_sports_most_popular] .remove-row').unbind('click').live('click', function(e) {
		e.preventDefault();
        if($(this).parents('.widget-content').find('.row').length > 1){
		  $(this).parents('.row').not(':only-child').remove();
        }
    $('li[id*="_hlm_sports_most_popular"]').find('input').change();
	});

	//var custom_uploader_clients;


});	