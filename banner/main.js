$(document).ready(function () {

    $('.slide-item').css('opacity', 1);

    var mainSwiper = new Swiper('.swiper-container', {
        init:       false,
        direction:  'horizontal',
        loop:       true,
        pagination: {
            el:        '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        scrollbar:  {
            el: '.swiper-scrollbar'
        },
        autoplay: {
            delay: 5000
        },
        speed: 100

    });

    var sliderTools = new SliderTools('.main-slider-box');

    mainSwiper.on('init', function () {
        sliderTools.activateSlide(this.slides);

    });

    mainSwiper.init();

    mainSwiper.on('slideChangeTransitionStart', function () {
        sliderTools.deActivateSlide(this.slides);
    });
    mainSwiper.on('transitionEnd', function () {
        sliderTools.activateSlide(this.slides);
    });

});

function SliderTools(containerClass) {

    var self = this;

    // classes
    this.containerClass   = containerClass;
    this.activeSlideClass = 'swiper-slide-active';
    this.coverClass       = 'slide-item__cover';
    this.coverCog         = 'fa-cog';
    this.titleClass       = 'slide-item__title';
    this.descriptionClass = 'slide-item__description';

    this.activateSlide = function (target) {
        $(target).each(function () {
            if ($(this).hasClass(self.activeSlideClass)) {

                var selfSpecial = this;


                setTimeout(function () {
                    $(selfSpecial).find('.' + self.coverCog).css('animation-play-state', 'running');
                }, 800);


                $(this).find('.' + self.coverClass).toggleClass(self.coverClass + '_activate');
                $(this).find('.' + self.titleClass).toggleClass(self.titleClass + '_activate');
                $(this).find('.' + self.descriptionClass).toggleClass(self.descriptionClass + '_activate');
            }
        });
    };

    this.deActivateSlide = function (target) {
        $(target).each(function () {
            $(this).find('.' + self.coverCog).css('animation-play-state', 'paused');
            $(this).find('.' + self.coverClass).removeClass(self.coverClass + '_activate');
            $(this).find('.' + self.titleClass).removeClass(self.titleClass + '_activate');
            $(this).find('.' + self.descriptionClass).removeClass(self.descriptionClass + '_activate');
        });
    };


}







