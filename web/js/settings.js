/**
 * List group
 */
$('.list-item-group').click(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('#chat-message-container').removeClass('active animate__animated animate__fadeIn');
    } else {
        $('.list-item-group').removeClass('active');
        $(this).addClass('active');
        $('#chat-message-container').addClass('active animate__animated animate__fadeIn');
    }
    textWelcome();
});

function textWelcome() {
    if ($('#chat-message-container').hasClass('active')) {
        $('.text-welcome').removeClass('active');
    } else {
        $('.text-welcome').addClass('active');
    }
}


$('.tools-link').click(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.popup-attach-container').addClass('animate__fadeOutDown');
        setTimeout(() => {
            $('.popup-attach-container').removeClass('active animate__animated animate__fadeInUp animate__fadeOutDown');
        }, 1000);
    } else {
        $('.tools-link').removeClass('active');
        $(this).addClass('active');
        $('.popup-attach-container').addClass('active animate__animated animate__fadeInUp');
    }
});

/**
 * Toogle Menu
 */
$('#toogle-menu').click(function () {
    if ($(this).hasClass('minimize')) {
        $(this).removeClass('minimize');
    } else {
        $(this).addClass('minimize');
    }
    showHideMenu();
});

function showHideMenu() {
    if ($('#toogle-menu').hasClass('minimize')) {
        $('.layout-minimize').addClass('grid-minimize');
        $('.minimize-hide').addClass('display-none');
    } else {
        $('.layout-minimize').removeClass('grid-minimize');
        $('.minimize-hide').removeClass('display-none');
    }
}

/**
 * Toogle Top Menu
 */
$('.toogle-menu-top').click(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active');
    }
    toogleMenuTop($(this).attr('data-target'));
});

function toogleMenuTop(id) {
    if ($('.toogle-menu-top').hasClass('active')) {
        $(id).addClass('active');
    } else {
        $(id).removeClass('active');
    }
}