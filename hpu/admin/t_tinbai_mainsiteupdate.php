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
$t_tinbai_mainsite_update = new ct_tinbai_mainsite_update();
$Page =& $t_tinbai_mainsite_update;

// Page init
$t_tinbai_mainsite_update->Page_Init();

// Page main
$t_tinbai_mainsite_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_update = new ew_Page("t_tinbai_mainsite_update");

// page properties
t_tinbai_mainsite_update.PageID = "update"; // page ID
t_tinbai_mainsite_update.FormID = "ft_tinbai_mainsiteupdate"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_update.PageID; // for backward compatibility

// extend page with ValidateForm function
t_tinbai_mainsite_update.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_C_TITLE"];
		uelm = fobj.elements["u" + infix + "_C_TITLE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_TITLE->FldCaption()) ?>");
		}
                
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
                        else 
                           {  
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
                radioValue = checkRadio(document.getElementsByName('C_NEW_MYSEFLT[]'));
                if (radioValue==1)
                    {   
                    elm = fobj.elements["x" + infix + "_C_PIC_MYSEFLT"];
                    aelm = fobj.elements["a" + infix + "_C_PIC_MYSEFLT"];
                    var chk_C_PIC_MYSEFLT = (aelm && aelm[0])?(aelm[2].checked):true;
                    if (elm && chk_C_PIC_MYSEFLT && !ew_HasValue(elm))
                            return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption()) ?>");
                    
                    }
                elm = fobj.elements["x" + infix + "_C_ORDER_MAINSITE"];
		uelm = fobj.elements["u" + infix + "_C_ORDER_MAINSITE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption()) ?>");
		}
		elm = fobj.elements["x" + infix + "_C_ORDER_MAINSITE"];
		uelm = fobj.elements["u" + infix + "_C_ORDER_MAINSITE"];
		if (uelm && uelm.checked && elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($t_tinbai_mainsite->C_ORDER_MAINSITE->FldErrMsg()) ?>");
                    
		elm = fobj.elements["x" + infix + "_C_ACTIVE_MAINSITE"];
		uelm = fobj.elements["u" + infix + "_C_ACTIVE_MAINSITE"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption()) ?>");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}
$(document).ready(function() {
      
        $("input[type=checkbox][name=x_C_HIT_MAINSITE[]]").click(function() {
            
            var value = $(this).val();
            if (value != 0) 
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
t_tinbai_mainsite_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_update.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link href="js/select2.css" rel="stylesheet">
<script src="js/select2.js"></script>

    <script id="script_e14">
        $(document).ready(function () {
            $(".x_FK_ARRAY_CONGTY").select2();
          
        });
        
        
        
    </script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<p class="pheader"><?php echo "Xuất bản bài viết" ?></p>
<a href="<?php echo $t_tinbai_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_update->ShowMessage();
?>
<form name="ft_tinbai_mainsiteupdate" id="ft_tinbai_mainsiteupdate" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return t_tinbai_mainsite_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_tinbai_mainsite">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $t_tinbai_mainsite_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($t_tinbai_mainsite_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
 <?php if ($t_tinbai_mainsite->C_TITLE->Visible) { // C_TITLE ?>
	<tr<?php echo $t_tinbai_mainsite->C_TITLE->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>><span id="el_C_TITLE">
                        <input onclick="false" readonly="true" type="text" name="x_C_TITLE" id="x_C_TITLE" title="<?php echo $t_tinbai_mainsite->C_TITLE->FldTitle() ?>" size="130" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_TITLE->EditValue ?>"<?php echo $t_tinbai_mainsite->C_TITLE->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_TITLE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->Visible) { // FK_DMGIOITHIEU_ID ?>
	<tr<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttributes() ?>><span id="el_FK_DMGIOITHIEU_ID">
<select style="width: 230px;" id="x_FK_DMGIOITHIEU_ID" name="x_FK_DMGIOITHIEU_ID" title="<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->EditAttributes() ?>>
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
		<td<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttributes() ?>><span id="el_FK_DMTUYENSINH_ID">
 <select style="width: 230px;" id="x_FK_DMTUYENSINH_ID" name="x_FK_DMTUYENSINH_ID" title="<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldTitle() ?>"<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->EditAttributes() ?>>
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
		<td<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttributes() ?>><?php echo "Đối tượng" ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttributes() ?>><span id="el_FK_DTSVTUONGLAI_ID">
 
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
        <tr <?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->RowAttributes ?>>
            <td <?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>> Danh sách ảnh tưởng ứng với các khối</td>
            <td> 
              <?php
              // adđ code by Quanghung
                 $sSqlWrk = "Select `C_PIC_MAIN`,`C_PIC_SCIENCE`,`C_PIC_ROM`,`C_PIC_MASS`,`C_PIC_LIB` From t_tinbai_levelsite";
                   $sWhereWrk = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.PK_TINBAI_ID = '".$t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue."')";
                    if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                    $rswrk = $conn->Execute($sSqlWrk);
              ?>
                <script language="JavaScript" type="text/javascript"> 
                        $('#bntmainsite').click(function(){
                       
                        alert('fsfs');
                       
                    });
                </script>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MAIN'); ?>"><img src="images/view.gif"> Ảnh nổi bật Mainsite </a>&nbsp;&nbsp;<input id="bntmainsite"  type="button" value="Lựa chọn">
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MAIN'); ?>"><img src="images/view.gif"> Ảnh tin chúng tôi </a> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input id="bntmyself" type="button" value="Lựa chọn"> <br/>
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_SCIENCE'); ?>"><img src="images/view.gif"> Ảnh nổi bật khối khoa </a> &nbsp;&nbsp;
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_ROM'); ?>">  <img src="images/view.gif"> Ảnh nổi bật khối phòng ban </a> &nbsp;&nbsp;
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_MASS'); ?>"> <img src="images/view.gif"> Ảnh nổi bật khối đoàn thể </a> &nbsp;&nbsp;
                 <a title="click chọn để xem" data-fancybox-group="gallery" class="fancybox" href="<?php echo $rswrk->fields('C_PIC_LIB'); ?>"> <img src="images/view.gif">Ảnh nổi bật khối trung tâm </a>  &nbsp;&nbsp;
                <script>
                $( "#bntmainsite" ).click(function() {
                  $('#x_C_PIC_HIT').val('<?php echo $rswrk->fields('C_PIC_MAIN'); ?>');
                });
                $( "#bntmyself" ).click(function() {
                  $('#x_C_PIC_MYSEFLT').val('<?php echo $rswrk->fields('C_PIC_MAIN'); ?>');
                });
                </script>
            </td>
        </tr>
<?php if ($t_tinbai_mainsite->C_HIT_MAINSITE->Visible) { // C_HIT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></td>
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
		<td<?php echo $t_tinbai_mainsite->C_PIC_HIT->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_PIC_HIT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_HIT->CellAttributes() ?>><span id="el_C_PIC_HIT">
<input type="text" name="x_C_PIC_HIT" id="x_C_PIC_HIT" title="<?php echo $t_tinbai_mainsite->C_PIC_HIT->FldTitle() ?>" size="70" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_HIT->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_HIT->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_HIT->CustomMsg ?>
       (Size ảnh của tin nổi bật hiển thị tốt nhất: 745px* 271px) -- <a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>                
                </td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_NEW_MYSEFLT->Visible) { // C_NEW_MYSEFLT ?>
	<tr<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption() ?></td>
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
		<td<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CellAttributes() ?>><span id="el_C_PIC_MYSEFLT">
<input type="text" name="x_C_PIC_MYSEFLT" id="x_C_PIC_MYSEFLT" title="<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->FldTitle() ?>" size="70" maxlength="255" value="<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue ?>"<?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->EditAttributes() ?>>
</span><?php echo $t_tinbai_mainsite->C_PIC_MYSEFLT->CustomMsg ?>
   (Ảnh tin chúng tôi hiển thị tốt nhất size:330px* 211px)--<a target="_blank" href="http://img.hpu.edu.vn"> Kho ảnh sự kiện HPU </a>              
                </td>
	</tr>
<?php } ?>
 <?php if ($t_tinbai_mainsite->C_COMMENT_MAINSITE->Visible) { // C_COMMENT_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption() ?></td>
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
		<td<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?></td>
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
<?php if ($t_tinbai_mainsite->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>><?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->CellAttributes() ?>><span id="el_FK_ARRAY_CONGTY">
<select  tabindex="-1" class="x_FK_ARRAY_CONGTY" size="10" style="width:300px;" id="x_FK_ARRAY_CONGTY[]" name="x_FK_ARRAY_CONGTY[]" title="<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->FldTitle() ?>" multiple="multiple"<?php echo $t_tinbai_mainsite->FK_ARRAY_CONGTY->EditAttributes() ?>>
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
<?php if ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->Visible) { // C_ACTIVE_MAINSITE ?>
	<tr<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttributes() ?>><span id="el_C_ACTIVE_MAINSITE">
<div id="tp_x_C_ACTIVE_MAINSITE" class="<?php echo EW_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldTitle() ?>" value="{value}"<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttributes() ?>></label></div>
<div id="dsl_x_C_ACTIVE_MAINSITE" repeatcolumn="5">
<?php
$arwrk = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_C_ACTIVE_MAINSITE" id="x_C_ACTIVE_MAINSITE" title="<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldTitle() ?>" value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo ew_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_tinbai_mainsite->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_tinbai_mainsite->C_NOTE->RowAttributes ?>>
		<td<?php echo $t_tinbai_mainsite->C_NOTE->CellAttributes() ?>><?php echo $t_tinbai_mainsite->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_tinbai_mainsite->C_NOTE->CellAttributes() ?>><span id="el_C_NOTE">
 <textarea style="font-size: 12px" name="x_C_NOTE" id="x_C_NOTE" title="<?php echo $t_tinbai_mainsite->C_NOTE->FldTitle() ?>" cols="110" rows="4"<?php echo $t_tinbai_mainsite->C_NOTE->EditAttributes() ?>><?php echo $t_tinbai_mainsite->C_NOTE->EditValue ?></textarea>
</span><?php echo $t_tinbai_mainsite->C_NOTE->CustomMsg ?></td>
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
$t_tinbai_mainsite_update->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 't_tinbai_mainsite';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_update';

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
	function ct_tinbai_mainsite_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite)
		$GLOBALS["t_tinbai_mainsite"] = new ct_tinbai_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

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
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $t_tinbai_mainsite;

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
				$t_tinbai_mainsite->CurrentAction = $_POST["a_update"];

				// Get record keys
				$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				while ($sKey <> "") {
					$this->arRecKeys[$this->nKeySelected] = ew_StripSlashes($sKey);
					$this->nKeySelected++;
					$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				}
				$this->GetUploadFiles(); // Get upload files
				$this->LoadFormValues(); // Get form values

				// Validate form
				if (!$this->ValidateForm()) {
					$t_tinbai_mainsite->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("t_tinbai_mainsitelist.php"); // No records selected, return to list
		switch ($t_tinbai_mainsite->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($t_tinbai_mainsite->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$t_tinbai_mainsite->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $t_tinbai_mainsite, $C_PIC_HIT, $C_PIC_MYSEFLT, $C_USER_ADD, $C_ADD_TIME;
		$t_tinbai_mainsite->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
                                        $_SESSION['C_USER_ADD'] =$rs->fields('C_USER_ADD');
                                        $_SESSION['C_ADD_TIME'] =$rs->fields('C_ADD_TIME'); 
                                        $C_PIC_HIT =$rs->fields('C_PIC_HIT');
                                        $C_PIC_MYSEFLT = $rs->fields('C_PIC_MYSEFLT');
					$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
					$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
					$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
					$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
					$t_tinbai_mainsite->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
					$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
					$t_tinbai_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
					$t_tinbai_mainsite->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
					$t_tinbai_mainsite->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
					$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
					$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
					$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
					$t_tinbai_mainsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
                                        $t_tinbai_mainsite->C_PIC_HIT->setDbValue($rs->fields('C_PIC_HIT'));
                                        $t_tinbai_mainsite->C_PIC_MYSEFLT->setDbValue($rs->fields('C_PIC_MYSEFLT'));
                                        $t_tinbai_mainsite->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
                                        $t_tinbai_mainsite->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
                                        $t_tinbai_mainsite->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
				} else {
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DMGIOITHIEU_ID->DbValue, $rs->fields('FK_DMGIOITHIEU_ID')))
						$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DMTUYENSINH_ID->DbValue, $rs->fields('FK_DMTUYENSINH_ID')))
						$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->DbValue, $rs->fields('FK_DTSVTUONGLAI_ID')))
						$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DTSVDANGHOC_ID->DbValue, $rs->fields('FK_DTSVDANGHOC_ID')))
						$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DTCUUSV_ID->DbValue, $rs->fields('FK_DTCUUSV_ID')))
						$t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->DbValue, $rs->fields('FK_DTDOANHNGHIEP_ID')))
						$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_TITLE->DbValue, $rs->fields('C_TITLE')))
						$t_tinbai_mainsite->C_TITLE->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_HIT_MAINSITE->DbValue, $rs->fields('C_HIT_MAINSITE')))
						$t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_NEW_MYSEFLT->DbValue, $rs->fields('C_NEW_MYSEFLT')))
						$t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_ACTIVE_MAINSITE->DbValue, $rs->fields('C_ACTIVE_MAINSITE')))
						$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->DbValue, $rs->fields('C_TIME_ACTIVE_MAINSITE')))
						$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->DbValue, $rs->fields('FK_NGUOIDUNGID_MAINSITE')))
						$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue = NULL;
					if (!ew_CompareValue($t_tinbai_mainsite->C_NOTE->DbValue, $rs->fields('C_NOTE')))
						$t_tinbai_mainsite->C_NOTE->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_tinbai_mainsite->C_PIC_HIT->DbValue, $rs->fields('C_PIC_HIT')))
						$t_tinbai_mainsite->C_PIC_HIT->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_tinbai_mainsite->C_PIC_MYSEFLT->DbValue, $rs->fields('C_PIC_MYSEFLT')))
						$t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_tinbai_mainsite->C_COMMENT_MAINSITE->DbValue, $rs->fields('C_COMMENT_MAINSITE')))
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_tinbai_mainsite->C_ORDER_MAINSITE->DbValue, $rs->fields('C_ORDER_MAINSITE')))
						$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = NULL;
                                        if (!ew_CompareValue($t_tinbai_mainsite->FK_ARRAY_CONGTY->DbValue, $rs->fields('FK_ARRAY_CONGTY')))
						$t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue = NULL;
                                        
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $t_tinbai_mainsite;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $t_tinbai_mainsite->KeyFilter();
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
		global $t_tinbai_mainsite;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $t_tinbai_mainsite;
		$conn->BeginTrans();

		// Get old recordset
		$t_tinbai_mainsite->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $t_tinbai_mainsite->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$t_tinbai_mainsite->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $t_tinbai_mainsite;

		// Get upload data

	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_tinbai_mainsite;
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setFormValue($objForm->GetValue("x_FK_DMGIOITHIEU_ID"));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->MultiUpdate = $objForm->GetValue("u_FK_DMGIOITHIEU_ID");
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setFormValue($objForm->GetValue("x_FK_DMTUYENSINH_ID"));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->MultiUpdate = $objForm->GetValue("u_FK_DMTUYENSINH_ID");
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setFormValue($objForm->GetValue("x_FK_DTSVTUONGLAI_ID"));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->MultiUpdate = $objForm->GetValue("u_FK_DTSVTUONGLAI_ID");
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setFormValue($objForm->GetValue("x_FK_DTSVDANGHOC_ID"));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->MultiUpdate = $objForm->GetValue("u_FK_DTSVDANGHOC_ID");
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setFormValue($objForm->GetValue("x_FK_DTCUUSV_ID"));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->MultiUpdate = $objForm->GetValue("u_FK_DTCUUSV_ID");
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setFormValue($objForm->GetValue("x_FK_DTDOANHNGHIEP_ID"));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->MultiUpdate = $objForm->GetValue("u_FK_DTDOANHNGHIEP_ID");
		$t_tinbai_mainsite->C_TITLE->setFormValue($objForm->GetValue("x_C_TITLE"));
		$t_tinbai_mainsite->C_TITLE->MultiUpdate = $objForm->GetValue("u_C_TITLE");
	        $t_tinbai_mainsite->C_HIT_MAINSITE->setFormValue($objForm->GetValue("x_C_HIT_MAINSITE"));
		$t_tinbai_mainsite->C_HIT_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_HIT_MAINSITE");
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setFormValue($objForm->GetValue("x_C_NEW_MYSEFLT"));
		$t_tinbai_mainsite->C_NEW_MYSEFLT->MultiUpdate = $objForm->GetValue("u_C_NEW_MYSEFLT");
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setFormValue($objForm->GetValue("x_C_ACTIVE_MAINSITE"));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_ACTIVE_MAINSITE");
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setFormValue($objForm->GetValue("x_C_TIME_ACTIVE_MAINSITE"));
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue, 7);
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_TIME_ACTIVE_MAINSITE");
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setFormValue($objForm->GetValue("x_FK_NGUOIDUNGID_MAINSITE"));
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->MultiUpdate = $objForm->GetValue("u_FK_NGUOIDUNGID_MAINSITE");
		$t_tinbai_mainsite->C_NOTE->setFormValue($objForm->GetValue("x_C_NOTE"));
		$t_tinbai_mainsite->C_NOTE->MultiUpdate = $objForm->GetValue("u_C_NOTE");
		$t_tinbai_mainsite->PK_TINBAI_ID->setFormValue($objForm->GetValue("x_PK_TINBAI_ID"));
                $t_tinbai_mainsite->C_COMMENT_MAINSITE->setFormValue($objForm->GetValue("x_C_COMMENT_MAINSITE"));
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_COMMENT_MAINSITE");
                $t_tinbai_mainsite->C_ORDER_MAINSITE->setFormValue($objForm->GetValue("x_C_ORDER_MAINSITE"));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11);
		$t_tinbai_mainsite->C_ORDER_MAINSITE->MultiUpdate = $objForm->GetValue("u_C_ORDER_MAINSITE");
                $t_tinbai_mainsite->FK_ARRAY_CONGTY->setFormValue($objForm->GetValue("x_FK_ARRAY_CONGTY"));
		$t_tinbai_mainsite->FK_ARRAY_CONGTY->MultiUpdate = $objForm->GetValue("u_FK_ARRAY_CONGTY");
                $t_tinbai_mainsite->C_PIC_HIT->setFormValue($objForm->GetValue("x_C_PIC_HIT"));
		$t_tinbai_mainsite->C_PIC_HIT->MultiUpdate = $objForm->GetValue("u_C_PIC_HIT");
                $t_tinbai_mainsite->C_PIC_MYSEFLT->setFormValue($objForm->GetValue("x_C_PIC_MYSEFLT"));
		$t_tinbai_mainsite->C_PIC_MYSEFLT->MultiUpdate = $objForm->GetValue("u_C_PIC_MYSEFLT");
                
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->CurrentValue = $t_tinbai_mainsite->PK_TINBAI_ID->FormValue;
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CurrentValue = $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FormValue;
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->CurrentValue = $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FormValue;
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CurrentValue = $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FormValue;
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CurrentValue = $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FormValue;
		$t_tinbai_mainsite->FK_DTCUUSV_ID->CurrentValue = $t_tinbai_mainsite->FK_DTCUUSV_ID->FormValue;
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CurrentValue = $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FormValue;
		$t_tinbai_mainsite->C_TITLE->CurrentValue = $t_tinbai_mainsite->C_TITLE->FormValue;
		$t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_HIT_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue = $t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue;
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CurrentValue, 7);
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CurrentValue = $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_NOTE->CurrentValue = $t_tinbai_mainsite->C_NOTE->FormValue;
                $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_COMMENT_MAINSITE->FormValue;
                $t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue;
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue = ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11);
                $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue = $t_tinbai_mainsite->FK_ARRAY_CONGTY->FormValue;
                $t_tinbai_mainsite->C_PIC_HIT->CurrentValue = $t_tinbai_mainsite->C_PIC_HIT->FormValue;
                $t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue = $t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue;
                
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_tinbai_mainsite;

		// Call Recordset Selecting event
		$t_tinbai_mainsite->Recordset_Selecting($t_tinbai_mainsite->CurrentFilter);

		// Load List page SQL
		$sSql = $t_tinbai_mainsite->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);
		// Call Recordset Selected event
		$t_tinbai_mainsite->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_mainsite->Row_Rendering();

		// Common render codes for all row types
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

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttrs = array();
                
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

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditAttrs = array();

		// FK_NGUOIDUNGID_MAINSITE
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditAttrs = array();
                
                // C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttrs = array();

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->CellCssStyle = ""; $t_tinbai_mainsite->C_NOTE->CellCssClass = "";
		$t_tinbai_mainsite->C_NOTE->CellAttrs = array(); $t_tinbai_mainsite->C_NOTE->ViewAttrs = array(); $t_tinbai_mainsite->C_NOTE->EditAttrs = array();
		
                // FK_ARRAY_CONGTY
		$t_tinbai_mainsite->FK_ARRAY_CONGTY->CellCssStyle = ""; $t_tinbai_mainsite->FK_ARRAY_CONGTY->CellCssClass = "";
		$t_tinbai_mainsite->FK_ARRAY_CONGTY->CellAttrs = array(); $t_tinbai_mainsite->FK_ARRAY_CONGTY->ViewAttrs = array(); $t_tinbai_mainsite->FK_ARRAY_CONGTY->EditAttrs = array();
                
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

			// C_TITLE
			$t_tinbai_mainsite->C_TITLE->ViewValue = $t_tinbai_mainsite->C_TITLE->CurrentValue;
			$t_tinbai_mainsite->C_TITLE->CssStyle = "";
			$t_tinbai_mainsite->C_TITLE->CssClass = "";
			$t_tinbai_mainsite->C_TITLE->ViewCustomAttributes = "";

			// C_HIT_MAINSITE
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
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Không cho phép" ;
						break;
					case "1":
						$t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewValue = "Cho phép coment facebook";
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
                        
                        // FK_ARRAY_CONGTY
			if (strval($t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue) <> "") {
				$arwrk = explode(",", $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue);
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

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->TooltipValue = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->TooltipValue = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->TooltipValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";
			$t_tinbai_mainsite->C_NOTE->TooltipValue = "";
		} elseif ($t_tinbai_mainsite->RowType == EW_ROWTYPE_EDIT) { // Edit row

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
                        
                        // C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->EditValue = ew_HtmlEncode(ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11));

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
			$arwrk[] = array("0", "Không ");
			$arwrk[] = array("1", "Tin chúng tôi");
			$t_tinbai_mainsite->C_NEW_MYSEFLT->EditValue = $arwrk;

			// C_PIC_MYSEFLT
			$t_tinbai_mainsite->C_PIC_MYSEFLT->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_PIC_MYSEFLT->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_PIC_MYSEFLT->CurrentValue);


			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xuất bản");
			$arwrk[] = array("1", "Xuất bản");
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditValue = $arwrk;
                        
			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không cho phép");
			$arwrk[] = array("1", "Cho phép coment facebook");
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->EditValue = $arwrk;

			// C_TIME_ACTIVE_MAINSITE
			// FK_NGUOIDUNGID_MAINSITE
			// C_NOTE

			$t_tinbai_mainsite->C_NOTE->EditCustomAttributes = "";
			$t_tinbai_mainsite->C_NOTE->EditValue = ew_HtmlEncode($t_tinbai_mainsite->C_NOTE->CurrentValue);

			// Edit refer script
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

			// C_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->HrefValue = "";

			// C_TIME_ACTIVE_MAINSITE
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->HrefValue = "";

			// FK_NGUOIDUNGID_MAINSITE
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->HrefValue = "";

			// C_NOTE
			$t_tinbai_mainsite->C_NOTE->HrefValue = "";
                        
                        // FK_ARRAY_CONGTY
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `PK_MACONGTY`, `C_TENCONGTY`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_congty` ORDER BY `FK_NGANH_ID`";
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

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($t_tinbai_mainsite->C_TITLE->MultiUpdate <> "" && !is_null($t_tinbai_mainsite->C_TITLE->FormValue) && $t_tinbai_mainsite->C_TITLE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_TITLE->FldCaption();
		}
		if ($t_tinbai_mainsite->C_HIT_MAINSITE->MultiUpdate <> "" && $t_tinbai_mainsite->C_HIT_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption();
		}
                if ($t_tinbai_mainsite->C_HIT_MAINSITE->FormValue <> "0") {
                        if (!is_null($t_tinbai_mainsite->C_PIC_HIT->FormValue) && $t_tinbai_mainsite->C_PIC_HIT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_PIC_HIT->FldCaption()." -->Khi lựa chọn tin nổi bật của các đối tượng";
		      }
                }
		if ($t_tinbai_mainsite->C_NEW_MYSEFLT->MultiUpdate <> "" && $t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption();
		}
                 if ($t_tinbai_mainsite->C_NEW_MYSEFLT->FormValue == "1") {
                       if (!is_null($t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue) && $t_tinbai_mainsite->C_PIC_MYSEFLT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_PIC_MYSEFLT->FldCaption()." Khi lựa chọn option: Tin chúng tôi";
		      }
                }
		if ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->MultiUpdate <> "" && $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption();
		}
                
                if ($t_tinbai_mainsite->C_COMMENT_MAINSITE->MultiUpdate <> "" && $t_tinbai_mainsite->C_COMMENT_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption();
		}
                if ($t_tinbai_mainsite->C_ORDER_MAINSITE->MultiUpdate <> "" && !is_null($t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue) && $t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption();
		}
		if ($t_tinbai_mainsite->C_ORDER_MAINSITE->MultiUpdate <> "") {
			if (!ew_CheckEuroDate($t_tinbai_mainsite->C_ORDER_MAINSITE->FormValue)) {
				if ($gsFormError <> "") $gsFormError .= "<br>";
				$gsFormError .= $t_tinbai_mainsite->C_ORDER_MAINSITE->FldErrMsg;
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
			
                        // C_ORDER_MAINSITE
                        
                        $t_tinbai_mainsite->C_ORDER_MAINSITE->SetDbValueDef($rsnew, ew_UnFormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue, 11, FALSE), NULL);
			
                        // C_TITLE
					
			$t_tinbai_mainsite->C_TITLE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_TITLE->CurrentValue, "", FALSE);
			
                        // C_COMMENT_MAINSITE
						
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_COMMENT_MAINSITE->CurrentValue, NULL, FALSE);
		

			// C_HIT_MAINSITE
					
			$t_tinbai_mainsite->C_HIT_MAINSITE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue, NULL, FALSE);
		        
                          // add pic anh tin noi bat
                            if ($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue <> 0 )
                            {
                                   $t_tinbai_mainsite->C_PIC_HIT->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_PIC_HIT->CurrentValue, NULL, FALSE);
                            } else 
                            {
                                   $t_tinbai_mainsite->C_PIC_HIT->SetDbValueDef($rsnew, NULL, NULL, FALSE);
                            }    

			// C_NEW_MYSEFLT
				
			$t_tinbai_mainsite->C_NEW_MYSEFLT->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_NEW_MYSEFLT->CurrentValue, NULL, FALSE);
		        // add anh tin chung toi noi ve chung toi
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
                        
			// C_ACTIVE_MAINSITE
					
			$t_tinbai_mainsite->C_ACTIVE_MAINSITE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue, NULL, FALSE);
		         if ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue == 1) { $t_tinbai_mainsite->C_STATUS_MAINSITE->SetDbValueDef($rsnew, 1, NULL, FALSE); }
                         else { $t_tinbai_mainsite->C_STATUS_MAINSITE->SetDbValueDef($rsnew, 0, NULL, FALSE); }
			// C_TIME_ACTIVE_MAINSITE
			
			$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->SetDbValueDef($rsnew, ew_CurrentDateTime(), NULL);
			$rsnew['C_TIME_ACTIVE_MAINSITE'] =& $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->DbValue;
			

			// FK_NGUOIDUNGID_MAINSITE
				
			$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->SetDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['FK_NGUOIDUNGID_MAINSITE'] =& $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->DbValue;
			
                        // FK_ARRAY_CONGTY
			$t_tinbai_mainsite->FK_ARRAY_CONGTY->SetDbValueDef($rsnew, $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue, NULL, FALSE);
			
			// C_NOTE		
			$t_tinbai_mainsite->C_NOTE->SetDbValueDef($rsnew, $t_tinbai_mainsite->C_NOTE->CurrentValue, NULL, FALSE);

                        // Call Row Updating event
			$bUpdateRow = $t_tinbai_mainsite->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
			   $conn->raiseErrorFn = 'ew_ErrorFn';
                        if ($t_tinbai_mainsite->C_ACTIVE_MAINSITE->CurrentValue == 1)
                        {
                                $sql_delete = "DELETE FROM t_tinbai_mainlevel WHERE t_tinbai_mainlevel.PK_TINBAI_ID ='".$rs->fields('PK_TINBAI_ID')."' AND ((t_tinbai_mainlevel.FK_ARRAY_CONGTY <> 1) OR (t_tinbai_mainlevel.FK_ARRAY_CONGTY IS NULL))";	
                                $Delete_ID=$conn->Execute($sql_delete);
                                if (strval($t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue) <> "") {
                                        $arwrk = explode(",", $t_tinbai_mainsite->FK_ARRAY_CONGTY->CurrentValue);
                                        foreach ($arwrk as $wrk) {
                                                $sql = "INSERT INTO t_tinbai_mainlevel (PK_TINBAI_ID,FK_CONGTY,FK_EDITOR_ID,C_USER_ADD,C_ADD_TIME) VALUES ( '".$rs->fields('PK_TINBAI_ID')."','". ew_AdjustSql(trim($wrk))."','-20','". $_SESSION['C_USER_ADD']."','". $_SESSION['C_ADD_TIME']."') ";	
                                                $Add_ID=$conn->Execute($sql);
                                        }

                                }
                        } else 
                        {
                                $sql_delete = "DELETE FROM t_tinbai_mainlevel WHERE t_tinbai_mainlevel.PK_TINBAI_ID ='".$rs->fields('PK_TINBAI_ID')."'";	
                                $Delete_ID=$conn->Execute($sql_delete);
                        }    
                        
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

