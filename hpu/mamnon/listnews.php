<?php include "include/header.php" ?>
<div id="wrapper">
 <div id="layout" class="clearfix">
     <?php include "include/top.php" ?>
     <div id="contentbody" class="clearfix">   
     <?php include "include/sideshow_index.php" ?>
     <div style="clear:both"></div>
    <table id="tablecontentbody_baby">
                 <tr>
                       <td class="col1">
                       <h2 class="h2tittle">Tin tức</h2>
                       
    <?php
         // config page
        $keyworld = trim(KillChars(htmlspecialchars($_GET['s'])));
        $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
       $obid = KillChars(ew_HtmlEncode($_GET['obid']));// doituong
       $subid = KillChars(ew_HtmlEncode($_GET['subid']));// doituong
        $rows = 5; // số record trên mỗi trang
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
                        <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $obid= $arwrk[$k]['FK_DOITUONG_ID'];
                                   if ($obid == null) $obid = 0;
                                   $subid=  $arwrk[$k]['FK_CHUYENMUC_ID'];
                                   if ($subid == null) $subid = 0;
                                  $url ="IStintuc-".$arwrk[$k]['PK_TINBAI_ID']."-".$obid."-".$subid."-0-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                         <div class="list_listnews">
                            <h2 class="coh2title"> <a href="<?php echo $url ?>"> <?php echo $arwrk[$k]['C_TITLE'] ?> </a></h2>
                            <p class="timecreat"><?php echo date( 'j/m/Y H:i:s',strtotime($arwrk[$k]['C_ADD_TIME'])) ?></p>
                              <img class="imglistnew" src="<?php echo catch_that_image($arwrk[$k]['C_CONTENTS']) ?>" alt="picnoidung1" />
                              <div class="divsumarylistnew"> 
                                  <div style="height: 120px;"> 
                               <?php echo ew_TruncateMemo($arwrk[$k]['C_SUMARY'], 400, "ul,li")  ?>
                                   </div>
                                  <div style="clear: both"></div>
                                  <a class="aseemorelistnew" href="<?php echo $url ?>" > Xem thêm</a>
                              </div>
                           <div style="text-align:right;clear:both"> </div>                       
                          <!-- end list_list_listnews --> </div>
                         <?php } ?>    
                          
   <?php } else {?>
         <div id="norecord">
             <p> Không có dữ liệu trong mục này</p>
         </div>
  <?php } ?>                       
                             
                           <ul class="phantrang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>                                           
                      </td> 
                      <td class="col2"> 
                            <?php include "include/relatednews.php" ?>            
                      </td>
                   </tr>    
          </table>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id='bttop'></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include "include/footer.php" ?>   