<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_event_mainlevelinfo.php" ?>
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
$t_event_mainlevel_edit = new ct_event_mainlevel_edit();
$Page =& $t_event_mainlevel_edit;

// Page init
$t_event_mainlevel_edit->Page_Init();

// Page main
$t_event_mainlevel_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_mainlevel_edit = new ew_Page("t_event_mainlevel_edit");

// page properties
t_event_mainlevel_edit.PageID = "edit"; // page ID
t_event_mainlevel_edit.FormID = "ft_event_mainleveledit"; // form ID
var EW_PAGE_ID = t_event_mainlevel_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_event_mainlevel_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_URL_LINK"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event_mainlevel->C_URL_LINK->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_BEGIN"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event_mainlevel->C_DATETIME_BEGIN->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_BEGIN"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event_mainlevel->C_DATETIME_BEGIN->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_END"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event_mainlevel->C_DATETIME_END->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_END"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event_mainlevel->C_DATETIME_END->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event_mainlevel->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event_mainlevel->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_TYPE_ACTIVE"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event_mainlevel->C_TYPE_ACTIVE->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_event_mainlevel_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_mainlevel_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_mainlevel_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_mainlevel_edit.ValidateRequired = false; // no JavaScript validation
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
<link href="js/select2.css" rel="stylesheet">
<script src="js/select2.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
              $(".x_FK_ARRAY_TINBAI").select2();
        });
    </script>
<p class="pheader"><span class="phpmaker"><?php echo $t_event_mainlevel->TableCaption() ?><br>
<a href="<?php echo $t_event_mainlevel->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_mainlevel_edit->ShowMessage();
?>
<form name="ft_event_mainleveledit" id="ft_event_mainleveledit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_event_mainlevel_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_event_mainlevel">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_event_mainlevel->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_event_mainlevel->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<div<?php echo $t_event_mainlevel->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_event_mainlevel->FK_CONGTY_ID->EditValue ?></div><input type="hidden" name="x_FK_CONGTY_ID" id="x_FK_CONGTY_ID" value="<?php echo ew_HtmlEncode($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) ?>">
</span><?php echo $t_event_mainlevel->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<tr<?php echo $t_event_mainlevel->C_EVENT_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_EVENT_NAME->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_EVENT_NAME->CellAttributes() ?>><span id="el_C_EVENT_NAME">
<div<?php echo $t_event_mainlevel->C_EVENT_NAME->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_EVENT_NAME->EditValue ?></div><input type="hidden" name="x_C_EVENT_NAME" id="x_C_EVENT_NAME" value="<?php echo ew_HtmlEncode($t_event_mainlevel->C_EVENT_NAME->CurrentValue) ?>">
</span><?php echo $t_event_mainlevel->C_EVENT_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<tr<?php echo $t_event_mainlevel->C_TYPE_EVENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_TYPE_EVENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event_mainlevel->C_TYPE_EVENT->CellAttributes() ?>><span id="el_C_TYPE_EVENT">
<div<?php echo $t_event_mainlevel->C_TYPE_EVENT->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_TYPE_EVENT->EditValue ?></div><input type="hidden" name="x_C_TYPE_EVENT" id="x_C_TYPE_EVENT" value="<?php echo ew_HtmlEncode($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) ?>">
</span><?php echo $t_event_mainlevel->C_TYPE_EVENT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_POST->Visible) { // C_POST ?>
	<tr<?php echo $t_event_mainlevel->C_POST->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_POST->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_POST->CellAttributes() ?>><span id="el_C_POST">
<div<?php echo $t_event_mainlevel->C_POST->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_POST->EditValue ?></div><input type="hidden" name="x_C_POST" id="x_C_POST" value="<?php echo ew_HtmlEncode($t_event_mainlevel->C_POST->CurrentValue) ?>">
</span><?php echo $t_event_mainlevel->C_POST->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<tr<?php echo $t_event_mainlevel->C_URL_IMAGES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_URL_IMAGES->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_URL_IMAGES->CellAttributes() ?>><span id="el_C_URL_IMAGES">
<div<?php echo $t_event_mainlevel->C_URL_IMAGES->ViewAttributes() ?>><?php echo $t_event_mainlevel->C_URL_IMAGES->EditValue ?></div><input type="hidden" name="x_C_URL_IMAGES" id="x_C_URL_IMAGES" value="<?php echo ew_HtmlEncode($t_event_mainlevel->C_URL_IMAGES->CurrentValue) ?>">
</span> <?php echo $t_event_mainlevel->C_URL_IMAGES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_URL_LINK->Visible) { // C_URL_LINK ?>
	<tr<?php echo $t_event_mainlevel->C_URL_LINK->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_URL_LINK->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event_mainlevel->C_URL_LINK->CellAttributes() ?>><span id="el_C_URL_LINK">
<input type="text" name="x_C_URL_LINK" id="x_C_URL_LINK" title="<?php echo $t_event_mainlevel->C_URL_LINK->FldTitle() ?>" size="80" value="<?php echo $t_event_mainlevel->C_URL_LINK->EditValue ?>"<?php echo $t_event_mainlevel->C_URL_LINK->EditAttributes() ?>>
</span><?php echo $t_event_mainlevel->C_URL_LINK->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<tr<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->CellAttributes() ?>><span id="el_C_DATETIME_BEGIN">
<input type="text" name="x_C_DATETIME_BEGIN" id="x_C_DATETIME_BEGIN" title="<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->FldTitle() ?>" value="<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->EditValue ?>"<?php echo $t_event_mainlevel->C_DATETIME_BEGIN->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_BEGIN" name="cal_x_C_DATETIME_BEGIN" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_BEGIN", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_BEGIN" // button id
});
</script>
</span><?php echo $t_event_mainlevel->C_DATETIME_BEGIN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_DATETIME_END->Visible) { // C_DATETIME_END ?>
	<tr<?php echo $t_event_mainlevel->C_DATETIME_END->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_DATETIME_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event_mainlevel->C_DATETIME_END->CellAttributes() ?>><span id="el_C_DATETIME_END">
<input type="text" name="x_C_DATETIME_END" id="x_C_DATETIME_END" title="<?php echo $t_event_mainlevel->C_DATETIME_END->FldTitle() ?>" value="<?php echo $t_event_mainlevel->C_DATETIME_END->EditValue ?>"<?php echo $t_event_mainlevel->C_DATETIME_END->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_END" name="cal_x_C_DATETIME_END" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_END", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_END" // button id
});
</script>
</span><?php echo $t_event_mainlevel->C_DATETIME_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_event_mainlevel->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event_mainlevel->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_event_mainlevel->C_ORDER->FldTitle() ?>" value="<?php echo $t_event_mainlevel->C_ORDER->EditValue ?>"<?php echo $t_event_mainlevel->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_event_mainlevel->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
	<tr<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttributes() ?>><span id="el_C_ACTIVE_LEVELSITE">
