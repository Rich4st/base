<?php get_header() ?>

<!-- 获取当前浏览器参数并展示 -->
<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
echo $browser;
?>

<main class="lg:max-w-6xl lg:mx-auto">

  <section class="px-4">
    <?php get_template_part('template_parts/base/base-sidebar') ?>
  </section>

</main>

<?php get_footer(); ?>
