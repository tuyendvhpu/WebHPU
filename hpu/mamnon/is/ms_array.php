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
function value_in_array($array, $find){
$exists = 0;
if(!is_array($array)){
   return;
}
foreach ($array as $key => $value) {
  if($find == $value){
       $exists = $exists+1;
  }
}
  return $exists;
}



  $time = date("Y-m-d H:i:s");  
  $time_end = date("Y-m-d")." 09:50:58";  
//if(($time < $time_end))
if(($time < $time_end) OR (1==1))
{
    
    $sqlserver_hpu = new SqlServer_hpu; 
    //echo substr(strstr('18x_1','x'),2);
    $string = htmlspecialchars($_POST['ser_code'],ENT_QUOTES);
    if (isset($string) && $string <> null)
    {
        $arwrk =  (split(",",$string));
        $findme   = 'x_';
        FOR ($j=0;$j< count ($arwrk);$j++)   
            {
            $pos = strpos($arwrk [$j], $findme);
            if ($pos == true) {
                        $array_user[$j] =  strstr($arwrk [$j],'x',true);
                        $array_value[$j] = substr(strstr($arwrk [$j],'x'),2);
                        }
            }

    }

    if(isset($array_user))
    {    
        for ($i=0;$i< count($array_user);$i++)
        {
        $array_danhsachlop = $sqlserver_hpu->Is_DiemDanh($_SESSION['LopID'],$_SESSION['Month'],$array_user[$i], $_SESSION['today'], $array_value[$i], $_SESSION['User'], ew_StdCurrentDateTime());
        }
    }    
    
      $dihoc=value_in_array($array_value,1);
      $nghihoc_khongphep=value_in_array($array_value,0);
      $nghihoc_cophep=value_in_array($array_value,-1);
      $nghihoc_letet=value_in_array($array_value,-2);
      $dihoc_duadon=value_in_array($array_value,2);
      $dihoc_ngoaigio=value_in_array($array_value,3);
      $dihoc_ngoaigio_antoi=value_in_array($array_value,4);
      
    Echo "<div class=\"alert alert-success\" role=\"alert\">
        Điểm danh thành công
        <table style=\"font-size:12px\">
	<tr>
		<td style=\"padding-left:20px;\">Số bé đi học: <b>[$dihoc] </b></td>
		<td style=\"padding-left:20px;\">Số bé nghỉ học không phép: <b>[$nghihoc_khongphep]</b> </td>
		<td style=\"padding-left:20px;\">Số bé nghỉ học có phép:<b> [$nghihoc_cophep] </b></td>
	</tr>
	<tr>
		<td style=\"padding-left:20px;\">Số bé đi học + xe đưa đón: <b>[$dihoc_duadon] </b></td>
		<td style=\"padding-left:20px;\">Số bé đi học + ngoài giờ:<b> [$dihoc_ngoaigio]</b></td>
		<td style=\"padding-left:20px;\">Số bé đi học + ngoài giờ + ăn tối:<b> [$dihoc_ngoaigio_antoi]</b></td>
	</tr>

</table>


</div>";
   
    
}
else 
{    
    Echo "<div class=\"alert alert-danger\" role=\"alert\">Hết thời gian điểm danh trạng thái điểm danh sẽ không được cập nhật</div>";     
    ?>

<?php 
}   
?>
