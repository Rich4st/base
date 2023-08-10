<?php

/**
 * @description Blog列表页面
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/blog-1.jpg?raw=true
 * 
 */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => $args['page-size'] ?? 4,
  'orderby' => $args['orderby'] ?? 'date',
  'order' => $args['order'] ?? 'DESC',
  'paged' => $paged,
);
$all_posts = new WP_Query($args);
?>
<ul class="font-pop space-y-8">
  <?php
  if ($all_posts->have_posts()) :
    while ($all_posts->have_posts()) : $all_posts->the_post();
      // 获取文章标题
      $post_title = get_the_title();

      // 获取描述
      $post_excerpt = get_the_excerpt();

      // 输出文章分类
      $post_category = get_the_category();

      // 输出文章作者
      $post_author = get_the_author();

      // 输出文章链接
      $post_link = get_permalink();

      // 输出文章日期并格式化为M d, Y
      $post_date = get_the_date('M d, Y');


      // 输出文章中的第一张图片
      $post_content = get_the_content();
      $post_content = apply_filters('the_content', $post_content);
      $post_content = str_replace(']]>', ']]&gt;', $post_content);
      $first_img = '';
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
      $first_img = $matches[1][0];
  ?>
      <li class="lg:max-w-[40rem] border-b">
        <?php if ($first_img) : ?>
          <a class="block" href="<?php echo $post_link; ?>">
            <img class="h-96 w-[36rem] max-h-full object-cover" src="<?php echo $first_img; ?>" alt="">
          </a>
        <?php endif; ?>

        <div class="my-4 space-y-6">
          <a class="text-xl line-clamp-1 hover:text-[#ed1f84]" href="<?php echo $post_link; ?>">
            <?php echo $post_title; ?>
          </a>
          <div class="flex items-center text-xs text-gray-500 space-x-4">
            <p><?php echo $post_author; ?></p>
            <p><?php echo $post_date; ?></p>
          </div>
          <p class="w-full">
            <?php echo $post_excerpt; ?>
          </p>
          <button>
            <a class="block bg-black text-white px-4 py-2 hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.7)] duration-300" href="<?php echo $post_link; ?>">
              Continue Reading
            </a>
          </button>
        </div>
      </li>

  <?php
    endwhile;
  endif;

  // 重置循环
  wp_reset_postdata();
  ?>
  <ul class="pagination flex items-center space-x-4">
    <li>
      <?php
      // 分页链接
      echo paginate_links(array(
        'total' => $all_posts->max_num_pages,
        'current' => $paged,
      ));
      ?>
    </li>

    <li>total <?php echo $all_posts->max_num_pages ?> Page(s)</li>

    <li><?php echo $all_posts->found_posts ?> post(s)</span>
  </ul>
</ul>
