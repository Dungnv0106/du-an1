<?php
    // Hàm kết nối với database và thực thi
    // global $connect;
    function connect($query){
        // global $connect;
        $connect = new PDO("mysql:host=localhost;dbname=du_an_mau2022;charset=utf8","root","");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect ->prepare($query);
        $stmt -> execute();
        return $stmt;
    }

    function getLastId($sql) {
    // global $connect;
        $connect = new PDO("mysql:host=localhost;dbname=du_an_mau2022;charset=utf8","root","");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect ->prepare($sql);
        $stmt -> execute();
        return $connect->lastInsertId();
    }

    // Hàm lấy tất cả dữ liệu
    function getAll($query){
        $result = connect($query)->fetchAll();
        return $result;
    }
    // Hàm lấy ra 1 hàng dữ liệu
    function getOne($query){ 
        $result = connect($query) -> fetch();
        return $result;
    }

    function show_array($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    
?>