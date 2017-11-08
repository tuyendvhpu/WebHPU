<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lichcongtac_mainsiteinfo.php" ?>
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
$t_lichcongtac_mainsite_list = new ct_lichcongtac_mainsite_list();
$Page =& $t_lichcongtac_mainsite_list;

// Page init
$t_lichcongtac_mainsite_list->Page_Init();

// Page main
$t_lichcongtac_mainsite_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_lichcongtac_mainsite->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_lichcongtac_mainsite_list = new ew_Page("t_lichcongtac_mainsite_list");

// page properties
t_lichcongtac_mainsite_list.PageID = "list"; // page ID
t_lichcongtac_mainsite_list.FormID = "ft_lichcongtac_mainsitelist"; // form ID
var EW_PAGE_ID = t_lichcongtac_mainsite_list.PageID; // for backward compatibility

// extend page with validate function for search
t_lichcongtac_mainsite_list.ValidateSearch = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (this.ValidateRequired) {
		var infix = "";
		elm = fobj.elements["x" + infix + "_C_DATE_STAR"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_DATE_STAR->FldErrMsg()) ?>");

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
t_lichcongtac_mainsite_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lichcongtac_mainsite_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lichcongtac_mainsite_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lichcongtac_mainsite_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
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
<?php if ($t_lichcongtac_mainsite->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_lichcongtac_mainsite_list->lTotalRecs = $t_lichcongtac_mainsite->SelectRecordCount();
	} else {
		if ($rs = $t_lichcongtac_mainsite_list->LoadRecordset())
			$t_lichcongtac_mainsite_list->lTotalRecs = $rs->RecordCount();
	}
	$t_lichcongtac_mainsite_list->lStartRec = 1;
	if ($t_lichcongtac_mainsite_list->lDisplayRecs <= 0 || ($t_lichcongtac_mainsite->Export <> "" && $t_lichcongtac_mainsite->ExportAll)) // Display all records
		$t_lichcongtac_mainsite_list->lDisplayRecs = $t_lichcongtac_mainsite_list->lTotalRecs;
	if (!($t_lichcongtac_mainsite->Export <> "" && $t_lichcongtac_mainsite->ExportAll))
		$t_lichcongtac_mainsite_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_lichcongtac_mainsite_list->LoadRecordset($t_lichcongtac_mainsite_list->lStartRec-1, $t_lichcongtac_mainsite_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_lichcongtac_mainsite->TableCaption() ?>
<?php if ($t_lichcongtac_mainsite->Export == "" && $t_lichcongtac_mainsite->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_mainsite_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_lichcongtac_mainsite" id="emf_t_lichcongtac_mainsite" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_lichcongtac_mainsite',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_lichcongtac_mainsitelist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
    </span> <span> <a href="calendar_printter.php" target="_blank"> In ấn trình quản lý </a></span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_lichcongtac_mainsite->Export == "" && $t_lichcongtac_mainsite->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_lichcongtac_mainsite_list);" style="text-decoration: none;"><img id="t_lichcongtac_mainsite_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_lichcongtac_mainsite_list_SearchPanel">
<form name="ft_lichcongtac_mainsitelistsrch" id="ft_lichcongtac_mainsitelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_lichcongtac_mainsite_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_lichcongtac_mainsite">
<?php
if ($gsSearchError == "")
	$t_lichcongtac_mainsite_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_lichcongtac_mainsite->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_lichcongtac_mainsite_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_lichcongtac_mainsite->FK_CONGTY->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CONGTY" id="z_FK_CONGTY" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CONGTY" name="x_FK_CONGTY" title="<?php echo $t_lichcongtac_mainsite->FK_CONGTY->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->FK_CONGTY->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->FK_CONGTY->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->FK_CONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->FK_CONGTY->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker"><?php echo $t_lichcongtac_mainsite->FK_SB_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_SB_ID" id="z_FK_SB_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_SB_ID" name="x_FK_SB_ID" title="<?php echo $t_lichcongtac_mainsite->FK_SB_ID->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->FK_SB_ID->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->FK_SB_ID->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->FK_SB_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->FK_SB_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker"><?php echo $t_lichcongtac_mainsite->C_TITLE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_TITLE" id="z_C_TITLE" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_lichcongtac_mainsite->C_TITLE->FldTitle() ?>" size="120" maxlength="255" value="<?php echo $t_lichcongtac_mainsite->C_TITLE->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_TITLE->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
		<tr>
		<td><span class="phpmaker"><?php echo "Khoảng thời gian" ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_DATE_STAR" id="z_C_DATE_STAR" value="BETWEEN"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_DATE_STAR" id="x_C_DATE_STAR" title="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->FldTitle() ?>" value="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_STAR" name="cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATE_STAR", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_STAR" // button id
});
</script>
</span>
				<span class="ewSearchOpr" id="btw1_C_DATE_STAR" name="btw1_C_DATE_STAR">&nbsp;<?php echo $Language->Phrase("AND") ?>&nbsp;</span>
				<span class="phpmaker" style="float: left;" id="btw1_C_DATE_STAR" name="btw1_C_DATE_STAR">
<input type="text" name="y_C_DATE_STAR" id="y_C_DATE_STAR" title="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->FldTitle() ?>" value="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditValue2 ?>"<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_y_C_DATE_STAR" name="cal_y_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "y_C_DATE_STAR", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_y_C_DATE_STAR" // button id
});
</script>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_PUBLISH" id="z_C_PUBLISH" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac_mainsite->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac_mainsite->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_PUBLISH->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac_mainsite->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_lichcongtac_mainsite->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_lichcongtac_mainsite->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_lichcongtac_mainsite->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_lichcongtac_mainsite->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lichcongtac_mainsite_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_lichcongtac_mainsite->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_lichcongtac_mainsite->CurrentAction <> "gridadd" && $t_lichcongtac_mainsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lichcongtac_mainsite_list->Pager)) $t_lichcongtac_mainsite_list->Pager = new cNumericPager($t_lichcongtac_mainsite_list->lStartRec, $t_lichcongtac_mainsite_list->lDisplayRecs, $t_lichcongtac_mainsite_list->lTotalRecs, $t_lichcongtac_mainsite_list->lRecRange) ?>
<?php if ($t_lichcongtac_mainsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lichcongtac_mainsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lichcongtac_mainsite_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_lichcongtac_mainsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_lichcongtac_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lichcongtac_mainsitelist, '<?php echo $t_lichcongtac_mainsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lichcongtac_mainsitelist, '<?php echo $t_lichcongtac_mainsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_lichcongtac_mainsitelist" id="ft_lichcongtac_mainsitelist" class="ewForm" action="" method="post">
<div id="gmp_t_lichcongtac_mainsite" class="ewGridMiddlePanel">
<?php if ($t_lichcongtac_mainsite_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_lichcongtac_mainsite->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_lichcongtac_mainsite_list->RenderListOptions();

// Render list options (header, left)
$t_lichcongtac_mainsite_list->ListOptions->Render("header", "left");
?>
<?php if ($t_lichcongtac_mainsite->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->FK_CONGTY) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->FK_CONGTY->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->FK_CONGTY) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->FK_CONGTY->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->FK_CONGTY->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->FK_CONGTY->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_lichcongtac_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_TITLE) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_TITLE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_TITLE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_TITLE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_TITLE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lichcongtac_mainsite->C_DATE_STAR->Visible) { // C_DATE_STAR ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_DATE_STAR) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_DATE_STAR->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_DATE_STAR) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo "Thời gian" ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_DATE_STAR->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_DATE_STAR->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
				
		
<?php if ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->Visible) { // C_PARTICIPANTS_ID ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_PARTICIPANTS_ID) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_PARTICIPANTS_ID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lichcongtac_mainsite->C_WHERE->Visible) { // C_WHERE ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_WHERE) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_WHERE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_WHERE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->C_WHERE->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_WHERE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_WHERE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
				
<?php if ($t_lichcongtac_mainsite->C_OPTION->Visible) { // C_ACTIVE ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_OPTION) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_OPTION->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_OPTION) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->C_OPTION->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_OPTION->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_OPTION->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_lichcongtac_mainsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<?php if ($t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_PUBLISH) == "") { ?>
		<td><?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lichcongtac_mainsite->SortUrl($t_lichcongtac_mainsite->C_PUBLISH) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lichcongtac_mainsite->C_PUBLISH->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lichcongtac_mainsite->C_PUBLISH->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
				
<?php

// Render list options (header, right)
$t_lichcongtac_mainsite_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_lichcongtac_mainsite->ExportAll && $t_lichcongtac_mainsite->Export <> "") {
	$t_lichcongtac_mainsite_list->lStopRec = $t_lichcongtac_mainsite_list->lTotalRecs;
} else {
	$t_lichcongtac_mainsite_list->lStopRec = $t_lichcongtac_mainsite_list->lStartRec + $t_lichcongtac_mainsite_list->lDisplayRecs - 1; // Set the last record to display
}
$t_lichcongtac_mainsite_list->lRecCount = $t_lichcongtac_mainsite_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_lichcongtac_mainsite_list->lStartRec > 1)
		$rs->Move($t_lichcongtac_mainsite_list->lStartRec - 1);
}

