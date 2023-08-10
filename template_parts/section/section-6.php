<?
/**
 * @description 首页heropage
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/section-6.jpg?raw=true
 * 
 */
?>
<div class="w-full relative h-[calc(100vh-64px)] bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/hero.jpg');">
  <!-- 添加遮罩效果 -->
  <div class="absolute inset-0 bg-black opacity-60 z-10"></div>

  <div class="text-white px-4 absolute z-20 top-1/2 lg:left-1/2 lg:-translate-x-1/2 -translate-y-1/2 text-center space-y-4">
    <h1 class="font-serif text-5xl font-bold lg:text-6xl">Your New Favorite Food Truck</h1>
    <p class="font-pop text-sm lg:text-lg">Albuquerque’s juiciest, freshest, hand-crafted burgers. Fresh from our truck, or straight to your door.</p>
    <button class="bg-[#ff9900] p-3 rounded-lg hover:opacity-95">Order Now</button>
  </div>
</div>
