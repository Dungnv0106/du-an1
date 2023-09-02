<aside class="">
        <script lang="javascript"   >
            <?php
                if (isset($_SESSION['user'])) {
            ?>  
            // alert("Xin Chào <?php echo  $_SESSION['user']['user_name'] ?>")
            <?php        
                }
            ?>
        </script>
        <div class="form_register w-full">
            <p class="px-2 text-center text-xl font-sans font-semibold text-[#F54748] border-b">TÀI KHOẢN</p>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <p class="my-2 text-center"> Xin Chào <span class="font-semibold"><?php echo $_SESSION['user']['user_name'] ?></span></p>

                <ul>   
                    <li>
                        <a href="index.php?act=forget_pass" class="hover:text-[#F54748] hover:underline">Quên mật khẩu?</a>
                    </li>
                    <li>
                        <a href="index.php?act=edit_account" class="hover:text-[#F54748] hover:underline">Cài đặt tài khoản</a>
                    </li>
                    <?php
                    if ($_SESSION['user']['user_role'] === 1) {
                    ?>
                        <li>
                            <a href="admin/index_admin.php" class="hover:text-[#F54748] hover:underline">Đăng nhập trang admin</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php if (isset($_SESSION['error']))
                        echo $_SESSION['error'][0];
                    ?>
                    <li>
                        <a href="index.php?act=logout" class="hover:text-[#F54748] hover:underline">Đăng xuất</a>
                    </li>
                </ul>

            <?php
            } else {
            ?>
                <form action="index.php?act=signin" method="post" class="w-full mt-2" autocomplete="off" enctype="multipart/form">
                    <label for="email">Email</label>
                    <input class="border mt-1 mb-2 w-full px-2 py-1 text-[#4A5568] rounded-md" type="text" name="email" id="email" placeholder="John.snow@gmail.com" autocomplete="off">

                    <label for="password">Mật Khẩu</label>
                    <input class="border mt-1 w-full px-2 py-1 rounded-md" type="password" name="password" id="password" placeholder="Mật khẩu">

                    <input class="mt-4" type="checkbox" name="" id="save_user">
                    <label for="save_user">Ghi nhớ tài khoản?</label> <br>

                    <div class="btn_sign_in mx-auto mt-2 text-center">
                        <input type="submit" name="sign_in" value="Đăng Nhập" class="border px-3 py-2 rounded-md hover:bg-[#FFEEEE] hover:text-[#F54748]">
                    </div> <!-- End .btn_sign_in-->
                    <ul class=" mt-2 space-y-1">
                        <li>
                            <a href="" class="hover:text-[#F54748] hover:underline">Quên mật khẩu?</a>
                        </li>
                        <li>
                            <a href="index.php?act=signup" class="hover:text-[#F54748] hover:underline">Đăng kí tài
                                khoản</a>
                        </li>
                    </ul>
                </form>
            <?php } ?>
        </div> <!-- End .form_register-->
        <hr>
        <div class="category w-full mt-5">
            <p class="p-2 text-center text-xl font-sans font-semibold text-[#F54748] border-b">
                DANH MỤC
            </p>
            <ul class="category_list">
                <?php foreach ($list_cate as $cate) {
                ?>
                    <li class="">
                        <a href="index.php?act=list_product&cate_id=<?php echo $cate['cate_id'] ?>" 
                            class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]"
                        >
                            <?php echo $cate['cate_name'] ?>
                        </a>
                    </li>
                <?php
                } ?>

                <!-- 
                <li class="">
                    <a class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]" href="">Túi Đeo Chéo </a>
                </li>
                <li class="">
                    <a class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]" href="">Túi Đeo Chéo </a>
                </li> -->
            </ul> <!-- End .category_list-->
            <div class="search-cate mt-2 p-2 bg-[#FFEEEE]">
                <form action="index.php?act=list_product" method="POST" class="flex space-x-2">
                    <input class="border w-full px-2 py-1 " 
                        title="Tìm kiếm sản phẩm, danh mục" 
                        name="cate_name" 
                        placeholder="Tìm kiếm sản phẩm, danh mục"
                    >
                    <input class="border px-2 py-1 text-[#F54748] bg-[#FFFFFF] hover:bg-[#FFC0CB]" 
                        type="submit" name="search_cate_name" 
                        value="Tìm kiếm"
                    >
                </form>
            </div> <!-- End .search_cate -->

        </div> <!-- End .category-->
        <div class="top_love w-full mt-5">
            <!-- Top 10 yêu thích -->
            <p class="p-2 text-center text-xl font-sans font-semibold text-[#F54748]">TOP 10 YÊU THÍCH </p>
            <ul class="product_list">
                <?php foreach ($list_top_10 as $pro) {
                ?>
                    <li class="flex justify-between items-center ">
                        <!-- <div class="flex justify-between items-center space-x-2 border border-red-500">
                            <img class="w-[50px] border rounded-md"
                                    src="<?php echo substr($pro['pro_image'], 3); ?>" alt="">
                            <a class="border-red-400 py-2 text-lg hover:underline hover:text-[#F54748]" href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                                <?php echo $pro['pro_name'] ?>
                            </a>
                        </div>
                        <div class="flex justify-between items-center  border border-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                            <span class="text-gray-600"><?php echo $pro['pro_view'] ?></span>
                        </div> -->
                        <div class="grid grid-cols-[15%75%7%] items-center gap-x-1 py-1">

                            <img class="border rounded-md " src="<?php echo substr($pro['pro_image'], 3); ?>" alt="">
                            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>" class=" text-lg hover:underline hover:text-[#F54748] ">
                                <?php echo $pro['pro_name'] ?>
                            </a>


                            <div class="flex flex-col text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="red" class="bi bi-eye mx-auto" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                                <span class="text-slate-600"><?php echo $pro['pro_view'] ?></span>
                            </div>

                        </div>
                    </li>
                <?php
                } ?>

                <!-- <li class="flex items-center space-x-2">
                    <img class="w-[50px] border rounded-md"
                            src="asset/images/tui-deo-cheo-nam.webp" alt="">
                    <a class="block w-full border-red-400 p-2 text-lg hover:underline hover:text-[#F54748]" href="">Túi Đeo Chéo Nam </a>
                </li>
                <li class="flex items-center space-x-2">
                    <img class="w-[50px] border rounded-md"
                            src="asset/images/tui-deo-cheo-nam.webp" alt="">
                    <a class="block w-full border-red-400 p-2 text-lg hover:underline hover:text-[#F54748]" href="">Ví Da Nam </a>
                </li>
                <li class="flex items-center space-x-2">
                    <img class="w-[50px] border rounded-md"
                            src="asset/images/tui-deo-cheo-nam.webp" alt="">
                    <a class="block w-full border-red-400 p-2 text-lg hover:underline hover:text-[#F54748]" href="">Thắt Lưng Da </a>
                </li> -->
            </ul> <!-- End .product_list-->
            <div class="search_pro mt-2 p-2 bg-[#FFEEEE]">
                <form action="" method="get" class="flex space-x-2">
                    <input class="border w-full px-2 py-1" title="Tìm kiếm sản phẩm yêu thích" type="text" name="" placeholder="Tìm kiếm top yêu thích">
                    <input class="border px-2 py-1 text-[#F54748] bg-[#FFFFFF] hover:bg-[#FFC0CB]" type="submit" value="Tìm kiếm">
                </form>
            </div> <!-- End .search_pro -->
        </div> <!-- End .top_love-->
    </aside>