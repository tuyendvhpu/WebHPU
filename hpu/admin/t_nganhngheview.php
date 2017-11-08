<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_nganhngheinfo.php" ?>
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
$t_nganhnghe_view = new ct_nganhnghe_view();
$Page =& $t_nganhnghe_view;

// Page init
$t_nganhnghe_view->Page_Init();

// Page main
$t_nganhnghe_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_nganhnghe->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_nganhnghe_view = new ew_Page("t_nganhnghe_view");

// page properties
t_nganhnghe_view.PageID = "view"; // page ID
t_nganhnghe_view.FormID = "ft_nganhngheview"; // form ID
var EW_PAGE_ID = t_nganhnghe_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_nganhnghe_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_nganhnghe_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_nganhnghe_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_nganhnghe_view.ValidateRequired = false; // no JavaScript validation
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
								<?php echo $t_nganhnghe->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<?php if ($t_nganhnghe->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_nganhnghe_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_nganhnghe" id="emf_t_nganhnghe" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_nganhnghe',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_nganhnghe_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_nganhnghe->Export == "") { ?>
<a href="<?php echo $t_nganhnghe_view->ListUrl ?>"><?php echo $Language->Phrase("GoBack") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_nganhnghe_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_nganhnghe_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_nganhnghe_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_nganhnghe_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_nganhnghe_view->ShowMessage();
?>
<p>
<?php if ($t_nganhnghe->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_nganhnghe_view->Pager)) $t_nganhnghe_view->Pager = new cPrevNextPager($t_nganhnghe_view->lStartRec, $t_nganhnghe_view->lDisplayRecs, $t_nganhnghe_view->lTotalRecs) ?>
<?php if ($t_nganhnghe_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_nganhnghe_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_nganhnghe_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_nganhnghe_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_nganhnghe_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_nganhnghe_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t_nganhnghe_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_nganhnghe_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoPermission") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">

<?php if ($t_nganhnghe->C_TENNGANH->Visible) { // C_TENNGANH ?>
	<tr<?php echo $t_nganhnghe->C_TENNGANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_TENNGANH->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TENNGANH->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TENNGANH->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_nganhnghe->C_TRANGTHAI->Visible) { // C_TRANGTHAI ?>
	<tr<?php echo $t_nganhnghe->C_TRANGTHAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_TRANGTHAI->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TRANGTHAI->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TRANGTHAI->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($t_nganhnghe->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_nganhnghe->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_ADD->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_nganhnghe->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_nganhnghe->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_nganhnghe->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_nganhnghe->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_nganhnghe->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_nganhnghe->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_nganhnghe->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_nganhnghe->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_nganhnghe_view->Pager)) $t_nganhnghe_view->Pager = new cPrevNextPager($t_nganhnghe_view->lStartRec, $t_nganhnghe_view->lDisplayRecs, $t_nganhnghe_view->lTotalRecs) ?>
<?php if ($t_nganhnghe_view->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_nganhnghe_view->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_nganhnghe_view->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_nganhnghe_view->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_nganhnghe_view->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_nganhnghe_view->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_nganhnghe_view->PageUrl() ?>start=<?php echo $t_nganhnghe_view->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t_nganhnghe_view->Pager->PageCount ?></span></td>
	</tr></table>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_nganhnghe_view->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoPermission") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_nganhnghe->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_nganhnghe_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_nganhnghe_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_nganhnghe';

	// Page object name
	var $PageObjName = 't_nganhnghe_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $t_nganhnghe->TableVar . "&"; // Add page token
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
		global $objForm, $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) {
			if ($objForm)
				return ($t_nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_nganhnghe_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nganhnghe)
		$GLOBALS["t_nganhnghe"] = new ct_nganhnghe();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_nganhnghe', TRUE);

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
		global $t_nganhnghe;

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
			$this->Page_Terminate("t_nganhnghelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_nganhnghe->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_nganhnghe->Export = $_POST["exporttype"];
		} else {
			$t_nganhnghe->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_nganhnghe->Export; // Get export parameter, used in header
		$gsExportFile = $t_nganhnghe->TableVar; // Get export file, used in header
		if (@$_GET["PK_NGANH_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_NGANH_ID"]);
		}
		if ($t_nganhnghe->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_nganhnghe->Export == "word") {
			header('Content-Type: application/vnd.ms-word');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_nganhnghe->Export == "xml") {
			header('Content-Type: text/xml');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_nganhnghe->Export == "csv") {
			header('Content-Type: application/csv');
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
		global $Language, $t_nganhnghe;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_NGANH_ID"] <> "") {
				$t_nganhnghe->PK_NGANH_ID->setQueryStringValue($_GET["PK_NGANH_ID"]);
				$this->arRecKey["PK_NGANH_ID"] = $t_nganhnghe->PK_NGANH_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_nganhnghe->CurrentAction = "I"; // Display form
			switch ($t_nganhnghe->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_nganhnghelist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_nganhnghe->PK_NGANH_ID->CurrentValue) == strval($rs->fields('PK_NGANH_ID'))) {
								$t_nganhnghe->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_nganhnghelist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_nganhnghe->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_nganhnghe->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_nganhnghelist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_nganhnghe->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_nganhnghe;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_nganhnghe->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_nganhnghe->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_nganhnghe->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_nganhnghe->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_nganhnghe;

		// Call Recordset Selecting event
		$t_nganhnghe->Recordset_Selecting($t_nganhnghe->CurrentFilter);

		// Load List page SQL
		$sSql = $t_nganhnghe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_nganhnghe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_nganhnghe;
		$sFilter = $t_nganhnghe->KeyFilter();

		// Call Row Selecting event
		$t_nganhnghe->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_nganhnghe->CurrentFilter = $sFilter;
		$sSql = $t_nganhnghe->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_nganhnghe->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_nganhnghe;
		$t_nganhnghe->PK_NGANH_ID->setDbValue($rs->fields('PK_NGANH_ID'));
		$t_nganhnghe->C_TENNGANH->setDbValue($rs->fields('C_TENNGANH'));
		$t_nganhnghe->C_TRANGTHAI->setDbValue($rs->fields('C_TRANGTHAI'));
		$t_nganhnghe->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_nganhnghe->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_nganhnghe->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_nganhnghe->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_nganhnghe->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_nganhnghe;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_NGANH_ID=" . urlencode($t_nganhnghe->PK_NGANH_ID->CurrentValue);
		$this->AddUrl = $t_nganhnghe->AddUrl();
		$this->EditUrl = $t_nganhnghe->EditUrl();
		$this->CopyUrl = $t_nganhnghe->CopyUrl();
		$this->DeleteUrl = $t_nganhnghe->DeleteUrl();
		$this->ListUrl = $t_nganhnghe->ListUrl();

		// Call Row_Rendering event
		$t_nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// PK_NGANH_ID

		$t_nganhnghe->PK_NGANH_ID->CellCssStyle = ""; $t_nganhnghe->PK_NGANH_ID->CellCssClass = "";
		$t_nganhnghe->PK_NGANH_ID->CellAttrs = array(); $t_nganhnghe->PK_NGANH_ID->ViewAttrs = array(); $t_nganhnghe->PK_NGANH_ID->EditAttrs = array();

		// C_TENNGANH
		$t_nganhnghe->C_TENNGANH->CellCssStyle = ""; $t_nganhnghe->C_TENNGANH->CellCssClass = "";
		$t_nganhnghe->C_TENNGANH->CellAttrs = array(); $t_nganhnghe->C_TENNGANH->ViewAttrs = array(); $t_nganhnghe->C_TENNGANH->EditAttrs = array();

		// C_TRANGTHAI
		$t_nganhnghe->C_TRANGTHAI->CellCssStyle = ""; $t_nganhnghe->C_TRANGTHAI->CellCssClass = "";
		$t_nganhnghe->C_TRANGTHAI->CellAttrs = array(); $t_nganhnghe->C_TRANGTHAI->ViewAttrs = array(); $t_nganhnghe->C_TRANGTHAI->EditAttrs = array();

		// C_BELONGTO
		$t_nganhnghe->C_BELONGTO->CellCssStyle = ""; $t_nganhnghe->C_BELONGTO->CellCssClass = "";
		$t_nganhnghe->C_BELONGTO->CellAttrs = array(); $t_nganhnghe->C_BELONGTO->ViewAttrs = array(); $t_nganhnghe->C_BELONGTO->EditAttrs = array();

		// C_USER_ADD
		$t_nganhnghe->C_USER_ADD->CellCssStyle = ""; $t_nganhnghe->C_USER_ADD->CellCssClass = "";
		$t_nganhnghe->C_USER_ADD->CellAttrs = array(); $t_nganhnghe->C_USER_ADD->ViewAttrs = array(); $t_nganhnghe->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_nganhnghe->C_ADD_TIME->CellCssStyle = ""; $t_nganhnghe->C_ADD_TIME->CellCssClass = "";
		$t_nganhnghe->C_ADD_TIME->CellAttrs = array(); $t_nganhnghe->C_ADD_TIME->ViewAttrs = array(); $t_nganhnghe->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_nganhnghe->C_USER_EDIT->CellCssStyle = ""; $t_nganhnghe->C_USER_EDIT->CellCssClass = "";
		$t_nganhnghe->C_USER_EDIT->CellAttrs = array(); $t_nganhnghe->C_USER_EDIT->ViewAttrs = array(); $t_nganhnghe->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_nganhnghe->C_EDIT_TIME->CellCssStyle = ""; $t_nganhnghe->C_EDIT_TIME->CellCssClass = "";
		$t_nganhnghe->C_EDIT_TIME->CellAttrs = array(); $t_nganhnghe->C_EDIT_TIME->ViewAttrs = array(); $t_nganhnghe->C_EDIT_TIME->EditAttrs = array();
		if ($t_nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGANH_ID
			$t_nganhnghe->PK_NGANH_ID->ViewValue = $t_nganhnghe->PK_NGANH_ID->CurrentValue;
			$t_nganhnghe->PK_NGANH_ID->CssStyle = "";
			$t_nganhnghe->PK_NGANH_ID->CssClass = "";
			$t_nganhnghe->PK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->ViewValue = $t_nganhnghe->C_TENNGANH->CurrentValue;
			$t_nganhnghe->C_TENNGANH->CssStyle = "";
			$t_nganhnghe->C_TENNGANH->CssClass = "";
			$t_nganhnghe->C_TENNGANH->ViewCustomAttributes = "";

			// C_TRANGTHAI
                        if (strval($t_nganhnghe->C_TRANGTHAI->CurrentValue) <> "") {
				switch ($t_nganhnghe->C_TRANGTHAI->CurrentValue) {
					case "0":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Chưa hiển thị ngành";
						break;
					case "1":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Hiển thị ngành";
						break;
					default:
						$t_nganhnghe->C_TRANGTHAI->ViewValue = $t_nganhnghe->C_TRANGTHAI->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_TRANGTHAI->ViewValue = NULL;
			}
			
			$t_nganhnghe->C_TRANGTHAI->CssStyle = "";
			$t_nganhnghe->C_TRANGTHAI->CssClass = "";
			$t_nganhnghe->C_TRANGTHAI->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->ViewValue = $t_nganhnghe->C_BELONGTO->CurrentValue;
			$t_nganhnghe->C_BELONGTO->CssStyle = "";
			$t_nganhnghe->C_BELONGTO->CssClass = "";
			$t_nganhnghe->C_BELONGTO->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
			if (strval($t_nganhnghe->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_ADD->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_ADD->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_ADD->CssStyle = "";
			$t_nganhnghe->C_USER_ADD->CssClass = "";
			$t_nganhnghe->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->ViewValue = $t_nganhnghe->C_ADD_TIME->CurrentValue;
			$t_nganhnghe->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_ADD_TIME->ViewValue, 11);
			$t_nganhnghe->C_ADD_TIME->CssStyle = "";
			$t_nganhnghe->C_ADD_TIME->CssClass = "";
			$t_nganhnghe->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
			if (strval($t_nganhnghe->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_EDIT->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_EDIT->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_EDIT->CssStyle = "";
			$t_nganhnghe->C_USER_EDIT->CssClass = "";
			$t_nganhnghe->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->ViewValue = $t_nganhnghe->C_EDIT_TIME->CurrentValue;
			$t_nganhnghe->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_EDIT_TIME->ViewValue, 11);
			$t_nganhnghe->C_EDIT_TIME->CssStyle = "";
			$t_nganhnghe->C_EDIT_TIME->CssClass = "";
			$t_nganhnghe->C_EDIT_TIME->ViewCustomAttributes = "";

			// PK_NGANH_ID
			$t_nganhnghe->PK_NGANH_ID->HrefValue = "";
			$t_nganhnghe->PK_NGANH_ID->TooltipValue = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->HrefValue = "";
			$t_nganhnghe->C_TENNGANH->TooltipValue = "";

			// C_TRANGTHAI
			$t_nganhnghe->C_TRANGTHAI->HrefValue = "";
			$t_nganhnghe->C_TRANGTHAI->TooltipValue = "";

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->HrefValue = "";
			$t_nganhnghe->C_BELONGTO->TooltipValue = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->HrefValue = "";
			$t_nganhnghe->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->HrefValue = "";
			$t_nganhnghe->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->HrefValue = "";
			$t_nganhnghe->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->HrefValue = "";
			$t_nganhnghe->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_nganhnghe->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_nganhnghe->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_nganhnghe;
		$utf8 = FALSE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_nganhnghe->SelectRecordCount();
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
		if ($t_nganhnghe->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_nganhnghe, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_nganhnghe->PK_NGANH_ID);
				$ExportDoc->ExportCaption($t_nganhnghe->C_TENNGANH);
				$ExportDoc->ExportCaption($t_nganhnghe->C_TRANGTHAI);
				$ExportDoc->ExportCaption($t_nganhnghe->C_BELONGTO);
				$ExportDoc->ExportCaption($t_nganhnghe->C_USER_ADD);
				$ExportDoc->ExportCaption($t_nganhnghe->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_nganhnghe->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_nganhnghe->C_EDIT_TIME);
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
				$t_nganhnghe->CssClass = "";
				$t_nganhnghe->CssStyle = "";
				$t_nganhnghe->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_nganhnghe->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_NGANH_ID', $t_nganhnghe->PK_NGANH_ID->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_TENNGANH', $t_nganhnghe->C_TENNGANH->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_TRANGTHAI', $t_nganhnghe->C_TRANGTHAI->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_BELONGTO', $t_nganhnghe->C_BELONGTO->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_nganhnghe->C_USER_ADD->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_nganhnghe->C_ADD_TIME->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_nganhnghe->C_USER_EDIT->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_nganhnghe->C_EDIT_TIME->ExportValue($t_nganhnghe->Export, $t_nganhnghe->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_nganhnghe->PK_NGANH_ID);
					$ExportDoc->ExportField($t_nganhnghe->C_TENNGANH);
					$ExportDoc->ExportField($t_nganhnghe->C_TRANGTHAI);
					$ExportDoc->ExportField($t_nganhnghe->C_BELONGTO);
					$ExportDoc->ExportField($t_nganhnghe->C_USER_ADD);
					$ExportDoc->ExportField($t_nganhnghe->C_ADD_TIME);
					$ExportDoc->ExportField($t_nganhnghe->C_USER_EDIT);
					$ExportDoc->ExportField($t_nganhnghe->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_nganhnghe->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_nganhnghe->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_nganhnghe->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_nganhnghe->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_nganhnghe->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_nganhnghe;
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
		if ($t_nganhnghe->Email_Sending($Email, $EventArgs))
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
		global $t_nganhnghe;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_nganhnghe->KeyUrl("", ""), 1);
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
