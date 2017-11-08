<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmuctuyensinhinfo.php" ?>
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
$t_danhmuctuyensinh_edit = new ct_danhmuctuyensinh_edit();
$Page =& $t_danhmuctuyensinh_edit;

// Page init
$t_danhmuctuyensinh_edit->Page_Init();

// Page main
$t_danhmuctuyensinh_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmuctuyensinh_edit = new ew_Page("t_danhmuctuyensinh_edit");

// page properties
t_danhmuctuyensinh_edit.PageID = "edit"; // page ID
t_danhmuctuyensinh_edit.FormID = "ft_danhmuctuyensinhedit"; // form ID
var EW_PAGE_ID = t_danhmuctuyensinh_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_danhmuctuyensinh_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmuctuyensinh->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmuctuyensinh->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_danhmuctuyensinh->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmuctuyensinh->C_ACTIVE->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_danhmuctuyensinh_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmuctuyensinh_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmuctuyensinh_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmuctuyensinh_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_danhmuctuyensinh->TableCaption() ?></p>
<a href="<?php echo $t_danhmuctuyensinh->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmuctuyensinh_edit->ShowMessage();
?>
<form name="ft_danhmuctuyensinhedit" id="ft_danhmuctuyensinhedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_danhmuctuyensinh_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_danhmuctuyensinh">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_danhmuctuyensinh->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_danhmuctuyensinh->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmuctuyensinh->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmuctuyensinh->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_danhmuctuyensinh->C_NAME->FldTitle() ?>"  size="100" value="<?php echo $t_danhmuctuyensinh->C_NAME->EditValue ?>"<?php echo $t_danhmuctuyensinh->C_NAME->EditAttributes() ?>>
</span><?php echo $t_danhmuctuyensinh->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmuctuyensinh->C_DESCRIPTION->Visible) { // C_DESCRIPTION ?>
	<tr<?php echo $t_danhmuctuyensinh->C_DESCRIPTION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmuctuyensinh->C_DESCRIPTION->FldCaption() ?></td>
		<td<?php echo $t_danhmuctuyensinh->C_DESCRIPTION->CellAttributes() ?>><span id="el_C_DESCRIPTION">
<textarea name="x_C_DESCRIPTION" id="x_C_DESCRIPTION" title="<?php echo $t_danhmuctuyensinh->C_DESCRIPTION->FldTitle() ?>" cols="84" rows="4"<?php echo $t_danhmuctuyensinh->C_DESCRIPTION->EditAttributes() ?>><?php echo $t_danhmuctuyensinh->C_DESCRIPTION->EditValue ?></textarea>
</span><?php echo $t_danhmuctuyensinh->C_DESCRIPTION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmuctuyensinh->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_danhmuctuyensinh->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmuctuyensinh->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmuctuyensinh->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_danhmuctuyensinh->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_danhmuctuyensinh->C_ORDER->EditValue ?>"<?php echo $t_danhmuctuyensinh->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_danhmuctuyensinh->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmuctuyensinh->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_danhmuctuyensinh->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmuctuyensinh->C_ACTIVE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmuctuyensinh->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_danhmuctuyensinh->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_danhmuctuyensinh->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_danhmuctuyensinh->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_danhmuctuyensinh->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_danhmuctuyensinh->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_danhmuctuyensinh->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_danhmuctuyensinh->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_DANHMUCTUYENSINH" id="x_PK_DANHMUCTUYENSINH" value="<?php echo ew_HtmlEncode($t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_danhmuctuyensinh_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmuctuyensinh_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_danhmuctuyensinh';

	// Page object name
	var $PageObjName = 't_danhmuctuyensinh_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmuctuyensinh;
		if ($t_danhmuctuyensinh->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmuctuyensinh->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmuctuyensinh;
		if ($t_danhmuctuyensinh->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmuctuyensinh->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmuctuyensinh->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmuctuyensinh_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmuctuyensinh)
		$GLOBALS["t_danhmuctuyensinh"] = new ct_danhmuctuyensinh();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmuctuyensinh', TRUE);

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
		global $t_danhmuctuyensinh;

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
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_danhmuctuyensinhlist.php");
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
	var $sDbMasterFilter;
	var $sDbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_danhmuctuyensinh;

		// Load key from QueryString
		if (@$_GET["PK_DANHMUCTUYENSINH"] <> "")
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->setQueryStringValue($_GET["PK_DANHMUCTUYENSINH"]);
		if (@$_POST["a_edit"] <> "") {
			$t_danhmuctuyensinh->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_danhmuctuyensinh->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_danhmuctuyensinh->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_danhmuctuyensinh->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue == "")
			$this->Page_Terminate("t_danhmuctuyensinhlist.php"); // Invalid key, return to list
		switch ($t_danhmuctuyensinh->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_danhmuctuyensinhlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_danhmuctuyensinh->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_danhmuctuyensinh->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_danhmuctuyensinhview.php")
						$sReturnUrl = $t_danhmuctuyensinh->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_danhmuctuyensinh->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_danhmuctuyensinh->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_danhmuctuyensinh;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_danhmuctuyensinh->C_DESCRIPTION->setFormValue($objForm->GetValue("x_C_DESCRIPTION"));
		$t_danhmuctuyensinh->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_danhmuctuyensinh->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_danhmuctuyensinh->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_danhmuctuyensinh->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue, 7);
		$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->setFormValue($objForm->GetValue("x_PK_DANHMUCTUYENSINH"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue = $t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->FormValue;
		$this->LoadRow();
		$t_danhmuctuyensinh->C_NAME->CurrentValue = $t_danhmuctuyensinh->C_NAME->FormValue;
		$t_danhmuctuyensinh->C_DESCRIPTION->CurrentValue = $t_danhmuctuyensinh->C_DESCRIPTION->FormValue;
		$t_danhmuctuyensinh->C_ORDER->CurrentValue = $t_danhmuctuyensinh->C_ORDER->FormValue;
		$t_danhmuctuyensinh->C_ACTIVE->CurrentValue = $t_danhmuctuyensinh->C_ACTIVE->FormValue;
		$t_danhmuctuyensinh->C_USER_EDIT->CurrentValue = $t_danhmuctuyensinh->C_USER_EDIT->FormValue;
		$t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue = $t_danhmuctuyensinh->C_EDIT_TIME->FormValue;
		$t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmuctuyensinh;
		$sFilter = $t_danhmuctuyensinh->KeyFilter();

		// Call Row Selecting event
		$t_danhmuctuyensinh->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmuctuyensinh->CurrentFilter = $sFilter;
		$sSql = $t_danhmuctuyensinh->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmuctuyensinh->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmuctuyensinh;
		$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->setDbValue($rs->fields('PK_DANHMUCTUYENSINH'));
		$t_danhmuctuyensinh->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_danhmuctuyensinh->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_danhmuctuyensinh->C_DESCRIPTION->setDbValue($rs->fields('C_DESCRIPTION'));
		$t_danhmuctuyensinh->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_danhmuctuyensinh->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_danhmuctuyensinh->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_danhmuctuyensinh->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_danhmuctuyensinh->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_danhmuctuyensinh->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmuctuyensinh;

		// Initialize URLs
		// Call Row_Rendering event

		$t_danhmuctuyensinh->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_danhmuctuyensinh->C_NAME->CellCssStyle = ""; $t_danhmuctuyensinh->C_NAME->CellCssClass = "";
		$t_danhmuctuyensinh->C_NAME->CellAttrs = array(); $t_danhmuctuyensinh->C_NAME->ViewAttrs = array(); $t_danhmuctuyensinh->C_NAME->EditAttrs = array();

		// C_DESCRIPTION
		$t_danhmuctuyensinh->C_DESCRIPTION->CellCssStyle = ""; $t_danhmuctuyensinh->C_DESCRIPTION->CellCssClass = "";
		$t_danhmuctuyensinh->C_DESCRIPTION->CellAttrs = array(); $t_danhmuctuyensinh->C_DESCRIPTION->ViewAttrs = array(); $t_danhmuctuyensinh->C_DESCRIPTION->EditAttrs = array();

		// C_ORDER
		$t_danhmuctuyensinh->C_ORDER->CellCssStyle = ""; $t_danhmuctuyensinh->C_ORDER->CellCssClass = "";
		$t_danhmuctuyensinh->C_ORDER->CellAttrs = array(); $t_danhmuctuyensinh->C_ORDER->ViewAttrs = array(); $t_danhmuctuyensinh->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_danhmuctuyensinh->C_ACTIVE->CellCssStyle = ""; $t_danhmuctuyensinh->C_ACTIVE->CellCssClass = "";
		$t_danhmuctuyensinh->C_ACTIVE->CellAttrs = array(); $t_danhmuctuyensinh->C_ACTIVE->ViewAttrs = array(); $t_danhmuctuyensinh->C_ACTIVE->EditAttrs = array();

		// C_USER_EDIT
		$t_danhmuctuyensinh->C_USER_EDIT->CellCssStyle = ""; $t_danhmuctuyensinh->C_USER_EDIT->CellCssClass = "";
		$t_danhmuctuyensinh->C_USER_EDIT->CellAttrs = array(); $t_danhmuctuyensinh->C_USER_EDIT->ViewAttrs = array(); $t_danhmuctuyensinh->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_danhmuctuyensinh->C_EDIT_TIME->CellCssStyle = ""; $t_danhmuctuyensinh->C_EDIT_TIME->CellCssClass = "";
		$t_danhmuctuyensinh->C_EDIT_TIME->CellAttrs = array(); $t_danhmuctuyensinh->C_EDIT_TIME->ViewAttrs = array(); $t_danhmuctuyensinh->C_EDIT_TIME->EditAttrs = array();
		if ($t_danhmuctuyensinh->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_DANHMUCTUYENSINH
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->ViewValue = $t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CurrentValue;
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CssStyle = "";
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->CssClass = "";
			$t_danhmuctuyensinh->PK_DANHMUCTUYENSINH->ViewCustomAttributes = "";

			// C_TYPE
			$t_danhmuctuyensinh->C_TYPE->ViewValue = $t_danhmuctuyensinh->C_TYPE->CurrentValue;
			$t_danhmuctuyensinh->C_TYPE->CssStyle = "";
			$t_danhmuctuyensinh->C_TYPE->CssClass = "";
			$t_danhmuctuyensinh->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->ViewValue = $t_danhmuctuyensinh->C_NAME->CurrentValue;
			$t_danhmuctuyensinh->C_NAME->CssStyle = "";
			$t_danhmuctuyensinh->C_NAME->CssClass = "";
			$t_danhmuctuyensinh->C_NAME->ViewCustomAttributes = "";

			// C_DESCRIPTION
			$t_danhmuctuyensinh->C_DESCRIPTION->ViewValue = $t_danhmuctuyensinh->C_DESCRIPTION->CurrentValue;
			$t_danhmuctuyensinh->C_DESCRIPTION->CssStyle = "";
			$t_danhmuctuyensinh->C_DESCRIPTION->CssClass = "";
			$t_danhmuctuyensinh->C_DESCRIPTION->ViewCustomAttributes = "";

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->ViewValue = $t_danhmuctuyensinh->C_ORDER->CurrentValue;
			$t_danhmuctuyensinh->C_ORDER->CssStyle = "";
			$t_danhmuctuyensinh->C_ORDER->CssClass = "";
			$t_danhmuctuyensinh->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_danhmuctuyensinh->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_danhmuctuyensinh->C_ACTIVE->CurrentValue) {
					case "0":
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_danhmuctuyensinh->C_ACTIVE->ViewValue = $t_danhmuctuyensinh->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_danhmuctuyensinh->C_ACTIVE->ViewValue = NULL;
			}
			$t_danhmuctuyensinh->C_ACTIVE->CssStyle = "";
			$t_danhmuctuyensinh->C_ACTIVE->CssClass = "";
			$t_danhmuctuyensinh->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_danhmuctuyensinh->C_USER_ADD->ViewValue = $t_danhmuctuyensinh->C_USER_ADD->CurrentValue;
			$t_danhmuctuyensinh->C_USER_ADD->CssStyle = "";
			$t_danhmuctuyensinh->C_USER_ADD->CssClass = "";
			$t_danhmuctuyensinh->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_danhmuctuyensinh->C_ADD_TIME->ViewValue = $t_danhmuctuyensinh->C_ADD_TIME->CurrentValue;
			$t_danhmuctuyensinh->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_danhmuctuyensinh->C_ADD_TIME->ViewValue, 7);
			$t_danhmuctuyensinh->C_ADD_TIME->CssStyle = "";
			$t_danhmuctuyensinh->C_ADD_TIME->CssClass = "";
			$t_danhmuctuyensinh->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_danhmuctuyensinh->C_USER_EDIT->ViewValue = $t_danhmuctuyensinh->C_USER_EDIT->CurrentValue;
			$t_danhmuctuyensinh->C_USER_EDIT->CssStyle = "";
			$t_danhmuctuyensinh->C_USER_EDIT->CssClass = "";
			$t_danhmuctuyensinh->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewValue = $t_danhmuctuyensinh->C_EDIT_TIME->CurrentValue;
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_danhmuctuyensinh->C_EDIT_TIME->ViewValue, 7);
			$t_danhmuctuyensinh->C_EDIT_TIME->CssStyle = "";
			$t_danhmuctuyensinh->C_EDIT_TIME->CssClass = "";
			$t_danhmuctuyensinh->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->HrefValue = "";
			$t_danhmuctuyensinh->C_NAME->TooltipValue = "";

			// C_DESCRIPTION
			$t_danhmuctuyensinh->C_DESCRIPTION->HrefValue = "";
			$t_danhmuctuyensinh->C_DESCRIPTION->TooltipValue = "";

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->HrefValue = "";
			$t_danhmuctuyensinh->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_danhmuctuyensinh->C_ACTIVE->HrefValue = "";
			$t_danhmuctuyensinh->C_ACTIVE->TooltipValue = "";

			// C_USER_EDIT
			$t_danhmuctuyensinh->C_USER_EDIT->HrefValue = "";
			$t_danhmuctuyensinh->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_danhmuctuyensinh->C_EDIT_TIME->HrefValue = "";
			$t_danhmuctuyensinh->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_danhmuctuyensinh->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->EditCustomAttributes = "";
			$t_danhmuctuyensinh->C_NAME->EditValue = ew_HtmlEncode($t_danhmuctuyensinh->C_NAME->CurrentValue);

			// C_DESCRIPTION
			$t_danhmuctuyensinh->C_DESCRIPTION->EditCustomAttributes = "";
			$t_danhmuctuyensinh->C_DESCRIPTION->EditValue = ew_HtmlEncode($t_danhmuctuyensinh->C_DESCRIPTION->CurrentValue);

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->EditCustomAttributes = "";
			$t_danhmuctuyensinh->C_ORDER->EditValue = ew_HtmlEncode($t_danhmuctuyensinh->C_ORDER->CurrentValue);

			// C_ACTIVE
			$t_danhmuctuyensinh->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat");
			$arwrk[] = array("1", "Kich hoat");
			$t_danhmuctuyensinh->C_ACTIVE->EditValue = $arwrk;

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// C_NAME

			$t_danhmuctuyensinh->C_NAME->HrefValue = "";

			// C_DESCRIPTION
			$t_danhmuctuyensinh->C_DESCRIPTION->HrefValue = "";

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->HrefValue = "";

			// C_ACTIVE
			$t_danhmuctuyensinh->C_ACTIVE->HrefValue = "";

			// C_USER_EDIT
			$t_danhmuctuyensinh->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_danhmuctuyensinh->C_EDIT_TIME->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_danhmuctuyensinh->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmuctuyensinh->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_danhmuctuyensinh;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_danhmuctuyensinh->C_NAME->FormValue) && $t_danhmuctuyensinh->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmuctuyensinh->C_NAME->FldCaption();
		}
		if (!is_null($t_danhmuctuyensinh->C_ORDER->FormValue) && $t_danhmuctuyensinh->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmuctuyensinh->C_ORDER->FldCaption();
		}
		if (!ew_CheckInteger($t_danhmuctuyensinh->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_danhmuctuyensinh->C_ORDER->FldErrMsg();
		}
		if ($t_danhmuctuyensinh->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmuctuyensinh->C_ACTIVE->FldCaption();
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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $t_danhmuctuyensinh;
		$sFilter = $t_danhmuctuyensinh->KeyFilter();
		$t_danhmuctuyensinh->CurrentFilter = $sFilter;
		$sSql = $t_danhmuctuyensinh->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// C_NAME
			$t_danhmuctuyensinh->C_NAME->SetDbValueDef($rsnew, $t_danhmuctuyensinh->C_NAME->CurrentValue, NULL, FALSE);

			// C_DESCRIPTION
			$t_danhmuctuyensinh->C_DESCRIPTION->SetDbValueDef($rsnew, $t_danhmuctuyensinh->C_DESCRIPTION->CurrentValue, NULL, FALSE);

			// C_ORDER
			$t_danhmuctuyensinh->C_ORDER->SetDbValueDef($rsnew, $t_danhmuctuyensinh->C_ORDER->CurrentValue, NULL, FALSE);

			// C_ACTIVE
			$t_danhmuctuyensinh->C_ACTIVE->SetDbValueDef($rsnew, $t_danhmuctuyensinh->C_ACTIVE->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_danhmuctuyensinh->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_danhmuctuyensinh->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_danhmuctuyensinh->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_danhmuctuyensinh->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_danhmuctuyensinh->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_danhmuctuyensinh->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_danhmuctuyensinh->CancelMessage <> "") {
					$this->setMessage($t_danhmuctuyensinh->CancelMessage);
					$t_danhmuctuyensinh->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_danhmuctuyensinh->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
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
