<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersadmininfo.php" ?>
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
$usersadmin_delete = new cusersadmin_delete();
$Page =& $usersadmin_delete;

// Page init
$usersadmin_delete->Page_Init();

// Page main
$usersadmin_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var usersadmin_delete = new ew_Page("usersadmin_delete");

// page properties
usersadmin_delete.PageID = "delete"; // page ID
usersadmin_delete.FormID = "fusersadmindelete"; // form ID
var EW_PAGE_ID = usersadmin_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
usersadmin_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
usersadmin_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
usersadmin_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
usersadmin_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $usersadmin_delete->LoadRecordset())
	$usersadmin_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($usersadmin_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$usersadmin_delete->Page_Terminate("usersadminlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $usersadmin->TableCaption() ?><br><br>
<a href="<?php echo $usersadmin->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$usersadmin_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="usersadmin">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($usersadmin_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $usersadmin->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $usersadmin->C_TENDANGNHAP->FldCaption() ?></td>
		<td valign="top"><?php echo $usersadmin->C_HOTEN->FldCaption() ?></td>
		<td valign="top"><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$usersadmin_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$usersadmin_delete->lRecCnt++;

	// Set row properties
	$usersadmin->CssClass = "";
	$usersadmin->CssStyle = "";
	$usersadmin->RowAttrs = array();
	$usersadmin->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$usersadmin_delete->LoadRowValues($rs);

	// Render row
	$usersadmin_delete->RenderRow();
?>
	<tr<?php echo $usersadmin->RowAttributes() ?>>
		<td<?php echo $usersadmin->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $usersadmin->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $usersadmin->C_TENDANGNHAP->ListViewValue() ?></div></td>
		<td<?php echo $usersadmin->C_HOTEN->CellAttributes() ?>>
<div<?php echo $usersadmin->C_HOTEN->ViewAttributes() ?>><?php echo $usersadmin->C_HOTEN->ListViewValue() ?></div></td>
		<td<?php echo $usersadmin->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $usersadmin->FK_USERLEVELID->ViewAttributes() ?>><?php echo $usersadmin->FK_USERLEVELID->ListViewValue() ?></div></td>
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
$usersadmin_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cusersadmin_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'usersadmin';

	// Page object name
	var $PageObjName = 'usersadmin_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $usersadmin;
		if ($usersadmin->UseTokenInUrl) $PageUrl .= "t=" . $usersadmin->TableVar . "&"; // Add page token
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
		global $objForm, $usersadmin;
		if ($usersadmin->UseTokenInUrl) {
			if ($objForm)
				return ($usersadmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($usersadmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusersadmin_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (usersadmin)
		$GLOBALS["usersadmin"] = new cusersadmin();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'usersadmin', TRUE);

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
		global $usersadmin;

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
			$this->Page_Terminate("usersadminlist.php");
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
		global $Language, $usersadmin;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
			$usersadmin->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
			if (!is_numeric($usersadmin->PK_NGUOIDUNG_ID->QueryStringValue))
				$this->Page_Terminate("usersadminlist.php"); // Prevent SQL injection, exit
			$sKey .= $usersadmin->PK_NGUOIDUNG_ID->QueryStringValue;
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
			$this->Page_Terminate("usersadminlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("usersadminlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "t_nguoidung.PK_NGUOIDUNG_ID=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in usersadmin class, usersadmininfo.php

		$usersadmin->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$usersadmin->CurrentAction = $_POST["a_delete"];
		} else {
			$usersadmin->CurrentAction = "D"; // Delete record directly
		}
		switch ($usersadmin->CurrentAction) {
			case "D": // Delete
				$usersadmin->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($usersadmin->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $usersadmin;
		$DeleteRows = TRUE;
		$sWrkFilter = $usersadmin->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in usersadmin class, usersadmininfo.php

		$usersadmin->CurrentFilter = $sWrkFilter;
		$sSql = $usersadmin->SQL();
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
				$DeleteRows = $usersadmin->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_NGUOIDUNG_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($usersadmin->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($usersadmin->CancelMessage <> "") {
				$this->setMessage($usersadmin->CancelMessage);
				$usersadmin->CancelMessage = "";
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
				$usersadmin->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $usersadmin;

		// Call Recordset Selecting event
		$usersadmin->Recordset_Selecting($usersadmin->CurrentFilter);

		// Load List page SQL
		$sSql = $usersadmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$usersadmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $usersadmin;
		$sFilter = $usersadmin->KeyFilter();

		// Call Row Selecting event
		$usersadmin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$usersadmin->CurrentFilter = $sFilter;
		$sSql = $usersadmin->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$usersadmin->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$usersadmin->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$usersadmin->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$usersadmin->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$usersadmin->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$usersadmin->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$usersadmin->C_TEL->setDbValue($rs->fields('C_TEL'));
		$usersadmin->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$usersadmin->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$usersadmin->C_FAX->setDbValue($rs->fields('C_FAX'));
		$usersadmin->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$usersadmin->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $usersadmin;

		// Initialize URLs
		// Call Row_Rendering event

		$usersadmin->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$usersadmin->C_TENDANGNHAP->CellCssStyle = ""; $usersadmin->C_TENDANGNHAP->CellCssClass = "";
		$usersadmin->C_TENDANGNHAP->CellAttrs = array(); $usersadmin->C_TENDANGNHAP->ViewAttrs = array(); $usersadmin->C_TENDANGNHAP->EditAttrs = array();

		// C_HOTEN
		$usersadmin->C_HOTEN->CellCssStyle = ""; $usersadmin->C_HOTEN->CellCssClass = "";
		$usersadmin->C_HOTEN->CellAttrs = array(); $usersadmin->C_HOTEN->ViewAttrs = array(); $usersadmin->C_HOTEN->EditAttrs = array();

		// FK_USERLEVELID
		$usersadmin->FK_USERLEVELID->CellCssStyle = ""; $usersadmin->FK_USERLEVELID->CellCssClass = "";
		$usersadmin->FK_USERLEVELID->CellAttrs = array(); $usersadmin->FK_USERLEVELID->ViewAttrs = array(); $usersadmin->FK_USERLEVELID->EditAttrs = array();
		if ($usersadmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$usersadmin->PK_NGUOIDUNG_ID->ViewValue = $usersadmin->PK_NGUOIDUNG_ID->CurrentValue;
			$usersadmin->PK_NGUOIDUNG_ID->CssStyle = "";
			$usersadmin->PK_NGUOIDUNG_ID->CssClass = "";
			$usersadmin->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->ViewValue = $usersadmin->C_TENDANGNHAP->CurrentValue;
			$usersadmin->C_TENDANGNHAP->CssStyle = "";
			$usersadmin->C_TENDANGNHAP->CssClass = "";
			$usersadmin->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->ViewValue = "********";
			$usersadmin->C_MATKHAU->CssStyle = "";
			$usersadmin->C_MATKHAU->CssClass = "";
			$usersadmin->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$usersadmin->FK_MACONGTY->ViewValue = $usersadmin->FK_MACONGTY->CurrentValue;
			$usersadmin->FK_MACONGTY->CssStyle = "";
			$usersadmin->FK_MACONGTY->CssClass = "";
			$usersadmin->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->ViewValue = $usersadmin->C_HOTEN->CurrentValue;
			$usersadmin->C_HOTEN->CssStyle = "";
			$usersadmin->C_HOTEN->CssClass = "";
			$usersadmin->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->ViewValue = $usersadmin->C_DIACHI->CurrentValue;
			$usersadmin->C_DIACHI->CssStyle = "";
			$usersadmin->C_DIACHI->CssClass = "";
			$usersadmin->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$usersadmin->C_TEL->ViewValue = $usersadmin->C_TEL->CurrentValue;
			$usersadmin->C_TEL->CssStyle = "";
			$usersadmin->C_TEL->CssClass = "";
			$usersadmin->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->ViewValue = $usersadmin->C_TEL_HOME->CurrentValue;
			$usersadmin->C_TEL_HOME->CssStyle = "";
			$usersadmin->C_TEL_HOME->CssClass = "";
			$usersadmin->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->ViewValue = $usersadmin->C_TEL_MOBILE->CurrentValue;
			$usersadmin->C_TEL_MOBILE->CssStyle = "";
			$usersadmin->C_TEL_MOBILE->CssClass = "";
			$usersadmin->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$usersadmin->C_FAX->ViewValue = $usersadmin->C_FAX->CurrentValue;
			$usersadmin->C_FAX->CssStyle = "";
			$usersadmin->C_FAX->CssClass = "";
			$usersadmin->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->ViewValue = $usersadmin->C_EMAIL->CurrentValue;
			$usersadmin->C_EMAIL->CssStyle = "";
			$usersadmin->C_EMAIL->CssClass = "";
			$usersadmin->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($usersadmin->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($usersadmin->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$usersadmin->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$usersadmin->FK_USERLEVELID->ViewValue = $usersadmin->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$usersadmin->FK_USERLEVELID->ViewValue = NULL;
			}
			$usersadmin->FK_USERLEVELID->CssStyle = "";
			$usersadmin->FK_USERLEVELID->CssClass = "";
			$usersadmin->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->HrefValue = "";
			$usersadmin->C_TENDANGNHAP->TooltipValue = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->HrefValue = "";
			$usersadmin->C_HOTEN->TooltipValue = "";

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->HrefValue = "";
			$usersadmin->FK_USERLEVELID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($usersadmin->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$usersadmin->Row_Rendered();
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
