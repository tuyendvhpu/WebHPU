<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_tinbai_mainsiteinfo.php" ?>
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
$t_tinbai_mainsite_edit = new ct_tinbai_mainsite_edit();
$Page =& $t_tinbai_mainsite_edit;

// Page init
$t_tinbai_mainsite_edit->Page_Init();

// Page main
$t_tinbai_mainsite_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_edit = new ew_Page("t_tinbai_mainsite_edit");

// page properties
t_tinbai_mainsite_edit.PageID = "edit"; // page ID
t_tinbai_mainsite_edit.FormID = "ft_tinbai_mainsiteedit"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_tinbai_mainsite_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_TITLE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_SUMARY"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_SUMARY->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_CONTENTS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_CONTENTS->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_HIT_MAINSITE[]"];
                uelm = fobj.elements["u" + infix + "_C_HIT_MAINSITE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption()) ?>");
                
                 var cboxes = document.getElementsByName('x_C_HIT_MAINSITE[]');
                    var len = cboxes.length;
                    var x=0;
                    for (var i=0; i<len; i++) {
                        if (cboxes[i].checked == true)
                            {
                               x = x+1;
                            }
                        }
                        if ((x > 1) && (cboxes[1].checked == true))
                            {
                               return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo "Sai lựa chọn thiết lập lựa chọn tin nổi bật" ?>"); 
                            }
                        if (cboxes[1].checked == false)
                            {
                                elm = fobj.elements["x" + infix + "_C_PIC_HIT"];
                                aelm = fobj.elements["a" + infix + "_C_PIC_HIT"];
                                var chk_C_PIC_HIT = (aelm && aelm[0])?(aelm[2].checked):true;
                                if (elm && chk_C_PIC_HIT && !ew_HasValue(elm))
                                        return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_PIC_HIT->FldCaption()) ?>");
                               
                            }    
                             
		elm = fobj.elements["x" + infix + "_C_NEW_MYSEFLT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption()) ?>");
                radioValue = checkRadio(fobj.x_C_NEW_MYSEFLT);
                if (radioValue==1)
                    {   
                    elm = fobj.elements["x" + infix + "_C_PIC_MYSEFLT"];
                    aelm = fobj.elements["a" + infix + "_C_PIC_MYSEFLT"];
                    var chk_C_PIC_MYSEFLT = (aelm && aelm[0])?(aelm[2].checked):true;
                    if (elm && chk_C_PIC_MYSEFLT && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption()) ?>");
                    
                    }
		elm = fobj.elements["x" + infix + "_C_COMMENT_MAINSITE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER_MAINSITE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER_MAINSITE"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_mainsite->C_ORDER_MAINSITE->FldErrMsg()) ?>");
                
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}
$(document).ready(function() {

        $("input:radio[name=x_C_HIT_MAINSITE]").click(function() {
            var value = $(this).val();
            if (value ==1 || value ==2) 
            {
                $("#x_C_PIC_HIT").show();
 
            }
            else
            {
                $("#x_C_PIC_HIT").hide();
   
            }    
        });
        $("input:radio[name=x_C_NEW_MYSEFLT]").click(function() {
            var value = $(this).val();
            if (value ==1) 
            {
                $("#x_C_PIC_MYSEFLT").show();
 
            }
            else
            {
                $("#x_C_PIC_MYSEFLT").hide();
   
            }    
        });
});
// extend page with Form_CustomValidate function
t_tinbai_mainsite_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_edit.ValidateRequired = false; // no JavaScript validation
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
          $(".x_FK_ARRAY_CONGTY").select2();
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
<p class="pheader"><?php echo $t_tinbai_mainsite->TableCaption() ?></p>
<a href="<?php echo $t_tinbai_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_edit->ShowMessage();
?>
<form name="ft_tinbai_mainsiteedit" id="ft_tinbai_mainsiteedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_tinbai_mainsite_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_tinbai_mainsite">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_tinbai_mainsite->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if (Isadmin())
{  
        if (is_array($t_tinbai_mainsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_tinbai_mainsite->FK_CONGTY_ID->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
      if (is_array($t_tinbai_mainsite->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_tinbai_mainsite->FK_CONGTY_ID->EditValue;
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
        <?php           }
                }
        }
}    
?>
</select>
</span><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->Visible) { // FK_DMGIOITHIEU_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttributes() ?>><span id="el_FK_DMGIOITHIEU_ID">
<select style="width: 230px" id="x_FK_DMGIOITHIEU_ID" name="x_FK_DMGIOITHIEU_ID" title="<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DMTUYENSINH_ID->Visible) { // FK_DMTUYENSINH_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttributes() ?>><span id="el_FK_DMTUYENSINH_ID">
<select style="width: 230px" id="x_FK_DMTUYENSINH_ID" name="x_FK_DMTUYENSINH_ID" title="<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->Visible) { // FK_DTSVTUONGLAI_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo "Đối tượng trên Mainsite" ?></td>
		<td>
  <table class="tableobject"> <td><span> <?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldCaption() ?> </span> </td><td> <span> <?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldCaption() ?></span></td> <td><span> <?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldCaption() ?></span></td> <td><span> <?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldCaption() ?></span> </td></table>            
                               
  <span id="el_FK_DTSVTUONGLAI_ID">
<select multiple="multiple" size="25" style="width: 230px" id="x_FK_DTSVTUONGLAI_ID" name="x_FK_DTSVTUONGLAI_ID" title="<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CustomMsg ?>
                    
<span id="el_FK_DTSVDANGHOC_ID">
<select multiple="multiple" size="25" style="width: 230px" id="x_FK_DTSVDANGHOC_ID" name="x_FK_DTSVDANGHOC_ID" title="<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CustomMsg ?>  

 <span id="el_FK_DTCUUSV_ID">
<select multiple="multiple" size="25" style="width: 230px" id="x_FK_DTCUUSV_ID" name="x_FK_DTCUUSV_ID" title="<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->CustomMsg ?>   
     
<span id="el_FK_DTDOANHNGHIEP_ID">
    <select multiple="multiple" size="25" style="width: 230px" id="x_FK_DTDOANHNGHIEP_ID" name="x_FK_DTDOANHNGHIEP_ID" title="<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CustomMsg ?>
     
     
    </td>
	</tr>
<?php } ?>
        
