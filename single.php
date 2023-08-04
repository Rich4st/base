<?php get_header(); ?>

<article class="prose lg:prose-xl mx-auto px-4" style="font-family: Papyrus, fantasy, KaiTi_GB2312;">
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

<?php get_footer(); ?>
