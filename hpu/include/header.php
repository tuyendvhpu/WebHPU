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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<?php
 $PK_TINBAI_ID = KillChars(ew_HtmlEncode($_GET['PK_TINBAI_ID']));
 $conn = ew_Connect();
 if (isset($PK_TINBAI_ID) && $PK_TINBAI_ID <> null)
 {
        $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
        $sWhereWrk = "(t_tinbai_levelsite.PK_TINBAI_ID = ".$PK_TINBAI_ID.")";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $title_heder =$arwrk[0]['C_TITLE'];
        $description =$arwrk[0]['C_SUMARY'];
 }
 else 
 {
        $title_heder ='Dai Hoc Dan Lap Hai Phong';
        $description ='Dai Hoc Dan Lap Hai Phong';
 } 
$actual_link = KillChars($actual_link."?".$_SERVER['QUERY_STRING']);

?>
<title><?php echo $title_heder ?></title>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-20237676-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<meta name="google-site-verification" content="fAjNq1T-cNRvaOmDK-DddoRd35ugs6W27ccVst787Qw" />
<meta id="MetaDescription" name="DESCRIPTION" content="Dai Hoc Dan Lap Hai Phong" />
<meta id="MetaKeywords" name="KEYWORDS" content="Dai Hoc Dan Lap Hai Phong Cac he dao tao: Cao Hoc, Dai Hoc, Cao Dang" />
<meta id="MetaCopyright" name="COPYRIGHT" content="Copyright 2013 by HPU-LIC Corporation" />
<meta id="MetaAuthor" name="AUTHOR" content="Haiphong Private University" />
<meta name="RESOURCE-TYPE" content="DOCUMENT" /><meta name="DISTRIBUTION" content="GLOBAL" />
<meta name="ROBOTS" content="INDEX, FOLLOW" /><meta name="REVISIT-AFTER" content="1 DAYS" />
<meta name="RATING" content="GENERAL" />
 <title><?php echo $title_heder ?></title>
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="dai hoc, dan lap , Hai Phong, tuyen sinh, dao tao, giao duc, cao hoc, dai hoc, cao dang" />

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-20654318-1']);
_gaq.push(['_setDomainName', '.edu.vn']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<link rel="icon" type="text/css" href="../images/common/img_logo.png" />
 <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
<style type="text/css"> 
@font-face {
	font-family: 'UTM Alter Gothic';
	src: url('../css/font/UTM%20Alter%20Gothic.ttf');
	
}

@font-face {
	font-family: 'UTM Aquarelle';
	src: url('../css/font/UTM%20Aquarelle.ttf');
	
}

</style>
	<!--[if lt IE 7]>
		<style type="text/css">
			#wrapper { height:100%; }
		</style>
	<![endif]-->

<link href="../css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<link rel="contents" href="/" title="Home" />
<!--[if lte IE 7]><script language="JavaScript" type="text/javascript" src="../js/fix_png02.js" defer="defer"></script><![endif]-->
<!-- sideshow newshot-->
  <link rel="stylesheet" href="../css/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>
<meta property="fb:app_id" content="464981060279361" />
</head>
    <?php 
      
      			$conn = ew_Connect();
                        $today = date ( 'Y-m-j' ,strtotime (ew_CurrentDateTime()));
                         $timezone  = 7; //(GMT +7:00)
                        //Hiển thị ngày tháng tiếng Việt- TuanDA
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timenow = gmdate("D, d/m/Y - H:i:s", time() + 3600*($timezone));
                        $timenow = str_replace( $str_search, $str_replace, $timenow);
                         $_SESSION['FK_CONGTY_EX'] = '(-20)';
      ?>

          <?php // include "../popup/popup.php" ?> 