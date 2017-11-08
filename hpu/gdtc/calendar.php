<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
          <?php include 'include/top_header.php' ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
            <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                <h2 class="h2title-detail"> <a href="#"><a href="list_notice.php"> LỊCH CÔNG TÁC </a></h2>
            </div>
           <table class="tablecalendart" style="width: 100%">
               <tr>
               <td>
                   
<?php
 $Year = KillChars(ew_HtmlEncode($_GET['x_C_YEAR']));
 $Week = KillChars(ew_HtmlEncode($_GET['x_C_WEEK']));  
 if (($Year <> null) && ($_GET['x_C_YEAR'] <> null))
 {
 date("Y-m-d");                 
 $Year = $Year;
 $Week = $Week;  
 }
 else 
 {
 date("Y-m-d");  ;                  
 $Year = date("Y");
 $Week = date("W");  
 } 

 Get_beginday_endday_ofweek ($Week);
 $BeginDateByNumberOfWeek = date('j/m/Y', strtotime( $Year . "W". $Week  . $day)); 
 $beginday = date('Y-m-j', strtotime( $Year . "W". $Week  . $day)); 
 $date_week = $beginday;
 $new_date = strtotime ( '+6 day' , strtotime ( $beginday ) ) ;
 $EndDateByNumberOfWeek = date ('Y-m-j' , $new_date );
 
    $calendar_user="SELECT * FROM `t_lichcongtac` WHERE (t_lichcongtac.FK_CONGTY = '".$_SESSION['FK_CONGTY']."') AND (t_lichcongtac.C_ACTIVE = '1')  AND ((`C_DATE_STAR` BETWEEN '".$beginday."' AND '".$EndDateByNumberOfWeek."')) AND ((t_lichcongtac.C_PARTICIPANTS_ID NOT LIKE '%".$_SESSION['FK_CONGTY']."x%') OR (t_lichcongtac.C_PARTICIPANTS_ID IS NULL)) ORDER BY C_DATE_STAR,C_HOUR_START";
    $rswrk1 = $conn->Execute($calendar_user);
    $arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
      if ($rswrk1) $rswrk1->Close();
    $calendar_parent="SELECT * FROM `t_lichcongtac` WHERE ((t_lichcongtac.C_PARTICIPANTS_ID LIKE '%".$_SESSION['FK_CONGTY']."x%')) AND (t_lichcongtac.FK_CONGTY <> '".$_SESSION['FK_CONGTY']."') AND (t_lichcongtac.C_PUBLISH = '2') AND ((`C_DATE_STAR` BETWEEN '".$beginday."' AND '".$EndDateByNumberOfWeek."')) ORDER BY C_DATE_STAR,C_HOUR_START"; 
    $rswrk2 = $conn->Execute($calendar_parent);
    $arwrk2 = ($rswrk2) ? $rswrk2->GetRows() : array();
    $calendar_parent;
      if ($rswrk2) $rswrk2->Close();
    // @arwrk1 : mảng sự kiện trywcj thuộc đơn vị;$arwrk2 : mang su kien don vi duoc tham du sau khi duoc duyet
    $array = array_merge ($arwrk1,$arwrk2);
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

array_sort_by_column($array,"C_DATE_STAR");  // sắp sếp theo ngay
array_sort_by_column($array,"C_HOUR_START"); // sắp sếp theo thời dian
//echo "<pre>"; print_r($array); echo "</pre>";
// xac dinh mang su kien cua don vi truc thuoc trong tuan
$rowws = count($array);
//Lấy ra các thứ trong tuần
//$array_day = week_from_monday(date('d-m-Y')); 
$array_day =array();
for ($h=0;$h<6;$h++)
{  
       $date_week = strtotime ( '+1 day' , strtotime ( $date_week ) ) ;
       $date_week = date ('Y-m-j' , $date_week );
       $array_day[$h] =$date_week;
}
array_unshift($array_day,$beginday);
//echo "<pre>"; print_r($array_day); echo "</pre>";
?>                             
       <div clas="listcalendar">        
  <div style="border:1px #c2d4da solid;width:740px;font-family:Tahoma; box-shadow: 0 5px 5px -5px #333;">
