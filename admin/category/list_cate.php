<?php
// show_array($list_cate);
?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
    QUẢN LÝ LOẠI HÀNG
</p>
<?php if (isset($thong_bao)) echo "<p class='text-red-500'>" . $thong_bao . "</p>" ?>
<div class="list_cate mt-6 w-full">
    <table class="border w-full mx-auto ">
        <tr class="bg-[#FFC0CB] py-2 border text-center text-red-600">
            <td class="w-[55px] "></td>
            <td title="Mã loại hàng" class="w-[140px]">Mã Loại Hàng</td>
            <td title="Tên loại hàng" class="">Tên Loại Hàng</td>
            <td title="Thao Tác" class="w-[120px]">Thao Tác</td>
        </tr>
        <?php
        foreach ($list_cate as $cate) {
        ?>
            <tr class="show ">
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><?php echo $cate['cate_id'] ?></td>
                <td class="pl-[20px] hover:bg-[#FFEEEE]" title="<?php echo $cate['cate_name'] ?>"><?php echo $cate['cate_name'] ?></td>
                <td class="text-center">
                    <a href="index_admin.php?act=edit_cate&cate_id=<?php echo $cate['cate_id'] ?>">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="index_admin.php?act=delete_cate&cate_id=<?php echo $cate['cate_id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="action w-full mx-auto mt-4 space-x-1">
        <input type="button" value="Chọn tất cả" onclick="checkAll()">
        <input type="button" value="Bỏ chọn tất cả" onclick="unCheck()">
        <input type="button" value="Xóa các mục đã chọn">
        <input type="button" onclick="location.href='index_admin.php?act=add_cate'" value="Thêm mới danh mục">
        <input type="button" onclick="location.href='index_admin.php?act=add_pro'" value="Thêm mới sản phẩm">
        <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]" type="button" onclick="location.href='index_admin.php?act=list_pro'" value="Danh sách sản phẩm ">
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
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

<!-- <script>
        const checkboxElement = document.querySelectorAll('input[type="checkbox"]');
    function checkAll() {
        // const checkboxElement = document.querySelectorAll('input[type="checkbox"]');
        console.log(checkboxElement);
        alert('ji')
        checkboxElement.forEach(item => item.checked = true)

    }

    function unCheck() {
        // const checkboxElement = document.querySelectorAll('input[type="checkbox"]');
        checkboxElement.forEach(item => item.checked = false)
    }
    function deleteAllAccount() {
        // alert('Xóa')
    }
</script> -->