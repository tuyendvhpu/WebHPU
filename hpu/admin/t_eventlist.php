<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_eventinfo.php" ?>
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
$t_event_list = new ct_event_list();
$Page =& $t_event_list;

// Page init
$t_event_list->Page_Init();

// Page main
$t_event_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_event->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_list = new ew_Page("t_event_list");

// page properties
t_event_list.PageID = "list"; // page ID
t_event_list.FormID = "ft_eventlist"; // form ID
var EW_PAGE_ID = t_event_list.PageID; // for backward compatibility

// extend page with validate function for search
t_event_list.ValidateSearch = function(fobj) {
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
t_event_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_event->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_event_list->lTotalRecs = $t_event->SelectRecordCount();
	} else {
		if ($rs = $t_event_list->LoadRecordset())
			$t_event_list->lTotalRecs = $rs->RecordCount();
	}
	$t_event_list->lStartRec = 1;
	if ($t_event_list->lDisplayRecs <= 0 || ($t_event->Export <> "" && $t_event->ExportAll)) // Display all records
		$t_event_list->lDisplayRecs = $t_event_list->lTotalRecs;
	if (!($t_event->Export <> "" && $t_event->ExportAll))
		$t_event_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_event_list->LoadRecordset($t_event_list->lStartRec-1, $t_event_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_event->TableCaption() ?></span>
<?php 
$conn = ew_Connect();
global $Security;
$sSqlWrk = "SELECT * FROM t_event_mainlevel";
$sWhereWrk = "(t_event_mainlevel.C_TYPE_ACTIVE = 0) AND (t_event_mainlevel.FK_CONGTY_ID <> t_event_mainlevel.FK_CONGTY_SEND) AND (t_event_mainlevel.FK_CONGTY_ID = ".$Security->CurrentUserOption().")";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
   ?>
 <?php if($rowswrk) {?>
    <a style="text-align: right;float: right;font-size: 12px;" href="t_event_mainlevellist.php" id="event_calendar">Sự kiện liên quan <img src="images/new.gif"></a>
 <?php } else {  ?>  
    <a style="text-align: right;float: right;font-size: 12px;" href="t_event_mainlevellist.php" id="event_calendar">Sự kiện liên quan</a>
 <?php } ?>   
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_event->Export == "" && $t_event->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_event_list);" style="text-decoration: none;"><img id="t_event_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_event_list_SearchPanel">
<form name="ft_eventlistsrch" id="ft_eventlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_event_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_event">
<?php
if ($gsSearchError == "")
	$t_event_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_event->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_event_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_event->C_EVENT_NAME->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_EVENT_NAME" id="z_C_EVENT_NAME" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
                                    <input size="50" type="text" name="x_C_EVENT_NAME" id="x_C_EVENT_NAME" title="<?php echo $t_event->C_EVENT_NAME->FldTitle() ?>" value="<?php echo $t_event->C_EVENT_NAME->EditValue ?>"<?php echo $t_event->C_EVENT_NAME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_TYPE_EVENT" id="z_C_TYPE_EVENT" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_C_TYPE_EVENT" name="x_C_TYPE_EVENT" title="<?php echo $t_event->C_TYPE_EVENT->FldTitle() ?>"<?php echo $t_event->C_TYPE_EVENT->EditAttributes() ?>>