<div id="tp_x_C_ACTIVE_LEVELSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="{value}"<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_LEVELSITE" repeatcolumn="5">
<?php
$arwrk = $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_event_mainlevel->C_ACTIVE_LEVELSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event_mainlevel->C_ARRAY_TINBAI->Visible) { // C_ARRAY_TINBAI ?>
	<tr<?php echo $t_event_mainlevel->C_ARRAY_TINBAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_ARRAY_TINBAI->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_ARRAY_TINBAI->CellAttributes() ?>><span id="el_C_ARRAY_TINBAI">
<select style="width:700px" multiple="multiple" size="50"  class="x_FK_ARRAY_TINBAI" id="x_C_ARRAY_TINBAI[]" name="x_C_ARRAY_TINBAI[]" title="<?php echo $t_event_mainlevel->C_ARRAY_TINBAI->FldTitle() ?>" multiple="multiple"<?php echo $t_event_mainlevel->C_ARRAY_TINBAI->EditAttributes() ?>>
<?php
if (is_array($t_event_mainlevel->C_ARRAY_TINBAI->EditValue)) {
	$arwrk = $t_event_mainlevel->C_ARRAY_TINBAI->EditValue;
	$armultiwrk= explode(",", strval($t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = "";
		for ($ari = 0; $ari < count($armultiwrk); $ari++) {
			if (strval($arwrk[$rowcntwrk][0]) == trim(strval($armultiwrk[$ari]))) {
				$selwrk = " selected=\"selected\"";
				if ($selwrk <> "") $emptywrk = FALSE;
				break;
			}
		}	
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $t_event_mainlevel->C_ARRAY_TINBAI->CustomMsg ?></td>
	</tr>
<?php } ?>
 <?php if ($t_event_mainlevel->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_event_mainlevel->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event_mainlevel->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_event_mainlevel->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
<textarea name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_event_mainlevel->C_NOTE->FldTitle() ?>" cols="85" rows="2"<?php echo $t_event_mainlevel->C_NOTE->EditAttributes() ?>><?php echo $t_event_mainlevel->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_event_mainlevel->C_NOTE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_EVENT_MAINLEVEL" id="x_PK_EVENT_MAINLEVEL" value="<?php echo ew_HtmlEncode($t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_event_mainlevel_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_mainlevel_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_event_mainlevel';

	// Page object name
	var $PageObjName = 't_event_mainlevel_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) $PageUrl .= "t=" . $t_event_mainlevel->TableVar . "&"; // Add page token
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
		global $objForm, $t_event_mainlevel;
		if ($t_event_mainlevel->UseTokenInUrl) {
			if ($objForm)
				return ($t_event_mainlevel->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event_mainlevel->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_mainlevel_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event_mainlevel)
		$GLOBALS["t_event_mainlevel"] = new ct_event_mainlevel();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event_mainlevel', TRUE);

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
		global $t_event_mainlevel;

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
			$this->Page_Terminate("t_event_mainlevellist.php");
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
		global $objForm, $Language, $gsFormError, $t_event_mainlevel;

		// Load key from QueryString
		if (@$_GET["PK_EVENT_MAINLEVEL"] <> "")
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->setQueryStringValue($_GET["PK_EVENT_MAINLEVEL"]);
		if (@$_POST["a_edit"] <> "") {
			$t_event_mainlevel->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_event_mainlevel->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_event_mainlevel->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_event_mainlevel->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue == "")
			$this->Page_Terminate("t_event_mainlevellist.php"); // Invalid key, return to list
		switch ($t_event_mainlevel->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_event_mainlevellist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_event_mainlevel->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_event_mainlevel->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_event_mainlevelview.php")
						$sReturnUrl = $t_event_mainlevel->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_event_mainlevel->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_event_mainlevel->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_event_mainlevel;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_event_mainlevel;
		$t_event_mainlevel->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_event_mainlevel->C_EVENT_NAME->setFormValue($objForm->GetValue("x_C_EVENT_NAME"));
		$t_event_mainlevel->C_TYPE_EVENT->setFormValue($objForm->GetValue("x_C_TYPE_EVENT"));
		$t_event_mainlevel->C_POST->setFormValue($objForm->GetValue("x_C_POST"));
		$t_event_mainlevel->C_URL_IMAGES->setFormValue($objForm->GetValue("x_C_URL_IMAGES"));
		$t_event_mainlevel->C_URL_LINK->setFormValue($objForm->GetValue("x_C_URL_LINK"));
		$t_event_mainlevel->C_DATETIME_BEGIN->setFormValue($objForm->GetValue("x_C_DATETIME_BEGIN"));
		$t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue, 7);
		$t_event_mainlevel->C_DATETIME_END->setFormValue($objForm->GetValue("x_C_DATETIME_END"));
		$t_event_mainlevel->C_DATETIME_END->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_END->CurrentValue, 7);
		$t_event_mainlevel->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_event_mainlevel->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_ORDER->CurrentValue, 7);
		$t_event_mainlevel->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_event_mainlevel->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_event_mainlevel->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_event_mainlevel->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_ADD_TIME->CurrentValue, 7);
		$t_event_mainlevel->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_event_mainlevel->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_event_mainlevel->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_EDIT_TIME->CurrentValue, 7);
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->setFormValue($objForm->GetValue("x_C_ACTIVE_LEVELSITE"));
		$t_event_mainlevel->C_TIME_ACTIVE->setFormValue($objForm->GetValue("x_C_TIME_ACTIVE"));
		$t_event_mainlevel->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_TIME_ACTIVE->CurrentValue, 7);
		$t_event_mainlevel->C_TYPE_ACTIVE->setFormValue($objForm->GetValue("x_C_TYPE_ACTIVE"));
		$t_event_mainlevel->C_ARRAY_TINBAI->setFormValue($objForm->GetValue("x_C_ARRAY_TINBAI"));
		$t_event_mainlevel->PK_EVENT_MAINLEVEL->setFormValue($objForm->GetValue("x_PK_EVENT_MAINLEVEL"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_event_mainlevel;
		$t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue = $t_event_mainlevel->PK_EVENT_MAINLEVEL->FormValue;
		$this->LoadRow();
		$t_event_mainlevel->FK_CONGTY_ID->CurrentValue = $t_event_mainlevel->FK_CONGTY_ID->FormValue;
		$t_event_mainlevel->C_EVENT_NAME->CurrentValue = $t_event_mainlevel->C_EVENT_NAME->FormValue;
		$t_event_mainlevel->C_TYPE_EVENT->CurrentValue = $t_event_mainlevel->C_TYPE_EVENT->FormValue;
		$t_event_mainlevel->C_POST->CurrentValue = $t_event_mainlevel->C_POST->FormValue;
		$t_event_mainlevel->C_URL_IMAGES->CurrentValue = $t_event_mainlevel->C_URL_IMAGES->FormValue;
		$t_event_mainlevel->C_URL_LINK->CurrentValue = $t_event_mainlevel->C_URL_LINK->FormValue;
		$t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue = $t_event_mainlevel->C_DATETIME_BEGIN->FormValue;
		$t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue, 7);
		$t_event_mainlevel->C_DATETIME_END->CurrentValue = $t_event_mainlevel->C_DATETIME_END->FormValue;
		$t_event_mainlevel->C_DATETIME_END->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_END->CurrentValue, 7);
		$t_event_mainlevel->C_ORDER->CurrentValue = $t_event_mainlevel->C_ORDER->FormValue;
		$t_event_mainlevel->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_ORDER->CurrentValue, 7);
		$t_event_mainlevel->C_NOTE->CurrentValue = $t_event_mainlevel->C_NOTE->FormValue;
		$t_event_mainlevel->C_USER_ADD->CurrentValue = $t_event_mainlevel->C_USER_ADD->FormValue;
		$t_event_mainlevel->C_ADD_TIME->CurrentValue = $t_event_mainlevel->C_ADD_TIME->FormValue;
		$t_event_mainlevel->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_ADD_TIME->CurrentValue, 7);
		$t_event_mainlevel->C_USER_EDIT->CurrentValue = $t_event_mainlevel->C_USER_EDIT->FormValue;
		$t_event_mainlevel->C_EDIT_TIME->CurrentValue = $t_event_mainlevel->C_EDIT_TIME->FormValue;
		$t_event_mainlevel->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_EDIT_TIME->CurrentValue, 7);
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue = $t_event_mainlevel->C_ACTIVE_LEVELSITE->FormValue;
		$t_event_mainlevel->C_TIME_ACTIVE->CurrentValue = $t_event_mainlevel->C_TIME_ACTIVE->FormValue;
		$t_event_mainlevel->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_event_mainlevel->C_TIME_ACTIVE->CurrentValue, 7);
		$t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue = $t_event_mainlevel->C_TYPE_ACTIVE->FormValue;
		$t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue = $t_event_mainlevel->C_ARRAY_TINBAI->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event_mainlevel;
		$sFilter = $t_event_mainlevel->KeyFilter();

		// Call Row Selecting event
		$t_event_mainlevel->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event_mainlevel->CurrentFilter = $sFilter;
		$sSql = $t_event_mainlevel->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event_mainlevel->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event_mainlevel;
		$t_event_mainlevel->PK_EVENT_MAINLEVEL->setDbValue($rs->fields('PK_EVENT_MAINLEVEL'));
		$t_event_mainlevel->FK_EVENT_ID->setDbValue($rs->fields('FK_EVENT_ID'));
		$t_event_mainlevel->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_event_mainlevel->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$t_event_mainlevel->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$t_event_mainlevel->C_POST->setDbValue($rs->fields('C_POST'));
		$t_event_mainlevel->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$t_event_mainlevel->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$t_event_mainlevel->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$t_event_mainlevel->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$t_event_mainlevel->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_event_mainlevel->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_event_mainlevel->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_event_mainlevel->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_event_mainlevel->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_event_mainlevel->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$t_event_mainlevel->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_event_mainlevel->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$t_event_mainlevel->C_TYPE_ACTIVE->setDbValue($rs->fields('C_TYPE_ACTIVE'));
		$t_event_mainlevel->C_ARRAY_TINBAI->setDbValue($rs->fields('C_ARRAY_TINBAI'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event_mainlevel;

		// Initialize URLs
		// Call Row_Rendering event

		$t_event_mainlevel->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_event_mainlevel->FK_CONGTY_ID->CellCssStyle = ""; $t_event_mainlevel->FK_CONGTY_ID->CellCssClass = "";
		$t_event_mainlevel->FK_CONGTY_ID->CellAttrs = array(); $t_event_mainlevel->FK_CONGTY_ID->ViewAttrs = array(); $t_event_mainlevel->FK_CONGTY_ID->EditAttrs = array();

		// C_EVENT_NAME
		$t_event_mainlevel->C_EVENT_NAME->CellCssStyle = ""; $t_event_mainlevel->C_EVENT_NAME->CellCssClass = "";
		$t_event_mainlevel->C_EVENT_NAME->CellAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->ViewAttrs = array(); $t_event_mainlevel->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event_mainlevel->C_TYPE_EVENT->CellCssStyle = ""; $t_event_mainlevel->C_TYPE_EVENT->CellCssClass = "";
		$t_event_mainlevel->C_TYPE_EVENT->CellAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->ViewAttrs = array(); $t_event_mainlevel->C_TYPE_EVENT->EditAttrs = array();

		// C_POST
		$t_event_mainlevel->C_POST->CellCssStyle = ""; $t_event_mainlevel->C_POST->CellCssClass = "";
		$t_event_mainlevel->C_POST->CellAttrs = array(); $t_event_mainlevel->C_POST->ViewAttrs = array(); $t_event_mainlevel->C_POST->EditAttrs = array();

		// C_URL_IMAGES
		$t_event_mainlevel->C_URL_IMAGES->CellCssStyle = ""; $t_event_mainlevel->C_URL_IMAGES->CellCssClass = "";
		$t_event_mainlevel->C_URL_IMAGES->CellAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->ViewAttrs = array(); $t_event_mainlevel->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$t_event_mainlevel->C_URL_LINK->CellCssStyle = ""; $t_event_mainlevel->C_URL_LINK->CellCssClass = "";
		$t_event_mainlevel->C_URL_LINK->CellAttrs = array(); $t_event_mainlevel->C_URL_LINK->ViewAttrs = array(); $t_event_mainlevel->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event_mainlevel->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_BEGIN->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event_mainlevel->C_DATETIME_END->CellCssStyle = ""; $t_event_mainlevel->C_DATETIME_END->CellCssClass = "";
		$t_event_mainlevel->C_DATETIME_END->CellAttrs = array(); $t_event_mainlevel->C_DATETIME_END->ViewAttrs = array(); $t_event_mainlevel->C_DATETIME_END->EditAttrs = array();

		// C_ORDER
		$t_event_mainlevel->C_ORDER->CellCssStyle = ""; $t_event_mainlevel->C_ORDER->CellCssClass = "";
		$t_event_mainlevel->C_ORDER->CellAttrs = array(); $t_event_mainlevel->C_ORDER->ViewAttrs = array(); $t_event_mainlevel->C_ORDER->EditAttrs = array();

		// C_NOTE
		$t_event_mainlevel->C_NOTE->CellCssStyle = ""; $t_event_mainlevel->C_NOTE->CellCssClass = "";
		$t_event_mainlevel->C_NOTE->CellAttrs = array(); $t_event_mainlevel->C_NOTE->ViewAttrs = array(); $t_event_mainlevel->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_event_mainlevel->C_USER_ADD->CellCssStyle = ""; $t_event_mainlevel->C_USER_ADD->CellCssClass = "";
		$t_event_mainlevel->C_USER_ADD->CellAttrs = array(); $t_event_mainlevel->C_USER_ADD->ViewAttrs = array(); $t_event_mainlevel->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_event_mainlevel->C_ADD_TIME->CellCssStyle = ""; $t_event_mainlevel->C_ADD_TIME->CellCssClass = "";
		$t_event_mainlevel->C_ADD_TIME->CellAttrs = array(); $t_event_mainlevel->C_ADD_TIME->ViewAttrs = array(); $t_event_mainlevel->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_event_mainlevel->C_USER_EDIT->CellCssStyle = ""; $t_event_mainlevel->C_USER_EDIT->CellCssClass = "";
		$t_event_mainlevel->C_USER_EDIT->CellAttrs = array(); $t_event_mainlevel->C_USER_EDIT->ViewAttrs = array(); $t_event_mainlevel->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_event_mainlevel->C_EDIT_TIME->CellCssStyle = ""; $t_event_mainlevel->C_EDIT_TIME->CellCssClass = "";
		$t_event_mainlevel->C_EDIT_TIME->CellAttrs = array(); $t_event_mainlevel->C_EDIT_TIME->ViewAttrs = array(); $t_event_mainlevel->C_EDIT_TIME->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event_mainlevel->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event_mainlevel->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event_mainlevel->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_event_mainlevel->C_TIME_ACTIVE->CellCssStyle = ""; $t_event_mainlevel->C_TIME_ACTIVE->CellCssClass = "";
		$t_event_mainlevel->C_TIME_ACTIVE->CellAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->ViewAttrs = array(); $t_event_mainlevel->C_TIME_ACTIVE->EditAttrs = array();

		// C_TYPE_ACTIVE
		$t_event_mainlevel->C_TYPE_ACTIVE->CellCssStyle = ""; $t_event_mainlevel->C_TYPE_ACTIVE->CellCssClass = "";
		$t_event_mainlevel->C_TYPE_ACTIVE->CellAttrs = array(); $t_event_mainlevel->C_TYPE_ACTIVE->ViewAttrs = array(); $t_event_mainlevel->C_TYPE_ACTIVE->EditAttrs = array();

		// C_ARRAY_TINBAI
		$t_event_mainlevel->C_ARRAY_TINBAI->CellCssStyle = ""; $t_event_mainlevel->C_ARRAY_TINBAI->CellCssClass = "";
		$t_event_mainlevel->C_ARRAY_TINBAI->CellAttrs = array(); $t_event_mainlevel->C_ARRAY_TINBAI->ViewAttrs = array(); $t_event_mainlevel->C_ARRAY_TINBAI->EditAttrs = array();
		if ($t_event_mainlevel->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_EVENT_MAINLEVEL
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewValue = $t_event_mainlevel->PK_EVENT_MAINLEVEL->CurrentValue;
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssStyle = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->CssClass = "";
			$t_event_mainlevel->PK_EVENT_MAINLEVEL->ViewCustomAttributes = "";

			// FK_EVENT_ID
			$t_event_mainlevel->FK_EVENT_ID->ViewValue = $t_event_mainlevel->FK_EVENT_ID->CurrentValue;
			$t_event_mainlevel->FK_EVENT_ID->CssStyle = "";
			$t_event_mainlevel->FK_EVENT_ID->CssClass = "";
			$t_event_mainlevel->FK_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
			if (strval($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_ID->ViewValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_ID->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_ID->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->ViewValue = $t_event_mainlevel->C_EVENT_NAME->CurrentValue;
			$t_event_mainlevel->C_EVENT_NAME->CssStyle = "";
			$t_event_mainlevel->C_EVENT_NAME->CssClass = "";
			$t_event_mainlevel->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su kien popup";
						break;
					case "2":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Loai su lien theo bai viet";
						break;
					case "3":
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = "Laoi su kien lien ket";
						break;
					default:
						$t_event_mainlevel->C_TYPE_EVENT->ViewValue = $t_event_mainlevel->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event_mainlevel->C_TYPE_EVENT->CssStyle = "";
			$t_event_mainlevel->C_TYPE_EVENT->CssClass = "";
			$t_event_mainlevel->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event_mainlevel->C_POST->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_POST->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event_mainlevel->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event_mainlevel->C_POST->ViewValue = "";
						break;
					default:
						$t_event_mainlevel->C_POST->ViewValue = $t_event_mainlevel->C_POST->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_POST->ViewValue = NULL;
			}
			$t_event_mainlevel->C_POST->CssStyle = "";
			$t_event_mainlevel->C_POST->CssClass = "";
			$t_event_mainlevel->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->ViewValue = $t_event_mainlevel->C_URL_IMAGES->CurrentValue;
			$t_event_mainlevel->C_URL_IMAGES->CssStyle = "";
			$t_event_mainlevel->C_URL_IMAGES->CssClass = "";
			$t_event_mainlevel->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->ViewValue = $t_event_mainlevel->C_URL_LINK->CurrentValue;
			$t_event_mainlevel->C_URL_LINK->CssStyle = "";
			$t_event_mainlevel->C_URL_LINK->CssClass = "";
			$t_event_mainlevel->C_URL_LINK->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = $t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue;
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_BEGIN->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->CssClass = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->ViewValue = $t_event_mainlevel->C_DATETIME_END->CurrentValue;
			$t_event_mainlevel->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_DATETIME_END->ViewValue, 7);
			$t_event_mainlevel->C_DATETIME_END->CssStyle = "";
			$t_event_mainlevel->C_DATETIME_END->CssClass = "";
			$t_event_mainlevel->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->ViewValue = $t_event_mainlevel->C_ORDER->CurrentValue;
			$t_event_mainlevel->C_ORDER->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ORDER->ViewValue, 7);
			$t_event_mainlevel->C_ORDER->CssStyle = "";
			$t_event_mainlevel->C_ORDER->CssClass = "";
			$t_event_mainlevel->C_ORDER->ViewCustomAttributes = "";

			// C_NOTE
			$t_event_mainlevel->C_NOTE->ViewValue = $t_event_mainlevel->C_NOTE->CurrentValue;
			$t_event_mainlevel->C_NOTE->CssStyle = "";
			$t_event_mainlevel->C_NOTE->CssClass = "";
			$t_event_mainlevel->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->ViewValue = $t_event_mainlevel->C_USER_ADD->CurrentValue;
			$t_event_mainlevel->C_USER_ADD->CssStyle = "";
			$t_event_mainlevel->C_USER_ADD->CssClass = "";
			$t_event_mainlevel->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->ViewValue = $t_event_mainlevel->C_ADD_TIME->CurrentValue;
			$t_event_mainlevel->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_ADD_TIME->ViewValue, 7);
			$t_event_mainlevel->C_ADD_TIME->CssStyle = "";
			$t_event_mainlevel->C_ADD_TIME->CssClass = "";
			$t_event_mainlevel->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->ViewValue = $t_event_mainlevel->C_USER_EDIT->CurrentValue;
			$t_event_mainlevel->C_USER_EDIT->CssStyle = "";
			$t_event_mainlevel->C_USER_EDIT->CssClass = "";
			$t_event_mainlevel->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = $t_event_mainlevel->C_EDIT_TIME->CurrentValue;
			$t_event_mainlevel->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_EDIT_TIME->ViewValue, 7);
			$t_event_mainlevel->C_EDIT_TIME->CssStyle = "";
			$t_event_mainlevel->C_EDIT_TIME->CssClass = "";
			$t_event_mainlevel->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
						break;
					default:
						$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = $t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = $t_event_mainlevel->C_TIME_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event_mainlevel->C_TIME_ACTIVE->ViewValue, 7);
			$t_event_mainlevel->C_TIME_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TIME_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// FK_CONGTY_SEND
			if (strval($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_SEND->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = $t_event_mainlevel->FK_CONGTY_SEND->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_SEND->ViewValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_SEND->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_SEND->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_SEND->ViewCustomAttributes = "";

			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewValue = $t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue;
			$t_event_mainlevel->C_TYPE_ACTIVE->CssStyle = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->CssClass = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->ViewCustomAttributes = "";

			// C_ARRAY_TINBAI
			if (strval($t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TITLE` FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event_mainlevel->C_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event_mainlevel->C_ARRAY_TINBAI->CssStyle = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->CssClass = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_event_mainlevel->FK_CONGTY_ID->HrefValue = "";
			$t_event_mainlevel->FK_CONGTY_ID->TooltipValue = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->HrefValue = "";
			$t_event_mainlevel->C_EVENT_NAME->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event_mainlevel->C_TYPE_EVENT->HrefValue = "";
			$t_event_mainlevel->C_TYPE_EVENT->TooltipValue = "";

			// C_POST
			$t_event_mainlevel->C_POST->HrefValue = "";
			$t_event_mainlevel->C_POST->TooltipValue = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->HrefValue = "";
			$t_event_mainlevel->C_URL_IMAGES->TooltipValue = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->HrefValue = "";
			$t_event_mainlevel->C_URL_LINK->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->HrefValue = "";
			$t_event_mainlevel->C_DATETIME_END->TooltipValue = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->HrefValue = "";
			$t_event_mainlevel->C_ORDER->TooltipValue = "";

			// C_NOTE
			$t_event_mainlevel->C_NOTE->HrefValue = "";
			$t_event_mainlevel->C_NOTE->TooltipValue = "";

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->HrefValue = "";
			$t_event_mainlevel->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->HrefValue = "";
			$t_event_mainlevel->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->HrefValue = "";
			$t_event_mainlevel->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->HrefValue = "";
			$t_event_mainlevel->C_EDIT_TIME->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->HrefValue = "";
			$t_event_mainlevel->C_TIME_ACTIVE->TooltipValue = "";

			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->HrefValue = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->TooltipValue = "";

			// C_ARRAY_TINBAI
			$t_event_mainlevel->C_ARRAY_TINBAI->HrefValue = "";
			$t_event_mainlevel->C_ARRAY_TINBAI->TooltipValue = "";
		} elseif ($t_event_mainlevel->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY_ID
			$t_event_mainlevel->FK_CONGTY_ID->EditCustomAttributes = "";
			$t_event_mainlevel->FK_CONGTY_ID->EditValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
			if (strval($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event_mainlevel->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event_mainlevel->FK_CONGTY_ID->EditValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event_mainlevel->FK_CONGTY_ID->EditValue = $t_event_mainlevel->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event_mainlevel->FK_CONGTY_ID->EditValue = NULL;
			}
			$t_event_mainlevel->FK_CONGTY_ID->CssStyle = "";
			$t_event_mainlevel->FK_CONGTY_ID->CssClass = "";
			$t_event_mainlevel->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->EditCustomAttributes = "";
			$t_event_mainlevel->C_EVENT_NAME->EditValue = $t_event_mainlevel->C_EVENT_NAME->CurrentValue;
			$t_event_mainlevel->C_EVENT_NAME->CssStyle = "";
			$t_event_mainlevel->C_EVENT_NAME->CssClass = "";
			$t_event_mainlevel->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			$t_event_mainlevel->C_TYPE_EVENT->EditCustomAttributes = "";
			if (strval($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_TYPE_EVENT->EditValue = "Loai su kien popup";
						break;
					case "2":
						$t_event_mainlevel->C_TYPE_EVENT->EditValue = "Loai su lien theo bai viet";
						break;
					case "3":
						$t_event_mainlevel->C_TYPE_EVENT->EditValue = "Laoi su kien lien ket";
						break;
					default:
						$t_event_mainlevel->C_TYPE_EVENT->EditValue = $t_event_mainlevel->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_TYPE_EVENT->EditValue = NULL;
			}
			$t_event_mainlevel->C_TYPE_EVENT->CssStyle = "";
			$t_event_mainlevel->C_TYPE_EVENT->CssClass = "";
			$t_event_mainlevel->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			$t_event_mainlevel->C_POST->EditCustomAttributes = "";
			if (strval($t_event_mainlevel->C_POST->CurrentValue) <> "") {
				switch ($t_event_mainlevel->C_POST->CurrentValue) {
					case "1":
						$t_event_mainlevel->C_POST->EditValue = "trang chu";
						break;
					case "2":
						$t_event_mainlevel->C_POST->EditValue = "trang tuyen sinh";
						break;
					case "":
						$t_event_mainlevel->C_POST->EditValue = "";
						break;
					default:
						$t_event_mainlevel->C_POST->EditValue = $t_event_mainlevel->C_POST->CurrentValue;
				}
			} else {
				$t_event_mainlevel->C_POST->EditValue = NULL;
			}
			$t_event_mainlevel->C_POST->CssStyle = "";
			$t_event_mainlevel->C_POST->CssClass = "";
			$t_event_mainlevel->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->EditCustomAttributes = "";
			$t_event_mainlevel->C_URL_IMAGES->EditValue = $t_event_mainlevel->C_URL_IMAGES->CurrentValue;
			$t_event_mainlevel->C_URL_IMAGES->CssStyle = "";
			$t_event_mainlevel->C_URL_IMAGES->CssClass = "";
			$t_event_mainlevel->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->EditCustomAttributes = "";
			$t_event_mainlevel->C_URL_LINK->EditValue = ew_HtmlEncode($t_event_mainlevel->C_URL_LINK->CurrentValue);

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->EditCustomAttributes = "";
			$t_event_mainlevel->C_DATETIME_BEGIN->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue, 7));

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->EditCustomAttributes = "";
			$t_event_mainlevel->C_DATETIME_END->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event_mainlevel->C_DATETIME_END->CurrentValue, 7));

			// C_ORDER
			$t_event_mainlevel->C_ORDER->EditCustomAttributes = "";
			$t_event_mainlevel->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event_mainlevel->C_ORDER->CurrentValue, 7));

			// C_NOTE
			$t_event_mainlevel->C_NOTE->EditCustomAttributes = "";
			$t_event_mainlevel->C_NOTE->EditValue = ew_HtmlEncode($t_event_mainlevel->C_NOTE->CurrentValue);

			// C_USER_ADD
			// C_ADD_TIME
			// C_USER_EDIT
			// C_EDIT_TIME
			// C_ACTIVE_LEVELSITE

			$t_event_mainlevel->C_ACTIVE_LEVELSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat");
			$arwrk[] = array("1", "Kich hoat");
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->EditValue = $arwrk;

			// C_TIME_ACTIVE
			// C_TYPE_ACTIVE

			$t_event_mainlevel->C_TYPE_ACTIVE->EditCustomAttributes = "";
			$t_event_mainlevel->C_TYPE_ACTIVE->EditValue = ew_HtmlEncode($t_event_mainlevel->C_TYPE_ACTIVE->CurrentValue);

			// C_ARRAY_TINBAI
			$t_event_mainlevel->C_ARRAY_TINBAI->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "
                                SELECT DISTINCT(t_tinbai_mainlevel.PK_TINBAI_ID), t_tinbai_levelsite.C_TITLE,`t_tinbai_mainlevel`.`C_ORDER`
                                FROM t_tinbai_mainlevel 
                                INNER JOIN t_tinbai_levelsite ON t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID 
                        ";
			$sWhereWrk = "(t_tinbai_mainlevel.FK_CONGTY=".$Security->CurrentUserOption().") AND (t_tinbai_mainlevel.`C_ORDER` > 0) ORDER BY t_tinbai_mainlevel.C_ORDER DESC";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_event_mainlevel->C_ARRAY_TINBAI->EditValue = $arwrk;

			// Edit refer script
			// FK_CONGTY_ID

			$t_event_mainlevel->FK_CONGTY_ID->HrefValue = "";

			// C_EVENT_NAME
			$t_event_mainlevel->C_EVENT_NAME->HrefValue = "";

			// C_TYPE_EVENT
			$t_event_mainlevel->C_TYPE_EVENT->HrefValue = "";

			// C_POST
			$t_event_mainlevel->C_POST->HrefValue = "";

			// C_URL_IMAGES
			$t_event_mainlevel->C_URL_IMAGES->HrefValue = "";

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->HrefValue = "";

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->HrefValue = "";

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->HrefValue = "";

			// C_ORDER
			$t_event_mainlevel->C_ORDER->HrefValue = "";

			// C_NOTE
			$t_event_mainlevel->C_NOTE->HrefValue = "";

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->HrefValue = "";

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->HrefValue = "";

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->HrefValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->HrefValue = "";

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->HrefValue = "";

			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->HrefValue = "";

			// C_ARRAY_TINBAI
			$t_event_mainlevel->C_ARRAY_TINBAI->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_event_mainlevel->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event_mainlevel->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_event_mainlevel;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_event_mainlevel->C_URL_LINK->FormValue) && $t_event_mainlevel->C_URL_LINK->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_event_mainlevel->C_URL_LINK->FldCaption();
		}
		if (!is_null($t_event_mainlevel->C_DATETIME_BEGIN->FormValue) && $t_event_mainlevel->C_DATETIME_BEGIN->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_event_mainlevel->C_DATETIME_BEGIN->FldCaption();
		}
		if (!ew_CheckEuroDate($t_event_mainlevel->C_DATETIME_BEGIN->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_event_mainlevel->C_DATETIME_BEGIN->FldErrMsg();
		}
		if (!is_null($t_event_mainlevel->C_DATETIME_END->FormValue) && $t_event_mainlevel->C_DATETIME_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_event_mainlevel->C_DATETIME_END->FldCaption();
		}
		if (!ew_CheckEuroDate($t_event_mainlevel->C_DATETIME_END->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_event_mainlevel->C_DATETIME_END->FldErrMsg();
		}
		if (!is_null($t_event_mainlevel->C_ORDER->FormValue) && $t_event_mainlevel->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_event_mainlevel->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_event_mainlevel->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_event_mainlevel->C_ORDER->FldErrMsg();
		}
		if (!ew_CheckInteger($t_event_mainlevel->C_TYPE_ACTIVE->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_event_mainlevel->C_TYPE_ACTIVE->FldErrMsg();
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
		global $conn, $Security, $Language, $t_event_mainlevel;
		$sFilter = $t_event_mainlevel->KeyFilter();
		$t_event_mainlevel->CurrentFilter = $sFilter;
		$sSql = $t_event_mainlevel->SQL();
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

			// C_URL_LINK
			$t_event_mainlevel->C_URL_LINK->SetDbValueDef($rsnew, $t_event_mainlevel->C_URL_LINK->CurrentValue, NULL, FALSE);

			// C_DATETIME_BEGIN
			$t_event_mainlevel->C_DATETIME_BEGIN->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_BEGIN->CurrentValue, 7, FALSE), NULL);

			// C_DATETIME_END
			$t_event_mainlevel->C_DATETIME_END->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event_mainlevel->C_DATETIME_END->CurrentValue, 7, FALSE), NULL);

			// C_ORDER
			$t_event_mainlevel->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event_mainlevel->C_ORDER->CurrentValue, 7, FALSE), NULL);

			// C_NOTE
			$t_event_mainlevel->C_NOTE->SetDbValueDef($rsnew, $t_event_mainlevel->C_NOTE->CurrentValue, NULL, FALSE);

			// C_USER_ADD
			$t_event_mainlevel->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_ADD'] =& $t_event_mainlevel->C_USER_ADD->DbValue;

			// C_ADD_TIME
			$t_event_mainlevel->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_ADD_TIME'] =& $t_event_mainlevel->C_ADD_TIME->DbValue;

			// C_USER_EDIT
			$t_event_mainlevel->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_event_mainlevel->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_event_mainlevel->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_event_mainlevel->C_EDIT_TIME->DbValue;

			// C_ACTIVE_LEVELSITE
			$t_event_mainlevel->C_ACTIVE_LEVELSITE->SetDbValueDef($rsnew, $t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue, NULL, FALSE);

			// C_TIME_ACTIVE
			$t_event_mainlevel->C_TIME_ACTIVE->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_TIME_ACTIVE'] =& $t_event_mainlevel->C_TIME_ACTIVE->DbValue;
                        if ($t_event_mainlevel->C_ACTIVE_LEVELSITE->CurrentValue == 1)
                        {
			// C_TYPE_ACTIVE
			$t_event_mainlevel->C_TYPE_ACTIVE->SetDbValueDef($rsnew, 1, NULL, FALSE);
                        }
                        else 
                        {
                         $t_event_mainlevel->C_TYPE_ACTIVE->SetDbValueDef($rsnew,2, NULL, FALSE); 
                        }    
			// C_ARRAY_TINBAI
			$t_event_mainlevel->C_ARRAY_TINBAI->SetDbValueDef($rsnew, $t_event_mainlevel->C_ARRAY_TINBAI->CurrentValue, NULL, FALSE);

			// Call Row Updating event
			$bUpdateRow = $t_event_mainlevel->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_event_mainlevel->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_event_mainlevel->CancelMessage <> "") {
					$this->setMessage($t_event_mainlevel->CancelMessage);
					$t_event_mainlevel->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_event_mainlevel->Row_Updated($rsold, $rsnew);
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
