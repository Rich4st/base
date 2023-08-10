<div class="font-pop space-y-8">
  <div class="flex items-center">
    <p class="font-bold">Category:</p>
    <ul class="ml-3 flex items-center space-x-2">
      <?php
      $categories = get_the_category();
      foreach ($categories as $category) {
        echo '<li>
        <a class="border border-black p-1 text-sm hover:bg-black hover:text-white duration-100" 
        href="' . get_category_link($category->term_id) . '">' . $category->name . '
        </a>
        </li>';
      }
      ?>
    </ul>
  </div>
  <div class="flex items-center">
    <p class="font-bold">Tags:</p>
    <?php $tags = get_the_tags(); ?>
    <?php if ($tags) : ?>
      <ul class="ml-3 flex items-center space-x-2">
        <?php
        foreach ($tags as $tag) {
          echo '<li><a class="border border-black p-1 text-sm hover:bg-black hover:text-white duration-100"
          href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
        }
        ?>
      <?php endif; ?>
      </ul>
  </div>
</div>
<div class="bg-[#ebecf0] my-8 py-6 pl-4">
  <div>
    <div class="flex items-center">
      <div>
        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')) ?>
      </div>
      <div class="ml-2 flex flex-col justify-between">
        <p class="font-bold"><?php the_author() ?></p>
        <p class="text-sm"><?php the_author_meta('description') ?></p>
      </div>
    </div>
  </div>
</div>
