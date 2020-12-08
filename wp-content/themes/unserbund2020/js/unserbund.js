+function ($) {

    $('.sidePhoto').hoverDirection();

    $('.sidePhoto .inner').on('animationend', function (event) {
        var $box = $(this).parent();
    $box.filter('[class*="-leave-"]').hoverDirection('removeClass');});

    $('.js-red').on('click', function () {
        var id = $(this).data('link');
        if (id > 0 && $(this).html().indexOf("анных")==-1 ){
            window.location.href = 'http://unserbund.com/?post_type=dogs&p=' + id;
        }

    });

    $('#pagination').on('click', function (e) {
        e.preventDefault();
        var pagein = $(this).attr('data-page');
        $(this).addClass('working');
        var data = {action: 'post_load',page:pagein};
        pagein++;
        $(this).attr('data-page', pagein);
        var ajax = '.\/wp-admin\/admin-ajax.php';
        $.post(ajax, data, function (response) {
            if (response.length < 3) $('#pagination').hide();
            $('#ajaxAdd').before('<p>' + response + '</p>');
            $('#pagination').removeClass('working');
        });
    });

}(jQuery);
