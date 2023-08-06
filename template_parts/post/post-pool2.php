<?php

/**
 * @description 瀑布流显示文章缩略图、标题作者及时间
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-pool2.jpg?raw=true
 * 
 * @param array $args
 * 
 * @param string $args['page-size'] 每页显示的文章数量
 * 
 * @param string $args['orderby'] 排序方式
 * 
 * @param string $args['order'] 排序顺序
 * 
 * @param bool $args['show-date'] 是否显示日期
 */
$query_args = array(
  'post_type' => 'post',
  'posts_per_page' => $args['page-size'] ?? -1,
  'orderby' => $args['orderby'] ?? 'date',
  'order' => $args['order'] ?? 'DESC',
);
$all_posts = new WP_Query($query_args);

$title_class = $args['title-class'] ?? 'text-xl line-clamp-2 min-h-[3.5rem] hover:underline';

$show_date = $args['show-date'] ?? true;

?>

<ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8">
  <?php
  if ($all_posts->have_posts()) :
    while ($all_posts->have_posts()) : $all_posts->the_post();
      // 获取文章标题
      $post_title = get_the_title();

      // 获取文章缩略图
      $post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'w-full', 'width' => '100%', 'height' => 'auto'));

      // 输出文章链接
      $post_link = get_permalink();

      // 输出文章日期并格式化为M d, Y
      $post_date = get_the_date('M d, Y');

      // 输出文章作者
      $post_author = get_the_author();

  ?>
      <li class="bg-[#eaece3] rounded-lg">
        <div id="pool2-thumbnail" class="overflow-hidden">
          <a class="rounded-tl-lg rounded-tr-lg" href="<?php echo $post_link ?>"><?php echo $post_thumbnail; ?></a>
        </div>

        <div class="my-4 px-4">
          <a class="<?php echo $title_class; ?>" href="<?php echo $post_link ?>">
            <h2><?php echo $post_title; ?></h2>
          </a>
          <?php if ($show_date) : ?>
            <div class="text-sm font-semibold text-gray-600 flex items-center justify-between pt-8">
              <p>
                <?php echo $post_date; ?>
              </p>
              <p>
                <?php echo $post_author; ?>
              </p>
            </div>
          <?php endif; ?>
        </div>
      </li>

  <?php
    endwhile;
  endif;

  // 重置循环
  wp_reset_postdata();
  ?>
</ul>
