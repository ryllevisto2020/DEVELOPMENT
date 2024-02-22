<?php
require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
    $key = "vistoinformationtech";
    $hash = hash('md5','vistoinformationtech');

    $payload = [
        'authorized'=>true,
        'date'=>date('y/d/m'),
        'time'=>date('h:m:s')
];

    $encode_jwt = JWT::encode($payload,$hash,'HS256');
    setcookie('encode_jwt',$encode_jwt);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta display:none name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                    $('#upload').click(function(){
                        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
                        console.log('upload button clicked!')
                        var fd = new FormData();
                        console.log($('#userfile'));
                        fd.append( 'userfile', $('#userfile')[0].files[0]);
                        console.log(fd);
                        $.ajax({
                          url: '/testBody/create',
                          data: fd,
                          processData: false,
                          contentType: false,
                          type: 'POST',
                          success: function(data){

                          }
                        });
                    });
            });
        </script>

    </head>
    <body class="awd">

        <script src="" async defer></script>
        <div id="data">
            <form>
                <input type="file" name="userfile" id="userfile" size="20" />
                <br /><br />
                <input type="button" id="upload" value="upload" />
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test as $t)
                <tr>
                    <td>{{$t->username}}</td>
                    <td>{{$t->password}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
