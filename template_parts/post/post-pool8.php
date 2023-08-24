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
  'posts_per_page' => $args['page-size'] ?? 3,
  'orderby' => $args['orderby'] ?? 'date',
  'order' => $args['order'] ?? 'DESC',
);
$all_posts = new WP_Query($args);
?>
<ul class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
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

      // 输出文章中的第一张图片
      $post_content = get_the_content();
      $post_content = apply_filters('the_content', $post_content);
      $post_content = str_replace(']]>', ']]&gt;', $post_content);
      $first_img = '';
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
      $first_img = $matches[1][0];
  ?>
      <li class="font-pop">
        <a class="font-serif text-lg hover:underline min-h-[3.75rem] line-clamp-2" href="<?php echo $post_link ?>">
          <span><?php echo $post_excerpt; ?></span>
        </a>
        <?php if ($first_img) : ?>
          <a class="block overflow-hidden" title="<?php echo $post_title; ?>" href="<?php echo $post_link; ?>">
            <img title="<?php echo $post_title; ?>" class="h-80 max-h-[20rem] w-full max-w-full object-cover hover:scale-110 duration-150 overflow-hidden" src="<?php echo $first_img; ?>" alt="">
          </a>
        <?php else : ?>
          <?php echo $post_thumbnail; ?>
        <?php endif; ?>
        <div class="my-4">
          <a title="<?php echo $post_title; ?>" class="text-lg font-extrabold line-clamp-2 h-[3.75rem] border-b hover:underline decoration-wavy" href="<?php echo $post_link; ?>"><?php echo $post_title; ?></a>
          <div class="pt-2 flex items-center">
            <div>
              <p class="text-xs text-gray-400 pt-2">Author:</p>
              <p class="text-sm font-semibold pt-2"><?php the_author(); ?></p>
            </div>
            <div class="ml-16">
              <p class="text-xs text-gray-400 pt-2">time:</p>
              <p class="text-sm font-semibold pt-2">
                <?php
                $content = get_post_field('post_content', get_the_ID());
                $count = mb_strlen(preg_replace('/\s/', '', html_entity_decode(strip_tags($content))));
                $time = ceil($count / 500);
                echo $time . 'minutes';
                ?>
              </p>
            </div>
          </div>
        </div>
      </li>

  <?php
    endwhile;
  endif;

  // 重置循环
  wp_reset_postdata();
  ?>
</ul>
