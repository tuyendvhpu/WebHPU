<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "footerinfo.php" ?>
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
$footer_edit = new cfooter_edit();
$Page =& $footer_edit;

// Page init
$footer_edit->Page_Init();

// Page main
$footer_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var footer_edit = new ew_Page("footer_edit");

// page properties
footer_edit.PageID = "edit"; // page ID
footer_edit.FormID = "ffooteredit"; // form ID
var EW_PAGE_ID = footer_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
footer_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_content"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($footer->content->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
footer_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
footer_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
footer_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
footer_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 20;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {			
		var inst;			
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];		
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];	
		if (inst)
			inst.focus();
	}
}

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $footer->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $footer->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$footer_edit->ShowMessage();
?>
<form name="ffooteredit" id="ffooteredit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return footer_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="footer">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<?php if ($footer->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($footer->content->Visible) { // content ?>
	<tr<?php echo $footer->content->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $footer->content->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $footer->content->CellAttributes() ?>><span id="el_content">
<?php if ($footer->CurrentAction <> "F") { ?>
<textarea name="x_content" id="x_content" title="<?php echo $footer->content->FldTitle() ?>" cols="35" rows="4"<?php echo $footer->content->EditAttributes() ?>><?php echo $footer->content->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_content", function() {
	var oCKeditor = CKEDITOR.replace('x_content', { width: 40*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
<?php } else { ?>
<div<?php echo $footer->content->ViewAttributes() ?>><?php echo $footer->content->ViewValue ?></div>
<input type="hidden" name="x_content" id="x_content" value="<?php echo ew_HtmlEncode($footer->content->FormValue) ?>">
<?php } ?>
</span><?php echo $footer->content->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_footer_id" id="x_footer_id" value="<?php echo ew_HtmlEncode($footer->footer_id->CurrentValue) ?>">
<p>
<?php if ($footer->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>" onclick="this.form.a_edit.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_edit.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($footer->CurrentAction <> "F") { ?>
<?php } ?>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$footer_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfooter_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'footer';

	// Page object name
	var $PageObjName = 'footer_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $footer;
		if ($footer->UseTokenInUrl) $PageUrl .= "t=" . $footer->TableVar . "&"; // Add page token
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
		global $objForm, $footer;
		if ($footer->UseTokenInUrl) {
			if ($objForm)
				return ($footer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($footer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfooter_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (footer)
		$GLOBALS["footer"] = new cfooter();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'footer', TRUE);

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
		global $footer;

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
			$this->Page_Terminate("footerview.php");
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
		global $objForm, $Language, $gsFormError, $footer;

		// Load key from QueryString
		if (@$_GET["footer_id"] <> "")
			$footer->footer_id->setQueryStringValue($_GET["footer_id"]);
		if (@$_POST["a_edit"] <> "") {
			$footer->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$footer->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$footer->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$footer->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($footer->footer_id->CurrentValue == "")
			$this->Page_Terminate("footerview.php"); // Invalid key, return to list
		switch ($footer->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("footerview.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$footer->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $footer->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "footerview.php")
						$sReturnUrl = $footer->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$footer->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		if ($footer->CurrentAction == "F") { // Confirm page
			$footer->RowType = EW_ROWTYPE_VIEW; // Render as View
		} else {
			$footer->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		}
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $footer;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $footer;
		$footer->content->setFormValue($objForm->GetValue("x_content"));
		$footer->footer_id->setFormValue($objForm->GetValue("x_footer_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $footer;
		$footer->footer_id->CurrentValue = $footer->footer_id->FormValue;
		$this->LoadRow();
		$footer->content->CurrentValue = $footer->content->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $footer;
		$sFilter = $footer->KeyFilter();

		// Call Row Selecting event
		$footer->Row_Selecting($sFilter);

		// Load SQL based on filter
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$footer->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $footer;
		$footer->footer_id->setDbValue($rs->fields('footer_id'));
		$footer->content->setDbValue($rs->fields('content'));
		$footer->f_value->setDbValue($rs->fields('f_value'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $footer;

		// Initialize URLs
		// Call Row_Rendering event

		$footer->Row_Rendering();

		// Common render codes for all row types
		// content

		$footer->content->CellCssStyle = ""; $footer->content->CellCssClass = "";
		$footer->content->CellAttrs = array(); $footer->content->ViewAttrs = array(); $footer->content->EditAttrs = array();
		if ($footer->RowType == EW_ROWTYPE_VIEW) { // View row

			// content
			$footer->content->ViewValue = $footer->content->CurrentValue;
			$footer->content->CssStyle = "";
			$footer->content->CssClass = "";
			$footer->content->ViewCustomAttributes = "";

			// content
			$footer->content->HrefValue = "";
			$footer->content->TooltipValue = "";
		} elseif ($footer->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// content
			$footer->content->EditCustomAttributes = "";
			$footer->content->EditValue = ew_HtmlEncode($footer->content->CurrentValue);

			// Edit refer script
			// content

			$footer->content->HrefValue = "";
		}

		// Call Row Rendered event
		if ($footer->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$footer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $footer;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($footer->content->FormValue) && $footer->content->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $footer->content->FldCaption();
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
		global $conn, $Security, $Language, $footer;
		$sFilter = $footer->KeyFilter();
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
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

			// content
			$footer->content->SetDbValueDef($rsnew, $footer->content->CurrentValue, "", FALSE);

			// Call Row Updating event
			$bUpdateRow = $footer->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($footer->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($footer->CancelMessage <> "") {
					$this->setMessage($footer->CancelMessage);
					$footer->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$footer->Row_Updated($rsold, $rsnew);
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
