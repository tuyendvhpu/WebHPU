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
                     <h2 class="h2title-detail"><a href="ScientificProfile.html"> ĐỘI NGŨ GIẢNG DẠY</a></h2>
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
                      <?php include 'include/menu_main.php' ?>         
                 </td>
             </tr>
         </table> 
         
         <!--* Add profile -->
   <?php  
       $sSqlWrk = "Select * From t_lylich";
        $sWhereWrk = "(t_lylich.C_STATUS=1) AND (t_lylich.C_ACTIVE=1) AND (FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY C_ORDER_LEVEL DESC";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);  
        if ($rowswrk <= 0)
        {
          echo "Không tồn tại dữ liệu";
          exit();
        }  
        $path = "http://hpu.edu.vn/";
      //  $path = "../";
    ?>
         <div>

             <style>

              h1 {
                        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
                        font-size: 3.6em;
                        line-height: 1.4em;
                        margin-bottom: 10px;
                        color: #515151;
                        font-weight: normal;
                      }
                      h2#bigname {
                        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
                        font-size: 1.8em;
                        line-height: 1.6em;
                        margin-bottom: 4px;
                        color: #515151;
                        font-weight: bold;
                        padding-top: 5px;
                      }
                      h3#bigjob {
                        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
                        font-size: 1.25em;
                        line-height: 1.2em;
                        letter-spacing: -0.02em;
                        text-transform: uppercase;
                        margin-bottom: 11px;
                        color: #515151;
                        font-weight: normal;
                      }
                      p#bigdesc {
                            display: block;
                            font-size: 1.0em;
                            line-height: 1.4em;
                            margin-bottom: 15px;
                            color: #666;
                            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
                            text-align: justify;
                         }
              
              /** page structure **/
              #w {
                display: block;
                margin: 0 auto;
                width: 960px;
                padding: 10px 25px;
                background: #fff;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;

              }
              #teamcontent {
                display: block;
                margin-bottom: 15px;
              }
              #biglink {
                 
                  display: block;
                    font-family: 'Open Sans', Helvetica, Arial, sans-serif;
                    font-weight: bold;
              }
              /** team member list **/
              .team {
                display: block;
                float: left;
              }

              .team {
                display: inline;
                float: left;
                margin-bottom: 20px;
                width: 230px;
                text-align: center;
                padding: 10px 0px 10px 0px;
                 
              }
              .team img {padding: 10px 0px 10px 0px;border: 2px solid #cecece; padding: 2px}
              .team p {font-weight: bold;  font-family: 'Open Sans', Helvetica, Arial, sans-serif; }
              .team:hover {
                cursor: pointer;
                -moz-box-shadow: 0 0 10px #ccc; -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;
              }
              .team li.last { margin-right: 0;
                      text-align: left;
              }

              .team .hcontent {
                display: none;
              }
                .team .job1 {
                text-align: center;
                margin-top: 10px;
              }
              /** hidden team content **/
              #teamcontent .bigimg {
                display: block;
                float: left;
                border: 2px solid #cecece; padding: 2px
                
              }
             
              
              #teamdetails {
                display: block;
                float: left;
                width: 600px;
                padding-left: 15px;
              }
              /** clearfix **/
              .clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
              .clearfix { display: inline-block; }

              html[xmlns] .clearfix { display: block; }
              * html .clearfix { height: 1%; }
                </style>
 <div id="w">
    <div id="teamcontent" class="clearfix">
          <?php 
        if (isset($arwrk[0]['C_PIC']) && ($arwrk[0]['C_PIC']<> null))
        {$C_PIC = $arwrk[0]['C_PIC'];}
        else { $C_PIC ='efault-photo.jpg';}
         switch ($arwrk[0]['C_TEMPLATE']) {
           case 1:
              // $url ='../profile/profile1.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
               $url=$path.'profile/ScientificProfile-'.changeTitle($arwrk[0]['C_FULLNAME']).'-'.$arwrk[0]['PK_PROFILE_ID'].".pdf";
               break;
           case 2:
                // $url ='../profile/profile2.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
               $url=$path.'profile/ScientificProfile1-'.changeTitle($arwrk[0]['C_FULLNAME']).'-'.$arwrk[0]['PK_PROFILE_ID'].".pdf";
               break;
            default:
                }   
        
          ?>
      <img src="<?php echo $path ?>upload/picprofile/<?php echo $C_PIC ?>" class="bigimg" id="bigimgx1" width="200" height="230">
      <div id="teamdetails">
        <h2 id="bigname"><?php echo  $arwrk[0]['C_FULLNAME'] ?></h2>
        <h3 id="bigjob"> <?php echo  $arwrk[0]['C_POSITION'] ?></h3>
        <p id="bigdesc"> <?php echo strip_tags($arwrk[0]['C_PERSONAL_PROFILE']) ?></p>
        <p><a id="biglink" href="<?php echo $url ?>" target="_blank" > Lý lịch khoa học &rarr;</a></p>
      </div>
    </div>
    
    <?php For ($i=0;$i < $rowswrk; $i++) {
          $C_FULLNAME = $arwrk[$i]['C_FULLNAME'];
          if (isset($arwrk[$i]['C_PIC']) && ($arwrk[$i]['C_PIC']<> null))
        {
              $C_PIC = $arwrk[$i]['C_PIC'];
              $C_PIC = '"'.$path.'upload/picprofile/'.$arwrk[$i]['C_PIC'].'"';
        }
        else
        {
            $C_PIC ='"'.$path.'upload/picprofile/default-photo.jpg"';
        }   
        if (isset($arwrk[$i]['C_PERSONAL_PROFILE']) && ($arwrk[$i]['C_PERSONAL_PROFILE']<> null))
        {
             $C_PERSONAL_PROFILE = $arwrk[$i]['C_PERSONAL_PROFILE'];
        }
        
        if (isset($arwrk[$i]['C_POSITION']) && ($arwrk[$i]['C_POSITION']<> null))
        {
            $C_POSITION = $arwrk[$i]['C_POSITION'];
        }
           switch ($arwrk[$i]['C_TEMPLATE']) {
           case 1:
              // $url ='../profile/profile1.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
               $url=''.$path.'profile/ScientificProfile-'.changeTitle($arwrk[$i]['C_FULLNAME']).'-'.$arwrk[$i]['PK_PROFILE_ID'].".pdf";
               break;
           case 2:
                // $url ='../profile/profile2.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
               $url=''.$path.'profile/ScientificProfile1-'.changeTitle($arwrk[$i]['C_FULLNAME']).'-'.$arwrk[$i]['PK_PROFILE_ID'].".pdf";
               break;
            default:
                }   
        ?>
     <div class="team clearfix">
        <img src=<?php echo $C_PIC ?> alt="<?php echo $C_FULLNAME ?>" width="130" height="150" class="profilepic">
        <p class="job1"><?php echo $C_FULLNAME ?> </p>
        <span class="hcontent job"><?php echo $C_POSITION ?></span>
        <span class="hcontent desc"><?php echo $C_PERSONAL_PROFILE ?></span>
        <a class="link" target="_blank" href="<?php echo $url ?>"> </a>
     </div>
    <?php } ?>
  </div>
        <script type="text/javascript">
        $(function(){
          $('.profilepic').on('click', function(e){
            var $biginfo = $('#teamcontent');
            var $img = $('#bigimgx1');
            var $linkx = $('#biglink');
            var $bigname = $('#bigname');
            var $bigjob  = $('#bigjob');
            var $bigdesc = $('#bigdesc');
            var newname = $(this).attr('alt');
            var newrole = $(this).siblings('.job').eq(0).html();
            var newdesc = $(this).siblings('.desc').eq(0).html();
            var img = $(this).attr('src');
            var link = $(this).attr('href');
            var href =  $(this).siblings('.link').attr('href');
            $bigname.html(newname);
            $bigjob.html(newrole);
            $bigdesc.html(link);
             $('#bigimgx1').attr('src',img);
             $('#biglink').attr('href',href);
            if($biginfo.css('display') == 'none') {
              $biginfo.slideDown('slow');
            }
          });
        });
        </script>            
    </div>
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>