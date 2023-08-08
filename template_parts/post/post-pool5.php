<?php
/**
 * @description 水平展示文章图片、和标题，点击full detail跳转到文章详情
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-horizontal.jpg?raw=true
 * 
 * @param array $args
 * @param string $args['pageSize'] 每页显示的文章数量
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
<ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 lg:gap-8 <?php echo $args['extra-class'] ?? '' ?>">
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
          <img class="rounded-2xl h-48 w-full max-w-full max-h-full object-cover" src="<?php echo $first_img; ?>" alt="">
        <?php else : ?>
          <?php echo $post_thumbnail; ?>
        <?php endif; ?>

        <div class="my-4">
          <h2 class="text-2xl font-serif line-clamp-2 min-h-[4rem]" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></h2>
          <p class="font-serif text-sm mt-2">
            <?php
            if ($post_tags) {
              foreach ($post_tags as $tag) {
                echo '<span>' . $tag->name . '</span>';
              }
            }
            ?>
          </p>

          <a class="flex items-center mt-2 lg:mt-4 group" href="<?php echo $post_link; ?>">
            <span class="font-serif text-sm italic underline group-hover:no-underline font-thin">Full Details</span>
            <img class="w-4 h-4" src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-right.svg" alt="">
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
