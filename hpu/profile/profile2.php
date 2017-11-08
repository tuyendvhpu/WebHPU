<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "../admin/ewcfg7.php" ?>
<?php include "../admin/ewmysql7.php" ?>
<?php include "../admin/phpfn7.php" ?>
<?php include "../admin/userinfo.php" ?>
<?php include "../admin/userfn7.php" ?>
<?php  error_reporting (E_ALL ^ E_NOTICE); 
       ini_set( 'display_errors', 'off' );
        global $conn ;
         $conn = ew_Connect();
        $sSqlWrk ="";$sWhereWrk ="";
        $profileid = $_GET['profileid'];
        $sSqlWrk = "Select * From t_lylich";
        $sWhereWrk = "(t_lylich.C_STATUS=1) AND (t_lylich.PK_PROFILE_ID = '".$profileid."') LIMIT 1";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);
        $C_FULLNAME = $arwrk[0]['C_FULLNAME'];
         if (isset($arwrk[0]['C_FULLNAME']) && ($arwrk[0]['C_FULLNAME']<> null))
        {
            $C_FULLNAME = $arwrk[0]['C_FULLNAME'];
            $C_FULLNAME = '<h1 class="fn">'.$C_FULLNAME.'</h1>';
        }
        if (isset($arwrk[0]['C_POSITION']) && ($arwrk[0]['C_POSITION']<> null))
        {
            $C_POSITION = $arwrk[0]['C_POSITION'];
            $C_POSITION = 'Position: <span class="tel">'.$C_POSITION.'</span><br />';
        }
        $C_TITTLE =$arwrk[0]['C_FULLNAME']." - THÔNG TIN CÁC NHÂN";
        if (isset($arwrk[0]['C_PIC']) && ($arwrk[0]['C_PIC']<> null))
        {
              $C_PIC = $arwrk[0]['C_PIC'];
              $C_PIC = '<img id="pic" src="../upload/picprofile/'.$arwrk[0]['C_PIC'].'" />';
        }
        else
        {
             $C_PIC ='<img id="pic" src="../upload/picprofile/default-photo.jpg" alt="Alan Smith" />';
        }    
        if (isset($arwrk[0]['C_BIRTHDAY']) && ($arwrk[0]['C_BIRTHDAY']<> null))
        {
            $C_BIRTHDAY = $arwrk[0]['C_BIRTHDAY'];  
            $C_BIRTHDAY = '<li>b: <a href="#" target="_blank">'.$C_BIRTHDAY.'</a></li>';
        }
      
        if (isset($arwrk[0]['C_WORK_ADDRESS']) && ($arwrk[0]['C_WORK_ADDRESS']<> null))
        {
            $C_WORK_ADDRESS = $arwrk[0]['C_WORK_ADDRESS'];
            $C_WORK_ADDRESS = 'Address: <a class="email" href="#">'.$C_WORK_ADDRESS.'</a><br />';
        }
        if (isset($arwrk[0]['C_EMAIL']) && ($arwrk[0]['C_EMAIL']<> null))
        {
             $C_EMAIL = $arwrk[0]['C_EMAIL'];
             $C_EMAIL = 'Email: <a class="email" href="'.$C_EMAIL.'">'.$C_EMAIL.'</a><br/>';
        }
        if (isset($arwrk[0]['C_PHONE']) && ($arwrk[0]['C_PHONE']<> null))
        {
             $C_PHONE = $arwrk[0]['C_PHONE'];
             $C_PHONE = 'Phone: <a class="email" href="#">'.$C_PHONE.'</a><br/>';
        }
        if (isset($arwrk[0]['C_BLOG']) && ($arwrk[0]['C_BLOG']<> null))
        {
             $C_BLOG = $arwrk[0]['C_BLOG'];
             $C_BLOG = 'Website: <a class="email" href="#">'.$C_BLOG.'</a><br/>';
        }
        if (isset($arwrk[0]['C_PERSONAL_PROFILE']) && ($arwrk[0]['C_PERSONAL_PROFILE']<> null))
        {
             $C_PERSONAL_PROFILE = $arwrk[0]['C_PERSONAL_PROFILE'];
             $C_PERSONAL_PROFILE ='<p>'.$C_PERSONAL_PROFILE.'</p>';
                }
        if (isset($arwrk[0]['C_EDUCATIION']) && ($arwrk[0]['C_EDUCATIION']<> null))
        {
                 $C_EDUCATIION = $arwrk[0]['C_EDUCATIION'];
                 $C_EDUCATIION = ' <dt>Quá trình đào tạo</dt>
                                        <dd>
                                            '.$C_EDUCATIION.'
                                        </dd>
                                        <dd class="clear"></dd>';
        }
        if (isset($arwrk[0]['C_SKILLS']) && ($arwrk[0]['C_SKILLS']<> null))
        {
                 $C_SKILLS = $arwrk[0]['C_SKILLS'];
                 $C_SKILLS = '<dt>Kỹ năng </dt>
                                        <dd>
                                            '.$C_SKILLS.'
                                        </dd>
                                        <dd class="clear"></dd>';
        }
        if (isset($arwrk[0]['C_WORK_EXPERIENCE']) && ($arwrk[0]['C_WORK_EXPERIENCE']<> null))
        {
                 $C_WORK_EXPERIENCE = $arwrk[0]['C_WORK_EXPERIENCE'];
                 $C_WORK_EXPERIENCE = '<dt>Quá trình công tác chuyên môn </dt>
                                        <dd>
                                            '.$C_WORK_EXPERIENCE.'
                                        </dd>
                                        <dd class="clear"></dd>';
        }
        if (isset($arwrk[0]['C_SCIENTIFIC_RESEARCH']) && ($arwrk[0]['C_SCIENTIFIC_RESEARCH']<> null))
        {
                 $C_SCIENTIFIC_RESEARCH = $arwrk[0]['C_SKILLS'];
                 $C_SCIENTIFIC_RESEARCH = '<dt>Quá trình nghiên cứu khoa học</dt>
                                        <dd>
                                            '.$C_SCIENTIFIC_RESEARCH.'
                                        </dd>
                                        <dd class="clear"></dd>';
        }
        if (isset($arwrk[0]['C_HOBBIES']) && ($arwrk[0]['C_HOBBIES']<> null))
        {
                 $C_HOBBIES = $arwrk[0]['C_HOBBIES'];
                 $C_HOBBIES = '<dt>Sở thích </dt>
                                        <dd>
                                            '.$C_HOBBIES.'
                                        </dd>
                                        <dd class="clear"></dd>';
        }
         if (isset($arwrk[0]['C_REFERENCES']) && ($arwrk[0]['C_REFERENCES']<> null))
        {
                 $C_REFERENCES = $arwrk[0]['C_REFERENCES'];
                 $C_REFERENCES = '<dt>Tham khảo </dt>
                                        <dd>
                                            '.$C_REFERENCES.'
                                        </dd>
                                  <dd class="clear"></dd>';
        }
      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title><?php echo $C_TITTLE  ?></title>
     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px;background: url(images/noise.jpg)}
        #pic { float: right; margin: -30px 0 0 0;height:180px;width: 150px;border: 2px #bababa solid;padding:2px; box-shadow: 5px 5px 3px #bababa;z-index:999999 }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999;font-family: Georgia }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 100%; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 50px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; font-family: Georgia, Serif; }
        dd.clear { float: none; margin: 0; height: 15px; }
        /* //-- footer -- */
