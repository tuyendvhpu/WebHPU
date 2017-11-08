<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_bpdungnlinfo.php" ?>
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
$t_bpdungnl_list = new ct_bpdungnl_list();
$Page =& $t_bpdungnl_list;

// Page init
$t_bpdungnl_list->Page_Init();

// Page main
$t_bpdungnl_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_bpdungnl->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_bpdungnl_list = new ew_Page("t_bpdungnl_list");

// page properties
t_bpdungnl_list.PageID = "list"; // page ID
t_bpdungnl_list.FormID = "ft_bpdungnllist"; // form ID
var EW_PAGE_ID = t_bpdungnl_list.PageID; // for backward compatibility

// extend page with validate function for search
t_bpdungnl_list.ValidateSearch = function(fobj) {
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
t_bpdungnl_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_bpdungnl_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_bpdungnl_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_bpdungnl_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<?php if ($t_bpdungnl->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_bpdungnl_list->lTotalRecs = $t_bpdungnl->SelectRecordCount();
	} else {
		if ($rs = $t_bpdungnl_list->LoadRecordset())
			$t_bpdungnl_list->lTotalRecs = $rs->RecordCount();
	}
	$t_bpdungnl_list->lStartRec = 1;
	if ($t_bpdungnl_list->lDisplayRecs <= 0 || ($t_bpdungnl->Export <> "" && $t_bpdungnl->ExportAll)) // Display all records
		$t_bpdungnl_list->lDisplayRecs = $t_bpdungnl_list->lTotalRecs;
	if (!($t_bpdungnl->Export <> "" && $t_bpdungnl->ExportAll))
		$t_bpdungnl_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_bpdungnl_list->LoadRecordset($t_bpdungnl_list->lStartRec-1, $t_bpdungnl_list->lDisplayRecs);
?>


<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $t_bpdungnl->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker" style="white-space: nowrap;">
<?php if ($t_bpdungnl->Export == "" && $t_bpdungnl->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_bpdungnl" id="emf_t_bpdungnl" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_bpdungnl',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_bpdungnllist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch() && $Security->CanSearchex()) { ?>
<?php if ($t_bpdungnl->Export == "" && $t_bpdungnl->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_bpdungnl_list);" style="text-decoration: none;"><img id="t_bpdungnl_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_bpdungnl_list_SearchPanel">
<form name="ft_bpdungnllistsrch" id="ft_bpdungnllistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_bpdungnl_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_bpdungnl">
<?php
if ($gsSearchError == "")
	$t_bpdungnl_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_bpdungnl->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_bpdungnl_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_bpdungnl->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_bpdungnl->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_bpdungnl->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_bpdungnl->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
<?php if (IsAdmin()) { ?>
    <tr>
		<td><span class="phpmaker"><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_MACONGTY" id="z_FK_MACONGTY" value="="></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $t_bpdungnl->FK_MACONGTY->FldTitle() ?>"<?php echo $t_bpdungnl->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($t_bpdungnl->FK_MACONGTY->EditValue)) {
	$arwrk = $t_bpdungnl->FK_MACONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_bpdungnl->FK_MACONGTY->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } ?>
	<tr>
		<td><span class="phpmaker"><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_LOAINHIENLIEU" id="z_FK_LOAINHIENLIEU" value="="></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_LOAINHIENLIEU" name="x_FK_LOAINHIENLIEU" title="<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldTitle() ?>"<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->EditAttributes() ?>>
<?php
if (is_array($t_bpdungnl->FK_LOAINHIENLIEU->EditValue)) {
	$arwrk = $t_bpdungnl->FK_LOAINHIENLIEU->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_bpdungnl->FK_LOAINHIENLIEU->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_bpdungnl_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_bpdungnl->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_bpdungnl->CurrentAction <> "gridadd" && $t_bpdungnl->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_bpdungnl_list->Pager)) $t_bpdungnl_list->Pager = new cNumericPager($t_bpdungnl_list->lStartRec, $t_bpdungnl_list->lDisplayRecs, $t_bpdungnl_list->lTotalRecs, $t_bpdungnl_list->lRecRange) ?>
<?php if ($t_bpdungnl_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_bpdungnl_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_bpdungnl_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList() && $Security->CanListex()) { ?>
	<?php if ($t_bpdungnl_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_bpdungnl">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_bpdungnl_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_bpdungnl_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_bpdungnl_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_bpdungnl->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
<a href="<?php echo $t_bpdungnl_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_bpdungnllist, '<?php echo $t_bpdungnl_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_bpdungnllist" id="ft_bpdungnllist" class="ewForm" action="" method="post">
<div id="gmp_t_bpdungnl" class="ewGridMiddlePanel">
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_bpdungnl->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_bpdungnl_list->RenderListOptions();

// Render list options (header, left)
$t_bpdungnl_list->ListOptions->Render("header", "left");
?>
<?php if ($t_bpdungnl->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
	<?php if ($t_bpdungnl->SortUrl($t_bpdungnl->FK_MACONGTY) == "") { ?>
		<td><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_bpdungnl->SortUrl($t_bpdungnl->FK_MACONGTY) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_bpdungnl->FK_MACONGTY->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_bpdungnl->FK_MACONGTY->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_bpdungnl->C_NAM->Visible) { // C_NAM ?>
	<?php if ($t_bpdungnl->SortUrl($t_bpdungnl->C_NAM) == "") { ?>
		<td><?php echo $t_bpdungnl->C_NAM->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_bpdungnl->SortUrl($t_bpdungnl->C_NAM) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_bpdungnl->C_NAM->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_bpdungnl->C_NAM->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_bpdungnl->C_NAM->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_bpdungnl->C_TENBP->Visible) { // C_TENBP ?>
	<?php if ($t_bpdungnl->SortUrl($t_bpdungnl->C_TENBP) == "") { ?>
		<td><?php echo $t_bpdungnl->C_TENBP->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_bpdungnl->SortUrl($t_bpdungnl->C_TENBP) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_bpdungnl->C_TENBP->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_bpdungnl->C_TENBP->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_bpdungnl->C_TENBP->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_bpdungnl->FK_LOAINHIENLIEU->Visible) { // FK_LOAINHIENLIEU ?>
	<?php if ($t_bpdungnl->SortUrl($t_bpdungnl->FK_LOAINHIENLIEU) == "") { ?>
		<td><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_bpdungnl->SortUrl($t_bpdungnl->FK_LOAINHIENLIEU) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_bpdungnl->FK_LOAINHIENLIEU->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_bpdungnl->FK_LOAINHIENLIEU->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>
                <?php if ($t_bpdungnl->C_SOLUONG->Visible) { // FK_LOAINHIENLIEU ?>
	<?php if ($t_bpdungnl->SortUrl($t_bpdungnl->C_SOLUONG) == "") { ?>
		<td><?php echo $t_bpdungnl->C_SOLUONG->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_bpdungnl->SortUrl($t_bpdungnl->C_SOLUONG) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_bpdungnl->C_SOLUONG->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_bpdungnl->FK_LOAINHIENLIEU->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_bpdungnl->C_SOLUONG->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t_bpdungnl_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_bpdungnl->ExportAll && $t_bpdungnl->Export <> "") {
	$t_bpdungnl_list->lStopRec = $t_bpdungnl_list->lTotalRecs;
} else {
	$t_bpdungnl_list->lStopRec = $t_bpdungnl_list->lStartRec + $t_bpdungnl_list->lDisplayRecs - 1; // Set the last record to display
}
$t_bpdungnl_list->lRecCount = $t_bpdungnl_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_bpdungnl_list->lStartRec > 1)
		$rs->Move($t_bpdungnl_list->lStartRec - 1);
}

// Initialize aggregate
$t_bpdungnl->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_bpdungnl_list->RenderRow();
$t_bpdungnl_list->lRowCnt = 0;
while (($t_bpdungnl->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_bpdungnl_list->lRecCount < $t_bpdungnl_list->lStopRec) {
	$t_bpdungnl_list->lRecCount++;
	if (intval($t_bpdungnl_list->lRecCount) >= intval($t_bpdungnl_list->lStartRec)) {
		$t_bpdungnl_list->lRowCnt++;

	// Init row class and style
	$t_bpdungnl->CssClass = "";
	$t_bpdungnl->CssStyle = "";
	$t_bpdungnl->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_bpdungnl->CurrentAction == "gridadd") {
		$t_bpdungnl_list->LoadDefaultValues(); // Load default values
	} else {
		$t_bpdungnl_list->LoadRowValues($rs); // Load row values
	}
	$t_bpdungnl->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_bpdungnl_list->RenderRow();

	// Render list options
	$t_bpdungnl_list->RenderListOptions();
?>
	<tr<?php echo $t_bpdungnl->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_bpdungnl_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_bpdungnl->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
		<td<?php echo $t_bpdungnl->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_MACONGTY->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_MACONGTY->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_bpdungnl->C_NAM->Visible) { // C_NAM ?>
		<td<?php echo $t_bpdungnl->C_NAM->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_NAM->ViewAttributes() ?>><?php echo $t_bpdungnl->C_NAM->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_bpdungnl->C_TENBP->Visible) { // C_TENBP ?>
		<td<?php echo $t_bpdungnl->C_TENBP->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_TENBP->ViewAttributes() ?>><?php echo $t_bpdungnl->C_TENBP->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_bpdungnl->FK_LOAINHIENLIEU->Visible) { // FK_LOAINHIENLIEU ?>
		<td<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ListViewValue() ?></div>
</td>
	<?php } ?>
   	<?php if ($t_bpdungnl->C_SOLUONG->Visible) { // FK_LOAINHIENLIEU ?>
		<td<?php echo $t_bpdungnl->C_SOLUONG->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_SOLUONG->ViewAttributes() ?>><?php echo $t_bpdungnl->C_SOLUONG->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_bpdungnl_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_bpdungnl->CurrentAction <> "gridadd")
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
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
<?php if ($t_bpdungnl->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_bpdungnl->CurrentAction <> "gridadd" && $t_bpdungnl->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_bpdungnl_list->Pager)) $t_bpdungnl_list->Pager = new cNumericPager($t_bpdungnl_list->lStartRec, $t_bpdungnl_list->lDisplayRecs, $t_bpdungnl_list->lTotalRecs, $t_bpdungnl_list->lRecRange) ?>
<?php if ($t_bpdungnl_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_bpdungnl_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_bpdungnl_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_list->PageUrl() ?>start=<?php echo $t_bpdungnl_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_bpdungnl_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList() && $Security->CanListex()) { ?>
	<?php if ($t_bpdungnl_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_bpdungnl">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_bpdungnl_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_bpdungnl_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_bpdungnl_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_bpdungnl->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
<a href="<?php echo $t_bpdungnl_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_bpdungnl_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_bpdungnllist, '<?php echo $t_bpdungnl_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_bpdungnl->Export == "" && $t_bpdungnl->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_bpdungnl->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_bpdungnl_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_bpdungnl_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_bpdungnl';

	// Page object name
	var $PageObjName = 't_bpdungnl_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) $PageUrl .= "t=" . $t_bpdungnl->TableVar . "&"; // Add page token
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
		global $objForm, $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) {
			if ($objForm)
				return ($t_bpdungnl->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_bpdungnl->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_bpdungnl_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_bpdungnl)
		$GLOBALS["t_bpdungnl"] = new ct_bpdungnl();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_bpdungnl"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_bpdungnldelete.php";
		$this->MultiUpdateUrl = "t_bpdungnlupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_bpdungnl', TRUE);

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
		global $t_bpdungnl;

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
		
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_bpdungnl->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_bpdungnl->Export = $_POST["exporttype"];
		} else {
			$t_bpdungnl->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_bpdungnl->Export; // Get export parameter, used in header
		$gsExportFile = $t_bpdungnl->TableVar; // Get export file, used in header
		if (in_array($t_bpdungnl->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_bpdungnl->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_bpdungnl->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_bpdungnl->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_bpdungnl->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_bpdungnl, $array_pkcongty;

                $pk_congty =  $Security->CurrentUserOption();
//                if (checkleaves_one($pk_congty,t_congty,C_PARRENT)==0)
//                {
//                $result1= Check_Rootcongty($pk_congty,PK_MACONGTY,t_congty);
//                $result1=$result1.$pk_congty;
//                $array_pkcongty =  (split(";",$result1));
//                }


		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page
			$this->SetUpDisplayRecs();

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
			$t_bpdungnl->Recordset_SearchValidated();

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
		if ($t_bpdungnl->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_bpdungnl->getRecordsPerPage(); // Restore from Session
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
		$t_bpdungnl->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_bpdungnl->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_bpdungnl->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_bpdungnl->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList() || !$Security->CanListex())
			$sFilter = "(0=1)"; // Filter all records
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$t_bpdungnl->setSessionWhere($sFilter);
		$t_bpdungnl->CurrentFilter = "";

		// Export data only
		if (in_array($t_bpdungnl->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_bpdungnl->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_bpdungnl;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 20; // Non-numeric, load default
				}
			}
			$t_bpdungnl->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_bpdungnl;
		$sWhere = "";
		if (!$Security->CanSearch() || !$Security->CanSearchex()) return "";
		$this->BuildSearchSql($sWhere, $t_bpdungnl->PK_BPDUNGNL, FALSE); // PK_BPDUNGNL
		$this->BuildSearchSql($sWhere, $t_bpdungnl->FK_MACONGTY, FALSE); // FK_MACONGTY
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_NAM, FALSE); // C_NAM
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_TENBP, FALSE); // C_TENBP
		$this->BuildSearchSql($sWhere, $t_bpdungnl->FK_LOAINHIENLIEU, FALSE); // FK_LOAINHIENLIEU
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_SOLUONG, FALSE); // C_SOLUONG
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_bpdungnl->C_EDIT_TIME, FALSE); // C_EDIT_TIME

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_bpdungnl->PK_BPDUNGNL); // PK_BPDUNGNL
			$this->SetSearchParm($t_bpdungnl->FK_MACONGTY); // FK_MACONGTY
			$this->SetSearchParm($t_bpdungnl->C_NAM); // C_NAM
			$this->SetSearchParm($t_bpdungnl->C_TENBP); // C_TENBP
			$this->SetSearchParm($t_bpdungnl->FK_LOAINHIENLIEU); // FK_LOAINHIENLIEU
			$this->SetSearchParm($t_bpdungnl->C_SOLUONG); // C_SOLUONG
			$this->SetSearchParm($t_bpdungnl->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_bpdungnl->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_bpdungnl->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_bpdungnl->C_EDIT_TIME); // C_EDIT_TIME
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
		global $t_bpdungnl;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_bpdungnl->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_bpdungnl->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_bpdungnl->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_bpdungnl->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_bpdungnl->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_bpdungnl;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_bpdungnl->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_bpdungnl->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_bpdungnl->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_bpdungnl->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_bpdungnl->GetAdvancedSearch("w_$FldParm");
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
		global $t_bpdungnl;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $t_bpdungnl->FK_MACONGTY, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_bpdungnl->C_NAM, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_bpdungnl->C_TENBP, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $t_bpdungnl->FK_LOAINHIENLIEU, $Keyword);
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
		global $Security, $t_bpdungnl;
		$sSearchStr = "";
		if (!$Security->CanSearch() || !$Security->CanSearchex()) return "";
		$sSearchKeyword = $t_bpdungnl->BasicSearchKeyword;
		$sSearchType = $t_bpdungnl->BasicSearchType;
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
			$t_bpdungnl->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_bpdungnl->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_bpdungnl;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_bpdungnl->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_bpdungnl;
		$t_bpdungnl->setSessionBasicSearchKeyword("");
		$t_bpdungnl->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_bpdungnl;
		$t_bpdungnl->setAdvancedSearch("x_PK_BPDUNGNL", "");
		$t_bpdungnl->setAdvancedSearch("x_FK_MACONGTY", "");
		$t_bpdungnl->setAdvancedSearch("x_C_NAM", "");
		$t_bpdungnl->setAdvancedSearch("x_C_TENBP", "");
		$t_bpdungnl->setAdvancedSearch("x_FK_LOAINHIENLIEU", "");
		$t_bpdungnl->setAdvancedSearch("x_C_SOLUONG", "");
		$t_bpdungnl->setAdvancedSearch("x_C_USER_ADD", "");
		$t_bpdungnl->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_bpdungnl->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_bpdungnl->setAdvancedSearch("x_C_EDIT_TIME", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_bpdungnl;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_BPDUNGNL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_MACONGTY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NAM"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TENBP"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_LOAINHIENLIEU"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_SOLUONG"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_bpdungnl->BasicSearchKeyword = $t_bpdungnl->getSessionBasicSearchKeyword();
			$t_bpdungnl->BasicSearchType = $t_bpdungnl->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_bpdungnl->PK_BPDUNGNL);
			$this->GetSearchParm($t_bpdungnl->FK_MACONGTY);
			$this->GetSearchParm($t_bpdungnl->C_NAM);
			$this->GetSearchParm($t_bpdungnl->C_TENBP);
			$this->GetSearchParm($t_bpdungnl->FK_LOAINHIENLIEU);
			$this->GetSearchParm($t_bpdungnl->C_SOLUONG);
			$this->GetSearchParm($t_bpdungnl->C_USER_ADD);
			$this->GetSearchParm($t_bpdungnl->C_ADD_TIME);
			$this->GetSearchParm($t_bpdungnl->C_USER_EDIT);
			$this->GetSearchParm($t_bpdungnl->C_EDIT_TIME);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_bpdungnl;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_bpdungnl->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_bpdungnl->CurrentOrderType = @$_GET["ordertype"];
			$t_bpdungnl->UpdateSort($t_bpdungnl->FK_MACONGTY, $bCtrl); // FK_MACONGTY
			$t_bpdungnl->UpdateSort($t_bpdungnl->C_NAM, $bCtrl); // C_NAM
			$t_bpdungnl->UpdateSort($t_bpdungnl->C_TENBP, $bCtrl); // C_TENBP
			$t_bpdungnl->UpdateSort($t_bpdungnl->FK_LOAINHIENLIEU, $bCtrl); // FK_LOAINHIENLIEU
			$t_bpdungnl->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_bpdungnl;
		$sOrderBy = $t_bpdungnl->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_bpdungnl->SqlOrderBy() <> "") {
				$sOrderBy = $t_bpdungnl->SqlOrderBy();
				$t_bpdungnl->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_bpdungnl;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_bpdungnl->setSessionOrderBy($sOrderBy);
				$t_bpdungnl->FK_MACONGTY->setSort("");
				$t_bpdungnl->C_NAM->setSort("");
				$t_bpdungnl->C_TENBP->setSort("");
				$t_bpdungnl->FK_LOAINHIENLIEU->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_bpdungnl;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanView() && $Security->CanViewex();
		$item->OnLeft = TRUE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanEdit() && $Security->CanEditex();
		$item->OnLeft = TRUE;

		// "copy"
		$this->ListOptions->Add("copy");
		$item =& $this->ListOptions->Items["copy"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanAdd() && $Security->CanAddex();
		$item->OnLeft = TRUE;

		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanDelete() && $Security->CanDeleteex();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_bpdungnl_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_bpdungnl->Export <> "" ||
			$t_bpdungnl->CurrentAction == "gridadd" ||
			$t_bpdungnl->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_bpdungnl;
		$this->ListOptions->LoadDefault();
               $pk1= $t_bpdungnl->PK_BPDUNGNL->CurrentValue;
               $pk =  $Security->CurrentUserOption();
		// "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($Security->CanView() && $Security->CanViewex() && $oListOpt->Visible)
			$oListOpt->Body = "<a href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";
               if (!isAdmin())
               {
                   if (checkleaves_ones($pk1, $pk,t_bpdungnl, "PK_BPDUNGNL", "FK_MACONGTY")==0)
                   {
		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $Security->CanEditex() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($Security->CanAdd() && $Security->CanAddex() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $Security->CanDeleteex() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_bpdungnl->PK_BPDUNGNL->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

                   }
               }
               else
               {
                   // "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $Security->CanEditex() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($Security->CanAdd() && $Security->CanAddex() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $Security->CanDeleteex() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_bpdungnl->PK_BPDUNGNL->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

               }
		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_bpdungnl;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_bpdungnl;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_bpdungnl->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_bpdungnl->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_bpdungnl->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_bpdungnl;
		$t_bpdungnl->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_bpdungnl->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_bpdungnl;

		// Load search values
		// PK_BPDUNGNL

		$t_bpdungnl->PK_BPDUNGNL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_BPDUNGNL"]);
		$t_bpdungnl->PK_BPDUNGNL->AdvancedSearch->SearchOperator = @$_GET["z_PK_BPDUNGNL"];

		// FK_MACONGTY
		$t_bpdungnl->FK_MACONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_MACONGTY"]);
		$t_bpdungnl->FK_MACONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_MACONGTY"];

		// C_NAM
		$t_bpdungnl->C_NAM->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NAM"]);
		$t_bpdungnl->C_NAM->AdvancedSearch->SearchOperator = @$_GET["z_C_NAM"];

		// C_TENBP
		$t_bpdungnl->C_TENBP->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TENBP"]);
		$t_bpdungnl->C_TENBP->AdvancedSearch->SearchOperator = @$_GET["z_C_TENBP"];

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_LOAINHIENLIEU"]);
		$t_bpdungnl->FK_LOAINHIENLIEU->AdvancedSearch->SearchOperator = @$_GET["z_FK_LOAINHIENLIEU"];

		// C_SOLUONG
		$t_bpdungnl->C_SOLUONG->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_SOLUONG"]);
		$t_bpdungnl->C_SOLUONG->AdvancedSearch->SearchOperator = @$_GET["z_C_SOLUONG"];

		// C_USER_ADD
		$t_bpdungnl->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_bpdungnl->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_bpdungnl->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_bpdungnl->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_bpdungnl->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_bpdungnl->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_bpdungnl->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_bpdungnl->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_bpdungnl;

		// Call Recordset Selecting event
		$t_bpdungnl->Recordset_Selecting($t_bpdungnl->CurrentFilter);

		// Load List page SQL
		$sSql = $t_bpdungnl->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
               
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_bpdungnl->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_bpdungnl;
		$sFilter = $t_bpdungnl->KeyFilter();

		// Call Row Selecting event
		$t_bpdungnl->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_bpdungnl->CurrentFilter = $sFilter;
		$sSql = $t_bpdungnl->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_bpdungnl->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->setDbValue($rs->fields('PK_BPDUNGNL'));
		$t_bpdungnl->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$t_bpdungnl->C_NAM->setDbValue($rs->fields('C_NAM'));
		$t_bpdungnl->C_TENBP->setDbValue($rs->fields('C_TENBP'));
		$t_bpdungnl->FK_LOAINHIENLIEU->setDbValue($rs->fields('FK_LOAINHIENLIEU'));
		$t_bpdungnl->C_SOLUONG->setDbValue($rs->fields('C_SOLUONG'));
		$t_bpdungnl->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_bpdungnl->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_bpdungnl->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_bpdungnl->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_bpdungnl;

		// Initialize URLs
		$this->ViewUrl = $t_bpdungnl->ViewUrl();
		$this->EditUrl = $t_bpdungnl->EditUrl();
		$this->InlineEditUrl = $t_bpdungnl->InlineEditUrl();
		$this->CopyUrl = $t_bpdungnl->CopyUrl();
		$this->InlineCopyUrl = $t_bpdungnl->InlineCopyUrl();
		$this->DeleteUrl = $t_bpdungnl->DeleteUrl();

		// Call Row_Rendering event
		$t_bpdungnl->Row_Rendering();

		// Common render codes for all row types
		// FK_MACONGTY

		$t_bpdungnl->FK_MACONGTY->CellCssStyle = ""; $t_bpdungnl->FK_MACONGTY->CellCssClass = "";
		$t_bpdungnl->FK_MACONGTY->CellAttrs = array(); $t_bpdungnl->FK_MACONGTY->ViewAttrs = array(); $t_bpdungnl->FK_MACONGTY->EditAttrs = array();

		// C_NAM
		$t_bpdungnl->C_NAM->CellCssStyle = ""; $t_bpdungnl->C_NAM->CellCssClass = "";
		$t_bpdungnl->C_NAM->CellAttrs = array(); $t_bpdungnl->C_NAM->ViewAttrs = array(); $t_bpdungnl->C_NAM->EditAttrs = array();

		// C_TENBP
		$t_bpdungnl->C_TENBP->CellCssStyle = ""; $t_bpdungnl->C_TENBP->CellCssClass = "";
		$t_bpdungnl->C_TENBP->CellAttrs = array(); $t_bpdungnl->C_TENBP->ViewAttrs = array(); $t_bpdungnl->C_TENBP->EditAttrs = array();

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->CellCssStyle = ""; $t_bpdungnl->FK_LOAINHIENLIEU->CellCssClass = "";
		$t_bpdungnl->FK_LOAINHIENLIEU->CellAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->EditAttrs = array();
		if ($t_bpdungnl->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_BPDUNGNL
			$t_bpdungnl->PK_BPDUNGNL->ViewValue = $t_bpdungnl->PK_BPDUNGNL->CurrentValue;
			$t_bpdungnl->PK_BPDUNGNL->CssStyle = "";
			$t_bpdungnl->PK_BPDUNGNL->CssClass = "";
			$t_bpdungnl->PK_BPDUNGNL->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($t_bpdungnl->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_bpdungnl->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_MACONGTY->ViewValue = $t_bpdungnl->FK_MACONGTY->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_MACONGTY->ViewValue = NULL;
			}
			$t_bpdungnl->FK_MACONGTY->CssStyle = "";
			$t_bpdungnl->FK_MACONGTY->CssClass = "";
			$t_bpdungnl->FK_MACONGTY->ViewCustomAttributes = "";

			// C_NAM
			$t_bpdungnl->C_NAM->ViewValue = $t_bpdungnl->C_NAM->CurrentValue;
			$t_bpdungnl->C_NAM->CssStyle = "";
			$t_bpdungnl->C_NAM->CssClass = "";
			$t_bpdungnl->C_NAM->ViewCustomAttributes = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->ViewValue = $t_bpdungnl->C_TENBP->CurrentValue;
			$t_bpdungnl->C_TENBP->CssStyle = "";
			$t_bpdungnl->C_TENBP->CssClass = "";
			$t_bpdungnl->C_TENBP->ViewCustomAttributes = "";

			// FK_LOAINHIENLIEU
			if (strval($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) <> "") {
				$sFilterWrk = "`PK_LOAINHIENLIEU` = " . ew_AdjustSql($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) . "";
			$sSqlWrk = "SELECT C_TENLOAI,C_DONVI FROM `t_loainhienlieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $rswrk->fields('C_TENLOAI')." (".$rswrk->fields('C_DONVI').")";
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = NULL;
			}
			$t_bpdungnl->FK_LOAINHIENLIEU->CssStyle = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->CssClass = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->ViewCustomAttributes = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->ViewValue = $t_bpdungnl->C_SOLUONG->CurrentValue;
			$t_bpdungnl->C_SOLUONG->CssStyle = "";
			$t_bpdungnl->C_SOLUONG->CssClass = "";
			$t_bpdungnl->C_SOLUONG->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_bpdungnl->C_USER_ADD->ViewValue = $t_bpdungnl->C_USER_ADD->CurrentValue;
			$t_bpdungnl->C_USER_ADD->CssStyle = "";
			$t_bpdungnl->C_USER_ADD->CssClass = "";
			$t_bpdungnl->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_bpdungnl->C_ADD_TIME->ViewValue = $t_bpdungnl->C_ADD_TIME->CurrentValue;
			$t_bpdungnl->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_ADD_TIME->ViewValue, 7);
			$t_bpdungnl->C_ADD_TIME->CssStyle = "";
			$t_bpdungnl->C_ADD_TIME->CssClass = "";
			$t_bpdungnl->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_bpdungnl->C_USER_EDIT->ViewValue = $t_bpdungnl->C_USER_EDIT->CurrentValue;
			$t_bpdungnl->C_USER_EDIT->CssStyle = "";
			$t_bpdungnl->C_USER_EDIT->CssClass = "";
			$t_bpdungnl->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_bpdungnl->C_EDIT_TIME->ViewValue = $t_bpdungnl->C_EDIT_TIME->CurrentValue;
			$t_bpdungnl->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_EDIT_TIME->ViewValue, 7);
			$t_bpdungnl->C_EDIT_TIME->CssStyle = "";
			$t_bpdungnl->C_EDIT_TIME->CssClass = "";
			$t_bpdungnl->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->HrefValue = "";
			$t_bpdungnl->FK_MACONGTY->TooltipValue = "";

			// C_NAM
			$t_bpdungnl->C_NAM->HrefValue = "";
			$t_bpdungnl->C_NAM->TooltipValue = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->HrefValue = "";
			$t_bpdungnl->C_TENBP->TooltipValue = "";

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->HrefValue = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->TooltipValue = "";
		} elseif ($t_bpdungnl->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->EditCustomAttributes = "";
			$arwrk = GetCompanyTree();
			$t_bpdungnl->FK_MACONGTY->EditValue = $arwrk;

			// C_NAM
			$t_bpdungnl->C_NAM->EditCustomAttributes = "";
			$t_bpdungnl->C_NAM->EditValue = ew_HtmlEncode($t_bpdungnl->C_NAM->AdvancedSearch->SearchValue);

			// C_TENBP
			$t_bpdungnl->C_TENBP->EditCustomAttributes = "";
			$t_bpdungnl->C_TENBP->EditValue = ew_HtmlEncode($t_bpdungnl->C_TENBP->AdvancedSearch->SearchValue);

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_LOAINHIENLIEU`, `C_TENLOAI`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_loainhienlieu`";
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
			$t_bpdungnl->FK_LOAINHIENLIEU->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_bpdungnl->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_bpdungnl->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_bpdungnl;

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
		global $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_PK_BPDUNGNL");
		$t_bpdungnl->FK_MACONGTY->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_FK_MACONGTY");
		$t_bpdungnl->C_NAM->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_NAM");
		$t_bpdungnl->C_TENBP->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_TENBP");
		$t_bpdungnl->FK_LOAINHIENLIEU->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_FK_LOAINHIENLIEU");
		$t_bpdungnl->C_SOLUONG->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_SOLUONG");
		$t_bpdungnl->C_USER_ADD->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_USER_ADD");
		$t_bpdungnl->C_ADD_TIME->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_ADD_TIME");
		$t_bpdungnl->C_USER_EDIT->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_USER_EDIT");
		$t_bpdungnl->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_bpdungnl->getAdvancedSearch("x_C_EDIT_TIME");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_bpdungnl;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_bpdungnl->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_bpdungnl->ExportAll) {
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
		if ($t_bpdungnl->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_bpdungnl, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_bpdungnl->PK_BPDUNGNL);
				$ExportDoc->ExportCaption($t_bpdungnl->FK_MACONGTY);
				$ExportDoc->ExportCaption($t_bpdungnl->C_NAM);
				$ExportDoc->ExportCaption($t_bpdungnl->C_TENBP);
				$ExportDoc->ExportCaption($t_bpdungnl->FK_LOAINHIENLIEU);
				$ExportDoc->ExportCaption($t_bpdungnl->C_SOLUONG);
				$ExportDoc->ExportCaption($t_bpdungnl->C_USER_ADD);
				$ExportDoc->ExportCaption($t_bpdungnl->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_bpdungnl->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_bpdungnl->C_EDIT_TIME);
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
				$t_bpdungnl->CssClass = "";
				$t_bpdungnl->CssStyle = "";
				$t_bpdungnl->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_bpdungnl->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_BPDUNGNL', $t_bpdungnl->PK_BPDUNGNL->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $t_bpdungnl->FK_MACONGTY->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_NAM', $t_bpdungnl->C_NAM->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_TENBP', $t_bpdungnl->C_TENBP->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('FK_LOAINHIENLIEU', $t_bpdungnl->FK_LOAINHIENLIEU->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_SOLUONG', $t_bpdungnl->C_SOLUONG->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_bpdungnl->C_USER_ADD->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_bpdungnl->C_ADD_TIME->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_bpdungnl->C_USER_EDIT->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_bpdungnl->C_EDIT_TIME->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_bpdungnl->PK_BPDUNGNL);
					$ExportDoc->ExportField($t_bpdungnl->FK_MACONGTY);
					$ExportDoc->ExportField($t_bpdungnl->C_NAM);
					$ExportDoc->ExportField($t_bpdungnl->C_TENBP);
					$ExportDoc->ExportField($t_bpdungnl->FK_LOAINHIENLIEU);
					$ExportDoc->ExportField($t_bpdungnl->C_SOLUONG);
					$ExportDoc->ExportField($t_bpdungnl->C_USER_ADD);
					$ExportDoc->ExportField($t_bpdungnl->C_ADD_TIME);
					$ExportDoc->ExportField($t_bpdungnl->C_USER_EDIT);
					$ExportDoc->ExportField($t_bpdungnl->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_bpdungnl->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_bpdungnl->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_bpdungnl->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_bpdungnl->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_bpdungnl->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_bpdungnl;
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
		if ($t_bpdungnl->Email_Sending($Email, $EventArgs))
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
		global $t_bpdungnl;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_bpdungnl->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_bpdungnl->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_bpdungnl->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_bpdungnl->PK_BPDUNGNL); // PK_BPDUNGNL
		$this->AddSearchQueryString($sQry, $t_bpdungnl->FK_MACONGTY); // FK_MACONGTY
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_NAM); // C_NAM
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_TENBP); // C_TENBP
		$this->AddSearchQueryString($sQry, $t_bpdungnl->FK_LOAINHIENLIEU); // FK_LOAINHIENLIEU
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_SOLUONG); // C_SOLUONG
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_bpdungnl->C_EDIT_TIME); // C_EDIT_TIME

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_bpdungnl->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_bpdungnl->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_bpdungnl;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_bpdungnl->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_bpdungnl->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_bpdungnl->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_bpdungnl->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_bpdungnl->GetAdvancedSearch("w_" . $FldParm);
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
