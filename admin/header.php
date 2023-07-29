<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        label {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container max-w-full mx-auto py-4">
        <div class="main w-11/12 mx-auto">
            <p class="p-4 text-5xl text-[#F54748] bg-[#FFC0CB] rounded-md">QUẢN TRỊ WEBSITE</p>
            <div class="menu my-6 py-2 text-red-800 bg-[#FFC0CB] rounded-md">
                <nav>
                    <ul class="pl-4 flex items-center space-x-10 text-xl ">
                        <li class="hover:underline">
                            <a href="index_admin.php">Trang Chủ</a>
                        </li>
                        <li class="hover:underline">
                            <a href="index_admin.php?act=list_cate">Danh Mục</a>
                        </li>
                        <li class="hover:underline">
                            <a href="index_admin.php?act=list_pro">Sản Phẩm</a>
                        </li>
                        <li class="hover:underline">
                            <a href="index_admin.php?act=customer">Khách Hàng</a>
                        </li>
                        <li class="hover:underline">
                            <a href="index_admin.php?act=comment">Bình Luận</a>
                        </li>
                        <li class="hover:underline">
                            <a href="index_admin.php?act=statistic">Thống Kê</a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- End .menu-->