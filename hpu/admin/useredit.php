<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userinfo.php" ?>
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
$user_edit = new cuser_edit();
$Page =& $user_edit;

// Page init
$user_edit->Page_Init();

// Page main
$user_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_edit = new ew_Page("user_edit");

// page properties
user_edit.PageID = "edit"; // page ID
user_edit.FormID = "fuseredit"; // form ID
var EW_PAGE_ID = user_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
user_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($user->C_TENDANGNHAP->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($user->C_EMAIL->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
user_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
user_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_edit.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $user->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $user->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$user_edit->ShowMessage();
?>
<form name="fuseredit" id="fuseredit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return user_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="user">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<?php if ($user->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($user->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $user->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $user->C_TENDANGNHAP->CellAttributes() ?>><span id="el_C_TENDANGNHAP">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" title="<?php echo $user->C_TENDANGNHAP->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $user->C_TENDANGNHAP->EditValue ?>"<?php echo $user->C_TENDANGNHAP->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $user->C_TENDANGNHAP->ViewValue ?></div>
<input type="hidden" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" value="<?php echo ew_HtmlEncode($user->C_TENDANGNHAP->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_TENDANGNHAP->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $user->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_HOTEN->FldCaption() ?></td>
		<td<?php echo $user->C_HOTEN->CellAttributes() ?>><span id="el_C_HOTEN">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_HOTEN" id="x_C_HOTEN" title="<?php echo $user->C_HOTEN->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $user->C_HOTEN->EditValue ?>"<?php echo $user->C_HOTEN->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_HOTEN->ViewAttributes() ?>><?php echo $user->C_HOTEN->ViewValue ?></div>
<input type="hidden" name="x_C_HOTEN" id="x_C_HOTEN" value="<?php echo ew_HtmlEncode($user->C_HOTEN->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_HOTEN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $user->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $user->C_DIACHI->CellAttributes() ?>><span id="el_C_DIACHI">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_DIACHI" id="x_C_DIACHI" title="<?php echo $user->C_DIACHI->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $user->C_DIACHI->EditValue ?>"<?php echo $user->C_DIACHI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_DIACHI->ViewAttributes() ?>><?php echo $user->C_DIACHI->ViewValue ?></div>
<input type="hidden" name="x_C_DIACHI" id="x_C_DIACHI" value="<?php echo ew_HtmlEncode($user->C_DIACHI->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_DIACHI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $user->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL->FldCaption() ?></td>
		<td<?php echo $user->C_TEL->CellAttributes() ?>><span id="el_C_TEL">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL" id="x_C_TEL" title="<?php echo $user->C_TEL->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $user->C_TEL->EditValue ?>"<?php echo $user->C_TEL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_TEL->ViewAttributes() ?>><?php echo $user->C_TEL->ViewValue ?></div>
<input type="hidden" name="x_C_TEL" id="x_C_TEL" value="<?php echo ew_HtmlEncode($user->C_TEL->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_TEL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $user->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $user->C_TEL_HOME->CellAttributes() ?>><span id="el_C_TEL_HOME">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_HOME" id="x_C_TEL_HOME" title="<?php echo $user->C_TEL_HOME->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $user->C_TEL_HOME->EditValue ?>"<?php echo $user->C_TEL_HOME->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_TEL_HOME->ViewAttributes() ?>><?php echo $user->C_TEL_HOME->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_HOME" id="x_C_TEL_HOME" value="<?php echo ew_HtmlEncode($user->C_TEL_HOME->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_TEL_HOME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $user->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $user->C_TEL_MOBILE->CellAttributes() ?>><span id="el_C_TEL_MOBILE">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" title="<?php echo $user->C_TEL_MOBILE->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $user->C_TEL_MOBILE->EditValue ?>"<?php echo $user->C_TEL_MOBILE->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $user->C_TEL_MOBILE->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" value="<?php echo ew_HtmlEncode($user->C_TEL_MOBILE->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_TEL_MOBILE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $user->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_FAX->FldCaption() ?></td>
		<td<?php echo $user->C_FAX->CellAttributes() ?>><span id="el_C_FAX">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_FAX" id="x_C_FAX" title="<?php echo $user->C_FAX->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $user->C_FAX->EditValue ?>"<?php echo $user->C_FAX->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_FAX->ViewAttributes() ?>><?php echo $user->C_FAX->ViewValue ?></div>
<input type="hidden" name="x_C_FAX" id="x_C_FAX" value="<?php echo ew_HtmlEncode($user->C_FAX->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_FAX->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($user->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $user->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $user->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $user->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<?php if ($user->CurrentAction <> "F") { ?>
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $user->C_EMAIL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $user->C_EMAIL->EditValue ?>"<?php echo $user->C_EMAIL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $user->C_EMAIL->ViewAttributes() ?>><?php echo $user->C_EMAIL->ViewValue ?></div>
<input type="hidden" name="x_C_EMAIL" id="x_C_EMAIL" value="<?php echo ew_HtmlEncode($user->C_EMAIL->FormValue) ?>">
<?php } ?>
</span><?php echo $user->C_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_NGUOIDUNG_ID" id="x_PK_NGUOIDUNG_ID" value="<?php echo ew_HtmlEncode($user->PK_NGUOIDUNG_ID->CurrentValue) ?>">
<p>
<?php if ($user->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>" onclick="this.form.a_edit.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_edit.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($user->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$user_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cuser_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'user';

	// Page object name
	var $PageObjName = 'user_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // Add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cuser_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (user)
		$GLOBALS["user"] = new cuser();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

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
		global $user;

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
			$this->Page_Terminate("userlist.php");
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
		global $objForm, $Language, $gsFormError, $user;

		// Load key from QueryString
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "")
			$user->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$user->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$user->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$user->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$user->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($user->PK_NGUOIDUNG_ID->CurrentValue == "")
			$this->Page_Terminate("userlist.php"); // Invalid key, return to list
		switch ($user->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("userlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$user->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $user->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "userview.php")
						$sReturnUrl = $user->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$user->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		if ($user->CurrentAction == "F") { // Confirm page
			$user->RowType = EW_ROWTYPE_VIEW; // Render as View
		} else {
			$user->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		}
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $user;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $user;
		$user->C_TENDANGNHAP->setFormValue($objForm->GetValue("x_C_TENDANGNHAP"));
		$user->C_HOTEN->setFormValue($objForm->GetValue("x_C_HOTEN"));
		$user->C_DIACHI->setFormValue($objForm->GetValue("x_C_DIACHI"));
		$user->C_TEL->setFormValue($objForm->GetValue("x_C_TEL"));
		$user->C_TEL_HOME->setFormValue($objForm->GetValue("x_C_TEL_HOME"));
		$user->C_TEL_MOBILE->setFormValue($objForm->GetValue("x_C_TEL_MOBILE"));
		$user->C_FAX->setFormValue($objForm->GetValue("x_C_FAX"));
		$user->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$user->PK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_PK_NGUOIDUNG_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $user;
		$user->PK_NGUOIDUNG_ID->CurrentValue = $user->PK_NGUOIDUNG_ID->FormValue;
		$this->LoadRow();
		$user->C_TENDANGNHAP->CurrentValue = $user->C_TENDANGNHAP->FormValue;
		$user->C_HOTEN->CurrentValue = $user->C_HOTEN->FormValue;
		$user->C_DIACHI->CurrentValue = $user->C_DIACHI->FormValue;
		$user->C_TEL->CurrentValue = $user->C_TEL->FormValue;
		$user->C_TEL_HOME->CurrentValue = $user->C_TEL_HOME->FormValue;
		$user->C_TEL_MOBILE->CurrentValue = $user->C_TEL_MOBILE->FormValue;
		$user->C_FAX->CurrentValue = $user->C_FAX->FormValue;
		$user->C_EMAIL->CurrentValue = $user->C_EMAIL->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load SQL based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$user->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $user;
		$user->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$user->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$user->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$user->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$user->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$user->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$user->C_TEL->setDbValue($rs->fields('C_TEL'));
		$user->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$user->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$user->C_FAX->setDbValue($rs->fields('C_FAX'));
		$user->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$user->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $user;

		// Initialize URLs
		// Call Row_Rendering event

		$user->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$user->C_TENDANGNHAP->CellCssStyle = ""; $user->C_TENDANGNHAP->CellCssClass = "";
		$user->C_TENDANGNHAP->CellAttrs = array(); $user->C_TENDANGNHAP->ViewAttrs = array(); $user->C_TENDANGNHAP->EditAttrs = array();

		// C_HOTEN
		$user->C_HOTEN->CellCssStyle = ""; $user->C_HOTEN->CellCssClass = "";
		$user->C_HOTEN->CellAttrs = array(); $user->C_HOTEN->ViewAttrs = array(); $user->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$user->C_DIACHI->CellCssStyle = ""; $user->C_DIACHI->CellCssClass = "";
		$user->C_DIACHI->CellAttrs = array(); $user->C_DIACHI->ViewAttrs = array(); $user->C_DIACHI->EditAttrs = array();

		// C_TEL
		$user->C_TEL->CellCssStyle = ""; $user->C_TEL->CellCssClass = "";
		$user->C_TEL->CellAttrs = array(); $user->C_TEL->ViewAttrs = array(); $user->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$user->C_TEL_HOME->CellCssStyle = ""; $user->C_TEL_HOME->CellCssClass = "";
		$user->C_TEL_HOME->CellAttrs = array(); $user->C_TEL_HOME->ViewAttrs = array(); $user->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$user->C_TEL_MOBILE->CellCssStyle = ""; $user->C_TEL_MOBILE->CellCssClass = "";
		$user->C_TEL_MOBILE->CellAttrs = array(); $user->C_TEL_MOBILE->ViewAttrs = array(); $user->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$user->C_FAX->CellCssStyle = ""; $user->C_FAX->CellCssClass = "";
		$user->C_FAX->CellAttrs = array(); $user->C_FAX->ViewAttrs = array(); $user->C_FAX->EditAttrs = array();

		// C_EMAIL
		$user->C_EMAIL->CellCssStyle = ""; $user->C_EMAIL->CellCssClass = "";
		$user->C_EMAIL->CellAttrs = array(); $user->C_EMAIL->ViewAttrs = array(); $user->C_EMAIL->EditAttrs = array();
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$user->PK_NGUOIDUNG_ID->ViewValue = $user->PK_NGUOIDUNG_ID->CurrentValue;
			$user->PK_NGUOIDUNG_ID->CssStyle = "";
			$user->PK_NGUOIDUNG_ID->CssClass = "";
			$user->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->ViewValue = $user->C_TENDANGNHAP->CurrentValue;
			$user->C_TENDANGNHAP->CssStyle = "";
			$user->C_TENDANGNHAP->CssClass = "";
			$user->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$user->C_MATKHAU->ViewValue = $user->C_MATKHAU->CurrentValue;
			$user->C_MATKHAU->CssStyle = "";
			$user->C_MATKHAU->CssClass = "";
			$user->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$user->FK_MACONGTY->ViewValue = $user->FK_MACONGTY->CurrentValue;
			if (strval($user->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($user->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$user->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$user->FK_MACONGTY->ViewValue = $user->FK_MACONGTY->CurrentValue;
				}
			} else {
				$user->FK_MACONGTY->ViewValue = NULL;
			}
			$user->FK_MACONGTY->CssStyle = "";
			$user->FK_MACONGTY->CssClass = "";
			$user->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$user->C_HOTEN->ViewValue = $user->C_HOTEN->CurrentValue;
			$user->C_HOTEN->CssStyle = "";
			$user->C_HOTEN->CssClass = "";
			$user->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$user->C_DIACHI->ViewValue = $user->C_DIACHI->CurrentValue;
			$user->C_DIACHI->CssStyle = "";
			$user->C_DIACHI->CssClass = "";
			$user->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$user->C_TEL->ViewValue = $user->C_TEL->CurrentValue;
			$user->C_TEL->CssStyle = "";
			$user->C_TEL->CssClass = "";
			$user->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$user->C_TEL_HOME->ViewValue = $user->C_TEL_HOME->CurrentValue;
			$user->C_TEL_HOME->CssStyle = "";
			$user->C_TEL_HOME->CssClass = "";
			$user->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->ViewValue = $user->C_TEL_MOBILE->CurrentValue;
			$user->C_TEL_MOBILE->CssStyle = "";
			$user->C_TEL_MOBILE->CssClass = "";
			$user->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$user->C_FAX->ViewValue = $user->C_FAX->CurrentValue;
			$user->C_FAX->CssStyle = "";
			$user->C_FAX->CssClass = "";
			$user->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$user->C_EMAIL->ViewValue = $user->C_EMAIL->CurrentValue;
			$user->C_EMAIL->CssStyle = "";
			$user->C_EMAIL->CssClass = "";
			$user->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($user->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($user->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$user->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$user->FK_USERLEVELID->ViewValue = $user->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$user->FK_USERLEVELID->ViewValue = NULL;
			}
			$user->FK_USERLEVELID->CssStyle = "";
			$user->FK_USERLEVELID->CssClass = "";
			$user->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->HrefValue = "";
			$user->C_TENDANGNHAP->TooltipValue = "";

			// C_HOTEN
			$user->C_HOTEN->HrefValue = "";
			$user->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$user->C_DIACHI->HrefValue = "";
			$user->C_DIACHI->TooltipValue = "";

			// C_TEL
			$user->C_TEL->HrefValue = "";
			$user->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$user->C_TEL_HOME->HrefValue = "";
			$user->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->HrefValue = "";
			$user->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$user->C_FAX->HrefValue = "";
			$user->C_FAX->TooltipValue = "";

			// C_EMAIL
			$user->C_EMAIL->HrefValue = "";
			$user->C_EMAIL->TooltipValue = "";
		} elseif ($user->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->EditCustomAttributes = "";
			$user->C_TENDANGNHAP->EditValue = ew_HtmlEncode($user->C_TENDANGNHAP->CurrentValue);

			// C_HOTEN
			$user->C_HOTEN->EditCustomAttributes = "";
			$user->C_HOTEN->EditValue = ew_HtmlEncode($user->C_HOTEN->CurrentValue);

			// C_DIACHI
			$user->C_DIACHI->EditCustomAttributes = "";
			$user->C_DIACHI->EditValue = ew_HtmlEncode($user->C_DIACHI->CurrentValue);

			// C_TEL
			$user->C_TEL->EditCustomAttributes = "";
			$user->C_TEL->EditValue = ew_HtmlEncode($user->C_TEL->CurrentValue);

			// C_TEL_HOME
			$user->C_TEL_HOME->EditCustomAttributes = "";
			$user->C_TEL_HOME->EditValue = ew_HtmlEncode($user->C_TEL_HOME->CurrentValue);

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->EditCustomAttributes = "";
			$user->C_TEL_MOBILE->EditValue = ew_HtmlEncode($user->C_TEL_MOBILE->CurrentValue);

			// C_FAX
			$user->C_FAX->EditCustomAttributes = "";
			$user->C_FAX->EditValue = ew_HtmlEncode($user->C_FAX->CurrentValue);

			// C_EMAIL
			$user->C_EMAIL->EditCustomAttributes = "";
			$user->C_EMAIL->EditValue = ew_HtmlEncode($user->C_EMAIL->CurrentValue);

			// Edit refer script
			// C_TENDANGNHAP

			$user->C_TENDANGNHAP->HrefValue = "";

			// C_HOTEN
			$user->C_HOTEN->HrefValue = "";

			// C_DIACHI
			$user->C_DIACHI->HrefValue = "";

			// C_TEL
			$user->C_TEL->HrefValue = "";

			// C_TEL_HOME
			$user->C_TEL_HOME->HrefValue = "";

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->HrefValue = "";

			// C_FAX
			$user->C_FAX->HrefValue = "";

			// C_EMAIL
			$user->C_EMAIL->HrefValue = "";
		}

		// Call Row Rendered event
		if ($user->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$user->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $user;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($user->C_TENDANGNHAP->FormValue) && $user->C_TENDANGNHAP->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $user->C_TENDANGNHAP->FldCaption();
		}
		if (!is_null($user->C_EMAIL->FormValue) && $user->C_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $user->C_EMAIL->FldCaption();
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
		global $conn, $Security, $Language, $user;
		$sFilter = $user->KeyFilter();
			if ($user->C_TENDANGNHAP->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(t_nguoidung.C_TENDANGNHAP = '" . ew_AdjustSql($user->C_TENDANGNHAP->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$user->CurrentFilter = $sFilterChk;
			$sSqlChk = $user->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'C_TENDANGNHAP', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $user->C_TENDANGNHAP->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
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

			// C_TENDANGNHAP
			$user->C_TENDANGNHAP->SetDbValueDef($rsnew, $user->C_TENDANGNHAP->CurrentValue, "", FALSE);

			// C_HOTEN
			$user->C_HOTEN->SetDbValueDef($rsnew, $user->C_HOTEN->CurrentValue, NULL, FALSE);

			// C_DIACHI
			$user->C_DIACHI->SetDbValueDef($rsnew, $user->C_DIACHI->CurrentValue, NULL, FALSE);

			// C_TEL
			$user->C_TEL->SetDbValueDef($rsnew, $user->C_TEL->CurrentValue, NULL, FALSE);

			// C_TEL_HOME
			$user->C_TEL_HOME->SetDbValueDef($rsnew, $user->C_TEL_HOME->CurrentValue, NULL, FALSE);

			// C_TEL_MOBILE
			$user->C_TEL_MOBILE->SetDbValueDef($rsnew, $user->C_TEL_MOBILE->CurrentValue, NULL, FALSE);

			// C_FAX
			$user->C_FAX->SetDbValueDef($rsnew, $user->C_FAX->CurrentValue, NULL, FALSE);

			// C_EMAIL
			$user->C_EMAIL->SetDbValueDef($rsnew, $user->C_EMAIL->CurrentValue, NULL, FALSE);

			// Call Row Updating event
			$bUpdateRow = $user->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($user->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($user->CancelMessage <> "") {
					$this->setMessage($user->CancelMessage);
					$user->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$user->Row_Updated($rsold, $rsnew);
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
