<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_linkadinfo.php" ?>
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
$t_linkad_delete = new ct_linkad_delete();
$Page =& $t_linkad_delete;

// Page init
$t_linkad_delete->Page_Init();

// Page main
$t_linkad_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_linkad_delete = new ew_Page("t_linkad_delete");

// page properties
t_linkad_delete.PageID = "delete"; // page ID
t_linkad_delete.FormID = "ft_linkaddelete"; // form ID
var EW_PAGE_ID = t_linkad_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_linkad_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_linkad_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_linkad_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_linkad_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_linkad_delete->LoadRecordset())
	$t_linkad_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_linkad_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_linkad_delete->Page_Terminate("t_linkadlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_linkad->TableCaption() ?><br><br>
<a href="<?php echo $t_linkad->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_linkad_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_linkad">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_linkad_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_linkad->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_linkad->C_LINKAD_NAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_linkad->C_LINKAD_TYPE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_linkad->C_LINKAD_URL->FldCaption() ?></td>
		<td valign="top"><?php echo $t_linkad->C_LINKAD_POS->FldCaption() ?></td>
		<td valign="top"><?php echo $t_linkad->C_LINKAD_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_linkad->C_ORDER->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_linkad_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_linkad_delete->lRecCnt++;

	// Set row properties
	$t_linkad->CssClass = "";
	$t_linkad->CssStyle = "";
	$t_linkad->RowAttrs = array();
	$t_linkad->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_linkad_delete->LoadRowValues($rs);

	// Render row
	$t_linkad_delete->RenderRow();
?>
	<tr<?php echo $t_linkad->RowAttributes() ?>>
		<td<?php echo $t_linkad->C_LINKAD_NAME->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_NAME->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_linkad->C_LINKAD_TYPE->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_TYPE->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_TYPE->ListViewValue() ?></div></td>
		<td<?php echo $t_linkad->C_LINKAD_URL->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_URL->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_URL->ListViewValue() ?></div></td>
		<td<?php echo $t_linkad->C_LINKAD_POS->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_POS->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_POS->ListViewValue() ?></div></td>
		<td<?php echo $t_linkad->C_LINKAD_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_linkad->C_LINKAD_ACTIVE->ViewAttributes() ?>><?php echo $t_linkad->C_LINKAD_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_linkad->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_linkad->C_ORDER->ViewAttributes() ?>><?php echo $t_linkad->C_ORDER->ListViewValue() ?></div></td>
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
$t_linkad_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_linkad_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_linkad';

	// Page object name
	var $PageObjName = 't_linkad_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_linkad;
		if ($t_linkad->UseTokenInUrl) $PageUrl .= "t=" . $t_linkad->TableVar . "&"; // Add page token
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
		global $objForm, $t_linkad;
		if ($t_linkad->UseTokenInUrl) {
			if ($objForm)
				return ($t_linkad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_linkad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_linkad_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_linkad)
		$GLOBALS["t_linkad"] = new ct_linkad();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_linkad', TRUE);

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
		global $t_linkad;

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
			$this->Page_Terminate("t_linkadlist.php");
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
		global $Language, $t_linkad;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["C_LINKAD_ID"] <> "") {
			$t_linkad->C_LINKAD_ID->setQueryStringValue($_GET["C_LINKAD_ID"]);
			if (!is_numeric($t_linkad->C_LINKAD_ID->QueryStringValue))
				$this->Page_Terminate("t_linkadlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_linkad->C_LINKAD_ID->QueryStringValue;
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
			$this->Page_Terminate("t_linkadlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_linkadlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`C_LINKAD_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_linkad class, t_linkadinfo.php

		$t_linkad->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_linkad->CurrentAction = $_POST["a_delete"];
		} else {
			$t_linkad->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_linkad->CurrentAction) {
			case "D": // Delete
				$t_linkad->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_linkad->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_linkad;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_linkad->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_linkad class, t_linkadinfo.php

		$t_linkad->CurrentFilter = $sWrkFilter;
		$sSql = $t_linkad->SQL();
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
				$DeleteRows = $t_linkad->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['C_LINKAD_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_linkad->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_linkad->CancelMessage <> "") {
				$this->setMessage($t_linkad->CancelMessage);
				$t_linkad->CancelMessage = "";
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
				$t_linkad->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_linkad;

		// Call Recordset Selecting event
		$t_linkad->Recordset_Selecting($t_linkad->CurrentFilter);

		// Load List page SQL
		$sSql = $t_linkad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_linkad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_linkad;
		$sFilter = $t_linkad->KeyFilter();

		// Call Row Selecting event
		$t_linkad->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_linkad->CurrentFilter = $sFilter;
		$sSql = $t_linkad->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_linkad->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_linkad;
		$t_linkad->C_LINKAD_ID->setDbValue($rs->fields('C_LINKAD_ID'));
		$t_linkad->C_LINKAD_NAME->setDbValue($rs->fields('C_LINKAD_NAME'));
		$t_linkad->C_LINKAD_DES->setDbValue($rs->fields('C_LINKAD_DES'));
		$t_linkad->C_LINKAD_TYPE->setDbValue($rs->fields('C_LINKAD_TYPE'));
		$t_linkad->C_LINKAD_URL->setDbValue($rs->fields('C_LINKAD_URL'));
		$t_linkad->C_LINKAD_POS->setDbValue($rs->fields('C_LINKAD_POS'));
		$t_linkad->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_linkad->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_linkad->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_linkad->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_linkad->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_linkad->C_IMG_SOURCE->setDbValue($rs->fields('C_IMG_SOURCE'));
		$t_linkad->C_LINKAD_ACTIVE->setDbValue($rs->fields('C_LINKAD_ACTIVE'));
		$t_linkad->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_linkad->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_linkad;

		// Initialize URLs
		// Call Row_Rendering event

		$t_linkad->Row_Rendering();

		// Common render codes for all row types
		// C_LINKAD_NAME

		$t_linkad->C_LINKAD_NAME->CellCssStyle = ""; $t_linkad->C_LINKAD_NAME->CellCssClass = "";
		$t_linkad->C_LINKAD_NAME->CellAttrs = array(); $t_linkad->C_LINKAD_NAME->ViewAttrs = array(); $t_linkad->C_LINKAD_NAME->EditAttrs = array();

		// C_LINKAD_TYPE
		$t_linkad->C_LINKAD_TYPE->CellCssStyle = ""; $t_linkad->C_LINKAD_TYPE->CellCssClass = "";
		$t_linkad->C_LINKAD_TYPE->CellAttrs = array(); $t_linkad->C_LINKAD_TYPE->ViewAttrs = array(); $t_linkad->C_LINKAD_TYPE->EditAttrs = array();

		// C_LINKAD_URL
		$t_linkad->C_LINKAD_URL->CellCssStyle = ""; $t_linkad->C_LINKAD_URL->CellCssClass = "";
		$t_linkad->C_LINKAD_URL->CellAttrs = array(); $t_linkad->C_LINKAD_URL->ViewAttrs = array(); $t_linkad->C_LINKAD_URL->EditAttrs = array();

		// C_LINKAD_POS
		$t_linkad->C_LINKAD_POS->CellCssStyle = ""; $t_linkad->C_LINKAD_POS->CellCssClass = "";
		$t_linkad->C_LINKAD_POS->CellAttrs = array(); $t_linkad->C_LINKAD_POS->ViewAttrs = array(); $t_linkad->C_LINKAD_POS->EditAttrs = array();

		// C_LINKAD_ACTIVE
		$t_linkad->C_LINKAD_ACTIVE->CellCssStyle = ""; $t_linkad->C_LINKAD_ACTIVE->CellCssClass = "";
		$t_linkad->C_LINKAD_ACTIVE->CellAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->ViewAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_linkad->C_ORDER->CellCssStyle = ""; $t_linkad->C_ORDER->CellCssClass = "";
		$t_linkad->C_ORDER->CellAttrs = array(); $t_linkad->C_ORDER->ViewAttrs = array(); $t_linkad->C_ORDER->EditAttrs = array();
		if ($t_linkad->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_LINKAD_ID
			$t_linkad->C_LINKAD_ID->ViewValue = $t_linkad->C_LINKAD_ID->CurrentValue;
			$t_linkad->C_LINKAD_ID->CssStyle = "";
			$t_linkad->C_LINKAD_ID->CssClass = "";
			$t_linkad->C_LINKAD_ID->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->ViewValue = $t_linkad->C_LINKAD_NAME->CurrentValue;
			$t_linkad->C_LINKAD_NAME->CssStyle = "";
			$t_linkad->C_LINKAD_NAME->CssClass = "";
			$t_linkad->C_LINKAD_NAME->ViewCustomAttributes = "";

			// C_LINKAD_TYPE
			if (strval($t_linkad->C_LINKAD_TYPE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_TYPE->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_TYPE->ViewValue = "slide";
						break;
					default:
						$t_linkad->C_LINKAD_TYPE->ViewValue = $t_linkad->C_LINKAD_TYPE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_TYPE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_TYPE->CssStyle = "";
			$t_linkad->C_LINKAD_TYPE->CssClass = "";
			$t_linkad->C_LINKAD_TYPE->ViewCustomAttributes = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->ViewValue = $t_linkad->C_LINKAD_URL->CurrentValue;
			$t_linkad->C_LINKAD_URL->CssStyle = "";
			$t_linkad->C_LINKAD_URL->CssClass = "";
			$t_linkad->C_LINKAD_URL->ViewCustomAttributes = "";

			// C_LINKAD_POS
			if (strval($t_linkad->C_LINKAD_POS->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_POS->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_POS->ViewValue = "Trang chu";
						break;
					default:
						$t_linkad->C_LINKAD_POS->ViewValue = $t_linkad->C_LINKAD_POS->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_POS->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_POS->CssStyle = "";
			$t_linkad->C_LINKAD_POS->CssClass = "";
			$t_linkad->C_LINKAD_POS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_linkad->C_USER_ADD->ViewValue = $t_linkad->C_USER_ADD->CurrentValue;
			$t_linkad->C_USER_ADD->CssStyle = "";
			$t_linkad->C_USER_ADD->CssClass = "";
			$t_linkad->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_linkad->C_ADD_TIME->ViewValue = $t_linkad->C_ADD_TIME->CurrentValue;
			$t_linkad->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_ADD_TIME->ViewValue, 7);
			$t_linkad->C_ADD_TIME->CssStyle = "";
			$t_linkad->C_ADD_TIME->CssClass = "";
			$t_linkad->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_linkad->C_USER_EDIT->ViewValue = $t_linkad->C_USER_EDIT->CurrentValue;
			$t_linkad->C_USER_EDIT->CssStyle = "";
			$t_linkad->C_USER_EDIT->CssClass = "";
			$t_linkad->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_linkad->C_EDIT_TIME->ViewValue = $t_linkad->C_EDIT_TIME->CurrentValue;
			$t_linkad->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_EDIT_TIME->ViewValue, 7);
			$t_linkad->C_EDIT_TIME->CssStyle = "";
			$t_linkad->C_EDIT_TIME->CssClass = "";
			$t_linkad->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_linkad->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_linkad->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_linkad->C_SEND_MAIL->ViewValue = "Khong gui mail";
						break;
					case "1":
						$t_linkad->C_SEND_MAIL->ViewValue = "Gui mail cho bo phan thiet ke";
						break;
					default:
						$t_linkad->C_SEND_MAIL->ViewValue = $t_linkad->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_linkad->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_linkad->C_SEND_MAIL->CssStyle = "";
			$t_linkad->C_SEND_MAIL->CssClass = "";
			$t_linkad->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_LINKAD_ACTIVE
			if (strval($t_linkad->C_LINKAD_ACTIVE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_ACTIVE->CurrentValue) {
					case "0":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "No Active";
						break;
					case "1":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "Active";
						break;
					default:
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = $t_linkad->C_LINKAD_ACTIVE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_ACTIVE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_ACTIVE->CssStyle = "";
			$t_linkad->C_LINKAD_ACTIVE->CssClass = "";
			$t_linkad->C_LINKAD_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_linkad->C_ORDER->ViewValue = $t_linkad->C_ORDER->CurrentValue;
			$t_linkad->C_ORDER->ViewValue = ew_FormatDateTime($t_linkad->C_ORDER->ViewValue, 7);
			$t_linkad->C_ORDER->CssStyle = "";
			$t_linkad->C_ORDER->CssClass = "";
			$t_linkad->C_ORDER->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_linkad->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_linkad->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_linkad->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_linkad->FK_CONGTY->ViewValue = $t_linkad->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_linkad->FK_CONGTY->ViewValue = NULL;
			}
			$t_linkad->FK_CONGTY->CssStyle = "";
			$t_linkad->FK_CONGTY->CssClass = "";
			$t_linkad->FK_CONGTY->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->HrefValue = "";
			$t_linkad->C_LINKAD_NAME->TooltipValue = "";

			// C_LINKAD_TYPE
			$t_linkad->C_LINKAD_TYPE->HrefValue = "";
			$t_linkad->C_LINKAD_TYPE->TooltipValue = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->HrefValue = "";
			$t_linkad->C_LINKAD_URL->TooltipValue = "";

			// C_LINKAD_POS
			$t_linkad->C_LINKAD_POS->HrefValue = "";
			$t_linkad->C_LINKAD_POS->TooltipValue = "";

			// C_LINKAD_ACTIVE
			$t_linkad->C_LINKAD_ACTIVE->HrefValue = "";
			$t_linkad->C_LINKAD_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_linkad->C_ORDER->HrefValue = "";
			$t_linkad->C_ORDER->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_linkad->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_linkad->Row_Rendered();
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
