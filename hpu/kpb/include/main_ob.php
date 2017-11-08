<table>
    <tr>
   <td>
       <table id="tablecontentbody" >
               <tr>
                   <td style="width:250px">
                        <p class="ptextheader">Phòng Đào Tạo </p>
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =151 định danh đối tượng : Phòng Đào Tạo
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =151) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {    
                                  $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>             
                        </ul>

                   </td>
                   <td style="width:250px">
                       <p class="ptextheader">Phòng QLKH & ĐBCL </p>
                      <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =153 định danh đối tượng : Phòng Nghiên Cứu Khoa Học
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =153) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {   
                                   $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>          
                         </ul>
                   </td>
                   <td style="width:250px">
                       <p class="ptextheader">Phòng QHCC- QHQT</p> 
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Quan hệ hợp tác quốc tế
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =154) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>        
                           
                        </ul>
                   </td>
                 
               </tr>
               <tr>
                   <td style="width:250px">
                        <p class="ptextheader">Phòng Kế Hoạch - Tài Chính </p>
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =152 định danh đối tượng : Phòng Kế Hoạch Tài Chính
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =152) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {   
                                   $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>             
                        </ul>

                   </td>
                   <td style="width:250px">
                       <p class="ptextheader">Phòng Tổ Chức - Hành Chính  </p>
                      <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =155 định danh đối tượng : Tổ chức hành chính
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =155) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {   
                                   $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>          
                         </ul>
                   </td>
                   <td style="width:250px">
                       <p class="ptextheader"> Phòng Y tế</p> 
                        <ul id="ulchuyenmuc">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =165 định danh đối tượng : Phòng công tác sinh viên
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =165) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                   $url ="Khoiphongchuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                                     
                                ?>                      
                            <li> <a <?php echo $target ?>  href="<?php echo $url ?>"> >> <?php echo $arwrk[$j]['C_NAME']?></a></li>
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
                                                                $sWhereWrk = "(t_htlienquan.C_ACTIVE=1) AND (t_htlienquan.FK_OB_ID LIKE '%3%') ORDER BY t_htlienquan.C_EDIT_TIME DESC LIMIT 7";
                                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                                                $rswrk = $conn->Execute($sSqlWrk);
                                                                $ar_htlienquan = ($rswrk) ? $rswrk->GetRows() : array();
                                                                if ($rswrk) $rswrk->Close();
                                                                $rowswrk = count($ar_htlienquan);
                                                                if ($rowswrk > 0)
                                                                { 
                                                                    if ($rowswrk ==1)
                                                                    {

                                                                    }
                                                                    else 
                                                                    {
                                                                        $td1= ($rowswrk/2);
                                                                        $td2= $rowswrk - $td1;
                                                                    }    

                                                                }
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