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
                     <h2 class="h2title-detail"><a href="DDThethonglienket.html"> TIỆN ÍCH </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                    
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
       <h2 class="h2title"> </h2>
       <?php 
       $conn =  ew_Connect();
       $sSqlWrk = "Select t_doituong_levelsite.PK_DOITUONG as ID,
                t_doituong_levelsite.C_NAME as C_TITLE,
                t_doituong_levelsite.C_LOCATION as C_LOCATION,
                t_doituong_levelsite.C_ORDER as C_ORDER,
                t_doituong_levelsite.C_ICON as C_ICON
                From t_doituong_levelsite";
       $sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_TYPE = 1) AND (t_doituong_levelsite.C_BELOGTO <> 0) AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER DESC ";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";           
       $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);
       ?>
       <div style="min-height: 600px;margin-top: 10px;"> 
            <table style="width:100%">
                <?php for($i=0;$i<$rowswrk;$i++)
                {
                    if ($i%2==0) echo "<tr>";

                ?>
            <td style="width: 50%;vertical-align:top; ">
                <img class="img_logo" src="anh_icon.php?text= <?php echo  $arwrk[$i]['ID'] ?>" alt="HPU Private University"/>
                <div>
                    <h1 class="title_chuyenmuc"> <a target="_blank" href="<?php echo $arwrk[$i]['C_LOCATION'] ?>"> <?php echo $arwrk[$i]['C_TITLE'] ?> </a></h1>
                <div>    
            </td>
            <?php  if ((($i+1)%2)== 0 || ($i==$rowswrk)) echo "</tr>";
                }
            ?> 
            </table>
      </div>	
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>