<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_linkadinfo.php" ?>
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
$t_linkad_list = new ct_linkad_list();
$Page =& $t_linkad_list;

// Page init
$t_linkad_list->Page_Init();

// Page main
$t_linkad_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_linkad->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_linkad_list = new ew_Page("t_linkad_list");

// page properties
t_linkad_list.PageID = "list"; // page ID
t_linkad_list.FormID = "ft_linkadlist"; // form ID
var EW_PAGE_ID = t_linkad_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_linkad_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_linkad_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_linkad_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_linkad_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
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
<?php if ($t_linkad->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_linkad_list->lTotalRecs = $t_linkad->SelectRecordCount();
	} else {
		if ($rs = $t_linkad_list->LoadRecordset())
			$t_linkad_list->lTotalRecs = $rs->RecordCount();
	}
	$t_linkad_list->lStartRec = 1;
	if ($t_linkad_list->lDisplayRecs <= 0 || ($t_linkad->Export <> "" && $t_linkad->ExportAll)) // Display all records
		$t_linkad_list->lDisplayRecs = $t_linkad_list->lTotalRecs;
	if (!($t_linkad->Export <> "" && $t_linkad->ExportAll))
		$t_linkad_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_linkad_list->LoadRecordset($t_linkad_list->lStartRec-1, $t_linkad_list->lDisplayRecs);
?>

<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php echo $t_linkad->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
                                                                    <span class="phpmaker" style="white-space: nowrap;">
                                                                    <?php if ($t_linkad->Export == "" && $t_linkad->CurrentAction == "") { ?>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
                                                                    &nbsp;&nbsp;<a href="<?php echo $t_linkad_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
                                                                    &nbsp;&nbsp;<a name="emf_t_linkad" id="emf_t_linkad" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_linkad',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_linkadlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
                                                                    <?php } ?>
                                                                    </span>
                                                                    &nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_linkad->Export == "" && $t_linkad->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_linkad_list);" style="text-decoration: none;"><img id="t_linkad_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_linkad_list_SearchPanel">
<form name="ft_linkadlistsrch" id="ft_linkadlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_linkad">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_linkad->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_linkad_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_linkad->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_linkad->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_linkad->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_linkad_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_linkad->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_linkad->CurrentAction <> "gridadd" && $t_linkad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_linkad_list->Pager)) $t_linkad_list->Pager = new cNumericPager($t_linkad_list->lStartRec, $t_linkad_list->lDisplayRecs, $t_linkad_list->lTotalRecs, $t_linkad_list->lRecRange) ?>
<?php if ($t_linkad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_linkad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_linkad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_linkad_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_linkad_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_linkad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_linkad_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_linkad_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_linkad_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_linkadlist, '<?php echo $t_linkad_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_linkadlist" id="ft_linkadlist" class="ewForm" action="" method="post">
<div id="gmp_t_linkad" class="ewGridMiddlePanel">
<?php if ($t_linkad_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_linkad->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_linkad_list->RenderListOptions();

// Render list options (header, left)
$t_linkad_list->ListOptions->Render("header", "left");
?>
<?php if ($t_linkad->C_LINKAD_NAME->Visible) { // C_LINKAD_NAME ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_LINKAD_NAME) == "") { ?>
		<td><?php echo $t_linkad->C_LINKAD_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_LINKAD_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_LINKAD_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_linkad->C_LINKAD_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_LINKAD_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_linkad->C_LINKAD_TYPE->Visible) { // C_LINKAD_TYPE ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_LINKAD_TYPE) == "") { ?>
		<td><?php echo $t_linkad->C_LINKAD_TYPE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_LINKAD_TYPE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_LINKAD_TYPE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_linkad->C_LINKAD_TYPE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_LINKAD_TYPE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_linkad->C_LINKAD_URL->Visible) { // C_LINKAD_URL ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_LINKAD_URL) == "") { ?>
		<td><?php echo $t_linkad->C_LINKAD_URL->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_LINKAD_URL) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_LINKAD_URL->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_linkad->C_LINKAD_URL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_LINKAD_URL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_linkad->C_LINKAD_POS->Visible) { // C_LINKAD_POS ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_LINKAD_POS) == "") { ?>
		<td><?php echo $t_linkad->C_LINKAD_POS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_LINKAD_POS) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_LINKAD_POS->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_linkad->C_LINKAD_POS->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_LINKAD_POS->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_linkad->C_LINKAD_ACTIVE->Visible) { // C_LINKAD_ACTIVE ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_LINKAD_ACTIVE) == "") { ?>
		<td><?php echo $t_linkad->C_LINKAD_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_LINKAD_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_LINKAD_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_linkad->C_LINKAD_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_LINKAD_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_linkad->C_ORDER->Visible) { // C_ORDER ?>
	<?php if ($t_linkad->SortUrl($t_linkad->C_ORDER) == "") { ?>
		<td><?php echo $t_linkad->C_ORDER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_linkad->SortUrl($t_linkad->C_ORDER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_linkad->C_ORDER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_linkad->C_ORDER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_linkad->C_ORDER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_linkad_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_linkad->ExportAll && $t_linkad->Export <> "") {
	$t_linkad_list->lStopRec = $t_linkad_list->lTotalRecs;
} else {
	$t_linkad_list->lStopRec = $t_linkad_list->lStartRec + $t_linkad_list->lDisplayRecs - 1; // Set the last record to display
}
$t_linkad_list->lRecCount = $t_linkad_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_linkad_list->lStartRec > 1)
		$rs->Move($t_linkad_list->lStartRec - 1);
}

