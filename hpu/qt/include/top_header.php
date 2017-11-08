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
                                         <br/> <a href="../QT/QTtrangchu.html" title="Haiphong Private University - KHOA QUẢN TRỊ KINH DOANH">  <span class="spanlevel">KHOA QUẢN TRỊ KINH DOANH</span> </a>
                                         <br/> <span class="spandiachi"> </span> 

                         </h1></td>
                         <td id="col4">
                          <div id="divnavi">
				              <ul id="ulnavi"> 
                                                 <?php for($i=0;$i<$rowswrk;$i++) { 
                                                  $url= "QTchuyenmuc-".$arwrk[$i]['PK_CHUYENMUC']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
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