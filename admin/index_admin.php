

<?php
    include "../model/connect.php";
    include "../model/model_category.php";
    include "../model/model_product.php";
    include "../model/model_user.php";
    include "../model/model_comment.php";
    include "../model/cart.php";
    include "header.php";
    
// Controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'add_cate': // Thêm danh mục
                $error = [];
                if(isset($_POST['add_cate'])){
                    $cate_name = $_POST['ten_loai'];
                    $target_file = "../upload/". $_FILES['hinh_anh']['name'];
                        // $cate_name = trim($cate_name);
                    // $cate_name = trim($cate_name);

                    if (empty($cate_name)) {
                        $error['empty_cate_name'] = "<span class='text-red-500'>*Không để trống tên danh mục</span>";
                        // setcookie('empty_cate', '<span class="text-red-500">*Không để trống tên danh mục</span>', time() + 5);
                    }
                    // if(strpos($cate_name, '  ') !== false) {
                    //     $error['space_cate_name'] = "<span class='text-red-500'>*Tên danh mục không thể có khoảng trắng</span>";
                    // }
                    if(empty($error)) {
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        add_cate($cate_name, $target_file);
                        setcookie('thong_bao', 'Thêm Danh Mục Thành Công', time() + 5);
                        header("location:index_admin.php?act=list_cate");
                    }
                }
                include "category/add_cate.php";
                break;
            case 'list_cate': // Danh sách danh mục
                $list_cate = queryAll();
                include "category/list_cate.php";
                break;
            case 'delete_cate': // Xóa danh mục
                if(isset($_GET['cate_id']) && $_GET['cate_id'] > 0){
                    $cate_id = $_GET['cate_id'];
                    delete_cate($cate_id);
                }
// Sau khi xóa xong thì phải select lại danh sách danh mục
                $list_cate = queryAll();
                include "category/list_cate.php";
                break;
            case 'edit_cate': // Lấy dữ liệu theo id rồi đổ ra 
                if(isset($_GET['cate_id']) && $_GET['cate_id'] > 0){
                    $cate_id = $_GET['cate_id'];
                    $one_cate = queryOne($cate_id);
                }
                include "category/edit_cate.php";
                break;    
            case 'update_cate': // Cập nhật danh mục
                $error = [];
                if(isset($_POST['edit_cate'])){
                    $cate_name = $_POST['ten_loai'];
                    $cate_id = $_POST['cate_id'];
                    $target_file = "../upload/". $_FILES['hinh_anh']['name'];

                    if (empty($cate_name)) {
                        $error['empty_cate_name'] = "<span class='text-red-500'>*Không để trống tên danh mục</span>";
                        // setcookie('empty_cate', '<span class="text-red-500">*Không để trống tên danh mục</span>', time() + 5);
                    }
                    if(empty($error)) {
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        update_cate($cate_id, $cate_name, $target_file);
                        setcookie('thong_bao', 'Cập Nhật Danh Mục Thành Công', time() + 5);
                        header("location:index_admin.php?act=list_cate");
                    }
                }
                $list_cate = queryAll();
                include "category/list_cate.php";
                break;    
