<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_eventinfo.php" ?>
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
$t_event_delete = new ct_event_delete();
$Page =& $t_event_delete;

// Page init
$t_event_delete->Page_Init();

// Page main
$t_event_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_delete = new ew_Page("t_event_delete");

// page properties
t_event_delete.PageID = "delete"; // page ID
t_event_delete.FormID = "ft_eventdelete"; // form ID
var EW_PAGE_ID = t_event_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_event_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_event_delete->LoadRecordset())
	$t_event_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_event_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_event_delete->Page_Terminate("t_eventlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_event->TableCaption() ?><br><br>
<a href="<?php echo $t_event->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_event">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_event_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_event->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_event->C_EVENT_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->FK_CONGTY_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_POST->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_DATETIME_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_ODER->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_USER_ADD->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_ADD_TIME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_USER_EDIT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_EDIT_TIME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_TIME_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_SEND_MAIL->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->C_FK_BROWSE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->FK_ARRAY_TINBAI->FldCaption() ?></td>
		<td valign="top"><?php echo $t_event->FK_ARRAY_CONGTY->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_event_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_event_delete->lRecCnt++;

	// Set row properties
	$t_event->CssClass = "";
	$t_event->CssStyle = "";
	$t_event->RowAttrs = array();
	$t_event->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_event_delete->LoadRowValues($rs);

	// Render row
	$t_event_delete->RenderRow();
?>
	<tr<?php echo $t_event->RowAttributes() ?>>
		<td<?php echo $t_event->C_EVENT_ID->CellAttributes() ?>>
<div<?php echo $t_event->C_EVENT_ID->ViewAttributes() ?>><?php echo $t_event->C_EVENT_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_event->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_event->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_event->FK_CONGTY_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>>
<div<?php echo $t_event->C_TYPE_EVENT->ViewAttributes() ?>><?php echo $t_event->C_TYPE_EVENT->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_POST->CellAttributes() ?>>
<div<?php echo $t_event->C_POST->ViewAttributes() ?>><?php echo $t_event->C_POST->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>>
<div<?php echo $t_event->C_DATETIME_BEGIN->ViewAttributes() ?>><?php echo $t_event->C_DATETIME_BEGIN->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_DATETIME_END->CellAttributes() ?>>
<div<?php echo $t_event->C_DATETIME_END->ViewAttributes() ?>><?php echo $t_event->C_DATETIME_END->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>>
<div<?php echo $t_event->C_ODER->ViewAttributes() ?>><?php echo $t_event->C_ODER->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_event->C_USER_ADD->ViewAttributes() ?>><?php echo $t_event->C_USER_ADD->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_event->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_event->C_ADD_TIME->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_event->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_event->C_USER_EDIT->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_event->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_event->C_EDIT_TIME->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<div<?php echo $t_event->C_ACTIVE_LEVELSITE->ViewAttributes() ?>><?php echo $t_event->C_ACTIVE_LEVELSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_TIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_event->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_event->C_TIME_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_SEND_MAIL->CellAttributes() ?>>
<div<?php echo $t_event->C_SEND_MAIL->ViewAttributes() ?>><?php echo $t_event->C_SEND_MAIL->ListViewValue() ?></div></td>
		<td<?php echo $t_event->C_FK_BROWSE->CellAttributes() ?>>
<div<?php echo $t_event->C_FK_BROWSE->ViewAttributes() ?>><?php echo $t_event->C_FK_BROWSE->ListViewValue() ?></div></td>
		<td<?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>>
<div<?php echo $t_event->FK_ARRAY_TINBAI->ViewAttributes() ?>><?php echo $t_event->FK_ARRAY_TINBAI->ListViewValue() ?></div></td>
		<td<?php echo $t_event->FK_ARRAY_CONGTY->CellAttributes() ?>>
<div<?php echo $t_event->FK_ARRAY_CONGTY->ViewAttributes() ?>><?php echo $t_event->FK_ARRAY_CONGTY->ListViewValue() ?></div></td>
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
$t_event_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_event';

	// Page object name
	var $PageObjName = 't_event_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event;
		if ($t_event->UseTokenInUrl) $PageUrl .= "t=" . $t_event->TableVar . "&"; // Add page token
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
		global $objForm, $t_event;
		if ($t_event->UseTokenInUrl) {
			if ($objForm)
				return ($t_event->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event)
		$GLOBALS["t_event"] = new ct_event();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event', TRUE);

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
		global $t_event;

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
			$this->Page_Terminate("t_eventlist.php");
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
		global $Language, $t_event;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["C_EVENT_ID"] <> "") {
			$t_event->C_EVENT_ID->setQueryStringValue($_GET["C_EVENT_ID"]);
			if (!is_numeric($t_event->C_EVENT_ID->QueryStringValue))
				$this->Page_Terminate("t_eventlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_event->C_EVENT_ID->QueryStringValue;
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
			$this->Page_Terminate("t_eventlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_eventlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`C_EVENT_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_event class, t_eventinfo.php

		$t_event->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_event->CurrentAction = $_POST["a_delete"];
		} else {
			$t_event->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_event->CurrentAction) {
			case "D": // Delete
				$t_event->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_event->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_event;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_event->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_event class, t_eventinfo.php

		$t_event->CurrentFilter = $sWrkFilter;
		$sSql = $t_event->SQL();
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
				$DeleteRows = $t_event->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['C_EVENT_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_event->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_event->CancelMessage <> "") {
				$this->setMessage($t_event->CancelMessage);
				$t_event->CancelMessage = "";
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
				$t_event->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_event;

		// Call Recordset Selecting event
		$t_event->Recordset_Selecting($t_event->CurrentFilter);

		// Load List page SQL
		$sSql = $t_event->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_event->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event;
		$sFilter = $t_event->KeyFilter();

		// Call Row Selecting event
		$t_event->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event->CurrentFilter = $sFilter;
		$sSql = $t_event->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event;
		$t_event->C_EVENT_ID->setDbValue($rs->fields('C_EVENT_ID'));
		$t_event->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_event->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$t_event->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$t_event->C_POST->setDbValue($rs->fields('C_POST'));
		$t_event->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$t_event->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$t_event->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$t_event->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$t_event->C_ODER->setDbValue($rs->fields('C_ODER'));
		$t_event->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_event->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_event->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_event->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_event->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_event->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$t_event->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_event->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_event->C_CONTENT_MAIL->setDbValue($rs->fields('C_CONTENT_MAIL'));
		$t_event->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$t_event->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
		$t_event->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event;

		// Initialize URLs
		// Call Row_Rendering event

		$t_event->Row_Rendering();

		// Common render codes for all row types
		// C_EVENT_ID

		$t_event->C_EVENT_ID->CellCssStyle = ""; $t_event->C_EVENT_ID->CellCssClass = "";
		$t_event->C_EVENT_ID->CellAttrs = array(); $t_event->C_EVENT_ID->ViewAttrs = array(); $t_event->C_EVENT_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$t_event->FK_CONGTY_ID->CellCssStyle = ""; $t_event->FK_CONGTY_ID->CellCssClass = "";
		$t_event->FK_CONGTY_ID->CellAttrs = array(); $t_event->FK_CONGTY_ID->ViewAttrs = array(); $t_event->FK_CONGTY_ID->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event->C_TYPE_EVENT->CellCssStyle = ""; $t_event->C_TYPE_EVENT->CellCssClass = "";
		$t_event->C_TYPE_EVENT->CellAttrs = array(); $t_event->C_TYPE_EVENT->ViewAttrs = array(); $t_event->C_TYPE_EVENT->EditAttrs = array();

		// C_POST
		$t_event->C_POST->CellCssStyle = ""; $t_event->C_POST->CellCssClass = "";
		$t_event->C_POST->CellAttrs = array(); $t_event->C_POST->ViewAttrs = array(); $t_event->C_POST->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event->C_DATETIME_BEGIN->CellAttrs = array(); $t_event->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event->C_DATETIME_END->CellCssStyle = ""; $t_event->C_DATETIME_END->CellCssClass = "";
		$t_event->C_DATETIME_END->CellAttrs = array(); $t_event->C_DATETIME_END->ViewAttrs = array(); $t_event->C_DATETIME_END->EditAttrs = array();

		// C_ODER
		$t_event->C_ODER->CellCssStyle = ""; $t_event->C_ODER->CellCssClass = "";
		$t_event->C_ODER->CellAttrs = array(); $t_event->C_ODER->ViewAttrs = array(); $t_event->C_ODER->EditAttrs = array();

		// C_USER_ADD
		$t_event->C_USER_ADD->CellCssStyle = ""; $t_event->C_USER_ADD->CellCssClass = "";
		$t_event->C_USER_ADD->CellAttrs = array(); $t_event->C_USER_ADD->ViewAttrs = array(); $t_event->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_event->C_ADD_TIME->CellCssStyle = ""; $t_event->C_ADD_TIME->CellCssClass = "";
		$t_event->C_ADD_TIME->CellAttrs = array(); $t_event->C_ADD_TIME->ViewAttrs = array(); $t_event->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_event->C_USER_EDIT->CellCssStyle = ""; $t_event->C_USER_EDIT->CellCssClass = "";
		$t_event->C_USER_EDIT->CellAttrs = array(); $t_event->C_USER_EDIT->ViewAttrs = array(); $t_event->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_event->C_EDIT_TIME->CellCssStyle = ""; $t_event->C_EDIT_TIME->CellCssClass = "";
		$t_event->C_EDIT_TIME->CellAttrs = array(); $t_event->C_EDIT_TIME->ViewAttrs = array(); $t_event->C_EDIT_TIME->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_event->C_TIME_ACTIVE->CellCssStyle = ""; $t_event->C_TIME_ACTIVE->CellCssClass = "";
		$t_event->C_TIME_ACTIVE->CellAttrs = array(); $t_event->C_TIME_ACTIVE->ViewAttrs = array(); $t_event->C_TIME_ACTIVE->EditAttrs = array();

		// C_SEND_MAIL
		$t_event->C_SEND_MAIL->CellCssStyle = ""; $t_event->C_SEND_MAIL->CellCssClass = "";
		$t_event->C_SEND_MAIL->CellAttrs = array(); $t_event->C_SEND_MAIL->ViewAttrs = array(); $t_event->C_SEND_MAIL->EditAttrs = array();

		// C_FK_BROWSE
		$t_event->C_FK_BROWSE->CellCssStyle = ""; $t_event->C_FK_BROWSE->CellCssClass = "";
		$t_event->C_FK_BROWSE->CellAttrs = array(); $t_event->C_FK_BROWSE->ViewAttrs = array(); $t_event->C_FK_BROWSE->EditAttrs = array();

		// FK_ARRAY_TINBAI
		$t_event->FK_ARRAY_TINBAI->CellCssStyle = ""; $t_event->FK_ARRAY_TINBAI->CellCssClass = "";
		$t_event->FK_ARRAY_TINBAI->CellAttrs = array(); $t_event->FK_ARRAY_TINBAI->ViewAttrs = array(); $t_event->FK_ARRAY_TINBAI->EditAttrs = array();

		// FK_ARRAY_CONGTY
		$t_event->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_event->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_event->FK_ARRAY_CONGTY->CellAttrs = array(); $t_event->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_event->FK_ARRAY_CONGTY->EditAttrs = array();
		if ($t_event->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_EVENT_ID
			$t_event->C_EVENT_ID->ViewValue = $t_event->C_EVENT_ID->CurrentValue;
			$t_event->C_EVENT_ID->CssStyle = "";
			$t_event->C_EVENT_ID->CssClass = "";
			$t_event->C_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_event->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event->FK_CONGTY_ID->ViewValue = $t_event->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event->FK_CONGTY_ID->CssStyle = "";
			$t_event->FK_CONGTY_ID->CssClass = "";
			$t_event->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai Popup";
						break;
					case "2":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai su kien theo bai viet";
						break;
					case "3":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai su kien lien ket";
						break;
					default:
						$t_event->C_TYPE_EVENT->ViewValue = $t_event->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event->C_TYPE_EVENT->CssStyle = "";
			$t_event->C_TYPE_EVENT->CssClass = "";
			$t_event->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event->C_POST->CurrentValue) <> "") {
				switch ($t_event->C_POST->CurrentValue) {
					case "1":
						$t_event->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event->C_POST->ViewValue = "";
						break;
					default:
						$t_event->C_POST->ViewValue = $t_event->C_POST->CurrentValue;
				}
			} else {
				$t_event->C_POST->ViewValue = NULL;
			}
			$t_event->C_POST->CssStyle = "";
			$t_event->C_POST->CssClass = "";
			$t_event->C_POST->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->ViewValue = $t_event->C_DATETIME_BEGIN->CurrentValue;
			$t_event->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event->C_DATETIME_BEGIN->CssStyle = "";
			$t_event->C_DATETIME_BEGIN->CssClass = "";
			$t_event->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->ViewValue = $t_event->C_DATETIME_END->CurrentValue;
			$t_event->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_END->ViewValue, 7);
			$t_event->C_DATETIME_END->CssStyle = "";
			$t_event->C_DATETIME_END->CssClass = "";
			$t_event->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ODER
			$t_event->C_ODER->ViewValue = $t_event->C_ODER->CurrentValue;
			$t_event->C_ODER->ViewValue = ew_FormatDateTime($t_event->C_ODER->ViewValue, 7);
			$t_event->C_ODER->CssStyle = "";
			$t_event->C_ODER->CssClass = "";
			$t_event->C_ODER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->ViewValue = $t_event->C_USER_ADD->CurrentValue;
			$t_event->C_USER_ADD->CssStyle = "";
			$t_event->C_USER_ADD->CssClass = "";
			$t_event->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->ViewValue = $t_event->C_ADD_TIME->CurrentValue;
			$t_event->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event->C_ADD_TIME->ViewValue, 7);
			$t_event->C_ADD_TIME->CssStyle = "";
			$t_event->C_ADD_TIME->CssClass = "";
			$t_event->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->ViewValue = $t_event->C_USER_EDIT->CurrentValue;
			$t_event->C_USER_EDIT->CssStyle = "";
			$t_event->C_USER_EDIT->CssClass = "";
			$t_event->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->ViewValue = $t_event->C_EDIT_TIME->CurrentValue;
			$t_event->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event->C_EDIT_TIME->ViewValue, 7);
			$t_event->C_EDIT_TIME->CssStyle = "";
			$t_event->C_EDIT_TIME->CssClass = "";
			$t_event->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
						break;
					default:
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = $t_event->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->ViewValue = $t_event->C_TIME_ACTIVE->CurrentValue;
			$t_event->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event->C_TIME_ACTIVE->ViewValue, 7);
			$t_event->C_TIME_ACTIVE->CssStyle = "";
			$t_event->C_TIME_ACTIVE->CssClass = "";
			$t_event->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_event->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_event->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_event->C_SEND_MAIL->ViewValue = "khong gui mail";
						break;
					case "1":
						$t_event->C_SEND_MAIL->ViewValue = "gui mail";
						break;
					default:
						$t_event->C_SEND_MAIL->ViewValue = $t_event->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_event->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_event->C_SEND_MAIL->CssStyle = "";
			$t_event->C_SEND_MAIL->CssClass = "";
			$t_event->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_FK_BROWSE
			if (strval($t_event->C_FK_BROWSE->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->C_FK_BROWSE->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`C_HOTEN` = '" . ew_AdjustSql(trim($wrk)) . "'";
				}	
			$sSqlWrk = "SELECT `C_EMAIL` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->C_FK_BROWSE->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->C_FK_BROWSE->ViewValue .= $rswrk->fields('C_EMAIL');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->C_FK_BROWSE->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->C_FK_BROWSE->ViewValue = $t_event->C_FK_BROWSE->CurrentValue;
				}
			} else {
				$t_event->C_FK_BROWSE->ViewValue = NULL;
			}
			$t_event->C_FK_BROWSE->CssStyle = "";
			$t_event->C_FK_BROWSE->CssClass = "";
			$t_event->C_FK_BROWSE->ViewCustomAttributes = "";

			// FK_ARRAY_TINBAI
			if (strval($t_event->FK_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_TINBAI->CurrentValue);
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
					$t_event->FK_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_TINBAI->ViewValue = $t_event->FK_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_TINBAI->CssStyle = "";
			$t_event->FK_ARRAY_TINBAI->CssClass = "";
			$t_event->FK_ARRAY_TINBAI->ViewCustomAttributes = "";

			// FK_ARRAY_CONGTY
			if (strval($t_event->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_CONGTY->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_ARRAY_CONGTY->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_CONGTY->ViewValue = $t_event->FK_ARRAY_CONGTY->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_CONGTY->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_CONGTY->CssStyle = "";
			$t_event->FK_ARRAY_CONGTY->CssClass = "";
			$t_event->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// C_EVENT_ID
			$t_event->C_EVENT_ID->HrefValue = "";
			$t_event->C_EVENT_ID->TooltipValue = "";

			// FK_CONGTY_ID
			$t_event->FK_CONGTY_ID->HrefValue = "";
			$t_event->FK_CONGTY_ID->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->HrefValue = "";
			$t_event->C_TYPE_EVENT->TooltipValue = "";

			// C_POST
			$t_event->C_POST->HrefValue = "";
			$t_event->C_POST->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->HrefValue = "";
			$t_event->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->HrefValue = "";
			$t_event->C_DATETIME_END->TooltipValue = "";

			// C_ODER
			$t_event->C_ODER->HrefValue = "";
			$t_event->C_ODER->TooltipValue = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->HrefValue = "";
			$t_event->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->HrefValue = "";
			$t_event->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->HrefValue = "";
			$t_event->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->HrefValue = "";
			$t_event->C_EDIT_TIME->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event->C_ACTIVE_LEVELSITE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->HrefValue = "";
			$t_event->C_TIME_ACTIVE->TooltipValue = "";

			// C_SEND_MAIL
			$t_event->C_SEND_MAIL->HrefValue = "";
			$t_event->C_SEND_MAIL->TooltipValue = "";

			// C_FK_BROWSE
			$t_event->C_FK_BROWSE->HrefValue = "";
			$t_event->C_FK_BROWSE->TooltipValue = "";

			// FK_ARRAY_TINBAI
			$t_event->FK_ARRAY_TINBAI->HrefValue = "";
			$t_event->FK_ARRAY_TINBAI->TooltipValue = "";

			// FK_ARRAY_CONGTY
			$t_event->FK_ARRAY_CONGTY->HrefValue = "";
			$t_event->FK_ARRAY_CONGTY->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_event->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event->Row_Rendered();
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
