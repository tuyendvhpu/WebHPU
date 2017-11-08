<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lichcongtacinfo.php" ?>
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
$t_lichcongtac_view = new ct_lichcongtac_view();
$Page =& $t_lichcongtac_view;

// Page init
$t_lichcongtac_view->Page_Init();

// Page main
$t_lichcongtac_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_lichcongtac->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_lichcongtac_view = new ew_Page("t_lichcongtac_view");

// page properties
t_lichcongtac_view.PageID = "view"; // page ID
t_lichcongtac_view.FormID = "ft_lichcongtacview"; // form ID
var EW_PAGE_ID = t_lichcongtac_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lichcongtac_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lichcongtac_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lichcongtac_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lichcongtac_view.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><span class="phpmaker"><?php echo $t_lichcongtac->TableCaption() ?>
<?php if ($t_lichcongtac->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_lichcongtac_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_lichcongtac" id="emf_t_lichcongtac" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_lichcongtac',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_lichcongtac_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
</span></p>
<a href="<?php echo $t_lichcongtac->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lichcongtac_view->ShowMessage();
?>
<p>
<?php if ($t_lichcongtac->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>

		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_lichcongtac->C_CADENLAR_ID->Visible) { // C_CADENLAR_ID ?>
	<tr<?php echo $t_lichcongtac->C_CADENLAR_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_CADENLAR_ID->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_CADENLAR_ID->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_CADENLAR_ID->ViewAttributes() ?>><?php echo $t_lichcongtac->C_CADENLAR_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_lichcongtac->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->FK_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->FK_CONGTY->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->FK_CONGTY->ViewAttributes() ?>><?php echo $t_lichcongtac->FK_CONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->FK_SB_ID->Visible) { // FK_SB_ID ?>
	<tr<?php echo $t_lichcongtac->FK_SB_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->FK_SB_ID->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->FK_SB_ID->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->FK_SB_ID->ViewAttributes() ?>><?php echo $t_lichcongtac->FK_SB_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_lichcongtac->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_TITLE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_TITLE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATE_STAR->Visible) { // C_DATE_STAR ?>
	<tr<?php echo $t_lichcongtac->C_DATE_STAR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_DATE_STAR->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATE_STAR->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATE_STAR->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATE_STAR->ViewValue ?>
    <span class="col2"> <?php echo $t_lichcongtac->C_HOUR_START->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?>&nbsp;</span> <?php echo $t_lichcongtac->C_HOUR_START->ViewValue ?>h<?php echo $t_lichcongtac->C_MINUTES_STAR->ViewValue ?>
</div>
            </td>
	</tr>
<?php } ?>

<?php if ($t_lichcongtac->C_DATE_END->Visible) { // C_DATE_END ?>
	<tr<?php echo $t_lichcongtac->C_DATE_END->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_DATE_END->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATE_END->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATE_END->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATE_END->ViewValue ?>
 <span class="col2"> <?php echo $t_lichcongtac->C_HOUR_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?>&nbsp;</span> <?php echo $t_lichcongtac->C_HOUR_END->ViewValue ?>h<?php echo $t_lichcongtac->C_MINUTES_END->ViewValue ?>
<?php echo $t_lichcongtac->C_STATUS_END->ViewValue ?>
</div></td>
	</tr>
<?php } ?>

<?php if ($t_lichcongtac->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_lichcongtac->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_CONTENT->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_CONTENT->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_CONTENT->ViewAttributes() ?>><?php echo $t_lichcongtac->C_CONTENT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_ORGANIZATION->Visible) { // C_ORGANIZATION ?>
	<tr<?php echo $t_lichcongtac->C_ORGANIZATION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_ORGANIZATION->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_ORGANIZATION->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_ORGANIZATION->ViewAttributes() ?>><?php echo $t_lichcongtac->C_ORGANIZATION->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_PARTICIPANTS_ID->Visible) { // C_PARTICIPANTS_ID ?>
	<tr<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_WHERE->Visible) { // C_WHERE ?>
	<tr<?php echo $t_lichcongtac->C_WHERE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_WHERE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_WHERE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_WHERE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_WHERE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_PREPARED->Visible) { // C_PREPARED ?>
	<tr<?php echo $t_lichcongtac->C_PREPARED->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_PREPARED->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_PREPARED->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PREPARED->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PREPARED->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_OPTION->Visible) { // C_OPTION ?>
	<tr<?php echo $t_lichcongtac->C_OPTION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_OPTION->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_OPTION->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_OPTION->ViewAttributes() ?>><?php echo $t_lichcongtac->C_OPTION->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_FILE_ATTACH->Visible) { // C_FILE_ATTACH ?>
	<tr<?php echo $t_lichcongtac->C_FILE_ATTACH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_FILE_ATTACH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_FILE_ATTACH->CellAttributes() ?>>
<?php if ($t_lichcongtac->C_FILE_ATTACH->HrefValue <> "" || $t_lichcongtac->C_FILE_ATTACH->TooltipValue <> "") { ?>
<?php if (!empty($t_lichcongtac->C_FILE_ATTACH->Upload->DbValue)) { ?>
<a href="<?php echo $t_lichcongtac->C_FILE_ATTACH->HrefValue ?>"><?php echo $t_lichcongtac->C_FILE_ATTACH->ViewValue ?></a>
<?php } elseif (!in_array($t_lichcongtac->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lichcongtac->C_FILE_ATTACH->Upload->DbValue)) { ?>
<?php echo $t_lichcongtac->C_FILE_ATTACH->ViewValue ?>
<?php } elseif (!in_array($t_lichcongtac->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_lichcongtac->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_ACTIVE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATETIME_ACTIVE->Visible) { // C_DATETIME_ACTIVE ?>
	<tr<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_lichcongtac->C_PUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PUBLISH->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATETIME_PUBLISH->Visible) { // C_DATETIME_PUBLISH ?>
	<tr<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->ViewValue ?></div></td>
	</tr>
<?php } ?>




</table>
</div>
</td></tr></table>
<?php if ($t_lichcongtac->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>

		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_lichcongtac->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_lichcongtac_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lichcongtac_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_lichcongtac';

	// Page object name
	var $PageObjName = 't_lichcongtac_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) $PageUrl .= "t=" . $t_lichcongtac->TableVar . "&"; // Add page token
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
		global $objForm, $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) {
			if ($objForm)
				return ($t_lichcongtac->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lichcongtac->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lichcongtac_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lichcongtac)
		$GLOBALS["t_lichcongtac"] = new ct_lichcongtac();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lichcongtac', TRUE);

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
		global $t_lichcongtac;

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
			$this->Page_Terminate("t_lichcongtaclist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_lichcongtac->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_lichcongtac->Export = $_POST["exporttype"];
		} else {
			$t_lichcongtac->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_lichcongtac->Export; // Get export parameter, used in header
		$gsExportFile = $t_lichcongtac->TableVar; // Get export file, used in header
		if (@$_GET["C_CADENLAR_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["C_CADENLAR_ID"]);
		}
		if (in_array($t_lichcongtac->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_lichcongtac->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_lichcongtac->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_lichcongtac->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_lichcongtac->Export == "csv") {
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
		global $Language, $t_lichcongtac;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["C_CADENLAR_ID"] <> "") {
				$t_lichcongtac->C_CADENLAR_ID->setQueryStringValue($_GET["C_CADENLAR_ID"]);
				$this->arRecKey["C_CADENLAR_ID"] = $t_lichcongtac->C_CADENLAR_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_lichcongtac->CurrentAction = "I"; // Display form
			switch ($t_lichcongtac->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_lichcongtaclist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_lichcongtac->C_CADENLAR_ID->CurrentValue) == strval($rs->fields('C_CADENLAR_ID'))) {
								$t_lichcongtac->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_lichcongtaclist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_lichcongtac->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_lichcongtac->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_lichcongtaclist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_lichcongtac->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_lichcongtac;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_lichcongtac->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_lichcongtac->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_lichcongtac->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_lichcongtac->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_lichcongtac->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_lichcongtac->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lichcongtac;

		// Call Recordset Selecting event
		$t_lichcongtac->Recordset_Selecting($t_lichcongtac->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lichcongtac->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lichcongtac->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lichcongtac;
		$sFilter = $t_lichcongtac->KeyFilter();

		// Call Row Selecting event
		$t_lichcongtac->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lichcongtac->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lichcongtac->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lichcongtac;
		$t_lichcongtac->C_CADENLAR_ID->setDbValue($rs->fields('C_CADENLAR_ID'));
		$t_lichcongtac->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_lichcongtac->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
		$t_lichcongtac->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_lichcongtac->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
		$t_lichcongtac->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
		$t_lichcongtac->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
		$t_lichcongtac->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
		$t_lichcongtac->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
		$t_lichcongtac->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
		$t_lichcongtac->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
		$t_lichcongtac->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
		$t_lichcongtac->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_lichcongtac->C_ORGANIZATION->setDbValue($rs->fields('C_ORGANIZATION'));
		$t_lichcongtac->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
		$t_lichcongtac->C_WHERE->setDbValue($rs->fields('C_WHERE'));
		$t_lichcongtac->C_PREPARED->setDbValue($rs->fields('C_PREPARED'));
		$t_lichcongtac->C_OPTION->setDbValue($rs->fields('C_OPTION'));
		$t_lichcongtac->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH');
		$t_lichcongtac->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lichcongtac->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
		$t_lichcongtac->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_lichcongtac->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
		$t_lichcongtac->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
		$t_lichcongtac->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lichcongtac->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lichcongtac->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lichcongtac->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lichcongtac;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "C_CADENLAR_ID=" . urlencode($t_lichcongtac->C_CADENLAR_ID->CurrentValue);
		$this->AddUrl = $t_lichcongtac->AddUrl();
		$this->EditUrl = $t_lichcongtac->EditUrl();
		$this->CopyUrl = $t_lichcongtac->CopyUrl();
		$this->DeleteUrl = $t_lichcongtac->DeleteUrl();
		$this->ListUrl = $t_lichcongtac->ListUrl();

		// Call Row_Rendering event
		$t_lichcongtac->Row_Rendering();

		// Common render codes for all row types
		// C_CADENLAR_ID

		$t_lichcongtac->C_CADENLAR_ID->CellCssStyle = ""; $t_lichcongtac->C_CADENLAR_ID->CellCssClass = "";
		$t_lichcongtac->C_CADENLAR_ID->CellAttrs = array(); $t_lichcongtac->C_CADENLAR_ID->ViewAttrs = array(); $t_lichcongtac->C_CADENLAR_ID->EditAttrs = array();

		// FK_CONGTY
		$t_lichcongtac->FK_CONGTY->CellCssStyle = ""; $t_lichcongtac->FK_CONGTY->CellCssClass = "";
		$t_lichcongtac->FK_CONGTY->CellAttrs = array(); $t_lichcongtac->FK_CONGTY->ViewAttrs = array(); $t_lichcongtac->FK_CONGTY->EditAttrs = array();

		// FK_SB_ID
		$t_lichcongtac->FK_SB_ID->CellCssStyle = ""; $t_lichcongtac->FK_SB_ID->CellCssClass = "";
		$t_lichcongtac->FK_SB_ID->CellAttrs = array(); $t_lichcongtac->FK_SB_ID->ViewAttrs = array(); $t_lichcongtac->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$t_lichcongtac->C_TITLE->CellCssStyle = ""; $t_lichcongtac->C_TITLE->CellCssClass = "";
		$t_lichcongtac->C_TITLE->CellAttrs = array(); $t_lichcongtac->C_TITLE->ViewAttrs = array(); $t_lichcongtac->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$t_lichcongtac->C_DATE_STAR->CellCssStyle = ""; $t_lichcongtac->C_DATE_STAR->CellCssClass = "";
		$t_lichcongtac->C_DATE_STAR->CellAttrs = array(); $t_lichcongtac->C_DATE_STAR->ViewAttrs = array(); $t_lichcongtac->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$t_lichcongtac->C_HOUR_START->CellCssStyle = ""; $t_lichcongtac->C_HOUR_START->CellCssClass = "";
		$t_lichcongtac->C_HOUR_START->CellAttrs = array(); $t_lichcongtac->C_HOUR_START->ViewAttrs = array(); $t_lichcongtac->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$t_lichcongtac->C_MINUTES_STAR->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_STAR->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_STAR->CellAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$t_lichcongtac->C_STATUS_STAR->CellCssStyle = ""; $t_lichcongtac->C_STATUS_STAR->CellCssClass = "";
		$t_lichcongtac->C_STATUS_STAR->CellAttrs = array(); $t_lichcongtac->C_STATUS_STAR->ViewAttrs = array(); $t_lichcongtac->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$t_lichcongtac->C_DATE_END->CellCssStyle = ""; $t_lichcongtac->C_DATE_END->CellCssClass = "";
		$t_lichcongtac->C_DATE_END->CellAttrs = array(); $t_lichcongtac->C_DATE_END->ViewAttrs = array(); $t_lichcongtac->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$t_lichcongtac->C_HOUR_END->CellCssStyle = ""; $t_lichcongtac->C_HOUR_END->CellCssClass = "";
		$t_lichcongtac->C_HOUR_END->CellAttrs = array(); $t_lichcongtac->C_HOUR_END->ViewAttrs = array(); $t_lichcongtac->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$t_lichcongtac->C_MINUTES_END->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_END->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_END->CellAttrs = array(); $t_lichcongtac->C_MINUTES_END->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$t_lichcongtac->C_STATUS_END->CellCssStyle = ""; $t_lichcongtac->C_STATUS_END->CellCssClass = "";
		$t_lichcongtac->C_STATUS_END->CellAttrs = array(); $t_lichcongtac->C_STATUS_END->ViewAttrs = array(); $t_lichcongtac->C_STATUS_END->EditAttrs = array();

		// C_CONTENT
		$t_lichcongtac->C_CONTENT->CellCssStyle = ""; $t_lichcongtac->C_CONTENT->CellCssClass = "";
		$t_lichcongtac->C_CONTENT->CellAttrs = array(); $t_lichcongtac->C_CONTENT->ViewAttrs = array(); $t_lichcongtac->C_CONTENT->EditAttrs = array();

		// C_ORGANIZATION
		$t_lichcongtac->C_ORGANIZATION->CellCssStyle = ""; $t_lichcongtac->C_ORGANIZATION->CellCssClass = "";
		$t_lichcongtac->C_ORGANIZATION->CellAttrs = array(); $t_lichcongtac->C_ORGANIZATION->ViewAttrs = array(); $t_lichcongtac->C_ORGANIZATION->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$t_lichcongtac->C_PARTICIPANTS_ID->CellCssStyle = ""; $t_lichcongtac->C_PARTICIPANTS_ID->CellCssClass = "";
		$t_lichcongtac->C_PARTICIPANTS_ID->CellAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->ViewAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_WHERE
		$t_lichcongtac->C_WHERE->CellCssStyle = ""; $t_lichcongtac->C_WHERE->CellCssClass = "";
		$t_lichcongtac->C_WHERE->CellAttrs = array(); $t_lichcongtac->C_WHERE->ViewAttrs = array(); $t_lichcongtac->C_WHERE->EditAttrs = array();

		// C_PREPARED
		$t_lichcongtac->C_PREPARED->CellCssStyle = ""; $t_lichcongtac->C_PREPARED->CellCssClass = "";
		$t_lichcongtac->C_PREPARED->CellAttrs = array(); $t_lichcongtac->C_PREPARED->ViewAttrs = array(); $t_lichcongtac->C_PREPARED->EditAttrs = array();

		// C_OPTION
		$t_lichcongtac->C_OPTION->CellCssStyle = ""; $t_lichcongtac->C_OPTION->CellCssClass = "";
		$t_lichcongtac->C_OPTION->CellAttrs = array(); $t_lichcongtac->C_OPTION->ViewAttrs = array(); $t_lichcongtac->C_OPTION->EditAttrs = array();

		// C_FILE_ATTACH
		$t_lichcongtac->C_FILE_ATTACH->CellCssStyle = ""; $t_lichcongtac->C_FILE_ATTACH->CellCssClass = "";
		$t_lichcongtac->C_FILE_ATTACH->CellAttrs = array(); $t_lichcongtac->C_FILE_ATTACH->ViewAttrs = array(); $t_lichcongtac->C_FILE_ATTACH->EditAttrs = array();

		// C_ACTIVE
		$t_lichcongtac->C_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_ACTIVE->EditAttrs = array();

		// C_DATETIME_ACTIVE
		$t_lichcongtac->C_DATETIME_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$t_lichcongtac->C_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$t_lichcongtac->C_DATETIME_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$t_lichcongtac->C_FK_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_FK_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_FK_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->EditAttrs = array();

		// C_USER_ADD
		$t_lichcongtac->C_USER_ADD->CellCssStyle = ""; $t_lichcongtac->C_USER_ADD->CellCssClass = "";
		$t_lichcongtac->C_USER_ADD->CellAttrs = array(); $t_lichcongtac->C_USER_ADD->ViewAttrs = array(); $t_lichcongtac->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_lichcongtac->C_ADD_TIME->CellCssStyle = ""; $t_lichcongtac->C_ADD_TIME->CellCssClass = "";
		$t_lichcongtac->C_ADD_TIME->CellAttrs = array(); $t_lichcongtac->C_ADD_TIME->ViewAttrs = array(); $t_lichcongtac->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_lichcongtac->C_USER_EDIT->CellCssStyle = ""; $t_lichcongtac->C_USER_EDIT->CellCssClass = "";
		$t_lichcongtac->C_USER_EDIT->CellAttrs = array(); $t_lichcongtac->C_USER_EDIT->ViewAttrs = array(); $t_lichcongtac->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_lichcongtac->C_EDIT_TIME->CellCssStyle = ""; $t_lichcongtac->C_EDIT_TIME->CellCssClass = "";
		$t_lichcongtac->C_EDIT_TIME->CellAttrs = array(); $t_lichcongtac->C_EDIT_TIME->ViewAttrs = array(); $t_lichcongtac->C_EDIT_TIME->EditAttrs = array();
		if ($t_lichcongtac->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_CADENLAR_ID
			$t_lichcongtac->C_CADENLAR_ID->ViewValue = $t_lichcongtac->C_CADENLAR_ID->CurrentValue;
			$t_lichcongtac->C_CADENLAR_ID->CssStyle = "";
			$t_lichcongtac->C_CADENLAR_ID->CssClass = "";
			$t_lichcongtac->C_CADENLAR_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_lichcongtac->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_CONGTY->ViewValue = $t_lichcongtac->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_CONGTY->ViewValue = NULL;
			}
			$t_lichcongtac->FK_CONGTY->CssStyle = "";
			$t_lichcongtac->FK_CONGTY->CssClass = "";
			$t_lichcongtac->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			if (strval($t_lichcongtac->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_SB_ID->ViewValue = $t_lichcongtac->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_SB_ID->ViewValue = NULL;
			}
			$t_lichcongtac->FK_SB_ID->CssStyle = "";
			$t_lichcongtac->FK_SB_ID->CssClass = "";
			$t_lichcongtac->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->ViewValue = $t_lichcongtac->C_TITLE->CurrentValue;
			$t_lichcongtac->C_TITLE->CssStyle = "";
			$t_lichcongtac->C_TITLE->CssClass = "";
			$t_lichcongtac->C_TITLE->ViewCustomAttributes = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->ViewValue = $t_lichcongtac->C_DATE_STAR->CurrentValue;
			$t_lichcongtac->C_DATE_STAR->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_STAR->ViewValue, 7);
			$t_lichcongtac->C_DATE_STAR->CssStyle = "";
			$t_lichcongtac->C_DATE_STAR->CssClass = "";
			$t_lichcongtac->C_DATE_STAR->ViewCustomAttributes = "";

			// C_HOUR_START
			if (strval($t_lichcongtac->C_HOUR_START->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_START->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_START->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_HOUR_START->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_HOUR_START->ViewValue = $t_lichcongtac->C_HOUR_START->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_START->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_START->CssStyle = "";
			$t_lichcongtac->C_HOUR_START->CssClass = "";
			$t_lichcongtac->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
			if (strval($t_lichcongtac->C_MINUTES_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = $t_lichcongtac->C_MINUTES_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
			if (strval($t_lichcongtac->C_STATUS_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_STAR->ViewValue = "Không xác định";
						break;
					default:
						$t_lichcongtac->C_STATUS_STAR->ViewValue = $t_lichcongtac->C_STATUS_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac->C_STATUS_STAR->ViewCustomAttributes = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->ViewValue = $t_lichcongtac->C_DATE_END->CurrentValue;
			$t_lichcongtac->C_DATE_END->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_END->ViewValue, 7);
			$t_lichcongtac->C_DATE_END->CssStyle = "";
			$t_lichcongtac->C_DATE_END->CssClass = "";
			$t_lichcongtac->C_DATE_END->ViewCustomAttributes = "";

			// C_HOUR_END
			if (strval($t_lichcongtac->C_HOUR_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac->C_HOUR_END->ViewValue = $t_lichcongtac->C_HOUR_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_END->CssStyle = "";
			$t_lichcongtac->C_HOUR_END->CssClass = "";
			$t_lichcongtac->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
			if (strval($t_lichcongtac->C_MINUTES_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_END->ViewValue = $t_lichcongtac->C_MINUTES_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac->C_MINUTES_END->CssClass = "";
			$t_lichcongtac->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
			if (strval($t_lichcongtac->C_STATUS_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_END->ViewValue = "Không xác định";
						break;
					default:
						$t_lichcongtac->C_STATUS_END->ViewValue = $t_lichcongtac->C_STATUS_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_END->CssStyle = "";
			$t_lichcongtac->C_STATUS_END->CssClass = "";
			$t_lichcongtac->C_STATUS_END->ViewCustomAttributes = "";

			// C_CONTENT
			$t_lichcongtac->C_CONTENT->ViewValue = $t_lichcongtac->C_CONTENT->CurrentValue;
			$t_lichcongtac->C_CONTENT->CssStyle = "";
			$t_lichcongtac->C_CONTENT->CssClass = "";
			$t_lichcongtac->C_CONTENT->ViewCustomAttributes = "";

			// C_ORGANIZATION
			$t_lichcongtac->C_ORGANIZATION->ViewValue = $t_lichcongtac->C_ORGANIZATION->CurrentValue;
			$t_lichcongtac->C_ORGANIZATION->CssStyle = "";
			$t_lichcongtac->C_ORGANIZATION->CssClass = "";
			$t_lichcongtac->C_ORGANIZATION->ViewCustomAttributes = "";

			// C_PARTICIPANTS_ID
			// C_PARTICIPANTS_ID
			if (strval($t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue) <> "") {
				$arwrk = explode(",", $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue);
                                $findme   = 'x_';
                                $array_company = array();
                                $array_user = array();
                                FOR ($i=0;$i< count ($arwrk);$i++)   
                                {
                                         $pos = strpos($arwrk [$i], $findme);
                                        if ($pos === false) {
                                                   $array_company[$i] =  substr($arwrk [$i],0,-1);
                                                    } else {
                                                    $array_user[$i] =  substr(strstr($arwrk [$i],'x'),2);
                                                    }
                                }
                               // Xuất ra danh sách các đơnn vị Add code QuangHung  
                                $arwrk = $array_company;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = "";
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY')."<br/>";
                                                        $rswrk->MoveNext();
                                                        if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        } else {
                                                $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue;
                                        }
                                     
                             // Xác định tên người tham gia add code  
                                $arwrk = $array_user;
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
                                $sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
                                $sWhereWrk = "";
                                if ($sFilterWrk <> "") {
                                        if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
                                        $sWhereWrk .= "(" . $sFilterWrk . ")";
                                }
                                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
                                        $rswrk = $conn->Execute($sSqlWrk);
                                        if ($rswrk && !$rswrk->EOF) { // Lookup values found
                                                $ari = 0;
                                                while (!$rswrk->EOF) {
                                                        $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_HOTEN')."<br/>";
                                                        $rswrk->MoveNext();
                                                    //    if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
                                                         if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator1($ari); // Separate Options
                                                        $ari++;
                                                }
                                                $rswrk->Close();
                                        }
                        } else
                        {
                            $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = NULL;
                        }   
			$t_lichcongtac->C_PARTICIPANTS_ID->CssStyle = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->CssClass = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac->C_WHERE->ViewValue = $t_lichcongtac->C_WHERE->CurrentValue;
			$t_lichcongtac->C_WHERE->CssStyle = "";
			$t_lichcongtac->C_WHERE->CssClass = "";
			$t_lichcongtac->C_WHERE->ViewCustomAttributes = "";

			// C_PREPARED
			$t_lichcongtac->C_PREPARED->ViewValue = $t_lichcongtac->C_PREPARED->CurrentValue;
			$t_lichcongtac->C_PREPARED->CssStyle = "";
			$t_lichcongtac->C_PREPARED->CssClass = "";
			$t_lichcongtac->C_PREPARED->ViewCustomAttributes = "";

			// C_OPTION
			if (strval($t_lichcongtac->C_OPTION->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_OPTION->CurrentValue) {
					case "0":
						$t_lichcongtac->C_OPTION->ViewValue = "Sự kiện công khai";
						break;
					case "1":
						$t_lichcongtac->C_OPTION->ViewValue = "Sự kiện quan trọng";
						break;
					default:
						$t_lichcongtac->C_OPTION->ViewValue = $t_lichcongtac->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_OPTION->ViewValue = NULL;
			}
			$t_lichcongtac->C_OPTION->CssStyle = "";
			$t_lichcongtac->C_OPTION->CssClass = "";
			$t_lichcongtac->C_OPTION->ViewCustomAttributes = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac->C_FILE_ATTACH->ViewValue = $t_lichcongtac->C_FILE_ATTACH->Upload->DbValue;
			} else {
				$t_lichcongtac->C_FILE_ATTACH->ViewValue = "";
			}
			$t_lichcongtac->C_FILE_ATTACH->ViewValue = ew_FormatDateTime($t_lichcongtac->C_FILE_ATTACH->ViewValue, 0);
			$t_lichcongtac->C_FILE_ATTACH->CssStyle = "";
			$t_lichcongtac->C_FILE_ATTACH->CssClass = "";
			$t_lichcongtac->C_FILE_ATTACH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lichcongtac->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Không duyệt";
						break;
					case "1":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Duyệt lên lịch đơn vị";
						break;
					default:
						$t_lichcongtac->C_ACTIVE->ViewValue = $t_lichcongtac->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_ACTIVE->ViewValue = NULL;
			}
			$t_lichcongtac->C_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_ACTIVE->CssClass = "";
			$t_lichcongtac->C_ACTIVE->ViewCustomAttributes = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = $t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue;
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_ACTIVE->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->CssClass = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_lichcongtac->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_PUBLISH->CurrentValue) {
					case "0":
						$t_lichcongtac->C_PUBLISH->ViewValue = "Không duyệt";
						break;
                                        case "1":
						$t_lichcongtac->C_PUBLISH->ViewValue = "Chờ xét";
						break;
					case "2":
						$t_lichcongtac->C_PUBLISH->ViewValue = "Duyệt lên lịch trường";
						break;
					default:
						$t_lichcongtac->C_PUBLISH->ViewValue = $t_lichcongtac->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_PUBLISH->ViewValue = NULL;
			}
			$t_lichcongtac->C_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_PUBLISH->CssClass = "";
			$t_lichcongtac->C_PUBLISH->ViewCustomAttributes = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = $t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue;
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_PUBLISH->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->CssClass = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->ViewValue = $t_lichcongtac->C_FK_PUBLISH->CurrentValue;
			$t_lichcongtac->C_FK_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_FK_PUBLISH->CssClass = "";
			$t_lichcongtac->C_FK_PUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lichcongtac->C_USER_ADD->ViewValue = $t_lichcongtac->C_USER_ADD->CurrentValue;
			$t_lichcongtac->C_USER_ADD->CssStyle = "";
			$t_lichcongtac->C_USER_ADD->CssClass = "";
			$t_lichcongtac->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lichcongtac->C_ADD_TIME->ViewValue = $t_lichcongtac->C_ADD_TIME->CurrentValue;
			$t_lichcongtac->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_ADD_TIME->ViewValue, 7);
			$t_lichcongtac->C_ADD_TIME->CssStyle = "";
			$t_lichcongtac->C_ADD_TIME->CssClass = "";
			$t_lichcongtac->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lichcongtac->C_USER_EDIT->ViewValue = $t_lichcongtac->C_USER_EDIT->CurrentValue;
			$t_lichcongtac->C_USER_EDIT->CssStyle = "";
			$t_lichcongtac->C_USER_EDIT->CssClass = "";
			$t_lichcongtac->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lichcongtac->C_EDIT_TIME->ViewValue = $t_lichcongtac->C_EDIT_TIME->CurrentValue;
			$t_lichcongtac->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_EDIT_TIME->ViewValue, 7);
			$t_lichcongtac->C_EDIT_TIME->CssStyle = "";
			$t_lichcongtac->C_EDIT_TIME->CssClass = "";
			$t_lichcongtac->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_CADENLAR_ID
			$t_lichcongtac->C_CADENLAR_ID->HrefValue = "";
			$t_lichcongtac->C_CADENLAR_ID->TooltipValue = "";

			// FK_CONGTY
			$t_lichcongtac->FK_CONGTY->HrefValue = "";
			$t_lichcongtac->FK_CONGTY->TooltipValue = "";

			// FK_SB_ID
			$t_lichcongtac->FK_SB_ID->HrefValue = "";
			$t_lichcongtac->FK_SB_ID->TooltipValue = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->HrefValue = "";
			$t_lichcongtac->C_TITLE->TooltipValue = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->HrefValue = "";
			$t_lichcongtac->C_DATE_STAR->TooltipValue = "";

			// C_HOUR_START
			$t_lichcongtac->C_HOUR_START->HrefValue = "";
			$t_lichcongtac->C_HOUR_START->TooltipValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac->C_MINUTES_STAR->HrefValue = "";
			$t_lichcongtac->C_MINUTES_STAR->TooltipValue = "";

			// C_STATUS_STAR
			$t_lichcongtac->C_STATUS_STAR->HrefValue = "";
			$t_lichcongtac->C_STATUS_STAR->TooltipValue = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->HrefValue = "";
			$t_lichcongtac->C_DATE_END->TooltipValue = "";

			// C_HOUR_END
			$t_lichcongtac->C_HOUR_END->HrefValue = "";
			$t_lichcongtac->C_HOUR_END->TooltipValue = "";

			// C_MINUTES_END
			$t_lichcongtac->C_MINUTES_END->HrefValue = "";
			$t_lichcongtac->C_MINUTES_END->TooltipValue = "";

			// C_STATUS_END
			$t_lichcongtac->C_STATUS_END->HrefValue = "";
			$t_lichcongtac->C_STATUS_END->TooltipValue = "";

			// C_CONTENT
			$t_lichcongtac->C_CONTENT->HrefValue = "";
			$t_lichcongtac->C_CONTENT->TooltipValue = "";

			// C_ORGANIZATION
			$t_lichcongtac->C_ORGANIZATION->HrefValue = "";
			$t_lichcongtac->C_ORGANIZATION->TooltipValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac->C_PARTICIPANTS_ID->HrefValue = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->TooltipValue = "";

			// C_WHERE
			$t_lichcongtac->C_WHERE->HrefValue = "";
			$t_lichcongtac->C_WHERE->TooltipValue = "";

			// C_PREPARED
			$t_lichcongtac->C_PREPARED->HrefValue = "";
			$t_lichcongtac->C_PREPARED->TooltipValue = "";

			// C_OPTION
			$t_lichcongtac->C_OPTION->HrefValue = "";
			$t_lichcongtac->C_OPTION->TooltipValue = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac->C_FILE_ATTACH->HrefValue = ew_UploadPathEx(FALSE, $t_lichcongtac->C_FILE_ATTACH->UploadPath) . ((!empty($t_lichcongtac->C_FILE_ATTACH->ViewValue)) ? $t_lichcongtac->C_FILE_ATTACH->ViewValue : $t_lichcongtac->C_FILE_ATTACH->CurrentValue);
				if ($t_lichcongtac->Export <> "") $t_lichcongtac->C_FILE_ATTACH->HrefValue = ew_ConvertFullUrl($t_lichcongtac->C_FILE_ATTACH->HrefValue);
			} else {
				$t_lichcongtac->C_FILE_ATTACH->HrefValue = "";
			}
			$t_lichcongtac->C_FILE_ATTACH->TooltipValue = "";

			// C_ACTIVE
			$t_lichcongtac->C_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_ACTIVE->TooltipValue = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->TooltipValue = "";

			// C_PUBLISH
			$t_lichcongtac->C_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_PUBLISH->TooltipValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->TooltipValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_FK_PUBLISH->TooltipValue = "";

			// C_USER_ADD
			$t_lichcongtac->C_USER_ADD->HrefValue = "";
			$t_lichcongtac->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_lichcongtac->C_ADD_TIME->HrefValue = "";
			$t_lichcongtac->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_lichcongtac->C_USER_EDIT->HrefValue = "";
			$t_lichcongtac->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_lichcongtac->C_EDIT_TIME->HrefValue = "";
			$t_lichcongtac->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_lichcongtac->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lichcongtac->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_lichcongtac;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_lichcongtac->SelectRecordCount();
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
		if ($t_lichcongtac->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_lichcongtac, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_lichcongtac->C_CADENLAR_ID);
				$ExportDoc->ExportCaption($t_lichcongtac->FK_CONGTY);
				$ExportDoc->ExportCaption($t_lichcongtac->FK_SB_ID);
				$ExportDoc->ExportCaption($t_lichcongtac->C_TITLE);
				$ExportDoc->ExportCaption($t_lichcongtac->C_DATE_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac->C_HOUR_START);
				$ExportDoc->ExportCaption($t_lichcongtac->C_MINUTES_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac->C_STATUS_STAR);
				$ExportDoc->ExportCaption($t_lichcongtac->C_DATE_END);
				$ExportDoc->ExportCaption($t_lichcongtac->C_HOUR_END);
				$ExportDoc->ExportCaption($t_lichcongtac->C_MINUTES_END);
				$ExportDoc->ExportCaption($t_lichcongtac->C_STATUS_END);
				$ExportDoc->ExportCaption($t_lichcongtac->C_ORGANIZATION);
				$ExportDoc->ExportCaption($t_lichcongtac->C_PARTICIPANTS_ID);
				$ExportDoc->ExportCaption($t_lichcongtac->C_WHERE);
				$ExportDoc->ExportCaption($t_lichcongtac->C_PREPARED);
				$ExportDoc->ExportCaption($t_lichcongtac->C_OPTION);
				$ExportDoc->ExportCaption($t_lichcongtac->C_ACTIVE);
				$ExportDoc->ExportCaption($t_lichcongtac->C_DATETIME_ACTIVE);
				$ExportDoc->ExportCaption($t_lichcongtac->C_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac->C_DATETIME_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac->C_FK_PUBLISH);
				$ExportDoc->ExportCaption($t_lichcongtac->C_USER_ADD);
				$ExportDoc->ExportCaption($t_lichcongtac->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_lichcongtac->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_lichcongtac->C_EDIT_TIME);
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
				$t_lichcongtac->CssClass = "";
				$t_lichcongtac->CssStyle = "";
				$t_lichcongtac->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_lichcongtac->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_CADENLAR_ID', $t_lichcongtac->C_CADENLAR_ID->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY', $t_lichcongtac->FK_CONGTY->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('FK_SB_ID', $t_lichcongtac->FK_SB_ID->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_TITLE', $t_lichcongtac->C_TITLE->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_DATE_STAR', $t_lichcongtac->C_DATE_STAR->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_HOUR_START', $t_lichcongtac->C_HOUR_START->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_MINUTES_STAR', $t_lichcongtac->C_MINUTES_STAR->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_STAR', $t_lichcongtac->C_STATUS_STAR->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_DATE_END', $t_lichcongtac->C_DATE_END->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_HOUR_END', $t_lichcongtac->C_HOUR_END->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_MINUTES_END', $t_lichcongtac->C_MINUTES_END->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_STATUS_END', $t_lichcongtac->C_STATUS_END->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_ORGANIZATION', $t_lichcongtac->C_ORGANIZATION->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_PARTICIPANTS_ID', $t_lichcongtac->C_PARTICIPANTS_ID->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_WHERE', $t_lichcongtac->C_WHERE->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_PREPARED', $t_lichcongtac->C_PREPARED->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_OPTION', $t_lichcongtac->C_OPTION->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_lichcongtac->C_ACTIVE->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_ACTIVE', $t_lichcongtac->C_DATETIME_ACTIVE->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_PUBLISH', $t_lichcongtac->C_PUBLISH->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_PUBLISH', $t_lichcongtac->C_DATETIME_PUBLISH->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_FK_PUBLISH', $t_lichcongtac->C_FK_PUBLISH->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_lichcongtac->C_USER_ADD->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_lichcongtac->C_ADD_TIME->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_lichcongtac->C_USER_EDIT->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_lichcongtac->C_EDIT_TIME->ExportValue($t_lichcongtac->Export, $t_lichcongtac->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_lichcongtac->C_CADENLAR_ID);
					$ExportDoc->ExportField($t_lichcongtac->FK_CONGTY);
					$ExportDoc->ExportField($t_lichcongtac->FK_SB_ID);
					$ExportDoc->ExportField($t_lichcongtac->C_TITLE);
					$ExportDoc->ExportField($t_lichcongtac->C_DATE_STAR);
					$ExportDoc->ExportField($t_lichcongtac->C_HOUR_START);
					$ExportDoc->ExportField($t_lichcongtac->C_MINUTES_STAR);
					$ExportDoc->ExportField($t_lichcongtac->C_STATUS_STAR);
					$ExportDoc->ExportField($t_lichcongtac->C_DATE_END);
					$ExportDoc->ExportField($t_lichcongtac->C_HOUR_END);
					$ExportDoc->ExportField($t_lichcongtac->C_MINUTES_END);
					$ExportDoc->ExportField($t_lichcongtac->C_STATUS_END);
					$ExportDoc->ExportField($t_lichcongtac->C_ORGANIZATION);
					$ExportDoc->ExportField($t_lichcongtac->C_PARTICIPANTS_ID);
					$ExportDoc->ExportField($t_lichcongtac->C_WHERE);
					$ExportDoc->ExportField($t_lichcongtac->C_PREPARED);
					$ExportDoc->ExportField($t_lichcongtac->C_OPTION);
					$ExportDoc->ExportField($t_lichcongtac->C_ACTIVE);
					$ExportDoc->ExportField($t_lichcongtac->C_DATETIME_ACTIVE);
					$ExportDoc->ExportField($t_lichcongtac->C_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac->C_DATETIME_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac->C_FK_PUBLISH);
					$ExportDoc->ExportField($t_lichcongtac->C_USER_ADD);
					$ExportDoc->ExportField($t_lichcongtac->C_ADD_TIME);
					$ExportDoc->ExportField($t_lichcongtac->C_USER_EDIT);
					$ExportDoc->ExportField($t_lichcongtac->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_lichcongtac->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_lichcongtac->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_lichcongtac->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_lichcongtac->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_lichcongtac->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_lichcongtac;
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
		if ($t_lichcongtac->Email_Sending($Email, $EventArgs))
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
		global $t_lichcongtac;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_lichcongtac->KeyUrl("", ""), 1);
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
