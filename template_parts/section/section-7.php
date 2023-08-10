<?php

/**
 * @description 三栏轮播图组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/section-7.jpg?raw=true
 * 
 * @param array $args
 * @param string $args['page-size'] 每页显示的文章数量
 * @param string $args['orderby'] 排序方式
 * @param string $args['order'] 排序顺序
 */
?>

<div id="three-column-swiper" class="swiper mySwiper rounded-xl overflow-auto">
  <div class="swiper-wrapper">
    <?php $args = array(
      'post_type' => 'post',
      'posts_per_page' => $args['page-size'] ?? -1,
      'orderby' => $args['orderby'] ?? 'date',
      'order' => $args['order'] ?? 'DESC',
    );
    $all_posts = new WP_Query($args);
    ?>
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
        <div class="swiper-slide pb-4">
          <?php if ($first_img) : ?>
            <a class="block overflow-hidden" href="<?php echo $post_link; ?>">
              <img class="h-72 w-full max-w-full object-cover hover:scale-110 duration-150 overflow-hidden" src="<?php echo $first_img; ?>" alt="">
            </a>
          <?php else : ?>
            <?php echo $post_thumbnail; ?>
          <?php endif; ?>

          <div class="my-4 px-4 font-pop">
            <a class="md:text-xl font-extrabold hover:underline line-clamp-2 min-h-[2.75rem] text-center" href="<?php echo $post_link ?>" title="<?php echo $post_title; ?>">
              <?php echo $post_title; ?>
            </a>
            <a class="font-serif text-sm mt-2 hover:underline min-h-[2.5rem] line-clamp-2" href="<?php echo $post_link ?>" title="<?php echo $post_title; ?>">
              <?php echo $post_excerpt; ?>
            </a>
            <div class="text-xs text-gray-400 flex justify-between items-center">
              <p>by <strong><?php the_author() ?></strong></p>
              <p><?php echo $post_date; ?></p>
            </div>
          </div>
        </div>

    <?php
      endwhile;
    endif;

    // 重置循环
    wp_reset_postdata();
    ?>

  </div>
  <div class="swiper-pagination"></div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-bundle.min.js"></script>

<script>
  // 监听是否为手机
  const isMobile = window.matchMedia('(max-width: 768px)').matches;

  if (Swiper) {
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: isMobile ? 2 : 3,
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  // 监听windowsizechange 事件
  window.addEventListener('resize', function() {
    // 监听是否为手机
    const isMobile = window.matchMedia('(max-width: 768px)').matches;
    swiper.params.slidesPerView = isMobile ? 2 : 3;
    swiper.update();
  })
</script>
