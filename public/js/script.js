$(function () {
    $('#nav-wrapper').click(function () {
        if ($('#menu-items').hasClass('open')) {
            $('#menu-items').slideUp();
            $('#menu-items').removeClass('open')
            $('.ac-open').css('transform', 'rotate(0deg');
        } else {
            $('#menu-items').slideDown();
            $('#menu-items').addClass('open');
            $('.ac-open').css('transform', 'rotate(180deg');
        }
    });
});

$(function () {
    $('.edit-button').each(function () {
        $(this).click(function () {
            let target = $(this).data('target');
            let modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });

    $('.close-modal').click(function () {
        $('.edit-modal-wrapper').fadeOut();
        return false;
    });
});

$(function () {
    $('input').on('change', function () {
        var file = $(this).prop('files')[0];
        $('.select-file').text(file.name);
    });
});
