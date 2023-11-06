<?php
function kiemTraPhanTu($mang, $phanTu)
{
    foreach ($mang as $hang) {
        if (in_array($phanTu, $hang)) {
            return true;
        }
    }
    return false;
}

// Mảng hai chiều
$mangHaiChieu = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

$phanTuCanKiemTra = 5;

if (kiemTraPhanTu($mangHaiChieu, $phanTuCanKiemTra)) {
    echo "Phần tử $phanTuCanKiemTra nằm trong mảng hai chiều.";
} else {
    echo "Phần tử $phanTuCanKiemTra không nằm trong mảng hai chiều.";
}
?>

<?php

function kiemTraTonTai($productId, $cart)
{
    foreach ($cart as $item) {
        if ($item['id'] == $productId) {
            return true; // Sản phẩm đã tồn tại trong giỏ hàng
        }
    }
    return false; // Sản phẩm không tồn tại trong giỏ hàng
}

// Sử dụng ví dụ:
$cart = [
    ['id' => 1, 'name' => 'Áo thun', 'price' => 10],
    ['id' => 2, 'name' => 'Quần jeans', 'price' => 20],
    ['id' => 3, 'name' => 'Giày thể thao', 'price' => 30]
];

$productIdToCheck = 2;
if (kiemTraTonTai($productIdToCheck, $cart)) {
    echo "Sản phẩm đã tồn tại trong giỏ hàng.";
} else {
    echo "Sản phẩm không tồn tại trong giỏ hàng.";
}



?>

<?php 

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

// Cập nhật số lượng sản phẩm và giá trong giỏ hàng
// Tùy thuộc vào cách bạn lưu trữ giỏ hàng và yêu cầu của mình

?>

<form method="POST" action="">
   <div class="product">
      <span class="name">Áo thun</span>
      <span class="price">10</span>
      <input type="number" class="quantity" name="quantity" value="1" min="1" step="1">
      <input type="hidden" name="productId" value="1">
      <button type="submit">Cập nhật giỏ hàng</button>
   </div>
 </form>

 <?php 
 
$array = [
    'name' => 'John',
    'age' => 30,
    'address' => [
        'street' => '123 Main St',
        'city' => 'New York'
    ]
];

// Hàm callback để thay thế giá trị
function replaceValue(&$item, $key, $replacement) {
    if ($item === $replacement) {
        $item = 'Replacement Value';
    }
}

// Thay thế giá trị trong mảng đa chiều
array_walk_recursive($array, 'replaceValue', '123 Main St');

// In mảng sau khi thay thế
print_r($array);

 ?>

<?php
$array = [1, 2, 3, 4, 5];

// Thay thế phần tử có chỉ số 2 (giá trị 3) bằng giá trị mới là 10
$newValue = 10;
array_splice($array, 2, 1, $newValue);

// In mảng sau khi thay thế
print_r($array);
?>