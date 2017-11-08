 <!-- Liquid Slider relies on jQuery and easing effects-->
    <link rel="stylesheet" type="text/css" media="screen" href="../css/liquid-slider.css"/>
    <script src="../js/jquery.easing.1.3.js"></script>
    <!-- Optional code for enabling touch -->
    <script src="../js/jquery.touchSwipe.min.js"></script>
    <!-- This is Liquid Slider code. The full version (not .min) is also included in the js directory -->
    <script src="../js/jquery.liquid-slider.js"></script>
     <link rel="stylesheet" href="../css/reveal.css">	 
     <script type="text/javascript" src="../js/jquery.reveal.js"></script>
    
    <?php if (ew_HtmlEncode($_GET['flag'])<> null) 
    {  
            $t= ew_HtmlEncode($_GET['flag']);  
            if ($t==2)
            // be gin khoi cac khoa
                    $url_cntt="http://cntt.hpu.edu.vn/CNTTthongbao.html";
                    $url_vhdl="http://vhdl.hpu.edu.vn/VHDLthongbao.html";
                    $url_xd="http://xd.hpu.edu.vn/XDthongbao.html";
                    $url_nn="http://nn.hpu.edu.vn/NNthongbao.html";
                    $url_qt="http://qt.hpu.edu.vn/QTthongbao.html";
                    $url_dt="http://ddt.hpu.edu.vn/DDTthongbao.html";
                    $url_mt="http://mt.hpu.edu.vn/MTthongbao.html";
                    $url_cb="http://cbcs.hpu.edu.vn/CBthongbao.html";
                    $url_tc="http://gdtc.hpu.edu.vn/TCthongbao.html";
                // End khoi cac khoa
                    // khối trung tâm 
                    $url_tv="http://tv.hpu.edu.vn/TT-Thongtin-Thuvienthongbao.html";  
                    $url_kpb= "http://phong.hpu.edu.vn/Khoiphongthongbao.html";
                    $url_kb= "http://ban.hpu.edu.vn/Khoibanthongbao.html";


            if ($t ==1)
            {

            $url_cntt="http://cntt.hpu.edu.vn";
            $url_vhdl="http://vhdl.hpu.edu.vn";
            $url_xd="http://xd.hpu.edu.vn";
            $url_nn="http://nn.hpu.edu.vn";
            $url_qt="http://qt.hpu.edu.vn";
            $url_dt="http://ddt.hpu.edu.vn";
            $url_mt="http://mt.hpu.edu.vn";
            $url_cb="http://cbcs.hpu.edu.vn";
            $url_tc="http://gdtc.hpu.edu.vn";
            $url_tv="http://tv.hpu.edu.vn";
            $url_kpb= "http://phong.hpu.edu.vn";
            $url_kb= "http://ban.hpu.edu.vn";
            $t =1;
            }  
            if ($t ==3)
            {

            $url_cntt="http://cntt.hpu.edu.vn";
            $url_vhdl="http://vhdl.hpu.edu.vn";
            $url_xd="http://xd.hpu.edu.vn";
            $url_nn="http://nn.hpu.edu.vn";
            $url_qt="http://qt.hpu.edu.vn";
            $url_dt="http://ddt.hpu.edu.vn";
            $url_mt="http://mt.hpu.edu.vn";
            $url_cb="http://cbcs.hpu.edu.vn";
            $url_tc="http://gdtc.hpu.edu.vn";
            $url_tv="http://tv.hpu.edu.vn";
            $url_kpb= "http://phong.hpu.edu.vn";
            $url_kb= "http://ban.hpu.edu.vn";
            $t =2;
            }  
            if ($t ==4)
            {

           $url_cntt="http://cntt.hpu.edu.vn";
            $url_vhdl="http://vhdl.hpu.edu.vn";
            $url_xd="http://xd.hpu.edu.vn";
            $url_nn="http://nn.hpu.edu.vn";
            $url_qt="http://qt.hpu.edu.vn";
            $url_dt="http://ddt.hpu.edu.vn";
            $url_mt="http://mt.hpu.edu.vn";
            $url_cb="http://cbcs.hpu.edu.vn";
            $url_tc="http://gdtc.hpu.edu.vn";
            $url_tv="http://tv.hpu.edu.vn";
            $url_kpb= "http://phong.hpu.edu.vn";
            $url_kb= "http://ban.hpu.edu.vn";
            $t =3;
            }  
 }  else 
 {
             $t =1;
 }    
     
