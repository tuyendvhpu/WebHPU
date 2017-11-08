<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmucgioithieuinfo.php" ?>
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
$t_danhmucgioithieu_view = new ct_danhmucgioithieu_view();
$Page =& $t_danhmucgioithieu_view;

// Page init
$t_danhmucgioithieu_view->Page_Init();

// Page main
$t_danhmucgioithieu_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmucgioithieu_view = new ew_Page("t_danhmucgioithieu_view");

// page properties
t_danhmucgioithieu_view.PageID = "view"; // page ID
t_danhmucgioithieu_view.FormID = "ft_danhmucgioithieuview"; // form ID
var EW_PAGE_ID = t_danhmucgioithieu_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_danhmucgioithieu_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmucgioithieu_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmucgioithieu_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmucgioithieu_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_danhmucgioithieu->TableCaption() ?>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_danhmucgioithieu_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_danhmucgioithieu" id="emf_t_danhmucgioithieu" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_danhmucgioithieu',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_danhmucgioithieu_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<a href="<?php echo $t_danhmucgioithieu_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_danhmucgioithieu_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_danhmucgioithieu_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_danhmucgioithieu_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_danhmucgioithieu_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmucgioithieu_view->ShowMessage();
?>
<p>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmucgioithieu_view->Pager)) $t_danhmucgioithieu_view->Pager = new cNumericPager($t_danhmucgioithieu_view->lStartRec, $t_danhmucgioithieu_view->lDisplayRecs, $t_danhmucgioithieu_view->lTotalRecs, $t_danhmucgioithieu_view->lRecRange) ?>
<?php if ($t_danhmucgioithieu_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmucgioithieu_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmucgioithieu_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmucgioithieu_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->Visible) { // PK_DANHMUCGIOITHIEU ?>
	<tr<?php echo $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_danhmucgioithieu->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_TYPE->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_TYPE->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_TYPE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_danhmucgioithieu->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_NAME->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_NAME->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_NAME->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_NAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_danhmucgioithieu->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_URL->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_URL->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_URL->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_URL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_DESCRIPTION->Visible) { // C_DESCRIPTION ?>
	<tr<?php echo $t_danhmucgioithieu->C_DESCRIPTION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_DESCRIPTION->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_DESCRIPTION->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_DESCRIPTION->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_DESCRIPTION->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_danhmucgioithieu->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_ORDER->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_ORDER->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_danhmucgioithieu->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_ACTIVE->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_danhmucgioithieu->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_USER_ADD->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_danhmucgioithieu->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_danhmucgioithieu->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_danhmucgioithieu->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_danhmucgioithieu->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_danhmucgioithieu->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_danhmucgioithieu_view->Pager)) $t_danhmucgioithieu_view->Pager = new cNumericPager($t_danhmucgioithieu_view->lStartRec, $t_danhmucgioithieu_view->lDisplayRecs, $t_danhmucgioithieu_view->lTotalRecs, $t_danhmucgioithieu_view->lRecRange) ?>
