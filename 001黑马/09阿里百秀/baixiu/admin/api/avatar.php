<?php
/**
 * Created by PhpStorm.
 * User: huxiaoyi
 * Date: 2018/8/11
 * Time: 上午7:25
 */
require_once '../../config.php';
if(empty($_GET['email'])){
    exit('缺少必要参数');
}
$email = $_GET['email'];
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$conn){
    exit('连接数据库失败');
}
$res = mysqli_query($conn,"select avatar from users where email = '{$email}' limit 1;");
if(!$res){
    exit('查询失败');
    }
    $row = mysqli_fetch_assoc($res);
echo $row['avatar'];