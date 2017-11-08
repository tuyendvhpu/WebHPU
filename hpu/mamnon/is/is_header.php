<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "../../admin/ewcfg7.php" ?>
<?php include "../../admin/ewmysql7.php" ?>
<?php include "../../admin/phpfn7.php" ?>
<?php include "../../admin/userinfo.php" ?>
<?php include "../../admin/userfn7.php" ?>
<?php  error_reporting (E_ALL ^ E_NOTICE); 
       ini_set( 'display_errors', 'off' );
?>
<?php

// Compatibility with PHP Report Maker 3
if (!isset($Language)) {
	include_once "ewcfg7.php";
	include_once "ewshared7.php";
	$Language = new cLanguage();
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link rel="stylesheet" type="text/css" href="<?php echo EW_PROJECT_STYLESHEET_FILENAME ?>">
    <title>Trường Mầm Non Quốc Tế Hữu Nghị</title>
    <link rel="icon" type="text/css" href="../../images/common/img_logo.png" />

    <!-- Bootstrap -->
    <link href="css/is.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css" title="currentStyle">
                            @import "media/css/demo_page.css";
                            @import "media/css/demo_table.css";
                    </style>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script type="text/javascript"  src="media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $('.dataTable').dataTable( {
                             'iDisplayLength': 100
                                } );
                                    
                            } );
                    </script>
                    
  </head>
    <body> 
  <script type="text/javascript" src="http://yui.yahooapis.com/2.8.0/build/utilities/utilities.js"></script>
<script type="text/javascript">
<!--
var EW_LANGUAGE_ID = "<?php echo $gsLanguage ?>";
var EW_DATE_SEPARATOR = "/"; 
if (EW_DATE_SEPARATOR == "") EW_DATE_SEPARATOR = "/"; // Default date separator
var EW_UPLOAD_ALLOWED_FILE_EXT = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip"; // Allowed upload file extension
var EW_FIELD_SEP = ", "; // Default field separator

// Ajax settings
var EW_RECORD_DELIMITER = "\r";
var EW_FIELD_DELIMITER = "|";
var EW_LOOKUP_FILE_NAME = "ewlookup7.php"; // lookup file name

// Common JavaScript messages
var EW_ADDOPT_BUTTON_SUBMIT_TEXT = "<?php echo ew_JsEncode2(ew_BtnCaption($Language->Phrase("AddBtn"))) ?>";
var EW_EMAIL_EXPORT_BUTTON_SUBMIT_TEXT = "<?php echo ew_JsEncode2(ew_BtnCaption($Language->Phrase("SendEmailBtn"))) ?>";
var EW_BUTTON_CANCEL_TEXT = "<?php echo ew_JsEncode2(ew_BtnCaption($Language->Phrase("CancelBtn"))) ?>";

//-->
</script>
<script type="text/javascript" src="js/ewp7.js"></script>
<script type="text/javascript" src="js/userfn7.js"></script>
<script type="text/javascript">
<!--
<?php echo $Language->ToJSON() ?>

//-->
</script>