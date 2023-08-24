<?php

/**
 * @description headder2 全屏drawer 带关闭按钮
 * 
 * @see drawer: https://github.com/Rich4st/base/blob/develop/preview/header-6.jpg?raw=true
 * 
 * @param string $extra-class 额外的class
 * 
 */

$topContainerClass = $args['top-container-class'] ?? 'bg-[#232323] text-white hidden md:block';

$bottomContainerClass = $args['bottom-container-class'] ?? 'bg-black text-white font-pop';

$topClass = 'flex items-center justify-between' . ' ' . ($args['top-class'] ?? '');

$bottomClass = 'flex items-center justify-between p-4 lg:pl-32 lg:px-8 w-full bg-no-repeat bg-contain 
  relative' . ' ' . ($args['bottom-class'] ?? '');
?>

<header class="<?php echo $bottomContainerClass ?>">
  <div class="<?php echo $bottomClass; ?>" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/TZ.svg);">
    <!-- 背景添加一层遮罩 -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <h1 class="text-2xl font-extrabold z-50">
      <a href="<?php echo home_url() ?>">betway</a>
    </h1>
    <div class="hidden md:block z-50">
      <button class="hover:bg-[#00c22d] bg-[#439539] px-4 py-1 rounded-sm font-semibold text-sm">Sign Up</button>
      <button class="hover:bg-[#00c22d] bg-[#439539] px-4 py-1 rounded-sm font-semibold text-sm">Log in</button>
      <button class="hover:bg-[#00c22d] border bg-transparent px-4 py-1 rounded-sm font-semibold text-sm">
        You Bonus is waiting
      </button>
    </div>
    <div class="md:hidden z-50">
      <?php get_template_part('template_parts/header/components/drawer', '', array(
        'with-close' => true,
        'drawer-class' => 'w-screen',
        'menu-class' => 'flex flex-col items-center font-meshed text-xl'
      )) ?>
    </div>
  </div>
</header>

<header class="<?php echo $topContainerClass ?>">
  <div class="<?php echo $topClass ?>">

    <div>
      <?php echo get_template_part('template_parts/header/components/nav', '', array(
        'extra-class' => 'font-semibold font-pop'
      )); ?>
    </div>
  </div>
</header>
