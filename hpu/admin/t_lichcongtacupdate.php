<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lichcongtacinfo.php" ?>
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
$t_lichcongtac_update = new ct_lichcongtac_update();
$Page =& $t_lichcongtac_update;

// Page init
$t_lichcongtac_update->Page_Init();

// Page main
$t_lichcongtac_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lichcongtac_update = new ew_Page("t_lichcongtac_update");

// page properties
t_lichcongtac_update.PageID = "update"; // page ID
t_lichcongtac_update.FormID = "ft_lichcongtacupdate"; // form ID
var EW_PAGE_ID = t_lichcongtac_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_lichcongtac_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_FK_SB_ID"];
		uelm = fobj.elements["u" + infix + "_FK_SB_ID"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->FK_SB_ID->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		uelm = fobj.elements["u" + infix + "_C_TITLE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_TITLE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_DATE_STAR"];
		uelm = fobj.elements["u" + infix + "_C_DATE_STAR"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_DATE_STAR->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_DATE_STAR"];
		uelm = fobj.elements["u" + infix + "_C_DATE_STAR"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lichcongtac->C_DATE_STAR->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_HOUR_START"];
		uelm = fobj.elements["u" + infix + "_C_HOUR_START"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_HOUR_START->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_MINUTES_STAR"];
		uelm = fobj.elements["u" + infix + "_C_MINUTES_STAR"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_MINUTES_STAR->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_DATE_END"];
		uelm = fobj.elements["u" + infix + "_C_DATE_END"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_DATE_END->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_DATE_END"];
		uelm = fobj.elements["u" + infix + "_C_DATE_END"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lichcongtac->C_DATE_END->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_HOUR_END"];
		uelm = fobj.elements["u" + infix + "_C_HOUR_END"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_HOUR_END->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_MINUTES_END"];
		uelm = fobj.elements["u" + infix + "_C_MINUTES_END"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_MINUTES_END->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_STATUS_END"];
		uelm = fobj.elements["u" + infix + "_C_STATUS_END"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_STATUS_END->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_PARTICIPANTS_ID"];
		uelm = fobj.elements["u" + infix + "_C_PARTICIPANTS_ID"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_PARTICIPANTS_ID->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		uelm = fobj.elements["u" + infix + "_C_ACTIVE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_ACTIVE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_PUBLISH"];
		uelm = fobj.elements["u" + infix + "_C_PUBLISH"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac->C_PUBLISH->FldCaption()) ?>");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_lichcongtac_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lichcongtac_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lichcongtac_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lichcongtac_update.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("Update") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_lichcongtac->TableCaption() ?><br><br>
<a href="<?php echo $t_lichcongtac->getReturnUrl() ?>"><?php echo $Language->Phrase("BackToList") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lichcongtac_update->ShowMessage();
?>
<form name="ft_lichcongtacupdate" id="ft_lichcongtacupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_lichcongtac_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_lichcongtac">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_lichcongtac_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_lichcongtac_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo $Language->Phrase("UpdateValue") ?><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
<?php if ($t_lichcongtac->FK_SB_ID->Visible) { // FK_SB_ID ?>
	<tr<?php echo $t_lichcongtac->FK_SB_ID->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->FK_SB_ID->CellAttributes() ?>>
<input type="checkbox" name="u_FK_SB_ID" id="u_FK_SB_ID" value="1"<?php echo ($t_lichcongtac->FK_SB_ID->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->FK_SB_ID->CellAttributes() ?>><?php echo $t_lichcongtac->FK_SB_ID->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->FK_SB_ID->CellAttributes() ?>><span id="el_FK_SB_ID">
<select id="x_FK_SB_ID" name="x_FK_SB_ID" title="<?php echo $t_lichcongtac->FK_SB_ID->FldTitle() ?>"<?php echo $t_lichcongtac->FK_SB_ID->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->FK_SB_ID->EditValue)) {
	$arwrk = $t_lichcongtac->FK_SB_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->FK_SB_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac->FK_SB_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_lichcongtac->C_TITLE->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_TITLE->CellAttributes() ?>>
<input type="checkbox" name="u_C_TITLE" id="u_C_TITLE" value="1"<?php echo ($t_lichcongtac->C_TITLE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_TITLE->CellAttributes() ?>><?php echo $t_lichcongtac->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_lichcongtac->C_TITLE->FldTitle() ?>" size="120" maxlength="255" value="<?php echo $t_lichcongtac->C_TITLE->EditValue ?>"<?php echo $t_lichcongtac->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_lichcongtac->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATE_STAR->Visible) { // C_DATE_STAR ?>
	<tr<?php echo $t_lichcongtac->C_DATE_STAR->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_DATE_STAR->CellAttributes() ?>>
<input type="checkbox" name="u_C_DATE_STAR" id="u_C_DATE_STAR" value="1"<?php echo ($t_lichcongtac->C_DATE_STAR->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_DATE_STAR->CellAttributes() ?>><?php echo $t_lichcongtac->C_DATE_STAR->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATE_STAR->CellAttributes() ?>><span id="el_C_DATE_STAR">
<input type="text" name="x_C_DATE_STAR" id="x_C_DATE_STAR" title="<?php echo $t_lichcongtac->C_DATE_STAR->FldTitle() ?>" value="<?php echo $t_lichcongtac->C_DATE_STAR->EditValue ?>"<?php echo $t_lichcongtac->C_DATE_STAR->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_STAR" name="cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATE_STAR", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_STAR" // button id
});
</script>
</span><?php echo $t_lichcongtac->C_DATE_STAR->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_HOUR_START->Visible) { // C_HOUR_START ?>
	<tr<?php echo $t_lichcongtac->C_HOUR_START->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_HOUR_START->CellAttributes() ?>>
<input type="checkbox" name="u_C_HOUR_START" id="u_C_HOUR_START" value="1"<?php echo ($t_lichcongtac->C_HOUR_START->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_HOUR_START->CellAttributes() ?>><?php echo $t_lichcongtac->C_HOUR_START->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_HOUR_START->CellAttributes() ?>><span id="el_C_HOUR_START">
<select id="x_C_HOUR_START" name="x_C_HOUR_START" title="<?php echo $t_lichcongtac->C_HOUR_START->FldTitle() ?>"<?php echo $t_lichcongtac->C_HOUR_START->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->C_HOUR_START->EditValue)) {
	$arwrk = $t_lichcongtac->C_HOUR_START->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_HOUR_START->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac->C_HOUR_START->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_MINUTES_STAR->Visible) { // C_MINUTES_STAR ?>
	<tr<?php echo $t_lichcongtac->C_MINUTES_STAR->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_MINUTES_STAR->CellAttributes() ?>>
<input type="checkbox" name="u_C_MINUTES_STAR" id="u_C_MINUTES_STAR" value="1"<?php echo ($t_lichcongtac->C_MINUTES_STAR->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_MINUTES_STAR->CellAttributes() ?>><?php echo $t_lichcongtac->C_MINUTES_STAR->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_MINUTES_STAR->CellAttributes() ?>><span id="el_C_MINUTES_STAR">
<select id="x_C_MINUTES_STAR" name="x_C_MINUTES_STAR" title="<?php echo $t_lichcongtac->C_MINUTES_STAR->FldTitle() ?>"<?php echo $t_lichcongtac->C_MINUTES_STAR->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->C_MINUTES_STAR->EditValue)) {
	$arwrk = $t_lichcongtac->C_MINUTES_STAR->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_MINUTES_STAR->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac->C_MINUTES_STAR->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_STATUS_STAR->Visible) { // C_STATUS_STAR ?>
	<tr<?php echo $t_lichcongtac->C_STATUS_STAR->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_STATUS_STAR->CellAttributes() ?>>
<input type="checkbox" name="u_C_STATUS_STAR" id="u_C_STATUS_STAR" value="1"<?php echo ($t_lichcongtac->C_STATUS_STAR->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_STATUS_STAR->CellAttributes() ?>><?php echo $t_lichcongtac->C_STATUS_STAR->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_STATUS_STAR->CellAttributes() ?>><span id="el_C_STATUS_STAR">
<div id="tp_x_C_STATUS_STAR" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS_STAR" id="x_C_STATUS_STAR" title="<?php echo $t_lichcongtac->C_STATUS_STAR->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac->C_STATUS_STAR->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS_STAR" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac->C_STATUS_STAR->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_STATUS_STAR->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS_STAR" id="x_C_STATUS_STAR" title="<?php echo $t_lichcongtac->C_STATUS_STAR->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac->C_STATUS_STAR->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac->C_STATUS_STAR->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATE_END->Visible) { // C_DATE_END ?>
	<tr<?php echo $t_lichcongtac->C_DATE_END->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_DATE_END->CellAttributes() ?>>
<input type="checkbox" name="u_C_DATE_END" id="u_C_DATE_END" value="1"<?php echo ($t_lichcongtac->C_DATE_END->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_DATE_END->CellAttributes() ?>><?php echo $t_lichcongtac->C_DATE_END->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATE_END->CellAttributes() ?>><span id="el_C_DATE_END">
<input type="text" name="x_C_DATE_END" id="x_C_DATE_END" title="<?php echo $t_lichcongtac->C_DATE_END->FldTitle() ?>" value="<?php echo $t_lichcongtac->C_DATE_END->EditValue ?>"<?php echo $t_lichcongtac->C_DATE_END->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_END" name="cal_x_C_DATE_END" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATE_END", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_END" // button id
});
</script>
</span><?php echo $t_lichcongtac->C_DATE_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_HOUR_END->Visible) { // C_HOUR_END ?>
	<tr<?php echo $t_lichcongtac->C_HOUR_END->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_HOUR_END->CellAttributes() ?>>
<input type="checkbox" name="u_C_HOUR_END" id="u_C_HOUR_END" value="1"<?php echo ($t_lichcongtac->C_HOUR_END->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_HOUR_END->CellAttributes() ?>><?php echo $t_lichcongtac->C_HOUR_END->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_HOUR_END->CellAttributes() ?>><span id="el_C_HOUR_END">
<select id="x_C_HOUR_END" name="x_C_HOUR_END" title="<?php echo $t_lichcongtac->C_HOUR_END->FldTitle() ?>"<?php echo $t_lichcongtac->C_HOUR_END->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->C_HOUR_END->EditValue)) {
	$arwrk = $t_lichcongtac->C_HOUR_END->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_HOUR_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac->C_HOUR_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_MINUTES_END->Visible) { // C_MINUTES_END ?>
	<tr<?php echo $t_lichcongtac->C_MINUTES_END->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_MINUTES_END->CellAttributes() ?>>
<input type="checkbox" name="u_C_MINUTES_END" id="u_C_MINUTES_END" value="1"<?php echo ($t_lichcongtac->C_MINUTES_END->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_MINUTES_END->CellAttributes() ?>><?php echo $t_lichcongtac->C_MINUTES_END->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_MINUTES_END->CellAttributes() ?>><span id="el_C_MINUTES_END">
<select id="x_C_MINUTES_END" name="x_C_MINUTES_END" title="<?php echo $t_lichcongtac->C_MINUTES_END->FldTitle() ?>"<?php echo $t_lichcongtac->C_MINUTES_END->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->C_MINUTES_END->EditValue)) {
	$arwrk = $t_lichcongtac->C_MINUTES_END->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_MINUTES_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac->C_MINUTES_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_STATUS_END->Visible) { // C_STATUS_END ?>
	<tr<?php echo $t_lichcongtac->C_STATUS_END->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_STATUS_END->CellAttributes() ?>>
<input type="checkbox" name="u_C_STATUS_END" id="u_C_STATUS_END" value="1"<?php echo ($t_lichcongtac->C_STATUS_END->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_STATUS_END->CellAttributes() ?>><?php echo $t_lichcongtac->C_STATUS_END->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_STATUS_END->CellAttributes() ?>><span id="el_C_STATUS_END">
<div id="tp_x_C_STATUS_END" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS_END" id="x_C_STATUS_END" title="<?php echo $t_lichcongtac->C_STATUS_END->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac->C_STATUS_END->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS_END" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac->C_STATUS_END->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_STATUS_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS_END" id="x_C_STATUS_END" title="<?php echo $t_lichcongtac->C_STATUS_END->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac->C_STATUS_END->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac->C_STATUS_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_PARTICIPANTS_ID->Visible) { // C_PARTICIPANTS_ID ?>
	<tr<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CellAttributes() ?>>
<input type="checkbox" name="u_C_PARTICIPANTS_ID" id="u_C_PARTICIPANTS_ID" value="1"<?php echo ($t_lichcongtac->C_PARTICIPANTS_ID->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CellAttributes() ?>><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CellAttributes() ?>><span id="el_C_PARTICIPANTS_ID">
<select id="x_C_PARTICIPANTS_ID[]" name="x_C_PARTICIPANTS_ID[]" title="<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->FldTitle() ?>" multiple="multiple"<?php echo $t_lichcongtac->C_PARTICIPANTS_ID->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac->C_PARTICIPANTS_ID->EditValue)) {
	$arwrk = $t_lichcongtac->C_PARTICIPANTS_ID->EditValue;
	$armultiwrk= explode(",", strval($t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue));
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
</span><?php echo $t_lichcongtac->C_PARTICIPANTS_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_lichcongtac->C_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_ACTIVE->CellAttributes() ?>>
<input type="checkbox" name="u_C_ACTIVE" id="u_C_ACTIVE" value="1"<?php echo ($t_lichcongtac->C_ACTIVE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_ACTIVE->CellAttributes() ?>><?php echo $t_lichcongtac->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lichcongtac->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_lichcongtac->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATETIME_ACTIVE->Visible) { // C_DATETIME_ACTIVE ?>
	<tr<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CellAttributes() ?>>
<input type="checkbox" name="u_C_DATETIME_ACTIVE" id="u_C_DATETIME_ACTIVE" value="1"<?php echo ($t_lichcongtac->C_DATETIME_ACTIVE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CellAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CellAttributes() ?>><span id="el_C_DATETIME_ACTIVE">
</span><?php echo $t_lichcongtac->C_DATETIME_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_lichcongtac->C_PUBLISH->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_PUBLISH->CellAttributes() ?>>
<input type="checkbox" name="u_C_PUBLISH" id="u_C_PUBLISH" value="1"<?php echo ($t_lichcongtac->C_PUBLISH->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_PUBLISH->CellAttributes() ?>><?php echo $t_lichcongtac->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_PUBLISH->CellAttributes() ?>><span id="el_C_PUBLISH">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac->C_PUBLISH->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac->C_PUBLISH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_DATETIME_PUBLISH->Visible) { // C_DATETIME_PUBLISH ?>
	<tr<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CellAttributes() ?>>
<input type="checkbox" name="u_C_DATETIME_PUBLISH" id="u_C_DATETIME_PUBLISH" value="1"<?php echo ($t_lichcongtac->C_DATETIME_PUBLISH->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CellAttributes() ?>><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CellAttributes() ?>><span id="el_C_DATETIME_PUBLISH">
</span><?php echo $t_lichcongtac->C_DATETIME_PUBLISH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac->C_FK_PUBLISH->Visible) { // C_FK_PUBLISH ?>
	<tr<?php echo $t_lichcongtac->C_FK_PUBLISH->RowAttributes ?>>
		<td<?php echo $t_lichcongtac->C_FK_PUBLISH->CellAttributes() ?>>
<input type="checkbox" name="u_C_FK_PUBLISH" id="u_C_FK_PUBLISH" value="1"<?php echo ($t_lichcongtac->C_FK_PUBLISH->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_lichcongtac->C_FK_PUBLISH->CellAttributes() ?>><?php echo $t_lichcongtac->C_FK_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_lichcongtac->C_FK_PUBLISH->CellAttributes() ?>><span id="el_C_FK_PUBLISH">
</span><?php echo $t_lichcongtac->C_FK_PUBLISH->CustomMsg ?></td>
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
$t_lichcongtac_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lichcongtac_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_lichcongtac';

	// Page object name
	var $PageObjName = 't_lichcongtac_update';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) $PageUrl .= "t=" . $t_lichcongtac->TableVar . "&"; // Add page token
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
		global $objForm, $t_lichcongtac;
		if ($t_lichcongtac->UseTokenInUrl) {
			if ($objForm)
				return ($t_lichcongtac->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lichcongtac->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lichcongtac_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lichcongtac)
		$GLOBALS["t_lichcongtac"] = new ct_lichcongtac();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lichcongtac', TRUE);

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
		global $t_lichcongtac;

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
			$this->Page_Terminate("t_lichcongtaclist.php");
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
		global $objForm, $Language, $gsFormError, $t_lichcongtac;

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
				$t_lichcongtac->CurrentAction = $_POST["a_update"];

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
					$t_lichcongtac->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_lichcongtaclist.php"); // No records selected, return to list
		switch ($t_lichcongtac->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_lichcongtac->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_lichcongtac->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_lichcongtac;
		$t_lichcongtac->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$t_lichcongtac->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
					$t_lichcongtac->C_TITLE->setDbValue($rs->fields('C_TITLE'));
					$t_lichcongtac->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
					$t_lichcongtac->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
					$t_lichcongtac->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
					$t_lichcongtac->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
					$t_lichcongtac->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
					$t_lichcongtac->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
					$t_lichcongtac->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
					$t_lichcongtac->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
					$t_lichcongtac->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
					$t_lichcongtac->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
					$t_lichcongtac->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
					$t_lichcongtac->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
					$t_lichcongtac->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
					$t_lichcongtac->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
				} else {
					if (!ew_CompareValue($t_lichcongtac->FK_SB_ID->DbValue, $rs->fields('FK_SB_ID')))
						$t_lichcongtac->FK_SB_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_TITLE->DbValue, $rs->fields('C_TITLE')))
						$t_lichcongtac->C_TITLE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_DATE_STAR->DbValue, $rs->fields('C_DATE_STAR')))
						$t_lichcongtac->C_DATE_STAR->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_HOUR_START->DbValue, $rs->fields('C_HOUR_START')))
						$t_lichcongtac->C_HOUR_START->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_MINUTES_STAR->DbValue, $rs->fields('C_MINUTES_STAR')))
						$t_lichcongtac->C_MINUTES_STAR->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_STATUS_STAR->DbValue, $rs->fields('C_STATUS_STAR')))
						$t_lichcongtac->C_STATUS_STAR->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_DATE_END->DbValue, $rs->fields('C_DATE_END')))
						$t_lichcongtac->C_DATE_END->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_HOUR_END->DbValue, $rs->fields('C_HOUR_END')))
						$t_lichcongtac->C_HOUR_END->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_MINUTES_END->DbValue, $rs->fields('C_MINUTES_END')))
						$t_lichcongtac->C_MINUTES_END->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_STATUS_END->DbValue, $rs->fields('C_STATUS_END')))
						$t_lichcongtac->C_STATUS_END->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_PARTICIPANTS_ID->DbValue, $rs->fields('C_PARTICIPANTS_ID')))
						$t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_ACTIVE->DbValue, $rs->fields('C_ACTIVE')))
						$t_lichcongtac->C_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_DATETIME_ACTIVE->DbValue, $rs->fields('C_DATETIME_ACTIVE')))
						$t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_PUBLISH->DbValue, $rs->fields('C_PUBLISH')))
						$t_lichcongtac->C_PUBLISH->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_DATETIME_PUBLISH->DbValue, $rs->fields('C_DATETIME_PUBLISH')))
						$t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue = NULL;
					if (!ew_CompareValue($t_lichcongtac->C_FK_PUBLISH->DbValue, $rs->fields('C_FK_PUBLISH')))
						$t_lichcongtac->C_FK_PUBLISH->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_lichcongtac;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_lichcongtac->KeyFilter();
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
		global $t_lichcongtac;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_lichcongtac->C_CADENLAR_ID->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_lichcongtac;
		$conn->BeginTrans();

		// Get old recordset
		$t_lichcongtac->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_lichcongtac->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_lichcongtac->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $t_lichcongtac;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_lichcongtac;
		$t_lichcongtac->FK_SB_ID->setFormValue($objForm->GetValue("x_FK_SB_ID"));
		$t_lichcongtac->FK_SB_ID->MultiUpdate = $objForm->GetValue("u_FK_SB_ID");
		$t_lichcongtac->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_lichcongtac->C_TITLE->MultiUpdate = $objForm->GetValue("u_C_TITLE");
		$t_lichcongtac->C_DATE_STAR->setFormValue($objForm->GetValue("x_C_DATE_STAR"));
		$t_lichcongtac->C_DATE_STAR->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATE_STAR->CurrentValue, 7);
		$t_lichcongtac->C_DATE_STAR->MultiUpdate = $objForm->GetValue("u_C_DATE_STAR");
		$t_lichcongtac->C_HOUR_START->setFormValue($objForm->GetValue("x_C_HOUR_START"));
		$t_lichcongtac->C_HOUR_START->MultiUpdate = $objForm->GetValue("u_C_HOUR_START");
		$t_lichcongtac->C_MINUTES_STAR->setFormValue($objForm->GetValue("x_C_MINUTES_STAR"));
		$t_lichcongtac->C_MINUTES_STAR->MultiUpdate = $objForm->GetValue("u_C_MINUTES_STAR");
		$t_lichcongtac->C_STATUS_STAR->setFormValue($objForm->GetValue("x_C_STATUS_STAR"));
		$t_lichcongtac->C_STATUS_STAR->MultiUpdate = $objForm->GetValue("u_C_STATUS_STAR");
		$t_lichcongtac->C_DATE_END->setFormValue($objForm->GetValue("x_C_DATE_END"));
		$t_lichcongtac->C_DATE_END->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATE_END->CurrentValue, 7);
		$t_lichcongtac->C_DATE_END->MultiUpdate = $objForm->GetValue("u_C_DATE_END");
		$t_lichcongtac->C_HOUR_END->setFormValue($objForm->GetValue("x_C_HOUR_END"));
		$t_lichcongtac->C_HOUR_END->MultiUpdate = $objForm->GetValue("u_C_HOUR_END");
		$t_lichcongtac->C_MINUTES_END->setFormValue($objForm->GetValue("x_C_MINUTES_END"));
		$t_lichcongtac->C_MINUTES_END->MultiUpdate = $objForm->GetValue("u_C_MINUTES_END");
		$t_lichcongtac->C_STATUS_END->setFormValue($objForm->GetValue("x_C_STATUS_END"));
		$t_lichcongtac->C_STATUS_END->MultiUpdate = $objForm->GetValue("u_C_STATUS_END");
		$t_lichcongtac->C_PARTICIPANTS_ID->setFormValue($objForm->GetValue("x_C_PARTICIPANTS_ID"));
		$t_lichcongtac->C_PARTICIPANTS_ID->MultiUpdate = $objForm->GetValue("u_C_PARTICIPANTS_ID");
		$t_lichcongtac->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_lichcongtac->C_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE");
		$t_lichcongtac->C_DATETIME_ACTIVE->setFormValue($objForm->GetValue("x_C_DATETIME_ACTIVE"));
		$t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue, 7);
		$t_lichcongtac->C_DATETIME_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_DATETIME_ACTIVE");
		$t_lichcongtac->C_PUBLISH->setFormValue($objForm->GetValue("x_C_PUBLISH"));
		$t_lichcongtac->C_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_PUBLISH");
		$t_lichcongtac->C_DATETIME_PUBLISH->setFormValue($objForm->GetValue("x_C_DATETIME_PUBLISH"));
		$t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue, 7);
		$t_lichcongtac->C_DATETIME_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_DATETIME_PUBLISH");
		$t_lichcongtac->C_FK_PUBLISH->setFormValue($objForm->GetValue("x_C_FK_PUBLISH"));
		$t_lichcongtac->C_FK_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_FK_PUBLISH");
		$t_lichcongtac->C_CADENLAR_ID->setFormValue($objForm->GetValue("x_C_CADENLAR_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_lichcongtac;
		$t_lichcongtac->C_CADENLAR_ID->CurrentValue = $t_lichcongtac->C_CADENLAR_ID->FormValue;
		$t_lichcongtac->FK_SB_ID->CurrentValue = $t_lichcongtac->FK_SB_ID->FormValue;
		$t_lichcongtac->C_TITLE->CurrentValue = $t_lichcongtac->C_TITLE->FormValue;
		$t_lichcongtac->C_DATE_STAR->CurrentValue = $t_lichcongtac->C_DATE_STAR->FormValue;
		$t_lichcongtac->C_DATE_STAR->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATE_STAR->CurrentValue, 7);
		$t_lichcongtac->C_HOUR_START->CurrentValue = $t_lichcongtac->C_HOUR_START->FormValue;
		$t_lichcongtac->C_MINUTES_STAR->CurrentValue = $t_lichcongtac->C_MINUTES_STAR->FormValue;
		$t_lichcongtac->C_STATUS_STAR->CurrentValue = $t_lichcongtac->C_STATUS_STAR->FormValue;
		$t_lichcongtac->C_DATE_END->CurrentValue = $t_lichcongtac->C_DATE_END->FormValue;
		$t_lichcongtac->C_DATE_END->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATE_END->CurrentValue, 7);
		$t_lichcongtac->C_HOUR_END->CurrentValue = $t_lichcongtac->C_HOUR_END->FormValue;
		$t_lichcongtac->C_MINUTES_END->CurrentValue = $t_lichcongtac->C_MINUTES_END->FormValue;
		$t_lichcongtac->C_STATUS_END->CurrentValue = $t_lichcongtac->C_STATUS_END->FormValue;
		$t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue = $t_lichcongtac->C_PARTICIPANTS_ID->FormValue;
		$t_lichcongtac->C_ACTIVE->CurrentValue = $t_lichcongtac->C_ACTIVE->FormValue;
		$t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue = $t_lichcongtac->C_DATETIME_ACTIVE->FormValue;
		$t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue, 7);
		$t_lichcongtac->C_PUBLISH->CurrentValue = $t_lichcongtac->C_PUBLISH->FormValue;
		$t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue = $t_lichcongtac->C_DATETIME_PUBLISH->FormValue;
		$t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue, 7);
		$t_lichcongtac->C_FK_PUBLISH->CurrentValue = $t_lichcongtac->C_FK_PUBLISH->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_lichcongtac;

		// Call Recordset Selecting event
		$t_lichcongtac->Recordset_Selecting($t_lichcongtac->CurrentFilter);

		// Load List page SQL
		$sSql = $t_lichcongtac->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_lichcongtac->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lichcongtac;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lichcongtac->Row_Rendering();

		// Common render codes for all row types
		// FK_SB_ID

		$t_lichcongtac->FK_SB_ID->CellCssStyle = ""; $t_lichcongtac->FK_SB_ID->CellCssClass = "";
		$t_lichcongtac->FK_SB_ID->CellAttrs = array(); $t_lichcongtac->FK_SB_ID->ViewAttrs = array(); $t_lichcongtac->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$t_lichcongtac->C_TITLE->CellCssStyle = ""; $t_lichcongtac->C_TITLE->CellCssClass = "";
		$t_lichcongtac->C_TITLE->CellAttrs = array(); $t_lichcongtac->C_TITLE->ViewAttrs = array(); $t_lichcongtac->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$t_lichcongtac->C_DATE_STAR->CellCssStyle = ""; $t_lichcongtac->C_DATE_STAR->CellCssClass = "";
		$t_lichcongtac->C_DATE_STAR->CellAttrs = array(); $t_lichcongtac->C_DATE_STAR->ViewAttrs = array(); $t_lichcongtac->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$t_lichcongtac->C_HOUR_START->CellCssStyle = ""; $t_lichcongtac->C_HOUR_START->CellCssClass = "";
		$t_lichcongtac->C_HOUR_START->CellAttrs = array(); $t_lichcongtac->C_HOUR_START->ViewAttrs = array(); $t_lichcongtac->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$t_lichcongtac->C_MINUTES_STAR->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_STAR->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_STAR->CellAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$t_lichcongtac->C_STATUS_STAR->CellCssStyle = ""; $t_lichcongtac->C_STATUS_STAR->CellCssClass = "";
		$t_lichcongtac->C_STATUS_STAR->CellAttrs = array(); $t_lichcongtac->C_STATUS_STAR->ViewAttrs = array(); $t_lichcongtac->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$t_lichcongtac->C_DATE_END->CellCssStyle = ""; $t_lichcongtac->C_DATE_END->CellCssClass = "";
		$t_lichcongtac->C_DATE_END->CellAttrs = array(); $t_lichcongtac->C_DATE_END->ViewAttrs = array(); $t_lichcongtac->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$t_lichcongtac->C_HOUR_END->CellCssStyle = ""; $t_lichcongtac->C_HOUR_END->CellCssClass = "";
		$t_lichcongtac->C_HOUR_END->CellAttrs = array(); $t_lichcongtac->C_HOUR_END->ViewAttrs = array(); $t_lichcongtac->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$t_lichcongtac->C_MINUTES_END->CellCssStyle = ""; $t_lichcongtac->C_MINUTES_END->CellCssClass = "";
		$t_lichcongtac->C_MINUTES_END->CellAttrs = array(); $t_lichcongtac->C_MINUTES_END->ViewAttrs = array(); $t_lichcongtac->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$t_lichcongtac->C_STATUS_END->CellCssStyle = ""; $t_lichcongtac->C_STATUS_END->CellCssClass = "";
		$t_lichcongtac->C_STATUS_END->CellAttrs = array(); $t_lichcongtac->C_STATUS_END->ViewAttrs = array(); $t_lichcongtac->C_STATUS_END->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$t_lichcongtac->C_PARTICIPANTS_ID->CellCssStyle = ""; $t_lichcongtac->C_PARTICIPANTS_ID->CellCssClass = "";
		$t_lichcongtac->C_PARTICIPANTS_ID->CellAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->ViewAttrs = array(); $t_lichcongtac->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_ACTIVE
		$t_lichcongtac->C_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_ACTIVE->EditAttrs = array();

		// C_DATETIME_ACTIVE
		$t_lichcongtac->C_DATETIME_ACTIVE->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_ACTIVE->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_ACTIVE->CellAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$t_lichcongtac->C_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$t_lichcongtac->C_DATETIME_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_DATETIME_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_DATETIME_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$t_lichcongtac->C_FK_PUBLISH->CellCssStyle = ""; $t_lichcongtac->C_FK_PUBLISH->CellCssClass = "";
		$t_lichcongtac->C_FK_PUBLISH->CellAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->ViewAttrs = array(); $t_lichcongtac->C_FK_PUBLISH->EditAttrs = array();
		if ($t_lichcongtac->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_CADENLAR_ID
			$t_lichcongtac->C_CADENLAR_ID->ViewValue = $t_lichcongtac->C_CADENLAR_ID->CurrentValue;
			$t_lichcongtac->C_CADENLAR_ID->CssStyle = "";
			$t_lichcongtac->C_CADENLAR_ID->CssClass = "";
			$t_lichcongtac->C_CADENLAR_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_lichcongtac->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_CONGTY->ViewValue = $t_lichcongtac->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_CONGTY->ViewValue = NULL;
			}
			$t_lichcongtac->FK_CONGTY->CssStyle = "";
			$t_lichcongtac->FK_CONGTY->CssClass = "";
			$t_lichcongtac->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			if (strval($t_lichcongtac->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac->FK_SB_ID->ViewValue = $t_lichcongtac->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->FK_SB_ID->ViewValue = NULL;
			}
			$t_lichcongtac->FK_SB_ID->CssStyle = "";
			$t_lichcongtac->FK_SB_ID->CssClass = "";
			$t_lichcongtac->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->ViewValue = $t_lichcongtac->C_TITLE->CurrentValue;
			$t_lichcongtac->C_TITLE->CssStyle = "";
			$t_lichcongtac->C_TITLE->CssClass = "";
			$t_lichcongtac->C_TITLE->ViewCustomAttributes = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->ViewValue = $t_lichcongtac->C_DATE_STAR->CurrentValue;
			$t_lichcongtac->C_DATE_STAR->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_STAR->ViewValue, 7);
			$t_lichcongtac->C_DATE_STAR->CssStyle = "";
			$t_lichcongtac->C_DATE_STAR->CssClass = "";
			$t_lichcongtac->C_DATE_STAR->ViewCustomAttributes = "";

			// C_HOUR_START
			if (strval($t_lichcongtac->C_HOUR_START->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_START->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_START->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_HOUR_START->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_HOUR_START->ViewValue = $t_lichcongtac->C_HOUR_START->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_START->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_START->CssStyle = "";
			$t_lichcongtac->C_HOUR_START->CssClass = "";
			$t_lichcongtac->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
			if (strval($t_lichcongtac->C_MINUTES_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_STAR->ViewValue = $t_lichcongtac->C_MINUTES_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
			if (strval($t_lichcongtac->C_STATUS_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_STAR->ViewValue = "Khong xac dinh";
						break;
					default:
						$t_lichcongtac->C_STATUS_STAR->ViewValue = $t_lichcongtac->C_STATUS_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_STAR->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac->C_STATUS_STAR->ViewCustomAttributes = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->ViewValue = $t_lichcongtac->C_DATE_END->CurrentValue;
			$t_lichcongtac->C_DATE_END->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATE_END->ViewValue, 7);
			$t_lichcongtac->C_DATE_END->CssStyle = "";
			$t_lichcongtac->C_DATE_END->CssClass = "";
			$t_lichcongtac->C_DATE_END->ViewCustomAttributes = "";

			// C_HOUR_END
			if (strval($t_lichcongtac->C_HOUR_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_HOUR_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_HOUR_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac->C_HOUR_END->ViewValue = $t_lichcongtac->C_HOUR_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_HOUR_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_HOUR_END->CssStyle = "";
			$t_lichcongtac->C_HOUR_END->CssClass = "";
			$t_lichcongtac->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
			if (strval($t_lichcongtac->C_MINUTES_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_MINUTES_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac->C_MINUTES_END->ViewValue = "1";
						break;
					default:
						$t_lichcongtac->C_MINUTES_END->ViewValue = $t_lichcongtac->C_MINUTES_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_MINUTES_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac->C_MINUTES_END->CssClass = "";
			$t_lichcongtac->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
			if (strval($t_lichcongtac->C_STATUS_END->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_STATUS_END->CurrentValue) {
					case "0":
						$t_lichcongtac->C_STATUS_END->ViewValue = "Khong xac dinh";
						break;
					default:
						$t_lichcongtac->C_STATUS_END->ViewValue = $t_lichcongtac->C_STATUS_END->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_STATUS_END->ViewValue = NULL;
			}
			$t_lichcongtac->C_STATUS_END->CssStyle = "";
			$t_lichcongtac->C_STATUS_END->CssClass = "";
			$t_lichcongtac->C_STATUS_END->ViewCustomAttributes = "";

			// C_ORGANIZATION
			$t_lichcongtac->C_ORGANIZATION->ViewValue = $t_lichcongtac->C_ORGANIZATION->CurrentValue;
			$t_lichcongtac->C_ORGANIZATION->CssStyle = "";
			$t_lichcongtac->C_ORGANIZATION->CssClass = "";
			$t_lichcongtac->C_ORGANIZATION->ViewCustomAttributes = "";

			// C_PARTICIPANTS_ID
			if (strval($t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue) <> "") {
				$arwrk = explode(",", $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_MACONGTY` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_lichcongtac->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_PARTICIPANTS_ID->ViewValue = NULL;
			}
			$t_lichcongtac->C_PARTICIPANTS_ID->CssStyle = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->CssClass = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac->C_WHERE->ViewValue = $t_lichcongtac->C_WHERE->CurrentValue;
			$t_lichcongtac->C_WHERE->CssStyle = "";
			$t_lichcongtac->C_WHERE->CssClass = "";
			$t_lichcongtac->C_WHERE->ViewCustomAttributes = "";

			// C_PREPARED
			$t_lichcongtac->C_PREPARED->ViewValue = $t_lichcongtac->C_PREPARED->CurrentValue;
			$t_lichcongtac->C_PREPARED->CssStyle = "";
			$t_lichcongtac->C_PREPARED->CssClass = "";
			$t_lichcongtac->C_PREPARED->ViewCustomAttributes = "";

			// C_OPTION
			if (strval($t_lichcongtac->C_OPTION->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_OPTION->CurrentValue) {
					case "0":
						$t_lichcongtac->C_OPTION->ViewValue = "su kien cong khai";
						break;
					case "1":
						$t_lichcongtac->C_OPTION->ViewValue = "su kien quan trong";
						break;
					default:
						$t_lichcongtac->C_OPTION->ViewValue = $t_lichcongtac->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_OPTION->ViewValue = NULL;
			}
			$t_lichcongtac->C_OPTION->CssStyle = "";
			$t_lichcongtac->C_OPTION->CssClass = "";
			$t_lichcongtac->C_OPTION->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lichcongtac->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Khong xuat ban levelsite";
						break;
					case "1":
						$t_lichcongtac->C_ACTIVE->ViewValue = "Xuat ban level site";
						break;
					default:
						$t_lichcongtac->C_ACTIVE->ViewValue = $t_lichcongtac->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_ACTIVE->ViewValue = NULL;
			}
			$t_lichcongtac->C_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_ACTIVE->CssClass = "";
			$t_lichcongtac->C_ACTIVE->ViewCustomAttributes = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = $t_lichcongtac->C_DATETIME_ACTIVE->CurrentValue;
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_ACTIVE->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_ACTIVE->CssStyle = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->CssClass = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_lichcongtac->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_lichcongtac->C_PUBLISH->CurrentValue) {
					case "0":
						$t_lichcongtac->C_PUBLISH->ViewValue = "khong xuat ban mainsite";
						break;
					case "1":
						$t_lichcongtac->C_PUBLISH->ViewValue = "xuat ban mainsite";
						break;
					default:
						$t_lichcongtac->C_PUBLISH->ViewValue = $t_lichcongtac->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_lichcongtac->C_PUBLISH->ViewValue = NULL;
			}
			$t_lichcongtac->C_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_PUBLISH->CssClass = "";
			$t_lichcongtac->C_PUBLISH->ViewCustomAttributes = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = $t_lichcongtac->C_DATETIME_PUBLISH->CurrentValue;
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($t_lichcongtac->C_DATETIME_PUBLISH->ViewValue, 7);
			$t_lichcongtac->C_DATETIME_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->CssClass = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->ViewValue = $t_lichcongtac->C_FK_PUBLISH->CurrentValue;
			$t_lichcongtac->C_FK_PUBLISH->CssStyle = "";
			$t_lichcongtac->C_FK_PUBLISH->CssClass = "";
			$t_lichcongtac->C_FK_PUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lichcongtac->C_USER_ADD->ViewValue = $t_lichcongtac->C_USER_ADD->CurrentValue;
			$t_lichcongtac->C_USER_ADD->CssStyle = "";
			$t_lichcongtac->C_USER_ADD->CssClass = "";
			$t_lichcongtac->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lichcongtac->C_ADD_TIME->ViewValue = $t_lichcongtac->C_ADD_TIME->CurrentValue;
			$t_lichcongtac->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_ADD_TIME->ViewValue, 7);
			$t_lichcongtac->C_ADD_TIME->CssStyle = "";
			$t_lichcongtac->C_ADD_TIME->CssClass = "";
			$t_lichcongtac->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lichcongtac->C_USER_EDIT->ViewValue = $t_lichcongtac->C_USER_EDIT->CurrentValue;
			$t_lichcongtac->C_USER_EDIT->CssStyle = "";
			$t_lichcongtac->C_USER_EDIT->CssClass = "";
			$t_lichcongtac->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lichcongtac->C_EDIT_TIME->ViewValue = $t_lichcongtac->C_EDIT_TIME->CurrentValue;
			$t_lichcongtac->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac->C_EDIT_TIME->ViewValue, 7);
			$t_lichcongtac->C_EDIT_TIME->CssStyle = "";
			$t_lichcongtac->C_EDIT_TIME->CssClass = "";
			$t_lichcongtac->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_SB_ID
			$t_lichcongtac->FK_SB_ID->HrefValue = "";
			$t_lichcongtac->FK_SB_ID->TooltipValue = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->HrefValue = "";
			$t_lichcongtac->C_TITLE->TooltipValue = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->HrefValue = "";
			$t_lichcongtac->C_DATE_STAR->TooltipValue = "";

			// C_HOUR_START
			$t_lichcongtac->C_HOUR_START->HrefValue = "";
			$t_lichcongtac->C_HOUR_START->TooltipValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac->C_MINUTES_STAR->HrefValue = "";
			$t_lichcongtac->C_MINUTES_STAR->TooltipValue = "";

			// C_STATUS_STAR
			$t_lichcongtac->C_STATUS_STAR->HrefValue = "";
			$t_lichcongtac->C_STATUS_STAR->TooltipValue = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->HrefValue = "";
			$t_lichcongtac->C_DATE_END->TooltipValue = "";

			// C_HOUR_END
			$t_lichcongtac->C_HOUR_END->HrefValue = "";
			$t_lichcongtac->C_HOUR_END->TooltipValue = "";

			// C_MINUTES_END
			$t_lichcongtac->C_MINUTES_END->HrefValue = "";
			$t_lichcongtac->C_MINUTES_END->TooltipValue = "";

			// C_STATUS_END
			$t_lichcongtac->C_STATUS_END->HrefValue = "";
			$t_lichcongtac->C_STATUS_END->TooltipValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac->C_PARTICIPANTS_ID->HrefValue = "";
			$t_lichcongtac->C_PARTICIPANTS_ID->TooltipValue = "";

			// C_ACTIVE
			$t_lichcongtac->C_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_ACTIVE->TooltipValue = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->HrefValue = "";
			$t_lichcongtac->C_DATETIME_ACTIVE->TooltipValue = "";

			// C_PUBLISH
			$t_lichcongtac->C_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_PUBLISH->TooltipValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_DATETIME_PUBLISH->TooltipValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->HrefValue = "";
			$t_lichcongtac->C_FK_PUBLISH->TooltipValue = "";
		} elseif ($t_lichcongtac->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_SB_ID
			$t_lichcongtac->FK_SB_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `SB_ID`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmuclich`";
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
			$t_lichcongtac->FK_SB_ID->EditValue = $arwrk;

			// C_TITLE
			$t_lichcongtac->C_TITLE->EditCustomAttributes = "";
			$t_lichcongtac->C_TITLE->EditValue = ew_HtmlEncode($t_lichcongtac->C_TITLE->CurrentValue);

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->EditCustomAttributes = "";
			$t_lichcongtac->C_DATE_STAR->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_lichcongtac->C_DATE_STAR->CurrentValue, 7));

			// C_HOUR_START
			$t_lichcongtac->C_HOUR_START->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			$arwrk[] = array("1", "1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac->C_HOUR_START->EditValue = $arwrk;

			// C_MINUTES_STAR
			$t_lichcongtac->C_MINUTES_STAR->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			$arwrk[] = array("1", "1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac->C_MINUTES_STAR->EditValue = $arwrk;

			// C_STATUS_STAR
			$t_lichcongtac->C_STATUS_STAR->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xac dinh");
			$t_lichcongtac->C_STATUS_STAR->EditValue = $arwrk;

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->EditCustomAttributes = "";
			$t_lichcongtac->C_DATE_END->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_lichcongtac->C_DATE_END->CurrentValue, 7));

			// C_HOUR_END
			$t_lichcongtac->C_HOUR_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac->C_HOUR_END->EditValue = $arwrk;

			// C_MINUTES_END
			$t_lichcongtac->C_MINUTES_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "0");
			$arwrk[] = array("1", "1");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac->C_MINUTES_END->EditValue = $arwrk;

			// C_STATUS_END
			$t_lichcongtac->C_STATUS_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xac dinh");
			$t_lichcongtac->C_STATUS_END->EditValue = $arwrk;

			// C_PARTICIPANTS_ID
			$t_lichcongtac->C_PARTICIPANTS_ID->EditCustomAttributes = "";
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
			$t_lichcongtac->C_PARTICIPANTS_ID->EditValue = $arwrk;

			// C_ACTIVE
			$t_lichcongtac->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xuat ban levelsite");
			$arwrk[] = array("1", "Xuat ban level site");
			$t_lichcongtac->C_ACTIVE->EditValue = $arwrk;

			// C_DATETIME_ACTIVE
			// C_PUBLISH

			$t_lichcongtac->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "khong xuat ban mainsite");
			$arwrk[] = array("1", "xuat ban mainsite");
			$t_lichcongtac->C_PUBLISH->EditValue = $arwrk;

			// C_DATETIME_PUBLISH
			// C_FK_PUBLISH
			// Edit refer script
			// FK_SB_ID

			$t_lichcongtac->FK_SB_ID->HrefValue = "";

			// C_TITLE
			$t_lichcongtac->C_TITLE->HrefValue = "";

			// C_DATE_STAR
			$t_lichcongtac->C_DATE_STAR->HrefValue = "";

			// C_HOUR_START
			$t_lichcongtac->C_HOUR_START->HrefValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac->C_MINUTES_STAR->HrefValue = "";

			// C_STATUS_STAR
			$t_lichcongtac->C_STATUS_STAR->HrefValue = "";

			// C_DATE_END
			$t_lichcongtac->C_DATE_END->HrefValue = "";

			// C_HOUR_END
			$t_lichcongtac->C_HOUR_END->HrefValue = "";

			// C_MINUTES_END
			$t_lichcongtac->C_MINUTES_END->HrefValue = "";

			// C_STATUS_END
			$t_lichcongtac->C_STATUS_END->HrefValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac->C_PARTICIPANTS_ID->HrefValue = "";

			// C_ACTIVE
			$t_lichcongtac->C_ACTIVE->HrefValue = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac->C_DATETIME_ACTIVE->HrefValue = "";

			// C_PUBLISH
			$t_lichcongtac->C_PUBLISH->HrefValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac->C_DATETIME_PUBLISH->HrefValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac->C_FK_PUBLISH->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_lichcongtac->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lichcongtac->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_lichcongtac;

		// Initialize form error message
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($t_lichcongtac->FK_SB_ID->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_TITLE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_DATE_STAR->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_HOUR_START->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_MINUTES_STAR->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_STATUS_STAR->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_DATE_END->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_HOUR_END->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_MINUTES_END->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_STATUS_END->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_PARTICIPANTS_ID->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_DATETIME_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_PUBLISH->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_DATETIME_PUBLISH->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_lichcongtac->C_FK_PUBLISH->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = $Language->Phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_lichcongtac->FK_SB_ID->MultiUpdate <> "" && !is_null($t_lichcongtac->FK_SB_ID->FormValue) && $t_lichcongtac->FK_SB_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->FK_SB_ID->FldCaption();
		}
		if ($t_lichcongtac->C_TITLE->MultiUpdate <> "" && !is_null($t_lichcongtac->C_TITLE->FormValue) && $t_lichcongtac->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_TITLE->FldCaption();
		}
		if ($t_lichcongtac->C_DATE_STAR->MultiUpdate <> "" && !is_null($t_lichcongtac->C_DATE_STAR->FormValue) && $t_lichcongtac->C_DATE_STAR->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_DATE_STAR->FldCaption();
		}
		if ($t_lichcongtac->C_DATE_STAR->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_lichcongtac->C_DATE_STAR->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_lichcongtac->C_DATE_STAR->FldErrMsg;
			}
		}
		if ($t_lichcongtac->C_HOUR_START->MultiUpdate <> "" && !is_null($t_lichcongtac->C_HOUR_START->FormValue) && $t_lichcongtac->C_HOUR_START->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_HOUR_START->FldCaption();
		}
		if ($t_lichcongtac->C_MINUTES_STAR->MultiUpdate <> "" && !is_null($t_lichcongtac->C_MINUTES_STAR->FormValue) && $t_lichcongtac->C_MINUTES_STAR->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_MINUTES_STAR->FldCaption();
		}
		if ($t_lichcongtac->C_DATE_END->MultiUpdate <> "" && !is_null($t_lichcongtac->C_DATE_END->FormValue) && $t_lichcongtac->C_DATE_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_DATE_END->FldCaption();
		}
		if ($t_lichcongtac->C_DATE_END->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_lichcongtac->C_DATE_END->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_lichcongtac->C_DATE_END->FldErrMsg;
			}
		}
		if ($t_lichcongtac->C_HOUR_END->MultiUpdate <> "" && !is_null($t_lichcongtac->C_HOUR_END->FormValue) && $t_lichcongtac->C_HOUR_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_HOUR_END->FldCaption();
		}
		if ($t_lichcongtac->C_MINUTES_END->MultiUpdate <> "" && !is_null($t_lichcongtac->C_MINUTES_END->FormValue) && $t_lichcongtac->C_MINUTES_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_MINUTES_END->FldCaption();
		}
		if ($t_lichcongtac->C_STATUS_END->MultiUpdate <> "" && $t_lichcongtac->C_STATUS_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_STATUS_END->FldCaption();
		}
		if ($t_lichcongtac->C_PARTICIPANTS_ID->MultiUpdate <> "" && $t_lichcongtac->C_PARTICIPANTS_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_PARTICIPANTS_ID->FldCaption();
		}
		if ($t_lichcongtac->C_ACTIVE->MultiUpdate <> "" && $t_lichcongtac->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_ACTIVE->FldCaption();
		}
		if ($t_lichcongtac->C_PUBLISH->MultiUpdate <> "" && $t_lichcongtac->C_PUBLISH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac->C_PUBLISH->FldCaption();
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
		global $conn, $Security, $Language, $t_lichcongtac;
		$sFilter = $t_lichcongtac->KeyFilter();
		$t_lichcongtac->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac->SQL();
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

			// FK_SB_ID
						if ($t_lichcongtac->FK_SB_ID->MultiUpdate == "1") {
			$t_lichcongtac->FK_SB_ID->SetDbValueDef($rsnew, $t_lichcongtac->FK_SB_ID->CurrentValue, 0, FALSE);
			}

			// C_TITLE
						if ($t_lichcongtac->C_TITLE->MultiUpdate == "1") {
			$t_lichcongtac->C_TITLE->SetDbValueDef($rsnew, $t_lichcongtac->C_TITLE->CurrentValue, NULL, FALSE);
			}

			// C_DATE_STAR
						if ($t_lichcongtac->C_DATE_STAR->MultiUpdate == "1") {
			$t_lichcongtac->C_DATE_STAR->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_lichcongtac->C_DATE_STAR->CurrentValue, 7, FALSE), NULL);
			}

			// C_HOUR_START
						if ($t_lichcongtac->C_HOUR_START->MultiUpdate == "1") {
			$t_lichcongtac->C_HOUR_START->SetDbValueDef($rsnew, $t_lichcongtac->C_HOUR_START->CurrentValue, NULL, FALSE);
			}

			// C_MINUTES_STAR
						if ($t_lichcongtac->C_MINUTES_STAR->MultiUpdate == "1") {
			$t_lichcongtac->C_MINUTES_STAR->SetDbValueDef($rsnew, $t_lichcongtac->C_MINUTES_STAR->CurrentValue, NULL, FALSE);
			}

			// C_STATUS_STAR
						if ($t_lichcongtac->C_STATUS_STAR->MultiUpdate == "1") {
			$t_lichcongtac->C_STATUS_STAR->SetDbValueDef($rsnew, $t_lichcongtac->C_STATUS_STAR->CurrentValue, NULL, FALSE);
			}

			// C_DATE_END
						if ($t_lichcongtac->C_DATE_END->MultiUpdate == "1") {
			$t_lichcongtac->C_DATE_END->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_lichcongtac->C_DATE_END->CurrentValue, 7, FALSE), NULL);
			}

			// C_HOUR_END
						if ($t_lichcongtac->C_HOUR_END->MultiUpdate == "1") {
			$t_lichcongtac->C_HOUR_END->SetDbValueDef($rsnew, $t_lichcongtac->C_HOUR_END->CurrentValue, NULL, FALSE);
			}

			// C_MINUTES_END
						if ($t_lichcongtac->C_MINUTES_END->MultiUpdate == "1") {
			$t_lichcongtac->C_MINUTES_END->SetDbValueDef($rsnew, $t_lichcongtac->C_MINUTES_END->CurrentValue, NULL, FALSE);
			}

			// C_STATUS_END
						if ($t_lichcongtac->C_STATUS_END->MultiUpdate == "1") {
			$t_lichcongtac->C_STATUS_END->SetDbValueDef($rsnew, $t_lichcongtac->C_STATUS_END->CurrentValue, NULL, FALSE);
			}

			// C_PARTICIPANTS_ID
						if ($t_lichcongtac->C_PARTICIPANTS_ID->MultiUpdate == "1") {
			$t_lichcongtac->C_PARTICIPANTS_ID->SetDbValueDef($rsnew, $t_lichcongtac->C_PARTICIPANTS_ID->CurrentValue, NULL, FALSE);
			}

			// C_ACTIVE
						if ($t_lichcongtac->C_ACTIVE->MultiUpdate == "1") {
			$t_lichcongtac->C_ACTIVE->SetDbValueDef($rsnew, $t_lichcongtac->C_ACTIVE->CurrentValue, NULL, FALSE);
			}

			// C_DATETIME_ACTIVE
						if ($t_lichcongtac->C_DATETIME_ACTIVE->MultiUpdate == "1") {
			$t_lichcongtac->C_DATETIME_ACTIVE->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_DATETIME_ACTIVE'] =& $t_lichcongtac->C_DATETIME_ACTIVE->DbValue;
			}

			// C_PUBLISH
						if ($t_lichcongtac->C_PUBLISH->MultiUpdate == "1") {
			$t_lichcongtac->C_PUBLISH->SetDbValueDef($rsnew, $t_lichcongtac->C_PUBLISH->CurrentValue, NULL, FALSE);
			}

			// C_DATETIME_PUBLISH
						if ($t_lichcongtac->C_DATETIME_PUBLISH->MultiUpdate == "1") {
			$t_lichcongtac->C_DATETIME_PUBLISH->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_DATETIME_PUBLISH'] =& $t_lichcongtac->C_DATETIME_PUBLISH->DbValue;
			}

			// C_FK_PUBLISH
						if ($t_lichcongtac->C_FK_PUBLISH->MultiUpdate == "1") {
			$t_lichcongtac->C_FK_PUBLISH->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_FK_PUBLISH'] =& $t_lichcongtac->C_FK_PUBLISH->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $t_lichcongtac->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_lichcongtac->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_lichcongtac->CancelMessage <> "") {
					$this->setMessage($t_lichcongtac->CancelMessage);
					$t_lichcongtac->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_lichcongtac->Row_Updated($rsold, $rsnew);
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
