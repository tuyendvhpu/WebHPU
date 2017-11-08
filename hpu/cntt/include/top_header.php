 <?php
			$conn = ew_Connect();
			$sSqlWrk = "SELECT * FROM t_chuyenmuc_levelsite";
			$sWhereWrk = "FK_CONGTY =".$_SESSION['FK_CONGTY'];
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
?>
<div id="header_thongbao">
              <table id="tableheader">
                     <tr>
                          <td id="col6" >
                             <a href="http://hpu.edu.vn" title="Haiphong Private University"> <img src="../images/khoa/img_logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="h1namehome"> <span class="spanlevel_home"> TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                         <br/> <a href="http://cntt.hpu.edu.vn" title="Haiphong Private University - KHOA CÔNG NGHỆ THÔNG TIN">  <span class="spanlevel">KHOA CÔNG NGHỆ THÔNG TIN</span> </a>
                                         <br/> <span class="spandiachi"> </span> 

                         </h1></td>
                         <td id="col4">
                          <div id="divnavi">
				              <ul id="ulnavi"> 
                                                 <?php for($i=0;$i<$rowswrk;$i++) { 
                                                   switch (strval($arwrk[$i]['C_TYPE']))   
                                                          {
                                                             case "0":
                                                                   $sSqlWrk= "";
                                                                   $sSqlWrk = "Select t_tinbai_mainlevel.PK_TINBAI_MAINLEVEL,
                                                                                t_tinbai_mainlevel.PK_TINBAI_ID,
                                                                                t_tinbai_mainlevel.FK_CHUYENMUC_ID,
                                                                                t_tinbai_mainlevel.FK_DOITUONG_ID,
                                                                                t_tinbai_levelsite.C_TITLE,
                                                                                t_tinbai_levelsite.C_SUMARY,
                                                                                t_tinbai_levelsite.C_CONTENTS,
                                                                                t_tinbai_mainlevel.FK_CONGTY,
                                                                                t_tinbai_mainlevel.C_COMENT,
                                                                                t_tinbai_mainlevel.C_FILEANH,
                                                                                t_tinbai_mainlevel.C_HITS,
                                                                                t_tinbai_mainlevel.C_ORDER,
                                                                                t_tinbai_mainlevel.C_VISITOR,
                                                                                t_tinbai_levelsite.C_USER_ADD,
                                                                                t_tinbai_levelsite.C_ADD_TIME,
                                                                                t_tinbai_mainlevel.C_USER_EDIT,
                                                                                t_tinbai_mainlevel.C_EDIT_TIME,
                                                                                t_tinbai_mainlevel.FK_NGUOIDUNG_ID,
                                                                                t_tinbai_mainlevel.FK_EDITOR_ID,
                                                                                t_tinbai_mainlevel.FK_ARRAY_CONGTY,
                                                                                t_tinbai_levelsite.C_ACTIVE,
                                                                                t_tinbai_levelsite.C_ORDER,
                                                                                t_nguoidung.C_HOTEN AS C_HOTEN   
                                                                                From t_tinbai_mainlevel Inner Join
                                                                                    t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                                                                                    t_tinbai_levelsite.PK_TINBAI_ID Inner Join
                                                                                    t_nguoidung On (t_tinbai_levelsite.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)";
                                                                                $sWhereWrk = "(t_tinbai_mainlevel.FK_CHUYENMUC_ID='".$arwrk[$i]['PK_CHUYENMUC']."') LIMIT 1 ";
                                                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                                                                $rs = $conn->Execute($sSqlWrk);
                                                                                $ar = ($rs) ? $rs->GetRows() : array();
                                                                                    $obid= $ar[0]['FK_DOITUONG_ID'];
                                                                                    if ($obid == null) $obid = 0;
                                                                                    $subid=  $ar[0]['FK_CHUYENMUC_ID'];
                                                                                    if ($subid == null) $subid = 0;
                                                                                    $url ="CNTTtintuc-".$ar[0]['PK_TINBAI_ID']."-".$obid."-".$subid."-0-".changeTitle($ar[0]['C_TITLE']).".html";
                                                                   break;
                                                             case "1":
                                                                 $url= "CNTTchuyenmuc-".$arwrk[$i]['PK_CHUYENMUC']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
                                                                  break;
                                                          }
                                                   if ($arwrk[$i]['PK_CHUYENMUC'] == ew_HtmlEncode($_GET['subid'])) $class_menu ="class=\"activemenu\"";
                                                      else $class_menu ="";
                                                     ?> 
				                  <li><a <?php echo $class_menu ?>  title="Haiphong Private University" href="<?php echo $url ?>"><?php echo $arwrk[$i]['C_NAME'] ?></a></li>
				                  <?php } ?> 
                                              </ul>
	                  <!-- end divnavi --></div>                
                         </td>
                     </tr>              
              </table>
<!-- end header --></div>