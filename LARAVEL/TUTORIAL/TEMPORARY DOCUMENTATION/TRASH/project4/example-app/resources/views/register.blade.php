<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <script>
        $(document).ready(function(){
            ///
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    "X-Requested-With": "XMLHttpRequest"
                }
            });
            ///
            $(".register_button").click(function(){
                let email = $('.register_email').val();
                let password =$('.register_pass').val();
                let data ={
                    email:email,
                    password:password
                }

                $.ajax({
                    type: "POST",
                    url: "/register/insert",
                    //dataType: "json",
                    data:{data},
                    success: function (res) {
                        console.log(res);
                        if(res[0].status=="failed" && res[0].info=="exist"){
                            alert("Account Exist!");
                        }
                        if(res[0].status=="success" && res[0].info=="added"){
                            alert("Account Created!");
                        }
                        if(res[0].status=="failed" && res[0].info=="Invalid Email"){
                            alert("Invalid Email");
                        }
                        if(res[0].status=="failed" && res[0].info=="database"){
                            alert("Database Error!");
                        }
                    }
                });
            })
            ///
            $(document).on("click","button[data-id=test]",function(){
                let value_ = $(this).text();
                alert(value_);
            })
        })
    </script>
</head>
<body>
    <h1>Register</h1>
    <a href={{ route('login') }}>Click Here to Login</a>

    <!--LOGIN FORM-->
    <div>
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control register_email" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control register_pass" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="button" class="btn btn-primary register_button">Register</button>

        <!--
            <button type="button" class="btn btn-primary testbutton" data-id="test">test1</button>
            <button type="button" class="btn btn-primary testbutton" data-id="test">test2</button>
        -->
    </div>
</body>
</html>
