<?php
 $sSqlWrk = "SELECT t_tinbai_mainlevel.PK_TINBAI_ID,
       t_tinbai_mainlevel.FK_CHUYENMUC_ID,
       t_tinbai_mainlevel.FK_DOITUONG_ID,
       t_tinbai_levelsite.C_TITLE,
       t_tinbai_levelsite.C_ACTIVE,
       t_tinbai_levelsite.C_ORDER AS C_ORDER,
       t_tinbai_mainlevel.FK_CONGTY AS FK_CONGTY,
       t_tinbai_mainlevel.C_FILEANH as C_FILEANH,
       t_tinbai_mainlevel.C_HITS,
       t_nguoidung.C_HOTEN, 
       t_tinbai_levelsite.C_ADD_TIME,
       t_congty.C_TENCONGTY,
       'Tin bài' AS TYPE 
       FROM t_tinbai_mainlevel INNER JOIN t_tinbai_levelsite ON t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID INNER JOIN t_nguoidung ON (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
       Inner Join t_congty On t_tinbai_mainlevel.FK_CONGTY = t_congty.PK_MACONGTY";
                            $sWhereWrk = "(t_tinbai_mainlevel.C_HITS= '1') AND (t_tinbai_mainlevel.FK_CONGTY IN ".$_SESSION['FK_CONGTY_EX'].") AND (t_tinbai_levelsite.C_ACTIVE=1) ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 7";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
?>                       
 <script type="text/javascript" language="javascript">
  $(window).scroll(function(){
    t = parseInt($(window).scrollTop());
   if (t<4000)
   {
   if ((t>630))
     { t = parseInt($(window).scrollTop())-140; }  
    else { t = 0; }
   $('.adv').stop().animate({marginTop:t},0);
   }
})
  </script>
<div class="adv">
                        <h2 class="h2title"> Tin nổi bật </h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) {
                                 $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                 $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                 $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                 $url ="Khoiphongchitiettintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                        <li> <a title="<?php echo "Tin tức từ: " .$arwrk[$k]['C_TENCONGTY'] ?>" class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>    
                      </ul>
                           <h2 class="h2title"> Thông báo nổi bật</h2>
                           
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
                        $sWhereWrk = "(t_thongbao_levelsite.C_NOTICE_HIT = 1) AND (t_thongbao_levelsite.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY_EX'].") AND ( t_thongbao_levelsite.C_ACTIVE=1) LIMIT 7";
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
                                   $url ="Khoiphongchitietthongbao-".$arwrk[$k]['PK_THONGBAO']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$k]['C_TITLE']).".html";
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>   
                     </ul>
  </div>                       