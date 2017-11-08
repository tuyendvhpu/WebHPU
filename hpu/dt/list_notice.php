<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
            <?php include 'include/header_notice.php';
             $ative_dt =3;
            ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix"> 
          <div id="divnavi">
                <?php include 'include/menu_navi.php' ?>      
          <!-- end divnavi --></div>
         <div class="clearfix"></div>
         <table style="width:100%">
             <tr>
                 <td>
                     <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                     <h2 class="h2title-detail"><a href="Doanthethongbao.html"> THÔNG BÁO </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                     <div id="search">
                         <form action="Doanthethongbao.html" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" />   
                            <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
                  <td style="text-align: right;width: 20px">
                         <?php include 'include/menu_main.php' ?>   
                 </td>
             </tr>
         </table>   
<?php
$keyworld = trim(KillChars(htmlspecialchars($_GET['s'])));
$p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
$rows = 12; // số record trên mỗi trang
$div = 10; // số trang trên 1 phân đoạn
$start =  $p*$rows;
       $sql = "SELECT COUNT(*) AS total From t_thongbao_mainlevel Inner Join
                            t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                            t_thongbao_mainlevel.PK_THONGBAO ";
    $sWhere = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0];        
    $sSqlWrk = "Select 
                t_thongbao_mainlevel.*,
                t_thongbao_levelsite.PK_THONGBAO,
                t_thongbao_levelsite.C_TITLE,
                t_thongbao_levelsite.C_CONTENT,
                t_thongbao_levelsite.PK_CHUYENMUC_ID,
                t_congty.C_TENCONGTY
                From t_thongbao_mainlevel Inner Join
                t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                    t_thongbao_mainlevel.PK_THONGBAO Inner Join
                t_congty On t_thongbao_levelsite.FK_CONGTY_ID = t_congty.PK_MACONGTY";
    $sWhereWrk = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID IN ".$_SESSION['FK_CONGTY'].") GROUP BY t_thongbao_mainlevel.PK_THONGBAO ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT $start,$rows";
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
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['PK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                   $fk_congty = $arwrk[$k]['FK_CONGTY_ID'];
                                   $url ="Doanthechitietthongbao-".$arwrk[$k]['PK_THONGBAO']."-".$obid."-".$subid."-".$fk_congty."-".changeTitle($arwrk[$k]['C_TITLE']).".html";            
                                  ?> 
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?>
                                     <br>
                                     <span class="datetime"> <?php echo $arwrk[$k]['C_TENCONGTY'] ?>  - Thời gian: từ <?php echo date( 'j/m/Y',strtotime($arwrk[$k]['C_BEGIN_DATE'])) ?> - <?php echo  date( 'j/m/Y',strtotime($arwrk[$k]['C_END_DATE'])) ?> </span>
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