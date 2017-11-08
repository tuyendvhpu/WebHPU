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
$t_ghichu_lich_view = new ct_ghichu_lich_view();
$Page =& $t_ghichu_lich_view;

// Page init
$t_ghichu_lich_view->Page_Init();

// Page main
$t_ghichu_lich_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_ghichu_lich->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_ghichu_lich_view = new ew_Page("t_ghichu_lich_view");

// page properties
t_ghichu_lich_view.PageID = "view"; // page ID
t_ghichu_lich_view.FormID = "ft_ghichu_lichview"; // form ID
var EW_PAGE_ID = t_ghichu_lich_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_ghichu_lich_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ghichu_lich_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ghichu_lich_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ghichu_lich_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_ghichu_lich->TableCaption() ?>
<?php if ($t_ghichu_lich->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_ghichu_lich_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_ghichu_lich" id="emf_t_ghichu_lich" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_ghichu_lich',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_ghichu_lich_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_ghichu_lich->Export == "") { ?>
<a href="<?php echo $t_ghichu_lich_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_ghichu_lich_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_ghichu_lich_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_ghichu_lich_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_ghichu_lich_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_ghichu_lich_view->ShowMessage();
?>
<p>
<?php if ($t_ghichu_lich->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ghichu_lich_view->Pager)) $t_ghichu_lich_view->Pager = new cNumericPager($t_ghichu_lich_view->lStartRec, $t_ghichu_lich_view->lDisplayRecs, $t_ghichu_lich_view->lTotalRecs, $t_ghichu_lich_view->lRecRange) ?>
<?php if ($t_ghichu_lich_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_ghichu_lich_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ghichu_lich_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_ghichu_lich_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_ghichu_lich->SB_NOTE_ID->Visible) { // SB_NOTE_ID ?>
	<tr<?php echo $t_ghichu_lich->SB_NOTE_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->SB_NOTE_ID->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->SB_NOTE_ID->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->SB_NOTE_ID->ViewAttributes() ?>><?php echo $t_ghichu_lich->SB_NOTE_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->FK_CONG_TY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_ghichu_lich->FK_CONG_TY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->FK_CONG_TY->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->FK_CONG_TY->ViewAttributes() ?>><?php echo $t_ghichu_lich->FK_CONG_TY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_YEAR->Visible) { // C_YEAR ?>
	<tr<?php echo $t_ghichu_lich->C_YEAR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_YEAR->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_YEAR->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_YEAR->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_WEEK->Visible) { // C_WEEK ?>
	<tr<?php echo $t_ghichu_lich->C_WEEK->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_WEEK->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_WEEK->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_WEEK->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_ghichu_lich->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_CONTENT->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_CONTENT->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_CONTENT->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_CONTENT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_ghichu_lich->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_USER_ADD->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_TIME_ADD->Visible) { // C_TIME_ADD ?>
	<tr<?php echo $t_ghichu_lich->C_TIME_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_TIME_ADD->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_TIME_ADD->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_TIME_ADD->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_TIME_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_ghichu_lich->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_TIME_EDIT->Visible) { // C_TIME_EDIT ?>
	<tr<?php echo $t_ghichu_lich->C_TIME_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_TIME_EDIT->FldCaption() ?></td>
		<td<?php echo $t_ghichu_lich->C_TIME_EDIT->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_TIME_EDIT->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_TIME_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_ghichu_lich->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_ghichu_lich_view->Pager)) $t_ghichu_lich_view->Pager = new cNumericPager($t_ghichu_lich_view->lStartRec, $t_ghichu_lich_view->lDisplayRecs, $t_ghichu_lich_view->lTotalRecs, $t_ghichu_lich_view->lRecRange) ?>
