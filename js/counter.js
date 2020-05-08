
$.fn.jQuerySimpleCounter = function( options ) {
    var settings = $.extend({
        start:  0,
        end:    100,
        easing: 'swing',
        duration: 400,
        complete: ''
    }, options );

    var thisElement = $(this);

    $({count: settings.start}).animate({count: settings.end}, {
        duration: settings.duration,
        easing: settings.easing,
        step: function() {
            var mathCount = Math.ceil(this.count);
            thisElement.text(mathCount);
        },
        complete: settings.complete
    });
};


$('#number1').jQuerySimpleCounter({end: 19,duration: 3000});
$('#number2').jQuerySimpleCounter({end: 9,duration: 3000});
$('#number3').jQuerySimpleCounter({end: 38,duration: 2000});
$('#number4').jQuerySimpleCounter({end: 36,duration: 2500});


