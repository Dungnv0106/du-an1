
<?php
       // show_array($one_cate);
?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
                CẬP NHẬT LOẠI HÀNG
            </p>
            <div class="form mt-5 leading-8">
                <form action="index_admin.php?act=update_cate" method="POST" autocomplete="on" class="" enctype="multipart/form-data">
                    
                    <label for="ten_loai">Tên loại hàng</label>
                    <input class="border w-full mt-1 rounded-[4px] px-3 py-1 border-[#FFC0CB]"
                           type="text" name="ten_loai" id = "ten_loai"
                           title="Tên loại hàng"
                           placeholder="Tên loại hàng.."
                           value="<?php echo $one_cate['cate_name']?>"
                     >
                    <?php echo isset($error['empty_cate_name']) ? $error['empty_cate_name']: " "?>

                     <div>
                            <p class="text-[19px]">Hình ảnh</p>
                            <input class="border w-full rounded-[4px] px-3  h-[40px]"
                            type="file" name="hinh_anh"
                            >
                            <img class="mt-3 w-[300px] h-[300px]" src="<?php echo $one_cate['cate_image']?>" alt="">
                     </div>
                     <!-- <img src="./asset/images/cap_da/tui_xach_nu.webp" alt=""> -->
                    <input type="hidden" name="cate_id" value="<?php echo $one_cate['cate_id']?>">       
                    <div class="button mt-3 text-[19px]">
                     <input class=" border px-3 py-1 mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="submit" value="Cập nhật" name="edit_cate">
                     <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="reset" value="Nhập lại" name="nhap_lai">
                     <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="button" onclick="location.href='index_admin.php?act=list_cate'" value="Danh sách danh mục">
                     <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="button" onclick="location.href='index_admin.php?act=add_pro'" value="Thêm mới sản phẩm">
                    </div><!--End .button-->
                </form>
                <?php
                    
                ?>
            </div>
        </div> <!-- End .main-->
    </div> <!-- End .container-->