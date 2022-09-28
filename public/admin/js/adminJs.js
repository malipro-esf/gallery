$(document).ready(function () {

    //change body font-family base on locale
    if ($('#hidden-locale').val() == 'fa' || $('#hidden-locale').val() == '' ) {
        $('body').css('font-family', 'persianFont');
    } else
        $('body').css('font-family', 'englishFont');
});

function getDeleteConfirmation(el) {
    const form = $(el).closest('form');
    $(form).submit(function(e){
        e.preventDefault();
    });
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to delete!',
        buttons: {
            confirm: {
                action: function () {
                    $(form)[0].submit();
                },
                btnClass: 'btn-green',
            },
            cancel: {
                btnClass: 'btn-red',
            },
        }
    });
}
