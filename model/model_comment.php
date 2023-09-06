<?php
    function add_comment($content, $user_id, $pro_id, $comment_date){ 
        $sql = "INSERT INTO `comments` 
                VALUES (NULL, '$content', '$user_id', '$pro_id', '$comment_date')";
        connect($sql);
    }

    function get_all_comment ($pro_id) {
        $sql = "SELECT * FROM `comments` WHERE 1";
        if($pro_id > 0){
            $sql.= " AND pro_id = '{$pro_id}'";
        }
            $sql.= " order by `comment_id` desc ";

        $list_comment = getAll($sql);
        return $list_comment;
    }

    function deleteComment($comment_id) {
        $sql = "DELETE FROM `comments` WHERE `comment_id` = '{$comment_id}' ";
        connect($sql);
    }

    function checkUserInComment($user_id, $pro_id) {
        $connect = new PDO("mysql:host=localhost;dbname=du_an_mau2022;charset=utf8","root","");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM `comments` 
                WHERE user_id = '{$user_id}' AND pro_id = '{$pro_id}' ";
        $count = $connect -> query($sql) -> fetchAll();
        return $count;
    }
?>    
