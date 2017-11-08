<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_levelsiteinfo.php" ?>
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
$t_doituong_levelsite_add = new ct_doituong_levelsite_add();
$Page =& $t_doituong_levelsite_add;

// Page init
$t_doituong_levelsite_add->Page_Init();

// Page main
$t_doituong_levelsite_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_levelsite_add = new ew_Page("t_doituong_levelsite_add");

// page properties
t_doituong_levelsite_add.PageID = "add"; // page ID
t_doituong_levelsite_add.FormID = "ft_doituong_levelsiteadd"; // form ID
var EW_PAGE_ID = t_doituong_levelsite_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_doituong_levelsite_add.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_levelsite->C_TYPE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_NAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_levelsite->C_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_levelsite->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckNumber(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_doituong_levelsite->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_STATUS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_doituong_levelsite->C_STATUS->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_doituong_levelsite_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_levelsite_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_levelsite_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_levelsite_add.ValidateRequired = false; // no JavaScript validation
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
            if (value ==1) 
            {
                $("#x_C_ICON").show();
                $("#x_C_LOCATION").show();
            }
            else
            {
                $("#x_C_ICON").hide();
                $("#x_C_LOCATION").hide();
            }    
        });
});
</script>   


<p class="pheader" ><span class="phpmaker"><?php echo $t_doituong_levelsite->TableCaption() ?></span></p>
<a href="<?php echo $t_doituong_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_levelsite_add->ShowMessage();
?>
<form name="ft_doituong_levelsiteadd" id="ft_doituong_levelsiteadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_doituong_levelsite_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_doituong_levelsite">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_doituong_levelsite->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_doituong_levelsite->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->FK_CONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->FK_CONGTY->CellAttributes() ?>><span id="el_FK_CONGTY">
<select id="x_FK_CONGTY" name="x_FK_CONGTY" title="<?php echo $t_doituong_levelsite->FK_CONGTY->FldTitle() ?>"<?php echo $t_doituong_levelsite->FK_CONGTY->EditAttributes() ?>>
<?php
if (isAdmin())
{
        if (is_array($t_doituong_levelsite->FK_CONGTY->EditValue)) {
                $arwrk = $t_doituong_levelsite->FK_CONGTY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_doituong_levelsite->FK_CONGTY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                        if ($selwrk <> "") $emptywrk = FALSE;
        ?>
        <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
        <?php echo $arwrk[$rowcntwrk][1] ?>
        </option>
        <?php
                }
        }
} else 
{
      if (is_array($t_doituong_levelsite->FK_CONGTY->EditValue)) {
	$arwrk = $t_doituong_levelsite->FK_CONGTY->EditValue;
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
        <?php       }
                }
        }
}    
?>
</select>
</span><?php echo $t_doituong_levelsite->FK_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_doituong_levelsite->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_TYPE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_TYPE->CellAttributes() ?>><span id="el_C_TYPE">
<div id="tp_x_C_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_levelsite->C_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_doituong_levelsite->C_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_doituong_levelsite->C_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_levelsite->C_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_TYPE" id="x_C_TYPE" title="<?php echo $t_doituong_levelsite->C_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_levelsite->C_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_levelsite->C_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_doituong_levelsite->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_NAME->CellAttributes() ?>><span id="el_C_NAME">
               <input type="text" size="100" name="x_C_NAME" id="x_C_NAME" title="<?php echo $t_doituong_levelsite->C_NAME->FldTitle() ?>" value="<?php echo $t_doituong_levelsite->C_NAME->EditValue ?>"<?php echo $t_doituong_levelsite->C_NAME->EditAttributes() ?>>
