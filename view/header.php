<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự Án 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="./view/css/footer.css"> -->
    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
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
            background-color: black;
            /* Màu gạch chân */
            transition: width 0.5s ease;
            /* Thời gian và hiệu ứng */
        }

        .underline-animation:hover::after {
            width: 100%;
            /* Khi di chuột vào, gạch chân sẽ mở rộng từ từ */
        }


        /* Menu con */
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

        .logout a {
            min-width: 150px;
            display: inline-block;
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

        /* hover hiển thị ô input */

        .search-icon {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        /* .search-input {
            position: absolute;
            top: 100%;
            left: 0;
            width: 200px;
            padding: 5px;
            transition: opacity 0.4s ease-out;
        } */
        /* .search-container:hover .search-input {
            opacity: 1;
        } */
    </style>
    <link rel="stylesheet" href="../view/css/home_page.css">
</head>

<body>
    <!-- <img src="../asset/images/logo.webp" alt=""> -->
    <div class="container max-w-full mx-auto mb-[100px] ">
        <header class=" w-full mx-auto  bg-[#FFFFFF] min-h-[60px]">
            <div class="flex items-center py-3 ">
                <div class="logo ml-10">
                    <a href="index.php">
                        <img class="w-[150px]" src="./asset/images/logo.webp" alt="">
                    </a>
                </div>
                <!-- End .logo -->
                <nav class="ml-8 flex justify-between items-center ">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-chevron-compact-down ml-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                                    </svg>
                                </a>
                                <ul class="submenu">
                                    <?php
                                    foreach ($_SESSION['list_cate'] as $cate) {
                                        ?>
                                        <li class="hover:bg-[#E8E8E8]"><a
                                                href="index.php?act=list_product&cate_id=<?php echo $cate['cate_id'] ?>"><?php echo $cate['cate_name'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            <li class="">
                                <a href="index.php?act=list_product" class="flex space-x-2 items-center">
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
                <form class="search" action="index.php?act=list_product" method="POST">
                    <div class="search-container relative ml-6 flex items-center space-x-1 ">
                        <input class="border rounded-[20px] px-2 py-1 text-sm " title="Tìm kiếm sản phẩm"
                            name="cate_name" placeholder="Search..." />
                        <button type="submit" name="search_cate_name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="hover:cursor-pointer  bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="flex items-center space-x-2 ml-3">

                    <?php
                    if (!isset($_SESSION['user'])) {
                        ?>
                        <a href="index.php?act=signin"
                            class="flex items-center space-x-2  px-2 rounded-[20px] border border-gray-400 hover:bg-[#E8E8E8]">
                            <p class="">Đăng nhập</p>
                        </a>
                        <a href="index.php?act=signup"
                            class="flex items-center space-x-2 px-2 rounded-[20px] border border-gray-400 hover:bg-[#E8E8E8]">
                            <p class="">Đăng ký</p>
                        </a>

                        <?php
                    } else {
                        ?>
                        <a href="index.php?act=cart" class=" " title="Giỏ hàng">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                            </svg>
                        </a>


                        <ul>
                            <li class="has-submenu relative">
                                <a class="underline-animation flex items-center" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                </a>
                                <ul class="submenu logout">
                                    <li>
                                        <a href="index.php?act=my_bill" class="hover:bg-[#E8E8E8]">
                                            Đơn hàng của tôi
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?act=logout" class="hover:bg-[#E8E8E8]">
                                            <p class="">Đăng Xuất</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=forget_pass" class="hover:bg-[#E8E8E8]">Quên mật khẩu?</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=edit_account" class="hover:bg-[#E8E8E8]">Cài đặt tài
                                            khoản</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <?php
                    }
                    ?>

                </div>
            </div>

        </header>