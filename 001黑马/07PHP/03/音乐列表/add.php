<?php
/**
 * Created by PhpStorm.
 * User: huxiaoyi
 * Date: 2018/7/29
 * Time: 下午12:16
 */
function addMusic(){
    //只有在POST的时候执行
    if(empty($_POST['title'])){
        $GLOBALS['err_message'] =  "没写标题";
        return;
    }
    if(empty($_POST['artist'])){
        $GLOBALS['err_message'] =  "没写歌手";
        return;
    }
    if(empty($_FILES['source'])){
        $GLOBALS['err_message'] =  "请正确提交文件";
        return;
    }
    $source = $_FILES['source'];

    if($source['error'] !==UPLOAD_ERR_OK){
        $GLOBALS['err_message'] =  "请选择音乐文件";
        return;
    }
    $target = './uploads/'.uniqid().'-'.$source['name'];
    if(!move_uploaded_file($source['tmp_name'],$target)){
        $GLOBALS['err_message'] =  "上传失败";
        return;
    }
    if($source['size']>=10*1024*1024){
        $GLOBALS['err_message'] =  "过大";
        return;
    }
    if($source['size']<=1*1024*1024){
        $GLOBALS['err_message'] =  "过小";
        return;
    }
    $allowType =  array('audio/mp3','audio/wma');
    if(!in_array($source['type'],$allowType)){
        $GLOBALS['err_message'] =  "类型不一样";
        return;
    }

    if (empty($_FILES['images'])) {
        // 客户端提交的表单中没有 source 文件域
        $GLOBALS['error_message'] = '请正确提交文件';
        return;
    }

    $images = $_FILES['images'];

    // 判断用户是否选择了文件
    if ($images['error'] !== UPLOAD_ERR_OK) {
        $GLOBALS['error_message'] = '请选择图片文件';
        return;
    }

    // 校验文件的大小

    if ($images['size'] > 1 * 1024 * 1024) {
        $GLOBALS['error_message'] = '图片文件过大';
        return;
    }

    // 校验类型
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($images['type'], $allowed_types)) {
        $GLOBALS['error_message'] = '这是不支持的图片格式';
        return;
    }

    // 音乐文件已经上传成功，但是还在临时目录中
    // 一般情况会将上传的文件重命名
    $target = './uploads/' . uniqid() . '-' . $images['name'];
    if (!move_uploaded_file($images['tmp_name'], $target)) {
        $GLOBALS['error_message'] = '上传图片失败';
        return;
    }
    echo "111";
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $images = '图片';
    $source = '音乐';
    $origin = json_decode(file_get_contents('storage.json'),true);
    $origin[] = array(
        'id' => uniqid(),
        'title'=>$_POST['title'],
        'artist'=> $_POST['artist'],
        'images' => '123',
        'source' => '456',
    );
    $json  = json_encode($origin);
    file_put_contents('storage.json',$json);
    header('Location:index.php');

}
if($_SERVER['REQUEST_METHOD']==='POST'){
    addMusic();
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加新音乐</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container py-5">
        <h1 class="display-4">添加新音乐</h1>
        <hr>
        <?php if(isset($err_message)):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $err_message?>
        </div>
        <?php endif;?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <lable for="title">标题</lable>
            <input type="text" class="form-control" id="title"  name="title">
        </div>
        <div class="form-group">
            <lable for="artist">歌手</lable>
            <input type="text" class="form-control" id="artist" name="artist">
        </div>
        <div class="form-group">
            <lable for="image">海报</lable>
            <input type="file" class="form-control" id="images" name="images">
        </div>
        <div class="form-group">
            <lable for="source">音乐</lable>
            <input type="file" class="form-control" id="source" name="source" accept="audio/*">
        </div>
        <button class="btn btn-primary btn-block">保存</button>
        </form>
    </div>
    </div>
</body>
</html>
