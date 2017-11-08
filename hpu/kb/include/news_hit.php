 <?php
     $sSqlWrk = "SELECT t_tinbai_mainlevel.PK_TINBAI_ID,
       t_tinbai_mainlevel.FK_CHUYENMUC_ID,
       t_tinbai_mainlevel.FK_DOITUONG_ID,
       t_tinbai_levelsite.C_TITLE,
       t_tinbai_levelsite.C_ACTIVE,
       t_tinbai_mainlevel.C_ORDER AS C_ORDER,
       t_tinbai_mainlevel.FK_CONGTY AS FK_CONGTY,
       t_tinbai_levelsite.C_FILEANH as C_FILEANH_LEVEL,
       t_tinbai_mainlevel.C_FILEANH as C_FILEANH_MAIN,
       t_tinbai_mainlevel.C_HITS,
       t_tinbai_levelsite.C_ADD_TIME,
       t_congty.C_TENCONGTY,
       'Tin bài' AS TYPE 
       FROM t_tinbai_mainlevel INNER JOIN t_tinbai_levelsite ON t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID 
       Inner Join t_congty On t_tinbai_mainlevel.FK_CONGTY = t_congty.PK_MACONGTY";
      $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.C_HITS=1) AND (t_tinbai_mainlevel.FK_CONGTY IN ".$_SESSION['FK_CONGTY'].")";
      if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
      $sSqlWrk .= " UNION ALL ";
      $sSqlWrk .= "SELECT 
                DISTINCT t_thongbao_mainlevel.PK_THONGBAO,
                t_thongbao_levelsite.PK_CHUYENMUC_ID,
                t_thongbao_levelsite.FK_DOITUONG_ID,
                t_thongbao_levelsite.C_TITLE,
                t_thongbao_levelsite.C_ACTIVE,
                t_thongbao_mainlevel.C_ORDER AS C_ORDER,
                t_thongbao_levelsite.FK_CONGTY_ID AS FK_CONGTY,
                t_thongbao_levelsite.C_FILEANH as C_FILEANH_LEVEL,
                t_thongbao_mainlevel.C_FILEANH as C_FILEANH_MAIN,
                t_thongbao_levelsite.C_NOTICE_HIT,
                t_thongbao_levelsite.C_ADD_TIME,
                t_congty.C_TENCONGTY,
                'Thông báo' AS TYPE 
                FROM t_thongbao_mainlevel 
                Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO
                Inner Join t_congty On t_thongbao_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY";
     $sWhereWrk="";
     $sWhereWrk .= "(t_thongbao_mainlevel.C_NOTICE_HIT=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY'].") AND ( t_thongbao_mainlevel.C_ACTIVE=1)";
     if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
     $sSqlWrk .=" ORDER BY C_ORDER DESC LIMIT 0,4";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
           
?>
<div id="newhot">        
        <script type="text/javascript">
		jQuery(document).ready(function($){
			$('.tabs').each(function(){
				$(this).find('li:first').addClass('current'); // set the first tab to display
				repeat_slideshow($(this));
			});
			$('.tabs li .tab-select').click(function(){
				$(this).closest('.tabs').find('li').not($(this).parent()).removeClass('current'); // hide all tabs except for the current
				$(this).parent().addClass('current'); // set the current tab to display
				reset_slideshow($(this).closest('.tabs'));
				return false;
			});
			function slideshow(slide)
			{
				var index = slide.find('li.current').index();
				var total = slide.find('li').length;
				if ( index+1 >= total )
					var next = 0;
				else
					var next = index + 1;
				slide.find('li.current').removeClass('current');
				slide.find('li').eq(next).addClass('current');
			}
			function repeat_slideshow(slide)
			{
				slide.data('slideshow', setTimeout(function(){
						slideshow(slide);
						repeat_slideshow(slide);
					}, 5000));
			}
			function stop_slideshow(slide)
			{
				clearTimeout(slide.data('slideshow'));
			}
			function reset_slideshow(slide)
			{
				stop_slideshow(slide);
				repeat_slideshow(slide);
			}
		});
	</script>
 
           <ul class="tabs tabs-3">
                    <?php for($i=0;$i<4;$i++) { 
                         $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                          if ($obid == null) $obid = 0;
                         $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                          if ($subid == null) $subid = 0;
                         $fk_congty = $arwrk[$i]['FK_CONGTY'];
                         if ($arwrk[$i]['TYPE'] == 'Tin bài')
                                 {
                                 $url ="Khoibanchitiettintuc-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";
                                 }
                                 else 
                                 {
                                 $url ="Khoibanchitietthongbao-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";   
                                 }    
                         ?> 
		<li>
                    <div class="tab-select" style="position: relative">
                        <h3> <a href="<?php echo $url; ?>"><?php echo ew_TruncateMemo(ew_HtmlEncode($arwrk[$i]['C_TITLE']),120,true)  ?> </a></h3>
                            <a style="position: absolute;bottom:8px;right: 5px;font-size: 10px;font-style: italic;color:#424343"> <?php echo $arwrk[$i]['C_TENCONGTY']  ?> </a>
			</div>
                        
			<div class="tab-content" id="tab1">
                           <?php 
                           if($arwrk[$i]['C_FILEANH_LEVEL'] == null) $file_anh = $arwrk[$i]['C_FILEANH_MAIN']; else $file_anh = $arwrk[$i]['C_FILEANH_LEVEL'];
                                    // kiểm tra file Anh
                                    $img = $file_anh; 
                           ?>   
                            <a href="<?php echo $url; ?>" title="<?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])?>" > <img style="width:640px;height: 344px" src="<?php echo ew_HtmlEncode($img) ?>"  alt="<?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])  ?>"/> </a>
			 
                        </div>
                 
		</li>
                  <?php }?> 
               
		
	</ul>

         <!-- id newshot--></div>