
 <?php
 
                       	$sSqlWrk = "Select * From t_linkad ";
			$sWhereWrk = "(t_linkad.C_LINKAD_ACTIVE=1) AND (t_linkad.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_linkad.C_ORDER DESC LIMIT 5";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
 if ($rowswrk >0)
 {
           
?>
<div class="slider-wrapper theme-default1" style="position:relative">
    
		        <div id="slider" class="nivoSlider">
                              <?php for($i=0;$i<$rowswrk;$i++) { 
                                   $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   if (($obid == null) || ($obid == 0))  { $atid = 0;} else  {$atid = 1;} 
                                   $url = $arwrk[$i]['C_LINKAD_URL'];   
                                   $re_derect = $arwrk[$i]['C_LINKAD_DES'];
                                   $name =  $arwrk[$i]['C_LINKAD_NAME'];
                                   ?> 
                            <a href="<?php echo $re_derect; ?>" title="<?php echo $name ?>"><img title="#htmlcaption"   src="<?php echo $url ?>" alt="HPU - trường mầm non quốc tế Hữu Nghị"/> </a>
                                                                      
                                    <?php }?> 
               </div>
                                                                                           
		<script type="text/javascript" src="../js/jquery.nivo.slider.js"></script>
		<script type="text/javascript">
		   $('#slider').nivoSlider({
			    effect: 'boxRandom',               // Specify sets like: 'fold,fade,sliceDown'
			    slices: 2,                     // For slice animations
			    boxCols: 2,                     // For box animations
			    boxRows: 2,                     // For box animations
			    animSpeed: 800,                 // Slide transition speed
			    pauseTime: 5000,                // How long each slide will show
			    startSlide: 0,                  // Set starting Slide (0 index)
			    directionNav: true,             // Next & Prev navigation
			    controlNav: true,               // 1,2,3... navigation
			    controlNavThumbs: false,        // Use thumbnails for Control Nav
                            directionNavHide: false,
			    pauseOnHover: true,             // Stop animation while hovering
			    manualAdvance: false,           // Force manual transitions
			    prevText: 'Prev',               // Prev directionNav text
			    nextText: 'Next',               // Next directionNav text
			    randomStart: false,             // Start on a random slide
			    captionOpacity: 1,
			    beforeChange: function(){},     // Triggers before a slide transition
			    afterChange: function(){},      // Triggers after a slide transition
			    slideshowEnd: function(){},     // Triggers after all slides have been shown
			    lastSlide: function(){},        // Triggers when last slide is shown
			    afterLoad: function(){}         // Triggers when slider has loaded
			});
	    </script>
      
	        <div id="block-block-6">
							<div class="content">
							<p>Hãy gọi cho chúng tôi theo HOTLINE:  <span>+084.982 875 079</span></p>
							</div> 
		    </div>
 </div>
    <?php } ?>  