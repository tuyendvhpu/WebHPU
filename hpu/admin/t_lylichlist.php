<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lylichinfo.php" ?>
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
$t_lylich_list = new ct_lylich_list();
$Page =& $t_lylich_list;

// Page init
$t_lylich_list->Page_Init();

// Page main
$t_lylich_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_lylich->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_lylich_list = new ew_Page("t_lylich_list");

// page properties
t_lylich_list.PageID = "list"; // page ID
t_lylich_list.FormID = "ft_lylichlist"; // form ID
var EW_PAGE_ID = t_lylich_list.PageID; // for backward compatibility

// extend page with validate function for search
t_lylich_list.ValidateSearch = function(fobj) {
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
t_lylich_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lylich_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lylich_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lylich_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_lylich->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_lylich_list->lTotalRecs = $t_lylich->SelectRecordCount();
	} else {
		if ($rs = $t_lylich_list->LoadRecordset())
			$t_lylich_list->lTotalRecs = $rs->RecordCount();
	}
	$t_lylich_list->lStartRec = 1;
	if ($t_lylich_list->lDisplayRecs <= 0 || ($t_lylich->Export <> "" && $t_lylich->ExportAll)) // Display all records
		$t_lylich_list->lDisplayRecs = $t_lylich_list->lTotalRecs;
	if (!($t_lylich->Export <> "" && $t_lylich->ExportAll))
		$t_lylich_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_lylich_list->LoadRecordset($t_lylich_list->lStartRec-1, $t_lylich_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lylich->TableCaption() ?>
<?php if ($t_lylich->Export == "" && $t_lylich->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_lylich" id="emf_t_lylich" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_lylich',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_lylichlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_lylich->Export == "" && $t_lylich->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_lylich_list);" style="text-decoration: none;"><img id="t_lylich_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_lylich_list_SearchPanel">
<form name="ft_lylichlistsrch" id="ft_lylichlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_lylich_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_lylich">
<?php
if ($gsSearchError == "")
	$t_lylich_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_lylich->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_lylich_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_lylich->C_FULLNAME->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_FULLNAME" id="z_C_FULLNAME" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_FULLNAME" id="x_C_FULLNAME" title="<?php echo $t_lylich->C_FULLNAME->FldTitle() ?>" size="80" maxlength="250" value="<?php echo $t_lylich->C_FULLNAME->EditValue ?>"<?php echo $t_lylich->C_FULLNAME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_lylich->C_POSITION->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_POSITION" id="z_C_POSITION" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_POSITION" id="x_C_POSITION" title="<?php echo $t_lylich->C_POSITION->FldTitle() ?>" size="80" maxlength="250" value="<?php echo $t_lylich->C_POSITION->EditValue ?>"<?php echo $t_lylich->C_POSITION->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE" id="z_C_ACTIVE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lylich->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_lylich->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_lylich->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_ACTIVE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lylich->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lylich->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
		<td><span class="phpmaker"><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE_MAINSITE" id="z_C_ACTIVE_MAINSITE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_lylich->C_ACTIVE_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_lylich->C_ACTIVE_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_lylich->C_ACTIVE_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_lylich->C_ACTIVE_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lylich->C_ACTIVE_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_lylich->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_lylich_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_lylich->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_lylich->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_lylich->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lylich_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_lylich->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_lylich->CurrentAction <> "gridadd" && $t_lylich->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lylich_list->Pager)) $t_lylich_list->Pager = new cNumericPager($t_lylich_list->lStartRec, $t_lylich_list->lDisplayRecs, $t_lylich_list->lTotalRecs, $t_lylich_list->lRecRange) ?>
<?php if ($t_lylich_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_lylich_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lylich_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_lylich_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_lylich_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_lylich_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lylich_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_lylich_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_lylich_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lylichlist, '<?php echo $t_lylich_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lylichlist, '<?php echo $t_lylich_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_lylichlist" id="ft_lylichlist" class="ewForm" action="" method="post">
<div id="gmp_t_lylich" class="ewGridMiddlePanel">
<?php if ($t_lylich_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_lylich->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_lylich_list->RenderListOptions();

// Render list options (header, left)
$t_lylich_list->ListOptions->Render("header", "left");
?>
		
<?php if ($t_lylich->C_PIC->Visible) { // C_PIC ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_PIC) == "") { ?>
		<td><?php echo $t_lylich->C_PIC->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_PIC) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_PIC->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lylich->C_PIC->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_PIC->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lylich->C_FULLNAME->Visible) { // C_FULLNAME ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_FULLNAME) == "") { ?>
		<td><?php echo $t_lylich->C_FULLNAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_FULLNAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_FULLNAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_lylich->C_FULLNAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_FULLNAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_lylich->C_WORK_ADDRESS->Visible) { // C_WORK_ADDRESS ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_WORK_ADDRESS) == "") { ?>
		<td><?php echo $t_lylich->C_WORK_ADDRESS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_WORK_ADDRESS) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_WORK_ADDRESS->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_lylich->C_WORK_ADDRESS->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_WORK_ADDRESS->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lylich->C_EMAIL->Visible) { // C_EMAIL ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_EMAIL) == "") { ?>
		<td><?php echo $t_lylich->C_EMAIL->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_EMAIL) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_EMAIL->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_lylich->C_EMAIL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_EMAIL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>						
<?php if ($t_lylich->C_STATUS->Visible) { // C_STATUS ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_STATUS) == "") { ?>
		<td><?php echo $t_lylich->C_STATUS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_STATUS) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_STATUS->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lylich->C_STATUS->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_STATUS->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lylich->C_ORDER_LEVEL->Visible) { // C_ORDER_LEVEL ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_ORDER_LEVEL) == "") { ?>
		<td><?php echo $t_lylich->C_ORDER_LEVEL->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_ORDER_LEVEL) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_ORDER_LEVEL->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lylich->C_ORDER_LEVEL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_ORDER_LEVEL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lylich->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_ACTIVE) == "") { ?>
		<td><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lylich->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_lylich->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
	<?php if ($t_lylich->SortUrl($t_lylich->C_ACTIVE_MAINSITE) == "") { ?>
		<td><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_lylich->SortUrl($t_lylich->C_ACTIVE_MAINSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_lylich->C_ACTIVE_MAINSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_lylich->C_ACTIVE_MAINSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
	
<?php

// Render list options (header, right)
$t_lylich_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_lylich->ExportAll && $t_lylich->Export <> "") {
	$t_lylich_list->lStopRec = $t_lylich_list->lTotalRecs;
} else {
	$t_lylich_list->lStopRec = $t_lylich_list->lStartRec + $t_lylich_list->lDisplayRecs - 1; // Set the last record to display
}
$t_lylich_list->lRecCount = $t_lylich_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_lylich_list->lStartRec > 1)
		$rs->Move($t_lylich_list->lStartRec - 1);
}