$conn = ew_Connect();
$sSqlWrk = "Select * From t_danhmucgioithieu";
$sWhereWrk = "(t_danhmucgioithieu.C_ACTIVE = 1)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();   
        ?>
     <script>
    $(function(){
      /* Here is the slider using default settings */
       $('#slider-id').liquidSlider({
              firstPanelToLoad: <?php echo $t ?>,
              useCSSMaxWidth: 1000,
              fadeInDuration:400,
              fadeOutDuration: 400,
              /* hideSideArrows: true,*/
              hoverArrows: false, 
              keyboardNavigation: true

          });


    });
    </script> 
       <div class="liquid-slider"  id="slider-id">
       <div class="divgioithieu clearfix" style="position:relative;height:550px;width:980px;">
<?php     
for ($i=0;$i<count($arwrk);$i++)
{ 
    switch ($arwrk[$i]['C_TYPE'])
    {
        case 0:
            $url= "../tintuc/detailnews.php?pk_intro=".$arwrk[$i]['PK_DANHMUCGIOITHIEU'];
            $sSql ="";$sWhere ="";
            $sSql = "SELECT PK_TINBAI_ID,C_TITLE,FK_DMGIOITHIEU_ID FROM t_tinbai_levelsite";
            $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.FK_DMGIOITHIEU_ID  ='".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."') LIMIT 1";
            if ($sWhere <> "") $sSql .= " WHERE $sWhere";
            $rs = $conn->Execute($sSql);
           // $url= "../tintuc/detailnews.php?sturl=gioithieu&pk_intro=".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."&PK_TINBAI_ID=".$rs->fields['PK_TINBAI_ID'];
            $url ="../tintuc/HPUGTTT-".$rs->fields['FK_DMGIOITHIEU_ID']."-".$rs->fields['PK_TINBAI_ID']."-".changeTitle($rs->fields['C_TITLE']).".html";
        break;
        case 1:
            $url= "../tintuc/HPUGT-".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
        break;
    }
    $url_gd = "../tintuc/".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."-Doi-Ngu-Giang-Day.html"
    ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==1) { ?>   <a class="tile asumang" data-reveal-id="myModal" href="#"> <img src="../images/index/img_sumang.jpg" alt="Haiphong Private University" /> </a> <?php } ?>
       <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==2) { ?> <a class="tile attnb" href="<?php echo $url ?>"><img src="../images/index/img_thanhtichnoibat.jpg" alt="Haiphong Private University" /> </a> <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==9) { ?>   <a class="tile accdt" href="<?php echo $url ?>"> <img src="../images/index/img_chuongtrinhdaotao.jpg" alt="Haiphong Private University" /> </a> <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==3) { ?>   <a class="tile athuht" href="<?php echo $url ?>"><img src="../images/index/img_thuthayhieutruong.jpg" alt="Haiphong Private University" /> </a> <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==4) { ?>   <a class="tile alsht" href="<?php echo $url ?>"> <img src="../images/index/img_lichsuhinhthanh.jpg" alt="Haiphong Private University" />  </a>  <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==5) { ?>   <a class="tile acsvc" href="<?php echo $url ?>"><img src="../images/index/img_cosovatchat.jpg" alt="Haiphong Private University" />  </a> <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==6) { ?>   <a class="tile abhtt" href="<?php echo $url ?>"><img src="../images/index/bacongkhai.jpg" alt="Haiphong Private University" />  </a>  <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==7) { ?>   <a class="tile acdv" href="<?php echo $url ?>"> <img src="../images/index/img_cacdonvi.jpg" alt="Haiphong Private University" />  </a>  <?php } ?>
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==8) { ?>   <a class="tile adt" href="<?php echo $url ?>"><img src="../images/index/tochudoanthe.jpg" alt="Haiphong Private University" /> </a> <?php } ?>   
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==10) { ?> <a class="tile adtCDR" href="<?php echo $url ?>"><img src="../images/index/img_chuandaura.jpg" alt="Haiphong Private University" /> </a> <?php } ?> 
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==12) { ?> <a class="tile adtDNGD" href="<?php echo $url_gd ?>"><img src="../images/index/img_doingugiangday.jpg" alt="Haiphong Private University" /> </a> <?php } ?> 
   <?php if ($arwrk[$i]['PK_DANHMUCGIOITHIEU'] ==11) { ?> <a class="tile avbpq" href="<?php echo $url ?>"><img src="../images/index/vanbanphapquy.jpg" alt="Haiphong Private University" /> </a> <?php } ?>  
     <?php } ?> 

    <div id="myModal" class="reveal-modal">
        <img  src="../images/index/sumang.jpg" alt="Su mang Hai Phong Private University">
			<a class="close-reveal-modal"><img src="../images/index/x.png" alt="Close"></a>
    </div>
   
   <div id="myModal1" class="reveal-modal" style="margin-left: 300px;" >
      
           <div class="adv" >
                          <h2 class="h2bgevent"> &nbsp;</h2> 
                           <p><a target="_blank" href="http://xd.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoaxaydung.jpg"></a></p>
                           <p><a target="_blank" href="http://mt.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoamoitruong.jpg"></p>
                           <p><a target="_blank" href="http://cntt.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoacntt.jpg"></p>
                           <p><a target="_blank" href="http://ddt.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoadiendientu.jpg"></p>
                           <p><a target="_blank" href="http://nn.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoangoaingu.jpg"></p>
                           <p><a target="_blank" href="http://vhdl.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoavanhoadulich.jpg"></p>
                           <p><a target="_blank" href="http://qt.hpu.edu.vn/ScientificProfile.html"><img class="img_iconkhoa" src="../images/index/img_th_khoaquantrikinhdoanh.jpg"></p>
                          <a class="close-reveal-modal"><img src="../images/index/x.png" alt="Close"></a>
            </div>
        
