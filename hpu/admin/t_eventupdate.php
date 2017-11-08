<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_eventinfo.php" ?>
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
$t_event_update = new ct_event_update();
$Page =& $t_event_update;

// Page init
$t_event_update->Page_Init();

// Page main
$t_event_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_update = new ew_Page("t_event_update");

// page properties
t_event_update.PageID = "update"; // page ID
t_event_update.FormID = "ft_eventupdate"; // form ID
var EW_PAGE_ID = t_event_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_event_update.ValidateForm = function(fobj) {
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
		 elm = fobj.elements["x" + infix + "_C_EVENT_NAME"];
		if (elm && !ew_HasValue(elm))
		return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_EVENT_NAME->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_TYPE_EVENT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_TYPE_EVENT->FldCaption()) ?>");
                C_TYPE_EVENT=document.getElementById('x_C_TYPE_EVENT');
                C_TYPE_EVENT=C_TYPE_EVENT.options[C_TYPE_EVENT.selectedIndex].value;
                if (C_TYPE_EVENT == 1)
                {
                        elm = fobj.elements["x" + infix + "_C_POST"];
		        if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_POST->FldCaption()) ?>");
                }
                if (C_TYPE_EVENT == 2)
                {
                        elm = fobj.elements["x" + infix + "_FK_ARRAY_TINBAI[]"];
		        if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->FK_ARRAY_TINBAI->FldCaption()) ?>");
                }
             
		elm = fobj.elements["x" + infix + "_C_URL_IMAGES"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_URL_IMAGES->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_URL_LINK"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_URL_LINK->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_BEGIN"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_DATETIME_BEGIN->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_BEGIN"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event->C_DATETIME_BEGIN->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_END"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_DATETIME_END->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_DATETIME_END"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event->C_DATETIME_END->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_ODER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_ODER->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_C_ODER"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_event->C_ODER->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_C_SEND_MAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_event->C_SEND_MAIL->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
t_event_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_update.ValidateRequired = false; // no JavaScript validation
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
<link href="js/select2.css" rel="stylesheet">
<script src="js/select2.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
              $(".x_FK_ARRAY_TINBAI").select2();
	      $("#x_C_TYPE_EVENT").change(function()
		{
                        var message_index
			message_index = $("#x_C_TYPE_EVENT").val();
			if (message_index == 1)
                        {    
                        $("#dsl_x_C_POST").show();
                       $(".x_FK_ARRAY_TINBAI").prop('disabled', true);
                        } else 
                        if (message_index == 2)
                        {
                         $("#dsl_x_C_POST").hide();
                       // $(".x_FK_ARRAY_TINBAI").show();
                        $(".x_FK_ARRAY_TINBAI").removeAttr('disabled');
                        }  else 
                        if (message_index == 3)    
                        {
                        $("#dsl_x_C_POST").hide();
                        $(".x_FK_ARRAY_TINBAI").prop('disabled', true);
                        } 
		});
        });
      

        
    </script>
<p class="pheader"><span class="phpmaker">&nbsp;<?php echo $t_event->TableCaption() ?><br></span></p>
<a href="<?php echo $t_event->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_update->ShowMessage();
?>
<form name="ft_eventupdate" id="ft_eventupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_event_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_event">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_event_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_event_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo $Language->Phrase("UpdateValue") ?><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
<?php if ($t_event->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<tr<?php echo $t_event->C_EVENT_NAME->RowAttributes ?>>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>>
                    <input checked="true" type="checkbox" name="u_C_EVENT_NAME" id="u_C_EVENT_NAME" value="1"<?php echo ($t_event->C_EVENT_NAME->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>><?php echo $t_event->C_EVENT_NAME->FldCaption() ?></td>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>><span id="el_C_EVENT_NAME">
<input size="80" type="text" name="x_C_EVENT_NAME" id="x_C_EVENT_NAME" title="<?php echo $t_event->C_EVENT_NAME->FldTitle() ?>" value="<?php echo $t_event->C_EVENT_NAME->EditValue ?>"<?php echo $t_event->C_EVENT_NAME->EditAttributes() ?>>
</span><?php echo $t_event->C_EVENT_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<tr<?php echo $t_event->C_TYPE_EVENT->RowAttributes ?>>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_TYPE_EVENT" id="u_C_TYPE_EVENT" value="1"<?php echo ($t_event->C_TYPE_EVENT->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></td>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>><span id="el_C_TYPE_EVENT">
<select id="x_C_TYPE_EVENT" name="x_C_TYPE_EVENT" title="<?php echo $t_event->C_TYPE_EVENT->FldTitle() ?>"<?php echo $t_event->C_TYPE_EVENT->EditAttributes() ?>>
<?php
if (is_array($t_event->C_TYPE_EVENT->EditValue)) {
	$arwrk = $t_event->C_TYPE_EVENT->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_TYPE_EVENT->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $t_event->C_TYPE_EVENT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_POST->Visible) { // C_POST ?>
	<tr<?php echo $t_event->C_POST->RowAttributes ?>>
		<td<?php echo $t_event->C_POST->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_POST" id="u_C_POST" value="1"<?php echo ($t_event->C_POST->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_POST->CellAttributes() ?>><?php echo $t_event->C_POST->FldCaption() ?></td>
		<td<?php echo $t_event->C_POST->CellAttributes() ?>><span id="el_C_POST">
<div id="tp_x_C_POST" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_POST" id="x_C_POST" title="<?php echo $t_event->C_POST->FldTitle() ?>" value="{value}"<?php echo $t_event->C_POST->EditAttributes() ?>></label></div>
<div id="dsl_x_C_POST" repeatcolumn="5">
<?php
$arwrk = $t_event->C_POST->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_POST->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_POST" id="x_C_POST" title="<?php echo $t_event->C_POST->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event->C_POST->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_event->C_POST->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<tr<?php echo $t_event->C_URL_IMAGES->RowAttributes ?>>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_URL_IMAGES" id="u_C_URL_IMAGES" value="1"<?php echo ($t_event->C_URL_IMAGES->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>><?php echo $t_event->C_URL_IMAGES->FldCaption() ?></td>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>><span id="el_C_URL_IMAGES">
<input type="text" name="x_C_URL_IMAGES" id="x_C_URL_IMAGES" title="<?php echo $t_event->C_URL_IMAGES->FldTitle() ?>" size="80" value="<?php echo $t_event->C_URL_IMAGES->EditValue ?>"<?php echo $t_event->C_URL_IMAGES->EditAttributes() ?>>
</span><?php echo $t_event->C_URL_IMAGES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_URL_LINK->Visible) { // C_URL_LINK ?>
	<tr<?php echo $t_event->C_URL_LINK->RowAttributes ?>>
		<td<?php echo $t_event->C_URL_LINK->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_URL_LINK" id="u_C_URL_LINK" value="1"<?php echo ($t_event->C_URL_LINK->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_URL_LINK->CellAttributes() ?>><?php echo $t_event->C_URL_LINK->FldCaption() ?></td>
		<td<?php echo $t_event->C_URL_LINK->CellAttributes() ?>><span id="el_C_URL_LINK">
<input checked="true" type="text" name="x_C_URL_LINK" id="x_C_URL_LINK" title="<?php echo $t_event->C_URL_LINK->FldTitle() ?>" size="80" value="<?php echo $t_event->C_URL_LINK->EditValue ?>"<?php echo $t_event->C_URL_LINK->EditAttributes() ?>>
</span><?php echo $t_event->C_URL_LINK->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<tr<?php echo $t_event->C_DATETIME_BEGIN->RowAttributes ?>>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_DATETIME_BEGIN" id="u_C_DATETIME_BEGIN" value="1"<?php echo ($t_event->C_DATETIME_BEGIN->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?></td>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>><span id="el_C_DATETIME_BEGIN">
<input checked="true" type="text" name="x_C_DATETIME_BEGIN" id="x_C_DATETIME_BEGIN" title="<?php echo $t_event->C_DATETIME_BEGIN->FldTitle() ?>" value="<?php echo $t_event->C_DATETIME_BEGIN->EditValue ?>"<?php echo $t_event->C_DATETIME_BEGIN->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_BEGIN" name="cal_x_C_DATETIME_BEGIN" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_BEGIN", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_BEGIN" // button id
});
</script>
</span><?php echo $t_event->C_DATETIME_BEGIN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_DATETIME_END->Visible) { // C_DATETIME_END ?>
	<tr<?php echo $t_event->C_DATETIME_END->RowAttributes ?>>
		<td<?php echo $t_event->C_DATETIME_END->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_DATETIME_END" id="u_C_DATETIME_END" value="1"<?php echo ($t_event->C_DATETIME_END->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_DATETIME_END->CellAttributes() ?>><?php echo $t_event->C_DATETIME_END->FldCaption() ?></td>
		<td<?php echo $t_event->C_DATETIME_END->CellAttributes() ?>><span id="el_C_DATETIME_END">
<input type="text" name="x_C_DATETIME_END" id="x_C_DATETIME_END" title="<?php echo $t_event->C_DATETIME_END->FldTitle() ?>" value="<?php echo $t_event->C_DATETIME_END->EditValue ?>"<?php echo $t_event->C_DATETIME_END->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_END" name="cal_x_C_DATETIME_END" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_END", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_END" // button id
});
</script>
</span><?php echo $t_event->C_DATETIME_END->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ODER->Visible) { // C_ODER ?>
	<tr<?php echo $t_event->C_ODER->RowAttributes ?>>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_ODER" id="u_C_ODER" value="1"<?php echo ($t_event->C_ODER->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>><?php echo $t_event->C_ODER->FldCaption() ?></td>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>><span id="el_C_ODER">
<input type="text" name="x_C_ODER" id="x_C_ODER" title="<?php echo $t_event->C_ODER->FldTitle() ?>" value="<?php echo $t_event->C_ODER->EditValue ?>"<?php echo $t_event->C_ODER->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_ODER" name="cal_x_C_ODER" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_ODER", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_ODER" // button id
});
</script>
</span><?php echo $t_event->C_ODER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_event->C_NOTE->RowAttributes ?>>
		<td<?php echo $t_event->C_NOTE->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_NOTE" id="u_C_NOTE" value="1"<?php echo ($t_event->C_NOTE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_NOTE->CellAttributes() ?>><?php echo $t_event->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_event->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
