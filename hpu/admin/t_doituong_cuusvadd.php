<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_cuusvinfo.php" ?>
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
$t_doituong_cuusv_add = new ct_doituong_cuusv_add();
$Page =& $t_doituong_cuusv_add;

// Page init
$t_doituong_cuusv_add->Page_Init();

// Page main
$t_doituong_cuusv_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_cuusv_add = new ew_Page("t_doituong_cuusv_add");

// page properties
t_doituong_cuusv_add.PageID = "add"; // page ID
t_doituong_cuusv_add.FormID = "ft_doituong_cuusvadd"; // form ID
var EW_PAGE_ID = t_doituong_cuusv_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_doituong_cuusv_add.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_cuusv->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_BELONGTO"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_doituong_cuusv->C_BELONGTO->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_TYPE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_cuusv->C_TYPE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_cuusv->C_ACTIVE->FldCaption()) ?>");
                elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_doituong_cuusv->C_ORDER->FldErrMsg()) ?>");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_doituong_cuusv_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_cuusv_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_cuusv_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_cuusv_add.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $t_doituong_cuusv->TableCaption() ?></p>
<a href="<?php echo $t_doituong_cuusv->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_cuusv_add->ShowMessage();
?>
<form name="ft_doituong_cuusvadd" id="ft_doituong_cuusvadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_doituong_cuusv_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_doituong_cuusv">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_doituong_cuusv->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_doituong_cuusv->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_cuusv->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_cuusv->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
<input type="text" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_doituong_cuusv->C_NAME->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_doituong_cuusv->C_NAME->EditValue ?>"<?php echo $t_doituong_cuusv->C_NAME->EditAttributes() ?>>
</span><?php echo $t_doituong_cuusv->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_doituong_cuusv->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_doituong_cuusv->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_cuusv->C_TYPE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_cuusv->C_TYPE->CellAttributes() ?>><span id="el_C_TYPE">
<div id="tp_x_C_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_cuusv->C_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_cuusv->C_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_cuusv->C_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_cuusv->C_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_cuusv->C_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_cuusv->C_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_cuusv->C_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_cuusv->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_doituong_cuusv->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_cuusv->C_URL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_cuusv->C_URL->CellAttributes() ?>><span id="el_C_URL">
<input type="text" name="x_C_URL" id="x_C_URL" title="<?php echo $t_doituong_cuusv->C_URL->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_doituong_cuusv->C_URL->EditValue ?>"<?php echo $t_doituong_cuusv->C_URL->EditAttributes() ?>>
</span><?php echo $t_doituong_cuusv->C_URL->CustomMsg ?>
    <i>(* Định dạng chuẩn của url: http://abc.com)</i>              
                </td>
	</tr>
<?php } ?>
<?php if ($t_doituong_cuusv->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_doituong_cuusv->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_cuusv->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_cuusv->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_doituong_cuusv->C_ORDER->FldTitle() ?>" size="10" value="<?php echo $t_doituong_cuusv->C_ORDER->EditValue ?>"<?php echo $t_doituong_cuusv->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_doituong_cuusv->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_cuusv->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_doituong_cuusv->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_cuusv->C_ACTIVE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_cuusv->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_cuusv->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_cuusv->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_cuusv->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_cuusv->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_doituong_cuusv->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_cuusv->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_cuusv->C_ACTIVE->CustomMsg ?></td>
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
$t_doituong_cuusv_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_cuusv_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_doituong_cuusv';

	// Page object name
	var $PageObjName = 't_doituong_cuusv_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_cuusv;
		if ($t_doituong_cuusv->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_cuusv->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_cuusv;
		if ($t_doituong_cuusv->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_cuusv->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_cuusv->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_cuusv_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_cuusv)
		$GLOBALS["t_doituong_cuusv"] = new ct_doituong_cuusv();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_cuusv', TRUE);

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
		global $t_doituong_cuusv;

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
			$this->Page_Terminate("t_doituong_cuusvlist.php");
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
		global $objForm, $Language, $gsFormError, $t_doituong_cuusv;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["DTCUUSV_ID"] != "") {
		  $t_doituong_cuusv->DTCUUSV_ID->setQueryStringValue($_GET["DTCUUSV_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_doituong_cuusv->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_doituong_cuusv->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_doituong_cuusv->CurrentAction = "C"; // Copy record
		  } else {
		    $t_doituong_cuusv->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_doituong_cuusv->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_doituong_cuusvlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_doituong_cuusv->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_doituong_cuusv->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_doituong_cuusvview.php")
						$sReturnUrl = $t_doituong_cuusv->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_doituong_cuusv->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_doituong_cuusv;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_doituong_cuusv;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_doituong_cuusv;
		$t_doituong_cuusv->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_doituong_cuusv->C_BELONGTO->setFormValue($objForm->GetValue("x_C_BELONGTO"));
		$t_doituong_cuusv->C_TYPE->setFormValue($objForm->GetValue("x_C_TYPE"));
		$t_doituong_cuusv->C_URL->setFormValue($objForm->GetValue("x_C_URL"));
		$t_doituong_cuusv->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_doituong_cuusv->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_doituong_cuusv->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_doituong_cuusv->C_TIME_ADD->setFormValue($objForm->GetValue("x_C_TIME_ADD"));
		$t_doituong_cuusv->C_TIME_ADD->CurrentValue = ew_UnFormatDateTime($t_doituong_cuusv->C_TIME_ADD->CurrentValue, 7);
		$t_doituong_cuusv->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_doituong_cuusv->DTCUUSV_ID->setFormValue($objForm->GetValue("x_DTCUUSV_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_doituong_cuusv;
		$t_doituong_cuusv->DTCUUSV_ID->CurrentValue = $t_doituong_cuusv->DTCUUSV_ID->FormValue;
		$t_doituong_cuusv->C_NAME->CurrentValue = $t_doituong_cuusv->C_NAME->FormValue;
		$t_doituong_cuusv->C_BELONGTO->CurrentValue = $t_doituong_cuusv->C_BELONGTO->FormValue;
		$t_doituong_cuusv->C_TYPE->CurrentValue = $t_doituong_cuusv->C_TYPE->FormValue;
		$t_doituong_cuusv->C_URL->CurrentValue = $t_doituong_cuusv->C_URL->FormValue;
		$t_doituong_cuusv->C_ORDER->CurrentValue = $t_doituong_cuusv->C_ORDER->FormValue;
		$t_doituong_cuusv->C_ACTIVE->CurrentValue = $t_doituong_cuusv->C_ACTIVE->FormValue;
		$t_doituong_cuusv->C_USER_ADD->CurrentValue = $t_doituong_cuusv->C_USER_ADD->FormValue;
		$t_doituong_cuusv->C_TIME_ADD->CurrentValue = $t_doituong_cuusv->C_TIME_ADD->FormValue;
		$t_doituong_cuusv->C_TIME_ADD->CurrentValue = ew_UnFormatDateTime($t_doituong_cuusv->C_TIME_ADD->CurrentValue, 7);
		$t_doituong_cuusv->FK_CONGTY->CurrentValue = $t_doituong_cuusv->FK_CONGTY->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_cuusv;
		$sFilter = $t_doituong_cuusv->KeyFilter();

		// Call Row Selecting event
		$t_doituong_cuusv->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_cuusv->CurrentFilter = $sFilter;
		$sSql = $t_doituong_cuusv->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_cuusv->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_cuusv;
		$t_doituong_cuusv->DTCUUSV_ID->setDbValue($rs->fields('DTCUUSV_ID'));
		$t_doituong_cuusv->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_cuusv->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_doituong_cuusv->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_cuusv->C_URL->setDbValue($rs->fields('C_URL'));
		$t_doituong_cuusv->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_doituong_cuusv->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_doituong_cuusv->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_cuusv->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$t_doituong_cuusv->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_cuusv->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
		$t_doituong_cuusv->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_cuusv;

		// Initialize URLs
		// Call Row_Rendering event

		$t_doituong_cuusv->Row_Rendering();

		// Common render codes for all row types
		// C_NAME

		$t_doituong_cuusv->C_NAME->CellCssStyle = ""; $t_doituong_cuusv->C_NAME->CellCssClass = "";
		$t_doituong_cuusv->C_NAME->CellAttrs = array(); $t_doituong_cuusv->C_NAME->ViewAttrs = array(); $t_doituong_cuusv->C_NAME->EditAttrs = array();

		// C_BELONGTO
		$t_doituong_cuusv->C_BELONGTO->CellCssStyle = ""; $t_doituong_cuusv->C_BELONGTO->CellCssClass = "";
		$t_doituong_cuusv->C_BELONGTO->CellAttrs = array(); $t_doituong_cuusv->C_BELONGTO->ViewAttrs = array(); $t_doituong_cuusv->C_BELONGTO->EditAttrs = array();

		// C_TYPE
		$t_doituong_cuusv->C_TYPE->CellCssStyle = ""; $t_doituong_cuusv->C_TYPE->CellCssClass = "";
		$t_doituong_cuusv->C_TYPE->CellAttrs = array(); $t_doituong_cuusv->C_TYPE->ViewAttrs = array(); $t_doituong_cuusv->C_TYPE->EditAttrs = array();

		// C_URL
		$t_doituong_cuusv->C_URL->CellCssStyle = ""; $t_doituong_cuusv->C_URL->CellCssClass = "";
		$t_doituong_cuusv->C_URL->CellAttrs = array(); $t_doituong_cuusv->C_URL->ViewAttrs = array(); $t_doituong_cuusv->C_URL->EditAttrs = array();

		// C_ORDER
		$t_doituong_cuusv->C_ORDER->CellCssStyle = ""; $t_doituong_cuusv->C_ORDER->CellCssClass = "";
		$t_doituong_cuusv->C_ORDER->CellAttrs = array(); $t_doituong_cuusv->C_ORDER->ViewAttrs = array(); $t_doituong_cuusv->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_doituong_cuusv->C_ACTIVE->CellCssStyle = ""; $t_doituong_cuusv->C_ACTIVE->CellCssClass = "";
		$t_doituong_cuusv->C_ACTIVE->CellAttrs = array(); $t_doituong_cuusv->C_ACTIVE->ViewAttrs = array(); $t_doituong_cuusv->C_ACTIVE->EditAttrs = array();

		// C_USER_ADD
		$t_doituong_cuusv->C_USER_ADD->CellCssStyle = ""; $t_doituong_cuusv->C_USER_ADD->CellCssClass = "";
		$t_doituong_cuusv->C_USER_ADD->CellAttrs = array(); $t_doituong_cuusv->C_USER_ADD->ViewAttrs = array(); $t_doituong_cuusv->C_USER_ADD->EditAttrs = array();

		// C_TIME_ADD
		$t_doituong_cuusv->C_TIME_ADD->CellCssStyle = ""; $t_doituong_cuusv->C_TIME_ADD->CellCssClass = "";
		$t_doituong_cuusv->C_TIME_ADD->CellAttrs = array(); $t_doituong_cuusv->C_TIME_ADD->ViewAttrs = array(); $t_doituong_cuusv->C_TIME_ADD->EditAttrs = array();

		// FK_CONGTY
		$t_doituong_cuusv->FK_CONGTY->CellCssStyle = ""; $t_doituong_cuusv->FK_CONGTY->CellCssClass = "";
		$t_doituong_cuusv->FK_CONGTY->CellAttrs = array(); $t_doituong_cuusv->FK_CONGTY->ViewAttrs = array(); $t_doituong_cuusv->FK_CONGTY->EditAttrs = array();
		if ($t_doituong_cuusv->RowType == EW_ROWTYPE_VIEW) { // View row

			// DTCUUSV_ID
			$t_doituong_cuusv->DTCUUSV_ID->ViewValue = $t_doituong_cuusv->DTCUUSV_ID->CurrentValue;
			$t_doituong_cuusv->DTCUUSV_ID->CssStyle = "";
			$t_doituong_cuusv->DTCUUSV_ID->CssClass = "";
			$t_doituong_cuusv->DTCUUSV_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_cuusv->C_NAME->ViewValue = $t_doituong_cuusv->C_NAME->CurrentValue;
			$t_doituong_cuusv->C_NAME->CssStyle = "";
			$t_doituong_cuusv->C_NAME->CssClass = "";
			$t_doituong_cuusv->C_NAME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_doituong_cuusv->C_BELONGTO->ViewValue = $t_doituong_cuusv->C_BELONGTO->CurrentValue;
			$t_doituong_cuusv->C_BELONGTO->CssStyle = "";
			$t_doituong_cuusv->C_BELONGTO->CssClass = "";
			$t_doituong_cuusv->C_BELONGTO->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_cuusv->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_cuusv->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_cuusv->C_TYPE->ViewValue = "Danh  muc 1 bai viet";
						break;
					case "1":
						$t_doituong_cuusv->C_TYPE->ViewValue = "Danh muc list bai viet";
						break;
					case "2":
						$t_doituong_cuusv->C_TYPE->ViewValue = "Danh m?c url lien ket";
						break;
					default:
						$t_doituong_cuusv->C_TYPE->ViewValue = $t_doituong_cuusv->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_cuusv->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_cuusv->C_TYPE->CssStyle = "";
			$t_doituong_cuusv->C_TYPE->CssClass = "";
			$t_doituong_cuusv->C_TYPE->ViewCustomAttributes = "";

			// C_URL
			$t_doituong_cuusv->C_URL->ViewValue = $t_doituong_cuusv->C_URL->CurrentValue;
			$t_doituong_cuusv->C_URL->CssStyle = "";
			$t_doituong_cuusv->C_URL->CssClass = "";
			$t_doituong_cuusv->C_URL->ViewCustomAttributes = "";

			// C_ORDER
			$t_doituong_cuusv->C_ORDER->ViewValue = $t_doituong_cuusv->C_ORDER->CurrentValue;
			$t_doituong_cuusv->C_ORDER->CssStyle = "";
			$t_doituong_cuusv->C_ORDER->CssClass = "";
			$t_doituong_cuusv->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_doituong_cuusv->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_doituong_cuusv->C_ACTIVE->CurrentValue) {
					case "0":
						$t_doituong_cuusv->C_ACTIVE->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$t_doituong_cuusv->C_ACTIVE->ViewValue = "<b>Kích hoạt</b>";
						break;
					default:
						$t_doituong_cuusv->C_ACTIVE->ViewValue = $t_doituong_cuusv->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_doituong_cuusv->C_ACTIVE->ViewValue = NULL;
			}
			$t_doituong_cuusv->C_ACTIVE->CssStyle = "";
			$t_doituong_cuusv->C_ACTIVE->CssClass = "";
			$t_doituong_cuusv->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_cuusv->C_USER_ADD->ViewValue = $t_doituong_cuusv->C_USER_ADD->CurrentValue;
			$t_doituong_cuusv->C_USER_ADD->CssStyle = "";
			$t_doituong_cuusv->C_USER_ADD->CssClass = "";
			$t_doituong_cuusv->C_USER_ADD->ViewCustomAttributes = "";

			// C_TIME_ADD
			$t_doituong_cuusv->C_TIME_ADD->ViewValue = $t_doituong_cuusv->C_TIME_ADD->CurrentValue;
			$t_doituong_cuusv->C_TIME_ADD->ViewValue = ew_FormatDateTime($t_doituong_cuusv->C_TIME_ADD->ViewValue, 7);
			$t_doituong_cuusv->C_TIME_ADD->CssStyle = "";
			$t_doituong_cuusv->C_TIME_ADD->CssClass = "";
			$t_doituong_cuusv->C_TIME_ADD->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_cuusv->C_USER_EDIT->ViewValue = $t_doituong_cuusv->C_USER_EDIT->CurrentValue;
			$t_doituong_cuusv->C_USER_EDIT->CssStyle = "";
			$t_doituong_cuusv->C_USER_EDIT->CssClass = "";
			$t_doituong_cuusv->C_USER_EDIT->ViewCustomAttributes = "";

			// C_TIME_EDIT
			$t_doituong_cuusv->C_TIME_EDIT->ViewValue = $t_doituong_cuusv->C_TIME_EDIT->CurrentValue;
			$t_doituong_cuusv->C_TIME_EDIT->ViewValue = ew_FormatDateTime($t_doituong_cuusv->C_TIME_EDIT->ViewValue, 7);
			$t_doituong_cuusv->C_TIME_EDIT->CssStyle = "";
			$t_doituong_cuusv->C_TIME_EDIT->CssClass = "";
			$t_doituong_cuusv->C_TIME_EDIT->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_doituong_cuusv->FK_CONGTY->ViewValue = $t_doituong_cuusv->FK_CONGTY->CurrentValue;
			$t_doituong_cuusv->FK_CONGTY->CssStyle = "";
			$t_doituong_cuusv->FK_CONGTY->CssClass = "";
			$t_doituong_cuusv->FK_CONGTY->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_cuusv->C_NAME->HrefValue = "";
			$t_doituong_cuusv->C_NAME->TooltipValue = "";

			// C_BELONGTO
			$t_doituong_cuusv->C_BELONGTO->HrefValue = "";
			$t_doituong_cuusv->C_BELONGTO->TooltipValue = "";

			// C_TYPE
			$t_doituong_cuusv->C_TYPE->HrefValue = "";
			$t_doituong_cuusv->C_TYPE->TooltipValue = "";

			// C_URL
			$t_doituong_cuusv->C_URL->HrefValue = "";
			$t_doituong_cuusv->C_URL->TooltipValue = "";

			// C_ORDER
			$t_doituong_cuusv->C_ORDER->HrefValue = "";
			$t_doituong_cuusv->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_doituong_cuusv->C_ACTIVE->HrefValue = "";
			$t_doituong_cuusv->C_ACTIVE->TooltipValue = "";

			// C_USER_ADD
			$t_doituong_cuusv->C_USER_ADD->HrefValue = "";
			$t_doituong_cuusv->C_USER_ADD->TooltipValue = "";

			// C_TIME_ADD
			$t_doituong_cuusv->C_TIME_ADD->HrefValue = "";
			$t_doituong_cuusv->C_TIME_ADD->TooltipValue = "";

			// FK_CONGTY
			$t_doituong_cuusv->FK_CONGTY->HrefValue = "";
			$t_doituong_cuusv->FK_CONGTY->TooltipValue = "";
		} elseif ($t_doituong_cuusv->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_NAME
			$t_doituong_cuusv->C_NAME->EditCustomAttributes = "";
			$t_doituong_cuusv->C_NAME->EditValue = ew_HtmlEncode($t_doituong_cuusv->C_NAME->CurrentValue);

			// C_BELONGTO
			$t_doituong_cuusv->C_BELONGTO->EditCustomAttributes = "";
			$t_doituong_cuusv->C_BELONGTO->EditValue = ew_HtmlEncode($t_doituong_cuusv->C_BELONGTO->CurrentValue);

			// C_TYPE
			$t_doituong_cuusv->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Danh mục 1 bài viết");
			$arwrk[] = array("1", "Danh mục list bài viết");
			$arwrk[] = array("2", "Danh mục liên kết url");
			$t_doituong_cuusv->C_TYPE->EditValue = $arwrk;

			// C_URL
			$t_doituong_cuusv->C_URL->EditCustomAttributes = "";
			$t_doituong_cuusv->C_URL->EditValue = ew_HtmlEncode($t_doituong_cuusv->C_URL->CurrentValue);

			// C_ACTIVE
			$t_doituong_cuusv->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_doituong_cuusv->C_ACTIVE->EditValue = $arwrk;

			// C_USER_ADD
			// C_TIME_ADD
			// FK_CONGTY

		}

		// Call Row Rendered event
		if ($t_doituong_cuusv->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_cuusv->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_doituong_cuusv;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_doituong_cuusv->C_NAME->FormValue) && $t_doituong_cuusv->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_cuusv->C_NAME->FldCaption();
		}
		if (!ew_CheckInteger($t_doituong_cuusv->C_BELONGTO->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_doituong_cuusv->C_BELONGTO->FldErrMsg();
		}
		if ($t_doituong_cuusv->C_TYPE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_cuusv->C_TYPE->FldCaption();
		}
	       if ($t_doituong_cuusv->C_TYPE->FormValue == "2") {
                        if (!is_null($t_doituong_cuusv->C_URL->FormValue) && $t_doituong_cuusv->C_URL->FormValue == "") {
                                $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                                $gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_cuusv->C_URL->FldCaption();
                        }
                        if (!filter_var ($t_doituong_cuusv->C_URL->FormValue,FILTER_VALIDATE_URL))
                        {
                         $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                         $gsFormError .= "Không đúng định dạng url" ;
                        }
                }
                if (!ew_CheckInteger($t_doituong_cuusv->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_doituong_cuusv->C_ORDER->FldErrMsg();
		}
		if ($t_doituong_cuusv->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_cuusv->C_ACTIVE->FldCaption();
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
		global $conn, $Language, $Security, $t_doituong_cuusv;
		$rsnew = array();

		// C_NAME
		$t_doituong_cuusv->C_NAME->SetDbValueDef($rsnew, $t_doituong_cuusv->C_NAME->CurrentValue, NULL, FALSE);

		// C_BELONGTO
		//$t_doituong_cuusv->C_BELONGTO->SetDbValueDef($rsnew, $t_doituong_cuusv->C_BELONGTO->CurrentValue, NULL, FALSE);
                // * BY QUANG HUNG
                if (($_SESSION['CSV_BELONGTO_ID'] == "") || (is_null($_SESSION['CSV_BELONGTO_ID'])))
                    {
                    $t_doituong_cuusv->C_BELONGTO->SetDbValueDef($rsnew, 0, 0, FALSE);
                    }
                    ELSE
                    {
                    $t_doituong_cuusv->C_BELONGTO->SetDbValueDef($rsnew,$_SESSION['CSV_BELONGTO_ID'],$_SESSION['CSV_BELONGTO_ID'] );
                    }
                
		// C_TYPE
		$t_doituong_cuusv->C_TYPE->SetDbValueDef($rsnew, $t_doituong_cuusv->C_TYPE->CurrentValue, NULL, FALSE);

		 if ($t_doituong_cuusv->C_TYPE->CurrentValue == '2' )
                 {    
		// C_URL
		 $t_doituong_cuusv->C_URL->SetDbValueDef($rsnew, $t_doituong_cuusv->C_URL->CurrentValue, NULL, FALSE);
                 }
                 else {$t_doituong_cuusv->C_URL->SetDbValueDef($rsnew, NULL, NULL, FALSE);} 
                     
		// C_ORDER
		$t_doituong_cuusv->C_ORDER->SetDbValueDef($rsnew, $t_doituong_cuusv->C_ORDER->CurrentValue, NULL, FALSE);

		// C_ACTIVE
		$t_doituong_cuusv->C_ACTIVE->SetDbValueDef($rsnew, $t_doituong_cuusv->C_ACTIVE->CurrentValue, NULL, FALSE);

		// C_USER_ADD
		$t_doituong_cuusv->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_doituong_cuusv->C_USER_ADD->DbValue;

		// C_TIME_ADD
		$t_doituong_cuusv->C_TIME_ADD->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_TIME_ADD'] =& $t_doituong_cuusv->C_TIME_ADD->DbValue;

		// FK_CONGTY
		$t_doituong_cuusv->FK_CONGTY->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['FK_CONGTY'] =& $t_doituong_cuusv->FK_CONGTY->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_doituong_cuusv->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_doituong_cuusv->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_doituong_cuusv->CancelMessage <> "") {
				$this->setMessage($t_doituong_cuusv->CancelMessage);
				$t_doituong_cuusv->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_doituong_cuusv->DTCUUSV_ID->setDbValue($conn->Insert_ID());
			$rsnew['DTCUUSV_ID'] = $t_doituong_cuusv->DTCUUSV_ID->DbValue;

			// Call Row Inserted event
			$t_doituong_cuusv->Row_Inserted($rsnew);
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