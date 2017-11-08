
<script type="text/javascript">
	
        $( "#sys_hpu" ).click(function() {
	
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

<div id="popup_box">
    <?php
      $sSqlWrk ="";$sWhereWrk ="";
        $sSqlWrk = "Select * From t_htlienquan";
        $sWhereWrk = "(t_htlienquan.C_ACTIVE=1) AND (t_htlienquan.FK_OB_ID LIKE '%5%') ORDER BY t_htlienquan.C_EDIT_TIME DESC LIMIT 7";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);
    ?>

           <table style="width:100%">
               <tr>
                   <td colspan="2">
                       <h2 class="h2event"><b> Danh sách các hệ thống tiện ích Haiphong Private University </b></h2>
                   </td>
               </tr>
           
               <?php for($i=0;$i<$rowswrk;$i++)
                {
                    $url=$arwrk[$i]['C_URL'];
                   $icon="<img alt=\"icon sys HPU\" width=\"30px\" src=\"../include/anh_icon.php?text=".$arwrk[$i]['SYS_ID']."\"/>" ;
                    if ($i%2==0) echo "<tr>";
                ?>
               <td class="systd" >
                <div>
                    <h1 class="title_chuyenmuc"> <?php echo $icon ?>   <a target="_blank" href="<?php echo $url ?>"> <?php echo ew_TruncateMemo($arwrk[$i]['C_NAME'],90, true) ?> </a></h1>
                </div>    
                 </td>
               <?php  if ((($i+1)%2)== 0 || ($i==$rowswrk)) echo "</tr>";
                }
            ?>
             
           </table>    

    <a id="popupBoxClose"><img alt="Close HPU" src="../images/index/x.png"/></a>
</div>
<div id="container"> <!-- Main Page -->
	
</div>