<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_thongbao_mainlevel_obinfo.php" ?>
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
$t_thongbao_mainlevel_ob_edit = new ct_thongbao_mainlevel_ob_edit();
$Page =& $t_thongbao_mainlevel_ob_edit;

// Page init
$t_thongbao_mainlevel_ob_edit->Page_Init();

// Page main
$t_thongbao_mainlevel_ob_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_mainlevel_ob_edit = new ew_Page("t_thongbao_mainlevel_ob_edit");

// page properties
t_thongbao_mainlevel_ob_edit.PageID = "edit"; // page ID
t_thongbao_mainlevel_ob_edit.FormID = "ft_thongbao_mainlevel_obedit_tt"; // form ID
var EW_PAGE_ID = t_thongbao_mainlevel_ob_edit.PageID; // for backward compatibility
// extend page with ValidateForm function
t_thongbao_mainlevel_ob_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_ACTIVE"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_ACTIVE->FldCaption()) ?>");
                radioValue = checkRadio(fobj.x_C_NOTICE_HIT);
                 if ((radioValue == 1))
                {
                     	elm = fobj.elements["x" + infix + "_C_FILEANH"];
		       if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_FILEANH->FldCaption()) ?>");
                }
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_ORDER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ORDER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_ORDER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_NOTICE_HIT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_NOTICE_HIT->FldCaption()) ?>");
                
                 c_notice_hit =  checkRadio(fobj.x_C_NOTICE_HIT);
                 if ( c_notice_hit == 1)
                 {
                    	elm = fobj.elements["x" + infix + "_C_FILEANH"];
		       if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_mainlevel_ob->C_FILEANH->FldCaption()) ?>"); 
                 }    
	        
                 c_send_mail =  checkRadio(fobj.x_C_SENDMAIL);
                 if (c_send_mail == 1)  
                  {
                      var r =confirm("Bạn có chắc chắn gửi Mail cho bộ phận thiết!")
                      if (r == true) { return true; } else  {  return false; }
                  } 
                
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_thongbao_mainlevel_ob_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_mainlevel_ob_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_mainlevel_ob_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_mainlevel_ob_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><span class="phpmaker"><?php echo $t_thongbao_mainlevel_ob->TableCaption() ?></span></p>
<a href="<?php echo $t_thongbao_mainlevel_ob->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_mainlevel_ob_edit->ShowMessage();
?>

