<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_htlienquaninfo.php" ?>
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
$t_htlienquan_delete = new ct_htlienquan_delete();
$Page =& $t_htlienquan_delete;

// Page init
$t_htlienquan_delete->Page_Init();

// Page main
$t_htlienquan_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_htlienquan_delete = new ew_Page("t_htlienquan_delete");

// page properties
t_htlienquan_delete.PageID = "delete"; // page ID
t_htlienquan_delete.FormID = "ft_htlienquandelete"; // form ID
var EW_PAGE_ID = t_htlienquan_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_htlienquan_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_htlienquan_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_htlienquan_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_htlienquan_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_htlienquan_delete->LoadRecordset())
	$t_htlienquan_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_htlienquan_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_htlienquan_delete->Page_Terminate("t_htlienquanlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_htlienquan->TableCaption() ?><br><br>
<a href="<?php echo $t_htlienquan->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_htlienquan_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_htlienquan">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_htlienquan_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_htlienquan->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_htlienquan->FK_OB_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_htlienquan->C_NAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_htlienquan->C_ACTIVE->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_htlienquan_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_htlienquan_delete->lRecCnt++;

	// Set row properties
	$t_htlienquan->CssClass = "";
	$t_htlienquan->CssStyle = "";
	$t_htlienquan->RowAttrs = array();
	$t_htlienquan->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_htlienquan_delete->LoadRowValues($rs);

	// Render row
	$t_htlienquan_delete->RenderRow();
?>
	<tr<?php echo $t_htlienquan->RowAttributes() ?>>
		<td<?php echo $t_htlienquan->FK_OB_ID->CellAttributes() ?>>
<div<?php echo $t_htlienquan->FK_OB_ID->ViewAttributes() ?>><?php echo $t_htlienquan->FK_OB_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_htlienquan->C_NAME->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_NAME->ViewAttributes() ?>><?php echo $t_htlienquan->C_NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_htlienquan->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_htlienquan->C_ACTIVE->ViewAttributes() ?>><?php echo $t_htlienquan->C_ACTIVE->ListViewValue() ?></div></td>
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
$t_htlienquan_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_htlienquan_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_htlienquan';

	// Page object name
	var $PageObjName = 't_htlienquan_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) $PageUrl .= "t=" . $t_htlienquan->TableVar . "&"; // Add page token
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
		global $objForm, $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) {
			if ($objForm)
				return ($t_htlienquan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_htlienquan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_htlienquan_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_htlienquan)
		$GLOBALS["t_htlienquan"] = new ct_htlienquan();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_htlienquan', TRUE);

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
		global $t_htlienquan;

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
			$this->Page_Terminate("t_htlienquanlist.php");
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
		global $Language, $t_htlienquan;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["SYS_ID"] <> "") {
			$t_htlienquan->SYS_ID->setQueryStringValue($_GET["SYS_ID"]);
			if (!is_numeric($t_htlienquan->SYS_ID->QueryStringValue))
				$this->Page_Terminate("t_htlienquanlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_htlienquan->SYS_ID->QueryStringValue;
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
			$this->Page_Terminate("t_htlienquanlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_htlienquanlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`SYS_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_htlienquan class, t_htlienquaninfo.php

		$t_htlienquan->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_htlienquan->CurrentAction = $_POST["a_delete"];
		} else {
			$t_htlienquan->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_htlienquan->CurrentAction) {
			case "D": // Delete
				$t_htlienquan->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_htlienquan->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_htlienquan;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_htlienquan->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_htlienquan class, t_htlienquaninfo.php

		$t_htlienquan->CurrentFilter = $sWrkFilter;
		$sSql = $t_htlienquan->SQL();
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
				$DeleteRows = $t_htlienquan->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['SYS_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_htlienquan->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_htlienquan->CancelMessage <> "") {
				$this->setMessage($t_htlienquan->CancelMessage);
				$t_htlienquan->CancelMessage = "";
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
				$t_htlienquan->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_htlienquan;

		// Call Recordset Selecting event
		$t_htlienquan->Recordset_Selecting($t_htlienquan->CurrentFilter);

		// Load List page SQL
		$sSql = $t_htlienquan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_htlienquan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_htlienquan;
		$sFilter = $t_htlienquan->KeyFilter();

		// Call Row Selecting event
		$t_htlienquan->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_htlienquan->CurrentFilter = $sFilter;
		$sSql = $t_htlienquan->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_htlienquan->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_htlienquan;
		$t_htlienquan->SYS_ID->setDbValue($rs->fields('SYS_ID'));
		$t_htlienquan->FK_OB_ID->setDbValue($rs->fields('FK_OB_ID'));
		$t_htlienquan->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_htlienquan->C_ICON->Upload->DbValue = $rs->fields('C_ICON');
		$t_htlienquan->C_URL->setDbValue($rs->fields('C_URL'));
		$t_htlienquan->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_htlienquan->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_htlienquan->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_htlienquan->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_htlienquan->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_htlienquan;

		// Initialize URLs
		// Call Row_Rendering event

		$t_htlienquan->Row_Rendering();

		// Common render codes for all row types
		// FK_OB_ID

		$t_htlienquan->FK_OB_ID->CellCssStyle = ""; $t_htlienquan->FK_OB_ID->CellCssClass = "";
		$t_htlienquan->FK_OB_ID->CellAttrs = array(); $t_htlienquan->FK_OB_ID->ViewAttrs = array(); $t_htlienquan->FK_OB_ID->EditAttrs = array();

		// C_NAME
		$t_htlienquan->C_NAME->CellCssStyle = ""; $t_htlienquan->C_NAME->CellCssClass = "";
		$t_htlienquan->C_NAME->CellAttrs = array(); $t_htlienquan->C_NAME->ViewAttrs = array(); $t_htlienquan->C_NAME->EditAttrs = array();

		// C_ACTIVE
		$t_htlienquan->C_ACTIVE->CellCssStyle = ""; $t_htlienquan->C_ACTIVE->CellCssClass = "";
		$t_htlienquan->C_ACTIVE->CellAttrs = array(); $t_htlienquan->C_ACTIVE->ViewAttrs = array(); $t_htlienquan->C_ACTIVE->EditAttrs = array();
		if ($t_htlienquan->RowType == EW_ROWTYPE_VIEW) { // View row

			// SYS_ID
			$t_htlienquan->SYS_ID->ViewValue = $t_htlienquan->SYS_ID->CurrentValue;
			$t_htlienquan->SYS_ID->CssStyle = "";
			$t_htlienquan->SYS_ID->CssClass = "";
			$t_htlienquan->SYS_ID->ViewCustomAttributes = "";

			// FK_OB_ID
			if (strval($t_htlienquan->FK_OB_ID->CurrentValue) <> "") {
				$t_htlienquan->FK_OB_ID->ViewValue = "";
				$arwrk = explode(",", strval($t_htlienquan->FK_OB_ID->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "1":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Danh muc tuyen sinh";
							break;
						case "2":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Doi tuong sinh vien dang hoc";
							break;
						default:
							$t_htlienquan->FK_OB_ID->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_htlienquan->FK_OB_ID->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_htlienquan->FK_OB_ID->ViewValue = NULL;
			}
			$t_htlienquan->FK_OB_ID->CssStyle = "";
			$t_htlienquan->FK_OB_ID->CssClass = "";
			$t_htlienquan->FK_OB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_htlienquan->C_NAME->ViewValue = $t_htlienquan->C_NAME->CurrentValue;
			$t_htlienquan->C_NAME->CssStyle = "";
			$t_htlienquan->C_NAME->CssClass = "";
			$t_htlienquan->C_NAME->ViewCustomAttributes = "";

			// C_URL
			$t_htlienquan->C_URL->ViewValue = $t_htlienquan->C_URL->CurrentValue;
			$t_htlienquan->C_URL->CssStyle = "";
			$t_htlienquan->C_URL->CssClass = "";
			$t_htlienquan->C_URL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_htlienquan->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_htlienquan->C_ACTIVE->CurrentValue) {
					case "0":
						$t_htlienquan->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_htlienquan->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_htlienquan->C_ACTIVE->ViewValue = $t_htlienquan->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_htlienquan->C_ACTIVE->ViewValue = NULL;
			}
			$t_htlienquan->C_ACTIVE->CssStyle = "";
			$t_htlienquan->C_ACTIVE->CssClass = "";
			$t_htlienquan->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_htlienquan->C_USER_ADD->ViewValue = $t_htlienquan->C_USER_ADD->CurrentValue;
			$t_htlienquan->C_USER_ADD->CssStyle = "";
			$t_htlienquan->C_USER_ADD->CssClass = "";
			$t_htlienquan->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_htlienquan->C_ADD_TIME->ViewValue = $t_htlienquan->C_ADD_TIME->CurrentValue;
			$t_htlienquan->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_ADD_TIME->ViewValue, 7);
			$t_htlienquan->C_ADD_TIME->CssStyle = "";
			$t_htlienquan->C_ADD_TIME->CssClass = "";
			$t_htlienquan->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->ViewValue = $t_htlienquan->C_USER_EDIT->CurrentValue;
			$t_htlienquan->C_USER_EDIT->CssStyle = "";
			$t_htlienquan->C_USER_EDIT->CssClass = "";
			$t_htlienquan->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->ViewValue = $t_htlienquan->C_EDIT_TIME->CurrentValue;
			$t_htlienquan->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_EDIT_TIME->ViewValue, 7);
			$t_htlienquan->C_EDIT_TIME->CssStyle = "";
			$t_htlienquan->C_EDIT_TIME->CssClass = "";
			$t_htlienquan->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->HrefValue = "";
			$t_htlienquan->FK_OB_ID->TooltipValue = "";

			// C_NAME
			$t_htlienquan->C_NAME->HrefValue = "";
			$t_htlienquan->C_NAME->TooltipValue = "";

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->HrefValue = "";
			$t_htlienquan->C_ACTIVE->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_htlienquan->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_htlienquan->Row_Rendered();
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
