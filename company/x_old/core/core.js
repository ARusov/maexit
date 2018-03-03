$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();      
    });

    function hamburger_cross() {
        if (isClosed == true) {          
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } 
        else {   
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }
  
    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });  
    
    $('.card-popover').each(function () {
        var $elem = $(this);
        $elem.popover({
            html: true,
            placement: 'right',
            trigger: 'hover',
            content: $('#popover_content_wrapper').html(), 
            container: $elem,
            delay: { 
               show: "500", 
               hide: "50"
            },
        });
    });
});


/*$(function(){
    $('.card-content').mouseenter(function() {           
        if(!$(this).hasClass('toggled'))
            $('div.card-reveal[data-rel=' + $(this).data('rel') + ']').slideToggle('slow');
        $(this).addClass('toggled');
    });
    
    $('.card').mouseleave(function () {
        if($(this).find('.card-content').hasClass('toggled')) {
            $('div.card-reveal[data-rel=' + $(this).data('rel') + ']').slideToggle('slow');
            $(this).find('.card-content').removeClass('toggled');
        }            
    });
});*/