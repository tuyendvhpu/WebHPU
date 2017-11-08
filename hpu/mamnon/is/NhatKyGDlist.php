<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "adodb" . EW_PATH_DELIMITER . "adodb.inc.php" ?>
<?php include "phpfn7.php" ?>
<?php include "NhatKyGDinfo.php" ?>
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
$NhatKyGD_list = new cNhatKyGD_list();
$Page =& $NhatKyGD_list;

// Page init
$NhatKyGD_list->Page_Init();

// Page main
$NhatKyGD_list->Page_Main();
?>
<?php include "include/header.php" ?>
<div id="wrapper">
<?php include "include/navbar.php" ?> 
<?php if ($NhatKyGD->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var NhatKyGD_list = new ew_Page("NhatKyGD_list");

// page properties
NhatKyGD_list.PageID = "list"; // page ID
NhatKyGD_list.FormID = "fNhatKyGDlist"; // form ID
var EW_PAGE_ID = NhatKyGD_list.PageID; // for backward compatibility

// extend page with validate function for search
NhatKyGD_list.ValidateSearch = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (this.ValidateRequired) {
		var infix = "";
		elm = fobj.elements["x" + infix + "_NgayThangNhatKy"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($NhatKyGD->NgayThangNhatKy->FldErrMsg()) ?>");

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
NhatKyGD_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
NhatKyGD_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
NhatKyGD_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
NhatKyGD_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($NhatKyGD->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$NhatKyGD_list->lTotalRecs = $NhatKyGD->SelectRecordCount();
	} else {
		if ($rs = $NhatKyGD_list->LoadRecordset())
			$NhatKyGD_list->lTotalRecs = $rs->RecordCount();
	}
	$NhatKyGD_list->lStartRec = 1;
	if ($NhatKyGD_list->lDisplayRecs <= 0 || ($NhatKyGD->Export <> "" && $NhatKyGD->ExportAll)) // Display all records
		$NhatKyGD_list->lDisplayRecs = $NhatKyGD_list->lTotalRecs;
	if (!($NhatKyGD->Export <> "" && $NhatKyGD->ExportAll))
		$NhatKyGD_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $NhatKyGD_list->LoadRecordset($NhatKyGD_list->lStartRec-1, $NhatKyGD_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><h4 class="h2title"><?php echo $NhatKyGD->TableCaption() ?> </h4>
</span></p>
<?php if ($NhatKyGD->Export == "" && $NhatKyGD->CurrentAction == "") { ?>
<div id="NhatKyGD_list_SearchPanel">
<form name="fNhatKyGDlistsrch" id="fNhatKyGDlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return NhatKyGD_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="NhatKyGD">
<?php
if ($gsSearchError == "")
	$NhatKyGD_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$NhatKyGD->RowType = EW_ROWTYPE_SEARCH;

// Render row
$NhatKyGD_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><b><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?>:</b></span></td>
		<td><span class="ewSearchOpr">&nbsp;<label>Từ ngày</label>&nbsp;<input type="hidden" name="z_NgayThangNhatKy" id="z_NgayThangNhatKy" value=">="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_NgayThangNhatKy" id="x_NgayThangNhatKy" title="<?php echo $NhatKyGD->NgayThangNhatKy->FldTitle() ?>" value="<?php echo $NhatKyGD->NgayThangNhatKy->EditValue ?>"<?php echo $NhatKyGD->NgayThangNhatKy->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_STAR" name="cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_NgayThangNhatKy", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_STAR" // button id
});
</script>
                                </span>
				<span class="ewSearchOpr" id="btw0_NgayThangNhatKy" name="btw0_NgayThangNhatKy"><label><input type="radio" name="v_NgayThangNhatKy" id="v_NgayThangNhatKy" value="AND"<?php if ($NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchCondition <> "OR") echo " checked=\"checked\"" ?>></label>&nbsp;<label>Đến ngày</label>&nbsp;</span>
				<span class="ewSearchOpr" id="btw0_NgayThangNhatKy" name="btw0_NgayThangNhatKy" ><input type="hidden" name="w_NgayThangNhatKy" id="w_NgayThangNhatKy" value="<="></span>
				<span class="phpmaker" style="float: left;">
<input type="text" name="y_NgayThangNhatKy" id="y_NgayThangNhatKy" title="<?php echo $NhatKyGD->NgayThangNhatKy->FldTitle() ?>" value="<?php echo $NhatKyGD->NgayThangNhatKy->EditValue2 ?>"<?php echo $NhatKyGD->NgayThangNhatKy->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="1cal_x_C_DATE_STAR" name="1cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "y_NgayThangNhatKy", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "1cal_x_C_DATE_STAR" // button id
});
</script>
                                </span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><b><?php echo $NhatKyGD->LopID->FldCaption() ?>:</b></span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_LopID" id="z_LopID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_LopID" name="x_LopID" title="<?php echo $NhatKyGD->LopID->FldTitle() ?>"<?php echo $NhatKyGD->LopID->EditAttributes() ?>>
<?php
if (is_array($NhatKyGD->LopID->EditValue)) {
	$arwrk = $NhatKyGD->LopID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($NhatKyGD->LopID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $NhatKyGD_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$NhatKyGD_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent" >
<?php if ($NhatKyGD->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($NhatKyGD->CurrentAction <> "gridadd" && $NhatKyGD->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
    <table border="0" cellspacing="0" cellpadding="0" class="ewPager" style="width:480px">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($NhatKyGD_list->Pager)) $NhatKyGD_list->Pager = new cNumericPager($NhatKyGD_list->lStartRec, $NhatKyGD_list->lDisplayRecs, $NhatKyGD_list->lTotalRecs, $NhatKyGD_list->lRecRange) ?>
<?php if ($NhatKyGD_list->Pager->RecordCount > 0) { ?>
	<?php if ($NhatKyGD_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_list->PageUrl() ?>start=<?php echo $NhatKyGD_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_list->PageUrl() ?>start=<?php echo $NhatKyGD_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($NhatKyGD_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $NhatKyGD_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_list->PageUrl() ?>start=<?php echo $NhatKyGD_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_list->PageUrl() ?>start=<?php echo $NhatKyGD_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $NhatKyGD_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $NhatKyGD_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $NhatKyGD_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($NhatKyGD_list->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<a href="<?php echo $NhatKyGD_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($NhatKyGD_list->lTotalRecs > 0) { ?>
<a href="" onclick="ew_SubmitSelected(document.fNhatKyGDlist, '<?php echo $NhatKyGD_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fNhatKyGDlist" id="fNhatKyGDlist" class="ewForm" action="" method="post">
    <div id="gmp_NhatKyGD" class="ewGridMiddlePanel">
<?php if ($NhatKyGD_list->lTotalRecs > 0) { ?>
        
        <table cellspacing="0"  rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate" style="width: 100%" >
<?php echo $NhatKyGD->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$NhatKyGD_list->RenderListOptions();

// Render list options (header, left)
$NhatKyGD_list->ListOptions->Render("header", "left");
?>
<?php if ($NhatKyGD->NhatKyGDID->Visible) { // NhatKyGDID ?>
	<?php if ($NhatKyGD->SortUrl($NhatKyGD->NhatKyGDID) == "") { ?>
		<td><?php echo $NhatKyGD->NhatKyGDID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhatKyGD->SortUrl($NhatKyGD->NhatKyGDID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhatKyGD->NhatKyGDID->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhatKyGD->NhatKyGDID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhatKyGD->NhatKyGDID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhatKyGD->NgayThangNhatKy->Visible) { // NgayThangNhatKy ?>
	<?php if ($NhatKyGD->SortUrl($NhatKyGD->NgayThangNhatKy) == "") { ?>
		<td><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhatKyGD->SortUrl($NhatKyGD->NgayThangNhatKy) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhatKyGD->NgayThangNhatKy->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhatKyGD->NgayThangNhatKy->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhatKyGD->WeekOfYear->Visible) { // WeekOfYear ?>
	<?php if ($NhatKyGD->SortUrl($NhatKyGD->WeekOfYear) == "") { ?>
		<td><?php echo $NhatKyGD->WeekOfYear->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhatKyGD->SortUrl($NhatKyGD->WeekOfYear) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhatKyGD->WeekOfYear->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhatKyGD->WeekOfYear->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhatKyGD->WeekOfYear->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhatKyGD->LopID->Visible) { // LopID ?>
	<?php if ($NhatKyGD->SortUrl($NhatKyGD->LopID) == "") { ?>
		<td><?php echo $NhatKyGD->LopID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhatKyGD->SortUrl($NhatKyGD->LopID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhatKyGD->LopID->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhatKyGD->LopID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhatKyGD->LopID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$NhatKyGD_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
    
<?php
if ($NhatKyGD->ExportAll && $NhatKyGD->Export <> "") {
	$NhatKyGD_list->lStopRec = $NhatKyGD_list->lTotalRecs;
} else {
	$NhatKyGD_list->lStopRec = $NhatKyGD_list->lStartRec + $NhatKyGD_list->lDisplayRecs - 1; // Set the last record to display
}
$NhatKyGD_list->lRecCount = $NhatKyGD_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $NhatKyGD_list->lStartRec > 1)
		$rs->Move($NhatKyGD_list->lStartRec - 1);
}

// Initialize aggregate
$NhatKyGD->RowType = EW_ROWTYPE_AGGREGATEINIT;
$NhatKyGD_list->RenderRow();
$NhatKyGD_list->lRowCnt = 0;
while (($NhatKyGD->CurrentAction == "gridadd" || !$rs->EOF) &&
	$NhatKyGD_list->lRecCount < $NhatKyGD_list->lStopRec) {
	$NhatKyGD_list->lRecCount++;
	if (intval($NhatKyGD_list->lRecCount) >= intval($NhatKyGD_list->lStartRec)) {
		$NhatKyGD_list->lRowCnt++;

	// Init row class and style
	$NhatKyGD->CssClass = "";
	$NhatKyGD->CssStyle = "";
	$NhatKyGD->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($NhatKyGD->CurrentAction == "gridadd") {
		$NhatKyGD_list->LoadDefaultValues(); // Load default values
	} else {
		$NhatKyGD_list->LoadRowValues($rs); // Load row values
	}
	$NhatKyGD->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$NhatKyGD_list->RenderRow();

	// Render list options
	$NhatKyGD_list->RenderListOptions();
?>
	<tr<?php echo $NhatKyGD->RowAttributes() ?>>
<?php

// Render list options (body, left)
$NhatKyGD_list->ListOptions->Render("body", "left");
?>
	<?php if ($NhatKyGD->NhatKyGDID->Visible) { // NhatKyGDID ?>
		<td<?php echo $NhatKyGD->NhatKyGDID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NhatKyGDID->ViewAttributes() ?>><?php echo $NhatKyGD->NhatKyGDID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhatKyGD->NgayThangNhatKy->Visible) { // NgayThangNhatKy ?>
		<td<?php echo $NhatKyGD->NgayThangNhatKy->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NgayThangNhatKy->ViewAttributes() ?>><?php echo Get_ngaythang($rs->fields('NgayThangNhatKy')) ?></div>
</td>
	<?php } ?>
	<?php if ($NhatKyGD->WeekOfYear->Visible) { // WeekOfYear ?>
		<td<?php echo $NhatKyGD->WeekOfYear->CellAttributes() ?>>
<div<?php echo $NhatKyGD->WeekOfYear->ViewAttributes() ?>><?php echo $NhatKyGD->WeekOfYear->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhatKyGD->LopID->Visible) { // LopID ?>
		<td<?php echo $NhatKyGD->LopID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->LopID->ViewAttributes() ?>><?php echo $NhatKyGD->LopID->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$NhatKyGD_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($NhatKyGD->CurrentAction <> "gridadd")
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
</td></tr></table>
<?php if ($NhatKyGD->Export == "" && $NhatKyGD->CurrentAction == "") { ?>
<?php } ?>
<?php if ($NhatKyGD->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<div id="push"></div>  <!-- end wrapper--></div>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>    

<?php include "include/is_footer.php" ?>
<?php
$NhatKyGD_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cNhatKyGD_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'NhatKyGD';

	// Page object name
	var $PageObjName = 'NhatKyGD_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) $PageUrl .= "t=" . $NhatKyGD->TableVar . "&"; // Add page token
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
		global $objForm, $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) {
			if ($objForm)
				return ($NhatKyGD->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($NhatKyGD->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cNhatKyGD_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (NhatKyGD)
		$GLOBALS["NhatKyGD"] = new cNhatKyGD();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["NhatKyGD"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "NhatKyGDdelete.php";
		$this->MultiUpdateUrl = "NhatKyGDupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'NhatKyGD', TRUE);

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
		global $NhatKyGD;

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$NhatKyGD->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$NhatKyGD->Export = $_POST["exporttype"];
		} else {
			$NhatKyGD->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $NhatKyGD->Export; // Get export parameter, used in header
		$gsExportFile = $NhatKyGD->TableVar; // Get export file, used in header
		if (in_array($NhatKyGD->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($NhatKyGD->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($NhatKyGD->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($NhatKyGD->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($NhatKyGD->Export == "csv") {
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
	var $lDisplayRecs = 7;
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
		global $objForm, $Language, $gsSearchError, $Security, $NhatKyGD;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up list options
			$this->SetupListOptions();

			// Get and validate search values for advanced search
			$this->LoadSearchValues(); // Get search values
			if (!$this->ValidateSearch())
				$this->setMessage($gsSearchError);

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$NhatKyGD->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get search criteria for advanced search
			if ($gsSearchError == "")
				$sSrchAdvanced = $this->AdvancedSearchWhere();
		}

		// Restore display records
		if ($NhatKyGD->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $NhatKyGD->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 7; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchAdvanced . ")" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchBasic. ")" : $sSrchBasic;

		// Call Recordset_Searching event
		$NhatKyGD->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$NhatKyGD->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$NhatKyGD->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $NhatKyGD->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$NhatKyGD->setSessionWhere($sFilter);
		$NhatKyGD->CurrentFilter = "";

		// Export data only
		if (in_array($NhatKyGD->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($NhatKyGD->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $NhatKyGD;
		$sWhere = "";
		$this->BuildSearchSql($sWhere, $NhatKyGD->NhatKyGDID, FALSE); // NhatKyGDID
		$this->BuildSearchSql($sWhere, $NhatKyGD->NgayThangNhatKy, FALSE); // NgayThangNhatKy
		$this->BuildSearchSql($sWhere, $NhatKyGD->WeekOfYear, FALSE); // WeekOfYear
		$this->BuildSearchSql($sWhere, $NhatKyGD->LopID, FALSE); // LopID
		$this->BuildSearchSql($sWhere, $NhatKyGD->NhatKyGDBS, FALSE); // NhatKyGDBS
		$this->BuildSearchSql($sWhere, $NhatKyGD->NhatKyGDBC, FALSE); // NhatKyGDBC

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($NhatKyGD->NhatKyGDID); // NhatKyGDID
			$this->SetSearchParm($NhatKyGD->NgayThangNhatKy); // NgayThangNhatKy
			$this->SetSearchParm($NhatKyGD->WeekOfYear); // WeekOfYear
			$this->SetSearchParm($NhatKyGD->LopID); // LopID
			$this->SetSearchParm($NhatKyGD->NhatKyGDBS); // NhatKyGDBS
			$this->SetSearchParm($NhatKyGD->NhatKyGDBC); // NhatKyGDBC
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
		global $NhatKyGD;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$NhatKyGD->setAdvancedSearch("x_$FldParm", $FldVal);
		$NhatKyGD->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$NhatKyGD->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$NhatKyGD->setAdvancedSearch("y_$FldParm", $FldVal2);
		$NhatKyGD->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $NhatKyGD;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $NhatKyGD->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $NhatKyGD->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $NhatKyGD->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $NhatKyGD->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $NhatKyGD->GetAdvancedSearch("w_$FldParm");
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

	// Clear all search parameters
	function ResetSearchParms() {
		global $NhatKyGD;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$NhatKyGD->setSearchWhere($this->sSrchWhere);

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $NhatKyGD;
		$NhatKyGD->setAdvancedSearch("x_NhatKyGDID", "");
		$NhatKyGD->setAdvancedSearch("x_NgayThangNhatKy", "");
		$NhatKyGD->setAdvancedSearch("v_NgayThangNhatKy", "AND");
		$NhatKyGD->setAdvancedSearch("y_NgayThangNhatKy", "");
		$NhatKyGD->setAdvancedSearch("x_WeekOfYear", "");
		$NhatKyGD->setAdvancedSearch("x_LopID", "");
		$NhatKyGD->setAdvancedSearch("x_NhatKyGDBS", "");
		$NhatKyGD->setAdvancedSearch("x_NhatKyGDBC", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $NhatKyGD;
		$bRestore = TRUE;
		if (@$_GET["x_NhatKyGDID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_NgayThangNhatKy"] <> "") $bRestore = FALSE;
		if (@$_GET["y_NgayThangNhatKy"] <> "") $bRestore = FALSE;
		if (@$_GET["x_WeekOfYear"] <> "") $bRestore = FALSE;
		if (@$_GET["x_LopID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_NhatKyGDBS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_NhatKyGDBC"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore advanced search values
			$this->GetSearchParm($NhatKyGD->NhatKyGDID);
			$this->GetSearchParm($NhatKyGD->NgayThangNhatKy);
			$this->GetSearchParm($NhatKyGD->WeekOfYear);
			$this->GetSearchParm($NhatKyGD->LopID);
			$this->GetSearchParm($NhatKyGD->NhatKyGDBS);
			$this->GetSearchParm($NhatKyGD->NhatKyGDBC);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $NhatKyGD;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$NhatKyGD->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$NhatKyGD->CurrentOrderType = @$_GET["ordertype"];
			$NhatKyGD->UpdateSort($NhatKyGD->NhatKyGDID, $bCtrl); // NhatKyGDID
			$NhatKyGD->UpdateSort($NhatKyGD->NgayThangNhatKy, $bCtrl); // NgayThangNhatKy
			$NhatKyGD->UpdateSort($NhatKyGD->WeekOfYear, $bCtrl); // WeekOfYear
			$NhatKyGD->UpdateSort($NhatKyGD->LopID, $bCtrl); // LopID
			$NhatKyGD->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $NhatKyGD;
		$sOrderBy = $NhatKyGD->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($NhatKyGD->SqlOrderBy() <> "") {
				$sOrderBy = $NhatKyGD->SqlOrderBy();
				$NhatKyGD->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $NhatKyGD;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$NhatKyGD->setSessionOrderBy($sOrderBy);
				$NhatKyGD->NhatKyGDID->setSort("");
				$NhatKyGD->NgayThangNhatKy->setSort("");
				$NhatKyGD->WeekOfYear->setSort("");
				$NhatKyGD->LopID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $NhatKyGD;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE;

		

		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = True;
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"NhatKyGD_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($NhatKyGD->Export <> "" ||
			$NhatKyGD->CurrentAction == "gridadd" ||
			$NhatKyGD->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $NhatKyGD;
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
		if ($oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($NhatKyGD->NhatKyGDID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $NhatKyGD;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $NhatKyGD;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$NhatKyGD->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$NhatKyGD->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $NhatKyGD->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $NhatKyGD;

		// Load search values
		// NhatKyGDID

		$NhatKyGD->NhatKyGDID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_NhatKyGDID"]);
		$NhatKyGD->NhatKyGDID->AdvancedSearch->SearchOperator = @$_GET["z_NhatKyGDID"];

		// NgayThangNhatKy
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_NgayThangNhatKy"]);
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchOperator = @$_GET["z_NgayThangNhatKy"];
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchCondition = @$_GET["v_NgayThangNhatKy"];
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue2 = ew_StripSlashes(@$_GET["y_NgayThangNhatKy"]);
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchOperator2 = @$_GET["w_NgayThangNhatKy"];

		// WeekOfYear
		$NhatKyGD->WeekOfYear->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_WeekOfYear"]);
		$NhatKyGD->WeekOfYear->AdvancedSearch->SearchOperator = @$_GET["z_WeekOfYear"];

		// LopID
		$NhatKyGD->LopID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_LopID"]);
		$NhatKyGD->LopID->AdvancedSearch->SearchOperator = @$_GET["z_LopID"];

		// NhatKyGDBS
		$NhatKyGD->NhatKyGDBS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_NhatKyGDBS"]);
		$NhatKyGD->NhatKyGDBS->AdvancedSearch->SearchOperator = @$_GET["z_NhatKyGDBS"];

		// NhatKyGDBC
		$NhatKyGD->NhatKyGDBC->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_NhatKyGDBC"]);
		$NhatKyGD->NhatKyGDBC->AdvancedSearch->SearchOperator = @$_GET["z_NhatKyGDBC"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $NhatKyGD;

		// Call Recordset Selecting event
		$NhatKyGD->Recordset_Selecting($NhatKyGD->CurrentFilter);

		// Load List page SQL
		$sSql = $NhatKyGD->SelectSQL();

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$NhatKyGD->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $NhatKyGD;
		$sFilter = $NhatKyGD->KeyFilter();

		// Call Row Selecting event
		$NhatKyGD->Row_Selecting($sFilter);

		// Load SQL based on filter
		$NhatKyGD->CurrentFilter = $sFilter;
		$sSql = $NhatKyGD->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$NhatKyGD->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $NhatKyGD;
		$NhatKyGD->NhatKyGDID->setDbValue($rs->fields('NhatKyGDID'));
		$NhatKyGD->NgayThangNhatKy->setDbValue($rs->fields('NgayThangNhatKy'));
		$NhatKyGD->WeekOfYear->setDbValue($rs->fields('WeekOfYear'));
		$NhatKyGD->LopID->setDbValue($rs->fields('LopID'));
		$NhatKyGD->NhatKyGDBS->setDbValue($rs->fields('NhatKyGDBS'));
		$NhatKyGD->NhatKyGDBC->setDbValue($rs->fields('NhatKyGDBC'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $NhatKyGD;

		// Initialize URLs
		$this->ViewUrl = $NhatKyGD->ViewUrl();
		$this->EditUrl = $NhatKyGD->EditUrl();
		$this->InlineEditUrl = $NhatKyGD->InlineEditUrl();
		$this->CopyUrl = $NhatKyGD->CopyUrl();
		$this->InlineCopyUrl = $NhatKyGD->InlineCopyUrl();
		$this->DeleteUrl = $NhatKyGD->DeleteUrl();

		// Call Row_Rendering event
		$NhatKyGD->Row_Rendering();

		// Common render codes for all row types
		// NhatKyGDID

		$NhatKyGD->NhatKyGDID->CellCssStyle = ""; $NhatKyGD->NhatKyGDID->CellCssClass = "";
		$NhatKyGD->NhatKyGDID->CellAttrs = array(); $NhatKyGD->NhatKyGDID->ViewAttrs = array(); $NhatKyGD->NhatKyGDID->EditAttrs = array();

		// NgayThangNhatKy
		$NhatKyGD->NgayThangNhatKy->CellCssStyle = ""; $NhatKyGD->NgayThangNhatKy->CellCssClass = "";
		$NhatKyGD->NgayThangNhatKy->CellAttrs = array(); $NhatKyGD->NgayThangNhatKy->ViewAttrs = array(); $NhatKyGD->NgayThangNhatKy->EditAttrs = array();

		// WeekOfYear
		$NhatKyGD->WeekOfYear->CellCssStyle = ""; $NhatKyGD->WeekOfYear->CellCssClass = "";
		$NhatKyGD->WeekOfYear->CellAttrs = array(); $NhatKyGD->WeekOfYear->ViewAttrs = array(); $NhatKyGD->WeekOfYear->EditAttrs = array();

		// LopID
		$NhatKyGD->LopID->CellCssStyle = ""; $NhatKyGD->LopID->CellCssClass = "";
		$NhatKyGD->LopID->CellAttrs = array(); $NhatKyGD->LopID->ViewAttrs = array(); $NhatKyGD->LopID->EditAttrs = array();
		if ($NhatKyGD->RowType == EW_ROWTYPE_VIEW) { // View row

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->ViewValue = $NhatKyGD->NhatKyGDID->CurrentValue;
			$NhatKyGD->NhatKyGDID->CssStyle = "";
			$NhatKyGD->NhatKyGDID->CssClass = "";
			$NhatKyGD->NhatKyGDID->ViewCustomAttributes = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->ViewValue = $NhatKyGD->NgayThangNhatKy->CurrentValue;
			$NhatKyGD->NgayThangNhatKy->ViewValue = ew_FormatDateTime($NhatKyGD->NgayThangNhatKy->ViewValue, 7);
			$NhatKyGD->NgayThangNhatKy->CssStyle = "";
			$NhatKyGD->NgayThangNhatKy->CssClass = "";
			$NhatKyGD->NgayThangNhatKy->ViewCustomAttributes = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->ViewValue = $NhatKyGD->WeekOfYear->CurrentValue;
			$NhatKyGD->WeekOfYear->CssStyle = "";
			$NhatKyGD->WeekOfYear->CssClass = "";
			$NhatKyGD->WeekOfYear->ViewCustomAttributes = "";

			// LopID
			if (strval($NhatKyGD->LopID->CurrentValue) <> "") {
				$sFilterWrk = "[LopID] = " . ew_AdjustSql($NhatKyGD->LopID->CurrentValue) . "";
			$sSqlWrk = "SELECT [MaSoLop] FROM [DMLop]";
			$sWhereWrk = ""; 
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$NhatKyGD->LopID->ViewValue = $rswrk->fields('MaSoLop');
					$rswrk->Close();
				} else {
					$NhatKyGD->LopID->ViewValue = $NhatKyGD->LopID->CurrentValue;
				}
			} else {
				$NhatKyGD->LopID->ViewValue = NULL;
			}
			$NhatKyGD->LopID->CssStyle = "";
			$NhatKyGD->LopID->CssClass = "";
			$NhatKyGD->LopID->ViewCustomAttributes = "";

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->HrefValue = "";
			$NhatKyGD->NhatKyGDID->TooltipValue = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->HrefValue = "";
			$NhatKyGD->NgayThangNhatKy->TooltipValue = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->HrefValue = "";
			$NhatKyGD->WeekOfYear->TooltipValue = "";

			// LopID
			$NhatKyGD->LopID->HrefValue = "";
			$NhatKyGD->LopID->TooltipValue = "";
		} elseif ($NhatKyGD->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->EditCustomAttributes = "";
			$NhatKyGD->NhatKyGDID->EditValue = ew_HtmlEncode($NhatKyGD->NhatKyGDID->AdvancedSearch->SearchValue);

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->EditCustomAttributes = "";
			$NhatKyGD->NgayThangNhatKy->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue, 7), 7));
			$NhatKyGD->NgayThangNhatKy->EditCustomAttributes = "";
			$NhatKyGD->NgayThangNhatKy->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue2, 7), 7));

			// WeekOfYear
			$NhatKyGD->WeekOfYear->EditCustomAttributes = "";
			$NhatKyGD->WeekOfYear->EditValue = ew_HtmlEncode($NhatKyGD->WeekOfYear->AdvancedSearch->SearchValue);

			// LopID
			$NhatKyGD->LopID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT [LopID], [MaSoLop], '' AS Disp2Fld, '' AS SelectFilterFld FROM [DMLop]";
			$sWhereWrk = "DMLop.LopID = ".$_SESSION['LopID']; 
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			//array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$NhatKyGD->LopID->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($NhatKyGD->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$NhatKyGD->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $NhatKyGD;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $NhatKyGD->NgayThangNhatKy->FldErrMsg();
		}
		if (!ew_CheckEuroDate($NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $NhatKyGD->NgayThangNhatKy->FldErrMsg();
		}

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
		global $NhatKyGD;
		$NhatKyGD->NhatKyGDID->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_NhatKyGDID");
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_NgayThangNhatKy");
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchCondition = $NhatKyGD->getAdvancedSearch("v_NgayThangNhatKy");
		$NhatKyGD->NgayThangNhatKy->AdvancedSearch->SearchValue2 = $NhatKyGD->getAdvancedSearch("y_NgayThangNhatKy");
		$NhatKyGD->WeekOfYear->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_WeekOfYear");
		$NhatKyGD->LopID->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_LopID");
		$NhatKyGD->NhatKyGDBS->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_NhatKyGDBS");
		$NhatKyGD->NhatKyGDBC->AdvancedSearch->SearchValue = $NhatKyGD->getAdvancedSearch("x_NhatKyGDBC");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $NhatKyGD;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $NhatKyGD->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($NhatKyGD->ExportAll) {
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
		if ($NhatKyGD->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($NhatKyGD, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($NhatKyGD->NhatKyGDID);
				$ExportDoc->ExportCaption($NhatKyGD->NgayThangNhatKy);
				$ExportDoc->ExportCaption($NhatKyGD->WeekOfYear);
				$ExportDoc->ExportCaption($NhatKyGD->LopID);
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
				$NhatKyGD->CssClass = "";
				$NhatKyGD->CssStyle = "";
				$NhatKyGD->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($NhatKyGD->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('NhatKyGDID', $NhatKyGD->NhatKyGDID->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('NgayThangNhatKy', $NhatKyGD->NgayThangNhatKy->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('WeekOfYear', $NhatKyGD->WeekOfYear->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('LopID', $NhatKyGD->LopID->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($NhatKyGD->NhatKyGDID);
					$ExportDoc->ExportField($NhatKyGD->NgayThangNhatKy);
					$ExportDoc->ExportField($NhatKyGD->WeekOfYear);
					$ExportDoc->ExportField($NhatKyGD->LopID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($NhatKyGD->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($NhatKyGD->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($NhatKyGD->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($NhatKyGD->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($NhatKyGD->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $NhatKyGD;
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
		if ($NhatKyGD->Email_Sending($Email, $EventArgs))
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
		global $NhatKyGD;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		$this->AddSearchQueryString($sQry, $NhatKyGD->NhatKyGDID); // NhatKyGDID
		$this->AddSearchQueryString($sQry, $NhatKyGD->NgayThangNhatKy); // NgayThangNhatKy
		$this->AddSearchQueryString($sQry, $NhatKyGD->WeekOfYear); // WeekOfYear
		$this->AddSearchQueryString($sQry, $NhatKyGD->LopID); // LopID
		$this->AddSearchQueryString($sQry, $NhatKyGD->NhatKyGDBS); // NhatKyGDBS
		$this->AddSearchQueryString($sQry, $NhatKyGD->NhatKyGDBC); // NhatKyGDBC

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $NhatKyGD->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $NhatKyGD->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $NhatKyGD;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $NhatKyGD->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $NhatKyGD->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $NhatKyGD->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $NhatKyGD->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $NhatKyGD->GetAdvancedSearch("w_" . $FldParm);
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
