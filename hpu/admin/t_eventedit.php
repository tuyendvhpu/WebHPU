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
$t_event_edit = new ct_event_edit();
$Page =& $t_event_edit;

// Page init
$t_event_edit->Page_Init();

// Page main
$t_event_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_edit = new ew_Page("t_event_edit");

// page properties
t_event_edit.PageID = "edit"; // page ID
t_event_edit.FormID = "ft_eventedit"; // form ID
var EW_PAGE_ID = t_event_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
t_event_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
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
t_event_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link href="js/select2.css" rel="stylesheet">
<script src="js/select2.js"></script>

   <script type="text/javascript">
        $(document).ready(function () {
              $(".x_FK_ARRAY_TINBAI").select2();
              $("#dsl_x_C_POST").hide();
              $(".x_FK_ARRAY_TINBAI").prop('disabled', true);
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
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

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
<p class="pheader"><span class="phpmaker"><?php echo $t_event->TableCaption() ?><br></p>
<a href="<?php echo $t_event->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_edit->ShowMessage();
?>
<form name="ft_eventedit" id="ft_eventedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_event_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="t_event">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_event->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_event->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_event->FK_CONGTY_ID->CellAttributes() ?>><span id="el_FK_CONGTY_ID">
<select id="x_FK_CONGTY_ID" name="x_FK_CONGTY_ID" title="<?php echo $t_event->FK_CONGTY_ID->FldTitle() ?>"<?php echo $t_event->FK_CONGTY_ID->EditAttributes() ?>>
<?php
// add code by quanghung xac dinh chuyn muc doi tương thuoc don vi nao
if (IsAdmin())
{
    if (is_array($t_event->FK_CONGTY_ID->EditValue)) {
        $arwrk = $t_event->FK_CONGTY_ID->EditValue;
        $rowswrk = count($arwrk);
        $emptywrk = TRUE;
        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                $selwrk = (strval($t_event->FK_CONGTY_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
    if (is_array($t_event->FK_CONGTY_ID->EditValue)) {
        $arwrk = $t_event->FK_CONGTY_ID->EditValue;
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
</span><?php echo $t_event->FK_CONGTY_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<tr<?php echo $t_event->C_EVENT_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_EVENT_NAME->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>><span id="el_C_EVENT_NAME">
<input size="80" type="text" name="x_C_EVENT_NAME" id="x_C_EVENT_NAME" title="<?php echo $t_event->C_EVENT_NAME->FldTitle() ?>" value="<?php echo $t_event->C_EVENT_NAME->EditValue ?>"<?php echo $t_event->C_EVENT_NAME->EditAttributes() ?>>
</span><?php echo $t_event->C_EVENT_NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<tr<?php echo $t_event->C_TYPE_EVENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
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
   
<?php if ($t_event->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<tr<?php echo $t_event->C_URL_IMAGES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_URL_IMAGES->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>><span id="el_C_URL_IMAGES">
<input type="text" name="x_C_URL_IMAGES" id="x_C_URL_IMAGES" title="<?php echo $t_event->C_URL_IMAGES->FldTitle() ?>" size="80" value="<?php echo $t_event->C_URL_IMAGES->EditValue ?>"<?php echo $t_event->C_URL_IMAGES->EditAttributes() ?>>
</span><?php echo $t_event->C_URL_IMAGES->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_URL_LINK->Visible) { // C_URL_LINK ?>
	<tr<?php echo $t_event->C_URL_LINK->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_URL_LINK->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event->C_URL_LINK->CellAttributes() ?>><span id="el_C_URL_LINK">
<input type="text" name="x_C_URL_LINK" id="x_C_URL_LINK" title="<?php echo $t_event->C_URL_LINK->FldTitle() ?>" size="80" value="<?php echo $t_event->C_URL_LINK->EditValue ?>"<?php echo $t_event->C_URL_LINK->EditAttributes() ?>>
</span><?php echo $t_event->C_URL_LINK->CustomMsg ?></td>
	</tr>
<?php } ?>
 
<?php if ($t_event->C_POST->Visible) { // C_POST ?>
	<tr<?php echo $t_event->C_POST->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_POST->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
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
<?php if ($t_event->FK_ARRAY_TINBAI->Visible) { // FK_ARRAY_TINBAI ?>
	<tr<?php echo $t_event->FK_ARRAY_TINBAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_ARRAY_TINBAI->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
                <td class="ewTableHeader" <?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>><span id="el_FK_ARRAY_TINBAI">
<br/>  
<select style="width:600px" multiple="multiple" size="50"  class="x_FK_ARRAY_TINBAI"  id="x_FK_ARRAY_TINBAI[]" name="x_FK_ARRAY_TINBAI[]" title="<?php echo $t_event->FK_ARRAY_TINBAI->FldTitle() ?>" <?php echo $t_event->FK_ARRAY_TINBAI->EditAttributes() ?>>
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
<?php echo $arwrk[$rowcntwrk][1] .' -- ('.$arwrk[$rowcntwrk][2].')' ?>
</option>
<?php
	}
}
?>
</select>      
</span><?php echo $t_event->FK_ARRAY_TINBAI->CustomMsg ?></td>
	</tr>
<?php } ?>  
<?php if ($t_event->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<tr<?php echo $t_event->C_DATETIME_BEGIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>><span id="el_C_DATETIME_BEGIN">
<input type="text" name="x_C_DATETIME_BEGIN" id="x_C_DATETIME_BEGIN" title="<?php echo $t_event->C_DATETIME_BEGIN->FldTitle() ?>" value="<?php echo $t_event->C_DATETIME_BEGIN->EditValue ?>"<?php echo $t_event->C_DATETIME_BEGIN->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_BEGIN" name="cal_x_C_DATETIME_BEGIN" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_BEGIN", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_BEGIN" // button id
});
</script>
</span>
    
                    <span class="col2" >
 <?php echo $t_event->C_DATETIME_END->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span>  
<input type="text" name="x_C_DATETIME_END" id="x_C_DATETIME_END" title="<?php echo $t_event->C_DATETIME_END->FldTitle() ?>" value="<?php echo $t_event->C_DATETIME_END->EditValue ?>"<?php echo $t_event->C_DATETIME_END->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_C_DATETIME_END" name="cal_x_C_DATETIME_END" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x_C_DATETIME_END", // input field id
	ifFormat: "%d/%m/%Y", // date format
	button: "cal_x_C_DATETIME_END" // button id
});
</script>
    <?php echo $t_event->C_DATETIME_BEGIN->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ODER->Visible) { // C_ODER ?>
	<tr<?php echo $t_event->C_ODER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_ODER->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
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
		<td class="ewTableHeader"><?php echo $t_event->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_event->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
<textarea name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_event->C_NOTE->FldTitle() ?>" cols="80" rows="2"<?php echo $t_event->C_NOTE->EditAttributes() ?>><?php echo $t_event->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_event->C_NOTE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_SEND_MAIL->Visible) { // C_SEND_MAIL ?>
	<tr<?php echo $t_event->C_SEND_MAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_SEND_MAIL->FldCaption() ?> <?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $t_event->C_SEND_MAIL->CellAttributes() ?>><span id="el_C_SEND_MAIL">
<div id="tp_x_C_SEND_MAIL" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_SEND_MAIL" id="x_C_SEND_MAIL" title="<?php echo $t_event->C_SEND_MAIL->FldTitle() ?>" value="{value}"<?php echo $t_event->C_SEND_MAIL->EditAttributes() ?>></label></div>
<div id="dsl_x_C_SEND_MAIL" repeatcolumn="5">
<?php
$arwrk = $t_event->C_SEND_MAIL->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_event->C_SEND_MAIL->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_SEND_MAIL" id="x_C_SEND_MAIL" title="<?php echo $t_event->C_SEND_MAIL->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event->C_SEND_MAIL->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
 <span style="color:#FF0000;font-style: italic"> 
          - Khi bạn chọn xác nhận hệ thống sẽ tự động gửi Mail tới bộ phận thiết kế để thiết kế hình ảnh cho sự kiên của bạn. 
    <br/> - Sau 60 phút nếu bạn không nhận được phản hổi của bộ phận thiết kế qua Mail của bạn. Xin liên hệ Quản Trị Mạng - ĐT:0936821821 để nhận được hỗ trợ tốt nhất.
   </span>
</span><?php echo $t_event->C_SEND_MAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_CONTENT_MAIL->Visible) { // C_CONTENT_MAIL ?>
	<tr<?php echo $t_event->C_CONTENT_MAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_CONTENT_MAIL->FldCaption() ?></td>
		<td<?php echo $t_event->C_CONTENT_MAIL->CellAttributes() ?>><span id="el_C_CONTENT_MAIL">
<textarea name="x_C_CONTENT_MAIL" id="x_C_CONTENT_MAIL" title="<?php echo $t_event->C_CONTENT_MAIL->FldTitle() ?>" cols="80" rows="2"<?php echo $t_event->C_CONTENT_MAIL->EditAttributes() ?>><?php echo $t_event->C_CONTENT_MAIL->EditValue ?></textarea>
</span><?php echo $t_event->C_CONTENT_MAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_FK_BROWSE->Visible) { // C_FK_BROWSE ?>
	<tr<?php echo $t_event->C_FK_BROWSE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_FK_BROWSE->FldCaption() ?></td>
		<td<?php echo $t_event->C_FK_BROWSE->CellAttributes() ?>><span id="el_C_FK_BROWSE">
<div id="tp_x_C_FK_BROWSE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME; ?>"><input type="checkbox" name="x_C_FK_BROWSE[]" id="x_C_FK_BROWSE[]" title="<?php echo $t_event->C_FK_BROWSE->FldTitle() ?>" value="{value}"<?php echo $t_event->C_FK_BROWSE->EditAttributes() ?>></div>
<div id="dsl_x_C_FK_BROWSE" repeatcolumn="5">
<?php
$arwrk = $t_event->C_FK_BROWSE->EditValue;
if (is_array($arwrk)) {
	$armultiwrk= explode(",", strval($t_event->C_FK_BROWSE->CurrentValue));
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
<label><input type="checkbox" name="x_C_FK_BROWSE[]" id="x_C_FK_BROWSE[]" title="<?php echo $t_event->C_FK_BROWSE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_event->C_FK_BROWSE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_event->C_FK_BROWSE->CustomMsg ?></td>
	</tr>
<?php } ?>

<?php if ($t_event->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_event->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_ARRAY_CONGTY->FldCaption() ?></td>
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
<input type="hidden" name="x_C_EVENT_ID" id="x_C_EVENT_ID" value="<?php echo ew_HtmlEncode($t_event->C_EVENT_ID->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_event_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 't_event';

	// Page object name
	var $PageObjName = 't_event_edit';

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
	function ct_event_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event)
		$GLOBALS["t_event"] = new ct_event();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

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
	var $sDbMasterFilter;
	var $sDbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_event;

		// Load key from QueryString
		if (@$_GET["C_EVENT_ID"] <> "")
			$t_event->C_EVENT_ID->setQueryStringValue($_GET["C_EVENT_ID"]);
		if (@$_POST["a_edit"] <> "") {
			$t_event->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$t_event->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$t_event->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$t_event->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($t_event->C_EVENT_ID->CurrentValue == "")
			$this->Page_Terminate("t_eventlist.php"); // Invalid key, return to list
		switch ($t_event->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t_eventlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$t_event->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $t_event->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_eventview.php")
						$sReturnUrl = $t_event->ViewUrl(); // View paging, return to View page directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$t_event->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$t_event->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
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
		$t_event->FK_CONGTY_ID->setFormValue($objForm->GetValue("x_FK_CONGTY_ID"));
		$t_event->C_EVENT_NAME->setFormValue($objForm->GetValue("x_C_EVENT_NAME"));
		$t_event->C_TYPE_EVENT->setFormValue($objForm->GetValue("x_C_TYPE_EVENT"));
		$t_event->C_POST->setFormValue($objForm->GetValue("x_C_POST"));
		$t_event->C_URL_IMAGES->setFormValue($objForm->GetValue("x_C_URL_IMAGES"));
		$t_event->C_URL_LINK->setFormValue($objForm->GetValue("x_C_URL_LINK"));
		$t_event->C_DATETIME_BEGIN->setFormValue($objForm->GetValue("x_C_DATETIME_BEGIN"));
		$t_event->C_DATETIME_BEGIN->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7);
		$t_event->C_DATETIME_END->setFormValue($objForm->GetValue("x_C_DATETIME_END"));
		$t_event->C_DATETIME_END->CurrentValue = ew_UnFormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7);
		$t_event->C_ODER->setFormValue($objForm->GetValue("x_C_ODER"));
		$t_event->C_ODER->CurrentValue = ew_UnFormatDateTime($t_event->C_ODER->CurrentValue, 7);
		$t_event->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_event->C_USER_EDIT->setFormValue($objForm->GetValue("x_C_USER_EDIT"));
		$t_event->C_EDIT_TIME->setFormValue($objForm->GetValue("x_C_EDIT_TIME"));
		$t_event->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_EDIT_TIME->CurrentValue, 7);
		$t_event->C_SEND_MAIL->setFormValue($objForm->GetValue("x_C_SEND_MAIL"));
		$t_event->C_CONTENT_MAIL->setFormValue($objForm->GetValue("x_C_CONTENT_MAIL"));
		$t_event->C_FK_BROWSE->setFormValue($objForm->GetValue("x_C_FK_BROWSE"));
		$t_event->FK_ARRAY_TINBAI->setFormValue($objForm->GetValue("x_FK_ARRAY_TINBAI"));
		$t_event->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
		$t_event->C_EVENT_ID->setFormValue($objForm->GetValue("x_C_EVENT_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_event;
		$t_event->C_EVENT_ID->CurrentValue = $t_event->C_EVENT_ID->FormValue;
		$this->LoadRow();
		$t_event->FK_CONGTY_ID->CurrentValue = $t_event->FK_CONGTY_ID->FormValue;
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
		$t_event->C_USER_EDIT->CurrentValue = $t_event->C_USER_EDIT->FormValue;
		$t_event->C_EDIT_TIME->CurrentValue = $t_event->C_EDIT_TIME->FormValue;
		$t_event->C_EDIT_TIME->CurrentValue = ew_UnFormatDateTime($t_event->C_EDIT_TIME->CurrentValue, 7);
		$t_event->C_SEND_MAIL->CurrentValue = $t_event->C_SEND_MAIL->FormValue;
		$t_event->C_CONTENT_MAIL->CurrentValue = $t_event->C_CONTENT_MAIL->FormValue;
		$t_event->C_FK_BROWSE->CurrentValue = $t_event->C_FK_BROWSE->FormValue;
		$t_event->FK_ARRAY_TINBAI->CurrentValue = $t_event->FK_ARRAY_TINBAI->FormValue;
		$t_event->FK_ARRAY_CONGTY->CurrentValue = $t_event->FK_ARRAY_CONGTY->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_event;
		$sFilter = $t_event->KeyFilter();

		// Call Row Selecting event
		$t_event->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_event->CurrentFilter = $sFilter;
		$sSql = $t_event->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_event->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_event;
		$t_event->C_EVENT_ID->setDbValue($rs->fields('C_EVENT_ID'));
		$t_event->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
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
		$t_event->C_SEND_MAIL->setDbValue("");
		$t_event->C_CONTENT_MAIL->setDbValue($rs->fields('C_CONTENT_MAIL'));
		$t_event->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$t_event->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
		$t_event->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event;

		// Initialize URLs
		// Call Row_Rendering event

		$t_event->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_event->FK_CONGTY_ID->CellCssStyle = ""; $t_event->FK_CONGTY_ID->CellCssClass = "";
		$t_event->FK_CONGTY_ID->CellAttrs = array(); $t_event->FK_CONGTY_ID->ViewAttrs = array(); $t_event->FK_CONGTY_ID->EditAttrs = array();

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

		// C_USER_EDIT
		$t_event->C_USER_EDIT->CellCssStyle = ""; $t_event->C_USER_EDIT->CellCssClass = "";
		$t_event->C_USER_EDIT->CellAttrs = array(); $t_event->C_USER_EDIT->ViewAttrs = array(); $t_event->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_event->C_EDIT_TIME->CellCssStyle = ""; $t_event->C_EDIT_TIME->CellCssClass = "";
		$t_event->C_EDIT_TIME->CellAttrs = array(); $t_event->C_EDIT_TIME->ViewAttrs = array(); $t_event->C_EDIT_TIME->EditAttrs = array();

		// C_SEND_MAIL
		$t_event->C_SEND_MAIL->CellCssStyle = ""; $t_event->C_SEND_MAIL->CellCssClass = "";
		$t_event->C_SEND_MAIL->CellAttrs = array(); $t_event->C_SEND_MAIL->ViewAttrs = array(); $t_event->C_SEND_MAIL->EditAttrs = array();

		// C_CONTENT_MAIL
		$t_event->C_CONTENT_MAIL->CellCssStyle = ""; $t_event->C_CONTENT_MAIL->CellCssClass = "";
		$t_event->C_CONTENT_MAIL->CellAttrs = array(); $t_event->C_CONTENT_MAIL->ViewAttrs = array(); $t_event->C_CONTENT_MAIL->EditAttrs = array();

		// C_FK_BROWSE
		$t_event->C_FK_BROWSE->CellCssStyle = ""; $t_event->C_FK_BROWSE->CellCssClass = "";
		$t_event->C_FK_BROWSE->CellAttrs = array(); $t_event->C_FK_BROWSE->ViewAttrs = array(); $t_event->C_FK_BROWSE->EditAttrs = array();

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
                        $t_event->C_SEND_MAIL->ViewValue = NULL;
			$t_event->C_SEND_MAIL->CssStyle = "";
			$t_event->C_SEND_MAIL->CssClass = "";
			$t_event->C_SEND_MAIL->ViewCustomAttributes = "";

			// C_CONTENT_MAIL
			$t_event->C_CONTENT_MAIL->ViewValue = $t_event->C_CONTENT_MAIL->CurrentValue;
			$t_event->C_CONTENT_MAIL->CssStyle = "";
			$t_event->C_CONTENT_MAIL->CssClass = "";
			$t_event->C_CONTENT_MAIL->ViewCustomAttributes = "";

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

			// FK_CONGTY_ID
			$t_event->FK_CONGTY_ID->HrefValue = "";
			$t_event->FK_CONGTY_ID->TooltipValue = "";

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

			// C_USER_EDIT
			$t_event->C_USER_EDIT->HrefValue = "";
			$t_event->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->HrefValue = "";
			$t_event->C_EDIT_TIME->TooltipValue = "";

			// C_SEND_MAIL
			$t_event->C_SEND_MAIL->HrefValue = "";
			$t_event->C_SEND_MAIL->TooltipValue = "";

			// C_CONTENT_MAIL
			$t_event->C_CONTENT_MAIL->HrefValue = "";
			$t_event->C_CONTENT_MAIL->TooltipValue = "";

			// C_FK_BROWSE
			$t_event->C_FK_BROWSE->HrefValue = "";
			$t_event->C_FK_BROWSE->TooltipValue = "";

			// FK_ARRAY_TINBAI
			$t_event->FK_ARRAY_TINBAI->HrefValue = "";
			$t_event->FK_ARRAY_TINBAI->TooltipValue = "";

			// FK_ARRAY_CONGTY
			$t_event->FK_ARRAY_CONGTY->HrefValue = "";
			$t_event->FK_ARRAY_CONGTY->TooltipValue = "";
		} elseif ($t_event->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_CONGTY_ID
			$t_event->FK_CONGTY_ID->EditCustomAttributes = "";
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
			$t_event->FK_CONGTY_ID->EditValue = $arwrk;

			// C_EVENT_NAME
			$t_event->C_EVENT_NAME->EditCustomAttributes = "";
			$t_event->C_EVENT_NAME->EditValue = ew_HtmlEncode($t_event->C_EVENT_NAME->CurrentValue);

			// C_TYPE_EVENT
			$t_event->C_TYPE_EVENT->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Loại Popup");
			$arwrk[] = array("2", "Loại sự kiện theo bài biết");
			$arwrk[] = array("3", "Loại sự kiện liên kết");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$t_event->C_TYPE_EVENT->EditValue = $arwrk;

			// C_POST
			$t_event->C_POST->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Trang chủ");
			$arwrk[] = array("2", "Trang tuyển sinh");
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

			// C_USER_EDIT
			// C_EDIT_TIME
			// C_SEND_MAIL

			$t_event->C_SEND_MAIL->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không gửi mail");
			$arwrk[] = array("1", "Gửii mail");
			$t_event->C_SEND_MAIL->EditValue = $arwrk;

			// C_CONTENT_MAIL
			$t_event->C_CONTENT_MAIL->EditCustomAttributes = "";
			$t_event->C_CONTENT_MAIL->EditValue = ew_HtmlEncode($t_event->C_CONTENT_MAIL->CurrentValue);

			// C_FK_BROWSE
			$t_event->C_FK_BROWSE->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `C_HOTEN`, `C_EMAIL`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			$sWhereWrk = $GLOBALS["t_nguoidung"]->AddUserIDFilter($sWhereWrk);
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$t_event->C_FK_BROWSE->EditValue = $arwrk;

			// FK_ARRAY_TINBAI
			$t_event->FK_ARRAY_TINBAI->EditCustomAttributes = "";
		        $sFilterWrk = "";
			$sSqlWrk = "
                                SELECT DISTINCT(t_tinbai_mainlevel.PK_TINBAI_ID), t_tinbai_levelsite.C_TITLE,`t_tinbai_mainlevel`.`C_ORDER`
                                FROM t_tinbai_mainlevel 
                                INNER JOIN t_tinbai_levelsite ON t_tinbai_mainlevel.PK_TINBAI_ID = t_tinbai_levelsite.PK_TINBAI_ID 
                        ";
			$sWhereWrk = "(t_tinbai_mainlevel.FK_CONGTY=".$Security->CurrentUserOption().") AND (t_tinbai_mainlevel.`C_ORDER` > 0) ORDER BY t_tinbai_mainlevel.C_ORDER DESC";
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
			// FK_CONGTY_ID

			$t_event->FK_CONGTY_ID->HrefValue = "";

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

			// C_USER_EDIT
			$t_event->C_USER_EDIT->HrefValue = "";

			// C_EDIT_TIME
			$t_event->C_EDIT_TIME->HrefValue = "";

			// C_SEND_MAIL
			$t_event->C_SEND_MAIL->HrefValue = "";

			// C_CONTENT_MAIL
			$t_event->C_CONTENT_MAIL->HrefValue = "";

			// C_FK_BROWSE
			$t_event->C_FK_BROWSE->HrefValue = "";

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

			// FK_CONGTY_ID
		$t_event->FK_CONGTY_ID->SetDbValueDef($rsnew, $t_event->FK_CONGTY_ID->CurrentValue, NULL, FALSE);

		// C_EVENT_NAME
		$t_event->C_EVENT_NAME->SetDbValueDef($rsnew, $t_event->C_EVENT_NAME->CurrentValue, NULL, FALSE);

		// C_TYPE_EVENT
		$t_event->C_TYPE_EVENT->SetDbValueDef($rsnew, $t_event->C_TYPE_EVENT->CurrentValue, NULL, FALSE);

		// C_POST
		$t_event->C_POST->SetDbValueDef($rsnew, $t_event->C_POST->CurrentValue, NULL, FALSE);

		// C_URL_IMAGES
		$t_event->C_URL_IMAGES->SetDbValueDef($rsnew, $t_event->C_URL_IMAGES->CurrentValue, NULL, FALSE);

		// C_URL_LINK
		$t_event->C_URL_LINK->SetDbValueDef($rsnew, $t_event->C_URL_LINK->CurrentValue, NULL, FALSE);

		// C_DATETIME_BEGIN
		$t_event->C_DATETIME_BEGIN->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_DATETIME_BEGIN->CurrentValue, 7, FALSE), NULL);

		// C_DATETIME_END
		$t_event->C_DATETIME_END->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_DATETIME_END->CurrentValue, 7, FALSE), NULL);

		// C_ODER
		$t_event->C_ODER->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_event->C_ODER->CurrentValue, 7, FALSE), NULL);

		// C_NOTE
		$t_event->C_NOTE->SetDbValueDef($rsnew, $t_event->C_NOTE->CurrentValue, NULL, FALSE);

		// C_USER_EDIT
                $t_event->C_USER_EDIT->SetDbValueDef($rsnew, CurrentUserID(), NULL);
                $rsnew['C_USER_EDIT'] =& $t_event->C_USER_EDIT->DbValue;

                // C_EDIT_TIME
                $t_event->C_EDIT_TIME->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
                $rsnew['C_EDIT_TIME'] =& $t_event->C_EDIT_TIME->DbValue;

		// C_SEND_MAIL
		$t_event->C_SEND_MAIL->SetDbValueDef($rsnew, $t_event->C_SEND_MAIL->CurrentValue, NULL, FALSE);
                
                if ($t_event->C_SEND_MAIL->CurrentValue == '1')
                {   
		// C_CONTENT_MAIL
		$t_event->C_CONTENT_MAIL->SetDbValueDef($rsnew, $t_event->C_CONTENT_MAIL->CurrentValue, NULL, FALSE);
                
                // send Mail 
                                        $subject = "HPU - Design Event";
                                        $noidung = $t_event->C_EVENT_NAME->CurrentValue." - Loại:".$t_event->C_TYPE_EVENT->CurrentValue;
                                        $hinhanh = $t_event->C_CONTENT_MAIL->CurrentValue;
                                        $hotentacgia =CurrentFullUserName();
                                        $mailtacgia =CurrentEmail();
                                        $sEmail = "hungdq@hpu.edu.vn";// nguoi nhan
                                        $bEmailSent = FALSE;
                                        $bValidEmail = FALSE;
                                        $Cc= "hpudesign@gmail.com"; //mail CC
                                         if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;
                                        
						if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/Event.txt");
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
                    $t_event->C_CONTENT_MAIL->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                } 
                
                
		// C_FK_BROWSE
		$t_event->C_FK_BROWSE->SetDbValueDef($rsnew, $t_event->C_FK_BROWSE->CurrentValue, NULL, FALSE);
                
                  if($t_event->C_FK_BROWSE->CurrentValue <> null)
                 {
                                 
                                       $list_mail =  Get_Mail_Approved ($t_event->C_FK_BROWSE->CurrentValue);
                                        // send Mail bao co noi dung can duyet
                                        $subject = "HPU - Approved Event";
                                        $noidung = $t_event->C_EVENT_NAME->CurrentValue;
                                        $hotentacgia =CurrentFullUserName();
                                        $mailtacgia =CurrentEmail();
                                        $sEmail = $list_mail;// nguoi nhan
                                        $bEmailSent = FALSE;
                                        $bValidEmail = FALSE;
                                         if ($sEmail <> '' && $sEmail <> null) $bValidEmail = TRUE;
                                        
						if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/Approved_Event.txt");
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

                        // FK_ARRAY_TINBAI
                        $t_event->FK_ARRAY_TINBAI->SetDbValueDef($rsnew, $t_event->FK_ARRAY_TINBAI->CurrentValue, NULL, FALSE);

                        // FK_ARRAY_CONGTY
                        $t_event->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_event->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);
      
			// Call Row Updating event
			$bUpdateRow = $t_event->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
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
