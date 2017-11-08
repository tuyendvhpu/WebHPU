<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_view = new cadvertising_view();
$Page =& $advertising_view;

// Page init
$advertising_view->Page_Init();

// Page main
$advertising_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($advertising->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_view = new ew_Page("advertising_view");

// page properties
advertising_view.PageID = "view"; // page ID
advertising_view.FormID = "fadvertisingview"; // form ID
var EW_PAGE_ID = advertising_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $advertising->TableCaption() ?>
<?php if ($advertising->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $advertising_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_advertising" id="emf_advertising" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_advertising',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($advertising_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($advertising->Export == "") { ?>
<a href="<?php echo $advertising_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $advertising_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $advertising_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $advertising_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$advertising_view->ShowMessage();
?>
<p>
<?php if ($advertising->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_view->Pager)) $advertising_view->Pager = new cNumericPager($advertising_view->lStartRec, $advertising_view->lDisplayRecs, $advertising_view->lTotalRecs, $advertising_view->lRecRange) ?>
<?php if ($advertising_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_view->sSrchWhere == "0=101") { ?>
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
<?php if ($advertising->advertising_id->Visible) { // advertising_id ?>
	<tr<?php echo $advertising->advertising_id->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_id->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_id->CellAttributes() ?>>
<div<?php echo $advertising->advertising_id->ViewAttributes() ?>><?php echo $advertising->advertising_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_desc->Visible) { // advertising_desc ?>
	<tr<?php echo $advertising->advertising_desc->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_desc->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_desc->CellAttributes() ?>>
<div<?php echo $advertising->advertising_desc->ViewAttributes() ?>><?php echo $advertising->advertising_desc->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_type->Visible) { // advertising_type ?>
	<tr<?php echo $advertising->advertising_type->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_type->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_type->CellAttributes() ?>>
<div<?php echo $advertising->advertising_type->ViewAttributes() ?>><?php echo $advertising->advertising_type->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_pos->Visible) { // advertising_pos ?>
	<tr<?php echo $advertising->advertising_pos->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_pos->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_pos->CellAttributes() ?>>
<div<?php echo $advertising->advertising_pos->ViewAttributes() ?>><?php echo $advertising->advertising_pos->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_link->Visible) { // advertising_link ?>
	<tr<?php echo $advertising->advertising_link->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_link->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_link->CellAttributes() ?>>
<div<?php echo $advertising->advertising_link->ViewAttributes() ?>><?php echo $advertising->advertising_link->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_url->Visible) { // advertising_url ?>
	<tr<?php echo $advertising->advertising_url->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_url->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_url->CellAttributes() ?>>
<?php if ($advertising->advertising_url->HrefValue <> "" || $advertising->advertising_url->TooltipValue <> "") { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<a href="<?php echo $advertising->advertising_url->HrefValue ?>"><?php echo $advertising->advertising_url->ViewValue ?></a>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<?php echo $advertising->advertising_url->ViewValue ?>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_order->Visible) { // advertising_order ?>
	<tr<?php echo $advertising->advertising_order->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_order->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_order->CellAttributes() ?>>
<div<?php echo $advertising->advertising_order->ViewAttributes() ?>><?php echo $advertising->advertising_order->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->create_time->Visible) { // create_time ?>
	<tr<?php echo $advertising->create_time->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->create_time->FldCaption() ?></td>
		<td<?php echo $advertising->create_time->CellAttributes() ?>>
<div<?php echo $advertising->create_time->ViewAttributes() ?>><?php echo $advertising->create_time->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->edit_time->Visible) { // edit_time ?>
	<tr<?php echo $advertising->edit_time->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->edit_time->FldCaption() ?></td>
		<td<?php echo $advertising->edit_time->CellAttributes() ?>>
<div<?php echo $advertising->edit_time->ViewAttributes() ?>><?php echo $advertising->edit_time->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_state->Visible) { // advertising_state ?>
	<tr<?php echo $advertising->advertising_state->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_state->FldCaption() ?></td>
		<td<?php echo $advertising->advertising_state->CellAttributes() ?>>
<div<?php echo $advertising->advertising_state->ViewAttributes() ?>><?php echo $advertising->advertising_state->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($advertising->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($advertising_view->Pager)) $advertising_view->Pager = new cNumericPager($advertising_view->lStartRec, $advertising_view->lDisplayRecs, $advertising_view->lTotalRecs, $advertising_view->lRecRange) ?>
<?php if ($advertising_view->Pager->RecordCount > 0) { ?>
	<?php if ($advertising_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($advertising_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($advertising_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $advertising_view->PageUrl() ?>start=<?php echo $advertising_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($advertising_view->sSrchWhere == "0=101") { ?>
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
<?php if ($advertising->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$advertising_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cadvertising_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'advertising';

	// Page object name
	var $PageObjName = 'advertising_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // Add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cadvertising_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (advertising)
		$GLOBALS["advertising"] = new cadvertising();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

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
		global $advertising;

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
			$this->Page_Terminate("advertisinglist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$advertising->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$advertising->Export = $_POST["exporttype"];
		} else {
			$advertising->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $advertising->Export; // Get export parameter, used in header
		$gsExportFile = $advertising->TableVar; // Get export file, used in header
		if (@$_GET["advertising_id"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["advertising_id"]);
		}
		if (in_array($advertising->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($advertising->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($advertising->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($advertising->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($advertising->Export == "csv") {
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
		global $Language, $advertising;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["advertising_id"] <> "") {
				$advertising->advertising_id->setQueryStringValue($_GET["advertising_id"]);
				$this->arRecKey["advertising_id"] = $advertising->advertising_id->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$advertising->CurrentAction = "I"; // Display form
			switch ($advertising->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("advertisinglist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($advertising->advertising_id->CurrentValue) == strval($rs->fields('advertising_id'))) {
								$advertising->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "advertisinglist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($advertising->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($advertising->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "advertisinglist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$advertising->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $advertising;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$advertising->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$advertising->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $advertising->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$advertising->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$advertising->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load List page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load SQL based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$advertising->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $advertising;
		$advertising->advertising_id->setDbValue($rs->fields('advertising_id'));
		$advertising->advertising_desc->setDbValue($rs->fields('advertising_desc'));
		$advertising->advertising_type->setDbValue($rs->fields('advertising_type'));
		$advertising->advertising_pos->setDbValue($rs->fields('advertising_pos'));
		$advertising->advertising_link->setDbValue($rs->fields('advertising_link'));
		$advertising->advertising_url->Upload->DbValue = $rs->fields('advertising_url');
		$advertising->advertising_order->setDbValue($rs->fields('advertising_order'));
		$advertising->create_time->setDbValue($rs->fields('create_time'));
		$advertising->edit_time->setDbValue($rs->fields('edit_time'));
		$advertising->advertising_state->setDbValue($rs->fields('advertising_state'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $advertising;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "advertising_id=" . urlencode($advertising->advertising_id->CurrentValue);
		$this->AddUrl = $advertising->AddUrl();
		$this->EditUrl = $advertising->EditUrl();
		$this->CopyUrl = $advertising->CopyUrl();
		$this->DeleteUrl = $advertising->DeleteUrl();
		$this->ListUrl = $advertising->ListUrl();

		// Call Row_Rendering event
		$advertising->Row_Rendering();

		// Common render codes for all row types
		// advertising_id

		$advertising->advertising_id->CellCssStyle = ""; $advertising->advertising_id->CellCssClass = "";
		$advertising->advertising_id->CellAttrs = array(); $advertising->advertising_id->ViewAttrs = array(); $advertising->advertising_id->EditAttrs = array();

		// advertising_desc
		$advertising->advertising_desc->CellCssStyle = ""; $advertising->advertising_desc->CellCssClass = "";
		$advertising->advertising_desc->CellAttrs = array(); $advertising->advertising_desc->ViewAttrs = array(); $advertising->advertising_desc->EditAttrs = array();

		// advertising_type
		$advertising->advertising_type->CellCssStyle = ""; $advertising->advertising_type->CellCssClass = "";
		$advertising->advertising_type->CellAttrs = array(); $advertising->advertising_type->ViewAttrs = array(); $advertising->advertising_type->EditAttrs = array();

		// advertising_pos
		$advertising->advertising_pos->CellCssStyle = ""; $advertising->advertising_pos->CellCssClass = "";
		$advertising->advertising_pos->CellAttrs = array(); $advertising->advertising_pos->ViewAttrs = array(); $advertising->advertising_pos->EditAttrs = array();

		// advertising_link
		$advertising->advertising_link->CellCssStyle = ""; $advertising->advertising_link->CellCssClass = "";
		$advertising->advertising_link->CellAttrs = array(); $advertising->advertising_link->ViewAttrs = array(); $advertising->advertising_link->EditAttrs = array();

		// advertising_url
		$advertising->advertising_url->CellCssStyle = ""; $advertising->advertising_url->CellCssClass = "";
		$advertising->advertising_url->CellAttrs = array(); $advertising->advertising_url->ViewAttrs = array(); $advertising->advertising_url->EditAttrs = array();

		// advertising_order
		$advertising->advertising_order->CellCssStyle = ""; $advertising->advertising_order->CellCssClass = "";
		$advertising->advertising_order->CellAttrs = array(); $advertising->advertising_order->ViewAttrs = array(); $advertising->advertising_order->EditAttrs = array();

		// create_time
		$advertising->create_time->CellCssStyle = ""; $advertising->create_time->CellCssClass = "";
		$advertising->create_time->CellAttrs = array(); $advertising->create_time->ViewAttrs = array(); $advertising->create_time->EditAttrs = array();

		// edit_time
		$advertising->edit_time->CellCssStyle = ""; $advertising->edit_time->CellCssClass = "";
		$advertising->edit_time->CellAttrs = array(); $advertising->edit_time->ViewAttrs = array(); $advertising->edit_time->EditAttrs = array();

		// advertising_state
		$advertising->advertising_state->CellCssStyle = ""; $advertising->advertising_state->CellCssClass = "";
		$advertising->advertising_state->CellAttrs = array(); $advertising->advertising_state->ViewAttrs = array(); $advertising->advertising_state->EditAttrs = array();
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// advertising_id
			$advertising->advertising_id->ViewValue = $advertising->advertising_id->CurrentValue;
			$advertising->advertising_id->CssStyle = "";
			$advertising->advertising_id->CssClass = "";
			$advertising->advertising_id->ViewCustomAttributes = "";

			// advertising_desc
			$advertising->advertising_desc->ViewValue = $advertising->advertising_desc->CurrentValue;
			$advertising->advertising_desc->CssStyle = "";
			$advertising->advertising_desc->CssClass = "";
			$advertising->advertising_desc->ViewCustomAttributes = "";

			// advertising_type
			if (strval($advertising->advertising_type->CurrentValue) <> "") {
				switch ($advertising->advertising_type->CurrentValue) {
					case "1":
						$advertising->advertising_type->ViewValue = "Anh";
						break;
					case "2":
						$advertising->advertising_type->ViewValue = "flash";
						break;
					case "3":
						$advertising->advertising_type->ViewValue = "Video";
						break;
					default:
						$advertising->advertising_type->ViewValue = $advertising->advertising_type->CurrentValue;
				}
			} else {
				$advertising->advertising_type->ViewValue = NULL;
			}
			$advertising->advertising_type->CssStyle = "";
			$advertising->advertising_type->CssClass = "";
			$advertising->advertising_type->ViewCustomAttributes = "";

			// advertising_pos
			if (strval($advertising->advertising_pos->CurrentValue) <> "") {
				switch ($advertising->advertising_pos->CurrentValue) {
					case "1":
						$advertising->advertising_pos->ViewValue = "Sinh vien tuong lai";
						break;
					case "2":
						$advertising->advertising_pos->ViewValue = "Cuu sinh vien";
						break;
					default:
						$advertising->advertising_pos->ViewValue = $advertising->advertising_pos->CurrentValue;
				}
			} else {
				$advertising->advertising_pos->ViewValue = NULL;
			}
			$advertising->advertising_pos->CssStyle = "";
			$advertising->advertising_pos->CssClass = "";
			$advertising->advertising_pos->ViewCustomAttributes = "";

			// advertising_link
			$advertising->advertising_link->ViewValue = $advertising->advertising_link->CurrentValue;
			$advertising->advertising_link->CssStyle = "";
			$advertising->advertising_link->CssClass = "";
			$advertising->advertising_link->ViewCustomAttributes = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->ViewValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->ViewValue = "";
			}
			$advertising->advertising_url->CssStyle = "";
			$advertising->advertising_url->CssClass = "";
			$advertising->advertising_url->ViewCustomAttributes = "";

			// advertising_order
			$advertising->advertising_order->ViewValue = $advertising->advertising_order->CurrentValue;
			$advertising->advertising_order->CssStyle = "";
			$advertising->advertising_order->CssClass = "";
			$advertising->advertising_order->ViewCustomAttributes = "";

			// create_time
			$advertising->create_time->ViewValue = $advertising->create_time->CurrentValue;
			$advertising->create_time->ViewValue = ew_FormatDateTime($advertising->create_time->ViewValue, 7);
			$advertising->create_time->CssStyle = "";
			$advertising->create_time->CssClass = "";
			$advertising->create_time->ViewCustomAttributes = "";

			// edit_time
			$advertising->edit_time->ViewValue = $advertising->edit_time->CurrentValue;
			$advertising->edit_time->ViewValue = ew_FormatDateTime($advertising->edit_time->ViewValue, 7);
			$advertising->edit_time->CssStyle = "";
			$advertising->edit_time->CssClass = "";
			$advertising->edit_time->ViewCustomAttributes = "";

			// advertising_state
			if (strval($advertising->advertising_state->CurrentValue) <> "") {
				switch ($advertising->advertising_state->CurrentValue) {
					case "0":
						$advertising->advertising_state->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$advertising->advertising_state->ViewValue = "Kich hoat";
						break;
					default:
						$advertising->advertising_state->ViewValue = $advertising->advertising_state->CurrentValue;
				}
			} else {
				$advertising->advertising_state->ViewValue = NULL;
			}
			$advertising->advertising_state->CssStyle = "";
			$advertising->advertising_state->CssClass = "";
			$advertising->advertising_state->ViewCustomAttributes = "";

			// advertising_id
			$advertising->advertising_id->HrefValue = "";
			$advertising->advertising_id->TooltipValue = "";

			// advertising_desc
			$advertising->advertising_desc->HrefValue = "";
			$advertising->advertising_desc->TooltipValue = "";

			// advertising_type
			$advertising->advertising_type->HrefValue = "";
			$advertising->advertising_type->TooltipValue = "";

			// advertising_pos
			$advertising->advertising_pos->HrefValue = "";
			$advertising->advertising_pos->TooltipValue = "";

			// advertising_link
			$advertising->advertising_link->HrefValue = "";
			$advertising->advertising_link->TooltipValue = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->HrefValue = ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . ((!empty($advertising->advertising_url->ViewValue)) ? $advertising->advertising_url->ViewValue : $advertising->advertising_url->CurrentValue);
				if ($advertising->Export <> "") $advertising->advertising_url->HrefValue = ew_ConvertFullUrl($advertising->advertising_url->HrefValue);
			} else {
				$advertising->advertising_url->HrefValue = "";
			}
			$advertising->advertising_url->TooltipValue = "";

			// advertising_order
			$advertising->advertising_order->HrefValue = "";
			$advertising->advertising_order->TooltipValue = "";

			// create_time
			$advertising->create_time->HrefValue = "";
			$advertising->create_time->TooltipValue = "";

			// edit_time
			$advertising->edit_time->HrefValue = "";
			$advertising->edit_time->TooltipValue = "";

			// advertising_state
			$advertising->advertising_state->HrefValue = "";
			$advertising->advertising_state->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($advertising->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$advertising->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $advertising;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $advertising->SelectRecordCount();
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
		if ($advertising->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($advertising, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
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
				$advertising->CssClass = "";
				$advertising->CssStyle = "";
				$advertising->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($advertising->Export == "xml") {
					$XmlDoc->AddRow();
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($advertising->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($advertising->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($advertising->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($advertising->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($advertising->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $advertising;
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
		if ($advertising->Email_Sending($Email, $EventArgs))
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
		global $advertising;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($advertising->KeyUrl("", ""), 1);
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
