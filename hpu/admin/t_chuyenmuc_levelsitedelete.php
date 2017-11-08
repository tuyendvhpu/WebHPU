<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_chuyenmuc_levelsiteinfo.php" ?>
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
$t_chuyenmuc_levelsite_delete = new ct_chuyenmuc_levelsite_delete();
$Page =& $t_chuyenmuc_levelsite_delete;

// Page init
$t_chuyenmuc_levelsite_delete->Page_Init();

// Page main
$t_chuyenmuc_levelsite_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_chuyenmuc_levelsite_delete = new ew_Page("t_chuyenmuc_levelsite_delete");

// page properties
t_chuyenmuc_levelsite_delete.PageID = "delete"; // page ID
t_chuyenmuc_levelsite_delete.FormID = "ft_chuyenmuc_levelsitedelete"; // form ID
var EW_PAGE_ID = t_chuyenmuc_levelsite_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_chuyenmuc_levelsite_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_chuyenmuc_levelsite_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_chuyenmuc_levelsite_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_chuyenmuc_levelsite_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_chuyenmuc_levelsite_delete->LoadRecordset())
	$t_chuyenmuc_levelsite_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_chuyenmuc_levelsite_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_chuyenmuc_levelsite_delete->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_chuyenmuc_levelsite->TableCaption() ?><br><br>
<a href="<?php echo $t_chuyenmuc_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_chuyenmuc_levelsite_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_chuyenmuc_levelsite">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_chuyenmuc_levelsite_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_chuyenmuc_levelsite->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_chuyenmuc_levelsite->C_NAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_chuyenmuc_levelsite->C_TYPE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_chuyenmuc_levelsite->C_ORDER->FldCaption() ?></td>
		<td valign="top"><?php echo $t_chuyenmuc_levelsite->C_STATUS->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_chuyenmuc_levelsite_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_chuyenmuc_levelsite_delete->lRecCnt++;

	// Set row properties
	$t_chuyenmuc_levelsite->CssClass = "";
	$t_chuyenmuc_levelsite->CssStyle = "";
	$t_chuyenmuc_levelsite->RowAttrs = array();
	$t_chuyenmuc_levelsite->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_chuyenmuc_levelsite_delete->LoadRowValues($rs);

	// Render row
	$t_chuyenmuc_levelsite_delete->RenderRow();
?>
	<tr<?php echo $t_chuyenmuc_levelsite->RowAttributes() ?>>
		<td<?php echo $t_chuyenmuc_levelsite->C_NAME->CellAttributes() ?>>