<table style="width:740px" style="font-family:Tahoma" BORDER=1 RULES=ALL FRAME=VOID bordercolor='#c2d4da'>
		<tr>
                    <td colspan="5">
                        <div class="divheader_calender">
                        <H2>LỊCH CÔNG TÁC TUẦN <?PHP ECHO $Week  ?></H2>
                        <P><?php echo  Get_beginday_endday_ofweek ($Week) ?></P>
                        <span class="spanweek" ><?PHP ECHO $Week  ?></span>
                        <span class="spanyear" ><?PHP ECHO $Year  ?></span>
               <?php
                       // C_YEAR
			$t_ghichu_lich->C_YEAR->EditCustomAttributes = "";
			$arwrk = array();
                        $str=substr(ew_CurrentDate(), 0, 4) ;
                        $num = (int)$str;
                        for ($i=$num;$i>($num-10);$i--)
                        {
                            $arwrk[] = array($i, $i);
                        }
			//array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_YEAR->EditValue = $arwrk;

                       // C_WEEK
			$t_ghichu_lich->C_WEEK->EditCustomAttributes = "";
                        $arwrk = array();
                        $week= date("W", mktime(0,0,0,12,28,2013));
                        $number_week = (int)$week;
                        for ($j=$number_week;$j>0;$j--)    
                        {
                            if ($j<10) $j = "0".$j;     
                            $arwrk[] = array($j, $j);
                        }
			//array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_WEEK->EditValue = $arwrk;
               
               ?>
                        <center>
                        <form> 
                            <select id="x_C_WEEK" name="x_C_WEEK" >
                            <?php
                            if (is_array($t_ghichu_lich->C_WEEK->EditValue)) {
                                    $arwrk = $t_ghichu_lich->C_WEEK->EditValue;
                                    $rowswrk = count($arwrk);
                                    $emptywrk = TRUE;
                                    for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                            $selwrk = (strval($Week) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                                            if ($selwrk <> "") $emptywrk = FALSE;
                            ?>
                            <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
                            <?php echo "Tuần ".$arwrk[$rowcntwrk][1] ?>
                            </option>
                            <?php
                                    }
                            }
                            ?>
                            </select>
                            <select id="x_C_YEAR" name="x_C_YEAR">
                            <?php
                            if (is_array($t_ghichu_lich->C_YEAR->EditValue)) {
                                    $arwrk = $t_ghichu_lich->C_YEAR->EditValue;
                                    $rowswrk = count($arwrk);
                                    $emptywrk = TRUE;
                                    for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                         $selwrk = (strval($Year) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		                                 if ($selwrk <> "") $emptywrk = FALSE;
                            ?>
                            <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
                            <?php echo "Năm: ".$arwrk[$rowcntwrk][1] ?>
                            </option>
                            <?php              
                                    }
                            }
                            ?>
                            </select>
                            <a title="Tìm kiếm"><input id="id_search" type="submit" value=""><a>
                            <a href="calendar.php" title="Làm mới lịch"><img src="../images/khoa/img_refesh.jpg"><a>
                            <a title="In ấn" href="#"> <img src="../images/khoa/img_inan.jpg"></a>
                     
                        </form>
                            </center>
                        </div>
                    </td>
			
		</tr>
               
                <tr style="background: url('../images/khoa/top-nav.jpg') repeat-x; height:28px;">
                               <td style="width:90px;text-align: center;"> <b>Ngày tháng</b></td>
                               <td style="width:260px;text-align: center"> <b>Nội dung</b></td>
                               <td style="width:100px;text-align: center"> <b>Chuẩn bị</b></td>
                               <td style="width:170px;text-align: center"> <b>Tham dự</b></td>
                               <td style="width:120px;text-align: center"> <b>Địa điểm</b></td>
                 </tr>
	 <?php for($i=0;$i<count($array_day);$i++) 
                            {
                                
                                 switch($i) {
                                    case 0: $numDaysToMon = 'Thứ 2'; break;
                                    case 1: $numDaysToMon = 'Thứ 3'; break;
                                    case 2: $numDaysToMon = 'Thứ 4'; break;
                                    case 3: $numDaysToMon = 'Thứ 5'; break;
                                    case 4: $numDaysToMon = 'Thứ 6'; break;
                                    case 5: $numDaysToMon = 'Thứ 7'; break;
                                    case 6: $numDaysToMon = 'Chủ nhật'; break;   
                                 }
               // xac dinh ngay hien tai
                            if (date("Y-m-j") == $array_day[$i]) 
                            {
                                $style_active = "id=\"style_active\"";
                                $numDaysToMon = "Hôm nay";
                                $tr_background = "style=\"background:#E0FFFF \"";
                             
                            }
                              else 
                            {
                              $style_active="";
                              $numDaysToMon = $numDaysToMon;
                              $tr_background= "";
                     
                            }
                            ?>  	
		<tr <?php echo $tr_background; ?>>
                    <td style="text-align:center" > <b> <span <?php echo $style_active ?> class="date_calendar"><?php echo $numDaysToMon ?></b></span> <br/> 
                                         <span class="date_calendar"><?php echo date('d-m-Y',strtotime($array_day[$i])) ?></span> <br/>
                                   <b>Sáng</b>
                        </td>
			<td colspan="4">
			   <table  style="width: 100%;height:60px" BORDER=1 RULES=ALL FRAME=VOID bordercolor='#c2d4da'>
                                 <?php
                                        for ($k=0;$k <$rowws;$k++)
                                        { 
                                            
                                        // FK_CONGTY
                                        $t_lichcongtac->FK_CONGTY->ViewValue1 ="";    
                                        $sFilterWrk = "`PK_MACONGTY` = " .$array[$k]['FK_CONGTY']. "";
                                        $sSqlWrk = "SELECT `C_TENVIETTAT` FROM `t_congty`";
                                        $sWhereWrk = "";
                                        if ($sFilterWrk <> "") {
                                                if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                                $sWhereWrk .= "(" . $sFilterWrk . ")";
                                        }
                                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                                $rswrk = $conn->Execute($sSqlWrk);
                                                if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                       $t_lichcongtac->FK_CONGTY->ViewValue1 = $rswrk->fields('C_TENVIETTAT');
                                                        $rswrk->Close();
                                                } else {
                                                        $t_lichcongtac->FK_CONGTY->ViewValue1 = $t_lichcongtac->FK_CONGTY->CurrentValue1;
                                                }
                            // C_ORGANIZATION
                            $t_lichcongtac->C_ORGANIZATION->ViewValue1 = $array[$k]['C_ORGANIZATION'];

                            // C_PREPARED
                            $t_lichcongtac->C_PREPARED->ViewValue1 = $array[$k]['C_PREPARED'];
                            
                         // C_PARTICIPANTS_ID             
                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
			if (strval($array[$k]['C_PARTICIPANTS_ID']) <> "") {
                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
				$arwrk = explode(",", $array[$k]['C_PARTICIPANTS_ID']);
                                $findme   = 'x_';
                                $array_company = array();
                                $array_user = array();
                                $j=0;
                                FOR ($j=0;$j< count ($arwrk);$j++)   
                                {
                                        $pos = strpos($arwrk [$j], $findme);
                                        if ($pos === false) {
                                                    $array_company[$j] =  substr($arwrk [$j],0,-1);
                                                    } else {
                                                   $array_user[$j] =  substr(strstr($arwrk [$j],'x'),2);
                                                    }
                                }
                                // Xuất ra danh sách các đơnn vị Add code QuangHung  
                                $arwrk = $array_company;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_TENVIETTAT` FROM `t_congty`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                } else  { $sWhereWrk .= "(0=1)"; }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 = "";
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_TENVIETTAT').". ";
                                                        $rswrk->MoveNext();
                                                        if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        } 
                                         // Xác định tên người tham gia add code  
                                $arwrk = $array_user;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                } else  { $sWhereWrk .= "(0=1)"; }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_HOTEN')."<br/>";
                                                        $rswrk->MoveNext();
                                                    //    if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator($ari); // Separate Options
                                                         if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        }
                           } 
                               
                         // xac dinh thoi gian
                     switch ($array[$k]['C_STATUS_END'])
                            {
                            case "0":
                             $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$array[$k]['C_HOUR_START']."h".$array[$k]['C_MINUTES_STAR'];
                            break;
                            default:
                             $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$array[$k]['C_HOUR_START']."h".$array[$k]['C_MINUTES_STAR']."-".$array[$k]['C_HOUR_END']."h".$array[$k]['C_MINUTES_END'];  
                            } 
                       if (($array[$k]['C_STATUS_STAR'] ==0) && ($array[$k]['C_STATUS_END'] ==0) && ($array[$k]['C_HOUR_START'] == null) && ($array[$k]['C_HOUR_END'] == null)) $t_lichcongtac->C_THOIGIAN->ViewValue1 ="Cả ngày: " ;     
                      // thiet lap url
                       $url = "GDTClich-sukien-".$array[$k]['C_CADENLAR_ID'].".html";
                                            // xác đinh sực kiện theo ngày 
                                            if ($array_day[$i] == date('Y-m-j',strtotime($array[$k]['C_DATE_STAR'])))
                                            {   
                                                    ?>
                                             <?php if (($array[$k]['C_HOUR_START'] >=0) && ($array[$k]['C_HOUR_START'] <=12))
                                                                    {  
                                                 ?>
                               
                                <tr>
                                    <td style="width:260px"><a class="calender_title" href="<?php echo $url ?>"><?php echo  $t_lichcongtac->C_THOIGIAN->ViewValue1." ".$array[$k]['C_TITLE'] ?> </a></td>
                                    <td style="width:100px"><span class="spantext"> <?php echo $t_lichcongtac->C_PREPARED->ViewValue1   ?></span></td>
                                    <td style="width:170px">
                                             <div><span class="spantext"><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 ;?></span></div>
                                              <div><span class="spantext"> <?PHP echo nl2br($t_lichcongtac->C_ORGANIZATION->ViewValue1)  ?></span></div>
                                    </td>
                                    <td style="width:120px"><span class="spantext"><?php echo $array[$k]['C_WHERE'] ?></span></td>
                                </tr>
   
                                                    <?php   }
                                                        }  
                                        }
                                                    ?>
	                    </table>
			
			</td>
		</tr>
                <tr style="background: #f3f8f7;border-bottom: 2px #8cc0c6 solid">
			 <td style="text-align:center"> <b>Chiều</b></td>
			<td colspan="4">
			     <table style="width: 100%;height:20px" BORDER=1 RULES=ALL FRAME=VOID bordercolor='#c2d4da'>
                                 <?php
                                        for ($k=0;$k <$rowws;$k++)
                                        { 
                                            // xác đinh sực kiện theo ngày 
                                            if ($array_day[$i] == date('Y-m-j',strtotime($array[$k]['C_DATE_STAR'])))
                                            {   
                                                
                                        // FK_CONGTY
                                        $t_lichcongtac->FK_CONGTY->ViewValue1 ="";    
                                        $sFilterWrk = "`PK_MACONGTY` = " .$array[$k]['FK_CONGTY']. "";
                                        $sSqlWrk = "SELECT `C_TENVIETTAT` FROM `t_congty`";
                                        $sWhereWrk = "";
                                        if ($sFilterWrk <> "") {
                                                if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                                $sWhereWrk .= "(" . $sFilterWrk . ")";
                                        }
                                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                                $rswrk = $conn->Execute($sSqlWrk);
                                                if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                       $t_lichcongtac->FK_CONGTY->ViewValue1 = $rswrk->fields('C_TENVIETTAT');
                                                        $rswrk->Close();
                                                } else {
                                                        $t_lichcongtac->FK_CONGTY->ViewValue1 = $t_lichcongtac->FK_CONGTY->CurrentValue1;
                                                }
                                           
                                         // C_ORGANIZATION
                                                $t_lichcongtac->C_ORGANIZATION->ViewValue1 = $array[$k]['C_ORGANIZATION'];

                                                // C_PREPARED
                                                $t_lichcongtac->C_PREPARED->ViewValue1 = $array[$k]['C_PREPARED'];
                                        // C_PARTICIPANTS_ID             
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
                                                        if (strval($array[$k]['C_PARTICIPANTS_ID']) <> "") {
                                                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
                                                                $arwrk = explode(",", $array[$k]['C_PARTICIPANTS_ID']);
                                                                $findme   = 'x_';
                                                                $array_company = array();
                                                                $array_user = array();
                                                                $j=0;
                                                                FOR ($j=0;$j< count ($arwrk);$j++)   
                                                                {
                                                                        $pos = strpos($arwrk [$j], $findme);
                                                                        if ($pos === false) {
                                                                                    $array_company[$j] =  substr($arwrk [$j],0,-1);
                                                                                    } else {
                                                                                    $array_user[$j] =  substr(strstr($arwrk [$j],'x'),2);
                                                                                    }
                                                                }
                                                                // Xuất ra danh sách các đơnn vị Add code QuangHung  
                                                                $arwrk = $array_company;
                                                                $sFilterWrk = "";
                                                                foreach ($arwrk as $wrk) {
                                                                        if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
                                                                        $sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
                                                                }	
                                                                $sSqlWrk = "SELECT `C_TENVIETTAT` FROM `t_congty`";
                                                                $sWhereWrk = "";
                                                                if ($sFilterWrk <> "") {
                                                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                                                } else  { $sWhereWrk .= "(0=1)"; }
                                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                                                        $rswrk = $conn->Execute($sSqlWrk);
                                                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 = "";
                                                                                $ari = 0;
                                                                                while (!$rswrk->EOF) {
                                                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_TENVIETTAT').". ";
                                                                                        $rswrk->MoveNext();
                                                                                        if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                                                        $ari++;
                                                                                }
                                                                                $rswrk->Close();
                                                                        } 
                                                                            // Xác định tên người tham gia add code  
                                                                $arwrk = $array_user;
                                                                $sFilterWrk = "";
                                                                foreach ($arwrk as $wrk) {
                                                                        if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
                                                                        $sFilterWrk .= "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql(trim($wrk)) . "";
                                                                }	
                                                                $sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
                                                                $sWhereWrk = "";
                                                                if ($sFilterWrk <> "") {
                                                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                                                } else  { $sWhereWrk .= "(0=1)"; }
                                                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                                                        $rswrk = $conn->Execute($sSqlWrk);
                                                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                                                $ari = 0;
                                                                                while (!$rswrk->EOF) {
                                                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_HOTEN')."<br/>";
                                                                                        $rswrk->MoveNext();
                                                                                    //    if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator($ari); // Separate Options
                                                                                            if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                                                        $ari++;
                                                                                }
                                                                                $rswrk->Close();
                                                                        }
                                                                    }
                                                       // xac dinh thoi gian
                                                        switch ($array[$k]['C_STATUS_END'])
                                                                {
                                                                case "0":
                                                                $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$array[$k]['C_HOUR_START']."h".$array[$k]['C_MINUTES_STAR'];
                                                                break;
                                                                default:
                                                                $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$array[$k]['C_HOUR_START']."h".$array[$k]['C_MINUTES_STAR']."-".$array[$k]['C_HOUR_END']."h".$array[$k]['C_MINUTES_END'];  
                                                                } 
                                                        if (($array[$k]['C_STATUS_STAR'] ==0) && ($array[$k]['C_STATUS_END'] ==0) && ($array[$k]['C_HOUR_START'] == null) && ($array[$k]['C_HOUR_END'] == null)) $t_lichcongtac->C_THOIGIAN->ViewValue1 ="Cả ngày: " ; 
                                                        // thiet lap url
                                                                 $url = "GDTClich-sukien-".$array[$k]['C_CADENLAR_ID'].".html";
                                        
                                                    ?>
                                              <?php if (($array[$k]['C_HOUR_START'] > 12) && ($array[$k]['C_HOUR_START'] <=24))
                                                                    {  ?>
                                  <tr>
                                    <td style="width:260px"><a class="calender_title" href="<?php echo $url ?>"><?php echo  $t_lichcongtac->C_THOIGIAN->ViewValue1." ".$array[$k]['C_TITLE'] ?> </a></td>
                                    <td style="width:100px"><span class="spantext"> <?php echo $t_lichcongtac->C_PREPARED->ViewValue1   ?></span></td>
                                    <td style="width:170px">
                                             <div><span class="spantext"><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 ;?></span></div>
                                              <div><span class="spantext"> <?PHP echo nl2br($t_lichcongtac->C_ORGANIZATION->ViewValue1)  ?></span></div>
                                    </td>
                                    <td style="width:120px"><span class="spantext"><?php echo $array[$k]['C_WHERE'] ?></span></td>
                                </tr>
                                                    <?php   }
                                                        }  
                                        }
                                                    ?>
	                    </table>
			</td>
		</tr>
               <?php } ?>
                <tr>
                    <td colspan="5">
                         <h2 class="h2ghichu">Trọng tâm</h2>
                        <div id="divghichu">
                        <?php
                        $sSqlWrk = "Select * From t_ghichu_lich";
                        $sWhereWrk = "(t_ghichu_lich.C_WEEK = '".$Week."') AND (t_ghichu_lich.C_YEAR = '".$Year."') AND (t_ghichu_lich.FK_CONGTY =".$_SESSION['FK_CONGTY'].") Limit 1";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                        if ($rswrk) $rswrk->Close();
                          echo $arwrk[0]['C_CONTENT'];
                        ?>
                        <!-- ghi chú lịch ---> </div>
                    </td>
                </tr>
	</table>
</div>         
      
           
                      
                   <!-- end listcalendar--></div>
                   

               </td>
               <td style="width:250px;vertical-align: top">
                      <div style="border:1px #c2d4da solid;font-family:Tahoma;">
                         <?php include "include_calendar.php" ?> 
                   </div>
               </td>
        </tr>
    </table>
           
           
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>

