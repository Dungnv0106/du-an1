<?php
if (isset($_SESSION['cart'])) {
    // echo "Giỏ hàng: ";
    // show_array($_SESSION['cart']);
    // echo count($_SESSION['cart']);
    if (isset($one_pro)) {

        // show_array($one_pro);
    }
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
    // foreach($cart as $item) {
    //     if($item['pro_id'] == $pro_id) {
    //         $item['pro_quantity'] += 1;

    //         break;
    //     } 
    // } 
    // $_SESSION['cart'] = $cart; 
}

// Xóa toàn bộ giỏ hàng
if (isset($_POST['xoa_gio_hang'])) {
    unset($_SESSION['cart']);
}
?>

<script>
    var count = 1; // Giá trị ban đầu

    function increaseValue() {
        count++; // Tăng giá trị lên 1
        document.getElementById('count').innerHTML = count; // Hiển thị giá trị mới
    }

    function decreaseValue() {
        count--; // Giảm giá trị đi 1
        document.getElementById('count').innerHTML = count; // Hiển thị giá trị mới
    }
</script>
<div class="min-h-[400px] border">
    <div class=" py-2 px-4 bg-gray-100">
        <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
        <span class="uppercase font-[500] "> / GIỎ HÀNG
        </span>
    </div>
    <div class="flex items-center justify-between px-4 py-2">
        <h2 class="text-4xl">
            Giỏ hàng
        </h2>
        <form method="post" action="">
            <button type="submit" name="xoa_gio_hang" class="border rounded-[5px] px-2">
                Xóa Giỏ Hàng
            </button>
        </form>
    </div>
    <div class="cart container mx-auto py-8">
        <?php
        $tongThanhToan = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $pro) {
                $tongTien = $pro['pro_quantity'] * $pro['pro_price'];
                $tongThanhToan += $tongTien;
                ?>
                <div class="item flex items-center min-h-[120px] py-2 border-b">
                    <!-- <input type="checkbox" name="" id="" class="w-[50px] border"> -->
                    <form action="" method="POST">
                        <input type="hidden" name="pro_id" value="<?php echo $pro['pro_id'] ?>">
                        <button title="Xóa" type="submit" name="delete_pro">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
                                viewBox="0 0 16 16">
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        </input>

                    </form>
                    <img src="<?php echo substr($pro['pro_image'], 3); ?>" alt="" class="w-[100px] h-[100px] mx-5">
                    <span class="text-md mr-20 min-w-[450px] px-3">
                        <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['pro_id'] ?>" class="hover:underline">
                            <?php echo $pro['pro_name'] ?>
                        </a>
                    </span>
                    <span class="flex">
                        <?php echo number_format($pro['pro_price'], 0, ',', '.') ?> <span class="text-sm underline">đ</span>
                    </span>
                    <!-- <div class="pro_quantity mx-5 border flex items-center px-4 rounded-[3px] justify-around space-x-3">
                        <button onclick="decreaseValue() ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-dash" viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                            </svg>
                        </button>
                        <span id="count">
                            
                           
                        </span>
                        <button onclick="increaseValue() ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div> -->
                    <!-- End .pro_quantity -->

                    <input type="number" min="1" max="<?php echo $one_pro['pro_quantity'] ?>" placeholder="Số lượng"
                        name="pro_quantity" value="<?php echo $pro['pro_quantity'] ?>" class="w-[100px] text-center pl-5">
                    <span class="flex">
                        <?php echo number_format($pro['pro_price'], 0, ',', '.') ?> <span class="text-sm underline">đ</span>
                    </span>
                </div>
                <!-- End .item -->
                <?php
            }
        }
        ?>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
            ?>
            <div class="w-[200px] mt-4">
                <form action="" method="POST">
                    <input type="submit" value="Cập nhật giỏ hàng"
                        class="border px-2 py-1 rounded-md hover:bg-gray-100 cursor-pointer">
                </form>
            </div>
            <?php
        }
        ?>

        <div class="border p-4 mt-5 flex items-center justify-between rounded-sm">
            <span>
                Tổng Thanh Toán:
            </span>
            <span class="flex text-red-500 font-semibold">
                <?php echo number_format($tongThanhToan, 0, ',', '.') ?><span class="text-sm underline">đ</span>
            </span>
        </div>
        <div class=" my-5">
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                ?>
                <a href="index.php?act=bill"
                    class="mt-20 w-[200px] px-10 py-2 text-center border text-white bg-[#2f4858] rounded-md ">

                    Đặt hàng
                </a>

                <?php
            } else {
                ?>

                <span>
                    Bạn chưa có sản phẩm nào trong giỏ hàng
                </span>
                <a href="index.php?act=list_product" class="text-blue-500">
                    Mua ngay
                </a>
                <?php
            }
            ?>
        </div>

    </div>