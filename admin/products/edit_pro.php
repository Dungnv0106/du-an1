<?php 
    // show_array($list_cate)
?>

<section class="product w-full mt-5 leading-8">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md mb-5">
                    CẬP NHẬT SẢN PHẨM
                </p>
        <form action="index_admin.php?act=update_pro" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                <div class="">
                    <label>Mã sản phẩm</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                           type="text" disabled name="ma_san_pham" id="ma_san_pham"
                           placeholder="Auto number" value="<?php echo $one_pro['pro_id']?>">
                </div>
                <div>
                    <label for="don_gia">Đơn giá</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]" value="<?php echo $one_pro['pro_price']?>"
                           type="number"  name="don_gia" id="don_gia" min="0"
                           placeholder="Vui lòng nhập giá sản phẩm..">
                    <?php echo isset($error['empty_donGia'])?$error['empty_donGia'] :"" ?>
                </div>

                <div>
                    <label for="ten_san_pham">Tên sản phẩm</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]" 
                            value="<?php echo $one_pro['pro_name']?>"
                           type="text"  name="ten_san_pham" id="ten_san_pham"
                           placeholder="Vui lòng nhập tên sản phẩm..">
                    <?php echo isset($error['empty_name'])?$error['empty_name'] :"" ?>
                </div>
                <div>
                    <label for="so_luong">Số Lượng</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                            value="<?php echo $one_pro['pro_quantity']?>"
                           type="number"  name="so_luong" id="so_luong" min="0"
                           placeholder="Vui lòng nhập số lượng sản phẩm..">
                </div>
                <div>
                    <label for="hinh_anh">Hình ảnh</label>
                    <img class="w-[300px] h-[300px]" src="<?php echo $one_pro['pro_image']?>" alt="">
                    <input class="border w-full rounded-[4px] px-3  h-[40px]"
                           type="file" name="hinh_anh" id ="hinh_anh"
                    >
                </div>
                <div>
                    <label for="category">Tên danh mục </label>
                    <select name="category" id="category" class="w-full px-3 border rounded-[4px] h-[40px]">
                        <option value="">--Chọn--</option>
                        <?php foreach ($list_cate as $cate){
                            
                        ?>
                            <option class="" <?php echo $one_pro['cate_id'] == $cate['cate_id'] ? "selected" : " "?> value="<?php echo $cate['cate_id']?>"><?php echo $cate['cate_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="chat_lieu">Chất liệu</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                           type="text" name="chat_lieu" id="chat_lieu" value="<?php echo $one_pro['chat_lieu']?>"
                           placeholder="Chất liệu sản phẩm">
                </div>
            </div>
            <div>
                <label for="mo_ta">Mô tả</label>
                <textarea class="border w-full rounded-[4px] h-[100px] px-3 py-1 leading-[20px]"
                          name="mo_ta" id="mo_ta" cols="30" rows="4"
                          placeholder="Mô tả sản phẩm..."
                          ><?php echo $one_pro['pro_desc']?></textarea>
            </div>
            <input type="hidden" name="pro_id" value="<?php echo $one_pro['pro_id']?>"> <!-- Lấy id của sản phẩm-->
            <input class=" border px-3 py-1  mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                   type="submit" value="Cập nhật" name="edit_pro">
            <input class=" border px-3 py-1 mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                   type="reset" value="Nhập lại" name="nhap_lai">
            <a href="index_admin.php?act=list_pro"
               class=" border px-3 py-[10.5px] mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]">
                Danh Sách Sản Phẩm
            </a>
            <a href="index_admin.php?act=add_cate"
               class=" border px-3 py-[10.5px] ml-1 mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]">
                Thêm mới danh mục
            </a>
        </form>

</section>