<textarea name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_event->C_NOTE->FldTitle() ?>" cols="35" rows="4"<?php echo $t_event->C_NOTE->EditAttributes() ?>><?php echo $t_event->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_event->C_NOTE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_event->C_USER_ADD->RowAttributes ?>>
		<td<?php echo $t_event->C_USER_ADD->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_USER_ADD" id="u_C_USER_ADD" value="1"<?php echo ($t_event->C_USER_ADD->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_USER_ADD->CellAttributes() ?>><?php echo $t_event->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_event->C_USER_ADD->CellAttributes() ?>><span id="el_C_USER_ADD">
</span><?php echo $t_event->C_USER_ADD->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_event->C_ADD_TIME->RowAttributes ?>>
		<td<?php echo $t_event->C_ADD_TIME->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_ADD_TIME" id="u_C_ADD_TIME" value="1"<?php echo ($t_event->C_ADD_TIME->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_ADD_TIME->CellAttributes() ?>><?php echo $t_event->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_event->C_ADD_TIME->CellAttributes() ?>><span id="el_C_ADD_TIME">
</span><?php echo $t_event->C_ADD_TIME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_event->C_USER_EDIT->RowAttributes ?>>
		<td<?php echo $t_event->C_USER_EDIT->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_USER_EDIT" id="u_C_USER_EDIT" value="1"<?php echo ($t_event->C_USER_EDIT->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_USER_EDIT->CellAttributes() ?>><?php echo $t_event->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_event->C_USER_EDIT->CellAttributes() ?>><span id="el_C_USER_EDIT">
</span><?php echo $t_event->C_USER_EDIT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_event->C_EDIT_TIME->RowAttributes ?>>
		<td<?php echo $t_event->C_EDIT_TIME->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_EDIT_TIME" id="u_C_EDIT_TIME" value="1"<?php echo ($t_event->C_EDIT_TIME->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_EDIT_TIME->CellAttributes() ?>><?php echo $t_event->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_event->C_EDIT_TIME->CellAttributes() ?>><span id="el_C_EDIT_TIME">
</span><?php echo $t_event->C_EDIT_TIME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
	<tr<?php echo $t_event->C_ACTIVE_LEVELSITE->RowAttributes ?>>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_ACTIVE_LEVELSITE" id="u_C_ACTIVE_LEVELSITE" value="1"<?php echo ($t_event->C_ACTIVE_LEVELSITE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>><span id="el_C_ACTIVE_LEVELSITE">
