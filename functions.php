<?php

function enqueue_custom_assets() {
  // 加载样式文件
  wp_enqueue_style('custom-styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');

  // 加载脚本文件
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}

// 队列加载JS和CSS文件
add_action('wp_enqueue_scripts', 'enqueue_custom_assets');

// 添加缩略图支持
add_theme_support('post-thumbnails');

?>
