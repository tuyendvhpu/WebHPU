<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_ghichu_lichinfo.php" ?>
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
$t_ghichu_lich_list = new ct_ghichu_lich_list();
$Page =& $t_ghichu_lich_list;

// Page init
$t_ghichu_lich_list->Page_Init();

// Page main
$t_ghichu_lich_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_ghichu_lich->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_ghichu_lich_list = new ew_Page("t_ghichu_lich_list");

// page properties
t_ghichu_lich_list.PageID = "list"; // page ID
t_ghichu_lich_list.FormID = "ft_ghichu_lichlist"; // form ID
var EW_PAGE_ID = t_ghichu_lich_list.PageID; // for backward compatibility

// extend page with validate function for search
t_ghichu_lich_list.ValidateSearch = function(fobj) {
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
t_ghichu_lich_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ghichu_lich_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ghichu_lich_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ghichu_lich_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 20;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {			
		var inst;			
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];		
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];	
		if (inst)
			inst.focus();
	}
}

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
<?php if ($t_ghichu_lich->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_ghichu_lich_list->lTotalRecs = $t_ghichu_lich->SelectRecordCount();
	} else {
		if ($rs = $t_ghichu_lich_list->LoadRecordset())
			$t_ghichu_lich_list->lTotalRecs = $rs->RecordCount();
	}
	$t_ghichu_lich_list->lStartRec = 1;
	if ($t_ghichu_lich_list->lDisplayRecs <= 0 || ($t_ghichu_lich->Export <> "" && $t_ghichu_lich->ExportAll)) // Display all records
		$t_ghichu_lich_list->lDisplayRecs = $t_ghichu_lich_list->lTotalRecs;
	if (!($t_ghichu_lich->Export <> "" && $t_ghichu_lich->ExportAll))
		$t_ghichu_lich_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_ghichu_lich_list->LoadRecordset($t_ghichu_lich_list->lStartRec-1, $t_ghichu_lich_list->lDisplayRecs);
?>
<p class="pheader"><?php echo $t_ghichu_lich->TableCaption() ?>
<?php if ($t_ghichu_lich->Export == "" && $t_ghichu_lich->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_ghichu_lich" id="emf_t_ghichu_lich" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_ghichu_lich',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_ghichu_lichlist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>

<?php if ($Security->CanSearch()) { ?>
<?php if ($t_ghichu_lich->Export == "" && $t_ghichu_lich->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_ghichu_lich_list);" style="text-decoration: none;"><img id="t_ghichu_lich_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_ghichu_lich_list_SearchPanel">
<form name="ft_ghichu_lichlistsrch" id="ft_ghichu_lichlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_ghichu_lich_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_ghichu_lich">
<?php
if ($gsSearchError == "")
	$t_ghichu_lich_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_ghichu_lich->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_ghichu_lich_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CONG_TY" id="z_FK_CONG_TY" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CONG_TY" name="x_FK_CONG_TY" title="<?php echo $t_ghichu_lich->FK_CONG_TY->FldTitle() ?>"<?php echo $t_ghichu_lich->FK_CONG_TY->EditAttributes() ?>>
<?php
if (isAdmin())
{
        if (is_array($t_ghichu_lich->FK_CONG_TY->EditValue)) {
                $arwrk = $t_ghichu_lich->FK_CONG_TY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_ghichu_lich->FK_CONG_TY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                        if ($selwrk <> "") $emptywrk = FALSE;
        ?>
        <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
        <?php echo $arwrk[$rowcntwrk][1] ?>
        </option>
        <?php
                }
        }
} 
else
{  
      if (is_array($t_ghichu_lich->FK_CONG_TY->EditValue)) {
                $arwrk = $t_ghichu_lich->FK_CONG_TY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                     if (strval($Security->CurrentUserOption()) == strval($arwrk[$rowcntwrk][0]))
                            {
                            $selwrk = " selected=\"selected\"";

        ?>
        <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
        <?php echo $arwrk[$rowcntwrk][1] ?>
        </option>
        <?php                }
                }
        }
}    
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_YEAR" id="z_C_YEAR" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_C_YEAR" name="x_C_YEAR" title="<?php echo $t_ghichu_lich->C_YEAR->FldTitle() ?>"<?php echo $t_ghichu_lich->C_YEAR->EditAttributes() ?>>
<?php
if (is_array($t_ghichu_lich->C_YEAR->EditValue)) {
	$arwrk = $t_ghichu_lich->C_YEAR->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		if (strval($num) == strval($arwrk[$rowcntwrk][0]))
                    {
                    $selwrk = " selected=\"selected\"";
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php               }
	}
}
?>
</select>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_WEEK" id="z_C_WEEK" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_C_WEEK" name="x_C_WEEK" title="<?php echo $t_ghichu_lich->C_WEEK->FldTitle() ?>"<?php echo $t_ghichu_lich->C_WEEK->EditAttributes() ?>>
<?php
if (is_array($t_ghichu_lich->C_WEEK->EditValue)) {
	$arwrk = $t_ghichu_lich->C_WEEK->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
        $Week = date("W")+1;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Week) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_ghichu_lich->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_ghichu_lich->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_ghichu_lich->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_ghichu_lich->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_ghichu_lich_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_ghichu_lich->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_ghichu_lich->CurrentAction <> "gridadd" && $t_ghichu_lich->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ghichu_lich_list->Pager)) $t_ghichu_lich_list->Pager = new cNumericPager($t_ghichu_lich_list->lStartRec, $t_ghichu_lich_list->lDisplayRecs, $t_ghichu_lich_list->lTotalRecs, $t_ghichu_lich_list->lRecRange) ?>