// Initialize aggregate
$t_linkad->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_linkad_list->RenderRow();
$t_linkad_list->lRowCnt = 0;
while (($t_linkad->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_linkad_list->lRecCount < $t_linkad_list->lStopRec) {
	$t_linkad_list->lRecCount++;
	if (intval($t_linkad_list->lRecCount) >= intval($t_linkad_list->lStartRec)) {
		$t_linkad_list->lRowCnt++;

	// Init row class and style
	$t_linkad->CssClass = "";
	$t_linkad->CssStyle = "";
	$t_linkad->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_linkad->CurrentAction == "gridadd") {
		$t_linkad_list->LoadDefaultValues(); // Load default values
	} else {
		$t_linkad_list->LoadRowValues($rs); // Load row values
	}
	$t_linkad->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_linkad_list->RenderRow();

	// Render list options
	$t_linkad_list->RenderListOptions();
?>
	<tr<?php echo $t_linkad->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_linkad_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_linkad->C_LINKAD_NAME->Visible) { // C_LINKAD_NAME ?>
		<td<?php echo $t_linkad->C_LINKAD_NAME->CellAttributes() ?>>
<div style="width: 250px" <?php echo $t_linkad->C_LINKAD_NAME->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_linkad->C_LINKAD_TYPE->Visible) { // C_LINKAD_TYPE ?>
		<td<?php echo $t_linkad->C_LINKAD_TYPE->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_TYPE->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_TYPE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_linkad->C_LINKAD_URL->Visible) { // C_LINKAD_URL ?>
		<td<?php echo $t_linkad->C_LINKAD_URL->CellAttributes() ?>>
<div <?php echo $t_linkad->C_LINKAD_URL->ViewAttributes() ?>> <img src='<?php echo $t_linkad->C_LINKAD_URL->ListViewValue() ?>' alt="slide" style="width: 150px;height:100px"></div>
</td>
	<?php } ?>
	<?php if ($t_linkad->C_LINKAD_POS->Visible) { // C_LINKAD_POS ?>
		<td<?php echo $t_linkad->C_LINKAD_POS->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_POS->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_POS->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_linkad->C_LINKAD_ACTIVE->Visible) { // C_LINKAD_ACTIVE ?>
		<td<?php echo $t_linkad->C_LINKAD_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_ACTIVE->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_linkad->C_ORDER->Visible) { // C_ORDER ?>
		<td<?php echo $t_linkad->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_linkad->C_ORDER->ViewAttributes() ?>><?php echo $t_linkad->C_ORDER->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_linkad_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_linkad->CurrentAction <> "gridadd")
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
<?php if ($t_linkad_list->lTotalRecs > 0) { ?>
<?php if ($t_linkad->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_linkad->CurrentAction <> "gridadd" && $t_linkad->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_linkad_list->Pager)) $t_linkad_list->Pager = new cNumericPager($t_linkad_list->lStartRec, $t_linkad_list->lDisplayRecs, $t_linkad_list->lTotalRecs, $t_linkad_list->lRecRange) ?>
<?php if ($t_linkad_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_linkad_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_linkad_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_linkad_list->PageUrl() ?>start=<?php echo $t_linkad_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_linkad_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_linkad_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_linkad_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_linkad_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_linkad_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_linkad_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_linkad_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_linkad_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_linkadlist, '<?php echo $t_linkad_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_linkad->Export == "" && $t_linkad->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_linkad->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_linkad_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_linkad_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_linkad';

	// Page object name
	var $PageObjName = 't_linkad_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_linkad;
		if ($t_linkad->UseTokenInUrl) $PageUrl .= "t=" . $t_linkad->TableVar . "&"; // Add page token
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
		global $objForm, $t_linkad;
		if ($t_linkad->UseTokenInUrl) {
			if ($objForm)
				return ($t_linkad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_linkad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_linkad_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_linkad)
		$GLOBALS["t_linkad"] = new ct_linkad();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_linkad"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_linkaddelete.php";
		$this->MultiUpdateUrl = "t_linkadupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_linkad', TRUE);

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
		global $t_linkad;

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
			$t_linkad->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_linkad->Export = $_POST["exporttype"];
		} else {
			$t_linkad->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_linkad->Export; // Get export parameter, used in header
		$gsExportFile = $t_linkad->TableVar; // Get export file, used in header
		if (in_array($t_linkad->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_linkad->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_linkad->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_linkad->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_linkad->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_linkad;

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
			$t_linkad->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($t_linkad->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_linkad->getRecordsPerPage(); // Restore from Session
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
		$t_linkad->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_linkad->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_linkad->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_linkad->getSearchWhere();
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
		$t_linkad->setSessionWhere($sFilter);
		$t_linkad->CurrentFilter = "";

		// Export data only
		if (in_array($t_linkad->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_linkad->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_linkad;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_linkad->C_LINKAD_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_linkad->C_LINKAD_DES, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_linkad->C_LINKAD_URL, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_linkad->C_IMG_SOURCE, $Keyword);
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
		global $Security, $t_linkad;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_linkad->BasicSearchKeyword;
		$sSearchType = $t_linkad->BasicSearchType;
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
			$t_linkad->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_linkad->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_linkad;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_linkad->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_linkad;
		$t_linkad->setSessionBasicSearchKeyword("");
		$t_linkad->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_linkad;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_linkad->BasicSearchKeyword = $t_linkad->getSessionBasicSearchKeyword();
			$t_linkad->BasicSearchType = $t_linkad->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_linkad;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_linkad->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_linkad->CurrentOrderType = @$_GET["ordertype"];
			$t_linkad->UpdateSort($t_linkad->C_LINKAD_NAME, $bCtrl); // C_LINKAD_NAME
			$t_linkad->UpdateSort($t_linkad->C_LINKAD_TYPE, $bCtrl); // C_LINKAD_TYPE
			$t_linkad->UpdateSort($t_linkad->C_LINKAD_URL, $bCtrl); // C_LINKAD_URL
			$t_linkad->UpdateSort($t_linkad->C_LINKAD_POS, $bCtrl); // C_LINKAD_POS
			$t_linkad->UpdateSort($t_linkad->C_LINKAD_ACTIVE, $bCtrl); // C_LINKAD_ACTIVE
			$t_linkad->UpdateSort($t_linkad->C_ORDER, $bCtrl); // C_ORDER
			$t_linkad->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_linkad;
		$sOrderBy = $t_linkad->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_linkad->SqlOrderBy() <> "") {
				$sOrderBy = $t_linkad->SqlOrderBy();
				$t_linkad->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_linkad;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_linkad->setSessionOrderBy($sOrderBy);
				$t_linkad->C_LINKAD_NAME->setSort("");
				$t_linkad->C_LINKAD_TYPE->setSort("");
				$t_linkad->C_LINKAD_URL->setSort("");
				$t_linkad->C_LINKAD_POS->setSort("");
				$t_linkad->C_LINKAD_ACTIVE->setSort("");
				$t_linkad->C_ORDER->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_linkad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_linkad;

		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanView();
		$item->OnLeft = TRUE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;
		
		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_linkad_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_linkad->Export <> "" ||
			$t_linkad->CurrentAction == "gridadd" ||
			$t_linkad->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_linkad;
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
                
//		// "copy"
//		$oListOpt =& $this->ListOptions->Items["copy"];
//		if ($Security->CanAdd() && $oListOpt->Visible) {
//			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
//		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_linkad->C_LINKAD_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_linkad;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_linkad;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_linkad->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_linkad->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_linkad->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_linkad->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_linkad->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_linkad->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_linkad;
		$t_linkad->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_linkad->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_linkad;

		// Call Recordset Selecting event
		$t_linkad->Recordset_Selecting($t_linkad->CurrentFilter);

		// Load List page SQL
		$sSql = $t_linkad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_linkad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_linkad;
		$sFilter = $t_linkad->KeyFilter();

		// Call Row Selecting event
		$t_linkad->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_linkad->CurrentFilter = $sFilter;
		$sSql = $t_linkad->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_linkad->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_linkad;
		$t_linkad->C_LINKAD_ID->setDbValue($rs->fields('C_LINKAD_ID'));
		$t_linkad->C_LINKAD_NAME->setDbValue($rs->fields('C_LINKAD_NAME'));
		$t_linkad->C_LINKAD_DES->setDbValue($rs->fields('C_LINKAD_DES'));
		$t_linkad->C_LINKAD_TYPE->setDbValue($rs->fields('C_LINKAD_TYPE'));
		$t_linkad->C_LINKAD_URL->setDbValue($rs->fields('C_LINKAD_URL'));
		$t_linkad->C_LINKAD_POS->setDbValue($rs->fields('C_LINKAD_POS'));
		$t_linkad->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_linkad->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_linkad->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_linkad->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_linkad->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_linkad->C_IMG_SOURCE->setDbValue($rs->fields('C_IMG_SOURCE'));
		$t_linkad->C_LINKAD_ACTIVE->setDbValue($rs->fields('C_LINKAD_ACTIVE'));
		$t_linkad->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_linkad->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_linkad;

		// Initialize URLs
		$this->ViewUrl = $t_linkad->ViewUrl();
		$this->EditUrl = $t_linkad->EditUrl();
		$this->InlineEditUrl = $t_linkad->InlineEditUrl();
		$this->CopyUrl = $t_linkad->CopyUrl();
		$this->InlineCopyUrl = $t_linkad->InlineCopyUrl();
		$this->DeleteUrl = $t_linkad->DeleteUrl();

		// Call Row_Rendering event
		$t_linkad->Row_Rendering();

		// Common render codes for all row types
		// C_LINKAD_NAME

		$t_linkad->C_LINKAD_NAME->CellCssStyle = ""; $t_linkad->C_LINKAD_NAME->CellCssClass = "";
		$t_linkad->C_LINKAD_NAME->CellAttrs = array(); $t_linkad->C_LINKAD_NAME->ViewAttrs = array(); $t_linkad->C_LINKAD_NAME->EditAttrs = array();

		// C_LINKAD_TYPE
		$t_linkad->C_LINKAD_TYPE->CellCssStyle = ""; $t_linkad->C_LINKAD_TYPE->CellCssClass = "";
		$t_linkad->C_LINKAD_TYPE->CellAttrs = array(); $t_linkad->C_LINKAD_TYPE->ViewAttrs = array(); $t_linkad->C_LINKAD_TYPE->EditAttrs = array();

		// C_LINKAD_URL
		$t_linkad->C_LINKAD_URL->CellCssStyle = ""; $t_linkad->C_LINKAD_URL->CellCssClass = "";
		$t_linkad->C_LINKAD_URL->CellAttrs = array(); $t_linkad->C_LINKAD_URL->ViewAttrs = array(); $t_linkad->C_LINKAD_URL->EditAttrs = array();

		// C_LINKAD_POS
		$t_linkad->C_LINKAD_POS->CellCssStyle = ""; $t_linkad->C_LINKAD_POS->CellCssClass = "";
		$t_linkad->C_LINKAD_POS->CellAttrs = array(); $t_linkad->C_LINKAD_POS->ViewAttrs = array(); $t_linkad->C_LINKAD_POS->EditAttrs = array();

		// C_LINKAD_ACTIVE
		$t_linkad->C_LINKAD_ACTIVE->CellCssStyle = ""; $t_linkad->C_LINKAD_ACTIVE->CellCssClass = "";
		$t_linkad->C_LINKAD_ACTIVE->CellAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->ViewAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_linkad->C_ORDER->CellCssStyle = ""; $t_linkad->C_ORDER->CellCssClass = "";
		$t_linkad->C_ORDER->CellAttrs = array(); $t_linkad->C_ORDER->ViewAttrs = array(); $t_linkad->C_ORDER->EditAttrs = array();
		if ($t_linkad->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_LINKAD_ID
			$t_linkad->C_LINKAD_ID->ViewValue = $t_linkad->C_LINKAD_ID->CurrentValue;
			$t_linkad->C_LINKAD_ID->CssStyle = "";
			$t_linkad->C_LINKAD_ID->CssClass = "";
			$t_linkad->C_LINKAD_ID->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->ViewValue = $t_linkad->C_LINKAD_NAME->CurrentValue;
			$t_linkad->C_LINKAD_NAME->CssStyle = "";
			$t_linkad->C_LINKAD_NAME->CssClass = "";
			$t_linkad->C_LINKAD_NAME->ViewCustomAttributes = "";

			// C_LINKAD_TYPE
			if (strval($t_linkad->C_LINKAD_TYPE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_TYPE->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_TYPE->ViewValue = "slide";
						break;
					default:
						$t_linkad->C_LINKAD_TYPE->ViewValue = $t_linkad->C_LINKAD_TYPE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_TYPE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_TYPE->CssStyle = "";
			$t_linkad->C_LINKAD_TYPE->CssClass = "";
			$t_linkad->C_LINKAD_TYPE->ViewCustomAttributes = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->ViewValue = $t_linkad->C_LINKAD_URL->CurrentValue;
			$t_linkad->C_LINKAD_URL->CssStyle = "";
			$t_linkad->C_LINKAD_URL->CssClass = "";
			$t_linkad->C_LINKAD_URL->ViewCustomAttributes = "";

			// C_LINKAD_POS
			if (strval($t_linkad->C_LINKAD_POS->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_POS->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_POS->ViewValue = "Trang chu";
						break;
					default:
						$t_linkad->C_LINKAD_POS->ViewValue = $t_linkad->C_LINKAD_POS->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_POS->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_POS->CssStyle = "";
			$t_linkad->C_LINKAD_POS->CssClass = "";
			$t_linkad->C_LINKAD_POS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_linkad->C_USER_ADD->ViewValue = $t_linkad->C_USER_ADD->CurrentValue;
			$t_linkad->C_USER_ADD->CssStyle = "";
			$t_linkad->C_USER_ADD->CssClass = "";
			$t_linkad->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_linkad->C_ADD_TIME->ViewValue = $t_linkad->C_ADD_TIME->CurrentValue;
			$t_linkad->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_ADD_TIME->ViewValue, 7);
			$t_linkad->C_ADD_TIME->CssStyle = "";
			$t_linkad->C_ADD_TIME->CssClass = "";
			$t_linkad->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_linkad->C_USER_EDIT->ViewValue = $t_linkad->C_USER_EDIT->CurrentValue;
			$t_linkad->C_USER_EDIT->CssStyle = "";
			$t_linkad->C_USER_EDIT->CssClass = "";
			$t_linkad->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_linkad->C_EDIT_TIME->ViewValue = $t_linkad->C_EDIT_TIME->CurrentValue;
			$t_linkad->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_EDIT_TIME->ViewValue, 7);
			$t_linkad->C_EDIT_TIME->CssStyle = "";
			$t_linkad->C_EDIT_TIME->CssClass = "";
			$t_linkad->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_linkad->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_linkad->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_linkad->C_SEND_MAIL->ViewValue = "Khong gui mail";
						break;
					case "1":
						$t_linkad->C_SEND_MAIL->ViewValue = "Gui mail cho bo phan thiet ke";
						break;
					default:
						$t_linkad->C_SEND_MAIL->ViewValue = $t_linkad->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_linkad->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_linkad->C_SEND_MAIL->CssStyle = "";
			$t_linkad->C_SEND_MAIL->CssClass = "";
			$t_linkad->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_LINKAD_ACTIVE
			if (strval($t_linkad->C_LINKAD_ACTIVE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_ACTIVE->CurrentValue) {
					case "0":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "No Active";
						break;
					case "1":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "Active";
						break;
					default:
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = $t_linkad->C_LINKAD_ACTIVE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_ACTIVE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_ACTIVE->CssStyle = "";
			$t_linkad->C_LINKAD_ACTIVE->CssClass = "";
			$t_linkad->C_LINKAD_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_linkad->C_ORDER->ViewValue = $t_linkad->C_ORDER->CurrentValue;
			$t_linkad->C_ORDER->ViewValue = ew_FormatDateTime($t_linkad->C_ORDER->ViewValue, 7);
			$t_linkad->C_ORDER->CssStyle = "";
			$t_linkad->C_ORDER->CssClass = "";
			$t_linkad->C_ORDER->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_linkad->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_linkad->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_linkad->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_linkad->FK_CONGTY->ViewValue = $t_linkad->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_linkad->FK_CONGTY->ViewValue = NULL;
			}
			$t_linkad->FK_CONGTY->CssStyle = "";
			$t_linkad->FK_CONGTY->CssClass = "";
			$t_linkad->FK_CONGTY->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->HrefValue = "";
			$t_linkad->C_LINKAD_NAME->TooltipValue = "";

			// C_LINKAD_TYPE
			$t_linkad->C_LINKAD_TYPE->HrefValue = "";
			$t_linkad->C_LINKAD_TYPE->TooltipValue = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->HrefValue = "";
			$t_linkad->C_LINKAD_URL->TooltipValue = "";

			// C_LINKAD_POS
			$t_linkad->C_LINKAD_POS->HrefValue = "";
			$t_linkad->C_LINKAD_POS->TooltipValue = "";

			// C_LINKAD_ACTIVE
			$t_linkad->C_LINKAD_ACTIVE->HrefValue = "";
			$t_linkad->C_LINKAD_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_linkad->C_ORDER->HrefValue = "";
			$t_linkad->C_ORDER->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_linkad->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_linkad->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_linkad;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_linkad->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_linkad->ExportAll) {
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
		if ($t_linkad->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_linkad, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_ID);
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_NAME);
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_TYPE);
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_URL);
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_POS);
				$ExportDoc->ExportCaption($t_linkad->C_USER_ADD);
				$ExportDoc->ExportCaption($t_linkad->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_linkad->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_linkad->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_linkad->C_SEND_MAIL);
				$ExportDoc->ExportCaption($t_linkad->C_LINKAD_ACTIVE);
				$ExportDoc->ExportCaption($t_linkad->C_ORDER);
				$ExportDoc->ExportCaption($t_linkad->FK_CONGTY);
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
				$t_linkad->CssClass = "";
				$t_linkad->CssStyle = "";
				$t_linkad->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_linkad->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_LINKAD_ID', $t_linkad->C_LINKAD_ID->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_LINKAD_NAME', $t_linkad->C_LINKAD_NAME->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_LINKAD_TYPE', $t_linkad->C_LINKAD_TYPE->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_LINKAD_URL', $t_linkad->C_LINKAD_URL->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_LINKAD_POS', $t_linkad->C_LINKAD_POS->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_linkad->C_USER_ADD->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_linkad->C_ADD_TIME->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_linkad->C_USER_EDIT->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_linkad->C_EDIT_TIME->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_SEND_MAIL', $t_linkad->C_SEND_MAIL->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_LINKAD_ACTIVE', $t_linkad->C_LINKAD_ACTIVE->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_linkad->C_ORDER->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY', $t_linkad->FK_CONGTY->ExportValue($t_linkad->Export, $t_linkad->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_linkad->C_LINKAD_ID);
					$ExportDoc->ExportField($t_linkad->C_LINKAD_NAME);
					$ExportDoc->ExportField($t_linkad->C_LINKAD_TYPE);
					$ExportDoc->ExportField($t_linkad->C_LINKAD_URL);
					$ExportDoc->ExportField($t_linkad->C_LINKAD_POS);
					$ExportDoc->ExportField($t_linkad->C_USER_ADD);
					$ExportDoc->ExportField($t_linkad->C_ADD_TIME);
					$ExportDoc->ExportField($t_linkad->C_USER_EDIT);
					$ExportDoc->ExportField($t_linkad->C_EDIT_TIME);
					$ExportDoc->ExportField($t_linkad->C_SEND_MAIL);
					$ExportDoc->ExportField($t_linkad->C_LINKAD_ACTIVE);
					$ExportDoc->ExportField($t_linkad->C_ORDER);
					$ExportDoc->ExportField($t_linkad->FK_CONGTY);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_linkad->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_linkad->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_linkad->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_linkad->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_linkad->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_linkad;
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
		if ($t_linkad->Email_Sending($Email, $EventArgs))
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
		global $t_linkad;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_linkad->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_linkad->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_linkad->getSessionBasicSearchType();
		}

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_linkad->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_linkad->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_linkad;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_linkad->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_linkad->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_linkad->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_linkad->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_linkad->GetAdvancedSearch("w_" . $FldParm);
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
