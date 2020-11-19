(function () {

	var hamburger = {
		navToggle: document.querySelector('.nav-toggle'),
		nav: document.querySelector('nav.navi-sp'),
		// nav: document.querySelector('nav'),

		doToggle: function (e) {
			e.preventDefault();
			console.log(this.nav);
			this.navToggle.classList.toggle('expanded');
			this.nav.classList.toggle('expanded');
		}
	};

	hamburger.navToggle.addEventListener('click', function (e) { hamburger.doToggle(e); });

}());


// 0115
// // dropdown menu
$('ul.navbar-nav li.dropdown').hover(function () {
    // alert('hover');
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
}, function () {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
});
// // nav slide
$(function () {
    $('.navi-sp > ul > li').click(function () {
        // alert('click');
        if ($(this).find('.naviExtra').length) {
            $('#navi > ul > li .naviExtra').slideUp();
            if ($(this).children('a').hasClass('hover')) {
                $(this).children('a').removeClass('hover');
            }
            else {
                $('#navi > ul > li > a').removeClass('hover');
                $(this).children('a').addClass('hover');
            }
            $(this).find('.naviExtra:not(:animated)').slideToggle();
        }
    });
    $('#navi > ul > li > a').click(function (e) {
        if ($(this).next('.naviExtra').length) {
            e.preventDefault();
        }
    });
});

// scrollbar mobile
$(document).ready(function () {
    if( $(window).width() < 767 ) {
        $('.scrollbar-vista').scrollbar({
            "showArrows": false,
            "scrollx": "advanced",
            "scrolly": "advanced"
        });
    }
});
