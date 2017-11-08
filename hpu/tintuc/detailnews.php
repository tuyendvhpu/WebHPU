<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
  <script type="text/javascript" src='../js/pjax-standalone.js'></script> 
          <script type='text/javascript'>
              pjax.connect('content', 'pjaxer');
		 pjax.connect({
                        'useClass':'pjaxer',
			'container': 'content',
			'beforeSend': function(){console.log("before send");},
			'complete': function(){console.log("done!");
                        FB.XFBML.parse();
                    }
		});
		//pjax.connect('content');
		//pjax.connect();
</script>
       <div id="contentbody" class="clearfix">
         <div >
             <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                 <h2 class="h2title-detail"> 
                     <?php 
                    $pk_gioithieu = KillChars(ew_HtmlEncode($_GET['pk_intro']));
                    $pk_tuyensinh = KillChars(ew_HtmlEncode($_GET['pk_tuyensinh']));
                    $dtsvtuonglai_id = KillChars(ew_HtmlEncode($_GET['dtsvtuonglai_id']));
                    $dtsvdanghoc_id = KillChars(ew_HtmlEncode($_GET['dtsvdanghoc_id']));
                    $dtcuusinhvien_id = KillChars(ew_HtmlEncode($_GET['dtcuusinhvien_id']));
                    $dtdoanhnghiep_id = KillChars(ew_HtmlEncode($_GET['dtdoanhnghiep_id']));
                    $pk_myseft = KillChars(ew_HtmlEncode($_GET['pk_myseft']));
                     if ($pk_gioithieu <> null && isset($pk_gioithieu))
                      {
                        $title = stringname($pk_gioithieu, 'C_NAME', 't_danhmucgioithieu','PK_DANHMUCGIOITHIEU'); 
                      } 
                      
                      if ($pk_tuyensinh <> null && isset($pk_tuyensinh))
                      {
                        $title = stringname($pk_tuyensinh, 'C_NAME', 't_danhmuctuyensinh','PK_DANHMUCTUYENSINH'); 
                      }
                      if ($dtsvtuonglai_id <> null && isset($dtsvtuonglai_id))
                      {
                        $title = stringname($dtsvtuonglai_id, 'C_NAME', 't_doituong_svtuonglai','DTSVTUONGLAI_ID'); 
                      }
                      if ($dtsvdanghoc_id <> null && isset($dtsvdanghoc_id))
                      {
                        $title = stringname($dtsvdanghoc_id, 'C_NAME', 't_doituong_svdanghoc','DTSVDANGHOC_ID'); 
                      }
                      if ($dtcuusinhvien_id <> null && isset($dtcuusinhvien_id))
                      {
                        $title = stringname($dtcuusinhvien_id, 'C_NAME', 't_doituong_cuusv','DTCUUSV_ID'); 
                      }
                      if ($dtdoanhnghiep_id <> null && isset($dtdoanhnghiep_id))
                      {
                        $title = stringname($dtdoanhnghiep_id, 'C_NAME', 't_doituong_doanhnghiep','DTDOANHNGHIEP_ID'); 
                      }
                      if ($pk_myseft <> null && isset($pk_myseft))
                      {
                        $title = "TIN TỨC HPU"; 
                      }
                      if ($title == "") $title ="TIN TỨC";
                       ECHO $title; 
                       
                       ?></h2>
            </div>
            <table class="tablechitietbaiviet">
               <tr>
                 
                   <td class="col2">
                       <?PHP
                            $sSqlWrk = "SELECT * FROM t_tinbai_levelsite";
                            $sWhereWrk = "(t_tinbai_levelsite.PK_TINBAI_ID = ".$PK_TINBAI_ID.") AND (t_tinbai_levelsite.C_ACTIVE_MAINSITE=1) ORDER BY t_tinbai_levelsite.C_ORDER DESC LIMIT 7";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();
                            $rowswrk = count($arwrk);  
                            $today = strtotime ($arwrk[0]['C_ADD_TIME']);
                            $active_public =$arwrk[0]['C_ORDER_MAINSITE'];
                            $timezone  = 7; //(GMT +7:00)
                          //Hiển thị ngày tháng tiếng Việt- TuanDA
                            $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                            $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                            $timenow = gmdate("D, d/m/Y - H:i:s", $today + 3600*($timezone));
                            $timenow = str_replace( $str_search, $str_replace, $timenow); 
                       ?>
                         
                             
<h2 class="h2title_thongbao"> &nbsp;<span class="pdatetime"> <?php echo $timenow; ?> <img src="../images/index/img_printer.jpg" /></span> </h2>
<h2 class="h2title_report" >  <?php echo $arwrk[0]['C_TITLE'] ?> </h2>
<div id="divsumary"> 
<?php echo $arwrk[0]['C_SUMARY']?>
</div>
<div id="divcontents" > 
<?php echo  str_replace("<p>
	&nbsp;</p>", " ", $arwrk[0]['C_CONTENTS']);?>
</div>

  <?php include '../include/related_newsolds.php'; ?> 


 <?php include "facebook_bottom.php" ?>
<?php if ($arwrk[0]['C_COMMENT_MAINSITE'] ==1)
{  ?>
<div id="comment">
    <?php 
     $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
      $currentlink = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
     ?>
     <div id="fb-root">
    <script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=464981060279361";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

             <div class="fb-comments" data-href="<?php echo $currentlink ;?>" data-width="580" data-num-posts="10" ></div>
     </div>
<!-- end coment--></div>
<?php } ?>
                   </td> 
  <script type="text/javascript" language="javascript">
  $(window).scroll(function(){
    t = parseInt($(window).scrollTop());
    var result = $("#divcontents").height();
    
   if (t<result)
   {
   if ((t>630))
     { t = parseInt($(window).scrollTop())-140; }  
    else { t = 0; }
   $('.adv').stop().animate({marginTop:t},0);
   }
})


  </script>
 
                   <td class="col1">
                    <?php include '../include/include_newshit.php'; ?> 
                   </td> 
                   <td class="col3">
                     <?php include '../include/include_newsrelated.php'; ?> 
                 
                   </td> 
               </tr>
            
            </table>
         
         </div>
          <div class="clearBoth"></div>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>