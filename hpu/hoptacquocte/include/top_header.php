<div id="header_thongbao">
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
				        <a href="HTQT-trangchu.html" title="Haiphong Private University"> <img src="../images/khoa/img_logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="h1namehome">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <a href="HTQT-trangchu.html"><span class="spanlevel">HỢP TÁC QUỐC TẾ</span> </a>
                                         <br/> <span class="spandiachi">Tầng 2 nhà H - Email : ir@hpu.edu.vn - HOTLINE:  0225.38600764  </span> 

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
				              </ul>
	                  <!-- end divnavi --></div>                    
                         </td>
                     </tr>              
              </table>
<!-- end header --></div>