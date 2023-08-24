<?php 
/**
 * Template Name: Blog
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?> | <?php the_title() ?></title>
  <meta name="description" content="capalot's blog">
  <meta name="keywords" content="blog,博客">
  <meta name="og:title" content="<?php bloginfo('name'); ?>-<?php the_title() ?>">
  <meta name="og:description" content="capalot's blog">
  <meta name="og:keywords" content="blog,博客">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php bloginfo('url') ?>">
  <meta property="og:site_name" content="<?php bloginfo('name') ?>">
  <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/tailwind.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.min.css">
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script> -->
  <?php wp_head(); ?>
</head>
<?php get_header(); ?>

<main class="lg:max-w-6xl lg:mx-auto">

  <section>
    <?php get_template_part('template_parts/blog/blog-3') ?>
  </section>

</main>

<?php get_footer() ; ?>
