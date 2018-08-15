<?php
/*
 *根据客户端传过来的ID值删除对应数据
 */
require_once 'functions.php';
if (empty($_GET['id'])) {
    exit('缺少必要参数');
}
//$id = (int)$_GET['id'];
$id = $_GET['id'];

$rows = xiu_execute('delete from categories where id in (' . $id . ');');
/**
 * sql注入: 1 or 1 = 1 删除所有数据
 */
//if ($rows > 0) {
//    $GLOBALS['errorMessage'] = '删除成功';
//}
header('Location: /admin/categories.php');