<?php if ($t_ghichu_lich_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_ghichu_lich_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_ghichu_lich_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_ghichu_lich_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_ghichu_lich_view->PageUrl() ?>start=<?php echo $t_ghichu_lich_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_ghichu_lich_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_ghichu_lich->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_ghichu_lich_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_ghichu_lich_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_ghichu_lich';

	// Page object name
	var $PageObjName = 't_ghichu_lich_view';

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
	function ct_ghichu_lich_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_ghichu_lich)
		$GLOBALS["t_ghichu_lich"] = new ct_ghichu_lich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ghichu_lich', TRUE);

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_ghichu_lichlist.php");
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
		if (@$_GET["SB_NOTE_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["SB_NOTE_ID"]);
		}
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
		global $Language, $t_ghichu_lich;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["SB_NOTE_ID"] <> "") {
				$t_ghichu_lich->SB_NOTE_ID->setQueryStringValue($_GET["SB_NOTE_ID"]);
				$this->arRecKey["SB_NOTE_ID"] = $t_ghichu_lich->SB_NOTE_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_ghichu_lich->CurrentAction = "I"; // Display form
			switch ($t_ghichu_lich->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_ghichu_lichlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_ghichu_lich->SB_NOTE_ID->CurrentValue) == strval($rs->fields('SB_NOTE_ID'))) {
								$t_ghichu_lich->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_ghichu_lichlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_ghichu_lich->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_ghichu_lich->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_ghichu_lichlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_ghichu_lich->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
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
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "SB_NOTE_ID=" . urlencode($t_ghichu_lich->SB_NOTE_ID->CurrentValue);
		$this->AddUrl = $t_ghichu_lich->AddUrl();
		$this->EditUrl = $t_ghichu_lich->EditUrl();
		$this->CopyUrl = $t_ghichu_lich->CopyUrl();
		$this->DeleteUrl = $t_ghichu_lich->DeleteUrl();
		$this->ListUrl = $t_ghichu_lich->ListUrl();

		// Call Row_Rendering event
		$t_ghichu_lich->Row_Rendering();

		// Common render codes for all row types
		// SB_NOTE_ID

		$t_ghichu_lich->SB_NOTE_ID->CellCssStyle = ""; $t_ghichu_lich->SB_NOTE_ID->CellCssClass = "";
		$t_ghichu_lich->SB_NOTE_ID->CellAttrs = array(); $t_ghichu_lich->SB_NOTE_ID->ViewAttrs = array(); $t_ghichu_lich->SB_NOTE_ID->EditAttrs = array();

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

		// C_USER_ADD
		$t_ghichu_lich->C_USER_ADD->CellCssStyle = ""; $t_ghichu_lich->C_USER_ADD->CellCssClass = "";
		$t_ghichu_lich->C_USER_ADD->CellAttrs = array(); $t_ghichu_lich->C_USER_ADD->ViewAttrs = array(); $t_ghichu_lich->C_USER_ADD->EditAttrs = array();

		// C_TIME_ADD
		$t_ghichu_lich->C_TIME_ADD->CellCssStyle = ""; $t_ghichu_lich->C_TIME_ADD->CellCssClass = "";
		$t_ghichu_lich->C_TIME_ADD->CellAttrs = array(); $t_ghichu_lich->C_TIME_ADD->ViewAttrs = array(); $t_ghichu_lich->C_TIME_ADD->EditAttrs = array();

		// C_USER_EDIT
		$t_ghichu_lich->C_USER_EDIT->CellCssStyle = ""; $t_ghichu_lich->C_USER_EDIT->CellCssClass = "";
		$t_ghichu_lich->C_USER_EDIT->CellAttrs = array(); $t_ghichu_lich->C_USER_EDIT->ViewAttrs = array(); $t_ghichu_lich->C_USER_EDIT->EditAttrs = array();

		// C_TIME_EDIT
		$t_ghichu_lich->C_TIME_EDIT->CellCssStyle = ""; $t_ghichu_lich->C_TIME_EDIT->CellCssClass = "";
		$t_ghichu_lich->C_TIME_EDIT->CellAttrs = array(); $t_ghichu_lich->C_TIME_EDIT->ViewAttrs = array(); $t_ghichu_lich->C_TIME_EDIT->EditAttrs = array();
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

			// SB_NOTE_ID
			$t_ghichu_lich->SB_NOTE_ID->HrefValue = "";
			$t_ghichu_lich->SB_NOTE_ID->TooltipValue = "";

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

			// C_USER_ADD
			$t_ghichu_lich->C_USER_ADD->HrefValue = "";
			$t_ghichu_lich->C_USER_ADD->TooltipValue = "";

			// C_TIME_ADD
			$t_ghichu_lich->C_TIME_ADD->HrefValue = "";
			$t_ghichu_lich->C_TIME_ADD->TooltipValue = "";

			// C_USER_EDIT
			$t_ghichu_lich->C_USER_EDIT->HrefValue = "";
			$t_ghichu_lich->C_USER_EDIT->TooltipValue = "";

			// C_TIME_EDIT
			$t_ghichu_lich->C_TIME_EDIT->HrefValue = "";
			$t_ghichu_lich->C_TIME_EDIT->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_ghichu_lich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_ghichu_lich->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_ghichu_lich;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_ghichu_lich->SelectRecordCount();
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
		if ($t_ghichu_lich->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_ghichu_lich, "v");
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

		// Add record key QueryString
		$sQry .= "&" . substr($t_ghichu_lich->KeyUrl("", ""), 1);
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
