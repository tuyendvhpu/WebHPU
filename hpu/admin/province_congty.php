<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_nguoidunginfo.php" ?>
<?php include "userfn7.php" ?>
<?php
global $Security,$conn;
$conn = ew_Connect();
?>
<?php
 if(($_POST['isadmin']==1) && ($_POST['provinceid']==0))
 {
                       If ($_POST['data']=="" && isset($_POST['data']))
                           {
                            $arwrk = GetCompanyTree();
                            }
                            else
                            {
                                $arwrk = GetCompanyTree_so ($_POST['data'],1);
                                array_unshift($arwrk, array("", "Chọn"));
                            }
 }

   ?>
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY">
<?php

	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php  echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}

//?>
</select>
<?php

?>

