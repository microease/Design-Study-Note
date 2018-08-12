<?php
require_once 'config.php';
/*
 *获取当前登录用户信息，如果没有获取到，则自动跳转到登录页面
 * */
session_start();
/*
 * function_exits("name")用以判断php函数是否存在
*/
function xiu_get_current_user()
{
    if (empty($_SESSION['current_login_user'])) {
        header('Location: /admin/login.php');
        exit();
    }
    return $_SESSION['current_login_user'];
}

/*
 * 获取通过数据库查询获取数据
 * */
function xiu_fetch_all($sql)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        exit('连接失败');
    }
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        return false;
    }
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }

    mysqli_free_result($query);
    mysqli_close($conn);
    return $result;
}

function xiu_fetch_one($sql)
{
    $res = xiu_fetch_all($sql);
    return isset($res[0]) ? $res[0] : null;
}

/**
 *增删改语句
 *增删改类的操作
 */
function xiu_execute($sql)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        exit('连接失败');
    }
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        return false;
    }
    $affected_rows = mysqli_affected_rows($conn);
    mysqli_close($conn);
    return $affected_rows;
}
