<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_bpdungnlinfo.php" ?>
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
$t_bpdungnl_view = new ct_bpdungnl_view();
$Page =& $t_bpdungnl_view;

// Page init
$t_bpdungnl_view->Page_Init();

// Page main
$t_bpdungnl_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_bpdungnl->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_bpdungnl_view = new ew_Page("t_bpdungnl_view");

// page properties
t_bpdungnl_view.PageID = "view"; // page ID
t_bpdungnl_view.FormID = "ft_bpdungnlview"; // form ID
var EW_PAGE_ID = t_bpdungnl_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_bpdungnl_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_bpdungnl_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_bpdungnl_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_bpdungnl_view.ValidateRequired = false; // no JavaScript validation
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
<?php $_SESSION['tab']=1;
      $_SESSION['tab_level']=1.1;
      $_SESSION['tab_level1']=1.4;
?>
<?php include "sitemapcongty.php" ?>
<div style="clear: both;margin-top: 100px;"></div>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $t_bpdungnl->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $t_bpdungnl->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<p><span class="phpmaker">
<?php if ($t_bpdungnl->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportPrintUrl ?>"><?php echo $Language->Phrase("PrinterFriendly") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportHtmlUrl ?>"><?php echo $Language->Phrase("ExportToHtml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportExcelUrl ?>"><?php echo $Language->Phrase("ExportToExcel") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportWordUrl ?>"><?php echo $Language->Phrase("ExportToWord") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportXmlUrl ?>"><?php echo $Language->Phrase("ExportToXml") ?></a>
&nbsp;&nbsp;<a href="<?php echo $t_bpdungnl_view->ExportCsvUrl ?>"><?php echo $Language->Phrase("ExportToCsv") ?></a>
&nbsp;&nbsp;<a name="emf_t_bpdungnl" id="emf_t_bpdungnl" href="javascript:void(0);" onclick="ew_EmailDialogShow({lnk:'emf_t_bpdungnl',hdr:ewLanguage.Phrase('ExportToEmail'),key:<?php echo ew_ArrayToJsonAttr($t_bpdungnl_view->arRecKey) ?>,sel:false});"><?php echo $Language->Phrase("ExportToEmail") ?></a>
<?php } ?>
<br><br>

 <?php
 $pk1=$t_bpdungnl->PK_BPDUNGNL->CurrentValue;
 $pk =  $Security->CurrentUserOption();
 if (!isAdmin())
               {
   if (checkleaves_ones($pk1, $pk,t_bpdungnl, "PK_BPDUNGNL", "FK_MACONGTY")==0)
       {
      ?>
<!-- add code quanghung -->
    <?php if ($t_bpdungnl->Export == "") { ?>
    <?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanEdit() && $Security->CanEditex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
    <a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_bpdungnl_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
    <?php } ?>
    <?php } ?>

 <?php }
        } else { ?>
    <?php if ($t_bpdungnl->Export == "") { ?>
    <?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanEdit() && $Security->CanEditex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanAdd() && $Security->CanAddex()) { ?>
    <a href="<?php echo $t_bpdungnl_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
    <?php } ?>
    <?php if ($Security->CanDelete() && $Security->CanDeleteex()) { ?>
    <a onclick="return ew_Confirm(ewLanguage.Phrase('DeleteConfirmMsg'));" href="<?php echo $t_bpdungnl_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
    <?php } ?>
    <?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_bpdungnl_view->ShowMessage();
?>
<p>
<?php if ($t_bpdungnl->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_bpdungnl_view->Pager)) $t_bpdungnl_view->Pager = new cNumericPager($t_bpdungnl_view->lStartRec, $t_bpdungnl_view->lDisplayRecs, $t_bpdungnl_view->lTotalRecs, $t_bpdungnl_view->lRecRange) ?>
<?php if ($t_bpdungnl_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_bpdungnl_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_bpdungnl_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList() && $Security->CanListex()) { ?>
	<?php if ($t_bpdungnl_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_bpdungnl->FK_MACONGTY->Visible) { // FK_MACONGTY ?>
	<tr<?php echo $t_bpdungnl->FK_MACONGTY->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->FK_MACONGTY->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->FK_MACONGTY->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_MACONGTY->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_MACONGTY->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_NAM->Visible) { // C_NAM ?>
	<tr<?php echo $t_bpdungnl->C_NAM->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_NAM->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_NAM->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_NAM->ViewAttributes() ?>><?php echo $t_bpdungnl->C_NAM->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_TENBP->Visible) { // C_TENBP ?>
	<tr<?php echo $t_bpdungnl->C_TENBP->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_TENBP->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_TENBP->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_TENBP->ViewAttributes() ?>><?php echo $t_bpdungnl->C_TENBP->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->FK_LOAINHIENLIEU->Visible) { // FK_LOAINHIENLIEU ?>
	<tr<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttributes() ?>><?php echo $t_bpdungnl->FK_LOAINHIENLIEU->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_SOLUONG->Visible) { // C_SOLUONG ?>
	<tr<?php echo $t_bpdungnl->C_SOLUONG->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_SOLUONG->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_SOLUONG->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_SOLUONG->ViewAttributes() ?>><?php echo $t_bpdungnl->C_SOLUONG->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_USER_ADD->Visible) { // C_USER_ADD ?>
	<tr<?php echo $t_bpdungnl->C_USER_ADD->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_USER_ADD->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_USER_ADD->ViewAttributes() ?>><?php echo $t_bpdungnl->C_USER_ADD->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_ADD_TIME->Visible) { // C_ADD_TIME ?>
	<tr<?php echo $t_bpdungnl->C_ADD_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_ADD_TIME->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_bpdungnl->C_ADD_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_USER_EDIT->Visible) { // C_USER_EDIT ?>
	<tr<?php echo $t_bpdungnl->C_USER_EDIT->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_USER_EDIT->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_bpdungnl->C_USER_EDIT->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_bpdungnl->C_EDIT_TIME->Visible) { // C_EDIT_TIME ?>
	<tr<?php echo $t_bpdungnl->C_EDIT_TIME->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $t_bpdungnl->C_EDIT_TIME->FldCaption() ?></td>
		<td<?php echo $t_bpdungnl->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_bpdungnl->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_bpdungnl->C_EDIT_TIME->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_bpdungnl->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_bpdungnl_view->Pager)) $t_bpdungnl_view->Pager = new cNumericPager($t_bpdungnl_view->lStartRec, $t_bpdungnl_view->lDisplayRecs, $t_bpdungnl_view->lTotalRecs, $t_bpdungnl_view->lRecRange) ?>
