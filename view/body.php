<?php
// show_array($new_pro);
// echo $new_pro[0]['pro_image'];
// show_array($list_cate);
// show_array($list_top_10);

if (isset($_SESSION['user'])) {
    // echo ("body");
    // show_array($_SESSION['user']);
}
?>
<style>
    .add-to-cart {
        opacity: 0;
        transform: translateY(40px);
        transition: 0.3s all;

    }

    .content-item:hover .add-to-cart {
        opacity: 1;
        transform: translateY(0);
    }

    .view-detail {
        opacity: 0;
        transform: translateY(40px);
        transition: 0.3s all;
        bottom: 0px;
        left: 130px
    }

    .content-item:hover .view-detail {
        opacity: 1;
        transform: translateY(0);

    }
</style>
<script>
    var images = [];
    var index = 1;

    function loadAnh() {
        for (var i = 1; i < 4; i++) {
            images[i] = new Image();
            images[i].src = "asset/images/banner" + i + ".jpg";
        }
        auto();
    }

    function auto() {
        document.getElementById("anh").src = images[index].src;
        if (index == 3) {
            index = 1;
        } else {
            index++;
        }
        setTimeout(auto, 10000);
    }

    function next() {
        index++;
        if (index >= images.length) {
            index = 1;
        }
        document.getElementById("anh").src = images[index].src;
    }

    function prev() {
        index--;
        if (index < 1) {
            index = images.length - 1;
        }
        document.getElementById("anh").src = images[index].src;


    }
</script>

<div class="banner relative min-h-[700px] w-full mt-2">
    <button class="absolute top-1/2" onclick="prev();">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FFFFFF" class="hover:fill-[#000000] bi bi-arrow-left-circle " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </button>
    <a href="" class="">
        <img title="banner" id="anh" class="w-full h-full" src="../asset/images/banner2.jpg" alt="">
    </a>
    <button class="absolute top-1/2 right-0" onclick="next();">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#FFFFFF" class="hover:fill-[#000000] bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
        </svg>
    </button>
</div>
<!-- End .banner-->
<div class="p_shop w-5/6 mx-auto mt-5 text-center text-2xl font-semibold text-[#F54748] ">
    <span class="italic">GENCE - THỜI TRANG CÔNG SỞ</span>
</div> <!-- End .p_shop-->
<section class="content w-11/12 grid grid-cols-[75%25%] mt-8 mx-auto gap-2 ">
    <div class="grid grid-cols-3 gap-x-4 gap-y-6 ">
        <?php foreach ($new_pro as $pro) { ?>
            <div class="content-item min-h-[480px] text-center space-y-2 overflow-hidden box-border relative ">
                <div class="relative text-center">
                    <a class="" href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <img title="<?php echo $pro['pro_name'] ?>" class="w-full h-[340px] rounded-md bg-clip-padding bg-gray-200 duration-500 hover:scale-x-105 hover:scale-y-105  " src="<?php echo substr($pro['pro_image'], 3); ?>" alt="">
    
                    </a>
                    <a class="view-detail absolute mx-auto text-center" href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <img class="border border-white-400 bg-[#FFFFFF] hover:bg-[#EEEEEE] rounded-[4px] px-4 py-1" title="View Detail" src="./asset/icon/eye-fill.svg" alt="">
                    </a>
                </div >
                <div class="min-h-[120px]">

                    <p class="text-slate-400"><?php foreach ($list_cate as $cate) {
                                                    echo ($cate['cate_id'] == $pro['cate_id'] ? $cate['cate_name'] : ""); // Hiển thị category
                                                } ?></p>
                    <!-- <p><?php echo ($list_cate['cate_id'] == $pro['cate_id'] ? $list_cate['cate_name'] : "") ?></p> -->

                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <p class="text-teal-800 text-[21px] fold-semibold text-left pl-3 "><?php echo $pro['pro_name'] ?></p>
                    </a>

                    <p class="px-2 text-red-600 font-bold  ">
                        <?php echo $pro['pro_price'] ?> <span class="underline text-sm ml-[3px] absolute">đ</span>
                    </p>

                    <!-- <p class="px-2  ">
                        Giá KM
                    </p> -->
                </div>
                <button class="add-to-cart w-full py-2 rounded-[4px] border font-[500] text-center hover:bg-[#FFA07A] hover:text-white">
                    Buy Now

                </button>
            </div>
            <!-- End .content-item-->
        <?php } ?>


    </div> <!-- End grid-->
    <aside class="">
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
                        <a href="index.php?act=list_product&cate_id=<?php echo $cate['cate_id'] ?>" class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]">
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
                    <input class="border w-full px-2 py-1 " title="Tìm kiếm sản phẩm, danh mục" type="text" name="cate_name" placeholder="Tìm kiếm sản phẩm, danh mục">
                    <input class="border px-2 py-1 text-[#F54748] bg-[#FFFFFF] hover:bg-[#FFC0CB]" type="submit" name="search_cate_name" value="Tìm kiếm">
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
</section> <!-- End .content-->