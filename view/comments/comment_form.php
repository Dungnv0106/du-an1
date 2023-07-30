<?php
session_start();
// echo $_SERVER['PHP_SELF'];
// echo $_SERVER['HTTP_REFERER'];
// index.php?act=post_comment
$pro_id = $_REQUEST['pro_id'];
include "../../model/connect.php";
include "../../model/model_comment.php";

if (isset($_POST['post_comment']) && ($_POST['post_comment'])) {
    $content = $_POST['content'];
    $pro_id = $_POST['pro_id'];
    $user_id = $_SESSION['user']['user_id'];
    $comment_date = date('d/m/Y h:i a');
    add_comment($content, $user_id, $pro_id, $comment_date);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

$list_comment = get_all_comment($pro_id);
// show_array($list_comment);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link rel="stylesheet" href="./comment.css">
</head>

<body>
    <div>
        <div class="comment_content min-h-[240px] border border-red-500">
            <?php
            foreach ($list_comment as $comment) {
            ?>
                <div class="pl-3 mt-3 flex items-center justify-between space-x-2">
                    <span class="user_comment min-w-[90px] ">
                        <h3 class="text-[20px] font-[500]"><?php echo $_SESSION['user']['user_name']?> :</h3>
                    </span>
                    <div class="message min-w-[850px]">
                        <p>
                            <?php echo $comment['content']?>
                        </p>
                    </div>
                    <div class="comment_date px-2 text-[14px] text-gray-400 ">
                        <span>12/12/12 9:2:2 am</span>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="border px-3 py-2 space-x-2 bg-[#FFC0CB]">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                <input 
                        type="text" name="content" 
                        class="min-w-[400px] border border-gray-400 rounded-[3px] px-2 py-1"
                        placeholder="Bình luận về sản phẩm"
                >
                <input type="submit" name="post_comment" value="Bình luận" class="border border-gray-500 px-3 rounded-[3px] py-1 cursor-pointer bg-[#FFFFFF] hover:font-[500]">
            </div>
        </form>

        <?php

        ?>
    </div>
</body>

</html>