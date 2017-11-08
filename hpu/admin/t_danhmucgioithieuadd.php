<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_danhmucgioithieuinfo.php" ?>
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
$t_danhmucgioithieu_add = new ct_danhmucgioithieu_add();
$Page =& $t_danhmucgioithieu_add;

// Page init
$t_danhmucgioithieu_add->Page_Init();

// Page main
$t_danhmucgioithieu_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_danhmucgioithieu_add = new ew_Page("t_danhmucgioithieu_add");

// page properties
t_danhmucgioithieu_add.PageID = "add"; // page ID
t_danhmucgioithieu_add.FormID = "ft_danhmucgioithieuadd"; // form ID
var EW_PAGE_ID = t_danhmucgioithieu_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_danhmucgioithieu_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_TYPE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmucgioithieu->C_TYPE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_NAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmucgioithieu->C_NAME->FldCaption()) ?>");
		
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmucgioithieu->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_danhmucgioithieu->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_danhmucgioithieu->C_ACTIVE->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_danhmucgioithieu_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_danhmucgioithieu_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_danhmucgioithieu_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_danhmucgioithieu_add.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $t_danhmucgioithieu->TableCaption() ?></p>
<a href="<?php echo $t_danhmucgioithieu->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_danhmucgioithieu_add->ShowMessage();
?>
<form name="ft_danhmucgioithieuadd" id="ft_danhmucgioithieuadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_danhmucgioithieu_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_danhmucgioithieu">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_danhmucgioithieu->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_danhmucgioithieu->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_TYPE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmucgioithieu->C_TYPE->CellAttributes() ?>><span id="el_C_TYPE">
<div id="tp_x_C_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_danhmucgioithieu->C_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_danhmucgioithieu->C_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_danhmucgioithieu->C_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_danhmucgioithieu->C_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_danhmucgioithieu->C_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_danhmucgioithieu->C_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_danhmucgioithieu->C_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_danhmucgioithieu->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmucgioithieu->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_danhmucgioithieu->C_NAME->FldTitle() ?>" size="100" maxlength="255" value="<?php echo $t_danhmucgioithieu->C_NAME->EditValue ?>"<?php echo $t_danhmucgioithieu->C_NAME->EditAttributes() ?>>
</span><?php echo $t_danhmucgioithieu->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_DESCRIPTION->Visible) { // C_DESCRIPTION ?>
	<tr<?php echo $t_danhmucgioithieu->C_DESCRIPTION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_DESCRIPTION->FldCaption() ?></td>
		<td<?php echo $t_danhmucgioithieu->C_DESCRIPTION->CellAttributes() ?>><span id="el_C_DESCRIPTION">
<textarea name="x_C_DESCRIPTION" id="x_C_DESCRIPTION" title="<?php echo $t_danhmucgioithieu->C_DESCRIPTION->FldTitle() ?>" cols="83" rows="4"<?php echo $t_danhmucgioithieu->C_DESCRIPTION->EditAttributes() ?>><?php echo $t_danhmucgioithieu->C_DESCRIPTION->EditValue ?></textarea>
</span><?php echo $t_danhmucgioithieu->C_DESCRIPTION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_danhmucgioithieu->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmucgioithieu->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_danhmucgioithieu->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_danhmucgioithieu->C_ORDER->EditValue ?>"<?php echo $t_danhmucgioithieu->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_danhmucgioithieu->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_danhmucgioithieu->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_danhmucgioithieu->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_danhmucgioithieu->C_ACTIVE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_danhmucgioithieu->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_danhmucgioithieu->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_danhmucgioithieu->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_danhmucgioithieu->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_danhmucgioithieu->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_danhmucgioithieu->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_danhmucgioithieu->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_danhmucgioithieu->C_ACTIVE->CustomMsg ?></td>
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
$t_danhmucgioithieu_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_danhmucgioithieu_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_danhmucgioithieu';

	// Page object name
	var $PageObjName = 't_danhmucgioithieu_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) $PageUrl .= "t=" . $t_danhmucgioithieu->TableVar . "&"; // Add page token
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
		global $objForm, $t_danhmucgioithieu;
		if ($t_danhmucgioithieu->UseTokenInUrl) {
			if ($objForm)
				return ($t_danhmucgioithieu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_danhmucgioithieu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_danhmucgioithieu_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_danhmucgioithieu)
		$GLOBALS["t_danhmucgioithieu"] = new ct_danhmucgioithieu();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_danhmucgioithieu', TRUE);

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
		global $t_danhmucgioithieu;

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
			$this->Page_Terminate("t_danhmucgioithieulist.php");
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
		global $objForm, $Language, $gsFormError, $t_danhmucgioithieu;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_DANHMUCGIOITHIEU"] != "") {
		  $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setQueryStringValue($_GET["PK_DANHMUCGIOITHIEU"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_danhmucgioithieu->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_danhmucgioithieu->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_danhmucgioithieu->CurrentAction = "C"; // Copy record
		  } else {
		    $t_danhmucgioithieu->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_danhmucgioithieu->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_danhmucgioithieulist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_danhmucgioithieu->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_danhmucgioithieu->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_danhmucgioithieuview.php")
						$sReturnUrl = $t_danhmucgioithieu->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_danhmucgioithieu->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_danhmucgioithieu;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_danhmucgioithieu;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_danhmucgioithieu;
		$t_danhmucgioithieu->C_TYPE->setFormValue($objForm->GetValue("x_C_TYPE"));
		$t_danhmucgioithieu->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_danhmucgioithieu->C_URL->setFormValue($objForm->GetValue("x_C_URL"));
		$t_danhmucgioithieu->C_DESCRIPTION->setFormValue($objForm->GetValue("x_C_DESCRIPTION"));
		$t_danhmucgioithieu->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_danhmucgioithieu->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_danhmucgioithieu->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_danhmucgioithieu->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_danhmucgioithieu->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_danhmucgioithieu->C_ADD_TIME->CurrentValue, 7);
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setFormValue($objForm->GetValue("x_PK_DANHMUCGIOITHIEU"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_danhmucgioithieu;
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->FormValue;
		$t_danhmucgioithieu->C_TYPE->CurrentValue = $t_danhmucgioithieu->C_TYPE->FormValue;
		$t_danhmucgioithieu->C_NAME->CurrentValue = $t_danhmucgioithieu->C_NAME->FormValue;
		$t_danhmucgioithieu->C_URL->CurrentValue = $t_danhmucgioithieu->C_URL->FormValue;
		$t_danhmucgioithieu->C_DESCRIPTION->CurrentValue = $t_danhmucgioithieu->C_DESCRIPTION->FormValue;
		$t_danhmucgioithieu->C_ORDER->CurrentValue = $t_danhmucgioithieu->C_ORDER->FormValue;
		$t_danhmucgioithieu->C_ACTIVE->CurrentValue = $t_danhmucgioithieu->C_ACTIVE->FormValue;
		$t_danhmucgioithieu->C_USER_ADD->CurrentValue = $t_danhmucgioithieu->C_USER_ADD->FormValue;
		$t_danhmucgioithieu->C_ADD_TIME->CurrentValue = $t_danhmucgioithieu->C_ADD_TIME->FormValue;
		$t_danhmucgioithieu->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_danhmucgioithieu->C_ADD_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_danhmucgioithieu;
		$sFilter = $t_danhmucgioithieu->KeyFilter();

		// Call Row Selecting event
		$t_danhmucgioithieu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_danhmucgioithieu->CurrentFilter = $sFilter;
		$sSql = $t_danhmucgioithieu->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_danhmucgioithieu->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_danhmucgioithieu;
		$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setDbValue($rs->fields('PK_DANHMUCGIOITHIEU'));
		$t_danhmucgioithieu->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_danhmucgioithieu->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_danhmucgioithieu->C_URL->setDbValue($rs->fields('C_URL'));
		$t_danhmucgioithieu->C_DESCRIPTION->setDbValue($rs->fields('C_DESCRIPTION'));
		$t_danhmucgioithieu->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_danhmucgioithieu->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_danhmucgioithieu->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_danhmucgioithieu->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_danhmucgioithieu->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_danhmucgioithieu->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_danhmucgioithieu;

		// Initialize URLs
		// Call Row_Rendering event

		$t_danhmucgioithieu->Row_Rendering();

		// Common render codes for all row types
		// C_TYPE

		$t_danhmucgioithieu->C_TYPE->CellCssStyle = ""; $t_danhmucgioithieu->C_TYPE->CellCssClass = "";
		$t_danhmucgioithieu->C_TYPE->CellAttrs = array(); $t_danhmucgioithieu->C_TYPE->ViewAttrs = array(); $t_danhmucgioithieu->C_TYPE->EditAttrs = array();

		// C_NAME
		$t_danhmucgioithieu->C_NAME->CellCssStyle = ""; $t_danhmucgioithieu->C_NAME->CellCssClass = "";
		$t_danhmucgioithieu->C_NAME->CellAttrs = array(); $t_danhmucgioithieu->C_NAME->ViewAttrs = array(); $t_danhmucgioithieu->C_NAME->EditAttrs = array();

		// C_URL
		$t_danhmucgioithieu->C_URL->CellCssStyle = ""; $t_danhmucgioithieu->C_URL->CellCssClass = "";
		$t_danhmucgioithieu->C_URL->CellAttrs = array(); $t_danhmucgioithieu->C_URL->ViewAttrs = array(); $t_danhmucgioithieu->C_URL->EditAttrs = array();

		// C_DESCRIPTION
		$t_danhmucgioithieu->C_DESCRIPTION->CellCssStyle = ""; $t_danhmucgioithieu->C_DESCRIPTION->CellCssClass = "";
		$t_danhmucgioithieu->C_DESCRIPTION->CellAttrs = array(); $t_danhmucgioithieu->C_DESCRIPTION->ViewAttrs = array(); $t_danhmucgioithieu->C_DESCRIPTION->EditAttrs = array();

		// C_ORDER
		$t_danhmucgioithieu->C_ORDER->CellCssStyle = ""; $t_danhmucgioithieu->C_ORDER->CellCssClass = "";
		$t_danhmucgioithieu->C_ORDER->CellAttrs = array(); $t_danhmucgioithieu->C_ORDER->ViewAttrs = array(); $t_danhmucgioithieu->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_danhmucgioithieu->C_ACTIVE->CellCssStyle = ""; $t_danhmucgioithieu->C_ACTIVE->CellCssClass = "";
		$t_danhmucgioithieu->C_ACTIVE->CellAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->ViewAttrs = array(); $t_danhmucgioithieu->C_ACTIVE->EditAttrs = array();

		// C_USER_ADD
		$t_danhmucgioithieu->C_USER_ADD->CellCssStyle = ""; $t_danhmucgioithieu->C_USER_ADD->CellCssClass = "";
		$t_danhmucgioithieu->C_USER_ADD->CellAttrs = array(); $t_danhmucgioithieu->C_USER_ADD->ViewAttrs = array(); $t_danhmucgioithieu->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_danhmucgioithieu->C_ADD_TIME->CellCssStyle = ""; $t_danhmucgioithieu->C_ADD_TIME->CellCssClass = "";
		$t_danhmucgioithieu->C_ADD_TIME->CellAttrs = array(); $t_danhmucgioithieu->C_ADD_TIME->ViewAttrs = array(); $t_danhmucgioithieu->C_ADD_TIME->EditAttrs = array();
		if ($t_danhmucgioithieu->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_DANHMUCGIOITHIEU
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewValue = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CurrentValue;
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssStyle = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->CssClass = "";
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_danhmucgioithieu->C_TYPE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_TYPE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh muc 1 tin bai";
						break;
					case "1":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh muc list tin bai";
						break;
					case "2":
						$t_danhmucgioithieu->C_TYPE->ViewValue = "Danh m?c li�n k?t url";
						break;
					default:
						$t_danhmucgioithieu->C_TYPE->ViewValue = $t_danhmucgioithieu->C_TYPE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_TYPE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_TYPE->CssStyle = "";
			$t_danhmucgioithieu->C_TYPE->CssClass = "";
			$t_danhmucgioithieu->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->ViewValue = $t_danhmucgioithieu->C_NAME->CurrentValue;
			$t_danhmucgioithieu->C_NAME->CssStyle = "";
			$t_danhmucgioithieu->C_NAME->CssClass = "";
			$t_danhmucgioithieu->C_NAME->ViewCustomAttributes = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->ViewValue = $t_danhmucgioithieu->C_URL->CurrentValue;
			$t_danhmucgioithieu->C_URL->CssStyle = "";
			$t_danhmucgioithieu->C_URL->CssClass = "";
			$t_danhmucgioithieu->C_URL->ViewCustomAttributes = "";

			// C_DESCRIPTION
			$t_danhmucgioithieu->C_DESCRIPTION->ViewValue = $t_danhmucgioithieu->C_DESCRIPTION->CurrentValue;
			$t_danhmucgioithieu->C_DESCRIPTION->CssStyle = "";
			$t_danhmucgioithieu->C_DESCRIPTION->CssClass = "";
			$t_danhmucgioithieu->C_DESCRIPTION->ViewCustomAttributes = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->ViewValue = $t_danhmucgioithieu->C_ORDER->CurrentValue;
			$t_danhmucgioithieu->C_ORDER->CssStyle = "";
			$t_danhmucgioithieu->C_ORDER->CssClass = "";
			$t_danhmucgioithieu->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_danhmucgioithieu->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_danhmucgioithieu->C_ACTIVE->CurrentValue) {
					case "0":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_danhmucgioithieu->C_ACTIVE->ViewValue = $t_danhmucgioithieu->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_danhmucgioithieu->C_ACTIVE->ViewValue = NULL;
			}
			$t_danhmucgioithieu->C_ACTIVE->CssStyle = "";
			$t_danhmucgioithieu->C_ACTIVE->CssClass = "";
			$t_danhmucgioithieu->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_danhmucgioithieu->C_USER_ADD->ViewValue = $t_danhmucgioithieu->C_USER_ADD->CurrentValue;
			$t_danhmucgioithieu->C_USER_ADD->CssStyle = "";
			$t_danhmucgioithieu->C_USER_ADD->CssClass = "";
			$t_danhmucgioithieu->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = $t_danhmucgioithieu->C_ADD_TIME->CurrentValue;
			$t_danhmucgioithieu->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_ADD_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_ADD_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_ADD_TIME->CssClass = "";
			$t_danhmucgioithieu->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_danhmucgioithieu->C_USER_EDIT->ViewValue = $t_danhmucgioithieu->C_USER_EDIT->CurrentValue;
			$t_danhmucgioithieu->C_USER_EDIT->CssStyle = "";
			$t_danhmucgioithieu->C_USER_EDIT->CssClass = "";
			$t_danhmucgioithieu->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = $t_danhmucgioithieu->C_EDIT_TIME->CurrentValue;
			$t_danhmucgioithieu->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_danhmucgioithieu->C_EDIT_TIME->ViewValue, 7);
			$t_danhmucgioithieu->C_EDIT_TIME->CssStyle = "";
			$t_danhmucgioithieu->C_EDIT_TIME->CssClass = "";
			$t_danhmucgioithieu->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_TYPE
			$t_danhmucgioithieu->C_TYPE->HrefValue = "";
			$t_danhmucgioithieu->C_TYPE->TooltipValue = "";

			// C_NAME
			$t_danhmucgioithieu->C_NAME->HrefValue = "";
			$t_danhmucgioithieu->C_NAME->TooltipValue = "";

			// C_URL
			$t_danhmucgioithieu->C_URL->HrefValue = "";
			$t_danhmucgioithieu->C_URL->TooltipValue = "";

			// C_DESCRIPTION
			$t_danhmucgioithieu->C_DESCRIPTION->HrefValue = "";
			$t_danhmucgioithieu->C_DESCRIPTION->TooltipValue = "";

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->HrefValue = "";
			$t_danhmucgioithieu->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_danhmucgioithieu->C_ACTIVE->HrefValue = "";
			$t_danhmucgioithieu->C_ACTIVE->TooltipValue = "";

			// C_USER_ADD
			$t_danhmucgioithieu->C_USER_ADD->HrefValue = "";
			$t_danhmucgioithieu->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_danhmucgioithieu->C_ADD_TIME->HrefValue = "";
			$t_danhmucgioithieu->C_ADD_TIME->TooltipValue = "";
		} elseif ($t_danhmucgioithieu->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_TYPE
			$t_danhmucgioithieu->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Danh mục 1 tin bài");
			$arwrk[] = array("1", "Danh muc list tin bài");
			$t_danhmucgioithieu->C_TYPE->EditValue = $arwrk;

			// C_NAME
			$t_danhmucgioithieu->C_NAME->EditCustomAttributes = "";
			$t_danhmucgioithieu->C_NAME->EditValue = ew_HtmlEncode($t_danhmucgioithieu->C_NAME->CurrentValue);

			// C_URL
			$t_danhmucgioithieu->C_URL->EditCustomAttributes = "";
			$t_danhmucgioithieu->C_URL->EditValue = ew_HtmlEncode($t_danhmucgioithieu->C_URL->CurrentValue);

			// C_DESCRIPTION
			$t_danhmucgioithieu->C_DESCRIPTION->EditCustomAttributes = "";
			$t_danhmucgioithieu->C_DESCRIPTION->EditValue = ew_HtmlEncode($t_danhmucgioithieu->C_DESCRIPTION->CurrentValue);

			// C_ORDER
			$t_danhmucgioithieu->C_ORDER->EditCustomAttributes = "";
			$t_danhmucgioithieu->C_ORDER->EditValue = ew_HtmlEncode($t_danhmucgioithieu->C_ORDER->CurrentValue);

			// C_ACTIVE
			$t_danhmucgioithieu->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_danhmucgioithieu->C_ACTIVE->EditValue = $arwrk;

			// C_USER_ADD
			// C_ADD_TIME

		}

		// Call Row Rendered event
		if ($t_danhmucgioithieu->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_danhmucgioithieu->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_danhmucgioithieu;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_danhmucgioithieu->C_TYPE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmucgioithieu->C_TYPE->FldCaption();
		}
		if (!is_null($t_danhmucgioithieu->C_NAME->FormValue) && $t_danhmucgioithieu->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmucgioithieu->C_NAME->FldCaption();
		}
		
		if (!is_null($t_danhmucgioithieu->C_ORDER->FormValue) && $t_danhmucgioithieu->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmucgioithieu->C_ORDER->FldCaption();
		}
		if (!ew_CheckInteger($t_danhmucgioithieu->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_danhmucgioithieu->C_ORDER->FldErrMsg();
		}
		if ($t_danhmucgioithieu->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_danhmucgioithieu->C_ACTIVE->FldCaption();
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
		global $conn, $Language, $Security, $t_danhmucgioithieu;
		$rsnew = array();

		// C_TYPE
		$t_danhmucgioithieu->C_TYPE->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_TYPE->CurrentValue, NULL, FALSE);

		// C_NAME
		$t_danhmucgioithieu->C_NAME->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_NAME->CurrentValue, NULL, FALSE);

		// C_URL
		$t_danhmucgioithieu->C_URL->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_URL->CurrentValue, NULL, FALSE);

		// C_DESCRIPTION
		$t_danhmucgioithieu->C_DESCRIPTION->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_DESCRIPTION->CurrentValue, NULL, FALSE);

		// C_ORDER
		$t_danhmucgioithieu->C_ORDER->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_ORDER->CurrentValue, NULL, FALSE);

		// C_ACTIVE
		$t_danhmucgioithieu->C_ACTIVE->SetDbValueDef($rsnew, $t_danhmucgioithieu->C_ACTIVE->CurrentValue, NULL, FALSE);

		// C_USER_ADD
		$t_danhmucgioithieu->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_danhmucgioithieu->C_USER_ADD->DbValue;

		// C_ADD_TIME
		$t_danhmucgioithieu->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_ADD_TIME'] =& $t_danhmucgioithieu->C_ADD_TIME->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_danhmucgioithieu->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_danhmucgioithieu->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_danhmucgioithieu->CancelMessage <> "") {
				$this->setMessage($t_danhmucgioithieu->CancelMessage);
				$t_danhmucgioithieu->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->setDbValue($conn->Insert_ID());
			$rsnew['PK_DANHMUCGIOITHIEU'] = $t_danhmucgioithieu->PK_DANHMUCGIOITHIEU->DbValue;

			// Call Row Inserted event
			$t_danhmucgioithieu->Row_Inserted($rsnew);
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
