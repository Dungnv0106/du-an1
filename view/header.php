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
    </style>
    <link rel="stylesheet" href="../view/css/home_page.css">
</head>

<body onload="loadAnh()">

    <div class="container max-w-full mx-auto mb-[100px]">
        <header class="w-full mx-auto pb-3 bg-[#FFC0CB]">
            <div class="flex justify-between items-center ">
                <div class="logo w-[150px] ml-5">
                    <a href="index.php"><img class="bg-clip-content" src="asset/images/logo_gence.webp" alt=""></a>
                </div>
                <form action="" class="flex ml-[-30px] relative ">
                    <input class="border border-red-400 py-[6px] rounded-[30px] w-[650px] px-3 text-sm " placeholder="Bạn muốn tìm gì hôm nay..." type="text">
                    <button class="hover:fill-[#FFC0CB]">
                        <img class="absolute right-3 top-2" src="asset/icon/search.svg" alt="">
                    </button>
                </form>
                <div class="flex justify-between items-center mr-[130px] ">
                    <button class="flex items-center space-x-2 ml-5 bg-[#FFFFFF] px-2 rounded-[20px] ">
                        <img class="" src="asset/icon/cart2.svg" alt="">
                    </button>
                </div>
            </div>
            <div class="menu w-full ">
                <nav class="ml-8 flex justify-between items-center ">
                    <div>
                        <ul class="flex items-center space-x-10 text-[#FFFFFF] text-xl">
                            <li class="">
                                <a href="index.php" class="flex space-x-2 items-center">
                                    <img src="asset/icon/house-heart-fill.svg" alt="">
                                    <span class="hover:text-red-400 hover:underline">Trang Chủ</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?act=" class="flex space-x-2 items-center">
                                    <img src="asset/icon/grid.svg" alt="">
                                    <span class="hover:text-red-400 hover:underline">Sản Phẩm</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?act=information" class="flex space-x-2 items-center">
                                    <img src="asset/icon/newspaper.svg" alt="">
                                    <span class="hover:text-red-400 hover:underline">Thông tin </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?act=introduction" class="flex space-x-2 items-center">
                                    <img src="asset/icon/person-rolodex.svg" alt="">
                                    <span class="hover:text-red-400 hover:underline">Giới Thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?act=" class="flex space-x-2">
                                    <img src="asset/icon/person-lines-fill.svg" alt="">
                                    <span class="hover:text-red-400 hover:underline">Hỗ Trợ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="w-[170px] mr-20 flex justify-between items-center ">
                        <a href="signin.html"
                        class="px-3 py-2 bg-[#FFFFFF] border text-[#FFC0CB] rounded-[5px] hover:text-[#FFFFFF] hover:bg-[#FFC0CB]">
                            Sign in
                        </a>
                        <a href=""
                        class="px-3 py-2 bg-[#FFFFFF] border text-[#FFC0CB] rounded-[5px] hover:text-[#FFFFFF] hover:bg-[#FFC0CB]">
                            Sign up
                        </a>
                    </div> -->
                </nav>
            </div> <!-- End .menu-->
        </header>