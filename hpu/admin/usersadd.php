<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersinfo.php" ?>
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
$users_add = new cusers_add();
$Page =& $users_add;

// Page init
$users_add->Page_Init();

// Page main
$users_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var users_add = new ew_Page("users_add");

// page properties
users_add.PageID = "add"; // page ID
users_add.FormID = "fusersadd"; // form ID
var EW_PAGE_ID = users_add.PageID; // for backward compatibility

// extend page with ValidateForm function
users_add.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->C_TENDANGNHAP->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_MATKHAU"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->C_MATKHAU->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FK_MACONGTY"];
                if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->C_MATKHAU->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_HOTEN"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->C_HOTEN->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->C_EMAIL->FldCaption()) ?>");
                elm = fobj.elements["x" + infix + "_FK_USERLEVELID"];
                  elm = fobj.elements["x" + infix + "_FK_USERLEVELID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($users->FK_USERLEVELID->FldCaption()) ?>");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
users_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
users_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
users_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
users_add.ValidateRequired = false; // no JavaScript validation
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
								<?php //echo $Language->Phrase("Add") ?>&nbsp;<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $users->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$users_add->ShowMessage();
?>
<form name="fusersadd" id="fusersadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return users_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="users">
<input type="hidden" name="a_add" id="a_add" value="A">
<?php if ($users->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($users->C_TENDANGNHAP->Visible) { // C_TENDANGNHAP ?>
	<tr<?php echo $users->C_TENDANGNHAP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TENDANGNHAP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->C_TENDANGNHAP->CellAttributes() ?>><span id="el_C_TENDANGNHAP">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" title="<?php echo $users->C_TENDANGNHAP->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $users->C_TENDANGNHAP->EditValue ?>"<?php echo $users->C_TENDANGNHAP->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_TENDANGNHAP->ViewAttributes() ?>><?php echo $users->C_TENDANGNHAP->ViewValue ?></div>
<input type="hidden" name="x_C_TENDANGNHAP" id="x_C_TENDANGNHAP" value="<?php echo ew_HtmlEncode($users->C_TENDANGNHAP->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_TENDANGNHAP->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_MATKHAU->Visible) { // C_MATKHAU ?>
	<tr<?php echo $users->C_MATKHAU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_MATKHAU->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->C_MATKHAU->CellAttributes() ?>><span id="el_C_MATKHAU">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="password" name="x_C_MATKHAU" id="x_C_MATKHAU" title="<?php echo $users->C_MATKHAU->FldTitle() ?>" size="30" maxlength="100"<?php echo $users->C_MATKHAU->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_MATKHAU->ViewAttributes() ?>><?php echo $users->C_MATKHAU->ViewValue ?></div>
<input type="hidden" name="x_C_MATKHAU" id="x_C_MATKHAU" value="<?php echo ew_HtmlEncode($users->C_MATKHAU->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_MATKHAU->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if (isAdmin()) { // FK_MACONGTY ?>
	<tr<?php echo $users->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->FK_MACONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->FK_MACONGTY->CellAttributes() ?>><span id="el_FK_MACONGTY">
<?php if ($users->CurrentAction <> "F") { ?>
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $users->FK_MACONGTY->FldTitle() ?>"<?php echo $users->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($users->FK_MACONGTY->EditValue)) {
	$arwrk = $users->FK_MACONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($users->FK_MACONGTY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $users->FK_MACONGTY->ViewAttributes() ?>><?php echo $users->FK_MACONGTY->ViewValue ?></div>
<input type="hidden" name="x_FK_MACONGTY" id="x_FK_MACONGTY" value="<?php echo ew_HtmlEncode($users->FK_MACONGTY->FormValue) ?>">
<?php } ?>
</span><?php echo $users->FK_MACONGTY->CustomMsg ?></td>
	</tr>
<?php }else{ ?>
<tr<?php echo $users->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->FK_MACONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->FK_MACONGTY->CellAttributes() ?>><span id="el_FK_MACONGTY">
<?php if ($users->CurrentAction <> "F") { ?>
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $users->FK_MACONGTY->FldTitle() ?>"<?php echo $users->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($users->FK_MACONGTY->EditValue)) {
	$arwrk = $users->FK_MACONGTY->EditValue;
	$rowswrk = count($arwrk);
?>
<option value="<?php echo ew_HtmlEncode($arwrk[0][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[0][1] ?>
</option>
<?php
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		if (strval($Security->CurrentUserOption()) == strval($arwrk[$rowcntwrk][0]))
                {
                    $selwrk = " selected=\"selected\"";
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
                }
	}
}
?>
</select>
<?php } else { ?>
<div<?php echo $users->FK_MACONGTY->ViewAttributes() ?>><?php echo $users->FK_MACONGTY->ViewValue ?></div>
<input type="hidden" name="x_FK_MACONGTY" id="x_FK_MACONGTY" value="<?php echo ew_HtmlEncode($users->FK_MACONGTY->FormValue) ?>">
<?php } ?>
</span><?php echo $users->FK_MACONGTY->CustomMsg ?></td>
</tr>
<?php } ?>
<?php if ($users->C_HOTEN->Visible) { // C_HOTEN ?>
	<tr<?php echo $users->C_HOTEN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_HOTEN->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->C_HOTEN->CellAttributes() ?>><span id="el_C_HOTEN">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_HOTEN" id="x_C_HOTEN" title="<?php echo $users->C_HOTEN->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $users->C_HOTEN->EditValue ?>"<?php echo $users->C_HOTEN->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_HOTEN->ViewAttributes() ?>><?php echo $users->C_HOTEN->ViewValue ?></div>
<input type="hidden" name="x_C_HOTEN" id="x_C_HOTEN" value="<?php echo ew_HtmlEncode($users->C_HOTEN->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_HOTEN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $users->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $users->C_DIACHI->CellAttributes() ?>><span id="el_C_DIACHI">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_DIACHI" id="x_C_DIACHI" title="<?php echo $users->C_DIACHI->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $users->C_DIACHI->EditValue ?>"<?php echo $users->C_DIACHI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_DIACHI->ViewAttributes() ?>><?php echo $users->C_DIACHI->ViewValue ?></div>
<input type="hidden" name="x_C_DIACHI" id="x_C_DIACHI" value="<?php echo ew_HtmlEncode($users->C_DIACHI->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_DIACHI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL->Visible) { // C_TEL ?>
	<tr<?php echo $users->C_TEL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL->FldCaption() ?></td>
		<td<?php echo $users->C_TEL->CellAttributes() ?>><span id="el_C_TEL">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL" id="x_C_TEL" title="<?php echo $users->C_TEL->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $users->C_TEL->EditValue ?>"<?php echo $users->C_TEL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_TEL->ViewAttributes() ?>><?php echo $users->C_TEL->ViewValue ?></div>
<input type="hidden" name="x_C_TEL" id="x_C_TEL" value="<?php echo ew_HtmlEncode($users->C_TEL->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_TEL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL_HOME->Visible) { // C_TEL_HOME ?>
	<tr<?php echo $users->C_TEL_HOME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL_HOME->FldCaption() ?></td>
		<td<?php echo $users->C_TEL_HOME->CellAttributes() ?>><span id="el_C_TEL_HOME">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_HOME" id="x_C_TEL_HOME" title="<?php echo $users->C_TEL_HOME->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $users->C_TEL_HOME->EditValue ?>"<?php echo $users->C_TEL_HOME->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_TEL_HOME->ViewAttributes() ?>><?php echo $users->C_TEL_HOME->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_HOME" id="x_C_TEL_HOME" value="<?php echo ew_HtmlEncode($users->C_TEL_HOME->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_TEL_HOME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_TEL_MOBILE->Visible) { // C_TEL_MOBILE ?>
	<tr<?php echo $users->C_TEL_MOBILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_TEL_MOBILE->FldCaption() ?></td>
		<td<?php echo $users->C_TEL_MOBILE->CellAttributes() ?>><span id="el_C_TEL_MOBILE">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" title="<?php echo $users->C_TEL_MOBILE->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $users->C_TEL_MOBILE->EditValue ?>"<?php echo $users->C_TEL_MOBILE->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_TEL_MOBILE->ViewAttributes() ?>><?php echo $users->C_TEL_MOBILE->ViewValue ?></div>
<input type="hidden" name="x_C_TEL_MOBILE" id="x_C_TEL_MOBILE" value="<?php echo ew_HtmlEncode($users->C_TEL_MOBILE->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_TEL_MOBILE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $users->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_FAX->FldCaption() ?></td>
		<td<?php echo $users->C_FAX->CellAttributes() ?>><span id="el_C_FAX">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_FAX" id="x_C_FAX" title="<?php echo $users->C_FAX->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $users->C_FAX->EditValue ?>"<?php echo $users->C_FAX->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_FAX->ViewAttributes() ?>><?php echo $users->C_FAX->ViewValue ?></div>
<input type="hidden" name="x_C_FAX" id="x_C_FAX" value="<?php echo ew_HtmlEncode($users->C_FAX->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_FAX->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $users->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->C_EMAIL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<?php if ($users->CurrentAction <> "F") { ?>
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $users->C_EMAIL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $users->C_EMAIL->EditValue ?>"<?php echo $users->C_EMAIL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $users->C_EMAIL->ViewAttributes() ?>><?php echo $users->C_EMAIL->ViewValue ?></div>
<input type="hidden" name="x_C_EMAIL" id="x_C_EMAIL" value="<?php echo ew_HtmlEncode($users->C_EMAIL->FormValue) ?>">
<?php } ?>
</span><?php echo $users->C_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($users->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $users->FK_USERLEVELID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $users->FK_USERLEVELID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>><span id="el_FK_USERLEVELID">
<?php if ($users->CurrentAction <> "F") { ?>
<select id="x_FK_USERLEVELID" name="x_FK_USERLEVELID" title="<?php echo $users->FK_USERLEVELID->FldTitle() ?>"<?php echo $users->FK_USERLEVELID->EditAttributes() ?>>
<?php
if (is_array($users->FK_USERLEVELID->EditValue)) {
	$arwrk = $users->FK_USERLEVELID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($users->FK_USERLEVELID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $users->FK_USERLEVELID->ViewAttributes() ?>><?php echo $users->FK_USERLEVELID->ViewValue ?></div>
<input type="hidden" name="x_FK_USERLEVELID" id="x_FK_USERLEVELID" value="<?php echo ew_HtmlEncode($users->FK_USERLEVELID->FormValue) ?>">
<?php } ?>
</span><?php echo $users->FK_USERLEVELID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($users->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>" onclick="this.form.a_add.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_add.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($users->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$users_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cusers_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'users';

	// Page object name
	var $PageObjName = 'users_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $users;
		if ($users->UseTokenInUrl) $PageUrl .= "t=" . $users->TableVar . "&"; // Add page token
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
		global $objForm, $users;
		if ($users->UseTokenInUrl) {
			if ($objForm)
				return ($users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusers_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (users)
		$GLOBALS["users"] = new cusers();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'users', TRUE);

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
		global $users;

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
			$this->Page_Terminate("userslist.php");
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
		global $objForm, $Language, $gsFormError, $users;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_NGUOIDUNG_ID"] != "") {
		  $users->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $users->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$users->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $users->CurrentAction = "C"; // Copy record
		  } else {
		    $users->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($users->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("userslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$users->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $users->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "usersview.php")
						$sReturnUrl = $users->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		if ($users->CurrentAction == "F") { // Confirm page
		  $users->RowType = EW_ROWTYPE_VIEW; // Render view type
		} else {
		  $users->RowType = EW_ROWTYPE_ADD; // Render add type
		}

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $users;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $users;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $users;
		$users->C_TENDANGNHAP->setFormValue($objForm->GetValue("x_C_TENDANGNHAP"));
		$users->C_MATKHAU->setFormValue($objForm->GetValue("x_C_MATKHAU"));
		$users->FK_MACONGTY->setFormValue($objForm->GetValue("x_FK_MACONGTY"));
		$users->C_HOTEN->setFormValue($objForm->GetValue("x_C_HOTEN"));
		$users->C_DIACHI->setFormValue($objForm->GetValue("x_C_DIACHI"));
		$users->C_TEL->setFormValue($objForm->GetValue("x_C_TEL"));
		$users->C_TEL_HOME->setFormValue($objForm->GetValue("x_C_TEL_HOME"));
		$users->C_TEL_MOBILE->setFormValue($objForm->GetValue("x_C_TEL_MOBILE"));
		$users->C_FAX->setFormValue($objForm->GetValue("x_C_FAX"));
		$users->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$users->FK_USERLEVELID->setFormValue($objForm->GetValue("x_FK_USERLEVELID"));
		$users->PK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_PK_NGUOIDUNG_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $users;
		$users->PK_NGUOIDUNG_ID->CurrentValue = $users->PK_NGUOIDUNG_ID->FormValue;
		$users->C_TENDANGNHAP->CurrentValue = $users->C_TENDANGNHAP->FormValue;
		$users->C_MATKHAU->CurrentValue = $users->C_MATKHAU->FormValue;
		$users->FK_MACONGTY->CurrentValue = $users->FK_MACONGTY->FormValue;
		$users->C_HOTEN->CurrentValue = $users->C_HOTEN->FormValue;
		$users->C_DIACHI->CurrentValue = $users->C_DIACHI->FormValue;
		$users->C_TEL->CurrentValue = $users->C_TEL->FormValue;
		$users->C_TEL_HOME->CurrentValue = $users->C_TEL_HOME->FormValue;
		$users->C_TEL_MOBILE->CurrentValue = $users->C_TEL_MOBILE->FormValue;
		$users->C_FAX->CurrentValue = $users->C_FAX->FormValue;
		$users->C_EMAIL->CurrentValue = $users->C_EMAIL->FormValue;
		$users->FK_USERLEVELID->CurrentValue = $users->FK_USERLEVELID->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $users;
		$sFilter = $users->KeyFilter();

		// Call Row Selecting event
		$users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$users->CurrentFilter = $sFilter;
		$sSql = $users->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$users->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $users;
		$users->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$users->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$users->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$users->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$users->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$users->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$users->C_TEL->setDbValue($rs->fields('C_TEL'));
		$users->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$users->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$users->C_FAX->setDbValue($rs->fields('C_FAX'));
		$users->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$users->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $users;

		// Initialize URLs
		// Call Row_Rendering event

		$users->Row_Rendering();

		// Common render codes for all row types
		// C_TENDANGNHAP

		$users->C_TENDANGNHAP->CellCssStyle = ""; $users->C_TENDANGNHAP->CellCssClass = "";
		$users->C_TENDANGNHAP->CellAttrs = array(); $users->C_TENDANGNHAP->ViewAttrs = array(); $users->C_TENDANGNHAP->EditAttrs = array();

		// C_MATKHAU
		$users->C_MATKHAU->CellCssStyle = ""; $users->C_MATKHAU->CellCssClass = "";
		$users->C_MATKHAU->CellAttrs = array(); $users->C_MATKHAU->ViewAttrs = array(); $users->C_MATKHAU->EditAttrs = array();

		// FK_MACONGTY
		$users->FK_MACONGTY->CellCssStyle = ""; $users->FK_MACONGTY->CellCssClass = "";
		$users->FK_MACONGTY->CellAttrs = array(); $users->FK_MACONGTY->ViewAttrs = array(); $users->FK_MACONGTY->EditAttrs = array();

		// C_HOTEN
		$users->C_HOTEN->CellCssStyle = ""; $users->C_HOTEN->CellCssClass = "";
		$users->C_HOTEN->CellAttrs = array(); $users->C_HOTEN->ViewAttrs = array(); $users->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$users->C_DIACHI->CellCssStyle = ""; $users->C_DIACHI->CellCssClass = "";
		$users->C_DIACHI->CellAttrs = array(); $users->C_DIACHI->ViewAttrs = array(); $users->C_DIACHI->EditAttrs = array();

		// C_TEL
		$users->C_TEL->CellCssStyle = ""; $users->C_TEL->CellCssClass = "";
		$users->C_TEL->CellAttrs = array(); $users->C_TEL->ViewAttrs = array(); $users->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$users->C_TEL_HOME->CellCssStyle = ""; $users->C_TEL_HOME->CellCssClass = "";
		$users->C_TEL_HOME->CellAttrs = array(); $users->C_TEL_HOME->ViewAttrs = array(); $users->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$users->C_TEL_MOBILE->CellCssStyle = ""; $users->C_TEL_MOBILE->CellCssClass = "";
		$users->C_TEL_MOBILE->CellAttrs = array(); $users->C_TEL_MOBILE->ViewAttrs = array(); $users->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$users->C_FAX->CellCssStyle = ""; $users->C_FAX->CellCssClass = "";
		$users->C_FAX->CellAttrs = array(); $users->C_FAX->ViewAttrs = array(); $users->C_FAX->EditAttrs = array();

		// C_EMAIL
		$users->C_EMAIL->CellCssStyle = ""; $users->C_EMAIL->CellCssClass = "";
		$users->C_EMAIL->CellAttrs = array(); $users->C_EMAIL->ViewAttrs = array(); $users->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$users->FK_USERLEVELID->CellCssStyle = ""; $users->FK_USERLEVELID->CellCssClass = "";
		$users->FK_USERLEVELID->CellAttrs = array(); $users->FK_USERLEVELID->ViewAttrs = array(); $users->FK_USERLEVELID->EditAttrs = array();
		if ($users->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$users->PK_NGUOIDUNG_ID->ViewValue = $users->PK_NGUOIDUNG_ID->CurrentValue;
			$users->PK_NGUOIDUNG_ID->CssStyle = "";
			$users->PK_NGUOIDUNG_ID->CssClass = "";
			$users->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->ViewValue = $users->C_TENDANGNHAP->CurrentValue;
			$users->C_TENDANGNHAP->CssStyle = "";
			$users->C_TENDANGNHAP->CssClass = "";
			$users->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$users->C_MATKHAU->ViewValue = "********";
			$users->C_MATKHAU->CssStyle = "";
			$users->C_MATKHAU->CssClass = "";
			$users->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($users->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($users->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$users->FK_MACONGTY->ViewValue = $users->FK_MACONGTY->CurrentValue;
				}
			} else {
				$users->FK_MACONGTY->ViewValue = NULL;
			}
			$users->FK_MACONGTY->CssStyle = "";
			$users->FK_MACONGTY->CssClass = "";
			$users->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$users->C_HOTEN->ViewValue = $users->C_HOTEN->CurrentValue;
			$users->C_HOTEN->CssStyle = "";
			$users->C_HOTEN->CssClass = "";
			$users->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$users->C_DIACHI->ViewValue = $users->C_DIACHI->CurrentValue;
			$users->C_DIACHI->CssStyle = "";
			$users->C_DIACHI->CssClass = "";
			$users->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$users->C_TEL->ViewValue = $users->C_TEL->CurrentValue;
			$users->C_TEL->CssStyle = "";
			$users->C_TEL->CssClass = "";
			$users->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->ViewValue = $users->C_TEL_HOME->CurrentValue;
			$users->C_TEL_HOME->CssStyle = "";
			$users->C_TEL_HOME->CssClass = "";
			$users->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->ViewValue = $users->C_TEL_MOBILE->CurrentValue;
			$users->C_TEL_MOBILE->CssStyle = "";
			$users->C_TEL_MOBILE->CssClass = "";
			$users->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$users->C_FAX->ViewValue = $users->C_FAX->CurrentValue;
			$users->C_FAX->CssStyle = "";
			$users->C_FAX->CssClass = "";
			$users->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$users->C_EMAIL->ViewValue = $users->C_EMAIL->CurrentValue;
			$users->C_EMAIL->CssStyle = "";
			$users->C_EMAIL->CssClass = "";
			$users->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($users->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($users->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$users->FK_USERLEVELID->ViewValue = $users->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$users->FK_USERLEVELID->ViewValue = NULL;
			}
			$users->FK_USERLEVELID->CssStyle = "";
			$users->FK_USERLEVELID->CssClass = "";
			$users->FK_USERLEVELID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->HrefValue = "";
			$users->C_TENDANGNHAP->TooltipValue = "";

			// C_MATKHAU
			$users->C_MATKHAU->HrefValue = "";
			$users->C_MATKHAU->TooltipValue = "";

			// FK_MACONGTY
			$users->FK_MACONGTY->HrefValue = "";
			$users->FK_MACONGTY->TooltipValue = "";

			// C_HOTEN
			$users->C_HOTEN->HrefValue = "";
			$users->C_HOTEN->TooltipValue = "";

			// C_DIACHI
			$users->C_DIACHI->HrefValue = "";
			$users->C_DIACHI->TooltipValue = "";

			// C_TEL
			$users->C_TEL->HrefValue = "";
			$users->C_TEL->TooltipValue = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->HrefValue = "";
			$users->C_TEL_HOME->TooltipValue = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->HrefValue = "";
			$users->C_TEL_MOBILE->TooltipValue = "";

			// C_FAX
			$users->C_FAX->HrefValue = "";
			$users->C_FAX->TooltipValue = "";

			// C_EMAIL
			$users->C_EMAIL->HrefValue = "";
			$users->C_EMAIL->TooltipValue = "";

			// FK_USERLEVELID
			$users->FK_USERLEVELID->HrefValue = "";
			$users->FK_USERLEVELID->TooltipValue = "";
		} elseif ($users->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->EditCustomAttributes = "";
			$users->C_TENDANGNHAP->EditValue = ew_HtmlEncode($users->C_TENDANGNHAP->CurrentValue);

			// C_MATKHAU
			$users->C_MATKHAU->EditCustomAttributes = "";
			$users->C_MATKHAU->EditValue = ew_HtmlEncode($users->C_MATKHAU->CurrentValue);

			// FK_MACONGTY
			$users->FK_MACONGTY->EditCustomAttributes = "";
			$arwrk = GetCompanyTree_User();
			$users->FK_MACONGTY->EditValue = $arwrk;

			// C_HOTEN
			$users->C_HOTEN->EditCustomAttributes = "";
			$users->C_HOTEN->EditValue = ew_HtmlEncode($users->C_HOTEN->CurrentValue);

			// C_DIACHI
			$users->C_DIACHI->EditCustomAttributes = "";
			$users->C_DIACHI->EditValue = ew_HtmlEncode($users->C_DIACHI->CurrentValue);

			// C_TEL
			$users->C_TEL->EditCustomAttributes = "";
			$users->C_TEL->EditValue = ew_HtmlEncode($users->C_TEL->CurrentValue);

			// C_TEL_HOME
			$users->C_TEL_HOME->EditCustomAttributes = "";
			$users->C_TEL_HOME->EditValue = ew_HtmlEncode($users->C_TEL_HOME->CurrentValue);

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->EditCustomAttributes = "";
			$users->C_TEL_MOBILE->EditValue = ew_HtmlEncode($users->C_TEL_MOBILE->CurrentValue);

			// C_FAX
			$users->C_FAX->EditCustomAttributes = "";
			$users->C_FAX->EditValue = ew_HtmlEncode($users->C_FAX->CurrentValue);

			// C_EMAIL
			$users->C_EMAIL->EditCustomAttributes = "";
			$users->C_EMAIL->EditValue = ew_HtmlEncode($users->C_EMAIL->CurrentValue);

			// FK_USERLEVELID
			$users->FK_USERLEVELID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `userlevelid`, `userlevelname`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`userleveltype` = 2 AND `userlevelid` not in (-1,0)";
                        if ($Security->CurrentUserLevelID() > 1)
                        {
                           $sWhereWrk .= " AND userlevelid = ".$Security->CurrentUserLevelID()." OR (userlevelid = 10)";
                        }
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$users->FK_USERLEVELID->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($users->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $users;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($users->C_TENDANGNHAP->FormValue) && $users->C_TENDANGNHAP->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $users->C_TENDANGNHAP->FldCaption();
		}
		if (!is_null($users->C_MATKHAU->FormValue) && $users->C_MATKHAU->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $users->C_MATKHAU->FldCaption();
		}
		if (!is_null($users->FK_MACONGTY->FormValue) && $users->FK_MACONGTY->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $users->FK_MACONGTY->FldCaption();
		}
		if (!is_null($users->C_EMAIL->FormValue) && $users->C_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $users->C_EMAIL->FldCaption();
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
		global $conn, $Language, $Security, $users;
		if ($users->C_TENDANGNHAP->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(C_TENDANGNHAP = '" . ew_AdjustSql($users->C_TENDANGNHAP->CurrentValue) . "')";
			$rsChk = $users->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'C_TENDANGNHAP', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $users->C_TENDANGNHAP->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// C_TENDANGNHAP
		$users->C_TENDANGNHAP->SetDbValueDef($rsnew, $users->C_TENDANGNHAP->CurrentValue, "", FALSE);

		// C_MATKHAU
		$users->C_MATKHAU->SetDbValueDef($rsnew, $users->C_MATKHAU->CurrentValue, NULL, FALSE);

		// FK_MACONGTY
		$users->FK_MACONGTY->SetDbValueDef($rsnew, $users->FK_MACONGTY->CurrentValue, 0, FALSE);

		// C_HOTEN
		$users->C_HOTEN->SetDbValueDef($rsnew, $users->C_HOTEN->CurrentValue, NULL, FALSE);

		// C_DIACHI
		$users->C_DIACHI->SetDbValueDef($rsnew, $users->C_DIACHI->CurrentValue, NULL, FALSE);

		// C_TEL
		$users->C_TEL->SetDbValueDef($rsnew, $users->C_TEL->CurrentValue, NULL, FALSE);

		// C_TEL_HOME
		$users->C_TEL_HOME->SetDbValueDef($rsnew, $users->C_TEL_HOME->CurrentValue, NULL, FALSE);

		// C_TEL_MOBILE
		$users->C_TEL_MOBILE->SetDbValueDef($rsnew, $users->C_TEL_MOBILE->CurrentValue, NULL, FALSE);

		// C_FAX
		$users->C_FAX->SetDbValueDef($rsnew, $users->C_FAX->CurrentValue, NULL, FALSE);

		// C_EMAIL
		$users->C_EMAIL->SetDbValueDef($rsnew, $users->C_EMAIL->CurrentValue, NULL, FALSE);

		// FK_USERLEVELID
		$users->FK_USERLEVELID->SetDbValueDef($rsnew, $users->FK_USERLEVELID->CurrentValue, NULL, FALSE);
               
		
                // Call Row Inserting event
		$bInsertRow = $users->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($users->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($users->CancelMessage <> "") {
				$this->setMessage($users->CancelMessage);
				$users->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$users->PK_NGUOIDUNG_ID->setDbValue($conn->Insert_ID());
			$rsnew['PK_NGUOIDUNG_ID'] = $users->PK_NGUOIDUNG_ID->DbValue;
                //add thu muc tuong ưng  voi option va user iD        
                if (!is_dir("../upload/company/".$users->FK_MACONGTY->CurrentValue."")){ mkdir("../upload/company/".$users->FK_MACONGTY->CurrentValue."");}
                if (!is_dir("../upload/company/".$users->FK_MACONGTY->CurrentValue."/".$rsnew['PK_NGUOIDUNG_ID']."")){ mkdir("../upload/company/".$users->FK_MACONGTY->CurrentValue."/".$rsnew['PK_NGUOIDUNG_ID']."");}

			// Call Row Inserted event
			$users->Row_Inserted($rsnew);
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
