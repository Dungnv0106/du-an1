<?php
session_start();
// session_destroy();
include "./model/connect.php";
include "./model/model_category.php";
include "./model/model_product.php";
include "./model/model_user.php";
include "./model/model_comment.php";
include "./model/cart.php";
include "./view/header.php";
$url = substr($_SERVER['REQUEST_URI'], 8);
// echo $url;
if ($url == 'index.php') {
    // include "./view/header.php";
} else {

}
if (isset($_GET['act']) && !empty($_GET['act'])) {
    if ($_GET['act'] == 'signup') {

    } else {
    }
}

// echo $_SERVER['HTTP_REFERER'];
// echo $_SERVER['REQUEST_URI'];

// Mã JavaScript cần nhúng
$javascriptCode = "
    var message = 'Bạn cần đăng nhập để mua hàng ^^';
    alert(message);
";

$new_pro = query_pro_home();
$list_cate = queryAll();
if (isset($list_cate))
    $_SESSION['list_cate'] = $list_cate;
$list_top_10 = query_pro_top10();
$get_four_cate = get_four_cate();
if (isset($_GET['act']) && !empty($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {

        // case '': 
        //     include "view/body.php";
        //     break;
        case 'information':
            include "view/information.php";
            break;
        case 'list_product':
            if (isset($_POST['cate_name']) && ($_POST['cate_name'] != "")) {
                $cate_name = $_POST['cate_name']; // lấy tên ở ô tìm kiếm
                // echo $cate_name;
            } else {
                $cate_name = "";
            }
            if (isset($_GET['cate_id']) && ($_GET['cate_id'] > 0)) {
                $cate_id = $_GET['cate_id'];
                $categoryName = query_cate_name($cate_id); // Lấy tên danh mục sản phẩm theo id
            } else {
                $cate_id = 0;
            }

            $list_cate = queryAll(); // Lấy tất cả danh mục
            // Lấy sản phẩm theo danh mục
            $list_product = queryAllPro($cate_name, $cate_id);
            include "view/list_product.php";
            break;
        case 'detail_pro':
            if (isset($_GET['pro_id']) && ($_GET['pro_id'] > 0)) {
                $pro_id = $_GET['pro_id'];
                $detail_pro = queryOnePro($pro_id);

                $similar_pro = query_similar_pro($pro_id, $detail_pro['cate_id']);
                include "view/detail_pro.php";
            } else {
                include "view/body.php";
            }
            $list_cate = queryAll();
            break;

        case 'signup':
            $error = [];
            if (isset($_POST['sign_up'])) {
                $email = $_POST['email'];
                $fullName = $_POST['fullName'];
                $password = $_POST['password'];
                $repass = $_POST['repass'];
                //     if (empty($fullName) || $fullName === '' || $password === '' || $repass === '') {
                //         $error['fullName'] = "<span class='mt-3 font-[500] text-red-500'>Vui lòng điền vào trường này</span>";
                //         $error['password'] = "<span class='mt-3 font-[500] text-red-500'>Vui lòng nhập password</span>";
                //         $error['repass'] = "<span class='mt-3 font-[500] text-red-500'>Vui lòng nhập lại password</span>";
                //     } else if ($password !== $repass) {
                //         $error['confirmPassword'] = "<span class='mt-3 font-[500] text-red-500'>Mật khẩu chưa khớp</span>";
                //     } else {

                //     }
                // }

                add_user($email, $fullName, $password, $repass);
                $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng</span>";
                // header("Location:".$_SERVER['HTTP_REFERER']);
            }
            include "view/account/signup.php";

            break;
        case 'signin':
            if (isset($_POST['sign_in']) && ($_POST['sign_in'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $one_user = queryOneUser($email, $password);
                if (is_array($one_user)) {
                    $_SESSION['user'] = $one_user;
                    // setcookie('thong_bao', 'Xin chào ', time() + 5);
                    $thong_bao = "<span class='text-red-500'>Đăng nhập thành công</span>";
                    // header("location:index.php?act=''");
                    // $_SESSION['thong_bao'] = "<span class='text-red-500'>Đăng nhập thành công</span>";
                }
                if (!isset($one_user)) {
                    $_SESSION['error'] = "<span class='font-[500] text-red-500'>Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí</span>";
                    $thong_bao = "<span class='font-[500] text-red-500'>Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí</span>";
                }
            }
            include "view/account/signin.php";
            break;
        case 'forget_pass':
            if (isset($_POST['forget_pass']) && $_POST['forget_pass']) {
                $email = $_SESSION['user']['user_email'];
                $password = $_POST['password'];
                $user_id = $_POST['user_id'];

                forgot_password($user_id, $email, $password);
                $thong_bao = "<span class='font-[500] text-red-500'>Cập nhật mật khẩu thành công ^^</span>";
            }
            include "view/account/forgot_password.php";
            break;
        case 'edit_account':
            if (isset($_POST['edit_acc']) && ($_POST['edit_acc'])) {
                $email = $_POST['email'];
                $fullName = $_POST['fullName'];
                $password = $_POST['password'];
                $repass = $_POST['repass'];
                $user_id = $_POST['user_id'];

                edit_user($user_id, $email, $fullName, $password, $repass);
                $_SESSION['user'] = queryOneUser($email, $password);
                // header("Location: index.php?act=edit_account");
                $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Cập nhật tài khoản thành công ^^</span>";
                // exit();
            }
            include "view/account/edit_acc.php";
            break;
        case 'logout':
            session_unset();
            // header("Location: index.php");
            include "view/body.php";
            break;
        case 'post_comment':
            if (isset($_POST['post_comment']) && ($_POST['post_comment'])) {
                $content = $_POST['content'];
                $pro_id = $_POST['pro_id'];
                $user_id = $_SESSION['user']['user_id'];
                $comment_date = date('d/m/Y h:i a');
                $count = checkUserInComment($user_id, $pro_id);
                echo "count :" .$count;
                if ($count > 0) {
                    echo "<p>Bạn chỉ được phép bình luận một lần.</p>";
                } else {
                    add_comment($content, $user_id, $pro_id, $comment_date);
                }
                // header("Location: index.php?act=detail_pro&pro_id=".$pro_id);
            }
            include "view/comments/comment_form.php";
            break;

        case 'cart':
            include 'view/cart/cart.php';
            break;
        case 'addToCart':
            if (isset($_SESSION['user'])) {

                if (isset($_POST['add_to_cart']) && $_POST['add_to_cart']) {
                    $pro_id = $_POST['pro_id'];
                    $pro_name = $_POST['pro_name'];
                    $pro_image = $_POST['pro_image'];
                    $pro_price = $_POST['pro_price'];
                    $pro_quantity = $_POST['pro_quantity'] ? $_POST['pro_quantity'] : 0;
                    $total = $pro_price * $pro_quantity;
                    $oneProduct = [
                        'pro_id' => $pro_id,
                        'pro_name' => $pro_name,
                        'pro_image' => $pro_image,
                        'pro_price' => $pro_price,
                        'pro_quantity' => $pro_quantity,
                        'total' => $total
                    ];
                    // if (isset($_SESSION['cart'])) {
                    //     $cart = $_SESSION['cart'];
                    // } else {
                    //     $cart = [];
                    // }
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }

                    // if (in_array($oneProduct, $_SESSION['cart'])) {
                    //     $oneProduct['pro_quantity'] += 1;
                    // } else {
                    //     // array_push($_SESSION['cart'], $oneProduct);
                    // }
                    array_push($_SESSION['cart'], $oneProduct);

                }
            } else {
                echo "<script>$javascriptCode</script>";
                // header("Location: Http://localhost/du-an1/index.php?act=signup");
                return;
            }
            include 'view/cart/cart.php';
            break;
        case 'bill':
            include 'view/cart/bill.php';
            break;
        case 'checkout':
            if (isset($_POST['order'])) {
                if (isset($_SESSION['user'])) {
                    $user_id = $_SESSION['user']['user_id'];
                } else {
                    $user_id = 0;
                }
                $name = $_POST['fullName'];
                $email = $_SESSION['user']['user_email'];
                $phoneNumber = $_POST['phoneNumber'];
                $bill_pttt = $_POST['pttt'];
                $address = $_POST['address'];
                $ngayMuaHang = date('d/m/Y h:i a');
                $tongDonHang = tongDonHang();
                // tạo bill
                $bill_id = add_bill($name, $address, $phoneNumber, $email, $bill_pttt, $ngayMuaHang, $tongDonHang, $user_id);
                // insert into table cart
                // echo "bill id = " .$bill_id;
                foreach ($_SESSION['cart'] as $cart) {
                    addCart(
                        $_SESSION['user']['user_id'],
                        $cart['pro_id'],
                        $cart['pro_image'],
                        $cart['pro_name'],
                        $cart['pro_price'],
                        $cart['pro_quantity'],
                        $cart['total'],
                        $bill_id,
                    );
                }
                // $_SESSION['cart'] = [];
            }
            $oneBill = getOneBill($bill_id);
            include 'view/cart/checkout.php';
            $_SESSION['cart'] = [];

            break;
        case 'my_bill':
            $list_bill = getAllBill("",$_SESSION['user']['user_id']);
            include 'view/cart/mybill.php';
            break;
        case 'introduction':
            include "view/introduction.php";
            break;
        default:
            include "view/body.php";
            break;
    }
} else {
    include "view/body.php";
}
include "./view/footer.php";

// if($url == 'index.php') {
//     include "./view/footer.php";
// } 
?>