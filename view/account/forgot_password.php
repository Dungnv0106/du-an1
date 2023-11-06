<?php

?>

<div class="account">
    <div class=" py-2 px-4 bg-gray-100">
        <a href="index.php" class="text-gray-500 hover:text-black">TRANG CHỦ</a>
        <span class="uppercase font-[500] "> / TRANG KHÁCH HÀNG
        </span>
    </div>
    <section class="w-[98%] mx-auto my-5 min-h-[250px] py-5">
        <div class="grid grid-cols-[25%65%] gap-4">
            <div class="left border-r px-3">
                <p class="text-2xl">
                    TRANG TÀI KHOẢN
                </p>
                <p class="font-[500] mt-2">
                    Xin chào, Nguyễn Việt Dũng ph18102
                </p>
                <div class="mt-6">
                    <ul class="space-y-5 text-slate-800">
                        <li>
                            <a href="index.php?act=account" class="">
                                Thông tin tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=my_bill" class="">
                                Đơn hàng của tôi
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=forget_pass" class="">
                                Đổi mật khẩu?
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End .left -->
            <div class="right space-y-5">
                <p class="text-2xl">
                    ĐỔI MẬT KHẨU
                </p>
                <p>
                    Để đảm bảo tính bảo mật. Vui lòng đặt mật khẩu với ít nhất 8 ký tự
                </p>
                <div>
                    <form action="index.php?act=forget_pass" method="POST">
                        <label for="old_pass" class="block text-slate-600 font-[600]">
                            Mật khẩu cũ <span class="text-red-500">*</span>
                        </label>
                        <div class="old_pass flex items-center space-x-2">

                            <input type="password" id="old_pass" name="old_pass" 
                                placeholder="********" 
                                required
                                class=" block border border-[#37A9CD] p-4 w-[500px] mt-[11px] rounded-[5px]">

                            <div class="flex items-center space-x-1">
                                <input type="checkbox" id="show_oldPassword">
                                <label for="show_oldPassword">Show Password</label>
                            </div>
                        </div>
                        <!--End .old_pass-->
                        <div class="new_password">
                            <label for="password" class="block text-slate-600 font-[600] mt-3">
                                Mật khẩu mới<span class="text-red-500">*</span>
                            </label>
                            <div class="new_pass flex items-center space-x-2">
                                <input type="password" id="new_pass" name="password" 
                                    placeholder="*********" 
                                    required
                                    class="block border border-[#37A9CD] p-4 w-[500px] mt-[11px] rounded-[5px]">
                                <div class="flex items-center space-x-1">
                                    <input type="checkbox" id="show_newPassword">
                                    <label for="show_newPassword">Show Password</label>
                                </div>
                            </div>
                        </div>
                        <!--End .password-->

                        <div class="mt-8 sm:text-2xl md:text-base">
                            <!-- user_id -->
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id'] ?>">
                            <input class="py-2 px-4 bg-[#37A9CD] text-[#FFFFFF] font-[600] rounded-[5px] cursor-pointer"
                                type="submit" name="forget_pass" value="Đặt lại mật khẩu">
                        </div>
                    </form>
                    <?php if (isset($thong_bao))
                        echo $thong_bao ?>
                    </div>
                </div>
            </div>
            <!-- End .right -->
    </div>
    </section>
    </div>
    <script>
        // hiển thị mật khẩu cũ
        var old_password = document.getElementById("old_pass");
        var showOldPasswordCheckbox = document.getElementById("show_oldPassword");
        showOldPasswordCheckbox.addEventListener("change", function () {
            if (showOldPasswordCheckbox.checked) {
                old_password.type = "text";
            } else {
                old_password.type = "password";
            }
        })
        // hiển thị mật khẩu mới
        var new_password = document.getElementById("new_pass");
        var showNewPasswordCheckbox = document.getElementById("show_newPassword");
        showNewPasswordCheckbox.addEventListener("change", function () {
            if(showNewPasswordCheckbox.checked) {
                new_password.type = "text";
            } else {
                new_password.type = "password";
            }
        })
    </script>
    <!-- End .account -->