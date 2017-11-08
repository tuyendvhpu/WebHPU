<?php include '../include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include '../include/top.php' ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
            <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                <h2 class="h2title-detail"> <a href="#"><a href="list_notice.php"> LỊCH SỰ KIỆN</a></h2>
            </div>
           <table class="tablecalendart" style="width: 100%">
               <tr>
               <td style="vertical-align: top">
                   
<?php
date("Y-m-d");  ;                  
 $Year = date("Y");
 $Week = date("W");  
    $eventid = KillChars(ew_HtmlEncode($_GET['eventid']));
    $calendar_user="SELECT * FROM `t_lichcongtac` WHERE ((t_lichcongtac.C_PUBLISH = '2') OR (t_lichcongtac.C_PUBLISH = '1')) AND (t_lichcongtac.C_CADENLAR_ID = '".$eventid."') "; 
    $rs = $conn->Execute($calendar_user);
    $ar = ($rs) ? $rs->GetRows() : array();
    if ($rs) $rs->Close();
    
                        // FK_SB_ID
			if (strval($ar[0]['FK_SB_ID']) <> "") {
			$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($ar[0]['FK_SB_ID']) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_SB_ID->ViewValue = $t_lichcongtac->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_SB_ID->ViewValue = NULL;
			}  
    
                       // C_OPTION
        
			if (strval($ar[0]['C_OPTION']) <> "") {
				switch ($ar[0]['C_OPTION']) {
					case "0":
						$t_lichcongtac->C_OPTION->ViewValue = "Sự kiện công khai";
						break;
					case "1":
						$t_lichcongtac->C_OPTION->ViewValue = "Sự kiện quan trọng";
						break;
					default:
						$t_lichcongtac->C_OPTION->ViewValue = $t_lichcongtac->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_OPTION->ViewValue = NULL;
			}
                        
                         // xac dinh thoi gian
                     switch ($ar[0]['C_STATUS_END'])
                            {
                            case "0":
                             $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$ar[0]['C_HOUR_START']."h".$ar[0]['C_MINUTES_STAR'];
                            break;
                            default:
                             $t_lichcongtac->C_THOIGIAN->ViewValue1 = "Từ: ".$ar[0]['C_HOUR_START']."h".$ar[0]['C_MINUTES_STAR']."-".$ar[0]['C_HOUR_END']."h".$ar[0]['C_MINUTES_END'];  
                            } 
                            
                           // C_PARTICIPANTS_ID             
                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
			if (strval($ar[0]['C_PARTICIPANTS_ID']) <> "") {
                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
				$arwrk = explode(",", $ar[0]['C_PARTICIPANTS_ID']);
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
                                $sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
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
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_TENCONGTY').". ";
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
  
?>                             
       <div clas="listcalendar">        
  <div style="border:1px #c2d4da solid;width:740px;font-family:Tahoma; box-shadow: 0 5px 5px -5px #333;">
<table style="width:740px" style="font-family:Tahoma" BORDER=1 RULES=ALL FRAME=VOID bordercolor='#c2d4da'>
		<tr>
                    <td colspan="2">
                        <div class="divheader_calender">
                        <a title="Trở về" class="atrove" href="javascript:history.go(-1)"> &nbsp;</a>   
                        <H2>SỰ KIỆN TRONG NGÀY <?php echo date('j-m-Y',strtotime($ar[0]['C_DATE_STAR'])) ?></H2>
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
                        <form action="calendar.php"> 
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
                <tr><td colspan="2"> <p class="c_namecalendar"> <?php echo $ar[0]['C_TITLE'] ?></p></td></tr>
                <tr>
                    <td style="width: 200px"> <p class="title_calendar"> Nhóm lịch </p></td> 
                    <td> <span class="spantext"> <?php echo $t_lichcongtac->FK_SB_ID->ViewValue; ?></span></td>      
                </tr>
                 <tr>
                      <td> <p class="title_calendar"> Thời gian </p></td> 
                      <td> <span class="spantext"> <?php echo  $t_lichcongtac->C_THOIGIAN->ViewValue1 ?> </span></td>    
                 </tr>
                  <tr>
                      <td> <p class="title_calendar"> Chuẩn bị </p></td> 
                      <td> <span class="spantext"> <?php echo $ar[0]['C_PREPARED'] ?> </span></td>      
                 </tr>
                  <tr>
                      <td> <p class="title_calendar"> Tham dự </p></td> 
                      <td> <span class="spantext"> <?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1; ?> <span class="spantext"> </td>      
                 </tr>
                  <tr>
                      <td> <p class="title_calendar"> Nội dung</p></td> 
                      <td> <div style="padding:5px;"><?php echo $ar[0]['C_CONTENT'] ?> <div></td>      
                 </tr>
                 <tr>
                      <td> <p class="title_calendar"> Địa điểm</p></td> 
                      <td><span class="spantext"><?php echo $ar[0]['C_WHERE'] ?> </span></td>      
                 </tr>
                  <tr>
                      <td> <p class="title_calendar"> Mức độ sự kiện</p></td> 
                      <td><span class="spantext"> <?php echo $t_lichcongtac->C_OPTION->ViewValue ?> </span></td>      
                 </tr>
                 <tr>
                      <td> <p class="title_calendar"> File đính kèm</p></td> 
                      <td><span class="spantext"> <a href="../upload/ATTACK_CALEDAR/<?php echo $ar[0]['C_FILE_ATTACH']?>"> <?php echo $ar[0]['C_FILE_ATTACH'] ?> </a></span></td> 
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
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>


