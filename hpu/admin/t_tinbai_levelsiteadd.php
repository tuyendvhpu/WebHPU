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
$t_tinbai_levelsite_add = new ct_tinbai_levelsite_add();
$Page =& $t_tinbai_levelsite_add;

// Page init
$t_tinbai_levelsite_add->Page_Init();

// Page main
$t_tinbai_levelsite_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_levelsite_add = new ew_Page("t_tinbai_levelsite_add");

// page properties
t_tinbai_levelsite_add.PageID = "add"; // page ID
t_tinbai_levelsite_add.FormID = "ft_tinbai_levelsiteadd"; // form ID
var EW_PAGE_ID = t_tinbai_levelsite_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_tinbai_levelsite_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix, value;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		
//		elm = fobj.elements["x" + infix + "_FK_CHUYENMUC_ID"];
//		if (elm && !ew_HasValue(elm))
//			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->FK_CHUYENMUC_ID->FldCaption()) ?>");
//		elm = fobj.elements["x" + infix + "_FK_DOITUONG_ID"];
//		if (elm && !ew_HasValue(elm))
//			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->FK_DOITUONG_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_TITLE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_SUMARY"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_SUMARY->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_CONTENTS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_CONTENTS->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_HITS"];
                value = elm.value;
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_HITS->FldCaption()) ?>");                    
		elm = fobj.elements["x" + infix + "_C_COMENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_COMENT->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_ORDER->FldCaption()) ?>");
		
                elm = fobj.elements["x" + infix + "_C_SENDMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_SENDMAIL->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_CONTENTS_MAIL"];
                radioValue = checkRadio(fobj.x_C_SENDMAIL);
                if (radioValue == 1)
                 {
		       if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_CONTENTS_MAIL->FldCaption()) ?>");
                  }
                  
		elm = fobj.elements["x" + infix + "_C_SENDMAIL_LEVELSITE"];
                radioValue = checkRadio(fobj.x_C_SENDMAIL_LEVELSITE);
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->FldCaption()) ?>");
                if (radioValue == 1)
                 {      
                        elm = fobj.elements["x" + infix + "_C_FK_BROWSE[]"];
		        if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm,ewLanguage.Phrase("EnterRequiredField") + "  <?php echo "Chọn người duyệt bài trong - ".ew_JsEncode2($t_tinbai_levelsite->C_FK_BROWSE->FldCaption()) ?>");    
                 }  
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_tinbai_levelsite_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_levelsite_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_levelsite_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_levelsite_add.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $t_tinbai_levelsite->TableCaption() ?></p>
<a href="<?php echo $t_tinbai_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_levelsite_add->ShowMessage();
?>
<form name="ft_tinbai_levelsiteadd" id="ft_tinbai_levelsiteadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_tinbai_levelsite_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_tinbai_levelsite">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_tinbai_levelsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CONGTY_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td  colspan="2" <?php echo $t_tinbai_levelsite->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<?php $t_tinbai_levelsite->FK_CONGTY_ID->EditAttrs["onchange"] = "ew_UpdateOpt('x_FK_CHUYENMUC_ID','x_FK_CONGTY_ID',true);ew_UpdateOpt('x_FK_DOITUONG_ID','x_FK_CONGTY_ID',true); " . @$t_tinbai_levelsite->FK_CONGTY_ID->EditAttrs["onchange"]; ?>
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_tinbai_levelsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php

