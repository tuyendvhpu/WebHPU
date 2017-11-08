<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_levelsiteinfo.php" ?>
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
$t_tinbai_levelsite_view = new ct_tinbai_levelsite_view();
$Page =& $t_tinbai_levelsite_view;

// Page init
$t_tinbai_levelsite_view->Page_Init();

// Page main
$t_tinbai_levelsite_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_levelsite_view = new ew_Page("t_tinbai_levelsite_view");

// page properties
t_tinbai_levelsite_view.PageID = "view"; // page ID
t_tinbai_levelsite_view.FormID = "ft_tinbai_levelsiteview"; // form ID
var EW_PAGE_ID = t_tinbai_levelsite_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_tinbai_levelsite_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_levelsite_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_levelsite_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_levelsite_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_tinbai_levelsite->TableCaption() ?>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_levelsite_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_tinbai_levelsite" id="emf_t_tinbai_levelsite" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_tinbai_levelsite',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_tinbai_levelsite_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
<a href="<?php echo $t_tinbai_levelsite_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_tinbai_levelsite_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_tinbai_levelsite_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_tinbai_levelsite_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_tinbai_levelsite_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_levelsite_view->ShowMessage();
?>
<p>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_levelsite_view->Pager)) $t_tinbai_levelsite_view->Pager = new cNumericPager($t_tinbai_levelsite_view->lStartRec, $t_tinbai_levelsite_view->lDisplayRecs, $t_tinbai_levelsite_view->lTotalRecs, $t_tinbai_levelsite_view->lRecRange) ?>
<?php if ($t_tinbai_levelsite_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_levelsite_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_levelsite_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_levelsite_view->sSrchWhere == "0=101") { ?>
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
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_tinbai_levelsite->PK_TINBAI_ID->Visible) { // PK_TINBAI_ID ?>
	<tr<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->PK_TINBAI_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->PK_TINBAI_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->FK_CONGTY_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_CHUYENMUC_ID->Visible) { // FK_CHUYENMUC_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_DOITUONG_ID->Visible) { // FK_DOITUONG_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_levelsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_TITLE->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_TITLE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_SUMARY->Visible) { // C_SUMARY ?>
	<tr<?php echo $t_tinbai_levelsite->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SUMARY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_SUMARY->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_SUMARY->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_SUMARY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_CONTENTS->Visible) { // C_CONTENTS ?>
	<tr<?php echo $t_tinbai_levelsite->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_CONTENTS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_CONTENTS->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_CONTENTS->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_CONTENTS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_VISITOR->Visible) { // C_VISITOR ?>
	<tr<?php echo $t_tinbai_levelsite->C_VISITOR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_VISITOR->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_VISITOR->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_VISITOR->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_VISITOR->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_SOURCE->Visible) { // C_SOURCE ?>
	<tr<?php echo $t_tinbai_levelsite->C_SOURCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SOURCE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_SOURCE->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_SOURCE->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_SOURCE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_HITS->Visible) { // C_HITS ?>
	<tr<?php echo $t_tinbai_levelsite->C_HITS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_HITS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_HITS->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_HITS->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_HITS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_FILEANH->Visible) { // C_FILEANH ?>
	<tr<?php echo $t_tinbai_levelsite->C_FILEANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_FILEANH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_FILEANH->CellAttributes() ?>>
<?php if ($t_tinbai_levelsite->C_FILEANH->HrefValue <> "" || $t_tinbai_levelsite->C_FILEANH->TooltipValue <> "") { ?>
<?php if (!empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) { ?>
<a href="<?php echo $t_tinbai_levelsite->C_FILEANH->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_levelsite->C_FILEANH->UploadPath) . $t_tinbai_levelsite->C_FILEANH->Upload->DbValue ?>" border=0<?php echo $t_tinbai_levelsite->C_FILEANH->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_tinbai_levelsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_levelsite->C_FILEANH->UploadPath) . $t_tinbai_levelsite->C_FILEANH->Upload->DbValue ?>" border=0<?php echo $t_tinbai_levelsite->C_FILEANH->ViewAttributes() ?>>
<?php } elseif (!in_array($t_tinbai_levelsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_COMENT->Visible) { // C_COMENT ?>
	<tr<?php echo $t_tinbai_levelsite->C_COMENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_COMENT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_COMENT->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_COMENT->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_COMENT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_tinbai_levelsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_ORDER->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_ORDER->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_tinbai_levelsite->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_ACTIVE->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_tinbai_levelsite->C_PUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_PUBLISH->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_PUBLISH->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_TIMEPUBLISH->Visible) { // C_TIMEPUBLISH ?>
	<tr<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_tinbai_levelsite->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_USER_ADD->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_tinbai_levelsite->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_tinbai_levelsite->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_tinbai_levelsite->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_NGUOIDUNG_ID->Visible) { // FK_NGUOIDUNG_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_STATUS->Visible) { // C_STATUS ?>
	<tr<?php echo $t_tinbai_levelsite->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_STATUS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_STATUS->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_STATUS->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_STATUS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_EDITOR_ID->Visible) { // FK_EDITOR_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_EDITOR_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->FK_EDITOR_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_tinbai_levelsite->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_NOTE->CellAttributes() ?>>
<div<?php echo $t_tinbai_levelsite->C_NOTE->ViewAttributes() ?>><?php echo $t_tinbai_levelsite->C_NOTE->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_levelsite_view->Pager)) $t_tinbai_levelsite_view->Pager = new cNumericPager($t_tinbai_levelsite_view->lStartRec, $t_tinbai_levelsite_view->lDisplayRecs, $t_tinbai_levelsite_view->lTotalRecs, $t_tinbai_levelsite_view->lRecRange) ?>
<?php if ($t_tinbai_levelsite_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_levelsite_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_levelsite_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_levelsite_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_levelsite_view->PageUrl() ?>start=<?php echo $t_tinbai_levelsite_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_levelsite_view->sSrchWhere == "0=101") { ?>
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
<p>
<?php if ($t_tinbai_levelsite->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_tinbai_levelsite_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_levelsite_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_tinbai_levelsite';

	// Page object name
	var $PageObjName = 't_tinbai_levelsite_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_levelsite;
		if ($t_tinbai_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_tinbai_levelsite;
		if ($t_tinbai_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_levelsite_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_levelsite)
		$GLOBALS["t_tinbai_levelsite"] = new ct_tinbai_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_levelsite', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $t_tinbai_levelsite;

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_tinbai_levelsitelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_tinbai_levelsite->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_tinbai_levelsite->Export = $_POST["exporttype"];
		} else {
			$t_tinbai_levelsite->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_tinbai_levelsite->Export; // Get export parameter, used in header
		$gsExportFile = $t_tinbai_levelsite->TableVar; // Get export file, used in header
		if (@$_GET["PK_TINBAI_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_TINBAI_ID"]);
		}
		if (in_array($t_tinbai_levelsite->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_tinbai_levelsite->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_tinbai_levelsite->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_tinbai_levelsite->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_tinbai_levelsite->Export == "csv") {
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
	var $lDisplayRecs = 1;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $lRecCnt;
	var $arRecKey = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $t_tinbai_levelsite;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_TINBAI_ID"] <> "") {
				$t_tinbai_levelsite->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
				$this->arRecKey["PK_TINBAI_ID"] = $t_tinbai_levelsite->PK_TINBAI_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_tinbai_levelsite->CurrentAction = "I"; // Display form
			switch ($t_tinbai_levelsite->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_tinbai_levelsitelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue) == strval($rs->fields('PK_TINBAI_ID'))) {
								$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "t_tinbai_levelsitelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_tinbai_levelsite->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_tinbai_levelsite->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_tinbai_levelsitelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_tinbai_levelsite->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_tinbai_levelsite;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_tinbai_levelsite->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_tinbai_levelsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_tinbai_levelsite;

		// Call Recordset Selecting event
		$t_tinbai_levelsite->Recordset_Selecting($t_tinbai_levelsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_tinbai_levelsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_tinbai_levelsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_levelsite;
		$sFilter = $t_tinbai_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_levelsite;
		$t_tinbai_levelsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_levelsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->setDbValue($rs->fields('FK_CHUYENMUC_ID'));
		$t_tinbai_levelsite->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$t_tinbai_levelsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_levelsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_levelsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_levelsite->C_VISITOR->setDbValue($rs->fields('C_VISITOR'));
		$t_tinbai_levelsite->C_SOURCE->setDbValue($rs->fields('C_SOURCE'));
		$t_tinbai_levelsite->C_HITS->setDbValue($rs->fields('C_HITS'));
		$t_tinbai_levelsite->C_FILEANH->Upload->DbValue = $rs->fields('C_FILEANH');
		$t_tinbai_levelsite->C_COMENT->setDbValue($rs->fields('C_COMENT'));
		$t_tinbai_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_tinbai_levelsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_tinbai_levelsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_tinbai_levelsite->C_TIMEPUBLISH->setDbValue($rs->fields('C_TIMEPUBLISH'));
		$t_tinbai_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$t_tinbai_levelsite->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_tinbai_levelsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
		$t_tinbai_levelsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_levelsite;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue);
		$this->AddUrl = $t_tinbai_levelsite->AddUrl();
		$this->EditUrl = $t_tinbai_levelsite->EditUrl();
		$this->CopyUrl = $t_tinbai_levelsite->CopyUrl();
		$this->DeleteUrl = $t_tinbai_levelsite->DeleteUrl();
		$this->ListUrl = $t_tinbai_levelsite->ListUrl();

		// Call Row_Rendering event
		$t_tinbai_levelsite->Row_Rendering();

		// Common render codes for all row types
		// PK_TINBAI_ID

		$t_tinbai_levelsite->PK_TINBAI_ID->CellCssStyle = ""; $t_tinbai_levelsite->PK_TINBAI_ID->CellCssClass = "";
		$t_tinbai_levelsite->PK_TINBAI_ID->CellAttrs = array(); $t_tinbai_levelsite->PK_TINBAI_ID->ViewAttrs = array(); $t_tinbai_levelsite->PK_TINBAI_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$t_tinbai_levelsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_CONGTY_ID->EditAttrs = array();

		// FK_CHUYENMUC_ID
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditAttrs = array();

		// FK_DOITUONG_ID
		$t_tinbai_levelsite->FK_DOITUONG_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_DOITUONG_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_DOITUONG_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_DOITUONG_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_DOITUONG_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_levelsite->C_TITLE->CellCssStyle = ""; $t_tinbai_levelsite->C_TITLE->CellCssClass = "";
		$t_tinbai_levelsite->C_TITLE->CellAttrs = array(); $t_tinbai_levelsite->C_TITLE->ViewAttrs = array(); $t_tinbai_levelsite->C_TITLE->EditAttrs = array();

		// C_SUMARY
		$t_tinbai_levelsite->C_SUMARY->CellCssStyle = ""; $t_tinbai_levelsite->C_SUMARY->CellCssClass = "";
		$t_tinbai_levelsite->C_SUMARY->CellAttrs = array(); $t_tinbai_levelsite->C_SUMARY->ViewAttrs = array(); $t_tinbai_levelsite->C_SUMARY->EditAttrs = array();

		// C_CONTENTS
		$t_tinbai_levelsite->C_CONTENTS->CellCssStyle = ""; $t_tinbai_levelsite->C_CONTENTS->CellCssClass = "";
		$t_tinbai_levelsite->C_CONTENTS->CellAttrs = array(); $t_tinbai_levelsite->C_CONTENTS->ViewAttrs = array(); $t_tinbai_levelsite->C_CONTENTS->EditAttrs = array();

		// C_VISITOR
		$t_tinbai_levelsite->C_VISITOR->CellCssStyle = ""; $t_tinbai_levelsite->C_VISITOR->CellCssClass = "";
		$t_tinbai_levelsite->C_VISITOR->CellAttrs = array(); $t_tinbai_levelsite->C_VISITOR->ViewAttrs = array(); $t_tinbai_levelsite->C_VISITOR->EditAttrs = array();

		// C_SOURCE
		$t_tinbai_levelsite->C_SOURCE->CellCssStyle = ""; $t_tinbai_levelsite->C_SOURCE->CellCssClass = "";
		$t_tinbai_levelsite->C_SOURCE->CellAttrs = array(); $t_tinbai_levelsite->C_SOURCE->ViewAttrs = array(); $t_tinbai_levelsite->C_SOURCE->EditAttrs = array();

		// C_HITS
		$t_tinbai_levelsite->C_HITS->CellCssStyle = ""; $t_tinbai_levelsite->C_HITS->CellCssClass = "";
		$t_tinbai_levelsite->C_HITS->CellAttrs = array(); $t_tinbai_levelsite->C_HITS->ViewAttrs = array(); $t_tinbai_levelsite->C_HITS->EditAttrs = array();

		// C_FILEANH
		$t_tinbai_levelsite->C_FILEANH->CellCssStyle = ""; $t_tinbai_levelsite->C_FILEANH->CellCssClass = "";
		$t_tinbai_levelsite->C_FILEANH->CellAttrs = array(); $t_tinbai_levelsite->C_FILEANH->ViewAttrs = array(); $t_tinbai_levelsite->C_FILEANH->EditAttrs = array();

		// C_COMENT
		$t_tinbai_levelsite->C_COMENT->CellCssStyle = ""; $t_tinbai_levelsite->C_COMENT->CellCssClass = "";
		$t_tinbai_levelsite->C_COMENT->CellAttrs = array(); $t_tinbai_levelsite->C_COMENT->ViewAttrs = array(); $t_tinbai_levelsite->C_COMENT->EditAttrs = array();

		// C_ORDER
		$t_tinbai_levelsite->C_ORDER->CellCssStyle = ""; $t_tinbai_levelsite->C_ORDER->CellCssClass = "";
		$t_tinbai_levelsite->C_ORDER->CellAttrs = array(); $t_tinbai_levelsite->C_ORDER->ViewAttrs = array(); $t_tinbai_levelsite->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_tinbai_levelsite->C_ACTIVE->CellCssStyle = ""; $t_tinbai_levelsite->C_ACTIVE->CellCssClass = "";
		$t_tinbai_levelsite->C_ACTIVE->CellAttrs = array(); $t_tinbai_levelsite->C_ACTIVE->ViewAttrs = array(); $t_tinbai_levelsite->C_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$t_tinbai_levelsite->C_PUBLISH->CellCssStyle = ""; $t_tinbai_levelsite->C_PUBLISH->CellCssClass = "";
		$t_tinbai_levelsite->C_PUBLISH->CellAttrs = array(); $t_tinbai_levelsite->C_PUBLISH->ViewAttrs = array(); $t_tinbai_levelsite->C_PUBLISH->EditAttrs = array();

		// C_TIMEPUBLISH
		$t_tinbai_levelsite->C_TIMEPUBLISH->CellCssStyle = ""; $t_tinbai_levelsite->C_TIMEPUBLISH->CellCssClass = "";
		$t_tinbai_levelsite->C_TIMEPUBLISH->CellAttrs = array(); $t_tinbai_levelsite->C_TIMEPUBLISH->ViewAttrs = array(); $t_tinbai_levelsite->C_TIMEPUBLISH->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_levelsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_levelsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_levelsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_levelsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_levelsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_levelsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_levelsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_levelsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_levelsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_levelsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_levelsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_levelsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_levelsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_levelsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_levelsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_levelsite->C_EDIT_TIME->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditAttrs = array();

		// C_STATUS
		$t_tinbai_levelsite->C_STATUS->CellCssStyle = ""; $t_tinbai_levelsite->C_STATUS->CellCssClass = "";
		$t_tinbai_levelsite->C_STATUS->CellAttrs = array(); $t_tinbai_levelsite->C_STATUS->ViewAttrs = array(); $t_tinbai_levelsite->C_STATUS->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_levelsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->EditAttrs = array();

		// C_NOTE
		$t_tinbai_levelsite->C_NOTE->CellCssStyle = ""; $t_tinbai_levelsite->C_NOTE->CellCssClass = "";
		$t_tinbai_levelsite->C_NOTE->CellAttrs = array(); $t_tinbai_levelsite->C_NOTE->ViewAttrs = array(); $t_tinbai_levelsite->C_NOTE->EditAttrs = array();
		if ($t_tinbai_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_ID
			$t_tinbai_levelsite->PK_TINBAI_ID->ViewValue = $t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_levelsite->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = $t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_CONGTY_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->CssClass = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_CHUYENMUC_ID
			if (strval($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = $t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->CssClass = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = $t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_DOITUONG_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->CssClass = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_levelsite->C_TITLE->ViewValue = $t_tinbai_levelsite->C_TITLE->CurrentValue;
			$t_tinbai_levelsite->C_TITLE->CssStyle = "";
			$t_tinbai_levelsite->C_TITLE->CssClass = "";
			$t_tinbai_levelsite->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->ViewValue = $t_tinbai_levelsite->C_SUMARY->CurrentValue;
			$t_tinbai_levelsite->C_SUMARY->CssStyle = "";
			$t_tinbai_levelsite->C_SUMARY->CssClass = "";
			$t_tinbai_levelsite->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->ViewValue = $t_tinbai_levelsite->C_CONTENTS->CurrentValue;
			$t_tinbai_levelsite->C_CONTENTS->CssStyle = "";
			$t_tinbai_levelsite->C_CONTENTS->CssClass = "";
			$t_tinbai_levelsite->C_CONTENTS->ViewCustomAttributes = "";

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->ViewValue = $t_tinbai_levelsite->C_VISITOR->CurrentValue;
			$t_tinbai_levelsite->C_VISITOR->CssStyle = "";
			$t_tinbai_levelsite->C_VISITOR->CssClass = "";
			$t_tinbai_levelsite->C_VISITOR->ViewCustomAttributes = "";

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->ViewValue = $t_tinbai_levelsite->C_SOURCE->CurrentValue;
			$t_tinbai_levelsite->C_SOURCE->CssStyle = "";
			$t_tinbai_levelsite->C_SOURCE->CssClass = "";
			$t_tinbai_levelsite->C_SOURCE->ViewCustomAttributes = "";

			// C_HITS
			if (strval($t_tinbai_levelsite->C_HITS->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_HITS->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_HITS->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_levelsite->C_HITS->ViewValue = "Tin noi bat";
						break;
					default:
						$t_tinbai_levelsite->C_HITS->ViewValue = $t_tinbai_levelsite->C_HITS->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_HITS->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_HITS->CssStyle = "";
			$t_tinbai_levelsite->C_HITS->CssClass = "";
			$t_tinbai_levelsite->C_HITS->ViewCustomAttributes = "";

			// C_FILEANH
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) {
				$t_tinbai_levelsite->C_FILEANH->ViewValue = $t_tinbai_levelsite->C_FILEANH->Upload->DbValue;
				$t_tinbai_levelsite->C_FILEANH->ImageAlt = $t_tinbai_levelsite->C_FILEANH->FldAlt();
			} else {
				$t_tinbai_levelsite->C_FILEANH->ViewValue = "";
			}
			$t_tinbai_levelsite->C_FILEANH->CssStyle = "";
			$t_tinbai_levelsite->C_FILEANH->CssClass = "";
			$t_tinbai_levelsite->C_FILEANH->ViewCustomAttributes = "";

			// C_COMENT
			if (strval($t_tinbai_levelsite->C_COMENT->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_COMENT->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "Khong cho phep coment facebook";
						break;
					case "1":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "cho phep coment facebook";
						break;
					default:
						$t_tinbai_levelsite->C_COMENT->ViewValue = $t_tinbai_levelsite->C_COMENT->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_COMENT->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_COMENT->CssStyle = "";
			$t_tinbai_levelsite->C_COMENT->CssClass = "";
			$t_tinbai_levelsite->C_COMENT->ViewCustomAttributes = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->ViewValue = $t_tinbai_levelsite->C_ORDER->CurrentValue;
			$t_tinbai_levelsite->C_ORDER->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_ORDER->ViewValue, 7);
			$t_tinbai_levelsite->C_ORDER->CssStyle = "";
			$t_tinbai_levelsite->C_ORDER->CssClass = "";
			$t_tinbai_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_tinbai_levelsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Khong kich hoat len Level Site";
						break;
					case "1":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Kich hoat len Level sites ";
						break;
					default:
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = $t_tinbai_levelsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_ACTIVE->CssStyle = "";
			$t_tinbai_levelsite->C_ACTIVE->CssClass = "";
			$t_tinbai_levelsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_tinbai_levelsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = "Khong kich hoat MainSite";
						break;
					case "1":
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = "Kich hoat MainSite";
						break;
					default:
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = $t_tinbai_levelsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_PUBLISH->CssStyle = "";
			$t_tinbai_levelsite->C_PUBLISH->CssClass = "";
			$t_tinbai_levelsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = $t_tinbai_levelsite->C_TIMEPUBLISH->CurrentValue;
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue, 7);
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssStyle = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssClass = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
			if (strval($t_tinbai_levelsite->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->C_USER_ADD->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_USER_ADD->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_USER_ADD->CssStyle = "";
			$t_tinbai_levelsite->C_USER_ADD->CssClass = "";
			$t_tinbai_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->ViewValue = $t_tinbai_levelsite->C_ADD_TIME->CurrentValue;
			$t_tinbai_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_tinbai_levelsite->C_ADD_TIME->CssStyle = "";
			$t_tinbai_levelsite->C_ADD_TIME->CssClass = "";
			$t_tinbai_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $t_tinbai_levelsite->C_USER_EDIT->CurrentValue;
			if (strval($t_tinbai_levelsite->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $t_tinbai_levelsite->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_USER_EDIT->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_USER_EDIT->CssStyle = "";
			$t_tinbai_levelsite->C_USER_EDIT->CssClass = "";
			$t_tinbai_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_tinbai_levelsite->C_EDIT_TIME->ViewValue = $t_tinbai_levelsite->C_EDIT_TIME->CurrentValue;
			$t_tinbai_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_tinbai_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_levelsite->C_EDIT_TIME->CssClass = "";
			$t_tinbai_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
			if (strval($t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_tinbai_levelsite->C_STATUS->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_STATUS->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_STATUS->ViewValue = "Chua duy?t main site";
						break;
					case "1":
						$t_tinbai_levelsite->C_STATUS->ViewValue = "Da duyet main site";
						break;
					default:
						$t_tinbai_levelsite->C_STATUS->ViewValue = $t_tinbai_levelsite->C_STATUS->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_STATUS->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_STATUS->CssStyle = "";
			$t_tinbai_levelsite->C_STATUS->CssClass = "";
			$t_tinbai_levelsite->C_STATUS->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewValue = $t_tinbai_levelsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_levelsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// C_NOTE
			$t_tinbai_levelsite->C_NOTE->ViewValue = $t_tinbai_levelsite->C_NOTE->CurrentValue;
			$t_tinbai_levelsite->C_NOTE->CssStyle = "";
			$t_tinbai_levelsite->C_NOTE->CssClass = "";
			$t_tinbai_levelsite->C_NOTE->ViewCustomAttributes = "";

			// PK_TINBAI_ID
			$t_tinbai_levelsite->PK_TINBAI_ID->HrefValue = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->TooltipValue = "";

			// FK_CONGTY_ID
			$t_tinbai_levelsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->TooltipValue = "";

			// FK_CHUYENMUC_ID
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->TooltipValue = "";

			// FK_DOITUONG_ID
			$t_tinbai_levelsite->FK_DOITUONG_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_levelsite->C_TITLE->HrefValue = "";
			$t_tinbai_levelsite->C_TITLE->TooltipValue = "";

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->HrefValue = "";
			$t_tinbai_levelsite->C_SUMARY->TooltipValue = "";

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->HrefValue = "";
			$t_tinbai_levelsite->C_CONTENTS->TooltipValue = "";

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->HrefValue = "";
			$t_tinbai_levelsite->C_VISITOR->TooltipValue = "";

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->HrefValue = "";
			$t_tinbai_levelsite->C_SOURCE->TooltipValue = "";

			// C_HITS
			$t_tinbai_levelsite->C_HITS->HrefValue = "";
			$t_tinbai_levelsite->C_HITS->TooltipValue = "";

			// C_FILEANH
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = ew_UploadPathEx(FALSE, $t_tinbai_levelsite->C_FILEANH->UploadPath) . ((!empty($t_tinbai_levelsite->C_FILEANH->ViewValue)) ? $t_tinbai_levelsite->C_FILEANH->ViewValue : $t_tinbai_levelsite->C_FILEANH->CurrentValue);
				if ($t_tinbai_levelsite->Export <> "") $t_tinbai_levelsite->C_FILEANH->HrefValue = ew_ConvertFullUrl($t_tinbai_levelsite->C_FILEANH->HrefValue);
			} else {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = "";
			}
			$t_tinbai_levelsite->C_FILEANH->TooltipValue = "";

			// C_COMENT
			$t_tinbai_levelsite->C_COMENT->HrefValue = "";
			$t_tinbai_levelsite->C_COMENT->TooltipValue = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->HrefValue = "";
			$t_tinbai_levelsite->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_tinbai_levelsite->C_ACTIVE->HrefValue = "";
			$t_tinbai_levelsite->C_ACTIVE->TooltipValue = "";

			// C_PUBLISH
			$t_tinbai_levelsite->C_PUBLISH->HrefValue = "";
			$t_tinbai_levelsite->C_PUBLISH->TooltipValue = "";

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->HrefValue = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->TooltipValue = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_levelsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_levelsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_levelsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_levelsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_levelsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_levelsite->C_EDIT_TIME->TooltipValue = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->TooltipValue = "";

			// C_STATUS
			$t_tinbai_levelsite->C_STATUS->HrefValue = "";
			$t_tinbai_levelsite->C_STATUS->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->TooltipValue = "";

			// C_NOTE
			$t_tinbai_levelsite->C_NOTE->HrefValue = "";
			$t_tinbai_levelsite->C_NOTE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_tinbai_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_levelsite->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_tinbai_levelsite;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_tinbai_levelsite->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;
		$this->SetUpStartRec(); // Set up start record position

		// Set the last record to display
		if ($this->lDisplayRecs < 0) {
			$this->lStopRec = $this->lTotalRecs;
		} else {
			$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
		}
		if (!$rs) {
			header("Content-Type:"); // Remove header
			header("Content-Disposition:");
			$this->ShowMessage();
			return;
		}
		if ($t_tinbai_levelsite->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_tinbai_levelsite, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_tinbai_levelsite->PK_TINBAI_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->FK_CHUYENMUC_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->FK_DOITUONG_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_TITLE);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_VISITOR);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_SOURCE);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_HITS);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_COMENT);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_ORDER);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_ACTIVE);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_PUBLISH);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_TIMEPUBLISH);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_USER_ADD);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->FK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_STATUS);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->FK_EDITOR_ID);
				$ExportDoc->ExportCaption($t_tinbai_levelsite->C_NOTE);
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
				$t_tinbai_levelsite->CssClass = "";
				$t_tinbai_levelsite->CssStyle = "";
				$t_tinbai_levelsite->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_tinbai_levelsite->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_TINBAI_ID', $t_tinbai_levelsite->PK_TINBAI_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_tinbai_levelsite->FK_CONGTY_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_CHUYENMUC_ID', $t_tinbai_levelsite->FK_CHUYENMUC_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DOITUONG_ID', $t_tinbai_levelsite->FK_DOITUONG_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_tinbai_levelsite->C_TITLE->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_VISITOR', $t_tinbai_levelsite->C_VISITOR->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_SOURCE', $t_tinbai_levelsite->C_SOURCE->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_HITS', $t_tinbai_levelsite->C_HITS->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_COMENT', $t_tinbai_levelsite->C_COMENT->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_tinbai_levelsite->C_ORDER->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_tinbai_levelsite->C_ACTIVE->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_PUBLISH', $t_tinbai_levelsite->C_PUBLISH->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TIMEPUBLISH', $t_tinbai_levelsite->C_TIMEPUBLISH->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_tinbai_levelsite->C_USER_ADD->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_tinbai_levelsite->C_ADD_TIME->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_tinbai_levelsite->C_USER_EDIT->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_tinbai_levelsite->C_EDIT_TIME->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_NGUOIDUNG_ID', $t_tinbai_levelsite->FK_NGUOIDUNG_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS', $t_tinbai_levelsite->C_STATUS->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_EDITOR_ID', $t_tinbai_levelsite->FK_EDITOR_ID->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
					$XmlDoc->AddField('C_NOTE', $t_tinbai_levelsite->C_NOTE->ExportValue($t_tinbai_levelsite->Export, $t_tinbai_levelsite->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_tinbai_levelsite->PK_TINBAI_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->FK_CHUYENMUC_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->FK_DOITUONG_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_TITLE);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_VISITOR);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_SOURCE);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_HITS);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_COMENT);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_ORDER);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_ACTIVE);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_PUBLISH);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_TIMEPUBLISH);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_USER_ADD);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_ADD_TIME);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_USER_EDIT);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_EDIT_TIME);
					$ExportDoc->ExportField($t_tinbai_levelsite->FK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_STATUS);
					$ExportDoc->ExportField($t_tinbai_levelsite->FK_EDITOR_ID);
					$ExportDoc->ExportField($t_tinbai_levelsite->C_NOTE);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_tinbai_levelsite->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_tinbai_levelsite->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_tinbai_levelsite->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_tinbai_levelsite->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_tinbai_levelsite->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_tinbai_levelsite;
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
		if ($t_tinbai_levelsite->Email_Sending($Email, $EventArgs))
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
		global $t_tinbai_levelsite;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_tinbai_levelsite->KeyUrl("", ""), 1);
		return $sQry;
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
}
?>
