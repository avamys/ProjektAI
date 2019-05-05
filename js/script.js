// Navbar scrolled selector
$(function() {
    $(document).scroll(function() {
        var $nav = $(".navbar");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$(document).ready(function() {
    $(window).on('scroll', function() {
        if($(this).scrollTop()>600) {
            $('.button-up').addClass('show');
        }
        else {
            $('.button-up').removeClass('show');
        }
    });
});