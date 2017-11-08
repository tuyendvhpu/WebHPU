<table id="tablecontentbody">
               <thead>
                 <tr>
                      <td style="width:25%"><img src="../images/khoa/img_bgdangbo.jpg" /> </td>
                      <td style="width:25%"><img style="margin-left:7px;" src="../images/khoa/img_bgcongdoan.jpg" /> </td>
                      <td style="width:25%"><img style="margin-left:7px;" src="../images/khoa/img_bgdoanhoi.jpg" /> </td>
                      <td style="width:25%;"><img style="float:right;margin-right:1px" src="../images/khoa/img_doanhoi.jpg" /> </td>  
                 </tr>

               </thead>
               <tr>
                   <td>
                        <ul id="ulchuyenmuc" class="uldangbo" >
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Quan hệ hợp tác quốc tế
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =162) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Doanthechuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>        
                           
                        </ul>

                   </td>
                   <td>
                      <ul id="ulchuyenmuc" class="ulcongdoan">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Quan hệ hợp tác quốc tế
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =163) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Doanthechuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>     
                           
                         </ul>
                   </td>
                   <td >
                        <ul id="ulchuyenmuc" class="uldoanhoi">
                             <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Quan hệ hợp tác quốc tế
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =161) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Doanthechuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>"> <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>     
                          
                        </ul>
                   </td>
                   <td >
                     <ul id="ulchuyenmuc" class="ulcaulacbo">
                               <?php
                               //t_chuyenmuc_levelsite.FK_CONGTY =154 định danh đối tượng : Quan hệ hợp tác quốc tế
                                $sSqlWrk = "Select * From t_chuyenmuc_levelsite";
                                $sWhereWrk = "(t_chuyenmuc_levelsite.C_STATUS = 1) AND (t_chuyenmuc_levelsite.FK_CONGTY =164) ORDER BY t_chuyenmuc_levelsite.C_ORDER ASC LIMIT 4";
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                $rswrk = $conn->Execute($sSqlWrk);
                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                if ($rswrk) $rswrk->Close();
                                $rowswrk = count($arwrk); 
                                For ($j=0;$j< $rowswrk;$j++)
                                {  
                                $url ="Doanthechuyenmuc-".$arwrk[$j]['PK_CHUYENMUC']."-".$arwrk[$j]['FK_CONGTY']."-".changeTitle($arwrk[$j]['C_NAME']).".html";  
                               // $url = "listnews.php?subid=".$arwrk[$j]['PK_CHUYENMUC']."&fk_congty=".$arwrk[$j]['FK_CONGTY']."";
                                ?>                      
                               <li> <a href="<?php echo $url ?>">  <?php echo $arwrk[$j]['C_NAME']?></a></li>
                               <?php } ?>     
                       </ul>
                   
                   </td>
               </tr>
          
          </table>