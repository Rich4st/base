<?php

/**
 * @description 上下布局显示文章图片、标题及分类
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-pool7.jpg?raw=true
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

<div>
  <div class="shadow-[0_8px_30px_rgb(0,0,0,0.12)] mb-4 lg:mb-0 hover:shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] duration-300 rounded-2xl" style="flex: 2;">
    <?php if ($all_posts->have_posts()) : $all_posts->the_post(); ?>
      <?php
      // 输出文章中的第一张图片
      $post_content = get_the_content();
      $post_content = apply_filters('the_content', $post_content);
      $post_content = str_replace(']]>', ']]&gt;', $post_content);
      $first_img = '';
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
      $first_img = $matches[1][0];

      // 输出文章分类
      $post_category = get_the_category();

      // 输出文章链接
      $post_link = get_permalink();
      ?>
      <!-- <?php if ($first_img) : ?> -->
      <div class="block rounded-2xl" href="<?php echo $post_link; ?>">
        <img class="rounded-2xl h-72 w-full object-cover" src="<?php echo $first_img; ?>" alt="">
        <div class="p-4">
          <div class="flex items-end justify-between">
            <div class=" font-serif text-sm">
              <a class="text-xl line-clamp-2 min-h-[3.5rem] hover:underline" href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
              <?php foreach ($post_category as $category) : ?>
                <a class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full mr-2" href="<?php echo get_category_link($category->term_id); ?>">
                  <?php echo $category->name; ?>
                </a>
              <?php endforeach; ?>
            </div>
            <a class="bg-black text-gray-300 rounded-full p-1 hover:bg-gray-700 hover:text-white" href="<?php echo get_permalink(); ?>">
              <svg class="w-6 h-6 hover:scale-110 duration-200" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="m16.172 11l-5.364-5.364l1.414-1.414L20 12l-7.778 7.778l-1.414-1.414L16.172 13H4v-2h12.172Z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
      <!-- <?php endif; ?> -->
    <?php endif; ?>
  </div>

  <ul class="space-x-4 grid grid-cols-1 lg:grid-cols-3 mt-4" style="flex: 1;">
    <?php if ($all_posts->have_posts()) : ?>
      <?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
        <li class="shadow-[0_8px_30px_rgb(0,0,0,0.12)] hover:shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] duration-300 rounded-2xl">
          <?php
          // 输出文章中的第一张图片
          $post_content = get_the_content();
          $post_content = apply_filters('the_content', $post_content);
          $post_content = str_replace(']]>', ']]&gt;', $post_content);
          $first_img = '';
          $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
          $first_img = $matches[1][0];

          // 输出文章标题
          $post_title = get_the_title();

          // 输出文章分类
          $post_category = get_the_category();

          // 输出文章链接
          $post_link = get_permalink();
          ?>
          <!-- <?php if ($first_img) : ?> -->
          <img class="rounded-2xl h-48 w-full max-w-full max-h-full object-cover" src="<?php echo $first_img; ?>" alt="">
          <div class="p-4">
            <div class="flex items-end justify-between">
              <div class=" font-serif text-sm">
                <a class="text-xl line-clamp-2 min-h-[3.5rem] hover:underline mb-1" href="$post_link">
                  <p><?php echo $post_title ?></p>
                </a>
                <?php foreach ($post_category as $category) : ?>
                  <a class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-full mr-2" href="<?php echo get_category_link($category->term_id); ?>">
                    <?php echo $category->name; ?>
                  </a>
                <?php endforeach; ?>
              </div>
              <a class="bg-black text-gray-300 rounded-full p-1 hover:bg-gray-700 hover:text-white" href="<?php echo get_permalink(); ?>">
                <svg class="w-6 h-6 hover:scale-110 duration-200" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor" d="m16.172 11l-5.364-5.364l1.414-1.414L20 12l-7.778 7.778l-1.414-1.414L16.172 13H4v-2h12.172Z" />
                </svg>
              </a>
            </div>
          </div>
          <!-- <?php endif; ?> -->
        </li>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  </ul>
<?php endif; ?>
</div>
