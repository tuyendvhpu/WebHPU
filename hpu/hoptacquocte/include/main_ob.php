   <?php
   $sSqlWrk ="";
$sSqlWrk = "Select * From t_doituong_levelsite";
$sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_TYPE <> 2) AND (t_doituong_levelsite.C_BELOGTO = 0) AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC ";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
For ($j=0;$j< $rowswrk;$j++)
{
    if($j%4 == 0)  echo "<table id=\"tablecontentbody\"> <tr> ";
   
?>
                    <td style="vertical-align:top;width:25%">
                       <p class="ptextheader"> <?php echo $arwrk[$j]['C_NAME']?> </p>
                       <ul id="ulchuyenmuc" >
                            <?php  
                      $target ="";$url="";
                      switch (strval($arwrk[$j]['C_TYPE']))   
                      {
                                       case "0":
                                                 $sSqlWrk = "Select * From t_doituong_levelsite";
                                                 $sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_TYPE <> 2) AND (t_doituong_levelsite.C_BELOGTO = '".$arwrk[$j]['PK_DOITUONG']."') AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC ";
                                                 break;
					case "1":
						$sSqlWrk = "Select * From t_doituong_levelsite";
                                                $sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_TYPE <> 2) AND (t_doituong_levelsite.C_BELOGTO = '".$arwrk[$j]['PK_DOITUONG']."') AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC ";
                                                $target= "target=\"blank\"";
						break;
                                       
                      }
                       if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rs = $conn->Execute($sSqlWrk);
			$ar = ($rs) ? $rs->GetRows() : array();
			if ($rs) $rs->Close();
			$rows = count($ar); 
                        for ($x=0;$x<$rows;$x++)
                            {   
                              switch (strval($ar[$x]['C_TYPE']))   
                                   {
                                       case "0":
                                        $url_xemthem = "TT-Thongtin-Thuviendoituong-".$ar[$x]['PK_DOITUONG']."-".changeTitle($ar[$x]['C_NAME']).".html";
                                        $icon = ">>";
                                        break;   
                                       case "1":
                                        $url_xemthem = $ar[$x]['C_LOCATION'];
                                        $icon="<img width=\"25px\" src=\"anh_icon.php?text=".$ar[$x]['PK_DOITUONG']."\">" ;
                                        break;   
                                   }
                            ?>
                           <li> <a title="<?php echo $ar[$x]['C_NAME']; ?>" <?php echo $target?> href="<?php echo $url_xemthem ?>">  <?php echo $icon ?>  <?php echo ew_TruncateMemo($ar[$x]['C_NAME'],90, true)  ?></a></li>
                      <?php } ?>
                          
                        </ul>
                   </td>
        
<?php   
      if ((($j>0) && (($j+1)%4 == 0)) || ($j == $rowswrk))  echo "</tr> </table> ";
}
?>
       <!-- end contentbody--></div>
       <!-- end contentbody--></div>                   