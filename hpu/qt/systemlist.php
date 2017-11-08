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
                     <h2 class="h2title-detail"><a href="QThethonglienket.html"> TIỆN ÍCH </a></h2>
                    </div>
                 </td>
                 <td style="width: 50%">
                    
                 </td>
                 <td style="text-align: right;width: 20px">
                      <?php include 'include/menu_main.php' ?>         
                 </td>
             </tr>
         </table>   
       <h2 class="h2title"> </h2>
       <?php 
       $conn =  ew_Connect();
       $sSqlWrk = "Select t_doituong_levelsite.PK_DOITUONG as ID,
                t_doituong_levelsite.C_NAME as C_TITLE,
                t_doituong_levelsite.C_LOCATION as C_LOCATION,
                t_doituong_levelsite.C_ORDER as C_ORDER,
                t_doituong_levelsite.C_ICON as C_ICON
                From t_doituong_levelsite";
       $sWhereWrk = "(t_doituong_levelsite.C_STATUS = 1) AND (t_doituong_levelsite.C_TYPE = 1) AND (t_doituong_levelsite.C_BELOGTO <> 0) AND (t_doituong_levelsite.FK_CONGTY =".$_SESSION['FK_CONGTY'].") ORDER BY t_doituong_levelsite.C_ORDER DESC ";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";           
       $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        $rowswrk = count($arwrk);
       ?>
       <div style="min-height: 600px;margin-top: 10px;"> 
            <table style="width:100%">
                <?php for($i=0;$i<$rowswrk;$i++)
                {
                    if ($i%2==0) echo "<tr>";

                ?>
            <td style="width: 50%;vertical-align:top; ">
                <img class="img_logo" src="anh_icon.php?text= <?php echo  $arwrk[$i]['ID'] ?>" alt="HPU Private University"/>
                <div>
                    <h1 class="title_chuyenmuc"> <a target="_blank" href="<?php echo $arwrk[$i]['C_LOCATION'] ?>"> <?php echo $arwrk[$i]['C_TITLE'] ?> </a></h1>
                <div>    
            </td>
            <?php  if ((($i+1)%2)== 0 || ($i==$rowswrk)) echo "</tr>";
                }
            ?> 
            </table>
      </div>	
       <!-- end contentbody--></div>
 <!-- end layout --></div>
<div id="push"></div>  <!-- end wrapper--></div>
<?php include 'include/footter.php' ?>