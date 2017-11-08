<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmuclichinfo.php" ?>
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
$t_danhmuclich_delete = new ct_danhmuclich_delete();
$Page =& $t_danhmuclich_delete;

// Page init
$t_danhmuclich_delete->Page_Init();

// Page main
$t_danhmuclich_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmuclich_delete = new ew_Page("t_danhmuclich_delete");

// page properties
t_danhmuclich_delete.PageID = "delete"; // page ID
t_danhmuclich_delete.FormID = "ft_danhmuclichdelete"; // form ID
var EW_PAGE_ID = t_danhmuclich_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_danhmuclich_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmuclich_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmuclich_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmuclich_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_danhmuclich_delete->LoadRecordset())
	$t_danhmuclich_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_danhmuclich_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_danhmuclich_delete->Page_Terminate("t_danhmuclichlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_danhmuclich->TableCaption() ?><br><br>
<a href="<?php echo $t_danhmuclich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmuclich_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_danhmuclich">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_danhmuclich_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_danhmuclich->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_danhmuclich->C_NAME->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_danhmuclich_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_danhmuclich_delete->lRecCnt++;

	// Set row properties
	$t_danhmuclich->CssClass = "";
	$t_danhmuclich->CssStyle = "";
	$t_danhmuclich->RowAttrs = array();
	$t_danhmuclich->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_danhmuclich_delete->LoadRowValues($rs);

	// Render row
	$t_danhmuclich_delete->RenderRow();
?>
	<tr<?php echo $t_danhmuclich->RowAttributes() ?>>
		<td<?php echo $t_danhmuclich->C_NAME->CellAttributes() ?>>
<div<?php echo $t_danhmuclich->C_NAME->ViewAttributes() ?>><?php echo $t_danhmuclich->C_NAME->ListViewValue() ?></div></td>
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
$t_danhmuclich_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmuclich_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_danhmuclich';

	// Page object name
	var $PageObjName = 't_danhmuclich_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmuclich;
		if ($t_danhmuclich->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmuclich->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmuclich;
		if ($t_danhmuclich->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmuclich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmuclich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmuclich_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmuclich)
		$GLOBALS["t_danhmuclich"] = new ct_danhmuclich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmuclich', TRUE);

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
		global $t_danhmuclich;

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
			$this->Page_Terminate("t_danhmuclichlist.php");
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
		global $Language, $t_danhmuclich;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["SB_ID"] <> "") {
			$t_danhmuclich->SB_ID->setQueryStringValue($_GET["SB_ID"]);
			if (!is_numeric($t_danhmuclich->SB_ID->QueryStringValue))
				$this->Page_Terminate("t_danhmuclichlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_danhmuclich->SB_ID->QueryStringValue;
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
			$this->Page_Terminate("t_danhmuclichlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_danhmuclichlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`SB_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_danhmuclich class, t_danhmuclichinfo.php

		$t_danhmuclich->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_danhmuclich->CurrentAction = $_POST["a_delete"];
		} else {
			$t_danhmuclich->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_danhmuclich->CurrentAction) {
			case "D": // Delete
				$t_danhmuclich->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_danhmuclich->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_danhmuclich;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_danhmuclich->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_danhmuclich class, t_danhmuclichinfo.php

		$t_danhmuclich->CurrentFilter = $sWrkFilter;
		$sSql = $t_danhmuclich->SQL();
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
				$DeleteRows = $t_danhmuclich->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['SB_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_danhmuclich->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_danhmuclich->CancelMessage <> "") {
				$this->setMessage($t_danhmuclich->CancelMessage);
				$t_danhmuclich->CancelMessage = "";
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
				$t_danhmuclich->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_danhmuclich;

		// Call Recordset Selecting event
		$t_danhmuclich->Recordset_Selecting($t_danhmuclich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_danhmuclich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_danhmuclich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmuclich;
		$sFilter = $t_danhmuclich->KeyFilter();

		// Call Row Selecting event
		$t_danhmuclich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmuclich->CurrentFilter = $sFilter;
		$sSql = $t_danhmuclich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmuclich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmuclich;
		$t_danhmuclich->SB_ID->setDbValue($rs->fields('SB_ID'));
		$t_danhmuclich->C_NAME->setDbValue($rs->fields('C_NAME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmuclich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_danhmuclich->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_danhmuclich->C_NAME->CellCssStyle = ""; $t_danhmuclich->C_NAME->CellCssClass = "";
		$t_danhmuclich->C_NAME->CellAttrs = array(); $t_danhmuclich->C_NAME->ViewAttrs = array(); $t_danhmuclich->C_NAME->EditAttrs = array();
		if ($t_danhmuclich->RowType == EW_ROWTYPE_VIEW) { // View row

			// SB_ID
			$t_danhmuclich->SB_ID->ViewValue = $t_danhmuclich->SB_ID->CurrentValue;
			$t_danhmuclich->SB_ID->CssStyle = "";
			$t_danhmuclich->SB_ID->CssClass = "";
			$t_danhmuclich->SB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuclich->C_NAME->ViewValue = $t_danhmuclich->C_NAME->CurrentValue;
			$t_danhmuclich->C_NAME->CssStyle = "";
			$t_danhmuclich->C_NAME->CssClass = "";
			$t_danhmuclich->C_NAME->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuclich->C_NAME->HrefValue = "";
			$t_danhmuclich->C_NAME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_danhmuclich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmuclich->Row_Rendered();
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
