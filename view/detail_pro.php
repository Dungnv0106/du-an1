<?php
// show_array($detail_pro);
// show_array($similar_pro);
// show_array($list_cate);
?>
<!-- jquery -->
<div class="container max-w-full  ">
    <div class="content w-5/6 mt-10 mx-auto grid grid-cols-[50%50%]">
        <div class="image_pro">
            <img class=" w-11/12 mx-auto" title="<?php echo $detail_pro['pro_name'] ?>" src="<?php echo substr($detail_pro['pro_image'], 3); ?>" alt="">
            <!-- <img class=" w-11/12 border mx-auto" src="asset/images/that_lung_nam1.webp" alt=""> -->
            <!-- <img class="border" src="asset/images/that_lung_nam1.webp" alt=""> -->
        </div>

        <div class="detail_pro text-gray-700">
            <p class="text-[19px] text-gray-500">
                <a href="index.php" class="hover:text-black">TRANG CHỦ /</a>
                <a href="index.php?act=list_product&cate_id=<?php foreach ($list_cate as $cate) {
                                                                echo ($cate['cate_id'] == $detail_pro['cate_id']) ? $cate['cate_id'] : "";
                                                            } ?>" class="hover:text-black uppercase">
                    <?php foreach ($list_cate as $cate) {
                        if ($cate['cate_id'] == $detail_pro['cate_id']) echo $cate['cate_name'];
                    } ?>
                </a>
            </p>
            <h1 class="text-[25px] font-[600] "><?php echo $detail_pro['pro_name'] ?></h1>
            <hr class="border border-b-[4px] w-[40px] my-3 border-gray-300">
            <div class="text-[21px] space-y-4 ">
                <p class="font-[700] text-xl text-red-500"><?php echo $detail_pro['pro_price'] ?><u>đ</u></p>
                <p><span class="font-[500]">Xuất sứ:</span> Việt Nam</p>
                <p><span class="font-[500]">Mã SP:</span> <?php echo $detail_pro['pro_id'] ?></p>
                <p><span class="font-[500]">Chất liệu:</span> <?php echo $detail_pro['chat_lieu'] ?></p>
                <p><span class="font-[500]">Lượt xem:</span> <?php echo $detail_pro['pro_view'] ?></p>
                <p><span class="font-[500]">Cam kết:</span> Chúng tôi sẽ hoàn tiền nếu túi không phải là da và không
                    giống như hình chụp</p>
                <p><span class="font-[500]">Mô tả:</span> <?php echo $detail_pro['pro_desc'] ?></p>
                <p class="text-xl text-gray-500">Hình ảnh sản phẩm 100% chụp bằng sản phẩm thật, do ánh sáng môi trường
                    xung quanh và màn hình hiển thị độ phân giải là lý do khiến màu của ví đậm hơn hoặc nhạt hơn so với
                    bên ngoài.</p>
            </div>
        </div>
    </div> <!-- End . content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#binhLuan').load('view/comments/comment_form.php', {
                pro_id : <?php echo $detail_pro['pro_id']?>
            })
        });
    </script>
    <div class="comment w-5/6 mt-10 mx-auto">
        <p class="text-[22px] font-[500] text-gray-700 pl-3 rounded-md py-2 bg-[#FFC0CB]">Bình luận</p>
        <div id="binhLuan" class="comment-content w-full mt-2 rounded-xl min-h-[250px]">

        </div>
    </div>
    <!-- End .comment -->
    <div class="similar_pro w-5/6 mt-10 mx-auto">
        <p class="text-[22px] font-bold text-gray-700 mb-5">SẢN PHẨM TƯƠNG TỰ</p>
        <div class="grid grid-cols-5 gap-4">
            <?php foreach ($similar_pro as $pro) { ?>
                <div class="item text-center space-y-2">
                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>" class="h-[300px]">
                        <img class="w-full h-[230px] mb-2 " src="<?php echo substr($pro['pro_image'], 3) ?>" alt="">
                    </a>
                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>" class="">
                        <span class="px-3 font-[500] text-[20px] text-teal-800"><?php echo $pro['pro_name'] ?></span>
                    </a>
                    <p class="font-[600] text-red-500 "><?php echo $pro['pro_price'] ?> <u>đ</u></p>
                </div><!-- End .item-->
            <?php } ?>
        </div>
    </div> <!-- End .similar_pro -->
</div><!-- End .container-->