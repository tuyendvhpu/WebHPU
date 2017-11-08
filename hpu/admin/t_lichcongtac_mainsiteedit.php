<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_lichcongtac_mainsiteinfo.php" ?>
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
$t_lichcongtac_mainsite_edit = new ct_lichcongtac_mainsite_edit();
$Page =& $t_lichcongtac_mainsite_edit;

// Page init
$t_lichcongtac_mainsite_edit->Page_Init();

// Page main
$t_lichcongtac_mainsite_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lichcongtac_mainsite_edit = new ew_Page("t_lichcongtac_mainsite_edit");

// page properties
t_lichcongtac_mainsite_edit.PageID = "edit"; // page ID
t_lichcongtac_mainsite_edit.FormID = "ft_lichcongtac_mainsiteedit"; // form ID
var EW_PAGE_ID = t_lichcongtac_mainsite_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_lichcongtac_mainsite_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_TITLE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATE_STAR"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_DATE_STAR->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATE_STAR"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_DATE_STAR->FldErrMsg()) ?>");
		
                elm = fobj.elements["x" + infix + "_C_STATUS_STAR"];
                radioValue = checkRadio(fobj.x_C_STATUS_STAR);
                if ((radioValue != 0) || (radioValue != false) )
	        {  
                    elm = fobj.elements["x" + infix + "_C_HOUR_START"];
                    if (elm && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_HOUR_START->FldCaption()) ?>");
                    elm = fobj.elements["x" + infix + "_C_MINUTES_STAR"];
                    if (elm && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - phút");
		}
		
		elm = fobj.elements["x" + infix + "_C_DATE_END"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_DATE_END->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATE_END"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_DATE_END->FldErrMsg()) ?>");
		         
                elm = fobj.elements["x" + infix + "_C_STATUS_END"];
                radioValue = checkRadio(fobj.x_C_STATUS_END);
                if ((radioValue != 0) || (radioValue != false) )
	        {   
                     
                    elm = fobj.elements["x" + infix + "_C_HOUR_END"];
                    if (elm && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_HOUR_END->FldCaption()) ?>");
                    elm = fobj.elements["x" + infix + "_C_MINUTES_END"];
                    if (elm && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - phút");
		} 
		
		elm = fobj.elements["x" + infix + "_C_CONTENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_CONTENT->FldCaption()) ?>");
//		elm = fobj.elements["x" + infix + "_C_PARTICIPANTS_ID"];
//		if (elm && !ew_HasValue(elm))
//			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_WHERE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_WHERE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_PREPARED"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_PREPARED->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_OPTION"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_OPTION->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_PUBLISH"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lichcongtac_mainsite->C_PUBLISH->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}
$(document).ready(function() {

        $("input:radio[name=x_C_STATUS_END]").click(function() {
            var value = $(this).val();
   
            if (value ==0) 
            {
                $("#x_C_HOUR_END").hide();
                $("#x_C_MINUTES_END").hide();
   
            }    
        });
        $("input:radio[name=x_C_STATUS_STAR]").click(function() {
            var value = $(this).val();
            if (value ==0) 
            {
                $("#x_C_HOUR_START").hide();
                $("#x_C_MINUTES_STAR").hide();
 
            }
            
        });
   }); 
// extend page with Form_CustomValidate function
t_lichcongtac_mainsite_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lichcongtac_mainsite_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lichcongtac_mainsite_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lichcongtac_mainsite_edit.ValidateRequired = false; // no JavaScript validation
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
<script src="js/jquery-1.7.2.min.js"></script>
<link href="js/select2.css" rel="stylesheet">
<script src="js/select2.js"></script>

    <script id="script_e14">
        $(document).ready(function () {
 
          $(".x_C_PARTICIPANTS_ID").select2();
       
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
<p class="pheader"><?php echo $t_lichcongtac_mainsite->TableCaption() ?></p>
<a href="<?php echo $t_lichcongtac_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lichcongtac_mainsite_edit->ShowMessage();
?>
<form name="ft_lichcongtac_mainsiteedit" id="ft_lichcongtac_mainsiteedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_lichcongtac_mainsite_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_lichcongtac_mainsite">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_lichcongtac_mainsite->FK_CONGTY->Visible) { // FK_CONGTY ?>
	<tr<?php echo $t_lichcongtac_mainsite->FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->FK_CONGTY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->FK_CONGTY->CellAttributes() ?>><span id="el_FK_CONGTY">
<div<?php echo $t_lichcongtac_mainsite->FK_CONGTY->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->FK_CONGTY->EditValue ?></div><input type="hidden" name="x_FK_CONGTY" id="x_FK_CONGTY" value="<?php echo ew_HtmlEncode($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) ?>">
</span><?php echo $t_lichcongtac_mainsite->FK_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->FK_SB_ID->Visible) { // FK_SB_ID ?>
	<tr<?php echo $t_lichcongtac_mainsite->FK_SB_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->FK_SB_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->FK_SB_ID->CellAttributes() ?>><span id="el_FK_SB_ID">
<div<?php echo $t_lichcongtac_mainsite->FK_SB_ID->ViewAttributes() ?>><?php echo $t_lichcongtac_mainsite->FK_SB_ID->EditValue ?></div><input type="hidden" name="x_FK_SB_ID" id="x_FK_SB_ID" value="<?php echo ew_HtmlEncode($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) ?>">
</span><?php echo $t_lichcongtac_mainsite->FK_SB_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_lichcongtac_mainsite->C_TITLE->FldTitle() ?>" size="98" maxlength="255" value="<?php echo $t_lichcongtac_mainsite->C_TITLE->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_lichcongtac_mainsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_lichcongtac_mainsite->C_DATE_STAR->Visible) { // C_DATE_STAR ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_DATE_STAR->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->CellAttributes() ?>><span id="el_C_DATE_STAR">
<input type="text" name="x_C_DATE_STAR" id="x_C_DATE_STAR" title="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->FldTitle() ?>" value="<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_DATE_STAR->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_STAR" name="cal_x_C_DATE_STAR" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATE_STAR", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_STAR" // button id
});
</script>
</span><?php echo $t_lichcongtac_mainsite->C_DATE_STAR->CustomMsg ?>
      <span class="col2"> <?php echo $t_lichcongtac_mainsite->C_HOUR_START->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?>&nbsp;</span>            
  <span id="el_C_HOUR_START">
<select id="x_C_HOUR_START" name="x_C_HOUR_START" title="<?php echo $t_lichcongtac_mainsite->C_HOUR_START->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->C_HOUR_START->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->C_HOUR_START->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->C_HOUR_START->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_HOUR_START->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac_mainsite->C_HOUR_START->CustomMsg ?>              
 <span id="el_C_MINUTES_STAR">:
<select id="x_C_MINUTES_STAR" name="x_C_MINUTES_STAR" title="<?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->C_MINUTES_STAR->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->C_MINUTES_STAR->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->CustomMsg ?>                   
  <span class="col2"> <?php echo $t_lichcongtac_mainsite->C_MINUTES_STAR->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span>    
                 
                </td>
                <td>
                    <span id="el_C_STATUS_STAR">
<div id="tp_x_C_STATUS_STAR" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS_STAR" id="x_C_STATUS_STAR" title="<?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS_STAR" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac_mainsite->C_STATUS_STAR->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS_STAR" id="x_C_STATUS_STAR" title="<?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac_mainsite->C_STATUS_STAR->CustomMsg ?>
                    
                </td>
	</tr>
<?php } ?>


<?php if ($t_lichcongtac_mainsite->C_DATE_END->Visible) { // C_DATE_END ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_DATE_END->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_DATE_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lichcongtac_mainsite->C_DATE_END->CellAttributes() ?>><span id="el_C_DATE_END">
<input type="text" name="x_C_DATE_END" id="x_C_DATE_END" title="<?php echo $t_lichcongtac_mainsite->C_DATE_END->FldTitle() ?>" value="<?php echo $t_lichcongtac_mainsite->C_DATE_END->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_DATE_END->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATE_END" name="cal_x_C_DATE_END" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATE_END", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATE_END" // button id
});
</script>
</span><?php echo $t_lichcongtac_mainsite->C_DATE_END->CustomMsg ?>
<span class="col2"> <?php echo $t_lichcongtac_mainsite->C_HOUR_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span>  
<span id="el_C_HOUR_END">
<select id="x_C_HOUR_END" name="x_C_HOUR_END" title="<?php echo $t_lichcongtac_mainsite->C_HOUR_END->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->C_HOUR_END->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->C_HOUR_END->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->C_HOUR_END->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_HOUR_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac_mainsite->C_HOUR_END->CustomMsg ?>
                    
 <span id="el_C_MINUTES_END">:
