<?php include "../admin/ewcfg7.php" ?>
<?php include "../admin/ewmysql7.php" ?>
<?php include "../admin/phpfn7.php" ?>
<?php include "../admin/userinfo.php" ?>
<?php include "../admin/userfn7.php" ?>
<?php header("Content-Type: image/jpeg");
?>
<?php
$text="";
$text=$_GET['text'];
$text=KillChars($text);
			$conn = ew_Connect();
			$sSqlWrk = "Select `C_ICON` From `t_doituong_levelsite`";			
			$sWhereWrk = "`PK_DOITUONG`='".$text."'";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			if (!$rswrk->EOF){
                            echo $rswrk->fields['C_ICON'];  
						}
          
			exit();

?>
