<?php include "../include/header.php" ?>

<body>
<div id="wrapper">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
     <div id="contentbody" class="clearfix" style="min-height:465px;">
         <div id="contentheader">
                  <?php include "newshit_tuyensinh.php" ?> 
          <!-- content heder --></div>
          <table id="tablecontentbody">
               <tr>
                   <?PHP
                   $conn = ew_Connect();
                    $sSqlWrk = "Select PK_DANHMUCTUYENSINH,C_NAME,C_ACTIVE,C_ORDER From t_danhmuctuyensinh ";
                    $sWhereWrk = "(t_danhmuctuyensinh.C_ACTIVE = 1) ORDER BY C_ORDER ASC  limit 0,4 ";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    $rswrk = $conn->Execute($sSqlWrk);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close(); 
                    for ($i=0;$i<count($arwrk);$i++)
                    { 
                           $url_tuyensinh= "../tintuc/HPUtuyensinh-".$arwrk[$i]['PK_DANHMUCTUYENSINH']."-tuyensinh.html"; 
                   ?>
                    <td style="width:25%;vertical-align:top">
                        <p class="ptextheader"> <A href="<?php echo $url_tuyensinh ?>"> <?PHP ECHO $arwrk[$i]['C_NAME'] ?> </A> </p>
                        <ul id="ultintuc">
                            <?php 
                            $sSql = "SELECT * FROM t_tinbai_levelsite";
                            $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.FK_DMTUYENSINH_ID  ='".$arwrk[$i]['PK_DANHMUCTUYENSINH']."') ORDER BY C_ORDER_MAINSITE DESC limit 0,4";
                            if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                            $rs = $conn->Execute($sSql);
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $rows = count($ar);
                            if ($rows >0)
                            {
                               for ($j=0;$j<$rows;$j++)
                               { 
                                // $url_pk= "../tintuc/detailnews.php?sturl=tuyensinh&pk_tuyensinh=".$ar[$j]['FK_DMTUYENSINH_ID']."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID'];   
                                 $url_pk ="../tintuc/HPUTSCT-".$ar[$j]['FK_DMTUYENSINH_ID']."-".$ar[$j]['PK_TINBAI_ID']."-".changeTitle($ar[$j]['C_TITLE']).".html";
                            ?>
                             <li> <a href="<?php echo $url_pk ?>"> <?php echo $ar[$j]['C_TITLE'] ?> </a></li>
                            <?php 
                               }
                            }
                            ?>
                        </ul>
                   </td>
                    <?php } ?>   
                   
                  
               </tr>
          
          </table>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
     <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>