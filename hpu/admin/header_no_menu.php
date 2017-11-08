<?php

// Compatibility with PHP Report Maker 3
if (!isset($Language)) {
	include_once "ewcfg7.php";
	include_once "ewshared7.php";
	$Language = new cLanguage();
}
?>
<?php 
      ini_set( 'display_errors', 'off' );
      error_reporting(E_ALL & ~E_NOTICE & ~8192);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $Language->ProjectPhrase("BodyTitle") ?></title>
        <link rel="icon" type="text/css" href="images/img_logo.png">
<?php if (@$gsExport == "") { ?>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0/build/button/assets/skins/sam/button.css">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0/build/container/assets/skins/sam/container.css">
<?php } ?>
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
<link rel="stylesheet" type="text/css" href="css/autocomplete.css">
<link rel="stylesheet" type="text/css" href="<?php echo EW_PROJECT_STYLESHEET_FILENAME ?>">
<?php } ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="generator" content="PHPMaker v7.0.0.0">
</head>
<body class="yui-skin-sam">
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0/build/utilities/utilities.js"></script>
<?php } ?>
<?php if (@$gsExport == "") { ?>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0/build/button/button-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0/build/container/container-min.js"></script>
<script type="text/javascript" src="js/datasource-min.js"></script>
<script type="text/javascript" src="js/autocomplete-min.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/dropdownmenu.js"></script>
<script type="text/javascript">
<!--
var EW_LANGUAGE_ID = "<?php echo $gsLanguage ?>";
var EW_DATE_SEPARATOR = "/";
if (EW_DATE_SEPARATOR == "") EW_DATE_SEPARATOR = "/"; // Default date separator
var EW_UPLOAD_ALLOWED_FILE_EXT = "swf,gif,jpg,jpeg,bmp,png,doc,docx,dotx,xls,xlsx,ppt,pptx,rtf,wmv,txt,xml,xps,pdf,zip,rar,FLV,flv,mp4,MP4,m4v,f4v,mov,VP8,WebM,MP3,aac,m4a,f4a"; // Allowed upload file extension
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
<?php } ?>
<script type="text/javascript" src="js/ewp7.js"></script>
<script type="text/javascript" src="js/userfn7.js"></script>
<script type="text/javascript">
<!--
<?php echo $Language->ToJSON() ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js");
//-->

</script>
<?php if (@$gsExport == "") { ?>
<table class="HeaderLayout" cellspacing="0" cellpadding="0">
			<tr>
				<td width="50%" align="left">
				<b><font face="Verdana" size="1" color="#003399">
				<?php
				$timezone  = 7; //(GMT +7:00)
				//Hiển thị ngày tháng tiếng Việt- TuanDA
 				$str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
				$str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
				$timenow = gmdate("D, d/m/Y - H:i:s", time() + 3600*($timezone));
				$timenow = str_replace( $str_search, $str_replace, $timenow);
				echo $timenow;
				if (IsLoggedIn()) {
					global $Security;
                                        
					echo " | Xin chào " ;                                        
                                        ?>
                                        <span style="color:red">
                                        <?php echo CurrentFullUserName() ;?>
                                        </span>
                                        <?php
				}
				?>
				</font></b>
                                </td>
     				<td width="50%" align="right">
					<b>
					::&nbsp;<a href="hpu.edu.vnindex.php" style="text-decoration: none"><font face="Verdana" size="1" color="#003399">TRANG CHỦ</font></a>::
					<?php
					if (IsLoggedIn()==1) {
					echo "<a href=\"logout.php\" style=\"text-decoration: none\"><font face=\"Verdana\" size=\"1\" color=\"#003399\">THOÁT</font></a>";
					}
					if (!IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php"){
					echo "<a href=\"login.php\" style=\"text-decoration: none\"><font face=\"Verdana\" size=\"1\" color=\"#003399\">ĐĂNG NHẬP</font></a>";
					}
					?>
					</b>
				</td>
			</tr></table>
<div class="ewHeaderRow"><img src="images/banner.jpg" alt="" border="0"></div>
	<!-- header (end) -->
	<!-- content (begin) -->
<?php } ?>
  <div>
  <table cellspacing="0" class="ewContentTable">

	    <td class="ewContentColumn" >
			<!-- right column (begin) -->
				<p class="phpmaker"><b><?php //echo $Language->ProjectPhrase("BodyTitle") ?></b></p>
