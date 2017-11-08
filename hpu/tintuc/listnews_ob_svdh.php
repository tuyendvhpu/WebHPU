<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
    <?php
         
            $dtsvdanghoc_id = KillChars(ew_HtmlEncode($_GET['dtsvdanghoc_id']));
           
    ?>
       <div id="contentbody" class="clearfix" style="min-height:465px;">
            <?php
               $keyworld = trim(ew_HtmlEncode($_GET['s']));
                $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
                $rows = 20; // số record trên mỗi trang
                $div = 2; // số trang trên 1 phân đoạn
                $start =  $p*$rows;
                 if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id))
                      {
                        $title = stringname($dtsvdanghoc_id, 'C_NAME', 't_doituong_svdanghoc','DTSVDANGHOC_ID'); 
                      }
    $sql = "SELECT COUNT(*) AS total From t_tinbai_levelsite";
    $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTSVDANGHOC_ID  ='".$dtsvdanghoc_id."')";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0];        
    $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
    $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTSVDANGHOC_ID  ='".$dtsvdanghoc_id."') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
   //  $url = "../tintuc/listnews_ob_svtl.php?sturl=sinhvientuonglai&dtsvtuonglai_id=".$dtsvdanghoc_id;
       $url= "../tintuc/HPUSVDH-".$dtsvdanghoc_id."-sinhviendanghoc.html"; 
  ?>
           
           <table style="width: 100%">
             <tr>
            <td width="57%" style="vertical-align: top">
   <div id='content_listnotice' style="margin:0px 15px 0px 10px;">
       <h2 class="h2thongbao"> <a href="<?php echo $url ?>"> <?php  if ($title == "") $title ="TIN TỨC"; ECHO $title;  ?> </a> </h2>
        
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                  //  $url= "../tintuc/detailnews.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$arwrk[$k]['FK_DTSVDANGHOC_ID']."&PK_TINBAI_ID=".$arwrk[$k]['PK_TINBAI_ID'];     
                                      $url ="../tintuc/HPUSVDHCT-sinhviendanghoc-".$arwrk[$k]['FK_DTSVDANGHOC_ID']."-".$arwrk[$k]['PK_TINBAI_ID']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";
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
                        $sSqlWrk = "SELECT C_BELONGTO FROM t_doituong_svdanghoc";
                        $sWhereWrk = "(t_doituong_svdanghoc.C_ACTIVE = 1) AND (t_doituong_svdanghoc.DTSVDANGHOC_ID = '".$dtsvdanghoc_id."')";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $c_belongto =  $rswrk ->fields['C_BELONGTO'];
                        $sSqlWrk ="";$sWhereWrk ="";
                        $sSqlWrk = "SELECT * FROM t_doituong_svdanghoc";
                        $sWhereWrk = "(t_doituong_svdanghoc.C_ACTIVE = 1) AND (t_doituong_svdanghoc.DTSVDANGHOC_ID  <> '".$dtsvdanghoc_id."') AND (t_doituong_svdanghoc.C_BELONGTO  = '".$c_belongto."')";
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
                        $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DTSVDANGHOC_ID  ='".$arwrk[$j]['DTSVDANGHOC_ID']."') ORDER BY t_tinbai_levelsite.C_ORDER ASC LIMIT 0,6";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rs = $conn->Execute($sSqlWrk);
			$ar = ($rs) ? $rs->GetRows() : array();
			if ($rs) $rs->Close();
			$rows = count($ar); 
                        //$url_tuyensinh = "../tintuc/listnews_ob_svdh.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$arwrk[$j]['DTSVDANGHOC_ID'];
                        $url_tuyensinh= "../tintuc/HPUSVDH-".$arwrk[$j]['DTSVDANGHOC_ID']."-sinhviendanghoc.html"; 
                        ?>
                     <h2 class="h2thongbao" > <a href="<?php echo $url_tuyensinh ?>"> <?php echo $arwrk[$j]['C_NAME']?> </a></h2> 
                       <ul class="ulcontents1">
                               <?php 
                        for ($x=0;$x<$rows;$x++)
                              {
                           // $url= "../tintuc/detailnews.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$arwrk[$j]['DTSVDANGHOC_ID']."&PK_TINBAI_ID=".$ar[$x]['PK_TINBAI_ID'];   
                            $url ="../tintuc/HPUSVDHCT-sinhviendanghoc-".$arwrk[$j]['DTSVDANGHOC_ID']."-".$ar[$x]['PK_TINBAI_ID']."-".changeTitle($ar[$x]['C_TITLE']).".html";
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