<?php

// Global variable for table object
$t_nguoidung = NULL;

//
// Table class for t_nguoidung
//
class ct_nguoidung {
	var $TableVar = 't_nguoidung';
	var $TableName = 't_nguoidung';
	var $TableType = 'TABLE';
	var $PK_NGUOIDUNG_ID;
	var $FK_MACONGTY;
	var $C_TENDANGNHAP;
	var $C_MATKHAU;
	var $C_HOTEN;
	var $C_DIACHI;
	var $C_TEL;
	var $C_TEL_HOME;
	var $C_TEL_MOBILE;
	var $C_FAX;
	var $C_EMAIL;
	var $C_PROFILE;
	var $FK_USERLEVELID;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var $ExportAll = TRUE;
	var $SendEmail; // Send email
	var $TableCustomInnerHtml; // Custom inner HTML
	var $BasicSearchKeyword; // Basic search keyword
	var $BasicSearchType; // Basic search type
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type
	var $RowType; // Row type
	var $CssClass; // CSS class
	var $CssStyle; // CSS style
	var $RowAttrs = array(); // Row custom attributes
	var $TableFilter = "";
	var $CurrentAction; // Current action
	var $UpdateConflict; // Update conflict
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message

	//
	// Table class constructor
	//
	function ct_nguoidung() {
		global $Language;

		// PK_NGUOIDUNG_ID
		$this->PK_NGUOIDUNG_ID = new cField('t_nguoidung', 't_nguoidung', 'x_PK_NGUOIDUNG_ID', 'PK_NGUOIDUNG_ID', '`PK_NGUOIDUNG_ID`', 3, -1, FALSE, '`PK_NGUOIDUNG_ID`', FALSE);
		$this->PK_NGUOIDUNG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_NGUOIDUNG_ID'] =& $this->PK_NGUOIDUNG_ID;

		// FK_MACONGTY
		$this->FK_MACONGTY = new cField('t_nguoidung', 't_nguoidung', 'x_FK_MACONGTY', 'FK_MACONGTY', '`FK_MACONGTY`', 3, -1, FALSE, '`FK_MACONGTY`', FALSE);
		$this->FK_MACONGTY->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_MACONGTY'] =& $this->FK_MACONGTY;

		// C_TENDANGNHAP
		$this->C_TENDANGNHAP = new cField('t_nguoidung', 't_nguoidung', 'x_C_TENDANGNHAP', 'C_TENDANGNHAP', '`C_TENDANGNHAP`', 200, -1, FALSE, '`C_TENDANGNHAP`', FALSE);
		$this->fields['C_TENDANGNHAP'] =& $this->C_TENDANGNHAP;

		// C_MATKHAU
		$this->C_MATKHAU = new cField('t_nguoidung', 't_nguoidung', 'x_C_MATKHAU', 'C_MATKHAU', '`C_MATKHAU`', 200, -1, FALSE, '`C_MATKHAU`', FALSE);
		$this->fields['C_MATKHAU'] =& $this->C_MATKHAU;

		// C_HOTEN
		$this->C_HOTEN = new cField('t_nguoidung', 't_nguoidung', 'x_C_HOTEN', 'C_HOTEN', '`C_HOTEN`', 200, -1, FALSE, '`C_HOTEN`', FALSE);
		$this->fields['C_HOTEN'] =& $this->C_HOTEN;

		// C_DIACHI
		$this->C_DIACHI = new cField('t_nguoidung', 't_nguoidung', 'x_C_DIACHI', 'C_DIACHI', '`C_DIACHI`', 200, -1, FALSE, '`C_DIACHI`', FALSE);
		$this->fields['C_DIACHI'] =& $this->C_DIACHI;

		// C_TEL
		$this->C_TEL = new cField('t_nguoidung', 't_nguoidung', 'x_C_TEL', 'C_TEL', '`C_TEL`', 200, -1, FALSE, '`C_TEL`', FALSE);
		$this->fields['C_TEL'] =& $this->C_TEL;

		// C_TEL_HOME
		$this->C_TEL_HOME = new cField('t_nguoidung', 't_nguoidung', 'x_C_TEL_HOME', 'C_TEL_HOME', '`C_TEL_HOME`', 200, -1, FALSE, '`C_TEL_HOME`', FALSE);
		$this->fields['C_TEL_HOME'] =& $this->C_TEL_HOME;

		// C_TEL_MOBILE
		$this->C_TEL_MOBILE = new cField('t_nguoidung', 't_nguoidung', 'x_C_TEL_MOBILE', 'C_TEL_MOBILE', '`C_TEL_MOBILE`', 200, -1, FALSE, '`C_TEL_MOBILE`', FALSE);
		$this->fields['C_TEL_MOBILE'] =& $this->C_TEL_MOBILE;

		// C_FAX
		$this->C_FAX = new cField('t_nguoidung', 't_nguoidung', 'x_C_FAX', 'C_FAX', '`C_FAX`', 200, -1, FALSE, '`C_FAX`', FALSE);
		$this->fields['C_FAX'] =& $this->C_FAX;

		// C_EMAIL
		$this->C_EMAIL = new cField('t_nguoidung', 't_nguoidung', 'x_C_EMAIL', 'C_EMAIL', '`C_EMAIL`', 200, -1, FALSE, '`C_EMAIL`', FALSE);
		$this->fields['C_EMAIL'] =& $this->C_EMAIL;

		// C_PROFILE
		$this->C_PROFILE = new cField('t_nguoidung', 't_nguoidung', 'x_C_PROFILE', 'C_PROFILE', '`C_PROFILE`', 201, -1, FALSE, '`C_PROFILE`', FALSE);
		$this->fields['C_PROFILE'] =& $this->C_PROFILE;

		// FK_USERLEVELID
		$this->FK_USERLEVELID = new cField('t_nguoidung', 't_nguoidung', 'x_FK_USERLEVELID', 'FK_USERLEVELID', '`FK_USERLEVELID`', 3, -1, FALSE, '`FK_USERLEVELID`', FALSE);
		$this->FK_USERLEVELID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_USERLEVELID'] =& $this->FK_USERLEVELID;
	}

