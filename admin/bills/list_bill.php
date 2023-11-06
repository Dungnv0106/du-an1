<?php
session_start();
// show_array($list_pro);
// $condition = false;
// $condition = $_GET['condition'];
// echo $condition;
$condition = false;
// show_array($list_bill);

?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
    QUẢN LÝ ĐƠN HÀNG
</p>
<div class="my-5">
    <form action="index_admin.php?act=list_bill" method="POST">
        <input class="border w-[300px] py-1 px-2" 
                placeholder="Nhập mã đơn hàng" 
                type="text" name="key_word"
        >
        <input name="search_bill" 
            class="border px-2 py-1 hover:bg-[#FFEEEE] hover:text-[#F54748]" type="submit"
            value="Tìm kiếm"
        >
    </form>
</div>
<div class="list_cate mt-6 w-full">
    <table class="border w-full mx-auto ">
        <tr class="bg-[#FFC0CB] py-2 border text-center text-red-600">
            <td class="w-[55px] "></td>
            <td title="Id" class="w-[40px]">Id</td>
            <td title="Khách hàng bình luận" class="w-[130px]">Khách hàng </td>
            <!-- <td title="Nội dung bình luận" class="min-w-[500px]">Tên sản phẩm</td> -->
            <!-- <td title="Tên sản phẩm" class="">Tên sản phẩm</td> -->
            <td title="Ngày bình luận" class=" w-[150px]">Ngày mua hàng</td>
            <td title="Số điện thoại" class=" w-[150px]">Số điện thoại</td>
            <td title="Thao Tác" class="w-[120px]">Thao Tác</td>
        </tr>

        <?php

        foreach ($list_bill as $bill) {
            ?>
            <tr class="show ">
                <td class="text-center"><input type="checkbox" !checked></td>
                <td class="text-center">
                    <?php echo "" . $bill['bill_id'] ?>
                </td>
                <td class="pl-[20px] hover:bg-[#FFEEEE]">
                    <?php echo $bill['bill_name'] ?>
                </td>
                <!-- <td class="px-[10px] hover:bg-[#FFEEEE]">
                    <?php echo $bill['content'] ?>
                </td> -->

                <!-- <td class="text-center hover:bg-[#FFEEEE]">
                    <?php foreach ($list_pro as $pro) {
                        echo ($bill['pro_id'] == $pro['pro_id']) ? $pro['pro_name'] : "";
                    } ?>
                </td> -->

                <td class=" text-center hover:bg-[#FFEEEE]">
                    <?php echo $bill['order_date'] ?>
                </td>
                <td class="text-center">
                    <?php echo $bill['bill_tel'] ?>
                </td>

                <td class="text-center">
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index_admin.php?act=delete_bill&bill_id=<?php echo $bill['bill_id'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
        }

        ?>
    </table>
    <div class="action w-full mx-auto mt-4 flex space-x-1">
        <input type="button" value="Chọn tất cả" onclick="checkAll()">
        <input type="button" value="Bỏ chọn tất cả" onclick="unCheck()">

        <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả người dùng?')"
            href="index_admin.php?act=delete_all_bill&condition=<?php echo $condition ?>">Xóa tất cả</a>

        <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]" type="button"
            onclick="location.href='index_admin.php?act=list_pro'" value="Danh sách sản phẩm ">
    </div> <!-- End .action -->
</div> <!-- End .list_cate-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Loại Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;

        }

        table {
            border-collapse: collapse;
        }

        tr>td {
            padding: 7px 0;
            border: 1px solid gray;
        }

        .show a {
            padding: 4px 8px;
            margin-right: 5px;
            background-color: #FFC0CB;
            border: 1px solid darkgray;
            border-radius: 4px;
        }

        .show a:hover {
            color: rgb(239 68 68);
        }

        .action input,
        a {
            background-color: #FFC0CB;
            padding: 5px 15px;
            border-radius: 4px;
        }

        .action>button {
            background-color: #FFC0CB;
            padding: 5px 15px;
            border-radius: 4px;
        }

        .action>input:hover {
            color: rgb(239 68 68);
            font-weight: 500;
        }
    </style>
    <!-- Thư viện jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<script>
    const checkboxElement = document.querySelectorAll('input[type="checkbox"]');
    localStorage.setItem('condition', 'false');

    let condition = localStorage.getItem('condition');
    // console.log('condition:', condition);
    $.ajax({
        type: "GET",
        url: "index_admin.php?act=delete_all_bill&condition=", condition,
        data: {
            condition,
        },
        success: function (data) {
            console.log('data', data);
        }
    });

    function checkAll() {
        checkboxElement.forEach(item => {
            item.checked = true
            // console.log(item.value);
        })
        // alert(condition)
        return condition = true;
    }

    function unCheck() {
        checkboxElement.forEach(item => {
            item.checked = false;

        })
        // alert(condition)
        return condition = false;
    }

    function deleteAllBill() {
        // alert('Xóa')
        console.log('final condiition: ', condition);
    }
</script>