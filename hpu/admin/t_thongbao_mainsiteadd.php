<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_thongbao_mainsiteinfo.php" ?>
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
$t_thongbao_mainsite_add = new ct_thongbao_mainsite_add();
$Page =& $t_thongbao_mainsite_add;

// Page init
$t_thongbao_mainsite_add->Page_Init();

// Page main
$t_thongbao_mainsite_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_mainsite_add = new ew_Page("t_thongbao_mainsite_add");

// page properties
t_thongbao_mainsite_add.PageID = "add"; // page ID
t_thongbao_mainsite_add.FormID = "ft_thongbao_mainsiteadd"; // form ID
var EW_PAGE_ID = t_thongbao_mainsite_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_thongbao_mainsite_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_TITLE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_CONTENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_CONTENT->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_BEGIN_DATE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_BEGIN_DATE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_BEGIN_DATE"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_BEGIN_DATE->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_END_DATE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_END_DATE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_END_DATE"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_END_DATE->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_thongbao_mainsite_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_mainsite_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_mainsite_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_mainsite_add.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p class="pheader"><?php echo $t_thongbao_mainsite->TableCaption() ?></p>
<a href="<?php echo $t_thongbao_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_mainsite_add->ShowMessage();
?>
<form name="ft_thongbao_mainsiteadd" id="ft_thongbao_mainsiteadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_thongbao_mainsite_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_thongbao_mainsite">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_thongbao_mainsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainsite->FK_CONGTY_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<?php $t_thongbao_mainsite->FK_CONGTY_ID->EditAttrs["onchange"] = "ew_UpdateOpt('x_FK_DOITUONG_ID','x_FK_CONGTY_ID',true); " . @$t_thongbao_mainsite->FK_CONGTY_ID->EditAttrs["onchange"]; ?>
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_thongbao_mainsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if (isAdmin())
{
        if (is_array($t_thongbao_mainsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_mainsite->FK_CONGTY_ID->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
      if (is_array($t_thongbao_mainsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_mainsite->FK_CONGTY_ID->EditValue;
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
        <?php    }  
                }
        }
 }     
?>
</select>
</span><?php echo $t_thongbao_mainsite->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_thongbao_mainsite->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
	<tr<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainsite->C_BEGIN_DATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CellAttributes() ?>><span id="el_C_BEGIN_DATE">
<input type="text" name="x_C_BEGIN_DATE" id="x_C_BEGIN_DATE" title="<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->FldTitle() ?>" value="<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->EditValue ?>"<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_BEGIN_DATE" name="cal_x_C_BEGIN_DATE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_BEGIN_DATE", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_BEGIN_DATE" // button id
});
</script>
</span>
                    <span class="col2"><?php echo $t_thongbao_mainsite->C_END_DATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?> </span>                   
 <span id="el_C_END_DATE">
<input type="text" name="x_C_END_DATE" id="x_C_END_DATE" title="<?php echo $t_thongbao_mainsite->C_END_DATE->FldTitle() ?>" value="<?php echo $t_thongbao_mainsite->C_END_DATE->EditValue ?>"<?php echo $t_thongbao_mainsite->C_END_DATE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_END_DATE" name="cal_x_C_END_DATE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_END_DATE", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_END_DATE" // button id
});
</script>
</span>   
    
    <?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_thongbao_mainsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_thongbao_mainsite->C_TITLE->FldTitle() ?>" size="98" maxlength="255" value="<?php echo $t_thongbao_mainsite->C_TITLE->EditValue ?>"<?php echo $t_thongbao_mainsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_thongbao_mainsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_thongbao_mainsite->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainsite->C_CONTENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainsite->C_CONTENT->CellAttributes() ?>><span id="el_C_CONTENT">
