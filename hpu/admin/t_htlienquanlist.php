<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_htlienquaninfo.php" ?>
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
$t_htlienquan_list = new ct_htlienquan_list();
$Page =& $t_htlienquan_list;

// Page init
$t_htlienquan_list->Page_Init();

// Page main
$t_htlienquan_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_htlienquan->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_htlienquan_list = new ew_Page("t_htlienquan_list");

// page properties
t_htlienquan_list.PageID = "list"; // page ID
t_htlienquan_list.FormID = "ft_htlienquanlist"; // form ID
var EW_PAGE_ID = t_htlienquan_list.PageID; // for backward compatibility

// extend page with validate function for search
t_htlienquan_list.ValidateSearch = function(fobj) {
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
t_htlienquan_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_htlienquan_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_htlienquan_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_htlienquan_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_htlienquan->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_htlienquan_list->lTotalRecs = $t_htlienquan->SelectRecordCount();
	} else {
		if ($rs = $t_htlienquan_list->LoadRecordset())
			$t_htlienquan_list->lTotalRecs = $rs->RecordCount();
	}
	$t_htlienquan_list->lStartRec = 1;
	if ($t_htlienquan_list->lDisplayRecs <= 0 || ($t_htlienquan->Export <> "" && $t_htlienquan->ExportAll)) // Display all records
		$t_htlienquan_list->lDisplayRecs = $t_htlienquan_list->lTotalRecs;
	if (!($t_htlienquan->Export <> "" && $t_htlienquan->ExportAll))
		$t_htlienquan_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_htlienquan_list->LoadRecordset($t_htlienquan_list->lStartRec-1, $t_htlienquan_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_htlienquan->TableCaption() ?>
<?php if ($t_htlienquan->Export == "" && $t_htlienquan->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_htlienquan" id="emf_t_htlienquan" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_htlienquan',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_htlienquanlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_htlienquan->Export == "" && $t_htlienquan->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_htlienquan_list);" style="text-decoration: none;"><img id="t_htlienquan_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_htlienquan_list_SearchPanel">
<form name="ft_htlienquanlistsrch" id="ft_htlienquanlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_htlienquan_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_htlienquan">
<?php
if ($gsSearchError == "")
	$t_htlienquan_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_htlienquan->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_htlienquan_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_htlienquan->C_NAME->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_NAME" id="z_C_NAME" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_htlienquan->C_NAME->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_htlienquan->C_NAME->EditValue ?>"<?php echo $t_htlienquan->C_NAME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_htlienquan->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_htlienquan_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_htlienquan->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_htlienquan->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_htlienquan->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_htlienquan_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_htlienquan->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_htlienquan->CurrentAction <> "gridadd" && $t_htlienquan->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_htlienquan_list->Pager)) $t_htlienquan_list->Pager = new cNumericPager($t_htlienquan_list->lStartRec, $t_htlienquan_list->lDisplayRecs, $t_htlienquan_list->lTotalRecs, $t_htlienquan_list->lRecRange) ?>
