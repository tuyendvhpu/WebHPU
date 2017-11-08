<table id="tablecontentheader">
                     <tr>
                         <td id="cola1">
                             <div id="newshot">
                                
								<div class="slider-wrapper theme-default">
								<div class="ribbon" ></div>
								<div id="slider" class="nivoSlider">
                       <?php
 
                       	$sSqlWrk = "Select * From t_tinbai_levelsite";
			$sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.C_HIT_MAINSITE like '%3%') AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER_MAINSITE DESC LIMIT 5";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        for($i=0;$i<$rowswrk;$i++)
                        {
                       // $url_pk= "../tintuc/detailnews.php?sturl=tuyensinh&pk_intro=".$arwrk[$i]['FK_DMTUYENSINH_ID']."&PK_TINBAI_ID=".$arwrk[$i]['PK_TINBAI_ID'];  
                        $url_pk ="../tintuc/HPUSVDHCT-sinhviendanghoc-".$arwrk[$i]['FK_DTSVDANGHOC_ID']."-".$arwrk[$i]['PK_TINBAI_ID']."-".changeTitle($arwrk[$i]['C_TITLE']).".html";
                         // kiểm tra file Anh
                                    $file = ew_HtmlEncode($arwrk[$i]['C_PIC_HIT']);
                                    $file_headers = @get_headers($file);
                                    if($file_headers[0] == 'HTTP/1.1 404 Not Found')
                                      { $img ="../images/khoa/hpu.jpg" ;} 
                                    else 
                                     { $img = $arwrk[$i]['C_PIC_HIT']; }
                        
                        ?>                                                                  
			<a href="<?php echo $url_pk ?>"><img src="<?php echo ew_HtmlEncode($arwrk[$i]['C_PIC_HIT']) ?>" alt="Haiphong Private University"/></a>
                        <?php } ?>
							
								</div>
								</div>
								<script type="text/javascript">
								$(window).load(function() {
								$('#slider').nivoSlider();
								
								});
								</script>
                                
                             <!-- end newshot --></div>
                         </td>
                         <td id="cola2">
                           <dl class="ttob">
					<dt><a title="Haiphong Private University" href="#">Danh sách dịch vụ:</a></dt>
                                        <?php   
                                                $sSqlWrk ="";$sWhereWrk ="";
                                         	$sSqlWrk = "Select * From t_htlienquan";
                                                $sWhereWrk = "(t_htlienquan.C_ACTIVE=1) AND (t_htlienquan.FK_OB_ID Like '%2%') ORDER BY t_htlienquan.C_EDIT_TIME DESC LIMIT 7";
                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                                $rswrk = $conn->Execute($sSqlWrk);
                                                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                if ($rswrk) $rswrk->Close();
                                                $rowswrk = count($arwrk);
                                                for($i=0;$i<$rowswrk;$i++)
                                                 { 
                                        ?>
                                         <dd><a href="<?php echo $arwrk[$i]['C_URL'] ?>" target="_blank" class="dd" title="Haiphong Private University" href="sinhvientuonglai.html">- <?php  echo $arwrk[$i]['C_NAME'] ?></a></dd>			
                                          <?php } ?>
                        </dl> 
                         
                         </td> 
                     </tr>              
</table>