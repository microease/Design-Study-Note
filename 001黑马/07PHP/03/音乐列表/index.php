<?php
/**
 * Created by PhpStorm.
 * User: huxiaoyi
 * Date: 2018/7/28
 * Time: 下午9:42
 */
$contents = file_get_contents('storage.json');
$arr = json_decode($contents);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>音乐列表</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="display-3">音乐列表<small>by MicroEase</small> <a href="add.php" class="btn btn-primary">添加</a></h1>
    <hr>
    <table class="table table-bordered table-striped  table-hover">
        <thead class="thead-dark">
            <tr>
                <th>编号</th>
                <th>标题</th>
                <th>歌手</th>
                <th>海报</th>
                <th>音乐</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($arr as $item): ?>
        <tr>
            <td><?php echo $item->id?></td>
            <td><?php echo $item->title?></td>
            <td><?php echo $item->artist?></td>
            <td><img src="<?php echo $item->images[0]?>" alt=""></td>
            <td>
                <audio src="<?php echo $item->source?>" controls></audio>
            </td>
            <td><button class="btn btn-danger btn-sm">删除</button></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>