<div id="tp_x_C_ACTIVE_LEVELSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="{value}"<?php echo $t_event->C_ACTIVE_LEVELSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_LEVELSITE" repeatcolumn="5">
<?php
$arwrk = $t_event->C_ACTIVE_LEVELSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_ACTIVE_LEVELSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_LEVELSITE" id="x_C_ACTIVE_LEVELSITE" title="<?php echo $t_event->C_ACTIVE_LEVELSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event->C_ACTIVE_LEVELSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_event->C_ACTIVE_LEVELSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_TIME_ACTIVE->Visible) { // C_TIME_ACTIVE ?>
	<tr<?php echo $t_event->C_TIME_ACTIVE->RowAttributes ?>>
		<td<?php echo $t_event->C_TIME_ACTIVE->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_C_TIME_ACTIVE" id="u_C_TIME_ACTIVE" value="1"<?php echo ($t_event->C_TIME_ACTIVE->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->C_TIME_ACTIVE->CellAttributes() ?>><?php echo $t_event->C_TIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_event->C_TIME_ACTIVE->CellAttributes() ?>><span id="el_C_TIME_ACTIVE">
</span><?php echo $t_event->C_TIME_ACTIVE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->FK_ARRAY_TINBAI->Visible) { // FK_ARRAY_TINBAI ?>
	<tr<?php echo $t_event->FK_ARRAY_TINBAI->RowAttributes ?>>
		<td<?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_FK_ARRAY_TINBAI" id="u_FK_ARRAY_TINBAI" value="1"<?php echo ($t_event->FK_ARRAY_TINBAI->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>><?php echo $t_event->FK_ARRAY_TINBAI->FldCaption() ?></td>
		<td<?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>><span id="el_FK_ARRAY_TINBAI">
<select style="width:600px" multiple="multiple" size="50"  class="x_FK_ARRAY_TINBAI"  id="x_FK_ARRAY_TINBAI[]" name="x_FK_ARRAY_TINBAI[]" title="<?php echo $t_event->FK_ARRAY_TINBAI->FldTitle() ?>" size=10 multiple="multiple"<?php echo $t_event->FK_ARRAY_TINBAI->EditAttributes() ?>>
<?php
if (is_array($t_event->FK_ARRAY_TINBAI->EditValue)) {
	$arwrk = $t_event->FK_ARRAY_TINBAI->EditValue;
	$armultiwrk= explode(",", strval($t_event->FK_ARRAY_TINBAI->CurrentValue));
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
<?php if ($arwrk[$rowcntwrk][2] <> "") { ?>
<?php echo ew_ValueSeparator($rowcntwrk) ?><?php echo $arwrk[$rowcntwrk][2] ?>
<?php } ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $t_event->FK_ARRAY_TINBAI->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_event->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td<?php echo $t_event->FK_ARRAY_CONGTY->CellAttributes() ?>>
<input checked="true" type="checkbox" name="u_FK_ARRAY_CONGTY" id="u_FK_ARRAY_CONGTY" value="1"<?php echo ($t_event->FK_ARRAY_CONGTY->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $t_event->FK_ARRAY_CONGTY->CellAttributes() ?>><?php echo $t_event->FK_ARRAY_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_event->FK_ARRAY_CONGTY->CellAttributes() ?>><span id="el_FK_ARRAY_CONGTY">
<select id="x_FK_ARRAY_CONGTY[]" name="x_FK_ARRAY_CONGTY[]" title="<?php echo $t_event->FK_ARRAY_CONGTY->FldTitle() ?>" size=10 multiple="multiple"<?php echo $t_event->FK_ARRAY_CONGTY->EditAttributes() ?>>
<?php
if (is_array($t_event->FK_ARRAY_CONGTY->EditValue)) {
	$arwrk = $t_event->FK_ARRAY_CONGTY->EditValue;
	$armultiwrk= explode(",", strval($t_event->FK_ARRAY_CONGTY->CurrentValue));
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
</span><?php echo $t_event->FK_ARRAY_CONGTY->CustomMsg ?></td>
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
$t_event_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_event';

	// Page object name
	var $PageObjName = 't_event_update';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_event;
		if ($t_event->UseTokenInUrl) $PageUrl .= "t=" . $t_event->TableVar . "&"; // Add page token
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
		global $objForm, $t_event;
		if ($t_event->UseTokenInUrl) {
			if ($objForm)
				return ($t_event->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_event->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_event_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event)
		$GLOBALS["t_event"] = new ct_event();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_event', TRUE);

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
		global $t_event;

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
			$this->Page_Terminate("t_eventlist.php");
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
		global $objForm, $Language, $gsFormError, $t_event;

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
				$t_event->CurrentAction = $_POST["a_update"];

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
					$t_event->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_eventlist.php"); // No records selected, return to list
		switch ($t_event->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_event->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_event->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_event;
		$t_event->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$t_event->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
					$t_event->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
					$t_event->C_POST->setDbValue($rs->fields('C_POST'));
					$t_event->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
					$t_event->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
					$t_event->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
					$t_event->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
					$t_event->C_ODER->setDbValue($rs->fields('C_ODER'));
					$t_event->C_NOTE->setDbValue($rs->fields('C_NOTE'));
					$t_event->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
					$t_event->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
					$t_event->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
					$t_event->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
					$t_event->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
					$t_event->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
					$t_event->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
					$t_event->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
				} else {
					if (!ew_CompareValue($t_event->C_EVENT_NAME->DbValue, $rs->fields('C_EVENT_NAME')))
						$t_event->C_EVENT_NAME->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_TYPE_EVENT->DbValue, $rs->fields('C_TYPE_EVENT')))
						$t_event->C_TYPE_EVENT->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_POST->DbValue, $rs->fields('C_POST')))
						$t_event->C_POST->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_URL_IMAGES->DbValue, $rs->fields('C_URL_IMAGES')))
						$t_event->C_URL_IMAGES->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_URL_LINK->DbValue, $rs->fields('C_URL_LINK')))
						$t_event->C_URL_LINK->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_DATETIME_BEGIN->DbValue, $rs->fields('C_DATETIME_BEGIN')))
						$t_event->C_DATETIME_BEGIN->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_DATETIME_END->DbValue, $rs->fields('C_DATETIME_END')))
						$t_event->C_DATETIME_END->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_ODER->DbValue, $rs->fields('C_ODER')))
						$t_event->C_ODER->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_NOTE->DbValue, $rs->fields('C_NOTE')))
						$t_event->C_NOTE->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_USER_ADD->DbValue, $rs->fields('C_USER_ADD')))
						$t_event->C_USER_ADD->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_ADD_TIME->DbValue, $rs->fields('C_ADD_TIME')))
						$t_event->C_ADD_TIME->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_USER_EDIT->DbValue, $rs->fields('C_USER_EDIT')))
						$t_event->C_USER_EDIT->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_EDIT_TIME->DbValue, $rs->fields('C_EDIT_TIME')))
						$t_event->C_EDIT_TIME->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_ACTIVE_LEVELSITE->DbValue, $rs->fields('C_ACTIVE_LEVELSITE')))
						$t_event->C_ACTIVE_LEVELSITE->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->C_TIME_ACTIVE->DbValue, $rs->fields('C_TIME_ACTIVE')))
						$t_event->C_TIME_ACTIVE->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->FK_ARRAY_TINBAI->DbValue, $rs->fields('FK_ARRAY_TINBAI')))
						$t_event->FK_ARRAY_TINBAI->CurrentValue = NULL;
					if (!ew_CompareValue($t_event->FK_ARRAY_CONGTY->DbValue, $rs->fields('FK_ARRAY_CONGTY')))
						$t_event->FK_ARRAY_CONGTY->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_event;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_event->KeyFilter();
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
		global $t_event;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_event->C_EVENT_ID->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_event;
		$conn->BeginTrans();

		// Get old recordset
		$t_event->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_event->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_event->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $t_event;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_event;
		$t_event->C_EVENT_NAME->setFormValue($objForm->GetValue("x_C_EVENT_NAME"));
		$t_event->C_EVENT_NAME->MultiUpdate = $objForm->GetValue("u_C_EVENT_NAME");
		$t_event->C_TYPE_EVENT->setFormValue($objForm->GetValue("x_C_TYPE_EVENT"));
		$t_event->C_TYPE_EVENT->MultiUpdate = $objForm->GetValue("u_C_TYPE_EVENT");
		$t_event->C_POST->setFormValue($objForm->GetValue("x_C_POST"));
		$t_event->C_POST->MultiUpdate = $objForm->GetValue("u_C_POST");
		$t_event->C_URL_IMAGES->setFormValue($objForm->GetValue("x_C_URL_IMAGES"));
		$t_event->C_URL_IMAGES->MultiUpdate = $objForm->GetValue("u_C_URL_IMAGES");
		$t_event->C_URL_LINK->setFormValue($objForm->GetValue("x_C_URL_LINK"));
		$t_event->C_URL_LINK->MultiUpdate = $objForm->GetValue("u_C_URL_LINK");
		$t_event->C_DATETIME_BEGIN->setFormValue($objForm->GetValue("x_C_DATETIME_BEGIN"));
		$t_event->C_DATETIME_BEGIN->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7);
		$t_event->C_DATETIME_BEGIN->MultiUpdate = $objForm->GetValue("u_C_DATETIME_BEGIN");
		$t_event->C_DATETIME_END->setFormValue($objForm->GetValue("x_C_DATETIME_END"));
		$t_event->C_DATETIME_END->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7);
		$t_event->C_DATETIME_END->MultiUpdate = $objForm->GetValue("u_C_DATETIME_END");
		$t_event->C_ODER->setFormValue($objForm->GetValue("x_C_ODER"));
		$t_event->C_ODER->CurrentValue = ew_UnFormatDateTime($t_event->C_ODER->CurrentValue, 7);
		$t_event->C_ODER->MultiUpdate = $objForm->GetValue("u_C_ODER");
		$t_event->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_event->C_NOTE->MultiUpdate = $objForm->GetValue("u_C_NOTE");
		$t_event->C_USER_ADD->setFormValue($objForm->GetValue("x_C_USER_ADD"));
		$t_event->C_USER_ADD->MultiUpdate = $objForm->GetValue("u_C_USER_ADD");
		$t_event->C_ADD_TIME->setFormValue($objForm->GetValue("x_C_ADD_TIME"));
		$t_event->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_ADD_TIME->CurrentValue, 7);
		$t_event->C_ADD_TIME->MultiUpdate = $objForm->GetValue("u_C_ADD_TIME");
		$t_event->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_event->C_USER_EDIT->MultiUpdate = $objForm->GetValue("u_C_USER_EDIT");
		$t_event->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_event->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_EDIT_TIME->CurrentValue, 7);
		$t_event->C_EDIT_TIME->MultiUpdate = $objForm->GetValue("u_C_EDIT_TIME");
		$t_event->C_ACTIVE_LEVELSITE->setFormValue($objForm->GetValue("x_C_ACTIVE_LEVELSITE"));
		$t_event->C_ACTIVE_LEVELSITE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE_LEVELSITE");
		$t_event->C_TIME_ACTIVE->setFormValue($objForm->GetValue("x_C_TIME_ACTIVE"));
		$t_event->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_event->C_TIME_ACTIVE->CurrentValue, 7);
		$t_event->C_TIME_ACTIVE->MultiUpdate = $objForm->GetValue("u_C_TIME_ACTIVE");
		$t_event->FK_ARRAY_TINBAI->setFormValue($objForm->GetValue("x_FK_ARRAY_TINBAI"));
		$t_event->FK_ARRAY_TINBAI->MultiUpdate = $objForm->GetValue("u_FK_ARRAY_TINBAI");
		$t_event->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
		$t_event->FK_ARRAY_CONGTY->MultiUpdate = $objForm->GetValue("u_FK_ARRAY_CONGTY");
		$t_event->C_EVENT_ID->setFormValue($objForm->GetValue("x_C_EVENT_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_event;
		$t_event->C_EVENT_ID->CurrentValue = $t_event->C_EVENT_ID->FormValue;
		$t_event->C_EVENT_NAME->CurrentValue = $t_event->C_EVENT_NAME->FormValue;
		$t_event->C_TYPE_EVENT->CurrentValue = $t_event->C_TYPE_EVENT->FormValue;
		$t_event->C_POST->CurrentValue = $t_event->C_POST->FormValue;
		$t_event->C_URL_IMAGES->CurrentValue = $t_event->C_URL_IMAGES->FormValue;
		$t_event->C_URL_LINK->CurrentValue = $t_event->C_URL_LINK->FormValue;
		$t_event->C_DATETIME_BEGIN->CurrentValue = $t_event->C_DATETIME_BEGIN->FormValue;
		$t_event->C_DATETIME_BEGIN->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7);
		$t_event->C_DATETIME_END->CurrentValue = $t_event->C_DATETIME_END->FormValue;
		$t_event->C_DATETIME_END->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7);
		$t_event->C_ODER->CurrentValue = $t_event->C_ODER->FormValue;
		$t_event->C_ODER->CurrentValue = ew_UnFormatDateTime($t_event->C_ODER->CurrentValue, 7);
		$t_event->C_NOTE->CurrentValue = $t_event->C_NOTE->FormValue;
		$t_event->C_USER_ADD->CurrentValue = $t_event->C_USER_ADD->FormValue;
		$t_event->C_ADD_TIME->CurrentValue = $t_event->C_ADD_TIME->FormValue;
		$t_event->C_ADD_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_ADD_TIME->CurrentValue, 7);
		$t_event->C_USER_EDIT->CurrentValue = $t_event->C_USER_EDIT->FormValue;
		$t_event->C_EDIT_TIME->CurrentValue = $t_event->C_EDIT_TIME->FormValue;
		$t_event->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_EDIT_TIME->CurrentValue, 7);
		$t_event->C_ACTIVE_LEVELSITE->CurrentValue = $t_event->C_ACTIVE_LEVELSITE->FormValue;
		$t_event->C_TIME_ACTIVE->CurrentValue = $t_event->C_TIME_ACTIVE->FormValue;
		$t_event->C_TIME_ACTIVE->CurrentValue = ew_UnFormatDateTime($t_event->C_TIME_ACTIVE->CurrentValue, 7);
		$t_event->FK_ARRAY_TINBAI->CurrentValue = $t_event->FK_ARRAY_TINBAI->FormValue;
		$t_event->FK_ARRAY_CONGTY->CurrentValue = $t_event->FK_ARRAY_CONGTY->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_event;

		// Call Recordset Selecting event
		$t_event->Recordset_Selecting($t_event->CurrentFilter);

		// Load List page SQL
		$sSql = $t_event->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_event->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event;

		// Initialize URLs
		// Call Row_Rendering event

		$t_event->Row_Rendering();

		// Common render codes for all row types
		// C_EVENT_NAME

		$t_event->C_EVENT_NAME->CellCssStyle = ""; $t_event->C_EVENT_NAME->CellCssClass = "";
		$t_event->C_EVENT_NAME->CellAttrs = array(); $t_event->C_EVENT_NAME->ViewAttrs = array(); $t_event->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$t_event->C_TYPE_EVENT->CellCssStyle = ""; $t_event->C_TYPE_EVENT->CellCssClass = "";
		$t_event->C_TYPE_EVENT->CellAttrs = array(); $t_event->C_TYPE_EVENT->ViewAttrs = array(); $t_event->C_TYPE_EVENT->EditAttrs = array();

		// C_POST
		$t_event->C_POST->CellCssStyle = ""; $t_event->C_POST->CellCssClass = "";
		$t_event->C_POST->CellAttrs = array(); $t_event->C_POST->ViewAttrs = array(); $t_event->C_POST->EditAttrs = array();

		// C_URL_IMAGES
		$t_event->C_URL_IMAGES->CellCssStyle = ""; $t_event->C_URL_IMAGES->CellCssClass = "";
		$t_event->C_URL_IMAGES->CellAttrs = array(); $t_event->C_URL_IMAGES->ViewAttrs = array(); $t_event->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$t_event->C_URL_LINK->CellCssStyle = ""; $t_event->C_URL_LINK->CellCssClass = "";
		$t_event->C_URL_LINK->CellAttrs = array(); $t_event->C_URL_LINK->ViewAttrs = array(); $t_event->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$t_event->C_DATETIME_BEGIN->CellCssStyle = ""; $t_event->C_DATETIME_BEGIN->CellCssClass = "";
		$t_event->C_DATETIME_BEGIN->CellAttrs = array(); $t_event->C_DATETIME_BEGIN->ViewAttrs = array(); $t_event->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$t_event->C_DATETIME_END->CellCssStyle = ""; $t_event->C_DATETIME_END->CellCssClass = "";
		$t_event->C_DATETIME_END->CellAttrs = array(); $t_event->C_DATETIME_END->ViewAttrs = array(); $t_event->C_DATETIME_END->EditAttrs = array();

		// C_ODER
		$t_event->C_ODER->CellCssStyle = ""; $t_event->C_ODER->CellCssClass = "";
		$t_event->C_ODER->CellAttrs = array(); $t_event->C_ODER->ViewAttrs = array(); $t_event->C_ODER->EditAttrs = array();

		// C_NOTE
		$t_event->C_NOTE->CellCssStyle = ""; $t_event->C_NOTE->CellCssClass = "";
		$t_event->C_NOTE->CellAttrs = array(); $t_event->C_NOTE->ViewAttrs = array(); $t_event->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_event->C_USER_ADD->CellCssStyle = ""; $t_event->C_USER_ADD->CellCssClass = "";
		$t_event->C_USER_ADD->CellAttrs = array(); $t_event->C_USER_ADD->ViewAttrs = array(); $t_event->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_event->C_ADD_TIME->CellCssStyle = ""; $t_event->C_ADD_TIME->CellCssClass = "";
		$t_event->C_ADD_TIME->CellAttrs = array(); $t_event->C_ADD_TIME->ViewAttrs = array(); $t_event->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_event->C_USER_EDIT->CellCssStyle = ""; $t_event->C_USER_EDIT->CellCssClass = "";
		$t_event->C_USER_EDIT->CellAttrs = array(); $t_event->C_USER_EDIT->ViewAttrs = array(); $t_event->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_event->C_EDIT_TIME->CellCssStyle = ""; $t_event->C_EDIT_TIME->CellCssClass = "";
		$t_event->C_EDIT_TIME->CellAttrs = array(); $t_event->C_EDIT_TIME->ViewAttrs = array(); $t_event->C_EDIT_TIME->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$t_event->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $t_event->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$t_event->C_ACTIVE_LEVELSITE->CellAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $t_event->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$t_event->C_TIME_ACTIVE->CellCssStyle = ""; $t_event->C_TIME_ACTIVE->CellCssClass = "";
		$t_event->C_TIME_ACTIVE->CellAttrs = array(); $t_event->C_TIME_ACTIVE->ViewAttrs = array(); $t_event->C_TIME_ACTIVE->EditAttrs = array();

		// FK_ARRAY_TINBAI
		$t_event->FK_ARRAY_TINBAI->CellCssStyle = ""; $t_event->FK_ARRAY_TINBAI->CellCssClass = "";
		$t_event->FK_ARRAY_TINBAI->CellAttrs = array(); $t_event->FK_ARRAY_TINBAI->ViewAttrs = array(); $t_event->FK_ARRAY_TINBAI->EditAttrs = array();

		// FK_ARRAY_CONGTY
		$t_event->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_event->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_event->FK_ARRAY_CONGTY->CellAttrs = array(); $t_event->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_event->FK_ARRAY_CONGTY->EditAttrs = array();
		if ($t_event->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_EVENT_ID
			$t_event->C_EVENT_ID->ViewValue = $t_event->C_EVENT_ID->CurrentValue;
			$t_event->C_EVENT_ID->CssStyle = "";
			$t_event->C_EVENT_ID->CssClass = "";
			$t_event->C_EVENT_ID->ViewCustomAttributes = "";

			// FK_CONGTY_ID
			if (strval($t_event->FK_CONGTY_ID->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_event->FK_CONGTY_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_event->FK_CONGTY_ID->ViewValue = $t_event->FK_CONGTY_ID->CurrentValue;
				}
			} else {
				$t_event->FK_CONGTY_ID->ViewValue = NULL;
			}
			$t_event->FK_CONGTY_ID->CssStyle = "";
			$t_event->FK_CONGTY_ID->CssClass = "";
			$t_event->FK_CONGTY_ID->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->ViewValue = $t_event->C_EVENT_NAME->CurrentValue;
			$t_event->C_EVENT_NAME->CssStyle = "";
			$t_event->C_EVENT_NAME->CssClass = "";
			$t_event->C_EVENT_NAME->ViewCustomAttributes = "";

			// C_TYPE_EVENT
			if (strval($t_event->C_TYPE_EVENT->CurrentValue) <> "") {
				switch ($t_event->C_TYPE_EVENT->CurrentValue) {
					case "1":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai Popup";
						break;
					case "2":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai su kien theo bai viet";
						break;
					case "3":
						$t_event->C_TYPE_EVENT->ViewValue = "Loai su kien lien ket";
						break;
					default:
						$t_event->C_TYPE_EVENT->ViewValue = $t_event->C_TYPE_EVENT->CurrentValue;
				}
			} else {
				$t_event->C_TYPE_EVENT->ViewValue = NULL;
			}
			$t_event->C_TYPE_EVENT->CssStyle = "";
			$t_event->C_TYPE_EVENT->CssClass = "";
			$t_event->C_TYPE_EVENT->ViewCustomAttributes = "";

			// C_POST
			if (strval($t_event->C_POST->CurrentValue) <> "") {
				switch ($t_event->C_POST->CurrentValue) {
					case "1":
						$t_event->C_POST->ViewValue = "trang chu";
						break;
					case "2":
						$t_event->C_POST->ViewValue = "trang tuyen sinh";
						break;
					case "":
						$t_event->C_POST->ViewValue = "";
						break;
					default:
						$t_event->C_POST->ViewValue = $t_event->C_POST->CurrentValue;
				}
			} else {
				$t_event->C_POST->ViewValue = NULL;
			}
			$t_event->C_POST->CssStyle = "";
			$t_event->C_POST->CssClass = "";
			$t_event->C_POST->ViewCustomAttributes = "";

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->ViewValue = $t_event->C_URL_IMAGES->CurrentValue;
			$t_event->C_URL_IMAGES->CssStyle = "";
			$t_event->C_URL_IMAGES->CssClass = "";
			$t_event->C_URL_IMAGES->ViewCustomAttributes = "";

			// C_URL_LINK
			$t_event->C_URL_LINK->ViewValue = $t_event->C_URL_LINK->CurrentValue;
			$t_event->C_URL_LINK->CssStyle = "";
			$t_event->C_URL_LINK->CssClass = "";
			$t_event->C_URL_LINK->ViewCustomAttributes = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->ViewValue = $t_event->C_DATETIME_BEGIN->CurrentValue;
			$t_event->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_BEGIN->ViewValue, 7);
			$t_event->C_DATETIME_BEGIN->CssStyle = "";
			$t_event->C_DATETIME_BEGIN->CssClass = "";
			$t_event->C_DATETIME_BEGIN->ViewCustomAttributes = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->ViewValue = $t_event->C_DATETIME_END->CurrentValue;
			$t_event->C_DATETIME_END->ViewValue = ew_FormatDateTime($t_event->C_DATETIME_END->ViewValue, 7);
			$t_event->C_DATETIME_END->CssStyle = "";
			$t_event->C_DATETIME_END->CssClass = "";
			$t_event->C_DATETIME_END->ViewCustomAttributes = "";

			// C_ODER
			$t_event->C_ODER->ViewValue = $t_event->C_ODER->CurrentValue;
			$t_event->C_ODER->ViewValue = ew_FormatDateTime($t_event->C_ODER->ViewValue, 7);
			$t_event->C_ODER->CssStyle = "";
			$t_event->C_ODER->CssClass = "";
			$t_event->C_ODER->ViewCustomAttributes = "";

			// C_NOTE
			$t_event->C_NOTE->ViewValue = $t_event->C_NOTE->CurrentValue;
			$t_event->C_NOTE->CssStyle = "";
			$t_event->C_NOTE->CssClass = "";
			$t_event->C_NOTE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->ViewValue = $t_event->C_USER_ADD->CurrentValue;
			$t_event->C_USER_ADD->CssStyle = "";
			$t_event->C_USER_ADD->CssClass = "";
			$t_event->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->ViewValue = $t_event->C_ADD_TIME->CurrentValue;
			$t_event->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_event->C_ADD_TIME->ViewValue, 7);
			$t_event->C_ADD_TIME->CssStyle = "";
			$t_event->C_ADD_TIME->CssClass = "";
			$t_event->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->ViewValue = $t_event->C_USER_EDIT->CurrentValue;
			$t_event->C_USER_EDIT->CssStyle = "";
			$t_event->C_USER_EDIT->CssClass = "";
			$t_event->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->ViewValue = $t_event->C_EDIT_TIME->CurrentValue;
			$t_event->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_event->C_EDIT_TIME->ViewValue, 7);
			$t_event->C_EDIT_TIME->CssStyle = "";
			$t_event->C_EDIT_TIME->CssClass = "";
			$t_event->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_ACTIVE_LEVELSITE
			if (strval($t_event->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
				switch ($t_event->C_ACTIVE_LEVELSITE->CurrentValue) {
					case "0":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
						break;
					default:
						$t_event->C_ACTIVE_LEVELSITE->ViewValue = $t_event->C_ACTIVE_LEVELSITE->CurrentValue;
				}
			} else {
				$t_event->C_ACTIVE_LEVELSITE->ViewValue = NULL;
			}
			$t_event->C_ACTIVE_LEVELSITE->CssStyle = "";
			$t_event->C_ACTIVE_LEVELSITE->CssClass = "";
			$t_event->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->ViewValue = $t_event->C_TIME_ACTIVE->CurrentValue;
			$t_event->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($t_event->C_TIME_ACTIVE->ViewValue, 7);
			$t_event->C_TIME_ACTIVE->CssStyle = "";
			$t_event->C_TIME_ACTIVE->CssClass = "";
			$t_event->C_TIME_ACTIVE->ViewCustomAttributes = "";

			// C_SEND_MAIL
			if (strval($t_event->C_SEND_MAIL->CurrentValue) <> "") {
				switch ($t_event->C_SEND_MAIL->CurrentValue) {
					case "0":
						$t_event->C_SEND_MAIL->ViewValue = "khong gui mail";
						break;
					case "1":
						$t_event->C_SEND_MAIL->ViewValue = "gui mail";
						break;
					default:
						$t_event->C_SEND_MAIL->ViewValue = $t_event->C_SEND_MAIL->CurrentValue;
				}
			} else {
				$t_event->C_SEND_MAIL->ViewValue = NULL;
			}
			$t_event->C_SEND_MAIL->CssStyle = "";
			$t_event->C_SEND_MAIL->CssClass = "";
			$t_event->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_FK_BROWSE
			if (strval($t_event->C_FK_BROWSE->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->C_FK_BROWSE->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`C_HOTEN` = '" . ew_AdjustSql(trim($wrk)) . "'";
				}	
			$sSqlWrk = "SELECT `C_EMAIL` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->C_FK_BROWSE->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->C_FK_BROWSE->ViewValue .= $rswrk->fields('C_EMAIL');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->C_FK_BROWSE->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->C_FK_BROWSE->ViewValue = $t_event->C_FK_BROWSE->CurrentValue;
				}
			} else {
				$t_event->C_FK_BROWSE->ViewValue = NULL;
			}
			$t_event->C_FK_BROWSE->CssStyle = "";
			$t_event->C_FK_BROWSE->CssClass = "";
			$t_event->C_FK_BROWSE->ViewCustomAttributes = "";

			// FK_ARRAY_TINBAI
			if (strval($t_event->FK_ARRAY_TINBAI->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_TINBAI->CurrentValue);
				$sFilterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
					$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
				}	
			$sSqlWrk = "SELECT `C_TITLE`, `C_ORDER` FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_event->FK_ARRAY_TINBAI->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
						$t_event->FK_ARRAY_TINBAI->ViewValue .= ew_ValueSeparator($ari) . $rswrk->fields('C_ORDER');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_TINBAI->ViewValue = $t_event->FK_ARRAY_TINBAI->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_TINBAI->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_TINBAI->CssStyle = "";
			$t_event->FK_ARRAY_TINBAI->CssClass = "";
			$t_event->FK_ARRAY_TINBAI->ViewCustomAttributes = "";

			// FK_ARRAY_CONGTY
			if (strval($t_event->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_event->FK_ARRAY_CONGTY->CurrentValue);
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
					$t_event->FK_ARRAY_CONGTY->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$t_event->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $t_event->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$t_event->FK_ARRAY_CONGTY->ViewValue = $t_event->FK_ARRAY_CONGTY->CurrentValue;
				}
			} else {
				$t_event->FK_ARRAY_CONGTY->ViewValue = NULL;
			}
			$t_event->FK_ARRAY_CONGTY->CssStyle = "";
			$t_event->FK_ARRAY_CONGTY->CssClass = "";
			$t_event->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->HrefValue = "";
			$t_event->C_EVENT_NAME->TooltipValue = "";

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->HrefValue = "";
			$t_event->C_TYPE_EVENT->TooltipValue = "";

			// C_POST
			$t_event->C_POST->HrefValue = "";
			$t_event->C_POST->TooltipValue = "";

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->HrefValue = "";
			$t_event->C_URL_IMAGES->TooltipValue = "";

			// C_URL_LINK
			$t_event->C_URL_LINK->HrefValue = "";
			$t_event->C_URL_LINK->TooltipValue = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->HrefValue = "";
			$t_event->C_DATETIME_BEGIN->TooltipValue = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->HrefValue = "";
			$t_event->C_DATETIME_END->TooltipValue = "";

			// C_ODER
			$t_event->C_ODER->HrefValue = "";
			$t_event->C_ODER->TooltipValue = "";

			// C_NOTE
			$t_event->C_NOTE->HrefValue = "";
			$t_event->C_NOTE->TooltipValue = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->HrefValue = "";
			$t_event->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->HrefValue = "";
			$t_event->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->HrefValue = "";
			$t_event->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->HrefValue = "";
			$t_event->C_EDIT_TIME->TooltipValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event->C_ACTIVE_LEVELSITE->HrefValue = "";
			$t_event->C_ACTIVE_LEVELSITE->TooltipValue = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->HrefValue = "";
			$t_event->C_TIME_ACTIVE->TooltipValue = "";

			// FK_ARRAY_TINBAI
			$t_event->FK_ARRAY_TINBAI->HrefValue = "";
			$t_event->FK_ARRAY_TINBAI->TooltipValue = "";

			// FK_ARRAY_CONGTY
			$t_event->FK_ARRAY_CONGTY->HrefValue = "";
			$t_event->FK_ARRAY_CONGTY->TooltipValue = "";
		} elseif ($t_event->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->EditCustomAttributes = "";
			$t_event->C_EVENT_NAME->EditValue = ew_HtmlEncode($t_event->C_EVENT_NAME->CurrentValue);

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Loại Popup");
			$arwrk[] = array("2", "Loại sự kiện theo bài viết");
			$arwrk[] = array("3", "Loại sự kiện liên kết");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_event->C_TYPE_EVENT->EditValue = $arwrk;

			// C_POST
			$t_event->C_POST->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Trang chủ");
			$arwrk[] = array("2", "Trang tuyển sinh");
			$arwrk[] = array("", "");
			$t_event->C_POST->EditValue = $arwrk;

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->EditCustomAttributes = "";
			$t_event->C_URL_IMAGES->EditValue = ew_HtmlEncode($t_event->C_URL_IMAGES->CurrentValue);

			// C_URL_LINK
			$t_event->C_URL_LINK->EditCustomAttributes = "";
			$t_event->C_URL_LINK->EditValue = ew_HtmlEncode($t_event->C_URL_LINK->CurrentValue);

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->EditCustomAttributes = "";
			$t_event->C_DATETIME_BEGIN->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7));

			// C_DATETIME_END
			$t_event->C_DATETIME_END->EditCustomAttributes = "";
			$t_event->C_DATETIME_END->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7));

			// C_ODER
			$t_event->C_ODER->EditCustomAttributes = "";
			$t_event->C_ODER->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_event->C_ODER->CurrentValue, 7));

			// C_NOTE
			$t_event->C_NOTE->EditCustomAttributes = "";
			$t_event->C_NOTE->EditValue = ew_HtmlEncode($t_event->C_NOTE->CurrentValue);

			// C_USER_ADD
			// C_ADD_TIME
			// C_USER_EDIT
			// C_EDIT_TIME
			// C_ACTIVE_LEVELSITE

			$t_event->C_ACTIVE_LEVELSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không kích hoạt");
			$arwrk[] = array("1", "Kích hoạt");
			$t_event->C_ACTIVE_LEVELSITE->EditValue = $arwrk;

			// C_TIME_ACTIVE
			// FK_ARRAY_TINBAI

			$t_event->FK_ARRAY_TINBAI->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_TINBAI_ID`, `C_TITLE`, `C_ORDER`, '' AS SelectFilterFld FROM `t_tinbai_levelsite`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_event->FK_ARRAY_TINBAI->EditValue = $arwrk;

			// FK_ARRAY_CONGTY
			$t_event->FK_ARRAY_CONGTY->EditCustomAttributes = "";
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
			$t_event->FK_ARRAY_CONGTY->EditValue = $arwrk;

			// Edit refer script
			// C_EVENT_NAME

			$t_event->C_EVENT_NAME->HrefValue = "";

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->HrefValue = "";

			// C_POST
			$t_event->C_POST->HrefValue = "";

			// C_URL_IMAGES
			$t_event->C_URL_IMAGES->HrefValue = "";

			// C_URL_LINK
			$t_event->C_URL_LINK->HrefValue = "";

			// C_DATETIME_BEGIN
			$t_event->C_DATETIME_BEGIN->HrefValue = "";

			// C_DATETIME_END
			$t_event->C_DATETIME_END->HrefValue = "";

			// C_ODER
			$t_event->C_ODER->HrefValue = "";

			// C_NOTE
			$t_event->C_NOTE->HrefValue = "";

			// C_USER_ADD
			$t_event->C_USER_ADD->HrefValue = "";

			// C_ADD_TIME
			$t_event->C_ADD_TIME->HrefValue = "";

			// C_USER_EDIT
			$t_event->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->HrefValue = "";

			// C_ACTIVE_LEVELSITE
			$t_event->C_ACTIVE_LEVELSITE->HrefValue = "";

			// C_TIME_ACTIVE
			$t_event->C_TIME_ACTIVE->HrefValue = "";

			// FK_ARRAY_TINBAI
			$t_event->FK_ARRAY_TINBAI->HrefValue = "";

			// FK_ARRAY_CONGTY
			$t_event->FK_ARRAY_CONGTY->HrefValue = "";
		}

		// Call Row Rendered event
		if ($t_event->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $t_event;

		// Initialize form error message
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($t_event->C_EVENT_NAME->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_TYPE_EVENT->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_POST->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_URL_IMAGES->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_URL_LINK->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_DATETIME_BEGIN->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_DATETIME_END->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_ODER->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_NOTE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_USER_ADD->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_ADD_TIME->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_USER_EDIT->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_EDIT_TIME->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_ACTIVE_LEVELSITE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->C_TIME_ACTIVE->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->FK_ARRAY_TINBAI->MultiUpdate == "1") $lUpdateCnt++;
		if ($t_event->FK_ARRAY_CONGTY->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = $Language->Phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
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
		global $conn, $Security, $Language, $t_event;
		$sFilter = $t_event->KeyFilter();
		$t_event->CurrentFilter = $sFilter;
		$sSql = $t_event->SQL();
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

			// C_EVENT_NAME
						if ($t_event->C_EVENT_NAME->MultiUpdate == "1") {
			$t_event->C_EVENT_NAME->SetDbValueDef($rsnew, $t_event->C_EVENT_NAME->CurrentValue, NULL, FALSE);
			}

			// C_TYPE_EVENT
						if ($t_event->C_TYPE_EVENT->MultiUpdate == "1") {
			$t_event->C_TYPE_EVENT->SetDbValueDef($rsnew, $t_event->C_TYPE_EVENT->CurrentValue, NULL, FALSE);
			}

			// C_POST
						if ($t_event->C_POST->MultiUpdate == "1") {
			$t_event->C_POST->SetDbValueDef($rsnew, $t_event->C_POST->CurrentValue, NULL, FALSE);
			}

			// C_URL_IMAGES
						if ($t_event->C_URL_IMAGES->MultiUpdate == "1") {
			$t_event->C_URL_IMAGES->SetDbValueDef($rsnew, $t_event->C_URL_IMAGES->CurrentValue, NULL, FALSE);
			}

			// C_URL_LINK
						if ($t_event->C_URL_LINK->MultiUpdate == "1") {
			$t_event->C_URL_LINK->SetDbValueDef($rsnew, $t_event->C_URL_LINK->CurrentValue, NULL, FALSE);
			}

			// C_DATETIME_BEGIN
						if ($t_event->C_DATETIME_BEGIN->MultiUpdate == "1") {
			$t_event->C_DATETIME_BEGIN->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7, FALSE), NULL);
			}

			// C_DATETIME_END
						if ($t_event->C_DATETIME_END->MultiUpdate == "1") {
			$t_event->C_DATETIME_END->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7, FALSE), NULL);
			}

			// C_ODER
						if ($t_event->C_ODER->MultiUpdate == "1") {
			$t_event->C_ODER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_ODER->CurrentValue, 7, FALSE), NULL);
			}

			// C_NOTE
						if ($t_event->C_NOTE->MultiUpdate == "1") {
			$t_event->C_NOTE->SetDbValueDef($rsnew, $t_event->C_NOTE->CurrentValue, NULL, FALSE);
			}

			// C_USER_ADD
						if ($t_event->C_USER_ADD->MultiUpdate == "0") {
			$t_event->C_USER_ADD->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_ADD'] =& $t_event->C_USER_ADD->DbValue;
			}

			// C_ADD_TIME
						if ($t_event->C_ADD_TIME->MultiUpdate == "0") {
			$t_event->C_ADD_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_ADD_TIME'] =& $t_event->C_ADD_TIME->DbValue;
			}

			// C_USER_EDIT
						if ($t_event->C_USER_EDIT->MultiUpdate == "0") {
			$t_event->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['C_USER_EDIT'] =& $t_event->C_USER_EDIT->DbValue;
			}

			// C_EDIT_TIME
						if ($t_event->C_EDIT_TIME->MultiUpdate == "0") {
			$t_event->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_EDIT_TIME'] =& $t_event->C_EDIT_TIME->DbValue;
			}

			// C_ACTIVE_LEVELSITE
						if ($t_event->C_ACTIVE_LEVELSITE->MultiUpdate == "1") {
			$t_event->C_ACTIVE_LEVELSITE->SetDbValueDef($rsnew, $t_event->C_ACTIVE_LEVELSITE->CurrentValue, NULL, FALSE);
			}

			// C_TIME_ACTIVE
						if ($t_event->C_TIME_ACTIVE->MultiUpdate == "1") {
			$t_event->C_TIME_ACTIVE->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_TIME_ACTIVE'] =& $t_event->C_TIME_ACTIVE->DbValue;
			}

			// FK_ARRAY_TINBAI
						if ($t_event->FK_ARRAY_TINBAI->MultiUpdate == "1") {
			$t_event->FK_ARRAY_TINBAI->SetDbValueDef($rsnew, $t_event->FK_ARRAY_TINBAI->CurrentValue, NULL, FALSE);
			}

			// FK_ARRAY_CONGTY
						if ($t_event->FK_ARRAY_CONGTY->MultiUpdate == "1") {
			$t_event->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_event->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);
			}

			// Call Row Updating event
			$bUpdateRow = $t_event->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
                                // add code by hungdq thiet  bang ghi trung gian 
                                $sql = "DELETE FROM t_event_mainlevel WHERE FK_EVENT_ID = ".$t_event->C_EVENT_ID->CurrentValue;	
			       	$Delete_ID=$conn->Execute($sql);
                                 // add code by hungdq thiet  bang ghi trung gian event 
                                 if (strval($t_event->C_ACTIVE_LEVELSITE->CurrentValue) == 1) {
                                     // thiet lap ban ghi chinh
                                    $sql_primary= "INSERT INTO t_event_mainlevel (FK_EVENT_ID,FK_CONGTY_ID,C_EVENT_NAME,C_TYPE_EVENT,C_URL_IMAGES,C_URL_LINK,C_POST,C_DATETIME_BEGIN,C_DATETIME_END,C_ORDER,C_NOTE,C_USER_ADD,C_ADD_TIME,C_USER_EDIT,C_EDIT_TIME,C_ARRAY_TINBAI,C_ACTIVE_LEVELSITE,C_TIME_ACTIVE,FK_CONGTY_SEND,C_TYPE_ACTIVE) 
                                                VALUES ('".$t_event->C_EVENT_ID->CurrentValue."','".$Security->CurrentUserOption()."','".$t_event->C_EVENT_NAME->CurrentValue."',
                                                        '".$t_event->C_TYPE_EVENT->CurrentValue."','".$t_event->C_URL_IMAGES->CurrentValue."','".$t_event->C_URL_LINK->CurrentValue."',
                                                        '".$t_event->C_POST->CurrentValue."','".$t_event->C_DATETIME_BEGIN->CurrentValue."','".$t_event->C_DATETIME_END->CurrentValue."',
                                                        '".$t_event->C_ODER->CurrentValue."','".$t_event->C_NOTE->CurrentValue."', '".$rs->fields('C_USER_ADD')."',
                                                        '".$rs->fields('C_ADD_TIME')."','".$rs->fields('C_USER_EDIT')."', '".$rs->fields('C_EDIT_TIME')."','".$t_event->FK_ARRAY_TINBAI->CurrentValue."',
							'".$t_event->C_ACTIVE_LEVELSITE->CurrentValue."','".$t_event->C_TIME_ACTIVE->CurrentValue."', '".$Security->CurrentUserOption()."',
							'1')";
                                     $Add_ID_primary=$conn->Execute($sql_primary); 
                                     // thiet lap mang  cac cong ty lien quan
                                     if ($t_event->FK_ARRAY_CONGTY->CurrentValue <> null )
                                     {
                                            $arwrk = explode(",", $t_event->FK_ARRAY_CONGTY->CurrentValue);
                                            foreach ($arwrk as $wrk) {
                                                $sql = "INSERT INTO t_event_mainlevel (FK_EVENT_ID,FK_CONGTY_ID,C_EVENT_NAME,C_TYPE_EVENT,C_URL_IMAGES,C_URL_LINK,C_POST,C_DATETIME_BEGIN,C_DATETIME_END,C_ORDER,C_NOTE,C_USER_ADD,C_ADD_TIME,C_USER_EDIT,C_EDIT_TIME,C_ACTIVE_LEVELSITE,C_TIME_ACTIVE,FK_CONGTY_SEND,C_TYPE_ACTIVE) 
                                                        VALUES ('".$t_event->C_EVENT_ID->CurrentValue."','".ew_AdjustSql(trim($wrk))."','".$t_event->C_EVENT_NAME->CurrentValue."',
                                                        '".$t_event->C_TYPE_EVENT->CurrentValue."','".$t_event->C_URL_IMAGES->CurrentValue."','".$t_event->C_URL_LINK->CurrentValue."',
                                                        '".$t_event->C_POST->CurrentValue."','".$t_event->C_DATETIME_BEGIN->CurrentValue."','".$t_event->C_DATETIME_END->CurrentValue."',
                                                        '','".$t_event->C_NOTE->CurrentValue."', '',
                                                        '','', '',
							'0','".$t_event->C_TIME_ACTIVE->CurrentValue."', '".$Security->CurrentUserOption()."',
							'0')";
                                            $Add_ID=$conn->Execute($sql);  
                                            }
                                     } 
                                 }
				$EditRow = $conn->Execute($t_event->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($t_event->CancelMessage <> "") {
					$this->setMessage($t_event->CancelMessage);
					$t_event->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$t_event->Row_Updated($rsold, $rsnew);
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
