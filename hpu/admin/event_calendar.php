<style type="text/css">
/* popup_box DIV-Styles*/
#popup_box { 
	display:none; /* Hide the DIV */
	position:fixed;  
	_position:absolute; /* hack for internet explorer 6 */  
	width:1000px;  
	  background:#FFFFFF ;
	left:150px;
	top: 150px;
	z-index:1000; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
	margin-left: 15px;  
	/* additional features, can be omitted */
	border:2px solid #bababa;  	
	padding:15px;  
	font-size:15px;  
	-moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -box-shadow: 0 0 10px rgba(0,0,0,.4);
	box-shadow: 0 0 5px #bababa;
        overflow-y: scroll;
	
}

#container {
	position: fixed; 
		height: 100%;
		width: 100%;
		background: #000;
		background: rgba(0,0,0,.8);
		z-index: 100;
		display: none;
		top: 0;
		left: 0; 
              
}

a{  
cursor: pointer;  
text-decoration:none;  
} 

/* This is for the positioning of the Close Link */
#popupBoxClose {
	font-size:20px;  
	line-height:15px;  
	right:5px;  
	top:5px;  
	position:absolute;  
	color:#6fa5e2;  
	font-weight:500;  	
}
h1.h1abc {

    text-align: center;
    padding: 20px 0px 10px 0px;
    color: black;
   
}
dl.dlabc {
    padding-left:100px;
}
dl.dlabc dt dd {
  
}
#adongy {
    margin-top: 20px;
}
table.sample {
	border-width: 1px;
	border-spacing: 2px;
	border-style: outset;
	border-color: gray;
	border-collapse: separate;
	background-color: white;
        width: 100%;
        font-size: 10px;
}
table.sample th {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;

}
table.sample td {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;
	
}
h1.h1event {font-size: 14px}
</style>

<script type="text/javascript">
	
        $( "#event_calendar" ).click(function() {
	
		// When site loaded, load the Popupbox First
		loadPopupBox();
	
		$('#popupBoxClose').click( function() {			
			unloadPopupBox();
		});
		
		$('#container').click( function() {
			unloadPopupBox();
		});

		function unloadPopupBox() {	// TO Unload the Popupbox
			$('#popup_box').fadeOut("slow");
			$("#container").css({ // this is just for style		
				"opacity": "1"  
			}); 
                        $("#container").hide();
		}	
		
		function loadPopupBox() {	// To Load the Popupbox
			$('#popup_box').fadeIn("slow");
			$("#container").css({ // this is just for style
				"opacity": "0.5"  
			}); 
                         $("#container").show();
		}
		/**********************************************************/
		
	});
</script>
 <?php
$first_day_of_week = date('Y-m-d', strtotime('Last Monday', time()));
$new_date = strtotime ( '+1 week' , strtotime ( $first_day_of_week ) ) ;
$first_day_of_week = date ( 'Y-m-j' , $new_date );
$tungay= date ( 'j/m/Y' , $new_date );
$last_day_of_week = date('Y-m-d', strtotime('Next Sunday', time()));
$new_date = strtotime ( '+1 week' , strtotime ( $last_day_of_week ) ) ;
$last_day_of_week =  date ( 'Y-m-j' , $new_date );
$denngay= date ( 'j/m/Y' , $new_date );
$sSqlWrk1 = "Select * from t_lichcongtac where (`C_DATE_STAR` BETWEEN '".$first_day_of_week."' AND '".$last_day_of_week."') AND (C_FK_PUBLISH =1) ORDER BY C_DATE_STAR,C_HOUR_START ASC";
$rswrk1 = $conn->Execute($sSqlWrk1);
$arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
if ($rswrk1) $rswrk1->Close();
 ?>
<div id="popup_box">	<!-- OUR PopupBox DIV-->
    <center>
        <h1 class="h1event">Sự kiện đã dự kiến đăng ký trong tuần tới từ: <?php echo $tungay  ?> - <?php echo $denngay; ?></h1>
        <table class="sample">
            <tr class="ewTableHeader">
                <td><center> <b> Thời gian </b></center></td>
                <td><center> <b>Tiêu đề lịch </b></center></td>
                <td><center> <b>Đơn vị </b></center></td>
                <td><center> <b>Thành phần tham gia </b></center></td>
                <td><center> <b>Địa điểm </b></center></td>
                <td><center> <b>Xét duyệt </b></center></td>
            </tr>

