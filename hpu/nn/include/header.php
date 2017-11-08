<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "../admin/ewcfg7.php" ?>
<?php include "../admin/ewmysql7.php" ?>
<?php include "../admin/phpfn7.php" ?>
<?php include "../admin/userinfo.php" ?>
<?php include "../admin/userfn7.php" ?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />

 <link rel="icon" type="text/css" href="../images/common/img_logo.png" />
 <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
 <script src="../js/jqueryEasing.js" type="text/javascript" language="javascript"></script>
 <script src="../js/scroll.js" type="text/javascript" language="javascript"></script>
 <style type="text/css"> 
@font-face {
	font-family: 'UTM Alter Gothic';
	src: url('font/UTM%20Alter%20Gothic.ttf');
	
}

@font-face {
	font-family: 'UTM Aquarelle';
	src: url('font/UTM%20Aquarelle.ttf');
	
}
</style>

<link href="../css/khoann.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="../css/slidorion.css" rel="stylesheet" type="text/css" media="screen,print" />
<link rel="contents" href="/" title="Home" />
<script type="text/javascript" src='../js/pjax-standalone.js'></script> 
          <script type='text/javascript'>
              pjax.connect('content', 'pjaxer');
		 pjax.connect({
                        'useClass':'pjaxer',
			'container': 'content',
			'beforeSend': function(){console.log("before send");},
			'complete': function(){console.log("done!");
                        FB.XFBML.parse();
                    }
		});
		//pjax.connect('content');
		//pjax.connect();
		
	</script>
<script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=0');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
 </script>
<script>
		$(function() {
			// Clickable Dropdown
			$('.click-nav > ul').toggleClass('no-js js');
			$('.click-nav .js ul').hide();
			$('.click-nav .js').click(function(e) {
				$('.click-nav .js ul').toggle( "slow" );
				$('.clicker').toggleClass('active');
				e.stopPropagation();
			});
			$(document).click(function() {
				if ($('.click-nav .js ul').is(':visible')) {
					$('.click-nav .js ul', this).toggle( "slow" );
					$('.clicker').removeClass('active');
				}
			});
		});
</script> 

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
<?php
 $PK_TINBAI_ID = KillChars(ew_HtmlEncode($_GET['catid']));
 $PK_NOTICE_ID = KillChars(ew_HtmlEncode($_GET['noticeid']));
 $conn = ew_Connect();
 if ((isset($PK_TINBAI_ID) && $PK_TINBAI_ID <> null) || (isset($PK_NOTICE_ID) && $PK_NOTICE_ID <> null))
   {
      
              if (isset($PK_TINBAI_ID) && $PK_TINBAI_ID <> null)
                    {
                            $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.PK_TINBAI_ID = ".$PK_TINBAI_ID.")";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $title_heder =$arwrk[0]['C_TITLE'];
                            $description =  ew_TruncateMemo($arwrk[0]['C_SUMARY'], 230, true);
                    }
                    if (isset($PK_NOTICE_ID) && $PK_NOTICE_ID <> null)
                    {
                            $sSqlWrk = "SELECT C_TITLE FROM t_thongbao_levelsite";
                            $sWhereWrk = "(t_thongbao_levelsite.PK_THONGBAO = ".$PK_NOTICE_ID.")";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $title_heder =$arwrk[0]['C_TITLE'];
                            $description =  ew_TruncateMemo($arwrk[0]['C_TITLE'], 230, true);
                    }
  }
 else 
 {

        $title_heder ='Khoa Ngoại Ngữ ';
        $description ='Khoa Ngoại Ngữ Haiphong Private University';
 } 
$actual_link = KillChars($actual_link."?".$_SERVER['QUERY_STRING']);

?>
<title><?php echo $title_heder ?></title>
<meta name="google-site-verification" content="fAjNq1T-cNRvaOmDK-DddoRd35ugs6W27ccVst787Qw" />
<meta id="MetaDescription" name="DESCRIPTION" content="Haiphong Private University" />
<meta id="MetaKeywords" name="KEYWORDS" content="Haiphong Private University" />
<meta id="MetaCopyright" name="COPYRIGHT" content="Copyright 2013 by HPU-LIC Corporation" />
<meta id="MetaAuthor" name="AUTHOR" content="Haiphong Private University" />
<meta name="RESOURCE-TYPE" content="DOCUMENT" /><meta name="DISTRIBUTION" content="GLOBAL" />
<meta name="ROBOTS" content="INDEX, FOLLOW" /><meta name="REVISIT-AFTER" content="1 DAYS" />
<meta name="RATING" content="GENERAL" />
<meta name="keywords" content="<?php echo Get_keyword($title_heder)."Haiphong Private University" ?>" />
<meta name="description" content="<?php echo $description ?>" />
<meta property="fb:app_id" content="477334439054395" />
</head>
<body>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 879962061;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/879962061/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
    <?php $FK_CONGTY = 120; 
        $_SESSION['FK_CONGTY']=120;
    ?>