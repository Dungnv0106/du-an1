<?php
// show_array($comments);
// $condition = false;
// $condition = $_GET['condition'];
// echo $condition;
$condition = false;
// show_array($list_pro);
// show_array($list_user);
    
?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
    QUẢN LÝ BÌNH LUẬN
</p>
<?php if (isset($thong_bao)) echo "<p class='text-red-500'>" . $thong_bao . "</p>" ?>
<div class="list_cate mt-6 w-full">
    <table class="border w-full mx-auto ">
        <tr class="bg-[#FFC0CB] py-2 border text-center text-red-600">
            <td class="w-[55px] "></td>
            <td title="Id" class="w-[40px]">Id</td>
            <td title="Khách hàng bình luận" class="w-[130px]">Khách hàng bình luận</td>
            <td title="Nội dung bình luận" class="min-w-[500px]">Nội dung bình luận</td>
            <td title="Tên sản phẩm" class="">Tên sản phẩm</td>
            <td title="Ngày bình luận" class=" w-[150px]">Ngày bình luận</td>
            <td title="Thao Tác" class="w-[120px]">Thao Tác</td>
        </tr>
         
        <?php
        
        foreach ($list_comment as $comment) {
        ?>
            <tr class="show ">
                <td class="text-center"><input type="checkbox" !checked></td>
                <td class="text-center"><?php echo $comment['comment_id'] ?></td>
                <td class="pl-[20px] hover:bg-[#FFEEEE]" >
                    <?php foreach($list_user as $user){
                        echo ($comment['user_id'] == $user['user_id'])?$user['user_name'] : "";
                    }?>
                </td>
                <td class="px-[20px] hover:bg-[#FFEEEE]">
                    <?php echo $comment['content'] ?>
                </td>
                
                <td class="pl-[20px] hover:bg-[#FFEEEE]" >
                <?php foreach($list_pro as $pro){
                        echo ($comment['pro_id'] == $pro['pro_id']) ? $pro['pro_name'] : "";
                    }?></td>
                </td>
                <td class="pl-[20px] hover:bg-[#FFEEEE]"><?php echo $comment['comment_date'] ?></td>
                <td class="text-center">
                    <!-- <a href="index_admin.php?act=edit_comment&user_id=<?php echo $comment['user_id'] ?>">Sửa</a> -->
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="index_admin.php?act=delete_comment&comment_id=<?php echo $comment['comment_id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php
        }
        
        ?>
    </table>
    <div class="action w-full mx-auto mt-4 flex space-x-1">
        <input type="button" value="Chọn tất cả" onclick="checkAll()">
        <input type="button" value="Bỏ chọn tất cả" onclick="unCheck()">

        <a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả người dùng?')" href="index_admin.php?act=delete_all_comment&condition=<?php echo $condition?>">Xóa tất cả</a>

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
        url: "index_admin.php?act=delete_all_comment&condition=", condition,
        data: {
            condition,
        },
        success: function(data) {
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

    function deleteAllcomment() {
        // alert('Xóa')
        console.log('final condiition: ', condition);
    }
</script>