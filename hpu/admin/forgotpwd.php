<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
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
$forgotpwd = new cforgotpwd();
$Page =& $forgotpwd;

// Page init
$forgotpwd->Page_Init();

// Page main
$forgotpwd->Page_Main();
?>
<?php include "header_no_menu.php" ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<script type="text/javascript">
<!--
var forgotpwd = new ew_Page("forgotpwd");

// extend page with ValidateForm function
forgotpwd.ValidateForm = function(fobj)
{
	if (!this.ValidateRequired)
		return true; // ignore validation
	if  (!ew_HasValue(fobj.email))
		return ew_OnError(this, fobj.email, ewLanguage.Phrase("EnterValidEmail"));
	if  (!ew_CheckEmail(fobj.email.value))
		return ew_OnError(this, fobj.email, ewLanguage.Phrase("EnterValidEmail"));

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// extend page with Form_CustomValidate function
forgotpwd.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// requires js validation
<?php if (EW_CLIENT_VALIDATE) { ?>
forgotpwd.ValidateRequired = true;
<?php } else { ?>
forgotpwd.ValidateRequired = false;
<?php } ?>

//-->
</script>
<div>
 <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="100%" background="images/bg_line.gif" valign="top">
								<b><font class="fontchu">
								<?php //echo $Language->Phrase("TblTypeCUSTOMVIEW") ?><?php echo $Language->Phrase("RequestPwdPage") ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker" style="font-weight: 600;font-size: 15px;">
<a href="login.php"><?php echo $Language->Phrase("BackToLogin") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$forgotpwd->ShowMessage();
?>
 <center>
<form action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return forgotpwd.ValidateForm(this);">
<table border="0" cellspacing="0" cellpadding="4">
	<tr>
		<td><span class="phpmaker"><?php echo $Language->Phrase("UserEmail") ?></span></td>
		<td><span class="phpmaker"><input type="text" name="email" id="email" value="<?php ew_HtmlEncode($forgotpwd->sEmail) ?>" size="80" maxlength="255"></span></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><span class="phpmaker"><input type="submit" name="submit" id="submit" value="<?php echo ew_BtnCaption($Language->Phrase("SendPwd")) ?>"></span></td>
	</tr>
</table>
</form>
</center>
</div>
<br>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$forgotpwd->Page_Terminate();
?>
<?php

//
// Page class
//
class cforgotpwd {

	// Page ID
	var $PageID = 'forgotpwd';

	// Page object name
	var $PageObjName = 'forgotpwd';

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
	function cforgotpwd() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (t_nguoidung)
		$GLOBALS["t_nguoidung"] = new ct_nguoidung();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'forgotpwd', TRUE);

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
		global $t_nguoidung;

		// User profile
		$UserProfile = new cUserProfile();
		$UserProfile->LoadProfile(@$_SESSION[EW_SESSION_USER_PROFILE]);

		// Security
		$Security = new cAdvancedSecurity();

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
	var $sEmail = "";

	//
	// Page main
	//
	function Page_Main() {
		global $conn, $Language, $gsFormError, $t_nguoidung;
		if (ew_IsHttpPost()) {
			$bValidEmail = FALSE;
			$bEmailSent = FALSE;

			// Setup variables
			$sEmail = $_POST["email"];
			if ($this->ValidateForm($sEmail)) {

				// Set up filter (SQL WHERE clause) and get Return SQL
				// SQL constructor in t_nguoidung class, t_nguoidunginfo.php

				$sFilter = str_replace("%e", ew_AdjustSql($sEmail), EW_USER_EMAIL_FILTER);
				$t_nguoidung->CurrentFilter = $sFilter;
				$sSql = $t_nguoidung->SQL();
				if ($RsUser = $conn->Execute($sSql)) {
					if (!$RsUser->EOF) {

						// Call User Recover Password event
						$this->User_RecoverPassword($RsUser);
						$sUserName = $RsUser->fields('C_TENDANGNHAP');
						$sPassword = $RsUser->fields('C_MATKHAU');
						if (EW_MD5_PASSWORD) {
							$rsnew = array('C_MATKHAU' => $sPassword); // Reset the password
							$conn->Execute($t_nguoidung->UpdateSQL($rsnew));
						}
						$bValidEmail = TRUE;
					} else {
						$this->setMessage($Language->Phrase("InvalidEmail"));
					}
					if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/forgotpwd.txt");
						$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
						$Email->ReplaceRecipient($sEmail); // Replace Recipient
						$Email->ReplaceContent('<!--$UserName-->', $sUserName);
						$Email->ReplaceContent('<!--$Password-->', $sPassword);
						$Email->Charset = EW_EMAIL_CHARSET;
						$Args = array();
						$Args["rs"] =& $rsnew;
						if ($this->Email_Sending($Email, $Args))
							$bEmailSent = $Email->Send();
					}
					$RsUser->Close();
				}
				if ($bEmailSent) {
					$this->setMessage($Language->Phrase("PwdEmailSent")); // Set success message
					$this->Page_Terminate("login.php"); // Return to login page
				} elseif ($bValidEmail) {
					$this->setMessage($Language->Phrase("FailedToSendMail")); // Set up error message
				}
			} else {
				$this->setMessage($gsFormError);
			}
		}
	}

	//
	// Validate form
	//
	function ValidateForm($email) {
		global $gsFormError, $Language;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if ($email == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterValidEmail");
		}
		if (!ew_CheckEmail($email)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterValidEmail");
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form Custom Validate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
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

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// User RecoverPassword event
	function User_RecoverPassword(&$s) {

	  //echo "User_RecoverPassword";
	}
}
?>