<style type="text/css"> 
    .img_iconkhoa:hover { -moz-box-shadow: 0 0 10px #5b8bed; -webkit-box-shadow: 0 0 10px #5b8bed; box-shadow: 0 0 10px #5b8bed; } 
</style>
    </div>

        <!-- end divgioithieu --></div>
         <div class="divgioithieu clearfix" style="position:relative;height:550px;width:990px;">
                 <a class="tile asumang" href="<?php echo $url_tc ?>"> <strong> <img src="../images/index/img_khoagiaoducthechat.jpg" alt="Haiphong Private University" />  </strong> </a>
                 <a class="tile attnb" href="<?php echo $url_cntt ?>"> <strong> <img src="../images/index/img_khoacntt.jpg" alt="Haiphong Private University" />  </strong> </a>
                 <a class="tile accdt" href="<?php echo $url_cb ?>"> <strong> <img src="../images/index/img_khoacbcs.jpg" alt="Haiphong Private University" />   </strong> </a>
        	 <a class="tile athuht" href="<?php echo $url_dt?>"> <strong> <img src="../images/index/img_khoadiendientu.jpg" alt="Haiphong Private University" />  </strong> </a>
        	 <a class="tile alsht" href="<?php echo $url_xd ?>"> <strong> <img src="../images/index/img_khoaxaydung.jpg" alt="Haiphong Private University" />  </strong> </a>
        	 <a class="tile acsvc" href="<?php echo $url_qt ?>"> <strong> <img src="../images/index/img_khoaqtkd.jpg" alt="Haiphong Private University" />  </strong> </a> 
        	 <a class="tile abhtt" href="<?php echo $url_mt ?>"> <strong> <img src="../images/index/img_khoamt.jpg" alt="Haiphong Private University" />   </strong> </a>  
                 <a class="tile acdv"  href="<?php echo $url_vhdl ?>"> <strong> <img src="../images/index/img_khoavhdl.jpg" alt="Haiphong Private University" />  </strong> </a>  
                 <a class="tile adt" href="<?php echo $url_nn ?>"> <strong> <img src="../images/index/img_khoaNN.jpg" alt="Haiphong Private University" />  </strong> </a>     
        	  
        <!-- end divgioithieu --></div>
        
        <div class="divgioithieu clearfix" style="position:relative;height:550px;width:1000px;">
                 
               <a class="tile aphong" href="<?php echo $url_kpb ?>"> <strong> <img id="image1" src="../images/index/img.jpg" alt="Haiphong Private University" />  </strong> </a>
               <a class="tile aban" href="<?php echo $url_kb ?>"> <strong> <img src="../images/index/img_ban.jpg" alt="Haiphong Private University" />  </strong> </a>
               <a class="tile atrungtam" href="<?php echo $url_tv ?>"> <strong> <img src="../images/index/img_trungtam.jpg" alt="Haiphong Private University" /> </strong> </a>
              <a class="tile amamnon" href="http://is.hpu.edu.vn/"> <strong> <img src="../images/index/img_mannon.jpg" alt="Haiphong Private University" /> 
			   </strong> </a>
        	   
        	   <strong>     
        <!-- end divgioithieu --></strong></div>                                 
      <!-- Liquid Slider Ends Here --> </div>