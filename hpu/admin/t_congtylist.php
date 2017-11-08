<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_congtyinfo.php" ?>
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
$t_congty_list = new ct_congty_list();
$Page =& $t_congty_list;

// Page init
$t_congty_list->Page_Init();

// Page main
$t_congty_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_congty->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_congty_list = new ew_Page("t_congty_list");

// page properties
t_congty_list.PageID = "list"; // page ID
t_congty_list.FormID = "ft_congtylist"; // form ID
var EW_PAGE_ID = t_congty_list.PageID; // for backward compatibility

// extend page with validate function for search
t_congty_list.ValidateSearch = function(fobj) {
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
t_congty_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_congty_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_congty_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_congty_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_congty->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_congty_list->lTotalRecs = $t_congty->SelectRecordCount();
	} else {
		if ($rs = $t_congty_list->LoadRecordset())
			$t_congty_list->lTotalRecs = $rs->RecordCount();
	}
	$t_congty_list->lStartRec = 1;
	if ($t_congty_list->lDisplayRecs <= 0 || ($t_congty->Export <> "" && $t_congty->ExportAll)) // Display all records
		$t_congty_list->lDisplayRecs = $t_congty_list->lTotalRecs;
	if (!($t_congty->Export <> "" && $t_congty->ExportAll))
		$t_congty_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_congty_list->LoadRecordset($t_congty_list->lStartRec-1, $t_congty_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_congty->TableCaption() ?>
<?php if ($t_congty->Export == "" && $t_congty->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_congty" id="emf_t_congty" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_congty',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_congtylist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_congty->Export == "" && $t_congty->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_congty_list);" style="text-decoration: none;"><img id="t_congty_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_congty_list_SearchPanel">
<form name="ft_congtylistsrch" id="ft_congtylistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_congty_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_congty">
<input type="hidden" id="parrentcompanyid" name="parrentcompanyid" value="<?php echo $_SESSION['parrentcompanyid'] ?>">
<?php
if ($gsSearchError == "")
	$t_congty_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_congty->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_congty_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_NGANH_ID" id="z_FK_NGANH_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_NGANH_ID" name="x_FK_NGANH_ID" title="<?php echo $t_congty->FK_NGANH_ID->FldTitle() ?>"<?php echo $t_congty->FK_NGANH_ID->EditAttributes() ?>>
<?php
if (is_array($t_congty->FK_NGANH_ID->EditValue)) {
	$arwrk = $t_congty->FK_NGANH_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_congty->FK_NGANH_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_congty->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_congty_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_congty->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_congty->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_congty->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (isset($_SESSION['parrentcompanyid']) && $_SESSION['parrentcompanyid'] <> '')
{
        $conn = ew_Connect();
	$sSqlWrk = "Select c_tencongty,C_PARRENT from t_congty where pk_macongty =".  $_SESSION['parrentcompanyid'];
	$rswrk = $conn->Execute($sSqlWrk);
	$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
	if ($rswrk) $rswrk->Close();

?><br>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php echo $arwrk[0][0] ?> - Các đơn vị trực thuộc</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="../admin/t_congtylist.php?"><?php echo $Language->Phrase("GoBack") ?></a><br>
 <?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_congty_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_congty->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_congty->CurrentAction <> "gridadd" && $t_congty->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_congty_list->Pager)) $t_congty_list->Pager = new cNumericPager($t_congty_list->lStartRec, $t_congty_list->lDisplayRecs, $t_congty_list->lTotalRecs, $t_congty_list->lRecRange) ?>
<?php if ($t_congty_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_congty_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_congty_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_congty_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_congty_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_congty_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_congty_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_congty_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_congty_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_congtylist, '<?php echo $t_congty_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_congtylist" id="ft_congtylist" class="ewForm" action="" method="post">
<div id="gmp_t_congty" class="ewGridMiddlePanel">
<?php if ($t_congty_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_congty->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_congty_list->RenderListOptions();

// Render list options (header, left)
$t_congty_list->ListOptions->Render("header", "left");
?>
<?php if ($t_congty->FK_NGANH_ID->Visible) { // FK_NGANH_ID ?>
	<?php if ($t_congty->SortUrl($t_congty->FK_NGANH_ID) == "") { ?>
		<td><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_congty->SortUrl($t_congty->FK_NGANH_ID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_congty->FK_NGANH_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_congty->FK_NGANH_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_congty->C_TENCONGTY->Visible) { // C_TENCONGTY ?>
	<?php if ($t_congty->SortUrl($t_congty->C_TENCONGTY) == "") { ?>
		<td><?php echo $t_congty->C_TENCONGTY->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_congty->SortUrl($t_congty->C_TENCONGTY) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_congty->C_TENCONGTY->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_congty->C_TENCONGTY->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_congty->C_TENCONGTY->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_congty->C_TYPE_TEMPLATE->Visible) { // C_TYPE_TEMPLATE ?>
	<?php if ($t_congty->SortUrl($t_congty->C_TYPE_TEMPLATE) == "") { ?>
		<td><?php echo $t_congty->C_TYPE_TEMPLATE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_congty->SortUrl($t_congty->C_TYPE_TEMPLATE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_congty->C_TYPE_TEMPLATE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_congty->C_TYPE_TEMPLATE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_congty->C_TYPE_TEMPLATE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_congty_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_congty->ExportAll && $t_congty->Export <> "") {
	$t_congty_list->lStopRec = $t_congty_list->lTotalRecs;
} else {
	$t_congty_list->lStopRec = $t_congty_list->lStartRec + $t_congty_list->lDisplayRecs - 1; // Set the last record to display
}
$t_congty_list->lRecCount = $t_congty_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_congty_list->lStartRec > 1)
		$rs->Move($t_congty_list->lStartRec - 1);
}

// Initialize aggregate
$t_congty->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_congty_list->RenderRow();
$t_congty_list->lRowCnt = 0;
while (($t_congty->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_congty_list->lRecCount < $t_congty_list->lStopRec) {
	$t_congty_list->lRecCount++;
	if (intval($t_congty_list->lRecCount) >= intval($t_congty_list->lStartRec)) {
		$t_congty_list->lRowCnt++;

	// Init row class and style
	$t_congty->CssClass = "";
	$t_congty->CssStyle = "";
	$t_congty->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_congty->CurrentAction == "gridadd") {
		$t_congty_list->LoadDefaultValues(); // Load default values
	} else {
		$t_congty_list->LoadRowValues($rs); // Load row values
	}
	$t_congty->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_congty_list->RenderRow();

	// Render list options
	$t_congty_list->RenderListOptions();
?>
	<tr<?php echo $t_congty->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_congty_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_congty->FK_NGANH_ID->Visible) { // FK_NGANH_ID ?>
		<td<?php echo $t_congty->FK_NGANH_ID->CellAttributes() ?>>
<div<?php echo $t_congty->FK_NGANH_ID->ViewAttributes() ?>><?php echo $t_congty->FK_NGANH_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_congty->C_TENCONGTY->Visible) { // C_TENCONGTY ?>
		<td<?php echo $t_congty->C_TENCONGTY->CellAttributes() ?>>
<div<?php echo $t_congty->C_TENCONGTY->ViewAttributes() ?>><?php echo $t_congty->C_TENCONGTY->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_congty->C_TYPE_TEMPLATE->Visible) { // C_TYPE_TEMPLATE ?>
		<td<?php echo $t_congty->C_TYPE_TEMPLATE->CellAttributes() ?>>
<div<?php echo $t_congty->C_TYPE_TEMPLATE->ViewAttributes() ?>><?php echo $t_congty->C_TYPE_TEMPLATE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_congty_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_congty->CurrentAction <> "gridadd")
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
<?php if ($t_congty_list->lTotalRecs > 0) { ?>
<?php if ($t_congty->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_congty->CurrentAction <> "gridadd" && $t_congty->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_congty_list->Pager)) $t_congty_list->Pager = new cNumericPager($t_congty_list->lStartRec, $t_congty_list->lDisplayRecs, $t_congty_list->lTotalRecs, $t_congty_list->lRecRange) ?>
<?php if ($t_congty_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_congty_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_congty_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_congty_list->PageUrl() ?>start=<?php echo $t_congty_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_congty_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_congty_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_congty_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_congty_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_congty_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_congty_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_congty_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_congtylist, '<?php echo $t_congty_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_congty->Export == "" && $t_congty->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_congty->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_congty_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_congty_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_congty';

	// Page object name
	var $PageObjName = 't_congty_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_congty;
                if (isset($_SESSION['parrentcompanyid']) && $_SESSION['parrentcompanyid'] <> '') $PageUrl .= "parrentcompanyid=" . $_SESSION['parrentcompanyid'] . "&";
		if ($t_congty->UseTokenInUrl) $PageUrl .= "t=" . $t_congty->TableVar . "&"; // Add page token
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
		global $objForm, $t_congty;
		if ($t_congty->UseTokenInUrl) {
			if ($objForm)
				return ($t_congty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_congty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_congty_list() {
		global $conn, $Language, $PageObjName;
                 
                 @$_SESSION['parrentcompanyid'] = $_GET['parrentcompanyid'];
                 $PageObjName = "t_congty_list";
		// Language object
		$Language = new cLanguage();

		// Table object (t_congty)
		$GLOBALS["t_congty"] = new ct_congty();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_congty"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_congtydelete.php";
		$this->MultiUpdateUrl = "t_congtyupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_congty', TRUE);

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
		global $t_congty;

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
			$t_congty->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_congty->Export = $_POST["exporttype"];
		} else {
			$t_congty->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_congty->Export; // Get export parameter, used in header
		$gsExportFile = $t_congty->TableVar; // Get export file, used in header
		if (in_array($t_congty->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_congty->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_congty->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_congty->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_congty->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_congty;

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
			$t_congty->Recordset_SearchValidated();

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
		if ($t_congty->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_congty->getRecordsPerPage(); // Restore from Session
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
		$t_congty->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_congty->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_congty->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_congty->getSearchWhere();
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
		$t_congty->setSessionWhere($sFilter);
		$t_congty->CurrentFilter = "";

		// Export data only
		if (in_array($t_congty->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_congty->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_congty;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_congty->PK_MACONGTY, FALSE); // PK_MACONGTY
		$this->BuildSearchSql($sWhere, $t_congty->FK_NGANH_ID, FALSE); // FK_NGANH_ID
		$this->BuildSearchSql($sWhere, $t_congty->C_TENCONGTY, FALSE); // C_TENCONGTY
		$this->BuildSearchSql($sWhere, $t_congty->C_TENVIETTAT, FALSE); // C_TENVIETTAT
		$this->BuildSearchSql($sWhere, $t_congty->C_WEBSITE, FALSE); // C_WEBSITE
		$this->BuildSearchSql($sWhere, $t_congty->C_DIACHI, FALSE); // C_DIACHI
		$this->BuildSearchSql($sWhere, $t_congty->C_DIENTHOAI, FALSE); // C_DIENTHOAI
		$this->BuildSearchSql($sWhere, $t_congty->C_FAX, FALSE); // C_FAX
		$this->BuildSearchSql($sWhere, $t_congty->C_EMAIL, FALSE); // C_EMAIL
		$this->BuildSearchSql($sWhere, $t_congty->C_MOTA, FALSE); // C_MOTA
		$this->BuildSearchSql($sWhere, $t_congty->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_congty->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_congty->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_congty->C_EDIT_TIME, FALSE); // C_EDIT_TIME
		$this->BuildSearchSql($sWhere, $t_congty->C_REPORT_STATUS, FALSE); // C_REPORT_STATUS
		$this->BuildSearchSql($sWhere, $t_congty->C_TYPE_TEMPLATE, FALSE); // C_TYPE_TEMPLATE
		$this->BuildSearchSql($sWhere, $t_congty->C_PARRENT, FALSE); // C_PARRENT

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_congty->PK_MACONGTY); // PK_MACONGTY
			$this->SetSearchParm($t_congty->FK_NGANH_ID); // FK_NGANH_ID
			$this->SetSearchParm($t_congty->C_TENCONGTY); // C_TENCONGTY
			$this->SetSearchParm($t_congty->C_TENVIETTAT); // C_TENVIETTAT
			$this->SetSearchParm($t_congty->C_WEBSITE); // C_WEBSITE
			$this->SetSearchParm($t_congty->C_DIACHI); // C_DIACHI
			$this->SetSearchParm($t_congty->C_DIENTHOAI); // C_DIENTHOAI
			$this->SetSearchParm($t_congty->C_FAX); // C_FAX
			$this->SetSearchParm($t_congty->C_EMAIL); // C_EMAIL
			$this->SetSearchParm($t_congty->C_MOTA); // C_MOTA
			$this->SetSearchParm($t_congty->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_congty->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_congty->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_congty->C_EDIT_TIME); // C_EDIT_TIME
			$this->SetSearchParm($t_congty->C_REPORT_STATUS); // C_REPORT_STATUS
			$this->SetSearchParm($t_congty->C_TYPE_TEMPLATE); // C_TYPE_TEMPLATE
			$this->SetSearchParm($t_congty->C_PARRENT); // C_PARRENT
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
		global $t_congty;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_congty->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_congty->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_congty->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_congty->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_congty->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_congty;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_congty->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_congty->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_congty->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_congty->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_congty->GetAdvancedSearch("w_$FldParm");
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
		global $t_congty;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $t_congty->FK_NGANH_ID, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_congty->C_TENCONGTY, $Keyword);
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
		global $Security, $t_congty;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_congty->BasicSearchKeyword;
		$sSearchType = $t_congty->BasicSearchType;
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
			$t_congty->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_congty->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_congty;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_congty->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_congty;
		$t_congty->setSessionBasicSearchKeyword("");
		$t_congty->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_congty;
		$t_congty->setAdvancedSearch("x_PK_MACONGTY", "");
		$t_congty->setAdvancedSearch("x_FK_NGANH_ID", "");
		$t_congty->setAdvancedSearch("x_C_TENCONGTY", "");
		$t_congty->setAdvancedSearch("x_C_TENVIETTAT", "");
		$t_congty->setAdvancedSearch("x_C_WEBSITE", "");
		$t_congty->setAdvancedSearch("x_C_DIACHI", "");
		$t_congty->setAdvancedSearch("x_C_DIENTHOAI", "");
		$t_congty->setAdvancedSearch("x_C_FAX", "");
		$t_congty->setAdvancedSearch("x_C_EMAIL", "");
		$t_congty->setAdvancedSearch("x_C_MOTA", "");
		$t_congty->setAdvancedSearch("x_C_USER_ADD", "");
		$t_congty->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_congty->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_congty->setAdvancedSearch("x_C_EDIT_TIME", "");
		$t_congty->setAdvancedSearch("x_C_REPORT_STATUS", "");
		$t_congty->setAdvancedSearch("x_C_TYPE_TEMPLATE", "");
		$t_congty->setAdvancedSearch("x_C_PARRENT", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_congty;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_MACONGTY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_NGANH_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TENCONGTY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TENVIETTAT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_WEBSITE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DIACHI"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_DIENTHOAI"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_FAX"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EMAIL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_MOTA"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_REPORT_STATUS"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TYPE_TEMPLATE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PARRENT"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_congty->BasicSearchKeyword = $t_congty->getSessionBasicSearchKeyword();
			$t_congty->BasicSearchType = $t_congty->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_congty->PK_MACONGTY);
			$this->GetSearchParm($t_congty->FK_NGANH_ID);
			$this->GetSearchParm($t_congty->C_TENCONGTY);
			$this->GetSearchParm($t_congty->C_TENVIETTAT);
			$this->GetSearchParm($t_congty->C_WEBSITE);
			$this->GetSearchParm($t_congty->C_DIACHI);
			$this->GetSearchParm($t_congty->C_DIENTHOAI);
			$this->GetSearchParm($t_congty->C_FAX);
			$this->GetSearchParm($t_congty->C_EMAIL);
			$this->GetSearchParm($t_congty->C_MOTA);
			$this->GetSearchParm($t_congty->C_USER_ADD);
			$this->GetSearchParm($t_congty->C_ADD_TIME);
			$this->GetSearchParm($t_congty->C_USER_EDIT);
			$this->GetSearchParm($t_congty->C_EDIT_TIME);
			$this->GetSearchParm($t_congty->C_REPORT_STATUS);
			$this->GetSearchParm($t_congty->C_TYPE_TEMPLATE);
			$this->GetSearchParm($t_congty->C_PARRENT);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_congty;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_congty->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_congty->CurrentOrderType = @$_GET["ordertype"];
			$t_congty->UpdateSort($t_congty->FK_NGANH_ID, $bCtrl); // FK_NGANH_ID
			$t_congty->UpdateSort($t_congty->C_TENCONGTY, $bCtrl); // C_TENCONGTY
			$t_congty->UpdateSort($t_congty->C_TYPE_TEMPLATE, $bCtrl); // C_TYPE_TEMPLATE
			$t_congty->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_congty;
		$sOrderBy = $t_congty->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_congty->SqlOrderBy() <> "") {
				$sOrderBy = $t_congty->SqlOrderBy();
				$t_congty->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_congty;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_congty->setSessionOrderBy($sOrderBy);
				$t_congty->FK_NGANH_ID->setSort("");
				$t_congty->C_TENCONGTY->setSort("");
				$t_congty->C_TYPE_TEMPLATE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_congty->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_congty;

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
                
                // "subcompany"
		$this->ListOptions->Add("subcompany");
		$item =& $this->ListOptions->Items["subcompany"];
		$item->CssStyle = "white-space: nowrap;width: 25px;";
		$item->Visible = $Security->CanAdd();
		$item->OnLeft = TRUE;
                
                // "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_ghichu_lich_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_congty->Export <> "" ||
			$t_congty->CurrentAction == "gridadd" ||
			$t_congty->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_congty;
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
                
                 // "subcompany"
		$oListOpt =& $this->ListOptions->Items["subcompany"];
		if ($Security->CanAdd() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . "t_congtylist.php?parrentcompanyid=" . $t_congty->PK_MACONGTY->CurrentValue . "\">" . $Language->Phrase("subcompany") . "</a>";
		}
	        
		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_congty->PK_MACONGTY->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_congty;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_congty;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_congty->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_congty->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_congty->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_congty->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_congty->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_congty->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_congty;
		$t_congty->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_congty->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_congty;

		// Load search values
		// PK_MACONGTY

		$t_congty->PK_MACONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_MACONGTY"]);
		$t_congty->PK_MACONGTY->AdvancedSearch->SearchOperator = @$_GET["z_PK_MACONGTY"];

		// FK_NGANH_ID
		$t_congty->FK_NGANH_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_NGANH_ID"]);
		$t_congty->FK_NGANH_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_NGANH_ID"];

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TENCONGTY"]);
		$t_congty->C_TENCONGTY->AdvancedSearch->SearchOperator = @$_GET["z_C_TENCONGTY"];

		// C_TENVIETTAT
		$t_congty->C_TENVIETTAT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TENVIETTAT"]);
		$t_congty->C_TENVIETTAT->AdvancedSearch->SearchOperator = @$_GET["z_C_TENVIETTAT"];

		// C_WEBSITE
		$t_congty->C_WEBSITE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_WEBSITE"]);
		$t_congty->C_WEBSITE->AdvancedSearch->SearchOperator = @$_GET["z_C_WEBSITE"];

		// C_DIACHI
		$t_congty->C_DIACHI->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DIACHI"]);
		$t_congty->C_DIACHI->AdvancedSearch->SearchOperator = @$_GET["z_C_DIACHI"];

		// C_DIENTHOAI
		$t_congty->C_DIENTHOAI->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_DIENTHOAI"]);
		$t_congty->C_DIENTHOAI->AdvancedSearch->SearchOperator = @$_GET["z_C_DIENTHOAI"];

		// C_FAX
		$t_congty->C_FAX->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_FAX"]);
		$t_congty->C_FAX->AdvancedSearch->SearchOperator = @$_GET["z_C_FAX"];

		// C_EMAIL
		$t_congty->C_EMAIL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EMAIL"]);
		$t_congty->C_EMAIL->AdvancedSearch->SearchOperator = @$_GET["z_C_EMAIL"];

		// C_MOTA
		$t_congty->C_MOTA->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_MOTA"]);
		$t_congty->C_MOTA->AdvancedSearch->SearchOperator = @$_GET["z_C_MOTA"];

		// C_USER_ADD
		$t_congty->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_congty->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_congty->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_congty->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_congty->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_congty->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_congty->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_congty->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];

		// C_REPORT_STATUS
		$t_congty->C_REPORT_STATUS->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_REPORT_STATUS"]);
		$t_congty->C_REPORT_STATUS->AdvancedSearch->SearchOperator = @$_GET["z_C_REPORT_STATUS"];

		// C_TYPE_TEMPLATE
		$t_congty->C_TYPE_TEMPLATE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TYPE_TEMPLATE"]);
		$t_congty->C_TYPE_TEMPLATE->AdvancedSearch->SearchOperator = @$_GET["z_C_TYPE_TEMPLATE"];

		// C_PARRENT
		$t_congty->C_PARRENT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PARRENT"]);
		$t_congty->C_PARRENT->AdvancedSearch->SearchOperator = @$_GET["z_C_PARRENT"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_congty;

		// Call Recordset Selecting event
		$t_congty->Recordset_Selecting($t_congty->CurrentFilter);

		// Load List page SQL
		$sSql = $t_congty->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
               
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_congty->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_congty;
		$sFilter = $t_congty->KeyFilter();

		// Call Row Selecting event
		$t_congty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_congty->CurrentFilter = $sFilter;
		$sSql = $t_congty->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_congty->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_congty;
		$t_congty->PK_MACONGTY->setDbValue($rs->fields('PK_MACONGTY'));
		$t_congty->FK_NGANH_ID->setDbValue($rs->fields('FK_NGANH_ID'));
		$t_congty->C_TENCONGTY->setDbValue($rs->fields('C_TENCONGTY'));
		$t_congty->C_TENVIETTAT->setDbValue($rs->fields('C_TENVIETTAT'));
		$t_congty->C_LOGO->Upload->DbValue = $rs->fields('C_LOGO');
		$t_congty->C_WEBSITE->setDbValue($rs->fields('C_WEBSITE'));
		$t_congty->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$t_congty->C_DIENTHOAI->setDbValue($rs->fields('C_DIENTHOAI'));
		$t_congty->C_FAX->setDbValue($rs->fields('C_FAX'));
		$t_congty->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_congty->C_MOTA->setDbValue($rs->fields('C_MOTA'));
		$t_congty->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_congty->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_congty->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_congty->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_congty->C_REPORT_STATUS->setDbValue($rs->fields('C_REPORT_STATUS'));
		$t_congty->C_TYPE_TEMPLATE->setDbValue($rs->fields('C_TYPE_TEMPLATE'));
		$t_congty->C_PARRENT->setDbValue($rs->fields('C_PARRENT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_congty;

		// Initialize URLs
		$this->ViewUrl = $t_congty->ViewUrl();
		$this->EditUrl = $t_congty->EditUrl();
		$this->InlineEditUrl = $t_congty->InlineEditUrl();
		$this->CopyUrl = $t_congty->CopyUrl();
		$this->InlineCopyUrl = $t_congty->InlineCopyUrl();
		$this->DeleteUrl = $t_congty->DeleteUrl();

		// Call Row_Rendering event
		$t_congty->Row_Rendering();

		// Common render codes for all row types
		// FK_NGANH_ID

		$t_congty->FK_NGANH_ID->CellCssStyle = ""; $t_congty->FK_NGANH_ID->CellCssClass = "";
		$t_congty->FK_NGANH_ID->CellAttrs = array(); $t_congty->FK_NGANH_ID->ViewAttrs = array(); $t_congty->FK_NGANH_ID->EditAttrs = array();

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->CellCssStyle = ""; $t_congty->C_TENCONGTY->CellCssClass = "";
		$t_congty->C_TENCONGTY->CellAttrs = array(); $t_congty->C_TENCONGTY->ViewAttrs = array(); $t_congty->C_TENCONGTY->EditAttrs = array();

		// C_TYPE_TEMPLATE
		$t_congty->C_TYPE_TEMPLATE->CellCssStyle = ""; $t_congty->C_TYPE_TEMPLATE->CellCssClass = "";
		$t_congty->C_TYPE_TEMPLATE->CellAttrs = array(); $t_congty->C_TYPE_TEMPLATE->ViewAttrs = array(); $t_congty->C_TYPE_TEMPLATE->EditAttrs = array();
		if ($t_congty->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_NGANH_ID
			if (strval($t_congty->FK_NGANH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGANH_ID` = " . ew_AdjustSql($t_congty->FK_NGANH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENNGANH` FROM `t_nganhnghe`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_congty->FK_NGANH_ID->ViewValue = $rswrk->fields('C_TENNGANH');
					$rswrk->Close();
				} else {
					$t_congty->FK_NGANH_ID->ViewValue = $t_congty->FK_NGANH_ID->CurrentValue;
				}
			} else {
				$t_congty->FK_NGANH_ID->ViewValue = NULL;
			}
			$t_congty->FK_NGANH_ID->CssStyle = "";
			$t_congty->FK_NGANH_ID->CssClass = "";
			$t_congty->FK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->ViewValue = $t_congty->C_TENCONGTY->CurrentValue;
			$t_congty->C_TENCONGTY->CssStyle = "";
			$t_congty->C_TENCONGTY->CssClass = "";
			$t_congty->C_TENCONGTY->ViewCustomAttributes = "";

			// C_REPORT_STATUS
			if (strval($t_congty->C_REPORT_STATUS->CurrentValue) <> "") {
				switch ($t_congty->C_REPORT_STATUS->CurrentValue) {
					case "1":
						$t_congty->C_REPORT_STATUS->ViewValue = "Lay du lieu tong hop";
						break;
					case "2":
						$t_congty->C_REPORT_STATUS->ViewValue = "Khong lay du lieu tong hop";
						break;
					default:
						$t_congty->C_REPORT_STATUS->ViewValue = $t_congty->C_REPORT_STATUS->CurrentValue;
				}
			} else {
				$t_congty->C_REPORT_STATUS->ViewValue = NULL;
			}
			$t_congty->C_REPORT_STATUS->CssStyle = "";
			$t_congty->C_REPORT_STATUS->CssClass = "";
			$t_congty->C_REPORT_STATUS->ViewCustomAttributes = "";

			// C_TYPE_TEMPLATE
			if (strval($t_congty->C_TYPE_TEMPLATE->CurrentValue) <> "") {
				switch ($t_congty->C_TYPE_TEMPLATE->CurrentValue) {
					case "1":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 1";
						break;
					case "2":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 2";
						break;
					case "3":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 3";
						break;
					case "4":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 4";
						break;
					case "5":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 5";
						break;
					case "6":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 6";
						break;
					case "7":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 7";
						break;
					case "8":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 8";
						break;
					default:
						$t_congty->C_TYPE_TEMPLATE->ViewValue = $t_congty->C_TYPE_TEMPLATE->CurrentValue;
				}
			} else {
				$t_congty->C_TYPE_TEMPLATE->ViewValue = NULL;
			}
			$t_congty->C_TYPE_TEMPLATE->CssStyle = "";
			$t_congty->C_TYPE_TEMPLATE->CssClass = "";
			$t_congty->C_TYPE_TEMPLATE->ViewCustomAttributes = "";

			// FK_NGANH_ID
			$t_congty->FK_NGANH_ID->HrefValue = "";
			$t_congty->FK_NGANH_ID->TooltipValue = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->HrefValue = "";
			$t_congty->C_TENCONGTY->TooltipValue = "";

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->HrefValue = "";
			$t_congty->C_TYPE_TEMPLATE->TooltipValue = "";
		} elseif ($t_congty->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_NGANH_ID
			$t_congty->FK_NGANH_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_NGANH_ID`, `C_TENNGANH`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_nganhnghe`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_congty->FK_NGANH_ID->EditValue = $arwrk;

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->EditCustomAttributes = "";
			$t_congty->C_TENCONGTY->EditValue = ew_HtmlEncode($t_congty->C_TENCONGTY->AdvancedSearch->SearchValue);

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Mau 1");
			$arwrk[] = array("2", "Mau 2");
			$arwrk[] = array("3", "Mau 3");
			$arwrk[] = array("4", "Mau 4");
			$arwrk[] = array("5", "Mau 5");
			$arwrk[] = array("6", "Mau 6");
			$arwrk[] = array("7", "Mau 7");
			$arwrk[] = array("8", "Mau 8");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_congty->C_TYPE_TEMPLATE->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_congty->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_congty->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_congty;

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
		global $t_congty;
		$t_congty->PK_MACONGTY->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_PK_MACONGTY");
		$t_congty->FK_NGANH_ID->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_FK_NGANH_ID");
		$t_congty->C_TENCONGTY->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_TENCONGTY");
		$t_congty->C_TENVIETTAT->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_TENVIETTAT");
		$t_congty->C_WEBSITE->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_WEBSITE");
		$t_congty->C_DIACHI->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_DIACHI");
		$t_congty->C_DIENTHOAI->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_DIENTHOAI");
		$t_congty->C_FAX->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_FAX");
		$t_congty->C_EMAIL->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_EMAIL");
		$t_congty->C_MOTA->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_MOTA");
		$t_congty->C_USER_ADD->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_USER_ADD");
		$t_congty->C_ADD_TIME->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_ADD_TIME");
		$t_congty->C_USER_EDIT->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_USER_EDIT");
		$t_congty->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_EDIT_TIME");
		$t_congty->C_REPORT_STATUS->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_REPORT_STATUS");
		$t_congty->C_TYPE_TEMPLATE->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_TYPE_TEMPLATE");
		$t_congty->C_PARRENT->AdvancedSearch->SearchValue = $t_congty->getAdvancedSearch("x_C_PARRENT");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_congty;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_congty->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_congty->ExportAll) {
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
		if ($t_congty->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_congty, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_congty->FK_NGANH_ID);
				$ExportDoc->ExportCaption($t_congty->C_TENCONGTY);
				$ExportDoc->ExportCaption($t_congty->C_REPORT_STATUS);
				$ExportDoc->ExportCaption($t_congty->C_TYPE_TEMPLATE);
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
				$t_congty->CssClass = "";
				$t_congty->CssStyle = "";
				$t_congty->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_congty->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('FK_NGANH_ID', $t_congty->FK_NGANH_ID->ExportValue($t_congty->Export, $t_congty->ExportOriginalValue));
					$XmlDoc->AddField('C_TENCONGTY', $t_congty->C_TENCONGTY->ExportValue($t_congty->Export, $t_congty->ExportOriginalValue));
					$XmlDoc->AddField('C_REPORT_STATUS', $t_congty->C_REPORT_STATUS->ExportValue($t_congty->Export, $t_congty->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE_TEMPLATE', $t_congty->C_TYPE_TEMPLATE->ExportValue($t_congty->Export, $t_congty->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_congty->FK_NGANH_ID);
					$ExportDoc->ExportField($t_congty->C_TENCONGTY);
					$ExportDoc->ExportField($t_congty->C_REPORT_STATUS);
					$ExportDoc->ExportField($t_congty->C_TYPE_TEMPLATE);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_congty->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_congty->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_congty->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_congty->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_congty->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_congty;
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
		if ($t_congty->Email_Sending($Email, $EventArgs))
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
		global $t_congty;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_congty->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_congty->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_congty->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_congty->PK_MACONGTY); // PK_MACONGTY
		$this->AddSearchQueryString($sQry, $t_congty->FK_NGANH_ID); // FK_NGANH_ID
		$this->AddSearchQueryString($sQry, $t_congty->C_TENCONGTY); // C_TENCONGTY
		$this->AddSearchQueryString($sQry, $t_congty->C_TENVIETTAT); // C_TENVIETTAT
		$this->AddSearchQueryString($sQry, $t_congty->C_WEBSITE); // C_WEBSITE
		$this->AddSearchQueryString($sQry, $t_congty->C_DIACHI); // C_DIACHI
		$this->AddSearchQueryString($sQry, $t_congty->C_DIENTHOAI); // C_DIENTHOAI
		$this->AddSearchQueryString($sQry, $t_congty->C_FAX); // C_FAX
		$this->AddSearchQueryString($sQry, $t_congty->C_EMAIL); // C_EMAIL
		$this->AddSearchQueryString($sQry, $t_congty->C_MOTA); // C_MOTA
		$this->AddSearchQueryString($sQry, $t_congty->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_congty->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_congty->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_congty->C_EDIT_TIME); // C_EDIT_TIME
		$this->AddSearchQueryString($sQry, $t_congty->C_REPORT_STATUS); // C_REPORT_STATUS
		$this->AddSearchQueryString($sQry, $t_congty->C_TYPE_TEMPLATE); // C_TYPE_TEMPLATE
		$this->AddSearchQueryString($sQry, $t_congty->C_PARRENT); // C_PARRENT

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_congty->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_congty->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_congty;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_congty->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_congty->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_congty->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_congty->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_congty->GetAdvancedSearch("w_" . $FldParm);
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
