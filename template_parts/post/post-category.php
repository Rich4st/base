<?php

/**
 * @description 瀑布流展示文章列表，展示标题、和分类 点击跳转到该分类页面显示分类下的所有文章
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-category.jpg?raw=true
 * 
 * @param array $args
 * @param string $args['pageSize'] 每页显示的文章数量
 * @param string $args['orderby'] 排序方式
 * @param string $args['order'] 排序顺序
 * 
 */
$query_args = array(
  'post_type' => 'post',
  'posts_per_page' => $args['page-size'] ?? 4,
  'orderby' => $args['orderby'] ?? 'date',
  'order' => $args['order'] ?? 'DESC',
);
$all_posts = new WP_Query($query_args);

$ul_class = $args['ul-class'] ?? 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-8';

$title_class = $args['title-class'] ?? '';
?>
<ul class="<?php echo $ul_class; ?> grid grid-cols-2 md:grid-cols-3 px-8">
  <?php
  if ($all_posts->have_posts()) :
    while ($all_posts->have_posts()) : $all_posts->the_post();

      // 获取文章缩略图
      $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'w-full', 'width' => '100%', 'height' => 'auto'));

      // 输出文章链接
      $post_link = get_permalink();

      // 输出文章分类
      $post_categories = get_the_category();

      // 输出文章标签
      $post_tags = get_the_tags();

      // 输出文章中的第一张图片
      $post_content = get_the_content();
      $post_content = apply_filters('the_content', $post_content);
      $post_content = str_replace(']]>', ']]&gt;', $post_content);
      $first_img = '';
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
      $first_img = $matches[1][0] ?? '';
  ?>
      <li class="post-item">
        <?php if ($first_img) : ?>
          <a class="block overflow-hidden" href="<?php echo $post_link; ?>">
            <img class="h-64 w-72 max-w-full max-h-full object-cover hover:scale-110 duration-150 overflow-hidden" src="<?php echo $first_img; ?>" alt="">
          </a>
        <?php else : ?>
          <?php echo $post_thumbnail; ?>
        <?php endif; ?>

        <div class="my-4">
          <a class="block text-center mt-2 lg:mt-4 group" href="/category/<?php echo $post_categories[0]->name; ?>">
            <span class="<?php echo $title_class; ?>">
              <?php
              if ($post_categories) {
                echo '<span>' . $post_categories[0]->name . '</span>';
              }
              ?>
            </span>
          </a>
        </div>
      </li>

  <?php
    endwhile;
  endif;

  // 重置循环
  wp_reset_postdata();
  ?>
</ul>
