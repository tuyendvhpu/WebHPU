<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_congtyinfo.php" ?>
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
$t_congty_delete = new ct_congty_delete();
$Page =& $t_congty_delete;

// Page init
$t_congty_delete->Page_Init();

// Page main
$t_congty_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_congty_delete = new ew_Page("t_congty_delete");

// page properties
t_congty_delete.PageID = "delete"; // page ID
t_congty_delete.FormID = "ft_congtydelete"; // form ID
var EW_PAGE_ID = t_congty_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_congty_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_congty_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_congty_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_congty_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
if ($rs = $t_congty_delete->LoadRecordset())
	$t_congty_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_congty_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_congty_delete->Page_Terminate("t_congtylist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_congty->TableCaption() ?><br><br>
<a href="<?php echo $t_congty->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_congty_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_congty">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_congty_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_congty->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_congty->C_TENCONGTY->FldCaption() ?></td>
		<td valign="top"><?php echo $t_congty->C_TYPE_TEMPLATE->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_congty_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_congty_delete->lRecCnt++;

	// Set row properties
	$t_congty->CssClass = "";
	$t_congty->CssStyle = "";
	$t_congty->RowAttrs = array();
	$t_congty->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_congty_delete->LoadRowValues($rs);

	// Render row
	$t_congty_delete->RenderRow();
?>
	<tr<?php echo $t_congty->RowAttributes() ?>>
		<td<?php echo $t_congty->FK_NGANH_ID->CellAttributes() ?>>
<div<?php echo $t_congty->FK_NGANH_ID->ViewAttributes() ?>><?php echo $t_congty->FK_NGANH_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_congty->C_TENCONGTY->CellAttributes() ?>>
<div<?php echo $t_congty->C_TENCONGTY->ViewAttributes() ?>><?php echo $t_congty->C_TENCONGTY->ListViewValue() ?></div></td>
		<td<?php echo $t_congty->C_TYPE_TEMPLATE->CellAttributes() ?>>
<div<?php echo $t_congty->C_TYPE_TEMPLATE->ViewAttributes() ?>><?php echo $t_congty->C_TYPE_TEMPLATE->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo ew_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_congty_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_congty_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_congty';

	// Page object name
	var $PageObjName = 't_congty_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_congty;
		if ($t_congty->UseTokenInUrl) $PageUrl .= "t=" . $t_congty->TableVar . "&"; // Add page token
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
		global $objForm, $t_congty;
		if ($t_congty->UseTokenInUrl) {
			if ($objForm)
				return ($t_congty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_congty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_congty_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_congty)
		$GLOBALS["t_congty"] = new ct_congty();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_congty', TRUE);

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
		global $t_congty;

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
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_congtylist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $t_congty;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_MACONGTY"] <> "") {
			$t_congty->PK_MACONGTY->setQueryStringValue($_GET["PK_MACONGTY"]);
			if (!is_numeric($t_congty->PK_MACONGTY->QueryStringValue))
				$this->Page_Terminate("t_congtylist.php"); // Prevent SQL injection, exit
			$sKey .= $t_congty->PK_MACONGTY->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("t_congtylist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_congtylist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_MACONGTY`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_congty class, t_congtyinfo.php

		$t_congty->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_congty->CurrentAction = $_POST["a_delete"];
		} else {
			$t_congty->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_congty->CurrentAction) {
			case "D": // Delete
				$t_congty->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_congty->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_congty;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_congty->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_congty class, t_congtyinfo.php

		$t_congty->CurrentFilter = $sWrkFilter;
		$sSql = $t_congty->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $t_congty->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_MACONGTY'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_congty->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_congty->CancelMessage <> "") {
				$this->setMessage($t_congty->CancelMessage);
				$t_congty->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$t_congty->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_congty;

		// Call Recordset Selecting event
		$t_congty->Recordset_Selecting($t_congty->CurrentFilter);

		// Load List page SQL
		$sSql = $t_congty->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_congty->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_congty;
		$sFilter = $t_congty->KeyFilter();

		// Call Row Selecting event
		$t_congty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_congty->CurrentFilter = $sFilter;
		$sSql = $t_congty->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_congty->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_congty;
		$t_congty->PK_MACONGTY->setDbValue($rs->fields('PK_MACONGTY'));
		$t_congty->FK_NGANH_ID->setDbValue($rs->fields('FK_NGANH_ID'));
		$t_congty->C_TENCONGTY->setDbValue($rs->fields('C_TENCONGTY'));
		$t_congty->C_TENVIETTAT->setDbValue($rs->fields('C_TENVIETTAT'));
		$t_congty->C_LOGO->Upload->DbValue = $rs->fields('C_LOGO');
		$t_congty->C_WEBSITE->setDbValue($rs->fields('C_WEBSITE'));
		$t_congty->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$t_congty->C_DIENTHOAI->setDbValue($rs->fields('C_DIENTHOAI'));
		$t_congty->C_FAX->setDbValue($rs->fields('C_FAX'));
		$t_congty->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_congty->C_MOTA->setDbValue($rs->fields('C_MOTA'));
		$t_congty->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_congty->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_congty->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_congty->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_congty->C_REPORT_STATUS->setDbValue($rs->fields('C_REPORT_STATUS'));
		$t_congty->C_TYPE_TEMPLATE->setDbValue($rs->fields('C_TYPE_TEMPLATE'));
		$t_congty->C_PARRENT->setDbValue($rs->fields('C_PARRENT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_congty;

		// Initialize URLs
		// Call Row_Rendering event

		$t_congty->Row_Rendering();

		// Common render codes for all row types
		// FK_NGANH_ID

		$t_congty->FK_NGANH_ID->CellCssStyle = ""; $t_congty->FK_NGANH_ID->CellCssClass = "";
		$t_congty->FK_NGANH_ID->CellAttrs = array(); $t_congty->FK_NGANH_ID->ViewAttrs = array(); $t_congty->FK_NGANH_ID->EditAttrs = array();

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->CellCssStyle = ""; $t_congty->C_TENCONGTY->CellCssClass = "";
		$t_congty->C_TENCONGTY->CellAttrs = array(); $t_congty->C_TENCONGTY->ViewAttrs = array(); $t_congty->C_TENCONGTY->EditAttrs = array();

		// C_TYPE_TEMPLATE
		$t_congty->C_TYPE_TEMPLATE->CellCssStyle = ""; $t_congty->C_TYPE_TEMPLATE->CellCssClass = "";
		$t_congty->C_TYPE_TEMPLATE->CellAttrs = array(); $t_congty->C_TYPE_TEMPLATE->ViewAttrs = array(); $t_congty->C_TYPE_TEMPLATE->EditAttrs = array();
		if ($t_congty->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_NGANH_ID
			if (strval($t_congty->FK_NGANH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGANH_ID` = " . ew_AdjustSql($t_congty->FK_NGANH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENNGANH` FROM `t_nganhnghe`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_congty->FK_NGANH_ID->ViewValue = $rswrk->fields('C_TENNGANH');
					$rswrk->Close();
				} else {
					$t_congty->FK_NGANH_ID->ViewValue = $t_congty->FK_NGANH_ID->CurrentValue;
				}
			} else {
				$t_congty->FK_NGANH_ID->ViewValue = NULL;
			}
			$t_congty->FK_NGANH_ID->CssStyle = "";
			$t_congty->FK_NGANH_ID->CssClass = "";
			$t_congty->FK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->ViewValue = $t_congty->C_TENCONGTY->CurrentValue;
			$t_congty->C_TENCONGTY->CssStyle = "";
			$t_congty->C_TENCONGTY->CssClass = "";
			$t_congty->C_TENCONGTY->ViewCustomAttributes = "";

			// C_REPORT_STATUS
			if (strval($t_congty->C_REPORT_STATUS->CurrentValue) <> "") {
				switch ($t_congty->C_REPORT_STATUS->CurrentValue) {
					case "1":
						$t_congty->C_REPORT_STATUS->ViewValue = "Lay du lieu tong hop";
						break;
					case "2":
						$t_congty->C_REPORT_STATUS->ViewValue = "Khong lay du lieu tong hop";
						break;
					default:
						$t_congty->C_REPORT_STATUS->ViewValue = $t_congty->C_REPORT_STATUS->CurrentValue;
				}
			} else {
				$t_congty->C_REPORT_STATUS->ViewValue = NULL;
			}
			$t_congty->C_REPORT_STATUS->CssStyle = "";
			$t_congty->C_REPORT_STATUS->CssClass = "";
			$t_congty->C_REPORT_STATUS->ViewCustomAttributes = "";

			// C_TYPE_TEMPLATE
			if (strval($t_congty->C_TYPE_TEMPLATE->CurrentValue) <> "") {
				switch ($t_congty->C_TYPE_TEMPLATE->CurrentValue) {
					case "1":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 1";
						break;
					case "2":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 2";
						break;
					case "3":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 3";
						break;
					case "4":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 4";
						break;
					case "5":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 5";
						break;
					case "6":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 6";
						break;
					case "7":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 7";
						break;
					case "8":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 8";
						break;
					default:
						$t_congty->C_TYPE_TEMPLATE->ViewValue = $t_congty->C_TYPE_TEMPLATE->CurrentValue;
				}
			} else {
				$t_congty->C_TYPE_TEMPLATE->ViewValue = NULL;
			}
			$t_congty->C_TYPE_TEMPLATE->CssStyle = "";
			$t_congty->C_TYPE_TEMPLATE->CssClass = "";
			$t_congty->C_TYPE_TEMPLATE->ViewCustomAttributes = "";

			// FK_NGANH_ID
			$t_congty->FK_NGANH_ID->HrefValue = "";
			$t_congty->FK_NGANH_ID->TooltipValue = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->HrefValue = "";
			$t_congty->C_TENCONGTY->TooltipValue = "";

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->HrefValue = "";
			$t_congty->C_TYPE_TEMPLATE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_congty->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_congty->Row_Rendered();
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
