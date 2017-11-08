<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "adodb" . EW_PATH_DELIMITER . "adodb.inc.php" ?>
<?php include "phpfn7.php" ?>
<?php include "NhatKyGDinfo.php" ?>
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
$NhatKyGD_edit = new cNhatKyGD_edit();
$Page =& $NhatKyGD_edit;

// Page init
$NhatKyGD_edit->Page_Init();

// Page main
$NhatKyGD_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var NhatKyGD_edit = new ew_Page("NhatKyGD_edit");

// page properties
NhatKyGD_edit.PageID = "edit"; // page ID
NhatKyGD_edit.FormID = "fNhatKyGDedit"; // form ID
var EW_PAGE_ID = NhatKyGD_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
NhatKyGD_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_NgayThangNhatKy"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($NhatKyGD->NgayThangNhatKy->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_NgayThangNhatKy"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($NhatKyGD->NgayThangNhatKy->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_WeekOfYear"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($NhatKyGD->WeekOfYear->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_LopID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($NhatKyGD->LopID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_NhatKyGDBC"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($NhatKyGD->NhatKyGDBC->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
NhatKyGD_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
NhatKyGD_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
NhatKyGD_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
NhatKyGD_edit.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker"><h4 class="h2title"><?php echo $NhatKyGD->TableCaption() ?> </h4>
<a href="<?php echo $NhatKyGD->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$NhatKyGD_edit->ShowMessage();
?>
<form name="fNhatKyGDedit" id="fNhatKyGDedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return NhatKyGD_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="NhatKyGD">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($NhatKyGD->NgayThangNhatKy->Visible) { // NgayThangNhatKy ?>
	<tr<?php echo $NhatKyGD->NgayThangNhatKy->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NgayThangNhatKy->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $NhatKyGD->NgayThangNhatKy->CellAttributes() ?>><span id="el_NgayThangNhatKy">
<input type="text" name="x_NgayThangNhatKy" id="x_NgayThangNhatKy" title="<?php echo $NhatKyGD->NgayThangNhatKy->FldTitle() ?>" value="<?php echo $NhatKyGD->NgayThangNhatKy->EditValue ?>"<?php echo $NhatKyGD->NgayThangNhatKy->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_STAR" name="cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_NgayThangNhatKy", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_STAR" // button id
});
</script>
</span><?php echo $NhatKyGD->NgayThangNhatKy->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($NhatKyGD->LopID->Visible) { // LopID ?>
	<tr<?php echo $NhatKyGD->LopID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->LopID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $NhatKyGD->LopID->CellAttributes() ?>><span id="el_LopID">
<select id="x_LopID" name="x_LopID" title="<?php echo $NhatKyGD->LopID->FldTitle() ?>"<?php echo $NhatKyGD->LopID->EditAttributes() ?>>
<?php
if (is_array($NhatKyGD->LopID->EditValue)) {
	$arwrk = $NhatKyGD->LopID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($_SESSION['LopID']) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $NhatKyGD->LopID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->NhatKyGDBS->Visible) { // NhatKyGDBS ?>
	<tr<?php echo $NhatKyGD->NhatKyGDBS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NhatKyGDBS->FldCaption() ?> <?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $NhatKyGD->NhatKyGDBS->CellAttributes() ?>><span id="el_NhatKyGDBS">
<textarea name="x_NhatKyGDBS" id="x_NhatKyGDBS" title="<?php echo $NhatKyGD->NhatKyGDBS->FldTitle() ?>" cols="80" rows="2"<?php echo $NhatKyGD->NhatKyGDBS->EditAttributes() ?>><?php echo $NhatKyGD->NhatKyGDBS->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_NhatKyGDBS", function() {
	var oCKeditor = CKEDITOR.replace('x_NhatKyGDBS', { width: 40*_width_multiplier, height: 2*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $NhatKyGD->NhatKyGDBS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($NhatKyGD->NhatKyGDBC->Visible) { // NhatKyGDBC ?>
	<tr<?php echo $NhatKyGD->NhatKyGDBC->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $NhatKyGD->NhatKyGDBC->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $NhatKyGD->NhatKyGDBC->CellAttributes() ?>><span id="el_NhatKyGDBC">
<textarea name="x_NhatKyGDBC" id="x_NhatKyGDBC" title="<?php echo $NhatKyGD->NhatKyGDBC->FldTitle() ?>" cols="80" rows="2"<?php echo $NhatKyGD->NhatKyGDBC->EditAttributes() ?>><?php echo $NhatKyGD->NhatKyGDBC->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_NhatKyGDBC", function() {
	var oCKeditor = CKEDITOR.replace('x_NhatKyGDBC', { width: 40*_width_multiplier, height: 2*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $NhatKyGD->NhatKyGDBC->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
</div>
</td></tr></table>
<input type="hidden" name="x_NhatKyGDID" id="x_NhatKyGDID" value="<?php echo ew_HtmlEncode($NhatKyGD->NhatKyGDID->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
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
$NhatKyGD_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cNhatKyGD_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'NhatKyGD';

	// Page object name
	var $PageObjName = 'NhatKyGD_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) $PageUrl .= "t=" . $NhatKyGD->TableVar . "&"; // Add page token
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
		global $objForm, $NhatKyGD;
		if ($NhatKyGD->UseTokenInUrl) {
			if ($objForm)
				return ($NhatKyGD->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($NhatKyGD->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cNhatKyGD_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (NhatKyGD)
		$GLOBALS["NhatKyGD"] = new cNhatKyGD();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'NhatKyGD', TRUE);

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
		global $NhatKyGD;

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
		global $objForm, $Language, $gsFormError, $NhatKyGD;

		// Load key from QueryString
		if (@$_GET["NhatKyGDID"] <> "")
			$NhatKyGD->NhatKyGDID->setQueryStringValue($_GET["NhatKyGDID"]);
		if (@$_POST["a_edit"] <> "") {
			$NhatKyGD->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$NhatKyGD->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$NhatKyGD->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$NhatKyGD->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($NhatKyGD->NhatKyGDID->CurrentValue == "")
			$this->Page_Terminate("NhatKyGDlist.php"); // Invalid key, return to list
		switch ($NhatKyGD->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("NhatKyGDlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$NhatKyGD->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $NhatKyGD->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "NhatKyGDview.php")
						$sReturnUrl = $NhatKyGD->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$NhatKyGD->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$NhatKyGD->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $NhatKyGD;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $NhatKyGD;
		$NhatKyGD->NgayThangNhatKy->setFormValue($objForm->GetValue("x_NgayThangNhatKy"));
		$NhatKyGD->NgayThangNhatKy->CurrentValue = ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->CurrentValue, 7);
		$NhatKyGD->WeekOfYear->setFormValue($objForm->GetValue("x_WeekOfYear"));
		$NhatKyGD->LopID->setFormValue($objForm->GetValue("x_LopID"));
		$NhatKyGD->NhatKyGDBS->setFormValue($objForm->GetValue("x_NhatKyGDBS"));
		$NhatKyGD->NhatKyGDBC->setFormValue($objForm->GetValue("x_NhatKyGDBC"));
		$NhatKyGD->NhatKyGDID->setFormValue($objForm->GetValue("x_NhatKyGDID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $NhatKyGD;
		$NhatKyGD->NhatKyGDID->CurrentValue = $NhatKyGD->NhatKyGDID->FormValue;
		$this->LoadRow();
		$NhatKyGD->NgayThangNhatKy->CurrentValue = $NhatKyGD->NgayThangNhatKy->FormValue;
		$NhatKyGD->NgayThangNhatKy->CurrentValue = ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->CurrentValue, 7);
		$NhatKyGD->WeekOfYear->CurrentValue = $NhatKyGD->WeekOfYear->FormValue;
		$NhatKyGD->LopID->CurrentValue = $NhatKyGD->LopID->FormValue;
		$NhatKyGD->NhatKyGDBS->CurrentValue = $NhatKyGD->NhatKyGDBS->FormValue;
		$NhatKyGD->NhatKyGDBC->CurrentValue = $NhatKyGD->NhatKyGDBC->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $NhatKyGD;
		$sFilter = $NhatKyGD->KeyFilter();

		// Call Row Selecting event
		$NhatKyGD->Row_Selecting($sFilter);

		// Load SQL based on filter
		$NhatKyGD->CurrentFilter = $sFilter;
		$sSql = $NhatKyGD->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$NhatKyGD->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $NhatKyGD;
		$NhatKyGD->NhatKyGDID->setDbValue($rs->fields('NhatKyGDID'));
		$NhatKyGD->NgayThangNhatKy->setDbValue($rs->fields('NgayThangNhatKy'));
		$NhatKyGD->WeekOfYear->setDbValue($rs->fields('WeekOfYear'));
		$NhatKyGD->LopID->setDbValue($rs->fields('LopID'));
		$NhatKyGD->NhatKyGDBS->setDbValue($rs->fields('NhatKyGDBS'));
		$NhatKyGD->NhatKyGDBC->setDbValue($rs->fields('NhatKyGDBC'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $NhatKyGD;

		// Initialize URLs
		// Call Row_Rendering event

		$NhatKyGD->Row_Rendering();

		// Common render codes for all row types
		// NgayThangNhatKy

		$NhatKyGD->NgayThangNhatKy->CellCssStyle = ""; $NhatKyGD->NgayThangNhatKy->CellCssClass = "";
		$NhatKyGD->NgayThangNhatKy->CellAttrs = array(); $NhatKyGD->NgayThangNhatKy->ViewAttrs = array(); $NhatKyGD->NgayThangNhatKy->EditAttrs = array();

		// WeekOfYear
		$NhatKyGD->WeekOfYear->CellCssStyle = ""; $NhatKyGD->WeekOfYear->CellCssClass = "";
		$NhatKyGD->WeekOfYear->CellAttrs = array(); $NhatKyGD->WeekOfYear->ViewAttrs = array(); $NhatKyGD->WeekOfYear->EditAttrs = array();

		// LopID
		$NhatKyGD->LopID->CellCssStyle = ""; $NhatKyGD->LopID->CellCssClass = "";
		$NhatKyGD->LopID->CellAttrs = array(); $NhatKyGD->LopID->ViewAttrs = array(); $NhatKyGD->LopID->EditAttrs = array();

		// NhatKyGDBS
		$NhatKyGD->NhatKyGDBS->CellCssStyle = ""; $NhatKyGD->NhatKyGDBS->CellCssClass = "";
		$NhatKyGD->NhatKyGDBS->CellAttrs = array(); $NhatKyGD->NhatKyGDBS->ViewAttrs = array(); $NhatKyGD->NhatKyGDBS->EditAttrs = array();

		// NhatKyGDBC
		$NhatKyGD->NhatKyGDBC->CellCssStyle = ""; $NhatKyGD->NhatKyGDBC->CellCssClass = "";
		$NhatKyGD->NhatKyGDBC->CellAttrs = array(); $NhatKyGD->NhatKyGDBC->ViewAttrs = array(); $NhatKyGD->NhatKyGDBC->EditAttrs = array();
		if ($NhatKyGD->RowType == EW_ROWTYPE_VIEW) { // View row

			// NhatKyGDID
			$NhatKyGD->NhatKyGDID->ViewValue = $NhatKyGD->NhatKyGDID->CurrentValue;
			$NhatKyGD->NhatKyGDID->CssStyle = "";
			$NhatKyGD->NhatKyGDID->CssClass = "";
			$NhatKyGD->NhatKyGDID->ViewCustomAttributes = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->ViewValue = $NhatKyGD->NgayThangNhatKy->CurrentValue;
			$NhatKyGD->NgayThangNhatKy->ViewValue = ew_FormatDateTime($NhatKyGD->NgayThangNhatKy->ViewValue, 7);
			$NhatKyGD->NgayThangNhatKy->CssStyle = "";
			$NhatKyGD->NgayThangNhatKy->CssClass = "";
			$NhatKyGD->NgayThangNhatKy->ViewCustomAttributes = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->ViewValue = $NhatKyGD->WeekOfYear->CurrentValue;
			$NhatKyGD->WeekOfYear->CssStyle = "";
			$NhatKyGD->WeekOfYear->CssClass = "";
			$NhatKyGD->WeekOfYear->ViewCustomAttributes = "";

			// LopID
			if (strval($NhatKyGD->LopID->CurrentValue) <> "") {
				$sFilterWrk = "[LopID] = " . ew_AdjustSql($NhatKyGD->LopID->CurrentValue) . "";
			$sSqlWrk = "SELECT [MaSoLop] FROM [DMLop]";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$NhatKyGD->LopID->ViewValue = $rswrk->fields('MaSoLop');
					$rswrk->Close();
				} else {
					$NhatKyGD->LopID->ViewValue = $NhatKyGD->LopID->CurrentValue;
				}
			} else {
				$NhatKyGD->LopID->ViewValue = NULL;
			}
			$NhatKyGD->LopID->CssStyle = "";
			$NhatKyGD->LopID->CssClass = "";
			$NhatKyGD->LopID->ViewCustomAttributes = "";

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->ViewValue = $NhatKyGD->NhatKyGDBS->CurrentValue;
			$NhatKyGD->NhatKyGDBS->CssStyle = "";
			$NhatKyGD->NhatKyGDBS->CssClass = "";
			$NhatKyGD->NhatKyGDBS->ViewCustomAttributes = "";

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->ViewValue = $NhatKyGD->NhatKyGDBC->CurrentValue;
			$NhatKyGD->NhatKyGDBC->CssStyle = "";
			$NhatKyGD->NhatKyGDBC->CssClass = "";
			$NhatKyGD->NhatKyGDBC->ViewCustomAttributes = "";

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->HrefValue = "";
			$NhatKyGD->NgayThangNhatKy->TooltipValue = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->HrefValue = "";
			$NhatKyGD->WeekOfYear->TooltipValue = "";

			// LopID
			$NhatKyGD->LopID->HrefValue = "";
			$NhatKyGD->LopID->TooltipValue = "";

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->HrefValue = "";
			$NhatKyGD->NhatKyGDBS->TooltipValue = "";

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->HrefValue = "";
			$NhatKyGD->NhatKyGDBC->TooltipValue = "";
		} elseif ($NhatKyGD->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->EditCustomAttributes = "";
			$NhatKyGD->NgayThangNhatKy->EditValue = ew_HtmlEncode(ew_FormatDateTime($NhatKyGD->NgayThangNhatKy->CurrentValue, 7));

			// WeekOfYear
			$NhatKyGD->WeekOfYear->EditCustomAttributes = "";
			$NhatKyGD->WeekOfYear->EditValue = ew_HtmlEncode($NhatKyGD->WeekOfYear->CurrentValue);

			// LopID
			$NhatKyGD->LopID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT [LopID], [MaSoLop], '' AS Disp2Fld, '' AS SelectFilterFld FROM [DMLop]";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$NhatKyGD->LopID->EditValue = $arwrk;

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->EditCustomAttributes = "";
			$NhatKyGD->NhatKyGDBS->EditValue = ew_HtmlEncode($NhatKyGD->NhatKyGDBS->CurrentValue);

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->EditCustomAttributes = "";
			$NhatKyGD->NhatKyGDBC->EditValue = ew_HtmlEncode($NhatKyGD->NhatKyGDBC->CurrentValue);

			// Edit refer script
			// NgayThangNhatKy

			$NhatKyGD->NgayThangNhatKy->HrefValue = "";

			// WeekOfYear
			$NhatKyGD->WeekOfYear->HrefValue = "";

			// LopID
			$NhatKyGD->LopID->HrefValue = "";

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->HrefValue = "";

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->HrefValue = "";
		}

		// Call Row Rendered event
		if ($NhatKyGD->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$NhatKyGD->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $NhatKyGD;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($NhatKyGD->NgayThangNhatKy->FormValue) && $NhatKyGD->NgayThangNhatKy->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $NhatKyGD->NgayThangNhatKy->FldCaption();
		}
		if (!ew_CheckEuroDate($NhatKyGD->NgayThangNhatKy->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $NhatKyGD->NgayThangNhatKy->FldErrMsg();
		}
		if (!ew_CheckInteger($NhatKyGD->WeekOfYear->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $NhatKyGD->WeekOfYear->FldErrMsg();
		}
		if (!is_null($NhatKyGD->LopID->FormValue) && $NhatKyGD->LopID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $NhatKyGD->LopID->FldCaption();
		}
		if (!is_null($NhatKyGD->NhatKyGDBC->FormValue) && $NhatKyGD->NhatKyGDBC->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $NhatKyGD->NhatKyGDBC->FldCaption();
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
		global $conn, $Security, $Language, $NhatKyGD;
		$sFilter = $NhatKyGD->KeyFilter();
		$NhatKyGD->CurrentFilter = $sFilter;
		$sSql = $NhatKyGD->SQL();
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

			// NgayThangNhatKy
			$NhatKyGD->NgayThangNhatKy->SetDbValueDef($rsnew, ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->CurrentValue, 7, FALSE), NULL);
                       
                         // Get Week
                        $date =  ew_UnFormatDateTime($NhatKyGD->NgayThangNhatKy->CurrentValue, 7, FALSE);
                        $WeekOfYear =  date('W', strtotime($date));  
                        
                        
			// WeekOfYear
			$NhatKyGD->WeekOfYear->SetDbValueDef($rsnew, $WeekOfYear, NULL, FALSE);

			// LopID
			$NhatKyGD->LopID->SetDbValueDef($rsnew, $NhatKyGD->LopID->CurrentValue, NULL, FALSE);

			// NhatKyGDBS
			$NhatKyGD->NhatKyGDBS->SetDbValueDef($rsnew, $NhatKyGD->NhatKyGDBS->CurrentValue, NULL, FALSE);

			// NhatKyGDBC
			$NhatKyGD->NhatKyGDBC->SetDbValueDef($rsnew, $NhatKyGD->NhatKyGDBC->CurrentValue, NULL, FALSE);

			// Call Row Updating event
			$bUpdateRow = $NhatKyGD->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($NhatKyGD->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($NhatKyGD->CancelMessage <> "") {
					$this->setMessage($NhatKyGD->CancelMessage);
					$NhatKyGD->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$NhatKyGD->Row_Updated($rsold, $rsnew);
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
