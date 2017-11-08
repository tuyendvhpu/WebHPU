<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_linkadinfo.php" ?>
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
$t_linkad_add = new ct_linkad_add();
$Page =& $t_linkad_add;

// Page init
$t_linkad_add->Page_Init();

// Page main
$t_linkad_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_linkad_add = new ew_Page("t_linkad_add");

// page properties
t_linkad_add.PageID = "add"; // page ID
t_linkad_add.FormID = "ft_linkadadd"; // form ID
var EW_PAGE_ID = t_linkad_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_linkad_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_LINKAD_NAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_LINKAD_NAME->FldCaption()) ?>");
                
                elm = fobj.elements["x" + infix + "_C_LINKAD_DES"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_LINKAD_DES->FldCaption()) ?>");
                 
		elm = fobj.elements["x" + infix + "_C_LINKAD_URL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_LINKAD_URL->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_LINKAD_POS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_LINKAD_POS->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_SEND_MAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_SEND_MAIL->FldCaption()) ?>");
                radioValue = checkRadio(fobj.x_C_SEND_MAIL);
                if (radioValue == 1)
                 {
                     elm = fobj.elements["x" + infix + "_C_IMG_SOURCE"];
		        if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_IMG_SOURCE->FldCaption()) ?>");
                 }
             
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_linkad->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_linkad->C_ORDER->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_linkad_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_linkad_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_linkad_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_linkad_add.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php echo $t_linkad->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker">
<a href="<?php echo $t_linkad->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_linkad_add->ShowMessage();
?>
<form name="ft_linkadadd" id="ft_linkadadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_linkad_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_linkad">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_linkad->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_linkad->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->FK_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_linkad->FK_CONGTY->CellAttributes() ?>><span id="el_FK_CONGTY">
<select id="x_FK_CONGTY" name="x_FK_CONGTY" title="<?php echo $t_linkad->FK_CONGTY->FldTitle() ?>"<?php echo $t_linkad->FK_CONGTY->EditAttributes() ?>>
<?php
if (is_array($t_linkad->FK_CONGTY->EditValue)) {
	$arwrk = $t_linkad->FK_CONGTY->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($Security->CurrentUserOption()) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_linkad->FK_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_NAME->Visible) { // C_LINKAD_NAME ?>
	<tr<?php echo $t_linkad->C_LINKAD_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_LINKAD_NAME->CellAttributes() ?>><span id="el_C_LINKAD_NAME">
<input type="text" name="x_C_LINKAD_NAME" id="x_C_LINKAD_NAME" title="<?php echo $t_linkad->C_LINKAD_NAME->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_linkad->C_LINKAD_NAME->EditValue ?>"<?php echo $t_linkad->C_LINKAD_NAME->EditAttributes() ?>>
</span><?php echo $t_linkad->C_LINKAD_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_DES->Visible) { // C_LINKAD_DES ?>
	<tr<?php echo $t_linkad->C_LINKAD_DES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_DES->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_LINKAD_DES->CellAttributes() ?>><span id="el_C_LINKAD_DES">
<textarea name="x_C_LINKAD_DES" id="x_C_LINKAD_DES" title="<?php echo $t_linkad->C_LINKAD_DES->FldTitle() ?>" cols="66" rows="1" <?php echo $t_linkad->C_LINKAD_DES->EditAttributes() ?>><?php echo $t_linkad->C_LINKAD_DES->EditValue ?></textarea>

</span><?php echo $t_linkad->C_LINKAD_DES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_TYPE->Visible) { // C_LINKAD_TYPE ?>
	<tr<?php echo $t_linkad->C_LINKAD_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_TYPE->FldCaption() ?></td>
		<td<?php echo $t_linkad->C_LINKAD_TYPE->CellAttributes() ?>><span id="el_C_LINKAD_TYPE">
<div id="tp_x_C_LINKAD_TYPE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_LINKAD_TYPE" id="x_C_LINKAD_TYPE" title="<?php echo $t_linkad->C_LINKAD_TYPE->FldTitle() ?>" value="{value}"<?php echo $t_linkad->C_LINKAD_TYPE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_LINKAD_TYPE" repeatcolumn="5">
<?php
$arwrk = $t_linkad->C_LINKAD_TYPE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_linkad->C_LINKAD_TYPE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_LINKAD_TYPE" id="x_C_LINKAD_TYPE" title="<?php echo $t_linkad->C_LINKAD_TYPE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_linkad->C_LINKAD_TYPE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_linkad->C_LINKAD_TYPE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_POS->Visible) { // C_LINKAD_POS ?>
	<tr<?php echo $t_linkad->C_LINKAD_POS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_POS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_LINKAD_POS->CellAttributes() ?>><span id="el_C_LINKAD_POS">
<div id="tp_x_C_LINKAD_POS" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_LINKAD_POS" id="x_C_LINKAD_POS" title="<?php echo $t_linkad->C_LINKAD_POS->FldTitle() ?>" value="{value}"<?php echo $t_linkad->C_LINKAD_POS->EditAttributes() ?>></label></div>
<div id="dsl_x_C_LINKAD_POS" repeatcolumn="5">
<?php
$arwrk = $t_linkad->C_LINKAD_POS->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_linkad->C_LINKAD_POS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_LINKAD_POS" id="x_C_LINKAD_POS" title="<?php echo $t_linkad->C_LINKAD_POS->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_linkad->C_LINKAD_POS->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_linkad->C_LINKAD_POS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_URL->Visible) { // C_LINKAD_URL ?>
	<tr<?php echo $t_linkad->C_LINKAD_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_URL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_LINKAD_URL->CellAttributes() ?>><span id="el_C_LINKAD_URL">
<input type="text" name="x_C_LINKAD_URL" id="x_C_LINKAD_URL" title="<?php echo $t_linkad->C_LINKAD_URL->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_linkad->C_LINKAD_URL->EditValue ?>"<?php echo $t_linkad->C_LINKAD_URL->EditAttributes() ?>>
</span><?php echo $t_linkad->C_LINKAD_URL->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_linkad->C_SEND_MAIL->Visible) { // C_SEND_MAIL ?>
	<tr<?php echo $t_linkad->C_SEND_MAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_SEND_MAIL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_SEND_MAIL->CellAttributes() ?>><span id="el_C_SEND_MAIL">
<div id="tp_x_C_SEND_MAIL" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_SEND_MAIL" id="x_C_SEND_MAIL" title="<?php echo $t_linkad->C_SEND_MAIL->FldTitle() ?>" value="{value}"<?php echo $t_linkad->C_SEND_MAIL->EditAttributes() ?>></label></div>
<div id="dsl_x_C_SEND_MAIL" repeatcolumn="5">
<?php
$arwrk = $t_linkad->C_SEND_MAIL->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_linkad->C_SEND_MAIL->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_SEND_MAIL" id="x_C_SEND_MAIL" title="<?php echo $t_linkad->C_SEND_MAIL->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_linkad->C_SEND_MAIL->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
<br/>
 <span style="color:#FF0000;font-style: italic"> - Khi bạn chọn xác nhận hệ thống sẽ tự động gửi Mail tới bộ phận thiết kế để thiết kế hình ảnh nổi bật cho nội dung của bạn. 
    <br/> - Sau 60 phút  bạn không nhận được phản hổi của bộ phận thiết kế qua Mail của bạn xin liên hệ Quản Trị Mạng - ĐT:0936821821 để được hỗ trợ tốt nhất.
   </span>
</div>
</span><?php echo $t_linkad->C_SEND_MAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_IMG_SOURCE->Visible) { // C_IMG_SOURCE ?>
	<tr<?php echo $t_linkad->C_IMG_SOURCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_IMG_SOURCE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_IMG_SOURCE->CellAttributes() ?>><span id="el_C_IMG_SOURCE">
<input type="text" name="x_C_IMG_SOURCE" id="x_C_IMG_SOURCE" title="<?php echo $t_linkad->C_IMG_SOURCE->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_linkad->C_IMG_SOURCE->EditValue ?>"<?php echo $t_linkad->C_IMG_SOURCE->EditAttributes() ?>>
</span><?php echo $t_linkad->C_IMG_SOURCE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_LINKAD_ACTIVE->Visible) { // C_LINKAD_ACTIVE ?>
	<tr<?php echo $t_linkad->C_LINKAD_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_LINKAD_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_linkad->C_LINKAD_ACTIVE->CellAttributes() ?>><span id="el_C_LINKAD_ACTIVE">
<div id="tp_x_C_LINKAD_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_LINKAD_ACTIVE" id="x_C_LINKAD_ACTIVE" title="<?php echo $t_linkad->C_LINKAD_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_linkad->C_LINKAD_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_LINKAD_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_linkad->C_LINKAD_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_linkad->C_LINKAD_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_LINKAD_ACTIVE" id="x_C_LINKAD_ACTIVE" title="<?php echo $t_linkad->C_LINKAD_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_linkad->C_LINKAD_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_linkad->C_LINKAD_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_linkad->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_linkad->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_linkad->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_linkad->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_linkad->C_ORDER->FldTitle() ?>" value="<?php echo $t_linkad->C_ORDER->EditValue ?>"<?php echo $t_linkad->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER" // button id
});
</script> 
                    </span><?php echo $t_linkad->C_ORDER->CustomMsg ?></td>
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
$t_linkad_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_linkad_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_linkad';

	// Page object name
	var $PageObjName = 't_linkad_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_linkad;
		if ($t_linkad->UseTokenInUrl) $PageUrl .= "t=" . $t_linkad->TableVar . "&"; // Add page token
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
		global $objForm, $t_linkad;
		if ($t_linkad->UseTokenInUrl) {
			if ($objForm)
				return ($t_linkad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_linkad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_linkad_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_linkad)
		$GLOBALS["t_linkad"] = new ct_linkad();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_linkad', TRUE);

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
		global $t_linkad;

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
			$this->Page_Terminate("t_linkadlist.php");
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
		global $objForm, $Language, $gsFormError, $t_linkad;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["C_LINKAD_ID"] != "") {
		  $t_linkad->C_LINKAD_ID->setQueryStringValue($_GET["C_LINKAD_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_linkad->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_linkad->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_linkad->CurrentAction = "C"; // Copy record
		  } else {
		    $t_linkad->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_linkad->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_linkadlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_linkad->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_linkad->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_linkadview.php")
						$sReturnUrl = $t_linkad->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_linkad->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_linkad;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_linkad;
		$t_linkad->C_LINKAD_TYPE->CurrentValue = 1;
		$t_linkad->C_LINKAD_POS->CurrentValue = 1;
		$t_linkad->C_SEND_MAIL->CurrentValue = 0;
		$t_linkad->C_LINKAD_ACTIVE->CurrentValue = 1;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_linkad;
		$t_linkad->C_LINKAD_NAME->setFormValue($objForm->GetValue("x_C_LINKAD_NAME"));
		$t_linkad->C_LINKAD_DES->setFormValue($objForm->GetValue("x_C_LINKAD_DES"));
		$t_linkad->C_LINKAD_TYPE->setFormValue($objForm->GetValue("x_C_LINKAD_TYPE"));
		$t_linkad->C_LINKAD_URL->setFormValue($objForm->GetValue("x_C_LINKAD_URL"));
		$t_linkad->C_LINKAD_POS->setFormValue($objForm->GetValue("x_C_LINKAD_POS"));
		$t_linkad->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_linkad->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_linkad->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_linkad->C_ADD_TIME->CurrentValue, 7);
		$t_linkad->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_linkad->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_linkad->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_linkad->C_EDIT_TIME->CurrentValue, 7);
		$t_linkad->C_SEND_MAIL->setFormValue($objForm->GetValue("x_C_SEND_MAIL"));
		$t_linkad->C_IMG_SOURCE->setFormValue($objForm->GetValue("x_C_IMG_SOURCE"));
		$t_linkad->C_LINKAD_ACTIVE->setFormValue($objForm->GetValue("x_C_LINKAD_ACTIVE"));
		$t_linkad->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_linkad->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_linkad->C_ORDER->CurrentValue, 7);
		$t_linkad->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_linkad->C_LINKAD_ID->setFormValue($objForm->GetValue("x_C_LINKAD_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_linkad;
		$t_linkad->C_LINKAD_ID->CurrentValue = $t_linkad->C_LINKAD_ID->FormValue;
		$t_linkad->C_LINKAD_NAME->CurrentValue = $t_linkad->C_LINKAD_NAME->FormValue;
		$t_linkad->C_LINKAD_DES->CurrentValue = $t_linkad->C_LINKAD_DES->FormValue;
		$t_linkad->C_LINKAD_TYPE->CurrentValue = $t_linkad->C_LINKAD_TYPE->FormValue;
		$t_linkad->C_LINKAD_URL->CurrentValue = $t_linkad->C_LINKAD_URL->FormValue;
		$t_linkad->C_LINKAD_POS->CurrentValue = $t_linkad->C_LINKAD_POS->FormValue;
		$t_linkad->C_USER_ADD->CurrentValue = $t_linkad->C_USER_ADD->FormValue;
		$t_linkad->C_ADD_TIME->CurrentValue = $t_linkad->C_ADD_TIME->FormValue;
		$t_linkad->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_linkad->C_ADD_TIME->CurrentValue, 7);
		$t_linkad->C_USER_EDIT->CurrentValue = $t_linkad->C_USER_EDIT->FormValue;
		$t_linkad->C_EDIT_TIME->CurrentValue = $t_linkad->C_EDIT_TIME->FormValue;
		$t_linkad->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_linkad->C_EDIT_TIME->CurrentValue, 7);
		$t_linkad->C_SEND_MAIL->CurrentValue = $t_linkad->C_SEND_MAIL->FormValue;
		$t_linkad->C_IMG_SOURCE->CurrentValue = $t_linkad->C_IMG_SOURCE->FormValue;
		$t_linkad->C_LINKAD_ACTIVE->CurrentValue = $t_linkad->C_LINKAD_ACTIVE->FormValue;
		$t_linkad->C_ORDER->CurrentValue = $t_linkad->C_ORDER->FormValue;
		$t_linkad->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_linkad->C_ORDER->CurrentValue, 7);
		$t_linkad->FK_CONGTY->CurrentValue = $t_linkad->FK_CONGTY->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_linkad;
		$sFilter = $t_linkad->KeyFilter();

		// Call Row Selecting event
		$t_linkad->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_linkad->CurrentFilter = $sFilter;
		$sSql = $t_linkad->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_linkad->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_linkad;
		$t_linkad->C_LINKAD_ID->setDbValue($rs->fields('C_LINKAD_ID'));
		$t_linkad->C_LINKAD_NAME->setDbValue($rs->fields('C_LINKAD_NAME'));
		$t_linkad->C_LINKAD_DES->setDbValue($rs->fields('C_LINKAD_DES'));
		$t_linkad->C_LINKAD_TYPE->setDbValue($rs->fields('C_LINKAD_TYPE'));
		$t_linkad->C_LINKAD_URL->setDbValue($rs->fields('C_LINKAD_URL'));
		$t_linkad->C_LINKAD_POS->setDbValue($rs->fields('C_LINKAD_POS'));
		$t_linkad->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_linkad->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_linkad->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_linkad->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_linkad->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_linkad->C_IMG_SOURCE->setDbValue($rs->fields('C_IMG_SOURCE'));
		$t_linkad->C_LINKAD_ACTIVE->setDbValue($rs->fields('C_LINKAD_ACTIVE'));
		$t_linkad->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_linkad->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_linkad;

		// Initialize URLs
		// Call Row_Rendering event

		$t_linkad->Row_Rendering();

		// Common render codes for all row types
		// C_LINKAD_NAME

		$t_linkad->C_LINKAD_NAME->CellCssStyle = ""; $t_linkad->C_LINKAD_NAME->CellCssClass = "";
		$t_linkad->C_LINKAD_NAME->CellAttrs = array(); $t_linkad->C_LINKAD_NAME->ViewAttrs = array(); $t_linkad->C_LINKAD_NAME->EditAttrs = array();

		// C_LINKAD_DES
		$t_linkad->C_LINKAD_DES->CellCssStyle = ""; $t_linkad->C_LINKAD_DES->CellCssClass = "";
		$t_linkad->C_LINKAD_DES->CellAttrs = array(); $t_linkad->C_LINKAD_DES->ViewAttrs = array(); $t_linkad->C_LINKAD_DES->EditAttrs = array();

		// C_LINKAD_TYPE
		$t_linkad->C_LINKAD_TYPE->CellCssStyle = ""; $t_linkad->C_LINKAD_TYPE->CellCssClass = "";
		$t_linkad->C_LINKAD_TYPE->CellAttrs = array(); $t_linkad->C_LINKAD_TYPE->ViewAttrs = array(); $t_linkad->C_LINKAD_TYPE->EditAttrs = array();

		// C_LINKAD_URL
		$t_linkad->C_LINKAD_URL->CellCssStyle = ""; $t_linkad->C_LINKAD_URL->CellCssClass = "";
		$t_linkad->C_LINKAD_URL->CellAttrs = array(); $t_linkad->C_LINKAD_URL->ViewAttrs = array(); $t_linkad->C_LINKAD_URL->EditAttrs = array();

		// C_LINKAD_POS
		$t_linkad->C_LINKAD_POS->CellCssStyle = ""; $t_linkad->C_LINKAD_POS->CellCssClass = "";
		$t_linkad->C_LINKAD_POS->CellAttrs = array(); $t_linkad->C_LINKAD_POS->ViewAttrs = array(); $t_linkad->C_LINKAD_POS->EditAttrs = array();

		// C_USER_ADD
		$t_linkad->C_USER_ADD->CellCssStyle = ""; $t_linkad->C_USER_ADD->CellCssClass = "";
		$t_linkad->C_USER_ADD->CellAttrs = array(); $t_linkad->C_USER_ADD->ViewAttrs = array(); $t_linkad->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_linkad->C_ADD_TIME->CellCssStyle = ""; $t_linkad->C_ADD_TIME->CellCssClass = "";
		$t_linkad->C_ADD_TIME->CellAttrs = array(); $t_linkad->C_ADD_TIME->ViewAttrs = array(); $t_linkad->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_linkad->C_USER_EDIT->CellCssStyle = ""; $t_linkad->C_USER_EDIT->CellCssClass = "";
		$t_linkad->C_USER_EDIT->CellAttrs = array(); $t_linkad->C_USER_EDIT->ViewAttrs = array(); $t_linkad->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_linkad->C_EDIT_TIME->CellCssStyle = ""; $t_linkad->C_EDIT_TIME->CellCssClass = "";
		$t_linkad->C_EDIT_TIME->CellAttrs = array(); $t_linkad->C_EDIT_TIME->ViewAttrs = array(); $t_linkad->C_EDIT_TIME->EditAttrs = array();

		// C_SEND_MAIL
		$t_linkad->C_SEND_MAIL->CellCssStyle = ""; $t_linkad->C_SEND_MAIL->CellCssClass = "";
		$t_linkad->C_SEND_MAIL->CellAttrs = array(); $t_linkad->C_SEND_MAIL->ViewAttrs = array(); $t_linkad->C_SEND_MAIL->EditAttrs = array();

		// C_IMG_SOURCE
		$t_linkad->C_IMG_SOURCE->CellCssStyle = ""; $t_linkad->C_IMG_SOURCE->CellCssClass = "";
		$t_linkad->C_IMG_SOURCE->CellAttrs = array(); $t_linkad->C_IMG_SOURCE->ViewAttrs = array(); $t_linkad->C_IMG_SOURCE->EditAttrs = array();

		// C_LINKAD_ACTIVE
		$t_linkad->C_LINKAD_ACTIVE->CellCssStyle = ""; $t_linkad->C_LINKAD_ACTIVE->CellCssClass = "";
		$t_linkad->C_LINKAD_ACTIVE->CellAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->ViewAttrs = array(); $t_linkad->C_LINKAD_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_linkad->C_ORDER->CellCssStyle = ""; $t_linkad->C_ORDER->CellCssClass = "";
		$t_linkad->C_ORDER->CellAttrs = array(); $t_linkad->C_ORDER->ViewAttrs = array(); $t_linkad->C_ORDER->EditAttrs = array();

		// FK_CONGTY
		$t_linkad->FK_CONGTY->CellCssStyle = ""; $t_linkad->FK_CONGTY->CellCssClass = "";
		$t_linkad->FK_CONGTY->CellAttrs = array(); $t_linkad->FK_CONGTY->ViewAttrs = array(); $t_linkad->FK_CONGTY->EditAttrs = array();
		if ($t_linkad->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_LINKAD_ID
			$t_linkad->C_LINKAD_ID->ViewValue = $t_linkad->C_LINKAD_ID->CurrentValue;
			$t_linkad->C_LINKAD_ID->CssStyle = "";
			$t_linkad->C_LINKAD_ID->CssClass = "";
			$t_linkad->C_LINKAD_ID->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->ViewValue = $t_linkad->C_LINKAD_NAME->CurrentValue;
			$t_linkad->C_LINKAD_NAME->CssStyle = "";
			$t_linkad->C_LINKAD_NAME->CssClass = "";
			$t_linkad->C_LINKAD_NAME->ViewCustomAttributes = "";

			// C_LINKAD_DES
			$t_linkad->C_LINKAD_DES->ViewValue = $t_linkad->C_LINKAD_DES->CurrentValue;
			$t_linkad->C_LINKAD_DES->CssStyle = "";
			$t_linkad->C_LINKAD_DES->CssClass = "";
			$t_linkad->C_LINKAD_DES->ViewCustomAttributes = "";

			// C_LINKAD_TYPE
			if (strval($t_linkad->C_LINKAD_TYPE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_TYPE->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_TYPE->ViewValue = "slide";
						break;
					default:
						$t_linkad->C_LINKAD_TYPE->ViewValue = $t_linkad->C_LINKAD_TYPE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_TYPE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_TYPE->CssStyle = "";
			$t_linkad->C_LINKAD_TYPE->CssClass = "";
			$t_linkad->C_LINKAD_TYPE->ViewCustomAttributes = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->ViewValue = $t_linkad->C_LINKAD_URL->CurrentValue;
			$t_linkad->C_LINKAD_URL->CssStyle = "";
			$t_linkad->C_LINKAD_URL->CssClass = "";
			$t_linkad->C_LINKAD_URL->ViewCustomAttributes = "";

			// C_LINKAD_POS
			if (strval($t_linkad->C_LINKAD_POS->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_POS->CurrentValue) {
					case "1":
						$t_linkad->C_LINKAD_POS->ViewValue = "Trang chu";
						break;
					default:
						$t_linkad->C_LINKAD_POS->ViewValue = $t_linkad->C_LINKAD_POS->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_POS->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_POS->CssStyle = "";
			$t_linkad->C_LINKAD_POS->CssClass = "";
			$t_linkad->C_LINKAD_POS->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_linkad->C_USER_ADD->ViewValue = $t_linkad->C_USER_ADD->CurrentValue;
			$t_linkad->C_USER_ADD->CssStyle = "";
			$t_linkad->C_USER_ADD->CssClass = "";
			$t_linkad->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_linkad->C_ADD_TIME->ViewValue = $t_linkad->C_ADD_TIME->CurrentValue;
			$t_linkad->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_ADD_TIME->ViewValue, 7);
			$t_linkad->C_ADD_TIME->CssStyle = "";
			$t_linkad->C_ADD_TIME->CssClass = "";
			$t_linkad->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_linkad->C_USER_EDIT->ViewValue = $t_linkad->C_USER_EDIT->CurrentValue;
			$t_linkad->C_USER_EDIT->CssStyle = "";
			$t_linkad->C_USER_EDIT->CssClass = "";
			$t_linkad->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_linkad->C_EDIT_TIME->ViewValue = $t_linkad->C_EDIT_TIME->CurrentValue;
			$t_linkad->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_linkad->C_EDIT_TIME->ViewValue, 7);
			$t_linkad->C_EDIT_TIME->CssStyle = "";
			$t_linkad->C_EDIT_TIME->CssClass = "";
			$t_linkad->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_linkad->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_linkad->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_linkad->C_SEND_MAIL->ViewValue = "Khong gui mail";
						break;
					case "1":
						$t_linkad->C_SEND_MAIL->ViewValue = "Gui mail cho bo phan thiet ke";
						break;
					default:
						$t_linkad->C_SEND_MAIL->ViewValue = $t_linkad->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_linkad->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_linkad->C_SEND_MAIL->CssStyle = "";
			$t_linkad->C_SEND_MAIL->CssClass = "";
			$t_linkad->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_IMG_SOURCE
			$t_linkad->C_IMG_SOURCE->ViewValue = $t_linkad->C_IMG_SOURCE->CurrentValue;
			$t_linkad->C_IMG_SOURCE->CssStyle = "";
			$t_linkad->C_IMG_SOURCE->CssClass = "";
			$t_linkad->C_IMG_SOURCE->ViewCustomAttributes = "";

			// C_LINKAD_ACTIVE
			if (strval($t_linkad->C_LINKAD_ACTIVE->CurrentValue) <> "") {
				switch ($t_linkad->C_LINKAD_ACTIVE->CurrentValue) {
					case "0":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "No Active";
						break;
					case "1":
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = "Active";
						break;
					default:
						$t_linkad->C_LINKAD_ACTIVE->ViewValue = $t_linkad->C_LINKAD_ACTIVE->CurrentValue;
				}
			} else {
				$t_linkad->C_LINKAD_ACTIVE->ViewValue = NULL;
			}
			$t_linkad->C_LINKAD_ACTIVE->CssStyle = "";
			$t_linkad->C_LINKAD_ACTIVE->CssClass = "";
			$t_linkad->C_LINKAD_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_linkad->C_ORDER->ViewValue = $t_linkad->C_ORDER->CurrentValue;
			$t_linkad->C_ORDER->ViewValue = ew_FormatDateTime($t_linkad->C_ORDER->ViewValue, 7);
			$t_linkad->C_ORDER->CssStyle = "";
			$t_linkad->C_ORDER->CssClass = "";
			$t_linkad->C_ORDER->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_linkad->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_linkad->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_linkad->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_linkad->FK_CONGTY->ViewValue = $t_linkad->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_linkad->FK_CONGTY->ViewValue = NULL;
			}
			$t_linkad->FK_CONGTY->CssStyle = "";
			$t_linkad->FK_CONGTY->CssClass = "";
			$t_linkad->FK_CONGTY->ViewCustomAttributes = "";

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->HrefValue = "";
			$t_linkad->C_LINKAD_NAME->TooltipValue = "";

			// C_LINKAD_DES
			$t_linkad->C_LINKAD_DES->HrefValue = "";
			$t_linkad->C_LINKAD_DES->TooltipValue = "";

			// C_LINKAD_TYPE
			$t_linkad->C_LINKAD_TYPE->HrefValue = "";
			$t_linkad->C_LINKAD_TYPE->TooltipValue = "";

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->HrefValue = "";
			$t_linkad->C_LINKAD_URL->TooltipValue = "";

			// C_LINKAD_POS
			$t_linkad->C_LINKAD_POS->HrefValue = "";
			$t_linkad->C_LINKAD_POS->TooltipValue = "";

			// C_USER_ADD
			$t_linkad->C_USER_ADD->HrefValue = "";
			$t_linkad->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_linkad->C_ADD_TIME->HrefValue = "";
			$t_linkad->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_linkad->C_USER_EDIT->HrefValue = "";
			$t_linkad->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_linkad->C_EDIT_TIME->HrefValue = "";
			$t_linkad->C_EDIT_TIME->TooltipValue = "";

			// C_SEND_MAIL
			$t_linkad->C_SEND_MAIL->HrefValue = "";
			$t_linkad->C_SEND_MAIL->TooltipValue = "";

			// C_IMG_SOURCE
			$t_linkad->C_IMG_SOURCE->HrefValue = "";
			$t_linkad->C_IMG_SOURCE->TooltipValue = "";

			// C_LINKAD_ACTIVE
			$t_linkad->C_LINKAD_ACTIVE->HrefValue = "";
			$t_linkad->C_LINKAD_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_linkad->C_ORDER->HrefValue = "";
			$t_linkad->C_ORDER->TooltipValue = "";

			// FK_CONGTY
			$t_linkad->FK_CONGTY->HrefValue = "";
			$t_linkad->FK_CONGTY->TooltipValue = "";
		} elseif ($t_linkad->RowType == EW_ROWTYPE_ADD) { // Add row

			// C_LINKAD_NAME
			$t_linkad->C_LINKAD_NAME->EditCustomAttributes = "";
			$t_linkad->C_LINKAD_NAME->EditValue = ew_HtmlEncode($t_linkad->C_LINKAD_NAME->CurrentValue);

			// C_LINKAD_DES
			$t_linkad->C_LINKAD_DES->EditCustomAttributes = "";
			$t_linkad->C_LINKAD_DES->EditValue = ew_HtmlEncode($t_linkad->C_LINKAD_DES->CurrentValue);

			// C_LINKAD_TYPE
			$t_linkad->C_LINKAD_TYPE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Slide");
			$t_linkad->C_LINKAD_TYPE->EditValue = $arwrk;

			// C_LINKAD_URL
			$t_linkad->C_LINKAD_URL->EditCustomAttributes = "";
			$t_linkad->C_LINKAD_URL->EditValue = ew_HtmlEncode($t_linkad->C_LINKAD_URL->CurrentValue);

			// C_LINKAD_POS
			$t_linkad->C_LINKAD_POS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Trang chủ");
			$t_linkad->C_LINKAD_POS->EditValue = $arwrk;

			// C_USER_ADD
			// C_ADD_TIME
			// C_USER_EDIT
			// C_EDIT_TIME
			// C_SEND_MAIL

			$t_linkad->C_SEND_MAIL->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không gửi mail");
			$arwrk[] = array("1", "Gửi mail cho bộ phận thiết kế");
			$t_linkad->C_SEND_MAIL->EditValue = $arwrk;

			// C_IMG_SOURCE
			$t_linkad->C_IMG_SOURCE->EditCustomAttributes = "";
			$t_linkad->C_IMG_SOURCE->EditValue = ew_HtmlEncode($t_linkad->C_IMG_SOURCE->CurrentValue);

			// C_LINKAD_ACTIVE
			$t_linkad->C_LINKAD_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_linkad->C_LINKAD_ACTIVE->EditValue = $arwrk;

			// C_ORDER
			$t_linkad->C_ORDER->EditCustomAttributes = "";
			$t_linkad->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_linkad->C_ORDER->CurrentValue, 7));

			// FK_CONGTY
			$t_linkad->FK_CONGTY->EditCustomAttributes = "";
			$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty`";
			$sWhereWrk = "PK_MACONGTY=".$Security->CurrentUserOption();
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_linkad->FK_CONGTY->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_linkad->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_linkad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_linkad;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_linkad->C_LINKAD_NAME->FormValue) && $t_linkad->C_LINKAD_NAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_linkad->C_LINKAD_NAME->FldCaption();
		}
		if (!is_null($t_linkad->C_LINKAD_URL->FormValue) && $t_linkad->C_LINKAD_URL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_linkad->C_LINKAD_URL->FldCaption();
		}
		if ($t_linkad->C_LINKAD_POS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_linkad->C_LINKAD_POS->FldCaption();
		}
		if ($t_linkad->C_SEND_MAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_linkad->C_SEND_MAIL->FldCaption();
		}
		
		if (!is_null($t_linkad->C_ORDER->FormValue) && $t_linkad->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_linkad->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_linkad->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_linkad->C_ORDER->FldErrMsg();
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
		global $conn, $Language, $Security, $t_linkad;
		$rsnew = array();

		// C_LINKAD_NAME
		$t_linkad->C_LINKAD_NAME->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_NAME->CurrentValue, NULL, FALSE);

		// C_LINKAD_DES
		$t_linkad->C_LINKAD_DES->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_DES->CurrentValue, NULL, FALSE);

		// C_LINKAD_TYPE
		$t_linkad->C_LINKAD_TYPE->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_TYPE->CurrentValue, NULL, FALSE);

		// C_LINKAD_URL
		$t_linkad->C_LINKAD_URL->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_URL->CurrentValue, NULL, FALSE);

		// C_LINKAD_POS
		$t_linkad->C_LINKAD_POS->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_POS->CurrentValue, NULL, FALSE);

		// C_USER_ADD
		$t_linkad->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_linkad->C_USER_ADD->DbValue;

		// C_ADD_TIME
		$t_linkad->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_ADD_TIME'] =& $t_linkad->C_ADD_TIME->DbValue;

		// C_USER_EDIT
		$t_linkad->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_EDIT'] =& $t_linkad->C_USER_EDIT->DbValue;

		// C_EDIT_TIME
		$t_linkad->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_EDIT_TIME'] =& $t_linkad->C_EDIT_TIME->DbValue;

		// C_SEND_MAIL
		$t_linkad->C_SEND_MAIL->SetDbValueDef($rsnew, $t_linkad->C_SEND_MAIL->CurrentValue, NULL, FALSE);
                
                if ($t_linkad->C_SEND_MAIL->CurrentValue == '1')
                {   
		// C_IMG_SOURCE
		$t_linkad->C_IMG_SOURCE->SetDbValueDef($rsnew, $t_linkad->C_IMG_SOURCE->CurrentValue, NULL, FALSE);
                // send Mail 
                                        $subject = "HPU - Design Side News Mầm Non";
                                        $noidung = $t_linkad->C_LINKAD_NAME->CurrentValue;
                                        $hinhanh = $t_linkad->C_IMG_SOURCE->CurrentValue;
                                        $hotentacgia =CurrentFullUserName();
                                        $mailtacgia =CurrentEmail();
                                        $sEmail = "thaont@hpu.edu.vn ";// nguoi nhan
                                        $bEmailSent = FALSE;
                                        $bValidEmail = FALSE;
                                        $Cc= "hpudesign@gmail.com"; //mail CC
                                         if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;
                                        
						if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/design.txt");
						$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
						$Email->ReplaceRecipient($sEmail); // Replace Recipient
                                                $Email->AddCc($Cc); // Replace CC
                                                $Email->ReplaceSubject(strval($subject));
						$Email->ReplaceContent('<!--$Noidung-->', $noidung);
                                                $Email->ReplaceContent('<!--$Hinhanh-->', $hinhanh);
                                                $Email->ReplaceContent('<!--$hotentacgia-->', $hotentacgia);
                                                $Email->ReplaceContent('<!--$mailtacgia-->', $mailtacgia);
						$Args = array();
						$Args["rs"] =& $rsnew;
						if ($this->Email_Sending($Email, $Args))
						   {  
							$bEmailSent = $Email->Send();
						   }
						}
						if ($bEmailSent) {
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">HPU thông báo: bạn đã gửi Mail thành công tới bộ phận thiết kế để được hỗ trợ </font></div>"); // Set success message
							//$this->Page_Terminate("login.php"); // Return to login page
						} elseif ($bValidEmail) {
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
						}
                }
                
                else  
                {
                    $t_linkad->C_SEND_MAIL->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                    // C_IMG_SOURCE
		    $t_linkad->C_IMG_SOURCE->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                } 
                

		// C_LINKAD_ACTIVE
		$t_linkad->C_LINKAD_ACTIVE->SetDbValueDef($rsnew, $t_linkad->C_LINKAD_ACTIVE->CurrentValue, NULL, FALSE);

		// C_ORDER
		$t_linkad->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_linkad->C_ORDER->CurrentValue, 7, FALSE), NULL);

		// FK_CONGTY
		$t_linkad->FK_CONGTY->SetDbValueDef($rsnew, $t_linkad->FK_CONGTY->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$bInsertRow = $t_linkad->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_linkad->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_linkad->CancelMessage <> "") {
				$this->setMessage($t_linkad->CancelMessage);
				$t_linkad->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_linkad->C_LINKAD_ID->setDbValue($conn->Insert_ID());
			$rsnew['C_LINKAD_ID'] = $t_linkad->C_LINKAD_ID->DbValue;

			// Call Row Inserted event
			$t_linkad->Row_Inserted($rsnew);
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
    
         function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
        
	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
