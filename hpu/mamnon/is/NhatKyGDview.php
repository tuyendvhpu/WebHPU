<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "adodb" . EW_PATH_DELIMITER . "adodb.inc.php" ?>
<?php include "phpfn7.php" ?>
<?php include "NhatKyGDinfo.php" ?>
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
$NhatKyGD_view = new cNhatKyGD_view();
$Page =& $NhatKyGD_view;

// Page init
$NhatKyGD_view->Page_Init();

// Page main
$NhatKyGD_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($NhatKyGD->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var NhatKyGD_view = new ew_Page("NhatKyGD_view");

// page properties
NhatKyGD_view.PageID = "view"; // page ID
NhatKyGD_view.FormID = "fNhatKyGDview"; // form ID
var EW_PAGE_ID = NhatKyGD_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
NhatKyGD_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
NhatKyGD_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
NhatKyGD_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
NhatKyGD_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $NhatKyGD->TableCaption() ?>
<?php if ($NhatKyGD->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $NhatKyGD_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_NhatKyGD" id="emf_NhatKyGD" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_NhatKyGD',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($NhatKyGD_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($NhatKyGD->Export == "") { ?>
<a href="<?php echo $NhatKyGD_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<a href="<?php echo $NhatKyGD_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<a href="<?php echo $NhatKyGD_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<a href="<?php echo $NhatKyGD_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $NhatKyGD_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$NhatKyGD_view->ShowMessage();
?>
<p>
<?php if ($NhatKyGD->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($NhatKyGD_view->Pager)) $NhatKyGD_view->Pager = new cNumericPager($NhatKyGD_view->lStartRec, $NhatKyGD_view->lDisplayRecs, $NhatKyGD_view->lTotalRecs, $NhatKyGD_view->lRecRange) ?>
<?php if ($NhatKyGD_view->Pager->RecordCount > 0) { ?>
	<?php if ($NhatKyGD_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_view->PageUrl() ?>start=<?php echo $NhatKyGD_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_view->PageUrl() ?>start=<?php echo $NhatKyGD_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($NhatKyGD_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $NhatKyGD_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_view->PageUrl() ?>start=<?php echo $NhatKyGD_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($NhatKyGD_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $NhatKyGD_view->PageUrl() ?>start=<?php echo $NhatKyGD_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($NhatKyGD_view->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
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
<?php if ($NhatKyGD->NhatKyGDID->Visible) { // NhatKyGDID ?>
	<tr<?php echo $NhatKyGD->NhatKyGDID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NhatKyGDID->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->NhatKyGDID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NhatKyGDID->ViewAttributes() ?>><?php echo $NhatKyGD->NhatKyGDID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->NgayThangNhatKy->Visible) { // NgayThangNhatKy ?>
	<tr<?php echo $NhatKyGD->NgayThangNhatKy->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->NgayThangNhatKy->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NgayThangNhatKy->ViewAttributes() ?>><?php echo $NhatKyGD->NgayThangNhatKy->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->WeekOfYear->Visible) { // WeekOfYear ?>
	<tr<?php echo $NhatKyGD->WeekOfYear->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->WeekOfYear->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->WeekOfYear->CellAttributes() ?>>
<div<?php echo $NhatKyGD->WeekOfYear->ViewAttributes() ?>><?php echo $NhatKyGD->WeekOfYear->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->LopID->Visible) { // LopID ?>
	<tr<?php echo $NhatKyGD->LopID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->LopID->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->LopID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->LopID->ViewAttributes() ?>><?php echo $NhatKyGD->LopID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->NhatKyGDBS->Visible) { // NhatKyGDBS ?>
	<tr<?php echo $NhatKyGD->NhatKyGDBS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NhatKyGDBS->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->NhatKyGDBS->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NhatKyGDBS->ViewAttributes() ?>><?php echo $NhatKyGD->NhatKyGDBS->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->NhatKyGDBC->Visible) { // NhatKyGDBC ?>
	<tr<?php echo $NhatKyGD->NhatKyGDBC->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NhatKyGDBC->FldCaption() ?></td>
		<td<?php echo $NhatKyGD->NhatKyGDBC->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NhatKyGDBC->ViewAttributes() ?>><?php echo $NhatKyGD->NhatKyGDBC->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($NhatKyGD->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$NhatKyGD_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cNhatKyGD_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'NhatKyGD';

	// Page object name
	var $PageObjName = 'NhatKyGD_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) $PageUrl .= "t=" . $NhatKyGD->TableVar . "&"; // Add page token
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
		global $objForm, $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) {
			if ($objForm)
				return ($NhatKyGD->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($NhatKyGD->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cNhatKyGD_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (NhatKyGD)
		$GLOBALS["NhatKyGD"] = new cNhatKyGD();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'NhatKyGD', TRUE);

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
		global $NhatKyGD;

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$NhatKyGD->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$NhatKyGD->Export = $_POST["exporttype"];
		} else {
			$NhatKyGD->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $NhatKyGD->Export; // Get export parameter, used in header
		$gsExportFile = $NhatKyGD->TableVar; // Get export file, used in header
		if (@$_GET["NhatKyGDID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["NhatKyGDID"]);
		}
		if (in_array($NhatKyGD->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($NhatKyGD->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($NhatKyGD->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($NhatKyGD->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($NhatKyGD->Export == "csv") {
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
		global $Language, $NhatKyGD;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["NhatKyGDID"] <> "") {
				$NhatKyGD->NhatKyGDID->setQueryStringValue($_GET["NhatKyGDID"]);
				$this->arRecKey["NhatKyGDID"] = $NhatKyGD->NhatKyGDID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$NhatKyGD->CurrentAction = "I"; // Display form
			switch ($NhatKyGD->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("NhatKyGDlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($NhatKyGD->NhatKyGDID->CurrentValue) == strval($rs->fields('NhatKyGDID'))) {
								$NhatKyGD->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "NhatKyGDlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($NhatKyGD->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($NhatKyGD->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "NhatKyGDlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$NhatKyGD->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $NhatKyGD;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$NhatKyGD->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$NhatKyGD->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $NhatKyGD->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$NhatKyGD->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $NhatKyGD;

		// Call Recordset Selecting event
		$NhatKyGD->Recordset_Selecting($NhatKyGD->CurrentFilter);

		// Load List page SQL
		$sSql = $NhatKyGD->SelectSQL();

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$NhatKyGD->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $NhatKyGD;
		$sFilter = $NhatKyGD->KeyFilter();

		// Call Row Selecting event
		$NhatKyGD->Row_Selecting($sFilter);

		// Load SQL based on filter
		$NhatKyGD->CurrentFilter = $sFilter;
		$sSql = $NhatKyGD->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$NhatKyGD->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $NhatKyGD;
		$NhatKyGD->NhatKyGDID->setDbValue($rs->fields('NhatKyGDID'));
		$NhatKyGD->NgayThangNhatKy->setDbValue($rs->fields('NgayThangNhatKy'));
		$NhatKyGD->WeekOfYear->setDbValue($rs->fields('WeekOfYear'));
		$NhatKyGD->LopID->setDbValue($rs->fields('LopID'));
		$NhatKyGD->NhatKyGDBS->setDbValue($rs->fields('NhatKyGDBS'));
		$NhatKyGD->NhatKyGDBC->setDbValue($rs->fields('NhatKyGDBC'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $NhatKyGD;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "NhatKyGDID=" . urlencode($NhatKyGD->NhatKyGDID->CurrentValue);
		$this->AddUrl = $NhatKyGD->AddUrl();
		$this->EditUrl = $NhatKyGD->EditUrl();
		$this->CopyUrl = $NhatKyGD->CopyUrl();
		$this->DeleteUrl = $NhatKyGD->DeleteUrl();
		$this->ListUrl = $NhatKyGD->ListUrl();

		// Call Row_Rendering event
		$NhatKyGD->Row_Rendering();

		// Common render codes for all row types
		// NhatKyGDID

		$NhatKyGD->NhatKyGDID->CellCssStyle = ""; $NhatKyGD->NhatKyGDID->CellCssClass = "";
		$NhatKyGD->NhatKyGDID->CellAttrs = array(); $NhatKyGD->NhatKyGDID->ViewAttrs = array(); $NhatKyGD->NhatKyGDID->EditAttrs = array();

		// NgayThangNhatKy
		$NhatKyGD->NgayThangNhatKy->CellCssStyle = ""; $NhatKyGD->NgayThangNhatKy->CellCssClass = "";
		$NhatKyGD->NgayThangNhatKy->CellAttrs = array(); $NhatKyGD->NgayThangNhatKy->ViewAttrs = array(); $NhatKyGD->NgayThangNhatKy->EditAttrs = array();

		// WeekOfYear
		$NhatKyGD->WeekOfYear->CellCssStyle = ""; $NhatKyGD->WeekOfYear->CellCssClass = "";
		$NhatKyGD->WeekOfYear->CellAttrs = array(); $NhatKyGD->WeekOfYear->ViewAttrs = array(); $NhatKyGD->WeekOfYear->EditAttrs = array();

		// LopID
		$NhatKyGD->LopID->CellCssStyle = ""; $NhatKyGD->LopID->CellCssClass = "";
		$NhatKyGD->LopID->CellAttrs = array(); $NhatKyGD->LopID->ViewAttrs = array(); $NhatKyGD->LopID->EditAttrs = array();

		// NhatKyGDBS
		$NhatKyGD->NhatKyGDBS->CellCssStyle = ""; $NhatKyGD->NhatKyGDBS->CellCssClass = "";
		$NhatKyGD->NhatKyGDBS->CellAttrs = array(); $NhatKyGD->NhatKyGDBS->ViewAttrs = array(); $NhatKyGD->NhatKyGDBS->EditAttrs = array();

		// NhatKyGDBC
		$NhatKyGD->NhatKyGDBC->CellCssStyle = ""; $NhatKyGD->NhatKyGDBC->CellCssClass = "";
		$NhatKyGD->NhatKyGDBC->CellAttrs = array(); $NhatKyGD->NhatKyGDBC->ViewAttrs = array(); $NhatKyGD->NhatKyGDBC->EditAttrs = array();
		if ($NhatKyGD->RowType == EW_ROWTYPE_VIEW) { // View row

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->ViewValue = $NhatKyGD->NhatKyGDID->CurrentValue;
			$NhatKyGD->NhatKyGDID->CssStyle = "";
			$NhatKyGD->NhatKyGDID->CssClass = "";
			$NhatKyGD->NhatKyGDID->ViewCustomAttributes = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->ViewValue = $NhatKyGD->NgayThangNhatKy->CurrentValue;
			$NhatKyGD->NgayThangNhatKy->ViewValue = ew_FormatDateTime($NhatKyGD->NgayThangNhatKy->ViewValue, 7);
			$NhatKyGD->NgayThangNhatKy->CssStyle = "";
			$NhatKyGD->NgayThangNhatKy->CssClass = "";
			$NhatKyGD->NgayThangNhatKy->ViewCustomAttributes = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->ViewValue = $NhatKyGD->WeekOfYear->CurrentValue;
			$NhatKyGD->WeekOfYear->CssStyle = "";
			$NhatKyGD->WeekOfYear->CssClass = "";
			$NhatKyGD->WeekOfYear->ViewCustomAttributes = "";

			// LopID
			if (strval($NhatKyGD->LopID->CurrentValue) <> "") {
				$sFilterWrk = "[LopID] = " . ew_AdjustSql($NhatKyGD->LopID->CurrentValue) . "";
			$sSqlWrk = "SELECT [MaSoLop] FROM [DMLop]";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$NhatKyGD->LopID->ViewValue = $rswrk->fields('MaSoLop');
					$rswrk->Close();
				} else {
					$NhatKyGD->LopID->ViewValue = $NhatKyGD->LopID->CurrentValue;
				}
			} else {
				$NhatKyGD->LopID->ViewValue = NULL;
			}
			$NhatKyGD->LopID->CssStyle = "";
			$NhatKyGD->LopID->CssClass = "";
			$NhatKyGD->LopID->ViewCustomAttributes = "";

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->ViewValue = $NhatKyGD->NhatKyGDBS->CurrentValue;
			$NhatKyGD->NhatKyGDBS->CssStyle = "";
			$NhatKyGD->NhatKyGDBS->CssClass = "";
			$NhatKyGD->NhatKyGDBS->ViewCustomAttributes = "";

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->ViewValue = $NhatKyGD->NhatKyGDBC->CurrentValue;
			$NhatKyGD->NhatKyGDBC->CssStyle = "";
			$NhatKyGD->NhatKyGDBC->CssClass = "";
			$NhatKyGD->NhatKyGDBC->ViewCustomAttributes = "";

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->HrefValue = "";
			$NhatKyGD->NhatKyGDID->TooltipValue = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->HrefValue = "";
			$NhatKyGD->NgayThangNhatKy->TooltipValue = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->HrefValue = "";
			$NhatKyGD->WeekOfYear->TooltipValue = "";

			// LopID
			$NhatKyGD->LopID->HrefValue = "";
			$NhatKyGD->LopID->TooltipValue = "";

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->HrefValue = "";
			$NhatKyGD->NhatKyGDBS->TooltipValue = "";

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->HrefValue = "";
			$NhatKyGD->NhatKyGDBC->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($NhatKyGD->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$NhatKyGD->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $NhatKyGD;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $NhatKyGD->SelectRecordCount();
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
		if ($NhatKyGD->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($NhatKyGD, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($NhatKyGD->NhatKyGDID);
				$ExportDoc->ExportCaption($NhatKyGD->NgayThangNhatKy);
				$ExportDoc->ExportCaption($NhatKyGD->WeekOfYear);
				$ExportDoc->ExportCaption($NhatKyGD->LopID);
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
				$NhatKyGD->CssClass = "";
				$NhatKyGD->CssStyle = "";
				$NhatKyGD->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($NhatKyGD->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('NhatKyGDID', $NhatKyGD->NhatKyGDID->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('NgayThangNhatKy', $NhatKyGD->NgayThangNhatKy->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('WeekOfYear', $NhatKyGD->WeekOfYear->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
					$XmlDoc->AddField('LopID', $NhatKyGD->LopID->ExportValue($NhatKyGD->Export, $NhatKyGD->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($NhatKyGD->NhatKyGDID);
					$ExportDoc->ExportField($NhatKyGD->NgayThangNhatKy);
					$ExportDoc->ExportField($NhatKyGD->WeekOfYear);
					$ExportDoc->ExportField($NhatKyGD->LopID);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($NhatKyGD->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($NhatKyGD->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($NhatKyGD->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($NhatKyGD->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($NhatKyGD->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $NhatKyGD;
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
		if ($NhatKyGD->Email_Sending($Email, $EventArgs))
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
		global $NhatKyGD;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($NhatKyGD->KeyUrl("", ""), 1);
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
