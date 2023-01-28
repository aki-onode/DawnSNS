$(function () {
    $("#nav-wrapper").click(function () {
        if ($("#menu-items").hasClass('open')) {
            $("#menu-items").slideUp();
            $('#menu-items').removeClass('open')
            $('.ac-open').css('transform', 'rotate(0deg');
        } else {
            $("#menu-items").slideDown();
            $('#menu-items').addClass('open');
            $('.ac-open').css('transform', 'rotate(180deg');
        }
    });

    $('.edit-button').click(function () {
        $('.edit-modal-wrapper').fadeIn();
    });

    $('#close-modal').click(function () {
        $('.edit-modal-wrapper').fadeOut();
    });
});