<select id="x_C_MINUTES_END" name="x_C_MINUTES_END" title="<?php echo $t_lichcongtac_mainsite->C_MINUTES_END->FldTitle() ?>"<?php echo $t_lichcongtac_mainsite->C_MINUTES_END->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->C_MINUTES_END->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->C_MINUTES_END->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lichcongtac_mainsite->C_MINUTES_END->CustomMsg ?>  
<span class="col2"> <?php echo $t_lichcongtac_mainsite->C_MINUTES_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span> 
                </td>
                <td>
     <span id="el_C_STATUS_END">
<div id="tp_x_C_STATUS_END" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS_END" id="x_C_STATUS_END" title="<?php echo $t_lichcongtac_mainsite->C_STATUS_END->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac_mainsite->C_STATUS_END->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS_END" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac_mainsite->C_STATUS_END->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS_END" id="x_C_STATUS_END" title="<?php echo $t_lichcongtac_mainsite->C_STATUS_END->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac_mainsite->C_STATUS_END->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac_mainsite->C_STATUS_END->CustomMsg ?>               
                </td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_CONTENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_CONTENT->CellAttributes() ?>><span id="el_C_CONTENT">
<textarea name="x_C_CONTENT" id="x_C_CONTENT" title="<?php echo $t_lichcongtac_mainsite->C_CONTENT->FldTitle() ?>" cols="35" rows="4"<?php echo $t_lichcongtac_mainsite->C_CONTENT->EditAttributes() ?>><?php echo $t_lichcongtac_mainsite->C_CONTENT->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_lichcongtac_mainsite->C_CONTENT->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENT', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENT", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENT', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span><?php echo $t_lichcongtac_mainsite->C_CONTENT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_ORGANIZATION->Visible) { // C_ORGANIZATION ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->CellAttributes() ?>><span id="el_C_ORGANIZATION">
 <textarea style="font-size: 12px" rows="2" cols="38" name="x_C_ORGANIZATION" id="x_C_ORGANIZATION" title="<?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->FldTitle() ?>" <?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->EditAttributes() ?>>
<?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->EditValue ?>
</textarea> 
</span><?php echo $t_lichcongtac_mainsite->C_ORGANIZATION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->Visible) { // C_PARTICIPANTS_ID ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldCaption() ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellAttributes() ?>><span id="el_C_PARTICIPANTS_ID">
<select tabindex="-1" class="x_C_PARTICIPANTS_ID" size="10" style="width:300px;" id="x_C_PARTICIPANTS_ID[]" name="x_C_PARTICIPANTS_ID[]" title="<?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldTitle() ?>" multiple="multiple"<?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditAttributes() ?>>
<?php
if (is_array($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditValue)) {
	$arwrk = $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditValue;
	$armultiwrk= explode(",", strval($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue));
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
</span><?php echo $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CustomMsg ?>
 <i></i>   
 </td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_WHERE->Visible) { // C_WHERE ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_WHERE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_WHERE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_WHERE->CellAttributes() ?>><span id="el_C_WHERE">
<input type="text" name="x_C_WHERE" id="x_C_WHERE" title="<?php echo $t_lichcongtac_mainsite->C_WHERE->FldTitle() ?>" size="98" maxlength="255" value="<?php echo $t_lichcongtac_mainsite->C_WHERE->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_WHERE->EditAttributes() ?>>
</span><?php echo $t_lichcongtac_mainsite->C_WHERE->CustomMsg ?>
                </td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_PREPARED->Visible) { // C_PREPARED ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_PREPARED->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_PREPARED->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_PREPARED->CellAttributes() ?>><span id="el_C_PREPARED">
<input type="text" name="x_C_PREPARED" id="x_C_PREPARED" title="<?php echo $t_lichcongtac_mainsite->C_PREPARED->FldTitle() ?>" size="98" maxlength="255" value="<?php echo $t_lichcongtac_mainsite->C_PREPARED->EditValue ?>"<?php echo $t_lichcongtac_mainsite->C_PREPARED->EditAttributes() ?>>
</span><?php echo $t_lichcongtac_mainsite->C_PREPARED->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_OPTION->Visible) { // C_OPTION ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_OPTION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_OPTION->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_OPTION->CellAttributes() ?>><span id="el_C_OPTION">
<div id="tp_x_C_OPTION" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_OPTION" id="x_C_OPTION" title="<?php echo $t_lichcongtac_mainsite->C_OPTION->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac_mainsite->C_OPTION->EditAttributes() ?>></label></div>
<div id="dsl_x_C_OPTION" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac_mainsite->C_OPTION->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_OPTION->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_OPTION" id="x_C_OPTION" title="<?php echo $t_lichcongtac_mainsite->C_OPTION->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac_mainsite->C_OPTION->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac_mainsite->C_OPTION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_FILE_ATTACH->Visible) { // C_FILE_ATTACH ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->CellAttributes() ?>><span id="el_C_FILE_ATTACH">
<div id="old_x_C_FILE_ATTACH">
<?php if ($t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue <> "" || $t_lichcongtac_mainsite->C_FILE_ATTACH->TooltipValue <> "") { ?>
<?php if (!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) { ?>
<a href="<?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue ?>"><?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue ?></a>
<?php } elseif (!in_array($t_lichcongtac_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) { ?>
<?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue ?>
<?php } elseif (!in_array($t_lichcongtac_mainsite->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_C_FILE_ATTACH">
<?php if (!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) { ?>
<label><input type="radio" name="a_C_FILE_ATTACH" id="a_C_FILE_ATTACH" value="1" checked="checked"><?php echo $Language->Phrase("Keep") ?></label>&nbsp;
<label><input type="radio" name="a_C_FILE_ATTACH" id="a_C_FILE_ATTACH" value="2" disabled="disabled"><?php echo $Language->Phrase("Remove") ?></label>&nbsp;
<label><input type="radio" name="a_C_FILE_ATTACH" id="a_C_FILE_ATTACH" value="3"><?php echo $Language->Phrase("Replace") ?><br></label>
<?php $t_lichcongtac_mainsite->C_FILE_ATTACH->EditAttrs["onchange"] = "this.form.a_C_FILE_ATTACH[2].checked=true;" . @$t_lichcongtac_mainsite->C_FILE_ATTACH->EditAttrs["onchange"]; ?>
<?php } else { ?>
<input type="hidden" name="a_C_FILE_ATTACH" id="a_C_FILE_ATTACH" value="3">
<?php } ?>
<input type="file" name="x_C_FILE_ATTACH" id="x_C_FILE_ATTACH" title="<?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->FldTitle() ?>" size="30"<?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->EditAttributes() ?>>
</div>
</span><?php echo $t_lichcongtac_mainsite->C_FILE_ATTACH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lichcongtac_mainsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_lichcongtac_mainsite->C_PUBLISH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td colspan="2" <?php echo $t_lichcongtac_mainsite->C_PUBLISH->CellAttributes() ?>><span id="el_C_PUBLISH">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_lichcongtac_mainsite->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_lichcongtac_mainsite->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lichcongtac_mainsite->C_PUBLISH->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_lichcongtac_mainsite->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lichcongtac_mainsite->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lichcongtac_mainsite->C_PUBLISH->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_C_CADENLAR_ID" id="x_C_CADENLAR_ID" value="<?php echo ew_HtmlEncode($t_lichcongtac_mainsite->C_CADENLAR_ID->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
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
$t_lichcongtac_mainsite_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lichcongtac_mainsite_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_lichcongtac_mainsite';

	// Page object name
	var $PageObjName = 't_lichcongtac_mainsite_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_lichcongtac_mainsite;
		if ($t_lichcongtac_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_lichcongtac_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_lichcongtac_mainsite;
		if ($t_lichcongtac_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_lichcongtac_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_lichcongtac_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_lichcongtac_mainsite_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lichcongtac_mainsite)
		$GLOBALS["t_lichcongtac_mainsite"] = new ct_lichcongtac_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_lichcongtac_mainsite', TRUE);

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
		global $t_lichcongtac_mainsite;

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
			$this->Page_Terminate("t_lichcongtac_mainsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_lichcongtac_mainsite;

		// Load key from QueryString
		if (@$_GET["C_CADENLAR_ID"] <> "")
			$t_lichcongtac_mainsite->C_CADENLAR_ID->setQueryStringValue($_GET["C_CADENLAR_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_lichcongtac_mainsite->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_lichcongtac_mainsite->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_lichcongtac_mainsite->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_lichcongtac_mainsite->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_lichcongtac_mainsite->C_CADENLAR_ID->CurrentValue == "")
			$this->Page_Terminate("t_lichcongtac_mainsitelist.php"); // Invalid key, return to list
		switch ($t_lichcongtac_mainsite->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_lichcongtac_mainsitelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_lichcongtac_mainsite->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_lichcongtac_mainsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_lichcongtac_mainsiteview.php")
						$sReturnUrl = $t_lichcongtac_mainsite->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_lichcongtac_mainsite->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_lichcongtac_mainsite->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_lichcongtac_mainsite;

		// Get upload data
			if ($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->FK_CONGTY->setFormValue($objForm->GetValue("x_FK_CONGTY"));
		$t_lichcongtac_mainsite->FK_SB_ID->setFormValue($objForm->GetValue("x_FK_SB_ID"));
		$t_lichcongtac_mainsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_lichcongtac_mainsite->C_DATE_STAR->setFormValue($objForm->GetValue("x_C_DATE_STAR"));
		$t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_HOUR_START->setFormValue($objForm->GetValue("x_C_HOUR_START"));
		$t_lichcongtac_mainsite->C_MINUTES_STAR->setFormValue($objForm->GetValue("x_C_MINUTES_STAR"));
		$t_lichcongtac_mainsite->C_STATUS_STAR->setFormValue($objForm->GetValue("x_C_STATUS_STAR"));
		$t_lichcongtac_mainsite->C_DATE_END->setFormValue($objForm->GetValue("x_C_DATE_END"));
		$t_lichcongtac_mainsite->C_DATE_END->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_END->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_HOUR_END->setFormValue($objForm->GetValue("x_C_HOUR_END"));
		$t_lichcongtac_mainsite->C_MINUTES_END->setFormValue($objForm->GetValue("x_C_MINUTES_END"));
		$t_lichcongtac_mainsite->C_STATUS_END->setFormValue($objForm->GetValue("x_C_STATUS_END"));
		$t_lichcongtac_mainsite->C_CONTENT->setFormValue($objForm->GetValue("x_C_CONTENT"));
		$t_lichcongtac_mainsite->C_ORGANIZATION->setFormValue($objForm->GetValue("x_C_ORGANIZATION"));
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->setFormValue($objForm->GetValue("x_C_PARTICIPANTS_ID"));
		$t_lichcongtac_mainsite->C_WHERE->setFormValue($objForm->GetValue("x_C_WHERE"));
		$t_lichcongtac_mainsite->C_PREPARED->setFormValue($objForm->GetValue("x_C_PREPARED"));
		$t_lichcongtac_mainsite->C_OPTION->setFormValue($objForm->GetValue("x_C_OPTION"));
		$t_lichcongtac_mainsite->C_PUBLISH->setFormValue($objForm->GetValue("x_C_PUBLISH"));
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->setFormValue($objForm->GetValue("x_C_DATETIME_PUBLISH"));
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_FK_PUBLISH->setFormValue($objForm->GetValue("x_C_FK_PUBLISH"));
		$t_lichcongtac_mainsite->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_lichcongtac_mainsite->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_CADENLAR_ID->setFormValue($objForm->GetValue("x_C_CADENLAR_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->C_CADENLAR_ID->CurrentValue = $t_lichcongtac_mainsite->C_CADENLAR_ID->FormValue;
		$this->LoadRow();
		$t_lichcongtac_mainsite->FK_CONGTY->CurrentValue = $t_lichcongtac_mainsite->FK_CONGTY->FormValue;
		$t_lichcongtac_mainsite->FK_SB_ID->CurrentValue = $t_lichcongtac_mainsite->FK_SB_ID->FormValue;
		$t_lichcongtac_mainsite->C_TITLE->CurrentValue = $t_lichcongtac_mainsite->C_TITLE->FormValue;
		$t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue = $t_lichcongtac_mainsite->C_DATE_STAR->FormValue;
		$t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_HOUR_START->CurrentValue = $t_lichcongtac_mainsite->C_HOUR_START->FormValue;
		$t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue = $t_lichcongtac_mainsite->C_MINUTES_STAR->FormValue;
		$t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue = $t_lichcongtac_mainsite->C_STATUS_STAR->FormValue;
		$t_lichcongtac_mainsite->C_DATE_END->CurrentValue = $t_lichcongtac_mainsite->C_DATE_END->FormValue;
		$t_lichcongtac_mainsite->C_DATE_END->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_END->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_HOUR_END->CurrentValue = $t_lichcongtac_mainsite->C_HOUR_END->FormValue;
		$t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue = $t_lichcongtac_mainsite->C_MINUTES_END->FormValue;
		$t_lichcongtac_mainsite->C_STATUS_END->CurrentValue = $t_lichcongtac_mainsite->C_STATUS_END->FormValue;
		$t_lichcongtac_mainsite->C_CONTENT->CurrentValue = $t_lichcongtac_mainsite->C_CONTENT->FormValue;
		$t_lichcongtac_mainsite->C_ORGANIZATION->CurrentValue = $t_lichcongtac_mainsite->C_ORGANIZATION->FormValue;
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue = $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FormValue;
		$t_lichcongtac_mainsite->C_WHERE->CurrentValue = $t_lichcongtac_mainsite->C_WHERE->FormValue;
		$t_lichcongtac_mainsite->C_PREPARED->CurrentValue = $t_lichcongtac_mainsite->C_PREPARED->FormValue;
		$t_lichcongtac_mainsite->C_OPTION->CurrentValue = $t_lichcongtac_mainsite->C_OPTION->FormValue;
		$t_lichcongtac_mainsite->C_PUBLISH->CurrentValue = $t_lichcongtac_mainsite->C_PUBLISH->FormValue;
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue = $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->FormValue;
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue, 7);
		$t_lichcongtac_mainsite->C_FK_PUBLISH->CurrentValue = $t_lichcongtac_mainsite->C_FK_PUBLISH->FormValue;
		$t_lichcongtac_mainsite->C_USER_EDIT->CurrentValue = $t_lichcongtac_mainsite->C_USER_EDIT->FormValue;
		$t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue = $t_lichcongtac_mainsite->C_EDIT_TIME->FormValue;
		$t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lichcongtac_mainsite;
		$sFilter = $t_lichcongtac_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_lichcongtac_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lichcongtac_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lichcongtac_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lichcongtac_mainsite;
		$t_lichcongtac_mainsite->C_CADENLAR_ID->setDbValue($rs->fields('C_CADENLAR_ID'));
		$t_lichcongtac_mainsite->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$t_lichcongtac_mainsite->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
		$t_lichcongtac_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_lichcongtac_mainsite->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
		$t_lichcongtac_mainsite->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
		$t_lichcongtac_mainsite->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
		$t_lichcongtac_mainsite->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
		$t_lichcongtac_mainsite->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
		$t_lichcongtac_mainsite->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
		$t_lichcongtac_mainsite->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
		$t_lichcongtac_mainsite->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
		$t_lichcongtac_mainsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_lichcongtac_mainsite->C_ORGANIZATION->setDbValue($rs->fields('C_ORGANIZATION'));
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
		$t_lichcongtac_mainsite->C_WHERE->setDbValue($rs->fields('C_WHERE'));
		$t_lichcongtac_mainsite->C_PREPARED->setDbValue($rs->fields('C_PREPARED'));
		$t_lichcongtac_mainsite->C_OPTION->setDbValue($rs->fields('C_OPTION'));
		$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH');
		$t_lichcongtac_mainsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
		$t_lichcongtac_mainsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
		$t_lichcongtac_mainsite->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
		$t_lichcongtac_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lichcongtac_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lichcongtac_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lichcongtac_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lichcongtac_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lichcongtac_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY

		$t_lichcongtac_mainsite->FK_CONGTY->CellCssStyle = ""; $t_lichcongtac_mainsite->FK_CONGTY->CellCssClass = "";
		$t_lichcongtac_mainsite->FK_CONGTY->CellAttrs = array(); $t_lichcongtac_mainsite->FK_CONGTY->ViewAttrs = array(); $t_lichcongtac_mainsite->FK_CONGTY->EditAttrs = array();

		// FK_SB_ID
		$t_lichcongtac_mainsite->FK_SB_ID->CellCssStyle = ""; $t_lichcongtac_mainsite->FK_SB_ID->CellCssClass = "";
		$t_lichcongtac_mainsite->FK_SB_ID->CellAttrs = array(); $t_lichcongtac_mainsite->FK_SB_ID->ViewAttrs = array(); $t_lichcongtac_mainsite->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$t_lichcongtac_mainsite->C_TITLE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_TITLE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_TITLE->CellAttrs = array(); $t_lichcongtac_mainsite->C_TITLE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$t_lichcongtac_mainsite->C_DATE_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATE_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATE_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATE_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$t_lichcongtac_mainsite->C_HOUR_START->CellCssStyle = ""; $t_lichcongtac_mainsite->C_HOUR_START->CellCssClass = "";
		$t_lichcongtac_mainsite->C_HOUR_START->CellAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_START->ViewAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$t_lichcongtac_mainsite->C_MINUTES_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_MINUTES_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_MINUTES_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$t_lichcongtac_mainsite->C_STATUS_STAR->CellCssStyle = ""; $t_lichcongtac_mainsite->C_STATUS_STAR->CellCssClass = "";
		$t_lichcongtac_mainsite->C_STATUS_STAR->CellAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_STAR->ViewAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$t_lichcongtac_mainsite->C_DATE_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATE_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATE_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATE_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$t_lichcongtac_mainsite->C_HOUR_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_HOUR_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_HOUR_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$t_lichcongtac_mainsite->C_MINUTES_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_MINUTES_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_MINUTES_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$t_lichcongtac_mainsite->C_STATUS_END->CellCssStyle = ""; $t_lichcongtac_mainsite->C_STATUS_END->CellCssClass = "";
		$t_lichcongtac_mainsite->C_STATUS_END->CellAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_END->ViewAttrs = array(); $t_lichcongtac_mainsite->C_STATUS_END->EditAttrs = array();

		// C_CONTENT
		$t_lichcongtac_mainsite->C_CONTENT->CellCssStyle = ""; $t_lichcongtac_mainsite->C_CONTENT->CellCssClass = "";
		$t_lichcongtac_mainsite->C_CONTENT->CellAttrs = array(); $t_lichcongtac_mainsite->C_CONTENT->ViewAttrs = array(); $t_lichcongtac_mainsite->C_CONTENT->EditAttrs = array();

		// C_ORGANIZATION
		$t_lichcongtac_mainsite->C_ORGANIZATION->CellCssStyle = ""; $t_lichcongtac_mainsite->C_ORGANIZATION->CellCssClass = "";
		$t_lichcongtac_mainsite->C_ORGANIZATION->CellAttrs = array(); $t_lichcongtac_mainsite->C_ORGANIZATION->ViewAttrs = array(); $t_lichcongtac_mainsite->C_ORGANIZATION->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CellAttrs = array(); $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_WHERE
		$t_lichcongtac_mainsite->C_WHERE->CellCssStyle = ""; $t_lichcongtac_mainsite->C_WHERE->CellCssClass = "";
		$t_lichcongtac_mainsite->C_WHERE->CellAttrs = array(); $t_lichcongtac_mainsite->C_WHERE->ViewAttrs = array(); $t_lichcongtac_mainsite->C_WHERE->EditAttrs = array();

		// C_PREPARED
		$t_lichcongtac_mainsite->C_PREPARED->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PREPARED->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PREPARED->CellAttrs = array(); $t_lichcongtac_mainsite->C_PREPARED->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PREPARED->EditAttrs = array();

		// C_OPTION
		$t_lichcongtac_mainsite->C_OPTION->CellCssStyle = ""; $t_lichcongtac_mainsite->C_OPTION->CellCssClass = "";
		$t_lichcongtac_mainsite->C_OPTION->CellAttrs = array(); $t_lichcongtac_mainsite->C_OPTION->ViewAttrs = array(); $t_lichcongtac_mainsite->C_OPTION->EditAttrs = array();

		// C_FILE_ATTACH
		$t_lichcongtac_mainsite->C_FILE_ATTACH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_FILE_ATTACH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_FILE_ATTACH->CellAttrs = array(); $t_lichcongtac_mainsite->C_FILE_ATTACH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_FILE_ATTACH->EditAttrs = array();

		// C_PUBLISH
		$t_lichcongtac_mainsite->C_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$t_lichcongtac_mainsite->C_FK_PUBLISH->CellCssStyle = ""; $t_lichcongtac_mainsite->C_FK_PUBLISH->CellCssClass = "";
		$t_lichcongtac_mainsite->C_FK_PUBLISH->CellAttrs = array(); $t_lichcongtac_mainsite->C_FK_PUBLISH->ViewAttrs = array(); $t_lichcongtac_mainsite->C_FK_PUBLISH->EditAttrs = array();

		// C_USER_EDIT
		$t_lichcongtac_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_lichcongtac_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_lichcongtac_mainsite->C_USER_EDIT->CellAttrs = array(); $t_lichcongtac_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_lichcongtac_mainsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_lichcongtac_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_lichcongtac_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_lichcongtac_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_lichcongtac_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_lichcongtac_mainsite->C_EDIT_TIME->EditAttrs = array();
		if ($t_lichcongtac_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_CONGTY
			if (strval($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = $t_lichcongtac_mainsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_CONGTY->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_CONGTY->CssStyle = "";
			$t_lichcongtac_mainsite->FK_CONGTY->CssClass = "";
			$t_lichcongtac_mainsite->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			if (strval($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = $t_lichcongtac_mainsite->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_SB_ID->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_SB_ID->CssStyle = "";
			$t_lichcongtac_mainsite->FK_SB_ID->CssClass = "";
			$t_lichcongtac_mainsite->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->ViewValue = $t_lichcongtac_mainsite->C_TITLE->CurrentValue;
			$t_lichcongtac_mainsite->C_TITLE->CssStyle = "";
			$t_lichcongtac_mainsite->C_TITLE->CssClass = "";
			$t_lichcongtac_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewValue = $t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue;
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATE_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->ViewCustomAttributes = "";

			// C_HOUR_START
			if (strval($t_lichcongtac_mainsite->C_HOUR_START->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_HOUR_START->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = "1";
						break;
					default:
						$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = $t_lichcongtac_mainsite->C_HOUR_START->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_HOUR_START->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_HOUR_START->CssStyle = "";
			$t_lichcongtac_mainsite->C_HOUR_START->CssClass = "";
			$t_lichcongtac_mainsite->C_HOUR_START->ViewCustomAttributes = "";

			// C_MINUTES_STAR
			if (strval($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = "0";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = "1";
						break;
					default:
						$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = $t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_MINUTES_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->ViewCustomAttributes = "";

			// C_STATUS_STAR
			if (strval($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = "Khong xac dinh";
						break;
					case "":
						$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = "";
						break;
					default:
						$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = $t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_STATUS_STAR->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_STATUS_STAR->CssStyle = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->CssClass = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->ViewCustomAttributes = "";

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->ViewValue = $t_lichcongtac_mainsite->C_DATE_END->CurrentValue;
			$t_lichcongtac_mainsite->C_DATE_END->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATE_END->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATE_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATE_END->CssClass = "";
			$t_lichcongtac_mainsite->C_DATE_END->ViewCustomAttributes = "";

			// C_HOUR_END
			if (strval($t_lichcongtac_mainsite->C_HOUR_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_HOUR_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = $t_lichcongtac_mainsite->C_HOUR_END->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_HOUR_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_HOUR_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_HOUR_END->CssClass = "";
			$t_lichcongtac_mainsite->C_HOUR_END->ViewCustomAttributes = "";

			// C_MINUTES_END
			if (strval($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = "0";
						break;
					default:
						$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = $t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_MINUTES_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_MINUTES_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->CssClass = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->ViewCustomAttributes = "";

			// C_STATUS_END
			if (strval($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = "Khong xac dinh";
						break;
					default:
						$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = $t_lichcongtac_mainsite->C_STATUS_END->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_STATUS_END->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_STATUS_END->CssStyle = "";
			$t_lichcongtac_mainsite->C_STATUS_END->CssClass = "";
			$t_lichcongtac_mainsite->C_STATUS_END->ViewCustomAttributes = "";

			// C_CONTENT
			$t_lichcongtac_mainsite->C_CONTENT->ViewValue = $t_lichcongtac_mainsite->C_CONTENT->CurrentValue;
			$t_lichcongtac_mainsite->C_CONTENT->CssStyle = "";
			$t_lichcongtac_mainsite->C_CONTENT->CssClass = "";
			$t_lichcongtac_mainsite->C_CONTENT->ViewCustomAttributes = "";

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->ViewValue = $t_lichcongtac_mainsite->C_ORGANIZATION->CurrentValue;
			$t_lichcongtac_mainsite->C_ORGANIZATION->CssStyle = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->CssClass = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->ViewCustomAttributes = "";

			// C_PARTICIPANTS_ID
			if (strval($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue) <> "") {
				$arwrk = explode(",", $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue);
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
					$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue = $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CssStyle = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CssClass = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->ViewValue = $t_lichcongtac_mainsite->C_WHERE->CurrentValue;
			$t_lichcongtac_mainsite->C_WHERE->CssStyle = "";
			$t_lichcongtac_mainsite->C_WHERE->CssClass = "";
			$t_lichcongtac_mainsite->C_WHERE->ViewCustomAttributes = "";

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->ViewValue = $t_lichcongtac_mainsite->C_PREPARED->CurrentValue;
			$t_lichcongtac_mainsite->C_PREPARED->CssStyle = "";
			$t_lichcongtac_mainsite->C_PREPARED->CssClass = "";
			$t_lichcongtac_mainsite->C_PREPARED->ViewCustomAttributes = "";

			// C_OPTION
			if (strval($t_lichcongtac_mainsite->C_OPTION->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_OPTION->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = "Su kien quan trong";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = "Su kien cong khai";
						break;
					default:
						$t_lichcongtac_mainsite->C_OPTION->ViewValue = $t_lichcongtac_mainsite->C_OPTION->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_OPTION->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_OPTION->CssStyle = "";
			$t_lichcongtac_mainsite->C_OPTION->CssClass = "";
			$t_lichcongtac_mainsite->C_OPTION->ViewCustomAttributes = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue = $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue;
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue = "";
			}
			$t_lichcongtac_mainsite->C_FILE_ATTACH->CssStyle = "";
			$t_lichcongtac_mainsite->C_FILE_ATTACH->CssClass = "";
			$t_lichcongtac_mainsite->C_FILE_ATTACH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_lichcongtac_mainsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = "Khong active levelsite";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = "Active levelsite";
						break;
					default:
						$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = $t_lichcongtac_mainsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_ACTIVE->CssStyle = "";
			$t_lichcongtac_mainsite->C_ACTIVE->CssClass = "";
			$t_lichcongtac_mainsite->C_ACTIVE->ViewCustomAttributes = "";

			// C_DATETIME_ACTIVE
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue = $t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CurrentValue;
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->CssClass = "";
			$t_lichcongtac_mainsite->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_lichcongtac_mainsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_lichcongtac_mainsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = "Khong xuat ban mainsite";
						break;
					case "1":
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = "Xuat ban mainsite";
						break;
					default:
						$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_lichcongtac_mainsite->C_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CurrentValue;
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewValue, 7);
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->ViewValue = $t_lichcongtac_mainsite->C_FK_PUBLISH->CurrentValue;
			$t_lichcongtac_mainsite->C_FK_PUBLISH->CssStyle = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->CssClass = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_lichcongtac_mainsite->C_USER_ADD->ViewValue = $t_lichcongtac_mainsite->C_USER_ADD->CurrentValue;
			$t_lichcongtac_mainsite->C_USER_ADD->CssStyle = "";
			$t_lichcongtac_mainsite->C_USER_ADD->CssClass = "";
			$t_lichcongtac_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewValue = $t_lichcongtac_mainsite->C_ADD_TIME->CurrentValue;
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_lichcongtac_mainsite->C_ADD_TIME->CssStyle = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->CssClass = "";
			$t_lichcongtac_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->ViewValue = $t_lichcongtac_mainsite->C_USER_EDIT->CurrentValue;
			$t_lichcongtac_mainsite->C_USER_EDIT->CssStyle = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->CssClass = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue = $t_lichcongtac_mainsite->C_EDIT_TIME->CurrentValue;
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_lichcongtac_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_lichcongtac_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->CssClass = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_CONGTY
			$t_lichcongtac_mainsite->FK_CONGTY->HrefValue = "";
			$t_lichcongtac_mainsite->FK_CONGTY->TooltipValue = "";

			// FK_SB_ID
			$t_lichcongtac_mainsite->FK_SB_ID->HrefValue = "";
			$t_lichcongtac_mainsite->FK_SB_ID->TooltipValue = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->HrefValue = "";
			$t_lichcongtac_mainsite->C_TITLE->TooltipValue = "";

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->TooltipValue = "";

			// C_HOUR_START
			$t_lichcongtac_mainsite->C_HOUR_START->HrefValue = "";
			$t_lichcongtac_mainsite->C_HOUR_START->TooltipValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac_mainsite->C_MINUTES_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_MINUTES_STAR->TooltipValue = "";

			// C_STATUS_STAR
			$t_lichcongtac_mainsite->C_STATUS_STAR->HrefValue = "";
			$t_lichcongtac_mainsite->C_STATUS_STAR->TooltipValue = "";

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATE_END->TooltipValue = "";

			// C_HOUR_END
			$t_lichcongtac_mainsite->C_HOUR_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_HOUR_END->TooltipValue = "";

			// C_MINUTES_END
			$t_lichcongtac_mainsite->C_MINUTES_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_MINUTES_END->TooltipValue = "";

			// C_STATUS_END
			$t_lichcongtac_mainsite->C_STATUS_END->HrefValue = "";
			$t_lichcongtac_mainsite->C_STATUS_END->TooltipValue = "";

			// C_CONTENT
			$t_lichcongtac_mainsite->C_CONTENT->HrefValue = "";
			$t_lichcongtac_mainsite->C_CONTENT->TooltipValue = "";

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->HrefValue = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->TooltipValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->HrefValue = "";
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->TooltipValue = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->HrefValue = "";
			$t_lichcongtac_mainsite->C_WHERE->TooltipValue = "";

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->HrefValue = "";
			$t_lichcongtac_mainsite->C_PREPARED->TooltipValue = "";

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->HrefValue = "";
			$t_lichcongtac_mainsite->C_OPTION->TooltipValue = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_UploadPathEx(FALSE, $t_lichcongtac_mainsite->C_FILE_ATTACH->UploadPath) . ((!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue)) ? $t_lichcongtac_mainsite->C_FILE_ATTACH->ViewValue : $t_lichcongtac_mainsite->C_FILE_ATTACH->CurrentValue);
				if ($t_lichcongtac_mainsite->Export <> "") $t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_ConvertFullUrl($t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue);
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = "";
			}
			$t_lichcongtac_mainsite->C_FILE_ATTACH->TooltipValue = "";

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_PUBLISH->TooltipValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->TooltipValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->HrefValue = "";
			$t_lichcongtac_mainsite->C_FK_PUBLISH->TooltipValue = "";

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->HrefValue = "";
			$t_lichcongtac_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_lichcongtac_mainsite->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_lichcongtac_mainsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY
			$t_lichcongtac_mainsite->FK_CONGTY->EditCustomAttributes = "";
			if (strval($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_CONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_CONGTY->EditValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_CONGTY->EditValue = $t_lichcongtac_mainsite->FK_CONGTY->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_CONGTY->EditValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_CONGTY->CssStyle = "";
			$t_lichcongtac_mainsite->FK_CONGTY->CssClass = "";
			$t_lichcongtac_mainsite->FK_CONGTY->ViewCustomAttributes = "";

			// FK_SB_ID
			$t_lichcongtac_mainsite->FK_SB_ID->EditCustomAttributes = "";
			if (strval($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) <> "") {
				$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($t_lichcongtac_mainsite->FK_SB_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_lichcongtac_mainsite->FK_SB_ID->EditValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_lichcongtac_mainsite->FK_SB_ID->EditValue = $t_lichcongtac_mainsite->FK_SB_ID->CurrentValue;
				}
			} else {
				$t_lichcongtac_mainsite->FK_SB_ID->EditValue = NULL;
			}
			$t_lichcongtac_mainsite->FK_SB_ID->CssStyle = "";
			$t_lichcongtac_mainsite->FK_SB_ID->CssClass = "";
			$t_lichcongtac_mainsite->FK_SB_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_TITLE->CurrentValue);

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATE_STAR->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue, 7));

			// C_HOUR_START
			$t_lichcongtac_mainsite->C_HOUR_START->EditCustomAttributes = "";
			$arwrk = array();
			for ($i=1;$i<25;$i++)
                        { 
                            if ($i <10) $arwrk[] = array($i, "0".$i);
			    else $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_HOUR_START->EditValue = $arwrk;

			// C_MINUTES_STAR
			$t_lichcongtac_mainsite->C_MINUTES_STAR->EditCustomAttributes = "";
			$arwrk = array();
			for ($i=0;$i<60;$i =$i+5)
                        {
                          if ($i <10) $arwrk[] = array($i, "0".$i);  
			  else $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_MINUTES_STAR->EditValue = $arwrk;

			// C_STATUS_STAR
			$t_lichcongtac_mainsite->C_STATUS_STAR->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xác định");
                        $arwrk[] = array("1", "Thiết lập thời gian");
			$t_lichcongtac_mainsite->C_STATUS_STAR->EditValue = $arwrk;

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_DATE_END->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_lichcongtac_mainsite->C_DATE_END->CurrentValue, 7));

			// C_HOUR_END
			$t_lichcongtac_mainsite->C_HOUR_END->EditCustomAttributes = "";
			$arwrk = array();
			for ($i=1;$i<25;$i++)
                        { 
                            if ($i <10) $arwrk[] = array($i, "0".$i);
			    else $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_HOUR_END->EditValue = $arwrk;

			// C_MINUTES_END
			$t_lichcongtac_mainsite->C_MINUTES_END->EditCustomAttributes = "";
			$arwrk = array();
			for ($i=0;$i<60;$i=$i+5)
                        {
                          if ($i <10) $arwrk[] = array($i, "0".$i);  
			  else $arwrk[] = array($i, $i);
                        }
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lichcongtac_mainsite->C_MINUTES_END->EditValue = $arwrk;

			// C_STATUS_END
			$t_lichcongtac_mainsite->C_STATUS_END->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xác định");
                        $arwrk[] = array("1", "Thiết lập thời gian");
			$t_lichcongtac_mainsite->C_STATUS_END->EditValue = $arwrk;

			// C_CONTENT
			$t_lichcongtac_mainsite->C_CONTENT->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_CONTENT->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_CONTENT->CurrentValue);

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_ORGANIZATION->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_ORGANIZATION->CurrentValue);

			// C_PARTICIPANTS_ID
			$arwrk = GetCompanyTree_Calendar();
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->EditValue = $arwrk;

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_WHERE->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_WHERE->CurrentValue);

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->EditCustomAttributes = "";
			$t_lichcongtac_mainsite->C_PREPARED->EditValue = ew_HtmlEncode($t_lichcongtac_mainsite->C_PREPARED->CurrentValue);

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Sự kiện công khai");
			$arwrk[] = array("1", "Sự kiện quan trọng");
			$t_lichcongtac_mainsite->C_OPTION->EditValue = $arwrk;

			// C_FILE_ATTACH
			$t_lichcongtac_mainsite->C_FILE_ATTACH->EditCustomAttributes = "";
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue = $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue;
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue = "";
			}

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không duyệt lên lịch trường");
                        $arwrk[] = array("1", "Chờ xét");
			$arwrk[] = array("2", "Xét duyệt");
			$t_lichcongtac_mainsite->C_PUBLISH->EditValue = $arwrk;

			// C_DATETIME_PUBLISH
			// C_FK_PUBLISH
			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// FK_CONGTY

			$t_lichcongtac_mainsite->FK_CONGTY->HrefValue = "";

			// FK_SB_ID
			$t_lichcongtac_mainsite->FK_SB_ID->HrefValue = "";

			// C_TITLE
			$t_lichcongtac_mainsite->C_TITLE->HrefValue = "";

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->HrefValue = "";

			// C_HOUR_START
			$t_lichcongtac_mainsite->C_HOUR_START->HrefValue = "";

			// C_MINUTES_STAR
			$t_lichcongtac_mainsite->C_MINUTES_STAR->HrefValue = "";

			// C_STATUS_STAR
			$t_lichcongtac_mainsite->C_STATUS_STAR->HrefValue = "";

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->HrefValue = "";

			// C_HOUR_END
			$t_lichcongtac_mainsite->C_HOUR_END->HrefValue = "";

			// C_MINUTES_END
			$t_lichcongtac_mainsite->C_MINUTES_END->HrefValue = "";

			// C_STATUS_END
			$t_lichcongtac_mainsite->C_STATUS_END->HrefValue = "";

			// C_CONTENT
			$t_lichcongtac_mainsite->C_CONTENT->HrefValue = "";

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->HrefValue = "";

			// C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->HrefValue = "";

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->HrefValue = "";

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->HrefValue = "";

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->HrefValue = "";

			// C_FILE_ATTACH
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_UploadPathEx(FALSE, $t_lichcongtac_mainsite->C_FILE_ATTACH->UploadPath) . ((!empty($t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue)) ? $t_lichcongtac_mainsite->C_FILE_ATTACH->EditValue : $t_lichcongtac_mainsite->C_FILE_ATTACH->CurrentValue);
				if ($t_lichcongtac_mainsite->Export <> "") $t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = ew_ConvertFullUrl($t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue);
			} else {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->HrefValue = "";
			}

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->HrefValue = "";

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->HrefValue = "";

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->HrefValue = "";

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_lichcongtac_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_lichcongtac_mainsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_lichcongtac_mainsite;

		// Initialize form error message
		$gsFormError = "";
		if (!ew_CheckFileType($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("WrongFileType");
		}
		if ($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->FileSize > EW_MAX_FILE_SIZE) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
		}
		if (in_array($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Error, array(1, 2, 3, 6, 7, 8))) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("PhpUploadErr" . $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Error);
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_lichcongtac_mainsite->C_TITLE->FormValue) && $t_lichcongtac_mainsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_TITLE->FldCaption();
		}
		if (!is_null($t_lichcongtac_mainsite->C_DATE_STAR->FormValue) && $t_lichcongtac_mainsite->C_DATE_STAR->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_DATE_STAR->FldCaption();
		}
		if (!ew_CheckEuroDate($t_lichcongtac_mainsite->C_DATE_STAR->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_lichcongtac_mainsite->C_DATE_STAR->FldErrMsg();
		}
		

		if (!is_null($t_lichcongtac_mainsite->C_DATE_END->FormValue) && $t_lichcongtac_mainsite->C_DATE_END->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_DATE_END->FldCaption();
		}
		if (!ew_CheckEuroDate($t_lichcongtac_mainsite->C_DATE_END->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_lichcongtac_mainsite->C_DATE_END->FldErrMsg();
		}
		

		if (!is_null($t_lichcongtac_mainsite->C_CONTENT->FormValue) && $t_lichcongtac_mainsite->C_CONTENT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_CONTENT->FldCaption();
		}
		
//		if ($t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FormValue == "") {
//			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
//			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->FldCaption();
//		}
		if (!is_null($t_lichcongtac_mainsite->C_WHERE->FormValue) && $t_lichcongtac_mainsite->C_WHERE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_WHERE->FldCaption();
		}
		if (!is_null($t_lichcongtac_mainsite->C_PREPARED->FormValue) && $t_lichcongtac_mainsite->C_PREPARED->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_PREPARED->FldCaption();
		}
		if ($t_lichcongtac_mainsite->C_OPTION->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_OPTION->FldCaption();
		}
	
		if ($t_lichcongtac_mainsite->C_PUBLISH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lichcongtac_mainsite->C_PUBLISH->FldCaption();
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
		global $conn, $Security, $Language, $t_lichcongtac_mainsite;
		$sFilter = $t_lichcongtac_mainsite->KeyFilter();
		$t_lichcongtac_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_lichcongtac_mainsite->SQL();
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
			$t_lichcongtac_mainsite->C_TITLE->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_TITLE->CurrentValue, NULL, FALSE);

			// C_DATE_STAR
			$t_lichcongtac_mainsite->C_DATE_STAR->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_STAR->CurrentValue, 7, FALSE), NULL);

			// C_STATUS_STAR
                        $t_lichcongtac_mainsite->C_STATUS_STAR->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue, NULL, FALSE);

                        if (!isset($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue) || ($t_lichcongtac_mainsite->C_STATUS_STAR->CurrentValue == 1))
                        {
                        // C_HOUR_START
                        $t_lichcongtac_mainsite->C_HOUR_START->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_HOUR_START->CurrentValue, NULL, FALSE);
                        // C_MINUTES_STAR
                        if ($t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue == 0) $t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue ="0".$t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue;
                        $t_lichcongtac_mainsite->C_MINUTES_STAR->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_MINUTES_STAR->CurrentValue, NULL, FALSE);
                        } 
                        else 
                        {
                        // C_HOUR_START
                        $t_lichcongtac_mainsite->C_HOUR_START->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                        // C_MINUTES_STAR
                        $t_lichcongtac_mainsite->C_MINUTES_STAR->SetDbValueDef($rsnew, NULL, NULL, FALSE);    
                        }

			// C_DATE_END
			$t_lichcongtac_mainsite->C_DATE_END->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_lichcongtac_mainsite->C_DATE_END->CurrentValue, 7, FALSE), NULL);

			// C_STATUS_END
                        $t_lichcongtac_mainsite->C_STATUS_END->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_STATUS_END->CurrentValue, NULL, FALSE);

                        if (!isset($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue)|| ($t_lichcongtac_mainsite->C_STATUS_END->CurrentValue == 1))
                        {
                        // C_HOUR_END
                        $t_lichcongtac_mainsite->C_HOUR_END->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_HOUR_END->CurrentValue, NULL, FALSE);
                         // C_MINUTES_END
                          if ($t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue == 0) $t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue ="0".$t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue;
		          $t_lichcongtac_mainsite->C_MINUTES_END->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_MINUTES_END->CurrentValue, NULL, FALSE);
                
                        } 
                        else 
                        {
                        // C_HOUR_END
                        $t_lichcongtac_mainsite->C_HOUR_END->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                        // C_MINUTES_END
                        $t_lichcongtac_mainsite->C_MINUTES_END->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                        }

			// C_CONTENT
			$t_lichcongtac_mainsite->C_CONTENT->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_CONTENT->CurrentValue, NULL, FALSE);

			// C_ORGANIZATION
			$t_lichcongtac_mainsite->C_ORGANIZATION->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_ORGANIZATION->CurrentValue, NULL, FALSE);

			// C_PARTICIPANTS_ID
			$t_lichcongtac_mainsite->C_PARTICIPANTS_ID->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_PARTICIPANTS_ID->CurrentValue, NULL, FALSE);

			// C_WHERE
			$t_lichcongtac_mainsite->C_WHERE->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_WHERE->CurrentValue, NULL, FALSE);

			// C_PREPARED
			$t_lichcongtac_mainsite->C_PREPARED->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_PREPARED->CurrentValue, NULL, FALSE);

			// C_OPTION
			$t_lichcongtac_mainsite->C_OPTION->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_OPTION->CurrentValue, NULL, FALSE);

			// C_FILE_ATTACH
			$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->SaveToSession(); // Save file value to Session
						if ($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Action == "2" || $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Action == "3") { // Update/Remove
			$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH'); // Get original value
			if (is_null($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Value)) {
				$rsnew['C_FILE_ATTACH'] = NULL;
			} else {
				$rsnew['C_FILE_ATTACH'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, $t_lichcongtac_mainsite->C_FILE_ATTACH->UploadPath), $t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->FileName);
			}
			}

			// C_PUBLISH
			$t_lichcongtac_mainsite->C_PUBLISH->SetDbValueDef($rsnew, $t_lichcongtac_mainsite->C_PUBLISH->CurrentValue, NULL, FALSE);

			// C_DATETIME_PUBLISH
			$t_lichcongtac_mainsite->C_DATETIME_PUBLISH->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_DATETIME_PUBLISH'] =& $t_lichcongtac_mainsite->C_DATETIME_PUBLISH->DbValue;

			// C_FK_PUBLISH
			$t_lichcongtac_mainsite->C_FK_PUBLISH->SetDbValueDef($rsnew, 1, NULL);
			$rsnew['C_FK_PUBLISH'] =& $t_lichcongtac_mainsite->C_FK_PUBLISH->DbValue;

			// C_USER_EDIT
			$t_lichcongtac_mainsite->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_lichcongtac_mainsite->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_lichcongtac_mainsite->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_lichcongtac_mainsite->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_lichcongtac_mainsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
			if (!ew_Empty($t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->Value)) {
				$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->SaveToFile($t_lichcongtac_mainsite->C_FILE_ATTACH->UploadPath, $rsnew['C_FILE_ATTACH'], FALSE);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_lichcongtac_mainsite->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_lichcongtac_mainsite->CancelMessage <> "") {
					$this->setMessage($t_lichcongtac_mainsite->CancelMessage);
					$t_lichcongtac_mainsite->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_lichcongtac_mainsite->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// C_FILE_ATTACH
		$t_lichcongtac_mainsite->C_FILE_ATTACH->Upload->RemoveFromSession(); // Remove file value from Session
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
