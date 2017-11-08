<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
        <div id="layout" class="clearfix">
            <div id="contenttop" class="clearfix">
                    <?php include 'include/top_header.php' ?>
            <!-- end contenttop --></div>
            <div id="contentbody" class="clearfix">
                    <?php $cadid=  KillChars(ew_HtmlEncode($_GET['catid'],ENT_QUOTES)) ;
                          $obid=  KillChars(ew_HtmlEncode($_GET['obid'],ENT_QUOTES)) ;
                          $subid=  KillChars(ew_HtmlEncode($_GET['subid'],ENT_QUOTES)) ;
                          $atid=  KillChars(ew_HtmlEncode($_GET['atid'],ENT_QUOTES)) ;
                    ?>
                    <div id="titlepages" style="margin:0px 7px 0px 7px;background:white">
                         <?php if (($atid == 0))  
                         {
                          $tittle_string =stringname($subid,'C_NAME','t_chuyenmuc_levelsite','PK_CHUYENMUC');
                          $url= "QTchuyenmuc-".$subid."-".changeTitle($tittle_string).".html" ;
                         } else 
                         {
                           $tittle_string = stringname($obid,'C_NAME','t_doituong_levelsite','PK_DOITUONG');
                           $url = "QTdoituong-".$obid."-".changeTitle($tittle_string).".html";
                         }    
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
