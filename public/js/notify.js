$.notify = function (text, type) {
    if (type === undefined) {
        type = 'success';
    }

    $('#global-notify').stop().remove();
    $('<div id="global-notify" class="toast toast-' + type + '">' +
        '<button class="btn btn-clear float-right"></button>'
        + text + '</div>')

        .width('auto')
        .css('top', '20px')
        .css('right', '20px')
        .css('position', 'fixed')
        .appendTo(document.body);

    setTimeout(function () {
        $('#global-notify').fadeOut(500, function () {
            $(this).remove();
        });
    }, type === 'success' ? 2000 : 3500)
};
