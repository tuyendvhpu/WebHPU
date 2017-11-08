
<?php
function is_mobile() {
  //$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
  //return strpos($userAgent, 'mobile');
  
$iphone =  strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry =   strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod =    strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$ipad=     strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
if ($iphone || $android || $palmpre || $ipod || $ipad || $berry == true)
	{
		return true;
	}else{
		return false;
	}
	
}
if(!is_mobile()){
  //$is_mobile = FALSE;
    Header ("Location: home/trangchu.html");
} else {
  //$is_mobile = TRUE;
  Header ("Location:http://m.hpu.edu.vn");
}
    exit;
//echo intval(5/2) ; 5%2
?>
