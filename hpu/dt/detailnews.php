<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
        <div id="layout" class="clearfix">
            <div id="contenttop" class="clearfix">
                    <?php include 'include/top_header.php' ?>
            <!-- end contenttop --></div>
            <div id="contentbody" class="clearfix">
                     <div id="divnavi">
                <?php include 'include/menu_navi.php' ?>      
            <!-- end divnavi --></div>
                    <?php $cadid=  KillChars(ew_HtmlEncode($_GET['catid'],ENT_QUOTES)) ;
                          $obid =  KillChars(ew_HtmlEncode($_GET['obid'],ENT_QUOTES)) ;
                          $subid=  KillChars(ew_HtmlEncode($_GET['subid'],ENT_QUOTES)) ;
                          // giá trj thiết lập tin bài thông báo thuộc 1 đơn vị
                          $_SESSION['FK_CONGTY']=KillChars(ew_HtmlEncode($_GET['fk_congty'],ENT_QUOTES)) ;
                          
                    ?>
                    <table class="tablechitietbaiviet">
                    <tr>
                        <td class="col2">
                             <?php include 'include/require_detailnews.php' ?>    
                        </td> 
                        <td class="col1">
                            <div style="height:47px"></div>
                            <?php include 'include/require_newsrelated.php' ?>   
                        </td> 
                        <td class="col3">
                            <div style="height:47px"></div>
                            <?php include 'include/require_newshit.php' ?>   
                        </td> 
                    </tr>
                  </table>
            <!-- end contentbody--></div>
        <!-- end layout --></div>  
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>
