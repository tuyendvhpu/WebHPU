<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersinfo.php" ?>
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
$users_delete = new cusers_delete();
$Page =& $users_delete;

// Page init
$users_delete->Page_Init();

// Page main
$users_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var users_delete = new ew_Page("users_delete");

// page properties
users_delete.PageID = "delete"; // page ID
users_delete.FormID = "fusersdelete"; // form ID
var EW_PAGE_ID = users_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
users_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
users_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
users_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
users_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $users_delete->LoadRecordset())
	$users_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($users_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$users_delete->Page_Terminate("userslist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $users->TableCaption() ?><br><br>
<a href="<?php echo $users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$users_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="users">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($users_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $users->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $users->C_TENDANGNHAP->FldCaption() ?></td>
		<td valign="top"><?php echo $users->FK_MACONGTY->FldCaption() ?></td>
		<td valign="top"><?php echo $users->FK_USERLEVELID->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$users_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$users_delete->lRecCnt++;

	// Set row properties
	$users->CssClass = "";
	$users->CssStyle = "";
	$users->RowAttrs = array();
	$users->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$users_delete->LoadRowValues($rs);

	// Render row
	$users_delete->RenderRow();
?>
	<tr<?php echo $users->RowAttributes() ?>>
		<td<?php echo $users->C_TENDANGNHAP->CellAttributes() ?>>
<div<?php echo $users->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $users->C_TENDANGNHAP->ListViewValue() ?></div></td>
		<td<?php echo $users->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $users->FK_MACONGTY->ViewAttributes() ?>><?php echo $users->FK_MACONGTY->ListViewValue() ?></div></td>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>>
<div<?php echo $users->FK_USERLEVELID->ViewAttributes() ?>><?php echo $users->FK_USERLEVELID->ListViewValue() ?></div></td>
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
$users_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cusers_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'users';

	// Page object name
	var $PageObjName = 'users_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $users;
		if ($users->UseTokenInUrl) $PageUrl .= "t=" . $users->TableVar . "&"; // Add page token
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
		global $objForm, $users;
		if ($users->UseTokenInUrl) {
			if ($objForm)
				return ($users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusers_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (users)
		$GLOBALS["users"] = new cusers();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'users', TRUE);

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
		global $users;

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
			$this->Page_Terminate("userslist.php");
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
		global $Language, $users;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
			$users->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
			if (!is_numeric($users->PK_NGUOIDUNG_ID->QueryStringValue))
				$this->Page_Terminate("userslist.php"); // Prevent SQL injection, exit
			$sKey .= $users->PK_NGUOIDUNG_ID->QueryStringValue;
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
			$this->Page_Terminate("userslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "t_nguoidung.PK_NGUOIDUNG_ID=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in users class, usersinfo.php

		$users->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$users->CurrentAction = $_POST["a_delete"];
		} else {
			$users->CurrentAction = "D"; // Delete record directly
		}
		switch ($users->CurrentAction) {
			case "D": // Delete
				$users->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($users->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $users;
		$DeleteRows = TRUE;
		$sWrkFilter = $users->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in users class, usersinfo.php

		$users->CurrentFilter = $sWrkFilter;
		$sSql = $users->SQL();
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
				$DeleteRows = $users->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($users->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($users->CancelMessage <> "") {
				$this->setMessage($users->CancelMessage);
				$users->CancelMessage = "";
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
				$users->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $users;

		// Call Recordset Selecting event
		$users->Recordset_Selecting($users->CurrentFilter);

		// Load List page SQL
		$sSql = $users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $users;
		$sFilter = $users->KeyFilter();

		// Call Row Selecting event
		$users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$users->CurrentFilter = $sFilter;
		$sSql = $users->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$users->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $users;
		$users->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$users->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$users->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$users->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$users->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$users->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$users->C_TEL->setDbValue($rs->fields('C_TEL'));
		$users->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$users->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$users->C_FAX->setDbValue($rs->fields('C_FAX'));
		$users->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$users->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $users;

		// Initialize URLs
		// Call Row_Rendering event

		$users->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$users->C_TENDANGNHAP->CellCssStyle = ""; $users->C_TENDANGNHAP->CellCssClass = "";
		$users->C_TENDANGNHAP->CellAttrs = array(); $users->C_TENDANGNHAP->ViewAttrs = array(); $users->C_TENDANGNHAP->EditAttrs = array();

		// FK_MACONGTY
		$users->FK_MACONGTY->CellCssStyle = ""; $users->FK_MACONGTY->CellCssClass = "";
		$users->FK_MACONGTY->CellAttrs = array(); $users->FK_MACONGTY->ViewAttrs = array(); $users->FK_MACONGTY->EditAttrs = array();

		// FK_USERLEVELID
		$users->FK_USERLEVELID->CellCssStyle = ""; $users->FK_USERLEVELID->CellCssClass = "";
		$users->FK_USERLEVELID->CellAttrs = array(); $users->FK_USERLEVELID->ViewAttrs = array(); $users->FK_USERLEVELID->EditAttrs = array();
		if ($users->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$users->PK_NGUOIDUNG_ID->ViewValue = $users->PK_NGUOIDUNG_ID->CurrentValue;
			$users->PK_NGUOIDUNG_ID->CssStyle = "";
			$users->PK_NGUOIDUNG_ID->CssClass = "";
			$users->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->ViewValue = $users->C_TENDANGNHAP->CurrentValue;
			$users->C_TENDANGNHAP->CssStyle = "";
			$users->C_TENDANGNHAP->CssClass = "";
			$users->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$users->C_MATKHAU->ViewValue = "********";
			$users->C_MATKHAU->CssStyle = "";
			$users->C_MATKHAU->CssClass = "";
			$users->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($users->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($users->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$users->FK_MACONGTY->ViewValue = $users->FK_MACONGTY->CurrentValue;
				}
			} else {
				$users->FK_MACONGTY->ViewValue = NULL;
			}
			$users->FK_MACONGTY->CssStyle = "";
			$users->FK_MACONGTY->CssClass = "";
			$users->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$users->C_HOTEN->ViewValue = $users->C_HOTEN->CurrentValue;
			$users->C_HOTEN->CssStyle = "";
			$users->C_HOTEN->CssClass = "";
			$users->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$users->C_DIACHI->ViewValue = $users->C_DIACHI->CurrentValue;
			$users->C_DIACHI->CssStyle = "";
			$users->C_DIACHI->CssClass = "";
			$users->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$users->C_TEL->ViewValue = $users->C_TEL->CurrentValue;
			$users->C_TEL->CssStyle = "";
			$users->C_TEL->CssClass = "";
			$users->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->ViewValue = $users->C_TEL_HOME->CurrentValue;
			$users->C_TEL_HOME->CssStyle = "";
			$users->C_TEL_HOME->CssClass = "";
			$users->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->ViewValue = $users->C_TEL_MOBILE->CurrentValue;
			$users->C_TEL_MOBILE->CssStyle = "";
			$users->C_TEL_MOBILE->CssClass = "";
			$users->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$users->C_FAX->ViewValue = $users->C_FAX->CurrentValue;
			$users->C_FAX->CssStyle = "";
			$users->C_FAX->CssClass = "";
			$users->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$users->C_EMAIL->ViewValue = $users->C_EMAIL->CurrentValue;
			$users->C_EMAIL->CssStyle = "";
			$users->C_EMAIL->CssClass = "";
			$users->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($users->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($users->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$users->FK_USERLEVELID->ViewValue = $users->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$users->FK_USERLEVELID->ViewValue = NULL;
			}
			$users->FK_USERLEVELID->CssStyle = "";
			$users->FK_USERLEVELID->CssClass = "";
			$users->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->HrefValue = "";
			$users->C_TENDANGNHAP->TooltipValue = "";

			// FK_MACONGTY
			$users->FK_MACONGTY->HrefValue = "";
			$users->FK_MACONGTY->TooltipValue = "";

			// FK_USERLEVELID
			$users->FK_USERLEVELID->HrefValue = "";
			$users->FK_USERLEVELID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($users->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$users->Row_Rendered();
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
