<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "../admin/ewcfg7.php" ?>
<?php include "../admin/ewmysql7.php" ?>
<?php include "../admin/phpfn7.php" ?>
<?php include "../admin/userinfo.php" ?>
<?php include "../admin/userfn7.php" ?>
<!-- <script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" src='../js/pjax-standalone.js'></script> 
          <script type='text/javascript'>

		pjax.connect('content', 'pjaxer');
                pjax.connect('content_listnotice', 'pja_notice');
		
	</script>-->
<?php
function divPage($total = 0,$currentPage = 0,$div = 5,$rows = 10){
        if(!$total || !$rows || !$div || $total<=$rows) return false;
        $nPage = floor($total/$rows) + (($total%$rows)?1:0);
        $nDiv = floor($nPage/$div) + (($nPage%$div)?1:0);
        $currentDiv = floor($currentPage/$div) ;
        $sPage = '';
        if($currentDiv) {
        $sPage .= '<li><a class="pja_notice" href="?p=0"><<</a></li> ';
        $sPage .= '<li><a class="pja_notice" href="?p='.($currentDiv*$div - 1).'"><</a></li> ';
        }
        $count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
        for($i=0;$i<$count;$i++){
        $page = ($currentDiv*$div + $i);
        $sPage .= '<li><a class="pja_notice" href="?s=s=thông+báo&p='.($currentDiv*$div + $i ).'" '.(($page==$currentPage)? 'id="current"':'').'>'.($page+1).'</a></li> ';
        }
        if($currentDiv < $nDiv - 1){

        $sPage .= '<li><a class="pja_notice" href="?p='.(($currentDiv+1)*$div + 1 ).'">></a></li> ';
        $sPage .= '<li><a class="pja_notice" href="?p='.(($nDiv-1)*$div + 1 ).'">>></a></li>';
        }

        return $sPage;
    }
  if (isset($_POST['s']))
  { 
$conn = ew_Connect();
$p = KillChars(ew_HtmlEncode($_GET['p']));// currentPage
$rows = 1; // số record trên mỗi trang
$div = 10; // số trang trên 1 phân đoạn
$keyworld =  trim(addslashes(KillChars(ew_HtmlEncode($_POST['s']))));
$start =  $p*$rows;
     $sql = "SELECT COUNT(*) AS total From t_thongbao_mainlevel Inner Join
                            t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                            t_thongbao_mainlevel.PK_THONGBAO ";
    $sWhere = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC";
    if ($sWhere <> "") $sql .= " WHERE $sWhere";                                            
    $rswrk = $conn->Execute($sql);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    $total = $arwrk[0][0]; 
    $sSqlWrk = "Select t_thongbao_mainlevel.*,t_thongbao_levelsite.C_TITLE,t_thongbao_levelsite.C_CONTENT From t_thongbao_mainlevel Inner Join
                t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO =
                    t_thongbao_mainlevel.PK_THONGBAO";
    $sWhereWrk = "((t_thongbao_levelsite.C_TITLE LIKE '%$keyworld%') OR (t_thongbao_mainlevel.C_KEYWORD LIKE '%$keyworld%')) AND (t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.FK_CONGTY_ID =".$_SESSION['FK_CONGTY'].") ORDER BY t_thongbao_mainlevel.C_ORDER DESC LIMIT $start,$rows";
    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
  }
?>

                     <h2 class="h2title"> Thông báo khoa </h2>
                    <ul class="ulcontents1">
                             <?php for($k=0;$k<$rowswrk;$k++) { 
                                   $url ="VHDLthongbao-".$arwrk[$k]['PK_THONGBAO']."-".changeTitle($arwrk[$k]['C_TITLE']).".html";          
                                  ?> 
                             <li> <a class="pjaxer" href="<?php echo $url ?>">  <?php echo $arwrk[$k]['C_TITLE'] ?> </a> </li>    
                              <?php } ?>    
                      </ul>
                     <ul class="trang"><?php echo divPage($total, $p, $div, $rows); ?></ul>   
                      

 
 <script>
$( ".pja_notice" ).click(function() {
alert ('âf');
});
</script>