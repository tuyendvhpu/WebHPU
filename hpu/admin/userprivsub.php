<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userlevelsinfo.php" ?>
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
$userprivsub = new cuserprivsub();
$Page =& $userprivsub;

// Page init
$userprivsub->Page_Init();

// Page main
$userprivsub->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userprivsub = new ew_Page("userprivsub");

// page properties
userprivsub.PageID = "userprivsub"; // page ID
userprivsub.FormID = "fuserlevelsuserprivsub"; // form ID
var EW_PAGE_ID = userprivsub.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userprivsub.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
userprivsub.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
	ew_ClickAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userprivsub.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userprivsub.ValidateRequired = false; // no JavaScript validation
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
								<?php echo $Language->Phrase("SubUserLevelPermission") ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if( isset($_GET['flag']) && $_GET['flag']==1 ) { ?>
<a href="users_solist.php"><?php echo $Language->Phrase("GoBack") ?></a>
<?php } else {?>
<a href="userslist.php"><?php echo $Language->Phrase("GoBack") ?></a>
<?php } ?>

<?php
if (!is_null($_GET['PK_NGUOIDUNG_ID']) && $_GET['PK_NGUOIDUNG_ID'] <> '')
{
        $conn = ew_Connect();
	$sSqlWrk = "Select C_TENDANGNHAP from t_nguoidung where PK_NGUOIDUNG_ID =".  $_GET['PK_NGUOIDUNG_ID'];
	$rswrk = $conn->Execute($sSqlWrk);
	$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
	if ($rswrk) $rswrk->Close();
}
?>
<p><span style="font-size: 14px;" class="phpmaker"><?php echo $Language->Phrase("UserName") . ": " ?><?php echo $arwrk[0][0] . " " ?>(<?php echo $_GET['PK_NGUOIDUNG_ID'] ?>)</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userprivsub->ShowMessage();
?>

<form name="userprivsub" id="userprivsub" action="<?php echo ew_CurrentPage() ?>" method="post">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<input type="hidden" name="t" id="t" value="t_nguoidung">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<input type="hidden" name="flag" id="flag" value="<?php echo $_GET['flag']; ?>">
<!-- hidden tag for User Level ID -->
<input type="hidden" name="x_PK_NGUOIDUNG_ID" id="x_PK_NGUOIDUNG_ID" value="<?php echo $_GET['PK_NGUOIDUNG_ID'] ?>">
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
	<thead>
	<tr class="ewTableHeader">
		<td><?php echo $Language->Phrase("TableOrView")  ?></td>
		<td><?php echo $Language->Phrase("PermissionAddCopy") ?><input type="checkbox" name="Add" id="Add" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
		<td><?php echo $Language->Phrase("PermissionDelete") ?><input type="checkbox" name="Delete" id="Delete" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
		<td><?php echo $Language->Phrase("PermissionEdit") ?><input type="checkbox" name="Edit" id="Edit" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
                <td><?php echo $Language->Phrase("PermissionActive") ?><input type="checkbox" name="Active" id="Active" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
<?php if (defined("EW_USER_LEVEL_COMPAT")) { ?>
		<td><?php echo $Language->Phrase("PermissionListSearchView") ?><input type="checkbox" name="List" id="List" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
<?php } else { ?>
		<td><?php echo $Language->Phrase("PermissionList") ?><input type="checkbox" name="List" id="List" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
		<td><?php echo $Language->Phrase("PermissionView") ?><input type="checkbox" name="View" id="View" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
		<td><?php echo $Language->Phrase("PermissionSearch") ?><input type="checkbox" name="Search" id="Search" onclick="ew_SelectAll(this);"<?php echo $userprivsub->sDisabled ?>></td>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
for ($i = 0; $i < $userprivsub->TableNameCount; $i++) {
	$userprivsub->TempPriv = $Security->GetSubUserLevelPrivEx($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID']);

	// Set row properties
	$users->CssClass = "";
	$users->CssStyle = "";
	$users->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
?>
	<tr<?php echo $users->RowAttributes() ?>>
		<td><span class="phpmaker"><?php echo $userprivsub->GetTableCaption($i); //$EW_SUB_USER_LEVEL_TABLE_NAME[$i]; ?></span></td>
                <td align="center"><input type="checkbox" name="Add_<?php echo $i ?>" id="Add_<?php echo $i ?>" value="1"<?php if (($userprivsub->TempPriv & EW_ALLOW_ADD) == EW_ALLOW_ADD) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_ADD) ?>></td>
		<td align="center"><input type="checkbox" name="Delete_<?php echo $i ?>" id="Delete_<?php echo $i ?>" value="2"<?php if (($userprivsub->TempPriv & EW_ALLOW_DELETE) == EW_ALLOW_DELETE) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_DELETE) ?>></td>
		<td align="center"><input type="checkbox" name="Edit_<?php echo $i ?>" id="Edit_<?php echo $i ?>" value="4"<?php if (($userprivsub->TempPriv & EW_ALLOW_EDIT) == EW_ALLOW_EDIT) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_EDIT) ?>></td>
                <td align="center"><input type="checkbox" name="Active_<?php echo $i ?>" id="Active_<?php echo $i ?>" value="8"<?php if (($userprivsub->TempPriv & EW_ALLOW_ACTIVE) == EW_ALLOW_ACTIVE) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_ACTIVE) ?>></td>