	// Table caption
	function TableCaption() {
		global $Language;
		return $Language->TablePhrase($this->TableVar, "TblCaption");
	}

	// Page caption
	function PageCaption($Page) {
		global $Language;
		$Caption = $Language->TablePhrase($this->TableVar, "TblPageCaption" . $Page);
		if ($Caption == "") $Caption = "Page " . $Page;
		return $Caption;
	}

	// Export return page
	function ExportReturnUrl() {
		$url = @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_EXPORT_RETURN_URL];
		return ($url <> "") ? $url : ew_CurrentPage();
	}

	function setExportReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_EXPORT_RETURN_URL] = $v;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search highlight name
	function HighlightName() {
		return "t_nguoidung_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search keyword
	function getSessionBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setSessionBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic search type
	function getSessionBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setSessionBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search WHERE clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Multiple column sort
	function UpdateSort(&$ofld, $ctrl) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ctrl) {
				$sOrderBy = $this->getSessionOrderBy();
				if (strpos($sOrderBy, $sSortField . " " . $sLastSort) !== FALSE) {
					$sOrderBy = str_replace($sSortField . " " . $sLastSort, $sSortField . " " . $sThisSort, $sOrderBy);
				} else {
					if ($sOrderBy <> "") $sOrderBy .= ", ";
					$sOrderBy .= $sSortField . " " . $sThisSort;
				}
				$this->setSessionOrderBy($sOrderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
			}
		} else {
			if (!$ctrl) $ofld->setSort("");
		}
	}

	// Session WHERE clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`t_nguoidung`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = "";
		if ($this->TableFilter <> "") {
			if ($sWhere <> "") $sWhere .= "(" . $sWhere . ") AND (";
			$sWhere .= "(" . $this->TableFilter . ")";
		}
		return $sWhere;
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (EW_PAGE_ID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		global $Security;

		// Add User ID filter
		if (!$this->AllowAnonymousUser() && $Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
		return $sFilter;
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "(" . $sFilter . ") AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(), $this->SqlGroupBy(),
			$this->SqlHaving(), $this->SqlOrderBy(), $sFilter, $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		global $conn;
		$cnt = -1;
		if ($this->TableType == 'TABLE' || $this->TableType == 'VIEW') {
			$sSql = "SELECT COUNT(*) FROM" . substr($sSql, 13);
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") EW_COUNT_TABLE";
		}
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		global $conn;
		$origFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		global $conn;
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (EW_MD5_PASSWORD && $name == 'C_MATKHAU')
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `t_nguoidung` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_nguoidung` SET ";
		foreach ($rs as $name => $value) {
			if (EW_MD5_PASSWORD && $name == 'C_MATKHAU') {
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			}
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `t_nguoidung` WHERE ";
		$SQL .= ew_QuotedName('PK_NGUOIDUNG_ID') . '=' . ew_QuotedValue($rs['PK_NGUOIDUNG_ID'], $this->PK_NGUOIDUNG_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_NGUOIDUNG_ID` = @PK_NGUOIDUNG_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_NGUOIDUNG_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_NGUOIDUNG_ID@", ew_AdjustSql($this->PK_NGUOIDUNG_ID->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "t_nguoidunglist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_nguoidunglist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_nguoidungview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_nguoidungadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_nguoidungedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_nguoidungadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_nguoidungdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_NGUOIDUNG_ID->CurrentValue)) {
			$sUrl .= "PK_NGUOIDUNG_ID=" . urlencode($this->PK_NGUOIDUNG_ID->CurrentValue);
		} else {
			return "javascript:alert(ewLanguage.Phrase(\"InvalidRecord\"));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Add URL parameter
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_nguoidung" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->PK_NGUOIDUNG_ID->setDbValue($rs->fields('PK_NGUOIDUNG_ID'));
		$this->FK_MACONGTY->setDbValue($rs->fields('FK_MACONGTY'));
		$this->C_TENDANGNHAP->setDbValue($rs->fields('C_TENDANGNHAP'));
		$this->C_MATKHAU->setDbValue($rs->fields('C_MATKHAU'));
		$this->C_HOTEN->setDbValue($rs->fields('C_HOTEN'));
		$this->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$this->C_TEL->setDbValue($rs->fields('C_TEL'));
		$this->C_TEL_HOME->setDbValue($rs->fields('C_TEL_HOME'));
		$this->C_TEL_MOBILE->setDbValue($rs->fields('C_TEL_MOBILE'));
		$this->C_FAX->setDbValue($rs->fields('C_FAX'));
		$this->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$this->C_PROFILE->setDbValue($rs->fields('C_PROFILE'));
		$this->FK_USERLEVELID->setDbValue($rs->fields('FK_USERLEVELID'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// PK_NGUOIDUNG_ID

		$this->PK_NGUOIDUNG_ID->CellCssStyle = ""; $this->PK_NGUOIDUNG_ID->CellCssClass = "";
		$this->PK_NGUOIDUNG_ID->CellAttrs = array(); $this->PK_NGUOIDUNG_ID->ViewAttrs = array(); $this->PK_NGUOIDUNG_ID->EditAttrs = array();

		// FK_MACONGTY
		$this->FK_MACONGTY->CellCssStyle = ""; $this->FK_MACONGTY->CellCssClass = "";
		$this->FK_MACONGTY->CellAttrs = array(); $this->FK_MACONGTY->ViewAttrs = array(); $this->FK_MACONGTY->EditAttrs = array();

		// C_TENDANGNHAP
		$this->C_TENDANGNHAP->CellCssStyle = ""; $this->C_TENDANGNHAP->CellCssClass = "";
		$this->C_TENDANGNHAP->CellAttrs = array(); $this->C_TENDANGNHAP->ViewAttrs = array(); $this->C_TENDANGNHAP->EditAttrs = array();

		// C_MATKHAU
		$this->C_MATKHAU->CellCssStyle = ""; $this->C_MATKHAU->CellCssClass = "";
		$this->C_MATKHAU->CellAttrs = array(); $this->C_MATKHAU->ViewAttrs = array(); $this->C_MATKHAU->EditAttrs = array();

		// C_HOTEN
		$this->C_HOTEN->CellCssStyle = ""; $this->C_HOTEN->CellCssClass = "";
		$this->C_HOTEN->CellAttrs = array(); $this->C_HOTEN->ViewAttrs = array(); $this->C_HOTEN->EditAttrs = array();

		// C_DIACHI
		$this->C_DIACHI->CellCssStyle = ""; $this->C_DIACHI->CellCssClass = "";
		$this->C_DIACHI->CellAttrs = array(); $this->C_DIACHI->ViewAttrs = array(); $this->C_DIACHI->EditAttrs = array();

		// C_TEL
		$this->C_TEL->CellCssStyle = ""; $this->C_TEL->CellCssClass = "";
		$this->C_TEL->CellAttrs = array(); $this->C_TEL->ViewAttrs = array(); $this->C_TEL->EditAttrs = array();

		// C_TEL_HOME
		$this->C_TEL_HOME->CellCssStyle = ""; $this->C_TEL_HOME->CellCssClass = "";
		$this->C_TEL_HOME->CellAttrs = array(); $this->C_TEL_HOME->ViewAttrs = array(); $this->C_TEL_HOME->EditAttrs = array();

		// C_TEL_MOBILE
		$this->C_TEL_MOBILE->CellCssStyle = ""; $this->C_TEL_MOBILE->CellCssClass = "";
		$this->C_TEL_MOBILE->CellAttrs = array(); $this->C_TEL_MOBILE->ViewAttrs = array(); $this->C_TEL_MOBILE->EditAttrs = array();

		// C_FAX
		$this->C_FAX->CellCssStyle = ""; $this->C_FAX->CellCssClass = "";
		$this->C_FAX->CellAttrs = array(); $this->C_FAX->ViewAttrs = array(); $this->C_FAX->EditAttrs = array();

		// C_EMAIL
		$this->C_EMAIL->CellCssStyle = ""; $this->C_EMAIL->CellCssClass = "";
		$this->C_EMAIL->CellAttrs = array(); $this->C_EMAIL->ViewAttrs = array(); $this->C_EMAIL->EditAttrs = array();

		// FK_USERLEVELID
		$this->FK_USERLEVELID->CellCssStyle = ""; $this->FK_USERLEVELID->CellCssClass = "";
		$this->FK_USERLEVELID->CellAttrs = array(); $this->FK_USERLEVELID->ViewAttrs = array(); $this->FK_USERLEVELID->EditAttrs = array();

		// PK_NGUOIDUNG_ID
		$this->PK_NGUOIDUNG_ID->ViewValue = $this->PK_NGUOIDUNG_ID->CurrentValue;
		$this->PK_NGUOIDUNG_ID->CssStyle = "";
		$this->PK_NGUOIDUNG_ID->CssClass = "";
		$this->PK_NGUOIDUNG_ID->ViewCustomAttributes = "";

		// FK_MACONGTY
		$this->FK_MACONGTY->ViewValue = $this->FK_MACONGTY->CurrentValue;
		$this->FK_MACONGTY->CssStyle = "";
		$this->FK_MACONGTY->CssClass = "";
		$this->FK_MACONGTY->ViewCustomAttributes = "";

		// C_TENDANGNHAP
		$this->C_TENDANGNHAP->ViewValue = $this->C_TENDANGNHAP->CurrentValue;
		$this->C_TENDANGNHAP->CssStyle = "";
		$this->C_TENDANGNHAP->CssClass = "";
		$this->C_TENDANGNHAP->ViewCustomAttributes = "";

		// C_MATKHAU
		$this->C_MATKHAU->ViewValue = $this->C_MATKHAU->CurrentValue;
		$this->C_MATKHAU->CssStyle = "";
		$this->C_MATKHAU->CssClass = "";
		$this->C_MATKHAU->ViewCustomAttributes = "";

		// C_HOTEN
		$this->C_HOTEN->ViewValue = $this->C_HOTEN->CurrentValue;
		$this->C_HOTEN->CssStyle = "";
		$this->C_HOTEN->CssClass = "";
		$this->C_HOTEN->ViewCustomAttributes = "";

		// C_DIACHI
		$this->C_DIACHI->ViewValue = $this->C_DIACHI->CurrentValue;
		$this->C_DIACHI->CssStyle = "";
		$this->C_DIACHI->CssClass = "";
		$this->C_DIACHI->ViewCustomAttributes = "";

		// C_TEL
		$this->C_TEL->ViewValue = $this->C_TEL->CurrentValue;
		$this->C_TEL->CssStyle = "";
		$this->C_TEL->CssClass = "";
		$this->C_TEL->ViewCustomAttributes = "";

		// C_TEL_HOME
		$this->C_TEL_HOME->ViewValue = $this->C_TEL_HOME->CurrentValue;
		$this->C_TEL_HOME->CssStyle = "";
		$this->C_TEL_HOME->CssClass = "";
		$this->C_TEL_HOME->ViewCustomAttributes = "";

		// C_TEL_MOBILE
		$this->C_TEL_MOBILE->ViewValue = $this->C_TEL_MOBILE->CurrentValue;
		$this->C_TEL_MOBILE->CssStyle = "";
		$this->C_TEL_MOBILE->CssClass = "";
		$this->C_TEL_MOBILE->ViewCustomAttributes = "";

		// C_FAX
		$this->C_FAX->ViewValue = $this->C_FAX->CurrentValue;
		$this->C_FAX->CssStyle = "";
		$this->C_FAX->CssClass = "";
		$this->C_FAX->ViewCustomAttributes = "";

		// C_EMAIL
		$this->C_EMAIL->ViewValue = $this->C_EMAIL->CurrentValue;
		$this->C_EMAIL->CssStyle = "";
		$this->C_EMAIL->CssClass = "";
		$this->C_EMAIL->ViewCustomAttributes = "";

		// FK_USERLEVELID
		if ($Security->CanAdmin()) { // System admin
		if (strval($this->FK_USERLEVELID->CurrentValue) <> "") {
			$sFilterWrk = "`userlevelid` = " . ew_AdjustSql($this->FK_USERLEVELID->CurrentValue) . "";
		$sSqlWrk = "SELECT `userlevelname` FROM `userlevels`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_USERLEVELID->ViewValue = $rswrk->fields('userlevelname');
				$rswrk->Close();
			} else {
				$this->FK_USERLEVELID->ViewValue = $this->FK_USERLEVELID->CurrentValue;
			}
		} else {
			$this->FK_USERLEVELID->ViewValue = NULL;
		}
		} else {
			$this->FK_USERLEVELID->ViewValue = "********";
		}
		$this->FK_USERLEVELID->CssStyle = "";
		$this->FK_USERLEVELID->CssClass = "";
		$this->FK_USERLEVELID->ViewCustomAttributes = "";

		// PK_NGUOIDUNG_ID
		$this->PK_NGUOIDUNG_ID->HrefValue = "";
		$this->PK_NGUOIDUNG_ID->TooltipValue = "";

		// FK_MACONGTY
		$this->FK_MACONGTY->HrefValue = "";
		$this->FK_MACONGTY->TooltipValue = "";

		// C_TENDANGNHAP
		$this->C_TENDANGNHAP->HrefValue = "";
		$this->C_TENDANGNHAP->TooltipValue = "";

		// C_MATKHAU
		$this->C_MATKHAU->HrefValue = "";
		$this->C_MATKHAU->TooltipValue = "";

		// C_HOTEN
		$this->C_HOTEN->HrefValue = "";
		$this->C_HOTEN->TooltipValue = "";

		// C_DIACHI
		$this->C_DIACHI->HrefValue = "";
		$this->C_DIACHI->TooltipValue = "";

		// C_TEL
		$this->C_TEL->HrefValue = "";
		$this->C_TEL->TooltipValue = "";

		// C_TEL_HOME
		$this->C_TEL_HOME->HrefValue = "";
		$this->C_TEL_HOME->TooltipValue = "";

		// C_TEL_MOBILE
		$this->C_TEL_MOBILE->HrefValue = "";
		$this->C_TEL_MOBILE->TooltipValue = "";

		// C_FAX
		$this->C_FAX->HrefValue = "";
		$this->C_FAX->TooltipValue = "";

		// C_EMAIL
		$this->C_EMAIL->HrefValue = "";
		$this->C_EMAIL->TooltipValue = "";

		// FK_USERLEVELID
		$this->FK_USERLEVELID->HrefValue = "";
		$this->FK_USERLEVELID->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
	}

	// User ID filter
	function UserIDFilter($userid) {
		$sUserIDFilter = '`PK_NGUOIDUNG_ID` = ' . ew_QuotedValue($userid, EW_DATATYPE_NUMBER);
		return $sUserIDFilter;
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		$sFilterWrk = $Security->UserIDList();
		if (!$Security->IsAdmin() && $sFilterWrk <> "") {
			$sFilterWrk = '`PK_NGUOIDUNG_ID` IN (' . $sFilterWrk . ')';
			if ($sFilter <> "")
				$sFilterWrk = "(" . $sFilter . ") AND (" . $sFilterWrk . ")";
		} else {
			$sFilterWrk = $sFilter;
		}
		return $sFilterWrk;
	}

	// User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `t_nguoidung` WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= ew_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
	}

	// Row styles
	function RowStyles() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->RowAttrs["style"] <> "")
			$sStyle .= " " . $this->RowAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->RowAttrs["class"] <> "")
			$sClass .= " " . $this->RowAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		return $sAtt;
	}

	// Row attributes
	function RowAttributes() {
		$sAtt = $this->RowStyles();
		if ($this->Export == "") {
			foreach ($this->RowAttrs as $k => $v) {
				if ($k <> "class" && $k <> "style" && trim($v) <> "")
					$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
			}
		}
		return $sAtt;
	}

	// Field object by name
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//global $MyTable;
		//$MyTable->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict(&$rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
