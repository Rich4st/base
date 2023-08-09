<?php
/**
 * @description 瀑布流显示文章缩略图、标题描述及时间
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-pool.jpg?raw=true
 * 
 * @param array $args
 * @param string $args['page-size'] 每页显示的文章数量
 * @param string $args['orderby'] 排序方式
 * @param string $args['order'] 排序顺序
 */
$args = array(
  'post_type' => 'post',
  'posts_per_page' => $args['page-size'] ?? -1,
  'orderby' => $args['orderby'] ?? 'date',
  'order' => $args['order'] ?? 'DESC',
);
$all_posts = new WP_Query($args);
?>
<ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-8">
  <?php
  if ($all_posts->have_posts()) :
    while ($all_posts->have_posts()) : $all_posts->the_post();
      // 获取文章标题
      $post_title = get_the_title();

      // 获取描述
      $post_excerpt = get_the_excerpt();

      // 获取文章缩略图
      $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'w-full', 'width' => '100%', 'height' => 'auto'));

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
      <li class="post-item">
        <?php if ($first_img) : ?>
          <a class="block overflow-hidden" href="<?php echo $post_link; ?>">
            <img class="h-80 max-h-[20rem] w-full max-w-full object-cover hover:scale-110 duration-150 overflow-hidden" src="<?php echo $first_img; ?>" alt="">
          </a>
        <?php else : ?>
          <?php echo $post_thumbnail; ?>
        <?php endif; ?>

        <div class="my-4">
          <h2 class="text-2xl font-extrabold font-mono line-clamp-2 min-h-[4rem]"><?php echo $post_title; ?></h2>
          <a class="font-serif text-sm mt-2 hover:underline min-h-[3.75rem] line-clamp-3" href="<?php echo $post_link ?>">
            <?php echo $post_excerpt; ?>
          </a>
          <p class="text-xs text-gray-400">
            <?php echo $post_date; ?>
          </p>
        </div>
      </li>

  <?php
    endwhile;
  endif;

  // 重置循环
  wp_reset_postdata();
  ?>
</ul>
