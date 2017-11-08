<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lylichinfo.php" ?>
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
$t_lylich_update = new ct_lylich_update();
$Page =& $t_lylich_update;

// Page init
$t_lylich_update->Page_Init();

// Page main
$t_lylich_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lylich_update = new ew_Page("t_lylich_update");

// page properties
t_lylich_update.PageID = "update"; // page ID
t_lylich_update.FormID = "ft_lylichupdate"; // form ID
var EW_PAGE_ID = t_lylich_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_lylich_update.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	if (!ew_UpdateSelected(fobj)) {
		alert(ewLanguage.Phrase("NoFieldSelected"));
		return false;
	}
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_TEMPLATE"];
		uelm = fobj.elements["u" + infix + "_C_TEMPLATE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_TEMPLATE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ORDER_LEVEL"];
		uelm = fobj.elements["u" + infix + "_C_ORDER_LEVEL"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_ORDER_LEVEL->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ORDER_LEVEL"];
		uelm = fobj.elements["u" + infix + "_C_ORDER_LEVEL"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lylich->C_ORDER_LEVEL->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_lylich_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lylich_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lylich_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lylich_update.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

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
<p><span class="phpmaker"><?php echo $Language->Phrase("Update") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lylich->TableCaption() ?><br><br>
<a href="<?php echo $t_lylich->getReturnUrl() ?>"><?php echo $Language->Phrase("BackToList") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lylich_update->ShowMessage();
?>
<form name="ft_lylichupdate" id="ft_lylichupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_lylich_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_lylich">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_lylich_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_lylich_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
            <td style="width:35px;"><?php echo $Language->Phrase("UpdateValue") ?><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>

<?php if ($t_lylich->C_ORDER_LEVEL->Visible) { // C_ORDER_LEVEL ?>
	<tr<?php echo $t_lylich->C_ORDER_LEVEL->RowAttributes ?>>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>>
<input type="checkbox" name="u_C_ORDER_LEVEL" id="u_C_ORDER_LEVEL" value="1"<?php echo ($t_lylich->C_ORDER_LEVEL->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?> checked="checked">
</td>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>><?php echo $t_lylich->C_ORDER_LEVEL->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ORDER_LEVEL->CellAttributes() ?>><span id="el_C_ORDER_LEVEL">
<input type="text" name="x_C_ORDER_LEVEL" id="x_C_ORDER_LEVEL" title="<?php echo $t_lylich->C_ORDER_LEVEL->FldTitle() ?>" value="<?php echo $t_lylich->C_ORDER_LEVEL->EditValue ?>"<?php echo $t_lylich->C_ORDER_LEVEL->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER_LEVEL" name="cal_x_C_ORDER_LEVEL" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER_LEVEL", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_ORDER_LEVEL" // button id
});
</script>
</span><?php echo $t_lylich->C_ORDER_LEVEL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_lylich->C_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>>
<input type="checkbox" name="u_C_ACTIVE" id="u_C_ACTIVE" value="1"<?php echo ($t_lylich->C_ACTIVE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?> checked="checked" >
</td>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>><?php echo $t_lylich->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lylich->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_lylich->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_lylich->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lylich->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lylich->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lylich->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_TIME_ACTIVE->Visible) { // C_TIME_ACTIVE ?>
	<tr<?php echo $t_lylich->C_TIME_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_lylich->C_TIME_ACTIVE->CellAttributes() ?>>
<input type="checkbox" name="u_C_TIME_ACTIVE" id="u_C_TIME_ACTIVE" value="1" checked="checked" >
</td>
		<td<?php echo $t_lylich->C_TIME_ACTIVE->CellAttributes() ?>><?php echo $t_lylich->C_TIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_TIME_ACTIVE->CellAttributes() ?>><span id="el_C_TIME_ACTIVE">
</span><?php echo $t_lylich->C_TIME_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
        
<?php if ($t_lylich->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
	<tr<?php echo $t_lylich->C_ACTIVE_MAINSITE->RowAttributes ?>>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<input type="checkbox" name="u_C_ACTIVE_MAINSITE" id="u_C_ACTIVE_MAINSITE" value="1"<?php echo ($t_lylich->C_ACTIVE_MAINSITE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?> checked="checked" >
</td>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>><?php echo $t_lylich->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_ACTIVE_MAINSITE->CellAttributes() ?>><span id="el_C_ACTIVE_MAINSITE">
<div id="tp_x_C_ACTIVE_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_lylich->C_ACTIVE_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_lylich->C_ACTIVE_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_lylich->C_ACTIVE_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_lylich->C_ACTIVE_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lylich->C_ACTIVE_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lylich->C_ACTIVE_MAINSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
        
<?php if ($t_lylich->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_lylich->C_NOTE->RowAttributes ?>>
		<td<?php echo $t_lylich->C_NOTE->CellAttributes() ?>>
<input type="checkbox" name="u_C_NOTE" id="u_C_NOTE" value="1"<?php echo ($t_lylich->C_NOTE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?> checked="checked">
</td>
		<td<?php echo $t_lylich->C_NOTE->CellAttributes() ?>><?php echo $t_lylich->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
<textarea name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_lylich->C_NOTE->FldTitle() ?>" cols="100" rows="4"<?php echo $t_lylich->C_NOTE->EditAttributes() ?>><?php echo $t_lylich->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_lylich->C_NOTE->CustomMsg ?></td>
	</tr>
<?php } ?>
        
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("UpdateBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_lylich_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lylich_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_lylich';

	// Page object name
	var $PageObjName = 't_lylich_update';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lylich;
		if ($t_lylich->UseTokenInUrl) $PageUrl .= "t=" . $t_lylich->TableVar . "&"; // Add page token
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
		global $objForm, $t_lylich;
		if ($t_lylich->UseTokenInUrl) {
			if ($objForm)
				return ($t_lylich->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lylich->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lylich_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lylich)
		$GLOBALS["t_lylich"] = new ct_lylich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lylich', TRUE);

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
		global $t_lylich;

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
			$this->Page_Terminate("t_lylichlist.php");
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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_lylich;

		// Try to load keys from list form
		$this->nKeySelected = 0;
		if (ew_IsHttpPost()) {
			if (isset($_POST["key_m"])) { // Key count > 0
				$this->nKeySelected = count($_POST["key_m"]); // Get number of keys
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
				$this->LoadMultiUpdateValues(); // Load initial values to form
			}
		}

		// Try to load key from update form
		if ($this->nKeySelected == 0) {
			$this->arRecKeys = array();
			if (@$_POST["a_update"] <> "") {

				// Get action
				$t_lylich->CurrentAction = $_POST["a_update"];

				// Get record keys
				$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				while ($sKey <> "") {
					$this->arRecKeys[$this->nKeySelected] = ew_StripSlashes($sKey);
					$this->nKeySelected++;
					$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				}
				$this->LoadFormValues(); // Get form values

				// Validate form
				if (!$this->ValidateForm()) {
					$t_lylich->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_lylichlist.php"); // No records selected, return to list
		switch ($t_lylich->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_lylich->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_lylich->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_lylich;
		$t_lylich->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$t_lylich->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
					$t_lylich->C_NOTE->setDbValue($rs->fields('C_NOTE'));
					$t_lylich->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
					$t_lylich->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
					$t_lylich->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
					$t_lylich->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
				} else {
					if (!ew_CompareValue($t_lylich->C_TEMPLATE->DbValue, $rs->fields('C_TEMPLATE')))
						$t_lylich->C_TEMPLATE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lylich->C_NOTE->DbValue, $rs->fields('C_NOTE')))
						$t_lylich->C_NOTE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lylich->C_ORDER_LEVEL->DbValue, $rs->fields('C_ORDER_LEVEL')))
						$t_lylich->C_ORDER_LEVEL->CurrentValue = NULL;
					if (!ew_CompareValue($t_lylich->C_ACTIVE->DbValue, $rs->fields('C_ACTIVE')))
						$t_lylich->C_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lylich->C_TIME_ACTIVE->DbValue, $rs->fields('C_TIME_ACTIVE')))
						$t_lylich->C_TIME_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lylich->C_ACTIVE_MAINSITE->DbValue, $rs->fields('C_ACTIVE_MAINSITE')))
						$t_lylich->C_ACTIVE_MAINSITE->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_lylich;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_lylich->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}
		}
		return $sWrkFilter;
	}

	// Set up key value
	function SetupKeyValues($key) {
		global $t_lylich;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_lylich->PK_PROFILE_ID->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_lylich;
		$conn->BeginTrans();

		// Get old recordset
		$t_lylich->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_lylich->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_lylich->SendEmail = FALSE; // Do not send email on update success
				$UpdateRows = $this->EditRow(); // Update this row
			} else {
				$UpdateRows = FALSE;
			}
			if (!$UpdateRows)
				return; // Update failed
			if ($sKey <> "") $sKey .= ", ";
			$sKey .= $sThisKey;
		}

		// Check if all rows updated
		if ($UpdateRows) {
			$conn->CommitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->Execute($sSql);
		} else {
			$conn->RollbackTrans(); // Rollback transaction
		}
		return $UpdateRows;
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_lylich;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_lylich;
		$t_lylich->C_TEMPLATE->setFormValue($objForm->GetValue("x_C_TEMPLATE"));
		$t_lylich->C_TEMPLATE->MultiUpdate = $objForm->GetValue("u_C_TEMPLATE");
		$t_lylich->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_lylich->C_NOTE->MultiUpdate = $objForm->GetValue("u_C_NOTE");
		$t_lylich->C_ORDER_LEVEL->setFormValue($objForm->GetValue("x_C_ORDER_LEVEL"));
		$t_lylich->C_ORDER_LEVEL->CurrentValue = ew_UnFormatDateTime($t_lylich->C_ORDER_LEVEL->CurrentValue, 7);
		$t_lylich->C_ORDER_LEVEL->MultiUpdate = $objForm->GetValue("u_C_ORDER_LEVEL");
		$t_lylich->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_lylich->C_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE");
		$t_lylich->C_TIME_ACTIVE->setFormValue($objForm->GetValue("x_C_TIME_ACTIVE"));
		$t_lylich->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_lylich->C_TIME_ACTIVE->CurrentValue, 7);
		$t_lylich->C_TIME_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_TIME_ACTIVE");
		$t_lylich->C_ACTIVE_MAINSITE->setFormValue($objForm->GetValue("x_C_ACTIVE_MAINSITE"));
		$t_lylich->C_ACTIVE_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE_MAINSITE");
		$t_lylich->PK_PROFILE_ID->setFormValue($objForm->GetValue("x_PK_PROFILE_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_lylich;
		$t_lylich->PK_PROFILE_ID->CurrentValue = $t_lylich->PK_PROFILE_ID->FormValue;
		$t_lylich->C_TEMPLATE->CurrentValue = $t_lylich->C_TEMPLATE->FormValue;
		$t_lylich->C_NOTE->CurrentValue = $t_lylich->C_NOTE->FormValue;
		$t_lylich->C_ORDER_LEVEL->CurrentValue = $t_lylich->C_ORDER_LEVEL->FormValue;
		$t_lylich->C_ORDER_LEVEL->CurrentValue = ew_UnFormatDateTime($t_lylich->C_ORDER_LEVEL->CurrentValue, 7);
		$t_lylich->C_ACTIVE->CurrentValue = $t_lylich->C_ACTIVE->FormValue;
		$t_lylich->C_TIME_ACTIVE->CurrentValue = $t_lylich->C_TIME_ACTIVE->FormValue;
		$t_lylich->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_lylich->C_TIME_ACTIVE->CurrentValue, 7);
		$t_lylich->C_ACTIVE_MAINSITE->CurrentValue = $t_lylich->C_ACTIVE_MAINSITE->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lylich;

		// Call Recordset Selecting event
		$t_lylich->Recordset_Selecting($t_lylich->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lylich->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lylich->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lylich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lylich->Row_Rendering();

		// Common render codes for all row types
		// C_TEMPLATE

		$t_lylich->C_TEMPLATE->CellCssStyle = ""; $t_lylich->C_TEMPLATE->CellCssClass = "";
		$t_lylich->C_TEMPLATE->CellAttrs = array(); $t_lylich->C_TEMPLATE->ViewAttrs = array(); $t_lylich->C_TEMPLATE->EditAttrs = array();

		// C_NOTE
		$t_lylich->C_NOTE->CellCssStyle = ""; $t_lylich->C_NOTE->CellCssClass = "";
		$t_lylich->C_NOTE->CellAttrs = array(); $t_lylich->C_NOTE->ViewAttrs = array(); $t_lylich->C_NOTE->EditAttrs = array();

		// C_ORDER_LEVEL
		$t_lylich->C_ORDER_LEVEL->CellCssStyle = ""; $t_lylich->C_ORDER_LEVEL->CellCssClass = "";
		$t_lylich->C_ORDER_LEVEL->CellAttrs = array(); $t_lylich->C_ORDER_LEVEL->ViewAttrs = array(); $t_lylich->C_ORDER_LEVEL->EditAttrs = array();

		// C_ACTIVE
		$t_lylich->C_ACTIVE->CellCssStyle = ""; $t_lylich->C_ACTIVE->CellCssClass = "";
		$t_lylich->C_ACTIVE->CellAttrs = array(); $t_lylich->C_ACTIVE->ViewAttrs = array(); $t_lylich->C_ACTIVE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_lylich->C_TIME_ACTIVE->CellCssStyle = ""; $t_lylich->C_TIME_ACTIVE->CellCssClass = "";
		$t_lylich->C_TIME_ACTIVE->CellAttrs = array(); $t_lylich->C_TIME_ACTIVE->ViewAttrs = array(); $t_lylich->C_TIME_ACTIVE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_lylich->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_lylich->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_lylich->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_lylich->C_ACTIVE_MAINSITE->EditAttrs = array();
		if ($t_lylich->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_PROFILE_ID
			$t_lylich->PK_PROFILE_ID->ViewValue = $t_lylich->PK_PROFILE_ID->CurrentValue;
			$t_lylich->PK_PROFILE_ID->CssStyle = "";
			$t_lylich->PK_PROFILE_ID->CssClass = "";
			$t_lylich->PK_PROFILE_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_lylich->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lylich->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lylich->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lylich->FK_CONGTY_ID->ViewValue = $t_lylich->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_lylich->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_lylich->FK_CONGTY_ID->CssStyle = "";
			$t_lylich->FK_CONGTY_ID->CssClass = "";
			$t_lylich->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->ViewValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->ViewValue = "";
			}
			$t_lylich->C_PIC->CssStyle = "";
			$t_lylich->C_PIC->CssClass = "";
			$t_lylich->C_PIC->ViewCustomAttributes = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->ViewValue = $t_lylich->C_FULLNAME->CurrentValue;
			$t_lylich->C_FULLNAME->CssStyle = "";
			$t_lylich->C_FULLNAME->CssClass = "";
			$t_lylich->C_FULLNAME->ViewCustomAttributes = "";

			// C_POSITION
			$t_lylich->C_POSITION->ViewValue = $t_lylich->C_POSITION->CurrentValue;
			$t_lylich->C_POSITION->CssStyle = "";
			$t_lylich->C_POSITION->CssClass = "";
			$t_lylich->C_POSITION->ViewCustomAttributes = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->ViewValue = $t_lylich->C_WORK_ADDRESS->CurrentValue;
			$t_lylich->C_WORK_ADDRESS->CssStyle = "";
			$t_lylich->C_WORK_ADDRESS->CssClass = "";
			$t_lylich->C_WORK_ADDRESS->ViewCustomAttributes = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->ViewValue = $t_lylich->C_EMAIL->CurrentValue;
			$t_lylich->C_EMAIL->CssStyle = "";
			$t_lylich->C_EMAIL->CssClass = "";
			$t_lylich->C_EMAIL->ViewCustomAttributes = "";

			// C_PHONE
			$t_lylich->C_PHONE->ViewValue = $t_lylich->C_PHONE->CurrentValue;
			$t_lylich->C_PHONE->CssStyle = "";
			$t_lylich->C_PHONE->CssClass = "";
			$t_lylich->C_PHONE->ViewCustomAttributes = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->ViewValue = $t_lylich->C_BIRTHDAY->CurrentValue;
			$t_lylich->C_BIRTHDAY->CssStyle = "";
			$t_lylich->C_BIRTHDAY->CssClass = "";
			$t_lylich->C_BIRTHDAY->ViewCustomAttributes = "";

			// C_BLOG
			$t_lylich->C_BLOG->ViewValue = $t_lylich->C_BLOG->CurrentValue;
			$t_lylich->C_BLOG->CssStyle = "";
			$t_lylich->C_BLOG->CssClass = "";
			$t_lylich->C_BLOG->ViewCustomAttributes = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->ViewValue = $t_lylich->C_PERSONAL_PROFILE->CurrentValue;
			$t_lylich->C_PERSONAL_PROFILE->CssStyle = "";
			$t_lylich->C_PERSONAL_PROFILE->CssClass = "";
			$t_lylich->C_PERSONAL_PROFILE->ViewCustomAttributes = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->ViewValue = $t_lylich->C_EDUCATIION->CurrentValue;
			$t_lylich->C_EDUCATIION->CssStyle = "";
			$t_lylich->C_EDUCATIION->CssClass = "";
			$t_lylich->C_EDUCATIION->ViewCustomAttributes = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->ViewValue = $t_lylich->C_SKILLS->CurrentValue;
			$t_lylich->C_SKILLS->CssStyle = "";
			$t_lylich->C_SKILLS->CssClass = "";
			$t_lylich->C_SKILLS->ViewCustomAttributes = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->ViewValue = $t_lylich->C_WORK_EXPERIENCE->CurrentValue;
			$t_lylich->C_WORK_EXPERIENCE->CssStyle = "";
			$t_lylich->C_WORK_EXPERIENCE->CssClass = "";
			$t_lylich->C_WORK_EXPERIENCE->ViewCustomAttributes = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewValue = $t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue;
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssStyle = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->CssClass = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->ViewCustomAttributes = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->ViewValue = $t_lylich->C_REFERENCES->CurrentValue;
			$t_lylich->C_REFERENCES->CssStyle = "";
			$t_lylich->C_REFERENCES->CssClass = "";
			$t_lylich->C_REFERENCES->ViewCustomAttributes = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->ViewValue = $t_lylich->C_HOBBIES->CurrentValue;
			$t_lylich->C_HOBBIES->CssStyle = "";
			$t_lylich->C_HOBBIES->CssClass = "";
			$t_lylich->C_HOBBIES->ViewCustomAttributes = "";

			// C_TEMPLATE
			if (strval($t_lylich->C_TEMPLATE->CurrentValue) <> "") {
				switch ($t_lylich->C_TEMPLATE->CurrentValue) {
					case "1":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 1";
						break;
					case "2":
						$t_lylich->C_TEMPLATE->ViewValue = "Template 2";
						break;
					default:
						$t_lylich->C_TEMPLATE->ViewValue = $t_lylich->C_TEMPLATE->CurrentValue;
				}
			} else {
				$t_lylich->C_TEMPLATE->ViewValue = NULL;
			}
			$t_lylich->C_TEMPLATE->CssStyle = "";
			$t_lylich->C_TEMPLATE->CssClass = "";
			$t_lylich->C_TEMPLATE->ViewCustomAttributes = "";

			// C_STATUS
			if (strval($t_lylich->C_STATUS->CurrentValue) <> "") {
				switch ($t_lylich->C_STATUS->CurrentValue) {
					case "0":
						$t_lylich->C_STATUS->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_lylich->C_STATUS->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_STATUS->ViewValue = $t_lylich->C_STATUS->CurrentValue;
				}
			} else {
				$t_lylich->C_STATUS->ViewValue = NULL;
			}
			$t_lylich->C_STATUS->CssStyle = "";
			$t_lylich->C_STATUS->CssClass = "";
			$t_lylich->C_STATUS->ViewCustomAttributes = "";

			// C_NOTE
			$t_lylich->C_NOTE->ViewValue = $t_lylich->C_NOTE->CurrentValue;
			$t_lylich->C_NOTE->CssStyle = "";
			$t_lylich->C_NOTE->CssClass = "";
			$t_lylich->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lylich->C_USER_ADD->ViewValue = $t_lylich->C_USER_ADD->CurrentValue;
			$t_lylich->C_USER_ADD->CssStyle = "";
			$t_lylich->C_USER_ADD->CssClass = "";
			$t_lylich->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lylich->C_ADD_TIME->ViewValue = $t_lylich->C_ADD_TIME->CurrentValue;
			$t_lylich->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_ADD_TIME->ViewValue, 7);
			$t_lylich->C_ADD_TIME->CssStyle = "";
			$t_lylich->C_ADD_TIME->CssClass = "";
			$t_lylich->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->ViewValue = $t_lylich->C_USER_EDIT->CurrentValue;
			$t_lylich->C_USER_EDIT->CssStyle = "";
			$t_lylich->C_USER_EDIT->CssClass = "";
			$t_lylich->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->ViewValue = $t_lylich->C_EDIT_TIME->CurrentValue;
			$t_lylich->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lylich->C_EDIT_TIME->ViewValue, 7);
			$t_lylich->C_EDIT_TIME->CssStyle = "";
			$t_lylich->C_EDIT_TIME->CssClass = "";
			$t_lylich->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->ViewValue = $t_lylich->C_ORDER_LEVEL->CurrentValue;
			$t_lylich->C_ORDER_LEVEL->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_LEVEL->ViewValue, 7);
			$t_lylich->C_ORDER_LEVEL->CssStyle = "";
			$t_lylich->C_ORDER_LEVEL->CssClass = "";
			$t_lylich->C_ORDER_LEVEL->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lylich->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_lylich->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_lylich->C_ACTIVE->ViewValue = $t_lylich->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE->CssStyle = "";
			$t_lylich->C_ACTIVE->CssClass = "";
			$t_lylich->C_ACTIVE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->ViewValue = $t_lylich->C_TIME_ACTIVE->CurrentValue;
			$t_lylich->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVE->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVE->CssStyle = "";
			$t_lylich->C_TIME_ACTIVE->CssClass = "";
			$t_lylich->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_lylich->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Khong active mainsite";
						break;
					case "1":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Active mainsite";
						break;
					case "2":
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = "Xac nhan";
						break;
					default:
						$t_lylich->C_ACTIVE_MAINSITE->ViewValue = $t_lylich->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_lylich->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_lylich->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_lylich->C_ACTIVE_MAINSITE->CssClass = "";
			$t_lylich->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVEM
			$t_lylich->C_TIME_ACTIVEM->ViewValue = $t_lylich->C_TIME_ACTIVEM->CurrentValue;
			$t_lylich->C_TIME_ACTIVEM->ViewValue = ew_FormatDateTime($t_lylich->C_TIME_ACTIVEM->ViewValue, 7);
			$t_lylich->C_TIME_ACTIVEM->CssStyle = "";
			$t_lylich->C_TIME_ACTIVEM->CssClass = "";
			$t_lylich->C_TIME_ACTIVEM->ViewCustomAttributes = "";

			// C_ORDER_MAIN
			$t_lylich->C_ORDER_MAIN->ViewValue = $t_lylich->C_ORDER_MAIN->CurrentValue;
			$t_lylich->C_ORDER_MAIN->ViewValue = ew_FormatDateTime($t_lylich->C_ORDER_MAIN->ViewValue, 7);
			$t_lylich->C_ORDER_MAIN->CssStyle = "";
			$t_lylich->C_ORDER_MAIN->CssClass = "";
			$t_lylich->C_ORDER_MAIN->ViewCustomAttributes = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";
			$t_lylich->C_TEMPLATE->TooltipValue = "";

			// C_NOTE
			$t_lylich->C_NOTE->HrefValue = "";
			$t_lylich->C_NOTE->TooltipValue = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->HrefValue = "";
			$t_lylich->C_ORDER_LEVEL->TooltipValue = "";

			// C_ACTIVE
			$t_lylich->C_ACTIVE->HrefValue = "";
			$t_lylich->C_ACTIVE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->HrefValue = "";
			$t_lylich->C_TIME_ACTIVE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_lylich->C_ACTIVE_MAINSITE->TooltipValue = "";
		} elseif ($t_lylich->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Template 1");
			$arwrk[] = array("2", "Template 2");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lylich->C_TEMPLATE->EditValue = $arwrk;

			// C_NOTE
			$t_lylich->C_NOTE->EditCustomAttributes = "";
			$t_lylich->C_NOTE->EditValue = ew_HtmlEncode($t_lylich->C_NOTE->CurrentValue);

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->EditCustomAttributes = "";
			$t_lylich->C_ORDER_LEVEL->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_lylich->C_ORDER_LEVEL->CurrentValue, 7));

			// C_ACTIVE
			$t_lylich->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
                        $arwrk[] = array("2", "Chờ xét");
			$t_lylich->C_ACTIVE->EditValue = $arwrk;
			// C_TIME_ACTIVE
			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_lylich->C_ACTIVE_MAINSITE->EditValue = $arwrk;

			// Edit refer script
			// C_TEMPLATE

			$t_lylich->C_TEMPLATE->HrefValue = "";

			// C_NOTE
			$t_lylich->C_NOTE->HrefValue = "";

			// C_ORDER_LEVEL
			$t_lylich->C_ORDER_LEVEL->HrefValue = "";

			// C_ACTIVE
			$t_lylich->C_ACTIVE->HrefValue = "";

			// C_TIME_ACTIVE
			$t_lylich->C_TIME_ACTIVE->HrefValue = "";

			// C_ACTIVE_MAINSITE
			$t_lylich->C_ACTIVE_MAINSITE->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_lylich->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lylich->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_lylich;

		// Initialize form error message
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($t_lylich->C_TEMPLATE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lylich->C_NOTE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lylich->C_ORDER_LEVEL->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lylich->C_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lylich->C_TIME_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lylich->C_ACTIVE_MAINSITE->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = $Language->Phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_lylich->C_TEMPLATE->MultiUpdate <> "" && !is_null($t_lylich->C_TEMPLATE->FormValue) && $t_lylich->C_TEMPLATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_TEMPLATE->FldCaption();
		}
		if ($t_lylich->C_ORDER_LEVEL->MultiUpdate <> "" && !is_null($t_lylich->C_ORDER_LEVEL->FormValue) && $t_lylich->C_ORDER_LEVEL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_ORDER_LEVEL->FldCaption();
		}
		if ($t_lylich->C_ORDER_LEVEL->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_lylich->C_ORDER_LEVEL->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_lylich->C_ORDER_LEVEL->FldErrMsg;
			}
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
		global $conn, $Security, $Language, $t_lylich;
		$sFilter = $t_lylich->KeyFilter();
		$t_lylich->CurrentFilter = $sFilter;
		$sSql = $t_lylich->SQL();
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

			// C_TEMPLATE
						if ($t_lylich->C_TEMPLATE->MultiUpdate == "1") {
			$t_lylich->C_TEMPLATE->SetDbValueDef($rsnew, $t_lylich->C_TEMPLATE->CurrentValue, NULL, FALSE);
			}

			// C_NOTE
						if ($t_lylich->C_NOTE->MultiUpdate == "1") {
			$t_lylich->C_NOTE->SetDbValueDef($rsnew, $t_lylich->C_NOTE->CurrentValue, NULL, FALSE);
			}

			// C_ORDER_LEVEL
						if ($t_lylich->C_ORDER_LEVEL->MultiUpdate == "1") {
			$t_lylich->C_ORDER_LEVEL->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_lylich->C_ORDER_LEVEL->CurrentValue, 7, FALSE), NULL);
			}

			// C_ACTIVE
						if ($t_lylich->C_ACTIVE->MultiUpdate == "1") {
			$t_lylich->C_ACTIVE->SetDbValueDef($rsnew, $t_lylich->C_ACTIVE->CurrentValue, NULL, FALSE);
			}

			// C_TIME_ACTIVE
						if ($t_lylich->C_TIME_ACTIVE->MultiUpdate == "1") {
			$t_lylich->C_TIME_ACTIVE->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_TIME_ACTIVE'] =& $t_lylich->C_TIME_ACTIVE->DbValue;
			}

			// C_ACTIVE_MAINSITE
						if ($t_lylich->C_ACTIVE_MAINSITE->MultiUpdate == "1") {
			$t_lylich->C_ACTIVE_MAINSITE->SetDbValueDef($rsnew, $t_lylich->C_ACTIVE_MAINSITE->CurrentValue, NULL, FALSE);
			}

			// Call Row Updating event
			$bUpdateRow = $t_lylich->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_lylich->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_lylich->CancelMessage <> "") {
					$this->setMessage($t_lylich->CancelMessage);
					$t_lylich->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_lylich->Row_Updated($rsold, $rsnew);
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
