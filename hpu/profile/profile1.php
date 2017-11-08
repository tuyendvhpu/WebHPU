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
            $C_FULLNAME = '<h1 class="quickFade delayTwo">'.$C_FULLNAME.'</h1>';
        }
        if (isset($arwrk[0]['C_POSITION']) && ($arwrk[0]['C_POSITION']<> null))
        {
            $C_POSITION = $arwrk[0]['C_POSITION'];
            $C_POSITION = '<h2 class="quickFade delayThree">'.$C_POSITION.'</h2>';
        }
        $C_TITTLE =$arwrk[0]['C_FULLNAME']." - THÔNG TIN CÁ NHÂN";
        if (isset($arwrk[0]['C_PIC']) && ($arwrk[0]['C_PIC']<> null))
        {
              $C_PIC = $arwrk[0]['C_PIC'];
              $C_PIC = '<img src="../upload/picprofile/'.$arwrk[0]['C_PIC'].'" />';
        }
        else
        {
            $C_PIC ='<img src="../upload/picprofile/default-photo.jpg" alt="Alan Smith" />';
        }    
        if (isset($arwrk[0]['C_BIRTHDAY']) && ($arwrk[0]['C_BIRTHDAY']<> null))
        {
            $C_BIRTHDAY = $arwrk[0]['C_BIRTHDAY'];  
            $C_BIRTHDAY = '<li>b: <a href="#" target="_blank">'.$C_BIRTHDAY.'</a></li>';
        }
      
        if (isset($arwrk[0]['C_WORK_ADDRESS']) && ($arwrk[0]['C_WORK_ADDRESS']<> null))
        {
            $C_WORK_ADDRESS = $arwrk[0]['C_WORK_ADDRESS'];
            $C_WORK_ADDRESS = ''.$C_WORK_ADDRESS.'';
        }
        if (isset($arwrk[0]['C_EMAIL']) && ($arwrk[0]['C_EMAIL']<> null))
        {
             $C_EMAIL = $arwrk[0]['C_EMAIL'];
             $C_EMAIL = '<li>e: '.$C_EMAIL.'</li>';
        }
        if (isset($arwrk[0]['C_PHONE']) && ($arwrk[0]['C_PHONE']<> null))
        {
             $C_PHONE = $arwrk[0]['C_PHONE'];
             $C_PHONE = '<li>m: '.$C_PHONE.'</li>';
        }
        if (isset($arwrk[0]['C_BLOG']) && ($arwrk[0]['C_BLOG']<> null))
        {
             $C_BLOG = $arwrk[0]['C_BLOG'];
             $C_BLOG = '<li>w: '.$C_BLOG.'</li>';
        }
        if (isset($arwrk[0]['C_PERSONAL_PROFILE']) && ($arwrk[0]['C_PERSONAL_PROFILE']<> null))
        {
             $C_PERSONAL_PROFILE = $arwrk[0]['C_PERSONAL_PROFILE'];
             $C_PERSONAL_PROFILE ='     <section>
                                          <article>
                                                <div class="sectionTitle">
                                                        <h1>Thông tin cá nhân</h1>
                                                </div>
                                                <div class="sectionContent">
                                                       '.$C_PERSONAL_PROFILE.'
                                                </div>
                                          </article>
                                          <div class="clear"></div>
                                        </section>';
                }
        if (isset($arwrk[0]['C_EDUCATIION']) && ($arwrk[0]['C_EDUCATIION']<> null))
        {
                 $C_EDUCATIION = $arwrk[0]['C_EDUCATIION'];
                 $C_EDUCATIION = '<section><div class="sectionTitle"><h1>Quá trình đào tạo</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_EDUCATIION'].'</article>
                                    </div></section><div class="clear"></div>';
        }
        if (isset($arwrk[0]['C_SKILLS']) && ($arwrk[0]['C_SKILLS']<> null))
        {
                 $C_SKILLS = $arwrk[0]['C_SKILLS'];
                 $C_SKILLS = '<section><div class="sectionTitle"><h1>Kỹ năng</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_SKILLS'].'</article>
                                    </div></section><div class="clear"></div>';
        }
        if (isset($arwrk[0]['C_WORK_EXPERIENCE']) && ($arwrk[0]['C_WORK_EXPERIENCE']<> null))
        {
                 $C_WORK_EXPERIENCE = $arwrk[0]['C_WORK_EXPERIENCE'];
                 $C_WORK_EXPERIENCE = '<section><div class="sectionTitle"><h1>Quá trình công tác chuyên môn</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_WORK_EXPERIENCE'].'</article>
                                    </div></section><div class="clear"></div>';
        }
        if (isset($arwrk[0]['C_SCIENTIFIC_RESEARCH']) && ($arwrk[0]['C_SCIENTIFIC_RESEARCH']<> null))
        {
                 $C_SCIENTIFIC_RESEARCH = $arwrk[0]['C_SKILLS'];
                 $C_SCIENTIFIC_RESEARCH = '<section><div class="sectionTitle"><h1>Quá trình nghiên cứu khoa học</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_SCIENTIFIC_RESEARCH'].'</article>
                                    </div></section><div class="clear"></div>';
        }

        if (isset($arwrk[0]['C_HOBBIES']) && ($arwrk[0]['C_HOBBIES']<> null))
        {
                 $C_HOBBIES = $arwrk[0]['C_HOBBIES'];
                 $C_HOBBIES = '<section><div class="sectionTitle"><h1>Sở thích</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_HOBBIES'].'</article>
                                    </div></section><div class="clear"></div>';
        }
         if (isset($arwrk[0]['C_REFERENCES']) && ($arwrk[0]['C_REFERENCES']<> null))
        {
                 $C_REFERENCES = $arwrk[0]['C_HOBBIES'];
                 $C_REFERENCES = '<section><div class="sectionTitle"><h1>Tham khảo</h1></div>
                                    <div class="sectionContent">
                                            <article>'.$arwrk[0]['C_REFERENCES'].'</article>
                                    </div></section><div class="clear"></div>';
        }
      
