<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_ghichu_lichinfo.php" ?>
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
$t_ghichu_lich_add = new ct_ghichu_lich_add();
$Page =& $t_ghichu_lich_add;

// Page init
$t_ghichu_lich_add->Page_Init();

// Page main
$t_ghichu_lich_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_ghichu_lich_add = new ew_Page("t_ghichu_lich_add");

// page properties
t_ghichu_lich_add.PageID = "add"; // page ID
t_ghichu_lich_add.FormID = "ft_ghichu_lichadd"; // form ID
var EW_PAGE_ID = t_ghichu_lich_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_ghichu_lich_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		
		elm = fobj.elements["x" + infix + "_C_WEEK"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_ghichu_lich->C_WEEK->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_CONTENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_ghichu_lich->C_CONTENT->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_ghichu_lich_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ghichu_lich_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ghichu_lich_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ghichu_lich_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
<!--
_width_multiplier = 20;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {			
		var inst;			
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];		
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];	
		if (inst)
			inst.focus();
	}
}

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p class="pheader"><?php echo $t_ghichu_lich->TableCaption() ?></p>
<a href="<?php echo $t_ghichu_lich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_ghichu_lich_add->ShowMessage();
?>
<form name="ft_ghichu_lichadd" id="ft_ghichu_lichadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_ghichu_lich_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_ghichu_lich">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_ghichu_lich->FK_CONG_TY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_ghichu_lich->FK_CONG_TY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->FK_CONG_TY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_ghichu_lich->FK_CONG_TY->CellAttributes() ?>><span id="el_FK_CONG_TY">
<select id="x_FK_CONG_TY" name="x_FK_CONG_TY" title="<?php echo $t_ghichu_lich->FK_CONG_TY->FldTitle() ?>"<?php echo $t_ghichu_lich->FK_CONG_TY->EditAttributes() ?>>
<?php
if (isAdmin())
{
        if (is_array($t_ghichu_lich->FK_CONG_TY->EditValue)) {
                $arwrk = $t_ghichu_lich->FK_CONG_TY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_ghichu_lich->FK_CONG_TY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                        if ($selwrk <> "") $emptywrk = FALSE;
        ?>
        <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
        <?php echo $arwrk[$rowcntwrk][1] ?>
        </option>
        <?php
                }
        }
} 
else
{  
      if (is_array($t_ghichu_lich->FK_CONG_TY->EditValue)) {
                $arwrk = $t_ghichu_lich->FK_CONG_TY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                     if (strval($Security->CurrentUserOption()) == strval($arwrk[$rowcntwrk][0]))
                            {
                            $selwrk = " selected=\"selected\"";

        ?>
        <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
        <?php echo $arwrk[$rowcntwrk][1] ?>
        </option>
        <?php                }
                }
        }
}    
?>
</select>
</span><?php echo $t_ghichu_lich->FK_CONG_TY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_YEAR->Visible) { // C_YEAR ?>
	<tr<?php echo $t_ghichu_lich->C_YEAR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_WEEK->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_ghichu_lich->C_YEAR->CellAttributes() ?>>          
<span id="el_C_WEEK">
<select id="x_C_WEEK" name="x_C_WEEK" title="<?php echo $t_ghichu_lich->C_WEEK->FldTitle() ?>"<?php echo $t_ghichu_lich->C_WEEK->EditAttributes() ?>>
<?php
if (is_array($t_ghichu_lich->C_WEEK->EditValue)) {
	$arwrk = $t_ghichu_lich->C_WEEK->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
        $Week = date("W")+1;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Week) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_ghichu_lich->C_WEEK->CustomMsg ?>  
 <span class="col2"> <?php echo $t_ghichu_lich->C_YEAR->FldCaption() ?></span> 
<span id="el_C_YEAR">
<select id="x_C_YEAR" name="x_C_YEAR" title="<?php echo $t_ghichu_lich->C_YEAR->FldTitle() ?>"<?php echo $t_ghichu_lich->C_YEAR->EditAttributes() ?>>
<?php
if (is_array($t_ghichu_lich->C_YEAR->EditValue)) {
	$arwrk = $t_ghichu_lich->C_YEAR->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		if (strval($num) == strval($arwrk[$rowcntwrk][0]))
                    {
                    $selwrk = " selected=\"selected\"";
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php               }
	}
}
?>
</select>
</span><?php echo $t_ghichu_lich->C_YEAR->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_ghichu_lich->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_ghichu_lich->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_ghichu_lich->C_CONTENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_ghichu_lich->C_CONTENT->CellAttributes() ?>><span id="el_C_CONTENT">
<textarea name="x_C_CONTENT" id="x_C_CONTENT" title="<?php echo $t_ghichu_lich->C_CONTENT->FldTitle() ?>" cols="35" rows="4"<?php echo $t_ghichu_lich->C_CONTENT->EditAttributes() ?>><?php echo $t_ghichu_lich->C_CONTENT->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_ghichu_lich->C_CONTENT->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENT', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENT", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENT', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span><?php echo $t_ghichu_lich->C_CONTENT->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_ghichu_lich_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_ghichu_lich_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_ghichu_lich';

	// Page object name
	var $PageObjName = 't_ghichu_lich_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) $PageUrl .= "t=" . $t_ghichu_lich->TableVar . "&"; // Add page token
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
		global $objForm, $t_ghichu_lich;
		if ($t_ghichu_lich->UseTokenInUrl) {
			if ($objForm)
				return ($t_ghichu_lich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ghichu_lich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_ghichu_lich_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_ghichu_lich)
		$GLOBALS["t_ghichu_lich"] = new ct_ghichu_lich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ghichu_lich', TRUE);

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
		global $t_ghichu_lich;

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
			$this->Page_Terminate("t_ghichu_lichlist.php");
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
		global $objForm, $Language, $gsFormError, $t_ghichu_lich;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["SB_NOTE_ID"] != "") {
		  $t_ghichu_lich->SB_NOTE_ID->setQueryStringValue($_GET["SB_NOTE_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_ghichu_lich->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_ghichu_lich->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_ghichu_lich->CurrentAction = "C"; // Copy record
		  } else {
		    $t_ghichu_lich->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_ghichu_lich->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_ghichu_lichlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_ghichu_lich->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_ghichu_lich->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_ghichu_lichview.php")
						$sReturnUrl = $t_ghichu_lich->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_ghichu_lich->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_ghichu_lich;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_ghichu_lich;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_ghichu_lich;
		$t_ghichu_lich->FK_CONG_TY->setFormValue($objForm->GetValue("x_FK_CONG_TY"));
		$t_ghichu_lich->C_YEAR->setFormValue($objForm->GetValue("x_C_YEAR"));
		$t_ghichu_lich->C_WEEK->setFormValue($objForm->GetValue("x_C_WEEK"));
		$t_ghichu_lich->C_CONTENT->setFormValue($objForm->GetValue("x_C_CONTENT"));
		$t_ghichu_lich->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_ghichu_lich->C_TIME_ADD->setFormValue($objForm->GetValue("x_C_TIME_ADD"));
		$t_ghichu_lich->C_TIME_ADD->CurrentValue = ew_UnFormatDateTime($t_ghichu_lich->C_TIME_ADD->CurrentValue, 7);
		$t_ghichu_lich->SB_NOTE_ID->setFormValue($objForm->GetValue("x_SB_NOTE_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_ghichu_lich;
		$t_ghichu_lich->SB_NOTE_ID->CurrentValue = $t_ghichu_lich->SB_NOTE_ID->FormValue;
		$t_ghichu_lich->FK_CONG_TY->CurrentValue = $t_ghichu_lich->FK_CONG_TY->FormValue;
		$t_ghichu_lich->C_YEAR->CurrentValue = $t_ghichu_lich->C_YEAR->FormValue;
		$t_ghichu_lich->C_WEEK->CurrentValue = $t_ghichu_lich->C_WEEK->FormValue;
		$t_ghichu_lich->C_CONTENT->CurrentValue = $t_ghichu_lich->C_CONTENT->FormValue;
		$t_ghichu_lich->C_USER_ADD->CurrentValue = $t_ghichu_lich->C_USER_ADD->FormValue;
		$t_ghichu_lich->C_TIME_ADD->CurrentValue = $t_ghichu_lich->C_TIME_ADD->FormValue;
		$t_ghichu_lich->C_TIME_ADD->CurrentValue = ew_UnFormatDateTime($t_ghichu_lich->C_TIME_ADD->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ghichu_lich;
		$sFilter = $t_ghichu_lich->KeyFilter();

		// Call Row Selecting event
		$t_ghichu_lich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_ghichu_lich->CurrentFilter = $sFilter;
		$sSql = $t_ghichu_lich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_ghichu_lich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_ghichu_lich;
		$t_ghichu_lich->SB_NOTE_ID->setDbValue($rs->fields('SB_NOTE_ID'));
		$t_ghichu_lich->FK_CONG_TY->setDbValue($rs->fields('FK_CONGTY'));
		$t_ghichu_lich->C_YEAR->setDbValue($rs->fields('C_YEAR'));
		$t_ghichu_lich->C_WEEK->setDbValue($rs->fields('C_WEEK'));
		$t_ghichu_lich->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_ghichu_lich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_ghichu_lich->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$t_ghichu_lich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_ghichu_lich->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_ghichu_lich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_ghichu_lich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_ghichu_lich->FK_CONG_TY->CellCssStyle = ""; $t_ghichu_lich->FK_CONG_TY->CellCssClass = "";
		$t_ghichu_lich->FK_CONG_TY->CellAttrs = array(); $t_ghichu_lich->FK_CONG_TY->ViewAttrs = array(); $t_ghichu_lich->FK_CONG_TY->EditAttrs = array();

		// C_YEAR
		$t_ghichu_lich->C_YEAR->CellCssStyle = ""; $t_ghichu_lich->C_YEAR->CellCssClass = "";
		$t_ghichu_lich->C_YEAR->CellAttrs = array(); $t_ghichu_lich->C_YEAR->ViewAttrs = array(); $t_ghichu_lich->C_YEAR->EditAttrs = array();

		// C_WEEK
		$t_ghichu_lich->C_WEEK->CellCssStyle = ""; $t_ghichu_lich->C_WEEK->CellCssClass = "";
		$t_ghichu_lich->C_WEEK->CellAttrs = array(); $t_ghichu_lich->C_WEEK->ViewAttrs = array(); $t_ghichu_lich->C_WEEK->EditAttrs = array();

		// C_CONTENT
		$t_ghichu_lich->C_CONTENT->CellCssStyle = ""; $t_ghichu_lich->C_CONTENT->CellCssClass = "";
		$t_ghichu_lich->C_CONTENT->CellAttrs = array(); $t_ghichu_lich->C_CONTENT->ViewAttrs = array(); $t_ghichu_lich->C_CONTENT->EditAttrs = array();

		// C_USER_ADD
		$t_ghichu_lich->C_USER_ADD->CellCssStyle = ""; $t_ghichu_lich->C_USER_ADD->CellCssClass = "";
		$t_ghichu_lich->C_USER_ADD->CellAttrs = array(); $t_ghichu_lich->C_USER_ADD->ViewAttrs = array(); $t_ghichu_lich->C_USER_ADD->EditAttrs = array();

		// C_TIME_ADD
		$t_ghichu_lich->C_TIME_ADD->CellCssStyle = ""; $t_ghichu_lich->C_TIME_ADD->CellCssClass = "";
		$t_ghichu_lich->C_TIME_ADD->CellAttrs = array(); $t_ghichu_lich->C_TIME_ADD->ViewAttrs = array(); $t_ghichu_lich->C_TIME_ADD->EditAttrs = array();
		if ($t_ghichu_lich->RowType == EW_ROWTYPE_VIEW) { // View row

			// SB_NOTE_ID
			$t_ghichu_lich->SB_NOTE_ID->ViewValue = $t_ghichu_lich->SB_NOTE_ID->CurrentValue;
			$t_ghichu_lich->SB_NOTE_ID->CssStyle = "";
			$t_ghichu_lich->SB_NOTE_ID->CssClass = "";
			$t_ghichu_lich->SB_NOTE_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_ghichu_lich->FK_CONG_TY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_ghichu_lich->FK_CONG_TY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_ghichu_lich->FK_CONG_TY->ViewValue = $t_ghichu_lich->FK_CONG_TY->CurrentValue;
				}
			} else {
				$t_ghichu_lich->FK_CONG_TY->ViewValue = NULL;
			}
			$t_ghichu_lich->FK_CONG_TY->CssStyle = "";
			$t_ghichu_lich->FK_CONG_TY->CssClass = "";
			$t_ghichu_lich->FK_CONG_TY->ViewCustomAttributes = "";

			// C_YEAR
			if (strval($t_ghichu_lich->C_YEAR->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_YEAR->CurrentValue) {
					case "0":
						$t_ghichu_lich->C_YEAR->ViewValue = "2013";
						break;
					case "1":
						$t_ghichu_lich->C_YEAR->ViewValue = "2014";
						break;
					default:
						$t_ghichu_lich->C_YEAR->ViewValue = $t_ghichu_lich->C_YEAR->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_YEAR->ViewValue = NULL;
			}
			$t_ghichu_lich->C_YEAR->CssStyle = "";
			$t_ghichu_lich->C_YEAR->CssClass = "";
			$t_ghichu_lich->C_YEAR->ViewCustomAttributes = "";

			// C_WEEK
			if (strval($t_ghichu_lich->C_WEEK->CurrentValue) <> "") {
				switch ($t_ghichu_lich->C_WEEK->CurrentValue) {
					case "1":
						$t_ghichu_lich->C_WEEK->ViewValue = "Tuan 1";
						break;
					default:
						$t_ghichu_lich->C_WEEK->ViewValue = $t_ghichu_lich->C_WEEK->CurrentValue;
				}
			} else {
				$t_ghichu_lich->C_WEEK->ViewValue = NULL;
			}
			$t_ghichu_lich->C_WEEK->CssStyle = "";
			$t_ghichu_lich->C_WEEK->CssClass = "";
			$t_ghichu_lich->C_WEEK->ViewCustomAttributes = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->ViewValue = $t_ghichu_lich->C_CONTENT->CurrentValue;
			$t_ghichu_lich->C_CONTENT->CssStyle = "";
			$t_ghichu_lich->C_CONTENT->CssClass = "";
			$t_ghichu_lich->C_CONTENT->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_ghichu_lich->C_USER_ADD->ViewValue = $t_ghichu_lich->C_USER_ADD->CurrentValue;
			$t_ghichu_lich->C_USER_ADD->CssStyle = "";
			$t_ghichu_lich->C_USER_ADD->CssClass = "";
			$t_ghichu_lich->C_USER_ADD->ViewCustomAttributes = "";

			// C_TIME_ADD
			$t_ghichu_lich->C_TIME_ADD->ViewValue = $t_ghichu_lich->C_TIME_ADD->CurrentValue;
			$t_ghichu_lich->C_TIME_ADD->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_ADD->ViewValue, 7);
			$t_ghichu_lich->C_TIME_ADD->CssStyle = "";
			$t_ghichu_lich->C_TIME_ADD->CssClass = "";
			$t_ghichu_lich->C_TIME_ADD->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_ghichu_lich->C_USER_EDIT->ViewValue = $t_ghichu_lich->C_USER_EDIT->CurrentValue;
			$t_ghichu_lich->C_USER_EDIT->CssStyle = "";
			$t_ghichu_lich->C_USER_EDIT->CssClass = "";
			$t_ghichu_lich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_TIME_EDIT
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = $t_ghichu_lich->C_TIME_EDIT->CurrentValue;
			$t_ghichu_lich->C_TIME_EDIT->ViewValue = ew_FormatDateTime($t_ghichu_lich->C_TIME_EDIT->ViewValue, 7);
			$t_ghichu_lich->C_TIME_EDIT->CssStyle = "";
			$t_ghichu_lich->C_TIME_EDIT->CssClass = "";
			$t_ghichu_lich->C_TIME_EDIT->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_ghichu_lich->FK_CONG_TY->HrefValue = "";
			$t_ghichu_lich->FK_CONG_TY->TooltipValue = "";

			// C_YEAR
			$t_ghichu_lich->C_YEAR->HrefValue = "";
			$t_ghichu_lich->C_YEAR->TooltipValue = "";

			// C_WEEK
			$t_ghichu_lich->C_WEEK->HrefValue = "";
			$t_ghichu_lich->C_WEEK->TooltipValue = "";

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->HrefValue = "";
			$t_ghichu_lich->C_CONTENT->TooltipValue = "";

			// C_USER_ADD
			$t_ghichu_lich->C_USER_ADD->HrefValue = "";
			$t_ghichu_lich->C_USER_ADD->TooltipValue = "";

			// C_TIME_ADD
			$t_ghichu_lich->C_TIME_ADD->HrefValue = "";
			$t_ghichu_lich->C_TIME_ADD->TooltipValue = "";
		} elseif ($t_ghichu_lich->RowType == EW_ROWTYPE_ADD) { // Add row

			// FK_CONGTY
			$t_ghichu_lich->FK_CONG_TY->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty`";
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
			$t_ghichu_lich->FK_CONG_TY->EditValue = $arwrk;

			// C_YEAR
			$t_ghichu_lich->C_YEAR->EditCustomAttributes = "";
			$arwrk = array();
                        $str=substr(ew_CurrentDate(), 0, 4) ;
                        $num = (int)$str;
                        for ($i=$num;$i>($num-10);$i--)
                        {
                            $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_YEAR->EditValue = $arwrk;

			// C_WEEK
			$t_ghichu_lich->C_WEEK->EditCustomAttributes = "";
                        $arwrk = array();
                        $week= date("W", mktime(0,0,0,12,28,2013));
                        $number_week = (int)$week;
                        for ($j=$number_week;$j>0;$j--)    
                        {
                                $arwrk[] = array($j, $j);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_ghichu_lich->C_WEEK->EditValue = $arwrk;

			// C_CONTENT
			$t_ghichu_lich->C_CONTENT->EditCustomAttributes = "";
			$t_ghichu_lich->C_CONTENT->EditValue = ew_HtmlEncode($t_ghichu_lich->C_CONTENT->CurrentValue);

			// C_USER_ADD
			// C_TIME_ADD

		}

		// Call Row Rendered event
		if ($t_ghichu_lich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_ghichu_lich->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_ghichu_lich;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
		
		if (!is_null($t_ghichu_lich->C_WEEK->FormValue) && $t_ghichu_lich->C_WEEK->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_ghichu_lich->C_WEEK->FldCaption();
		}
		if (!is_null($t_ghichu_lich->C_CONTENT->FormValue) && $t_ghichu_lich->C_CONTENT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_ghichu_lich->C_CONTENT->FldCaption();
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
		global $conn, $Language, $Security, $t_ghichu_lich;
		$rsnew = array();

		// FK_CONGTY
		$t_ghichu_lich->FK_CONG_TY->SetDbValueDef($rsnew, $t_ghichu_lich->FK_CONG_TY->CurrentValue, NULL, FALSE);

		// C_YEAR
		$t_ghichu_lich->C_YEAR->SetDbValueDef($rsnew, $t_ghichu_lich->C_YEAR->CurrentValue, NULL, FALSE);

		// C_WEEK
		$t_ghichu_lich->C_WEEK->SetDbValueDef($rsnew, $t_ghichu_lich->C_WEEK->CurrentValue, NULL, FALSE);

		// C_CONTENT
		$t_ghichu_lich->C_CONTENT->SetDbValueDef($rsnew, $t_ghichu_lich->C_CONTENT->CurrentValue, NULL, FALSE);

		// C_USER_ADD
		$t_ghichu_lich->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_ghichu_lich->C_USER_ADD->DbValue;

		// C_TIME_ADD
		$t_ghichu_lich->C_TIME_ADD->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_TIME_ADD'] =& $t_ghichu_lich->C_TIME_ADD->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_ghichu_lich->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_ghichu_lich->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_ghichu_lich->CancelMessage <> "") {
				$this->setMessage($t_ghichu_lich->CancelMessage);
				$t_ghichu_lich->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_ghichu_lich->SB_NOTE_ID->setDbValue($conn->Insert_ID());
			$rsnew['SB_NOTE_ID'] = $t_ghichu_lich->SB_NOTE_ID->DbValue;

			// Call Row Inserted event
			$t_ghichu_lich->Row_Inserted($rsnew);
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
