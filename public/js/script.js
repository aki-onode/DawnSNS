$(() => {
    $('#nav-wrapper').click(() => {
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

$(() => {
    $('.edit-button').each(() => {
        $(this).click(() => {
            let target = $(this).data('target');
            let modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });

    $('#close-modal').each(() => {
        $(this).click(() => {
            $('.edit-modal-wrapper').fadeOut();
            return false;
        });
    });
});

$(() => {
    $('input').on('change', () => {
        var file = $(this).prop('files')[0];
        $('.select-file').text(file.name);
    });
});
