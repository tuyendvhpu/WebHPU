<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersadmininfo.php" ?>
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
$usersadmin_list = new cusersadmin_list();
$Page =& $usersadmin_list;

// Page init
$usersadmin_list->Page_Init();

// Page main
$usersadmin_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($usersadmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var usersadmin_list = new ew_Page("usersadmin_list");

// page properties
usersadmin_list.PageID = "list"; // page ID
usersadmin_list.FormID = "fusersadminlist"; // form ID
var EW_PAGE_ID = usersadmin_list.PageID; // for backward compatibility

// extend page with validate function for search
usersadmin_list.ValidateSearch = function(fobj) {
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
usersadmin_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
usersadmin_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
usersadmin_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
usersadmin_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
<?php if ($usersadmin->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$usersadmin_list->lTotalRecs = $usersadmin->SelectRecordCount();
	} else {
		if ($rs = $usersadmin_list->LoadRecordset())
			$usersadmin_list->lTotalRecs = $rs->RecordCount();
	}
	$usersadmin_list->lStartRec = 1;
	if ($usersadmin_list->lDisplayRecs <= 0 || ($usersadmin->Export <> "" && $usersadmin->ExportAll)) // Display all records
		$usersadmin_list->lDisplayRecs = $usersadmin_list->lTotalRecs;
	if (!($usersadmin->Export <> "" && $usersadmin->ExportAll))
		$usersadmin_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $usersadmin_list->LoadRecordset($usersadmin_list->lStartRec-1, $usersadmin_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $usersadmin->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker" style="white-space: nowrap;">
<?php if ($usersadmin->Export == "" && $usersadmin->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_usersadmin" id="emf_usersadmin" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_usersadmin',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.fusersadminlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($usersadmin->Export == "" && $usersadmin->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(usersadmin_list);" style="text-decoration: none;"><img id="usersadmin_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="usersadmin_list_SearchPanel">
<form name="fusersadminlistsrch" id="fusersadminlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return usersadmin_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="usersadmin">
<?php
if ($gsSearchError == "")
	$usersadmin_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$usersadmin->RowType = EW_ROWTYPE_SEARCH;

// Render row
$usersadmin_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($usersadmin->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $usersadmin_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($usersadmin->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($usersadmin->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($usersadmin->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_USERLEVELID" id="z_FK_USERLEVELID" value="="></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_USERLEVELID" name="x_FK_USERLEVELID" title="<?php echo $usersadmin->FK_USERLEVELID->FldTitle() ?>"<?php echo $usersadmin->FK_USERLEVELID->EditAttributes() ?>>
<?php
if (is_array($usersadmin->FK_USERLEVELID->EditValue)) {
	$arwrk = $usersadmin->FK_USERLEVELID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($usersadmin->FK_USERLEVELID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
$usersadmin_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($usersadmin->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($usersadmin->CurrentAction <> "gridadd" && $usersadmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($usersadmin_list->Pager)) $usersadmin_list->Pager = new cNumericPager($usersadmin_list->lStartRec, $usersadmin_list->lDisplayRecs, $usersadmin_list->lTotalRecs, $usersadmin_list->lRecRange) ?>
<?php if ($usersadmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($usersadmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($usersadmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $usersadmin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $usersadmin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $usersadmin_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($usersadmin_list->sSrchWhere == "0=101") { ?>
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
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="usersadmin">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($usersadmin_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($usersadmin_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($usersadmin_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($usersadmin->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $usersadmin_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fusersadminlist, '<?php echo $usersadmin_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fusersadminlist" id="fusersadminlist" class="ewForm" action="" method="post">
<div id="gmp_usersadmin" class="ewGridMiddlePanel">
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $usersadmin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$usersadmin_list->RenderListOptions();

// Render list options (header, left)
$usersadmin_list->ListOptions->Render("header", "left");
?>
<?php if ($usersadmin->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<?php if ($usersadmin->SortUrl($usersadmin->C_TENDANGNHAP) == "") { ?>
		<td><?php echo $usersadmin->C_TENDANGNHAP->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $usersadmin->SortUrl($usersadmin->C_TENDANGNHAP) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $usersadmin->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($usersadmin->C_TENDANGNHAP->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($usersadmin->C_TENDANGNHAP->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php if ($usersadmin->C_HOTEN->Visible) { // C_HOTEN ?>
	<?php if ($usersadmin->SortUrl($usersadmin->C_HOTEN) == "") { ?>
		<td><?php echo $usersadmin->C_HOTEN->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $usersadmin->SortUrl($usersadmin->C_HOTEN) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $usersadmin->C_HOTEN->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($usersadmin->C_HOTEN->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($usersadmin->C_HOTEN->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php if ($usersadmin->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<?php if ($usersadmin->SortUrl($usersadmin->FK_USERLEVELID) == "") { ?>
		<td><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $usersadmin->SortUrl($usersadmin->FK_USERLEVELID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?></td><td style="width: 10px;"><?php if ($usersadmin->FK_USERLEVELID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($usersadmin->FK_USERLEVELID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$usersadmin_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($usersadmin->ExportAll && $usersadmin->Export <> "") {
	$usersadmin_list->lStopRec = $usersadmin_list->lTotalRecs;
} else {
	$usersadmin_list->lStopRec = $usersadmin_list->lStartRec + $usersadmin_list->lDisplayRecs - 1; // Set the last record to display
}
$usersadmin_list->lRecCount = $usersadmin_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $usersadmin_list->lStartRec > 1)
		$rs->Move($usersadmin_list->lStartRec - 1);
}

// Initialize aggregate
$usersadmin->RowType = EW_ROWTYPE_AGGREGATEINIT;
$usersadmin_list->RenderRow();
$usersadmin_list->lRowCnt = 0;
while (($usersadmin->CurrentAction == "gridadd" || !$rs->EOF) &&
	$usersadmin_list->lRecCount < $usersadmin_list->lStopRec) {
	$usersadmin_list->lRecCount++;
	if (intval($usersadmin_list->lRecCount) >= intval($usersadmin_list->lStartRec)) {
		$usersadmin_list->lRowCnt++;

	// Init row class and style
	$usersadmin->CssClass = "";
	$usersadmin->CssStyle = "";
	$usersadmin->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($usersadmin->CurrentAction == "gridadd") {
		$usersadmin_list->LoadDefaultValues(); // Load default values
	} else {
		$usersadmin_list->LoadRowValues($rs); // Load row values
	}
	$usersadmin->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$usersadmin_list->RenderRow();

	// Render list options
	$usersadmin_list->RenderListOptions();
?>
	<tr<?php echo $usersadmin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$usersadmin_list->ListOptions->Render("body", "left");
?>
	<?php if ($usersadmin->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
		<td<?php echo $usersadmin->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $usersadmin->C_TENDANGNHAP->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($usersadmin->C_HOTEN->Visible) { // C_HOTEN ?>
		<td<?php echo $usersadmin->C_HOTEN->CellAttributes() ?>>
<div<?php echo $usersadmin->C_HOTEN->ViewAttributes() ?>><?php echo $usersadmin->C_HOTEN->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($usersadmin->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
		<td<?php echo $usersadmin->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $usersadmin->FK_USERLEVELID->ViewAttributes() ?>><?php echo $usersadmin->FK_USERLEVELID->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$usersadmin_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($usersadmin->CurrentAction <> "gridadd")
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
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
<?php if ($usersadmin->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($usersadmin->CurrentAction <> "gridadd" && $usersadmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($usersadmin_list->Pager)) $usersadmin_list->Pager = new cNumericPager($usersadmin_list->lStartRec, $usersadmin_list->lDisplayRecs, $usersadmin_list->lTotalRecs, $usersadmin_list->lRecRange) ?>
<?php if ($usersadmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($usersadmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($usersadmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_list->PageUrl() ?>start=<?php echo $usersadmin_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $usersadmin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $usersadmin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $usersadmin_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($usersadmin_list->sSrchWhere == "0=101") { ?>
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
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="usersadmin">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($usersadmin_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($usersadmin_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($usersadmin_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($usersadmin->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($usersadmin_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $usersadmin_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($usersadmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fusersadminlist, '<?php echo $usersadmin_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($usersadmin->Export == "" && $usersadmin->CurrentAction == "") { ?>
<?php } ?>
<?php if ($usersadmin->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--
ew_ToggleSearchPanel(usersadmin_list);
// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$usersadmin_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cusersadmin_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'usersadmin';

	// Page object name
	var $PageObjName = 'usersadmin_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $usersadmin;
		if ($usersadmin->UseTokenInUrl) $PageUrl .= "t=" . $usersadmin->TableVar . "&"; // Add page token
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
		global $objForm, $usersadmin;
		if ($usersadmin->UseTokenInUrl) {
			if ($objForm)
				return ($usersadmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($usersadmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusersadmin_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (usersadmin)
		$GLOBALS["usersadmin"] = new cusersadmin();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["usersadmin"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "usersadmindelete.php";
		$this->MultiUpdateUrl = "usersadminupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'usersadmin', TRUE);

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
		global $usersadmin;

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
			$usersadmin->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$usersadmin->Export = $_POST["exporttype"];
		} else {
			$usersadmin->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $usersadmin->Export; // Get export parameter, used in header
		$gsExportFile = $usersadmin->TableVar; // Get export file, used in header
		if (in_array($usersadmin->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($usersadmin->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($usersadmin->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($usersadmin->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($usersadmin->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $usersadmin;

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
			$usersadmin->Recordset_SearchValidated();

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
		if ($usersadmin->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $usersadmin->getRecordsPerPage(); // Restore from Session
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
		$usersadmin->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$usersadmin->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$usersadmin->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $usersadmin->getSearchWhere();
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
		$usersadmin->setSessionWhere($sFilter);
		$usersadmin->CurrentFilter = "";

		// Export data only
		if (in_array($usersadmin->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($usersadmin->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $usersadmin;
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
			$usersadmin->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$usersadmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $usersadmin;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $usersadmin->PK_NGUOIDUNG_ID, FALSE); // PK_NGUOIDUNG_ID
		$this->BuildSearchSql($sWhere, $usersadmin->C_TENDANGNHAP, FALSE); // C_TENDANGNHAP
		$this->BuildSearchSql($sWhere, $usersadmin->C_MATKHAU, FALSE); // C_MATKHAU
		$this->BuildSearchSql($sWhere, $usersadmin->FK_MACONGTY, FALSE); // FK_MACONGTY
		$this->BuildSearchSql($sWhere, $usersadmin->C_HOTEN, FALSE); // C_HOTEN
		$this->BuildSearchSql($sWhere, $usersadmin->C_DIACHI, FALSE); // C_DIACHI
		$this->BuildSearchSql($sWhere, $usersadmin->C_TEL, FALSE); // C_TEL
		$this->BuildSearchSql($sWhere, $usersadmin->C_TEL_HOME, FALSE); // C_TEL_HOME
		$this->BuildSearchSql($sWhere, $usersadmin->C_TEL_MOBILE, FALSE); // C_TEL_MOBILE
		$this->BuildSearchSql($sWhere, $usersadmin->C_FAX, FALSE); // C_FAX
		$this->BuildSearchSql($sWhere, $usersadmin->C_EMAIL, FALSE); // C_EMAIL
		$this->BuildSearchSql($sWhere, $usersadmin->FK_USERLEVELID, FALSE); // FK_USERLEVELID

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($usersadmin->PK_NGUOIDUNG_ID); // PK_NGUOIDUNG_ID
			$this->SetSearchParm($usersadmin->C_TENDANGNHAP); // C_TENDANGNHAP
			$this->SetSearchParm($usersadmin->C_MATKHAU); // C_MATKHAU
			$this->SetSearchParm($usersadmin->FK_MACONGTY); // FK_MACONGTY
			$this->SetSearchParm($usersadmin->C_HOTEN); // C_HOTEN
			$this->SetSearchParm($usersadmin->C_DIACHI); // C_DIACHI
			$this->SetSearchParm($usersadmin->C_TEL); // C_TEL
			$this->SetSearchParm($usersadmin->C_TEL_HOME); // C_TEL_HOME
			$this->SetSearchParm($usersadmin->C_TEL_MOBILE); // C_TEL_MOBILE
			$this->SetSearchParm($usersadmin->C_FAX); // C_FAX
			$this->SetSearchParm($usersadmin->C_EMAIL); // C_EMAIL
			$this->SetSearchParm($usersadmin->FK_USERLEVELID); // FK_USERLEVELID
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
		global $usersadmin;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$usersadmin->setAdvancedSearch("x_$FldParm", $FldVal);
		$usersadmin->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$usersadmin->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$usersadmin->setAdvancedSearch("y_$FldParm", $FldVal2);
		$usersadmin->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $usersadmin;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $usersadmin->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $usersadmin->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $usersadmin->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $usersadmin->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $usersadmin->GetAdvancedSearch("w_$FldParm");
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
		global $usersadmin;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $usersadmin->C_TENDANGNHAP, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $usersadmin->C_HOTEN, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $usersadmin->FK_USERLEVELID, $Keyword);
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
		global $Security, $usersadmin;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $usersadmin->BasicSearchKeyword;
		$sSearchType = $usersadmin->BasicSearchType;
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
			$usersadmin->setSessionBasicSearchKeyword($sSearchKeyword);
			$usersadmin->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $usersadmin;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$usersadmin->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $usersadmin;
		$usersadmin->setSessionBasicSearchKeyword("");
		$usersadmin->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $usersadmin;
		$usersadmin->setAdvancedSearch("x_PK_NGUOIDUNG_ID", "");
		$usersadmin->setAdvancedSearch("x_C_TENDANGNHAP", "");
		$usersadmin->setAdvancedSearch("x_C_MATKHAU", "");
		$usersadmin->setAdvancedSearch("x_FK_MACONGTY", "");
		$usersadmin->setAdvancedSearch("x_C_HOTEN", "");
		$usersadmin->setAdvancedSearch("x_C_DIACHI", "");
		$usersadmin->setAdvancedSearch("x_C_TEL", "");
		$usersadmin->setAdvancedSearch("x_C_TEL_HOME", "");
		$usersadmin->setAdvancedSearch("x_C_TEL_MOBILE", "");
		$usersadmin->setAdvancedSearch("x_C_FAX", "");
		$usersadmin->setAdvancedSearch("x_C_EMAIL", "");
		$usersadmin->setAdvancedSearch("x_FK_USERLEVELID", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $usersadmin;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_NGUOIDUNG_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TENDANGNHAP"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_MATKHAU"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_MACONGTY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_HOTEN"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DIACHI"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TEL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TEL_HOME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TEL_MOBILE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_FAX"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EMAIL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_USERLEVELID"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$usersadmin->BasicSearchKeyword = $usersadmin->getSessionBasicSearchKeyword();
			$usersadmin->BasicSearchType = $usersadmin->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($usersadmin->PK_NGUOIDUNG_ID);
			$this->GetSearchParm($usersadmin->C_TENDANGNHAP);
			$this->GetSearchParm($usersadmin->C_MATKHAU);
			$this->GetSearchParm($usersadmin->FK_MACONGTY);
			$this->GetSearchParm($usersadmin->C_HOTEN);
			$this->GetSearchParm($usersadmin->C_DIACHI);
			$this->GetSearchParm($usersadmin->C_TEL);
			$this->GetSearchParm($usersadmin->C_TEL_HOME);
			$this->GetSearchParm($usersadmin->C_TEL_MOBILE);
			$this->GetSearchParm($usersadmin->C_FAX);
			$this->GetSearchParm($usersadmin->C_EMAIL);
			$this->GetSearchParm($usersadmin->FK_USERLEVELID);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $usersadmin;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$usersadmin->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$usersadmin->CurrentOrderType = @$_GET["ordertype"];
			$usersadmin->UpdateSort($usersadmin->C_TENDANGNHAP, $bCtrl); // C_TENDANGNHAP
			$usersadmin->UpdateSort($usersadmin->C_HOTEN, $bCtrl); // C_HOTEN
			$usersadmin->UpdateSort($usersadmin->FK_USERLEVELID, $bCtrl); // FK_USERLEVELID
			$usersadmin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $usersadmin;
		$sOrderBy = $usersadmin->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($usersadmin->SqlOrderBy() <> "") {
				$sOrderBy = $usersadmin->SqlOrderBy();
				$usersadmin->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $usersadmin;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$usersadmin->setSessionOrderBy($sOrderBy);
				$usersadmin->C_TENDANGNHAP->setSort("");
				$usersadmin->C_HOTEN->setSort("");
				$usersadmin->FK_USERLEVELID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$usersadmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $usersadmin;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanView();
		$item->OnLeft = TRUE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "copy"
//		$this->ListOptions->Add("copy");
//		$item =& $this->ListOptions->Items["copy"];
//		$item->CssStyle = "white-space: nowrap;width: 25px;";
//		$item->Visible = $Security->CanAdd();
//		$item->OnLeft = TRUE;

		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"usersadmin_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($usersadmin->Export <> "" ||
			$usersadmin->CurrentAction == "gridadd" ||
			$usersadmin->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $usersadmin;
		$this->ListOptions->LoadDefault();

		// "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($Security->CanView() && $oListOpt->Visible)
			$oListOpt->Body = "<a href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($Security->CanAdd() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $usersadmin;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $usersadmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$usersadmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$usersadmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $usersadmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$usersadmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$usersadmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$usersadmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $usersadmin;
		$usersadmin->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$usersadmin->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $usersadmin;

		// Load search values
		// PK_NGUOIDUNG_ID

		$usersadmin->PK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_NGUOIDUNG_ID"]);
		$usersadmin->PK_NGUOIDUNG_ID->AdvancedSearch->SearchOperator = @$_GET["z_PK_NGUOIDUNG_ID"];

		// C_TENDANGNHAP
		$usersadmin->C_TENDANGNHAP->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TENDANGNHAP"]);
		$usersadmin->C_TENDANGNHAP->AdvancedSearch->SearchOperator = @$_GET["z_C_TENDANGNHAP"];

		// C_MATKHAU
		$usersadmin->C_MATKHAU->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_MATKHAU"]);
		$usersadmin->C_MATKHAU->AdvancedSearch->SearchOperator = @$_GET["z_C_MATKHAU"];

		// FK_MACONGTY
		$usersadmin->FK_MACONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_MACONGTY"]);
		$usersadmin->FK_MACONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_MACONGTY"];

		// C_HOTEN
		$usersadmin->C_HOTEN->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HOTEN"]);
		$usersadmin->C_HOTEN->AdvancedSearch->SearchOperator = @$_GET["z_C_HOTEN"];

		// C_DIACHI
		$usersadmin->C_DIACHI->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DIACHI"]);
		$usersadmin->C_DIACHI->AdvancedSearch->SearchOperator = @$_GET["z_C_DIACHI"];

		// C_TEL
		$usersadmin->C_TEL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL"]);
		$usersadmin->C_TEL->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL"];

		// C_TEL_HOME
		$usersadmin->C_TEL_HOME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL_HOME"]);
		$usersadmin->C_TEL_HOME->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL_HOME"];

		// C_TEL_MOBILE
		$usersadmin->C_TEL_MOBILE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL_MOBILE"]);
		$usersadmin->C_TEL_MOBILE->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL_MOBILE"];

		// C_FAX
		$usersadmin->C_FAX->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FAX"]);
		$usersadmin->C_FAX->AdvancedSearch->SearchOperator = @$_GET["z_C_FAX"];

		// C_EMAIL
		$usersadmin->C_EMAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EMAIL"]);
		$usersadmin->C_EMAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_EMAIL"];

		// FK_USERLEVELID
		$usersadmin->FK_USERLEVELID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_USERLEVELID"]);
		$usersadmin->FK_USERLEVELID->AdvancedSearch->SearchOperator = @$_GET["z_FK_USERLEVELID"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $usersadmin;

		// Call Recordset Selecting event
		$usersadmin->Recordset_Selecting($usersadmin->CurrentFilter);

		// Load List page SQL
		$sSql = $usersadmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$usersadmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $usersadmin;
		$sFilter = $usersadmin->KeyFilter();

		// Call Row Selecting event
		$usersadmin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$usersadmin->CurrentFilter = $sFilter;
		$sSql = $usersadmin->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$usersadmin->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$usersadmin->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$usersadmin->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$usersadmin->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$usersadmin->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$usersadmin->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$usersadmin->C_TEL->setDbValue($rs->fields('C_TEL'));
		$usersadmin->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$usersadmin->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$usersadmin->C_FAX->setDbValue($rs->fields('C_FAX'));
		$usersadmin->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$usersadmin->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $usersadmin;

		// Initialize URLs
		$this->ViewUrl = $usersadmin->ViewUrl();
		$this->EditUrl = $usersadmin->EditUrl();
		$this->InlineEditUrl = $usersadmin->InlineEditUrl();
		$this->CopyUrl = $usersadmin->CopyUrl();
		$this->InlineCopyUrl = $usersadmin->InlineCopyUrl();
		$this->DeleteUrl = $usersadmin->DeleteUrl();

		// Call Row_Rendering event
		$usersadmin->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$usersadmin->C_TENDANGNHAP->CellCssStyle = ""; $usersadmin->C_TENDANGNHAP->CellCssClass = "";
		$usersadmin->C_TENDANGNHAP->CellAttrs = array(); $usersadmin->C_TENDANGNHAP->ViewAttrs = array(); $usersadmin->C_TENDANGNHAP->EditAttrs = array();

		// C_HOTEN
		$usersadmin->C_HOTEN->CellCssStyle = ""; $usersadmin->C_HOTEN->CellCssClass = "";
		$usersadmin->C_HOTEN->CellAttrs = array(); $usersadmin->C_HOTEN->ViewAttrs = array(); $usersadmin->C_HOTEN->EditAttrs = array();

		// FK_USERLEVELID
		$usersadmin->FK_USERLEVELID->CellCssStyle = ""; $usersadmin->FK_USERLEVELID->CellCssClass = "";
		$usersadmin->FK_USERLEVELID->CellAttrs = array(); $usersadmin->FK_USERLEVELID->ViewAttrs = array(); $usersadmin->FK_USERLEVELID->EditAttrs = array();
		if ($usersadmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$usersadmin->PK_NGUOIDUNG_ID->ViewValue = $usersadmin->PK_NGUOIDUNG_ID->CurrentValue;
			$usersadmin->PK_NGUOIDUNG_ID->CssStyle = "";
			$usersadmin->PK_NGUOIDUNG_ID->CssClass = "";
			$usersadmin->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->ViewValue = $usersadmin->C_TENDANGNHAP->CurrentValue;
			$usersadmin->C_TENDANGNHAP->CssStyle = "";
			$usersadmin->C_TENDANGNHAP->CssClass = "";
			$usersadmin->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->ViewValue = "********";
			$usersadmin->C_MATKHAU->CssStyle = "";
			$usersadmin->C_MATKHAU->CssClass = "";
			$usersadmin->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$usersadmin->FK_MACONGTY->ViewValue = $usersadmin->FK_MACONGTY->CurrentValue;
			$usersadmin->FK_MACONGTY->CssStyle = "";
			$usersadmin->FK_MACONGTY->CssClass = "";
			$usersadmin->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->ViewValue = $usersadmin->C_HOTEN->CurrentValue;
			$usersadmin->C_HOTEN->CssStyle = "";
			$usersadmin->C_HOTEN->CssClass = "";
			$usersadmin->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->ViewValue = $usersadmin->C_DIACHI->CurrentValue;
			$usersadmin->C_DIACHI->CssStyle = "";
			$usersadmin->C_DIACHI->CssClass = "";
			$usersadmin->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$usersadmin->C_TEL->ViewValue = $usersadmin->C_TEL->CurrentValue;
			$usersadmin->C_TEL->CssStyle = "";
			$usersadmin->C_TEL->CssClass = "";
			$usersadmin->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->ViewValue = $usersadmin->C_TEL_HOME->CurrentValue;
			$usersadmin->C_TEL_HOME->CssStyle = "";
			$usersadmin->C_TEL_HOME->CssClass = "";
			$usersadmin->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->ViewValue = $usersadmin->C_TEL_MOBILE->CurrentValue;
			$usersadmin->C_TEL_MOBILE->CssStyle = "";
			$usersadmin->C_TEL_MOBILE->CssClass = "";
			$usersadmin->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$usersadmin->C_FAX->ViewValue = $usersadmin->C_FAX->CurrentValue;
			$usersadmin->C_FAX->CssStyle = "";
			$usersadmin->C_FAX->CssClass = "";
			$usersadmin->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->ViewValue = $usersadmin->C_EMAIL->CurrentValue;
			$usersadmin->C_EMAIL->CssStyle = "";
			$usersadmin->C_EMAIL->CssClass = "";
			$usersadmin->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($usersadmin->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($usersadmin->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$usersadmin->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$usersadmin->FK_USERLEVELID->ViewValue = $usersadmin->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$usersadmin->FK_USERLEVELID->ViewValue = NULL;
			}
			$usersadmin->FK_USERLEVELID->CssStyle = "";
			$usersadmin->FK_USERLEVELID->CssClass = "";
			$usersadmin->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->HrefValue = "";
			$usersadmin->C_TENDANGNHAP->TooltipValue = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->HrefValue = "";
			$usersadmin->C_HOTEN->TooltipValue = "";

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->HrefValue = "";
			$usersadmin->FK_USERLEVELID->TooltipValue = "";
		} elseif ($usersadmin->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->EditCustomAttributes = "";
			$usersadmin->C_TENDANGNHAP->EditValue = ew_HtmlEncode($usersadmin->C_TENDANGNHAP->AdvancedSearch->SearchValue);

			// C_HOTEN
			$usersadmin->C_HOTEN->EditCustomAttributes = "";
			$usersadmin->C_HOTEN->EditValue = ew_HtmlEncode($usersadmin->C_HOTEN->AdvancedSearch->SearchValue);

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `userlevelid`, `userlevelname`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`userleveltype` = 1 AND `userlevelid` not in (-1,0)";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$usersadmin->FK_USERLEVELID->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($usersadmin->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$usersadmin->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $usersadmin;

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
		global $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_PK_NGUOIDUNG_ID");
		$usersadmin->C_TENDANGNHAP->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_TENDANGNHAP");
		$usersadmin->C_MATKHAU->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_MATKHAU");
		$usersadmin->FK_MACONGTY->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_FK_MACONGTY");
		$usersadmin->C_HOTEN->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_HOTEN");
		$usersadmin->C_DIACHI->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_DIACHI");
		$usersadmin->C_TEL->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_TEL");
		$usersadmin->C_TEL_HOME->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_TEL_HOME");
		$usersadmin->C_TEL_MOBILE->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_TEL_MOBILE");
		$usersadmin->C_FAX->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_FAX");
		$usersadmin->C_EMAIL->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_C_EMAIL");
		$usersadmin->FK_USERLEVELID->AdvancedSearch->SearchValue = $usersadmin->getAdvancedSearch("x_FK_USERLEVELID");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $usersadmin;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $usersadmin->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($usersadmin->ExportAll) {
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
		if ($usersadmin->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($usersadmin, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($usersadmin->PK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($usersadmin->C_TENDANGNHAP);
				$ExportDoc->ExportCaption($usersadmin->C_MATKHAU);
				$ExportDoc->ExportCaption($usersadmin->FK_MACONGTY);
				$ExportDoc->ExportCaption($usersadmin->C_HOTEN);
				$ExportDoc->ExportCaption($usersadmin->C_DIACHI);
				$ExportDoc->ExportCaption($usersadmin->C_TEL);
				$ExportDoc->ExportCaption($usersadmin->C_TEL_HOME);
				$ExportDoc->ExportCaption($usersadmin->C_TEL_MOBILE);
				$ExportDoc->ExportCaption($usersadmin->C_FAX);
				$ExportDoc->ExportCaption($usersadmin->C_EMAIL);
				$ExportDoc->ExportCaption($usersadmin->FK_USERLEVELID);
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
				$usersadmin->CssClass = "";
				$usersadmin->CssStyle = "";
				$usersadmin->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($usersadmin->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGUOIDUNG_ID', $usersadmin->PK_NGUOIDUNG_ID->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TENDANGNHAP', $usersadmin->C_TENDANGNHAP->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_MATKHAU', $usersadmin->C_MATKHAU->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $usersadmin->FK_MACONGTY->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_HOTEN', $usersadmin->C_HOTEN->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_DIACHI', $usersadmin->C_DIACHI->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL', $usersadmin->C_TEL->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_HOME', $usersadmin->C_TEL_HOME->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_MOBILE', $usersadmin->C_TEL_MOBILE->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_FAX', $usersadmin->C_FAX->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $usersadmin->C_EMAIL->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('FK_USERLEVELID', $usersadmin->FK_USERLEVELID->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($usersadmin->PK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($usersadmin->C_TENDANGNHAP);
					$ExportDoc->ExportField($usersadmin->C_MATKHAU);
					$ExportDoc->ExportField($usersadmin->FK_MACONGTY);
					$ExportDoc->ExportField($usersadmin->C_HOTEN);
					$ExportDoc->ExportField($usersadmin->C_DIACHI);
					$ExportDoc->ExportField($usersadmin->C_TEL);
					$ExportDoc->ExportField($usersadmin->C_TEL_HOME);
					$ExportDoc->ExportField($usersadmin->C_TEL_MOBILE);
					$ExportDoc->ExportField($usersadmin->C_FAX);
					$ExportDoc->ExportField($usersadmin->C_EMAIL);
					$ExportDoc->ExportField($usersadmin->FK_USERLEVELID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($usersadmin->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($usersadmin->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($usersadmin->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($usersadmin->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($usersadmin->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $usersadmin;
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
		if ($usersadmin->Email_Sending($Email, $EventArgs))
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
		global $usersadmin;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($usersadmin->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $usersadmin->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $usersadmin->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $usersadmin->PK_NGUOIDUNG_ID); // PK_NGUOIDUNG_ID
		$this->AddSearchQueryString($sQry, $usersadmin->C_TENDANGNHAP); // C_TENDANGNHAP
		$this->AddSearchQueryString($sQry, $usersadmin->C_MATKHAU); // C_MATKHAU
		$this->AddSearchQueryString($sQry, $usersadmin->FK_MACONGTY); // FK_MACONGTY
		$this->AddSearchQueryString($sQry, $usersadmin->C_HOTEN); // C_HOTEN
		$this->AddSearchQueryString($sQry, $usersadmin->C_DIACHI); // C_DIACHI
		$this->AddSearchQueryString($sQry, $usersadmin->C_TEL); // C_TEL
		$this->AddSearchQueryString($sQry, $usersadmin->C_TEL_HOME); // C_TEL_HOME
		$this->AddSearchQueryString($sQry, $usersadmin->C_TEL_MOBILE); // C_TEL_MOBILE
		$this->AddSearchQueryString($sQry, $usersadmin->C_FAX); // C_FAX
		$this->AddSearchQueryString($sQry, $usersadmin->C_EMAIL); // C_EMAIL
		$this->AddSearchQueryString($sQry, $usersadmin->FK_USERLEVELID); // FK_USERLEVELID

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $usersadmin->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $usersadmin->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $usersadmin;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $usersadmin->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $usersadmin->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $usersadmin->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $usersadmin->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $usersadmin->GetAdvancedSearch("w_" . $FldParm);
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
