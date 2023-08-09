<?php 
/**
 * @description 用于文章内部的导航, 上一篇和下一篇
 * 
 * @see @see https://github.com/Rich4st/base/blob/develop/preview/single-navigation1.jpg?raw=true
 * 
 */
?>

<div class="flex justify-between">
  <div class="max-w-[50%]">
    <?php
    $prev_post = get_previous_post();
    if ($prev_post) :
      $prev_title = strip_tags(get_the_title($prev_post));
      $prev_link = get_permalink($prev_post);
    ?>
      <a class="hover:no-underline line-clamp-2 hover:text-pink-500" href="<?php echo $prev_link; ?>" title="<?php echo $prev_title; ?>">&laquo; <?php echo $prev_title; ?></a>
    <?php endif; ?>
  </div>
  <div class="max-w-[50%]">
    <?php
    $next_post = get_next_post();
    if ($next_post) :
      $next_title = strip_tags(get_the_title($next_post));
      $next_link = get_permalink($next_post);
    ?>
      <a class="hover:no-underline line-clamp-2 hover:text-pink-500" href="<?php echo $next_link; ?>" title="<?php echo $prev_title; ?>"><?php echo $next_title; ?> &raquo;</a>
    <?php endif; ?>
  </div>
</div>
