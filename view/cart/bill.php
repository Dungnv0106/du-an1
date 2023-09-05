<?php
if (isset($_SESSION['cart'])) {
    // show_array($_SESSION['cart']);
    // print_r($_SESSION['cart']);
    // unset($_SESSION['cart']);
    $cart = $_SESSION['cart'];
    if (isset($_POST['delete_pro'])) {
        // Giá trị cần lọc
        $pro_id = $_POST['pro_id'];
        foreach ($cart as $key => $item) {
            // show_array($item) ;
            // echo gettype($item['pro_id']);
            if ($item['pro_id'] == $pro_id) {
                unset($cart[$key]);
                break;
            }
        }
        $_SESSION['cart'] = $cart;
    }
}

// Xóa toàn bộ giỏ hàng
if (isset($_POST['xoa_gio_hang'])) {
    unset($_SESSION['cart']);
}
// Kiểm tra người dùng

if(isset($_SESSION['user'])) {
    $name = $_SESSION['user']['user_name'];
} else {
    $name = "";
}
?>

<div class="w-[95%] mx-auto my-5 pb-20">
    <div class="grid grid-cols-[30%25%40%] gap-7">
        <div class="info">
            <p class="text-[22px] font-semibold text-slate-700">
                Thông tin nhận hàng
            </p>
            <form action="index.php?act=" method="post" autocomplete="true" class="space-y-2">
                <div class="fullName">
                    <label for="fullName" class="block text-gray-600">
                        Họ và tên
                    </label>
                    <input type="fullName" id="fullName" name="fullName"
                        class="border border-[#37A9CD] p-2 w-full mt-2 rounded-[5px]" value="<?php echo $name?>">
                </div> <!--End .fullName-->

                <div class="phoneNumber">
                    <label for="phoneNumber" class="block text-gray-600">
                        Số điện thoại
                    </label>
                    <input type="phoneNumber" id="phoneNumber" name="phoneNumber"
                        class="border border-[#37A9CD] p-2 w-full mt-2 rounded-[5px]" value=""
                        placeholder="VD:0123456789"    
                    >
                </div> <!--End .phoneNumber-->

                <div class="address">
                    <label for="address" class="block text-gray-600 ">
                        Địa chỉ (tùy chọn)
                    </label>
                    <input type="address" id="address" name="address"
                        class="border border-[#37A9CD] p-2 w-full mt-2 rounded-[5px]" value="">
                </div> <!--End .address-->

                <div>
                    <label for="note" class="block text-gray-600 ">
                        Ghi chú (tùy chọn)
                    </label>
                    <textarea class="border border-[#37A9CD] w-full rounded-[4px] h-[100px] px-3 py-1 leading-[20px]" name="mo_ta"
                        id="note" cols="30" rows="4" placeholder="Ghi chú..."></textarea>
                </div>
                <!-- End .note -->
                <div class="mt-8 sm:text-2xl md:text-base ">
                    <input class="py-4 w-full px-[154px] bg-[#37A9CD] text-[#FFFFFF] font-[600] rounded-[5px] "
                        type="submit" name="sign_up" value="Create">
                </div>
            </form>
        </div>
        <!-- End .info -->
        <div class="shipping">
            <p class="text-[22px] font-semibold text-slate-700">
                Vận chuyển
            </p>
            <p class="mt-4 border w-full p-2 bg-[#d1ecf1] rounded-[4px] text-gray-700">
                Vui lòng nhập thông tin giao hàng
            </p>
            <div class="payment mt-[44px]">
                <p class="text-[22px] font-semibold text-slate-700">
                    Thanh toán
                </p>
                <form action="">
                    <div class="p-4 border min-h-[150px] rounded-md">

                        <div class="flex items-center space-x-4">
                            <input type="checkbox" name="" id="" class="">
                            <label for="">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End .payment(thanh toán) -->

        </div>
        <div class="cart h-[200px]">
            <div class="flex items-center justify-between px-4">

                <p class="text-[22px] font-semibold text-slate-700 px-8 pb-2">
                    Đơn hàng (<?php echo count($_SESSION['cart'])?> sản phẩm)
                </p>
                <form method="post" action="">
                    <button type="submit" name="xoa_gio_hang" class="border rounded-[5px] px-2">
                        Xóa Giỏ Hàng
                    </button>
                </form>
            </div>
            <hr>
            <?php
            $tongThanhToan = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $pro) {
                    $tongTien = $pro['pro_quantity'] * $pro['pro_price'];
                    $tongThanhToan += $tongTien;
                    ?>
                    <div class="item flex items-center justify-between   border-b">
                        <!-- <form action="" method="POST">
                            <input type="hidden" name="pro_id" value="<?php echo $pro['pro_id'] ?>">
                            <button title="Xóa" type="submit" name="delete_pro">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                            </input>
                        </form> -->
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
            <div class="my-5 flex items-center justify-between text-slate-700">
                <span class="">
                    Tạm tính
                </span>
                <span class="text-sm">
                    <?php echo number_format($tongThanhToan, 0, ',', '.') ?><span class="text-sm underline">đ</span>
                </span>
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

            <div class="my-5 flex items-center justify-between">
                <a href="index.php?act=cart"
                    class="flex items-center space-x-1 text-sm"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2a9dcc"
                        class="bi bi-caret-left" viewBox="0 0 16 16">
                        <path
                            d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z" />
                    </svg>
                    <span class="text-[#2a9dcc]">
                    Quay về giỏ hàng
                    </span>
                </a>
                <span class="border px-6 rounded-md py-3 bg-[#2f71a9] text-white">
                    Đặt hàng
                </span>
            </div>
        </div>
        <!-- End .cart -->
        <!-- End .shipping -->
    </div>
</div>