 <?php
 $noticeid=KillChars(ew_HtmlEncode($_GET['noticeid'],ENT_QUOTES));
                       	$sSqlWrk = "Select t_thongbao_mainlevel.*,t_thongbao_levelsite.C_TITLE,t_thongbao_levelsite.C_CONTENT,t_thongbao_levelsite.C_VISITOR From t_thongbao_mainlevel Inner Join
                                    t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                                        t_thongbao_mainlevel.PK_THONGBAO";
			$sWhereWrk = "(t_thongbao_mainlevel.PK_THONGBAO ='".$noticeid."') AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].")";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        $today = strtotime ($arwrk[0]['C_ADD_TIME']);
                        $keyworld = $arwrk[0]['C_KEYWORD'];
                        $timezone  = 7; //(GMT +7:00)
                        //Hiển thị ngày tháng tiếng Việt- TuanDA
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timenow = gmdate("D, d/m/Y - H:i:s", $today + 3600*($timezone));
                        $timenow = str_replace( $str_search, $str_replace, $timenow);  
                        // tinh so luot thong bao truy cap
			$so_lanxem =  $arwrk[0]['C_VISITOR'];
                        $so_lanxem +=1;
			$sSqlWrk = "UPDATE t_thongbao_levelsite SET  C_VISITOR =".$so_lanxem." WHERE (t_thongbao_levelsite.C_ACTIVE=1) AND (t_thongbao_levelsite.PK_THONGBAO= '".$noticeid."')";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk) $rswrk->Close();
           
?>

<div id='content'>
<div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                <?php 
                 $_SESSION['FK_CONGTY'] = KillChars(ew_HtmlEncode($_GET['fk_congty']));
                 $obid = KillChars(ew_HtmlEncode($_GET['obid']));// doituong
                 $subid = KillChars(ew_HtmlEncode($_GET['subid']));// doituong
                if (($subid <> 0))
                          {
                            $title= stringname($subid,'C_NAME','t_chuyenmuc_levelsite','PK_CHUYENMUC');
                              $url ="Khoiphongchuyenmuc-".$subid."-". $_SESSION['FK_CONGTY']."-".changeTitle($title).".html";  
                          }
                          else
                          {
                              $title= stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG'); 
                               $url ="Khoiphongthongbao.html";  
                          }    
                ?>
                <h2 class="h2title-detail"> <a href="<?php echo $url ?>" style="text-transform: uppercase"> <?php echo $title; ?> </a></h2>
</div>
<h2 class="h2title_thongbao">Thời gian: từ <?php echo date( 'j/m/Y',strtotime($arwrk[0]['C_BEGIN_DATE'])) ?> - <?php echo  date( 'j/m/Y',strtotime($arwrk[0]['C_END_DATE'])) ?>    <span class="pdatetime"> <?php echo $timenow; ?> <img style="cursor: pointer" onclick="printform('ReportTable1')" src="../images/index/img_printer.jpg" /></span> </h2>
<div id="ReportTable1">
<h2 class="h2title_report" >  <?php echo $arwrk[0]['C_TITLE'] ?> </h2>
<div id="divcontents">
    <?php echo $arwrk[0]['C_CONTENT']?>
</div>
 <div id="divvisitor"> <span> Truy cập:  <?php echo $so_lanxem ?> lượt</span></div>
</div>
</div>

