<?php include 'include/header.php' ?>
<div id="wrapper_thongbao">
 <div id="layout" class="clearfix">
       <div id="contenttop" class="clearfix">
         <?php include 'include/top_header.php' ?>
       <!-- end contenttop --></div>
     <div id="contentbody" class="clearfix" style="">
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
 <!-- end wrapper--></div>
<?php include 'include/footter_1.php' ?>