#ft { padding: 1em 0 1em 0; font-size: 92%; border-top: 1px solid #ccc; text-align: center; }
#ft p { margin-bottom: 0; text-align: center;   }
     </style>
</head>
<body>
    <div id="page-wrap">
         <?php echo $C_PIC  ?>
        <div id="contact-info" class="vcard">
            <!-- Microformats! -->
             <?php echo $C_FULLNAME; ?>
            <p>
            <?php echo $C_POSITION  ?>
            <?php echo $C_WORK_ADDRESS  ?>
            <?php echo $C_EMAIL  ?>
            <?php echo $C_BLOG  ?>
            <?php echo $C_PHONE  ?>
            </p>
        </div>     
        <div id="objective">
              <?php echo $C_PERSONAL_PROFILE  ?>
        </div>
        <div class="clear"></div>
        <dl>
            <dd class="clear"></dd>
            <?php echo $C_EDUCATIION  ?>
            <?php echo $C_SKILLS  ?>
            <?php print $C_WORK_EXPERIENCE  ?>
            <?php echo $C_SCIENTIFIC_RESEARCH  ?>
            <?php echo $C_REFERENCES ?>
            <?php echo $C_HOBBIES ?>  
        <div class="clear"></div>
    </div>
  <div id="ft">
	        <p>©2016 Xây dựng và phát triển bởi Trung Tâm Thông Tin Thư Viện</p>
    </div><!--// footer -->
</body>

</html>