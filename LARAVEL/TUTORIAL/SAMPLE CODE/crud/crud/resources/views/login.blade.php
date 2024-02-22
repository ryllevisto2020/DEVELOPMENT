


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            function load(){
                $('.load').load('');
            }
            function clear(){
                $(`.0x1_login_email_username`).css("display","none");
                $(`.0x1_login_password`).css("display","none");

                $(`.0x1_age`).css("display","none");
                $(`.0x1_name`).css("display","none");
                $(`.0x1_email`).css("display","none");
                $(`.0x1_password`).css("display","none");
            }
            $('.action_SignUp').click(function(){
                clear();
                Swal.fire({
                    imageUrl: 'https://www.wpfaster.org/wp-content/uploads/2013/06/loading-gif.gif',
                    imageHeight: 100,
                    title: 'Loading...\nPlease wait',
                    showConfirmButton: false,
                    allowOutsideClick: false
                  })
                var data = {
                    age:$('.input_Age').val(),
                    name:$('.input_Name').val(),
                    email:$('.input_Email').val(),
                    password:$('.input_Password').val()
                };
                $.ajax({
                    type: "GET",
                    url: "/signup",
                    data: data,
                    contentType: "application/json",
                    success:function(res){
                        ////FOR ERROR
                        try {
                            for(var i = 0; i < res.error.length; i++) {
                                $(`.${res.error[i].err_code}`).css("display","block");
                                Swal.close({timer:2000});
                                if(res.error[i].err_code == "0x1_connection"){
                                    Swal.close({timer:1500})
                                    Swal.fire({
                                        icon: 'error',
                                        title: res.error[i].err_message,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        timer: 2000,
                                      })
                                }
                                if(res.error[i].err_code == "0x1_exist"){
                                    Swal.close({timer:1500})
                                    Swal.fire({
                                        icon: 'error',
                                        title: res.error[i].err_message,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        timer: 2000,
                                      })
                                }
                            }
                        } catch (err) {
                            //-BLANK-//
                        }

                        ////FOR SUCCESS
                        try {
                            if(res.success.code == '0x2'){
                                Swal.close({timer:1500})
                                    Swal.fire({
                                        icon: 'success',
                                        title: res.success.message,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        timer: 2000,
                                      }).then((result) => {
                                        load();
                                      })

                            }
                        } catch (err) {
                            ///-BLANK-//
                        }
                    }
                });
            })

            $('.action_Login').click(function(){
                clear();
                Swal.fire({
                    imageUrl: 'https://www.wpfaster.org/wp-content/uploads/2013/06/loading-gif.gif',
                    imageHeight: 100,
                    title: 'Loading...\nPlease wait',
                    showConfirmButton: false,
                    allowOutsideClick: false
                  })
                var data = {
                    userEmail: $('.input_login_email_username').val(),
                    password: $('.input_login_password').val()
                }
                $.ajax({
                    type: "GET",
                    url: "/login",
                    data: data,
                    contentType: "application/json",
                    success:function(res){
                        console.log(res);
                        try {
                            for(var i = 0; i < res.error.length; i++) {
                                $(`.${res.error[i].err_code}`).css("display","block");
                                Swal.close({timer:1500});
                                if(res.error[i].err_code == "0x1_connection"){
                                    Swal.close({timer:1500})
                                    Swal.fire({
                                        icon: 'error',
                                        title: res.error[i].err_message,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        timer: 2000,
                                      })
                                }
                            }
                        } catch (err) {

                        }
                        try {
                            if(res.error[0].err_code=='0x1_login_Incorrect'){
                                Swal.fire({
                                    icon: 'error',
                                    title: res.error[0].err_message,
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 2000,
                                    })
                            }
                        } catch (err) {

                        }
                        try {
                            if(res.success.code == "0x2" ){
                                Swal.fire({
                                    icon: 'success',
                                    title: res.success.message,
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    timer: 2000,
                                    }).then((result)=>{
                                        window.location.replace("/home");
                                    })
                            }
                        } catch (err) {

                        }
                    }
                });
            })
        })
    </script>
    <title>Document</title>
</head>
<body class="load">
    <main class="relative min-h-screen w-full bg-white">
        <div class="p-6" x-data="app">
            <!-- header -->
            <header class="flex w-full justify-between">
                <svg class="h-7 w-7 cursor-pointer text-gray-400 hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                    <path stroke-width="1" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>

                <!-- buttons -->
                <div>
                    <button type="button" @click="isLoginPage = false" x-show="isLoginPage" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-3 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">LOGIN</button>

                    <button type="button" @click="isLoginPage = true" x-show="!isLoginPage" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-3 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">SIGN UP</button>
                </div>
            </header>

            <div class="absolute left-1/2 top-1/2 mx-auto max-w-sm -translate-x-1/2 -translate-y-1/2 transform space-y-4 text-center">
                <!-- register content -->
                <div x-show="isLoginPage" class="space-y-4">
                    <header class="mb-3 text-2xl font-bold">Create your profile</header>
                    <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="text" placeholder="Age" class="input_Age my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                    </div>
                    <span class="0x1_age" style="display: none">Invalid Age!</span>
                    <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="text" placeholder="Name (optional)" class="input_Name my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                    </div>
                    <span class="0x1_name" style="display: none">Invalid Name!</span>
                    <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="text" placeholder="Email" class="input_Email my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                    </div>
                    <span class="0x1_email" style="display: none">Invalid Email!</span>
                    <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="password" placeholder="Password" class="input_Password my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                    </div>
                    <span class="0x1_password" style="display: none">Invalid Password!</span>
                    <button class="action_SignUp w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">CREATE ACCOUNT</button>
                </div>

                <!-- login content -->
                <div x-show="!isLoginPage" class="space-y-4">
                    <header class="mb-3 text-2xl font-bold">Log in</header>
                    <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="text" placeholder="Email or username" class="input_login_email_username my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
                    </div>
                    <span class="0x1_login_email_username" style="display: none">Invalid Email or Username!</span>
                    <div class="flex w-full items-center space-x-2 rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                        <input type="password" placeholder="Password" class="input_login_password my-3 w-full border-none bg-transparent outline-none" />
                        <a href="#" class="font-medium text-gray-400 hover:text-gray-500">FORGOT?</a>
                    </div>
                    <span class="0x1_login_password" style="display: none">Invalid Password!</span>
                    <button class="action_Login w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">LOG IN</button>
                </div>

                <div class="flex items-center space-x-4">
                    <hr class="w-full border border-gray-300" />
                    <div class="font-semibold text-gray-400">OR</div>
                    <hr class="w-full border border-gray-300" />
                </div>

                <footer>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-2.5 font-bold text-blue-700 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">FACEBOOK</a>
                        <a href="#" class="rounded-2xl border-b-2 border-b-gray-300 bg-white px-4 py-2.5 font-bold text-blue-500 ring-2 ring-gray-300 hover:bg-gray-200 active:translate-y-[0.125rem] active:border-b-gray-200">GOOGLE</a>
                    </div>

                    <div class="mt-8 text-sm text-gray-400">
                        By signing in to ********, you agree to our
                        <a href="#" class="font-medium text-gray-500">Terms</a> and <a href="#" class="font-medium text-gray-500">Privacy Policy</a>.
                    </div>
                </footer>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("app", () => ({
                isLoginPage: true,
            }));
        });
    </script>
</body>
</html>
