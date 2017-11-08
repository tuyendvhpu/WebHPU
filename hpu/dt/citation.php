<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
            <?php include 'include/header_intro.php';
              $ative_dt =2;
            ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix"> 
             <div id="divnavi">
                <?php include 'include/menu_navi.php' ?>      
            <!-- end divnavi --></div>
         <div class="clearfix"></div>
         <?php
         // config page         
        $keyworld = trim(KillChars(htmlspecialchars($_GET['s'])));
        $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
        $obid = KillChars(ew_HtmlEncode($_GET['obid']));// doituong
        $subid = KillChars(ew_HtmlEncode($_GET['subid']));// doituong
        $rows = 20; // số record trên mỗi trang
        $div = 10; // số trang trên 1 phân đoạn
        $start =  $p*$rows;
         ?>
         
         <table style="width:100%">
             <tr>
                 <td>
                     <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                     <h2 class="h2title-detail"><a href="Doanthetuyenduong.html"> TUYÊN DƯƠNG </a></h2>
                    </div>
                 </td>
                 <td style="width: 40%">
                     <div id="search">
                         <form action="Doanthetuyenduong.html" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" />   
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
<?php
    $sql = "SELECT COUNT(*) AS total From t_tinbai_mainlevel Inner Join
                    t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID 
                    Inner Join
                    t_nguoidung On (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                    Inner Join
                    t_doituong_levelsite On t_tinbai_levelsite.FK_DOITUONG_ID = t_doituong_levelsite.PK_DOITUONG";
            
    $sWhere="";
    if (isset($obid) && ($obid <> null))
    {
        $sWhere = "(t_tinbai_mainlevel.FK_DOITUONG_ID='".$obid."') AND ";
    }
    if (isset($subid) && ($subid <> null))
    {
        $sWhere = "(t_tinbai_mainlevel.FK_CHUYENMUC_ID='".$subid."') AND ";
    }
    $sWhere .= "((t_tinbai_levelsite.C_TITLE LIKE '%$keyworld%')) AND ((t_doituong_levelsite.C_NAME LIKE '%Tuyen duong%')) AND ((t_doituong_levelsite.C_NAME LIKE '%Gioi thieu%')) AND (t_tinbai_mainlevel.FK_CONGTY IN ".$_SESSION['FK_CONGTY'].") AND ( t_tinbai_levelsite.C_ACTIVE=1)ORDER BY t_tinbai_mainlevel.C_ORDER DESC";
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
                t_tinbai_mainlevel.C_USER_ADD,
                t_tinbai_mainlevel.C_ADD_TIME,
                t_tinbai_mainlevel.C_USER_EDIT,
                t_tinbai_mainlevel.C_EDIT_TIME,
                t_tinbai_mainlevel.FK_NGUOIDUNG_ID,
                t_tinbai_mainlevel.FK_EDITOR_ID,
                t_tinbai_mainlevel.FK_ARRAY_CONGTY,
                t_tinbai_levelsite.C_ACTIVE,
                t_tinbai_levelsite.C_ORDER,
                t_nguoidung.C_HOTEN,
                t_congty.C_TENCONGTY
                From t_tinbai_mainlevel Inner Join
                t_tinbai_levelsite On t_tinbai_mainlevel.PK_TINBAI_ID =
                    t_tinbai_levelsite.PK_TINBAI_ID Inner Join
                t_nguoidung On (t_tinbai_mainlevel.C_USER_ADD = t_nguoidung.PK_NGUOIDUNG_ID)
                Inner Join
                t_congty On t_tinbai_mainlevel.FK_CONGTY = t_congty.PK_MACONGTY
                Inner Join t_doituong_levelsite On t_tinbai_levelsite.FK_DOITUONG_ID = t_doituong_levelsite.PK_DOITUONG";
    $sWhereWrk="";
    $tittle_string ="";
    if (isset($obid) && ($obid <> null))
    {
        $sWhereWrk = "(t_tinbai_mainlevel.FK_DOITUONG_ID='".$obid."') AND ";
        $tittle_string = " - ".stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG');
    }
    if (isset($subid) && ($subid <> null))
    {
        $sWhereWrk = "(t_tinbai_mainlevel.FK_CHUYENMUC_ID='".$subid."') AND ";
         $tittle_string =  " - ".stringname($subid,'C_NAME','t_chuyenmuc_levelsite','PK_CHUYENMUC');
    }
    $sWhereWrk .= "((t_tinbai_levelsite.C_TITLE LIKE '%$keyworld%')) AND ((t_doituong_levelsite.C_NAME LIKE '%Tuyen duong%')) AND (t_tinbai_mainlevel.FK_CONGTY IN ".$_SESSION['FK_CONGTY'].") AND ( t_tinbai_levelsite.C_ACTIVE=1) ORDER BY t_tinbai_mainlevel.C_ORDER DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
   if ($rowswrk >0)
   {
?>   

<div id='content_listnotice'>
                        <h2 class="h2title"></h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                 $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                 $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                 $fk_congty = $arwrk[$k]['FK_CONGTY'];
                                 $url ="Doanthechitiettintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
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
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>