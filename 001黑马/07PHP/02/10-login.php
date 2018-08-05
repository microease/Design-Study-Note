<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户登录</title>
    <style>
        *{
            margin:0;
            padding: 0;
        }
        .login{
            margin:200px auto;
            border:1px solid red;
            width: 200px;
            height: 70px;
        }
        input{
            display: block;
            width: 190px;
            height: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login">
        <form action="11.php" method="post">
            <input type="text" value="请输入用户名" name="username">
            <input type="text" value="密码" name="password">
            <input type="submit" value="登录">
        </from>
    </div>
</body>
</html>