<?php include "../ewcfg7.php" ?>
<?php include "../ewmysql7.php" ?>
<?php include "../phpfn7.php" ?>
<?php //include "../t_nguoidunginfo.php" ?>
<?php //include "../userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php
$value=$_GET['value'];
$table=$_GET['table'];
$field=$_GET['field'];
$fk_field=$_GET['fk_field'];

			$conn = ew_Connect();
			$sSqlWrk = "Select ".$field." From ".$table." Where ".$fk_field."=".$value;
                        //$sSqlWrk="Select C_DONVI From t_loainhienlieu Where PK_LOAINHIENLIEU=1";
                        //echo $sSqlWrk;
                        $rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			//if ($rswrk) $rswrk->Close();
			echo $arwrk[0][0];
			//if (!$rswrk->EOF){
				//echo $rswrk->fields['C_DONVI'];
						//}
                                              //  echo "hun kkj";
                                                
?>

