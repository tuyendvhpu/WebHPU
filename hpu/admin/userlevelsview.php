<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userlevels_view = new cuserlevels_view();
$Page =& $userlevels_view;

// Page init
$userlevels_view->Page_Init();

// Page main
$userlevels_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userlevels->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_view = new ew_Page("userlevels_view");

// page properties
userlevels_view.PageID = "view"; // page ID
userlevels_view.FormID = "fuserlevelsview"; // form ID
var EW_PAGE_ID = userlevels_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevels_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_view.ValidateRequired = false; // no JavaScript validation
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
								<?php //echo $Language->Phrase("TblTypeTABLE") ?><?php echo $userlevels->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<?php if ($userlevels->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $userlevels_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_userlevels" id="emf_userlevels" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_userlevels',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($userlevels_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($userlevels->Export == "") { ?>
<a href="<?php echo $userlevels_view->ListUrl ?>"><?php echo $Language->Phrase("GoBack") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $userlevels_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $userlevels_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $userlevels_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userlevels_view->ShowMessage();
?>
<p>
<?php if ($userlevels->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_view->Pager)) $userlevels_view->Pager = new cNumericPager($userlevels_view->lStartRec, $userlevels_view->lDisplayRecs, $userlevels_view->lTotalRecs, $userlevels_view->lRecRange) ?>
<?php if ($userlevels_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_view->sSrchWhere == "0=101") { ?>
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
<?php if ($userlevels->userlevelid->Visible) { // userlevelid ?>
	<tr<?php echo $userlevels->userlevelid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userlevels->userlevelid->FldCaption() ?></td>
		<td<?php echo $userlevels->userlevelid->CellAttributes() ?>>
<div<?php echo $userlevels->userlevelid->ViewAttributes() ?>><?php echo $userlevels->userlevelid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userlevels->userlevelname->Visible) { // userlevelname ?>
	<tr<?php echo $userlevels->userlevelname->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userlevels->userlevelname->FldCaption() ?></td>
		<td<?php echo $userlevels->userlevelname->CellAttributes() ?>>
<div<?php echo $userlevels->userlevelname->ViewAttributes() ?>><?php echo $userlevels->userlevelname->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userlevels->userleveltype->Visible) { // userleveltype ?>
	<tr<?php echo $userlevels->userleveltype->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userlevels->userleveltype->FldCaption() ?></td>
		<td<?php echo $userlevels->userleveltype->CellAttributes() ?>>
<div<?php echo $userlevels->userleveltype->ViewAttributes() ?>><?php echo $userlevels->userleveltype->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($userlevels->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($userlevels_view->Pager)) $userlevels_view->Pager = new cNumericPager($userlevels_view->lStartRec, $userlevels_view->lDisplayRecs, $userlevels_view->lTotalRecs, $userlevels_view->lRecRange) ?>
<?php if ($userlevels_view->Pager->RecordCount > 0) { ?>
	<?php if ($userlevels_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($userlevels_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($userlevels_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $userlevels_view->PageUrl() ?>start=<?php echo $userlevels_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($userlevels_view->sSrchWhere == "0=101") { ?>
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
<?php if ($userlevels->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$userlevels_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserlevels_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'userlevels';

	// Page object name
	var $PageObjName = 'userlevels_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevels;
		if ($userlevels->UseTokenInUrl) $PageUrl .= "t=" . $userlevels->TableVar . "&"; // Add page token
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
		global $objForm, $userlevels;
		if ($userlevels->UseTokenInUrl) {
			if ($objForm)
				return ($userlevels->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevels->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cuserlevels_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (userlevels)
		$GLOBALS["userlevels"] = new cuserlevels();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevels', TRUE);

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
		global $userlevels;

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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$userlevels->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$userlevels->Export = $_POST["exporttype"];
		} else {
			$userlevels->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $userlevels->Export; // Get export parameter, used in header
		$gsExportFile = $userlevels->TableVar; // Get export file, used in header
		if (@$_GET["userlevelid"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["userlevelid"]);
		}
		if (in_array($userlevels->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($userlevels->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($userlevels->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($userlevels->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($userlevels->Export == "csv") {
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
		global $Language, $userlevels;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["userlevelid"] <> "") {
				$userlevels->userlevelid->setQueryStringValue($_GET["userlevelid"]);
				$this->arRecKey["userlevelid"] = $userlevels->userlevelid->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$userlevels->CurrentAction = "I"; // Display form
			switch ($userlevels->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("userlevelslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($userlevels->userlevelid->CurrentValue) == strval($rs->fields('userlevelid'))) {
								$userlevels->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "userlevelslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($userlevels->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($userlevels->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "userlevelslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$userlevels->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $userlevels;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userlevels->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userlevels->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userlevels->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userlevels->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userlevels->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevels;

		// Call Recordset Selecting event
		$userlevels->Recordset_Selecting($userlevels->CurrentFilter);

		// Load List page SQL
		$sSql = $userlevels->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$userlevels->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevels;
		$sFilter = $userlevels->KeyFilter();

		// Call Row Selecting event
		$userlevels->Row_Selecting($sFilter);

		// Load SQL based on filter
		$userlevels->CurrentFilter = $sFilter;
		$sSql = $userlevels->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$userlevels->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $userlevels;
		$userlevels->userlevelid->setDbValue($rs->fields('userlevelid'));
		if (is_null($userlevels->userlevelid->CurrentValue)) {
			$userlevels->userlevelid->CurrentValue = 0;
		} else {
			$userlevels->userlevelid->CurrentValue = intval($userlevels->userlevelid->CurrentValue);
		}
		$userlevels->userlevelname->setDbValue($rs->fields('userlevelname'));
		$userlevels->userleveltype->setDbValue($rs->fields('userleveltype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $userlevels;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "userlevelid=" . urlencode($userlevels->userlevelid->CurrentValue);
		$this->AddUrl = $userlevels->AddUrl();
		$this->EditUrl = $userlevels->EditUrl();
		$this->CopyUrl = $userlevels->CopyUrl();
		$this->DeleteUrl = $userlevels->DeleteUrl();
		$this->ListUrl = $userlevels->ListUrl();

		// Call Row_Rendering event
		$userlevels->Row_Rendering();

		// Common render codes for all row types
		// userlevelid

		$userlevels->userlevelid->CellCssStyle = ""; $userlevels->userlevelid->CellCssClass = "";
		$userlevels->userlevelid->CellAttrs = array(); $userlevels->userlevelid->ViewAttrs = array(); $userlevels->userlevelid->EditAttrs = array();

		// userlevelname
		$userlevels->userlevelname->CellCssStyle = ""; $userlevels->userlevelname->CellCssClass = "";
		$userlevels->userlevelname->CellAttrs = array(); $userlevels->userlevelname->ViewAttrs = array(); $userlevels->userlevelname->EditAttrs = array();

		// userleveltype
		$userlevels->userleveltype->CellCssStyle = ""; $userlevels->userleveltype->CellCssClass = "";
		$userlevels->userleveltype->CellAttrs = array(); $userlevels->userleveltype->ViewAttrs = array(); $userlevels->userleveltype->EditAttrs = array();
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// userlevelid
			$userlevels->userlevelid->ViewValue = $userlevels->userlevelid->CurrentValue;
			$userlevels->userlevelid->CssStyle = "";
			$userlevels->userlevelid->CssClass = "";
			$userlevels->userlevelid->ViewCustomAttributes = "";

			// userlevelname
			$userlevels->userlevelname->ViewValue = $userlevels->userlevelname->CurrentValue;
			$userlevels->userlevelname->CssStyle = "";
			$userlevels->userlevelname->CssClass = "";
			$userlevels->userlevelname->ViewCustomAttributes = "";

			// userleveltype
			if (strval($userlevels->userleveltype->CurrentValue) <> "") {
				switch ($userlevels->userleveltype->CurrentValue) {
					case "1":
						$userlevels->userleveltype->ViewValue = "Nhóm quản trị";
						break;
					case "2":
						$userlevels->userleveltype->ViewValue = "Nhóm người dùng";
						break;
					default:
						$userlevels->userleveltype->ViewValue = $userlevels->userleveltype->CurrentValue;
				}
			} else {
				$userlevels->userleveltype->ViewValue = NULL;
			}
			$userlevels->userleveltype->CssStyle = "";
			$userlevels->userleveltype->CssClass = "";
			$userlevels->userleveltype->ViewCustomAttributes = "";

			// userlevelid
			$userlevels->userlevelid->HrefValue = "";
			$userlevels->userlevelid->TooltipValue = "";

			// userlevelname
			$userlevels->userlevelname->HrefValue = "";
			$userlevels->userlevelname->TooltipValue = "";

			// userleveltype
			$userlevels->userleveltype->HrefValue = "";
			$userlevels->userleveltype->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($userlevels->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$userlevels->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $userlevels;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $userlevels->SelectRecordCount();
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
		if ($userlevels->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($userlevels, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($userlevels->userlevelid);
				$ExportDoc->ExportCaption($userlevels->userlevelname);
				$ExportDoc->ExportCaption($userlevels->userleveltype);
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
				$userlevels->CssClass = "";
				$userlevels->CssStyle = "";
				$userlevels->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($userlevels->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('userlevelid', $userlevels->userlevelid->ExportValue($userlevels->Export, $userlevels->ExportOriginalValue));
					$XmlDoc->AddField('userlevelname', $userlevels->userlevelname->ExportValue($userlevels->Export, $userlevels->ExportOriginalValue));
					$XmlDoc->AddField('userleveltype', $userlevels->userleveltype->ExportValue($userlevels->Export, $userlevels->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($userlevels->userlevelid);
					$ExportDoc->ExportField($userlevels->userlevelname);
					$ExportDoc->ExportField($userlevels->userleveltype);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($userlevels->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($userlevels->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($userlevels->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($userlevels->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($userlevels->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $userlevels;
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
		if ($userlevels->Email_Sending($Email, $EventArgs))
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
		global $userlevels;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($userlevels->KeyUrl("", ""), 1);
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
