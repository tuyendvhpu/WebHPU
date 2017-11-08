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
$t_thongbao_mainsite_update = new ct_thongbao_mainsite_update();
$Page =& $t_thongbao_mainsite_update;

// Page init
$t_thongbao_mainsite_update->Page_Init();

// Page main
$t_thongbao_mainsite_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_mainsite_update = new ew_Page("t_thongbao_mainsite_update");

// page properties
t_thongbao_mainsite_update.PageID = "update"; // page ID
t_thongbao_mainsite_update.FormID = "ft_thongbao_mainsiteupdate"; // form ID
var EW_PAGE_ID = t_thongbao_mainsite_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_thongbao_mainsite_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		uelm = fobj.elements["u" + infix + "_C_TITLE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_TITLE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_PUBLISH"];
		uelm = fobj.elements["u" + infix + "_C_PUBLISH"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_PUBLISH->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		uelm = fobj.elements["u" + infix + "_C_ACTIVE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_ACTIVE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		uelm = fobj.elements["u" + infix + "_C_ORDER"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_ORDER->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		uelm = fobj.elements["u" + infix + "_C_ORDER"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_BEGIN_DATE"];
		uelm = fobj.elements["u" + infix + "_C_BEGIN_DATE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_BEGIN_DATE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_BEGIN_DATE"];
		uelm = fobj.elements["u" + infix + "_C_BEGIN_DATE"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_BEGIN_DATE->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_END_DATE"];
		uelm = fobj.elements["u" + infix + "_C_END_DATE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainsite->C_END_DATE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_END_DATE"];
		uelm = fobj.elements["u" + infix + "_C_END_DATE"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainsite->C_END_DATE->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_thongbao_mainsite_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_mainsite_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_mainsite_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_mainsite_update.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("Update") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_thongbao_mainsite->TableCaption() ?><br><br>
<a href="<?php echo $t_thongbao_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("BackToList") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_mainsite_update->ShowMessage();
?>
<form name="ft_thongbao_mainsiteupdate" id="ft_thongbao_mainsiteupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_thongbao_mainsite_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_thongbao_mainsite">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_thongbao_mainsite_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_thongbao_mainsite_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo $Language->Phrase("UpdateValue") ?><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
<?php if ($t_thongbao_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_thongbao_mainsite->C_TITLE->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_TITLE->CellAttributes() ?>>
<input type="checkbox" name="u_C_TITLE" id="u_C_TITLE" value="1"<?php echo ($t_thongbao_mainsite->C_TITLE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_TITLE->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_thongbao_mainsite->C_TITLE->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_thongbao_mainsite->C_TITLE->EditValue ?>"<?php echo $t_thongbao_mainsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_thongbao_mainsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_thongbao_mainsite->C_PUBLISH->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_PUBLISH->CellAttributes() ?>>
<input type="checkbox" name="u_C_PUBLISH" id="u_C_PUBLISH" value="1"<?php echo ($t_thongbao_mainsite->C_PUBLISH->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_PUBLISH->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->C_PUBLISH->CellAttributes() ?>><span id="el_C_PUBLISH">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_mainsite->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_mainsite->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_mainsite->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainsite->C_PUBLISH->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_mainsite->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_mainsite->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_mainsite->C_PUBLISH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_thongbao_mainsite->C_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_ACTIVE->CellAttributes() ?>>
<input type="checkbox" name="u_C_ACTIVE" id="u_C_ACTIVE" value="1"<?php echo ($t_thongbao_mainsite->C_ACTIVE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_ACTIVE->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_mainsite->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_mainsite->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_mainsite->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainsite->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_mainsite->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_mainsite->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_mainsite->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_thongbao_mainsite->C_ORDER->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_ORDER->CellAttributes() ?>>
<input type="checkbox" name="u_C_ORDER" id="u_C_ORDER" value="1"<?php echo ($t_thongbao_mainsite->C_ORDER->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_ORDER->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_ORDER->FldCaption() ?></td>
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
<?php if ($t_thongbao_mainsite->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
	<tr<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CellAttributes() ?>>
<input type="checkbox" name="u_C_BEGIN_DATE" id="u_C_BEGIN_DATE" value="1"<?php echo ($t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_BEGIN_DATE->FldCaption() ?></td>
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
</span><?php echo $t_thongbao_mainsite->C_BEGIN_DATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->C_END_DATE->Visible) { // C_END_DATE ?>
	<tr<?php echo $t_thongbao_mainsite->C_END_DATE->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->C_END_DATE->CellAttributes() ?>>
<input type="checkbox" name="u_C_END_DATE" id="u_C_END_DATE" value="1"<?php echo ($t_thongbao_mainsite->C_END_DATE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->C_END_DATE->CellAttributes() ?>><?php echo $t_thongbao_mainsite->C_END_DATE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->C_END_DATE->CellAttributes() ?>><span id="el_C_END_DATE">
<input type="text" name="x_C_END_DATE" id="x_C_END_DATE" title="<?php echo $t_thongbao_mainsite->C_END_DATE->FldTitle() ?>" value="<?php echo $t_thongbao_mainsite->C_END_DATE->EditValue ?>"<?php echo $t_thongbao_mainsite->C_END_DATE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_END_DATE" name="cal_x_C_END_DATE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_END_DATE", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_END_DATE" // button id
});
</script>
</span><?php echo $t_thongbao_mainsite->C_END_DATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->FK_NGUOIDUNG_ID->Visible) { // FK_NGUOIDUNG_ID ?>
	<tr<?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellAttributes() ?>>
<input type="checkbox" name="u_FK_NGUOIDUNG_ID" id="u_FK_NGUOIDUNG_ID" value="1"<?php echo ($t_thongbao_mainsite->FK_NGUOIDUNG_ID->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellAttributes() ?>><?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellAttributes() ?>><span id="el_FK_NGUOIDUNG_ID">
</span><?php echo $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainsite->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>>
<input type="checkbox" name="u_FK_ARRAY_CONGTY" id="u_FK_ARRAY_CONGTY" value="1"<?php echo ($t_thongbao_mainsite->FK_ARRAY_CONGTY->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>><?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>><span id="el_FK_ARRAY_CONGTY">
<input type="text" name="x_FK_ARRAY_CONGTY" id="x_FK_ARRAY_CONGTY" title="<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->EditValue ?>"<?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->EditAttributes() ?>>
</span><?php echo $t_thongbao_mainsite->FK_ARRAY_CONGTY->CustomMsg ?></td>
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
$t_thongbao_mainsite_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_mainsite_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_thongbao_mainsite';

	// Page object name
	var $PageObjName = 't_thongbao_mainsite_update';

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
	function ct_thongbao_mainsite_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_mainsite)
		$GLOBALS["t_thongbao_mainsite"] = new ct_thongbao_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

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
		if (!$Security->CanEdit()) {
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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_thongbao_mainsite;

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
				$t_thongbao_mainsite->CurrentAction = $_POST["a_update"];

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
					$t_thongbao_mainsite->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_thongbao_mainsitelist.php"); // No records selected, return to list
		switch ($t_thongbao_mainsite->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_thongbao_mainsite->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_thongbao_mainsite->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_thongbao_mainsite;
		$t_thongbao_mainsite->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$t_thongbao_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
					$t_thongbao_mainsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
					$t_thongbao_mainsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
					$t_thongbao_mainsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
					$t_thongbao_mainsite->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
					$t_thongbao_mainsite->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
					$t_thongbao_mainsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
					$t_thongbao_mainsite->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
				} else {
					if (!ew_CompareValue($t_thongbao_mainsite->C_TITLE->DbValue, $rs->fields('C_TITLE')))
						$t_thongbao_mainsite->C_TITLE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->C_PUBLISH->DbValue, $rs->fields('C_PUBLISH')))
						$t_thongbao_mainsite->C_PUBLISH->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->C_ACTIVE->DbValue, $rs->fields('C_ACTIVE')))
						$t_thongbao_mainsite->C_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->C_ORDER->DbValue, $rs->fields('C_ORDER')))
						$t_thongbao_mainsite->C_ORDER->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->C_BEGIN_DATE->DbValue, $rs->fields('C_BEGIN_DATE')))
						$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->C_END_DATE->DbValue, $rs->fields('C_END_DATE')))
						$t_thongbao_mainsite->C_END_DATE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->FK_NGUOIDUNG_ID->DbValue, $rs->fields('FK_NGUOIDUNG_ID')))
						$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_mainsite->FK_ARRAY_CONGTY->DbValue, $rs->fields('FK_ARRAY_CONGTY')))
						$t_thongbao_mainsite->FK_ARRAY_CONGTY->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_thongbao_mainsite;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_thongbao_mainsite->KeyFilter();
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
		global $t_thongbao_mainsite;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_thongbao_mainsite->PK_THONGBAO->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_thongbao_mainsite;
		$conn->BeginTrans();

		// Get old recordset
		$t_thongbao_mainsite->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_thongbao_mainsite->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_thongbao_mainsite->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $t_thongbao_mainsite;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_thongbao_mainsite;
		$t_thongbao_mainsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_thongbao_mainsite->C_TITLE->MultiUpdate = $objForm->GetValue("u_C_TITLE");
		$t_thongbao_mainsite->C_PUBLISH->setFormValue($objForm->GetValue("x_C_PUBLISH"));
		$t_thongbao_mainsite->C_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_PUBLISH");
		$t_thongbao_mainsite->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_thongbao_mainsite->C_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE");
		$t_thongbao_mainsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_thongbao_mainsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7);
		$t_thongbao_mainsite->C_ORDER->MultiUpdate = $objForm->GetValue("u_C_ORDER");
		$t_thongbao_mainsite->C_BEGIN_DATE->setFormValue($objForm->GetValue("x_C_BEGIN_DATE"));
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate = $objForm->GetValue("u_C_BEGIN_DATE");
		$t_thongbao_mainsite->C_END_DATE->setFormValue($objForm->GetValue("x_C_END_DATE"));
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_END_DATE->MultiUpdate = $objForm->GetValue("u_C_END_DATE");
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_FK_NGUOIDUNG_ID"));
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->MultiUpdate = $objForm->GetValue("u_FK_NGUOIDUNG_ID");
		$t_thongbao_mainsite->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
		$t_thongbao_mainsite->FK_ARRAY_CONGTY->MultiUpdate = $objForm->GetValue("u_FK_ARRAY_CONGTY");
		$t_thongbao_mainsite->PK_THONGBAO->setFormValue($objForm->GetValue("x_PK_THONGBAO"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_thongbao_mainsite;
		$t_thongbao_mainsite->PK_THONGBAO->CurrentValue = $t_thongbao_mainsite->PK_THONGBAO->FormValue;
		$t_thongbao_mainsite->C_TITLE->CurrentValue = $t_thongbao_mainsite->C_TITLE->FormValue;
		$t_thongbao_mainsite->C_PUBLISH->CurrentValue = $t_thongbao_mainsite->C_PUBLISH->FormValue;
		$t_thongbao_mainsite->C_ACTIVE->CurrentValue = $t_thongbao_mainsite->C_ACTIVE->FormValue;
		$t_thongbao_mainsite->C_ORDER->CurrentValue = $t_thongbao_mainsite->C_ORDER->FormValue;
		$t_thongbao_mainsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7);
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = $t_thongbao_mainsite->C_BEGIN_DATE->FormValue;
		$t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = $t_thongbao_mainsite->C_END_DATE->FormValue;
		$t_thongbao_mainsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CurrentValue = $t_thongbao_mainsite->FK_NGUOIDUNG_ID->FormValue;
		$t_thongbao_mainsite->FK_ARRAY_CONGTY->CurrentValue = $t_thongbao_mainsite->FK_ARRAY_CONGTY->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_thongbao_mainsite;

		// Call Recordset Selecting event
		$t_thongbao_mainsite->Recordset_Selecting($t_thongbao_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_thongbao_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_thongbao_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_thongbao_mainsite->Row_Rendering();

		// Common render codes for all row types
		// C_TITLE

		$t_thongbao_mainsite->C_TITLE->CellCssStyle = ""; $t_thongbao_mainsite->C_TITLE->CellCssClass = "";
		$t_thongbao_mainsite->C_TITLE->CellAttrs = array(); $t_thongbao_mainsite->C_TITLE->ViewAttrs = array(); $t_thongbao_mainsite->C_TITLE->EditAttrs = array();

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

		// FK_NGUOIDUNG_ID
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_thongbao_mainsite->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_thongbao_mainsite->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_thongbao_mainsite->FK_NGUOIDUNG_ID->EditAttrs = array();

		// FK_ARRAY_CONGTY
		$t_thongbao_mainsite->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_thongbao_mainsite->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_thongbao_mainsite->FK_ARRAY_CONGTY->CellAttrs = array(); $t_thongbao_mainsite->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_thongbao_mainsite->FK_ARRAY_CONGTY->EditAttrs = array();
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
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Khong active len levelsite";
						break;
					case "1":
						$t_thongbao_mainsite->C_PUBLISH->ViewValue = "Active len levelsite";
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

			// FK_ARRAY_CONGTY
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->ViewValue = $t_thongbao_mainsite->FK_ARRAY_CONGTY->CurrentValue;
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->CssStyle = "";
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->CssClass = "";
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->HrefValue = "";
			$t_thongbao_mainsite->C_TITLE->TooltipValue = "";

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

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->TooltipValue = "";

			// FK_ARRAY_CONGTY
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->HrefValue = "";
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->TooltipValue = "";
		} elseif ($t_thongbao_mainsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_TITLE
			$t_thongbao_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_thongbao_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_thongbao_mainsite->C_TITLE->CurrentValue);

			// C_PUBLISH
			$t_thongbao_mainsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong active len levelsite");
			$arwrk[] = array("1", "Active len levelsite");
			$t_thongbao_mainsite->C_PUBLISH->EditValue = $arwrk;

			// C_ACTIVE
			$t_thongbao_mainsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong active len mainsite");
			$arwrk[] = array("1", "Active len mainsite");
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

			// FK_NGUOIDUNG_ID
			// FK_ARRAY_CONGTY

			$t_thongbao_mainsite->FK_ARRAY_CONGTY->EditCustomAttributes = "";
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->EditValue = ew_HtmlEncode($t_thongbao_mainsite->FK_ARRAY_CONGTY->CurrentValue);

			// Edit refer script
			// C_TITLE

			$t_thongbao_mainsite->C_TITLE->HrefValue = "";

			// C_PUBLISH
			$t_thongbao_mainsite->C_PUBLISH->HrefValue = "";

			// C_ACTIVE
			$t_thongbao_mainsite->C_ACTIVE->HrefValue = "";

			// C_ORDER
			$t_thongbao_mainsite->C_ORDER->HrefValue = "";

			// C_BEGIN_DATE
			$t_thongbao_mainsite->C_BEGIN_DATE->HrefValue = "";

			// C_END_DATE
			$t_thongbao_mainsite->C_END_DATE->HrefValue = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->HrefValue = "";

			// FK_ARRAY_CONGTY
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->HrefValue = "";
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
		$lUpdateCnt = 0;
		if ($t_thongbao_mainsite->C_TITLE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->C_PUBLISH->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->C_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->C_ORDER->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->C_END_DATE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->FK_NGUOIDUNG_ID->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_thongbao_mainsite->FK_ARRAY_CONGTY->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = $Language->Phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_thongbao_mainsite->C_TITLE->MultiUpdate <> "" && !is_null($t_thongbao_mainsite->C_TITLE->FormValue) && $t_thongbao_mainsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_TITLE->FldCaption();
		}
		if ($t_thongbao_mainsite->C_PUBLISH->MultiUpdate <> "" && $t_thongbao_mainsite->C_PUBLISH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_PUBLISH->FldCaption();
		}
		if ($t_thongbao_mainsite->C_ACTIVE->MultiUpdate <> "" && $t_thongbao_mainsite->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_ACTIVE->FldCaption();
		}
		if ($t_thongbao_mainsite->C_ORDER->MultiUpdate <> "" && !is_null($t_thongbao_mainsite->C_ORDER->FormValue) && $t_thongbao_mainsite->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_ORDER->FldCaption();
		}
		if ($t_thongbao_mainsite->C_ORDER->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_mainsite->C_ORDER->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_mainsite->C_ORDER->FldErrMsg;
			}
		}
		if ($t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate <> "" && !is_null($t_thongbao_mainsite->C_BEGIN_DATE->FormValue) && $t_thongbao_mainsite->C_BEGIN_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_BEGIN_DATE->FldCaption();
		}
		if ($t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_mainsite->C_BEGIN_DATE->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_mainsite->C_BEGIN_DATE->FldErrMsg;
			}
		}
		if ($t_thongbao_mainsite->C_END_DATE->MultiUpdate <> "" && !is_null($t_thongbao_mainsite->C_END_DATE->FormValue) && $t_thongbao_mainsite->C_END_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainsite->C_END_DATE->FldCaption();
		}
		if ($t_thongbao_mainsite->C_END_DATE->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_mainsite->C_END_DATE->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_mainsite->C_END_DATE->FldErrMsg;
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
		global $conn, $Security, $Language, $t_thongbao_mainsite;
		$sFilter = $t_thongbao_mainsite->KeyFilter();
		$t_thongbao_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_mainsite->SQL();
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

			// C_TITLE
						if ($t_thongbao_mainsite->C_TITLE->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_TITLE->SetDbValueDef($rsnew, $t_thongbao_mainsite->C_TITLE->CurrentValue, NULL, FALSE);
			}

			// C_PUBLISH
						if ($t_thongbao_mainsite->C_PUBLISH->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_PUBLISH->SetDbValueDef($rsnew, $t_thongbao_mainsite->C_PUBLISH->CurrentValue, NULL, FALSE);
			}

			// C_ACTIVE
						if ($t_thongbao_mainsite->C_ACTIVE->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_ACTIVE->SetDbValueDef($rsnew, $t_thongbao_mainsite->C_ACTIVE->CurrentValue, NULL, FALSE);
			}

			// C_ORDER
						if ($t_thongbao_mainsite->C_ORDER->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_ORDER->CurrentValue, 7, FALSE), NULL);
			}

			// C_BEGIN_DATE
						if ($t_thongbao_mainsite->C_BEGIN_DATE->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_BEGIN_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_BEGIN_DATE->CurrentValue, 7, FALSE), NULL);
			}

			// C_END_DATE
						if ($t_thongbao_mainsite->C_END_DATE->MultiUpdate == "1") {
			$t_thongbao_mainsite->C_END_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainsite->C_END_DATE->CurrentValue, 7, FALSE), NULL);
			}

			// FK_NGUOIDUNG_ID
						if ($t_thongbao_mainsite->FK_NGUOIDUNG_ID->MultiUpdate == "1") {
			$t_thongbao_mainsite->FK_NGUOIDUNG_ID->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['FK_NGUOIDUNG_ID'] =& $t_thongbao_mainsite->FK_NGUOIDUNG_ID->DbValue;
			}

			// FK_ARRAY_CONGTY
						if ($t_thongbao_mainsite->FK_ARRAY_CONGTY->MultiUpdate == "1") {
			$t_thongbao_mainsite->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_thongbao_mainsite->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);
			}

			// Call Row Updating event
			$bUpdateRow = $t_thongbao_mainsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_thongbao_mainsite->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_thongbao_mainsite->CancelMessage <> "") {
					$this->setMessage($t_thongbao_mainsite->CancelMessage);
					$t_thongbao_mainsite->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_thongbao_mainsite->Row_Updated($rsold, $rsnew);
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
