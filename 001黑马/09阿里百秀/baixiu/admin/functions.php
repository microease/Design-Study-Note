<?php
/*
 *获取当前登录用户信息，如果没有获取到，则自动跳转到登录页面
 *
 *
 *
 *
 *
 *
 * */
session_start();
function get_current_user(){
    if(empty($_SESSION['current_login_user_id'])){
        header('Location: /admin/login.php');
        exit();
    }
    return $_SESSION['current_login_user_id'];
}