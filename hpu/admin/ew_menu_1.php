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
                    $Menu->AddMenuItem($Language->MenuPhrase("81", "MenuText"), "users_solist.php",AllowListMenu('users_so'));
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
                          $Menu->AddMenuItem($Language->MenuPhrase("82", "MenuText"), $stringbc,AllowListMenu('t_congty_nambc'));
                          $Menu->AddMenuItem($Language->MenuPhrase("80", "MenuText"), "t_sobannganhlist.php",AllowListMenu('t_sobannganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("20", "MenuText"), "t_nganhnghelist.php?cmd=reset",AllowListMenu('t_nganhnghe'));
                          $Menu->AddMenuItem($Language->MenuPhrase("19", "MenuText"), "t_loainhienlieulist.php?cmd=reset",AllowListMenu('t_loainhienlieu'));
                          $Menu->AddMenuItem($Language->MenuPhrase("30", "MenuText"), "t_tcqlmtlist.php",AllowListMenu('t_tcqlmt'));
                          $Menu->AddMenuItem($Language->MenuPhrase("32", "MenuText"), "t_tieuchuanlist.php",AllowListMenu('t_tieuchuan'));
                          $Menu->AddMenuItem($Language->MenuPhrase("23", "MenuText"), "t_nhomdolist.php",AllowListMenu('t_nhomdo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("31", "MenuText"), "t_thamsodolist.php",AllowListMenu('t_thamsodo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("29", "MenuText"), "t_tchuanthamsodolist.php?",AllowListMenu('t_tchuanthamsodo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("25", "MenuText"), "t_nhomnganhlist.php",AllowListMenu('t_nhomnganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("38", "MenuText"), "t_do_nganhlist.php",AllowListMenu('t_do_nganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("9", "MenuText"), "t_cn_khithailist.php",AllowListMenu('t_cn_khithai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("48", "MenuText"), "t_dactrungkhithailist.php",AllowListMenu('t_dactrungkhithai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("49", "MenuText"), "t_loaichatthairanlist.php",AllowListMenu('t_loaichatthairan'));
                          $Menu->AddMenuItem($Language->MenuPhrase("60", "MenuText"), "t_loaithainguyhailist.php",AllowListMenu('t_loaithainguyhai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("53", "MenuText"), "t_nguonnuocthailist.php",AllowListMenu('t_nguonnuocthai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("42", "MenuText"), "footerview.php",AllowListMenu('footer'));
                        
                        ?>
		</ul>
        </li>
         <!--<li><a href="#"><span>QUẢN TRỊ NỘI DUNG</span></a>
                <ul>-->
	   	       <?php
                       
                       //  $Menu->AddMenuItem($Language->MenuPhrase("8", "MenuText"), "t_chuyenmuclist.php?cmd=reset",AllowListMenu('t_chuyenmuc'));
                       //  $Menu->AddMenuItem($Language->MenuPhrase("33", "MenuText"), "t_tinbailist.php",AllowListMenu('t_tinbai'));
                       //  $Menu->AddMenuItem($Language->MenuPhrase("12", "MenuText"),  "t_dmvanbanlist.php",AllowListMenu('t_dmvanban'));
                       //  $Menu->AddMenuItem($Language->MenuPhrase("35", "MenuText"), "t_vanbanlist.php?cmd=reset",AllowListMenu('t_vanban'));
                       //  $Menu->AddMenuItem($Language->MenuPhrase("14", "MenuText"), "t_duanlist.php?",AllowListMenu('t_duan'));
                        //$Menu->AddMenuItem($Language->MenuPhrase("5", "MenuText"), "countrylist.php",AllowListMenu('country'));
                        ?>
		<!--</ul>
        </li> -->
        <li style="width:165px;"><a href="#"><span>HỆ THỐNG MAIN SITE</span></a>
                <ul>
                   <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtylist.php",AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                     $Menu->AddMenuItem($Language->MenuPhrase("34", "MenuText"), "t_ttsanxuatlist.php",AllowListMenu('t_ttsanxuat') && AllowListMenuex('t_ttsanxuat'));
                     $Menu->AddMenuItem($Language->MenuPhrase("5", "MenuText"), "t_bpdungnllist.php",AllowListMenu('t_bpdungnl') && AllowListMenuex('t_bpdungnl'));
                     $Menu->AddMenuItem($Language->MenuPhrase("27", "MenuText"), "t_sdnhienlieulist.php",AllowListMenu('t_sdnhienlieu') && AllowListMenuex('t_sdnhienlieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("28", "MenuText"), "t_sdnuoclist.php",AllowListMenu('t_sdnuoc') && AllowListMenuex('t_sdnuoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("54", "MenuText"), "t_sddienlist.php",AllowListMenu('t_sddien') && AllowListMenuex('t_sddien'));
                     $Menu->AddMenuItem($Language->MenuPhrase("26", "MenuText"), "t_quanlymtlist.php",AllowListMenu('t_quanlymt') && AllowListMenuex('t_quanlymt')); 
                     $Menu->AddMenuItem($Language->MenuPhrase("18", "MenuText"), "t_lluongntlist.php",AllowListMenu('t_lluongnt') && AllowListMenuex('t_lluongnt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("15", "MenuText"), "t_htxulynuocthailist.php",AllowListMenu('t_htxulynuocthai') && AllowListMenuex('t_htxulynuocthai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("17", "MenuText"), "t_kqdo_nuocthailist.php",AllowListMenu('t_kqdo_nuocthai') && AllowListMenuex('t_kqdo_nuocthai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("59", "MenuText"), "t_nguonkhithailist.php",AllowListMenu('t_nguonkhithai') && AllowListMenuex('t_nguonkhithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("50", "MenuText"), "t_luongkhithailist.php",AllowListMenu('t_luongkhithai') && AllowListMenuex('t_luongkhithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("16", "MenuText"), "t_kqdo_khithailist.php",AllowListMenu('t_kqdo_khithai') && AllowListMenuex('t_kqdo_khithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("51", "MenuText"), "t_luongthairanlist.php",AllowListMenu('t_luongthairan') && AllowListMenuex('t_luongthairan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("55", "MenuText"), "t_chatthairanlist.php",AllowListMenu('t_chatthairan') && AllowListMenuex('t_chatthairan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("57", "MenuText"), "t_luongthainguyhailist.php",AllowListMenu('t_luongthainguyhai') && AllowListMenuex('t_luongthainguyhai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("58", "MenuText"), "t_thainguyhailist.php",AllowListMenu('t_thainguyhai') && AllowListMenuex('t_thainguyhai'));
                   ?>
		</ul>
        </li>
        <li style="width: 165px;"><a href="#"><span>HỆ THỐNG LEVEL SITE</span></a>
                <ul>
                     <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "baocao1list.php",AllowListMenu('baocao1'));
                     $Menu->AddMenuItem($Language->MenuPhrase("70", "MenuText"), "baocao15list.php",AllowListMenu('baocao15'));
                     $Menu->AddMenuItem($Language->MenuPhrase("84", "MenuText"), "baocao19list.php",AllowListMenu('baocao19'));
                     $Menu->AddMenuItem($Language->MenuPhrase("85", "MenuText"), "baocao20list.php",AllowListMenu('baocao20'));
                     $Menu->AddMenuItem($Language->MenuPhrase("71", "MenuText"), "baocao16list.php",AllowListMenu('baocao16'));
                     $Menu->AddMenuItem($Language->MenuPhrase("72", "MenuText"), "baocao18list.php",AllowListMenu('baocao18'));
                     $Menu->AddMenuItem($Language->MenuPhrase("73", "MenuText"), "bc_sudungnhienlieureport.php",AllowListMenu('bc_sudungnhienlieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("75", "MenuText"), "bc_sudungdienreport.php",AllowListMenu('bc_sudungdien'));
                     $Menu->AddMenuItem($Language->MenuPhrase("76", "MenuText"), "bc_sudungnuocreport.php",AllowListMenu('bc_sudungnuoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("77", "MenuText"), "bc_luuluongntreport.php",AllowListMenu('bc_luuluongnt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("79", "MenuText"), "bc_htxulyntreport.php",AllowListMenu('bc_htxulynt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("78", "MenuText"), "bc_luuluongkhtreport.php",AllowListMenu('bc_luuluongnt'));
                     ?>
		</ul>
        </li>
        <li><a href="#"><span>THỐNG KÊ && BÁO CÁO</span></a>
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
                    $Menu->AddMenuItem($Language->MenuPhrase("45", "MenuText"), "userslist.php",AllowListMenu('users'));
                    $Menu->AddMenuItem($Language->MenuPhrase("43", "MenuText"), "userview.php",AllowListMenu('user'));
                    $Menu->AddMenuItem($Language->MenuPhrase("40", "MenuText"), "changepwd.php",IsLoggedIn());
                    ?>
		</ul>
        </li>
      <!-- <li><a href="#"><span>QUẢN TRỊ NỘI DUNG</span></a>
                <ul>
                    <?php
                    //$Menu->AddMenuItem($Language->MenuPhrase("23", "MenuText"), "userview.php?nguoidung_id=".$Security->CurrentUserID(),AllowListMenu('user'));
                    //$Menu->AddMenuItem($Language->MenuPhrase("31", "MenuText"), "payment_accountlist.php",AllowListMenu('payment_account'));
                    //$Menu->AddMenuItem($Language->MenuPhrase("24", "MenuText"), "changepwd.php",IsLoggedIn());
                    ?>
		</ul>
        </li> -->
        <?php 
        $m1=AllowListMenu('t_nganhnghe')&& AllowListMenuex('t_nganhnghe');
        $m2=AllowListMenu('t_loainhienlieu')&& AllowListMenuex('t_loainhienlieu');
        $m3=AllowListMenu('t_tcqlmt')&& AllowListMenuex('t_tcqlmt');
        $m4=AllowListMenu('t_tieuchuan')&& AllowListMenuex('t_tieuchuan');
        $m5=AllowListMenu('t_nhomdo')&& AllowListMenuex('t_nhomdo');
        $m6=AllowListMenu('t_thamsodo')&& AllowListMenuex('t_thamsodo');
        $m7=AllowListMenu('t_tchuanthamsodo')&& AllowListMenuex('t_tchuanthamsodo');
        $m8=AllowListMenu('t_nhomnganh')&& AllowListMenuex('t_nhomnganh');
        $m9=AllowListMenu('t_do_nganh')&& AllowListMenuex('t_do_nganh');
        $m10=AllowListMenu('t_cn_khithai')&& AllowListMenuex('t_cn_khithai');
        $m11=AllowListMenu('t_dactrungkhithai')&& AllowListMenuex('t_dactrungkhithai');
        $m12=AllowListMenu('t_loaichatthairan')&& AllowListMenuex('t_loaichatthairan');
        $m13=AllowListMenu('t_loaithainguyhai')&& AllowListMenuex('t_loaithainguyhai');
        $m14=AllowListMenu('t_nguonnuocthai')&& AllowListMenuex('t_nguonnuocthai');
        $m15=AllowListMenu('footer')&& AllowListMenuex('footer');
        $m16=AllowListMenu('t_sobannganh')&& AllowListMenuex('t_sobannganh');
        if ($m1 || $m2 || $m3 || $m4 || $m5 || $m6 || $m7 || $m8 || $m9 || $m10 || $m11 || $m12 || $m13 || $m14 || $m15 || $m16) { ?>
        <li><a href="#"><span>QUẢN TRỊ HỆ THỐNG</span></a>
                <ul>
                        <?php
                          $Menu->AddMenuItem($Language->MenuPhrase("82", "MenuText"), $stringbc,AllowListMenu('t_congty_nambc'));
                          $Menu->AddMenuItem($Language->MenuPhrase("80", "MenuText"), "t_sobannganhlist.php?cmd=reset",AllowListMenu('t_sobannganh')&& AllowListMenuex('t_sobannganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("20", "MenuText"), "t_nganhnghelist.php?cmd=reset",AllowListMenu('t_nganhnghe')&& AllowListMenuex('t_nganhnghe'));
                          $Menu->AddMenuItem($Language->MenuPhrase("19", "MenuText"), "t_loainhienlieulist.php?cmd=reset",AllowListMenu('t_loainhienlieu')&& AllowListMenuex('t_loainhienlieu'));
                          $Menu->AddMenuItem($Language->MenuPhrase("30", "MenuText"), "t_tcqlmtlist.php",AllowListMenu('t_tcqlmt')&& AllowListMenuex('t_tcqlmt'));
                          $Menu->AddMenuItem($Language->MenuPhrase("32", "MenuText"), "t_tieuchuanlist.php",AllowListMenu('t_tieuchuan')&& AllowListMenuex('t_tieuchuan'));
                          $Menu->AddMenuItem($Language->MenuPhrase("23", "MenuText"), "t_nhomdolist.php",AllowListMenu('t_nhomdo')&& AllowListMenuex('t_nhomdo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("31", "MenuText"), "t_thamsodolist.php",AllowListMenu('t_thamsodo')&& AllowListMenuex('t_thamsodo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("29", "MenuText"), "t_tchuanthamsodolist.php?",AllowListMenu('t_tchuanthamsodo')&& AllowListMenuex('t_tchuanthamsodo'));
                          $Menu->AddMenuItem($Language->MenuPhrase("25", "MenuText"), "t_nhomnganhlist.php",AllowListMenu('t_nhomnganh')&& AllowListMenuex('t_nhomnganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("38", "MenuText"), "t_do_nganhlist.php",AllowListMenu('t_do_nganh')&& AllowListMenuex('t_do_nganh'));
                          $Menu->AddMenuItem($Language->MenuPhrase("9", "MenuText"), "t_cn_khithailist.php",AllowListMenu('t_cn_khithai')&& AllowListMenuex('t_cn_khithai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("48", "MenuText"), "t_dactrungkhithailist.php",AllowListMenu('t_dactrungkhithai')&& AllowListMenuex('t_dactrungkhithai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("49", "MenuText"), "t_loaichatthairanlist.php",AllowListMenu('t_loaichatthairan')&& AllowListMenuex('t_loaichatthairan'));
                          $Menu->AddMenuItem($Language->MenuPhrase("60", "MenuText"), "t_loaithainguyhailist.php",AllowListMenu('t_loaithainguyhai')&& AllowListMenuex('t_loaithainguyhai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("53", "MenuText"), "t_nguonnuocthailist.php",AllowListMenu('t_nguonnuocthai')&& AllowListMenuex('t_nguonnuocthai'));
                          $Menu->AddMenuItem($Language->MenuPhrase("42", "MenuText"), "footerview.php",AllowListMenu('footer')&& AllowListMenuex('footer'));
                         //$Menu->AddMenuItem($Language->MenuPhrase("27", "MenuText"), "articleadminlist.php",AllowListMenu('articleadmin'));
                        ?>
		</ul>
        </li>
        <?php } ?>
        <li style="width: 215px;"><a href="#"><span>DOANH NGHIỆP & MÔI TRƯỜNG</span></a>
                <ul>
                   <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("10", "MenuText"), "t_congtyview.php?PK_MACONGTY=" . CurrentUserOption() ,AllowListMenu('t_congty') && AllowListMenuex('t_congty'));
                     $Menu->AddMenuItem($Language->MenuPhrase("34", "MenuText"), "t_ttsanxuatlist.php",AllowListMenu('t_ttsanxuat') && AllowListMenuex('t_ttsanxuat'));
                     $Menu->AddMenuItem($Language->MenuPhrase("5", "MenuText"), "t_bpdungnllist.php",AllowListMenu('t_bpdungnl') && AllowListMenuex('t_bpdungnl'));
                     $Menu->AddMenuItem($Language->MenuPhrase("27", "MenuText"), "t_sdnhienlieulist.php",AllowListMenu('t_sdnhienlieu') && AllowListMenuex('t_sdnhienlieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("28", "MenuText"), "t_sdnuoclist.php",AllowListMenu('t_sdnuoc') && AllowListMenuex('t_sdnuoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("54", "MenuText"), "t_sddienlist.php",AllowListMenu('t_sddien') && AllowListMenuex('t_sddien'));
                     $Menu->AddMenuItem($Language->MenuPhrase("26", "MenuText"), "t_quanlymtlist.php",AllowListMenu('t_quanlymt') && AllowListMenuex('t_quanlymt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("18", "MenuText"), "t_lluongntlist.php",AllowListMenu('t_lluongnt') && AllowListMenuex('t_lluongnt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("15", "MenuText"), "t_htxulynuocthaiview.php",AllowListMenu('t_htxulynuocthai') && AllowListMenuex('t_htxulynuocthai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("17", "MenuText"), "t_kqdo_nuocthailist.php",AllowListMenu('t_kqdo_nuocthai') && AllowListMenuex('t_kqdo_nuocthai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("59", "MenuText"), "t_nguonkhithailist.php",AllowListMenu('t_nguonkhithai') && AllowListMenuex('t_nguonkhithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("50", "MenuText"), "t_luongkhithailist.php",AllowListMenu('t_luongkhithai') && AllowListMenuex('t_luongkhithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("16", "MenuText"), "t_kqdo_khithailist.php",AllowListMenu('t_kqdo_khithai') && AllowListMenuex('t_kqdo_khithai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("51", "MenuText"), "t_luongthairanlist.php",AllowListMenu('t_luongthairan') && AllowListMenuex('t_luongthairan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("55", "MenuText"), "t_chatthairanview.php",AllowListMenu('t_chatthairan') && AllowListMenuex('t_chatthairan'));
                     $Menu->AddMenuItem($Language->MenuPhrase("57", "MenuText"), "t_luongthainguyhailist.php",AllowListMenu('t_luongthainguyhai') && AllowListMenuex('t_luongthainguyhai'));
                     $Menu->AddMenuItem($Language->MenuPhrase("58", "MenuText"), "t_thainguyhailist.php",AllowListMenu('t_thainguyhai') && AllowListMenuex('t_thainguyhai'));
                   ?>
		</ul>
        </li>
        <li style="width:165px;"><a href="#"><span>THỐNG KÊ VÀ BÁO CÁO</span></a>
                <ul>
                     <?php
                     $Menu->AddMenuItem($Language->MenuPhrase("61", "MenuText"), "baocao1list.php",AllowListMenu('baocao1') && AllowListMenuex('baocao1'));
                     $Menu->AddMenuItem($Language->MenuPhrase("70", "MenuText"), "baocao15list.php",AllowListMenu('baocao15') && AllowListMenuex('baocao15'));
                     $Menu->AddMenuItem($Language->MenuPhrase("84", "MenuText"), "baocao19list.php",AllowListMenu('baocao19'));
                     $Menu->AddMenuItem($Language->MenuPhrase("85", "MenuText"), "baocao20list.php",AllowListMenu('baocao20'));
                     $Menu->AddMenuItem($Language->MenuPhrase("71", "MenuText"), "baocao16list.php",AllowListMenu('baocao16') && AllowListMenuex('baocao16'));
                     $Menu->AddMenuItem($Language->MenuPhrase("72", "MenuText"), "baocao18list.php",AllowListMenu('baocao18') && AllowListMenuex('baocao18'));
                     $Menu->AddMenuItem($Language->MenuPhrase("73", "MenuText"), "bc_sudungnhienlieureport.php",AllowListMenu('bc_sudungnhienlieu') && AllowListMenuex('bc_sudungnhienlieu'));
                     $Menu->AddMenuItem($Language->MenuPhrase("75", "MenuText"), "bc_sudungdienreport.php",AllowListMenu('bc_sudungdien') && AllowListMenuex('bc_sudungdien'));
                     $Menu->AddMenuItem($Language->MenuPhrase("76", "MenuText"), "bc_sudungnuocreport.php",AllowListMenu('bc_sudungnuoc') && AllowListMenuex('bc_sudungnuoc'));
                     $Menu->AddMenuItem($Language->MenuPhrase("77", "MenuText"), "bc_luuluongntreport.php",AllowListMenu('bc_luuluongnt') && AllowListMenuex('bc_luuluongnt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("79", "MenuText"), "bc_htxulyntreport.php",AllowListMenu('bc_htxulynt') && AllowListMenuex('bc_htxulynt'));
                     $Menu->AddMenuItem($Language->MenuPhrase("78", "MenuText"), "bc_luuluongkhtreport.php",AllowListMenu('bc_luuluongkht') && AllowListMenuex('bc_luuluongkht'));
                     ?>
		</ul>
        </li>
<!--          <li style="width: 165px;"><a href="#"><span>LIÊN HỆ</span></a>
                 <ul>
                    <?php
                     //  $Menu->AddMenuItem($Language->MenuPhrase("83", "MenuText"), "t_lienhelist.php",AllowListMenu('t_lienhe'));
                    ?>
                 </ul>
         </li>-->
        <?php } ?>
</ul>
</div>
