<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
          <?php include 'include/top_header.php' ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
            <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                <?php 
                        $noticeid=KillChars(ew_HtmlEncode($_GET['noticeid'],ENT_QUOTES));
                       	$sSqlWrk = "Select t_thongbao_mainlevel.*,t_thongbao_levelsite.C_TITLE,t_thongbao_levelsite.C_CONTENT, t_thongbao_levelsite.C_VISITOR From t_thongbao_mainlevel Inner Join
                                    t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                                        t_thongbao_mainlevel.PK_THONGBAO";
			$sWhereWrk = "(t_thongbao_mainlevel.PK_THONGBAO ='".$noticeid."') AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].")";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        $keyworld = $arwrk[0]['C_KEYWORD'];
                        $timezone  = 7; //(GMT +7:00)
                        //Hiển thị ngày tháng tiếng Việt- TuanDA
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timenow = gmdate("D, d/m/Y - H:i:s", time() + 3600*($timezone));
                        $timenow = str_replace( $str_search, $str_replace, $timenow);  
                        $tittle_string = stringname($arwrk[0]['FK_DOITUONG_ID'],'C_NAME','t_doituong_levelsite','PK_DOITUONG');
                        $url  = "MTthongbaodt-".KillChars($arwrk[0]['FK_DOITUONG_ID']).".html"; 
                        // tinh so luot thong bao truy cap
			$so_lanxem =  $arwrk[0]['C_VISITOR'];
                        $so_lanxem +=1;
			$sSqlWrk = "UPDATE t_thongbao_levelsite SET  C_VISITOR =".$so_lanxem." WHERE (t_thongbao_levelsite.C_ACTIVE=1) AND (t_thongbao_levelsite.PK_THONGBAO= '".$noticeid."')";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk) $rswrk->Close();

                 ?>
                <h2 class="h2title-detail"> <a href="<?php echo $url ?>"> <?php echo $tittle_string ?> </a></h2>
            </div>
              <table class="tablechitietbaiviet">
               <tr>
                   <td class="col2">
                     <?php include 'include/include_detainews.php' ?>         
                   </td>
                   <td class="col1">
                      <?php include 'include/include_noticescience.php' ?>   
                   </td> 
                   <td class="col3">
                     <?php include 'include/include_noticeschool.php' ?>   
                   </td> 
               </tr>
            </table>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
      <div id="push"></div>
 <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>
