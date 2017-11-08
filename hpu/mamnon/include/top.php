 <?php
			$conn = ew_Connect();
			$sSqlWrk = "SELECT * FROM t_chuyenmuc_levelsite";
			$sWhereWrk = "FK_CONGTY =".$_SESSION['FK_CONGTY'];
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
?>
<div id="contenttop" class="clearfix">
          <div id="header">
          <table id="tableheader">
                     <tr>
                         <td id="col6" >
						 <a href="index.php" title="Haiphong Private University"> <img src="../images/mamnon/logo.png" alt="Haiphong Private University"/></a></td>
                         <td id="col2">                                          
                              <div id="divsearch"> <input class="txtsearch" name="Text1" type="text" /> <input class="bntsearch" name="Button1" type="button" value="" /> <a><img src="../images/mamnon/facebook-32.png"/></a> <a><img src="../images/mamnon/linkedin-32.png"/></a> <a><img src="../images/mamnon/twitter-32.png"/></a> <a><img src="../images/mamnon/googleplus-32.png"/></a></div>      
                               <span class="spanlevel">50 Quán Nam - Kênh Dương- Lê Chân - Hải Phòng</span> 
                              <br/> <span class="spandiachi">0313.764.827 - is.hpu.edu.vn - mamnon@hpu.edu.vn </span> 
                          </td>
                        </tr>              
              </table>
          <!-- end header --></div>
          <div id="divnavi">
				              <ul id="ulnavi">
                                                  <li class="sf-item-1"><a href="IStrangchu.html"  title="Haiphong Private University" >Trang chủ</a></li>
				                  <?php for($i=0;$i<$rowswrk;$i++) {
                                                
                                                      $url= "ISchuyenmuc-".$arwrk[$i]['PK_CHUYENMUC']."-".changeTitle($arwrk[$i]['C_NAME']).".html";
                                                      if ($arwrk[$i]['PK_CHUYENMUC'] == ew_HtmlEncode($_GET['subid'])) $class_menu ="class=\"active\"";
                                                      else $class_menu =""; 
                                                      $xt =$i+2;
                                                      $class_menu_li ="class=\"sf-item-".$xt."\"";
                                                     ?> 
				                  <li <?php echo $class_menu_li ?> ><a <?php echo $class_menu ?> title="Haiphong Private University" href="<?php echo $url ?>"><?php echo $arwrk[$i]['C_NAME'] ?></a></li>
				                  <?php }?> 

				              </ul>
		 <!-- end divnavi --></div>
       <!-- end contenttop --></div>
        <div class="clearfix"></div>