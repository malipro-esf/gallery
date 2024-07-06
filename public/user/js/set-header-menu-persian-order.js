document.querySelectorAll('.header-flag').forEach(function(flag) {
    flag.addEventListener('click', function(event) {
        localStorage.setItem('locale', event.currentTarget.getAttribute('data-id'));
    });
});

// Apply styles based on the stored locale
document.addEventListener('DOMContentLoaded', function() {
    var locale = localStorage.getItem('locale');
    if (locale) {
        if (locale === 'persian') {
            $('#ul-nav-menu').addClass('persian-style');
        } else if (locale === 'english') {
            $('#ul-nav-menu').addClass('english-style');
        }
    }
});
