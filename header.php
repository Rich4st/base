<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>capalot</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/tailwind.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js"></script>
  <?php wp_head(); ?>
</head>

<body>

  <header class="py-8 px-4 lg:max-w-6xl lg:mx-auto">
    <ul class="flex justify-between items-center">
      <li class="order-2 lg:order-0">
        <h1 class="text-4xl font-extrabold font-bondoni">
          <a href="">Capalot</a>
        </h1>
      </li>
      <li class="order-1">
        <?php get_template_part('template_parts/header/header', 'nav'); ?>
        <?php get_template_part('template_parts/header/header', 'drawer'); ?>
      </li>
      <li class="order-3">
        <?php get_template_part('template_parts/header/header', 'action'); ?>
      </li>
    </ul>
  </header>
