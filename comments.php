<?php
/**
 * 
 * @description 评论列表组件
 * 
 * @see  https://github.com/Rich4st/base/blob/develop/preview/comments.jpg?raw=true
 */
?>
<?php
    $args = array(
        'style'       => 'ol',  // 评论列表的样式，可以是 ul、ol、div 或者 table
        'avatar_size' => 50,    // 头像大小
    );
    wp_list_comments($args);
?>
