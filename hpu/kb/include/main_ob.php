<table>
    <tr>
   <td style="vertical-align: top">
       <table id="tablecontentbody" >
               <tr>
                   <td style="width:250px">
                        <p class="ptextheader"> Ban công tác sinh viên</p> 
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =156 định danh đối tượng : Ban cong tac sinh vien
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =156) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {    
                                  $url ="Khoibanchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>             
                        </ul>

                   </td>
                   <td style="width:250px">
                       <p class="ptextheader"> Ban thanh tra  </p>
                      <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =153 định danh đối tượng : Ban thanh tra
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =158) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {   
                                   $url ="Khoibanchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>          
                         </ul>
                   </td>
                   <td style="width:250px">
                      <p class="ptextheader"> Ban dự án cơ sở II</p> 
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Bna quản lý dự án cơ sở II
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =159) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Khoibanchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>        
                           
                        </ul>
                   </td>
                 
               </tr>
           
          </table>
</td>
<td style="vertical-align: top">
    <table id="tablecontentbody" >
          <tr>
            <td style="width:250px;">
                    <p class="ptextheader"> Liên kết Ngoài</p> 
                                    <ul id="ulchuyenmuc">
                                        <?php   
                                                                $sSqlWrk = "Select * From t_htlienquan";
                                                                $sWhereWrk = "(t_htlienquan.C_ACTIVE=1) AND (t_htlienquan.FK_OB_ID LIKE '%4%') ORDER BY t_htlienquan.C_EDIT_TIME DESC LIMIT 7";
                                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                                                $rswrk = $conn->Execute($sSqlWrk);
                                                                $ar_htlienquan = ($rswrk) ? $rswrk->GetRows() : array();
                                                                if ($rswrk) $rswrk->Close();
                                                                $rowswrk = count($ar_htlienquan);
                                                                for($i=0;$i<$rowswrk;$i++)
                                                                { 
                                                                $url=$ar_htlienquan[$i]['C_URL'];
                                                                $icon="<img width=\"20px\" src=\"anh_icon.php?text=".$ar_htlienquan[$i]['SYS_ID']."\">" ;

                                                        ?>
                                        <li> <a <?php echo $style ?>  title="<?php echo $ar_htlienquan[$i]['C_NAME']; ?>" <?php echo $target?> href="<?php echo $url ?>">  <?php echo $icon ?>  <?php echo ew_TruncateMemo($ar_htlienquan[$i]['C_NAME'],90, true)  ?></a></li>
                                                                <?php } ?>
                                    </ul>
                    </td>
               </tr>
          </table>             
</td>
        
    </tr>
    
</table>

       <!-- end contentbody--></div>                   