<?PHP for ($i =0; $i < count($arwrk1);$i++) {
               // C_TITLE 
               $t_lichcongtac->C_TITLE->ViewValue1 = $arwrk1[$i]['C_TITLE'];

              // C_WHERE
                $t_lichcongtac->C_WHERE->ViewValue1 = $arwrk1[$i]['C_WHERE'];
                
               // C_ORGANIZATION
	        $t_lichcongtac->C_ORGANIZATION->ViewValue1 = $arwrk1[$i]['C_ORGANIZATION'];

                // C_PUBLISH
                $t_lichcongtac->C_PUBLISH->CurrentValue1 = $arwrk1[$i]['C_PUBLISH'];
                if (strval($t_lichcongtac->C_PUBLISH->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_PUBLISH->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_PUBLISH->ViewValue1 = "Không duyệt";
						break;
					case "1":
						$t_lichcongtac->C_PUBLISH->ViewValue1 = "Chờ xét";
						break;
                                        case "2":
						$t_lichcongtac->C_PUBLISH->ViewValue1 = "<b>Duyệt sự kiện <b/>";
						break;
					default:
						$t_lichcongtac->C_PUBLISH->ViewValue1 = $t_lichcongtac->C_PUBLISH->CurrentValue1;
				}
			}


                // FK_CONGTY
              
                 $sFilterWrk = "`PK_MACONGTY` = " .$arwrk1[$i]['FK_CONGTY']. "";
                $sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
                $sWhereWrk = "";
                if ($sFilterWrk <> "") {
                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                }
                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                        $rswrk = $conn->Execute($sSqlWrk);
                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                $t_lichcongtac->FK_CONGTY->ViewValue1 = $rswrk->fields('C_TENCONGTY');
                                $rswrk->Close();
                        } else {
                                $t_lichcongtac->FK_CONGTY->ViewValue1 = $t_lichcongtac->FK_CONGTY->CurrentValue1;
                        }
    // thời gian 
                      $timezone  = 7; //(GMT +7:00)
		        //Hiển thị ngày tháng tiếng Việt
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timestamp = strtotime($arwrk1[$i]['C_DATE_STAR']);
                        $timenow = gmdate("D, d/m/Y", $timestamp + 3600*($timezone)+ 86400);
                        $timenow = str_replace( $str_search, $str_replace, $timenow);
			$t_lichcongtac->C_DATE_STAR->ViewValue1 =$timenow;
                        
   // C_HOUR_START
                        $t_lichcongtac->C_HOUR_START->CurrentValue1 = $arwrk1[$i]['C_HOUR_START'];
			if (strval($t_lichcongtac->C_HOUR_START->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_HOUR_START->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_HOUR_START->ViewValue1 = "0";
						break;
					case "1":
						$t_lichcongtac->C_HOUR_START->ViewValue1 = "1";
						break;
					default:
						$t_lichcongtac->C_HOUR_START->ViewValue1 = $t_lichcongtac->C_HOUR_START->CurrentValue1."h";
				}
			} else {
				$t_lichcongtac->C_HOUR_START->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_HOUR_START->CssStyle = "";
			$t_lichcongtac->C_HOUR_START->CssClass = "";
			$t_lichcongtac->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
                         $t_lichcongtac->C_MINUTES_STAR->CurrentValue1 = $arwrk1[$i]['C_MINUTES_STAR'];
			if (strval($t_lichcongtac->C_MINUTES_STAR->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_MINUTES_STAR->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue1 = "0";
						break;
					default:
						$t_lichcongtac->C_MINUTES_STAR->ViewValue1 = $t_lichcongtac->C_MINUTES_STAR->CurrentValue1;
				}
			} else {
				$t_lichcongtac->C_MINUTES_STAR->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
                        $t_lichcongtac->C_STATUS_STAR->CurrentValue1 = $arwrk1[$i]['C_STATUS_STAR'];
			if (strval($t_lichcongtac->C_STATUS_STAR->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_STATUS_STAR->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_STATUS_STAR->ViewValue1 = "XXX";
						break;
                                        case "1":
						$t_lichcongtac->C_STATUS_STAR->ViewValue1 = "";
						break;
					default:
						$t_lichcongtac->C_STATUS_STAR->ViewValue1 = $t_lichcongtac->C_STATUS_STAR->CurrentValue1;
				}
			} else {
				$t_lichcongtac->C_STATUS_STAR->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac->C_STATUS_STAR->ViewCustomAttributes = "";                     
                        
                        // C_HOUR_END
                        $t_lichcongtac->C_HOUR_END->CurrentValue1 = $arwrk1[$i]['C_HOUR_END'];
			if (strval($t_lichcongtac->C_HOUR_END->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_HOUR_END->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_HOUR_END->ViewValue1 = "1";
						break;
					default:
						$t_lichcongtac->C_HOUR_END->ViewValue1 = $t_lichcongtac->C_HOUR_END->CurrentValue1."h";
				}
			} else {
				$t_lichcongtac->C_HOUR_END->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_HOUR_END->CssStyle = "";
			$t_lichcongtac->C_HOUR_END->CssClass = "";
			$t_lichcongtac->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
                        $t_lichcongtac->C_MINUTES_END->CurrentValue1 = $arwrk1[$i]['C_MINUTES_END'];
			if (strval($t_lichcongtac->C_MINUTES_END->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_MINUTES_END->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_MINUTES_END->ViewValue1 = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_END->ViewValue1 = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_END->ViewValue1 = $t_lichcongtac->C_MINUTES_END->CurrentValue1;
				}
			} else {
				$t_lichcongtac->C_MINUTES_END->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac->C_MINUTES_END->CssClass = "";
			$t_lichcongtac->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
                         $t_lichcongtac->C_STATUS_END->CurrentValue1 = $arwrk1[$i]['C_STATUS_END'];
			if (strval($t_lichcongtac->C_STATUS_END->CurrentValue1) <> "") {
				switch ($t_lichcongtac->C_STATUS_END->CurrentValue1) {
					case "0":
						$t_lichcongtac->C_STATUS_END->ViewValue1 = "XXX";
						break;
                                        case "1":
						$t_lichcongtac->C_STATUS_END->ViewValue1 = "";
						break;
					default:
						$t_lichcongtac->C_STATUS_END->ViewValue1 = $t_lichcongtac->C_STATUS_END->CurrentValue1;
				}
			} else {
				$t_lichcongtac->C_STATUS_END->ViewValue1 = NULL;
			}
			$t_lichcongtac->C_STATUS_END->CssStyle = "";
			$t_lichcongtac->C_STATUS_END->CssClass = "";
			$t_lichcongtac->C_STATUS_END->ViewCustomAttributes = "";
                        
         
                         // C_PARTICIPANTS_ID
                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
			if (strval($arwrk1[$i]['C_PARTICIPANTS_ID']) <> "") {
                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1="";
				$arwrk = explode(",", $arwrk1[$i]['C_PARTICIPANTS_ID']);
                                $findme   = 'x_';
                                $array_company = array();
                                $array_user = array();
                                FOR ($j=0;$j< count ($arwrk);$j++)   
                                {
                                         $pos = strpos($arwrk [$j], $findme);
                                        if ($pos === false) {
                                                    $array_company[$i] =  substr($arwrk [$i],0,-1);
                                                    } else {
                                                   $array_user[$i] =  substr(strstr($arwrk [$i],'x'),2);
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
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1 .= $rswrk->fields('C_TENCONGTY')."<br/>";
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
            <tr>
                <td><div style="width:150px;"><?PHP ECHO $t_lichcongtac->C_DATE_STAR->ViewValue1  ?>
                <div><?php echo $t_lichcongtac->C_HOUR_START->ViewValue1 ?><?php echo $t_lichcongtac->C_MINUTES_STAR->ViewValue1 ?><?php echo $t_lichcongtac->C_STATUS_STAR->ViewValue1 ?> - <?php echo $t_lichcongtac->C_HOUR_END->ViewValue1 ?><?php echo $t_lichcongtac->C_MINUTES_END->ViewValue1 ?><?php echo $t_lichcongtac->C_STATUS_END->ViewValue1 ?></div>
                </div>
                </td>
                <td><div style="width:250px;"><?PHP ECHO  $t_lichcongtac->C_TITLE->ViewValue1 ?></div></td>
                <td><?PHP ECHO $t_lichcongtac->FK_CONGTY->ViewValue1?></td>
                <td><div style="width:200px;"><?PHP ECHO $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue1  ?></div>
                    <div style="width:200px;"><?PHP echo nl2br($t_lichcongtac->C_ORGANIZATION->ViewValue1)  ?></div>
                </td>
                <td><div style="width:150px;"><?PHP ECHO $t_lichcongtac->C_WHERE->ViewValue1  ?></div></td>
                <td><div style="width:50px;"><?PHP ECHO $t_lichcongtac->C_PUBLISH->ViewValue1  ?></div></td>
            </tr>
 <?PHP } ?>           
            
        </table>
 
    </center>    
    <a id="popupBoxClose"><img src="images/x.png"></a>
</div>
<div id="container"> <!-- Main Page -->
	
</div>


