<?php
 $pk_gioithieu = KillChars(ew_HtmlEncode($_GET['pk_intro']));
 $pk_tuyensinh = KillChars(ew_HtmlEncode($_GET['pk_tuyensinh']));
 $dtsvtuonglai_id = KillChars(ew_HtmlEncode($_GET['dtsvtuonglai_id']));
 $dtsvdanghoc_id = KillChars(ew_HtmlEncode($_GET['dtsvdanghoc_id']));
 $dtcuusinhvien_id = KillChars(ew_HtmlEncode($_GET['dtcuusinhvien_id']));
 $dtdoanhnghiep_id = KillChars(ew_HtmlEncode($_GET['dtdoanhnghiep_id']));
 $pk_myseft = KillChars(ew_HtmlEncode($_GET['pk_myseft']));

 if ($pk_gioithieu <> null && isset($pk_gioithieu))
  {
        $sSqlWrk = "SELECT PK_DANHMUCGIOITHIEU FROM t_danhmucgioithieu";
                            $sWhereWrk = "(C_ACTIVE =1)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);   
                            for($k=0;$k<$rowswrk;$k++) {
                                $string_pk_dmgt =  $string_pk_dmgt.",".$arwrk[$k]['PK_DANHMUCGIOITHIEU'];

                            } 
                            $string_pk_dmgt = "(".substr($string_pk_dmgt,1).")"; 
                            $sSqlWrk ="";  
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DMGIOITHIEU_ID IN ".$string_pk_dmgt.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DMGIOITHIEU_ID IN ".$string_pk_dmgt.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
   
                                              
  } 
  if ($pk_tuyensinh <> null && isset($pk_tuyensinh))
  {
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DMTUYENSINH_ID = ".$pk_tuyensinh.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DMTUYENSINH_ID = ".$pk_tuyensinh.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
  }
     
  if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))
  {
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTSVTUONGLAI_ID = ".$dtsvtuonglai_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTSVTUONGLAI_ID = ".$dtsvtuonglai_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
  }
    if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id))
  {
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTSVDANGHOC_ID = ".$dtsvdanghoc_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTSVDANGHOC_ID = ".$dtsvdanghoc_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                   
  }
   if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))
  {
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTCUUSV_ID = ".$dtcuusinhvien_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTCUUSV_ID = ".$dtcuusinhvien_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
   }
  if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))
  {
                            $array_pktinbai = array();
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTDOANHNGHIEP_ID = ".$dtdoanhnghiep_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE > '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.FK_DTDOANHNGHIEP_ID = ".$dtdoanhnghiep_id.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                  
  }
  if ($pk_myseft <> null && isset($pk_myseft))
  {
        $array_pktinbai = array();
        if ($sturl <> null) 
            {
                            
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.C_NEW_MYSEFLT = ".$pk_myseft.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE >= '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.C_NEW_MYSEFLT = ".$pk_myseft.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
            }
         else
           { 
                            $sSqlWrk = "(SELECT *,'a1' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE >= '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $sSqlWrk .= " UNION ALL ";
                            $sSqlWrk .= "(SELECT *,'a2' AS TYPE FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_ORDER_MAINSITE < '$active_public') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 5)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
           } 
                          
  }

                           // if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);                          
?>

