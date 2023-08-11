<?php

    if(isset($_SESSION['list_cate'])) {
        // show_array($_SESSION['list_cate']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự Án Mẫu 2022</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;

        }

        .content-item img {
            transition: transform 0.5s ease;
        }

        .content-item:hover img {
            opacity: 0.8;
        }
            .underline-animation {
                position: relative;
                display: inline-block;
            }

        .underline-animation::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: black; /* Màu gạch chân */
            transition: width 0.5s ease; /* Thời gian và hiệu ứng */
        }

        .underline-animation:hover::after {
            width: 100%; /* Khi di chuột vào, gạch chân sẽ mở rộng từ từ */
        }

        

        .menu a {
        text-decoration: none;
        color: #1C1C1C;
        padding: 10px;
        }
        .submenu {
            display: none;
            position: absolute;
            background-color: #FFFFFF;
            z-index: 999;
        }

        .submenu li a {
            min-width: 200px;
            display: inline-block;
            padding: 8px 10px;
            color: #000;
        }
        /* .submenu li a:hover {
            background-color: #E8E8E8;
        } */
        .has-submenu:hover .submenu {
            display: block;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
        }
    </style>
    <link rel="stylesheet" href="../view/css/home_page.css">
</head>

<body >

    <div class="container max-w-full mx-auto mb-[100px]">
        <header class=" w-full mx-auto border bg-[#FFFFFF] min-h-[60px]">
            <div class="flex items-center">
                <div class="logo">
                    <a href="index.php">
                        <img class="w-[150px]" src="./asset/images/logo.webp" alt="">
                    </a>
                </div>
                <!-- End .logo -->
                <nav>
                    <div>
                        <ul class="menu flex items-center space-x-4 text-xl pl-5">
                            <li class="">
                                <a href="index.php" class="flex space-x-2 items-center">
                                    <p class="underline-animation">Trang Chủ</p>
                                </a>
                            </li>
                            
                            <li class="has-submenu relative">
                                <a class="underline-animation flex items-center" href="#">
                                    Danh mục
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down ml-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                                    </svg>
                                </a>
                                <ul class="submenu">
                                    <?php 
                                        foreach($_SESSION['list_cate'] as $cate) {
                                    ?>
                                        <li class="hover:bg-[#E8E8E8]"><a href="index.php?act=list_product&cate_id=<?php echo $cate['cate_id'] ?>"><?php echo $cate['cate_name']?></a></li>
                                    <?php        
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="">
                                <a href="index.php?act=information" class="flex space-x-2 items-center">
                                    <p class="underline-animation">Sản Phẩm</p>
                                </a>
                            </li>
                            
                            <li class="">
                                <a href="index.php?act=information" class="flex space-x-2 items-center">
                                    <p class="underline-animation">Giới Thiệu</p>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
                <div class="form">

                </div>
            </div>
        </header>