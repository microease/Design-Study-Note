<?php
function login(){
    if(empty($_POST['email'])){
        $GLOBALS['errorMessage'] = '请填写邮箱';
        return;
    }
//    if(empty($_POST['password'])){
//        $GLOBALS['errorMessage'] = '请填写密码';
//        return;
//    }
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    if($email !== 'microease@gmail.com'){
//        $GLOBALS['errorMessage'] = '邮箱错';
//        return;
//    }
//    if($password !== 'huyankai'){
//        $GLOBALS['errorMessage'] = '密码错';
//        return;
//    }
//    header('Location: /admin/');
}
if($_SERVER['REQUEST_METHOD']==='POST'){
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
    <form class="login-wrap<?php echo isset($errorMessage)? ' shake animated':'' ?>" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong> 用户名或密码错误！
      </div> -->
        <?php if(isset($errorMessage)):?>
        <div class="alert alert-danger">
            <strong>错误！</strong> <?php echo $errorMessage;?>
        </div>
        <?php endif;?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>" placeholder="邮箱" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码">
      </div>
      <button class="btn btn-primary btn-block" >登 录</button>
    </form>
  </div>
</body>
</html>
