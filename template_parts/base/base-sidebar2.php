<?php 
/**
 * @description 侧边栏组件2
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/base-sidebar2.jpg?raw=true
 */
?>
<aside class="px-4">
  <ul class="text-xl font-serif space-y-12">
    <li class="lg:min-w-[20rem]">
      <h2 class="text-2xl pb-2 bg-[#00a0e9] p-2 text-white">Categories</h2>
      <ul class="bg-white p-2 pl-8 list-disc text-gray-500">
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
      <h2 class="text-2xl pb-2 bg-[#00a0e9] p-2 text-white">Archive</h2>
      <ul id="archive-sidebar" class="bg-white p-2 pl-8 list-disc text-gray-500">
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
