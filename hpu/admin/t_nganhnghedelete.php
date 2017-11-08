<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "t_nganhngheinfo.php" ?>
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
$t_nganhnghe_delete = new ct_nganhnghe_delete();
$Page =& $t_nganhnghe_delete;

// Page init
$t_nganhnghe_delete->Page_Init();

// Page main
$t_nganhnghe_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_nganhnghe_delete = new ew_Page("t_nganhnghe_delete");

// page properties
t_nganhnghe_delete.PageID = "delete"; // page ID
t_nganhnghe_delete.FormID = "ft_nganhnghedelete"; // form ID
var EW_PAGE_ID = t_nganhnghe_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_nganhnghe_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_nganhnghe_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_nganhnghe_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_nganhnghe_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $t_nganhnghe_delete->LoadRecordset())
	$t_nganhnghe_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_nganhnghe_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$t_nganhnghe_delete->Page_Terminate("t_nganhnghelist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $t_nganhnghe->TableCaption() ?><br><br>
<a href="<?php echo $t_nganhnghe->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$t_nganhnghe_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_nganhnghe">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_nganhnghe_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_nganhnghe->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $t_nganhnghe->C_BELONGTO->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_USER_ADD->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_ADD_TIME->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_USER_EDIT->FldCaption() ?></td>
		<td valign="top"><?php echo $t_nganhnghe->C_EDIT_TIME->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$t_nganhnghe_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_nganhnghe_delete->lRecCnt++;

	// Set row properties
	$t_nganhnghe->CssClass = "";
	$t_nganhnghe->CssStyle = "";
	$t_nganhnghe->RowAttrs = array();
	$t_nganhnghe->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_nganhnghe_delete->LoadRowValues($rs);

	// Render row
	$t_nganhnghe_delete->RenderRow();
?>
	<tr<?php echo $t_nganhnghe->RowAttributes() ?>>
		<td<?php echo $t_nganhnghe->C_BELONGTO->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_BELONGTO->ViewAttributes() ?>><?php echo $t_nganhnghe->C_BELONGTO->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_TENNGANH->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TENNGANH->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TENNGANH->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_TRANGTHAI->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TRANGTHAI->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TRANGTHAI->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_ADD->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_ADD->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_ADD_TIME->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_EDIT->ListViewValue() ?></div></td>
		<td<?php echo $t_nganhnghe->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_EDIT_TIME->ListViewValue() ?></div></td>
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
$t_nganhnghe_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class ct_nganhnghe_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 't_nganhnghe';

	// Page object name
	var $PageObjName = 't_nganhnghe_delete';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) $PageUrl .= "t=" . $t_nganhnghe->TableVar . "&"; // Add page token
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
		global $objForm, $t_nganhnghe;
		if ($t_nganhnghe->UseTokenInUrl) {
			if ($objForm)
				return ($t_nganhnghe->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_nganhnghe->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ct_nganhnghe_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nganhnghe)
		$GLOBALS["t_nganhnghe"] = new ct_nganhnghe();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_nganhnghe', TRUE);

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
		global $t_nganhnghe;

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
			$this->Page_Terminate("t_nganhnghelist.php");
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
		global $Language, $t_nganhnghe;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["PK_NGANH_ID"] <> "") {
			$t_nganhnghe->PK_NGANH_ID->setQueryStringValue($_GET["PK_NGANH_ID"]);
			if (!is_numeric($t_nganhnghe->PK_NGANH_ID->QueryStringValue))
				$this->Page_Terminate("t_nganhnghelist.php"); // Prevent SQL injection, exit
			$sKey .= $t_nganhnghe->PK_NGANH_ID->QueryStringValue;
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
			$this->Page_Terminate("t_nganhnghelist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_nganhnghelist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`PK_NGANH_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in t_nganhnghe class, t_nganhngheinfo.php

		$t_nganhnghe->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_nganhnghe->CurrentAction = $_POST["a_delete"];
		} else {
			$t_nganhnghe->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_nganhnghe->CurrentAction) {
			case "D": // Delete
				$t_nganhnghe->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
				  //	$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($t_nganhnghe->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $t_nganhnghe;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_nganhnghe->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in t_nganhnghe class, t_nganhngheinfo.php

		$t_nganhnghe->CurrentFilter = $sWrkFilter;
		$sSql = $t_nganhnghe->SQL();
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
				$DeleteRows = $t_nganhnghe->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['PK_NGANH_ID'];
                                // add code by quang hung
                                $sThisKey =  (split(",",$sThisKey));                                
                                $msg = $Language->Phrase("tontainghanhnghecon").",".$Language->Phrase("tontaiconty");
                                for ($i=0; $i < count($sThisKey); $i++)
                                {
                                if (Check_Reference($sThisKey[$i],$row['C_TENNGANH'],"t_nganhnghe,t_congty","C_BELONGTO,FK_NGANH_ID",$msg)=="")
                                {
                                $conn->raiseErrorFn = 'ew_ErrorFn';
                                  $sSqlWrk = "DELETE FROM t_nganhnghe WHERE PK_NGANH_ID = ".$sThisKey[$i];
                                  $DeleteRows = $conn->Execute($sSqlWrk); // Delete
                                  $str= $Language->Phrase("DeleteSuccess")." <b>".$row['C_TENNGANH']."</b>";
                                  $this->setMessage($str);
				$conn->raiseErrorFn = '';
                                }
                                else
                                {
                                  $DeleteRows === FALSE;
                                  $this->setMessage(Check_Reference($sThisKey[$i],$row['C_TENNGANH'],"t_nganhnghe,t_congty","C_BELONGTO,FK_NGANH_ID",$msg));
                                }
				if ($DeleteRows === FALSE)
					break;
                                }
                                // * end
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
             
		} else {

			// Set up error message
			if ($t_nganhnghe->CancelMessage <> "") {
				$this->setMessage($t_nganhnghe->CancelMessage);
				$t_nganhnghe->CancelMessage = "";
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
				$t_nganhnghe->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_nganhnghe;

		// Call Recordset Selecting event
		$t_nganhnghe->Recordset_Selecting($t_nganhnghe->CurrentFilter);

		// Load List page SQL
		$sSql = $t_nganhnghe->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$t_nganhnghe->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_nganhnghe;
		$sFilter = $t_nganhnghe->KeyFilter();

		// Call Row Selecting event
		$t_nganhnghe->Row_Selecting($sFilter);

		// Load SQL based on filter
		$t_nganhnghe->CurrentFilter = $sFilter;
		$sSql = $t_nganhnghe->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$t_nganhnghe->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $t_nganhnghe;
		$t_nganhnghe->PK_NGANH_ID->setDbValue($rs->fields('PK_NGANH_ID'));
		$t_nganhnghe->C_BELONGTO->setDbValue($rs->fields('C_BELONGTO'));
		$t_nganhnghe->C_TENNGANH->setDbValue($rs->fields('C_TENNGANH'));
		$t_nganhnghe->C_TRANGTHAI->setDbValue($rs->fields('C_TRANGTHAI'));
		$t_nganhnghe->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$t_nganhnghe->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$t_nganhnghe->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$t_nganhnghe->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $t_nganhnghe;

		// Initialize URLs
		// Call Row_Rendering event

		$t_nganhnghe->Row_Rendering();

		// Common render codes for all row types
		// C_BELONGTO

		$t_nganhnghe->C_BELONGTO->CellCssStyle = ""; $t_nganhnghe->C_BELONGTO->CellCssClass = "";
		$t_nganhnghe->C_BELONGTO->CellAttrs = array(); $t_nganhnghe->C_BELONGTO->ViewAttrs = array(); $t_nganhnghe->C_BELONGTO->EditAttrs = array();

		// C_TENNGANH
		$t_nganhnghe->C_TENNGANH->CellCssStyle = ""; $t_nganhnghe->C_TENNGANH->CellCssClass = "";
		$t_nganhnghe->C_TENNGANH->CellAttrs = array(); $t_nganhnghe->C_TENNGANH->ViewAttrs = array(); $t_nganhnghe->C_TENNGANH->EditAttrs = array();

		// C_TRANGTHAI
		$t_nganhnghe->C_TRANGTHAI->CellCssStyle = ""; $t_nganhnghe->C_TRANGTHAI->CellCssClass = "";
		$t_nganhnghe->C_TRANGTHAI->CellAttrs = array(); $t_nganhnghe->C_TRANGTHAI->ViewAttrs = array(); $t_nganhnghe->C_TRANGTHAI->EditAttrs = array();

		// C_USER_ADD
		$t_nganhnghe->C_USER_ADD->CellCssStyle = "white-space: nowrap;"; $t_nganhnghe->C_USER_ADD->CellCssClass = "";
		$t_nganhnghe->C_USER_ADD->CellAttrs = array(); $t_nganhnghe->C_USER_ADD->ViewAttrs = array(); $t_nganhnghe->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$t_nganhnghe->C_ADD_TIME->CellCssStyle = "white-space: nowrap;"; $t_nganhnghe->C_ADD_TIME->CellCssClass = "";
		$t_nganhnghe->C_ADD_TIME->CellAttrs = array(); $t_nganhnghe->C_ADD_TIME->ViewAttrs = array(); $t_nganhnghe->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$t_nganhnghe->C_USER_EDIT->CellCssStyle = "white-space: nowrap;"; $t_nganhnghe->C_USER_EDIT->CellCssClass = "";
		$t_nganhnghe->C_USER_EDIT->CellAttrs = array(); $t_nganhnghe->C_USER_EDIT->ViewAttrs = array(); $t_nganhnghe->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$t_nganhnghe->C_EDIT_TIME->CellCssStyle = "white-space: nowrap;"; $t_nganhnghe->C_EDIT_TIME->CellCssClass = "";
		$t_nganhnghe->C_EDIT_TIME->CellAttrs = array(); $t_nganhnghe->C_EDIT_TIME->ViewAttrs = array(); $t_nganhnghe->C_EDIT_TIME->EditAttrs = array();
		if ($t_nganhnghe->RowType == EW_ROWTYPE_VIEW) { // View row

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->ViewValue = $t_nganhnghe->C_BELONGTO->CurrentValue;
			$t_nganhnghe->C_BELONGTO->CssStyle = "";
			$t_nganhnghe->C_BELONGTO->CssClass = "";
			$t_nganhnghe->C_BELONGTO->ViewCustomAttributes = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->ViewValue = $t_nganhnghe->C_TENNGANH->CurrentValue;
			$t_nganhnghe->C_TENNGANH->CssStyle = "";
			$t_nganhnghe->C_TENNGANH->CssClass = "";
			$t_nganhnghe->C_TENNGANH->ViewCustomAttributes = "";

			// C_TRANGTHAI
			if (strval($t_nganhnghe->C_TRANGTHAI->CurrentValue) <> "") {
				switch ($t_nganhnghe->C_TRANGTHAI->CurrentValue) {
					case "0":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Chua hien thi nganh";
						break;
					case "1":
						$t_nganhnghe->C_TRANGTHAI->ViewValue = "Hien thi nghanh";
						break;
					default:
						$t_nganhnghe->C_TRANGTHAI->ViewValue = $t_nganhnghe->C_TRANGTHAI->CurrentValue;
				}
			} else {
				$t_nganhnghe->C_TRANGTHAI->ViewValue = NULL;
			}
			$t_nganhnghe->C_TRANGTHAI->CssStyle = "";
			$t_nganhnghe->C_TRANGTHAI->CssClass = "";
			$t_nganhnghe->C_TRANGTHAI->ViewCustomAttributes = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->ViewValue = $t_nganhnghe->C_USER_ADD->CurrentValue;
			$t_nganhnghe->C_USER_ADD->CssStyle = "";
			$t_nganhnghe->C_USER_ADD->CssClass = "";
			$t_nganhnghe->C_USER_ADD->ViewCustomAttributes = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->ViewValue = $t_nganhnghe->C_ADD_TIME->CurrentValue;
			$t_nganhnghe->C_ADD_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_ADD_TIME->ViewValue, 7);
			$t_nganhnghe->C_ADD_TIME->CssStyle = "";
			$t_nganhnghe->C_ADD_TIME->CssClass = "";
			$t_nganhnghe->C_ADD_TIME->ViewCustomAttributes = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->ViewValue = $t_nganhnghe->C_USER_EDIT->CurrentValue;
			$t_nganhnghe->C_USER_EDIT->CssStyle = "";
			$t_nganhnghe->C_USER_EDIT->CssClass = "";
			$t_nganhnghe->C_USER_EDIT->ViewCustomAttributes = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->ViewValue = $t_nganhnghe->C_EDIT_TIME->CurrentValue;
			$t_nganhnghe->C_EDIT_TIME->ViewValue = ew_FormatDateTime($t_nganhnghe->C_EDIT_TIME->ViewValue, 7);
			$t_nganhnghe->C_EDIT_TIME->CssStyle = "";
			$t_nganhnghe->C_EDIT_TIME->CssClass = "";
			$t_nganhnghe->C_EDIT_TIME->ViewCustomAttributes = "";

			// C_BELONGTO
			$t_nganhnghe->C_BELONGTO->HrefValue = "";
			$t_nganhnghe->C_BELONGTO->TooltipValue = "";

			// C_TENNGANH
			$t_nganhnghe->C_TENNGANH->HrefValue = "";
			$t_nganhnghe->C_TENNGANH->TooltipValue = "";

			// C_TRANGTHAI
			$t_nganhnghe->C_TRANGTHAI->HrefValue = "";
			$t_nganhnghe->C_TRANGTHAI->TooltipValue = "";

			// C_USER_ADD
			$t_nganhnghe->C_USER_ADD->HrefValue = "";
			$t_nganhnghe->C_USER_ADD->TooltipValue = "";

			// C_ADD_TIME
			$t_nganhnghe->C_ADD_TIME->HrefValue = "";
			$t_nganhnghe->C_ADD_TIME->TooltipValue = "";

			// C_USER_EDIT
			$t_nganhnghe->C_USER_EDIT->HrefValue = "";
			$t_nganhnghe->C_USER_EDIT->TooltipValue = "";

			// C_EDIT_TIME
			$t_nganhnghe->C_EDIT_TIME->HrefValue = "";
			$t_nganhnghe->C_EDIT_TIME->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($t_nganhnghe->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$t_nganhnghe->Row_Rendered();
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
