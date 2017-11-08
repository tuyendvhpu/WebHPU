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