?>
<!DOCTYPE html>
<html>
<head>
<title><?PHP ECHO $C_TITTLE ?></title>
<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>
<style>
html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {
border:0;
font:inherit;
font-size:100%;
margin:0;
padding:0;
vertical-align:baseline;
}

article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
display:block;
}

html, body {background: #ffffff; font-family: 'Lato', helvetica, arial, sans-serif; font-size: 16px; color: #222;}

.clear {clear: both;}

p {
	font-size: 1em;
	line-height: 1.4em;
	margin-bottom: 20px;
	color: #444;
}

#cv {
	width: 90%;
	max-width: 800px;
	background: #f3f3f3;
	margin: 30px auto;
}

.mainDetails {
	padding: 25px 35px;
	border-bottom: 2px solid #cf8a05;
	background: #ededed;
}

#name h1 {
	font-size: 2.1em;
	font-weight: 700;
	font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
	margin-bottom: 5px;
        
}

h3#add {
	font-family: Georgia, Helvetica, Arial, sans-serif;
        font-style:italic;
        color: #444; 
        font-size: 13px;
        padding-top: 5px;
}

#name h2 {
	font-size: 1.3em;
	margin-left: 2px;
	font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
}

#mainArea {
	padding: 0 40px;
}

#headshot {
	width: 15.5%;
	float: left;
	margin-right: 30px;
}
#headshot img {
        height:150px;width: 120px;border: 3px #bababa solid;
}

#name {
	float: left;
}

#contactDetails {
	float: right;
}

#contactDetails ul {
	list-style-type: none;
	font-size: 0.9em;
	margin-top: 2px;
}

#contactDetails ul li {
	margin-bottom: 3px;
	color: #444;
}

#contactDetails ul li a, a[href^=tel] {
	color: #444; 
	text-decoration: none;
	-webkit-transition: all .3s ease-in;
	-moz-transition: all .3s ease-in;
	-o-transition: all .3s ease-in;
	-ms-transition: all .3s ease-in;
	transition: all .3s ease-in;
}

#contactDetails ul li a:hover { 
	color: #cf8a05;
}


section {
	border-top: 1px solid #dedede;
	padding: 20px 0 0;
}

section:first-child {
	border-top: 0;
}

section:last-child {
	padding: 20px 0 10px;
}

.sectionTitle {
	float: left;
	width: 25%;
}

.sectionContent {
	float: right;
	width: 72.5%;
}

.sectionTitle h1 {
	font-family: Times New Roman,'Rokkitt', Helvetica, Arial, sans-serif;
	font-style: italic;
	font-size: 1.4em;
	color: #cf8a05;
}

.sectionContent h2 {
	font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
	font-size: 1.5em;
	margin-bottom: -2px;
}

.subDetails {
	font-size: 0.8em;
	font-style: italic;
	margin-bottom: 3px;
}

.keySkills {
	list-style-type: none;
	-moz-column-count:3;
	-webkit-column-count:3;
	column-count:3;
	margin-bottom: 20px;
	font-size: 1em;
	color: #444;
}

.keySkills ul li {
	margin-bottom: 3px;
}

@media all and (min-width: 602px) and (max-width: 800px) {
	#headshot {
		display: none;
	}
	
	.keySkills {
	-moz-column-count:2;
	-webkit-column-count:2;
	column-count:2;
	}
}

