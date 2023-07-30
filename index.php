<?php
session_start();
// session_destroy();
include "./model/connect.php";
include "./model/model_category.php";
include "./model/model_product.php";
include "./model/model_user.php";
include "./model/model_comment.php";
include "view/header.php";


$new_pro = query_pro_home();
$list_cate = queryAll();
$list_top_10 = query_pro_top10();
if (isset($_GET['act']) && !empty($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'information':
            include "view/information.php";
            break;
        case 'list_product':
            if (isset($_POST['cate_name']) && ($_POST['cate_name'] != "")) {
                $name_cate = $_POST['cate_name']; // lấy tên ở ô tìm kiếm

            } else {
                $name_cate = "";
            }

            if (isset($_GET['cate_id']) && ($_GET['cate_id'] > 0)) {
                $cate_id = $_GET['cate_id'];
                $cate_name = query_cate_name($cate_id); // Lấy tên danh mục sản phẩm theo id
            } else {
                $cate_id = 0;
            }

            $list_cate = queryAll(); // Lấy tất cả danh mục
            $list_product = queryAllPro($name_cate, $cate_id); // Lấy sản phẩm theo danh mục
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
                // $list_user = queryAllUser();
                // setcookie("thong_bao", "Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng", time() + 5);
                $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng</span>";
                // header("Location: index.php?act");
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
                    // header("Location: index.php");
                    // $thong_bao = "<span class='text-red-500'>Đăng nhập thành công</span>";
                    // $_SESSION['thong_bao'] = "<span class='text-red-500'>Đăng nhập thành công</span>";
                } 
                if(!isset($one_user)) {
                    $_SESSION['error'] = "<span class='font-[500] text-red-500'>Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí</span>";
                    $thong_bao = "<span class='font-[500] text-red-500'>Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí</span>";
                }
            }
            include "view/body.php";
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
                add_comment($content, $user_id, $pro_id, $comment_date);
                header("Location: index.php?act=detail_pro&pro_id=".$pro_id);
            }
            include "view/comments/comment_form.php";
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
include "view/footer.php";
