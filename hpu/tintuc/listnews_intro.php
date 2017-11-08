<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
    <?php
            $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
           $rows = 12; // số record trên mỗi trang
           $div = 10; // số trang trên 1 phân đoạn
           $start =  $p*$rows;
           
            $pk_gioithieu = KillChars(ew_HtmlEncode($_GET['pk_intro']));
         
    ?>
       <div id="contentbody" class="clearfix">
         <div id="contentheader">
               <div>
            <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                 <h2 class="h2title-detail"><?php echo stringname(KillChars(ew_HtmlEncode($_GET['pk_intro'])), 'C_NAME', 't_danhmucgioithieu','PK_DANHMUCGIOITHIEU') ?></h2>
            </div>
            <table class="tablechitietbaiviet">
               <tr>
                   <td class="col2">
                              <h2 class="h2title">&nbsp; <span class="pdatetime"><?php echo $timenow; ?> <img src="../images/index/img_printer.jpg" /></span></h2>
                             <div id="divcontents">
                              <ul class="ulcontentsdaotao">
                            <?PHP
                           // tin lien quan gioithieu 
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
                                                // $url_parent= "detailnews.php?sturl=gioithieu&pk_intro=".$pk_gioithieu."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID'];    
                                                 $url_parent ="../tintuc/HPUGTTT-".$pk_gioithieu."-".$ar[$j]['PK_TINBAI_ID']."-".changeTitle($ar[$j]['C_TITLE']).".html";
                                        ?>
                                        <li> <b> <a href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TITLE'] ?> </a> </b>
                                                 <div class="divsumary">  <?php echo ew_TruncateMemo($ar[$j]['C_SUMARY'], 400, "ul,li")?></div>
                                                 <div class="divclear"></div>
                                        </li>
                                            <?php } 
                                        }   
                            }
                            
                        
                            
                            ?>         
                           </ul>  
                              <ul class="trang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>   
                              </div>
                   </td> 
                    <td class="col1">
                    <?php include "../include/left_intro.php" ?>
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