<?php include "../include/header.php" ?>

<body>
<div id="wrapper">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
         <div id="contentheader">
                  <?php include "newshit_svdh.php" ?> 
          <!-- content heder --></div>
          <table id="tablecontentbody">
               <table id="tablecontentbody">
               <tr>
                   <?PHP
                   $conn = ew_Connect();
                    $sSqlWrk = "Select DTSVDANGHOC_ID,C_NAME,C_ACTIVE,C_URL,C_TYPE From t_doituong_svdanghoc";
                    $sWhereWrk = "(t_doituong_svdanghoc.C_ACTIVE = 1) AND (t_doituong_svdanghoc.C_BELONGTO = 0) limit 0,4";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    $rswrk = $conn->Execute($sSqlWrk);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close(); 
                    for ($i=0;$i<count($arwrk);$i++)
                    { 
                           $url= "../tintuc/listnews.php?sturl=tuyensinh&pk_intro=".$arwrk[$i]['DTSVDANGHOC_ID']; 
                   ?>
                    <td style="width:25%;vertical-align:top">
                       <p class="ptextheader"> <?PHP ECHO $arwrk[$i]['C_NAME'] ?> </p>
                         <ul id="ulchuyenmuc">
                             <?php
                            $sWhereWrk ="";
                            $sSqlWrk = "Select DTSVDANGHOC_ID,C_NAME,C_ACTIVE,C_URL,C_TYPE From t_doituong_svdanghoc";
                            $sWhereWrk = "(t_doituong_svdanghoc.C_ACTIVE = 1) AND (t_doituong_svdanghoc.C_BELONGTO = ".$arwrk[$i]['DTSVDANGHOC_ID'].") limit 0,5";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rs = $conn->Execute($sSqlWrk);
 
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $rows = count($ar);
                            if ($rows >0)
                            {
                               for ($j=0;$j<$rows;$j++)
                               { 
                                   switch ($ar[$j]['C_TYPE']) {
                                     case 0:
                                        $url_pk= "../tintuc/detailnews.php?sturl=sinhviendanghoc&dtsvdanghoc_id=".$ar[$j]['DTSVDANGHOC_ID']."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID'];
                                        $taget_blank = "";
                                        break;
                                     case 1:
                                        $url_pk= "../tintuc/HPUSVDH-".$ar[$j]['DTSVDANGHOC_ID']."-sinhviendanghoc.html"; 
                                        $taget_blank = "";
                                        break;
                                     case 2:
                                        $url_pk= $ar[$j]['C_URL']; 
                                        $taget_blank = "target=\"_blank\"";
                                        break;
                                   }
                             ?>
                              <li> <a <?php echo $taget_blank ?> href="<?php echo $url_pk ?>"> >> <?php echo $ar[$j]['C_NAME'] ?> </a></li>
                              <?php 
                               }
                            }
                            ?>
                        </ul>
                       
                   </td>
                    <?php } ?>   
                   
                  
               </tr>
          
          </table>
          
          </table>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
     <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>