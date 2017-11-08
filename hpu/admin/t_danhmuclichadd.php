<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmuclichinfo.php" ?>
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
$t_danhmuclich_add = new ct_danhmuclich_add();
$Page =& $t_danhmuclich_add;

// Page init
$t_danhmuclich_add->Page_Init();

// Page main
$t_danhmuclich_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmuclich_add = new ew_Page("t_danhmuclich_add");

// page properties
t_danhmuclich_add.PageID = "add"; // page ID
t_danhmuclich_add.FormID = "ft_danhmuclichadd"; // form ID
var EW_PAGE_ID = t_danhmuclich_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_danhmuclich_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_NAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmuclich->C_NAME->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_danhmuclich_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmuclich_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmuclich_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmuclich_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p class="pheader"><?php echo $t_danhmuclich->TableCaption() ?></p>
<a href="<?php echo $t_danhmuclich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmuclich_add->ShowMessage();
?>
<form name="ft_danhmuclichadd" id="ft_danhmuclichadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_danhmuclich_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_danhmuclich">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_danhmuclich->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_danhmuclich->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmuclich->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmuclich->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_danhmuclich->C_NAME->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_danhmuclich->C_NAME->EditValue ?>"<?php echo $t_danhmuclich->C_NAME->EditAttributes() ?>>
</span><?php echo $t_danhmuclich->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_danhmuclich_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmuclich_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_danhmuclich';

	// Page object name
	var $PageObjName = 't_danhmuclich_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmuclich;
		if ($t_danhmuclich->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmuclich->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmuclich;
		if ($t_danhmuclich->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmuclich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmuclich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmuclich_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmuclich)
		$GLOBALS["t_danhmuclich"] = new ct_danhmuclich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmuclich', TRUE);

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
		global $t_danhmuclich;

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
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_danhmuclichlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Create form object
		$objForm = new cFormObj();

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
	var $sDbMasterFilter = "";
	var $sDbDetailFilter = "";
	var $lPriv = 0;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_danhmuclich;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["SB_ID"] != "") {
		  $t_danhmuclich->SB_ID->setQueryStringValue($_GET["SB_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_danhmuclich->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_danhmuclich->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_danhmuclich->CurrentAction = "C"; // Copy record
		  } else {
		    $t_danhmuclich->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_danhmuclich->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_danhmuclichlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_danhmuclich->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_danhmuclich->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_danhmuclichview.php")
						$sReturnUrl = $t_danhmuclich->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_danhmuclich->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_danhmuclich;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_danhmuclich;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_danhmuclich;
		$t_danhmuclich->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_danhmuclich->SB_ID->setFormValue($objForm->GetValue("x_SB_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_danhmuclich;
		$t_danhmuclich->SB_ID->CurrentValue = $t_danhmuclich->SB_ID->FormValue;
		$t_danhmuclich->C_NAME->CurrentValue = $t_danhmuclich->C_NAME->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmuclich;
		$sFilter = $t_danhmuclich->KeyFilter();

		// Call Row Selecting event
		$t_danhmuclich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmuclich->CurrentFilter = $sFilter;
		$sSql = $t_danhmuclich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmuclich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmuclich;
		$t_danhmuclich->SB_ID->setDbValue($rs->fields('SB_ID'));
		$t_danhmuclich->C_NAME->setDbValue($rs->fields('C_NAME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmuclich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_danhmuclich->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_danhmuclich->C_NAME->CellCssStyle = ""; $t_danhmuclich->C_NAME->CellCssClass = "";
		$t_danhmuclich->C_NAME->CellAttrs = array(); $t_danhmuclich->C_NAME->ViewAttrs = array(); $t_danhmuclich->C_NAME->EditAttrs = array();
		if ($t_danhmuclich->RowType == EW_ROWTYPE_VIEW) { // View row

			// SB_ID
			$t_danhmuclich->SB_ID->ViewValue = $t_danhmuclich->SB_ID->CurrentValue;
			$t_danhmuclich->SB_ID->CssStyle = "";
			$t_danhmuclich->SB_ID->CssClass = "";
			$t_danhmuclich->SB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuclich->C_NAME->ViewValue = $t_danhmuclich->C_NAME->CurrentValue;
			$t_danhmuclich->C_NAME->CssStyle = "";
			$t_danhmuclich->C_NAME->CssClass = "";
			$t_danhmuclich->C_NAME->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuclich->C_NAME->HrefValue = "";
			$t_danhmuclich->C_NAME->TooltipValue = "";
		} elseif ($t_danhmuclich->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_NAME
			$t_danhmuclich->C_NAME->EditCustomAttributes = "";
			$t_danhmuclich->C_NAME->EditValue = ew_HtmlEncode($t_danhmuclich->C_NAME->CurrentValue);
		}

		// Call Row Rendered event
		if ($t_danhmuclich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmuclich->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_danhmuclich;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_danhmuclich->C_NAME->FormValue) && $t_danhmuclich->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmuclich->C_NAME->FldCaption();
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Add record
	function AddRow() {
		global $conn, $Language, $Security, $t_danhmuclich;
		$rsnew = array();

		// C_NAME
		$t_danhmuclich->C_NAME->SetDbValueDef($rsnew, $t_danhmuclich->C_NAME->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$bInsertRow = $t_danhmuclich->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_danhmuclich->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_danhmuclich->CancelMessage <> "") {
				$this->setMessage($t_danhmuclich->CancelMessage);
				$t_danhmuclich->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_danhmuclich->SB_ID->setDbValue($conn->Insert_ID());
			$rsnew['SB_ID'] = $t_danhmuclich->SB_ID->DbValue;

			// Call Row Inserted event
			$t_danhmuclich->Row_Inserted($rsnew);
		}
		return $AddRow;
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

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
