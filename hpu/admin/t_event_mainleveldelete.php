<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_event_mainlevelinfo.php" ?>
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
$t_event_mainlevel_delete = new ct_event_mainlevel_delete();
$Page =& $t_event_mainlevel_delete;

// Page init
$t_event_mainlevel_delete->Page_Init();

// Page main
$t_event_mainlevel_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_mainlevel_delete = new ew_Page("t_event_mainlevel_delete");

// page properties
t_event_mainlevel_delete.PageID = "delete"; // page ID
t_event_mainlevel_delete.FormID = "ft_event_mainleveldelete"; // form ID
var EW_PAGE_ID = t_event_mainlevel_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_event_mainlevel_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_mainlevel_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_mainlevel_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_mainlevel_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_event_mainlevel_delete->LoadRecordset())
	$t_event_mainlevel_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_event_mainlevel_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_event_mainlevel_delete->Page_Terminate("t_event_mainlevellist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_event_mainlevel->TableCaption() ?><br><br>
<a href="<?php echo $t_event_mainlevel->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_mainlevel_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_event_mainlevel">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_event_mainlevel_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_event_mainlevel->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_event_mainlevel->C_EVENT_NAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_TYPE_EVENT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_URL_IMAGES->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_URL_LINK->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_DATETIME_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_ORDER->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->C_TIME_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event_mainlevel->FK_CONGTY_SEND->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_event_mainlevel_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_event_mainlevel_delete->lRecCnt++;

	// Set row properties
	$t_event_mainlevel->CssClass = "";
	$t_event_mainlevel->CssStyle = "";
	$t_event_mainlevel->RowAttrs = array();
	$t_event_mainlevel->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_event_mainlevel_delete->LoadRowValues($rs);

	// Render row
	$t_event_mainlevel_delete->RenderRow();
?>
	<tr<?php echo $t_event_mainlevel->RowAttributes() ?>>
		<td<?php echo $t_event_mainlevel->C_EVENT_NAME->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_EVENT_NAME->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_EVENT_NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_TYPE_EVENT->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_TYPE_EVENT->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_TYPE_EVENT->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_URL_IMAGES->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_URL_IMAGES->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_URL_IMAGES->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_URL_LINK->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_URL_LINK->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_URL_LINK->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_DATETIME_END->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_DATETIME_END->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_DATETIME_END->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_ORDER->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_ORDER->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->C_TIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_TIME_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_event_mainlevel->FK_CONGTY_SEND->CellAttributes() ?>>
<div<?php echo $t_event_mainlevel->FK_CONGTY_SEND->ViewAttributes() ?>><?php echo $t_event_mainlevel->FK_CONGTY_SEND->ListViewValue() ?></div></td>
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
$t_event_mainlevel_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_mainlevel_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_event_mainlevel';

	// Page object name
	var $PageObjName = 't_event_mainlevel_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) $PageUrl .= "t=" . $t_event_mainlevel->TableVar . "&"; // Add page token
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
		global $objForm, $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) {
			if ($objForm)
				return ($t_event_mainlevel->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event_mainlevel->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_mainlevel_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event_mainlevel)
		$GLOBALS["t_event_mainlevel"] = new ct_event_mainlevel();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event_mainlevel', TRUE);

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
		global $t_event_mainlevel;

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
			$this->Page_Terminate("t_event_mainlevellist.php");
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
		global $Language, $t_event_mainlevel;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_EVENT_MAINLEVEL"] <> "") {
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->setQueryStringValue($_GET["PK_EVENT_MAINLEVEL"]);
			if (!is_numeric($t_event_mainlevel->PK_EVENT_MAINLEVEL->QueryStringValue))
				$this->Page_Terminate("t_event_mainlevellist.php"); // Prevent SQL injection, exit
			$sKey .= $t_event_mainlevel->PK_EVENT_MAINLEVEL->QueryStringValue;
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
			$this->Page_Terminate("t_event_mainlevellist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_event_mainlevellist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_EVENT_MAINLEVEL`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_event_mainlevel class, t_event_mainlevelinfo.php

		$t_event_mainlevel->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_event_mainlevel->CurrentAction = $_POST["a_delete"];
		} else {
			$t_event_mainlevel->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_event_mainlevel->CurrentAction) {
			case "D": // Delete
				$t_event_mainlevel->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_event_mainlevel->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_event_mainlevel;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_event_mainlevel->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_event_mainlevel class, t_event_mainlevelinfo.php

		$t_event_mainlevel->CurrentFilter = $sWrkFilter;
		$sSql = $t_event_mainlevel->SQL();
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
				$DeleteRows = $t_event_mainlevel->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_EVENT_MAINLEVEL'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_event_mainlevel->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_event_mainlevel->CancelMessage <> "") {
				$this->setMessage($t_event_mainlevel->CancelMessage);
				$t_event_mainlevel->CancelMessage = "";
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
				$t_event_mainlevel->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_event_mainlevel;

		// Call Recordset Selecting event
		$t_event_mainlevel->Recordset_Selecting($t_event_mainlevel->CurrentFilter);

		// Load List page SQL
		$sSql = $t_event_mainlevel->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_event_mainlevel->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event_mainlevel;
		$sFilter = $t_event_mainlevel->KeyFilter();

		// Call Row Selecting event
		$t_event_mainlevel->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event_mainlevel->CurrentFilter = $sFilter;
		$sSql = $t_event_mainlevel->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event_mainlevel->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event_mainlevel;
		$t_event_mainlevel->PK_EVENT_MAINLEVEL->setDbValue($rs->fields('PK_EVENT_MAINLEVEL'));
		$t_event_mainlevel->FK_EVENT_ID->setDbValue($rs->fields('FK_EVENT_ID'));
		$t_event_mainlevel->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_event_mainlevel->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$t_event_mainlevel->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$t_event_mainlevel->C_POST->setDbValue($rs->fields('C_POST'));
		$t_event_mainlevel->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$t_event_mainlevel->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$t_event_mainlevel->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$t_event_mainlevel->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$t_event_mainlevel->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_event_mainlevel->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_event_mainlevel->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_event_mainlevel->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_event_mainlevel->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_event_mainlevel->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$t_event_mainlevel->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_event_mainlevel->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$t_event_mainlevel->C_TYPE_ACTIVE->setDbValue($rs->fields('C_TYPE_ACTIVE'));
		$t_event_mainlevel->C_ARRAY_TINBAI->setDbValue($rs->fields('C_ARRAY_TINBAI'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event_mainlevel;

		// Initialize URLs
		// Call Row_Rendering event

		$t_event_mainlevel->Row_Rendering();

		// Common render codes for all row types
		// C_EVENT_NAME

		$t_event_mainlevel->C_EVENT_NAME->CellCssStyle = ""; $t_event_mainlevel->C_EVENT_NAME->CellCssClass = "";
		$t_event_mainlevel->C_EVENT_NAME->CellAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->ViewAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event_mainlevel->C_TYPE_EVENT->CellCssStyle = ""; $t_event_mainlevel->C_TYPE_EVENT->CellCssClass = "";
		$t_event_mainlevel->C_TYPE_EVENT->CellAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->ViewAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->EditAttrs = array();

		// C_URL_IMAGES
		$t_event_mainlevel->C_URL_IMAGES->CellCssStyle = ""; $t_event_mainlevel->C_URL_IMAGES->CellCssClass = "";
		$t_event_mainlevel->C_URL_IMAGES->CellAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->ViewAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$t_event_mainlevel->C_URL_LINK->CellCssStyle = ""; $t_event_mainlevel->C_URL_LINK->CellCssClass = "";
		$t_event_mainlevel->C_URL_LINK->CellAttrs = array(); $t_event_mainlevel->C_URL_LINK->ViewAttrs = array(); $t_event_mainlevel->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event_mainlevel->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_BEGIN->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event_mainlevel->C_DATETIME_END->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_END->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_END->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_END->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_END->EditAttrs = array();

		// C_ORDER
		$t_event_mainlevel->C_ORDER->CellCssStyle = ""; $t_event_mainlevel->C_ORDER->CellCssClass = "";
		$t_event_mainlevel->C_ORDER->CellAttrs = array(); $t_event_mainlevel->C_ORDER->ViewAttrs = array(); $t_event_mainlevel->C_ORDER->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_event_mainlevel->C_TIME_ACTIVE->CellCssStyle = ""; $t_event_mainlevel->C_TIME_ACTIVE->CellCssClass = "";
		$t_event_mainlevel->C_TIME_ACTIVE->CellAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->ViewAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->EditAttrs = array();

		// FK_CONGTY_SEND
		$t_event_mainlevel->FK_CONGTY_SEND->CellCssStyle = ""; $t_event_mainlevel->FK_CONGTY_SEND->CellCssClass = "";
		$t_event_mainlevel->FK_CONGTY_SEND->CellAttrs = array(); $t_event_mainlevel->FK_CONGTY_SEND->ViewAttrs = array(); $t_event_mainlevel->FK_CONGTY_SEND->EditAttrs = array();
		if ($t_event_mainlevel->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_EVENT_MAINLEVEL
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewValue = $t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue;
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssStyle = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssClass = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewCustomAttributes = "";

			// FK_EVENT_ID
			$t_event_mainlevel->FK_EVENT_ID->ViewValue = $t_event_mainlevel->FK_EVENT_ID->CurrentValue;
			$t_event_mainlevel->FK_EVENT_ID->CssStyle = "";
			$t_event_mainlevel->FK_EVENT_ID->CssClass = "";
			$t_event_mainlevel->FK_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
			if (strval($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_ID->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_ID->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->ViewValue = $t_event_mainlevel->C_EVENT_NAME->CurrentValue;
			$t_event_mainlevel->C_EVENT_NAME->CssStyle = "";
			$t_event_mainlevel->C_EVENT_NAME->CssClass = "";
			$t_event_mainlevel->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su kien popup";
						break;
					case "2":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su lien theo bai viet";
						break;
					case "3":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Laoi su kien lien ket";
						break;
					default:
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = $t_event_mainlevel->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event_mainlevel->C_TYPE_EVENT->CssStyle = "";
			$t_event_mainlevel->C_TYPE_EVENT->CssClass = "";
			$t_event_mainlevel->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event_mainlevel->C_POST->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_POST->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event_mainlevel->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event_mainlevel->C_POST->ViewValue = "";
						break;
					default:
						$t_event_mainlevel->C_POST->ViewValue = $t_event_mainlevel->C_POST->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_POST->ViewValue = NULL;
			}
			$t_event_mainlevel->C_POST->CssStyle = "";
			$t_event_mainlevel->C_POST->CssClass = "";
			$t_event_mainlevel->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->ViewValue = $t_event_mainlevel->C_URL_IMAGES->CurrentValue;
			$t_event_mainlevel->C_URL_IMAGES->CssStyle = "";
			$t_event_mainlevel->C_URL_IMAGES->CssClass = "";
			$t_event_mainlevel->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->ViewValue = $t_event_mainlevel->C_URL_LINK->CurrentValue;
			$t_event_mainlevel->C_URL_LINK->CssStyle = "";
			$t_event_mainlevel->C_URL_LINK->CssClass = "";
			$t_event_mainlevel->C_URL_LINK->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = $t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue;
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_BEGIN->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->CssClass = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->ViewValue = $t_event_mainlevel->C_DATETIME_END->CurrentValue;
			$t_event_mainlevel->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_END->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_END->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_END->CssClass = "";
			$t_event_mainlevel->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->ViewValue = $t_event_mainlevel->C_ORDER->CurrentValue;
			$t_event_mainlevel->C_ORDER->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ORDER->ViewValue, 7);
			$t_event_mainlevel->C_ORDER->CssStyle = "";
			$t_event_mainlevel->C_ORDER->CssClass = "";
			$t_event_mainlevel->C_ORDER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->ViewValue = $t_event_mainlevel->C_USER_ADD->CurrentValue;
			$t_event_mainlevel->C_USER_ADD->CssStyle = "";
			$t_event_mainlevel->C_USER_ADD->CssClass = "";
			$t_event_mainlevel->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->ViewValue = $t_event_mainlevel->C_ADD_TIME->CurrentValue;
			$t_event_mainlevel->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ADD_TIME->ViewValue, 7);
			$t_event_mainlevel->C_ADD_TIME->CssStyle = "";
			$t_event_mainlevel->C_ADD_TIME->CssClass = "";
			$t_event_mainlevel->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->ViewValue = $t_event_mainlevel->C_USER_EDIT->CurrentValue;
			$t_event_mainlevel->C_USER_EDIT->CssStyle = "";
			$t_event_mainlevel->C_USER_EDIT->CssClass = "";
			$t_event_mainlevel->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = $t_event_mainlevel->C_EDIT_TIME->CurrentValue;
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_EDIT_TIME->ViewValue, 7);
			$t_event_mainlevel->C_EDIT_TIME->CssStyle = "";
			$t_event_mainlevel->C_EDIT_TIME->CssClass = "";
			$t_event_mainlevel->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
						break;
					default:
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = $t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = $t_event_mainlevel->C_TIME_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_TIME_ACTIVE->ViewValue, 7);
			$t_event_mainlevel->C_TIME_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TIME_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// FK_CONGTY_SEND
			if (strval($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $t_event_mainlevel->FK_CONGTY_SEND->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_SEND->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_SEND->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_SEND->ViewCustomAttributes = "";

			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewValue = $t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TYPE_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewCustomAttributes = "";

			// C_ARRAY_TINBAI
			if (strval($t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TITLE` FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ARRAY_TINBAI->CssStyle = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->CssClass = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->HrefValue = "";
			$t_event_mainlevel->C_EVENT_NAME->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event_mainlevel->C_TYPE_EVENT->HrefValue = "";
			$t_event_mainlevel->C_TYPE_EVENT->TooltipValue = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->HrefValue = "";
			$t_event_mainlevel->C_URL_IMAGES->TooltipValue = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->HrefValue = "";
			$t_event_mainlevel->C_URL_LINK->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_END->TooltipValue = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->HrefValue = "";
			$t_event_mainlevel->C_ORDER->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->HrefValue = "";
			$t_event_mainlevel->C_TIME_ACTIVE->TooltipValue = "";

			// FK_CONGTY_SEND
			$t_event_mainlevel->FK_CONGTY_SEND->HrefValue = "";
			$t_event_mainlevel->FK_CONGTY_SEND->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_event_mainlevel->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event_mainlevel->Row_Rendered();
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
