<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
    <?php
         
            $dtcuusinhvien_id = KillChars(ew_HtmlEncode($_GET['dtcuusinhvien_id']));
           
    ?>
       <div id="contentbody" class="clearfix" style="min-height:465px;">
           <?php
               $keyworld = trim(ew_HtmlEncode($_GET['s']));
                $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
                $rows = 20; // số record trên mỗi trang
                $div = 2; // số trang trên 1 phân đoạn
                $start =  $p*$rows;
                 if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))
                      {
                        $title = stringname($dtcuusinhvien_id, 'C_NAME', 't_doituong_cuusv','DTCUUSV_ID'); 
                      }
    $sql = "SELECT COUNT(*) AS total From t_tinbai_levelsite";
    $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTCUUSV_ID  ='".$dtcuusinhvien_id."')";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0];        
    $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
    $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTCUUSV_ID  ='".$dtcuusinhvien_id."') ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
   // $url = "../tintuc/listnews_ob_svtl.php?sturl=sinhvientuonglai&dtsvtuonglai_id=".$dtsvtuonglai_id;
    $url= "../tintuc/HPUCSV-".$dtcuusinhvien_id."-cuusinhvien.html"; 
  ?>
           
           <table style="width: 100%">
             <tr>
            <td width="57%" style="vertical-align: top">
   <div id='content_listnotice' style="margin:0px 15px 0px 10px;">
       <h2 class="h2thongbao"> <a href="<?php echo $url ?>"> <?php  if ($title == "") $title ="TIN TỨC"; ECHO $title;  ?> </a> </h2>
        
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   // $url= "../tintuc/detailnews.php?sturl=cuusinhvien&dtcuusinhvien_id=".$arwrk[$k]['FK_DTCUUSV_ID']."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];  
                                     $url ="../tintuc/HPUCSVCT-cuusinhvien-".$arwrk[$k]['FK_DTCUUSV_ID']."-".$arwrk[$k]['PK_TINBAI_ID']."-".changeTitle($arwrk[$k]['C_TITLE']).".html"; 
                                  ?> 
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?>
                                     <br>
                                     <span class="datetime"> BWS - Thời gian:  <?php echo  date( 'j/m/Y',strtotime($arwrk[$k]['C_ADD_TIME'])) ?> </span>
                                 </a> 
                             </li>    
                              <?php } ?>    
                      </ul>
                       <ul class="trang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>  
                          
</div>   
                     
                 </td>
                 <td width="42%" style="vertical-align: top">
                    
                    <?php 
                        $sSqlWrk = "SELECT C_BELONGTO FROM t_doituong_cuusv";
                        $sWhereWrk = "(t_doituong_cuusv.C_ACTIVE = 1) AND (t_doituong_cuusv.DTCUUSV_ID = '".$dtcuusinhvien_id."')";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $c_belongto =  $rswrk ->fields['C_BELONGTO'];
                        $sSqlWrk ="";$sWhereWrk ="";
                        $sSqlWrk = "SELECT * FROM t_doituong_cuusv";
                        $sWhereWrk = "(t_doituong_cuusv.C_ACTIVE = 1) AND (t_doituong_cuusv.DTCUUSV_ID  <> '".$dtcuusinhvien_id."') AND (t_doituong_cuusv.C_BELONGTO  = '".$c_belongto."')";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                        if ($rswrk) $rswrk->Close();
                        $rowswrk = count($arwrk);
                        For ($j=0;$j< $rowswrk;$j++)
                         { 
                    ?> 
                     
                           <?php  
                        $target ="";$url="";
                        $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
                        $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTCUUSV_ID  ='".$arwrk[$j]['DTCUUSV_ID']."') ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT 0,10";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rs = $conn->Execute($sSqlWrk);
			$ar = ($rs) ? $rs->GetRows() : array();
			if ($rs) $rs->Close();
			$rows = count($ar); 
                        //$url_tuyensinh = "../tintuc/listnews_ob_csv.php?sturl=cuusinhvien&dtcuusinhvien_id=".$arwrk[$j]['DTCUUSV_ID'];
                         $url_tuyensinh= "../tintuc/HPUCSV-".$arwrk[$j]['DTCUUSV_ID']."-cuusinhvien.html"; 
                        ?>
                     <h2 class="h2thongbao" > <a href="<?php echo $url_tuyensinh ?>"> <?php echo $arwrk[$j]['C_NAME']?> </a></h2> 
                       <ul class="ulcontents1">
                               <?php 
                        for ($x=0;$x<$rows;$x++)
                              {
                            //$url= "../tintuc/detailnews.php?sturl=cuusinhvien&dtcuusinhvien_id=".$arwrk[$j]['DTCUUSV_ID']."&PK_TINBAI_ID=".$ar[$x]['PK_TINBAI_ID'];    
                            $url ="../tintuc/HPUCSVCT-cuusinhvien-".$arwrk[$j]['DTCUUSV_ID']."-".$ar[$x]['PK_TINBAI_ID']."-".changeTitle($ar[$x]['C_TITLE']).".html"; 
                            ?>
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url?>">  <?php echo $ar[$x]['C_TITLE']  ?>  
                                     <br> 
                                 </a> 
                             </li>  
                            <?php
                               }
                                ?>
<!--                             <li class="lienddt" ><a href="<?php// echo $url_xemthem ?>"> <I>  Xem thêm...</I></span></a></li>-->
                          </ul>
                     <?php } ?>
                 </td>
             </tr>
         </table>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>