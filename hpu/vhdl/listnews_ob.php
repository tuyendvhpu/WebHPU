<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
            <?php include 'include/top_header.php' ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">  
         <div class="clearfix"></div>
               <?php
         // config page
        $keyworld = trim(KillChars(htmlspecialchars($_GET['s'])));
        $p = KillChars(ew_HtmlEncode($_GET['p']));
        $obid = KillChars(ew_HtmlEncode($_GET['obid']));// doituong
        $subid = KillChars(ew_HtmlEncode($_GET['subid']));// doituong
        $rows = 12; // số record trên mỗi trang
        $div = 10; // số trang trên 1 phân đoạn
        $start =  $p*$rows;
  
         ?>
         <?php
    $sql = "SELECT COUNT(*) AS total From t_tinbai_mainlevel Inner Join
                    t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                    t_tinbai_levelsite.PK_TINBAI_ID Inner Join
                    t_nguoidung On (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)";
    $sWhere="";
    if (isset($obid) && ($obid <> null))
    {
        $sWhere = "(t_tinbai_mainlevel.FK_DOITUONG_ID='".$obid."') AND ";
    }
    if (isset($subid) && ($subid <> null))
    {
        $sWhere = "(t_tinbai_mainlevel.FK_CHUYENMUC_ID='".$subid."') AND ";
    }
    $sWhere .= "((t_tinbai_levelsite.C_TITLE LIKE '%$keyworld%'))  AND (t_tinbai_mainlevel.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0];
    if ($total > $rows ) $p = KillChars(ew_HtmlEncode($_GET['p'])) ; else $p =0 ;// currentPage
    $sSqlWrk = "Select t_tinbai_mainlevel.PK_TINBAI_MAINLEVEL,
                t_tinbai_mainlevel.PK_TINBAI_ID,
                t_tinbai_mainlevel.FK_CHUYENMUC_ID,
                t_tinbai_mainlevel.FK_DOITUONG_ID,
                t_tinbai_levelsite.C_TITLE,
                t_tinbai_levelsite.C_SUMARY,
                t_tinbai_levelsite.C_CONTENTS,
                t_tinbai_mainlevel.FK_CONGTY,
                t_tinbai_mainlevel.C_COMENT,
                t_tinbai_mainlevel.C_FILEANH,
                t_tinbai_mainlevel.C_HITS,
                t_tinbai_mainlevel.C_ORDER,
                t_tinbai_mainlevel.C_VISITOR,
                t_tinbai_mainlevel.C_USER_ADD,
                t_tinbai_mainlevel.C_ADD_TIME,
                t_tinbai_mainlevel.C_USER_EDIT,
                t_tinbai_mainlevel.C_EDIT_TIME,
                t_tinbai_mainlevel.FK_NGUOIDUNG_ID,
                t_tinbai_mainlevel.FK_EDITOR_ID,
                t_tinbai_mainlevel.FK_ARRAY_CONGTY,
                t_tinbai_levelsite.C_ACTIVE,
                t_tinbai_levelsite.C_ORDER,
                t_nguoidung.C_HOTEN   
                From t_tinbai_mainlevel Inner Join
                    t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                    t_tinbai_levelsite.PK_TINBAI_ID Inner Join
                    t_nguoidung On (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)";
    $sWhereWrk="";
    $tittle_string ="";
    if (isset($obid) && ($obid <> null))
    {
        $sWhereWrk = "(t_tinbai_mainlevel.FK_DOITUONG_ID='".$obid."') AND ";
        $tittle_string = stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG');
    }
    if (isset($subid) && ($subid <> null))
    {
        $sWhereWrk = "(t_tinbai_mainlevel.FK_CHUYENMUC_ID='".$subid."') AND ";
         $tittle_string = stringname($subid,'C_NAME','t_chuyenmuc_levelsite','PK_CHUYENMUC');
    }
    $sWhereWrk .= "((t_tinbai_levelsite.C_TITLE LIKE '%$keyworld%'))  AND (t_tinbai_mainlevel.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
  
