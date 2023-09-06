<?php
if (isset($oneBill)) {
    // show_array($oneBill);
}
?>

<div class="w-[95%] mx-auto my-5 pb-[150px]">

    <div class="grid grid-cols-[60%37%] gap-8">
        <div class="left h-[200px] px-5">
            <div class="flex items-center space-x-2">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#47a343"
                        class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </span>
                <p class="text-[19px] font-semibold">
                    Cảm ơn bạn đã đặt hàng ^^
                </p>
            </div>
            <div class="info mt-6 grid grid-cols-2 gap-5 border rounded-md p-4 bg-slate-200">
                <div class="item">
                    <div class="">
                        <p class="text-[20px]">
                            Thông tin mua hàng
                        </p>
                        <p>
                            <?php echo $oneBill['bill_name'] ?>
                        </p>
                        <p>
                            <?php echo $oneBill['bill_email'] ?>
                        </p>
                        <p>
                            <?php echo "+84" . substr($oneBill['bill_tel'], 1) ?>
                        </p>
                    </div>
                    <div class="mt-10">
                        <p class="text-[20px]">
                            Phương thức thanh toán
                        </p>
                        <p>
                            <?php
                            if ($oneBill['bill_pttt' == 1]) {
                                echo "Thanh toán khi nhận hàng";
                            }
                            ?>
                        </p>

                    </div>
                </div>
                <div class="item">
                    <div class="">
                        <p class="text-[20px]">
                            Địa chỉ nhận hàng
                        </p>
                        <p>
                            <?php echo $oneBill['bill_name'] ?>
                        </p>
                        <p>
                            <?php echo $oneBill['bill_address'] ?>
                        </p>

                        <p>
                            <?php echo "+84" . substr($oneBill['bill_tel'], 1) ?>
                        </p>
                        <p>
                            Ngày đặt hàng: <?php echo $oneBill['order_date'] ?>
                        </p>
                    </div>
                    <div class="mt-10">
                        <p class="text-[20px]">
                            Phí vận chuyển
                        </p>
                        <p>
                            Miễn phí vận chuyển
                        </p>

                    </div>
                </div>
            </div>
            <!-- End .info -->
        </div>
        <!-- End .left -->
        <div class="right border px-2">
            <?php
            $tongThanhToan = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $pro) {
                    $tongTien = $pro['pro_quantity'] * $pro['pro_price'];
                    $tongThanhToan += $tongTien;
                    ?>
                    <div class="item flex items-center justify-between   border-b">

                        <img src="<?php echo substr($pro['pro_image'], 3); ?>" alt="" class="w-[90px] h-[90px]">
                        <span class="text-md w-[200px] ">
                            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>" class="hover:underline">
                                <?php echo $pro['pro_name'] ?>
                            </a>
                        </span>
                        <span class="flex">
                            <?php echo number_format($pro['pro_price'], 0, ',', '.') ?> <span class="text-sm underline">đ</span>
                        </span>

                    </div>
                    <!-- End .item -->
                    <?php
                }
            }
            ?>
            <div class="mt-5 flex items-center justify-between text-slate-700">
                <span class="">
                    Tạm tính
                </span>
                <span class="text-sm">
                    <?php echo number_format($tongThanhToan, 0, ',', '.') ?><span class="text-sm underline">đ</span>
                </span>
            </div>
            <div class=" flex items-center justify-between text-slate-700">
                <span class="">
                    Phí vận chuyển
                </span>
                <span class="text-sm">Miễn phí</span>
            </div>
            <hr>
            <div>
                <div class="mt-5 flex items-center justify-between text-slate-700">
                    <span class="text-xl">
                        Tổng cộng
                    </span>
                    <span class="text-xl text-[#2a9dcc]">
                        <?php echo number_format($tongThanhToan, 0, ',', '.') ?><span class="text-sm underline">đ</span>
                    </span>
                </div>
            </div>
        </div> 
        <div class="px-5 mt-[150px] py-3">
            <p>
                <a href="index.php" class="border px-6 py-3 rounded-md bg-[#2f71a9] text-white">
                    Tiếp tục mua hàng
                </a>
            </p>
        </div>
        <!-- End .right -->
    </div>
</div>