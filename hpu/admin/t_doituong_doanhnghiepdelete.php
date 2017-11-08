<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_doanhnghiepinfo.php" ?>
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
$t_doituong_doanhnghiep_delete = new ct_doituong_doanhnghiep_delete();
$Page =& $t_doituong_doanhnghiep_delete;

// Page init
$t_doituong_doanhnghiep_delete->Page_Init();

// Page main
$t_doituong_doanhnghiep_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_doanhnghiep_delete = new ew_Page("t_doituong_doanhnghiep_delete");

// page properties
t_doituong_doanhnghiep_delete.PageID = "delete"; // page ID
t_doituong_doanhnghiep_delete.FormID = "ft_doituong_doanhnghiepdelete"; // form ID
var EW_PAGE_ID = t_doituong_doanhnghiep_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_doituong_doanhnghiep_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_doanhnghiep_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_doanhnghiep_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_doanhnghiep_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_doituong_doanhnghiep_delete->LoadRecordset())
	$t_doituong_doanhnghiep_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_doituong_doanhnghiep_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_doituong_doanhnghiep_delete->Page_Terminate("t_doituong_doanhnghieplist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_doituong_doanhnghiep->TableCaption() ?><br><br>
<a href="<?php echo $t_doituong_doanhnghiep->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_doanhnghiep_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_doituong_doanhnghiep">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_doituong_doanhnghiep_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_doituong_doanhnghiep->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_NAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_BELONGTO->FldCaption() ?></td>
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_TYPE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_URL->FldCaption() ?></td>
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_ORDER->FldCaption() ?></td>
		<td valign="top"><?php echo $t_doituong_doanhnghiep->C_ACTIVE->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_doituong_doanhnghiep_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_doituong_doanhnghiep_delete->lRecCnt++;

	// Set row properties
	$t_doituong_doanhnghiep->CssClass = "";
	$t_doituong_doanhnghiep->CssStyle = "";
	$t_doituong_doanhnghiep->RowAttrs = array();
	$t_doituong_doanhnghiep->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_doituong_doanhnghiep_delete->LoadRowValues($rs);

	// Render row
	$t_doituong_doanhnghiep_delete->RenderRow();
?>
	<tr<?php echo $t_doituong_doanhnghiep->RowAttributes() ?>>
		<td<?php echo $t_doituong_doanhnghiep->C_NAME->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_NAME->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_doituong_doanhnghiep->C_BELONGTO->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_BELONGTO->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_BELONGTO->ListViewValue() ?></div></td>
		<td<?php echo $t_doituong_doanhnghiep->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_TYPE->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_TYPE->ListViewValue() ?></div></td>
		<td<?php echo $t_doituong_doanhnghiep->C_URL->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_URL->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_URL->ListViewValue() ?></div></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_ORDER->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_ORDER->ListViewValue() ?></div></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_ACTIVE->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_ACTIVE->ListViewValue() ?></div></td>
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
$t_doituong_doanhnghiep_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_doanhnghiep_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_doituong_doanhnghiep';

	// Page object name
	var $PageObjName = 't_doituong_doanhnghiep_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_doanhnghiep->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_doanhnghiep->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_doanhnghiep->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_doanhnghiep_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_doanhnghiep)
		$GLOBALS["t_doituong_doanhnghiep"] = new ct_doituong_doanhnghiep();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_doanhnghiep', TRUE);

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
		global $t_doituong_doanhnghiep;

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
			$this->Page_Terminate("t_doituong_doanhnghieplist.php");
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
		global $Language, $t_doituong_doanhnghiep;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["DTDOANHNGHIEP_ID"] <> "") {
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setQueryStringValue($_GET["DTDOANHNGHIEP_ID"]);
			if (!is_numeric($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->QueryStringValue))
				$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // Prevent SQL injection, exit
			$sKey .= $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->QueryStringValue;
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
			$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`DTDOANHNGHIEP_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_doituong_doanhnghiep class, t_doituong_doanhnghiepinfo.php

		$t_doituong_doanhnghiep->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_doituong_doanhnghiep->CurrentAction = $_POST["a_delete"];
		} else {
			$t_doituong_doanhnghiep->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_doituong_doanhnghiep->CurrentAction) {
			case "D": // Delete
				$t_doituong_doanhnghiep->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_doituong_doanhnghiep->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_doituong_doanhnghiep;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_doituong_doanhnghiep->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_doituong_doanhnghiep class, t_doituong_doanhnghiepinfo.php

		$t_doituong_doanhnghiep->CurrentFilter = $sWrkFilter;
		$sSql = $t_doituong_doanhnghiep->SQL();
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
				$DeleteRows = $t_doituong_doanhnghiep->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['DTDOANHNGHIEP_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_doituong_doanhnghiep->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_doituong_doanhnghiep->CancelMessage <> "") {
				$this->setMessage($t_doituong_doanhnghiep->CancelMessage);
				$t_doituong_doanhnghiep->CancelMessage = "";
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
				$t_doituong_doanhnghiep->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_doituong_doanhnghiep;

		// Call Recordset Selecting event
		$t_doituong_doanhnghiep->Recordset_Selecting($t_doituong_doanhnghiep->CurrentFilter);

		// Load List page SQL
		$sSql = $t_doituong_doanhnghiep->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_doituong_doanhnghiep->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_doanhnghiep;
		$sFilter = $t_doituong_doanhnghiep->KeyFilter();

		// Call Row Selecting event
		$t_doituong_doanhnghiep->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_doanhnghiep->CurrentFilter = $sFilter;
		$sSql = $t_doituong_doanhnghiep->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_doanhnghiep->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_doanhnghiep;
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setDbValue($rs->fields('DTDOANHNGHIEP_ID'));
		$t_doituong_doanhnghiep->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_doanhnghiep->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_doituong_doanhnghiep->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_doanhnghiep->C_URL->setDbValue($rs->fields('C_URL'));
		$t_doituong_doanhnghiep->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_doituong_doanhnghiep->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_doituong_doanhnghiep->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_doanhnghiep->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_doituong_doanhnghiep->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_doanhnghiep->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_doituong_doanhnghiep->C_FK_CONGTY->setDbValue($rs->fields('C_FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_doanhnghiep;

		// Initialize URLs
		// Call Row_Rendering event

		$t_doituong_doanhnghiep->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_doituong_doanhnghiep->C_NAME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_NAME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_NAME->CellAttrs = array(); $t_doituong_doanhnghiep->C_NAME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_NAME->EditAttrs = array();

		// C_BELONGTO
		$t_doituong_doanhnghiep->C_BELONGTO->CellCssStyle = ""; $t_doituong_doanhnghiep->C_BELONGTO->CellCssClass = "";
		$t_doituong_doanhnghiep->C_BELONGTO->CellAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->ViewAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->EditAttrs = array();

		// C_TYPE
		$t_doituong_doanhnghiep->C_TYPE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_TYPE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_TYPE->CellAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->EditAttrs = array();

		// C_URL
		$t_doituong_doanhnghiep->C_URL->CellCssStyle = ""; $t_doituong_doanhnghiep->C_URL->CellCssClass = "";
		$t_doituong_doanhnghiep->C_URL->CellAttrs = array(); $t_doituong_doanhnghiep->C_URL->ViewAttrs = array(); $t_doituong_doanhnghiep->C_URL->EditAttrs = array();

		// C_ORDER
		$t_doituong_doanhnghiep->C_ORDER->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ORDER->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ORDER->CellAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_doituong_doanhnghiep->C_ACTIVE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ACTIVE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ACTIVE->CellAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->EditAttrs = array();
		if ($t_doituong_doanhnghiep->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->ViewValue = $t_doituong_doanhnghiep->C_NAME->CurrentValue;
			$t_doituong_doanhnghiep->C_NAME->CssStyle = "";
			$t_doituong_doanhnghiep->C_NAME->CssClass = "";
			$t_doituong_doanhnghiep->C_NAME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
			if (strval($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_BELONGTO->CssStyle = "";
			$t_doituong_doanhnghiep->C_BELONGTO->CssClass = "";
			$t_doituong_doanhnghiep->C_BELONGTO->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_doanhnghiep->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc 1 bai viet";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc list he thong ";
						break;
					case "2":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc url lien ket";
						break;
					default:
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = $t_doituong_doanhnghiep->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_TYPE->CssStyle = "";
			$t_doituong_doanhnghiep->C_TYPE->CssClass = "";
			$t_doituong_doanhnghiep->C_TYPE->ViewCustomAttributes = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->ViewValue = $t_doituong_doanhnghiep->C_URL->CurrentValue;
			$t_doituong_doanhnghiep->C_URL->CssStyle = "";
			$t_doituong_doanhnghiep->C_URL->CssClass = "";
			$t_doituong_doanhnghiep->C_URL->ViewCustomAttributes = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->ViewValue = $t_doituong_doanhnghiep->C_ORDER->CurrentValue;
			$t_doituong_doanhnghiep->C_ORDER->CssStyle = "";
			$t_doituong_doanhnghiep->C_ORDER->CssClass = "";
			$t_doituong_doanhnghiep->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "kich hoat";
						break;
					default:
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = $t_doituong_doanhnghiep->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_ACTIVE->CssStyle = "";
			$t_doituong_doanhnghiep->C_ACTIVE->CssClass = "";
			$t_doituong_doanhnghiep->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_doanhnghiep->C_USER_ADD->ViewValue = $t_doituong_doanhnghiep->C_USER_ADD->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_ADD->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_ADD->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = $t_doituong_doanhnghiep->C_ADD_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_ADD_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_ADD_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewValue = $t_doituong_doanhnghiep->C_USER_EDIT->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_EDIT->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = $t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_FK_CONGTY
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewValue = $t_doituong_doanhnghiep->C_FK_CONGTY->CurrentValue;
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssStyle = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssClass = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->HrefValue = "";
			$t_doituong_doanhnghiep->C_NAME->TooltipValue = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->HrefValue = "";
			$t_doituong_doanhnghiep->C_BELONGTO->TooltipValue = "";

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->HrefValue = "";
			$t_doituong_doanhnghiep->C_TYPE->TooltipValue = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->HrefValue = "";
			$t_doituong_doanhnghiep->C_URL->TooltipValue = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->HrefValue = "";
			$t_doituong_doanhnghiep->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->HrefValue = "";
			$t_doituong_doanhnghiep->C_ACTIVE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_doituong_doanhnghiep->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_doanhnghiep->Row_Rendered();
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
