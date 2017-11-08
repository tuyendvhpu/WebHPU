<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_svtuonglaiinfo.php" ?>
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
$t_doituong_svtuonglai_list = new ct_doituong_svtuonglai_list();
$Page =& $t_doituong_svtuonglai_list;

// Page init
$t_doituong_svtuonglai_list->Page_Init();

// Page main
$t_doituong_svtuonglai_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_doituong_svtuonglai->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_svtuonglai_list = new ew_Page("t_doituong_svtuonglai_list");

// page properties
t_doituong_svtuonglai_list.PageID = "list"; // page ID
t_doituong_svtuonglai_list.FormID = "ft_doituong_svtuonglailist"; // form ID
var EW_PAGE_ID = t_doituong_svtuonglai_list.PageID; // for backward compatibility

// extend page with validate function for search
t_doituong_svtuonglai_list.ValidateSearch = function(fobj) {
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
t_doituong_svtuonglai_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_svtuonglai_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_svtuonglai_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_svtuonglai_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_doituong_svtuonglai->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_doituong_svtuonglai_list->lTotalRecs = $t_doituong_svtuonglai->SelectRecordCount();
	} else {
		if ($rs = $t_doituong_svtuonglai_list->LoadRecordset())
			$t_doituong_svtuonglai_list->lTotalRecs = $rs->RecordCount();
	}
	$t_doituong_svtuonglai_list->lStartRec = 1;
	if ($t_doituong_svtuonglai_list->lDisplayRecs <= 0 || ($t_doituong_svtuonglai->Export <> "" && $t_doituong_svtuonglai->ExportAll)) // Display all records
		$t_doituong_svtuonglai_list->lDisplayRecs = $t_doituong_svtuonglai_list->lTotalRecs;
	if (!($t_doituong_svtuonglai->Export <> "" && $t_doituong_svtuonglai->ExportAll))
		$t_doituong_svtuonglai_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_doituong_svtuonglai_list->LoadRecordset($t_doituong_svtuonglai_list->lStartRec-1, $t_doituong_svtuonglai_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_doituong_svtuonglai->TableCaption() ?>
<?php if ($t_doituong_svtuonglai->Export == "" && $t_doituong_svtuonglai->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_svtuonglai_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_doituong_svtuonglai" id="emf_t_doituong_svtuonglai" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_doituong_svtuonglai',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_doituong_svtuonglailist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>

<?php if ($Security->CanSearch()) { ?>
<?php if ($t_doituong_svtuonglai->Export == "" && $t_doituong_svtuonglai->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_doituong_svtuonglai_list);" style="text-decoration: none;"><img id="t_doituong_svtuonglai_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_doituong_svtuonglai_list_SearchPanel">
<form name="ft_doituong_svtuonglailistsrch" id="ft_doituong_svtuonglailistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_doituong_svtuonglai_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_doituong_svtuonglai">
<input type="hidden" id="TL_BELONGTO_ID" name="TL_BELONGTO_ID" value="<?php  echo @$_SESSION['TL_BELONGTO_ID']?>">
<?php
if ($gsSearchError == "")
	$t_doituong_svtuonglai_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_doituong_svtuonglai->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_doituong_svtuonglai_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_doituong_svtuonglai->C_NAME->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_NAME" id="z_C_NAME" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_doituong_svtuonglai->C_NAME->FldTitle() ?>" size="65" maxlength="255" value="<?php echo $t_doituong_svtuonglai->C_NAME->EditValue ?>"<?php echo $t_doituong_svtuonglai->C_NAME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_doituong_svtuonglai->C_TYPE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_TYPE" id="z_C_TYPE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_svtuonglai->C_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_svtuonglai->C_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_svtuonglai->C_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_svtuonglai->C_TYPE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_svtuonglai->C_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_svtuonglai->C_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
		<td><span class="phpmaker"><?php echo $t_doituong_svtuonglai->C_ACTIVE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE" id="z_C_ACTIVE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_svtuonglai->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_svtuonglai->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_svtuonglai->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_svtuonglai->C_ACTIVE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_svtuonglai->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_svtuonglai->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="65" value="<?php echo ew_HtmlEncode($t_doituong_svtuonglai->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_doituong_svtuonglai->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_doituong_svtuonglai->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_doituong_svtuonglai->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_svtuonglai_list->ShowMessage();
?>
<?php
//* BY QUANG HUNG//
if (!isset($_SESSION['TL_BELONGTO_ID']) || $_SESSION['TL_BELONGTO_ID'] <>'')
{
        $conn = ew_Connect();
	$sSqlWrk = "Select C_NAME from t_doituong_svtuonglai where DTSVTUONGLAI_ID =".  $_SESSION['TL_BELONGTO_ID'];
	$rswrk = $conn->Execute($sSqlWrk);
	$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
	if ($rswrk) $rswrk->Close();

?><br>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0"">
							<tr>
								<td height="10" width="80%%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								 Danh sách chuyên mục con : <?php echo $arwrk[0][0] ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="t_doituong_svtuonglailist.php?cmd=reset"><?php echo $Language->Phrase("GoBack") ?></a>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_doituong_svtuonglai->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_doituong_svtuonglai->CurrentAction <> "gridadd" && $t_doituong_svtuonglai->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_doituong_svtuonglai_list->Pager)) $t_doituong_svtuonglai_list->Pager = new cNumericPager($t_doituong_svtuonglai_list->lStartRec, $t_doituong_svtuonglai_list->lDisplayRecs, $t_doituong_svtuonglai_list->lTotalRecs, $t_doituong_svtuonglai_list->lRecRange) ?>
<?php if ($t_doituong_svtuonglai_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_doituong_svtuonglai_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_doituong_svtuonglai_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_doituong_svtuonglai_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_doituong_svtuonglai_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_doituong_svtuonglailist, '<?php echo $t_doituong_svtuonglai_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_doituong_svtuonglailist" id="ft_doituong_svtuonglailist" class="ewForm" action="" method="post">
<div id="gmp_t_doituong_svtuonglai" class="ewGridMiddlePanel">
<?php if ($t_doituong_svtuonglai_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_doituong_svtuonglai->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_doituong_svtuonglai_list->RenderListOptions();

// Render list options (header, left)
$t_doituong_svtuonglai_list->ListOptions->Render("header", "left");
?>
<?php if ($t_doituong_svtuonglai->C_NAME->Visible) { // C_NAME ?>
	<?php if ($t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_NAME) == "") { ?>
		<td><?php echo $t_doituong_svtuonglai->C_NAME->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_NAME) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_doituong_svtuonglai->C_NAME->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_doituong_svtuonglai->C_NAME->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_doituong_svtuonglai->C_NAME->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_doituong_svtuonglai->C_BELONGTO->Visible) { // C_BELONGTO ?>
	<?php if ($t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_BELONGTO) == "") { ?>
		<td><?php echo $t_doituong_svtuonglai->C_BELONGTO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_BELONGTO) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_doituong_svtuonglai->C_BELONGTO->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_doituong_svtuonglai->C_BELONGTO->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_doituong_svtuonglai->C_BELONGTO->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_doituong_svtuonglai->C_TYPE->Visible) { // C_TYPE ?>
	<?php if ($t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_TYPE) == "") { ?>
		<td><?php echo $t_doituong_svtuonglai->C_TYPE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_TYPE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_doituong_svtuonglai->C_TYPE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_doituong_svtuonglai->C_TYPE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_doituong_svtuonglai->C_TYPE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_doituong_svtuonglai->C_URL->Visible) { // C_URL ?>
	<?php if ($t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_URL) == "") { ?>
		<td><?php echo $t_doituong_svtuonglai->C_URL->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_URL) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_doituong_svtuonglai->C_URL->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_doituong_svtuonglai->C_URL->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_doituong_svtuonglai->C_URL->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_doituong_svtuonglai->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_ACTIVE) == "") { ?>
		<td><?php echo $t_doituong_svtuonglai->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_doituong_svtuonglai->SortUrl($t_doituong_svtuonglai->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_doituong_svtuonglai->C_ACTIVE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_doituong_svtuonglai->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_doituong_svtuonglai->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_doituong_svtuonglai_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_doituong_svtuonglai->ExportAll && $t_doituong_svtuonglai->Export <> "") {
	$t_doituong_svtuonglai_list->lStopRec = $t_doituong_svtuonglai_list->lTotalRecs;
} else {
	$t_doituong_svtuonglai_list->lStopRec = $t_doituong_svtuonglai_list->lStartRec + $t_doituong_svtuonglai_list->lDisplayRecs - 1; // Set the last record to display
}
$t_doituong_svtuonglai_list->lRecCount = $t_doituong_svtuonglai_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_doituong_svtuonglai_list->lStartRec > 1)
		$rs->Move($t_doituong_svtuonglai_list->lStartRec - 1);
}

// Initialize aggregate
$t_doituong_svtuonglai->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_doituong_svtuonglai_list->RenderRow();
$t_doituong_svtuonglai_list->lRowCnt = 0;
while (($t_doituong_svtuonglai->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_doituong_svtuonglai_list->lRecCount < $t_doituong_svtuonglai_list->lStopRec) {
	$t_doituong_svtuonglai_list->lRecCount++;
	if (intval($t_doituong_svtuonglai_list->lRecCount) >= intval($t_doituong_svtuonglai_list->lStartRec)) {
		$t_doituong_svtuonglai_list->lRowCnt++;

	// Init row class and style
	$t_doituong_svtuonglai->CssClass = "";
	$t_doituong_svtuonglai->CssStyle = "";
	$t_doituong_svtuonglai->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_doituong_svtuonglai->CurrentAction == "gridadd") {
		$t_doituong_svtuonglai_list->LoadDefaultValues(); // Load default values
	} else {
		$t_doituong_svtuonglai_list->LoadRowValues($rs); // Load row values
	}
	$t_doituong_svtuonglai->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_doituong_svtuonglai_list->RenderRow();

	// Render list options
	$t_doituong_svtuonglai_list->RenderListOptions();
?>
	<tr<?php echo $t_doituong_svtuonglai->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_doituong_svtuonglai_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_doituong_svtuonglai->C_NAME->Visible) { // C_NAME ?>
		<td<?php echo $t_doituong_svtuonglai->C_NAME->CellAttributes() ?>>
<div<?php echo $t_doituong_svtuonglai->C_NAME->ViewAttributes() ?>><?php echo $t_doituong_svtuonglai->C_NAME->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_doituong_svtuonglai->C_BELONGTO->Visible) { // C_BELONGTO ?>
		<td<?php echo $t_doituong_svtuonglai->C_BELONGTO->CellAttributes() ?>>
<div<?php echo $t_doituong_svtuonglai->C_BELONGTO->ViewAttributes() ?>><?php echo $t_doituong_svtuonglai->C_BELONGTO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_doituong_svtuonglai->C_TYPE->Visible) { // C_TYPE ?>
		<td<?php echo $t_doituong_svtuonglai->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_doituong_svtuonglai->C_TYPE->ViewAttributes() ?>><?php echo $t_doituong_svtuonglai->C_TYPE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_doituong_svtuonglai->C_URL->Visible) { // C_URL ?>
		<td<?php echo $t_doituong_svtuonglai->C_URL->CellAttributes() ?>>
<div<?php echo $t_doituong_svtuonglai->C_URL->ViewAttributes() ?>><?php echo $t_doituong_svtuonglai->C_URL->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_doituong_svtuonglai->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_doituong_svtuonglai->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_doituong_svtuonglai->C_ACTIVE->ViewAttributes() ?>><?php echo $t_doituong_svtuonglai->C_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_doituong_svtuonglai_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_doituong_svtuonglai->CurrentAction <> "gridadd")
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
<?php if ($t_doituong_svtuonglai_list->lTotalRecs > 0) { ?>
<?php if ($t_doituong_svtuonglai->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_doituong_svtuonglai->CurrentAction <> "gridadd" && $t_doituong_svtuonglai->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_doituong_svtuonglai_list->Pager)) $t_doituong_svtuonglai_list->Pager = new cNumericPager($t_doituong_svtuonglai_list->lStartRec, $t_doituong_svtuonglai_list->lDisplayRecs, $t_doituong_svtuonglai_list->lTotalRecs, $t_doituong_svtuonglai_list->lRecRange) ?>
<?php if ($t_doituong_svtuonglai_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_doituong_svtuonglai_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_svtuonglai_list->PageUrl() ?>start=<?php echo $t_doituong_svtuonglai_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_svtuonglai_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_doituong_svtuonglai_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_doituong_svtuonglai_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_doituong_svtuonglai_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_doituong_svtuonglai_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_doituong_svtuonglai_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_doituong_svtuonglailist, '<?php echo $t_doituong_svtuonglai_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_doituong_svtuonglai->Export == "" && $t_doituong_svtuonglai->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_doituong_svtuonglai->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_doituong_svtuonglai_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_svtuonglai_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_doituong_svtuonglai';

	// Page object name
	var $PageObjName = 't_doituong_svtuonglai_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_svtuonglai;
		if ($t_doituong_svtuonglai->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_svtuonglai->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_svtuonglai;
		if ($t_doituong_svtuonglai->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_svtuonglai->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_svtuonglai->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_svtuonglai_list() {
		global $conn, $Language;
                @$_SESSION['TL_BELONGTO_ID']=KillChars(htmlspecialchars($_GET['TL_BELONGTO_ID']));
		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_svtuonglai)
		$GLOBALS["t_doituong_svtuonglai"] = new ct_doituong_svtuonglai();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_doituong_svtuonglai"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_doituong_svtuonglaidelete.php";
		$this->MultiUpdateUrl = "t_doituong_svtuonglaiupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_svtuonglai', TRUE);

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
		global $t_doituong_svtuonglai;
   
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
			$t_doituong_svtuonglai->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_doituong_svtuonglai->Export = $_POST["exporttype"];
		} else {
			$t_doituong_svtuonglai->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_doituong_svtuonglai->Export; // Get export parameter, used in header
		$gsExportFile = $t_doituong_svtuonglai->TableVar; // Get export file, used in header
		if (in_array($t_doituong_svtuonglai->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_doituong_svtuonglai->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_doituong_svtuonglai->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_doituong_svtuonglai->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_doituong_svtuonglai->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_doituong_svtuonglai;

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
			$t_doituong_svtuonglai->Recordset_SearchValidated();

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
		if ($t_doituong_svtuonglai->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_doituong_svtuonglai->getRecordsPerPage(); // Restore from Session
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
		$t_doituong_svtuonglai->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_doituong_svtuonglai->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_doituong_svtuonglai->getSearchWhere();
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
		$t_doituong_svtuonglai->setSessionWhere($sFilter);
		$t_doituong_svtuonglai->CurrentFilter = "";

		// Export data only
		if (in_array($t_doituong_svtuonglai->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_doituong_svtuonglai->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_doituong_svtuonglai;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->DTSVTUONGLAI_ID, FALSE); // DTSVTUONGLAI_ID
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_NAME, FALSE); // C_NAME
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_BELONGTO, FALSE); // C_BELONGTO
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_TYPE, FALSE); // C_TYPE
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_URL, FALSE); // C_URL
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_ACTIVE, FALSE); // C_ACTIVE
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_TIME_ADD, FALSE); // C_TIME_ADD
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->C_TIME_EDIT, FALSE); // C_TIME_EDIT
		$this->BuildSearchSql($sWhere, $t_doituong_svtuonglai->FK_CONGTY, FALSE); // FK_CONGTY

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_doituong_svtuonglai->DTSVTUONGLAI_ID); // DTSVTUONGLAI_ID
			$this->SetSearchParm($t_doituong_svtuonglai->C_NAME); // C_NAME
			$this->SetSearchParm($t_doituong_svtuonglai->C_BELONGTO); // C_BELONGTO
			$this->SetSearchParm($t_doituong_svtuonglai->C_TYPE); // C_TYPE
			$this->SetSearchParm($t_doituong_svtuonglai->C_URL); // C_URL
			$this->SetSearchParm($t_doituong_svtuonglai->C_ACTIVE); // C_ACTIVE
			$this->SetSearchParm($t_doituong_svtuonglai->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_doituong_svtuonglai->C_TIME_ADD); // C_TIME_ADD
			$this->SetSearchParm($t_doituong_svtuonglai->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_doituong_svtuonglai->C_TIME_EDIT); // C_TIME_EDIT
			$this->SetSearchParm($t_doituong_svtuonglai->FK_CONGTY); // FK_CONGTY
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
		global $t_doituong_svtuonglai;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_doituong_svtuonglai->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_doituong_svtuonglai->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_doituong_svtuonglai->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_doituong_svtuonglai->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_doituong_svtuonglai->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_doituong_svtuonglai;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_doituong_svtuonglai->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_doituong_svtuonglai->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_doituong_svtuonglai->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_doituong_svtuonglai->GetAdvancedSearch("w_$FldParm");
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
		global $t_doituong_svtuonglai;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_doituong_svtuonglai->C_NAME, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_doituong_svtuonglai->C_URL, $Keyword);
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
		global $Security, $t_doituong_svtuonglai;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_doituong_svtuonglai->BasicSearchKeyword;
		$sSearchType = $t_doituong_svtuonglai->BasicSearchType;
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
			$t_doituong_svtuonglai->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_doituong_svtuonglai->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_doituong_svtuonglai;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_doituong_svtuonglai->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_doituong_svtuonglai;
		$t_doituong_svtuonglai->setSessionBasicSearchKeyword("");
		$t_doituong_svtuonglai->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_doituong_svtuonglai;
		$t_doituong_svtuonglai->setAdvancedSearch("x_DTSVTUONGLAI_ID", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_NAME", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_BELONGTO", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_TYPE", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_URL", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_ACTIVE", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_USER_ADD", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_TIME_ADD", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_C_TIME_EDIT", "");
		$t_doituong_svtuonglai->setAdvancedSearch("x_FK_CONGTY", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_doituong_svtuonglai;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_DTSVTUONGLAI_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NAME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_BELONGTO"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TYPE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_URL"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_doituong_svtuonglai->BasicSearchKeyword = $t_doituong_svtuonglai->getSessionBasicSearchKeyword();
			$t_doituong_svtuonglai->BasicSearchType = $t_doituong_svtuonglai->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_doituong_svtuonglai->DTSVTUONGLAI_ID);
			$this->GetSearchParm($t_doituong_svtuonglai->C_NAME);
			$this->GetSearchParm($t_doituong_svtuonglai->C_BELONGTO);
			$this->GetSearchParm($t_doituong_svtuonglai->C_TYPE);
			$this->GetSearchParm($t_doituong_svtuonglai->C_URL);
			$this->GetSearchParm($t_doituong_svtuonglai->C_ACTIVE);
			$this->GetSearchParm($t_doituong_svtuonglai->C_USER_ADD);
			$this->GetSearchParm($t_doituong_svtuonglai->C_TIME_ADD);
			$this->GetSearchParm($t_doituong_svtuonglai->C_USER_EDIT);
			$this->GetSearchParm($t_doituong_svtuonglai->C_TIME_EDIT);
			$this->GetSearchParm($t_doituong_svtuonglai->FK_CONGTY);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_doituong_svtuonglai;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_doituong_svtuonglai->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_doituong_svtuonglai->CurrentOrderType = @$_GET["ordertype"];
			$t_doituong_svtuonglai->UpdateSort($t_doituong_svtuonglai->C_NAME, $bCtrl); // C_NAME
			$t_doituong_svtuonglai->UpdateSort($t_doituong_svtuonglai->C_BELONGTO, $bCtrl); // C_BELONGTO
			$t_doituong_svtuonglai->UpdateSort($t_doituong_svtuonglai->C_TYPE, $bCtrl); // C_TYPE
			$t_doituong_svtuonglai->UpdateSort($t_doituong_svtuonglai->C_URL, $bCtrl); // C_URL
			$t_doituong_svtuonglai->UpdateSort($t_doituong_svtuonglai->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_doituong_svtuonglai->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_doituong_svtuonglai;
		$sOrderBy = $t_doituong_svtuonglai->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_doituong_svtuonglai->SqlOrderBy() <> "") {
				$sOrderBy = $t_doituong_svtuonglai->SqlOrderBy();
				$t_doituong_svtuonglai->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_doituong_svtuonglai;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_doituong_svtuonglai->setSessionOrderBy($sOrderBy);
				$t_doituong_svtuonglai->C_NAME->setSort("");
				$t_doituong_svtuonglai->C_BELONGTO->setSort("");
				$t_doituong_svtuonglai->C_TYPE->setSort("");
				$t_doituong_svtuonglai->C_URL->setSort("");
				$t_doituong_svtuonglai->C_ACTIVE->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_doituong_svtuonglai;

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

		 $this->ListOptions->Add("TL_BELONGTO_ID");
		$item =& $this->ListOptions->Items["TL_BELONGTO_ID"];
		$item->CssStyle = "white-space: nowrap;width:25px";
		$item->Visible = $Security->AllowList('t_doituong_svtuonglai');
		$item->OnLeft = TRUE;

		// "checkbox"
		$this->ListOptions->Add("checkbox");
		$item =& $this->ListOptions->Items["checkbox"];
		$item->CssStyle = "white-space: nowrap;width:15px;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_doituong_svtuonglai_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_doituong_svtuonglai->Export <> "" ||
			$t_doituong_svtuonglai->CurrentAction == "gridadd" ||
			$t_doituong_svtuonglai->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_doituong_svtuonglai;
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

                 // Đối tượng con by quanghung
		$oListOpt =& $this->ListOptions->Items["TL_BELONGTO_ID"];
                
                  if ( $_SESSION['TL_BELONGTO_ID'] <> null)
			{
                        $oListOpt->Body = "";
			//$oListOpt->Body = "<a href=\"t_nganhnghelist.php?parentnganhnghe_ID=" . urlencode(strval($t_nganhnghe->PK_NGANH_ID->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
                        }
                 else
                        {
                       $oListOpt->Body = "<a href=\"t_doituong_svtuonglailist.php?TL_BELONGTO_ID=" . urlencode(strval($t_doituong_svtuonglai->DTSVTUONGLAI_ID->CurrentValue)) . "\">Đối tượng con </a>";
                       
                       }
        
                    

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_doituong_svtuonglai->DTSVTUONGLAI_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_doituong_svtuonglai;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_doituong_svtuonglai;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_doituong_svtuonglai->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_doituong_svtuonglai->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_doituong_svtuonglai;
		$t_doituong_svtuonglai->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_doituong_svtuonglai->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_doituong_svtuonglai;

		// Load search values
		// DTSVTUONGLAI_ID

		$t_doituong_svtuonglai->DTSVTUONGLAI_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_DTSVTUONGLAI_ID"]);
		$t_doituong_svtuonglai->DTSVTUONGLAI_ID->AdvancedSearch->SearchOperator = @$_GET["z_DTSVTUONGLAI_ID"];

		// C_NAME
		$t_doituong_svtuonglai->C_NAME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NAME"]);
		$t_doituong_svtuonglai->C_NAME->AdvancedSearch->SearchOperator = @$_GET["z_C_NAME"];

		// C_BELONGTO
		$t_doituong_svtuonglai->C_BELONGTO->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_BELONGTO"]);
		$t_doituong_svtuonglai->C_BELONGTO->AdvancedSearch->SearchOperator = @$_GET["z_C_BELONGTO"];

		// C_TYPE
		$t_doituong_svtuonglai->C_TYPE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TYPE"]);
		$t_doituong_svtuonglai->C_TYPE->AdvancedSearch->SearchOperator = @$_GET["z_C_TYPE"];

		// C_URL
		$t_doituong_svtuonglai->C_URL->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_URL"]);
		$t_doituong_svtuonglai->C_URL->AdvancedSearch->SearchOperator = @$_GET["z_C_URL"];

		// C_ACTIVE
		$t_doituong_svtuonglai->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE"]);
		$t_doituong_svtuonglai->C_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE"];

		// C_USER_ADD
		$t_doituong_svtuonglai->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_doituong_svtuonglai->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_TIME_ADD
		$t_doituong_svtuonglai->C_TIME_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ADD"]);
		$t_doituong_svtuonglai->C_TIME_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ADD"];

		// C_USER_EDIT
		$t_doituong_svtuonglai->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_doituong_svtuonglai->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_TIME_EDIT
		$t_doituong_svtuonglai->C_TIME_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_EDIT"]);
		$t_doituong_svtuonglai->C_TIME_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_EDIT"];

		// FK_CONGTY
		$t_doituong_svtuonglai->FK_CONGTY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY"]);
		$t_doituong_svtuonglai->FK_CONGTY->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_doituong_svtuonglai;

		// Call Recordset Selecting event
		$t_doituong_svtuonglai->Recordset_Selecting($t_doituong_svtuonglai->CurrentFilter);

		// Load List page SQL
		$sSql = $t_doituong_svtuonglai->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_doituong_svtuonglai->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_svtuonglai;
		$sFilter = $t_doituong_svtuonglai->KeyFilter();

		// Call Row Selecting event
		$t_doituong_svtuonglai->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_svtuonglai->CurrentFilter = $sFilter;
		$sSql = $t_doituong_svtuonglai->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_svtuonglai->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_svtuonglai;
		$t_doituong_svtuonglai->DTSVTUONGLAI_ID->setDbValue($rs->fields('DTSVTUONGLAI_ID'));
		$t_doituong_svtuonglai->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_svtuonglai->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_doituong_svtuonglai->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_svtuonglai->C_URL->setDbValue($rs->fields('C_URL'));
		$t_doituong_svtuonglai->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_doituong_svtuonglai->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_svtuonglai->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$t_doituong_svtuonglai->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_svtuonglai->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
		$t_doituong_svtuonglai->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_svtuonglai;

		// Initialize URLs
		$this->ViewUrl = $t_doituong_svtuonglai->ViewUrl();
		$this->EditUrl = $t_doituong_svtuonglai->EditUrl();
		$this->InlineEditUrl = $t_doituong_svtuonglai->InlineEditUrl();
		$this->CopyUrl = $t_doituong_svtuonglai->CopyUrl();
		$this->InlineCopyUrl = $t_doituong_svtuonglai->InlineCopyUrl();
		$this->DeleteUrl = $t_doituong_svtuonglai->DeleteUrl();

		// Call Row_Rendering event
		$t_doituong_svtuonglai->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_doituong_svtuonglai->C_NAME->CellCssStyle = ""; $t_doituong_svtuonglai->C_NAME->CellCssClass = "";
		$t_doituong_svtuonglai->C_NAME->CellAttrs = array(); $t_doituong_svtuonglai->C_NAME->ViewAttrs = array(); $t_doituong_svtuonglai->C_NAME->EditAttrs = array();

		// C_BELONGTO
		$t_doituong_svtuonglai->C_BELONGTO->CellCssStyle = ""; $t_doituong_svtuonglai->C_BELONGTO->CellCssClass = "";
		$t_doituong_svtuonglai->C_BELONGTO->CellAttrs = array(); $t_doituong_svtuonglai->C_BELONGTO->ViewAttrs = array(); $t_doituong_svtuonglai->C_BELONGTO->EditAttrs = array();

		// C_TYPE
		$t_doituong_svtuonglai->C_TYPE->CellCssStyle = ""; $t_doituong_svtuonglai->C_TYPE->CellCssClass = "";
		$t_doituong_svtuonglai->C_TYPE->CellAttrs = array(); $t_doituong_svtuonglai->C_TYPE->ViewAttrs = array(); $t_doituong_svtuonglai->C_TYPE->EditAttrs = array();

		// C_URL
		$t_doituong_svtuonglai->C_URL->CellCssStyle = ""; $t_doituong_svtuonglai->C_URL->CellCssClass = "";
		$t_doituong_svtuonglai->C_URL->CellAttrs = array(); $t_doituong_svtuonglai->C_URL->ViewAttrs = array(); $t_doituong_svtuonglai->C_URL->EditAttrs = array();

		// C_ACTIVE
		$t_doituong_svtuonglai->C_ACTIVE->CellCssStyle = ""; $t_doituong_svtuonglai->C_ACTIVE->CellCssClass = "";
		$t_doituong_svtuonglai->C_ACTIVE->CellAttrs = array(); $t_doituong_svtuonglai->C_ACTIVE->ViewAttrs = array(); $t_doituong_svtuonglai->C_ACTIVE->EditAttrs = array();
		if ($t_doituong_svtuonglai->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_NAME
			$t_doituong_svtuonglai->C_NAME->ViewValue = $t_doituong_svtuonglai->C_NAME->CurrentValue;
			$t_doituong_svtuonglai->C_NAME->CssStyle = "";
			$t_doituong_svtuonglai->C_NAME->CssClass = "";
			$t_doituong_svtuonglai->C_NAME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_doituong_svtuonglai->C_BELONGTO->ViewValue = $t_doituong_svtuonglai->C_BELONGTO->CurrentValue;
			$t_doituong_svtuonglai->C_BELONGTO->CssStyle = "";
			$t_doituong_svtuonglai->C_BELONGTO->CssClass = "";
			$t_doituong_svtuonglai->C_BELONGTO->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_svtuonglai->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_svtuonglai->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_svtuonglai->C_TYPE->ViewValue = "Danh mục 1 tin bài";
						break;
					case "1":
						$t_doituong_svtuonglai->C_TYPE->ViewValue = "Danh mục list tin bài";
						break;
					case "2":
						$t_doituong_svtuonglai->C_TYPE->ViewValue = "Danh mục url liên kết";
						break;
					default:
						$t_doituong_svtuonglai->C_TYPE->ViewValue = $t_doituong_svtuonglai->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_svtuonglai->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_svtuonglai->C_TYPE->CssStyle = "";
			$t_doituong_svtuonglai->C_TYPE->CssClass = "";
			$t_doituong_svtuonglai->C_TYPE->ViewCustomAttributes = "";

			// C_URL
			$t_doituong_svtuonglai->C_URL->ViewValue = $t_doituong_svtuonglai->C_URL->CurrentValue;
			$t_doituong_svtuonglai->C_URL->CssStyle = "";
			$t_doituong_svtuonglai->C_URL->CssClass = "";
			$t_doituong_svtuonglai->C_URL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_doituong_svtuonglai->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_doituong_svtuonglai->C_ACTIVE->CurrentValue) {
					case "0":
						$t_doituong_svtuonglai->C_ACTIVE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_doituong_svtuonglai->C_ACTIVE->ViewValue = "<b>Kích hoạt</b>";
						break;
					default:
						$t_doituong_svtuonglai->C_ACTIVE->ViewValue = $t_doituong_svtuonglai->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_doituong_svtuonglai->C_ACTIVE->ViewValue = NULL;
			}
			$t_doituong_svtuonglai->C_ACTIVE->CssStyle = "";
			$t_doituong_svtuonglai->C_ACTIVE->CssClass = "";
			$t_doituong_svtuonglai->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_svtuonglai->C_USER_ADD->ViewValue = $t_doituong_svtuonglai->C_USER_ADD->CurrentValue;
			$t_doituong_svtuonglai->C_USER_ADD->CssStyle = "";
			$t_doituong_svtuonglai->C_USER_ADD->CssClass = "";
			$t_doituong_svtuonglai->C_USER_ADD->ViewCustomAttributes = "";

			// C_TIME_ADD
			$t_doituong_svtuonglai->C_TIME_ADD->ViewValue = $t_doituong_svtuonglai->C_TIME_ADD->CurrentValue;
			$t_doituong_svtuonglai->C_TIME_ADD->ViewValue = ew_FormatDateTime($t_doituong_svtuonglai->C_TIME_ADD->ViewValue, 7);
			$t_doituong_svtuonglai->C_TIME_ADD->CssStyle = "";
			$t_doituong_svtuonglai->C_TIME_ADD->CssClass = "";
			$t_doituong_svtuonglai->C_TIME_ADD->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_svtuonglai->C_USER_EDIT->ViewValue = $t_doituong_svtuonglai->C_USER_EDIT->CurrentValue;
			$t_doituong_svtuonglai->C_USER_EDIT->CssStyle = "";
			$t_doituong_svtuonglai->C_USER_EDIT->CssClass = "";
			$t_doituong_svtuonglai->C_USER_EDIT->ViewCustomAttributes = "";

			// C_TIME_EDIT
			$t_doituong_svtuonglai->C_TIME_EDIT->ViewValue = $t_doituong_svtuonglai->C_TIME_EDIT->CurrentValue;
			$t_doituong_svtuonglai->C_TIME_EDIT->ViewValue = ew_FormatDateTime($t_doituong_svtuonglai->C_TIME_EDIT->ViewValue, 7);
			$t_doituong_svtuonglai->C_TIME_EDIT->CssStyle = "";
			$t_doituong_svtuonglai->C_TIME_EDIT->CssClass = "";
			$t_doituong_svtuonglai->C_TIME_EDIT->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_doituong_svtuonglai->FK_CONGTY->ViewValue = $t_doituong_svtuonglai->FK_CONGTY->CurrentValue;
			$t_doituong_svtuonglai->FK_CONGTY->CssStyle = "";
			$t_doituong_svtuonglai->FK_CONGTY->CssClass = "";
			$t_doituong_svtuonglai->FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_svtuonglai->C_NAME->HrefValue = "";
			$t_doituong_svtuonglai->C_NAME->TooltipValue = "";

			// C_BELONGTO
			$t_doituong_svtuonglai->C_BELONGTO->HrefValue = "";
			$t_doituong_svtuonglai->C_BELONGTO->TooltipValue = "";

			// C_TYPE
			$t_doituong_svtuonglai->C_TYPE->HrefValue = "";
			$t_doituong_svtuonglai->C_TYPE->TooltipValue = "";

			// C_URL
			$t_doituong_svtuonglai->C_URL->HrefValue = "";
			$t_doituong_svtuonglai->C_URL->TooltipValue = "";

			// C_ACTIVE
			$t_doituong_svtuonglai->C_ACTIVE->HrefValue = "";
			$t_doituong_svtuonglai->C_ACTIVE->TooltipValue = "";
		} elseif ($t_doituong_svtuonglai->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// C_NAME
			$t_doituong_svtuonglai->C_NAME->EditCustomAttributes = "";
			$t_doituong_svtuonglai->C_NAME->EditValue = ew_HtmlEncode($t_doituong_svtuonglai->C_NAME->AdvancedSearch->SearchValue);

			// C_BELONGTO
			$t_doituong_svtuonglai->C_BELONGTO->EditCustomAttributes = "";
			$t_doituong_svtuonglai->C_BELONGTO->EditValue = ew_HtmlEncode($t_doituong_svtuonglai->C_BELONGTO->AdvancedSearch->SearchValue);

			// C_TYPE
			$t_doituong_svtuonglai->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Danh mục 1 tin bài");
			$arwrk[] = array("1", "Danh mục list tin bài");
			$arwrk[] = array("2", "Danh mục url liên kết");
			$t_doituong_svtuonglai->C_TYPE->EditValue = $arwrk;

			// C_URL
			$t_doituong_svtuonglai->C_URL->EditCustomAttributes = "";
			$t_doituong_svtuonglai->C_URL->EditValue = ew_HtmlEncode($t_doituong_svtuonglai->C_URL->AdvancedSearch->SearchValue);

			// C_ACTIVE
			$t_doituong_svtuonglai->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_doituong_svtuonglai->C_ACTIVE->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_doituong_svtuonglai->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_svtuonglai->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_doituong_svtuonglai;

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
		global $t_doituong_svtuonglai;
		$t_doituong_svtuonglai->DTSVTUONGLAI_ID->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_DTSVTUONGLAI_ID");
		$t_doituong_svtuonglai->C_NAME->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_NAME");
		$t_doituong_svtuonglai->C_BELONGTO->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_BELONGTO");
		$t_doituong_svtuonglai->C_TYPE->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_TYPE");
		$t_doituong_svtuonglai->C_URL->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_URL");
		$t_doituong_svtuonglai->C_ACTIVE->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_ACTIVE");
		$t_doituong_svtuonglai->C_USER_ADD->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_USER_ADD");
		$t_doituong_svtuonglai->C_TIME_ADD->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_TIME_ADD");
		$t_doituong_svtuonglai->C_USER_EDIT->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_USER_EDIT");
		$t_doituong_svtuonglai->C_TIME_EDIT->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_C_TIME_EDIT");
		$t_doituong_svtuonglai->FK_CONGTY->AdvancedSearch->SearchValue = $t_doituong_svtuonglai->getAdvancedSearch("x_FK_CONGTY");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_doituong_svtuonglai;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_doituong_svtuonglai->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_doituong_svtuonglai->ExportAll) {
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
		if ($t_doituong_svtuonglai->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_doituong_svtuonglai, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_NAME);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_BELONGTO);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_TYPE);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_URL);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_ACTIVE);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_USER_ADD);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_TIME_ADD);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->C_TIME_EDIT);
				$ExportDoc->ExportCaption($t_doituong_svtuonglai->FK_CONGTY);
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
				$t_doituong_svtuonglai->CssClass = "";
				$t_doituong_svtuonglai->CssStyle = "";
				$t_doituong_svtuonglai->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_doituong_svtuonglai->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_NAME', $t_doituong_svtuonglai->C_NAME->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_BELONGTO', $t_doituong_svtuonglai->C_BELONGTO->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE', $t_doituong_svtuonglai->C_TYPE->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_doituong_svtuonglai->C_URL->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_doituong_svtuonglai->C_ACTIVE->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_doituong_svtuonglai->C_USER_ADD->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ADD', $t_doituong_svtuonglai->C_TIME_ADD->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_doituong_svtuonglai->C_USER_EDIT->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_EDIT', $t_doituong_svtuonglai->C_TIME_EDIT->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY', $t_doituong_svtuonglai->FK_CONGTY->ExportValue($t_doituong_svtuonglai->Export, $t_doituong_svtuonglai->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_NAME);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_BELONGTO);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_TYPE);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_URL);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_ACTIVE);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_USER_ADD);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_TIME_ADD);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_USER_EDIT);
					$ExportDoc->ExportField($t_doituong_svtuonglai->C_TIME_EDIT);
					$ExportDoc->ExportField($t_doituong_svtuonglai->FK_CONGTY);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_doituong_svtuonglai->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_doituong_svtuonglai->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_doituong_svtuonglai->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_doituong_svtuonglai->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_doituong_svtuonglai->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_doituong_svtuonglai;
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
		if ($t_doituong_svtuonglai->Email_Sending($Email, $EventArgs))
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
		global $t_doituong_svtuonglai;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_doituong_svtuonglai->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_doituong_svtuonglai->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_doituong_svtuonglai->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->DTSVTUONGLAI_ID); // DTSVTUONGLAI_ID
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_NAME); // C_NAME
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_BELONGTO); // C_BELONGTO
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_TYPE); // C_TYPE
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_URL); // C_URL
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_ACTIVE); // C_ACTIVE
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_TIME_ADD); // C_TIME_ADD
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->C_TIME_EDIT); // C_TIME_EDIT
		$this->AddSearchQueryString($sQry, $t_doituong_svtuonglai->FK_CONGTY); // FK_CONGTY

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_doituong_svtuonglai->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_doituong_svtuonglai->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_doituong_svtuonglai;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_doituong_svtuonglai->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_doituong_svtuonglai->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_doituong_svtuonglai->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_doituong_svtuonglai->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_doituong_svtuonglai->GetAdvancedSearch("w_" . $FldParm);
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
