<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_event_mainlevelinfo.php" ?>
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
$t_event_mainlevel_list = new ct_event_mainlevel_list();
$Page =& $t_event_mainlevel_list;

// Page init
$t_event_mainlevel_list->Page_Init();

// Page main
$t_event_mainlevel_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_event_mainlevel->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_mainlevel_list = new ew_Page("t_event_mainlevel_list");

// page properties
t_event_mainlevel_list.PageID = "list"; // page ID
t_event_mainlevel_list.FormID = "ft_event_mainlevellist"; // form ID
var EW_PAGE_ID = t_event_mainlevel_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_event_mainlevel_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_mainlevel_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_mainlevel_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_mainlevel_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_event_mainlevel->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_event_mainlevel_list->lTotalRecs = $t_event_mainlevel->SelectRecordCount();
	} else {
		if ($rs = $t_event_mainlevel_list->LoadRecordset())
			$t_event_mainlevel_list->lTotalRecs = $rs->RecordCount();
	}
	$t_event_mainlevel_list->lStartRec = 1;
	if ($t_event_mainlevel_list->lDisplayRecs <= 0 || ($t_event_mainlevel->Export <> "" && $t_event_mainlevel->ExportAll)) // Display all records
		$t_event_mainlevel_list->lDisplayRecs = $t_event_mainlevel_list->lTotalRecs;
	if (!($t_event_mainlevel->Export <> "" && $t_event_mainlevel->ExportAll))
		$t_event_mainlevel_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_event_mainlevel_list->LoadRecordset($t_event_mainlevel_list->lStartRec-1, $t_event_mainlevel_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_event_mainlevel->TableCaption() ?>
</span>
 <a style="text-align: right;float: right;font-size: 12px;" href="t_eventlist.php" id="event_calendar">Sự kiện đơn vị</a>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_event_mainlevel->Export == "" && $t_event_mainlevel->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_event_mainlevel_list);" style="text-decoration: none;"><img id="t_event_mainlevel_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_event_mainlevel_list_SearchPanel">
<form name="ft_event_mainlevellistsrch" id="ft_event_mainlevellistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="t_event_mainlevel">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_event_mainlevel->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_event_mainlevel->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_event_mainlevel->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_event_mainlevel->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_mainlevel_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_event_mainlevel->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_event_mainlevel->CurrentAction <> "gridadd" && $t_event_mainlevel->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_mainlevel_list->Pager)) $t_event_mainlevel_list->Pager = new cNumericPager($t_event_mainlevel_list->lStartRec, $t_event_mainlevel_list->lDisplayRecs, $t_event_mainlevel_list->lTotalRecs, $t_event_mainlevel_list->lRecRange) ?>
<?php if ($t_event_mainlevel_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_mainlevel_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_mainlevel_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_mainlevel_list->sSrchWhere == "0=101") { ?>
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

<?php if ($t_event_mainlevel_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_event_mainlevellist, '<?php echo $t_event_mainlevel_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>

<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_event_mainlevellist" id="ft_event_mainlevellist" class="ewForm" action="" method="post">
<div id="gmp_t_event_mainlevel" class="ewGridMiddlePanel">
<?php if ($t_event_mainlevel_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_event_mainlevel->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_event_mainlevel_list->RenderListOptions();

// Render list options (header, left)
$t_event_mainlevel_list->ListOptions->Render("header", "left");
?>
<?php if ($t_event_mainlevel->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_EVENT_NAME) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_EVENT_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_EVENT_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_EVENT_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_EVENT_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_EVENT_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event_mainlevel->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_TYPE_EVENT) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_TYPE_EVENT->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_TYPE_EVENT) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_TYPE_EVENT->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_TYPE_EVENT->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_TYPE_EVENT->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event_mainlevel->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_URL_IMAGES) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_URL_IMAGES->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_URL_IMAGES) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_URL_IMAGES->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_URL_IMAGES->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_URL_IMAGES->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event_mainlevel->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_DATETIME_BEGIN) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_DATETIME_BEGIN) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_DATETIME_BEGIN->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_DATETIME_BEGIN->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event_mainlevel->C_ORDER->Visible) { // C_ORDER ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_ORDER) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_ORDER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_ORDER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_ORDER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_ORDER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_ORDER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event_mainlevel->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->C_ACTIVE_LEVELSITE) == "") { ?>
		<td><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->C_ACTIVE_LEVELSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->C_ACTIVE_LEVELSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->C_ACTIVE_LEVELSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
		
<?php if ($t_event_mainlevel->FK_CONGTY_SEND->Visible) { // FK_CONGTY_SEND ?>
	<?php if ($t_event_mainlevel->SortUrl($t_event_mainlevel->FK_CONGTY_SEND) == "") { ?>
		<td><?php echo $t_event_mainlevel->FK_CONGTY_SEND->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event_mainlevel->SortUrl($t_event_mainlevel->FK_CONGTY_SEND) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event_mainlevel->FK_CONGTY_SEND->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event_mainlevel->FK_CONGTY_SEND->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event_mainlevel->FK_CONGTY_SEND->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_event_mainlevel_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_event_mainlevel->ExportAll && $t_event_mainlevel->Export <> "") {
	$t_event_mainlevel_list->lStopRec = $t_event_mainlevel_list->lTotalRecs;
} else {
	$t_event_mainlevel_list->lStopRec = $t_event_mainlevel_list->lStartRec + $t_event_mainlevel_list->lDisplayRecs - 1; // Set the last record to display
}
$t_event_mainlevel_list->lRecCount = $t_event_mainlevel_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_event_mainlevel_list->lStartRec > 1)
		$rs->Move($t_event_mainlevel_list->lStartRec - 1);
}

