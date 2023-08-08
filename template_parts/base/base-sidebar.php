<?php 
/**
 * @description 侧边栏组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/base-sidebar.jpg?raw=true
 */
?>
<aside class="px-4">
  <ul class="text-xl font-serif space-y-12">
    <li>
      <h2 class="text-2xl pb-2">Categories</h2>
      <ul>
        <?php
        // 获取所有分类
        $categories = get_categories();

        foreach ($categories as $category) {
          printf(
            '<li class="underline hover:no-underline hover:text-sky-500"><a href="%1$s">%2$s</a></li>',
            esc_url(get_category_link($category->term_id)),
            esc_html($category->name)
          );
        }
        ?>
      </ul>
    </li>
    <li>
      <h2 class="text-2xl pb-2">Archive</h2>
      <ul id="archive-sidebar">
        <?php
        // 获取按月份归档的文章链接
        $args = array(
          'type'            => 'monthly',
          'show_post_count' => true,
        );
        wp_get_archives($args);
        ?>
      </ul>
    </li>
  </ul>
</aside>
