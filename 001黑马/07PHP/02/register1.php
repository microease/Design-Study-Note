<?php
function postback()
{
    global $message;
    if (empty($_POST['username'])) {
        $GLOBALS['message'] = "会不会玩？";
        return;
    }
    if (empty($_POST['password'])) {
        $GLOBALS['message'] = "输密码啊哥";
        return;
    }
    if (empty($_POST['confirm'])) {
        $GLOBALS['message'] = '输确认密码啊哥';
        return;
    }
    if ($_POST['password'] != $_POST['confirm']) {
        $GLOBALS['message'] = '2个密码不一样，sb';
        return;
    }

    if (!(isset($_POST['agree']) && $_POST['agree'] === 'on')) {
        $GLOBALS['message'] = '必须同意注册协议';
        return;
    }

    $GLOBALS['message'] = '注册成功';
    $username = $_POST['username'];
    $password = $_POST['password'];
    file_put_contents('user.txt', $username . '|' . $password . '\n', FILE_APPEND);


}

if($_SERVER['REQUEST_METHOD']==='POST'){
    postback();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>漂亮的表单</title>
    <style>
        form {
            margin: 200px auto;
            width: 310px;
            height: 100px;
        }

        input {
            display: block;
            width: 200px;
            height: 30px;
        }
    </style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td><label for="username">用户名</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td><label for="password">密码</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td><label for="confirm">确认密码</label></td>
            <td><input type="password" name="confirm" id="confirm"></td>
        </tr>
        <tr>
            <td></td>
            <td><label><input type="checkbox" name="agree" id="">同意注册协议</label></td>
        </tr>
        <?php if (isset($message)): ?>
            <tr>
                <td></td>
                <td><?php echo $message ?></td>
            </tr>
        <?php endif ?>
        <tr>
            <td></td>
            <td>
                <button>注册</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>