<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
    <?php
            $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
           $rows = 10; // số record trên mỗi trang
           $div = 10; // số trang trên 1 phân đoạn
           $start =  $p*$rows;
           
           $pk_gioithieu = KillChars(ew_HtmlEncode($_GET['pk_intro']));
           if ($pk_gioithieu <> null && isset($pk_gioithieu)) {$title = stringname(KillChars(ew_HtmlEncode($_GET['pk_intro'])), 'C_NAME', 't_danhmucgioithieu','PK_DANHMUCGIOITHIEU'); }
           $sukhacbiet_id = KillChars(ew_HtmlEncode($_GET['pk_myseft']));
            if ($sukhacbiet_id <> null && isset($sukhacbiet_id)) {$title = "HPU SỰ KHÁC BIỆT"; }
            else $title = "TIN TỨC TỔNG HỢP"; 
           $sturl = KillChars(ew_HtmlEncode($_GET['sturl']));
           
    ?>
       <div id="contentbody" class="clearfix">
     
         <div id="contentheader">
                   <BR/>
               <div>
            <table class="tablechitietbaiviet">
               <tr>
                  
                   <td class="col2">
                              <h2 class="h2title"><?php echo $title ?> <span class="pdatetime"><?php echo $timenow; ?> <img src="../images/index/img_printer.jpg" /></span></h2>
                             <div id="divcontents1">
                              <ul class="ulcontentsdaotao">
                            <?PHP
                           // tin lien quna gioithieu 
                           if ($pk_gioithieu <> null && isset($pk_gioithieu))
                           {
                                        $sql = "SELECT COUNT(*) AS total From t_tinbai_levelsite";
                                        $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DMGIOITHIEU_ID  ='".$pk_gioithieu."')";
                                        if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
                                        $rswrk = $conn->Execute($sql);
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        $total = $arwrk[0][0];    
                                        $sSql ="";$sWhere ="";
                                        $sSql = "SELECT * FROM t_tinbai_levelsite";
                                        $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.FK_DMGIOITHIEU_ID  ='".$pk_gioithieu."') ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT $start,$rows";
                                        if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                                        $rs = $conn->Execute($sSql);
                                        $ar = ($rs) ? $rs->GetRows() : array();
                                        if ($rs) $rs->Close();
                                        $rows = count($ar);
                                        if ($rows >0)
                                        {
                                    for ($j=0;$j<$rows;$j++)
                                        { 
                                                $url_parent= "detailnews.php?sturl=gioithieu&pk_intro=".$pk_gioithieu."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID'];     
                                        ?>
                                    <li> <b> <a href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TITLE'] ?> </a> </b>
                                               <div class="divsumary">  <?php echo ew_TruncateMemo($ar[$j]['C_SUMARY'], 500, "ul,li")?></div>
                                         </li
                                            <?php } 
                                        }   
                            }
                            
                           // tin hpu su khac biet
                           if ($sukhacbiet_id <> null && isset($sukhacbiet_id))
                           {
                                        $sql = "SELECT COUNT(*) AS total From t_tinbai_levelsite";
                                        $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_NEW_MYSEFLT  ='".$sukhacbiet_id."')";
                                        if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
                                        $rswrk = $conn->Execute($sql);
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        $total = $arwrk[0][0];   
                                       $nPage_end = floor($total/$rows) + (($total%$rows)?1:0);
                                        $sSql ="";$sWhere ="";
                                        $sSql = "SELECT  t_tinbai_levelsite.*, t_congty.C_TENCONGTY From t_tinbai_levelsite,t_congty";
                                        $sWhere = "(t_tinbai_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY) AND (t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND (t_tinbai_levelsite.C_NEW_MYSEFLT  ='".$sukhacbiet_id."') ORDER BY C_TIME_ACTIVE_MAINSITE DESC LIMIT $start,$rows";
                                        if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                                        $rs = $conn->Execute($sSql);
                                        $ar = ($rs) ? $rs->GetRows() : array();
                                        if ($rs) $rs->Close();
                                        $rows = count($ar);
                                        if ($rows >0)
                                        {
                                    for ($j=0;$j<$rows;$j++)
                                        { 
                                               //  $url_parent= "detailnews.php?sturl=hpusukhacbiet&pk_myseft=".$sukhacbiet_id."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID']; 
                                                 $url_parent= "../tintuc/HPUCTSKB-hpusukhacbiet-".$sukhacbiet_id."-".$ar[$j]['PK_TINBAI_ID']."-".changeTitle($ar[$j]['C_TITLE']).".html"; 
                                                 // kiểm tra file Anh
                                                $file = $ar[$j]['C_PIC_MYSEFLT'];
                                                $file_headers = @get_headers($file);
                                                if($file_headers[0] == 'HTTP/1.1 404 Not Found')
                                                { $img ="../images/khoa/hpu.jpg" ;}
                                                else 
                                                { $img = $ar[$j]['C_PIC_MYSEFLT']; }
                                        ?>
                                               <li> <b> <a href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TITLE'] ?> </a> </b>
                                                   <div> <span class="datimelisst" class="datetime" style=""><?php echo $ar[$j]['C_TENCONGTY'] ?> - Thời gian : <?php echo date( 'j/m/Y H:i:s',strtotime($ar[$j]['C_TIME_ACTIVE_MAINSITE'])) ?> </span></div>
                                               <div class="divsumary">  
                                                   <img class="imglistnew" src="<?php echo $img ?>" alt="Haiphong Private University" />
                                                   <?php echo ew_TruncateMemo($ar[$j]['C_SUMARY'], 400, "ul,li")?></div>
                                                   <div class="divclear"></div>
                                                </li>
                                            <?php } 
                                        }   
                            }
                            
                             // tin tuc hpu 
                           if ($sturl == 'tintuc')
                           {
                                        $sql = "SELECT COUNT(*) AS total From t_tinbai_levelsite";
                                        $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1)";
                                        if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
                                        $rswrk = $conn->Execute($sql);
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        $total = $arwrk[0][0];    
                                        $sSql ="";$sWhere ="";
                                        $sSql = "SELECT  t_tinbai_levelsite.*, t_congty.C_TENCONGTY From t_tinbai_levelsite,t_congty";
                                        $sWhere = "(t_tinbai_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY) AND (t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT $start,$rows";
                                        if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                                        $rs = $conn->Execute($sSql);
                                        $nPage_end = floor($total/$rows) + (($total%$rows)?1:0);
                                        $ar = ($rs) ? $rs->GetRows() : array();
                                        if ($rs) $rs->Close();
                                        $rows = count($ar);
                                        if ($rows >0)
                                        {
                                    for ($j=0;$j<$rows;$j++)
                                        { 
                                             //$url_parent= "detailnews.php?sturl=HPUTT&pk_myseft=1&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID'];     
                                             $url_parent ="../tintuc/HPUTT-1-".$ar[$j]['PK_TINBAI_ID']."-".changeTitle($ar[$j]['C_TITLE']).".html";
                                        ?>
                                                <li><b> <a href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TITLE'] ?> </a> </b>
                                                   <div>  <span class="datimelisst"> Nguồn: <?php echo $ar[$j]['C_TENCONGTY'] ?> - Thời gian : <?php echo date( 'j/m/Y H:i:s',strtotime($ar[$j]['C_ORDER_MAINSITE'])) ?> </span> </div>
                                                 <div class="divsumary">  
                                                   <img class="imglistnew" src="<?php echo catch_that_image($ar[$j]['C_CONTENTS']) ?>" alt="Haiphong Private University" />
                                                   <?php echo ew_TruncateMemo($ar[$j]['C_SUMARY'], 400, "ul,li")?></div>
                                                   <div class="divclear"></div>
                                                </li>
                                      
                                            <?php } 
                                        }   
                            }
                            
                            ?>         
                           </ul>  
                              <ul class="trang"><?php  echo divPagehome($total,$p,$div,$rows,$keyworld,$nPage_end); ?></ul>   
                              </div>
                   </td> 
                   <td class="col3">
                     <?php include "../include/right_intro.php" ?>
                   </td> 
               </tr>
            
            </table>
         
         </div>
      <div class="clearBoth"></div>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>