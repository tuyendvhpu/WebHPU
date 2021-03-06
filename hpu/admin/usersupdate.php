<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "usersinfo.php" ?>
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
$users_update = new cusers_update();
$Page =& $users_update;

// Page init
$users_update->Page_Init();

// Page main
$users_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var users_update = new ew_Page("users_update");

// page properties
users_update.PageID = "update"; // page ID
users_update.FormID = "fusersupdate"; // form ID
var EW_PAGE_ID = users_update.PageID; // for backward compatibility

// extend page with ValidateForm function
users_update.ValidateForm = function(fobj) {
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

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
users_update.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
users_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
users_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
users_update.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("Add") ?>&nbsp;<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $users->TableCaption() ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<a href="<?php echo $users->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$users_update->ShowMessage();
?>
<form name="fusersupdate" id="fusersupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return users_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="users">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $users_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($users_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo $Language->Phrase("UpdateValue") ?><input type="checkbox" name="u" id="u" onclick="ew_SelectAll(this);"></td>
		<td><?php echo $Language->Phrase("FieldName") ?></td>
		<td><?php echo $Language->Phrase("NewValue") ?></td>
	</tr>
<?php if ($users->FK_USERLEVELID->Visible) { // FK_USERLEVELID ?>
	<tr<?php echo $users->FK_USERLEVELID->RowAttributes ?>>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>>
<input type="checkbox" name="u_FK_USERLEVELID" id="u_FK_USERLEVELID" value="1"<?php echo ($users->FK_USERLEVELID->MultiUpdate == "1") ? " checked=\"checked\"" : "" ?>>
</td>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>><?php echo $users->FK_USERLEVELID->FldCaption() ?></td>
		<td<?php echo $users->FK_USERLEVELID->CellAttributes() ?>><span id="el_FK_USERLEVELID">
<select id="x_FK_USERLEVELID" name="x_FK_USERLEVELID" title="<?php echo $users->FK_USERLEVELID->FldTitle() ?>"<?php echo $users->FK_USERLEVELID->EditAttributes() ?>>
<?php
if (is_array($users->FK_USERLEVELID->EditValue)) {
	$arwrk = $users->FK_USERLEVELID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($users->FK_USERLEVELID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $users->FK_USERLEVELID->CustomMsg ?></td>
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
$users_update->Page_Terminate();
?>
<?php

//
// Page class
//
class cusers_update {

	// Page ID
	var $PageID = 'update';

	// Table name
	var $TableName = 'users';

	// Page object name
	var $PageObjName = 'users_update';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $users;
		if ($users->UseTokenInUrl) $PageUrl .= "t=" . $users->TableVar . "&"; // Add page token
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
		global $objForm, $users;
		if ($users->UseTokenInUrl) {
			if ($objForm)
				return ($users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cusers_update() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (users)
		$GLOBALS["users"] = new cusers();

		// Table object (t_nguoidung)
		$GLOBALS['t_nguoidung'] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'users', TRUE);

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
		global $users;

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
			$this->Page_Terminate("userslist.php");
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
		global $objForm, $Language, $gsFormError, $users;

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
				$users->CurrentAction = $_POST["a_update"];

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
					$users->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("userslist.php"); // No records selected, return to list
		switch ($users->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
					$this->Page_Terminate($users->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$users->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $users;
		$users->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		if ($rs = $this->LoadRecordset()) {
			$i = 1;
			while (!$rs->EOF) {
				if ($i == 1) {
					$users->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
				} else {
					if (!ew_CompareValue($users->FK_USERLEVELID->DbValue, $rs->fields('FK_USERLEVELID')))
						$users->FK_USERLEVELID->CurrentValue = NULL;
				}
				$i++;
				$rs->MoveNext();
			}
			$rs->Close();
		}
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $users;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $users->KeyFilter();
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
		global $users;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$users->PK_NGUOIDUNG_ID->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $Language, $users;
		$conn->BeginTrans();

		// Get old recordset
		$users->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $users->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$users->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $users;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $users;
		$users->FK_USERLEVELID->setFormValue($objForm->GetValue("x_FK_USERLEVELID"));
		$users->FK_USERLEVELID->MultiUpdate = $objForm->GetValue("u_FK_USERLEVELID");
		$users->PK_NGUOIDUNG_ID->setFormValue($objForm->GetValue("x_PK_NGUOIDUNG_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $users;
		$users->PK_NGUOIDUNG_ID->CurrentValue = $users->PK_NGUOIDUNG_ID->FormValue;
		$users->FK_USERLEVELID->CurrentValue = $users->FK_USERLEVELID->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $users;

		// Call Recordset Selecting event
		$users->Recordset_Selecting($users->CurrentFilter);

		// Load List page SQL
		$sSql = $users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$users->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $users;

		// Initialize URLs
		// Call Row_Rendering event

		$users->Row_Rendering();

		// Common render codes for all row types
		// FK_USERLEVELID

		$users->FK_USERLEVELID->CellCssStyle = ""; $users->FK_USERLEVELID->CellCssClass = "";
		$users->FK_USERLEVELID->CellAttrs = array(); $users->FK_USERLEVELID->ViewAttrs = array(); $users->FK_USERLEVELID->EditAttrs = array();
		if ($users->RowType == EW_ROWTYPE_VIEW) { // View row

			// PK_NGUOIDUNG_ID
			$users->PK_NGUOIDUNG_ID->ViewValue = $users->PK_NGUOIDUNG_ID->CurrentValue;
			$users->PK_NGUOIDUNG_ID->CssStyle = "";
			$users->PK_NGUOIDUNG_ID->CssClass = "";
			$users->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

			// C_TENDANGNHAP
			$users->C_TENDANGNHAP->ViewValue = $users->C_TENDANGNHAP->CurrentValue;
			$users->C_TENDANGNHAP->CssStyle = "";
			$users->C_TENDANGNHAP->CssClass = "";
			$users->C_TENDANGNHAP->ViewCustomAttributes = "";

			// C_MATKHAU
			$users->C_MATKHAU->ViewValue = "********";
			$users->C_MATKHAU->CssStyle = "";
			$users->C_MATKHAU->CssClass = "";
			$users->C_MATKHAU->ViewCustomAttributes = "";

			// FK_MACONGTY
			if (strval($users->FK_MACONGTY->CurrentValue) <> "") {
				$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($users->FK_MACONGTY->CurrentValue) . "";
			$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_MACONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
					$rswrk->Close();
				} else {
					$users->FK_MACONGTY->ViewValue = $users->FK_MACONGTY->CurrentValue;
				}
			} else {
				$users->FK_MACONGTY->ViewValue = NULL;
			}
			$users->FK_MACONGTY->CssStyle = "";
			$users->FK_MACONGTY->CssClass = "";
			$users->FK_MACONGTY->ViewCustomAttributes = "";

			// C_HOTEN
			$users->C_HOTEN->ViewValue = $users->C_HOTEN->CurrentValue;
			$users->C_HOTEN->CssStyle = "";
			$users->C_HOTEN->CssClass = "";
			$users->C_HOTEN->ViewCustomAttributes = "";

			// C_DIACHI
			$users->C_DIACHI->ViewValue = $users->C_DIACHI->CurrentValue;
			$users->C_DIACHI->CssStyle = "";
			$users->C_DIACHI->CssClass = "";
			$users->C_DIACHI->ViewCustomAttributes = "";

			// C_TEL
			$users->C_TEL->ViewValue = $users->C_TEL->CurrentValue;
			$users->C_TEL->CssStyle = "";
			$users->C_TEL->CssClass = "";
			$users->C_TEL->ViewCustomAttributes = "";

			// C_TEL_HOME
			$users->C_TEL_HOME->ViewValue = $users->C_TEL_HOME->CurrentValue;
			$users->C_TEL_HOME->CssStyle = "";
			$users->C_TEL_HOME->CssClass = "";
			$users->C_TEL_HOME->ViewCustomAttributes = "";

			// C_TEL_MOBILE
			$users->C_TEL_MOBILE->ViewValue = $users->C_TEL_MOBILE->CurrentValue;
			$users->C_TEL_MOBILE->CssStyle = "";
			$users->C_TEL_MOBILE->CssClass = "";
			$users->C_TEL_MOBILE->ViewCustomAttributes = "";

			// C_FAX
			$users->C_FAX->ViewValue = $users->C_FAX->CurrentValue;
			$users->C_FAX->CssStyle = "";
			$users->C_FAX->CssClass = "";
			$users->C_FAX->ViewCustomAttributes = "";

			// C_EMAIL
			$users->C_EMAIL->ViewValue = $users->C_EMAIL->CurrentValue;
			$users->C_EMAIL->CssStyle = "";
			$users->C_EMAIL->CssClass = "";
			$users->C_EMAIL->ViewCustomAttributes = "";

			// FK_USERLEVELID
			if (strval($users->FK_USERLEVELID->CurrentValue) <> "") {
				$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($users->FK_USERLEVELID->CurrentValue) . "";
			$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$users->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
					$rswrk->Close();
				} else {
					$users->FK_USERLEVELID->ViewValue = $users->FK_USERLEVELID->CurrentValue;
				}
			} else {
				$users->FK_USERLEVELID->ViewValue = NULL;
			}
			$users->FK_USERLEVELID->CssStyle = "";
			$users->FK_USERLEVELID->CssClass = "";
			$users->FK_USERLEVELID->ViewCustomAttributes = "";

			// FK_USERLEVELID
			$users->FK_USERLEVELID->HrefValue = "";
			$users->FK_USERLEVELID->TooltipValue = "";
		} elseif ($users->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// FK_USERLEVELID
			$users->FK_USERLEVELID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `userlevelid`, `userlevelname`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`userleveltype` = 2 AND `userlevelid` not in (-1,0)";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$users->FK_USERLEVELID->EditValue = $arwrk;

			// Edit refer script
			// FK_USERLEVELID

			$users->FK_USERLEVELID->HrefValue = "";
		}

		// Call Row Rendered event
		if ($users->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$users->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $users;

		// Initialize form error message
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($users->FK_USERLEVELID->MultiUpdate == "1") $lUpdateCnt++;
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
		global $conn, $Security, $Language, $users;
		$sFilter = $users->KeyFilter();
			if ($users->C_TENDANGNHAP->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(t_nguoidung.C_TENDANGNHAP = '" . ew_AdjustSql($users->C_TENDANGNHAP->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$users->CurrentFilter = $sFilterChk;
			$sSqlChk = $users->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", 'C_TENDANGNHAP', $Language->Phrase("DupIndex"));
				$sIdxErrMsg = str_replace("%v", $users->C_TENDANGNHAP->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$users->CurrentFilter = $sFilter;
		$sSql = $users->SQL();
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

			// FK_USERLEVELID
						if ($users->FK_USERLEVELID->MultiUpdate == "1") {
			$users->FK_USERLEVELID->SetDbValueDef($rsnew, $users->FK_USERLEVELID->CurrentValue, NULL, FALSE);
			}

			// Call Row Updating event
			$bUpdateRow = $users->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($users->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($users->CancelMessage <> "") {
					$this->setMessage($users->CancelMessage);
					$users->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$users->Row_Updated($rsold, $rsnew);
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