// Initialize aggregate
$t_lylich->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_lylich_list->RenderRow();
$t_lylich_list->lRowCnt = 0;
while (($t_lylich->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_lylich_list->lRecCount < $t_lylich_list->lStopRec) {
	$t_lylich_list->lRecCount++;
	if (intval($t_lylich_list->lRecCount) >= intval($t_lylich_list->lStartRec)) {
		$t_lylich_list->lRowCnt++;

	// Init row class and style
	$t_lylich->CssClass = "";
	$t_lylich->CssStyle = "";
	$t_lylich->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_lylich->CurrentAction == "gridadd") {
		$t_lylich_list->LoadDefaultValues(); // Load default values
	} else {
		$t_lylich_list->LoadRowValues($rs); // Load row values
	}
	$t_lylich->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_lylich_list->RenderRow();

	// Render list options
	$t_lylich_list->RenderListOptions();
?>
	<tr<?php echo $t_lylich->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_lylich_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_lylich->C_PIC->Visible) { // C_PIC ?>
		<td<?php echo $t_lylich->C_PIC->CellAttributes() ?>>
<?php if ($t_lylich->C_PIC->HrefValue <> "" || $t_lylich->C_PIC->TooltipValue <> "") { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
   <img style="width: 130px;height: 150px" src="../upload/picprofile/<?php echo $t_lylich->C_PIC->ListViewValue() ?>"> <br/>                  
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<?php echo $t_lylich->C_PIC->ListViewValue() ?>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t_lylich->C_FULLNAME->Visible) { // C_FULLNAME ?>
		<td<?php echo $t_lylich->C_FULLNAME->CellAttributes() ?>>
                    <div style="width: 200px"<?php echo $t_lylich->C_FULLNAME->ViewAttributes() ?>><?php echo "<b>".$t_lylich->C_FULLNAME->ListViewValue()."</b>" ?></div>
<div<?php echo $t_lylich->C_POSITION->ViewAttributes() ?>><?php echo $t_lylich->C_POSITION->ListViewValue() ?></div>
                </td>
	<?php } ?>
	<?php if ($t_lylich->C_WORK_ADDRESS->Visible) { // C_WORK_ADDRESS ?>
		<td<?php echo $t_lylich->C_WORK_ADDRESS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_WORK_ADDRESS->ViewAttributes() ?>><?php echo $t_lylich->C_WORK_ADDRESS->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_lylich->C_EMAIL->Visible) { // C_EMAIL ?>
		<td<?php echo $t_lylich->C_EMAIL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_EMAIL->ViewAttributes() ?>><?php echo "E: ".$t_lylich->C_EMAIL->ListViewValue() ?></div>
<div<?php echo $t_lylich->C_PHONE->ViewAttributes() ?>><?php echo "M: ".$t_lylich->C_PHONE->ListViewValue() ?></div>
<div<?php echo $t_lylich->C_BIRTHDAY->ViewAttributes() ?>><?php echo "B: ".$t_lylich->C_BIRTHDAY->ListViewValue() ?></div>
                </td>
	<?php } ?>

	<?php if ($t_lylich->C_STATUS->Visible) { // C_STATUS ?>
		<td<?php echo $t_lylich->C_STATUS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_STATUS->ViewAttributes() ?>><?php echo $t_lylich->C_STATUS->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_lylich->C_ORDER_LEVEL->Visible) { // C_ORDER_LEVEL ?>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ORDER_LEVEL->ViewAttributes() ?>><?php echo $t_lylich->C_ORDER_LEVEL->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_lylich->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE->ListViewValue() ?></div>
<div<?php echo $t_lylich->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVE->ListViewValue() ?></div>
                </td>
	<?php } ?>
	<?php if ($t_lylich->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE_MAINSITE->ListViewValue() ?></div>
<div<?php echo $t_lylich->C_TIME_ACTIVEM->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVEM->ListViewValue() ?></div>
                </td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_lylich_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_lylich->CurrentAction <> "gridadd")
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
<?php if ($t_lylich_list->lTotalRecs > 0) { ?>
<?php if ($t_lylich->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_lylich->CurrentAction <> "gridadd" && $t_lylich->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lylich_list->Pager)) $t_lylich_list->Pager = new cNumericPager($t_lylich_list->lStartRec, $t_lylich_list->lDisplayRecs, $t_lylich_list->lTotalRecs, $t_lylich_list->lRecRange) ?>
<?php if ($t_lylich_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_lylich_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lylich_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_list->PageUrl() ?>start=<?php echo $t_lylich_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_lylich_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_lylich_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_lylich_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lylich_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_lylich_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_lylich_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_lylich_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lylichlist, '<?php echo $t_lylich_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_lylichlist, '<?php echo $t_lylich_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_lylich->Export == "" && $t_lylich->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_lylich->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_lylich_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lylich_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_lylich';

	// Page object name
	var $PageObjName = 't_lylich_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lylich;
		if ($t_lylich->UseTokenInUrl) $PageUrl .= "t=" . $t_lylich->TableVar . "&"; // Add page token
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
		global $objForm, $t_lylich;
		if ($t_lylich->UseTokenInUrl) {
			if ($objForm)
				return ($t_lylich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lylich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lylich_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lylich)
		$GLOBALS["t_lylich"] = new ct_lylich();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_lylich"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_lylichdelete.php";
		$this->MultiUpdateUrl = "t_lylichupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lylich', TRUE);

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
		global $t_lylich;

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
			$t_lylich->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_lylich->Export = $_POST["exporttype"];
		} else {
			$t_lylich->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_lylich->Export; // Get export parameter, used in header
		$gsExportFile = $t_lylich->TableVar; // Get export file, used in header
		if (in_array($t_lylich->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_lylich->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_lylich->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_lylich->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_lylich->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_lylich;

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
			$t_lylich->Recordset_SearchValidated();

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
		if ($t_lylich->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_lylich->getRecordsPerPage(); // Restore from Session
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
		$t_lylich->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_lylich->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_lylich->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_lylich->getSearchWhere();
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
		$t_lylich->setSessionWhere($sFilter);
		$t_lylich->CurrentFilter = "";

		// Export data only
		if (in_array($t_lylich->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_lylich->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_lylich;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_lylich->PK_PROFILE_ID, FALSE); // PK_PROFILE_ID
		$this->BuildSearchSql($sWhere, $t_lylich->FK_CONGTY_ID, FALSE); // FK_CONGTY_ID
		$this->BuildSearchSql($sWhere, $t_lylich->C_FULLNAME, FALSE); // C_FULLNAME
		$this->BuildSearchSql($sWhere, $t_lylich->C_POSITION, FALSE); // C_POSITION
		$this->BuildSearchSql($sWhere, $t_lylich->C_WORK_ADDRESS, FALSE); // C_WORK_ADDRESS
		$this->BuildSearchSql($sWhere, $t_lylich->C_EMAIL, FALSE); // C_EMAIL
		$this->BuildSearchSql($sWhere, $t_lylich->C_PHONE, FALSE); // C_PHONE
		$this->BuildSearchSql($sWhere, $t_lylich->C_BIRTHDAY, FALSE); // C_BIRTHDAY
		$this->BuildSearchSql($sWhere, $t_lylich->C_BLOG, FALSE); // C_BLOG
		$this->BuildSearchSql($sWhere, $t_lylich->C_PERSONAL_PROFILE, FALSE); // C_PERSONAL_PROFILE
		$this->BuildSearchSql($sWhere, $t_lylich->C_EDUCATIION, FALSE); // C_EDUCATIION
		$this->BuildSearchSql($sWhere, $t_lylich->C_SKILLS, FALSE); // C_SKILLS
		$this->BuildSearchSql($sWhere, $t_lylich->C_WORK_EXPERIENCE, FALSE); // C_WORK_EXPERIENCE
		$this->BuildSearchSql($sWhere, $t_lylich->C_SCIENTIFIC_RESEARCH, FALSE); // C_SCIENTIFIC_RESEARCH
		$this->BuildSearchSql($sWhere, $t_lylich->C_REFERENCES, FALSE); // C_REFERENCES
		$this->BuildSearchSql($sWhere, $t_lylich->C_HOBBIES, FALSE); // C_HOBBIES
		$this->BuildSearchSql($sWhere, $t_lylich->C_TEMPLATE, FALSE); // C_TEMPLATE
		$this->BuildSearchSql($sWhere, $t_lylich->C_STATUS, FALSE); // C_STATUS
		$this->BuildSearchSql($sWhere, $t_lylich->C_NOTE, FALSE); // C_NOTE
		$this->BuildSearchSql($sWhere, $t_lylich->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_lylich->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_lylich->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_lylich->C_EDIT_TIME, FALSE); // C_EDIT_TIME
		$this->BuildSearchSql($sWhere, $t_lylich->C_ORDER_LEVEL, FALSE); // C_ORDER_LEVEL
		$this->BuildSearchSql($sWhere, $t_lylich->C_ACTIVE, FALSE); // C_ACTIVE
		$this->BuildSearchSql($sWhere, $t_lylich->C_TIME_ACTIVE, FALSE); // C_TIME_ACTIVE
		$this->BuildSearchSql($sWhere, $t_lylich->C_ACTIVE_MAINSITE, FALSE); // C_ACTIVE_MAINSITE
		$this->BuildSearchSql($sWhere, $t_lylich->C_TIME_ACTIVEM, FALSE); // C_TIME_ACTIVEM
		$this->BuildSearchSql($sWhere, $t_lylich->C_ORDER_MAIN, FALSE); // C_ORDER_MAIN

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_lylich->PK_PROFILE_ID); // PK_PROFILE_ID
			$this->SetSearchParm($t_lylich->FK_CONGTY_ID); // FK_CONGTY_ID
			$this->SetSearchParm($t_lylich->C_FULLNAME); // C_FULLNAME
			$this->SetSearchParm($t_lylich->C_POSITION); // C_POSITION
			$this->SetSearchParm($t_lylich->C_WORK_ADDRESS); // C_WORK_ADDRESS
			$this->SetSearchParm($t_lylich->C_EMAIL); // C_EMAIL
			$this->SetSearchParm($t_lylich->C_PHONE); // C_PHONE
			$this->SetSearchParm($t_lylich->C_BIRTHDAY); // C_BIRTHDAY
			$this->SetSearchParm($t_lylich->C_BLOG); // C_BLOG
			$this->SetSearchParm($t_lylich->C_PERSONAL_PROFILE); // C_PERSONAL_PROFILE
			$this->SetSearchParm($t_lylich->C_EDUCATIION); // C_EDUCATIION
			$this->SetSearchParm($t_lylich->C_SKILLS); // C_SKILLS
			$this->SetSearchParm($t_lylich->C_WORK_EXPERIENCE); // C_WORK_EXPERIENCE
			$this->SetSearchParm($t_lylich->C_SCIENTIFIC_RESEARCH); // C_SCIENTIFIC_RESEARCH
			$this->SetSearchParm($t_lylich->C_REFERENCES); // C_REFERENCES
			$this->SetSearchParm($t_lylich->C_HOBBIES); // C_HOBBIES
			$this->SetSearchParm($t_lylich->C_TEMPLATE); // C_TEMPLATE
			$this->SetSearchParm($t_lylich->C_STATUS); // C_STATUS
			$this->SetSearchParm($t_lylich->C_NOTE); // C_NOTE
			$this->SetSearchParm($t_lylich->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_lylich->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_lylich->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_lylich->C_EDIT_TIME); // C_EDIT_TIME
			$this->SetSearchParm($t_lylich->C_ORDER_LEVEL); // C_ORDER_LEVEL
			$this->SetSearchParm($t_lylich->C_ACTIVE); // C_ACTIVE
			$this->SetSearchParm($t_lylich->C_TIME_ACTIVE); // C_TIME_ACTIVE
			$this->SetSearchParm($t_lylich->C_ACTIVE_MAINSITE); // C_ACTIVE_MAINSITE
			$this->SetSearchParm($t_lylich->C_TIME_ACTIVEM); // C_TIME_ACTIVEM
			$this->SetSearchParm($t_lylich->C_ORDER_MAIN); // C_ORDER_MAIN
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
		global $t_lylich;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_lylich->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_lylich->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_lylich->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_lylich->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_lylich->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_lylich;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_lylich->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_lylich->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_lylich->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_lylich->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_lylich->GetAdvancedSearch("w_$FldParm");
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
		global $t_lylich;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_PIC, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_FULLNAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_POSITION, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_WORK_ADDRESS, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_EMAIL, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_BIRTHDAY, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_BLOG, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_PERSONAL_PROFILE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_EDUCATIION, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_SKILLS, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_WORK_EXPERIENCE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_SCIENTIFIC_RESEARCH, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_REFERENCES, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_HOBBIES, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_lylich->C_NOTE, $Keyword);
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
		global $Security, $t_lylich;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_lylich->BasicSearchKeyword;
		$sSearchType = $t_lylich->BasicSearchType;
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
			$t_lylich->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_lylich->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_lylich;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_lylich->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_lylich;
		$t_lylich->setSessionBasicSearchKeyword("");
		$t_lylich->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_lylich;
		$t_lylich->setAdvancedSearch("x_PK_PROFILE_ID", "");
		$t_lylich->setAdvancedSearch("x_FK_CONGTY_ID", "");
		$t_lylich->setAdvancedSearch("x_C_FULLNAME", "");
		$t_lylich->setAdvancedSearch("x_C_POSITION", "");
		$t_lylich->setAdvancedSearch("x_C_WORK_ADDRESS", "");
		$t_lylich->setAdvancedSearch("x_C_EMAIL", "");
		$t_lylich->setAdvancedSearch("x_C_PHONE", "");
		$t_lylich->setAdvancedSearch("x_C_BIRTHDAY", "");
		$t_lylich->setAdvancedSearch("x_C_BLOG", "");
		$t_lylich->setAdvancedSearch("x_C_PERSONAL_PROFILE", "");
		$t_lylich->setAdvancedSearch("x_C_EDUCATIION", "");
		$t_lylich->setAdvancedSearch("x_C_SKILLS", "");
		$t_lylich->setAdvancedSearch("x_C_WORK_EXPERIENCE", "");
		$t_lylich->setAdvancedSearch("x_C_SCIENTIFIC_RESEARCH", "");
		$t_lylich->setAdvancedSearch("x_C_REFERENCES", "");
		$t_lylich->setAdvancedSearch("x_C_HOBBIES", "");
		$t_lylich->setAdvancedSearch("x_C_TEMPLATE", "");
		$t_lylich->setAdvancedSearch("x_C_STATUS", "");
		$t_lylich->setAdvancedSearch("x_C_NOTE", "");
		$t_lylich->setAdvancedSearch("x_C_USER_ADD", "");
		$t_lylich->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_lylich->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_lylich->setAdvancedSearch("x_C_EDIT_TIME", "");
		$t_lylich->setAdvancedSearch("x_C_ORDER_LEVEL", "");
		$t_lylich->setAdvancedSearch("x_C_ACTIVE", "");
		$t_lylich->setAdvancedSearch("x_C_TIME_ACTIVE", "");
		$t_lylich->setAdvancedSearch("x_C_ACTIVE_MAINSITE", "");
		$t_lylich->setAdvancedSearch("x_C_TIME_ACTIVEM", "");
		$t_lylich->setAdvancedSearch("x_C_ORDER_MAIN", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_lylich;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_PROFILE_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_FULLNAME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_POSITION"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_WORK_ADDRESS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EMAIL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PHONE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_BIRTHDAY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_BLOG"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PERSONAL_PROFILE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDUCATIION"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_SKILLS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_WORK_EXPERIENCE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_SCIENTIFIC_RESEARCH"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_REFERENCES"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_HOBBIES"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TEMPLATE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_STATUS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NOTE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ORDER_LEVEL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE_MAINSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ACTIVEM"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ORDER_MAIN"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_lylich->BasicSearchKeyword = $t_lylich->getSessionBasicSearchKeyword();
			$t_lylich->BasicSearchType = $t_lylich->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_lylich->PK_PROFILE_ID);
			$this->GetSearchParm($t_lylich->FK_CONGTY_ID);
			$this->GetSearchParm($t_lylich->C_FULLNAME);
			$this->GetSearchParm($t_lylich->C_POSITION);
			$this->GetSearchParm($t_lylich->C_WORK_ADDRESS);
			$this->GetSearchParm($t_lylich->C_EMAIL);
			$this->GetSearchParm($t_lylich->C_PHONE);
			$this->GetSearchParm($t_lylich->C_BIRTHDAY);
			$this->GetSearchParm($t_lylich->C_BLOG);
			$this->GetSearchParm($t_lylich->C_PERSONAL_PROFILE);
			$this->GetSearchParm($t_lylich->C_EDUCATIION);
			$this->GetSearchParm($t_lylich->C_SKILLS);
			$this->GetSearchParm($t_lylich->C_WORK_EXPERIENCE);
			$this->GetSearchParm($t_lylich->C_SCIENTIFIC_RESEARCH);
			$this->GetSearchParm($t_lylich->C_REFERENCES);
			$this->GetSearchParm($t_lylich->C_HOBBIES);
			$this->GetSearchParm($t_lylich->C_TEMPLATE);
			$this->GetSearchParm($t_lylich->C_STATUS);
			$this->GetSearchParm($t_lylich->C_NOTE);
			$this->GetSearchParm($t_lylich->C_USER_ADD);
			$this->GetSearchParm($t_lylich->C_ADD_TIME);
			$this->GetSearchParm($t_lylich->C_USER_EDIT);
			$this->GetSearchParm($t_lylich->C_EDIT_TIME);
			$this->GetSearchParm($t_lylich->C_ORDER_LEVEL);
			$this->GetSearchParm($t_lylich->C_ACTIVE);
			$this->GetSearchParm($t_lylich->C_TIME_ACTIVE);
			$this->GetSearchParm($t_lylich->C_ACTIVE_MAINSITE);
			$this->GetSearchParm($t_lylich->C_TIME_ACTIVEM);
			$this->GetSearchParm($t_lylich->C_ORDER_MAIN);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_lylich;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_lylich->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_lylich->CurrentOrderType = @$_GET["ordertype"];
			$t_lylich->UpdateSort($t_lylich->FK_CONGTY_ID, $bCtrl); // FK_CONGTY_ID
			$t_lylich->UpdateSort($t_lylich->C_PIC, $bCtrl); // C_PIC
			$t_lylich->UpdateSort($t_lylich->C_FULLNAME, $bCtrl); // C_FULLNAME
			$t_lylich->UpdateSort($t_lylich->C_POSITION, $bCtrl); // C_POSITION
			$t_lylich->UpdateSort($t_lylich->C_WORK_ADDRESS, $bCtrl); // C_WORK_ADDRESS
			$t_lylich->UpdateSort($t_lylich->C_EMAIL, $bCtrl); // C_EMAIL
			$t_lylich->UpdateSort($t_lylich->C_PHONE, $bCtrl); // C_PHONE
			$t_lylich->UpdateSort($t_lylich->C_BIRTHDAY, $bCtrl); // C_BIRTHDAY
			$t_lylich->UpdateSort($t_lylich->C_TEMPLATE, $bCtrl); // C_TEMPLATE
			$t_lylich->UpdateSort($t_lylich->C_STATUS, $bCtrl); // C_STATUS
			$t_lylich->UpdateSort($t_lylich->C_ORDER_LEVEL, $bCtrl); // C_ORDER_LEVEL
			$t_lylich->UpdateSort($t_lylich->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_lylich->UpdateSort($t_lylich->C_TIME_ACTIVE, $bCtrl); // C_TIME_ACTIVE
			$t_lylich->UpdateSort($t_lylich->C_ACTIVE_MAINSITE, $bCtrl); // C_ACTIVE_MAINSITE
			$t_lylich->UpdateSort($t_lylich->C_TIME_ACTIVEM, $bCtrl); // C_TIME_ACTIVEM
			$t_lylich->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_lylich;
		$sOrderBy = $t_lylich->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_lylich->SqlOrderBy() <> "") {
				$sOrderBy = $t_lylich->SqlOrderBy();
				$t_lylich->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_lylich;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_lylich->setSessionOrderBy($sOrderBy);
				$t_lylich->FK_CONGTY_ID->setSort("");
				$t_lylich->C_PIC->setSort("");
				$t_lylich->C_FULLNAME->setSort("");
				$t_lylich->C_POSITION->setSort("");
				$t_lylich->C_WORK_ADDRESS->setSort("");
				$t_lylich->C_EMAIL->setSort("");
				$t_lylich->C_PHONE->setSort("");
				$t_lylich->C_BIRTHDAY->setSort("");
				$t_lylich->C_TEMPLATE->setSort("");
				$t_lylich->C_STATUS->setSort("");
				$t_lylich->C_ORDER_LEVEL->setSort("");
				$t_lylich->C_ACTIVE->setSort("");
				$t_lylich->C_TIME_ACTIVE->setSort("");
				$t_lylich->C_ACTIVE_MAINSITE->setSort("");
				$t_lylich->C_TIME_ACTIVEM->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_lylich->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_lylich, $rs;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_lylich_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_lylich->Export <> "" ||
			$t_lylich->CurrentAction == "gridadd" ||
			$t_lylich->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_lylich, $rs;
		$this->ListOptions->LoadDefault();

		 // "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($oListOpt->Visible)
                {
                        switch ($rs->fields('C_TEMPLATE')) {
                                            case 1:
                                               // $url ='../profile/profile1.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
                                                $url='../profile/hpu-khoa-vhdl1-'.changeTitle($rs->fields('C_FULLNAME')).'-'.$rs->fields('PK_PROFILE_ID').".pdf";
                                                break;
                                            case 2:
                                                 // $url ='../profile/profile2.php?profileid='.$arwrk[$i]['PK_PROFILE_ID'].'';
                                                $url='../profile/hpu-khoa-vhdl2-'.changeTitle($rs->fields('C_FULLNAME')).'-'.$rs->fields('PK_PROFILE_ID').".pdf";
                                                break;
                                             default:
                                     }                   
			$oListOpt->Body = "<a target=\"_blank\" class=\"ewRowLink\" href=\"" . $url . "\">" . "<img src=\"images/view.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("ViewLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("ViewLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
                }                           
		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($oListOpt->Visible) {           
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"images/edit.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_lylich->PK_PROFILE_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_lylich;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_lylich;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_lylich->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_lylich->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_lylich->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_lylich->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_lylich->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_lylich->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_lylich;
		$t_lylich->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_lylich->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_lylich;

		// Load search values
		// PK_PROFILE_ID

		$t_lylich->PK_PROFILE_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_PROFILE_ID"]);
		$t_lylich->PK_PROFILE_ID->AdvancedSearch->SearchOperator = @$_GET["z_PK_PROFILE_ID"];

		// FK_CONGTY_ID
		$t_lylich->FK_CONGTY_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY_ID"]);
		$t_lylich->FK_CONGTY_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY_ID"];

		// C_FULLNAME
		$t_lylich->C_FULLNAME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FULLNAME"]);
		$t_lylich->C_FULLNAME->AdvancedSearch->SearchOperator = @$_GET["z_C_FULLNAME"];

		// C_POSITION
		$t_lylich->C_POSITION->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_POSITION"]);
		$t_lylich->C_POSITION->AdvancedSearch->SearchOperator = @$_GET["z_C_POSITION"];

		// C_WORK_ADDRESS
		$t_lylich->C_WORK_ADDRESS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_WORK_ADDRESS"]);
		$t_lylich->C_WORK_ADDRESS->AdvancedSearch->SearchOperator = @$_GET["z_C_WORK_ADDRESS"];

		// C_EMAIL
		$t_lylich->C_EMAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EMAIL"]);
		$t_lylich->C_EMAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_EMAIL"];

		// C_PHONE
		$t_lylich->C_PHONE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PHONE"]);
		$t_lylich->C_PHONE->AdvancedSearch->SearchOperator = @$_GET["z_C_PHONE"];

		// C_BIRTHDAY
		$t_lylich->C_BIRTHDAY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_BIRTHDAY"]);
		$t_lylich->C_BIRTHDAY->AdvancedSearch->SearchOperator = @$_GET["z_C_BIRTHDAY"];

		// C_BLOG
		$t_lylich->C_BLOG->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_BLOG"]);
		$t_lylich->C_BLOG->AdvancedSearch->SearchOperator = @$_GET["z_C_BLOG"];

		// C_PERSONAL_PROFILE
		$t_lylich->C_PERSONAL_PROFILE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PERSONAL_PROFILE"]);
		$t_lylich->C_PERSONAL_PROFILE->AdvancedSearch->SearchOperator = @$_GET["z_C_PERSONAL_PROFILE"];

		// C_EDUCATIION
		$t_lylich->C_EDUCATIION->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDUCATIION"]);
		$t_lylich->C_EDUCATIION->AdvancedSearch->SearchOperator = @$_GET["z_C_EDUCATIION"];

		// C_SKILLS
		$t_lylich->C_SKILLS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_SKILLS"]);
		$t_lylich->C_SKILLS->AdvancedSearch->SearchOperator = @$_GET["z_C_SKILLS"];

		// C_WORK_EXPERIENCE
		$t_lylich->C_WORK_EXPERIENCE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_WORK_EXPERIENCE"]);
		$t_lylich->C_WORK_EXPERIENCE->AdvancedSearch->SearchOperator = @$_GET["z_C_WORK_EXPERIENCE"];

		// C_SCIENTIFIC_RESEARCH
		$t_lylich->C_SCIENTIFIC_RESEARCH->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_SCIENTIFIC_RESEARCH"]);
		$t_lylich->C_SCIENTIFIC_RESEARCH->AdvancedSearch->SearchOperator = @$_GET["z_C_SCIENTIFIC_RESEARCH"];

		// C_REFERENCES
		$t_lylich->C_REFERENCES->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_REFERENCES"]);
		$t_lylich->C_REFERENCES->AdvancedSearch->SearchOperator = @$_GET["z_C_REFERENCES"];

		// C_HOBBIES
		$t_lylich->C_HOBBIES->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HOBBIES"]);
		$t_lylich->C_HOBBIES->AdvancedSearch->SearchOperator = @$_GET["z_C_HOBBIES"];

		// C_TEMPLATE
		$t_lylich->C_TEMPLATE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEMPLATE"]);
		$t_lylich->C_TEMPLATE->AdvancedSearch->SearchOperator = @$_GET["z_C_TEMPLATE"];

		// C_STATUS
		$t_lylich->C_STATUS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_STATUS"]);
		$t_lylich->C_STATUS->AdvancedSearch->SearchOperator = @$_GET["z_C_STATUS"];

		// C_NOTE
		$t_lylich->C_NOTE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NOTE"]);
		$t_lylich->C_NOTE->AdvancedSearch->SearchOperator = @$_GET["z_C_NOTE"];

		// C_USER_ADD
		$t_lylich->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_lylich->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_lylich->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_lylich->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_lylich->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_lylich->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_lylich->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_lylich->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];

		// C_ORDER_LEVEL
		$t_lylich->C_ORDER_LEVEL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ORDER_LEVEL"]);
		$t_lylich->C_ORDER_LEVEL->AdvancedSearch->SearchOperator = @$_GET["z_C_ORDER_LEVEL"];

		// C_ACTIVE
		$t_lylich->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE"]);
		$t_lylich->C_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE"];

		// C_TIME_ACTIVE
		$t_lylich->C_TIME_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ACTIVE"]);
		$t_lylich->C_TIME_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ACTIVE"];

		// C_ACTIVE_MAINSITE
		$t_lylich->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE_MAINSITE"]);
		$t_lylich->C_ACTIVE_MAINSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE_MAINSITE"];

		// C_TIME_ACTIVEM
		$t_lylich->C_TIME_ACTIVEM->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ACTIVEM"]);
		$t_lylich->C_TIME_ACTIVEM->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ACTIVEM"];

		// C_ORDER_MAIN
		$t_lylich->C_ORDER_MAIN->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ORDER_MAIN"]);
		$t_lylich->C_ORDER_MAIN->AdvancedSearch->SearchOperator = @$_GET["z_C_ORDER_MAIN"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lylich;

		// Call Recordset Selecting event
		$t_lylich->Recordset_Selecting($t_lylich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lylich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lylich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lylich;
		$sFilter = $t_lylich->KeyFilter();

		// Call Row Selecting event
		$t_lylich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lylich->CurrentFilter = $sFilter;
		$sSql = $t_lylich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lylich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lylich;
		$t_lylich->PK_PROFILE_ID->setDbValue($rs->fields('PK_PROFILE_ID'));
		$t_lylich->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_lylich->C_PIC->Upload->DbValue = $rs->fields('C_PIC');
		$t_lylich->C_FULLNAME->setDbValue($rs->fields('C_FULLNAME'));
		$t_lylich->C_POSITION->setDbValue($rs->fields('C_POSITION'));
		$t_lylich->C_WORK_ADDRESS->setDbValue($rs->fields('C_WORK_ADDRESS'));
		$t_lylich->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_lylich->C_PHONE->setDbValue($rs->fields('C_PHONE'));
		$t_lylich->C_BIRTHDAY->setDbValue($rs->fields('C_BIRTHDAY'));
		$t_lylich->C_BLOG->setDbValue($rs->fields('C_BLOG'));
		$t_lylich->C_PERSONAL_PROFILE->setDbValue($rs->fields('C_PERSONAL_PROFILE'));
		$t_lylich->C_EDUCATIION->setDbValue($rs->fields('C_EDUCATIION'));
		$t_lylich->C_SKILLS->setDbValue($rs->fields('C_SKILLS'));
		$t_lylich->C_WORK_EXPERIENCE->setDbValue($rs->fields('C_WORK_EXPERIENCE'));
		$t_lylich->C_SCIENTIFIC_RESEARCH->setDbValue($rs->fields('C_SCIENTIFIC_RESEARCH'));
		$t_lylich->C_REFERENCES->setDbValue($rs->fields('C_REFERENCES'));
		$t_lylich->C_HOBBIES->setDbValue($rs->fields('C_HOBBIES'));
		$t_lylich->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
		$t_lylich->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_lylich->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_lylich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lylich->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lylich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lylich->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_lylich->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
		$t_lylich->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lylich->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_lylich->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_lylich->C_TIME_ACTIVEM->setDbValue($rs->fields('C_TIME_ACTIVEM'));
		$t_lylich->C_ORDER_MAIN->setDbValue($rs->fields('C_ORDER_MAIN'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lylich;

		// Initialize URLs
		$this->ViewUrl = $t_lylich->ViewUrl();
		$this->EditUrl = $t_lylich->EditUrl();
		$this->InlineEditUrl = $t_lylich->InlineEditUrl();
		$this->CopyUrl = $t_lylich->CopyUrl();
		$this->InlineCopyUrl = $t_lylich->InlineCopyUrl();
		$this->DeleteUrl = $t_lylich->DeleteUrl();

		// Call Row_Rendering event
		$t_lylich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_lylich->FK_CONGTY_ID->CellCssStyle = ""; $t_lylich->FK_CONGTY_ID->CellCssClass = "";
		$t_lylich->FK_CONGTY_ID->CellAttrs = array(); $t_lylich->FK_CONGTY_ID->ViewAttrs = array(); $t_lylich->FK_CONGTY_ID->EditAttrs = array();

		// C_PIC
		$t_lylich->C_PIC->CellCssStyle = ""; $t_lylich->C_PIC->CellCssClass = "";
		$t_lylich->C_PIC->CellAttrs = array(); $t_lylich->C_PIC->ViewAttrs = array(); $t_lylich->C_PIC->EditAttrs = array();

		// C_FULLNAME
		$t_lylich->C_FULLNAME->CellCssStyle = ""; $t_lylich->C_FULLNAME->CellCssClass = "";
		$t_lylich->C_FULLNAME->CellAttrs = array(); $t_lylich->C_FULLNAME->ViewAttrs = array(); $t_lylich->C_FULLNAME->EditAttrs = array();

		// C_POSITION
		$t_lylich->C_POSITION->CellCssStyle = ""; $t_lylich->C_POSITION->CellCssClass = "";
		$t_lylich->C_POSITION->CellAttrs = array(); $t_lylich->C_POSITION->ViewAttrs = array(); $t_lylich->C_POSITION->EditAttrs = array();

		// C_WORK_ADDRESS
		$t_lylich->C_WORK_ADDRESS->CellCssStyle = ""; $t_lylich->C_WORK_ADDRESS->CellCssClass = "";
		$t_lylich->C_WORK_ADDRESS->CellAttrs = array(); $t_lylich->C_WORK_ADDRESS->ViewAttrs = array(); $t_lylich->C_WORK_ADDRESS->EditAttrs = array();

		// C_EMAIL
		$t_lylich->C_EMAIL->CellCssStyle = ""; $t_lylich->C_EMAIL->CellCssClass = "";
		$t_lylich->C_EMAIL->CellAttrs = array(); $t_lylich->C_EMAIL->ViewAttrs = array(); $t_lylich->C_EMAIL->EditAttrs = array();

		// C_PHONE
		$t_lylich->C_PHONE->CellCssStyle = ""; $t_lylich->C_PHONE->CellCssClass = "";
		$t_lylich->C_PHONE->CellAttrs = array(); $t_lylich->C_PHONE->ViewAttrs = array(); $t_lylich->C_PHONE->EditAttrs = array();

		// C_BIRTHDAY
		$t_lylich->C_BIRTHDAY->CellCssStyle = ""; $t_lylich->C_BIRTHDAY->CellCssClass = "";
		$t_lylich->C_BIRTHDAY->CellAttrs = array(); $t_lylich->C_BIRTHDAY->ViewAttrs = array(); $t_lylich->C_BIRTHDAY->EditAttrs = array();

		// C_TEMPLATE
		$t_lylich->C_TEMPLATE->CellCssStyle = ""; $t_lylich->C_TEMPLATE->CellCssClass = "";
		$t_lylich->C_TEMPLATE->CellAttrs = array(); $t_lylich->C_TEMPLATE->ViewAttrs = array(); $t_lylich->C_TEMPLATE->EditAttrs = array();

		// C_STATUS
		$t_lylich->C_STATUS->CellCssStyle = ""; $t_lylich->C_STATUS->CellCssClass = "";
		$t_lylich->C_STATUS->CellAttrs = array(); $t_lylich->C_STATUS->ViewAttrs = array(); $t_lylich->C_STATUS->EditAttrs = array();

		// C_ORDER_LEVEL
		$t_lylich->C_ORDER_LEVEL->CellCssStyle = ""; $t_lylich->C_ORDER_LEVEL->CellCssClass = "";
		$t_lylich->C_ORDER_LEVEL->CellAttrs = array(); $t_lylich->C_ORDER_LEVEL->ViewAttrs = array(); $t_lylich->C_ORDER_LEVEL->EditAttrs = array();

		// C_ACTIVE
		$t_lylich->C_ACTIVE->CellCssStyle = ""; $t_lylich->C_ACTIVE->CellCssClass = "";
		$t_lylich->C_ACTIVE->CellAttrs = array(); $t_lylich->C_ACTIVE->ViewAttrs = array(); $t_lylich->C_ACTIVE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_lylich->C_TIME_ACTIVE->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVE->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVE->CellAttrs = array(); $t_lylich->C_TIME_ACTIVE->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_lylich->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_lylich->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_lylich->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVEM
		$t_lylich->C_TIME_ACTIVEM->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVEM->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVEM->CellAttrs = array(); $t_lylich->C_TIME_ACTIVEM->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVEM->EditAttrs = array();
		if ($t_lylich->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_PROFILE_ID
			$t_lylich->PK_PROFILE_ID->ViewValue = $t_lylich->PK_PROFILE_ID->CurrentValue;
			$t_lylich->PK_PROFILE_ID->CssStyle = "";
			$t_lylich->PK_PROFILE_ID->CssClass = "";
			$t_lylich->PK_PROFILE_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_lylich->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lylich->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lylich->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lylich->FK_CONGTY_ID->ViewValue = $t_lylich->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_lylich->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_lylich->FK_CONGTY_ID->CssStyle = "";
			$t_lylich->FK_CONGTY_ID->CssClass = "";
			$t_lylich->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->ViewValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->ViewValue = "";
			}
			$t_lylich->C_PIC->CssStyle = "";
			$t_lylich->C_PIC->CssClass = "";
			$t_lylich->C_PIC->ViewCustomAttributes = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->ViewValue = $t_lylich->C_FULLNAME->CurrentValue;
			$t_lylich->C_FULLNAME->CssStyle = "";
			$t_lylich->C_FULLNAME->CssClass = "";
			$t_lylich->C_FULLNAME->ViewCustomAttributes = "";

			// C_POSITION
			$t_lylich->C_POSITION->ViewValue = $t_lylich->C_POSITION->CurrentValue;
			$t_lylich->C_POSITION->CssStyle = "";
			$t_lylich->C_POSITION->CssClass = "";
			$t_lylich->C_POSITION->ViewCustomAttributes = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->ViewValue = $t_lylich->C_WORK_ADDRESS->CurrentValue;
			$t_lylich->C_WORK_ADDRESS->CssStyle = "";
			$t_lylich->C_WORK_ADDRESS->CssClass = "";
			$t_lylich->C_WORK_ADDRESS->ViewCustomAttributes = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->ViewValue = $t_lylich->C_EMAIL->CurrentValue;
			$t_lylich->C_EMAIL->CssStyle = "";
			$t_lylich->C_EMAIL->CssClass = "";
			$t_lylich->C_EMAIL->ViewCustomAttributes = "";

			// C_PHONE
			$t_lylich->C_PHONE->ViewValue = $t_lylich->C_PHONE->CurrentValue;
			$t_lylich->C_PHONE->CssStyle = "";
			$t_lylich->C_PHONE->CssClass = "";
			$t_lylich->C_PHONE->ViewCustomAttributes = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->ViewValue = $t_lylich->C_BIRTHDAY->CurrentValue;
			$t_lylich->C_BIRTHDAY->CssStyle = "";
			$t_lylich->C_BIRTHDAY->CssClass = "";
			$t_lylich->C_BIRTHDAY->ViewCustomAttributes = "";

			// C_BLOG
			$t_lylich->C_BLOG->ViewValue = $t_lylich->C_BLOG->CurrentValue;
			$t_lylich->C_BLOG->CssStyle = "";
			$t_lylich->C_BLOG->CssClass = "";
			$t_lylich->C_BLOG->ViewCustomAttributes = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->ViewValue = $t_lylich->C_PERSONAL_PROFILE->CurrentValue;
			$t_lylich->C_PERSONAL_PROFILE->CssStyle = "";
			$t_lylich->C_PERSONAL_PROFILE->CssClass = "";
			$t_lylich->C_PERSONAL_PROFILE->ViewCustomAttributes = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->ViewValue = $t_lylich->C_EDUCATIION->CurrentValue;
			$t_lylich->C_EDUCATIION->CssStyle = "";
			$t_lylich->C_EDUCATIION->CssClass = "";
			$t_lylich->C_EDUCATIION->ViewCustomAttributes = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->ViewValue = $t_lylich->C_SKILLS->CurrentValue;
			$t_lylich->C_SKILLS->CssStyle = "";
			$t_lylich->C_SKILLS->CssClass = "";
			$t_lylich->C_SKILLS->ViewCustomAttributes = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->ViewValue = $t_lylich->C_WORK_EXPERIENCE->CurrentValue;
			$t_lylich->C_WORK_EXPERIENCE->CssStyle = "";
			$t_lylich->C_WORK_EXPERIENCE->CssClass = "";
			$t_lylich->C_WORK_EXPERIENCE->ViewCustomAttributes = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewValue = $t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue;
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssStyle = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssClass = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewCustomAttributes = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->ViewValue = $t_lylich->C_REFERENCES->CurrentValue;
			$t_lylich->C_REFERENCES->CssStyle = "";
			$t_lylich->C_REFERENCES->CssClass = "";
			$t_lylich->C_REFERENCES->ViewCustomAttributes = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->ViewValue = $t_lylich->C_HOBBIES->CurrentValue;
			$t_lylich->C_HOBBIES->CssStyle = "";
			$t_lylich->C_HOBBIES->CssClass = "";
			$t_lylich->C_HOBBIES->ViewCustomAttributes = "";

			// C_TEMPLATE
			if (strval($t_lylich->C_TEMPLATE->CurrentValue) <> "") {
				switch ($t_lylich->C_TEMPLATE->CurrentValue) {
					case "1":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 1";
						break;
					case "2":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 2";
						break;
					default:
						$t_lylich->C_TEMPLATE->ViewValue = $t_lylich->C_TEMPLATE->CurrentValue;
				}
			} else {
				$t_lylich->C_TEMPLATE->ViewValue = NULL;
			}
			$t_lylich->C_TEMPLATE->CssStyle = "";
			$t_lylich->C_TEMPLATE->CssClass = "";
			$t_lylich->C_TEMPLATE->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_lylich->C_STATUS->CurrentValue) <> "") {
				switch ($t_lylich->C_STATUS->CurrentValue) {
					case "0":
						$t_lylich->C_STATUS->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_lylich->C_STATUS->ViewValue = "Kích hoạt";
						break;
					default:
						$t_lylich->C_STATUS->ViewValue = $t_lylich->C_STATUS->CurrentValue;
				}
			} else {
				$t_lylich->C_STATUS->ViewValue = NULL;
			}
			$t_lylich->C_STATUS->CssStyle = "";
			$t_lylich->C_STATUS->CssClass = "";
			$t_lylich->C_STATUS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lylich->C_USER_ADD->ViewValue = $t_lylich->C_USER_ADD->CurrentValue;
			$t_lylich->C_USER_ADD->CssStyle = "";
			$t_lylich->C_USER_ADD->CssClass = "";
			$t_lylich->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lylich->C_ADD_TIME->ViewValue = $t_lylich->C_ADD_TIME->CurrentValue;
			$t_lylich->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_ADD_TIME->ViewValue, 7);
			$t_lylich->C_ADD_TIME->CssStyle = "";
			$t_lylich->C_ADD_TIME->CssClass = "";
			$t_lylich->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->ViewValue = $t_lylich->C_USER_EDIT->CurrentValue;
			$t_lylich->C_USER_EDIT->CssStyle = "";
			$t_lylich->C_USER_EDIT->CssClass = "";
			$t_lylich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->ViewValue = $t_lylich->C_EDIT_TIME->CurrentValue;
			$t_lylich->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_EDIT_TIME->ViewValue, 7);
			$t_lylich->C_EDIT_TIME->CssStyle = "";
			$t_lylich->C_EDIT_TIME->CssClass = "";
			$t_lylich->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->ViewValue = $t_lylich->C_ORDER_LEVEL->CurrentValue;
			$t_lylich->C_ORDER_LEVEL->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_LEVEL->ViewValue, 7);
			$t_lylich->C_ORDER_LEVEL->CssStyle = "";
			$t_lylich->C_ORDER_LEVEL->CssClass = "";
			$t_lylich->C_ORDER_LEVEL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lylich->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE->ViewValue = "Không kích hoạt <img alt=\"Không kích hoạt\" src=\"images\delete.jpg\">";
						break;
					case "1":
						$t_lylich->C_ACTIVE->ViewValue = "Kích hoạt <img alt=\"Kích hoạt\" src=\"images\icon-xac-thuc.jpg\">";
						break;
                                        case "2":
						$t_lylich->C_ACTIVE->ViewValue = "Chờ xét <img alt=\"Chờ xét\" src=\"images\choduyet.jpg\">";
						break;
					default:
						$t_lylich->C_ACTIVE->ViewValue = $t_lylich->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE->CssStyle = "";
			$t_lylich->C_ACTIVE->CssClass = "";
			$t_lylich->C_ACTIVE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->ViewValue = $t_lylich->C_TIME_ACTIVE->CurrentValue;
			$t_lylich->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVE->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVE->CssStyle = "";
			$t_lylich->C_TIME_ACTIVE->CssClass = "";
			$t_lylich->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Không active mainsite";
						break;
					case "1":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Active mainsite";
						break;
					case "2":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Xác nhận";
						break;
					default:
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = $t_lylich->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_lylich->C_ACTIVE_MAINSITE->CssClass = "";
			$t_lylich->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->ViewValue = $t_lylich->C_TIME_ACTIVEM->CurrentValue;
			$t_lylich->C_TIME_ACTIVEM->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVEM->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVEM->CssStyle = "";
			$t_lylich->C_TIME_ACTIVEM->CssClass = "";
			$t_lylich->C_TIME_ACTIVEM->ViewCustomAttributes = "";

			// C_ORDER_MAIN
			$t_lylich->C_ORDER_MAIN->ViewValue = $t_lylich->C_ORDER_MAIN->CurrentValue;
			$t_lylich->C_ORDER_MAIN->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_MAIN->ViewValue, 7);
			$t_lylich->C_ORDER_MAIN->CssStyle = "";
			$t_lylich->C_ORDER_MAIN->CssClass = "";
			$t_lylich->C_ORDER_MAIN->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->HrefValue = "";
			$t_lylich->FK_CONGTY_ID->TooltipValue = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $t_lylich->C_PIC->UploadPath) . ((!empty($t_lylich->C_PIC->ViewValue)) ? $t_lylich->C_PIC->ViewValue : $t_lylich->C_PIC->CurrentValue);
				if ($t_lylich->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($t_lylich->C_PIC->HrefValue);
			} else {
				$t_lylich->C_PIC->HrefValue = "";
			}
			$t_lylich->C_PIC->TooltipValue = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->HrefValue = "";
			$t_lylich->C_FULLNAME->TooltipValue = "";

			// C_POSITION
			$t_lylich->C_POSITION->HrefValue = "";
			$t_lylich->C_POSITION->TooltipValue = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->HrefValue = "";
			$t_lylich->C_WORK_ADDRESS->TooltipValue = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->HrefValue = "";
			$t_lylich->C_EMAIL->TooltipValue = "";

			// C_PHONE
			$t_lylich->C_PHONE->HrefValue = "";
			$t_lylich->C_PHONE->TooltipValue = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->HrefValue = "";
			$t_lylich->C_BIRTHDAY->TooltipValue = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";
			$t_lylich->C_TEMPLATE->TooltipValue = "";

			// C_STATUS
			$t_lylich->C_STATUS->HrefValue = "";
			$t_lylich->C_STATUS->TooltipValue = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->HrefValue = "";
			$t_lylich->C_ORDER_LEVEL->TooltipValue = "";

			// C_ACTIVE
			$t_lylich->C_ACTIVE->HrefValue = "";
			$t_lylich->C_ACTIVE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->HrefValue = "";
			$t_lylich->C_TIME_ACTIVE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_lylich->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->HrefValue = "";
			$t_lylich->C_TIME_ACTIVEM->TooltipValue = "";
		} elseif ($t_lylich->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->EditCustomAttributes = "";

			// C_PIC
			$t_lylich->C_PIC->EditCustomAttributes = "";
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->EditValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->EditValue = "";
			}

			// C_FULLNAME
			$t_lylich->C_FULLNAME->EditCustomAttributes = "";
			$t_lylich->C_FULLNAME->EditValue = ew_HtmlEncode($t_lylich->C_FULLNAME->AdvancedSearch->SearchValue);

			// C_POSITION
			$t_lylich->C_POSITION->EditCustomAttributes = "";
			$t_lylich->C_POSITION->EditValue = ew_HtmlEncode($t_lylich->C_POSITION->AdvancedSearch->SearchValue);

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->EditCustomAttributes = "";
			$t_lylich->C_WORK_ADDRESS->EditValue = ew_HtmlEncode($t_lylich->C_WORK_ADDRESS->AdvancedSearch->SearchValue);

			// C_EMAIL
			$t_lylich->C_EMAIL->EditCustomAttributes = "";
			$t_lylich->C_EMAIL->EditValue = ew_HtmlEncode($t_lylich->C_EMAIL->AdvancedSearch->SearchValue);

			// C_PHONE
			$t_lylich->C_PHONE->EditCustomAttributes = "";
			$t_lylich->C_PHONE->EditValue = ew_HtmlEncode($t_lylich->C_PHONE->AdvancedSearch->SearchValue);

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->EditCustomAttributes = "";
			$t_lylich->C_BIRTHDAY->EditValue = ew_HtmlEncode($t_lylich->C_BIRTHDAY->AdvancedSearch->SearchValue);

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Template 1");
			$arwrk[] = array("2", "Template 2");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lylich->C_TEMPLATE->EditValue = $arwrk;

			// C_STATUS
			$t_lylich->C_STATUS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat");
			$arwrk[] = array("1", "Kich hoat");
			$t_lylich->C_STATUS->EditValue = $arwrk;

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->EditCustomAttributes = "";
			$t_lylich->C_ORDER_LEVEL->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lylich->C_ORDER_LEVEL->AdvancedSearch->SearchValue, 7), 7));

			// C_ACTIVE
			$t_lylich->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong kich hoat");
			$arwrk[] = array("1", "Kich hoat");
			$t_lylich->C_ACTIVE->EditValue = $arwrk;

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->EditCustomAttributes = "";
			$t_lylich->C_TIME_ACTIVE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lylich->C_TIME_ACTIVE->AdvancedSearch->SearchValue, 7), 7));

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong active mainsite");
			$arwrk[] = array("1", "Active mainsite");
			$arwrk[] = array("2", "Xac nhan");
			$t_lylich->C_ACTIVE_MAINSITE->EditValue = $arwrk;

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->EditCustomAttributes = "";
			$t_lylich->C_TIME_ACTIVEM->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_lylich->C_TIME_ACTIVEM->AdvancedSearch->SearchValue, 7), 7));
		}

		// Call Row Rendered event
		if ($t_lylich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lylich->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_lylich;

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
		global $t_lylich;
		$t_lylich->PK_PROFILE_ID->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_PK_PROFILE_ID");
		$t_lylich->FK_CONGTY_ID->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_FK_CONGTY_ID");
		$t_lylich->C_FULLNAME->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_FULLNAME");
		$t_lylich->C_POSITION->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_POSITION");
		$t_lylich->C_WORK_ADDRESS->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_WORK_ADDRESS");
		$t_lylich->C_EMAIL->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_EMAIL");
		$t_lylich->C_PHONE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_PHONE");
		$t_lylich->C_BIRTHDAY->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_BIRTHDAY");
		$t_lylich->C_BLOG->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_BLOG");
		$t_lylich->C_PERSONAL_PROFILE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_PERSONAL_PROFILE");
		$t_lylich->C_EDUCATIION->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_EDUCATIION");
		$t_lylich->C_SKILLS->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_SKILLS");
		$t_lylich->C_WORK_EXPERIENCE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_WORK_EXPERIENCE");
		$t_lylich->C_SCIENTIFIC_RESEARCH->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_SCIENTIFIC_RESEARCH");
		$t_lylich->C_REFERENCES->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_REFERENCES");
		$t_lylich->C_HOBBIES->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_HOBBIES");
		$t_lylich->C_TEMPLATE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_TEMPLATE");
		$t_lylich->C_STATUS->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_STATUS");
		$t_lylich->C_NOTE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_NOTE");
		$t_lylich->C_USER_ADD->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_USER_ADD");
		$t_lylich->C_ADD_TIME->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_ADD_TIME");
		$t_lylich->C_USER_EDIT->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_USER_EDIT");
		$t_lylich->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_EDIT_TIME");
		$t_lylich->C_ORDER_LEVEL->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_ORDER_LEVEL");
		$t_lylich->C_ACTIVE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_ACTIVE");
		$t_lylich->C_TIME_ACTIVE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_TIME_ACTIVE");
		$t_lylich->C_ACTIVE_MAINSITE->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_ACTIVE_MAINSITE");
		$t_lylich->C_TIME_ACTIVEM->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_TIME_ACTIVEM");
		$t_lylich->C_ORDER_MAIN->AdvancedSearch->SearchValue = $t_lylich->getAdvancedSearch("x_C_ORDER_MAIN");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_lylich;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_lylich->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_lylich->ExportAll) {
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
		if ($t_lylich->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_lylich, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_lylich->PK_PROFILE_ID);
				$ExportDoc->ExportCaption($t_lylich->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_lylich->C_PIC);
				$ExportDoc->ExportCaption($t_lylich->C_FULLNAME);
				$ExportDoc->ExportCaption($t_lylich->C_POSITION);
				$ExportDoc->ExportCaption($t_lylich->C_WORK_ADDRESS);
				$ExportDoc->ExportCaption($t_lylich->C_EMAIL);
				$ExportDoc->ExportCaption($t_lylich->C_PHONE);
				$ExportDoc->ExportCaption($t_lylich->C_BIRTHDAY);
				$ExportDoc->ExportCaption($t_lylich->C_BLOG);
				$ExportDoc->ExportCaption($t_lylich->C_PERSONAL_PROFILE);
				$ExportDoc->ExportCaption($t_lylich->C_EDUCATIION);
				$ExportDoc->ExportCaption($t_lylich->C_SKILLS);
				$ExportDoc->ExportCaption($t_lylich->C_WORK_EXPERIENCE);
				$ExportDoc->ExportCaption($t_lylich->C_SCIENTIFIC_RESEARCH);
				$ExportDoc->ExportCaption($t_lylich->C_REFERENCES);
				$ExportDoc->ExportCaption($t_lylich->C_HOBBIES);
				$ExportDoc->ExportCaption($t_lylich->C_TEMPLATE);
				$ExportDoc->ExportCaption($t_lylich->C_STATUS);
				$ExportDoc->ExportCaption($t_lylich->C_USER_ADD);
				$ExportDoc->ExportCaption($t_lylich->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_lylich->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_lylich->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_lylich->C_ORDER_LEVEL);
				$ExportDoc->ExportCaption($t_lylich->C_TIME_ACTIVE);
				$ExportDoc->ExportCaption($t_lylich->C_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_lylich->C_TIME_ACTIVEM);
				$ExportDoc->ExportCaption($t_lylich->C_ORDER_MAIN);
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
				$t_lylich->CssClass = "";
				$t_lylich->CssStyle = "";
				$t_lylich->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_lylich->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_PROFILE_ID', $t_lylich->PK_PROFILE_ID->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_lylich->FK_CONGTY_ID->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PIC', $t_lylich->C_PIC->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_FULLNAME', $t_lylich->C_FULLNAME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_POSITION', $t_lylich->C_POSITION->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_WORK_ADDRESS', $t_lylich->C_WORK_ADDRESS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $t_lylich->C_EMAIL->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PHONE', $t_lylich->C_PHONE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_BIRTHDAY', $t_lylich->C_BIRTHDAY->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_BLOG', $t_lylich->C_BLOG->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PERSONAL_PROFILE', $t_lylich->C_PERSONAL_PROFILE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EDUCATIION', $t_lylich->C_EDUCATIION->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_SKILLS', $t_lylich->C_SKILLS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_WORK_EXPERIENCE', $t_lylich->C_WORK_EXPERIENCE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_SCIENTIFIC_RESEARCH', $t_lylich->C_SCIENTIFIC_RESEARCH->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_REFERENCES', $t_lylich->C_REFERENCES->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_HOBBIES', $t_lylich->C_HOBBIES->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TEMPLATE', $t_lylich->C_TEMPLATE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS', $t_lylich->C_STATUS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_lylich->C_USER_ADD->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_lylich->C_ADD_TIME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_lylich->C_USER_EDIT->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_lylich->C_EDIT_TIME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_LEVEL', $t_lylich->C_ORDER_LEVEL->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE', $t_lylich->C_TIME_ACTIVE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_MAINSITE', $t_lylich->C_ACTIVE_MAINSITE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVEM', $t_lylich->C_TIME_ACTIVEM->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_MAIN', $t_lylich->C_ORDER_MAIN->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_lylich->PK_PROFILE_ID);
					$ExportDoc->ExportField($t_lylich->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_lylich->C_PIC);
					$ExportDoc->ExportField($t_lylich->C_FULLNAME);
					$ExportDoc->ExportField($t_lylich->C_POSITION);
					$ExportDoc->ExportField($t_lylich->C_WORK_ADDRESS);
					$ExportDoc->ExportField($t_lylich->C_EMAIL);
					$ExportDoc->ExportField($t_lylich->C_PHONE);
					$ExportDoc->ExportField($t_lylich->C_BIRTHDAY);
					$ExportDoc->ExportField($t_lylich->C_BLOG);
					$ExportDoc->ExportField($t_lylich->C_PERSONAL_PROFILE);
					$ExportDoc->ExportField($t_lylich->C_EDUCATIION);
					$ExportDoc->ExportField($t_lylich->C_SKILLS);
					$ExportDoc->ExportField($t_lylich->C_WORK_EXPERIENCE);
					$ExportDoc->ExportField($t_lylich->C_SCIENTIFIC_RESEARCH);
					$ExportDoc->ExportField($t_lylich->C_REFERENCES);
					$ExportDoc->ExportField($t_lylich->C_HOBBIES);
					$ExportDoc->ExportField($t_lylich->C_TEMPLATE);
					$ExportDoc->ExportField($t_lylich->C_STATUS);
					$ExportDoc->ExportField($t_lylich->C_USER_ADD);
					$ExportDoc->ExportField($t_lylich->C_ADD_TIME);
					$ExportDoc->ExportField($t_lylich->C_USER_EDIT);
					$ExportDoc->ExportField($t_lylich->C_EDIT_TIME);
					$ExportDoc->ExportField($t_lylich->C_ORDER_LEVEL);
					$ExportDoc->ExportField($t_lylich->C_TIME_ACTIVE);
					$ExportDoc->ExportField($t_lylich->C_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_lylich->C_TIME_ACTIVEM);
					$ExportDoc->ExportField($t_lylich->C_ORDER_MAIN);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_lylich->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_lylich->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_lylich->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_lylich->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_lylich->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_lylich;
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
		if ($t_lylich->Email_Sending($Email, $EventArgs))
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
		global $t_lylich;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_lylich->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_lylich->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_lylich->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_lylich->PK_PROFILE_ID); // PK_PROFILE_ID
		$this->AddSearchQueryString($sQry, $t_lylich->FK_CONGTY_ID); // FK_CONGTY_ID
		$this->AddSearchQueryString($sQry, $t_lylich->C_FULLNAME); // C_FULLNAME
		$this->AddSearchQueryString($sQry, $t_lylich->C_POSITION); // C_POSITION
		$this->AddSearchQueryString($sQry, $t_lylich->C_WORK_ADDRESS); // C_WORK_ADDRESS
		$this->AddSearchQueryString($sQry, $t_lylich->C_EMAIL); // C_EMAIL
		$this->AddSearchQueryString($sQry, $t_lylich->C_PHONE); // C_PHONE
		$this->AddSearchQueryString($sQry, $t_lylich->C_BIRTHDAY); // C_BIRTHDAY
		$this->AddSearchQueryString($sQry, $t_lylich->C_BLOG); // C_BLOG
		$this->AddSearchQueryString($sQry, $t_lylich->C_PERSONAL_PROFILE); // C_PERSONAL_PROFILE
		$this->AddSearchQueryString($sQry, $t_lylich->C_EDUCATIION); // C_EDUCATIION
		$this->AddSearchQueryString($sQry, $t_lylich->C_SKILLS); // C_SKILLS
		$this->AddSearchQueryString($sQry, $t_lylich->C_WORK_EXPERIENCE); // C_WORK_EXPERIENCE
		$this->AddSearchQueryString($sQry, $t_lylich->C_SCIENTIFIC_RESEARCH); // C_SCIENTIFIC_RESEARCH
		$this->AddSearchQueryString($sQry, $t_lylich->C_REFERENCES); // C_REFERENCES
		$this->AddSearchQueryString($sQry, $t_lylich->C_HOBBIES); // C_HOBBIES
		$this->AddSearchQueryString($sQry, $t_lylich->C_TEMPLATE); // C_TEMPLATE
		$this->AddSearchQueryString($sQry, $t_lylich->C_STATUS); // C_STATUS
		$this->AddSearchQueryString($sQry, $t_lylich->C_NOTE); // C_NOTE
		$this->AddSearchQueryString($sQry, $t_lylich->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_lylich->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_lylich->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_lylich->C_EDIT_TIME); // C_EDIT_TIME
		$this->AddSearchQueryString($sQry, $t_lylich->C_ORDER_LEVEL); // C_ORDER_LEVEL
		$this->AddSearchQueryString($sQry, $t_lylich->C_ACTIVE); // C_ACTIVE
		$this->AddSearchQueryString($sQry, $t_lylich->C_TIME_ACTIVE); // C_TIME_ACTIVE
		$this->AddSearchQueryString($sQry, $t_lylich->C_ACTIVE_MAINSITE); // C_ACTIVE_MAINSITE
		$this->AddSearchQueryString($sQry, $t_lylich->C_TIME_ACTIVEM); // C_TIME_ACTIVEM
		$this->AddSearchQueryString($sQry, $t_lylich->C_ORDER_MAIN); // C_ORDER_MAIN

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_lylich->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_lylich->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_lylich;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_lylich->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_lylich->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_lylich->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_lylich->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_lylich->GetAdvancedSearch("w_" . $FldParm);
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
