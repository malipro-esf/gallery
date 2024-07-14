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
    }
});
