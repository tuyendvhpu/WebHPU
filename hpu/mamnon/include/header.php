<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "../admin/ewcfg7.php" ?>
<?php include "../admin/ewmysql7.php" ?>
<?php include "../admin/phpfn7.php" ?>
<?php include "../admin/userinfo.php" ?>
<?php include "../admin/userfn7.php" ?>
<?php  error_reporting (E_ALL ^ E_NOTICE); 
       ini_set( 'display_errors', 'off' );
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>Trường Mầm Non Quốc Tế Hữu Nghị</title>
<link rel="icon" type="text/css" href="../images/common/img_logo.png" />
 <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
<meta name="description" content="" />
<meta name="keywords" content="" />
<style>
@font-face {
	font-family: 'UTM Alter Gothic';
	src: url('font/UTM%20Alter%20Gothic.ttf');
	
}

@font-face {
	font-family: 'UTM Aquarelle';
	src: url('font/UTM%20Aquarelle.ttf');
	
}

</style>
<!--[if lt IE 7]>
        <style type="text/css">
                #wrapper { height:100%; }
        </style>
<![endif]-->

<link href="../css/mamnon.css" rel="stylesheet" type="text/css" media="screen,print" />
<link rel="contents" href="/" title="Home" />
<!--[if lte IE 7]><script language="JavaScript" type="text/javascript" src="../js/fix_png02.js" defer="defer"></script><![endif]-->
<link rel="stylesheet" href="../css/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/nivo-slider_is.css" type="text/css" media="screen" />
<script type='text/javascript'>$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#bttop').fadeIn();}else{$('#bttop').fadeOut();}});$('#bttop').click(function(){$('body,html').animate({scrollTop:0},800);});});</script>
</head>
<body>
 <?php $FK_CONGTY = 118; 
        $_SESSION['FK_CONGTY']=118;
    ?>