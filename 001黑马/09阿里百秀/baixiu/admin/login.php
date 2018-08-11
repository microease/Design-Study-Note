<?php
require_once '../config.php';
function login(){
    if (empty($_POST['email'])) {
        $GLOBALS['errorMessage'] = '请填写邮箱';
        return;
    }
    if (empty($_POST['password'])) {
        $GLOBALS['errorMessage'] = '请填写密码';
        return;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        exit('<h1>链接数据库失败</h1>');
    }
    $query = mysqli_query($conn, "select * from users where email = '{$email}' limit 1;");
    if (!$query) {
        $GLOBALS['errorMessage'] = '登录失败，请重试';
        return;
    }
    $user = mysqli_fetch_assoc($query);
    if (!user) {
        $GLOBALS['errorMessage'] = '邮箱和密码不匹配';
        return;
    }
    if($user['password'] !== $password){
        $GLOBALS['errorMessage'] = '邮箱和密码不匹配';
        return;
    }
//    if($email !== 'microease@gmail.com'){
//        $GLOBALS['errorMessage'] = '邮箱错';
//        return;
//    }
//    if($password !== 'huyankai'){
//        $GLOBALS['errorMessage'] = '密码错';
//        return;
//    }
    $_SESSION['current_login_user'] = $user;
    header('Location: /admin/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Sign in &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/animate/animate.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">

</head>
<body>
<div class="login">
    <form class="login-wrap<?php echo isset($errorMessage) ? ' shake animated' : '' ?>"
          action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <img class="avatar" src="../static/assets/img/default.png">
        <!-- 有错误信息时展示 -->
        <!-- <div class="alert alert-danger">
          <strong>错误！</strong> 用户名或密码错误！
        </div> -->
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <strong>错误！</strong> <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="email" class="sr-only">邮箱</label>
            <input id="email" type="email" name="email" class="form-control"
                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="邮箱" autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">密码</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="密码">
        </div>
        <button class="btn btn-primary btn-block">登 录</button>
    </form>
</div>
<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script>
    $(function ($) {
        //在用户输入自己的邮箱之后展示这个用户的邮箱对应的头像
        $('#email').on('blur',function () {
            var value = $(this).val()
            if(!$value) return
        })
    })
</script>
</body>
</html>
