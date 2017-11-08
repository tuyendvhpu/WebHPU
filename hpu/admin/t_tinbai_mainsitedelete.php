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
$t_tinbai_mainsite_delete = new ct_tinbai_mainsite_delete();
$Page =& $t_tinbai_mainsite_delete;

// Page init
$t_tinbai_mainsite_delete->Page_Init();

// Page main
$t_tinbai_mainsite_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_tinbai_mainsite_delete = new ew_Page("t_tinbai_mainsite_delete");

// page properties
t_tinbai_mainsite_delete.PageID = "delete"; // page ID
t_tinbai_mainsite_delete.FormID = "ft_tinbai_mainsitedelete"; // form ID
var EW_PAGE_ID = t_tinbai_mainsite_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_tinbai_mainsite_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_tinbai_mainsite_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_tinbai_mainsite_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_tinbai_mainsite_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
if ($rs = $t_tinbai_mainsite_delete->LoadRecordset())
	$t_tinbai_mainsite_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_tinbai_mainsite_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_tinbai_mainsite_delete->Page_Terminate("t_tinbai_mainsitelist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $t_tinbai_mainsite->TableCaption() ?><br><br>
<a href="<?php echo $t_tinbai_mainsite->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_tinbai_mainsite_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_tinbai_mainsite">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_tinbai_mainsite_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_tinbai_mainsite->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_TITLE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_NOTE->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_USER_ADD->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_ADD_TIME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_USER_EDIT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->C_EDIT_TIME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_tinbai_mainsite->FK_EDITOR_ID->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_tinbai_mainsite_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_tinbai_mainsite_delete->lRecCnt++;

	// Set row properties
	$t_tinbai_mainsite->CssClass = "";
	$t_tinbai_mainsite->CssStyle = "";
	$t_tinbai_mainsite->RowAttrs = array();
	$t_tinbai_mainsite->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_tinbai_mainsite_delete->LoadRowValues($rs);

	// Render row
	$t_tinbai_mainsite_delete->RenderRow();
?>
	<tr<?php echo $t_tinbai_mainsite->RowAttributes() ?>>
		<td<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_CONGTY_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMGIOITHIEU_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DMTUYENSINH_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTSVDANGHOC_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTCUUSV_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_TITLE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_TITLE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TITLE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_HIT_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NEW_MYSEFLT->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_COMMENT_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ORDER_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_STATUS_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_VISITOR_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_NOTE->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_NOTE->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_NOTE->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_USER_ADD->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_USER_ADD->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_ADD_TIME->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_USER_EDIT->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->C_EDIT_TIME->ListViewValue() ?></div></td>
		<td<?php echo $t_tinbai_mainsite->FK_EDITOR_ID->CellAttributes() ?>>
<div<?php echo $t_tinbai_mainsite->FK_EDITOR_ID->ViewAttributes() ?>><?php echo $t_tinbai_mainsite->FK_EDITOR_ID->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo ew_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$t_tinbai_mainsite_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_tinbai_mainsite_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_tinbai_mainsite';

	// Page object name
	var $PageObjName = 't_tinbai_mainsite_delete';

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
	function ct_tinbai_mainsite_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_tinbai_mainsite)
		$GLOBALS["t_tinbai_mainsite"] = new ct_tinbai_mainsite();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_tinbai_mainsitelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $t_tinbai_mainsite;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_TINBAI_ID"] <> "") {
			$t_tinbai_mainsite->PK_TINBAI_ID->setQueryStringValue($_GET["PK_TINBAI_ID"]);
			if (!is_numeric($t_tinbai_mainsite->PK_TINBAI_ID->QueryStringValue))
				$this->Page_Terminate("t_tinbai_mainsitelist.php"); // Prevent SQL injection, exit
			$sKey .= $t_tinbai_mainsite->PK_TINBAI_ID->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("t_tinbai_mainsitelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_tinbai_mainsitelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "t_tinbai_levelsite.PK_TINBAI_ID=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_tinbai_mainsite class, t_tinbai_mainsiteinfo.php

		$t_tinbai_mainsite->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_tinbai_mainsite->CurrentAction = $_POST["a_delete"];
		} else {
			$t_tinbai_mainsite->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_tinbai_mainsite->CurrentAction) {
			case "D": // Delete
				$t_tinbai_mainsite->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_tinbai_mainsite->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_tinbai_mainsite;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_tinbai_mainsite->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_tinbai_mainsite class, t_tinbai_mainsiteinfo.php

		$t_tinbai_mainsite->CurrentFilter = $sWrkFilter;
		$sSql = $t_tinbai_mainsite->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $t_tinbai_mainsite->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_TINBAI_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
                                //add code  by QuangHung xoa tin bai lien quan 
                                $sql = "DELETE FROM t_tinbai_mainlevel WHERE PK_TINBAI_ID = ".$row['PK_TINBAI_ID'];
                                $Delete_mainlevel = $conn->Execute($sql); // Delete 
				$DeleteRows = $conn->Execute($t_tinbai_mainsite->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_tinbai_mainsite->CancelMessage <> "") {
				$this->setMessage($t_tinbai_mainsite->CancelMessage);
				$t_tinbai_mainsite->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$t_tinbai_mainsite->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_tinbai_mainsite;
		$sFilter = $t_tinbai_mainsite->KeyFilter();

		// Call Row Selecting event
		$t_tinbai_mainsite->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_tinbai_mainsite->CurrentFilter = $sFilter;
		$sSql = $t_tinbai_mainsite->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_tinbai_mainsite->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_tinbai_mainsite;
		$t_tinbai_mainsite->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$t_tinbai_mainsite->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$t_tinbai_mainsite->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
		$t_tinbai_mainsite->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
		$t_tinbai_mainsite->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
		$t_tinbai_mainsite->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
		$t_tinbai_mainsite->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
		$t_tinbai_mainsite->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
		$t_tinbai_mainsite->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$t_tinbai_mainsite->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$t_tinbai_mainsite->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$t_tinbai_mainsite->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
		$t_tinbai_mainsite->C_PIC_HIT->Upload->DbValue = $rs->fields('C_PIC_HIT');
		$t_tinbai_mainsite->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
		$t_tinbai_mainsite->C_PIC_MYSEFLT->Upload->DbValue = $rs->fields('C_PIC_MYSEFLT');
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
		$t_tinbai_mainsite->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
		$t_tinbai_mainsite->C_STATUS_MAINSITE->setDbValue($rs->fields('C_STATUS_MAINSITE'));
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->setDbValue($rs->fields('C_VISITOR_MAINSITE'));
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
		$t_tinbai_mainsite->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$t_tinbai_mainsite->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_tinbai_mainsite->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_tinbai_mainsite->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_tinbai_mainsite->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$t_tinbai_mainsite->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_tinbai_mainsite;

		// Initialize URLs
		// Call Row_Rendering event

		$t_tinbai_mainsite->Row_Rendering();

		// Common render codes for all row types
		// FK_CONGTY_ID

		$t_tinbai_mainsite->FK_CONGTY_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_CONGTY_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_CONGTY_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_CONGTY_ID->EditAttrs = array();

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

		// C_HIT_MAINSITE
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_HIT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_HIT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_HIT_MAINSITE->EditAttrs = array();

		// C_NEW_MYSEFLT
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssStyle = ""; $t_tinbai_mainsite->C_NEW_MYSEFLT->CellCssClass = "";
		$t_tinbai_mainsite->C_NEW_MYSEFLT->CellAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->ViewAttrs = array(); $t_tinbai_mainsite->C_NEW_MYSEFLT->EditAttrs = array();

		// C_COMMENT_MAINSITE
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_COMMENT_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_COMMENT_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_COMMENT_MAINSITE->EditAttrs = array();

		// C_ORDER_MAINSITE
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ORDER_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ORDER_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ORDER_MAINSITE->EditAttrs = array();

		// C_STATUS_MAINSITE
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_STATUS_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_STATUS_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_STATUS_MAINSITE->EditAttrs = array();

		// C_VISITOR_MAINSITE
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_VISITOR_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_VISITOR_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_VISITOR_MAINSITE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVE_MAINSITE
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->C_TIME_ACTIVE_MAINSITE->EditAttrs = array();

		// FK_NGUOIDUNGID_MAINSITE
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssStyle = ""; $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellCssClass = "";
		$t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->CellAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->ViewAttrs = array(); $t_tinbai_mainsite->FK_NGUOIDUNGID_MAINSITE->EditAttrs = array();

		// C_NOTE
		$t_tinbai_mainsite->C_NOTE->CellCssStyle = ""; $t_tinbai_mainsite->C_NOTE->CellCssClass = "";
		$t_tinbai_mainsite->C_NOTE->CellAttrs = array(); $t_tinbai_mainsite->C_NOTE->ViewAttrs = array(); $t_tinbai_mainsite->C_NOTE->EditAttrs = array();

		// C_USER_ADD
		$t_tinbai_mainsite->C_USER_ADD->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_ADD->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_ADD->CellAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_tinbai_mainsite->C_ADD_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_ADD_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_ADD_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_tinbai_mainsite->C_USER_EDIT->CellCssStyle = ""; $t_tinbai_mainsite->C_USER_EDIT->CellCssClass = "";
		$t_tinbai_mainsite->C_USER_EDIT->CellAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->ViewAttrs = array(); $t_tinbai_mainsite->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_tinbai_mainsite->C_EDIT_TIME->CellCssStyle = ""; $t_tinbai_mainsite->C_EDIT_TIME->CellCssClass = "";
		$t_tinbai_mainsite->C_EDIT_TIME->CellAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->ViewAttrs = array(); $t_tinbai_mainsite->C_EDIT_TIME->EditAttrs = array();

		// FK_EDITOR_ID
		$t_tinbai_mainsite->FK_EDITOR_ID->CellCssStyle = ""; $t_tinbai_mainsite->FK_EDITOR_ID->CellCssClass = "";
		$t_tinbai_mainsite->FK_EDITOR_ID->CellAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->ViewAttrs = array(); $t_tinbai_mainsite->FK_EDITOR_ID->EditAttrs = array();
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
			if (strval($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) <> "") {
				switch ($t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue) {
					case "0":
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "Khong la tin noi bat";
						break;
					case "1":
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = "La tin noi bat";
						break;
					default:
						$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = $t_tinbai_mainsite->C_HIT_MAINSITE->CurrentValue;
				}
			} else {
				$t_tinbai_mainsite->C_HIT_MAINSITE->ViewValue = NULL;
			}
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssStyle = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->CssClass = "";
			$t_tinbai_mainsite->C_HIT_MAINSITE->ViewCustomAttributes = "";

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

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = $t_tinbai_mainsite->C_ORDER_MAINSITE->CurrentValue;
			$t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue = ew_FormatDateTime($t_tinbai_mainsite->C_ORDER_MAINSITE->ViewValue, 7);
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

			// FK_CONGTY_ID
			$t_tinbai_mainsite->FK_CONGTY_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_CONGTY_ID->TooltipValue = "";

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

			// C_NEW_MYSEFLT
			$t_tinbai_mainsite->C_NEW_MYSEFLT->HrefValue = "";
			$t_tinbai_mainsite->C_NEW_MYSEFLT->TooltipValue = "";

			// C_COMMENT_MAINSITE
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_COMMENT_MAINSITE->TooltipValue = "";

			// C_ORDER_MAINSITE
			$t_tinbai_mainsite->C_ORDER_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_ORDER_MAINSITE->TooltipValue = "";

			// C_STATUS_MAINSITE
			$t_tinbai_mainsite->C_STATUS_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_STATUS_MAINSITE->TooltipValue = "";

			// C_VISITOR_MAINSITE
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->HrefValue = "";
			$t_tinbai_mainsite->C_VISITOR_MAINSITE->TooltipValue = "";

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

			// C_USER_ADD
			$t_tinbai_mainsite->C_USER_ADD->HrefValue = "";
			$t_tinbai_mainsite->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_tinbai_mainsite->C_ADD_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_tinbai_mainsite->C_USER_EDIT->HrefValue = "";
			$t_tinbai_mainsite->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_tinbai_mainsite->C_EDIT_TIME->HrefValue = "";
			$t_tinbai_mainsite->C_EDIT_TIME->TooltipValue = "";

			// FK_EDITOR_ID
			$t_tinbai_mainsite->FK_EDITOR_ID->HrefValue = "";
			$t_tinbai_mainsite->FK_EDITOR_ID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_tinbai_mainsite->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_tinbai_mainsite->Row_Rendered();
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
