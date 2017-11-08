<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_mainsiteinfo.php" ?>
<?php include "t_nguoidunginfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Create page object
$t_tinbai_mainsite_list = new ct_tinbai_mainsite_list();
$Page =& $t_tinbai_mainsite_list;

// Page init
$t_tinbai_mainsite_list->Page_Init();

// Page main
$t_tinbai_mainsite_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_list = new ew_Page("t_tinbai_mainsite_list");

// page properties
t_tinbai_mainsite_list.PageID = "list"; // page ID
t_tinbai_mainsite_list.FormID = "ft_tinbai_mainsitelist"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_list.PageID; // for backward compatibility

// extend page with validate function for search
t_tinbai_mainsite_list.ValidateSearch = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (this.ValidateRequired) {
		var infix = "";

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj))
			return false;
	}
	for (var i=0; i<fobj.elements.length; i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
t_tinbai_mainsite_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="javascript" type="text/javascript">

function popitup(url) {
newwindow=window.open(url,'name','height=200,width=150');
if (window.focus) {newwindow.focus()}
return false;
}

</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_tinbai_mainsite_list->lTotalRecs = $t_tinbai_mainsite->SelectRecordCount();
	} else {
		if ($rs = $t_tinbai_mainsite_list->LoadRecordset())
			$t_tinbai_mainsite_list->lTotalRecs = $rs->RecordCount();
	}
	$t_tinbai_mainsite_list->lStartRec = 1;
	if ($t_tinbai_mainsite_list->lDisplayRecs <= 0 || ($t_tinbai_mainsite->Export <> "" && $t_tinbai_mainsite->ExportAll)) // Display all records
		$t_tinbai_mainsite_list->lDisplayRecs = $t_tinbai_mainsite_list->lTotalRecs;
	if (!($t_tinbai_mainsite->Export <> "" && $t_tinbai_mainsite->ExportAll))
		$t_tinbai_mainsite_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_tinbai_mainsite_list->LoadRecordset($t_tinbai_mainsite_list->lStartRec-1, $t_tinbai_mainsite_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_tinbai_mainsite->TableCaption() ?>
<?php if ($t_tinbai_mainsite->Export == "" && $t_tinbai_mainsite->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_tinbai_mainsite" id="emf_t_tinbai_mainsite" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_tinbai_mainsite',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_tinbai_mainsitelist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_tinbai_mainsite->Export == "" && $t_tinbai_mainsite->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_tinbai_mainsite_list);" style="text-decoration: none;"><img id="t_tinbai_mainsite_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span></a><br>
<div id="t_tinbai_mainsite_list_SearchPanel">
<form name="ft_tinbai_mainsitelistsrch" id="ft_tinbai_mainsitelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_tinbai_mainsite_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_tinbai_mainsite">
<?php
if ($gsSearchError == "")
	$t_tinbai_mainsite_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_tinbai_mainsite->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_tinbai_mainsite_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CONGTY_ID" id="z_FK_CONGTY_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_CONGTY_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_CONGTY_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_CONGTY_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DMGIOITHIEU_ID" id="z_FK_DMGIOITHIEU_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_DMGIOITHIEU_ID" name="x_FK_DMGIOITHIEU_ID" title="<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DMTUYENSINH_ID" id="z_FK_DMTUYENSINH_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_DMTUYENSINH_ID" name="x_FK_DMTUYENSINH_ID" title="<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DMTUYENSINH_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DTSVTUONGLAI_ID" id="z_FK_DTSVTUONGLAI_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_DTSVTUONGLAI_ID" name="x_FK_DTSVTUONGLAI_ID" title="<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DTSVDANGHOC_ID" id="z_FK_DTSVDANGHOC_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_DTSVDANGHOC_ID" name="x_FK_DTSVDANGHOC_ID" title="<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DTCUUSV_ID" id="z_FK_DTCUUSV_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_DTCUUSV_ID" name="x_FK_DTCUUSV_ID" title="<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTCUUSV_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DTDOANHNGHIEP_ID" id="z_FK_DTDOANHNGHIEP_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
                                    <select id="x_FK_DTDOANHNGHIEP_ID" name="x_FK_DTDOANHNGHIEP_ID" title="<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_HIT_MAINSITE" id="z_C_HIT_MAINSITE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_HIT_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_HIT_MAINSITE" id="x_C_HIT_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_HIT_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_HIT_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_HIT_MAINSITE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_HIT_MAINSITE" id="x_C_HIT_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_NEW_MYSEFLT" id="z_C_NEW_MYSEFLT" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_NEW_MYSEFLT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_NEW_MYSEFLT" id="x_C_NEW_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_NEW_MYSEFLT" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_NEW_MYSEFLT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_NEW_MYSEFLT->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_NEW_MYSEFLT" id="x_C_NEW_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_STATUS_MAINSITE" id="z_C_STATUS_MAINSITE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_STATUS_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS_MAINSITE" id="x_C_STATUS_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_STATUS_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_STATUS_MAINSITE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS_MAINSITE" id="x_C_STATUS_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE_MAINSITE" id="z_C_ACTIVE_MAINSITE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="120" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_tinbai_mainsite->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_tinbai_mainsite->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_tinbai_mainsite->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_tinbai_mainsite->CurrentAction <> "gridadd" && $t_tinbai_mainsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_mainsite_list->Pager)) $t_tinbai_mainsite_list->Pager = new cNumericPager($t_tinbai_mainsite_list->lStartRec, $t_tinbai_mainsite_list->lDisplayRecs, $t_tinbai_mainsite_list->lTotalRecs, $t_tinbai_mainsite_list->lRecRange) ?>
<?php if ($t_tinbai_mainsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_mainsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_mainsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_mainsite_list->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
	<?php } ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoPermission") ?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_tinbai_mainsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_tinbai_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_tinbai_mainsitelist, '<?php echo $t_tinbai_mainsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_tinbai_mainsitelist, '<?php echo $t_tinbai_mainsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_tinbai_mainsitelist" id="ft_tinbai_mainsitelist" class="ewForm" action="" method="post">
<div id="gmp_t_tinbai_mainsite" class="ewGridMiddlePanel">
<?php if ($t_tinbai_mainsite_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_tinbai_mainsite->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_tinbai_mainsite_list->RenderListOptions();

// Render list options (header, left)
$t_tinbai_mainsite_list->ListOptions->Render("header", "left");
?>
	
<?php if ($t_tinbai_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_TITLE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_TITLE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_TITLE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_TITLE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->Visible) { // C_HIT_MAINSITE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_HIT_MAINSITE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_HIT_MAINSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_HIT_MAINSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
				
<?php if ($t_tinbai_mainsite->C_ORDER_MAINSITE->Visible) { // C_ORDER_MAINSITE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_ORDER_MAINSITE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_ORDER_MAINSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_ORDER_MAINSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_ORDER_MAINSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_tinbai_mainsite->C_STATUS_MAINSITE->Visible) { // C_STATUS_MAINSITE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_STATUS_MAINSITE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_STATUS_MAINSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_STATUS_MAINSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_STATUS_MAINSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
			
<?php if ($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->Visible) { // C_TIME_ACTIVE_MAINSITE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_tinbai_mainsite->C_NOTE->Visible) { // C_NOTE ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_NOTE) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_NOTE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_NOTE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_tinbai_mainsite->C_NOTE->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_NOTE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_NOTE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_tinbai_mainsite->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<?php if ($t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_ADD_TIME) == "") { ?>
		<td><?php echo $t_tinbai_mainsite->C_ADD_TIME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_tinbai_mainsite->SortUrl($t_tinbai_mainsite->C_ADD_TIME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo "Đơn vị-Tác giả" ?></td><td style="width: 10px;"><?php if ($t_tinbai_mainsite->C_ADD_TIME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_tinbai_mainsite->C_ADD_TIME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
				
<?php

// Render list options (header, right)
$t_tinbai_mainsite_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_tinbai_mainsite->ExportAll && $t_tinbai_mainsite->Export <> "") {
	$t_tinbai_mainsite_list->lStopRec = $t_tinbai_mainsite_list->lTotalRecs;
} else {
	$t_tinbai_mainsite_list->lStopRec = $t_tinbai_mainsite_list->lStartRec + $t_tinbai_mainsite_list->lDisplayRecs - 1; // Set the last record to display
}
$t_tinbai_mainsite_list->lRecCount = $t_tinbai_mainsite_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_tinbai_mainsite_list->lStartRec > 1)
		$rs->Move($t_tinbai_mainsite_list->lStartRec - 1);
}

// Initialize aggregate
$t_tinbai_mainsite->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_tinbai_mainsite_list->RenderRow();
$t_tinbai_mainsite_list->lRowCnt = 0;
while (($t_tinbai_mainsite->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_tinbai_mainsite_list->lRecCount < $t_tinbai_mainsite_list->lStopRec) {
	$t_tinbai_mainsite_list->lRecCount++;
	if (intval($t_tinbai_mainsite_list->lRecCount) >= intval($t_tinbai_mainsite_list->lStartRec)) {
		$t_tinbai_mainsite_list->lRowCnt++;

	// Init row class and style
	$t_tinbai_mainsite->CssClass = "";
	$t_tinbai_mainsite->CssStyle = "";
	$t_tinbai_mainsite->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_tinbai_mainsite->CurrentAction == "gridadd") {
		$t_tinbai_mainsite_list->LoadDefaultValues(); // Load default values
	} else {
		$t_tinbai_mainsite_list->LoadRowValues($rs); // Load row values
	}
	$t_tinbai_mainsite->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_tinbai_mainsite_list->RenderRow();

	// Render list options
	$t_tinbai_mainsite_list->RenderListOptions();
?>
	<tr<?php echo $t_tinbai_mainsite->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_tinbai_mainsite_list->ListOptions->Render("body", "left");
?>

	
	<?php if ($t_tinbai_mainsite->C_TITLE->Visible) { // C_TITLE ?>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>>
<div style="width: 250px;"<?php echo $t_tinbai_mainsite->C_TITLE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TITLE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->Visible) { // C_HIT_MAINSITE ?>
		<td<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ListViewValue() ?></div>
<hr>
<div<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ListViewValue() ?></div>
<hr>
<div<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_tinbai_mainsite->C_ORDER_MAINSITE->Visible) { // C_ORDER_MAINSITE ?>
		<td<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttributes() ?>>
            <div><img src="../admin/images/edit.gif"> <a href="<?php echo "t_tinbai_mainsiteedit_update.php?PK_TINBAI_ID=".$t_tinbai_mainsite->PK_TINBAI_ID->ListViewValue() ?>" title="Sửa thứ tự bài viết">Sửa thứ tự</a> </div>
            <div<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_tinbai_mainsite->C_STATUS_MAINSITE->Visible) { // C_STATUS_MAINSITE ?>
		<td<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->Visible) { // C_TIME_ACTIVE_MAINSITE ?>
		<td<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ListViewValue() ?></div>
<div<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ListViewValue() ?></div>
<div<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ListViewValue() ?></div>
                </td>
	<?php } ?>

	<?php if ($t_tinbai_mainsite->C_NOTE->Visible) { // C_NOTE ?>
		<td<?php echo $t_tinbai_mainsite->C_NOTE->CellAttributes() ?>>
<div style="width:150px;"<?php echo $t_tinbai_mainsite->C_NOTE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NOTE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_tinbai_mainsite->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
<td<?php echo $t_tinbai_mainsite->C_ADD_TIME->CellAttributes() ?>>
<div style="width:200px"<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttributes() ?>> <b><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ListViewValue() ?></b> </div>
<hr>
<div<?php echo $t_tinbai_mainsite->C_USER_ADD->ViewAttributes() ?>><i> <?php echo $t_tinbai_mainsite->C_USER_ADD->ListViewValue() ?> </i></div>                   
<div<?php echo $t_tinbai_mainsite->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ADD_TIME->ListViewValue() ?></div>
<hr>
<div<?php echo $t_tinbai_mainsite->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_USER_EDIT->ListViewValue() ?></div>   
<div<?php echo $t_tinbai_mainsite->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_EDIT_TIME->ListViewValue() ?></div>
           
                </td>
	<?php } ?>

<?php

// Render list options (body, right)
$t_tinbai_mainsite_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_tinbai_mainsite->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
<?php if ($t_tinbai_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_tinbai_mainsite->CurrentAction <> "gridadd" && $t_tinbai_mainsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_mainsite_list->Pager)) $t_tinbai_mainsite_list->Pager = new cNumericPager($t_tinbai_mainsite_list->lStartRec, $t_tinbai_mainsite_list->lDisplayRecs, $t_tinbai_mainsite_list->lTotalRecs, $t_tinbai_mainsite_list->lRecRange) ?>
<?php if ($t_tinbai_mainsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_mainsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_mainsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_list->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_tinbai_mainsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_mainsite_list->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
	<?php } ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoPermission") ?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_tinbai_mainsite_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_tinbai_mainsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_tinbai_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_tinbai_mainsitelist, '<?php echo $t_tinbai_mainsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_tinbai_mainsitelist, '<?php echo $t_tinbai_mainsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_tinbai_mainsite->Export == "" && $t_tinbai_mainsite->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->
<?php if (!isset($_GET['t'])) { ?>
   ew_ToggleSearchPanel(t_tinbai_mainsite_list);
 <?php } ?>
</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_tinbai_mainsite_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_tinbai_mainsite';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_mainsite->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage);
		if ($sMessage <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $sMessage . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_mainsite_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite)
		$GLOBALS["t_tinbai_mainsite"] = new ct_tinbai_mainsite();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_tinbai_mainsite"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_tinbai_mainsitedelete.php";
		$this->MultiUpdateUrl = "t_tinbai_mainsiteupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_mainsite', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();

		// List options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $t_tinbai_mainsite;

		// User profile
		$UserProfile = new cUserProfile();
		$UserProfile->LoadProfile(@$_SESSION[EW_SESSION_USER_PROFILE]);

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_tinbai_mainsite->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_tinbai_mainsite->Export = $_POST["exporttype"];
		} else {
			$t_tinbai_mainsite->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_tinbai_mainsite->Export; // Get export parameter, used in header
		$gsExportFile = $t_tinbai_mainsite->TableVar; // Get export file, used in header
		if (in_array($t_tinbai_mainsite->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_tinbai_mainsite->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_tinbai_mainsite->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_tinbai_mainsite->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_tinbai_mainsite->Export == "csv") {
			header('Content-Type: application/csv;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $lDisplayRecs = 20;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $sSrchWhere = ""; // Search WHERE clause
	var $lRecCnt = 0; // Record count
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex; // Row index
	var $lRecPerRow = 0;
	var $lColCnt = 0;
	var $sDbMasterFilter = ""; // Master filter
	var $sDbDetailFilter = ""; // Detail filter
	var $bMasterRecordExists;	
	var $sMultiSelectKey;
	var $RestoreSearch;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsSearchError, $Security, $t_tinbai_mainsite;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up list options
			$this->SetupListOptions();

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->LoadSearchValues(); // Get search values
			if (!$this->ValidateSearch())
				$this->setMessage($gsSearchError);

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$t_tinbai_mainsite->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Get search criteria for advanced search
			if ($gsSearchError == "")
				$sSrchAdvanced = $this->AdvancedSearchWhere();
		}

		// Restore display records
		if ($t_tinbai_mainsite->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_tinbai_mainsite->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchAdvanced . ")" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchBasic. ")" : $sSrchBasic;

		// Call Recordset_Searching event
		$t_tinbai_mainsite->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_tinbai_mainsite->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_tinbai_mainsite->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$t_tinbai_mainsite->setSessionWhere($sFilter);
		$t_tinbai_mainsite->CurrentFilter = "";

		// Export data only
		if (in_array($t_tinbai_mainsite->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_tinbai_mainsite->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_tinbai_mainsite;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->PK_TINBAI_ID, FALSE); // PK_TINBAI_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_CONGTY_ID, FALSE); // FK_CONGTY_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DMGIOITHIEU_ID, FALSE); // FK_DMGIOITHIEU_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DMTUYENSINH_ID, FALSE); // FK_DMTUYENSINH_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID, FALSE); // FK_DTSVTUONGLAI_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DTSVDANGHOC_ID, FALSE); // FK_DTSVDANGHOC_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DTCUUSV_ID, FALSE); // FK_DTCUUSV_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID, FALSE); // FK_DTDOANHNGHIEP_ID
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_TITLE, FALSE); // C_TITLE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_SUMARY, FALSE); // C_SUMARY
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_CONTENTS, FALSE); // C_CONTENTS
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_HIT_MAINSITE, FALSE); // C_HIT_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_NEW_MYSEFLT, FALSE); // C_NEW_MYSEFLT
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_COMMENT_MAINSITE, FALSE); // C_COMMENT_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_ORDER_MAINSITE, FALSE); // C_ORDER_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_STATUS_MAINSITE, FALSE); // C_STATUS_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_VISITOR_MAINSITE, FALSE); // C_VISITOR_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_ACTIVE_MAINSITE, FALSE); // C_ACTIVE_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE, FALSE); // C_TIME_ACTIVE_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE, FALSE); // FK_NGUOIDUNGID_MAINSITE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_NOTE, FALSE); // C_NOTE
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->C_EDIT_TIME, FALSE); // C_EDIT_TIME
		$this->BuildSearchSql($sWhere, $t_tinbai_mainsite->FK_EDITOR_ID, FALSE); // FK_EDITOR_ID

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_tinbai_mainsite->PK_TINBAI_ID); // PK_TINBAI_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_CONGTY_ID); // FK_CONGTY_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DMGIOITHIEU_ID); // FK_DMGIOITHIEU_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DMTUYENSINH_ID); // FK_DMTUYENSINH_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID); // FK_DTSVTUONGLAI_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DTSVDANGHOC_ID); // FK_DTSVDANGHOC_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DTCUUSV_ID); // FK_DTCUUSV_ID
			$this->SetSearchParm($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID); // FK_DTDOANHNGHIEP_ID
			$this->SetSearchParm($t_tinbai_mainsite->C_TITLE); // C_TITLE
			$this->SetSearchParm($t_tinbai_mainsite->C_SUMARY); // C_SUMARY
			$this->SetSearchParm($t_tinbai_mainsite->C_CONTENTS); // C_CONTENTS
			$this->SetSearchParm($t_tinbai_mainsite->C_HIT_MAINSITE); // C_HIT_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_NEW_MYSEFLT); // C_NEW_MYSEFLT
			$this->SetSearchParm($t_tinbai_mainsite->C_COMMENT_MAINSITE); // C_COMMENT_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_ORDER_MAINSITE); // C_ORDER_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_STATUS_MAINSITE); // C_STATUS_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_VISITOR_MAINSITE); // C_VISITOR_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_ACTIVE_MAINSITE); // C_ACTIVE_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE); // C_TIME_ACTIVE_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE); // FK_NGUOIDUNGID_MAINSITE
			$this->SetSearchParm($t_tinbai_mainsite->C_NOTE); // C_NOTE
			$this->SetSearchParm($t_tinbai_mainsite->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_tinbai_mainsite->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_tinbai_mainsite->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_tinbai_mainsite->C_EDIT_TIME); // C_EDIT_TIME
			$this->SetSearchParm($t_tinbai_mainsite->FK_EDITOR_ID); // FK_EDITOR_ID
		}
		return $sWhere;
	}

	// Build search SQL
	function BuildSearchSql(&$Where, &$Fld, $MultiValue) {
		$FldParm = substr($Fld->FldVar, 2);		
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldOpr = $Fld->AdvancedSearch->SearchOperator; // @$_GET["z_$FldParm"]
		$FldCond = $Fld->AdvancedSearch->SearchCondition; // @$_GET["v_$FldParm"]
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldOpr2 = $Fld->AdvancedSearch->SearchOperator2; // @$_GET["w_$FldParm"]
		$sWrk = "";

		//$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);

		//$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$FldOpr = strtoupper(trim($FldOpr));
		if ($FldOpr == "") $FldOpr = "=";
		$FldOpr2 = strtoupper(trim($FldOpr2));
		if ($FldOpr2 == "") $FldOpr2 = "=";
		if (EW_SEARCH_MULTI_VALUE_OPTION == 1 || $FldOpr <> "LIKE" ||
			($FldOpr2 <> "LIKE" && $FldVal2 <> ""))
			$MultiValue = FALSE;
		if ($MultiValue) {
			$sWrk1 = ($FldVal <> "") ? ew_GetMultiSearchSql($Fld, $FldVal) : ""; // Field value 1
			$sWrk2 = ($FldVal2 <> "") ? ew_GetMultiSearchSql($Fld, $FldVal2) : ""; // Field value 2
			$sWrk = $sWrk1; // Build final SQL
			if ($sWrk2 <> "")
				$sWrk = ($sWrk <> "") ? "($sWrk) $FldCond ($sWrk2)" : $sWrk2;
		} else {
			$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			$sWrk = ew_GetSearchSql($Fld, $FldVal, $FldOpr, $FldCond, $FldVal2, $FldOpr2);
		}
		if ($sWrk <> "") {
			if ($Where <> "") $Where .= " AND ";
			$Where .= "(" . $sWrk . ")";
		}
	}

	// Set search parameters
	function SetSearchParm(&$Fld) {
		global $t_tinbai_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_tinbai_mainsite->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_tinbai_mainsite->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_tinbai_mainsite->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_tinbai_mainsite->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_tinbai_mainsite->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_tinbai_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_tinbai_mainsite->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_tinbai_mainsite->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_tinbai_mainsite->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_tinbai_mainsite->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_tinbai_mainsite->GetAdvancedSearch("w_$FldParm");
	}

	// Convert search value
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_BOOLEAN) {
			if ($FldVal <> "") $Value = ($FldVal == "1") ? $Fld->TrueValue : $Fld->FalseValue;
		} elseif ($Fld->FldDataType == EW_DATATYPE_DATE) {
			if ($FldVal <> "") $Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		}
		return $Value;
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_tinbai_mainsite;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_tinbai_mainsite->C_TITLE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_tinbai_mainsite->C_SUMARY, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_tinbai_mainsite->C_CONTENTS, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_tinbai_mainsite->C_NOTE, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		$sFldExpression = ($Fld->FldVirtualExpression <> "") ? $Fld->FldVirtualExpression : $Fld->FldExpression;
		$lFldDataType = ($Fld->FldIsVirtual) ? EW_DATATYPE_STRING : $Fld->FldDataType;
		if ($lFldDataType == EW_DATATYPE_NUMBER) {
			$sWrk = $sFldExpression . " = " . ew_QuotedValue($Keyword, $lFldDataType);
		} else {
			$sWrk = $sFldExpression . " LIKE " . ew_QuotedValue("%" . $Keyword . "%", $lFldDataType);
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_tinbai_mainsite;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_tinbai_mainsite->BasicSearchKeyword;
		$sSearchType = $t_tinbai_mainsite->BasicSearchType;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$t_tinbai_mainsite->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_tinbai_mainsite->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_tinbai_mainsite;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_tinbai_mainsite->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_tinbai_mainsite;
		$t_tinbai_mainsite->setSessionBasicSearchKeyword("");
		$t_tinbai_mainsite->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_tinbai_mainsite;
		$t_tinbai_mainsite->setAdvancedSearch("x_PK_TINBAI_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_CONGTY_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DMGIOITHIEU_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DMTUYENSINH_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DTSVTUONGLAI_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DTSVDANGHOC_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DTCUUSV_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_DTDOANHNGHIEP_ID", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_TITLE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_SUMARY", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_CONTENTS", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_HIT_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_NEW_MYSEFLT", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_COMMENT_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_ORDER_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_STATUS_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_VISITOR_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_ACTIVE_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_TIME_ACTIVE_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_NGUOIDUNGID_MAINSITE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_NOTE", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_USER_ADD", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_C_EDIT_TIME", "");
		$t_tinbai_mainsite->setAdvancedSearch("x_FK_EDITOR_ID", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_tinbai_mainsite;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_TINBAI_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DMGIOITHIEU_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DMTUYENSINH_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DTSVTUONGLAI_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DTSVDANGHOC_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DTCUUSV_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DTDOANHNGHIEP_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TITLE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_SUMARY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CONTENTS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_HIT_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NEW_MYSEFLT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_COMMENT_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ORDER_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_STATUS_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_VISITOR_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ACTIVE_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_NGUOIDUNGID_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NOTE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_EDITOR_ID"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_tinbai_mainsite->BasicSearchKeyword = $t_tinbai_mainsite->getSessionBasicSearchKeyword();
			$t_tinbai_mainsite->BasicSearchType = $t_tinbai_mainsite->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_tinbai_mainsite->PK_TINBAI_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_CONGTY_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DMGIOITHIEU_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DMTUYENSINH_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DTSVDANGHOC_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DTCUUSV_ID);
			$this->GetSearchParm($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID);
			$this->GetSearchParm($t_tinbai_mainsite->C_TITLE);
			$this->GetSearchParm($t_tinbai_mainsite->C_SUMARY);
			$this->GetSearchParm($t_tinbai_mainsite->C_CONTENTS);
			$this->GetSearchParm($t_tinbai_mainsite->C_HIT_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_NEW_MYSEFLT);
			$this->GetSearchParm($t_tinbai_mainsite->C_COMMENT_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_ORDER_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_STATUS_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_VISITOR_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_ACTIVE_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE);
			$this->GetSearchParm($t_tinbai_mainsite->C_NOTE);
			$this->GetSearchParm($t_tinbai_mainsite->C_USER_ADD);
			$this->GetSearchParm($t_tinbai_mainsite->C_ADD_TIME);
			$this->GetSearchParm($t_tinbai_mainsite->C_USER_EDIT);
			$this->GetSearchParm($t_tinbai_mainsite->C_EDIT_TIME);
			$this->GetSearchParm($t_tinbai_mainsite->FK_EDITOR_ID);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_tinbai_mainsite;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_tinbai_mainsite->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_tinbai_mainsite->CurrentOrderType = @$_GET["ordertype"];
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_CONGTY_ID, $bCtrl); // FK_CONGTY_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DMGIOITHIEU_ID, $bCtrl); // FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DMTUYENSINH_ID, $bCtrl); // FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID, $bCtrl); // FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DTSVDANGHOC_ID, $bCtrl); // FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DTCUUSV_ID, $bCtrl); // FK_DTCUUSV_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID, $bCtrl); // FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_TITLE, $bCtrl); // C_TITLE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_HIT_MAINSITE, $bCtrl); // C_HIT_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_NEW_MYSEFLT, $bCtrl); // C_NEW_MYSEFLT
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_COMMENT_MAINSITE, $bCtrl); // C_COMMENT_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_ORDER_MAINSITE, $bCtrl); // C_ORDER_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_STATUS_MAINSITE, $bCtrl); // C_STATUS_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_VISITOR_MAINSITE, $bCtrl); // C_VISITOR_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_ACTIVE_MAINSITE, $bCtrl); // C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE, $bCtrl); // C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE, $bCtrl); // FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_NOTE, $bCtrl); // C_NOTE
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_USER_ADD, $bCtrl); // C_USER_ADD
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_ADD_TIME, $bCtrl); // C_ADD_TIME
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_USER_EDIT, $bCtrl); // C_USER_EDIT
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->C_EDIT_TIME, $bCtrl); // C_EDIT_TIME
			$t_tinbai_mainsite->UpdateSort($t_tinbai_mainsite->FK_EDITOR_ID, $bCtrl); // FK_EDITOR_ID
			$t_tinbai_mainsite->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_tinbai_mainsite;
		$sOrderBy = $t_tinbai_mainsite->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_tinbai_mainsite->SqlOrderBy() <> "") {
				$sOrderBy = $t_tinbai_mainsite->SqlOrderBy();
				$t_tinbai_mainsite->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_tinbai_mainsite;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_tinbai_mainsite->setSessionOrderBy($sOrderBy);
				$t_tinbai_mainsite->FK_CONGTY_ID->setSort("");
				$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setSort("");
				$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setSort("");
				$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setSort("");
				$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setSort("");
				$t_tinbai_mainsite->FK_DTCUUSV_ID->setSort("");
				$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setSort("");
				$t_tinbai_mainsite->C_TITLE->setSort("");
				$t_tinbai_mainsite->C_HIT_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_NEW_MYSEFLT->setSort("");
				$t_tinbai_mainsite->C_COMMENT_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_ORDER_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_STATUS_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_VISITOR_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setSort("");
				$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setSort("");
				$t_tinbai_mainsite->C_NOTE->setSort("");
				$t_tinbai_mainsite->C_USER_ADD->setSort("");
				$t_tinbai_mainsite->C_ADD_TIME->setSort("");
				$t_tinbai_mainsite->C_USER_EDIT->setSort("");
				$t_tinbai_mainsite->C_EDIT_TIME->setSort("");
				$t_tinbai_mainsite->FK_EDITOR_ID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_tinbai_mainsite;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;width:15px";
		$item->Visible = $Security->CanView();
		$item->OnLeft = TRUE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;width:15px";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px";
		$item->Visible = ($Security->CanDelete() || $Security->CanEdit());
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_tinbai_mainsite_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_tinbai_mainsite->Export <> "" ||
			$t_tinbai_mainsite->CurrentAction == "gridadd" ||
			$t_tinbai_mainsite->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_tinbai_mainsite;
		$this->ListOptions->LoadDefault();

	        // "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($oListOpt->Visible)
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->ViewUrl . "\">" . "<img src=\"images/view.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("ViewLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("ViewLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"images/edit.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}
		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_tinbai_mainsite;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_tinbai_mainsite;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_tinbai_mainsite->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_tinbai_mainsite;
		$t_tinbai_mainsite->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_tinbai_mainsite->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_tinbai_mainsite;

		// Load search values
		// PK_TINBAI_ID

		$t_tinbai_mainsite->PK_TINBAI_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_TINBAI_ID"]);
		$t_tinbai_mainsite->PK_TINBAI_ID->AdvancedSearch->SearchOperator = @$_GET["z_PK_TINBAI_ID"];

		// FK_CONGTY_ID
		$t_tinbai_mainsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY_ID"]);
		$t_tinbai_mainsite->FK_CONGTY_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY_ID"];

		// FK_DMGIOITHIEU_ID
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DMGIOITHIEU_ID"]);
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DMGIOITHIEU_ID"];

		// FK_DMTUYENSINH_ID
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DMTUYENSINH_ID"]);
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DMTUYENSINH_ID"];

		// FK_DTSVTUONGLAI_ID
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DTSVTUONGLAI_ID"]);
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DTSVTUONGLAI_ID"];

		// FK_DTSVDANGHOC_ID
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DTSVDANGHOC_ID"]);
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DTSVDANGHOC_ID"];

		// FK_DTCUUSV_ID
		$t_tinbai_mainsite->FK_DTCUUSV_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DTCUUSV_ID"]);
		$t_tinbai_mainsite->FK_DTCUUSV_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DTCUUSV_ID"];

		// FK_DTDOANHNGHIEP_ID
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DTDOANHNGHIEP_ID"]);
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DTDOANHNGHIEP_ID"];

		// C_TITLE
		$t_tinbai_mainsite->C_TITLE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TITLE"]);
		$t_tinbai_mainsite->C_TITLE->AdvancedSearch->SearchOperator = @$_GET["z_C_TITLE"];

		// C_SUMARY
		$t_tinbai_mainsite->C_SUMARY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_SUMARY"]);
		$t_tinbai_mainsite->C_SUMARY->AdvancedSearch->SearchOperator = @$_GET["z_C_SUMARY"];

		// C_CONTENTS
		$t_tinbai_mainsite->C_CONTENTS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CONTENTS"]);
		$t_tinbai_mainsite->C_CONTENTS->AdvancedSearch->SearchOperator = @$_GET["z_C_CONTENTS"];

		// C_HIT_MAINSITE
		$t_tinbai_mainsite->C_HIT_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HIT_MAINSITE"]);
		$t_tinbai_mainsite->C_HIT_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_HIT_MAINSITE"];

		// C_NEW_MYSEFLT
		$t_tinbai_mainsite->C_NEW_MYSEFLT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NEW_MYSEFLT"]);
		$t_tinbai_mainsite->C_NEW_MYSEFLT->AdvancedSearch->SearchOperator = @$_GET["z_C_NEW_MYSEFLT"];

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_COMMENT_MAINSITE"]);
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_COMMENT_MAINSITE"];

		// C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ORDER_MAINSITE"]);
		$t_tinbai_mainsite->C_ORDER_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_ORDER_MAINSITE"];

		// C_STATUS_MAINSITE
		$t_tinbai_mainsite->C_STATUS_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_STATUS_MAINSITE"]);
		$t_tinbai_mainsite->C_STATUS_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_STATUS_MAINSITE"];

		// C_VISITOR_MAINSITE
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_VISITOR_MAINSITE"]);
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_VISITOR_MAINSITE"];

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE_MAINSITE"]);
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE_MAINSITE"];

		// C_TIME_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ACTIVE_MAINSITE"]);
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ACTIVE_MAINSITE"];

		// FK_NGUOIDUNGID_MAINSITE
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_NGUOIDUNGID_MAINSITE"]);
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_FK_NGUOIDUNGID_MAINSITE"];

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NOTE"]);
		$t_tinbai_mainsite->C_NOTE->AdvancedSearch->SearchOperator = @$_GET["z_C_NOTE"];

		// C_USER_ADD
		$t_tinbai_mainsite->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_tinbai_mainsite->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_tinbai_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_tinbai_mainsite->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_tinbai_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_tinbai_mainsite->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_tinbai_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_tinbai_mainsite->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];

		// FK_EDITOR_ID
		$t_tinbai_mainsite->FK_EDITOR_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_EDITOR_ID"]);
		$t_tinbai_mainsite->FK_EDITOR_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_EDITOR_ID"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_tinbai_mainsite;

		// Call Recordset Selecting event
		$t_tinbai_mainsite->Recordset_Selecting($t_tinbai_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_tinbai_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_tinbai_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_mainsite;
		$sFilter = $t_tinbai_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
		$t_tinbai_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_mainsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_mainsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_mainsite->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
		$t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue = $rs->fields('C_PIC_HIT');
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
		$t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue = $rs->fields('C_PIC_MYSEFLT');
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
		$t_tinbai_mainsite->C_STATUS_MAINSITE->setDbValue($rs->fields('C_STATUS_MAINSITE'));
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->setDbValue($rs->fields('C_VISITOR_MAINSITE'));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
		$t_tinbai_mainsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_tinbai_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_mainsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite;

		// Initialize URLs
		$this->ViewUrl = $t_tinbai_mainsite->ViewUrl();
		$this->EditUrl = $t_tinbai_mainsite->EditUrl();
		$this->InlineEditUrl = $t_tinbai_mainsite->InlineEditUrl();
		$this->CopyUrl = $t_tinbai_mainsite->CopyUrl();
		$this->InlineCopyUrl = $t_tinbai_mainsite->InlineCopyUrl();
		$this->DeleteUrl = $t_tinbai_mainsite->DeleteUrl();

		// Call Row_Rendering event
		$t_tinbai_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_tinbai_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->EditAttrs = array();

		// FK_DMGIOITHIEU_ID
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttrs = array();

		// FK_DMTUYENSINH_ID
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttrs = array();

		// FK_DTSVTUONGLAI_ID
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditAttrs = array();

		// FK_DTSVDANGHOC_ID
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditAttrs = array();

		// FK_DTCUUSV_ID
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->EditAttrs = array();

		// FK_DTDOANHNGHIEP_ID
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_mainsite->C_TITLE->CellCssStyle = ""; $t_tinbai_mainsite->C_TITLE->CellCssClass = "";
		$t_tinbai_mainsite->C_TITLE->CellAttrs = array(); $t_tinbai_mainsite->C_TITLE->ViewAttrs = array(); $t_tinbai_mainsite->C_TITLE->EditAttrs = array();

		// C_HIT_MAINSITE
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_HIT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttrs = array();

		// C_NEW_MYSEFLT
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttrs = array();

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttrs = array();

		// C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttrs = array();

		// C_STATUS_MAINSITE
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttrs = array();

		// C_VISITOR_MAINSITE
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditAttrs = array();

		// FK_NGUOIDUNGID_MAINSITE
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditAttrs = array();

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->CellCssStyle = ""; $t_tinbai_mainsite->C_NOTE->CellCssClass = "";
		$t_tinbai_mainsite->C_NOTE->CellAttrs = array(); $t_tinbai_mainsite->C_NOTE->ViewAttrs = array(); $t_tinbai_mainsite->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_mainsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_mainsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_mainsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->EditAttrs = array();
		if ($t_tinbai_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_ID
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewValue = $t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_mainsite->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_CONGTY_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->CssClass = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_DMGIOITHIEU_ID
			if (strval($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCGIOITHIEU` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmucgioithieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewCustomAttributes = "";

			// FK_DMTUYENSINH_ID
			if (strval($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCTUYENSINH` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuctuyensinh`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewCustomAttributes = "";

			// FK_DTSVTUONGLAI_ID
			if (strval($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVTUONGLAI_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svtuonglai`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewCustomAttributes = "";

			// FK_DTSVDANGHOC_ID
			if (strval($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVDANGHOC_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svdanghoc`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewCustomAttributes = "";

			// FK_DTCUUSV_ID
			if (strval($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTCUUSV_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_cuusv`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewCustomAttributes = "";

			// FK_DTDOANHNGHIEP_ID
			if (strval($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->ViewValue = $t_tinbai_mainsite->C_TITLE->CurrentValue;
			$t_tinbai_mainsite->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite->C_TITLE->CssClass = "";
			$t_tinbai_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_HIT_MAINSITE
			if (strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) <> "") {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "";
				$arwrk = explode(",", strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "0":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Không nổi bật";
							break;
						case "1":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin nổi bật trang chủ";
							break;
						case "2":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin nổi bật tuyển sinh";
							break;
						case "3":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin nổi bật sinh viên đang học";
							break;
						default:
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->ViewCustomAttributes = "";

			// C_NEW_MYSEFLT
			if (strval($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "Không là tin chúng tôi";
						break;
					case "1":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "<b>Tin chúng tôi </b>";
						break;
					default:
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = $t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssStyle = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssClass = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewCustomAttributes = "";

			// C_COMMENT_MAINSITE
			if (strval($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Không cho phép";
						break;
					case "1":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "<b>Cho phép comnet</b>";
						break;
					default:
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewCustomAttributes = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue, 11);
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewCustomAttributes = "";

			// C_STATUS_MAINSITE
			if (strval($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "Không duyệt <img src=\"images/alert-small.gif\">";
						break;
					case "1":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "Đã duyệt <img src=\"images/icon-xac-thuc.jpg\">";
						break;
					case "2":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "Chờ duyệt <img src=\"images/new.gif\">";
						break;
					default:
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = $t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewCustomAttributes = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewValue = $t_tinbai_mainsite->C_VISITOR_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "<span style=\"color:red\">Không xuất bản</span>";
						break;
					case "1":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "<b>Xuất bản</b>";
						break;
					default:
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue, 11);
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
			if (strval($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewCustomAttributes = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->ViewValue = $t_tinbai_mainsite->C_NOTE->CurrentValue;
			$t_tinbai_mainsite->C_NOTE->CssStyle = "";
			$t_tinbai_mainsite->C_NOTE->CssClass = "";
			$t_tinbai_mainsite->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
			if (strval($t_tinbai_mainsite->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_mainsite->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
                       
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
                         
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->C_USER_ADD->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->C_USER_ADD->ViewValue = $t_tinbai_mainsite->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_USER_ADD->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_USER_ADD->CssStyle = "";
			$t_tinbai_mainsite->C_USER_ADD->CssClass = "";
			$t_tinbai_mainsite->C_USER_ADD->ViewCustomAttributes = "";


			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = $t_tinbai_mainsite->C_ADD_TIME->CurrentValue;
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ADD_TIME->ViewValue, 11);
			$t_tinbai_mainsite->C_ADD_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_ADD_TIME->CssClass = "";
			$t_tinbai_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
                        
                        $t_tinbai_mainsite->C_USER_EDIT->ViewValue = $t_tinbai_levelsite->C_USER_EDIT->CurrentValue;
			if (strval($t_tinbai_mainsite->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_mainsite->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
                       
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
                         
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->C_USER_EDIT->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->C_USER_EDIT->ViewValue = $t_tinbai_mainsite->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_USER_ADD->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_USER_EDIT->CssStyle = "";
			$t_tinbai_mainsite->C_USER_EDIT->CssClass = "";
			$t_tinbai_mainsite->C_USER_EDIT->ViewCustomAttributes = "";
                        
		

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = $t_tinbai_mainsite->C_EDIT_TIME->CurrentValue;
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->ViewValue, 11);
			$t_tinbai_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_EDIT_TIME->CssClass = "";
			$t_tinbai_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = $t_tinbai_mainsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = ew_FormatNumber($t_tinbai_mainsite->FK_EDITOR_ID->ViewValue, 0, -2, -2, -2);
			$t_tinbai_mainsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->TooltipValue = "";

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->TooltipValue = "";

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->TooltipValue = "";

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->TooltipValue = "";

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->TooltipValue = "";

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->TooltipValue = "";

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->HrefValue = "";
			$t_tinbai_mainsite->C_TITLE->TooltipValue = "";

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->TooltipValue = "";

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->HrefValue = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->TooltipValue = "";

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->TooltipValue = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->TooltipValue = "";

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->TooltipValue = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->TooltipValue = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->TooltipValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";
			$t_tinbai_mainsite->C_NOTE->TooltipValue = "";

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_mainsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_EDIT_TIME->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->TooltipValue = "";
		} elseif ($t_tinbai_mainsite->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_CONGTY_ID->EditValue = $arwrk;

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DANHMUCGIOITHIEU`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmucgioithieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue = $arwrk;

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DANHMUCTUYENSINH`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmuctuyensinh`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue = $arwrk;

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `DTSVTUONGLAI_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_doituong_svtuonglai`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue = $arwrk;

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `DTSVDANGHOC_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_doituong_svdanghoc`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue = $arwrk;

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `DTCUUSV_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_doituong_cuusv`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue = $arwrk;

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `DTDOANHNGHIEP_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue = $arwrk;

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_TITLE->AdvancedSearch->SearchValue);

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			
			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là tin nổi bật");
			$arwrk[] = array("1", "Tin nổi bật trang chủ");
			$arwrk[] = array("2", "Tin nổi bật trang tuyển sinh");
			$arwrk[] = array("3", "Tin nổi bật sinh viên đang học");
			$t_tinbai_mainsite->C_HIT_MAINSITE->EditValue = $arwrk;

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không ");
			$arwrk[] = array("1", "Tin chúng tôi");
			$t_tinbai_mainsite->C_NEW_MYSEFLT->EditValue = $arwrk;

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không cho phép");
			$arwrk[] = array("1", "Cho phép commnet facebook");
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditValue = $arwrk;

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->AdvancedSearch->SearchValue, 11), 11));

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không duyệt");
			$arwrk[] = array("1", "Đã duyệt");
                        $arwrk[] = array("2", "Chờ xét");
			$arwrk[] = array("", "");
			$t_tinbai_mainsite->C_STATUS_MAINSITE->EditValue = $arwrk;

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_VISITOR_MAINSITE->AdvancedSearch->SearchValue);

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong active len mainsite");
			$arwrk[] = array("1", "Active lenmainsite");
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditValue = $arwrk;

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->AdvancedSearch->SearchValue, 11), 11));

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->AdvancedSearch->SearchValue);

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_NOTE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_NOTE->AdvancedSearch->SearchValue);

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_USER_ADD->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_USER_ADD->AdvancedSearch->SearchValue);

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_ADD_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue, 11), 11));

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_USER_EDIT->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue);

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_EDIT_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue, 11), 11));

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->EditCustomAttributes = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->EditValue = ew_HtmlEncode($t_tinbai_mainsite->FK_EDITOR_ID->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		if ($t_tinbai_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_mainsite->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_tinbai_mainsite;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_PK_TINBAI_ID");
		$t_tinbai_mainsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_CONGTY_ID");
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DMGIOITHIEU_ID");
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DMTUYENSINH_ID");
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DTSVTUONGLAI_ID");
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DTSVDANGHOC_ID");
		$t_tinbai_mainsite->FK_DTCUUSV_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DTCUUSV_ID");
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_DTDOANHNGHIEP_ID");
		$t_tinbai_mainsite->C_TITLE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_TITLE");
		$t_tinbai_mainsite->C_SUMARY->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_SUMARY");
		$t_tinbai_mainsite->C_CONTENTS->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_CONTENTS");
		$t_tinbai_mainsite->C_HIT_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_HIT_MAINSITE");
		$t_tinbai_mainsite->C_NEW_MYSEFLT->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_NEW_MYSEFLT");
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_COMMENT_MAINSITE");
		$t_tinbai_mainsite->C_ORDER_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_ORDER_MAINSITE");
		$t_tinbai_mainsite->C_STATUS_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_STATUS_MAINSITE");
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_VISITOR_MAINSITE");
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_ACTIVE_MAINSITE");
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_TIME_ACTIVE_MAINSITE");
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_NGUOIDUNGID_MAINSITE");
		$t_tinbai_mainsite->C_NOTE->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_NOTE");
		$t_tinbai_mainsite->C_USER_ADD->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_USER_ADD");
		$t_tinbai_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_ADD_TIME");
		$t_tinbai_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_USER_EDIT");
		$t_tinbai_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_C_EDIT_TIME");
		$t_tinbai_mainsite->FK_EDITOR_ID->AdvancedSearch->SearchValue = $t_tinbai_mainsite->getAdvancedSearch("x_FK_EDITOR_ID");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_tinbai_mainsite;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_tinbai_mainsite->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_tinbai_mainsite->ExportAll) {
			$this->lDisplayRecs = $this->lTotalRecs;
			$this->lStopRec = $this->lTotalRecs;
		} else { // Export one page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		}
		if ($bSelectLimit)
			$rs = $this->LoadRecordset($this->lStartRec-1, $this->lDisplayRecs);
		if (!$rs) {
			header("Content-Type:"); // Remove header
			header("Content-Disposition:");
			$this->ShowMessage();
			return;
		}
		if ($t_tinbai_mainsite->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_tinbai_mainsite, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_tinbai_mainsite->PK_TINBAI_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DMGIOITHIEU_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DMTUYENSINH_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTSVDANGHOC_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTCUUSV_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_TITLE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_HIT_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_NEW_MYSEFLT);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_COMMENT_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ORDER_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_STATUS_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_VISITOR_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_NOTE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_USER_ADD);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_EDITOR_ID);
				$ExportDoc->EndExportRow();
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			if (!$bSelectLimit && $this->lStartRec > 1)
				$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row
				$t_tinbai_mainsite->CssClass = "";
				$t_tinbai_mainsite->CssStyle = "";
				$t_tinbai_mainsite->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_tinbai_mainsite->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_TINBAI_ID', $t_tinbai_mainsite->PK_TINBAI_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_tinbai_mainsite->FK_CONGTY_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DMGIOITHIEU_ID', $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DMTUYENSINH_ID', $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTSVTUONGLAI_ID', $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTSVDANGHOC_ID', $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTCUUSV_ID', $t_tinbai_mainsite->FK_DTCUUSV_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTDOANHNGHIEP_ID', $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_tinbai_mainsite->C_TITLE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_HIT_MAINSITE', $t_tinbai_mainsite->C_HIT_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_NEW_MYSEFLT', $t_tinbai_mainsite->C_NEW_MYSEFLT->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_COMMENT_MAINSITE', $t_tinbai_mainsite->C_COMMENT_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_MAINSITE', $t_tinbai_mainsite->C_ORDER_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_MAINSITE', $t_tinbai_mainsite->C_STATUS_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_VISITOR_MAINSITE', $t_tinbai_mainsite->C_VISITOR_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_MAINSITE', $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE_MAINSITE', $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_NGUOIDUNGID_MAINSITE', $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_NOTE', $t_tinbai_mainsite->C_NOTE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_tinbai_mainsite->C_USER_ADD->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_tinbai_mainsite->C_ADD_TIME->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_tinbai_mainsite->C_USER_EDIT->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_tinbai_mainsite->C_EDIT_TIME->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_EDITOR_ID', $t_tinbai_mainsite->FK_EDITOR_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_tinbai_mainsite->PK_TINBAI_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DMGIOITHIEU_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DMTUYENSINH_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTSVDANGHOC_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTCUUSV_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_TITLE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_HIT_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_NEW_MYSEFLT);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_COMMENT_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ORDER_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_STATUS_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_VISITOR_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_NOTE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_USER_ADD);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ADD_TIME);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_USER_EDIT);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_EDIT_TIME);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_EDITOR_ID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_tinbai_mainsite->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_tinbai_mainsite->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_tinbai_mainsite->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_tinbai_mainsite->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_tinbai_mainsite->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_tinbai_mainsite;
		$sSender = @$_GET["sender"];
		$sRecipient = @$_GET["recipient"];
		$sCc = @$_GET["cc"];
		$sBcc = @$_GET["bcc"];
		$sContentType = @$_GET["contenttype"];

		// Subject
		$sSubject = ew_StripSlashes(@$_GET["subject"]);
		$sEmailSubject = $sSubject;

		// Message
		$sContent = ew_StripSlashes(@$_GET["message"]);
		$sEmailMessage = $sContent;

		// Check sender
		if ($sSender == "") {
			$this->setMessage($Language->Phrase("EnterSenderEmail"));
			return;
		}
		if (!ew_CheckEmail($sSender)) {
			$this->setMessage($Language->Phrase("EnterProperSenderEmail"));
			return;
		}

		// Check recipient
		if (!ew_CheckEmailList($sRecipient, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperRecipientEmail"));
			return;
		}

		// Check cc
		if (!ew_CheckEmailList($sCc, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperCcEmail"));
			return;
		}

		// Check bcc
		if (!ew_CheckEmailList($sBcc, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperBccEmail"));
			return;
		}

		// Check email sent count
		if (!isset($_SESSION[EW_EXPORT_EMAIL_COUNTER]))
			$_SESSION[EW_EXPORT_EMAIL_COUNTER] = 0;
		if (intval($_SESSION[EW_EXPORT_EMAIL_COUNTER]) > EW_MAX_EMAIL_SENT_COUNT) {
			$this->setMessage($Language->Phrase("ExceedMaxEmailExport"));
			return;
		}
		if ($sEmailMessage <> "") {
			$sEmailMessage = ew_RemoveXSS($sEmailMessage);
			$sEmailMessage .= ($sContentType == "url") ? "\r\n\r\n" : "<br><br>";
		}
		if ($sContentType == "url") {
			$sUrl = ew_ConvertFullUrl(ew_CurrentPage() . "?" . $this->ExportQueryString());
			$sEmailMessage .= $sUrl; // send URL only
		} else {
			$sEmailMessage .= $EmailContent; // send HTML
		}

		// Send email
		$Email = new cEmail();
		$Email->Sender = $sSender; // Sender
		$Email->Recipient = $sRecipient; // Recipient
		$Email->Cc = $sCc; // Cc
		$Email->Bcc = $sBcc; // Bcc
		$Email->Subject = $sEmailSubject; // Subject
		$Email->Content = $sEmailMessage; // Content
		$Email->Format = ($sContentType == "url") ? "text" : "html";
		$Email->Charset = EW_EMAIL_CHARSET;
		$EventArgs = array();
		$bEmailSent = FALSE;
		if ($t_tinbai_mainsite->Email_Sending($Email, $EventArgs))
			$bEmailSent = $Email->Send();

		// Check email sent status
		if ($bEmailSent) {

			// Update email sent count
			$_SESSION[EW_EXPORT_EMAIL_COUNTER]++;

			// Sent email success
			$this->setMessage($Language->Phrase("SendEmailSuccess"));
		} else {

			// Sent email failure
			$this->setMessage($Email->SendErrDescription);
		}
	}

	// Export QueryString
	function ExportQueryString() {
		global $t_tinbai_mainsite;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_tinbai_mainsite->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_tinbai_mainsite->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_tinbai_mainsite->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->PK_TINBAI_ID); // PK_TINBAI_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_CONGTY_ID); // FK_CONGTY_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DMGIOITHIEU_ID); // FK_DMGIOITHIEU_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DMTUYENSINH_ID); // FK_DMTUYENSINH_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID); // FK_DTSVTUONGLAI_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DTSVDANGHOC_ID); // FK_DTSVDANGHOC_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DTCUUSV_ID); // FK_DTCUUSV_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID); // FK_DTDOANHNGHIEP_ID
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_TITLE); // C_TITLE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_SUMARY); // C_SUMARY
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_CONTENTS); // C_CONTENTS
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_HIT_MAINSITE); // C_HIT_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_NEW_MYSEFLT); // C_NEW_MYSEFLT
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_COMMENT_MAINSITE); // C_COMMENT_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_ORDER_MAINSITE); // C_ORDER_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_STATUS_MAINSITE); // C_STATUS_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_VISITOR_MAINSITE); // C_VISITOR_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_ACTIVE_MAINSITE); // C_ACTIVE_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE); // C_TIME_ACTIVE_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE); // FK_NGUOIDUNGID_MAINSITE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_NOTE); // C_NOTE
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->C_EDIT_TIME); // C_EDIT_TIME
		$this->AddSearchQueryString($sQry, $t_tinbai_mainsite->FK_EDITOR_ID); // FK_EDITOR_ID

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_tinbai_mainsite->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_tinbai_mainsite->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_tinbai_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_tinbai_mainsite->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_tinbai_mainsite->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_tinbai_mainsite->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_tinbai_mainsite->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_tinbai_mainsite->GetAdvancedSearch("w_" . $FldParm);
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	function Message_Showing(&$msg) {

		// Example:
		//$msg = "your new message";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example: 
		//$this->ListOptions->Add("new");
		//$this->ListOptions->Items["new"]->OnLeft = TRUE; // Link on left
		//$this->ListOptions->MoveItem("new", 0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
