<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Font inter Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container max-w-full mx-auto mb-[100px]">
        <div class="content w-1/3 mx-auto mt-5">
            <div class="text-center">
                <div class="logo w-[250px] mx-auto">
                    <a href="">
                        <img title="GENCE thời trang công sở" src="asset/images/logo_gence.png" alt="" class="mx-auto">
                    </a>
                </div>
                <div class=" sm:text-3xl md:text-base font-semibold">
                    <p>Welcome back</p>
                </div>
                <div class="mt-[16px]">
                    <p class="sm:text-4xl md:text-[32px] font-[900]">Login to your account</p>
                </div>
            </div>
            
            <div class="mt-[48px]">
                <form action="index.php?act=signin" method="post" >
                    <div class="email ">
                        <label for="email" class="block sm:text-2xl md:text-base text-slate-600 font-[600]">
                            Email
                        </label>
                        <input type="email" name="email" id="email"
                        placeholder="John.snow@gmail.com"
                        class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]"
                        >
                    </div> <!-- End .eamil-->
                    <div class="password">
                        <label for="password" class="block sm:text-2xl md:text-base text-slate-600 font-[600] mt-3">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                        placeholder="********"
                        class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]"
                        >
                    </div> <!--End .password-->
                    <input type="submit" name="sign_in" value="Login now"
                           class="border block w-full sm:text-2xl md:text-base mt-[30px] bg-[#37A9CD] rounded-[5px] py-[15px] text-[#FFFFFF] font-[600] ">
                    <!-- <button class="flex justify-center items-center mt-[15px] bg-gray-800 font-[600] text-[#FFFFFF] w-full rounded-[5px] py-[15px] mb-3">
                        <div class="mr-[11px]">
                            <img src="asset/icon/icongg.png" alt="" class="">    
                        </div>
                        <span class="sm:text-2xl md:text-base">
                            Or sign-in with google
                        </span>
                    </button> -->
                    
                    <?php 
                        if(isset($thong_bao)) {
                            $javascriptCode = "
                                var message = '$thong_bao';
                                alert(message);
                            ";
                            echo "<script>$javascriptCode</script>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!-- End .container-->    
</body>

</html>