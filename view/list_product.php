<?php
// show_array($list_product);
// show_array($list_cate);
// show_array($cate_name);    
// show_array($categoryName)
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
<!-- 
    echo ($cate['cate_id'] == $_GET['cate_id']) ? $cate['cate_name'] : ""
 -->
<div class="container max-w-full mt-[70px]">
    <div class="w-5/6 mt-10 mx-auto text-xl flex justify-between items-center">
        <div>
            <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
            <span class="uppercase font-[500] "> /
                <?php
                if (isset($categoryName)) {
                    
                    echo $categoryName['cate_name'];
                } else if (isset($_POST['search_cate_name']) && !empty($_POST['cate_name'])) {
                    echo "<br /> <span class='text-gray-700'>Kết quả tìm kiếm cho </span> " . "\"$cate_name\"";
                } else {
                    "Không tìm thấy sản phẩm cho " . $cate_name;
                }
                if (isset($_GET['act']) && ($_GET['act'] == 'list_product') && (!isset($_GET['cate_id']))) {
                    echo " Tất cả sản phẩm";
                }
                ?>
            </span>
        </div>
        <div>
            <span class="">Showing all
                <?php echo count($list_product) ?> results
            </span>
        </div>

    </div>
    <!-- <a href="index.php"></a> -->


    <div class="content w-5/6 mt-10 mx-auto grid grid-cols-5 gap-2 ">
        <?php
        if (isset($list_product) && is_array($list_product)) {

            foreach ($list_product as $pro) {
                ?>
                <div class="content-item min-h-[400px] text-center space-y-2 overflow-hidden box-border relative ">
                <div class="content-item--image relative text-center">
                    <a class="" href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>">
                        <img title="<?php echo $pro['pro_name'] ?>" 
                            class="w-full rounded-md bg-clip-padding bg-gray-200 duration-500 hover:scale-x-105 hover:scale-y-105" 
                            src="<?php echo substr($pro['pro_image'], 3); ?>" alt="No Image"
                        >
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
                        <p class="text-teal-800 text-[17px] fold-semibold text-center "><?php echo $pro['pro_name'] ?></p>
                    </a>

                    <p class="text-red-600 font-[500] mt-2  ">
                        <?php echo number_format($pro['pro_price'], 0, ',', '.') ?> <span class="underline text-sm ml-[3px] absolute">đ</span>
                    </p>

                    <!-- <p class="px-2  ">
                        Giá KM
                    </p> -->
                </div>
                <form action="index.php?act=addToCart" method="POST">
                    <input type="hidden" name="pro_id" value="<?php echo $pro['pro_id']?>">
                    <input type="hidden" name="pro_name" value="<?php echo $pro['pro_name']?>">
                    <input type="hidden" name="pro_image" value="<?php echo $pro['pro_image']?>">
                    <input type="hidden" name="pro_price" value="<?php echo $pro['pro_price']?>">
                    <input type="hidden" name="pro_quantity" value="1">
                    <input 
                        class="add-to-cart w-full py-2 rounded-[4px] border font-[500] text-center hover:bg-[#FFA07A] hover:text-white cursor-pointer"
                        type="submit" value="Buy Now" name="add_to_cart"
                    >
                </form>
                <!-- <button class="add-to-cart w-full py-2 rounded-[4px] border font-[500] text-center hover:bg-[#FFA07A] hover:text-white">
                    Buy Now
                </button> -->
            </div>
            <!-- End .content-item-->
                <?php
            }
        }
        ?>
    </div> <!-- End .content -->

</div><!-- End .container-->