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
<!-- Begin Main Menu -->
<div class="phpmaker">
<?php

// Generate all menu items
$RootMenu = new cMenu("RootMenu");
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(41, $Language->MenuPhrase("41", "MenuText"), "userlevelslist.php", -1, "", (@$_SESSION[EW_SESSION_USER_LEVEL] & EW_ALLOW_ADMIN) == EW_ALLOW_ADMIN);
$RootMenu->AddMenuItem(39, $Language->MenuPhrase("39", "MenuText"), "t_cthainguyhai_sllist.php", -1, "", AllowListMenu('t_cthainguyhai_sl'));
$RootMenu->AddMenuItem(1, $Language->MenuPhrase("1", "MenuText"), "communelist.php", -1, "", AllowListMenu('commune'));
$RootMenu->AddMenuItem(2, $Language->MenuPhrase("2", "MenuText"), "districtlist.php", -1, "", AllowListMenu('district'));
$RootMenu->AddMenuItem(3, $Language->MenuPhrase("3", "MenuText"), "provincelist.php", -1, "", AllowListMenu('province'));
$RootMenu->AddMenuItem(5, $Language->MenuPhrase("5", "MenuText"), "t_bpdungnllist.php", -1, "", AllowListMenu('t_bpdungnl'));
$RootMenu->AddMenuItem(6, $Language->MenuPhrase("6", "MenuText"), "t_bvphanhoilist.php", -1, "", AllowListMenu('t_bvphanhoi'));
$RootMenu->AddMenuItem(7, $Language->MenuPhrase("7", "MenuText"), "t_chatthairanlist.php", -1, "", AllowListMenu('t_chatthairan'));
$RootMenu->AddMenuItem(8, $Language->MenuPhrase("8", "MenuText"), "t_chuyenmuclist.php", -1, "", AllowListMenu('t_chuyenmuc'));
$RootMenu->AddMenuItem(9, $Language->MenuPhrase("9", "MenuText"), "t_cn_khithailist.php", -1, "", AllowListMenu('t_cn_khithai'));
$RootMenu->AddMenuItem(10, $Language->MenuPhrase("10", "MenuText"), "t_congtylist.php", -1, "", AllowListMenu('t_congty'));
$RootMenu->AddMenuItem(11, $Language->MenuPhrase("11", "MenuText"), "t_cthainguyhailist.php", -1, "", AllowListMenu('t_cthainguyhai'));
$RootMenu->AddMenuItem(12, $Language->MenuPhrase("12", "MenuText"), "t_dmvanbanlist.php", -1, "", AllowListMenu('t_dmvanban'));
$RootMenu->AddMenuItem(14, $Language->MenuPhrase("14", "MenuText"), "t_duanlist.php", -1, "", AllowListMenu('t_duan'));
$RootMenu->AddMenuItem(15, $Language->MenuPhrase("15", "MenuText"), "t_htxulynuocthailist.php", -1, "", AllowListMenu('t_htxulynuocthai'));
$RootMenu->AddMenuItem(16, $Language->MenuPhrase("16", "MenuText"), "t_kqdo_khithailist.php", -1, "", AllowListMenu('t_kqdo_khithai'));
$RootMenu->AddMenuItem(17, $Language->MenuPhrase("17", "MenuText"), "t_kqdo_nuocthailist.php", -1, "", AllowListMenu('t_kqdo_nuocthai'));
$RootMenu->AddMenuItem(18, $Language->MenuPhrase("18", "MenuText"), "t_lluongntlist.php", -1, "", AllowListMenu('t_lluongnt'));
$RootMenu->AddMenuItem(19, $Language->MenuPhrase("19", "MenuText"), "t_loainhienlieulist.php", -1, "", AllowListMenu('t_loainhienlieu'));
$RootMenu->AddMenuItem(20, $Language->MenuPhrase("20", "MenuText"), "t_nganhnghelist.php", -1, "", AllowListMenu('t_nganhnghe'));
$RootMenu->AddMenuItem(21, $Language->MenuPhrase("21", "MenuText"), "t_nguoidunglist.php", -1, "", AllowListMenu('t_nguoidung'));
$RootMenu->AddMenuItem(22, $Language->MenuPhrase("22", "MenuText"), "t_nguonkhithailist.php", -1, "", AllowListMenu('t_nguonkhithai'));
$RootMenu->AddMenuItem(23, $Language->MenuPhrase("23", "MenuText"), "t_nhomdolist.php", -1, "", AllowListMenu('t_nhomdo'));
$RootMenu->AddMenuItem(24, $Language->MenuPhrase("24", "MenuText"), "t_nhomndlist.php", -1, "", AllowListMenu('t_nhomnd'));
$RootMenu->AddMenuItem(25, $Language->MenuPhrase("25", "MenuText"), "t_nhomnganhlist.php", -1, "", AllowListMenu('t_nhomnganh'));
$RootMenu->AddMenuItem(26, $Language->MenuPhrase("26", "MenuText"), "t_quanlymtlist.php", -1, "", AllowListMenu('t_quanlymt'));
$RootMenu->AddMenuItem(27, $Language->MenuPhrase("27", "MenuText"), "t_sdnhienlieulist.php", -1, "", AllowListMenu('t_sdnhienlieu'));
$RootMenu->AddMenuItem(28, $Language->MenuPhrase("28", "MenuText"), "t_sdnuoclist.php", -1, "", AllowListMenu('t_sdnuoc'));
$RootMenu->AddMenuItem(29, $Language->MenuPhrase("29", "MenuText"), "t_tchuanthamsodolist.php", -1, "", AllowListMenu('t_tchuanthamsodo'));
$RootMenu->AddMenuItem(30, $Language->MenuPhrase("30", "MenuText"), "t_tcqlmtlist.php", -1, "", AllowListMenu('t_tcqlmt'));
$RootMenu->AddMenuItem(31, $Language->MenuPhrase("31", "MenuText"), "t_thamsodolist.php", -1, "", AllowListMenu('t_thamsodo'));
$RootMenu->AddMenuItem(32, $Language->MenuPhrase("32", "MenuText"), "t_tieuchuanlist.php", -1, "", AllowListMenu('t_tieuchuan'));
$RootMenu->AddMenuItem(33, $Language->MenuPhrase("33", "MenuText"), "t_tinbailist.php", -1, "", AllowListMenu('t_tinbai'));
$RootMenu->AddMenuItem(34, $Language->MenuPhrase("34", "MenuText"), "t_ttsanxuatlist.php", -1, "", AllowListMenu('t_ttsanxuat'));
$RootMenu->AddMenuItem(35, $Language->MenuPhrase("35", "MenuText"), "t_vanbanlist.php", -1, "", AllowListMenu('t_vanban'));
$RootMenu->AddMenuItem(38, $Language->MenuPhrase("38", "MenuText"), "t_do_nganhlist.php", -1, "", AllowListMenu('t_do_nganh'));
$RootMenu->AddMenuItem(-2, $Language->Phrase("ChangePwd"), "changepwd.php", -1, "", IsLoggedIn() && !IsSysAdmin());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Logout"), "logout.php", -1, "", IsLoggedIn());
$RootMenu->AddMenuItem(-1, $Language->Phrase("Login"), "login.php", -1, "", !IsLoggedIn() && substr(@$_SERVER["URL"], -1 * strlen("login.php")) <> "login.php");
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
