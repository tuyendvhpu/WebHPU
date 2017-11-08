<?php   
    $string_string_pk ="";
for($k=0;$k<count($array_pktinbai);$k++) {
                            $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                        } 
$string_string_pk = "(".substr($string_string_pk,1).")"; 
	                    $sSqlWrk = "Select * From t_thongbao_levelsite";
                            $sWhereWrk = "(t_thongbao_levelsite.PK_THONGBAO NOT IN ".$string_string_pk." ) AND (('".ew_CurrentDateTime()."'  BETWEEN t_thongbao_levelsite.C_BEGIN_DATE AND  t_thongbao_levelsite.C_END_DATE) OR ('".ew_CurrentDateTime()."' < t_thongbao_levelsite.C_BEGIN_DATE)) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (t_thongbao_levelsite.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_levelsite.C_ORDER DESC LIMIT 5";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
?>                       
    

<div class="adv">
                        <h2 class="h2title"> Thông báo khoa </h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   if(in_array($arwrk[$k]['PK_THONGBAO'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_THONGBAO']);

                                    }  
                                   $url ="NNthongbao-".$arwrk[$k]['PK_THONGBAO']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>    
                      </ul>
                           <h2 class="h2title"> Thông báo chung</h2>
                    <ul class="ulcontents1">
                             <?php 
                            $string_string_pk ="";
                            for($k=0;$k<count($array_pktinbai);$k++) {
                                                        $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                                                    } 
                            $string_string_pk = "(".substr($string_string_pk,1).")"; 
                             $today = date ( 'Y-m-j' ,strtotime (ew_CurrentDateTime()));
                            // 90 Ban website
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "FK_NGANH_ID = 90";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            {
                         ?> 
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.PK_THONGBAO NOT IN ".$string_string_pk." ) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,5";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                     $url = "http://hpu.edu.vn/thongbao/ctthongbao.php?PK_THONGBAO=".$ar[$j]["PK_THONGBAO"];
                                 ?>
                             <li> <a target="_blank" href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> </li>
                                 <?php } ?>
                          <?php } ?>
                     </ul>
  </div>                       