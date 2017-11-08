<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_mainsite_levelinfo.php" ?>
<?php include "t_nguoidunginfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
<?php

// Create page object
$t_tinbai_mainsite_level_edit = new ct_tinbai_mainsite_level_edit();
$Page =& $t_tinbai_mainsite_level_edit;

// Page init
$t_tinbai_mainsite_level_edit->Page_Init();

// Page main
$t_tinbai_mainsite_level_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_level_edit = new ew_Page("t_tinbai_mainsite_level_edit");

// page properties
t_tinbai_mainsite_level_edit.PageID = "edit"; // page ID
t_tinbai_mainsite_level_edit.FormID = "ft_tinbai_mainsite_leveledit"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_level_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_tinbai_mainsite_level_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
//		elm = fobj.elements["x" + infix + "_FK_CHUYENMUC_ID"];
//		if (elm && !ew_HasValue(elm))
//			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FldCaption()) ?>");
//		elm = fobj.elements["x" + infix + "_FK_DOITUONG_ID"];
//		if (elm && !ew_HasValue(elm))
//			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->FK_DOITUONG_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_COMENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->C_COMENT->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_HITS"];
                value = elm.value;
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->C_HITS->FldCaption()) ?>");
		if (value == 1)
                 {
                        elm = fobj.elements["x" + infix + "_C_FILEANH"];
                        aelm = fobj.elements["a" + infix + "_C_FILEANH"];
                        var chk_C_FILEANH = (aelm && aelm[0])?(aelm[2].checked):true;
                        if (elm && chk_C_FILEANH && !ew_HasValue(elm))
                                return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->C_FILEANH->FldCaption()) ?>");
                 }
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite_level->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_mainsite_level->C_ORDER->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_tinbai_mainsite_level_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_level_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_level_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_level_edit.ValidateRequired = false; // no JavaScript validation
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
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {

        $("#x_C_HITS").change(function() {
            var value = $(this).val();
            if (value ==1) 
            {
                $("#x_C_FILEANH").show();
            }
            else
            {
                $("#x_C_FILEANH").hide();
            }    
        });
});
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
<p class="pheader"><span class="phpmaker"><?php echo $t_tinbai_mainsite_level->TableCaption() ?></span></p>
<a href="<?php echo $t_tinbai_mainsite_level->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_level_edit->ShowMessage();
?>
<form name="ft_tinbai_mainsite_leveledit" id="ft_tinbai_mainsite_leveledit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_tinbai_mainsite_level_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_tinbai_mainsite_level">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_tinbai_mainsite_level->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_tinbai_mainsite_level->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->FK_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite_level->FK_CONGTY->CellAttributes() ?>><span id="el_FK_CONGTY">
<?php $t_tinbai_mainsite_level->FK_CONGTY->EditAttrs["onchange"] = "ew_UpdateOpt('x_FK_CHUYENMUC_ID','x_FK_CONGTY',true);ew_UpdateOpt('x_FK_DOITUONG_ID','x_FK_CONGTY',true); " . @$t_tinbai_mainsite_level->FK_CONGTY->EditAttrs["onchange"]; ?>
<select id="x_FK_CONGTY" name="x_FK_CONGTY" title="<?php echo $t_tinbai_mainsite_level->FK_CONGTY->FldTitle() ?>"<?php echo $t_tinbai_mainsite_level->FK_CONGTY->EditAttributes() ?>>
<?php
if (isAdmin())
{    
        if (is_array($t_tinbai_mainsite_level->FK_CONGTY->EditValue)) {
                $arwrk = $t_tinbai_mainsite_level->FK_CONGTY->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_tinbai_mainsite_level->FK_CONGTY->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
    if (is_array($t_tinbai_mainsite_level->FK_CONGTY->EditValue)) {
	$arwrk = $t_tinbai_mainsite_level->FK_CONGTY->EditValue;
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
</span><?php echo $t_tinbai_mainsite_level->FK_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->Visible) { // FK_CHUYENMUC_ID ?>
	<tr<?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CellAttributes() ?>><span id="el_FK_CHUYENMUC_ID">
<select id="x_FK_CHUYENMUC_ID" name="x_FK_CHUYENMUC_ID" title="<?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->FK_DOITUONG_ID->Visible) { // FK_DOITUONG_ID ?>
	<tr<?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->CellAttributes() ?>><span id="el_FK_DOITUONG_ID">
<div id="tp_x_FK_DOITUONG_ID" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->EditAttributes() ?>></label></div>
<div id="dsl_x_FK_DOITUONG_ID" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite_level->FK_DOITUONG_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
<?php
$sSqlWrk = "SELECT `PK_DOITUONG`, `C_NAME`, '' AS Disp2Fld FROM `t_doituong_levelsite`";
$sWhereWrk = "`FK_CONGTY` IN ({filter_value}) AND (C_TYPE = 0)";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_FK_DOITUONG_ID" id="s_x_FK_DOITUONG_ID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_FK_DOITUONG_ID" id="lft_x_FK_DOITUONG_ID" value="1">
</span><?php echo $t_tinbai_mainsite_level->FK_DOITUONG_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<div<?php echo $t_tinbai_mainsite_level->C_TITLE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite_level->C_TITLE->EditValue ?></div><input type="hidden" name="x_C_TITLE" id="x_C_TITLE" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_level->C_TITLE->CurrentValue) ?>">
</span><?php echo $t_tinbai_mainsite_level->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_SUMARY->Visible) { // C_SUMARY ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_SUMARY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_SUMARY->CellAttributes() ?>><span id="el_C_SUMARY">
<div<?php echo $t_tinbai_mainsite_level->C_SUMARY->ViewAttributes() ?>><?php echo $t_tinbai_mainsite_level->C_SUMARY->EditValue ?></div><input type="hidden" name="x_C_SUMARY" id="x_C_SUMARY" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_level->C_SUMARY->CurrentValue) ?>">
</span><?php echo $t_tinbai_mainsite_level->C_SUMARY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_CONTENTS->Visible) { // C_CONTENTS ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_CONTENTS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_CONTENTS->CellAttributes() ?>><span id="el_C_CONTENTS">
<div<?php echo $t_tinbai_mainsite_level->C_CONTENTS->ViewAttributes() ?>><?php echo $t_tinbai_mainsite_level->C_CONTENTS->EditValue ?></div><input type="hidden" name="x_C_CONTENTS" id="x_C_CONTENTS" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_level->C_CONTENTS->CurrentValue) ?>">
</span><?php echo $t_tinbai_mainsite_level->C_CONTENTS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_COMENT->Visible) { // C_COMENT ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_COMENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_COMENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_COMENT->CellAttributes() ?>><span id="el_C_COMENT">
<div id="tp_x_C_COMENT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_COMENT" id="x_C_COMENT" title="<?php echo $t_tinbai_mainsite_level->C_COMENT->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite_level->C_COMENT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_COMENT" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite_level->C_COMENT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite_level->C_COMENT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_COMENT" id="x_C_COMENT" title="<?php echo $t_tinbai_mainsite_level->C_COMENT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite_level->C_COMENT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_mainsite_level->C_COMENT->CustomMsg ?></td>
	</tr>
<?php } ?>
 <tr>
            <td class="ewTableHeader"> Danh sách ảnh tưởng ứng với các khối</td>
            <td> 
              <?php
              // adđ code by Quanghung
                 $sSqlWrk = "Select `C_PIC_MAIN`,`C_PIC_SCIENCE`,`C_PIC_ROM`,`C_PIC_MASS`,`C_PIC_LIB` From t_tinbai_levelsite";
                   $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.PK_TINBAI_ID = '".$t_tinbai_mainsite_level->PK_TINBAI_ID->CurrentValue."')";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    $rswrk = $conn->Execute($sSqlWrk);
              ?>
                <script language="JavaScript" type="text/javascript"> 
                        $('#bntmainsite').click(function(){
                       
                        alert('fsfs');
                       
                    });
                </script>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_SCIENCE'); ?>"><img src="images/view.gif"> Ảnh nổi bật khối khoa </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input id="bntmainsite"  type="button" value="Lựa chọn"> <br/>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_ROM'); ?>">  <img src="images/view.gif"> Ảnh nổi bật khối phòng ban </a> &nbsp;&nbsp; <input id="bntmainsite1"  type="button" value="Lựa chọn"> <br/>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MASS'); ?>"> <img src="images/view.gif"> Ảnh nổi bật khối đoàn thể </a> &nbsp;&nbsp; &nbsp; <input id="bntmainsite2"  type="button" value="Lựa chọn"> <br/>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MASS'); ?>"> <img src="images/view.gif">Ảnh nổi bật khối trung Tâm </a>  &nbsp;&nbsp;&nbsp;  <input id="bntmainsite3"  type="button" value="Lựa chọn"> <br/>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MAIN'); ?>"><img src="images/view.gif"> Ảnh nổi bật Mainsite </a>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MAIN'); ?>"><img src="images/view.gif"> Ảnh tin chúng tôi </a> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
                <script>
                $( "#bntmainsite" ).click(function() {
                  $('#x_C_FILEANH').val('<?php echo $rswrk->fields('C_PIC_SCIENCE'); ?>');
                });
                 $( "#bntmainsite1" ).click(function() {
                  $('#x_C_FILEANH').val('<?php echo $rswrk->fields('C_PIC_ROM'); ?>');
                });
                 $( "#bntmainsite2" ).click(function() {
                  $('#x_C_FILEANH').val('<?php echo $rswrk->fields('C_PIC_MASS'); ?>');
                });
                 $( "#bntmainsite3" ).click(function() {
                  $('#x_C_FILEANH').val('<?php echo $rswrk->fields('C_PIC_LIB'); ?>');
                });
                </script>
            </td>
        </tr>
