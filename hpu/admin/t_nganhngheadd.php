<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_nganhngheinfo.php" ?>
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
$t_nganhnghe_add = new ct_nganhnghe_add();
$Page =& $t_nganhnghe_add;

// Page init
$t_nganhnghe_add->Page_Init();

// Page main
$t_nganhnghe_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_nganhnghe_add = new ew_Page("t_nganhnghe_add");

// page properties
t_nganhnghe_add.PageID = "add"; // page ID
t_nganhnghe_add.FormID = "ft_nganhngheadd"; // form ID
var EW_PAGE_ID = t_nganhnghe_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_nganhnghe_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_TENNGANH"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_nganhnghe->C_TENNGANH->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TRANGTHAI"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_nganhnghe->C_TRANGTHAI->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_BELONGTO"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_nganhnghe->C_BELONGTO->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_nganhnghe_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_nganhnghe_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_nganhnghe_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_nganhnghe_add.ValidateRequired = false; // no JavaScript validation
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
								<?php echo $t_nganhnghe->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<a href="<?php echo $t_nganhnghe->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_nganhnghe_add->ShowMessage();
?>
<form name="ft_nganhngheadd" id="ft_nganhngheadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_nganhnghe_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_nganhnghe">
<input type="hidden" name="a_add" id="a_add" value="A">
<?php if ($t_nganhnghe->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_nganhnghe->C_TENNGANH->Visible) { // C_TENNGANH ?>
	<tr<?php echo $t_nganhnghe->C_TENNGANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_nganhnghe->C_TENNGANH->CellAttributes() ?>><span id="el_C_TENNGANH">
<?php if ($t_nganhnghe->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENNGANH" id="x_C_TENNGANH" title="<?php echo $t_nganhnghe->C_TENNGANH->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_nganhnghe->C_TENNGANH->EditValue ?>"<?php echo $t_nganhnghe->C_TENNGANH->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_nganhnghe->C_TENNGANH->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TENNGANH->ViewValue ?></div>
<input type="hidden" name="x_C_TENNGANH" id="x_C_TENNGANH" value="<?php echo ew_HtmlEncode($t_nganhnghe->C_TENNGANH->FormValue) ?>">
<?php } ?>
</span><?php echo $t_nganhnghe->C_TENNGANH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_nganhnghe->C_TRANGTHAI->Visible) { // C_TRANGTHAI ?>
	<tr<?php echo $t_nganhnghe->C_TRANGTHAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_nganhnghe->C_TRANGTHAI->CellAttributes() ?>><span id="el_C_TRANGTHAI">
<?php if ($t_nganhnghe->CurrentAction <> "F") { ?>
<select id="x_C_TRANGTHAI" name="x_C_TRANGTHAI" title="<?php echo $t_nganhnghe->C_TRANGTHAI->FldTitle() ?>"<?php echo $t_nganhnghe->C_TRANGTHAI->EditAttributes() ?>>
<?php
if (is_array($t_nganhnghe->C_TRANGTHAI->EditValue)) {
	$arwrk = $t_nganhnghe->C_TRANGTHAI->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_nganhnghe->C_TRANGTHAI->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<div<?php echo $t_nganhnghe->C_TRANGTHAI->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TRANGTHAI->ViewValue ?></div>
<input type="hidden" name="x_C_TRANGTHAI" id="x_C_TRANGTHAI" value="<?php echo ew_HtmlEncode($t_nganhnghe->C_TRANGTHAI->FormValue) ?>">
<?php } ?>
</span><?php echo $t_nganhnghe->C_TRANGTHAI->CustomMsg ?></td>
	</tr>
<?php } ?>

</table>
</div>
</td></tr></table>
<p>
<?php if ($t_nganhnghe->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>" onclick="this.form.a_add.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_add.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($t_nganhnghe->CurrentAction <> "F") { ?>
<?php } ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_nganhnghe_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_nganhnghe_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_nganhnghe';

	// Page object name
	var $PageObjName = 't_nganhnghe_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $t_nganhnghe->TableVar . "&"; // Add page token
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
		global $objForm, $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) {
			if ($objForm)
				return ($t_nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_nganhnghe_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nganhnghe)
		$GLOBALS["t_nganhnghe"] = new ct_nganhnghe();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_nganhnghe', TRUE);

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
		global $t_nganhnghe;

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
			$this->Page_Terminate("t_nganhnghelist.php");
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
		global $objForm, $Language, $gsFormError, $t_nganhnghe;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_NGANH_ID"] != "") {
		  $t_nganhnghe->PK_NGANH_ID->setQueryStringValue($_GET["PK_NGANH_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_nganhnghe->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_nganhnghe->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_nganhnghe->CurrentAction = "C"; // Copy record
		  } else {
		    $t_nganhnghe->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_nganhnghe->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_nganhnghelist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_nganhnghe->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_nganhnghe->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_nganhngheview.php")
						$sReturnUrl = $t_nganhnghe->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		if ($t_nganhnghe->CurrentAction == "F") { // Confirm page
		  $t_nganhnghe->RowType = EW_ROWTYPE_VIEW; // Render view type
		} else {
		  $t_nganhnghe->RowType = EW_ROWTYPE_ADD; // Render add type
		}

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_nganhnghe;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_nganhnghe;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_nganhnghe;
		$t_nganhnghe->C_TENNGANH->setFormValue($objForm->GetValue("x_C_TENNGANH"));
		$t_nganhnghe->C_TRANGTHAI->setFormValue($objForm->GetValue("x_C_TRANGTHAI"));
		$t_nganhnghe->C_BELONGTO->setFormValue($objForm->GetValue("x_C_BELONGTO"));
		$t_nganhnghe->PK_NGANH_ID->setFormValue($objForm->GetValue("x_PK_NGANH_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_nganhnghe;
		$t_nganhnghe->PK_NGANH_ID->CurrentValue = $t_nganhnghe->PK_NGANH_ID->FormValue;
		$t_nganhnghe->C_TENNGANH->CurrentValue = $t_nganhnghe->C_TENNGANH->FormValue;
		$t_nganhnghe->C_TRANGTHAI->CurrentValue = $t_nganhnghe->C_TRANGTHAI->FormValue;
		$t_nganhnghe->C_BELONGTO->CurrentValue = $t_nganhnghe->C_BELONGTO->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_nganhnghe;
		$sFilter = $t_nganhnghe->KeyFilter();

		// Call Row Selecting event
		$t_nganhnghe->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_nganhnghe->CurrentFilter = $sFilter;
		$sSql = $t_nganhnghe->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_nganhnghe->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_nganhnghe;
		$t_nganhnghe->PK_NGANH_ID->setDbValue($rs->fields('PK_NGANH_ID'));
		$t_nganhnghe->C_TENNGANH->setDbValue($rs->fields('C_TENNGANH'));
		$t_nganhnghe->C_TRANGTHAI->setDbValue($rs->fields('C_TRANGTHAI'));
		$t_nganhnghe->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_nganhnghe->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_nganhnghe->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_nganhnghe->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_nganhnghe->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_nganhnghe;

		// Initialize URLs
		// Call Row_Rendering event

		$t_nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// C_TENNGANH

		$t_nganhnghe->C_TENNGANH->CellCssStyle = ""; $t_nganhnghe->C_TENNGANH->CellCssClass = "";
		$t_nganhnghe->C_TENNGANH->CellAttrs = array(); $t_nganhnghe->C_TENNGANH->ViewAttrs = array(); $t_nganhnghe->C_TENNGANH->EditAttrs = array();

		// C_TRANGTHAI
		$t_nganhnghe->C_TRANGTHAI->CellCssStyle = ""; $t_nganhnghe->C_TRANGTHAI->CellCssClass = "";
		$t_nganhnghe->C_TRANGTHAI->CellAttrs = array(); $t_nganhnghe->C_TRANGTHAI->ViewAttrs = array(); $t_nganhnghe->C_TRANGTHAI->EditAttrs = array();

		// C_BELONGTO
		$t_nganhnghe->C_BELONGTO->CellCssStyle = ""; $t_nganhnghe->C_BELONGTO->CellCssClass = "";
		$t_nganhnghe->C_BELONGTO->CellAttrs = array(); $t_nganhnghe->C_BELONGTO->ViewAttrs = array(); $t_nganhnghe->C_BELONGTO->EditAttrs = array();
		if ($t_nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGANH_ID
			$t_nganhnghe->PK_NGANH_ID->ViewValue = $t_nganhnghe->PK_NGANH_ID->CurrentValue;
			$t_nganhnghe->PK_NGANH_ID->CssStyle = "";
			$t_nganhnghe->PK_NGANH_ID->CssClass = "";
			$t_nganhnghe->PK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->ViewValue = $t_nganhnghe->C_TENNGANH->CurrentValue;
			$t_nganhnghe->C_TENNGANH->CssStyle = "";
			$t_nganhnghe->C_TENNGANH->CssClass = "";
			$t_nganhnghe->C_TENNGANH->ViewCustomAttributes = "";

			// C_TRANGTHAI
			if (strval($t_nganhnghe->C_TRANGTHAI->CurrentValue) <> "") {
				switch ($t_nganhnghe->C_TRANGTHAI->CurrentValue) {
					case "1":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Hiển thị";
						break;
					case "0":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Chưa hiển thị";
						break;
					default:
						$t_nganhnghe->C_TRANGTHAI->ViewValue = $t_nganhnghe->C_TRANGTHAI->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_TRANGTHAI->ViewValue = NULL;
			}
			$t_nganhnghe->C_TRANGTHAI->CssStyle = "";
			$t_nganhnghe->C_TRANGTHAI->CssClass = "";
			$t_nganhnghe->C_TRANGTHAI->ViewCustomAttributes = "";

			// C_BELONGTO
                      
			$t_nganhnghe->C_BELONGTO->ViewValue = $t_nganhnghe->C_BELONGTO->CurrentValue;
			$t_nganhnghe->C_BELONGTO->CssStyle = "";
			$t_nganhnghe->C_BELONGTO->CssClass = "";
			$t_nganhnghe->C_BELONGTO->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
			if (strval($t_nganhnghe->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_ADD->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_ADD->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_ADD->CssStyle = "";
			$t_nganhnghe->C_USER_ADD->CssClass = "";
			$t_nganhnghe->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->ViewValue = $t_nganhnghe->C_ADD_TIME->CurrentValue;
			$t_nganhnghe->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_ADD_TIME->ViewValue, 7);
			$t_nganhnghe->C_ADD_TIME->CssStyle = "";
			$t_nganhnghe->C_ADD_TIME->CssClass = "";
			$t_nganhnghe->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
			if (strval($t_nganhnghe->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_nganhnghe->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_nganhnghe->C_USER_EDIT->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_USER_EDIT->ViewValue = NULL;
			}
			$t_nganhnghe->C_USER_EDIT->CssStyle = "";
			$t_nganhnghe->C_USER_EDIT->CssClass = "";
			$t_nganhnghe->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->ViewValue = $t_nganhnghe->C_EDIT_TIME->CurrentValue;
			$t_nganhnghe->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_EDIT_TIME->ViewValue, 7);
			$t_nganhnghe->C_EDIT_TIME->CssStyle = "";
			$t_nganhnghe->C_EDIT_TIME->CssClass = "";
			$t_nganhnghe->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->HrefValue = "";
			$t_nganhnghe->C_TENNGANH->TooltipValue = "";

			// C_TRANGTHAI
			$t_nganhnghe->C_TRANGTHAI->HrefValue = "";
			$t_nganhnghe->C_TRANGTHAI->TooltipValue = "";

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->HrefValue = "";
			$t_nganhnghe->C_BELONGTO->TooltipValue = "";
		} elseif ($t_nganhnghe->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->EditCustomAttributes = "";
			$t_nganhnghe->C_TENNGANH->EditValue = ew_HtmlEncode($t_nganhnghe->C_TENNGANH->CurrentValue);

			// C_TRANGTHAI
			$t_nganhnghe->C_TRANGTHAI->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Hiển thị ");
			$arwrk[] = array("0", "Chưa hiển thị");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_nganhnghe->C_TRANGTHAI->EditValue = $arwrk;

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->EditCustomAttributes = "";
			$t_nganhnghe->C_BELONGTO->EditValue = ew_HtmlEncode($t_nganhnghe->C_BELONGTO->CurrentValue);
		}

		// Call Row Rendered event
		if ($t_nganhnghe->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_nganhnghe->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_nganhnghe;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_nganhnghe->C_TENNGANH->FormValue) && $t_nganhnghe->C_TENNGANH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_nganhnghe->C_TENNGANH->FldCaption();
		}
		if (!is_null($t_nganhnghe->C_TRANGTHAI->FormValue) && $t_nganhnghe->C_TRANGTHAI->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_nganhnghe->C_TRANGTHAI->FldCaption();
		}
		if (!ew_CheckInteger($t_nganhnghe->C_BELONGTO->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_nganhnghe->C_BELONGTO->FldErrMsg();
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
		global $conn, $Language, $Security, $t_nganhnghe;
		$rsnew = array();

		// C_TENNGANH
		$t_nganhnghe->C_TENNGANH->SetDbValueDef($rsnew, $t_nganhnghe->C_TENNGANH->CurrentValue, "", FALSE);

		// C_TRANGTHAI
		$t_nganhnghe->C_TRANGTHAI->SetDbValueDef($rsnew, $t_nganhnghe->C_TRANGTHAI->CurrentValue, 0, FALSE);
                // * BY QUANG HUNG
                        // C_ADD_TIME
                        $t_nganhnghe->C_ADD_TIME->SetDbValueDef($rsnew,ew_CurrentDateTime(), 0, FALSE);
                        //C_USER_ADD
                        $t_nganhnghe->C_USER_ADD->SetDbValueDef($rsnew,CurrentUserID(), 0, FALSE);
                        //* END
		// C_BELONGTO
		//$t_nganhnghe->C_BELONGTO->SetDbValueDef($rsnew, $t_nganhnghe->C_BELONGTO->CurrentValue, 0, FALSE);
                // * BY QUANG HUNG
                if (is_null($_SESSION['parentPK_NGANH_ID']))
                            {
                             $t_nganhnghe->C_BELONGTO->SetDbValueDef($rsnew, 0, 0);
                            $rsnew['C_BELONGTO'] =& $t_nganhnghe->C_BELONGTO->DbValue;
                             }
                             ELSE
                             {
                               $t_nganhnghe->C_BELONGTO->SetDbValueDef($rsnew,$_SESSION['parentPK_NGANH_ID'],$_SESSION['parentPK_NGANH_ID'] );
                               $rsnew['C_BELONGTO'] =& $t_nganhnghe->C_BELONGTO->DbValue;
                             
                             }
                // END;
                //     Redirect ("http://sp2hari.com");
		// Call Row Inserting event
		$bInsertRow = $t_nganhnghe->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_nganhnghe->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_nganhnghe->CancelMessage <> "") {
				$this->setMessage($t_nganhnghe->CancelMessage);
				$t_nganhnghe->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_nganhnghe->PK_NGANH_ID->setDbValue($conn->Insert_ID());
			$rsnew['PK_NGANH_ID'] = $t_nganhnghe->PK_NGANH_ID->DbValue;

			// Call Row Inserted event
			$t_nganhnghe->Row_Inserted($rsnew);
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