<?php if ($t_bpdungnl_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_bpdungnl_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->FirstButton->Start ?>"><b><?php echo $Language->Phrase("PagerFirst") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->PrevButton->Start ?>"><b><?php echo $Language->Phrase("PagerPrevious") ?></b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_bpdungnl_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->NextButton->Start ?>"><b><?php echo $Language->Phrase("PagerNext") ?></b></a>&nbsp;
	<?php } ?>
	<?php if ($t_bpdungnl_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_bpdungnl_view->PageUrl() ?>start=<?php echo $t_bpdungnl_view->Pager->LastButton->Start ?>"><b><?php echo $Language->Phrase("PagerLast") ?></b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList() && $Security->CanListex()) { ?>
	<?php if ($t_bpdungnl_view->sSrchWhere == "0=101") { ?>
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
<?php if ($t_bpdungnl->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$t_bpdungnl_view->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_bpdungnl_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 't_bpdungnl';

	// Page object name
	var $PageObjName = 't_bpdungnl_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) $PageUrl .= "t=" . $t_bpdungnl->TableVar . "&"; // Add page token
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
		global $objForm, $t_bpdungnl;
		if ($t_bpdungnl->UseTokenInUrl) {
			if ($objForm)
				return ($t_bpdungnl->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_bpdungnl->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_bpdungnl_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_bpdungnl)
		$GLOBALS["t_bpdungnl"] = new ct_bpdungnl();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_bpdungnl', TRUE);

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
		global $t_bpdungnl;

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
		if (!$Security->CanView() || !$Security->CanViewex()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_bpdungnllist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$t_bpdungnl->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$t_bpdungnl->Export = $_POST["exporttype"];
		} else {
			$t_bpdungnl->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $t_bpdungnl->Export; // Get export parameter, used in header
		$gsExportFile = $t_bpdungnl->TableVar; // Get export file, used in header
		if (@$_GET["PK_BPDUNGNL"] <> "") {
			if ($gsExportFile <> "") $gsExportFile .= "_";
			$gsExportFile .= ew_StripSlashes($_GET["PK_BPDUNGNL"]);
		}
		if (in_array($t_bpdungnl->Export, array("html", "email", "excel", "word")))
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		if ($t_bpdungnl->Export == "excel") {
			header('Content-Type: application/vnd.ms-excel;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
		}
		if ($t_bpdungnl->Export == "word") {
			header('Content-Type: application/vnd.ms-word;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
		}
		if ($t_bpdungnl->Export == "xml") {
			header('Content-Type: text/xml;charset=utf-8');
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
		}
		if ($t_bpdungnl->Export == "csv") {
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
		global $Language, $t_bpdungnl, $Security, $array_pkcongty;

                $pk_congty =  $Security->CurrentUserOption();
                if (checkleaves_one($pk_congty,t_congty,C_PARRENT)==0)
                {
                $result1= Check_Rootcongty($pk_congty,PK_MACONGTY,t_congty);
                $result1=$result1.$pk_congty;
                $array_pkcongty =  (split(";",$result1));
                }

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["PK_BPDUNGNL"] <> "") {
				$t_bpdungnl->PK_BPDUNGNL->setQueryStringValue($_GET["PK_BPDUNGNL"]);
				$this->arRecKey["PK_BPDUNGNL"] = $t_bpdungnl->PK_BPDUNGNL->QueryStringValue;
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_bpdungnl->CurrentAction = "I"; // Display form
			switch ($t_bpdungnl->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					if ($rs = $this->LoadRecordset()) // Load records
						$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$this->Page_Terminate("t_bpdungnllist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_bpdungnl->PK_BPDUNGNL->CurrentValue) == strval($rs->fields('PK_BPDUNGNL'))) {
								$t_bpdungnl->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "t_bpdungnllist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if (in_array($t_bpdungnl->Export, array("html","word","excel","xml","csv","email"))) {
				$this->ExportData();
				if ($t_bpdungnl->Export <> "email")
					$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "t_bpdungnllist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_bpdungnl->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $t_bpdungnl;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_bpdungnl->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_bpdungnl->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_bpdungnl->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_bpdungnl->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_bpdungnl;

		// Call Recordset Selecting event
		$t_bpdungnl->Recordset_Selecting($t_bpdungnl->CurrentFilter);

		// Load List page SQL
		$sSql = $t_bpdungnl->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";
                
		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_bpdungnl->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_bpdungnl;
		$sFilter = $t_bpdungnl->KeyFilter();

		// Call Row Selecting event
		$t_bpdungnl->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_bpdungnl->CurrentFilter = $sFilter;
		$sSql = $t_bpdungnl->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_bpdungnl->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_bpdungnl;
		$t_bpdungnl->PK_BPDUNGNL->setDbValue($rs->fields('PK_BPDUNGNL'));
		$t_bpdungnl->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$t_bpdungnl->C_NAM->setDbValue($rs->fields('C_NAM'));
		$t_bpdungnl->C_TENBP->setDbValue($rs->fields('C_TENBP'));
		$t_bpdungnl->FK_LOAINHIENLIEU->setDbValue($rs->fields('FK_LOAINHIENLIEU'));
		$t_bpdungnl->C_SOLUONG->setDbValue($rs->fields('C_SOLUONG'));
		$t_bpdungnl->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_bpdungnl->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_bpdungnl->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_bpdungnl->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_bpdungnl;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "PK_BPDUNGNL=" . urlencode($t_bpdungnl->PK_BPDUNGNL->CurrentValue);
		$this->AddUrl = $t_bpdungnl->AddUrl();
		$this->EditUrl = $t_bpdungnl->EditUrl();
		$this->CopyUrl = $t_bpdungnl->CopyUrl();
		$this->DeleteUrl = $t_bpdungnl->DeleteUrl();
		$this->ListUrl = $t_bpdungnl->ListUrl();

		// Call Row_Rendering event
		$t_bpdungnl->Row_Rendering();

		// Common render codes for all row types
		// FK_MACONGTY

		$t_bpdungnl->FK_MACONGTY->CellCssStyle = ""; $t_bpdungnl->FK_MACONGTY->CellCssClass = "";
		$t_bpdungnl->FK_MACONGTY->CellAttrs = array(); $t_bpdungnl->FK_MACONGTY->ViewAttrs = array(); $t_bpdungnl->FK_MACONGTY->EditAttrs = array();

		// C_NAM
		$t_bpdungnl->C_NAM->CellCssStyle = ""; $t_bpdungnl->C_NAM->CellCssClass = "";
		$t_bpdungnl->C_NAM->CellAttrs = array(); $t_bpdungnl->C_NAM->ViewAttrs = array(); $t_bpdungnl->C_NAM->EditAttrs = array();

		// C_TENBP
		$t_bpdungnl->C_TENBP->CellCssStyle = ""; $t_bpdungnl->C_TENBP->CellCssClass = "";
		$t_bpdungnl->C_TENBP->CellAttrs = array(); $t_bpdungnl->C_TENBP->ViewAttrs = array(); $t_bpdungnl->C_TENBP->EditAttrs = array();

		// FK_LOAINHIENLIEU
		$t_bpdungnl->FK_LOAINHIENLIEU->CellCssStyle = ""; $t_bpdungnl->FK_LOAINHIENLIEU->CellCssClass = "";
		$t_bpdungnl->FK_LOAINHIENLIEU->CellAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->ViewAttrs = array(); $t_bpdungnl->FK_LOAINHIENLIEU->EditAttrs = array();

		// C_SOLUONG
		$t_bpdungnl->C_SOLUONG->CellCssStyle = ""; $t_bpdungnl->C_SOLUONG->CellCssClass = "";
		$t_bpdungnl->C_SOLUONG->CellAttrs = array(); $t_bpdungnl->C_SOLUONG->ViewAttrs = array(); $t_bpdungnl->C_SOLUONG->EditAttrs = array();

		// C_USER_ADD
		$t_bpdungnl->C_USER_ADD->CellCssStyle = ""; $t_bpdungnl->C_USER_ADD->CellCssClass = "";
		$t_bpdungnl->C_USER_ADD->CellAttrs = array(); $t_bpdungnl->C_USER_ADD->ViewAttrs = array(); $t_bpdungnl->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_bpdungnl->C_ADD_TIME->CellCssStyle = ""; $t_bpdungnl->C_ADD_TIME->CellCssClass = "";
		$t_bpdungnl->C_ADD_TIME->CellAttrs = array(); $t_bpdungnl->C_ADD_TIME->ViewAttrs = array(); $t_bpdungnl->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_bpdungnl->C_USER_EDIT->CellCssStyle = ""; $t_bpdungnl->C_USER_EDIT->CellCssClass = "";
		$t_bpdungnl->C_USER_EDIT->CellAttrs = array(); $t_bpdungnl->C_USER_EDIT->ViewAttrs = array(); $t_bpdungnl->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_bpdungnl->C_EDIT_TIME->CellCssStyle = ""; $t_bpdungnl->C_EDIT_TIME->CellCssClass = "";
		$t_bpdungnl->C_EDIT_TIME->CellAttrs = array(); $t_bpdungnl->C_EDIT_TIME->ViewAttrs = array(); $t_bpdungnl->C_EDIT_TIME->EditAttrs = array();
		if ($t_bpdungnl->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_BPDUNGNL
			$t_bpdungnl->PK_BPDUNGNL->ViewValue = $t_bpdungnl->PK_BPDUNGNL->CurrentValue;
			$t_bpdungnl->PK_BPDUNGNL->CssStyle = "";
			$t_bpdungnl->PK_BPDUNGNL->CssClass = "";
			$t_bpdungnl->PK_BPDUNGNL->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($t_bpdungnl->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($t_bpdungnl->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_MACONGTY->ViewValue = $t_bpdungnl->FK_MACONGTY->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_MACONGTY->ViewValue = NULL;
			}
			$t_bpdungnl->FK_MACONGTY->CssStyle = "";
			$t_bpdungnl->FK_MACONGTY->CssClass = "";
			$t_bpdungnl->FK_MACONGTY->ViewCustomAttributes = "";

			// C_NAM
			$t_bpdungnl->C_NAM->ViewValue = $t_bpdungnl->C_NAM->CurrentValue;
			$t_bpdungnl->C_NAM->CssStyle = "";
			$t_bpdungnl->C_NAM->CssClass = "";
			$t_bpdungnl->C_NAM->ViewCustomAttributes = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->ViewValue = $t_bpdungnl->C_TENBP->CurrentValue;
			$t_bpdungnl->C_TENBP->CssStyle = "";
			$t_bpdungnl->C_TENBP->CssClass = "";
			$t_bpdungnl->C_TENBP->ViewCustomAttributes = "";

			// FK_LOAINHIENLIEU
			if (strval($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) <> "") {
				$sFilterWrk = "`PK_LOAINHIENLIEU` = " . ew_AdjustSql($t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENLOAI` FROM `t_loainhienlieu`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $rswrk->fields('C_TENLOAI');
					$rswrk->Close();
				} else {
					$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = $t_bpdungnl->FK_LOAINHIENLIEU->CurrentValue;
				}
			} else {
				$t_bpdungnl->FK_LOAINHIENLIEU->ViewValue = NULL;
			}
			$t_bpdungnl->FK_LOAINHIENLIEU->CssStyle = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->CssClass = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->ViewCustomAttributes = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->ViewValue = $t_bpdungnl->C_SOLUONG->CurrentValue;
			$t_bpdungnl->C_SOLUONG->CssStyle = "";
			$t_bpdungnl->C_SOLUONG->CssClass = "";
			$t_bpdungnl->C_SOLUONG->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_bpdungnl->C_USER_ADD->ViewValue = $t_bpdungnl->C_USER_ADD->CurrentValue;
			if (strval($t_bpdungnl->C_USER_ADD->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_bpdungnl->C_USER_ADD->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->C_USER_ADD->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_bpdungnl->C_USER_ADD->ViewValue = $t_bpdungnl->C_USER_ADD->CurrentValue;
				}
			} else {
				$t_bpdungnl->C_USER_ADD->ViewValue = NULL;
			}
			$t_bpdungnl->C_USER_ADD->CssStyle = "";
			$t_bpdungnl->C_USER_ADD->CssClass = "";
			$t_bpdungnl->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_bpdungnl->C_ADD_TIME->ViewValue = $t_bpdungnl->C_ADD_TIME->CurrentValue;
			$t_bpdungnl->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_ADD_TIME->ViewValue, 11);
			$t_bpdungnl->C_ADD_TIME->CssStyle = "";
			$t_bpdungnl->C_ADD_TIME->CssClass = "";
			$t_bpdungnl->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_bpdungnl->C_USER_EDIT->ViewValue = $t_bpdungnl->C_USER_EDIT->CurrentValue;
			if (strval($t_bpdungnl->C_USER_EDIT->CurrentValue) <> "") {
				$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($t_bpdungnl->C_USER_EDIT->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENDANGNHAP` FROM `t_nguoidung`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$t_bpdungnl->C_USER_EDIT->ViewValue = $rswrk->fields('C_TENDANGNHAP');
					$rswrk->Close();
				} else {
					$t_bpdungnl->C_USER_EDIT->ViewValue = $t_bpdungnl->C_USER_EDIT->CurrentValue;
				}
			} else {
				$t_bpdungnl->C_USER_EDIT->ViewValue = NULL;
			}
			$t_bpdungnl->C_USER_EDIT->CssStyle = "";
			$t_bpdungnl->C_USER_EDIT->CssClass = "";
			$t_bpdungnl->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_bpdungnl->C_EDIT_TIME->ViewValue = $t_bpdungnl->C_EDIT_TIME->CurrentValue;
			$t_bpdungnl->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_bpdungnl->C_EDIT_TIME->ViewValue, 11);
			$t_bpdungnl->C_EDIT_TIME->CssStyle = "";
			$t_bpdungnl->C_EDIT_TIME->CssClass = "";
			$t_bpdungnl->C_EDIT_TIME->ViewCustomAttributes = "";

			// FK_MACONGTY
			$t_bpdungnl->FK_MACONGTY->HrefValue = "";
			$t_bpdungnl->FK_MACONGTY->TooltipValue = "";

			// C_NAM
			$t_bpdungnl->C_NAM->HrefValue = "";
			$t_bpdungnl->C_NAM->TooltipValue = "";

			// C_TENBP
			$t_bpdungnl->C_TENBP->HrefValue = "";
			$t_bpdungnl->C_TENBP->TooltipValue = "";

			// FK_LOAINHIENLIEU
			$t_bpdungnl->FK_LOAINHIENLIEU->HrefValue = "";
			$t_bpdungnl->FK_LOAINHIENLIEU->TooltipValue = "";

			// C_SOLUONG
			$t_bpdungnl->C_SOLUONG->HrefValue = "";
			$t_bpdungnl->C_SOLUONG->TooltipValue = "";

			// C_USER_ADD
			$t_bpdungnl->C_USER_ADD->HrefValue = "";
			$t_bpdungnl->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_bpdungnl->C_ADD_TIME->HrefValue = "";
			$t_bpdungnl->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_bpdungnl->C_USER_EDIT->HrefValue = "";
			$t_bpdungnl->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_bpdungnl->C_EDIT_TIME->HrefValue = "";
			$t_bpdungnl->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_bpdungnl->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_bpdungnl->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email format
	function ExportData() {
		global $t_bpdungnl;
		$utf8 = TRUE;
		$bSelectLimit = FALSE;

		// Load recordset
		if ($bSelectLimit) {
			$this->lTotalRecs = $t_bpdungnl->SelectRecordCount();
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
		if ($t_bpdungnl->Export == "xml") {
			$XmlDoc = new cXMLDocument(EW_XML_ENCODING);
			$XmlDoc->AddRoot();
		} else {
			$ExportDoc = new cExportDocument($t_bpdungnl, "v");
			$ExportDoc->ExportHeader();
			if ($ExportDoc->Horizontal) { // Horizontal format, write header
				$ExportDoc->BeginExportRow();
				$ExportDoc->ExportCaption($t_bpdungnl->PK_BPDUNGNL);
				$ExportDoc->ExportCaption($t_bpdungnl->FK_MACONGTY);
				$ExportDoc->ExportCaption($t_bpdungnl->C_NAM);
				$ExportDoc->ExportCaption($t_bpdungnl->C_TENBP);
				$ExportDoc->ExportCaption($t_bpdungnl->FK_LOAINHIENLIEU);
				$ExportDoc->ExportCaption($t_bpdungnl->C_SOLUONG);
				$ExportDoc->ExportCaption($t_bpdungnl->C_USER_ADD);
				$ExportDoc->ExportCaption($t_bpdungnl->C_ADD_TIME);
				$ExportDoc->ExportCaption($t_bpdungnl->C_USER_EDIT);
				$ExportDoc->ExportCaption($t_bpdungnl->C_EDIT_TIME);
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
				$t_bpdungnl->CssClass = "";
				$t_bpdungnl->CssStyle = "";
				$t_bpdungnl->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($t_bpdungnl->Export == "xml") {
					$XmlDoc->AddRow();
					$XmlDoc->AddField('PK_BPDUNGNL', $t_bpdungnl->PK_BPDUNGNL->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('FK_MACONGTY', $t_bpdungnl->FK_MACONGTY->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_NAM', $t_bpdungnl->C_NAM->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_TENBP', $t_bpdungnl->C_TENBP->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('FK_LOAINHIENLIEU', $t_bpdungnl->FK_LOAINHIENLIEU->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_SOLUONG', $t_bpdungnl->C_SOLUONG->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_ADD', $t_bpdungnl->C_USER_ADD->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_ADD_TIME', $t_bpdungnl->C_ADD_TIME->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_USER_EDIT', $t_bpdungnl->C_USER_EDIT->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
					$XmlDoc->AddField('C_EDIT_TIME', $t_bpdungnl->C_EDIT_TIME->ExportValue($t_bpdungnl->Export, $t_bpdungnl->ExportOriginalValue));
				} else {
					$ExportDoc->BeginExportRow(TRUE); // Allow CSS styles if enabled
					$ExportDoc->ExportField($t_bpdungnl->PK_BPDUNGNL);
					$ExportDoc->ExportField($t_bpdungnl->FK_MACONGTY);
					$ExportDoc->ExportField($t_bpdungnl->C_NAM);
					$ExportDoc->ExportField($t_bpdungnl->C_TENBP);
					$ExportDoc->ExportField($t_bpdungnl->FK_LOAINHIENLIEU);
					$ExportDoc->ExportField($t_bpdungnl->C_SOLUONG);
					$ExportDoc->ExportField($t_bpdungnl->C_USER_ADD);
					$ExportDoc->ExportField($t_bpdungnl->C_ADD_TIME);
					$ExportDoc->ExportField($t_bpdungnl->C_USER_EDIT);
					$ExportDoc->ExportField($t_bpdungnl->C_EDIT_TIME);
					$ExportDoc->EndExportRow();
				}
			}
			$rs->MoveNext();
		}
		if ($t_bpdungnl->Export <> "xml")
			$ExportDoc->ExportFooter();

		// Close recordset
		$rs->Close();

		// Clean output buffer
		if (!EW_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($t_bpdungnl->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (EW_DEBUG_ENABLED)
			echo ew_DebugMsg();

		// Output data
		if ($t_bpdungnl->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($t_bpdungnl->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($t_bpdungnl->ExportReturnUrl());
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export email
	function ExportEmail($EmailContent) {
		global $Language, $t_bpdungnl;
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
		if ($t_bpdungnl->Email_Sending($Email, $EventArgs))
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
		global $t_bpdungnl;

		// Initialize
		$sQry = "export=html";

		// Add record key QueryString
		$sQry .= "&" . substr($t_bpdungnl->KeyUrl("", ""), 1);
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
