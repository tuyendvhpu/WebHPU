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
$t_lylich_edit = new ct_lylich_edit();
$Page =& $t_lylich_edit;

// Page init
$t_lylich_edit->Page_Init();

// Page main
$t_lylich_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_lylich_edit = new ew_Page("t_lylich_edit");

// page properties
t_lylich_edit.PageID = "edit"; // page ID
t_lylich_edit.FormID = "ft_lylichedit"; // form ID
var EW_PAGE_ID = t_lylich_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_lylich_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_PIC"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, ewLanguage.Phrase("WrongFileType"));
		elm = fobj.elements["x" + infix + "_C_FULLNAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_FULLNAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_POSITION"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_POSITION->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_WORK_ADDRESS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_WORK_ADDRESS->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_EMAIL->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_PHONE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_PHONE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_PHONE"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_lylich->C_PHONE->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_PERSONAL_PROFILE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_PERSONAL_PROFILE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_EDUCATIION"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_EDUCATIION->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_SKILLS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_SKILLS->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TEMPLATE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_TEMPLATE->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_STATUS"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_lylich->C_STATUS->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_lylich_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_lylich_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_lylich_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_lylich_edit.ValidateRequired = false; // no JavaScript validation
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
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p class="pheader"><span class="phpmaker"><?php echo $t_lylich->TableCaption() ?><br><br>
</span></p>
<a href="<?php echo $t_lylich->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_lylich_edit->ShowMessage();
?>
<form name="ft_lylichedit" id="ft_lylichedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_lylich_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_lylich">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_lylich->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_lylich->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->FK_CONGTY_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_lylich->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_lylich->FK_CONGTY_ID->EditAttributes() ?>>
                <?php

                // add code by quanghung xac dinh chuyn muc doi tương thuoc don vi nao
                if (IsAdmin())
                {
                    if (is_array($t_lylich->FK_CONGTY_ID->EditValue)) {
                        $arwrk = $t_lylich->FK_CONGTY_ID->EditValue;
                        $rowswrk = count($arwrk);
                        $emptywrk = TRUE;
                        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                $selwrk = (strval($t_lylich->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
                    if (is_array($t_lylich->FK_CONGTY_ID->EditValue)) {
                        $arwrk = $t_lylich->FK_CONGTY_ID->EditValue;
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
</span><?php echo $t_lylich->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_PIC->Visible) { // C_PIC ?>
	<tr<?php echo $t_lylich->C_PIC->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_PIC->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_PIC->CellAttributes() ?>><span id="el_C_PIC">
<div id="old_x_C_PIC">
<?php if ($t_lylich->C_PIC->HrefValue <> "" || $t_lylich->C_PIC->TooltipValue <> "") { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
    <img style="width: 130px;height: 150px" src="../upload/picprofile/<?php echo $t_lylich->C_PIC->EditValue ?>"> <br/>
<a href="<?php echo $t_lylich->C_PIC->HrefValue ?>"><?php echo $t_lylich->C_PIC->EditValue ?></a>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<?php echo $t_lylich->C_PIC->EditValue ?>
<?php } elseif (!in_array($t_lylich->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_C_PIC">
<?php if (!empty($t_lylich->C_PIC->Upload->DbValue)) { ?>
<label><input type="radio" name="a_C_PIC" id="a_C_PIC" value="1" checked="checked"><?php echo $Language->Phrase("Keep") ?></label>&nbsp;
<label><input type="radio" name="a_C_PIC" id="a_C_PIC" value="2"><?php echo $Language->Phrase("Remove") ?></label>&nbsp;
<label><input type="radio" name="a_C_PIC" id="a_C_PIC" value="3"><?php echo $Language->Phrase("Replace") ?><br></label>
<?php $t_lylich->C_PIC->EditAttrs["onchange"] = "this.form.a_C_PIC[2].checked=true;" . @$t_lylich->C_PIC->EditAttrs["onchange"]; ?>
<?php } else { ?>
<input type="hidden" name="a_C_PIC" id="a_C_PIC" value="3">
<?php } ?>
<input type="file" name="x_C_PIC" id="x_C_PIC" title="<?php echo $t_lylich->C_PIC->FldTitle() ?>" size="30"<?php echo $t_lylich->C_PIC->EditAttributes() ?>>
</div>
</span><?php echo $t_lylich->C_PIC->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_FULLNAME->Visible) { // C_FULLNAME ?>
	<tr<?php echo $t_lylich->C_FULLNAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_FULLNAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_FULLNAME->CellAttributes() ?>><span id="el_C_FULLNAME">
<input type="text" name="x_C_FULLNAME" id="x_C_FULLNAME" title="<?php echo $t_lylich->C_FULLNAME->FldTitle() ?>" size="80" maxlength="250" value="<?php echo $t_lylich->C_FULLNAME->EditValue ?>"<?php echo $t_lylich->C_FULLNAME->EditAttributes() ?>>
</span><?php echo $t_lylich->C_FULLNAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_POSITION->Visible) { // C_POSITION ?>
	<tr<?php echo $t_lylich->C_POSITION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_POSITION->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_POSITION->CellAttributes() ?>><span id="el_C_POSITION">
<input type="text" name="x_C_POSITION" id="x_C_POSITION" title="<?php echo $t_lylich->C_POSITION->FldTitle() ?>" size="80" maxlength="250" value="<?php echo $t_lylich->C_POSITION->EditValue ?>"<?php echo $t_lylich->C_POSITION->EditAttributes() ?>>
</span><?php echo $t_lylich->C_POSITION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_WORK_ADDRESS->Visible) { // C_WORK_ADDRESS ?>
	<tr<?php echo $t_lylich->C_WORK_ADDRESS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_WORK_ADDRESS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_WORK_ADDRESS->CellAttributes() ?>><span id="el_C_WORK_ADDRESS">
<input type="text" name="x_C_WORK_ADDRESS" id="x_C_WORK_ADDRESS" title="<?php echo $t_lylich->C_WORK_ADDRESS->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_lylich->C_WORK_ADDRESS->EditValue ?>"<?php echo $t_lylich->C_WORK_ADDRESS->EditAttributes() ?>>
</span><?php echo $t_lylich->C_WORK_ADDRESS->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_lylich->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $t_lylich->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_EMAIL->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $t_lylich->C_EMAIL->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_lylich->C_EMAIL->EditValue ?>"<?php echo $t_lylich->C_EMAIL->EditAttributes() ?>>
</span><?php echo $t_lylich->C_EMAIL->CustomMsg ?>
                    <span class="col2"><?php echo $t_lylich->C_PHONE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span> <input type="text" name="x_C_PHONE" id="x_C_PHONE" title="<?php echo $t_lylich->C_PHONE->FldTitle() ?>" size="30" value="<?php echo $t_lylich->C_PHONE->EditValue ?>"<?php echo $t_lylich->C_PHONE->EditAttributes() ?>>
                
                </td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_BIRTHDAY->Visible) { // C_BIRTHDAY ?>
	<tr<?php echo $t_lylich->C_BIRTHDAY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_BIRTHDAY->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_BIRTHDAY->CellAttributes() ?>><span id="el_C_BIRTHDAY">
<input type="text" name="x_C_BIRTHDAY" id="x_C_BIRTHDAY" title="<?php echo $t_lylich->C_BIRTHDAY->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_lylich->C_BIRTHDAY->EditValue ?>"<?php echo $t_lylich->C_BIRTHDAY->EditAttributes() ?>>
                    </span><?php echo $t_lylich->C_BIRTHDAY->CustomMsg ?> 
                    <span class="col2"><?php echo $t_lylich->C_BLOG->FldCaption()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></span>
<input type="text" name="x_C_BLOG" id="x_C_BLOG" title="<?php echo $t_lylich->C_BLOG->FldTitle() ?>" size="30" maxlength="200" value="<?php echo $t_lylich->C_BLOG->EditValue ?>"<?php echo $t_lylich->C_BLOG->EditAttributes() ?>>               
                </td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_PERSONAL_PROFILE->Visible) { // C_PERSONAL_PROFILE ?>
	<tr<?php echo $t_lylich->C_PERSONAL_PROFILE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_PERSONAL_PROFILE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_PERSONAL_PROFILE->CellAttributes() ?>><span id="el_C_PERSONAL_PROFILE">
<textarea name="x_C_PERSONAL_PROFILE" id="x_C_PERSONAL_PROFILE" title="<?php echo $t_lylich->C_PERSONAL_PROFILE->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_PERSONAL_PROFILE->EditAttributes() ?>><?php echo $t_lylich->C_PERSONAL_PROFILE->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_PERSONAL_PROFILE", function() {
	var oCKeditor = CKEDITOR.replace('x_C_PERSONAL_PROFILE', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_PERSONAL_PROFILE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_EDUCATIION->Visible) { // C_EDUCATIION ?>
	<tr<?php echo $t_lylich->C_EDUCATIION->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_EDUCATIION->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_EDUCATIION->CellAttributes() ?>><span id="el_C_EDUCATIION">
<textarea name="x_C_EDUCATIION" id="x_C_EDUCATIION" title="<?php echo $t_lylich->C_EDUCATIION->FldTitle() ?>" cols="50" rows="2"<?php echo $t_lylich->C_EDUCATIION->EditAttributes() ?>><?php echo $t_lylich->C_EDUCATIION->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_EDUCATIION", function() {
	var oCKeditor = CKEDITOR.replace('x_C_EDUCATIION', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_EDUCATIION->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_SKILLS->Visible) { // C_SKILLS ?>
	<tr<?php echo $t_lylich->C_SKILLS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_SKILLS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_SKILLS->CellAttributes() ?>><span id="el_C_SKILLS">
<textarea name="x_C_SKILLS" id="x_C_SKILLS" title="<?php echo $t_lylich->C_SKILLS->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_SKILLS->EditAttributes() ?>><?php echo $t_lylich->C_SKILLS->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_SKILLS", function() {
	var oCKeditor = CKEDITOR.replace('x_C_SKILLS', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_SKILLS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_WORK_EXPERIENCE->Visible) { // C_WORK_EXPERIENCE ?>
	<tr<?php echo $t_lylich->C_WORK_EXPERIENCE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_WORK_EXPERIENCE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_WORK_EXPERIENCE->CellAttributes() ?>><span id="el_C_WORK_EXPERIENCE">
<textarea name="x_C_WORK_EXPERIENCE" id="x_C_WORK_EXPERIENCE" title="<?php echo $t_lylich->C_WORK_EXPERIENCE->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_WORK_EXPERIENCE->EditAttributes() ?>><?php echo $t_lylich->C_WORK_EXPERIENCE->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_WORK_EXPERIENCE", function() {
	var oCKeditor = CKEDITOR.replace('x_C_WORK_EXPERIENCE', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_WORK_EXPERIENCE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_SCIENTIFIC_RESEARCH->Visible) { // C_SCIENTIFIC_RESEARCH ?>
	<tr<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->CellAttributes() ?>><span id="el_C_SCIENTIFIC_RESEARCH">
<textarea name="x_C_SCIENTIFIC_RESEARCH" id="x_C_SCIENTIFIC_RESEARCH" title="<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->EditAttributes() ?>><?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_SCIENTIFIC_RESEARCH", function() {
	var oCKeditor = CKEDITOR.replace('x_C_SCIENTIFIC_RESEARCH', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_SCIENTIFIC_RESEARCH->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_REFERENCES->Visible) { // C_REFERENCES ?>
	<tr<?php echo $t_lylich->C_REFERENCES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_REFERENCES->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_REFERENCES->CellAttributes() ?>><span id="el_C_REFERENCES">
<textarea name="x_C_REFERENCES" id="x_C_REFERENCES" title="<?php echo $t_lylich->C_REFERENCES->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_REFERENCES->EditAttributes() ?>><?php echo $t_lylich->C_REFERENCES->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_REFERENCES", function() {
	var oCKeditor = CKEDITOR.replace('x_C_REFERENCES', { width: 50*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_REFERENCES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_HOBBIES->Visible) { // C_HOBBIES ?>
	<tr<?php echo $t_lylich->C_HOBBIES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_HOBBIES->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_HOBBIES->CellAttributes() ?>><span id="el_C_HOBBIES">
<textarea name="x_C_HOBBIES" id="x_C_HOBBIES" title="<?php echo $t_lylich->C_HOBBIES->FldTitle() ?>" cols="50" rows="2"<?php echo $t_lylich->C_HOBBIES->EditAttributes() ?>><?php echo $t_lylich->C_HOBBIES->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_HOBBIES", function() {
	var oCKeditor = CKEDITOR.replace('x_C_HOBBIES', { width: 50*_width_multiplier, height: 2*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $t_lylich->C_HOBBIES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_TEMPLATE->Visible) { // C_TEMPLATE ?>
	<tr<?php echo $t_lylich->C_TEMPLATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_TEMPLATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_TEMPLATE->CellAttributes() ?>><span id="el_C_TEMPLATE">
<select id="x_C_TEMPLATE" name="x_C_TEMPLATE" title="<?php echo $t_lylich->C_TEMPLATE->FldTitle() ?>"<?php echo $t_lylich->C_TEMPLATE->EditAttributes() ?>>
<?php
if (is_array($t_lylich->C_TEMPLATE->EditValue)) {
	$arwrk = $t_lylich->C_TEMPLATE->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_TEMPLATE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_lylich->C_TEMPLATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_STATUS->Visible) { // C_STATUS ?>
	<tr<?php echo $t_lylich->C_STATUS->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_STATUS->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_lylich->C_STATUS->CellAttributes() ?>><span id="el_C_STATUS">
<div id="tp_x_C_STATUS" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_STATUS" id="x_C_STATUS" title="<?php echo $t_lylich->C_STATUS->FldTitle() ?>" value="{value}"<?php echo $t_lylich->C_STATUS->EditAttributes() ?>></label></div>
<div id="dsl_x_C_STATUS" repeatcolumn="5">
<?php
$arwrk = $t_lylich->C_STATUS->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_lylich->C_STATUS->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_STATUS" id="x_C_STATUS" title="<?php echo $t_lylich->C_STATUS->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_lylich->C_STATUS->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_lylich->C_STATUS->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_lylich->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_lylich->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_lylich->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_lylich->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
<textarea name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_lylich->C_NOTE->FldTitle() ?>" cols="50" rows="4"<?php echo $t_lylich->C_NOTE->EditAttributes() ?>><?php echo $t_lylich->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_lylich->C_NOTE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_PROFILE_ID" id="x_PK_PROFILE_ID" value="<?php echo ew_HtmlEncode($t_lylich->PK_PROFILE_ID->CurrentValue) ?>">
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
$t_lylich_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_lylich_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_lylich';

	// Page object name
	var $PageObjName = 't_lylich_edit';

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
	function ct_lylich_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_lylich)
		$GLOBALS["t_lylich"] = new ct_lylich();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

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
	var $sDbMasterFilter;
	var $sDbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_lylich;

		// Load key from QueryString
		if (@$_GET["PK_PROFILE_ID"] <> "")
			$t_lylich->PK_PROFILE_ID->setQueryStringValue($_GET["PK_PROFILE_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_lylich->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_lylich->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_lylich->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_lylich->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_lylich->PK_PROFILE_ID->CurrentValue == "")
			$this->Page_Terminate("t_lylichlist.php"); // Invalid key, return to list
		switch ($t_lylich->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_lylichlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_lylich->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_lylich->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_lylichview.php")
						$sReturnUrl = $t_lylich->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_lylich->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_lylich->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_lylich;

		// Get upload data
			if ($t_lylich->C_PIC->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_lylich->C_PIC->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_lylich;
		$t_lylich->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_lylich->C_FULLNAME->setFormValue($objForm->GetValue("x_C_FULLNAME"));
		$t_lylich->C_POSITION->setFormValue($objForm->GetValue("x_C_POSITION"));
		$t_lylich->C_WORK_ADDRESS->setFormValue($objForm->GetValue("x_C_WORK_ADDRESS"));
		$t_lylich->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$t_lylich->C_PHONE->setFormValue($objForm->GetValue("x_C_PHONE"));
		$t_lylich->C_BIRTHDAY->setFormValue($objForm->GetValue("x_C_BIRTHDAY"));
		$t_lylich->C_BLOG->setFormValue($objForm->GetValue("x_C_BLOG"));
		$t_lylich->C_PERSONAL_PROFILE->setFormValue($objForm->GetValue("x_C_PERSONAL_PROFILE"));
		$t_lylich->C_EDUCATIION->setFormValue($objForm->GetValue("x_C_EDUCATIION"));
		$t_lylich->C_SKILLS->setFormValue($objForm->GetValue("x_C_SKILLS"));
		$t_lylich->C_WORK_EXPERIENCE->setFormValue($objForm->GetValue("x_C_WORK_EXPERIENCE"));
		$t_lylich->C_SCIENTIFIC_RESEARCH->setFormValue($objForm->GetValue("x_C_SCIENTIFIC_RESEARCH"));
		$t_lylich->C_REFERENCES->setFormValue($objForm->GetValue("x_C_REFERENCES"));
		$t_lylich->C_HOBBIES->setFormValue($objForm->GetValue("x_C_HOBBIES"));
		$t_lylich->C_TEMPLATE->setFormValue($objForm->GetValue("x_C_TEMPLATE"));
		$t_lylich->C_STATUS->setFormValue($objForm->GetValue("x_C_STATUS"));
		$t_lylich->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_lylich->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_lylich->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_lylich->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_lylich->C_EDIT_TIME->CurrentValue, 7);
		$t_lylich->PK_PROFILE_ID->setFormValue($objForm->GetValue("x_PK_PROFILE_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_lylich;
		$t_lylich->PK_PROFILE_ID->CurrentValue = $t_lylich->PK_PROFILE_ID->FormValue;
		$this->LoadRow();
		$t_lylich->FK_CONGTY_ID->CurrentValue = $t_lylich->FK_CONGTY_ID->FormValue;
		$t_lylich->C_FULLNAME->CurrentValue = $t_lylich->C_FULLNAME->FormValue;
		$t_lylich->C_POSITION->CurrentValue = $t_lylich->C_POSITION->FormValue;
		$t_lylich->C_WORK_ADDRESS->CurrentValue = $t_lylich->C_WORK_ADDRESS->FormValue;
		$t_lylich->C_EMAIL->CurrentValue = $t_lylich->C_EMAIL->FormValue;
		$t_lylich->C_PHONE->CurrentValue = $t_lylich->C_PHONE->FormValue;
		$t_lylich->C_BIRTHDAY->CurrentValue = $t_lylich->C_BIRTHDAY->FormValue;
		$t_lylich->C_BLOG->CurrentValue = $t_lylich->C_BLOG->FormValue;
		$t_lylich->C_PERSONAL_PROFILE->CurrentValue = $t_lylich->C_PERSONAL_PROFILE->FormValue;
		$t_lylich->C_EDUCATIION->CurrentValue = $t_lylich->C_EDUCATIION->FormValue;
		$t_lylich->C_SKILLS->CurrentValue = $t_lylich->C_SKILLS->FormValue;
		$t_lylich->C_WORK_EXPERIENCE->CurrentValue = $t_lylich->C_WORK_EXPERIENCE->FormValue;
		$t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue = $t_lylich->C_SCIENTIFIC_RESEARCH->FormValue;
		$t_lylich->C_REFERENCES->CurrentValue = $t_lylich->C_REFERENCES->FormValue;
		$t_lylich->C_HOBBIES->CurrentValue = $t_lylich->C_HOBBIES->FormValue;
		$t_lylich->C_TEMPLATE->CurrentValue = $t_lylich->C_TEMPLATE->FormValue;
		$t_lylich->C_STATUS->CurrentValue = $t_lylich->C_STATUS->FormValue;
		$t_lylich->C_NOTE->CurrentValue = $t_lylich->C_NOTE->FormValue;
		$t_lylich->C_USER_EDIT->CurrentValue = $t_lylich->C_USER_EDIT->FormValue;
		$t_lylich->C_EDIT_TIME->CurrentValue = $t_lylich->C_EDIT_TIME->FormValue;
		$t_lylich->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_lylich->C_EDIT_TIME->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_lylich;
		$sFilter = $t_lylich->KeyFilter();

		// Call Row Selecting event
		$t_lylich->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_lylich->CurrentFilter = $sFilter;
		$sSql = $t_lylich->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_lylich->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_lylich;
		$t_lylich->PK_PROFILE_ID->setDbValue($rs->fields('PK_PROFILE_ID'));
		$t_lylich->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_lylich->C_PIC->Upload->DbValue = $rs->fields('C_PIC');
		$t_lylich->C_FULLNAME->setDbValue($rs->fields('C_FULLNAME'));
		$t_lylich->C_POSITION->setDbValue($rs->fields('C_POSITION'));
		$t_lylich->C_WORK_ADDRESS->setDbValue($rs->fields('C_WORK_ADDRESS'));
		$t_lylich->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_lylich->C_PHONE->setDbValue($rs->fields('C_PHONE'));
		$t_lylich->C_BIRTHDAY->setDbValue($rs->fields('C_BIRTHDAY'));
		$t_lylich->C_BLOG->setDbValue($rs->fields('C_BLOG'));
		$t_lylich->C_PERSONAL_PROFILE->setDbValue($rs->fields('C_PERSONAL_PROFILE'));
		$t_lylich->C_EDUCATIION->setDbValue($rs->fields('C_EDUCATIION'));
		$t_lylich->C_SKILLS->setDbValue($rs->fields('C_SKILLS'));
		$t_lylich->C_WORK_EXPERIENCE->setDbValue($rs->fields('C_WORK_EXPERIENCE'));
		$t_lylich->C_SCIENTIFIC_RESEARCH->setDbValue($rs->fields('C_SCIENTIFIC_RESEARCH'));
		$t_lylich->C_REFERENCES->setDbValue($rs->fields('C_REFERENCES'));
		$t_lylich->C_HOBBIES->setDbValue($rs->fields('C_HOBBIES'));
		$t_lylich->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
		$t_lylich->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$t_lylich->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_lylich->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_lylich->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_lylich->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_lylich->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_lylich->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
		$t_lylich->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_lylich->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$t_lylich->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_lylich->C_TIME_ACTIVEM->setDbValue($rs->fields('C_TIME_ACTIVEM'));
		$t_lylich->C_ORDER_MAIN->setDbValue($rs->fields('C_ORDER_MAIN'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_lylich;

		// Initialize URLs
		// Call Row_Rendering event

		$t_lylich->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_lylich->FK_CONGTY_ID->CellCssStyle = ""; $t_lylich->FK_CONGTY_ID->CellCssClass = "";
		$t_lylich->FK_CONGTY_ID->CellAttrs = array(); $t_lylich->FK_CONGTY_ID->ViewAttrs = array(); $t_lylich->FK_CONGTY_ID->EditAttrs = array();

		// C_PIC
		$t_lylich->C_PIC->CellCssStyle = ""; $t_lylich->C_PIC->CellCssClass = "";
		$t_lylich->C_PIC->CellAttrs = array(); $t_lylich->C_PIC->ViewAttrs = array(); $t_lylich->C_PIC->EditAttrs = array();

		// C_FULLNAME
		$t_lylich->C_FULLNAME->CellCssStyle = ""; $t_lylich->C_FULLNAME->CellCssClass = "";
		$t_lylich->C_FULLNAME->CellAttrs = array(); $t_lylich->C_FULLNAME->ViewAttrs = array(); $t_lylich->C_FULLNAME->EditAttrs = array();

		// C_POSITION
		$t_lylich->C_POSITION->CellCssStyle = ""; $t_lylich->C_POSITION->CellCssClass = "";
		$t_lylich->C_POSITION->CellAttrs = array(); $t_lylich->C_POSITION->ViewAttrs = array(); $t_lylich->C_POSITION->EditAttrs = array();

		// C_WORK_ADDRESS
		$t_lylich->C_WORK_ADDRESS->CellCssStyle = ""; $t_lylich->C_WORK_ADDRESS->CellCssClass = "";
		$t_lylich->C_WORK_ADDRESS->CellAttrs = array(); $t_lylich->C_WORK_ADDRESS->ViewAttrs = array(); $t_lylich->C_WORK_ADDRESS->EditAttrs = array();

		// C_EMAIL
		$t_lylich->C_EMAIL->CellCssStyle = ""; $t_lylich->C_EMAIL->CellCssClass = "";
		$t_lylich->C_EMAIL->CellAttrs = array(); $t_lylich->C_EMAIL->ViewAttrs = array(); $t_lylich->C_EMAIL->EditAttrs = array();

		// C_PHONE
		$t_lylich->C_PHONE->CellCssStyle = ""; $t_lylich->C_PHONE->CellCssClass = "";
		$t_lylich->C_PHONE->CellAttrs = array(); $t_lylich->C_PHONE->ViewAttrs = array(); $t_lylich->C_PHONE->EditAttrs = array();

		// C_BIRTHDAY
		$t_lylich->C_BIRTHDAY->CellCssStyle = ""; $t_lylich->C_BIRTHDAY->CellCssClass = "";
		$t_lylich->C_BIRTHDAY->CellAttrs = array(); $t_lylich->C_BIRTHDAY->ViewAttrs = array(); $t_lylich->C_BIRTHDAY->EditAttrs = array();

		// C_BLOG
		$t_lylich->C_BLOG->CellCssStyle = ""; $t_lylich->C_BLOG->CellCssClass = "";
		$t_lylich->C_BLOG->CellAttrs = array(); $t_lylich->C_BLOG->ViewAttrs = array(); $t_lylich->C_BLOG->EditAttrs = array();

		// C_PERSONAL_PROFILE
		$t_lylich->C_PERSONAL_PROFILE->CellCssStyle = ""; $t_lylich->C_PERSONAL_PROFILE->CellCssClass = "";
		$t_lylich->C_PERSONAL_PROFILE->CellAttrs = array(); $t_lylich->C_PERSONAL_PROFILE->ViewAttrs = array(); $t_lylich->C_PERSONAL_PROFILE->EditAttrs = array();

		// C_EDUCATIION
		$t_lylich->C_EDUCATIION->CellCssStyle = ""; $t_lylich->C_EDUCATIION->CellCssClass = "";
		$t_lylich->C_EDUCATIION->CellAttrs = array(); $t_lylich->C_EDUCATIION->ViewAttrs = array(); $t_lylich->C_EDUCATIION->EditAttrs = array();

		// C_SKILLS
		$t_lylich->C_SKILLS->CellCssStyle = ""; $t_lylich->C_SKILLS->CellCssClass = "";
		$t_lylich->C_SKILLS->CellAttrs = array(); $t_lylich->C_SKILLS->ViewAttrs = array(); $t_lylich->C_SKILLS->EditAttrs = array();

		// C_WORK_EXPERIENCE
		$t_lylich->C_WORK_EXPERIENCE->CellCssStyle = ""; $t_lylich->C_WORK_EXPERIENCE->CellCssClass = "";
		$t_lylich->C_WORK_EXPERIENCE->CellAttrs = array(); $t_lylich->C_WORK_EXPERIENCE->ViewAttrs = array(); $t_lylich->C_WORK_EXPERIENCE->EditAttrs = array();

		// C_SCIENTIFIC_RESEARCH
		$t_lylich->C_SCIENTIFIC_RESEARCH->CellCssStyle = ""; $t_lylich->C_SCIENTIFIC_RESEARCH->CellCssClass = "";
		$t_lylich->C_SCIENTIFIC_RESEARCH->CellAttrs = array(); $t_lylich->C_SCIENTIFIC_RESEARCH->ViewAttrs = array(); $t_lylich->C_SCIENTIFIC_RESEARCH->EditAttrs = array();

		// C_REFERENCES
		$t_lylich->C_REFERENCES->CellCssStyle = ""; $t_lylich->C_REFERENCES->CellCssClass = "";
		$t_lylich->C_REFERENCES->CellAttrs = array(); $t_lylich->C_REFERENCES->ViewAttrs = array(); $t_lylich->C_REFERENCES->EditAttrs = array();

		// C_HOBBIES
		$t_lylich->C_HOBBIES->CellCssStyle = ""; $t_lylich->C_HOBBIES->CellCssClass = "";
		$t_lylich->C_HOBBIES->CellAttrs = array(); $t_lylich->C_HOBBIES->ViewAttrs = array(); $t_lylich->C_HOBBIES->EditAttrs = array();

		// C_TEMPLATE
		$t_lylich->C_TEMPLATE->CellCssStyle = ""; $t_lylich->C_TEMPLATE->CellCssClass = "";
		$t_lylich->C_TEMPLATE->CellAttrs = array(); $t_lylich->C_TEMPLATE->ViewAttrs = array(); $t_lylich->C_TEMPLATE->EditAttrs = array();

		// C_STATUS
		$t_lylich->C_STATUS->CellCssStyle = ""; $t_lylich->C_STATUS->CellCssClass = "";
		$t_lylich->C_STATUS->CellAttrs = array(); $t_lylich->C_STATUS->ViewAttrs = array(); $t_lylich->C_STATUS->EditAttrs = array();

		// C_NOTE
		$t_lylich->C_NOTE->CellCssStyle = ""; $t_lylich->C_NOTE->CellCssClass = "";
		$t_lylich->C_NOTE->CellAttrs = array(); $t_lylich->C_NOTE->ViewAttrs = array(); $t_lylich->C_NOTE->EditAttrs = array();

		// C_USER_EDIT
		$t_lylich->C_USER_EDIT->CellCssStyle = ""; $t_lylich->C_USER_EDIT->CellCssClass = "";
		$t_lylich->C_USER_EDIT->CellAttrs = array(); $t_lylich->C_USER_EDIT->ViewAttrs = array(); $t_lylich->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_lylich->C_EDIT_TIME->CellCssStyle = ""; $t_lylich->C_EDIT_TIME->CellCssClass = "";
		$t_lylich->C_EDIT_TIME->CellAttrs = array(); $t_lylich->C_EDIT_TIME->ViewAttrs = array(); $t_lylich->C_EDIT_TIME->EditAttrs = array();
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

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->HrefValue = "";
			$t_lylich->FK_CONGTY_ID->TooltipValue = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $t_lylich->C_PIC->UploadPath) . ((!empty($t_lylich->C_PIC->ViewValue)) ? $t_lylich->C_PIC->ViewValue : $t_lylich->C_PIC->CurrentValue);
				if ($t_lylich->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($t_lylich->C_PIC->HrefValue);
			} else {
				$t_lylich->C_PIC->HrefValue = "";
			}
			$t_lylich->C_PIC->TooltipValue = "";

			// C_FULLNAME
			$t_lylich->C_FULLNAME->HrefValue = "";
			$t_lylich->C_FULLNAME->TooltipValue = "";

			// C_POSITION
			$t_lylich->C_POSITION->HrefValue = "";
			$t_lylich->C_POSITION->TooltipValue = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->HrefValue = "";
			$t_lylich->C_WORK_ADDRESS->TooltipValue = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->HrefValue = "";
			$t_lylich->C_EMAIL->TooltipValue = "";

			// C_PHONE
			$t_lylich->C_PHONE->HrefValue = "";
			$t_lylich->C_PHONE->TooltipValue = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->HrefValue = "";
			$t_lylich->C_BIRTHDAY->TooltipValue = "";

			// C_BLOG
			$t_lylich->C_BLOG->HrefValue = "";
			$t_lylich->C_BLOG->TooltipValue = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->HrefValue = "";
			$t_lylich->C_PERSONAL_PROFILE->TooltipValue = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->HrefValue = "";
			$t_lylich->C_EDUCATIION->TooltipValue = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->HrefValue = "";
			$t_lylich->C_SKILLS->TooltipValue = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->HrefValue = "";
			$t_lylich->C_WORK_EXPERIENCE->TooltipValue = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->HrefValue = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->TooltipValue = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->HrefValue = "";
			$t_lylich->C_REFERENCES->TooltipValue = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->HrefValue = "";
			$t_lylich->C_HOBBIES->TooltipValue = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";
			$t_lylich->C_TEMPLATE->TooltipValue = "";

			// C_STATUS
			$t_lylich->C_STATUS->HrefValue = "";
			$t_lylich->C_STATUS->TooltipValue = "";

			// C_NOTE
			$t_lylich->C_NOTE->HrefValue = "";
			$t_lylich->C_NOTE->TooltipValue = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->HrefValue = "";
			$t_lylich->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->HrefValue = "";
			$t_lylich->C_EDIT_TIME->TooltipValue = "";
		} elseif ($t_lylich->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_lylich->FK_CONGTY_ID->EditValue = $arwrk;

			// C_PIC
			$t_lylich->C_PIC->EditCustomAttributes = "";
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->EditValue = $t_lylich->C_PIC->Upload->DbValue;
			} else {
				$t_lylich->C_PIC->EditValue = "";
			}

			// C_FULLNAME
			$t_lylich->C_FULLNAME->EditCustomAttributes = "";
			$t_lylich->C_FULLNAME->EditValue = ew_HtmlEncode($t_lylich->C_FULLNAME->CurrentValue);

			// C_POSITION
			$t_lylich->C_POSITION->EditCustomAttributes = "";
			$t_lylich->C_POSITION->EditValue = ew_HtmlEncode($t_lylich->C_POSITION->CurrentValue);

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->EditCustomAttributes = "";
			$t_lylich->C_WORK_ADDRESS->EditValue = ew_HtmlEncode($t_lylich->C_WORK_ADDRESS->CurrentValue);

			// C_EMAIL
			$t_lylich->C_EMAIL->EditCustomAttributes = "";
			$t_lylich->C_EMAIL->EditValue = ew_HtmlEncode($t_lylich->C_EMAIL->CurrentValue);

			// C_PHONE
			$t_lylich->C_PHONE->EditCustomAttributes = "";
			$t_lylich->C_PHONE->EditValue = ew_HtmlEncode($t_lylich->C_PHONE->CurrentValue);

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->EditCustomAttributes = "";
			$t_lylich->C_BIRTHDAY->EditValue = ew_HtmlEncode($t_lylich->C_BIRTHDAY->CurrentValue);

			// C_BLOG
			$t_lylich->C_BLOG->EditCustomAttributes = "";
			$t_lylich->C_BLOG->EditValue = ew_HtmlEncode($t_lylich->C_BLOG->CurrentValue);

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->EditCustomAttributes = "";
			$t_lylich->C_PERSONAL_PROFILE->EditValue = ew_HtmlEncode($t_lylich->C_PERSONAL_PROFILE->CurrentValue);

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->EditCustomAttributes = "";
			$t_lylich->C_EDUCATIION->EditValue = ew_HtmlEncode($t_lylich->C_EDUCATIION->CurrentValue);

			// C_SKILLS
			$t_lylich->C_SKILLS->EditCustomAttributes = "";
			$t_lylich->C_SKILLS->EditValue = ew_HtmlEncode($t_lylich->C_SKILLS->CurrentValue);

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->EditCustomAttributes = "";
			$t_lylich->C_WORK_EXPERIENCE->EditValue = ew_HtmlEncode($t_lylich->C_WORK_EXPERIENCE->CurrentValue);

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->EditCustomAttributes = "";
			$t_lylich->C_SCIENTIFIC_RESEARCH->EditValue = ew_HtmlEncode($t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue);

			// C_REFERENCES
			$t_lylich->C_REFERENCES->EditCustomAttributes = "";
			$t_lylich->C_REFERENCES->EditValue = ew_HtmlEncode($t_lylich->C_REFERENCES->CurrentValue);

			// C_HOBBIES
			$t_lylich->C_HOBBIES->EditCustomAttributes = "";
			$t_lylich->C_HOBBIES->EditValue = ew_HtmlEncode($t_lylich->C_HOBBIES->CurrentValue);

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Template 1");
			$arwrk[] = array("2", "Template 2");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_lylich->C_TEMPLATE->EditValue = $arwrk;

			// C_STATUS
			$t_lylich->C_STATUS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong kich hoat");
			$arwrk[] = array("1", "Kich hoat");
			$t_lylich->C_STATUS->EditValue = $arwrk;

			// C_NOTE
			$t_lylich->C_NOTE->EditCustomAttributes = "";
			$t_lylich->C_NOTE->EditValue = ew_HtmlEncode($t_lylich->C_NOTE->CurrentValue);

			// C_USER_EDIT
			// C_EDIT_TIME
			// Edit refer script
			// FK_CONGTY_ID

			$t_lylich->FK_CONGTY_ID->HrefValue = "";

			// C_PIC
			if (!ew_Empty($t_lylich->C_PIC->Upload->DbValue)) {
				$t_lylich->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $t_lylich->C_PIC->UploadPath) . ((!empty($t_lylich->C_PIC->EditValue)) ? $t_lylich->C_PIC->EditValue : $t_lylich->C_PIC->CurrentValue);
				if ($t_lylich->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($t_lylich->C_PIC->HrefValue);
			} else {
				$t_lylich->C_PIC->HrefValue = "";
			}

			// C_FULLNAME
			$t_lylich->C_FULLNAME->HrefValue = "";

			// C_POSITION
			$t_lylich->C_POSITION->HrefValue = "";

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->HrefValue = "";

			// C_EMAIL
			$t_lylich->C_EMAIL->HrefValue = "";

			// C_PHONE
			$t_lylich->C_PHONE->HrefValue = "";

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->HrefValue = "";

			// C_BLOG
			$t_lylich->C_BLOG->HrefValue = "";

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->HrefValue = "";

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->HrefValue = "";

			// C_SKILLS
			$t_lylich->C_SKILLS->HrefValue = "";

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->HrefValue = "";

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->HrefValue = "";

			// C_REFERENCES
			$t_lylich->C_REFERENCES->HrefValue = "";

			// C_HOBBIES
			$t_lylich->C_HOBBIES->HrefValue = "";

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->HrefValue = "";

			// C_STATUS
			$t_lylich->C_STATUS->HrefValue = "";

			// C_NOTE
			$t_lylich->C_NOTE->HrefValue = "";

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->HrefValue = "";
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
		if (!ew_CheckFileType($t_lylich->C_PIC->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("WrongFileType");
		}
		if ($t_lylich->C_PIC->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $t_lylich->C_PIC->Upload->FileSize > EW_MAX_FILE_SIZE) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
		}
		if (in_array($t_lylich->C_PIC->Upload->Error, array(1, 2, 3, 6, 7, 8))) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("PhpUploadErr" . $t_lylich->C_PIC->Upload->Error);
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
		if (!is_null($t_lylich->C_FULLNAME->FormValue) && $t_lylich->C_FULLNAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_FULLNAME->FldCaption();
		}
		if (!is_null($t_lylich->C_POSITION->FormValue) && $t_lylich->C_POSITION->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_POSITION->FldCaption();
		}
		if (!is_null($t_lylich->C_WORK_ADDRESS->FormValue) && $t_lylich->C_WORK_ADDRESS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_WORK_ADDRESS->FldCaption();
		}
		if (!is_null($t_lylich->C_EMAIL->FormValue) && $t_lylich->C_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_EMAIL->FldCaption();
		}
		if (!is_null($t_lylich->C_PHONE->FormValue) && $t_lylich->C_PHONE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_PHONE->FldCaption();
		}
		if (!ew_CheckInteger($t_lylich->C_PHONE->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_lylich->C_PHONE->FldErrMsg();
		}
		if (!is_null($t_lylich->C_PERSONAL_PROFILE->FormValue) && $t_lylich->C_PERSONAL_PROFILE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_PERSONAL_PROFILE->FldCaption();
		}
		if (!is_null($t_lylich->C_EDUCATIION->FormValue) && $t_lylich->C_EDUCATIION->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_EDUCATIION->FldCaption();
		}
		if (!is_null($t_lylich->C_SKILLS->FormValue) && $t_lylich->C_SKILLS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_SKILLS->FldCaption();
		}
		if (!is_null($t_lylich->C_TEMPLATE->FormValue) && $t_lylich->C_TEMPLATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_TEMPLATE->FldCaption();
		}
		if ($t_lylich->C_STATUS->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_lylich->C_STATUS->FldCaption();
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

			// FK_CONGTY_ID
			$t_lylich->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_lylich->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

			// C_PIC
			$t_lylich->C_PIC->Upload->SaveToSession(); // Save file value to Session
						if ($t_lylich->C_PIC->Upload->Action == "2" || $t_lylich->C_PIC->Upload->Action == "3") { // Update/Remove
			$t_lylich->C_PIC->Upload->DbValue = $rs->fields('C_PIC'); // Get original value
			if (is_null($t_lylich->C_PIC->Upload->Value)) {
				$rsnew['C_PIC'] = NULL;
			} else {
				$rsnew['C_PIC'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, $t_lylich->C_PIC->UploadPath), $t_lylich->C_PIC->Upload->FileName);
			}
			}

			// C_FULLNAME
			$t_lylich->C_FULLNAME->SetDbValueDef($rsnew, $t_lylich->C_FULLNAME->CurrentValue, NULL, FALSE);

			// C_POSITION
			$t_lylich->C_POSITION->SetDbValueDef($rsnew, $t_lylich->C_POSITION->CurrentValue, NULL, FALSE);

			// C_WORK_ADDRESS
			$t_lylich->C_WORK_ADDRESS->SetDbValueDef($rsnew, $t_lylich->C_WORK_ADDRESS->CurrentValue, NULL, FALSE);

			// C_EMAIL
			$t_lylich->C_EMAIL->SetDbValueDef($rsnew, $t_lylich->C_EMAIL->CurrentValue, NULL, FALSE);

			// C_PHONE
			$t_lylich->C_PHONE->SetDbValueDef($rsnew, $t_lylich->C_PHONE->CurrentValue, NULL, FALSE);

			// C_BIRTHDAY
			$t_lylich->C_BIRTHDAY->SetDbValueDef($rsnew, $t_lylich->C_BIRTHDAY->CurrentValue, NULL, FALSE);

			// C_BLOG
			$t_lylich->C_BLOG->SetDbValueDef($rsnew, $t_lylich->C_BLOG->CurrentValue, NULL, FALSE);

			// C_PERSONAL_PROFILE
			$t_lylich->C_PERSONAL_PROFILE->SetDbValueDef($rsnew, $t_lylich->C_PERSONAL_PROFILE->CurrentValue, NULL, FALSE);

			// C_EDUCATIION
			$t_lylich->C_EDUCATIION->SetDbValueDef($rsnew, $t_lylich->C_EDUCATIION->CurrentValue, NULL, FALSE);

			// C_SKILLS
			$t_lylich->C_SKILLS->SetDbValueDef($rsnew, $t_lylich->C_SKILLS->CurrentValue, NULL, FALSE);

			// C_WORK_EXPERIENCE
			$t_lylich->C_WORK_EXPERIENCE->SetDbValueDef($rsnew, $t_lylich->C_WORK_EXPERIENCE->CurrentValue, NULL, FALSE);

			// C_SCIENTIFIC_RESEARCH
			$t_lylich->C_SCIENTIFIC_RESEARCH->SetDbValueDef($rsnew, $t_lylich->C_SCIENTIFIC_RESEARCH->CurrentValue, NULL, FALSE);

			// C_REFERENCES
			$t_lylich->C_REFERENCES->SetDbValueDef($rsnew, $t_lylich->C_REFERENCES->CurrentValue, NULL, FALSE);

			// C_HOBBIES
			$t_lylich->C_HOBBIES->SetDbValueDef($rsnew, $t_lylich->C_HOBBIES->CurrentValue, NULL, FALSE);

			// C_TEMPLATE
			$t_lylich->C_TEMPLATE->SetDbValueDef($rsnew, $t_lylich->C_TEMPLATE->CurrentValue, NULL, FALSE);

			// C_STATUS
			$t_lylich->C_STATUS->SetDbValueDef($rsnew, $t_lylich->C_STATUS->CurrentValue, NULL, FALSE);

			// C_NOTE
			$t_lylich->C_NOTE->SetDbValueDef($rsnew, $t_lylich->C_NOTE->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_lylich->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_lylich->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_lylich->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_lylich->C_EDIT_TIME->DbValue;

			// Call Row Updating event
			$bUpdateRow = $t_lylich->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
			if (!ew_Empty($t_lylich->C_PIC->Upload->Value)) {
				$t_lylich->C_PIC->Upload->SaveToFile($t_lylich->C_PIC->UploadPath, $rsnew['C_PIC'], FALSE);
			}
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

		// C_PIC
		$t_lylich->C_PIC->Upload->RemoveFromSession(); // Remove file value from Session
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
