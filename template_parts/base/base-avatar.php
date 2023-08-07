<?php 
/**
 * @descrption 头像组件
 * 
 * @see https://github.com/Rich4st/base/blob/develop/preview/base-avatar.jpg?raw=true
 * 
 * @param string $avatar 头像图片名称
 * @param string $content 头像下方的文字内容
 * @param string $name 头像下方的名字
 * @param string $title 头像下方的标题
 */
?>
<div class="flex">
  <div class="w-32 h-32">
    <img class="rounded-full" src="<?php echo get_template_directory_uri() ?>/assets/images/<?php echo $args['avatar'] ?>" alt="">
  </div>
  <div class="ml-4">
    <p class="font-serif w-48 lg:w-96"><?php echo $args['content']; ?></p>
    <div>
      <p class="font-copp"><?php echo $args['name'] ?></p>
      <p class="text-gray-500"><?php echo $args['title'] ?></p>
    </div>
  </div>
</div>
