<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_doanhnghiepinfo.php" ?>
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
$t_doituong_doanhnghiep_edit = new ct_doituong_doanhnghiep_edit();
$Page =& $t_doituong_doanhnghiep_edit;

// Page init
$t_doituong_doanhnghiep_edit->Page_Init();

// Page main
$t_doituong_doanhnghiep_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_doanhnghiep_edit = new ew_Page("t_doituong_doanhnghiep_edit");

// page properties
t_doituong_doanhnghiep_edit.PageID = "edit"; // page ID
t_doituong_doanhnghiep_edit.FormID = "ft_doituong_doanhnghiepedit"; // form ID
var EW_PAGE_ID = t_doituong_doanhnghiep_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_doituong_doanhnghiep_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_doanhnghiep->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TYPE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_doanhnghiep->C_TYPE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_doanhnghiep->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_doituong_doanhnghiep->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_doanhnghiep->C_ACTIVE->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_doituong_doanhnghiep_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_doanhnghiep_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_doanhnghiep_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_doanhnghiep_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
        $("input:radio[name=x_C_TYPE]").click(function() {
            var value = $(this).val();
            if (value ==2) 
            {
                $("#x_C_URL").show();
 
            }
            else
            {
                $("#x_C_URL").hide();
   
            }    
        });
});
</script> 
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_doituong_doanhnghiep->TableCaption() ?><br><br>
<a href="<?php echo $t_doituong_doanhnghiep->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_doanhnghiep_edit->ShowMessage();
?>
<form name="ft_doituong_doanhnghiepedit" id="ft_doituong_doanhnghiepedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_doituong_doanhnghiep_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_doituong_doanhnghiep">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_doituong_doanhnghiep->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_doituong_doanhnghiep->C_NAME->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_doituong_doanhnghiep->C_NAME->EditValue ?>"<?php echo $t_doituong_doanhnghiep->C_NAME->EditAttributes() ?>>
</span><?php echo $t_doituong_doanhnghiep->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_TYPE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_TYPE->CellAttributes() ?>><span id="el_C_TYPE">
<div id="tp_x_C_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_doanhnghiep->C_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_doanhnghiep->C_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_doanhnghiep->C_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_doanhnghiep->C_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_doanhnghiep->C_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_doanhnghiep->C_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_doanhnghiep->C_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_URL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_URL->CellAttributes() ?>><span id="el_C_URL">
<input type="text" name="x_C_URL" id="x_C_URL" title="<?php echo $t_doituong_doanhnghiep->C_URL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_doituong_doanhnghiep->C_URL->EditValue ?>"<?php echo $t_doituong_doanhnghiep->C_URL->EditAttributes() ?>>
</span><?php echo $t_doituong_doanhnghiep->C_URL->CustomMsg ?>
       <i>(* Định dạng của url: http://abc.com)</i>             
                </td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_doituong_doanhnghiep->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_doituong_doanhnghiep->C_ORDER->EditValue ?>"<?php echo $t_doituong_doanhnghiep->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_doituong_doanhnghiep->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_ACTIVE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_doanhnghiep->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_doanhnghiep->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_doanhnghiep->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_doanhnghiep->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_doanhnghiep->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_doanhnghiep->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_DTDOANHNGHIEP_ID" id="x_DTDOANHNGHIEP_ID" value="<?php echo ew_HtmlEncode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue) ?>">
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
$t_doituong_doanhnghiep_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_doanhnghiep_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_doituong_doanhnghiep';

	// Page object name
	var $PageObjName = 't_doituong_doanhnghiep_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_doanhnghiep->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_doanhnghiep->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_doanhnghiep->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_doanhnghiep_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_doanhnghiep)
		$GLOBALS["t_doituong_doanhnghiep"] = new ct_doituong_doanhnghiep();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_doanhnghiep', TRUE);

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
		global $t_doituong_doanhnghiep;

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
			$this->Page_Terminate("t_doituong_doanhnghieplist.php");
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
		global $objForm, $Language, $gsFormError, $t_doituong_doanhnghiep;

		// Load key from QueryString
		if (@$_GET["DTDOANHNGHIEP_ID"] <> "")
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setQueryStringValue($_GET["DTDOANHNGHIEP_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_doituong_doanhnghiep->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_doituong_doanhnghiep->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_doituong_doanhnghiep->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_doituong_doanhnghiep->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue == "")
			$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // Invalid key, return to list
		switch ($t_doituong_doanhnghiep->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_doituong_doanhnghiep->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_doituong_doanhnghiep->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_doituong_doanhnghiepview.php")
						$sReturnUrl = $t_doituong_doanhnghiep->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_doituong_doanhnghiep->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_doituong_doanhnghiep->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_doituong_doanhnghiep;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_doituong_doanhnghiep;
		$t_doituong_doanhnghiep->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_doituong_doanhnghiep->C_BELONGTO->setFormValue($objForm->GetValue("x_C_BELONGTO"));
		$t_doituong_doanhnghiep->C_TYPE->setFormValue($objForm->GetValue("x_C_TYPE"));
		$t_doituong_doanhnghiep->C_URL->setFormValue($objForm->GetValue("x_C_URL"));
		$t_doituong_doanhnghiep->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_doituong_doanhnghiep->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_doituong_doanhnghiep->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_doituong_doanhnghiep->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue, 7);
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setFormValue($objForm->GetValue("x_DTDOANHNGHIEP_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_doituong_doanhnghiep;
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue = $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->FormValue;
		$this->LoadRow();
		$t_doituong_doanhnghiep->C_NAME->CurrentValue = $t_doituong_doanhnghiep->C_NAME->FormValue;
		$t_doituong_doanhnghiep->C_BELONGTO->CurrentValue = $t_doituong_doanhnghiep->C_BELONGTO->FormValue;
		$t_doituong_doanhnghiep->C_TYPE->CurrentValue = $t_doituong_doanhnghiep->C_TYPE->FormValue;
		$t_doituong_doanhnghiep->C_URL->CurrentValue = $t_doituong_doanhnghiep->C_URL->FormValue;
		$t_doituong_doanhnghiep->C_ORDER->CurrentValue = $t_doituong_doanhnghiep->C_ORDER->FormValue;
		$t_doituong_doanhnghiep->C_ACTIVE->CurrentValue = $t_doituong_doanhnghiep->C_ACTIVE->FormValue;
		$t_doituong_doanhnghiep->C_USER_EDIT->CurrentValue = $t_doituong_doanhnghiep->C_USER_EDIT->FormValue;
		$t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue = $t_doituong_doanhnghiep->C_EDIT_TIME->FormValue;
		$t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_doanhnghiep;
		$sFilter = $t_doituong_doanhnghiep->KeyFilter();

		// Call Row Selecting event
		$t_doituong_doanhnghiep->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_doanhnghiep->CurrentFilter = $sFilter;
		$sSql = $t_doituong_doanhnghiep->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_doanhnghiep->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_doanhnghiep;
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setDbValue($rs->fields('DTDOANHNGHIEP_ID'));
		$t_doituong_doanhnghiep->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_doanhnghiep->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_doituong_doanhnghiep->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_doanhnghiep->C_URL->setDbValue($rs->fields('C_URL'));
		$t_doituong_doanhnghiep->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_doituong_doanhnghiep->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_doituong_doanhnghiep->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_doanhnghiep->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_doituong_doanhnghiep->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_doanhnghiep->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_doituong_doanhnghiep->C_FK_CONGTY->setDbValue($rs->fields('C_FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_doanhnghiep;

		// Initialize URLs
		// Call Row_Rendering event

		$t_doituong_doanhnghiep->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_doituong_doanhnghiep->C_NAME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_NAME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_NAME->CellAttrs = array(); $t_doituong_doanhnghiep->C_NAME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_NAME->EditAttrs = array();

		// C_BELONGTO
		$t_doituong_doanhnghiep->C_BELONGTO->CellCssStyle = ""; $t_doituong_doanhnghiep->C_BELONGTO->CellCssClass = "";
		$t_doituong_doanhnghiep->C_BELONGTO->CellAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->ViewAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->EditAttrs = array();

		// C_TYPE
		$t_doituong_doanhnghiep->C_TYPE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_TYPE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_TYPE->CellAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->EditAttrs = array();

		// C_URL
		$t_doituong_doanhnghiep->C_URL->CellCssStyle = ""; $t_doituong_doanhnghiep->C_URL->CellCssClass = "";
		$t_doituong_doanhnghiep->C_URL->CellAttrs = array(); $t_doituong_doanhnghiep->C_URL->ViewAttrs = array(); $t_doituong_doanhnghiep->C_URL->EditAttrs = array();

		// C_ORDER
		$t_doituong_doanhnghiep->C_ORDER->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ORDER->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ORDER->CellAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_doituong_doanhnghiep->C_ACTIVE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ACTIVE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ACTIVE->CellAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->EditAttrs = array();

		// C_USER_EDIT
		$t_doituong_doanhnghiep->C_USER_EDIT->CellCssStyle = ""; $t_doituong_doanhnghiep->C_USER_EDIT->CellCssClass = "";
		$t_doituong_doanhnghiep->C_USER_EDIT->CellAttrs = array(); $t_doituong_doanhnghiep->C_USER_EDIT->ViewAttrs = array(); $t_doituong_doanhnghiep->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_doituong_doanhnghiep->C_EDIT_TIME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_EDIT_TIME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_EDIT_TIME->CellAttrs = array(); $t_doituong_doanhnghiep->C_EDIT_TIME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_EDIT_TIME->EditAttrs = array();
		if ($t_doituong_doanhnghiep->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->ViewValue = $t_doituong_doanhnghiep->C_NAME->CurrentValue;
			$t_doituong_doanhnghiep->C_NAME->CssStyle = "";
			$t_doituong_doanhnghiep->C_NAME->CssClass = "";
			$t_doituong_doanhnghiep->C_NAME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
			if (strval($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_BELONGTO->CssStyle = "";
			$t_doituong_doanhnghiep->C_BELONGTO->CssClass = "";
			$t_doituong_doanhnghiep->C_BELONGTO->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_doanhnghiep->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc 1 bai viet";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc list he thong ";
						break;
					case "2":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc url lien ket";
						break;
					default:
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = $t_doituong_doanhnghiep->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_TYPE->CssStyle = "";
			$t_doituong_doanhnghiep->C_TYPE->CssClass = "";
			$t_doituong_doanhnghiep->C_TYPE->ViewCustomAttributes = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->ViewValue = $t_doituong_doanhnghiep->C_URL->CurrentValue;
			$t_doituong_doanhnghiep->C_URL->CssStyle = "";
			$t_doituong_doanhnghiep->C_URL->CssClass = "";
			$t_doituong_doanhnghiep->C_URL->ViewCustomAttributes = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->ViewValue = $t_doituong_doanhnghiep->C_ORDER->CurrentValue;
			$t_doituong_doanhnghiep->C_ORDER->CssStyle = "";
			$t_doituong_doanhnghiep->C_ORDER->CssClass = "";
			$t_doituong_doanhnghiep->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "kich hoat";
						break;
					default:
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = $t_doituong_doanhnghiep->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_ACTIVE->CssStyle = "";
			$t_doituong_doanhnghiep->C_ACTIVE->CssClass = "";
			$t_doituong_doanhnghiep->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_doanhnghiep->C_USER_ADD->ViewValue = $t_doituong_doanhnghiep->C_USER_ADD->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_ADD->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_ADD->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = $t_doituong_doanhnghiep->C_ADD_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_ADD_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_ADD_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewValue = $t_doituong_doanhnghiep->C_USER_EDIT->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_EDIT->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = $t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_FK_CONGTY
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewValue = $t_doituong_doanhnghiep->C_FK_CONGTY->CurrentValue;
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssStyle = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssClass = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->HrefValue = "";
			$t_doituong_doanhnghiep->C_NAME->TooltipValue = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->HrefValue = "";
			$t_doituong_doanhnghiep->C_BELONGTO->TooltipValue = "";

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->HrefValue = "";
			$t_doituong_doanhnghiep->C_TYPE->TooltipValue = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->HrefValue = "";
			$t_doituong_doanhnghiep->C_URL->TooltipValue = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->HrefValue = "";
			$t_doituong_doanhnghiep->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->HrefValue = "";
			$t_doituong_doanhnghiep->C_ACTIVE->TooltipValue = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->HrefValue = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->HrefValue = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_doituong_doanhnghiep->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->EditCustomAttributes = "";
			$t_doituong_doanhnghiep->C_NAME->EditValue = ew_HtmlEncode($t_doituong_doanhnghiep->C_NAME->CurrentValue);

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->EditCustomAttributes = "";
			$t_doituong_doanhnghiep->C_BELONGTO->EditValue = ew_HtmlEncode($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue);
			if (strval($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_doituong_doanhnghiep->C_BELONGTO->EditValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_doituong_doanhnghiep->C_BELONGTO->EditValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_BELONGTO->EditValue = NULL;
			}

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "danh muc 1 bai viet");
			$arwrk[] = array("1", "danh muc list he thong ");
			$arwrk[] = array("2", "danh muc url lien ket");
			$t_doituong_doanhnghiep->C_TYPE->EditValue = $arwrk;

			// C_URL
			$t_doituong_doanhnghiep->C_URL->EditCustomAttributes = "";
			$t_doituong_doanhnghiep->C_URL->EditValue = ew_HtmlEncode($t_doituong_doanhnghiep->C_URL->CurrentValue);

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->EditCustomAttributes = "";
			$t_doituong_doanhnghiep->C_ORDER->EditValue = ew_HtmlEncode($t_doituong_doanhnghiep->C_ORDER->CurrentValue);

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong kich hoat");
			$arwrk[] = array("1", "kich hoat");
			$t_doituong_doanhnghiep->C_ACTIVE->EditValue = $arwrk;

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// C_NAME

			$t_doituong_doanhnghiep->C_NAME->HrefValue = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->HrefValue = "";

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->HrefValue = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->HrefValue = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->HrefValue = "";

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->HrefValue = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_doituong_doanhnghiep->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_doanhnghiep->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_doituong_doanhnghiep;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_doituong_doanhnghiep->C_NAME->FormValue) && $t_doituong_doanhnghiep->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_doanhnghiep->C_NAME->FldCaption();
		}
		if (!ew_CheckInteger($t_doituong_doanhnghiep->C_BELONGTO->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_doituong_doanhnghiep->C_BELONGTO->FldErrMsg();
		}
		if ($t_doituong_doanhnghiep->C_TYPE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_doanhnghiep->C_TYPE->FldCaption();
		}
		 if ($t_doituong_doanhnghiep->C_TYPE->FormValue == "2") {
                        if (!is_null($t_doituong_doanhnghiep->C_URL->FormValue) && $t_doituong_doanhnghiep->C_URL->FormValue == "") {
                                $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                                $gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_doanhnghiep->C_URL->FldCaption();
                        }
                        if (!filter_var ($t_doituong_doanhnghiep->C_URL->FormValue,FILTER_VALIDATE_URL))
                        {
                         $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                         $gsFormError .= "Không đúng định dạng url" ;
                        }
                }
		if (!is_null($t_doituong_doanhnghiep->C_ORDER->FormValue) && $t_doituong_doanhnghiep->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_doanhnghiep->C_ORDER->FldCaption();
		}
		if (!ew_CheckInteger($t_doituong_doanhnghiep->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_doituong_doanhnghiep->C_ORDER->FldErrMsg();
		}
		if ($t_doituong_doanhnghiep->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_doanhnghiep->C_ACTIVE->FldCaption();
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
		global $conn, $Security, $Language, $t_doituong_doanhnghiep;
		$sFilter = $t_doituong_doanhnghiep->KeyFilter();
		$t_doituong_doanhnghiep->CurrentFilter = $sFilter;
		$sSql = $t_doituong_doanhnghiep->SQL();
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
			$t_doituong_doanhnghiep->C_NAME->SetDbValueDef($rsnew, $t_doituong_doanhnghiep->C_NAME->CurrentValue, NULL, FALSE);

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->SetDbValueDef($rsnew, $t_doituong_doanhnghiep->C_TYPE->CurrentValue, NULL, FALSE);

			// C_URL
			$t_doituong_doanhnghiep->C_URL->SetDbValueDef($rsnew, $t_doituong_doanhnghiep->C_URL->CurrentValue, NULL, FALSE);

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->SetDbValueDef($rsnew, $t_doituong_doanhnghiep->C_ORDER->CurrentValue, NULL, FALSE);

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->SetDbValueDef($rsnew, $t_doituong_doanhnghiep->C_ACTIVE->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_doituong_doanhnghiep->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_doituong_doanhnghiep->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_doituong_doanhnghiep->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_doituong_doanhnghiep->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_doituong_doanhnghiep->CancelMessage <> "") {
					$this->setMessage($t_doituong_doanhnghiep->CancelMessage);
					$t_doituong_doanhnghiep->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_doituong_doanhnghiep->Row_Updated($rsold, $rsnew);
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
