<?php

function widgets_init() {
  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="sidebar-module">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ) );
}

add_action('widgets_init', 'widgets_init');
add_theme_support('post-thumbnails');

?>
