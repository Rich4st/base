<?php

/**
 * @description 用于文章内部的导航, 上一篇和下一篇
 * 
 * @see @see https://github.com/Rich4st/base/blob/develop/preview/single-navigation2.jpg?raw=true
 * 
 */
?>

<div class="flex justify-between font-pop">
  <div class="max-w-[50%]">
    <?php
    $prev_post = get_previous_post();
    if ($prev_post) :
      $prev_title = strip_tags(get_the_title($prev_post));
      $prev_link = get_permalink($prev_post);
    ?>
      <a class="flex flex-col group" href="<?php echo $prev_link; ?>" title="<?php echo $prev_title; ?>">
        <div>
          <svg class="inline-block group-hover:-translate-x-1 duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor" d="m14 18l-6-6l6-6l1.4 1.4l-4.6 4.6l4.6 4.6L14 18Z" />
          </svg>
          Prev Post
        </div>
        <p class="font-bold line-clamp-1">
          <?php echo $prev_title; ?>
        </p>
        <span class="block h-[1px] w-0 bg-black group-hover:w-full duration-700"></span>
      </a>
    <?php endif; ?>
  </div>
  <div class="max-w-[50%]">
    <?php
    $next_post = get_next_post();
    if ($next_post) :
      $next_title = strip_tags(get_the_title($next_post));
      $next_link = get_permalink($next_post);
    ?>
      <a class="flex flex-col items-end group" href="<?php echo $next_link; ?>" title="<?php echo $prev_title; ?>">
        <p>
          Next Post
          <svg class="inline-block group-hover:translate-x-1 duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12.6 12L8 7.4L9.4 6l6 6l-6 6L8 16.6l4.6-4.6Z" />
          </svg>
        </p>
        <p class="font-bold line-clamp-1"><?php echo $next_title; ?></p>
        <span class="block h-[1px] w-0 bg-black group-hover:w-full duration-700"></span>
      </a>
    <?php endif; ?>
  </div>
</div>