<?php
if (is_array($t_event->C_TYPE_EVENT->EditValue)) {
	$arwrk = $t_event->C_TYPE_EVENT->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_TYPE_EVENT->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker"><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE_LEVELSITE" id="z_C_ACTIVE_LEVELSITE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE_LEVELSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="{value}"<?php echo $t_event->C_ACTIVE_LEVELSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_LEVELSITE" repeatcolumn="5">
<?php
$arwrk = $t_event->C_ACTIVE_LEVELSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_ACTIVE_LEVELSITE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event->C_ACTIVE_LEVELSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input size="50"  type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_event->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_event_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_event->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_event->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_event->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_event->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_event->CurrentAction <> "gridadd" && $t_event->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_list->Pager)) $t_event_list->Pager = new cNumericPager($t_event_list->lStartRec, $t_event_list->lDisplayRecs, $t_event_list->lTotalRecs, $t_event_list->lRecRange) ?>
<?php if ($t_event_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_event_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_event_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_event_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_event_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_event_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_eventlist, '<?php echo $t_event_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_eventlist, '<?php echo $t_event_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_eventlist" id="ft_eventlist" class="ewForm" action="" method="post">
<div id="gmp_t_event" class="ewGridMiddlePanel">
<?php if ($t_event_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_event->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_event_list->RenderListOptions();

// Render list options (header, left)
$t_event_list->ListOptions->Render("header", "left");
?>
<?php if ($t_event->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<?php if ($t_event->SortUrl($t_event->FK_CONGTY_ID) == "") { ?>
		<td><?php echo $t_event->FK_CONGTY_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->FK_CONGTY_ID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->FK_CONGTY_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event->FK_CONGTY_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->FK_CONGTY_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<?php if ($t_event->SortUrl($t_event->C_EVENT_NAME) == "") { ?>
		<td><?php echo $t_event->C_EVENT_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_EVENT_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_EVENT_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_event->C_EVENT_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_EVENT_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<?php if ($t_event->SortUrl($t_event->C_TYPE_EVENT) == "") { ?>
		<td><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_TYPE_EVENT) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event->C_TYPE_EVENT->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_TYPE_EVENT->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<?php if ($t_event->SortUrl($t_event->C_URL_IMAGES) == "") { ?>
		<td><?php echo $t_event->C_URL_IMAGES->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_URL_IMAGES) ?>',2);">
      <table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_URL_IMAGES->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_event->C_URL_IMAGES->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_URL_IMAGES->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<?php if ($t_event->SortUrl($t_event->C_DATETIME_BEGIN) == "") { ?>
		<td><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_DATETIME_BEGIN) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event->C_DATETIME_BEGIN->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_DATETIME_BEGIN->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_ODER->Visible) { // C_ODER ?>
	<?php if ($t_event->SortUrl($t_event->C_ODER) == "") { ?>
		<td><?php echo $t_event->C_ODER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_ODER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_ODER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event->C_ODER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_ODER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_event->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
	<?php if ($t_event->SortUrl($t_event->C_ACTIVE_LEVELSITE) == "") { ?>
		<td><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_event->SortUrl($t_event->C_ACTIVE_LEVELSITE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_event->C_ACTIVE_LEVELSITE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_event->C_ACTIVE_LEVELSITE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_event_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_event->ExportAll && $t_event->Export <> "") {
	$t_event_list->lStopRec = $t_event_list->lTotalRecs;
} else {
	$t_event_list->lStopRec = $t_event_list->lStartRec + $t_event_list->lDisplayRecs - 1; // Set the last record to display
}
$t_event_list->lRecCount = $t_event_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_event_list->lStartRec > 1)
		$rs->Move($t_event_list->lStartRec - 1);
}

// Initialize aggregate
$t_event->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_event_list->RenderRow();
$t_event_list->lRowCnt = 0;
while (($t_event->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_event_list->lRecCount < $t_event_list->lStopRec) {
	$t_event_list->lRecCount++;
	if (intval($t_event_list->lRecCount) >= intval($t_event_list->lStartRec)) {
		$t_event_list->lRowCnt++;

	// Init row class and style
	$t_event->CssClass = "";
	$t_event->CssStyle = "";
	$t_event->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_event->CurrentAction == "gridadd") {
		$t_event_list->LoadDefaultValues(); // Load default values
	} else {
		$t_event_list->LoadRowValues($rs); // Load row values
	}
	$t_event->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_event_list->RenderRow();

	// Render list options
	$t_event_list->RenderListOptions();
?>
	<tr<?php echo $t_event->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_event_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_event->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
		<td<?php echo $t_event->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_event->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_event->FK_CONGTY_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>>
<div<?php echo $t_event->C_EVENT_NAME->ViewAttributes() ?>><?php echo $t_event->C_EVENT_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>>
<div<?php echo $t_event->C_TYPE_EVENT->ViewAttributes() ?>>
    <?php echo $t_event->C_TYPE_EVENT->ListViewValue() ; ?></div>
</td>
	<?php } ?>
	<?php if ($t_event->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>>
<div<?php echo $t_event->C_URL_IMAGES->ViewAttributes() ?>>
    <a title="click xem link" href="<?php echo $t_event->C_URL_LINK->ListViewValue() ?>"> <img style="width:200px" src="<?php echo $t_event->C_URL_IMAGES->ListViewValue()?>"> </a>
 </div>
</td>
	<?php } ?>

	<?php if ($t_event->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>>
<div<?php echo $t_event->C_DATETIME_BEGIN->ViewAttributes() ?>>Bắt đầu: <?php echo $t_event->C_DATETIME_BEGIN->ListViewValue() ?>
<br/> Kết thúc: <?php echo $t_event->C_DATETIME_END->ListViewValue() ?>
</div>
</td>
	<?php } ?>

	<?php if ($t_event->C_ODER->Visible) { // C_ODER ?>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>>
<div<?php echo $t_event->C_ODER->ViewAttributes() ?>><?php echo $t_event->C_ODER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_event->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<div<?php echo $t_event->C_ACTIVE_LEVELSITE->ViewAttributes() ?>><?php echo $t_event->C_ACTIVE_LEVELSITE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_event_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_event->CurrentAction <> "gridadd")
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
<?php if ($t_event_list->lTotalRecs > 0) { ?>
<?php if ($t_event->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_event->CurrentAction <> "gridadd" && $t_event->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_list->Pager)) $t_event_list->Pager = new cNumericPager($t_event_list->lStartRec, $t_event_list->lDisplayRecs, $t_event_list->lTotalRecs, $t_event_list->lRecRange) ?>
<?php if ($t_event_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_list->PageUrl() ?>start=<?php echo $t_event_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_event_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_event_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_event_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_event_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_event_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_event_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_eventlist, '<?php echo $t_event_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_eventlist, '<?php echo $t_event_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_event->Export == "" && $t_event->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_event->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_event_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_event';

	// Page object name
	var $PageObjName = 't_event_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event;
		if ($t_event->UseTokenInUrl) $PageUrl .= "t=" . $t_event->TableVar . "&"; // Add page token
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
		global $objForm, $t_event;
		if ($t_event->UseTokenInUrl) {
			if ($objForm)
				return ($t_event->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event)
		$GLOBALS["t_event"] = new ct_event();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_event"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_eventdelete.php";
		$this->MultiUpdateUrl = "t_eventupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event', TRUE);

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
		global $t_event;

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
			$t_event->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_event->Export = $_POST["exporttype"];
		} else {
			$t_event->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_event->Export; // Get export parameter, used in header
		$gsExportFile = $t_event->TableVar; // Get export file, used in header
		if (in_array($t_event->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_event->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_event->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_event->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_event->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_event;

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
			$t_event->Recordset_SearchValidated();

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
		if ($t_event->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_event->getRecordsPerPage(); // Restore from Session
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
		$t_event->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_event->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_event->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_event->getSearchWhere();
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
		$t_event->setSessionWhere($sFilter);
		$t_event->CurrentFilter = "";

		// Export data only
		if (in_array($t_event->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_event->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_event;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_event->C_EVENT_ID, FALSE); // C_EVENT_ID
		$this->BuildSearchSql($sWhere, $t_event->FK_CONGTY_ID, FALSE); // FK_CONGTY_ID
		$this->BuildSearchSql($sWhere, $t_event->C_EVENT_NAME, FALSE); // C_EVENT_NAME
		$this->BuildSearchSql($sWhere, $t_event->C_TYPE_EVENT, FALSE); // C_TYPE_EVENT
		$this->BuildSearchSql($sWhere, $t_event->C_POST, FALSE); // C_POST
		$this->BuildSearchSql($sWhere, $t_event->C_URL_IMAGES, FALSE); // C_URL_IMAGES
		$this->BuildSearchSql($sWhere, $t_event->C_URL_LINK, FALSE); // C_URL_LINK
		$this->BuildSearchSql($sWhere, $t_event->C_DATETIME_BEGIN, FALSE); // C_DATETIME_BEGIN
		$this->BuildSearchSql($sWhere, $t_event->C_DATETIME_END, FALSE); // C_DATETIME_END
		$this->BuildSearchSql($sWhere, $t_event->C_ODER, FALSE); // C_ODER
		$this->BuildSearchSql($sWhere, $t_event->C_NOTE, FALSE); // C_NOTE
		$this->BuildSearchSql($sWhere, $t_event->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_event->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_event->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_event->C_EDIT_TIME, FALSE); // C_EDIT_TIME
		$this->BuildSearchSql($sWhere, $t_event->C_ACTIVE_LEVELSITE, FALSE); // C_ACTIVE_LEVELSITE
		$this->BuildSearchSql($sWhere, $t_event->C_TIME_ACTIVE, FALSE); // C_TIME_ACTIVE
		$this->BuildSearchSql($sWhere, $t_event->C_SEND_MAIL, FALSE); // C_SEND_MAIL
		$this->BuildSearchSql($sWhere, $t_event->C_CONTENT_MAIL, FALSE); // C_CONTENT_MAIL
		$this->BuildSearchSql($sWhere, $t_event->C_FK_BROWSE, TRUE); // C_FK_BROWSE
		$this->BuildSearchSql($sWhere, $t_event->FK_ARRAY_TINBAI, TRUE); // FK_ARRAY_TINBAI
		$this->BuildSearchSql($sWhere, $t_event->FK_ARRAY_CONGTY, TRUE); // FK_ARRAY_CONGTY

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_event->C_EVENT_ID); // C_EVENT_ID
			$this->SetSearchParm($t_event->FK_CONGTY_ID); // FK_CONGTY_ID
			$this->SetSearchParm($t_event->C_EVENT_NAME); // C_EVENT_NAME
			$this->SetSearchParm($t_event->C_TYPE_EVENT); // C_TYPE_EVENT
			$this->SetSearchParm($t_event->C_POST); // C_POST
			$this->SetSearchParm($t_event->C_URL_IMAGES); // C_URL_IMAGES
			$this->SetSearchParm($t_event->C_URL_LINK); // C_URL_LINK
			$this->SetSearchParm($t_event->C_DATETIME_BEGIN); // C_DATETIME_BEGIN
			$this->SetSearchParm($t_event->C_DATETIME_END); // C_DATETIME_END
			$this->SetSearchParm($t_event->C_ODER); // C_ODER
			$this->SetSearchParm($t_event->C_NOTE); // C_NOTE
			$this->SetSearchParm($t_event->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_event->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_event->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_event->C_EDIT_TIME); // C_EDIT_TIME
			$this->SetSearchParm($t_event->C_ACTIVE_LEVELSITE); // C_ACTIVE_LEVELSITE
			$this->SetSearchParm($t_event->C_TIME_ACTIVE); // C_TIME_ACTIVE
			$this->SetSearchParm($t_event->C_SEND_MAIL); // C_SEND_MAIL
			$this->SetSearchParm($t_event->C_CONTENT_MAIL); // C_CONTENT_MAIL
			$this->SetSearchParm($t_event->C_FK_BROWSE); // C_FK_BROWSE
			$this->SetSearchParm($t_event->FK_ARRAY_TINBAI); // FK_ARRAY_TINBAI
			$this->SetSearchParm($t_event->FK_ARRAY_CONGTY); // FK_ARRAY_CONGTY
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
		global $t_event;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_event->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_event->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_event->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_event->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_event->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_event;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_event->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_event->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_event->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_event->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_event->GetAdvancedSearch("w_$FldParm");
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
		global $t_event;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_EVENT_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_URL_IMAGES, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_URL_LINK, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_NOTE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_CONTENT_MAIL, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->C_FK_BROWSE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->FK_ARRAY_TINBAI, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_event->FK_ARRAY_CONGTY, $Keyword);
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
		global $Security, $t_event;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_event->BasicSearchKeyword;
		$sSearchType = $t_event->BasicSearchType;
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
			$t_event->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_event->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_event;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_event->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_event;
		$t_event->setSessionBasicSearchKeyword("");
		$t_event->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_event;
		$t_event->setAdvancedSearch("x_C_EVENT_ID", "");
		$t_event->setAdvancedSearch("x_FK_CONGTY_ID", "");
		$t_event->setAdvancedSearch("x_C_EVENT_NAME", "");
		$t_event->setAdvancedSearch("x_C_TYPE_EVENT", "");
		$t_event->setAdvancedSearch("x_C_POST", "");
		$t_event->setAdvancedSearch("x_C_URL_IMAGES", "");
		$t_event->setAdvancedSearch("x_C_URL_LINK", "");
		$t_event->setAdvancedSearch("x_C_DATETIME_BEGIN", "");
		$t_event->setAdvancedSearch("x_C_DATETIME_END", "");
		$t_event->setAdvancedSearch("x_C_ODER", "");
		$t_event->setAdvancedSearch("x_C_NOTE", "");
		$t_event->setAdvancedSearch("x_C_USER_ADD", "");
		$t_event->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_event->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_event->setAdvancedSearch("x_C_EDIT_TIME", "");
		$t_event->setAdvancedSearch("x_C_ACTIVE_LEVELSITE", "");
		$t_event->setAdvancedSearch("x_C_TIME_ACTIVE", "");
		$t_event->setAdvancedSearch("x_C_SEND_MAIL", "");
		$t_event->setAdvancedSearch("x_C_CONTENT_MAIL", "");
		$t_event->setAdvancedSearch("x_C_FK_BROWSE", "");
		$t_event->setAdvancedSearch("x_FK_ARRAY_TINBAI", "");
		$t_event->setAdvancedSearch("x_FK_ARRAY_CONGTY", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_event;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EVENT_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EVENT_NAME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TYPE_EVENT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_POST"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_URL_IMAGES"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_URL_LINK"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATETIME_BEGIN"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DATETIME_END"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ODER"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NOTE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE_LEVELSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_SEND_MAIL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CONTENT_MAIL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_FK_BROWSE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_ARRAY_TINBAI"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_ARRAY_CONGTY"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_event->BasicSearchKeyword = $t_event->getSessionBasicSearchKeyword();
			$t_event->BasicSearchType = $t_event->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_event->C_EVENT_ID);
			$this->GetSearchParm($t_event->FK_CONGTY_ID);
			$this->GetSearchParm($t_event->C_EVENT_NAME);
			$this->GetSearchParm($t_event->C_TYPE_EVENT);
			$this->GetSearchParm($t_event->C_POST);
			$this->GetSearchParm($t_event->C_URL_IMAGES);
			$this->GetSearchParm($t_event->C_URL_LINK);
			$this->GetSearchParm($t_event->C_DATETIME_BEGIN);
			$this->GetSearchParm($t_event->C_DATETIME_END);
			$this->GetSearchParm($t_event->C_ODER);
			$this->GetSearchParm($t_event->C_NOTE);
			$this->GetSearchParm($t_event->C_USER_ADD);
			$this->GetSearchParm($t_event->C_ADD_TIME);
			$this->GetSearchParm($t_event->C_USER_EDIT);
			$this->GetSearchParm($t_event->C_EDIT_TIME);
			$this->GetSearchParm($t_event->C_ACTIVE_LEVELSITE);
			$this->GetSearchParm($t_event->C_TIME_ACTIVE);
			$this->GetSearchParm($t_event->C_SEND_MAIL);
			$this->GetSearchParm($t_event->C_CONTENT_MAIL);
			$this->GetSearchParm($t_event->C_FK_BROWSE);
			$this->GetSearchParm($t_event->FK_ARRAY_TINBAI);
			$this->GetSearchParm($t_event->FK_ARRAY_CONGTY);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_event;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_event->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_event->CurrentOrderType = @$_GET["ordertype"];
			$t_event->UpdateSort($t_event->FK_CONGTY_ID, $bCtrl); // FK_CONGTY_ID
			$t_event->UpdateSort($t_event->C_EVENT_NAME, $bCtrl); // C_EVENT_NAME
			$t_event->UpdateSort($t_event->C_TYPE_EVENT, $bCtrl); // C_TYPE_EVENT
			$t_event->UpdateSort($t_event->C_URL_IMAGES, $bCtrl); // C_URL_IMAGES
			$t_event->UpdateSort($t_event->C_URL_LINK, $bCtrl); // C_URL_LINK
			$t_event->UpdateSort($t_event->C_DATETIME_BEGIN, $bCtrl); // C_DATETIME_BEGIN
			$t_event->UpdateSort($t_event->C_DATETIME_END, $bCtrl); // C_DATETIME_END
			$t_event->UpdateSort($t_event->C_ODER, $bCtrl); // C_ODER
			$t_event->UpdateSort($t_event->C_ACTIVE_LEVELSITE, $bCtrl); // C_ACTIVE_LEVELSITE
			$t_event->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_event;
		$sOrderBy = $t_event->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_event->SqlOrderBy() <> "") {
				$sOrderBy = $t_event->SqlOrderBy();
				$t_event->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_event;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_event->setSessionOrderBy($sOrderBy);
				$t_event->FK_CONGTY_ID->setSort("");
				$t_event->C_EVENT_NAME->setSort("");
				$t_event->C_TYPE_EVENT->setSort("");
				$t_event->C_URL_IMAGES->setSort("");
				$t_event->C_URL_LINK->setSort("");
				$t_event->C_DATETIME_BEGIN->setSort("");
				$t_event->C_DATETIME_END->setSort("");
				$t_event->C_ODER->setSort("");
				$t_event->C_ACTIVE_LEVELSITE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_event->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_event;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_event_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_event->Export <> "" ||
			$t_event->CurrentAction == "gridadd" ||
			$t_event->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_event;
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
		if (($Security->CanDelete() || $Security->CanEdit()) && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_event->C_EVENT_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_event;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_event;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_event->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_event->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_event->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_event->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_event->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_event->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_event;
		$t_event->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_event->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_event;

		// Load search values
		// C_EVENT_ID

		$t_event->C_EVENT_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EVENT_ID"]);
		$t_event->C_EVENT_ID->AdvancedSearch->SearchOperator = @$_GET["z_C_EVENT_ID"];

		// FK_CONGTY_ID
		$t_event->FK_CONGTY_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY_ID"]);
		$t_event->FK_CONGTY_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY_ID"];

		// C_EVENT_NAME
		$t_event->C_EVENT_NAME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EVENT_NAME"]);
		$t_event->C_EVENT_NAME->AdvancedSearch->SearchOperator = @$_GET["z_C_EVENT_NAME"];

		// C_TYPE_EVENT
		$t_event->C_TYPE_EVENT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TYPE_EVENT"]);
		$t_event->C_TYPE_EVENT->AdvancedSearch->SearchOperator = @$_GET["z_C_TYPE_EVENT"];

		// C_POST
		$t_event->C_POST->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_POST"]);
		$t_event->C_POST->AdvancedSearch->SearchOperator = @$_GET["z_C_POST"];

		// C_URL_IMAGES
		$t_event->C_URL_IMAGES->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_URL_IMAGES"]);
		$t_event->C_URL_IMAGES->AdvancedSearch->SearchOperator = @$_GET["z_C_URL_IMAGES"];

		// C_URL_LINK
		$t_event->C_URL_LINK->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_URL_LINK"]);
		$t_event->C_URL_LINK->AdvancedSearch->SearchOperator = @$_GET["z_C_URL_LINK"];

		// C_DATETIME_BEGIN
		$t_event->C_DATETIME_BEGIN->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATETIME_BEGIN"]);
		$t_event->C_DATETIME_BEGIN->AdvancedSearch->SearchOperator = @$_GET["z_C_DATETIME_BEGIN"];

		// C_DATETIME_END
		$t_event->C_DATETIME_END->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DATETIME_END"]);
		$t_event->C_DATETIME_END->AdvancedSearch->SearchOperator = @$_GET["z_C_DATETIME_END"];

		// C_ODER
		$t_event->C_ODER->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ODER"]);
		$t_event->C_ODER->AdvancedSearch->SearchOperator = @$_GET["z_C_ODER"];

		// C_NOTE
		$t_event->C_NOTE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NOTE"]);
		$t_event->C_NOTE->AdvancedSearch->SearchOperator = @$_GET["z_C_NOTE"];

		// C_USER_ADD
		$t_event->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_event->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_event->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_event->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_event->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_event->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_event->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_event->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];

		// C_ACTIVE_LEVELSITE
		$t_event->C_ACTIVE_LEVELSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE_LEVELSITE"]);
		$t_event->C_ACTIVE_LEVELSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE_LEVELSITE"];

		// C_TIME_ACTIVE
		$t_event->C_TIME_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ACTIVE"]);
		$t_event->C_TIME_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ACTIVE"];

		// C_SEND_MAIL
		$t_event->C_SEND_MAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_SEND_MAIL"]);
		$t_event->C_SEND_MAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_SEND_MAIL"];

		// C_CONTENT_MAIL
		$t_event->C_CONTENT_MAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CONTENT_MAIL"]);
		$t_event->C_CONTENT_MAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_CONTENT_MAIL"];

		// C_FK_BROWSE
		$t_event->C_FK_BROWSE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FK_BROWSE"]);
		$t_event->C_FK_BROWSE->AdvancedSearch->SearchOperator = @$_GET["z_C_FK_BROWSE"];

		// FK_ARRAY_TINBAI
		$t_event->FK_ARRAY_TINBAI->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_ARRAY_TINBAI"]);
		$t_event->FK_ARRAY_TINBAI->AdvancedSearch->SearchOperator = @$_GET["z_FK_ARRAY_TINBAI"];

		// FK_ARRAY_CONGTY
		$t_event->FK_ARRAY_CONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_ARRAY_CONGTY"]);
		$t_event->FK_ARRAY_CONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_ARRAY_CONGTY"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_event;

		// Call Recordset Selecting event
		$t_event->Recordset_Selecting($t_event->CurrentFilter);

		// Load List page SQL
		$sSql = $t_event->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_event->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event;
		$sFilter = $t_event->KeyFilter();

		// Call Row Selecting event
		$t_event->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event->CurrentFilter = $sFilter;
		$sSql = $t_event->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event;
		$t_event->C_EVENT_ID->setDbValue($rs->fields('C_EVENT_ID'));
		$t_event->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_event->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$t_event->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$t_event->C_POST->setDbValue($rs->fields('C_POST'));
		$t_event->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$t_event->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$t_event->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$t_event->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$t_event->C_ODER->setDbValue($rs->fields('C_ODER'));
		$t_event->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_event->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_event->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_event->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_event->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_event->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$t_event->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_event->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_event->C_CONTENT_MAIL->setDbValue($rs->fields('C_CONTENT_MAIL'));
		$t_event->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$t_event->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
		$t_event->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event;

		// Initialize URLs
		$this->ViewUrl = $t_event->ViewUrl();
		$this->EditUrl = $t_event->EditUrl();
		$this->InlineEditUrl = $t_event->InlineEditUrl();
		$this->CopyUrl = $t_event->CopyUrl();
		$this->InlineCopyUrl = $t_event->InlineCopyUrl();
		$this->DeleteUrl = $t_event->DeleteUrl();

		// Call Row_Rendering event
		$t_event->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_event->FK_CONGTY_ID->CellCssStyle = ""; $t_event->FK_CONGTY_ID->CellCssClass = "";
		$t_event->FK_CONGTY_ID->CellAttrs = array(); $t_event->FK_CONGTY_ID->ViewAttrs = array(); $t_event->FK_CONGTY_ID->EditAttrs = array();

		// C_EVENT_NAME
		$t_event->C_EVENT_NAME->CellCssStyle = ""; $t_event->C_EVENT_NAME->CellCssClass = "";
		$t_event->C_EVENT_NAME->CellAttrs = array(); $t_event->C_EVENT_NAME->ViewAttrs = array(); $t_event->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event->C_TYPE_EVENT->CellCssStyle = ""; $t_event->C_TYPE_EVENT->CellCssClass = "";
		$t_event->C_TYPE_EVENT->CellAttrs = array(); $t_event->C_TYPE_EVENT->ViewAttrs = array(); $t_event->C_TYPE_EVENT->EditAttrs = array();

		// C_URL_IMAGES
		$t_event->C_URL_IMAGES->CellCssStyle = ""; $t_event->C_URL_IMAGES->CellCssClass = "";
		$t_event->C_URL_IMAGES->CellAttrs = array(); $t_event->C_URL_IMAGES->ViewAttrs = array(); $t_event->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$t_event->C_URL_LINK->CellCssStyle = ""; $t_event->C_URL_LINK->CellCssClass = "";
		$t_event->C_URL_LINK->CellAttrs = array(); $t_event->C_URL_LINK->ViewAttrs = array(); $t_event->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event->C_DATETIME_BEGIN->CellAttrs = array(); $t_event->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event->C_DATETIME_END->CellCssStyle = ""; $t_event->C_DATETIME_END->CellCssClass = "";
		$t_event->C_DATETIME_END->CellAttrs = array(); $t_event->C_DATETIME_END->ViewAttrs = array(); $t_event->C_DATETIME_END->EditAttrs = array();

		// C_ODER
		$t_event->C_ODER->CellCssStyle = ""; $t_event->C_ODER->CellCssClass = "";
		$t_event->C_ODER->CellAttrs = array(); $t_event->C_ODER->ViewAttrs = array(); $t_event->C_ODER->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->EditAttrs = array();
		if ($t_event->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_EVENT_ID
			$t_event->C_EVENT_ID->ViewValue = $t_event->C_EVENT_ID->CurrentValue;
			$t_event->C_EVENT_ID->CssStyle = "";
			$t_event->C_EVENT_ID->CssClass = "";
			$t_event->C_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_event->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event->FK_CONGTY_ID->ViewValue = $t_event->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event->FK_CONGTY_ID->CssStyle = "";
			$t_event->FK_CONGTY_ID->CssClass = "";
			$t_event->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->ViewValue = $t_event->C_EVENT_NAME->CurrentValue;
			$t_event->C_EVENT_NAME->CssStyle = "";
			$t_event->C_EVENT_NAME->CssClass = "";
			$t_event->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event->C_TYPE_EVENT->ViewValue = "Loại Popup";
						break;
					case "2":
						$t_event->C_TYPE_EVENT->ViewValue = "Loại sự kiện theo bài viết";
						break;
					case "3":
						$t_event->C_TYPE_EVENT->ViewValue = "Loaị sự kiện kiên kết";
						break;
					default:
						$t_event->C_TYPE_EVENT->ViewValue = $t_event->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event->C_TYPE_EVENT->CssStyle = "";
			$t_event->C_TYPE_EVENT->CssClass = "";
			$t_event->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event->C_POST->CurrentValue) <> "") {
				switch ($t_event->C_POST->CurrentValue) {
					case "1":
						$t_event->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event->C_POST->ViewValue = "";
						break;
					default:
						$t_event->C_POST->ViewValue = $t_event->C_POST->CurrentValue;
				}
			} else {
				$t_event->C_POST->ViewValue = NULL;
			}
			$t_event->C_POST->CssStyle = "";
			$t_event->C_POST->CssClass = "";
			$t_event->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->ViewValue = $t_event->C_URL_IMAGES->CurrentValue;
			$t_event->C_URL_IMAGES->CssStyle = "";
			$t_event->C_URL_IMAGES->CssClass = "";
			$t_event->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event->C_URL_LINK->ViewValue = $t_event->C_URL_LINK->CurrentValue;
			$t_event->C_URL_LINK->CssStyle = "";
			$t_event->C_URL_LINK->CssClass = "";
			$t_event->C_URL_LINK->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->ViewValue = $t_event->C_DATETIME_BEGIN->CurrentValue;
			$t_event->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event->C_DATETIME_BEGIN->CssStyle = "";
			$t_event->C_DATETIME_BEGIN->CssClass = "";
			$t_event->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->ViewValue = $t_event->C_DATETIME_END->CurrentValue;
			$t_event->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_END->ViewValue, 7);
			$t_event->C_DATETIME_END->CssStyle = "";
			$t_event->C_DATETIME_END->CssClass = "";
			$t_event->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ODER
			$t_event->C_ODER->ViewValue = $t_event->C_ODER->CurrentValue;
			$t_event->C_ODER->ViewValue = ew_FormatDateTime($t_event->C_ODER->ViewValue, 7);
			$t_event->C_ODER->CssStyle = "";
			$t_event->C_ODER->CssClass = "";
			$t_event->C_ODER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->ViewValue = $t_event->C_USER_ADD->CurrentValue;
			$t_event->C_USER_ADD->CssStyle = "";
			$t_event->C_USER_ADD->CssClass = "";
			$t_event->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->ViewValue = $t_event->C_ADD_TIME->CurrentValue;
			$t_event->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event->C_ADD_TIME->ViewValue, 7);
			$t_event->C_ADD_TIME->CssStyle = "";
			$t_event->C_ADD_TIME->CssClass = "";
			$t_event->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->ViewValue = $t_event->C_USER_EDIT->CurrentValue;
			$t_event->C_USER_EDIT->CssStyle = "";
			$t_event->C_USER_EDIT->CssClass = "";
			$t_event->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->ViewValue = $t_event->C_EDIT_TIME->CurrentValue;
			$t_event->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event->C_EDIT_TIME->ViewValue, 7);
			$t_event->C_EDIT_TIME->CssStyle = "";
			$t_event->C_EDIT_TIME->CssClass = "";
			$t_event->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "<b>Kích hoạt</b>";
						break;
					default:
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = $t_event->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->ViewValue = $t_event->C_TIME_ACTIVE->CurrentValue;
			$t_event->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event->C_TIME_ACTIVE->ViewValue, 7);
			$t_event->C_TIME_ACTIVE->CssStyle = "";
			$t_event->C_TIME_ACTIVE->CssClass = "";
			$t_event->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_event->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_event->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_event->C_SEND_MAIL->ViewValue = "khong gui mail";
						break;
					case "1":
						$t_event->C_SEND_MAIL->ViewValue = "gui mail";
						break;
					default:
						$t_event->C_SEND_MAIL->ViewValue = $t_event->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_event->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_event->C_SEND_MAIL->CssStyle = "";
			$t_event->C_SEND_MAIL->CssClass = "";
			$t_event->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_FK_BROWSE
			if (strval($t_event->C_FK_BROWSE->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->C_FK_BROWSE->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`C_HOTEN` = '" . ew_AdjustSql(trim($wrk)) . "'";
				}	
			$sSqlWrk = "SELECT `C_EMAIL` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->C_FK_BROWSE->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->C_FK_BROWSE->ViewValue .= $rswrk->fields('C_EMAIL');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->C_FK_BROWSE->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->C_FK_BROWSE->ViewValue = $t_event->C_FK_BROWSE->CurrentValue;
				}
			} else {
				$t_event->C_FK_BROWSE->ViewValue = NULL;
			}
			$t_event->C_FK_BROWSE->CssStyle = "";
			$t_event->C_FK_BROWSE->CssClass = "";
			$t_event->C_FK_BROWSE->ViewCustomAttributes = "";

			// FK_ARRAY_TINBAI
			if (strval($t_event->FK_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_TINBAI->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TITLE`, `C_ORDER` FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$t_event->FK_ARRAY_TINBAI->ViewValue .= ew_ValueSeparator($ari) . $rswrk->fields('C_ORDER');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_TINBAI->ViewValue = $t_event->FK_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_TINBAI->CssStyle = "";
			$t_event->FK_ARRAY_TINBAI->CssClass = "";
			$t_event->FK_ARRAY_TINBAI->ViewCustomAttributes = "";

			// FK_ARRAY_CONGTY
			if (strval($t_event->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_CONGTY->CurrentValue);
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
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_ARRAY_CONGTY->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_CONGTY->ViewValue = $t_event->FK_ARRAY_CONGTY->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_CONGTY->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_CONGTY->CssStyle = "";
			$t_event->FK_ARRAY_CONGTY->CssClass = "";
			$t_event->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_event->FK_CONGTY_ID->HrefValue = "";
			$t_event->FK_CONGTY_ID->TooltipValue = "";

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->HrefValue = "";
			$t_event->C_EVENT_NAME->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->HrefValue = "";
			$t_event->C_TYPE_EVENT->TooltipValue = "";

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->HrefValue = "";
			$t_event->C_URL_IMAGES->TooltipValue = "";

			// C_URL_LINK
			$t_event->C_URL_LINK->HrefValue = "";
			$t_event->C_URL_LINK->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->HrefValue = "";
			$t_event->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->HrefValue = "";
			$t_event->C_DATETIME_END->TooltipValue = "";

			// C_ODER
			$t_event->C_ODER->HrefValue = "";
			$t_event->C_ODER->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event->C_ACTIVE_LEVELSITE->TooltipValue = "";
		} elseif ($t_event->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY_ID
			$t_event->FK_CONGTY_ID->EditCustomAttributes = "";

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->EditCustomAttributes = "";
			$t_event->C_EVENT_NAME->EditValue = ew_HtmlEncode($t_event->C_EVENT_NAME->AdvancedSearch->SearchValue);

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Loại Popup");
			$arwrk[] = array("2", "Loại sự kiện theo bài viết");
			$arwrk[] = array("3", "Loại sự kiện liên kết");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_event->C_TYPE_EVENT->EditValue = $arwrk;

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->EditCustomAttributes = "";
			$t_event->C_URL_IMAGES->EditValue = ew_HtmlEncode($t_event->C_URL_IMAGES->AdvancedSearch->SearchValue);

			// C_URL_LINK
			$t_event->C_URL_LINK->EditCustomAttributes = "";
			$t_event->C_URL_LINK->EditValue = ew_HtmlEncode($t_event->C_URL_LINK->AdvancedSearch->SearchValue);

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->EditCustomAttributes = "";
			$t_event->C_DATETIME_BEGIN->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->AdvancedSearch->SearchValue, 7), 7));

			// C_DATETIME_END
			$t_event->C_DATETIME_END->EditCustomAttributes = "";
			$t_event->C_DATETIME_END->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_event->C_DATETIME_END->AdvancedSearch->SearchValue, 7), 7));

			// C_ODER
			$t_event->C_ODER->EditCustomAttributes = "";
			$t_event->C_ODER->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_event->C_ODER->AdvancedSearch->SearchValue, 7), 7));

			// C_ACTIVE_LEVELSITE
			$t_event->C_ACTIVE_LEVELSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_event->C_ACTIVE_LEVELSITE->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_event->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_event;

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
		global $t_event;
		$t_event->C_EVENT_ID->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_EVENT_ID");
		$t_event->FK_CONGTY_ID->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_FK_CONGTY_ID");
		$t_event->C_EVENT_NAME->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_EVENT_NAME");
		$t_event->C_TYPE_EVENT->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_TYPE_EVENT");
		$t_event->C_POST->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_POST");
		$t_event->C_URL_IMAGES->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_URL_IMAGES");
		$t_event->C_URL_LINK->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_URL_LINK");
		$t_event->C_DATETIME_BEGIN->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_DATETIME_BEGIN");
		$t_event->C_DATETIME_END->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_DATETIME_END");
		$t_event->C_ODER->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_ODER");
		$t_event->C_NOTE->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_NOTE");
		$t_event->C_USER_ADD->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_USER_ADD");
		$t_event->C_ADD_TIME->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_ADD_TIME");
		$t_event->C_USER_EDIT->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_USER_EDIT");
		$t_event->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_EDIT_TIME");
		$t_event->C_ACTIVE_LEVELSITE->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_ACTIVE_LEVELSITE");
		$t_event->C_TIME_ACTIVE->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_TIME_ACTIVE");
		$t_event->C_SEND_MAIL->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_SEND_MAIL");
		$t_event->C_CONTENT_MAIL->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_CONTENT_MAIL");
		$t_event->C_FK_BROWSE->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_C_FK_BROWSE");
		$t_event->FK_ARRAY_TINBAI->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_FK_ARRAY_TINBAI");
		$t_event->FK_ARRAY_CONGTY->AdvancedSearch->SearchValue = $t_event->getAdvancedSearch("x_FK_ARRAY_CONGTY");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_event;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_event->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_event->ExportAll) {
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
		if ($t_event->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_event, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_event->C_EVENT_ID);
				$ExportDoc->ExportCaption($t_event->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_event->C_TYPE_EVENT);
				$ExportDoc->ExportCaption($t_event->C_POST);
				$ExportDoc->ExportCaption($t_event->C_DATETIME_BEGIN);
				$ExportDoc->ExportCaption($t_event->C_DATETIME_END);
				$ExportDoc->ExportCaption($t_event->C_ODER);
				$ExportDoc->ExportCaption($t_event->C_USER_ADD);
				$ExportDoc->ExportCaption($t_event->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_event->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_event->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_event->C_ACTIVE_LEVELSITE);
				$ExportDoc->ExportCaption($t_event->C_TIME_ACTIVE);
				$ExportDoc->ExportCaption($t_event->C_SEND_MAIL);
				$ExportDoc->ExportCaption($t_event->C_FK_BROWSE);
				$ExportDoc->ExportCaption($t_event->FK_ARRAY_TINBAI);
				$ExportDoc->ExportCaption($t_event->FK_ARRAY_CONGTY);
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
				$t_event->CssClass = "";
				$t_event->CssStyle = "";
				$t_event->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_event->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_EVENT_ID', $t_event->C_EVENT_ID->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_event->FK_CONGTY_ID->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE_EVENT', $t_event->C_TYPE_EVENT->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_POST', $t_event->C_POST->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_BEGIN', $t_event->C_DATETIME_BEGIN->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_END', $t_event->C_DATETIME_END->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ODER', $t_event->C_ODER->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_event->C_USER_ADD->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_event->C_ADD_TIME->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_event->C_USER_EDIT->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_event->C_EDIT_TIME->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_LEVELSITE', $t_event->C_ACTIVE_LEVELSITE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE', $t_event->C_TIME_ACTIVE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_SEND_MAIL', $t_event->C_SEND_MAIL->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_FK_BROWSE', $t_event->C_FK_BROWSE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_ARRAY_TINBAI', $t_event->FK_ARRAY_TINBAI->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_ARRAY_CONGTY', $t_event->FK_ARRAY_CONGTY->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_event->C_EVENT_ID);
					$ExportDoc->ExportField($t_event->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_event->C_TYPE_EVENT);
					$ExportDoc->ExportField($t_event->C_POST);
					$ExportDoc->ExportField($t_event->C_DATETIME_BEGIN);
					$ExportDoc->ExportField($t_event->C_DATETIME_END);
					$ExportDoc->ExportField($t_event->C_ODER);
					$ExportDoc->ExportField($t_event->C_USER_ADD);
					$ExportDoc->ExportField($t_event->C_ADD_TIME);
					$ExportDoc->ExportField($t_event->C_USER_EDIT);
					$ExportDoc->ExportField($t_event->C_EDIT_TIME);
					$ExportDoc->ExportField($t_event->C_ACTIVE_LEVELSITE);
					$ExportDoc->ExportField($t_event->C_TIME_ACTIVE);
					$ExportDoc->ExportField($t_event->C_SEND_MAIL);
					$ExportDoc->ExportField($t_event->C_FK_BROWSE);
					$ExportDoc->ExportField($t_event->FK_ARRAY_TINBAI);
					$ExportDoc->ExportField($t_event->FK_ARRAY_CONGTY);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_event->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_event->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_event->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_event->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_event->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_event;
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
		if ($t_event->Email_Sending($Email, $EventArgs))
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
		global $t_event;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_event->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_event->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_event->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_event->C_EVENT_ID); // C_EVENT_ID
		$this->AddSearchQueryString($sQry, $t_event->FK_CONGTY_ID); // FK_CONGTY_ID
		$this->AddSearchQueryString($sQry, $t_event->C_EVENT_NAME); // C_EVENT_NAME
		$this->AddSearchQueryString($sQry, $t_event->C_TYPE_EVENT); // C_TYPE_EVENT
		$this->AddSearchQueryString($sQry, $t_event->C_POST); // C_POST
		$this->AddSearchQueryString($sQry, $t_event->C_URL_IMAGES); // C_URL_IMAGES
		$this->AddSearchQueryString($sQry, $t_event->C_URL_LINK); // C_URL_LINK
		$this->AddSearchQueryString($sQry, $t_event->C_DATETIME_BEGIN); // C_DATETIME_BEGIN
		$this->AddSearchQueryString($sQry, $t_event->C_DATETIME_END); // C_DATETIME_END
		$this->AddSearchQueryString($sQry, $t_event->C_ODER); // C_ODER
		$this->AddSearchQueryString($sQry, $t_event->C_NOTE); // C_NOTE
		$this->AddSearchQueryString($sQry, $t_event->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_event->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_event->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_event->C_EDIT_TIME); // C_EDIT_TIME
		$this->AddSearchQueryString($sQry, $t_event->C_ACTIVE_LEVELSITE); // C_ACTIVE_LEVELSITE
		$this->AddSearchQueryString($sQry, $t_event->C_TIME_ACTIVE); // C_TIME_ACTIVE
		$this->AddSearchQueryString($sQry, $t_event->C_SEND_MAIL); // C_SEND_MAIL
		$this->AddSearchQueryString($sQry, $t_event->C_CONTENT_MAIL); // C_CONTENT_MAIL
		$this->AddSearchQueryString($sQry, $t_event->C_FK_BROWSE); // C_FK_BROWSE
		$this->AddSearchQueryString($sQry, $t_event->FK_ARRAY_TINBAI); // FK_ARRAY_TINBAI
		$this->AddSearchQueryString($sQry, $t_event->FK_ARRAY_CONGTY); // FK_ARRAY_CONGTY

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_event->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_event->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_event;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_event->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_event->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_event->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_event->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_event->GetAdvancedSearch("w_" . $FldParm);
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
