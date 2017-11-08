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
$t_event_view = new ct_event_view();
$Page =& $t_event_view;

// Page init
$t_event_view->Page_Init();

// Page main
$t_event_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_event->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_event_view = new ew_Page("t_event_view");

// page properties
t_event_view.PageID = "view"; // page ID
t_event_view.FormID = "ft_eventview"; // form ID
var EW_PAGE_ID = t_event_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_event_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_event_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_event_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_event_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_event->TableCaption() ?>
<?php if ($t_event->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_event_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_event" id="emf_t_event" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_event',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_event_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>
<?php if ($t_event->Export == "") { ?>
<a href="<?php echo $t_event_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_event_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $t_event_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $t_event_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_event_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_event_view->ShowMessage();
?>
<p>
<?php if ($t_event->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_view->Pager)) $t_event_view->Pager = new cNumericPager($t_event_view->lStartRec, $t_event_view->lDisplayRecs, $t_event_view->lTotalRecs, $t_event_view->lRecRange) ?>
<?php if ($t_event_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_event->C_EVENT_ID->Visible) { // C_EVENT_ID ?>
	<tr<?php echo $t_event->C_EVENT_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_EVENT_ID->FldCaption() ?></td>
		<td<?php echo $t_event->C_EVENT_ID->CellAttributes() ?>>
<div<?php echo $t_event->C_EVENT_ID->ViewAttributes() ?>><?php echo $t_event->C_EVENT_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->FK_CONGTY_ID->Visible) { // FK_CONGTY_ID ?>
	<tr<?php echo $t_event->FK_CONGTY_ID->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_CONGTY_ID->FldCaption() ?></td>
		<td<?php echo $t_event->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_event->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_event->FK_CONGTY_ID->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_EVENT_NAME->Visible) { // C_EVENT_NAME ?>
	<tr<?php echo $t_event->C_EVENT_NAME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_EVENT_NAME->FldCaption() ?></td>
		<td<?php echo $t_event->C_EVENT_NAME->CellAttributes() ?>>
<div<?php echo $t_event->C_EVENT_NAME->ViewAttributes() ?>><?php echo $t_event->C_EVENT_NAME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_TYPE_EVENT->Visible) { // C_TYPE_EVENT ?>
	<tr<?php echo $t_event->C_TYPE_EVENT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_TYPE_EVENT->FldCaption() ?></td>
		<td<?php echo $t_event->C_TYPE_EVENT->CellAttributes() ?>>
<div<?php echo $t_event->C_TYPE_EVENT->ViewAttributes() ?>><?php echo $t_event->C_TYPE_EVENT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_POST->Visible) { // C_POST ?>
	<tr<?php echo $t_event->C_POST->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_POST->FldCaption() ?></td>
		<td<?php echo $t_event->C_POST->CellAttributes() ?>>
<div<?php echo $t_event->C_POST->ViewAttributes() ?>><?php echo $t_event->C_POST->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_URL_IMAGES->Visible) { // C_URL_IMAGES ?>
	<tr<?php echo $t_event->C_URL_IMAGES->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_URL_IMAGES->FldCaption() ?></td>
		<td<?php echo $t_event->C_URL_IMAGES->CellAttributes() ?>>
<div<?php echo $t_event->C_URL_IMAGES->ViewAttributes() ?>><?php echo $t_event->C_URL_IMAGES->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_URL_LINK->Visible) { // C_URL_LINK ?>
	<tr<?php echo $t_event->C_URL_LINK->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_URL_LINK->FldCaption() ?></td>
		<td<?php echo $t_event->C_URL_LINK->CellAttributes() ?>>
<div<?php echo $t_event->C_URL_LINK->ViewAttributes() ?>><?php echo $t_event->C_URL_LINK->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_DATETIME_BEGIN->Visible) { // C_DATETIME_BEGIN ?>
	<tr<?php echo $t_event->C_DATETIME_BEGIN->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_DATETIME_BEGIN->FldCaption() ?></td>
		<td<?php echo $t_event->C_DATETIME_BEGIN->CellAttributes() ?>>
<div<?php echo $t_event->C_DATETIME_BEGIN->ViewAttributes() ?>><?php echo $t_event->C_DATETIME_BEGIN->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_DATETIME_END->Visible) { // C_DATETIME_END ?>
	<tr<?php echo $t_event->C_DATETIME_END->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_DATETIME_END->FldCaption() ?></td>
		<td<?php echo $t_event->C_DATETIME_END->CellAttributes() ?>>
<div<?php echo $t_event->C_DATETIME_END->ViewAttributes() ?>><?php echo $t_event->C_DATETIME_END->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ODER->Visible) { // C_ODER ?>
	<tr<?php echo $t_event->C_ODER->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_ODER->FldCaption() ?></td>
		<td<?php echo $t_event->C_ODER->CellAttributes() ?>>
<div<?php echo $t_event->C_ODER->ViewAttributes() ?>><?php echo $t_event->C_ODER->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_NOTE->Visible) { // C_NOTE ?>
	<tr<?php echo $t_event->C_NOTE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_NOTE->FldCaption() ?></td>
		<td<?php echo $t_event->C_NOTE->CellAttributes() ?>>
<div<?php echo $t_event->C_NOTE->ViewAttributes() ?>><?php echo $t_event->C_NOTE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_event->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_event->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_event->C_USER_ADD->ViewAttributes() ?>><?php echo $t_event->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_event->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_event->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_event->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_event->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_event->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_event->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_event->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_event->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_event->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_event->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_event->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_event->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_ACTIVE_LEVELSITE->Visible) { // C_ACTIVE_LEVELSITE ?>
	<tr<?php echo $t_event->C_ACTIVE_LEVELSITE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_ACTIVE_LEVELSITE->FldCaption() ?></td>
		<td<?php echo $t_event->C_ACTIVE_LEVELSITE->CellAttributes() ?>>
<div<?php echo $t_event->C_ACTIVE_LEVELSITE->ViewAttributes() ?>><?php echo $t_event->C_ACTIVE_LEVELSITE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_TIME_ACTIVE->Visible) { // C_TIME_ACTIVE ?>
	<tr<?php echo $t_event->C_TIME_ACTIVE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_TIME_ACTIVE->FldCaption() ?></td>
		<td<?php echo $t_event->C_TIME_ACTIVE->CellAttributes() ?>>
<div<?php echo $t_event->C_TIME_ACTIVE->ViewAttributes() ?>><?php echo $t_event->C_TIME_ACTIVE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_SEND_MAIL->Visible) { // C_SEND_MAIL ?>
	<tr<?php echo $t_event->C_SEND_MAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_SEND_MAIL->FldCaption() ?></td>
		<td<?php echo $t_event->C_SEND_MAIL->CellAttributes() ?>>
<div<?php echo $t_event->C_SEND_MAIL->ViewAttributes() ?>><?php echo $t_event->C_SEND_MAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_CONTENT_MAIL->Visible) { // C_CONTENT_MAIL ?>
	<tr<?php echo $t_event->C_CONTENT_MAIL->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_CONTENT_MAIL->FldCaption() ?></td>
		<td<?php echo $t_event->C_CONTENT_MAIL->CellAttributes() ?>>
<div<?php echo $t_event->C_CONTENT_MAIL->ViewAttributes() ?>><?php echo $t_event->C_CONTENT_MAIL->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->C_FK_BROWSE->Visible) { // C_FK_BROWSE ?>
	<tr<?php echo $t_event->C_FK_BROWSE->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->C_FK_BROWSE->FldCaption() ?></td>
		<td<?php echo $t_event->C_FK_BROWSE->CellAttributes() ?>>
<div<?php echo $t_event->C_FK_BROWSE->ViewAttributes() ?>><?php echo $t_event->C_FK_BROWSE->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->FK_ARRAY_TINBAI->Visible) { // FK_ARRAY_TINBAI ?>
	<tr<?php echo $t_event->FK_ARRAY_TINBAI->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_ARRAY_TINBAI->FldCaption() ?></td>
		<td<?php echo $t_event->FK_ARRAY_TINBAI->CellAttributes() ?>>
<div<?php echo $t_event->FK_ARRAY_TINBAI->ViewAttributes() ?>><?php echo $t_event->FK_ARRAY_TINBAI->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_event->FK_ARRAY_CONGTY->Visible) { // FK_ARRAY_CONGTY ?>
	<tr<?php echo $t_event->FK_ARRAY_CONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_event->FK_ARRAY_CONGTY->FldCaption() ?></td>
		<td<?php echo $t_event->FK_ARRAY_CONGTY->CellAttributes() ?>>
<div<?php echo $t_event->FK_ARRAY_CONGTY->ViewAttributes() ?>><?php echo $t_event->FK_ARRAY_CONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_event->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_event_view->Pager)) $t_event_view->Pager = new cNumericPager($t_event_view->lStartRec, $t_event_view->lDisplayRecs, $t_event_view->lTotalRecs, $t_event_view->lRecRange) ?>
<?php if ($t_event_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_event_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_event_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_event_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_event_view->PageUrl() ?>start=<?php echo $t_event_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($t_event_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_event->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_event_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_event_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_event';

	// Page object name
	var $PageObjName = 't_event_view';

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
	function ct_event_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_event)
		$GLOBALS["t_event"] = new ct_event();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_eventlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_event->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_event->Export = $_POST["exporttype"];
		} else {
			$t_event->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_event->Export; // Get export parameter, used in header
		$gsExportFile = $t_event->TableVar; // Get export file, used in header
		if (@$_GET["C_EVENT_ID"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["C_EVENT_ID"]);
		}
		if (in_array($t_event->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_event->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_event->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_event->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_event->Export == "csv") {
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
		global $Language, $t_event;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["C_EVENT_ID"] <> "") {
				$t_event->C_EVENT_ID->setQueryStringValue($_GET["C_EVENT_ID"]);
				$this->arRecKey["C_EVENT_ID"] = $t_event->C_EVENT_ID->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_event->CurrentAction = "I"; // Display form
			switch ($t_event->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_eventlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_event->C_EVENT_ID->CurrentValue) == strval($rs->fields('C_EVENT_ID'))) {
								$t_event->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_eventlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_event->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_event->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_eventlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_event->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_event;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_event->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_event->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_event->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_event->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_event->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_event->setStartRecordNumber($this->lStartRec);
		}
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
		$t_event->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$t_event->C_CONTENT_MAIL->setDbValue($rs->fields('C_CONTENT_MAIL'));
		$t_event->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$t_event->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
		$t_event->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_event;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "C_EVENT_ID=" . urlencode($t_event->C_EVENT_ID->CurrentValue);
		$this->AddUrl = $t_event->AddUrl();
		$this->EditUrl = $t_event->EditUrl();
		$this->CopyUrl = $t_event->CopyUrl();
		$this->DeleteUrl = $t_event->DeleteUrl();
		$this->ListUrl = $t_event->ListUrl();

		// Call Row_Rendering event
		$t_event->Row_Rendering();

		// Common render codes for all row types
		// C_EVENT_ID

		$t_event->C_EVENT_ID->CellCssStyle = ""; $t_event->C_EVENT_ID->CellCssClass = "";
		$t_event->C_EVENT_ID->CellAttrs = array(); $t_event->C_EVENT_ID->ViewAttrs = array(); $t_event->C_EVENT_ID->EditAttrs = array();

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
			$sSqlWrk = "SELECT `C_TITLE` FROM `t_tinbai_levelsite`";
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

			// C_EVENT_ID
			$t_event->C_EVENT_ID->HrefValue = "";
			$t_event->C_EVENT_ID->TooltipValue = "";

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
		}

		// Call Row Rendered event
		if ($t_event->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_event->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_event;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_event->SelectRecordCount();
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
		if ($t_event->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_event, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_event->C_EVENT_ID);
				$ExportDoc->ExportCaption($t_event->FK_CONGTY_ID);
				$ExportDoc->ExportCaption($t_event->C_TYPE_EVENT);
				$ExportDoc->ExportCaption($t_event->C_POST);
				$ExportDoc->ExportCaption($t_event->C_DATETIME_BEGIN);
				$ExportDoc->ExportCaption($t_event->C_DATETIME_END);
				$ExportDoc->ExportCaption($t_event->C_ODER);
				$ExportDoc->ExportCaption($t_event->C_USER_ADD);
				$ExportDoc->ExportCaption($t_event->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_event->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_event->C_EDIT_TIME);
				$ExportDoc->ExportCaption($t_event->C_ACTIVE_LEVELSITE);
				$ExportDoc->ExportCaption($t_event->C_TIME_ACTIVE);
				$ExportDoc->ExportCaption($t_event->C_SEND_MAIL);
				$ExportDoc->ExportCaption($t_event->C_FK_BROWSE);
				$ExportDoc->ExportCaption($t_event->FK_ARRAY_TINBAI);
				$ExportDoc->ExportCaption($t_event->FK_ARRAY_CONGTY);
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
				$t_event->CssClass = "";
				$t_event->CssStyle = "";
				$t_event->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_event->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('C_EVENT_ID', $t_event->C_EVENT_ID->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_CONGTY_ID', $t_event->FK_CONGTY_ID->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_TYPE_EVENT', $t_event->C_TYPE_EVENT->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_POST', $t_event->C_POST->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_BEGIN', $t_event->C_DATETIME_BEGIN->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_DATETIME_END', $t_event->C_DATETIME_END->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ODER', $t_event->C_ODER->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_event->C_USER_ADD->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_event->C_ADD_TIME->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_event->C_USER_EDIT->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_event->C_EDIT_TIME->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_ACTIVE_LEVELSITE', $t_event->C_ACTIVE_LEVELSITE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_TIME_ACTIVE', $t_event->C_TIME_ACTIVE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_SEND_MAIL', $t_event->C_SEND_MAIL->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('C_FK_BROWSE', $t_event->C_FK_BROWSE->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_ARRAY_TINBAI', $t_event->FK_ARRAY_TINBAI->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
					$XmlDoc->AddField('FK_ARRAY_CONGTY', $t_event->FK_ARRAY_CONGTY->ExportValue($t_event->Export, $t_event->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_event->C_EVENT_ID);
					$ExportDoc->ExportField($t_event->FK_CONGTY_ID);
					$ExportDoc->ExportField($t_event->C_TYPE_EVENT);
					$ExportDoc->ExportField($t_event->C_POST);
					$ExportDoc->ExportField($t_event->C_DATETIME_BEGIN);
					$ExportDoc->ExportField($t_event->C_DATETIME_END);
					$ExportDoc->ExportField($t_event->C_ODER);
					$ExportDoc->ExportField($t_event->C_USER_ADD);
					$ExportDoc->ExportField($t_event->C_ADD_TIME);
					$ExportDoc->ExportField($t_event->C_USER_EDIT);
					$ExportDoc->ExportField($t_event->C_EDIT_TIME);
					$ExportDoc->ExportField($t_event->C_ACTIVE_LEVELSITE);
					$ExportDoc->ExportField($t_event->C_TIME_ACTIVE);
					$ExportDoc->ExportField($t_event->C_SEND_MAIL);
					$ExportDoc->ExportField($t_event->C_FK_BROWSE);
					$ExportDoc->ExportField($t_event->FK_ARRAY_TINBAI);
					$ExportDoc->ExportField($t_event->FK_ARRAY_CONGTY);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_event->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_event->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_event->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_event->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_event->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_event;
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
		if ($t_event->Email_Sending($Email, $EventArgs))
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
		global $t_event;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_event->KeyUrl("", ""), 1);
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
