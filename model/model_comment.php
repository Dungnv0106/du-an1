<?php
    function add_comment($content, $user_id, $pro_id, $comment_date){ 
        $sql = "INSERT INTO `comments` 
                VALUES (NULL, '$content', '$user_id', '$pro_id', '$comment_date')";
        connect($sql);
    }

    function get_all_comment ($pro_id) {
        $sql = "SELECT * FROM `comments` WHERE pro_id = '{$pro_id}' order by `comment_id` desc ";
        $list_comment = getAll($sql);
        return $list_comment;
    }
?>