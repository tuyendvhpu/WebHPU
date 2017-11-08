<?php include "../include/header.php" ?>
<body>
<div id="wrapper">
 <div id="layout_z" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
     <!-- end layout --></div>
     <div id="contentfull">
    <link href="../css/rs-default.css" rel="stylesheet"/>
    <link href="../css/royalslider.css" rel="stylesheet"/>
    <script src="../js/jquery.royalslider.min.js"></script>
    <script type="text/javascript" src="../admin/jwplayer/jwplayer.js" ></script>
    <script type="text/javascript">jwplayer.key="DgSYP3+z2KZmAcqBgZURQ/WGTJFm551pH4GoPf8koLDAwdjy7jRZVbqbQNkRCZoN";</script>
     <!-- slider css -->
    <style type="text/css"/> 
.visibleNearby .rsGCaption {
  font-size: 16px;
  line-height: 18px;
  padding: 12px 0 16px;
  background: #141414;
  width: 100%;
  position: static;
  float: left;
  left: auto;
  bottom: auto;
  text-align: center;
}



    </style>

     <div class="sliderContainer visibleNearby fullWidth clearfix">
		  <div id="gallery-1" class="royalSlider rsDefault">   
                  <?php 
                    $conn = ew_Connect();
                    $sSqlWrk = "Select * From advertising";
                    $sWhereWrk = "(advertising.advertising_state = 1) AND (advertising.advertising_pos = 1)";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    
                    $rswrk = $conn->Execute($sSqlWrk);
                    $arwrk_pic= ($rswrk) ? $rswrk->GetRows() : array();
                    for ($j=0;$j<count($arwrk_pic);$j++)
                          { 
                    ?>
                    <?php if ($arwrk_pic[$j]['advertising_type']==2) {?> <div><embed src="../upload/ad/<?php echo $arwrk_pic[$j]['advertising_url'] ?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="objflash" width="500" height="255"> <?php echo $arwrk_pic[$j]['advertising_name'] ?></div> <?php } ?>
                    <?php if ($arwrk_pic[$j]['advertising_type']==3) {?> <div><div id="mediaplayer<?php echo $j ?>"></div><span class="rsTmb"><?php echo $arwrk_pic[$j]['advertising_name'] ?></span></div> <?php } ?>
		    <?php if ($arwrk_pic[$j]['advertising_type']==1) {?> <a class="rsImg" href="../upload/ad/<?php echo $arwrk_pic[$j]['advertising_url'] ?>"><?php echo $arwrk_pic[$j]['advertising_name'] ?></a> <?php } ?>
                    <?php if ($arwrk_pic[$j]['advertising_type']==4) {?> <a class="rsImg" href="../upload/ad/<?php echo $arwrk_pic[$j]['advertising_url'] ?>"  data-rsvideo="<?php echo $arwrk_pic[$j]['advertising_desc'] ?>"><?php echo $arwrk_pic[$j]['advertising_name'] ?></a> <?php } ?>
                    <?php } ?>
                  </div>
	</div>
    <script>
  jQuery(document).ready(function($) {
  var si = $('#gallery-1').royalSlider({
    addActiveClass: true,
    arrowsNav: false,
    controlNavigation: 'none',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 340,
    loop: true,
    fadeinLoadedSlide: false,
    globalCaption: true,
    keyboardNavEnabled: true,
    globalCaptionInside: false,

    visibleNearby: {
      enabled: true,
      centerArea: 0.5,
      center: true,
      breakpoint: 650,
      breakpointCenterArea: 0.64,
      navigateByCenterClick: true
    }
  }).data('royalSlider');

  // link to fifth slide from slider description.
  $('.slide4link').click(function(e) {
    si.goTo(4);
    return false;
  });
});
</script>
<?php 
for ($j=0;$j<count($arwrk_pic);$j++)
    { 
   if ($arwrk_pic[$j]['advertising_type']==3)
   {
?>

<script>
 jwplayer('mediaplayer<?php echo $j ?>').setup({
    flashplayer: '../admin/jwplayer/player.swf',
    id: 'playerID',
    width: '500',
    heigh: '255',
    file: "/hpu/upload/ad/<?php echo $arwrk_pic[$j]['advertising_url'] ?>",
    image: '../images/HPUvideo.jpg'
    });
</script>
<?php } }?>

     <!-- end contentfull --></div>

 <div id="layout_y" class="clearfix">
       <div id="contentbody11" class="clearfix">
           <table id="tablecontentbody" style="width: 100%">
               <tr>
                   <?PHP
                   $conn = ew_Connect();
                    $sSqlWrk = "Select DTSVTUONGLAI_ID,C_NAME,C_ACTIVE,C_URL,C_TYPE From t_doituong_svtuonglai";
                    $sWhereWrk = "(t_doituong_svtuonglai.C_ACTIVE = 1) AND (t_doituong_svtuonglai.C_BELONGTO = 0) limit 0,4";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    $rswrk = $conn->Execute($sSqlWrk);
                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                    if ($rswrk) $rswrk->Close(); 
                    for ($i=0;$i<count($arwrk);$i++)
                    { 
                           $url= "../tintuc/listnews_oba.php?sturl=sinhvientuonglai&dtsvtuonglai_id=".$arwrk[$i]['DTSVTUONGLAI_ID']; 
                   ?>
                    <td style="width:25%;vertical-align:top">
                       <p class="ptextheader"> <?PHP ECHO $arwrk[$i]['C_NAME'] ?> </p>
                         <ul id="ulchuyenmuc">
                             <?php
                            $sWhereWrk ="";
                            $sSql = "Select DTSVTUONGLAI_ID,C_NAME,C_ACTIVE,C_URL,C_TYPE From t_doituong_svtuonglai";
                            $sWhereWrk = "(t_doituong_svtuonglai.C_ACTIVE = 1) AND (t_doituong_svtuonglai.C_BELONGTO = ".$arwrk[$i]['DTSVTUONGLAI_ID'].") ORDER BY C_TIME_EDIT DESC,C_TIME_ADD DESC limit 0,5";
                            if ($sWhereWrk <> "") $sSql .= " WHERE $sWhereWrk";
                            $rs = $conn->Execute($sSql);
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $rows = count($ar);
                            if ($rows >0)
                            {
                               for ($j=0;$j<$rows;$j++)
                               { 
                                   switch ($ar[$j]['C_TYPE']) {
                                     case 0:
                                        $url_pk= "../tintuc/detailnews.php?sturl=sinhvientuonglai&pk_tuyensinh=".$ar[$j]['DTSVTUONGLAI_ID']."&PK_TINBAI_ID=".$ar[$j]['PK_TINBAI_ID']; 
                                        $taget_blank = "";
                                        break;
                                     case 1:
                                        $url_pk= "../tintuc/HPUSVTL-".$ar[$j]['DTSVTUONGLAI_ID']."-sinhvientuonglai.html"; 
                                        $taget_blank = "";
                                        break;
                                     case 2:
                                        $url_pk= $ar[$j]['C_URL']; 
                                        $taget_blank = "target=\"_blank\"";
                                        break;
                                   }
                                 
                           
                             ?>
                              <li> <a <?php echo $taget_blank ?> href="<?php echo $url_pk ?>"> >> <?php echo $ar[$j]['C_NAME'] ?> </a></li>
                              <?php 
                               }
                            }
                            ?>
                        </ul>
                       
                   </td>
                    <?php } ?>   
                   
                  
               </tr>
          
          </table>

       <!-- end contentbody--></div>
    <!-- end layput_z--></div>

   <div id="contentbotton" class="clearfix">
      <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>