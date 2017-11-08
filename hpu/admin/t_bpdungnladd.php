<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_bpdungnlinfo.php" ?>
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
$t_bpdungnl_add = new ct_bpdungnl_add();
$Page =& $t_bpdungnl_add;

// Page init
$t_bpdungnl_add->Page_Init();

// Page main
$t_bpdungnl_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_bpdungnl_add = new ew_Page("t_bpdungnl_add");

// page properties
t_bpdungnl_add.PageID = "add"; // page ID
t_bpdungnl_add.FormID = "ft_bpdungnladd"; // form ID
var EW_PAGE_ID = t_bpdungnl_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_bpdungnl_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_FK_MACONGTY"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_bpdungnl->FK_MACONGTY->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_NAM"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_bpdungnl->C_NAM->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TENBP"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_bpdungnl->C_TENBP->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FK_LOAINHIENLIEU"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_bpdungnl->FK_LOAINHIENLIEU->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_SOLUONG"];
		if (elm && !ew_CheckNumber(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_bpdungnl->C_SOLUONG->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_bpdungnl_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_bpdungnl_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_bpdungnl_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_bpdungnl_add.ValidateRequired = false; // no JavaScript validation
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
<?php $_SESSION['tab']=1;
      $_SESSION['tab_level']=1.1;
      $_SESSION['tab_level1']=1.4;
?>
<?php include "sitemapcongty.php" ?>
<div style="clear: both;margin-top: 100px;"></div>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu" >
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $t_bpdungnl->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $t_bpdungnl->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_bpdungnl_add->ShowMessage();
?>
<form name="ft_bpdungnladd" id="ft_bpdungnladd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_bpdungnl_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_bpdungnl">
<input type="hidden" name="a_add" id="a_add" value="A">
<?php if ($t_bpdungnl->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if (isAdmin()) { // FK_MACONGTY ?>
	<tr<?php echo $t_bpdungnl->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_bpdungnl->FK_MACONGTY->CellAttributes() ?>><span id="el_FK_MACONGTY">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $t_bpdungnl->FK_MACONGTY->FldTitle() ?>"<?php echo $t_bpdungnl->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($t_bpdungnl->FK_MACONGTY->EditValue)) {
	$arwrk = $t_bpdungnl->FK_MACONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_bpdungnl->FK_MACONGTY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $t_bpdungnl->FK_MACONGTY->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_MACONGTY->ViewValue ?></div>
<input type="hidden" name="x_FK_MACONGTY" id="x_FK_MACONGTY" value="<?php echo ew_HtmlEncode($t_bpdungnl->FK_MACONGTY->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->FK_MACONGTY->CustomMsg ?></td>
	</tr>
<?php }else{ ?>
<tr<?php echo $t_bpdungnl->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_bpdungnl->FK_MACONGTY->CellAttributes() ?>><span id="el_FK_MACONGTY">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<select id="x_FK_MACONGTY" name="x_FK_MACONGTY" title="<?php echo $t_bpdungnl->FK_MACONGTY->FldTitle() ?>"<?php echo $t_bpdungnl->FK_MACONGTY->EditAttributes() ?>>
<?php
if (is_array($t_bpdungnl->FK_MACONGTY->EditValue)) {
	$arwrk = $t_bpdungnl->FK_MACONGTY->EditValue;
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
<div<?php echo $t_bpdungnl->FK_MACONGTY->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_MACONGTY->ViewValue ?></div>
<input type="hidden" name="x_FK_MACONGTY" id="x_FK_MACONGTY" value="<?php echo ew_HtmlEncode($t_bpdungnl->FK_MACONGTY->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->FK_MACONGTY->CustomMsg ?></td>
</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_NAM->Visible) { // C_NAM ?>
	<tr<?php echo $t_bpdungnl->C_NAM->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_NAM->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_bpdungnl->C_NAM->CellAttributes() ?>><span id="el_C_NAM">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<select id="x_C_NAM" name="x_C_NAM" title="<?php echo $t_bpdungnl->C_NAM->FldTitle() ?>"<?php echo $t_bpdungnl->C_NAM->EditAttributes() ?>>
<?php
if (is_array($t_bpdungnl->C_NAM->EditValue)) {
	$arwrk = $t_bpdungnl->C_NAM->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_bpdungnl->C_NAM->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $t_bpdungnl->C_NAM->ViewAttributes() ?>><?php echo $t_bpdungnl->C_NAM->ViewValue ?></div>
<input type="hidden" name="x_C_NAM" id="x_C_NAM" value="<?php echo ew_HtmlEncode($t_bpdungnl->C_NAM->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->C_NAM->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_TENBP->Visible) { // C_TENBP ?>
	<tr<?php echo $t_bpdungnl->C_TENBP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_TENBP->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_bpdungnl->C_TENBP->CellAttributes() ?>><span id="el_C_TENBP">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENBP" id="x_C_TENBP" title="<?php echo $t_bpdungnl->C_TENBP->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_bpdungnl->C_TENBP->EditValue ?>"<?php echo $t_bpdungnl->C_TENBP->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_bpdungnl->C_TENBP->ViewAttributes() ?>><?php echo $t_bpdungnl->C_TENBP->ViewValue ?></div>
<input type="hidden" name="x_C_TENBP" id="x_C_TENBP" value="<?php echo ew_HtmlEncode($t_bpdungnl->C_TENBP->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->C_TENBP->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php  include "include/ajax.php" ?>
<?php if ($t_bpdungnl->FK_LOAINHIENLIEU->Visible) { // FK_LOAINHIENLIEU ?>
	<tr<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->CellAttributes() ?>><span id="el_FK_LOAINHIENLIEU">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<select id="x_FK_LOAINHIENLIEU" name="x_FK_LOAINHIENLIEU" title="<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldTitle() ?>"<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->EditAttributes() ?> onchange="SendRequest(this.value,'t_loainhienlieu','C_DONVI','PK_LOAINHIENLIEU')">
<?php
if (is_array($t_bpdungnl->FK_LOAINHIENLIEU->EditValue)) {
	$arwrk = $t_bpdungnl->FK_LOAINHIENLIEU->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewValue ?></div>
<input type="hidden" name="x_FK_LOAINHIENLIEU" id="x_FK_LOAINHIENLIEU" value="<?php echo ew_HtmlEncode($t_bpdungnl->FK_LOAINHIENLIEU->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_SOLUONG->Visible) { // C_SOLUONG ?>
	<tr<?php echo $t_bpdungnl->C_SOLUONG->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_SOLUONG->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_SOLUONG->CellAttributes() ?>><span id="el_C_SOLUONG">
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<input type="text" name="x_C_SOLUONG" id="x_C_SOLUONG" title="<?php echo $t_bpdungnl->C_SOLUONG->FldTitle() ?>" size="30" value="<?php echo $t_bpdungnl->C_SOLUONG->EditValue ?>"<?php echo $t_bpdungnl->C_SOLUONG->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_bpdungnl->C_SOLUONG->ViewAttributes() ?>><?php echo $t_bpdungnl->C_SOLUONG->ViewValue ?></div>
<input type="hidden" name="x_C_SOLUONG" id="x_C_SOLUONG" value="<?php echo ew_HtmlEncode($t_bpdungnl->C_SOLUONG->FormValue) ?>">
<?php } ?>
</span><?php echo $t_bpdungnl->C_SOLUONG->CustomMsg ?><span id="view"> </span></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($t_bpdungnl->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>" onclick="this.form.a_add.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_add.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($t_bpdungnl->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_bpdungnl_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_bpdungnl_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_bpdungnl';

	// Page object name
	var $PageObjName = 't_bpdungnl_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) $PageUrl .= "t=" . $t_bpdungnl->TableVar . "&"; // Add page token
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
		global $objForm, $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) {
			if ($objForm)
				return ($t_bpdungnl->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_bpdungnl->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_bpdungnl_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_bpdungnl)
		$GLOBALS["t_bpdungnl"] = new ct_bpdungnl();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_bpdungnl', TRUE);

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
		global $t_bpdungnl;

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
		if (!$Security->CanAdd() || !$Security->CanAddex()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_bpdungnllist.php");
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
		global $objForm, $Language, $gsFormError, $t_bpdungnl;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_BPDUNGNL"] != "") {
		  $t_bpdungnl->PK_BPDUNGNL->setQueryStringValue($_GET["PK_BPDUNGNL"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_bpdungnl->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_bpdungnl->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_bpdungnl->CurrentAction = "C"; // Copy record
		  } else {
		    $t_bpdungnl->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_bpdungnl->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("noadd")); // No record found
		      $this->Page_Terminate("t_bpdungnllist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_bpdungnl->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_bpdungnl->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_bpdungnlview.php")
						$sReturnUrl = $t_bpdungnl->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		if ($t_bpdungnl->CurrentAction == "F") { // Confirm page
		  $t_bpdungnl->RowType = EW_ROWTYPE_VIEW; // Render view type
		} else {
		  $t_bpdungnl->RowType = EW_ROWTYPE_ADD; // Render add type
		}

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_bpdungnl;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_bpdungnl;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_bpdungnl;
		$t_bpdungnl->FK_MACONGTY->setFormValue($objForm->GetValue("x_FK_MACONGTY"));
		$t_bpdungnl->C_NAM->setFormValue($objForm->GetValue("x_C_NAM"));
		$t_bpdungnl->C_TENBP->setFormValue($objForm->GetValue("x_C_TENBP"));
		$t_bpdungnl->FK_LOAINHIENLIEU->setFormValue($objForm->GetValue("x_FK_LOAINHIENLIEU"));
		$t_bpdungnl->C_SOLUONG->setFormValue($objForm->GetValue("x_C_SOLUONG"));
		$t_bpdungnl->PK_BPDUNGNL->setFormValue($objForm->GetValue("x_PK_BPDUNGNL"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->CurrentValue = $t_bpdungnl->PK_BPDUNGNL->FormValue;
		$t_bpdungnl->FK_MACONGTY->CurrentValue = $t_bpdungnl->FK_MACONGTY->FormValue;
		$t_bpdungnl->C_NAM->CurrentValue = $t_bpdungnl->C_NAM->FormValue;
		$t_bpdungnl->C_TENBP->CurrentValue = $t_bpdungnl->C_TENBP->FormValue;
		$t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue = $t_bpdungnl->FK_LOAINHIENLIEU->FormValue;
		$t_bpdungnl->C_SOLUONG->CurrentValue = $t_bpdungnl->C_SOLUONG->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_bpdungnl;
		$sFilter = $t_bpdungnl->KeyFilter();

		// Call Row Selecting event
		$t_bpdungnl->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_bpdungnl->CurrentFilter = $sFilter;
		$sSql = $t_bpdungnl->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_bpdungnl->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->setDbValue($rs->fields('PK_BPDUNGNL'));
		$t_bpdungnl->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$t_bpdungnl->C_NAM->setDbValue($rs->fields('C_NAM'));
		$t_bpdungnl->C_TENBP->setDbValue($rs->fields('C_TENBP'));
		$t_bpdungnl->FK_LOAINHIENLIEU->setDbValue($rs->fields('FK_LOAINHIENLIEU'));
		$t_bpdungnl->C_SOLUONG->setDbValue($rs->fields('C_SOLUONG'));
		$t_bpdungnl->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_bpdungnl->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_bpdungnl->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_bpdungnl->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_bpdungnl;

		// Initialize URLs
		// Call Row_Rendering event

		$t_bpdungnl->Row_Rendering();

		// Common render codes for all row types
		// FK_MACONGTY

		$t_bpdungnl->FK_MACONGTY->CellCssStyle = ""; $t_bpdungnl->FK_MACONGTY->CellCssClass = "";
		$t_bpdungnl->FK_MACONGTY->CellAttrs = array(); $t_bpdungnl->FK_MACONGTY->ViewAttrs = array(); $t_bpdungnl->FK_MACONGTY->EditAttrs = array();

		// C_NAM
		$t_bpdungnl->C_NAM->CellCssStyle = ""; $t_bpdungnl->C_NAM->CellCssClass = "";
		$t_bpdungnl->C_NAM->CellAttrs = array(); $t_bpdungnl->C_NAM->ViewAttrs = array(); $t_bpdungnl->C_NAM->EditAttrs = array();

		// C_TENBP
		$t_bpdungnl->C_TENBP->CellCssStyle = ""; $t_bpdungnl->C_TENBP->CellCssClass = "";
		$t_bpdungnl->C_TENBP->CellAttrs = array(); $t_bpdungnl->C_TENBP->ViewAttrs = array(); $t_bpdungnl->C_TENBP->EditAttrs = array();

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->CellCssStyle = ""; $t_bpdungnl->FK_LOAINHIENLIEU->CellCssClass = "";
		$t_bpdungnl->FK_LOAINHIENLIEU->CellAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->EditAttrs = array();

		// C_SOLUONG
		$t_bpdungnl->C_SOLUONG->CellCssStyle = ""; $t_bpdungnl->C_SOLUONG->CellCssClass = "";
		$t_bpdungnl->C_SOLUONG->CellAttrs = array(); $t_bpdungnl->C_SOLUONG->ViewAttrs = array(); $t_bpdungnl->C_SOLUONG->EditAttrs = array();
		if ($t_bpdungnl->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_BPDUNGNL
			$t_bpdungnl->PK_BPDUNGNL->ViewValue = $t_bpdungnl->PK_BPDUNGNL->CurrentValue;
			$t_bpdungnl->PK_BPDUNGNL->CssStyle = "";
			$t_bpdungnl->PK_BPDUNGNL->CssClass = "";
			$t_bpdungnl->PK_BPDUNGNL->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($t_bpdungnl->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_bpdungnl->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_MACONGTY->ViewValue = $t_bpdungnl->FK_MACONGTY->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_MACONGTY->ViewValue = NULL;
			}
			$t_bpdungnl->FK_MACONGTY->CssStyle = "";
			$t_bpdungnl->FK_MACONGTY->CssClass = "";
			$t_bpdungnl->FK_MACONGTY->ViewCustomAttributes = "";		

                        // C_NAM
			if (strval($t_bpdungnl->C_NAM->CurrentValue) <> "") {
                                $t_bpdungnl->C_NAM->ViewValue = $t_bpdungnl->C_NAM->CurrentValue;

			} else {
				$t_bpdungnl->C_NAM->ViewValue = NULL;
			}
			$t_bpdungnl->C_NAM->CssStyle = "";
			$t_bpdungnl->C_NAM->CssClass = "";
			$t_bpdungnl->C_NAM->ViewCustomAttributes = "";
			// C_TENBP
			$t_bpdungnl->C_TENBP->ViewValue = $t_bpdungnl->C_TENBP->CurrentValue;
			$t_bpdungnl->C_TENBP->CssStyle = "";
			$t_bpdungnl->C_TENBP->CssClass = "";
			$t_bpdungnl->C_TENBP->ViewCustomAttributes = "";

			// FK_LOAINHIENLIEU
			if (strval($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) <> "") {
				$sFilterWrk = "`PK_LOAINHIENLIEU` = " . ew_AdjustSql($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENLOAI` FROM `t_loainhienlieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $rswrk->fields('C_TENLOAI');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = NULL;
			}
			$t_bpdungnl->FK_LOAINHIENLIEU->CssStyle = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->CssClass = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->ViewCustomAttributes = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->ViewValue = $t_bpdungnl->C_SOLUONG->CurrentValue;
			$t_bpdungnl->C_SOLUONG->CssStyle = "";
			$t_bpdungnl->C_SOLUONG->CssClass = "";
			$t_bpdungnl->C_SOLUONG->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_bpdungnl->C_USER_ADD->ViewValue = $t_bpdungnl->C_USER_ADD->CurrentValue;
			$t_bpdungnl->C_USER_ADD->CssStyle = "";
			$t_bpdungnl->C_USER_ADD->CssClass = "";
			$t_bpdungnl->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_bpdungnl->C_ADD_TIME->ViewValue = $t_bpdungnl->C_ADD_TIME->CurrentValue;
			$t_bpdungnl->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_ADD_TIME->ViewValue, 7);
			$t_bpdungnl->C_ADD_TIME->CssStyle = "";
			$t_bpdungnl->C_ADD_TIME->CssClass = "";
			$t_bpdungnl->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_bpdungnl->C_USER_EDIT->ViewValue = $t_bpdungnl->C_USER_EDIT->CurrentValue;
			$t_bpdungnl->C_USER_EDIT->CssStyle = "";
			$t_bpdungnl->C_USER_EDIT->CssClass = "";
			$t_bpdungnl->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_bpdungnl->C_EDIT_TIME->ViewValue = $t_bpdungnl->C_EDIT_TIME->CurrentValue;
			$t_bpdungnl->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_EDIT_TIME->ViewValue, 7);
			$t_bpdungnl->C_EDIT_TIME->CssStyle = "";
			$t_bpdungnl->C_EDIT_TIME->CssClass = "";
			$t_bpdungnl->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->HrefValue = "";
			$t_bpdungnl->FK_MACONGTY->TooltipValue = "";

			// C_NAM
			$t_bpdungnl->C_NAM->HrefValue = "";
			$t_bpdungnl->C_NAM->TooltipValue = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->HrefValue = "";
			$t_bpdungnl->C_TENBP->TooltipValue = "";

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->HrefValue = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->TooltipValue = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->HrefValue = "";
			$t_bpdungnl->C_SOLUONG->TooltipValue = "";
		} elseif ($t_bpdungnl->RowType == EW_ROWTYPE_ADD) { // Add row

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->EditCustomAttributes = "";
			$arwrk = GetCompanyTree();
			$t_bpdungnl->FK_MACONGTY->EditValue = $arwrk;

			// C_NAM
			$t_bpdungnl->C_NAM->EditCustomAttributes = "";
			$arwrk = array();
                        $str=substr(ew_CurrentDate(), 0, 4) ;
                        $num = (int)$str;
                        for ($i=$num;$i>($num-10);$i--)
                        {
                            $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_bpdungnl->C_NAM->EditValue = $arwrk;

			// C_TENBP
			$t_bpdungnl->C_TENBP->EditCustomAttributes = "";
			$t_bpdungnl->C_TENBP->EditValue = ew_HtmlEncode($t_bpdungnl->C_TENBP->CurrentValue);

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_LOAINHIENLIEU`, `C_TENLOAI`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_loainhienlieu`";
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
			$t_bpdungnl->FK_LOAINHIENLIEU->EditValue = $arwrk;

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->EditCustomAttributes = "";
			$t_bpdungnl->C_SOLUONG->EditValue = ew_HtmlEncode($t_bpdungnl->C_SOLUONG->CurrentValue);
		}

		// Call Row Rendered event
		if ($t_bpdungnl->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_bpdungnl->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_bpdungnl;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_bpdungnl->FK_MACONGTY->FormValue) && $t_bpdungnl->FK_MACONGTY->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_bpdungnl->FK_MACONGTY->FldCaption();
		}
		if (!is_null($t_bpdungnl->C_NAM->FormValue) && $t_bpdungnl->C_NAM->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_bpdungnl->C_NAM->FldCaption();
		}
		if (!is_null($t_bpdungnl->C_TENBP->FormValue) && $t_bpdungnl->C_TENBP->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_bpdungnl->C_TENBP->FldCaption();
		}
		if (!is_null($t_bpdungnl->FK_LOAINHIENLIEU->FormValue) && $t_bpdungnl->FK_LOAINHIENLIEU->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption();
		}
		if (!ew_CheckNumber($t_bpdungnl->C_SOLUONG->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_bpdungnl->C_SOLUONG->FldErrMsg();
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
		global $conn, $Language, $Security, $t_bpdungnl;
		$rsnew = array();

		// FK_MACONGTY
		$t_bpdungnl->FK_MACONGTY->SetDbValueDef($rsnew, $t_bpdungnl->FK_MACONGTY->CurrentValue, 0, FALSE);

		// C_NAM
		$t_bpdungnl->C_NAM->SetDbValueDef($rsnew, $t_bpdungnl->C_NAM->CurrentValue, "", FALSE);

		// C_TENBP
		$t_bpdungnl->C_TENBP->SetDbValueDef($rsnew, $t_bpdungnl->C_TENBP->CurrentValue, "", FALSE);

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->SetDbValueDef($rsnew, $t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue, 0, FALSE);

		// C_SOLUONG
		$t_bpdungnl->C_SOLUONG->SetDbValueDef($rsnew, $t_bpdungnl->C_SOLUONG->CurrentValue, NULL, FALSE);

                // C_USER_ADD
		$t_bpdungnl->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), 0, FALSE);

                // C_USER_EDIT
		$t_bpdungnl->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), 0, FALSE);

                // C_ADD_TIME
		$t_bpdungnl->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), ew_CurrentDateTime(), FALSE);

                // C_EDIT_TIME
		$t_bpdungnl->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), ew_CurrentDateTime(), FALSE);
                 $st =$Security->CurrentUserOption().",".$t_bpdungnl->C_NAM->CurrentValue. "," .$t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue.",". $t_bpdungnl->C_TENBP->CurrentValue;
		// Call Row Inserting event
               
               if( check_identical_data("t_bpdungnl","FK_MACONGTY,C_NAM,FK_LOAINHIENLIEU,C_TENBP",$st) !=0)
               {
               $this->setMessage($Language->Phrase("identical_data"));
               }
               else
               {
		$bInsertRow = $t_bpdungnl->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';

			$AddRow = $conn->Execute($t_bpdungnl->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_bpdungnl->CancelMessage <> "") {
				$this->setMessage($t_bpdungnl->CancelMessage);
				$t_bpdungnl->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_bpdungnl->PK_BPDUNGNL->setDbValue($conn->Insert_ID());
			$rsnew['PK_BPDUNGNL'] = $t_bpdungnl->PK_BPDUNGNL->DbValue;

			// Call Row Inserted event
			$t_bpdungnl->Row_Inserted($rsnew);
		}
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