?>
            <table style="width:100%">
             <tr>
                 <td>
                     <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                     <?php  $url = "VHDLdoituong-".$obid."-".changeTitle($tittle_string).".html"; ?>    
                     <h2 class="h2title-detail"> <a href="<?php echo $url ?>"><?php echo $tittle_string; ?>  </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                     <div id="search">
                         <form action="VHDLdttimkiem.html" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" /></a>   
                            <input type="hidden" id="t" name="t" value="Tìm kiếm tin tức">
                            <input type="hidden" id="subid" name="subid" value="<?php echo $subid ?>">
                            <input type="hidden" id="obid" name="obid" value="<?php echo $obid ?>">
                            <input type="hidden" id="p" name="p" value="<?php echo $p ?>">
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
                   <td style="text-align: right;width: 20px">
                      <?php include 'include/menu_main.php' ?>        
                 </td>
             </tr>
         </table>     
              
         <table>
             <tr>
                 <td width="57%" style="vertical-align: top">
                   <h2 class="h2title"></h2>
                 <?php  if ($rowswrk >0) { ?>
                    <div id='content_listnotice'>
                 
                 
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                  $url ="VHDLtintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-1-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?>
                                     <br>
                                     <span class="datetime"> VHDL - Thời gian: Creat <?php echo date( 'j/m/Y',strtotime($arwrk[$k]['C_ADD_TIME'])) ?> - <?php if ($arwrk[$k]['FK_EDITOR_ID']== -20) echo  "Authors:".$arwrk[$k]['C_HOTEN']."- BWS"; else echo  "Authors:".$arwrk[$k]['C_HOTEN']; ?> </span>
                                 </a> 
                             </li>    
                              <?php } ?>    
                      </ul>
                       <ul class="trang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>   
                          
                        </div>             
                        <?php } else {?>
                                <div id="norecord">
                                    <p> Không có dữ liệu trong mục này</p>
                                </div>
                        <?php } ?> 

                 </td>
                 <td width="42%" style="vertical-align: top">
                    <?php 
                        $sSqlWrk = "Select * From t_doituong_levelsite";
                        $sWhereWrk = "(t_doituong_levelsite.PK_DOITUONG <> $obid) AND (t_doituong_levelsite.C_TYPE <> 1) AND (t_doituong_levelsite.C_BELOGTO = 0) AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER ASC LIMIT 4";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                        if ($rswrk) $rswrk->Close();
                        $rowswrk = count($arwrk);
                        For ($j=0;$j< $rowswrk;$j++)
                         { 
                    ?> 
                     
                           <?php  
                      $target ="";$url="";
                      switch (strval($arwrk[$j]['C_TYPE']))   
                      {
                                       case "0":
                                                $sSqlWrk = "Select 
                                                        t_tinbai_mainlevel.PK_TINBAI_ID as ID,
                                                        t_tinbai_levelsite.C_TITLE as C_TITLE,
                                                        t_tinbai_mainlevel.C_USER_ADD as C_USER_ADD,
                                                        t_tinbai_mainlevel.C_ADD_TIME as C_ADD_TIME,
                                                        t_tinbai_mainlevel.C_ORDER as C_ORDER,
                                                        t_tinbai_mainlevel.FK_CHUYENMUC_ID as C_CHUYENMUC,
                                                        t_tinbai_mainlevel.FK_DOITUONG_ID as C_DOITUONG,
                                                        t_nguoidung.C_HOTEN   
                                                        From t_tinbai_mainlevel Inner Join
                                                        t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                                                        t_tinbai_levelsite.PK_TINBAI_ID
                                                        Inner Join t_nguoidung On (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                                                        ";
                                                 $sWhereWrk = "(t_tinbai_levelsite.C_ACTIVE = 1) AND (t_tinbai_mainlevel.FK_DOITUONG_ID='".$arwrk[$j]['PK_DOITUONG']."') AND (t_tinbai_mainlevel.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT 10";
                                                 $url_xemthem = "VHDLdoituong-".$arwrk[$j]['PK_DOITUONG']."-".changeTitle($arwrk[$j]['C_NAME']).".html";
                                                 break;
                                        case "2":
						$sSqlWrk = "Select 
                                                            t_thongbao_mainlevel.PK_THONGBAO as ID,
                                                            t_thongbao_mainlevel.C_USER_ADD as C_USER_ADD,
                                                             t_thongbao_mainlevel.C_ADD_TIME as C_ADD_TIME,
                                                            t_thongbao_levelsite.C_TITLE as C_TITLE,
                                                            t_thongbao_mainlevel.C_ORDER as C_ORDER
                                                            From t_thongbao_mainlevel Inner Join
                                                            t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                                                            t_thongbao_mainlevel.PK_THONGBAO ";
                                                $sWhereWrk = "(t_thongbao_mainlevel.C_ACTIVE = '1') AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT 10";	
                                                $url_xemthem  = "VHDLthongbaodt-".$arwrk[$j]['PK_DOITUONG'].".html";
                                                break;
					
					
                      }
                       if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rs = $conn->Execute($sSqlWrk);
			$ar = ($rs) ? $rs->GetRows() : array();
			if ($rs) $rs->Close();
			$rows = count($ar); 
                        ?>
                       <h2 class="h2title"></h2>
                       <h2 style="text-transform: uppercase;padding-left: 15px;font-weight:600;font-family: arial;font-weight:700;font-size: 14px"> <a href="<?php echo $url_xemthem ?>"> <?php echo $arwrk[$j]['C_NAME']?> </a></h2>
                       <ul class="ulcontents1">
                               <?php 
                        for ($x=0;$x<5;$x++)
                            {
                                 switch (strval($arwrk[$j]['C_TYPE']))   
                                    {
                                      case "0":
                                          
                                                $obid= $ar[$x]['C_DOITUONG'];
                                                if ($obid == null) $obid = 0;
                                                $subid= $ar[$x]['C_CHUYENMUC'];
                                                if ($subid == null) $subid = 0;
                                                $url ="VHDLtintuc-".$ar[$x]['ID']."-".$obid."-".$subid."-1-".changeTitle($ar[$x]['C_TITLE']).".html";         
                                                $icon ="";
                                                break;
					case "1":
                                                $url=$ar[$x]['C_LOCATION'];
                                                $icon="<img width=\"35px\" src=\"anh_icon.php?text=".$ar[$x]['ID']."\">" ;
						break;
                                        case "2":
                                                $url ="VHDLthongbao-".$ar[$x]['ID']."-".changeTitle($ar[$x]['C_TITLE']).".html"; 
                                                $icon ="";
						break;
                                    }
                             if ($ar[$x]['ID'] <> null)
                             { 
                            ?>
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url?>">  <?php echo $ar[$x]['C_TITLE']  ?>  
                                     <br>
                                     
                                 </a> 
                             </li>  
                             
                                <?php } 
                              }
                                ?>
<!--                             <li class="lienddt" ><a href="<?php// echo $url_xemthem ?>"> <I>  Xem thêm...</I></span></a></li>-->
                          </ul>
                     <?php } ?>
                 </td>
             </tr> 
             
         </table> 
     
    
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>