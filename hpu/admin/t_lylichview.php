<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lylichinfo.php" ?>
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
$t_lylich_view = new ct_lylich_view();
$Page =& $t_lylich_view;

// Page init
$t_lylich_view->Page_Init();

// Page main
$t_lylich_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_lylich->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_lylich_view = new ew_Page("t_lylich_view");

// page properties
t_lylich_view.PageID = "view"; // page ID
t_lylich_view.FormID = "ft_lylichview"; // form ID
var EW_PAGE_ID = t_lylich_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lylich_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lylich_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lylich_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lylich_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lylich->TableCaption() ?>
<?php if ($t_lylich->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lylich_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_lylich" id="emf_t_lylich" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_lylich',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_lylich_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_lylich->Export == "") { ?>
<a href="<?php echo $t_lylich_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_lylich_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_lylich_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_lylich_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_lylich_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lylich_view->ShowMessage();
?>
<p>
<?php if ($t_lylich->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lylich_view->Pager)) $t_lylich_view->Pager = new cNumericPager($t_lylich_view->lStartRec, $t_lylich_view->lDisplayRecs, $t_lylich_view->lTotalRecs, $t_lylich_view->lRecRange) ?>
<?php if ($t_lylich_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_lylich_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lylich_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lylich_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_lylich->PK_PROFILE_ID->Visible) { // PK_PROFILE_ID ?>
	<tr<?php echo $t_lylich->PK_PROFILE_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->PK_PROFILE_ID->FldCaption() ?></td>
		<td<?php echo $t_lylich->PK_PROFILE_ID->CellAttributes() ?>>
<div<?php echo $t_lylich->PK_PROFILE_ID->ViewAttributes() ?>><?php echo $t_lylich->PK_PROFILE_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_lylich->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_lylich->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_lylich->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_lylich->FK_CONGTY_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_PIC->Visible) { // C_PIC ?>
	<tr<?php echo $t_lylich->C_PIC->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_PIC->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_PIC->CellAttributes() ?>>
<?php if ($t_lylich->C_PIC->HrefValue <> "" || $t_lylich->C_PIC->TooltipValue <> "") { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<a href="<?php echo $t_lylich->C_PIC->HrefValue ?>"><?php echo $t_lylich->C_PIC->ViewValue ?></a>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<?php echo $t_lylich->C_PIC->ViewValue ?>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_FULLNAME->Visible) { // C_FULLNAME ?>
	<tr<?php echo $t_lylich->C_FULLNAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_FULLNAME->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_FULLNAME->CellAttributes() ?>>
<div<?php echo $t_lylich->C_FULLNAME->ViewAttributes() ?>><?php echo $t_lylich->C_FULLNAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_POSITION->Visible) { // C_POSITION ?>
	<tr<?php echo $t_lylich->C_POSITION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_POSITION->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_POSITION->CellAttributes() ?>>
<div<?php echo $t_lylich->C_POSITION->ViewAttributes() ?>><?php echo $t_lylich->C_POSITION->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_WORK_ADDRESS->Visible) { // C_WORK_ADDRESS ?>
	<tr<?php echo $t_lylich->C_WORK_ADDRESS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_WORK_ADDRESS->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_WORK_ADDRESS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_WORK_ADDRESS->ViewAttributes() ?>><?php echo $t_lylich->C_WORK_ADDRESS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $t_lylich->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_EMAIL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_EMAIL->ViewAttributes() ?>><?php echo $t_lylich->C_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_PHONE->Visible) { // C_PHONE ?>
	<tr<?php echo $t_lylich->C_PHONE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_PHONE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_PHONE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_PHONE->ViewAttributes() ?>><?php echo $t_lylich->C_PHONE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_BIRTHDAY->Visible) { // C_BIRTHDAY ?>
	<tr<?php echo $t_lylich->C_BIRTHDAY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_BIRTHDAY->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_BIRTHDAY->CellAttributes() ?>>
<div<?php echo $t_lylich->C_BIRTHDAY->ViewAttributes() ?>><?php echo $t_lylich->C_BIRTHDAY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_BLOG->Visible) { // C_BLOG ?>
	<tr<?php echo $t_lylich->C_BLOG->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_BLOG->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_BLOG->CellAttributes() ?>>
<div<?php echo $t_lylich->C_BLOG->ViewAttributes() ?>><?php echo $t_lylich->C_BLOG->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_PERSONAL_PROFILE->Visible) { // C_PERSONAL_PROFILE ?>
	<tr<?php echo $t_lylich->C_PERSONAL_PROFILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_PERSONAL_PROFILE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_PERSONAL_PROFILE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_PERSONAL_PROFILE->ViewAttributes() ?>><?php echo $t_lylich->C_PERSONAL_PROFILE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_EDUCATIION->Visible) { // C_EDUCATIION ?>
	<tr<?php echo $t_lylich->C_EDUCATIION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_EDUCATIION->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_EDUCATIION->CellAttributes() ?>>
<div<?php echo $t_lylich->C_EDUCATIION->ViewAttributes() ?>><?php echo $t_lylich->C_EDUCATIION->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_SKILLS->Visible) { // C_SKILLS ?>
	<tr<?php echo $t_lylich->C_SKILLS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_SKILLS->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_SKILLS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_SKILLS->ViewAttributes() ?>><?php echo $t_lylich->C_SKILLS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_WORK_EXPERIENCE->Visible) { // C_WORK_EXPERIENCE ?>
	<tr<?php echo $t_lylich->C_WORK_EXPERIENCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_WORK_EXPERIENCE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_WORK_EXPERIENCE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_WORK_EXPERIENCE->ViewAttributes() ?>><?php echo $t_lylich->C_WORK_EXPERIENCE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_SCIENTIFIC_RESEARCH->Visible) { // C_SCIENTIFIC_RESEARCH ?>
	<tr<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->CellAttributes() ?>>
<div<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->ViewAttributes() ?>><?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_REFERENCES->Visible) { // C_REFERENCES ?>
	<tr<?php echo $t_lylich->C_REFERENCES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_REFERENCES->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_REFERENCES->CellAttributes() ?>>
<div<?php echo $t_lylich->C_REFERENCES->ViewAttributes() ?>><?php echo $t_lylich->C_REFERENCES->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_HOBBIES->Visible) { // C_HOBBIES ?>
	<tr<?php echo $t_lylich->C_HOBBIES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_HOBBIES->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_HOBBIES->CellAttributes() ?>>
<div<?php echo $t_lylich->C_HOBBIES->ViewAttributes() ?>><?php echo $t_lylich->C_HOBBIES->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_TEMPLATE->Visible) { // C_TEMPLATE ?>
	<tr<?php echo $t_lylich->C_TEMPLATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_TEMPLATE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_TEMPLATE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TEMPLATE->ViewAttributes() ?>><?php echo $t_lylich->C_TEMPLATE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_STATUS->Visible) { // C_STATUS ?>
	<tr<?php echo $t_lylich->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_STATUS->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_STATUS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_STATUS->ViewAttributes() ?>><?php echo $t_lylich->C_STATUS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_lylich->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_NOTE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_NOTE->ViewAttributes() ?>><?php echo $t_lylich->C_NOTE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_lylich->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_lylich->C_USER_ADD->ViewAttributes() ?>><?php echo $t_lylich->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_lylich->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_lylich->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_lylich->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_lylich->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_lylich->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_lylich->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_lylich->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_lylich->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ORDER_LEVEL->Visible) { // C_ORDER_LEVEL ?>
	<tr<?php echo $t_lylich->C_ORDER_LEVEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_ORDER_LEVEL->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ORDER_LEVEL->ViewAttributes() ?>><?php echo $t_lylich->C_ORDER_LEVEL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_lylich->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_TIME_ACTIVE->Visible) { // C_TIME_ACTIVE ?>
	<tr<?php echo $t_lylich->C_TIME_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_TIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_TIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
	<tr<?php echo $t_lylich->C_ACTIVE_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_TIME_ACTIVEM->Visible) { // C_TIME_ACTIVEM ?>
	<tr<?php echo $t_lylich->C_TIME_ACTIVEM->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_TIME_ACTIVEM->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_TIME_ACTIVEM->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TIME_ACTIVEM->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVEM->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ORDER_MAIN->Visible) { // C_ORDER_MAIN ?>
	<tr<?php echo $t_lylich->C_ORDER_MAIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_ORDER_MAIN->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ORDER_MAIN->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ORDER_MAIN->ViewAttributes() ?>><?php echo $t_lylich->C_ORDER_MAIN->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_lylich->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_lylich_view->Pager)) $t_lylich_view->Pager = new cNumericPager($t_lylich_view->lStartRec, $t_lylich_view->lDisplayRecs, $t_lylich_view->lTotalRecs, $t_lylich_view->lRecRange) ?>
