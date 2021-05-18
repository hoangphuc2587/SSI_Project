$(document).ready(function () {
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 150) {
                $('#Pagetop').fadeIn();
            } else {
                $('#Pagetop').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#Pagetop').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    // $(".add-element a").click(function(){
    //     $(".block-category").slideToggle("slow");
    // });
    // $(".btn-close").click(function(){
    //     $(".block-category").slideToggle("slow");
    // });


    $('a.sub-menu').click(function(e){
        $("a.sub-menu").hide();
        var listMenuSub = $(this).next('.list-menu-sub');
        listMenuSub.show();
    });
    $('a.menu-back').click(function(e){
        $(".list-menu-sub").hide();
        $("a.sub-menu").show()
    });
    $('.link-show').click(function() {
        $(this).siblings('.menu-content').slideToggle("slow");
    });
    
});


