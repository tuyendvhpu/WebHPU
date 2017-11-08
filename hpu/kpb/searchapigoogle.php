<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
         <div id="contenttop" class="clearfix">
          <div id="header_thongbao">
              <table id="tableheader">
                     <tr>
                         <td id="col6" >
				        <a href="http://hpu.edu.vn" title="Haiphong Private University"> <img src="../images/khoa/img_logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">  <h1 id="h1namehome">TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG 
                                 <br/> <a href="../kpb" title="Haiphong Private University"> <span class="spanlevel">Khối Các Phòng</span> </a> 
                                         <br/> <span class="spandiachi"> </span> 
                         </h1></td>
                         <td id="col4">
                          <div id="divnavi">
		                      <ul id="ulnavi">
				                  <li><a href="Khoiphonggioithieu.html" title="Giới thiệu các phòng tại Haiphong Private University" href="home_gioithieu.php">Giới Thiệu</a></li>
                                                  <li><a href="Khoiphongtintuctonghop.html" title="Tin tức từ các phòng tại Haiphong Private University" href="#">Tin Tức</a></li>
				                  <li><a href="Khoiphongthongbao.html" title="Thông báo từ các phòng tại Haiphong Private University" href="#">Thông Báo</a></li>
                                                  <li><a href="http://hpu.edu.vn/gioithieu/home_gioithieu.php?flag=3" title="Khối các khoa tại Haiphong Private University" href="#">Khối Khoa </a></li>
                                                  <li><a href="http://doanthe.hpu.edu.vn" title="Khối đoàn thể tại Haiphong Private University" href="#">Khối Đoàn Thể </a></li>
                                                  <li><a href="http://ban.hpu.edu.vn" title="Khối các ban tại Haiphong Private University" href="#">Khối Ban </a></li>
				      </ul>
	                  <!-- end divnavi --></div>                
                         </td>
                     </tr>              
              </table>
<!-- end header --></div>
       <!-- end contenttop --></div>

     <div id="contentbody" class="clearfix">
       <link rel="stylesheet" type="text/css" href="../css/styles-google.css" />
        <script type="text/javascript">
        $(document).ready(function () {
             $('#s').val('<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>');
        
        });
    </script>
         <div id="page">
         <form id="searchForm" method="post">
               <fieldset>
                    <input id="s" type="text" />
                    <input class="some-iclass" type="submit" value="Submit" id="submitButton" />
                    
                <br/>
                <div id="searchInContainer">
                    <input type="radio" name="check" value="site" id="searchSite" checked />
                    <label for="searchSite" id="siteNameLabel">Search</label>
                    <input type="radio" name="check" value="web" id="searchWeb" />
                    <label for="searchWeb">Search The Web</label>
                            </div>
                <ul class="icons">
                    <li class="web" title="Web Search" data-searchType="web">Web</li>
                    <li class="images" title="Image Search" data-searchType="images">Images</li>
                    <li class="news" title="News Search" data-searchType="news">News</li>
                    <li class="videos" title="Video Search" data-searchType="video">Videos</li>
                </ul>
            </fieldset>
        </form>
        
</div>

    <div id="resultsDiv"></div>

<script src="../js/script_google.js"></script>
   <SCRIPT TYPE="text/JavaScript">
        window.onload = function () {
              document.getElementById("submitButton").click(); 
    };
          
   </SCRIPT>

       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>