// Initialize aggregate
$t_lichcongtac_mainsite->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_lichcongtac_mainsite_list->RenderRow();
$t_lichcongtac_mainsite_list->lRowCnt = 0;
while (($t_lichcongtac_mainsite->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_lichcongtac_mainsite_list->lRecCount < $t_lichcongtac_mainsite_list->lStopRec) {
	$t_lichcongtac_mainsite_list->lRecCount++;
	if (intval($t_lichcongtac_mainsite_list->lRecCount) >= intval($t_lichcongtac_mainsite_list->lStartRec)) {
		$t_lichcongtac_mainsite_list->lRowCnt++;

	// Init row class and style
	$t_lichcongtac_mainsite->CssClass = "";
	$t_lichcongtac_mainsite->CssStyle = "";
	$t_lichcongtac_mainsite->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_lichcongtac_mainsite->CurrentAction == "gridadd") {
		$t_lichcongtac_mainsite_list->LoadDefaultValues(); // Load default values
	} else {
		$t_lichcongtac_mainsite_list->LoadRowValues($rs); // Load row values
	}
	$t_lichcongtac_mainsite->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_lichcongtac_mainsite_list->RenderRow();

	// Render list options
	$t_lichcongtac_mainsite_list->RenderListOptions();
?>
	<tr<?php echo $t_lichcongtac_mainsite->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_lichcongtac_mainsite_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_lichcongtac_mainsite->FK_CONGTY->Visible) { // FK_CONGTY ?>
		<td<?php echo $t_lichcongtac_mainsite->FK_CONGTY->CellAttributes() ?>>
<div<?php echo $t_lichcongtac_mainsite->FK_CONGTY->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->FK_CONGTY->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite->C_TITLE->Visible) { // C_TITLE ?>
		<td<?php echo $t_lichcongtac_mainsite->C_TITLE->CellAttributes() ?>>
<div style="width:250px;" <?php echo $t_lichcongtac_mainsite->C_TITLE->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_TITLE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite->C_DATE_STAR->Visible) { // C_DATE_STAR ?>
		<td<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->CellAttributes() ?>>
<div style="width:150px;" <?php echo $t_lichcongtac_mainsite->C_DATE_STAR->ViewAttributes() ?>><b><?php echo $t_lichcongtac_mainsite->C_DATE_STAR->ListViewValue() ?></b></div>
<div<?php echo $t_lichcongtac_mainsite->C_HOUR_START->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_HOUR_START->ListViewValue() ?><?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->ListViewValue() ?><?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->ListViewValue() ?> - <?php echo $t_lichcongtac_mainsite->C_HOUR_END->ListViewValue() ?><?php echo $t_lichcongtac_mainsite->C_MINUTES_END->ListViewValue() ?><?php echo $t_lichcongtac_mainsite->C_STATUS_END->ListViewValue() ?></div>
<div<?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->ViewAttributes() ?>></div>   
        
                </td>
	<?php } ?>

	<?php if ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->Visible) { // C_PARTICIPANTS_ID ?>
		<td<?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellAttributes() ?>>
<div  style="width:250px;" <?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue;$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue =""; ?></div>
<div  style="width:250px;" <?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->ViewAttributes() ?>><?php echo nl2br ($t_lichcongtac_mainsite->C_ORGANIZATION->ListViewValue()) ?></div>
                </td>
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite->C_WHERE->Visible) { // C_WHERE ?>
		<td<?php echo $t_lichcongtac_mainsite->C_WHERE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac_mainsite->C_WHERE->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_WHERE->ListViewValue() ?></div>
</td>
	<?php } ?>


	<?php if ($t_lichcongtac_mainsite->C_OPTION->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_lichcongtac_mainsite->C_OPTION->CellAttributes() ?>>
<div<?php echo $t_lichcongtac_mainsite->C_OPTION->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_OPTION->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($t_lichcongtac_mainsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
		<td<?php echo $t_lichcongtac_mainsite->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac_mainsite->C_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_PUBLISH->ListViewValue() ?></div>
</td>
	<?php } ?>


<?php

// Render list options (body, right)
$t_lichcongtac_mainsite_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_lichcongtac_mainsite->CurrentAction <> "gridadd")
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
<?php if ($t_lichcongtac_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($t_lichcongtac_mainsite->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_lichcongtac_mainsite->CurrentAction <> "gridadd" && $t_lichcongtac_mainsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lichcongtac_mainsite_list->Pager)) $t_lichcongtac_mainsite_list->Pager = new cNumericPager($t_lichcongtac_mainsite_list->lStartRec, $t_lichcongtac_mainsite_list->lDisplayRecs, $t_lichcongtac_mainsite_list->lTotalRecs, $t_lichcongtac_mainsite_list->lRecRange) ?>
<?php if ($t_lichcongtac_mainsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lichcongtac_mainsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lichcongtac_mainsite_list->PageUrl() ?>start=<?php echo $t_lichcongtac_mainsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lichcongtac_mainsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_lichcongtac_mainsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lichcongtac_mainsite_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_lichcongtac_mainsite_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_lichcongtac_mainsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_lichcongtac_mainsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lichcongtac_mainsitelist, '<?php echo $t_lichcongtac_mainsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lichcongtac_mainsitelist, '<?php echo $t_lichcongtac_mainsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_lichcongtac_mainsite->Export == "" && $t_lichcongtac_mainsite->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_lichcongtac_mainsite_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lichcongtac_mainsite_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_lichcongtac_mainsite';

	// Page object name
	var $PageObjName = 't_lichcongtac_mainsite_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lichcongtac_mainsite;
		if ($t_lichcongtac_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_lichcongtac_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_lichcongtac_mainsite;
		if ($t_lichcongtac_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_lichcongtac_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lichcongtac_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lichcongtac_mainsite_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lichcongtac_mainsite)
		$GLOBALS["t_lichcongtac_mainsite"] = new ct_lichcongtac_mainsite();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_lichcongtac_mainsite"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_lichcongtac_mainsitedelete.php";
		$this->MultiUpdateUrl = "t_lichcongtac_mainsiteupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lichcongtac_mainsite', TRUE);

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
		global $t_lichcongtac_mainsite;

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
			$t_lichcongtac_mainsite->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_lichcongtac_mainsite->Export = $_POST["exporttype"];
		} else {
			$t_lichcongtac_mainsite->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_lichcongtac_mainsite->Export; // Get export parameter, used in header
		$gsExportFile = $t_lichcongtac_mainsite->TableVar; // Get export file, used in header
		if (in_array($t_lichcongtac_mainsite->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_lichcongtac_mainsite->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_lichcongtac_mainsite->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_lichcongtac_mainsite->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_lichcongtac_mainsite->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_lichcongtac_mainsite;

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

			$t_lichcongtac_mainsite->Recordset_SearchValidated();
                   

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
		if ($t_lichcongtac_mainsite->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_lichcongtac_mainsite->getRecordsPerPage(); // Restore from Session
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
		$t_lichcongtac_mainsite->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_lichcongtac_mainsite->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_lichcongtac_mainsite->getSearchWhere();
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
		$t_lichcongtac_mainsite->setSessionWhere($sFilter);
		$t_lichcongtac_mainsite->CurrentFilter = "";

		// Export data only
		if (in_array($t_lichcongtac_mainsite->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_lichcongtac_mainsite->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}



        
        
	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_lichcongtac_mainsite;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_CADENLAR_ID, FALSE); // C_CADENLAR_ID
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->FK_CONGTY, FALSE); // FK_CONGTY
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->FK_SB_ID, FALSE); // FK_SB_ID
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_TITLE, FALSE); // C_TITLE
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_DATE_STAR, FALSE); // C_DATE_STAR
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_HOUR_START, FALSE); // C_HOUR_START
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_MINUTES_STAR, FALSE); // C_MINUTES_STAR
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_STATUS_STAR, FALSE); // C_STATUS_STAR
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_DATE_END, FALSE); // C_DATE_END
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_HOUR_END, FALSE); // C_HOUR_END
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_MINUTES_END, FALSE); // C_MINUTES_END
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_STATUS_END, FALSE); // C_STATUS_END
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_CONTENT, FALSE); // C_CONTENT
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_ORGANIZATION, FALSE); // C_ORGANIZATION
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_PARTICIPANTS_ID, TRUE); // C_PARTICIPANTS_ID
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_WHERE, FALSE); // C_WHERE
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_PREPARED, FALSE); // C_PREPARED
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_OPTION, FALSE); // C_OPTION
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_ACTIVE, FALSE); // C_ACTIVE
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_DATETIME_ACTIVE, FALSE); // C_DATETIME_ACTIVE
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_PUBLISH, FALSE); // C_PUBLISH
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_DATETIME_PUBLISH, FALSE); // C_DATETIME_PUBLISH
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_FK_PUBLISH, FALSE); // C_FK_PUBLISH
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_lichcongtac_mainsite->C_EDIT_TIME, FALSE); // C_EDIT_TIME

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_lichcongtac_mainsite->C_CADENLAR_ID); // C_CADENLAR_ID
			$this->SetSearchParm($t_lichcongtac_mainsite->FK_CONGTY); // FK_CONGTY
			$this->SetSearchParm($t_lichcongtac_mainsite->FK_SB_ID); // FK_SB_ID
			$this->SetSearchParm($t_lichcongtac_mainsite->C_TITLE); // C_TITLE
			$this->SetSearchParm($t_lichcongtac_mainsite->C_DATE_STAR); // C_DATE_STAR
			$this->SetSearchParm($t_lichcongtac_mainsite->C_HOUR_START); // C_HOUR_START
			$this->SetSearchParm($t_lichcongtac_mainsite->C_MINUTES_STAR); // C_MINUTES_STAR
			$this->SetSearchParm($t_lichcongtac_mainsite->C_STATUS_STAR); // C_STATUS_STAR
			$this->SetSearchParm($t_lichcongtac_mainsite->C_DATE_END); // C_DATE_END
			$this->SetSearchParm($t_lichcongtac_mainsite->C_HOUR_END); // C_HOUR_END
			$this->SetSearchParm($t_lichcongtac_mainsite->C_MINUTES_END); // C_MINUTES_END
			$this->SetSearchParm($t_lichcongtac_mainsite->C_STATUS_END); // C_STATUS_END
			$this->SetSearchParm($t_lichcongtac_mainsite->C_CONTENT); // C_CONTENT
			$this->SetSearchParm($t_lichcongtac_mainsite->C_ORGANIZATION); // C_ORGANIZATION
			$this->SetSearchParm($t_lichcongtac_mainsite->C_PARTICIPANTS_ID); // C_PARTICIPANTS_ID
			$this->SetSearchParm($t_lichcongtac_mainsite->C_WHERE); // C_WHERE
			$this->SetSearchParm($t_lichcongtac_mainsite->C_PREPARED); // C_PREPARED
			$this->SetSearchParm($t_lichcongtac_mainsite->C_OPTION); // C_OPTION
			$this->SetSearchParm($t_lichcongtac_mainsite->C_ACTIVE); // C_ACTIVE
			$this->SetSearchParm($t_lichcongtac_mainsite->C_DATETIME_ACTIVE); // C_DATETIME_ACTIVE
			$this->SetSearchParm($t_lichcongtac_mainsite->C_PUBLISH); // C_PUBLISH
			$this->SetSearchParm($t_lichcongtac_mainsite->C_DATETIME_PUBLISH); // C_DATETIME_PUBLISH
			$this->SetSearchParm($t_lichcongtac_mainsite->C_FK_PUBLISH); // C_FK_PUBLISH
			$this->SetSearchParm($t_lichcongtac_mainsite->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_lichcongtac_mainsite->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_lichcongtac_mainsite->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_lichcongtac_mainsite->C_EDIT_TIME); // C_EDIT_TIME
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
		global $t_lichcongtac_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_lichcongtac_mainsite->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_lichcongtac_mainsite->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_lichcongtac_mainsite->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_lichcongtac_mainsite->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_lichcongtac_mainsite->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_lichcongtac_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_lichcongtac_mainsite->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_lichcongtac_mainsite->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_lichcongtac_mainsite->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_lichcongtac_mainsite->GetAdvancedSearch("w_$FldParm");
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
		global $t_lichcongtac_mainsite;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_TITLE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_CONTENT, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_ORGANIZATION, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_PARTICIPANTS_ID, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_WHERE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lichcongtac_mainsite->C_PREPARED, $Keyword);
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
		global $Security, $t_lichcongtac_mainsite;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_lichcongtac_mainsite->BasicSearchKeyword;
		$sSearchType = $t_lichcongtac_mainsite->BasicSearchType;
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
			$t_lichcongtac_mainsite->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_lichcongtac_mainsite->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_lichcongtac_mainsite;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_lichcongtac_mainsite->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->setSessionBasicSearchKeyword("");
		$t_lichcongtac_mainsite->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_CADENLAR_ID", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_FK_CONGTY", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_FK_SB_ID", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_TITLE", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_DATE_STAR", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("y_C_DATE_STAR", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_HOUR_START", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_MINUTES_STAR", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_STATUS_STAR", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_DATE_END", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_HOUR_END", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_MINUTES_END", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_STATUS_END", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_CONTENT", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_ORGANIZATION", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_PARTICIPANTS_ID", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_WHERE", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_PREPARED", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_OPTION", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_ACTIVE", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_DATETIME_ACTIVE", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_PUBLISH", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_DATETIME_PUBLISH", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_FK_PUBLISH", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_USER_ADD", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_lichcongtac_mainsite->setAdvancedSearch("x_C_EDIT_TIME", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_lichcongtac_mainsite;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CADENLAR_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_SB_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TITLE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATE_STAR"] <> "") $bRestore = FALSE;
		if (@$_GET["y_C_DATE_STAR"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_HOUR_START"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_MINUTES_STAR"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_STATUS_STAR"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATE_END"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_HOUR_END"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_MINUTES_END"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_STATUS_END"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CONTENT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ORGANIZATION"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PARTICIPANTS_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_WHERE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PREPARED"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_OPTION"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATETIME_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PUBLISH"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATETIME_PUBLISH"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_FK_PUBLISH"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_lichcongtac_mainsite->BasicSearchKeyword = $t_lichcongtac_mainsite->getSessionBasicSearchKeyword();
			$t_lichcongtac_mainsite->BasicSearchType = $t_lichcongtac_mainsite->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_lichcongtac_mainsite->C_CADENLAR_ID);
			$this->GetSearchParm($t_lichcongtac_mainsite->FK_CONGTY);
			$this->GetSearchParm($t_lichcongtac_mainsite->FK_SB_ID);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_TITLE);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_DATE_STAR);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_HOUR_START);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_MINUTES_STAR);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_STATUS_STAR);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_DATE_END);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_HOUR_END);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_MINUTES_END);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_STATUS_END);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_CONTENT);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_ORGANIZATION);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_PARTICIPANTS_ID);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_WHERE);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_PREPARED);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_OPTION);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_ACTIVE);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_DATETIME_ACTIVE);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_PUBLISH);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_DATETIME_PUBLISH);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_FK_PUBLISH);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_USER_ADD);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_ADD_TIME);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_USER_EDIT);
			$this->GetSearchParm($t_lichcongtac_mainsite->C_EDIT_TIME);
		}
	}
          
	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_lichcongtac_mainsite;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_lichcongtac_mainsite->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_lichcongtac_mainsite->CurrentOrderType = @$_GET["ordertype"];
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->FK_CONGTY, $bCtrl); // FK_CONGTY
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->FK_SB_ID, $bCtrl); // FK_SB_ID
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_TITLE, $bCtrl); // C_TITLE
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_DATE_STAR, $bCtrl); // C_DATE_STAR
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_HOUR_START, $bCtrl); // C_HOUR_START
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_MINUTES_STAR, $bCtrl); // C_MINUTES_STAR
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_STATUS_STAR, $bCtrl); // C_STATUS_STAR
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_DATE_END, $bCtrl); // C_DATE_END
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_HOUR_END, $bCtrl); // C_HOUR_END
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_MINUTES_END, $bCtrl); // C_MINUTES_END
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_STATUS_END, $bCtrl); // C_STATUS_END
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_ORGANIZATION, $bCtrl); // C_ORGANIZATION
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_PARTICIPANTS_ID, $bCtrl); // C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_WHERE, $bCtrl); // C_WHERE
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_PREPARED, $bCtrl); // C_PREPARED
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_OPTION, $bCtrl); // C_OPTION
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_FILE_ATTACH, $bCtrl); // C_FILE_ATTACH
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_DATETIME_ACTIVE, $bCtrl); // C_DATETIME_ACTIVE
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_PUBLISH, $bCtrl); // C_PUBLISH
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_DATETIME_PUBLISH, $bCtrl); // C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_FK_PUBLISH, $bCtrl); // C_FK_PUBLISH
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_USER_ADD, $bCtrl); // C_USER_ADD
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_ADD_TIME, $bCtrl); // C_ADD_TIME
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_USER_EDIT, $bCtrl); // C_USER_EDIT
			$t_lichcongtac_mainsite->UpdateSort($t_lichcongtac_mainsite->C_EDIT_TIME, $bCtrl); // C_EDIT_TIME
			$t_lichcongtac_mainsite->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_lichcongtac_mainsite;
		$sOrderBy = $t_lichcongtac_mainsite->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_lichcongtac_mainsite->SqlOrderBy() <> "") {
				$sOrderBy = $t_lichcongtac_mainsite->SqlOrderBy();
				$t_lichcongtac_mainsite->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_lichcongtac_mainsite;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_lichcongtac_mainsite->setSessionOrderBy($sOrderBy);
				$t_lichcongtac_mainsite->FK_CONGTY->setSort("");
				$t_lichcongtac_mainsite->FK_SB_ID->setSort("");
				$t_lichcongtac_mainsite->C_TITLE->setSort("");
				$t_lichcongtac_mainsite->C_DATE_STAR->setSort("");
				$t_lichcongtac_mainsite->C_HOUR_START->setSort("");
				$t_lichcongtac_mainsite->C_MINUTES_STAR->setSort("");
				$t_lichcongtac_mainsite->C_STATUS_STAR->setSort("");
				$t_lichcongtac_mainsite->C_DATE_END->setSort("");
				$t_lichcongtac_mainsite->C_HOUR_END->setSort("");
				$t_lichcongtac_mainsite->C_MINUTES_END->setSort("");
				$t_lichcongtac_mainsite->C_STATUS_END->setSort("");
				$t_lichcongtac_mainsite->C_ORGANIZATION->setSort("");
				$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->setSort("");
				$t_lichcongtac_mainsite->C_WHERE->setSort("");
				$t_lichcongtac_mainsite->C_PREPARED->setSort("");
				$t_lichcongtac_mainsite->C_OPTION->setSort("");
				$t_lichcongtac_mainsite->C_FILE_ATTACH->setSort("");
				$t_lichcongtac_mainsite->C_ACTIVE->setSort("");
				$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->setSort("");
				$t_lichcongtac_mainsite->C_PUBLISH->setSort("");
				$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->setSort("");
				$t_lichcongtac_mainsite->C_FK_PUBLISH->setSort("");
				$t_lichcongtac_mainsite->C_USER_ADD->setSort("");
				$t_lichcongtac_mainsite->C_ADD_TIME->setSort("");
				$t_lichcongtac_mainsite->C_USER_EDIT->setSort("");
				$t_lichcongtac_mainsite->C_EDIT_TIME->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_lichcongtac_mainsite;


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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_lichcongtac_mainsite_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_lichcongtac_mainsite->Export <> "" ||
			$t_lichcongtac_mainsite->CurrentAction == "gridadd" ||
			$t_lichcongtac_mainsite->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_lichcongtac_mainsite;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"images/edit.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_lichcongtac_mainsite->C_CADENLAR_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_lichcongtac_mainsite;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_lichcongtac_mainsite;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_lichcongtac_mainsite->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_lichcongtac_mainsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_lichcongtac_mainsite->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_lichcongtac_mainsite;

		// Load search values
		// C_CADENLAR_ID

		$t_lichcongtac_mainsite->C_CADENLAR_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CADENLAR_ID"]);
		$t_lichcongtac_mainsite->C_CADENLAR_ID->AdvancedSearch->SearchOperator = @$_GET["z_C_CADENLAR_ID"];

		// FK_CONGTY
		$t_lichcongtac_mainsite->FK_CONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY"]);
		$t_lichcongtac_mainsite->FK_CONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY"];

		// FK_SB_ID
		$t_lichcongtac_mainsite->FK_SB_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_SB_ID"]);
		$t_lichcongtac_mainsite->FK_SB_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_SB_ID"];

		// C_TITLE
		$t_lichcongtac_mainsite->C_TITLE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TITLE"]);
		$t_lichcongtac_mainsite->C_TITLE->AdvancedSearch->SearchOperator = @$_GET["z_C_TITLE"];

		// C_DATE_STAR
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATE_STAR"]);
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchOperator = @$_GET["z_C_DATE_STAR"];
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchCondition = @$_GET["v_C_DATE_STAR"];
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue2 = ew_StripSlashes(@$_GET["y_C_DATE_STAR"]);
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchOperator2 = @$_GET["w_C_DATE_STAR"];

		// C_HOUR_START
		$t_lichcongtac_mainsite->C_HOUR_START->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HOUR_START"]);
		$t_lichcongtac_mainsite->C_HOUR_START->AdvancedSearch->SearchOperator = @$_GET["z_C_HOUR_START"];

		// C_MINUTES_STAR
		$t_lichcongtac_mainsite->C_MINUTES_STAR->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_MINUTES_STAR"]);
		$t_lichcongtac_mainsite->C_MINUTES_STAR->AdvancedSearch->SearchOperator = @$_GET["z_C_MINUTES_STAR"];

		// C_STATUS_STAR
		$t_lichcongtac_mainsite->C_STATUS_STAR->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_STATUS_STAR"]);
		$t_lichcongtac_mainsite->C_STATUS_STAR->AdvancedSearch->SearchOperator = @$_GET["z_C_STATUS_STAR"];

		// C_DATE_END
		$t_lichcongtac_mainsite->C_DATE_END->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATE_END"]);
		$t_lichcongtac_mainsite->C_DATE_END->AdvancedSearch->SearchOperator = @$_GET["z_C_DATE_END"];

		// C_HOUR_END
		$t_lichcongtac_mainsite->C_HOUR_END->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HOUR_END"]);
		$t_lichcongtac_mainsite->C_HOUR_END->AdvancedSearch->SearchOperator = @$_GET["z_C_HOUR_END"];

		// C_MINUTES_END
		$t_lichcongtac_mainsite->C_MINUTES_END->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_MINUTES_END"]);
		$t_lichcongtac_mainsite->C_MINUTES_END->AdvancedSearch->SearchOperator = @$_GET["z_C_MINUTES_END"];

		// C_STATUS_END
		$t_lichcongtac_mainsite->C_STATUS_END->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_STATUS_END"]);
		$t_lichcongtac_mainsite->C_STATUS_END->AdvancedSearch->SearchOperator = @$_GET["z_C_STATUS_END"];

		// C_CONTENT
		$t_lichcongtac_mainsite->C_CONTENT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CONTENT"]);
		$t_lichcongtac_mainsite->C_CONTENT->AdvancedSearch->SearchOperator = @$_GET["z_C_CONTENT"];

		// C_ORGANIZATION
		$t_lichcongtac_mainsite->C_ORGANIZATION->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ORGANIZATION"]);
		$t_lichcongtac_mainsite->C_ORGANIZATION->AdvancedSearch->SearchOperator = @$_GET["z_C_ORGANIZATION"];

		// C_PARTICIPANTS_ID
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PARTICIPANTS_ID"]);
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->AdvancedSearch->SearchOperator = @$_GET["z_C_PARTICIPANTS_ID"];

		// C_WHERE
		$t_lichcongtac_mainsite->C_WHERE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_WHERE"]);
		$t_lichcongtac_mainsite->C_WHERE->AdvancedSearch->SearchOperator = @$_GET["z_C_WHERE"];

		// C_PREPARED
		$t_lichcongtac_mainsite->C_PREPARED->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PREPARED"]);
		$t_lichcongtac_mainsite->C_PREPARED->AdvancedSearch->SearchOperator = @$_GET["z_C_PREPARED"];

		// C_OPTION
		$t_lichcongtac_mainsite->C_OPTION->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_OPTION"]);
		$t_lichcongtac_mainsite->C_OPTION->AdvancedSearch->SearchOperator = @$_GET["z_C_OPTION"];

		// C_ACTIVE
		$t_lichcongtac_mainsite->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE"]);
		$t_lichcongtac_mainsite->C_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE"];

		// C_DATETIME_ACTIVE
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATETIME_ACTIVE"]);
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_DATETIME_ACTIVE"];

		// C_PUBLISH
		$t_lichcongtac_mainsite->C_PUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PUBLISH"]);
		$t_lichcongtac_mainsite->C_PUBLISH->AdvancedSearch->SearchOperator = @$_GET["z_C_PUBLISH"];

		// C_DATETIME_PUBLISH
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATETIME_PUBLISH"]);
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->AdvancedSearch->SearchOperator = @$_GET["z_C_DATETIME_PUBLISH"];

		// C_FK_PUBLISH
		$t_lichcongtac_mainsite->C_FK_PUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FK_PUBLISH"]);
		$t_lichcongtac_mainsite->C_FK_PUBLISH->AdvancedSearch->SearchOperator = @$_GET["z_C_FK_PUBLISH"];

		// C_USER_ADD
		$t_lichcongtac_mainsite->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_lichcongtac_mainsite->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_lichcongtac_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_lichcongtac_mainsite->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_lichcongtac_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_lichcongtac_mainsite->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_lichcongtac_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_lichcongtac_mainsite->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lichcongtac_mainsite;

		// Call Recordset Selecting event
		$t_lichcongtac_mainsite->Recordset_Selecting($t_lichcongtac_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lichcongtac_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lichcongtac_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lichcongtac_mainsite;
		$sFilter = $t_lichcongtac_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_lichcongtac_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lichcongtac_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lichcongtac_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->C_CADENLAR_ID->setDbValue($rs->fields('C_CADENLAR_ID'));
		$t_lichcongtac_mainsite->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_lichcongtac_mainsite->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
		$t_lichcongtac_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_lichcongtac_mainsite->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
		$t_lichcongtac_mainsite->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
		$t_lichcongtac_mainsite->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
		$t_lichcongtac_mainsite->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
		$t_lichcongtac_mainsite->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
		$t_lichcongtac_mainsite->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
		$t_lichcongtac_mainsite->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
		$t_lichcongtac_mainsite->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
		$t_lichcongtac_mainsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_lichcongtac_mainsite->C_ORGANIZATION->setDbValue($rs->fields('C_ORGANIZATION'));
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
		$t_lichcongtac_mainsite->C_WHERE->setDbValue($rs->fields('C_WHERE'));
		$t_lichcongtac_mainsite->C_PREPARED->setDbValue($rs->fields('C_PREPARED'));
		$t_lichcongtac_mainsite->C_OPTION->setDbValue($rs->fields('C_OPTION'));
		$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH');
		$t_lichcongtac_mainsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
		$t_lichcongtac_mainsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
		$t_lichcongtac_mainsite->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
		$t_lichcongtac_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lichcongtac_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lichcongtac_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lichcongtac_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}



        
	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lichcongtac_mainsite;

		// Initialize URLs
		$this->ViewUrl = $t_lichcongtac_mainsite->ViewUrl();
		$this->EditUrl = $t_lichcongtac_mainsite->EditUrl();
		$this->InlineEditUrl = $t_lichcongtac_mainsite->InlineEditUrl();
		$this->CopyUrl = $t_lichcongtac_mainsite->CopyUrl();
		$this->InlineCopyUrl = $t_lichcongtac_mainsite->InlineCopyUrl();
		$this->DeleteUrl = $t_lichcongtac_mainsite->DeleteUrl();

		// Call Row_Rendering event
		$t_lichcongtac_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_lichcongtac_mainsite->FK_CONGTY->CellCssStyle = ""; $t_lichcongtac_mainsite->FK_CONGTY->CellCssClass = "";
		$t_lichcongtac_mainsite->FK_CONGTY->CellAttrs = array(); $t_lichcongtac_mainsite->FK_CONGTY->ViewAttrs = array(); $t_lichcongtac_mainsite->FK_CONGTY->EditAttrs = array();

		// FK_SB_ID
		$t_lichcongtac_mainsite->FK_SB_ID->CellCssStyle = ""; $t_lichcongtac_mainsite->FK_SB_ID->CellCssClass = "";
		$t_lichcongtac_mainsite->FK_SB_ID->CellAttrs = array(); $t_lichcongtac_mainsite->FK_SB_ID->ViewAttrs = array(); $t_lichcongtac_mainsite->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$t_lichcongtac_mainsite->C_TITLE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_TITLE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_TITLE->CellAttrs = array(); $t_lichcongtac_mainsite->C_TITLE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$t_lichcongtac_mainsite->C_DATE_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATE_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATE_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATE_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$t_lichcongtac_mainsite->C_HOUR_START->CellCssStyle = ""; $t_lichcongtac_mainsite->C_HOUR_START->CellCssClass = "";
		$t_lichcongtac_mainsite->C_HOUR_START->CellAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_START->ViewAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$t_lichcongtac_mainsite->C_MINUTES_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_MINUTES_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_MINUTES_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$t_lichcongtac_mainsite->C_STATUS_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_STATUS_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_STATUS_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$t_lichcongtac_mainsite->C_DATE_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATE_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATE_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATE_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$t_lichcongtac_mainsite->C_HOUR_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_HOUR_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_HOUR_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$t_lichcongtac_mainsite->C_MINUTES_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_MINUTES_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_MINUTES_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$t_lichcongtac_mainsite->C_STATUS_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_STATUS_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_STATUS_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_END->EditAttrs = array();

		// C_ORGANIZATION
		$t_lichcongtac_mainsite->C_ORGANIZATION->CellCssStyle = ""; $t_lichcongtac_mainsite->C_ORGANIZATION->CellCssClass = "";
		$t_lichcongtac_mainsite->C_ORGANIZATION->CellAttrs = array(); $t_lichcongtac_mainsite->C_ORGANIZATION->ViewAttrs = array(); $t_lichcongtac_mainsite->C_ORGANIZATION->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellAttrs = array(); $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_WHERE
		$t_lichcongtac_mainsite->C_WHERE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_WHERE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_WHERE->CellAttrs = array(); $t_lichcongtac_mainsite->C_WHERE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_WHERE->EditAttrs = array();

		// C_PREPARED
		$t_lichcongtac_mainsite->C_PREPARED->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PREPARED->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PREPARED->CellAttrs = array(); $t_lichcongtac_mainsite->C_PREPARED->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PREPARED->EditAttrs = array();

		// C_OPTION
		$t_lichcongtac_mainsite->C_OPTION->CellCssStyle = ""; $t_lichcongtac_mainsite->C_OPTION->CellCssClass = "";
		$t_lichcongtac_mainsite->C_OPTION->CellAttrs = array(); $t_lichcongtac_mainsite->C_OPTION->ViewAttrs = array(); $t_lichcongtac_mainsite->C_OPTION->EditAttrs = array();

		// C_FILE_ATTACH
		$t_lichcongtac_mainsite->C_FILE_ATTACH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_FILE_ATTACH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_FILE_ATTACH->CellAttrs = array(); $t_lichcongtac_mainsite->C_FILE_ATTACH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_FILE_ATTACH->EditAttrs = array();

		// C_ACTIVE
		$t_lichcongtac_mainsite->C_ACTIVE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_ACTIVE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_ACTIVE->CellAttrs = array(); $t_lichcongtac_mainsite->C_ACTIVE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_ACTIVE->EditAttrs = array();

		// C_DATETIME_ACTIVE
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$t_lichcongtac_mainsite->C_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$t_lichcongtac_mainsite->C_FK_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_FK_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_FK_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_FK_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_FK_PUBLISH->EditAttrs = array();

		// C_USER_ADD
		$t_lichcongtac_mainsite->C_USER_ADD->CellCssStyle = ""; $t_lichcongtac_mainsite->C_USER_ADD->CellCssClass = "";
		$t_lichcongtac_mainsite->C_USER_ADD->CellAttrs = array(); $t_lichcongtac_mainsite->C_USER_ADD->ViewAttrs = array(); $t_lichcongtac_mainsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_lichcongtac_mainsite->C_ADD_TIME->CellCssStyle = ""; $t_lichcongtac_mainsite->C_ADD_TIME->CellCssClass = "";
		$t_lichcongtac_mainsite->C_ADD_TIME->CellAttrs = array(); $t_lichcongtac_mainsite->C_ADD_TIME->ViewAttrs = array(); $t_lichcongtac_mainsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_lichcongtac_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_lichcongtac_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_lichcongtac_mainsite->C_USER_EDIT->CellAttrs = array(); $t_lichcongtac_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_lichcongtac_mainsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_lichcongtac_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_lichcongtac_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_lichcongtac_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_lichcongtac_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_lichcongtac_mainsite->C_EDIT_TIME->EditAttrs = array();
		if ($t_lichcongtac_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_CONGTY
			if (strval($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = $t_lichcongtac_mainsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_CONGTY->CssStyle = "";
			$t_lichcongtac_mainsite->FK_CONGTY->CssClass = "";
			$t_lichcongtac_mainsite->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			if (strval($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = $t_lichcongtac_mainsite->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_SB_ID->CssStyle = "";
			$t_lichcongtac_mainsite->FK_SB_ID->CssClass = "";
			$t_lichcongtac_mainsite->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->ViewValue = $t_lichcongtac_mainsite->C_TITLE->CurrentValue;
			$t_lichcongtac_mainsite->C_TITLE->CssStyle = "";
			$t_lichcongtac_mainsite->C_TITLE->CssClass = "";
			$t_lichcongtac_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_DATE_STAR
			$timezone  = 7; //(GMT +7:00)
		        //Hiển thị ngày tháng tiếng Việt
                        $str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
                        $str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
                        $timestamp = strtotime($t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue);
                       // $timenow = gmdate("D, d/m/Y", $timestamp + 3600*($timezone)+ 86400);
                        $timenow = gmdate("D, d/m/Y", $timestamp + 3600*($timezone));
                        $timenow = str_replace( $str_search, $str_replace, $timenow);
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewValue = $t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue;
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewValue =$timenow;
			$t_lichcongtac_mainsite->C_DATE_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewCustomAttributes = "";

			// C_HOUR_START
			if (strval($t_lichcongtac_mainsite->C_HOUR_START->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_HOUR_START->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = "1";
						break;
					default:
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = $t_lichcongtac_mainsite->C_HOUR_START->CurrentValue."h";
				}
			} else {
				$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_HOUR_START->CssStyle = "";
			$t_lichcongtac_mainsite->C_HOUR_START->CssClass = "";
			$t_lichcongtac_mainsite->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
			if (strval($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = "00";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = "1";
						break;
					default:
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = $t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
			if (strval($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) {
						case "0":
						$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = "KXD";
                                                        break;
                                                case "1":
                                                        $t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = "";
                                                        break;
                                                default:
						$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = $t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->ViewCustomAttributes = "";

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->ViewValue = $t_lichcongtac_mainsite->C_DATE_END->CurrentValue;
			$t_lichcongtac_mainsite->C_DATE_END->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATE_END->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATE_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATE_END->CssClass = "";
			$t_lichcongtac_mainsite->C_DATE_END->ViewCustomAttributes = "";

			// C_HOUR_END
			if (strval($t_lichcongtac_mainsite->C_HOUR_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_HOUR_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = $t_lichcongtac_mainsite->C_HOUR_END->CurrentValue."h";
				}
			} else {
				$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_HOUR_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_HOUR_END->CssClass = "";
			$t_lichcongtac_mainsite->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
			if (strval($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = "00";
						break;
					default:
						$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = $t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->CssClass = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
			if (strval($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = "KXD";
						break;
                                        case "1":
						$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = "";
						break;
					default:
						$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = $t_lichcongtac_mainsite->C_STATUS_END->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_STATUS_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_STATUS_END->CssClass = "";
			$t_lichcongtac_mainsite->C_STATUS_END->ViewCustomAttributes = "";

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->ViewValue = $t_lichcongtac_mainsite->C_ORGANIZATION->CurrentValue;
			$t_lichcongtac_mainsite->C_ORGANIZATION->CssStyle = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->CssClass = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->ViewCustomAttributes = "";

			// C_PARTICIPANTS_ID
			if (strval($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue) <> "") {
				$arwrk = explode(",", $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue);
                                $findme   = 'x_';
                                $array_company = array();
                                $array_user = array();
                                $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue ="";
                                FOR ($i=0;$i< count ($arwrk);$i++)   
                                {
                                         $pos = strpos($arwrk [$i], $findme);
                                        if ($pos === false) {
                                                   $array_company[$i] =  substr($arwrk [$i],0,-1);
                                                    } else {
                                                   $array_user[$i] =  substr(strstr($arwrk [$i],'x'),2);
                                                    }
                                }
                               // Xuất ra danh sách các đơnn vị Add code QuangHung  
                                $arwrk = $array_company;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                } else  { $sWhereWrk .= "(0=1)"; }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue = "";
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY')."<br/>";
                                                        $rswrk->MoveNext();
                                                        if (!$rswrk->EOF) $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        } 
                                     
                             // Xác định tên người tham gia add code  
                                $arwrk = $array_user;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                 } else  { $sWhereWrk .= "(0=1)"; }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_HOTEN')."<br/>";
                                                        $rswrk->MoveNext();
                                                    //    if (!$rswrk->EOF) $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
                                                         if (!$rswrk->EOF) $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        }
                        } 
                            
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CssStyle = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CssClass = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->ViewValue = $t_lichcongtac_mainsite->C_WHERE->CurrentValue;
			$t_lichcongtac_mainsite->C_WHERE->CssStyle = "";
			$t_lichcongtac_mainsite->C_WHERE->CssClass = "";
			$t_lichcongtac_mainsite->C_WHERE->ViewCustomAttributes = "";

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->ViewValue = $t_lichcongtac_mainsite->C_PREPARED->CurrentValue;
			$t_lichcongtac_mainsite->C_PREPARED->CssStyle = "";
			$t_lichcongtac_mainsite->C_PREPARED->CssClass = "";
			$t_lichcongtac_mainsite->C_PREPARED->ViewCustomAttributes = "";

			// C_OPTION
			if (strval($t_lichcongtac_mainsite->C_OPTION->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_OPTION->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = "Công khai";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = "<i>Quan trọng </i>";
						break;
					default:
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = $t_lichcongtac_mainsite->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_OPTION->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_OPTION->CssStyle = "";
			$t_lichcongtac_mainsite->C_OPTION->CssClass = "";
			$t_lichcongtac_mainsite->C_OPTION->ViewCustomAttributes = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue = $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue;
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue = "";
			}
			$t_lichcongtac_mainsite->C_FILE_ATTACH->CssStyle = "";
			$t_lichcongtac_mainsite->C_FILE_ATTACH->CssClass = "";
			$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lichcongtac_mainsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = "Khong active levelsite";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = "Active levelsite";
						break;
					default:
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = $t_lichcongtac_mainsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_ACTIVE->CssStyle = "";
			$t_lichcongtac_mainsite->C_ACTIVE->CssClass = "";
			$t_lichcongtac_mainsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue = $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CurrentValue;
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CssClass = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_lichcongtac_mainsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = "Không duyệt <img src=\"images/alert-small.gif\">";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = "Chờ duyệt <img src=\"images/new.gif\" >";
						break;
                                        case "2":
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = "<b>Xét duyệt</b>";
						break;
					default:
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue;
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_FK_PUBLISH->CurrentValue;
			$t_lichcongtac_mainsite->C_FK_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lichcongtac_mainsite->C_USER_ADD->ViewValue = $t_lichcongtac_mainsite->C_USER_ADD->CurrentValue;
			$t_lichcongtac_mainsite->C_USER_ADD->CssStyle = "";
			$t_lichcongtac_mainsite->C_USER_ADD->CssClass = "";
			$t_lichcongtac_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewValue = $t_lichcongtac_mainsite->C_ADD_TIME->CurrentValue;
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_lichcongtac_mainsite->C_ADD_TIME->CssStyle = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->CssClass = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->ViewValue = $t_lichcongtac_mainsite->C_USER_EDIT->CurrentValue;
			$t_lichcongtac_mainsite->C_USER_EDIT->CssStyle = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->CssClass = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue = $t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue;
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_lichcongtac_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->CssClass = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_lichcongtac_mainsite->FK_CONGTY->HrefValue = "";
			$t_lichcongtac_mainsite->FK_CONGTY->TooltipValue = "";

			// FK_SB_ID
			$t_lichcongtac_mainsite->FK_SB_ID->HrefValue = "";
			$t_lichcongtac_mainsite->FK_SB_ID->TooltipValue = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->HrefValue = "";
			$t_lichcongtac_mainsite->C_TITLE->TooltipValue = "";

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->TooltipValue = "";

			// C_HOUR_START
			$t_lichcongtac_mainsite->C_HOUR_START->HrefValue = "";
			$t_lichcongtac_mainsite->C_HOUR_START->TooltipValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac_mainsite->C_MINUTES_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->TooltipValue = "";

			// C_STATUS_STAR
			$t_lichcongtac_mainsite->C_STATUS_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->TooltipValue = "";

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATE_END->TooltipValue = "";

			// C_HOUR_END
			$t_lichcongtac_mainsite->C_HOUR_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_HOUR_END->TooltipValue = "";

			// C_MINUTES_END
			$t_lichcongtac_mainsite->C_MINUTES_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->TooltipValue = "";

			// C_STATUS_END
			$t_lichcongtac_mainsite->C_STATUS_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_STATUS_END->TooltipValue = "";

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->HrefValue = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->TooltipValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->HrefValue = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->TooltipValue = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->HrefValue = "";
			$t_lichcongtac_mainsite->C_WHERE->TooltipValue = "";

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->HrefValue = "";
			$t_lichcongtac_mainsite->C_PREPARED->TooltipValue = "";

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->HrefValue = "";
			$t_lichcongtac_mainsite->C_OPTION->TooltipValue = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_UploadPathEx(FALSE, $t_lichcongtac_mainsite->C_FILE_ATTACH->UploadPath) . ((!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue)) ? $t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue : $t_lichcongtac_mainsite->C_FILE_ATTACH->CurrentValue);
				if ($t_lichcongtac_mainsite->Export <> "") $t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_ConvertFullUrl($t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue);
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = "";
			}
			$t_lichcongtac_mainsite->C_FILE_ATTACH->TooltipValue = "";

			// C_ACTIVE
			$t_lichcongtac_mainsite->C_ACTIVE->HrefValue = "";
			$t_lichcongtac_mainsite->C_ACTIVE->TooltipValue = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->TooltipValue = "";

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_PUBLISH->TooltipValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->TooltipValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->TooltipValue = "";

			// C_USER_ADD
			$t_lichcongtac_mainsite->C_USER_ADD->HrefValue = "";
			$t_lichcongtac_mainsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_lichcongtac_mainsite->C_ADD_TIME->HrefValue = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->HrefValue = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_lichcongtac_mainsite->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY
			$t_lichcongtac_mainsite->FK_CONGTY->EditCustomAttributes = "";
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
			$t_lichcongtac_mainsite->FK_CONGTY->EditValue = $arwrk;

			// FK_SB_ID
			$t_lichcongtac_mainsite->FK_SB_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `SB_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmuclich`";
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
			$t_lichcongtac_mainsite->FK_SB_ID->EditValue = $arwrk;

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_TITLE->AdvancedSearch->SearchValue);

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue, 7), 7));
			$t_lichcongtac_mainsite->C_DATE_STAR->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue2, 7), 7));

			// C_HOUR_START
			$t_lichcongtac_mainsite->C_HOUR_START->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			$arwrk[] = array("1", "1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_HOUR_START->EditValue = $arwrk;

			// C_MINUTES_STAR
			$t_lichcongtac_mainsite->C_MINUTES_STAR->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			$arwrk[] = array("1", "1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_MINUTES_STAR->EditValue = $arwrk;

			// C_STATUS_STAR
			$t_lichcongtac_mainsite->C_STATUS_STAR->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xac dinh");
			$arwrk[] = array("", "");
			$t_lichcongtac_mainsite->C_STATUS_STAR->EditValue = $arwrk;

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATE_END->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_END->AdvancedSearch->SearchValue, 7), 7));

			// C_HOUR_END
			$t_lichcongtac_mainsite->C_HOUR_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_HOUR_END->EditValue = $arwrk;

			// C_MINUTES_END
			$t_lichcongtac_mainsite->C_MINUTES_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_MINUTES_END->EditValue = $arwrk;

			// C_STATUS_END
			$t_lichcongtac_mainsite->C_STATUS_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xac dinh");
			$t_lichcongtac_mainsite->C_STATUS_END->EditValue = $arwrk;

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_ORGANIZATION->AdvancedSearch->SearchValue);

			// C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_WHERE->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_WHERE->AdvancedSearch->SearchValue);

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_PREPARED->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_PREPARED->AdvancedSearch->SearchValue);

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Công khai");
			$arwrk[] = array("1", "Quan trọng");
			$t_lichcongtac_mainsite->C_OPTION->EditValue = $arwrk;

			// C_FILE_ATTACH
			$t_lichcongtac_mainsite->C_FILE_ATTACH->EditCustomAttributes = "";
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue = $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue;
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue = "";
			}

			// C_ACTIVE
			$t_lichcongtac_mainsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong active levelsite");
			$arwrk[] = array("1", "Active levelsite");
			$t_lichcongtac_mainsite->C_ACTIVE->EditValue = $arwrk;

			// C_DATETIME_ACTIVE
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATETIME_ACTIVE->AdvancedSearch->SearchValue, 7), 7));

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xét duyệt");
			$arwrk[] = array("1", "Chờ xét");
                        $arwrk[] = array("2", "Xét duyệt");
			$t_lichcongtac_mainsite->C_PUBLISH->EditValue = $arwrk;

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATETIME_PUBLISH->AdvancedSearch->SearchValue, 7), 7));

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_FK_PUBLISH->AdvancedSearch->SearchValue);

			// C_USER_ADD
			$t_lichcongtac_mainsite->C_USER_ADD->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_USER_ADD->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_USER_ADD->AdvancedSearch->SearchValue);

			// C_ADD_TIME
			$t_lichcongtac_mainsite->C_ADD_TIME->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue, 7), 7));

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue);

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lichcongtac_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue, 7), 7));
		}

		// Call Row Rendered event
		if ($t_lichcongtac_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lichcongtac_mainsite->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_lichcongtac_mainsite;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_lichcongtac_mainsite->C_DATE_STAR->FldErrMsg();
		}
		if (!ew_CheckEuroDate($t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_lichcongtac_mainsite->C_DATE_STAR->FldErrMsg();
		}

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
   function Recordset_SearchValidated() {
                echo "fsfs";
             
             }
	// Load advanced search
	function LoadAdvancedSearch() {
		global $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->C_CADENLAR_ID->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_CADENLAR_ID");
		$t_lichcongtac_mainsite->FK_CONGTY->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_FK_CONGTY");
		$t_lichcongtac_mainsite->FK_SB_ID->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_FK_SB_ID");
		$t_lichcongtac_mainsite->C_TITLE->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_TITLE");
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_DATE_STAR");
		$t_lichcongtac_mainsite->C_DATE_STAR->AdvancedSearch->SearchValue2 = $t_lichcongtac_mainsite->getAdvancedSearch("y_C_DATE_STAR");
		$t_lichcongtac_mainsite->C_HOUR_START->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_HOUR_START");
		$t_lichcongtac_mainsite->C_MINUTES_STAR->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_MINUTES_STAR");
		$t_lichcongtac_mainsite->C_STATUS_STAR->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_STATUS_STAR");
		$t_lichcongtac_mainsite->C_DATE_END->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_DATE_END");
		$t_lichcongtac_mainsite->C_HOUR_END->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_HOUR_END");
		$t_lichcongtac_mainsite->C_MINUTES_END->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_MINUTES_END");
		$t_lichcongtac_mainsite->C_STATUS_END->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_STATUS_END");
		$t_lichcongtac_mainsite->C_CONTENT->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_CONTENT");
		$t_lichcongtac_mainsite->C_ORGANIZATION->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_ORGANIZATION");
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_PARTICIPANTS_ID");
		$t_lichcongtac_mainsite->C_WHERE->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_WHERE");
		$t_lichcongtac_mainsite->C_PREPARED->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_PREPARED");
		$t_lichcongtac_mainsite->C_OPTION->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_OPTION");
		$t_lichcongtac_mainsite->C_ACTIVE->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_ACTIVE");
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_DATETIME_ACTIVE");
		$t_lichcongtac_mainsite->C_PUBLISH->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_PUBLISH");
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_DATETIME_PUBLISH");
		$t_lichcongtac_mainsite->C_FK_PUBLISH->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_FK_PUBLISH");
		$t_lichcongtac_mainsite->C_USER_ADD->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_USER_ADD");
		$t_lichcongtac_mainsite->C_ADD_TIME->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_ADD_TIME");
		$t_lichcongtac_mainsite->C_USER_EDIT->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_USER_EDIT");
		$t_lichcongtac_mainsite->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_lichcongtac_mainsite->getAdvancedSearch("x_C_EDIT_TIME");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_lichcongtac_mainsite;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_lichcongtac_mainsite->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_lichcongtac_mainsite->ExportAll) {
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
		if ($t_lichcongtac_mainsite->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_lichcongtac_mainsite, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->FK_CONGTY);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->FK_SB_ID);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_TITLE);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_DATE_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_HOUR_START);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_MINUTES_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_STATUS_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_DATE_END);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_HOUR_END);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_MINUTES_END);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_STATUS_END);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_ORGANIZATION);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_PARTICIPANTS_ID);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_WHERE);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_PREPARED);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_OPTION);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_FILE_ATTACH);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_ACTIVE);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_DATETIME_ACTIVE);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_DATETIME_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_FK_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_USER_ADD);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_lichcongtac_mainsite->C_EDIT_TIME);
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
				$t_lichcongtac_mainsite->CssClass = "";
				$t_lichcongtac_mainsite->CssStyle = "";
				$t_lichcongtac_mainsite->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_lichcongtac_mainsite->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('FK_CONGTY', $t_lichcongtac_mainsite->FK_CONGTY->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_SB_ID', $t_lichcongtac_mainsite->FK_SB_ID->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_lichcongtac_mainsite->C_TITLE->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_DATE_STAR', $t_lichcongtac_mainsite->C_DATE_STAR->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_HOUR_START', $t_lichcongtac_mainsite->C_HOUR_START->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_MINUTES_STAR', $t_lichcongtac_mainsite->C_MINUTES_STAR->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_STAR', $t_lichcongtac_mainsite->C_STATUS_STAR->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_DATE_END', $t_lichcongtac_mainsite->C_DATE_END->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_HOUR_END', $t_lichcongtac_mainsite->C_HOUR_END->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_MINUTES_END', $t_lichcongtac_mainsite->C_MINUTES_END->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_END', $t_lichcongtac_mainsite->C_STATUS_END->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ORGANIZATION', $t_lichcongtac_mainsite->C_ORGANIZATION->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_PARTICIPANTS_ID', $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_WHERE', $t_lichcongtac_mainsite->C_WHERE->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_PREPARED', $t_lichcongtac_mainsite->C_PREPARED->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_OPTION', $t_lichcongtac_mainsite->C_OPTION->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_FILE_ATTACH', $t_lichcongtac_mainsite->C_FILE_ATTACH->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_lichcongtac_mainsite->C_ACTIVE->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_ACTIVE', $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_PUBLISH', $t_lichcongtac_mainsite->C_PUBLISH->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_PUBLISH', $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_FK_PUBLISH', $t_lichcongtac_mainsite->C_FK_PUBLISH->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_lichcongtac_mainsite->C_USER_ADD->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_lichcongtac_mainsite->C_ADD_TIME->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_lichcongtac_mainsite->C_USER_EDIT->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_lichcongtac_mainsite->C_EDIT_TIME->ExportValue($t_lichcongtac_mainsite->Export, $t_lichcongtac_mainsite->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_lichcongtac_mainsite->FK_CONGTY);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->FK_SB_ID);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_TITLE);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_DATE_STAR);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_HOUR_START);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_MINUTES_STAR);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_STATUS_STAR);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_DATE_END);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_HOUR_END);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_MINUTES_END);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_STATUS_END);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_ORGANIZATION);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_PARTICIPANTS_ID);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_WHERE);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_PREPARED);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_OPTION);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_FILE_ATTACH);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_ACTIVE);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_DATETIME_ACTIVE);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_DATETIME_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_FK_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_USER_ADD);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_ADD_TIME);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_USER_EDIT);
					$ExportDoc->ExportField($t_lichcongtac_mainsite->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_lichcongtac_mainsite->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_lichcongtac_mainsite->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_lichcongtac_mainsite->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_lichcongtac_mainsite->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_lichcongtac_mainsite->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_lichcongtac_mainsite;
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
		if ($t_lichcongtac_mainsite->Email_Sending($Email, $EventArgs))
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
		global $t_lichcongtac_mainsite;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_lichcongtac_mainsite->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_lichcongtac_mainsite->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_lichcongtac_mainsite->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_CADENLAR_ID); // C_CADENLAR_ID
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->FK_CONGTY); // FK_CONGTY
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->FK_SB_ID); // FK_SB_ID
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_TITLE); // C_TITLE
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_DATE_STAR); // C_DATE_STAR
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_HOUR_START); // C_HOUR_START
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_MINUTES_STAR); // C_MINUTES_STAR
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_STATUS_STAR); // C_STATUS_STAR
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_DATE_END); // C_DATE_END
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_HOUR_END); // C_HOUR_END
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_MINUTES_END); // C_MINUTES_END
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_STATUS_END); // C_STATUS_END
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_CONTENT); // C_CONTENT
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_ORGANIZATION); // C_ORGANIZATION
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_PARTICIPANTS_ID); // C_PARTICIPANTS_ID
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_WHERE); // C_WHERE
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_PREPARED); // C_PREPARED
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_OPTION); // C_OPTION
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_ACTIVE); // C_ACTIVE
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_DATETIME_ACTIVE); // C_DATETIME_ACTIVE
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_PUBLISH); // C_PUBLISH
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_DATETIME_PUBLISH); // C_DATETIME_PUBLISH
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_FK_PUBLISH); // C_FK_PUBLISH
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_lichcongtac_mainsite->C_EDIT_TIME); // C_EDIT_TIME

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_lichcongtac_mainsite->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_lichcongtac_mainsite->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_lichcongtac_mainsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_lichcongtac_mainsite->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_lichcongtac_mainsite->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_lichcongtac_mainsite->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_lichcongtac_mainsite->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_lichcongtac_mainsite->GetAdvancedSearch("w_" . $FldParm);
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
