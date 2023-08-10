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

<div id="m-comment" class="lg:max-w-3xl lg:mx-auto px-4 lg:px-0 space-y-8 btn btn-outline">
  <div class="pt-4 border-t">
    <?php comments_template() ?>
  </div>
  <?php get_template_part('template_parts/base/base-comments') ?>
</div>

<?php get_footer(); ?>
