<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <div id="header">
 <?PHP
 $PK_TINBAI_ID = KillChars(ew_HtmlEncode($_GET['PK_TINBAI_ID']));
 $sturl =KillChars(ew_HtmlEncode($_GET['sturl']));
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
     $sturl = "TIN TỨC";
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
   case 'tintuc':
      $sturl = "<a class=\"alevel\" href =\"../dn/dn.php?sturl=doanhnghiep\">TIN TỨC </a>";
      $h1name = 'h1name'; 
      BREAK;
  
    case 'hpusukhacbiet':
      $sturl = "<a class=\"alevel\" href =\"../tintuc/listnews.php?sturl=hpusukhacbiet&pk_myseft=1\">HPU SỰ KHÁC BIỆT</a>";
      $h1name = 'h1name'; 
      BREAK;
  
  default :
      $sturl = "";
       $h1name = 'h1namehome'; 
 }
 ?>
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
			<a href="../home/index.php" title="Haiphong Private University"> <img src="../images/index/logo.jpg" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="<?php echo $h1name ?>">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <span class="spanlevel"> <?php echo $sturl ?> </span> 
                                         </h1>
                         </td>
                         <td id="col3">
                             
                         </td>
                         <td id="col4">
                              <ul id="ulsharelink">
                                  <li><a  title="Haiphong Private University" href="#" class="iconface"></a></li>
                                  <li><a  title="Haiphong Private University" href="#" class="icontiwter"> </a></li>
                                  <li><a  title="Haiphong Private University" href="#" class="icongoogle"></a></li>
                                  <li><a  title="Haiphong Private University" href="#" class="iconfeed"> </a></li>
                                  <li><a  title="Haiphong Private University" href="#" class="iconyoutobe"></a></li>
                              </ul>                        
                         </td>
                     </tr>              
              </table>
          <!-- end header --></div>
          <div id="divnavi">
              <ul id="ulnavi">
                  <li><a  <?php echo $amemnuactive1 ?> title="Giới thiệu về Đại Học Dân Lập Hải Phòng" href="../gioithieu/home_gioithieu.php?sturl=gioithieu&flag=1">Giới thiệu</a></li>
                  <li><a  <?php echo $amemnuactive ?> title="Haiphong Private University" href="../tintuc/listnews.php?sturl=tintuc">Tin tức</a></li>
                  <li><a  <?php echo $amemnuactive2 ?>  title="Haiphong Private University" href="../thongbao/thongbao.php?sturl=thongbao">Thông báo </a></li>
                  <li><a  <?php echo $amemnuactive4 ?> title="Haiphong Private University" href="../tuyensinh/tuyensinh.php?sturl=tuyensinh">Tuyển sinh </a></li>
                  <li><a  class="aend" <?php echo $amemnuactive ?> title="Haiphong Private University" href="../lichcongtac/HPUlich.html">Lịch công tác</a></li>

              </ul>
          <!-- end divnavi --></div>
       <!-- end contenttop --></div>
    <div id="contentbody" class="clearfix" style="">
       <link rel="stylesheet" type="text/css" href="../css/styles-google.css" />
        <script type="text/javascript">
        $(document).ready(function () {
             $('#s').val('<?php echo KillChars(ew_HtmlEncode($_GET['s'])) ?>');
        
        });
    </script>
    <script>
      (function() {
        var cx = '003949670932657789254:q-uo4qfyclo';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
    </script>
    <gcse:search></gcse:search>

<script src="../js/script_google.js"></script>
   <SCRIPT TYPE="text/JavaScript">
        window.onload = function () {
              document.getElementById("submitButton").click(); 
    };
          
   </SCRIPT>

       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>