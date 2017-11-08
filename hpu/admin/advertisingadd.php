<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "advertisinginfo.php" ?>
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
$advertising_add = new cadvertising_add();
$Page =& $advertising_add;

// Page init
$advertising_add->Page_Init();

// Page main
$advertising_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_add = new ew_Page("advertising_add");

// page properties
advertising_add.PageID = "add"; // page ID
advertising_add.FormID = "fadvertisingadd"; // form ID
var EW_PAGE_ID = advertising_add.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
                
                elm = fobj.elements["x" + infix + "_advertising_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_name->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_advertising_pos"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_pos->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_advertising_type"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_type->FldCaption()) ?>");
	       
                advertising_type=document.getElementById('x_advertising_type');
                advertising_type=advertising_type.options[advertising_type.selectedIndex].value;
                if (advertising_type ==4 )
                {
                      elm = fobj.elements["x" + infix + "_advertising_desc"];
		      if (elm && !ew_HasValue(elm))
		      return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_desc->FldCaption()) ?>");
                    
                 }
                if (advertising_type == 3)
                {
                    elm = fobj.elements["x" + infix + "_advertising_url"];
		    aelm = fobj.elements["a" + infix + "_advertising_url"];
                    var chk_advertising_url = (aelm && aelm[0])?(aelm[2].checked):true;
                    if (elm && chk_advertising_url && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_url->FldCaption()) ?>");
                    elm = fobj.elements["x" + infix + "_advertising_url"];
                    if (elm && !ew_CheckFileType(elm.value))
                            return ew_OnError(this, elm, ewLanguage.Phrase("WrongFileType"));
                }
                if ((advertising_type == 1) || (advertising_type == 2))
                {
                    elm = fobj.elements["x" + infix + "_advertising_link"];
		    if (elm && !ew_HasValue(elm))
	            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_link->FldCaption()) ?>");
                    
                    elm = fobj.elements["x" + infix + "_advertising_url"];
		    aelm = fobj.elements["a" + infix + "_advertising_url"];
                    var chk_advertising_url = (aelm && aelm[0])?(aelm[2].checked):true;
                    if (elm && chk_advertising_url && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_url->FldCaption()) ?>");
                    elm = fobj.elements["x" + infix + "_advertising_url"];
                    if (elm && !ew_CheckFileType(elm.value))
                            return ew_OnError(this, elm, ewLanguage.Phrase("WrongFileType"));
                }
		elm = fobj.elements["x" + infix + "_advertising_order"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($advertising->advertising_order->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_advertising_order"];
		if (elm && !ew_CheckNumber(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($advertising->advertising_order->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_add.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><span class="phpmaker"><?php echo $advertising->TableCaption() ?><br>
</span></p>
<a href="<?php echo $advertising->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$advertising_add->ShowMessage();
?>
<form name="fadvertisingadd" id="fadvertisingadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return advertising_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($advertising->advertising_name->Visible) { // advertising_name ?>
	<tr<?php echo $advertising->advertising_name->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_name->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_name->CellAttributes() ?>><span id="el_advertising_name">
<input type="text" name="x_advertising_name" id="x_advertising_name" title="<?php echo $advertising->advertising_name->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $advertising->advertising_name->EditValue ?>"<?php echo $advertising->advertising_name->EditAttributes() ?>>
</span><?php echo $advertising->advertising_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_pos->Visible) { // advertising_pos ?>
	<tr<?php echo $advertising->advertising_pos->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_pos->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_pos->CellAttributes() ?>><span id="el_advertising_pos">
<div id="tp_x_advertising_pos" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_advertising_pos" id="x_advertising_pos" title="<?php echo $advertising->advertising_pos->FldTitle() ?>" value="{value}"<?php echo $advertising->advertising_pos->EditAttributes() ?>></label></div>
<div id="dsl_x_advertising_pos" repeatcolumn="5">
<?php
$arwrk = $advertising->advertising_pos->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_pos->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_advertising_pos" id="x_advertising_pos" title="<?php echo $advertising->advertising_pos->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $advertising->advertising_pos->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $advertising->advertising_pos->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_type->Visible) { // advertising_type ?>
	<tr<?php echo $advertising->advertising_type->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_type->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_type->CellAttributes() ?>><span id="el_advertising_type">
<select id="x_advertising_type" name="x_advertising_type" title="<?php echo $advertising->advertising_type->FldTitle() ?>"<?php echo $advertising->advertising_type->EditAttributes() ?>>
<?php
if (is_array($advertising->advertising_type->EditValue)) {
	$arwrk = $advertising->advertising_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_type->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $advertising->advertising_type->CustomMsg ?>
                   <a class="show_hide"> <span id="message_display"> <br/> <span style="color: red">Hỗ trợ các dịnh dạng FLV, MP4 ( .mp4, .m4v, .f4v, .mov ),VP8, WebM, MP3, AAC ( .aac, .m4a, .f4a )</span></span> <a>  
                
                </td>
	</tr>
<?php } ?>
 <style>
            .show_hide {
                color: blue;
                cursor: pointer;
            }
            #x_c_file_pic {
                display: none;
            }
      
        </style>   
    <script type="text/javascript">
	$(document).ready(function(){
                  $("#x_advertising_url").hide();
                  $("#x_advertising_link").hide();
                  $("#x_advertising_desc").hide();
                  $("#message_display").hide();
		$("#x_advertising_type").change(function()
		{
		      
                        var message_index
			message_index = $("#x_advertising_type").val();
			
			if (message_index == 4)
                        {    
                       
                        $("#x_advertising_link").hide("slow");
                        $("#x_advertising_link").val("");
                        $("#x_advertising_desc").show("slow");
                        $("#x_advertising_url").show("slow");
                        $("#message_display").hide();
                        } 
                        else 
                        if (message_index == 3)
                        {
                        $("#x_advertising_desc").hide("slow");
                        $("#x_advertising_desc").val("");
                        $("#x_advertising_link").hide("slow");
                        $("#x_advertising_link").val("");
                        $("#x_advertising_url").show("slow");
                        $("#message_display").show();
                        } 
                        else 
                        if (message_index == 1)
                        {
                        $("#x_advertising_desc").hide("slow");
                        $("#x_advertising_desc").val("");
                        $("#x_advertising_link").show("slow");
                        $("#x_advertising_url").show("slow");
                        $("#message_display").hide();
                        }  
                        else 
                        if (message_index == 2)
                        {
                        $("#x_advertising_desc").hide("slow");
                        $("#x_advertising_desc").val("");
                        $("#x_advertising_link").show("slow");
                        $("#x_advertising_url").show("slow");
                        $("#message_display").hide();
                        }  
		});
	});
</script>  
<?php if ($advertising->advertising_desc->Visible) { // advertising_desc ?>
	<tr<?php echo $advertising->advertising_desc->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_desc->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_desc->CellAttributes() ?>><span id="el_advertising_desc">
<input type="text" name="x_advertising_desc" id="x_advertising_desc" title="<?php echo $advertising->advertising_desc->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $advertising->advertising_desc->EditValue ?>"<?php echo $advertising->advertising_desc->EditAttributes() ?>>
</span><?php echo $advertising->advertising_desc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_link->Visible) { // advertising_link ?>
	<tr<?php echo $advertising->advertising_link->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_link->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_link->CellAttributes() ?>><span id="el_advertising_link">
<input type="text" name="x_advertising_link" id="x_advertising_link" title="<?php echo $advertising->advertising_link->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $advertising->advertising_link->EditValue ?>"<?php echo $advertising->advertising_link->EditAttributes() ?>>
</span><?php echo $advertising->advertising_link->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_url->Visible) { // advertising_url ?>
	<tr<?php echo $advertising->advertising_url->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_url->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_url->CellAttributes() ?>><span id="el_advertising_url">
<input type="file" name="x_advertising_url" id="x_advertising_url" title="<?php echo $advertising->advertising_url->FldTitle() ?>" size="80"<?php echo $advertising->advertising_url->EditAttributes() ?>>
</div>
</span><?php echo $advertising->advertising_url->CustomMsg ?>
<i> Kích thước ảnh hiển thị:500px*255px</i> -- <a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>                           
                </td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_order->Visible) { // advertising_order ?>
	<tr<?php echo $advertising->advertising_order->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_order->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_order->CellAttributes() ?>><span id="el_advertising_order">
<input type="text" name="x_advertising_order" id="x_advertising_order" title="<?php echo $advertising->advertising_order->FldTitle() ?>" size="10" value="<?php echo $advertising->advertising_order->EditValue ?>"<?php echo $advertising->advertising_order->EditAttributes() ?>>
</span><?php echo $advertising->advertising_order->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($advertising->advertising_state->Visible) { // advertising_state ?>
	<tr<?php echo $advertising->advertising_state->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $advertising->advertising_state->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $advertising->advertising_state->CellAttributes() ?>><span id="el_advertising_state">
<div id="tp_x_advertising_state" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_advertising_state" id="x_advertising_state" title="<?php echo $advertising->advertising_state->FldTitle() ?>" value="{value}"<?php echo $advertising->advertising_state->EditAttributes() ?>></label></div>
<div id="dsl_x_advertising_state" repeatcolumn="5">
<?php
$arwrk = $advertising->advertising_state->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising->advertising_state->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_advertising_state" id="x_advertising_state" title="<?php echo $advertising->advertising_state->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $advertising->advertising_state->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $advertising->advertising_state->CustomMsg ?></td>
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
$advertising_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cadvertising_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'advertising';

	// Page object name
	var $PageObjName = 'advertising_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising;
		if ($advertising->UseTokenInUrl) $PageUrl .= "t=" . $advertising->TableVar . "&"; // Add page token
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
		global $objForm, $advertising;
		if ($advertising->UseTokenInUrl) {
			if ($objForm)
				return ($advertising->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cadvertising_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (advertising)
		$GLOBALS["advertising"] = new cadvertising();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising', TRUE);

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
		global $advertising;

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
			$this->Page_Terminate("advertisinglist.php");
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
		global $objForm, $Language, $gsFormError, $advertising;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["advertising_id"] != "") {
		  $advertising->advertising_id->setQueryStringValue($_GET["advertising_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $advertising->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$advertising->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $advertising->CurrentAction = "C"; // Copy record
		  } else {
		    $advertising->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($advertising->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("advertisinglist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$advertising->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $advertising->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "advertisingview.php")
						$sReturnUrl = $advertising->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$advertising->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $advertising;

		// Get upload data
			if ($advertising->advertising_url->Upload->UploadFile()) {

				// No action required
			} else {
				echo $advertising->advertising_url->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load default values
	function LoadDefaultValues() {
		global $advertising;
		$advertising->advertising_url->CurrentValue = NULL; // Clear file related field
		$advertising->advertising_state->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising;
                $advertising->advertising_name->setFormValue($objForm->GetValue("x_advertising_name"));
		$advertising->advertising_pos->setFormValue($objForm->GetValue("x_advertising_pos"));
		$advertising->advertising_type->setFormValue($objForm->GetValue("x_advertising_type"));
		$advertising->advertising_desc->setFormValue($objForm->GetValue("x_advertising_desc"));
		$advertising->advertising_link->setFormValue($objForm->GetValue("x_advertising_link"));
		$advertising->advertising_order->setFormValue($objForm->GetValue("x_advertising_order"));
		$advertising->create_time->setFormValue($objForm->GetValue("x_create_time"));
		$advertising->create_time->CurrentValue = ew_UnFormatDateTime($advertising->create_time->CurrentValue, 7);
		$advertising->advertising_state->setFormValue($objForm->GetValue("x_advertising_state"));
		$advertising->advertising_id->setFormValue($objForm->GetValue("x_advertising_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $advertising;
		$advertising->advertising_id->CurrentValue = $advertising->advertising_id->FormValue;
                $advertising->advertising_name->CurrentValue = $advertising->advertising_name->FormValue;
		$advertising->advertising_pos->CurrentValue = $advertising->advertising_pos->FormValue;
		$advertising->advertising_type->CurrentValue = $advertising->advertising_type->FormValue;
		$advertising->advertising_desc->CurrentValue = $advertising->advertising_desc->FormValue;
		$advertising->advertising_link->CurrentValue = $advertising->advertising_link->FormValue;
		$advertising->advertising_order->CurrentValue = $advertising->advertising_order->FormValue;
		$advertising->create_time->CurrentValue = $advertising->create_time->FormValue;
		$advertising->create_time->CurrentValue = ew_UnFormatDateTime($advertising->create_time->CurrentValue, 7);
		$advertising->advertising_state->CurrentValue = $advertising->advertising_state->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $advertising;
		$sFilter = $advertising->KeyFilter();

		// Call Row Selecting event
		$advertising->Row_Selecting($sFilter);

		// Load SQL based on filter
		$advertising->CurrentFilter = $sFilter;
		$sSql = $advertising->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$advertising->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $advertising;
		$advertising->advertising_id->setDbValue($rs->fields('advertising_id'));
		$advertising->advertising_pos->setDbValue($rs->fields('advertising_pos'));
		$advertising->advertising_type->setDbValue($rs->fields('advertising_type'));
		$advertising->advertising_desc->setDbValue($rs->fields('advertising_desc'));
		$advertising->advertising_link->setDbValue($rs->fields('advertising_link'));
		$advertising->advertising_url->Upload->DbValue = $rs->fields('advertising_url');
		$advertising->advertising_order->setDbValue($rs->fields('advertising_order'));
		$advertising->create_time->setDbValue($rs->fields('create_time'));
		$advertising->edit_time->setDbValue($rs->fields('edit_time'));
		$advertising->advertising_state->setDbValue($rs->fields('advertising_state'));
                $advertising->advertising_name->setDbValue($rs->fields('advertising_name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $advertising;

		// Initialize URLs
		// Call Row_Rendering event

		$advertising->Row_Rendering();

		// Common render codes for all row types
                // advertising_name

		$advertising->advertising_name->CellCssStyle = ""; $advertising->advertising_name->CellCssClass = "";
		$advertising->advertising_name->CellAttrs = array(); $advertising->advertising_name->ViewAttrs = array(); $advertising->advertising_name->EditAttrs = array();
                
		// advertising_pos

		$advertising->advertising_pos->CellCssStyle = ""; $advertising->advertising_pos->CellCssClass = "";
		$advertising->advertising_pos->CellAttrs = array(); $advertising->advertising_pos->ViewAttrs = array(); $advertising->advertising_pos->EditAttrs = array();

		// advertising_type
		$advertising->advertising_type->CellCssStyle = ""; $advertising->advertising_type->CellCssClass = "";
		$advertising->advertising_type->CellAttrs = array(); $advertising->advertising_type->ViewAttrs = array(); $advertising->advertising_type->EditAttrs = array();

		// advertising_desc
		$advertising->advertising_desc->CellCssStyle = ""; $advertising->advertising_desc->CellCssClass = "";
		$advertising->advertising_desc->CellAttrs = array(); $advertising->advertising_desc->ViewAttrs = array(); $advertising->advertising_desc->EditAttrs = array();

		// advertising_link
		$advertising->advertising_link->CellCssStyle = ""; $advertising->advertising_link->CellCssClass = "";
		$advertising->advertising_link->CellAttrs = array(); $advertising->advertising_link->ViewAttrs = array(); $advertising->advertising_link->EditAttrs = array();

		// advertising_url
		$advertising->advertising_url->CellCssStyle = ""; $advertising->advertising_url->CellCssClass = "";
		$advertising->advertising_url->CellAttrs = array(); $advertising->advertising_url->ViewAttrs = array(); $advertising->advertising_url->EditAttrs = array();

		// advertising_order
		$advertising->advertising_order->CellCssStyle = ""; $advertising->advertising_order->CellCssClass = "";
		$advertising->advertising_order->CellAttrs = array(); $advertising->advertising_order->ViewAttrs = array(); $advertising->advertising_order->EditAttrs = array();

		// create_time
		$advertising->create_time->CellCssStyle = ""; $advertising->create_time->CellCssClass = "";
		$advertising->create_time->CellAttrs = array(); $advertising->create_time->ViewAttrs = array(); $advertising->create_time->EditAttrs = array();

		// advertising_state
		$advertising->advertising_state->CellCssStyle = ""; $advertising->advertising_state->CellCssClass = "";
		$advertising->advertising_state->CellAttrs = array(); $advertising->advertising_state->ViewAttrs = array(); $advertising->advertising_state->EditAttrs = array();
		if ($advertising->RowType == EW_ROWTYPE_VIEW) { // View row

			// advertising_pos
			if (strval($advertising->advertising_pos->CurrentValue) <> "") {
				switch ($advertising->advertising_pos->CurrentValue) {
					case "1":
						$advertising->advertising_pos->ViewValue = "Sinh viên tương lai";
						break;
					case "2":
						$advertising->advertising_pos->ViewValue = "Cựu sinh viên";
						break;
                                        case "3":
						$advertising->advertising_pos->ViewValue = "Doanh nghiệp";
						break;
					default:
						$advertising->advertising_pos->ViewValue = $advertising->advertising_pos->CurrentValue;
				}
			} else {
				$advertising->advertising_pos->ViewValue = NULL;
			}
			$advertising->advertising_pos->CssStyle = "";
			$advertising->advertising_pos->CssClass = "";
			$advertising->advertising_pos->ViewCustomAttributes = "";

			// advertising_type
			if (strval($advertising->advertising_type->CurrentValue) <> "") {
				switch ($advertising->advertising_type->CurrentValue) {
					case "1":
						$advertising->advertising_type->ViewValue = "Ảnh";
						break;
					case "2":
						$advertising->advertising_type->ViewValue = "Flash";
						break;
					case "3":
						$advertising->advertising_type->ViewValue = "Video Upload";
						break;
					case "4":
						$advertising->advertising_type->ViewValue = "Video Youtube";
						break;
					default:
						$advertising->advertising_type->ViewValue = $advertising->advertising_type->CurrentValue;
				}
			} else {
				$advertising->advertising_type->ViewValue = NULL;
			}
			$advertising->advertising_type->CssStyle = "";
			$advertising->advertising_type->CssClass = "";
			$advertising->advertising_type->ViewCustomAttributes = "";

			// advertising_desc
			$advertising->advertising_desc->ViewValue = $advertising->advertising_desc->CurrentValue;
			$advertising->advertising_desc->CssStyle = "";
			$advertising->advertising_desc->CssClass = "";
			$advertising->advertising_desc->ViewCustomAttributes = "";
                        
                        // advertising_name
			$advertising->advertising_name->ViewValue = $advertising->advertising_name->CurrentValue;
			$advertising->advertising_name->CssStyle = "";
			$advertising->advertising_name->CssClass = "";
			$advertising->advertising_name->ViewCustomAttributes = "";

			// advertising_link
			$advertising->advertising_link->ViewValue = $advertising->advertising_link->CurrentValue;
			$advertising->advertising_link->CssStyle = "";
			$advertising->advertising_link->CssClass = "";
			$advertising->advertising_link->ViewCustomAttributes = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->ViewValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->ViewValue = "";
			}
			$advertising->advertising_url->CssStyle = "";
			$advertising->advertising_url->CssClass = "";
			$advertising->advertising_url->ViewCustomAttributes = "";

			// advertising_order
			$advertising->advertising_order->ViewValue = $advertising->advertising_order->CurrentValue;
			$advertising->advertising_order->CssStyle = "";
			$advertising->advertising_order->CssClass = "";
			$advertising->advertising_order->ViewCustomAttributes = "";

			// create_time
			$advertising->create_time->ViewValue = $advertising->create_time->CurrentValue;
			$advertising->create_time->ViewValue = ew_FormatDateTime($advertising->create_time->ViewValue, 7);
			$advertising->create_time->CssStyle = "";
			$advertising->create_time->CssClass = "";
			$advertising->create_time->ViewCustomAttributes = "";

			// advertising_state
			if (strval($advertising->advertising_state->CurrentValue) <> "") {
				switch ($advertising->advertising_state->CurrentValue) {
					case "0":
						$advertising->advertising_state->ViewValue = "Không kích hoạt";
						break;
					case "1":
						$advertising->advertising_state->ViewValue = "Kích hoạt";
						break;
					default:
						$advertising->advertising_state->ViewValue = $advertising->advertising_state->CurrentValue;
				}
			} else {
				$advertising->advertising_state->ViewValue = NULL;
			}
			$advertising->advertising_state->CssStyle = "";
			$advertising->advertising_state->CssClass = "";
			$advertising->advertising_state->ViewCustomAttributes = "";

			// advertising_pos
			$advertising->advertising_pos->HrefValue = "";
			$advertising->advertising_pos->TooltipValue = "";

			// advertising_type
			$advertising->advertising_type->HrefValue = "";
			$advertising->advertising_type->TooltipValue = "";

			// advertising_desc
			$advertising->advertising_desc->HrefValue = "";
			$advertising->advertising_desc->TooltipValue = "";

			// advertising_link
			$advertising->advertising_link->HrefValue = "";
			$advertising->advertising_link->TooltipValue = "";

			// advertising_url
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->HrefValue = ew_UploadPathEx(FALSE, $advertising->advertising_url->UploadPath) . ((!empty($advertising->advertising_url->ViewValue)) ? $advertising->advertising_url->ViewValue : $advertising->advertising_url->CurrentValue);
				if ($advertising->Export <> "") $advertising->advertising_url->HrefValue = ew_ConvertFullUrl($advertising->advertising_url->HrefValue);
			} else {
				$advertising->advertising_url->HrefValue = "";
			}
			$advertising->advertising_url->TooltipValue = "";

			// advertising_order
			$advertising->advertising_order->HrefValue = "";
			$advertising->advertising_order->TooltipValue = "";

			// create_time
			$advertising->create_time->HrefValue = "";
			$advertising->create_time->TooltipValue = "";

			// advertising_state
			$advertising->advertising_state->HrefValue = "";
			$advertising->advertising_state->TooltipValue = "";
		} elseif ($advertising->RowType == EW_ROWTYPE_ADD) { // Add row
                    
                    	// advertising_name
			$advertising->advertising_name->EditCustomAttributes = "";
			$advertising->advertising_name->EditValue = ew_HtmlEncode($advertising->advertising_name->CurrentValue);

			// advertising_pos
			$advertising->advertising_pos->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Sinh viên tương lai");
			$arwrk[] = array("2", "Cựu sinh viên");
                        $arwrk[] = array("3", "Doanh nghiệp");
			$advertising->advertising_pos->EditValue = $arwrk;

			// advertising_type
			$advertising->advertising_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Ảnh");
			$arwrk[] = array("2", "Flash");
			$arwrk[] = array("3", "Video Upload");
			$arwrk[] = array("4", "Video Youtube");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$advertising->advertising_type->EditValue = $arwrk;

			// advertising_desc
			$advertising->advertising_desc->EditCustomAttributes = "";
			$advertising->advertising_desc->EditValue = ew_HtmlEncode($advertising->advertising_desc->CurrentValue);

			// advertising_link
			$advertising->advertising_link->EditCustomAttributes = "";
			$advertising->advertising_link->EditValue = ew_HtmlEncode($advertising->advertising_link->CurrentValue);

			// advertising_url
			$advertising->advertising_url->EditCustomAttributes = "";
			if (!ew_Empty($advertising->advertising_url->Upload->DbValue)) {
				$advertising->advertising_url->EditValue = $advertising->advertising_url->Upload->DbValue;
			} else {
				$advertising->advertising_url->EditValue = "";
			}

			// advertising_order
			$advertising->advertising_order->EditCustomAttributes = "";
			$advertising->advertising_order->EditValue = ew_HtmlEncode($advertising->advertising_order->CurrentValue);

			// create_time
			// advertising_state

			$advertising->advertising_state->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$advertising->advertising_state->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($advertising->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$advertising->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $advertising;

		// Initialize form error message
		$gsFormError = "";

//		if ($advertising->advertising_url->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $advertising->advertising_url->Upload->FileSize > EW_MAX_FILE_SIZE) {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
//		}


		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
		
		

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
		global $conn, $Language, $Security, $advertising;
		$rsnew = array();
                
                
		// advertising_name
		$advertising->advertising_name->SetDbValueDef($rsnew, $advertising->advertising_name->CurrentValue, NULL, FALSE);

		// advertising_pos
		$advertising->advertising_pos->SetDbValueDef($rsnew, $advertising->advertising_pos->CurrentValue, 0, FALSE);

		// advertising_type
		$advertising->advertising_type->SetDbValueDef($rsnew, $advertising->advertising_type->CurrentValue, 0, FALSE);

		// advertising_desc
		$advertising->advertising_desc->SetDbValueDef($rsnew, $advertising->advertising_desc->CurrentValue, "", FALSE);

		// advertising_link
		$advertising->advertising_link->SetDbValueDef($rsnew, $advertising->advertising_link->CurrentValue, "", FALSE);

		// advertising_url
		$advertising->advertising_url->Upload->SaveToSession(); // Save file value to Session
		if (is_null($advertising->advertising_url->Upload->Value)) {
			$rsnew['advertising_url'] = NULL;
		} else {
			$rsnew['advertising_url'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, $advertising->advertising_url->UploadPath), $advertising->advertising_url->Upload->FileName);
		}

		// advertising_order
		$advertising->advertising_order->SetDbValueDef($rsnew, $advertising->advertising_order->CurrentValue, 0, FALSE);

		// create_time
		$advertising->create_time->SetDbValueDef($rsnew, ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['create_time'] =& $advertising->create_time->DbValue;

		// advertising_state
		$advertising->advertising_state->SetDbValueDef($rsnew, $advertising->advertising_state->CurrentValue, 0, TRUE);

		// Call Row Inserting event
		$bInsertRow = $advertising->Row_Inserting($rsnew);
		if ($bInsertRow) {
			if (!ew_Empty($advertising->advertising_url->Upload->Value)) {
				$advertising->advertising_url->Upload->SaveToFile($advertising->advertising_url->UploadPath, $rsnew['advertising_url'], FALSE);
			}
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($advertising->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($advertising->CancelMessage <> "") {
				$this->setMessage($advertising->CancelMessage);
				$advertising->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$advertising->advertising_id->setDbValue($conn->Insert_ID());
			$rsnew['advertising_id'] = $advertising->advertising_id->DbValue;

			// Call Row Inserted event
			$advertising->Row_Inserted($rsnew);
		}

		// advertising_url
		$advertising->advertising_url->Upload->RemoveFromSession(); // Remove file value from Session
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
