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
$RootMenu->AddMenuItem(3, $Language->MenuPhrase("3", "MenuText"), "BaoLuulist.php", -1, "", TRUE);
$RootMenu->AddMenuItem(78, $Language->MenuPhrase("78", "MenuText"), "NhatKyGDlist.php", -1, "", TRUE);
$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->
