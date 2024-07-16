$(document).ready(function (){
    if($('#newsletter').text()!='Newsletter') {
        $('#newsletter').css({
            'text-align': 'right',
            'padding-right': '11%'
        });
        $('#latest').css({
            'text-align': 'right',
            'padding-right': '11%'
        });
        $('#follow-me').css({
            'text-align': 'right',
        });
        $('#let-social').css({
            'text-align': 'right',
        });
        $('#social-icons').css({
            'direction': 'rtl',
        });
        $('#footer-about').css({
            'text-align': 'right',
        });
        $('#footer-email').css({
            'text-align': 'right',
        });

    }
    else {
        $('#newsletter').css({
            'text-align': 'left',
            'padding-right': '0'
        });
        $('#latest').css({
            'text-align': 'left',
            'padding-right': '0'
        });
        $('#follow-me').css({
            'text-align': 'left',
        });
        $('#let-social').css({
            'text-align': 'left',
        });
        $('#social-icons').css({
            'direction': 'ltr',
        });
        $('#footer-about').css({
            'text-align': 'left',
        });
        $('#footer-email').css({
            'text-align': 'left',
        });


    }
});
