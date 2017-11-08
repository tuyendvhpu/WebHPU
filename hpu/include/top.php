

 <?PHP
 if (isset($_GET['PK_TINBAI_ID'])) $PK_TINBAI_ID = KillChars(ew_HtmlEncode($_GET['PK_TINBAI_ID']));
 if (isset($_GET['sturl']))  $sturl =KillChars(ew_HtmlEncode($_GET['sturl'])); 
      switch ($sturl) 
                {
                case 'gioithieu':
                    $sturl = "GIỚI THIỆU";
                    $h1name = 'h1name';
                    $amemnuactive1 ="class=\"amemnuactive\"";
                    BREAK;
                case 'thongbao':
                    $sturl = "THÔNG BÁO";
                    $h1name = 'h1name'; 
                    $amemnuactive2 ="class=\"amemnuactive\"";
                    BREAK;
                case 'tintuc':
                    $sturl = "<a class=\"alevel\" href =\"../tintuc/HPU-tintuc.html\">TIN TỨC </a>";
                    $h1name = 'h1name'; 
                    $amemnuactive3 ="class=\"amemnuactive\"";
                    BREAK;
                    case 'tuyensinh':
                    $sturl = "TUYỂN SINH";
                    $h1name = 'h1name'; 
                    $amemnuactive4 ="class=\"amemnuactive\"";
                    BREAK;
                    case 'sinhvientuonglai':
                    $sturl = "<a class=\"alevel\" href =\"../svtl/svtl.php?sturl=sinhvientuonglai\">SINH VIÊN TƯƠNG LAI </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                    case 'sinhviendanghoc':
                    $sturl = "<a class=\"alevel\" href =\"../svdh/svdh.php?sturl=sinhviendanghoc\">SINH VIÊN ĐANG HỌC </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'cuusinhvien':
                    $sturl = "<a class=\"alevel\" href =\"../cuusv/cuusv.php?sturl=cuusinhvien\">CỰU SINH VIÊN </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'doanhnghiep':
                    $sturl = "<a class=\"alevel\" href =\"../dn/dn.php?sturl=doanhnghiep\">DOANH NGHIỆP </a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'hpusukhacbiet':
                    $sturl = "<a class=\"alevel\" href =\"../tintuc/listnews.php?sturl=hpusukhacbiet&pk_myseft=1\">HPU - SỰ KHÁC BIỆT</a>";
                    $h1name = 'h1name'; 
                    BREAK;
                case 'lichcongtac':
                    $sturl = "<a class=\"alevel\" href =\"../lich-cong-tac/HPUlich.html\">Lịch công tác</a>";
                    $h1name = 'h1name'; 
                    $amemnuactive5 ="class=\"amemnuactive\"";
                    BREAK;
                default :
                    $sturl = "";
                    $h1name = 'h1namehome'; 
                }

  

 ?>

<div id="header">
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
			<a href="../home/trangchu.html" title="Haiphong Private University"> <img src="../images/index/logo.jpg" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="<?php echo $h1name ?>">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <span class="spanlevel"> <?php echo $sturl ?> </span> 
                                         </h1>
                         </td>
                         <td id="col3">
                             <form action="../home/searchapigoogle.php" id="searchForm"   method="get">
                                   <input name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>"  id="searchtxt" type="text" placeholder="Tìm kiếm"   />    
                                   <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                              </form>
                         </td>
                         <td id="col4">
                              <ul id="ulsharelink">
                                  <li><a target="_blank" title="Facebook Haiphong Private University" href="https://www.facebook.com/HaiPhongPrivateUniversity" class="iconface"></a></li>
                                  <li><a target="_blank" title="Twitter Haiphong Private University" href="https://twitter.com/HpuVn" class="icontiwter"> </a></li>
                                  <li><a target="_blank" title="Google+ Haiphong Private University" href="https://plus.google.com/113567665922413102836" class="icongoogle"></a></li>
                                  <li><a target="_blank"  title="Youtube Haiphong Private University" href="https://www.youtube.com/HPUVideoChannel" class="iconyoutobe"></a></li>
                                  <li><a target="_blank" title="Diễn Đàn Haiphong Private University" href="http://diendan.hpu.edu.vn/" class="iconfeed"> </a></li>
                              </ul>
                             <div class="divsitemap" ><a title="Site map Haiphong Private University" class="asitemap" href="../home/HPU-SodoWedSite.html"> <b>Site Map </b> &nbsp; &nbsp; &nbsp;   </a> <a title="Haiphong Private University" href="http://eng.hpu.edu.vn"> <img alt="Website Tiếng Anh HPU" src="../images/index/flagen.gif"/></a> <a title="Haiphong Private University" href="http://hpu.edu.vn"> <img alt="Website Tiếng Việt HPU" src="../images/index/viet_nam.gif"/></a></div>
                         </td>
                     </tr>              
              </table>
          <!-- end header --></div>
          <div id="divnavi">
              <ul id="ulnavi">
                  <li><a  <?php echo $amemnuactive1 ?> title="Giới thiệu về Đại Học Dân Lập Hải Phòng" href="../gioithieu/HPUGT-gioithieu-1.html">Giới thiệu</a></li>
                  <li><a  <?php echo $amemnuactive3?> title="Tin tức về Haiphong Private University" href="../tintuc/HPU-tintuc.html">Tin tức</a></li>
                  <li><a  <?php echo $amemnuactive2 ?>  title="Thông báo tại Haiphong Private University" href="../thongbao/HPUTB-thongbao.html">Thông báo </a></li>
                  <li><a  <?php echo $amemnuactive4 ?> title="Thông tin tuyển sinh Haiphong Private University" href="../tuyensinh/HPUTS-tuyensinh.html">Tuyển sinh </a></li>
                  <li><a   title="Hợp tác quốc tế Haiphong Private University" href="../hoptacquocte/index.php">Hợp tác Quốc tế </a></li>
                  <li><a <?php echo $amemnuactive5 ?> title="Lịch công tác tại Haiphong Private University" href="../lich-cong-tac/HPUlich.html">Lịch công tác</a></li>
                  <li><a target="_blank"   title="Tuyển sinh Haiphong Private University" href="http://tuyensinh.hpu.edu.vn" ><IMG SRC="../images/index/new.gif" style="height:38px;margin-left: -10px;">   <span> Xét tuyển 2017</span> </a></li>
              </ul>
          <!-- end divnavi --></div>