<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <!-- Font inter Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container mt-11 sm:w-[500px] md:w-[400px] mx-auto ">
        <div class="text-center">
            <div class=" sm:text-2xl md:text-base font-semibold">
                <p>Welcome to Fudo</p>
            </div>
            <div class="mt-4">
                <p class="sm:text-4xl md:text-[32px] font-[900]">
                    Forgot Passwords
                </p>
            </div>
        </div>
        <div class="mt-8 sm:text-xl md:text-base">
            <!-- <?php
                    if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                        show_array($_SESSION['user']);
                    }
                    ?> -->
            <form action="index.php?act=forget_pass" method="POST">
                <div class="email">
                    <label for="email" class="block text-slate-600 font-[600]">Email</label>
                    <input type="email" readonly id="email" name="email" placeholder="John.snow@gmail.com" class="border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]" value="<?php echo $_SESSION['user']['user_email']?>">
                </div> <!--End .email-->
                <div class="password">
                    <label for="password" class="block text-slate-600 font-[600] mt-3">Password</label>
                    <input type="text" id="password" name="password"  placeholder="*********" class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]" >
                </div> <!--End .password-->

                <div class="mt-8 sm:text-2xl md:text-base text-center">
                    <!-- user_id -->
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id']?>">
                    <input class="py-4 w-full bg-[#37A9CD] text-[#FFFFFF] font-[600] rounded-[5px] " type="submit" name="forget_pass" value="Forgot Password">
                </div>
            </form>
            <?php if (isset($thong_bao)) echo $thong_bao ?>
            <?php ?>
        </div>
    </div> <!--End .container-->
</body>

</html>