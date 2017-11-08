<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_list = new cadvertising_list();
$Page =& $advertising_list;

// Page init
$advertising_list->Page_Init();

// Page main
$advertising_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_list = new ew_Page("advertising_list");

// page properties
advertising_list.PageID = "list"; // page ID
advertising_list.FormID = "fadvertisinglist"; // form ID
var EW_PAGE_ID = advertising_list.PageID; // for backward compatibility

// extend page with validate function for search
advertising_list.ValidateSearch = function(fobj) {
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
advertising_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_list.ValidateRequired = false; // no JavaScript validation
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

<script type="text/javascript" src="jwplayer1/jwplayer.js" ></script>
<?php if ($advertising->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$advertising_list->lTotalRecs = $advertising->SelectRecordCount();
	} else {
		if ($rs = $advertising_list->LoadRecordset())
			$advertising_list->lTotalRecs = $rs->RecordCount();
	}
	$advertising_list->lStartRec = 1;
	if ($advertising_list->lDisplayRecs <= 0 || ($advertising->Export <> "" && $advertising->ExportAll)) // Display all records
		$advertising_list->lDisplayRecs = $advertising_list->lTotalRecs;
	if (!($advertising->Export <> "" && $advertising->ExportAll))
		$advertising_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $advertising_list->LoadRecordset($advertising_list->lStartRec-1, $advertising_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $advertising->TableCaption() ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($advertising->Export == "" && $advertising->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(advertising_list);" style="text-decoration: none;"><img id="advertising_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="advertising_list_SearchPanel">
<form name="fadvertisinglistsrch" id="fadvertisinglistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return advertising_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="advertising">
<?php
if ($gsSearchError == "")
	$advertising_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$advertising->RowType = EW_ROWTYPE_SEARCH;

// Render row
$advertising_list->RenderRow();
?>
<table class="ewBasicSearch">
       	<tr>
		<td><span class="phpmaker"><?php echo $advertising->advertising_name->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_advertising_name" id="z_advertising_name" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_advertising_name" id="x_advertising_name" title="<?php echo $advertising->advertising_name->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $advertising->advertising_name->EditValue ?>"<?php echo $advertising->advertising_name->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $advertising->advertising_type->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_advertising_type" id="z_advertising_type" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_advertising_type" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_advertising_type" id="x_advertising_type" title="<?php echo $advertising->advertising_type->FldTitle() ?>" value="{value}"<?php echo $advertising->advertising_type->EditAttributes() ?>></label></div>
<div id="dsl_x_advertising_type" repeatcolumn="5">
<?php
$arwrk = $advertising->advertising_type->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_type->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_advertising_type" id="x_advertising_type" title="<?php echo $advertising->advertising_type->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $advertising->advertising_type->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
		<td><span class="phpmaker"><?php echo $advertising->advertising_pos->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_advertising_pos" id="z_advertising_pos" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_advertising_pos" name="x_advertising_pos" title="<?php echo $advertising->advertising_pos->FldTitle() ?>"<?php echo $advertising->advertising_pos->EditAttributes() ?>>
<?php
if (is_array($advertising->advertising_pos->EditValue)) {
	$arwrk = $advertising->advertising_pos->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_pos->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td><span class="phpmaker"><?php echo $advertising->advertising_state->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_advertising_state" id="z_advertising_state" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_advertising_state" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_advertising_state" id="x_advertising_state" title="<?php echo $advertising->advertising_state->FldTitle() ?>" value="{value}"<?php echo $advertising->advertising_state->EditAttributes() ?>></label></div>
<div id="dsl_x_advertising_state" repeatcolumn="5">
<?php
$arwrk = $advertising->advertising_state->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_state->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_advertising_state" id="x_advertising_state" title="<?php echo $advertising->advertising_state->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $advertising->advertising_state->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($advertising->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $advertising_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($advertising->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($advertising->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($advertising->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$advertising_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($advertising->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($advertising->CurrentAction <> "gridadd" && $advertising->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_list->Pager)) $advertising_list->Pager = new cNumericPager($advertising_list->lStartRec, $advertising_list->lDisplayRecs, $advertising_list->lTotalRecs, $advertising_list->lRecRange) ?>
<?php if ($advertising_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $advertising_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $advertising_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $advertising_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $advertising_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fadvertisinglist, '<?php echo $advertising_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fadvertisinglist" id="fadvertisinglist" class="ewForm" action="" method="post">
<div id="gmp_advertising" class="ewGridMiddlePanel">
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $advertising->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$advertising_list->RenderListOptions();

// Render list options (header, left)
$advertising_list->ListOptions->Render("header", "left");
?>
<?php if ($advertising->advertising_name->Visible) { // advertising_name ?>
	<?php if ($advertising->SortUrl($advertising->advertising_name) == "") { ?>
		<td><?php echo $advertising->advertising_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_name) ?>',2);">
                        <table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><div style="width:250px;"><?php echo $advertising->advertising_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?> </div></td><td style="width: 10px;"><?php if ($advertising->advertising_name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>	
<?php if ($advertising->advertising_type->Visible) { // advertising_type ?>
	<?php if ($advertising->SortUrl($advertising->advertising_type) == "") { ?>
		<td><?php echo $advertising->advertising_type->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_type) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $advertising->advertising_type->FldCaption() ?></td><td style="width: 10px;"><?php if ($advertising->advertising_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($advertising->advertising_pos->Visible) { // advertising_pos ?>
	<?php if ($advertising->SortUrl($advertising->advertising_pos) == "") { ?>
		<td><?php echo $advertising->advertising_pos->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_pos) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $advertising->advertising_pos->FldCaption() ?></td><td style="width: 10px;"><?php if ($advertising->advertising_pos->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_pos->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($advertising->advertising_url->Visible) { // advertising_url ?>
	<?php if ($advertising->SortUrl($advertising->advertising_url) == "") { ?>
		<td><?php echo $advertising->advertising_url->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_url) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $advertising->advertising_url->FldCaption() ?></td><td style="width: 10px;"><?php if ($advertising->advertising_url->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_url->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($advertising->advertising_order->Visible) { // advertising_order ?>
	<?php if ($advertising->SortUrl($advertising->advertising_order) == "") { ?>
		<td><?php echo $advertising->advertising_order->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_order) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $advertising->advertising_order->FldCaption() ?></td><td style="width: 10px;"><?php if ($advertising->advertising_order->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_order->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($advertising->advertising_state->Visible) { // advertising_state ?>
	<?php if ($advertising->SortUrl($advertising->advertising_state) == "") { ?>
		<td><?php echo $advertising->advertising_state->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $advertising->SortUrl($advertising->advertising_state) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $advertising->advertising_state->FldCaption() ?></td><td style="width: 10px;"><?php if ($advertising->advertising_state->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($advertising->advertising_state->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$advertising_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($advertising->ExportAll && $advertising->Export <> "") {
	$advertising_list->lStopRec = $advertising_list->lTotalRecs;
} else {
	$advertising_list->lStopRec = $advertising_list->lStartRec + $advertising_list->lDisplayRecs - 1; // Set the last record to display
}
$advertising_list->lRecCount = $advertising_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $advertising_list->lStartRec > 1)
		$rs->Move($advertising_list->lStartRec - 1);
}

// Initialize aggregate
$advertising->RowType = EW_ROWTYPE_AGGREGATEINIT;
$advertising_list->RenderRow();
$advertising_list->lRowCnt = 0;
while (($advertising->CurrentAction == "gridadd" || !$rs->EOF) &&
	$advertising_list->lRecCount < $advertising_list->lStopRec) {
	$advertising_list->lRecCount++;
	if (intval($advertising_list->lRecCount) >= intval($advertising_list->lStartRec)) {
		$advertising_list->lRowCnt++;

	// Init row class and style
	$advertising->CssClass = "";
	$advertising->CssStyle = "";
	$advertising->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($advertising->CurrentAction == "gridadd") {
		$advertising_list->LoadDefaultValues(); // Load default values
	} else {
		$advertising_list->LoadRowValues($rs); // Load row values
	}
	$advertising->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$advertising_list->RenderRow();

	// Render list options
	$advertising_list->RenderListOptions();
?>
	<tr<?php echo $advertising->RowAttributes() ?>>
<?php

// Render list options (body, left)
$advertising_list->ListOptions->Render("body", "left");
?>
         	<?php if ($advertising->advertising_name->Visible) { // advertising_name ?>
		<td<?php echo $advertising->advertising_name->CellAttributes() ?>>
<div<?php echo $advertising->advertising_name->ViewAttributes() ?>><?php echo $advertising->advertising_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising->advertising_type->Visible) { // advertising_type ?>
		<td<?php echo $advertising->advertising_type->CellAttributes() ?>>
<div<?php echo $advertising->advertising_type->ViewAttributes() ?>><?php echo $advertising->advertising_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising->advertising_pos->Visible) { // advertising_pos ?>
		<td<?php echo $advertising->advertising_pos->CellAttributes() ?>>
<div<?php echo $advertising->advertising_pos->ViewAttributes() ?>><?php echo $advertising->advertising_pos->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($advertising->advertising_url->Visible) { // advertising_url ?>
		<td<?php echo $advertising->advertising_url->CellAttributes() ?>>
<?php if ($advertising->advertising_type->CurrentValue == "1"){ ?>
<?php if ($advertising->advertising_url->HrefValue <> "" || $advertising->advertising_url->TooltipValue <> "") { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<img width="488" height="247" src="<?php echo ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . $advertising->advertising_url->Upload->DbValue ?>" border=0<?php echo $advertising->advertising_url->ViewAttributes() ?>>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<img width="488" height="247" src="<?php echo ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . $advertising->advertising_url->Upload->DbValue ?>" border=0<?php echo $advertising->advertising_url->ViewAttributes() ?>>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
<?php }else if ($advertising->advertising_type->CurrentValue == "2")  {?>
<embed src="<?php echo ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . $advertising->advertising_url->Upload->DbValue ?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="objflash" width="488" height="247">
<?php }else if ($advertising->advertising_type->CurrentValue == "3")  {?>
<div id="mediaplayer<?php echo $rs->fields('advertising_id')?>"></div>
<script type="text/javascript">
 jwplayer("mediaplayer<?php echo $rs->fields('advertising_id') ?>").setup({
		file: "<?php echo ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . $advertising->advertising_url->Upload->DbValue ?>",
		image: '../images/HPUvideo.jpg',
		skin: "/content/skins/glow/glow.zip",
		plugins: {
			"sharing-1": {}
		},
		width: '488',
		height: '247',
		stretching: "fill",
		flashplayer: "jwplayer1/player.swf"
	});
</script>
<?php } else if ($advertising->advertising_type->CurrentValue == "4")  {?>
<div id="myElement<?php echo $rs->fields('advertising_id') ?>"></div>
<script>
   	jwplayer("myElement<?php echo $rs->fields('advertising_id') ?>").setup({
		file: "<?php  echo $rs->fields('advertising_desc');?>",
		image: '../images/HPUvideo.jpg',
		skin: "/content/skins/glow/glow.zip",
		plugins: {
			"sharing-1": {}
		},
		width: '488',
		height: '247',
		stretching: "fill",
		flashplayer: "jwplayer1/player.swf"
	});
</script>
<?php } ?>
</td> 
<?php } ?>
	<?php if ($advertising->advertising_order->Visible) { // advertising_order ?>
		<td<?php echo $advertising->advertising_order->CellAttributes() ?>>
<div<?php echo $advertising->advertising_order->ViewAttributes() ?>><?php echo $advertising->advertising_order->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($advertising->advertising_state->Visible) { // advertising_state ?>
		<td<?php echo $advertising->advertising_state->CellAttributes() ?>>
<div<?php echo $advertising->advertising_state->ViewAttributes() ?>><?php echo $advertising->advertising_state->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$advertising_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($advertising->CurrentAction <> "gridadd")
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
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($advertising->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($advertising->CurrentAction <> "gridadd" && $advertising->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_list->Pager)) $advertising_list->Pager = new cNumericPager($advertising_list->lStartRec, $advertising_list->lDisplayRecs, $advertising_list->lTotalRecs, $advertising_list->lRecRange) ?>
<?php if ($advertising_list->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_list->PageUrl() ?>start=<?php echo $advertising_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $advertising_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $advertising_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $advertising_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($advertising_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($advertising_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.fadvertisinglist, '<?php echo $advertising_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($advertising->Export == "" && $advertising->CurrentAction == "") { ?>
<?php } ?>
<?php if ($advertising->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$advertising_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cadvertising_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'advertising';

	// Page object name
	var $PageObjName = 'advertising_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // Add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cadvertising_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (advertising)
		$GLOBALS["advertising"] = new cadvertising();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["advertising"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "advertisingdelete.php";
		$this->MultiUpdateUrl = "advertisingupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

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
		global $advertising;

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
			$advertising->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$advertising->Export = $_POST["exporttype"];
		} else {
			$advertising->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $advertising->Export; // Get export parameter, used in header
		$gsExportFile = $advertising->TableVar; // Get export file, used in header
		if (in_array($advertising->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($advertising->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($advertising->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($advertising->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($advertising->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $advertising;

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
			$advertising->Recordset_SearchValidated();

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
		if ($advertising->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $advertising->getRecordsPerPage(); // Restore from Session
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
		$advertising->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$advertising->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$advertising->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $advertising->getSearchWhere();
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
		$advertising->setSessionWhere($sFilter);
		$advertising->CurrentFilter = "";

		// Export data only
		if (in_array($advertising->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($advertising->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $advertising;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $advertising->advertising_id, FALSE); // advertising_id
		$this->BuildSearchSql($sWhere, $advertising->advertising_desc, FALSE); // advertising_desc
		$this->BuildSearchSql($sWhere, $advertising->advertising_type, FALSE); // advertising_type
		$this->BuildSearchSql($sWhere, $advertising->advertising_pos, FALSE); // advertising_pos
		$this->BuildSearchSql($sWhere, $advertising->advertising_link, FALSE); // advertising_link
		$this->BuildSearchSql($sWhere, $advertising->advertising_order, FALSE); // advertising_order
		$this->BuildSearchSql($sWhere, $advertising->create_time, FALSE); // create_time
		$this->BuildSearchSql($sWhere, $advertising->edit_time, FALSE); // edit_time
		$this->BuildSearchSql($sWhere, $advertising->advertising_state, FALSE); // advertising_state
                $this->BuildSearchSql($sWhere, $advertising->advertising_name, FALSE); // advertising_name

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($advertising->advertising_id); // advertising_id
			$this->SetSearchParm($advertising->advertising_desc); // advertising_desc
			$this->SetSearchParm($advertising->advertising_type); // advertising_type
			$this->SetSearchParm($advertising->advertising_pos); // advertising_pos
			$this->SetSearchParm($advertising->advertising_link); // advertising_link
			$this->SetSearchParm($advertising->advertising_order); // advertising_order
			$this->SetSearchParm($advertising->create_time); // create_time
			$this->SetSearchParm($advertising->edit_time); // edit_time
			$this->SetSearchParm($advertising->advertising_state); // advertising_state
                        $this->SetSearchParm($advertising->advertising_name); // advertising_name
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
		global $advertising;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$advertising->setAdvancedSearch("x_$FldParm", $FldVal);
		$advertising->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$advertising->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$advertising->setAdvancedSearch("y_$FldParm", $FldVal2);
		$advertising->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $advertising;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $advertising->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $advertising->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $advertising->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $advertising->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $advertising->GetAdvancedSearch("w_$FldParm");
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
		global $advertising;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $advertising->advertising_desc, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $advertising->advertising_link, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $advertising->advertising_url, $Keyword);
                $this->BuildBasicSearchSQL($sWhere, $advertising->advertising_name, $Keyword);
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
		global $Security, $advertising;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $advertising->BasicSearchKeyword;
		$sSearchType = $advertising->BasicSearchType;
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
			$advertising->setSessionBasicSearchKeyword($sSearchKeyword);
			$advertising->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $advertising;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$advertising->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $advertising;
		$advertising->setSessionBasicSearchKeyword("");
		$advertising->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $advertising;
		$advertising->setAdvancedSearch("x_advertising_id", "");
		$advertising->setAdvancedSearch("x_advertising_desc", "");
		$advertising->setAdvancedSearch("x_advertising_type", "");
		$advertising->setAdvancedSearch("x_advertising_pos", "");
		$advertising->setAdvancedSearch("x_advertising_link", "");
		$advertising->setAdvancedSearch("x_advertising_order", "");
		$advertising->setAdvancedSearch("x_create_time", "");
		$advertising->setAdvancedSearch("x_edit_time", "");
		$advertising->setAdvancedSearch("x_advertising_state", "");
                $advertising->setAdvancedSearch("x_advertising_name", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $advertising;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_id"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_desc"] <> "") $bRestore = FALSE;
                if (@$_GET["x_advertising_name"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_type"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_pos"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_link"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_order"] <> "") $bRestore = FALSE;
		if (@$_GET["x_create_time"] <> "") $bRestore = FALSE;
		if (@$_GET["x_edit_time"] <> "") $bRestore = FALSE;
		if (@$_GET["x_advertising_state"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$advertising->BasicSearchKeyword = $advertising->getSessionBasicSearchKeyword();
			$advertising->BasicSearchType = $advertising->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($advertising->advertising_id);
                        $this->GetSearchParm($advertising->advertising_name);
			$this->GetSearchParm($advertising->advertising_desc);
			$this->GetSearchParm($advertising->advertising_type);
			$this->GetSearchParm($advertising->advertising_pos);
			$this->GetSearchParm($advertising->advertising_link);
			$this->GetSearchParm($advertising->advertising_order);
			$this->GetSearchParm($advertising->create_time);
			$this->GetSearchParm($advertising->edit_time);
			$this->GetSearchParm($advertising->advertising_state);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $advertising;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$advertising->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$advertising->CurrentOrderType = @$_GET["ordertype"];
			$advertising->UpdateSort($advertising->advertising_type, $bCtrl); // advertising_type
                        $advertising->UpdateSort($advertising->advertising_name, $bCtrl); // advertising_name
			$advertising->UpdateSort($advertising->advertising_pos, $bCtrl); // advertising_pos
			$advertising->UpdateSort($advertising->advertising_url, $bCtrl); // advertising_url
			$advertising->UpdateSort($advertising->advertising_order, $bCtrl); // advertising_order
			$advertising->UpdateSort($advertising->advertising_state, $bCtrl); // advertising_state
			$advertising->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $advertising;
		$sOrderBy = $advertising->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($advertising->SqlOrderBy() <> "") {
				$sOrderBy = $advertising->SqlOrderBy();
				$advertising->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $advertising;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$advertising->setSessionOrderBy($sOrderBy);
				$advertising->advertising_type->setSort("");
				$advertising->advertising_pos->setSort("");
				$advertising->advertising_url->setSort("");
				$advertising->advertising_order->setSort("");
				$advertising->advertising_state->setSort("");
                                $advertising->advertising_name->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $advertising;

		// "view"
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
                
                // "copy"
		$this->ListOptions->Add("copy");
		$item =& $this->ListOptions->Items["copy"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanAdd();
		$item->OnLeft = TRUE;


		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"advertising_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($advertising->Export <> "" ||
			$advertising->CurrentAction == "gridadd" ||
			$advertising->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $advertising;
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
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($advertising->advertising_id->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $advertising;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $advertising;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $advertising;
		$advertising->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$advertising->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $advertising;

		// Load search values
                // advertising_name
		$advertising->advertising_name->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_name"]);
		$advertising->advertising_name->AdvancedSearch->SearchOperator = @$_GET["z_advertising_name"];
		// advertising_id

		$advertising->advertising_id->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_id"]);
		$advertising->advertising_id->AdvancedSearch->SearchOperator = @$_GET["z_advertising_id"];

		// advertising_desc
		$advertising->advertising_desc->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_desc"]);
		$advertising->advertising_desc->AdvancedSearch->SearchOperator = @$_GET["z_advertising_desc"];

		// advertising_type
		$advertising->advertising_type->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_type"]);
		$advertising->advertising_type->AdvancedSearch->SearchOperator = @$_GET["z_advertising_type"];

		// advertising_pos
		$advertising->advertising_pos->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_pos"]);
		$advertising->advertising_pos->AdvancedSearch->SearchOperator = @$_GET["z_advertising_pos"];

		// advertising_link
		$advertising->advertising_link->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_link"]);
		$advertising->advertising_link->AdvancedSearch->SearchOperator = @$_GET["z_advertising_link"];

		// advertising_order
		$advertising->advertising_order->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_order"]);
		$advertising->advertising_order->AdvancedSearch->SearchOperator = @$_GET["z_advertising_order"];

		// create_time
		$advertising->create_time->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_create_time"]);
		$advertising->create_time->AdvancedSearch->SearchOperator = @$_GET["z_create_time"];

		// edit_time
		$advertising->edit_time->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_edit_time"]);
		$advertising->edit_time->AdvancedSearch->SearchOperator = @$_GET["z_edit_time"];

		// advertising_state
		$advertising->advertising_state->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_advertising_state"]);
		$advertising->advertising_state->AdvancedSearch->SearchOperator = @$_GET["z_advertising_state"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load List page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load SQL based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$advertising->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $advertising;
		$advertising->advertising_id->setDbValue($rs->fields('advertising_id'));
                $advertising->advertising_name->setDbValue($rs->fields('advertising_name'));
		$advertising->advertising_desc->setDbValue($rs->fields('advertising_desc'));
		$advertising->advertising_type->setDbValue($rs->fields('advertising_type'));
		$advertising->advertising_pos->setDbValue($rs->fields('advertising_pos'));
		$advertising->advertising_link->setDbValue($rs->fields('advertising_link'));
		$advertising->advertising_url->Upload->DbValue = $rs->fields('advertising_url');
		$advertising->advertising_order->setDbValue($rs->fields('advertising_order'));
		$advertising->create_time->setDbValue($rs->fields('create_time'));
		$advertising->edit_time->setDbValue($rs->fields('edit_time'));
		$advertising->advertising_state->setDbValue($rs->fields('advertising_state'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $advertising;

		// Initialize URLs
		$this->ViewUrl = $advertising->ViewUrl();
		$this->EditUrl = $advertising->EditUrl();
		$this->InlineEditUrl = $advertising->InlineEditUrl();
		$this->CopyUrl = $advertising->CopyUrl();
		$this->InlineCopyUrl = $advertising->InlineCopyUrl();
		$this->DeleteUrl = $advertising->DeleteUrl();

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
                	// advertising_name

		$advertising->advertising_name->CellCssStyle = ""; $advertising->advertising_name->CellCssClass = "";
		$advertising->advertising_name->CellAttrs = array(); $advertising->advertising_name->ViewAttrs = array(); $advertising->advertising_name->EditAttrs = array();
		// advertising_type

		$advertising->advertising_type->CellCssStyle = ""; $advertising->advertising_type->CellCssClass = "";
		$advertising->advertising_type->CellAttrs = array(); $advertising->advertising_type->ViewAttrs = array(); $advertising->advertising_type->EditAttrs = array();

		// advertising_pos
		$advertising->advertising_pos->CellCssStyle = ""; $advertising->advertising_pos->CellCssClass = "";
		$advertising->advertising_pos->CellAttrs = array(); $advertising->advertising_pos->ViewAttrs = array(); $advertising->advertising_pos->EditAttrs = array();

		// advertising_url
		$advertising->advertising_url->CellCssStyle = ""; $advertising->advertising_url->CellCssClass = "";
		$advertising->advertising_url->CellAttrs = array(); $advertising->advertising_url->ViewAttrs = array(); $advertising->advertising_url->EditAttrs = array();

		// advertising_order
		$advertising->advertising_order->CellCssStyle = ""; $advertising->advertising_order->CellCssClass = "";
		$advertising->advertising_order->CellAttrs = array(); $advertising->advertising_order->ViewAttrs = array(); $advertising->advertising_order->EditAttrs = array();

		// advertising_state
		$advertising->advertising_state->CellCssStyle = ""; $advertising->advertising_state->CellCssClass = "";
		$advertising->advertising_state->CellAttrs = array(); $advertising->advertising_state->ViewAttrs = array(); $advertising->advertising_state->EditAttrs = array();
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row
                    
                      	// advertising_name
			$advertising->advertising_name->ViewValue = $advertising->advertising_name->CurrentValue;
			$advertising->advertising_name->CssStyle = "";
			$advertising->advertising_name->CssClass = "";
			$advertising->advertising_name->ViewCustomAttributes = "";

			// advertising_type
			if (strval($advertising->advertising_type->CurrentValue) <> "") {
				switch ($advertising->advertising_type->CurrentValue) {
					case "1":
						$advertising->advertising_type->ViewValue = "Ảnh";
						break;
					case "2":
						$advertising->advertising_type->ViewValue = "Flash";
						break;
					case "3":
						$advertising->advertising_type->ViewValue = "Video Upload";
						break;
                                        case "4":
						$advertising->advertising_type->ViewValue = "Video Youtube";
						break;
					default:
						$advertising->advertising_type->ViewValue = $advertising->advertising_type->CurrentValue;
				}
			} else {
				$advertising->advertising_type->ViewValue = NULL;
			}
			$advertising->advertising_type->CssStyle = "";
			$advertising->advertising_type->CssClass = "";
			$advertising->advertising_type->ViewCustomAttributes = "";

			// advertising_pos
			if (strval($advertising->advertising_pos->CurrentValue) <> "") {
				switch ($advertising->advertising_pos->CurrentValue) {
					case "1":
						$advertising->advertising_pos->ViewValue = "Sinh viên tương lai";
						break;
					case "2":
						$advertising->advertising_pos->ViewValue = "Cựu sinh viên";
						break;
                                        case "3":
						$advertising->advertising_pos->ViewValue = "Doanh nghiệp";
						break;
					default:
						$advertising->advertising_pos->ViewValue = $advertising->advertising_pos->CurrentValue;
				}
			} else {
				$advertising->advertising_pos->ViewValue = NULL;
			}
			$advertising->advertising_pos->CssStyle = "";
			$advertising->advertising_pos->CssClass = "";
			$advertising->advertising_pos->ViewCustomAttributes = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->ViewValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->ViewValue = "";
			}
			$advertising->advertising_url->CssStyle = "";
			$advertising->advertising_url->CssClass = "";
			$advertising->advertising_url->ViewCustomAttributes = "";

			// advertising_order
			$advertising->advertising_order->ViewValue = $advertising->advertising_order->CurrentValue;
			$advertising->advertising_order->CssStyle = "";
			$advertising->advertising_order->CssClass = "";
			$advertising->advertising_order->ViewCustomAttributes = "";

			// advertising_state
			if (strval($advertising->advertising_state->CurrentValue) <> "") {
				switch ($advertising->advertising_state->CurrentValue) {
					case "0":
						$advertising->advertising_state->ViewValue = "<span style= \"color:red\">Không kích hoạt</span>";
						break;
					case "1":
						$advertising->advertising_state->ViewValue = "Kích hoạt";
						break;
					default:
						$advertising->advertising_state->ViewValue = $advertising->advertising_state->CurrentValue;
				}
			} else {
				$advertising->advertising_state->ViewValue = NULL;
			}
			$advertising->advertising_state->CssStyle = "";
			$advertising->advertising_state->CssClass = "";
			$advertising->advertising_state->ViewCustomAttributes = "";

			// advertising_type
			$advertising->advertising_type->HrefValue = "";
			$advertising->advertising_type->TooltipValue = "";

			// advertising_pos
			$advertising->advertising_pos->HrefValue = "";
			$advertising->advertising_pos->TooltipValue = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->HrefValue = ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . ((!empty($advertising->advertising_url->ViewValue)) ? $advertising->advertising_url->ViewValue : $advertising->advertising_url->CurrentValue);
				if ($advertising->Export <> "") $advertising->advertising_url->HrefValue = ew_ConvertFullUrl($advertising->advertising_url->HrefValue);
			} else {
				$advertising->advertising_url->HrefValue = "";
			}
			$advertising->advertising_url->TooltipValue = "";

			// advertising_order
			$advertising->advertising_order->HrefValue = "";
			$advertising->advertising_order->TooltipValue = "";

			// advertising_state
			$advertising->advertising_state->HrefValue = "";
			$advertising->advertising_state->TooltipValue = "";
		} elseif ($advertising->RowType == EW_ROWTYPE_SEARCH) { // Search row
                    
                       	// advertising_name
			$advertising->advertising_name->EditCustomAttributes = "";
			$advertising->advertising_name->EditValue = ew_HtmlEncode($advertising->advertising_name->AdvancedSearch->SearchValue);

			// advertising_type
			$advertising->advertising_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Ảnh");
			$arwrk[] = array("2", "Flash");
			$arwrk[] = array("3", "Video Upload");
                        $arwrk[] = array("4", "Video Youtube");
			$advertising->advertising_type->EditValue = $arwrk;

			// advertising_pos
			$advertising->advertising_pos->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Sinh viên tương lai");
			$arwrk[] = array("2", "Cựu sinh viên");
                        $arwrk[] = array("3", "Doanh nghiệp");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$advertising->advertising_pos->EditValue = $arwrk;

			// advertising_url
			$advertising->advertising_url->EditCustomAttributes = "";
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->EditValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->EditValue = "";
			}

			// advertising_order
			$advertising->advertising_order->EditCustomAttributes = "";
			$advertising->advertising_order->EditValue = ew_HtmlEncode($advertising->advertising_order->AdvancedSearch->SearchValue);

			// advertising_state
			$advertising->advertising_state->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$advertising->advertising_state->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($advertising->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$advertising->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $advertising;

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
		global $advertising;
		$advertising->advertising_id->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_id");
		$advertising->advertising_desc->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_desc");
                $advertising->advertising_name->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_name");
		$advertising->advertising_type->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_type");
		$advertising->advertising_pos->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_pos");
		$advertising->advertising_link->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_link");
		$advertising->advertising_order->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_order");
		$advertising->create_time->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_create_time");
		$advertising->edit_time->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_edit_time");
		$advertising->advertising_state->AdvancedSearch->SearchValue = $advertising->getAdvancedSearch("x_advertising_state");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $advertising;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $advertising->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($advertising->ExportAll) {
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
		if ($advertising->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($advertising, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
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
				$advertising->CssClass = "";
				$advertising->CssStyle = "";
				$advertising->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($advertising->Export == "xml") {
					$XmlDoc->AddRow();
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($advertising->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($advertising->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($advertising->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($advertising->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($advertising->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $advertising;
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
		if ($advertising->Email_Sending($Email, $EventArgs))
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
		global $advertising;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($advertising->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $advertising->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $advertising->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $advertising->advertising_id); // advertising_id
		$this->AddSearchQueryString($sQry, $advertising->advertising_desc); // advertising_desc
		$this->AddSearchQueryString($sQry, $advertising->advertising_type); // advertising_type
		$this->AddSearchQueryString($sQry, $advertising->advertising_pos); // advertising_pos
		$this->AddSearchQueryString($sQry, $advertising->advertising_link); // advertising_link
		$this->AddSearchQueryString($sQry, $advertising->advertising_order); // advertising_order
		$this->AddSearchQueryString($sQry, $advertising->create_time); // create_time
		$this->AddSearchQueryString($sQry, $advertising->edit_time); // edit_time
		$this->AddSearchQueryString($sQry, $advertising->advertising_state); // advertising_state

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $advertising->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $advertising->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $advertising;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $advertising->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $advertising->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $advertising->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $advertising->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $advertising->GetAdvancedSearch("w_" . $FldParm);
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
