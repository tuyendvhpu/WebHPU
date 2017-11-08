<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersinfo.php" ?>
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
$users_list = new cusers_list();
$Page =& $users_list;

// Page init
$users_list->Page_Init();

// Page main
$users_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($users->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var users_list = new ew_Page("users_list");

// page properties
users_list.PageID = "list"; // page ID
users_list.FormID = "fuserslist"; // form ID
var EW_PAGE_ID = users_list.PageID; // for backward compatibility

// extend page with validate function for search
users_list.ValidateSearch = function(fobj) {
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
users_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
users_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
users_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
users_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($users->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$users_list->lTotalRecs = $users->SelectRecordCount();
	} else {
		if ($rs = $users_list->LoadRecordset())
			$users_list->lTotalRecs = $rs->RecordCount();
	}
	$users_list->lStartRec = 1;
	if ($users_list->lDisplayRecs <= 0 || ($users->Export <> "" && $users->ExportAll)) // Display all records
		$users_list->lDisplayRecs = $users_list->lTotalRecs;
	if (!($users->Export <> "" && $users->ExportAll))
		$users_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $users_list->LoadRecordset($users_list->lStartRec-1, $users_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $users->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
                                                                    <span class="phpmaker" style="white-space: nowrap;">
                                                                    <?php if ($users->Export == "" && $users->CurrentAction == "") { ?>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
                                                                    &nbsp;<a href="<?php echo $users_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
                                                                    &nbsp;<a name="emf_users" id="emf_users" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_users',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.fuserslist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
                                                                    <?php } ?>
                                                                    </span>
                                                                </td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($Security->CanSearch()) { ?>
<?php if ($users->Export == "" && $users->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(users_list);" style="text-decoration: none;"><img id="users_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="users_list_SearchPanel">
<form name="fuserslistsrch" id="fuserslistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return users_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="users">
<?php
if ($gsSearchError == "")
	$users_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$users->RowType = EW_ROWTYPE_SEARCH;

// Render row
$users_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($users->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $users_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($users->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($users->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($users->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $users->C_TENDANGNHAP->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_TENDANGNHAP" id="z_C_TENDANGNHAP" value="LIKE"></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" title="<?php echo $users->C_TENDANGNHAP->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $users->C_TENDANGNHAP->EditValue ?>"<?php echo $users->C_TENDANGNHAP->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
<?php if (IsAdmin()) { ?>
	<tr>
		<td><span class="phpmaker"><?php echo $users->FK_MACONGTY->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_MACONGTY" id="z_FK_MACONGTY" value="="></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $users->FK_MACONGTY->FldTitle() ?>"<?php echo $users->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($users->FK_MACONGTY->EditValue)) {
	$arwrk = $users->FK_MACONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($users->FK_MACONGTY->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker"><?php echo $users->FK_USERLEVELID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_USERLEVELID" id="z_FK_USERLEVELID" value="="></span></td>
		<td>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_USERLEVELID" name="x_FK_USERLEVELID" title="<?php echo $users->FK_USERLEVELID->FldTitle() ?>"<?php echo $users->FK_USERLEVELID->EditAttributes() ?>>
<?php
if (is_array($users->FK_USERLEVELID->EditValue)) {
	$arwrk = $users->FK_USERLEVELID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($users->FK_USERLEVELID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
$users_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($users->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($users->CurrentAction <> "gridadd" && $users->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($users_list->Pager)) $users_list->Pager = new cNumericPager($users_list->lStartRec, $users_list->lDisplayRecs, $users_list->lTotalRecs, $users_list->lRecRange) ?>
<?php if ($users_list->Pager->RecordCount > 0) { ?>
	<?php if ($users_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($users_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $users_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $users_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $users_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($users_list->sSrchWhere == "0=101") { ?>
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
<?php if ($users_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="users">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($users_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($users_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($users_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($users->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $users_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($users_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fuserslist, '<?php echo $users_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fuserslist" id="fuserslist" class="ewForm" action="" method="post">
<div id="gmp_users" class="ewGridMiddlePanel">
<?php if ($users_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $users->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$users_list->RenderListOptions();

// Render list options (header, left)
$users_list->ListOptions->Render("header", "left");
?>
<?php if ($users->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<?php if ($users->SortUrl($users->C_TENDANGNHAP) == "") { ?>
		<td><?php echo $users->C_TENDANGNHAP->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $users->SortUrl($users->C_TENDANGNHAP) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $users->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($users->C_TENDANGNHAP->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($users->C_TENDANGNHAP->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($users->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
	<?php if ($users->SortUrl($users->FK_MACONGTY) == "") { ?>
		<td><?php echo $users->FK_MACONGTY->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $users->SortUrl($users->FK_MACONGTY) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $users->FK_MACONGTY->FldCaption() ?></td><td style="width: 10px;"><?php if ($users->FK_MACONGTY->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($users->FK_MACONGTY->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($users->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<?php if ($users->SortUrl($users->FK_USERLEVELID) == "") { ?>
		<td><?php echo $users->FK_USERLEVELID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $users->SortUrl($users->FK_USERLEVELID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $users->FK_USERLEVELID->FldCaption() ?></td><td style="width: 10px;"><?php if ($users->FK_USERLEVELID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($users->FK_USERLEVELID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$users_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($users->ExportAll && $users->Export <> "") {
	$users_list->lStopRec = $users_list->lTotalRecs;
} else {
	$users_list->lStopRec = $users_list->lStartRec + $users_list->lDisplayRecs - 1; // Set the last record to display
}
$users_list->lRecCount = $users_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $users_list->lStartRec > 1)
		$rs->Move($users_list->lStartRec - 1);
}

// Initialize aggregate
$users->RowType = EW_ROWTYPE_AGGREGATEINIT;
$users_list->RenderRow();
$users_list->lRowCnt = 0;
while (($users->CurrentAction == "gridadd" || !$rs->EOF) &&
	$users_list->lRecCount < $users_list->lStopRec) {
	$users_list->lRecCount++;
	if (intval($users_list->lRecCount) >= intval($users_list->lStartRec)) {
		$users_list->lRowCnt++;

	// Init row class and style
	$users->CssClass = "";
	$users->CssStyle = "";
	$users->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($users->CurrentAction == "gridadd") {
		$users_list->LoadDefaultValues(); // Load default values
	} else {
		$users_list->LoadRowValues($rs); // Load row values
	}
	$users->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$users_list->RenderRow();

	// Render list options
	$users_list->RenderListOptions();
?>
	<tr<?php echo $users->RowAttributes() ?>>
<?php

// Render list options (body, left)
$users_list->ListOptions->Render("body", "left");
?>
	<?php if ($users->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
		<td<?php echo $users->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $users->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $users->C_TENDANGNHAP->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($users->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
		<td<?php echo $users->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $users->FK_MACONGTY->ViewAttributes() ?>><?php echo $users->FK_MACONGTY->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($users->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $users->FK_USERLEVELID->ViewAttributes() ?>><?php echo $users->FK_USERLEVELID->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$users_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($users->CurrentAction <> "gridadd")
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
<?php if ($users_list->lTotalRecs > 0) { ?>
<?php if ($users->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($users->CurrentAction <> "gridadd" && $users->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($users_list->Pager)) $users_list->Pager = new cNumericPager($users_list->lStartRec, $users_list->lDisplayRecs, $users_list->lTotalRecs, $users_list->lRecRange) ?>
<?php if ($users_list->Pager->RecordCount > 0) { ?>
	<?php if ($users_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($users_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $users_list->PageUrl() ?>start=<?php echo $users_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $users_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $users_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $users_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($users_list->sSrchWhere == "0=101") { ?>
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
<?php if ($users_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="users">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($users_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($users_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($users_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($users->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($users_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $users_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($users_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fuserslist, '<?php echo $users_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($users->Export == "" && $users->CurrentAction == "") { ?>
<?php } ?>
<?php if ($users->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--
ew_ToggleSearchPanel(users_list);
// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$users_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cusers_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'users';

	// Page object name
	var $PageObjName = 'users_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $users;
		if ($users->UseTokenInUrl) $PageUrl .= "t=" . $users->TableVar . "&"; // Add page token
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
		global $objForm, $users;
		if ($users->UseTokenInUrl) {
			if ($objForm)
				return ($users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusers_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (users)
		$GLOBALS["users"] = new cusers();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["users"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "usersdelete.php";
		$this->MultiUpdateUrl = "usersupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'users', TRUE);

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
		global $users;

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
			$users->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$users->Export = $_POST["exporttype"];
		} else {
			$users->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $users->Export; // Get export parameter, used in header
		$gsExportFile = $users->TableVar; // Get export file, used in header
		if (in_array($users->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($users->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($users->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($users->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($users->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $users;

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
			$users->Recordset_SearchValidated();

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
		if ($users->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $users->getRecordsPerPage(); // Restore from Session
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
		$users->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$users->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$users->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $users->getSearchWhere();
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
		$users->setSessionWhere($sFilter);
		$users->CurrentFilter = "";

		// Export data only
		if (in_array($users->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($users->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

        // Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $users;
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
			$users->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$users->setStartRecordNumber($this->lStartRec);
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $users;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $users->PK_NGUOIDUNG_ID, FALSE); // PK_NGUOIDUNG_ID
		$this->BuildSearchSql($sWhere, $users->C_TENDANGNHAP, FALSE); // C_TENDANGNHAP
		$this->BuildSearchSql($sWhere, $users->C_MATKHAU, FALSE); // C_MATKHAU
		$this->BuildSearchSql($sWhere, $users->FK_MACONGTY, FALSE); // FK_MACONGTY
		$this->BuildSearchSql($sWhere, $users->C_HOTEN, FALSE); // C_HOTEN
		$this->BuildSearchSql($sWhere, $users->C_DIACHI, FALSE); // C_DIACHI
		$this->BuildSearchSql($sWhere, $users->C_TEL, FALSE); // C_TEL
		$this->BuildSearchSql($sWhere, $users->C_TEL_HOME, FALSE); // C_TEL_HOME
		$this->BuildSearchSql($sWhere, $users->C_TEL_MOBILE, FALSE); // C_TEL_MOBILE
		$this->BuildSearchSql($sWhere, $users->C_FAX, FALSE); // C_FAX
		$this->BuildSearchSql($sWhere, $users->C_EMAIL, FALSE); // C_EMAIL
		$this->BuildSearchSql($sWhere, $users->FK_USERLEVELID, FALSE); // FK_USERLEVELID
                    
		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($users->PK_NGUOIDUNG_ID); // PK_NGUOIDUNG_ID
			$this->SetSearchParm($users->C_TENDANGNHAP); // C_TENDANGNHAP
			$this->SetSearchParm($users->C_MATKHAU); // C_MATKHAU
			$this->SetSearchParm($users->FK_MACONGTY); // FK_MACONGTY
			$this->SetSearchParm($users->C_HOTEN); // C_HOTEN
			$this->SetSearchParm($users->C_DIACHI); // C_DIACHI
			$this->SetSearchParm($users->C_TEL); // C_TEL
			$this->SetSearchParm($users->C_TEL_HOME); // C_TEL_HOME
			$this->SetSearchParm($users->C_TEL_MOBILE); // C_TEL_MOBILE
			$this->SetSearchParm($users->C_FAX); // C_FAX
			$this->SetSearchParm($users->C_EMAIL); // C_EMAIL
			$this->SetSearchParm($users->FK_USERLEVELID); // FK_USERLEVELID
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
		global $users;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$users->setAdvancedSearch("x_$FldParm", $FldVal);
		$users->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$users->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$users->setAdvancedSearch("y_$FldParm", $FldVal2);
		$users->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $users;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $users->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $users->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $users->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $users->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $users->GetAdvancedSearch("w_$FldParm");
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
		global $users;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $users->C_TENDANGNHAP, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $users->FK_MACONGTY, $Keyword);
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
		global $Security, $users;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $users->BasicSearchKeyword;
		$sSearchType = $users->BasicSearchType;
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
			$users->setSessionBasicSearchKeyword($sSearchKeyword);
			$users->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $users;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$users->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $users;
		$users->setSessionBasicSearchKeyword("");
		$users->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $users;
		$users->setAdvancedSearch("x_PK_NGUOIDUNG_ID", "");
		$users->setAdvancedSearch("x_C_TENDANGNHAP", "");
		$users->setAdvancedSearch("x_C_MATKHAU", "");
		$users->setAdvancedSearch("x_FK_MACONGTY", "");
		$users->setAdvancedSearch("x_C_HOTEN", "");
		$users->setAdvancedSearch("x_C_DIACHI", "");
		$users->setAdvancedSearch("x_C_TEL", "");
		$users->setAdvancedSearch("x_C_TEL_HOME", "");
		$users->setAdvancedSearch("x_C_TEL_MOBILE", "");
		$users->setAdvancedSearch("x_C_FAX", "");
		$users->setAdvancedSearch("x_C_EMAIL", "");
		$users->setAdvancedSearch("x_FK_USERLEVELID", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $users;
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
			$users->BasicSearchKeyword = $users->getSessionBasicSearchKeyword();
			$users->BasicSearchType = $users->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($users->PK_NGUOIDUNG_ID);
			$this->GetSearchParm($users->C_TENDANGNHAP);
			$this->GetSearchParm($users->C_MATKHAU);
			$this->GetSearchParm($users->FK_MACONGTY);
			$this->GetSearchParm($users->C_HOTEN);
			$this->GetSearchParm($users->C_DIACHI);
			$this->GetSearchParm($users->C_TEL);
			$this->GetSearchParm($users->C_TEL_HOME);
			$this->GetSearchParm($users->C_TEL_MOBILE);
			$this->GetSearchParm($users->C_FAX);
			$this->GetSearchParm($users->C_EMAIL);
			$this->GetSearchParm($users->FK_USERLEVELID);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $users;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$users->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$users->CurrentOrderType = @$_GET["ordertype"];
			$users->UpdateSort($users->C_TENDANGNHAP, $bCtrl); // C_TENDANGNHAP
			$users->UpdateSort($users->FK_MACONGTY, $bCtrl); // FK_MACONGTY
			$users->UpdateSort($users->FK_USERLEVELID, $bCtrl); // FK_USERLEVELID
			$users->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $users;
		$sOrderBy = $users->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($users->SqlOrderBy() <> "") {
				$sOrderBy = $users->SqlOrderBy();
				$users->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $users;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$users->setSessionOrderBy($sOrderBy);
				$users->C_TENDANGNHAP->setSort("");
				$users->FK_MACONGTY->setSort("");
				$users->FK_USERLEVELID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$users->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $users;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"users_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

                // "userpermission"
		$this->ListOptions->Add("userpermission");
		$item =& $this->ListOptions->Items["userpermission"];
		$item->CssStyle = "white-space: nowrap; width: 25px;;";
		$item->Visible = $Security->CanActive();
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($users->Export <> "" ||
			$users->CurrentAction == "gridadd" ||
			$users->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $users;
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

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->CopyUrl . "\">" . "<img src=\"images/copy.gif\" alt=\"" . ew_HtmlEncode($Language->Phrase("CopyLink")) . "\" title=\"" . ew_HtmlEncode($Language->Phrase("CopyLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}


		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($users->PK_NGUOIDUNG_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

                // "userpermission"
		$oListOpt =& $this->ListOptions->Items["userpermission"];
		if ($Security->CanAdd() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . "userprivsub.php?PK_NGUOIDUNG_ID=" . $users->PK_NGUOIDUNG_ID->CurrentValue . "\">" . $Language->Phrase("Permission") . "</a>";
		}

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $users;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $users;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$users->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$users->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $users->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$users->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$users->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$users->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $users;
		$users->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$users->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $users;

		// Load search values
		// PK_NGUOIDUNG_ID

		$users->PK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_NGUOIDUNG_ID"]);
		$users->PK_NGUOIDUNG_ID->AdvancedSearch->SearchOperator = @$_GET["z_PK_NGUOIDUNG_ID"];

		// C_TENDANGNHAP
		$users->C_TENDANGNHAP->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TENDANGNHAP"]);
		$users->C_TENDANGNHAP->AdvancedSearch->SearchOperator = @$_GET["z_C_TENDANGNHAP"];

		// C_MATKHAU
		$users->C_MATKHAU->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_MATKHAU"]);
		$users->C_MATKHAU->AdvancedSearch->SearchOperator = @$_GET["z_C_MATKHAU"];

		// FK_MACONGTY
		$users->FK_MACONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_MACONGTY"]);
		$users->FK_MACONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_MACONGTY"];

		// C_HOTEN
		$users->C_HOTEN->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_HOTEN"]);
		$users->C_HOTEN->AdvancedSearch->SearchOperator = @$_GET["z_C_HOTEN"];

		// C_DIACHI
		$users->C_DIACHI->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DIACHI"]);
		$users->C_DIACHI->AdvancedSearch->SearchOperator = @$_GET["z_C_DIACHI"];

		// C_TEL
		$users->C_TEL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL"]);
		$users->C_TEL->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL"];

		// C_TEL_HOME
		$users->C_TEL_HOME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL_HOME"]);
		$users->C_TEL_HOME->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL_HOME"];

		// C_TEL_MOBILE
		$users->C_TEL_MOBILE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TEL_MOBILE"]);
		$users->C_TEL_MOBILE->AdvancedSearch->SearchOperator = @$_GET["z_C_TEL_MOBILE"];

		// C_FAX
		$users->C_FAX->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FAX"]);
		$users->C_FAX->AdvancedSearch->SearchOperator = @$_GET["z_C_FAX"];

		// C_EMAIL
		$users->C_EMAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EMAIL"]);
		$users->C_EMAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_EMAIL"];

		// FK_USERLEVELID
		$users->FK_USERLEVELID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_USERLEVELID"]);
		$users->FK_USERLEVELID->AdvancedSearch->SearchOperator = @$_GET["z_FK_USERLEVELID"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $users;

		// Call Recordset Selecting event
		$users->Recordset_Selecting($users->CurrentFilter);

		// Load List page SQL
		$sSql = $users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $users;
		$sFilter = $users->KeyFilter();

		// Call Row Selecting event
		$users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$users->CurrentFilter = $sFilter;
		$sSql = $users->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$users->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $users;
		$users->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$users->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$users->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$users->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$users->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$users->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$users->C_TEL->setDbValue($rs->fields('C_TEL'));
		$users->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$users->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$users->C_FAX->setDbValue($rs->fields('C_FAX'));
		$users->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$users->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $users;

		// Initialize URLs
		$this->ViewUrl = $users->ViewUrl();
		$this->EditUrl = $users->EditUrl();
		$this->InlineEditUrl = $users->InlineEditUrl();
		$this->CopyUrl = $users->CopyUrl();
		$this->InlineCopyUrl = $users->InlineCopyUrl();
		$this->DeleteUrl = $users->DeleteUrl();

		// Call Row_Rendering event
		$users->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$users->C_TENDANGNHAP->CellCssStyle = ""; $users->C_TENDANGNHAP->CellCssClass = "";
		$users->C_TENDANGNHAP->CellAttrs = array(); $users->C_TENDANGNHAP->ViewAttrs = array(); $users->C_TENDANGNHAP->EditAttrs = array();

		// FK_MACONGTY
		$users->FK_MACONGTY->CellCssStyle = ""; $users->FK_MACONGTY->CellCssClass = "";
		$users->FK_MACONGTY->CellAttrs = array(); $users->FK_MACONGTY->ViewAttrs = array(); $users->FK_MACONGTY->EditAttrs = array();

		// FK_USERLEVELID
		$users->FK_USERLEVELID->CellCssStyle = ""; $users->FK_USERLEVELID->CellCssClass = "";
		$users->FK_USERLEVELID->CellAttrs = array(); $users->FK_USERLEVELID->ViewAttrs = array(); $users->FK_USERLEVELID->EditAttrs = array();
		if ($users->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$users->PK_NGUOIDUNG_ID->ViewValue = $users->PK_NGUOIDUNG_ID->CurrentValue;
			$users->PK_NGUOIDUNG_ID->CssStyle = "";
			$users->PK_NGUOIDUNG_ID->CssClass = "";
			$users->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->ViewValue = $users->C_TENDANGNHAP->CurrentValue;
			$users->C_TENDANGNHAP->CssStyle = "";
			$users->C_TENDANGNHAP->CssClass = "";
			$users->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$users->C_MATKHAU->ViewValue = "********";
			$users->C_MATKHAU->CssStyle = "";
			$users->C_MATKHAU->CssClass = "";
			$users->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($users->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($users->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$users->FK_MACONGTY->ViewValue = $users->FK_MACONGTY->CurrentValue;
				}
			} else {
				$users->FK_MACONGTY->ViewValue = NULL;
			}
			$users->FK_MACONGTY->CssStyle = "";
			$users->FK_MACONGTY->CssClass = "";
			$users->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$users->C_HOTEN->ViewValue = $users->C_HOTEN->CurrentValue;
			$users->C_HOTEN->CssStyle = "";
			$users->C_HOTEN->CssClass = "";
			$users->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$users->C_DIACHI->ViewValue = $users->C_DIACHI->CurrentValue;
			$users->C_DIACHI->CssStyle = "";
			$users->C_DIACHI->CssClass = "";
			$users->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$users->C_TEL->ViewValue = $users->C_TEL->CurrentValue;
			$users->C_TEL->CssStyle = "";
			$users->C_TEL->CssClass = "";
			$users->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->ViewValue = $users->C_TEL_HOME->CurrentValue;
			$users->C_TEL_HOME->CssStyle = "";
			$users->C_TEL_HOME->CssClass = "";
			$users->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->ViewValue = $users->C_TEL_MOBILE->CurrentValue;
			$users->C_TEL_MOBILE->CssStyle = "";
			$users->C_TEL_MOBILE->CssClass = "";
			$users->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$users->C_FAX->ViewValue = $users->C_FAX->CurrentValue;
			$users->C_FAX->CssStyle = "";
			$users->C_FAX->CssClass = "";
			$users->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$users->C_EMAIL->ViewValue = $users->C_EMAIL->CurrentValue;
			$users->C_EMAIL->CssStyle = "";
			$users->C_EMAIL->CssClass = "";
			$users->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($users->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($users->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$users->FK_USERLEVELID->ViewValue = $users->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$users->FK_USERLEVELID->ViewValue = NULL;
			}
			$users->FK_USERLEVELID->CssStyle = "";
			$users->FK_USERLEVELID->CssClass = "";
			$users->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->HrefValue = "";
			$users->C_TENDANGNHAP->TooltipValue = "";

			// FK_MACONGTY
			$users->FK_MACONGTY->HrefValue = "";
			$users->FK_MACONGTY->TooltipValue = "";

			// FK_USERLEVELID
			$users->FK_USERLEVELID->HrefValue = "";
			$users->FK_USERLEVELID->TooltipValue = "";
		} elseif ($users->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->EditCustomAttributes = "";
			$users->C_TENDANGNHAP->EditValue = ew_HtmlEncode($users->C_TENDANGNHAP->AdvancedSearch->SearchValue);

			// FK_MACONGTY
			$users->FK_MACONGTY->EditCustomAttributes = "";
			$arwrk = GetCompanyTree_User();
			$users->FK_MACONGTY->EditValue = $arwrk;

			// FK_USERLEVELID
			$users->FK_USERLEVELID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `userlevelid`, `userlevelname`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`userleveltype` = 2 AND `userlevelid` not in (-1,0)";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$users->FK_USERLEVELID->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($users->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$users->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $users;

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
		global $users;
		$users->PK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_PK_NGUOIDUNG_ID");
		$users->C_TENDANGNHAP->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_TENDANGNHAP");
		$users->C_MATKHAU->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_MATKHAU");
		$users->FK_MACONGTY->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_FK_MACONGTY");
		$users->C_HOTEN->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_HOTEN");
		$users->C_DIACHI->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_DIACHI");
		$users->C_TEL->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_TEL");
		$users->C_TEL_HOME->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_TEL_HOME");
		$users->C_TEL_MOBILE->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_TEL_MOBILE");
		$users->C_FAX->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_FAX");
		$users->C_EMAIL->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_C_EMAIL");
		$users->FK_USERLEVELID->AdvancedSearch->SearchValue = $users->getAdvancedSearch("x_FK_USERLEVELID");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $users;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $users->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($users->ExportAll) {
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
		if ($users->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($users, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($users->PK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($users->C_TENDANGNHAP);
				$ExportDoc->ExportCaption($users->C_MATKHAU);
				$ExportDoc->ExportCaption($users->FK_MACONGTY);
				$ExportDoc->ExportCaption($users->C_HOTEN);
				$ExportDoc->ExportCaption($users->C_DIACHI);
				$ExportDoc->ExportCaption($users->C_TEL);
				$ExportDoc->ExportCaption($users->C_TEL_HOME);
				$ExportDoc->ExportCaption($users->C_TEL_MOBILE);
				$ExportDoc->ExportCaption($users->C_FAX);
				$ExportDoc->ExportCaption($users->C_EMAIL);
				$ExportDoc->ExportCaption($users->FK_USERLEVELID);
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
				$users->CssClass = "";
				$users->CssStyle = "";
				$users->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($users->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGUOIDUNG_ID', $users->PK_NGUOIDUNG_ID->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TENDANGNHAP', $users->C_TENDANGNHAP->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_MATKHAU', $users->C_MATKHAU->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $users->FK_MACONGTY->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_HOTEN', $users->C_HOTEN->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_DIACHI', $users->C_DIACHI->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL', $users->C_TEL->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_HOME', $users->C_TEL_HOME->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_MOBILE', $users->C_TEL_MOBILE->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_FAX', $users->C_FAX->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $users->C_EMAIL->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('FK_USERLEVELID', $users->FK_USERLEVELID->ExportValue($users->Export, $users->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($users->PK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($users->C_TENDANGNHAP);
					$ExportDoc->ExportField($users->C_MATKHAU);
					$ExportDoc->ExportField($users->FK_MACONGTY);
					$ExportDoc->ExportField($users->C_HOTEN);
					$ExportDoc->ExportField($users->C_DIACHI);
					$ExportDoc->ExportField($users->C_TEL);
					$ExportDoc->ExportField($users->C_TEL_HOME);
					$ExportDoc->ExportField($users->C_TEL_MOBILE);
					$ExportDoc->ExportField($users->C_FAX);
					$ExportDoc->ExportField($users->C_EMAIL);
					$ExportDoc->ExportField($users->FK_USERLEVELID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($users->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($users->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($users->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($users->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($users->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $users;
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
		if ($users->Email_Sending($Email, $EventArgs))
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
		global $users;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($users->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $users->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $users->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $users->PK_NGUOIDUNG_ID); // PK_NGUOIDUNG_ID
		$this->AddSearchQueryString($sQry, $users->C_TENDANGNHAP); // C_TENDANGNHAP
		$this->AddSearchQueryString($sQry, $users->C_MATKHAU); // C_MATKHAU
		$this->AddSearchQueryString($sQry, $users->FK_MACONGTY); // FK_MACONGTY
		$this->AddSearchQueryString($sQry, $users->C_HOTEN); // C_HOTEN
		$this->AddSearchQueryString($sQry, $users->C_DIACHI); // C_DIACHI
		$this->AddSearchQueryString($sQry, $users->C_TEL); // C_TEL
		$this->AddSearchQueryString($sQry, $users->C_TEL_HOME); // C_TEL_HOME
		$this->AddSearchQueryString($sQry, $users->C_TEL_MOBILE); // C_TEL_MOBILE
		$this->AddSearchQueryString($sQry, $users->C_FAX); // C_FAX
		$this->AddSearchQueryString($sQry, $users->C_EMAIL); // C_EMAIL
		$this->AddSearchQueryString($sQry, $users->FK_USERLEVELID); // FK_USERLEVELID

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $users->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $users->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $users;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $users->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $users->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $users->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $users->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $users->GetAdvancedSearch("w_" . $FldParm);
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
