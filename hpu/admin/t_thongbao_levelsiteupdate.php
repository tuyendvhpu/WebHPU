<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_thongbao_levelsiteinfo.php" ?>
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
$t_thongbao_levelsite_update = new ct_thongbao_levelsite_update();
$Page =& $t_thongbao_levelsite_update;

// Page init
$t_thongbao_levelsite_update->Page_Init();

// Page main
$t_thongbao_levelsite_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_thongbao_levelsite_update = new ew_Page("t_thongbao_levelsite_update");

// page properties
t_thongbao_levelsite_update.PageID = "update"; // page ID
t_thongbao_levelsite_update.FormID = "ft_thongbao_levelsiteupdate"; // form ID
var EW_PAGE_ID = t_thongbao_levelsite_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_thongbao_levelsite_update.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_C_NOTICE_HIT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_thongbao_levelsite->C_NOTICE_HIT->FldCaption()) ?>");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_thongbao_levelsite_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_thongbao_levelsite_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_thongbao_levelsite_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_thongbao_levelsite_update.ValidateRequired = false; // no JavaScript validation
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
<p class="pheader"><?php echo $t_thongbao_levelsite->TableCaption() ?></p>
<a href="<?php echo $t_thongbao_levelsite->getReturnUrl() ?>"><?php echo $Language->Phrase("BackToList") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_thongbao_levelsite_update->ShowMessage();
?>
<form name="ft_thongbao_levelsiteupdate" id="ft_thongbao_levelsiteupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_thongbao_levelsite_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_thongbao_levelsite">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_thongbao_levelsite_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_thongbao_levelsite_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
<?php if ($t_thongbao_levelsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_thongbao_levelsite->C_TITLE->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_TITLE->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
                        <input  type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_thongbao_levelsite->C_TITLE->FldTitle() ?>" size="100" maxlength="255" value="<?php echo $t_thongbao_levelsite->C_TITLE->EditValue ?>"<?php echo $t_thongbao_levelsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_thongbao_levelsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_CONTENT->Visible) { // C_CONTENT ?>
	<tr<?php echo $t_thongbao_levelsite->C_CONTENT->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_CONTENT->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_CONTENT->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_CONTENT->CellAttributes() ?>><span id="el_C_CONTENT">
<textarea name="x_C_CONTENT" id="x_C_CONTENT" title="<?php echo $t_thongbao_levelsite->C_CONTENT->FldTitle() ?>" cols="35" rows="4"<?php echo $t_thongbao_levelsite->C_CONTENT->EditAttributes() ?>><?php echo $t_thongbao_levelsite->C_CONTENT->EditValue ?></textarea>
<script type="text/javascript">
<!--
<?php if ($t_thongbao_levelsite->C_CONTENT->ReadOnly) { ?>
new ew_ReadOnlyTextArea('x_C_CONTENT', 35*_width_multiplier, 4*_height_multiplier);
<?php } else { ?>ew_DHTMLEditors.push(new ew_DHTMLEditor("x_C_CONTENT", function() {
	var oCKeditor = CKEDITOR.replace('x_C_CONTENT', { width: 35*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
<?php } ?>
-->
</script>
</span><?php echo $t_thongbao_levelsite->C_CONTENT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_thongbao_levelsite->C_ACTIVE->RowAttributes ?>>

		<td<?php echo $t_thongbao_levelsite->C_ACTIVE->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_ACTIVE->CellAttributes() ?>><span id="el_C_ACTIVE">
<div id="tp_x_C_ACTIVE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_levelsite->C_ACTIVE->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_ACTIVE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_ACTIVE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_ACTIVE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE" id="x_C_ACTIVE" title="<?php echo $t_thongbao_levelsite->C_ACTIVE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_ACTIVE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_levelsite->C_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_PUBLISH->Visible) { // C_PUBLISH ?>
	<tr<?php echo $t_thongbao_levelsite->C_PUBLISH->RowAttributes ?>>
		
		<td<?php echo $t_thongbao_levelsite->C_PUBLISH->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_PUBLISH->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_PUBLISH->CellAttributes() ?>><span id="el_C_PUBLISH">
<div id="tp_x_C_PUBLISH" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_levelsite->C_PUBLISH->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_PUBLISH->EditAttributes() ?>></label></div>
<div id="dsl_x_C_PUBLISH" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_PUBLISH->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_PUBLISH->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_PUBLISH" id="x_C_PUBLISH" title="<?php echo $t_thongbao_levelsite->C_PUBLISH->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_PUBLISH->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
 <i>(* giá trị chỉ được thiết lập khi trạng thái Levelsite được kích hoạt) </i>   
</div>
</span><?php echo $t_thongbao_levelsite->C_PUBLISH->CustomMsg ?>
            
                </td>
	</tr>
<?php } ?>

<?php if ($t_thongbao_levelsite->C_BEGIN_DATE->Visible) { // C_BEGIN_DATE ?>
	<tr<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->RowAttributes ?>>
		
		<td<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_BEGIN_DATE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->CellAttributes() ?>><span id="el_C_BEGIN_DATE">
<input type="text" name="x_C_BEGIN_DATE" id="x_C_BEGIN_DATE" title="<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->FldTitle() ?>" value="<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->EditValue ?>"<?php echo $t_thongbao_levelsite->C_BEGIN_DATE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_BEGIN_DATE" name="cal_x_C_BEGIN_DATE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_BEGIN_DATE", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_BEGIN_DATE" // button id
});
</script>
</span><?php echo $t_thongbao_levelsite->C_BEGIN_DATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_END_DATE->Visible) { // C_END_DATE ?>
	<tr<?php echo $t_thongbao_levelsite->C_END_DATE->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_END_DATE->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_END_DATE->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_END_DATE->CellAttributes() ?>><span id="el_C_END_DATE">
<input type="text" name="x_C_END_DATE" id="x_C_END_DATE" title="<?php echo $t_thongbao_levelsite->C_END_DATE->FldTitle() ?>" value="<?php echo $t_thongbao_levelsite->C_END_DATE->EditValue ?>"<?php echo $t_thongbao_levelsite->C_END_DATE->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_END_DATE" name="cal_x_C_END_DATE" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_END_DATE", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_END_DATE" // button id
});
</script>
</span><?php echo $t_thongbao_levelsite->C_END_DATE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_thongbao_levelsite->C_ORDER->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_ORDER->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_ORDER->CellAttributes() ?>><span id="el_C_ORDER">
<input type="text" name="x_C_ORDER" id="x_C_ORDER" title="<?php echo $t_thongbao_levelsite->C_ORDER->FldTitle() ?>" value="<?php echo $t_thongbao_levelsite->C_ORDER->EditValue ?>"<?php echo $t_thongbao_levelsite->C_ORDER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ORDER" name="cal_x_C_ORDER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ORDER", // input field id
	showsTime: true, // show time
	ifFormat: "%d/%m/%Y %H:%M:%S", // date format
	button: "cal_x_C_ORDER" // button id
});
</script>
</span><?php echo $t_thongbao_levelsite->C_ORDER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->CellAttributes() ?>><?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->FldCaption() ?></td>
                <td<?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->CellAttributes() ?>><span id="el_FK_ARRAY_CONGTY">
                        <table style="width:100%;">
                            <tr>
                                <td style="width:30%;">
                                      <select size="10" id="x_FK_ARRAY_CONGTY[]" name="x_FK_ARRAY_CONGTY[]" title="<?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->FldTitle() ?>" multiple="multiple"<?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->EditAttributes() ?>>
                                        <?php
                                        if (is_array($t_thongbao_levelsite->FK_ARRAY_CONGTY->EditValue)) {
                                                $arwrk = $t_thongbao_levelsite->FK_ARRAY_CONGTY->EditValue;
                                                $armultiwrk= explode(",", strval($t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue));
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
                                     <br/>
                                           <i> (* Giữ ctrl để chọn nhiều đơn vị liên quan)</i> 
                                        </span><?php echo $t_thongbao_levelsite->FK_ARRAY_CONGTY->CustomMsg ?>
                                                         
                                </td>
                                  <td style="width:60%;vertical-align: top">
                                    <b>Danh sách các đơn vị đã kích hoạt thông báo: </b>
                                                    <?php
                                        $sSqlWrk ="";$sWhereWrk ="";
                                        $sSqlWrk = "Select t_congty.C_TENCONGTY,
                                                        t_thongbao_mainlevel.FK_CONGTY_ID,
                                                        t_thongbao_mainlevel.PK_THONGBAO,
                                                        t_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL,
                                                        t_thongbao_mainlevel.C_ACTIVE
                                                        From t_thongbao_mainlevel Inner Join
                                                        t_congty On t_thongbao_mainlevel.FK_CONGTY_ID = t_congty.PK_MACONGTY";
                                        $sWhereWrk = "(t_thongbao_mainlevel.C_ACTIVE=1) AND (t_thongbao_mainlevel.PK_THONGBAO = ".$t_thongbao_levelsite->PK_THONGBAO->CurrentValue.") ORDER BY t_thongbao_mainlevel.C_ORDER DESC";
                                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                                        $rswrk = $conn->Execute($sSqlWrk);    
                                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                        if ($rswrk) $rswrk->Close();
                                        $rowswrk = count($arwrk);
                                        IF ($rowswrk >0 )
                                        {
                                            FOR($k=0; $k< $rowswrk;$k++)
                                            {
                                                echo "<a style=\"color:navy\">".$arwrk[$k]['C_TENCONGTY']."; </a> ";
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>            
                      
                </td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_KEYWORD->Visible) { // C_KEYWORD ?>
	<tr<?php echo $t_thongbao_levelsite->C_KEYWORD->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_KEYWORD->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_KEYWORD->FldCaption() ?></td>
		<td<?php echo $t_thongbao_levelsite->C_KEYWORD->CellAttributes() ?>><span id="el_C_KEYWORD">
<input type="text" name="x_C_KEYWORD" id="x_C_KEYWORD" title="<?php echo $t_thongbao_levelsite->C_KEYWORD->FldTitle() ?>" size="30" maxlength="255" value="<?php echo $t_thongbao_levelsite->C_KEYWORD->EditValue ?>"<?php echo $t_thongbao_levelsite->C_KEYWORD->EditAttributes() ?>>
</span><?php echo $t_thongbao_levelsite->C_KEYWORD->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_thongbao_levelsite->C_NOTICE_HIT->Visible) { // C_NOTICE_HIT ?>
	<tr<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->RowAttributes ?>>
		<td<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->CellAttributes() ?>><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->CellAttributes() ?>><span id="el_C_NOTICE_HIT">
<div id="tp_x_C_NOTICE_HIT" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldTitle() ?>" value="{value}"<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->EditAttributes() ?>></label></div>
<div id="dsl_x_C_NOTICE_HIT" repeatcolumn="5">
<?php
$arwrk = $t_thongbao_levelsite->C_NOTICE_HIT->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_NOTICE_HIT" id="x_C_NOTICE_HIT" title="<?php echo $t_thongbao_levelsite->C_NOTICE_HIT->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_thongbao_levelsite->C_NOTICE_HIT->CustomMsg ?></td>
	</tr>
<?php } ?>       
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("UpdateBtn")) ?>">
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
$t_thongbao_levelsite_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_thongbao_levelsite_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_thongbao_levelsite';

	// Page object name
	var $PageObjName = 't_thongbao_levelsite_update';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_thongbao_levelsite;
		if ($t_thongbao_levelsite->UseTokenInUrl) $PageUrl .= "t=" . $t_thongbao_levelsite->TableVar . "&"; // Add page token
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
		global $objForm, $t_thongbao_levelsite;
		if ($t_thongbao_levelsite->UseTokenInUrl) {
			if ($objForm)
				return ($t_thongbao_levelsite->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_thongbao_levelsite->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_thongbao_levelsite_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_thongbao_levelsite)
		$GLOBALS["t_thongbao_levelsite"] = new ct_thongbao_levelsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_thongbao_levelsite', TRUE);

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
		global $t_thongbao_levelsite;

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
			$this->Page_Terminate("t_thongbao_levelsitelist.php");
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
		global $objForm, $Language, $gsFormError, $t_thongbao_levelsite;

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
				$t_thongbao_levelsite->CurrentAction = $_POST["a_update"];

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
					$t_thongbao_levelsite->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_thongbao_levelsitelist.php"); // No records selected, return to list
		switch ($t_thongbao_levelsite->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_thongbao_levelsite->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_thongbao_levelsite->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_thongbao_levelsite;
		$t_thongbao_levelsite->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$t_thongbao_levelsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
                                        $t_thongbao_levelsite->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
					$t_thongbao_levelsite->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
					$t_thongbao_levelsite->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
					$t_thongbao_levelsite->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
					$t_thongbao_levelsite->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
					$t_thongbao_levelsite->C_ORDER->setDbValue($rs->fields('C_ORDER'));
					$t_thongbao_levelsite->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
					$t_thongbao_levelsite->C_TIME_PUBLISH->setDbValue($rs->fields('C_TIME_PUBLISH'));
                                        $t_thongbao_levelsite->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
					$t_thongbao_levelsite->C_KEYWORD->setDbValue($rs->fields('C_KEYWORD'));
                                        $t_thongbao_levelsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
					$t_thongbao_levelsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
					$t_thongbao_levelsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
					$t_thongbao_levelsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
                                        $t_thongbao_levelsite->C_NOTICE_HIT->setDbValue($rs->fields('C_NOTICE_HIT'));
                                        $t_thongbao_levelsite->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
                                        
				} else {
					if (!ew_CompareValue($t_thongbao_levelsite->C_TITLE->DbValue, $rs->fields('C_TITLE')))
						$t_thongbao_levelsite->C_TITLE->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_thongbao_levelsite->C_CONTENT->DbValue, $rs->fields('C_CONTENT')))
						$t_thongbao_levelsite->C_CONTENT->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_PUBLISH->DbValue, $rs->fields('C_PUBLISH')))
						$t_thongbao_levelsite->C_PUBLISH->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_ACTIVE->DbValue, $rs->fields('C_ACTIVE')))
						$t_thongbao_levelsite->C_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_BEGIN_DATE->DbValue, $rs->fields('C_BEGIN_DATE')))
						$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_END_DATE->DbValue, $rs->fields('C_END_DATE')))
						$t_thongbao_levelsite->C_END_DATE->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_ORDER->DbValue, $rs->fields('C_ORDER')))
						$t_thongbao_levelsite->C_ORDER->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->FK_NGUOIDUNG_ID->DbValue, $rs->fields('FK_NGUOIDUNG_ID')))
						$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_TIME_PUBLISH->DbValue, $rs->fields('C_TIME_PUBLISH')))
						$t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_thongbao_levelsite->FK_ARRAY_CONGTY->DbValue, $rs->fields('FK_ARRAY_CONGTY')))
						$t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue = NULL;
					if (!ew_CompareValue($t_thongbao_levelsite->C_KEYWORD->DbValue, $rs->fields('C_KEYWORD')))
						$t_thongbao_levelsite->C_KEYWORD->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_thongbao_levelsite->C_NOTICE_HIT->DbValue, $rs->fields('C_NOTICE_HIT')))
						$t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_thongbao_levelsite->FK_DOITUONG_ID->DbValue, $rs->fields('FK_DOITUONG_ID')))
						$t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_thongbao_levelsite;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_thongbao_levelsite->KeyFilter();
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
		global $t_thongbao_levelsite;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_thongbao_levelsite->PK_THONGBAO->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_thongbao_levelsite;
		$conn->BeginTrans();

		// Get old recordset
		$t_thongbao_levelsite->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_thongbao_levelsite->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_thongbao_levelsite->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $t_thongbao_levelsite;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_thongbao_levelsite;
		$t_thongbao_levelsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_thongbao_levelsite->C_TITLE->MultiUpdate = $objForm->GetValue("u_C_TITLE");
		$t_thongbao_levelsite->C_PUBLISH->setFormValue($objForm->GetValue("x_C_PUBLISH"));
		$t_thongbao_levelsite->C_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_PUBLISH");
		$t_thongbao_levelsite->C_ACTIVE->setFormValue($objForm->GetValue("x_C_ACTIVE"));
		$t_thongbao_levelsite->C_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE");
		$t_thongbao_levelsite->C_BEGIN_DATE->setFormValue($objForm->GetValue("x_C_BEGIN_DATE"));
		$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_levelsite->C_BEGIN_DATE->MultiUpdate = $objForm->GetValue("u_C_BEGIN_DATE");
		$t_thongbao_levelsite->C_END_DATE->setFormValue($objForm->GetValue("x_C_END_DATE"));
		$t_thongbao_levelsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_levelsite->C_END_DATE->MultiUpdate = $objForm->GetValue("u_C_END_DATE");
		$t_thongbao_levelsite->C_ORDER->setFormValue($objForm->GetValue("x_C_ORDER"));
		$t_thongbao_levelsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_ORDER->CurrentValue, 11);
		$t_thongbao_levelsite->C_ORDER->MultiUpdate = $objForm->GetValue("u_C_ORDER");
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_FK_NGUOIDUNG_ID"));
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->MultiUpdate = $objForm->GetValue("u_FK_NGUOIDUNG_ID");
		$t_thongbao_levelsite->C_TIME_PUBLISH->setFormValue($objForm->GetValue("x_C_TIME_PUBLISH"));
		$t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue, 7);
		$t_thongbao_levelsite->C_TIME_PUBLISH->MultiUpdate = $objForm->GetValue("u_C_TIME_PUBLISH");
                $t_thongbao_levelsite->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
		$t_thongbao_levelsite->FK_ARRAY_CONGTY->MultiUpdate = $objForm->GetValue("u_FK_ARRAY_CONGTY");
		$t_thongbao_levelsite->C_KEYWORD->setFormValue($objForm->GetValue("x_C_KEYWORD"));
		$t_thongbao_levelsite->C_KEYWORD->MultiUpdate = $objForm->GetValue("u_C_KEYWORD");
		$t_thongbao_levelsite->PK_THONGBAO->setFormValue($objForm->GetValue("x_PK_THONGBAO"));
                $t_thongbao_levelsite->C_CONTENT->setFormValue($objForm->GetValue("x_C_CONTENT"));
		$t_thongbao_levelsite->C_CONTENT->MultiUpdate = $objForm->GetValue("u_C_CONTENT");
                $t_thongbao_levelsite->C_NOTICE_HIT->setFormValue($objForm->GetValue("x_C_NOTICE_HIT"));
		$t_thongbao_levelsite->C_NOTICE_HIT->MultiUpdate = $objForm->GetValue("u_C_NOTICE_HIT");
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_thongbao_levelsite;
		$t_thongbao_levelsite->PK_THONGBAO->CurrentValue = $t_thongbao_levelsite->PK_THONGBAO->FormValue;
		$t_thongbao_levelsite->C_TITLE->CurrentValue = $t_thongbao_levelsite->C_TITLE->FormValue;
		$t_thongbao_levelsite->C_CONTENT->CurrentValue = $t_thongbao_levelsite->C_CONTENT->FormValue;
		$t_thongbao_levelsite->C_PUBLISH->CurrentValue = $t_thongbao_levelsite->C_PUBLISH->FormValue;
		$t_thongbao_levelsite->C_ACTIVE->CurrentValue = $t_thongbao_levelsite->C_ACTIVE->FormValue;
		$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue = $t_thongbao_levelsite->C_BEGIN_DATE->FormValue;
		$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue, 7);
		$t_thongbao_levelsite->C_END_DATE->CurrentValue = $t_thongbao_levelsite->C_END_DATE->FormValue;
		$t_thongbao_levelsite->C_END_DATE->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_END_DATE->CurrentValue, 7);
		$t_thongbao_levelsite->C_ORDER->CurrentValue = $t_thongbao_levelsite->C_ORDER->FormValue;
		$t_thongbao_levelsite->C_ORDER->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_ORDER->CurrentValue, 11);
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CurrentValue = $t_thongbao_levelsite->FK_NGUOIDUNG_ID->FormValue;
		$t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue = $t_thongbao_levelsite->C_TIME_PUBLISH->FormValue;
		$t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue = ew_UnFormatDateTime($t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue, 7);
                $t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue = $t_thongbao_levelsite->FK_ARRAY_CONGTY->FormValue;
		$t_thongbao_levelsite->C_KEYWORD->CurrentValue = $t_thongbao_levelsite->C_KEYWORD->FormValue;
                $t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue = $t_thongbao_levelsite->C_NOTICE_HIT->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_thongbao_levelsite;

		// Call Recordset Selecting event
		$t_thongbao_levelsite->Recordset_Selecting($t_thongbao_levelsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_thongbao_levelsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_thongbao_levelsite->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_thongbao_levelsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_thongbao_levelsite->Row_Rendering();

		// Common render codes for all row types
		// C_TITLE

		$t_thongbao_levelsite->C_TITLE->CellCssStyle = ""; $t_thongbao_levelsite->C_TITLE->CellCssClass = "";
		$t_thongbao_levelsite->C_TITLE->CellAttrs = array(); $t_thongbao_levelsite->C_TITLE->ViewAttrs = array(); $t_thongbao_levelsite->C_TITLE->EditAttrs = array();
                
                // C_CONTENT
		$t_thongbao_levelsite->C_CONTENT->CellCssStyle = ""; $t_thongbao_levelsite->C_CONTENT->CellCssClass = "";
		$t_thongbao_levelsite->C_CONTENT->CellAttrs = array(); $t_thongbao_levelsite->C_CONTENT->ViewAttrs = array(); $t_thongbao_levelsite->C_CONTENT->EditAttrs = array();

		// C_PUBLISH
		$t_thongbao_levelsite->C_PUBLISH->CellCssStyle = ""; $t_thongbao_levelsite->C_PUBLISH->CellCssClass = "";
		$t_thongbao_levelsite->C_PUBLISH->CellAttrs = array(); $t_thongbao_levelsite->C_PUBLISH->ViewAttrs = array(); $t_thongbao_levelsite->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$t_thongbao_levelsite->C_ACTIVE->CellCssStyle = ""; $t_thongbao_levelsite->C_ACTIVE->CellCssClass = "";
		$t_thongbao_levelsite->C_ACTIVE->CellAttrs = array(); $t_thongbao_levelsite->C_ACTIVE->ViewAttrs = array(); $t_thongbao_levelsite->C_ACTIVE->EditAttrs = array();

		// C_BEGIN_DATE
		$t_thongbao_levelsite->C_BEGIN_DATE->CellCssStyle = ""; $t_thongbao_levelsite->C_BEGIN_DATE->CellCssClass = "";
		$t_thongbao_levelsite->C_BEGIN_DATE->CellAttrs = array(); $t_thongbao_levelsite->C_BEGIN_DATE->ViewAttrs = array(); $t_thongbao_levelsite->C_BEGIN_DATE->EditAttrs = array();

		// C_END_DATE
		$t_thongbao_levelsite->C_END_DATE->CellCssStyle = ""; $t_thongbao_levelsite->C_END_DATE->CellCssClass = "";
		$t_thongbao_levelsite->C_END_DATE->CellAttrs = array(); $t_thongbao_levelsite->C_END_DATE->ViewAttrs = array(); $t_thongbao_levelsite->C_END_DATE->EditAttrs = array();

		// C_ORDER
		$t_thongbao_levelsite->C_ORDER->CellCssStyle = ""; $t_thongbao_levelsite->C_ORDER->CellCssClass = "";
		$t_thongbao_levelsite->C_ORDER->CellAttrs = array(); $t_thongbao_levelsite->C_ORDER->ViewAttrs = array(); $t_thongbao_levelsite->C_ORDER->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CellCssStyle = ""; $t_thongbao_levelsite->FK_NGUOIDUNG_ID->CellCssClass = "";
		$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CellAttrs = array(); $t_thongbao_levelsite->FK_NGUOIDUNG_ID->ViewAttrs = array(); $t_thongbao_levelsite->FK_NGUOIDUNG_ID->EditAttrs = array();

		// C_TIME_PUBLISH
		$t_thongbao_levelsite->C_TIME_PUBLISH->CellCssStyle = ""; $t_thongbao_levelsite->C_TIME_PUBLISH->CellCssClass = "";
		$t_thongbao_levelsite->C_TIME_PUBLISH->CellAttrs = array(); $t_thongbao_levelsite->C_TIME_PUBLISH->ViewAttrs = array(); $t_thongbao_levelsite->C_TIME_PUBLISH->EditAttrs = array();
                
                // FK_ARRAY_CONGTY
		$t_thongbao_levelsite->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_thongbao_levelsite->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_thongbao_levelsite->FK_ARRAY_CONGTY->CellAttrs = array(); $t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_thongbao_levelsite->FK_ARRAY_CONGTY->EditAttrs = array();

		// C_KEYWORD
		$t_thongbao_levelsite->C_KEYWORD->CellCssStyle = ""; $t_thongbao_levelsite->C_KEYWORD->CellCssClass = "";
		$t_thongbao_levelsite->C_KEYWORD->CellAttrs = array(); $t_thongbao_levelsite->C_KEYWORD->ViewAttrs = array(); $t_thongbao_levelsite->C_KEYWORD->EditAttrs = array();
                
                // C_NOTICE_HIT
		$t_thongbao_levelsite->C_NOTICE_HIT->CellCssStyle = ""; $t_thongbao_levelsite->C_NOTICE_HIT->CellCssClass = "";
		$t_thongbao_levelsite->C_NOTICE_HIT->CellAttrs = array(); $t_thongbao_levelsite->C_NOTICE_HIT->ViewAttrs = array(); $t_thongbao_levelsite->C_NOTICE_HIT->EditAttrs = array();
                
		if ($t_thongbao_levelsite->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_THONGBAO
			$t_thongbao_levelsite->PK_THONGBAO->ViewValue = $t_thongbao_levelsite->PK_THONGBAO->CurrentValue;
			$t_thongbao_levelsite->PK_THONGBAO->CssStyle = "";
			$t_thongbao_levelsite->PK_THONGBAO->CssClass = "";
			$t_thongbao_levelsite->PK_THONGBAO->ViewCustomAttributes = "";
                        
                        
			// C_CONTENT
			$t_thongbao_levelsite->C_CONTENT->ViewValue = $t_thongbao_levelsite->C_CONTENT->CurrentValue;
			$t_thongbao_levelsite->C_CONTENT->CssStyle = "";
			$t_thongbao_levelsite->C_CONTENT->CssClass = "";
			$t_thongbao_levelsite->C_CONTENT->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = $t_thongbao_levelsite->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_thongbao_levelsite->FK_CONGTY_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_CONGTY_ID->CssClass = "";
			$t_thongbao_levelsite->FK_CONGTY_ID->ViewCustomAttributes = "";

			// FK_DOITUONG_ID
			if (strval($t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = $t_thongbao_levelsite->FK_DOITUONG_ID->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->FK_DOITUONG_ID->ViewValue = NULL;
			}
			$t_thongbao_levelsite->FK_DOITUONG_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_DOITUONG_ID->CssClass = "";
			$t_thongbao_levelsite->FK_DOITUONG_ID->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->ViewValue = $t_thongbao_levelsite->C_TITLE->CurrentValue;
			$t_thongbao_levelsite->C_TITLE->CssStyle = "";
			$t_thongbao_levelsite->C_TITLE->CssClass = "";
			$t_thongbao_levelsite->C_TITLE->ViewCustomAttributes = "";

			// C_PUBLISH
			if (strval($t_thongbao_levelsite->C_PUBLISH->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_PUBLISH->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = "Khong active Mainsite";
						break;
					case "1":
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = "Active len Mainsite";
						break;
					default:
						$t_thongbao_levelsite->C_PUBLISH->ViewValue = $t_thongbao_levelsite->C_PUBLISH->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_PUBLISH->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_PUBLISH->CssStyle = "";
			$t_thongbao_levelsite->C_PUBLISH->CssClass = "";
			$t_thongbao_levelsite->C_PUBLISH->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_thongbao_levelsite->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_ACTIVE->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = "Khong active levelsite";
						break;
					case "1":
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = "active levelsite";
						break;
					default:
						$t_thongbao_levelsite->C_ACTIVE->ViewValue = $t_thongbao_levelsite->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_ACTIVE->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_ACTIVE->CssStyle = "";
			$t_thongbao_levelsite->C_ACTIVE->CssClass = "";
			$t_thongbao_levelsite->C_ACTIVE->ViewCustomAttributes = "";
                        
                        // FK_ARRAY_CONGTY
			if (strval($t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue);
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
					$t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewValue = $t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewValue = NULL;
			}
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->CssStyle = "";
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->CssClass = "";
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// C_KEYWORD
			$t_thongbao_levelsite->C_KEYWORD->ViewValue = $t_thongbao_levelsite->C_KEYWORD->CurrentValue;
			$t_thongbao_levelsite->C_KEYWORD->CssStyle = "";
			$t_thongbao_levelsite->C_KEYWORD->CssClass = "";
			$t_thongbao_levelsite->C_KEYWORD->ViewCustomAttributes = "";
                        
                        		// C_NOTICE_HIT
			if (strval($t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue) <> "") {
				switch ($t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue) {
					case "0":
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = "Khong noi bat";
						break;
					case "1":
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = "Noi bat";
						break;
					default:
						$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = $t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue;
				}
			} else {
				$t_thongbao_levelsite->C_NOTICE_HIT->ViewValue = NULL;
			}
			$t_thongbao_levelsite->C_NOTICE_HIT->CssStyle = "";
			$t_thongbao_levelsite->C_NOTICE_HIT->CssClass = "";
			$t_thongbao_levelsite->C_NOTICE_HIT->ViewCustomAttributes = "";

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewValue = $t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue;
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->ViewValue, 7);
			$t_thongbao_levelsite->C_BEGIN_DATE->CssStyle = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->CssClass = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->ViewCustomAttributes = "";

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->ViewValue = $t_thongbao_levelsite->C_END_DATE->CurrentValue;
			$t_thongbao_levelsite->C_END_DATE->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_END_DATE->ViewValue, 7);
			$t_thongbao_levelsite->C_END_DATE->CssStyle = "";
			$t_thongbao_levelsite->C_END_DATE->CssClass = "";
			$t_thongbao_levelsite->C_END_DATE->ViewCustomAttributes = "";

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->ViewValue = $t_thongbao_levelsite->C_ORDER->CurrentValue;
			$t_thongbao_levelsite->C_ORDER->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_ORDER->ViewValue, 11);
			$t_thongbao_levelsite->C_ORDER->CssStyle = "";
			$t_thongbao_levelsite->C_ORDER->CssClass = "";
			$t_thongbao_levelsite->C_ORDER->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_thongbao_levelsite->C_USER_ADD->ViewValue = $t_thongbao_levelsite->C_USER_ADD->CurrentValue;
			$t_thongbao_levelsite->C_USER_ADD->CssStyle = "";
			$t_thongbao_levelsite->C_USER_ADD->CssClass = "";
			$t_thongbao_levelsite->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_thongbao_levelsite->C_ADD_TIME->ViewValue = $t_thongbao_levelsite->C_ADD_TIME->CurrentValue;
			$t_thongbao_levelsite->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_ADD_TIME->ViewValue, 7);
			$t_thongbao_levelsite->C_ADD_TIME->CssStyle = "";
			$t_thongbao_levelsite->C_ADD_TIME->CssClass = "";
			$t_thongbao_levelsite->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_thongbao_levelsite->C_USER_EDIT->ViewValue = $t_thongbao_levelsite->C_USER_EDIT->CurrentValue;
			$t_thongbao_levelsite->C_USER_EDIT->CssStyle = "";
			$t_thongbao_levelsite->C_USER_EDIT->CssClass = "";
			$t_thongbao_levelsite->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_thongbao_levelsite->C_EDIT_TIME->ViewValue = $t_thongbao_levelsite->C_EDIT_TIME->CurrentValue;
			$t_thongbao_levelsite->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_EDIT_TIME->ViewValue, 7);
			$t_thongbao_levelsite->C_EDIT_TIME->CssStyle = "";
			$t_thongbao_levelsite->C_EDIT_TIME->CssClass = "";
			$t_thongbao_levelsite->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->ViewValue = $t_thongbao_levelsite->FK_NGUOIDUNG_ID->CurrentValue;
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CssStyle = "";
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->CssClass = "";
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TIME_PUBLISH
			$t_thongbao_levelsite->C_TIME_PUBLISH->ViewValue = $t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue;
			$t_thongbao_levelsite->C_TIME_PUBLISH->ViewValue = ew_FormatDateTime($t_thongbao_levelsite->C_TIME_PUBLISH->ViewValue, 7);
			$t_thongbao_levelsite->C_TIME_PUBLISH->CssStyle = "";
			$t_thongbao_levelsite->C_TIME_PUBLISH->CssClass = "";
			$t_thongbao_levelsite->C_TIME_PUBLISH->ViewCustomAttributes = "";

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->HrefValue = "";
			$t_thongbao_levelsite->C_TITLE->TooltipValue = "";

			// C_PUBLISH
			$t_thongbao_levelsite->C_PUBLISH->HrefValue = "";
			$t_thongbao_levelsite->C_PUBLISH->TooltipValue = "";

			// C_ACTIVE
			$t_thongbao_levelsite->C_ACTIVE->HrefValue = "";
			$t_thongbao_levelsite->C_ACTIVE->TooltipValue = "";

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->HrefValue = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->TooltipValue = "";

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->HrefValue = "";
			$t_thongbao_levelsite->C_END_DATE->TooltipValue = "";

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->HrefValue = "";
			$t_thongbao_levelsite->C_ORDER->TooltipValue = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->HrefValue = "";
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->TooltipValue = "";

			// C_TIME_PUBLISH
			$t_thongbao_levelsite->C_TIME_PUBLISH->HrefValue = "";
			$t_thongbao_levelsite->C_TIME_PUBLISH->TooltipValue = "";

			// FK_ARRAY_CONGTY
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->HrefValue = "";
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->TooltipValue = "";

			// C_KEYWORD
			$t_thongbao_levelsite->C_KEYWORD->HrefValue = "";
			$t_thongbao_levelsite->C_KEYWORD->TooltipValue = "";
		} elseif ($t_thongbao_levelsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_TITLE
			$t_thongbao_levelsite->C_TITLE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_TITLE->EditValue = ew_HtmlEncode($t_thongbao_levelsite->C_TITLE->CurrentValue);
                        
                        // C_CONTENT
			$t_thongbao_levelsite->C_CONTENT->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_CONTENT->EditValue = ew_HtmlEncode($t_thongbao_levelsite->C_CONTENT->CurrentValue);
                        
                        // C_NOTICE_HIT
			$t_thongbao_levelsite->C_NOTICE_HIT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_thongbao_levelsite->C_NOTICE_HIT->EditValue = $arwrk;

			// C_PUBLISH
			$t_thongbao_levelsite->C_PUBLISH->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			$t_thongbao_levelsite->C_PUBLISH->EditValue = $arwrk;

			// C_ACTIVE
			$t_thongbao_levelsite->C_ACTIVE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_thongbao_levelsite->C_ACTIVE->EditValue = $arwrk;

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_BEGIN_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue, 7));

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_END_DATE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_levelsite->C_END_DATE->CurrentValue, 7));

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_ORDER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_thongbao_levelsite->C_ORDER->CurrentValue, 7));

			// FK_NGUOIDUNG_ID
			// C_TIME_PUBLISH
			// Edit refer script
			// C_TITLE
                        
                        // FK_ARRAY_CONGTY
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty`";
			$sWhereWrk = "t_congty.PK_MACONGTY <>".$Security->CurrentUserOption();
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->EditValue = $arwrk;

			// C_KEYWORD
			$t_thongbao_levelsite->C_KEYWORD->EditCustomAttributes = "";
			$t_thongbao_levelsite->C_KEYWORD->EditValue = ew_HtmlEncode($t_thongbao_levelsite->C_KEYWORD->CurrentValue);

			$t_thongbao_levelsite->C_TITLE->HrefValue = "";

			// C_PUBLISH
			$t_thongbao_levelsite->C_PUBLISH->HrefValue = "";

			// C_ACTIVE
			$t_thongbao_levelsite->C_ACTIVE->HrefValue = "";

			// C_BEGIN_DATE
			$t_thongbao_levelsite->C_BEGIN_DATE->HrefValue = "";

			// C_END_DATE
			$t_thongbao_levelsite->C_END_DATE->HrefValue = "";

			// C_ORDER
			$t_thongbao_levelsite->C_ORDER->HrefValue = "";

			// FK_NGUOIDUNG_ID
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->HrefValue = "";

			// C_TIME_PUBLISH
			$t_thongbao_levelsite->C_TIME_PUBLISH->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_thongbao_levelsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_thongbao_levelsite->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_thongbao_levelsite;

		// Initialize form error message
		$gsFormError = "";
		

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
		
	
		if ($t_thongbao_levelsite->C_BEGIN_DATE->MultiUpdate <> "" && !is_null($t_thongbao_levelsite->C_BEGIN_DATE->FormValue) && $t_thongbao_levelsite->C_BEGIN_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_levelsite->C_BEGIN_DATE->FldCaption();
		}
		if ($t_thongbao_levelsite->C_BEGIN_DATE->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_levelsite->C_BEGIN_DATE->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_levelsite->C_BEGIN_DATE->FldErrMsg;
			}
		}
		if ($t_thongbao_levelsite->C_END_DATE->MultiUpdate <> "" && !is_null($t_thongbao_levelsite->C_END_DATE->FormValue) && $t_thongbao_levelsite->C_END_DATE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_levelsite->C_END_DATE->FldCaption();
		}
		if ($t_thongbao_levelsite->C_END_DATE->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_levelsite->C_END_DATE->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_levelsite->C_END_DATE->FldErrMsg;
			}
		}
		if ($t_thongbao_levelsite->C_ORDER->MultiUpdate <> "" && !is_null($t_thongbao_levelsite->C_ORDER->FormValue) && $t_thongbao_levelsite->C_ORDER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_thongbao_levelsite->C_ORDER->FldCaption();
		}
		if ($t_thongbao_levelsite->C_ORDER->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_thongbao_levelsite->C_ORDER->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_thongbao_levelsite->C_ORDER->FldErrMsg;
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
		global $conn, $Security, $Language, $t_thongbao_levelsite;
		$sFilter = $t_thongbao_levelsite->KeyFilter();
		$t_thongbao_levelsite->CurrentFilter = $sFilter;
		$sSql = $t_thongbao_levelsite->SQL();
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
			// C_CONTENT
						
			$t_thongbao_levelsite->C_CONTENT->SetDbValueDef($rsnew, $t_thongbao_levelsite->C_CONTENT->CurrentValue, NULL, FALSE);
					

			// C_PUBLISH
                        $t_thongbao_levelsite->C_PUBLISH->SetDbValueDef($rsnew, $t_thongbao_levelsite->C_PUBLISH->CurrentValue, NULL, FALSE);
			
                        if ($t_thongbao_levelsite->C_PUBLISH->CurrentValue == "1") {
                        // FK_NGUOIDUNG_ID			
			$t_thongbao_levelsite->FK_NGUOIDUNG_ID->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['FK_NGUOIDUNG_ID'] =& $t_thongbao_levelsite->FK_NGUOIDUNG_ID->DbValue;
			// C_TIME_PUBLISH			
			$t_thongbao_levelsite->C_TIME_PUBLISH->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_TIME_PUBLISH'] =& $t_thongbao_levelsite->C_TIME_PUBLISH->DbValue;
 
                        }

			// C_ACTIVE
						
			$t_thongbao_levelsite->C_ACTIVE->SetDbValueDef($rsnew, $t_thongbao_levelsite->C_ACTIVE->CurrentValue, NULL, FALSE);

			// C_BEGIN_DATE
						
			$t_thongbao_levelsite->C_BEGIN_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue, 7, FALSE), NULL);
			

			// C_END_DATE
						
			$t_thongbao_levelsite->C_END_DATE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_levelsite->C_END_DATE->CurrentValue, 7, FALSE), NULL);
		

			// C_ORDER
						
			$t_thongbao_levelsite->C_ORDER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_thongbao_levelsite->C_ORDER->CurrentValue, 7, FALSE), NULL);
                        
                        // FK_ARRAY_CONGTY
						
			$t_thongbao_levelsite->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);
			

			// C_KEYWORD
				
			$t_thongbao_levelsite->C_KEYWORD->SetDbValueDef($rsnew, $t_thongbao_levelsite->C_KEYWORD->CurrentValue, NULL, FALSE);
                        
                        // C_NOTICE_HIT
					
			$t_thongbao_levelsite->C_NOTICE_HIT->SetDbValueDef($rsnew, $t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue, NULL, FALSE);
			

			// Call Row Updating event
			$bUpdateRow = $t_thongbao_levelsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
                                // add code by hungdq thiet  bang ghi trung gian 
                                $sql = "DELETE FROM t_thongbao_mainlevel WHERE PK_THONGBAO = ".$t_thongbao_levelsite->PK_THONGBAO->CurrentValue;	
				$Delete_ID=$conn->Execute($sql);
                                 if (strval($t_thongbao_levelsite->C_ACTIVE->CurrentValue) == 1) {
                                     // thiet lap ban ghi chinh
                                    $sql_primary= "INSERT INTO t_thongbao_mainlevel (PK_THONGBAO,FK_CONGTY_ID,FK_DOITUONG_ID,C_PUBLISH,C_TIME_PUBLISH,C_ACTIVE,C_ORDER,C_KEYWORD,C_NOTICE_HIT,C_BEGIN_DATE,C_END_DATE,C_USER_ADD,C_ADD_TIME,C_USER_EDIT,C_EDIT_TIME,FK_NGUOIDUNG_ID,FK_CONGTY_SEND,C_TYPE) 
                                                VALUES ('".$t_thongbao_levelsite->PK_THONGBAO->CurrentValue."','".$Security->CurrentUserOption()."','".$rs->fields('FK_DOITUONG_ID')."',
                                                        '".$t_thongbao_levelsite->C_PUBLISH->CurrentValue."','".$t_thongbao_levelsite->C_TIME_PUBLISH->CurrentValue."','".$t_thongbao_levelsite->C_ACTIVE->CurrentValue."',
                                                        '".$t_thongbao_levelsite->C_ORDER->CurrentValue."','".$t_thongbao_levelsite->C_KEYWORD->CurrentValue."','".$t_thongbao_levelsite->C_NOTICE_HIT->CurrentValue."',
                                                        '".$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue."','".$t_thongbao_levelsite->C_END_DATE->CurrentValue."',
                                                        '".$rs->fields('C_USER_ADD')."','".$rs->fields('C_ADD_TIME')."',
                                                        '".$rs->fields('C_USER_EDIT')."','".$rs->fields('C_EDIT_TIME')."',
                                                        '".CurrentUserID()."','".$Security->CurrentUserOption()."','0') ";
                                    $Add_ID_primary=$conn->Execute($sql_primary); 
                                     // thiet lap mang  cac cong ty lien quan
                                     if ($t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue <> null )
                                     {
                                            $arwrk = explode(",", $t_thongbao_levelsite->FK_ARRAY_CONGTY->CurrentValue);
                                            foreach ($arwrk as $wrk) {
                                                $sql = "INSERT INTO t_thongbao_mainlevel (PK_THONGBAO,FK_CONGTY_ID,FK_DOITUONG_ID,C_ACTIVE,C_ORDER,C_KEYWORD,C_BEGIN_DATE,C_END_DATE,C_USER_ADD,C_ADD_TIME,C_USER_EDIT,C_EDIT_TIME,FK_NGUOIDUNG_ID,FK_CONGTY_SEND,C_TYPE) 
                                                        VALUES ( '".$t_thongbao_levelsite->PK_THONGBAO->CurrentValue."','".ew_AdjustSql(trim($wrk))."','','0',
                                                                '".$t_thongbao_levelsite->C_ORDER->CurrentValue."','',
                                                                '".$t_thongbao_levelsite->C_BEGIN_DATE->CurrentValue."','".$t_thongbao_levelsite->C_END_DATE->CurrentValue."',
                                                                '".$rs->fields('C_USER_ADD')."','".$rs->fields('C_ADD_TIME')."',
                                                                '".$rs->fields('C_USER_EDIT')."','".$rs->fields('C_EDIT_TIME')."',
                                                                '','".$Security->CurrentUserOption()."','1') ";
                                            $Add_ID=$conn->Execute($sql);  
                                            }
                                     } 
                                    
                                 } 
                                 // end
                              
				$EditRow = $conn->Execute($t_thongbao_levelsite->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_thongbao_levelsite->CancelMessage <> "") {
					$this->setMessage($t_thongbao_levelsite->CancelMessage);
					$t_thongbao_levelsite->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_thongbao_levelsite->Row_Updated($rsold, $rsnew);
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
