<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_htlienquaninfo.php" ?>
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
$t_htlienquan_edit = new ct_htlienquan_edit();
$Page =& $t_htlienquan_edit;

// Page init
$t_htlienquan_edit->Page_Init();

// Page main
$t_htlienquan_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_htlienquan_edit = new ew_Page("t_htlienquan_edit");

// page properties
t_htlienquan_edit.PageID = "edit"; // page ID
t_htlienquan_edit.FormID = "ft_htlienquanedit"; // form ID
var EW_PAGE_ID = t_htlienquan_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_htlienquan_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_FK_OB_ID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_htlienquan->FK_OB_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_NAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_htlienquan->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ICON"];
		aelm = fobj.elements["a" + infix + "_C_ICON"];
		var chk_C_ICON = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_C_ICON && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_htlienquan->C_ICON->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ICON"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, ewLanguage.Phrase("WrongFileType"));
		elm = fobj.elements["x" + infix + "_C_URL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_htlienquan->C_URL->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_htlienquan_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_htlienquan_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_htlienquan_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_htlienquan_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $t_htlienquan->TableCaption() ?></p>
<a href="<?php echo $t_htlienquan->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_htlienquan_edit->ShowMessage();
?>
<form name="ft_htlienquanedit" id="ft_htlienquanedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_htlienquan_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_htlienquan">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_htlienquan->FK_OB_ID->Visible) { // FK_OB_ID ?>
	<tr<?php echo $t_htlienquan->FK_OB_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->FK_OB_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_htlienquan->FK_OB_ID->CellAttributes() ?>><span id="el_FK_OB_ID">
<div id="tp_x_FK_OB_ID" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_FK_OB_ID[]" id="x_FK_OB_ID[]" title="<?php echo $t_htlienquan->FK_OB_ID->FldTitle() ?>" value="{value}"<?php echo $t_htlienquan->FK_OB_ID->EditAttributes() ?>></div>
<div id="dsl_x_FK_OB_ID" repeatcolumn="5">
<?php
$arwrk = $t_htlienquan->FK_OB_ID->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($t_htlienquan->FK_OB_ID->CurrentValue));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = "";
		for ($ari = 0; $ari < count($armultiwrk); $ari++) {
			if (strval($arwrk[$rowcntwrk][0]) == trim(strval($armultiwrk[$ari]))) {
				$selwrk = " checked=\"checked\"";
				if ($selwrk <> "") $emptywrk = FALSE;
				break;
			}
		}

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="checkbox" name="x_FK_OB_ID[]" id="x_FK_OB_ID[]" title="<?php echo $t_htlienquan->FK_OB_ID->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_htlienquan->FK_OB_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_htlienquan->FK_OB_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_htlienquan->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_htlienquan->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_htlienquan->C_NAME->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_htlienquan->C_NAME->EditValue ?>"<?php echo $t_htlienquan->C_NAME->EditAttributes() ?>>
</span><?php echo $t_htlienquan->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_ICON->Visible) { // C_ICON ?>
	<tr<?php echo $t_htlienquan->C_ICON->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_ICON->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_htlienquan->C_ICON->CellAttributes() ?>><span id="el_C_ICON">
<div id="old_x_C_ICON">
<?php if ($t_htlienquan->C_ICON->HrefValue <> "" || $t_htlienquan->C_ICON->TooltipValue <> "") { ?>
<?php if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) { ?>
<a href="<?php echo $t_htlienquan->C_ICON->HrefValue ?>" target="_blank"><img src="t_htlienquan_C_ICON_bv.php?SYS_ID=<?php echo $t_htlienquan->SYS_ID->CurrentValue ?>" border=0<?php echo $t_htlienquan->C_ICON->ViewAttributes() ?>></a>
<?php } elseif (!in_array($t_htlienquan->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) { ?>
<img src="t_htlienquan_C_ICON_bv.php?SYS_ID=<?php echo $t_htlienquan->SYS_ID->CurrentValue ?>" border=0<?php echo $t_htlienquan->C_ICON->ViewAttributes() ?>>
<?php } elseif (!in_array($t_htlienquan->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_C_ICON">
<?php if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) { ?>
<label><input type="radio" name="a_C_ICON" id="a_C_ICON" value="1" checked="checked"><?php echo $Language->Phrase("Keep") ?></label>&nbsp;
<label><input type="radio" name="a_C_ICON" id="a_C_ICON" value="2" disabled="disabled"><?php echo $Language->Phrase("Remove") ?></label>&nbsp;
<label><input type="radio" name="a_C_ICON" id="a_C_ICON" value="3"><?php echo $Language->Phrase("Replace") ?><br></label>
<?php $t_htlienquan->C_ICON->EditAttrs["onchange"] = "this.form.a_C_ICON[2].checked=true;" . @$t_htlienquan->C_ICON->EditAttrs["onchange"]; ?>
<?php } else { ?>
<input type="hidden" name="a_C_ICON" id="a_C_ICON" value="3">
<?php } ?>
<input type="file" name="x_C_ICON" id="x_C_ICON" title="<?php echo $t_htlienquan->C_ICON->FldTitle() ?>" size="30"<?php echo $t_htlienquan->C_ICON->EditAttributes() ?>>
</div>
</span><?php echo $t_htlienquan->C_ICON->CustomMsg ?>
        <i>(* Icon định dạng 15px * 15px)</i>              
                </td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_htlienquan->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_URL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_htlienquan->C_URL->CellAttributes() ?>><span id="el_C_URL">
<input type="text" name="x_C_URL" id="x_C_URL" title="<?php echo $t_htlienquan->C_URL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_htlienquan->C_URL->EditValue ?>"<?php echo $t_htlienquan->C_URL->EditAttributes() ?>>
</span><?php echo $t_htlienquan->C_URL->CustomMsg ?>
          <i>(* Định dang url: http://abc.com)</i>           
                </td>
	</tr>
<?php } ?>
<?php if ($t_htlienquan->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_htlienquan->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_htlienquan->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_htlienquan->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_htlienquan->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_htlienquan->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_htlienquan->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_htlienquan->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_htlienquan->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_htlienquan->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_htlienquan->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_SYS_ID" id="x_SYS_ID" value="<?php echo ew_HtmlEncode($t_htlienquan->SYS_ID->CurrentValue) ?>">
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
$t_htlienquan_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_htlienquan_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_htlienquan';

	// Page object name
	var $PageObjName = 't_htlienquan_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) $PageUrl .= "t=" . $t_htlienquan->TableVar . "&"; // Add page token
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
		global $objForm, $t_htlienquan;
		if ($t_htlienquan->UseTokenInUrl) {
			if ($objForm)
				return ($t_htlienquan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_htlienquan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_htlienquan_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_htlienquan)
		$GLOBALS["t_htlienquan"] = new ct_htlienquan();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_htlienquan', TRUE);

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
		global $t_htlienquan;

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
			$this->Page_Terminate("t_htlienquanlist.php");
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
		global $objForm, $Language, $gsFormError, $t_htlienquan;

		// Load key from QueryString
		if (@$_GET["SYS_ID"] <> "")
			$t_htlienquan->SYS_ID->setQueryStringValue($_GET["SYS_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_htlienquan->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_htlienquan->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_htlienquan->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_htlienquan->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_htlienquan->SYS_ID->CurrentValue == "")
			$this->Page_Terminate("t_htlienquanlist.php"); // Invalid key, return to list
		switch ($t_htlienquan->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_htlienquanlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_htlienquan->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_htlienquan->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_htlienquanview.php")
						$sReturnUrl = $t_htlienquan->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_htlienquan->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_htlienquan->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_htlienquan;

		// Get upload data
			if ($t_htlienquan->C_ICON->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_htlienquan->C_ICON->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_htlienquan;
		$t_htlienquan->FK_OB_ID->setFormValue($objForm->GetValue("x_FK_OB_ID"));
		$t_htlienquan->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_htlienquan->C_URL->setFormValue($objForm->GetValue("x_C_URL"));
		$t_htlienquan->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_htlienquan->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_htlienquan->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_htlienquan->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_htlienquan->C_EDIT_TIME->CurrentValue, 7);
		$t_htlienquan->SYS_ID->setFormValue($objForm->GetValue("x_SYS_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_htlienquan;
		$t_htlienquan->SYS_ID->CurrentValue = $t_htlienquan->SYS_ID->FormValue;
		$this->LoadRow();
		$t_htlienquan->FK_OB_ID->CurrentValue = $t_htlienquan->FK_OB_ID->FormValue;
		$t_htlienquan->C_NAME->CurrentValue = $t_htlienquan->C_NAME->FormValue;
		$t_htlienquan->C_URL->CurrentValue = $t_htlienquan->C_URL->FormValue;
		$t_htlienquan->C_ACTIVE->CurrentValue = $t_htlienquan->C_ACTIVE->FormValue;
		$t_htlienquan->C_USER_EDIT->CurrentValue = $t_htlienquan->C_USER_EDIT->FormValue;
		$t_htlienquan->C_EDIT_TIME->CurrentValue = $t_htlienquan->C_EDIT_TIME->FormValue;
		$t_htlienquan->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_htlienquan->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_htlienquan;
		$sFilter = $t_htlienquan->KeyFilter();

		// Call Row Selecting event
		$t_htlienquan->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_htlienquan->CurrentFilter = $sFilter;
		$sSql = $t_htlienquan->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_htlienquan->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_htlienquan;
		$t_htlienquan->SYS_ID->setDbValue($rs->fields('SYS_ID'));
		$t_htlienquan->FK_OB_ID->setDbValue($rs->fields('FK_OB_ID'));
		$t_htlienquan->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_htlienquan->C_ICON->Upload->DbValue = $rs->fields('C_ICON');
		$t_htlienquan->C_URL->setDbValue($rs->fields('C_URL'));
		$t_htlienquan->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_htlienquan->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_htlienquan->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_htlienquan->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_htlienquan->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_htlienquan;

		// Initialize URLs
		// Call Row_Rendering event

		$t_htlienquan->Row_Rendering();

		// Common render codes for all row types
		// FK_OB_ID

		$t_htlienquan->FK_OB_ID->CellCssStyle = ""; $t_htlienquan->FK_OB_ID->CellCssClass = "";
		$t_htlienquan->FK_OB_ID->CellAttrs = array(); $t_htlienquan->FK_OB_ID->ViewAttrs = array(); $t_htlienquan->FK_OB_ID->EditAttrs = array();

		// C_NAME
		$t_htlienquan->C_NAME->CellCssStyle = ""; $t_htlienquan->C_NAME->CellCssClass = "";
		$t_htlienquan->C_NAME->CellAttrs = array(); $t_htlienquan->C_NAME->ViewAttrs = array(); $t_htlienquan->C_NAME->EditAttrs = array();

		// C_ICON
		$t_htlienquan->C_ICON->CellCssStyle = ""; $t_htlienquan->C_ICON->CellCssClass = "";
		$t_htlienquan->C_ICON->CellAttrs = array(); $t_htlienquan->C_ICON->ViewAttrs = array(); $t_htlienquan->C_ICON->EditAttrs = array();

		// C_URL
		$t_htlienquan->C_URL->CellCssStyle = ""; $t_htlienquan->C_URL->CellCssClass = "";
		$t_htlienquan->C_URL->CellAttrs = array(); $t_htlienquan->C_URL->ViewAttrs = array(); $t_htlienquan->C_URL->EditAttrs = array();

		// C_ACTIVE
		$t_htlienquan->C_ACTIVE->CellCssStyle = ""; $t_htlienquan->C_ACTIVE->CellCssClass = "";
		$t_htlienquan->C_ACTIVE->CellAttrs = array(); $t_htlienquan->C_ACTIVE->ViewAttrs = array(); $t_htlienquan->C_ACTIVE->EditAttrs = array();

		// C_USER_EDIT
		$t_htlienquan->C_USER_EDIT->CellCssStyle = ""; $t_htlienquan->C_USER_EDIT->CellCssClass = "";
		$t_htlienquan->C_USER_EDIT->CellAttrs = array(); $t_htlienquan->C_USER_EDIT->ViewAttrs = array(); $t_htlienquan->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_htlienquan->C_EDIT_TIME->CellCssStyle = ""; $t_htlienquan->C_EDIT_TIME->CellCssClass = "";
		$t_htlienquan->C_EDIT_TIME->CellAttrs = array(); $t_htlienquan->C_EDIT_TIME->ViewAttrs = array(); $t_htlienquan->C_EDIT_TIME->EditAttrs = array();
		if ($t_htlienquan->RowType == EW_ROWTYPE_VIEW) { // View row

			// SYS_ID
			$t_htlienquan->SYS_ID->ViewValue = $t_htlienquan->SYS_ID->CurrentValue;
			$t_htlienquan->SYS_ID->CssStyle = "";
			$t_htlienquan->SYS_ID->CssClass = "";
			$t_htlienquan->SYS_ID->ViewCustomAttributes = "";

			// FK_OB_ID
			if (strval($t_htlienquan->FK_OB_ID->CurrentValue) <> "") {
				$t_htlienquan->FK_OB_ID->ViewValue = "";
				$arwrk = explode(",", strval($t_htlienquan->FK_OB_ID->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "1":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Danh muc tuyen sinh";
							break;
						case "2":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Doi tuong sinh vien dang hoc";
							break;
                                                case "3":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối phòng";
							break;
                                                case "4":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Khối ban";
							break;
                                                case "5":
							$t_htlienquan->FK_OB_ID->ViewValue .= "Hệ thống HPU";
							break;
						default:
							$t_htlienquan->FK_OB_ID->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_htlienquan->FK_OB_ID->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_htlienquan->FK_OB_ID->ViewValue = NULL;
			}
			$t_htlienquan->FK_OB_ID->CssStyle = "";
			$t_htlienquan->FK_OB_ID->CssClass = "";
			$t_htlienquan->FK_OB_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_htlienquan->C_NAME->ViewValue = $t_htlienquan->C_NAME->CurrentValue;
			$t_htlienquan->C_NAME->CssStyle = "";
			$t_htlienquan->C_NAME->CssClass = "";
			$t_htlienquan->C_NAME->ViewCustomAttributes = "";

			// C_ICON
			if (!ew_Empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->ViewValue = $t_htlienquan->C_ICON->FldCaption();
				$t_htlienquan->C_ICON->ImageAlt = $t_htlienquan->C_ICON->FldAlt();
			} else {
				$t_htlienquan->C_ICON->ViewValue = "";
			}
			$t_htlienquan->C_ICON->CssStyle = "";
			$t_htlienquan->C_ICON->CssClass = "";
			$t_htlienquan->C_ICON->ViewCustomAttributes = "";

			// C_URL
			$t_htlienquan->C_URL->ViewValue = $t_htlienquan->C_URL->CurrentValue;
			$t_htlienquan->C_URL->CssStyle = "";
			$t_htlienquan->C_URL->CssClass = "";
			$t_htlienquan->C_URL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_htlienquan->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_htlienquan->C_ACTIVE->CurrentValue) {
					case "0":
						$t_htlienquan->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_htlienquan->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_htlienquan->C_ACTIVE->ViewValue = $t_htlienquan->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_htlienquan->C_ACTIVE->ViewValue = NULL;
			}
			$t_htlienquan->C_ACTIVE->CssStyle = "";
			$t_htlienquan->C_ACTIVE->CssClass = "";
			$t_htlienquan->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_htlienquan->C_USER_ADD->ViewValue = $t_htlienquan->C_USER_ADD->CurrentValue;
			$t_htlienquan->C_USER_ADD->CssStyle = "";
			$t_htlienquan->C_USER_ADD->CssClass = "";
			$t_htlienquan->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_htlienquan->C_ADD_TIME->ViewValue = $t_htlienquan->C_ADD_TIME->CurrentValue;
			$t_htlienquan->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_ADD_TIME->ViewValue, 7);
			$t_htlienquan->C_ADD_TIME->CssStyle = "";
			$t_htlienquan->C_ADD_TIME->CssClass = "";
			$t_htlienquan->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->ViewValue = $t_htlienquan->C_USER_EDIT->CurrentValue;
			$t_htlienquan->C_USER_EDIT->CssStyle = "";
			$t_htlienquan->C_USER_EDIT->CssClass = "";
			$t_htlienquan->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->ViewValue = $t_htlienquan->C_EDIT_TIME->CurrentValue;
			$t_htlienquan->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_htlienquan->C_EDIT_TIME->ViewValue, 7);
			$t_htlienquan->C_EDIT_TIME->CssStyle = "";
			$t_htlienquan->C_EDIT_TIME->CssClass = "";
			$t_htlienquan->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->HrefValue = "";
			$t_htlienquan->FK_OB_ID->TooltipValue = "";

			// C_NAME
			$t_htlienquan->C_NAME->HrefValue = "";
			$t_htlienquan->C_NAME->TooltipValue = "";

			// C_ICON
			if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->HrefValue = "t_htlienquan_C_ICON_bv.php?SYS_ID=" . $t_htlienquan->SYS_ID->CurrentValue;
				if ($t_htlienquan->Export <> "") $t_htlienquan->C_ICON->HrefValue = ew_ConvertFullUrl($t_htlienquan->C_ICON->HrefValue);
			} else {
				$t_htlienquan->C_ICON->HrefValue = "";
			}
			$t_htlienquan->C_ICON->TooltipValue = "";

			// C_URL
			$t_htlienquan->C_URL->HrefValue = "";
			$t_htlienquan->C_URL->TooltipValue = "";

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->HrefValue = "";
			$t_htlienquan->C_ACTIVE->TooltipValue = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->HrefValue = "";
			$t_htlienquan->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->HrefValue = "";
			$t_htlienquan->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_htlienquan->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Danh mục tuyển sinh");
			$arwrk[] = array("2", "Đối tượng sinh viên đang học");
                        $arwrk[] = array("3", "Khối phòng");
                        $arwrk[] = array("4", "Khối ban");
                        $arwrk[] = array("5", "Hệ thống HPU");
                        
			$t_htlienquan->FK_OB_ID->EditValue = $arwrk;

			// C_NAME
			$t_htlienquan->C_NAME->EditCustomAttributes = "";
			$t_htlienquan->C_NAME->EditValue = ew_HtmlEncode($t_htlienquan->C_NAME->CurrentValue);

			// C_ICON
			$t_htlienquan->C_ICON->EditCustomAttributes = "";
			if (!ew_Empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->EditValue = $t_htlienquan->C_ICON->FldCaption();
				$t_htlienquan->C_ICON->ImageAlt = $t_htlienquan->C_ICON->FldAlt();
			} else {
				$t_htlienquan->C_ICON->EditValue = "";
			}

			// C_URL
			$t_htlienquan->C_URL->EditCustomAttributes = "";
			$t_htlienquan->C_URL->EditValue = ew_HtmlEncode($t_htlienquan->C_URL->CurrentValue);

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_htlienquan->C_ACTIVE->EditValue = $arwrk;

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// FK_OB_ID

			$t_htlienquan->FK_OB_ID->HrefValue = "";

			// C_NAME
			$t_htlienquan->C_NAME->HrefValue = "";

			// C_ICON
			if (!empty($t_htlienquan->C_ICON->Upload->DbValue)) {
				$t_htlienquan->C_ICON->HrefValue = "t_htlienquan_C_ICON_bv.php?SYS_ID=" . $t_htlienquan->SYS_ID->CurrentValue;
				if ($t_htlienquan->Export <> "") $t_htlienquan->C_ICON->HrefValue = ew_ConvertFullUrl($t_htlienquan->C_ICON->HrefValue);
			} else {
				$t_htlienquan->C_ICON->HrefValue = "";
			}

			// C_URL
			$t_htlienquan->C_URL->HrefValue = "";

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->HrefValue = "";

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_htlienquan->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_htlienquan->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_htlienquan;

		// Initialize form error message
		$gsFormError = "";
		if (!ew_CheckFileType($t_htlienquan->C_ICON->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("WrongFileType");
		}
		if ($t_htlienquan->C_ICON->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $t_htlienquan->C_ICON->Upload->FileSize > EW_MAX_FILE_SIZE) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
		}
		if (in_array($t_htlienquan->C_ICON->Upload->Error, array(1, 2, 3, 6, 7, 8))) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("PhpUploadErr" . $t_htlienquan->C_ICON->Upload->Error);
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_htlienquan->FK_OB_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_htlienquan->FK_OB_ID->FldCaption();
		}
		if (!is_null($t_htlienquan->C_NAME->FormValue) && $t_htlienquan->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_htlienquan->C_NAME->FldCaption();
		}
		if ($t_htlienquan->C_ICON->Upload->Action == "3" && is_null($t_htlienquan->C_ICON->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_htlienquan->C_ICON->FldCaption();
		}
		if (!is_null($t_htlienquan->C_URL->FormValue) && $t_htlienquan->C_URL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_htlienquan->C_URL->FldCaption();
		}
                if (!filter_var ($t_htlienquan->C_URL->FormValue,FILTER_VALIDATE_URL))
                        {
                         $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                         $gsFormError .= "Không đúng định dạng url" ;
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
		global $conn, $Security, $Language, $t_htlienquan;
		$sFilter = $t_htlienquan->KeyFilter();
		$t_htlienquan->CurrentFilter = $sFilter;
		$sSql = $t_htlienquan->SQL();
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

			// FK_OB_ID
			$t_htlienquan->FK_OB_ID->SetDbValueDef($rsnew, $t_htlienquan->FK_OB_ID->CurrentValue, NULL, FALSE);

			// C_NAME
			$t_htlienquan->C_NAME->SetDbValueDef($rsnew, $t_htlienquan->C_NAME->CurrentValue, NULL, FALSE);

			// C_ICON
			$t_htlienquan->C_ICON->Upload->SaveToSession(); // Save file value to Session
						if ($t_htlienquan->C_ICON->Upload->Action == "2" || $t_htlienquan->C_ICON->Upload->Action == "3") { // Update/Remove
			if (is_null($t_htlienquan->C_ICON->Upload->Value)) {
				$rsnew['C_ICON'] = NULL;	
			} else {
				$rsnew['C_ICON'] = $t_htlienquan->C_ICON->Upload->Value;
			}
			}

			// C_URL
			$t_htlienquan->C_URL->SetDbValueDef($rsnew, $t_htlienquan->C_URL->CurrentValue, NULL, FALSE);

			// C_ACTIVE
			$t_htlienquan->C_ACTIVE->SetDbValueDef($rsnew, $t_htlienquan->C_ACTIVE->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_htlienquan->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_htlienquan->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_htlienquan->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_htlienquan->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_htlienquan->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_htlienquan->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_htlienquan->CancelMessage <> "") {
					$this->setMessage($t_htlienquan->CancelMessage);
					$t_htlienquan->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_htlienquan->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// C_ICON
		$t_htlienquan->C_ICON->Upload->RemoveFromSession(); // Remove file value from Session
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