<?php if ($t_tinbai_mainsite->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>><span id="el_FK_ARRAY_CONGTY">
<select tabindex="-1" class="x_FK_ARRAY_CONGTY" size="10" style="width:460px;" id="x_FK_ARRAY_CONGTY[]" name="x_FK_ARRAY_CONGTY[]" title="<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->FldTitle() ?>" multiple="multiple"<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->EditAttributes() ?>>
<?php
if (is_array($t_tinbai_mainsite->FK_ARRAY_CONGTY->EditValue)) {
	$arwrk = $t_tinbai_mainsite->FK_ARRAY_CONGTY->EditValue;
	$armultiwrk= explode(",", strval($t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue));
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
</span><?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
        
<?php if ($t_tinbai_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_mainsite->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<input type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_tinbai_mainsite->C_TITLE->FldTitle() ?>" size="97" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_TITLE->EditValue ?>"<?php echo $t_tinbai_mainsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_SUMARY->Visible) { // C_SUMARY ?>
	<tr<?php echo $t_tinbai_mainsite->C_SUMARY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_SUMARY->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_SUMARY->CellAttributes() ?>><span id="el_C_SUMARY">
                        <textarea style="font-size: 12px;" name="x_C_SUMARY" id="x_C_SUMARY" title="<?php echo $t_tinbai_mainsite->C_SUMARY->FldTitle() ?>" cols="111" rows="4"<?php echo $t_tinbai_mainsite->C_SUMARY->EditAttributes() ?>><?php echo $t_tinbai_mainsite->C_SUMARY->EditValue ?></textarea>
</span><?php echo $t_tinbai_mainsite->C_SUMARY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_CONTENTS->Visible) { // C_CONTENTS ?>
	<tr<?php echo $t_tinbai_mainsite->C_CONTENTS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_CONTENTS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_CONTENTS->CellAttributes() ?>><span id="el_C_CONTENTS">
<textarea name="x_C_CONTENTS" id="x_C_CONTENTS" title="<?php echo $t_tinbai_mainsite->C_CONTENTS->FldTitle() ?>" cols="35" rows="4"<?php echo $t_tinbai_mainsite->C_CONTENTS->EditAttributes() ?>><?php echo $t_tinbai_mainsite->C_CONTENTS->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_tinbai_mainsite->C_CONTENTS->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENTS', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENTS", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENTS', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span><?php echo $t_tinbai_mainsite->C_CONTENTS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->Visible) { // C_HIT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>><span id="el_C_HIT_MAINSITE">
<div id="tp_x_C_HIT_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_C_HIT_MAINSITE[]" id="x_C_HIT_MAINSITE[]" title="<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttributes() ?>></div>
<div id="dsl_x_C_HIT_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_HIT_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue));
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
<label><input type="checkbox" name="x_C_HIT_MAINSITE[]" id="x_C_HIT_MAINSITE[]" title="<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_HIT->Visible) { // C_PIC_HIT ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_HIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_HIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_HIT->CellAttributes() ?>><span id="el_C_PIC_HIT">
<input type="text" name="x_C_PIC_HIT" id="x_C_PIC_HIT" title="<?php echo $t_tinbai_mainsite->C_PIC_HIT->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_HIT->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_HIT->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_HIT->CustomMsg ?>
                  (Size ảnh của tin nổi bật hiển thị tốt nhất: 745px* 271px) -- <a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>      
                </td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_NEW_MYSEFLT->Visible) { // C_NEW_MYSEFLT ?>
	<tr<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttributes() ?>><span id="el_C_NEW_MYSEFLT">
<div id="tp_x_C_NEW_MYSEFLT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_NEW_MYSEFLT" id="x_C_NEW_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_NEW_MYSEFLT" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_NEW_MYSEFLT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_NEW_MYSEFLT" id="x_C_NEW_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_MYSEFLT->Visible) { // C_PIC_MYSEFLT ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttributes() ?>><span id="el_C_PIC_MYSEFLT">
<input type="text" name="x_C_PIC_MYSEFLT" id="x_C_PIC_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CustomMsg ?>
                   (Ảnh tin chúng tôi hiển thị tốt nhất size:330px* 211px)--<a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>
                </td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_COMMENT_MAINSITE->Visible) { // C_COMMENT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttributes() ?>><span id="el_C_COMMENT_MAINSITE">
<div id="tp_x_C_COMMENT_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_COMMENT_MAINSITE" id="x_C_COMMENT_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_COMMENT_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_COMMENT_MAINSITE" id="x_C_COMMENT_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_ORDER_MAINSITE->Visible) { // C_ORDER_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttributes() ?>><span id="el_C_ORDER_MAINSITE">
<input type="text" name="x_C_ORDER_MAINSITE" id="x_C_ORDER_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldTitle() ?>" value="<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->EditValue ?>"<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER_MAINSITE" name="cal_x_C_ORDER_MAINSITE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER_MAINSITE", // input field id
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER_MAINSITE" // button id
});
</script>
</span><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_tinbai_mainsite->C_PIC_MAIN->Visible) { // C_PIC_MAIN ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_MAIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_MAIN->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_MAIN->CellAttributes() ?>><span id="el_C_PIC_MAIN">
<input type="text" name="x_C_PIC_MAIN" id="x_C_PIC_MAIN" title="<?php echo $t_tinbai_mainsite->C_PIC_MAIN->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_MAIN->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_MAIN->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_MAIN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_SCIENCE->Visible) { // C_PIC_SCIENCE ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->CellAttributes() ?>><span id="el_C_PIC_SCIENCE">
<input type="text" name="x_C_PIC_SCIENCE" id="x_C_PIC_SCIENCE" title="<?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_SCIENCE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_ROM->Visible) { // C_PIC_ROM ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_ROM->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_ROM->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_ROM->CellAttributes() ?>><span id="el_C_PIC_ROM">
<input type="text" name="x_C_PIC_ROM" id="x_C_PIC_ROM" title="<?php echo $t_tinbai_mainsite->C_PIC_ROM->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_ROM->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_ROM->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_ROM->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_MASS->Visible) { // C_PIC_MASS ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_MASS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_MASS->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_MASS->CellAttributes() ?>><span id="el_C_PIC_MASS">
<input type="text" name="x_C_PIC_MASS" id="x_C_PIC_MASS" title="<?php echo $t_tinbai_mainsite->C_PIC_MASS->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_MASS->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_MASS->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_MASS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_PIC_LIB->Visible) { // C_PIC_LIB ?>
	<tr<?php echo $t_tinbai_mainsite->C_PIC_LIB->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_tinbai_mainsite->C_PIC_LIB->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_LIB->CellAttributes() ?>><span id="el_C_PIC_LIB">
<input type="text" name="x_C_PIC_LIB" id="x_C_PIC_LIB" title="<?php echo $t_tinbai_mainsite->C_PIC_LIB->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_LIB->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_LIB->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_LIB->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_TINBAI_ID" id="x_PK_TINBAI_ID" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue) ?>">
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
$t_tinbai_mainsite_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_tinbai_mainsite';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) $PageUrl .= "t=" . $t_tinbai_mainsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_tinbai_mainsite;
		if ($t_tinbai_mainsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_tinbai_mainsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_tinbai_mainsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_tinbai_mainsite_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite)
		$GLOBALS["t_tinbai_mainsite"] = new ct_tinbai_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_tinbai_mainsite', TRUE);

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
		global $t_tinbai_mainsite;

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
			$this->Page_Terminate("t_tinbai_mainsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_tinbai_mainsite;

		// Load key from QueryString
		if (@$_GET["PK_TINBAI_ID"] <> "")
			$t_tinbai_mainsite->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_tinbai_mainsite->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_tinbai_mainsite->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_tinbai_mainsite->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_tinbai_mainsite->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue == "")
			$this->Page_Terminate("t_tinbai_mainsitelist.php"); // Invalid key, return to list
		switch ($t_tinbai_mainsite->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_tinbai_mainsitelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_tinbai_mainsite->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_tinbai_mainsite->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_tinbai_mainsiteview.php")
						$sReturnUrl = $t_tinbai_mainsite->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_tinbai_mainsite->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_tinbai_mainsite->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_tinbai_mainsite;

		// Get upload data
			
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_tinbai_mainsite;
		$t_tinbai_mainsite->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setFormValue($objForm->GetValue("x_FK_DMGIOITHIEU_ID"));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setFormValue($objForm->GetValue("x_FK_DMTUYENSINH_ID"));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setFormValue($objForm->GetValue("x_FK_DTSVTUONGLAI_ID"));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setFormValue($objForm->GetValue("x_FK_DTSVDANGHOC_ID"));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setFormValue($objForm->GetValue("x_FK_DTCUUSV_ID"));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setFormValue($objForm->GetValue("x_FK_DTDOANHNGHIEP_ID"));
		$t_tinbai_mainsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_tinbai_mainsite->C_SUMARY->setFormValue($objForm->GetValue("x_C_SUMARY"));
		$t_tinbai_mainsite->C_CONTENTS->setFormValue($objForm->GetValue("x_C_CONTENTS"));
		$t_tinbai_mainsite->C_HIT_MAINSITE->setFormValue($objForm->GetValue("x_C_HIT_MAINSITE"));
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setFormValue($objForm->GetValue("x_C_NEW_MYSEFLT"));
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->setFormValue($objForm->GetValue("x_C_COMMENT_MAINSITE"));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->setFormValue($objForm->GetValue("x_C_ORDER_MAINSITE"));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11);
		$t_tinbai_mainsite->C_STATUS_MAINSITE->setFormValue($objForm->GetValue("x_C_STATUS_MAINSITE"));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setFormValue($objForm->GetValue("x_C_ACTIVE_MAINSITE"));
		$t_tinbai_mainsite->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_tinbai_mainsite->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_tinbai_mainsite->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_tinbai_mainsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->CurrentValue, 7);
		$t_tinbai_mainsite->PK_TINBAI_ID->setFormValue($objForm->GetValue("x_PK_TINBAI_ID"));
            	$t_tinbai_mainsite->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
                $t_tinbai_mainsite->C_PIC_HIT->setFormValue($objForm->GetValue("x_C_PIC_HIT"));
                $t_tinbai_mainsite->C_PIC_MYSEFLT->setFormValue($objForm->GetValue("x_C_PIC_MYSEFLT"));
		$t_tinbai_mainsite->C_PIC_MAIN->setFormValue($objForm->GetValue("x_C_PIC_MAIN"));
		$t_tinbai_mainsite->C_PIC_SCIENCE->setFormValue($objForm->GetValue("x_C_PIC_SCIENCE"));
		$t_tinbai_mainsite->C_PIC_ROM->setFormValue($objForm->GetValue("x_C_PIC_ROM"));
		$t_tinbai_mainsite->C_PIC_MASS->setFormValue($objForm->GetValue("x_C_PIC_MASS"));
		$t_tinbai_mainsite->C_PIC_LIB->setFormValue($objForm->GetValue("x_C_PIC_LIB"));
		
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue = $t_tinbai_mainsite->PK_TINBAI_ID->FormValue;
		$this->LoadRow();
		$t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue = $t_tinbai_mainsite->FK_CONGTY_ID->FormValue;
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FormValue;
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FormValue;
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FormValue;
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FormValue;
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue = $t_tinbai_mainsite->FK_DTCUUSV_ID->FormValue;
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FormValue;
		$t_tinbai_mainsite->C_TITLE->CurrentValue = $t_tinbai_mainsite->C_TITLE->FormValue;
		$t_tinbai_mainsite->C_SUMARY->CurrentValue = $t_tinbai_mainsite->C_SUMARY->FormValue;
		$t_tinbai_mainsite->C_CONTENTS->CurrentValue = $t_tinbai_mainsite->C_CONTENTS->FormValue;
		$t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_HIT_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue = $t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue;
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_COMMENT_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 7);
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_STATUS_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_NOTE->CurrentValue = $t_tinbai_mainsite->C_NOTE->FormValue;
		$t_tinbai_mainsite->C_USER_EDIT->CurrentValue = $t_tinbai_mainsite->C_USER_EDIT->FormValue;
		$t_tinbai_mainsite->C_EDIT_TIME->CurrentValue = $t_tinbai_mainsite->C_EDIT_TIME->FormValue;
		$t_tinbai_mainsite->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->CurrentValue, 7);
             	$t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue = $t_tinbai_mainsite->FK_ARRAY_CONGTY->FormValue;
                $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue = $t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue;
                $t_tinbai_mainsite->C_PIC_HIT->CurrentValue = $t_tinbai_mainsite->C_PIC_HIT->FormValue;
		$t_tinbai_mainsite->C_PIC_MAIN->CurrentValue = $t_tinbai_mainsite->C_PIC_MAIN->FormValue;
		$t_tinbai_mainsite->C_PIC_SCIENCE->CurrentValue = $t_tinbai_mainsite->C_PIC_SCIENCE->FormValue;
		$t_tinbai_mainsite->C_PIC_ROM->CurrentValue = $t_tinbai_mainsite->C_PIC_ROM->FormValue;
		$t_tinbai_mainsite->C_PIC_MASS->CurrentValue = $t_tinbai_mainsite->C_PIC_MASS->FormValue;
		$t_tinbai_mainsite->C_PIC_LIB->CurrentValue = $t_tinbai_mainsite->C_PIC_LIB->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_mainsite;
		$sFilter = $t_tinbai_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
		$t_tinbai_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_mainsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_mainsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_mainsite->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
		$t_tinbai_mainsite->C_PIC_HIT->setDbValue($rs->fields('C_PIC_HIT'));
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
		$t_tinbai_mainsite->C_PIC_MYSEFLT->setDbValue($rs->fields('C_PIC_MYSEFLT'));
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
		$t_tinbai_mainsite->C_STATUS_MAINSITE->setDbValue($rs->fields('C_STATUS_MAINSITE'));
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->setDbValue($rs->fields('C_VISITOR_MAINSITE'));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
		$t_tinbai_mainsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_tinbai_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_mainsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
                $t_tinbai_mainsite->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
		$t_tinbai_mainsite->C_PIC_MAIN->setDbValue($rs->fields('C_PIC_MAIN'));
		$t_tinbai_mainsite->C_PIC_SCIENCE->setDbValue($rs->fields('C_PIC_SCIENCE'));
		$t_tinbai_mainsite->C_PIC_ROM->setDbValue($rs->fields('C_PIC_ROM'));
		$t_tinbai_mainsite->C_PIC_MASS->setDbValue($rs->fields('C_PIC_MASS'));
		$t_tinbai_mainsite->C_PIC_LIB->setDbValue($rs->fields('C_PIC_LIB'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_tinbai_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->EditAttrs = array();

		// FK_DMGIOITHIEU_ID
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttrs = array();

		// FK_DMTUYENSINH_ID
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttrs = array();

		// FK_DTSVTUONGLAI_ID
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditAttrs = array();

		// FK_DTSVDANGHOC_ID
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditAttrs = array();

		// FK_DTCUUSV_ID
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTCUUSV_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTCUUSV_ID->EditAttrs = array();

		// FK_DTDOANHNGHIEP_ID
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditAttrs = array();

		// C_TITLE
		$t_tinbai_mainsite->C_TITLE->CellCssStyle = ""; $t_tinbai_mainsite->C_TITLE->CellCssClass = "";
		$t_tinbai_mainsite->C_TITLE->CellAttrs = array(); $t_tinbai_mainsite->C_TITLE->ViewAttrs = array(); $t_tinbai_mainsite->C_TITLE->EditAttrs = array();

		// C_SUMARY
		$t_tinbai_mainsite->C_SUMARY->CellCssStyle = ""; $t_tinbai_mainsite->C_SUMARY->CellCssClass = "";
		$t_tinbai_mainsite->C_SUMARY->CellAttrs = array(); $t_tinbai_mainsite->C_SUMARY->ViewAttrs = array(); $t_tinbai_mainsite->C_SUMARY->EditAttrs = array();

		// C_CONTENTS
		$t_tinbai_mainsite->C_CONTENTS->CellCssStyle = ""; $t_tinbai_mainsite->C_CONTENTS->CellCssClass = "";
		$t_tinbai_mainsite->C_CONTENTS->CellAttrs = array(); $t_tinbai_mainsite->C_CONTENTS->ViewAttrs = array(); $t_tinbai_mainsite->C_CONTENTS->EditAttrs = array();

		// C_HIT_MAINSITE
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_HIT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttrs = array();

		// C_PIC_HIT
		$t_tinbai_mainsite->C_PIC_HIT->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_HIT->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_HIT->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_HIT->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_HIT->EditAttrs = array();

		// C_NEW_MYSEFLT
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttrs = array();

		// C_PIC_MYSEFLT
		$t_tinbai_mainsite->C_PIC_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_MYSEFLT->EditAttrs = array();

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttrs = array();

		// C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttrs = array();

		// C_STATUS_MAINSITE
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->CellCssStyle = ""; $t_tinbai_mainsite->C_NOTE->CellCssClass = "";
		$t_tinbai_mainsite->C_NOTE->CellAttrs = array(); $t_tinbai_mainsite->C_NOTE->ViewAttrs = array(); $t_tinbai_mainsite->C_NOTE->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->EditAttrs = array();

                // FK_ARRAY_CONGTY
		$t_tinbai_mainsite->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_tinbai_mainsite->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_tinbai_mainsite->FK_ARRAY_CONGTY->CellAttrs = array(); $t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_tinbai_mainsite->FK_ARRAY_CONGTY->EditAttrs = array();
                
                // C_EDIT_TIME
		$t_tinbai_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->EditAttrs = array();
		
		// C_PIC_MAIN
		$t_tinbai_mainsite->C_PIC_MAIN->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_MAIN->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_MAIN->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_MAIN->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_MAIN->EditAttrs = array();

		// C_PIC_SCIENCE
		$t_tinbai_mainsite->C_PIC_SCIENCE->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_SCIENCE->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_SCIENCE->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_SCIENCE->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_SCIENCE->EditAttrs = array();

		// C_PIC_ROM
		$t_tinbai_mainsite->C_PIC_ROM->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_ROM->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_ROM->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_ROM->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_ROM->EditAttrs = array();

		// C_PIC_MASS
		$t_tinbai_mainsite->C_PIC_MASS->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_MASS->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_MASS->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_MASS->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_MASS->EditAttrs = array();

		// C_PIC_LIB
		$t_tinbai_mainsite->C_PIC_LIB->CellCssStyle = ""; $t_tinbai_mainsite->C_PIC_LIB->CellCssClass = "";
		$t_tinbai_mainsite->C_PIC_LIB->CellAttrs = array(); $t_tinbai_mainsite->C_PIC_LIB->ViewAttrs = array(); $t_tinbai_mainsite->C_PIC_LIB->EditAttrs = array();
                
                if ($t_tinbai_mainsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_TINBAI_ID
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewValue = $t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue;
			$t_tinbai_mainsite->PK_TINBAI_ID->CssStyle = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->CssClass = "";
			$t_tinbai_mainsite->PK_TINBAI_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = $t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_CONGTY_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->CssClass = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_DMGIOITHIEU_ID
			if (strval($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCGIOITHIEU` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmucgioithieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewCustomAttributes = "";

			// FK_DMTUYENSINH_ID
			if (strval($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DANHMUCTUYENSINH` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuctuyensinh`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewCustomAttributes = "";

			// FK_DTSVTUONGLAI_ID
			if (strval($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVTUONGLAI_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svtuonglai`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewCustomAttributes = "";

			// FK_DTSVDANGHOC_ID
			if (strval($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTSVDANGHOC_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svdanghoc`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewCustomAttributes = "";

			// FK_DTCUUSV_ID
			if (strval($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTCUUSV_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_cuusv`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = $t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->ViewCustomAttributes = "";

			// FK_DTDOANHNGHIEP_ID
			if (strval($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CssClass = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewCustomAttributes = "";
                        
                        // FK_ARRAY_CONGTY
			if (strval($t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue);
                                print_r($arwrk);
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
					$t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewValue = $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->CssStyle = "";
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->CssClass = "";
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->ViewValue = $t_tinbai_mainsite->C_TITLE->CurrentValue;
			$t_tinbai_mainsite->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite->C_TITLE->CssClass = "";
			$t_tinbai_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->ViewValue = $t_tinbai_mainsite->C_SUMARY->CurrentValue;
			$t_tinbai_mainsite->C_SUMARY->CssStyle = "";
			$t_tinbai_mainsite->C_SUMARY->CssClass = "";
			$t_tinbai_mainsite->C_SUMARY->ViewCustomAttributes = "";

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->ViewValue = $t_tinbai_mainsite->C_CONTENTS->CurrentValue;
			$t_tinbai_mainsite->C_CONTENTS->CssStyle = "";
			$t_tinbai_mainsite->C_CONTENTS->CssClass = "";
			$t_tinbai_mainsite->C_CONTENTS->ViewCustomAttributes = "";

			// C_HIT_MAINSITE
			if (strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) <> "") {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "";
				$arwrk = explode(",", strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue));
				for ($ari = 0; $ari < count($arwrk); $ari++) {
					switch (trim($arwrk[$ari])) {
						case "0":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Khong la tin noi bat";
							break;
						case "1":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin noi bat home";
							break;
						case "2":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin noi bat tuyen sinh";
							break;
						case "3":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "Tin noi bat sinh vien dang hoc";
							break;
						case "":
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= "";
							break;
						default:
							$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= trim($arwrk[$ari]);
					}
					if ($ari < count($arwrk)-1) $t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue .= ew_ViewOptionSeparator($ari);
				}
			} else {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->ViewCustomAttributes = "";

			// C_PIC_HIT
			$t_tinbai_mainsite->C_PIC_HIT->ViewValue = $t_tinbai_mainsite->C_PIC_HIT->CurrentValue;
			$t_tinbai_mainsite->C_PIC_HIT->CssStyle = "";
			$t_tinbai_mainsite->C_PIC_HIT->CssClass = "";
			$t_tinbai_mainsite->C_PIC_HIT->ViewCustomAttributes = "";


			// C_NEW_MYSEFLT
			if (strval($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "Khong la tin ";
						break;
					case "1":
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = "Tin ";
						break;
					default:
						$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = $t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssStyle = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->CssClass = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->ViewCustomAttributes = "";

			// C_PIC_MYSEFLT
			$t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue = $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue;
			$t_tinbai_mainsite->C_PIC_MYSEFLT->CssStyle = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->CssClass = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->ViewCustomAttributes = "";

			// C_COMMENT_MAINSITE
			if (strval($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Khong cho phep comment";
						break;
					case "1":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Cho phep coment";
						break;
					default:
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewCustomAttributes = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue, 11);
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewCustomAttributes = "";

			// C_STATUS_MAINSITE
			if (strval($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "KHONG DUYET";
						break;
					case "1":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "DA DUYET";
						break;
					case "":
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = "";
						break;
					default:
						$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = $t_tinbai_mainsite->C_STATUS_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->ViewCustomAttributes = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewValue = $t_tinbai_mainsite->C_VISITOR_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewCustomAttributes = "";

			// C_ACTIVE_MAINSITE
			if (strval($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "khong active len mainsite";
						break;
					case "1":
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = "Active lenmainsite";
						break;
					default:
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewValue, 7);
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewCustomAttributes = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
			if (strval($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $rswrk->fields('C_HOTEN');
					$rswrk->Close();
				} else {
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewCustomAttributes = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->ViewValue = $t_tinbai_mainsite->C_NOTE->CurrentValue;
			$t_tinbai_mainsite->C_NOTE->CssStyle = "";
			$t_tinbai_mainsite->C_NOTE->CssClass = "";
			$t_tinbai_mainsite->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->ViewValue = $t_tinbai_mainsite->C_USER_ADD->CurrentValue;
			$t_tinbai_mainsite->C_USER_ADD->CssStyle = "";
			$t_tinbai_mainsite->C_USER_ADD->CssClass = "";
			$t_tinbai_mainsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = $t_tinbai_mainsite->C_ADD_TIME->CurrentValue;
			$t_tinbai_mainsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ADD_TIME->ViewValue, 7);
			$t_tinbai_mainsite->C_ADD_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_ADD_TIME->CssClass = "";
			$t_tinbai_mainsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->ViewValue = $t_tinbai_mainsite->C_USER_EDIT->CurrentValue;
			$t_tinbai_mainsite->C_USER_EDIT->CssStyle = "";
			$t_tinbai_mainsite->C_USER_EDIT->CssClass = "";
			$t_tinbai_mainsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = $t_tinbai_mainsite->C_EDIT_TIME->CurrentValue;
			$t_tinbai_mainsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_EDIT_TIME->ViewValue, 7);
			$t_tinbai_mainsite->C_EDIT_TIME->CssStyle = "";
			$t_tinbai_mainsite->C_EDIT_TIME->CssClass = "";
			$t_tinbai_mainsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = $t_tinbai_mainsite->FK_EDITOR_ID->CurrentValue;
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewValue = ew_FormatNumber($t_tinbai_mainsite->FK_EDITOR_ID->ViewValue, 0, -2, -2, -2);
			$t_tinbai_mainsite->FK_EDITOR_ID->CssStyle = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->CssClass = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->TooltipValue = "";

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->TooltipValue = "";

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->TooltipValue = "";

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->TooltipValue = "";

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->TooltipValue = "";

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTCUUSV_ID->TooltipValue = "";

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->TooltipValue = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->HrefValue = "";
			$t_tinbai_mainsite->C_TITLE->TooltipValue = "";

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->HrefValue = "";
			$t_tinbai_mainsite->C_SUMARY->TooltipValue = "";

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->HrefValue = "";
			$t_tinbai_mainsite->C_CONTENTS->TooltipValue = "";

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->TooltipValue = "";

			// C_PIC_HIT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_HIT->CurrentValue)) {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = ((!empty($t_tinbai_mainsite->C_PIC_HIT->ViewValue)) ? $t_tinbai_mainsite->C_PIC_HIT->ViewValue : $t_tinbai_mainsite->C_PIC_HIT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_HIT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_HIT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = "";
			}
			$t_tinbai_mainsite->C_PIC_HIT->TooltipValue = "";

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->HrefValue = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->TooltipValue = "";

			// C_PIC_MYSEFLT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue)) {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ((!empty($t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue)) ? $t_tinbai_mainsite->C_PIC_MYSEFLT->ViewValue : $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = "";
			}
			$t_tinbai_mainsite->C_PIC_MYSEFLT->TooltipValue = "";

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->TooltipValue = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->TooltipValue = "";

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->TooltipValue = "";

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";
			$t_tinbai_mainsite->C_NOTE->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_tinbai_mainsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_tinbai_mainsite->FK_CONGTY_ID->EditValue = $arwrk;

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DANHMUCGIOITHIEU`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmucgioithieu`";
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
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditValue = $arwrk;

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_DANHMUCTUYENSINH`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_danhmuctuyensinh`";
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
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditValue = $arwrk;

			 // FK_DTSVTUONGLAI_ID
			$arwrk = GetTreeOrderCondition ("DTSVTUONGLAI_ID","C_NAME","C_TYPE","t_doituong_svtuonglai","C_BELONGTO","DTSVTUONGLAI_ID",0,2);
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->EditValue = $arwrk;

			// FK_DTSVDANGHOC_ID
			$arwrk = GetTreeOrderCondition ("DTSVDANGHOC_ID","C_NAME","C_TYPE","t_doituong_svdanghoc","C_BELONGTO","DTSVDANGHOC_ID",0,2);
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->EditValue = $arwrk;

			// FK_DTCUUSV_ID
			$arwrk = GetTreeOrderCondition ("DTCUUSV_ID","C_NAME","C_TYPE","t_doituong_cuusv","C_BELONGTO","DTCUUSV_ID",0,2);
			$t_tinbai_mainsite->FK_DTCUUSV_ID->EditValue = $arwrk;

			// FK_DTDOANHNGHIEP_ID
			$arwrk = GetTreeOrderCondition ("DTDOANHNGHIEP_ID","C_NAME","C_TYPE","t_doituong_doanhnghiep","C_BELONGTO","DTDOANHNGHIEP_ID",0,2);
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->EditValue = $arwrk;

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_TITLE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_TITLE->CurrentValue);

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_SUMARY->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_SUMARY->CurrentValue);

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_CONTENTS->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_CONTENTS->CurrentValue);

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là tin nổi bật");
			$arwrk[] = array("1", "Tin nổi bật trang chủ");
			$arwrk[] = array("2", "Tin nổi bật trang tuyển sinh");
			$arwrk[] = array("3", "Tin nổi bật sinh viên đang học");
			$t_tinbai_mainsite->C_HIT_MAINSITE->EditValue = $arwrk;

			// C_PIC_HIT
			$t_tinbai_mainsite->C_PIC_HIT->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_HIT->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_HIT->CurrentValue);

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là tin chúng tôi");
			$arwrk[] = array("1", "Tin chúng tôi");
			$t_tinbai_mainsite->C_NEW_MYSEFLT->EditValue = $arwrk;

			// C_PIC_MYSEFLT
			$t_tinbai_mainsite->C_PIC_MYSEFLT->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue);

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không cho phép");
			$arwrk[] = array("1", "Cho phép comment");
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditValue = $arwrk;

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11));

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không duyệt");
			$arwrk[] = array("1", "Đã duyệt");
                        $arwrk[] = array("2", "Chờ duyệt");
			$arwrk[] = array("", "");
			$t_tinbai_mainsite->C_STATUS_MAINSITE->EditValue = $arwrk;

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditValue = $arwrk;

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_NOTE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_NOTE->CurrentValue);

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// FK_CONGTY_ID
                        
                        // FK_ARRAY_CONGTY
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->EditCustomAttributes = "";
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
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->EditValue = $arwrk;
                        
			// C_PIC_MAIN
			$t_tinbai_mainsite->C_PIC_MAIN->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_MAIN->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_MAIN->CurrentValue);

			// C_PIC_SCIENCE
			$t_tinbai_mainsite->C_PIC_SCIENCE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_SCIENCE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_SCIENCE->CurrentValue);

			// C_PIC_ROM
			$t_tinbai_mainsite->C_PIC_ROM->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_ROM->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_ROM->CurrentValue);

			// C_PIC_MASS
			$t_tinbai_mainsite->C_PIC_MASS->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_MASS->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_MASS->CurrentValue);

			// C_PIC_LIB
			$t_tinbai_mainsite->C_PIC_LIB->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_LIB->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_LIB->CurrentValue);


			$t_tinbai_mainsite->FK_CONGTY_ID->HrefValue = "";

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->HrefValue = "";

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->HrefValue = "";

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->HrefValue = "";

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->HrefValue = "";

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->HrefValue = "";

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->HrefValue = "";

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->HrefValue = "";

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->HrefValue = "";

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->HrefValue = "";

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->HrefValue = "";

			// C_PIC_HIT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_HIT->CurrentValue)) {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = ((!empty($t_tinbai_mainsite->C_PIC_HIT->EditValue)) ? $t_tinbai_mainsite->C_PIC_HIT->EditValue : $t_tinbai_mainsite->C_PIC_HIT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_HIT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_HIT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_HIT->HrefValue = "";
			}

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->HrefValue = "";

			// C_PIC_MYSEFLT
			if (!ew_Empty($t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue)) {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ((!empty($t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue)) ? $t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue : $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue);
				if ($t_tinbai_mainsite->Export <> "") $t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = ew_ConvertFullUrl($t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue);
			} else {
				$t_tinbai_mainsite->C_PIC_MYSEFLT->HrefValue = "";
			}

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->HrefValue = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->HrefValue = "";

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->HrefValue = "";

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->HrefValue = "";
                        
                        // FK_ARRAY_CONGTY
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->HrefValue = "";
                        
			// C_PIC_MAIN
			$t_tinbai_mainsite->C_PIC_MAIN->HrefValue = "";

			// C_PIC_SCIENCE
			$t_tinbai_mainsite->C_PIC_SCIENCE->HrefValue = "";

			// C_PIC_ROM
			$t_tinbai_mainsite->C_PIC_ROM->HrefValue = "";

			// C_PIC_MASS
			$t_tinbai_mainsite->C_PIC_MASS->HrefValue = "";

			// C_PIC_LIB
			$t_tinbai_mainsite->C_PIC_LIB->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_tinbai_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_mainsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_tinbai_mainsite;

		// Initialize form error message
		$gsFormError = "";
                
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_tinbai_mainsite->C_TITLE->FormValue) && $t_tinbai_mainsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_TITLE->FldCaption();
		}
		if (!is_null($t_tinbai_mainsite->C_SUMARY->FormValue) && $t_tinbai_mainsite->C_SUMARY->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_SUMARY->FldCaption();
		}
		if (!is_null($t_tinbai_mainsite->C_CONTENTS->FormValue) && $t_tinbai_mainsite->C_CONTENTS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_CONTENTS->FldCaption();
		}
		if ($t_tinbai_mainsite->C_HIT_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption();
		}
                if ($t_tinbai_mainsite->C_HIT_MAINSITE->FormValue == "1") {
                        if (!is_null($t_tinbai_mainsite->C_PIC_HIT->FormValue) && $t_tinbai_mainsite->C_PIC_HIT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_PIC_HIT->FldCaption();
		      }
                }
		if ($t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption();
		}
                if ($t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue == "1") {
                       if (!is_null($t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue) && $t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption();
		      }
                }
		if ($t_tinbai_mainsite->C_COMMENT_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption();
		}
		if (!is_null($t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue) && $t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption();
		}
		if (!ew_CheckEuroDate($t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_tinbai_mainsite->C_ORDER_MAINSITE->FldErrMsg();
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
		global $conn, $Security, $Language, $t_tinbai_mainsite;
		$sFilter = $t_tinbai_mainsite->KeyFilter();
		$t_tinbai_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite->SQL();
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

			// FK_CONGTY_ID
			// $t_tinbai_mainsite->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

			// FK_DMGIOITHIEU_ID
			$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue, NULL, FALSE);

			// FK_DMTUYENSINH_ID
			$t_tinbai_mainsite->FK_DMTUYENSINH_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue, NULL, FALSE);

			// FK_DTSVTUONGLAI_ID
			$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue, NULL, FALSE);

			// FK_DTSVDANGHOC_ID
			$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue, NULL, FALSE);

			// FK_DTCUUSV_ID
			$t_tinbai_mainsite->FK_DTCUUSV_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue, NULL, FALSE);

			// FK_DTDOANHNGHIEP_ID
			$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue, NULL, FALSE);

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_TITLE->CurrentValue, "", FALSE);

			// C_SUMARY
			$t_tinbai_mainsite->C_SUMARY->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_SUMARY->CurrentValue, NULL, FALSE);

			// C_CONTENTS
			$t_tinbai_mainsite->C_CONTENTS->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_CONTENTS->CurrentValue, NULL, FALSE);

			// C_HIT_MAINSITE
			$t_tinbai_mainsite->C_HIT_MAINSITE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue, NULL, FALSE);

		        if($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue <> 0 )
                            {  
                                // C_PIC_HIT
                                $t_tinbai_mainsite->C_PIC_HIT->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_HIT->CurrentValue, NULL, FALSE);
                            }
                            else 
                            {
                                // C_PIC_HIT
                                $t_tinbai_mainsite->C_PIC_HIT->SetDbValueDef($rsnew, NULL, NULL, FALSE); 
                            }  

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue, NULL, FALSE);
                        
                       	// FK_ARRAY_CONGTY
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);

			 if ($t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue ==1)
                            {
                                // C_PIC_MYSEFLT
                                $t_tinbai_mainsite->C_PIC_MYSEFLT->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue, NULL, FALSE);
                            }
                            else 
                            {     
                                    // C_PIC_MYSEFLT
                                $t_tinbai_mainsite->C_PIC_MYSEFLT->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                            }    

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue, NULL, FALSE);

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11, FALSE), NULL);

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->SetDbValueDef($rsnew, 2, 2, FALSE);

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->SetDbValueDef($rsnew, 0, NULL, FALSE);
                        
                        // C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->SetDbValueDef($rsnew, NULL, NULL);
			$rsnew['C_TIME_ACTIVE_MAINSITE'] =& $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->DbValue;

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_NOTE->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_tinbai_mainsite->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_tinbai_mainsite->C_EDIT_TIME->DbValue;

			// C_PIC_MAIN
			$t_tinbai_mainsite->C_PIC_MAIN->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_MAIN->CurrentValue, NULL, FALSE);

			// C_PIC_SCIENCE
			$t_tinbai_mainsite->C_PIC_SCIENCE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_SCIENCE->CurrentValue, NULL, FALSE);

			// C_PIC_ROM
			$t_tinbai_mainsite->C_PIC_ROM->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_ROM->CurrentValue, NULL, FALSE);

			// C_PIC_MASS
			$t_tinbai_mainsite->C_PIC_MASS->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_MASS->CurrentValue, NULL, FALSE);

			// C_PIC_LIB
			$t_tinbai_mainsite->C_PIC_LIB->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_LIB->CurrentValue, NULL, FALSE);

                        
			// Call Row Updating event
			$bUpdateRow = $t_tinbai_mainsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_tinbai_mainsite->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_tinbai_mainsite->CancelMessage <> "") {
					$this->setMessage($t_tinbai_mainsite->CancelMessage);
					$t_tinbai_mainsite->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_tinbai_mainsite->Row_Updated($rsold, $rsnew);
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
