 <?php
 
                       	$sSqlWrk = "Select t_tinbai_mainlevel.PK_TINBAI_MAINLEVEL,
                                    t_tinbai_mainlevel.PK_TINBAI_ID,
                                    t_tinbai_mainlevel.FK_CHUYENMUC_ID,
                                    t_tinbai_mainlevel.FK_DOITUONG_ID,
                                    t_tinbai_levelsite.C_TITLE as C_TITLE,
                                    t_tinbai_levelsite.C_SUMARY as C_SUMARY,
                                    t_tinbai_levelsite.C_CONTENTS,
                                    t_tinbai_mainlevel.FK_CONGTY,
                                    t_tinbai_mainlevel.C_COMENT,
                                    t_tinbai_mainlevel.C_FILEANH as C_FILEANH,
                                    t_tinbai_mainlevel.C_HITS,
                                    t_tinbai_mainlevel.C_ORDER
                                From t_tinbai_mainlevel Inner Join
                                t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                                t_tinbai_levelsite.PK_TINBAI_ID";
			$sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.C_HITS=1) AND (t_tinbai_mainlevel.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 4";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
           
?>
<div id="slidorion" class="slidorion">
		<div class="slider">
                     <?php for($i=0;$i<$rowswrk;$i++) { 
                                   $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   if (($obid == null) || ($obid == 0))  { $atid = 0;} else  {$atid = 1;} 
                                   $url ="MTtintuc-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$atid."-".changeTitle($arwrk[$i]['C_TITLE']).".html";   
                                    // kiểm tra file Anh
                                    $img = $arwrk[$i]['C_FILEANH'];
                                   ?> 
                          <div class="slide"><a  href="<?php echo $url; ?>"> <img style="width: 665px;height: 335px" src="<?php echo $img ?>" alt="Haiphong Private University" /></a></div>
                        <?php }?> 
                       
		</div>

		<div class="accordion">
                      <?php for($i=0;$i<$rowswrk;$i++) { 
                               $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                         if (($obid == null) || ($obid == 0))  { $atid = 0;} else  {$atid = 1;} 
                                   $url ="MTtintuc-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$atid."-".changeTitle($arwrk[$i]['C_TITLE']).".html";          
                          ?> 
                        <div class="header"> <?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])  ?> </div>
			<div class="content">
                            <p><?php echo ew_TruncateMemo ($arwrk[$i]['C_SUMARY'],150,'<b>')  ?>   </p>
                            <div style="text-align: right"> <a class="achitiet" href="<?php echo $url; ?>">Chi tiết...</a></div>
			</div>
			<?php }?> 
		</div>
	</div>

   <script src="../js/jquery.easing.js"></script>
   <script src="../js/jquery.slidorion.js"></script>
    <script>
	$(function() {
		$('#slidorion').slidorion({
			interval: 5000,
			effect: 'overRandom'
		});
	});
	</script>