<?php if ($t_ghichu_lich_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_ghichu_lich_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ghichu_lich_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_ghichu_lich_list->sSrchWhere == "0=101") { ?>
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
<a href="<?php echo $t_ghichu_lich_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_ghichu_lich_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_ghichu_lichlist, '<?php echo $t_ghichu_lich_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_ghichu_lichlist" id="ft_ghichu_lichlist" class="ewForm" action="" method="post">
<div id="gmp_t_ghichu_lich" class="ewGridMiddlePanel">
<?php if ($t_ghichu_lich_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_ghichu_lich->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_ghichu_lich_list->RenderListOptions();

// Render list options (header, left)
$t_ghichu_lich_list->ListOptions->Render("header", "left");
?>
<?php if ($t_ghichu_lich->FK_CONG_TY->Visible) { // FK_CONGTY ?>
	<?php if ($t_ghichu_lich->SortUrl($t_ghichu_lich->FK_CONG_TY) == "") { ?>
		<td><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ghichu_lich->SortUrl($t_ghichu_lich->FK_CONG_TY) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_ghichu_lich->FK_CONG_TY->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ghichu_lich->FK_CONG_TY->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_ghichu_lich->C_YEAR->Visible) { // C_YEAR ?>
	<?php if ($t_ghichu_lich->SortUrl($t_ghichu_lich->C_YEAR) == "") { ?>
		<td><?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ghichu_lich->SortUrl($t_ghichu_lich->C_YEAR) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_ghichu_lich->C_YEAR->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ghichu_lich->C_YEAR->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_ghichu_lich->C_WEEK->Visible) { // C_WEEK ?>
	<?php if ($t_ghichu_lich->SortUrl($t_ghichu_lich->C_WEEK) == "") { ?>
		<td><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ghichu_lich->SortUrl($t_ghichu_lich->C_WEEK) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_ghichu_lich->C_WEEK->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ghichu_lich->C_WEEK->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_ghichu_lich->C_CONTENT->Visible) { // C_CONTENT ?>
	<?php if ($t_ghichu_lich->SortUrl($t_ghichu_lich->C_CONTENT) == "") { ?>
		<td><?php echo $t_ghichu_lich->C_CONTENT->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_ghichu_lich->SortUrl($t_ghichu_lich->C_CONTENT) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_ghichu_lich->C_CONTENT->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_ghichu_lich->C_CONTENT->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_ghichu_lich->C_CONTENT->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$t_ghichu_lich_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_ghichu_lich->ExportAll && $t_ghichu_lich->Export <> "") {
	$t_ghichu_lich_list->lStopRec = $t_ghichu_lich_list->lTotalRecs;
} else {
	$t_ghichu_lich_list->lStopRec = $t_ghichu_lich_list->lStartRec + $t_ghichu_lich_list->lDisplayRecs - 1; // Set the last record to display
}
$t_ghichu_lich_list->lRecCount = $t_ghichu_lich_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_ghichu_lich_list->lStartRec > 1)
		$rs->Move($t_ghichu_lich_list->lStartRec - 1);
}

// Initialize aggregate
$t_ghichu_lich->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_ghichu_lich_list->RenderRow();
$t_ghichu_lich_list->lRowCnt = 0;
while (($t_ghichu_lich->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_ghichu_lich_list->lRecCount < $t_ghichu_lich_list->lStopRec) {
	$t_ghichu_lich_list->lRecCount++;
	if (intval($t_ghichu_lich_list->lRecCount) >= intval($t_ghichu_lich_list->lStartRec)) {
		$t_ghichu_lich_list->lRowCnt++;

	// Init row class and style
	$t_ghichu_lich->CssClass = "";
	$t_ghichu_lich->CssStyle = "";
	$t_ghichu_lich->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_ghichu_lich->CurrentAction == "gridadd") {
		$t_ghichu_lich_list->LoadDefaultValues(); // Load default values
	} else {
		$t_ghichu_lich_list->LoadRowValues($rs); // Load row values
	}
	$t_ghichu_lich->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_ghichu_lich_list->RenderRow();

	// Render list options
	$t_ghichu_lich_list->RenderListOptions();
?>
	<tr<?php echo $t_ghichu_lich->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_ghichu_lich_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_ghichu_lich->FK_CONG_TY->Visible) { // FK_CONGTY ?>
		<td<?php echo $t_ghichu_lich->FK_CONG_TY->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->FK_CONG_TY->ViewAttributes() ?>><?php echo $t_ghichu_lich->FK_CONG_TY->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ghichu_lich->C_YEAR->Visible) { // C_YEAR ?>
		<td<?php echo $t_ghichu_lich->C_YEAR->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_YEAR->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_YEAR->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_ghichu_lich->C_WEEK->Visible) { // C_WEEK ?>
		<td<?php echo $t_ghichu_lich->C_WEEK->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_WEEK->ViewAttributes() ?>>
    <?php echo "Tuần:". $t_ghichu_lich->C_WEEK->ListViewValue(). "<br/><b>".Get_beginday_endday_ofweek ($t_ghichu_lich->C_WEEK->ListViewValue())."</b>" ?>

</div>
</td>
	<?php } ?>
	<?php if ($t_ghichu_lich->C_CONTENT->Visible) { // C_CONTENT ?>
		<td<?php echo $t_ghichu_lich->C_CONTENT->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_CONTENT->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_CONTENT->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_ghichu_lich_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_ghichu_lich->CurrentAction <> "gridadd")
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
<?php if ($t_ghichu_lich_list->lTotalRecs > 0) { ?>
<?php if ($t_ghichu_lich->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_ghichu_lich->CurrentAction <> "gridadd" && $t_ghichu_lich->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ghichu_lich_list->Pager)) $t_ghichu_lich_list->Pager = new cNumericPager($t_ghichu_lich_list->lStartRec, $t_ghichu_lich_list->lDisplayRecs, $t_ghichu_lich_list->lTotalRecs, $t_ghichu_lich_list->lRecRange) ?>
<?php if ($t_ghichu_lich_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_ghichu_lich_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ghichu_lich_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_list->PageUrl() ?>start=<?php echo $t_ghichu_lich_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_ghichu_lich_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_ghichu_lich_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_ghichu_lich_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_ghichu_lich_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_ghichu_lich_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_ghichu_lichlist, '<?php echo $t_ghichu_lich_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_ghichu_lich->Export == "" && $t_ghichu_lich->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_ghichu_lich->Export == "") { ?>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_ghichu_lich_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_ghichu_lich_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_ghichu_lich';

	// Page object name
	var $PageObjName = 't_ghichu_lich_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) $PageUrl .= "t=" . $t_ghichu_lich->TableVar . "&"; // Add page token
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
		global $objForm, $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) {
			if ($objForm)
				return ($t_ghichu_lich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ghichu_lich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_ghichu_lich_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_ghichu_lich)
		$GLOBALS["t_ghichu_lich"] = new ct_ghichu_lich();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_ghichu_lich"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_ghichu_lichdelete.php";
		$this->MultiUpdateUrl = "t_ghichu_lichupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ghichu_lich', TRUE);

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
		global $t_ghichu_lich;

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
			$t_ghichu_lich->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_ghichu_lich->Export = $_POST["exporttype"];
		} else {
			$t_ghichu_lich->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_ghichu_lich->Export; // Get export parameter, used in header
		$gsExportFile = $t_ghichu_lich->TableVar; // Get export file, used in header
		if (in_array($t_ghichu_lich->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_ghichu_lich->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_ghichu_lich->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_ghichu_lich->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_ghichu_lich->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_ghichu_lich;

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
			$t_ghichu_lich->Recordset_SearchValidated();

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
		if ($t_ghichu_lich->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_ghichu_lich->getRecordsPerPage(); // Restore from Session
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
		$t_ghichu_lich->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_ghichu_lich->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_ghichu_lich->getSearchWhere();
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
		$t_ghichu_lich->setSessionWhere($sFilter);
		$t_ghichu_lich->CurrentFilter = "";

		// Export data only
		if (in_array($t_ghichu_lich->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_ghichu_lich->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_ghichu_lich;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->SB_NOTE_ID, FALSE); // SB_NOTE_ID
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->FK_CONG_TY, FALSE); // FK_CONGTY
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_YEAR, FALSE); // C_YEAR
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_WEEK, FALSE); // C_WEEK
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_CONTENT, FALSE); // C_CONTENT
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_TIME_ADD, FALSE); // C_TIME_ADD
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_ghichu_lich->C_TIME_EDIT, FALSE); // C_TIME_EDIT

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_ghichu_lich->SB_NOTE_ID); // SB_NOTE_ID
			$this->SetSearchParm($t_ghichu_lich->FK_CONG_TY); // FK_CONGTY
			$this->SetSearchParm($t_ghichu_lich->C_YEAR); // C_YEAR
			$this->SetSearchParm($t_ghichu_lich->C_WEEK); // C_WEEK
			$this->SetSearchParm($t_ghichu_lich->C_CONTENT); // C_CONTENT
			$this->SetSearchParm($t_ghichu_lich->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_ghichu_lich->C_TIME_ADD); // C_TIME_ADD
			$this->SetSearchParm($t_ghichu_lich->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_ghichu_lich->C_TIME_EDIT); // C_TIME_EDIT
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
		global $t_ghichu_lich;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_ghichu_lich->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_ghichu_lich->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_ghichu_lich->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_ghichu_lich->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_ghichu_lich->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_ghichu_lich;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_ghichu_lich->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_ghichu_lich->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_ghichu_lich->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_ghichu_lich->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_ghichu_lich->GetAdvancedSearch("w_$FldParm");
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
		global $t_ghichu_lich;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_ghichu_lich->C_YEAR, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $t_ghichu_lich->C_WEEK, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_ghichu_lich->C_CONTENT, $Keyword);
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
		global $Security, $t_ghichu_lich;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_ghichu_lich->BasicSearchKeyword;
		$sSearchType = $t_ghichu_lich->BasicSearchType;
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
			$t_ghichu_lich->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_ghichu_lich->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_ghichu_lich;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_ghichu_lich->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_ghichu_lich;
		$t_ghichu_lich->setSessionBasicSearchKeyword("");
		$t_ghichu_lich->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_ghichu_lich;
		$t_ghichu_lich->setAdvancedSearch("x_SB_NOTE_ID", "");
		$t_ghichu_lich->setAdvancedSearch("x_FK_CONG_TY", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_YEAR", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_WEEK", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_CONTENT", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_USER_ADD", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_TIME_ADD", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_ghichu_lich->setAdvancedSearch("x_C_TIME_EDIT", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_ghichu_lich;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_SB_NOTE_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONG_TY"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_YEAR"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_WEEK"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CONTENT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TIME_EDIT"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_ghichu_lich->BasicSearchKeyword = $t_ghichu_lich->getSessionBasicSearchKeyword();
			$t_ghichu_lich->BasicSearchType = $t_ghichu_lich->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_ghichu_lich->SB_NOTE_ID);
			$this->GetSearchParm($t_ghichu_lich->FK_CONG_TY);
			$this->GetSearchParm($t_ghichu_lich->C_YEAR);
			$this->GetSearchParm($t_ghichu_lich->C_WEEK);
			$this->GetSearchParm($t_ghichu_lich->C_CONTENT);
			$this->GetSearchParm($t_ghichu_lich->C_USER_ADD);
			$this->GetSearchParm($t_ghichu_lich->C_TIME_ADD);
			$this->GetSearchParm($t_ghichu_lich->C_USER_EDIT);
			$this->GetSearchParm($t_ghichu_lich->C_TIME_EDIT);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_ghichu_lich;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_ghichu_lich->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_ghichu_lich->CurrentOrderType = @$_GET["ordertype"];
			$t_ghichu_lich->UpdateSort($t_ghichu_lich->FK_CONG_TY, $bCtrl); // FK_CONGTY
			$t_ghichu_lich->UpdateSort($t_ghichu_lich->C_YEAR, $bCtrl); // C_YEAR
			$t_ghichu_lich->UpdateSort($t_ghichu_lich->C_WEEK, $bCtrl); // C_WEEK
			$t_ghichu_lich->UpdateSort($t_ghichu_lich->C_CONTENT, $bCtrl); // C_CONTENT
			$t_ghichu_lich->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_ghichu_lich;
		$sOrderBy = $t_ghichu_lich->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_ghichu_lich->SqlOrderBy() <> "") {
				$sOrderBy = $t_ghichu_lich->SqlOrderBy();
				$t_ghichu_lich->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_ghichu_lich;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_ghichu_lich->setSessionOrderBy($sOrderBy);
				$t_ghichu_lich->FK_CONG_TY->setSort("");
				$t_ghichu_lich->C_YEAR->setSort("");
				$t_ghichu_lich->C_WEEK->setSort("");
				$t_ghichu_lich->C_CONTENT->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_ghichu_lich;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_ghichu_lich_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_ghichu_lich->Export <> "" ||
			$t_ghichu_lich->CurrentAction == "gridadd" ||
			$t_ghichu_lich->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_ghichu_lich;
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
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_ghichu_lich->SB_NOTE_ID->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_ghichu_lich;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_ghichu_lich;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_ghichu_lich->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_ghichu_lich->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_ghichu_lich;
		$t_ghichu_lich->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_ghichu_lich->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_ghichu_lich;

		// Load search values
		// SB_NOTE_ID

		$t_ghichu_lich->SB_NOTE_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_SB_NOTE_ID"]);
		$t_ghichu_lich->SB_NOTE_ID->AdvancedSearch->SearchOperator = @$_GET["z_SB_NOTE_ID"];

		// FK_CONGTY
		$t_ghichu_lich->FK_CONG_TY->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONG_TY"]);
		$t_ghichu_lich->FK_CONG_TY->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONG_TY"];

		// C_YEAR
		$t_ghichu_lich->C_YEAR->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_YEAR"]);
		$t_ghichu_lich->C_YEAR->AdvancedSearch->SearchOperator = @$_GET["z_C_YEAR"];

		// C_WEEK
		$t_ghichu_lich->C_WEEK->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_WEEK"]);
		$t_ghichu_lich->C_WEEK->AdvancedSearch->SearchOperator = @$_GET["z_C_WEEK"];

		// C_CONTENT
		$t_ghichu_lich->C_CONTENT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CONTENT"]);
		$t_ghichu_lich->C_CONTENT->AdvancedSearch->SearchOperator = @$_GET["z_C_CONTENT"];

		// C_USER_ADD
		$t_ghichu_lich->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_ghichu_lich->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_TIME_ADD
		$t_ghichu_lich->C_TIME_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_ADD"]);
		$t_ghichu_lich->C_TIME_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_ADD"];

		// C_USER_EDIT
		$t_ghichu_lich->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_ghichu_lich->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_TIME_EDIT
		$t_ghichu_lich->C_TIME_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TIME_EDIT"]);
		$t_ghichu_lich->C_TIME_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_TIME_EDIT"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_ghichu_lich;

		// Call Recordset Selecting event
		$t_ghichu_lich->Recordset_Selecting($t_ghichu_lich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_ghichu_lich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);
		// Call Recordset Selected event
		$t_ghichu_lich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ghichu_lich;
		$sFilter = $t_ghichu_lich->KeyFilter();

		// Call Row Selecting event
		$t_ghichu_lich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_ghichu_lich->CurrentFilter = $sFilter;
		$sSql = $t_ghichu_lich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_ghichu_lich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_ghichu_lich;
		$t_ghichu_lich->SB_NOTE_ID->setDbValue($rs->fields('SB_NOTE_ID'));
		$t_ghichu_lich->FK_CONG_TY->setDbValue($rs->fields('FK_CONGTY'));
		$t_ghichu_lich->C_YEAR->setDbValue($rs->fields('C_YEAR'));
		$t_ghichu_lich->C_WEEK->setDbValue($rs->fields('C_WEEK'));
		$t_ghichu_lich->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_ghichu_lich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_ghichu_lich->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$t_ghichu_lich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_ghichu_lich->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_ghichu_lich;

		// Initialize URLs
		$this->ViewUrl = $t_ghichu_lich->ViewUrl();
		$this->EditUrl = $t_ghichu_lich->EditUrl();
		$this->InlineEditUrl = $t_ghichu_lich->InlineEditUrl();
		$this->CopyUrl = $t_ghichu_lich->CopyUrl();
		$this->InlineCopyUrl = $t_ghichu_lich->InlineCopyUrl();
		$this->DeleteUrl = $t_ghichu_lich->DeleteUrl();

		// Call Row_Rendering event
		$t_ghichu_lich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_ghichu_lich->FK_CONG_TY->CellCssStyle = ""; $t_ghichu_lich->FK_CONG_TY->CellCssClass = "";
		$t_ghichu_lich->FK_CONG_TY->CellAttrs = array(); $t_ghichu_lich->FK_CONG_TY->ViewAttrs = array(); $t_ghichu_lich->FK_CONG_TY->EditAttrs = array();

		// C_YEAR
		$t_ghichu_lich->C_YEAR->CellCssStyle = ""; $t_ghichu_lich->C_YEAR->CellCssClass = "";
		$t_ghichu_lich->C_YEAR->CellAttrs = array(); $t_ghichu_lich->C_YEAR->ViewAttrs = array(); $t_ghichu_lich->C_YEAR->EditAttrs = array();

		// C_WEEK
		$t_ghichu_lich->C_WEEK->CellCssStyle = ""; $t_ghichu_lich->C_WEEK->CellCssClass = "";
		$t_ghichu_lich->C_WEEK->CellAttrs = array(); $t_ghichu_lich->C_WEEK->ViewAttrs = array(); $t_ghichu_lich->C_WEEK->EditAttrs = array();

		// C_CONTENT
		$t_ghichu_lich->C_CONTENT->CellCssStyle = ""; $t_ghichu_lich->C_CONTENT->CellCssClass = "";
		$t_ghichu_lich->C_CONTENT->CellAttrs = array(); $t_ghichu_lich->C_CONTENT->ViewAttrs = array(); $t_ghichu_lich->C_CONTENT->EditAttrs = array();
		if ($t_ghichu_lich->RowType == EW_ROWTYPE_VIEW) { // View row

			// SB_NOTE_ID
			$t_ghichu_lich->SB_NOTE_ID->ViewValue = $t_ghichu_lich->SB_NOTE_ID->CurrentValue;
			$t_ghichu_lich->SB_NOTE_ID->CssStyle = "";
			$t_ghichu_lich->SB_NOTE_ID->CssClass = "";
			$t_ghichu_lich->SB_NOTE_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_ghichu_lich->FK_CONG_TY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_ghichu_lich->FK_CONG_TY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $t_ghichu_lich->FK_CONG_TY->CurrentValue;
				}
			} else {
				$t_ghichu_lich->FK_CONG_TY->ViewValue = NULL;
			}
			$t_ghichu_lich->FK_CONG_TY->CssStyle = "";
			$t_ghichu_lich->FK_CONG_TY->CssClass = "";
			$t_ghichu_lich->FK_CONG_TY->ViewCustomAttributes = "";

			// C_YEAR
			if (strval($t_ghichu_lich->C_YEAR->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_YEAR->CurrentValue) {
					case "0":
						$t_ghichu_lich->C_YEAR->ViewValue = "2013";
						break;
					case "1":
						$t_ghichu_lich->C_YEAR->ViewValue = "2014";
						break;
					default:
						$t_ghichu_lich->C_YEAR->ViewValue = $t_ghichu_lich->C_YEAR->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_YEAR->ViewValue = NULL;
			}
			$t_ghichu_lich->C_YEAR->CssStyle = "";
			$t_ghichu_lich->C_YEAR->CssClass = "";
			$t_ghichu_lich->C_YEAR->ViewCustomAttributes = "";

			// C_WEEK
			if (strval($t_ghichu_lich->C_WEEK->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_WEEK->CurrentValue) {
					case "1":
						$t_ghichu_lich->C_WEEK->ViewValue = "Tuan 1";
						break;
					default:
                                                IF ($t_ghichu_lich->C_WEEK->CurrentValue < 9 ) $t_ghichu_lich->C_WEEK->CurrentValue  = "0".$t_ghichu_lich->C_WEEK->CurrentValue; 
						$t_ghichu_lich->C_WEEK->ViewValue = $t_ghichu_lich->C_WEEK->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_WEEK->ViewValue = NULL;
			}
			$t_ghichu_lich->C_WEEK->CssStyle = "";
			$t_ghichu_lich->C_WEEK->CssClass = "";
			$t_ghichu_lich->C_WEEK->ViewCustomAttributes = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->ViewValue = $t_ghichu_lich->C_CONTENT->CurrentValue;
			$t_ghichu_lich->C_CONTENT->CssStyle = "";
			$t_ghichu_lich->C_CONTENT->CssClass = "";
			$t_ghichu_lich->C_CONTENT->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_ghichu_lich->C_USER_ADD->ViewValue = $t_ghichu_lich->C_USER_ADD->CurrentValue;
			$t_ghichu_lich->C_USER_ADD->CssStyle = "";
			$t_ghichu_lich->C_USER_ADD->CssClass = "";
			$t_ghichu_lich->C_USER_ADD->ViewCustomAttributes = "";

			// C_TIME_ADD
			$t_ghichu_lich->C_TIME_ADD->ViewValue = $t_ghichu_lich->C_TIME_ADD->CurrentValue;
			$t_ghichu_lich->C_TIME_ADD->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_ADD->ViewValue, 7);
			$t_ghichu_lich->C_TIME_ADD->CssStyle = "";
			$t_ghichu_lich->C_TIME_ADD->CssClass = "";
			$t_ghichu_lich->C_TIME_ADD->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_ghichu_lich->C_USER_EDIT->ViewValue = $t_ghichu_lich->C_USER_EDIT->CurrentValue;
			$t_ghichu_lich->C_USER_EDIT->CssStyle = "";
			$t_ghichu_lich->C_USER_EDIT->CssClass = "";
			$t_ghichu_lich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_TIME_EDIT
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = $t_ghichu_lich->C_TIME_EDIT->CurrentValue;
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_EDIT->ViewValue, 7);
			$t_ghichu_lich->C_TIME_EDIT->CssStyle = "";
			$t_ghichu_lich->C_TIME_EDIT->CssClass = "";
			$t_ghichu_lich->C_TIME_EDIT->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_ghichu_lich->FK_CONG_TY->HrefValue = "";
			$t_ghichu_lich->FK_CONG_TY->TooltipValue = "";

			// C_YEAR
			$t_ghichu_lich->C_YEAR->HrefValue = "";
			$t_ghichu_lich->C_YEAR->TooltipValue = "";

			// C_WEEK
			$t_ghichu_lich->C_WEEK->HrefValue = "";
			$t_ghichu_lich->C_WEEK->TooltipValue = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->HrefValue = "";
			$t_ghichu_lich->C_CONTENT->TooltipValue = "";
		} elseif ($t_ghichu_lich->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY
			$t_ghichu_lich->FK_CONG_TY->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty`";
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
			$t_ghichu_lich->FK_CONG_TY->EditValue = $arwrk;

			// C_YEAR
			$t_ghichu_lich->C_YEAR->EditCustomAttributes = "";
			$arwrk = array();
                        $str=substr(ew_CurrentDate(), 0, 4) ;
                        $num = (int)$str;
                        for ($i=$num;$i>($num-10);$i--)
                        {
                            $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_YEAR->EditValue = $arwrk;

			// C_WEEK
			$t_ghichu_lich->C_WEEK->EditCustomAttributes = "";
                        $arwrk = array();
                        $week= date("W", mktime(0,0,0,12,28,2013));
                        $number_week = (int)$week;
                        for ($j=$number_week;$j>0;$j--)    
                        {
                                $arwrk[] = array($j, $j);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_WEEK->EditValue = $arwrk;


			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->EditCustomAttributes = "";
			$t_ghichu_lich->C_CONTENT->EditValue = ew_HtmlEncode($t_ghichu_lich->C_CONTENT->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		if ($t_ghichu_lich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_ghichu_lich->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_ghichu_lich;

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
		global $t_ghichu_lich;
		$t_ghichu_lich->SB_NOTE_ID->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_SB_NOTE_ID");
		$t_ghichu_lich->FK_CONG_TY->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_FK_CONG_TY");
		$t_ghichu_lich->C_YEAR->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_YEAR");
		$t_ghichu_lich->C_WEEK->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_WEEK");
		$t_ghichu_lich->C_CONTENT->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_CONTENT");
		$t_ghichu_lich->C_USER_ADD->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_USER_ADD");
		$t_ghichu_lich->C_TIME_ADD->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_TIME_ADD");
		$t_ghichu_lich->C_USER_EDIT->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_USER_EDIT");
		$t_ghichu_lich->C_TIME_EDIT->AdvancedSearch->SearchValue = $t_ghichu_lich->getAdvancedSearch("x_C_TIME_EDIT");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_ghichu_lich;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_ghichu_lich->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_ghichu_lich->ExportAll) {
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
		if ($t_ghichu_lich->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_ghichu_lich, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_ghichu_lich->SB_NOTE_ID);
				$ExportDoc->ExportCaption($t_ghichu_lich->FK_CONG_TY);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_YEAR);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_WEEK);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_CONTENT);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_USER_ADD);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_TIME_ADD);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_ghichu_lich->C_TIME_EDIT);
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
				$t_ghichu_lich->CssClass = "";
				$t_ghichu_lich->CssStyle = "";
				$t_ghichu_lich->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_ghichu_lich->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('SB_NOTE_ID', $t_ghichu_lich->SB_NOTE_ID->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONG_TY', $t_ghichu_lich->FK_CONG_TY->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_YEAR', $t_ghichu_lich->C_YEAR->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_WEEK', $t_ghichu_lich->C_WEEK->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_CONTENT', $t_ghichu_lich->C_CONTENT->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_ghichu_lich->C_USER_ADD->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ADD', $t_ghichu_lich->C_TIME_ADD->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_ghichu_lich->C_USER_EDIT->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_EDIT', $t_ghichu_lich->C_TIME_EDIT->ExportValue($t_ghichu_lich->Export, $t_ghichu_lich->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_ghichu_lich->SB_NOTE_ID);
					$ExportDoc->ExportField($t_ghichu_lich->FK_CONG_TY);
					$ExportDoc->ExportField($t_ghichu_lich->C_YEAR);
					$ExportDoc->ExportField($t_ghichu_lich->C_WEEK);
					$ExportDoc->ExportField($t_ghichu_lich->C_CONTENT);
					$ExportDoc->ExportField($t_ghichu_lich->C_USER_ADD);
					$ExportDoc->ExportField($t_ghichu_lich->C_TIME_ADD);
					$ExportDoc->ExportField($t_ghichu_lich->C_USER_EDIT);
					$ExportDoc->ExportField($t_ghichu_lich->C_TIME_EDIT);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_ghichu_lich->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_ghichu_lich->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_ghichu_lich->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_ghichu_lich->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_ghichu_lich->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_ghichu_lich;
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
		if ($t_ghichu_lich->Email_Sending($Email, $EventArgs))
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
		global $t_ghichu_lich;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_ghichu_lich->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_ghichu_lich->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_ghichu_lich->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->SB_NOTE_ID); // SB_NOTE_ID
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->FK_CONG_TY); // FK_CONGTY
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_YEAR); // C_YEAR
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_WEEK); // C_WEEK
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_CONTENT); // C_CONTENT
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_TIME_ADD); // C_TIME_ADD
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_ghichu_lich->C_TIME_EDIT); // C_TIME_EDIT

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_ghichu_lich->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_ghichu_lich->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_ghichu_lich;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_ghichu_lich->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_ghichu_lich->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_ghichu_lich->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_ghichu_lich->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_ghichu_lich->GetAdvancedSearch("w_" . $FldParm);
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
