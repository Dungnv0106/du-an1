<div class="account my-3">
    <div class=" py-2 px-4 bg-gray-100">
        <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
        <span class="uppercase font-[500] "> / TRANG KHÁCH HÀNG
        </span>
    </div>
    <section class="w-[98%] mx-auto my-5 min-h-[250px] py-5 ">
        <div class="grid grid-cols-[25%73%] gap-4">
            <div class="left border-r px-3">
                <p class="text-2xl">
                    TRANG TÀI KHOẢN
                </p>
                <p class="font-[500] mt-2">
                    Xin chào, Nguyễn Việt Dũng ph18102
                </p>
                <div class="mt-6">
                    <ul class="space-y-5 text-slate-800 ">
                        <li>
                            <a href="" class="">
                                Thông tin tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=my_bill" class="">
                                Đơn hàng của tôi
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=forget_pass" class="">
                                Đổi mật khẩu?
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End .left -->
            <div class="right space-y-5">
                <p class="text-2xl">
                    ĐƠN HÀNG CỦA BẠN
                </p>
                <?php
                if (count($list_bill) != 0) {
                    ?>
                    <div class="w-full mx-auto mt-5">
                        <table class="w-full py-2">
                            <thead class="w-full py-3 ">
                                <!-- <hr> -->
                                <tr class="border-y py-2 ">
                                    <th class="">Đơn hàng</th>
                                    <th class="">Ngày</th>
                                    <th class="w-[250px]">Địa chỉ</th>
                                    <th>Giá trị đơn hàng</th>
                                    <th>Tình trạng thanh toán</th>
                                </tr>
                            </thead>
                            <tbody class="w-full text-center text-slate-800 ">
                                <?php
                                if (is_array($list_bill)) {
                                    foreach ($list_bill as $bill) {
                                        $status = getTrangThaiDonHang($bill['bill_status'])
                                            ?>
                                        <tr>
                                            <td>
                                                <a href="" title="Chi tiết đơn hàng">
                                                    GEN
                                                    <?php echo $bill['bill_id'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo substr($bill['order_date'], 0, 10) ?>
                                            </td>
                                            <td>
                                                <?php echo $bill['bill_address'] ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($bill['bill_total'], 0, ',', '.') ?>
                                                <span class="text-sm underline">đ
                                            </td>
                                            <td>
                                                <?php
                                                echo $status;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="w-[90%] mx-auto mt-10 space-y-4">
                        <p>
                            Bạn chưa có bất kì đơn hàng nào
                        </p>
                        <p>
                            <a href="index.php?act=list_product"
                                class="border px-6 py-3 rounded-md bg-[#2f71a9] text-white">
                                Mua Ngay
                            </a>
                        </p>
                    </div>
                    <?php
                }
                ?>


            </div>
            <!-- End .right -->
        </div>
    </section>
</div>
<!-- End .account -->
<style>
    table th {
        padding: 5px 0px;
    }

    table td {
        padding: 10px 0px;
    }
</style>