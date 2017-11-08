<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
           <div id="contentbody" class="clearfix">
           <div id="thongbao">
              <table id="tablethongbao">
                   <tr>
                        <td class="col1">
      <?php 
      
      			$conn = ew_Connect();
                        $today = date ( 'Y-m-j' ,strtotime (ew_CurrentDateTime()));
      ?>
                            <h2 class="h2thongbao"><a href="../thongbao/HPUTBC-thongbao.html">THÔNG BÁO CHUNG </a></h2>
                            <?php 
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
                                    $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,7";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                    // $url = "../thongbao/ctthongbao.php?PK_THONGBAO=".$ar[$j]["PK_THONGBAO"];
                                     $url ="../thongbao/HPUCTTB-".$ar[$j]["PK_THONGBAO"]."-".changeTitle($ar[$j]["C_TITLE"]).".html";
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/><span class="spandate"> Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời gian: từ <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> đến <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </span></p>
                                 <?php } ?>
                          <?php } ?>
                   
                           <h2 class="h2thongbao"><a href="../gioithieu/HPUGT-gioithieu-2.html">THÔNG BÁO TỪ KHOA </a></h2>
                         <?php 
                            // 52 xác đinh các các đơn vị đào tạo
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "FK_NGANH_ID = 52";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            { 
                               $url_parent= Get_path_parent($arwrk [$i]['PK_MACONGTY']);     
                         ?>
                           <h2 class="h2tb"> <a href="<?php echo $url_parent ?>"><?php echo $arwrk [$i]['C_TENCONGTY']?> </a></h2>
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,5";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                      $url = Get_path ($arwrk [$i]['PK_MACONGTY'],$ar[$j]['PK_THONGBAO'],$ar[$j]['C_TITLE']);   
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/><span class="spandate"> Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời gian: từ <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> đến <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </span></p>
                                 <?php } ?>
                          <?php } ?>
                           
                        </td>
                        <td class="col2">
                            <h2 class="h2thongbao"><a href="../kpb/Khoiphongthongbao.html">THÔNG BÁO KHỐI CÁC PHÒNG </a></h2>
                           
                            <?php 
                            // 55 xác đinh các các đơn vị đào tạo
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "(FK_NGANH_ID = 55) AND (C_PARRENT <> -1) ORDER BY PK_MACONGTY ASC";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            {
                              $url_parent= Get_path_parent($arwrk [$i]['PK_MACONGTY']);     
                         ?>
                             <h2 class="h2tb"> <a href="<?php echo $url_parent ?>"><?php echo $arwrk [$i]['C_TENCONGTY']?> </a></h2>
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    if ($arwrk [$i]['PK_MACONGTY'] == 151)
                                     { $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,7";}
                                    else
                                     { $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,3";}
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                         $obid= $ar[$j]['FK_DOITUONG_ID']; if ($obid == null) $obid = 0;
                                         $subid=  $ar[$j]['PK_CHUYENMUC_ID']; if ($subid == null) $subid = 0;
                                         $url = Get_path ($arwrk [$i]['PK_MACONGTY'],$ar[$j]['PK_THONGBAO'],$ar[$j]['C_TITLE'],$obid,$subid);
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/><span class="spandate"> Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời hạn:Từ: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> Đến:  <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </span> </p>
                                 <?php } ?>
                          <?php } ?>
                                
                                <h2 class="h2thongbao"> <a href="../tv/TT-Thongtin-Thuvienthongbao.html">THÔNG BÁO TỪ TRUNG TÂM </a></h2>
                            <?php 
                            // 91 NGÀNH NGHỀ TRUNG TÂM
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "(FK_NGANH_ID = 91)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            {
                                $url_parent= Get_path_parent($arwrk [$i]['PK_MACONGTY']);     
                         ?>
                           <h2 class="h2tb"><a href="../tv/TT-Thongtin-Thuvienthongbao.html"> <?php echo $arwrk [$i]['C_TENCONGTY']?> </a></h2>
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,3";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                    $obid= $ar[$j]['FK_DOITUONG_ID']; if ($obid == null) $obid = 0;
                                    $subid=  $ar[$j]['PK_CHUYENMUC_ID']; if ($subid == null) $subid = 0;
                                    $url = Get_path ($arwrk [$i]['PK_MACONGTY'],$ar[$j]['PK_THONGBAO'],$ar[$j]['C_TITLE'],$obid,$subid);
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/> <span class="spandate"> Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời hạn:Từ: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> Đến:  <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </span> </p>
                                 <?php } ?>
                          <?php } ?>        
                                
                                <h2 class="h2thongbao"><a href="../kb/Khoibanthongbao.html">THÔNG BÁO KHỐI CÁC BAN </a></h2>
                           
                            <?php 
                            // 92 Xác định khối các ban
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "(FK_NGANH_ID = 92) AND (C_PARRENT <> -1)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            {
                             $url_parent= Get_path_parent($arwrk [$i]['PK_MACONGTY']);     
                         ?>
                            <h2 class="h2tb"> <a href="<?php echo $url_parent ?>"><?php echo $arwrk [$i]['C_TENCONGTY']?> </a></h2>
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,3";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                         $obid= $ar[$j]['FK_DOITUONG_ID']; if ($obid == null) $obid = 0;
                                         $subid=  $ar[$j]['PK_CHUYENMUC_ID']; if ($subid == null) $subid = 0;
                                         $url = Get_path ($arwrk [$i]['PK_MACONGTY'],$ar[$j]['PK_THONGBAO'],$ar[$j]['C_TITLE'],$obid,$subid); 
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/><span class="spandate"> Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời gian: từ: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> đến:  <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </span></p>
                                 <?php } ?>
                          <?php } ?>                                  
                           <h2 class="h2thongbao"><a href="../dt/Doanthethongbao.html"> THÔNG BÁO TỪ ĐOÀN THỂ </a></h2>
                            <?php 
                            // 92 Xác định khối các ban
                            $sSqlWrk ="";$sWhereWrk ="";
                            $sSqlWrk = "SELECT * FROM t_congty";
                            $sWhereWrk = "(FK_NGANH_ID = 57) AND (C_PARRENT <> -1)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);
                            for ($i=0;$i<$rowswrk;$i++)
                            {
                             $url_parent= Get_path_parent($arwrk [$i]['PK_MACONGTY']);     
                          ?>
                            <h2 class="h2tb"> <a href="<?php echo $url_parent ?>"><?php echo $arwrk [$i]['C_TENCONGTY']?> </a></h2>
                                 <?php 
                                    $sSqlWrk ="";$sWhereWrk ="";
                                    $sSqlWrk = "SELECT * FROM t_thongbao_levelsite";
                                    $sWhereWrk = "(t_thongbao_levelsite.C_PUBLISH=1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (FK_CONGTY_ID = ".$arwrk [$i]['PK_MACONGTY'].") AND (C_BEGIN_DATE <= '".$today."') AND (C_END_DATE >= '".$today."') ORDER BY C_ORDER DESC LIMIT 0,3";
                                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                    $rs = $conn->Execute($sSqlWrk);
                                    $ar = ($rs) ? $rs->GetRows() : array();
                                    if ($rs) $rs->Close();
                                    $row = count($ar);
                                    for ($j=0;$j<$row;$j++)
                                     {
                                         $obid= $ar[$j]['FK_DOITUONG_ID']; if ($obid == null) $obid = 0;
                                         $url = Get_path ($arwrk [$i]['PK_MACONGTY'],$ar[$j]['PK_THONGBAO'],$ar[$j]['C_TITLE'],$obid,$subid); 
                                 ?>
                                <p class="pthongbao"> <a href="<?php echo $url ?>"><?php echo $ar[$j]['C_TITLE'] ?></a> <br/>Ngày tạo: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_ADD_TIME"])) ?>  - Thời hạn:Từ: <?php echo date ( 'j/m/Y' ,strtotime ($ar[$j]["C_BEGIN_DATE"])) ?> Đến:  <?php echo  date ( 'j/m/Y' ,strtotime ($ar[$j]["C_END_DATE"])); ?> </p>
                                 <?php } ?>
                          <?php } ?> 
                        </td>
                   </tr>
              
              </table>
           
           
           
           <!-- end thongbao --></div>
          
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>