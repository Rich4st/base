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
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/tailwind.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.min.css">
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script>
  <?php wp_head(); ?>
</head>

<?php get_header(); ?>

<article class="prose lg:prose-xl mx-auto px-4 font-serif">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2>
        <?php the_title(); ?>
      </h2>
      <div>
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</article>

<div id="m-comment" class="lg:max-w-3xl lg:mx-auto px-4 lg:px-0 space-y-8">
  <div class="pt-4 border-t">
    <?php comments_template() ?>
  </div>
  <?php get_template_part('template_parts/base/base-comments') ?>
</div>

<?php get_footer(); ?>
