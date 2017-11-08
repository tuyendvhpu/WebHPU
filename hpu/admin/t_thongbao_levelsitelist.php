<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_thongbao_levelsiteinfo.php" ?>
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
$t_thongbao_levelsite_list = new ct_thongbao_levelsite_list();
$Page =& $t_thongbao_levelsite_list;

// Page init
$t_thongbao_levelsite_list->Page_Init();

// Page main
$t_thongbao_levelsite_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_thongbao_levelsite->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_levelsite_list = new ew_Page("t_thongbao_levelsite_list");

// page properties
t_thongbao_levelsite_list.PageID = "list"; // page ID
t_thongbao_levelsite_list.FormID = "ft_thongbao_levelsitelist"; // form ID
var EW_PAGE_ID = t_thongbao_levelsite_list.PageID; // for backward compatibility

// extend page with validate function for search
t_thongbao_levelsite_list.ValidateSearch = function(fobj) {
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
t_thongbao_levelsite_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_levelsite_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_levelsite_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_levelsite_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($t_thongbao_levelsite->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$t_thongbao_levelsite_list->lTotalRecs = $t_thongbao_levelsite->SelectRecordCount();
	} else {
		if ($rs = $t_thongbao_levelsite_list->LoadRecordset())
			$t_thongbao_levelsite_list->lTotalRecs = $rs->RecordCount();
	}
	$t_thongbao_levelsite_list->lStartRec = 1;
	if ($t_thongbao_levelsite_list->lDisplayRecs <= 0 || ($t_thongbao_levelsite->Export <> "" && $t_thongbao_levelsite->ExportAll)) // Display all records
		$t_thongbao_levelsite_list->lDisplayRecs = $t_thongbao_levelsite_list->lTotalRecs;
	if (!($t_thongbao_levelsite->Export <> "" && $t_thongbao_levelsite->ExportAll))
		$t_thongbao_levelsite_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_thongbao_levelsite_list->LoadRecordset($t_thongbao_levelsite_list->lStartRec-1, $t_thongbao_levelsite_list->lDisplayRecs);
?>
<p class="pheader"><span class="phpmaker" style="white-space: nowrap;"><?php echo $t_thongbao_levelsite->TableCaption() ?>
<?php if ($t_thongbao_levelsite->Export == "" && $t_thongbao_levelsite->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_thongbao_levelsite_list->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_thongbao_levelsite" id="emf_t_thongbao_levelsite" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_thongbao_levelsite',hdr:ewLanguage.Phrase('ExportToEmail'),f:document.ft_thongbao_levelsitelist,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span> 
   <?php 
$conn = ew_Connect();
global $Security;
$sSqlWrk = "SELECT * FROM t_thongbao_mainlevel";
$sWhereWrk = "t_thongbao_mainlevel.FK_CONGTY_ID =".$Security->CurrentUserOption()." And (C_TYPE = 1) And (FK_NGUOIDUNG_ID = 0)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$rowswrk = count($arwrk);
   ?>
 <?php if($rowswrk) {?>
    <a style="text-align: right;float: right;font-size: 12px;" href="t_thongbao_mainlevel_oblist.php" id="event_calendar">Thông báo liên quan <img src="images/new.gif"></a>
 <?php } else {  ?>  
    <a style="text-align: right;float: right;font-size: 12px;" href="t_thongbao_mainlevel_oblist.php" id="event_calendar">Thông báo liên quan</a>
 <?php } ?>   
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($t_thongbao_levelsite->Export == "" && $t_thongbao_levelsite->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_thongbao_levelsite_list);" style="text-decoration: none;"><img id="t_thongbao_levelsite_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="t_thongbao_levelsite_list_SearchPanel">
<form name="ft_thongbao_levelsitelistsrch" id="ft_thongbao_levelsitelistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_thongbao_levelsite_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_thongbao_levelsite">
<?php
if ($gsSearchError == "")
	$t_thongbao_levelsite_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_thongbao_levelsite->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_thongbao_levelsite_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker"><?php echo $t_thongbao_levelsite->FK_CONGTY_ID->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CONGTY_ID" id="z_FK_CONGTY_ID" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_thongbao_levelsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_thongbao_levelsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if (isAdmin())
{
        if (is_array($t_thongbao_levelsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_levelsite->FK_CONGTY_ID->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
      if (is_array($t_thongbao_levelsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_levelsite->FK_CONGTY_ID->EditValue;
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
        <?php    }  
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
		<td><span class="phpmaker"><?php echo $t_thongbao_levelsite->C_TITLE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_TITLE" id="z_C_TITLE" value="LIKE"></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_thongbao_levelsite->C_TITLE->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_thongbao_levelsite->C_TITLE->EditValue ?>"<?php echo $t_thongbao_levelsite->C_TITLE->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker"><?php echo $t_thongbao_levelsite->C_PUBLISH->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_PUBLISH" id="z_C_PUBLISH" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_levelsite->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_PUBLISH->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_levelsite->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
		<td><span class="phpmaker"><?php echo $t_thongbao_levelsite->C_ACTIVE->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE" id="z_C_ACTIVE" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_levelsite->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_ACTIVE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_levelsite->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
		<td><span class="phpmaker"><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldCaption() ?></span></td>
		<td><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_NOTICE_HIT" id="z_C_NOTICE_HIT" value="="></span></td>
		<td>			
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_NOTICE_HIT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_NOTICE_HIT" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_NOTICE_HIT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_NOTICE_HIT->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
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
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_thongbao_levelsite->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_thongbao_levelsite->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_thongbao_levelsite->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_thongbao_levelsite->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_levelsite_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_thongbao_levelsite->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_thongbao_levelsite->CurrentAction <> "gridadd" && $t_thongbao_levelsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_thongbao_levelsite_list->Pager)) $t_thongbao_levelsite_list->Pager = new cNumericPager($t_thongbao_levelsite_list->lStartRec, $t_thongbao_levelsite_list->lDisplayRecs, $t_thongbao_levelsite_list->lTotalRecs, $t_thongbao_levelsite_list->lRecRange) ?>
<?php if ($t_thongbao_levelsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_thongbao_levelsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_thongbao_levelsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_thongbao_levelsite_list->sSrchWhere == "0=101") { ?>
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
<?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
<a href="<?php echo $t_thongbao_levelsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_thongbao_levelsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_thongbao_levelsitelist, '<?php echo $t_thongbao_levelsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive() && $Security->CanActiveex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_thongbao_levelsitelist, '<?php echo $t_thongbao_levelsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ft_thongbao_levelsitelist" id="ft_thongbao_levelsitelist" class="ewForm" action="" method="post">
<div id="gmp_t_thongbao_levelsite" class="ewGridMiddlePanel">
<?php if ($t_thongbao_levelsite_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $t_thongbao_levelsite->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$t_thongbao_levelsite_list->RenderListOptions();

// Render list options (header, left)
$t_thongbao_levelsite_list->ListOptions->Render("header", "left");
?>
<?php if ($t_thongbao_levelsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->FK_CONGTY_ID) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->FK_CONGTY_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->FK_CONGTY_ID) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->FK_CONGTY_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->FK_CONGTY_ID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->FK_CONGTY_ID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_TITLE->Visible) { // C_TITLE ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_TITLE) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_TITLE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_TITLE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_TITLE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_TITLE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_PUBLISH) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_PUBLISH->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_PUBLISH) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td style="text-align: center" ><?php echo "Trạng thái <br/> Mainsite" ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_PUBLISH->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_PUBLISH->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_ACTIVE) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_ACTIVE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_ACTIVE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td style="text-align: center"><?php echo "Trạng thái <br/> Levelsite" ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_ACTIVE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_ACTIVE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_BEGIN_DATE) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_BEGIN_DATE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_BEGIN_DATE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->C_BEGIN_DATE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_BEGIN_DATE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_BEGIN_DATE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_END_DATE->Visible) { // C_END_DATE ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_END_DATE) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_END_DATE->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_END_DATE) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->C_END_DATE->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_END_DATE->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_END_DATE->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_ORDER) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_ORDER->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_ORDER) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->C_ORDER->FldCaption() ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_ORDER->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_ORDER->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>
 <?php if ($t_thongbao_levelsite->C_KEYWORD->Visible) { // C_KEYWORD ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_KEYWORD) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_KEYWORD->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_KEYWORD) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $t_thongbao_levelsite->C_KEYWORD->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_KEYWORD->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_KEYWORD->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($t_thongbao_levelsite->C_NOTICE_HIT->Visible) { // C_NOTICE_HIT ?>
	<?php if ($t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_NOTICE_HIT) == "") { ?>
		<td><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_thongbao_levelsite->SortUrl($t_thongbao_levelsite->C_NOTICE_HIT) ?>',2);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td style="text-align: center"><?php echo "Thông báo <br/> nổi bật" ?></td><td style="width: 10px;"><?php if ($t_thongbao_levelsite->C_NOTICE_HIT->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_thongbao_levelsite->C_NOTICE_HIT->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>               
<?php

// Render list options (header, right)
$t_thongbao_levelsite_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($t_thongbao_levelsite->ExportAll && $t_thongbao_levelsite->Export <> "") {
	$t_thongbao_levelsite_list->lStopRec = $t_thongbao_levelsite_list->lTotalRecs;
} else {
	$t_thongbao_levelsite_list->lStopRec = $t_thongbao_levelsite_list->lStartRec + $t_thongbao_levelsite_list->lDisplayRecs - 1; // Set the last record to display
}
$t_thongbao_levelsite_list->lRecCount = $t_thongbao_levelsite_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $t_thongbao_levelsite_list->lStartRec > 1)
		$rs->Move($t_thongbao_levelsite_list->lStartRec - 1);
}

// Initialize aggregate
$t_thongbao_levelsite->RowType = EW_ROWTYPE_AGGREGATEINIT;
$t_thongbao_levelsite_list->RenderRow();
$t_thongbao_levelsite_list->lRowCnt = 0;
while (($t_thongbao_levelsite->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_thongbao_levelsite_list->lRecCount < $t_thongbao_levelsite_list->lStopRec) {
	$t_thongbao_levelsite_list->lRecCount++;
	if (intval($t_thongbao_levelsite_list->lRecCount) >= intval($t_thongbao_levelsite_list->lStartRec)) {
		$t_thongbao_levelsite_list->lRowCnt++;

	// Init row class and style
	$t_thongbao_levelsite->CssClass = "";
	$t_thongbao_levelsite->CssStyle = "";
	$t_thongbao_levelsite->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($t_thongbao_levelsite->CurrentAction == "gridadd") {
		$t_thongbao_levelsite_list->LoadDefaultValues(); // Load default values
	} else {
		$t_thongbao_levelsite_list->LoadRowValues($rs); // Load row values
	}
	$t_thongbao_levelsite->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_thongbao_levelsite_list->RenderRow();

	// Render list options
	$t_thongbao_levelsite_list->RenderListOptions();
?>
	<tr<?php echo $t_thongbao_levelsite->RowAttributes() ?>>
<?php

// Render list options (body, left)
$t_thongbao_levelsite_list->ListOptions->Render("body", "left");
?>
	<?php if ($t_thongbao_levelsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
		<td<?php echo $t_thongbao_levelsite->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->FK_CONGTY_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_TITLE->Visible) { // C_TITLE ?>
		<td<?php echo $t_thongbao_levelsite->C_TITLE->CellAttributes() ?>>
<div style="width:300px" <?php echo $t_thongbao_levelsite->C_TITLE->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_TITLE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
		<td<?php echo $t_thongbao_levelsite->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_PUBLISH->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_PUBLISH->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_ACTIVE->Visible) { // C_ACTIVE ?>
		<td<?php echo $t_thongbao_levelsite->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_ACTIVE->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_ACTIVE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
		<td<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_BEGIN_DATE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_END_DATE->Visible) { // C_END_DATE ?>
		<td<?php echo $t_thongbao_levelsite->C_END_DATE->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_END_DATE->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_END_DATE->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_ORDER->Visible) { // C_ORDER ?>
		<td<?php echo $t_thongbao_levelsite->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_ORDER->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_ORDER->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_KEYWORD->Visible) { // C_KEYWORD ?>
		<td<?php echo $t_thongbao_levelsite->C_KEYWORD->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_KEYWORD->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_KEYWORD->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_thongbao_levelsite->C_NOTICE_HIT->Visible) { // C_NOTICE_HIT ?>
		<td<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->CellAttributes() ?>>
<div<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->ViewAttributes() ?>><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t_thongbao_levelsite_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($t_thongbao_levelsite->CurrentAction <> "gridadd")
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
<?php if ($t_thongbao_levelsite_list->lTotalRecs > 0) { ?>
<?php if ($t_thongbao_levelsite->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_thongbao_levelsite->CurrentAction <> "gridadd" && $t_thongbao_levelsite->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_thongbao_levelsite_list->Pager)) $t_thongbao_levelsite_list->Pager = new cNumericPager($t_thongbao_levelsite_list->lStartRec, $t_thongbao_levelsite_list->lDisplayRecs, $t_thongbao_levelsite_list->lTotalRecs, $t_thongbao_levelsite_list->lRecRange) ?>
<?php if ($t_thongbao_levelsite_list->Pager->RecordCount > 0) { ?>
	<?php if ($t_thongbao_levelsite_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_thongbao_levelsite_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_thongbao_levelsite_list->PageUrl() ?>start=<?php echo $t_thongbao_levelsite_list->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_thongbao_levelsite_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	<?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t_thongbao_levelsite_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_thongbao_levelsite_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($t_thongbao_levelsite_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
<a href="<?php echo $t_thongbao_levelsite_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($t_thongbao_levelsite_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_thongbao_levelsitelist, '<?php echo $t_thongbao_levelsite_list->MultiDeleteUrl ?>', ewLanguage.Phrase('DeleteMultiConfirmMsg'));return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive() && $Security->CanActiveex()) { ?>
<a href="" onclick="ew_SubmitSelected(document.ft_thongbao_levelsitelist, '<?php echo $t_thongbao_levelsite_list->MultiUpdateUrl ?>');return false;"><?php echo $Language->Phrase("UpdateSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_thongbao_levelsite->Export == "" && $t_thongbao_levelsite->CurrentAction == "") { ?>
<?php } ?>
<?php if ($t_thongbao_levelsite->Export == "") { ?>


<script language="JavaScript" type="text/javascript">
     <?php if (!isset($_GET['t'])) { ?>
    ew_ToggleSearchPanel(t_thongbao_levelsite_list);
       <?php } ?>
</script>


<?php } ?>
<?php include "footer.php" ?>
<?php
$t_thongbao_levelsite_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_levelsite_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 't_thongbao_levelsite';

	// Page object name
	var $PageObjName = 't_thongbao_levelsite_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_thongbao_levelsite;
		if ($t_thongbao_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_thongbao_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_thongbao_levelsite;
		if ($t_thongbao_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_thongbao_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_thongbao_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_thongbao_levelsite_list() {
		global $conn, $Language, $Security;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_levelsite)
		$GLOBALS["t_thongbao_levelsite"] = new ct_thongbao_levelsite();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["t_thongbao_levelsite"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "t_thongbao_levelsitedelete.php";
                if (CurrentUserLevel() == 9) $this->MultiUpdateUrl = "t_thongbao_levelsiteupdate_kp.php";
		 else $this->MultiUpdateUrl = "t_thongbao_levelsiteupdate.php";

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_thongbao_levelsite', TRUE);

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
		global $t_thongbao_levelsite;

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
			$t_thongbao_levelsite->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_thongbao_levelsite->Export = $_POST["exporttype"];
		} else {
			$t_thongbao_levelsite->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_thongbao_levelsite->Export; // Get export parameter, used in header
		$gsExportFile = $t_thongbao_levelsite->TableVar; // Get export file, used in header
		if (in_array($t_thongbao_levelsite->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_thongbao_levelsite->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_thongbao_levelsite->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_thongbao_levelsite->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_thongbao_levelsite->Export == "csv") {
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
		global $objForm, $Language, $gsSearchError, $Security, $t_thongbao_levelsite;

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
			$t_thongbao_levelsite->Recordset_SearchValidated();

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
		if ($t_thongbao_levelsite->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_thongbao_levelsite->getRecordsPerPage(); // Restore from Session
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
		$t_thongbao_levelsite->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_thongbao_levelsite->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $t_thongbao_levelsite->getSearchWhere();
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
		$t_thongbao_levelsite->setSessionWhere($sFilter);
		$t_thongbao_levelsite->CurrentFilter = "";

		// Export data only
		if (in_array($t_thongbao_levelsite->Export, array("html","word","excel","xml","csv","email"))) {
			$this->ExportData();
			if ($t_thongbao_levelsite->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Advanced search WHERE clause based on QueryString
	function AdvancedSearchWhere() {
		global $Security, $t_thongbao_levelsite;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->PK_THONGBAO, FALSE); // PK_THONGBAO
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->FK_CONGTY_ID, FALSE); // FK_CONGTY_ID
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->FK_DOITUONG_ID, FALSE); // FK_DOITUONG_ID
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_TITLE, FALSE); // C_TITLE
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_CONTENT, FALSE); // C_CONTENT
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_PUBLISH, FALSE); // C_PUBLISH
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_ACTIVE, FALSE); // C_ACTIVE
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_BEGIN_DATE, FALSE); // C_BEGIN_DATE
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_END_DATE, FALSE); // C_END_DATE
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_ORDER, FALSE); // C_ORDER
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_USER_ADD, FALSE); // C_USER_ADD
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_ADD_TIME, FALSE); // C_ADD_TIME
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_USER_EDIT, FALSE); // C_USER_EDIT
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_EDIT_TIME, FALSE); // C_EDIT_TIME
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->FK_NGUOIDUNG_ID, FALSE); // FK_NGUOIDUNG_ID
                $this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_KEYWORD, FALSE); // C_KEYWORD
		$this->BuildSearchSql($sWhere, $t_thongbao_levelsite->C_NOTICE_HIT, FALSE); // C_NOTICE_HIT
		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_thongbao_levelsite->PK_THONGBAO); // PK_THONGBAO
			$this->SetSearchParm($t_thongbao_levelsite->FK_CONGTY_ID); // FK_CONGTY_ID
			$this->SetSearchParm($t_thongbao_levelsite->FK_DOITUONG_ID); // FK_DOITUONG_ID
			$this->SetSearchParm($t_thongbao_levelsite->C_TITLE); // C_TITLE
			$this->SetSearchParm($t_thongbao_levelsite->C_CONTENT); // C_CONTENT
			$this->SetSearchParm($t_thongbao_levelsite->C_PUBLISH); // C_PUBLISH
			$this->SetSearchParm($t_thongbao_levelsite->C_ACTIVE); // C_ACTIVE
			$this->SetSearchParm($t_thongbao_levelsite->C_BEGIN_DATE); // C_BEGIN_DATE
			$this->SetSearchParm($t_thongbao_levelsite->C_END_DATE); // C_END_DATE
			$this->SetSearchParm($t_thongbao_levelsite->C_ORDER); // C_ORDER
			$this->SetSearchParm($t_thongbao_levelsite->C_USER_ADD); // C_USER_ADD
			$this->SetSearchParm($t_thongbao_levelsite->C_ADD_TIME); // C_ADD_TIME
			$this->SetSearchParm($t_thongbao_levelsite->C_USER_EDIT); // C_USER_EDIT
			$this->SetSearchParm($t_thongbao_levelsite->C_EDIT_TIME); // C_EDIT_TIME
			$this->SetSearchParm($t_thongbao_levelsite->FK_NGUOIDUNG_ID); // FK_NGUOIDUNG_ID
                        $this->SetSearchParm($t_thongbao_levelsite->C_KEYWORD); // C_KEYWORD
			$this->SetSearchParm($t_thongbao_levelsite->C_NOTICE_HIT); // C_NOTICE_HIT
                        $this->SetSearchParm($t_thongbao_levelsite->C_KEYWORD); // C_KEYWORD
			$this->SetSearchParm($t_thongbao_levelsite->C_NOTICE_HIT); // C_NOTICE_HIT
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
		global $t_thongbao_levelsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_thongbao_levelsite->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_thongbao_levelsite->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_thongbao_levelsite->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_thongbao_levelsite->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_thongbao_levelsite->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Get search parameters
	function GetSearchParm(&$Fld) {
		global $t_thongbao_levelsite;
		$FldParm = substr($Fld->FldVar, 2);
		$Fld->AdvancedSearch->SearchValue = $t_thongbao_levelsite->GetAdvancedSearch("x_$FldParm");
		$Fld->AdvancedSearch->SearchOperator = $t_thongbao_levelsite->GetAdvancedSearch("z_$FldParm");
		$Fld->AdvancedSearch->SearchCondition = $t_thongbao_levelsite->GetAdvancedSearch("v_$FldParm");
		$Fld->AdvancedSearch->SearchValue2 = $t_thongbao_levelsite->GetAdvancedSearch("y_$FldParm");
		$Fld->AdvancedSearch->SearchOperator2 = $t_thongbao_levelsite->GetAdvancedSearch("w_$FldParm");
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
		global $t_thongbao_levelsite;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $t_thongbao_levelsite->C_TITLE, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $t_thongbao_levelsite->C_CONTENT, $Keyword);
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
		global $Security, $t_thongbao_levelsite;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $t_thongbao_levelsite->BasicSearchKeyword;
		$sSearchType = $t_thongbao_levelsite->BasicSearchType;
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
			$t_thongbao_levelsite->setSessionBasicSearchKeyword($sSearchKeyword);
			$t_thongbao_levelsite->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $t_thongbao_levelsite;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$t_thongbao_levelsite->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $t_thongbao_levelsite;
		$t_thongbao_levelsite->setSessionBasicSearchKeyword("");
		$t_thongbao_levelsite->setSessionBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {
		global $t_thongbao_levelsite;
		$t_thongbao_levelsite->setAdvancedSearch("x_PK_THONGBAO", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_FK_CONGTY_ID", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_FK_DOITUONG_ID", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_TITLE", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_CONTENT", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_PUBLISH", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_ACTIVE", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_BEGIN_DATE", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_END_DATE", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_ORDER", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_USER_ADD", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_ADD_TIME", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_USER_EDIT", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_EDIT_TIME", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_FK_NGUOIDUNG_ID", "");
                $t_thongbao_levelsite->setAdvancedSearch("x_C_KEYWORD", "");
		$t_thongbao_levelsite->setAdvancedSearch("x_C_NOTICE_HIT", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $t_thongbao_levelsite;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		if (@$_GET["x_PK_THONGBAO"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_CONGTY_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_DOITUONG_ID"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_TITLE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_CONTENT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_PUBLISH"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ACTIVE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_BEGIN_DATE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_END_DATE"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ORDER"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_ADD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_ADD_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_USER_EDIT"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_EDIT_TIME"] <> "") $bRestore = FALSE;
		if (@$_GET["x_FK_NGUOIDUNG_ID"] <> "") $bRestore = FALSE;
                if (@$_GET["x_C_KEYWORD"] <> "") $bRestore = FALSE;
		if (@$_GET["x_C_NOTICE_HIT"] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$t_thongbao_levelsite->BasicSearchKeyword = $t_thongbao_levelsite->getSessionBasicSearchKeyword();
			$t_thongbao_levelsite->BasicSearchType = $t_thongbao_levelsite->getSessionBasicSearchType();

			// Restore advanced search values
			$this->GetSearchParm($t_thongbao_levelsite->PK_THONGBAO);
			$this->GetSearchParm($t_thongbao_levelsite->FK_CONGTY_ID);
			$this->GetSearchParm($t_thongbao_levelsite->FK_DOITUONG_ID);
			$this->GetSearchParm($t_thongbao_levelsite->C_TITLE);
			$this->GetSearchParm($t_thongbao_levelsite->C_CONTENT);
			$this->GetSearchParm($t_thongbao_levelsite->C_PUBLISH);
			$this->GetSearchParm($t_thongbao_levelsite->C_ACTIVE);
			$this->GetSearchParm($t_thongbao_levelsite->C_BEGIN_DATE);
			$this->GetSearchParm($t_thongbao_levelsite->C_END_DATE);
			$this->GetSearchParm($t_thongbao_levelsite->C_ORDER);
			$this->GetSearchParm($t_thongbao_levelsite->C_USER_ADD);
			$this->GetSearchParm($t_thongbao_levelsite->C_ADD_TIME);
			$this->GetSearchParm($t_thongbao_levelsite->C_USER_EDIT);
			$this->GetSearchParm($t_thongbao_levelsite->C_EDIT_TIME);
			$this->GetSearchParm($t_thongbao_levelsite->FK_NGUOIDUNG_ID);
                        $this->GetSearchParm($t_thongbao_levelsite->C_KEYWORD);
			$this->GetSearchParm($t_thongbao_levelsite->C_NOTICE_HIT);
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $t_thongbao_levelsite;

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$t_thongbao_levelsite->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_thongbao_levelsite->CurrentOrderType = @$_GET["ordertype"];
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->FK_CONGTY_ID, $bCtrl); // FK_CONGTY_ID
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_TITLE, $bCtrl); // C_TITLE
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_PUBLISH, $bCtrl); // C_PUBLISH
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_ACTIVE, $bCtrl); // C_ACTIVE
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_BEGIN_DATE, $bCtrl); // C_BEGIN_DATE
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_END_DATE, $bCtrl); // C_END_DATE
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_ORDER, $bCtrl); // C_ORDER
                        $t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_KEYWORD, $bCtrl); // C_KEYWORD
			$t_thongbao_levelsite->UpdateSort($t_thongbao_levelsite->C_NOTICE_HIT, $bCtrl); // C_NOTICE_HIT
			$t_thongbao_levelsite->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $t_thongbao_levelsite;
		$sOrderBy = $t_thongbao_levelsite->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($t_thongbao_levelsite->SqlOrderBy() <> "") {
				$sOrderBy = $t_thongbao_levelsite->SqlOrderBy();
				$t_thongbao_levelsite->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $t_thongbao_levelsite;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$t_thongbao_levelsite->setSessionOrderBy($sOrderBy);
				$t_thongbao_levelsite->FK_CONGTY_ID->setSort("");
				$t_thongbao_levelsite->C_TITLE->setSort("");
				$t_thongbao_levelsite->C_PUBLISH->setSort("");
				$t_thongbao_levelsite->C_ACTIVE->setSort("");
				$t_thongbao_levelsite->C_BEGIN_DATE->setSort("");
				$t_thongbao_levelsite->C_END_DATE->setSort("");
				$t_thongbao_levelsite->C_ORDER->setSort("");
                                $t_thongbao_levelsite->C_KEYWORD->setSort("");
				$t_thongbao_levelsite->C_NOTICE_HIT->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $t_thongbao_levelsite;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"phpmaker\" onclick=\"t_thongbao_levelsite_list.SelectAllKey(this);\">";
		$this->ListOptions->MoveItem("checkbox", 0); // Move to first column

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($t_thongbao_levelsite->Export <> "" ||
			$t_thongbao_levelsite->CurrentAction == "gridadd" ||
			$t_thongbao_levelsite->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $t_thongbao_levelsite;
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
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . ew_HtmlEncode($t_thongbao_levelsite->PK_THONGBAO->CurrentValue) . "\" class=\"phpmaker\" onclick='ew_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $t_thongbao_levelsite;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_thongbao_levelsite;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_thongbao_levelsite->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_thongbao_levelsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $t_thongbao_levelsite;
		$t_thongbao_levelsite->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$t_thongbao_levelsite->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_thongbao_levelsite;

		// Load search values
		// PK_THONGBAO

		$t_thongbao_levelsite->PK_THONGBAO->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_PK_THONGBAO"]);
		$t_thongbao_levelsite->PK_THONGBAO->AdvancedSearch->SearchOperator = @$_GET["z_PK_THONGBAO"];

		// FK_CONGTY_ID
		$t_thongbao_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_CONGTY_ID"]);
		$t_thongbao_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_CONGTY_ID"];

		// FK_DOITUONG_ID
		$t_thongbao_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_DOITUONG_ID"]);
		$t_thongbao_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_DOITUONG_ID"];

		// C_TITLE
		$t_thongbao_levelsite->C_TITLE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_TITLE"]);
		$t_thongbao_levelsite->C_TITLE->AdvancedSearch->SearchOperator = @$_GET["z_C_TITLE"];

		// C_CONTENT
		$t_thongbao_levelsite->C_CONTENT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_CONTENT"]);
		$t_thongbao_levelsite->C_CONTENT->AdvancedSearch->SearchOperator = @$_GET["z_C_CONTENT"];

		// C_PUBLISH
		$t_thongbao_levelsite->C_PUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_PUBLISH"]);
		$t_thongbao_levelsite->C_PUBLISH->AdvancedSearch->SearchOperator = @$_GET["z_C_PUBLISH"];

		// C_ACTIVE
		$t_thongbao_levelsite->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ACTIVE"]);
		$t_thongbao_levelsite->C_ACTIVE->AdvancedSearch->SearchOperator = @$_GET["z_C_ACTIVE"];

		// C_BEGIN_DATE
		$t_thongbao_levelsite->C_BEGIN_DATE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_BEGIN_DATE"]);
		$t_thongbao_levelsite->C_BEGIN_DATE->AdvancedSearch->SearchOperator = @$_GET["z_C_BEGIN_DATE"];

		// C_END_DATE
		$t_thongbao_levelsite->C_END_DATE->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_END_DATE"]);
		$t_thongbao_levelsite->C_END_DATE->AdvancedSearch->SearchOperator = @$_GET["z_C_END_DATE"];

		// C_ORDER
		$t_thongbao_levelsite->C_ORDER->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ORDER"]);
		$t_thongbao_levelsite->C_ORDER->AdvancedSearch->SearchOperator = @$_GET["z_C_ORDER"];

		// C_USER_ADD
		$t_thongbao_levelsite->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_ADD"]);
		$t_thongbao_levelsite->C_USER_ADD->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_ADD"];

		// C_ADD_TIME
		$t_thongbao_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_ADD_TIME"]);
		$t_thongbao_levelsite->C_ADD_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_ADD_TIME"];

		// C_USER_EDIT
		$t_thongbao_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_USER_EDIT"]);
		$t_thongbao_levelsite->C_USER_EDIT->AdvancedSearch->SearchOperator = @$_GET["z_C_USER_EDIT"];

		// C_EDIT_TIME
		$t_thongbao_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_EDIT_TIME"]);
		$t_thongbao_levelsite->C_EDIT_TIME->AdvancedSearch->SearchOperator = @$_GET["z_C_EDIT_TIME"];

		// FK_NGUOIDUNG_ID
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_FK_NGUOIDUNG_ID"]);
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchOperator = @$_GET["z_FK_NGUOIDUNG_ID"];
                
                	// C_KEYWORD
		$t_thongbao_levelsite->C_KEYWORD->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_KEYWORD"]);
		$t_thongbao_levelsite->C_KEYWORD->AdvancedSearch->SearchOperator = @$_GET["z_C_KEYWORD"];

		// C_NOTICE_HIT
		$t_thongbao_levelsite->C_NOTICE_HIT->AdvancedSearch->SearchValue = ew_StripSlashes(@$_GET["x_C_NOTICE_HIT"]);
		$t_thongbao_levelsite->C_NOTICE_HIT->AdvancedSearch->SearchOperator = @$_GET["z_C_NOTICE_HIT"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_thongbao_levelsite;

		// Call Recordset Selecting event
		$t_thongbao_levelsite->Recordset_Selecting($t_thongbao_levelsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_thongbao_levelsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);
		// Call Recordset Selected event
		$t_thongbao_levelsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_thongbao_levelsite;
		$sFilter = $t_thongbao_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_thongbao_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_thongbao_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_thongbao_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_thongbao_levelsite;
		$t_thongbao_levelsite->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$t_thongbao_levelsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_thongbao_levelsite->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$t_thongbao_levelsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_thongbao_levelsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_thongbao_levelsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_thongbao_levelsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_thongbao_levelsite->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$t_thongbao_levelsite->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$t_thongbao_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_thongbao_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_thongbao_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_thongbao_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_thongbao_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
                $t_thongbao_levelsite->C_KEYWORD->setDbValue($rs->fields('C_KEYWORD'));
		$t_thongbao_levelsite->C_NOTICE_HIT->setDbValue($rs->fields('C_NOTICE_HIT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_levelsite;

		// Initialize URLs
		$this->ViewUrl = $t_thongbao_levelsite->ViewUrl();
		$this->EditUrl = $t_thongbao_levelsite->EditUrl();
		$this->InlineEditUrl = $t_thongbao_levelsite->InlineEditUrl();
		$this->CopyUrl = $t_thongbao_levelsite->CopyUrl();
		$this->InlineCopyUrl = $t_thongbao_levelsite->InlineCopyUrl();
		$this->DeleteUrl = $t_thongbao_levelsite->DeleteUrl();

		// Call Row_Rendering event
		$t_thongbao_levelsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_thongbao_levelsite->FK_CONGTY_ID->CellCssStyle = ""; $t_thongbao_levelsite->FK_CONGTY_ID->CellCssClass = "";
		$t_thongbao_levelsite->FK_CONGTY_ID->CellAttrs = array(); $t_thongbao_levelsite->FK_CONGTY_ID->ViewAttrs = array(); $t_thongbao_levelsite->FK_CONGTY_ID->EditAttrs = array();

		// C_TITLE
		$t_thongbao_levelsite->C_TITLE->CellCssStyle = ""; $t_thongbao_levelsite->C_TITLE->CellCssClass = "";
		$t_thongbao_levelsite->C_TITLE->CellAttrs = array(); $t_thongbao_levelsite->C_TITLE->ViewAttrs = array(); $t_thongbao_levelsite->C_TITLE->EditAttrs = array();

		// C_PUBLISH
		$t_thongbao_levelsite->C_PUBLISH->CellCssStyle = ""; $t_thongbao_levelsite->C_PUBLISH->CellCssClass = "";
		$t_thongbao_levelsite->C_PUBLISH->CellAttrs = array(); $t_thongbao_levelsite->C_PUBLISH->ViewAttrs = array(); $t_thongbao_levelsite->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$t_thongbao_levelsite->C_ACTIVE->CellCssStyle = ""; $t_thongbao_levelsite->C_ACTIVE->CellCssClass = "";
		$t_thongbao_levelsite->C_ACTIVE->CellAttrs = array(); $t_thongbao_levelsite->C_ACTIVE->ViewAttrs = array(); $t_thongbao_levelsite->C_ACTIVE->EditAttrs = array();

		// C_BEGIN_DATE
		$t_thongbao_levelsite->C_BEGIN_DATE->CellCssStyle = ""; $t_thongbao_levelsite->C_BEGIN_DATE->CellCssClass = "";
		$t_thongbao_levelsite->C_BEGIN_DATE->CellAttrs = array(); $t_thongbao_levelsite->C_BEGIN_DATE->ViewAttrs = array(); $t_thongbao_levelsite->C_BEGIN_DATE->EditAttrs = array();

		// C_END_DATE
		$t_thongbao_levelsite->C_END_DATE->CellCssStyle = ""; $t_thongbao_levelsite->C_END_DATE->CellCssClass = "";
		$t_thongbao_levelsite->C_END_DATE->CellAttrs = array(); $t_thongbao_levelsite->C_END_DATE->ViewAttrs = array(); $t_thongbao_levelsite->C_END_DATE->EditAttrs = array();

		// C_ORDER
		$t_thongbao_levelsite->C_ORDER->CellCssStyle = ""; $t_thongbao_levelsite->C_ORDER->CellCssClass = "";
		$t_thongbao_levelsite->C_ORDER->CellAttrs = array(); $t_thongbao_levelsite->C_ORDER->ViewAttrs = array(); $t_thongbao_levelsite->C_ORDER->EditAttrs = array();
                
                // C_KEYWORD
		$t_thongbao_levelsite->C_KEYWORD->CellCssStyle = ""; $t_thongbao_levelsite->C_KEYWORD->CellCssClass = "";
		$t_thongbao_levelsite->C_KEYWORD->CellAttrs = array(); $t_thongbao_levelsite->C_KEYWORD->ViewAttrs = array(); $t_thongbao_levelsite->C_KEYWORD->EditAttrs = array();

		// C_NOTICE_HIT
		$t_thongbao_levelsite->C_NOTICE_HIT->CellCssStyle = ""; $t_thongbao_levelsite->C_NOTICE_HIT->CellCssClass = "";
		$t_thongbao_levelsite->C_NOTICE_HIT->CellAttrs = array(); $t_thongbao_levelsite->C_NOTICE_HIT->ViewAttrs = array(); $t_thongbao_levelsite->C_NOTICE_HIT->EditAttrs = array();
		if ($t_thongbao_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_THONGBAO
			$t_thongbao_levelsite->PK_THONGBAO->ViewValue = $t_thongbao_levelsite->PK_THONGBAO->CurrentValue;
			$t_thongbao_levelsite->PK_THONGBAO->CssStyle = "";
			$t_thongbao_levelsite->PK_THONGBAO->CssClass = "";
			$t_thongbao_levelsite->PK_THONGBAO->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = $t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_thongbao_levelsite->FK_CONGTY_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_CONGTY_ID->CssClass = "";
			$t_thongbao_levelsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = $t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_thongbao_levelsite->FK_DOITUONG_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_DOITUONG_ID->CssClass = "";
			$t_thongbao_levelsite->FK_DOITUONG_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->ViewValue = $t_thongbao_levelsite->C_TITLE->CurrentValue;
			$t_thongbao_levelsite->C_TITLE->CssStyle = "";
			$t_thongbao_levelsite->C_TITLE->CssClass = "";
			$t_thongbao_levelsite->C_TITLE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_thongbao_levelsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = "<i>Không xuất bản</i>";
						break;
					case "1":
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = "Xuất bản <img src=\"images/icon-xac-thuc.jpg\" >";
						break;
					default:
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = $t_thongbao_levelsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_PUBLISH->CssStyle = "";
			$t_thongbao_levelsite->C_PUBLISH->CssClass = "";
			$t_thongbao_levelsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_thongbao_levelsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = "<i>Không kích hoạt</i>";
						break;
					case "1":
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = "<b>Kích hoạt <img src=\"images/insert.gif\" ></b>";
						break;
                                        case "2":
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = "Chờ xét <img src=\"images/new.gif\" >";
						break;
					default:
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = $t_thongbao_levelsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_ACTIVE->CssStyle = "";
			$t_thongbao_levelsite->C_ACTIVE->CssClass = "";
			$t_thongbao_levelsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewValue = $t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->ViewValue, 7);
			$t_thongbao_levelsite->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->ViewValue = $t_thongbao_levelsite->C_END_DATE->CurrentValue;
			$t_thongbao_levelsite->C_END_DATE->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_END_DATE->ViewValue, 7);
			$t_thongbao_levelsite->C_END_DATE->CssStyle = "";
			$t_thongbao_levelsite->C_END_DATE->CssClass = "";
			$t_thongbao_levelsite->C_END_DATE->ViewCustomAttributes = "";

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->ViewValue = $t_thongbao_levelsite->C_ORDER->CurrentValue;
			$t_thongbao_levelsite->C_ORDER->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_ORDER->ViewValue, 7);
			$t_thongbao_levelsite->C_ORDER->CssStyle = "";
			$t_thongbao_levelsite->C_ORDER->CssClass = "";
			$t_thongbao_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_thongbao_levelsite->C_USER_ADD->ViewValue = $t_thongbao_levelsite->C_USER_ADD->CurrentValue;
			$t_thongbao_levelsite->C_USER_ADD->CssStyle = "";
			$t_thongbao_levelsite->C_USER_ADD->CssClass = "";
			$t_thongbao_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_thongbao_levelsite->C_ADD_TIME->ViewValue = $t_thongbao_levelsite->C_ADD_TIME->CurrentValue;
			$t_thongbao_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_thongbao_levelsite->C_ADD_TIME->CssStyle = "";
			$t_thongbao_levelsite->C_ADD_TIME->CssClass = "";
			$t_thongbao_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_thongbao_levelsite->C_USER_EDIT->ViewValue = $t_thongbao_levelsite->C_USER_EDIT->CurrentValue;
			$t_thongbao_levelsite->C_USER_EDIT->CssStyle = "";
			$t_thongbao_levelsite->C_USER_EDIT->CssClass = "";
			$t_thongbao_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_thongbao_levelsite->C_EDIT_TIME->ViewValue = $t_thongbao_levelsite->C_EDIT_TIME->CurrentValue;
			$t_thongbao_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_thongbao_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_thongbao_levelsite->C_EDIT_TIME->CssClass = "";
			$t_thongbao_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_thongbao_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";
                        
                        // C_KEYWORD
			$t_thongbao_levelsite->C_KEYWORD->ViewValue = $t_thongbao_levelsite->C_KEYWORD->CurrentValue;
			$t_thongbao_levelsite->C_KEYWORD->CssStyle = "";
			$t_thongbao_levelsite->C_KEYWORD->CssClass = "";
			$t_thongbao_levelsite->C_KEYWORD->ViewCustomAttributes = "";

			// C_NOTICE_HIT
			if (strval($t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = "Không nổi bật";
						break;
					case "1":
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = "Nổi bật";
						break;
					default:
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = $t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_NOTICE_HIT->CssStyle = "";
			$t_thongbao_levelsite->C_NOTICE_HIT->CssClass = "";
			$t_thongbao_levelsite->C_NOTICE_HIT->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_thongbao_levelsite->FK_CONGTY_ID->HrefValue = "";
			$t_thongbao_levelsite->FK_CONGTY_ID->TooltipValue = "";

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->HrefValue = "";
			$t_thongbao_levelsite->C_TITLE->TooltipValue = "";

			// C_PUBLISH
			$t_thongbao_levelsite->C_PUBLISH->HrefValue = "";
			$t_thongbao_levelsite->C_PUBLISH->TooltipValue = "";

			// C_ACTIVE
			$t_thongbao_levelsite->C_ACTIVE->HrefValue = "";
			$t_thongbao_levelsite->C_ACTIVE->TooltipValue = "";

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->HrefValue = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->TooltipValue = "";

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->HrefValue = "";
			$t_thongbao_levelsite->C_END_DATE->TooltipValue = "";

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->HrefValue = "";
			$t_thongbao_levelsite->C_ORDER->TooltipValue = "";
		} elseif ($t_thongbao_levelsite->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// FK_CONGTY_ID
			$t_thongbao_levelsite->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_thongbao_levelsite->FK_CONGTY_ID->EditValue = $arwrk;

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_TITLE->EditValue = ew_HtmlEncode($t_thongbao_levelsite->C_TITLE->AdvancedSearch->SearchValue);

			// C_PUBLISH
			$t_thongbao_levelsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không");
			$arwrk[] = array("1", "Xuất bản");
			$t_thongbao_levelsite->C_PUBLISH->EditValue = $arwrk;

			// C_ACTIVE
			$t_thongbao_levelsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
                        $arwrk[] = array("2", "Chờ xét");
			$t_thongbao_levelsite->C_ACTIVE->EditValue = $arwrk;

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->AdvancedSearch->SearchValue, 7), 7));

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_END_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_thongbao_levelsite->C_END_DATE->AdvancedSearch->SearchValue, 7), 7));

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_thongbao_levelsite->C_ORDER->AdvancedSearch->SearchValue, 7), 7));
                        
                        // C_KEYWORD
			$t_thongbao_levelsite->C_KEYWORD->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_KEYWORD->EditValue = ew_HtmlEncode($t_thongbao_levelsite->C_KEYWORD->AdvancedSearch->SearchValue);

			// C_NOTICE_HIT
			$t_thongbao_levelsite->C_NOTICE_HIT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong noi bat");
			$arwrk[] = array("1", "Noi bat");
			$t_thongbao_levelsite->C_NOTICE_HIT->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_thongbao_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_thongbao_levelsite->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_thongbao_levelsite;

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
		global $t_thongbao_levelsite;
		$t_thongbao_levelsite->PK_THONGBAO->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_PK_THONGBAO");
		$t_thongbao_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_FK_CONGTY_ID");
		$t_thongbao_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_FK_DOITUONG_ID");
		$t_thongbao_levelsite->C_TITLE->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_TITLE");
		$t_thongbao_levelsite->C_CONTENT->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_CONTENT");
		$t_thongbao_levelsite->C_PUBLISH->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_PUBLISH");
		$t_thongbao_levelsite->C_ACTIVE->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_ACTIVE");
		$t_thongbao_levelsite->C_BEGIN_DATE->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_BEGIN_DATE");
		$t_thongbao_levelsite->C_END_DATE->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_END_DATE");
		$t_thongbao_levelsite->C_ORDER->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_ORDER");
		$t_thongbao_levelsite->C_USER_ADD->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_USER_ADD");
		$t_thongbao_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_ADD_TIME");
		$t_thongbao_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_USER_EDIT");
		$t_thongbao_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_C_EDIT_TIME");
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = $t_thongbao_levelsite->getAdvancedSearch("x_FK_NGUOIDUNG_ID");
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_thongbao_levelsite;
		$utf8 = TRUE;
		$bSelectLimit = EW_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_thongbao_levelsite->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;

		// Export all
		if ($t_thongbao_levelsite->ExportAll) {
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
		if ($t_thongbao_levelsite->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_thongbao_levelsite, "h");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_thongbao_levelsite->PK_THONGBAO);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->FK_DOITUONG_ID);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_TITLE);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_PUBLISH);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_ACTIVE);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_BEGIN_DATE);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_END_DATE);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_ORDER);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_USER_ADD);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_thongbao_levelsite->FK_NGUOIDUNG_ID);
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
				$t_thongbao_levelsite->CssClass = "";
				$t_thongbao_levelsite->CssStyle = "";
				$t_thongbao_levelsite->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_thongbao_levelsite->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_THONGBAO', $t_thongbao_levelsite->PK_THONGBAO->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_thongbao_levelsite->FK_CONGTY_ID->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DOITUONG_ID', $t_thongbao_levelsite->FK_DOITUONG_ID->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_thongbao_levelsite->C_TITLE->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_PUBLISH', $t_thongbao_levelsite->C_PUBLISH->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_thongbao_levelsite->C_ACTIVE->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_BEGIN_DATE', $t_thongbao_levelsite->C_BEGIN_DATE->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_END_DATE', $t_thongbao_levelsite->C_END_DATE->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_thongbao_levelsite->C_ORDER->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_thongbao_levelsite->C_USER_ADD->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_thongbao_levelsite->C_ADD_TIME->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_thongbao_levelsite->C_USER_EDIT->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_thongbao_levelsite->C_EDIT_TIME->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_NGUOIDUNG_ID', $t_thongbao_levelsite->FK_NGUOIDUNG_ID->ExportValue($t_thongbao_levelsite->Export, $t_thongbao_levelsite->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_thongbao_levelsite->PK_THONGBAO);
					$ExportDoc->ExportField($t_thongbao_levelsite->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_thongbao_levelsite->FK_DOITUONG_ID);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_TITLE);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_PUBLISH);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_ACTIVE);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_BEGIN_DATE);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_END_DATE);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_ORDER);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_USER_ADD);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_ADD_TIME);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_USER_EDIT);
					$ExportDoc->ExportField($t_thongbao_levelsite->C_EDIT_TIME);
					$ExportDoc->ExportField($t_thongbao_levelsite->FK_NGUOIDUNG_ID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_thongbao_levelsite->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_thongbao_levelsite->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_thongbao_levelsite->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_thongbao_levelsite->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_thongbao_levelsite->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_thongbao_levelsite;
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
		if ($t_thongbao_levelsite->Email_Sending($Email, $EventArgs))
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
		global $t_thongbao_levelsite;

		// Initialize
		$sQry = "export=html";

		// Build QueryString for search
		if ($t_thongbao_levelsite->getSessionBasicSearchKeyword() <> "") {
			$sQry .= "&" . EW_TABLE_BASIC_SEARCH . "=" . $t_thongbao_levelsite->getSessionBasicSearchKeyword() . "&" . EW_TABLE_BASIC_SEARCH_TYPE . "=" . $t_thongbao_levelsite->getSessionBasicSearchType();
		}
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->PK_THONGBAO); // PK_THONGBAO
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->FK_CONGTY_ID); // FK_CONGTY_ID
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->FK_DOITUONG_ID); // FK_DOITUONG_ID
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_TITLE); // C_TITLE
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_CONTENT); // C_CONTENT
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_PUBLISH); // C_PUBLISH
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_ACTIVE); // C_ACTIVE
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_BEGIN_DATE); // C_BEGIN_DATE
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_END_DATE); // C_END_DATE
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_ORDER); // C_ORDER
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_USER_ADD); // C_USER_ADD
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_ADD_TIME); // C_ADD_TIME
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_USER_EDIT); // C_USER_EDIT
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->C_EDIT_TIME); // C_EDIT_TIME
		$this->AddSearchQueryString($sQry, $t_thongbao_levelsite->FK_NGUOIDUNG_ID); // FK_NGUOIDUNG_ID

		// Build QueryString for pager
		$sQry .= "&" . EW_TABLE_REC_PER_PAGE . "=" . $t_thongbao_levelsite->getRecordsPerPage() . "&" . EW_TABLE_START_REC . "=" . $t_thongbao_levelsite->getStartRecordNumber();
		return $sQry;
	}

	// Add search QueryString
	function AddSearchQueryString(&$Qry, &$Fld) {
		global $t_thongbao_levelsite;
		$FldParm = substr($Fld->FldVar, 2);
		$FldSearchValue = $t_thongbao_levelsite->GetAdvancedSearch("x_" . $FldParm);
		if (strval($FldSearchValue) <> "") {
			$Qry .= "&x_" . $FldParm . "=" . FldSearchValue .
				"&z_" . $FldParm . "=" . $t_thongbao_levelsite->GetAdvancedSearch("z_" . $FldParm);
		}
		$FldSearchValue2 = $t_thongbao_levelsite->GetAdvancedSearch("y_" . $FldParm);
		if (strval($FldSearchValue2) <> "") {
			$Qry .= "&v_" . $FldParm . "=" . $t_thongbao_levelsite->GetAdvancedSearch("v_" . $FldParm) .
				"&y_" . $FldParm . "=" . $FldSearchValue2 .
				"&w_" . $FldParm . "=" . $t_thongbao_levelsite->GetAdvancedSearch("w_" . $FldParm);
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
