<?php

// Global variable for table object
$t_congty = NULL;

//
// Table class for t_congty
//
class ct_congty {
	var $TableVar = 't_congty';
	var $TableName = 't_congty';
	var $TableType = 'TABLE';
	var $PK_MACONGTY;
	var $FK_NGANH_ID;
	var $C_TENCONGTY;
	var $C_TENVIETTAT;
	var $C_LOGO;
	var $C_WEBSITE;
	var $C_DIACHI;
	var $C_DIENTHOAI;
	var $C_FAX;
	var $C_EMAIL;
	var $C_MOTA;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $C_REPORT_STATUS;
	var $C_TYPE_TEMPLATE;
	var $C_PARRENT;
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
	function ct_congty() {
		global $Language;

		// PK_MACONGTY
		$this->PK_MACONGTY = new cField('t_congty', 't_congty', 'x_PK_MACONGTY', 'PK_MACONGTY', '`PK_MACONGTY`', 19, -1, FALSE, '`PK_MACONGTY`', FALSE);
		$this->PK_MACONGTY->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_MACONGTY'] =& $this->PK_MACONGTY;

		// FK_NGANH_ID
		$this->FK_NGANH_ID = new cField('t_congty', 't_congty', 'x_FK_NGANH_ID', 'FK_NGANH_ID', '`FK_NGANH_ID`', 3, -1, FALSE, '`FK_NGANH_ID`', FALSE);
		$this->FK_NGANH_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_NGANH_ID'] =& $this->FK_NGANH_ID;

		// C_TENCONGTY
		$this->C_TENCONGTY = new cField('t_congty', 't_congty', 'x_C_TENCONGTY', 'C_TENCONGTY', '`C_TENCONGTY`', 200, -1, FALSE, '`C_TENCONGTY`', FALSE);
		$this->fields['C_TENCONGTY'] =& $this->C_TENCONGTY;

		// C_TENVIETTAT
		$this->C_TENVIETTAT = new cField('t_congty', 't_congty', 'x_C_TENVIETTAT', 'C_TENVIETTAT', '`C_TENVIETTAT`', 200, -1, FALSE, '`C_TENVIETTAT`', FALSE);
		$this->fields['C_TENVIETTAT'] =& $this->C_TENVIETTAT;

		// C_LOGO
		$this->C_LOGO = new cField('t_congty', 't_congty', 'x_C_LOGO', 'C_LOGO', '`C_LOGO`', 205, -1, TRUE, '`C_LOGO`', FALSE);
		$this->fields['C_LOGO'] =& $this->C_LOGO;

		// C_WEBSITE
		$this->C_WEBSITE = new cField('t_congty', 't_congty', 'x_C_WEBSITE', 'C_WEBSITE', '`C_WEBSITE`', 200, -1, FALSE, '`C_WEBSITE`', FALSE);
		$this->fields['C_WEBSITE'] =& $this->C_WEBSITE;

		// C_DIACHI
		$this->C_DIACHI = new cField('t_congty', 't_congty', 'x_C_DIACHI', 'C_DIACHI', '`C_DIACHI`', 200, -1, FALSE, '`C_DIACHI`', FALSE);
		$this->fields['C_DIACHI'] =& $this->C_DIACHI;

		// C_DIENTHOAI
		$this->C_DIENTHOAI = new cField('t_congty', 't_congty', 'x_C_DIENTHOAI', 'C_DIENTHOAI', '`C_DIENTHOAI`', 200, -1, FALSE, '`C_DIENTHOAI`', FALSE);
		$this->fields['C_DIENTHOAI'] =& $this->C_DIENTHOAI;

		// C_FAX
		$this->C_FAX = new cField('t_congty', 't_congty', 'x_C_FAX', 'C_FAX', '`C_FAX`', 200, -1, FALSE, '`C_FAX`', FALSE);
		$this->fields['C_FAX'] =& $this->C_FAX;

		// C_EMAIL
		$this->C_EMAIL = new cField('t_congty', 't_congty', 'x_C_EMAIL', 'C_EMAIL', '`C_EMAIL`', 200, -1, FALSE, '`C_EMAIL`', FALSE);
		$this->fields['C_EMAIL'] =& $this->C_EMAIL;

		// C_MOTA
		$this->C_MOTA = new cField('t_congty', 't_congty', 'x_C_MOTA', 'C_MOTA', '`C_MOTA`', 201, -1, FALSE, '`C_MOTA`', FALSE);
		$this->C_MOTA->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_MOTA'] =& $this->C_MOTA;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_congty', 't_congty', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_congty', 't_congty', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_congty', 't_congty', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 19, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_congty', 't_congty', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// C_REPORT_STATUS
		$this->C_REPORT_STATUS = new cField('t_congty', 't_congty', 'x_C_REPORT_STATUS', 'C_REPORT_STATUS', '`C_REPORT_STATUS`', 19, -1, FALSE, '`C_REPORT_STATUS`', FALSE);
		$this->C_REPORT_STATUS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_REPORT_STATUS'] =& $this->C_REPORT_STATUS;

		// C_TYPE_TEMPLATE
		$this->C_TYPE_TEMPLATE = new cField('t_congty', 't_congty', 'x_C_TYPE_TEMPLATE', 'C_TYPE_TEMPLATE', '`C_TYPE_TEMPLATE`', 19, -1, FALSE, '`C_TYPE_TEMPLATE`', FALSE);
		$this->C_TYPE_TEMPLATE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TYPE_TEMPLATE'] =& $this->C_TYPE_TEMPLATE;

		// C_PARRENT
		$this->C_PARRENT = new cField('t_congty', 't_congty', 'x_C_PARRENT', 'C_PARRENT', '`C_PARRENT`', 3, -1, FALSE, '`C_PARRENT`', FALSE);
		$this->C_PARRENT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PARRENT'] =& $this->C_PARRENT;
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
		return "t_congty_Highlight";
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
		return "`t_congty`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
            global $Security,$PageObjName;
		$sWhere = "";
                if ($PageObjName == "t_congty_list")
                {
                    if (!isset($_SESSION['parrentcompanyid']) || $_SESSION['parrentcompanyid'] == '')
                    {
                        $sWhere .= "`t_congty`.`C_PARRENT` = -1";
                    }else{
                        $sWhere .= "`t_congty`.`C_PARRENT` = ". @$_SESSION['parrentcompanyid'];
                    }
                }
                if (!isAdmin())
                {
                   if ($sWhere <> "")
                   {
                       $sWhere .= " AND (t_congty.PK_MACONGTY =" . $Security->CurrentUserOption() . ")";
                   }
                   else
                   {
                       $sWhere .= "(t_congty.PK_MACONGTY =" . $Security->CurrentUserOption() . ")";
                   }
                }
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
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `t_congty` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_congty` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `t_congty` WHERE ";
		$SQL .= ew_QuotedName('PK_MACONGTY') . '=' . ew_QuotedValue($rs['PK_MACONGTY'], $this->PK_MACONGTY->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_MACONGTY` = @PK_MACONGTY@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_MACONGTY->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_MACONGTY@", ew_AdjustSql($this->PK_MACONGTY->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_congtylist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_congtylist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_congtyview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_congtyadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_congtyedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_congtyadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_congtydelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_MACONGTY->CurrentValue)) {
			$sUrl .= "PK_MACONGTY=" . urlencode($this->PK_MACONGTY->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_congty" : "";
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
		$this->PK_MACONGTY->setDbValue($rs->fields('PK_MACONGTY'));
		$this->FK_NGANH_ID->setDbValue($rs->fields('FK_NGANH_ID'));
		$this->C_TENCONGTY->setDbValue($rs->fields('C_TENCONGTY'));
		$this->C_TENVIETTAT->setDbValue($rs->fields('C_TENVIETTAT'));
		$this->C_LOGO->Upload->DbValue = $rs->fields('C_LOGO');
		$this->C_WEBSITE->setDbValue($rs->fields('C_WEBSITE'));
		$this->C_DIACHI->setDbValue($rs->fields('C_DIACHI'));
		$this->C_DIENTHOAI->setDbValue($rs->fields('C_DIENTHOAI'));
		$this->C_FAX->setDbValue($rs->fields('C_FAX'));
		$this->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$this->C_MOTA->setDbValue($rs->fields('C_MOTA'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->C_REPORT_STATUS->setDbValue($rs->fields('C_REPORT_STATUS'));
		$this->C_TYPE_TEMPLATE->setDbValue($rs->fields('C_TYPE_TEMPLATE'));
		$this->C_PARRENT->setDbValue($rs->fields('C_PARRENT'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// FK_NGANH_ID

		$this->FK_NGANH_ID->CellCssStyle = ""; $this->FK_NGANH_ID->CellCssClass = "";
		$this->FK_NGANH_ID->CellAttrs = array(); $this->FK_NGANH_ID->ViewAttrs = array(); $this->FK_NGANH_ID->EditAttrs = array();

		// C_TENCONGTY
		$this->C_TENCONGTY->CellCssStyle = ""; $this->C_TENCONGTY->CellCssClass = "";
		$this->C_TENCONGTY->CellAttrs = array(); $this->C_TENCONGTY->ViewAttrs = array(); $this->C_TENCONGTY->EditAttrs = array();

		// C_TYPE_TEMPLATE
		$this->C_TYPE_TEMPLATE->CellCssStyle = ""; $this->C_TYPE_TEMPLATE->CellCssClass = "";
		$this->C_TYPE_TEMPLATE->CellAttrs = array(); $this->C_TYPE_TEMPLATE->ViewAttrs = array(); $this->C_TYPE_TEMPLATE->EditAttrs = array();

		// FK_NGANH_ID
		if (strval($this->FK_NGANH_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_NGANH_ID` = " . ew_AdjustSql($this->FK_NGANH_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_TENNGANH` FROM `t_nganhnghe`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_NGANH_ID->ViewValue = $rswrk->fields('C_TENNGANH');
				$rswrk->Close();
			} else {
				$this->FK_NGANH_ID->ViewValue = $this->FK_NGANH_ID->CurrentValue;
			}
		} else {
			$this->FK_NGANH_ID->ViewValue = NULL;
		}
		$this->FK_NGANH_ID->CssStyle = "";
		$this->FK_NGANH_ID->CssClass = "";
		$this->FK_NGANH_ID->ViewCustomAttributes = "";

		// C_TENCONGTY
		$this->C_TENCONGTY->ViewValue = $this->C_TENCONGTY->CurrentValue;
		$this->C_TENCONGTY->CssStyle = "";
		$this->C_TENCONGTY->CssClass = "";
		$this->C_TENCONGTY->ViewCustomAttributes = "";

		// C_TYPE_TEMPLATE
		if (strval($this->C_TYPE_TEMPLATE->CurrentValue) <> "") {
			switch ($this->C_TYPE_TEMPLATE->CurrentValue) {
				case "1":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 1";
					break;
				case "2":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 2";
					break;
				case "3":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 3";
					break;
				case "4":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 4";
					break;
				case "5":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 5";
					break;
				case "6":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 6";
					break;
				case "7":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 7";
					break;
				case "8":
					$this->C_TYPE_TEMPLATE->ViewValue = "Mau 8";
					break;
				default:
					$this->C_TYPE_TEMPLATE->ViewValue = $this->C_TYPE_TEMPLATE->CurrentValue;
			}
		} else {
			$this->C_TYPE_TEMPLATE->ViewValue = NULL;
		}
		$this->C_TYPE_TEMPLATE->CssStyle = "";
		$this->C_TYPE_TEMPLATE->CssClass = "";
		$this->C_TYPE_TEMPLATE->ViewCustomAttributes = "";

		// FK_NGANH_ID
		$this->FK_NGANH_ID->HrefValue = "";
		$this->FK_NGANH_ID->TooltipValue = "";

		// C_TENCONGTY
		$this->C_TENCONGTY->HrefValue = "";
		$this->C_TENCONGTY->TooltipValue = "";

		// C_TYPE_TEMPLATE
		$this->C_TYPE_TEMPLATE->HrefValue = "";
		$this->C_TYPE_TEMPLATE->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
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
