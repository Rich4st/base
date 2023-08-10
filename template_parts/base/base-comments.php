<?php
/**
 * 
 * @description 评论表单组件
 * 
 * @see  https://github.com/Rich4st/base/blob/develop/preview/base-comments.jpg?raw=true
 */
?>
<?php
    comment_form(array(
        'title_reply' => 'Leave a reply',
        'label_submit' => 'Post Comment',
        'comment_field' => '<textarea id="comment" name="comment" class="textarea textarea-accent w-full" rows="3" placeholder="comment here..."></textarea>',
    ));
?>