<?php if ($t_danhmucgioithieu_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_danhmucgioithieu_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_danhmucgioithieu_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_danhmucgioithieu_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_danhmucgioithieu_view->PageUrl() ?>start=<?php echo $t_danhmucgioithieu_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_danhmucgioithieu_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_danhmucgioithieu->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_danhmucgioithieu_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmucgioithieu_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_danhmucgioithieu';

	// Page object name
	var $PageObjName = 't_danhmucgioithieu_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmucgioithieu->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmucgioithieu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmucgioithieu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmucgioithieu_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmucgioithieu)
		$GLOBALS["t_danhmucgioithieu"] = new ct_danhmucgioithieu();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmucgioithieu', TRUE);

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
		global $t_danhmucgioithieu;

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
			$this->Page_Terminate("t_danhmucgioithieulist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_danhmucgioithieu->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_danhmucgioithieu->Export = $_POST["exporttype"];
		} else {
			$t_danhmucgioithieu->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_danhmucgioithieu->Export; // Get export parameter, used in header
		$gsExportFile = $t_danhmucgioithieu->TableVar; // Get export file, used in header
		if (@$_GET["PK_DANHMUCGIOITHIEU"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_DANHMUCGIOITHIEU"]);
		}
		if (in_array($t_danhmucgioithieu->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_danhmucgioithieu->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_danhmucgioithieu->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_danhmucgioithieu->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_danhmucgioithieu->Export == "csv") {
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
		global $Language, $t_danhmucgioithieu;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_DANHMUCGIOITHIEU"] <> "") {
				$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setQueryStringValue($_GET["PK_DANHMUCGIOITHIEU"]);
				$this->arRecKey["PK_DANHMUCGIOITHIEU"] = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_danhmucgioithieu->CurrentAction = "I"; // Display form
			switch ($t_danhmucgioithieu->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_danhmucgioithieulist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue) == strval($rs->fields('PK_DANHMUCGIOITHIEU'))) {
								$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_danhmucgioithieulist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_danhmucgioithieu->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_danhmucgioithieu->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_danhmucgioithieulist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_danhmucgioithieu->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_danhmucgioithieu;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_danhmucgioithieu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_danhmucgioithieu->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_danhmucgioithieu;

		// Call Recordset Selecting event
		$t_danhmucgioithieu->Recordset_Selecting($t_danhmucgioithieu->CurrentFilter);

		// Load List page SQL
		$sSql = $t_danhmucgioithieu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_danhmucgioithieu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmucgioithieu;
		$sFilter = $t_danhmucgioithieu->KeyFilter();

		// Call Row Selecting event
		$t_danhmucgioithieu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmucgioithieu->CurrentFilter = $sFilter;
		$sSql = $t_danhmucgioithieu->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmucgioithieu->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmucgioithieu;
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setDbValue($rs->fields('PK_DANHMUCGIOITHIEU'));
		$t_danhmucgioithieu->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_danhmucgioithieu->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_danhmucgioithieu->C_URL->setDbValue($rs->fields('C_URL'));
		$t_danhmucgioithieu->C_DESCRIPTION->setDbValue($rs->fields('C_DESCRIPTION'));
		$t_danhmucgioithieu->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_danhmucgioithieu->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_danhmucgioithieu->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_danhmucgioithieu->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_danhmucgioithieu->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_danhmucgioithieu->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmucgioithieu;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_DANHMUCGIOITHIEU=" . urlencode($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue);
		$this->AddUrl = $t_danhmucgioithieu->AddUrl();
		$this->EditUrl = $t_danhmucgioithieu->EditUrl();
		$this->CopyUrl = $t_danhmucgioithieu->CopyUrl();
		$this->DeleteUrl = $t_danhmucgioithieu->DeleteUrl();
		$this->ListUrl = $t_danhmucgioithieu->ListUrl();

		// Call Row_Rendering event
		$t_danhmucgioithieu->Row_Rendering();

		// Common render codes for all row types
		// PK_DANHMUCGIOITHIEU

		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CellCssStyle = ""; $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CellCssClass = "";
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CellAttrs = array(); $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewAttrs = array(); $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->EditAttrs = array();

		// C_TYPE
		$t_danhmucgioithieu->C_TYPE->CellCssStyle = ""; $t_danhmucgioithieu->C_TYPE->CellCssClass = "";
		$t_danhmucgioithieu->C_TYPE->CellAttrs = array(); $t_danhmucgioithieu->C_TYPE->ViewAttrs = array(); $t_danhmucgioithieu->C_TYPE->EditAttrs = array();

		// C_NAME
		$t_danhmucgioithieu->C_NAME->CellCssStyle = ""; $t_danhmucgioithieu->C_NAME->CellCssClass = "";
		$t_danhmucgioithieu->C_NAME->CellAttrs = array(); $t_danhmucgioithieu->C_NAME->ViewAttrs = array(); $t_danhmucgioithieu->C_NAME->EditAttrs = array();

		// C_URL
		$t_danhmucgioithieu->C_URL->CellCssStyle = ""; $t_danhmucgioithieu->C_URL->CellCssClass = "";
		$t_danhmucgioithieu->C_URL->CellAttrs = array(); $t_danhmucgioithieu->C_URL->ViewAttrs = array(); $t_danhmucgioithieu->C_URL->EditAttrs = array();

		// C_DESCRIPTION
		$t_danhmucgioithieu->C_DESCRIPTION->CellCssStyle = ""; $t_danhmucgioithieu->C_DESCRIPTION->CellCssClass = "";
		$t_danhmucgioithieu->C_DESCRIPTION->CellAttrs = array(); $t_danhmucgioithieu->C_DESCRIPTION->ViewAttrs = array(); $t_danhmucgioithieu->C_DESCRIPTION->EditAttrs = array();

		// C_ORDER
		$t_danhmucgioithieu->C_ORDER->CellCssStyle = ""; $t_danhmucgioithieu->C_ORDER->CellCssClass = "";
		$t_danhmucgioithieu->C_ORDER->CellAttrs = array(); $t_danhmucgioithieu->C_ORDER->ViewAttrs = array(); $t_danhmucgioithieu->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_danhmucgioithieu->C_ACTIVE->CellCssStyle = ""; $t_danhmucgioithieu->C_ACTIVE->CellCssClass = "";
		$t_danhmucgioithieu->C_ACTIVE->CellAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->ViewAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->EditAttrs = array();

		// C_USER_ADD
		$t_danhmucgioithieu->C_USER_ADD->CellCssStyle = ""; $t_danhmucgioithieu->C_USER_ADD->CellCssClass = "";
		$t_danhmucgioithieu->C_USER_ADD->CellAttrs = array(); $t_danhmucgioithieu->C_USER_ADD->ViewAttrs = array(); $t_danhmucgioithieu->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_danhmucgioithieu->C_ADD_TIME->CellCssStyle = ""; $t_danhmucgioithieu->C_ADD_TIME->CellCssClass = "";
		$t_danhmucgioithieu->C_ADD_TIME->CellAttrs = array(); $t_danhmucgioithieu->C_ADD_TIME->ViewAttrs = array(); $t_danhmucgioithieu->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_danhmucgioithieu->C_USER_EDIT->CellCssStyle = ""; $t_danhmucgioithieu->C_USER_EDIT->CellCssClass = "";
		$t_danhmucgioithieu->C_USER_EDIT->CellAttrs = array(); $t_danhmucgioithieu->C_USER_EDIT->ViewAttrs = array(); $t_danhmucgioithieu->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_danhmucgioithieu->C_EDIT_TIME->CellCssStyle = ""; $t_danhmucgioithieu->C_EDIT_TIME->CellCssClass = "";
		$t_danhmucgioithieu->C_EDIT_TIME->CellAttrs = array(); $t_danhmucgioithieu->C_EDIT_TIME->ViewAttrs = array(); $t_danhmucgioithieu->C_EDIT_TIME->EditAttrs = array();
		if ($t_danhmucgioithieu->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_DANHMUCGIOITHIEU
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewValue = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue;
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssStyle = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssClass = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_danhmucgioithieu->C_TYPE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_TYPE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh muc 1 tin bai";
						break;
					case "1":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh muc list tin bai";
						break;
					case "2":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh m?c liên k?t url";
						break;
					default:
						$t_danhmucgioithieu->C_TYPE->ViewValue = $t_danhmucgioithieu->C_TYPE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_TYPE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_TYPE->CssStyle = "";
			$t_danhmucgioithieu->C_TYPE->CssClass = "";
			$t_danhmucgioithieu->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->ViewValue = $t_danhmucgioithieu->C_NAME->CurrentValue;
			$t_danhmucgioithieu->C_NAME->CssStyle = "";
			$t_danhmucgioithieu->C_NAME->CssClass = "";
			$t_danhmucgioithieu->C_NAME->ViewCustomAttributes = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->ViewValue = $t_danhmucgioithieu->C_URL->CurrentValue;
			$t_danhmucgioithieu->C_URL->CssStyle = "";
			$t_danhmucgioithieu->C_URL->CssClass = "";
			$t_danhmucgioithieu->C_URL->ViewCustomAttributes = "";

			// C_DESCRIPTION
			$t_danhmucgioithieu->C_DESCRIPTION->ViewValue = $t_danhmucgioithieu->C_DESCRIPTION->CurrentValue;
			$t_danhmucgioithieu->C_DESCRIPTION->CssStyle = "";
			$t_danhmucgioithieu->C_DESCRIPTION->CssClass = "";
			$t_danhmucgioithieu->C_DESCRIPTION->ViewCustomAttributes = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->ViewValue = $t_danhmucgioithieu->C_ORDER->CurrentValue;
			$t_danhmucgioithieu->C_ORDER->CssStyle = "";
			$t_danhmucgioithieu->C_ORDER->CssClass = "";
			$t_danhmucgioithieu->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_danhmucgioithieu->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_ACTIVE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = $t_danhmucgioithieu->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_ACTIVE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_ACTIVE->CssStyle = "";
			$t_danhmucgioithieu->C_ACTIVE->CssClass = "";
			$t_danhmucgioithieu->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_danhmucgioithieu->C_USER_ADD->ViewValue = $t_danhmucgioithieu->C_USER_ADD->CurrentValue;
			$t_danhmucgioithieu->C_USER_ADD->CssStyle = "";
			$t_danhmucgioithieu->C_USER_ADD->CssClass = "";
			$t_danhmucgioithieu->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = $t_danhmucgioithieu->C_ADD_TIME->CurrentValue;
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_ADD_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_ADD_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_ADD_TIME->CssClass = "";
			$t_danhmucgioithieu->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_danhmucgioithieu->C_USER_EDIT->ViewValue = $t_danhmucgioithieu->C_USER_EDIT->CurrentValue;
			$t_danhmucgioithieu->C_USER_EDIT->CssStyle = "";
			$t_danhmucgioithieu->C_USER_EDIT->CssClass = "";
			$t_danhmucgioithieu->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = $t_danhmucgioithieu->C_EDIT_TIME->CurrentValue;
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_EDIT_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_EDIT_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_EDIT_TIME->CssClass = "";
			$t_danhmucgioithieu->C_EDIT_TIME->ViewCustomAttributes = "";

			// PK_DANHMUCGIOITHIEU
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->HrefValue = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->TooltipValue = "";

			// C_TYPE
			$t_danhmucgioithieu->C_TYPE->HrefValue = "";
			$t_danhmucgioithieu->C_TYPE->TooltipValue = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->HrefValue = "";
			$t_danhmucgioithieu->C_NAME->TooltipValue = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->HrefValue = "";
			$t_danhmucgioithieu->C_URL->TooltipValue = "";

			// C_DESCRIPTION
			$t_danhmucgioithieu->C_DESCRIPTION->HrefValue = "";
			$t_danhmucgioithieu->C_DESCRIPTION->TooltipValue = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->HrefValue = "";
			$t_danhmucgioithieu->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_danhmucgioithieu->C_ACTIVE->HrefValue = "";
			$t_danhmucgioithieu->C_ACTIVE->TooltipValue = "";

			// C_USER_ADD
			$t_danhmucgioithieu->C_USER_ADD->HrefValue = "";
			$t_danhmucgioithieu->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_danhmucgioithieu->C_ADD_TIME->HrefValue = "";
			$t_danhmucgioithieu->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_danhmucgioithieu->C_USER_EDIT->HrefValue = "";
			$t_danhmucgioithieu->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_danhmucgioithieu->C_EDIT_TIME->HrefValue = "";
			$t_danhmucgioithieu->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_danhmucgioithieu->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmucgioithieu->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_danhmucgioithieu;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_danhmucgioithieu->SelectRecordCount();
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
		if ($t_danhmucgioithieu->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_danhmucgioithieu, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_TYPE);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_NAME);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_URL);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ORDER);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ACTIVE);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_USER_ADD);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_danhmucgioithieu->C_EDIT_TIME);
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
				$t_danhmucgioithieu->CssClass = "";
				$t_danhmucgioithieu->CssStyle = "";
				$t_danhmucgioithieu->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_danhmucgioithieu->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_DANHMUCGIOITHIEU', $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE', $t_danhmucgioithieu->C_TYPE->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_NAME', $t_danhmucgioithieu->C_NAME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_danhmucgioithieu->C_URL->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_danhmucgioithieu->C_ORDER->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_danhmucgioithieu->C_ACTIVE->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_danhmucgioithieu->C_USER_ADD->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_danhmucgioithieu->C_ADD_TIME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_danhmucgioithieu->C_USER_EDIT->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_danhmucgioithieu->C_EDIT_TIME->ExportValue($t_danhmucgioithieu->Export, $t_danhmucgioithieu->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_danhmucgioithieu->PK_DANHMUCGIOITHIEU);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_TYPE);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_NAME);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_URL);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ORDER);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ACTIVE);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_USER_ADD);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_ADD_TIME);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_USER_EDIT);
					$ExportDoc->ExportField($t_danhmucgioithieu->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_danhmucgioithieu->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_danhmucgioithieu->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_danhmucgioithieu->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_danhmucgioithieu->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_danhmucgioithieu->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_danhmucgioithieu;
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
		if ($t_danhmucgioithieu->Email_Sending($Email, $EventArgs))
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
		global $t_danhmucgioithieu;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_danhmucgioithieu->KeyUrl("", ""), 1);
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
