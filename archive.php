<?php

/**
 * @description 当前分类下的文章列表页面
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/post-category-list.jpg?raw=true
 * 
 */
?>

<?php
get_header();

$cat = get_category(get_query_var('cat'));

$breadcrumbs = array(
  'breadcrumbs' => array(
    array(
      'name' => 'Home',
      'link' => home_url()
    ),
    array(
      'name' => $cat->name ?? 'blog',
      'link' => (get_category_link($cat->term_id ?? '')) ?? '/blog'
    )
  )
)

?>

<main>

  <section class="px-4 pb-8 lg:max-w-6xl lg:mx-auto">
    <?php
    $cat = get_category(get_query_var('cat'));

    get_template_part('template_parts/base/base-breadcrumbs', '', $breadcrumbs)
    ?>

    <?php
    // 查询出当前归档日期下的所有文章
    $posts = get_posts(array(
      'date_query' => array(
        array(
          'year'  => get_query_var('year'),
          'month' => get_query_var('monthnum'),
        )
      )
    ));
    ?>

    <ul class="space-y-4">

      <?php
      foreach ($posts as $post) {
        setup_postdata($post);
      ?>
        <?php
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

        // 获取文章作者
        $post_author = get_the_author();

        // 获取文章评论数
        $post_comment_count = get_comments_number();

        // 获取文章浏览数
        $post_views_count = get_post_meta(get_the_ID(), 'views', true);

        // 获取文章点赞数
        $post_like_count = get_post_meta(get_the_ID(), 'like', true);

        ?>

        <li class="w-full lg:w-[40rem] list-none flex items-center">
          <a class="flex group" href="<?php echo $post_link; ?>">

            <div class="min-w-[9.375rem] min-h-[9.375rem]">
              <?php if ($first_img) : ?>
                <img class="w-[9.375rem] h-[9.375rem] object-cover" src="<?php echo $first_img; ?>" />
              <?php else : ?>
                <?php echo $post_thumbnail; ?>
              <?php endif; ?>
            </div>

            <div class="ml-4 lg:ml-8 flex flex-col justify-between">
              <div>
                <h2 class="text-xl font-serif group-hover:underline line-clamp-2"><?php the_title() ?></h2>
                <p class="line-clamp-2 text-sm"><?php echo $post_excerpt; ?></p>
              </div>
              <div class="flex justify-between">
                <div class="text-sm text-gray-300">
                  <span><?php echo the_date() ?></span>
                  <span><?php echo the_author() ?></span>
                </div>
                <div class="hidden lg:block">
                  <span class="text-sm text-gray-300"><?php echo $post_comment_count ?? 0 ?> Comments</span>
                  <span class="text-sm text-gray-300"><?php echo $post_views_count ?? 0 ?> Views</span>
                  <span class="text-sm text-gray-300"><?php echo $post_like_count ?? 0 ?> Likes</span>
                </div>
              </div>
            </div>
          </a>
        </li>
      <?php
      }
      wp_reset_postdata();
      ?>
    </ul>
  </section>

</main>

<?php get_footer() ?>
