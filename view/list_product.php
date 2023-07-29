<?php
    // show_array($list_product);
    // show_array($list_cate);
    // show_array($cate_name);    
?>
<!-- 
    echo ($cate['cate_id'] == $_GET['cate_id']) ? $cate['cate_name'] : ""
 -->
<div class="container max-w-full">
    <div class="w-5/6 mt-10 mx-auto text-xl flex justify-between items-center">
        <div>
            <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
            <span class="uppercase font-[500] "> / 
                <?php 
                if(isset($cate_name['cate_id'])){
                    foreach($list_cate as $all_cate){
                        if(isset($cate_name['cate_id']) && ($all_cate['cate_id'] == $cate_name['cate_id'])){
                            echo $cate_name['cate_name'] ;
                        } 
                    }
                }else if(isset($_POST['search_cate_name']) && !empty($_POST['cate_name'])){
                    echo "<span class='text-gray-700'>Kết quả tìm kiếm cho </span>\"".$name_cate."\"";
                } else{
                    "Không tìm thấy sản phẩm cho ".$name_cate;
                }
                ?>
            </span>
        </div>
        <div>
            <span class="text--800">Showing all <?php echo count($list_product)?> results</span>
        </div>
    </div>
    <a href="index.php"></a>
    
    <div class="content w-5/6 mt-10 mx-auto grid grid-cols-5 gap-2 ">  
        <?php foreach($list_product as $pro){
        ?>
            <div class="content-item min-h-[380px] text-center space-y-2 ">
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id']?>">
                <img class="w-full h-[240px]  bg-clip-padding bg-gray-200" src="<?php echo substr($pro['pro_image'], 3);?>" alt="">
            </a>
            <p class="text-slate-400 "><?php foreach($list_cate as $cate){
                echo ($cate['cate_id'] == $pro['cate_id'] ? $cate['cate_name'] : ""); // Hiển thị category
            }?></p>
            <!-- <p><?php echo ($list_cate['cate_id'] == $pro['cate_id'] ? $list_cate['cate_name'] : "")?></p> -->
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id']?>">
                <p class="text-teal-800 text-xl fold-semibold  "><?php echo $pro['pro_name']?></p>
            </a>
            
            <p class="px-2 text-red-600 font-bold">
                <?php echo $pro['pro_price'] ." đ"?>
            </p>
            <p class="px-2">
                Giá KM
            </p>
        </div> <!-- End .content-item-->
        <?php    
        }
        ?>
    </div> <!-- End .content -->
</div><!-- End .container-->    