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
$NhatKyGD_delete = new cNhatKyGD_delete();
$Page =& $NhatKyGD_delete;

// Page init
$NhatKyGD_delete->Page_Init();

// Page main
$NhatKyGD_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var NhatKyGD_delete = new ew_Page("NhatKyGD_delete");

// page properties
NhatKyGD_delete.PageID = "delete"; // page ID
NhatKyGD_delete.FormID = "fNhatKyGDdelete"; // form ID
var EW_PAGE_ID = NhatKyGD_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
NhatKyGD_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
NhatKyGD_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
NhatKyGD_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
NhatKyGD_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $NhatKyGD_delete->LoadRecordset())
	$NhatKyGD_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($NhatKyGD_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$NhatKyGD_delete->Page_Terminate("NhatKyGDlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $NhatKyGD->TableCaption() ?><br><br>
<a href="<?php echo $NhatKyGD->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$NhatKyGD_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="NhatKyGD">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($NhatKyGD_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $NhatKyGD->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $NhatKyGD->NhatKyGDID->FldCaption() ?></td>
		<td valign="top"><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?></td>
		<td valign="top"><?php echo $NhatKyGD->WeekOfYear->FldCaption() ?></td>
		<td valign="top"><?php echo $NhatKyGD->LopID->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$NhatKyGD_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$NhatKyGD_delete->lRecCnt++;

	// Set row properties
	$NhatKyGD->CssClass = "";
	$NhatKyGD->CssStyle = "";
	$NhatKyGD->RowAttrs = array();
	$NhatKyGD->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$NhatKyGD_delete->LoadRowValues($rs);

	// Render row
	$NhatKyGD_delete->RenderRow();
?>
	<tr<?php echo $NhatKyGD->RowAttributes() ?>>
		<td<?php echo $NhatKyGD->NhatKyGDID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NhatKyGDID->ViewAttributes() ?>><?php echo $NhatKyGD->NhatKyGDID->ListViewValue() ?></div></td>
		<td<?php echo $NhatKyGD->NgayThangNhatKy->CellAttributes() ?>>
<div<?php echo $NhatKyGD->NgayThangNhatKy->ViewAttributes() ?>><?php echo $NhatKyGD->NgayThangNhatKy->ListViewValue() ?></div></td>
		<td<?php echo $NhatKyGD->WeekOfYear->CellAttributes() ?>>
<div<?php echo $NhatKyGD->WeekOfYear->ViewAttributes() ?>><?php echo $NhatKyGD->WeekOfYear->ListViewValue() ?></div></td>
		<td<?php echo $NhatKyGD->LopID->CellAttributes() ?>>
<div<?php echo $NhatKyGD->LopID->ViewAttributes() ?>><?php echo $NhatKyGD->LopID->ListViewValue() ?></div></td>
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
$NhatKyGD_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cNhatKyGD_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'NhatKyGD';

	// Page object name
	var $PageObjName = 'NhatKyGD_delete';

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
	function cNhatKyGD_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (NhatKyGD)
		$GLOBALS["NhatKyGD"] = new cNhatKyGD();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		global $Language, $NhatKyGD;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["NhatKyGDID"] <> "") {
			$NhatKyGD->NhatKyGDID->setQueryStringValue($_GET["NhatKyGDID"]);
			if (!is_numeric($NhatKyGD->NhatKyGDID->QueryStringValue))
				$this->Page_Terminate("NhatKyGDlist.php"); // Prevent SQL injection, exit
			$sKey .= $NhatKyGD->NhatKyGDID->QueryStringValue;
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
			$this->Page_Terminate("NhatKyGDlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("NhatKyGDlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "[NhatKyGDID]=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in NhatKyGD class, NhatKyGDinfo.php

		$NhatKyGD->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$NhatKyGD->CurrentAction = $_POST["a_delete"];
		} else {
			$NhatKyGD->CurrentAction = "D"; // Delete record directly
		}
		switch ($NhatKyGD->CurrentAction) {
			case "D": // Delete
				$NhatKyGD->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($NhatKyGD->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $NhatKyGD;
		$DeleteRows = TRUE;
		$sWrkFilter = $NhatKyGD->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in NhatKyGD class, NhatKyGDinfo.php

		$NhatKyGD->CurrentFilter = $sWrkFilter;
		$sSql = $NhatKyGD->SQL();
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
				$DeleteRows = $NhatKyGD->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['NhatKyGDID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($NhatKyGD->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($NhatKyGD->CancelMessage <> "") {
				$this->setMessage($NhatKyGD->CancelMessage);
				$NhatKyGD->CancelMessage = "";
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
				$NhatKyGD->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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
		}

		// Call Row Rendered event
		if ($NhatKyGD->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$NhatKyGD->Row_Rendered();
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
