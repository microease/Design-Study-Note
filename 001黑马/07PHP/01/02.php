<?php

/**
 * Created by PhpStorm.
 * User: huxiaoyi
 * Date: 2018/7/25
 * Time: 上午8:36
 */
header("Content-Type:text/html;charset=utf-8");
//声明编码为utf-8
$name = file_get_contents("names.txt");
//读取文件，文件内容放在names变量中
$line = explode("\n",$name);
//用换行分开拆分并添加为数组
foreach ($line as $item){
    //循环遍历数组，逐行解析
    if(!item) continue;
    $cols = explode("|",$item);
    //用|拆分病添加到cols
    $data[] = $cols;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            margin:0 auto;
        }
        th,td{
            border:1px solid red;
            width:100px;
            height:20px;
            line-height:20px;
            text-align:center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>邮箱</th>
                <th>网址</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $line):?>
            <!-- 画多少行 -->
            <tr>
                <?php foreach($line as $col):?>
                <!-- 画多少列 -->
                <?php $col = trim($col);?>
                <!-- 清除多余字符，如空格 -->
                <?php if(strpos($col,"http://") === 0):?>
                <!-- 判断是否是网址 -->
                    <td>
                    <!-- 如果是网址的话，输出链接为小写，展示效果删掉http://输出 -->
                        <a href="<?php echo strtolower($col);?>"><?php echo substr($col,7);?></a>
                    </td>
                <?php else:?>
                    <td>
                    <!-- 如果不是网址，直接输出 -->
                        <?php echo $col;?>
                    </td>
                <?php endif ?>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>