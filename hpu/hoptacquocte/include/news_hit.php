 <?php
      $sSqlWrk = "SELECT t_tinbai_mainlevel.PK_TINBAI_ID,
       t_tinbai_mainlevel.FK_CHUYENMUC_ID,
       t_tinbai_mainlevel.FK_DOITUONG_ID,
       t_tinbai_levelsite.C_TITLE,
       t_tinbai_levelsite.C_ACTIVE,
       t_tinbai_levelsite.C_ORDER AS C_ORDER,
       t_tinbai_mainlevel.FK_CONGTY AS FK_CONGTY,
       t_tinbai_levelsite.C_FILEANH as C_FILEANH_LEVEL,
       t_tinbai_mainlevel.C_FILEANH as C_FILEANH_MAIN,
       t_tinbai_mainlevel.C_HITS,
       t_nguoidung.C_HOTEN, 
       t_tinbai_levelsite.C_ADD_TIME,
       t_congty.C_TENCONGTY,
       'Tin bài' AS TYPE 
       FROM t_tinbai_mainlevel INNER JOIN t_tinbai_levelsite ON t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID INNER JOIN t_nguoidung ON (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
       Inner Join t_congty On t_tinbai_mainlevel.FK_CONGTY = t_congty.PK_MACONGTY";
       $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.C_HITS=1) AND (t_tinbai_mainlevel.FK_CONGTY = ".$_SESSION['FK_CONGTY'].")";
      if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
      $sSqlWrk .= " UNION ALL ";
      $sSqlWrk .= "SELECT 
                t_thongbao_mainlevel.PK_THONGBAO,
                t_thongbao_levelsite.PK_CHUYENMUC_ID,
                t_thongbao_levelsite.FK_DOITUONG_ID,
                t_thongbao_levelsite.C_TITLE,
                t_thongbao_levelsite.C_ACTIVE,
                t_thongbao_mainlevel.C_ORDER AS C_ORDER,
                t_thongbao_levelsite.FK_CONGTY_ID AS FK_CONGTY,
                t_thongbao_levelsite.C_FILEANH as C_FILEANH_LEVEL,
                t_thongbao_mainlevel.C_FILEANH as C_FILEANH_MAIN,
                t_thongbao_levelsite.C_NOTICE_HIT,
                t_nguoidung.C_HOTEN,
                t_thongbao_levelsite.C_ADD_TIME,
                t_congty.C_TENCONGTY,
                'Thông báo' AS TYPE 
                FROM t_thongbao_mainlevel 
                Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO
                INNER JOIN t_nguoidung ON (t_thongbao_levelsite.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                Inner Join t_congty On t_thongbao_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY";
     $sWhereWrk="";
     $sWhereWrk .= "(t_thongbao_mainlevel.C_NOTICE_HIT=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID = ".$_SESSION['FK_CONGTY'].") AND ( t_thongbao_mainlevel.C_ACTIVE=1)";
     if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
     $sSqlWrk .=" ORDER BY C_ORDER DESC LIMIT 10";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                 

?>
<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="jslidernews2" class="lof-slidecontent" style="width:984px; height:300px;">
	<div class="preload"><div></div></div>
            <div  class="button-previous">Previous</div>    
    		 <!-- MAIN CONTENT --> 
              <div class="main-slider-content" style="width:700px; height:300px;">
                <ul class="sliders-wrap-inner">
                      <?php for($i=0;$i<$rowswrk;$i++) { 
                         $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                          if ($obid == null) $obid = 0;
                         $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                          if ($subid == null) $subid = 0;
                         $fk_congty = $arwrk[$i]['FK_CONGTY'];
                         if ($arwrk[$i]['TYPE'] == 'Tin bài')
                                 {
                                 $url ="TT-Thongtin-Thuvientintuc-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";
                 
                                 }
                                 else 
                                 {
                                 $url ="TT-Thongtin-Thuvienthongbao-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";   
                                 }   
                                 
                         ?> 
                    <li>
                           <?php 
                           if($arwrk[$i]['C_FILEANH_MAIN'] == null) $file_anh = $arwrk[$i]['C_FILEANH_LEVEL']; else $file_anh = $arwrk[$i]['C_FILEANH_MAIN'];
                                    // kiểm tra file Anh
                                    $img = $file_anh;
                               
                               ?>   
                         <a href="<?php echo $url ?>" title="<?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])?>">  <img style="width:700px;height: 299px" src="<?php echo ew_HtmlEncode($img) ?>"  alt="<?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])  ?>" >  </a>         
                    </li> 
                        <?php } ?>
                  </ul>  	
            </div>
 		   <!-- END MAIN CONTENT --> 
           <!-- NAVIGATOR -->
           	<div class="navigator-content">
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                             <?php for($i=0;$i<$rowswrk;$i++) { 
                         $obid= $arwrk[$i]['FK_DOITUONG_ID'];
                          if ($obid == null) $obid = 0;
                         $subid=  $arwrk[$i]['FK_CHUYENMUC_ID'];
                          if ($subid == null) $subid = 0;
                         $fk_congty = $arwrk[$i]['FK_CONGTY'];
                         if ($arwrk[$i]['TYPE'] == 'Tin bài')
                                 {
                                 $url ="TT-Thongtin-Thuvienchitiettintuc-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";
                                 }
                                 else 
                                 {
                                 $url ="TT-Thongtin-Thuvienchitietthongbao-".$arwrk[$i]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$i]['C_TITLE']).".html";   
                                 }    
                         ?> 
                          <li>
                                <div>
                                    <h3> <?php echo ew_HtmlEncode($arwrk[$i]['C_TITLE'])?> </h3>
                                </div>    
                            </li>
                            <?php } ?> 
             </div> 
          <!----------------- END OF NAVIGATOR --------------------->
          <div class="button-next">Next</div>
 
 		 <!-- BUTTON PLAY-STOP -->
          <div class="button-control"><span></span></div>
          <!-- END OF BUTTON PLAY-STOP -->
 </div> 
</div>
<!------------------------------------- END OF THE CONTENT ------------------------------------------------->


