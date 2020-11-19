// var $slide_ovj;
// $(window).on('load', function () {
//     if (window.matchMedia('screen and (min-width:960px)').matches) {
//         var images = [
//             "./images/index/mv01.jpg",
//             "./images/index/mv02.jpg",
//         ];
//     } else {
//         var images = [
//             "./images/index/mv01_sp.jpg",
//             "./images/index/mv02_sp.jpg",
//         ];
//     }

//     // 指定画像をプリロードする
//     $slide_ovj = $(".mainvisual");
//     $slide_ovj.backstretch(images, {
//         speed: 1000,
//         fade: 2000,
//         before: "before"
//     });

//     $(".pager").find("li").click(function (event) {
//         $slide_ovj.backstretch("show", $(this).index())
//     });
// })

// function before(i) {
//     $(".pager").find("li").removeClass('active');
//     $(".pager").find("li").eq(i).addClass('active');

//     if (i == 1) {
//         $(".mainvisual h1").addClass('on');
//     } else {
//         $(".mainvisual h1").removeClass('on');
//     }
// }

// $(function () {
//     var i = 0;
//     $(window).on("backstretch.after", function (e, instance, index) {
//         if (i == 0) {
//             $(".mainvisual h1").addClass('show');
//             setTimeout(function () { $(".mv-ins_01").addClass('show') }, 2000);
//             //setTimeout(function(){ $(".mv-ins_02").addClass('show') }, 2300);
//         }
//         i++;
//     });
// });
// Tab
$(function () {
    $('.js-tab').each(function () {
        var tab = this;
        var tabList = $('.js-tab_list > li', this);
        var tabContents = $('.js-tab_contents > div', this);
        tabList.on('click', function () {
            var index = tabList.index(this);
            tabContents.hide();
            tabContents.eq(index).fadeIn()
            tabList.removeClass('is-current');
            tabContents.removeClass('is-open');
            $(this).addClass('is-current')
        });
    });
});

// .s_04 .accordion_one
$(function () {
    //.accordion_oneの中の.accordion_headerがクリックされたら
    $('.s_04 .accordion_one .accordion_header').click(function () {
        //クリックされた.accordion_oneの中の.accordion_headerに隣接する.accordion_innerが開いたり閉じたりする。
        $(this).next('.accordion_inner').slideToggle();
        $(this).toggleClass("open");
        //クリックされた.accordion_oneの中の.accordion_header以外の.accordion_oneの中の.accordion_headerに隣接する.accordion_oneの中の.accordion_innerを閉じる
        $('.s_04 .accordion_one .accordion_header').not($(this)).next('.accordion_one .accordion_inner').slideUp();
        $('.s_04 .accordion_one .accordion_header').not($(this)).removeClass("open");
        $('.s_04 .accordion_one .accordion_header.stay').not($(this)).toggleClass("open");
    });
});

// Main visual slide
$('.mainvisual-slide').slick({
    infinite: true,
    speed: 200,
    fade: true,
    autoplay: true,
    arrows: true,
});