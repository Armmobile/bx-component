<?php

/**
 * Class banner
 */
class banner extends bb_component
{
    protected $component_name = __CLASS__;

    /**
     * banner constructor.
     */
    function __construct()
    {
        parent::__construct();

    }
    
    public function printMainSlider()
    {
        ?>

        <div class="main-slider-box">
            <style>
                .slide-item:first-child { opacity: 0; }
            </style>


            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide"><?= $this->printSlide01(); ?></div>
                    <div class="swiper-slide"><?= $this->printSlide02(); ?></div>
                    <div class="swiper-slide"><?= $this->printSlide03(); ?></div>
                </div>

                <div class="swiper-pagination"></div>

                <!--            <div class="swiper-button-prev"></div>-->
                <!--            <div class="swiper-button-next"></div>-->

                <!--            <div class="swiper-scrollbar"></div>-->
            </div>
        </div>

        <?
    }


    // SLIDES

    /**
     * Комплексная поддержка сайтов
     */
    public function printSlide01()
    {
        ?>
        <div class="slide-item slide-item_01">

            <a href="/services/support/complex" class="slide-item-link"></a>

            <div class="slide-item__cover">
                <img src="/local/templates/base_v.1/bb_components/banner/images/cog-black.png" alt="">
            </div>
            <div class="slide-item__title">
                Комплексная<br>поддержка<br>сайтов
            </div>
            <div class="slide-item__description">
                Контроль за техническим состоянием сайта, реализация задач по его развитию, стратегическое планирование
                и продвижение, создание первоклассного дизайна и разработка полезного контента.
            </div>
        </div>
        <?
    }

    /**
     * Разработка сайтов
     */
    public function printSlide02()
    {
        ?>
        <div class="slide-item slide-item_02">

            <a href="/services/web/company" class="slide-item-link"></a>

            <div class="slide-item__cover">
                <img src="/local/templates/base_v.1/bb_components/banner/images/cog-black.png" alt="">
            </div>
            <div class="slide-item__title">
                Разработка<br>сайтов
            </div>
            <div class="slide-item__description">
                Сайты любой сложности с превосходным дизайном, продуманным интерфейсом и правильной архитектурой
                на базе <span style="white-space: nowrap">CMS «1С-Битрикс»</span>.
            </div>
        </div>
        <?
    }

    /**
     * Фирменный стиль
     */
    public function printSlide03()
    {
        ?>
        <div class="slide-item slide-item_03">

            <a href="/services/branding/identity" class="slide-item-link"></a>

            <div class="slide-item__cover">
                <img src="/local/templates/base_v.1/bb_components/banner/images/cog-black.png" alt="">
            </div>
            <div class="slide-item__title">
                Фирменный<br>стиль
            </div>
            <div class="slide-item__description">
                Создание великолепной айдентики, логотипов, торговых наименований. Дизайн для веба и офлайна.
            </div>
        </div>
        <?
    }


}