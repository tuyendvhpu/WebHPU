<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_bpdungnlinfo.php" ?>
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
$t_bpdungnl_delete = new ct_bpdungnl_delete();
$Page =& $t_bpdungnl_delete;

// Page init
$t_bpdungnl_delete->Page_Init();

// Page main
$t_bpdungnl_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_bpdungnl_delete = new ew_Page("t_bpdungnl_delete");

// page properties
t_bpdungnl_delete.PageID = "delete"; // page ID
t_bpdungnl_delete.FormID = "ft_bpdungnldelete"; // form ID
var EW_PAGE_ID = t_bpdungnl_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_bpdungnl_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_bpdungnl_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_bpdungnl_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_bpdungnl_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_bpdungnl_delete->LoadRecordset())
	$t_bpdungnl_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_bpdungnl_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_bpdungnl_delete->Page_Terminate("t_bpdungnllist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_bpdungnl->TableCaption() ?><br><br>
<a href="<?php echo $t_bpdungnl->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_bpdungnl_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_bpdungnl">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_bpdungnl_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_bpdungnl->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?></td>
		<td valign="top"><?php echo $t_bpdungnl->C_NAM->FldCaption() ?></td>
		<td valign="top"><?php echo $t_bpdungnl->C_TENBP->FldCaption() ?></td>
		<td valign="top"><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_bpdungnl_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_bpdungnl_delete->lRecCnt++;

	// Set row properties
	$t_bpdungnl->CssClass = "";
	$t_bpdungnl->CssStyle = "";
	$t_bpdungnl->RowAttrs = array();
	$t_bpdungnl->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_bpdungnl_delete->LoadRowValues($rs);

	// Render row
	$t_bpdungnl_delete->RenderRow();
?>
	<tr<?php echo $t_bpdungnl->RowAttributes() ?>>
		<td<?php echo $t_bpdungnl->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_MACONGTY->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_MACONGTY->ListViewValue() ?></div></td>
		<td<?php echo $t_bpdungnl->C_NAM->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_NAM->ViewAttributes() ?>><?php echo $t_bpdungnl->C_NAM->ListViewValue() ?></div></td>
		<td<?php echo $t_bpdungnl->C_TENBP->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_TENBP->ViewAttributes() ?>><?php echo $t_bpdungnl->C_TENBP->ListViewValue() ?></div></td>
		<td<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ListViewValue() ?></div></td>
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
$t_bpdungnl_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_bpdungnl_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_bpdungnl';

	// Page object name
	var $PageObjName = 't_bpdungnl_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) $PageUrl .= "t=" . $t_bpdungnl->TableVar . "&"; // Add page token
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
		global $objForm, $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) {
			if ($objForm)
				return ($t_bpdungnl->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_bpdungnl->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_bpdungnl_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_bpdungnl)
		$GLOBALS["t_bpdungnl"] = new ct_bpdungnl();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_bpdungnl', TRUE);

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
		global $t_bpdungnl;

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
			$this->Page_Terminate("t_bpdungnllist.php");
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
		global $Language, $t_bpdungnl;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_BPDUNGNL"] <> "") {
			$t_bpdungnl->PK_BPDUNGNL->setQueryStringValue($_GET["PK_BPDUNGNL"]);
			if (!is_numeric($t_bpdungnl->PK_BPDUNGNL->QueryStringValue))
				$this->Page_Terminate("t_bpdungnllist.php"); // Prevent SQL injection, exit
			$sKey .= $t_bpdungnl->PK_BPDUNGNL->QueryStringValue;
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
			$this->Page_Terminate("t_bpdungnllist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_bpdungnllist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_BPDUNGNL`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_bpdungnl class, t_bpdungnlinfo.php

		$t_bpdungnl->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_bpdungnl->CurrentAction = $_POST["a_delete"];
		} else {
			$t_bpdungnl->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_bpdungnl->CurrentAction) {
			case "D": // Delete
				$t_bpdungnl->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_bpdungnl->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_bpdungnl;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_bpdungnl->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_bpdungnl class, t_bpdungnlinfo.php

		$t_bpdungnl->CurrentFilter = $sWrkFilter;
		$sSql = $t_bpdungnl->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage($Language->Phrase("nodelete")); // No record found
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
				$DeleteRows = $t_bpdungnl->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_BPDUNGNL'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_bpdungnl->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_bpdungnl->CancelMessage <> "") {
				$this->setMessage($t_bpdungnl->CancelMessage);
				$t_bpdungnl->CancelMessage = "";
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
				$t_bpdungnl->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_bpdungnl;

		// Call Recordset Selecting event
		$t_bpdungnl->Recordset_Selecting($t_bpdungnl->CurrentFilter);

		// Load List page SQL
		$sSql = $t_bpdungnl->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_bpdungnl->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_bpdungnl;
		$sFilter = $t_bpdungnl->KeyFilter();

		// Call Row Selecting event
		$t_bpdungnl->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_bpdungnl->CurrentFilter = $sFilter;
		$sSql = $t_bpdungnl->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_bpdungnl->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->setDbValue($rs->fields('PK_BPDUNGNL'));
		$t_bpdungnl->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$t_bpdungnl->C_NAM->setDbValue($rs->fields('C_NAM'));
		$t_bpdungnl->C_TENBP->setDbValue($rs->fields('C_TENBP'));
		$t_bpdungnl->FK_LOAINHIENLIEU->setDbValue($rs->fields('FK_LOAINHIENLIEU'));
		$t_bpdungnl->C_SOLUONG->setDbValue($rs->fields('C_SOLUONG'));
		$t_bpdungnl->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_bpdungnl->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_bpdungnl->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_bpdungnl->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_bpdungnl;

		// Initialize URLs
		// Call Row_Rendering event

		$t_bpdungnl->Row_Rendering();

		// Common render codes for all row types
		// FK_MACONGTY

		$t_bpdungnl->FK_MACONGTY->CellCssStyle = ""; $t_bpdungnl->FK_MACONGTY->CellCssClass = "";
		$t_bpdungnl->FK_MACONGTY->CellAttrs = array(); $t_bpdungnl->FK_MACONGTY->ViewAttrs = array(); $t_bpdungnl->FK_MACONGTY->EditAttrs = array();

		// C_NAM
		$t_bpdungnl->C_NAM->CellCssStyle = ""; $t_bpdungnl->C_NAM->CellCssClass = "";
		$t_bpdungnl->C_NAM->CellAttrs = array(); $t_bpdungnl->C_NAM->ViewAttrs = array(); $t_bpdungnl->C_NAM->EditAttrs = array();

		// C_TENBP
		$t_bpdungnl->C_TENBP->CellCssStyle = ""; $t_bpdungnl->C_TENBP->CellCssClass = "";
		$t_bpdungnl->C_TENBP->CellAttrs = array(); $t_bpdungnl->C_TENBP->ViewAttrs = array(); $t_bpdungnl->C_TENBP->EditAttrs = array();

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->CellCssStyle = ""; $t_bpdungnl->FK_LOAINHIENLIEU->CellCssClass = "";
		$t_bpdungnl->FK_LOAINHIENLIEU->CellAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->EditAttrs = array();
		if ($t_bpdungnl->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_BPDUNGNL
			$t_bpdungnl->PK_BPDUNGNL->ViewValue = $t_bpdungnl->PK_BPDUNGNL->CurrentValue;
			$t_bpdungnl->PK_BPDUNGNL->CssStyle = "";
			$t_bpdungnl->PK_BPDUNGNL->CssClass = "";
			$t_bpdungnl->PK_BPDUNGNL->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($t_bpdungnl->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_bpdungnl->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_MACONGTY->ViewValue = $t_bpdungnl->FK_MACONGTY->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_MACONGTY->ViewValue = NULL;
			}
			$t_bpdungnl->FK_MACONGTY->CssStyle = "";
			$t_bpdungnl->FK_MACONGTY->CssClass = "";
			$t_bpdungnl->FK_MACONGTY->ViewCustomAttributes = "";

			// C_NAM
			$t_bpdungnl->C_NAM->ViewValue = $t_bpdungnl->C_NAM->CurrentValue;
			$t_bpdungnl->C_NAM->CssStyle = "";
			$t_bpdungnl->C_NAM->CssClass = "";
			$t_bpdungnl->C_NAM->ViewCustomAttributes = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->ViewValue = $t_bpdungnl->C_TENBP->CurrentValue;
			$t_bpdungnl->C_TENBP->CssStyle = "";
			$t_bpdungnl->C_TENBP->CssClass = "";
			$t_bpdungnl->C_TENBP->ViewCustomAttributes = "";

			// FK_LOAINHIENLIEU
			if (strval($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) <> "") {
				$sFilterWrk = "`PK_LOAINHIENLIEU` = " . ew_AdjustSql($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENLOAI` FROM `t_loainhienlieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $rswrk->fields('C_TENLOAI');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = NULL;
			}
			$t_bpdungnl->FK_LOAINHIENLIEU->CssStyle = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->CssClass = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->ViewCustomAttributes = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->ViewValue = $t_bpdungnl->C_SOLUONG->CurrentValue;
			$t_bpdungnl->C_SOLUONG->CssStyle = "";
			$t_bpdungnl->C_SOLUONG->CssClass = "";
			$t_bpdungnl->C_SOLUONG->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_bpdungnl->C_USER_ADD->ViewValue = $t_bpdungnl->C_USER_ADD->CurrentValue;
			$t_bpdungnl->C_USER_ADD->CssStyle = "";
			$t_bpdungnl->C_USER_ADD->CssClass = "";
			$t_bpdungnl->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_bpdungnl->C_ADD_TIME->ViewValue = $t_bpdungnl->C_ADD_TIME->CurrentValue;
			$t_bpdungnl->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_ADD_TIME->ViewValue, 7);
			$t_bpdungnl->C_ADD_TIME->CssStyle = "";
			$t_bpdungnl->C_ADD_TIME->CssClass = "";
			$t_bpdungnl->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_bpdungnl->C_USER_EDIT->ViewValue = $t_bpdungnl->C_USER_EDIT->CurrentValue;
			$t_bpdungnl->C_USER_EDIT->CssStyle = "";
			$t_bpdungnl->C_USER_EDIT->CssClass = "";
			$t_bpdungnl->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_bpdungnl->C_EDIT_TIME->ViewValue = $t_bpdungnl->C_EDIT_TIME->CurrentValue;
			$t_bpdungnl->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_EDIT_TIME->ViewValue, 7);
			$t_bpdungnl->C_EDIT_TIME->CssStyle = "";
			$t_bpdungnl->C_EDIT_TIME->CssClass = "";
			$t_bpdungnl->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->HrefValue = "";
			$t_bpdungnl->FK_MACONGTY->TooltipValue = "";

			// C_NAM
			$t_bpdungnl->C_NAM->HrefValue = "";
			$t_bpdungnl->C_NAM->TooltipValue = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->HrefValue = "";
			$t_bpdungnl->C_TENBP->TooltipValue = "";

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->HrefValue = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_bpdungnl->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_bpdungnl->Row_Rendered();
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
