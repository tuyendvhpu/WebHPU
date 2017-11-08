<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_delete = new cadvertising_delete();
$Page =& $advertising_delete;

// Page init
$advertising_delete->Page_Init();

// Page main
$advertising_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_delete = new ew_Page("advertising_delete");

// page properties
advertising_delete.PageID = "delete"; // page ID
advertising_delete.FormID = "fadvertisingdelete"; // form ID
var EW_PAGE_ID = advertising_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
advertising_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $advertising_delete->LoadRecordset())
	$advertising_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($advertising_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$advertising_delete->Page_Terminate("advertisinglist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $advertising->TableCaption() ?><br><br>
<a href="<?php echo $advertising->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$advertising_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="advertising">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($advertising_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $advertising->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $advertising->advertising_id->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_desc->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_type->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_pos->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_link->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_url->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_order->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->create_time->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->edit_time->FldCaption() ?></td>
		<td valign="top"><?php echo $advertising->advertising_state->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$advertising_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$advertising_delete->lRecCnt++;

	// Set row properties
	$advertising->CssClass = "";
	$advertising->CssStyle = "";
	$advertising->RowAttrs = array();
	$advertising->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$advertising_delete->LoadRowValues($rs);

	// Render row
	$advertising_delete->RenderRow();
?>
	<tr<?php echo $advertising->RowAttributes() ?>>
		<td<?php echo $advertising->advertising_id->CellAttributes() ?>>
<div<?php echo $advertising->advertising_id->ViewAttributes() ?>><?php echo $advertising->advertising_id->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_desc->CellAttributes() ?>>
<div<?php echo $advertising->advertising_desc->ViewAttributes() ?>><?php echo $advertising->advertising_desc->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_type->CellAttributes() ?>>
<div<?php echo $advertising->advertising_type->ViewAttributes() ?>><?php echo $advertising->advertising_type->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_pos->CellAttributes() ?>>
<div<?php echo $advertising->advertising_pos->ViewAttributes() ?>><?php echo $advertising->advertising_pos->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_link->CellAttributes() ?>>
<div<?php echo $advertising->advertising_link->ViewAttributes() ?>><?php echo $advertising->advertising_link->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_url->CellAttributes() ?>>
<?php if ($advertising->advertising_url->HrefValue <> "" || $advertising->advertising_url->TooltipValue <> "") { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<a href="<?php echo $advertising->advertising_url->HrefValue ?>"><?php echo $advertising->advertising_url->ListViewValue() ?></a>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($advertising->advertising_url->Upload->DbValue)) { ?>
<?php echo $advertising->advertising_url->ListViewValue() ?>
<?php } elseif (!in_array($advertising->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
		<td<?php echo $advertising->advertising_order->CellAttributes() ?>>
<div<?php echo $advertising->advertising_order->ViewAttributes() ?>><?php echo $advertising->advertising_order->ListViewValue() ?></div></td>
		<td<?php echo $advertising->create_time->CellAttributes() ?>>
<div<?php echo $advertising->create_time->ViewAttributes() ?>><?php echo $advertising->create_time->ListViewValue() ?></div></td>
		<td<?php echo $advertising->edit_time->CellAttributes() ?>>
<div<?php echo $advertising->edit_time->ViewAttributes() ?>><?php echo $advertising->edit_time->ListViewValue() ?></div></td>
		<td<?php echo $advertising->advertising_state->CellAttributes() ?>>
<div<?php echo $advertising->advertising_state->ViewAttributes() ?>><?php echo $advertising->advertising_state->ListViewValue() ?></div></td>
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
$advertising_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cadvertising_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'advertising';

	// Page object name
	var $PageObjName = 'advertising_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // Add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cadvertising_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (advertising)
		$GLOBALS["advertising"] = new cadvertising();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

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
		global $advertising;

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
			$this->Page_Terminate("advertisinglist.php");
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
		global $Language, $advertising;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["advertising_id"] <> "") {
			$advertising->advertising_id->setQueryStringValue($_GET["advertising_id"]);
			if (!is_numeric($advertising->advertising_id->QueryStringValue))
				$this->Page_Terminate("advertisinglist.php"); // Prevent SQL injection, exit
			$sKey .= $advertising->advertising_id->QueryStringValue;
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
			$this->Page_Terminate("advertisinglist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("advertisinglist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`advertising_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in advertising class, advertisinginfo.php

		$advertising->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$advertising->CurrentAction = $_POST["a_delete"];
		} else {
			$advertising->CurrentAction = "D"; // Delete record directly
		}
		switch ($advertising->CurrentAction) {
			case "D": // Delete
				$advertising->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($advertising->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $advertising;
		$DeleteRows = TRUE;
		$sWrkFilter = $advertising->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in advertising class, advertisinginfo.php

		$advertising->CurrentFilter = $sWrkFilter;
		$sSql = $advertising->SQL();
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
				$DeleteRows = $advertising->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['advertising_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($advertising->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($advertising->CancelMessage <> "") {
				$this->setMessage($advertising->CancelMessage);
				$advertising->CancelMessage = "";
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
				$advertising->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising;

		// Call Recordset Selecting event
		$advertising->Recordset_Selecting($advertising->CurrentFilter);

		// Load List page SQL
		$sSql = $advertising->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$advertising->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load SQL based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$advertising->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $advertising;
		$advertising->advertising_id->setDbValue($rs->fields('advertising_id'));
		$advertising->advertising_desc->setDbValue($rs->fields('advertising_desc'));
		$advertising->advertising_type->setDbValue($rs->fields('advertising_type'));
		$advertising->advertising_pos->setDbValue($rs->fields('advertising_pos'));
		$advertising->advertising_link->setDbValue($rs->fields('advertising_link'));
		$advertising->advertising_url->Upload->DbValue = $rs->fields('advertising_url');
		$advertising->advertising_order->setDbValue($rs->fields('advertising_order'));
		$advertising->create_time->setDbValue($rs->fields('create_time'));
		$advertising->edit_time->setDbValue($rs->fields('edit_time'));
		$advertising->advertising_state->setDbValue($rs->fields('advertising_state'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $advertising;

		// Initialize URLs
		// Call Row_Rendering event

		$advertising->Row_Rendering();

		// Common render codes for all row types
		// advertising_id

		$advertising->advertising_id->CellCssStyle = ""; $advertising->advertising_id->CellCssClass = "";
		$advertising->advertising_id->CellAttrs = array(); $advertising->advertising_id->ViewAttrs = array(); $advertising->advertising_id->EditAttrs = array();

		// advertising_desc
		$advertising->advertising_desc->CellCssStyle = ""; $advertising->advertising_desc->CellCssClass = "";
		$advertising->advertising_desc->CellAttrs = array(); $advertising->advertising_desc->ViewAttrs = array(); $advertising->advertising_desc->EditAttrs = array();

		// advertising_type
		$advertising->advertising_type->CellCssStyle = ""; $advertising->advertising_type->CellCssClass = "";
		$advertising->advertising_type->CellAttrs = array(); $advertising->advertising_type->ViewAttrs = array(); $advertising->advertising_type->EditAttrs = array();

		// advertising_pos
		$advertising->advertising_pos->CellCssStyle = ""; $advertising->advertising_pos->CellCssClass = "";
		$advertising->advertising_pos->CellAttrs = array(); $advertising->advertising_pos->ViewAttrs = array(); $advertising->advertising_pos->EditAttrs = array();

		// advertising_link
		$advertising->advertising_link->CellCssStyle = ""; $advertising->advertising_link->CellCssClass = "";
		$advertising->advertising_link->CellAttrs = array(); $advertising->advertising_link->ViewAttrs = array(); $advertising->advertising_link->EditAttrs = array();

		// advertising_url
		$advertising->advertising_url->CellCssStyle = ""; $advertising->advertising_url->CellCssClass = "";
		$advertising->advertising_url->CellAttrs = array(); $advertising->advertising_url->ViewAttrs = array(); $advertising->advertising_url->EditAttrs = array();

		// advertising_order
		$advertising->advertising_order->CellCssStyle = ""; $advertising->advertising_order->CellCssClass = "";
		$advertising->advertising_order->CellAttrs = array(); $advertising->advertising_order->ViewAttrs = array(); $advertising->advertising_order->EditAttrs = array();

		// create_time
		$advertising->create_time->CellCssStyle = ""; $advertising->create_time->CellCssClass = "";
		$advertising->create_time->CellAttrs = array(); $advertising->create_time->ViewAttrs = array(); $advertising->create_time->EditAttrs = array();

		// edit_time
		$advertising->edit_time->CellCssStyle = ""; $advertising->edit_time->CellCssClass = "";
		$advertising->edit_time->CellAttrs = array(); $advertising->edit_time->ViewAttrs = array(); $advertising->edit_time->EditAttrs = array();

		// advertising_state
		$advertising->advertising_state->CellCssStyle = ""; $advertising->advertising_state->CellCssClass = "";
		$advertising->advertising_state->CellAttrs = array(); $advertising->advertising_state->ViewAttrs = array(); $advertising->advertising_state->EditAttrs = array();
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// advertising_id
			$advertising->advertising_id->ViewValue = $advertising->advertising_id->CurrentValue;
			$advertising->advertising_id->CssStyle = "";
			$advertising->advertising_id->CssClass = "";
			$advertising->advertising_id->ViewCustomAttributes = "";

			// advertising_desc
			$advertising->advertising_desc->ViewValue = $advertising->advertising_desc->CurrentValue;
			$advertising->advertising_desc->CssStyle = "";
			$advertising->advertising_desc->CssClass = "";
			$advertising->advertising_desc->ViewCustomAttributes = "";

			// advertising_type
			if (strval($advertising->advertising_type->CurrentValue) <> "") {
				switch ($advertising->advertising_type->CurrentValue) {
					case "1":
						$advertising->advertising_type->ViewValue = "Anh";
						break;
					case "2":
						$advertising->advertising_type->ViewValue = "flash";
						break;
					case "3":
						$advertising->advertising_type->ViewValue = "Video";
						break;
					default:
						$advertising->advertising_type->ViewValue = $advertising->advertising_type->CurrentValue;
				}
			} else {
				$advertising->advertising_type->ViewValue = NULL;
			}
			$advertising->advertising_type->CssStyle = "";
			$advertising->advertising_type->CssClass = "";
			$advertising->advertising_type->ViewCustomAttributes = "";

			// advertising_pos
			if (strval($advertising->advertising_pos->CurrentValue) <> "") {
				switch ($advertising->advertising_pos->CurrentValue) {
					case "1":
						$advertising->advertising_pos->ViewValue = "Sinh vien tuong lai";
						break;
					case "2":
						$advertising->advertising_pos->ViewValue = "Cuu sinh vien";
						break;
					default:
						$advertising->advertising_pos->ViewValue = $advertising->advertising_pos->CurrentValue;
				}
			} else {
				$advertising->advertising_pos->ViewValue = NULL;
			}
			$advertising->advertising_pos->CssStyle = "";
			$advertising->advertising_pos->CssClass = "";
			$advertising->advertising_pos->ViewCustomAttributes = "";

			// advertising_link
			$advertising->advertising_link->ViewValue = $advertising->advertising_link->CurrentValue;
			$advertising->advertising_link->CssStyle = "";
			$advertising->advertising_link->CssClass = "";
			$advertising->advertising_link->ViewCustomAttributes = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->ViewValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->ViewValue = "";
			}
			$advertising->advertising_url->CssStyle = "";
			$advertising->advertising_url->CssClass = "";
			$advertising->advertising_url->ViewCustomAttributes = "";

			// advertising_order
			$advertising->advertising_order->ViewValue = $advertising->advertising_order->CurrentValue;
			$advertising->advertising_order->CssStyle = "";
			$advertising->advertising_order->CssClass = "";
			$advertising->advertising_order->ViewCustomAttributes = "";

			// create_time
			$advertising->create_time->ViewValue = $advertising->create_time->CurrentValue;
			$advertising->create_time->ViewValue = ew_FormatDateTime($advertising->create_time->ViewValue, 7);
			$advertising->create_time->CssStyle = "";
			$advertising->create_time->CssClass = "";
			$advertising->create_time->ViewCustomAttributes = "";

			// edit_time
			$advertising->edit_time->ViewValue = $advertising->edit_time->CurrentValue;
			$advertising->edit_time->ViewValue = ew_FormatDateTime($advertising->edit_time->ViewValue, 7);
			$advertising->edit_time->CssStyle = "";
			$advertising->edit_time->CssClass = "";
			$advertising->edit_time->ViewCustomAttributes = "";

			// advertising_state
			if (strval($advertising->advertising_state->CurrentValue) <> "") {
				switch ($advertising->advertising_state->CurrentValue) {
					case "0":
						$advertising->advertising_state->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$advertising->advertising_state->ViewValue = "Kich hoat";
						break;
					default:
						$advertising->advertising_state->ViewValue = $advertising->advertising_state->CurrentValue;
				}
			} else {
				$advertising->advertising_state->ViewValue = NULL;
			}
			$advertising->advertising_state->CssStyle = "";
			$advertising->advertising_state->CssClass = "";
			$advertising->advertising_state->ViewCustomAttributes = "";

			// advertising_id
			$advertising->advertising_id->HrefValue = "";
			$advertising->advertising_id->TooltipValue = "";

			// advertising_desc
			$advertising->advertising_desc->HrefValue = "";
			$advertising->advertising_desc->TooltipValue = "";

			// advertising_type
			$advertising->advertising_type->HrefValue = "";
			$advertising->advertising_type->TooltipValue = "";

			// advertising_pos
			$advertising->advertising_pos->HrefValue = "";
			$advertising->advertising_pos->TooltipValue = "";

			// advertising_link
			$advertising->advertising_link->HrefValue = "";
			$advertising->advertising_link->TooltipValue = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->HrefValue = ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . ((!empty($advertising->advertising_url->ViewValue)) ? $advertising->advertising_url->ViewValue : $advertising->advertising_url->CurrentValue);
				if ($advertising->Export <> "") $advertising->advertising_url->HrefValue = ew_ConvertFullUrl($advertising->advertising_url->HrefValue);
			} else {
				$advertising->advertising_url->HrefValue = "";
			}
			$advertising->advertising_url->TooltipValue = "";

			// advertising_order
			$advertising->advertising_order->HrefValue = "";
			$advertising->advertising_order->TooltipValue = "";

			// create_time
			$advertising->create_time->HrefValue = "";
			$advertising->create_time->TooltipValue = "";

			// edit_time
			$advertising->edit_time->HrefValue = "";
			$advertising->edit_time->TooltipValue = "";

			// advertising_state
			$advertising->advertising_state->HrefValue = "";
			$advertising->advertising_state->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($advertising->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$advertising->Row_Rendered();
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
