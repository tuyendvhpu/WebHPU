<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
          <?php include 'include/top_header.php';
             $_SESSION['FK_CONGTY'] = KillChars(ew_HtmlEncode($_GET['fk_congty']));
             $obid = KillChars(ew_HtmlEncode($_GET['obid']));// doituong
             $subid = KillChars(ew_HtmlEncode($_GET['subid']));// doituong
          ?>
       <!-- end contenttop --></div>
       <div id="contentbody" class="clearfix">
            
              <table class="tablechitietbaiviet">
               <tr>
                   <td class="col2">
                     <?php include 'include/include_detainews.php' ?>         
                   </td>
                    <td class="col3">
                        <div style="height:43px"></div>
                       <?php include 'include/include_noticescience.php' ?>  
                   </td> 
                   <td class="col1">
                        <div style="height:43px"></div>
                       <?php include 'include/include_noticeschool.php' ?>     
                   </td> 
               </tr>
            </table>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>
