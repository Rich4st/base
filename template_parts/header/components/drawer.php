<?php

/**
 * @description 移动端头部导航栏菜单弹出层
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/drawer-base.jpg?raw=true
 * 
 * @param bool $with-close 是否显示关闭按钮
 * 
 * @param string $meu-class 菜单的class
 * 
 * @param string $drawer-class 弹出层的class
 * 
 */

$withClose = $args['with-close'] ?? false;

$drawerClass = 'menu h-screen px-4 py-12 min-w-[20rem] bg-base-200 text-base-content font-rockwell ' . ($args['drawer-class'] ?? '');

$menuClass = 'header-nav text-xl hover:text-gray-600 space-y-4 py-8 ' . ($args['menu-class'] ?? '');

$menuIconClass = $args['menu-icon-class'] ?? 'w-6 h-6';
?>
<div class="drawer lg:hidden">
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <label for="my-drawer">
      <svg width="24" height="24" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <rect x="4" y="7.5" width="16" height="1.5"></rect>
        <rect x="4" y="15" width="16" height="1.5"></rect>
      </svg>
    </label>
  </div>
  <div class="drawer-side z-[9999]">
    <label for="my-drawer" class="drawer-overlay h-screen"></label>
    <div class="<?php echo $drawerClass; ?>">
      <?php
      if ($withClose) : ?>
        <div id="menu-close" class="flex justify-end">
          <label for="my-drawer">
            <svg class="<?php echo $menuIconClass; ?>" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
              <path d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
            </svg>
          </label>
        </div>
      <?php endif; ?>

      <?php wp_nav_menu(array(
        'container' => 'ul',
        'menu_class' => $menuClass,
      )); ?>
    </div>
  </div>
</div>
