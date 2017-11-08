<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_congtyinfo.php" ?>
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
$t_congty_add = new ct_congty_add();
$Page =& $t_congty_add;

// Page init
$t_congty_add->Page_Init();

// Page main
$t_congty_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_congty_add = new ew_Page("t_congty_add");

// page properties
t_congty_add.PageID = "add"; // page ID
t_congty_add.FormID = "ft_congtyadd"; // form ID
var EW_PAGE_ID = t_congty_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_congty_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_FK_NGANH_ID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_congty->FK_NGANH_ID->FldCaption()) ?>");
                elm = fobj.elements["x" + infix + "C_TENVIETTAT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_congty->C_TENVIETTAT->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_LOGO"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, ewLanguage.Phrase("WrongFileType"));
		
		elm = fobj.elements["x" + infix + "_C_TYPE_TEMPLATE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_congty->C_TYPE_TEMPLATE->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_congty_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_congty_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_congty_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_congty_add.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><span class="phpmaker"><?php echo $t_congty->TableCaption() ?></span></p>
<a href="<?php echo $t_congty->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_congty_add->ShowMessage();
?>
<form name="ft_congtyadd" id="ft_congtyadd" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_congty_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_congty">
<input type="hidden" name="a_add" id="a_add" value="A">
<?php if ($t_congty->CurrentAction == "F") { // Confirm page ?>
<input type="hidden" name="a_confirm" id="a_confirm" value="F">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_congty->FK_NGANH_ID->Visible) { // FK_NGANH_ID ?>
	<tr<?php echo $t_congty->FK_NGANH_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->FK_NGANH_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_congty->FK_NGANH_ID->CellAttributes() ?>><span id="el_FK_NGANH_ID">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<select id="x_FK_NGANH_ID" name="x_FK_NGANH_ID" title="<?php echo $t_congty->FK_NGANH_ID->FldTitle() ?>"<?php echo $t_congty->FK_NGANH_ID->EditAttributes() ?>>
<?php
if (is_array($t_congty->FK_NGANH_ID->EditValue)) {
	$arwrk = $t_congty->FK_NGANH_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_congty->FK_NGANH_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } else { ?>
<div<?php echo $t_congty->FK_NGANH_ID->ViewAttributes() ?>><?php echo $t_congty->FK_NGANH_ID->ViewValue ?></div>
<input type="hidden" name="x_FK_NGANH_ID" id="x_FK_NGANH_ID" value="<?php echo ew_HtmlEncode($t_congty->FK_NGANH_ID->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->FK_NGANH_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_TENCONGTY->Visible) { // C_TENCONGTY ?>
	<tr<?php echo $t_congty->C_TENCONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TENCONGTY->FldCaption() ?></td>
		<td<?php echo $t_congty->C_TENCONGTY->CellAttributes() ?>><span id="el_C_TENCONGTY">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENCONGTY" id="x_C_TENCONGTY" title="<?php echo $t_congty->C_TENCONGTY->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_congty->C_TENCONGTY->EditValue ?>"<?php echo $t_congty->C_TENCONGTY->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_TENCONGTY->ViewAttributes() ?>><?php echo $t_congty->C_TENCONGTY->ViewValue ?></div>
<input type="hidden" name="x_C_TENCONGTY" id="x_C_TENCONGTY" value="<?php echo ew_HtmlEncode($t_congty->C_TENCONGTY->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_TENCONGTY->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_TENVIETTAT->Visible) { // C_TENVIETTAT ?>
	<tr<?php echo $t_congty->C_TENVIETTAT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TENVIETTAT->FldCaption() ?></td>
		<td<?php echo $t_congty->C_TENVIETTAT->CellAttributes() ?>><span id="el_C_TENVIETTAT">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_TENVIETTAT" id="x_C_TENVIETTAT" title="<?php echo $t_congty->C_TENVIETTAT->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_congty->C_TENVIETTAT->EditValue ?>"<?php echo $t_congty->C_TENVIETTAT->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_TENVIETTAT->ViewAttributes() ?>><?php echo $t_congty->C_TENVIETTAT->ViewValue ?></div>
<input type="hidden" name="x_C_TENVIETTAT" id="x_C_TENVIETTAT" value="<?php echo ew_HtmlEncode($t_congty->C_TENVIETTAT->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_TENVIETTAT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_LOGO->Visible) { // C_LOGO ?>
	<tr<?php echo $t_congty->C_LOGO->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_LOGO->FldCaption() ?></td>
		<td<?php echo $t_congty->C_LOGO->CellAttributes() ?>><span id="el_C_LOGO">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="file" name="x_C_LOGO" id="x_C_LOGO" title="<?php echo $t_congty->C_LOGO->FldTitle() ?>" size="30"<?php echo $t_congty->C_LOGO->EditAttributes() ?>>
</div>
<?php } else { ?>
<input type="hidden" name="a_C_LOGO" id="a_C_LOGO" value="<?php echo $t_congty->C_LOGO->Upload->Action ?>">
<?php
if ($t_congty->C_LOGO->Upload->Action == "1") {
	echo "[" . $Language->Phrase("Keep") . "]";
} elseif ($t_congty->C_LOGO->Upload->Action == "2") {
	echo "[" . $Language->Phrase("Remove") . "]";
} else {
	if (!ew_Empty($t_congty->C_LOGO->Upload->Value)) {
?>
<a href="ewbv7.php?tbl=<?php echo $t_congty->TableVar ?>&fld=x_C_LOGO&rnd=<?php echo ew_Random() ?>" target="_blank"><img src="ewbv7.php?tbl=<?php echo $t_congty->TableVar ?>&fld=x_C_LOGO&rnd=<?php echo ew_Random() ?>" border="0"></a>
<?php
	}
}
?>
<?php } ?>
</span><?php echo $t_congty->C_LOGO->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_WEBSITE->Visible) { // C_WEBSITE ?>
	<tr<?php echo $t_congty->C_WEBSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_WEBSITE->FldCaption() ?></td>
		<td<?php echo $t_congty->C_WEBSITE->CellAttributes() ?>><span id="el_C_WEBSITE">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_WEBSITE" id="x_C_WEBSITE" title="<?php echo $t_congty->C_WEBSITE->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_congty->C_WEBSITE->EditValue ?>"<?php echo $t_congty->C_WEBSITE->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_WEBSITE->ViewAttributes() ?>><?php echo $t_congty->C_WEBSITE->ViewValue ?></div>
<input type="hidden" name="x_C_WEBSITE" id="x_C_WEBSITE" value="<?php echo ew_HtmlEncode($t_congty->C_WEBSITE->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_WEBSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_DIACHI->Visible) { // C_DIACHI ?>
	<tr<?php echo $t_congty->C_DIACHI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_DIACHI->FldCaption() ?></td>
		<td<?php echo $t_congty->C_DIACHI->CellAttributes() ?>><span id="el_C_DIACHI">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_DIACHI" id="x_C_DIACHI" title="<?php echo $t_congty->C_DIACHI->FldTitle() ?>" size="80" maxlength="255" value="<?php echo $t_congty->C_DIACHI->EditValue ?>"<?php echo $t_congty->C_DIACHI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_DIACHI->ViewAttributes() ?>><?php echo $t_congty->C_DIACHI->ViewValue ?></div>
<input type="hidden" name="x_C_DIACHI" id="x_C_DIACHI" value="<?php echo ew_HtmlEncode($t_congty->C_DIACHI->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_DIACHI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_DIENTHOAI->Visible) { // C_DIENTHOAI ?>
	<tr<?php echo $t_congty->C_DIENTHOAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_DIENTHOAI->FldCaption() ?></td>
		<td<?php echo $t_congty->C_DIENTHOAI->CellAttributes() ?>><span id="el_C_DIENTHOAI">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_DIENTHOAI" id="x_C_DIENTHOAI" title="<?php echo $t_congty->C_DIENTHOAI->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $t_congty->C_DIENTHOAI->EditValue ?>"<?php echo $t_congty->C_DIENTHOAI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_DIENTHOAI->ViewAttributes() ?>><?php echo $t_congty->C_DIENTHOAI->ViewValue ?></div>
<input type="hidden" name="x_C_DIENTHOAI" id="x_C_DIENTHOAI" value="<?php echo ew_HtmlEncode($t_congty->C_DIENTHOAI->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_DIENTHOAI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_FAX->Visible) { // C_FAX ?>
	<tr<?php echo $t_congty->C_FAX->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_FAX->FldCaption() ?></td>
		<td<?php echo $t_congty->C_FAX->CellAttributes() ?>><span id="el_C_FAX">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_FAX" id="x_C_FAX" title="<?php echo $t_congty->C_FAX->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $t_congty->C_FAX->EditValue ?>"<?php echo $t_congty->C_FAX->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_FAX->ViewAttributes() ?>><?php echo $t_congty->C_FAX->ViewValue ?></div>
<input type="hidden" name="x_C_FAX" id="x_C_FAX" value="<?php echo ew_HtmlEncode($t_congty->C_FAX->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_FAX->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_EMAIL->Visible) { // C_EMAIL ?>
	<tr<?php echo $t_congty->C_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_EMAIL->FldCaption() ?></td>
		<td<?php echo $t_congty->C_EMAIL->CellAttributes() ?>><span id="el_C_EMAIL">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<input type="text" name="x_C_EMAIL" id="x_C_EMAIL" title="<?php echo $t_congty->C_EMAIL->FldTitle() ?>" size="30" maxlength="250" value="<?php echo $t_congty->C_EMAIL->EditValue ?>"<?php echo $t_congty->C_EMAIL->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $t_congty->C_EMAIL->ViewAttributes() ?>><?php echo $t_congty->C_EMAIL->ViewValue ?></div>
<input type="hidden" name="x_C_EMAIL" id="x_C_EMAIL" value="<?php echo ew_HtmlEncode($t_congty->C_EMAIL->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_congty->C_MOTA->Visible) { // C_MOTA ?>
	<tr<?php echo $t_congty->C_MOTA->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_MOTA->FldCaption() ?></td>
		<td<?php echo $t_congty->C_MOTA->CellAttributes() ?>><span id="el_C_MOTA">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<textarea name="x_C_MOTA" id="x_C_MOTA" title="<?php echo $t_congty->C_MOTA->FldTitle() ?>" cols="35" rows="4"<?php echo $t_congty->C_MOTA->EditAttributes() ?>><?php echo $t_congty->C_MOTA->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_congty->C_MOTA->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_MOTA', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_MOTA", function() {
	var oCKeditor = CKEDITOR.replace('x_C_MOTA', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
<?php } else { ?>
<div<?php echo $t_congty->C_MOTA->ViewAttributes() ?>><?php echo $t_congty->C_MOTA->ViewValue ?></div>
<input type="hidden" name="x_C_MOTA" id="x_C_MOTA" value="<?php echo ew_HtmlEncode($t_congty->C_MOTA->FormValue) ?>">
<?php } ?>
</span><?php echo $t_congty->C_MOTA->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_congty->C_TYPE_TEMPLATE->Visible) { // C_TYPE_TEMPLATE ?>
	<tr<?php echo $t_congty->C_TYPE_TEMPLATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_congty->C_TYPE_TEMPLATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_congty->C_TYPE_TEMPLATE->CellAttributes() ?>><span id="el_C_TYPE_TEMPLATE">
<?php if ($t_congty->CurrentAction <> "F") { ?>
<select id="x_C_TYPE_TEMPLATE" name="x_C_TYPE_TEMPLATE" title="<?php echo $t_congty->C_TYPE_TEMPLATE->FldTitle() ?>"<?php echo $t_congty->C_TYPE_TEMPLATE->EditAttributes() ?>>
<?php
if (is_array($t_congty->C_TYPE_TEMPLATE->EditValue)) {
	$arwrk = $t_congty->C_TYPE_TEMPLATE->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_congty->C_TYPE_TEMPLATE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php } else { ?>
<div<?php echo $t_congty->C_TYPE_TEMPLATE->ViewAttributes() ?>><?php echo $t_congty->C_TYPE_TEMPLATE->ViewValue ?></div>
<input type="hidden" name="x_C_TYPE_TEMPLATE" id="x_C_TYPE_TEMPLATE" value="<?php echo ew_HtmlEncode($t_congty->C_TYPE_TEMPLATE->FormValue) ?>">
<?php } ?>

</span><?php echo $t_congty->C_TYPE_TEMPLATE->CustomMsg ?>
 &nbsp;&nbsp;<b><font face="Verdana" size="1" color="#FF0000">(Chú ý: Kiểu giao diện áp dụng cho trang chủ của người dùng)</font></b>
 <div>
<br><br>
<a href="../design/khoacntt.html" target="_blank"><img src="images/template1.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoaddt.html" target="_blank"><img src="images/template2.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoaxaydung.html" target="_blank"><img src="images/template3.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoaqtkd.html" target="_blank"><img src="images/template4.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoakhcb.html" target="_blank"><img src="images/template5.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoamt.html" target="_blank"><img src="images/template6.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoavhdl.html" target="_blank"><img src="images/template7.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoann.html" target="_blank"><img src="images/template8.jpg" border=0 width=100 height =70></a>
&nbsp;
<a href="../design/khoagdgtc.html" target="_blank"><img src="images/template9.jpg" border=0 width=100 height =70></a>
<br>
&nbsp;&nbsp;&nbsp;
Giao diện 1
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 2
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 3
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 4
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 5
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 6
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 7
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 8
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Giao diện 9
</div>
        <?php echo $user->kieu_giaodien->CustomMsg ?></td>
	      
                

                </td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($t_congty->CurrentAction <> "F") { // Confirm page ?>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>" onclick="this.form.a_add.value='F';">
<?php } else { ?>
<input type="submit" name="btnCancel" id="btnCancel" value="<?php echo ew_BtnCaption($Language->Phrase("CancelBtn")) ?>" onclick="this.form.a_add.value='X';">
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("ConfirmBtn")) ?>">
<?php } ?>
</form>
<?php if ($t_congty->CurrentAction <> "F") { ?>
<?php } ?>
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
$t_congty_add->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_congty_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 't_congty';

	// Page object name
	var $PageObjName = 't_congty_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_congty;
		if ($t_congty->UseTokenInUrl) $PageUrl .= "t=" . $t_congty->TableVar . "&"; // Add page token
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
		global $objForm, $t_congty;
		if ($t_congty->UseTokenInUrl) {
			if ($objForm)
				return ($t_congty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_congty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_congty_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_congty)
		$GLOBALS["t_congty"] = new ct_congty();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_congty', TRUE);

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
		global $t_congty;

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
			$this->Page_Terminate("t_congtylist.php");
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
		global $objForm, $Language, $gsFormError, $t_congty;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["PK_MACONGTY"] != "") {
		  $t_congty->PK_MACONGTY->setQueryStringValue($_GET["PK_MACONGTY"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_congty->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->GetUploadFiles(); // Get upload files
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_congty->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_congty->CurrentAction = "C"; // Copy record
		  } else {
		    $t_congty->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_congty->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("t_congtylist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_congty->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $t_congty->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_congtyview.php")
						$sReturnUrl = $t_congty->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		if ($t_congty->CurrentAction == "F") { // Confirm page
		  $t_congty->RowType = EW_ROWTYPE_VIEW; // Render view type
		} else {
		  $t_congty->RowType = EW_ROWTYPE_ADD; // Render add type
		}

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_congty;

		// Get upload data
		$t_congty->C_LOGO->Upload->RestoreDbFromSession();
		if ($t_congty->CurrentAction == "F") {
			if ($t_congty->C_LOGO->Upload->UploadFile()) {

				// No action required
			} else {
				echo $t_congty->C_LOGO->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
			$t_congty->C_LOGO->Upload->SaveToSession();
		} else {
			$t_congty->C_LOGO->Upload->RestoreFromSession();
		}
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_congty;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_congty;
		$t_congty->FK_NGANH_ID->setFormValue($objForm->GetValue("x_FK_NGANH_ID"));
		$t_congty->C_TENCONGTY->setFormValue($objForm->GetValue("x_C_TENCONGTY"));
		$t_congty->C_TENVIETTAT->setFormValue($objForm->GetValue("x_C_TENVIETTAT"));
		$t_congty->C_WEBSITE->setFormValue($objForm->GetValue("x_C_WEBSITE"));
		$t_congty->C_DIACHI->setFormValue($objForm->GetValue("x_C_DIACHI"));
		$t_congty->C_DIENTHOAI->setFormValue($objForm->GetValue("x_C_DIENTHOAI"));
		$t_congty->C_FAX->setFormValue($objForm->GetValue("x_C_FAX"));
		$t_congty->C_EMAIL->setFormValue($objForm->GetValue("x_C_EMAIL"));
		$t_congty->C_MOTA->setFormValue($objForm->GetValue("x_C_MOTA"));
		$t_congty->C_REPORT_STATUS->setFormValue($objForm->GetValue("x_C_REPORT_STATUS"));
		$t_congty->C_TYPE_TEMPLATE->setFormValue($objForm->GetValue("x_C_TYPE_TEMPLATE"));
		$t_congty->PK_MACONGTY->setFormValue($objForm->GetValue("x_PK_MACONGTY"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_congty;
		$t_congty->PK_MACONGTY->CurrentValue = $t_congty->PK_MACONGTY->FormValue;
		$t_congty->FK_NGANH_ID->CurrentValue = $t_congty->FK_NGANH_ID->FormValue;
		$t_congty->C_TENCONGTY->CurrentValue = $t_congty->C_TENCONGTY->FormValue;
		$t_congty->C_TENVIETTAT->CurrentValue = $t_congty->C_TENVIETTAT->FormValue;
		$t_congty->C_WEBSITE->CurrentValue = $t_congty->C_WEBSITE->FormValue;
		$t_congty->C_DIACHI->CurrentValue = $t_congty->C_DIACHI->FormValue;
		$t_congty->C_DIENTHOAI->CurrentValue = $t_congty->C_DIENTHOAI->FormValue;
		$t_congty->C_FAX->CurrentValue = $t_congty->C_FAX->FormValue;
		$t_congty->C_EMAIL->CurrentValue = $t_congty->C_EMAIL->FormValue;
		$t_congty->C_MOTA->CurrentValue = $t_congty->C_MOTA->FormValue;
		$t_congty->C_REPORT_STATUS->CurrentValue = $t_congty->C_REPORT_STATUS->FormValue;
		$t_congty->C_TYPE_TEMPLATE->CurrentValue = $t_congty->C_TYPE_TEMPLATE->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_congty;
		$sFilter = $t_congty->KeyFilter();

		// Call Row Selecting event
		$t_congty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_congty->CurrentFilter = $sFilter;
		$sSql = $t_congty->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_congty->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_congty;
		$t_congty->PK_MACONGTY->setDbValue($rs->fields('PK_MACONGTY'));
		$t_congty->FK_NGANH_ID->setDbValue($rs->fields('FK_NGANH_ID'));
		$t_congty->C_TENCONGTY->setDbValue($rs->fields('C_TENCONGTY'));
		$t_congty->C_TENVIETTAT->setDbValue($rs->fields('C_TENVIETTAT'));
		$t_congty->C_LOGO->Upload->DbValue = $rs->fields('C_LOGO');
		$t_congty->C_LOGO->Upload->SaveDbToSession();
		$t_congty->C_WEBSITE->setDbValue($rs->fields('C_WEBSITE'));
		$t_congty->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$t_congty->C_DIENTHOAI->setDbValue($rs->fields('C_DIENTHOAI'));
		$t_congty->C_FAX->setDbValue($rs->fields('C_FAX'));
		$t_congty->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$t_congty->C_MOTA->setDbValue($rs->fields('C_MOTA'));
		$t_congty->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_congty->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_congty->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_congty->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_congty->C_REPORT_STATUS->setDbValue($rs->fields('C_REPORT_STATUS'));
		$t_congty->C_TYPE_TEMPLATE->setDbValue($rs->fields('C_TYPE_TEMPLATE'));
		$t_congty->C_PARRENT->setDbValue($rs->fields('C_PARRENT'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_congty;

		// Initialize URLs
		// Call Row_Rendering event

		$t_congty->Row_Rendering();

		// Common render codes for all row types
		// FK_NGANH_ID

		$t_congty->FK_NGANH_ID->CellCssStyle = ""; $t_congty->FK_NGANH_ID->CellCssClass = "";
		$t_congty->FK_NGANH_ID->CellAttrs = array(); $t_congty->FK_NGANH_ID->ViewAttrs = array(); $t_congty->FK_NGANH_ID->EditAttrs = array();

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->CellCssStyle = ""; $t_congty->C_TENCONGTY->CellCssClass = "";
		$t_congty->C_TENCONGTY->CellAttrs = array(); $t_congty->C_TENCONGTY->ViewAttrs = array(); $t_congty->C_TENCONGTY->EditAttrs = array();

		// C_TENVIETTAT
		$t_congty->C_TENVIETTAT->CellCssStyle = ""; $t_congty->C_TENVIETTAT->CellCssClass = "";
		$t_congty->C_TENVIETTAT->CellAttrs = array(); $t_congty->C_TENVIETTAT->ViewAttrs = array(); $t_congty->C_TENVIETTAT->EditAttrs = array();

		// C_LOGO
		$t_congty->C_LOGO->CellCssStyle = ""; $t_congty->C_LOGO->CellCssClass = "";
		$t_congty->C_LOGO->CellAttrs = array(); $t_congty->C_LOGO->ViewAttrs = array(); $t_congty->C_LOGO->EditAttrs = array();

		// C_WEBSITE
		$t_congty->C_WEBSITE->CellCssStyle = ""; $t_congty->C_WEBSITE->CellCssClass = "";
		$t_congty->C_WEBSITE->CellAttrs = array(); $t_congty->C_WEBSITE->ViewAttrs = array(); $t_congty->C_WEBSITE->EditAttrs = array();

		// C_DIACHI
		$t_congty->C_DIACHI->CellCssStyle = ""; $t_congty->C_DIACHI->CellCssClass = "";
		$t_congty->C_DIACHI->CellAttrs = array(); $t_congty->C_DIACHI->ViewAttrs = array(); $t_congty->C_DIACHI->EditAttrs = array();

		// C_DIENTHOAI
		$t_congty->C_DIENTHOAI->CellCssStyle = ""; $t_congty->C_DIENTHOAI->CellCssClass = "";
		$t_congty->C_DIENTHOAI->CellAttrs = array(); $t_congty->C_DIENTHOAI->ViewAttrs = array(); $t_congty->C_DIENTHOAI->EditAttrs = array();

		// C_FAX
		$t_congty->C_FAX->CellCssStyle = ""; $t_congty->C_FAX->CellCssClass = "";
		$t_congty->C_FAX->CellAttrs = array(); $t_congty->C_FAX->ViewAttrs = array(); $t_congty->C_FAX->EditAttrs = array();

		// C_EMAIL
		$t_congty->C_EMAIL->CellCssStyle = ""; $t_congty->C_EMAIL->CellCssClass = "";
		$t_congty->C_EMAIL->CellAttrs = array(); $t_congty->C_EMAIL->ViewAttrs = array(); $t_congty->C_EMAIL->EditAttrs = array();

		// C_MOTA
		$t_congty->C_MOTA->CellCssStyle = ""; $t_congty->C_MOTA->CellCssClass = "";
		$t_congty->C_MOTA->CellAttrs = array(); $t_congty->C_MOTA->ViewAttrs = array(); $t_congty->C_MOTA->EditAttrs = array();

		// C_REPORT_STATUS
		$t_congty->C_REPORT_STATUS->CellCssStyle = ""; $t_congty->C_REPORT_STATUS->CellCssClass = "";
		$t_congty->C_REPORT_STATUS->CellAttrs = array(); $t_congty->C_REPORT_STATUS->ViewAttrs = array(); $t_congty->C_REPORT_STATUS->EditAttrs = array();

		// C_TYPE_TEMPLATE
		$t_congty->C_TYPE_TEMPLATE->CellCssStyle = ""; $t_congty->C_TYPE_TEMPLATE->CellCssClass = "";
		$t_congty->C_TYPE_TEMPLATE->CellAttrs = array(); $t_congty->C_TYPE_TEMPLATE->ViewAttrs = array(); $t_congty->C_TYPE_TEMPLATE->EditAttrs = array();
		if ($t_congty->RowType == EW_ROWTYPE_VIEW) { // View row

			// FK_NGANH_ID
			if (strval($t_congty->FK_NGANH_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGANH_ID` = " . ew_AdjustSql($t_congty->FK_NGANH_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENNGANH` FROM `t_nganhnghe`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_congty->FK_NGANH_ID->ViewValue = $rswrk->fields('C_TENNGANH');
					$rswrk->Close();
				} else {
					$t_congty->FK_NGANH_ID->ViewValue = $t_congty->FK_NGANH_ID->CurrentValue;
				}
			} else {
				$t_congty->FK_NGANH_ID->ViewValue = NULL;
			}
			$t_congty->FK_NGANH_ID->CssStyle = "";
			$t_congty->FK_NGANH_ID->CssClass = "";
			$t_congty->FK_NGANH_ID->ViewCustomAttributes = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->ViewValue = $t_congty->C_TENCONGTY->CurrentValue;
			$t_congty->C_TENCONGTY->CssStyle = "";
			$t_congty->C_TENCONGTY->CssClass = "";
			$t_congty->C_TENCONGTY->ViewCustomAttributes = "";

			// C_TENVIETTAT
			$t_congty->C_TENVIETTAT->ViewValue = $t_congty->C_TENVIETTAT->CurrentValue;
			$t_congty->C_TENVIETTAT->CssStyle = "";
			$t_congty->C_TENVIETTAT->CssClass = "";
			$t_congty->C_TENVIETTAT->ViewCustomAttributes = "";

			// C_LOGO
			if (!ew_Empty($t_congty->C_LOGO->Upload->DbValue)) {
				$t_congty->C_LOGO->ViewValue = $t_congty->C_LOGO->FldCaption();
				$t_congty->C_LOGO->ImageAlt = $t_congty->C_LOGO->FldAlt();
			} else {
				$t_congty->C_LOGO->ViewValue = "";
			}
			$t_congty->C_LOGO->CssStyle = "";
			$t_congty->C_LOGO->CssClass = "";
			$t_congty->C_LOGO->ViewCustomAttributes = "";

			// C_WEBSITE
			$t_congty->C_WEBSITE->ViewValue = $t_congty->C_WEBSITE->CurrentValue;
			$t_congty->C_WEBSITE->CssStyle = "";
			$t_congty->C_WEBSITE->CssClass = "";
			$t_congty->C_WEBSITE->ViewCustomAttributes = "";

			// C_DIACHI
			$t_congty->C_DIACHI->ViewValue = $t_congty->C_DIACHI->CurrentValue;
			$t_congty->C_DIACHI->CssStyle = "";
			$t_congty->C_DIACHI->CssClass = "";
			$t_congty->C_DIACHI->ViewCustomAttributes = "";

			// C_DIENTHOAI
			$t_congty->C_DIENTHOAI->ViewValue = $t_congty->C_DIENTHOAI->CurrentValue;
			$t_congty->C_DIENTHOAI->CssStyle = "";
			$t_congty->C_DIENTHOAI->CssClass = "";
			$t_congty->C_DIENTHOAI->ViewCustomAttributes = "";

			// C_FAX
			$t_congty->C_FAX->ViewValue = $t_congty->C_FAX->CurrentValue;
			$t_congty->C_FAX->CssStyle = "";
			$t_congty->C_FAX->CssClass = "";
			$t_congty->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$t_congty->C_EMAIL->ViewValue = $t_congty->C_EMAIL->CurrentValue;
			$t_congty->C_EMAIL->CssStyle = "";
			$t_congty->C_EMAIL->CssClass = "";
			$t_congty->C_EMAIL->ViewCustomAttributes = "";

			// C_MOTA
			$t_congty->C_MOTA->ViewValue = $t_congty->C_MOTA->CurrentValue;
			$t_congty->C_MOTA->CssStyle = "";
			$t_congty->C_MOTA->CssClass = "";
			$t_congty->C_MOTA->ViewCustomAttributes = "";

			// C_REPORT_STATUS
			if (strval($t_congty->C_REPORT_STATUS->CurrentValue) <> "") {
				switch ($t_congty->C_REPORT_STATUS->CurrentValue) {
					case "1":
						$t_congty->C_REPORT_STATUS->ViewValue = "Lay du lieu tong hop";
						break;
					case "2":
						$t_congty->C_REPORT_STATUS->ViewValue = "Khong lay du lieu tong hop";
						break;
					default:
						$t_congty->C_REPORT_STATUS->ViewValue = $t_congty->C_REPORT_STATUS->CurrentValue;
				}
			} else {
				$t_congty->C_REPORT_STATUS->ViewValue = NULL;
			}
			$t_congty->C_REPORT_STATUS->CssStyle = "";
			$t_congty->C_REPORT_STATUS->CssClass = "";
			$t_congty->C_REPORT_STATUS->ViewCustomAttributes = "";

			// C_TYPE_TEMPLATE
			if (strval($t_congty->C_TYPE_TEMPLATE->CurrentValue) <> "") {
				switch ($t_congty->C_TYPE_TEMPLATE->CurrentValue) {
					case "1":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 1";
						break;
					case "2":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 2";
						break;
					case "3":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 3";
						break;
					case "4":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 4";
						break;
					case "5":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 5";
						break;
					case "6":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 6";
						break;
					case "7":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 7";
						break;
					case "8":
						$t_congty->C_TYPE_TEMPLATE->ViewValue = "Mau 8";
						break;
					default:
						$t_congty->C_TYPE_TEMPLATE->ViewValue = $t_congty->C_TYPE_TEMPLATE->CurrentValue;
				}
			} else {
				$t_congty->C_TYPE_TEMPLATE->ViewValue = NULL;
			}
			$t_congty->C_TYPE_TEMPLATE->CssStyle = "";
			$t_congty->C_TYPE_TEMPLATE->CssClass = "";
			$t_congty->C_TYPE_TEMPLATE->ViewCustomAttributes = "";

			// FK_NGANH_ID
			$t_congty->FK_NGANH_ID->HrefValue = "";
			$t_congty->FK_NGANH_ID->TooltipValue = "";

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->HrefValue = "";
			$t_congty->C_TENCONGTY->TooltipValue = "";

			// C_TENVIETTAT
			$t_congty->C_TENVIETTAT->HrefValue = "";
			$t_congty->C_TENVIETTAT->TooltipValue = "";

			// C_LOGO
			if (!empty($t_congty->C_LOGO->Upload->DbValue)) {
				$t_congty->C_LOGO->HrefValue = "t_congty_C_LOGO_bv.php?PK_MACONGTY=" . $t_congty->PK_MACONGTY->CurrentValue;
				if ($t_congty->Export <> "") $t_congty->C_LOGO->HrefValue = ew_ConvertFullUrl($t_congty->C_LOGO->HrefValue);
			} else {
				$t_congty->C_LOGO->HrefValue = "";
			}
			$t_congty->C_LOGO->TooltipValue = "";

			// C_WEBSITE
			$t_congty->C_WEBSITE->HrefValue = "";
			$t_congty->C_WEBSITE->TooltipValue = "";

			// C_DIACHI
			$t_congty->C_DIACHI->HrefValue = "";
			$t_congty->C_DIACHI->TooltipValue = "";

			// C_DIENTHOAI
			$t_congty->C_DIENTHOAI->HrefValue = "";
			$t_congty->C_DIENTHOAI->TooltipValue = "";

			// C_FAX
			$t_congty->C_FAX->HrefValue = "";
			$t_congty->C_FAX->TooltipValue = "";

			// C_EMAIL
			$t_congty->C_EMAIL->HrefValue = "";
			$t_congty->C_EMAIL->TooltipValue = "";

			// C_MOTA
			$t_congty->C_MOTA->HrefValue = "";
			$t_congty->C_MOTA->TooltipValue = "";

			// C_REPORT_STATUS
			$t_congty->C_REPORT_STATUS->HrefValue = "";
			$t_congty->C_REPORT_STATUS->TooltipValue = "";

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->HrefValue = "";
			$t_congty->C_TYPE_TEMPLATE->TooltipValue = "";
		} elseif ($t_congty->RowType == EW_ROWTYPE_ADD) { // Add row

			// FK_NGANH_ID
			$t_congty->FK_NGANH_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_NGANH_ID`, `C_TENNGANH`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_nganhnghe`";
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
			$t_congty->FK_NGANH_ID->EditValue = $arwrk;

			// C_TENCONGTY
			$t_congty->C_TENCONGTY->EditCustomAttributes = "";
			$t_congty->C_TENCONGTY->EditValue = ew_HtmlEncode($t_congty->C_TENCONGTY->CurrentValue);

			// C_TENVIETTAT
			$t_congty->C_TENVIETTAT->EditCustomAttributes = "";
			$t_congty->C_TENVIETTAT->EditValue = ew_HtmlEncode($t_congty->C_TENVIETTAT->CurrentValue);

			// C_LOGO
			$t_congty->C_LOGO->EditCustomAttributes = "";
			if (!ew_Empty($t_congty->C_LOGO->Upload->DbValue)) {
				$t_congty->C_LOGO->EditValue = $t_congty->C_LOGO->FldCaption();
				$t_congty->C_LOGO->ImageAlt = $t_congty->C_LOGO->FldAlt();
			} else {
				$t_congty->C_LOGO->EditValue = "";
			}

			// C_WEBSITE
			$t_congty->C_WEBSITE->EditCustomAttributes = "";
			$t_congty->C_WEBSITE->EditValue = ew_HtmlEncode($t_congty->C_WEBSITE->CurrentValue);

			// C_DIACHI
			$t_congty->C_DIACHI->EditCustomAttributes = "";
			$t_congty->C_DIACHI->EditValue = ew_HtmlEncode($t_congty->C_DIACHI->CurrentValue);

			// C_DIENTHOAI
			$t_congty->C_DIENTHOAI->EditCustomAttributes = "";
			$t_congty->C_DIENTHOAI->EditValue = ew_HtmlEncode($t_congty->C_DIENTHOAI->CurrentValue);

			// C_FAX
			$t_congty->C_FAX->EditCustomAttributes = "";
			$t_congty->C_FAX->EditValue = ew_HtmlEncode($t_congty->C_FAX->CurrentValue);

			// C_EMAIL
			$t_congty->C_EMAIL->EditCustomAttributes = "";
			$t_congty->C_EMAIL->EditValue = ew_HtmlEncode($t_congty->C_EMAIL->CurrentValue);

			// C_MOTA
			$t_congty->C_MOTA->EditCustomAttributes = "";
			$t_congty->C_MOTA->EditValue = ew_HtmlEncode($t_congty->C_MOTA->CurrentValue);

			// C_REPORT_STATUS
			$t_congty->C_REPORT_STATUS->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Lay du lieu tong hop");
			$arwrk[] = array("2", "Khong lay du lieu tong hop");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_congty->C_REPORT_STATUS->EditValue = $arwrk;

			// C_TYPE_TEMPLATE
			$t_congty->C_TYPE_TEMPLATE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Mau 1");
			$arwrk[] = array("2", "Mau 2");
			$arwrk[] = array("3", "Mau 3");
			$arwrk[] = array("4", "Mau 4");
			$arwrk[] = array("5", "Mau 5");
			$arwrk[] = array("6", "Mau 6");
			$arwrk[] = array("7", "Mau 7");
			$arwrk[] = array("8", "Mau 8");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_congty->C_TYPE_TEMPLATE->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($t_congty->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_congty->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_congty;

		// Initialize form error message
		$gsFormError = "";
		if (!ew_CheckFileType($t_congty->C_LOGO->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("WrongFileType");
		}
		if ($t_congty->C_LOGO->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0 && $t_congty->C_LOGO->Upload->FileSize > EW_MAX_FILE_SIZE) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, $Language->Phrase("MaxFileSize"));
		}
		if (in_array($t_congty->C_LOGO->Upload->Error, array(1, 2, 3, 6, 7, 8))) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("PhpUploadErr" . $t_congty->C_LOGO->Upload->Error);
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($t_congty->FK_NGANH_ID->FormValue) && $t_congty->FK_NGANH_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_congty->FK_NGANH_ID->FldCaption();
		}
	
		if (!is_null($t_congty->C_TYPE_TEMPLATE->FormValue) && $t_congty->C_TYPE_TEMPLATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_congty->C_TYPE_TEMPLATE->FldCaption();
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
		global $conn, $Language, $Security, $t_congty;
		$rsnew = array();

		// FK_NGANH_ID
		$t_congty->FK_NGANH_ID->SetDbValueDef($rsnew, $t_congty->FK_NGANH_ID->CurrentValue, 0, FALSE);

		// C_TENCONGTY
		$t_congty->C_TENCONGTY->SetDbValueDef($rsnew, $t_congty->C_TENCONGTY->CurrentValue, NULL, FALSE);

		// C_TENVIETTAT
		$t_congty->C_TENVIETTAT->SetDbValueDef($rsnew, $t_congty->C_TENVIETTAT->CurrentValue, NULL, FALSE);

		// C_LOGO
		$t_congty->C_LOGO->Upload->SaveToSession(); // Save file value to Session
		if (is_null($t_congty->C_LOGO->Upload->Value)) {
			$rsnew['C_LOGO'] = NULL;	
		} else {
			$rsnew['C_LOGO'] = $t_congty->C_LOGO->Upload->Value;
		}

		// C_WEBSITE
		$t_congty->C_WEBSITE->SetDbValueDef($rsnew, $t_congty->C_WEBSITE->CurrentValue, NULL, FALSE);

		// C_DIACHI
		$t_congty->C_DIACHI->SetDbValueDef($rsnew, $t_congty->C_DIACHI->CurrentValue, NULL, FALSE);

		// C_DIENTHOAI
		$t_congty->C_DIENTHOAI->SetDbValueDef($rsnew, $t_congty->C_DIENTHOAI->CurrentValue, NULL, FALSE);

		// C_FAX
		$t_congty->C_FAX->SetDbValueDef($rsnew, $t_congty->C_FAX->CurrentValue, NULL, FALSE);

		// C_EMAIL
		$t_congty->C_EMAIL->SetDbValueDef($rsnew, $t_congty->C_EMAIL->CurrentValue, NULL, FALSE);

		// C_MOTA
		$t_congty->C_MOTA->SetDbValueDef($rsnew, $t_congty->C_MOTA->CurrentValue, NULL, FALSE);

		// C_REPORT_STATUS
		$t_congty->C_REPORT_STATUS->SetDbValueDef($rsnew, $t_congty->C_REPORT_STATUS->CurrentValue, 0, FALSE);
                
                // C_PARRENT
                if ($_SESSION['parrentcompanyid']  == null)
                {
		$t_congty->C_PARRENT->SetDbValueDef($rsnew, -1, -1, FALSE);
                }
                else 
                {
                // C_PARRENT
		$t_congty->C_PARRENT->SetDbValueDef($rsnew, $_SESSION['parrentcompanyid'], 0, FALSE);   
                }     
		// C_TYPE_TEMPLATE
		$t_congty->C_TYPE_TEMPLATE->SetDbValueDef($rsnew, $t_congty->C_TYPE_TEMPLATE->CurrentValue, 0, FALSE);

		// Call Row Inserting event
		$bInsertRow = $t_congty->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_congty->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_congty->CancelMessage <> "") {
				$this->setMessage($t_congty->CancelMessage);
				$t_congty->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_congty->PK_MACONGTY->setDbValue($conn->Insert_ID());
			$rsnew['PK_MACONGTY'] = $t_congty->PK_MACONGTY->DbValue;

			// Call Row Inserted event
			$t_congty->Row_Inserted($rsnew);
		}

		// C_LOGO
		$t_congty->C_LOGO->Upload->RemoveFromSession(); // Remove file value from Session
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

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
