<?php

/**
 * @description 轮播图组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/section-2.jpg?raw=true
 */
?>

<div id="default-swiper" class="swiper mySwiper default-swiper rounded-xl overflow-auto">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <a href="">
        <img class="relative" src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_1.jpg" alt="">
      </a>
    </div>
    <div class="swiper-slide">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_2.jpg" alt="">
      </a>
    </div>
    <div class="swiper-slide">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_3.jpg" alt="">
      </a>
    </div>
    <div class="swiper-slide">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_4.jpg" alt="">
      </a>
    </div>
    <div class="swiper-slide">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_5.jpg" alt="">
      </a>
    </div>
    <div class="swiper-slide">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/swiper_6.jpg" alt="">
      </a>
    </div>
  </div>
  <div class="swiper-pagination"></div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-bundle.min.js"></script>

<script>
  if (Swiper) {
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }
</script>
