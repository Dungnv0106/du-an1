<?php
    function add_user($email, $fullName, $password, $repass){
        $sql = "INSERT INTO `users` 
        (`user_id`, `user_email`, `user_name`, `user_pass`, `user_repass`, `user_role`) 
        VALUES (NULL, '{$email}', '{$fullName}', '{$password}', '{$repass}', '0')";
        connect($sql);
    }
    function queryAllUser(){
        $sql = "SELECT * FROM `users` WHERE 1";
        $list_user = getAll($sql);
        return $list_user;
    }
    function queryOneUser($email, $password){
        $sql = "SELECT * FROM `users` WHERE user_email = '{$email}' AND user_pass = '{$password}'" ;
        $info_one_user = getOne($sql);
        return $info_one_user;
    }
    function edit_user($user_id, $email, $fullName, $password, $repass){
        $sql = "UPDATE `users` SET user_email='{$email}', user_name='{$fullName}', user_pass='{$password}', user_repass='{$repass}' WHERE user_id='{$user_id}'";
        // UPDATE `users` SET `user_name` = 'dungxibo update', `user_pass` = '12345678', `user_repass` = '12345678' WHERE `users`.`user_id` = 4;
        connect($sql);
    }

    function forgot_password($user_id, $email, $password){
        $sql = "UPDATE `users` SET user_email='{$email}', user_pass='{$password}', user_repass='{$password}' WHERE user_id='{$user_id}'";
        // UPDATE `users` SET `user_name` = 'dungxibo update', `user_pass` = '12345678', `user_repass` = '12345678' WHERE `users`.`user_id` = 4;
        connect($sql);
    }

    function checkUser($email) {
        $sql = "SELECT * from `users` WHERE user_email = '{$email}";
        $one_user = getOne($sql);
        return $one_user;
    }

    function getAllAccount() {
        $sql = "SELECT * FROM `users` WHERE 1";
        $accounts = getAll($sql);
        return $accounts;
    }

    function deleteAccount($user_id) {
        $sql = "DELETE FROM `users` WHERE user_id = '{$user_id}' ";
        connect($sql);
    }
    function delete_all_account() {
        $sql = "DELETE FROM `users` ";
        connect($sql);
    }
?>