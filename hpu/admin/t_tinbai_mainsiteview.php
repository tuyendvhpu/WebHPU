<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_mainsiteinfo.php" ?>
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
ini_set('error_reporting', E_STRICT);
// Create page object
$t_tinbai_mainsite_view = new ct_tinbai_mainsite_view();
$Page =& $t_tinbai_mainsite_view;

// Page init
$t_tinbai_mainsite_view->Page_Init();

// Page main
$t_tinbai_mainsite_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_view = new ew_Page("t_tinbai_mainsite_view");

// page properties
t_tinbai_mainsite_view.PageID = "view"; // page ID
t_tinbai_mainsite_view.FormID = "ft_tinbai_mainsiteview"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_tinbai_mainsite_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $t_tinbai_mainsite->TableCaption() ?>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_tinbai_mainsite_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_tinbai_mainsite" id="emf_t_tinbai_mainsite" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_tinbai_mainsite',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_tinbai_mainsite_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<a href="<?php echo $t_tinbai_mainsite_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_tinbai_mainsite_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_tinbai_mainsite_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_tinbai_mainsite_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_view->ShowMessage();
?>
<p>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_mainsite_view->Pager)) $t_tinbai_mainsite_view->Pager = new cNumericPager($t_tinbai_mainsite_view->lStartRec, $t_tinbai_mainsite_view->lDisplayRecs, $t_tinbai_mainsite_view->lTotalRecs, $t_tinbai_mainsite_view->lRecRange) ?>
<?php if ($t_tinbai_mainsite_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_mainsite_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_mainsite_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_mainsite_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_tinbai_mainsite->PK_TINBAI_ID->Visible) { // PK_TINBAI_ID ?>
	<tr<?php echo $t_tinbai_mainsite->PK_TINBAI_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->PK_TINBAI_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->PK_TINBAI_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->PK_TINBAI_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->PK_TINBAI_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->Visible) { // FK_DMGIOITHIEU_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DMTUYENSINH_ID->Visible) { // FK_DMTUYENSINH_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->Visible) { // FK_DTSVTUONGLAI_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->Visible) { // FK_DTSVDANGHOC_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DTCUUSV_ID->Visible) { // FK_DTCUUSV_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->Visible) { // FK_DTDOANHNGHIEP_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_mainsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_TITLE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TITLE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_SUMARY->Visible) { // C_SUMARY ?>
	<tr<?php echo $t_tinbai_mainsite->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_SUMARY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_SUMARY->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_SUMARY->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_SUMARY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_CONTENTS->Visible) { // C_CONTENTS ?>
	<tr<?php echo $t_tinbai_mainsite->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_CONTENTS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_CONTENTS->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_CONTENTS->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_CONTENTS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->Visible) { // C_HIT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_HIT->Visible) { // C_PIC_HIT ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_HIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_HIT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_HIT->CellAttributes() ?>>
<?php if ($t_tinbai_mainsite->C_PIC_HIT->HrefValue <> "" || $t_tinbai_mainsite->C_PIC_HIT->TooltipValue <> "") { ?>
<?php if (!empty($t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue)) { ?>
<a href="<?php echo $t_tinbai_mainsite->C_PIC_HIT->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_HIT->UploadPath) . $t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue ?>" border=0<?php echo $t_tinbai_mainsite->C_PIC_HIT->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_tinbai_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_HIT->UploadPath) . $t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue ?>" border=0<?php echo $t_tinbai_mainsite->C_PIC_HIT->ViewAttributes() ?>>
<?php } elseif (!in_array($t_tinbai_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_NEW_MYSEFLT->Visible) { // C_NEW_MYSEFLT ?>
	<tr<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_MYSEFLT->Visible) { // C_PIC_MYSEFLT ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttributes() ?>>
<?php if ($t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue <> "" || $t_tinbai_mainsite->C_PIC_MYSEFLT->TooltipValue <> "") { ?>
<?php if (!empty($t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue)) { ?>
<a href="<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_MYSEFLT->UploadPath) . $t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue ?>" border=0<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_tinbai_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_MYSEFLT->UploadPath) . $t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue ?>" border=0<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewAttributes() ?>>
<?php } elseif (!in_array($t_tinbai_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_COMMENT_MAINSITE->Visible) { // C_COMMENT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_ORDER_MAINSITE->Visible) { // C_ORDER_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_STATUS_MAINSITE->Visible) { // C_STATUS_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_VISITOR_MAINSITE->Visible) { // C_VISITOR_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->Visible) { // C_TIME_ACTIVE_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->Visible) { // FK_NGUOIDUNGID_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_tinbai_mainsite->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_NOTE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_NOTE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NOTE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_tinbai_mainsite->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_USER_ADD->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_tinbai_mainsite->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_tinbai_mainsite->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_tinbai_mainsite->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_EDITOR_ID->Visible) { // FK_EDITOR_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_EDITOR_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_EDITOR_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_EDITOR_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_EDITOR_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_EDITOR_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_tinbai_mainsite_view->Pager)) $t_tinbai_mainsite_view->Pager = new cNumericPager($t_tinbai_mainsite_view->lStartRec, $t_tinbai_mainsite_view->lDisplayRecs, $t_tinbai_mainsite_view->lTotalRecs, $t_tinbai_mainsite_view->lRecRange) ?>
<?php if ($t_tinbai_mainsite_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_tinbai_mainsite_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_tinbai_mainsite_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_tinbai_mainsite_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_tinbai_mainsite_view->PageUrl() ?>start=<?php echo $t_tinbai_mainsite_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_tinbai_mainsite_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_tinbai_mainsite->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_tinbai_mainsite_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_tinbai_mainsite';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_mainsite_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite)
		$GLOBALS["t_tinbai_mainsite"] = new ct_tinbai_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_mainsite', TRUE);

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
		global $t_tinbai_mainsite;

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
			$this->Page_Terminate("t_tinbai_mainsitelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_tinbai_mainsite->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_tinbai_mainsite->Export = $_POST["exporttype"];
		} else {
			$t_tinbai_mainsite->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_tinbai_mainsite->Export; // Get export parameter, used in header
		$gsExportFile = $t_tinbai_mainsite->TableVar; // Get export file, used in header
		if (@$_GET["PK_TINBAI_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_TINBAI_ID"]);
		}
		if (in_array($t_tinbai_mainsite->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_tinbai_mainsite->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_tinbai_mainsite->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_tinbai_mainsite->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_tinbai_mainsite->Export == "csv") {
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
		global $Language, $t_tinbai_mainsite;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_TINBAI_ID"] <> "") {
				$t_tinbai_mainsite->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
				$this->arRecKey["PK_TINBAI_ID"] = $t_tinbai_mainsite->PK_TINBAI_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_tinbai_mainsite->CurrentAction = "I"; // Display form
			switch ($t_tinbai_mainsite->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_tinbai_mainsitelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue) == strval($rs->fields('PK_TINBAI_ID'))) {
								$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_tinbai_mainsitelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_tinbai_mainsite->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_tinbai_mainsite->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_tinbai_mainsitelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_tinbai_mainsite->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_tinbai_mainsite;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_tinbai_mainsite->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_tinbai_mainsite->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_tinbai_mainsite;

		// Call Recordset Selecting event
		$t_tinbai_mainsite->Recordset_Selecting($t_tinbai_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_tinbai_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_tinbai_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_mainsite;
		$sFilter = $t_tinbai_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
		$t_tinbai_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_mainsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_mainsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_mainsite->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
		$t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue = $rs->fields('C_PIC_HIT');
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
		$t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue = $rs->fields('C_PIC_MYSEFLT');
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
		$t_tinbai_mainsite->C_STATUS_MAINSITE->setDbValue($rs->fields('C_STATUS_MAINSITE'));
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->setDbValue($rs->fields('C_VISITOR_MAINSITE'));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
		$t_tinbai_mainsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_tinbai_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_mainsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_TINBAI_ID=" . urlencode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue);
		$this->AddUrl = $t_tinbai_mainsite->AddUrl();
		$this->EditUrl = $t_tinbai_mainsite->EditUrl();
		$this->CopyUrl = $t_tinbai_mainsite->CopyUrl();
		$this->DeleteUrl = $t_tinbai_mainsite->DeleteUrl();
		$this->ListUrl = $t_tinbai_mainsite->ListUrl();

		// Call Row_Rendering event
		$t_tinbai_mainsite->Row_Rendering();

		// Common render codes for all row types
		// PK_TINBAI_ID

		$t_tinbai_mainsite->PK_TINBAI_ID->CellCssStyle = ""; $t_tinbai_mainsite->PK_TINBAI_ID->CellCssClass = "";
		$t_tinbai_mainsite->PK_TINBAI_ID->CellAttrs = array(); $t_tinbai_mainsite->PK_TINBAI_ID->ViewAttrs = array(); $t_tinbai_mainsite->PK_TINBAI_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$t_tinbai_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->EditAttrs = array();

		// FK_DMGIOITHIEU_ID
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttrs = array();

		// FK_DMTUYENSINH_ID
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttrs = array();

		// FK_DTSVTUONGLAI_ID
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditAttrs = array();

		// FK_DTSVDANGHOC_ID
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditAttrs = array();

		// FK_DTCUUSV_ID
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->EditAttrs = array();

		// FK_DTDOANHNGHIEP_ID
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_mainsite->C_TITLE->CellCssStyle = ""; $t_tinbai_mainsite->C_TITLE->CellCssClass = "";
		$t_tinbai_mainsite->C_TITLE->CellAttrs = array(); $t_tinbai_mainsite->C_TITLE->ViewAttrs = array(); $t_tinbai_mainsite->C_TITLE->EditAttrs = array();

		// C_SUMARY
		$t_tinbai_mainsite->C_SUMARY->CellCssStyle = ""; $t_tinbai_mainsite->C_SUMARY->CellCssClass = "";
		$t_tinbai_mainsite->C_SUMARY->CellAttrs = array(); $t_tinbai_mainsite->C_SUMARY->ViewAttrs = array(); $t_tinbai_mainsite->C_SUMARY->EditAttrs = array();

		// C_CONTENTS
		$t_tinbai_mainsite->C_CONTENTS->CellCssStyle = ""; $t_tinbai_mainsite->C_CONTENTS->CellCssClass = "";
		$t_tinbai_mainsite->C_CONTENTS->CellAttrs = array(); $t_tinbai_mainsite->C_CONTENTS->ViewAttrs = array(); $t_tinbai_mainsite->C_CONTENTS->EditAttrs = array();

		// C_HIT_MAINSITE
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_HIT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttrs = array();

		// C_PIC_HIT
		$t_tinbai_mainsite->C_PIC_HIT->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_HIT->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_HIT->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_HIT->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_HIT->EditAttrs = array();

		// C_NEW_MYSEFLT
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttrs = array();

		// C_PIC_MYSEFLT
		$t_tinbai_mainsite->C_PIC_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_MYSEFLT->EditAttrs = array();

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttrs = array();

		// C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttrs = array();

		// C_STATUS_MAINSITE
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttrs = array();

		// C_VISITOR_MAINSITE
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditAttrs = array();

		// FK_NGUOIDUNGID_MAINSITE
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditAttrs = array();

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->CellCssStyle = ""; $t_tinbai_mainsite->C_NOTE->CellCssClass = "";
		$t_tinbai_mainsite->C_NOTE->CellAttrs = array(); $t_tinbai_mainsite->C_NOTE->ViewAttrs = array(); $t_tinbai_mainsite->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_mainsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_mainsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_mainsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->EditAttrs = array();
		if ($t_tinbai_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_ID
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewValue = $t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_mainsite->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_CONGTY_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->CssClass = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_DMGIOITHIEU_ID
			if (strval($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCGIOITHIEU` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmucgioithieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewCustomAttributes = "";

			// FK_DMTUYENSINH_ID
			if (strval($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCTUYENSINH` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuctuyensinh`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewCustomAttributes = "";

			// FK_DTSVTUONGLAI_ID
			if (strval($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVTUONGLAI_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svtuonglai`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewCustomAttributes = "";

			// FK_DTSVDANGHOC_ID
			if (strval($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVDANGHOC_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svdanghoc`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewCustomAttributes = "";

			// FK_DTCUUSV_ID
			if (strval($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTCUUSV_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_cuusv`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewCustomAttributes = "";

			// FK_DTDOANHNGHIEP_ID
			if (strval($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->ViewValue = $t_tinbai_mainsite->C_TITLE->CurrentValue;
			$t_tinbai_mainsite->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite->C_TITLE->CssClass = "";
			$t_tinbai_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->ViewValue = $t_tinbai_mainsite->C_SUMARY->CurrentValue;
			$t_tinbai_mainsite->C_SUMARY->CssStyle = "";
			$t_tinbai_mainsite->C_SUMARY->CssClass = "";
			$t_tinbai_mainsite->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->ViewValue = $t_tinbai_mainsite->C_CONTENTS->CurrentValue;
			$t_tinbai_mainsite->C_CONTENTS->CssStyle = "";
			$t_tinbai_mainsite->C_CONTENTS->CssClass = "";
			$t_tinbai_mainsite->C_CONTENTS->ViewCustomAttributes = "";

			// C_HIT_MAINSITE
			if (strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "La tin noi bat";
						break;
					default:
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = $t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->ViewCustomAttributes = "";

			// C_PIC_HIT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue)) {
				$t_tinbai_mainsite->C_PIC_HIT->ViewValue = $t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue;
				$t_tinbai_mainsite->C_PIC_HIT->ImageAlt = $t_tinbai_mainsite->C_PIC_HIT->FldAlt();
			} else {
				$t_tinbai_mainsite->C_PIC_HIT->ViewValue = "";
			}
			$t_tinbai_mainsite->C_PIC_HIT->CssStyle = "";
			$t_tinbai_mainsite->C_PIC_HIT->CssClass = "";
			$t_tinbai_mainsite->C_PIC_HIT->ViewCustomAttributes = "";

			// C_NEW_MYSEFLT
			if (strval($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "Khong la tin ";
						break;
					case "1":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "Tin ";
						break;
					default:
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = $t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssStyle = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssClass = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewCustomAttributes = "";

			// C_PIC_MYSEFLT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue)) {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue = $t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue;
				$t_tinbai_mainsite->C_PIC_MYSEFLT->ImageAlt = $t_tinbai_mainsite->C_PIC_MYSEFLT->FldAlt();
			} else {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue = "";
			}
			$t_tinbai_mainsite->C_PIC_MYSEFLT->CssStyle = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->CssClass = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->ViewCustomAttributes = "";

			// C_COMMENT_MAINSITE
			if (strval($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Khong cho phep comment";
						break;
					case "1":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Cho phep coment";
						break;
					default:
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewCustomAttributes = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue, 7);
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewCustomAttributes = "";

			// C_STATUS_MAINSITE
			if (strval($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "KHONG DUYET";
						break;
					case "1":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "DA DUYET";
						break;
					case "":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "";
						break;
					default:
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = $t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewCustomAttributes = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewValue = $t_tinbai_mainsite->C_VISITOR_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "khong active len mainsite";
						break;
					case "1":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "Active lenmainsite";
						break;
					default:
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue, 7);
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
			if (strval($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewCustomAttributes = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->ViewValue = $t_tinbai_mainsite->C_NOTE->CurrentValue;
			$t_tinbai_mainsite->C_NOTE->CssStyle = "";
			$t_tinbai_mainsite->C_NOTE->CssClass = "";
			$t_tinbai_mainsite->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->ViewValue = $t_tinbai_mainsite->C_USER_ADD->CurrentValue;
			$t_tinbai_mainsite->C_USER_ADD->CssStyle = "";
			$t_tinbai_mainsite->C_USER_ADD->CssClass = "";
			$t_tinbai_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = $t_tinbai_mainsite->C_ADD_TIME->CurrentValue;
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_tinbai_mainsite->C_ADD_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_ADD_TIME->CssClass = "";
			$t_tinbai_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->ViewValue = $t_tinbai_mainsite->C_USER_EDIT->CurrentValue;
			$t_tinbai_mainsite->C_USER_EDIT->CssStyle = "";
			$t_tinbai_mainsite->C_USER_EDIT->CssClass = "";
			$t_tinbai_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = $t_tinbai_mainsite->C_EDIT_TIME->CurrentValue;
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_tinbai_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_EDIT_TIME->CssClass = "";
			$t_tinbai_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = $t_tinbai_mainsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = ew_FormatNumber($t_tinbai_mainsite->FK_EDITOR_ID->ViewValue, 0, -2, -2, -2);
			$t_tinbai_mainsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// PK_TINBAI_ID
			$t_tinbai_mainsite->PK_TINBAI_ID->HrefValue = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->TooltipValue = "";

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->TooltipValue = "";

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->TooltipValue = "";

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->TooltipValue = "";

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->TooltipValue = "";

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->TooltipValue = "";

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->TooltipValue = "";

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->HrefValue = "";
			$t_tinbai_mainsite->C_TITLE->TooltipValue = "";

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->HrefValue = "";
			$t_tinbai_mainsite->C_SUMARY->TooltipValue = "";

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->HrefValue = "";
			$t_tinbai_mainsite->C_CONTENTS->TooltipValue = "";

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->TooltipValue = "";

			// C_PIC_HIT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue)) {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_HIT->UploadPath) . ((!empty($t_tinbai_mainsite->C_PIC_HIT->ViewValue)) ? $t_tinbai_mainsite->C_PIC_HIT->ViewValue : $t_tinbai_mainsite->C_PIC_HIT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_HIT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_HIT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = "";
			}
			$t_tinbai_mainsite->C_PIC_HIT->TooltipValue = "";

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->HrefValue = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->TooltipValue = "";

			// C_PIC_MYSEFLT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue)) {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ew_UploadPathEx(FALSE, $t_tinbai_mainsite->C_PIC_MYSEFLT->UploadPath) . ((!empty($t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue)) ? $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue : $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = "";
			}
			$t_tinbai_mainsite->C_PIC_MYSEFLT->TooltipValue = "";

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->TooltipValue = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->TooltipValue = "";

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->TooltipValue = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->TooltipValue = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->TooltipValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";
			$t_tinbai_mainsite->C_NOTE->TooltipValue = "";

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_mainsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_EDIT_TIME->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_tinbai_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_mainsite->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_tinbai_mainsite;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_tinbai_mainsite->SelectRecordCount();
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
		if ($t_tinbai_mainsite->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_tinbai_mainsite, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_tinbai_mainsite->PK_TINBAI_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DMGIOITHIEU_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DMTUYENSINH_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTSVDANGHOC_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTCUUSV_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_TITLE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_HIT_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_NEW_MYSEFLT);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_COMMENT_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ORDER_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_STATUS_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_VISITOR_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_NOTE);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_USER_ADD);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_tinbai_mainsite->FK_EDITOR_ID);
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
				$t_tinbai_mainsite->CssClass = "";
				$t_tinbai_mainsite->CssStyle = "";
				$t_tinbai_mainsite->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_tinbai_mainsite->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_TINBAI_ID', $t_tinbai_mainsite->PK_TINBAI_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_tinbai_mainsite->FK_CONGTY_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DMGIOITHIEU_ID', $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DMTUYENSINH_ID', $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTSVTUONGLAI_ID', $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTSVDANGHOC_ID', $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTCUUSV_ID', $t_tinbai_mainsite->FK_DTCUUSV_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_DTDOANHNGHIEP_ID', $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_tinbai_mainsite->C_TITLE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_HIT_MAINSITE', $t_tinbai_mainsite->C_HIT_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_NEW_MYSEFLT', $t_tinbai_mainsite->C_NEW_MYSEFLT->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_COMMENT_MAINSITE', $t_tinbai_mainsite->C_COMMENT_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER_MAINSITE', $t_tinbai_mainsite->C_ORDER_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_MAINSITE', $t_tinbai_mainsite->C_STATUS_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_VISITOR_MAINSITE', $t_tinbai_mainsite->C_VISITOR_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_MAINSITE', $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE_MAINSITE', $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_NGUOIDUNGID_MAINSITE', $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_NOTE', $t_tinbai_mainsite->C_NOTE->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_tinbai_mainsite->C_USER_ADD->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_tinbai_mainsite->C_ADD_TIME->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_tinbai_mainsite->C_USER_EDIT->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_tinbai_mainsite->C_EDIT_TIME->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
					$XmlDoc->AddField('FK_EDITOR_ID', $t_tinbai_mainsite->FK_EDITOR_ID->ExportValue($t_tinbai_mainsite->Export, $t_tinbai_mainsite->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_tinbai_mainsite->PK_TINBAI_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DMGIOITHIEU_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DMTUYENSINH_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTSVDANGHOC_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTCUUSV_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_TITLE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_HIT_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_NEW_MYSEFLT);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_COMMENT_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ORDER_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_STATUS_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_VISITOR_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_NOTE);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_USER_ADD);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_ADD_TIME);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_USER_EDIT);
					$ExportDoc->ExportField($t_tinbai_mainsite->C_EDIT_TIME);
					$ExportDoc->ExportField($t_tinbai_mainsite->FK_EDITOR_ID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_tinbai_mainsite->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_tinbai_mainsite->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_tinbai_mainsite->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_tinbai_mainsite->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_tinbai_mainsite->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_tinbai_mainsite;
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
		if ($t_tinbai_mainsite->Email_Sending($Email, $EventArgs))
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
		global $t_tinbai_mainsite;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_tinbai_mainsite->KeyUrl("", ""), 1);
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
