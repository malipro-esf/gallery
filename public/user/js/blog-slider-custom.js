$(document).ready(function () {
    if ($('#last-blogs').text() != 'Last blogs') {
        $('.single-exibition h3').addClass('fa-font remove-before-content');
        $('.single-exibition').addClass('persian-style text-justify');
    }
    else {
        $('.single-exibition').removeClass('persian-style');
        $('.single-exibition').addClass('dir-ltr');
    }
});
