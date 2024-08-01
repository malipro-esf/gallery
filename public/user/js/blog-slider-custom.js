$(document).ready(function () {
    if ($('#last-blogs').text() != 'Last blogs') {

        $('.single-exibition').addClass('pre-about-content');
    }
    else {
        $('.single-exibition').css('text-align','left');
    }
});
