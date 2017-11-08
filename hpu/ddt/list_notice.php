<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
            <?php include 'include/top_header.php' ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">  
         <div class="clearfix"></div>
         <table style="width:100%">
             <tr>
                 <td>
                     <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                     <h2 class="h2title-detail"><a href="DDTthongbao.html"> THÔNG BÁO </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                     <div id="search">
                         <form action="list_notice.php" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" /> <a hreft="#">  </a>   
                            <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
                  <td style="text-align: right;width: 20px">
                     <div class="click-nav">
                    <ul id="dropdown" class="no-js">
                        <li><a href="#" class="parent"><img id="abc" style="padding-top: 5px" src="../images/khoa/SA.jpg" alt="calendar" /></a>    
                        <ul class="children ullienket">
                        <li class="item home"><a target="_blank" href="http://hpu.edu.vn" title="Trang chủ trường Đại Học Dân Lập Hải Phòng" href=""><span><b>Trang chủ HPU </b> </span></a> </li>
                         <li class="item khoa"><a target="_blank" href="http://hpu.edu.vn/gioithieu/home_gioithieu.php?flag=3" title="Khoa bộ môn trường Đại Học Dân Lập Hải Phòng" href=""><span>Khoa - Bộ môn </span></a> </li>
                        <li class="item phong"><a target="_blank" href="http://phong.hpu.edu.vn" title="Khối các phòng trường Đại Học Dân Lập Hải Phòng" href=""><span>Khối phòng </span></a> </li>
                        <li class="item ban"><a target="_blank" href="http://ban.hpu.edu.vn" title="Khôi các ban trường Đại Học Dân Lập Hải Phòng" href=""><span>Khối ban </span></a> </li>
                        <li class="item tttttv"><a target="_blank" href="http://tv.hpu.edu.vn" title="Trung tâm Thông tin Thư viện trường Đại Học Dân Lập Hải Phòng" href=""><span>TT-ThôngTin-Thư viên </span></a> </li>
                        <li class="item mail"> <a target="_blank" href="http://mail.hpu.edu.vn/" title="Hệ thống Mail trường Đại Học Dân Lập Hải Phòng" href=""><span><b> Email </b> </span></a> </li>
                        <li class="item tkb"><a target="_blank" href="../admin/login.php" title="Thời khóa biểu giảng viên" ><span> Thời khóa biểu  </span></li>
                        <li class="item tvs"><a title="Hệ thống Thư viện số tại Đại Học Dân Lập Hải Phòng"  href="DDTlich.html"><span> Thư viện số HPU</span></li>
                        <li class="item dangnhap"><a target="_blank" href="../admin/login.php" title="Hệ thống Đăng Nhập" ><span> HPU Account Service  </span></li>
                        <li class="item qlgiangduong"><a target="_blank" title="Hệ thống Quản Lý Giảng Đường trường Đại Học Dân Lập Hải Phòng"  href="http://qlgd.hpu.edu.vn"><span> Quản lý giảng đường  </span></li>
                        <li class="item vphttt"><a target="_blank" title="Hệ thống Văn phòng hỗ trợ trực tuyến trường Đại Học Dân Lập Hải Phòng"  href="http://vp.hpu.edu.vn"><span> Văn phòng hỗ trợ trực tuyến  </span></li>
                        <li class="item lichcongtac"><a title="Lịch công tác Khoa DDT tại Đại Học Dân Lập Hải Phòng"  href="DDTlich.html"><span><b> Lịch công tác khoa</b></span></li>
                        
                        </ul>
                        </li>  
                    </ul>
                     </div>    
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
    $sWhere = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0];        
    $sSqlWrk = "Select t_thongbao_mainlevel.*,t_thongbao_levelsite.C_TITLE,t_thongbao_levelsite.C_CONTENT From t_thongbao_mainlevel Inner Join
                t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                    t_thongbao_mainlevel.PK_THONGBAO";
    $sWhereWrk = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
?>   

<div id='content_listnotice'>
                        <h2 class="h2title"> </h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $url ="DDTthongbao-".$arwrk[$k]['PK_THONGBAO']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" id="titlereport" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?>
                                     <br>
                                     <span class="datetime"> DDT - Thời gian: từ <?php echo date( 'j/m/Y',strtotime($arwrk[$k]['C_BEGIN_DATE'])) ?> - <?php echo  date( 'j/m/Y',strtotime($arwrk[$k]['C_END_DATE'])) ?> </span>
                                 </a> 
                             </li>    
                              <?php } ?>    
                      </ul>
                       <ul class="trang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>   
                          
</div>             

       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>