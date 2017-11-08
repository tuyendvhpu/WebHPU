
                        
          <table id="tablecontentbody">
                 <tr>
                      <td class="col1"><img src="../images/mamnon/img_bgcol1.png" alt=""/><a href="tracuu.php" ><img  src="../images/mamnon/more1.png" alt="Mama- Papa" /></a> </td> 
                      <td class="col2"><img src="../images/mamnon/img_bgcol2.png" alt="Album_Video" /><a id="sys_hpu" ><img src="../images/mamnon/more2.png" alt="Album_Video" /></a>
                      </td>
                      <td class="col3"><img src="../images/mamnon/img_bgcol3.png" alt=""/> <a target="_blank" href="http://mamnon2.hpu.edu.vn/WebClient.html"> <img src="../images/mamnon/more3.png" alt="Album_Video" /></a></td>
                 </tr>    
          </table>

  <style>
     /* popup_box DIV-Styles*/
#popup_box { 
	display:none; /* Hide the DIV */
	position:fixed;  
	_position:absolute; /* hack for internet explorer 6 */  
	width:800px;  
	  background:#d9c704 ;
	left:230px;
	top: 110px;
	z-index:1000; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
	margin-left: 15px;  
	/* additional features, can be omitted */
	border:2px solid #FFFFFF;  	
	padding:15px;  
	font-size:15px;  
	-moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -box-shadow: 0 0 10px rgba(0,0,0,.4);
	box-shadow: 0 0 5px #bababa;
        text-align: center;
	
}

#container {
	position: fixed; 
		height: 100%;
		width: 100%;
		background: #000;
		background: rgba(0,0,0,.8);
		z-index: 100;
		display: none;
		top: 0;
		left: 0; 
              
}

a{  
cursor: pointer;  
text-decoration:none;  
} 

/* This is for the positioning of the Close Link */
#popupBoxClose {
	font-size:20px;  
	line-height:15px;  
	right:5px;  
	top:5px;  
	position:absolute;  
	color:#6fa5e2;  
	font-weight:500;  	
}

h2.h2event {font-weight:bold;text-align:center;text-decoration: underline;padding-bottom: 10px}
.systd {width: 50%;text-align: left;padding: 5px 5px 5px 30px}
/*End  popup_box DIV-Styles*/ 
      
      
  </style>
  <script type="text/javascript">
	
        $( "#sys_hpu" ).click(function() {
	
		// When site loaded, load the Popupbox First
		loadPopupBox();
	
		$('#popupBoxClose').click( function() {			
			unloadPopupBox();
		});
		
		$('#container').click( function() {
			unloadPopupBox();
		});

		function unloadPopupBox() {	// TO Unload the Popupbox
			$('#popup_box').fadeOut("slow");
			$("#container").css({ // this is just for style		
				"opacity": "1"  
			}); 
                        $("#container").hide();
		}	
		
		function loadPopupBox() {	// To Load the Popupbox
			$('#popup_box').fadeIn("slow");
			$("#container").css({ // this is just for style
				"opacity": "0.5"  
			}); 
                         $("#container").show();
		}
		/**********************************************************/
		
	});
</script>

<div id="popup_box">
    
           <table style="width:100%">
               <tr>
                   <td>
                       <a target="_blank" title="Album bé yêu" href="http://img.hpu.edu.vn/index.php?/category/42"><img src="../images/mamnon/img_babyalbum.png" alt=""/></a>
                   </td>
                   <td >
                       <a target="_blank" title="Video bé yêu" href="http://www.youtube.com/user/mamnonhpu"> <img src="../images/mamnon/img_babyvideo.png" alt=""/></a>
                   </td>
               </tr>
           
                            
           </table>    

    <a id="popupBoxClose"><img alt="Close HPU" src="../images/index/x.png"/></a>
</div>
<div id="container"> <!-- Main Page -->
	
</div> 