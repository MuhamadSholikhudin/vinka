<?php 
	include '../../config/config.php';
	session_start();
	if(!isset($_SESSION['login'])){
		header("Location: ".$url."/app/auth/login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">





  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= Url_web()?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?= $url ?>/assets/bootstrap/css/bootstrap.min.css">    
	<!-- Font Awesome -->
	<link href="<?= $url ?>/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $url ?>/assets/dist/js/font-awesome.js">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= $url ?>/assets/dist/css/AdminLTE.min.css">

	<link rel="stylesheet" href="<?= $url ?>/assets/dist/css/skins/_all-skins.min.css">

	<!-- <link href="<?= $url ?>/assets/plugins/select2/select2.css" rel="stylesheet" />
	<link href="<?= $url ?>/assets/plugins/select2/select2.min.css" rel="stylesheet" /> -->

	<script src="<?= $url ?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
	