<div id="divnoidung" style="margin-bottom: 15px;">
                        <?php if ($arwrk[0]['TYPE'] == 'a1') { ?>   <h2 class="h2title"> Tin mới hơn</h2> <?php } ?>
                           <ul class="ulnew">
                             <?php for($k=0;$k<$rowswrk;$k++) {
                          if ( $arwrk[$k]['TYPE'] == 'a1' )
                          {
                               if(in_array($arwrk[$k]['PK_TINBAI_ID'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_TINBAI_ID']);

                                    }  
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                  if ($pk_gioithieu <> null && isset($pk_gioithieu))  
                                  {   
                                      $pk_gioithieu = $arwrk[$k]['FK_DMGIOITHIEU_ID'];
                                      $url = "detailnews.php?sturl=gioithieu&pk_intro=".$pk_gioithieu."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($pk_tuyensinh <> null && isset($pk_tuyensinh))  
                                  {    
                                      $pk_tuyensinh = $arwrk[$k]['FK_DMTUYENSINH_ID'];
                                      $url = "detailnews.php?sturl=tuyensinh&pk_tuyensinh=".$pk_tuyensinh."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];   
                                  } 
                                  if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))
                                  {
                                      $dtsvtuonglai_id = $arwrk[$k]['FK_DTSVTUONGLAI_ID'];
                                      $url ="detailnews.php?sturl=sinhvientuonglai&dtsvtuonglai_id=".$dtsvtuonglai_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id)) 
                                  {
                                      $dtsvdanghoc_id = $arwrk[$k]['FK_DTSVDANGHOC_ID'];
                                      $url ="detailnews.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$dtsvdanghoc_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))  
                                  {
                                      $dtcuusinhvien_id = $arwrk[$k]['FK_DTCUUSV_ID'];
                                      $url ="detailnews.php?sturl=cuusinhvien&dtcuusinhvien_id=".$dtcuusinhvien_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))  
                                  {
                                      $dtdoanhnghiep_id = $arwrk[$k]['FK_DTDOANHNGHIEP_ID'];
                                      $url ="detailnews.php?sturl=cuusinhvien&dtdoanhnghiep_id=".$dtdoanhnghiep_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];
                                  }
                                  if ($pk_myseft <> null && isset($pk_myseft))  $url ="detailnews.php?sturl=hpusukhacbiet&pk_myseft=".$pk_myseft."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];
                                  ?> 
                                <li> <a title="<?php echo "Tin tức từ: " .$arwrk[$k]['C_TENCONGTY'] ?>" class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } 
                             }
                              ?>                          
                           </ul>
                           
                          <?php
                          if ($arwrk[$rowswrk-1]['TYPE'] ==  'a2') { ?>   <h2 class="h2title"> Tin cũ hơn</h2> <?php } ?>
                          <ul class="ulnew">
                             <?php for($k=0;$k<$rowswrk;$k++) {
                          if ( $arwrk[$k]['TYPE'] == 'a2' )
                          {
                               if(in_array($arwrk[$k]['PK_TINBAI_ID'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_TINBAI_ID']);

                                    }  
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                  if ($pk_gioithieu <> null && isset($pk_gioithieu))  
                                  {   
                                      $pk_gioithieu = $arwrk[$k]['FK_DMGIOITHIEU_ID'];
                                      $url = "detailnews.php?sturl=gioithieu&pk_intro=".$pk_gioithieu."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($pk_tuyensinh <> null && isset($pk_tuyensinh))  
                                  {    
                                      $pk_tuyensinh = $arwrk[$k]['FK_DMTUYENSINH_ID'];
                                      $url = "detailnews.php?sturl=tuyensinh&pk_tuyensinh=".$pk_tuyensinh."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];   
                                  } 
                                  if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))
                                  {
                                      $dtsvtuonglai_id = $arwrk[$k]['FK_DTSVTUONGLAI_ID'];
                                      $url ="detailnews.php?sturl=sinhvientuonglai&dtsvtuonglai_id=".$dtsvtuonglai_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id)) 
                                  {
                                      $dtsvdanghoc_id = $arwrk[$k]['FK_DTSVDANGHOC_ID'];
                                      $url ="detailnews.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$dtsvdanghoc_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))  
                                  {
                                      $dtcuusinhvien_id = $arwrk[$k]['FK_DTCUUSV_ID'];
                                      $url ="detailnews.php?sturl=cuusinhvien&dtcuusinhvien_id=".$dtcuusinhvien_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID']; 
                                  }
                                  if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))  
                                  {
                                      $dtdoanhnghiep_id = $arwrk[$k]['FK_DTDOANHNGHIEP_ID'];
                                      $url ="detailnews.php?sturl=cuusinhvien&dtdoanhnghiep_id=".$dtdoanhnghiep_id."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];
                                  }
                                  if ($pk_myseft <> null && isset($pk_myseft))  $url ="detailnews.php?sturl=hpusukhacbiet&pk_myseft=".$pk_myseft."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];
                                  ?> 
                                <li> <a title="<?php echo "Tin tức từ: " .$arwrk[$k]['C_TENCONGTY'] ?>" class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } 
                             }
                              ?>                          
                           </ul>
                     </div>
      
