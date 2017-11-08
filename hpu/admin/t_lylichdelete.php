<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lylichinfo.php" ?>
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
$t_lylich_delete = new ct_lylich_delete();
$Page =& $t_lylich_delete;

// Page init
$t_lylich_delete->Page_Init();

// Page main
$t_lylich_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lylich_delete = new ew_Page("t_lylich_delete");

// page properties
t_lylich_delete.PageID = "delete"; // page ID
t_lylich_delete.FormID = "ft_lylichdelete"; // form ID
var EW_PAGE_ID = t_lylich_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_lylich_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lylich_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lylich_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lylich_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_lylich_delete->LoadRecordset())
	$t_lylich_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_lylich_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_lylich_delete->Page_Terminate("t_lylichlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lylich->TableCaption() ?><br><br>
<a href="<?php echo $t_lylich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lylich_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_lylich">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_lylich_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_lylich->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_lylich->FK_CONGTY_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_PIC->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_FULLNAME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_POSITION->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_WORK_ADDRESS->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_EMAIL->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_PHONE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_BIRTHDAY->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_TEMPLATE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_STATUS->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_ORDER_LEVEL->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_TIME_ACTIVE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_lylich->C_TIME_ACTIVEM->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_lylich_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_lylich_delete->lRecCnt++;

	// Set row properties
	$t_lylich->CssClass = "";
	$t_lylich->CssStyle = "";
	$t_lylich->RowAttrs = array();
	$t_lylich->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_lylich_delete->LoadRowValues($rs);

	// Render row
	$t_lylich_delete->RenderRow();
?>
	<tr<?php echo $t_lylich->RowAttributes() ?>>
		<td<?php echo $t_lylich->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_lylich->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_lylich->FK_CONGTY_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_PIC->CellAttributes() ?>>
<?php if ($t_lylich->C_PIC->HrefValue <> "" || $t_lylich->C_PIC->TooltipValue <> "") { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<a href="<?php echo $t_lylich->C_PIC->HrefValue ?>"><?php echo $t_lylich->C_PIC->ListViewValue() ?></a>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<?php echo $t_lylich->C_PIC->ListViewValue() ?>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
		<td<?php echo $t_lylich->C_FULLNAME->CellAttributes() ?>>
<div<?php echo $t_lylich->C_FULLNAME->ViewAttributes() ?>><?php echo $t_lylich->C_FULLNAME->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_POSITION->CellAttributes() ?>>
<div<?php echo $t_lylich->C_POSITION->ViewAttributes() ?>><?php echo $t_lylich->C_POSITION->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_WORK_ADDRESS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_WORK_ADDRESS->ViewAttributes() ?>><?php echo $t_lylich->C_WORK_ADDRESS->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_EMAIL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_EMAIL->ViewAttributes() ?>><?php echo $t_lylich->C_EMAIL->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_PHONE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_PHONE->ViewAttributes() ?>><?php echo $t_lylich->C_PHONE->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_BIRTHDAY->CellAttributes() ?>>
<div<?php echo $t_lylich->C_BIRTHDAY->ViewAttributes() ?>><?php echo $t_lylich->C_BIRTHDAY->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_TEMPLATE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TEMPLATE->ViewAttributes() ?>><?php echo $t_lylich->C_TEMPLATE->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_STATUS->CellAttributes() ?>>
<div<?php echo $t_lylich->C_STATUS->ViewAttributes() ?>><?php echo $t_lylich->C_STATUS->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ORDER_LEVEL->ViewAttributes() ?>><?php echo $t_lylich->C_ORDER_LEVEL->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_TIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVE->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_lylich->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_lylich->C_ACTIVE_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_lylich->C_TIME_ACTIVEM->CellAttributes() ?>>
<div<?php echo $t_lylich->C_TIME_ACTIVEM->ViewAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVEM->ListViewValue() ?></div></td>
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
$t_lylich_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lylich_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_lylich';

	// Page object name
	var $PageObjName = 't_lylich_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lylich;
		if ($t_lylich->UseTokenInUrl) $PageUrl .= "t=" . $t_lylich->TableVar . "&"; // Add page token
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
		global $objForm, $t_lylich;
		if ($t_lylich->UseTokenInUrl) {
			if ($objForm)
				return ($t_lylich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lylich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lylich_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lylich)
		$GLOBALS["t_lylich"] = new ct_lylich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lylich', TRUE);

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
		global $t_lylich;

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
			$this->Page_Terminate("t_lylichlist.php");
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
		global $Language, $t_lylich;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_PROFILE_ID"] <> "") {
			$t_lylich->PK_PROFILE_ID->setQueryStringValue($_GET["PK_PROFILE_ID"]);
			if (!is_numeric($t_lylich->PK_PROFILE_ID->QueryStringValue))
				$this->Page_Terminate("t_lylichlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_lylich->PK_PROFILE_ID->QueryStringValue;
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
			$this->Page_Terminate("t_lylichlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_lylichlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_PROFILE_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_lylich class, t_lylichinfo.php

		$t_lylich->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_lylich->CurrentAction = $_POST["a_delete"];
		} else {
			$t_lylich->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_lylich->CurrentAction) {
			case "D": // Delete
				$t_lylich->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_lylich->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_lylich;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_lylich->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_lylich class, t_lylichinfo.php

		$t_lylich->CurrentFilter = $sWrkFilter;
		$sSql = $t_lylich->SQL();
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
				$DeleteRows = $t_lylich->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_PROFILE_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_lylich->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_lylich->CancelMessage <> "") {
				$this->setMessage($t_lylich->CancelMessage);
				$t_lylich->CancelMessage = "";
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
				$t_lylich->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lylich;

		// Call Recordset Selecting event
		$t_lylich->Recordset_Selecting($t_lylich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lylich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lylich->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lylich;
		$sFilter = $t_lylich->KeyFilter();

		// Call Row Selecting event
		$t_lylich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lylich->CurrentFilter = $sFilter;
		$sSql = $t_lylich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lylich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lylich;
		$t_lylich->PK_PROFILE_ID->setDbValue($rs->fields('PK_PROFILE_ID'));
		$t_lylich->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_lylich->C_PIC->Upload->DbValue = $rs->fields('C_PIC');
		$t_lylich->C_FULLNAME->setDbValue($rs->fields('C_FULLNAME'));
		$t_lylich->C_POSITION->setDbValue($rs->fields('C_POSITION'));
		$t_lylich->C_WORK_ADDRESS->setDbValue($rs->fields('C_WORK_ADDRESS'));
		$t_lylich->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_lylich->C_PHONE->setDbValue($rs->fields('C_PHONE'));
		$t_lylich->C_BIRTHDAY->setDbValue($rs->fields('C_BIRTHDAY'));
		$t_lylich->C_BLOG->setDbValue($rs->fields('C_BLOG'));
		$t_lylich->C_PERSONAL_PROFILE->setDbValue($rs->fields('C_PERSONAL_PROFILE'));
		$t_lylich->C_EDUCATIION->setDbValue($rs->fields('C_EDUCATIION'));
		$t_lylich->C_SKILLS->setDbValue($rs->fields('C_SKILLS'));
		$t_lylich->C_WORK_EXPERIENCE->setDbValue($rs->fields('C_WORK_EXPERIENCE'));
		$t_lylich->C_SCIENTIFIC_RESEARCH->setDbValue($rs->fields('C_SCIENTIFIC_RESEARCH'));
		$t_lylich->C_REFERENCES->setDbValue($rs->fields('C_REFERENCES'));
		$t_lylich->C_HOBBIES->setDbValue($rs->fields('C_HOBBIES'));
		$t_lylich->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
		$t_lylich->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_lylich->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_lylich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lylich->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lylich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lylich->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_lylich->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
		$t_lylich->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lylich->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_lylich->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_lylich->C_TIME_ACTIVEM->setDbValue($rs->fields('C_TIME_ACTIVEM'));
		$t_lylich->C_ORDER_MAIN->setDbValue($rs->fields('C_ORDER_MAIN'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lylich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lylich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_lylich->FK_CONGTY_ID->CellCssStyle = ""; $t_lylich->FK_CONGTY_ID->CellCssClass = "";
		$t_lylich->FK_CONGTY_ID->CellAttrs = array(); $t_lylich->FK_CONGTY_ID->ViewAttrs = array(); $t_lylich->FK_CONGTY_ID->EditAttrs = array();

		// C_PIC
		$t_lylich->C_PIC->CellCssStyle = ""; $t_lylich->C_PIC->CellCssClass = "";
		$t_lylich->C_PIC->CellAttrs = array(); $t_lylich->C_PIC->ViewAttrs = array(); $t_lylich->C_PIC->EditAttrs = array();

		// C_FULLNAME
		$t_lylich->C_FULLNAME->CellCssStyle = ""; $t_lylich->C_FULLNAME->CellCssClass = "";
		$t_lylich->C_FULLNAME->CellAttrs = array(); $t_lylich->C_FULLNAME->ViewAttrs = array(); $t_lylich->C_FULLNAME->EditAttrs = array();

		// C_POSITION
		$t_lylich->C_POSITION->CellCssStyle = ""; $t_lylich->C_POSITION->CellCssClass = "";
		$t_lylich->C_POSITION->CellAttrs = array(); $t_lylich->C_POSITION->ViewAttrs = array(); $t_lylich->C_POSITION->EditAttrs = array();

		// C_WORK_ADDRESS
		$t_lylich->C_WORK_ADDRESS->CellCssStyle = ""; $t_lylich->C_WORK_ADDRESS->CellCssClass = "";
		$t_lylich->C_WORK_ADDRESS->CellAttrs = array(); $t_lylich->C_WORK_ADDRESS->ViewAttrs = array(); $t_lylich->C_WORK_ADDRESS->EditAttrs = array();

		// C_EMAIL
		$t_lylich->C_EMAIL->CellCssStyle = ""; $t_lylich->C_EMAIL->CellCssClass = "";
		$t_lylich->C_EMAIL->CellAttrs = array(); $t_lylich->C_EMAIL->ViewAttrs = array(); $t_lylich->C_EMAIL->EditAttrs = array();

		// C_PHONE
		$t_lylich->C_PHONE->CellCssStyle = ""; $t_lylich->C_PHONE->CellCssClass = "";
		$t_lylich->C_PHONE->CellAttrs = array(); $t_lylich->C_PHONE->ViewAttrs = array(); $t_lylich->C_PHONE->EditAttrs = array();

		// C_BIRTHDAY
		$t_lylich->C_BIRTHDAY->CellCssStyle = ""; $t_lylich->C_BIRTHDAY->CellCssClass = "";
		$t_lylich->C_BIRTHDAY->CellAttrs = array(); $t_lylich->C_BIRTHDAY->ViewAttrs = array(); $t_lylich->C_BIRTHDAY->EditAttrs = array();

		// C_TEMPLATE
		$t_lylich->C_TEMPLATE->CellCssStyle = ""; $t_lylich->C_TEMPLATE->CellCssClass = "";
		$t_lylich->C_TEMPLATE->CellAttrs = array(); $t_lylich->C_TEMPLATE->ViewAttrs = array(); $t_lylich->C_TEMPLATE->EditAttrs = array();

		// C_STATUS
		$t_lylich->C_STATUS->CellCssStyle = ""; $t_lylich->C_STATUS->CellCssClass = "";
		$t_lylich->C_STATUS->CellAttrs = array(); $t_lylich->C_STATUS->ViewAttrs = array(); $t_lylich->C_STATUS->EditAttrs = array();

		// C_ORDER_LEVEL
		$t_lylich->C_ORDER_LEVEL->CellCssStyle = ""; $t_lylich->C_ORDER_LEVEL->CellCssClass = "";
		$t_lylich->C_ORDER_LEVEL->CellAttrs = array(); $t_lylich->C_ORDER_LEVEL->ViewAttrs = array(); $t_lylich->C_ORDER_LEVEL->EditAttrs = array();

		// C_ACTIVE
		$t_lylich->C_ACTIVE->CellCssStyle = ""; $t_lylich->C_ACTIVE->CellCssClass = "";
		$t_lylich->C_ACTIVE->CellAttrs = array(); $t_lylich->C_ACTIVE->ViewAttrs = array(); $t_lylich->C_ACTIVE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_lylich->C_TIME_ACTIVE->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVE->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVE->CellAttrs = array(); $t_lylich->C_TIME_ACTIVE->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_lylich->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_lylich->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_lylich->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVEM
		$t_lylich->C_TIME_ACTIVEM->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVEM->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVEM->CellAttrs = array(); $t_lylich->C_TIME_ACTIVEM->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVEM->EditAttrs = array();
		if ($t_lylich->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_PROFILE_ID
			$t_lylich->PK_PROFILE_ID->ViewValue = $t_lylich->PK_PROFILE_ID->CurrentValue;
			$t_lylich->PK_PROFILE_ID->CssStyle = "";
			$t_lylich->PK_PROFILE_ID->CssClass = "";
			$t_lylich->PK_PROFILE_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_lylich->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lylich->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lylich->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lylich->FK_CONGTY_ID->ViewValue = $t_lylich->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_lylich->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_lylich->FK_CONGTY_ID->CssStyle = "";
			$t_lylich->FK_CONGTY_ID->CssClass = "";
			$t_lylich->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->ViewValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->ViewValue = "";
			}
			$t_lylich->C_PIC->CssStyle = "";
			$t_lylich->C_PIC->CssClass = "";
			$t_lylich->C_PIC->ViewCustomAttributes = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->ViewValue = $t_lylich->C_FULLNAME->CurrentValue;
			$t_lylich->C_FULLNAME->CssStyle = "";
			$t_lylich->C_FULLNAME->CssClass = "";
			$t_lylich->C_FULLNAME->ViewCustomAttributes = "";

			// C_POSITION
			$t_lylich->C_POSITION->ViewValue = $t_lylich->C_POSITION->CurrentValue;
			$t_lylich->C_POSITION->CssStyle = "";
			$t_lylich->C_POSITION->CssClass = "";
			$t_lylich->C_POSITION->ViewCustomAttributes = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->ViewValue = $t_lylich->C_WORK_ADDRESS->CurrentValue;
			$t_lylich->C_WORK_ADDRESS->CssStyle = "";
			$t_lylich->C_WORK_ADDRESS->CssClass = "";
			$t_lylich->C_WORK_ADDRESS->ViewCustomAttributes = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->ViewValue = $t_lylich->C_EMAIL->CurrentValue;
			$t_lylich->C_EMAIL->CssStyle = "";
			$t_lylich->C_EMAIL->CssClass = "";
			$t_lylich->C_EMAIL->ViewCustomAttributes = "";

			// C_PHONE
			$t_lylich->C_PHONE->ViewValue = $t_lylich->C_PHONE->CurrentValue;
			$t_lylich->C_PHONE->CssStyle = "";
			$t_lylich->C_PHONE->CssClass = "";
			$t_lylich->C_PHONE->ViewCustomAttributes = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->ViewValue = $t_lylich->C_BIRTHDAY->CurrentValue;
			$t_lylich->C_BIRTHDAY->CssStyle = "";
			$t_lylich->C_BIRTHDAY->CssClass = "";
			$t_lylich->C_BIRTHDAY->ViewCustomAttributes = "";

			// C_BLOG
			$t_lylich->C_BLOG->ViewValue = $t_lylich->C_BLOG->CurrentValue;
			$t_lylich->C_BLOG->CssStyle = "";
			$t_lylich->C_BLOG->CssClass = "";
			$t_lylich->C_BLOG->ViewCustomAttributes = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->ViewValue = $t_lylich->C_PERSONAL_PROFILE->CurrentValue;
			$t_lylich->C_PERSONAL_PROFILE->CssStyle = "";
			$t_lylich->C_PERSONAL_PROFILE->CssClass = "";
			$t_lylich->C_PERSONAL_PROFILE->ViewCustomAttributes = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->ViewValue = $t_lylich->C_EDUCATIION->CurrentValue;
			$t_lylich->C_EDUCATIION->CssStyle = "";
			$t_lylich->C_EDUCATIION->CssClass = "";
			$t_lylich->C_EDUCATIION->ViewCustomAttributes = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->ViewValue = $t_lylich->C_SKILLS->CurrentValue;
			$t_lylich->C_SKILLS->CssStyle = "";
			$t_lylich->C_SKILLS->CssClass = "";
			$t_lylich->C_SKILLS->ViewCustomAttributes = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->ViewValue = $t_lylich->C_WORK_EXPERIENCE->CurrentValue;
			$t_lylich->C_WORK_EXPERIENCE->CssStyle = "";
			$t_lylich->C_WORK_EXPERIENCE->CssClass = "";
			$t_lylich->C_WORK_EXPERIENCE->ViewCustomAttributes = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewValue = $t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue;
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssStyle = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssClass = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewCustomAttributes = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->ViewValue = $t_lylich->C_REFERENCES->CurrentValue;
			$t_lylich->C_REFERENCES->CssStyle = "";
			$t_lylich->C_REFERENCES->CssClass = "";
			$t_lylich->C_REFERENCES->ViewCustomAttributes = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->ViewValue = $t_lylich->C_HOBBIES->CurrentValue;
			$t_lylich->C_HOBBIES->CssStyle = "";
			$t_lylich->C_HOBBIES->CssClass = "";
			$t_lylich->C_HOBBIES->ViewCustomAttributes = "";

			// C_TEMPLATE
			if (strval($t_lylich->C_TEMPLATE->CurrentValue) <> "") {
				switch ($t_lylich->C_TEMPLATE->CurrentValue) {
					case "1":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 1";
						break;
					case "2":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 2";
						break;
					default:
						$t_lylich->C_TEMPLATE->ViewValue = $t_lylich->C_TEMPLATE->CurrentValue;
				}
			} else {
				$t_lylich->C_TEMPLATE->ViewValue = NULL;
			}
			$t_lylich->C_TEMPLATE->CssStyle = "";
			$t_lylich->C_TEMPLATE->CssClass = "";
			$t_lylich->C_TEMPLATE->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_lylich->C_STATUS->CurrentValue) <> "") {
				switch ($t_lylich->C_STATUS->CurrentValue) {
					case "0":
						$t_lylich->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_lylich->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_STATUS->ViewValue = $t_lylich->C_STATUS->CurrentValue;
				}
			} else {
				$t_lylich->C_STATUS->ViewValue = NULL;
			}
			$t_lylich->C_STATUS->CssStyle = "";
			$t_lylich->C_STATUS->CssClass = "";
			$t_lylich->C_STATUS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lylich->C_USER_ADD->ViewValue = $t_lylich->C_USER_ADD->CurrentValue;
			$t_lylich->C_USER_ADD->CssStyle = "";
			$t_lylich->C_USER_ADD->CssClass = "";
			$t_lylich->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lylich->C_ADD_TIME->ViewValue = $t_lylich->C_ADD_TIME->CurrentValue;
			$t_lylich->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_ADD_TIME->ViewValue, 7);
			$t_lylich->C_ADD_TIME->CssStyle = "";
			$t_lylich->C_ADD_TIME->CssClass = "";
			$t_lylich->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->ViewValue = $t_lylich->C_USER_EDIT->CurrentValue;
			$t_lylich->C_USER_EDIT->CssStyle = "";
			$t_lylich->C_USER_EDIT->CssClass = "";
			$t_lylich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->ViewValue = $t_lylich->C_EDIT_TIME->CurrentValue;
			$t_lylich->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_EDIT_TIME->ViewValue, 7);
			$t_lylich->C_EDIT_TIME->CssStyle = "";
			$t_lylich->C_EDIT_TIME->CssClass = "";
			$t_lylich->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->ViewValue = $t_lylich->C_ORDER_LEVEL->CurrentValue;
			$t_lylich->C_ORDER_LEVEL->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_LEVEL->ViewValue, 7);
			$t_lylich->C_ORDER_LEVEL->CssStyle = "";
			$t_lylich->C_ORDER_LEVEL->CssClass = "";
			$t_lylich->C_ORDER_LEVEL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lylich->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_lylich->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_ACTIVE->ViewValue = $t_lylich->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE->CssStyle = "";
			$t_lylich->C_ACTIVE->CssClass = "";
			$t_lylich->C_ACTIVE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->ViewValue = $t_lylich->C_TIME_ACTIVE->CurrentValue;
			$t_lylich->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVE->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVE->CssStyle = "";
			$t_lylich->C_TIME_ACTIVE->CssClass = "";
			$t_lylich->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Khong active mainsite";
						break;
					case "1":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Active mainsite";
						break;
					case "2":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Xac nhan";
						break;
					default:
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = $t_lylich->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_lylich->C_ACTIVE_MAINSITE->CssClass = "";
			$t_lylich->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->ViewValue = $t_lylich->C_TIME_ACTIVEM->CurrentValue;
			$t_lylich->C_TIME_ACTIVEM->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVEM->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVEM->CssStyle = "";
			$t_lylich->C_TIME_ACTIVEM->CssClass = "";
			$t_lylich->C_TIME_ACTIVEM->ViewCustomAttributes = "";

			// C_ORDER_MAIN
			$t_lylich->C_ORDER_MAIN->ViewValue = $t_lylich->C_ORDER_MAIN->CurrentValue;
			$t_lylich->C_ORDER_MAIN->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_MAIN->ViewValue, 7);
			$t_lylich->C_ORDER_MAIN->CssStyle = "";
			$t_lylich->C_ORDER_MAIN->CssClass = "";
			$t_lylich->C_ORDER_MAIN->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->HrefValue = "";
			$t_lylich->FK_CONGTY_ID->TooltipValue = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $t_lylich->C_PIC->UploadPath) . ((!empty($t_lylich->C_PIC->ViewValue)) ? $t_lylich->C_PIC->ViewValue : $t_lylich->C_PIC->CurrentValue);
				if ($t_lylich->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($t_lylich->C_PIC->HrefValue);
			} else {
				$t_lylich->C_PIC->HrefValue = "";
			}
			$t_lylich->C_PIC->TooltipValue = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->HrefValue = "";
			$t_lylich->C_FULLNAME->TooltipValue = "";

			// C_POSITION
			$t_lylich->C_POSITION->HrefValue = "";
			$t_lylich->C_POSITION->TooltipValue = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->HrefValue = "";
			$t_lylich->C_WORK_ADDRESS->TooltipValue = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->HrefValue = "";
			$t_lylich->C_EMAIL->TooltipValue = "";

			// C_PHONE
			$t_lylich->C_PHONE->HrefValue = "";
			$t_lylich->C_PHONE->TooltipValue = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->HrefValue = "";
			$t_lylich->C_BIRTHDAY->TooltipValue = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";
			$t_lylich->C_TEMPLATE->TooltipValue = "";

			// C_STATUS
			$t_lylich->C_STATUS->HrefValue = "";
			$t_lylich->C_STATUS->TooltipValue = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->HrefValue = "";
			$t_lylich->C_ORDER_LEVEL->TooltipValue = "";

			// C_ACTIVE
			$t_lylich->C_ACTIVE->HrefValue = "";
			$t_lylich->C_ACTIVE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->HrefValue = "";
			$t_lylich->C_TIME_ACTIVE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_lylich->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->HrefValue = "";
			$t_lylich->C_TIME_ACTIVEM->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_lylich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lylich->Row_Rendered();
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
