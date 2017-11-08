<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmucgioithieuinfo.php" ?>
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
$t_danhmucgioithieu_list = new ct_danhmucgioithieu_list();
$Page =& $t_danhmucgioithieu_list;

// Page init
$t_danhmucgioithieu_list->Page_Init();

// Page main
$t_danhmucgioithieu_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmucgioithieu_list = new ew_Page("t_danhmucgioithieu_list");

// page properties
t_danhmucgioithieu_list.PageID = "list"; // page ID
t_danhmucgioithieu_list.FormID = "ft_danhmucgioithieulist"; // form ID
var EW_PAGE_ID = t_danhmucgioithieu_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_danhmucgioithieu_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmucgioithieu_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmucgioithieu_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmucgioithieu_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_danhmucgioithieu_list->lTotalRecs = $t_danhmucgioithieu->SelectRecordCount();
	} else {
		if ($rs = $t_danhmucgioithieu_list->LoadRecordset())
			$t_danhmucgioithieu_list->lTotalRecs = $rs->RecordCount();
	}
	$t_danhmucgioithieu_list->lStartRec = 1;
	if ($t_danhmucgioithieu_list->lDisplayRecs <= 0 || ($t_danhmucgioithieu->Export <> "" && $t_danhmucgioithieu->ExportAll)) // Display all records
		$t_danhmucgioithieu_list->lDisplayRecs = $t_danhmucgioithieu_list->lTotalRecs;
	if (!($t_danhmucgioithieu->Export <> "" && $t_danhmucgioithieu->ExportAll))
		$t_danhmucgioithieu_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_danhmucgioithieu_list->LoadRecordset($t_danhmucgioithieu_list->lStartRec-1, $t_danhmucgioithieu_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_danhmucgioithieu->TableCaption() ?>
<?php if ($t_danhmucgioithieu->Export == "" && $t_danhmucgioithieu->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_danhmucgioithieu" id="emf_t_danhmucgioithieu" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_danhmucgioithieu',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_danhmucgioithieulist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_danhmucgioithieu->Export == "" && $t_danhmucgioithieu->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_danhmucgioithieu_list);" style="text-decoration: none;"><img id="t_danhmucgioithieu_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_danhmucgioithieu_list_SearchPanel">
<form name="ft_danhmucgioithieulistsrch" id="ft_danhmucgioithieulistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_danhmucgioithieu">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="100" value="<?php echo ew_HtmlEncode($t_danhmucgioithieu->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_danhmucgioithieu->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_danhmucgioithieu->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_danhmucgioithieu->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmucgioithieu_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_danhmucgioithieu->CurrentAction <> "gridadd" && $t_danhmucgioithieu->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmucgioithieu_list->Pager)) $t_danhmucgioithieu_list->Pager = new cNumericPager($t_danhmucgioithieu_list->lStartRec, $t_danhmucgioithieu_list->lDisplayRecs, $t_danhmucgioithieu_list->lTotalRecs, $t_danhmucgioithieu_list->lRecRange) ?>
<?php if ($t_danhmucgioithieu_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmucgioithieu_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmucgioithieu_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmucgioithieu_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_danhmucgioithieu_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_danhmucgioithieu_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_danhmucgioithieulist, '<?php echo $t_danhmucgioithieu_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_danhmucgioithieulist" id="ft_danhmucgioithieulist" class="ewForm" action="" method="post">
<div id="gmp_t_danhmucgioithieu" class="ewGridMiddlePanel">
<?php if ($t_danhmucgioithieu_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_danhmucgioithieu->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_danhmucgioithieu_list->RenderListOptions();

// Render list options (header, left)
$t_danhmucgioithieu_list->ListOptions->Render("header", "left");
?>
<?php if ($t_danhmucgioithieu->C_TYPE->Visible) { // C_TYPE ?>
	<?php if ($t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_TYPE) == "") { ?>
		<td><?php echo $t_danhmucgioithieu->C_TYPE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_TYPE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmucgioithieu->C_TYPE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_danhmucgioithieu->C_TYPE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmucgioithieu->C_TYPE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_danhmucgioithieu->C_NAME->Visible) { // C_NAME ?>
	<?php if ($t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_NAME) == "") { ?>
		<td><?php echo $t_danhmucgioithieu->C_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmucgioithieu->C_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_danhmucgioithieu->C_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmucgioithieu->C_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_danhmucgioithieu->C_ORDER->Visible) { // C_ORDER ?>
	<?php if ($t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_ORDER) == "") { ?>
		<td><?php echo $t_danhmucgioithieu->C_ORDER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_ORDER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmucgioithieu->C_ORDER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_danhmucgioithieu->C_ORDER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmucgioithieu->C_ORDER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_danhmucgioithieu->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_ACTIVE) == "") { ?>
		<td><?php echo $t_danhmucgioithieu->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmucgioithieu->SortUrl($t_danhmucgioithieu->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmucgioithieu->C_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_danhmucgioithieu->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmucgioithieu->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_danhmucgioithieu_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_danhmucgioithieu->ExportAll && $t_danhmucgioithieu->Export <> "") {
	$t_danhmucgioithieu_list->lStopRec = $t_danhmucgioithieu_list->lTotalRecs;
} else {
	$t_danhmucgioithieu_list->lStopRec = $t_danhmucgioithieu_list->lStartRec + $t_danhmucgioithieu_list->lDisplayRecs - 1; // Set the last record to display
}
$t_danhmucgioithieu_list->lRecCount = $t_danhmucgioithieu_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_danhmucgioithieu_list->lStartRec > 1)
		$rs->Move($t_danhmucgioithieu_list->lStartRec - 1);
}

// Initialize aggregate
$t_danhmucgioithieu->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_danhmucgioithieu_list->RenderRow();
$t_danhmucgioithieu_list->lRowCnt = 0;
while (($t_danhmucgioithieu->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_danhmucgioithieu_list->lRecCount < $t_danhmucgioithieu_list->lStopRec) {
	$t_danhmucgioithieu_list->lRecCount++;
	if (intval($t_danhmucgioithieu_list->lRecCount) >= intval($t_danhmucgioithieu_list->lStartRec)) {
		$t_danhmucgioithieu_list->lRowCnt++;

	// Init row class and style
	$t_danhmucgioithieu->CssClass = "";
	$t_danhmucgioithieu->CssStyle = "";
	$t_danhmucgioithieu->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_danhmucgioithieu->CurrentAction == "gridadd") {
		$t_danhmucgioithieu_list->LoadDefaultValues(); // Load default values
	} else {
		$t_danhmucgioithieu_list->LoadRowValues($rs); // Load row values
	}
	$t_danhmucgioithieu->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_danhmucgioithieu_list->RenderRow();

	// Render list options
	$t_danhmucgioithieu_list->RenderListOptions();
?>
	<tr<?php echo $t_danhmucgioithieu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_danhmucgioithieu_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_danhmucgioithieu->C_TYPE->Visible) { // C_TYPE ?>
		<td<?php echo $t_danhmucgioithieu->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_TYPE->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_TYPE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_danhmucgioithieu->C_NAME->Visible) { // C_NAME ?>
		<td<?php echo $t_danhmucgioithieu->C_NAME->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_NAME->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($t_danhmucgioithieu->C_ORDER->Visible) { // C_ORDER ?>
		<td<?php echo $t_danhmucgioithieu->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_ORDER->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_ORDER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_danhmucgioithieu->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_danhmucgioithieu->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_ACTIVE->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_danhmucgioithieu_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_danhmucgioithieu->CurrentAction <> "gridadd")
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
<?php if ($t_danhmucgioithieu_list->lTotalRecs > 0) { ?>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_danhmucgioithieu->CurrentAction <> "gridadd" && $t_danhmucgioithieu->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmucgioithieu_list->Pager)) $t_danhmucgioithieu_list->Pager = new cNumericPager($t_danhmucgioithieu_list->lStartRec, $t_danhmucgioithieu_list->lDisplayRecs, $t_danhmucgioithieu_list->lTotalRecs, $t_danhmucgioithieu_list->lRecRange) ?>
<?php if ($t_danhmucgioithieu_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmucgioithieu_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmucgioithieu_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_list->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_danhmucgioithieu_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmucgioithieu_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_danhmucgioithieu_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_danhmucgioithieu_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_danhmucgioithieu_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_danhmucgioithieulist, '<?php echo $t_danhmucgioithieu_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_danhmucgioithieu->Export == "" && $t_danhmucgioithieu->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_danhmucgioithieu_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmucgioithieu_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_danhmucgioithieu';

	// Page object name
	var $PageObjName = 't_danhmucgioithieu_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmucgioithieu->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmucgioithieu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmucgioithieu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmucgioithieu_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmucgioithieu)
		$GLOBALS["t_danhmucgioithieu"] = new ct_danhmucgioithieu();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_danhmucgioithieu"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_danhmucgioithieudelete.php";
		$this->MultiUpdateUrl = "t_danhmucgioithieuupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmucgioithieu', TRUE);

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
		global $t_danhmucgioithieu;

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
			$t_danhmucgioithieu->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_danhmucgioithieu->Export = $_POST["exporttype"];
		} else {
			$t_danhmucgioithieu->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_danhmucgioithieu->Export; // Get export parameter, used in header
		$gsExportFile = $t_danhmucgioithieu->TableVar; // Get export file, used in header
		if (in_array($t_danhmucgioithieu->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_danhmucgioithieu->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_danhmucgioithieu->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_danhmucgioithieu->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_danhmucgioithieu->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_danhmucgioithieu;

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

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$t_danhmucgioithieu->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($t_danhmucgioithieu->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_danhmucgioithieu->getRecordsPerPage(); // Restore from Session
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
		$t_danhmucgioithieu->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_danhmucgioithieu->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_danhmucgioithieu->getSearchWhere();
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
		$t_danhmucgioithieu->setSessionWhere($sFilter);
		$t_danhmucgioithieu->CurrentFilter = "";

		// Export data only
		if (in_array($t_danhmucgioithieu->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_danhmucgioithieu->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_danhmucgioithieu;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_danhmucgioithieu->C_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_danhmucgioithieu->C_URL, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_danhmucgioithieu->C_DESCRIPTION, $Keyword);
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
		global $Security, $t_danhmucgioithieu;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_danhmucgioithieu->BasicSearchKeyword;
		$sSearchType = $t_danhmucgioithieu->BasicSearchType;
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
			$t_danhmucgioithieu->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_danhmucgioithieu->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_danhmucgioithieu;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_danhmucgioithieu->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_danhmucgioithieu;
		$t_danhmucgioithieu->setSessionBasicSearchKeyword("");
		$t_danhmucgioithieu->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_danhmucgioithieu;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_danhmucgioithieu->BasicSearchKeyword = $t_danhmucgioithieu->getSessionBasicSearchKeyword();
			$t_danhmucgioithieu->BasicSearchType = $t_danhmucgioithieu->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_danhmucgioithieu;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_danhmucgioithieu->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_danhmucgioithieu->CurrentOrderType = @$_GET["ordertype"];
			$t_danhmucgioithieu->UpdateSort($t_danhmucgioithieu->C_TYPE, $bCtrl); // C_TYPE
			$t_danhmucgioithieu->UpdateSort($t_danhmucgioithieu->C_NAME, $bCtrl); // C_NAME
			$t_danhmucgioithieu->UpdateSort($t_danhmucgioithieu->C_URL, $bCtrl); // C_URL
			$t_danhmucgioithieu->UpdateSort($t_danhmucgioithieu->C_ORDER, $bCtrl); // C_ORDER
			$t_danhmucgioithieu->UpdateSort($t_danhmucgioithieu->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_danhmucgioithieu->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_danhmucgioithieu;
		$sOrderBy = $t_danhmucgioithieu->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_danhmucgioithieu->SqlOrderBy() <> "") {
				$sOrderBy = $t_danhmucgioithieu->SqlOrderBy();
				$t_danhmucgioithieu->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_danhmucgioithieu;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_danhmucgioithieu->setSessionOrderBy($sOrderBy);
				$t_danhmucgioithieu->C_TYPE->setSort("");
				$t_danhmucgioithieu->C_NAME->setSort("");
				$t_danhmucgioithieu->C_URL->setSort("");
				$t_danhmucgioithieu->C_ORDER->setSort("");
				$t_danhmucgioithieu->C_ACTIVE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_danhmucgioithieu;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_danhmucgioithieu_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_danhmucgioithieu->Export <> "" ||
			$t_danhmucgioithieu->CurrentAction == "gridadd" ||
			$t_danhmucgioithieu->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_danhmucgioithieu;
		$this->ListOptions->LoadDefault();

		// "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($Security->CanView() && $oListOpt->Visible)
			$oListOpt->Body = "<a href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";

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
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_danhmucgioithieu;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_danhmucgioithieu;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_danhmucgioithieu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_danhmucgioithieu;
		$t_danhmucgioithieu->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_danhmucgioithieu->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_danhmucgioithieu;

		// Call Recordset Selecting event
		$t_danhmucgioithieu->Recordset_Selecting($t_danhmucgioithieu->CurrentFilter);

		// Load List page SQL
		$sSql = $t_danhmucgioithieu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_danhmucgioithieu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmucgioithieu;
		$sFilter = $t_danhmucgioithieu->KeyFilter();

		// Call Row Selecting event
		$t_danhmucgioithieu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmucgioithieu->CurrentFilter = $sFilter;
		$sSql = $t_danhmucgioithieu->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmucgioithieu->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmucgioithieu;
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setDbValue($rs->fields('PK_DANHMUCGIOITHIEU'));
		$t_danhmucgioithieu->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_danhmucgioithieu->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_danhmucgioithieu->C_URL->setDbValue($rs->fields('C_URL'));
		$t_danhmucgioithieu->C_DESCRIPTION->setDbValue($rs->fields('C_DESCRIPTION'));
		$t_danhmucgioithieu->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_danhmucgioithieu->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_danhmucgioithieu->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_danhmucgioithieu->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_danhmucgioithieu->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_danhmucgioithieu->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmucgioithieu;

		// Initialize URLs
		$this->ViewUrl = $t_danhmucgioithieu->ViewUrl();
		$this->EditUrl = $t_danhmucgioithieu->EditUrl();
		$this->InlineEditUrl = $t_danhmucgioithieu->InlineEditUrl();
		$this->CopyUrl = $t_danhmucgioithieu->CopyUrl();
		$this->InlineCopyUrl = $t_danhmucgioithieu->InlineCopyUrl();
		$this->DeleteUrl = $t_danhmucgioithieu->DeleteUrl();

		// Call Row_Rendering event
		$t_danhmucgioithieu->Row_Rendering();

		// Common render codes for all row types
		// C_TYPE

		$t_danhmucgioithieu->C_TYPE->CellCssStyle = ""; $t_danhmucgioithieu->C_TYPE->CellCssClass = "";
		$t_danhmucgioithieu->C_TYPE->CellAttrs = array(); $t_danhmucgioithieu->C_TYPE->ViewAttrs = array(); $t_danhmucgioithieu->C_TYPE->EditAttrs = array();

		// C_NAME
		$t_danhmucgioithieu->C_NAME->CellCssStyle = ""; $t_danhmucgioithieu->C_NAME->CellCssClass = "";
		$t_danhmucgioithieu->C_NAME->CellAttrs = array(); $t_danhmucgioithieu->C_NAME->ViewAttrs = array(); $t_danhmucgioithieu->C_NAME->EditAttrs = array();

		// C_URL
		$t_danhmucgioithieu->C_URL->CellCssStyle = ""; $t_danhmucgioithieu->C_URL->CellCssClass = "";
		$t_danhmucgioithieu->C_URL->CellAttrs = array(); $t_danhmucgioithieu->C_URL->ViewAttrs = array(); $t_danhmucgioithieu->C_URL->EditAttrs = array();

		// C_ORDER
		$t_danhmucgioithieu->C_ORDER->CellCssStyle = ""; $t_danhmucgioithieu->C_ORDER->CellCssClass = "";
		$t_danhmucgioithieu->C_ORDER->CellAttrs = array(); $t_danhmucgioithieu->C_ORDER->ViewAttrs = array(); $t_danhmucgioithieu->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_danhmucgioithieu->C_ACTIVE->CellCssStyle = ""; $t_danhmucgioithieu->C_ACTIVE->CellCssClass = "";
		$t_danhmucgioithieu->C_ACTIVE->CellAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->ViewAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->EditAttrs = array();
		if ($t_danhmucgioithieu->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_DANHMUCGIOITHIEU
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewValue = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue;
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssStyle = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssClass = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_danhmucgioithieu->C_TYPE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_TYPE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh mục 1 tin bài";
						break;
					case "1":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh mục list tin bài";
						break;
					default:
						$t_danhmucgioithieu->C_TYPE->ViewValue = $t_danhmucgioithieu->C_TYPE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_TYPE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_TYPE->CssStyle = "";
			$t_danhmucgioithieu->C_TYPE->CssClass = "";
			$t_danhmucgioithieu->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->ViewValue = $t_danhmucgioithieu->C_NAME->CurrentValue;
			$t_danhmucgioithieu->C_NAME->CssStyle = "";
			$t_danhmucgioithieu->C_NAME->CssClass = "";
			$t_danhmucgioithieu->C_NAME->ViewCustomAttributes = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->ViewValue = $t_danhmucgioithieu->C_URL->CurrentValue;
			$t_danhmucgioithieu->C_URL->CssStyle = "";
			$t_danhmucgioithieu->C_URL->CssClass = "";
			$t_danhmucgioithieu->C_URL->ViewCustomAttributes = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->ViewValue = $t_danhmucgioithieu->C_ORDER->CurrentValue;
			$t_danhmucgioithieu->C_ORDER->CssStyle = "";
			$t_danhmucgioithieu->C_ORDER->CssClass = "";
			$t_danhmucgioithieu->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_danhmucgioithieu->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_ACTIVE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Kích hoạt";
						break;
					default:
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = $t_danhmucgioithieu->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_ACTIVE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_ACTIVE->CssStyle = "";
			$t_danhmucgioithieu->C_ACTIVE->CssClass = "";
			$t_danhmucgioithieu->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_danhmucgioithieu->C_USER_ADD->ViewValue = $t_danhmucgioithieu->C_USER_ADD->CurrentValue;
			$t_danhmucgioithieu->C_USER_ADD->CssStyle = "";
			$t_danhmucgioithieu->C_USER_ADD->CssClass = "";
			$t_danhmucgioithieu->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = $t_danhmucgioithieu->C_ADD_TIME->CurrentValue;
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_ADD_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_ADD_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_ADD_TIME->CssClass = "";
			$t_danhmucgioithieu->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_danhmucgioithieu->C_USER_EDIT->ViewValue = $t_danhmucgioithieu->C_USER_EDIT->CurrentValue;
			$t_danhmucgioithieu->C_USER_EDIT->CssStyle = "";
			$t_danhmucgioithieu->C_USER_EDIT->CssClass = "";
			$t_danhmucgioithieu->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = $t_danhmucgioithieu->C_EDIT_TIME->CurrentValue;
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_EDIT_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_EDIT_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_EDIT_TIME->CssClass = "";
			$t_danhmucgioithieu->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_TYPE
			$t_danhmucgioithieu->C_TYPE->HrefValue = "";
			$t_danhmucgioithieu->C_TYPE->TooltipValue = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->HrefValue = "";
			$t_danhmucgioithieu->C_NAME->TooltipValue = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->HrefValue = "";
			$t_danhmucgioithieu->C_URL->TooltipValue = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->HrefValue = "";
			$t_danhmucgioithieu->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_danhmucgioithieu->C_ACTIVE->HrefValue = "";
			$t_danhmucgioithieu->C_ACTIVE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_danhmucgioithieu->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmucgioithieu->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_danhmucgioithieu;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_danhmucgioithieu->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_danhmucgioithieu->ExportAll) {
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
		if ($t_danhmucgioithieu->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_danhmucgioithieu, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_TYPE);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_NAME);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_URL);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ORDER);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ACTIVE);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_USER_ADD);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_EDIT_TIME);
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
				$t_danhmucgioithieu->CssClass = "";
				$t_danhmucgioithieu->CssStyle = "";
				$t_danhmucgioithieu->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_danhmucgioithieu->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_DANHMUCGIOITHIEU', $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE', $t_danhmucgioithieu->C_TYPE->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_NAME', $t_danhmucgioithieu->C_NAME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_danhmucgioithieu->C_URL->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_danhmucgioithieu->C_ORDER->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_danhmucgioithieu->C_ACTIVE->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_danhmucgioithieu->C_USER_ADD->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_danhmucgioithieu->C_ADD_TIME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_danhmucgioithieu->C_USER_EDIT->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_danhmucgioithieu->C_EDIT_TIME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_TYPE);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_NAME);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_URL);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ORDER);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ACTIVE);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_USER_ADD);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ADD_TIME);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_USER_EDIT);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_danhmucgioithieu->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_danhmucgioithieu->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_danhmucgioithieu->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_danhmucgioithieu->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_danhmucgioithieu->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_danhmucgioithieu;
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
		if ($t_danhmucgioithieu->Email_Sending($Email, $EventArgs))
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
		global $t_danhmucgioithieu;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_danhmucgioithieu->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_danhmucgioithieu->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_danhmucgioithieu->getSessionBasicSearchType();
		}

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_danhmucgioithieu->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_danhmucgioithieu->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_danhmucgioithieu;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_danhmucgioithieu->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_danhmucgioithieu->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_danhmucgioithieu->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_danhmucgioithieu->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_danhmucgioithieu->GetAdvancedSearch("w_" . $FldParm);
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