<?php if (defined("EW_USER_LEVEL_COMPAT")) { ?>
		<td align="center"><input type="checkbox" name="List_<?php echo $i ?>" id="List_<?php echo $i ?>" value="16"<?php if (($userprivsub->TempPriv & EW_ALLOW_LIST) == EW_ALLOW_LIST) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_LIST) ?>></td>
<?php } else { ?>
		<td align="center"><input type="checkbox" name="List_<?php echo $i ?>" id="List_<?php echo $i ?>" value="16"<?php if (($userprivsub->TempPriv & EW_ALLOW_LIST) == EW_ALLOW_LIST) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_LIST) ?>></td>
		<td align="center"><input type="checkbox" name="View_<?php echo $i ?>" id="View_<?php echo $i ?>" value="32"<?php if (($userprivsub->TempPriv & EW_ALLOW_VIEW) == EW_ALLOW_VIEW) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_VIEW) ?>></td>
		<td align="center"><input type="checkbox" name="Search_<?php echo $i ?>" id="Search_<?php echo $i ?>" value="64"<?php if (($userprivsub->TempPriv & EW_ALLOW_SEARCH) == EW_ALLOW_SEARCH) { ?> checked="checked"<?php } ?><?php echo $userprivsub->SetEnable($EW_SUB_USER_LEVEL_TABLE_NAME[$i], $_GET['PK_NGUOIDUNG_ID'],EW_ALLOW_SEARCH) ?>></td>
<?php } ?>
	</tr>
