<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_nganhngheinfo.php" ?>
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
$t_nganhnghe_list = new ct_nganhnghe_list();
$Page =& $t_nganhnghe_list;

// Page init
$t_nganhnghe_list->Page_Init();

// Page main
$t_nganhnghe_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_nganhnghe->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_nganhnghe_list = new ew_Page("t_nganhnghe_list");

// page properties
t_nganhnghe_list.PageID = "list"; // page ID
t_nganhnghe_list.FormID = "ft_nganhnghelist"; // form ID
var EW_PAGE_ID = t_nganhnghe_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_nganhnghe_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
t_nganhnghe_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_nganhnghe_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_nganhnghe_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_nganhnghe->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_nganhnghe_list->lTotalRecs = $t_nganhnghe->SelectRecordCount();
	} else {
		if ($rs = $t_nganhnghe_list->LoadRecordset())
			$t_nganhnghe_list->lTotalRecs = $rs->RecordCount();
	}
	$t_nganhnghe_list->lStartRec = 1;
	if ($t_nganhnghe_list->lDisplayRecs <= 0 || ($t_nganhnghe->Export <> "" && $t_nganhnghe->ExportAll)) // Display all records
		$t_nganhnghe_list->lDisplayRecs = $t_nganhnghe_list->lTotalRecs;
	if (!($t_nganhnghe->Export <> "" && $t_nganhnghe->ExportAll))
		$t_nganhnghe_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_nganhnghe_list->LoadRecordset($t_nganhnghe_list->lStartRec-1, $t_nganhnghe_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_nganhnghe->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
                                                                    <span class="phpmaker" style="white-space: nowrap;">
                                                                    <?php if ($t_nganhnghe->Export == "" && $t_nganhnghe->CurrentAction == "") { ?>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
                                                                    &nbsp;<a href="<?php echo $t_nganhnghe_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
                                                                    &nbsp;<a name="emf_t_nganhnghe" id="emf_t_nganhnghe" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_nganhnghe',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_nganhnghelist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
                                                                    <?php } ?>
                                                                    </span>             
                                                                </td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($Security->CanSearch()) { ?>
<?php if ($t_nganhnghe->Export == "" && $t_nganhnghe->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_nganhnghe_list);" style="text-decoration: none;"><img id="t_nganhnghe_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_nganhnghe_list_SearchPanel">
<form name="ft_nganhnghelistsrch" id="ft_nganhnghelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
    <input type="hidden" id="t" name="parentnganhnghe_ID" value="<?php echo @$_SESSION['parentPK_NGANH_ID'];?>">
    <input type="hidden" id="t" name="t" value="t_nganhnghe">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_nganhnghe->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_nganhnghe->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_nganhnghe->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_nganhnghe->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php
//* BY QUANG HUNG//
if (isset($_SESSION['parentPK_NGANH_ID']) || $_SESSION['parentPK_NGANH_ID'] <>'')
{
        $conn = ew_Connect();
	$sSqlWrk = "Select C_TENNGANH from t_nganhnghe where PK_NGANH_ID =".  $_SESSION['parentPK_NGANH_ID'];

	$rswrk = $conn->Execute($sSqlWrk);
	$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
	if ($rswrk) $rswrk->Close();

?><br>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0"">
							<tr>
								<td height="10" width="80%%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								 Danh sách ngành nghề con : <?php echo $arwrk[0][0] ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="t_nganhnghelist.php?cmd=reset"><?php echo $Language->Phrase("GoBack") ?></a><br>
<?php }
//* END *//
?>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_nganhnghe_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_nganhnghe->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_nganhnghe->CurrentAction <> "gridadd" && $t_nganhnghe->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_nganhnghe_list->Pager)) $t_nganhnghe_list->Pager = new cNumericPager($t_nganhnghe_list->lStartRec, $t_nganhnghe_list->lDisplayRecs, $t_nganhnghe_list->lTotalRecs, $t_nganhnghe_list->lRecRange) ?>
<?php if ($t_nganhnghe_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_nganhnghe_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_nganhnghe_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_nganhnghe_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_nganhnghe">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_nganhnghe_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_nganhnghe_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_nganhnghe_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_nganhnghe->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_nganhnghe_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_nganhnghelist, '<?php echo $t_nganhnghe_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_nganhnghelist" id="ft_nganhnghelist" class="ewForm" action="" method="post">
<div id="gmp_t_nganhnghe" class="ewGridMiddlePanel">
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_nganhnghe->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_nganhnghe_list->RenderListOptions();

// Render list options (header, left)
$t_nganhnghe_list->ListOptions->Render("header", "left");
?>
<?php if ($t_nganhnghe->C_TENNGANH->Visible) { // C_TENNGANH ?>
	<?php if ($t_nganhnghe->SortUrl($t_nganhnghe->C_TENNGANH) == "") { ?>
		<td><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_nganhnghe->C_TENNGANH->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_nganhnghe->C_TENNGANH->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php if ($t_nganhnghe->C_TRANGTHAI->Visible) { // C_TRANGTHAI ?>
	<?php if ($t_nganhnghe->SortUrl($t_nganhnghe->C_TRANGTHAI) == "") { ?>
		<td><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_nganhnghe->C_TRANGTHAI->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_nganhnghe->C_TRANGTHAI->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t_nganhnghe_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_nganhnghe->ExportAll && $t_nganhnghe->Export <> "") {
	$t_nganhnghe_list->lStopRec = $t_nganhnghe_list->lTotalRecs;
} else {
	$t_nganhnghe_list->lStopRec = $t_nganhnghe_list->lStartRec + $t_nganhnghe_list->lDisplayRecs - 1; // Set the last record to display
}
$t_nganhnghe_list->lRecCount = $t_nganhnghe_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_nganhnghe_list->lStartRec > 1)
		$rs->Move($t_nganhnghe_list->lStartRec - 1);
}

// Initialize aggregate
$t_nganhnghe->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_nganhnghe_list->RenderRow();
$t_nganhnghe_list->lRowCnt = 0;
while (($t_nganhnghe->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_nganhnghe_list->lRecCount < $t_nganhnghe_list->lStopRec) {
	$t_nganhnghe_list->lRecCount++;
	if (intval($t_nganhnghe_list->lRecCount) >= intval($t_nganhnghe_list->lStartRec)) {
		$t_nganhnghe_list->lRowCnt++;

	// Init row class and style
	$t_nganhnghe->CssClass = "";
	$t_nganhnghe->CssStyle = "";
	$t_nganhnghe->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_nganhnghe->CurrentAction == "gridadd") {
		$t_nganhnghe_list->LoadDefaultValues(); // Load default values
	} else {
		$t_nganhnghe_list->LoadRowValues($rs); // Load row values
	}
	$t_nganhnghe->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_nganhnghe_list->RenderRow();

	// Render list options
	$t_nganhnghe_list->RenderListOptions();
?>
	<tr<?php echo $t_nganhnghe->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_nganhnghe_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_nganhnghe->C_TENNGANH->Visible) { // C_TENNGANH ?>
		<td<?php echo $t_nganhnghe->C_TENNGANH->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TENNGANH->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TENNGANH->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_nganhnghe->C_TRANGTHAI->Visible) { // C_TRANGTHAI ?>
		<td<?php echo $t_nganhnghe->C_TRANGTHAI->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TRANGTHAI->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TRANGTHAI->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_nganhnghe_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_nganhnghe->CurrentAction <> "gridadd")
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
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
<?php if ($t_nganhnghe->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_nganhnghe->CurrentAction <> "gridadd" && $t_nganhnghe->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_nganhnghe_list->Pager)) $t_nganhnghe_list->Pager = new cNumericPager($t_nganhnghe_list->lStartRec, $t_nganhnghe_list->lDisplayRecs, $t_nganhnghe_list->lTotalRecs, $t_nganhnghe_list->lRecRange) ?>
<?php if ($t_nganhnghe_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_nganhnghe_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_nganhnghe_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_nganhnghe_list->PageUrl() ?>start=<?php echo $t_nganhnghe_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_nganhnghe_list->Pager->ButtonCount > 0) { ?>&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_nganhnghe_list->Pager->RecordCount ?>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_nganhnghe_list->sSrchWhere == "0=101") { ?>
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
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
		<td>&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td><?php echo $Language->Phrase("RecordsPerPage") ?>&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_nganhnghe">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_nganhnghe_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_nganhnghe_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($t_nganhnghe_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_nganhnghe->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_nganhnghe_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_nganhnghe_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_nganhnghelist, '<?php echo $t_nganhnghe_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_nganhnghe->Export == "" && $t_nganhnghe->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_nganhnghe->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--
ew_ToggleSearchPanel(t_nganhnghe_list);
// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_nganhnghe_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_nganhnghe_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_nganhnghe';

	// Page object name
	var $PageObjName = 't_nganhnghe_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $t_nganhnghe->TableVar . "&"; // Add page token
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
		global $objForm, $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) {
			if ($objForm)
				return ($t_nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_nganhnghe_list()
        {
                global $conn, $Language,$parentPK_NGANH_ID;
                //*BY QUANG HUNG */
                @$_SESSION['parentPK_NGANH_ID']=$_GET['parentnganhnghe_ID'];

               // echo $parentPK_NGANH_ID;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nganhnghe)
		$GLOBALS["t_nganhnghe"] = new ct_nganhnghe();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_nganhnghe"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_nganhnghedelete.php";
		$this->MultiUpdateUrl = "t_nganhngheupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_nganhnghe', TRUE);

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
		global $t_nganhnghe;

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
			$t_nganhnghe->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_nganhnghe->Export = $_POST["exporttype"];
		} else {
			$t_nganhnghe->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_nganhnghe->Export; // Get export parameter, used in header
		$gsExportFile = $t_nganhnghe->TableVar; // Get export file, used in header
		if ($t_nganhnghe->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_nganhnghe->Export == "word") {
			header('Content-Type: application/vnd.ms-word');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_nganhnghe->Export == "xml") {
			header('Content-Type: text/xml');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_nganhnghe->Export == "csv") {
			header('Content-Type: application/csv');
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
	var $lDisplayRecs = 10;
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
		global $objForm, $Language, $gsSearchError, $Security, $t_nganhnghe;

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

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$t_nganhnghe->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($t_nganhnghe->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_nganhnghe->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 10; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchAdvanced . ")" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchBasic. ")" : $sSrchBasic;

		// Call Recordset_Searching event
		$t_nganhnghe->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$t_nganhnghe->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_nganhnghe->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_nganhnghe->getSearchWhere();
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
		$t_nganhnghe->setSessionWhere($sFilter);
		$t_nganhnghe->CurrentFilter = "";

		// Export data only
		if (in_array($t_nganhnghe->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_nganhnghe->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_nganhnghe;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 10; // Non-numeric, load default
				}
			}
			$t_nganhnghe->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $t_nganhnghe;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_nganhnghe->C_TENNGANH, $Keyword);
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
		global $Security, $t_nganhnghe;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_nganhnghe->BasicSearchKeyword;
		$sSearchType = $t_nganhnghe->BasicSearchType;
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
			$t_nganhnghe->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_nganhnghe->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_nganhnghe;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_nganhnghe->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_nganhnghe;
		$t_nganhnghe->setSessionBasicSearchKeyword("");
		$t_nganhnghe->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_nganhnghe;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_nganhnghe->BasicSearchKeyword = $t_nganhnghe->getSessionBasicSearchKeyword();
			$t_nganhnghe->BasicSearchType = $t_nganhnghe->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_nganhnghe;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_nganhnghe->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_nganhnghe->CurrentOrderType = @$_GET["ordertype"];
			$t_nganhnghe->UpdateSort($t_nganhnghe->C_TENNGANH); // C_TENNGANH
			$t_nganhnghe->UpdateSort($t_nganhnghe->C_TRANGTHAI); // C_TRANGTHAI
			$t_nganhnghe->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_nganhnghe;
		$sOrderBy = $t_nganhnghe->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_nganhnghe->SqlOrderBy() <> "") {
				$sOrderBy = $t_nganhnghe->SqlOrderBy();
				$t_nganhnghe->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_nganhnghe;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_nganhnghe->setSessionOrderBy($sOrderBy);
				$t_nganhnghe->C_TENNGANH->setSort("");
				$t_nganhnghe->C_TRANGTHAI->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_nganhnghe;

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
		$item->CssStyle = "white-space: nowrap;width:25px;";
		$item->Visible = $Security->CanAdd();
		$item->OnLeft = TRUE;

                // "detail_t_nganhnghe"
//                if (isset($_SESSION['parentPK_NGANH_ID']) || $_SESSION['parentPK_NGANH_ID'] <>'')
//                {
//		$this->ListOptions->Add("detail_t_nganhnghe");
//		$item =& $this->ListOptions->Items["detail_t_nganhnghe"];
//		$item->CssStyle = "white-space: nowrap;width:10px;";
//		$item->Visible = false;
//		$item->OnLeft = TRUE;
//                }
//                else {
//                 $this->ListOptions->Add("detail_t_nganhnghe");
//		$item =& $this->ListOptions->Items["detail_t_nganhnghe"];
//		$item->CssStyle = "white-space: nowrap;width:10px;";
//		$item->Visible = $Security->AllowList('t_nganhnghe');
//		$item->OnLeft = TRUE;
//                  }
		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_nganhnghe_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_nganhnghe->Export <> "" ||
			$t_nganhnghe->CurrentAction == "gridadd" ||
			$t_nganhnghe->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_nganhnghe;
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
                // "detail_t_nganhnghe"
//		$oListOpt =& $this->ListOptions->Items["detail_t_nganhnghe"];
//		if ($Security->AllowList('t_nganhnghe'))
//                 {
//                    // * BY QUANGHUNG
//                    if (isset($_SESSION['parentPK_NGANH_ID']) || $_SESSION['parentPK_NGANH_ID'] <>'')
//			{
//                        $oListOpt->Body = "";
//			//$oListOpt->Body = "<a href=\"t_nganhnghelist.php?parentnganhnghe_ID=" . urlencode(strval($t_nganhnghe->PK_NGANH_ID->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
//                        }
//                       else
//                       {
//                        $oListOpt->Body = $Language->Phrase("detail_t_nganhnghe") . $Language->TablePhrase("t_nganhnghe", "");
//			$oListOpt->Body = "<a href=\"t_nganhnghelist.php?parentnganhnghe_ID=" . urlencode(strval($t_nganhnghe->PK_NGANH_ID->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
//                       }
//                      //* END
//		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_nganhnghe->PK_NGANH_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_nganhnghe;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_nganhnghe;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_nganhnghe->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_nganhnghe->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_nganhnghe->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_nganhnghe;
		$t_nganhnghe->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_nganhnghe->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_nganhnghe;

		// Call Recordset Selecting event
		$t_nganhnghe->Recordset_Selecting($t_nganhnghe->CurrentFilter);

		// Load List page SQL
		$sSql = $t_nganhnghe->SelectSQL();

               // echo $sSql;
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_nganhnghe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_nganhnghe;
		$sFilter = $t_nganhnghe->KeyFilter();

		// Call Row Selecting event
		$t_nganhnghe->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_nganhnghe->CurrentFilter = $sFilter;
		$sSql = $t_nganhnghe->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_nganhnghe->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_nganhnghe;
		$t_nganhnghe->PK_NGANH_ID->setDbValue($rs->fields('PK_NGANH_ID'));
		$t_nganhnghe->C_TENNGANH->setDbValue($rs->fields('C_TENNGANH'));
		$t_nganhnghe->C_TRANGTHAI->setDbValue($rs->fields('C_TRANGTHAI'));
		$t_nganhnghe->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_nganhnghe->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_nganhnghe->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_nganhnghe->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_nganhnghe->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_nganhnghe;

		// Initialize URLs
		$this->ViewUrl = $t_nganhnghe->ViewUrl();
		$this->EditUrl = $t_nganhnghe->EditUrl();
		$this->InlineEditUrl = $t_nganhnghe->InlineEditUrl();
		$this->CopyUrl = $t_nganhnghe->CopyUrl();
		$this->InlineCopyUrl = $t_nganhnghe->InlineCopyUrl();
		$this->DeleteUrl = $t_nganhnghe->DeleteUrl();

		// Call Row_Rendering event
		$t_nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// C_TENNGANH

		$t_nganhnghe->C_TENNGANH->CellCssStyle = ""; $t_nganhnghe->C_TENNGANH->CellCssClass = "";
		$t_nganhnghe->C_TENNGANH->CellAttrs = array(); $t_nganhnghe->C_TENNGANH->ViewAttrs = array(); $t_nganhnghe->C_TENNGANH->EditAttrs = array();

		// C_TRANGTHAI
		$t_nganhnghe->C_TRANGTHAI->CellCssStyle = ""; $t_nganhnghe->C_TRANGTHAI->CellCssClass = "";
		$t_nganhnghe->C_TRANGTHAI->CellAttrs = array(); $t_nganhnghe->C_TRANGTHAI->ViewAttrs = array(); $t_nganhnghe->C_TRANGTHAI->EditAttrs = array();
		if ($t_nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGANH_ID
			$t_nganhnghe->PK_NGANH_ID->ViewValue = $t_nganhnghe->PK_NGANH_ID->CurrentValue;
			$t_nganhnghe->PK_NGANH_ID->CssStyle = "";
			$t_nganhnghe->PK_NGANH_ID->CssClass = "";
			$t_nganhnghe->PK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->ViewValue = $t_nganhnghe->C_TENNGANH->CurrentValue;
			$t_nganhnghe->C_TENNGANH->CssStyle = "";
			$t_nganhnghe->C_TENNGANH->CssClass = "";
			$t_nganhnghe->C_TENNGANH->ViewCustomAttributes = "";

			// C_TRANGTHAI
			if (strval($t_nganhnghe->C_TRANGTHAI->CurrentValue) <> "") {
				switch ($t_nganhnghe->C_TRANGTHAI->CurrentValue) {
					case "1":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Hiển thị";
						break;
					case "0":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Chưa hiển thị";
						break;
					default:
						$t_nganhnghe->C_TRANGTHAI->ViewValue = $t_nganhnghe->C_TRANGTHAI->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_TRANGTHAI->ViewValue = NULL;
			}
			$t_nganhnghe->C_TRANGTHAI->CssStyle = "";
			$t_nganhnghe->C_TRANGTHAI->CssClass = "";
			$t_nganhnghe->C_TRANGTHAI->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->ViewValue = $t_nganhnghe->C_BELONGTO->CurrentValue;
			$t_nganhnghe->C_BELONGTO->CssStyle = "";
			$t_nganhnghe->C_BELONGTO->CssClass = "";
			$t_nganhnghe->C_BELONGTO->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
			if (strval($t_nganhnghe->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_ADD->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_ADD->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_ADD->CssStyle = "";
			$t_nganhnghe->C_USER_ADD->CssClass = "";
			$t_nganhnghe->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->ViewValue = $t_nganhnghe->C_ADD_TIME->CurrentValue;
			$t_nganhnghe->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_ADD_TIME->ViewValue, 7);
			$t_nganhnghe->C_ADD_TIME->CssStyle = "";
			$t_nganhnghe->C_ADD_TIME->CssClass = "";
			$t_nganhnghe->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
			if (strval($t_nganhnghe->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_EDIT->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_EDIT->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_EDIT->CssStyle = "";
			$t_nganhnghe->C_USER_EDIT->CssClass = "";
			$t_nganhnghe->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->ViewValue = $t_nganhnghe->C_EDIT_TIME->CurrentValue;
			$t_nganhnghe->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_EDIT_TIME->ViewValue, 7);
			$t_nganhnghe->C_EDIT_TIME->CssStyle = "";
			$t_nganhnghe->C_EDIT_TIME->CssClass = "";
			$t_nganhnghe->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->HrefValue = "";
			$t_nganhnghe->C_TENNGANH->TooltipValue = "";

			// C_TRANGTHAI
			$t_nganhnghe->C_TRANGTHAI->HrefValue = "";
			$t_nganhnghe->C_TRANGTHAI->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_nganhnghe->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_nganhnghe->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_nganhnghe;
		$utf8 = FALSE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_nganhnghe->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_nganhnghe->ExportAll) {
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
		if ($t_nganhnghe->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_nganhnghe, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_nganhnghe->PK_NGANH_ID);
				$ExportDoc->ExportCaption($t_nganhnghe->C_TENNGANH);
				$ExportDoc->ExportCaption($t_nganhnghe->C_TRANGTHAI);
				$ExportDoc->ExportCaption($t_nganhnghe->C_BELONGTO);
				$ExportDoc->ExportCaption($t_nganhnghe->C_USER_ADD);
				$ExportDoc->ExportCaption($t_nganhnghe->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_nganhnghe->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_nganhnghe->C_EDIT_TIME);
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
				$t_nganhnghe->CssClass = "";
				$t_nganhnghe->CssStyle = "";
				$t_nganhnghe->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_nganhnghe->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGANH_ID', $t_nganhnghe->PK_NGANH_ID->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_TENNGANH', $t_nganhnghe->C_TENNGANH->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_TRANGTHAI', $t_nganhnghe->C_TRANGTHAI->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_BELONGTO', $t_nganhnghe->C_BELONGTO->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_nganhnghe->C_USER_ADD->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_nganhnghe->C_ADD_TIME->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_nganhnghe->C_USER_EDIT->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_nganhnghe->C_EDIT_TIME->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_nganhnghe->PK_NGANH_ID);
					$ExportDoc->ExportField($t_nganhnghe->C_TENNGANH);
					$ExportDoc->ExportField($t_nganhnghe->C_TRANGTHAI);
					$ExportDoc->ExportField($t_nganhnghe->C_BELONGTO);
					$ExportDoc->ExportField($t_nganhnghe->C_USER_ADD);
					$ExportDoc->ExportField($t_nganhnghe->C_ADD_TIME);
					$ExportDoc->ExportField($t_nganhnghe->C_USER_EDIT);
					$ExportDoc->ExportField($t_nganhnghe->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_nganhnghe->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_nganhnghe->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_nganhnghe->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_nganhnghe->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_nganhnghe->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_nganhnghe;
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
		if ($t_nganhnghe->Email_Sending($Email, $EventArgs))
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
		global $t_nganhnghe;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_nganhnghe->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_nganhnghe->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_nganhnghe->getSessionBasicSearchType();
		}

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_nganhnghe->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_nganhnghe->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_nganhnghe;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_nganhnghe->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_nganhnghe->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_nganhnghe->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_nganhnghe->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_nganhnghe->GetAdvancedSearch("w_" . $FldParm);
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
