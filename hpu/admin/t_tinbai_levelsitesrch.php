<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_levelsiteinfo.php" ?>
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
$t_tinbai_levelsite_search = new ct_tinbai_levelsite_search();
$Page =& $t_tinbai_levelsite_search;

// Page init
$t_tinbai_levelsite_search->Page_Init();

// Page main
$t_tinbai_levelsite_search->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_levelsite_search = new ew_Page("t_tinbai_levelsite_search");

// page properties
t_tinbai_levelsite_search.PageID = "search"; // page ID
t_tinbai_levelsite_search.FormID = "ft_tinbai_levelsitesearch"; // form ID
var EW_PAGE_ID = t_tinbai_levelsite_search.PageID; // for backward compatibility

// extend page with validate function for search
t_tinbai_levelsite_search.ValidateSearch = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (this.ValidateRequired) {
		var infix = "";
		elm = fobj.elements["x" + infix + "_PK_TINBAI_ID"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->PK_TINBAI_ID->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_TIMEPUBLISH"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_TIMEPUBLISH->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_VISITOR"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_VISITOR->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_STATUS"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_STATUS->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_USER_ADD"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_USER_ADD->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ADD_TIME"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_ADD_TIME->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_USER_EDIT"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_USER_EDIT->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_EDIT_TIME"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->C_EDIT_TIME->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FK_EDITOR_ID"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_levelsite->FK_EDITOR_ID->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj))
			return false;
	}
	for (var i=0; i<fobj.elements.length; i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
t_tinbai_levelsite_search.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_levelsite_search.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_levelsite_search.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_levelsite_search.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("Search") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_tinbai_levelsite->TableCaption() ?><br><br>
<a href="<?php echo $t_tinbai_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("BackToList") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_levelsite_search->ShowMessage();
?>
<form name="ft_tinbai_levelsitesearch" id="ft_tinbai_levelsitesearch" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_tinbai_levelsite_search.ValidateSearch(this);">
<p>
<input type="hidden" name="t" id="t" value="t_tinbai_levelsite">
<input type="hidden" name="a_search" id="a_search" value="S">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->PK_TINBAI_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_PK_TINBAI_ID" id="z_PK_TINBAI_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_PK_TINBAI_ID" id="x_PK_TINBAI_ID" title="<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->FldTitle() ?>" value="<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->EditValue ?>"<?php echo $t_tinbai_levelsite->PK_TINBAI_ID->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CONGTY_ID" id="z_FK_CONGTY_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->FK_CONGTY_ID->EditValue)) {
	$arwrk = $t_tinbai_levelsite->FK_CONGTY_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_CHUYENMUC_ID" id="z_FK_CHUYENMUC_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_CHUYENMUC_ID" name="x_FK_CHUYENMUC_ID" title="<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldTitle() ?>"<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue)) {
	$arwrk = $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_CHUYENMUC_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_DOITUONG_ID" id="z_FK_DOITUONG_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_FK_DOITUONG_ID" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->EditAttributes() ?>></label></div>
<div id="dsl_x_FK_DOITUONG_ID" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->FK_DOITUONG_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_TITLE->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_TITLE" id="z_C_TITLE" value="LIKE"></span></td>
		<td<?php echo $t_tinbai_levelsite->C_TITLE->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_tinbai_levelsite->C_TITLE->FldTitle() ?>" size="100" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_TITLE->EditValue ?>"<?php echo $t_tinbai_levelsite->C_TITLE->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SUMARY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_SUMARY->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_SUMARY" id="z_C_SUMARY" value="LIKE"></span></td>
		<td<?php echo $t_tinbai_levelsite->C_SUMARY->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<textarea name="x_C_SUMARY" id="x_C_SUMARY" title="<?php echo $t_tinbai_levelsite->C_SUMARY->FldTitle() ?>" cols="80" rows="4"<?php echo $t_tinbai_levelsite->C_SUMARY->EditAttributes() ?>><?php echo $t_tinbai_levelsite->C_SUMARY->EditValue ?></textarea>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_CONTENTS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_CONTENTS->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_CONTENTS" id="z_C_CONTENTS" value="LIKE"></span></td>
		<td<?php echo $t_tinbai_levelsite->C_CONTENTS->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<textarea name="x_C_CONTENTS" id="x_C_CONTENTS" title="<?php echo $t_tinbai_levelsite->C_CONTENTS->FldTitle() ?>" cols="35" rows="4"<?php echo $t_tinbai_levelsite->C_CONTENTS->EditAttributes() ?>><?php echo $t_tinbai_levelsite->C_CONTENTS->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_tinbai_levelsite->C_CONTENTS->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENTS', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENTS", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENTS', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_PUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_PUBLISH->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_PUBLISH" id="z_C_PUBLISH" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_PUBLISH->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_C_PUBLISH" name="x_C_PUBLISH" title="<?php echo $t_tinbai_levelsite->C_PUBLISH->FldTitle() ?>"<?php echo $t_tinbai_levelsite->C_PUBLISH->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->C_PUBLISH->EditValue)) {
	$arwrk = $t_tinbai_levelsite->C_PUBLISH->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_PUBLISH->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ACTIVE->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ACTIVE" id="z_C_ACTIVE" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_ACTIVE->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_C_ACTIVE" name="x_C_ACTIVE" title="<?php echo $t_tinbai_levelsite->C_ACTIVE->FldTitle() ?>"<?php echo $t_tinbai_levelsite->C_ACTIVE->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->C_ACTIVE->EditValue)) {
	$arwrk = $t_tinbai_levelsite->C_ACTIVE->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_ACTIVE->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_TIMEPUBLISH" id="z_C_TIMEPUBLISH" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_TIMEPUBLISH" id="x_C_TIMEPUBLISH" title="<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->FldTitle() ?>" value="<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->EditValue ?>"<?php echo $t_tinbai_levelsite->C_TIMEPUBLISH->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_COMENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_COMENT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_COMENT->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_COMENT" id="z_C_COMENT" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_COMENT->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_COMENT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_COMENT" id="x_C_COMENT" title="<?php echo $t_tinbai_levelsite->C_COMENT->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_COMENT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_COMENT" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_COMENT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_COMENT->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_COMENT" id="x_C_COMENT" title="<?php echo $t_tinbai_levelsite->C_COMENT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->C_COMENT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_HITS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_HITS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_HITS->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_HITS" id="z_C_HITS" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_HITS->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<div id="tp_x_C_HITS" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_HITS" id="x_C_HITS" title="<?php echo $t_tinbai_levelsite->C_HITS->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_HITS->EditAttributes() ?>></label></div>
<div id="dsl_x_C_HITS" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_HITS->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_HITS->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_HITS" id="x_C_HITS" title="<?php echo $t_tinbai_levelsite->C_HITS->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->C_HITS->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_VISITOR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_VISITOR->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_VISITOR->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_VISITOR" id="z_C_VISITOR" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_VISITOR->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_VISITOR" id="x_C_VISITOR" title="<?php echo $t_tinbai_levelsite->C_VISITOR->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_VISITOR->EditValue ?>"<?php echo $t_tinbai_levelsite->C_VISITOR->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_STATUS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_STATUS->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_STATUS" id="z_C_STATUS" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_STATUS->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_STATUS" id="x_C_STATUS" title="<?php echo $t_tinbai_levelsite->C_STATUS->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_STATUS->EditValue ?>"<?php echo $t_tinbai_levelsite->C_STATUS->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_SOURCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SOURCE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_SOURCE->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("LIKE") ?><input type="hidden" name="z_C_SOURCE" id="z_C_SOURCE" value="LIKE"></span></td>
		<td<?php echo $t_tinbai_levelsite->C_SOURCE->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_SOURCE" id="x_C_SOURCE" title="<?php echo $t_tinbai_levelsite->C_SOURCE->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_SOURCE->EditValue ?>"<?php echo $t_tinbai_levelsite->C_SOURCE->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ORDER->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ORDER" id="z_C_ORDER" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_ORDER->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_tinbai_levelsite->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_ORDER->EditValue ?>"<?php echo $t_tinbai_levelsite->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_ADD->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_USER_ADD" id="z_C_USER_ADD" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_ADD->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_USER_ADD" id="x_C_USER_ADD" title="<?php echo $t_tinbai_levelsite->C_USER_ADD->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_USER_ADD->EditValue ?>"<?php echo $t_tinbai_levelsite->C_USER_ADD->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ADD_TIME->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_ADD_TIME" id="z_C_ADD_TIME" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_ADD_TIME->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_ADD_TIME" id="x_C_ADD_TIME" title="<?php echo $t_tinbai_levelsite->C_ADD_TIME->FldTitle() ?>" value="<?php echo $t_tinbai_levelsite->C_ADD_TIME->EditValue ?>"<?php echo $t_tinbai_levelsite->C_ADD_TIME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_EDIT->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_USER_EDIT" id="z_C_USER_EDIT" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_USER_EDIT->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_USER_EDIT" id="x_C_USER_EDIT" title="<?php echo $t_tinbai_levelsite->C_USER_EDIT->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_USER_EDIT->EditValue ?>"<?php echo $t_tinbai_levelsite->C_USER_EDIT->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_EDIT_TIME->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_C_EDIT_TIME" id="z_C_EDIT_TIME" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->C_EDIT_TIME->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_C_EDIT_TIME" id="x_C_EDIT_TIME" title="<?php echo $t_tinbai_levelsite->C_EDIT_TIME->FldTitle() ?>" value="<?php echo $t_tinbai_levelsite->C_EDIT_TIME->EditValue ?>"<?php echo $t_tinbai_levelsite->C_EDIT_TIME->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_NGUOIDUNG_ID" id="z_FK_NGUOIDUNG_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<select id="x_FK_NGUOIDUNG_ID" name="x_FK_NGUOIDUNG_ID" title="<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->FldTitle() ?>"<?php echo $t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditValue)) {
	$arwrk = $t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span>
			</div>
		</td>
	</tr>
	<tr<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_EDITOR_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->CellAttributes() ?>><span class="ewSearchOpr"><?php echo $Language->Phrase("=") ?><input type="hidden" name="z_FK_EDITOR_ID" id="z_FK_EDITOR_ID" value="="></span></td>
		<td<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->CellAttributes() ?>>
			<div style="white-space: nowrap;">
				<span class="phpmaker" style="float: left;">
<input type="text" name="x_FK_EDITOR_ID" id="x_FK_EDITOR_ID" title="<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->EditValue ?>"<?php echo $t_tinbai_levelsite->FK_EDITOR_ID->EditAttributes() ?>>
</span>
			</div>
		</td>
	</tr>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo ew_BtnCaption($Language->Phrase("Search")) ?>">
<input type="button" name="Reset" id="Reset" value="<?php echo ew_BtnCaption($Language->Phrase("Reset")) ?>" onclick="ew_ClearForm(this.form);">
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
$t_tinbai_levelsite_search->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_levelsite_search {

	// Page ID
	var $PageID = 'search';

	// Table name
	var $TableName = 't_tinbai_levelsite';

	// Page object name
	var $PageObjName = 't_tinbai_levelsite_search';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_levelsite;
		if ($t_tinbai_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_tinbai_levelsite;
		if ($t_tinbai_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_levelsite_search() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_levelsite)
		$GLOBALS["t_tinbai_levelsite"] = new ct_tinbai_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'search', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_levelsite', TRUE);

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
		global $t_tinbai_levelsite;

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
		if (!$Security->CanSearch()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_tinbai_levelsitelist.php");
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

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsSearchError, $t_tinbai_levelsite;
		if ($this->IsPageRequest()) { // Validate request

			// Get action
			$t_tinbai_levelsite->CurrentAction = $objForm->GetValue("a_search");
			switch ($t_tinbai_levelsite->CurrentAction) {
				case "S": // Get search criteria

					// Build search string for advanced search, remove blank field
					$this->LoadSearchValues(); // Get search values
					if ($this->ValidateSearch()) {
						$sSrchStr = $this->BuildAdvancedSearch();
					} else {
						$sSrchStr = "";
						$this->setMessage($gsSearchError);
					}
					if ($sSrchStr <> "") {
						$sSrchStr = $t_tinbai_levelsite->UrlParm($sSrchStr);
						$this->Page_Terminate("t_tinbai_levelsitelist.php" . "?" . $sSrchStr); // Go to list page
					}
			}
		}

		// Restore search settings from Session
		if ($gsSearchError == "")
			$this->LoadAdvancedSearch();

		// Render row for search
		$t_tinbai_levelsite->RowType = EW_ROWTYPE_SEARCH;
		$this->RenderRow();
	}

// Build advanced search
function BuildAdvancedSearch() {
	global $t_tinbai_levelsite;
	$sSrchUrl = "";
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->PK_TINBAI_ID); // PK_TINBAI_ID
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->FK_CONGTY_ID); // FK_CONGTY_ID
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->FK_CHUYENMUC_ID); // FK_CHUYENMUC_ID
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->FK_DOITUONG_ID); // FK_DOITUONG_ID
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_TITLE); // C_TITLE
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_SUMARY); // C_SUMARY
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_CONTENTS); // C_CONTENTS
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_PUBLISH); // C_PUBLISH
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_ACTIVE); // C_ACTIVE
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_TIMEPUBLISH); // C_TIMEPUBLISH
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_COMENT); // C_COMENT
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_HITS); // C_HITS
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_VISITOR); // C_VISITOR
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_STATUS); // C_STATUS
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_SOURCE); // C_SOURCE
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_ORDER); // C_ORDER
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_USER_ADD); // C_USER_ADD
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_ADD_TIME); // C_ADD_TIME
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_USER_EDIT); // C_USER_EDIT
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->C_EDIT_TIME); // C_EDIT_TIME
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->FK_NGUOIDUNG_ID); // FK_NGUOIDUNG_ID
	$this->BuildSearchUrl($sSrchUrl, $t_tinbai_levelsite->FK_EDITOR_ID); // FK_EDITOR_ID
	return $sSrchUrl;
}

