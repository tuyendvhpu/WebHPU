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
                          <p class="pthogntinve"><a title="Khối Khoa - Bộ Môn tại Haiphong Private University" href="../gioithieu/HPUGT-gioithieu-3.html"> Khoa - Bộ Môn </a></p>
                          <p class="pphongban"> <a title="Khối các Phòng tại Haiphong Private University" href="http://phong.hpu.edu.vn"> Khối Phòng   </a>&nbsp; &nbsp; &nbsp;  &nbsp;<a title="Khối các Ban Haiphong Private University" href="http://ban.hpu.edu.vn"> Khối Ban</a></p>
                          <p class="pdoanthe"> <a  title="Khối Tổ Chức - Đoàn Thể tại Haiphong Private University" href="http://doanthe.hpu.edu.vn">Tổ Chức - Đoàn Thể </a> </p>
                          <p class="pthuvien"> <a title="Trung tâm thông tin thư viện Haiphong Private University" href="http://tv.hpu.edu.vn">TT Thông Tin Thư viện </a></p>
                          <p class="pthogntinvemamnon"><a title="Trường mầm non Hữu Nghị Haiphong Private University" href="http://is.hpu.edu.vn"> Trường Mầm Non Hữu Nghị </a> </p>

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
                        $sSqlWrk = "SELECT * FROM (SELECT * FROM `t_tinbai_levelsite` WHERE (t_tinbai_levelsite.C_NEW_MYSEFLT = '1') ORDER BY C_TIME_ACTIVE_MAINSITE DESC LIMIT 0,10) AS TB1 ";
			$sWhereWrk = "(TB1.FK_EDITOR_ID=-20) AND (TB1.C_NEW_MYSEFLT = '1') AND (TB1.C_ACTIVE_MAINSITE=1) ORDER BY RAND() LIMIT 0,3";
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
                                        if ($array[$i]["C_HOUR_START"] <> null)$hour = $array[$i]["C_HOUR_START"]."h".$array[$i]["C_MINUTES_STAR"]; else $hour ="All day" ;
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