<?php if ($t_tinbai_mainsite_level->C_HITS->Visible) { // C_HITS ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_HITS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_HITS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_HITS->CellAttributes() ?>><span id="el_C_HITS">
<select id="x_C_HITS" name="x_C_HITS" title="<?php echo $t_tinbai_mainsite_level->C_HITS->FldTitle() ?>"<?php echo $t_tinbai_mainsite_level->C_HITS->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite_level->C_HITS->EditValue)) {
	$arwrk = $t_tinbai_mainsite_level->C_HITS->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite_level->C_HITS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite_level->C_HITS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_FILEANH->Visible) { // C_FILEANH ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_FILEANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_FILEANH->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_FILEANH->CellAttributes() ?>><span id="el_C_FILEANH">
<input type="text" name="x_C_FILEANH" id="x_C_FILEANH" title="<?php echo $t_tinbai_mainsite_level->C_FILEANH->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite_level->C_FILEANH->EditValue ?>"<?php echo $t_tinbai_mainsite_level->C_FILEANH->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite_level->C_FILEANH->CustomMsg ?>
<i> Kích thước ảnh hiển thị:746px*355px</i> -- <a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>              
                </td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite_level->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_tinbai_mainsite_level->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite_level->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite_level->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_tinbai_mainsite_level->C_ORDER->FldTitle() ?>" value="<?php echo $t_tinbai_mainsite_level->C_ORDER->EditValue ?>"<?php echo $t_tinbai_mainsite_level->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	showsTime: true, // show time
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_tinbai_mainsite_level->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_TINBAI_MAINLEVEL" id="x_PK_TINBAI_MAINLEVEL" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CurrentValue) ?>">
<input type="hidden" name="x_PK_TINBAI_ID" id="x_PK_TINBAI_ID" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_level->PK_TINBAI_ID->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--
ew_UpdateOpts([['x_FK_CHUYENMUC_ID','x_FK_CONGTY',false],
['x_FK_DOITUONG_ID','x_FK_CONGTY',false]]);

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
$t_tinbai_mainsite_level_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_level_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_tinbai_mainsite_level';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_level_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_mainsite_level;
		if ($t_tinbai_mainsite_level->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_mainsite_level->TableVar . "&"; // Add page token
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
		global $objForm, $t_tinbai_mainsite_level;
		if ($t_tinbai_mainsite_level->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_mainsite_level->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_mainsite_level->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_mainsite_level_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite_level)
		$GLOBALS["t_tinbai_mainsite_level"] = new ct_tinbai_mainsite_level();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_mainsite_level', TRUE);

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
		global $t_tinbai_mainsite_level;

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
			$this->Page_Terminate("t_tinbai_mainsite_levellist.php");
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
		global $objForm, $Language, $gsFormError, $t_tinbai_mainsite_level;

		// Load key from QueryString
		if (@$_GET["PK_TINBAI_MAINLEVEL"] <> "")
			$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->setQueryStringValue($_GET["PK_TINBAI_MAINLEVEL"]);
		if (@$_GET["PK_TINBAI_ID"] <> "")
			$t_tinbai_mainsite_level->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_tinbai_mainsite_level->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_tinbai_mainsite_level->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_tinbai_mainsite_level->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_tinbai_mainsite_level->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CurrentValue == "")
			$this->Page_Terminate("t_tinbai_mainsite_levellist.php"); // Invalid key, return to list
		if ($t_tinbai_mainsite_level->PK_TINBAI_ID->CurrentValue == "")
			$this->Page_Terminate("t_tinbai_mainsite_levellist.php"); // Invalid key, return to list
		switch ($t_tinbai_mainsite_level->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_tinbai_mainsite_levellist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_tinbai_mainsite_level->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_tinbai_mainsite_level->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_tinbai_mainsite_levelview.php")
						$sReturnUrl = $t_tinbai_mainsite_level->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_tinbai_mainsite_level->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_tinbai_mainsite_level->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_tinbai_mainsite_level;

		// Get upload data
			
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_tinbai_mainsite_level;
		$t_tinbai_mainsite_level->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->setFormValue($objForm->GetValue("x_FK_CHUYENMUC_ID"));
		$t_tinbai_mainsite_level->FK_DOITUONG_ID->setFormValue($objForm->GetValue("x_FK_DOITUONG_ID"));
		$t_tinbai_mainsite_level->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_tinbai_mainsite_level->C_SUMARY->setFormValue($objForm->GetValue("x_C_SUMARY"));
		$t_tinbai_mainsite_level->C_CONTENTS->setFormValue($objForm->GetValue("x_C_CONTENTS"));
		$t_tinbai_mainsite_level->C_COMENT->setFormValue($objForm->GetValue("x_C_COMENT"));
		$t_tinbai_mainsite_level->C_HITS->setFormValue($objForm->GetValue("x_C_HITS"));
		$t_tinbai_mainsite_level->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_tinbai_mainsite_level->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite_level->C_ORDER->CurrentValue, 11);
		$t_tinbai_mainsite_level->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_tinbai_mainsite_level->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue, 7);
		$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_FK_NGUOIDUNG_ID"));
		$t_tinbai_mainsite_level->FK_EDITOR_ID->setFormValue($objForm->GetValue("x_FK_EDITOR_ID"));
		$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->setFormValue($objForm->GetValue("x_PK_TINBAI_MAINLEVEL"));
		$t_tinbai_mainsite_level->PK_TINBAI_ID->setFormValue($objForm->GetValue("x_PK_TINBAI_ID"));
                $t_tinbai_mainsite_level->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
                $t_tinbai_mainsite_level->C_FILEANH->setFormValue($objForm->GetValue("x_C_FILEANH"));     
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_tinbai_mainsite_level;
		$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CurrentValue = $t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->FormValue;
		$t_tinbai_mainsite_level->PK_TINBAI_ID->CurrentValue = $t_tinbai_mainsite_level->PK_TINBAI_ID->FormValue;
		$this->LoadRow();
		$t_tinbai_mainsite_level->FK_CONGTY->CurrentValue = $t_tinbai_mainsite_level->FK_CONGTY->FormValue;
		$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue = $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FormValue;
		$t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue = $t_tinbai_mainsite_level->FK_DOITUONG_ID->FormValue;
		$t_tinbai_mainsite_level->C_TITLE->CurrentValue = $t_tinbai_mainsite_level->C_TITLE->FormValue;
		$t_tinbai_mainsite_level->C_SUMARY->CurrentValue = $t_tinbai_mainsite_level->C_SUMARY->FormValue;
		$t_tinbai_mainsite_level->C_CONTENTS->CurrentValue = $t_tinbai_mainsite_level->C_CONTENTS->FormValue;
		$t_tinbai_mainsite_level->C_COMENT->CurrentValue = $t_tinbai_mainsite_level->C_COMENT->FormValue;
		$t_tinbai_mainsite_level->C_HITS->CurrentValue = $t_tinbai_mainsite_level->C_HITS->FormValue;
		$t_tinbai_mainsite_level->C_ORDER->CurrentValue = $t_tinbai_mainsite_level->C_ORDER->FormValue;
		$t_tinbai_mainsite_level->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite_level->C_ORDER->CurrentValue, 11);
		$t_tinbai_mainsite_level->C_USER_EDIT->CurrentValue = $t_tinbai_mainsite_level->C_USER_EDIT->FormValue;
		$t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue = $t_tinbai_mainsite_level->C_EDIT_TIME->FormValue;
		$t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue, 7);
		$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CurrentValue = $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->FormValue;
		$t_tinbai_mainsite_level->FK_EDITOR_ID->CurrentValue = $t_tinbai_mainsite_level->FK_EDITOR_ID->FormValue;
                $t_tinbai_mainsite_level->C_ACTIVE->CurrentValue = $t_tinbai_mainsite_level->C_ACTIVE->FormValue;
                $t_tinbai_mainsite_level->C_FILEANH->CurrentValue = $t_tinbai_mainsite_level->C_FILEANH->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_mainsite_level;
		$sFilter = $t_tinbai_mainsite_level->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_mainsite_level->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_mainsite_level->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite_level->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_mainsite_level->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_mainsite_level;
		$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->setDbValue($rs->fields('PK_TINBAI_MAINLEVEL'));
		$t_tinbai_mainsite_level->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_mainsite_level->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->setDbValue($rs->fields('FK_CHUYENMUC_ID'));
		$t_tinbai_mainsite_level->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$t_tinbai_mainsite_level->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_mainsite_level->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_mainsite_level->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_mainsite_level->C_COMENT->setDbValue($rs->fields('C_COMENT'));
		$t_tinbai_mainsite_level->C_HITS->setDbValue($rs->fields('C_HITS'));
		$t_tinbai_mainsite_level->C_FILEANH->setDbValue($rs->fields('C_FILEANH'));
		$t_tinbai_mainsite_level->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_tinbai_mainsite_level->C_VISITOR->setDbValue($rs->fields('C_VISITOR'));
		$t_tinbai_mainsite_level->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_mainsite_level->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_mainsite_level->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_mainsite_level->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$t_tinbai_mainsite_level->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
		$t_tinbai_mainsite_level->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
                $t_tinbai_mainsite_level->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite_level;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_mainsite_level->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_tinbai_mainsite_level->FK_CONGTY->CellCssStyle = ""; $t_tinbai_mainsite_level->FK_CONGTY->CellCssClass = "";
		$t_tinbai_mainsite_level->FK_CONGTY->CellAttrs = array(); $t_tinbai_mainsite_level->FK_CONGTY->ViewAttrs = array(); $t_tinbai_mainsite_level->FK_CONGTY->EditAttrs = array();

		// FK_CHUYENMUC_ID
		$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CellCssStyle = ""; $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CellCssClass = "";
		$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CellAttrs = array(); $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->ViewAttrs = array(); $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditAttrs = array();

		// FK_DOITUONG_ID
		$t_tinbai_mainsite_level->FK_DOITUONG_ID->CellCssStyle = ""; $t_tinbai_mainsite_level->FK_DOITUONG_ID->CellCssClass = "";
		$t_tinbai_mainsite_level->FK_DOITUONG_ID->CellAttrs = array(); $t_tinbai_mainsite_level->FK_DOITUONG_ID->ViewAttrs = array(); $t_tinbai_mainsite_level->FK_DOITUONG_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_mainsite_level->C_TITLE->CellCssStyle = ""; $t_tinbai_mainsite_level->C_TITLE->CellCssClass = "";
		$t_tinbai_mainsite_level->C_TITLE->CellAttrs = array(); $t_tinbai_mainsite_level->C_TITLE->ViewAttrs = array(); $t_tinbai_mainsite_level->C_TITLE->EditAttrs = array();

		// C_SUMARY
		$t_tinbai_mainsite_level->C_SUMARY->CellCssStyle = ""; $t_tinbai_mainsite_level->C_SUMARY->CellCssClass = "";
		$t_tinbai_mainsite_level->C_SUMARY->CellAttrs = array(); $t_tinbai_mainsite_level->C_SUMARY->ViewAttrs = array(); $t_tinbai_mainsite_level->C_SUMARY->EditAttrs = array();

		// C_CONTENTS
		$t_tinbai_mainsite_level->C_CONTENTS->CellCssStyle = ""; $t_tinbai_mainsite_level->C_CONTENTS->CellCssClass = "";
		$t_tinbai_mainsite_level->C_CONTENTS->CellAttrs = array(); $t_tinbai_mainsite_level->C_CONTENTS->ViewAttrs = array(); $t_tinbai_mainsite_level->C_CONTENTS->EditAttrs = array();

		// C_COMENT
		$t_tinbai_mainsite_level->C_COMENT->CellCssStyle = ""; $t_tinbai_mainsite_level->C_COMENT->CellCssClass = "";
		$t_tinbai_mainsite_level->C_COMENT->CellAttrs = array(); $t_tinbai_mainsite_level->C_COMENT->ViewAttrs = array(); $t_tinbai_mainsite_level->C_COMENT->EditAttrs = array();

		// C_HITS
		$t_tinbai_mainsite_level->C_HITS->CellCssStyle = ""; $t_tinbai_mainsite_level->C_HITS->CellCssClass = "";
		$t_tinbai_mainsite_level->C_HITS->CellAttrs = array(); $t_tinbai_mainsite_level->C_HITS->ViewAttrs = array(); $t_tinbai_mainsite_level->C_HITS->EditAttrs = array();

		// C_FILEANH
		$t_tinbai_mainsite_level->C_FILEANH->CellCssStyle = ""; $t_tinbai_mainsite_level->C_FILEANH->CellCssClass = "";
		$t_tinbai_mainsite_level->C_FILEANH->CellAttrs = array(); $t_tinbai_mainsite_level->C_FILEANH->ViewAttrs = array(); $t_tinbai_mainsite_level->C_FILEANH->EditAttrs = array();

		// C_ORDER
		$t_tinbai_mainsite_level->C_ORDER->CellCssStyle = ""; $t_tinbai_mainsite_level->C_ORDER->CellCssClass = "";
		$t_tinbai_mainsite_level->C_ORDER->CellAttrs = array(); $t_tinbai_mainsite_level->C_ORDER->ViewAttrs = array(); $t_tinbai_mainsite_level->C_ORDER->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_mainsite_level->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_mainsite_level->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_mainsite_level->C_USER_EDIT->CellAttrs = array(); $t_tinbai_mainsite_level->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_mainsite_level->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_mainsite_level->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_mainsite_level->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_mainsite_level->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_mainsite_level->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_mainsite_level->C_EDIT_TIME->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_mainsite_level->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_mainsite_level->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_mainsite_level->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_mainsite_level->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_mainsite_level->FK_EDITOR_ID->EditAttrs = array();
                
                // C_ACTIVE
		$t_tinbai_mainsite_level->C_ACTIVE->CellCssStyle = ""; $t_tinbai_mainsite_level->C_ACTIVE->CellCssClass = "";
		$t_tinbai_mainsite_level->C_ACTIVE->CellAttrs = array(); $t_tinbai_mainsite_level->C_ACTIVE->ViewAttrs = array(); $t_tinbai_mainsite_level->C_ACTIVE->EditAttrs = array();
                
		if ($t_tinbai_mainsite_level->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_MAINLEVEL
			$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->ViewValue = $t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CurrentValue;
			$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CssStyle = "";
			$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->CssClass = "";
			$t_tinbai_mainsite_level->PK_TINBAI_MAINLEVEL->ViewCustomAttributes = "";

			// PK_TINBAI_ID
			$t_tinbai_mainsite_level->PK_TINBAI_ID->ViewValue = $t_tinbai_mainsite_level->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_mainsite_level->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_mainsite_level->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_mainsite_level->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			if (strval($t_tinbai_mainsite_level->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_mainsite_level->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite_level->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite_level->FK_CONGTY->ViewValue = $t_tinbai_mainsite_level->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite_level->FK_CONGTY->ViewValue = NULL;
			}
			$t_tinbai_mainsite_level->FK_CONGTY->CssStyle = "";
			$t_tinbai_mainsite_level->FK_CONGTY->CssClass = "";
			$t_tinbai_mainsite_level->FK_CONGTY->ViewCustomAttributes = "";

			// FK_CHUYENMUC_ID
			if (strval($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->ViewValue = $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CssStyle = "";
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CssClass = "";
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite_level->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite_level->FK_DOITUONG_ID->ViewValue = $t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite_level->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->CssStyle = "";
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->CssClass = "";
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_mainsite_level->C_TITLE->ViewValue = $t_tinbai_mainsite_level->C_TITLE->CurrentValue;
			$t_tinbai_mainsite_level->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite_level->C_TITLE->CssClass = "";
			$t_tinbai_mainsite_level->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_mainsite_level->C_SUMARY->ViewValue = $t_tinbai_mainsite_level->C_SUMARY->CurrentValue;
			$t_tinbai_mainsite_level->C_SUMARY->CssStyle = "";
			$t_tinbai_mainsite_level->C_SUMARY->CssClass = "";
			$t_tinbai_mainsite_level->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_mainsite_level->C_CONTENTS->ViewValue = $t_tinbai_mainsite_level->C_CONTENTS->CurrentValue;
			$t_tinbai_mainsite_level->C_CONTENTS->CssStyle = "";
			$t_tinbai_mainsite_level->C_CONTENTS->CssClass = "";
			$t_tinbai_mainsite_level->C_CONTENTS->ViewCustomAttributes = "";

			// C_COMENT
			if (strval($t_tinbai_mainsite_level->C_COMENT->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite_level->C_COMENT->CurrentValue) {
					case "0":
						$t_tinbai_mainsite_level->C_COMENT->ViewValue = "Khong cho phep";
						break;
					case "1":
						$t_tinbai_mainsite_level->C_COMENT->ViewValue = "Cho phep";
						break;
					default:
						$t_tinbai_mainsite_level->C_COMENT->ViewValue = $t_tinbai_mainsite_level->C_COMENT->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite_level->C_COMENT->ViewValue = NULL;
			}
			$t_tinbai_mainsite_level->C_COMENT->CssStyle = "";
			$t_tinbai_mainsite_level->C_COMENT->CssClass = "";
			$t_tinbai_mainsite_level->C_COMENT->ViewCustomAttributes = "";

			// C_HITS
			if (strval($t_tinbai_mainsite_level->C_HITS->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite_level->C_HITS->CurrentValue) {
					case "0":
						$t_tinbai_mainsite_level->C_HITS->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_mainsite_level->C_HITS->ViewValue = "Tin noi bat";
						break;
					default:
						$t_tinbai_mainsite_level->C_HITS->ViewValue = $t_tinbai_mainsite_level->C_HITS->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite_level->C_HITS->ViewValue = NULL;
			}
			$t_tinbai_mainsite_level->C_HITS->CssStyle = "";
			$t_tinbai_mainsite_level->C_HITS->CssClass = "";
			$t_tinbai_mainsite_level->C_HITS->ViewCustomAttributes = "";

			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->ViewValue = $t_tinbai_mainsite_level->C_FILEANH->CurrentValue;
			$t_tinbai_mainsite_level->C_FILEANH->C_FILEANH->ImageAlt = $t_tinbai_mainsite_level->C_FILEANH->FldAlt;
			$t_tinbai_mainsite_level->C_FILEANH->CssStyle = "";
			$t_tinbai_mainsite_level->C_FILEANH->CssClass = "";
			$t_tinbai_mainsite_level->C_FILEANH->ViewCustomAttributes = "";

			// C_ORDER
			$t_tinbai_mainsite_level->C_ORDER->ViewValue = $t_tinbai_mainsite_level->C_ORDER->CurrentValue;
			$t_tinbai_mainsite_level->C_ORDER->ViewValue = ew_FormatDateTime($t_tinbai_mainsite_level->C_ORDER->ViewValue, 11);
			$t_tinbai_mainsite_level->C_ORDER->CssStyle = "";
			$t_tinbai_mainsite_level->C_ORDER->CssClass = "";
			$t_tinbai_mainsite_level->C_ORDER->ViewCustomAttributes = "";

			// C_VISITOR
			$t_tinbai_mainsite_level->C_VISITOR->ViewValue = $t_tinbai_mainsite_level->C_VISITOR->CurrentValue;
			$t_tinbai_mainsite_level->C_VISITOR->CssStyle = "";
			$t_tinbai_mainsite_level->C_VISITOR->CssClass = "";
			$t_tinbai_mainsite_level->C_VISITOR->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_mainsite_level->C_USER_ADD->ViewValue = $t_tinbai_mainsite_level->C_USER_ADD->CurrentValue;
			$t_tinbai_mainsite_level->C_USER_ADD->CssStyle = "";
			$t_tinbai_mainsite_level->C_USER_ADD->CssClass = "";
			$t_tinbai_mainsite_level->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_tinbai_mainsite_level->C_ADD_TIME->ViewValue = $t_tinbai_mainsite_level->C_ADD_TIME->CurrentValue;
			$t_tinbai_mainsite_level->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite_level->C_ADD_TIME->ViewValue, 7);
			$t_tinbai_mainsite_level->C_ADD_TIME->CssStyle = "";
			$t_tinbai_mainsite_level->C_ADD_TIME->CssClass = "";
			$t_tinbai_mainsite_level->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_tinbai_mainsite_level->C_USER_EDIT->ViewValue = $t_tinbai_mainsite_level->C_USER_EDIT->CurrentValue;
			$t_tinbai_mainsite_level->C_USER_EDIT->CssStyle = "";
			$t_tinbai_mainsite_level->C_USER_EDIT->CssClass = "";
			$t_tinbai_mainsite_level->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite_level->C_EDIT_TIME->ViewValue = $t_tinbai_mainsite_level->C_EDIT_TIME->CurrentValue;
			$t_tinbai_mainsite_level->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite_level->C_EDIT_TIME->ViewValue, 7);
			$t_tinbai_mainsite_level->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_mainsite_level->C_EDIT_TIME->CssClass = "";
			$t_tinbai_mainsite_level->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->ViewValue = $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CurrentValue;
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->CssClass = "";
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite_level->FK_EDITOR_ID->ViewValue = $t_tinbai_mainsite_level->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_mainsite_level->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_mainsite_level->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_mainsite_level->FK_EDITOR_ID->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_tinbai_mainsite_level->FK_CONGTY->HrefValue = "";
			$t_tinbai_mainsite_level->FK_CONGTY->TooltipValue = "";

			// FK_CHUYENMUC_ID
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->HrefValue = "";
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->TooltipValue = "";

			// FK_DOITUONG_ID
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->HrefValue = "";
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_mainsite_level->C_TITLE->HrefValue = "";
			$t_tinbai_mainsite_level->C_TITLE->TooltipValue = "";

			// C_SUMARY
			$t_tinbai_mainsite_level->C_SUMARY->HrefValue = "";
			$t_tinbai_mainsite_level->C_SUMARY->TooltipValue = "";

			// C_CONTENTS
			$t_tinbai_mainsite_level->C_CONTENTS->HrefValue = "";
			$t_tinbai_mainsite_level->C_CONTENTS->TooltipValue = "";

			// C_COMENT
			$t_tinbai_mainsite_level->C_COMENT->HrefValue = "";
			$t_tinbai_mainsite_level->C_COMENT->TooltipValue = "";

			// C_HITS
			$t_tinbai_mainsite_level->C_HITS->HrefValue = "";
			$t_tinbai_mainsite_level->C_HITS->TooltipValue = "";

			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->HrefValue = "";
			$t_tinbai_mainsite_level->C_FILEANH->TooltipValue = "";

			// C_ORDER
			$t_tinbai_mainsite_level->C_ORDER->HrefValue = "";
			$t_tinbai_mainsite_level->C_ORDER->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite_level->C_USER_EDIT->HrefValue = "";
			$t_tinbai_mainsite_level->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite_level->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_mainsite_level->C_EDIT_TIME->TooltipValue = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite_level->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_mainsite_level->FK_EDITOR_ID->TooltipValue = "";
		} elseif ($t_tinbai_mainsite_level->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY
			$t_tinbai_mainsite_level->FK_CONGTY->EditCustomAttributes = "";
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
			$t_tinbai_mainsite_level->FK_CONGTY->EditValue = $arwrk;

			// FK_CHUYENMUC_ID
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditCustomAttributes = "";
			if (trim(strval($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue)) == "") {
				$sFilterWrk = "0=1";
			} else {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue) . "";
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
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->EditValue = $arwrk;

			// FK_DOITUONG_ID
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->EditCustomAttributes = "";
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
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->EditValue = $arwrk;

			// C_TITLE
			$t_tinbai_mainsite_level->C_TITLE->EditCustomAttributes = "";
			$t_tinbai_mainsite_level->C_TITLE->EditValue = $t_tinbai_mainsite_level->C_TITLE->CurrentValue;
			$t_tinbai_mainsite_level->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite_level->C_TITLE->CssClass = "";
			$t_tinbai_mainsite_level->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_mainsite_level->C_SUMARY->EditCustomAttributes = "";
			$t_tinbai_mainsite_level->C_SUMARY->EditValue = $t_tinbai_mainsite_level->C_SUMARY->CurrentValue;
			$t_tinbai_mainsite_level->C_SUMARY->CssStyle = "";
			$t_tinbai_mainsite_level->C_SUMARY->CssClass = "";
			$t_tinbai_mainsite_level->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_mainsite_level->C_CONTENTS->EditCustomAttributes = "";
			$t_tinbai_mainsite_level->C_CONTENTS->EditValue = $t_tinbai_mainsite_level->C_CONTENTS->CurrentValue;
			$t_tinbai_mainsite_level->C_CONTENTS->CssStyle = "";
			$t_tinbai_mainsite_level->C_CONTENTS->CssClass = "";
			$t_tinbai_mainsite_level->C_CONTENTS->ViewCustomAttributes = "";

			// C_COMENT
			$t_tinbai_mainsite_level->C_COMENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không cho phép");
			$arwrk[] = array("1", "Cho phép");
			$t_tinbai_mainsite_level->C_COMENT->EditValue = $arwrk;

			// C_HITS
			$t_tinbai_mainsite_level->C_HITS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là tin nổi bật");
			$arwrk[] = array("1", "Tin nổi bật");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_tinbai_mainsite_level->C_HITS->EditValue = $arwrk;

			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->EditCustomAttributes = "";
			$t_tinbai_mainsite_level->C_FILEANH->EditValue = ew_HtmlEncode($t_tinbai_mainsite_level->C_FILEANH->CurrentValue);

			// C_ORDER
			$t_tinbai_mainsite_level->C_ORDER->EditCustomAttributes = "";
			$t_tinbai_mainsite_level->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_tinbai_mainsite_level->C_ORDER->CurrentValue, 11));

			// C_USER_EDIT
			// C_EDIT_TIME
			// FK_NGUOIDUNG_ID
			// FK_EDITOR_ID
			// Edit refer script
			// FK_CONGTY

			$t_tinbai_mainsite_level->FK_CONGTY->HrefValue = "";

			// FK_CHUYENMUC_ID
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->HrefValue = "";

			// FK_DOITUONG_ID
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->HrefValue = "";

			// C_TITLE
			$t_tinbai_mainsite_level->C_TITLE->HrefValue = "";

			// C_SUMARY
			$t_tinbai_mainsite_level->C_SUMARY->HrefValue = "";

			// C_CONTENTS
			$t_tinbai_mainsite_level->C_CONTENTS->HrefValue = "";

			// C_COMENT
			$t_tinbai_mainsite_level->C_COMENT->HrefValue = "";

			// C_HITS
			$t_tinbai_mainsite_level->C_HITS->HrefValue = "";

			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->HrefValue = "";

			// C_ORDER
			$t_tinbai_mainsite_level->C_ORDER->HrefValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite_level->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite_level->C_EDIT_TIME->HrefValue = "";

			// FK_NGUOIDUNG_ID
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->HrefValue = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite_level->FK_EDITOR_ID->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_tinbai_mainsite_level->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_mainsite_level->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_tinbai_mainsite_level;

		// Initialize form error message
		$gsFormError = "";
		

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
//		if (!is_null($t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FormValue) && $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FormValue == "") {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->FldCaption();
//		}
//		if ($t_tinbai_mainsite_level->FK_DOITUONG_ID->FormValue == "") {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->FK_DOITUONG_ID->FldCaption();
//		}
		if ($t_tinbai_mainsite_level->C_COMENT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->C_COMENT->FldCaption();
		}
		if (!is_null($t_tinbai_mainsite_level->C_HITS->FormValue) && $t_tinbai_mainsite_level->C_HITS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->C_HITS->FldCaption();
		}
                if ($t_tinbai_mainsite_level->C_HITS->FormValue == "1") {
			if (!is_null($t_tinbai_mainsite_level->C_FILEANH->FormValue) && $t_tinbai_mainsite_level->C_FILEANH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->C_FILEANH->FldCaption();
		      }
		}

		if (!is_null($t_tinbai_mainsite_level->C_ORDER->FormValue) && $t_tinbai_mainsite_level->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite_level->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_tinbai_mainsite_level->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_tinbai_mainsite_level->C_ORDER->FldErrMsg();
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
		global $conn, $Security, $Language, $t_tinbai_mainsite_level;
		$sFilter = $t_tinbai_mainsite_level->KeyFilter();
		$t_tinbai_mainsite_level->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite_level->SQL();
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

			// FK_CONGTY
			$t_tinbai_mainsite_level->FK_CONGTY->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->FK_CONGTY->CurrentValue, NULL, FALSE);

			// FK_CHUYENMUC_ID
			$t_tinbai_mainsite_level->FK_CHUYENMUC_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->FK_CHUYENMUC_ID->CurrentValue, NULL, FALSE);

			// FK_DOITUONG_ID
			$t_tinbai_mainsite_level->FK_DOITUONG_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->FK_DOITUONG_ID->CurrentValue, NULL, FALSE);

			// C_COMENT
			$t_tinbai_mainsite_level->C_COMENT->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->C_COMENT->CurrentValue, NULL, FALSE);

			// C_HITS
			$t_tinbai_mainsite_level->C_HITS->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->C_HITS->CurrentValue, NULL, FALSE);
                        
                        if ($t_tinbai_mainsite_level->C_HITS->CurrentValue ==1)
                        {
			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->SetDbValueDef($rsnew, $t_tinbai_mainsite_level->C_FILEANH->CurrentValue, NULL, FALSE);
                        } 
                        else
                        {
			// C_FILEANH
			$t_tinbai_mainsite_level->C_FILEANH->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                        } 
                            
			// C_ORDER
			$t_tinbai_mainsite_level->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_tinbai_mainsite_level->C_ORDER->CurrentValue, 11, FALSE), ew_CurrentDate());

			// C_USER_EDIT
			$t_tinbai_mainsite_level->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_tinbai_mainsite_level->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_tinbai_mainsite_level->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_tinbai_mainsite_level->C_EDIT_TIME->DbValue;

			// FK_NGUOIDUNG_ID
			$t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['FK_NGUOIDUNG_ID'] =& $t_tinbai_mainsite_level->FK_NGUOIDUNG_ID->DbValue;
                        
                        // C_ACTIVE
			$t_tinbai_mainsite_level->C_ACTIVE->SetDbValueDef($rsnew, 1, NULL);
			$rsnew['C_ACTIVE'] =& $t_tinbai_mainsite_level->C_ACTIVE->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_tinbai_mainsite_level->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
			
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_tinbai_mainsite_level->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_tinbai_mainsite_level->CancelMessage <> "") {
					$this->setMessage($t_tinbai_mainsite_level->CancelMessage);
					$t_tinbai_mainsite_level->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_tinbai_mainsite_level->Row_Updated($rsold, $rsnew);
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
