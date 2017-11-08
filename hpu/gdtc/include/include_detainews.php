
<div id='content'>
<h2 class="h2title_thongbao">GDTC - Thời gian: từ <?php echo date( 'j/m/Y',strtotime($arwrk[0]['C_BEGIN_DATE'])) ?> - <?php echo  date( 'j/m/Y',strtotime($arwrk[0]['C_END_DATE'])) ?>    <span class="pdatetime"> <?php echo $timenow; ?> <img style="cursor: pointer" onclick="printform('content')" src="../images/index/img_printer.jpg" /></span> </h2>

<h2 class="h2title_report" >  <?php echo $arwrk[0]['C_TITLE'] ?> </h2>
<div id="divcontents">
<?php echo $arwrk[0]['C_CONTENT']?>
</div>
 <div id="divvisitor"> <span> Truy cập:  <?php echo $so_lanxem ?> lượt</span></div>
</div>

