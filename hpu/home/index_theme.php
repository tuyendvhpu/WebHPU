<?php include "../include/header.php" ?>
<body>
<div id="wrapper83">
 <div id="layout83" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php// include "../include/top.php" ?>
            <?PHP
 if (isset($_GET['PK_TINBAI_ID'])) $PK_TINBAI_ID = KillChars(ew_HtmlEncode($_GET['PK_TINBAI_ID']));
 if (isset($_GET['sturl']))  $sturl =KillChars(ew_HtmlEncode($_GET['sturl'])); 
      switch ($sturl) 
                {
                case 'gioithieu':
                    $sturl = "GIỚI THIỆU";
                    $h1name = 'h1name';
                    $amemnuactive1 ="class=\"amemnuactive\"";
                    BREAK;
                case 'thongbao':
                    $sturl = "THÔNG BÁO";
                    $h1name = 'h1name'; 
                    $amemnuactive2 ="class=\"amemnuactive\"";
                    BREAK;
                case 'tintuc':
                    $sturl = "<a class=\"alevel\" href =\"../tintuc/HPU-tintuc.html\">TIN TỨC </a>";
                    $h1name = 'h1name'; 
                    $amemnuactive3 ="class=\"amemnuactive\"";
                    BREAK;
                    case 'tuyensinh':
                    $sturl = "TUYỂN SINH";
                    $h1name = 'h1name'; 
                    $amemnuactive4 ="class=\"amemnuactive\"";
                    BREAK;
                    case 'sinhvientuonglai':
                    $sturl = "<a class=\"alevel\" href =\"../svtl/svtl.php?sturl=sinhvientuonglai\">SINH VIÊN TƯƠNG LAI </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                    case 'sinhviendanghoc':
                    $sturl = "<a class=\"alevel\" href =\"../svdh/svdh.php?sturl=sinhviendanghoc\">SINH VIÊN ĐANG HỌC </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'cuusinhvien':
                    $sturl = "<a class=\"alevel\" href =\"../cuusv/cuusv.php?sturl=cuusinhvien\">CỰU SINH VIÊN </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'doanhnghiep':
                    $sturl = "<a class=\"alevel\" href =\"../dn/dn.php?sturl=doanhnghiep\">DOANH NGHIỆP </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'hpusukhacbiet':
                    $sturl = "<a class=\"alevel\" href =\"../tintuc/listnews.php?sturl=hpusukhacbiet&pk_myseft=1\">HPU - SỰ KHÁC BIỆT</a>";
                    $h1name = 'h1name'; 
                    BREAK;
                    case 'lichcongtac':
                    $sturl = "<a class=\"alevel\" href =\"../lichcongtac/HPUlich.html\">HPU SỰ KHÁC BIỆT</a>";
                    $h1name = 'h1name'; 
                    BREAK;
                default :
                    $sturl = "";
                    $h1name = 'h1namehome'; 
                }

  

 ?>

