<?php
         $array_pktinbai =array();
	$sSqlWrk = "Select t_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL,
                            t_thongbao_mainlevel.PK_THONGBAO,
                            t_thongbao_mainlevel.FK_CONGTY_ID,
                            t_thongbao_mainlevel.FK_DOITUONG_ID,
                            t_thongbao_levelsite.C_TITLE,
                            t_thongbao_levelsite.C_CONTENT,
                            t_thongbao_mainlevel.C_PUBLISH,
                            t_thongbao_mainlevel.C_TIME_PUBLISH,
                            t_thongbao_mainlevel.C_ACTIVE,
                            t_thongbao_mainlevel.C_ORDER,
                            t_thongbao_mainlevel.C_KEYWORD,
                            t_thongbao_mainlevel.C_BEGIN_DATE,
                            t_thongbao_mainlevel.C_END_DATE,
                            t_thongbao_mainlevel.C_USER_ADD,
                            t_thongbao_mainlevel.C_ADD_TIME,
                            t_thongbao_mainlevel.FK_NGUOIDUNG_ID,
                            t_thongbao_mainlevel.C_TYPE,
                            t_thongbao_mainlevel.C_NOTICE_HIT,
                            t_thongbao_mainlevel.C_USER_EDIT,
                            t_thongbao_mainlevel.C_EDIT_TIME,
                            t_thongbao_mainlevel.FK_CONGTY_SEND
                            From t_thongbao_mainlevel Inner Join
                            t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                            t_thongbao_mainlevel.PK_THONGBAO ";
			$sWhereWrk = "(('".ew_CurrentDateTime()."'  BETWEEN t_thongbao_mainlevel.C_BEGIN_DATE AND  t_thongbao_mainlevel.C_END_DATE) OR ('".ew_CurrentDateTime()."' < t_thongbao_mainlevel.C_BEGIN_DATE)) AND (t_thongbao_mainlevel.C_NOTICE_HIT = 1) AND (t_thongbao_levelsite.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT 5";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);

?>
  <script type="text/javascript" language="javascript">
  $(window).scroll(function(){
    t = parseInt($(window).scrollTop());
   if (t<4500)
   {
   if ((t>630))
     { t = parseInt($(window).scrollTop())-140; }  
    else { t = 0; }
   $('.adv').stop().animate({marginTop:t},0);
   }
})
  </script>

<div class="adv">
    
                           <h2 class="h2title"> Thông báo tiêu điểm</h2>
                           <ul class="ulcontents1">
                              <?php for($k=0;$k<$rowswrk;$k++) { 
                                  if(in_array($arwrk[$k]['PK_THONGBAO'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_THONGBAO']);

                                    }  
                                   $url ="NNthongbao-".$arwrk[$k]['PK_THONGBAO']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?> 
                           </ul>          
                         <h2 class="h2title"> Thông báo liên quan </h2>
                         
  <?php
$string_string_pk ="";
for($k=0;$k<count($array_pktinbai);$k++) {
                            $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                        } 
$string_string_pk = "(".substr($string_string_pk,1).")"; 
	         	$sSqlWrk = "Select t_thongbao_mainlevel.*,t_thongbao_levelsite.C_TITLE,t_thongbao_levelsite.C_CONTENT From t_thongbao_mainlevel Inner Join
                                    t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                                        t_thongbao_mainlevel.PK_THONGBAO";
			$sWhereWrk = "(t_thongbao_mainlevel.PK_THONGBAO NOT IN ".$string_string_pk." ) AND (t_thongbao_mainlevel.C_KEYWORD LIKE '%".$keyworld."%') AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT 5";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);

?>                     
                           <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                    if(in_array($arwrk[$k]['PK_THONGBAO'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_THONGBAO']);

                                    }  
                                   $url ="NNthongbao-".$arwrk[$k]['PK_THONGBAO']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>                           
                           </ul>
  </div>
	
