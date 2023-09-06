<?php

// show_array($list_bill);
?>

<style>
    table th {
        padding: 5px 0px;
    }

    table td {
        padding: 10px 0px;
    }
</style>

<div class="min-h-[400px]">
    <div class=" py-2 px-4 bg-gray-100">
        <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
        <span class="uppercase font-[500] "> / Trang đơn hàng
        </span>
    </div>
    <?php
    if (count($list_bill) != 0) {
        ?>
        <div class="w-[95%] mx-auto mt-5">
            <table class="w-full py-2">
                <thead class="w-full py-3 ">
                    <!-- <hr> -->
                    <tr class="border-y py-2 ">
                        <th class="w-[130px]">Đơn hàng</th>
                        <th class="w-[200px]">Ngày</th>
                        <th>Giá trị đơn hàng</th>
                        <th class="w-[250px]">Địa chỉ</th>
                        <th>Tình trạng thanh toán</th>
                    </tr>
                </thead>
                <tbody class="w-full text-center ">
                    <?php
                    if (is_array($list_bill)) {
                        foreach ($list_bill as $bill) {
                            $status = getTrangThaiDonHang($bill['bill_status'])
                                ?>
                            <tr>
                                <td>GEN
                                    <?php echo $bill['bill_id'] ?>
                                </td>
                                <td>
                                    <?php echo $bill['order_date'] ?>
                                </td>
                                <td>
                                    <?php echo number_format($bill['bill_total'], 0, ',', '.') ?>
                                    <span class="text-sm underline">đ
                                </td>
                                <td>
                                    <?php echo $bill['bill_address'] ?>
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
                <a href="index.php?act=list_product" class="border px-6 py-3 rounded-md bg-[#2f71a9] text-white">
                    Mua Ngay
                </a>
            </p>
        </div>
        <?php
    }
    ?>
</div>