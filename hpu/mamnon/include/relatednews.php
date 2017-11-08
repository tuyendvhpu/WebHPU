
<?php
        $array_pktinbai =array();
        $sSqlWrk = "Select t_tinbai_mainlevel.*, t_tinbai_levelsite.C_ORDER,t_tinbai_levelsite.C_ACTIVE,
                            t_tinbai_levelsite.C_TITLE,
                            t_tinbai_levelsite.C_SUMARY,
                            t_tinbai_levelsite.C_CONTENTS
                            From t_tinbai_mainlevel Inner Join
                            t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID  ";
	$sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE=1) AND (t_tinbai_mainlevel.FK_CHUYENMUC_ID= '".$subid."') AND (t_tinbai_mainlevel.FK_CONGTY = ".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 10";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);

?>

<div class="adv" style="padding-left:20px">
<h2 class="h2tittle">Tin liên quan</h2>
                      <ul class="tinlienquan">
                                                
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
                                   $url ="IStintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$atid."-".changeTitle($arwrk[$k]['C_TITLE']).".html";            
                                  ?> 
                               <li> <a data-pjax='content' title="<?php echo $arwrk[$k]['C_TITLE'] ?>" class="atitle" href="<?php echo $url ?>">  <?php echo ew_TruncateMemo($arwrk[$k]['C_TITLE'],90, true) ?> </a> 
                                     <p class="timecreatlist"><?php echo date( 'j/m/Y H:i:s',strtotime($arwrk[$k]['C_ADD_TIME'])) ?></p>
                               </li>    
 <?php } ?> 
                      
                        </ul>
</div>