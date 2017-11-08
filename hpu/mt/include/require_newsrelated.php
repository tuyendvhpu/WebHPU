<?php
        $array_pktinbai =array();
        $sSqlWrk = "Select t_tinbai_mainlevel.*, t_tinbai_levelsite.C_ORDER,t_tinbai_levelsite.C_ACTIVE,
                            t_tinbai_levelsite.C_TITLE,
                            t_tinbai_levelsite.C_SUMARY,
                            t_tinbai_levelsite.C_CONTENTS
                            From t_tinbai_mainlevel Inner Join
                            t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID  ";
	$sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.FK_CHUYENMUC_ID= '".$subid."') AND (t_tinbai_mainlevel.FK_CONGTY = ".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 5";
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
    
                           <h2 class="h2title"> Tin liên quan</h2>
                           <ul class="ulcontents1">
                              <?php for($k=0;$k<$rowswrk;$k++) { 
                                    if(in_array($arwrk[$k]['PK_TINBAI_ID'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_TINBAI_ID']);

                                    } 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   if (($obid == null) || ($obid == 0))  { $atid = 0;} else  {$atid = 1;} 
                                   $url ="MTtintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$atid."-".changeTitle($arwrk[$k]['C_TITLE']).".html";            
                                  ?> 
                               <li> <a data-pjax='content' title="<?php echo $arwrk[$k]['C_TITLE'] ?>" class="pjaxer"href="<?php echo $url ?>">  <?php echo ew_TruncateMemo($arwrk[$k]['C_TITLE'],90, true) ?> </a> </li>    
 <?php } ?> 

                           </ul>          
                         <h2 class="h2title"> Tin xem thêm </h2>
                         
  <?php
   $string_string_pk ="";
   for($k=0;$k<count($array_pktinbai);$k++) {
                                $string_string_pk =  $string_string_pk.",".$array_pktinbai[$k];
                            } 
   $string_string_pk = "(".substr($string_string_pk,1).")"; 
	         	$sSqlWrk = "Select t_tinbai_mainlevel.*, t_tinbai_levelsite.C_ORDER,t_tinbai_levelsite.C_ACTIVE,
                            t_tinbai_levelsite.C_TITLE,
                            t_tinbai_levelsite.C_SUMARY,
                            t_tinbai_levelsite.C_CONTENTS
                            From t_tinbai_mainlevel Inner Join
                            t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID  ";
			$sWhereWrk = "(t_tinbai_mainlevel.PK_TINBAI_ID NOT IN ".$string_string_pk." ) AND (t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.FK_DOITUONG_ID= '".$obid."') AND (t_tinbai_mainlevel.FK_CONGTY = ".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 5";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
?>
                           <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                    if(in_array($arwrk[$k]['PK_TINBAI_ID'],$array_pktinbai)== FALSE)
                                    {
                                        array_unshift($array_pktinbai,$arwrk[$k]['PK_TINBAI_ID']);

                                    } 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   if (($obid == null) || ($obid == 0))  { $atid = 0;} else  {$atid = 1;} 
                                   $url ="MTtintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$atid."-".changeTitle($arwrk[$k]['C_TITLE']).".html";           
                                  ?> 
                             <li> <a data-pjax='content' class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>                           
                           </ul>
  </div>
	
