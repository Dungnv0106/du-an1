<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <!-- Font inter Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container sm:w-[500px] md:w-[400px] mx-auto h-full ">
        <div class="text-center">
            <div class="logo ">
                <a href="index.php">
                    <img src="asset/images/logo_gence.png" alt="" class="mx-auto">
                </a>
            </div>
            <div class=" sm:text-2xl md:text-base font-semibold">
                <p>
                    Welcome to Gence
                </p>
            </div>
            <div class="mt-4">
                <p class="sm:text-4xl md:text-[32px] font-[900]">
                    Create Account
                </p>
            </div>
        </div>
        <div class="my-8 sm:text-xl md:text-base">
            <form action="index.php?act=signup" method="post" autocomplete="true">
                <div class="email">
                    <label for="email" class="block text-slate-600 font-[600]">Email</label>
                    <input type="email" id="email" name="email" placeholder="John.snow@gmail.com"
                        class="border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .email-->
                <div class="fullname">
                    <label for="fullname" class="block text-slate-600 font-[600] mt-3">Fullname</label>
                    <input required type="text" id="fullName" name="fullName" placeholder="John.snow"
                        class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .fullname-->
                <div class="password">
                    <label for="password" class="block text-slate-600 font-[600] mt-3">
                        Password
                    </label>
                    <input required type="password" id="password" name="password" 
                        placeholder="*********"
                        class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]"
                    >
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" id="show_password">
                        <label for="show_password">Show Password</label>
                    </div>
                </div> 
                <!--End .password-->
                <div class="repass">
                    <label for="repass" class="block text-slate-600 font-[600] mt-3">
                        Re-Password
                    </label>
                    <input required type="password" id="repass" name="repass" 
                        placeholder="*********"
                        class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]"
                    >
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" id="show_re-password">
                        <label for="show_re-password">Show Re-Password</label>
                    </div>

                </div> <!--End .repass-->

                <div class="mt-8 sm:text-2xl md:text-base ">
                    <input class="py-4 w-full px-[154px] bg-[#37A9CD] text-[#FFFFFF] font-[600] rounded-[5px] "
                        type="submit" name="sign_up" value="Create Now">
                </div>
            </form>
            <?php if (isset($thong_bao)) {
                $javascriptCode = "
                var message = '$thong_bao';
                alert(message);
            ";
                echo "<script>$javascriptCode</script>";
                // header("location:index.php");
            }

            ?>
        </div>
    </div> <!--End .container-->
    <script>
        // Show password
        var password = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("show_password");
        showPasswordCheckbox.addEventListener("change", function () {
            if (showPasswordCheckbox.checked) {
                password.type = "text";
            } else {
                password.type = "password";
            }
        })
        // Show repasss
        var rePassword = document.getElementById("repass");
        var showRePasswordCheckbox = document.getElementById("show_re-password");
        showRePasswordCheckbox.addEventListener("change", function () {
            if (showRePasswordCheckbox.checked) {
                rePassword.type = "text";
            } else {
                rePassword.type = "password";
            }
        })
    </script>
</body>

</html>