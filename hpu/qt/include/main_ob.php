
<script>
//set hover class for anything
$(document).ready(function() {
  $('#tablecontentbody p').hover(function() {
    $('.ptextheadertintuc').addClass('pretty-hover');
  }, function() {
     $('.ptextheadertintuc').removeClass('pretty-hover');
  });
});

</script>
<?php
$sSqlWrk = "Select * From t_doituong_levelsite";
$sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_BELOGTO = 0) AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC LIMIT 4";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
For ($j=0;$j< $rowswrk;$j++)
{
    if($j%4 == 0)  echo "<table id=\"tablecontentbody\"> <tr> ";
    switch ($j%4) {
    case 0:
        $style = 'ptextheadertintuc';
        $style_a = 'xemthemtintuc';
  
        break;
    case 1:
         $style = 'ptextheaderthongbao';
         $style_a = 'xemthemthongbao';
        break;
    case 2:
        $style = 'ptextheaderbancobiet';
        $style_a= 'xemthembancobiet';
        break;
    case 3:
        $style = 'ptextheaderlienket';
        $style_a = 'xemthemhethong';
        break;
   
}
?>
                    <td style="vertical-align:top;width:25%">
                 
                            <?php  
                      $target ="";$url="";
                      switch (strval($arwrk[$j]['C_TYPE']))   
                      {
                                       case "0":
                                                $sSqlWrk = "Select 
                                                        t_tinbai_mainlevel.PK_TINBAI_ID as ID,
                                                        t_tinbai_levelsite.C_TITLE as C_TITLE,
                                                        t_tinbai_mainlevel.C_ORDER as C_ORDER,
                                                        t_tinbai_mainlevel.FK_CHUYENMUC_ID as C_CHUYENMUC,
                                                        t_tinbai_mainlevel.FK_DOITUONG_ID as C_DOITUONG 
                                                        From t_tinbai_mainlevel Inner Join
                                                        t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                                                        t_tinbai_levelsite.PK_TINBAI_ID";
                                                 $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE = 1) AND (t_tinbai_mainlevel.FK_DOITUONG_ID='".$arwrk[$j]['PK_DOITUONG']."') AND (t_tinbai_mainlevel.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 4";
                                                 $url_xemthem = "QTdoituong-".$arwrk[$j]['PK_DOITUONG']."-".changeTitle($arwrk[$j]['C_NAME']).".html";
                                                 break;
					case "1":
						$sSqlWrk = "Select 
                                                            t_doituong_levelsite.PK_DOITUONG as ID,
                                                            t_doituong_levelsite.C_NAME as C_TITLE,
                                                            t_doituong_levelsite.C_LOCATION as C_LOCATION,
                                                            t_doituong_levelsite.C_ORDER as C_ORDER
                                                            From t_doituong_levelsite";
                                                $sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_BELOGTO = '".$arwrk[$j]['PK_DOITUONG']."') AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC LIMIT 4";
                                                $target= "target=\"blank\"";
                                                $url_xemthem = "QThethonglienket.html";
						break;
                                        case "2":
						$sSqlWrk = "Select 
                                                            t_thongbao_mainlevel.PK_THONGBAO as ID,
                                                            t_thongbao_levelsite.C_TITLE as C_TITLE,
                                                            t_thongbao_mainlevel.C_ORDER as C_ORDER
                                                            From t_thongbao_mainlevel Inner Join
                                                            t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                                                            t_thongbao_mainlevel.PK_THONGBAO ";
                                                $sWhereWrk = "(t_thongbao_mainlevel.C_NOTICE_HIT = '1') AND (t_thongbao_mainlevel.C_ACTIVE = '1') AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT 4";
						$url_xemthem  = "QTthongbaodt-".$arwrk[$j]['PK_DOITUONG'].".html";
                                                break;
					
					
                      }
                       if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rs = $conn->Execute($sSqlWrk);
			$ar = ($rs) ? $rs->GetRows() : array();
			if ($rs) $rs->Close();
			$rows = count($ar); 
                        ?>
                       <p class="<?php echo $style ?>"> <a href="<?php echo $url_xemthem ?>"><?php echo $arwrk[$j]['C_NAME']?> </a></p>
                       <ul id="ultintuc" >
                        <?php 
                        for ($x=0;$x<4;$x++)
                            {
                                 switch (strval($arwrk[$j]['C_TYPE']))   
                                    {
                                      case "0":
                                          
                                                $obid= $ar[$x]['C_DOITUONG'];
                                                if ($obid == null) $obid = 0;
                                                $subid= $ar[$x]['C_CHUYENMUC'];
                                                if ($subid == null) $subid = 0;
                                                $url ="QTtintuc-".$ar[$x]['ID']."-".$obid."-".$subid."-1-".changeTitle($ar[$x]['C_TITLE']).".html";         
                                                $icon ="";
                                                $style ="";
                                                break;
					case "1":
                                                $url=$ar[$x]['C_LOCATION'];
                                                $icon="<img width=\"40px\" src=\"anh_icon.php?text=".$ar[$x]['ID']."\">" ;
                                                $style= "style=\"line-height: 35px\"";
						break;
                                        case "2":
                                                $url ="QTthongbao-".$ar[$x]['ID']."-".changeTitle($ar[$x]['C_TITLE']).".html"; 
                                                $icon ="";
                                                 $style ="";
						break;
                                    }
                            ?>
                           <li> <a <?php echo $style ?>  title="<?php echo $ar[$x]['C_TITLE']; ?>" <?php echo $target?> href="<?php echo $url ?>">  <?php echo $icon ?>  <?php echo ew_TruncateMemo($ar[$x]['C_TITLE'],90, true)  ?></a></li>
                      <?php } ?>
                            <li class="liend"><a href="<?php echo $url_xemthem ?>"> <I>  Xem thêm...</I></a></li>
                        </ul>
                   </td>
        
<?php   
      if ((($j>0) && (($j+1)%4 == 0)) || ($j == $rowswrk))  echo "</tr> </table> ";
}
?>