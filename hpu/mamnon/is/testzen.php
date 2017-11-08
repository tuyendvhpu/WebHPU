<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "adodb" . EW_PATH_DELIMITER . "adodb.inc.php" ?>
<?php include "phpfn7.php" ?>
<?php include "NhanVieninfo.php" ?>
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
$NhanVien_list = new cNhanVien_list();
$Page =& $NhanVien_list;

// Page init
$NhanVien_list->Page_Init();

// Page main
$NhanVien_list->Page_Main();
?>
<?php include "include/header.php" ?>

<div id="wrapper">
<?php include "include/navbar.php" ?> 

<?php if ($NhanVien->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var NhanVien_list = new ew_Page("NhanVien_list");

// page properties
NhanVien_list.PageID = "list"; // page ID
NhanVien_list.FormID = "fNhanVienlist"; // form ID
var EW_PAGE_ID = NhanVien_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
NhanVien_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
NhanVien_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
NhanVien_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
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
<?php } ?>
<?php if ($NhanVien->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$NhanVien_list->lTotalRecs = $NhanVien->SelectRecordCount();
	} else {
		if ($rs = $NhanVien_list->LoadRecordset())
			$NhanVien_list->lTotalRecs = $rs->RecordCount();
	}
	$NhanVien_list->lStartRec = 1;
	if ($NhanVien_list->lDisplayRecs <= 0 || ($NhanVien->Export <> "" && $NhanVien->ExportAll)) // Display all records
		$NhanVien_list->lDisplayRecs = $NhanVien_list->lTotalRecs;
	if (!($NhanVien->Export <> "" && $NhanVien->ExportAll))
		$NhanVien_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $NhanVien_list->LoadRecordset($NhanVien_list->lStartRec-1, $NhanVien_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $NhanVien->TableCaption() ?>
</span></p>
<?php if ($NhanVien->Export == "" && $NhanVien->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(NhanVien_list);" style="text-decoration: none;"><img id="NhanVien_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="NhanVien_list_SearchPanel">
<form name="fNhanVienlistsrch" id="fNhanVienlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="NhanVien">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($NhanVien->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $NhanVien_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($NhanVien->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($NhanVien->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($NhanVien->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$NhanVien_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="fNhanVienlist" id="fNhanVienlist" class="ewForm" action="" method="post">
<div id="gmp_NhanVien" class="ewGridMiddlePanel">
<?php if ($NhanVien_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $NhanVien->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$NhanVien_list->RenderListOptions();

// Render list options (header, left)
$NhanVien_list->ListOptions->Render("header", "left");
?>
<?php if ($NhanVien->NhanVienID->Visible) { // NhanVienID ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NhanVienID) == "") { ?>
		<td><?php echo $NhanVien->NhanVienID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NhanVienID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NhanVienID->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->NhanVienID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NhanVienID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->HoTen->Visible) { // HoTen ?>
	<?php if ($NhanVien->SortUrl($NhanVien->HoTen) == "") { ?>
		<td><?php echo $NhanVien->HoTen->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->HoTen) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->HoTen->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->HoTen->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->HoTen->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgaySinh->Visible) { // NgaySinh ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgaySinh) == "") { ?>
		<td><?php echo $NhanVien->NgaySinh->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgaySinh) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgaySinh->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->NgaySinh->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgaySinh->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->GioiTinh->Visible) { // GioiTinh ?>
	<?php if ($NhanVien->SortUrl($NhanVien->GioiTinh) == "") { ?>
		<td><?php echo $NhanVien->GioiTinh->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->GioiTinh) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->GioiTinh->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->GioiTinh->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->GioiTinh->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DanToc->Visible) { // DanToc ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DanToc) == "") { ?>
		<td><?php echo $NhanVien->DanToc->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DanToc) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DanToc->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DanToc->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DanToc->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->TonGiao->Visible) { // TonGiao ?>
	<?php if ($NhanVien->SortUrl($NhanVien->TonGiao) == "") { ?>
		<td><?php echo $NhanVien->TonGiao->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->TonGiao) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->TonGiao->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->TonGiao->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->TonGiao->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->SoCMND->Visible) { // SoCMND ?>
	<?php if ($NhanVien->SortUrl($NhanVien->SoCMND) == "") { ?>
		<td><?php echo $NhanVien->SoCMND->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->SoCMND) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->SoCMND->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->SoCMND->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->SoCMND->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgayCapCMND->Visible) { // NgayCapCMND ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgayCapCMND) == "") { ?>
		<td><?php echo $NhanVien->NgayCapCMND->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgayCapCMND) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgayCapCMND->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgayCapCMND->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgayCapCMND->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NoiCapCMND->Visible) { // NoiCapCMND ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NoiCapCMND) == "") { ?>
		<td><?php echo $NhanVien->NoiCapCMND->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NoiCapCMND) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NoiCapCMND->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NoiCapCMND->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NoiCapCMND->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DiaChi->Visible) { // DiaChi ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DiaChi) == "") { ?>
		<td><?php echo $NhanVien->DiaChi->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DiaChi) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DiaChi->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DiaChi->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DiaChi->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DienThoai->Visible) { // DienThoai ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DienThoai) == "") { ?>
		<td><?php echo $NhanVien->DienThoai->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DienThoai) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DienThoai->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DienThoai->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DienThoai->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->zEmail->Visible) { // Email ?>
	<?php if ($NhanVien->SortUrl($NhanVien->zEmail) == "") { ?>
		<td><?php echo $NhanVien->zEmail->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->zEmail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->zEmail->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->zEmail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->zEmail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->IsGiaoVien->Visible) { // IsGiaoVien ?>
	<?php if ($NhanVien->SortUrl($NhanVien->IsGiaoVien) == "") { ?>
		<td><?php echo $NhanVien->IsGiaoVien->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->IsGiaoVien) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->IsGiaoVien->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->IsGiaoVien->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->IsGiaoVien->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->ChucVuID->Visible) { // ChucVuID ?>
	<?php if ($NhanVien->SortUrl($NhanVien->ChucVuID) == "") { ?>
		<td><?php echo $NhanVien->ChucVuID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->ChucVuID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->ChucVuID->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->ChucVuID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->ChucVuID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->TrinhDoID->Visible) { // TrinhDoID ?>
	<?php if ($NhanVien->SortUrl($NhanVien->TrinhDoID) == "") { ?>
		<td><?php echo $NhanVien->TrinhDoID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->TrinhDoID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->TrinhDoID->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->TrinhDoID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->TrinhDoID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->BacLuong->Visible) { // BacLuong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->BacLuong) == "") { ?>
		<td><?php echo $NhanVien->BacLuong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->BacLuong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->BacLuong->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->BacLuong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->BacLuong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->HeSoLuong->Visible) { // HeSoLuong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->HeSoLuong) == "") { ?>
		<td><?php echo $NhanVien->HeSoLuong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->HeSoLuong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->HeSoLuong->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->HeSoLuong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->HeSoLuong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->LuongCoBan->Visible) { // LuongCoBan ?>
	<?php if ($NhanVien->SortUrl($NhanVien->LuongCoBan) == "") { ?>
		<td><?php echo $NhanVien->LuongCoBan->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->LuongCoBan) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->LuongCoBan->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->LuongCoBan->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->LuongCoBan->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->LuongNgay->Visible) { // LuongNgay ?>
	<?php if ($NhanVien->SortUrl($NhanVien->LuongNgay) == "") { ?>
		<td><?php echo $NhanVien->LuongNgay->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->LuongNgay) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->LuongNgay->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->LuongNgay->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->LuongNgay->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgayNangLuong->Visible) { // NgayNangLuong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgayNangLuong) == "") { ?>
		<td><?php echo $NhanVien->NgayNangLuong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgayNangLuong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgayNangLuong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgayNangLuong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgayNangLuong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgayVaoLamViec->Visible) { // NgayVaoLamViec ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgayVaoLamViec) == "") { ?>
		<td><?php echo $NhanVien->NgayVaoLamViec->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgayVaoLamViec) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgayVaoLamViec->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->NgayVaoLamViec->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgayVaoLamViec->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DaNghiViec->Visible) { // DaNghiViec ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DaNghiViec) == "") { ?>
		<td><?php echo $NhanVien->DaNghiViec->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DaNghiViec) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DaNghiViec->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->DaNghiViec->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DaNghiViec->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgayNghiViec->Visible) { // NgayNghiViec ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgayNghiViec) == "") { ?>
		<td><?php echo $NhanVien->NgayNghiViec->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgayNghiViec) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgayNghiViec->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->NgayNghiViec->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgayNghiViec->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->IsDangVien->Visible) { // IsDangVien ?>
	<?php if ($NhanVien->SortUrl($NhanVien->IsDangVien) == "") { ?>
		<td><?php echo $NhanVien->IsDangVien->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->IsDangVien) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->IsDangVien->FldCaption() ?></td><td style="width: 10px;"><?php if ($NhanVien->IsDangVien->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->IsDangVien->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgayVaoDang->Visible) { // NgayVaoDang ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgayVaoDang) == "") { ?>
		<td><?php echo $NhanVien->NgayVaoDang->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgayVaoDang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgayVaoDang->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgayVaoDang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgayVaoDang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->SoTheDang->Visible) { // SoTheDang ?>
	<?php if ($NhanVien->SortUrl($NhanVien->SoTheDang) == "") { ?>
		<td><?php echo $NhanVien->SoTheDang->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->SoTheDang) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->SoTheDang->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->SoTheDang->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->SoTheDang->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->ThanhPhanGiaDinh->Visible) { // ThanhPhanGiaDinh ?>
	<?php if ($NhanVien->SortUrl($NhanVien->ThanhPhanGiaDinh) == "") { ?>
		<td><?php echo $NhanVien->ThanhPhanGiaDinh->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->ThanhPhanGiaDinh) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->ThanhPhanGiaDinh->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->ThanhPhanGiaDinh->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->ThanhPhanGiaDinh->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->HoTenCha->Visible) { // HoTenCha ?>
	<?php if ($NhanVien->SortUrl($NhanVien->HoTenCha) == "") { ?>
		<td><?php echo $NhanVien->HoTenCha->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->HoTenCha) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->HoTenCha->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->HoTenCha->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->HoTenCha->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NamSinhCha->Visible) { // NamSinhCha ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NamSinhCha) == "") { ?>
		<td><?php echo $NhanVien->NamSinhCha->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NamSinhCha) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NamSinhCha->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NamSinhCha->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NamSinhCha->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgheNghiepCha->Visible) { // NgheNghiepCha ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgheNghiepCha) == "") { ?>
		<td><?php echo $NhanVien->NgheNghiepCha->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgheNghiepCha) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgheNghiepCha->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgheNghiepCha->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgheNghiepCha->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->HoTenMe->Visible) { // HoTenMe ?>
	<?php if ($NhanVien->SortUrl($NhanVien->HoTenMe) == "") { ?>
		<td><?php echo $NhanVien->HoTenMe->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->HoTenMe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->HoTenMe->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->HoTenMe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->HoTenMe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NamSinhMe->Visible) { // NamSinhMe ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NamSinhMe) == "") { ?>
		<td><?php echo $NhanVien->NamSinhMe->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NamSinhMe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NamSinhMe->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NamSinhMe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NamSinhMe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgheNghiepMe->Visible) { // NgheNghiepMe ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgheNghiepMe) == "") { ?>
		<td><?php echo $NhanVien->NgheNghiepMe->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgheNghiepMe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgheNghiepMe->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgheNghiepMe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgheNghiepMe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DiaChiChaMe->Visible) { // DiaChiChaMe ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DiaChiChaMe) == "") { ?>
		<td><?php echo $NhanVien->DiaChiChaMe->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DiaChiChaMe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DiaChiChaMe->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DiaChiChaMe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DiaChiChaMe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DienThoaiChaMe->Visible) { // DienThoaiChaMe ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DienThoaiChaMe) == "") { ?>
		<td><?php echo $NhanVien->DienThoaiChaMe->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DienThoaiChaMe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DienThoaiChaMe->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DienThoaiChaMe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DienThoaiChaMe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->HoTenVoChong->Visible) { // HoTenVoChong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->HoTenVoChong) == "") { ?>
		<td><?php echo $NhanVien->HoTenVoChong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->HoTenVoChong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->HoTenVoChong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->HoTenVoChong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->HoTenVoChong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NamSinhVoChong->Visible) { // NamSinhVoChong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NamSinhVoChong) == "") { ?>
		<td><?php echo $NhanVien->NamSinhVoChong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NamSinhVoChong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NamSinhVoChong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NamSinhVoChong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NamSinhVoChong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->NgheNghiepVoChong->Visible) { // NgheNghiepVoChong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->NgheNghiepVoChong) == "") { ?>
		<td><?php echo $NhanVien->NgheNghiepVoChong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->NgheNghiepVoChong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->NgheNghiepVoChong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->NgheNghiepVoChong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->NgheNghiepVoChong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->DienThoaiVoChong->Visible) { // DienThoaiVoChong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->DienThoaiVoChong) == "") { ?>
		<td><?php echo $NhanVien->DienThoaiVoChong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->DienThoaiVoChong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->DienThoaiVoChong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->DienThoaiVoChong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->DienThoaiVoChong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->Ho->Visible) { // Ho ?>
	<?php if ($NhanVien->SortUrl($NhanVien->Ho) == "") { ?>
		<td><?php echo $NhanVien->Ho->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->Ho) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->Ho->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->Ho->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->Ho->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->Ten->Visible) { // Ten ?>
	<?php if ($NhanVien->SortUrl($NhanVien->Ten) == "") { ?>
		<td><?php echo $NhanVien->Ten->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->Ten) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->Ten->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->Ten->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->Ten->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($NhanVien->LoaiHopDong->Visible) { // LoaiHopDong ?>
	<?php if ($NhanVien->SortUrl($NhanVien->LoaiHopDong) == "") { ?>
		<td><?php echo $NhanVien->LoaiHopDong->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $NhanVien->SortUrl($NhanVien->LoaiHopDong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $NhanVien->LoaiHopDong->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($NhanVien->LoaiHopDong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($NhanVien->LoaiHopDong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$NhanVien_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($NhanVien->ExportAll && $NhanVien->Export <> "") {
	$NhanVien_list->lStopRec = $NhanVien_list->lTotalRecs;
} else {
	$NhanVien_list->lStopRec = $NhanVien_list->lStartRec + $NhanVien_list->lDisplayRecs - 1; // Set the last record to display
}
$NhanVien_list->lRecCount = $NhanVien_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $NhanVien_list->lStartRec > 1)
		$rs->Move($NhanVien_list->lStartRec - 1);
}

// Initialize aggregate
$NhanVien->RowType = EW_ROWTYPE_AGGREGATEINIT;
$NhanVien_list->RenderRow();
$NhanVien_list->lRowCnt = 0;
while (($NhanVien->CurrentAction == "gridadd" || !$rs->EOF) &&
	$NhanVien_list->lRecCount < $NhanVien_list->lStopRec) {
	$NhanVien_list->lRecCount++;
	if (intval($NhanVien_list->lRecCount) >= intval($NhanVien_list->lStartRec)) {
		$NhanVien_list->lRowCnt++;

	// Init row class and style
	$NhanVien->CssClass = "";
	$NhanVien->CssStyle = "";
	$NhanVien->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($NhanVien->CurrentAction == "gridadd") {
		$NhanVien_list->LoadDefaultValues(); // Load default values
	} else {
		$NhanVien_list->LoadRowValues($rs); // Load row values
	}
	$NhanVien->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$NhanVien_list->RenderRow();

	// Render list options
	$NhanVien_list->RenderListOptions();
?>

	<tr<?php echo $NhanVien->RowAttributes() ?>>
<?php

// Render list options (body, left)
$NhanVien_list->ListOptions->Render("body", "left");
?>
	<?php if ($NhanVien->NhanVienID->Visible) { // NhanVienID ?>
		<td<?php echo $NhanVien->NhanVienID->CellAttributes() ?>>
<div<?php echo $NhanVien->NhanVienID->ViewAttributes() ?>><?php echo $NhanVien->NhanVienID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->HoTen->Visible) { // HoTen ?>
		<td<?php echo $NhanVien->HoTen->CellAttributes() ?>>
<div<?php echo $NhanVien->HoTen->ViewAttributes() ?>><?php echo $NhanVien->HoTen->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgaySinh->Visible) { // NgaySinh ?>
		<td<?php echo $NhanVien->NgaySinh->CellAttributes() ?>>
<div<?php echo $NhanVien->NgaySinh->ViewAttributes() ?>><?php echo $NhanVien->NgaySinh->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->GioiTinh->Visible) { // GioiTinh ?>
		<td<?php echo $NhanVien->GioiTinh->CellAttributes() ?>>
<?php if (ew_ConvertToBool($NhanVien->GioiTinh->CurrentValue)) { ?>
<input type="checkbox" value="<?php echo $NhanVien->GioiTinh->ListViewValue() ?>" checked="checked" onclick="this.form.reset();" disabled="disabled">
<?php } else { ?>
<input type="checkbox" value="<?php echo $NhanVien->GioiTinh->ListViewValue() ?>" onclick="this.form.reset();" disabled="disabled">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($NhanVien->DanToc->Visible) { // DanToc ?>
		<td<?php echo $NhanVien->DanToc->CellAttributes() ?>>
<div<?php echo $NhanVien->DanToc->ViewAttributes() ?>><?php echo $NhanVien->DanToc->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->TonGiao->Visible) { // TonGiao ?>
		<td<?php echo $NhanVien->TonGiao->CellAttributes() ?>>
<div<?php echo $NhanVien->TonGiao->ViewAttributes() ?>><?php echo $NhanVien->TonGiao->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->SoCMND->Visible) { // SoCMND ?>
		<td<?php echo $NhanVien->SoCMND->CellAttributes() ?>>
<div<?php echo $NhanVien->SoCMND->ViewAttributes() ?>><?php echo $NhanVien->SoCMND->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgayCapCMND->Visible) { // NgayCapCMND ?>
		<td<?php echo $NhanVien->NgayCapCMND->CellAttributes() ?>>
<div<?php echo $NhanVien->NgayCapCMND->ViewAttributes() ?>><?php echo $NhanVien->NgayCapCMND->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NoiCapCMND->Visible) { // NoiCapCMND ?>
		<td<?php echo $NhanVien->NoiCapCMND->CellAttributes() ?>>
<div<?php echo $NhanVien->NoiCapCMND->ViewAttributes() ?>><?php echo $NhanVien->NoiCapCMND->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DiaChi->Visible) { // DiaChi ?>
		<td<?php echo $NhanVien->DiaChi->CellAttributes() ?>>
<div<?php echo $NhanVien->DiaChi->ViewAttributes() ?>><?php echo $NhanVien->DiaChi->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DienThoai->Visible) { // DienThoai ?>
		<td<?php echo $NhanVien->DienThoai->CellAttributes() ?>>
<div<?php echo $NhanVien->DienThoai->ViewAttributes() ?>><?php echo $NhanVien->DienThoai->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->zEmail->Visible) { // Email ?>
		<td<?php echo $NhanVien->zEmail->CellAttributes() ?>>
<div<?php echo $NhanVien->zEmail->ViewAttributes() ?>><?php echo $NhanVien->zEmail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->IsGiaoVien->Visible) { // IsGiaoVien ?>
		<td<?php echo $NhanVien->IsGiaoVien->CellAttributes() ?>>
<?php if (ew_ConvertToBool($NhanVien->IsGiaoVien->CurrentValue)) { ?>
<input type="checkbox" value="<?php echo $NhanVien->IsGiaoVien->ListViewValue() ?>" checked="checked" onclick="this.form.reset();" disabled="disabled">
<?php } else { ?>
<input type="checkbox" value="<?php echo $NhanVien->IsGiaoVien->ListViewValue() ?>" onclick="this.form.reset();" disabled="disabled">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($NhanVien->ChucVuID->Visible) { // ChucVuID ?>
		<td<?php echo $NhanVien->ChucVuID->CellAttributes() ?>>
<div<?php echo $NhanVien->ChucVuID->ViewAttributes() ?>><?php echo $NhanVien->ChucVuID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->TrinhDoID->Visible) { // TrinhDoID ?>
		<td<?php echo $NhanVien->TrinhDoID->CellAttributes() ?>>
<div<?php echo $NhanVien->TrinhDoID->ViewAttributes() ?>><?php echo $NhanVien->TrinhDoID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->BacLuong->Visible) { // BacLuong ?>
		<td<?php echo $NhanVien->BacLuong->CellAttributes() ?>>
<div<?php echo $NhanVien->BacLuong->ViewAttributes() ?>><?php echo $NhanVien->BacLuong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->HeSoLuong->Visible) { // HeSoLuong ?>
		<td<?php echo $NhanVien->HeSoLuong->CellAttributes() ?>>
<div<?php echo $NhanVien->HeSoLuong->ViewAttributes() ?>><?php echo $NhanVien->HeSoLuong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->LuongCoBan->Visible) { // LuongCoBan ?>
		<td<?php echo $NhanVien->LuongCoBan->CellAttributes() ?>>
<div<?php echo $NhanVien->LuongCoBan->ViewAttributes() ?>><?php echo $NhanVien->LuongCoBan->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->LuongNgay->Visible) { // LuongNgay ?>
		<td<?php echo $NhanVien->LuongNgay->CellAttributes() ?>>
<div<?php echo $NhanVien->LuongNgay->ViewAttributes() ?>><?php echo $NhanVien->LuongNgay->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgayNangLuong->Visible) { // NgayNangLuong ?>
		<td<?php echo $NhanVien->NgayNangLuong->CellAttributes() ?>>
<div<?php echo $NhanVien->NgayNangLuong->ViewAttributes() ?>><?php echo $NhanVien->NgayNangLuong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgayVaoLamViec->Visible) { // NgayVaoLamViec ?>
		<td<?php echo $NhanVien->NgayVaoLamViec->CellAttributes() ?>>
<div<?php echo $NhanVien->NgayVaoLamViec->ViewAttributes() ?>><?php echo $NhanVien->NgayVaoLamViec->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DaNghiViec->Visible) { // DaNghiViec ?>
		<td<?php echo $NhanVien->DaNghiViec->CellAttributes() ?>>
<?php if (ew_ConvertToBool($NhanVien->DaNghiViec->CurrentValue)) { ?>
<input type="checkbox" value="<?php echo $NhanVien->DaNghiViec->ListViewValue() ?>" checked="checked" onclick="this.form.reset();" disabled="disabled">
<?php } else { ?>
<input type="checkbox" value="<?php echo $NhanVien->DaNghiViec->ListViewValue() ?>" onclick="this.form.reset();" disabled="disabled">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgayNghiViec->Visible) { // NgayNghiViec ?>
		<td<?php echo $NhanVien->NgayNghiViec->CellAttributes() ?>>
<div<?php echo $NhanVien->NgayNghiViec->ViewAttributes() ?>><?php echo $NhanVien->NgayNghiViec->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->IsDangVien->Visible) { // IsDangVien ?>
		<td<?php echo $NhanVien->IsDangVien->CellAttributes() ?>>
<?php if (ew_ConvertToBool($NhanVien->IsDangVien->CurrentValue)) { ?>
<input type="checkbox" value="<?php echo $NhanVien->IsDangVien->ListViewValue() ?>" checked="checked" onclick="this.form.reset();" disabled="disabled">
<?php } else { ?>
<input type="checkbox" value="<?php echo $NhanVien->IsDangVien->ListViewValue() ?>" onclick="this.form.reset();" disabled="disabled">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgayVaoDang->Visible) { // NgayVaoDang ?>
		<td<?php echo $NhanVien->NgayVaoDang->CellAttributes() ?>>
<div<?php echo $NhanVien->NgayVaoDang->ViewAttributes() ?>><?php echo $NhanVien->NgayVaoDang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->SoTheDang->Visible) { // SoTheDang ?>
		<td<?php echo $NhanVien->SoTheDang->CellAttributes() ?>>
<div<?php echo $NhanVien->SoTheDang->ViewAttributes() ?>><?php echo $NhanVien->SoTheDang->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->ThanhPhanGiaDinh->Visible) { // ThanhPhanGiaDinh ?>
		<td<?php echo $NhanVien->ThanhPhanGiaDinh->CellAttributes() ?>>
<div<?php echo $NhanVien->ThanhPhanGiaDinh->ViewAttributes() ?>><?php echo $NhanVien->ThanhPhanGiaDinh->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->HoTenCha->Visible) { // HoTenCha ?>
		<td<?php echo $NhanVien->HoTenCha->CellAttributes() ?>>
<div<?php echo $NhanVien->HoTenCha->ViewAttributes() ?>><?php echo $NhanVien->HoTenCha->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NamSinhCha->Visible) { // NamSinhCha ?>
		<td<?php echo $NhanVien->NamSinhCha->CellAttributes() ?>>
<div<?php echo $NhanVien->NamSinhCha->ViewAttributes() ?>><?php echo $NhanVien->NamSinhCha->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgheNghiepCha->Visible) { // NgheNghiepCha ?>
		<td<?php echo $NhanVien->NgheNghiepCha->CellAttributes() ?>>
<div<?php echo $NhanVien->NgheNghiepCha->ViewAttributes() ?>><?php echo $NhanVien->NgheNghiepCha->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->HoTenMe->Visible) { // HoTenMe ?>
		<td<?php echo $NhanVien->HoTenMe->CellAttributes() ?>>
<div<?php echo $NhanVien->HoTenMe->ViewAttributes() ?>><?php echo $NhanVien->HoTenMe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NamSinhMe->Visible) { // NamSinhMe ?>
		<td<?php echo $NhanVien->NamSinhMe->CellAttributes() ?>>
<div<?php echo $NhanVien->NamSinhMe->ViewAttributes() ?>><?php echo $NhanVien->NamSinhMe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgheNghiepMe->Visible) { // NgheNghiepMe ?>
		<td<?php echo $NhanVien->NgheNghiepMe->CellAttributes() ?>>
<div<?php echo $NhanVien->NgheNghiepMe->ViewAttributes() ?>><?php echo $NhanVien->NgheNghiepMe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DiaChiChaMe->Visible) { // DiaChiChaMe ?>
		<td<?php echo $NhanVien->DiaChiChaMe->CellAttributes() ?>>
<div<?php echo $NhanVien->DiaChiChaMe->ViewAttributes() ?>><?php echo $NhanVien->DiaChiChaMe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DienThoaiChaMe->Visible) { // DienThoaiChaMe ?>
		<td<?php echo $NhanVien->DienThoaiChaMe->CellAttributes() ?>>
<div<?php echo $NhanVien->DienThoaiChaMe->ViewAttributes() ?>><?php echo $NhanVien->DienThoaiChaMe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->HoTenVoChong->Visible) { // HoTenVoChong ?>
		<td<?php echo $NhanVien->HoTenVoChong->CellAttributes() ?>>
<div<?php echo $NhanVien->HoTenVoChong->ViewAttributes() ?>><?php echo $NhanVien->HoTenVoChong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NamSinhVoChong->Visible) { // NamSinhVoChong ?>
		<td<?php echo $NhanVien->NamSinhVoChong->CellAttributes() ?>>
<div<?php echo $NhanVien->NamSinhVoChong->ViewAttributes() ?>><?php echo $NhanVien->NamSinhVoChong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->NgheNghiepVoChong->Visible) { // NgheNghiepVoChong ?>
		<td<?php echo $NhanVien->NgheNghiepVoChong->CellAttributes() ?>>
<div<?php echo $NhanVien->NgheNghiepVoChong->ViewAttributes() ?>><?php echo $NhanVien->NgheNghiepVoChong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->DienThoaiVoChong->Visible) { // DienThoaiVoChong ?>
		<td<?php echo $NhanVien->DienThoaiVoChong->CellAttributes() ?>>
<div<?php echo $NhanVien->DienThoaiVoChong->ViewAttributes() ?>><?php echo $NhanVien->DienThoaiVoChong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->Ho->Visible) { // Ho ?>
		<td<?php echo $NhanVien->Ho->CellAttributes() ?>>
<div<?php echo $NhanVien->Ho->ViewAttributes() ?>><?php echo $NhanVien->Ho->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->Ten->Visible) { // Ten ?>
		<td<?php echo $NhanVien->Ten->CellAttributes() ?>>
<div<?php echo $NhanVien->Ten->ViewAttributes() ?>><?php echo $NhanVien->Ten->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($NhanVien->LoaiHopDong->Visible) { // LoaiHopDong ?>
		<td<?php echo $NhanVien->LoaiHopDong->CellAttributes() ?>>
<div<?php echo $NhanVien->LoaiHopDong->ViewAttributes() ?>><?php echo $NhanVien->LoaiHopDong->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$NhanVien_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($NhanVien->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
<?php if ($NhanVien->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($NhanVien->CurrentAction <> "gridadd" && $NhanVien->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($NhanVien_list->Pager)) $NhanVien_list->Pager = new cPrevNextPager($NhanVien_list->lStartRec, $NhanVien_list->lDisplayRecs, $NhanVien_list->lTotalRecs) ?>
<?php if ($NhanVien_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($NhanVien_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $NhanVien_list->PageUrl() ?>start=<?php echo $NhanVien_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($NhanVien_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $NhanVien_list->PageUrl() ?>start=<?php echo $NhanVien_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $NhanVien_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($NhanVien_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $NhanVien_list->PageUrl() ?>start=<?php echo $NhanVien_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($NhanVien_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $NhanVien_list->PageUrl() ?>start=<?php echo $NhanVien_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $NhanVien_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $NhanVien_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $NhanVien_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $NhanVien_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($NhanVien_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($NhanVien_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<a href="<?php echo $NhanVien_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
</span>
<?php //} ?>
</div>
<?php } ?>
</td></tr></table>
<div id="push"></div>  <!-- end wrapper--></div>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>    

<?php include "include/is_footer.php" ?>
<?php
$NhanVien_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cNhanVien_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'NhanVien';

	// Page object name
	var $PageObjName = 'NhanVien_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $NhanVien;
		if ($NhanVien->UseTokenInUrl) $PageUrl .= "t=" . $NhanVien->TableVar . "&"; // Add page token
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
		global $objForm, $NhanVien;
		if ($NhanVien->UseTokenInUrl) {
			if ($objForm)
				return ($NhanVien->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($NhanVien->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cNhanVien_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (NhanVien)
		$GLOBALS["NhanVien"] = new cNhanVien();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["NhanVien"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "NhanViendelete.php";
		$this->MultiUpdateUrl = "NhanVienupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'NhanVien', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();

		// List options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $NhanVien;

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$NhanVien->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$NhanVien->Export = $_POST["exporttype"];
		} else {
			$NhanVien->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $NhanVien->Export; // Get export parameter, used in header
		$gsExportFile = $NhanVien->TableVar; // Get export file, used in header

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

	// Class variables
	var $ListOptions; // List options
	var $lDisplayRecs = 20;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $sSrchWhere = ""; // Search WHERE clause
	var $lRecCnt = 0; // Record count
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex; // Row index
	var $lRecPerRow = 0;
	var $lColCnt = 0;
	var $sDbMasterFilter = ""; // Master filter
	var $sDbDetailFilter = ""; // Detail filter
	var $bMasterRecordExists;	
	var $sMultiSelectKey;
	var $RestoreSearch;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsSearchError, $Security, $NhanVien;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up list options
			$this->SetupListOptions();

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$NhanVien->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($NhanVien->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $NhanVien->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchAdvanced . ")" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchBasic. ")" : $sSrchBasic;

		// Call Recordset_Searching event
		$NhanVien->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$NhanVien->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$NhanVien->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $NhanVien->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$NhanVien->setSessionWhere($sFilter);
		$NhanVien->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $NhanVien;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->HoTen, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DanToc, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->TonGiao, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->SoCMND, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgayCapCMND, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NoiCapCMND, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DiaChi, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DienThoai, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->zEmail, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgayNangLuong, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgayVaoDang, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->SoTheDang, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->ThanhPhanGiaDinh, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->HoTenCha, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NamSinhCha, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgheNghiepCha, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->HoTenMe, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NamSinhMe, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgheNghiepMe, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DiaChiChaMe, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DienThoaiChaMe, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->HoTenVoChong, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NamSinhVoChong, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->NgheNghiepVoChong, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->DienThoaiVoChong, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->Ho, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->Ten, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $NhanVien->LoaiHopDong, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		$sFldExpression = ($Fld->FldVirtualExpression <> "") ? $Fld->FldVirtualExpression : $Fld->FldExpression;
		$lFldDataType = ($Fld->FldIsVirtual) ? EW_DATATYPE_STRING : $Fld->FldDataType;
		if ($lFldDataType == EW_DATATYPE_NUMBER) {
			$sWrk = $sFldExpression . " = " . ew_QuotedValue($Keyword, $lFldDataType);
		} else {
			$sWrk = $sFldExpression . " LIKE " . ew_QuotedValue("%" . $Keyword . "%", $lFldDataType);
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $NhanVien;
		$sSearchStr = "";
		$sSearchKeyword = $NhanVien->BasicSearchKeyword;
		$sSearchType = $NhanVien->BasicSearchType;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$NhanVien->setSessionBasicSearchKeyword($sSearchKeyword);
			$NhanVien->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $NhanVien;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$NhanVien->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $NhanVien;
		$NhanVien->setSessionBasicSearchKeyword("");
		$NhanVien->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $NhanVien;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$NhanVien->BasicSearchKeyword = $NhanVien->getSessionBasicSearchKeyword();
			$NhanVien->BasicSearchType = $NhanVien->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $NhanVien;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$NhanVien->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$NhanVien->CurrentOrderType = @$_GET["ordertype"];
			$NhanVien->UpdateSort($NhanVien->NhanVienID); // NhanVienID
			$NhanVien->UpdateSort($NhanVien->HoTen); // HoTen
			$NhanVien->UpdateSort($NhanVien->NgaySinh); // NgaySinh
			$NhanVien->UpdateSort($NhanVien->GioiTinh); // GioiTinh
			$NhanVien->UpdateSort($NhanVien->DanToc); // DanToc
			$NhanVien->UpdateSort($NhanVien->TonGiao); // TonGiao
			$NhanVien->UpdateSort($NhanVien->SoCMND); // SoCMND
			$NhanVien->UpdateSort($NhanVien->NgayCapCMND); // NgayCapCMND
			$NhanVien->UpdateSort($NhanVien->NoiCapCMND); // NoiCapCMND
			$NhanVien->UpdateSort($NhanVien->DiaChi); // DiaChi
			$NhanVien->UpdateSort($NhanVien->DienThoai); // DienThoai
			$NhanVien->UpdateSort($NhanVien->zEmail); // Email
			$NhanVien->UpdateSort($NhanVien->IsGiaoVien); // IsGiaoVien
			$NhanVien->UpdateSort($NhanVien->ChucVuID); // ChucVuID
			$NhanVien->UpdateSort($NhanVien->TrinhDoID); // TrinhDoID
			$NhanVien->UpdateSort($NhanVien->BacLuong); // BacLuong
			$NhanVien->UpdateSort($NhanVien->HeSoLuong); // HeSoLuong
			$NhanVien->UpdateSort($NhanVien->LuongCoBan); // LuongCoBan
			$NhanVien->UpdateSort($NhanVien->LuongNgay); // LuongNgay
			$NhanVien->UpdateSort($NhanVien->NgayNangLuong); // NgayNangLuong
			$NhanVien->UpdateSort($NhanVien->NgayVaoLamViec); // NgayVaoLamViec
			$NhanVien->UpdateSort($NhanVien->DaNghiViec); // DaNghiViec
			$NhanVien->UpdateSort($NhanVien->NgayNghiViec); // NgayNghiViec
			$NhanVien->UpdateSort($NhanVien->IsDangVien); // IsDangVien
			$NhanVien->UpdateSort($NhanVien->NgayVaoDang); // NgayVaoDang
			$NhanVien->UpdateSort($NhanVien->SoTheDang); // SoTheDang
			$NhanVien->UpdateSort($NhanVien->ThanhPhanGiaDinh); // ThanhPhanGiaDinh
			$NhanVien->UpdateSort($NhanVien->HoTenCha); // HoTenCha
			$NhanVien->UpdateSort($NhanVien->NamSinhCha); // NamSinhCha
			$NhanVien->UpdateSort($NhanVien->NgheNghiepCha); // NgheNghiepCha
			$NhanVien->UpdateSort($NhanVien->HoTenMe); // HoTenMe
			$NhanVien->UpdateSort($NhanVien->NamSinhMe); // NamSinhMe
			$NhanVien->UpdateSort($NhanVien->NgheNghiepMe); // NgheNghiepMe
			$NhanVien->UpdateSort($NhanVien->DiaChiChaMe); // DiaChiChaMe
			$NhanVien->UpdateSort($NhanVien->DienThoaiChaMe); // DienThoaiChaMe
			$NhanVien->UpdateSort($NhanVien->HoTenVoChong); // HoTenVoChong
			$NhanVien->UpdateSort($NhanVien->NamSinhVoChong); // NamSinhVoChong
			$NhanVien->UpdateSort($NhanVien->NgheNghiepVoChong); // NgheNghiepVoChong
			$NhanVien->UpdateSort($NhanVien->DienThoaiVoChong); // DienThoaiVoChong
			$NhanVien->UpdateSort($NhanVien->Ho); // Ho
			$NhanVien->UpdateSort($NhanVien->Ten); // Ten
			$NhanVien->UpdateSort($NhanVien->LoaiHopDong); // LoaiHopDong
			$NhanVien->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $NhanVien;
		$sOrderBy = $NhanVien->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($NhanVien->SqlOrderBy() <> "") {
				$sOrderBy = $NhanVien->SqlOrderBy();
				$NhanVien->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $NhanVien;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$NhanVien->setSessionOrderBy($sOrderBy);
				$NhanVien->NhanVienID->setSort("");
				$NhanVien->HoTen->setSort("");
				$NhanVien->NgaySinh->setSort("");
				$NhanVien->GioiTinh->setSort("");
				$NhanVien->DanToc->setSort("");
				$NhanVien->TonGiao->setSort("");
				$NhanVien->SoCMND->setSort("");
				$NhanVien->NgayCapCMND->setSort("");
				$NhanVien->NoiCapCMND->setSort("");
				$NhanVien->DiaChi->setSort("");
				$NhanVien->DienThoai->setSort("");
				$NhanVien->zEmail->setSort("");
				$NhanVien->IsGiaoVien->setSort("");
				$NhanVien->ChucVuID->setSort("");
				$NhanVien->TrinhDoID->setSort("");
				$NhanVien->BacLuong->setSort("");
				$NhanVien->HeSoLuong->setSort("");
				$NhanVien->LuongCoBan->setSort("");
				$NhanVien->LuongNgay->setSort("");
				$NhanVien->NgayNangLuong->setSort("");
				$NhanVien->NgayVaoLamViec->setSort("");
				$NhanVien->DaNghiViec->setSort("");
				$NhanVien->NgayNghiViec->setSort("");
				$NhanVien->IsDangVien->setSort("");
				$NhanVien->NgayVaoDang->setSort("");
				$NhanVien->SoTheDang->setSort("");
				$NhanVien->ThanhPhanGiaDinh->setSort("");
				$NhanVien->HoTenCha->setSort("");
				$NhanVien->NamSinhCha->setSort("");
				$NhanVien->NgheNghiepCha->setSort("");
				$NhanVien->HoTenMe->setSort("");
				$NhanVien->NamSinhMe->setSort("");
				$NhanVien->NgheNghiepMe->setSort("");
				$NhanVien->DiaChiChaMe->setSort("");
				$NhanVien->DienThoaiChaMe->setSort("");
				$NhanVien->HoTenVoChong->setSort("");
				$NhanVien->NamSinhVoChong->setSort("");
				$NhanVien->NgheNghiepVoChong->setSort("");
				$NhanVien->DienThoaiVoChong->setSort("");
				$NhanVien->Ho->setSort("");
				$NhanVien->Ten->setSort("");
				$NhanVien->LoaiHopDong->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$NhanVien->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $NhanVien;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "copy"
		$this->ListOptions->Add("copy");
		$item =& $this->ListOptions->Items["copy"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// "delete"
		$this->ListOptions->Add("delete");
		$item =& $this->ListOptions->Items["delete"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = FALSE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($NhanVien->Export <> "" ||
			$NhanVien->CurrentAction == "gridadd" ||
			$NhanVien->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $NhanVien;
		$this->ListOptions->LoadDefault();

		// "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($oListOpt->Visible)
			$oListOpt->Body = "<a href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "delete"
		$oListOpt =& $this->ListOptions->Items["delete"];
		if ($oListOpt->Visible)
			$oListOpt->Body = "<a" . "" . " href=\"" . $this->DeleteUrl . "\">" . $Language->Phrase("DeleteLink") . "</a>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $NhanVien;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $NhanVien;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$NhanVien->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$NhanVien->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $NhanVien->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$NhanVien->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$NhanVien->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$NhanVien->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $NhanVien;
		$NhanVien->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$NhanVien->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $NhanVien;

		// Call Recordset Selecting event
		$NhanVien->Recordset_Selecting($NhanVien->CurrentFilter);

		// Load List page SQL
		$sSql = $NhanVien->SelectSQL();

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$NhanVien->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $NhanVien;
		$sFilter = $NhanVien->KeyFilter();

		// Call Row Selecting event
		$NhanVien->Row_Selecting($sFilter);

		// Load SQL based on filter
		$NhanVien->CurrentFilter = $sFilter;
		$sSql = $NhanVien->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$NhanVien->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $NhanVien;
		$NhanVien->NhanVienID->setDbValue($rs->fields('NhanVienID'));
		$NhanVien->HoTen->setDbValue($rs->fields('HoTen'));
		$NhanVien->NgaySinh->setDbValue($rs->fields('NgaySinh'));
		$NhanVien->GioiTinh->setDbValue(((ew_ConvertToBool($rs->fields('GioiTinh'))) ? "1" : "0"));
		$NhanVien->DanToc->setDbValue($rs->fields('DanToc'));
		$NhanVien->TonGiao->setDbValue($rs->fields('TonGiao'));
		$NhanVien->SoCMND->setDbValue($rs->fields('SoCMND'));
		$NhanVien->NgayCapCMND->setDbValue($rs->fields('NgayCapCMND'));
		$NhanVien->NoiCapCMND->setDbValue($rs->fields('NoiCapCMND'));
		$NhanVien->DiaChi->setDbValue($rs->fields('DiaChi'));
		$NhanVien->DienThoai->setDbValue($rs->fields('DienThoai'));
		$NhanVien->zEmail->setDbValue($rs->fields('Email'));
		$NhanVien->IsGiaoVien->setDbValue(((ew_ConvertToBool($rs->fields('IsGiaoVien'))) ? "1" : "0"));
		$NhanVien->ChucVuID->setDbValue($rs->fields('ChucVuID'));
		$NhanVien->TrinhDoID->setDbValue($rs->fields('TrinhDoID'));
		$NhanVien->BacLuong->setDbValue($rs->fields('BacLuong'));
		$NhanVien->HeSoLuong->setDbValue($rs->fields('HeSoLuong'));
		$NhanVien->LuongCoBan->setDbValue($rs->fields('LuongCoBan'));
		$NhanVien->LuongNgay->setDbValue($rs->fields('LuongNgay'));
		$NhanVien->NgayNangLuong->setDbValue($rs->fields('NgayNangLuong'));
		$NhanVien->NgayVaoLamViec->setDbValue($rs->fields('NgayVaoLamViec'));
		$NhanVien->DaNghiViec->setDbValue(((ew_ConvertToBool($rs->fields('DaNghiViec'))) ? "1" : "0"));
		$NhanVien->NgayNghiViec->setDbValue($rs->fields('NgayNghiViec'));
		$NhanVien->IsDangVien->setDbValue(((ew_ConvertToBool($rs->fields('IsDangVien'))) ? "1" : "0"));
		$NhanVien->NgayVaoDang->setDbValue($rs->fields('NgayVaoDang'));
		$NhanVien->SoTheDang->setDbValue($rs->fields('SoTheDang'));
		$NhanVien->ThanhPhanGiaDinh->setDbValue($rs->fields('ThanhPhanGiaDinh'));
		$NhanVien->HoTenCha->setDbValue($rs->fields('HoTenCha'));
		$NhanVien->NamSinhCha->setDbValue($rs->fields('NamSinhCha'));
		$NhanVien->NgheNghiepCha->setDbValue($rs->fields('NgheNghiepCha'));
		$NhanVien->HoTenMe->setDbValue($rs->fields('HoTenMe'));
		$NhanVien->NamSinhMe->setDbValue($rs->fields('NamSinhMe'));
		$NhanVien->NgheNghiepMe->setDbValue($rs->fields('NgheNghiepMe'));
		$NhanVien->DiaChiChaMe->setDbValue($rs->fields('DiaChiChaMe'));
		$NhanVien->DienThoaiChaMe->setDbValue($rs->fields('DienThoaiChaMe'));
		$NhanVien->HoTenVoChong->setDbValue($rs->fields('HoTenVoChong'));
		$NhanVien->NamSinhVoChong->setDbValue($rs->fields('NamSinhVoChong'));
		$NhanVien->NgheNghiepVoChong->setDbValue($rs->fields('NgheNghiepVoChong'));
		$NhanVien->DienThoaiVoChong->setDbValue($rs->fields('DienThoaiVoChong'));
		$NhanVien->HinhAnhNhanVien->Upload->DbValue = $rs->fields('HinhAnhNhanVien');
		$NhanVien->Ho->setDbValue($rs->fields('Ho'));
		$NhanVien->Ten->setDbValue($rs->fields('Ten'));
		$NhanVien->LoaiHopDong->setDbValue($rs->fields('LoaiHopDong'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $NhanVien;

		// Initialize URLs
		$this->ViewUrl = $NhanVien->ViewUrl();
		$this->EditUrl = $NhanVien->EditUrl();
		$this->InlineEditUrl = $NhanVien->InlineEditUrl();
		$this->CopyUrl = $NhanVien->CopyUrl();
		$this->InlineCopyUrl = $NhanVien->InlineCopyUrl();
		$this->DeleteUrl = $NhanVien->DeleteUrl();

		// Call Row_Rendering event
		$NhanVien->Row_Rendering();

		// Common render codes for all row types
		// NhanVienID

		$NhanVien->NhanVienID->CellCssStyle = ""; $NhanVien->NhanVienID->CellCssClass = "";
		$NhanVien->NhanVienID->CellAttrs = array(); $NhanVien->NhanVienID->ViewAttrs = array(); $NhanVien->NhanVienID->EditAttrs = array();

		// HoTen
		$NhanVien->HoTen->CellCssStyle = ""; $NhanVien->HoTen->CellCssClass = "";
		$NhanVien->HoTen->CellAttrs = array(); $NhanVien->HoTen->ViewAttrs = array(); $NhanVien->HoTen->EditAttrs = array();

		// NgaySinh
		$NhanVien->NgaySinh->CellCssStyle = ""; $NhanVien->NgaySinh->CellCssClass = "";
		$NhanVien->NgaySinh->CellAttrs = array(); $NhanVien->NgaySinh->ViewAttrs = array(); $NhanVien->NgaySinh->EditAttrs = array();

		// GioiTinh
		$NhanVien->GioiTinh->CellCssStyle = ""; $NhanVien->GioiTinh->CellCssClass = "";
		$NhanVien->GioiTinh->CellAttrs = array(); $NhanVien->GioiTinh->ViewAttrs = array(); $NhanVien->GioiTinh->EditAttrs = array();

		// DanToc
		$NhanVien->DanToc->CellCssStyle = ""; $NhanVien->DanToc->CellCssClass = "";
		$NhanVien->DanToc->CellAttrs = array(); $NhanVien->DanToc->ViewAttrs = array(); $NhanVien->DanToc->EditAttrs = array();

		// TonGiao
		$NhanVien->TonGiao->CellCssStyle = ""; $NhanVien->TonGiao->CellCssClass = "";
		$NhanVien->TonGiao->CellAttrs = array(); $NhanVien->TonGiao->ViewAttrs = array(); $NhanVien->TonGiao->EditAttrs = array();

		// SoCMND
		$NhanVien->SoCMND->CellCssStyle = ""; $NhanVien->SoCMND->CellCssClass = "";
		$NhanVien->SoCMND->CellAttrs = array(); $NhanVien->SoCMND->ViewAttrs = array(); $NhanVien->SoCMND->EditAttrs = array();

		// NgayCapCMND
		$NhanVien->NgayCapCMND->CellCssStyle = ""; $NhanVien->NgayCapCMND->CellCssClass = "";
		$NhanVien->NgayCapCMND->CellAttrs = array(); $NhanVien->NgayCapCMND->ViewAttrs = array(); $NhanVien->NgayCapCMND->EditAttrs = array();

		// NoiCapCMND
		$NhanVien->NoiCapCMND->CellCssStyle = ""; $NhanVien->NoiCapCMND->CellCssClass = "";
		$NhanVien->NoiCapCMND->CellAttrs = array(); $NhanVien->NoiCapCMND->ViewAttrs = array(); $NhanVien->NoiCapCMND->EditAttrs = array();

		// DiaChi
		$NhanVien->DiaChi->CellCssStyle = ""; $NhanVien->DiaChi->CellCssClass = "";
		$NhanVien->DiaChi->CellAttrs = array(); $NhanVien->DiaChi->ViewAttrs = array(); $NhanVien->DiaChi->EditAttrs = array();

		// DienThoai
		$NhanVien->DienThoai->CellCssStyle = ""; $NhanVien->DienThoai->CellCssClass = "";
		$NhanVien->DienThoai->CellAttrs = array(); $NhanVien->DienThoai->ViewAttrs = array(); $NhanVien->DienThoai->EditAttrs = array();

		// Email
		$NhanVien->zEmail->CellCssStyle = ""; $NhanVien->zEmail->CellCssClass = "";
		$NhanVien->zEmail->CellAttrs = array(); $NhanVien->zEmail->ViewAttrs = array(); $NhanVien->zEmail->EditAttrs = array();

		// IsGiaoVien
		$NhanVien->IsGiaoVien->CellCssStyle = ""; $NhanVien->IsGiaoVien->CellCssClass = "";
		$NhanVien->IsGiaoVien->CellAttrs = array(); $NhanVien->IsGiaoVien->ViewAttrs = array(); $NhanVien->IsGiaoVien->EditAttrs = array();

		// ChucVuID
		$NhanVien->ChucVuID->CellCssStyle = ""; $NhanVien->ChucVuID->CellCssClass = "";
		$NhanVien->ChucVuID->CellAttrs = array(); $NhanVien->ChucVuID->ViewAttrs = array(); $NhanVien->ChucVuID->EditAttrs = array();

		// TrinhDoID
		$NhanVien->TrinhDoID->CellCssStyle = ""; $NhanVien->TrinhDoID->CellCssClass = "";
		$NhanVien->TrinhDoID->CellAttrs = array(); $NhanVien->TrinhDoID->ViewAttrs = array(); $NhanVien->TrinhDoID->EditAttrs = array();

		// BacLuong
		$NhanVien->BacLuong->CellCssStyle = ""; $NhanVien->BacLuong->CellCssClass = "";
		$NhanVien->BacLuong->CellAttrs = array(); $NhanVien->BacLuong->ViewAttrs = array(); $NhanVien->BacLuong->EditAttrs = array();

		// HeSoLuong
		$NhanVien->HeSoLuong->CellCssStyle = ""; $NhanVien->HeSoLuong->CellCssClass = "";
		$NhanVien->HeSoLuong->CellAttrs = array(); $NhanVien->HeSoLuong->ViewAttrs = array(); $NhanVien->HeSoLuong->EditAttrs = array();

		// LuongCoBan
		$NhanVien->LuongCoBan->CellCssStyle = ""; $NhanVien->LuongCoBan->CellCssClass = "";
		$NhanVien->LuongCoBan->CellAttrs = array(); $NhanVien->LuongCoBan->ViewAttrs = array(); $NhanVien->LuongCoBan->EditAttrs = array();

		// LuongNgay
		$NhanVien->LuongNgay->CellCssStyle = ""; $NhanVien->LuongNgay->CellCssClass = "";
		$NhanVien->LuongNgay->CellAttrs = array(); $NhanVien->LuongNgay->ViewAttrs = array(); $NhanVien->LuongNgay->EditAttrs = array();

		// NgayNangLuong
		$NhanVien->NgayNangLuong->CellCssStyle = ""; $NhanVien->NgayNangLuong->CellCssClass = "";
		$NhanVien->NgayNangLuong->CellAttrs = array(); $NhanVien->NgayNangLuong->ViewAttrs = array(); $NhanVien->NgayNangLuong->EditAttrs = array();

		// NgayVaoLamViec
		$NhanVien->NgayVaoLamViec->CellCssStyle = ""; $NhanVien->NgayVaoLamViec->CellCssClass = "";
		$NhanVien->NgayVaoLamViec->CellAttrs = array(); $NhanVien->NgayVaoLamViec->ViewAttrs = array(); $NhanVien->NgayVaoLamViec->EditAttrs = array();

		// DaNghiViec
		$NhanVien->DaNghiViec->CellCssStyle = ""; $NhanVien->DaNghiViec->CellCssClass = "";
		$NhanVien->DaNghiViec->CellAttrs = array(); $NhanVien->DaNghiViec->ViewAttrs = array(); $NhanVien->DaNghiViec->EditAttrs = array();

		// NgayNghiViec
		$NhanVien->NgayNghiViec->CellCssStyle = ""; $NhanVien->NgayNghiViec->CellCssClass = "";
		$NhanVien->NgayNghiViec->CellAttrs = array(); $NhanVien->NgayNghiViec->ViewAttrs = array(); $NhanVien->NgayNghiViec->EditAttrs = array();

		// IsDangVien
		$NhanVien->IsDangVien->CellCssStyle = ""; $NhanVien->IsDangVien->CellCssClass = "";
		$NhanVien->IsDangVien->CellAttrs = array(); $NhanVien->IsDangVien->ViewAttrs = array(); $NhanVien->IsDangVien->EditAttrs = array();

		// NgayVaoDang
		$NhanVien->NgayVaoDang->CellCssStyle = ""; $NhanVien->NgayVaoDang->CellCssClass = "";
		$NhanVien->NgayVaoDang->CellAttrs = array(); $NhanVien->NgayVaoDang->ViewAttrs = array(); $NhanVien->NgayVaoDang->EditAttrs = array();

		// SoTheDang
		$NhanVien->SoTheDang->CellCssStyle = ""; $NhanVien->SoTheDang->CellCssClass = "";
		$NhanVien->SoTheDang->CellAttrs = array(); $NhanVien->SoTheDang->ViewAttrs = array(); $NhanVien->SoTheDang->EditAttrs = array();

		// ThanhPhanGiaDinh
		$NhanVien->ThanhPhanGiaDinh->CellCssStyle = ""; $NhanVien->ThanhPhanGiaDinh->CellCssClass = "";
		$NhanVien->ThanhPhanGiaDinh->CellAttrs = array(); $NhanVien->ThanhPhanGiaDinh->ViewAttrs = array(); $NhanVien->ThanhPhanGiaDinh->EditAttrs = array();

		// HoTenCha
		$NhanVien->HoTenCha->CellCssStyle = ""; $NhanVien->HoTenCha->CellCssClass = "";
		$NhanVien->HoTenCha->CellAttrs = array(); $NhanVien->HoTenCha->ViewAttrs = array(); $NhanVien->HoTenCha->EditAttrs = array();

		// NamSinhCha
		$NhanVien->NamSinhCha->CellCssStyle = ""; $NhanVien->NamSinhCha->CellCssClass = "";
		$NhanVien->NamSinhCha->CellAttrs = array(); $NhanVien->NamSinhCha->ViewAttrs = array(); $NhanVien->NamSinhCha->EditAttrs = array();

		// NgheNghiepCha
		$NhanVien->NgheNghiepCha->CellCssStyle = ""; $NhanVien->NgheNghiepCha->CellCssClass = "";
		$NhanVien->NgheNghiepCha->CellAttrs = array(); $NhanVien->NgheNghiepCha->ViewAttrs = array(); $NhanVien->NgheNghiepCha->EditAttrs = array();

		// HoTenMe
		$NhanVien->HoTenMe->CellCssStyle = ""; $NhanVien->HoTenMe->CellCssClass = "";
		$NhanVien->HoTenMe->CellAttrs = array(); $NhanVien->HoTenMe->ViewAttrs = array(); $NhanVien->HoTenMe->EditAttrs = array();

		// NamSinhMe
		$NhanVien->NamSinhMe->CellCssStyle = ""; $NhanVien->NamSinhMe->CellCssClass = "";
		$NhanVien->NamSinhMe->CellAttrs = array(); $NhanVien->NamSinhMe->ViewAttrs = array(); $NhanVien->NamSinhMe->EditAttrs = array();

		// NgheNghiepMe
		$NhanVien->NgheNghiepMe->CellCssStyle = ""; $NhanVien->NgheNghiepMe->CellCssClass = "";
		$NhanVien->NgheNghiepMe->CellAttrs = array(); $NhanVien->NgheNghiepMe->ViewAttrs = array(); $NhanVien->NgheNghiepMe->EditAttrs = array();

		// DiaChiChaMe
		$NhanVien->DiaChiChaMe->CellCssStyle = ""; $NhanVien->DiaChiChaMe->CellCssClass = "";
		$NhanVien->DiaChiChaMe->CellAttrs = array(); $NhanVien->DiaChiChaMe->ViewAttrs = array(); $NhanVien->DiaChiChaMe->EditAttrs = array();

		// DienThoaiChaMe
		$NhanVien->DienThoaiChaMe->CellCssStyle = ""; $NhanVien->DienThoaiChaMe->CellCssClass = "";
		$NhanVien->DienThoaiChaMe->CellAttrs = array(); $NhanVien->DienThoaiChaMe->ViewAttrs = array(); $NhanVien->DienThoaiChaMe->EditAttrs = array();

		// HoTenVoChong
		$NhanVien->HoTenVoChong->CellCssStyle = ""; $NhanVien->HoTenVoChong->CellCssClass = "";
		$NhanVien->HoTenVoChong->CellAttrs = array(); $NhanVien->HoTenVoChong->ViewAttrs = array(); $NhanVien->HoTenVoChong->EditAttrs = array();

		// NamSinhVoChong
		$NhanVien->NamSinhVoChong->CellCssStyle = ""; $NhanVien->NamSinhVoChong->CellCssClass = "";
		$NhanVien->NamSinhVoChong->CellAttrs = array(); $NhanVien->NamSinhVoChong->ViewAttrs = array(); $NhanVien->NamSinhVoChong->EditAttrs = array();

		// NgheNghiepVoChong
		$NhanVien->NgheNghiepVoChong->CellCssStyle = ""; $NhanVien->NgheNghiepVoChong->CellCssClass = "";
		$NhanVien->NgheNghiepVoChong->CellAttrs = array(); $NhanVien->NgheNghiepVoChong->ViewAttrs = array(); $NhanVien->NgheNghiepVoChong->EditAttrs = array();

		// DienThoaiVoChong
		$NhanVien->DienThoaiVoChong->CellCssStyle = ""; $NhanVien->DienThoaiVoChong->CellCssClass = "";
		$NhanVien->DienThoaiVoChong->CellAttrs = array(); $NhanVien->DienThoaiVoChong->ViewAttrs = array(); $NhanVien->DienThoaiVoChong->EditAttrs = array();

		// Ho
		$NhanVien->Ho->CellCssStyle = ""; $NhanVien->Ho->CellCssClass = "";
		$NhanVien->Ho->CellAttrs = array(); $NhanVien->Ho->ViewAttrs = array(); $NhanVien->Ho->EditAttrs = array();

		// Ten
		$NhanVien->Ten->CellCssStyle = ""; $NhanVien->Ten->CellCssClass = "";
		$NhanVien->Ten->CellAttrs = array(); $NhanVien->Ten->ViewAttrs = array(); $NhanVien->Ten->EditAttrs = array();

		// LoaiHopDong
		$NhanVien->LoaiHopDong->CellCssStyle = ""; $NhanVien->LoaiHopDong->CellCssClass = "";
		$NhanVien->LoaiHopDong->CellAttrs = array(); $NhanVien->LoaiHopDong->ViewAttrs = array(); $NhanVien->LoaiHopDong->EditAttrs = array();
		if ($NhanVien->RowType == EW_ROWTYPE_VIEW) { // View row

			// NhanVienID
			$NhanVien->NhanVienID->ViewValue = $NhanVien->NhanVienID->CurrentValue;
			$NhanVien->NhanVienID->CssStyle = "";
			$NhanVien->NhanVienID->CssClass = "";
			$NhanVien->NhanVienID->ViewCustomAttributes = "";

			// HoTen
			$NhanVien->HoTen->ViewValue = $NhanVien->HoTen->CurrentValue;
			$NhanVien->HoTen->CssStyle = "";
			$NhanVien->HoTen->CssClass = "";
			$NhanVien->HoTen->ViewCustomAttributes = "";

			// NgaySinh
			$NhanVien->NgaySinh->ViewValue = $NhanVien->NgaySinh->CurrentValue;
			$NhanVien->NgaySinh->ViewValue = ew_FormatDateTime($NhanVien->NgaySinh->ViewValue, 5);
			$NhanVien->NgaySinh->CssStyle = "";
			$NhanVien->NgaySinh->CssClass = "";
			$NhanVien->NgaySinh->ViewCustomAttributes = "";

			// GioiTinh
			if (ew_ConvertToBool($NhanVien->GioiTinh->CurrentValue)) {
				$NhanVien->GioiTinh->ViewValue = "Yes";
			} else {
				$NhanVien->GioiTinh->ViewValue = "No";
			}
			$NhanVien->GioiTinh->CssStyle = "";
			$NhanVien->GioiTinh->CssClass = "";
			$NhanVien->GioiTinh->ViewCustomAttributes = "";

			// DanToc
			$NhanVien->DanToc->ViewValue = $NhanVien->DanToc->CurrentValue;
			$NhanVien->DanToc->CssStyle = "";
			$NhanVien->DanToc->CssClass = "";
			$NhanVien->DanToc->ViewCustomAttributes = "";

			// TonGiao
			$NhanVien->TonGiao->ViewValue = $NhanVien->TonGiao->CurrentValue;
			$NhanVien->TonGiao->CssStyle = "";
			$NhanVien->TonGiao->CssClass = "";
			$NhanVien->TonGiao->ViewCustomAttributes = "";

			// SoCMND
			$NhanVien->SoCMND->ViewValue = $NhanVien->SoCMND->CurrentValue;
			$NhanVien->SoCMND->CssStyle = "";
			$NhanVien->SoCMND->CssClass = "";
			$NhanVien->SoCMND->ViewCustomAttributes = "";

			// NgayCapCMND
			$NhanVien->NgayCapCMND->ViewValue = $NhanVien->NgayCapCMND->CurrentValue;
			$NhanVien->NgayCapCMND->CssStyle = "";
			$NhanVien->NgayCapCMND->CssClass = "";
			$NhanVien->NgayCapCMND->ViewCustomAttributes = "";

			// NoiCapCMND
			$NhanVien->NoiCapCMND->ViewValue = $NhanVien->NoiCapCMND->CurrentValue;
			$NhanVien->NoiCapCMND->CssStyle = "";
			$NhanVien->NoiCapCMND->CssClass = "";
			$NhanVien->NoiCapCMND->ViewCustomAttributes = "";

			// DiaChi
			$NhanVien->DiaChi->ViewValue = $NhanVien->DiaChi->CurrentValue;
			$NhanVien->DiaChi->CssStyle = "";
			$NhanVien->DiaChi->CssClass = "";
			$NhanVien->DiaChi->ViewCustomAttributes = "";

			// DienThoai
			$NhanVien->DienThoai->ViewValue = $NhanVien->DienThoai->CurrentValue;
			$NhanVien->DienThoai->CssStyle = "";
			$NhanVien->DienThoai->CssClass = "";
			$NhanVien->DienThoai->ViewCustomAttributes = "";

			// Email
			$NhanVien->zEmail->ViewValue = $NhanVien->zEmail->CurrentValue;
			$NhanVien->zEmail->CssStyle = "";
			$NhanVien->zEmail->CssClass = "";
			$NhanVien->zEmail->ViewCustomAttributes = "";

			// IsGiaoVien
			if (ew_ConvertToBool($NhanVien->IsGiaoVien->CurrentValue)) {
				$NhanVien->IsGiaoVien->ViewValue = "Yes";
			} else {
				$NhanVien->IsGiaoVien->ViewValue = "No";
			}
			$NhanVien->IsGiaoVien->CssStyle = "";
			$NhanVien->IsGiaoVien->CssClass = "";
			$NhanVien->IsGiaoVien->ViewCustomAttributes = "";

			// ChucVuID
			$NhanVien->ChucVuID->ViewValue = $NhanVien->ChucVuID->CurrentValue;
			$NhanVien->ChucVuID->CssStyle = "";
			$NhanVien->ChucVuID->CssClass = "";
			$NhanVien->ChucVuID->ViewCustomAttributes = "";

			// TrinhDoID
			$NhanVien->TrinhDoID->ViewValue = $NhanVien->TrinhDoID->CurrentValue;
			$NhanVien->TrinhDoID->CssStyle = "";
			$NhanVien->TrinhDoID->CssClass = "";
			$NhanVien->TrinhDoID->ViewCustomAttributes = "";

			// BacLuong
			$NhanVien->BacLuong->ViewValue = $NhanVien->BacLuong->CurrentValue;
			$NhanVien->BacLuong->CssStyle = "";
			$NhanVien->BacLuong->CssClass = "";
			$NhanVien->BacLuong->ViewCustomAttributes = "";

			// HeSoLuong
			$NhanVien->HeSoLuong->ViewValue = $NhanVien->HeSoLuong->CurrentValue;
			$NhanVien->HeSoLuong->CssStyle = "";
			$NhanVien->HeSoLuong->CssClass = "";
			$NhanVien->HeSoLuong->ViewCustomAttributes = "";

			// LuongCoBan
			$NhanVien->LuongCoBan->ViewValue = $NhanVien->LuongCoBan->CurrentValue;
			$NhanVien->LuongCoBan->CssStyle = "";
			$NhanVien->LuongCoBan->CssClass = "";
			$NhanVien->LuongCoBan->ViewCustomAttributes = "";

			// LuongNgay
			$NhanVien->LuongNgay->ViewValue = $NhanVien->LuongNgay->CurrentValue;
			$NhanVien->LuongNgay->CssStyle = "";
			$NhanVien->LuongNgay->CssClass = "";
			$NhanVien->LuongNgay->ViewCustomAttributes = "";

			// NgayNangLuong
			$NhanVien->NgayNangLuong->ViewValue = $NhanVien->NgayNangLuong->CurrentValue;
			$NhanVien->NgayNangLuong->CssStyle = "";
			$NhanVien->NgayNangLuong->CssClass = "";
			$NhanVien->NgayNangLuong->ViewCustomAttributes = "";

			// NgayVaoLamViec
			$NhanVien->NgayVaoLamViec->ViewValue = $NhanVien->NgayVaoLamViec->CurrentValue;
			$NhanVien->NgayVaoLamViec->ViewValue = ew_FormatDateTime($NhanVien->NgayVaoLamViec->ViewValue, 5);
			$NhanVien->NgayVaoLamViec->CssStyle = "";
			$NhanVien->NgayVaoLamViec->CssClass = "";
			$NhanVien->NgayVaoLamViec->ViewCustomAttributes = "";

			// DaNghiViec
			if (ew_ConvertToBool($NhanVien->DaNghiViec->CurrentValue)) {
				$NhanVien->DaNghiViec->ViewValue = "Yes";
			} else {
				$NhanVien->DaNghiViec->ViewValue = "No";
			}
			$NhanVien->DaNghiViec->CssStyle = "";
			$NhanVien->DaNghiViec->CssClass = "";
			$NhanVien->DaNghiViec->ViewCustomAttributes = "";

			// NgayNghiViec
			$NhanVien->NgayNghiViec->ViewValue = $NhanVien->NgayNghiViec->CurrentValue;
			$NhanVien->NgayNghiViec->ViewValue = ew_FormatDateTime($NhanVien->NgayNghiViec->ViewValue, 5);
			$NhanVien->NgayNghiViec->CssStyle = "";
			$NhanVien->NgayNghiViec->CssClass = "";
			$NhanVien->NgayNghiViec->ViewCustomAttributes = "";

			// IsDangVien
			if (ew_ConvertToBool($NhanVien->IsDangVien->CurrentValue)) {
				$NhanVien->IsDangVien->ViewValue = "Yes";
			} else {
				$NhanVien->IsDangVien->ViewValue = "No";
			}
			$NhanVien->IsDangVien->CssStyle = "";
			$NhanVien->IsDangVien->CssClass = "";
			$NhanVien->IsDangVien->ViewCustomAttributes = "";

			// NgayVaoDang
			$NhanVien->NgayVaoDang->ViewValue = $NhanVien->NgayVaoDang->CurrentValue;
			$NhanVien->NgayVaoDang->CssStyle = "";
			$NhanVien->NgayVaoDang->CssClass = "";
			$NhanVien->NgayVaoDang->ViewCustomAttributes = "";

			// SoTheDang
			$NhanVien->SoTheDang->ViewValue = $NhanVien->SoTheDang->CurrentValue;
			$NhanVien->SoTheDang->CssStyle = "";
			$NhanVien->SoTheDang->CssClass = "";
			$NhanVien->SoTheDang->ViewCustomAttributes = "";

			// ThanhPhanGiaDinh
			$NhanVien->ThanhPhanGiaDinh->ViewValue = $NhanVien->ThanhPhanGiaDinh->CurrentValue;
			$NhanVien->ThanhPhanGiaDinh->CssStyle = "";
			$NhanVien->ThanhPhanGiaDinh->CssClass = "";
			$NhanVien->ThanhPhanGiaDinh->ViewCustomAttributes = "";

			// HoTenCha
			$NhanVien->HoTenCha->ViewValue = $NhanVien->HoTenCha->CurrentValue;
			$NhanVien->HoTenCha->CssStyle = "";
			$NhanVien->HoTenCha->CssClass = "";
			$NhanVien->HoTenCha->ViewCustomAttributes = "";

			// NamSinhCha
			$NhanVien->NamSinhCha->ViewValue = $NhanVien->NamSinhCha->CurrentValue;
			$NhanVien->NamSinhCha->CssStyle = "";
			$NhanVien->NamSinhCha->CssClass = "";
			$NhanVien->NamSinhCha->ViewCustomAttributes = "";

			// NgheNghiepCha
			$NhanVien->NgheNghiepCha->ViewValue = $NhanVien->NgheNghiepCha->CurrentValue;
			$NhanVien->NgheNghiepCha->CssStyle = "";
			$NhanVien->NgheNghiepCha->CssClass = "";
			$NhanVien->NgheNghiepCha->ViewCustomAttributes = "";

			// HoTenMe
			$NhanVien->HoTenMe->ViewValue = $NhanVien->HoTenMe->CurrentValue;
			$NhanVien->HoTenMe->CssStyle = "";
			$NhanVien->HoTenMe->CssClass = "";
			$NhanVien->HoTenMe->ViewCustomAttributes = "";

			// NamSinhMe
			$NhanVien->NamSinhMe->ViewValue = $NhanVien->NamSinhMe->CurrentValue;
			$NhanVien->NamSinhMe->CssStyle = "";
			$NhanVien->NamSinhMe->CssClass = "";
			$NhanVien->NamSinhMe->ViewCustomAttributes = "";

			// NgheNghiepMe
			$NhanVien->NgheNghiepMe->ViewValue = $NhanVien->NgheNghiepMe->CurrentValue;
			$NhanVien->NgheNghiepMe->CssStyle = "";
			$NhanVien->NgheNghiepMe->CssClass = "";
			$NhanVien->NgheNghiepMe->ViewCustomAttributes = "";

			// DiaChiChaMe
			$NhanVien->DiaChiChaMe->ViewValue = $NhanVien->DiaChiChaMe->CurrentValue;
			$NhanVien->DiaChiChaMe->CssStyle = "";
			$NhanVien->DiaChiChaMe->CssClass = "";
			$NhanVien->DiaChiChaMe->ViewCustomAttributes = "";

			// DienThoaiChaMe
			$NhanVien->DienThoaiChaMe->ViewValue = $NhanVien->DienThoaiChaMe->CurrentValue;
			$NhanVien->DienThoaiChaMe->CssStyle = "";
			$NhanVien->DienThoaiChaMe->CssClass = "";
			$NhanVien->DienThoaiChaMe->ViewCustomAttributes = "";

			// HoTenVoChong
			$NhanVien->HoTenVoChong->ViewValue = $NhanVien->HoTenVoChong->CurrentValue;
			$NhanVien->HoTenVoChong->CssStyle = "";
			$NhanVien->HoTenVoChong->CssClass = "";
			$NhanVien->HoTenVoChong->ViewCustomAttributes = "";

			// NamSinhVoChong
			$NhanVien->NamSinhVoChong->ViewValue = $NhanVien->NamSinhVoChong->CurrentValue;
			$NhanVien->NamSinhVoChong->CssStyle = "";
			$NhanVien->NamSinhVoChong->CssClass = "";
			$NhanVien->NamSinhVoChong->ViewCustomAttributes = "";

			// NgheNghiepVoChong
			$NhanVien->NgheNghiepVoChong->ViewValue = $NhanVien->NgheNghiepVoChong->CurrentValue;
			$NhanVien->NgheNghiepVoChong->CssStyle = "";
			$NhanVien->NgheNghiepVoChong->CssClass = "";
			$NhanVien->NgheNghiepVoChong->ViewCustomAttributes = "";

			// DienThoaiVoChong
			$NhanVien->DienThoaiVoChong->ViewValue = $NhanVien->DienThoaiVoChong->CurrentValue;
			$NhanVien->DienThoaiVoChong->CssStyle = "";
			$NhanVien->DienThoaiVoChong->CssClass = "";
			$NhanVien->DienThoaiVoChong->ViewCustomAttributes = "";

			// Ho
			$NhanVien->Ho->ViewValue = $NhanVien->Ho->CurrentValue;
			$NhanVien->Ho->CssStyle = "";
			$NhanVien->Ho->CssClass = "";
			$NhanVien->Ho->ViewCustomAttributes = "";

			// Ten
			$NhanVien->Ten->ViewValue = $NhanVien->Ten->CurrentValue;
			$NhanVien->Ten->CssStyle = "";
			$NhanVien->Ten->CssClass = "";
			$NhanVien->Ten->ViewCustomAttributes = "";

			// LoaiHopDong
			$NhanVien->LoaiHopDong->ViewValue = $NhanVien->LoaiHopDong->CurrentValue;
			$NhanVien->LoaiHopDong->CssStyle = "";
			$NhanVien->LoaiHopDong->CssClass = "";
			$NhanVien->LoaiHopDong->ViewCustomAttributes = "";

			// NhanVienID
			$NhanVien->NhanVienID->HrefValue = "";
			$NhanVien->NhanVienID->TooltipValue = "";

			// HoTen
			$NhanVien->HoTen->HrefValue = "";
			$NhanVien->HoTen->TooltipValue = "";

			// NgaySinh
			$NhanVien->NgaySinh->HrefValue = "";
			$NhanVien->NgaySinh->TooltipValue = "";

			// GioiTinh
			$NhanVien->GioiTinh->HrefValue = "";
			$NhanVien->GioiTinh->TooltipValue = "";

			// DanToc
			$NhanVien->DanToc->HrefValue = "";
			$NhanVien->DanToc->TooltipValue = "";

			// TonGiao
			$NhanVien->TonGiao->HrefValue = "";
			$NhanVien->TonGiao->TooltipValue = "";

			// SoCMND
			$NhanVien->SoCMND->HrefValue = "";
			$NhanVien->SoCMND->TooltipValue = "";

			// NgayCapCMND
			$NhanVien->NgayCapCMND->HrefValue = "";
			$NhanVien->NgayCapCMND->TooltipValue = "";

			// NoiCapCMND
			$NhanVien->NoiCapCMND->HrefValue = "";
			$NhanVien->NoiCapCMND->TooltipValue = "";

			// DiaChi
			$NhanVien->DiaChi->HrefValue = "";
			$NhanVien->DiaChi->TooltipValue = "";

			// DienThoai
			$NhanVien->DienThoai->HrefValue = "";
			$NhanVien->DienThoai->TooltipValue = "";

			// Email
			$NhanVien->zEmail->HrefValue = "";
			$NhanVien->zEmail->TooltipValue = "";

			// IsGiaoVien
			$NhanVien->IsGiaoVien->HrefValue = "";
			$NhanVien->IsGiaoVien->TooltipValue = "";

			// ChucVuID
			$NhanVien->ChucVuID->HrefValue = "";
			$NhanVien->ChucVuID->TooltipValue = "";

			// TrinhDoID
			$NhanVien->TrinhDoID->HrefValue = "";
			$NhanVien->TrinhDoID->TooltipValue = "";

			// BacLuong
			$NhanVien->BacLuong->HrefValue = "";
			$NhanVien->BacLuong->TooltipValue = "";

			// HeSoLuong
			$NhanVien->HeSoLuong->HrefValue = "";
			$NhanVien->HeSoLuong->TooltipValue = "";

			// LuongCoBan
			$NhanVien->LuongCoBan->HrefValue = "";
			$NhanVien->LuongCoBan->TooltipValue = "";

			// LuongNgay
			$NhanVien->LuongNgay->HrefValue = "";
			$NhanVien->LuongNgay->TooltipValue = "";

			// NgayNangLuong
			$NhanVien->NgayNangLuong->HrefValue = "";
			$NhanVien->NgayNangLuong->TooltipValue = "";

			// NgayVaoLamViec
			$NhanVien->NgayVaoLamViec->HrefValue = "";
			$NhanVien->NgayVaoLamViec->TooltipValue = "";

			// DaNghiViec
			$NhanVien->DaNghiViec->HrefValue = "";
			$NhanVien->DaNghiViec->TooltipValue = "";

			// NgayNghiViec
			$NhanVien->NgayNghiViec->HrefValue = "";
			$NhanVien->NgayNghiViec->TooltipValue = "";

			// IsDangVien
			$NhanVien->IsDangVien->HrefValue = "";
			$NhanVien->IsDangVien->TooltipValue = "";

			// NgayVaoDang
			$NhanVien->NgayVaoDang->HrefValue = "";
			$NhanVien->NgayVaoDang->TooltipValue = "";

			// SoTheDang
			$NhanVien->SoTheDang->HrefValue = "";
			$NhanVien->SoTheDang->TooltipValue = "";

			// ThanhPhanGiaDinh
			$NhanVien->ThanhPhanGiaDinh->HrefValue = "";
			$NhanVien->ThanhPhanGiaDinh->TooltipValue = "";

			// HoTenCha
			$NhanVien->HoTenCha->HrefValue = "";
			$NhanVien->HoTenCha->TooltipValue = "";

			// NamSinhCha
			$NhanVien->NamSinhCha->HrefValue = "";
			$NhanVien->NamSinhCha->TooltipValue = "";

			// NgheNghiepCha
			$NhanVien->NgheNghiepCha->HrefValue = "";
			$NhanVien->NgheNghiepCha->TooltipValue = "";

			// HoTenMe
			$NhanVien->HoTenMe->HrefValue = "";
			$NhanVien->HoTenMe->TooltipValue = "";

			// NamSinhMe
			$NhanVien->NamSinhMe->HrefValue = "";
			$NhanVien->NamSinhMe->TooltipValue = "";

			// NgheNghiepMe
			$NhanVien->NgheNghiepMe->HrefValue = "";
			$NhanVien->NgheNghiepMe->TooltipValue = "";

			// DiaChiChaMe
			$NhanVien->DiaChiChaMe->HrefValue = "";
			$NhanVien->DiaChiChaMe->TooltipValue = "";

			// DienThoaiChaMe
			$NhanVien->DienThoaiChaMe->HrefValue = "";
			$NhanVien->DienThoaiChaMe->TooltipValue = "";

			// HoTenVoChong
			$NhanVien->HoTenVoChong->HrefValue = "";
			$NhanVien->HoTenVoChong->TooltipValue = "";

			// NamSinhVoChong
			$NhanVien->NamSinhVoChong->HrefValue = "";
			$NhanVien->NamSinhVoChong->TooltipValue = "";

			// NgheNghiepVoChong
			$NhanVien->NgheNghiepVoChong->HrefValue = "";
			$NhanVien->NgheNghiepVoChong->TooltipValue = "";

			// DienThoaiVoChong
			$NhanVien->DienThoaiVoChong->HrefValue = "";
			$NhanVien->DienThoaiVoChong->TooltipValue = "";

			// Ho
			$NhanVien->Ho->HrefValue = "";
			$NhanVien->Ho->TooltipValue = "";

			// Ten
			$NhanVien->Ten->HrefValue = "";
			$NhanVien->Ten->TooltipValue = "";

			// LoaiHopDong
			$NhanVien->LoaiHopDong->HrefValue = "";
			$NhanVien->LoaiHopDong->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($NhanVien->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$NhanVien->Row_Rendered();
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example: 
		//$this->ListOptions->Add("new");
		//$this->ListOptions->Items["new"]->OnLeft = TRUE; // Link on left
		//$this->ListOptions->MoveItem("new", 0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
