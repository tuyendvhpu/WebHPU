 <?php
                       	$sSqlWrk = "Select t_tinbai_mainlevel.*, t_tinbai_levelsite.C_ORDER,t_tinbai_levelsite.C_ACTIVE,
                            t_tinbai_levelsite.C_TITLE,
                            t_tinbai_levelsite.C_SUMARY,
                            t_tinbai_levelsite.C_CONTENTS,
                            t_tinbai_levelsite.C_VISITOR,
                            t_tinbai_levelsite.C_COMENT   
                            From t_tinbai_mainlevel Inner Join
                            t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID  ";
                        $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.PK_TINBAI_ID= '".$cadid."') AND (t_tinbai_mainlevel.FK_CONGTY = ".$_SESSION['FK_CONGTY'].")";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        $keyworld = $arwrk[0]['C_KEYWORD'];
                        $timezone  = 7; //(GMT +7:00)
                        //Hiển thị ngày tháng tiếng Việt- TuanDA
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timenow = gmdate("D, d/m/Y - H:i:s", time() + 3600*($timezone));
                        $timenow = str_replace( $str_search, $str_replace, $timenow); 
                         // tinh so luot truy cap tin bai
			$so_lanxem =  $arwrk[0]['C_VISITOR'];
                        $so_lanxem +=1;
			$sSqlWrk = "UPDATE t_tinbai_levelsite SET  C_VISITOR =".$so_lanxem." WHERE (t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_levelsite.PK_TINBAI_ID= '".$cadid."')";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk) $rswrk->Close();
           
?>
<div id='content'>
  <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                       
                    <?php $cadid=  KillChars(ew_HtmlEncode($_GET['catid'],ENT_QUOTES)) ;
                          $obid =  KillChars(ew_HtmlEncode($_GET['obid'],ENT_QUOTES)) ;
                          $subid=  KillChars(ew_HtmlEncode($_GET['subid'],ENT_QUOTES)) ;
                         $flag=  KillChars(ew_HtmlEncode($_GET['flag'],ENT_QUOTES)) ;
                          // giá trj thiết lập tin bài thông báo thuộc 1 đơn vị
                          $_SESSION['FK_CONGTY']=KillChars(ew_HtmlEncode($_GET['fk_congty'],ENT_QUOTES)) ;
                          if ($flag == 1 )
                          {
                                $url = "Khoibangioithieu.html";
                                $title= stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG'); 
                          }
                          else 
                          {    
                                if (($subid <> 0))
                                {
                                    $title= stringname($subid,'C_NAME','t_chuyenmuc_levelsite','PK_CHUYENMUC');
                                    $url ="Khoibanchuyenmuc-".$subid."-". $_SESSION['FK_CONGTY']."-".changeTitle($title).".html";  

                                }
                                else
                                {
                                    $title= stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG'); 
                                    $url ="Khoibantintuctonghop.html";  
                                } 
                          }
                          
                    ?>
                         <h2 class="h2title-detail"><a href="<?php echo $url ?>" style="text-transform: uppercase"> <?php echo $title; ?> </a></h2>
                    </div>  
<h2 class="h2title_tintuch2">
     <?php include "facebook.php" ?>
    
    <span class="pdatetime"> <?php echo $timenow; ?> <img style="cursor: pointer" onclick="printform('ReportTable1')" src="../images/index/img_printer.jpg" /></span> </h2>
<div id="ReportTable1">
<h2 class="h2title_tintuc" >  <?php echo $arwrk[0]['C_TITLE'] ?> </h2>
<div id="divcontents_tintuc">  <?php echo $arwrk[0]['C_SUMARY']?> </div>
<div id="divcontents_tintuc"> 
<?php echo $arwrk[0]['C_CONTENTS']?>
</div>
</div>
 <div id="divvisitor"> <span> Truy cập:  <?php echo $so_lanxem ?> lượt</span></div>
 <?php include "facebook_bottom.php" ?>
<?php if ($arwrk[0]['C_COMENT'] ==1)
{  ?>
<div id="comment">
    <h2><span class="comentbaiviet">&#9830; Ý kiến của bạn: </span></h2>
    <?php 
     $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
     $currentlink = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
     ?>
     <div id="fb-root">
            <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=250208951808920";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
         <div class="fb-comments" data-href="<?php echo KillChars($currentlink);?>" data-width="630" data-num-posts="10" ></div>
     </div>
<!-- end coment--></div>
<?php } ?>
<!-- end contetn--></div>

