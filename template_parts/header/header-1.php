<?php 
/**
 * @description headder1 左侧弹出层
 * 
 * @see drawer: https://github.com/Rich4st/base/blob/develop/preview/drawer-base.jpg?raw=true
 * @see mobile: https://github.com/Rich4st/base/blob/develop/preview/header1-mobile.jpg?raw=true
 * @see mobile: https://github.com/Rich4st/base/blob/develop/preview/header1-pc.jpg?raw=true
 * 
 */
?>
<header class="py-8 px-4 lg:max-w-6xl lg:mx-auto">
  <ul class="flex justify-between items-center">
    <li class="order-2 lg:order-0">
      <h1 class="text-4xl font-extrabold font-bondoni">
        <a href="">Capalot</a>
      </h1>
    </li>
    <li class="order-1">
      <?php echo get_template_part('template_parts/header/components/nav'); ?>
      <?php get_template_part('template_parts/header/components/drawer'); ?>
    </li>
    <li class="order-3">
      <?php get_template_part('template_parts/header/components/action'); ?>
    </li>
  </ul>
</header>
