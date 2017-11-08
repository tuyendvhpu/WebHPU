<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userinfo.php" ?>
<?php include "t_nguoidunginfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
Header ("Location: http://acc.hpu.edu.vn/");
?>
<?php

// Create page object
$user_view = new cuser_view();
$Page =& $user_view;

// Page init
$user_view->Page_Init();

// Page main
$user_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_view = new ew_Page("user_view");

// page properties
user_view.PageID = "view"; // page ID
user_view.FormID = "fuserview"; // form ID
var EW_PAGE_ID = user_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_view.ValidateRequired = false; // no JavaScript validation
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
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $user->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<?php if ($user->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $user_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_user" id="emf_user" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_user',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($user_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($user->Export == "") { ?>

<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $user_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$user_view->ShowMessage();
?>
<p>
<?php if ($user->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_view->Pager)) $user_view->Pager = new cNumericPager($user_view->lStartRec, $user_view->lDisplayRecs, $user_view->lTotalRecs, $user_view->lRecRange) ?>
<?php if ($user_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_view->sSrchWhere == "0=101") { ?>
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
<?php if ($user->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $user->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TENDANGNHAP->FldCaption() ?></td>
		<td<?php echo $user->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $user->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $user->C_TENDANGNHAP->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->FK_MACONGTY->CurrentValue <> 0) { // FK_MACONGTY ?>
	<tr<?php echo $user->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->FK_MACONGTY->FldCaption() ?></td>
		<td<?php echo $user->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $user->FK_MACONGTY->ViewAttributes() ?>><?php echo $user->FK_MACONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $user->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_HOTEN->FldCaption() ?></td>
		<td<?php echo $user->C_HOTEN->CellAttributes() ?>>
<div<?php echo $user->C_HOTEN->ViewAttributes() ?>><?php echo $user->C_HOTEN->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $user->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $user->C_DIACHI->CellAttributes() ?>>
<div<?php echo $user->C_DIACHI->ViewAttributes() ?>><?php echo $user->C_DIACHI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $user->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL->FldCaption() ?></td>
		<td<?php echo $user->C_TEL->CellAttributes() ?>>
<div<?php echo $user->C_TEL->ViewAttributes() ?>><?php echo $user->C_TEL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $user->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $user->C_TEL_HOME->CellAttributes() ?>>
<div<?php echo $user->C_TEL_HOME->ViewAttributes() ?>><?php echo $user->C_TEL_HOME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $user->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $user->C_TEL_MOBILE->CellAttributes() ?>>
<div<?php echo $user->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $user->C_TEL_MOBILE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $user->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_FAX->FldCaption() ?></td>
		<td<?php echo $user->C_FAX->CellAttributes() ?>>
<div<?php echo $user->C_FAX->ViewAttributes() ?>><?php echo $user->C_FAX->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $user->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $user->C_EMAIL->CellAttributes() ?>>
<div<?php echo $user->C_EMAIL->ViewAttributes() ?>><?php echo $user->C_EMAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $user->FK_USERLEVELID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->FK_USERLEVELID->FldCaption() ?></td>
		<td<?php echo $user->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $user->FK_USERLEVELID->ViewAttributes() ?>><?php echo $user->FK_USERLEVELID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($user->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_view->Pager)) $user_view->Pager = new cNumericPager($user_view->lStartRec, $user_view->lDisplayRecs, $user_view->lTotalRecs, $user_view->lRecRange) ?>
<?php if ($user_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_view->sSrchWhere == "0=101") { ?>
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
<?php if ($user->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$user_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cuser_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'user';

	// Page object name
	var $PageObjName = 'user_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // Add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cuser_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (user)
		$GLOBALS["user"] = new cuser();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

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
		global $user;

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
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$user->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$user->Export = $_POST["exporttype"];
		} else {
			$user->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $user->Export; // Get export parameter, used in header
		$gsExportFile = $user->TableVar; // Get export file, used in header
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_NGUOIDUNG_ID"]);
		}
		if (in_array($user->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($user->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($user->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($user->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($user->Export == "csv") {
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
		global $Language, $user;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
				$user->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
				$this->arRecKey["PK_NGUOIDUNG_ID"] = $user->PK_NGUOIDUNG_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$user->CurrentAction = "I"; // Display form
			switch ($user->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("userlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($user->PK_NGUOIDUNG_ID->CurrentValue) == strval($rs->fields('PK_NGUOIDUNG_ID'))) {
								$user->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "userlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($user->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($user->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "userlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$user->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $user;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user;

		// Call Recordset Selecting event
		$user->Recordset_Selecting($user->CurrentFilter);

		// Load List page SQL
		$sSql = $user->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$user->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load SQL based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$user->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $user;
		$user->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$user->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$user->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$user->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$user->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$user->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$user->C_TEL->setDbValue($rs->fields('C_TEL'));
		$user->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$user->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$user->C_FAX->setDbValue($rs->fields('C_FAX'));
		$user->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$user->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $user;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_NGUOIDUNG_ID=" . urlencode($user->PK_NGUOIDUNG_ID->CurrentValue);
		$this->AddUrl = $user->AddUrl();
		$this->EditUrl = $user->EditUrl();
		$this->CopyUrl = $user->CopyUrl();
		$this->DeleteUrl = $user->DeleteUrl();
		$this->ListUrl = $user->ListUrl();

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$user->C_TENDANGNHAP->CellCssStyle = ""; $user->C_TENDANGNHAP->CellCssClass = "";
		$user->C_TENDANGNHAP->CellAttrs = array(); $user->C_TENDANGNHAP->ViewAttrs = array(); $user->C_TENDANGNHAP->EditAttrs = array();

		// FK_MACONGTY
		$user->FK_MACONGTY->CellCssStyle = ""; $user->FK_MACONGTY->CellCssClass = "";
		$user->FK_MACONGTY->CellAttrs = array(); $user->FK_MACONGTY->ViewAttrs = array(); $user->FK_MACONGTY->EditAttrs = array();

		// C_HOTEN
		$user->C_HOTEN->CellCssStyle = ""; $user->C_HOTEN->CellCssClass = "";
		$user->C_HOTEN->CellAttrs = array(); $user->C_HOTEN->ViewAttrs = array(); $user->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$user->C_DIACHI->CellCssStyle = ""; $user->C_DIACHI->CellCssClass = "";
		$user->C_DIACHI->CellAttrs = array(); $user->C_DIACHI->ViewAttrs = array(); $user->C_DIACHI->EditAttrs = array();

		// C_TEL
		$user->C_TEL->CellCssStyle = ""; $user->C_TEL->CellCssClass = "";
		$user->C_TEL->CellAttrs = array(); $user->C_TEL->ViewAttrs = array(); $user->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$user->C_TEL_HOME->CellCssStyle = ""; $user->C_TEL_HOME->CellCssClass = "";
		$user->C_TEL_HOME->CellAttrs = array(); $user->C_TEL_HOME->ViewAttrs = array(); $user->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$user->C_TEL_MOBILE->CellCssStyle = ""; $user->C_TEL_MOBILE->CellCssClass = "";
		$user->C_TEL_MOBILE->CellAttrs = array(); $user->C_TEL_MOBILE->ViewAttrs = array(); $user->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$user->C_FAX->CellCssStyle = ""; $user->C_FAX->CellCssClass = "";
		$user->C_FAX->CellAttrs = array(); $user->C_FAX->ViewAttrs = array(); $user->C_FAX->EditAttrs = array();

		// C_EMAIL
		$user->C_EMAIL->CellCssStyle = ""; $user->C_EMAIL->CellCssClass = "";
		$user->C_EMAIL->CellAttrs = array(); $user->C_EMAIL->ViewAttrs = array(); $user->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$user->FK_USERLEVELID->CellCssStyle = ""; $user->FK_USERLEVELID->CellCssClass = "";
		$user->FK_USERLEVELID->CellAttrs = array(); $user->FK_USERLEVELID->ViewAttrs = array(); $user->FK_USERLEVELID->EditAttrs = array();
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$user->PK_NGUOIDUNG_ID->ViewValue = $user->PK_NGUOIDUNG_ID->CurrentValue;
			$user->PK_NGUOIDUNG_ID->CssStyle = "";
			$user->PK_NGUOIDUNG_ID->CssClass = "";
			$user->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->ViewValue = $user->C_TENDANGNHAP->CurrentValue;
			$user->C_TENDANGNHAP->CssStyle = "";
			$user->C_TENDANGNHAP->CssClass = "";
			$user->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$user->C_MATKHAU->ViewValue = $user->C_MATKHAU->CurrentValue;
			$user->C_MATKHAU->CssStyle = "";
			$user->C_MATKHAU->CssClass = "";
			$user->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$user->FK_MACONGTY->ViewValue = $user->FK_MACONGTY->CurrentValue;
			if (strval($user->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($user->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$user->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$user->FK_MACONGTY->ViewValue = $user->FK_MACONGTY->CurrentValue;
				}
			} else {
				$user->FK_MACONGTY->ViewValue = NULL;
			}
			$user->FK_MACONGTY->CssStyle = "";
			$user->FK_MACONGTY->CssClass = "";
			$user->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$user->C_HOTEN->ViewValue = $user->C_HOTEN->CurrentValue;
			$user->C_HOTEN->CssStyle = "";
			$user->C_HOTEN->CssClass = "";
			$user->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$user->C_DIACHI->ViewValue = $user->C_DIACHI->CurrentValue;
			$user->C_DIACHI->CssStyle = "";
			$user->C_DIACHI->CssClass = "";
			$user->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$user->C_TEL->ViewValue = $user->C_TEL->CurrentValue;
			$user->C_TEL->CssStyle = "";
			$user->C_TEL->CssClass = "";
			$user->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$user->C_TEL_HOME->ViewValue = $user->C_TEL_HOME->CurrentValue;
			$user->C_TEL_HOME->CssStyle = "";
			$user->C_TEL_HOME->CssClass = "";
			$user->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->ViewValue = $user->C_TEL_MOBILE->CurrentValue;
			$user->C_TEL_MOBILE->CssStyle = "";
			$user->C_TEL_MOBILE->CssClass = "";
			$user->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$user->C_FAX->ViewValue = $user->C_FAX->CurrentValue;
			$user->C_FAX->CssStyle = "";
			$user->C_FAX->CssClass = "";
			$user->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$user->C_EMAIL->ViewValue = $user->C_EMAIL->CurrentValue;
			$user->C_EMAIL->CssStyle = "";
			$user->C_EMAIL->CssClass = "";
			$user->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($user->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($user->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$user->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$user->FK_USERLEVELID->ViewValue = $user->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$user->FK_USERLEVELID->ViewValue = NULL;
			}
			$user->FK_USERLEVELID->CssStyle = "";
			$user->FK_USERLEVELID->CssClass = "";
			$user->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->HrefValue = "";
			$user->C_TENDANGNHAP->TooltipValue = "";

			// FK_MACONGTY
			$user->FK_MACONGTY->HrefValue = "";
			$user->FK_MACONGTY->TooltipValue = "";

			// C_HOTEN
			$user->C_HOTEN->HrefValue = "";
			$user->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$user->C_DIACHI->HrefValue = "";
			$user->C_DIACHI->TooltipValue = "";

			// C_TEL
			$user->C_TEL->HrefValue = "";
			$user->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$user->C_TEL_HOME->HrefValue = "";
			$user->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->HrefValue = "";
			$user->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$user->C_FAX->HrefValue = "";
			$user->C_FAX->TooltipValue = "";

			// C_EMAIL
			$user->C_EMAIL->HrefValue = "";
			$user->C_EMAIL->TooltipValue = "";

			// FK_USERLEVELID
			$user->FK_USERLEVELID->HrefValue = "";
			$user->FK_USERLEVELID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($user->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$user->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $user;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $user->SelectRecordCount();
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
		if ($user->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($user, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($user->PK_NGUOIDUNG_ID);
				$ExportDoc->ExportCaption($user->C_TENDANGNHAP);
				$ExportDoc->ExportCaption($user->C_MATKHAU);
				$ExportDoc->ExportCaption($user->FK_MACONGTY);
				$ExportDoc->ExportCaption($user->C_HOTEN);
				$ExportDoc->ExportCaption($user->C_DIACHI);
				$ExportDoc->ExportCaption($user->C_TEL);
				$ExportDoc->ExportCaption($user->C_TEL_HOME);
				$ExportDoc->ExportCaption($user->C_TEL_MOBILE);
				$ExportDoc->ExportCaption($user->C_FAX);
				$ExportDoc->ExportCaption($user->C_EMAIL);
				$ExportDoc->ExportCaption($user->FK_USERLEVELID);
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
				$user->CssClass = "";
				$user->CssStyle = "";
				$user->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($user->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGUOIDUNG_ID', $user->PK_NGUOIDUNG_ID->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_TENDANGNHAP', $user->C_TENDANGNHAP->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_MATKHAU', $user->C_MATKHAU->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $user->FK_MACONGTY->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_HOTEN', $user->C_HOTEN->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_DIACHI', $user->C_DIACHI->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL', $user->C_TEL->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_HOME', $user->C_TEL_HOME->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_TEL_MOBILE', $user->C_TEL_MOBILE->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_FAX', $user->C_FAX->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('C_EMAIL', $user->C_EMAIL->ExportValue($user->Export, $user->ExportOriginalValue));
					$XmlDoc->AddField('FK_USERLEVELID', $user->FK_USERLEVELID->ExportValue($user->Export, $user->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($user->PK_NGUOIDUNG_ID);
					$ExportDoc->ExportField($user->C_TENDANGNHAP);
					$ExportDoc->ExportField($user->C_MATKHAU);
					$ExportDoc->ExportField($user->FK_MACONGTY);
					$ExportDoc->ExportField($user->C_HOTEN);
					$ExportDoc->ExportField($user->C_DIACHI);
					$ExportDoc->ExportField($user->C_TEL);
					$ExportDoc->ExportField($user->C_TEL_HOME);
					$ExportDoc->ExportField($user->C_TEL_MOBILE);
					$ExportDoc->ExportField($user->C_FAX);
					$ExportDoc->ExportField($user->C_EMAIL);
					$ExportDoc->ExportField($user->FK_USERLEVELID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($user->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($user->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($user->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($user->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($user->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $user;
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
		if ($user->Email_Sending($Email, $EventArgs))
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
		global $user;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($user->KeyUrl("", ""), 1);
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
