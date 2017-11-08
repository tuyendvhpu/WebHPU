<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersadmininfo.php" ?>
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
$usersadmin_view = new cusersadmin_view();
$Page =& $usersadmin_view;

// Page init
$usersadmin_view->Page_Init();

// Page main
$usersadmin_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($usersadmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var usersadmin_view = new ew_Page("usersadmin_view");

// page properties
usersadmin_view.PageID = "view"; // page ID
usersadmin_view.FormID = "fusersadminview"; // form ID
var EW_PAGE_ID = usersadmin_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
usersadmin_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
usersadmin_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
usersadmin_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
usersadmin_view.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("View") ?>&nbsp;<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $usersadmin->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<?php if ($usersadmin->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $usersadmin_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_usersadmin" id="emf_usersadmin" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_usersadmin',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($usersadmin_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($usersadmin->Export == "") { ?>
<a href="<?php echo $usersadmin_view->ListUrl ?>"><?php echo $Language->Phrase("GoBack") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $usersadmin_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $usersadmin_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $usersadmin_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$usersadmin_view->ShowMessage();
?>
<p>
<?php if ($usersadmin->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($usersadmin_view->Pager)) $usersadmin_view->Pager = new cNumericPager($usersadmin_view->lStartRec, $usersadmin_view->lDisplayRecs, $usersadmin_view->lTotalRecs, $usersadmin_view->lRecRange) ?>
<?php if ($usersadmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($usersadmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($usersadmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($usersadmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($usersadmin->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $usersadmin->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TENDANGNHAP->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $usersadmin->C_TENDANGNHAP->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $usersadmin->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_HOTEN->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_HOTEN->CellAttributes() ?>>
<div<?php echo $usersadmin->C_HOTEN->ViewAttributes() ?>><?php echo $usersadmin->C_HOTEN->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $usersadmin->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_DIACHI->CellAttributes() ?>>
<div<?php echo $usersadmin->C_DIACHI->ViewAttributes() ?>><?php echo $usersadmin->C_DIACHI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $usersadmin->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TEL->ViewAttributes() ?>><?php echo $usersadmin->C_TEL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $usersadmin->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL_HOME->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TEL_HOME->ViewAttributes() ?>><?php echo $usersadmin->C_TEL_HOME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $usersadmin->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL_MOBILE->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $usersadmin->C_TEL_MOBILE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $usersadmin->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_FAX->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_FAX->CellAttributes() ?>>
<div<?php echo $usersadmin->C_FAX->ViewAttributes() ?>><?php echo $usersadmin->C_FAX->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $usersadmin->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_EMAIL->CellAttributes() ?>>
<div<?php echo $usersadmin->C_EMAIL->ViewAttributes() ?>><?php echo $usersadmin->C_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $usersadmin->FK_USERLEVELID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?></td>
		<td<?php echo $usersadmin->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $usersadmin->FK_USERLEVELID->ViewAttributes() ?>><?php echo $usersadmin->FK_USERLEVELID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($usersadmin->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($usersadmin_view->Pager)) $usersadmin_view->Pager = new cNumericPager($usersadmin_view->lStartRec, $usersadmin_view->lDisplayRecs, $usersadmin_view->lTotalRecs, $usersadmin_view->lRecRange) ?>
<?php if ($usersadmin_view->Pager->RecordCount > 0) { ?>
	<?php if ($usersadmin_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($usersadmin_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($usersadmin_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $usersadmin_view->PageUrl() ?>start=<?php echo $usersadmin_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($usersadmin_view->sSrchWhere == "0=101") { ?>
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
<?php if ($usersadmin->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$usersadmin_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cusersadmin_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'usersadmin';

	// Page object name
	var $PageObjName = 'usersadmin_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $usersadmin;
		if ($usersadmin->UseTokenInUrl) $PageUrl .= "t=" . $usersadmin->TableVar . "&"; // Add page token
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
		global $objForm, $usersadmin;
		if ($usersadmin->UseTokenInUrl) {
			if ($objForm)
				return ($usersadmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($usersadmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusersadmin_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (usersadmin)
		$GLOBALS["usersadmin"] = new cusersadmin();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'usersadmin', TRUE);

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
		global $usersadmin;

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
			$this->Page_Terminate("usersadminlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$usersadmin->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$usersadmin->Export = $_POST["exporttype"];
		} else {
			$usersadmin->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $usersadmin->Export; // Get export parameter, used in header
		$gsExportFile = $usersadmin->TableVar; // Get export file, used in header
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_NGUOIDUNG_ID"]);
		}
		if (in_array($usersadmin->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($usersadmin->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($usersadmin->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($usersadmin->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($usersadmin->Export == "csv") {
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
		global $Language, $usersadmin;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
				$usersadmin->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
				$this->arRecKey["PK_NGUOIDUNG_ID"] = $usersadmin->PK_NGUOIDUNG_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$usersadmin->CurrentAction = "I"; // Display form
			switch ($usersadmin->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("usersadminlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($usersadmin->PK_NGUOIDUNG_ID->CurrentValue) == strval($rs->fields('PK_NGUOIDUNG_ID'))) {
								$usersadmin->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "usersadminlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($usersadmin->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($usersadmin->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "usersadminlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$usersadmin->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $usersadmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$usersadmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$usersadmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $usersadmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$usersadmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$usersadmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$usersadmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $usersadmin;

		// Call Recordset Selecting event
		$usersadmin->Recordset_Selecting($usersadmin->CurrentFilter);

		// Load List page SQL
		$sSql = $usersadmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$usersadmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $usersadmin;
		$sFilter = $usersadmin->KeyFilter();

		// Call Row Selecting event
		$usersadmin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$usersadmin->CurrentFilter = $sFilter;
		$sSql = $usersadmin->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$usersadmin->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$usersadmin->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$usersadmin->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$usersadmin->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$usersadmin->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$usersadmin->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$usersadmin->C_TEL->setDbValue($rs->fields('C_TEL'));
		$usersadmin->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$usersadmin->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$usersadmin->C_FAX->setDbValue($rs->fields('C_FAX'));
		$usersadmin->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$usersadmin->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $usersadmin;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_NGUOIDUNG_ID=" . urlencode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue);
		$this->AddUrl = $usersadmin->AddUrl();
		$this->EditUrl = $usersadmin->EditUrl();
		$this->CopyUrl = $usersadmin->CopyUrl();
		$this->DeleteUrl = $usersadmin->DeleteUrl();
		$this->ListUrl = $usersadmin->ListUrl();

		// Call Row_Rendering event
		$usersadmin->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$usersadmin->C_TENDANGNHAP->CellCssStyle = ""; $usersadmin->C_TENDANGNHAP->CellCssClass = "";
		$usersadmin->C_TENDANGNHAP->CellAttrs = array(); $usersadmin->C_TENDANGNHAP->ViewAttrs = array(); $usersadmin->C_TENDANGNHAP->EditAttrs = array();

		// C_HOTEN
		$usersadmin->C_HOTEN->CellCssStyle = ""; $usersadmin->C_HOTEN->CellCssClass = "";
		$usersadmin->C_HOTEN->CellAttrs = array(); $usersadmin->C_HOTEN->ViewAttrs = array(); $usersadmin->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$usersadmin->C_DIACHI->CellCssStyle = ""; $usersadmin->C_DIACHI->CellCssClass = "";
		$usersadmin->C_DIACHI->CellAttrs = array(); $usersadmin->C_DIACHI->ViewAttrs = array(); $usersadmin->C_DIACHI->EditAttrs = array();

		// C_TEL
		$usersadmin->C_TEL->CellCssStyle = ""; $usersadmin->C_TEL->CellCssClass = "";
		$usersadmin->C_TEL->CellAttrs = array(); $usersadmin->C_TEL->ViewAttrs = array(); $usersadmin->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$usersadmin->C_TEL_HOME->CellCssStyle = ""; $usersadmin->C_TEL_HOME->CellCssClass = "";
		$usersadmin->C_TEL_HOME->CellAttrs = array(); $usersadmin->C_TEL_HOME->ViewAttrs = array(); $usersadmin->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$usersadmin->C_TEL_MOBILE->CellCssStyle = ""; $usersadmin->C_TEL_MOBILE->CellCssClass = "";
		$usersadmin->C_TEL_MOBILE->CellAttrs = array(); $usersadmin->C_TEL_MOBILE->ViewAttrs = array(); $usersadmin->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$usersadmin->C_FAX->CellCssStyle = ""; $usersadmin->C_FAX->CellCssClass = "";
		$usersadmin->C_FAX->CellAttrs = array(); $usersadmin->C_FAX->ViewAttrs = array(); $usersadmin->C_FAX->EditAttrs = array();

		// C_EMAIL
		$usersadmin->C_EMAIL->CellCssStyle = ""; $usersadmin->C_EMAIL->CellCssClass = "";
		$usersadmin->C_EMAIL->CellAttrs = array(); $usersadmin->C_EMAIL->ViewAttrs = array(); $usersadmin->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$usersadmin->FK_USERLEVELID->CellCssStyle = ""; $usersadmin->FK_USERLEVELID->CellCssClass = "";
		$usersadmin->FK_USERLEVELID->CellAttrs = array(); $usersadmin->FK_USERLEVELID->ViewAttrs = array(); $usersadmin->FK_USERLEVELID->EditAttrs = array();
		if ($usersadmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$usersadmin->PK_NGUOIDUNG_ID->ViewValue = $usersadmin->PK_NGUOIDUNG_ID->CurrentValue;
			$usersadmin->PK_NGUOIDUNG_ID->CssStyle = "";
			$usersadmin->PK_NGUOIDUNG_ID->CssClass = "";
			$usersadmin->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->ViewValue = $usersadmin->C_TENDANGNHAP->CurrentValue;
			$usersadmin->C_TENDANGNHAP->CssStyle = "";
			$usersadmin->C_TENDANGNHAP->CssClass = "";
			$usersadmin->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->ViewValue = "********";
			$usersadmin->C_MATKHAU->CssStyle = "";
			$usersadmin->C_MATKHAU->CssClass = "";
			$usersadmin->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$usersadmin->FK_MACONGTY->ViewValue = $usersadmin->FK_MACONGTY->CurrentValue;
			$usersadmin->FK_MACONGTY->CssStyle = "";
			$usersadmin->FK_MACONGTY->CssClass = "";
			$usersadmin->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->ViewValue = $usersadmin->C_HOTEN->CurrentValue;
			$usersadmin->C_HOTEN->CssStyle = "";
			$usersadmin->C_HOTEN->CssClass = "";
			$usersadmin->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->ViewValue = $usersadmin->C_DIACHI->CurrentValue;
			$usersadmin->C_DIACHI->CssStyle = "";
			$usersadmin->C_DIACHI->CssClass = "";
			$usersadmin->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$usersadmin->C_TEL->ViewValue = $usersadmin->C_TEL->CurrentValue;
			$usersadmin->C_TEL->CssStyle = "";
			$usersadmin->C_TEL->CssClass = "";
			$usersadmin->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->ViewValue = $usersadmin->C_TEL_HOME->CurrentValue;
			$usersadmin->C_TEL_HOME->CssStyle = "";
			$usersadmin->C_TEL_HOME->CssClass = "";
			$usersadmin->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->ViewValue = $usersadmin->C_TEL_MOBILE->CurrentValue;
			$usersadmin->C_TEL_MOBILE->CssStyle = "";
			$usersadmin->C_TEL_MOBILE->CssClass = "";
			$usersadmin->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$usersadmin->C_FAX->ViewValue = $usersadmin->C_FAX->CurrentValue;
			$usersadmin->C_FAX->CssStyle = "";
			$usersadmin->C_FAX->CssClass = "";
			$usersadmin->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->ViewValue = $usersadmin->C_EMAIL->CurrentValue;
			$usersadmin->C_EMAIL->CssStyle = "";
			$usersadmin->C_EMAIL->CssClass = "";
			$usersadmin->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($usersadmin->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($usersadmin->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$usersadmin->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$usersadmin->FK_USERLEVELID->ViewValue = $usersadmin->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$usersadmin->FK_USERLEVELID->ViewValue = NULL;
			}
			$usersadmin->FK_USERLEVELID->CssStyle = "";
			$usersadmin->FK_USERLEVELID->CssClass = "";
			$usersadmin->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->HrefValue = "";
			$usersadmin->C_TENDANGNHAP->TooltipValue = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->HrefValue = "";
			$usersadmin->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->HrefValue = "";
			$usersadmin->C_DIACHI->TooltipValue = "";

			// C_TEL
			$usersadmin->C_TEL->HrefValue = "";
			$usersadmin->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->HrefValue = "";
			$usersadmin->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->HrefValue = "";
			$usersadmin->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$usersadmin->C_FAX->HrefValue = "";
			$usersadmin->C_FAX->TooltipValue = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->HrefValue = "";
			$usersadmin->C_EMAIL->TooltipValue = "";

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->HrefValue = "";
			$usersadmin->FK_USERLEVELID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($usersadmin->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$usersadmin->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $usersadmin;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $usersadmin->SelectRecordCount();
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
		if ($usersadmin->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($usersadmin, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($usersadmin->PK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($usersadmin->C_TENDANGNHAP);
				$ExportDoc->ExportCaption($usersadmin->C_MATKHAU);
				$ExportDoc->ExportCaption($usersadmin->FK_MACONGTY);
				$ExportDoc->ExportCaption($usersadmin->C_HOTEN);
				$ExportDoc->ExportCaption($usersadmin->C_DIACHI);
				$ExportDoc->ExportCaption($usersadmin->C_TEL);
				$ExportDoc->ExportCaption($usersadmin->C_TEL_HOME);
				$ExportDoc->ExportCaption($usersadmin->C_TEL_MOBILE);
				$ExportDoc->ExportCaption($usersadmin->C_FAX);
				$ExportDoc->ExportCaption($usersadmin->C_EMAIL);
				$ExportDoc->ExportCaption($usersadmin->FK_USERLEVELID);
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
				$usersadmin->CssClass = "";
				$usersadmin->CssStyle = "";
				$usersadmin->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($usersadmin->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGUOIDUNG_ID', $usersadmin->PK_NGUOIDUNG_ID->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TENDANGNHAP', $usersadmin->C_TENDANGNHAP->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_MATKHAU', $usersadmin->C_MATKHAU->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $usersadmin->FK_MACONGTY->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_HOTEN', $usersadmin->C_HOTEN->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_DIACHI', $usersadmin->C_DIACHI->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL', $usersadmin->C_TEL->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_HOME', $usersadmin->C_TEL_HOME->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_MOBILE', $usersadmin->C_TEL_MOBILE->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_FAX', $usersadmin->C_FAX->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $usersadmin->C_EMAIL->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
					$XmlDoc->AddField('FK_USERLEVELID', $usersadmin->FK_USERLEVELID->ExportValue($usersadmin->Export, $usersadmin->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($usersadmin->PK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($usersadmin->C_TENDANGNHAP);
					$ExportDoc->ExportField($usersadmin->C_MATKHAU);
					$ExportDoc->ExportField($usersadmin->FK_MACONGTY);
					$ExportDoc->ExportField($usersadmin->C_HOTEN);
					$ExportDoc->ExportField($usersadmin->C_DIACHI);
					$ExportDoc->ExportField($usersadmin->C_TEL);
					$ExportDoc->ExportField($usersadmin->C_TEL_HOME);
					$ExportDoc->ExportField($usersadmin->C_TEL_MOBILE);
					$ExportDoc->ExportField($usersadmin->C_FAX);
					$ExportDoc->ExportField($usersadmin->C_EMAIL);
					$ExportDoc->ExportField($usersadmin->FK_USERLEVELID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($usersadmin->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($usersadmin->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($usersadmin->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($usersadmin->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($usersadmin->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $usersadmin;
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
		if ($usersadmin->Email_Sending($Email, $EventArgs))
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
		global $usersadmin;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($usersadmin->KeyUrl("", ""), 1);
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
