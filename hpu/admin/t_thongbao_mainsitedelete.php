<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_thongbao_mainsiteinfo.php" ?>
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
$t_thongbao_mainsite_delete = new ct_thongbao_mainsite_delete();
$Page =& $t_thongbao_mainsite_delete;

// Page init
$t_thongbao_mainsite_delete->Page_Init();

// Page main
$t_thongbao_mainsite_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_mainsite_delete = new ew_Page("t_thongbao_mainsite_delete");

// page properties
t_thongbao_mainsite_delete.PageID = "delete"; // page ID
t_thongbao_mainsite_delete.FormID = "ft_thongbao_mainsitedelete"; // form ID
var EW_PAGE_ID = t_thongbao_mainsite_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_thongbao_mainsite_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_mainsite_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_mainsite_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_mainsite_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_thongbao_mainsite_delete->LoadRecordset())
	$t_thongbao_mainsite_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_thongbao_mainsite_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_thongbao_mainsite_delete->Page_Terminate("t_thongbao_mainsitelist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_thongbao_mainsite->TableCaption() ?><br><br>
<a href="<?php echo $t_thongbao_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_mainsite_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_thongbao_mainsite">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_thongbao_mainsite_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_thongbao_mainsite->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_thongbao_mainsite->FK_CONGTY_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_TITLE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_PUBLISH->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_ORDER->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_BEGIN_DATE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_thongbao_mainsite->C_END_DATE->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_thongbao_mainsite_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_thongbao_mainsite_delete->lRecCnt++;

	// Set row properties
	$t_thongbao_mainsite->CssClass = "";
	$t_thongbao_mainsite->CssStyle = "";
	$t_thongbao_mainsite->RowAttrs = array();
	$t_thongbao_mainsite->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_thongbao_mainsite_delete->LoadRowValues($rs);

	// Render row
	$t_thongbao_mainsite_delete->RenderRow();
?>
	<tr<?php echo $t_thongbao_mainsite->RowAttributes() ?>>
		<td<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->FK_CONGTY_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_TITLE->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_TITLE->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_PUBLISH->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_PUBLISH->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_ACTIVE->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_ORDER->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_ORDER->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_BEGIN_DATE->ListViewValue() ?></div></td>
		<td<?php echo $t_thongbao_mainsite->C_END_DATE->CellAttributes() ?>>
<div<?php echo $t_thongbao_mainsite->C_END_DATE->ViewAttributes() ?>><?php echo $t_thongbao_mainsite->C_END_DATE->ListViewValue() ?></div></td>
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
$t_thongbao_mainsite_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_mainsite_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_thongbao_mainsite';

	// Page object name
	var $PageObjName = 't_thongbao_mainsite_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_thongbao_mainsite;
		if ($t_thongbao_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_thongbao_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_thongbao_mainsite;
		if ($t_thongbao_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_thongbao_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_thongbao_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_thongbao_mainsite_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_mainsite)
		$GLOBALS["t_thongbao_mainsite"] = new ct_thongbao_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_thongbao_mainsite', TRUE);

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
		global $t_thongbao_mainsite;

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
			$this->Page_Terminate("t_thongbao_mainsitelist.php");
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
		global $Language, $t_thongbao_mainsite;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_THONGBAO"] <> "") {
			$t_thongbao_mainsite->PK_THONGBAO->setQueryStringValue($_GET["PK_THONGBAO"]);
			if (!is_numeric($t_thongbao_mainsite->PK_THONGBAO->QueryStringValue))
				$this->Page_Terminate("t_thongbao_mainsitelist.php"); // Prevent SQL injection, exit
			$sKey .= $t_thongbao_mainsite->PK_THONGBAO->QueryStringValue;
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
			$this->Page_Terminate("t_thongbao_mainsitelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_thongbao_mainsitelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_THONGBAO`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_thongbao_mainsite class, t_thongbao_mainsiteinfo.php

		$t_thongbao_mainsite->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_thongbao_mainsite->CurrentAction = $_POST["a_delete"];
		} else {
			$t_thongbao_mainsite->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_thongbao_mainsite->CurrentAction) {
			case "D": // Delete
				$t_thongbao_mainsite->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_thongbao_mainsite->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_thongbao_mainsite;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_thongbao_mainsite->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_thongbao_mainsite class, t_thongbao_mainsiteinfo.php

		$t_thongbao_mainsite->CurrentFilter = $sWrkFilter;
		$sSql = $t_thongbao_mainsite->SQL();
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
				$DeleteRows = $t_thongbao_mainsite->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_THONGBAO'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_thongbao_mainsite->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_thongbao_mainsite->CancelMessage <> "") {
				$this->setMessage($t_thongbao_mainsite->CancelMessage);
				$t_thongbao_mainsite->CancelMessage = "";
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
				$t_thongbao_mainsite->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_thongbao_mainsite;

		// Call Recordset Selecting event
		$t_thongbao_mainsite->Recordset_Selecting($t_thongbao_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_thongbao_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_thongbao_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_thongbao_mainsite;
		$sFilter = $t_thongbao_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_thongbao_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_thongbao_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_thongbao_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_thongbao_mainsite;
		$t_thongbao_mainsite->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$t_thongbao_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_thongbao_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_thongbao_mainsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_thongbao_mainsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_thongbao_mainsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_thongbao_mainsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_thongbao_mainsite->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$t_thongbao_mainsite->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$t_thongbao_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_thongbao_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_thongbao_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_thongbao_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_thongbao_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_thongbao_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_thongbao_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_thongbao_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_thongbao_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_thongbao_mainsite->FK_CONGTY_ID->EditAttrs = array();

		// C_TITLE
		$t_thongbao_mainsite->C_TITLE->CellCssStyle = ""; $t_thongbao_mainsite->C_TITLE->CellCssClass = "";
		$t_thongbao_mainsite->C_TITLE->CellAttrs = array(); $t_thongbao_mainsite->C_TITLE->ViewAttrs = array(); $t_thongbao_mainsite->C_TITLE->EditAttrs = array();

		// C_PUBLISH
		$t_thongbao_mainsite->C_PUBLISH->CellCssStyle = ""; $t_thongbao_mainsite->C_PUBLISH->CellCssClass = "";
		$t_thongbao_mainsite->C_PUBLISH->CellAttrs = array(); $t_thongbao_mainsite->C_PUBLISH->ViewAttrs = array(); $t_thongbao_mainsite->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$t_thongbao_mainsite->C_ACTIVE->CellCssStyle = ""; $t_thongbao_mainsite->C_ACTIVE->CellCssClass = "";
		$t_thongbao_mainsite->C_ACTIVE->CellAttrs = array(); $t_thongbao_mainsite->C_ACTIVE->ViewAttrs = array(); $t_thongbao_mainsite->C_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_thongbao_mainsite->C_ORDER->CellCssStyle = ""; $t_thongbao_mainsite->C_ORDER->CellCssClass = "";
		$t_thongbao_mainsite->C_ORDER->CellAttrs = array(); $t_thongbao_mainsite->C_ORDER->ViewAttrs = array(); $t_thongbao_mainsite->C_ORDER->EditAttrs = array();

		// C_BEGIN_DATE
		$t_thongbao_mainsite->C_BEGIN_DATE->CellCssStyle = ""; $t_thongbao_mainsite->C_BEGIN_DATE->CellCssClass = "";
		$t_thongbao_mainsite->C_BEGIN_DATE->CellAttrs = array(); $t_thongbao_mainsite->C_BEGIN_DATE->ViewAttrs = array(); $t_thongbao_mainsite->C_BEGIN_DATE->EditAttrs = array();

		// C_END_DATE
		$t_thongbao_mainsite->C_END_DATE->CellCssStyle = ""; $t_thongbao_mainsite->C_END_DATE->CellCssClass = "";
		$t_thongbao_mainsite->C_END_DATE->CellAttrs = array(); $t_thongbao_mainsite->C_END_DATE->ViewAttrs = array(); $t_thongbao_mainsite->C_END_DATE->EditAttrs = array();
		if ($t_thongbao_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_THONGBAO
			$t_thongbao_mainsite->PK_THONGBAO->ViewValue = $t_thongbao_mainsite->PK_THONGBAO->CurrentValue;
			$t_thongbao_mainsite->PK_THONGBAO->CssStyle = "";
			$t_thongbao_mainsite->PK_THONGBAO->CssClass = "";
			$t_thongbao_mainsite->PK_THONGBAO->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = $t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_thongbao_mainsite->FK_CONGTY_ID->CssStyle = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->CssClass = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->ViewValue = $t_thongbao_mainsite->C_TITLE->CurrentValue;
			$t_thongbao_mainsite->C_TITLE->CssStyle = "";
			$t_thongbao_mainsite->C_TITLE->CssClass = "";
			$t_thongbao_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_CONTENT
			$t_thongbao_mainsite->C_CONTENT->ViewValue = $t_thongbao_mainsite->C_CONTENT->CurrentValue;
			$t_thongbao_mainsite->C_CONTENT->CssStyle = "";
			$t_thongbao_mainsite->C_CONTENT->CssClass = "";
			$t_thongbao_mainsite->C_CONTENT->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_thongbao_mainsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_thongbao_mainsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Khong active len levelsite";
						break;
					case "1":
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Active len levelsite";
						break;
					default:
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = $t_thongbao_mainsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_thongbao_mainsite->C_PUBLISH->CssStyle = "";
			$t_thongbao_mainsite->C_PUBLISH->CssClass = "";
			$t_thongbao_mainsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_thongbao_mainsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_thongbao_mainsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = "Khong active len mainsite";
						break;
					case "1":
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = "Active len mainsite";
						break;
					default:
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = $t_thongbao_mainsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_thongbao_mainsite->C_ACTIVE->CssStyle = "";
			$t_thongbao_mainsite->C_ACTIVE->CssClass = "";
			$t_thongbao_mainsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->ViewValue = $t_thongbao_mainsite->C_ORDER->CurrentValue;
			$t_thongbao_mainsite->C_ORDER->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_ORDER->ViewValue, 7);
			$t_thongbao_mainsite->C_ORDER->CssStyle = "";
			$t_thongbao_mainsite->C_ORDER->CssClass = "";
			$t_thongbao_mainsite->C_ORDER->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewValue = $t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->ViewValue, 7);
			$t_thongbao_mainsite->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->ViewValue = $t_thongbao_mainsite->C_END_DATE->CurrentValue;
			$t_thongbao_mainsite->C_END_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_END_DATE->ViewValue, 7);
			$t_thongbao_mainsite->C_END_DATE->CssStyle = "";
			$t_thongbao_mainsite->C_END_DATE->CssClass = "";
			$t_thongbao_mainsite->C_END_DATE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_thongbao_mainsite->C_USER_ADD->ViewValue = $t_thongbao_mainsite->C_USER_ADD->CurrentValue;
			$t_thongbao_mainsite->C_USER_ADD->CssStyle = "";
			$t_thongbao_mainsite->C_USER_ADD->CssClass = "";
			$t_thongbao_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_thongbao_mainsite->C_ADD_TIME->ViewValue = $t_thongbao_mainsite->C_ADD_TIME->CurrentValue;
			$t_thongbao_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_thongbao_mainsite->C_ADD_TIME->CssStyle = "";
			$t_thongbao_mainsite->C_ADD_TIME->CssClass = "";
			$t_thongbao_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_thongbao_mainsite->C_USER_EDIT->ViewValue = $t_thongbao_mainsite->C_USER_EDIT->CurrentValue;
			$t_thongbao_mainsite->C_USER_EDIT->CssStyle = "";
			$t_thongbao_mainsite->C_USER_EDIT->CssClass = "";
			$t_thongbao_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_thongbao_mainsite->C_EDIT_TIME->ViewValue = $t_thongbao_mainsite->C_EDIT_TIME->CurrentValue;
			$t_thongbao_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_thongbao_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_thongbao_mainsite->C_EDIT_TIME->CssClass = "";
			$t_thongbao_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->ViewValue = $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CurrentValue;
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_thongbao_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->TooltipValue = "";

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->HrefValue = "";
			$t_thongbao_mainsite->C_TITLE->TooltipValue = "";

			// C_PUBLISH
			$t_thongbao_mainsite->C_PUBLISH->HrefValue = "";
			$t_thongbao_mainsite->C_PUBLISH->TooltipValue = "";

			// C_ACTIVE
			$t_thongbao_mainsite->C_ACTIVE->HrefValue = "";
			$t_thongbao_mainsite->C_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->HrefValue = "";
			$t_thongbao_mainsite->C_ORDER->TooltipValue = "";

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->HrefValue = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->TooltipValue = "";

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->HrefValue = "";
			$t_thongbao_mainsite->C_END_DATE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_thongbao_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_thongbao_mainsite->Row_Rendered();
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