// add code by quanghung xac dinh chuyn muc doi tương thuoc don vi nao
if (IsAdmin())
{
    if (is_array($t_tinbai_levelsite->FK_CONGTY_ID->EditValue)) {
        $arwrk = $t_tinbai_levelsite->FK_CONGTY_ID->EditValue;
        $rowswrk = count($arwrk);
        $emptywrk = TRUE;
        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                $selwrk = (strval($t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
    if (is_array($t_tinbai_levelsite->FK_CONGTY_ID->EditValue)) {
        $arwrk = $t_tinbai_levelsite->FK_CONGTY_ID->EditValue;
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
    <?php        }
        }
    }
} 
?>
</select>
</span><?php echo $t_tinbai_levelsite->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_CHUYENMUC_ID->Visible) { // FK_CHUYENMUC_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->CellAttributes() ?>><span id="el_FK_CHUYENMUC_ID">
<select id="x_FK_CHUYENMUC_ID" name="x_FK_CHUYENMUC_ID" title="<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldTitle() ?>"<?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue)) {
	$arwrk = $t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php
$sSqlWrk = "SELECT `PK_CHUYENMUC`, `C_NAME`, '' AS Disp2Fld FROM `t_chuyenmuc_levelsite`";
$sWhereWrk = "`FK_CONGTY` IN ({filter_value})";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_FK_CHUYENMUC_ID" id="s_x_FK_CHUYENMUC_ID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_FK_CHUYENMUC_ID" id="lft_x_FK_CHUYENMUC_ID" value="1">
</span><?php echo $t_tinbai_levelsite->FK_CHUYENMUC_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->FK_DOITUONG_ID->Visible) { // FK_DOITUONG_ID ?>
	<tr<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->CellAttributes() ?>><span id="el_FK_DOITUONG_ID">
<div id="tp_x_FK_DOITUONG_ID" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->EditAttributes() ?>></label></div>
<div id="dsl_x_FK_DOITUONG_ID" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->FK_DOITUONG_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
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
<label style="float:left"><label><input name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="" value="" type="radio"></label>Không lựa chọn</label>
</div>
<?php
$sSqlWrk = "SELECT `PK_DOITUONG`, `C_NAME`, '' AS Disp2Fld FROM `t_doituong_levelsite`";
$sWhereWrk = "`FK_CONGTY` IN ({filter_value}) AND (C_TYPE = 0)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_FK_DOITUONG_ID" id="s_x_FK_DOITUONG_ID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_FK_DOITUONG_ID" id="lft_x_FK_DOITUONG_ID" value="1">
</span><?php echo $t_tinbai_levelsite->FK_DOITUONG_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_levelsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_tinbai_levelsite->C_TITLE->FldTitle() ?>" size="98" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_TITLE->EditValue ?>"<?php echo $t_tinbai_levelsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_SUMARY->Visible) { // C_SUMARY ?>
	<tr<?php echo $t_tinbai_levelsite->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SUMARY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_SUMARY->CellAttributes() ?>><span id="el_C_SUMARY">
 <textarea style="font-size: 12px;" name="x_C_SUMARY" id="x_C_SUMARY" title="<?php echo $t_tinbai_levelsite->C_SUMARY->FldTitle() ?>" cols="96" rows="3"<?php echo $t_tinbai_levelsite->C_SUMARY->EditAttributes() ?>><?php echo $t_tinbai_levelsite->C_SUMARY->EditValue ?></textarea>
</span><?php echo $t_tinbai_levelsite->C_SUMARY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_CONTENTS->Visible) { // C_CONTENTS ?>
	<tr<?php echo $t_tinbai_levelsite->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_CONTENTS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_CONTENTS->CellAttributes() ?>><span id="el_C_CONTENTS">
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
</span><?php echo $t_tinbai_levelsite->C_CONTENTS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_HITS->Visible) { // C_HITS ?>
	<tr<?php echo $t_tinbai_levelsite->C_HITS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_HITS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_levelsite->C_HITS->CellAttributes() ?>><span id="el_C_HITS">
<select id="x_C_HITS" name="x_C_HITS" title="<?php echo $t_tinbai_levelsite->C_HITS->FldTitle() ?>"<?php echo $t_tinbai_levelsite->C_HITS->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_levelsite->C_HITS->EditValue)) {
	$arwrk = $t_tinbai_levelsite->C_HITS->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_HITS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_levelsite->C_HITS->CustomMsg ?>
                    
                
                </td>
                <td style="width: 50%" rowspan="4" <?php echo $t_tinbai_levelsite->C_SENDMAIL->CellAttributes() ?>><span id="el_C_SENDMAIL">
<div class="col2"><?php echo $t_tinbai_levelsite->C_SENDMAIL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?>  </div>
<div id="tp_x_C_SENDMAIL" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_SENDMAIL" id="x_C_SENDMAIL" title="<?php echo $t_tinbai_levelsite->C_SENDMAIL->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_SENDMAIL->EditAttributes() ?>></label></div>
<div id="dsl_x_C_SENDMAIL" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_SENDMAIL->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_SENDMAIL->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_SENDMAIL" id="x_C_SENDMAIL" title="<?php echo $t_tinbai_levelsite->C_SENDMAIL->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->C_SENDMAIL->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
   <span style="color:#FF0000;font-style: italic"> - Khi bạn chọn xác nhận hệ thống sẽ tự động gửi Mail tới bộ phận thiết kế để thiết kế hình ảnh nổi bật cho bài viết của bạn. 
    <br/> - Sau 60 phút  bạn không nhận được phản hổi của bộ phận thiết kế qua Mail của bạn. Liên hệ Quản Trị Mạng - ĐT:0936821821 để được hỗ trợ tốt nhất.
   </span>
</span>
    <div class="col2"><?php echo $t_tinbai_levelsite->C_CONTENTS_MAIL->FldCaption() ?> </div>                
    <textarea placeholder="Páste đường dẫn ảnh cần chỉnh sửa hoặc nội dung yêu cầu bộ phận thiết kế..." style="font-size: 10px;border:1px #7e827a solid" name="x_C_CONTENTS_MAIL" id="x_C_CONTENTS_MAIL" title="<?php echo $t_tinbai_levelsite->C_CONTENTS_MAIL->FldTitle() ?>" cols="90" rows="4" <?php echo $t_tinbai_levelsite->C_CONTENTS_MAIL->EditAttributes() ?>><?php echo $t_tinbai_levelsite->C_CONTENTS_MAIL->EditValue ?></textarea>
    <?php echo $t_tinbai_levelsite->C_SENDMAIL->CustomMsg ?> </td>
       
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_FILEANH->Visible) { // C_FILEANH ?>
	<tr<?php echo $t_tinbai_levelsite->C_FILEANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_FILEANH->FldCaption() ?></td>
		<td<?php echo $t_tinbai_levelsite->C_FILEANH->CellAttributes() ?>><span id="el_C_FILEANH">
<input placeholder="Paste đường dẫn ảnh ứng với khối đơn vị của mình..." type="text" name="x_C_FILEANH" id="x_C_FILEANH" title="<?php echo $t_tinbai_levelsite->C_FILEANH->FldTitle() ?>" size="50" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_FILEANH->EditValue ?>"<?php echo $t_tinbai_levelsite->C_FILEANH->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_FILEANH->CustomMsg ?>
<br/><i> Kích thước ảnh hiển thị:746px*355px</i> -- <a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>                          
                </td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_COMENT->Visible) { // C_COMENT ?>
	<tr<?php echo $t_tinbai_levelsite->C_COMENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_COMENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_levelsite->C_COMENT->CellAttributes() ?>><span id="el_C_COMENT">
<div id="tp_x_C_COMENT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_COMENT" id="x_C_COMENT" title="<?php echo $t_tinbai_levelsite->C_COMENT->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_COMENT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_COMENT" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_COMENT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_COMENT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
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
</span><?php echo $t_tinbai_levelsite->C_COMENT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_tinbai_levelsite->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_levelsite->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_tinbai_levelsite->C_ORDER->FldTitle() ?>" size="30" value="<?php echo $t_tinbai_levelsite->C_ORDER->EditValue ?>"<?php echo $t_tinbai_levelsite->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_tinbai_levelsite->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
 
     <?php if ($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->Visible) { // C_SENDMAIL_LEVELSITE ?>
	<tr<?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->FldCaption() ?> <?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CellAttributes() ?>><span id="el_C_SENDMAIL_LEVELSITE">
<div id="tp_x_C_SENDMAIL_LEVELSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_SENDMAIL_LEVELSITE" id="x_C_SENDMAIL_LEVELSITE" title="<?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_SENDMAIL_LEVELSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_SENDMAIL_LEVELSITE" id="x_C_SENDMAIL_LEVELSITE" title="<?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_FK_BROWSE->Visible) { // C_FK_BROWSE ?>
	<tr<?php echo $t_tinbai_levelsite->C_FK_BROWSE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_FK_BROWSE->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_FK_BROWSE->CellAttributes() ?>><span id="el_C_FK_BROWSE">
<div id="tp_x_C_FK_BROWSE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_C_FK_BROWSE[]" id="x_C_FK_BROWSE[]" title="<?php echo $t_tinbai_levelsite->C_FK_BROWSE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_levelsite->C_FK_BROWSE->EditAttributes() ?>></div>
<div id="dsl_x_C_FK_BROWSE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_levelsite->C_FK_BROWSE->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($t_tinbai_levelsite->C_FK_BROWSE->CurrentValue));
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = "";
		for ($ari = 0; $ari < count($armultiwrk); $ari++) {
			if (strval($arwrk[$rowcntwrk][0]) == trim(strval($armultiwrk[$ari]))) {
				$selwrk = " checked=\"checked\"";
				if ($selwrk <> "") $emptywrk = FALSE;
				break;
			}
		}
        
		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="checkbox" name="x_C_FK_BROWSE[]" id="x_C_FK_BROWSE[]" title="<?php echo $t_tinbai_levelsite->C_FK_BROWSE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_levelsite->C_FK_BROWSE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?><?php echo ew_ValueSeparator($rowcntwrk) ?><?php echo $arwrk[$rowcntwrk][2] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_levelsite->C_FK_BROWSE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PIC_MAIN->Visible) { // C_PIC_MAIN ?>
	<tr<?php echo $t_tinbai_levelsite->C_PIC_MAIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PIC_MAIN->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_PIC_MAIN->CellAttributes() ?>><span id="el_C_PIC_MAIN">
<input type="text" name="x_C_PIC_MAIN" id="x_C_PIC_MAIN" title="<?php echo $t_tinbai_levelsite->C_PIC_MAIN->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_PIC_MAIN->EditValue ?>"<?php echo $t_tinbai_levelsite->C_PIC_MAIN->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_PIC_MAIN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PIC_SCIENCE->Visible) { // C_PIC_SCIENCE ?>
	<tr<?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->CellAttributes() ?>><span id="el_C_PIC_SCIENCE">
<input type="text" name="x_C_PIC_SCIENCE" id="x_C_PIC_SCIENCE" title="<?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->EditValue ?>"<?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_PIC_SCIENCE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PIC_ROM->Visible) { // C_PIC_ROM ?>
	<tr<?php echo $t_tinbai_levelsite->C_PIC_ROM->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PIC_ROM->FldCaption() ?></td>
                <td colspan="2" <?php echo $t_tinbai_levelsite->C_PIC_ROM->CellAttributes() ?>><span id="el_C_PIC_ROM">
<input type="text" name="x_C_PIC_ROM" id="x_C_PIC_ROM" title="<?php echo $t_tinbai_levelsite->C_PIC_ROM->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_PIC_ROM->EditValue ?>"<?php echo $t_tinbai_levelsite->C_PIC_ROM->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_PIC_ROM->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PIC_MASS->Visible) { // C_PIC_MASS ?>
	<tr<?php echo $t_tinbai_levelsite->C_PIC_MASS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PIC_MASS->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_PIC_MASS->CellAttributes() ?>><span id="el_C_PIC_MASS">
<input type="text" name="x_C_PIC_MASS" id="x_C_PIC_MASS" title="<?php echo $t_tinbai_levelsite->C_PIC_MASS->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_PIC_MASS->EditValue ?>"<?php echo $t_tinbai_levelsite->C_PIC_MASS->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_PIC_MASS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_levelsite->C_PIC_LIB->Visible) { // C_PIC_LIB ?>
	<tr<?php echo $t_tinbai_levelsite->C_PIC_LIB->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_levelsite->C_PIC_LIB->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_tinbai_levelsite->C_PIC_LIB->CellAttributes() ?>><span id="el_C_PIC_LIB">
<input type="text" name="x_C_PIC_LIB" id="x_C_PIC_LIB" title="<?php echo $t_tinbai_levelsite->C_PIC_LIB->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_levelsite->C_PIC_LIB->EditValue ?>"<?php echo $t_tinbai_levelsite->C_PIC_LIB->EditAttributes() ?>>
</span><?php echo $t_tinbai_levelsite->C_PIC_LIB->CustomMsg ?></td>
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
ew_UpdateOpts([['x_FK_CHUYENMUC_ID','x_FK_CONGTY_ID',false],
['x_FK_DOITUONG_ID','x_FK_CONGTY_ID',false]]);

//-->
</script>
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
$t_tinbai_levelsite_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_levelsite_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_tinbai_levelsite';

	// Page object name
	var $PageObjName = 't_tinbai_levelsite_add';

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
	function ct_tinbai_levelsite_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_levelsite)
		$GLOBALS["t_tinbai_levelsite"] = new ct_tinbai_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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
		if (!$Security->CanAdd()) {
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
	var $sDbMasterFilter = "";
	var $sDbDetailFilter = "";
	var $lPriv = 0;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_tinbai_levelsite;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_TINBAI_ID"] != "") {
		  $t_tinbai_levelsite->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_tinbai_levelsite->CurrentAction = $_POST["a_add"]; // Get form action
		 // $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_tinbai_levelsite->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_tinbai_levelsite->CurrentAction = "C"; // Copy record
		  } else {
		    $t_tinbai_levelsite->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_tinbai_levelsite->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_tinbai_levelsitelist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_tinbai_levelsite->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_tinbai_levelsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_tinbai_levelsiteview.php")
						$sReturnUrl = $t_tinbai_levelsite->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_tinbai_levelsite->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}
      
       	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_tinbai_levelsite;

		// Get upload data
			
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_tinbai_levelsite;
		$t_tinbai_levelsite->C_FILEANH->CurrentValue = NULL; // Clear file related field
                $t_tinbai_levelsite->C_SENDMAIL->CurrentValue = 0;
                $t_tinbai_levelsite->C_HITS->CurrentValue = 0;
                $t_tinbai_levelsite->C_COMENT->CurrentValue = 0;
		$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue = 0;
		$t_tinbai_levelsite->C_SENDMAIL->CurrentValue = 0;
	}


	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_tinbai_levelsite;
		$t_tinbai_levelsite->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->setFormValue($objForm->GetValue("x_FK_CHUYENMUC_ID"));
		$t_tinbai_levelsite->FK_DOITUONG_ID->setFormValue($objForm->GetValue("x_FK_DOITUONG_ID"));
		$t_tinbai_levelsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_tinbai_levelsite->C_SUMARY->setFormValue($objForm->GetValue("x_C_SUMARY"));
		$t_tinbai_levelsite->C_CONTENTS->setFormValue($objForm->GetValue("x_C_CONTENTS"));
		$t_tinbai_levelsite->C_SOURCE->setFormValue($objForm->GetValue("x_C_SOURCE"));
		$t_tinbai_levelsite->C_HITS->setFormValue($objForm->GetValue("x_C_HITS"));
		$t_tinbai_levelsite->C_COMENT->setFormValue($objForm->GetValue("x_C_COMENT"));
		$t_tinbai_levelsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_tinbai_levelsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_tinbai_levelsite->C_ORDER->CurrentValue, 7);
		$t_tinbai_levelsite->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_tinbai_levelsite->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_tinbai_levelsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_levelsite->C_ADD_TIME->CurrentValue, 7);
		$t_tinbai_levelsite->C_FILEANH->setFormValue($objForm->GetValue("x_C_FILEANH"));
		$t_tinbai_levelsite->FK_EDITOR_ID->setFormValue($objForm->GetValue("x_FK_EDITOR_ID"));
                $t_tinbai_levelsite->C_SENDMAIL->setFormValue($objForm->GetValue("x_C_SENDMAIL"));
		$t_tinbai_levelsite->C_CONTENTS_MAIL->setFormValue($objForm->GetValue("x_C_CONTENTS_MAIL"));
		$t_tinbai_levelsite->PK_TINBAI_ID->setFormValue($objForm->GetValue("x_PK_TINBAI_ID"));
                $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->setFormValue($objForm->GetValue("x_C_SENDMAIL_LEVELSITE"));
		$t_tinbai_levelsite->C_FK_BROWSE->setFormValue($objForm->GetValue("x_C_FK_BROWSE"));
		$t_tinbai_levelsite->C_PIC_MAIN->setFormValue($objForm->GetValue("x_C_PIC_MAIN"));
		$t_tinbai_levelsite->C_PIC_SCIENCE->setFormValue($objForm->GetValue("x_C_PIC_SCIENCE"));
		$t_tinbai_levelsite->C_PIC_ROM->setFormValue($objForm->GetValue("x_C_PIC_ROM"));
		$t_tinbai_levelsite->C_PIC_MASS->setFormValue($objForm->GetValue("x_C_PIC_MASS"));
		$t_tinbai_levelsite->C_PIC_LIB->setFormValue($objForm->GetValue("x_C_PIC_LIB"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_tinbai_levelsite;
		$t_tinbai_levelsite->PK_TINBAI_ID->CurrentValue = $t_tinbai_levelsite->PK_TINBAI_ID->FormValue;
		$t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue = $t_tinbai_levelsite->FK_CONGTY_ID->FormValue;
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue = $t_tinbai_levelsite->FK_CHUYENMUC_ID->FormValue;
		$t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue = $t_tinbai_levelsite->FK_DOITUONG_ID->FormValue;
		$t_tinbai_levelsite->C_TITLE->CurrentValue = $t_tinbai_levelsite->C_TITLE->FormValue;
		$t_tinbai_levelsite->C_SUMARY->CurrentValue = $t_tinbai_levelsite->C_SUMARY->FormValue;
		$t_tinbai_levelsite->C_CONTENTS->CurrentValue = $t_tinbai_levelsite->C_CONTENTS->FormValue;
		$t_tinbai_levelsite->C_SOURCE->CurrentValue = $t_tinbai_levelsite->C_SOURCE->FormValue;
		$t_tinbai_levelsite->C_HITS->CurrentValue = $t_tinbai_levelsite->C_HITS->FormValue;
		$t_tinbai_levelsite->C_COMENT->CurrentValue = $t_tinbai_levelsite->C_COMENT->FormValue;
		$t_tinbai_levelsite->C_ORDER->CurrentValue = $t_tinbai_levelsite->C_ORDER->FormValue;
		$t_tinbai_levelsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_tinbai_levelsite->C_ORDER->CurrentValue, 7);
		$t_tinbai_levelsite->C_USER_ADD->CurrentValue = $t_tinbai_levelsite->C_USER_ADD->FormValue;
		$t_tinbai_levelsite->C_ADD_TIME->CurrentValue = $t_tinbai_levelsite->C_ADD_TIME->FormValue;
		$t_tinbai_levelsite->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_levelsite->C_ADD_TIME->CurrentValue, 7);
	        $t_tinbai_levelsite->C_FILEANH->CurrentValue = $t_tinbai_levelsite->C_FILEANH->FormValue;
		$t_tinbai_levelsite->FK_EDITOR_ID->CurrentValue = $t_tinbai_levelsite->FK_EDITOR_ID->FormValue;
                $t_tinbai_levelsite->C_SENDMAIL->CurrentValue = $t_tinbai_levelsite->C_SENDMAIL->FormValue;
		$t_tinbai_levelsite->C_CONTENTS_MAIL->CurrentValue = $t_tinbai_levelsite->C_CONTENTS_MAIL->FormValue;
                $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue = $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->FormValue;
		$t_tinbai_levelsite->C_FK_BROWSE->CurrentValue = $t_tinbai_levelsite->C_FK_BROWSE->FormValue;
		$t_tinbai_levelsite->C_PIC_MAIN->CurrentValue = $t_tinbai_levelsite->C_PIC_MAIN->FormValue;
		$t_tinbai_levelsite->C_PIC_SCIENCE->CurrentValue = $t_tinbai_levelsite->C_PIC_SCIENCE->FormValue;
		$t_tinbai_levelsite->C_PIC_ROM->CurrentValue = $t_tinbai_levelsite->C_PIC_ROM->FormValue;
		$t_tinbai_levelsite->C_PIC_MASS->CurrentValue = $t_tinbai_levelsite->C_PIC_MASS->FormValue;
		$t_tinbai_levelsite->C_PIC_LIB->CurrentValue = $t_tinbai_levelsite->C_PIC_LIB->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_levelsite;
		$sFilter = $t_tinbai_levelsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_levelsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_levelsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_levelsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_levelsite;
		$t_tinbai_levelsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_levelsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->setDbValue($rs->fields('FK_CHUYENMUC_ID'));
		$t_tinbai_levelsite->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$t_tinbai_levelsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_levelsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_levelsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_levelsite->C_VISITOR->setDbValue($rs->fields('C_VISITOR'));
		$t_tinbai_levelsite->C_SOURCE->setDbValue($rs->fields('C_SOURCE'));
		$t_tinbai_levelsite->C_HITS->setDbValue($rs->fields('C_HITS'));
		$t_tinbai_levelsite->C_COMENT->setDbValue($rs->fields('C_COMENT'));
		$t_tinbai_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_tinbai_levelsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_tinbai_levelsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_tinbai_levelsite->C_TIMEPUBLISH->setDbValue($rs->fields('C_TIMEPUBLISH'));
		$t_tinbai_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_levelsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$t_tinbai_levelsite->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_tinbai_levelsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
		$t_tinbai_levelsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
                $t_tinbai_levelsite->C_FILEANH->setDbValue($rs->fields('C_FILEANH'));
                $t_tinbai_levelsite->C_SENDMAIL->setDbValue($rs->fields('C_SENDMAIL'));
		$t_tinbai_levelsite->C_CONTENTS_MAIL->setDbValue($rs->fields('C_CONTENTS_MAIL'));
                $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->setDbValue($rs->fields('C_SENDMAIL_LEVELSITE'));
		$t_tinbai_levelsite->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$t_tinbai_levelsite->C_PIC_MAIN->setDbValue($rs->fields('C_PIC_MAIN'));
		$t_tinbai_levelsite->C_PIC_SCIENCE->setDbValue($rs->fields('C_PIC_SCIENCE'));
		$t_tinbai_levelsite->C_PIC_ROM->setDbValue($rs->fields('C_PIC_ROM'));
		$t_tinbai_levelsite->C_PIC_MASS->setDbValue($rs->fields('C_PIC_MASS'));
		$t_tinbai_levelsite->C_PIC_LIB->setDbValue($rs->fields('C_PIC_LIB'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_levelsite, $c_list_brows;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_levelsite->Row_Rendering();

		// Common render codes for all row types
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

		// C_SOURCE
		$t_tinbai_levelsite->C_SOURCE->CellCssStyle = ""; $t_tinbai_levelsite->C_SOURCE->CellCssClass = "";
		$t_tinbai_levelsite->C_SOURCE->CellAttrs = array(); $t_tinbai_levelsite->C_SOURCE->ViewAttrs = array(); $t_tinbai_levelsite->C_SOURCE->EditAttrs = array();

		// C_HITS
		$t_tinbai_levelsite->C_HITS->CellCssStyle = ""; $t_tinbai_levelsite->C_HITS->CellCssClass = "";
		$t_tinbai_levelsite->C_HITS->CellAttrs = array(); $t_tinbai_levelsite->C_HITS->ViewAttrs = array(); $t_tinbai_levelsite->C_HITS->EditAttrs = array();

		// C_FILEANH
		$t_tinbai_levelsite->C_FILEANH->CellCssStyle = ""; $t_tinbai_levelsite->C_FILEANH->CellCssClass = "";
		$t_tinbai_levelsite->C_FILEANH->CellAttrs = array(); $t_tinbai_levelsite->C_FILEANH->ViewAttrs = array(); $t_tinbai_levelsite->C_FILEANH->EditAttrs = array();

		// C_COMENT
		$t_tinbai_levelsite->C_COMENT->CellCssStyle = ""; $t_tinbai_levelsite->C_COMENT->CellCssClass = "";
		$t_tinbai_levelsite->C_COMENT->CellAttrs = array(); $t_tinbai_levelsite->C_COMENT->ViewAttrs = array(); $t_tinbai_levelsite->C_COMENT->EditAttrs = array();

		// C_ORDER
		$t_tinbai_levelsite->C_ORDER->CellCssStyle = ""; $t_tinbai_levelsite->C_ORDER->CellCssClass = "";
		$t_tinbai_levelsite->C_ORDER->CellAttrs = array(); $t_tinbai_levelsite->C_ORDER->ViewAttrs = array(); $t_tinbai_levelsite->C_ORDER->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_levelsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_levelsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_levelsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_levelsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_levelsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_levelsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_levelsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_levelsite->C_ADD_TIME->EditAttrs = array();
                
                // C_SENDMAIL_LEVELSITE
		$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CellCssStyle = ""; $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CellCssClass = "";
		$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CellAttrs = array(); $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->ViewAttrs = array(); $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditAttrs = array();

		// C_FK_BROWSE
		$t_tinbai_levelsite->C_FK_BROWSE->CellCssStyle = ""; $t_tinbai_levelsite->C_FK_BROWSE->CellCssClass = "";
		$t_tinbai_levelsite->C_FK_BROWSE->CellAttrs = array(); $t_tinbai_levelsite->C_FK_BROWSE->ViewAttrs = array(); $t_tinbai_levelsite->C_FK_BROWSE->EditAttrs = array();

		// C_PIC_MAIN
		$t_tinbai_levelsite->C_PIC_MAIN->CellCssStyle = ""; $t_tinbai_levelsite->C_PIC_MAIN->CellCssClass = "";
		$t_tinbai_levelsite->C_PIC_MAIN->CellAttrs = array(); $t_tinbai_levelsite->C_PIC_MAIN->ViewAttrs = array(); $t_tinbai_levelsite->C_PIC_MAIN->EditAttrs = array();

		// C_PIC_SCIENCE
		$t_tinbai_levelsite->C_PIC_SCIENCE->CellCssStyle = ""; $t_tinbai_levelsite->C_PIC_SCIENCE->CellCssClass = "";
		$t_tinbai_levelsite->C_PIC_SCIENCE->CellAttrs = array(); $t_tinbai_levelsite->C_PIC_SCIENCE->ViewAttrs = array(); $t_tinbai_levelsite->C_PIC_SCIENCE->EditAttrs = array();

		// C_PIC_ROM
		$t_tinbai_levelsite->C_PIC_ROM->CellCssStyle = ""; $t_tinbai_levelsite->C_PIC_ROM->CellCssClass = "";
		$t_tinbai_levelsite->C_PIC_ROM->CellAttrs = array(); $t_tinbai_levelsite->C_PIC_ROM->ViewAttrs = array(); $t_tinbai_levelsite->C_PIC_ROM->EditAttrs = array();

		// C_PIC_MASS
		$t_tinbai_levelsite->C_PIC_MASS->CellCssStyle = ""; $t_tinbai_levelsite->C_PIC_MASS->CellCssClass = "";
		$t_tinbai_levelsite->C_PIC_MASS->CellAttrs = array(); $t_tinbai_levelsite->C_PIC_MASS->ViewAttrs = array(); $t_tinbai_levelsite->C_PIC_MASS->EditAttrs = array();

		// C_PIC_LIB
		$t_tinbai_levelsite->C_PIC_LIB->CellCssStyle = ""; $t_tinbai_levelsite->C_PIC_LIB->CellCssClass = "";
		$t_tinbai_levelsite->C_PIC_LIB->CellAttrs = array(); $t_tinbai_levelsite->C_PIC_LIB->ViewAttrs = array(); $t_tinbai_levelsite->C_PIC_LIB->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_levelsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_levelsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_levelsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_levelsite->FK_EDITOR_ID->EditAttrs = array();
                
                
                // C_SENDMAIL
		$t_tinbai_levelsite->C_SENDMAIL->CellCssStyle = ""; $t_tinbai_levelsite->C_SENDMAIL->CellCssClass = "";
		$t_tinbai_levelsite->C_SENDMAIL->CellAttrs = array(); $t_tinbai_levelsite->C_SENDMAIL->ViewAttrs = array(); $t_tinbai_levelsite->C_SENDMAIL->EditAttrs = array();

		// C_CONTENTS_MAIL
		$t_tinbai_levelsite->C_CONTENTS_MAIL->CellCssStyle = ""; $t_tinbai_levelsite->C_CONTENTS_MAIL->CellCssClass = "";
		$t_tinbai_levelsite->C_CONTENTS_MAIL->CellAttrs = array(); $t_tinbai_levelsite->C_CONTENTS_MAIL->ViewAttrs = array(); $t_tinbai_levelsite->C_CONTENTS_MAIL->EditAttrs = array();
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

			// C_VISITOR
			$t_tinbai_levelsite->C_VISITOR->ViewValue = $t_tinbai_levelsite->C_VISITOR->CurrentValue;
			$t_tinbai_levelsite->C_VISITOR->CssStyle = "";
			$t_tinbai_levelsite->C_VISITOR->CssClass = "";
			$t_tinbai_levelsite->C_VISITOR->ViewCustomAttributes = "";

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->ViewValue = $t_tinbai_levelsite->C_SOURCE->CurrentValue;
			$t_tinbai_levelsite->C_SOURCE->CssStyle = "";
			$t_tinbai_levelsite->C_SOURCE->CssClass = "";
			$t_tinbai_levelsite->C_SOURCE->ViewCustomAttributes = "";

			// C_HITS
			if (strval($t_tinbai_levelsite->C_HITS->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_HITS->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_HITS->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_levelsite->C_HITS->ViewValue = "Tin noi bat";
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

			// C_FILEANH
			$t_tinbai_levelsite->C_FILEANH->ViewValue = $t_tinbai_levelsite->C_FILEANH->CurrentValue;
			$t_tinbai_levelsite->C_FILEANH->C_FILEANH->ImageAlt = $t_tinbai_levelsite->C_FILEANH->FldAlt;
			$t_tinbai_levelsite->C_FILEANH->CssStyle = "";
			$t_tinbai_levelsite->C_FILEANH->CssClass = "";
			$t_tinbai_levelsite->C_FILEANH->ViewCustomAttributes = "";

			// C_COMENT
			if (strval($t_tinbai_levelsite->C_COMENT->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_COMENT->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "Khong cho phep coment facebook";
						break;
					case "1":
						$t_tinbai_levelsite->C_COMENT->ViewValue = "cho phep coment facebook";
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
                        
                        	// C_SENDMAIL
			if (strval($t_tinbai_levelsite->C_SENDMAIL->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_SENDMAIL->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_SENDMAIL->ViewValue = "khong xac nhan";
						break;
					case "1":
						$t_tinbai_levelsite->C_SENDMAIL->ViewValue = "xac nhan";
						break;
					default:
						$t_tinbai_levelsite->C_SENDMAIL->ViewValue = $t_tinbai_levelsite->C_SENDMAIL->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_SENDMAIL->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_SENDMAIL->CssStyle = "";
			$t_tinbai_levelsite->C_SENDMAIL->CssClass = "";
			$t_tinbai_levelsite->C_SENDMAIL->ViewCustomAttributes = "";

			// C_CONTENTS_MAIL
			$t_tinbai_levelsite->C_CONTENTS_MAIL->ViewValue = $t_tinbai_levelsite->C_CONTENTS_MAIL->CurrentValue;
			$t_tinbai_levelsite->C_CONTENTS_MAIL->CssStyle = "";
			$t_tinbai_levelsite->C_CONTENTS_MAIL->CssClass = "";
			$t_tinbai_levelsite->C_CONTENTS_MAIL->ViewCustomAttributes = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->ViewValue = $t_tinbai_levelsite->C_ORDER->CurrentValue;
			$t_tinbai_levelsite->C_ORDER->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_ORDER->ViewValue, 7);
			$t_tinbai_levelsite->C_ORDER->CssStyle = "";
			$t_tinbai_levelsite->C_ORDER->CssClass = "";
			$t_tinbai_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_tinbai_levelsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Khong kich hoat len Level Site";
						break;
					case "1":
						$t_tinbai_levelsite->C_ACTIVE->ViewValue = "Kich hoat len Level sites ";
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

			// C_TIMEPUBLISH
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = $t_tinbai_levelsite->C_TIMEPUBLISH->CurrentValue;
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue = ew_FormatDateTime($t_tinbai_levelsite->C_TIMEPUBLISH->ViewValue, 7);
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssStyle = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->CssClass = "";
			$t_tinbai_levelsite->C_TIMEPUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
			if (strval($t_tinbai_levelsite->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->C_USER_ADD->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->C_USER_ADD->ViewValue = $t_tinbai_levelsite->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_USER_ADD->ViewValue = NULL;
			}
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
			if (strval($t_tinbai_levelsite->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->C_USER_EDIT->ViewValue = $t_tinbai_levelsite->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_USER_EDIT->ViewValue = NULL;
			}
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
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
			if (strval($t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_tinbai_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewValue = NULL;
			}
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_tinbai_levelsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_SENDMAIL_LEVELSITE
			if (strval($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue) <> "") {
				switch ($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue) {
					case "1":
						$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->ViewValue = "Gửi Mail thông báo có nội dung cấn duyệt";
						break;
					default:
						$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->ViewValue = $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->ViewValue = NULL;
			}
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CssStyle = "";
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CssClass = "";
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->ViewCustomAttributes = "";

			// C_FK_BROWSE
			if (strval($t_tinbai_levelsite->C_FK_BROWSE->CurrentValue) <> "") {
				$arwrk = explode(",", $t_tinbai_levelsite->C_FK_BROWSE->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_HOTEN`, `C_EMAIL` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
                                $c_list_brows ="";
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_levelsite->C_FK_BROWSE->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_tinbai_levelsite->C_FK_BROWSE->ViewValue .= $rswrk->fields('C_HOTEN');
                                                $c_list_brows .= $rswrk->fields('C_EMAIL')." ";
						$t_tinbai_levelsite->C_FK_BROWSE->ViewValue .= ew_ValueSeparator($ari) . $rswrk->fields('C_EMAIL');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_tinbai_levelsite->C_FK_BROWSE->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_tinbai_levelsite->C_FK_BROWSE->ViewValue = $t_tinbai_levelsite->C_FK_BROWSE->CurrentValue;
				}
			} else {
				$t_tinbai_levelsite->C_FK_BROWSE->ViewValue = NULL;
			}
                     
			$t_tinbai_levelsite->C_FK_BROWSE->CssStyle = "";
			$t_tinbai_levelsite->C_FK_BROWSE->CssClass = "";
			$t_tinbai_levelsite->C_FK_BROWSE->ViewCustomAttributes = "";

			// C_PIC_MAIN
			$t_tinbai_levelsite->C_PIC_MAIN->ViewValue = $t_tinbai_levelsite->C_PIC_MAIN->CurrentValue;
			$t_tinbai_levelsite->C_PIC_MAIN->CssStyle = "";
			$t_tinbai_levelsite->C_PIC_MAIN->CssClass = "";
			$t_tinbai_levelsite->C_PIC_MAIN->ViewCustomAttributes = "";

			// C_PIC_SCIENCE
			$t_tinbai_levelsite->C_PIC_SCIENCE->ViewValue = $t_tinbai_levelsite->C_PIC_SCIENCE->CurrentValue;
			$t_tinbai_levelsite->C_PIC_SCIENCE->CssStyle = "";
			$t_tinbai_levelsite->C_PIC_SCIENCE->CssClass = "";
			$t_tinbai_levelsite->C_PIC_SCIENCE->ViewCustomAttributes = "";

			// C_PIC_ROM
			$t_tinbai_levelsite->C_PIC_ROM->ViewValue = $t_tinbai_levelsite->C_PIC_ROM->CurrentValue;
			$t_tinbai_levelsite->C_PIC_ROM->CssStyle = "";
			$t_tinbai_levelsite->C_PIC_ROM->CssClass = "";
			$t_tinbai_levelsite->C_PIC_ROM->ViewCustomAttributes = "";

			// C_PIC_MASS
			$t_tinbai_levelsite->C_PIC_MASS->ViewValue = $t_tinbai_levelsite->C_PIC_MASS->CurrentValue;
			$t_tinbai_levelsite->C_PIC_MASS->CssStyle = "";
			$t_tinbai_levelsite->C_PIC_MASS->CssClass = "";
			$t_tinbai_levelsite->C_PIC_MASS->ViewCustomAttributes = "";

			// C_PIC_LIB
			$t_tinbai_levelsite->C_PIC_LIB->ViewValue = $t_tinbai_levelsite->C_PIC_LIB->CurrentValue;
			$t_tinbai_levelsite->C_PIC_LIB->CssStyle = "";
			$t_tinbai_levelsite->C_PIC_LIB->CssClass = "";
			$t_tinbai_levelsite->C_PIC_LIB->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewValue = $t_tinbai_levelsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_levelsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// C_NOTE
			$t_tinbai_levelsite->C_NOTE->ViewValue = $t_tinbai_levelsite->C_NOTE->CurrentValue;
			$t_tinbai_levelsite->C_NOTE->CssStyle = "";
			$t_tinbai_levelsite->C_NOTE->CssClass = "";
			$t_tinbai_levelsite->C_NOTE->ViewCustomAttributes = "";

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

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->HrefValue = "";
			$t_tinbai_levelsite->C_SOURCE->TooltipValue = "";

			// C_HITS
			$t_tinbai_levelsite->C_HITS->HrefValue = "";
			$t_tinbai_levelsite->C_HITS->TooltipValue = "";

			// C_FILEANH
			if (!ew_Empty($t_tinbai_levelsite->C_FILEANH->CurrentValue)) {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = ((!empty($t_tinbai_levelsite->C_FILEANH->ViewValue)) ? $t_tinbai_levelsite->C_FILEANH->ViewValue : $t_tinbai_levelsite->C_FILEANH->CurrentValue);
				if ($t_tinbai_levelsite->Export <> "") $t_tinbai_levelsite->C_FILEANH->HrefValue = ew_ConvertFullUrl($t_tinbai_levelsite->C_FILEANH->HrefValue);
			} else {
				$t_tinbai_levelsite->C_FILEANH->HrefValue = "";
			}
			$t_tinbai_levelsite->C_FILEANH->TooltipValue = "";

			// C_COMENT
			$t_tinbai_levelsite->C_COMENT->HrefValue = "";
			$t_tinbai_levelsite->C_COMENT->TooltipValue = "";

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->HrefValue = "";
			$t_tinbai_levelsite->C_ORDER->TooltipValue = "";

			// C_USER_ADD
			$t_tinbai_levelsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_levelsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_levelsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_levelsite->C_ADD_TIME->TooltipValue = "";
                        
                        // C_SENDMAIL_LEVELSITE
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->HrefValue = "";
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->TooltipValue = "";

			// C_FK_BROWSE
			$t_tinbai_levelsite->C_FK_BROWSE->HrefValue = "";
			$t_tinbai_levelsite->C_FK_BROWSE->TooltipValue = "";

			// C_PIC_MAIN
			$t_tinbai_levelsite->C_PIC_MAIN->HrefValue = "";
			$t_tinbai_levelsite->C_PIC_MAIN->TooltipValue = "";

			// C_PIC_SCIENCE
			$t_tinbai_levelsite->C_PIC_SCIENCE->HrefValue = "";
			$t_tinbai_levelsite->C_PIC_SCIENCE->TooltipValue = "";

			// C_PIC_ROM
			$t_tinbai_levelsite->C_PIC_ROM->HrefValue = "";
			$t_tinbai_levelsite->C_PIC_ROM->TooltipValue = "";

			// C_PIC_MASS
			$t_tinbai_levelsite->C_PIC_MASS->HrefValue = "";
			$t_tinbai_levelsite->C_PIC_MASS->TooltipValue = "";

			// C_PIC_LIB
			$t_tinbai_levelsite->C_PIC_LIB->HrefValue = "";
			$t_tinbai_levelsite->C_PIC_LIB->TooltipValue = "";

			

			// FK_EDITOR_ID
			$t_tinbai_levelsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_levelsite->FK_EDITOR_ID->TooltipValue = "";
		} elseif ($t_tinbai_levelsite->RowType == EW_ROWTYPE_ADD) { // Add row

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
			if (trim(strval($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue)) == "") {
				$sFilterWrk = "0=1";
			} else {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue) . "";
			}
			$sSqlWrk = "SELECT `PK_CHUYENMUC`, `C_NAME`, '' AS Disp2Fld, `FK_CONGTY` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect"), ""));
			$t_tinbai_levelsite->FK_CHUYENMUC_ID->EditValue = $arwrk;

			// FK_DOITUONG_ID
			$t_tinbai_levelsite->FK_DOITUONG_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DOITUONG`, `C_NAME`, '' AS Disp2Fld, `FK_CONGTY` FROM `t_doituong_levelsite`";
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
			$t_tinbai_levelsite->C_TITLE->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_TITLE->CurrentValue);

			// C_SUMARY
			$t_tinbai_levelsite->C_SUMARY->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_SUMARY->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_SUMARY->CurrentValue);

			// C_CONTENTS
			$t_tinbai_levelsite->C_CONTENTS->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_CONTENTS->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_CONTENTS->CurrentValue);

			// C_SOURCE
			$t_tinbai_levelsite->C_SOURCE->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_SOURCE->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_SOURCE->CurrentValue);

			// C_HITS
			$t_tinbai_levelsite->C_HITS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là tin nổi bật");
			$arwrk[] = array("1", "Tin nổi bật");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_levelsite->C_HITS->EditValue = $arwrk;

			// C_FILEANH
			$t_tinbai_levelsite->C_FILEANH->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_FILEANH->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_FILEANH->CurrentValue);

			// C_COMENT
			$t_tinbai_levelsite->C_COMENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không cho phép");
			$arwrk[] = array("1", "Cho phép");
			$t_tinbai_levelsite->C_COMENT->EditValue = $arwrk;

			// C_ORDER
			$t_tinbai_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_tinbai_levelsite->C_ORDER->CurrentValue, 9));
                        
                        // C_SENDMAIL
			$t_tinbai_levelsite->C_SENDMAIL->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xác nhận");
			$arwrk[] = array("1", "Xác nhận");
			$t_tinbai_levelsite->C_SENDMAIL->EditValue = $arwrk;

			// C_CONTENTS_MAIL
			$t_tinbai_levelsite->C_CONTENTS_MAIL->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_CONTENTS_MAIL->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_CONTENTS_MAIL->CurrentValue);
                        
                        // C_SENDMAIL_LEVELSITE
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditCustomAttributes = "";
			$arwrk = array();
                        $arwrk[] = array("0", "Không");
			$arwrk[] = array("1", "Xác nhận");
			$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->EditValue = $arwrk;

			// C_FK_BROWSE
			$t_tinbai_levelsite->C_FK_BROWSE->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_NGUOIDUNG_ID`, `C_HOTEN`, `C_EMAIL`, '' AS SelectFilterFld FROM `t_nguoidung`";
			$sWhereWrk = "((t_nguoidung.FK_USERLEVELID = 8) OR (t_nguoidung.FK_USERLEVELID = 9))  AND (t_nguoidung.FK_MACONGTY= ".$Security->CurrentUserOption().")";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			//$sWhereWrk = $GLOBALS["t_nguoidung"]->AddUserIDFilter($sWhereWrk);
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
                         
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_tinbai_levelsite->C_FK_BROWSE->EditValue = $arwrk;
                        
                   

			// C_PIC_MAIN
			$t_tinbai_levelsite->C_PIC_MAIN->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_PIC_MAIN->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_PIC_MAIN->CurrentValue);

			// C_PIC_SCIENCE
			$t_tinbai_levelsite->C_PIC_SCIENCE->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_PIC_SCIENCE->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_PIC_SCIENCE->CurrentValue);

			// C_PIC_ROM
			$t_tinbai_levelsite->C_PIC_ROM->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_PIC_ROM->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_PIC_ROM->CurrentValue);

			// C_PIC_MASS
			$t_tinbai_levelsite->C_PIC_MASS->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_PIC_MASS->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_PIC_MASS->CurrentValue);

			// C_PIC_LIB
			$t_tinbai_levelsite->C_PIC_LIB->EditCustomAttributes = "";
			$t_tinbai_levelsite->C_PIC_LIB->EditValue = ew_HtmlEncode($t_tinbai_levelsite->C_PIC_LIB->CurrentValue);
                        
                        // C_USER_ADD
			// C_ADD_TIME
			

			// FK_EDITOR_ID
		}

		// Call Row Rendered event
		if ($t_tinbai_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_levelsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_tinbai_levelsite;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_tinbai_levelsite->FK_CONGTY_ID->FormValue) && $t_tinbai_levelsite->FK_CONGTY_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->FK_CONGTY_ID->FldCaption();
		}
//		if (!is_null($t_tinbai_levelsite->FK_CHUYENMUC_ID->FormValue) && $t_tinbai_levelsite->FK_CHUYENMUC_ID->FormValue == "") {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->FK_CHUYENMUC_ID->FldCaption();
//		}
//		if ($t_tinbai_levelsite->FK_DOITUONG_ID->FormValue == "") {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->FK_DOITUONG_ID->FldCaption();
//		}
		if (!is_null($t_tinbai_levelsite->C_TITLE->FormValue) && $t_tinbai_levelsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_TITLE->FldCaption();
		}
		if (!is_null($t_tinbai_levelsite->C_SUMARY->FormValue) && $t_tinbai_levelsite->C_SUMARY->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_SUMARY->FldCaption();
		}
		if (!is_null($t_tinbai_levelsite->C_CONTENTS->FormValue) && $t_tinbai_levelsite->C_CONTENTS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_CONTENTS->FldCaption();
		}
		if (!is_null($t_tinbai_levelsite->C_HITS->FormValue) && $t_tinbai_levelsite->C_HITS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_HITS->FldCaption();
		}
		                   
		if ($t_tinbai_levelsite->C_COMENT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_COMENT->FldCaption();
		}
		if (!is_null($t_tinbai_levelsite->C_ORDER->FormValue) && $t_tinbai_levelsite->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_tinbai_levelsite->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_tinbai_levelsite->C_ORDER->FldErrMsg();
		}
               
                if ($t_tinbai_levelsite->C_SENDMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_SENDMAIL->FldCaption();
		}
                
                if ($t_tinbai_levelsite->C_SENDMAIL->FormValue == "1") {
                        if (!is_null($t_tinbai_levelsite->C_CONTENTS_MAIL->FormValue) && $t_tinbai_levelsite->C_CONTENTS_MAIL->FormValue == "") {
                                $gsFormError .= ($gsFormError <> "") ? "<br>" : "";
                                $gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_levelsite->C_CONTENTS_MAIL->FldCaption();
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

	// Add record
	function AddRow() {
		global $conn, $Language, $Security, $t_tinbai_levelsite,$c_list_brows;
		$rsnew = array();

		// FK_CONGTY_ID
		$t_tinbai_levelsite->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_tinbai_levelsite->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

		// FK_CHUYENMUC_ID
		$t_tinbai_levelsite->FK_CHUYENMUC_ID->SetDbValueDef($rsnew, $t_tinbai_levelsite->FK_CHUYENMUC_ID->CurrentValue, 0, FALSE);

		// FK_DOITUONG_ID
		$t_tinbai_levelsite->FK_DOITUONG_ID->SetDbValueDef($rsnew, $t_tinbai_levelsite->FK_DOITUONG_ID->CurrentValue, NULL, FALSE);

		// C_TITLE
		$t_tinbai_levelsite->C_TITLE->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_TITLE->CurrentValue, "", FALSE);

		// C_SUMARY
		$t_tinbai_levelsite->C_SUMARY->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_SUMARY->CurrentValue, NULL, FALSE);

		// C_CONTENTS
		$t_tinbai_levelsite->C_CONTENTS->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_CONTENTS->CurrentValue, NULL, FALSE);

		// C_SOURCE
		$t_tinbai_levelsite->C_SOURCE->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_SOURCE->CurrentValue, NULL, FALSE);

		// C_HITS
		$t_tinbai_levelsite->C_HITS->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_HITS->CurrentValue, NULL, FALSE);
                
                // C_ACTIVE
		$t_tinbai_levelsite->C_ACTIVE->SetDbValueDef($rsnew, 3, 3, FALSE);

		// C_FILEANH
		// $t_tinbai_levelsite->C_FILEANH->Upload->SaveToSession(); // Save file value to Session

		if ($t_tinbai_levelsite->C_HITS->CurrentValue == 1) {
                    $t_tinbai_levelsite->C_FILEANH->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_FILEANH->CurrentValue, NULL, FALSE);	
		} else {
		    $rsnew['C_FILEANH'] = NULL;
		}

		// C_COMENT
		$t_tinbai_levelsite->C_COMENT->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_COMENT->CurrentValue, NULL, FALSE);

		// C_ORDER
		$t_tinbai_levelsite->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_tinbai_levelsite->C_ORDER->CurrentValue, 7, FALSE), ew_CurrentDate());

		// C_USER_ADD
		$t_tinbai_levelsite->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['C_USER_ADD'] =& $t_tinbai_levelsite->C_USER_ADD->DbValue;

		// C_ADD_TIME
		$t_tinbai_levelsite->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
		$rsnew['C_ADD_TIME'] =& $t_tinbai_levelsite->C_ADD_TIME->DbValue;


		// FK_EDITOR_ID
		$t_tinbai_levelsite->FK_EDITOR_ID->SetDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['FK_EDITOR_ID'] =& $t_tinbai_levelsite->FK_EDITOR_ID->DbValue;
                
                // C_STATUS
		$t_tinbai_levelsite->C_STATUS->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_STATUS->CurrentValue, 0, FALSE);
                
                // C_SENDMAIL
		$t_tinbai_levelsite->C_SENDMAIL->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_SENDMAIL->CurrentValue, NULL, FALSE);
                
                // C_SENDMAIL_LEVELSITE
		$t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue, NULL, FALSE);
               
                if($t_tinbai_levelsite->C_SENDMAIL_LEVELSITE->CurrentValue == 1)
                 {
                                 
                                       $list_mail =  Get_Mail_Approved ($t_tinbai_levelsite->C_FK_BROWSE->CurrentValue);
                                        // send Mail bao co noi dung can duyet
                                        $subject = "HPU - Approved";
                                        $noidung = $t_tinbai_levelsite->C_TITLE->CurrentValue;
                                        $hotentacgia =CurrentFullUserName();
                                        $mailtacgia =CurrentEmail();
                                        $sEmail = $list_mail;// nguoi nhan
                                        $bEmailSent = FALSE;
                                        $bValidEmail = FALSE;
                                         if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;
                                        
						if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/Approved.txt");
						$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
						$Email->ReplaceRecipient($sEmail); // Replace Recipient
                                                $Email->ReplaceSubject(strval($subject));
						$Email->ReplaceContent('<!--$Noidung-->', $noidung);
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
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">HPU thông báo: bạn đã gửi Mail thành công tới người phụ trách duyệt bài </font></div>"); // Set success message
							//$this->Page_Terminate("login.php"); // Return to login page
						} elseif ($bValidEmail) {
							$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
						}
                 }
                     
		// C_FK_BROWSE
		$t_tinbai_levelsite->C_FK_BROWSE->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_FK_BROWSE->CurrentValue, NULL, FALSE);

		// C_PIC_MAIN
		$t_tinbai_levelsite->C_PIC_MAIN->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_PIC_MAIN->CurrentValue, NULL, FALSE);

		// C_PIC_SCIENCE
		$t_tinbai_levelsite->C_PIC_SCIENCE->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_PIC_SCIENCE->CurrentValue, NULL, FALSE);

		// C_PIC_ROM
		$t_tinbai_levelsite->C_PIC_ROM->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_PIC_ROM->CurrentValue, NULL, FALSE);

		// C_PIC_MASS
		$t_tinbai_levelsite->C_PIC_MASS->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_PIC_MASS->CurrentValue, NULL, FALSE);

		// C_PIC_LIB
		$t_tinbai_levelsite->C_PIC_LIB->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_PIC_LIB->CurrentValue, NULL, FALSE);
                
                if ($t_tinbai_levelsite->C_SENDMAIL->CurrentValue == '1')
                {   
		// C_CONTENTS_MAIL  
		$t_tinbai_levelsite->C_CONTENTS_MAIL->SetDbValueDef($rsnew, $t_tinbai_levelsite->C_CONTENTS_MAIL->CurrentValue, NULL, FALSE);
                // send Mail 
                                        $subject = "HPU - Design Hot News";
                                        $noidung = $t_tinbai_levelsite->C_TITLE->CurrentValue;
                                        $hinhanh = $t_tinbai_levelsite->C_CONTENTS_MAIL->CurrentValue;
                                        $hotentacgia =CurrentFullUserName();
                                        $mailtacgia =CurrentEmail();
                                        $sEmail = "thaont@hpu.edu.vn";// nguoi nhan
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
                    $t_tinbai_levelsite->C_CONTENTS_MAIL->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                }    
                
		// Call Row Inserting event
		$bInsertRow = $t_tinbai_levelsite->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_tinbai_levelsite->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_tinbai_levelsite->CancelMessage <> "") {
				$this->setMessage($t_tinbai_levelsite->CancelMessage);
				$t_tinbai_levelsite->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_tinbai_levelsite->PK_TINBAI_ID->setDbValue($conn->Insert_ID());
			$rsnew['PK_TINBAI_ID'] = $t_tinbai_levelsite->PK_TINBAI_ID->DbValue;

			// Call Row Inserted event
			$t_tinbai_levelsite->Row_Inserted($rsnew);
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
