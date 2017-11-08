<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lichcongtacinfo.php" ?>
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
$t_lichcongtac_delete = new ct_lichcongtac_delete();
$Page =& $t_lichcongtac_delete;

// Page init
$t_lichcongtac_delete->Page_Init();

// Page main
$t_lichcongtac_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lichcongtac_delete = new ew_Page("t_lichcongtac_delete");

// page properties
t_lichcongtac_delete.PageID = "delete"; // page ID
t_lichcongtac_delete.FormID = "ft_lichcongtacdelete"; // form ID
var EW_PAGE_ID = t_lichcongtac_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lichcongtac_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lichcongtac_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lichcongtac_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lichcongtac_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_lichcongtac_delete->LoadRecordset())
	$t_lichcongtac_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_lichcongtac_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_lichcongtac_delete->Page_Terminate("t_lichcongtaclist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lichcongtac->TableCaption() ?><br><br>
<a href="<?php echo $t_lichcongtac->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lichcongtac_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_lichcongtac">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_lichcongtac_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_lichcongtac->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_lichcongtac->FK_CONGTY->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->FK_SB_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_TITLE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_DATE_STAR->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_HOUR_START->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_MINUTES_STAR->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_STATUS_STAR->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_DATE_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_HOUR_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_MINUTES_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_STATUS_END->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_ORGANIZATION->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_WHERE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_PREPARED->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_OPTION->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_PUBLISH->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lichcongtac->C_FK_PUBLISH->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_lichcongtac_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_lichcongtac_delete->lRecCnt++;

	// Set row properties
	$t_lichcongtac->CssClass = "";
	$t_lichcongtac->CssStyle = "";
	$t_lichcongtac->RowAttrs = array();
	$t_lichcongtac->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_lichcongtac_delete->LoadRowValues($rs);

	// Render row
	$t_lichcongtac_delete->RenderRow();
?>
	<tr<?php echo $t_lichcongtac->RowAttributes() ?>>
		<td<?php echo $t_lichcongtac->FK_CONGTY->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->FK_CONGTY->ViewAttributes() ?>><?php echo $t_lichcongtac->FK_CONGTY->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->FK_SB_ID->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->FK_SB_ID->ViewAttributes() ?>><?php echo $t_lichcongtac->FK_SB_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_TITLE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_TITLE->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_DATE_STAR->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATE_STAR->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATE_STAR->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_HOUR_START->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_HOUR_START->ViewAttributes() ?>><?php echo $t_lichcongtac->C_HOUR_START->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_MINUTES_STAR->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_MINUTES_STAR->ViewAttributes() ?>><?php echo $t_lichcongtac->C_MINUTES_STAR->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_STATUS_STAR->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_STATUS_STAR->ViewAttributes() ?>><?php echo $t_lichcongtac->C_STATUS_STAR->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_DATE_END->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATE_END->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATE_END->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_HOUR_END->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_HOUR_END->ViewAttributes() ?>><?php echo $t_lichcongtac->C_HOUR_END->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_MINUTES_END->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_MINUTES_END->ViewAttributes() ?>><?php echo $t_lichcongtac->C_MINUTES_END->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_STATUS_END->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_STATUS_END->ViewAttributes() ?>><?php echo $t_lichcongtac->C_STATUS_END->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_ORGANIZATION->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_ORGANIZATION->ViewAttributes() ?>><?php echo $t_lichcongtac->C_ORGANIZATION->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_WHERE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_WHERE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_WHERE->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_PREPARED->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PREPARED->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PREPARED->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_OPTION->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_OPTION->ViewAttributes() ?>><?php echo $t_lichcongtac->C_OPTION->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_ACTIVE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac->C_PUBLISH->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->ListViewValue() ?></div></td>
		<td<?php echo $t_lichcongtac->C_FK_PUBLISH->CellAttributes() ?>>
<div<?php echo $t_lichcongtac->C_FK_PUBLISH->ViewAttributes() ?>><?php echo $t_lichcongtac->C_FK_PUBLISH->ListViewValue() ?></div></td>
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
$t_lichcongtac_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lichcongtac_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_lichcongtac';

	// Page object name
	var $PageObjName = 't_lichcongtac_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) $PageUrl .= "t=" . $t_lichcongtac->TableVar . "&"; // Add page token
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
		global $objForm, $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) {
			if ($objForm)
				return ($t_lichcongtac->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lichcongtac->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lichcongtac_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lichcongtac)
		$GLOBALS["t_lichcongtac"] = new ct_lichcongtac();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lichcongtac', TRUE);

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
		global $t_lichcongtac;

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
			$this->Page_Terminate("t_lichcongtaclist.php");
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
		global $Language, $t_lichcongtac;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["C_CADENLAR_ID"] <> "") {
			$t_lichcongtac->C_CADENLAR_ID->setQueryStringValue($_GET["C_CADENLAR_ID"]);
			if (!is_numeric($t_lichcongtac->C_CADENLAR_ID->QueryStringValue))
				$this->Page_Terminate("t_lichcongtaclist.php"); // Prevent SQL injection, exit
			$sKey .= $t_lichcongtac->C_CADENLAR_ID->QueryStringValue;
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
			$this->Page_Terminate("t_lichcongtaclist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_lichcongtaclist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`C_CADENLAR_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_lichcongtac class, t_lichcongtacinfo.php

		$t_lichcongtac->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_lichcongtac->CurrentAction = $_POST["a_delete"];
		} else {
			$t_lichcongtac->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_lichcongtac->CurrentAction) {
			case "D": // Delete
				$t_lichcongtac->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_lichcongtac->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_lichcongtac;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_lichcongtac->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_lichcongtac class, t_lichcongtacinfo.php

		$t_lichcongtac->CurrentFilter = $sWrkFilter;
		$sSql = $t_lichcongtac->SQL();
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
				$DeleteRows = $t_lichcongtac->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['C_CADENLAR_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_lichcongtac->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_lichcongtac->CancelMessage <> "") {
				$this->setMessage($t_lichcongtac->CancelMessage);
				$t_lichcongtac->CancelMessage = "";
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
				$t_lichcongtac->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lichcongtac;

		// Call Recordset Selecting event
		$t_lichcongtac->Recordset_Selecting($t_lichcongtac->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lichcongtac->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lichcongtac->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lichcongtac;
		$sFilter = $t_lichcongtac->KeyFilter();

		// Call Row Selecting event
		$t_lichcongtac->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lichcongtac->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lichcongtac->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lichcongtac;
		$t_lichcongtac->C_CADENLAR_ID->setDbValue($rs->fields('C_CADENLAR_ID'));
		$t_lichcongtac->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_lichcongtac->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
		$t_lichcongtac->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_lichcongtac->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
		$t_lichcongtac->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
		$t_lichcongtac->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
		$t_lichcongtac->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
		$t_lichcongtac->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
		$t_lichcongtac->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
		$t_lichcongtac->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
		$t_lichcongtac->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
		$t_lichcongtac->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_lichcongtac->C_ORGANIZATION->setDbValue($rs->fields('C_ORGANIZATION'));
		$t_lichcongtac->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
		$t_lichcongtac->C_WHERE->setDbValue($rs->fields('C_WHERE'));
		$t_lichcongtac->C_PREPARED->setDbValue($rs->fields('C_PREPARED'));
		$t_lichcongtac->C_OPTION->setDbValue($rs->fields('C_OPTION'));
		$t_lichcongtac->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH');
		$t_lichcongtac->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lichcongtac->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
		$t_lichcongtac->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_lichcongtac->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
		$t_lichcongtac->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
		$t_lichcongtac->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lichcongtac->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lichcongtac->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lichcongtac->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lichcongtac;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lichcongtac->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_lichcongtac->FK_CONGTY->CellCssStyle = ""; $t_lichcongtac->FK_CONGTY->CellCssClass = "";
		$t_lichcongtac->FK_CONGTY->CellAttrs = array(); $t_lichcongtac->FK_CONGTY->ViewAttrs = array(); $t_lichcongtac->FK_CONGTY->EditAttrs = array();

		// FK_SB_ID
		$t_lichcongtac->FK_SB_ID->CellCssStyle = ""; $t_lichcongtac->FK_SB_ID->CellCssClass = "";
		$t_lichcongtac->FK_SB_ID->CellAttrs = array(); $t_lichcongtac->FK_SB_ID->ViewAttrs = array(); $t_lichcongtac->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$t_lichcongtac->C_TITLE->CellCssStyle = ""; $t_lichcongtac->C_TITLE->CellCssClass = "";
		$t_lichcongtac->C_TITLE->CellAttrs = array(); $t_lichcongtac->C_TITLE->ViewAttrs = array(); $t_lichcongtac->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$t_lichcongtac->C_DATE_STAR->CellCssStyle = ""; $t_lichcongtac->C_DATE_STAR->CellCssClass = "";
		$t_lichcongtac->C_DATE_STAR->CellAttrs = array(); $t_lichcongtac->C_DATE_STAR->ViewAttrs = array(); $t_lichcongtac->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$t_lichcongtac->C_HOUR_START->CellCssStyle = ""; $t_lichcongtac->C_HOUR_START->CellCssClass = "";
		$t_lichcongtac->C_HOUR_START->CellAttrs = array(); $t_lichcongtac->C_HOUR_START->ViewAttrs = array(); $t_lichcongtac->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$t_lichcongtac->C_MINUTES_STAR->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_STAR->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_STAR->CellAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$t_lichcongtac->C_STATUS_STAR->CellCssStyle = ""; $t_lichcongtac->C_STATUS_STAR->CellCssClass = "";
		$t_lichcongtac->C_STATUS_STAR->CellAttrs = array(); $t_lichcongtac->C_STATUS_STAR->ViewAttrs = array(); $t_lichcongtac->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$t_lichcongtac->C_DATE_END->CellCssStyle = ""; $t_lichcongtac->C_DATE_END->CellCssClass = "";
		$t_lichcongtac->C_DATE_END->CellAttrs = array(); $t_lichcongtac->C_DATE_END->ViewAttrs = array(); $t_lichcongtac->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$t_lichcongtac->C_HOUR_END->CellCssStyle = ""; $t_lichcongtac->C_HOUR_END->CellCssClass = "";
		$t_lichcongtac->C_HOUR_END->CellAttrs = array(); $t_lichcongtac->C_HOUR_END->ViewAttrs = array(); $t_lichcongtac->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$t_lichcongtac->C_MINUTES_END->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_END->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_END->CellAttrs = array(); $t_lichcongtac->C_MINUTES_END->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$t_lichcongtac->C_STATUS_END->CellCssStyle = ""; $t_lichcongtac->C_STATUS_END->CellCssClass = "";
		$t_lichcongtac->C_STATUS_END->CellAttrs = array(); $t_lichcongtac->C_STATUS_END->ViewAttrs = array(); $t_lichcongtac->C_STATUS_END->EditAttrs = array();

		// C_ORGANIZATION
		$t_lichcongtac->C_ORGANIZATION->CellCssStyle = ""; $t_lichcongtac->C_ORGANIZATION->CellCssClass = "";
		$t_lichcongtac->C_ORGANIZATION->CellAttrs = array(); $t_lichcongtac->C_ORGANIZATION->ViewAttrs = array(); $t_lichcongtac->C_ORGANIZATION->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$t_lichcongtac->C_PARTICIPANTS_ID->CellCssStyle = ""; $t_lichcongtac->C_PARTICIPANTS_ID->CellCssClass = "";
		$t_lichcongtac->C_PARTICIPANTS_ID->CellAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->ViewAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_WHERE
		$t_lichcongtac->C_WHERE->CellCssStyle = ""; $t_lichcongtac->C_WHERE->CellCssClass = "";
		$t_lichcongtac->C_WHERE->CellAttrs = array(); $t_lichcongtac->C_WHERE->ViewAttrs = array(); $t_lichcongtac->C_WHERE->EditAttrs = array();

		// C_PREPARED
		$t_lichcongtac->C_PREPARED->CellCssStyle = ""; $t_lichcongtac->C_PREPARED->CellCssClass = "";
		$t_lichcongtac->C_PREPARED->CellAttrs = array(); $t_lichcongtac->C_PREPARED->ViewAttrs = array(); $t_lichcongtac->C_PREPARED->EditAttrs = array();

		// C_OPTION
		$t_lichcongtac->C_OPTION->CellCssStyle = ""; $t_lichcongtac->C_OPTION->CellCssClass = "";
		$t_lichcongtac->C_OPTION->CellAttrs = array(); $t_lichcongtac->C_OPTION->ViewAttrs = array(); $t_lichcongtac->C_OPTION->EditAttrs = array();

		// C_ACTIVE
		$t_lichcongtac->C_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_ACTIVE->EditAttrs = array();

		// C_DATETIME_ACTIVE
		$t_lichcongtac->C_DATETIME_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$t_lichcongtac->C_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$t_lichcongtac->C_DATETIME_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$t_lichcongtac->C_FK_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_FK_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_FK_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->EditAttrs = array();
		if ($t_lichcongtac->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_CADENLAR_ID
			$t_lichcongtac->C_CADENLAR_ID->ViewValue = $t_lichcongtac->C_CADENLAR_ID->CurrentValue;
			$t_lichcongtac->C_CADENLAR_ID->CssStyle = "";
			$t_lichcongtac->C_CADENLAR_ID->CssClass = "";
			$t_lichcongtac->C_CADENLAR_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_lichcongtac->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_CONGTY->ViewValue = $t_lichcongtac->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_CONGTY->ViewValue = NULL;
			}
			$t_lichcongtac->FK_CONGTY->CssStyle = "";
			$t_lichcongtac->FK_CONGTY->CssClass = "";
			$t_lichcongtac->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			if (strval($t_lichcongtac->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_SB_ID->ViewValue = $t_lichcongtac->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_SB_ID->ViewValue = NULL;
			}
			$t_lichcongtac->FK_SB_ID->CssStyle = "";
			$t_lichcongtac->FK_SB_ID->CssClass = "";
			$t_lichcongtac->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->ViewValue = $t_lichcongtac->C_TITLE->CurrentValue;
			$t_lichcongtac->C_TITLE->CssStyle = "";
			$t_lichcongtac->C_TITLE->CssClass = "";
			$t_lichcongtac->C_TITLE->ViewCustomAttributes = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->ViewValue = $t_lichcongtac->C_DATE_STAR->CurrentValue;
			$t_lichcongtac->C_DATE_STAR->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_STAR->ViewValue, 7);
			$t_lichcongtac->C_DATE_STAR->CssStyle = "";
			$t_lichcongtac->C_DATE_STAR->CssClass = "";
			$t_lichcongtac->C_DATE_STAR->ViewCustomAttributes = "";

			// C_HOUR_START
			if (strval($t_lichcongtac->C_HOUR_START->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_START->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_START->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_HOUR_START->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_HOUR_START->ViewValue = $t_lichcongtac->C_HOUR_START->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_START->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_START->CssStyle = "";
			$t_lichcongtac->C_HOUR_START->CssClass = "";
			$t_lichcongtac->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
			if (strval($t_lichcongtac->C_MINUTES_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = $t_lichcongtac->C_MINUTES_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
			if (strval($t_lichcongtac->C_STATUS_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_STAR->ViewValue = "Khong xac dinh";
						break;
					default:
						$t_lichcongtac->C_STATUS_STAR->ViewValue = $t_lichcongtac->C_STATUS_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac->C_STATUS_STAR->ViewCustomAttributes = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->ViewValue = $t_lichcongtac->C_DATE_END->CurrentValue;
			$t_lichcongtac->C_DATE_END->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_END->ViewValue, 7);
			$t_lichcongtac->C_DATE_END->CssStyle = "";
			$t_lichcongtac->C_DATE_END->CssClass = "";
			$t_lichcongtac->C_DATE_END->ViewCustomAttributes = "";

			// C_HOUR_END
			if (strval($t_lichcongtac->C_HOUR_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac->C_HOUR_END->ViewValue = $t_lichcongtac->C_HOUR_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_END->CssStyle = "";
			$t_lichcongtac->C_HOUR_END->CssClass = "";
			$t_lichcongtac->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
			if (strval($t_lichcongtac->C_MINUTES_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_END->ViewValue = $t_lichcongtac->C_MINUTES_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac->C_MINUTES_END->CssClass = "";
			$t_lichcongtac->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
			if (strval($t_lichcongtac->C_STATUS_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_END->ViewValue = "Khong xac dinh";
						break;
					default:
						$t_lichcongtac->C_STATUS_END->ViewValue = $t_lichcongtac->C_STATUS_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_END->CssStyle = "";
			$t_lichcongtac->C_STATUS_END->CssClass = "";
			$t_lichcongtac->C_STATUS_END->ViewCustomAttributes = "";

			// C_ORGANIZATION
			$t_lichcongtac->C_ORGANIZATION->ViewValue = $t_lichcongtac->C_ORGANIZATION->CurrentValue;
			$t_lichcongtac->C_ORGANIZATION->CssStyle = "";
			$t_lichcongtac->C_ORGANIZATION->CssClass = "";
			$t_lichcongtac->C_ORGANIZATION->ViewCustomAttributes = "";

			// C_PARTICIPANTS_ID
			if (strval($t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue) <> "") {
				$arwrk = explode(",", $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue);
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
					$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = NULL;
			}
			$t_lichcongtac->C_PARTICIPANTS_ID->CssStyle = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->CssClass = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac->C_WHERE->ViewValue = $t_lichcongtac->C_WHERE->CurrentValue;
			$t_lichcongtac->C_WHERE->CssStyle = "";
			$t_lichcongtac->C_WHERE->CssClass = "";
			$t_lichcongtac->C_WHERE->ViewCustomAttributes = "";

			// C_PREPARED
			$t_lichcongtac->C_PREPARED->ViewValue = $t_lichcongtac->C_PREPARED->CurrentValue;
			$t_lichcongtac->C_PREPARED->CssStyle = "";
			$t_lichcongtac->C_PREPARED->CssClass = "";
			$t_lichcongtac->C_PREPARED->ViewCustomAttributes = "";

			// C_OPTION
			if (strval($t_lichcongtac->C_OPTION->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_OPTION->CurrentValue) {
					case "0":
						$t_lichcongtac->C_OPTION->ViewValue = "su kien cong khai";
						break;
					case "1":
						$t_lichcongtac->C_OPTION->ViewValue = "su kien quan trong";
						break;
					default:
						$t_lichcongtac->C_OPTION->ViewValue = $t_lichcongtac->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_OPTION->ViewValue = NULL;
			}
			$t_lichcongtac->C_OPTION->CssStyle = "";
			$t_lichcongtac->C_OPTION->CssClass = "";
			$t_lichcongtac->C_OPTION->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lichcongtac->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Khong xuat ban levelsite";
						break;
					case "1":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Xuat ban level site";
						break;
					default:
						$t_lichcongtac->C_ACTIVE->ViewValue = $t_lichcongtac->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_ACTIVE->ViewValue = NULL;
			}
			$t_lichcongtac->C_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_ACTIVE->CssClass = "";
			$t_lichcongtac->C_ACTIVE->ViewCustomAttributes = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = $t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue;
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_ACTIVE->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->CssClass = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_lichcongtac->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_PUBLISH->CurrentValue) {
					case "0":
						$t_lichcongtac->C_PUBLISH->ViewValue = "khong xuat ban mainsite";
						break;
					case "1":
						$t_lichcongtac->C_PUBLISH->ViewValue = "xuat ban mainsite";
						break;
					default:
						$t_lichcongtac->C_PUBLISH->ViewValue = $t_lichcongtac->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_PUBLISH->ViewValue = NULL;
			}
			$t_lichcongtac->C_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_PUBLISH->CssClass = "";
			$t_lichcongtac->C_PUBLISH->ViewCustomAttributes = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = $t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue;
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_PUBLISH->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->CssClass = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->ViewValue = $t_lichcongtac->C_FK_PUBLISH->CurrentValue;
			$t_lichcongtac->C_FK_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_FK_PUBLISH->CssClass = "";
			$t_lichcongtac->C_FK_PUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lichcongtac->C_USER_ADD->ViewValue = $t_lichcongtac->C_USER_ADD->CurrentValue;
			$t_lichcongtac->C_USER_ADD->CssStyle = "";
			$t_lichcongtac->C_USER_ADD->CssClass = "";
			$t_lichcongtac->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lichcongtac->C_ADD_TIME->ViewValue = $t_lichcongtac->C_ADD_TIME->CurrentValue;
			$t_lichcongtac->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_ADD_TIME->ViewValue, 7);
			$t_lichcongtac->C_ADD_TIME->CssStyle = "";
			$t_lichcongtac->C_ADD_TIME->CssClass = "";
			$t_lichcongtac->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lichcongtac->C_USER_EDIT->ViewValue = $t_lichcongtac->C_USER_EDIT->CurrentValue;
			$t_lichcongtac->C_USER_EDIT->CssStyle = "";
			$t_lichcongtac->C_USER_EDIT->CssClass = "";
			$t_lichcongtac->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lichcongtac->C_EDIT_TIME->ViewValue = $t_lichcongtac->C_EDIT_TIME->CurrentValue;
			$t_lichcongtac->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_EDIT_TIME->ViewValue, 7);
			$t_lichcongtac->C_EDIT_TIME->CssStyle = "";
			$t_lichcongtac->C_EDIT_TIME->CssClass = "";
			$t_lichcongtac->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_lichcongtac->FK_CONGTY->HrefValue = "";
			$t_lichcongtac->FK_CONGTY->TooltipValue = "";

			// FK_SB_ID
			$t_lichcongtac->FK_SB_ID->HrefValue = "";
			$t_lichcongtac->FK_SB_ID->TooltipValue = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->HrefValue = "";
			$t_lichcongtac->C_TITLE->TooltipValue = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->HrefValue = "";
			$t_lichcongtac->C_DATE_STAR->TooltipValue = "";

			// C_HOUR_START
			$t_lichcongtac->C_HOUR_START->HrefValue = "";
			$t_lichcongtac->C_HOUR_START->TooltipValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac->C_MINUTES_STAR->HrefValue = "";
			$t_lichcongtac->C_MINUTES_STAR->TooltipValue = "";

			// C_STATUS_STAR
			$t_lichcongtac->C_STATUS_STAR->HrefValue = "";
			$t_lichcongtac->C_STATUS_STAR->TooltipValue = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->HrefValue = "";
			$t_lichcongtac->C_DATE_END->TooltipValue = "";

			// C_HOUR_END
			$t_lichcongtac->C_HOUR_END->HrefValue = "";
			$t_lichcongtac->C_HOUR_END->TooltipValue = "";

			// C_MINUTES_END
			$t_lichcongtac->C_MINUTES_END->HrefValue = "";
			$t_lichcongtac->C_MINUTES_END->TooltipValue = "";

			// C_STATUS_END
			$t_lichcongtac->C_STATUS_END->HrefValue = "";
			$t_lichcongtac->C_STATUS_END->TooltipValue = "";

			// C_ORGANIZATION
			$t_lichcongtac->C_ORGANIZATION->HrefValue = "";
			$t_lichcongtac->C_ORGANIZATION->TooltipValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac->C_PARTICIPANTS_ID->HrefValue = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->TooltipValue = "";

			// C_WHERE
			$t_lichcongtac->C_WHERE->HrefValue = "";
			$t_lichcongtac->C_WHERE->TooltipValue = "";

			// C_PREPARED
			$t_lichcongtac->C_PREPARED->HrefValue = "";
			$t_lichcongtac->C_PREPARED->TooltipValue = "";

			// C_OPTION
			$t_lichcongtac->C_OPTION->HrefValue = "";
			$t_lichcongtac->C_OPTION->TooltipValue = "";

			// C_ACTIVE
			$t_lichcongtac->C_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_ACTIVE->TooltipValue = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->TooltipValue = "";

			// C_PUBLISH
			$t_lichcongtac->C_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_PUBLISH->TooltipValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->TooltipValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_FK_PUBLISH->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_lichcongtac->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lichcongtac->Row_Rendered();
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
