<?php
/**
 * @description 头部导航组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/nav-base.jpg?raw=true
 * 
 * @param string $extra-class 额外的类名
 * 
 */

$class = 'header-nav hidden lg:flex items-center space-x-4 mr-8 text-lg hover:text-gray-600 '.($args['extra-class'] ?? '')
?>

<div>
  <?php wp_nav_menu(array(
    'container' => 'ul',
    'menu_class' => $class,
  )); ?>
</div>
