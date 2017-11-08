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
$t_congty_view = new ct_congty_view();
$Page =& $t_congty_view;

// Page init
$t_congty_view->Page_Init();

// Page main
$t_congty_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_congty->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_congty_view = new ew_Page("t_congty_view");

// page properties
t_congty_view.PageID = "view"; // page ID
t_congty_view.FormID = "ft_congtyview"; // form ID
var EW_PAGE_ID = t_congty_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_congty_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_congty_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_congty_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_congty_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_congty->TableCaption() ?>
<?php if ($t_congty->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_congty_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_congty" id="emf_t_congty" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_congty',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_congty_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_congty->Export == "") { ?>
<a href="<?php echo $t_congty_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_congty_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_congty_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_congty_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_congty_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_congty_view->ShowMessage();
?>
<p>
<?php if ($t_congty->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_congty_view->Pager)) $t_congty_view->Pager = new cNumericPager($t_congty_view->lStartRec, $t_congty_view->lDisplayRecs, $t_congty_view->lTotalRecs, $t_congty_view->lRecRange) ?>
<?php if ($t_congty_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_congty_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_congty_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_congty_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_congty->FK_NGANH_ID->Visible) { // FK_NGANH_ID ?>
	<tr<?php echo $t_congty->FK_NGANH_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?></td>
		<td<?php echo $t_congty->FK_NGANH_ID->CellAttributes() ?>>
<div<?php echo $t_congty->FK_NGANH_ID->ViewAttributes() ?>><?php echo $t_congty->FK_NGANH_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_TENCONGTY->Visible) { // C_TENCONGTY ?>
	<tr<?php echo $t_congty->C_TENCONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TENCONGTY->FldCaption() ?></td>
		<td<?php echo $t_congty->C_TENCONGTY->CellAttributes() ?>>
<div<?php echo $t_congty->C_TENCONGTY->ViewAttributes() ?>><?php echo $t_congty->C_TENCONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_TENVIETTAT->Visible) { // C_TENVIETTAT ?>
	<tr<?php echo $t_congty->C_TENVIETTAT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TENVIETTAT->FldCaption() ?></td>
		<td<?php echo $t_congty->C_TENVIETTAT->CellAttributes() ?>>
<div<?php echo $t_congty->C_TENVIETTAT->ViewAttributes() ?>><?php echo $t_congty->C_TENVIETTAT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_LOGO->Visible) { // C_LOGO ?>
	<tr<?php echo $t_congty->C_LOGO->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_LOGO->FldCaption() ?></td>
		<td<?php echo $t_congty->C_LOGO->CellAttributes() ?>>
<?php if ($t_congty->C_LOGO->HrefValue <> "" || $t_congty->C_LOGO->TooltipValue <> "") { ?>
<?php if (!empty($t_congty->C_LOGO->Upload->DbValue)) { ?>
<a href="<?php echo $t_congty->C_LOGO->HrefValue ?>" target="_blank"><img src="t_congty_C_LOGO_bv.php?PK_MACONGTY=<?php echo $t_congty->PK_MACONGTY->CurrentValue ?>" border=0<?php echo $t_congty->C_LOGO->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_congty->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_congty->C_LOGO->Upload->DbValue)) { ?>
<img src="t_congty_C_LOGO_bv.php?PK_MACONGTY=<?php echo $t_congty->PK_MACONGTY->CurrentValue ?>" border=0<?php echo $t_congty->C_LOGO->ViewAttributes() ?>>
<?php } elseif (!in_array($t_congty->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_WEBSITE->Visible) { // C_WEBSITE ?>
	<tr<?php echo $t_congty->C_WEBSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_WEBSITE->FldCaption() ?></td>
		<td<?php echo $t_congty->C_WEBSITE->CellAttributes() ?>>
<div<?php echo $t_congty->C_WEBSITE->ViewAttributes() ?>><?php echo $t_congty->C_WEBSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $t_congty->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $t_congty->C_DIACHI->CellAttributes() ?>>
<div<?php echo $t_congty->C_DIACHI->ViewAttributes() ?>><?php echo $t_congty->C_DIACHI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_DIENTHOAI->Visible) { // C_DIENTHOAI ?>
	<tr<?php echo $t_congty->C_DIENTHOAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_DIENTHOAI->FldCaption() ?></td>
		<td<?php echo $t_congty->C_DIENTHOAI->CellAttributes() ?>>
<div<?php echo $t_congty->C_DIENTHOAI->ViewAttributes() ?>><?php echo $t_congty->C_DIENTHOAI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $t_congty->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_FAX->FldCaption() ?></td>
		<td<?php echo $t_congty->C_FAX->CellAttributes() ?>>
<div<?php echo $t_congty->C_FAX->ViewAttributes() ?>><?php echo $t_congty->C_FAX->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $t_congty->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $t_congty->C_EMAIL->CellAttributes() ?>>
<div<?php echo $t_congty->C_EMAIL->ViewAttributes() ?>><?php echo $t_congty->C_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_MOTA->Visible) { // C_MOTA ?>
	<tr<?php echo $t_congty->C_MOTA->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_MOTA->FldCaption() ?></td>
		<td<?php echo $t_congty->C_MOTA->CellAttributes() ?>>
<div<?php echo $t_congty->C_MOTA->ViewAttributes() ?>><?php echo $t_congty->C_MOTA->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_congty->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_congty->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_congty->C_USER_ADD->ViewAttributes() ?>><?php echo $t_congty->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_congty->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_congty->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_congty->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_congty->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_congty->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_congty->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_congty->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_congty->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_congty->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_congty->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_congty->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_congty->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_REPORT_STATUS->Visible) { // C_REPORT_STATUS ?>
	<tr<?php echo $t_congty->C_REPORT_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_REPORT_STATUS->FldCaption() ?></td>
		<td<?php echo $t_congty->C_REPORT_STATUS->CellAttributes() ?>>
<div<?php echo $t_congty->C_REPORT_STATUS->ViewAttributes() ?>><?php echo $t_congty->C_REPORT_STATUS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_TYPE_TEMPLATE->Visible) { // C_TYPE_TEMPLATE ?>
	<tr<?php echo $t_congty->C_TYPE_TEMPLATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TYPE_TEMPLATE->FldCaption() ?></td>
		<td<?php echo $t_congty->C_TYPE_TEMPLATE->CellAttributes() ?>>
<div<?php echo $t_congty->C_TYPE_TEMPLATE->ViewAttributes() ?>><?php echo $t_congty->C_TYPE_TEMPLATE->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_congty->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_congty_view->Pager)) $t_congty_view->Pager = new cNumericPager($t_congty_view->lStartRec, $t_congty_view->lDisplayRecs, $t_congty_view->lTotalRecs, $t_congty_view->lRecRange) ?>
<?php if ($t_congty_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_congty_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_congty_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_congty_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_congty_view->PageUrl() ?>start=<?php echo $t_congty_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_congty_view->sSrchWhere == "0=101") { ?>
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
$t_congty_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_congty_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_congty';

	// Page object name
	var $PageObjName = 't_congty_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_congty;
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
	function ct_congty_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_congty)
		$GLOBALS["t_congty"] = new ct_congty();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_congty', TRUE);

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_congtylist.php");
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
		if (@$_GET["PK_MACONGTY"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_MACONGTY"]);
		}
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
		global $Language, $t_congty;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_MACONGTY"] <> "") {
				$t_congty->PK_MACONGTY->setQueryStringValue($_GET["PK_MACONGTY"]);
				$this->arRecKey["PK_MACONGTY"] = $t_congty->PK_MACONGTY->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_congty->CurrentAction = "I"; // Display form
			switch ($t_congty->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_congtylist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_congty->PK_MACONGTY->CurrentValue) == strval($rs->fields('PK_MACONGTY'))) {
								$t_congty->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_congtylist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_congty->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_congty->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_congtylist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_congty->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
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
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_MACONGTY=" . urlencode($t_congty->PK_MACONGTY->CurrentValue);
		$this->AddUrl = $t_congty->AddUrl();
		$this->EditUrl = $t_congty->EditUrl();
		$this->CopyUrl = $t_congty->CopyUrl();
		$this->DeleteUrl = $t_congty->DeleteUrl();
		$this->ListUrl = $t_congty->ListUrl();

		// Call Row_Rendering event
		$t_congty->Row_Rendering();

		// Common render codes for all row types
		// FK_NGANH_ID

		$t_congty->FK_NGANH_ID->CellCssStyle = ""; $t_congty->FK_NGANH_ID->CellCssClass = "";
		$t_congty->FK_NGANH_ID->CellAttrs = array(); $t_congty->FK_NGANH_ID->ViewAttrs = array(); $t_congty->FK_NGANH_ID->EditAttrs = array();

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->CellCssStyle = ""; $t_congty->C_TENCONGTY->CellCssClass = "";
		$t_congty->C_TENCONGTY->CellAttrs = array(); $t_congty->C_TENCONGTY->ViewAttrs = array(); $t_congty->C_TENCONGTY->EditAttrs = array();

		// C_TENVIETTAT
		$t_congty->C_TENVIETTAT->CellCssStyle = ""; $t_congty->C_TENVIETTAT->CellCssClass = "";
		$t_congty->C_TENVIETTAT->CellAttrs = array(); $t_congty->C_TENVIETTAT->ViewAttrs = array(); $t_congty->C_TENVIETTAT->EditAttrs = array();

		// C_LOGO
		$t_congty->C_LOGO->CellCssStyle = ""; $t_congty->C_LOGO->CellCssClass = "";
		$t_congty->C_LOGO->CellAttrs = array(); $t_congty->C_LOGO->ViewAttrs = array(); $t_congty->C_LOGO->EditAttrs = array();

		// C_WEBSITE
		$t_congty->C_WEBSITE->CellCssStyle = ""; $t_congty->C_WEBSITE->CellCssClass = "";
		$t_congty->C_WEBSITE->CellAttrs = array(); $t_congty->C_WEBSITE->ViewAttrs = array(); $t_congty->C_WEBSITE->EditAttrs = array();

		// C_DIACHI
		$t_congty->C_DIACHI->CellCssStyle = ""; $t_congty->C_DIACHI->CellCssClass = "";
		$t_congty->C_DIACHI->CellAttrs = array(); $t_congty->C_DIACHI->ViewAttrs = array(); $t_congty->C_DIACHI->EditAttrs = array();

		// C_DIENTHOAI
		$t_congty->C_DIENTHOAI->CellCssStyle = ""; $t_congty->C_DIENTHOAI->CellCssClass = "";
		$t_congty->C_DIENTHOAI->CellAttrs = array(); $t_congty->C_DIENTHOAI->ViewAttrs = array(); $t_congty->C_DIENTHOAI->EditAttrs = array();

		// C_FAX
		$t_congty->C_FAX->CellCssStyle = ""; $t_congty->C_FAX->CellCssClass = "";
		$t_congty->C_FAX->CellAttrs = array(); $t_congty->C_FAX->ViewAttrs = array(); $t_congty->C_FAX->EditAttrs = array();

		// C_EMAIL
		$t_congty->C_EMAIL->CellCssStyle = ""; $t_congty->C_EMAIL->CellCssClass = "";
		$t_congty->C_EMAIL->CellAttrs = array(); $t_congty->C_EMAIL->ViewAttrs = array(); $t_congty->C_EMAIL->EditAttrs = array();

		// C_MOTA
		$t_congty->C_MOTA->CellCssStyle = ""; $t_congty->C_MOTA->CellCssClass = "";
		$t_congty->C_MOTA->CellAttrs = array(); $t_congty->C_MOTA->ViewAttrs = array(); $t_congty->C_MOTA->EditAttrs = array();

		// C_USER_ADD
		$t_congty->C_USER_ADD->CellCssStyle = ""; $t_congty->C_USER_ADD->CellCssClass = "";
		$t_congty->C_USER_ADD->CellAttrs = array(); $t_congty->C_USER_ADD->ViewAttrs = array(); $t_congty->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_congty->C_ADD_TIME->CellCssStyle = ""; $t_congty->C_ADD_TIME->CellCssClass = "";
		$t_congty->C_ADD_TIME->CellAttrs = array(); $t_congty->C_ADD_TIME->ViewAttrs = array(); $t_congty->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_congty->C_USER_EDIT->CellCssStyle = ""; $t_congty->C_USER_EDIT->CellCssClass = "";
		$t_congty->C_USER_EDIT->CellAttrs = array(); $t_congty->C_USER_EDIT->ViewAttrs = array(); $t_congty->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_congty->C_EDIT_TIME->CellCssStyle = ""; $t_congty->C_EDIT_TIME->CellCssClass = "";
		$t_congty->C_EDIT_TIME->CellAttrs = array(); $t_congty->C_EDIT_TIME->ViewAttrs = array(); $t_congty->C_EDIT_TIME->EditAttrs = array();

		// C_REPORT_STATUS
		$t_congty->C_REPORT_STATUS->CellCssStyle = ""; $t_congty->C_REPORT_STATUS->CellCssClass = "";
		$t_congty->C_REPORT_STATUS->CellAttrs = array(); $t_congty->C_REPORT_STATUS->ViewAttrs = array(); $t_congty->C_REPORT_STATUS->EditAttrs = array();

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

			// C_TENVIETTAT
			$t_congty->C_TENVIETTAT->ViewValue = $t_congty->C_TENVIETTAT->CurrentValue;
			$t_congty->C_TENVIETTAT->CssStyle = "";
			$t_congty->C_TENVIETTAT->CssClass = "";
			$t_congty->C_TENVIETTAT->ViewCustomAttributes = "";

			// C_LOGO
			if (!ew_Empty($t_congty->C_LOGO->Upload->DbValue)) {
				$t_congty->C_LOGO->ViewValue = $t_congty->C_LOGO->FldCaption();
				$t_congty->C_LOGO->ImageAlt = $t_congty->C_LOGO->FldAlt();
			} else {
				$t_congty->C_LOGO->ViewValue = "";
			}
			$t_congty->C_LOGO->CssStyle = "";
			$t_congty->C_LOGO->CssClass = "";
			$t_congty->C_LOGO->ViewCustomAttributes = "";

			// C_WEBSITE
			$t_congty->C_WEBSITE->ViewValue = $t_congty->C_WEBSITE->CurrentValue;
			$t_congty->C_WEBSITE->CssStyle = "";
			$t_congty->C_WEBSITE->CssClass = "";
			$t_congty->C_WEBSITE->ViewCustomAttributes = "";

			// C_DIACHI
			$t_congty->C_DIACHI->ViewValue = $t_congty->C_DIACHI->CurrentValue;
			$t_congty->C_DIACHI->CssStyle = "";
			$t_congty->C_DIACHI->CssClass = "";
			$t_congty->C_DIACHI->ViewCustomAttributes = "";

			// C_DIENTHOAI
			$t_congty->C_DIENTHOAI->ViewValue = $t_congty->C_DIENTHOAI->CurrentValue;
			$t_congty->C_DIENTHOAI->CssStyle = "";
			$t_congty->C_DIENTHOAI->CssClass = "";
			$t_congty->C_DIENTHOAI->ViewCustomAttributes = "";

			// C_FAX
			$t_congty->C_FAX->ViewValue = $t_congty->C_FAX->CurrentValue;
			$t_congty->C_FAX->CssStyle = "";
			$t_congty->C_FAX->CssClass = "";
			$t_congty->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$t_congty->C_EMAIL->ViewValue = $t_congty->C_EMAIL->CurrentValue;
			$t_congty->C_EMAIL->CssStyle = "";
			$t_congty->C_EMAIL->CssClass = "";
			$t_congty->C_EMAIL->ViewCustomAttributes = "";

			// C_MOTA
			$t_congty->C_MOTA->ViewValue = $t_congty->C_MOTA->CurrentValue;
			$t_congty->C_MOTA->CssStyle = "";
			$t_congty->C_MOTA->CssClass = "";
			$t_congty->C_MOTA->ViewCustomAttributes = "";

			// C_USER_ADD
			if (strval($t_congty->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_congty->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_congty->C_USER_ADD->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_congty->C_USER_ADD->ViewValue = $t_congty->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_congty->C_USER_ADD->ViewValue = NULL;
			}
			$t_congty->C_USER_ADD->CssStyle = "";
			$t_congty->C_USER_ADD->CssClass = "";
			$t_congty->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_congty->C_ADD_TIME->ViewValue = $t_congty->C_ADD_TIME->CurrentValue;
			$t_congty->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_congty->C_ADD_TIME->ViewValue, 7);
			$t_congty->C_ADD_TIME->CssStyle = "";
			$t_congty->C_ADD_TIME->CssClass = "";
			$t_congty->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			if (strval($t_congty->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_congty->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_congty->C_USER_EDIT->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_congty->C_USER_EDIT->ViewValue = $t_congty->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_congty->C_USER_EDIT->ViewValue = NULL;
			}
			$t_congty->C_USER_EDIT->CssStyle = "";
			$t_congty->C_USER_EDIT->CssClass = "";
			$t_congty->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_congty->C_EDIT_TIME->ViewValue = $t_congty->C_EDIT_TIME->CurrentValue;
			$t_congty->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_congty->C_EDIT_TIME->ViewValue, 7);
			$t_congty->C_EDIT_TIME->CssStyle = "";
			$t_congty->C_EDIT_TIME->CssClass = "";
			$t_congty->C_EDIT_TIME->ViewCustomAttributes = "";

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

			// C_TENVIETTAT
			$t_congty->C_TENVIETTAT->HrefValue = "";
			$t_congty->C_TENVIETTAT->TooltipValue = "";

			// C_LOGO
			if (!empty($t_congty->C_LOGO->Upload->DbValue)) {
				$t_congty->C_LOGO->HrefValue = "t_congty_C_LOGO_bv.php?PK_MACONGTY=" . $t_congty->PK_MACONGTY->CurrentValue;
				if ($t_congty->Export <> "") $t_congty->C_LOGO->HrefValue = ew_ConvertFullUrl($t_congty->C_LOGO->HrefValue);
			} else {
				$t_congty->C_LOGO->HrefValue = "";
			}
			$t_congty->C_LOGO->TooltipValue = "";

			// C_WEBSITE
			$t_congty->C_WEBSITE->HrefValue = "";
			$t_congty->C_WEBSITE->TooltipValue = "";

			// C_DIACHI
			$t_congty->C_DIACHI->HrefValue = "";
			$t_congty->C_DIACHI->TooltipValue = "";

			// C_DIENTHOAI
			$t_congty->C_DIENTHOAI->HrefValue = "";
			$t_congty->C_DIENTHOAI->TooltipValue = "";

			// C_FAX
			$t_congty->C_FAX->HrefValue = "";
			$t_congty->C_FAX->TooltipValue = "";

			// C_EMAIL
			$t_congty->C_EMAIL->HrefValue = "";
			$t_congty->C_EMAIL->TooltipValue = "";

			// C_MOTA
			$t_congty->C_MOTA->HrefValue = "";
			$t_congty->C_MOTA->TooltipValue = "";

			// C_USER_ADD
			$t_congty->C_USER_ADD->HrefValue = "";
			$t_congty->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_congty->C_ADD_TIME->HrefValue = "";
			$t_congty->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_congty->C_USER_EDIT->HrefValue = "";
			$t_congty->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_congty->C_EDIT_TIME->HrefValue = "";
			$t_congty->C_EDIT_TIME->TooltipValue = "";

			// C_REPORT_STATUS
			$t_congty->C_REPORT_STATUS->HrefValue = "";
			$t_congty->C_REPORT_STATUS->TooltipValue = "";

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->HrefValue = "";
			$t_congty->C_TYPE_TEMPLATE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_congty->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_congty->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_congty;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_congty->SelectRecordCount();
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
		if ($t_congty->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_congty, "v");
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

		// Add record key QueryString
		$sQry .= "&" . substr($t_congty->KeyUrl("", ""), 1);
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
