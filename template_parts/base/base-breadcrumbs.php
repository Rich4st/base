<?php
/**
 * @description 面包屑组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/base-breadcrumbs.jpg?raw=true
 * 
 * @param array $args
 * @param array $args['breadcrumbs'] 面包屑数组
 * @param string $args['breadcrumbs']['name'] 面包屑名称
 * @param string $args['breadcrumbs']['link'] 面包屑链接
 * 
 */
?>
<div class="text-sm breadcrumbs py-8">
  <ul>
    <?php
    $breadcrumbs = $args['breadcrumbs'];

    foreach ($breadcrumbs as $breadcrumb) {
    ?>
      <li>
        <a href="<?php echo $breadcrumb['link'] ?>">
          <?php echo $breadcrumb['name'] ?>
        </a>
      </li>
    <?php
    }
    ?>
  </ul>
</div>
