<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_chuyenmuc_levelsiteinfo.php" ?>
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
$t_chuyenmuc_levelsite_edit = new ct_chuyenmuc_levelsite_edit();
$Page =& $t_chuyenmuc_levelsite_edit;

// Page init
$t_chuyenmuc_levelsite_edit->Page_Init();

// Page main
$t_chuyenmuc_levelsite_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_chuyenmuc_levelsite_edit = new ew_Page("t_chuyenmuc_levelsite_edit");

// page properties
t_chuyenmuc_levelsite_edit.PageID = "edit"; // page ID
t_chuyenmuc_levelsite_edit.FormID = "ft_chuyenmuc_levelsiteedit"; // form ID
var EW_PAGE_ID = t_chuyenmuc_levelsite_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_chuyenmuc_levelsite_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_chuyenmuc_levelsite->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TYPE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_chuyenmuc_levelsite->C_TYPE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_chuyenmuc_levelsite->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_STATUS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_chuyenmuc_levelsite->C_STATUS->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_chuyenmuc_levelsite_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_chuyenmuc_levelsite_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_chuyenmuc_levelsite_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_chuyenmuc_levelsite_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><span class="phpmaker"><?php echo $t_chuyenmuc_levelsite->TableCaption() ?></p>
<a href="<?php echo $t_chuyenmuc_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_chuyenmuc_levelsite_edit->ShowMessage();
?>
<form name="ft_chuyenmuc_levelsiteedit" id="ft_chuyenmuc_levelsiteedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_chuyenmuc_levelsite_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_chuyenmuc_levelsite">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_chuyenmuc_levelsite->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_chuyenmuc_levelsite->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_chuyenmuc_levelsite->FK_CONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_chuyenmuc_levelsite->FK_CONGTY->CellAttributes() ?>><span id="el_FK_CONGTY">
<div<?php echo $t_chuyenmuc_levelsite->FK_CONGTY->ViewAttributes() ?>><?php echo $t_chuyenmuc_levelsite->FK_CONGTY->EditValue ?></div><input type="hidden" name="x_FK_CONGTY" id="x_FK_CONGTY" value="<?php echo ew_HtmlEncode($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) ?>">
</span><?php echo $t_chuyenmuc_levelsite->FK_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_chuyenmuc_levelsite->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_chuyenmuc_levelsite->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_chuyenmuc_levelsite->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_chuyenmuc_levelsite->C_NAME->FldTitle() ?>" size="100" value="<?php echo $t_chuyenmuc_levelsite->C_NAME->EditValue ?>"<?php echo $t_chuyenmuc_levelsite->C_NAME->EditAttributes() ?>>
</span><?php echo $t_chuyenmuc_levelsite->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_chuyenmuc_levelsite->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_chuyenmuc_levelsite->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_chuyenmuc_levelsite->C_TYPE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_TYPE->CellAttributes() ?>><span id="el_C_TYPE">
<select id="x_C_TYPE" name="x_C_TYPE" title="<?php echo $t_chuyenmuc_levelsite->C_TYPE->FldTitle() ?>"<?php echo $t_chuyenmuc_levelsite->C_TYPE->EditAttributes() ?>>
<?php
if (is_array($t_chuyenmuc_levelsite->C_TYPE->EditValue)) {
	$arwrk = $t_chuyenmuc_levelsite->C_TYPE->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_chuyenmuc_levelsite->C_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $t_chuyenmuc_levelsite->C_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_chuyenmuc_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_chuyenmuc_levelsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_chuyenmuc_levelsite->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_chuyenmuc_levelsite->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_chuyenmuc_levelsite->C_ORDER->EditValue ?>"<?php echo $t_chuyenmuc_levelsite->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_chuyenmuc_levelsite->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_chuyenmuc_levelsite->C_STATUS->Visible) { // C_STATUS ?>
	<tr<?php echo $t_chuyenmuc_levelsite->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_chuyenmuc_levelsite->C_STATUS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_chuyenmuc_levelsite->C_STATUS->CellAttributes() ?>><span id="el_C_STATUS">
<select id="x_C_STATUS" name="x_C_STATUS" title="<?php echo $t_chuyenmuc_levelsite->C_STATUS->FldTitle() ?>"<?php echo $t_chuyenmuc_levelsite->C_STATUS->EditAttributes() ?>>
<?php
if (is_array($t_chuyenmuc_levelsite->C_STATUS->EditValue)) {
	$arwrk = $t_chuyenmuc_levelsite->C_STATUS->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_chuyenmuc_levelsite->C_STATUS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $t_chuyenmuc_levelsite->C_STATUS->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_CHUYENMUC" id="x_PK_CHUYENMUC" value="<?php echo ew_HtmlEncode($t_chuyenmuc_levelsite->PK_CHUYENMUC->CurrentValue) ?>">
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
$t_chuyenmuc_levelsite_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_chuyenmuc_levelsite_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_chuyenmuc_levelsite';

	// Page object name
	var $PageObjName = 't_chuyenmuc_levelsite_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_chuyenmuc_levelsite;
		if ($t_chuyenmuc_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_chuyenmuc_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_chuyenmuc_levelsite;
		if ($t_chuyenmuc_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_chuyenmuc_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_chuyenmuc_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_chuyenmuc_levelsite_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_chuyenmuc_levelsite)
		$GLOBALS["t_chuyenmuc_levelsite"] = new ct_chuyenmuc_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_chuyenmuc_levelsite', TRUE);

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
		global $t_chuyenmuc_levelsite;

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
			$this->Page_Terminate("t_chuyenmuc_levelsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_chuyenmuc_levelsite;

		// Load key from QueryString
		if (@$_GET["PK_CHUYENMUC"] <> "")
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->setQueryStringValue($_GET["PK_CHUYENMUC"]);
		if (@$_POST["a_edit"] <> "") {
			$t_chuyenmuc_levelsite->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_chuyenmuc_levelsite->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_chuyenmuc_levelsite->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_chuyenmuc_levelsite->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_chuyenmuc_levelsite->PK_CHUYENMUC->CurrentValue == "")
			$this->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // Invalid key, return to list
		switch ($t_chuyenmuc_levelsite->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_chuyenmuc_levelsitelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_chuyenmuc_levelsite->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_chuyenmuc_levelsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_chuyenmuc_levelsiteview.php")
						$sReturnUrl = $t_chuyenmuc_levelsite->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_chuyenmuc_levelsite->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_chuyenmuc_levelsite->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_chuyenmuc_levelsite;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_chuyenmuc_levelsite;
		$t_chuyenmuc_levelsite->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_chuyenmuc_levelsite->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_chuyenmuc_levelsite->C_TYPE->setFormValue($objForm->GetValue("x_C_TYPE"));
		$t_chuyenmuc_levelsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_chuyenmuc_levelsite->C_STATUS->setFormValue($objForm->GetValue("x_C_STATUS"));
		$t_chuyenmuc_levelsite->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_chuyenmuc_levelsite->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue, 7);
		$t_chuyenmuc_levelsite->PK_CHUYENMUC->setFormValue($objForm->GetValue("x_PK_CHUYENMUC"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_chuyenmuc_levelsite;
		$t_chuyenmuc_levelsite->PK_CHUYENMUC->CurrentValue = $t_chuyenmuc_levelsite->PK_CHUYENMUC->FormValue;
		$this->LoadRow();
		$t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue = $t_chuyenmuc_levelsite->FK_CONGTY->FormValue;
		$t_chuyenmuc_levelsite->C_NAME->CurrentValue = $t_chuyenmuc_levelsite->C_NAME->FormValue;
		$t_chuyenmuc_levelsite->C_TYPE->CurrentValue = $t_chuyenmuc_levelsite->C_TYPE->FormValue;
		$t_chuyenmuc_levelsite->C_ORDER->CurrentValue = $t_chuyenmuc_levelsite->C_ORDER->FormValue;
		$t_chuyenmuc_levelsite->C_STATUS->CurrentValue = $t_chuyenmuc_levelsite->C_STATUS->FormValue;
		$t_chuyenmuc_levelsite->C_USER_EDIT->CurrentValue = $t_chuyenmuc_levelsite->C_USER_EDIT->FormValue;
		$t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue = $t_chuyenmuc_levelsite->C_EDIT_TIME->FormValue;
		$t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_chuyenmuc_levelsite;
		$sFilter = $t_chuyenmuc_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_chuyenmuc_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_chuyenmuc_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_chuyenmuc_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_chuyenmuc_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_chuyenmuc_levelsite;
		$t_chuyenmuc_levelsite->PK_CHUYENMUC->setDbValue($rs->fields('PK_CHUYENMUC'));
		$t_chuyenmuc_levelsite->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_chuyenmuc_levelsite->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_chuyenmuc_levelsite->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_chuyenmuc_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_chuyenmuc_levelsite->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_chuyenmuc_levelsite->C_PARENT->setDbValue($rs->fields('C_PARENT'));
		$t_chuyenmuc_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_chuyenmuc_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_chuyenmuc_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_chuyenmuc_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_chuyenmuc_levelsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_chuyenmuc_levelsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_chuyenmuc_levelsite->FK_CONGTY->CellCssStyle = ""; $t_chuyenmuc_levelsite->FK_CONGTY->CellCssClass = "";
		$t_chuyenmuc_levelsite->FK_CONGTY->CellAttrs = array(); $t_chuyenmuc_levelsite->FK_CONGTY->ViewAttrs = array(); $t_chuyenmuc_levelsite->FK_CONGTY->EditAttrs = array();

		// C_NAME
		$t_chuyenmuc_levelsite->C_NAME->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_NAME->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_NAME->CellAttrs = array(); $t_chuyenmuc_levelsite->C_NAME->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_NAME->EditAttrs = array();

		// C_TYPE
		$t_chuyenmuc_levelsite->C_TYPE->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_TYPE->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_TYPE->CellAttrs = array(); $t_chuyenmuc_levelsite->C_TYPE->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_TYPE->EditAttrs = array();

		// C_ORDER
		$t_chuyenmuc_levelsite->C_ORDER->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_ORDER->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_ORDER->CellAttrs = array(); $t_chuyenmuc_levelsite->C_ORDER->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_ORDER->EditAttrs = array();

		// C_STATUS
		$t_chuyenmuc_levelsite->C_STATUS->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_STATUS->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_STATUS->CellAttrs = array(); $t_chuyenmuc_levelsite->C_STATUS->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_STATUS->EditAttrs = array();

		// C_USER_EDIT
		$t_chuyenmuc_levelsite->C_USER_EDIT->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_USER_EDIT->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_USER_EDIT->CellAttrs = array(); $t_chuyenmuc_levelsite->C_USER_EDIT->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_chuyenmuc_levelsite->C_EDIT_TIME->CellCssStyle = ""; $t_chuyenmuc_levelsite->C_EDIT_TIME->CellCssClass = "";
		$t_chuyenmuc_levelsite->C_EDIT_TIME->CellAttrs = array(); $t_chuyenmuc_levelsite->C_EDIT_TIME->ViewAttrs = array(); $t_chuyenmuc_levelsite->C_EDIT_TIME->EditAttrs = array();
		if ($t_chuyenmuc_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_CHUYENMUC
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->ViewValue = $t_chuyenmuc_levelsite->PK_CHUYENMUC->CurrentValue;
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->CssStyle = "";
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->CssClass = "";
			$t_chuyenmuc_levelsite->PK_CHUYENMUC->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = $t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->FK_CONGTY->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->FK_CONGTY->CssStyle = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->CssClass = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->ViewValue = $t_chuyenmuc_levelsite->C_NAME->CurrentValue;
			$t_chuyenmuc_levelsite->C_NAME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_NAME->CssClass = "";
			$t_chuyenmuc_levelsite->C_NAME->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_chuyenmuc_levelsite->C_TYPE->CurrentValue) <> "") {
				switch ($t_chuyenmuc_levelsite->C_TYPE->CurrentValue) {
					case "0":
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = "Chuyen muc 1 bai viet";
						break;
					case "1":
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = "Chuyen muc list bai viet";
                                        case "2":
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = "Chuyên mục thông báo";
						break;
					default:
						$t_chuyenmuc_levelsite->C_TYPE->ViewValue = $t_chuyenmuc_levelsite->C_TYPE->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->C_TYPE->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->C_TYPE->CssStyle = "";
			$t_chuyenmuc_levelsite->C_TYPE->CssClass = "";
			$t_chuyenmuc_levelsite->C_TYPE->ViewCustomAttributes = "";

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->ViewValue = $t_chuyenmuc_levelsite->C_ORDER->CurrentValue;
			$t_chuyenmuc_levelsite->C_ORDER->CssStyle = "";
			$t_chuyenmuc_levelsite->C_ORDER->CssClass = "";
			$t_chuyenmuc_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_chuyenmuc_levelsite->C_STATUS->CurrentValue) <> "") {
				switch ($t_chuyenmuc_levelsite->C_STATUS->CurrentValue) {
					case "0":
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_chuyenmuc_levelsite->C_STATUS->ViewValue = $t_chuyenmuc_levelsite->C_STATUS->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->C_STATUS->ViewValue = NULL;
			}
			$t_chuyenmuc_levelsite->C_STATUS->CssStyle = "";
			$t_chuyenmuc_levelsite->C_STATUS->CssClass = "";
			$t_chuyenmuc_levelsite->C_STATUS->ViewCustomAttributes = "";

			// C_PARENT
			$t_chuyenmuc_levelsite->C_PARENT->ViewValue = $t_chuyenmuc_levelsite->C_PARENT->CurrentValue;
			$t_chuyenmuc_levelsite->C_PARENT->CssStyle = "";
			$t_chuyenmuc_levelsite->C_PARENT->CssClass = "";
			$t_chuyenmuc_levelsite->C_PARENT->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_chuyenmuc_levelsite->C_USER_ADD->ViewValue = $t_chuyenmuc_levelsite->C_USER_ADD->CurrentValue;
			$t_chuyenmuc_levelsite->C_USER_ADD->CssStyle = "";
			$t_chuyenmuc_levelsite->C_USER_ADD->CssClass = "";
			$t_chuyenmuc_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue = $t_chuyenmuc_levelsite->C_ADD_TIME->CurrentValue;
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_chuyenmuc_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_chuyenmuc_levelsite->C_ADD_TIME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_ADD_TIME->CssClass = "";
			$t_chuyenmuc_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_chuyenmuc_levelsite->C_USER_EDIT->ViewValue = $t_chuyenmuc_levelsite->C_USER_EDIT->CurrentValue;
			$t_chuyenmuc_levelsite->C_USER_EDIT->CssStyle = "";
			$t_chuyenmuc_levelsite->C_USER_EDIT->CssClass = "";
			$t_chuyenmuc_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue = $t_chuyenmuc_levelsite->C_EDIT_TIME->CurrentValue;
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_chuyenmuc_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_chuyenmuc_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_chuyenmuc_levelsite->C_EDIT_TIME->CssClass = "";
			$t_chuyenmuc_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_chuyenmuc_levelsite->FK_CONGTY->HrefValue = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->TooltipValue = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->HrefValue = "";
			$t_chuyenmuc_levelsite->C_NAME->TooltipValue = "";

			// C_TYPE
			$t_chuyenmuc_levelsite->C_TYPE->HrefValue = "";
			$t_chuyenmuc_levelsite->C_TYPE->TooltipValue = "";

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->HrefValue = "";
			$t_chuyenmuc_levelsite->C_ORDER->TooltipValue = "";

			// C_STATUS
			$t_chuyenmuc_levelsite->C_STATUS->HrefValue = "";
			$t_chuyenmuc_levelsite->C_STATUS->TooltipValue = "";

			// C_USER_EDIT
			$t_chuyenmuc_levelsite->C_USER_EDIT->HrefValue = "";
			$t_chuyenmuc_levelsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_chuyenmuc_levelsite->C_EDIT_TIME->HrefValue = "";
			$t_chuyenmuc_levelsite->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_chuyenmuc_levelsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY
			$t_chuyenmuc_levelsite->FK_CONGTY->EditCustomAttributes = "";
			if (strval($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_chuyenmuc_levelsite->FK_CONGTY->EditValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_chuyenmuc_levelsite->FK_CONGTY->EditValue = $t_chuyenmuc_levelsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_chuyenmuc_levelsite->FK_CONGTY->EditValue = NULL;
			}
			$t_chuyenmuc_levelsite->FK_CONGTY->CssStyle = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->CssClass = "";
			$t_chuyenmuc_levelsite->FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->EditCustomAttributes = "";
			$t_chuyenmuc_levelsite->C_NAME->EditValue = ew_HtmlEncode($t_chuyenmuc_levelsite->C_NAME->CurrentValue);

			// C_TYPE
			$t_chuyenmuc_levelsite->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chuyên mục 1 bài viết");
			$arwrk[] = array("1", "Chuyên mục list bài viết");
                        if ($Security->CurrentUserOption() == 117){ $arwrk[] = array("2", "Chuyên mục thông báo");}
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_chuyenmuc_levelsite->C_TYPE->EditValue = $arwrk;

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_chuyenmuc_levelsite->C_ORDER->EditValue = ew_HtmlEncode($t_chuyenmuc_levelsite->C_ORDER->CurrentValue);

			// C_STATUS
			$t_chuyenmuc_levelsite->C_STATUS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_chuyenmuc_levelsite->C_STATUS->EditValue = $arwrk;

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// FK_CONGTY

			$t_chuyenmuc_levelsite->FK_CONGTY->HrefValue = "";

			// C_NAME
			$t_chuyenmuc_levelsite->C_NAME->HrefValue = "";

			// C_TYPE
			$t_chuyenmuc_levelsite->C_TYPE->HrefValue = "";

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->HrefValue = "";

			// C_STATUS
			$t_chuyenmuc_levelsite->C_STATUS->HrefValue = "";

			// C_USER_EDIT
			$t_chuyenmuc_levelsite->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_chuyenmuc_levelsite->C_EDIT_TIME->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_chuyenmuc_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_chuyenmuc_levelsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_chuyenmuc_levelsite;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_chuyenmuc_levelsite->C_NAME->FormValue) && $t_chuyenmuc_levelsite->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_chuyenmuc_levelsite->C_NAME->FldCaption();
		}
		if (!is_null($t_chuyenmuc_levelsite->C_TYPE->FormValue) && $t_chuyenmuc_levelsite->C_TYPE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_chuyenmuc_levelsite->C_TYPE->FldCaption();
		}
		if (!ew_CheckInteger($t_chuyenmuc_levelsite->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_chuyenmuc_levelsite->C_ORDER->FldErrMsg();
		}
		if (!is_null($t_chuyenmuc_levelsite->C_STATUS->FormValue) && $t_chuyenmuc_levelsite->C_STATUS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_chuyenmuc_levelsite->C_STATUS->FldCaption();
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
		global $conn, $Security, $Language, $t_chuyenmuc_levelsite;
		$sFilter = $t_chuyenmuc_levelsite->KeyFilter();
		$t_chuyenmuc_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_chuyenmuc_levelsite->SQL();
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
			$t_chuyenmuc_levelsite->C_NAME->SetDbValueDef($rsnew, $t_chuyenmuc_levelsite->C_NAME->CurrentValue, NULL, FALSE);

			// C_TYPE
			$t_chuyenmuc_levelsite->C_TYPE->SetDbValueDef($rsnew, $t_chuyenmuc_levelsite->C_TYPE->CurrentValue, NULL, FALSE);

			// C_ORDER
			$t_chuyenmuc_levelsite->C_ORDER->SetDbValueDef($rsnew, $t_chuyenmuc_levelsite->C_ORDER->CurrentValue, NULL, FALSE);

			// C_STATUS
			$t_chuyenmuc_levelsite->C_STATUS->SetDbValueDef($rsnew, $t_chuyenmuc_levelsite->C_STATUS->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_chuyenmuc_levelsite->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_chuyenmuc_levelsite->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_chuyenmuc_levelsite->C_EDIT_TIME->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_chuyenmuc_levelsite->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_chuyenmuc_levelsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_chuyenmuc_levelsite->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_chuyenmuc_levelsite->CancelMessage <> "") {
					$this->setMessage($t_chuyenmuc_levelsite->CancelMessage);
					$t_chuyenmuc_levelsite->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_chuyenmuc_levelsite->Row_Updated($rsold, $rsnew);
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
