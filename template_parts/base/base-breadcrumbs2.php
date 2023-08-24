<?php

/**
 * @description: 面包屑导航
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/base-breadcrumbs.jpg?raw=true
 */
?>
<div class="breadcrumbs">
  <ul class="mb-4 px-4 lg:px-0 flex items-center">
    <li><a class="hover:underline hover:text-sky-600" href="<?php echo home_url(); ?>">Home</a></li>
    <?php
    $current_url = $_SERVER['REQUEST_URI'];
    $url_parts = explode('/', $current_url);
    $breadcrumb = '';
    foreach ($url_parts as $part) {
      if (!empty($part)) {
        $breadcrumb .= '/' . $part;
    ?>
        <li>
          <a class="hover:underline hover:text-sky-600 line-clamp-1" href="<?php echo home_url($breadcrumb) ?>">
            <?php echo ucwords(str_replace(array('.php', '_'), array('', ' '), $part)) ?>
          </a>
        </li>
    <?php
      }
    }
    ?>
  </ul>
</div>
