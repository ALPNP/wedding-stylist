$(document).ready(function() {
    $(document).scroll(function() {
        if ($(this).scrollTop() > 52) {
            $("#navbar").addClass('fix');
            $(".margination").addClass('about');
        } else {
            $("#navbar").removeClass('fix');
            $(".margination").removeClass('about');
        };
    });
});