<textarea name="x_C_CONTENT" id="x_C_CONTENT" title="<?php echo $t_thongbao_mainsite->C_CONTENT->FldTitle() ?>" cols="35" rows="4"<?php echo $t_thongbao_mainsite->C_CONTENT->EditAttributes() ?>><?php echo $t_thongbao_mainsite->C_CONTENT->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_thongbao_mainsite->C_CONTENT->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENT', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENT", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENT', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span><?php echo $t_thongbao_mainsite->C_CONTENT->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_thongbao_mainsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_thongbao_mainsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainsite->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainsite->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_thongbao_mainsite->C_ORDER->FldTitle() ?>" value="<?php echo $t_thongbao_mainsite->C_ORDER->EditValue ?>"<?php echo $t_thongbao_mainsite->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_thongbao_mainsite->C_ORDER->CustomMsg ?></td>
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
$t_thongbao_mainsite_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_mainsite_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_thongbao_mainsite';

	// Page object name
	var $PageObjName = 't_thongbao_mainsite_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_thongbao_mainsite;
		if ($t_thongbao_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_thongbao_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_thongbao_mainsite;
		if ($t_thongbao_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_thongbao_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_thongbao_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_thongbao_mainsite_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_mainsite)
		$GLOBALS["t_thongbao_mainsite"] = new ct_thongbao_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_thongbao_mainsite', TRUE);

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
		global $t_thongbao_mainsite;

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
			$this->Page_Terminate("t_thongbao_mainsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_thongbao_mainsite;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_THONGBAO"] != "") {
		  $t_thongbao_mainsite->PK_THONGBAO->setQueryStringValue($_GET["PK_THONGBAO"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_thongbao_mainsite->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_thongbao_mainsite->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_thongbao_mainsite->CurrentAction = "C"; // Copy record
		  } else {
		    $t_thongbao_mainsite->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_thongbao_mainsite->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_thongbao_mainsitelist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_thongbao_mainsite->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_thongbao_mainsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_thongbao_mainsiteview.php")
						$sReturnUrl = $t_thongbao_mainsite->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_thongbao_mainsite->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_thongbao_mainsite;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_thongbao_mainsite;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_thongbao_mainsite;
		$t_thongbao_mainsite->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_thongbao_mainsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_thongbao_mainsite->C_CONTENT->setFormValue($objForm->GetValue("x_C_CONTENT"));
		$t_thongbao_mainsite->C_PUBLISH->setFormValue($objForm->GetValue("x_C_PUBLISH"));
		$t_thongbao_mainsite->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_thongbao_mainsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_thongbao_mainsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7);
		$t_thongbao_mainsite->C_BEGIN_DATE->setFormValue($objForm->GetValue("x_C_BEGIN_DATE"));
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_END_DATE->setFormValue($objForm->GetValue("x_C_END_DATE"));
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_thongbao_mainsite->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_thongbao_mainsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ADD_TIME->CurrentValue, 7);
		$t_thongbao_mainsite->PK_THONGBAO->setFormValue($objForm->GetValue("x_PK_THONGBAO"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_thongbao_mainsite;
		$t_thongbao_mainsite->PK_THONGBAO->CurrentValue = $t_thongbao_mainsite->PK_THONGBAO->FormValue;
		$t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue = $t_thongbao_mainsite->FK_CONGTY_ID->FormValue;
		$t_thongbao_mainsite->C_TITLE->CurrentValue = $t_thongbao_mainsite->C_TITLE->FormValue;
		$t_thongbao_mainsite->C_CONTENT->CurrentValue = $t_thongbao_mainsite->C_CONTENT->FormValue;
		$t_thongbao_mainsite->C_PUBLISH->CurrentValue = $t_thongbao_mainsite->C_PUBLISH->FormValue;
		$t_thongbao_mainsite->C_ACTIVE->CurrentValue = $t_thongbao_mainsite->C_ACTIVE->FormValue;
		$t_thongbao_mainsite->C_ORDER->CurrentValue = $t_thongbao_mainsite->C_ORDER->FormValue;
		$t_thongbao_mainsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7);
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = $t_thongbao_mainsite->C_BEGIN_DATE->FormValue;
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = $t_thongbao_mainsite->C_END_DATE->FormValue;
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_USER_ADD->CurrentValue = $t_thongbao_mainsite->C_USER_ADD->FormValue;
		$t_thongbao_mainsite->C_ADD_TIME->CurrentValue = $t_thongbao_mainsite->C_ADD_TIME->FormValue;
		$t_thongbao_mainsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ADD_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_thongbao_mainsite;
		$sFilter = $t_thongbao_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_thongbao_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_thongbao_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_thongbao_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_thongbao_mainsite;
		$t_thongbao_mainsite->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$t_thongbao_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_thongbao_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_thongbao_mainsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_thongbao_mainsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_thongbao_mainsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_thongbao_mainsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_thongbao_mainsite->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$t_thongbao_mainsite->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$t_thongbao_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_thongbao_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_thongbao_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_thongbao_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_thongbao_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_thongbao_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_thongbao_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_thongbao_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_thongbao_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_thongbao_mainsite->FK_CONGTY_ID->EditAttrs = array();

		// C_TITLE
		$t_thongbao_mainsite->C_TITLE->CellCssStyle = ""; $t_thongbao_mainsite->C_TITLE->CellCssClass = "";
		$t_thongbao_mainsite->C_TITLE->CellAttrs = array(); $t_thongbao_mainsite->C_TITLE->ViewAttrs = array(); $t_thongbao_mainsite->C_TITLE->EditAttrs = array();

		// C_CONTENT
		$t_thongbao_mainsite->C_CONTENT->CellCssStyle = ""; $t_thongbao_mainsite->C_CONTENT->CellCssClass = "";
		$t_thongbao_mainsite->C_CONTENT->CellAttrs = array(); $t_thongbao_mainsite->C_CONTENT->ViewAttrs = array(); $t_thongbao_mainsite->C_CONTENT->EditAttrs = array();

		// C_PUBLISH
		$t_thongbao_mainsite->C_PUBLISH->CellCssStyle = ""; $t_thongbao_mainsite->C_PUBLISH->CellCssClass = "";
		$t_thongbao_mainsite->C_PUBLISH->CellAttrs = array(); $t_thongbao_mainsite->C_PUBLISH->ViewAttrs = array(); $t_thongbao_mainsite->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$t_thongbao_mainsite->C_ACTIVE->CellCssStyle = ""; $t_thongbao_mainsite->C_ACTIVE->CellCssClass = "";
		$t_thongbao_mainsite->C_ACTIVE->CellAttrs = array(); $t_thongbao_mainsite->C_ACTIVE->ViewAttrs = array(); $t_thongbao_mainsite->C_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_thongbao_mainsite->C_ORDER->CellCssStyle = ""; $t_thongbao_mainsite->C_ORDER->CellCssClass = "";
		$t_thongbao_mainsite->C_ORDER->CellAttrs = array(); $t_thongbao_mainsite->C_ORDER->ViewAttrs = array(); $t_thongbao_mainsite->C_ORDER->EditAttrs = array();

		// C_BEGIN_DATE
		$t_thongbao_mainsite->C_BEGIN_DATE->CellCssStyle = ""; $t_thongbao_mainsite->C_BEGIN_DATE->CellCssClass = "";
		$t_thongbao_mainsite->C_BEGIN_DATE->CellAttrs = array(); $t_thongbao_mainsite->C_BEGIN_DATE->ViewAttrs = array(); $t_thongbao_mainsite->C_BEGIN_DATE->EditAttrs = array();

		// C_END_DATE
		$t_thongbao_mainsite->C_END_DATE->CellCssStyle = ""; $t_thongbao_mainsite->C_END_DATE->CellCssClass = "";
		$t_thongbao_mainsite->C_END_DATE->CellAttrs = array(); $t_thongbao_mainsite->C_END_DATE->ViewAttrs = array(); $t_thongbao_mainsite->C_END_DATE->EditAttrs = array();

		// C_USER_ADD
		$t_thongbao_mainsite->C_USER_ADD->CellCssStyle = ""; $t_thongbao_mainsite->C_USER_ADD->CellCssClass = "";
		$t_thongbao_mainsite->C_USER_ADD->CellAttrs = array(); $t_thongbao_mainsite->C_USER_ADD->ViewAttrs = array(); $t_thongbao_mainsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_thongbao_mainsite->C_ADD_TIME->CellCssStyle = ""; $t_thongbao_mainsite->C_ADD_TIME->CellCssClass = "";
		$t_thongbao_mainsite->C_ADD_TIME->CellAttrs = array(); $t_thongbao_mainsite->C_ADD_TIME->ViewAttrs = array(); $t_thongbao_mainsite->C_ADD_TIME->EditAttrs = array();
		if ($t_thongbao_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_THONGBAO
			$t_thongbao_mainsite->PK_THONGBAO->ViewValue = $t_thongbao_mainsite->PK_THONGBAO->CurrentValue;
			$t_thongbao_mainsite->PK_THONGBAO->CssStyle = "";
			$t_thongbao_mainsite->PK_THONGBAO->CssClass = "";
			$t_thongbao_mainsite->PK_THONGBAO->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = $t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_thongbao_mainsite->FK_CONGTY_ID->CssStyle = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->CssClass = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->ViewValue = $t_thongbao_mainsite->C_TITLE->CurrentValue;
			$t_thongbao_mainsite->C_TITLE->CssStyle = "";
			$t_thongbao_mainsite->C_TITLE->CssClass = "";
			$t_thongbao_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_CONTENT
			$t_thongbao_mainsite->C_CONTENT->ViewValue = $t_thongbao_mainsite->C_CONTENT->CurrentValue;
			$t_thongbao_mainsite->C_CONTENT->CssStyle = "";
			$t_thongbao_mainsite->C_CONTENT->CssClass = "";
			$t_thongbao_mainsite->C_CONTENT->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_thongbao_mainsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_thongbao_mainsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Khong active len mainsite";
						break;
					case "1":
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Active len mainsite";
						break;
					default:
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = $t_thongbao_mainsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_thongbao_mainsite->C_PUBLISH->CssStyle = "";
			$t_thongbao_mainsite->C_PUBLISH->CssClass = "";
			$t_thongbao_mainsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_thongbao_mainsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_thongbao_mainsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = "Khong active len mainsite";
						break;
					case "1":
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = "Active len mainsite";
						break;
					default:
						$t_thongbao_mainsite->C_ACTIVE->ViewValue = $t_thongbao_mainsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_thongbao_mainsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_thongbao_mainsite->C_ACTIVE->CssStyle = "";
			$t_thongbao_mainsite->C_ACTIVE->CssClass = "";
			$t_thongbao_mainsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->ViewValue = $t_thongbao_mainsite->C_ORDER->CurrentValue;
			$t_thongbao_mainsite->C_ORDER->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_ORDER->ViewValue, 7);
			$t_thongbao_mainsite->C_ORDER->CssStyle = "";
			$t_thongbao_mainsite->C_ORDER->CssClass = "";
			$t_thongbao_mainsite->C_ORDER->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewValue = $t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->ViewValue, 7);
			$t_thongbao_mainsite->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->ViewValue = $t_thongbao_mainsite->C_END_DATE->CurrentValue;
			$t_thongbao_mainsite->C_END_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_END_DATE->ViewValue, 7);
			$t_thongbao_mainsite->C_END_DATE->CssStyle = "";
			$t_thongbao_mainsite->C_END_DATE->CssClass = "";
			$t_thongbao_mainsite->C_END_DATE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_thongbao_mainsite->C_USER_ADD->ViewValue = $t_thongbao_mainsite->C_USER_ADD->CurrentValue;
			$t_thongbao_mainsite->C_USER_ADD->CssStyle = "";
			$t_thongbao_mainsite->C_USER_ADD->CssClass = "";
			$t_thongbao_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_thongbao_mainsite->C_ADD_TIME->ViewValue = $t_thongbao_mainsite->C_ADD_TIME->CurrentValue;
			$t_thongbao_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_thongbao_mainsite->C_ADD_TIME->CssStyle = "";
			$t_thongbao_mainsite->C_ADD_TIME->CssClass = "";
			$t_thongbao_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_thongbao_mainsite->C_USER_EDIT->ViewValue = $t_thongbao_mainsite->C_USER_EDIT->CurrentValue;
			$t_thongbao_mainsite->C_USER_EDIT->CssStyle = "";
			$t_thongbao_mainsite->C_USER_EDIT->CssClass = "";
			$t_thongbao_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_thongbao_mainsite->C_EDIT_TIME->ViewValue = $t_thongbao_mainsite->C_EDIT_TIME->CurrentValue;
			$t_thongbao_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_thongbao_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_thongbao_mainsite->C_EDIT_TIME->CssClass = "";
			$t_thongbao_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->ViewValue = $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CurrentValue;
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_thongbao_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_thongbao_mainsite->FK_CONGTY_ID->TooltipValue = "";

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->HrefValue = "";
			$t_thongbao_mainsite->C_TITLE->TooltipValue = "";

			// C_CONTENT
			$t_thongbao_mainsite->C_CONTENT->HrefValue = "";
			$t_thongbao_mainsite->C_CONTENT->TooltipValue = "";

			// C_PUBLISH
			$t_thongbao_mainsite->C_PUBLISH->HrefValue = "";
			$t_thongbao_mainsite->C_PUBLISH->TooltipValue = "";

			// C_ACTIVE
			$t_thongbao_mainsite->C_ACTIVE->HrefValue = "";
			$t_thongbao_mainsite->C_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->HrefValue = "";
			$t_thongbao_mainsite->C_ORDER->TooltipValue = "";

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->HrefValue = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->TooltipValue = "";

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->HrefValue = "";
			$t_thongbao_mainsite->C_END_DATE->TooltipValue = "";

			// C_USER_ADD
			$t_thongbao_mainsite->C_USER_ADD->HrefValue = "";
			$t_thongbao_mainsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_thongbao_mainsite->C_ADD_TIME->HrefValue = "";
			$t_thongbao_mainsite->C_ADD_TIME->TooltipValue = "";
		} elseif ($t_thongbao_mainsite->RowType == EW_ROWTYPE_ADD) { // Add row

			// FK_CONGTY_ID
			$t_thongbao_mainsite->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_thongbao_mainsite->FK_CONGTY_ID->EditValue = $arwrk;

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_thongbao_mainsite->C_TITLE->CurrentValue);

			// C_CONTENT
			$t_thongbao_mainsite->C_CONTENT->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_CONTENT->EditValue = ew_HtmlEncode($t_thongbao_mainsite->C_CONTENT->CurrentValue);

			// C_PUBLISH
			$t_thongbao_mainsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_thongbao_mainsite->C_PUBLISH->EditValue = $arwrk;

			// C_ACTIVE
			$t_thongbao_mainsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			$t_thongbao_mainsite->C_ACTIVE->EditValue = $arwrk;

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7));

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_BEGIN_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7));

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_END_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7));

			// C_USER_ADD
			// C_ADD_TIME

		}

		// Call Row Rendered event
		if ($t_thongbao_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_thongbao_mainsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_thongbao_mainsite;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_thongbao_mainsite->FK_CONGTY_ID->FormValue) && $t_thongbao_mainsite->FK_CONGTY_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->FK_CONGTY_ID->FldCaption();
		}
		if (!is_null($t_thongbao_mainsite->C_TITLE->FormValue) && $t_thongbao_mainsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_TITLE->FldCaption();
		}
		if (!is_null($t_thongbao_mainsite->C_CONTENT->FormValue) && $t_thongbao_mainsite->C_CONTENT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_CONTENT->FldCaption();
		}
		
		if (!is_null($t_thongbao_mainsite->C_ORDER->FormValue) && $t_thongbao_mainsite->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_thongbao_mainsite->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_thongbao_mainsite->C_ORDER->FldErrMsg();
		}
		if (!is_null($t_thongbao_mainsite->C_BEGIN_DATE->FormValue) && $t_thongbao_mainsite->C_BEGIN_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_BEGIN_DATE->FldCaption();
		}
		if (!ew_CheckEuroDate($t_thongbao_mainsite->C_BEGIN_DATE->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_thongbao_mainsite->C_BEGIN_DATE->FldErrMsg();
		}
		if (!is_null($t_thongbao_mainsite->C_END_DATE->FormValue) && $t_thongbao_mainsite->C_END_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_END_DATE->FldCaption();
		}
		if (!ew_CheckEuroDate($t_thongbao_mainsite->C_END_DATE->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_thongbao_mainsite->C_END_DATE->FldErrMsg();
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
		global $conn, $Language, $Security, $t_thongbao_mainsite;
		$rsnew = array();

		// FK_CONGTY_ID
		$t_thongbao_mainsite->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_thongbao_mainsite->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

		// C_TITLE
		$t_thongbao_mainsite->C_TITLE->SetDbValueDef($rsnew, $t_thongbao_mainsite->C_TITLE->CurrentValue, NULL, FALSE);

		// C_CONTENT
		$t_thongbao_mainsite->C_CONTENT->SetDbValueDef($rsnew, $t_thongbao_mainsite->C_CONTENT->CurrentValue, NULL, FALSE);

		// C_PUBLISH
		$t_thongbao_mainsite->C_PUBLISH->SetDbValueDef($rsnew, 0, 0, FALSE);

		// C_ACTIVE
		$t_thongbao_mainsite->C_ACTIVE->SetDbValueDef($rsnew, 2, 2, FALSE);

		// C_ORDER
		$t_thongbao_mainsite->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7, FALSE), NULL);

		// C_BEGIN_DATE
		$t_thongbao_mainsite->C_BEGIN_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7, FALSE), NULL);

		// C_END_DATE
		$t_thongbao_mainsite->C_END_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7, FALSE), NULL);

		// C_USER_ADD
		$t_thongbao_mainsite->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_thongbao_mainsite->C_USER_ADD->DbValue;

		// C_ADD_TIME
		$t_thongbao_mainsite->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_ADD_TIME'] =& $t_thongbao_mainsite->C_ADD_TIME->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_thongbao_mainsite->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_thongbao_mainsite->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_thongbao_mainsite->CancelMessage <> "") {
				$this->setMessage($t_thongbao_mainsite->CancelMessage);
				$t_thongbao_mainsite->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_thongbao_mainsite->PK_THONGBAO->setDbValue($conn->Insert_ID());
			$rsnew['PK_THONGBAO'] = $t_thongbao_mainsite->PK_THONGBAO->DbValue;

			// Call Row Inserted event
			$t_thongbao_mainsite->Row_Inserted($rsnew);
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
