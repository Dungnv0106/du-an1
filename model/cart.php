<?php
function tongDonHang()
{
    $tongThanhToan = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $pro) {
            $tongTien = $pro['pro_quantity'] * $pro['pro_price'];
            $tongThanhToan += $tongTien;
        }
    }
    return $tongThanhToan;
}


function add_bill($bill_name, $bill_address, $bill_tel, $bill_email, $bill_pttt, $order_date, $bill_total, $user_id)
{
    $sql = "INSERT INTO `bill` 
    (`bill_id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `order_date`, `bill_total`, `user_id`) 
    VALUES (NULL, '{$bill_name}', '{$bill_address}', '{$bill_tel}', '{$bill_email}', '{$bill_pttt}', '{$order_date}', '{$bill_total}', '{$user_id}')";
    // connect($sql);
    return $lastId = getLastId($sql);
}

function add_cart($user_id, $pro_id, $pro_image, $pro_name, $pro_price, $pro_quantity, $total, $bill_id)
{
    $sql = "INSERT INTO `cart` (`user_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_quantity`, `total`, `bill_id`) 
    VALUES ('{$user_id}', '{$pro_id}', {$pro_image}, '{$pro_name}', '{$pro_price}', '{$pro_quantity}', '{$total}', '1')";
    connect($sql);
}
function addCart($user_id, $pro_id, $pro_image, $pro_name, $pro_price, $pro_quantity, $total, $bill_id)
{
    $sql = "INSERT INTO `cart` (`cart_id`, `user_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_quantity`, `total`, `bill_id`) 
    VALUES (NULL, '{$user_id}', '{$pro_id}', '{$pro_image}', '{$pro_name}', '{$pro_price}', '{$pro_quantity}', '{$total}', '{$bill_id}')";
    connect($sql);
}
function getOneBill($bill_id)
{
    $query_one_bill = "SELECT * FROM bill WHERE bill_id = '{$bill_id}'";
    $one_pro = getOne($query_one_bill);
    return $one_pro;
}

function getAllBill($key_word = "", $user_id)
{
    $sql = "SELECT * FROM `bill` WHERE 1 ";
    if($user_id > 0) {
        $sql .= " AND user_id = '{$user_id}' ";
    }
    if($key_word != "") {
        $sql .= " AND bill_id like '%{$key_word}%' ";
    }
    $sql .= " ORDER BY bill_id DESC ";
    $list_bill = getAll($sql);
    return $list_bill;
}
function get_all_bill() {
    $sql = "SELECT * FROM `bill` WHERE 1 order by bill_id desc";
    $list_bill = getAll($sql);
    return $list_bill;
}

function getTrangThaiDonHang($bill_status)
{
    switch ($bill_status) {
        case '0':
            $status = "Đơn hàng mới";
            break;
        case '1':
            $status = "Đang chờ xác nhận";
            break;
        case '2':
            $status = "Đang giao hang hàng";
            break;
        case '3':
            $status = "Đã nhận được hàng";
            break;
        case '4':
            $status = "Đã hủy đơn hàng";
            break;
        case '5':
            $status = "Đã Thanh Toán";
            break;
        case '6':
            $status = "Thanh toán khi nhận hàng";
            break;
        default:
            $status = "Đơn hàng mới";
            break;
    }
    return $status;
}

function thong_ke() {
    $sql = " SELECT `categories`.cate_id AS cate_id, 
                    `categories`.cate_name AS cate_name, 
                    COUNT(`products`.pro_id) AS pro_quantity, 
                    MIN(`products`.pro_price) AS min_price,
                    MAX(`products`.pro_price) AS max_price,
                    AVG(`products`.pro_price) AS avg_price
            FROM `products` LEFT JOIN `categories` 
            ON `products`.cate_id = `categories`.cate_id
            GROUP BY `categories`.cate_id
            ORDER BY `categories`.cate_id DESC
            ";
    $list_statistic = getAll($sql);
    return $list_statistic;
}

function deleteOneBill($bill_id) {
    $sql = "DELETE FROM `bill` WHERE `bill_id` = '{$bill_id}' ";
    connect($sql);
}

?>