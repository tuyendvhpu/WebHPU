<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmuctuyensinhinfo.php" ?>
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
$t_danhmuctuyensinh_list = new ct_danhmuctuyensinh_list();
$Page =& $t_danhmuctuyensinh_list;

// Page init
$t_danhmuctuyensinh_list->Page_Init();

// Page main
$t_danhmuctuyensinh_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_danhmuctuyensinh->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmuctuyensinh_list = new ew_Page("t_danhmuctuyensinh_list");

// page properties
t_danhmuctuyensinh_list.PageID = "list"; // page ID
t_danhmuctuyensinh_list.FormID = "ft_danhmuctuyensinhlist"; // form ID
var EW_PAGE_ID = t_danhmuctuyensinh_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_danhmuctuyensinh_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmuctuyensinh_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmuctuyensinh_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmuctuyensinh_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_danhmuctuyensinh->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_danhmuctuyensinh_list->lTotalRecs = $t_danhmuctuyensinh->SelectRecordCount();
	} else {
		if ($rs = $t_danhmuctuyensinh_list->LoadRecordset())
			$t_danhmuctuyensinh_list->lTotalRecs = $rs->RecordCount();
	}
	$t_danhmuctuyensinh_list->lStartRec = 1;
	if ($t_danhmuctuyensinh_list->lDisplayRecs <= 0 || ($t_danhmuctuyensinh->Export <> "" && $t_danhmuctuyensinh->ExportAll)) // Display all records
		$t_danhmuctuyensinh_list->lDisplayRecs = $t_danhmuctuyensinh_list->lTotalRecs;
	if (!($t_danhmuctuyensinh->Export <> "" && $t_danhmuctuyensinh->ExportAll))
		$t_danhmuctuyensinh_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_danhmuctuyensinh_list->LoadRecordset($t_danhmuctuyensinh_list->lStartRec-1, $t_danhmuctuyensinh_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_danhmuctuyensinh->TableCaption() ?>
<?php if ($t_danhmuctuyensinh->Export == "" && $t_danhmuctuyensinh->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmuctuyensinh_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_danhmuctuyensinh" id="emf_t_danhmuctuyensinh" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_danhmuctuyensinh',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_danhmuctuyensinhlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_danhmuctuyensinh->Export == "" && $t_danhmuctuyensinh->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_danhmuctuyensinh_list);" style="text-decoration: none;"><img id="t_danhmuctuyensinh_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_danhmuctuyensinh_list_SearchPanel">
<form name="ft_danhmuctuyensinhlistsrch" id="ft_danhmuctuyensinhlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_danhmuctuyensinh">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="50" value="<?php echo ew_HtmlEncode($t_danhmuctuyensinh->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_danhmuctuyensinh->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_danhmuctuyensinh->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_danhmuctuyensinh->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmuctuyensinh_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_danhmuctuyensinh->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_danhmuctuyensinh->CurrentAction <> "gridadd" && $t_danhmuctuyensinh->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmuctuyensinh_list->Pager)) $t_danhmuctuyensinh_list->Pager = new cNumericPager($t_danhmuctuyensinh_list->lStartRec, $t_danhmuctuyensinh_list->lDisplayRecs, $t_danhmuctuyensinh_list->lTotalRecs, $t_danhmuctuyensinh_list->lRecRange) ?>
<?php if ($t_danhmuctuyensinh_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmuctuyensinh_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmuctuyensinh_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_danhmuctuyensinh_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_danhmuctuyensinh_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_danhmuctuyensinhlist, '<?php echo $t_danhmuctuyensinh_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_danhmuctuyensinhlist" id="ft_danhmuctuyensinhlist" class="ewForm" action="" method="post">
<div id="gmp_t_danhmuctuyensinh" class="ewGridMiddlePanel">
<?php if ($t_danhmuctuyensinh_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_danhmuctuyensinh->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_danhmuctuyensinh_list->RenderListOptions();

// Render list options (header, left)
$t_danhmuctuyensinh_list->ListOptions->Render("header", "left");
?>
<?php if ($t_danhmuctuyensinh->C_NAME->Visible) { // C_NAME ?>
	<?php if ($t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_NAME) == "") { ?>
		<td><?php echo $t_danhmuctuyensinh->C_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmuctuyensinh->C_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_danhmuctuyensinh->C_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmuctuyensinh->C_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_danhmuctuyensinh->C_ORDER->Visible) { // C_ORDER ?>
	<?php if ($t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_ORDER) == "") { ?>
		<td><?php echo $t_danhmuctuyensinh->C_ORDER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_ORDER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmuctuyensinh->C_ORDER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_danhmuctuyensinh->C_ORDER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmuctuyensinh->C_ORDER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_danhmuctuyensinh->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_ACTIVE) == "") { ?>
		<td><?php echo $t_danhmuctuyensinh->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_danhmuctuyensinh->SortUrl($t_danhmuctuyensinh->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_danhmuctuyensinh->C_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_danhmuctuyensinh->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_danhmuctuyensinh->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_danhmuctuyensinh_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_danhmuctuyensinh->ExportAll && $t_danhmuctuyensinh->Export <> "") {
	$t_danhmuctuyensinh_list->lStopRec = $t_danhmuctuyensinh_list->lTotalRecs;
} else {
	$t_danhmuctuyensinh_list->lStopRec = $t_danhmuctuyensinh_list->lStartRec + $t_danhmuctuyensinh_list->lDisplayRecs - 1; // Set the last record to display
}
$t_danhmuctuyensinh_list->lRecCount = $t_danhmuctuyensinh_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_danhmuctuyensinh_list->lStartRec > 1)
		$rs->Move($t_danhmuctuyensinh_list->lStartRec - 1);
}

// Initialize aggregate
$t_danhmuctuyensinh->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_danhmuctuyensinh_list->RenderRow();
$t_danhmuctuyensinh_list->lRowCnt = 0;
while (($t_danhmuctuyensinh->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_danhmuctuyensinh_list->lRecCount < $t_danhmuctuyensinh_list->lStopRec) {
	$t_danhmuctuyensinh_list->lRecCount++;
	if (intval($t_danhmuctuyensinh_list->lRecCount) >= intval($t_danhmuctuyensinh_list->lStartRec)) {
		$t_danhmuctuyensinh_list->lRowCnt++;

	// Init row class and style
	$t_danhmuctuyensinh->CssClass = "";
	$t_danhmuctuyensinh->CssStyle = "";
	$t_danhmuctuyensinh->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_danhmuctuyensinh->CurrentAction == "gridadd") {
		$t_danhmuctuyensinh_list->LoadDefaultValues(); // Load default values
	} else {
		$t_danhmuctuyensinh_list->LoadRowValues($rs); // Load row values
	}
	$t_danhmuctuyensinh->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_danhmuctuyensinh_list->RenderRow();

	// Render list options
	$t_danhmuctuyensinh_list->RenderListOptions();
?>
	<tr<?php echo $t_danhmuctuyensinh->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_danhmuctuyensinh_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_danhmuctuyensinh->C_NAME->Visible) { // C_NAME ?>
		<td<?php echo $t_danhmuctuyensinh->C_NAME->CellAttributes() ?>>
<div<?php echo $t_danhmuctuyensinh->C_NAME->ViewAttributes() ?>><?php echo $t_danhmuctuyensinh->C_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_danhmuctuyensinh->C_ORDER->Visible) { // C_ORDER ?>
		<td<?php echo $t_danhmuctuyensinh->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_danhmuctuyensinh->C_ORDER->ViewAttributes() ?>><?php echo $t_danhmuctuyensinh->C_ORDER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_danhmuctuyensinh->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_danhmuctuyensinh->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_danhmuctuyensinh->C_ACTIVE->ViewAttributes() ?>><?php echo $t_danhmuctuyensinh->C_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_danhmuctuyensinh_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_danhmuctuyensinh->CurrentAction <> "gridadd")
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
<?php if ($t_danhmuctuyensinh_list->lTotalRecs > 0) { ?>
<?php if ($t_danhmuctuyensinh->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_danhmuctuyensinh->CurrentAction <> "gridadd" && $t_danhmuctuyensinh->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmuctuyensinh_list->Pager)) $t_danhmuctuyensinh_list->Pager = new cNumericPager($t_danhmuctuyensinh_list->lStartRec, $t_danhmuctuyensinh_list->lDisplayRecs, $t_danhmuctuyensinh_list->lTotalRecs, $t_danhmuctuyensinh_list->lRecRange) ?>
<?php if ($t_danhmuctuyensinh_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmuctuyensinh_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmuctuyensinh_list->PageUrl() ?>start=<?php echo $t_danhmuctuyensinh_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmuctuyensinh_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_danhmuctuyensinh_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmuctuyensinh_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_danhmuctuyensinh_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_danhmuctuyensinh_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_danhmuctuyensinh_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_danhmuctuyensinhlist, '<?php echo $t_danhmuctuyensinh_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_danhmuctuyensinh->Export == "" && $t_danhmuctuyensinh->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_danhmuctuyensinh->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_danhmuctuyensinh_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmuctuyensinh_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_danhmuctuyensinh';

	// Page object name
	var $PageObjName = 't_danhmuctuyensinh_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmuctuyensinh;
		if ($t_danhmuctuyensinh->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmuctuyensinh->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmuctuyensinh;
		if ($t_danhmuctuyensinh->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmuctuyensinh->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmuctuyensinh->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmuctuyensinh_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmuctuyensinh)
		$GLOBALS["t_danhmuctuyensinh"] = new ct_danhmuctuyensinh();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_danhmuctuyensinh"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_danhmuctuyensinhdelete.php";
		$this->MultiUpdateUrl = "t_danhmuctuyensinhupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmuctuyensinh', TRUE);

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
		global $t_danhmuctuyensinh;

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
			$t_danhmuctuyensinh->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_danhmuctuyensinh->Export = $_POST["exporttype"];
		} else {
			$t_danhmuctuyensinh->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_danhmuctuyensinh->Export; // Get export parameter, used in header
		$gsExportFile = $t_danhmuctuyensinh->TableVar; // Get export file, used in header
		if (in_array($t_danhmuctuyensinh->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_danhmuctuyensinh->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_danhmuctuyensinh->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_danhmuctuyensinh->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_danhmuctuyensinh->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_danhmuctuyensinh;

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
			$t_danhmuctuyensinh->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($t_danhmuctuyensinh->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_danhmuctuyensinh->getRecordsPerPage(); // Restore from Session
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
		$t_danhmuctuyensinh->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_danhmuctuyensinh->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_danhmuctuyensinh->getSearchWhere();
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
		$t_danhmuctuyensinh->setSessionWhere($sFilter);
		$t_danhmuctuyensinh->CurrentFilter = "";

		// Export data only
		if (in_array($t_danhmuctuyensinh->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_danhmuctuyensinh->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_danhmuctuyensinh;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_danhmuctuyensinh->C_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_danhmuctuyensinh->C_DESCRIPTION, $Keyword);
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
		global $Security, $t_danhmuctuyensinh;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_danhmuctuyensinh->BasicSearchKeyword;
		$sSearchType = $t_danhmuctuyensinh->BasicSearchType;
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
			$t_danhmuctuyensinh->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_danhmuctuyensinh->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_danhmuctuyensinh;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_danhmuctuyensinh->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->setSessionBasicSearchKeyword("");
		$t_danhmuctuyensinh->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_danhmuctuyensinh;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_danhmuctuyensinh->BasicSearchKeyword = $t_danhmuctuyensinh->getSessionBasicSearchKeyword();
			$t_danhmuctuyensinh->BasicSearchType = $t_danhmuctuyensinh->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_danhmuctuyensinh;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_danhmuctuyensinh->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_danhmuctuyensinh->CurrentOrderType = @$_GET["ordertype"];
			$t_danhmuctuyensinh->UpdateSort($t_danhmuctuyensinh->C_NAME, $bCtrl); // C_NAME
			$t_danhmuctuyensinh->UpdateSort($t_danhmuctuyensinh->C_ORDER, $bCtrl); // C_ORDER
			$t_danhmuctuyensinh->UpdateSort($t_danhmuctuyensinh->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_danhmuctuyensinh->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_danhmuctuyensinh;
		$sOrderBy = $t_danhmuctuyensinh->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_danhmuctuyensinh->SqlOrderBy() <> "") {
				$sOrderBy = $t_danhmuctuyensinh->SqlOrderBy();
				$t_danhmuctuyensinh->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_danhmuctuyensinh;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_danhmuctuyensinh->setSessionOrderBy($sOrderBy);
				$t_danhmuctuyensinh->C_NAME->setSort("");
				$t_danhmuctuyensinh->C_ORDER->setSort("");
				$t_danhmuctuyensinh->C_ACTIVE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_danhmuctuyensinh;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_danhmuctuyensinh_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_danhmuctuyensinh->Export <> "" ||
			$t_danhmuctuyensinh->CurrentAction == "gridadd" ||
			$t_danhmuctuyensinh->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_danhmuctuyensinh;
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
		if ($Security->CanAdd() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_danhmuctuyensinh;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_danhmuctuyensinh;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_danhmuctuyensinh->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_danhmuctuyensinh->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_danhmuctuyensinh->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_danhmuctuyensinh;

		// Call Recordset Selecting event
		$t_danhmuctuyensinh->Recordset_Selecting($t_danhmuctuyensinh->CurrentFilter);

		// Load List page SQL
		$sSql = $t_danhmuctuyensinh->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_danhmuctuyensinh->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmuctuyensinh;
		$sFilter = $t_danhmuctuyensinh->KeyFilter();

		// Call Row Selecting event
		$t_danhmuctuyensinh->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmuctuyensinh->CurrentFilter = $sFilter;
		$sSql = $t_danhmuctuyensinh->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmuctuyensinh->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->setDbValue($rs->fields('PK_DANHMUCTUYENSINH'));
		$t_danhmuctuyensinh->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_danhmuctuyensinh->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_danhmuctuyensinh->C_DESCRIPTION->setDbValue($rs->fields('C_DESCRIPTION'));
		$t_danhmuctuyensinh->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_danhmuctuyensinh->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_danhmuctuyensinh->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_danhmuctuyensinh->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_danhmuctuyensinh->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_danhmuctuyensinh->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmuctuyensinh;

		// Initialize URLs
		$this->ViewUrl = $t_danhmuctuyensinh->ViewUrl();
		$this->EditUrl = $t_danhmuctuyensinh->EditUrl();
		$this->InlineEditUrl = $t_danhmuctuyensinh->InlineEditUrl();
		$this->CopyUrl = $t_danhmuctuyensinh->CopyUrl();
		$this->InlineCopyUrl = $t_danhmuctuyensinh->InlineCopyUrl();
		$this->DeleteUrl = $t_danhmuctuyensinh->DeleteUrl();

		// Call Row_Rendering event
		$t_danhmuctuyensinh->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_danhmuctuyensinh->C_NAME->CellCssStyle = ""; $t_danhmuctuyensinh->C_NAME->CellCssClass = "";
		$t_danhmuctuyensinh->C_NAME->CellAttrs = array(); $t_danhmuctuyensinh->C_NAME->ViewAttrs = array(); $t_danhmuctuyensinh->C_NAME->EditAttrs = array();

		// C_ORDER
		$t_danhmuctuyensinh->C_ORDER->CellCssStyle = ""; $t_danhmuctuyensinh->C_ORDER->CellCssClass = "";
		$t_danhmuctuyensinh->C_ORDER->CellAttrs = array(); $t_danhmuctuyensinh->C_ORDER->ViewAttrs = array(); $t_danhmuctuyensinh->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_danhmuctuyensinh->C_ACTIVE->CellCssStyle = ""; $t_danhmuctuyensinh->C_ACTIVE->CellCssClass = "";
		$t_danhmuctuyensinh->C_ACTIVE->CellAttrs = array(); $t_danhmuctuyensinh->C_ACTIVE->ViewAttrs = array(); $t_danhmuctuyensinh->C_ACTIVE->EditAttrs = array();
		if ($t_danhmuctuyensinh->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_DANHMUCTUYENSINH
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->ViewValue = $t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue;
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CssStyle = "";
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CssClass = "";
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->ViewCustomAttributes = "";

			// C_TYPE
			$t_danhmuctuyensinh->C_TYPE->ViewValue = $t_danhmuctuyensinh->C_TYPE->CurrentValue;
			$t_danhmuctuyensinh->C_TYPE->CssStyle = "";
			$t_danhmuctuyensinh->C_TYPE->CssClass = "";
			$t_danhmuctuyensinh->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->ViewValue = $t_danhmuctuyensinh->C_NAME->CurrentValue;
			$t_danhmuctuyensinh->C_NAME->CssStyle = "";
			$t_danhmuctuyensinh->C_NAME->CssClass = "";
			$t_danhmuctuyensinh->C_NAME->ViewCustomAttributes = "";

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->ViewValue = $t_danhmuctuyensinh->C_ORDER->CurrentValue;
			$t_danhmuctuyensinh->C_ORDER->CssStyle = "";
			$t_danhmuctuyensinh->C_ORDER->CssClass = "";
			$t_danhmuctuyensinh->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_danhmuctuyensinh->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_danhmuctuyensinh->C_ACTIVE->CurrentValue) {
					case "0":
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = "<b>Kích hoạt</b>";
						break;
					default:
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = $t_danhmuctuyensinh->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_danhmuctuyensinh->C_ACTIVE->ViewValue = NULL;
			}
			$t_danhmuctuyensinh->C_ACTIVE->CssStyle = "";
			$t_danhmuctuyensinh->C_ACTIVE->CssClass = "";
			$t_danhmuctuyensinh->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_danhmuctuyensinh->C_USER_ADD->ViewValue = $t_danhmuctuyensinh->C_USER_ADD->CurrentValue;
			$t_danhmuctuyensinh->C_USER_ADD->CssStyle = "";
			$t_danhmuctuyensinh->C_USER_ADD->CssClass = "";
			$t_danhmuctuyensinh->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_danhmuctuyensinh->C_ADD_TIME->ViewValue = $t_danhmuctuyensinh->C_ADD_TIME->CurrentValue;
			$t_danhmuctuyensinh->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_danhmuctuyensinh->C_ADD_TIME->ViewValue, 7);
			$t_danhmuctuyensinh->C_ADD_TIME->CssStyle = "";
			$t_danhmuctuyensinh->C_ADD_TIME->CssClass = "";
			$t_danhmuctuyensinh->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_danhmuctuyensinh->C_USER_EDIT->ViewValue = $t_danhmuctuyensinh->C_USER_EDIT->CurrentValue;
			$t_danhmuctuyensinh->C_USER_EDIT->CssStyle = "";
			$t_danhmuctuyensinh->C_USER_EDIT->CssClass = "";
			$t_danhmuctuyensinh->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewValue = $t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue;
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_danhmuctuyensinh->C_EDIT_TIME->ViewValue, 7);
			$t_danhmuctuyensinh->C_EDIT_TIME->CssStyle = "";
			$t_danhmuctuyensinh->C_EDIT_TIME->CssClass = "";
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->HrefValue = "";
			$t_danhmuctuyensinh->C_NAME->TooltipValue = "";

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->HrefValue = "";
			$t_danhmuctuyensinh->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_danhmuctuyensinh->C_ACTIVE->HrefValue = "";
			$t_danhmuctuyensinh->C_ACTIVE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_danhmuctuyensinh->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmuctuyensinh->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_danhmuctuyensinh;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_danhmuctuyensinh->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_danhmuctuyensinh->ExportAll) {
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
		if ($t_danhmuctuyensinh->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_danhmuctuyensinh, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->PK_DANHMUCTUYENSINH);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_TYPE);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_ORDER);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_ACTIVE);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_USER_ADD);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_danhmuctuyensinh->C_EDIT_TIME);
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
				$t_danhmuctuyensinh->CssClass = "";
				$t_danhmuctuyensinh->CssStyle = "";
				$t_danhmuctuyensinh->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_danhmuctuyensinh->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_DANHMUCTUYENSINH', $t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE', $t_danhmuctuyensinh->C_TYPE->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_danhmuctuyensinh->C_ORDER->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_danhmuctuyensinh->C_ACTIVE->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_danhmuctuyensinh->C_USER_ADD->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_danhmuctuyensinh->C_ADD_TIME->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_danhmuctuyensinh->C_USER_EDIT->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_danhmuctuyensinh->C_EDIT_TIME->ExportValue($t_danhmuctuyensinh->Export, $t_danhmuctuyensinh->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_danhmuctuyensinh->PK_DANHMUCTUYENSINH);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_TYPE);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_ORDER);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_ACTIVE);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_USER_ADD);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_ADD_TIME);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_USER_EDIT);
					$ExportDoc->ExportField($t_danhmuctuyensinh->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_danhmuctuyensinh->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_danhmuctuyensinh->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_danhmuctuyensinh->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_danhmuctuyensinh->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_danhmuctuyensinh->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_danhmuctuyensinh;
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
		if ($t_danhmuctuyensinh->Email_Sending($Email, $EventArgs))
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
		global $t_danhmuctuyensinh;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_danhmuctuyensinh->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_danhmuctuyensinh->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_danhmuctuyensinh->getSessionBasicSearchType();
		}

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_danhmuctuyensinh->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_danhmuctuyensinh->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_danhmuctuyensinh;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_danhmuctuyensinh->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_danhmuctuyensinh->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_danhmuctuyensinh->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_danhmuctuyensinh->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_danhmuctuyensinh->GetAdvancedSearch("w_" . $FldParm);
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
