jQuery(document).ready(function($){	





$('li[id*="payment_options_hlm_sports"]').unbind('click').live('click', function(e) {
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
 
$(document).ajaxSuccess(function() {


    $( '.repeatable-rows' ).sortable({
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




$('select[id*=looks]').change(function(){

if($(this).find("option:selected").val() == 'looks5'){
    $(this).parents('.widget-content').find('.big-looks').show();
} else {
    $(this).parents('.widget-content').find('.big-looks').hide();
}

}).change();


$('.widget[id*=payment_options_hlm_sports] .add-row-repeater').unbind('click').live('click', function(e) {
    e.preventDefault();
    var row = $(this).parents('.widget-content').find('.row').eq(0).clone(true);
    row.find('input, textarea').not('.button').removeAttr('value');
    row.insertAfter($(this).parents('.widget-content').find('.row').last()).find('input').change(); 
});



    $('.remove-row').unbind('click').live('click', function(e) {
		e.preventDefault();
        if($(this).parents('.widget-content').find('.row').length > 1){
		  $(this).parents('.row').not(':only-child').remove();
        }
    $('li[id*="payment_options_hlm_sports"]').find('input').change();
	});

});	