<?php } ?>
	</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnSubmit" id="btnSubmit" value="<?php echo ew_BtnCaption($Language->Phrase("Update")) ?>"<?php echo $userprivsub->sDisabled ?>>
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$userprivsub->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserprivsub {

	// Page ID
	var $PageID = 'userprivsub';

	// Page object name
	var $PageObjName = 'userprivsub';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
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
		return TRUE;
	}

	//
	// Page class constructor
	//
	function cuserprivsub() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

                // Table object (userlevels)
		$GLOBALS["userlevels"] = new cuserlevels();

                // Table object (users)
		$GLOBALS["users"] = new cusers();

                // User table object (t_nguoidung)
		$GLOBALS["t_nguoidung"] = new ct_nguoidung;

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'userprivsub', TRUE);

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
		$Security->LoadCurrentUserLevel('users');
		$Security->TablePermission_Loaded();
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
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
	var $TempPriv;
	var $sDisabled;       
	var $arPriv;
	var $TableNameCount;

	//
	// Page main
	//
	function Page_Main() {
		global $Security, $Language, $users;
		if (!is_array($GLOBALS["EW_SUB_USER_LEVEL_TABLE_NAME"])) {
		  $this->setMessage($Language->Phrase("NoTableGenerated"));
			$this->Page_Terminate("userslist.php"); // Return to list
		}
		$this->TableNameCount = count($GLOBALS["EW_SUB_USER_LEVEL_TABLE_NAME"]);
		$this->TableCaptionCount = count($GLOBALS["EW_SUB_USER_LEVEL_TABLE_CAPTION"]);
		$this->arPriv =& ew_InitArray($this->TableNameCount, 0);

		// Get action
		if (@$_POST["a_edit"] == "") {
			$users->CurrentAction = "I"; // Display with input box

			// Load key from QueryString
			if (@$_GET["PK_NGUOIDUNG_ID"] <> "") {
				$users->PK_NGUOIDUNG_ID->setQueryStringValue($_GET["PK_NGUOIDUNG_ID"]);
			} else {
                            if($_POST["flag"]==1)
				$this->Page_Terminate("users_solist.php"); // Return to list
                            else
                                $this->Page_Terminate("userslist.php"); // Return to list
			}
			if ($users->PK_NGUOIDUNG_ID->QueryStringValue == "1") {
				$this->sDisabled = " disabled=\"disabled\"";
			} else {
				$this->sDisabled = "";
			}
		} else {
			$users->CurrentAction = $_POST["a_edit"];
			// Get fields from form
			$users->PK_NGUOIDUNG_ID->setFormValue($_POST["x_PK_NGUOIDUNG_ID"]);
			for ($i = 0; $i < $this->TableNameCount; $i++) {
				if (defined("EW_USER_LEVEL_COMPAT")) {
					$this->arPriv[$i] = intval(@$_POST["Add_" . $i]) +
						intval(@$_POST["Delete_" . $i]) +
                                                intval(@$_POST["Edit_" . $i]) +
                                                intval(@$_POST["Active_" . $i]) +
						intval(@$_POST["List_" . $i]);
				} else {
					$this->arPriv[$i] = intval(@$_POST["Add_" . $i]) +
						intval(@$_POST["Delete_" . $i]) +
                                                intval(@$_POST["Edit_" . $i]) +
                                                intval(@$_POST["Active_" . $i]) +
						intval(@$_POST["List_" . $i]) +
                                                intval(@$_POST["View_" . $i]) +
						intval(@$_POST["Search_" . $i]);
				}
			}
		}
		switch ($users->CurrentAction) {
			case "I": // Display
				$Security->SetUpUserLevelEx(); // Get all User Level info
				break;
			case "U": // Update
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Set update success message
                                // echo "dad".$_POST["flag"];
                             if ($_POST["flag"]==1)
				// Alternatively, comment out the following line to go back to this page
                             	$this->Page_Terminate("users_solist.php"); // Return to list
                                else
                                $this->Page_Terminate("userslist.php"); // Return to list
				}
		}
	}

	// Update privileges
	function EditRow() {
		global $conn, $EW_SUB_USER_LEVEL_TABLE_NAME, $users;
		for ($i = 0; $i < $this->TableNameCount; $i++) {
			$Sql = "SELECT * FROM " . EW_SUB_USER_LEVEL_PRIV_TABLE . " WHERE " .
				EW_SUB_USER_LEVEL_PRIV_TABLE_NAME_FIELD . " = '" . ew_AdjustSql($EW_SUB_USER_LEVEL_TABLE_NAME[$i]) . "' AND " .
				EW_SUB_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $users->PK_NGUOIDUNG_ID->CurrentValue;
			$rs = $conn->Execute($Sql);
			if ($rs && !$rs->EOF) {
				$Sql = "UPDATE " . EW_SUB_USER_LEVEL_PRIV_TABLE . " SET " . EW_SUB_USER_LEVEL_PRIV_PRIV_FIELD . " = " . $this->arPriv[$i] . " WHERE " .
					EW_SUB_USER_LEVEL_PRIV_TABLE_NAME_FIELD . " = '" . ew_AdjustSql($EW_SUB_USER_LEVEL_TABLE_NAME[$i]) . "' AND " .
					EW_SUB_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . " = " . $users->PK_NGUOIDUNG_ID->CurrentValue;
                                $conn->Execute($Sql); 
			} else {
				$Sql = "INSERT INTO " . EW_SUB_USER_LEVEL_PRIV_TABLE . " (" . EW_SUB_USER_LEVEL_PRIV_TABLE_NAME_FIELD . ", " . EW_SUB_USER_LEVEL_PRIV_USER_LEVEL_ID_FIELD . ", " . EW_SUB_USER_LEVEL_PRIV_PRIV_FIELD . ") VALUES ('" . ew_AdjustSql($EW_SUB_USER_LEVEL_TABLE_NAME[$i]) . "', " . $users->PK_NGUOIDUNG_ID->CurrentValue . ", " . $this->arPriv[$i] . ")";
                                $conn->Execute($Sql);
			}
			if ($rs)
				$rs->Close();
		}
		return TRUE;
	}   
        //set enable checkbox
        function SetEnable($Table_,$user_,$key){ 
            $p=$this->GetPermissionGroup($Table_,$user_);            
           if (( $p & $key) == $key){
               return "";
           }else return " disabled=\"disabled\" ";
        }
        // Get permission group level
        function GetPermissionGroup($Table,$user) {
                global $conn;                
                $sSqlWrk = "Select userlevelpermissions.permission,t_nguoidung.PK_NGUOIDUNG_ID,t_nguoidung.FK_USERLEVELID,
                            userlevelpermissions.tablename From t_nguoidung Inner Join userlevelpermissions On t_nguoidung.FK_USERLEVELID = userlevelpermissions.userlevelid
                            Where t_nguoidung.PK_NGUOIDUNG_ID=".$user." And userlevelpermissions.tablename='".$Table."'";
                $rswrk = $conn->Execute($sSqlWrk);              
                $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                $rowswrk = count($arwrk);
                if ($rswrk) $rswrk->Close();
                if ($rowswrk>0){
                    return $arwrk[0][0];
                }else return 0;
        }
	// Get table caption
	function GetTableCaption($i) {
		global $Language;
		$caption = "";
		if ($i < $this->TableNameCount) {
			$caption = $Language->TablePhrase(@$GLOBALS["EW_SUB_USER_LEVEL_TABLE_VAR"][$i], "TblCaption");
			if ($caption == "" && $i < $this->TableCaptionCount)
				$caption = $GLOBALS["EW_SUB_USER_LEVEL_TABLE_CAPTION"][$i];
			$report = defined("EW_REPORT_TABLE_PREFIX") &&
				substr($GLOBALS["EW_SUB_USER_LEVEL_TABLE_NAME"][$i], 0, strlen(EW_REPORT_TABLE_PREFIX)) == EW_REPORT_TABLE_PREFIX;
			if ($caption == "") {
				$caption = $GLOBALS["EW_SUB_USER_LEVEL_TABLE_NAME"][$i];
				if ($report)
					$caption = substr($caption, strlen(EW_REPORT_TABLE_PREFIX));
			}
			if ($report)
				$caption .= "&nbsp;(" . $Language->Phrase("Report") . ")";
		}
		return $caption;
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
