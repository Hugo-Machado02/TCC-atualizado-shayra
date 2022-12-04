(function ($) {
    'use strict';
    $(function () {
        $('#up').on('click',
        function () {
            $('html, body').stop().animate({
                scrollTop: 0}, 'medium'
            );
        });
    })
;}
(jQuery)
);