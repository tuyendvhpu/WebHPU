<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
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
$register = new cregister();
$Page =& $register;

// Page init
$register->Page_Init();

// Page main
$register->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var register = new ew_Page("register");

// page properties
register.PageID = "register"; // page ID
register.FormID = "ft_nguoidungregister"; // form ID
var EW_PAGE_ID = register.PageID; // for backward compatibility

// extend page with ValidateForm function
register.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_TENDANGNHAP"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_nguoidung->C_TENDANGNHAP->FldCaption()) ?>");
		if (fobj.x_C_TENDANGNHAP && !ew_HasValue(fobj.x_C_TENDANGNHAP))
			return ew_OnError(this, fobj.x_C_TENDANGNHAP, ewLanguage.Phrase("EnterUserName"));
		if (fobj.x_C_MATKHAU && !ew_HasValue(fobj.x_C_MATKHAU))
			return ew_OnError(this, fobj.x_C_MATKHAU, ewLanguage.Phrase("EnterPassword"));
		if (fobj.c_C_MATKHAU.value != fobj.x_C_MATKHAU.value)
			return ew_OnError(this, fobj.c_C_MATKHAU, ewLanguage.Phrase("MismatchPassword"));

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
register.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
register.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
register.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
register.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("RegisterPage") ?><br><br>
<a href="login.php"><?php echo $Language->Phrase("BackToLogin") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$register->ShowMessage();
?>
<form name="ft_nguoidungregister" id="ft_nguoidungregister" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return register.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_nguoidung">
<input type="hidden" name="a_register" id="a_register" value="A">
<?php if ($t_nguoidung->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table class="ewTable">
	<tr<?php echo $t_nguoidung->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nguoidung->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_nguoidung->C_TENDANGNHAP->CellAttributes() ?>><span id="el_C_TENDANGNHAP">
<?php if ($t_nguoidung->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" title="<?php echo $t_nguoidung->C_TENDANGNHAP->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_nguoidung->C_TENDANGNHAP->EditValue ?>"<?php echo $t_nguoidung->C_TENDANGNHAP->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_nguoidung->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $t_nguoidung->C_TENDANGNHAP->ViewValue ?></div>
<input type="hidden" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" value="<?php echo ew_HtmlEncode($t_nguoidung->C_TENDANGNHAP->FormValue) ?>">
<?php } ?>
</span><?php echo $t_nguoidung->C_TENDANGNHAP->CustomMsg ?></td>
	</tr>
	<tr<?php echo $t_nguoidung->C_MATKHAU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nguoidung->C_MATKHAU->FldCaption() ?></td>
		<td<?php echo $t_nguoidung->C_MATKHAU->CellAttributes() ?>><span id="el_C_MATKHAU">
<?php if ($t_nguoidung->CurrentAction <> "F") { ?>
<input type="text" name="x_C_MATKHAU" id="x_C_MATKHAU" title="<?php echo $t_nguoidung->C_MATKHAU->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_nguoidung->C_MATKHAU->EditValue ?>"<?php echo $t_nguoidung->C_MATKHAU->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_nguoidung->C_MATKHAU->ViewAttributes() ?>><?php echo $t_nguoidung->C_MATKHAU->ViewValue ?></div>
<input type="hidden" name="x_C_MATKHAU" id="x_C_MATKHAU" value="<?php echo ew_HtmlEncode($t_nguoidung->C_MATKHAU->FormValue) ?>">
<?php } ?>
</span><?php echo $t_nguoidung->C_MATKHAU->CustomMsg ?></td>
	</tr>
	<tr<?php echo $t_nguoidung->C_MATKHAU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $Language->Phrase("Confirm") ?>&nbsp;<?php echo $t_nguoidung->C_MATKHAU->FldCaption() ?></td>
		<td<?php echo $t_nguoidung->C_MATKHAU->CellAttributes() ?>>
<?php if ($t_nguoidung->CurrentAction <> "F") { ?>
<input type="text" name="c_C_MATKHAU" id="c_C_MATKHAU" title="<?php echo $t_nguoidung->C_MATKHAU->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_nguoidung->C_MATKHAU->EditValue ?>"<?php echo $t_nguoidung->C_MATKHAU->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_nguoidung->C_MATKHAU->ViewAttributes() ?>><?php echo $t_nguoidung->C_MATKHAU->ViewValue ?></div>
<input type="hidden" name="c_C_MATKHAU" id="c_C_MATKHAU" value="<?php echo ew_HtmlEncode($t_nguoidung->C_MATKHAU->FormValue) ?>">
<?php } ?>
</td>
	</tr>
	<tr<?php echo $t_nguoidung->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nguoidung->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $t_nguoidung->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<?php if ($t_nguoidung->CurrentAction <> "F") { ?>
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $t_nguoidung->C_EMAIL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_nguoidung->C_EMAIL->EditValue ?>"<?php echo $t_nguoidung->C_EMAIL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_nguoidung->C_EMAIL->ViewAttributes() ?>><?php echo $t_nguoidung->C_EMAIL->ViewValue ?></div>
<input type="hidden" name="x_C_EMAIL" id="x_C_EMAIL" value="<?php echo ew_HtmlEncode($t_nguoidung->C_EMAIL->FormValue) ?>">
<?php } ?>
</span><?php echo $t_nguoidung->C_EMAIL->CustomMsg ?></td>
	</tr>
</table>
</div>
</td></tr></table>
<p>
<?php if ($t_nguoidung->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("RegisterBtn")) ?>" onclick="this.form.a_register.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_register.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($t_nguoidung->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$register->Page_Terminate();
?>
<?php

//
// Page class
//
class cregister {

	// Page ID
	var $PageID = 'register';

	// Page object name
	var $PageObjName = 'register';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
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
		return TRUE;
	}

	//
	// Page class constructor
	//
	function cregister() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nguoidung)
		$GLOBALS["t_nguoidung"] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'register', TRUE);

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
		global $t_nguoidung;

		// User profile
		$UserProfile = new cUserProfile();
		$UserProfile->LoadProfile(@$_SESSION[EW_SESSION_USER_PROFILE]);

		// Security
		$Security = new cAdvancedSecurity();

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

	//
	// Page main
	//
	function Page_Main() {
		global $conn, $Security, $Language, $gsFormError, $objForm, $t_nguoidung;
		$bUserExists = FALSE;
		if (@$_POST["a_register"] <> "") {

			// Get action
			$t_nguoidung->CurrentAction = $_POST["a_register"];
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_nguoidung->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else {
			$t_nguoidung->CurrentAction = "I"; // Display blank record
			$this->LoadDefaultValues(); // Load default values
		}
		switch ($t_nguoidung->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "A": // Add

				// Check for duplicate User ID
				$sFilter = str_replace("%u", ew_AdjustSql($t_nguoidung->C_TENDANGNHAP->CurrentValue), EW_USER_NAME_FILTER);

				// Set up filter (SQL WHERE clause) and get return SQL
				// SQL constructor in t_nguoidung class, t_nguoidunginfo.php

				$t_nguoidung->CurrentFilter = $sFilter;
				$sUserSql = $t_nguoidung->SQL();
				if ($rs = $conn->Execute($sUserSql)) {
					if (!$rs->EOF) {
						$bUserExists = TRUE;
						$this->RestoreFormValues(); // Restore form values
						$this->setMessage($Language->Phrase("UserExists")); // Set user exist message
					}
					$rs->Close();
				}
				if (!$bUserExists) {
					$t_nguoidung->SendEmail = TRUE; // Send email on add success
					if ($this->AddRow()) { // Add record
						$this->setMessage($Language->Phrase("RegisterSuccess")); // Register success
						$this->Page_Terminate("login.php"); // Return
					} else {
						$this->RestoreFormValues(); // Restore form values
					}
				}
		}

		// Render row
		if ($t_nguoidung->CurrentAction == "F") { // Confirm page
			$t_nguoidung->RowType = EW_ROWTYPE_VIEW; // Render view
		} else {
			$t_nguoidung->RowType = EW_ROWTYPE_ADD; // Render add
		}
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_nguoidung;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_nguoidung;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_nguoidung;
		$t_nguoidung->C_TENDANGNHAP->setFormValue($objForm->GetValue("x_C_TENDANGNHAP"));
		$t_nguoidung->C_MATKHAU->setFormValue($objForm->GetValue("x_C_MATKHAU"));
		$t_nguoidung->C_MATKHAU->ConfirmValue = $objForm->GetValue("c_C_MATKHAU");
		$t_nguoidung->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$t_nguoidung->PK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_PK_NGUOIDUNG_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_nguoidung;
		$t_nguoidung->PK_NGUOIDUNG_ID->CurrentValue = $t_nguoidung->PK_NGUOIDUNG_ID->FormValue;
		$t_nguoidung->C_TENDANGNHAP->CurrentValue = $t_nguoidung->C_TENDANGNHAP->FormValue;
		$t_nguoidung->C_MATKHAU->CurrentValue = $t_nguoidung->C_MATKHAU->FormValue;
		$t_nguoidung->C_EMAIL->CurrentValue = $t_nguoidung->C_EMAIL->FormValue;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_nguoidung;

		// Initialize URLs
		// Call Row_Rendering event

		$t_nguoidung->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$t_nguoidung->C_TENDANGNHAP->CellCssStyle = ""; $t_nguoidung->C_TENDANGNHAP->CellCssClass = "";
		$t_nguoidung->C_TENDANGNHAP->CellAttrs = array(); $t_nguoidung->C_TENDANGNHAP->ViewAttrs = array(); $t_nguoidung->C_TENDANGNHAP->EditAttrs = array();

		// C_MATKHAU
		$t_nguoidung->C_MATKHAU->CellCssStyle = ""; $t_nguoidung->C_MATKHAU->CellCssClass = "";
		$t_nguoidung->C_MATKHAU->CellAttrs = array(); $t_nguoidung->C_MATKHAU->ViewAttrs = array(); $t_nguoidung->C_MATKHAU->EditAttrs = array();

		// C_EMAIL
		$t_nguoidung->C_EMAIL->CellCssStyle = ""; $t_nguoidung->C_EMAIL->CellCssClass = "";
		$t_nguoidung->C_EMAIL->CellAttrs = array(); $t_nguoidung->C_EMAIL->ViewAttrs = array(); $t_nguoidung->C_EMAIL->EditAttrs = array();
		if ($t_nguoidung->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$t_nguoidung->PK_NGUOIDUNG_ID->ViewValue = $t_nguoidung->PK_NGUOIDUNG_ID->CurrentValue;
			$t_nguoidung->PK_NGUOIDUNG_ID->CssStyle = "";
			$t_nguoidung->PK_NGUOIDUNG_ID->CssClass = "";
			$t_nguoidung->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// FK_MACONGTY
			$t_nguoidung->FK_MACONGTY->ViewValue = $t_nguoidung->FK_MACONGTY->CurrentValue;
			$t_nguoidung->FK_MACONGTY->CssStyle = "";
			$t_nguoidung->FK_MACONGTY->CssClass = "";
			$t_nguoidung->FK_MACONGTY->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$t_nguoidung->C_TENDANGNHAP->ViewValue = $t_nguoidung->C_TENDANGNHAP->CurrentValue;
			$t_nguoidung->C_TENDANGNHAP->CssStyle = "";
			$t_nguoidung->C_TENDANGNHAP->CssClass = "";
			$t_nguoidung->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$t_nguoidung->C_MATKHAU->ViewValue = $t_nguoidung->C_MATKHAU->CurrentValue;
			$t_nguoidung->C_MATKHAU->CssStyle = "";
			$t_nguoidung->C_MATKHAU->CssClass = "";
			$t_nguoidung->C_MATKHAU->ViewCustomAttributes = "";

			// C_HOTEN
			$t_nguoidung->C_HOTEN->ViewValue = $t_nguoidung->C_HOTEN->CurrentValue;
			$t_nguoidung->C_HOTEN->CssStyle = "";
			$t_nguoidung->C_HOTEN->CssClass = "";
			$t_nguoidung->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$t_nguoidung->C_DIACHI->ViewValue = $t_nguoidung->C_DIACHI->CurrentValue;
			$t_nguoidung->C_DIACHI->CssStyle = "";
			$t_nguoidung->C_DIACHI->CssClass = "";
			$t_nguoidung->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$t_nguoidung->C_TEL->ViewValue = $t_nguoidung->C_TEL->CurrentValue;
			$t_nguoidung->C_TEL->CssStyle = "";
			$t_nguoidung->C_TEL->CssClass = "";
			$t_nguoidung->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$t_nguoidung->C_TEL_HOME->ViewValue = $t_nguoidung->C_TEL_HOME->CurrentValue;
			$t_nguoidung->C_TEL_HOME->CssStyle = "";
			$t_nguoidung->C_TEL_HOME->CssClass = "";
			$t_nguoidung->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$t_nguoidung->C_TEL_MOBILE->ViewValue = $t_nguoidung->C_TEL_MOBILE->CurrentValue;
			$t_nguoidung->C_TEL_MOBILE->CssStyle = "";
			$t_nguoidung->C_TEL_MOBILE->CssClass = "";
			$t_nguoidung->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$t_nguoidung->C_FAX->ViewValue = $t_nguoidung->C_FAX->CurrentValue;
			$t_nguoidung->C_FAX->CssStyle = "";
			$t_nguoidung->C_FAX->CssClass = "";
			$t_nguoidung->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$t_nguoidung->C_EMAIL->ViewValue = $t_nguoidung->C_EMAIL->CurrentValue;
			$t_nguoidung->C_EMAIL->CssStyle = "";
			$t_nguoidung->C_EMAIL->CssClass = "";
			$t_nguoidung->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if ($Security->CanAdmin()) { // System admin
			if (strval($t_nguoidung->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($t_nguoidung->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nguoidung->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$t_nguoidung->FK_USERLEVELID->ViewValue = $t_nguoidung->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$t_nguoidung->FK_USERLEVELID->ViewValue = NULL;
			}
			} else {
				$t_nguoidung->FK_USERLEVELID->ViewValue = "********";
			}
			$t_nguoidung->FK_USERLEVELID->CssStyle = "";
			$t_nguoidung->FK_USERLEVELID->CssClass = "";
			$t_nguoidung->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$t_nguoidung->C_TENDANGNHAP->HrefValue = "";
			$t_nguoidung->C_TENDANGNHAP->TooltipValue = "";

			// C_MATKHAU
			$t_nguoidung->C_MATKHAU->HrefValue = "";
			$t_nguoidung->C_MATKHAU->TooltipValue = "";

			// C_EMAIL
			$t_nguoidung->C_EMAIL->HrefValue = "";
			$t_nguoidung->C_EMAIL->TooltipValue = "";
		} elseif ($t_nguoidung->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_TENDANGNHAP
			$t_nguoidung->C_TENDANGNHAP->EditCustomAttributes = "";
			$t_nguoidung->C_TENDANGNHAP->EditValue = ew_HtmlEncode($t_nguoidung->C_TENDANGNHAP->CurrentValue);

			// C_MATKHAU
			$t_nguoidung->C_MATKHAU->EditCustomAttributes = "";
			$t_nguoidung->C_MATKHAU->EditValue = ew_HtmlEncode($t_nguoidung->C_MATKHAU->CurrentValue);

			// C_EMAIL
			$t_nguoidung->C_EMAIL->EditCustomAttributes = "";
			$t_nguoidung->C_EMAIL->EditValue = ew_HtmlEncode($t_nguoidung->C_EMAIL->CurrentValue);
		}

		// Call Row Rendered event
		if ($t_nguoidung->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_nguoidung->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_nguoidung;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_nguoidung->C_TENDANGNHAP->FormValue) && $t_nguoidung->C_TENDANGNHAP->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_nguoidung->C_TENDANGNHAP->FldCaption();
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
		global $conn, $Language, $Security, $t_nguoidung;
		$rsnew = array();

		// C_TENDANGNHAP
		$t_nguoidung->C_TENDANGNHAP->SetDbValueDef($rsnew, $t_nguoidung->C_TENDANGNHAP->CurrentValue, "", FALSE);

		// C_MATKHAU
		$t_nguoidung->C_MATKHAU->SetDbValueDef($rsnew, $t_nguoidung->C_MATKHAU->CurrentValue, NULL, FALSE);

		// C_EMAIL
		$t_nguoidung->C_EMAIL->SetDbValueDef($rsnew, $t_nguoidung->C_EMAIL->CurrentValue, NULL, FALSE);

		// PK_NGUOIDUNG_ID
		// Call Row Inserting event

		$bInsertRow = $t_nguoidung->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_nguoidung->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_nguoidung->CancelMessage <> "") {
				$this->setMessage($t_nguoidung->CancelMessage);
				$t_nguoidung->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_nguoidung->PK_NGUOIDUNG_ID->setDbValue($conn->Insert_ID());
			$rsnew['PK_NGUOIDUNG_ID'] = $t_nguoidung->PK_NGUOIDUNG_ID->DbValue;

			// Call Row Inserted event
			$t_nguoidung->Row_Inserted($rsnew);

			// Call User Registered event
			$this->User_Registered($rsnew);
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

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// User Registered event
	function User_Registered(&$rs) {

	  //echo "User_Registered";
	}

	// User Activated event
	function User_Activated(&$s) {

	  //echo "User_Activated";
	}
}
?>
