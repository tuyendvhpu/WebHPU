<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userlevels_delete = new cuserlevels_delete();
$Page =& $userlevels_delete;

// Page init
$userlevels_delete->Page_Init();

// Page main
$userlevels_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userlevels_delete = new ew_Page("userlevels_delete");

// page properties
userlevels_delete.PageID = "delete"; // page ID
userlevels_delete.FormID = "fuserlevelsdelete"; // form ID
var EW_PAGE_ID = userlevels_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevels_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevels_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevels_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevels_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $userlevels_delete->LoadRecordset())
	$userlevels_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($userlevels_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$userlevels_delete->Page_Terminate("userlevelslist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $userlevels->TableCaption() ?><br><br>
<a href="<?php echo $userlevels->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userlevels_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="userlevels">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($userlevels_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $userlevels->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $userlevels->userlevelid->FldCaption() ?></td>
		<td valign="top"><?php echo $userlevels->userlevelname->FldCaption() ?></td>
		<td valign="top"><?php echo $userlevels->userleveltype->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$userlevels_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$userlevels_delete->lRecCnt++;

	// Set row properties
	$userlevels->CssClass = "";
	$userlevels->CssStyle = "";
	$userlevels->RowAttrs = array();
	$userlevels->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$userlevels_delete->LoadRowValues($rs);

	// Render row
	$userlevels_delete->RenderRow();
?>
	<tr<?php echo $userlevels->RowAttributes() ?>>
		<td<?php echo $userlevels->userlevelid->CellAttributes() ?>>
<div<?php echo $userlevels->userlevelid->ViewAttributes() ?>><?php echo $userlevels->userlevelid->ListViewValue() ?></div></td>
		<td<?php echo $userlevels->userlevelname->CellAttributes() ?>>
<div<?php echo $userlevels->userlevelname->ViewAttributes() ?>><?php echo $userlevels->userlevelname->ListViewValue() ?></div></td>
		<td<?php echo $userlevels->userleveltype->CellAttributes() ?>>
<div<?php echo $userlevels->userleveltype->ViewAttributes() ?>><?php echo $userlevels->userleveltype->ListViewValue() ?></div></td>
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
$userlevels_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserlevels_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'userlevels';

	// Page object name
	var $PageObjName = 'userlevels_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevels;
		if ($userlevels->UseTokenInUrl) $PageUrl .= "t=" . $userlevels->TableVar . "&"; // Add page token
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
		global $objForm, $userlevels;
		if ($userlevels->UseTokenInUrl) {
			if ($objForm)
				return ($userlevels->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevels->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cuserlevels_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (userlevels)
		$GLOBALS["userlevels"] = new cuserlevels();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevels', TRUE);

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
		global $userlevels;

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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
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
		global $Language, $userlevels;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["userlevelid"] <> "") {
			$userlevels->userlevelid->setQueryStringValue($_GET["userlevelid"]);
			if (!is_numeric($userlevels->userlevelid->QueryStringValue))
				$this->Page_Terminate("userlevelslist.php"); // Prevent SQL injection, exit
			$sKey .= $userlevels->userlevelid->QueryStringValue;
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
			$this->Page_Terminate("userlevelslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userlevelslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`userlevelid`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in userlevels class, userlevelsinfo.php

		$userlevels->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$userlevels->CurrentAction = $_POST["a_delete"];
		} else {
			$userlevels->CurrentAction = "D"; // Delete record directly
		}
		switch ($userlevels->CurrentAction) {
			case "D": // Delete
				$userlevels->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($userlevels->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $userlevels;
		$DeleteRows = TRUE;
		$sWrkFilter = $userlevels->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in userlevels class, userlevelsinfo.php

		$userlevels->CurrentFilter = $sWrkFilter;
		$sSql = $userlevels->SQL();
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
				$DeleteRows = $userlevels->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['userlevelid'];
				$x_UserLevelID = $row['userlevelid']; // Get User Level id
                                if ($x_UserLevelID == 1 || $x_UserLevelID == 2 || $x_UserLevelID == 3 || $x_UserLevelID == 4 || $x_UserLevelID == 5 || $x_UserLevelID == 6 || $x_UserLevelID == 7) { // Kiểm tra ID
                                       $this->setMessage("Không thể xóa các nhóm mặc định"); // Set up success message
                                       $this->Page_Terminate("userlevelslist.php"); // Return to caller
				}elseif ($this->CheckLevel($x_UserLevelID)) { // Kiểm tra liên quan sản phẩm
                                        $this->setMessage("Không thể xóa nhóm có người dùng tham chiếu"); // Set up success message
					$this->Page_Terminate("userlevelslist.php"); // Return to caller
                                }else{
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($userlevels->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
				if (!is_null($x_UserLevelID)) {
					$conn->Execute("DELETE FROM " . EW_USER_LEVEL_PRIV_TABLE . " WHERE " . EW_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $x_UserLevelID); // Delete user rights as well
				}
                                }
			}
		} else {

			// Set up error message
			if ($userlevels->CancelMessage <> "") {
				$this->setMessage($userlevels->CancelMessage);
				$userlevels->CancelMessage = "";
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
				$userlevels->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}
        // Kiểm tra người dùng có chứa thông tin sản phẩm và chào hàng
        function CheckLevel($x_UserLevelID) {
		global $conn, $Security, $userlevels;
                $sSql ="Select t_nguoidung.pk_nguoidung_id from t_nguoidung where t_nguoidung.fk_UserLevelID=" .$x_UserLevelID;
		$conn->raiseErrorFn = 'ew_ErrorFn';
                $rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			//$this->setMessage(Lang_Text("Không có dữ liệu")); // No record found
			$rs->Close();
			return FALSE;
		}
                return TRUE;
        }
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevels;

		// Call Recordset Selecting event
		$userlevels->Recordset_Selecting($userlevels->CurrentFilter);

		// Load List page SQL
		$sSql = $userlevels->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$userlevels->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevels;
		$sFilter = $userlevels->KeyFilter();

		// Call Row Selecting event
		$userlevels->Row_Selecting($sFilter);

		// Load SQL based on filter
		$userlevels->CurrentFilter = $sFilter;
		$sSql = $userlevels->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$userlevels->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $userlevels;
		$userlevels->userlevelid->setDbValue($rs->fields('userlevelid'));
		if (is_null($userlevels->userlevelid->CurrentValue)) {
			$userlevels->userlevelid->CurrentValue = 0;
		} else {
			$userlevels->userlevelid->CurrentValue = intval($userlevels->userlevelid->CurrentValue);
		}
		$userlevels->userlevelname->setDbValue($rs->fields('userlevelname'));
		$userlevels->userleveltype->setDbValue($rs->fields('userleveltype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $userlevels;

		// Initialize URLs
		// Call Row_Rendering event

		$userlevels->Row_Rendering();

		// Common render codes for all row types
		// userlevelid

		$userlevels->userlevelid->CellCssStyle = ""; $userlevels->userlevelid->CellCssClass = "";
		$userlevels->userlevelid->CellAttrs = array(); $userlevels->userlevelid->ViewAttrs = array(); $userlevels->userlevelid->EditAttrs = array();

		// userlevelname
		$userlevels->userlevelname->CellCssStyle = ""; $userlevels->userlevelname->CellCssClass = "";
		$userlevels->userlevelname->CellAttrs = array(); $userlevels->userlevelname->ViewAttrs = array(); $userlevels->userlevelname->EditAttrs = array();

		// userleveltype
		$userlevels->userleveltype->CellCssStyle = ""; $userlevels->userleveltype->CellCssClass = "";
		$userlevels->userleveltype->CellAttrs = array(); $userlevels->userleveltype->ViewAttrs = array(); $userlevels->userleveltype->EditAttrs = array();
		if ($userlevels->RowType == EW_ROWTYPE_VIEW) { // View row

			// userlevelid
			$userlevels->userlevelid->ViewValue = $userlevels->userlevelid->CurrentValue;
			$userlevels->userlevelid->CssStyle = "";
			$userlevels->userlevelid->CssClass = "";
			$userlevels->userlevelid->ViewCustomAttributes = "";

			// userlevelname
			$userlevels->userlevelname->ViewValue = $userlevels->userlevelname->CurrentValue;
			$userlevels->userlevelname->CssStyle = "";
			$userlevels->userlevelname->CssClass = "";
			$userlevels->userlevelname->ViewCustomAttributes = "";

			// userleveltype
			if (strval($userlevels->userleveltype->CurrentValue) <> "") {
				switch ($userlevels->userleveltype->CurrentValue) {
					case "1":
						$userlevels->userleveltype->ViewValue = "Nhóm quản trị";
						break;
					case "2":
						$userlevels->userleveltype->ViewValue = "Nhóm người dùng";
						break;
					default:
						$userlevels->userleveltype->ViewValue = $userlevels->userleveltype->CurrentValue;
				}
			} else {
				$userlevels->userleveltype->ViewValue = NULL;
			}
			$userlevels->userleveltype->CssStyle = "";
			$userlevels->userleveltype->CssClass = "";
			$userlevels->userleveltype->ViewCustomAttributes = "";

			// userlevelid
			$userlevels->userlevelid->HrefValue = "";
			$userlevels->userlevelid->TooltipValue = "";

			// userlevelname
			$userlevels->userlevelname->HrefValue = "";
			$userlevels->userlevelname->TooltipValue = "";

			// userleveltype
			$userlevels->userleveltype->HrefValue = "";
			$userlevels->userleveltype->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($userlevels->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$userlevels->Row_Rendered();
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
