<?php
// show_array($new_pro);
// echo $new_pro[0]['pro_image'];
// show_array($list_cate);
// show_array($list_top_10);
// show_array($get_four_cate);
if (isset($_SESSION['user'])) {
    // echo ("body");
    // show_array($_SESSION['user']);
    if(isset($log_out)) {
        $javascriptCode = "
            var message = '$log_out';
            alert(message);
        ";
        echo "<script>$javascriptCode</script>";
    }
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
        left: 90px
    }

    .content-item--image:hover .view-detail {
        opacity: 1;
        transform: translateY(0);

    }

    .slideshow {
        position: relative;
        width: 100%;
        height: 100%;
        /* overflow: hidden; */
    }

    .slideshow img {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .slideshow img.active {
        opacity: 1;
    }
</style>


<div class="banner relative min-h-[700px] w-full">
    <!-- <button class="absolute top-1/2" onclick="prev()">
        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#DCDCDC" class="hover:fill-[#363636] bi bi-arrow-left-circle " viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
    </button> -->
    <div class="slideshow">
        <img id="anh" src="./asset/images/banner/banner1.jpg" alt="">
        <img id="anh" src="./asset/images/banner/banner2.jpg" alt="">
    </div>

    <!-- <button class="absolute top-1/2 right-0" onclick="next()">
        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#DCDCDC" class="hover:fill-[#363636] bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
        </svg>
    </button> -->
</div>
<!-- End .banner-->
<div class="w-5/6 mx-auto space-y-2     ">
    <p class="text-[25px]">ABOUT</p>
    <p class="text-[45px]">
        GENCE - GENTLEMAN’S OFFICE
    </p>
    <p class="text-[#4F4F4F] leading-8">
        GENCE là thương hiệu phụ kiện đồ da công sở cao cấp lấy điểm nhấn từ sự sang trọng, lịch sự hết sức gần gũi với
        vóc dáng của người Việt Nam.
        Những sản phẩm cặp da, túi da, clutch… được chính bàn tay, khối óc của người thợ Việt Nam có tay nghề cao, tâm
        huyết, tỉ mỉ trong từng công đoạn sản xuất.
        Kỹ thuật dựng form dáng và sản xuất theo đúng trình tự tiêu chuẩn vô cùng chặt chẽ, chuyên nghiệp để tạo ra
        những sản phẩm “Made in Viet Nam” chất lượng.
    </p>
    <div class="">
        <a href="index.php?act=list_product " class="border mt-4 inline-block text-[#FFFFFF] bg-[#000] px-7 py-4">
            KHÁM PHÁ NGAY
        </a>
    </div>
</div>

<div class="category w-5/6 mx-auto min-h-[340px] mt-20 space-y-8">
    <p class="text-3xl text-center italic  ">DANH MỤC SẢN PHẨM </p>
    <div class="grid grid-cols-4 gap-6">
        <?php
        foreach ($get_four_cate as $cate) {
            ?>
            <div class="item relative hover:drop-shadow-2xl">
                <a class="" href="index.php?act=list_product&cate_id=<?php echo $cate['cate_id'] ?>">
                    <img class="absolute hover:scale-110 transition-transform duration-700 ease-in-out"
                        src="<?php echo substr($cate['cate_image'], 3); ?>" alt="">
                    <p class="absolute top-[190px] left-[10px] text-[22px] text-[#FFFFFF]">
                        <?php echo $cate['cate_name'] ?>
                    </p>
                </a>
            </div>
            <!-- End .item -->
            <?php
        }
        ?>
    </div>

</div>
<!-- End .category -->

<div class="p_shop w-5/6 mx-auto mt-10 text-center text-2xl ">
    <p class="text-3xl text-center italic  ">GENCE - THỜI TRANG CÔNG SỞ</p>
</div> <!-- End .p_shop-->

<section class="content w-full px-2 mt-8 mx-auto mb-10">
    <div class="grid grid-cols-5 gap-x-4">
        <?php foreach ($new_pro as $pro) { ?>
            <div class="content-item min-h-[400px] text-center space-y-2 overflow-hidden box-border relative ">
                <div class="content-item--image relative text-center">
                    <a class="" href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <img title="<?php echo $pro['pro_name'] ?>"
                            class="w-full rounded-md bg-clip-padding bg-gray-200 duration-500 hover:scale-x-105 hover:scale-y-105"
                            src="<?php echo substr($pro['pro_image'], 3); ?>" alt="No Image">
                    </a>
                    <a class="view-detail absolute mx-auto text-center"
                        href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <img class="border border-white-400 bg-[#FFFFFF] hover:bg-[#EEEEEE] rounded-[4px] px-4 py-1"
                            title="View Detail" src="./asset/icon/eye-fill.svg" alt="">
                    </a>

                </div>
                <div class="min-h-[120px]">

                    <p class="text-slate-400">
                        <?php foreach ($list_cate as $cate) {
                            echo ($cate['cate_id'] == $pro['cate_id'] ? $cate['cate_name'] : ""); // Hiển thị category
                        } ?>
                    </p>
                    <!-- <p><?php echo ($list_cate['cate_id'] == $pro['cate_id'] ? $list_cate['cate_name'] : "") ?></p> -->

                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <p class="text-teal-800 text-[17px] fold-semibold text-center ">
                            <?php echo $pro['pro_name'] ?>
                        </p>
                    </a>

                    <p class="text-red-600 font-[500] mt-2  ">
                        <?php echo number_format($pro['pro_price'], 0, ',', '.') ?> <span
                            class="underline text-sm ml-[3px] absolute">đ</span>
                    </p>

                    <!-- <p class="px-2  ">
                        Giá KM
                    </p> -->
                </div>
                <form action="index.php?act=addToCart" method="POST">
                    <input type="hidden" name="pro_id" value="<?php echo $pro['pro_id'] ?>">
                    <input type="hidden" name="pro_name" value="<?php echo $pro['pro_name'] ?>">
                    <input type="hidden" name="pro_image" value="<?php echo $pro['pro_image'] ?>">
                    <input type="hidden" name="pro_price" value="<?php echo $pro['pro_price'] ?>">
                    <input type="hidden" name="pro_quantity" value="<?php $quantity = 1; echo $quantity;?>">
                    <input
                        class="add-to-cart w-full py-2 rounded-[4px] border font-[500] text-center hover:bg-[#FFA07A] hover:text-white cursor-pointer"
                        type="submit" value="Buy Now" name="add_to_cart">
                </form>
                <!-- <button class="add-to-cart w-full py-2 rounded-[4px] border font-[500] text-center hover:bg-[#FFA07A] hover:text-white">
                    Buy Now
                </button> -->
            </div>
            <!-- End .content-item-->
            <?php
        }
        ?>


    </div> 
    <!-- End grid-->
    <section class="w-[90%] mx-auto mt-16">
        <div class="grid grid-cols-2 gap-8">
            <div class="item text-center space-y-4">
                <a href="">
                    <img src="./asset/images/home_image/featured_coll_2_1_img.webp" alt="">
                </a>
                <p class="text-3xl">
                    Khóa vân tay - Hot trend
                </p>
                <p>
                    Tính năng khóa vân tay hiện đại trên dòng túi cầm tay nam
                </p>
            </div>
            <div class="item text-center space-y-4">
                <a href="">
                    <img src="./asset/images/home_image/featured_coll_2_2_img.webp" alt="">
                </a>
                <p class="text-3xl">
                    Clutch - Ví Cầm Tay
                </p>
                <p>
                    Phụ kiện thời trang giúp nâng tầm giá trị phái mạnh
                </p>
            </div>
        </div>
        <div class="store-bg my-16">
            <img src="./asset/images/home_image/section_store_bg.webp" alt="">
        </div>
        <!-- End .grid -->
    </section>
    <section class="shipping w-[90%] mx-auto bg-[#f9f9f9] py-[100px] mb-[100px]">
        <div class="grid grid-cols-4 gap-8 ">
            <div class="icon text-center space-y-2 ">
                <img class="ml-[100px]" src="./asset/icon/shipping/truck.svg" alt="">
                <p>
                    MIỄN PHÍ VẬN CHUYỂN
                </p>
            </div>
            <!-- End .icon -->
            <div class="icon text-center space-y-2 ">
                <img class="ml-[100px]" src="./asset/icon/shipping/box-arrow-left.svg" alt="">
                <p>
                   ĐỔI TRẢ HÀNG TRONG 10 NGÀY
                </p>
            </div>
            <!-- End .icon -->
            <div class="icon text-center space-y-2">
                <img class="ml-[100px]" src="./asset/icon/shipping/box-seam.svg" alt="">
                <p>
                    GÓI QUÀ MIỄN PHÍ
                </p>
            </div>
            <!-- End .icon -->
            <div class="icon text-center space-y-2">
                <img class="ml-[100px]" src="./asset/icon/shipping/telephone.svg" alt="">
                <p>
                    HOTLINE: 0393.900.328
                </p>
            </div>
            <!-- End .icon -->

        </div>
    </section>
</section> <!-- End .content-->

<script>

    // var images = [];
    // var index = 1;

    // function loadAnh() {
    //     for (var i = 1; i < 3; i++) {
    //         images[i] = new Image();
    //         images[i].src = "./asset/images/banner/banner" + i + ".jpg";
    //     }
    //     auto();
    // }

    // function auto() {
    //     document.getElementById("anh").src = images[index].src;
    //     if (index == 2) {
    //         index = 1;
    //     } else {
    //         index++;
    //     }
    //     setTimeout(auto, 3000);
    // }

    // function next() {
    //     index++;
    //     if (index >= images.length) {
    //         index = 1;
    //     }
    //     document.getElementById("anh").src = images[index].src;
    // }

    // function prev() {
    //     index--;
    //     if (index < 1) {
    //         index = images.length - 1;
    //     }
    //     document.getElementById("anh").src = images[index].src;

    // }

    var slideIndex = 0;
    var slides = document.getElementsByClassName("slideshow")[0].getElementsByTagName("img");
    slides[slideIndex].classList.add("active");
    setInterval(nextSlide, 5000);

    function nextSlide() {
        slides[slideIndex].classList.remove("active");
        slideIndex = (slideIndex + 1) % slides.length;
        slides[slideIndex].classList.add("active");
    }
</script>