<div id="header">
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
			<a href="hpu.edu.vntrangchu.html" title="Haiphong Private University"> <img src="../images/theme/logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="<?php echo $h1name ?>">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <span class="spanlevel"> <?php echo $sturl ?> </span> 
                                         </h1>
                         </td>
                         <td id="col3">
                             <form action="hpu.edu.vnsearchapigoogle.php" id="searchForm"   method="get">
                                   <input name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>"  id="searchtxt83" type="text" placeholder="Tìm kiếm"   />    
                                   <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                              </form>
                         </td>
                         <td id="col4">
                              <ul id="ulsharelink">
                                  <li><a target="_blank" title="Facebook Haiphong Private University" href="https://www.facebook.com/HaiPhongPrivateUniversity" class="iconface"></a></li>
                                  <li><a target="_blank" title="Twitter Haiphong Private University" href="https://twitter.com/HpuVn" class="icontiwter"> </a></li>
                                  <li><a target="_blank" title="Google+ Haiphong Private University" href="https://plus.google.com/113567665922413102836" class="icongoogle"></a></li>
                                  <li><a target="_blank"  title="Youtube Haiphong Private University" href="https://www.youtube.com/HPUVideoChannel" class="iconyoutobe"></a></li>
                                  <li><a target="_blank" title="Diễn Đàn Haiphong Private University" href="http://diendan.hpu.edu.vn/" class="iconfeed"> </a></li>
                              </ul>
                             <div class="divsitemap" ><a title="Site map Haiphong Private University" class="asitemap" href="hpu.edu.vnHPU-SodoWedSite.html">Sơ đồ WebSite </a> <a title="Haiphong Private University" href="http://eng.hpu.edu.vn"> <img alt="Website Tiếng Anh HPU" src="../images/index/flagen.gif"/></a> <a title="Haiphong Private University" href="http://hpu.edu.vn"> <img alt="Website Tiếng Việt HPU" src="../images/index/viet_nam.gif"/></a></div>
                         </td>
                     </tr>              
              </table>
          <!-- end header --></div>
          <div id="divnavi">
              <ul id="ulnavi">
                  <li><a class="a83"  <?php echo $amemnuactive1 ?> title="Giới thiệu về Đại Học Dân Lập Hải Phòng" href="../gioithieu/HPUGT-gioithieu-1.html">Giới thiệu</a></li>
                  <li><a class="a83"  <?php echo $amemnuactive3?> title="Tin tức về Haiphong Private University" href="../tintuc/HPU-tintuc.html">Tin tức</a></li>
                  <li><a class="a83"  <?php echo $amemnuactive2 ?>  title="Thông báo tại Haiphong Private University" href="../thongbao/HPUTB-thongbao.html">Thông báo </a></li>
                  <li><a class="a83"  <?php echo $amemnuactive4 ?> title="Thông tin tuyển sinh Haiphong Private University" href="../tuyensinh/HPUTS-tuyensinh.html">Tuyển sinh </a></li>
                  <li><a class="a83" <?php echo $amemnuactive ?> title="Lịch công tác tại Haiphong Private University" href="../lichcongtac/HPUlich.html">Lịch công tác</a></li>

              </ul>
          <!-- end divnavi --></div>
          <?php// end include "../include/top.php" ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
         <div id="contentheader">
            <?php// include "../include/contentheader.php" ?> 
             <table id="tablecontentheader">
                     <tr>
                         <td id="cola1">
                             <div id="newshot">
                                
								<div class="slider-wrapper theme-default">
								<div class="ribbon" ></div>
								<div id="slider" class="nivoSlider">
								      <?php
                                                                        $sSqlWrk = "Select * From t_tinbai_levelsite";
                                                                        $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_HIT_MAINSITE like '%1%') AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT 5";
                                                                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                                                        $rswrk = $conn->Execute($sSqlWrk);
                                                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                                        if ($rswrk) $rswrk->Close();
                                                                        $rowswrk = count($arwrk);
                                                                        for($i=0;$i<$rowswrk;$i++)
                                                                        {
                                                                        // $url_pk= "../tintuc/detailnews.php?sturl=tintuc&pk_intro=".$arwrk[$i]['FK_DMTUYENSINH_ID']."&PK_TINBAI_ID=".$arwrk[$i]['PK_TINBAI_ID'];    
                                                                        $url_pk ="../tintuc/HPUTT-1-".$arwrk[$i]['PK_TINBAI_ID']."-".changeTitle($arwrk[$i]['C_TITLE']).".html";
                                                                        // $file_anh = getimagesize($arwrk[$i]['C_PIC_HIT']);
//                                                                      if(is_array($file_anh)){
//                                                                            $file_anh = $file_anh;
//                                                                        }
//                                                                        else {
//                                                                            $file_anh ="../images/index/hpu_hot.jpg";
//                                                                        }
                                                                         $file_anh = $arwrk[$i]['C_PIC_HIT'];
                                                                        ?>                                                                  
                                                                    <a href="<?php echo $url_pk ?>"><img  src="<?php echo $file_anh ?>" alt="Haiphong Private University"/></a>
                                                                        <?php } ?>
								</div>
								</div>
								<script type="text/javascript">
								$(window).load(function() {
								$('#slider').nivoSlider({
                                                                        effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
                                                                        slices: 15,                     // For slice animations
                                                                        boxCols: 8,                     // For box animations
                                                                        boxRows: 4,                     // For box animations
                                                                        animSpeed: 500,                 // Slide transition speed
                                                                        pauseTime: 5000,                // How long each slide will show
                                                                        startSlide: 0,                  // Set starting Slide (0 index)
                                                                        directionNav: true,             // Next Prev navigation
                                                                        controlNav: true,               // 1,2,3... navigation
                                                                        controlNavThumbs: false,        // Use thumbnails for Control Nav
                                                                        pauseOnHover: true,             // Stop animation while hovering
                                                                        manualAdvance: false,           // Force manual transitions
                                                                        prevText: 'Prev',               // Prev directionNav text
                                                                        nextText: 'Next',               // Next directionNav text
                                                                        randomStart: false,             // Start on a random slide
                                                                        beforeChange: function(){},     // Triggers before a slide transition
                                                                        afterChange: function(){},      // Triggers after a slide transition
                                                                        slideshowEnd: function(){},     // Triggers after all slides have been shown
                                                                        lastSlide: function(){},        // Triggers when last slide is shown
                                                                        afterLoad: function(){}         // Triggers when slider has loaded
                                                                    });
								
								});
								</script>
                                
                             <!-- end newshot --></div>
                         </td>
                         <td id="cola2">
                           <dl class="ttob">
							<dt><a title="Haiphong Private University" href="#">Thông tin dành cho:</a></dt>
								    <dd><a class="dd" title="Thông tin dành cho sinh viên tương lai HPU" href="../svtl/HPUSVTL-sinhvientuonglai.html">- Sinh viên tương lai</a></dd>
								    <dd><a class="dd" title="Thông tin dành cho sinh viên đang học HPU" href="../svdh/HPUSVDH-sinhviendanghoc.html">- Sinh viên đang học</a></dd>
								    <dd><a class="dd" title="Thông tin dành cho cựu sinh viên Haiphong HPU" href="../cuusv/HPUCSV-cuusinhvien.html">- Cựu sinh viên</a></dd>
								    <dd><a class="dd" id="sys_hpu" title="Hệ thống Mail dành cho cán bộ giảng viên HPU" href="#">- Cán bộ giảng viên</a></dd>
								    <dd><a class="dd" title="Thông tin từ Doanh nghiệp tới sinh viên HPU" href="../dn/HPUDN-doanhnghiep.html">- Doanh nghiệp</a></dd>
			  </dl> 
                          <?php include "../include/include_sys.php" ?> 
                         </td> 
                     </tr>              
              </table>
                <?php// end include "../include/contentheader.php" ?> 
          <!-- content header --></div>
           
            <?php// include "../include/contentbody.php" ?> 
             <table id="tablecontentbody">
               <thead>
                 <tr>
                      <td style="width:184px"> <p class="ptextheader"> Thông tin về </p> </td>
                      <td style="width:350px;"> </td>
                      <td style="width:225px;"> <p class="ptextheader">  <a href="../tintuc/HPUHP-1-hpusukhacbiet.html"> HPU - Sự khác biệt  </a> </p> </td>
                      <td> <p class="ptextheader"> <a href="../lichcongtac/HPUlich.html"> Sự kiện trong tuần </a></p> </td>  
                 </tr>
               </thead>
               <tr>
                   <td>
                       <div id="thongtinve">
                          <p class="pthogntinve83"><a title="Khối Khoa - Bộ Môn tại Haiphong Private University" href="../gioithieu/HPUGT-gioithieu-3.html"> Khoa - Bộ Môn </a></p>
                          <p class="pphongban"> <a title="Khối các Phòng tại Haiphong Private University" href="http://phong.hpu.edu.vn"> Khối Phòng   </a>&nbsp; &nbsp; &nbsp;  &nbsp;<a title="Khối các Ban Haiphong Private University" href="http://ban.hpu.edu.vn"> Khối Ban</a></p>
                          <p class="pdoanthe"> <a  title="Khối Tổ Chức - Đoàn Thể tại Haiphong Private University" href="http://doanthe.hpu.edu.vn">Tổ Chức - Đoàn Thể </a> </p>
                          <p class="pthuvien"> <a title="Trung tâm thông tin thư viện Haiphong Private University" href="http://tv.hpu.edu.vn">TT Thông Tin Thư viện </a></p>
                          <p class="pthogntinvemamnon"><a title="Trường mầm non Hữu Nghị Haiphong Private University" href="http://is.hpu.edu.vn/"> Trường Mầm Non Hữu Nghị </a> </p>

                       <!--endiv thongve--></div>
                   </td>
                   <td> 
                   <?php
                   // xac dinh nagy bat day va ngay ket thuc cau thang hien tai
                        $firstDayUTS = mktime (0, 0, 0, date("m"), 1, date("Y"));
                        $lastDayUTS = mktime (0, 0, 0, date("m"), date('t'), date("Y"));

                        $firstDay = date("Y-m-j", $firstDayUTS);
                        $lastDay = date("Y-m-j", $lastDayUTS);
                    //  end
                       	$sSqlWrk = "Select * From t_tinbai_levelsite";
			$sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_NEW_MYSEFLT = '1') AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) AND ((`C_TIME_ACTIVE_MAINSITE` BETWEEN '".$firstDay."' AND '".$lastDay."')) ORDER BY RAND() LIMIT 0,3";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        if ($rowswrk <3)
                        {
                        $sSqlWrk = "Select * From t_tinbai_levelsite";
			$sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_NEW_MYSEFLT = '1') AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY RAND() LIMIT 0,3";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        }
                        $url_img= "../tintuc/HPUCTSKB-hpusukhacbiet-".$arwrk[0]['C_NEW_MYSEFLT']."-".$arwrk[0]['PK_TINBAI_ID']."-".changeTitle($arwrk[0]['C_TITLE']).".html"; 
                        
                          // kiểm tra file Anh
                          $img = $arwrk[0]['C_PIC_MYSEFLT'];
                   ?>
                      <a href="<?php echo $url_img ?>"><img id="imgnews" src="<?php echo ew_HtmlEncode($img) ?>" alt="Haiphong Private University"  /></a>
                   </td>
                   <td style="vertical-align:top;">
                        <ul id="ultintuc">
                        <?php  
                        for($i=0;$i<$rowswrk;$i++)
                        {
                        $url_pk= "../tintuc/HPUCTSKB-hpusukhacbiet-".$arwrk[$i]['C_NEW_MYSEFLT']."-".$arwrk[$i]['PK_TINBAI_ID']."-".changeTitle($arwrk[$i]['C_TITLE']).".html"; 
                        if ($i==($rowswrk -1)) $style="class=\"liend\"";
                        ?>                 
                        <li <?php echo $style ?>> <a href="<?php echo $url_pk ?>"> <?php echo ew_TruncateMemo ($arwrk[$i]['C_TITLE'],95,true) ?> </a></li>
                        <?php } ?>
                        </ul>
                   </td>
                   <td style="vertical-align:top">
                       <?php 
                            date("Y-m-d");  ;                  
                            $Year = date("Y");
                            $Week = date("W");  
                            Get_beginday_endday_ofweek ($Week);
                            $BeginDateByNumberOfWeek = date('j/m/Y', strtotime( $Year . "W". $Week  . $day)); 
                            $beginday = date('Y-m-j', strtotime( $Year . "W". $Week  . $day)); 
                            $date_week = $beginday;
                            $new_date = strtotime ( '+6 day' , strtotime ( $beginday ) ) ;
                            $EndDateByNumberOfWeek = date ('Y-m-j' , $new_date );
                            $calendar_parent="SELECT * FROM `t_lichcongtac` WHERE (t_lichcongtac.C_OPTION =1) AND (t_lichcongtac.C_PUBLISH = '2') AND ((`C_DATE_STAR` BETWEEN '".$beginday."' AND '".$EndDateByNumberOfWeek."')) ORDER BY C_DATE_STAR,C_HOUR_START"; 
                            // $calendar_parent= "SELECT * FROM `t_lichcongtac` WHERE (t_lichcongtac.C_OPTION =1) AND (t_lichcongtac.C_PUBLISH = '2') AND ((`C_DATE_STAR` BETWEEN '2013-09-2' AND '2013-09-8')) ORDER BY C_DATE_STAR,C_HOUR_START"; 
                            $rswrk2 = $conn->Execute($calendar_parent);
                            $arwrk2 = ($rswrk2) ? $rswrk2->GetRows() : array();
                            if ($rswrk2) $rswrk2->Close();
                            $array = $arwrk2;
                             function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
                                $sort_col = array();
                                foreach ($arr as $key=> $row) {
                                    $sort_col[$key] = $row[$col];
                                }

                                array_multisort($sort_col, $dir, $arr);
                            }
                            array_sort_by_column($array,"C_HOUR_START"); // sắp sếp theo thời dian
                            array_sort_by_column($array,"C_DATE_STAR");  // sắp sếp theo ngay
                            $rowws = count($array);
                            if ($rowws >0)  
                            {
                              for ($i=0; $i<$rowws; $i++)
                                       {
                                        $url = "../lichcongtac/HPUlich-sukien-".$array[$i]['C_CADENLAR_ID'].".html" ;                                
                                        $datetime  = strtotime($array[$i]["C_DATE_STAR"]);
                                        $moth = date ( " M ", $datetime );
                                        $date = date ( " d ", $datetime ); 
                                        $hour = $array[$i]["C_HOUR_START"]."h".$array[$i]["C_MINUTES_STAR"]; 
                                        if ($i == ($rowws-1)) $style = "events_box_end"; else $style="";
                       ?>
                        <div class="events_box <?php echo$style ?>">
							    <div class="event_date">
							      <h3><span class="event_month"> <?php echo  $moth ?> </span> <span class="event_day"> <?php echo $date ?> </span></h3>
							      <span class="event_time"> 
							        <?php echo $hour  ?>							      </span>
							    </div>
							    <div class="event_list">
                                                                <div class="event_title"><p><a href="<?php echo $url ?>">  <?php echo ew_TruncateMemo($array[$i]['C_TITLE'],95, true)  ?></a></p></div>
                               </div>
                               <!-- end eventbox--></div>
                         <?php } 
                         
                            }
                         ?>
                         
                  
                   
                   </td>
               </tr>
          
          </table>
             <?php//end include "../include/contentbody.php" ?> 
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton83" class="clearfix">
       <?php  // include "../include/footter.php" ?> 
          <div id="footter">
            <table id="tablefooter">
                    <tr>
                           <td id="co1f"> 
                           <p class="diachi83">
                           
                           Địa chỉ: Số 36 - Đường Dân Lập - Phường Dư Hàng Kênh - Quận Lê Chân - TP Hải Phòng
                          <br/>  Điện thoại: 031 3740577 - 031 3833802 Fax: 031.3740476  Email: webmaster@hpu.edu.vn
                           
                           </p></td>   
                           <td id="col2f">
                             <p class="sologon83">
                               Học thật thi thật để ra đời làm thật
                             </p>
                           </td>               
                     
                    </tr>           
            
            </table>
       <?php //end include "../include/footter.php" ?> 
          <!-- end footer--></div>
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>