<div<?php echo $t_chuyenmuc_levelsite->C_NAME->ViewAttributes() ?>><?php echo $t_chuyenmuc_levelsite->C_NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_chuyenmuc_levelsite->C_TYPE->ViewAttributes() ?>><?php echo $t_chuyenmuc_levelsite->C_TYPE->ListViewValue() ?></div></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_chuyenmuc_levelsite->C_ORDER->ViewAttributes() ?>><?php echo $t_chuyenmuc_levelsite->C_ORDER->ListViewValue() ?></div></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_STATUS->CellAttributes() ?>>
<div<?php echo $t_chuyenmuc_levelsite->C_STATUS->ViewAttributes() ?>><?php echo $t_chuyenmuc_levelsite->C_STATUS->ListViewValue() ?></div></td>
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
$t_chuyenmuc_levelsite_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_chuyenmuc_levelsite_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_chuyenmuc_levelsite';

	// Page object name
	var $PageObjName = 't_chuyenmuc_levelsite_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_chuyenmuc_levelsite;
		if ($t_chuyenmuc_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_chuyenmuc_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_chuyenmuc_levelsite;
		if ($t_chuyenmuc_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_chuyenmuc_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_chuyenmuc_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_chuyenmuc_levelsite_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_chuyenmuc_levelsite)
		$GLOBALS["t_chuyenmuc_levelsite"] = new ct_chuyenmuc_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_chuyenmuc_levelsite', TRUE);

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
		global $t_chuyenmuc_levelsite;

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
			$this->Page_Terminate("t_chuyenmuc_levelsitelist.php");
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
		global $Language, $t_chuyenmuc_levelsite;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_CHUYENMUC"] <> "") {
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->setQueryStringValue($_GET["PK_CHUYENMUC"]);
			if (!is_numeric($t_chuyenmuc_levelsite->PK_CHUYENMUC->QueryStringValue))
				$this->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // Prevent SQL injection, exit
			$sKey .= $t_chuyenmuc_levelsite->PK_CHUYENMUC->QueryStringValue;
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
			$this->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_CHUYENMUC`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_chuyenmuc_levelsite class, t_chuyenmuc_levelsiteinfo.php

		$t_chuyenmuc_levelsite->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_chuyenmuc_levelsite->CurrentAction = $_POST["a_delete"];
		} else {
			$t_chuyenmuc_levelsite->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_chuyenmuc_levelsite->CurrentAction) {
			case "D": // Delete
				$t_chuyenmuc_levelsite->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_chuyenmuc_levelsite->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_chuyenmuc_levelsite;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_chuyenmuc_levelsite->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_chuyenmuc_levelsite class, t_chuyenmuc_levelsiteinfo.php

		$t_chuyenmuc_levelsite->CurrentFilter = $sWrkFilter;
		$sSql = $t_chuyenmuc_levelsite->SQL();
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
				$DeleteRows = $t_chuyenmuc_levelsite->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_CHUYENMUC'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_chuyenmuc_levelsite->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_chuyenmuc_levelsite->CancelMessage <> "") {
				$this->setMessage($t_chuyenmuc_levelsite->CancelMessage);
				$t_chuyenmuc_levelsite->CancelMessage = "";
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
				$t_chuyenmuc_levelsite->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_chuyenmuc_levelsite;

		// Call Recordset Selecting event
		$t_chuyenmuc_levelsite->Recordset_Selecting($t_chuyenmuc_levelsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_chuyenmuc_levelsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_chuyenmuc_levelsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_chuyenmuc_levelsite;
		$sFilter = $t_chuyenmuc_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_chuyenmuc_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_chuyenmuc_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_chuyenmuc_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_chuyenmuc_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_chuyenmuc_levelsite;
		$t_chuyenmuc_levelsite->PK_CHUYENMUC->setDbValue($rs->fields('PK_CHUYENMUC'));
		$t_chuyenmuc_levelsite->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_chuyenmuc_levelsite->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_chuyenmuc_levelsite->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_chuyenmuc_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_chuyenmuc_levelsite->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_chuyenmuc_levelsite->C_PARENT->setDbValue($rs->fields('C_PARENT'));
		$t_chuyenmuc_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_chuyenmuc_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_chuyenmuc_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_chuyenmuc_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_chuyenmuc_levelsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_chuyenmuc_levelsite->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_chuyenmuc_levelsite->C_NAME->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_NAME->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_NAME->CellAttrs = array(); $t_chuyenmuc_levelsite->C_NAME->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_NAME->EditAttrs = array();

		// C_TYPE
		$t_chuyenmuc_levelsite->C_TYPE->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_TYPE->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_TYPE->CellAttrs = array(); $t_chuyenmuc_levelsite->C_TYPE->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_TYPE->EditAttrs = array();

		// C_ORDER
		$t_chuyenmuc_levelsite->C_ORDER->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_ORDER->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_ORDER->CellAttrs = array(); $t_chuyenmuc_levelsite->C_ORDER->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_ORDER->EditAttrs = array();

		// C_STATUS
		$t_chuyenmuc_levelsite->C_STATUS->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_STATUS->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_STATUS->CellAttrs = array(); $t_chuyenmuc_levelsite->C_STATUS->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_STATUS->EditAttrs = array();
		if ($t_chuyenmuc_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_CHUYENMUC
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->ViewValue = $t_chuyenmuc_levelsite->PK_CHUYENMUC->CurrentValue;
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->CssStyle = "";
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->CssClass = "";
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = $t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue;
			if (strval($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = $t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->FK_CONGTY->CssStyle = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->CssClass = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->ViewValue = $t_chuyenmuc_levelsite->C_NAME->CurrentValue;
			$t_chuyenmuc_levelsite->C_NAME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_NAME->CssClass = "";
			$t_chuyenmuc_levelsite->C_NAME->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_chuyenmuc_levelsite->C_TYPE->CurrentValue) <> "") {
				switch ($t_chuyenmuc_levelsite->C_TYPE->CurrentValue) {
					case "0":
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = "Chuyen muc 1 bai viet";
						break;
					case "1":
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = "Chuyen muc list bai viet";
						break;
					default:
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = $t_chuyenmuc_levelsite->C_TYPE->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->C_TYPE->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->C_TYPE->CssStyle = "";
			$t_chuyenmuc_levelsite->C_TYPE->CssClass = "";
			$t_chuyenmuc_levelsite->C_TYPE->ViewCustomAttributes = "";

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->ViewValue = $t_chuyenmuc_levelsite->C_ORDER->CurrentValue;
			$t_chuyenmuc_levelsite->C_ORDER->CssStyle = "";
			$t_chuyenmuc_levelsite->C_ORDER->CssClass = "";
			$t_chuyenmuc_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_chuyenmuc_levelsite->C_STATUS->CurrentValue) <> "") {
				switch ($t_chuyenmuc_levelsite->C_STATUS->CurrentValue) {
					case "0":
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = $t_chuyenmuc_levelsite->C_STATUS->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->C_STATUS->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->C_STATUS->CssStyle = "";
			$t_chuyenmuc_levelsite->C_STATUS->CssClass = "";
			$t_chuyenmuc_levelsite->C_STATUS->ViewCustomAttributes = "";

			// C_PARENT
			$t_chuyenmuc_levelsite->C_PARENT->ViewValue = $t_chuyenmuc_levelsite->C_PARENT->CurrentValue;
			$t_chuyenmuc_levelsite->C_PARENT->CssStyle = "";
			$t_chuyenmuc_levelsite->C_PARENT->CssClass = "";
			$t_chuyenmuc_levelsite->C_PARENT->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_chuyenmuc_levelsite->C_USER_ADD->ViewValue = $t_chuyenmuc_levelsite->C_USER_ADD->CurrentValue;
			$t_chuyenmuc_levelsite->C_USER_ADD->CssStyle = "";
			$t_chuyenmuc_levelsite->C_USER_ADD->CssClass = "";
			$t_chuyenmuc_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue = $t_chuyenmuc_levelsite->C_ADD_TIME->CurrentValue;
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_chuyenmuc_levelsite->C_ADD_TIME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_ADD_TIME->CssClass = "";
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_chuyenmuc_levelsite->C_USER_EDIT->ViewValue = $t_chuyenmuc_levelsite->C_USER_EDIT->CurrentValue;
			$t_chuyenmuc_levelsite->C_USER_EDIT->CssStyle = "";
			$t_chuyenmuc_levelsite->C_USER_EDIT->CssClass = "";
			$t_chuyenmuc_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue = $t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue;
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_chuyenmuc_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_EDIT_TIME->CssClass = "";
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->HrefValue = "";
			$t_chuyenmuc_levelsite->C_NAME->TooltipValue = "";

			// C_TYPE
			$t_chuyenmuc_levelsite->C_TYPE->HrefValue = "";
			$t_chuyenmuc_levelsite->C_TYPE->TooltipValue = "";

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->HrefValue = "";
			$t_chuyenmuc_levelsite->C_ORDER->TooltipValue = "";

			// C_STATUS
			$t_chuyenmuc_levelsite->C_STATUS->HrefValue = "";
			$t_chuyenmuc_levelsite->C_STATUS->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_chuyenmuc_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_chuyenmuc_levelsite->Row_Rendered();
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
