<div class="adv">  
 <?php 
 // xác đinh pk tin bài nổi bật
                 $sSqlWrk = "SELECT t_thongbao_levelsite.PK_THONGBAO,
                        t_thongbao_levelsite.PK_CHUYENMUC_ID,
                        t_thongbao_levelsite.FK_DOITUONG_ID,
                        t_thongbao_levelsite.C_TITLE,
                        t_thongbao_levelsite.C_ACTIVE,
                        t_thongbao_levelsite.C_ORDER AS C_ORDER,
                        t_thongbao_levelsite.FK_CONGTY_ID AS FK_CONGTY,
                        t_thongbao_levelsite.C_FILEANH as C_FILEANH,
                        t_thongbao_levelsite.C_NOTICE_HIT,
                        t_nguoidung.C_HOTEN,
                        t_thongbao_levelsite.C_ADD_TIME,
                        t_congty.C_TENCONGTY,
                        'Thông báo' AS TYPE 
                        FROM t_thongbao_levelsite INNER JOIN t_nguoidung ON (t_thongbao_levelsite.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                        Inner Join t_congty On t_thongbao_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY";
                     $sWhereWrk = "(t_thongbao_levelsite.C_NOTICE_HIT=1) AND (t_thongbao_levelsite.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY_EX'].") AND ( t_thongbao_levelsite.C_ACTIVE=1) LIMIT 7";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for($k=0;$k<$rowswrk;$k++) { 
                                   $string_pk_thongbao =  $string_pk_thongbao.",".$arwrk[$k]['PK_THONGBAO'];
                            }
                            $string_pk_thongbao = "(".substr($string_pk_thongbao,1).")"; 
                            $sSqlWrk ="";
?>    
                            
 <?php
                $sSqlWrk = "SELECT t_thongbao_levelsite.PK_THONGBAO,
                        t_thongbao_levelsite.PK_CHUYENMUC_ID,
                        t_thongbao_levelsite.FK_DOITUONG_ID,
                        t_thongbao_levelsite.C_TITLE,
                        t_thongbao_levelsite.C_ACTIVE,
                        t_thongbao_levelsite.C_ORDER AS C_ORDER,
                        t_thongbao_levelsite.FK_CONGTY_ID AS FK_CONGTY,
                        t_thongbao_levelsite.C_FILEANH as C_FILEANH,
                        t_thongbao_levelsite.C_NOTICE_HIT,
                        t_nguoidung.C_HOTEN,
                        t_thongbao_levelsite.C_ADD_TIME,
                        t_congty.C_TENCONGTY,
                        'Thông báo' AS TYPE 
                        FROM t_thongbao_levelsite INNER JOIN t_nguoidung ON (t_thongbao_levelsite.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                        Inner Join t_congty On t_thongbao_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY";
                        $sWhereWrk = "(t_thongbao_levelsite.PK_THONGBAO NOT IN ".$string_pk_thongbao.") AND (t_thongbao_levelsite.C_KEYWORD LIKE '%".$keyworld."%') AND (t_thongbao_levelsite.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY_EX'].") AND ( t_thongbao_levelsite.C_ACTIVE=1) ORDER BY C_ORDER DESC LIMIT 10";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
?>                  <h2 class="h2title"> Thông báo liên quan</h2>       
                    <ul class="ulcontents1">
                           <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['PK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                   $url ="Khoibanchitietthongbao-".$arwrk[$k]['PK_THONGBAO']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$k]['C_TITLE']).".html";
                                  ?> 
                             <li> <a title="<?php echo "THông báo từ: " .$arwrk[$k]['C_TENCONGTY'] ?>" class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>   
                     </ul>
    
  </div>                       