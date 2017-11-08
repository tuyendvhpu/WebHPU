<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
         <div >
            <div id="titlepages" style="margin:0px 7px 5px 7px;">
                 <h2 class="h2title-detail">THÔNG BÁO</h2>
            </div>
            
            <table class="tablechitietbaiviet">
               <tr>
                  
                   <td class="col2">
                       <?php 
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                            $sWhereWrk = "(t_thongbao_levelsite.C_ACTIVE=1) AND (t_thongbao_levelsite.PK_THONGBAO='".ew_HtmlEncode(KillChars($_GET['PK_THONGBAO']))."')";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rs = $conn->Execute($sSqlWrk);
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $row = count($ar);
                       ?>
                         <h2 class="h2title_thongbao"> Thời gian: từ <?php echo date( 'j/m/Y',strtotime($ar[0]['C_BEGIN_DATE'])) ?> - <?php echo  date( 'j/m/Y',strtotime($ar[0]['C_END_DATE'])) ?>    <span class="pdatetime"> <?php echo $timenow; ?> <img src="../images/index/img_printer.jpg" /></span> </h2>
                        <h2 class="h2title_report" >  <?php echo $ar[0]['C_TITLE'] ?> </h2>
                             <div id="divcontents">
                                <?php echo $ar[0]['C_CONTENT']?>  
                             </div>
                   
                   </td> 
                    <td class="col1">
                     <div id="divnoidung">
                            <h2 class="h2title"> Thông báo chung </h2>
                         
                           <ul class="ulcontents1">
                              <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = 119) AND (C_NOTICE_HIT = 1) ORDER BY C_ORDER DESC LIMIT 0,15";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                        $url = "../thongbao/ctthongbao.php?PK_THONGBAO=".$ar[$j]["PK_THONGBAO"];
                                 ?>
                                    <li>  <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a>  </li>  
                                 <?php } ?>         
                           </ul>  
                     </div>
                   </td> 
                   <td class="col3">
                <?php
                $conn = ew_Connect();
                   $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_nganhnghe";
                            $sWhereWrk = "(C_TRANGTHAI = 1) AND  (PK_NGANH_ID NOT IN (90,88))";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                             for ($i=0;$i<$rowswrk;$i++)
                            { 
                
                ?>      
                      <h2 class="h2title">Thông báo từ <?php echo $arwrk [$i]['C_TENNGANH']?> </h2>
                      <ul class="ulcontents1">
                            <?PHP
                            $sSql ="";$sWhere ="";
                            $sSql = "SELECT * FROM t_congty";
                            $sWhere = "FK_NGANH_ID =".$arwrk [$i]['PK_NGANH_ID']." AND (C_REPORT_STATUS <> 1)";
                            if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                            $rs = $conn->Execute($sSql);
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $rows = count($ar);
                              for ($j=0;$j<$rows;$j++)
                               { 
                                    $url_parent= Get_path_parent($ar[$j]['PK_MACONGTY']);     
                            ?>
                             <li> <a href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TENCONGTY']  ?></a> </li>
                             <?php } ?>
                          
                           </ul>
                           <?php } ?>
                   </td> 
               </tr>
            
            </table>
         
         </div>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>