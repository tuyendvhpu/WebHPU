<?php
 $string_string_pk ="";
 for($k=0;$k<count($array_pktinbai);$k++) {
                                $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                            } 
 $string_string_pk = "(".substr($string_string_pk,1).")"; 
 $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.PK_TINBAI_ID NOT IN ".$string_string_pk." ) AND (t_tinbai_levelsite.C_HIT_MAINSITE LIKE '%1%') AND (t_tinbai_levelsite.FK_EDITOR_ID IN ".$_SESSION['FK_CONGTY_EX'].") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT 5";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
?>                       

<div class="adv">
                        <h2 class="h2title"> Tin nổi bật </h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) {
                                 if(in_array($arwrk[$k]['PK_TINBAI_ID'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_TINBAI_ID']);

                                    }  
                                 $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                 $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                 $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                  if ($pk_gioithieu <> null && isset($pk_gioithieu))  $url = "detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];      
                                  if ($pk_tuyensinh <> null && isset($pk_tuyensinh))  $url = "detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];    
                                  if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($pk_myseft <> null && isset($pk_myseft))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  
                                  ?> 
                        <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php }  ?>    
                      </ul>
                          <div id="divnoidung">
                          <h2 class="h2title"> Tin mới nhất </h2>
                           
 <?php   
 $string_string_pk ="";
 for($k=0;$k<count($array_pktinbai);$k++) {
 $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                            } 
 $string_string_pk = "(".substr($string_string_pk,1).")"; 
                        $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
                        $sWhereWrk = "(t_tinbai_levelsite.PK_TINBAI_ID NOT IN ".$string_string_pk." ) AND (t_tinbai_levelsite.FK_EDITOR_ID IN ".$_SESSION['FK_CONGTY_EX'].") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
?>                           
                    <ul class="ulcontents1">
                           <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['PK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                  if ($pk_gioithieu <> null && isset($pk_gioithieu))  $url = "detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];      
                                  if ($pk_tuyensinh <> null && isset($pk_tuyensinh))  $url = "detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];    
                                  if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  if ($pk_myseft <> null && isset($pk_myseft))  $url ="detailnews.php?sturl=tintuc&pk_myseft=1&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>   
                     </ul>
  </div>                       