// Kết thúc phần danh mục. Bắt đầu phần sản phẩm: Controller Sản phẩm                
            case 'add_pro': // Thêm Sản phẩm
                $error = [];
                if(isset($_POST['add_pro'])){
                    $pro_name = $_POST['ten_san_pham'];
                    $pro_price = $_POST['don_gia'];
                    $pro_quantity = $_POST['so_luong'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['chat_lieu'];
                    $cate_id = $_POST['category'];

                    $target_file = "../upload/". $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không để trống tên sản phẩm</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không để trống giá sản phẩm</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        add_pro($pro_name, $pro_price, $target_file, $pro_quantity , $pro_desc, $chat_lieu, $cate_id);
                        $thong_bao = "<span class = 'text-red-500'>Thêm sản phẩm thành công </span>";
                        header("location:index_admin.php?act=list_pro");
                        
                    }
                }
                $list_cate = queryAll();
                include "products/add_pro.php";
                break;
            
            case 'list_pro': // Danh sách sản phẩm
                if(isset($_POST['search_by_cate'])){
                    $key_word = $_POST['key_word'];
                    $cate_id = $_POST['cate_id'];
                } else{
                    $key_word = "";
                    $cate_id = 0;
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro($key_word, $cate_id);
                include "products/list_pro.php";
                break;    
            case 'edit_pro': // Chỉnh sửa sản phẩm
                if(isset($_GET['pro_id'])){
                    $pro_id = $_GET['pro_id'];
                    $one_pro = queryOnePro($pro_id);
                }
                $list_cate = queryAll();
                include "products/edit_pro.php";
                break;    
//            case 'add_customer':
//                include "category/add_cate.php";
//                break;
            case 'update_pro':
                if(isset($_POST['edit_pro'])){
                    $pro_id = $_POST['pro_id'];
                    $pro_name = $_POST['ten_san_pham'];
                    $pro_price = $_POST['don_gia'];
                    $pro_quantity = $_POST['so_luong'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['chat_lieu'];
                    $cate_id = $_POST['category'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không cập nhật tên sản phẩm trống</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không cập nhật giá sản phẩm trống</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        update_pro($pro_id, $pro_name, $pro_price, $target_file,$pro_quantity ,$pro_desc, $chat_lieu, $cate_id);
                        $thong_bao = "Cập nhật sản phẩm thành công";
                    } 
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro("", 0);
                // $list_pro = queryAllPro();
                include "products/list_pro.php";
                break;
            case 'delete_pro':
                if(isset($_GET['pro_id']) && $_GET['pro_id'] > 0){
                    $pro_id = $_GET['pro_id'];
                    delete_pro($pro_id);
                }
                $list_pro = queryAllPro("",0);
                include "products/list_pro.php";
                break;
            case 'customer': 
                $accounts = getAllAccount();
                include "accounts/list_acc.php";
                break;
            // case 'edit_account': 
            //     // $accounts = getAllAccount();
            //     // include "accounts/list_acc.php";
            // break;
            case 'delete_account': 
                if(isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                    $user_id = $_GET['user_id'];
                    deleteAccount($user_id);
                }
                $accounts = getAllAccount();
                include "accounts/list_acc.php";
                break;
            // case 'delete_all_account': 
            //     if(isset($_GET['condition']) && $_GET['condition'] == true) {
            //         // delete_all_account();

            //     } else {
            //         return;
            //     }
            //     $accounts = getAllAccount();
            //     include "accounts/list_acc.php";
            //     break;    
            case 'comment': 
                $list_comment = get_all_comment(0);
                $list_user = queryAllUser(); 
                $list_pro = queryAllPro('', 0);
                include "./comments/list_comment.php";
                break;
            case 'delete_comment': 
                if(isset($_GET['comment_id']) && ($_GET['comment_id'] > 0)) {
                    $comment_id = $_GET['comment_id'];
                    deleteComment($comment_id);
                }
                $list_comment = get_all_comment(0);
                $list_user = queryAllUser(); 
                $list_pro = queryAllPro('', 0);
                include "./comments/list_comment.php";
                break;
            case 'list_bill': 
                // $list_pro = queryAllPro('', 0);
                if(isset($_POST['search_bill'])){
                    $key_word = $_POST['key_word'];
                } else{
                    $key_word = "";
                }
                $list_bill = getAllBill($key_word , 0);
                include "./bills/list_bill.php";
                break;
            case 'statistic': 
                $list_statistic = thong_ke();
                include "./statistic/list.php";
                break;
            case 'chart': 
                $list_statistic = thong_ke();
                include './statistic/chart.php';    
                break;
            default:
                include "body.php";
                break;
        }
    } 
    else{
        include "body.php";
    }
    
    include "footer.php";
