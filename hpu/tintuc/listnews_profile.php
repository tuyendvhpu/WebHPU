<?php include "../include/header.php" ?>
<body>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
           <?php include "../include/top.php" ?>
       <!-- end contenttop --></div>
    <?php
            $p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
           $rows = 12; // số record trên mỗi trang
           $div = 10; // số trang trên 1 phân đoạn
           $start =  $p*$rows;
           
            $pk_gioithieu = KillChars(ew_HtmlEncode($_GET['pk_intro']));
         
    ?>
       <div id="contentbody" class="clearfix">
         <div id="contentheader">
               <div>
            <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                 <h2 class="h2title-detail"><?php echo stringname(KillChars(ew_HtmlEncode($_GET['pk_intro'])), 'C_NAME', 't_danhmucgioithieu','PK_DANHMUCGIOITHIEU') ?></h2>
            </div>
            <table class="tablechitietbaiviet">
               <tr>
                   <td class="col2">
                              <h2 class="h2title">&nbsp; <span class="pdatetime"><?php echo $timenow; ?> <img src="../images/index/img_printer.jpg" /></span></h2>
                             <div id="divcontents">
                                <ul class="ulcontentsdaotao">
                                        <li> <b> <a target="_blank" href="http://vhdl.hpu.edu.vn/ScientificProfile.html"> Đội ngũ giảng dạy Khoa Văn Hóa Du Lịch </a> </b>
                                                 <div class="divsumary">  Lý lịch, Quá trình công tác chuyên môn, Quá nghiên cứu khoa học của các giảng viên</div>
                                                 <div class="divclear"></div>
                                        </li>  
                                </ul>
                              <ul class="trang"><?php  echo divPage($total,$p,$div,$rows,$keyworld); ?></ul>   
                              </div>
                   </td> 
                    <td class="col1">
                    <?php include "../include/left_intro.php" ?>
                   </td> 
                   <td class="col3">
                     <?php include "../include/right_intro.php" ?>
                   </td> 
                   
               </tr>
            
            </table>
         
         </div>
      <div class="clearBoth"></div>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
   <div id="contentbotton" class="clearfix">
           <?php include "../include/footter.php" ?> 
       <!-- end contentbottom--></div>
 <!-- end wrapper--></div>
</body>
</html>