// Initialize aggregate
$t_event_mainlevel->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_event_mainlevel_list->RenderRow();
$t_event_mainlevel_list->lRowCnt = 0;
while (($t_event_mainlevel->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_event_mainlevel_list->lRecCount < $t_event_mainlevel_list->lStopRec) {
	$t_event_mainlevel_list->lRecCount++;
	if (intval($t_event_mainlevel_list->lRecCount) >= intval($t_event_mainlevel_list->lStartRec)) {
		$t_event_mainlevel_list->lRowCnt++;

	// Init row class and style
	$t_event_mainlevel->CssClass = "";
	$t_event_mainlevel->CssStyle = "";
	$t_event_mainlevel->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_event_mainlevel->CurrentAction == "gridadd") {
		$t_event_mainlevel_list->LoadDefaultValues(); // Load default values
	} else {
		$t_event_mainlevel_list->LoadRowValues($rs); // Load row values
	}
	$t_event_mainlevel->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_event_mainlevel_list->RenderRow();

	// Render list options
	$t_event_mainlevel_list->RenderListOptions();
?>
	<tr<?php echo $t_event_mainlevel->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_event_mainlevel_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_event_mainlevel->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
		<td<?php echo $t_event_mainlevel->C_EVENT_NAME->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_EVENT_NAME->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_EVENT_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event_mainlevel->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
		<td<?php echo $t_event_mainlevel->C_TYPE_EVENT->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_TYPE_EVENT->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_TYPE_EVENT->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event_mainlevel->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
		<td<?php echo $t_event_mainlevel->C_URL_IMAGES->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_URL_IMAGES->ViewAttributes() ?>>
    <a title="Click xem link" target="_blank" href="<?php echo $t_event_mainlevel->C_URL_LINK->ListViewValue() ?>"><img style="width: 200px" src="<?php echo $t_event_mainlevel->C_URL_IMAGES->ListViewValue() ?>">
    </div>
</td>
	<?php } ?>

	<?php if ($t_event_mainlevel->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
		<td<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->CellAttributes() ?>>
<div style="width:150px" <?php echo $t_event_mainlevel->C_DATETIME_BEGIN->ViewAttributes() ?>>
    Bắt đầu: <?php echo $t_event_mainlevel->C_DATETIME_BEGIN->ListViewValue() ?><br>
    Kết thúc: <?php echo $t_event_mainlevel->C_DATETIME_END->ListViewValue() ?>
</div>
</td>
	<?php } ?>

	<?php if ($t_event_mainlevel->C_ORDER->Visible) { // C_ORDER ?>
		<td<?php echo $t_event_mainlevel->C_ORDER->CellAttributes() ?>>
<div <?php echo $t_event_mainlevel->C_ORDER->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_ORDER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event_mainlevel->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
		<td<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->ListViewValue() ?>
    <br> Thời gian: <?php echo $t_event_mainlevel->C_TIME_ACTIVE->ListViewValue() ?>
</div>
</td>
	<?php } ?>

	<?php if ($t_event_mainlevel->FK_CONGTY_SEND->Visible) { // FK_CONGTY_SEND ?>
		<td<?php echo $t_event_mainlevel->FK_CONGTY_SEND->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->FK_CONGTY_SEND->ViewAttributes() ?>><?php echo $t_event_mainlevel->FK_CONGTY_SEND->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_event_mainlevel_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_event_mainlevel->CurrentAction <> "gridadd")
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
<?php if ($t_event_mainlevel_list->lTotalRecs > 0) { ?>
<?php if ($t_event_mainlevel->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_event_mainlevel->CurrentAction <> "gridadd" && $t_event_mainlevel->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_mainlevel_list->Pager)) $t_event_mainlevel_list->Pager = new cNumericPager($t_event_mainlevel_list->lStartRec, $t_event_mainlevel_list->lDisplayRecs, $t_event_mainlevel_list->lTotalRecs, $t_event_mainlevel_list->lRecRange) ?>
<?php if ($t_event_mainlevel_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_mainlevel_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_mainlevel_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_mainlevel_list->PageUrl() ?>start=<?php echo $t_event_mainlevel_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_mainlevel_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_event_mainlevel_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_mainlevel_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_event_mainlevel_list->lTotalRecs > 0) { ?>
<span class="phpmaker">

<?php if ($t_event_mainlevel_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_event_mainlevellist, '<?php echo $t_event_mainlevel_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>

<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_event_mainlevel->Export == "" && $t_event_mainlevel->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_event_mainlevel->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_event_mainlevel_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_mainlevel_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_event_mainlevel';

	// Page object name
	var $PageObjName = 't_event_mainlevel_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) $PageUrl .= "t=" . $t_event_mainlevel->TableVar . "&"; // Add page token
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
		global $objForm, $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) {
			if ($objForm)
				return ($t_event_mainlevel->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event_mainlevel->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_mainlevel_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event_mainlevel)
		$GLOBALS["t_event_mainlevel"] = new ct_event_mainlevel();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_event_mainlevel"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_event_mainleveldelete.php";
		$this->MultiUpdateUrl = "t_event_mainlevelupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event_mainlevel', TRUE);

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
		global $t_event_mainlevel;

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
			$t_event_mainlevel->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_event_mainlevel->Export = $_POST["exporttype"];
		} else {
			$t_event_mainlevel->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_event_mainlevel->Export; // Get export parameter, used in header
		$gsExportFile = $t_event_mainlevel->TableVar; // Get export file, used in header
		if (in_array($t_event_mainlevel->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_event_mainlevel->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_event_mainlevel->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_event_mainlevel->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_event_mainlevel->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_event_mainlevel;

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
			$t_event_mainlevel->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($t_event_mainlevel->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_event_mainlevel->getRecordsPerPage(); // Restore from Session
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
		$t_event_mainlevel->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_event_mainlevel->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_event_mainlevel->getSearchWhere();
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
		$t_event_mainlevel->setSessionWhere($sFilter);
		$t_event_mainlevel->CurrentFilter = "";

		// Export data only
		if (in_array($t_event_mainlevel->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_event_mainlevel->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_event_mainlevel;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_event_mainlevel->C_EVENT_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event_mainlevel->C_URL_IMAGES, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event_mainlevel->C_URL_LINK, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event_mainlevel->C_NOTE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event_mainlevel->C_ARRAY_TINBAI, $Keyword);
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
		global $Security, $t_event_mainlevel;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_event_mainlevel->BasicSearchKeyword;
		$sSearchType = $t_event_mainlevel->BasicSearchType;
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
			$t_event_mainlevel->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_event_mainlevel->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_event_mainlevel;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_event_mainlevel->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_event_mainlevel;
		$t_event_mainlevel->setSessionBasicSearchKeyword("");
		$t_event_mainlevel->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_event_mainlevel;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_event_mainlevel->BasicSearchKeyword = $t_event_mainlevel->getSessionBasicSearchKeyword();
			$t_event_mainlevel->BasicSearchType = $t_event_mainlevel->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_event_mainlevel;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_event_mainlevel->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_event_mainlevel->CurrentOrderType = @$_GET["ordertype"];
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_EVENT_NAME, $bCtrl); // C_EVENT_NAME
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_TYPE_EVENT, $bCtrl); // C_TYPE_EVENT
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_URL_IMAGES, $bCtrl); // C_URL_IMAGES
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_URL_LINK, $bCtrl); // C_URL_LINK
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_DATETIME_BEGIN, $bCtrl); // C_DATETIME_BEGIN
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_DATETIME_END, $bCtrl); // C_DATETIME_END
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_ORDER, $bCtrl); // C_ORDER
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_ACTIVE_LEVELSITE, $bCtrl); // C_ACTIVE_LEVELSITE
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->C_TIME_ACTIVE, $bCtrl); // C_TIME_ACTIVE
			$t_event_mainlevel->UpdateSort($t_event_mainlevel->FK_CONGTY_SEND, $bCtrl); // FK_CONGTY_SEND
			$t_event_mainlevel->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_event_mainlevel;
		$sOrderBy = $t_event_mainlevel->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_event_mainlevel->SqlOrderBy() <> "") {
				$sOrderBy = $t_event_mainlevel->SqlOrderBy();
				$t_event_mainlevel->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_event_mainlevel;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_event_mainlevel->setSessionOrderBy($sOrderBy);
				$t_event_mainlevel->C_EVENT_NAME->setSort("");
				$t_event_mainlevel->C_TYPE_EVENT->setSort("");
				$t_event_mainlevel->C_URL_IMAGES->setSort("");
				$t_event_mainlevel->C_URL_LINK->setSort("");
				$t_event_mainlevel->C_DATETIME_BEGIN->setSort("");
				$t_event_mainlevel->C_DATETIME_END->setSort("");
				$t_event_mainlevel->C_ORDER->setSort("");
				$t_event_mainlevel->C_ACTIVE_LEVELSITE->setSort("");
				$t_event_mainlevel->C_TIME_ACTIVE->setSort("");
				$t_event_mainlevel->FK_CONGTY_SEND->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_event_mainlevel;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_event_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_event_mainlevel->Export <> "" ||
			$t_event_mainlevel->CurrentAction == "gridadd" ||
			$t_event_mainlevel->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_event_mainlevel;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($oListOpt->Visible) {
			 switch ($t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue)
                    {
                     case 0:
                         $oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">Xác nhận <img src='images/new_01.gif'></a>";
                         break;
                     case 1:
                          $oListOpt->Body = "&nbsp; &nbsp; <a href=\"" . $this->EditUrl . "\"> <img src='images/icon-xac-thuc.jpg'></a>";
                         break;
                     case 2;
                          $oListOpt->Body = "&nbsp;&nbsp;<a href=\"" . $this->EditUrl . "\">  <img src='images/Stop.png'></a>";
                         break;
                    }
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_event_mainlevel;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_event_mainlevel;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_event_mainlevel->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_event_mainlevel->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_event_mainlevel;
		$t_event_mainlevel->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_event_mainlevel->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_event_mainlevel;

		// Call Recordset Selecting event
		$t_event_mainlevel->Recordset_Selecting($t_event_mainlevel->CurrentFilter);

		// Load List page SQL
		$sSql = $t_event_mainlevel->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_event_mainlevel->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event_mainlevel;
		$sFilter = $t_event_mainlevel->KeyFilter();

		// Call Row Selecting event
		$t_event_mainlevel->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event_mainlevel->CurrentFilter = $sFilter;
		$sSql = $t_event_mainlevel->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event_mainlevel->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event_mainlevel;
		$t_event_mainlevel->PK_EVENT_MAINLEVEL->setDbValue($rs->fields('PK_EVENT_MAINLEVEL'));
		$t_event_mainlevel->FK_EVENT_ID->setDbValue($rs->fields('FK_EVENT_ID'));
		$t_event_mainlevel->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_event_mainlevel->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$t_event_mainlevel->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$t_event_mainlevel->C_POST->setDbValue($rs->fields('C_POST'));
		$t_event_mainlevel->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$t_event_mainlevel->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$t_event_mainlevel->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$t_event_mainlevel->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$t_event_mainlevel->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_event_mainlevel->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_event_mainlevel->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_event_mainlevel->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_event_mainlevel->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_event_mainlevel->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$t_event_mainlevel->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_event_mainlevel->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$t_event_mainlevel->C_TYPE_ACTIVE->setDbValue($rs->fields('C_TYPE_ACTIVE'));
		$t_event_mainlevel->C_ARRAY_TINBAI->setDbValue($rs->fields('C_ARRAY_TINBAI'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event_mainlevel;

		// Initialize URLs
		$this->ViewUrl = $t_event_mainlevel->ViewUrl();
		$this->EditUrl = $t_event_mainlevel->EditUrl();
		$this->InlineEditUrl = $t_event_mainlevel->InlineEditUrl();
		$this->CopyUrl = $t_event_mainlevel->CopyUrl();
		$this->InlineCopyUrl = $t_event_mainlevel->InlineCopyUrl();
		$this->DeleteUrl = $t_event_mainlevel->DeleteUrl();

		// Call Row_Rendering event
		$t_event_mainlevel->Row_Rendering();

		// Common render codes for all row types
		// C_EVENT_NAME

		$t_event_mainlevel->C_EVENT_NAME->CellCssStyle = ""; $t_event_mainlevel->C_EVENT_NAME->CellCssClass = "";
		$t_event_mainlevel->C_EVENT_NAME->CellAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->ViewAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event_mainlevel->C_TYPE_EVENT->CellCssStyle = ""; $t_event_mainlevel->C_TYPE_EVENT->CellCssClass = "";
		$t_event_mainlevel->C_TYPE_EVENT->CellAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->ViewAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->EditAttrs = array();

		// C_URL_IMAGES
		$t_event_mainlevel->C_URL_IMAGES->CellCssStyle = ""; $t_event_mainlevel->C_URL_IMAGES->CellCssClass = "";
		$t_event_mainlevel->C_URL_IMAGES->CellAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->ViewAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$t_event_mainlevel->C_URL_LINK->CellCssStyle = ""; $t_event_mainlevel->C_URL_LINK->CellCssClass = "";
		$t_event_mainlevel->C_URL_LINK->CellAttrs = array(); $t_event_mainlevel->C_URL_LINK->ViewAttrs = array(); $t_event_mainlevel->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event_mainlevel->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_BEGIN->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event_mainlevel->C_DATETIME_END->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_END->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_END->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_END->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_END->EditAttrs = array();

		// C_ORDER
		$t_event_mainlevel->C_ORDER->CellCssStyle = ""; $t_event_mainlevel->C_ORDER->CellCssClass = "";
		$t_event_mainlevel->C_ORDER->CellAttrs = array(); $t_event_mainlevel->C_ORDER->ViewAttrs = array(); $t_event_mainlevel->C_ORDER->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_event_mainlevel->C_TIME_ACTIVE->CellCssStyle = ""; $t_event_mainlevel->C_TIME_ACTIVE->CellCssClass = "";
		$t_event_mainlevel->C_TIME_ACTIVE->CellAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->ViewAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->EditAttrs = array();

		// FK_CONGTY_SEND
		$t_event_mainlevel->FK_CONGTY_SEND->CellCssStyle = ""; $t_event_mainlevel->FK_CONGTY_SEND->CellCssClass = "";
		$t_event_mainlevel->FK_CONGTY_SEND->CellAttrs = array(); $t_event_mainlevel->FK_CONGTY_SEND->ViewAttrs = array(); $t_event_mainlevel->FK_CONGTY_SEND->EditAttrs = array();
		if ($t_event_mainlevel->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_EVENT_MAINLEVEL
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewValue = $t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue;
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssStyle = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssClass = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewCustomAttributes = "";

			// FK_EVENT_ID
			$t_event_mainlevel->FK_EVENT_ID->ViewValue = $t_event_mainlevel->FK_EVENT_ID->CurrentValue;
			$t_event_mainlevel->FK_EVENT_ID->CssStyle = "";
			$t_event_mainlevel->FK_EVENT_ID->CssClass = "";
			$t_event_mainlevel->FK_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
			if (strval($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_ID->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_ID->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->ViewValue = $t_event_mainlevel->C_EVENT_NAME->CurrentValue;
			$t_event_mainlevel->C_EVENT_NAME->CssStyle = "";
			$t_event_mainlevel->C_EVENT_NAME->CssClass = "";
			$t_event_mainlevel->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su kien popup";
						break;
					case "2":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su lien theo bai viet";
						break;
					case "3":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Laoi su kien lien ket";
						break;
					default:
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = $t_event_mainlevel->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event_mainlevel->C_TYPE_EVENT->CssStyle = "";
			$t_event_mainlevel->C_TYPE_EVENT->CssClass = "";
			$t_event_mainlevel->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event_mainlevel->C_POST->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_POST->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event_mainlevel->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event_mainlevel->C_POST->ViewValue = "";
						break;
					default:
						$t_event_mainlevel->C_POST->ViewValue = $t_event_mainlevel->C_POST->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_POST->ViewValue = NULL;
			}
			$t_event_mainlevel->C_POST->CssStyle = "";
			$t_event_mainlevel->C_POST->CssClass = "";
			$t_event_mainlevel->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->ViewValue = $t_event_mainlevel->C_URL_IMAGES->CurrentValue;
			$t_event_mainlevel->C_URL_IMAGES->CssStyle = "";
			$t_event_mainlevel->C_URL_IMAGES->CssClass = "";
			$t_event_mainlevel->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->ViewValue = $t_event_mainlevel->C_URL_LINK->CurrentValue;
			$t_event_mainlevel->C_URL_LINK->CssStyle = "";
			$t_event_mainlevel->C_URL_LINK->CssClass = "";
			$t_event_mainlevel->C_URL_LINK->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = $t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue;
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_BEGIN->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->CssClass = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->ViewValue = $t_event_mainlevel->C_DATETIME_END->CurrentValue;
			$t_event_mainlevel->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_END->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_END->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_END->CssClass = "";
			$t_event_mainlevel->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->ViewValue = $t_event_mainlevel->C_ORDER->CurrentValue;
			$t_event_mainlevel->C_ORDER->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ORDER->ViewValue, 7);
			$t_event_mainlevel->C_ORDER->CssStyle = "";
			$t_event_mainlevel->C_ORDER->CssClass = "";
			$t_event_mainlevel->C_ORDER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->ViewValue = $t_event_mainlevel->C_USER_ADD->CurrentValue;
			$t_event_mainlevel->C_USER_ADD->CssStyle = "";
			$t_event_mainlevel->C_USER_ADD->CssClass = "";
			$t_event_mainlevel->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->ViewValue = $t_event_mainlevel->C_ADD_TIME->CurrentValue;
			$t_event_mainlevel->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ADD_TIME->ViewValue, 7);
			$t_event_mainlevel->C_ADD_TIME->CssStyle = "";
			$t_event_mainlevel->C_ADD_TIME->CssClass = "";
			$t_event_mainlevel->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->ViewValue = $t_event_mainlevel->C_USER_EDIT->CurrentValue;
			$t_event_mainlevel->C_USER_EDIT->CssStyle = "";
			$t_event_mainlevel->C_USER_EDIT->CssClass = "";
			$t_event_mainlevel->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = $t_event_mainlevel->C_EDIT_TIME->CurrentValue;
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_EDIT_TIME->ViewValue, 7);
			$t_event_mainlevel->C_EDIT_TIME->CssStyle = "";
			$t_event_mainlevel->C_EDIT_TIME->CssClass = "";
			$t_event_mainlevel->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
						break;
					default:
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = $t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = $t_event_mainlevel->C_TIME_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_TIME_ACTIVE->ViewValue, 7);
			$t_event_mainlevel->C_TIME_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TIME_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// FK_CONGTY_SEND
			if (strval($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $t_event_mainlevel->FK_CONGTY_SEND->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_SEND->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_SEND->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_SEND->ViewCustomAttributes = "";

			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewValue = $t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TYPE_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewCustomAttributes = "";

			// C_ARRAY_TINBAI
			if (strval($t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TITLE` FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ARRAY_TINBAI->CssStyle = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->CssClass = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->HrefValue = "";
			$t_event_mainlevel->C_EVENT_NAME->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event_mainlevel->C_TYPE_EVENT->HrefValue = "";
			$t_event_mainlevel->C_TYPE_EVENT->TooltipValue = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->HrefValue = "";
			$t_event_mainlevel->C_URL_IMAGES->TooltipValue = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->HrefValue = "";
			$t_event_mainlevel->C_URL_LINK->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_END->TooltipValue = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->HrefValue = "";
			$t_event_mainlevel->C_ORDER->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->HrefValue = "";
			$t_event_mainlevel->C_TIME_ACTIVE->TooltipValue = "";

			// FK_CONGTY_SEND
			$t_event_mainlevel->FK_CONGTY_SEND->HrefValue = "";
			$t_event_mainlevel->FK_CONGTY_SEND->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_event_mainlevel->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event_mainlevel->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_event_mainlevel;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_event_mainlevel->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_event_mainlevel->ExportAll) {
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
		if ($t_event_mainlevel->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_event_mainlevel, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_event_mainlevel->PK_EVENT_MAINLEVEL);
				$ExportDoc->ExportCaption($t_event_mainlevel->FK_EVENT_ID);
				$ExportDoc->ExportCaption($t_event_mainlevel->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_TYPE_EVENT);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_POST);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_DATETIME_BEGIN);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_DATETIME_END);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_ORDER);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_USER_ADD);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_ACTIVE_LEVELSITE);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_TIME_ACTIVE);
				$ExportDoc->ExportCaption($t_event_mainlevel->FK_CONGTY_SEND);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_TYPE_ACTIVE);
				$ExportDoc->ExportCaption($t_event_mainlevel->C_ARRAY_TINBAI);
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
				$t_event_mainlevel->CssClass = "";
				$t_event_mainlevel->CssStyle = "";
				$t_event_mainlevel->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_event_mainlevel->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_EVENT_MAINLEVEL', $t_event_mainlevel->PK_EVENT_MAINLEVEL->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('FK_EVENT_ID', $t_event_mainlevel->FK_EVENT_ID->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_event_mainlevel->FK_CONGTY_ID->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE_EVENT', $t_event_mainlevel->C_TYPE_EVENT->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_POST', $t_event_mainlevel->C_POST->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_BEGIN', $t_event_mainlevel->C_DATETIME_BEGIN->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_END', $t_event_mainlevel->C_DATETIME_END->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_event_mainlevel->C_ORDER->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_event_mainlevel->C_USER_ADD->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_event_mainlevel->C_ADD_TIME->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_event_mainlevel->C_USER_EDIT->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_event_mainlevel->C_EDIT_TIME->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_LEVELSITE', $t_event_mainlevel->C_ACTIVE_LEVELSITE->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE', $t_event_mainlevel->C_TIME_ACTIVE->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_SEND', $t_event_mainlevel->FK_CONGTY_SEND->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE_ACTIVE', $t_event_mainlevel->C_TYPE_ACTIVE->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
					$XmlDoc->AddField('C_ARRAY_TINBAI', $t_event_mainlevel->C_ARRAY_TINBAI->ExportValue($t_event_mainlevel->Export, $t_event_mainlevel->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_event_mainlevel->PK_EVENT_MAINLEVEL);
					$ExportDoc->ExportField($t_event_mainlevel->FK_EVENT_ID);
					$ExportDoc->ExportField($t_event_mainlevel->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_event_mainlevel->C_TYPE_EVENT);
					$ExportDoc->ExportField($t_event_mainlevel->C_POST);
					$ExportDoc->ExportField($t_event_mainlevel->C_DATETIME_BEGIN);
					$ExportDoc->ExportField($t_event_mainlevel->C_DATETIME_END);
					$ExportDoc->ExportField($t_event_mainlevel->C_ORDER);
					$ExportDoc->ExportField($t_event_mainlevel->C_USER_ADD);
					$ExportDoc->ExportField($t_event_mainlevel->C_ADD_TIME);
					$ExportDoc->ExportField($t_event_mainlevel->C_USER_EDIT);
					$ExportDoc->ExportField($t_event_mainlevel->C_EDIT_TIME);
					$ExportDoc->ExportField($t_event_mainlevel->C_ACTIVE_LEVELSITE);
					$ExportDoc->ExportField($t_event_mainlevel->C_TIME_ACTIVE);
					$ExportDoc->ExportField($t_event_mainlevel->FK_CONGTY_SEND);
					$ExportDoc->ExportField($t_event_mainlevel->C_TYPE_ACTIVE);
					$ExportDoc->ExportField($t_event_mainlevel->C_ARRAY_TINBAI);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_event_mainlevel->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_event_mainlevel->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_event_mainlevel->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_event_mainlevel->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_event_mainlevel->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_event_mainlevel;
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
		if ($t_event_mainlevel->Email_Sending($Email, $EventArgs))
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
		global $t_event_mainlevel;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_event_mainlevel->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_event_mainlevel->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_event_mainlevel->getSessionBasicSearchType();
		}

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_event_mainlevel->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_event_mainlevel->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_event_mainlevel;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_event_mainlevel->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_event_mainlevel->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_event_mainlevel->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_event_mainlevel->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_event_mainlevel->GetAdvancedSearch("w_" . $FldParm);
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
