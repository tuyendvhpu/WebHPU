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
        $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
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
                t_tinbai_levelsite.C_USER_ADD,
                t_tinbai_levelsite.C_ADD_TIME,
                t_tinbai_mainlevel.C_USER_EDIT,
                t_tinbai_mainlevel.C_EDIT_TIME,
                t_tinbai_mainlevel.FK_NGUOIDUNG_ID,
                t_tinbai_mainlevel.FK_EDITOR_ID,
                t_tinbai_mainlevel.FK_ARRAY_CONGTY,
                t_tinbai_levelsite.C_ACTIVE,
                t_tinbai_levelsite.C_ORDER,
                t_nguoidung.C_HOTEN AS C_HOTEN   
                From t_tinbai_mainlevel Inner Join
                    t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                    t_tinbai_levelsite.PK_TINBAI_ID Inner Join
                    t_nguoidung On (t_tinbai_levelsite.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)";
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
    
   if ($rowswrk >0)
   {
?>  
         <table style="width:100%">
             <tr>
                 <td>
                     <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                         <?php     $url= "QTchuyenmuc-".$subid."-".changeTitle($arwrk[$i]['C_NAME']).".html" ?>
                     <h2 class="h2title-detail"> <a href="<?php $url ?>"><?php echo $tittle_string; ?>  </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                     <div id="search">
                         <form action="QTchuyenmuc.html" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(KillChars(htmlspecialchars($_GET['s']))) ?>" type="text" placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" /> </a>   
                            <input type="hidden" id="t" name="t" value="Tìm kiếm tin tức">
                            <input type="hidden" id="subid" name="subid" value="<?php echo $subid ?>">
                            <input type="hidden" id="obid" name="obid" value="<?php echo $obid ?>">
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
                  <td style="text-align: right;width: 20px">
                      <?php include 'include/menu_main.php' ?>      
                 </td>
             </tr>
         </table>   
 

<div id='content_listnotice'>
                        <h2 class="h2title"></h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                  $url ="QTtintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-0-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?>
                                     <br>
                                     <span class="datetime"> QT - Thời gian: Creat <?php echo date( 'j/m/Y',strtotime($arwrk[$k]['C_ADD_TIME'])) ?> - <?php if ($arwrk[$k]['FK_EDITOR_ID']== -20) echo  "Authors:".$arwrk[$k]['C_HOTEN']."- BWS"; else echo  "Authors:".$arwrk[$k]['C_HOTEN']; ?> </span>
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
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter_1.php' ?>