</span><?php echo $t_doituong_levelsite->C_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_ICON->Visible) { // C_ICON ?>
	<tr<?php echo $t_doituong_levelsite->C_ICON->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_ICON->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_ICON->CellAttributes() ?>><span id="el_C_ICON">
<input type="file" name="x_C_ICON" id="x_C_ICON" title="<?php echo $t_doituong_levelsite->C_ICON->FldTitle() ?>" size="30"<?php echo $t_doituong_levelsite->C_ICON->EditAttributes() ?>>  <i>(icon tối đa:80px*80px)</i>  
</div>
</span><?php echo $t_doituong_levelsite->C_ICON->CustomMsg ?></td>
    
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_LOCATION->Visible) { // C_LOCATION ?>
	<tr<?php echo $t_doituong_levelsite->C_LOCATION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_LOCATION->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_LOCATION->CellAttributes() ?>><span id="el_C_LOCATION">
<input type="text" name="x_C_LOCATION" id="x_C_LOCATION" title="<?php echo $t_doituong_levelsite->C_LOCATION->FldTitle() ?>" size="100" maxlength="200" value="<?php echo $t_doituong_levelsite->C_LOCATION->EditValue ?>"<?php echo $t_doituong_levelsite->C_LOCATION->EditAttributes() ?>>
</span><?php echo $t_doituong_levelsite->C_LOCATION->CustomMsg ?>
                    <i>(Định dạng url: http://abc.com)</i>        
                </td>
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_doituong_levelsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_doituong_levelsite->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_doituong_levelsite->C_ORDER->EditValue ?>"<?php echo $t_doituong_levelsite->C_ORDER->EditAttributes() ?>>
</span><?php echo $t_doituong_levelsite->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_levelsite->C_STATUS->Visible) { // C_STATUS ?>
	<tr<?php echo $t_doituong_levelsite->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_levelsite->C_STATUS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_doituong_levelsite->C_STATUS->CellAttributes() ?>><span id="el_C_STATUS">
<div id="tp_x_C_STATUS" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS" id="x_C_STATUS" title="<?php echo $t_doituong_levelsite->C_STATUS->FldTitle() ?>" value="{value}"<?php echo $t_doituong_levelsite->C_STATUS->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS" repeatcolumn="5">
<?php
$arwrk = $t_doituong_levelsite->C_STATUS->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_doituong_levelsite->C_STATUS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS" id="x_C_STATUS" title="<?php echo $t_doituong_levelsite->C_STATUS->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_doituong_levelsite->C_STATUS->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_doituong_levelsite->C_STATUS->CustomMsg ?></td>
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
$t_doituong_levelsite_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_levelsite_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_doituong_levelsite';

	// Page object name
	var $PageObjName = 't_doituong_levelsite_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_levelsite;
		if ($t_doituong_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_levelsite;
		if ($t_doituong_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_levelsite_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_levelsite)
		$GLOBALS["t_doituong_levelsite"] = new ct_doituong_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_levelsite', TRUE);

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
		global $t_doituong_levelsite;

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
			$this->Page_Terminate("t_doituong_levelsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_doituong_levelsite;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_DOITUONG"] != "") {
		  $t_doituong_levelsite->PK_DOITUONG->setQueryStringValue($_GET["PK_DOITUONG"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_doituong_levelsite->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_doituong_levelsite->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_doituong_levelsite->CurrentAction = "C"; // Copy record
		  } else {
		    $t_doituong_levelsite->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_doituong_levelsite->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_doituong_levelsitelist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_doituong_levelsite->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_doituong_levelsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_doituong_levelsiteview.php")
						$sReturnUrl = $t_doituong_levelsite->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_doituong_levelsite->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_doituong_levelsite;

		// Get upload data
			if ($t_doituong_levelsite->C_ICON->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_doituong_levelsite->C_ICON->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_doituong_levelsite;
		$t_doituong_levelsite->C_STATUS->CurrentValue = 0;
                $t_doituong_levelsite->C_TYPE->CurrentValue = 1;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_doituong_levelsite;
		$t_doituong_levelsite->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_doituong_levelsite->C_TYPE->setFormValue($objForm->GetValue("x_C_TYPE"));
		$t_doituong_levelsite->C_NAME->setFormValue($objForm->GetValue("x_C_NAME"));
		$t_doituong_levelsite->C_LOCATION->setFormValue($objForm->GetValue("x_C_LOCATION"));
		$t_doituong_levelsite->C_BELOGTO->setFormValue($objForm->GetValue("x_C_BELOGTO"));
		$t_doituong_levelsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_doituong_levelsite->C_STATUS->setFormValue($objForm->GetValue("x_C_STATUS"));
		$t_doituong_levelsite->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_doituong_levelsite->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_doituong_levelsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_doituong_levelsite->C_ADD_TIME->CurrentValue, 7);
		$t_doituong_levelsite->PK_DOITUONG->setFormValue($objForm->GetValue("x_PK_DOITUONG"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_doituong_levelsite;
		$t_doituong_levelsite->PK_DOITUONG->CurrentValue = $t_doituong_levelsite->PK_DOITUONG->FormValue;
		$t_doituong_levelsite->FK_CONGTY->CurrentValue = $t_doituong_levelsite->FK_CONGTY->FormValue;
		$t_doituong_levelsite->C_TYPE->CurrentValue = $t_doituong_levelsite->C_TYPE->FormValue;
		$t_doituong_levelsite->C_NAME->CurrentValue = $t_doituong_levelsite->C_NAME->FormValue;
		$t_doituong_levelsite->C_LOCATION->CurrentValue = $t_doituong_levelsite->C_LOCATION->FormValue;
		$t_doituong_levelsite->C_BELOGTO->CurrentValue = $t_doituong_levelsite->C_BELOGTO->FormValue;
		$t_doituong_levelsite->C_ORDER->CurrentValue = $t_doituong_levelsite->C_ORDER->FormValue;
		$t_doituong_levelsite->C_STATUS->CurrentValue = $t_doituong_levelsite->C_STATUS->FormValue;
		$t_doituong_levelsite->C_USER_ADD->CurrentValue = $t_doituong_levelsite->C_USER_ADD->FormValue;
		$t_doituong_levelsite->C_ADD_TIME->CurrentValue = $t_doituong_levelsite->C_ADD_TIME->FormValue;
		$t_doituong_levelsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_doituong_levelsite->C_ADD_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_levelsite;
		$sFilter = $t_doituong_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_doituong_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_doituong_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_levelsite;
		$t_doituong_levelsite->PK_DOITUONG->setDbValue($rs->fields('PK_DOITUONG'));
		$t_doituong_levelsite->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_doituong_levelsite->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_levelsite->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_levelsite->C_ICON->Upload->DbValue = $rs->fields('C_ICON');
		$t_doituong_levelsite->C_LOCATION->setDbValue($rs->fields('C_LOCATION'));
		$t_doituong_levelsite->C_BELOGTO->setDbValue($rs->fields('C_BELOGTO'));
		$t_doituong_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_doituong_levelsite->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_doituong_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_doituong_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_levelsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_doituong_levelsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_doituong_levelsite->FK_CONGTY->CellCssStyle = ""; $t_doituong_levelsite->FK_CONGTY->CellCssClass = "";
		$t_doituong_levelsite->FK_CONGTY->CellAttrs = array(); $t_doituong_levelsite->FK_CONGTY->ViewAttrs = array(); $t_doituong_levelsite->FK_CONGTY->EditAttrs = array();

		// C_TYPE
		$t_doituong_levelsite->C_TYPE->CellCssStyle = ""; $t_doituong_levelsite->C_TYPE->CellCssClass = "";
		$t_doituong_levelsite->C_TYPE->CellAttrs = array(); $t_doituong_levelsite->C_TYPE->ViewAttrs = array(); $t_doituong_levelsite->C_TYPE->EditAttrs = array();

		// C_NAME
		$t_doituong_levelsite->C_NAME->CellCssStyle = ""; $t_doituong_levelsite->C_NAME->CellCssClass = "";
		$t_doituong_levelsite->C_NAME->CellAttrs = array(); $t_doituong_levelsite->C_NAME->ViewAttrs = array(); $t_doituong_levelsite->C_NAME->EditAttrs = array();

		// C_ICON
		$t_doituong_levelsite->C_ICON->CellCssStyle = ""; $t_doituong_levelsite->C_ICON->CellCssClass = "";
		$t_doituong_levelsite->C_ICON->CellAttrs = array(); $t_doituong_levelsite->C_ICON->ViewAttrs = array(); $t_doituong_levelsite->C_ICON->EditAttrs = array();

		// C_LOCATION
		$t_doituong_levelsite->C_LOCATION->CellCssStyle = ""; $t_doituong_levelsite->C_LOCATION->CellCssClass = "";
		$t_doituong_levelsite->C_LOCATION->CellAttrs = array(); $t_doituong_levelsite->C_LOCATION->ViewAttrs = array(); $t_doituong_levelsite->C_LOCATION->EditAttrs = array();

		// C_BELOGTO
		$t_doituong_levelsite->C_BELOGTO->CellCssStyle = ""; $t_doituong_levelsite->C_BELOGTO->CellCssClass = "";
		$t_doituong_levelsite->C_BELOGTO->CellAttrs = array(); $t_doituong_levelsite->C_BELOGTO->ViewAttrs = array(); $t_doituong_levelsite->C_BELOGTO->EditAttrs = array();

		// C_ORDER
		$t_doituong_levelsite->C_ORDER->CellCssStyle = ""; $t_doituong_levelsite->C_ORDER->CellCssClass = "";
		$t_doituong_levelsite->C_ORDER->CellAttrs = array(); $t_doituong_levelsite->C_ORDER->ViewAttrs = array(); $t_doituong_levelsite->C_ORDER->EditAttrs = array();

		// C_STATUS
		$t_doituong_levelsite->C_STATUS->CellCssStyle = ""; $t_doituong_levelsite->C_STATUS->CellCssClass = "";
		$t_doituong_levelsite->C_STATUS->CellAttrs = array(); $t_doituong_levelsite->C_STATUS->ViewAttrs = array(); $t_doituong_levelsite->C_STATUS->EditAttrs = array();

		// C_USER_ADD
		$t_doituong_levelsite->C_USER_ADD->CellCssStyle = ""; $t_doituong_levelsite->C_USER_ADD->CellCssClass = "";
		$t_doituong_levelsite->C_USER_ADD->CellAttrs = array(); $t_doituong_levelsite->C_USER_ADD->ViewAttrs = array(); $t_doituong_levelsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_doituong_levelsite->C_ADD_TIME->CellCssStyle = ""; $t_doituong_levelsite->C_ADD_TIME->CellCssClass = "";
		$t_doituong_levelsite->C_ADD_TIME->CellAttrs = array(); $t_doituong_levelsite->C_ADD_TIME->ViewAttrs = array(); $t_doituong_levelsite->C_ADD_TIME->EditAttrs = array();
		if ($t_doituong_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_CONGTY
			if (strval($t_doituong_levelsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_doituong_levelsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_doituong_levelsite->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_doituong_levelsite->FK_CONGTY->ViewValue = $t_doituong_levelsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_doituong_levelsite->FK_CONGTY->ViewValue = NULL;
			}
			$t_doituong_levelsite->FK_CONGTY->CssStyle = "";
			$t_doituong_levelsite->FK_CONGTY->CssClass = "";
			$t_doituong_levelsite->FK_CONGTY->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_levelsite->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_levelsite->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_levelsite->C_TYPE->ViewValue = "Doi tuong chuyen muc bai viet";
						break;
					case "1":
						$t_doituong_levelsite->C_TYPE->ViewValue = "Doi lien ket he thong";
						break;
					default:
						$t_doituong_levelsite->C_TYPE->ViewValue = $t_doituong_levelsite->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_levelsite->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_levelsite->C_TYPE->CssStyle = "";
			$t_doituong_levelsite->C_TYPE->CssClass = "";
			$t_doituong_levelsite->C_TYPE->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_levelsite->C_NAME->ViewValue = $t_doituong_levelsite->C_NAME->CurrentValue;
			$t_doituong_levelsite->C_NAME->CssStyle = "";
			$t_doituong_levelsite->C_NAME->CssClass = "";
			$t_doituong_levelsite->C_NAME->ViewCustomAttributes = "";

			// C_ICON
			if (!ew_Empty($t_doituong_levelsite->C_ICON->Upload->DbValue)) {
				$t_doituong_levelsite->C_ICON->ViewValue = $t_doituong_levelsite->C_ICON->FldCaption();
				$t_doituong_levelsite->C_ICON->ImageAlt = $t_doituong_levelsite->C_ICON->FldAlt();
			} else {
				$t_doituong_levelsite->C_ICON->ViewValue = "";
			}
			$t_doituong_levelsite->C_ICON->CssStyle = "";
			$t_doituong_levelsite->C_ICON->CssClass = "";
			$t_doituong_levelsite->C_ICON->ViewCustomAttributes = "";

			// C_LOCATION
			$t_doituong_levelsite->C_LOCATION->ViewValue = $t_doituong_levelsite->C_LOCATION->CurrentValue;
			$t_doituong_levelsite->C_LOCATION->CssStyle = "";
			$t_doituong_levelsite->C_LOCATION->CssClass = "";
			$t_doituong_levelsite->C_LOCATION->ViewCustomAttributes = "";

			// C_BELOGTO
			$t_doituong_levelsite->C_BELOGTO->ViewValue = $t_doituong_levelsite->C_BELOGTO->CurrentValue;
			$t_doituong_levelsite->C_BELOGTO->CssStyle = "";
			$t_doituong_levelsite->C_BELOGTO->CssClass = "";
			$t_doituong_levelsite->C_BELOGTO->ViewCustomAttributes = "";

			// C_ORDER
			$t_doituong_levelsite->C_ORDER->ViewValue = $t_doituong_levelsite->C_ORDER->CurrentValue;
			$t_doituong_levelsite->C_ORDER->CssStyle = "";
			$t_doituong_levelsite->C_ORDER->CssClass = "";
			$t_doituong_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_doituong_levelsite->C_STATUS->CurrentValue) <> "") {
				switch ($t_doituong_levelsite->C_STATUS->CurrentValue) {
					case "0":
						$t_doituong_levelsite->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_doituong_levelsite->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_doituong_levelsite->C_STATUS->ViewValue = $t_doituong_levelsite->C_STATUS->CurrentValue;
				}
			} else {
				$t_doituong_levelsite->C_STATUS->ViewValue = NULL;
			}
			$t_doituong_levelsite->C_STATUS->CssStyle = "";
			$t_doituong_levelsite->C_STATUS->CssClass = "";
			$t_doituong_levelsite->C_STATUS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_levelsite->C_USER_ADD->ViewValue = $t_doituong_levelsite->C_USER_ADD->CurrentValue;
			$t_doituong_levelsite->C_USER_ADD->CssStyle = "";
			$t_doituong_levelsite->C_USER_ADD->CssClass = "";
			$t_doituong_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_doituong_levelsite->C_ADD_TIME->ViewValue = $t_doituong_levelsite->C_ADD_TIME->CurrentValue;
			$t_doituong_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_doituong_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_doituong_levelsite->C_ADD_TIME->CssStyle = "";
			$t_doituong_levelsite->C_ADD_TIME->CssClass = "";
			$t_doituong_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_levelsite->C_USER_EDIT->CssStyle = "";
			$t_doituong_levelsite->C_USER_EDIT->CssClass = "";
			$t_doituong_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_doituong_levelsite->C_EDIT_TIME->ViewValue = $t_doituong_levelsite->C_EDIT_TIME->CurrentValue;
			$t_doituong_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_doituong_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_doituong_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_doituong_levelsite->C_EDIT_TIME->CssClass = "";
			$t_doituong_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_doituong_levelsite->FK_CONGTY->HrefValue = "";
			$t_doituong_levelsite->FK_CONGTY->TooltipValue = "";

			// C_TYPE
			$t_doituong_levelsite->C_TYPE->HrefValue = "";
			$t_doituong_levelsite->C_TYPE->TooltipValue = "";

			// C_NAME
			$t_doituong_levelsite->C_NAME->HrefValue = "";
			$t_doituong_levelsite->C_NAME->TooltipValue = "";

			// C_ICON
			if (!empty($t_doituong_levelsite->C_ICON->Upload->DbValue)) {
				$t_doituong_levelsite->C_ICON->HrefValue = "t_doituong_levelsite_C_ICON_bv.php?PK_DOITUONG=" . $t_doituong_levelsite->PK_DOITUONG->CurrentValue;
				if ($t_doituong_levelsite->Export <> "") $t_doituong_levelsite->C_ICON->HrefValue = ew_ConvertFullUrl($t_doituong_levelsite->C_ICON->HrefValue);
			} else {
				$t_doituong_levelsite->C_ICON->HrefValue = "";
			}
			$t_doituong_levelsite->C_ICON->TooltipValue = "";

			// C_LOCATION
			$t_doituong_levelsite->C_LOCATION->HrefValue = "";
			$t_doituong_levelsite->C_LOCATION->TooltipValue = "";

			// C_BELOGTO
			$t_doituong_levelsite->C_BELOGTO->HrefValue = "";
			$t_doituong_levelsite->C_BELOGTO->TooltipValue = "";

			// C_ORDER
			$t_doituong_levelsite->C_ORDER->HrefValue = "";
			$t_doituong_levelsite->C_ORDER->TooltipValue = "";

			// C_STATUS
			$t_doituong_levelsite->C_STATUS->HrefValue = "";
			$t_doituong_levelsite->C_STATUS->TooltipValue = "";

			// C_USER_ADD
			$t_doituong_levelsite->C_USER_ADD->HrefValue = "";
			$t_doituong_levelsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_doituong_levelsite->C_ADD_TIME->HrefValue = "";
			$t_doituong_levelsite->C_ADD_TIME->TooltipValue = "";
		} elseif ($t_doituong_levelsite->RowType == EW_ROWTYPE_ADD) { // Add row

			// FK_CONGTY
			$t_doituong_levelsite->FK_CONGTY->EditCustomAttributes = "";
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
			$t_doituong_levelsite->FK_CONGTY->EditValue = $arwrk;

			// C_TYPE
			$t_doituong_levelsite->C_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đối tượng chuyên mục bài viết");
			$arwrk[] = array("1", "Đối tượng liên kết hệ thống");
                        $arwrk[] = array("2", "Đối tượng thông báo");
			$t_doituong_levelsite->C_TYPE->EditValue = $arwrk;

			// C_NAME
			$t_doituong_levelsite->C_NAME->EditCustomAttributes = "";
			$t_doituong_levelsite->C_NAME->EditValue = ew_HtmlEncode($t_doituong_levelsite->C_NAME->CurrentValue);

			// C_ICON
			$t_doituong_levelsite->C_ICON->EditCustomAttributes = "";
			if (!ew_Empty($t_doituong_levelsite->C_ICON->Upload->DbValue)) {
				$t_doituong_levelsite->C_ICON->EditValue = $t_doituong_levelsite->C_ICON->FldCaption();
				$t_doituong_levelsite->C_ICON->ImageAlt = $t_doituong_levelsite->C_ICON->FldAlt();
			} else {
				$t_doituong_levelsite->C_ICON->EditValue = "";
			}

			// C_LOCATION
			$t_doituong_levelsite->C_LOCATION->EditCustomAttributes = "";
			$t_doituong_levelsite->C_LOCATION->EditValue = ew_HtmlEncode($t_doituong_levelsite->C_LOCATION->CurrentValue);

			// C_BELOGTO
			$t_doituong_levelsite->C_BELOGTO->EditCustomAttributes = "";
			$t_doituong_levelsite->C_BELOGTO->EditValue = ew_HtmlEncode($t_doituong_levelsite->C_BELOGTO->CurrentValue);

			// C_ORDER
			$t_doituong_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_doituong_levelsite->C_ORDER->EditValue = ew_HtmlEncode($t_doituong_levelsite->C_ORDER->CurrentValue);

			// C_STATUS
			$t_doituong_levelsite->C_STATUS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_doituong_levelsite->C_STATUS->EditValue = $arwrk;

			// C_USER_ADD
			// C_ADD_TIME

		}

		// Call Row Rendered event
		if ($t_doituong_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_levelsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_doituong_levelsite;

		// Initialize form error message
		$gsFormError = "";
		if (!ew_CheckFileType($t_doituong_levelsite->C_ICON->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("WrongFileType");
		}
		if ($t_doituong_levelsite->C_ICON->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $t_doituong_levelsite->C_ICON->Upload->FileSize > EW_MAX_FILE_SIZE) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
		}
		if (in_array($t_doituong_levelsite->C_ICON->Upload->Error, array(1, 2, 3, 6, 7, 8))) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("PhpUploadErr" . $t_doituong_levelsite->C_ICON->Upload->Error);
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_doituong_levelsite->FK_CONGTY->FormValue) && $t_doituong_levelsite->FK_CONGTY->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->FK_CONGTY->FldCaption();
		}
		if ($t_doituong_levelsite->C_TYPE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_TYPE->FldCaption();
		}
                
                if ($t_doituong_levelsite->C_TYPE->FormValue == "1") {
                    
                          if (is_null($t_doituong_levelsite->C_ICON->Upload->Value)) {
                                $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                                $gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_ICON->FldCaption();
                        }
                        if (!is_null($t_doituong_levelsite->C_LOCATION->FormValue) && $t_doituong_levelsite->C_LOCATION->FormValue == "") {
                                $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                                $gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_LOCATION->FldCaption();
                        }
                        if (!filter_var ($t_doituong_levelsite->C_LOCATION->FormValue,FILTER_VALIDATE_URL))
                        {
                         $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                         $gsFormError .= "Không đúng định dạng" ;
                        }
                       
                }
		if (!is_null($t_doituong_levelsite->C_NAME->FormValue) && $t_doituong_levelsite->C_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_NAME->FldCaption();
		}
		

		if (!is_null($t_doituong_levelsite->C_ORDER->FormValue) && $t_doituong_levelsite->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_ORDER->FldCaption();
		}
		if (!ew_CheckNumber($t_doituong_levelsite->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_doituong_levelsite->C_ORDER->FldErrMsg();
		}
		if ($t_doituong_levelsite->C_STATUS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_doituong_levelsite->C_STATUS->FldCaption();
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
		global $conn, $Language, $Security, $t_doituong_levelsite;
		$rsnew = array();

		// FK_CONGTY
		$t_doituong_levelsite->FK_CONGTY->SetDbValueDef($rsnew, $t_doituong_levelsite->FK_CONGTY->CurrentValue, NULL, FALSE);

		// C_TYPE
		$t_doituong_levelsite->C_TYPE->SetDbValueDef($rsnew, $t_doituong_levelsite->C_TYPE->CurrentValue, NULL, FALSE);

		// C_NAME
		$t_doituong_levelsite->C_NAME->SetDbValueDef($rsnew, $t_doituong_levelsite->C_NAME->CurrentValue, NULL, FALSE);

		// C_ICON
		$t_doituong_levelsite->C_ICON->Upload->SaveToSession(); // Save file value to Session
		if (is_null($t_doituong_levelsite->C_ICON->Upload->Value)) {
			$rsnew['C_ICON'] = NULL;	
		} else {
			$rsnew['C_ICON'] = $t_doituong_levelsite->C_ICON->Upload->Value;
		}

		// C_LOCATION
		$t_doituong_levelsite->C_LOCATION->SetDbValueDef($rsnew, $t_doituong_levelsite->C_LOCATION->CurrentValue, NULL, FALSE);

		// C_BELOGTO
		//$t_doituong_levelsite->C_BELOGTO->SetDbValueDef($rsnew, $t_doituong_levelsite->C_BELOGTO->CurrentValue, 0, FALSE);
                // * BY QUANG HUNG
                if (($_SESSION['C_BELONGTO_ID'] == null))
                    {
                    $t_doituong_levelsite->C_BELOGTO->SetDbValueDef($rsnew, $t_doituong_levelsite->C_BELOGTO->CurrentValue, 0, 0);
                    }
                    ELSE
                    {
                    $t_doituong_levelsite->C_BELOGTO->SetDbValueDef($rsnew,$_SESSION['C_BELONGTO_ID'],$_SESSION['C_BELONGTO_ID'] );
                    }
                 //$rsnew['C_BELOGTO'] =& $t_doituong_levelsite->C_BELOGTO->DbValue;
                // END;
		// C_ORDER
		$t_doituong_levelsite->C_ORDER->SetDbValueDef($rsnew, $t_doituong_levelsite->C_ORDER->CurrentValue, NULL, FALSE);

		// C_STATUS
		$t_doituong_levelsite->C_STATUS->SetDbValueDef($rsnew, $t_doituong_levelsite->C_STATUS->CurrentValue, NULL, FALSE);

		// C_USER_ADD
		$t_doituong_levelsite->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_doituong_levelsite->C_USER_ADD->DbValue;

		// C_ADD_TIME
		$t_doituong_levelsite->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_ADD_TIME'] =& $t_doituong_levelsite->C_ADD_TIME->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_doituong_levelsite->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_doituong_levelsite->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_doituong_levelsite->CancelMessage <> "") {
				$this->setMessage($t_doituong_levelsite->CancelMessage);
				$t_doituong_levelsite->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_doituong_levelsite->PK_DOITUONG->setDbValue($conn->Insert_ID());
			$rsnew['PK_DOITUONG'] = $t_doituong_levelsite->PK_DOITUONG->DbValue;

			// Call Row Inserted event
			$t_doituong_levelsite->Row_Inserted($rsnew);
		}

		// C_ICON
		$t_doituong_levelsite->C_ICON->Upload->RemoveFromSession(); // Remove file value from Session
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