// Build search URL
function BuildSearchUrl(&$Url, &$Fld) {
	global $objForm;
	$sWrk = "";
	$FldParm = substr($Fld->FldVar, 2);
	$FldVal = $objForm->GetValue("x_$FldParm");
	$FldOpr = $objForm->GetValue("z_$FldParm");
	$FldCond = $objForm->GetValue("v_$FldParm");
	$FldVal2 = $objForm->GetValue("y_$FldParm");
	$FldOpr2 = $objForm->GetValue("w_$FldParm");
	$FldVal = ew_StripSlashes($FldVal);
	if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
	$FldVal2 = ew_StripSlashes($FldVal2);
	if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
	$FldOpr = strtoupper(trim($FldOpr));
	$lFldDataType = ($Fld->FldIsVirtual) ? EW_DATATYPE_STRING : $Fld->FldDataType;
	if ($FldOpr == "BETWEEN") {
		$IsValidValue = ($lFldDataType <> EW_DATATYPE_NUMBER) ||
			($lFldDataType == EW_DATATYPE_NUMBER && is_numeric($FldVal) && is_numeric($FldVal2));
		if ($FldVal <> "" && $FldVal2 <> "" && $IsValidValue) {
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
	} elseif ($FldOpr == "IS NULL" || $FldOpr == "IS NOT NULL") {
		$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
			"&z_" . $FldParm . "=" . urlencode($FldOpr);
	} else {
		$IsValidValue = ($lFldDataType <> EW_DATATYPE_NUMBER) ||
			($lFldDataType == EW_DATATYPE_NUMBER && is_numeric($FldVal));
		if ($FldVal <> "" && $IsValidValue && ew_IsValidOpr($FldOpr, $lFldDataType)) {

			//$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$sWrk = "x_" . $FldParm . "=" . urlencode($FldVal) .
				"&z_" . $FldParm . "=" . urlencode($FldOpr);
		}
		$IsValidValue = ($lFldDataType <> EW_DATATYPE_NUMBER) ||
			($lFldDataType == EW_DATATYPE_NUMBER && is_numeric($FldVal2));
		if ($FldVal2 <> "" && $IsValidValue && ew_IsValidOpr($FldOpr2, $lFldDataType)) {

			//$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			if ($sWrk <> "") $sWrk .= "&v_" . $FldParm . "=" . urlencode($FldCond) . "&";
			$sWrk .= "&y_" . $FldParm . "=" . urlencode($FldVal2) .
				"&w_" . $FldParm . "=" . urlencode($FldOpr2);
		}
	}
	if ($sWrk <> "") {
		if ($Url <> "") $Url .= "&";
		$Url .= $sWrk;
	}
}

// Convert search value for date
function ConvertSearchValue(&$Fld, $FldVal) {
	$Value = $FldVal;
	if ($Fld->FldDataType == EW_DATATYPE_DATE && $FldVal <> "")
		$Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
	return $Value;
}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_tinbai_levelsite;

		// Load search values
		// PK_TINBAI_ID

		$t_tinbai_levelsite->PK_TINBAI_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_PK_TINBAI_ID"));
		$t_tinbai_levelsite->PK_TINBAI_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_PK_TINBAI_ID");

		// FK_CONGTY_ID
		$t_tinbai_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_tinbai_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_FK_CONGTY_ID");

		// FK_CHUYENMUC_ID
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_FK_CHUYENMUC_ID"));
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_FK_CHUYENMUC_ID");

		// FK_DOITUONG_ID
		$t_tinbai_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_FK_DOITUONG_ID"));
		$t_tinbai_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_FK_DOITUONG_ID");

		// C_TITLE
		$t_tinbai_levelsite->C_TITLE->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_TITLE"));
		$t_tinbai_levelsite->C_TITLE->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_TITLE");

		// C_SUMARY
		$t_tinbai_levelsite->C_SUMARY->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_SUMARY"));
		$t_tinbai_levelsite->C_SUMARY->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_SUMARY");

		// C_CONTENTS
		$t_tinbai_levelsite->C_CONTENTS->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_CONTENTS"));
		$t_tinbai_levelsite->C_CONTENTS->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_CONTENTS");

		// C_PUBLISH
		$t_tinbai_levelsite->C_PUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_PUBLISH"));
		$t_tinbai_levelsite->C_PUBLISH->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_PUBLISH");

		// C_ACTIVE
		$t_tinbai_levelsite->C_ACTIVE->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_ACTIVE"));
		$t_tinbai_levelsite->C_ACTIVE->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_ACTIVE");

		// C_TIMEPUBLISH
		$t_tinbai_levelsite->C_TIMEPUBLISH->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_TIMEPUBLISH"));
		$t_tinbai_levelsite->C_TIMEPUBLISH->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_TIMEPUBLISH");

		// C_COMENT
		$t_tinbai_levelsite->C_COMENT->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_COMENT"));
		$t_tinbai_levelsite->C_COMENT->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_COMENT");

		// C_HITS
		$t_tinbai_levelsite->C_HITS->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_HITS"));
		$t_tinbai_levelsite->C_HITS->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_HITS");

		// C_VISITOR
		$t_tinbai_levelsite->C_VISITOR->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_VISITOR"));
		$t_tinbai_levelsite->C_VISITOR->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_VISITOR");

		// C_STATUS
		$t_tinbai_levelsite->C_STATUS->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_STATUS"));
		$t_tinbai_levelsite->C_STATUS->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_STATUS");

		// C_SOURCE
		$t_tinbai_levelsite->C_SOURCE->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_SOURCE"));
		$t_tinbai_levelsite->C_SOURCE->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_SOURCE");

		// C_ORDER
		$t_tinbai_levelsite->C_ORDER->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_ORDER"));
		$t_tinbai_levelsite->C_ORDER->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_ORDER");

		// C_USER_ADD
		$t_tinbai_levelsite->C_USER_ADD->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_USER_ADD"));
		$t_tinbai_levelsite->C_USER_ADD->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_USER_ADD");

		// C_ADD_TIME
		$t_tinbai_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_ADD_TIME"));
		$t_tinbai_levelsite->C_ADD_TIME->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_ADD_TIME");

		// C_USER_EDIT
		$t_tinbai_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_USER_EDIT"));
		$t_tinbai_levelsite->C_USER_EDIT->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_USER_EDIT");

		// C_EDIT_TIME
		$t_tinbai_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_C_EDIT_TIME"));
		$t_tinbai_levelsite->C_EDIT_TIME->AdvancedSearch->SearchOperator = $objForm->GetValue("z_C_EDIT_TIME");

		// FK_NGUOIDUNG_ID
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_FK_NGUOIDUNG_ID"));
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_FK_NGUOIDUNG_ID");

		// FK_EDITOR_ID
		$t_tinbai_levelsite->FK_EDITOR_ID->AdvancedSearch->SearchValue = ew_StripSlashes($objForm->GetValue("x_FK_EDITOR_ID"));
		$t_tinbai_levelsite->FK_EDITOR_ID->AdvancedSearch->SearchOperator = $objForm->GetValue("z_FK_EDITOR_ID");
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_levelsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_levelsite->Row_Rendering();

		// Common render codes for all row types
		// PK_TINBAI_ID

		$t_tinbai_levelsite->PK_TINBAI_ID->CellCssStyle = ""; $t_tinbai_levelsite->PK_TINBAI_ID->CellCssClass = "";
		$t_tinbai_levelsite->PK_TINBAI_ID->CellAttrs = array(); $t_tinbai_levelsite->PK_TINBAI_ID->ViewAttrs = array(); $t_tinbai_levelsite->PK_TINBAI_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$t_tinbai_levelsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_CONGTY_ID->EditAttrs = array();

		// FK_CHUYENMUC_ID
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditAttrs = array();

		// FK_DOITUONG_ID
		$t_tinbai_levelsite->FK_DOITUONG_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_DOITUONG_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_DOITUONG_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_DOITUONG_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_DOITUONG_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_levelsite->C_TITLE->CellCssStyle = ""; $t_tinbai_levelsite->C_TITLE->CellCssClass = "";
		$t_tinbai_levelsite->C_TITLE->CellAttrs = array(); $t_tinbai_levelsite->C_TITLE->ViewAttrs = array(); $t_tinbai_levelsite->C_TITLE->EditAttrs = array();

		// C_SUMARY
		$t_tinbai_levelsite->C_SUMARY->CellCssStyle = ""; $t_tinbai_levelsite->C_SUMARY->CellCssClass = "";
		$t_tinbai_levelsite->C_SUMARY->CellAttrs = array(); $t_tinbai_levelsite->C_SUMARY->ViewAttrs = array(); $t_tinbai_levelsite->C_SUMARY->EditAttrs = array();

		// C_CONTENTS
		$t_tinbai_levelsite->C_CONTENTS->CellCssStyle = ""; $t_tinbai_levelsite->C_CONTENTS->CellCssClass = "";
		$t_tinbai_levelsite->C_CONTENTS->CellAttrs = array(); $t_tinbai_levelsite->C_CONTENTS->ViewAttrs = array(); $t_tinbai_levelsite->C_CONTENTS->EditAttrs = array();

		// C_PUBLISH
		$t_tinbai_levelsite->C_PUBLISH->CellCssStyle = ""; $t_tinbai_levelsite->C_PUBLISH->CellCssClass = "";
		$t_tinbai_levelsite->C_PUBLISH->CellAttrs = array(); $t_tinbai_levelsite->C_PUBLISH->ViewAttrs = array(); $t_tinbai_levelsite->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$t_tinbai_levelsite->C_ACTIVE->CellCssStyle = ""; $t_tinbai_levelsite->C_ACTIVE->CellCssClass = "";
		$t_tinbai_levelsite->C_ACTIVE->CellAttrs = array(); $t_tinbai_levelsite->C_ACTIVE->ViewAttrs = array(); $t_tinbai_levelsite->C_ACTIVE->EditAttrs = array();

		// C_FILEANH
		$t_tinbai_levelsite->C_FILEANH->CellCssStyle = ""; $t_tinbai_levelsite->C_FILEANH->CellCssClass = "";
		$t_tinbai_levelsite->C_FILEANH->CellAttrs = array(); $t_tinbai_levelsite->C_FILEANH->ViewAttrs = array(); $t_tinbai_levelsite->C_FILEANH->EditAttrs = array();

		// C_TIMEPUBLISH
		$t_tinbai_levelsite->C_TIMEPUBLISH->CellCssStyle = ""; $t_tinbai_levelsite->C_TIMEPUBLISH->CellCssClass = "";
		$t_tinbai_levelsite->C_TIMEPUBLISH->CellAttrs = array(); $t_tinbai_levelsite->C_TIMEPUBLISH->ViewAttrs = array(); $t_tinbai_levelsite->C_TIMEPUBLISH->EditAttrs = array();

		// C_COMENT
		$t_tinbai_levelsite->C_COMENT->CellCssStyle = ""; $t_tinbai_levelsite->C_COMENT->CellCssClass = "";
		$t_tinbai_levelsite->C_COMENT->CellAttrs = array(); $t_tinbai_levelsite->C_COMENT->ViewAttrs = array(); $t_tinbai_levelsite->C_COMENT->EditAttrs = array();

		// C_HITS
		$t_tinbai_levelsite->C_HITS->CellCssStyle = ""; $t_tinbai_levelsite->C_HITS->CellCssClass = "";
		$t_tinbai_levelsite->C_HITS->CellAttrs = array(); $t_tinbai_levelsite->C_HITS->ViewAttrs = array(); $t_tinbai_levelsite->C_HITS->EditAttrs = array();

		// C_VISITOR
		$t_tinbai_levelsite->C_VISITOR->CellCssStyle = ""; $t_tinbai_levelsite->C_VISITOR->CellCssClass = "";
		$t_tinbai_levelsite->C_VISITOR->CellAttrs = array(); $t_tinbai_levelsite->C_VISITOR->ViewAttrs = array(); $t_tinbai_levelsite->C_VISITOR->EditAttrs = array();

		// C_STATUS
		$t_tinbai_levelsite->C_STATUS->CellCssStyle = ""; $t_tinbai_levelsite->C_STATUS->CellCssClass = "";
		$t_tinbai_levelsite->C_STATUS->CellAttrs = array(); $t_tinbai_levelsite->C_STATUS->ViewAttrs = array(); $t_tinbai_levelsite->C_STATUS->EditAttrs = array();

		// C_SOURCE
		$t_tinbai_levelsite->C_SOURCE->CellCssStyle = ""; $t_tinbai_levelsite->C_SOURCE->CellCssClass = "";
		$t_tinbai_levelsite->C_SOURCE->CellAttrs = array(); $t_tinbai_levelsite->C_SOURCE->ViewAttrs = array(); $t_tinbai_levelsite->C_SOURCE->EditAttrs = array();

		// C_ORDER
		$t_tinbai_levelsite->C_ORDER->CellCssStyle = ""; $t_tinbai_levelsite->C_ORDER->CellCssClass = "";
		$t_tinbai_levelsite->C_ORDER->CellAttrs = array(); $t_tinbai_levelsite->C_ORDER->ViewAttrs = array(); $t_tinbai_levelsite->C_ORDER->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_levelsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_levelsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_levelsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_levelsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_levelsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_levelsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_levelsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_levelsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_levelsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_levelsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_levelsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_levelsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_levelsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_levelsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_levelsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_levelsite->C_EDIT_TIME->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_levelsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->EditAttrs = array();
		if ($t_tinbai_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_ID
			$t_tinbai_levelsite->PK_TINBAI_ID->ViewValue = $t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_levelsite->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = $t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_CONGTY_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->CssClass = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_CHUYENMUC_ID
			if (strval($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = $t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->CssClass = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = $t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_DOITUONG_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->CssClass = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_levelsite->C_TITLE->ViewValue = $t_tinbai_levelsite->C_TITLE->CurrentValue;
			$t_tinbai_levelsite->C_TITLE->CssStyle = "";
			$t_tinbai_levelsite->C_TITLE->CssClass = "";
			$t_tinbai_levelsite->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->ViewValue = $t_tinbai_levelsite->C_SUMARY->CurrentValue;
			$t_tinbai_levelsite->C_SUMARY->CssStyle = "";
			$t_tinbai_levelsite->C_SUMARY->CssClass = "";
			$t_tinbai_levelsite->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->ViewValue = $t_tinbai_levelsite->C_CONTENTS->CurrentValue;
			$t_tinbai_levelsite->C_CONTENTS->CssStyle = "";
			$t_tinbai_levelsite->C_CONTENTS->CssClass = "";
			$t_tinbai_levelsite->C_CONTENTS->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_tinbai_levelsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = "Khong kich hoat MainSite";
						break;
					case "1":
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = "Kich hoat MainSite";
						break;
					default:
						$t_tinbai_levelsite->C_PUBLISH->ViewValue = $t_tinbai_levelsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_PUBLISH->CssStyle = "";
			$t_tinbai_levelsite->C_PUBLISH->CssClass = "";
			$t_tinbai_levelsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_tinbai_levelsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Khong kich hoat len Level Site";
						break;
					case "1":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Kich hoat len Level Site";
						break;
					default:
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = $t_tinbai_levelsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_ACTIVE->CssStyle = "";
			$t_tinbai_levelsite->C_ACTIVE->CssClass = "";
			$t_tinbai_levelsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_FILEANH
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) {
				$t_tinbai_levelsite->C_FILEANH->ViewValue = $t_tinbai_levelsite->C_FILEANH->Upload->DbValue;
				$t_tinbai_levelsite->C_FILEANH->ImageAlt = $t_tinbai_levelsite->C_FILEANH->FldAlt();
			} else {
				$t_tinbai_levelsite->C_FILEANH->ViewValue = "";
			}
			$t_tinbai_levelsite->C_FILEANH->CssStyle = "";
			$t_tinbai_levelsite->C_FILEANH->CssClass = "";
			$t_tinbai_levelsite->C_FILEANH->ViewCustomAttributes = "";

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = $t_tinbai_levelsite->C_TIMEPUBLISH->CurrentValue;
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue, 7);
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssStyle = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssClass = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewCustomAttributes = "";

			// C_COMENT
			if (strval($t_tinbai_levelsite->C_COMENT->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_COMENT->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "Khong cho phep comment";
						break;
					case "1":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "Cho phep comment";
						break;
					default:
						$t_tinbai_levelsite->C_COMENT->ViewValue = $t_tinbai_levelsite->C_COMENT->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_COMENT->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_COMENT->CssStyle = "";
			$t_tinbai_levelsite->C_COMENT->CssClass = "";
			$t_tinbai_levelsite->C_COMENT->ViewCustomAttributes = "";

			// C_HITS
			if (strval($t_tinbai_levelsite->C_HITS->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_HITS->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_HITS->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_levelsite->C_HITS->ViewValue = "La tin noi bat";
						break;
					default:
						$t_tinbai_levelsite->C_HITS->ViewValue = $t_tinbai_levelsite->C_HITS->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_HITS->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_HITS->CssStyle = "";
			$t_tinbai_levelsite->C_HITS->CssClass = "";
			$t_tinbai_levelsite->C_HITS->ViewCustomAttributes = "";

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->ViewValue = $t_tinbai_levelsite->C_VISITOR->CurrentValue;
			$t_tinbai_levelsite->C_VISITOR->CssStyle = "";
			$t_tinbai_levelsite->C_VISITOR->CssClass = "";
			$t_tinbai_levelsite->C_VISITOR->ViewCustomAttributes = "";

			// C_STATUS
			$t_tinbai_levelsite->C_STATUS->ViewValue = $t_tinbai_levelsite->C_STATUS->CurrentValue;
			$t_tinbai_levelsite->C_STATUS->CssStyle = "";
			$t_tinbai_levelsite->C_STATUS->CssClass = "";
			$t_tinbai_levelsite->C_STATUS->ViewCustomAttributes = "";

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->ViewValue = $t_tinbai_levelsite->C_SOURCE->CurrentValue;
			$t_tinbai_levelsite->C_SOURCE->CssStyle = "";
			$t_tinbai_levelsite->C_SOURCE->CssClass = "";
			$t_tinbai_levelsite->C_SOURCE->ViewCustomAttributes = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->ViewValue = $t_tinbai_levelsite->C_ORDER->CurrentValue;
			$t_tinbai_levelsite->C_ORDER->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_ORDER->ViewValue, 7);
			$t_tinbai_levelsite->C_ORDER->CssStyle = "";
			$t_tinbai_levelsite->C_ORDER->CssClass = "";
			$t_tinbai_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
			$t_tinbai_levelsite->C_USER_ADD->CssStyle = "";
			$t_tinbai_levelsite->C_USER_ADD->CssClass = "";
			$t_tinbai_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->ViewValue = $t_tinbai_levelsite->C_ADD_TIME->CurrentValue;
			$t_tinbai_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_tinbai_levelsite->C_ADD_TIME->CssStyle = "";
			$t_tinbai_levelsite->C_ADD_TIME->CssClass = "";
			$t_tinbai_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $t_tinbai_levelsite->C_USER_EDIT->CurrentValue;
			$t_tinbai_levelsite->C_USER_EDIT->CssStyle = "";
			$t_tinbai_levelsite->C_USER_EDIT->CssClass = "";
			$t_tinbai_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_tinbai_levelsite->C_EDIT_TIME->ViewValue = $t_tinbai_levelsite->C_EDIT_TIME->CurrentValue;
			$t_tinbai_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_tinbai_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_levelsite->C_EDIT_TIME->CssClass = "";
			$t_tinbai_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewValue = $t_tinbai_levelsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_levelsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// PK_TINBAI_ID
			$t_tinbai_levelsite->PK_TINBAI_ID->HrefValue = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->TooltipValue = "";

			// FK_CONGTY_ID
			$t_tinbai_levelsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_CONGTY_ID->TooltipValue = "";

			// FK_CHUYENMUC_ID
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->TooltipValue = "";

			// FK_DOITUONG_ID
			$t_tinbai_levelsite->FK_DOITUONG_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_DOITUONG_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_levelsite->C_TITLE->HrefValue = "";
			$t_tinbai_levelsite->C_TITLE->TooltipValue = "";

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->HrefValue = "";
			$t_tinbai_levelsite->C_SUMARY->TooltipValue = "";

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->HrefValue = "";
			$t_tinbai_levelsite->C_CONTENTS->TooltipValue = "";

			// C_PUBLISH
			$t_tinbai_levelsite->C_PUBLISH->HrefValue = "";
			$t_tinbai_levelsite->C_PUBLISH->TooltipValue = "";

			// C_ACTIVE
			$t_tinbai_levelsite->C_ACTIVE->HrefValue = "";
			$t_tinbai_levelsite->C_ACTIVE->TooltipValue = "";

			// C_FILEANH
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = ew_UploadPathEx(FALSE, $t_tinbai_levelsite->C_FILEANH->UploadPath) . ((!empty($t_tinbai_levelsite->C_FILEANH->ViewValue)) ? $t_tinbai_levelsite->C_FILEANH->ViewValue : $t_tinbai_levelsite->C_FILEANH->CurrentValue);
				if ($t_tinbai_levelsite->Export <> "") $t_tinbai_levelsite->C_FILEANH->HrefValue = ew_ConvertFullUrl($t_tinbai_levelsite->C_FILEANH->HrefValue);
			} else {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = "";
			}
			$t_tinbai_levelsite->C_FILEANH->TooltipValue = "";

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->HrefValue = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->TooltipValue = "";

			// C_COMENT
			$t_tinbai_levelsite->C_COMENT->HrefValue = "";
			$t_tinbai_levelsite->C_COMENT->TooltipValue = "";

			// C_HITS
			$t_tinbai_levelsite->C_HITS->HrefValue = "";
			$t_tinbai_levelsite->C_HITS->TooltipValue = "";

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->HrefValue = "";
			$t_tinbai_levelsite->C_VISITOR->TooltipValue = "";

			// C_STATUS
			$t_tinbai_levelsite->C_STATUS->HrefValue = "";
			$t_tinbai_levelsite->C_STATUS->TooltipValue = "";

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->HrefValue = "";
			$t_tinbai_levelsite->C_SOURCE->TooltipValue = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->HrefValue = "";
			$t_tinbai_levelsite->C_ORDER->TooltipValue = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_levelsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_levelsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_levelsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_levelsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_levelsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_levelsite->C_EDIT_TIME->TooltipValue = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->TooltipValue = "";
		} elseif ($t_tinbai_levelsite->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// PK_TINBAI_ID
			$t_tinbai_levelsite->PK_TINBAI_ID->EditCustomAttributes = "";
			$t_tinbai_levelsite->PK_TINBAI_ID->EditValue = ew_HtmlEncode($t_tinbai_levelsite->PK_TINBAI_ID->AdvancedSearch->SearchValue);

			// FK_CONGTY_ID
			$t_tinbai_levelsite->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_tinbai_levelsite->FK_CONGTY_ID->EditValue = $arwrk;

			// FK_CHUYENMUC_ID
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_CHUYENMUC`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_chuyenmuc_levelsite`";
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
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue = $arwrk;

			// FK_DOITUONG_ID
			$t_tinbai_levelsite->FK_DOITUONG_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DOITUONG`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_tinbai_levelsite->FK_DOITUONG_ID->EditValue = $arwrk;

			// C_TITLE
			$t_tinbai_levelsite->C_TITLE->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_TITLE->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_TITLE->AdvancedSearch->SearchValue);

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_SUMARY->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_SUMARY->AdvancedSearch->SearchValue);

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_CONTENTS->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_CONTENTS->AdvancedSearch->SearchValue);

			// C_PUBLISH
			$t_tinbai_levelsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat MainSite");
			$arwrk[] = array("1", "Kich hoat MainSite");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_levelsite->C_PUBLISH->EditValue = $arwrk;

			// C_ACTIVE
			$t_tinbai_levelsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat len Level Site");
			$arwrk[] = array("1", "Kich hoat len Level Site");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_levelsite->C_ACTIVE->EditValue = $arwrk;

			// C_FILEANH
			$t_tinbai_levelsite->C_FILEANH->EditCustomAttributes = "";
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->Upload->DbValue)) {
				$t_tinbai_levelsite->C_FILEANH->EditValue = $t_tinbai_levelsite->C_FILEANH->Upload->DbValue;
				$t_tinbai_levelsite->C_FILEANH->ImageAlt = $t_tinbai_levelsite->C_FILEANH->FldAlt();
			} else {
				$t_tinbai_levelsite->C_FILEANH->EditValue = "";
			}

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_levelsite->C_TIMEPUBLISH->AdvancedSearch->SearchValue, 7), 7));

			// C_COMENT
			$t_tinbai_levelsite->C_COMENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong cho phep comment");
			$arwrk[] = array("1", "Cho phep comment");
			$t_tinbai_levelsite->C_COMENT->EditValue = $arwrk;

			// C_HITS
			$t_tinbai_levelsite->C_HITS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong la tin noi bat");
			$arwrk[] = array("1", "La tin noi bat");
			$t_tinbai_levelsite->C_HITS->EditValue = $arwrk;

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_VISITOR->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_VISITOR->AdvancedSearch->SearchValue);

			// C_STATUS
			$t_tinbai_levelsite->C_STATUS->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_STATUS->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_STATUS->AdvancedSearch->SearchValue);

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_SOURCE->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_SOURCE->AdvancedSearch->SearchValue);

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_levelsite->C_ORDER->AdvancedSearch->SearchValue, 7), 7));

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_USER_ADD->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_USER_ADD->AdvancedSearch->SearchValue);

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_ADD_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue, 7), 7));

			// C_USER_EDIT
			$t_tinbai_levelsite->C_USER_EDIT->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_USER_EDIT->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue);

			// C_EDIT_TIME
			$t_tinbai_levelsite->C_EDIT_TIME->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_EDIT_TIME->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_tinbai_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue, 7), 7));

			// FK_NGUOIDUNG_ID
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->EditCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->EditCustomAttributes = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->EditValue = ew_HtmlEncode($t_tinbai_levelsite->FK_EDITOR_ID->AdvancedSearch->SearchValue);
		}

		// Call Row Rendered event
		if ($t_tinbai_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_levelsite->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_tinbai_levelsite;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckInteger($t_tinbai_levelsite->PK_TINBAI_ID->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->PK_TINBAI_ID->FldErrMsg();
		}
		if (!ew_CheckEuroDate($t_tinbai_levelsite->C_TIMEPUBLISH->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_TIMEPUBLISH->FldErrMsg();
		}
		if (!ew_CheckInteger($t_tinbai_levelsite->C_VISITOR->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_VISITOR->FldErrMsg();
		}
		if (!ew_CheckInteger($t_tinbai_levelsite->C_STATUS->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_STATUS->FldErrMsg();
		}
		if (!ew_CheckEuroDate($t_tinbai_levelsite->C_ORDER->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_ORDER->FldErrMsg();
		}
		if (!ew_CheckInteger($t_tinbai_levelsite->C_USER_ADD->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_USER_ADD->FldErrMsg();
		}
		if (!ew_CheckEuroDate($t_tinbai_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_ADD_TIME->FldErrMsg();
		}
		if (!ew_CheckInteger($t_tinbai_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_USER_EDIT->FldErrMsg();
		}
		if (!ew_CheckEuroDate($t_tinbai_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->C_EDIT_TIME->FldErrMsg();
		}
		if (!ew_CheckInteger($t_tinbai_levelsite->FK_EDITOR_ID->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $t_tinbai_levelsite->FK_EDITOR_ID->FldErrMsg();
		}

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $t_tinbai_levelsite;
		$t_tinbai_levelsite->PK_TINBAI_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_PK_TINBAI_ID");
		$t_tinbai_levelsite->FK_CONGTY_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_FK_CONGTY_ID");
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_FK_CHUYENMUC_ID");
		$t_tinbai_levelsite->FK_DOITUONG_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_FK_DOITUONG_ID");
		$t_tinbai_levelsite->C_TITLE->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_TITLE");
		$t_tinbai_levelsite->C_SUMARY->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_SUMARY");
		$t_tinbai_levelsite->C_CONTENTS->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_CONTENTS");
		$t_tinbai_levelsite->C_PUBLISH->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_PUBLISH");
		$t_tinbai_levelsite->C_ACTIVE->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_ACTIVE");
		$t_tinbai_levelsite->C_TIMEPUBLISH->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_TIMEPUBLISH");
		$t_tinbai_levelsite->C_COMENT->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_COMENT");
		$t_tinbai_levelsite->C_HITS->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_HITS");
		$t_tinbai_levelsite->C_VISITOR->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_VISITOR");
		$t_tinbai_levelsite->C_STATUS->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_STATUS");
		$t_tinbai_levelsite->C_SOURCE->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_SOURCE");
		$t_tinbai_levelsite->C_ORDER->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_ORDER");
		$t_tinbai_levelsite->C_USER_ADD->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_USER_ADD");
		$t_tinbai_levelsite->C_ADD_TIME->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_ADD_TIME");
		$t_tinbai_levelsite->C_USER_EDIT->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_USER_EDIT");
		$t_tinbai_levelsite->C_EDIT_TIME->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_C_EDIT_TIME");
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_FK_NGUOIDUNG_ID");
		$t_tinbai_levelsite->FK_EDITOR_ID->AdvancedSearch->SearchValue = $t_tinbai_levelsite->getAdvancedSearch("x_FK_EDITOR_ID");
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