<form name="ft_thongbao_mainlevel_obedit_tt" id="ft_thongbao_mainlevel_obedit_tt" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_thongbao_mainlevel_ob_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_thongbao_mainlevel_ob">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_thongbao_mainlevel_ob->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<?php $t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditAttrs["onchange"] = "ew_UpdateOpt('x_FK_DOITUONG_ID','x_FK_CONGTY_ID',true); " . @$t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditAttrs["onchange"]; ?>
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditAttributes() ?>>
<?php
if(isAdmin())
{   
        if (is_array($t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditValue;
                $rowswrk = count($arwrk);
                $emptywrk = TRUE;
                for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                        $selwrk = (strval($t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
     if (is_array($t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditValue)) {
                $arwrk = $t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditValue;
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
        <?php          }
                }
        }
}    
    
?>
</select>
</span><?php echo $t_thongbao_mainlevel_ob->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
  
<?php if ($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->Visible) { // PK_CHUYENMUC_ID ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CellAttributes() ?>><span id="el_PK_CHUYENMUC_ID">
<select id="x_PK_CHUYENMUC_ID" name="x_PK_CHUYENMUC_ID" title="<?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->FldTitle() ?>"<?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditAttributes() ?>>
<?php
if (is_array($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditValue)) {
	$arwrk = $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
       
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
        
<?php if ($t_thongbao_mainlevel_ob->FK_DOITUONG_ID->Visible) { // FK_DOITUONG_ID ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CellAttributes() ?>><span id="el_FK_DOITUONG_ID">
<div id="tp_x_FK_DOITUONG_ID" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditAttributes() ?>></label></div>
<div id="dsl_x_FK_DOITUONG_ID" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_FK_DOITUONG_ID" id="x_FK_DOITUONG_ID" title="<?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
<?php
$sSqlWrk = "SELECT `PK_DOITUONG`, `C_NAME`, '' AS Disp2Fld FROM `t_doituong_levelsite`";
//* fix trường hopwk đặc biệt với đơn vị là thư viện
if ($Security->CurrentUserOption() <> 117)
{
$sWhereWrk = "`FK_CONGTY` IN ({filter_value}) AND C_TYPE =2";
} 
else 
{
$sWhereWrk = "`FK_CONGTY` IN ({filter_value}) AND (C_TYPE <> 1)";   
}
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_FK_DOITUONG_ID" id="s_x_FK_DOITUONG_ID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_FK_DOITUONG_ID" id="lft_x_FK_DOITUONG_ID" value="1">
</span><?php echo $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
 <?php if ($t_thongbao_mainlevel_ob->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_BEGIN_DATE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_BEGIN_DATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_BEGIN_DATE->CellAttributes() ?>><span id="el_C_BEGIN_DATE">
<?php echo $t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditValue ?><input type="hidden" name="x_C_BEGIN_DATE" id="x_C_BEGIN_DATE" value="<?php echo ew_HtmlEncode($t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue) ?>">
</span><?php echo $t_thongbao_mainlevel_ob->C_BEGIN_DATE->CustomMsg ?>
          <span class="col2"><?php echo $t_thongbao_mainlevel_ob->C_END_DATE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span>           
           <span id="el_C_END_DATE">
<?php echo $t_thongbao_mainlevel_ob->C_END_DATE->EditValue ?><input type="hidden" name="x_C_END_DATE" id="x_C_END_DATE" value="<?php echo ew_HtmlEncode($t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue) ?>">
</span><?php echo $t_thongbao_mainlevel_ob->C_END_DATE->CustomMsg ?>     
                </td>
	</tr>
<?php } ?> 

<?php if ($t_thongbao_mainlevel_ob->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_TITLE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_TITLE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
<div<?php echo $t_thongbao_mainlevel_ob->C_TITLE->ViewAttributes() ?>><?php echo $t_thongbao_mainlevel_ob->C_TITLE->EditValue ?></div><input type="hidden" name="x_C_TITLE" id="x_C_TITLE" value="<?php echo ew_HtmlEncode($t_thongbao_mainlevel_ob->C_TITLE->CurrentValue) ?>">
</span><?php echo $t_thongbao_mainlevel_ob->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainlevel_ob->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_CONTENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_CONTENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_CONTENT->CellAttributes() ?>><span id="el_C_CONTENT">
<div<?php echo $t_thongbao_mainlevel_ob->C_CONTENT->ViewAttributes() ?>><?php echo $t_thongbao_mainlevel_ob->C_CONTENT->EditValue ?></div><input type="hidden" name="x_C_CONTENT" id="x_C_CONTENT" value="<?php echo ew_HtmlEncode($t_thongbao_mainlevel_ob->C_CONTENT->CurrentValue) ?>">
</span><?php echo $t_thongbao_mainlevel_ob->C_CONTENT->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_thongbao_mainlevel_ob->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_ORDER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_thongbao_mainlevel_ob->C_ORDER->FldTitle() ?>" value="<?php echo $t_thongbao_mainlevel_ob->C_ORDER->EditValue ?>"<?php echo $t_thongbao_mainlevel_ob->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	showsTime: true, // show time
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_thongbao_mainlevel_ob->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainlevel_ob->C_KEYWORD->Visible) { // C_KEYWORD ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->FldCaption() ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->CellAttributes() ?>><span id="el_C_KEYWORD">
<input type="text" name="x_C_KEYWORD" id="x_C_KEYWORD" title="<?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->EditValue ?>"<?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->EditAttributes() ?>>
</span><?php echo $t_thongbao_mainlevel_ob->C_KEYWORD->CustomMsg ?></td>
	</tr>
<?php } ?>
        <tr>
            <td class="ewTableHeader">Xác nhận gửi mail cho đơn vị thiết kế <?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
            <td>
                <label><input type="radio" name="x_C_SENDMAIL" id="x_C_SENDMAIL" title="" value="0" checked="checked">Không </label>
                <label><input type="radio" name="x_C_SENDMAIL" id="x_C_SENDMAIL" title="" value="1" >Xác nhận</label>
                <p> <b> Nội dung -  đường dẫn ảnh cần thiết kế nếu có </b> </p>
                <input type="text" name ="x_C_CONTENT_MAIL" ID="x_C_CONTENT_MAIL" size="80" >
            </td>
        </tr>      
<?php if ($t_thongbao_mainlevel_ob->C_NOTICE_HIT->Visible) { // C_NOTICE_HIT ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->CellAttributes() ?>><span id="el_C_NOTICE_HIT">
<div id="tp_x_C_NOTICE_HIT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_NOTICE_HIT" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_mainlevel_ob->C_NOTICE_HIT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_mainlevel_ob->C_FILEANH->Visible) { // C_FILEANH ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_FILEANH->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_FILEANH->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_FILEANH->CellAttributes() ?>><span id="el_C_FILEANH">
<input type="text" name="x_C_FILEANH" id="x_C_FILEANH" title="<?php echo $t_thongbao_mainlevel_ob->C_FILEANH->FldTitle() ?>" size="75" maxlength="255" value="<?php echo $t_thongbao_mainlevel_ob->C_FILEANH->EditValue ?>"<?php echo $t_thongbao_mainlevel_ob->C_FILEANH->EditAttributes() ?>>
</span><?php echo $t_thongbao_mainlevel_ob->C_FILEANH->CustomMsg ?>
           <i>  (Size ảnh của tin nổi bật hiển thị tốt nhất: 640px* 344px) -- <a target="_blank" href="http://img.hpu.edu.vn/index.php?/category/2145"> Kho ảnh sự kiện HPU </a></i>
                </td>
	</tr>
<?php } ?>
 <?php if ($t_thongbao_mainlevel_ob->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_mainlevel_ob->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_mainlevel_ob->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_PK_THONGBAO_MAINLEVEL" id="x_PK_THONGBAO_MAINLEVEL" value="<?php echo ew_HtmlEncode($t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--
ew_UpdateOpts([['x_FK_DOITUONG_ID','x_FK_CONGTY_ID',false]]);

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
$t_thongbao_mainlevel_ob_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_mainlevel_ob_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_thongbao_mainlevel_ob';

	// Page object name
	var $PageObjName = 't_thongbao_mainlevel_ob_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_thongbao_mainlevel_ob;
		if ($t_thongbao_mainlevel_ob->UseTokenInUrl) $PageUrl .= "t=" . $t_thongbao_mainlevel_ob->TableVar . "&"; // Add page token
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
		global $objForm, $t_thongbao_mainlevel_ob;
		if ($t_thongbao_mainlevel_ob->UseTokenInUrl) {
			if ($objForm)
				return ($t_thongbao_mainlevel_ob->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_thongbao_mainlevel_ob->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_thongbao_mainlevel_ob_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_mainlevel_ob)
		$GLOBALS["t_thongbao_mainlevel_ob"] = new ct_thongbao_mainlevel_ob();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_thongbao_mainlevel_ob', TRUE);

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
		global $t_thongbao_mainlevel_ob;

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
			$this->Page_Terminate("t_thongbao_mainlevel_oblist.php");
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
		global $objForm, $Language, $gsFormError, $t_thongbao_mainlevel_ob;

		// Load key from QueryString
		if (@$_GET["PK_THONGBAO_MAINLEVEL"] <> "")
			$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->setQueryStringValue($_GET["PK_THONGBAO_MAINLEVEL"]);
		if (@$_POST["a_edit"] <> "") {
                       	$this->GetUploadFiles(); // Get upload files
			$t_thongbao_mainlevel_ob->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_thongbao_mainlevel_ob->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_thongbao_mainlevel_ob->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_thongbao_mainlevel_ob->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CurrentValue == "")
			$this->Page_Terminate("t_thongbao_mainlevel_oblist.php"); // Invalid key, return to list
		switch ($t_thongbao_mainlevel_ob->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_thongbao_mainlevel_oblist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_thongbao_mainlevel_ob->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_thongbao_mainlevel_ob->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_thongbao_mainlevel_obview.php")
						$sReturnUrl = $t_thongbao_mainlevel_ob->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_thongbao_mainlevel_ob->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_thongbao_mainlevel_ob->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_thongbao_mainlevel_ob;

		// Get upload data
			
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_thongbao_mainlevel_ob;
		$t_thongbao_mainlevel_ob->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->setFormValue($objForm->GetValue("x_FK_DOITUONG_ID"));
		$t_thongbao_mainlevel_ob->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_thongbao_mainlevel_ob->C_CONTENT->setFormValue($objForm->GetValue("x_C_CONTENT"));
		$t_thongbao_mainlevel_ob->C_END_DATE->setFormValue($objForm->GetValue("x_C_END_DATE"));
		$t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->setFormValue($objForm->GetValue("x_C_BEGIN_DATE"));
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_thongbao_mainlevel_ob->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_thongbao_mainlevel_ob->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_ORDER->CurrentValue, 11);
		$t_thongbao_mainlevel_ob->C_KEYWORD->setFormValue($objForm->GetValue("x_C_KEYWORD"));
		$t_thongbao_mainlevel_ob->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_FK_NGUOIDUNG_ID"));
		$t_thongbao_mainlevel_ob->C_NOTICE_HIT->setFormValue($objForm->GetValue("x_C_NOTICE_HIT"));
                $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->setFormValue($objForm->GetValue("x_PK_CHUYENMUC_ID"));
		$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->setFormValue($objForm->GetValue("x_PK_THONGBAO_MAINLEVEL"));
                $t_thongbao_mainlevel_ob->C_FILEANH->setFormValue($objForm->GetValue("x_C_FILEANH"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_thongbao_mainlevel_ob;
		$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CurrentValue = $t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->FormValue;
		$this->LoadRow();
		$t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue = $t_thongbao_mainlevel_ob->FK_CONGTY_ID->FormValue;
		$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue = $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FormValue;
		$t_thongbao_mainlevel_ob->C_TITLE->CurrentValue = $t_thongbao_mainlevel_ob->C_TITLE->FormValue;
		$t_thongbao_mainlevel_ob->C_CONTENT->CurrentValue = $t_thongbao_mainlevel_ob->C_CONTENT->FormValue;
		$t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue = $t_thongbao_mainlevel_ob->C_END_DATE->FormValue;
		$t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue = $t_thongbao_mainlevel_ob->C_BEGIN_DATE->FormValue;
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue = $t_thongbao_mainlevel_ob->C_ACTIVE->FormValue;
		$t_thongbao_mainlevel_ob->C_ORDER->CurrentValue = $t_thongbao_mainlevel_ob->C_ORDER->FormValue;
		$t_thongbao_mainlevel_ob->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_ORDER->CurrentValue, 11);
		$t_thongbao_mainlevel_ob->C_KEYWORD->CurrentValue = $t_thongbao_mainlevel_ob->C_KEYWORD->FormValue;
		$t_thongbao_mainlevel_ob->C_USER_EDIT->CurrentValue = $t_thongbao_mainlevel_ob->C_USER_EDIT->FormValue;
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue = $t_thongbao_mainlevel_ob->C_EDIT_TIME->FormValue;
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue, 7);
		$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CurrentValue = $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->FormValue;
                $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue = $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->FormValue;
		$t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue = $t_thongbao_mainlevel_ob->C_NOTICE_HIT->FormValue;
                $t_thongbao_mainlevel_ob->C_FILEANH->CurrentValue = $t_thongbao_mainlevel_ob->C_FILEANH->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_thongbao_mainlevel_ob;
		$sFilter = $t_thongbao_mainlevel_ob->KeyFilter();

		// Call Row Selecting event
		$t_thongbao_mainlevel_ob->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_thongbao_mainlevel_ob->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_mainlevel_ob->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_thongbao_mainlevel_ob->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_thongbao_mainlevel_ob;
		$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->setDbValue($rs->fields('PK_THONGBAO_MAINLEVEL'));
		$t_thongbao_mainlevel_ob->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_thongbao_mainlevel_ob->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$t_thongbao_mainlevel_ob->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_thongbao_mainlevel_ob->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$t_thongbao_mainlevel_ob->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$t_thongbao_mainlevel_ob->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->setDbValue($rs->fields('C_TIME_PUBLISH'));
		$t_thongbao_mainlevel_ob->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_thongbao_mainlevel_ob->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_thongbao_mainlevel_ob->C_KEYWORD->setDbValue($rs->fields('C_KEYWORD'));
		$t_thongbao_mainlevel_ob->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_thongbao_mainlevel_ob->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_thongbao_mainlevel_ob->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$t_thongbao_mainlevel_ob->C_NOTICE_HIT->setDbValue($rs->fields('C_NOTICE_HIT'));
	    	$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$t_thongbao_mainlevel_ob->C_TYPE->setDbValue($rs->fields('C_TYPE'));
        	$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->setDbValue($rs->fields('PK_CHUYENMUC_ID'));
                $t_thongbao_mainlevel_ob->C_FILEANH->setDbValue($rs->fields('C_FILEANH'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_mainlevel_ob;

		// Initialize URLs
		// Call Row_Rendering event

		$t_thongbao_mainlevel_ob->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_thongbao_mainlevel_ob->FK_CONGTY_ID->CellCssStyle = ""; $t_thongbao_mainlevel_ob->FK_CONGTY_ID->CellCssClass = "";
		$t_thongbao_mainlevel_ob->FK_CONGTY_ID->CellAttrs = array(); $t_thongbao_mainlevel_ob->FK_CONGTY_ID->ViewAttrs = array(); $t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditAttrs = array();

		// FK_DOITUONG_ID
		$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CellCssStyle = ""; $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CellCssClass = "";
		$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CellAttrs = array(); $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->ViewAttrs = array(); $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditAttrs = array();

		// C_TITLE
		$t_thongbao_mainlevel_ob->C_TITLE->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_TITLE->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_TITLE->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_TITLE->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_TITLE->EditAttrs = array();

		// C_CONTENT
		$t_thongbao_mainlevel_ob->C_CONTENT->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_CONTENT->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_CONTENT->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_CONTENT->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_CONTENT->EditAttrs = array();

		// C_END_DATE
		$t_thongbao_mainlevel_ob->C_END_DATE->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_END_DATE->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_END_DATE->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_END_DATE->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_END_DATE->EditAttrs = array();

		// C_BEGIN_DATE
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_BEGIN_DATE->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditAttrs = array();

		// C_ACTIVE
		$t_thongbao_mainlevel_ob->C_ACTIVE->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_ACTIVE->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_ACTIVE->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_ACTIVE->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_ACTIVE->EditAttrs = array();

		// C_ORDER
		$t_thongbao_mainlevel_ob->C_ORDER->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_ORDER->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_ORDER->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_ORDER->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_ORDER->EditAttrs = array();

		// C_KEYWORD
		$t_thongbao_mainlevel_ob->C_KEYWORD->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_KEYWORD->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_KEYWORD->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_KEYWORD->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_KEYWORD->EditAttrs = array();

		// C_USER_EDIT
		$t_thongbao_mainlevel_ob->C_USER_EDIT->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_USER_EDIT->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_USER_EDIT->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_USER_EDIT->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_EDIT_TIME->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_EDIT_TIME->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_EDIT_TIME->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_EDIT_TIME->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->EditAttrs = array();
                
                // PK_CHUYENMUC_ID
		$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CellCssStyle = ""; $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CellCssClass = "";
		$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CellAttrs = array(); $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewAttrs = array(); $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditAttrs = array();

		// C_NOTICE_HIT
		$t_thongbao_mainlevel_ob->C_NOTICE_HIT->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_NOTICE_HIT->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_NOTICE_HIT->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditAttrs = array();
                
                // C_FILEANH
		$t_thongbao_mainlevel_ob->C_FILEANH->CellCssStyle = ""; $t_thongbao_mainlevel_ob->C_FILEANH->CellCssClass = "";
		$t_thongbao_mainlevel_ob->C_FILEANH->CellAttrs = array(); $t_thongbao_mainlevel_ob->C_FILEANH->ViewAttrs = array(); $t_thongbao_mainlevel_ob->C_FILEANH->EditAttrs = array();
		if ($t_thongbao_mainlevel_ob->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_THONGBAO_MAINLEVEL
			$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->ViewValue = $t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CurrentValue;
			$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CssStyle = "";
			$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->CssClass = "";
			$t_thongbao_mainlevel_ob->PK_THONGBAO_MAINLEVEL->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainlevel_ob->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_mainlevel_ob->FK_CONGTY_ID->ViewValue = $t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->CssStyle = "";
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->CssClass = "";
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->ViewCustomAttributes = "";

			// PK_THONGBAO
			$t_thongbao_mainlevel_ob->PK_THONGBAO->ViewValue = $t_thongbao_mainlevel_ob->PK_THONGBAO->CurrentValue;
			$t_thongbao_mainlevel_ob->PK_THONGBAO->CssStyle = "";
			$t_thongbao_mainlevel_ob->PK_THONGBAO->CssClass = "";
			$t_thongbao_mainlevel_ob->PK_THONGBAO->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->ViewValue = $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CssStyle = "";
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CssClass = "";
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->ViewCustomAttributes = "";
                        
                        	// PK_CHUYENMUC_ID
			if (strval($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CssStyle = "";
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CssClass = "";
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_mainlevel_ob->C_TITLE->ViewValue = $t_thongbao_mainlevel_ob->C_TITLE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_TITLE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_TITLE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_TITLE->ViewCustomAttributes = "";

			// C_CONTENT
			$t_thongbao_mainlevel_ob->C_CONTENT->ViewValue = $t_thongbao_mainlevel_ob->C_CONTENT->CurrentValue;
			$t_thongbao_mainlevel_ob->C_CONTENT->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->CssClass = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->ViewCustomAttributes = "";

			// C_PUBLISH
			$t_thongbao_mainlevel_ob->C_PUBLISH->ViewValue = $t_thongbao_mainlevel_ob->C_PUBLISH->CurrentValue;
			$t_thongbao_mainlevel_ob->C_PUBLISH->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_PUBLISH->CssClass = "";
			$t_thongbao_mainlevel_ob->C_PUBLISH->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_mainlevel_ob->C_END_DATE->ViewValue = $t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_END_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_END_DATE->ViewValue, 7);
			$t_thongbao_mainlevel_ob->C_END_DATE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewValue = $t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewValue, 7);
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_TIME_PUBLISH
			$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->ViewValue = $t_thongbao_mainlevel_ob->C_TIME_PUBLISH->CurrentValue;
			$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_TIME_PUBLISH->ViewValue, 7);
			$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->CssClass = "";
			$t_thongbao_mainlevel_ob->C_TIME_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue) {
					case "0":
						$t_thongbao_mainlevel_ob->C_ACTIVE->ViewValue = "Khong kich hoat levelsite";
						break;
					case "1":
						$t_thongbao_mainlevel_ob->C_ACTIVE->ViewValue = "Kich hoat";
						break;
					default:
						$t_thongbao_mainlevel_ob->C_ACTIVE->ViewValue = $t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->C_ACTIVE->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->C_ACTIVE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_ACTIVE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_ACTIVE->ViewCustomAttributes = "";

			// C_ORDER
			$t_thongbao_mainlevel_ob->C_ORDER->ViewValue = $t_thongbao_mainlevel_ob->C_ORDER->CurrentValue;
			$t_thongbao_mainlevel_ob->C_ORDER->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_ORDER->ViewValue, 11);
			$t_thongbao_mainlevel_ob->C_ORDER->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_ORDER->CssClass = "";
			$t_thongbao_mainlevel_ob->C_ORDER->ViewCustomAttributes = "";

			// C_KEYWORD
			$t_thongbao_mainlevel_ob->C_KEYWORD->ViewValue = $t_thongbao_mainlevel_ob->C_KEYWORD->CurrentValue;
			$t_thongbao_mainlevel_ob->C_KEYWORD->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_KEYWORD->CssClass = "";
			$t_thongbao_mainlevel_ob->C_KEYWORD->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_thongbao_mainlevel_ob->C_USER_ADD->ViewValue = $t_thongbao_mainlevel_ob->C_USER_ADD->CurrentValue;
			$t_thongbao_mainlevel_ob->C_USER_ADD->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_USER_ADD->CssClass = "";
			$t_thongbao_mainlevel_ob->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_thongbao_mainlevel_ob->C_ADD_TIME->ViewValue = $t_thongbao_mainlevel_ob->C_ADD_TIME->CurrentValue;
			$t_thongbao_mainlevel_ob->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_ADD_TIME->ViewValue, 7);
			$t_thongbao_mainlevel_ob->C_ADD_TIME->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_ADD_TIME->CssClass = "";
			$t_thongbao_mainlevel_ob->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_thongbao_mainlevel_ob->C_USER_EDIT->ViewValue = $t_thongbao_mainlevel_ob->C_USER_EDIT->CurrentValue;
			$t_thongbao_mainlevel_ob->C_USER_EDIT->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_USER_EDIT->CssClass = "";
			$t_thongbao_mainlevel_ob->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->ViewValue = $t_thongbao_mainlevel_ob->C_EDIT_TIME->CurrentValue;
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_EDIT_TIME->ViewValue, 7);
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->CssClass = "";
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->ViewValue = $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CurrentValue;
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->CssClass = "";
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_NOTICE_HIT
			if (strval($t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue) <> "") {
				switch ($t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue) {
					case "0":
						$t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewValue = "Khong noi bat";
						break;
					case "1":
						$t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewValue = "Noi bat";
						break;
					default:
						$t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewValue = $t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->CssClass = "";
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->ViewCustomAttributes = "";
                        
                        // C_FILEANH
			$t_thongbao_mainlevel_ob->C_FILEANH->ViewValue = $t_thongbao_mainlevel_ob->C_FILEANH->CurrentValue;
			$t_thongbao_mainlevel_ob->C_FILEANH->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_FILEANH->CssClass = "";
			$t_thongbao_mainlevel_ob->C_FILEANH->ViewCustomAttributes = "";

			// FK_CONGTY_SEND
			if (strval($t_thongbao_mainlevel_ob->FK_CONGTY_SEND->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_mainlevel_ob->FK_CONGTY_SEND->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->ViewValue = $t_thongbao_mainlevel_ob->FK_CONGTY_SEND->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->CssStyle = "";
			$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->CssClass = "";
			$t_thongbao_mainlevel_ob->FK_CONGTY_SEND->ViewCustomAttributes = "";

			// C_TYPE
			$t_thongbao_mainlevel_ob->C_TYPE->ViewValue = $t_thongbao_mainlevel_ob->C_TYPE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_TYPE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_TYPE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_TYPE->ViewCustomAttributes = "";
                        
                        
                        // PK_CHUYENMUC_ID
                 
			if (strval($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue;
				}
			} else {
				$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewValue = NULL;
			}
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CssStyle = "";
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CssClass = "";
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->HrefValue = "";
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->TooltipValue = "";

			// FK_DOITUONG_ID
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->HrefValue = "";
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->TooltipValue = "";

			// C_TITLE
			$t_thongbao_mainlevel_ob->C_TITLE->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_TITLE->TooltipValue = "";

			// C_CONTENT
			$t_thongbao_mainlevel_ob->C_CONTENT->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->TooltipValue = "";

			// C_END_DATE
			$t_thongbao_mainlevel_ob->C_END_DATE->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->TooltipValue = "";

			// C_BEGIN_DATE
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->TooltipValue = "";

			// C_ACTIVE
			$t_thongbao_mainlevel_ob->C_ACTIVE->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_ACTIVE->TooltipValue = "";

			// C_ORDER
			$t_thongbao_mainlevel_ob->C_ORDER->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_ORDER->TooltipValue = "";

			// C_KEYWORD
			$t_thongbao_mainlevel_ob->C_KEYWORD->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_KEYWORD->TooltipValue = "";

			// C_USER_EDIT
			$t_thongbao_mainlevel_ob->C_USER_EDIT->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->TooltipValue = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->TooltipValue = "";
                        
                        // PK_CHUYENMUC_ID
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->HrefValue = "";
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->TooltipValue = "";


			// C_NOTICE_HIT
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->TooltipValue = "";
                        
                        // C_FILEANH
			$t_thongbao_mainlevel_ob->C_FILEANH->HrefValue = "";
			$t_thongbao_mainlevel_ob->C_FILEANH->TooltipValue = "";
		} elseif ($t_thongbao_mainlevel_ob->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY_ID
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->EditValue = $arwrk;

			// FK_DOITUONG_ID
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditCustomAttributes = "";
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
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->EditValue = $arwrk;

                         // PK_CHUYENMUC_ID
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_CHUYENMUC`, `C_NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_chuyenmuc_levelsite`";
			$sWhereWrk = "FK_CONGTY =".$Security->CurrentUserOption()." AND C_STATUS = 1";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->EditValue = $arwrk;
                        
			// C_TITLE
			$t_thongbao_mainlevel_ob->C_TITLE->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_TITLE->EditValue = $t_thongbao_mainlevel_ob->C_TITLE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_TITLE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_TITLE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_TITLE->ViewCustomAttributes = "";

			// C_CONTENT
			$t_thongbao_mainlevel_ob->C_CONTENT->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->EditValue = $t_thongbao_mainlevel_ob->C_CONTENT->CurrentValue;
			$t_thongbao_mainlevel_ob->C_CONTENT->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->CssClass = "";
			$t_thongbao_mainlevel_ob->C_CONTENT->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_mainlevel_ob->C_END_DATE->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->EditValue = $t_thongbao_mainlevel_ob->C_END_DATE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_END_DATE->EditValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_END_DATE->EditValue, 7);
			$t_thongbao_mainlevel_ob->C_END_DATE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_END_DATE->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditValue = $t_thongbao_mainlevel_ob->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditValue = ew_FormatDateTime($t_thongbao_mainlevel_ob->C_BEGIN_DATE->EditValue, 7);
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_ACTIVE
			$t_thongbao_mainlevel_ob->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_thongbao_mainlevel_ob->C_ACTIVE->EditValue = $arwrk;
                        
                       

			// C_ORDER
			$t_thongbao_mainlevel_ob->C_ORDER->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_mainlevel_ob->C_ORDER->CurrentValue, 11));

			// C_KEYWORD
			$t_thongbao_mainlevel_ob->C_KEYWORD->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_KEYWORD->EditValue = ew_HtmlEncode($t_thongbao_mainlevel_ob->C_KEYWORD->CurrentValue);

			// C_USER_EDIT
			// C_EDIT_TIME
			// FK_NGUOIDUNG_ID
			// C_NOTICE_HIT

			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không nổi bật");
			$arwrk[] = array("1", "Nổi bật");
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->EditValue = $arwrk;
                        
                        // C_FILEANH
			$t_thongbao_mainlevel_ob->C_FILEANH->EditCustomAttributes = "";
			$t_thongbao_mainlevel_ob->C_FILEANH->EditValue = ew_HtmlEncode($t_thongbao_mainlevel_ob->C_FILEANH->CurrentValue);

			// Edit refer script
			// FK_CONGTY_ID

			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->HrefValue = "";

			// FK_DOITUONG_ID
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->HrefValue = "";

			// C_TITLE
			$t_thongbao_mainlevel_ob->C_TITLE->HrefValue = "";

			// C_CONTENT
			$t_thongbao_mainlevel_ob->C_CONTENT->HrefValue = "";

			// C_END_DATE
			$t_thongbao_mainlevel_ob->C_END_DATE->HrefValue = "";

			// C_BEGIN_DATE
			$t_thongbao_mainlevel_ob->C_BEGIN_DATE->HrefValue = "";

			// C_ACTIVE
			$t_thongbao_mainlevel_ob->C_ACTIVE->HrefValue = "";

			// C_ORDER
			$t_thongbao_mainlevel_ob->C_ORDER->HrefValue = "";

			// C_KEYWORD
			$t_thongbao_mainlevel_ob->C_KEYWORD->HrefValue = "";

			// C_USER_EDIT
			$t_thongbao_mainlevel_ob->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->HrefValue = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->HrefValue = "";
                        
			// PK_CHUYENMUC_ID
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->HrefValue = "";

			// C_NOTICE_HIT
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_thongbao_mainlevel_ob->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_thongbao_mainlevel_ob->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_thongbao_mainlevel_ob;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
                
              
		if ($t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->FldCaption();
		}
		if ($t_thongbao_mainlevel_ob->C_ACTIVE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainlevel_ob->C_ACTIVE->FldCaption();
		}
		if (!is_null($t_thongbao_mainlevel_ob->C_ORDER->FormValue) && $t_thongbao_mainlevel_ob->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainlevel_ob->C_ORDER->FldCaption();
		}
		if (!ew_CheckEuroDate($t_thongbao_mainlevel_ob->C_ORDER->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $t_thongbao_mainlevel_ob->C_ORDER->FldErrMsg();
		}
		if ($t_thongbao_mainlevel_ob->C_NOTICE_HIT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainlevel_ob->C_NOTICE_HIT->FldCaption();
		}
                
                if ($t_thongbao_mainlevel_ob->C_NOTICE_HIT->FormValue == "1") {
                    	if (!is_null($t_thongbao_mainlevel_ob->C_FILEANH->FormValue) && $t_thongbao_mainlevel_ob->C_FILEANH->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_mainlevel_ob->C_FILEANH->FldCaption();
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
		global $conn, $Security, $Language, $t_thongbao_mainlevel_ob;
		$sFilter = $t_thongbao_mainlevel_ob->KeyFilter();
		$t_thongbao_mainlevel_ob->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_mainlevel_ob->SQL();
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
			$t_thongbao_mainlevel_ob->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

			// FK_DOITUONG_ID
			$t_thongbao_mainlevel_ob->FK_DOITUONG_ID->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->FK_DOITUONG_ID->CurrentValue, NULL, FALSE);

			// C_ACTIVE
			$t_thongbao_mainlevel_ob->C_ACTIVE->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->C_ACTIVE->CurrentValue, NULL, FALSE);

			// C_ORDER
			$t_thongbao_mainlevel_ob->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_mainlevel_ob->C_ORDER->CurrentValue, 11, FALSE), NULL);

			// C_KEYWORD
			$t_thongbao_mainlevel_ob->C_KEYWORD->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->C_KEYWORD->CurrentValue, NULL, FALSE);

			// C_USER_EDIT
			$t_thongbao_mainlevel_ob->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_thongbao_mainlevel_ob->C_USER_EDIT->DbValue;

			// C_EDIT_TIME
			$t_thongbao_mainlevel_ob->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_thongbao_mainlevel_ob->C_EDIT_TIME->DbValue;

			// FK_NGUOIDUNG_ID
			$t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['FK_NGUOIDUNG_ID'] =& $t_thongbao_mainlevel_ob->FK_NGUOIDUNG_ID->DbValue;

			// C_NOTICE_HIT
			$t_thongbao_mainlevel_ob->C_NOTICE_HIT->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue, NULL, FALSE);
                        
                        // PK_CHUYENMUC_ID
			$t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->PK_CHUYENMUC_ID->CurrentValue, NULL, FALSE);
                        
                        if ($t_thongbao_mainlevel_ob->C_NOTICE_HIT->CurrentValue ==1)
                        {   
                        // C_FILEANH
			 $t_thongbao_mainlevel_ob->C_FILEANH->SetDbValueDef($rsnew, $t_thongbao_mainlevel_ob->C_FILEANH->CurrentValue, NULL, FALSE);
                        } else 
                        {
                            // C_FILEANH
			  $t_thongbao_mainlevel_ob->C_FILEANH->SetDbValueDef($rsnew, NULL, NULL, FALSE); 
                        }   
                        
                        //gui mail cho thietke add code by hungdq
                        $C_SENDMAIL =ew_HtmlEncode($_POST['x_C_SENDMAIL']);
                        $CONTENT_MAIL =ew_HtmlEncode($_POST['x_C_CONTENT_MAIL']);
                        IF ($C_SENDMAIL ==1)
                        {
                                $subject = "HPU - Design Hot Report";
                                $noidung = $t_thongbao_mainlevel_ob->C_TITLE->CurrentValue;
                                $hinhanh = $CONTENT_MAIL;
                                $hotentacgia =CurrentFullUserName();
                                $mailtacgia =CurrentEmail();
                                $sEmail = "thaont@hpu.edu.vn ";// nguoi nhan
                                $bEmailSent = FALSE;
                                $bValidEmail = FALSE;
                                $Cc= "hpudesign@gmail.com"; //mail CC
                                if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;

                                        if ($bValidEmail) {
                                        $Email = new cEmail();
                                        $Email->Load("txt/report.txt");
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
                        
                        
			// Call Row Updating event
			$bUpdateRow = $t_thongbao_mainlevel_ob->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
                                
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($t_thongbao_mainlevel_ob->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_thongbao_mainlevel_ob->CancelMessage <> "") {
					$this->setMessage($t_thongbao_mainlevel_ob->CancelMessage);
					$t_thongbao_mainlevel_ob->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_thongbao_mainlevel_ob->Row_Updated($rsold, $rsnew);
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
