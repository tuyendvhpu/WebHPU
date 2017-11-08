<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
        <div id="layout" class="clearfix">
            <div id="contenttop" class="clearfix">
                    <?php include 'include/top.php' ?>
            <!-- end contenttop --></div>
            <div id="contentbody" class="clearfix">
                    <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                       
                    <?php $cadid=  KillChars(ew_HtmlEncode($_GET['catid'],ENT_QUOTES)) ;
                          $obid =  KillChars(ew_HtmlEncode($_GET['obid'],ENT_QUOTES)) ;
                          $subid=  KillChars(ew_HtmlEncode($_GET['subid'],ENT_QUOTES)) ;
                          // giá trj thiết lập tin bài thông báo thuộc 1 đơn vị
                       
                    ?>
                    </div>
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
