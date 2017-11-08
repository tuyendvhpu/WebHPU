<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_doituong_doanhnghiepinfo.php" ?>
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
$t_doituong_doanhnghiep_view = new ct_doituong_doanhnghiep_view();
$Page =& $t_doituong_doanhnghiep_view;

// Page init
$t_doituong_doanhnghiep_view->Page_Init();

// Page main
$t_doituong_doanhnghiep_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_doituong_doanhnghiep_view = new ew_Page("t_doituong_doanhnghiep_view");

// page properties
t_doituong_doanhnghiep_view.PageID = "view"; // page ID
t_doituong_doanhnghiep_view.FormID = "ft_doituong_doanhnghiepview"; // form ID
var EW_PAGE_ID = t_doituong_doanhnghiep_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_doituong_doanhnghiep_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_doituong_doanhnghiep_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_doituong_doanhnghiep_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_doituong_doanhnghiep_view.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_doituong_doanhnghiep->TableCaption() ?>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_doituong_doanhnghiep_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_doituong_doanhnghiep" id="emf_t_doituong_doanhnghiep" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_doituong_doanhnghiep',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_doituong_doanhnghiep_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
<a href="<?php echo $t_doituong_doanhnghiep_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_doituong_doanhnghiep_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_doituong_doanhnghiep_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_doituong_doanhnghiep_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_doituong_doanhnghiep_view->ShowMessage();
?>
<p>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_doituong_doanhnghiep_view->Pager)) $t_doituong_doanhnghiep_view->Pager = new cNumericPager($t_doituong_doanhnghiep_view->lStartRec, $t_doituong_doanhnghiep_view->lDisplayRecs, $t_doituong_doanhnghiep_view->lTotalRecs, $t_doituong_doanhnghiep_view->lRecRange) ?>
<?php if ($t_doituong_doanhnghiep_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_doituong_doanhnghiep_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_doituong_doanhnghiep_view->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
	<?php } ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoPermission") ?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->Visible) { // DTDOANHNGHIEP_ID ?>
	<tr<?php echo $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_NAME->Visible) { // C_NAME ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_NAME->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_NAME->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_NAME->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_NAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_BELONGTO->Visible) { // C_BELONGTO ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_BELONGTO->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_BELONGTO->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_BELONGTO->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_BELONGTO->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_BELONGTO->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_TYPE->Visible) { // C_TYPE ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_TYPE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_TYPE->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_TYPE->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_TYPE->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_TYPE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_URL->Visible) { // C_URL ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_URL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_URL->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_URL->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_URL->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_URL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_ORDER->Visible) { // C_ORDER ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_ORDER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_ORDER->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ORDER->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_ORDER->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_ORDER->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_ACTIVE->Visible) { // C_ACTIVE ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_ACTIVE->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_USER_ADD->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_doituong_doanhnghiep->C_FK_CONGTY->Visible) { // C_FK_CONGTY ?>
	<tr<?php echo $t_doituong_doanhnghiep->C_FK_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_doituong_doanhnghiep->C_FK_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_doituong_doanhnghiep->C_FK_CONGTY->CellAttributes() ?>>
<div<?php echo $t_doituong_doanhnghiep->C_FK_CONGTY->ViewAttributes() ?>><?php echo $t_doituong_doanhnghiep->C_FK_CONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_doituong_doanhnghiep_view->Pager)) $t_doituong_doanhnghiep_view->Pager = new cNumericPager($t_doituong_doanhnghiep_view->lStartRec, $t_doituong_doanhnghiep_view->lDisplayRecs, $t_doituong_doanhnghiep_view->lTotalRecs, $t_doituong_doanhnghiep_view->lRecRange) ?>
<?php if ($t_doituong_doanhnghiep_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_doituong_doanhnghiep_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_doituong_doanhnghiep_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_doituong_doanhnghiep_view->PageUrl() ?>start=<?php echo $t_doituong_doanhnghiep_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_doituong_doanhnghiep_view->sSrchWhere == "0=101") { ?>
	<?php echo $Language->Phrase("EnterSearchCriteria") ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoRecord") ?>
	<?php } ?>
	<?php } else { ?>
	<?php echo $Language->Phrase("NoPermission") ?>
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_doituong_doanhnghiep->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_doituong_doanhnghiep_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_doituong_doanhnghiep_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_doituong_doanhnghiep';

	// Page object name
	var $PageObjName = 't_doituong_doanhnghiep_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) $PageUrl .= "t=" . $t_doituong_doanhnghiep->TableVar . "&"; // Add page token
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
		global $objForm, $t_doituong_doanhnghiep;
		if ($t_doituong_doanhnghiep->UseTokenInUrl) {
			if ($objForm)
				return ($t_doituong_doanhnghiep->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_doituong_doanhnghiep->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_doituong_doanhnghiep_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_doituong_doanhnghiep)
		$GLOBALS["t_doituong_doanhnghiep"] = new ct_doituong_doanhnghiep();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_doituong_doanhnghiep', TRUE);

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
		global $t_doituong_doanhnghiep;

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_doituong_doanhnghieplist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_doituong_doanhnghiep->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_doituong_doanhnghiep->Export = $_POST["exporttype"];
		} else {
			$t_doituong_doanhnghiep->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_doituong_doanhnghiep->Export; // Get export parameter, used in header
		$gsExportFile = $t_doituong_doanhnghiep->TableVar; // Get export file, used in header
		if (@$_GET["DTDOANHNGHIEP_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["DTDOANHNGHIEP_ID"]);
		}
		if (in_array($t_doituong_doanhnghiep->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_doituong_doanhnghiep->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_doituong_doanhnghiep->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_doituong_doanhnghiep->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_doituong_doanhnghiep->Export == "csv") {
			header('Content-Type: application/csv;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

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
	var $lDisplayRecs = 1;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $lRecCnt;
	var $arRecKey = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $t_doituong_doanhnghiep;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["DTDOANHNGHIEP_ID"] <> "") {
				$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setQueryStringValue($_GET["DTDOANHNGHIEP_ID"]);
				$this->arRecKey["DTDOANHNGHIEP_ID"] = $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_doituong_doanhnghiep->CurrentAction = "I"; // Display form
			switch ($t_doituong_doanhnghiep->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_doituong_doanhnghieplist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue) == strval($rs->fields('DTDOANHNGHIEP_ID'))) {
								$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "t_doituong_doanhnghieplist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_doituong_doanhnghiep->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_doituong_doanhnghiep->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_doituong_doanhnghieplist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_doituong_doanhnghiep->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_doituong_doanhnghiep;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_doituong_doanhnghiep->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_doituong_doanhnghiep->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_doituong_doanhnghiep;

		// Call Recordset Selecting event
		$t_doituong_doanhnghiep->Recordset_Selecting($t_doituong_doanhnghiep->CurrentFilter);

		// Load List page SQL
		$sSql = $t_doituong_doanhnghiep->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_doituong_doanhnghiep->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_doituong_doanhnghiep;
		$sFilter = $t_doituong_doanhnghiep->KeyFilter();

		// Call Row Selecting event
		$t_doituong_doanhnghiep->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_doituong_doanhnghiep->CurrentFilter = $sFilter;
		$sSql = $t_doituong_doanhnghiep->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_doituong_doanhnghiep->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_doituong_doanhnghiep;
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->setDbValue($rs->fields('DTDOANHNGHIEP_ID'));
		$t_doituong_doanhnghiep->C_NAME->setDbValue($rs->fields('C_NAME'));
		$t_doituong_doanhnghiep->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_doituong_doanhnghiep->C_TYPE->setDbValue($rs->fields('C_TYPE'));
		$t_doituong_doanhnghiep->C_URL->setDbValue($rs->fields('C_URL'));
		$t_doituong_doanhnghiep->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$t_doituong_doanhnghiep->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$t_doituong_doanhnghiep->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_doituong_doanhnghiep->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_doituong_doanhnghiep->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_doituong_doanhnghiep->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_doituong_doanhnghiep->C_FK_CONGTY->setDbValue($rs->fields('C_FK_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_doituong_doanhnghiep;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "DTDOANHNGHIEP_ID=" . urlencode($t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue);
		$this->AddUrl = $t_doituong_doanhnghiep->AddUrl();
		$this->EditUrl = $t_doituong_doanhnghiep->EditUrl();
		$this->CopyUrl = $t_doituong_doanhnghiep->CopyUrl();
		$this->DeleteUrl = $t_doituong_doanhnghiep->DeleteUrl();
		$this->ListUrl = $t_doituong_doanhnghiep->ListUrl();

		// Call Row_Rendering event
		$t_doituong_doanhnghiep->Row_Rendering();

		// Common render codes for all row types
		// DTDOANHNGHIEP_ID

		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CellCssStyle = ""; $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CellCssClass = "";
		$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CellAttrs = array(); $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->ViewAttrs = array(); $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->EditAttrs = array();

		// C_NAME
		$t_doituong_doanhnghiep->C_NAME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_NAME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_NAME->CellAttrs = array(); $t_doituong_doanhnghiep->C_NAME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_NAME->EditAttrs = array();

		// C_BELONGTO
		$t_doituong_doanhnghiep->C_BELONGTO->CellCssStyle = ""; $t_doituong_doanhnghiep->C_BELONGTO->CellCssClass = "";
		$t_doituong_doanhnghiep->C_BELONGTO->CellAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->ViewAttrs = array(); $t_doituong_doanhnghiep->C_BELONGTO->EditAttrs = array();

		// C_TYPE
		$t_doituong_doanhnghiep->C_TYPE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_TYPE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_TYPE->CellAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_TYPE->EditAttrs = array();

		// C_URL
		$t_doituong_doanhnghiep->C_URL->CellCssStyle = ""; $t_doituong_doanhnghiep->C_URL->CellCssClass = "";
		$t_doituong_doanhnghiep->C_URL->CellAttrs = array(); $t_doituong_doanhnghiep->C_URL->ViewAttrs = array(); $t_doituong_doanhnghiep->C_URL->EditAttrs = array();

		// C_ORDER
		$t_doituong_doanhnghiep->C_ORDER->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ORDER->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ORDER->CellAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$t_doituong_doanhnghiep->C_ACTIVE->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ACTIVE->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ACTIVE->CellAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ACTIVE->EditAttrs = array();

		// C_USER_ADD
		$t_doituong_doanhnghiep->C_USER_ADD->CellCssStyle = ""; $t_doituong_doanhnghiep->C_USER_ADD->CellCssClass = "";
		$t_doituong_doanhnghiep->C_USER_ADD->CellAttrs = array(); $t_doituong_doanhnghiep->C_USER_ADD->ViewAttrs = array(); $t_doituong_doanhnghiep->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_doituong_doanhnghiep->C_ADD_TIME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_ADD_TIME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_ADD_TIME->CellAttrs = array(); $t_doituong_doanhnghiep->C_ADD_TIME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_doituong_doanhnghiep->C_USER_EDIT->CellCssStyle = ""; $t_doituong_doanhnghiep->C_USER_EDIT->CellCssClass = "";
		$t_doituong_doanhnghiep->C_USER_EDIT->CellAttrs = array(); $t_doituong_doanhnghiep->C_USER_EDIT->ViewAttrs = array(); $t_doituong_doanhnghiep->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_doituong_doanhnghiep->C_EDIT_TIME->CellCssStyle = ""; $t_doituong_doanhnghiep->C_EDIT_TIME->CellCssClass = "";
		$t_doituong_doanhnghiep->C_EDIT_TIME->CellAttrs = array(); $t_doituong_doanhnghiep->C_EDIT_TIME->ViewAttrs = array(); $t_doituong_doanhnghiep->C_EDIT_TIME->EditAttrs = array();

		// C_FK_CONGTY
		$t_doituong_doanhnghiep->C_FK_CONGTY->CellCssStyle = ""; $t_doituong_doanhnghiep->C_FK_CONGTY->CellCssClass = "";
		$t_doituong_doanhnghiep->C_FK_CONGTY->CellAttrs = array(); $t_doituong_doanhnghiep->C_FK_CONGTY->ViewAttrs = array(); $t_doituong_doanhnghiep->C_FK_CONGTY->EditAttrs = array();
		if ($t_doituong_doanhnghiep->RowType == EW_ROWTYPE_VIEW) { // View row

			// DTDOANHNGHIEP_ID
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->ViewValue = $t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CurrentValue;
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CssStyle = "";
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->CssClass = "";
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->ViewCustomAttributes = "";

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->ViewValue = $t_doituong_doanhnghiep->C_NAME->CurrentValue;
			$t_doituong_doanhnghiep->C_NAME->CssStyle = "";
			$t_doituong_doanhnghiep->C_NAME->CssClass = "";
			$t_doituong_doanhnghiep->C_NAME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
			if (strval($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) <> "") {
				$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($t_doituong_doanhnghiep->C_BELONGTO->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $rswrk->fields('C_NAME');
					$rswrk->Close();
				} else {
					$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = $t_doituong_doanhnghiep->C_BELONGTO->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_BELONGTO->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_BELONGTO->CssStyle = "";
			$t_doituong_doanhnghiep->C_BELONGTO->CssClass = "";
			$t_doituong_doanhnghiep->C_BELONGTO->ViewCustomAttributes = "";

			// C_TYPE
			if (strval($t_doituong_doanhnghiep->C_TYPE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_TYPE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc 1 bai viet";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc list he thong ";
						break;
					case "2":
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = "danh muc url lien ket";
						break;
					default:
						$t_doituong_doanhnghiep->C_TYPE->ViewValue = $t_doituong_doanhnghiep->C_TYPE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_TYPE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_TYPE->CssStyle = "";
			$t_doituong_doanhnghiep->C_TYPE->CssClass = "";
			$t_doituong_doanhnghiep->C_TYPE->ViewCustomAttributes = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->ViewValue = $t_doituong_doanhnghiep->C_URL->CurrentValue;
			$t_doituong_doanhnghiep->C_URL->CssStyle = "";
			$t_doituong_doanhnghiep->C_URL->CssClass = "";
			$t_doituong_doanhnghiep->C_URL->ViewCustomAttributes = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->ViewValue = $t_doituong_doanhnghiep->C_ORDER->CurrentValue;
			$t_doituong_doanhnghiep->C_ORDER->CssStyle = "";
			$t_doituong_doanhnghiep->C_ORDER->CssClass = "";
			$t_doituong_doanhnghiep->C_ORDER->ViewCustomAttributes = "";

			// C_ACTIVE
			if (strval($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) <> "") {
				switch ($t_doituong_doanhnghiep->C_ACTIVE->CurrentValue) {
					case "0":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = "kich hoat";
						break;
					default:
						$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = $t_doituong_doanhnghiep->C_ACTIVE->CurrentValue;
				}
			} else {
				$t_doituong_doanhnghiep->C_ACTIVE->ViewValue = NULL;
			}
			$t_doituong_doanhnghiep->C_ACTIVE->CssStyle = "";
			$t_doituong_doanhnghiep->C_ACTIVE->CssClass = "";
			$t_doituong_doanhnghiep->C_ACTIVE->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_doituong_doanhnghiep->C_USER_ADD->ViewValue = $t_doituong_doanhnghiep->C_USER_ADD->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_ADD->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_ADD->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = $t_doituong_doanhnghiep->C_ADD_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_ADD_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_ADD_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewValue = $t_doituong_doanhnghiep->C_USER_EDIT->CurrentValue;
			$t_doituong_doanhnghiep->C_USER_EDIT->CssStyle = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->CssClass = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = $t_doituong_doanhnghiep->C_EDIT_TIME->CurrentValue;
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_doituong_doanhnghiep->C_EDIT_TIME->ViewValue, 7);
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssStyle = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->CssClass = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_FK_CONGTY
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewValue = $t_doituong_doanhnghiep->C_FK_CONGTY->CurrentValue;
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssStyle = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->CssClass = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->ViewCustomAttributes = "";

			// DTDOANHNGHIEP_ID
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->HrefValue = "";
			$t_doituong_doanhnghiep->DTDOANHNGHIEP_ID->TooltipValue = "";

			// C_NAME
			$t_doituong_doanhnghiep->C_NAME->HrefValue = "";
			$t_doituong_doanhnghiep->C_NAME->TooltipValue = "";

			// C_BELONGTO
			$t_doituong_doanhnghiep->C_BELONGTO->HrefValue = "";
			$t_doituong_doanhnghiep->C_BELONGTO->TooltipValue = "";

			// C_TYPE
			$t_doituong_doanhnghiep->C_TYPE->HrefValue = "";
			$t_doituong_doanhnghiep->C_TYPE->TooltipValue = "";

			// C_URL
			$t_doituong_doanhnghiep->C_URL->HrefValue = "";
			$t_doituong_doanhnghiep->C_URL->TooltipValue = "";

			// C_ORDER
			$t_doituong_doanhnghiep->C_ORDER->HrefValue = "";
			$t_doituong_doanhnghiep->C_ORDER->TooltipValue = "";

			// C_ACTIVE
			$t_doituong_doanhnghiep->C_ACTIVE->HrefValue = "";
			$t_doituong_doanhnghiep->C_ACTIVE->TooltipValue = "";

			// C_USER_ADD
			$t_doituong_doanhnghiep->C_USER_ADD->HrefValue = "";
			$t_doituong_doanhnghiep->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_doituong_doanhnghiep->C_ADD_TIME->HrefValue = "";
			$t_doituong_doanhnghiep->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_doituong_doanhnghiep->C_USER_EDIT->HrefValue = "";
			$t_doituong_doanhnghiep->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_doituong_doanhnghiep->C_EDIT_TIME->HrefValue = "";
			$t_doituong_doanhnghiep->C_EDIT_TIME->TooltipValue = "";

			// C_FK_CONGTY
			$t_doituong_doanhnghiep->C_FK_CONGTY->HrefValue = "";
			$t_doituong_doanhnghiep->C_FK_CONGTY->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_doituong_doanhnghiep->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_doituong_doanhnghiep->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_doituong_doanhnghiep;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_doituong_doanhnghiep->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->lTotalRecs = $rs->RecordCount();
		}
		$this->lStartRec = 1;
		$this->SetUpStartRec(); // Set up start record position

		// Set the last record to display
		if ($this->lDisplayRecs < 0) {
			$this->lStopRec = $this->lTotalRecs;
		} else {
			$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
		}
		if (!$rs) {
			header("Content-Type:"); // Remove header
			header("Content-Disposition:");
			$this->ShowMessage();
			return;
		}
		if ($t_doituong_doanhnghiep->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_doituong_doanhnghiep, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_NAME);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_BELONGTO);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_TYPE);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_URL);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_ORDER);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_ACTIVE);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_USER_ADD);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_doituong_doanhnghiep->C_FK_CONGTY);
				$ExportDoc->EndExportRow();
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			if (!$bSelectLimit && $this->lStartRec > 1)
				$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row
				$t_doituong_doanhnghiep->CssClass = "";
				$t_doituong_doanhnghiep->CssStyle = "";
				$t_doituong_doanhnghiep->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_doituong_doanhnghiep->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_NAME', $t_doituong_doanhnghiep->C_NAME->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_BELONGTO', $t_doituong_doanhnghiep->C_BELONGTO->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE', $t_doituong_doanhnghiep->C_TYPE->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_URL', $t_doituong_doanhnghiep->C_URL->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_ORDER', $t_doituong_doanhnghiep->C_ORDER->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE', $t_doituong_doanhnghiep->C_ACTIVE->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_doituong_doanhnghiep->C_USER_ADD->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_doituong_doanhnghiep->C_ADD_TIME->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_doituong_doanhnghiep->C_USER_EDIT->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_doituong_doanhnghiep->C_EDIT_TIME->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
					$XmlDoc->AddField('C_FK_CONGTY', $t_doituong_doanhnghiep->C_FK_CONGTY->ExportValue($t_doituong_doanhnghiep->Export, $t_doituong_doanhnghiep->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_NAME);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_BELONGTO);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_TYPE);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_URL);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_ORDER);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_ACTIVE);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_USER_ADD);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_ADD_TIME);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_USER_EDIT);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_EDIT_TIME);
					$ExportDoc->ExportField($t_doituong_doanhnghiep->C_FK_CONGTY);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_doituong_doanhnghiep->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_doituong_doanhnghiep->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_doituong_doanhnghiep->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_doituong_doanhnghiep->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_doituong_doanhnghiep->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_doituong_doanhnghiep;
		$sSender = @$_GET["sender"];
		$sRecipient = @$_GET["recipient"];
		$sCc = @$_GET["cc"];
		$sBcc = @$_GET["bcc"];
		$sContentType = @$_GET["contenttype"];

		// Subject
		$sSubject = ew_StripSlashes(@$_GET["subject"]);
		$sEmailSubject = $sSubject;

		// Message
		$sContent = ew_StripSlashes(@$_GET["message"]);
		$sEmailMessage = $sContent;

		// Check sender
		if ($sSender == "") {
			$this->setMessage($Language->Phrase("EnterSenderEmail"));
			return;
		}
		if (!ew_CheckEmail($sSender)) {
			$this->setMessage($Language->Phrase("EnterProperSenderEmail"));
			return;
		}

		// Check recipient
		if (!ew_CheckEmailList($sRecipient, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperRecipientEmail"));
			return;
		}

		// Check cc
		if (!ew_CheckEmailList($sCc, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperCcEmail"));
			return;
		}

		// Check bcc
		if (!ew_CheckEmailList($sBcc, EW_MAX_EMAIL_RECIPIENT)) {
			$this->setMessage($Language->Phrase("EnterProperBccEmail"));
			return;
		}

		// Check email sent count
		if (!isset($_SESSION[EW_EXPORT_EMAIL_COUNTER]))
			$_SESSION[EW_EXPORT_EMAIL_COUNTER] = 0;
		if (intval($_SESSION[EW_EXPORT_EMAIL_COUNTER]) > EW_MAX_EMAIL_SENT_COUNT) {
			$this->setMessage($Language->Phrase("ExceedMaxEmailExport"));
			return;
		}
		if ($sEmailMessage <> "") {
			$sEmailMessage = ew_RemoveXSS($sEmailMessage);
			$sEmailMessage .= ($sContentType == "url") ? "\r\n\r\n" : "<br><br>";
		}
		if ($sContentType == "url") {
			$sUrl = ew_ConvertFullUrl(ew_CurrentPage() . "?" . $this->ExportQueryString());
			$sEmailMessage .= $sUrl; // send URL only
		} else {
			$sEmailMessage .= $EmailContent; // send HTML
		}

		// Send email
		$Email = new cEmail();
		$Email->Sender = $sSender; // Sender
		$Email->Recipient = $sRecipient; // Recipient
		$Email->Cc = $sCc; // Cc
		$Email->Bcc = $sBcc; // Bcc
		$Email->Subject = $sEmailSubject; // Subject
		$Email->Content = $sEmailMessage; // Content
		$Email->Format = ($sContentType == "url") ? "text" : "html";
		$Email->Charset = EW_EMAIL_CHARSET;
		$EventArgs = array();
		$bEmailSent = FALSE;
		if ($t_doituong_doanhnghiep->Email_Sending($Email, $EventArgs))
			$bEmailSent = $Email->Send();

		// Check email sent status
		if ($bEmailSent) {

			// Update email sent count
			$_SESSION[EW_EXPORT_EMAIL_COUNTER]++;

			// Sent email success
			$this->setMessage($Language->Phrase("SendEmailSuccess"));
		} else {

			// Sent email failure
			$this->setMessage($Email->SendErrDescription);
		}
	}

	// Export QueryString
	function ExportQueryString() {
		global $t_doituong_doanhnghiep;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_doituong_doanhnghiep->KeyUrl("", ""), 1);
		return $sQry;
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
}
?>
