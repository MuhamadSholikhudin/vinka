<?php 
include './config/config.php';
session_start();

$url_action = str_replace($defaul_uri, "", $_SERVER['REQUEST_URI']);
if($url_action == "/"){
    header("Location: ".$url."/app/home/index.php");
}else if(isset($_SESSION['login'])){
    // echo "HALAMAN DASHBOARD";
    header("Location: ".$url."/app/dashboard/dashboard.php");
}else{
    // echo "HALAMAN LOGIN";
    header("Location: ".$url."/app/auth/login.php");
    exit(); 
}