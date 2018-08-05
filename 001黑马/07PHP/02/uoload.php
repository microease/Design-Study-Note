<?php
/**
 * Created by PhpStorm.
 * User: huxiaoyi
 * Date: 2018/7/27
 * Time: 下午9:55
 */
function upload(){
    if (!isset($_FILES['avatar'])) {
        $GLOBALS['message'] = '别玩我了';
        return;
    }
    $avatar = $_FILES['avatar'];
    echo $avatar['error'];
    if ($avatar['error'] != UPLOAD_ERR_OK) {
        $GLOBALS['message'] = '上传失败';
        return;
    }
    $source = $avatar['tmp_name'];//源文件
    $target = './uploads/' . $avatar['name'];//目标文件
    $moved = move_uploaded_file($source, $target);
    if (!$moved) {
        $GLOBALS['message'] = '移动文件失败';
        return;
    }
    echo '123';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    upload();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文件上传</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <button>上传</button>
    <?php if (isset($message)): ?>
        <?php echo $message; ?>
    <?php endif ?>
</form>
</body>
</html>