@media all and (max-width: 601px) {
	#cv {
		width: 95%;
		margin: 10px auto;
		min-width: 280px;
	}
	
	#headshot {
		display: none;
	}
	
	#name, #contactDetails {
		float: none;
		width: 100%;
		text-align: center;
	}
	
	.sectionTitle, .sectionContent {
		float: none;
		width: 100%;
	}
	
	.sectionTitle {
		margin-left: -2px;
		font-size: 1.25em;
	}
	
	.keySkills {
		-moz-column-count:2;
		-webkit-column-count:2;
		column-count:2;
	}
}

@media all and (max-width: 480px) {
	.mainDetails {
		padding: 15px 15px;
	}
	
	section {
		padding: 15px 0 0;
	}
	
	#mainArea {
		padding: 0 25px;
	}

	
	.keySkills {
	-moz-column-count:1;
	-webkit-column-count:1;
	column-count:1;
	}
	
	#name h1 {
		line-height: .8em;
		margin-bottom: 4px;
	}
}

@media print {
    #cv {
        width: 100%;
    }
}

@-webkit-keyframes reset {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}

@-webkit-keyframes fade-in {
	0% {
		opacity: 0;
	}
	40% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}

@-moz-keyframes reset {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}

@-moz-keyframes fade-in {
	0% {
		opacity: 0;
	}
	40% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}

@keyframes reset {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}

@keyframes fade-in {
	0% {
		opacity: 0;
	}
	40% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}

.instaFade {
    -webkit-animation-name: reset, fade-in;
    -webkit-animation-duration: 1.5s;
    -webkit-animation-timing-function: ease-in;
	
	-moz-animation-name: reset, fade-in;
    -moz-animation-duration: 1.5s;
    -moz-animation-timing-function: ease-in;
	
	animation-name: reset, fade-in;
    animation-duration: 1.5s;
    animation-timing-function: ease-in;
}

.quickFade {
    -webkit-animation-name: reset, fade-in;
    -webkit-animation-duration: 2.5s;
    -webkit-animation-timing-function: ease-in;
	
	-moz-animation-name: reset, fade-in;
    -moz-animation-duration: 2.5s;
    -moz-animation-timing-function: ease-in;
	
	animation-name: reset, fade-in;
    animation-duration: 2.5s;
    animation-timing-function: ease-in;
}
 
.delayOne {
	-webkit-animation-delay: 0, .5s;
	-moz-animation-delay: 0, .5s;
	animation-delay: 0, .5s;
}

.delayTwo {
	-webkit-animation-delay: 0, 1s;
	-moz-animation-delay: 0, 1s;
	animation-delay: 0, 1s;
}

.delayThree {
	-webkit-animation-delay: 0, 1.5s;
	-moz-animation-delay: 0, 1.5s;
	animation-delay: 0, 1.5s;
}

.delayFour {
	-webkit-animation-delay: 0, 2s;
	-moz-animation-delay: 0, 2s;
	animation-delay: 0, 2s;
}

.delayFive {
	-webkit-animation-delay: 0, 2.5s;
	-moz-animation-delay: 0, 2.5s;
	animation-delay: 0, 2.5s;
}

/* //-- footer -- */
#ft { padding: 1em 0 2em 0; font-size: 92%; border-top: 1px solid #ccc; text-align: center; }
#ft p { margin-bottom: 0; text-align: center;   }
    
</style>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<div id="headshot" class="quickFade">
			 <?php echo $C_PIC  ?>
		</div>
		<div id="name">
		     <?php echo $C_FULLNAME  ?>
		     <?php echo $C_POSITION  ?>
		</div>
		<div id="contactDetails" class="quickFade delayFour">
                    <ul>
                           
                             <?php echo $C_EMAIL  ?>
                             <?php echo $C_BLOG  ?>
                             <?php echo $C_PHONE  ?>
                    </ul>
		</div>
             <div id="name" class="quickFade delayFour"> <h3 id="add"> <?php echo $C_WORK_ADDRESS  ?> </h3></div>
		<div class="clear"></div>
	</div>
	<div id="mainArea" class="quickFade delayFive">
	        <?php echo $C_PERSONAL_PROFILE  ?>
                <?php echo $C_EDUCATIION  ?>
                <?php echo $C_SKILLS  ?>
                <?php print $C_WORK_EXPERIENCE  ?>
                <?php echo $C_SCIENTIFIC_RESEARCH  ?>
                <?php echo $C_REFERENCES ?>
                <?php echo $C_HOBBIES ?>   
	</div>
</div>
     <div id="ft">
	       <p>©2016 Xây dựng và phát triển bởi Trung Tâm Thông Tin Thư Viện</p>
    </div><!--// footer -->
</body>
</html>