<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_htlienquaninfo.php" ?>
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
$t_htlienquan_view = new ct_htlienquan_view();
$Page =& $t_htlienquan_view;

// Page init
$t_htlienquan_view->Page_Init();

// Page main
$t_htlienquan_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_htlienquan->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_htlienquan_view = new ew_Page("t_htlienquan_view");

// page properties
t_htlienquan_view.PageID = "view"; // page ID
t_htlienquan_view.FormID = "ft_htlienquanview"; // form ID
var EW_PAGE_ID = t_htlienquan_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_htlienquan_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_htlienquan_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_htlienquan_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_htlienquan_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_htlienquan->TableCaption() ?>
<?php if ($t_htlienquan->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_htlienquan_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_htlienquan" id="emf_t_htlienquan" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_htlienquan',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_htlienquan_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_htlienquan->Export == "") { ?>
<a href="<?php echo $t_htlienquan_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_htlienquan_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_htlienquan_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_htlienquan_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_htlienquan_view->ShowMessage();
?>
<p>
<?php if ($t_htlienquan->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_htlienquan_view->Pager)) $t_htlienquan_view->Pager = new cNumericPager($t_htlienquan_view->lStartRec, $t_htlienquan_view->lDisplayRecs, $t_htlienquan_view->lTotalRecs, $t_htlienquan_view->lRecRange) ?>
<?php if ($t_htlienquan_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_htlienquan_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_htlienquan_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_htlienquan_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_htlienquan->SYS_ID->Visible) { // SYS_ID ?>
	<tr<?php echo $t_htlienquan->SYS_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->SYS_ID->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->SYS_ID->CellAttributes() ?>>
<div<?php echo $t_htlienquan->SYS_ID->ViewAttributes() ?>><?php echo $t_htlienquan->SYS_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->FK_OB_ID->Visible) { // FK_OB_ID ?>
	<tr<?php echo $t_htlienquan->FK_OB_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->FK_OB_ID->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->FK_OB_ID->CellAttributes() ?>>
<div<?php echo $t_htlienquan->FK_OB_ID->ViewAttributes() ?>><?php echo $t_htlienquan->FK_OB_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_htlienquan->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_NAME->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_NAME->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_NAME->ViewAttributes() ?>><?php echo $t_htlienquan->C_NAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_ICON->Visible) { // C_ICON ?>
	<tr<?php echo $t_htlienquan->C_ICON->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_ICON->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_ICON->CellAttributes() ?>>
<?php if ($t_htlienquan->C_ICON->HrefValue <> "" || $t_htlienquan->C_ICON->TooltipValue <> "") { ?>
<?php if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) { ?>
<a href="<?php echo $t_htlienquan->C_ICON->HrefValue ?>" target="_blank"><img src="t_htlienquan_C_ICON_bv.php?SYS_ID=<?php echo $t_htlienquan->SYS_ID->CurrentValue ?>" border=0<?php echo $t_htlienquan->C_ICON->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_htlienquan->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) { ?>
<img src="t_htlienquan_C_ICON_bv.php?SYS_ID=<?php echo $t_htlienquan->SYS_ID->CurrentValue ?>" border=0<?php echo $t_htlienquan->C_ICON->ViewAttributes() ?>>
<?php } elseif (!in_array($t_htlienquan->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_htlienquan->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_URL->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_URL->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_URL->ViewAttributes() ?>><?php echo $t_htlienquan->C_URL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_htlienquan->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_ACTIVE->ViewAttributes() ?>><?php echo $t_htlienquan->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_htlienquan->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_USER_ADD->ViewAttributes() ?>><?php echo $t_htlienquan->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_htlienquan->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_htlienquan->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_htlienquan->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_htlienquan->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_htlienquan->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_htlienquan->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_htlienquan->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_htlienquan_view->Pager)) $t_htlienquan_view->Pager = new cNumericPager($t_htlienquan_view->lStartRec, $t_htlienquan_view->lDisplayRecs, $t_htlienquan_view->lTotalRecs, $t_htlienquan_view->lRecRange) ?>
<?php if ($t_htlienquan_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_htlienquan_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_htlienquan_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_htlienquan_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_htlienquan_view->PageUrl() ?>start=<?php echo $t_htlienquan_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_htlienquan_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_htlienquan->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_htlienquan_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_htlienquan_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_htlienquan';

	// Page object name
	var $PageObjName = 't_htlienquan_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) $PageUrl .= "t=" . $t_htlienquan->TableVar . "&"; // Add page token
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
		global $objForm, $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) {
			if ($objForm)
				return ($t_htlienquan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_htlienquan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_htlienquan_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_htlienquan)
		$GLOBALS["t_htlienquan"] = new ct_htlienquan();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_htlienquan', TRUE);

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
		global $t_htlienquan;

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
			$this->Page_Terminate("t_htlienquanlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_htlienquan->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_htlienquan->Export = $_POST["exporttype"];
		} else {
			$t_htlienquan->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_htlienquan->Export; // Get export parameter, used in header
		$gsExportFile = $t_htlienquan->TableVar; // Get export file, used in header
		if (@$_GET["SYS_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["SYS_ID"]);
		}
		if (in_array($t_htlienquan->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_htlienquan->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_htlienquan->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_htlienquan->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_htlienquan->Export == "csv") {
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
		global $Language, $t_htlienquan;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["SYS_ID"] <> "") {
				$t_htlienquan->SYS_ID->setQueryStringValue($_GET["SYS_ID"]);
				$this->arRecKey["SYS_ID"] = $t_htlienquan->SYS_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_htlienquan->CurrentAction = "I"; // Display form
			switch ($t_htlienquan->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_htlienquanlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_htlienquan->SYS_ID->CurrentValue) == strval($rs->fields('SYS_ID'))) {
								$t_htlienquan->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_htlienquanlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_htlienquan->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_htlienquan->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_htlienquanlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_htlienquan->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_htlienquan;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_htlienquan->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_htlienquan->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_htlienquan->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_htlienquan->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_htlienquan;

		// Call Recordset Selecting event
		$t_htlienquan->Recordset_Selecting($t_htlienquan->CurrentFilter);

		// Load List page SQL
		$sSql = $t_htlienquan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_htlienquan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_htlienquan;
		$sFilter = $t_htlienquan->KeyFilter();

		// Call Row Selecting event
		$t_htlienquan->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_htlienquan->CurrentFilter = $sFilter;
		$sSql = $t_htlienquan->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_htlienquan->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_htlienquan;
		$t_htlienquan->SYS_ID->setDbValue($rs->fields('SYS_ID'));
		$t_htlienquan->FK_OB_ID->setDbValue($rs->fields('FK_OB_ID'));
		$t_htlienquan->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_htlienquan->C_ICON->Upload->DbValue = $rs->fields('C_ICON');
		$t_htlienquan->C_URL->setDbValue($rs->fields('C_URL'));
		$t_htlienquan->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_htlienquan->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_htlienquan->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_htlienquan->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_htlienquan->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_htlienquan;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "SYS_ID=" . urlencode($t_htlienquan->SYS_ID->CurrentValue);
		$this->AddUrl = $t_htlienquan->AddUrl();
		$this->EditUrl = $t_htlienquan->EditUrl();
		$this->CopyUrl = $t_htlienquan->CopyUrl();
		$this->DeleteUrl = $t_htlienquan->DeleteUrl();
		$this->ListUrl = $t_htlienquan->ListUrl();

		// Call Row_Rendering event
		$t_htlienquan->Row_Rendering();

		// Common render codes for all row types
		// SYS_ID

		$t_htlienquan->SYS_ID->CellCssStyle = ""; $t_htlienquan->SYS_ID->CellCssClass = "";
		$t_htlienquan->SYS_ID->CellAttrs = array(); $t_htlienquan->SYS_ID->ViewAttrs = array(); $t_htlienquan->SYS_ID->EditAttrs = array();

		// FK_OB_ID
		$t_htlienquan->FK_OB_ID->CellCssStyle = ""; $t_htlienquan->FK_OB_ID->CellCssClass = "";
		$t_htlienquan->FK_OB_ID->CellAttrs = array(); $t_htlienquan->FK_OB_ID->ViewAttrs = array(); $t_htlienquan->FK_OB_ID->EditAttrs = array();

		// C_NAME
		$t_htlienquan->C_NAME->CellCssStyle = ""; $t_htlienquan->C_NAME->CellCssClass = "";
		$t_htlienquan->C_NAME->CellAttrs = array(); $t_htlienquan->C_NAME->ViewAttrs = array(); $t_htlienquan->C_NAME->EditAttrs = array();

		// C_ICON
		$t_htlienquan->C_ICON->CellCssStyle = ""; $t_htlienquan->C_ICON->CellCssClass = "";
		$t_htlienquan->C_ICON->CellAttrs = array(); $t_htlienquan->C_ICON->ViewAttrs = array(); $t_htlienquan->C_ICON->EditAttrs = array();

		// C_URL
		$t_htlienquan->C_URL->CellCssStyle = ""; $t_htlienquan->C_URL->CellCssClass = "";
		$t_htlienquan->C_URL->CellAttrs = array(); $t_htlienquan->C_URL->ViewAttrs = array(); $t_htlienquan->C_URL->EditAttrs = array();

		// C_ACTIVE
		$t_htlienquan->C_ACTIVE->CellCssStyle = ""; $t_htlienquan->C_ACTIVE->CellCssClass = "";
		$t_htlienquan->C_ACTIVE->CellAttrs = array(); $t_htlienquan->C_ACTIVE->ViewAttrs = array(); $t_htlienquan->C_ACTIVE->EditAttrs = array();

		// C_USER_ADD
		$t_htlienquan->C_USER_ADD->CellCssStyle = ""; $t_htlienquan->C_USER_ADD->CellCssClass = "";
		$t_htlienquan->C_USER_ADD->CellAttrs = array(); $t_htlienquan->C_USER_ADD->ViewAttrs = array(); $t_htlienquan->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_htlienquan->C_ADD_TIME->CellCssStyle = ""; $t_htlienquan->C_ADD_TIME->CellCssClass = "";
		$t_htlienquan->C_ADD_TIME->CellAttrs = array(); $t_htlienquan->C_ADD_TIME->ViewAttrs = array(); $t_htlienquan->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_htlienquan->C_USER_EDIT->CellCssStyle = ""; $t_htlienquan->C_USER_EDIT->CellCssClass = "";
		$t_htlienquan->C_USER_EDIT->CellAttrs = array(); $t_htlienquan->C_USER_EDIT->ViewAttrs = array(); $t_htlienquan->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_htlienquan->C_EDIT_TIME->CellCssStyle = ""; $t_htlienquan->C_EDIT_TIME->CellCssClass = "";
		$t_htlienquan->C_EDIT_TIME->CellAttrs = array(); $t_htlienquan->C_EDIT_TIME->ViewAttrs = array(); $t_htlienquan->C_EDIT_TIME->EditAttrs = array();
		if ($t_htlienquan->RowType == EW_ROWTYPE_VIEW) { // View row

			// SYS_ID
			$t_htlienquan->SYS_ID->ViewValue = $t_htlienquan->SYS_ID->CurrentValue;
			$t_htlienquan->SYS_ID->CssStyle = "";
			$t_htlienquan->SYS_ID->CssClass = "";
			$t_htlienquan->SYS_ID->ViewCustomAttributes = "";

			// FK_OB_ID
			if (strval($t_htlienquan->FK_OB_ID->CurrentValue) <> "") {
				$t_htlienquan->FK_OB_ID->ViewValue = "";
				$arwrk = explode(",", strval($t_htlienquan->FK_OB_ID->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "1":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Danh mục tuyển sinh";
							break;
						case "2":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Đối tượng sinh viên đang học";
							break;
                                                case "3":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối phòng";
							break;
                                                case "4":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối ban";
							break;
                                                case "5":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Hệ thống HPU";
							break;
						default:
							$t_htlienquan->FK_OB_ID->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_htlienquan->FK_OB_ID->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_htlienquan->FK_OB_ID->ViewValue = NULL;
			}
			$t_htlienquan->FK_OB_ID->CssStyle = "";
			$t_htlienquan->FK_OB_ID->CssClass = "";
			$t_htlienquan->FK_OB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_htlienquan->C_NAME->ViewValue = $t_htlienquan->C_NAME->CurrentValue;
			$t_htlienquan->C_NAME->CssStyle = "";
			$t_htlienquan->C_NAME->CssClass = "";
			$t_htlienquan->C_NAME->ViewCustomAttributes = "";

			// C_ICON
			if (!ew_Empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->ViewValue = $t_htlienquan->C_ICON->FldCaption();
				$t_htlienquan->C_ICON->ImageAlt = $t_htlienquan->C_ICON->FldAlt();
			} else {
				$t_htlienquan->C_ICON->ViewValue = "";
			}
			$t_htlienquan->C_ICON->CssStyle = "";
			$t_htlienquan->C_ICON->CssClass = "";
			$t_htlienquan->C_ICON->ViewCustomAttributes = "";

			// C_URL
			$t_htlienquan->C_URL->ViewValue = $t_htlienquan->C_URL->CurrentValue;
			$t_htlienquan->C_URL->CssStyle = "";
			$t_htlienquan->C_URL->CssClass = "";
			$t_htlienquan->C_URL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_htlienquan->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_htlienquan->C_ACTIVE->CurrentValue) {
					case "0":
						$t_htlienquan->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_htlienquan->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_htlienquan->C_ACTIVE->ViewValue = $t_htlienquan->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_htlienquan->C_ACTIVE->ViewValue = NULL;
			}
			$t_htlienquan->C_ACTIVE->CssStyle = "";
			$t_htlienquan->C_ACTIVE->CssClass = "";
			$t_htlienquan->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_htlienquan->C_USER_ADD->ViewValue = $t_htlienquan->C_USER_ADD->CurrentValue;
			$t_htlienquan->C_USER_ADD->CssStyle = "";
			$t_htlienquan->C_USER_ADD->CssClass = "";
			$t_htlienquan->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_htlienquan->C_ADD_TIME->ViewValue = $t_htlienquan->C_ADD_TIME->CurrentValue;
			$t_htlienquan->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_ADD_TIME->ViewValue, 7);
			$t_htlienquan->C_ADD_TIME->CssStyle = "";
			$t_htlienquan->C_ADD_TIME->CssClass = "";
			$t_htlienquan->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->ViewValue = $t_htlienquan->C_USER_EDIT->CurrentValue;
			$t_htlienquan->C_USER_EDIT->CssStyle = "";
			$t_htlienquan->C_USER_EDIT->CssClass = "";
			$t_htlienquan->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->ViewValue = $t_htlienquan->C_EDIT_TIME->CurrentValue;
			$t_htlienquan->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_EDIT_TIME->ViewValue, 7);
			$t_htlienquan->C_EDIT_TIME->CssStyle = "";
			$t_htlienquan->C_EDIT_TIME->CssClass = "";
			$t_htlienquan->C_EDIT_TIME->ViewCustomAttributes = "";

			// SYS_ID
			$t_htlienquan->SYS_ID->HrefValue = "";
			$t_htlienquan->SYS_ID->TooltipValue = "";

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->HrefValue = "";
			$t_htlienquan->FK_OB_ID->TooltipValue = "";

			// C_NAME
			$t_htlienquan->C_NAME->HrefValue = "";
			$t_htlienquan->C_NAME->TooltipValue = "";

			// C_ICON
			if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->HrefValue = "t_htlienquan_C_ICON_bv.php?SYS_ID=" . $t_htlienquan->SYS_ID->CurrentValue;
				if ($t_htlienquan->Export <> "") $t_htlienquan->C_ICON->HrefValue = ew_ConvertFullUrl($t_htlienquan->C_ICON->HrefValue);
			} else {
				$t_htlienquan->C_ICON->HrefValue = "";
			}
			$t_htlienquan->C_ICON->TooltipValue = "";

			// C_URL
			$t_htlienquan->C_URL->HrefValue = "";
			$t_htlienquan->C_URL->TooltipValue = "";

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->HrefValue = "";
			$t_htlienquan->C_ACTIVE->TooltipValue = "";

			// C_USER_ADD
			$t_htlienquan->C_USER_ADD->HrefValue = "";
			$t_htlienquan->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_htlienquan->C_ADD_TIME->HrefValue = "";
			$t_htlienquan->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->HrefValue = "";
			$t_htlienquan->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->HrefValue = "";
			$t_htlienquan->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_htlienquan->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_htlienquan->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_htlienquan;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_htlienquan->SelectRecordCount();
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
		if ($t_htlienquan->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_htlienquan, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_htlienquan->SYS_ID);
				$ExportDoc->ExportCaption($t_htlienquan->FK_OB_ID);
				$ExportDoc->ExportCaption($t_htlienquan->C_NAME);
				$ExportDoc->ExportCaption($t_htlienquan->C_URL);
				$ExportDoc->ExportCaption($t_htlienquan->C_ACTIVE);
				$ExportDoc->ExportCaption($t_htlienquan->C_USER_ADD);
				$ExportDoc->ExportCaption($t_htlienquan->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_htlienquan->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_htlienquan->C_EDIT_TIME);
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
				$t_htlienquan->CssClass = "";
				$t_htlienquan->CssStyle = "";
				$t_htlienquan->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_htlienquan->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('SYS_ID', $t_htlienquan->SYS_ID->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('FK_OB_ID', $t_htlienquan->FK_OB_ID->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_NAME', $t_htlienquan->C_NAME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_htlienquan->C_URL->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_htlienquan->C_ACTIVE->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_htlienquan->C_USER_ADD->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_htlienquan->C_ADD_TIME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_htlienquan->C_USER_EDIT->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_htlienquan->C_EDIT_TIME->ExportValue($t_htlienquan->Export, $t_htlienquan->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_htlienquan->SYS_ID);
					$ExportDoc->ExportField($t_htlienquan->FK_OB_ID);
					$ExportDoc->ExportField($t_htlienquan->C_NAME);
					$ExportDoc->ExportField($t_htlienquan->C_URL);
					$ExportDoc->ExportField($t_htlienquan->C_ACTIVE);
					$ExportDoc->ExportField($t_htlienquan->C_USER_ADD);
					$ExportDoc->ExportField($t_htlienquan->C_ADD_TIME);
					$ExportDoc->ExportField($t_htlienquan->C_USER_EDIT);
					$ExportDoc->ExportField($t_htlienquan->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_htlienquan->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_htlienquan->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_htlienquan->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_htlienquan->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_htlienquan->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_htlienquan;
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
		if ($t_htlienquan->Email_Sending($Email, $EventArgs))
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
		global $t_htlienquan;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_htlienquan->KeyUrl("", ""), 1);
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