<?php if ($t_lylich_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_lylich_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_lylich_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_lylich_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_lylich_view->PageUrl() ?>start=<?php echo $t_lylich_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_lylich_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_lylich->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_lylich_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lylich_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_lylich';

	// Page object name
	var $PageObjName = 't_lylich_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lylich;
		if ($t_lylich->UseTokenInUrl) $PageUrl .= "t=" . $t_lylich->TableVar . "&"; // Add page token
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
		global $objForm, $t_lylich;
		if ($t_lylich->UseTokenInUrl) {
			if ($objForm)
				return ($t_lylich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lylich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lylich_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lylich)
		$GLOBALS["t_lylich"] = new ct_lylich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lylich', TRUE);

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
		global $t_lylich;

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
			$this->Page_Terminate("t_lylichlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_lylich->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_lylich->Export = $_POST["exporttype"];
		} else {
			$t_lylich->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_lylich->Export; // Get export parameter, used in header
		$gsExportFile = $t_lylich->TableVar; // Get export file, used in header
		if (@$_GET["PK_PROFILE_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_PROFILE_ID"]);
		}
		if (in_array($t_lylich->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_lylich->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_lylich->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_lylich->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_lylich->Export == "csv") {
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
		global $Language, $t_lylich;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_PROFILE_ID"] <> "") {
				$t_lylich->PK_PROFILE_ID->setQueryStringValue($_GET["PK_PROFILE_ID"]);
				$this->arRecKey["PK_PROFILE_ID"] = $t_lylich->PK_PROFILE_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_lylich->CurrentAction = "I"; // Display form
			switch ($t_lylich->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_lylichlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_lylich->PK_PROFILE_ID->CurrentValue) == strval($rs->fields('PK_PROFILE_ID'))) {
								$t_lylich->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_lylichlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_lylich->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_lylich->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_lylichlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_lylich->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_lylich;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_lylich->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_lylich->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_lylich->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_lylich->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_lylich->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_lylich->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lylich;

		// Call Recordset Selecting event
		$t_lylich->Recordset_Selecting($t_lylich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lylich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lylich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lylich;
		$sFilter = $t_lylich->KeyFilter();

		// Call Row Selecting event
		$t_lylich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lylich->CurrentFilter = $sFilter;
		$sSql = $t_lylich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lylich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lylich;
		$t_lylich->PK_PROFILE_ID->setDbValue($rs->fields('PK_PROFILE_ID'));
		$t_lylich->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_lylich->C_PIC->Upload->DbValue = $rs->fields('C_PIC');
		$t_lylich->C_FULLNAME->setDbValue($rs->fields('C_FULLNAME'));
		$t_lylich->C_POSITION->setDbValue($rs->fields('C_POSITION'));
		$t_lylich->C_WORK_ADDRESS->setDbValue($rs->fields('C_WORK_ADDRESS'));
		$t_lylich->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_lylich->C_PHONE->setDbValue($rs->fields('C_PHONE'));
		$t_lylich->C_BIRTHDAY->setDbValue($rs->fields('C_BIRTHDAY'));
		$t_lylich->C_BLOG->setDbValue($rs->fields('C_BLOG'));
		$t_lylich->C_PERSONAL_PROFILE->setDbValue($rs->fields('C_PERSONAL_PROFILE'));
		$t_lylich->C_EDUCATIION->setDbValue($rs->fields('C_EDUCATIION'));
		$t_lylich->C_SKILLS->setDbValue($rs->fields('C_SKILLS'));
		$t_lylich->C_WORK_EXPERIENCE->setDbValue($rs->fields('C_WORK_EXPERIENCE'));
		$t_lylich->C_SCIENTIFIC_RESEARCH->setDbValue($rs->fields('C_SCIENTIFIC_RESEARCH'));
		$t_lylich->C_REFERENCES->setDbValue($rs->fields('C_REFERENCES'));
		$t_lylich->C_HOBBIES->setDbValue($rs->fields('C_HOBBIES'));
		$t_lylich->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
		$t_lylich->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_lylich->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_lylich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lylich->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lylich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lylich->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_lylich->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
		$t_lylich->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lylich->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_lylich->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_lylich->C_TIME_ACTIVEM->setDbValue($rs->fields('C_TIME_ACTIVEM'));
		$t_lylich->C_ORDER_MAIN->setDbValue($rs->fields('C_ORDER_MAIN'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lylich;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_PROFILE_ID=" . urlencode($t_lylich->PK_PROFILE_ID->CurrentValue);
		$this->AddUrl = $t_lylich->AddUrl();
		$this->EditUrl = $t_lylich->EditUrl();
		$this->CopyUrl = $t_lylich->CopyUrl();
		$this->DeleteUrl = $t_lylich->DeleteUrl();
		$this->ListUrl = $t_lylich->ListUrl();

		// Call Row_Rendering event
		$t_lylich->Row_Rendering();

		// Common render codes for all row types
		// PK_PROFILE_ID

		$t_lylich->PK_PROFILE_ID->CellCssStyle = ""; $t_lylich->PK_PROFILE_ID->CellCssClass = "";
		$t_lylich->PK_PROFILE_ID->CellAttrs = array(); $t_lylich->PK_PROFILE_ID->ViewAttrs = array(); $t_lylich->PK_PROFILE_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$t_lylich->FK_CONGTY_ID->CellCssStyle = ""; $t_lylich->FK_CONGTY_ID->CellCssClass = "";
		$t_lylich->FK_CONGTY_ID->CellAttrs = array(); $t_lylich->FK_CONGTY_ID->ViewAttrs = array(); $t_lylich->FK_CONGTY_ID->EditAttrs = array();

		// C_PIC
		$t_lylich->C_PIC->CellCssStyle = ""; $t_lylich->C_PIC->CellCssClass = "";
		$t_lylich->C_PIC->CellAttrs = array(); $t_lylich->C_PIC->ViewAttrs = array(); $t_lylich->C_PIC->EditAttrs = array();

		// C_FULLNAME
		$t_lylich->C_FULLNAME->CellCssStyle = ""; $t_lylich->C_FULLNAME->CellCssClass = "";
		$t_lylich->C_FULLNAME->CellAttrs = array(); $t_lylich->C_FULLNAME->ViewAttrs = array(); $t_lylich->C_FULLNAME->EditAttrs = array();

		// C_POSITION
		$t_lylich->C_POSITION->CellCssStyle = ""; $t_lylich->C_POSITION->CellCssClass = "";
		$t_lylich->C_POSITION->CellAttrs = array(); $t_lylich->C_POSITION->ViewAttrs = array(); $t_lylich->C_POSITION->EditAttrs = array();

		// C_WORK_ADDRESS
		$t_lylich->C_WORK_ADDRESS->CellCssStyle = ""; $t_lylich->C_WORK_ADDRESS->CellCssClass = "";
		$t_lylich->C_WORK_ADDRESS->CellAttrs = array(); $t_lylich->C_WORK_ADDRESS->ViewAttrs = array(); $t_lylich->C_WORK_ADDRESS->EditAttrs = array();

		// C_EMAIL
		$t_lylich->C_EMAIL->CellCssStyle = ""; $t_lylich->C_EMAIL->CellCssClass = "";
		$t_lylich->C_EMAIL->CellAttrs = array(); $t_lylich->C_EMAIL->ViewAttrs = array(); $t_lylich->C_EMAIL->EditAttrs = array();

		// C_PHONE
		$t_lylich->C_PHONE->CellCssStyle = ""; $t_lylich->C_PHONE->CellCssClass = "";
		$t_lylich->C_PHONE->CellAttrs = array(); $t_lylich->C_PHONE->ViewAttrs = array(); $t_lylich->C_PHONE->EditAttrs = array();

		// C_BIRTHDAY
		$t_lylich->C_BIRTHDAY->CellCssStyle = ""; $t_lylich->C_BIRTHDAY->CellCssClass = "";
		$t_lylich->C_BIRTHDAY->CellAttrs = array(); $t_lylich->C_BIRTHDAY->ViewAttrs = array(); $t_lylich->C_BIRTHDAY->EditAttrs = array();

		// C_BLOG
		$t_lylich->C_BLOG->CellCssStyle = ""; $t_lylich->C_BLOG->CellCssClass = "";
		$t_lylich->C_BLOG->CellAttrs = array(); $t_lylich->C_BLOG->ViewAttrs = array(); $t_lylich->C_BLOG->EditAttrs = array();

		// C_PERSONAL_PROFILE
		$t_lylich->C_PERSONAL_PROFILE->CellCssStyle = ""; $t_lylich->C_PERSONAL_PROFILE->CellCssClass = "";
		$t_lylich->C_PERSONAL_PROFILE->CellAttrs = array(); $t_lylich->C_PERSONAL_PROFILE->ViewAttrs = array(); $t_lylich->C_PERSONAL_PROFILE->EditAttrs = array();

		// C_EDUCATIION
		$t_lylich->C_EDUCATIION->CellCssStyle = ""; $t_lylich->C_EDUCATIION->CellCssClass = "";
		$t_lylich->C_EDUCATIION->CellAttrs = array(); $t_lylich->C_EDUCATIION->ViewAttrs = array(); $t_lylich->C_EDUCATIION->EditAttrs = array();

		// C_SKILLS
		$t_lylich->C_SKILLS->CellCssStyle = ""; $t_lylich->C_SKILLS->CellCssClass = "";
		$t_lylich->C_SKILLS->CellAttrs = array(); $t_lylich->C_SKILLS->ViewAttrs = array(); $t_lylich->C_SKILLS->EditAttrs = array();

		// C_WORK_EXPERIENCE
		$t_lylich->C_WORK_EXPERIENCE->CellCssStyle = ""; $t_lylich->C_WORK_EXPERIENCE->CellCssClass = "";
		$t_lylich->C_WORK_EXPERIENCE->CellAttrs = array(); $t_lylich->C_WORK_EXPERIENCE->ViewAttrs = array(); $t_lylich->C_WORK_EXPERIENCE->EditAttrs = array();

		// C_SCIENTIFIC_RESEARCH
		$t_lylich->C_SCIENTIFIC_RESEARCH->CellCssStyle = ""; $t_lylich->C_SCIENTIFIC_RESEARCH->CellCssClass = "";
		$t_lylich->C_SCIENTIFIC_RESEARCH->CellAttrs = array(); $t_lylich->C_SCIENTIFIC_RESEARCH->ViewAttrs = array(); $t_lylich->C_SCIENTIFIC_RESEARCH->EditAttrs = array();

		// C_REFERENCES
		$t_lylich->C_REFERENCES->CellCssStyle = ""; $t_lylich->C_REFERENCES->CellCssClass = "";
		$t_lylich->C_REFERENCES->CellAttrs = array(); $t_lylich->C_REFERENCES->ViewAttrs = array(); $t_lylich->C_REFERENCES->EditAttrs = array();

		// C_HOBBIES
		$t_lylich->C_HOBBIES->CellCssStyle = ""; $t_lylich->C_HOBBIES->CellCssClass = "";
		$t_lylich->C_HOBBIES->CellAttrs = array(); $t_lylich->C_HOBBIES->ViewAttrs = array(); $t_lylich->C_HOBBIES->EditAttrs = array();

		// C_TEMPLATE
		$t_lylich->C_TEMPLATE->CellCssStyle = ""; $t_lylich->C_TEMPLATE->CellCssClass = "";
		$t_lylich->C_TEMPLATE->CellAttrs = array(); $t_lylich->C_TEMPLATE->ViewAttrs = array(); $t_lylich->C_TEMPLATE->EditAttrs = array();

		// C_STATUS
		$t_lylich->C_STATUS->CellCssStyle = ""; $t_lylich->C_STATUS->CellCssClass = "";
		$t_lylich->C_STATUS->CellAttrs = array(); $t_lylich->C_STATUS->ViewAttrs = array(); $t_lylich->C_STATUS->EditAttrs = array();

		// C_NOTE
		$t_lylich->C_NOTE->CellCssStyle = ""; $t_lylich->C_NOTE->CellCssClass = "";
		$t_lylich->C_NOTE->CellAttrs = array(); $t_lylich->C_NOTE->ViewAttrs = array(); $t_lylich->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_lylich->C_USER_ADD->CellCssStyle = ""; $t_lylich->C_USER_ADD->CellCssClass = "";
		$t_lylich->C_USER_ADD->CellAttrs = array(); $t_lylich->C_USER_ADD->ViewAttrs = array(); $t_lylich->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_lylich->C_ADD_TIME->CellCssStyle = ""; $t_lylich->C_ADD_TIME->CellCssClass = "";
		$t_lylich->C_ADD_TIME->CellAttrs = array(); $t_lylich->C_ADD_TIME->ViewAttrs = array(); $t_lylich->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_lylich->C_USER_EDIT->CellCssStyle = ""; $t_lylich->C_USER_EDIT->CellCssClass = "";
		$t_lylich->C_USER_EDIT->CellAttrs = array(); $t_lylich->C_USER_EDIT->ViewAttrs = array(); $t_lylich->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_lylich->C_EDIT_TIME->CellCssStyle = ""; $t_lylich->C_EDIT_TIME->CellCssClass = "";
		$t_lylich->C_EDIT_TIME->CellAttrs = array(); $t_lylich->C_EDIT_TIME->ViewAttrs = array(); $t_lylich->C_EDIT_TIME->EditAttrs = array();

		// C_ORDER_LEVEL
		$t_lylich->C_ORDER_LEVEL->CellCssStyle = ""; $t_lylich->C_ORDER_LEVEL->CellCssClass = "";
		$t_lylich->C_ORDER_LEVEL->CellAttrs = array(); $t_lylich->C_ORDER_LEVEL->ViewAttrs = array(); $t_lylich->C_ORDER_LEVEL->EditAttrs = array();

		// C_ACTIVE
		$t_lylich->C_ACTIVE->CellCssStyle = ""; $t_lylich->C_ACTIVE->CellCssClass = "";
		$t_lylich->C_ACTIVE->CellAttrs = array(); $t_lylich->C_ACTIVE->ViewAttrs = array(); $t_lylich->C_ACTIVE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_lylich->C_TIME_ACTIVE->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVE->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVE->CellAttrs = array(); $t_lylich->C_TIME_ACTIVE->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_lylich->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_lylich->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_lylich->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVEM
		$t_lylich->C_TIME_ACTIVEM->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVEM->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVEM->CellAttrs = array(); $t_lylich->C_TIME_ACTIVEM->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVEM->EditAttrs = array();

		// C_ORDER_MAIN
		$t_lylich->C_ORDER_MAIN->CellCssStyle = ""; $t_lylich->C_ORDER_MAIN->CellCssClass = "";
		$t_lylich->C_ORDER_MAIN->CellAttrs = array(); $t_lylich->C_ORDER_MAIN->ViewAttrs = array(); $t_lylich->C_ORDER_MAIN->EditAttrs = array();
		if ($t_lylich->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_PROFILE_ID
			$t_lylich->PK_PROFILE_ID->ViewValue = $t_lylich->PK_PROFILE_ID->CurrentValue;
			$t_lylich->PK_PROFILE_ID->CssStyle = "";
			$t_lylich->PK_PROFILE_ID->CssClass = "";
			$t_lylich->PK_PROFILE_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_lylich->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lylich->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lylich->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lylich->FK_CONGTY_ID->ViewValue = $t_lylich->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_lylich->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_lylich->FK_CONGTY_ID->CssStyle = "";
			$t_lylich->FK_CONGTY_ID->CssClass = "";
			$t_lylich->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->ViewValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->ViewValue = "";
			}
			$t_lylich->C_PIC->CssStyle = "";
			$t_lylich->C_PIC->CssClass = "";
			$t_lylich->C_PIC->ViewCustomAttributes = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->ViewValue = $t_lylich->C_FULLNAME->CurrentValue;
			$t_lylich->C_FULLNAME->CssStyle = "";
			$t_lylich->C_FULLNAME->CssClass = "";
			$t_lylich->C_FULLNAME->ViewCustomAttributes = "";

			// C_POSITION
			$t_lylich->C_POSITION->ViewValue = $t_lylich->C_POSITION->CurrentValue;
			$t_lylich->C_POSITION->CssStyle = "";
			$t_lylich->C_POSITION->CssClass = "";
			$t_lylich->C_POSITION->ViewCustomAttributes = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->ViewValue = $t_lylich->C_WORK_ADDRESS->CurrentValue;
			$t_lylich->C_WORK_ADDRESS->CssStyle = "";
			$t_lylich->C_WORK_ADDRESS->CssClass = "";
			$t_lylich->C_WORK_ADDRESS->ViewCustomAttributes = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->ViewValue = $t_lylich->C_EMAIL->CurrentValue;
			$t_lylich->C_EMAIL->CssStyle = "";
			$t_lylich->C_EMAIL->CssClass = "";
			$t_lylich->C_EMAIL->ViewCustomAttributes = "";

			// C_PHONE
			$t_lylich->C_PHONE->ViewValue = $t_lylich->C_PHONE->CurrentValue;
			$t_lylich->C_PHONE->CssStyle = "";
			$t_lylich->C_PHONE->CssClass = "";
			$t_lylich->C_PHONE->ViewCustomAttributes = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->ViewValue = $t_lylich->C_BIRTHDAY->CurrentValue;
			$t_lylich->C_BIRTHDAY->CssStyle = "";
			$t_lylich->C_BIRTHDAY->CssClass = "";
			$t_lylich->C_BIRTHDAY->ViewCustomAttributes = "";

			// C_BLOG
			$t_lylich->C_BLOG->ViewValue = $t_lylich->C_BLOG->CurrentValue;
			$t_lylich->C_BLOG->CssStyle = "";
			$t_lylich->C_BLOG->CssClass = "";
			$t_lylich->C_BLOG->ViewCustomAttributes = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->ViewValue = $t_lylich->C_PERSONAL_PROFILE->CurrentValue;
			$t_lylich->C_PERSONAL_PROFILE->CssStyle = "";
			$t_lylich->C_PERSONAL_PROFILE->CssClass = "";
			$t_lylich->C_PERSONAL_PROFILE->ViewCustomAttributes = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->ViewValue = $t_lylich->C_EDUCATIION->CurrentValue;
			$t_lylich->C_EDUCATIION->CssStyle = "";
			$t_lylich->C_EDUCATIION->CssClass = "";
			$t_lylich->C_EDUCATIION->ViewCustomAttributes = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->ViewValue = $t_lylich->C_SKILLS->CurrentValue;
			$t_lylich->C_SKILLS->CssStyle = "";
			$t_lylich->C_SKILLS->CssClass = "";
			$t_lylich->C_SKILLS->ViewCustomAttributes = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->ViewValue = $t_lylich->C_WORK_EXPERIENCE->CurrentValue;
			$t_lylich->C_WORK_EXPERIENCE->CssStyle = "";
			$t_lylich->C_WORK_EXPERIENCE->CssClass = "";
			$t_lylich->C_WORK_EXPERIENCE->ViewCustomAttributes = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewValue = $t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue;
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssStyle = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssClass = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewCustomAttributes = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->ViewValue = $t_lylich->C_REFERENCES->CurrentValue;
			$t_lylich->C_REFERENCES->CssStyle = "";
			$t_lylich->C_REFERENCES->CssClass = "";
			$t_lylich->C_REFERENCES->ViewCustomAttributes = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->ViewValue = $t_lylich->C_HOBBIES->CurrentValue;
			$t_lylich->C_HOBBIES->CssStyle = "";
			$t_lylich->C_HOBBIES->CssClass = "";
			$t_lylich->C_HOBBIES->ViewCustomAttributes = "";

			// C_TEMPLATE
			if (strval($t_lylich->C_TEMPLATE->CurrentValue) <> "") {
				switch ($t_lylich->C_TEMPLATE->CurrentValue) {
					case "1":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 1";
						break;
					case "2":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 2";
						break;
					default:
						$t_lylich->C_TEMPLATE->ViewValue = $t_lylich->C_TEMPLATE->CurrentValue;
				}
			} else {
				$t_lylich->C_TEMPLATE->ViewValue = NULL;
			}
			$t_lylich->C_TEMPLATE->CssStyle = "";
			$t_lylich->C_TEMPLATE->CssClass = "";
			$t_lylich->C_TEMPLATE->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_lylich->C_STATUS->CurrentValue) <> "") {
				switch ($t_lylich->C_STATUS->CurrentValue) {
					case "0":
						$t_lylich->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_lylich->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_STATUS->ViewValue = $t_lylich->C_STATUS->CurrentValue;
				}
			} else {
				$t_lylich->C_STATUS->ViewValue = NULL;
			}
			$t_lylich->C_STATUS->CssStyle = "";
			$t_lylich->C_STATUS->CssClass = "";
			$t_lylich->C_STATUS->ViewCustomAttributes = "";

			// C_NOTE
			$t_lylich->C_NOTE->ViewValue = $t_lylich->C_NOTE->CurrentValue;
			$t_lylich->C_NOTE->CssStyle = "";
			$t_lylich->C_NOTE->CssClass = "";
			$t_lylich->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lylich->C_USER_ADD->ViewValue = $t_lylich->C_USER_ADD->CurrentValue;
			$t_lylich->C_USER_ADD->CssStyle = "";
			$t_lylich->C_USER_ADD->CssClass = "";
			$t_lylich->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lylich->C_ADD_TIME->ViewValue = $t_lylich->C_ADD_TIME->CurrentValue;
			$t_lylich->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_ADD_TIME->ViewValue, 7);
			$t_lylich->C_ADD_TIME->CssStyle = "";
			$t_lylich->C_ADD_TIME->CssClass = "";
			$t_lylich->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->ViewValue = $t_lylich->C_USER_EDIT->CurrentValue;
			$t_lylich->C_USER_EDIT->CssStyle = "";
			$t_lylich->C_USER_EDIT->CssClass = "";
			$t_lylich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->ViewValue = $t_lylich->C_EDIT_TIME->CurrentValue;
			$t_lylich->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_EDIT_TIME->ViewValue, 7);
			$t_lylich->C_EDIT_TIME->CssStyle = "";
			$t_lylich->C_EDIT_TIME->CssClass = "";
			$t_lylich->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->ViewValue = $t_lylich->C_ORDER_LEVEL->CurrentValue;
			$t_lylich->C_ORDER_LEVEL->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_LEVEL->ViewValue, 7);
			$t_lylich->C_ORDER_LEVEL->CssStyle = "";
			$t_lylich->C_ORDER_LEVEL->CssClass = "";
			$t_lylich->C_ORDER_LEVEL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lylich->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_lylich->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_ACTIVE->ViewValue = $t_lylich->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE->CssStyle = "";
			$t_lylich->C_ACTIVE->CssClass = "";
			$t_lylich->C_ACTIVE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->ViewValue = $t_lylich->C_TIME_ACTIVE->CurrentValue;
			$t_lylich->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVE->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVE->CssStyle = "";
			$t_lylich->C_TIME_ACTIVE->CssClass = "";
			$t_lylich->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Khong active mainsite";
						break;
					case "1":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Active mainsite";
						break;
					case "2":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Xac nhan";
						break;
					default:
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = $t_lylich->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_lylich->C_ACTIVE_MAINSITE->CssClass = "";
			$t_lylich->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->ViewValue = $t_lylich->C_TIME_ACTIVEM->CurrentValue;
			$t_lylich->C_TIME_ACTIVEM->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVEM->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVEM->CssStyle = "";
			$t_lylich->C_TIME_ACTIVEM->CssClass = "";
			$t_lylich->C_TIME_ACTIVEM->ViewCustomAttributes = "";

			// C_ORDER_MAIN
			$t_lylich->C_ORDER_MAIN->ViewValue = $t_lylich->C_ORDER_MAIN->CurrentValue;
			$t_lylich->C_ORDER_MAIN->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_MAIN->ViewValue, 7);
			$t_lylich->C_ORDER_MAIN->CssStyle = "";
			$t_lylich->C_ORDER_MAIN->CssClass = "";
			$t_lylich->C_ORDER_MAIN->ViewCustomAttributes = "";

			// PK_PROFILE_ID
			$t_lylich->PK_PROFILE_ID->HrefValue = "";
			$t_lylich->PK_PROFILE_ID->TooltipValue = "";

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->HrefValue = "";
			$t_lylich->FK_CONGTY_ID->TooltipValue = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $t_lylich->C_PIC->UploadPath) . ((!empty($t_lylich->C_PIC->ViewValue)) ? $t_lylich->C_PIC->ViewValue : $t_lylich->C_PIC->CurrentValue);
				if ($t_lylich->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($t_lylich->C_PIC->HrefValue);
			} else {
				$t_lylich->C_PIC->HrefValue = "";
			}
			$t_lylich->C_PIC->TooltipValue = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->HrefValue = "";
			$t_lylich->C_FULLNAME->TooltipValue = "";

			// C_POSITION
			$t_lylich->C_POSITION->HrefValue = "";
			$t_lylich->C_POSITION->TooltipValue = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->HrefValue = "";
			$t_lylich->C_WORK_ADDRESS->TooltipValue = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->HrefValue = "";
			$t_lylich->C_EMAIL->TooltipValue = "";

			// C_PHONE
			$t_lylich->C_PHONE->HrefValue = "";
			$t_lylich->C_PHONE->TooltipValue = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->HrefValue = "";
			$t_lylich->C_BIRTHDAY->TooltipValue = "";

			// C_BLOG
			$t_lylich->C_BLOG->HrefValue = "";
			$t_lylich->C_BLOG->TooltipValue = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->HrefValue = "";
			$t_lylich->C_PERSONAL_PROFILE->TooltipValue = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->HrefValue = "";
			$t_lylich->C_EDUCATIION->TooltipValue = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->HrefValue = "";
			$t_lylich->C_SKILLS->TooltipValue = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->HrefValue = "";
			$t_lylich->C_WORK_EXPERIENCE->TooltipValue = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->HrefValue = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->TooltipValue = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->HrefValue = "";
			$t_lylich->C_REFERENCES->TooltipValue = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->HrefValue = "";
			$t_lylich->C_HOBBIES->TooltipValue = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";
			$t_lylich->C_TEMPLATE->TooltipValue = "";

			// C_STATUS
			$t_lylich->C_STATUS->HrefValue = "";
			$t_lylich->C_STATUS->TooltipValue = "";

			// C_NOTE
			$t_lylich->C_NOTE->HrefValue = "";
			$t_lylich->C_NOTE->TooltipValue = "";

			// C_USER_ADD
			$t_lylich->C_USER_ADD->HrefValue = "";
			$t_lylich->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_lylich->C_ADD_TIME->HrefValue = "";
			$t_lylich->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->HrefValue = "";
			$t_lylich->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->HrefValue = "";
			$t_lylich->C_EDIT_TIME->TooltipValue = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->HrefValue = "";
			$t_lylich->C_ORDER_LEVEL->TooltipValue = "";

			// C_ACTIVE
			$t_lylich->C_ACTIVE->HrefValue = "";
			$t_lylich->C_ACTIVE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->HrefValue = "";
			$t_lylich->C_TIME_ACTIVE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_lylich->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->HrefValue = "";
			$t_lylich->C_TIME_ACTIVEM->TooltipValue = "";

			// C_ORDER_MAIN
			$t_lylich->C_ORDER_MAIN->HrefValue = "";
			$t_lylich->C_ORDER_MAIN->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_lylich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lylich->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_lylich;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_lylich->SelectRecordCount();
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
		if ($t_lylich->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_lylich, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_lylich->PK_PROFILE_ID);
				$ExportDoc->ExportCaption($t_lylich->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_lylich->C_PIC);
				$ExportDoc->ExportCaption($t_lylich->C_FULLNAME);
				$ExportDoc->ExportCaption($t_lylich->C_POSITION);
				$ExportDoc->ExportCaption($t_lylich->C_WORK_ADDRESS);
				$ExportDoc->ExportCaption($t_lylich->C_EMAIL);
				$ExportDoc->ExportCaption($t_lylich->C_PHONE);
				$ExportDoc->ExportCaption($t_lylich->C_BIRTHDAY);
				$ExportDoc->ExportCaption($t_lylich->C_BLOG);
				$ExportDoc->ExportCaption($t_lylich->C_PERSONAL_PROFILE);
				$ExportDoc->ExportCaption($t_lylich->C_EDUCATIION);
				$ExportDoc->ExportCaption($t_lylich->C_SKILLS);
				$ExportDoc->ExportCaption($t_lylich->C_WORK_EXPERIENCE);
				$ExportDoc->ExportCaption($t_lylich->C_SCIENTIFIC_RESEARCH);
				$ExportDoc->ExportCaption($t_lylich->C_REFERENCES);
				$ExportDoc->ExportCaption($t_lylich->C_HOBBIES);
				$ExportDoc->ExportCaption($t_lylich->C_TEMPLATE);
				$ExportDoc->ExportCaption($t_lylich->C_STATUS);
				$ExportDoc->ExportCaption($t_lylich->C_USER_ADD);
				$ExportDoc->ExportCaption($t_lylich->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_lylich->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_lylich->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_lylich->C_ORDER_LEVEL);
				$ExportDoc->ExportCaption($t_lylich->C_TIME_ACTIVE);
				$ExportDoc->ExportCaption($t_lylich->C_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_lylich->C_TIME_ACTIVEM);
				$ExportDoc->ExportCaption($t_lylich->C_ORDER_MAIN);
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
				$t_lylich->CssClass = "";
				$t_lylich->CssStyle = "";
				$t_lylich->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_lylich->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_PROFILE_ID', $t_lylich->PK_PROFILE_ID->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_lylich->FK_CONGTY_ID->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PIC', $t_lylich->C_PIC->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_FULLNAME', $t_lylich->C_FULLNAME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_POSITION', $t_lylich->C_POSITION->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_WORK_ADDRESS', $t_lylich->C_WORK_ADDRESS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $t_lylich->C_EMAIL->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PHONE', $t_lylich->C_PHONE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_BIRTHDAY', $t_lylich->C_BIRTHDAY->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_BLOG', $t_lylich->C_BLOG->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_PERSONAL_PROFILE', $t_lylich->C_PERSONAL_PROFILE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EDUCATIION', $t_lylich->C_EDUCATIION->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_SKILLS', $t_lylich->C_SKILLS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_WORK_EXPERIENCE', $t_lylich->C_WORK_EXPERIENCE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_SCIENTIFIC_RESEARCH', $t_lylich->C_SCIENTIFIC_RESEARCH->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_REFERENCES', $t_lylich->C_REFERENCES->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_HOBBIES', $t_lylich->C_HOBBIES->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TEMPLATE', $t_lylich->C_TEMPLATE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS', $t_lylich->C_STATUS->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_lylich->C_USER_ADD->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_lylich->C_ADD_TIME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_lylich->C_USER_EDIT->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_lylich->C_EDIT_TIME->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_LEVEL', $t_lylich->C_ORDER_LEVEL->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE', $t_lylich->C_TIME_ACTIVE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_MAINSITE', $t_lylich->C_ACTIVE_MAINSITE->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVEM', $t_lylich->C_TIME_ACTIVEM->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_MAIN', $t_lylich->C_ORDER_MAIN->ExportValue($t_lylich->Export, $t_lylich->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_lylich->PK_PROFILE_ID);
					$ExportDoc->ExportField($t_lylich->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_lylich->C_PIC);
					$ExportDoc->ExportField($t_lylich->C_FULLNAME);
					$ExportDoc->ExportField($t_lylich->C_POSITION);
					$ExportDoc->ExportField($t_lylich->C_WORK_ADDRESS);
					$ExportDoc->ExportField($t_lylich->C_EMAIL);
					$ExportDoc->ExportField($t_lylich->C_PHONE);
					$ExportDoc->ExportField($t_lylich->C_BIRTHDAY);
					$ExportDoc->ExportField($t_lylich->C_BLOG);
					$ExportDoc->ExportField($t_lylich->C_PERSONAL_PROFILE);
					$ExportDoc->ExportField($t_lylich->C_EDUCATIION);
					$ExportDoc->ExportField($t_lylich->C_SKILLS);
					$ExportDoc->ExportField($t_lylich->C_WORK_EXPERIENCE);
					$ExportDoc->ExportField($t_lylich->C_SCIENTIFIC_RESEARCH);
					$ExportDoc->ExportField($t_lylich->C_REFERENCES);
					$ExportDoc->ExportField($t_lylich->C_HOBBIES);
					$ExportDoc->ExportField($t_lylich->C_TEMPLATE);
					$ExportDoc->ExportField($t_lylich->C_STATUS);
					$ExportDoc->ExportField($t_lylich->C_USER_ADD);
					$ExportDoc->ExportField($t_lylich->C_ADD_TIME);
					$ExportDoc->ExportField($t_lylich->C_USER_EDIT);
					$ExportDoc->ExportField($t_lylich->C_EDIT_TIME);
					$ExportDoc->ExportField($t_lylich->C_ORDER_LEVEL);
					$ExportDoc->ExportField($t_lylich->C_TIME_ACTIVE);
					$ExportDoc->ExportField($t_lylich->C_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_lylich->C_TIME_ACTIVEM);
					$ExportDoc->ExportField($t_lylich->C_ORDER_MAIN);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_lylich->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_lylich->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_lylich->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_lylich->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_lylich->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_lylich;
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
		if ($t_lylich->Email_Sending($Email, $EventArgs))
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
		global $t_lylich;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_lylich->KeyUrl("", ""), 1);
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
