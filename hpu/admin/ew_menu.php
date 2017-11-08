<?php

// Menu
define("EW_MENUBAR_CLASSNAME", "ewMenuBarVertical", TRUE);
define("EW_MENUBAR_SUBMENU_CLASSNAME", "", TRUE);
?>
<?php

// MenuItem Adding event
function MenuItem_Adding(&$Item) {

	//var_dump($Item);
	// Return FALSE if menu item not allowed

	return TRUE;
}
?>
<div id="wrapper" >
<ul id="nav" class="clearfix">
    <?php $Menu = new cMenuCSS();
    $str=substr(ew_CurrentDate(), 0, 4) ;
    $num = (int)$str;
    $stringbc = "t_congty_nambclist.php?x_c_nam=".$num;
    ?>
    <?php if (IsAdmin()) { ?>
	<li><a id="taikhoan" href="#"><span>QUẢN TRỊ TÀI KHOẢN</span></a>
                <ul>
                    <?php
                    $Menu->AddMenuItem($Language->MenuPhrase("44", "MenuText"), "usersadminlist.php",AllowListMenu('usersadmin'));
                    $Menu->AddMenuItem($Language->MenuPhrase("45", "MenuText"), "userslist.php",AllowListMenu('users'));
                    $Menu->AddMenuItem($Language->MenuPhrase("41", "MenuText"), "userlevelslist.php",(@$_SESSION[EW_SESSION_USER_LEVEL] & EW_ALLOW_ADMIN) == EW_ALLOW_ADMIN);
                    $Menu->AddMenuItem($Language->MenuPhrase("43", "MenuText"), "userview.php",AllowListMenu('user'));
                    $Menu->AddMenuItem($Language->MenuPhrase("40", "MenuText"), "changepwd.php",IsLoggedIn());
                    ?>
		</ul>        
        </li>
        <li><a href="#"><span>QUẢN TRỊ HỆ THỐNG</span></a>
                <ul>
                        <?php
                          $Menu->AddMenuItem($Language->MenuPhrase("11", "MenuText"), "t_nganhnghelist.php",AllowListMenu('t_congty') && AllowListMenuex('t_nganhnghe'));
                          $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtylist.php",AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                          $Menu->AddMenuItem($Language->MenuPhrase("42", "MenuText"), "footerview.php",AllowListMenu('footer'));
                        
                        ?>
		</ul>
        </li>

        <li style="width:165px;"><a href="#"><span>HỆ THỐNG MAIN SITE</span></a>
                <ul>
                   <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtylist.php",AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                     $Menu->AddMenuItem($Language->MenuPhrase("16", "MenuText"), "t_doituong_svtuonglailist.php",AllowListMenu('t doituong svtuonglai') && AllowListMenuex('t doituong svtuonglai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("17", "MenuText"), "t_doituong_svdanghoclist.php",AllowListMenu('t_doituong_svdanghoc') && AllowListMenuex('t_doituong_svdanghoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("18", "MenuText"), "t_doituong_cuusvlist.php",AllowListMenu('t_doituong_cuusv') && AllowListMenuex('t_doituong_cuusv'));
                     $Menu->AddMenuItem($Language->MenuPhrase("20", "MenuText"), "t_doituong_doanhnghieplist.php",AllowListMenu('t_doituong_doanhnghiep') && AllowListMenuex('t_doituong_doanhnghiep'));
                     $Menu->AddMenuItem($Language->MenuPhrase("21", "MenuText"), "t_danhmucgioithieulist.php",AllowListMenu('t_danhmucgioithieu') && AllowListMenuex('t_danhmucgioithieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("22", "MenuText"), "t_danhmuctuyensinhlist.php",AllowListMenu('t_danhmuctuyensinh') && AllowListMenuex('t_danhmuctuyensinh'));
                     $Menu->AddMenuItem($Language->MenuPhrase("23", "MenuText"), "t_htlienquanlist.php",AllowListMenu('t_htlienquan') && AllowListMenuex('t_htlienquan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("30", "MenuText"), "t_tinbai_mainsitelist.php",AllowListMenu('t_tinbai_mainsite') && AllowListMenuex('t_tinbai_mainsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("50", "MenuText"), "t_thongbao_mainsitelist.php",AllowListMenu('t_thongbao_mainsite') && AllowListMenuex('t_thongbao_mainsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("60", "MenuText"), "t_danhmuclichlist.php",AllowListMenu('t_danhmuclich') && AllowListMenuex('t_danhmuclich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "t_ghichu_lichlist.php",AllowListMenu('t_ghichu_lich') && AllowListMenuex('t_ghichu_lich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("63", "MenuText"), "t_lichcongtac_mainsitelist.php",AllowListMenu('t_lichcongtac_mainsite') && AllowListMenuex('t_lichcongtac_mainsite')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("70", "MenuText"), "advertisinglist.php",AllowListMenu('advertising') && AllowListMenuex('advertising'));
                   ?>
		</ul>
        </li>
        <li style="width: 165px;"><a href="#"><span>HỆ THỐNG LEVEL SITE</span></a>
                <ul>
                     <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("12", "MenuText"), "t_chuyenmuc_levelsitelist.php",AllowListMenu('t_chuyenmuc_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("13", "MenuText"), "t_doituong_levelsitelist.php",AllowListMenu('t_doituong_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("14", "MenuText"), "t_tinbai_levelsitelist.php",AllowListMenu('t_tinbai_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("15", "MenuText"), "t_thongbao_levelsitelist.php",AllowListMenu('t_thongbao_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "t_ghichu_lichlist.php",AllowListMenu('t_ghichu_lich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("62", "MenuText"), "t_lichcongtaclist.php",AllowListMenu('t_lichcongtac')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("71", "MenuText"), "t_linkadlist.php",AllowListMenu('t_linkad')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("168", "MenuText"), "t_eventlist.php",AllowListMenu('t_event')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("170", "MenuText"), "t_lylichlist.php",AllowListMenu('t_lylich')); 
                     ?>
		</ul>
        </li>
        <li><a href="#"><span>THỐNG KÊ&BÁO CÁO</span></a>
                 <ul>
                    <?php 
                        $Menu->AddMenuItem($Language->MenuPhrase("83", "MenuText"), "t_lienhelist.php",AllowListMenu('t_lienhe'));
                    ?>
                 </ul>
         </li>
        <?php } else { ?>
         <li><a id="taikhoan" href="#"><span>QUẢN TRỊ TÀI KHOẢN</span></a>
                <ul>
                    <?php
                    $Menu->AddMenuItem($Language->MenuPhrase("81", "MenuText"), "users_solist.php",AllowListMenu('users_so'));
                    $Menu->AddMenuItem($Language->MenuPhrase("45", "MenuText"), "userslist.php",AllowListMenu('users') && AllowListMenuex('users'));
                    $Menu->AddMenuItem($Language->MenuPhrase("43", "MenuText"), "userview.php",AllowListMenu('user') && AllowListMenuex('user'));
//                   $Menu->AddMenuItem($Language->MenuPhrase("40", "MenuText"), "changepwd.php",IsLoggedIn());
                    ?>
		</ul>
        </li>
     <?php if  ($Security->CurrentUserOption() ==119)  {?>
        <li><a href="#"><span>QUẢN TRỊ HỆ THỐNG</span></a>
                <ul>
                        <?php
                          $Menu->AddMenuItem($Language->MenuPhrase("11", "MenuText"), "t_nganhnghelist.php",AllowListMenu('t_congty') && AllowListMenuex('t_nganhnghe'));
                          $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtylist.php",AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                          $Menu->AddMenuItem($Language->MenuPhrase("42", "MenuText"), "footerview.php",AllowListMenu('footer'));
                        
                        ?>
		</ul>
        </li>
        <li style="width:165px;"><a href="#"><span>HỆ THỐNG MAIN SITE</span></a>
                <ul>
                   <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtylist.php",AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                     $Menu->AddMenuItem($Language->MenuPhrase("16", "MenuText"), "t_doituong_svtuonglailist.php",AllowListMenu('t_doituong_svtuonglai') && AllowListMenuex('t_doituong_svtuonglai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("17", "MenuText"), "t_doituong_svdanghoclist.php",AllowListMenu('t_doituong_svdanghoc') && AllowListMenuex('t_doituong_svdanghoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("18", "MenuText"), "t_doituong_cuusvlist.php",AllowListMenu('t_doituong_cuusv') && AllowListMenuex('t_doituong_cuusv'));
                     $Menu->AddMenuItem($Language->MenuPhrase("20", "MenuText"), "t_doituong_doanhnghieplist.php",AllowListMenu('t_doituong_doanhnghiep') && AllowListMenuex('t_doituong_doanhnghiep'));
                     $Menu->AddMenuItem($Language->MenuPhrase("21", "MenuText"), "t_danhmucgioithieulist.php",AllowListMenu('t_danhmucgioithieu') && AllowListMenuex('t_danhmucgioithieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("22", "MenuText"), "t_danhmuctuyensinhlist.php",AllowListMenu('t_danhmuctuyensinh') && AllowListMenuex('t_danhmuctuyensinh'));
                     $Menu->AddMenuItem($Language->MenuPhrase("23", "MenuText"), "t_htlienquanlist.php",AllowListMenu('t_htlienquan') && AllowListMenuex('t_htlienquan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("30", "MenuText"), "t_tinbai_mainsitelist.php",AllowListMenu('t_tinbai_mainsite') && AllowListMenuex('t_tinbai_mainsite'));
                    // $Menu->AddMenuItem($Language->MenuPhrase("50", "MenuText"), "t_thongbao_mainsitelist.php",AllowListMenu('t_thongbao_mainsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("60", "MenuText"), "t_danhmuclichlist.php",AllowListMenu('t_danhmuclich') && AllowListMenuex('t_danhmuclich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "t_ghichu_lichlist.php",AllowListMenu('t_ghichu_lich') && AllowListMenuex('t_ghichu_lich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("63", "MenuText"), "t_lichcongtac_mainsitelist.php",AllowListMenu('t_lichcongtac_mainsite') && AllowListMenuex('t_lichcongtac_mainsite')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("15", "MenuText"), "t_thongbao_levelsitelist.php",AllowListMenu('t_thongbao_levelsite') && AllowListMenuex('t_thongbao_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("70", "MenuText"), "advertisinglist.php",AllowListMenu('advertising') && AllowListMenuex('t_thongbao_levelsite'));
                   
                   ?>
		</ul>
        </li>
        <?php } ?>
        <li style="width: 165px;"><a href="#"><span>HỆ THỐNG LEVEL SITE</span></a>
                <ul>
                     <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("12", "MenuText"), "t_chuyenmuc_levelsitelist.php",AllowListMenu('t_chuyenmuc_levelsite') && AllowListMenuex('t_chuyenmuc_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("13", "MenuText"), "t_doituong_levelsitelist.php",AllowListMenu('t_doituong_levelsite') && AllowListMenuex('t_doituong_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("14", "MenuText"), "t_tinbai_levelsitelist.php",AllowListMenu('t_tinbai_levelsite') && AllowListMenuex('t_tinbai_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("15", "MenuText"), "t_thongbao_levelsitelist.php",AllowListMenu('t_thongbao_levelsite') && AllowListMenuex('t_thongbao_levelsite'));
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "t_ghichu_lichlist.php",AllowListMenu('t_ghichu_lich') && AllowListMenuex('t_ghichu_lich'));
                     $Menu->AddMenuItem($Language->MenuPhrase("62", "MenuText"), "t_lichcongtaclist.php",AllowListMenu('t_lichcongtac') && AllowListMenuex('t_lichcongtac')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("71", "MenuText"), "t_linkadlist.php",AllowListMenu('t_linkad') && AllowListMenuex('t_linkad')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("168", "MenuText"), "t_eventlist.php",AllowListMenu('t_event') && AllowListMenuex('t_event')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("170", "MenuText"), "t_lylichlist.php",AllowListMenu('t_lylich')); 
                     ?>
		</ul>
        </li>
        <li style="width:165px;"><a href="#"><span>THỐNG KÊ & BÁO CÁO</span></a>
                <ul>
                     <?php
                    // $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "baocao1list.php",AllowListMenu('baocao1') && AllowListMenuex('baocao1'));
                   
                     ?>
		</ul>
        </li>

 
        <?php } ?>
        <li style="width:165px;"><a href="#"><span>TRỢ GIÚP</span></a> 
		     <ul>
			     <li><a  target="_blank" href="../admin/help/index.html"><span>Hướng dẫn sử dụng hệ thống</span></a> </li>
			 </ul>
        </li>
</ul>
</div>
