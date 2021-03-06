<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_ghichu_lichinfo.php" ?>
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
$t_ghichu_lich_delete = new ct_ghichu_lich_delete();
$Page =& $t_ghichu_lich_delete;

// Page init
$t_ghichu_lich_delete->Page_Init();

// Page main
$t_ghichu_lich_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_ghichu_lich_delete = new ew_Page("t_ghichu_lich_delete");

// page properties
t_ghichu_lich_delete.PageID = "delete"; // page ID
t_ghichu_lich_delete.FormID = "ft_ghichu_lichdelete"; // form ID
var EW_PAGE_ID = t_ghichu_lich_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_ghichu_lich_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ghichu_lich_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ghichu_lich_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ghichu_lich_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_ghichu_lich_delete->LoadRecordset())
	$t_ghichu_lich_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_ghichu_lich_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_ghichu_lich_delete->Page_Terminate("t_ghichu_lichlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_ghichu_lich->TableCaption() ?><br><br>
<a href="<?php echo $t_ghichu_lich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_ghichu_lich_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_ghichu_lich">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_ghichu_lich_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_ghichu_lich->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?></td>
		<td valign="top"><?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></td>
		<td valign="top"><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?></td>
		<td valign="top"><?php echo $t_ghichu_lich->C_CONTENT->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_ghichu_lich_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_ghichu_lich_delete->lRecCnt++;

	// Set row properties
	$t_ghichu_lich->CssClass = "";
	$t_ghichu_lich->CssStyle = "";
	$t_ghichu_lich->RowAttrs = array();
	$t_ghichu_lich->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_ghichu_lich_delete->LoadRowValues($rs);

	// Render row
	$t_ghichu_lich_delete->RenderRow();
?>
	<tr<?php echo $t_ghichu_lich->RowAttributes() ?>>
		<td<?php echo $t_ghichu_lich->FK_CONG_TY->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->FK_CONG_TY->ViewAttributes() ?>><?php echo $t_ghichu_lich->FK_CONG_TY->ListViewValue() ?></div></td>
		<td<?php echo $t_ghichu_lich->C_YEAR->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_YEAR->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_YEAR->ListViewValue() ?></div></td>
		<td<?php echo $t_ghichu_lich->C_WEEK->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_WEEK->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_WEEK->ListViewValue() ?></div></td>
		<td<?php echo $t_ghichu_lich->C_CONTENT->CellAttributes() ?>>
<div<?php echo $t_ghichu_lich->C_CONTENT->ViewAttributes() ?>><?php echo $t_ghichu_lich->C_CONTENT->ListViewValue() ?></div></td>
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
$t_ghichu_lich_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_ghichu_lich_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_ghichu_lich';

	// Page object name
	var $PageObjName = 't_ghichu_lich_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) $PageUrl .= "t=" . $t_ghichu_lich->TableVar . "&"; // Add page token
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
		global $objForm, $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) {
			if ($objForm)
				return ($t_ghichu_lich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ghichu_lich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_ghichu_lich_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_ghichu_lich)
		$GLOBALS["t_ghichu_lich"] = new ct_ghichu_lich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ghichu_lich', TRUE);

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
		global $t_ghichu_lich;

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
			$this->Page_Terminate("t_ghichu_lichlist.php");
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
		global $Language, $t_ghichu_lich;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["SB_NOTE_ID"] <> "") {
			$t_ghichu_lich->SB_NOTE_ID->setQueryStringValue($_GET["SB_NOTE_ID"]);
			if (!is_numeric($t_ghichu_lich->SB_NOTE_ID->QueryStringValue))
				$this->Page_Terminate("t_ghichu_lichlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_ghichu_lich->SB_NOTE_ID->QueryStringValue;
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
			$this->Page_Terminate("t_ghichu_lichlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_ghichu_lichlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`SB_NOTE_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_ghichu_lich class, t_ghichu_lichinfo.php

		$t_ghichu_lich->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_ghichu_lich->CurrentAction = $_POST["a_delete"];
		} else {
			$t_ghichu_lich->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_ghichu_lich->CurrentAction) {
			case "D": // Delete
				$t_ghichu_lich->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_ghichu_lich->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_ghichu_lich;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_ghichu_lich->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_ghichu_lich class, t_ghichu_lichinfo.php

		$t_ghichu_lich->CurrentFilter = $sWrkFilter;
		$sSql = $t_ghichu_lich->SQL();
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
				$DeleteRows = $t_ghichu_lich->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['SB_NOTE_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_ghichu_lich->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_ghichu_lich->CancelMessage <> "") {
				$this->setMessage($t_ghichu_lich->CancelMessage);
				$t_ghichu_lich->CancelMessage = "";
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
				$t_ghichu_lich->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_ghichu_lich;

		// Call Recordset Selecting event
		$t_ghichu_lich->Recordset_Selecting($t_ghichu_lich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_ghichu_lich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_ghichu_lich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ghichu_lich;
		$sFilter = $t_ghichu_lich->KeyFilter();

		// Call Row Selecting event
		$t_ghichu_lich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_ghichu_lich->CurrentFilter = $sFilter;
		$sSql = $t_ghichu_lich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_ghichu_lich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_ghichu_lich;
		$t_ghichu_lich->SB_NOTE_ID->setDbValue($rs->fields('SB_NOTE_ID'));
		$t_ghichu_lich->FK_CONG_TY->setDbValue($rs->fields('FK_CONGTY'));
		$t_ghichu_lich->C_YEAR->setDbValue($rs->fields('C_YEAR'));
		$t_ghichu_lich->C_WEEK->setDbValue($rs->fields('C_WEEK'));
		$t_ghichu_lich->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_ghichu_lich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_ghichu_lich->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$t_ghichu_lich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_ghichu_lich->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_ghichu_lich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_ghichu_lich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_ghichu_lich->FK_CONG_TY->CellCssStyle = ""; $t_ghichu_lich->FK_CONG_TY->CellCssClass = "";
		$t_ghichu_lich->FK_CONG_TY->CellAttrs = array(); $t_ghichu_lich->FK_CONG_TY->ViewAttrs = array(); $t_ghichu_lich->FK_CONG_TY->EditAttrs = array();

		// C_YEAR
		$t_ghichu_lich->C_YEAR->CellCssStyle = ""; $t_ghichu_lich->C_YEAR->CellCssClass = "";
		$t_ghichu_lich->C_YEAR->CellAttrs = array(); $t_ghichu_lich->C_YEAR->ViewAttrs = array(); $t_ghichu_lich->C_YEAR->EditAttrs = array();

		// C_WEEK
		$t_ghichu_lich->C_WEEK->CellCssStyle = ""; $t_ghichu_lich->C_WEEK->CellCssClass = "";
		$t_ghichu_lich->C_WEEK->CellAttrs = array(); $t_ghichu_lich->C_WEEK->ViewAttrs = array(); $t_ghichu_lich->C_WEEK->EditAttrs = array();

		// C_CONTENT
		$t_ghichu_lich->C_CONTENT->CellCssStyle = ""; $t_ghichu_lich->C_CONTENT->CellCssClass = "";
		$t_ghichu_lich->C_CONTENT->CellAttrs = array(); $t_ghichu_lich->C_CONTENT->ViewAttrs = array(); $t_ghichu_lich->C_CONTENT->EditAttrs = array();
		if ($t_ghichu_lich->RowType == EW_ROWTYPE_VIEW) { // View row

			// SB_NOTE_ID
			$t_ghichu_lich->SB_NOTE_ID->ViewValue = $t_ghichu_lich->SB_NOTE_ID->CurrentValue;
			$t_ghichu_lich->SB_NOTE_ID->CssStyle = "";
			$t_ghichu_lich->SB_NOTE_ID->CssClass = "";
			$t_ghichu_lich->SB_NOTE_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_ghichu_lich->FK_CONG_TY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_ghichu_lich->FK_CONG_TY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $t_ghichu_lich->FK_CONG_TY->CurrentValue;
				}
			} else {
				$t_ghichu_lich->FK_CONG_TY->ViewValue = NULL;
			}
			$t_ghichu_lich->FK_CONG_TY->CssStyle = "";
			$t_ghichu_lich->FK_CONG_TY->CssClass = "";
			$t_ghichu_lich->FK_CONG_TY->ViewCustomAttributes = "";

			// C_YEAR
			if (strval($t_ghichu_lich->C_YEAR->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_YEAR->CurrentValue) {
					case "0":
						$t_ghichu_lich->C_YEAR->ViewValue = "2013";
						break;
					case "1":
						$t_ghichu_lich->C_YEAR->ViewValue = "2014";
						break;
					default:
						$t_ghichu_lich->C_YEAR->ViewValue = $t_ghichu_lich->C_YEAR->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_YEAR->ViewValue = NULL;
			}
			$t_ghichu_lich->C_YEAR->CssStyle = "";
			$t_ghichu_lich->C_YEAR->CssClass = "";
			$t_ghichu_lich->C_YEAR->ViewCustomAttributes = "";

			// C_WEEK
			if (strval($t_ghichu_lich->C_WEEK->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_WEEK->CurrentValue) {
					case "1":
						$t_ghichu_lich->C_WEEK->ViewValue = "Tuan 1";
						break;
					default:
						$t_ghichu_lich->C_WEEK->ViewValue = $t_ghichu_lich->C_WEEK->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_WEEK->ViewValue = NULL;
			}
			$t_ghichu_lich->C_WEEK->CssStyle = "";
			$t_ghichu_lich->C_WEEK->CssClass = "";
			$t_ghichu_lich->C_WEEK->ViewCustomAttributes = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->ViewValue = $t_ghichu_lich->C_CONTENT->CurrentValue;
			$t_ghichu_lich->C_CONTENT->CssStyle = "";
			$t_ghichu_lich->C_CONTENT->CssClass = "";
			$t_ghichu_lich->C_CONTENT->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_ghichu_lich->C_USER_ADD->ViewValue = $t_ghichu_lich->C_USER_ADD->CurrentValue;
			$t_ghichu_lich->C_USER_ADD->CssStyle = "";
			$t_ghichu_lich->C_USER_ADD->CssClass = "";
			$t_ghichu_lich->C_USER_ADD->ViewCustomAttributes = "";

			// C_TIME_ADD
			$t_ghichu_lich->C_TIME_ADD->ViewValue = $t_ghichu_lich->C_TIME_ADD->CurrentValue;
			$t_ghichu_lich->C_TIME_ADD->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_ADD->ViewValue, 7);
			$t_ghichu_lich->C_TIME_ADD->CssStyle = "";
			$t_ghichu_lich->C_TIME_ADD->CssClass = "";
			$t_ghichu_lich->C_TIME_ADD->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_ghichu_lich->C_USER_EDIT->ViewValue = $t_ghichu_lich->C_USER_EDIT->CurrentValue;
			$t_ghichu_lich->C_USER_EDIT->CssStyle = "";
			$t_ghichu_lich->C_USER_EDIT->CssClass = "";
			$t_ghichu_lich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_TIME_EDIT
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = $t_ghichu_lich->C_TIME_EDIT->CurrentValue;
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_EDIT->ViewValue, 7);
			$t_ghichu_lich->C_TIME_EDIT->CssStyle = "";
			$t_ghichu_lich->C_TIME_EDIT->CssClass = "";
			$t_ghichu_lich->C_TIME_EDIT->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_ghichu_lich->FK_CONG_TY->HrefValue = "";
			$t_ghichu_lich->FK_CONG_TY->TooltipValue = "";

			// C_YEAR
			$t_ghichu_lich->C_YEAR->HrefValue = "";
			$t_ghichu_lich->C_YEAR->TooltipValue = "";

			// C_WEEK
			$t_ghichu_lich->C_WEEK->HrefValue = "";
			$t_ghichu_lich->C_WEEK->TooltipValue = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->HrefValue = "";
			$t_ghichu_lich->C_CONTENT->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_ghichu_lich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_ghichu_lich->Row_Rendered();
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
