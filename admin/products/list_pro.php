<?php
    // show_array($list_pro);
    // show_array($list_cate);
?>

<div class="view">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
        DANH SÁCH SẢN PHẨM
    </p>
    <!-- Form tìm kiếm sản phẩm theo tên hoặc danh mục  -->
    <form action="index_admin.php?act=list_pro" method="post"
        class="mt-3 flex justify-between items-center space-x-3 mb-2">
        <input class="border w-[300px] py-1 px-2" placeholder="Tìm kiếm sản phẩm" type="text" name="key_word"
            value="<?php echo (isset($key_word) && !empty($key_word)) ? $key_word : "";?>">
        <div>
            <!-- <p>Showing</p> -->
            <span class="font-[500] text-gray-800">Showing all <?php echo count($list_pro)?> results</span>
            <select name="cate_id" id="" class="border py-[6px]">
                <option value="0">--Tất cả--</option>
                <?php foreach($list_cate as $cate){?>
                <option value="<?php echo $cate['cate_id']?>"><?php echo $cate['cate_name']?></option>
                <?php }?>
            </select>
            <input name="search_by_cate" class="border px-2 py-1 hover:bg-[#FFEEEE] hover:text-[#F54748]" type="submit"
                value="Tìm kiếm">
        </div>

    </form>
    <?php if(isset($key_word) && !empty($key_word)) echo "<span class='text-[19px]'>Kết quả tìm kiếm cho : </span>\""."<span class='text-xl font-[500]'>".$key_word."</span>"."\"";?>
    <table class="border w-full border mt-2">
        <tr class="title bg-[#FFC0CB] py-2 border text-[17px] text-red-600 text-center">
            <td class="w-[3%]"></td>
            <td class="w-[5%] ">Mã SP</td>
            <td class="w-[10%]">Tên Sản Phẩm</td>
            <td class="w-[15%]">Tên Danh Mục</td>
            <td class="w-[22%]">Hình Ảnh</td>
            <td class="w-[8%]">Đơn Giá</td>
            <!-- <td class="text-center">Giảm Giá</td> -->
            <!-- <td class="text-center w-[110px]">Ngày Tạo</td> -->
            <td class="w-[10%]">Chất liệu</td>
            <td class="w-[21%]">Mô Tả</td>

            <td class="w-[6%]">Thao Tác</td>
        </tr>
        <?php
        foreach ($list_pro as $pro){
            ?>
        <tr class="show hover:bg-[#FFEEEE]">
            <td class="text-center"><input type="checkbox"></td>
            <td class="text-center"><?php echo $pro['pro_id']?></td>
            <td class="px-2"><?php echo $pro['pro_name']?></td>
            <td class="px-2">
                <?php foreach($list_cate as $cate){
                        echo ($pro['cate_id'] == $cate['cate_id'])?$cate['cate_name'] : "";
                    }?>
            </td>
            <td class=""><img class="w-11/12 mx-auto py-1" src="<?php echo $pro['pro_image']?>" alt=""></td>

            <td class="text-center"><?php echo $pro['pro_price']." <span class='font-[500]'>VNĐ</span>"?></td>
            <!-- <td class="text-center"><?php echo $pro['giam_gia']." VNĐ" ?></td> -->
            <td class="px-2"><?php echo $pro['chat_lieu']?></td>
            <td class="px-2"><?php echo $pro['pro_desc']?></td>
            <td class="text-center leading-9">
                <a href="index_admin.php?act=edit_pro&pro_id=<?php echo $pro['pro_id']?>">Sửa</a>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                    href="index_admin.php?act=delete_pro&pro_id=<?php echo $pro['pro_id']?>">Xóa</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="action w-full mt-4 space-x-1">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <input type="button" onclick="location.href='index_admin.php?act=add_cate'" value="Thêm mới danh mục">
        <input type="button" onclick="location.href='index_admin.php?act=add_pro'" value="Thêm mới sản phẩm">
        <input class="border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]" type="button"
            onclick="location.href='index_admin.php?act=list_cate'" value="Danh sách danh mục">
    </div>
</div>

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

    .title td {
        padding: 7px 0;
        border: 1px solid gray;
    }

    tr>td {
        border: 1px solid gray;
    }

    .show a {
        padding: 5px 10px;
        font-weight: 500;
        background-color: #FFC0CB;
        border: 1px solid darkgray;
        border-radius: 4px;
    }

    .show a:hover {
        color: rgb(239 68 68);
    }

    .action>input {
        background-color: #FFC0CB;
        padding: 5px 15px;
        border-radius: 4px;
    }

    .action>input:hover {
        color: rgb(239 68 68);
        font-weight: 500;
    }
    </style>
</head>