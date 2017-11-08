<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersadmininfo.php" ?>
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
$usersadmin_edit = new cusersadmin_edit();
$Page =& $usersadmin_edit;

// Page init
$usersadmin_edit->Page_Init();

// Page main
$usersadmin_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var usersadmin_edit = new ew_Page("usersadmin_edit");

// page properties
usersadmin_edit.PageID = "edit"; // page ID
usersadmin_edit.FormID = "fusersadminedit"; // form ID
var EW_PAGE_ID = usersadmin_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
usersadmin_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_MATKHAU"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($usersadmin->C_MATKHAU->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($usersadmin->C_EMAIL->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FK_USERLEVELID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($usersadmin->FK_USERLEVELID->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
usersadmin_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
usersadmin_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
usersadmin_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
usersadmin_edit.ValidateRequired = false; // no JavaScript validation
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
								<?php //echo $Language->Phrase("View") ?>&nbsp;<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $usersadmin->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $usersadmin->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$usersadmin_edit->ShowMessage();
?>
<form name="fusersadminedit" id="fusersadminedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return usersadmin_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="usersadmin">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<?php if ($usersadmin->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($usersadmin->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $usersadmin->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $usersadmin->C_TENDANGNHAP->CellAttributes() ?>><span id="el_C_TENDANGNHAP">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<div<?php echo $usersadmin->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $usersadmin->C_TENDANGNHAP->EditValue ?></div><input type="hidden" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" value="<?php echo ew_HtmlEncode($usersadmin->C_TENDANGNHAP->CurrentValue) ?>">
<?php } else { ?>
<div<?php echo $usersadmin->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $usersadmin->C_TENDANGNHAP->ViewValue ?></div>
<input type="hidden" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" value="<?php echo ew_HtmlEncode($usersadmin->C_TENDANGNHAP->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_TENDANGNHAP->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_MATKHAU->Visible) { // C_MATKHAU ?>
	<tr<?php echo $usersadmin->C_MATKHAU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_MATKHAU->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $usersadmin->C_MATKHAU->CellAttributes() ?>><span id="el_C_MATKHAU">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="password" name="x_C_MATKHAU" id="x_C_MATKHAU" title="<?php echo $usersadmin->C_MATKHAU->FldTitle() ?>" value="<?php echo $usersadmin->C_MATKHAU->EditValue ?>" size="30" maxlength="100"<?php echo $usersadmin->C_MATKHAU->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_MATKHAU->ViewAttributes() ?>><?php echo $usersadmin->C_MATKHAU->ViewValue ?></div>
<input type="hidden" name="x_C_MATKHAU" id="x_C_MATKHAU" value="<?php echo ew_HtmlEncode($usersadmin->C_MATKHAU->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_MATKHAU->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $usersadmin->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_HOTEN->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_HOTEN->CellAttributes() ?>><span id="el_C_HOTEN">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_HOTEN" id="x_C_HOTEN" title="<?php echo $usersadmin->C_HOTEN->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $usersadmin->C_HOTEN->EditValue ?>"<?php echo $usersadmin->C_HOTEN->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_HOTEN->ViewAttributes() ?>><?php echo $usersadmin->C_HOTEN->ViewValue ?></div>
<input type="hidden" name="x_C_HOTEN" id="x_C_HOTEN" value="<?php echo ew_HtmlEncode($usersadmin->C_HOTEN->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_HOTEN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $usersadmin->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_DIACHI->CellAttributes() ?>><span id="el_C_DIACHI">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_DIACHI" id="x_C_DIACHI" title="<?php echo $usersadmin->C_DIACHI->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $usersadmin->C_DIACHI->EditValue ?>"<?php echo $usersadmin->C_DIACHI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_DIACHI->ViewAttributes() ?>><?php echo $usersadmin->C_DIACHI->ViewValue ?></div>
<input type="hidden" name="x_C_DIACHI" id="x_C_DIACHI" value="<?php echo ew_HtmlEncode($usersadmin->C_DIACHI->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_DIACHI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $usersadmin->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL->CellAttributes() ?>><span id="el_C_TEL">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL" id="x_C_TEL" title="<?php echo $usersadmin->C_TEL->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $usersadmin->C_TEL->EditValue ?>"<?php echo $usersadmin->C_TEL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_TEL->ViewAttributes() ?>><?php echo $usersadmin->C_TEL->ViewValue ?></div>
<input type="hidden" name="x_C_TEL" id="x_C_TEL" value="<?php echo ew_HtmlEncode($usersadmin->C_TEL->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_TEL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $usersadmin->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL_HOME->CellAttributes() ?>><span id="el_C_TEL_HOME">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_HOME" id="x_C_TEL_HOME" title="<?php echo $usersadmin->C_TEL_HOME->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $usersadmin->C_TEL_HOME->EditValue ?>"<?php echo $usersadmin->C_TEL_HOME->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_TEL_HOME->ViewAttributes() ?>><?php echo $usersadmin->C_TEL_HOME->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_HOME" id="x_C_TEL_HOME" value="<?php echo ew_HtmlEncode($usersadmin->C_TEL_HOME->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_TEL_HOME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $usersadmin->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_TEL_MOBILE->CellAttributes() ?>><span id="el_C_TEL_MOBILE">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" title="<?php echo $usersadmin->C_TEL_MOBILE->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $usersadmin->C_TEL_MOBILE->EditValue ?>"<?php echo $usersadmin->C_TEL_MOBILE->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $usersadmin->C_TEL_MOBILE->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" value="<?php echo ew_HtmlEncode($usersadmin->C_TEL_MOBILE->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_TEL_MOBILE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $usersadmin->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_FAX->FldCaption() ?></td>
		<td<?php echo $usersadmin->C_FAX->CellAttributes() ?>><span id="el_C_FAX">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_FAX" id="x_C_FAX" title="<?php echo $usersadmin->C_FAX->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $usersadmin->C_FAX->EditValue ?>"<?php echo $usersadmin->C_FAX->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_FAX->ViewAttributes() ?>><?php echo $usersadmin->C_FAX->ViewValue ?></div>
<input type="hidden" name="x_C_FAX" id="x_C_FAX" value="<?php echo ew_HtmlEncode($usersadmin->C_FAX->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_FAX->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $usersadmin->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->C_EMAIL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $usersadmin->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $usersadmin->C_EMAIL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $usersadmin->C_EMAIL->EditValue ?>"<?php echo $usersadmin->C_EMAIL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $usersadmin->C_EMAIL->ViewAttributes() ?>><?php echo $usersadmin->C_EMAIL->ViewValue ?></div>
<input type="hidden" name="x_C_EMAIL" id="x_C_EMAIL" value="<?php echo ew_HtmlEncode($usersadmin->C_EMAIL->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->C_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($usersadmin->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $usersadmin->FK_USERLEVELID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $usersadmin->FK_USERLEVELID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $usersadmin->FK_USERLEVELID->CellAttributes() ?>><span id="el_FK_USERLEVELID">
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<select id="x_FK_USERLEVELID" name="x_FK_USERLEVELID" title="<?php echo $usersadmin->FK_USERLEVELID->FldTitle() ?>"<?php echo $usersadmin->FK_USERLEVELID->EditAttributes() ?>>
<?php
if (is_array($usersadmin->FK_USERLEVELID->EditValue)) {
	$arwrk = $usersadmin->FK_USERLEVELID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($usersadmin->FK_USERLEVELID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } else { ?>
<div<?php echo $usersadmin->FK_USERLEVELID->ViewAttributes() ?>><?php echo $usersadmin->FK_USERLEVELID->ViewValue ?></div>
<input type="hidden" name="x_FK_USERLEVELID" id="x_FK_USERLEVELID" value="<?php echo ew_HtmlEncode($usersadmin->FK_USERLEVELID->FormValue) ?>">
<?php } ?>
</span><?php echo $usersadmin->FK_USERLEVELID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_NGUOIDUNG_ID" id="x_PK_NGUOIDUNG_ID" value="<?php echo ew_HtmlEncode($usersadmin->PK_NGUOIDUNG_ID->CurrentValue) ?>">
<p>
<?php if ($usersadmin->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>" onclick="this.form.a_edit.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_edit.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($usersadmin->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$usersadmin_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cusersadmin_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'usersadmin';

	// Page object name
	var $PageObjName = 'usersadmin_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $usersadmin;
		if ($usersadmin->UseTokenInUrl) $PageUrl .= "t=" . $usersadmin->TableVar . "&"; // Add page token
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
		global $objForm, $usersadmin;
		if ($usersadmin->UseTokenInUrl) {
			if ($objForm)
				return ($usersadmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($usersadmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusersadmin_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (usersadmin)
		$GLOBALS["usersadmin"] = new cusersadmin();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'usersadmin', TRUE);

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
		global $usersadmin;

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
			$this->Page_Terminate("usersadminlist.php");
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
		global $objForm, $Language, $gsFormError, $usersadmin;

		// Load key from QueryString
		if (@$_GET["PK_NGUOIDUNG_ID"] <> "")
			$usersadmin->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$usersadmin->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$usersadmin->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$usersadmin->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$usersadmin->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($usersadmin->PK_NGUOIDUNG_ID->CurrentValue == "")
			$this->Page_Terminate("usersadminlist.php"); // Invalid key, return to list
		switch ($usersadmin->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("usersadminlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$usersadmin->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $usersadmin->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "usersadminview.php")
						$sReturnUrl = $usersadmin->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$usersadmin->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		if ($usersadmin->CurrentAction == "F") { // Confirm page
			$usersadmin->RowType = EW_ROWTYPE_VIEW; // Render as View
		} else {
			$usersadmin->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		}
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $usersadmin;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $usersadmin;
		$usersadmin->C_TENDANGNHAP->setFormValue($objForm->GetValue("x_C_TENDANGNHAP"));
		$usersadmin->C_MATKHAU->setFormValue($objForm->GetValue("x_C_MATKHAU"));
		$usersadmin->C_HOTEN->setFormValue($objForm->GetValue("x_C_HOTEN"));
		$usersadmin->C_DIACHI->setFormValue($objForm->GetValue("x_C_DIACHI"));
		$usersadmin->C_TEL->setFormValue($objForm->GetValue("x_C_TEL"));
		$usersadmin->C_TEL_HOME->setFormValue($objForm->GetValue("x_C_TEL_HOME"));
		$usersadmin->C_TEL_MOBILE->setFormValue($objForm->GetValue("x_C_TEL_MOBILE"));
		$usersadmin->C_FAX->setFormValue($objForm->GetValue("x_C_FAX"));
		$usersadmin->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$usersadmin->FK_USERLEVELID->setFormValue($objForm->GetValue("x_FK_USERLEVELID"));
		$usersadmin->PK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_PK_NGUOIDUNG_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->CurrentValue = $usersadmin->PK_NGUOIDUNG_ID->FormValue;
		$this->LoadRow();
		$usersadmin->C_TENDANGNHAP->CurrentValue = $usersadmin->C_TENDANGNHAP->FormValue;
		$usersadmin->C_MATKHAU->CurrentValue = $usersadmin->C_MATKHAU->FormValue;
		$usersadmin->C_HOTEN->CurrentValue = $usersadmin->C_HOTEN->FormValue;
		$usersadmin->C_DIACHI->CurrentValue = $usersadmin->C_DIACHI->FormValue;
		$usersadmin->C_TEL->CurrentValue = $usersadmin->C_TEL->FormValue;
		$usersadmin->C_TEL_HOME->CurrentValue = $usersadmin->C_TEL_HOME->FormValue;
		$usersadmin->C_TEL_MOBILE->CurrentValue = $usersadmin->C_TEL_MOBILE->FormValue;
		$usersadmin->C_FAX->CurrentValue = $usersadmin->C_FAX->FormValue;
		$usersadmin->C_EMAIL->CurrentValue = $usersadmin->C_EMAIL->FormValue;
		$usersadmin->FK_USERLEVELID->CurrentValue = $usersadmin->FK_USERLEVELID->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $usersadmin;
		$sFilter = $usersadmin->KeyFilter();

		// Call Row Selecting event
		$usersadmin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$usersadmin->CurrentFilter = $sFilter;
		$sSql = $usersadmin->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$usersadmin->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $usersadmin;
		$usersadmin->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$usersadmin->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$usersadmin->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$usersadmin->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$usersadmin->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$usersadmin->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$usersadmin->C_TEL->setDbValue($rs->fields('C_TEL'));
		$usersadmin->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$usersadmin->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$usersadmin->C_FAX->setDbValue($rs->fields('C_FAX'));
		$usersadmin->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$usersadmin->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $usersadmin;

		// Initialize URLs
		// Call Row_Rendering event

		$usersadmin->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$usersadmin->C_TENDANGNHAP->CellCssStyle = ""; $usersadmin->C_TENDANGNHAP->CellCssClass = "";
		$usersadmin->C_TENDANGNHAP->CellAttrs = array(); $usersadmin->C_TENDANGNHAP->ViewAttrs = array(); $usersadmin->C_TENDANGNHAP->EditAttrs = array();

		// C_MATKHAU
		$usersadmin->C_MATKHAU->CellCssStyle = ""; $usersadmin->C_MATKHAU->CellCssClass = "";
		$usersadmin->C_MATKHAU->CellAttrs = array(); $usersadmin->C_MATKHAU->ViewAttrs = array(); $usersadmin->C_MATKHAU->EditAttrs = array();

		// C_HOTEN
		$usersadmin->C_HOTEN->CellCssStyle = ""; $usersadmin->C_HOTEN->CellCssClass = "";
		$usersadmin->C_HOTEN->CellAttrs = array(); $usersadmin->C_HOTEN->ViewAttrs = array(); $usersadmin->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$usersadmin->C_DIACHI->CellCssStyle = ""; $usersadmin->C_DIACHI->CellCssClass = "";
		$usersadmin->C_DIACHI->CellAttrs = array(); $usersadmin->C_DIACHI->ViewAttrs = array(); $usersadmin->C_DIACHI->EditAttrs = array();

		// C_TEL
		$usersadmin->C_TEL->CellCssStyle = ""; $usersadmin->C_TEL->CellCssClass = "";
		$usersadmin->C_TEL->CellAttrs = array(); $usersadmin->C_TEL->ViewAttrs = array(); $usersadmin->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$usersadmin->C_TEL_HOME->CellCssStyle = ""; $usersadmin->C_TEL_HOME->CellCssClass = "";
		$usersadmin->C_TEL_HOME->CellAttrs = array(); $usersadmin->C_TEL_HOME->ViewAttrs = array(); $usersadmin->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$usersadmin->C_TEL_MOBILE->CellCssStyle = ""; $usersadmin->C_TEL_MOBILE->CellCssClass = "";
		$usersadmin->C_TEL_MOBILE->CellAttrs = array(); $usersadmin->C_TEL_MOBILE->ViewAttrs = array(); $usersadmin->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$usersadmin->C_FAX->CellCssStyle = ""; $usersadmin->C_FAX->CellCssClass = "";
		$usersadmin->C_FAX->CellAttrs = array(); $usersadmin->C_FAX->ViewAttrs = array(); $usersadmin->C_FAX->EditAttrs = array();

		// C_EMAIL
		$usersadmin->C_EMAIL->CellCssStyle = ""; $usersadmin->C_EMAIL->CellCssClass = "";
		$usersadmin->C_EMAIL->CellAttrs = array(); $usersadmin->C_EMAIL->ViewAttrs = array(); $usersadmin->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$usersadmin->FK_USERLEVELID->CellCssStyle = ""; $usersadmin->FK_USERLEVELID->CellCssClass = "";
		$usersadmin->FK_USERLEVELID->CellAttrs = array(); $usersadmin->FK_USERLEVELID->ViewAttrs = array(); $usersadmin->FK_USERLEVELID->EditAttrs = array();
		if ($usersadmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$usersadmin->PK_NGUOIDUNG_ID->ViewValue = $usersadmin->PK_NGUOIDUNG_ID->CurrentValue;
			$usersadmin->PK_NGUOIDUNG_ID->CssStyle = "";
			$usersadmin->PK_NGUOIDUNG_ID->CssClass = "";
			$usersadmin->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->ViewValue = $usersadmin->C_TENDANGNHAP->CurrentValue;
			$usersadmin->C_TENDANGNHAP->CssStyle = "";
			$usersadmin->C_TENDANGNHAP->CssClass = "";
			$usersadmin->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->ViewValue = "********";
			$usersadmin->C_MATKHAU->CssStyle = "";
			$usersadmin->C_MATKHAU->CssClass = "";
			$usersadmin->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			$usersadmin->FK_MACONGTY->ViewValue = $usersadmin->FK_MACONGTY->CurrentValue;
			$usersadmin->FK_MACONGTY->CssStyle = "";
			$usersadmin->FK_MACONGTY->CssClass = "";
			$usersadmin->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->ViewValue = $usersadmin->C_HOTEN->CurrentValue;
			$usersadmin->C_HOTEN->CssStyle = "";
			$usersadmin->C_HOTEN->CssClass = "";
			$usersadmin->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->ViewValue = $usersadmin->C_DIACHI->CurrentValue;
			$usersadmin->C_DIACHI->CssStyle = "";
			$usersadmin->C_DIACHI->CssClass = "";
			$usersadmin->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$usersadmin->C_TEL->ViewValue = $usersadmin->C_TEL->CurrentValue;
			$usersadmin->C_TEL->CssStyle = "";
			$usersadmin->C_TEL->CssClass = "";
			$usersadmin->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->ViewValue = $usersadmin->C_TEL_HOME->CurrentValue;
			$usersadmin->C_TEL_HOME->CssStyle = "";
			$usersadmin->C_TEL_HOME->CssClass = "";
			$usersadmin->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->ViewValue = $usersadmin->C_TEL_MOBILE->CurrentValue;
			$usersadmin->C_TEL_MOBILE->CssStyle = "";
			$usersadmin->C_TEL_MOBILE->CssClass = "";
			$usersadmin->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$usersadmin->C_FAX->ViewValue = $usersadmin->C_FAX->CurrentValue;
			$usersadmin->C_FAX->CssStyle = "";
			$usersadmin->C_FAX->CssClass = "";
			$usersadmin->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->ViewValue = $usersadmin->C_EMAIL->CurrentValue;
			$usersadmin->C_EMAIL->CssStyle = "";
			$usersadmin->C_EMAIL->CssClass = "";
			$usersadmin->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($usersadmin->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($usersadmin->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$usersadmin->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$usersadmin->FK_USERLEVELID->ViewValue = $usersadmin->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$usersadmin->FK_USERLEVELID->ViewValue = NULL;
			}
			$usersadmin->FK_USERLEVELID->CssStyle = "";
			$usersadmin->FK_USERLEVELID->CssClass = "";
			$usersadmin->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->HrefValue = "";
			$usersadmin->C_TENDANGNHAP->TooltipValue = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->HrefValue = "";
			$usersadmin->C_MATKHAU->TooltipValue = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->HrefValue = "";
			$usersadmin->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->HrefValue = "";
			$usersadmin->C_DIACHI->TooltipValue = "";

			// C_TEL
			$usersadmin->C_TEL->HrefValue = "";
			$usersadmin->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->HrefValue = "";
			$usersadmin->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->HrefValue = "";
			$usersadmin->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$usersadmin->C_FAX->HrefValue = "";
			$usersadmin->C_FAX->TooltipValue = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->HrefValue = "";
			$usersadmin->C_EMAIL->TooltipValue = "";

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->HrefValue = "";
			$usersadmin->FK_USERLEVELID->TooltipValue = "";
		} elseif ($usersadmin->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_TENDANGNHAP
			$usersadmin->C_TENDANGNHAP->EditCustomAttributes = "";
			$usersadmin->C_TENDANGNHAP->EditValue = $usersadmin->C_TENDANGNHAP->CurrentValue;
			$usersadmin->C_TENDANGNHAP->CssStyle = "";
			$usersadmin->C_TENDANGNHAP->CssClass = "";
			$usersadmin->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->EditCustomAttributes = "";
			$usersadmin->C_MATKHAU->EditValue = ew_HtmlEncode($usersadmin->C_MATKHAU->CurrentValue);

			// C_HOTEN
			$usersadmin->C_HOTEN->EditCustomAttributes = "";
			$usersadmin->C_HOTEN->EditValue = ew_HtmlEncode($usersadmin->C_HOTEN->CurrentValue);

			// C_DIACHI
			$usersadmin->C_DIACHI->EditCustomAttributes = "";
			$usersadmin->C_DIACHI->EditValue = ew_HtmlEncode($usersadmin->C_DIACHI->CurrentValue);

			// C_TEL
			$usersadmin->C_TEL->EditCustomAttributes = "";
			$usersadmin->C_TEL->EditValue = ew_HtmlEncode($usersadmin->C_TEL->CurrentValue);

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->EditCustomAttributes = "";
			$usersadmin->C_TEL_HOME->EditValue = ew_HtmlEncode($usersadmin->C_TEL_HOME->CurrentValue);

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->EditCustomAttributes = "";
			$usersadmin->C_TEL_MOBILE->EditValue = ew_HtmlEncode($usersadmin->C_TEL_MOBILE->CurrentValue);

			// C_FAX
			$usersadmin->C_FAX->EditCustomAttributes = "";
			$usersadmin->C_FAX->EditValue = ew_HtmlEncode($usersadmin->C_FAX->CurrentValue);

			// C_EMAIL
			$usersadmin->C_EMAIL->EditCustomAttributes = "";
			$usersadmin->C_EMAIL->EditValue = ew_HtmlEncode($usersadmin->C_EMAIL->CurrentValue);

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `userlevelid`, `userlevelname`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`userleveltype` = 1 AND `userlevelid` not in (-1,0)";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$usersadmin->FK_USERLEVELID->EditValue = $arwrk;

			// Edit refer script
			// C_TENDANGNHAP

			$usersadmin->C_TENDANGNHAP->HrefValue = "";

			// C_MATKHAU
			$usersadmin->C_MATKHAU->HrefValue = "";

			// C_HOTEN
			$usersadmin->C_HOTEN->HrefValue = "";

			// C_DIACHI
			$usersadmin->C_DIACHI->HrefValue = "";

			// C_TEL
			$usersadmin->C_TEL->HrefValue = "";

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->HrefValue = "";

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->HrefValue = "";

			// C_FAX
			$usersadmin->C_FAX->HrefValue = "";

			// C_EMAIL
			$usersadmin->C_EMAIL->HrefValue = "";

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->HrefValue = "";
		}

		// Call Row Rendered event
		if ($usersadmin->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$usersadmin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $usersadmin;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($usersadmin->C_MATKHAU->FormValue) && $usersadmin->C_MATKHAU->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $usersadmin->C_MATKHAU->FldCaption();
		}
		if (!is_null($usersadmin->C_EMAIL->FormValue) && $usersadmin->C_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $usersadmin->C_EMAIL->FldCaption();
		}
		if (!is_null($usersadmin->FK_USERLEVELID->FormValue) && $usersadmin->FK_USERLEVELID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $usersadmin->FK_USERLEVELID->FldCaption();
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
		global $conn, $Security, $Language, $usersadmin;
		$sFilter = $usersadmin->KeyFilter();
			if ($usersadmin->C_TENDANGNHAP->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(t_nguoidung.C_TENDANGNHAP = '" . ew_AdjustSql($usersadmin->C_TENDANGNHAP->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$usersadmin->CurrentFilter = $sFilterChk;
			$sSqlChk = $usersadmin->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'C_TENDANGNHAP', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $usersadmin->C_TENDANGNHAP->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$usersadmin->CurrentFilter = $sFilter;
		$sSql = $usersadmin->SQL();
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

			// C_MATKHAU
			if ($rs->fields('C_MATKHAU') <> $usersadmin->C_MATKHAU->CurrentValue) {
			$usersadmin->C_MATKHAU->SetDbValueDef($rsnew, $usersadmin->C_MATKHAU->CurrentValue, NULL, FALSE);
			}

			// C_HOTEN
			$usersadmin->C_HOTEN->SetDbValueDef($rsnew, $usersadmin->C_HOTEN->CurrentValue, NULL, FALSE);

			// C_DIACHI
			$usersadmin->C_DIACHI->SetDbValueDef($rsnew, $usersadmin->C_DIACHI->CurrentValue, NULL, FALSE);

			// C_TEL
			$usersadmin->C_TEL->SetDbValueDef($rsnew, $usersadmin->C_TEL->CurrentValue, NULL, FALSE);

			// C_TEL_HOME
			$usersadmin->C_TEL_HOME->SetDbValueDef($rsnew, $usersadmin->C_TEL_HOME->CurrentValue, NULL, FALSE);

			// C_TEL_MOBILE
			$usersadmin->C_TEL_MOBILE->SetDbValueDef($rsnew, $usersadmin->C_TEL_MOBILE->CurrentValue, NULL, FALSE);

			// C_FAX
			$usersadmin->C_FAX->SetDbValueDef($rsnew, $usersadmin->C_FAX->CurrentValue, NULL, FALSE);

			// C_EMAIL
			$usersadmin->C_EMAIL->SetDbValueDef($rsnew, $usersadmin->C_EMAIL->CurrentValue, NULL, FALSE);

			// FK_USERLEVELID
			$usersadmin->FK_USERLEVELID->SetDbValueDef($rsnew, $usersadmin->FK_USERLEVELID->CurrentValue, NULL, FALSE);

			// Call Row Updating event
			$bUpdateRow = $usersadmin->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($usersadmin->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($usersadmin->CancelMessage <> "") {
					$this->setMessage($usersadmin->CancelMessage);
					$usersadmin->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$usersadmin->Row_Updated($rsold, $rsnew);
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
