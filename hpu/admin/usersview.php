<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersinfo.php" ?>
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
$users_view = new cusers_view();
$Page =& $users_view;

// Page init
$users_view->Page_Init();

// Page main
$users_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($users->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var users_view = new ew_Page("users_view");

// page properties
users_view.PageID = "view"; // page ID
users_view.FormID = "fusersview"; // form ID
var EW_PAGE_ID = users_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
users_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
users_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
users_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
users_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $users->TableCaption() ?>
<?php if ($users->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $users_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_users" id="emf_users" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_users',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($users_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($users->Export == "") { ?>
<a href="<?php echo $users_view->ListUrl ?>"><?php echo $Language->Phrase("GoBack") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $users_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $users_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $users_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$users_view->ShowMessage();
?>
<p>
<?php if ($users->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($users_view->Pager)) $users_view->Pager = new cNumericPager($users_view->lStartRec, $users_view->lDisplayRecs, $users_view->lTotalRecs, $users_view->lRecRange) ?>
<?php if ($users_view->Pager->RecordCount > 0) { ?>
	<?php if ($users_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($users_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($users_view->sSrchWhere == "0=101") { ?>
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
<?php if ($users->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $users->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TENDANGNHAP->FldCaption() ?></td>
		<td<?php echo $users->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $users->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $users->C_TENDANGNHAP->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
	<tr<?php echo $users->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->FK_MACONGTY->FldCaption() ?></td>
		<td<?php echo $users->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $users->FK_MACONGTY->ViewAttributes() ?>><?php echo $users->FK_MACONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $users->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_HOTEN->FldCaption() ?></td>
		<td<?php echo $users->C_HOTEN->CellAttributes() ?>>
<div<?php echo $users->C_HOTEN->ViewAttributes() ?>><?php echo $users->C_HOTEN->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $users->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $users->C_DIACHI->CellAttributes() ?>>
<div<?php echo $users->C_DIACHI->ViewAttributes() ?>><?php echo $users->C_DIACHI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $users->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL->FldCaption() ?></td>
		<td<?php echo $users->C_TEL->CellAttributes() ?>>
<div<?php echo $users->C_TEL->ViewAttributes() ?>><?php echo $users->C_TEL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $users->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $users->C_TEL_HOME->CellAttributes() ?>>
<div<?php echo $users->C_TEL_HOME->ViewAttributes() ?>><?php echo $users->C_TEL_HOME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $users->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $users->C_TEL_MOBILE->CellAttributes() ?>>
<div<?php echo $users->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $users->C_TEL_MOBILE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $users->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_FAX->FldCaption() ?></td>
		<td<?php echo $users->C_FAX->CellAttributes() ?>>
<div<?php echo $users->C_FAX->ViewAttributes() ?>><?php echo $users->C_FAX->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $users->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $users->C_EMAIL->CellAttributes() ?>>
<div<?php echo $users->C_EMAIL->ViewAttributes() ?>><?php echo $users->C_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($users->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $users->FK_USERLEVELID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->FK_USERLEVELID->FldCaption() ?></td>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $users->FK_USERLEVELID->ViewAttributes() ?>><?php echo $users->FK_USERLEVELID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($users->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($users_view->Pager)) $users_view->Pager = new cNumericPager($users_view->lStartRec, $users_view->lDisplayRecs, $users_view->lTotalRecs, $users_view->lRecRange) ?>
<?php if ($users_view->Pager->RecordCount > 0) { ?>
	<?php if ($users_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($users_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($users_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $users_view->PageUrl() ?>start=<?php echo $users_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($users_view->sSrchWhere == "0=101") { ?>
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
<?php if ($users->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$users_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cusers_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'users';

	// Page object name
	var $PageObjName = 'users_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $users;
		if ($users->UseTokenInUrl) $PageUrl .= "t=" . $users->TableVar . "&"; // Add page token
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
		global $objForm, $users;
		if ($users->UseTokenInUrl) {
			if ($objForm)
				return ($users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusers_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (users)
		$GLOBALS["users"] = new cusers();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'users', TRUE);

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
		global $users;

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
			$this->Page_Terminate("userslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$users->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$users->Export = $_POST["exporttype"];
		} else {
			$users->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $users->Export; // Get export parameter, used in header
		$gsExportFile = $users->TableVar; // Get export file, used in header
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_NGUOIDUNG_ID"]);
		}
		if (in_array($users->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($users->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($users->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($users->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($users->Export == "csv") {
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
		global $Language, $users;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
				$users->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
				$this->arRecKey["PK_NGUOIDUNG_ID"] = $users->PK_NGUOIDUNG_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$users->CurrentAction = "I"; // Display form
			switch ($users->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("userslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($users->PK_NGUOIDUNG_ID->CurrentValue) == strval($rs->fields('PK_NGUOIDUNG_ID'))) {
								$users->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "userslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($users->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($users->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "userslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$users->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $users;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$users->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$users->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $users->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$users->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$users->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$users->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $users;

		// Call Recordset Selecting event
		$users->Recordset_Selecting($users->CurrentFilter);

		// Load List page SQL
		$sSql = $users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $users;
		$sFilter = $users->KeyFilter();

		// Call Row Selecting event
		$users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$users->CurrentFilter = $sFilter;
		$sSql = $users->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$users->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $users;
		$users->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$users->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$users->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$users->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$users->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$users->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$users->C_TEL->setDbValue($rs->fields('C_TEL'));
		$users->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$users->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$users->C_FAX->setDbValue($rs->fields('C_FAX'));
		$users->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$users->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $users;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_NGUOIDUNG_ID=" . urlencode($users->PK_NGUOIDUNG_ID->CurrentValue);
		$this->AddUrl = $users->AddUrl();
		$this->EditUrl = $users->EditUrl();
		$this->CopyUrl = $users->CopyUrl();
		$this->DeleteUrl = $users->DeleteUrl();
		$this->ListUrl = $users->ListUrl();

		// Call Row_Rendering event
		$users->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$users->C_TENDANGNHAP->CellCssStyle = ""; $users->C_TENDANGNHAP->CellCssClass = "";
		$users->C_TENDANGNHAP->CellAttrs = array(); $users->C_TENDANGNHAP->ViewAttrs = array(); $users->C_TENDANGNHAP->EditAttrs = array();

		// FK_MACONGTY
		$users->FK_MACONGTY->CellCssStyle = ""; $users->FK_MACONGTY->CellCssClass = "";
		$users->FK_MACONGTY->CellAttrs = array(); $users->FK_MACONGTY->ViewAttrs = array(); $users->FK_MACONGTY->EditAttrs = array();

		// C_HOTEN
		$users->C_HOTEN->CellCssStyle = ""; $users->C_HOTEN->CellCssClass = "";
		$users->C_HOTEN->CellAttrs = array(); $users->C_HOTEN->ViewAttrs = array(); $users->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$users->C_DIACHI->CellCssStyle = ""; $users->C_DIACHI->CellCssClass = "";
		$users->C_DIACHI->CellAttrs = array(); $users->C_DIACHI->ViewAttrs = array(); $users->C_DIACHI->EditAttrs = array();

		// C_TEL
		$users->C_TEL->CellCssStyle = ""; $users->C_TEL->CellCssClass = "";
		$users->C_TEL->CellAttrs = array(); $users->C_TEL->ViewAttrs = array(); $users->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$users->C_TEL_HOME->CellCssStyle = ""; $users->C_TEL_HOME->CellCssClass = "";
		$users->C_TEL_HOME->CellAttrs = array(); $users->C_TEL_HOME->ViewAttrs = array(); $users->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$users->C_TEL_MOBILE->CellCssStyle = ""; $users->C_TEL_MOBILE->CellCssClass = "";
		$users->C_TEL_MOBILE->CellAttrs = array(); $users->C_TEL_MOBILE->ViewAttrs = array(); $users->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$users->C_FAX->CellCssStyle = ""; $users->C_FAX->CellCssClass = "";
		$users->C_FAX->CellAttrs = array(); $users->C_FAX->ViewAttrs = array(); $users->C_FAX->EditAttrs = array();

		// C_EMAIL
		$users->C_EMAIL->CellCssStyle = ""; $users->C_EMAIL->CellCssClass = "";
		$users->C_EMAIL->CellAttrs = array(); $users->C_EMAIL->ViewAttrs = array(); $users->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$users->FK_USERLEVELID->CellCssStyle = ""; $users->FK_USERLEVELID->CellCssClass = "";
		$users->FK_USERLEVELID->CellAttrs = array(); $users->FK_USERLEVELID->ViewAttrs = array(); $users->FK_USERLEVELID->EditAttrs = array();
		if ($users->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$users->PK_NGUOIDUNG_ID->ViewValue = $users->PK_NGUOIDUNG_ID->CurrentValue;
			$users->PK_NGUOIDUNG_ID->CssStyle = "";
			$users->PK_NGUOIDUNG_ID->CssClass = "";
			$users->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->ViewValue = $users->C_TENDANGNHAP->CurrentValue;
			$users->C_TENDANGNHAP->CssStyle = "";
			$users->C_TENDANGNHAP->CssClass = "";
			$users->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$users->C_MATKHAU->ViewValue = "********";
			$users->C_MATKHAU->CssStyle = "";
			$users->C_MATKHAU->CssClass = "";
			$users->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($users->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($users->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$users->FK_MACONGTY->ViewValue = $users->FK_MACONGTY->CurrentValue;
				}
			} else {
				$users->FK_MACONGTY->ViewValue = NULL;
			}
			$users->FK_MACONGTY->CssStyle = "";
			$users->FK_MACONGTY->CssClass = "";
			$users->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$users->C_HOTEN->ViewValue = $users->C_HOTEN->CurrentValue;
			$users->C_HOTEN->CssStyle = "";
			$users->C_HOTEN->CssClass = "";
			$users->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$users->C_DIACHI->ViewValue = $users->C_DIACHI->CurrentValue;
			$users->C_DIACHI->CssStyle = "";
			$users->C_DIACHI->CssClass = "";
			$users->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$users->C_TEL->ViewValue = $users->C_TEL->CurrentValue;
			$users->C_TEL->CssStyle = "";
			$users->C_TEL->CssClass = "";
			$users->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->ViewValue = $users->C_TEL_HOME->CurrentValue;
			$users->C_TEL_HOME->CssStyle = "";
			$users->C_TEL_HOME->CssClass = "";
			$users->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->ViewValue = $users->C_TEL_MOBILE->CurrentValue;
			$users->C_TEL_MOBILE->CssStyle = "";
			$users->C_TEL_MOBILE->CssClass = "";
			$users->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$users->C_FAX->ViewValue = $users->C_FAX->CurrentValue;
			$users->C_FAX->CssStyle = "";
			$users->C_FAX->CssClass = "";
			$users->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$users->C_EMAIL->ViewValue = $users->C_EMAIL->CurrentValue;
			$users->C_EMAIL->CssStyle = "";
			$users->C_EMAIL->CssClass = "";
			$users->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($users->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($users->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$users->FK_USERLEVELID->ViewValue = $users->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$users->FK_USERLEVELID->ViewValue = NULL;
			}
			$users->FK_USERLEVELID->CssStyle = "";
			$users->FK_USERLEVELID->CssClass = "";
			$users->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->HrefValue = "";
			$users->C_TENDANGNHAP->TooltipValue = "";

			// FK_MACONGTY
			$users->FK_MACONGTY->HrefValue = "";
			$users->FK_MACONGTY->TooltipValue = "";

			// C_HOTEN
			$users->C_HOTEN->HrefValue = "";
			$users->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$users->C_DIACHI->HrefValue = "";
			$users->C_DIACHI->TooltipValue = "";

			// C_TEL
			$users->C_TEL->HrefValue = "";
			$users->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->HrefValue = "";
			$users->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->HrefValue = "";
			$users->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$users->C_FAX->HrefValue = "";
			$users->C_FAX->TooltipValue = "";

			// C_EMAIL
			$users->C_EMAIL->HrefValue = "";
			$users->C_EMAIL->TooltipValue = "";

			// FK_USERLEVELID
			$users->FK_USERLEVELID->HrefValue = "";
			$users->FK_USERLEVELID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($users->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$users->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $users;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $users->SelectRecordCount();
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
		if ($users->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($users, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($users->PK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($users->C_TENDANGNHAP);
				$ExportDoc->ExportCaption($users->C_MATKHAU);
				$ExportDoc->ExportCaption($users->FK_MACONGTY);
				$ExportDoc->ExportCaption($users->C_HOTEN);
				$ExportDoc->ExportCaption($users->C_DIACHI);
				$ExportDoc->ExportCaption($users->C_TEL);
				$ExportDoc->ExportCaption($users->C_TEL_HOME);
				$ExportDoc->ExportCaption($users->C_TEL_MOBILE);
				$ExportDoc->ExportCaption($users->C_FAX);
				$ExportDoc->ExportCaption($users->C_EMAIL);
				$ExportDoc->ExportCaption($users->FK_USERLEVELID);
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
				$users->CssClass = "";
				$users->CssStyle = "";
				$users->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($users->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGUOIDUNG_ID', $users->PK_NGUOIDUNG_ID->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TENDANGNHAP', $users->C_TENDANGNHAP->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_MATKHAU', $users->C_MATKHAU->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $users->FK_MACONGTY->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_HOTEN', $users->C_HOTEN->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_DIACHI', $users->C_DIACHI->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL', $users->C_TEL->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_HOME', $users->C_TEL_HOME->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_MOBILE', $users->C_TEL_MOBILE->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_FAX', $users->C_FAX->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $users->C_EMAIL->ExportValue($users->Export, $users->ExportOriginalValue));
					$XmlDoc->AddField('FK_USERLEVELID', $users->FK_USERLEVELID->ExportValue($users->Export, $users->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($users->PK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($users->C_TENDANGNHAP);
					$ExportDoc->ExportField($users->C_MATKHAU);
					$ExportDoc->ExportField($users->FK_MACONGTY);
					$ExportDoc->ExportField($users->C_HOTEN);
					$ExportDoc->ExportField($users->C_DIACHI);
					$ExportDoc->ExportField($users->C_TEL);
					$ExportDoc->ExportField($users->C_TEL_HOME);
					$ExportDoc->ExportField($users->C_TEL_MOBILE);
					$ExportDoc->ExportField($users->C_FAX);
					$ExportDoc->ExportField($users->C_EMAIL);
					$ExportDoc->ExportField($users->FK_USERLEVELID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($users->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($users->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($users->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($users->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($users->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $users;
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
		if ($users->Email_Sending($Email, $EventArgs))
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
		global $users;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($users->KeyUrl("", ""), 1);
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