<?php if ($t_htlienquan_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_htlienquan_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_htlienquan_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_htlienquan_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_htlienquan_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_htlienquan_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_htlienquanlist, '<?php echo $t_htlienquan_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_htlienquanlist" id="ft_htlienquanlist" class="ewForm" action="" method="post">
<div id="gmp_t_htlienquan" class="ewGridMiddlePanel">
<?php if ($t_htlienquan_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_htlienquan->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_htlienquan_list->RenderListOptions();

// Render list options (header, left)
$t_htlienquan_list->ListOptions->Render("header", "left");
?>
<?php if ($t_htlienquan->FK_OB_ID->Visible) { // FK_OB_ID ?>
	<?php if ($t_htlienquan->SortUrl($t_htlienquan->FK_OB_ID) == "") { ?>
		<td><?php echo $t_htlienquan->FK_OB_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_htlienquan->SortUrl($t_htlienquan->FK_OB_ID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_htlienquan->FK_OB_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_htlienquan->FK_OB_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_htlienquan->FK_OB_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_htlienquan->C_NAME->Visible) { // C_NAME ?>
	<?php if ($t_htlienquan->SortUrl($t_htlienquan->C_NAME) == "") { ?>
		<td><?php echo $t_htlienquan->C_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_htlienquan->SortUrl($t_htlienquan->C_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_htlienquan->C_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_htlienquan->C_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_htlienquan->C_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_htlienquan->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_htlienquan->SortUrl($t_htlienquan->C_ACTIVE) == "") { ?>
		<td><?php echo $t_htlienquan->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_htlienquan->SortUrl($t_htlienquan->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_htlienquan->C_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_htlienquan->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_htlienquan->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_htlienquan_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_htlienquan->ExportAll && $t_htlienquan->Export <> "") {
	$t_htlienquan_list->lStopRec = $t_htlienquan_list->lTotalRecs;
} else {
	$t_htlienquan_list->lStopRec = $t_htlienquan_list->lStartRec + $t_htlienquan_list->lDisplayRecs - 1; // Set the last record to display
}
$t_htlienquan_list->lRecCount = $t_htlienquan_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_htlienquan_list->lStartRec > 1)
		$rs->Move($t_htlienquan_list->lStartRec - 1);
}

// Initialize aggregate
$t_htlienquan->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_htlienquan_list->RenderRow();
$t_htlienquan_list->lRowCnt = 0;
while (($t_htlienquan->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_htlienquan_list->lRecCount < $t_htlienquan_list->lStopRec) {
	$t_htlienquan_list->lRecCount++;
	if (intval($t_htlienquan_list->lRecCount) >= intval($t_htlienquan_list->lStartRec)) {
		$t_htlienquan_list->lRowCnt++;

	// Init row class and style
	$t_htlienquan->CssClass = "";
	$t_htlienquan->CssStyle = "";
	$t_htlienquan->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_htlienquan->CurrentAction == "gridadd") {
		$t_htlienquan_list->LoadDefaultValues(); // Load default values
	} else {
		$t_htlienquan_list->LoadRowValues($rs); // Load row values
	}
	$t_htlienquan->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_htlienquan_list->RenderRow();

	// Render list options
	$t_htlienquan_list->RenderListOptions();
?>
	<tr<?php echo $t_htlienquan->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_htlienquan_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_htlienquan->FK_OB_ID->Visible) { // FK_OB_ID ?>
		<td<?php echo $t_htlienquan->FK_OB_ID->CellAttributes() ?>>
<div<?php echo $t_htlienquan->FK_OB_ID->ViewAttributes() ?>><?php echo $t_htlienquan->FK_OB_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_htlienquan->C_NAME->Visible) { // C_NAME ?>
		<td<?php echo $t_htlienquan->C_NAME->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_NAME->ViewAttributes() ?>><?php echo $t_htlienquan->C_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_htlienquan->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_htlienquan->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_ACTIVE->ViewAttributes() ?>><?php echo $t_htlienquan->C_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_htlienquan_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_htlienquan->CurrentAction <> "gridadd")
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
<?php if ($t_htlienquan_list->lTotalRecs > 0) { ?>
<?php if ($t_htlienquan->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_htlienquan->CurrentAction <> "gridadd" && $t_htlienquan->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_htlienquan_list->Pager)) $t_htlienquan_list->Pager = new cNumericPager($t_htlienquan_list->lStartRec, $t_htlienquan_list->lDisplayRecs, $t_htlienquan_list->lTotalRecs, $t_htlienquan_list->lRecRange) ?>
<?php if ($t_htlienquan_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_htlienquan_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_htlienquan_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_list->PageUrl() ?>start=<?php echo $t_htlienquan_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_htlienquan_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_htlienquan_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_htlienquan_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_htlienquan_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_htlienquan_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_htlienquanlist, '<?php echo $t_htlienquan_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_htlienquan->Export == "" && $t_htlienquan->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_htlienquan->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_htlienquan_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_htlienquan_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_htlienquan';

	// Page object name
	var $PageObjName = 't_htlienquan_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) $PageUrl .= "t=" . $t_htlienquan->TableVar . "&"; // Add page token
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
		global $objForm, $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) {
			if ($objForm)
				return ($t_htlienquan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_htlienquan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_htlienquan_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_htlienquan)
		$GLOBALS["t_htlienquan"] = new ct_htlienquan();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_htlienquan"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_htlienquandelete.php";
		$this->MultiUpdateUrl = "t_htlienquanupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_htlienquan', TRUE);

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
		global $t_htlienquan;

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
			$t_htlienquan->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_htlienquan->Export = $_POST["exporttype"];
		} else {
			$t_htlienquan->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_htlienquan->Export; // Get export parameter, used in header
		$gsExportFile = $t_htlienquan->TableVar; // Get export file, used in header
		if (in_array($t_htlienquan->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_htlienquan->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_htlienquan->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_htlienquan->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_htlienquan->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_htlienquan;

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
			$t_htlienquan->Recordset_SearchValidated();

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
		if ($t_htlienquan->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_htlienquan->getRecordsPerPage(); // Restore from Session
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
		$t_htlienquan->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_htlienquan->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_htlienquan->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_htlienquan->getSearchWhere();
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
		$t_htlienquan->setSessionWhere($sFilter);
		$t_htlienquan->CurrentFilter = "";

		// Export data only
		if (in_array($t_htlienquan->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_htlienquan->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_htlienquan;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_htlienquan->SYS_ID, FALSE); // SYS_ID
		$this->BuildSearchSql($sWhere, $t_htlienquan->FK_OB_ID, TRUE); // FK_OB_ID
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_NAME, FALSE); // C_NAME
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_URL, FALSE); // C_URL
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_ACTIVE, FALSE); // C_ACTIVE
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_htlienquan->C_EDIT_TIME, FALSE); // C_EDIT_TIME

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_htlienquan->SYS_ID); // SYS_ID
			$this->SetSearchParm($t_htlienquan->FK_OB_ID); // FK_OB_ID
			$this->SetSearchParm($t_htlienquan->C_NAME); // C_NAME
			$this->SetSearchParm($t_htlienquan->C_URL); // C_URL
			$this->SetSearchParm($t_htlienquan->C_ACTIVE); // C_ACTIVE
			$this->SetSearchParm($t_htlienquan->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_htlienquan->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_htlienquan->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_htlienquan->C_EDIT_TIME); // C_EDIT_TIME
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
		global $t_htlienquan;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_htlienquan->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_htlienquan->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_htlienquan->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_htlienquan->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_htlienquan->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_htlienquan;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_htlienquan->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_htlienquan->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_htlienquan->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_htlienquan->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_htlienquan->GetAdvancedSearch("w_$FldParm");
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
		global $t_htlienquan;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_htlienquan->FK_OB_ID, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_htlienquan->C_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_htlienquan->C_URL, $Keyword);
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
		global $Security, $t_htlienquan;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_htlienquan->BasicSearchKeyword;
		$sSearchType = $t_htlienquan->BasicSearchType;
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
			$t_htlienquan->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_htlienquan->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_htlienquan;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_htlienquan->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_htlienquan;
		$t_htlienquan->setSessionBasicSearchKeyword("");
		$t_htlienquan->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_htlienquan;
		$t_htlienquan->setAdvancedSearch("x_SYS_ID", "");
		$t_htlienquan->setAdvancedSearch("x_FK_OB_ID", "");
		$t_htlienquan->setAdvancedSearch("x_C_NAME", "");
		$t_htlienquan->setAdvancedSearch("x_C_URL", "");
		$t_htlienquan->setAdvancedSearch("x_C_ACTIVE", "");
		$t_htlienquan->setAdvancedSearch("x_C_USER_ADD", "");
		$t_htlienquan->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_htlienquan->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_htlienquan->setAdvancedSearch("x_C_EDIT_TIME", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_htlienquan;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_SYS_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_OB_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NAME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_URL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_htlienquan->BasicSearchKeyword = $t_htlienquan->getSessionBasicSearchKeyword();
			$t_htlienquan->BasicSearchType = $t_htlienquan->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_htlienquan->SYS_ID);
			$this->GetSearchParm($t_htlienquan->FK_OB_ID);
			$this->GetSearchParm($t_htlienquan->C_NAME);
			$this->GetSearchParm($t_htlienquan->C_URL);
			$this->GetSearchParm($t_htlienquan->C_ACTIVE);
			$this->GetSearchParm($t_htlienquan->C_USER_ADD);
			$this->GetSearchParm($t_htlienquan->C_ADD_TIME);
			$this->GetSearchParm($t_htlienquan->C_USER_EDIT);
			$this->GetSearchParm($t_htlienquan->C_EDIT_TIME);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_htlienquan;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_htlienquan->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_htlienquan->CurrentOrderType = @$_GET["ordertype"];
			$t_htlienquan->UpdateSort($t_htlienquan->FK_OB_ID, $bCtrl); // FK_OB_ID
			$t_htlienquan->UpdateSort($t_htlienquan->C_NAME, $bCtrl); // C_NAME
			$t_htlienquan->UpdateSort($t_htlienquan->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_htlienquan->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_htlienquan;
		$sOrderBy = $t_htlienquan->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_htlienquan->SqlOrderBy() <> "") {
				$sOrderBy = $t_htlienquan->SqlOrderBy();
				$t_htlienquan->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_htlienquan;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_htlienquan->setSessionOrderBy($sOrderBy);
				$t_htlienquan->FK_OB_ID->setSort("");
				$t_htlienquan->C_NAME->setSort("");
				$t_htlienquan->C_ACTIVE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_htlienquan;

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
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_htlienquan_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_htlienquan->Export <> "" ||
			$t_htlienquan->CurrentAction == "gridadd" ||
			$t_htlienquan->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_htlienquan;
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
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_htlienquan->SYS_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_htlienquan;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_htlienquan;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_htlienquan->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_htlienquan->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_htlienquan->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_htlienquan;
		$t_htlienquan->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_htlienquan->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_htlienquan;

		// Load search values
		// SYS_ID

		$t_htlienquan->SYS_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_SYS_ID"]);
		$t_htlienquan->SYS_ID->AdvancedSearch->SearchOperator = @$_GET["z_SYS_ID"];

		// FK_OB_ID
		$t_htlienquan->FK_OB_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_OB_ID"]);
		$t_htlienquan->FK_OB_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_OB_ID"];

		// C_NAME
		$t_htlienquan->C_NAME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NAME"]);
		$t_htlienquan->C_NAME->AdvancedSearch->SearchOperator = @$_GET["z_C_NAME"];

		// C_URL
		$t_htlienquan->C_URL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_URL"]);
		$t_htlienquan->C_URL->AdvancedSearch->SearchOperator = @$_GET["z_C_URL"];

		// C_ACTIVE
		$t_htlienquan->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE"]);
		$t_htlienquan->C_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE"];

		// C_USER_ADD
		$t_htlienquan->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_htlienquan->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_htlienquan->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_htlienquan->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_htlienquan->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_htlienquan->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_htlienquan->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_htlienquan->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_htlienquan;

		// Call Recordset Selecting event
		$t_htlienquan->Recordset_Selecting($t_htlienquan->CurrentFilter);

		// Load List page SQL
		$sSql = $t_htlienquan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_htlienquan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_htlienquan;
		$sFilter = $t_htlienquan->KeyFilter();

		// Call Row Selecting event
		$t_htlienquan->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_htlienquan->CurrentFilter = $sFilter;
		$sSql = $t_htlienquan->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_htlienquan->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_htlienquan;
		$t_htlienquan->SYS_ID->setDbValue($rs->fields('SYS_ID'));
		$t_htlienquan->FK_OB_ID->setDbValue($rs->fields('FK_OB_ID'));
		$t_htlienquan->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_htlienquan->C_ICON->Upload->DbValue = $rs->fields('C_ICON');
		$t_htlienquan->C_URL->setDbValue($rs->fields('C_URL'));
		$t_htlienquan->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_htlienquan->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_htlienquan->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_htlienquan->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_htlienquan->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_htlienquan;

		// Initialize URLs
		$this->ViewUrl = $t_htlienquan->ViewUrl();
		$this->EditUrl = $t_htlienquan->EditUrl();
		$this->InlineEditUrl = $t_htlienquan->InlineEditUrl();
		$this->CopyUrl = $t_htlienquan->CopyUrl();
		$this->InlineCopyUrl = $t_htlienquan->InlineCopyUrl();
		$this->DeleteUrl = $t_htlienquan->DeleteUrl();

		// Call Row_Rendering event
		$t_htlienquan->Row_Rendering();

		// Common render codes for all row types
		// FK_OB_ID

		$t_htlienquan->FK_OB_ID->CellCssStyle = ""; $t_htlienquan->FK_OB_ID->CellCssClass = "";
		$t_htlienquan->FK_OB_ID->CellAttrs = array(); $t_htlienquan->FK_OB_ID->ViewAttrs = array(); $t_htlienquan->FK_OB_ID->EditAttrs = array();

		// C_NAME
		$t_htlienquan->C_NAME->CellCssStyle = ""; $t_htlienquan->C_NAME->CellCssClass = "";
		$t_htlienquan->C_NAME->CellAttrs = array(); $t_htlienquan->C_NAME->ViewAttrs = array(); $t_htlienquan->C_NAME->EditAttrs = array();

		// C_ACTIVE
		$t_htlienquan->C_ACTIVE->CellCssStyle = ""; $t_htlienquan->C_ACTIVE->CellCssClass = "";
		$t_htlienquan->C_ACTIVE->CellAttrs = array(); $t_htlienquan->C_ACTIVE->ViewAttrs = array(); $t_htlienquan->C_ACTIVE->EditAttrs = array();
		if ($t_htlienquan->RowType == EW_ROWTYPE_VIEW) { // View row

			// SYS_ID
			$t_htlienquan->SYS_ID->ViewValue = $t_htlienquan->SYS_ID->CurrentValue;
			$t_htlienquan->SYS_ID->CssStyle = "";
			$t_htlienquan->SYS_ID->CssClass = "";
			$t_htlienquan->SYS_ID->ViewCustomAttributes = "";

			// FK_OB_ID
			if (strval($t_htlienquan->FK_OB_ID->CurrentValue) <> "") {
				$t_htlienquan->FK_OB_ID->ViewValue = "";
				$arwrk = explode(",", strval($t_htlienquan->FK_OB_ID->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "1":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Danh mục tuyển sinh";
							break;
						case "2":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Đối tượng sinh viên đang học";
							break;
                                                case "3":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối phòng";
							break;
                                                case "4":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối ban";
							break;
                                                  case "5":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Hệ thống HPU";
							break;
						default:
							$t_htlienquan->FK_OB_ID->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_htlienquan->FK_OB_ID->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_htlienquan->FK_OB_ID->ViewValue = NULL;
			}
			$t_htlienquan->FK_OB_ID->CssStyle = "";
			$t_htlienquan->FK_OB_ID->CssClass = "";
			$t_htlienquan->FK_OB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_htlienquan->C_NAME->ViewValue = $t_htlienquan->C_NAME->CurrentValue;
			$t_htlienquan->C_NAME->CssStyle = "";
			$t_htlienquan->C_NAME->CssClass = "";
			$t_htlienquan->C_NAME->ViewCustomAttributes = "";

			// C_URL
			$t_htlienquan->C_URL->ViewValue = $t_htlienquan->C_URL->CurrentValue;
			$t_htlienquan->C_URL->CssStyle = "";
			$t_htlienquan->C_URL->CssClass = "";
			$t_htlienquan->C_URL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_htlienquan->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_htlienquan->C_ACTIVE->CurrentValue) {
					case "0":
						$t_htlienquan->C_ACTIVE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_htlienquan->C_ACTIVE->ViewValue = "Kích hoạt";
						break;
					default:
						$t_htlienquan->C_ACTIVE->ViewValue = $t_htlienquan->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_htlienquan->C_ACTIVE->ViewValue = NULL;
			}
			$t_htlienquan->C_ACTIVE->CssStyle = "";
			$t_htlienquan->C_ACTIVE->CssClass = "";
			$t_htlienquan->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_htlienquan->C_USER_ADD->ViewValue = $t_htlienquan->C_USER_ADD->CurrentValue;
			$t_htlienquan->C_USER_ADD->CssStyle = "";
			$t_htlienquan->C_USER_ADD->CssClass = "";
			$t_htlienquan->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_htlienquan->C_ADD_TIME->ViewValue = $t_htlienquan->C_ADD_TIME->CurrentValue;
			$t_htlienquan->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_ADD_TIME->ViewValue, 7);
			$t_htlienquan->C_ADD_TIME->CssStyle = "";
			$t_htlienquan->C_ADD_TIME->CssClass = "";
			$t_htlienquan->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->ViewValue = $t_htlienquan->C_USER_EDIT->CurrentValue;
			$t_htlienquan->C_USER_EDIT->CssStyle = "";
			$t_htlienquan->C_USER_EDIT->CssClass = "";
			$t_htlienquan->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->ViewValue = $t_htlienquan->C_EDIT_TIME->CurrentValue;
			$t_htlienquan->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_EDIT_TIME->ViewValue, 7);
			$t_htlienquan->C_EDIT_TIME->CssStyle = "";
			$t_htlienquan->C_EDIT_TIME->CssClass = "";
			$t_htlienquan->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->HrefValue = "";
			$t_htlienquan->FK_OB_ID->TooltipValue = "";

			// C_NAME
			$t_htlienquan->C_NAME->HrefValue = "";
			$t_htlienquan->C_NAME->TooltipValue = "";

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->HrefValue = "";
			$t_htlienquan->C_ACTIVE->TooltipValue = "";
		} elseif ($t_htlienquan->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Danh mục tuyển sinh");
			$arwrk[] = array("2", "Đối tượng sinh viên đang học");
                        $arwrk[] = array("3", "Khối phòng");
                        $arwrk[] = array("4", "Khối ban");
                        $arwrk[] = array("5", "Hệ thống HPU");
			$t_htlienquan->FK_OB_ID->EditValue = $arwrk;

			// C_NAME
			$t_htlienquan->C_NAME->EditCustomAttributes = "";
			$t_htlienquan->C_NAME->EditValue = ew_HtmlEncode($t_htlienquan->C_NAME->AdvancedSearch->SearchValue);

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_htlienquan->C_ACTIVE->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_htlienquan->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_htlienquan->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_htlienquan;

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
		global $t_htlienquan;
		$t_htlienquan->SYS_ID->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_SYS_ID");
		$t_htlienquan->FK_OB_ID->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_FK_OB_ID");
		$t_htlienquan->C_NAME->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_NAME");
		$t_htlienquan->C_URL->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_URL");
		$t_htlienquan->C_ACTIVE->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_ACTIVE");
		$t_htlienquan->C_USER_ADD->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_USER_ADD");
		$t_htlienquan->C_ADD_TIME->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_ADD_TIME");
		$t_htlienquan->C_USER_EDIT->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_USER_EDIT");
		$t_htlienquan->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_htlienquan->getAdvancedSearch("x_C_EDIT_TIME");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_htlienquan;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_htlienquan->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_htlienquan->ExportAll) {
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
		if ($t_htlienquan->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_htlienquan, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_htlienquan->SYS_ID);
				$ExportDoc->ExportCaption($t_htlienquan->FK_OB_ID);
				$ExportDoc->ExportCaption($t_htlienquan->C_NAME);
				$ExportDoc->ExportCaption($t_htlienquan->C_URL);
				$ExportDoc->ExportCaption($t_htlienquan->C_ACTIVE);
				$ExportDoc->ExportCaption($t_htlienquan->C_USER_ADD);
				$ExportDoc->ExportCaption($t_htlienquan->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_htlienquan->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_htlienquan->C_EDIT_TIME);
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
				$t_htlienquan->CssClass = "";
				$t_htlienquan->CssStyle = "";
				$t_htlienquan->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_htlienquan->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('SYS_ID', $t_htlienquan->SYS_ID->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('FK_OB_ID', $t_htlienquan->FK_OB_ID->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_NAME', $t_htlienquan->C_NAME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_htlienquan->C_URL->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_htlienquan->C_ACTIVE->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_htlienquan->C_USER_ADD->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_htlienquan->C_ADD_TIME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_htlienquan->C_USER_EDIT->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_htlienquan->C_EDIT_TIME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_htlienquan->SYS_ID);
					$ExportDoc->ExportField($t_htlienquan->FK_OB_ID);
					$ExportDoc->ExportField($t_htlienquan->C_NAME);
					$ExportDoc->ExportField($t_htlienquan->C_URL);
					$ExportDoc->ExportField($t_htlienquan->C_ACTIVE);
					$ExportDoc->ExportField($t_htlienquan->C_USER_ADD);
					$ExportDoc->ExportField($t_htlienquan->C_ADD_TIME);
					$ExportDoc->ExportField($t_htlienquan->C_USER_EDIT);
					$ExportDoc->ExportField($t_htlienquan->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_htlienquan->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_htlienquan->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_htlienquan->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_htlienquan->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_htlienquan->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_htlienquan;
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
		if ($t_htlienquan->Email_Sending($Email, $EventArgs))
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
		global $t_htlienquan;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_htlienquan->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_htlienquan->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_htlienquan->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_htlienquan->SYS_ID); // SYS_ID
		$this->AddSearchQueryString($sQry, $t_htlienquan->FK_OB_ID); // FK_OB_ID
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_NAME); // C_NAME
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_URL); // C_URL
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_ACTIVE); // C_ACTIVE
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_htlienquan->C_EDIT_TIME); // C_EDIT_TIME

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_htlienquan->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_htlienquan->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_htlienquan;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_htlienquan->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_htlienquan->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_htlienquan->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_htlienquan->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_htlienquan->GetAdvancedSearch("w_" . $FldParm);
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
