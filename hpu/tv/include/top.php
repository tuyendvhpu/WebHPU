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
<div id="header">
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
				        <a href="http://hpu.edu.vn" title="Haiphong Private University"> <img src="../images/khoa/img_logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="h1namehome">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <a href="TTTTTV-trangchu.html"><span class="spanlevel">TT THÔNG TIN - THƯ VIỆN</span> </a>
                                         <br/> <span class="spandiachi">Tầng 4 nhà G - Email : thuvien@hpu.edu.vn - HOTLINE:  0225.38600764 </span> 

                         </h1></td>
                         <td id="col4">
                          <div id="divnavi">
				              <ul id="ulnavi">
				                 <?php for($i=0;$i<$rowswrk;$i++) {
                                                     switch ($arwrk[$i]['C_TYPE'])
                                                     {
                                                       case 0:
                                                       $url= "TT-Thongtin-Thuvienchuyenmuc-".$arwrk[$i]['PK_CHUYENMUC']."-".$arwrk[$i]['FK_CONGTY']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
                                                       break; 
                                                       case 1:
                                                       $url= "TT-Thongtin-Thuvienchuyenmuc-".$arwrk[$i]['PK_CHUYENMUC']."-".$arwrk[$i]['FK_CONGTY']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
                                                       break; 
                                                       case 2:
                                                       $url= "TT-Thongtin-Thuvienthongbao.html";
                                                       break; 
                                                     }
                                                     ?> 
				                  <li><a  title="Haiphong Private University" href="<?php echo $url ?>"><?php echo $arwrk[$i]['C_NAME'] ?></a></li>
				                  <?php }?> 
                                               <li><a href="http://hpu.edu.vn/gioithieu/home_gioithieu.php?flag=3" title="Khối các khoa tại Haiphong Private University" href="#">Khối Khoa </a></li>
                                                  <li><a href="http://doanthe.hpu.edu.vn" title="Khối đoàn thể tại Haiphong Private University" href="#">Khối Đoàn Thể </a></li>
                                                  <li><a href="http://ban.hpu.edu.vn" title="Khối các ban tại Haiphong Private University" href="#">Khối Ban </a></li>
				              </ul>
	                  <!-- end divnavi --></div>                
                         </td>
                     </tr>              
              </table>
<!-- end header --></div>