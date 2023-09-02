<?php
    function add_pro($pro_name, $pro_price, $target_file, $pro_quantity, $pro_desc, $chat_lieu, $cate_id){
        $sql_add_pro = "INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_image`, `pro_quantity` ,`pro_desc`, `chat_lieu`, `cate_id`) 
                        VALUES (NULL, '{$pro_name}', '{$pro_price}', '{$target_file}', '{$pro_quantity}' ,'{$pro_desc}', '{$chat_lieu}','{$cate_id}')";
        connect($sql_add_pro);
    }

    function queryAllPro($key_word, $cate_id){
        $query_pro = "SELECT * FROM `products` WHERE 1";
        if($key_word != ""){
            $query_pro .= " AND pro_name like '%{$key_word}%' ";
        }
        if($cate_id > 0){
            $query_pro.= " AND cate_id = '{$cate_id}' ";
        }
        $query_pro.= " ORDER BY pro_id DESC";
        $list_pro = getAll($query_pro);
        return $list_pro;
    }
    function queryOnePro($pro_id){
        $query_one_pro = "SELECT * FROM products WHERE pro_id = '{$pro_id}'";
        $one_pro = getOne($query_one_pro);
        return $one_pro;
    }
// Cập nhật sản phẩm 
    function update_pro($pro_id, $pro_name, $pro_price, $target_file, $pro_quantity ,$pro_desc, $chat_lieu, $cate_id){
        if($target_file == "../upload/"){
            $update_pro = "UPDATE `products` SET pro_name='{$pro_name}', pro_price='{$pro_price}',pro_quantity= '{$pro_quantity}' ,pro_desc = '{$pro_desc}', chat_lieu = '{$chat_lieu}', cate_id = '{$cate_id}' WHERE pro_id = '{$pro_id}'";
        } else{
            $update_pro = "UPDATE `products` SET pro_name='{$pro_name}', pro_price='{$pro_price}', pro_image = '{$target_file}', pro_quantity= '{$pro_quantity}' ,pro_desc = '{$pro_desc}', chat_lieu = '{$chat_lieu}', cate_id = '{$cate_id}' WHERE pro_id = '{$pro_id}'";
        }
        connect($update_pro);
    }
    function delete_pro($pro_id ){
        $delete_pro = "DELETE FROM `products` WHERE pro_id = '{$pro_id}'";
        connect($delete_pro);
    }
// Lấy 9 sản phẩm hiển thị cho trang chủ
    function query_pro_home(){
        $select_pro = "SELECT * FROM `products` WHERE 1 ORDER BY pro_id LIMIT 0,9";
        $list_pro_home = getAll($select_pro);
        return $list_pro_home;
    }
// Top 10 sản phẩm ưu thích
    function query_pro_top10(){
        $sql = "SELECT * FROM `products` WHERE 1 ORDER BY pro_view DESC LIMIT 0,10";
        $list_pro_top_10 = getAll($sql);
        return $list_pro_top_10;
    }
// Lấy sản phẩm cùng loại(khác id nhưng cùng danh mục) theo lượt xem giảm dần
    function query_similar_pro($pro_id, $cate_id){
        $sql = "SELECT * FROM `products` WHERE pro_id <> '{$pro_id}' AND cate_id = '{$cate_id}' ORDER BY pro_view DESC";
        $similar_pro = getAll($sql);
        return $similar_pro;
    }
// Lấy tên danh mục theo id
    function query_cate_name($cate_id){
        if(isset($cate_id) && ($cate_id > 0)){
            $sql = "SELECT * FROM `categories` WHERE cate_id = '{$cate_id}'";
            $cate_name = getOne($sql);
            return $cate_name;
        } else{
            return "";
        }
    }    
?>