
<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
                THÊM MỚI LOẠI HÀNG
            </p>
            <div class="form mt-5 leading-9">
                <form action="index_admin.php?act=add_cate" method="POST" autocomplete="on">
                    <label>Mã loại hàng</label>
                    <input class="border w-full my-1 rounded-[4px] px-3 py-1 border-[#FFC0CB] "
                           type="text" disabled name="ma_loai"
                           placeholder="Auto number">
                    <label for="ten_loai">Tên loại hàng</label>
                    <input class="border w-full mt-1 rounded-[4px] px-3 py-1 border-[#FFC0CB]"
                           type="text" name="ten_loai" required id="ten_loai"
                           title="Tên loại hàng"
                           placeholder="Tên loại hàng..">
                    
                    <div class="button mt-3 text-[19px]">
                        <input class=" border px-3 py-1  mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="submit" value="Lưu lại" name="add_cate">
                        <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                            type="reset" value="Nhập lại" name="nhap_lai">
                        <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                               type="button" onclick="location.href='index_admin.php?act=list_cate'" value="Danh sách danh mục">
                        <input class=" border px-3 py-1 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                               type="button" onclick="location.href='index_admin.php?act=add_pro'" value="Thêm mới sản phẩm">
                        
                    </div> <!-- End .button-->
                </form>
                <?php
                    if(isset($thong_bao) && ($thong_bao!= "")) echo $thong_bao;
                ?>
            </div>
        </div> <!-- End .main-->
    </div> <!-- End .container-->