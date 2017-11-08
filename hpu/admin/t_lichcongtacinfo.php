<?php

// Global variable for table object
$t_lichcongtac = NULL;

//
// Table class for t_lichcongtac
//
class ct_lichcongtac {
	var $TableVar = 't_lichcongtac';
	var $TableName = 't_lichcongtac';
	var $TableType = 'TABLE';
	var $C_CADENLAR_ID;
	var $FK_CONGTY;
	var $FK_SB_ID;
	var $C_TITLE;
	var $C_DATE_STAR;
	var $C_HOUR_START;
	var $C_MINUTES_STAR;
	var $C_STATUS_STAR;
	var $C_DATE_END;
	var $C_HOUR_END;
	var $C_MINUTES_END;
	var $C_STATUS_END;
	var $C_CONTENT;
	var $C_ORGANIZATION;
	var $C_PARTICIPANTS_ID;
	var $C_WHERE;
	var $C_PREPARED;
	var $C_OPTION;
	var $C_FILE_ATTACH;
	var $C_ACTIVE;
	var $C_DATETIME_ACTIVE;
	var $C_PUBLISH;
	var $C_DATETIME_PUBLISH;
	var $C_FK_PUBLISH;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
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
	function ct_lichcongtac() {
		global $Language;

		// C_CADENLAR_ID
		$this->C_CADENLAR_ID = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_CADENLAR_ID', 'C_CADENLAR_ID', '`C_CADENLAR_ID`', 3, -1, FALSE, '`C_CADENLAR_ID`', FALSE);
		$this->C_CADENLAR_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_CADENLAR_ID'] =& $this->C_CADENLAR_ID;

		// FK_CONGTY
		$this->FK_CONGTY = new cField('t_lichcongtac', 't_lichcongtac', 'x_FK_CONGTY', 'FK_CONGTY', '`FK_CONGTY`', 3, -1, FALSE, '`FK_CONGTY`', FALSE);
		$this->FK_CONGTY->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY'] =& $this->FK_CONGTY;

		// FK_SB_ID
		$this->FK_SB_ID = new cField('t_lichcongtac', 't_lichcongtac', 'x_FK_SB_ID', 'FK_SB_ID', '`FK_SB_ID`', 3, -1, FALSE, '`FK_SB_ID`', FALSE);
		$this->FK_SB_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_SB_ID'] =& $this->FK_SB_ID;

		// C_TITLE
		$this->C_TITLE = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_TITLE', 'C_TITLE', '`C_TITLE`', 200, -1, FALSE, '`C_TITLE`', FALSE);
		$this->fields['C_TITLE'] =& $this->C_TITLE;

		// C_DATE_STAR
		$this->C_DATE_STAR = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_DATE_STAR', 'C_DATE_STAR', '`C_DATE_STAR`', 135, 7, FALSE, '`C_DATE_STAR`', FALSE);
		$this->C_DATE_STAR->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATE_STAR'] =& $this->C_DATE_STAR;

		// C_HOUR_START
		$this->C_HOUR_START = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_HOUR_START', 'C_HOUR_START', '`C_HOUR_START`', 3, -1, FALSE, '`C_HOUR_START`', FALSE);
		$this->C_HOUR_START->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_HOUR_START'] =& $this->C_HOUR_START;

		// C_MINUTES_STAR
		$this->C_MINUTES_STAR = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_MINUTES_STAR', 'C_MINUTES_STAR', '`C_MINUTES_STAR`', 200, -1, FALSE, '`C_MINUTES_STAR`', FALSE);
		$this->fields['C_MINUTES_STAR'] =& $this->C_MINUTES_STAR;

		// C_STATUS_STAR
		$this->C_STATUS_STAR = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_STATUS_STAR', 'C_STATUS_STAR', '`C_STATUS_STAR`', 3, -1, FALSE, '`C_STATUS_STAR`', FALSE);
		$this->C_STATUS_STAR->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_STATUS_STAR'] =& $this->C_STATUS_STAR;

		// C_DATE_END
		$this->C_DATE_END = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_DATE_END', 'C_DATE_END', '`C_DATE_END`', 135, 7, FALSE, '`C_DATE_END`', FALSE);
		$this->C_DATE_END->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATE_END'] =& $this->C_DATE_END;

		// C_HOUR_END
		$this->C_HOUR_END = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_HOUR_END', 'C_HOUR_END', '`C_HOUR_END`', 3, -1, FALSE, '`C_HOUR_END`', FALSE);
		$this->C_HOUR_END->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_HOUR_END'] =& $this->C_HOUR_END;

		// C_MINUTES_END
		$this->C_MINUTES_END = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_MINUTES_END', 'C_MINUTES_END', '`C_MINUTES_END`', 200, -1, FALSE, '`C_MINUTES_END`', FALSE);
		$this->fields['C_MINUTES_END'] =& $this->C_MINUTES_END;

		// C_STATUS_END
		$this->C_STATUS_END = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_STATUS_END', 'C_STATUS_END', '`C_STATUS_END`', 3, -1, FALSE, '`C_STATUS_END`', FALSE);
		$this->C_STATUS_END->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_STATUS_END'] =& $this->C_STATUS_END;

		// C_CONTENT
		$this->C_CONTENT = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_CONTENT', 'C_CONTENT', '`C_CONTENT`', 201, -1, FALSE, '`C_CONTENT`', FALSE);
		$this->C_CONTENT->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENT'] =& $this->C_CONTENT;

		// C_ORGANIZATION
		$this->C_ORGANIZATION = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_ORGANIZATION', 'C_ORGANIZATION', '`C_ORGANIZATION`', 200, -1, FALSE, '`C_ORGANIZATION`', FALSE);
		$this->fields['C_ORGANIZATION'] =& $this->C_ORGANIZATION;

		// C_PARTICIPANTS_ID
		$this->C_PARTICIPANTS_ID = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_PARTICIPANTS_ID', 'C_PARTICIPANTS_ID', '`C_PARTICIPANTS_ID`', 200, -1, FALSE, '`C_PARTICIPANTS_ID`', FALSE);
		$this->fields['C_PARTICIPANTS_ID'] =& $this->C_PARTICIPANTS_ID;

		// C_WHERE
		$this->C_WHERE = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_WHERE', 'C_WHERE', '`C_WHERE`', 200, -1, FALSE, '`C_WHERE`', FALSE);
		$this->fields['C_WHERE'] =& $this->C_WHERE;

		// C_PREPARED
		$this->C_PREPARED = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_PREPARED', 'C_PREPARED', '`C_PREPARED`', 200, -1, FALSE, '`C_PREPARED`', FALSE);
		$this->fields['C_PREPARED'] =& $this->C_PREPARED;

		// C_OPTION
		$this->C_OPTION = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_OPTION', 'C_OPTION', '`C_OPTION`', 3, -1, FALSE, '`C_OPTION`', FALSE);
		$this->C_OPTION->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_OPTION'] =& $this->C_OPTION;

		// C_FILE_ATTACH
		$this->C_FILE_ATTACH = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_FILE_ATTACH', 'C_FILE_ATTACH', '`C_FILE_ATTACH`', 200, 0, TRUE, '`C_FILE_ATTACH`', FALSE);
		$this->C_FILE_ATTACH->UploadPath = "../upload/ATTACK_CALEDAR";
		$this->fields['C_FILE_ATTACH'] =& $this->C_FILE_ATTACH;

		// C_ACTIVE
		$this->C_ACTIVE = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_ACTIVE', 'C_ACTIVE', '`C_ACTIVE`', 3, -1, FALSE, '`C_ACTIVE`', FALSE);
		$this->C_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE'] =& $this->C_ACTIVE;

		// C_DATETIME_ACTIVE
		$this->C_DATETIME_ACTIVE = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_DATETIME_ACTIVE', 'C_DATETIME_ACTIVE', '`C_DATETIME_ACTIVE`', 135, 7, FALSE, '`C_DATETIME_ACTIVE`', FALSE);
		$this->C_DATETIME_ACTIVE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_ACTIVE'] =& $this->C_DATETIME_ACTIVE;

		// C_PUBLISH
		$this->C_PUBLISH = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_PUBLISH', 'C_PUBLISH', '`C_PUBLISH`', 3, -1, FALSE, '`C_PUBLISH`', FALSE);
		$this->C_PUBLISH->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PUBLISH'] =& $this->C_PUBLISH;

		// C_DATETIME_PUBLISH
		$this->C_DATETIME_PUBLISH = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_DATETIME_PUBLISH', 'C_DATETIME_PUBLISH', '`C_DATETIME_PUBLISH`', 135, 7, FALSE, '`C_DATETIME_PUBLISH`', FALSE);
		$this->C_DATETIME_PUBLISH->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_PUBLISH'] =& $this->C_DATETIME_PUBLISH;

		// C_FK_PUBLISH
		$this->C_FK_PUBLISH = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_FK_PUBLISH', 'C_FK_PUBLISH', '`C_FK_PUBLISH`', 3, -1, FALSE, '`C_FK_PUBLISH`', FALSE);
		$this->C_FK_PUBLISH->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_FK_PUBLISH'] =& $this->C_FK_PUBLISH;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_lichcongtac', 't_lichcongtac', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;
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
		return "t_lichcongtac_Highlight";
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
		return "`t_lichcongtac`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
            global $Security;
	    if (IsAdmin()) $sWhere ="";
            else $sWhere = "t_lichcongtac.FK_CONGTY = ".$Security->CurrentUserOption();
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
		return "C_DATE_STAR,C_HOUR_START";
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
		return "INSERT INTO `t_lichcongtac` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_lichcongtac` SET ";
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
		$SQL = "DELETE FROM `t_lichcongtac` WHERE ";
		$SQL .= ew_QuotedName('C_CADENLAR_ID') . '=' . ew_QuotedValue($rs['C_CADENLAR_ID'], $this->C_CADENLAR_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`C_CADENLAR_ID` = @C_CADENLAR_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->C_CADENLAR_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@C_CADENLAR_ID@", ew_AdjustSql($this->C_CADENLAR_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_lichcongtaclist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_lichcongtaclist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_lichcongtacview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_lichcongtacadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_lichcongtacedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_lichcongtacadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_lichcongtacdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->C_CADENLAR_ID->CurrentValue)) {
			$sUrl .= "C_CADENLAR_ID=" . urlencode($this->C_CADENLAR_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_lichcongtac" : "";
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
		$this->C_CADENLAR_ID->setDbValue($rs->fields('C_CADENLAR_ID'));
		$this->FK_CONGTY->setDbValue($rs->fields('FK_CONGTY'));
		$this->FK_SB_ID->setDbValue($rs->fields('FK_SB_ID'));
		$this->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$this->C_DATE_STAR->setDbValue($rs->fields('C_DATE_STAR'));
		$this->C_HOUR_START->setDbValue($rs->fields('C_HOUR_START'));
		$this->C_MINUTES_STAR->setDbValue($rs->fields('C_MINUTES_STAR'));
		$this->C_STATUS_STAR->setDbValue($rs->fields('C_STATUS_STAR'));
		$this->C_DATE_END->setDbValue($rs->fields('C_DATE_END'));
		$this->C_HOUR_END->setDbValue($rs->fields('C_HOUR_END'));
		$this->C_MINUTES_END->setDbValue($rs->fields('C_MINUTES_END'));
		$this->C_STATUS_END->setDbValue($rs->fields('C_STATUS_END'));
		$this->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$this->C_ORGANIZATION->setDbValue($rs->fields('C_ORGANIZATION'));
		$this->C_PARTICIPANTS_ID->setDbValue($rs->fields('C_PARTICIPANTS_ID'));
		$this->C_WHERE->setDbValue($rs->fields('C_WHERE'));
		$this->C_PREPARED->setDbValue($rs->fields('C_PREPARED'));
		$this->C_OPTION->setDbValue($rs->fields('C_OPTION'));
		$this->C_FILE_ATTACH->Upload->DbValue = $rs->fields('C_FILE_ATTACH');
		$this->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$this->C_DATETIME_ACTIVE->setDbValue($rs->fields('C_DATETIME_ACTIVE'));
		$this->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$this->C_DATETIME_PUBLISH->setDbValue($rs->fields('C_DATETIME_PUBLISH'));
		$this->C_FK_PUBLISH->setDbValue($rs->fields('C_FK_PUBLISH'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// FK_CONGTY

		$this->FK_CONGTY->CellCssStyle = ""; $this->FK_CONGTY->CellCssClass = "";
		$this->FK_CONGTY->CellAttrs = array(); $this->FK_CONGTY->ViewAttrs = array(); $this->FK_CONGTY->EditAttrs = array();

		// FK_SB_ID
		$this->FK_SB_ID->CellCssStyle = ""; $this->FK_SB_ID->CellCssClass = "";
		$this->FK_SB_ID->CellAttrs = array(); $this->FK_SB_ID->ViewAttrs = array(); $this->FK_SB_ID->EditAttrs = array();

		// C_TITLE
		$this->C_TITLE->CellCssStyle = ""; $this->C_TITLE->CellCssClass = "";
		$this->C_TITLE->CellAttrs = array(); $this->C_TITLE->ViewAttrs = array(); $this->C_TITLE->EditAttrs = array();

		// C_DATE_STAR
		$this->C_DATE_STAR->CellCssStyle = ""; $this->C_DATE_STAR->CellCssClass = "";
		$this->C_DATE_STAR->CellAttrs = array(); $this->C_DATE_STAR->ViewAttrs = array(); $this->C_DATE_STAR->EditAttrs = array();

		// C_HOUR_START
		$this->C_HOUR_START->CellCssStyle = ""; $this->C_HOUR_START->CellCssClass = "";
		$this->C_HOUR_START->CellAttrs = array(); $this->C_HOUR_START->ViewAttrs = array(); $this->C_HOUR_START->EditAttrs = array();

		// C_MINUTES_STAR
		$this->C_MINUTES_STAR->CellCssStyle = ""; $this->C_MINUTES_STAR->CellCssClass = "";
		$this->C_MINUTES_STAR->CellAttrs = array(); $this->C_MINUTES_STAR->ViewAttrs = array(); $this->C_MINUTES_STAR->EditAttrs = array();

		// C_STATUS_STAR
		$this->C_STATUS_STAR->CellCssStyle = ""; $this->C_STATUS_STAR->CellCssClass = "";
		$this->C_STATUS_STAR->CellAttrs = array(); $this->C_STATUS_STAR->ViewAttrs = array(); $this->C_STATUS_STAR->EditAttrs = array();

		// C_DATE_END
		$this->C_DATE_END->CellCssStyle = ""; $this->C_DATE_END->CellCssClass = "";
		$this->C_DATE_END->CellAttrs = array(); $this->C_DATE_END->ViewAttrs = array(); $this->C_DATE_END->EditAttrs = array();

		// C_HOUR_END
		$this->C_HOUR_END->CellCssStyle = ""; $this->C_HOUR_END->CellCssClass = "";
		$this->C_HOUR_END->CellAttrs = array(); $this->C_HOUR_END->ViewAttrs = array(); $this->C_HOUR_END->EditAttrs = array();

		// C_MINUTES_END
		$this->C_MINUTES_END->CellCssStyle = ""; $this->C_MINUTES_END->CellCssClass = "";
		$this->C_MINUTES_END->CellAttrs = array(); $this->C_MINUTES_END->ViewAttrs = array(); $this->C_MINUTES_END->EditAttrs = array();

		// C_STATUS_END
		$this->C_STATUS_END->CellCssStyle = ""; $this->C_STATUS_END->CellCssClass = "";
		$this->C_STATUS_END->CellAttrs = array(); $this->C_STATUS_END->ViewAttrs = array(); $this->C_STATUS_END->EditAttrs = array();

		// C_ORGANIZATION
		$this->C_ORGANIZATION->CellCssStyle = ""; $this->C_ORGANIZATION->CellCssClass = "";
		$this->C_ORGANIZATION->CellAttrs = array(); $this->C_ORGANIZATION->ViewAttrs = array(); $this->C_ORGANIZATION->EditAttrs = array();

		// C_PARTICIPANTS_ID
		$this->C_PARTICIPANTS_ID->CellCssStyle = ""; $this->C_PARTICIPANTS_ID->CellCssClass = "";
		$this->C_PARTICIPANTS_ID->CellAttrs = array(); $this->C_PARTICIPANTS_ID->ViewAttrs = array(); $this->C_PARTICIPANTS_ID->EditAttrs = array();

		// C_WHERE
		$this->C_WHERE->CellCssStyle = ""; $this->C_WHERE->CellCssClass = "";
		$this->C_WHERE->CellAttrs = array(); $this->C_WHERE->ViewAttrs = array(); $this->C_WHERE->EditAttrs = array();

		// C_PREPARED
		$this->C_PREPARED->CellCssStyle = ""; $this->C_PREPARED->CellCssClass = "";
		$this->C_PREPARED->CellAttrs = array(); $this->C_PREPARED->ViewAttrs = array(); $this->C_PREPARED->EditAttrs = array();

		// C_OPTION
		$this->C_OPTION->CellCssStyle = ""; $this->C_OPTION->CellCssClass = "";
		$this->C_OPTION->CellAttrs = array(); $this->C_OPTION->ViewAttrs = array(); $this->C_OPTION->EditAttrs = array();

		// C_ACTIVE
		$this->C_ACTIVE->CellCssStyle = ""; $this->C_ACTIVE->CellCssClass = "";
		$this->C_ACTIVE->CellAttrs = array(); $this->C_ACTIVE->ViewAttrs = array(); $this->C_ACTIVE->EditAttrs = array();

		// C_DATETIME_ACTIVE
		$this->C_DATETIME_ACTIVE->CellCssStyle = ""; $this->C_DATETIME_ACTIVE->CellCssClass = "";
		$this->C_DATETIME_ACTIVE->CellAttrs = array(); $this->C_DATETIME_ACTIVE->ViewAttrs = array(); $this->C_DATETIME_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$this->C_PUBLISH->CellCssStyle = ""; $this->C_PUBLISH->CellCssClass = "";
		$this->C_PUBLISH->CellAttrs = array(); $this->C_PUBLISH->ViewAttrs = array(); $this->C_PUBLISH->EditAttrs = array();

		// C_DATETIME_PUBLISH
		$this->C_DATETIME_PUBLISH->CellCssStyle = ""; $this->C_DATETIME_PUBLISH->CellCssClass = "";
		$this->C_DATETIME_PUBLISH->CellAttrs = array(); $this->C_DATETIME_PUBLISH->ViewAttrs = array(); $this->C_DATETIME_PUBLISH->EditAttrs = array();

		// C_FK_PUBLISH
		$this->C_FK_PUBLISH->CellCssStyle = ""; $this->C_FK_PUBLISH->CellCssClass = "";
		$this->C_FK_PUBLISH->CellAttrs = array(); $this->C_FK_PUBLISH->ViewAttrs = array(); $this->C_FK_PUBLISH->EditAttrs = array();

		// FK_CONGTY
		if (strval($this->FK_CONGTY->CurrentValue) <> "") {
			$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($this->FK_CONGTY->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_CONGTY->ViewValue = $rswrk->fields('C_TENCONGTY');
				$rswrk->Close();
			} else {
				$this->FK_CONGTY->ViewValue = $this->FK_CONGTY->CurrentValue;
			}
		} else {
			$this->FK_CONGTY->ViewValue = NULL;
		}
		$this->FK_CONGTY->CssStyle = "";
		$this->FK_CONGTY->CssClass = "";
		$this->FK_CONGTY->ViewCustomAttributes = "";

		// FK_SB_ID
		if (strval($this->FK_SB_ID->CurrentValue) <> "") {
			$sFilterWrk = "`SB_ID` = " . ew_AdjustSql($this->FK_SB_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuclich`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_SB_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_SB_ID->ViewValue = $this->FK_SB_ID->CurrentValue;
			}
		} else {
			$this->FK_SB_ID->ViewValue = NULL;
		}
		$this->FK_SB_ID->CssStyle = "";
		$this->FK_SB_ID->CssClass = "";
		$this->FK_SB_ID->ViewCustomAttributes = "";

		// C_TITLE
		$this->C_TITLE->ViewValue = $this->C_TITLE->CurrentValue;
		$this->C_TITLE->CssStyle = "";
		$this->C_TITLE->CssClass = "";
		$this->C_TITLE->ViewCustomAttributes = "";

		// C_DATE_STAR
		$this->C_DATE_STAR->ViewValue = $this->C_DATE_STAR->CurrentValue;
		$this->C_DATE_STAR->ViewValue = ew_FormatDateTime($this->C_DATE_STAR->ViewValue, 7);
		$this->C_DATE_STAR->CssStyle = "";
		$this->C_DATE_STAR->CssClass = "";
		$this->C_DATE_STAR->ViewCustomAttributes = "";

		// C_HOUR_START
		if (strval($this->C_HOUR_START->CurrentValue) <> "") {
			switch ($this->C_HOUR_START->CurrentValue) {
				case "0":
					$this->C_HOUR_START->ViewValue = "0";
					break;
				case "1":
					$this->C_HOUR_START->ViewValue = "1";
					break;
				default:
					$this->C_HOUR_START->ViewValue = $this->C_HOUR_START->CurrentValue;
			}
		} else {
			$this->C_HOUR_START->ViewValue = NULL;
		}
		$this->C_HOUR_START->CssStyle = "";
		$this->C_HOUR_START->CssClass = "";
		$this->C_HOUR_START->ViewCustomAttributes = "";

		// C_MINUTES_STAR
		if (strval($this->C_MINUTES_STAR->CurrentValue) <> "") {
			switch ($this->C_MINUTES_STAR->CurrentValue) {
				case "0":
					$this->C_MINUTES_STAR->ViewValue = "0";
					break;
				case "1":
					$this->C_MINUTES_STAR->ViewValue = "1";
					break;
				default:
					$this->C_MINUTES_STAR->ViewValue = $this->C_MINUTES_STAR->CurrentValue;
			}
		} else {
			$this->C_MINUTES_STAR->ViewValue = NULL;
		}
		$this->C_MINUTES_STAR->CssStyle = "";
		$this->C_MINUTES_STAR->CssClass = "";
		$this->C_MINUTES_STAR->ViewCustomAttributes = "";

		// C_STATUS_STAR
		if (strval($this->C_STATUS_STAR->CurrentValue) <> "") {
			switch ($this->C_STATUS_STAR->CurrentValue) {
				case "0":
					$this->C_STATUS_STAR->ViewValue = "Khong xac dinh";
					break;
				default:
					$this->C_STATUS_STAR->ViewValue = $this->C_STATUS_STAR->CurrentValue;
			}
		} else {
			$this->C_STATUS_STAR->ViewValue = NULL;
		}
		$this->C_STATUS_STAR->CssStyle = "";
		$this->C_STATUS_STAR->CssClass = "";
		$this->C_STATUS_STAR->ViewCustomAttributes = "";

		// C_DATE_END
		$this->C_DATE_END->ViewValue = $this->C_DATE_END->CurrentValue;
		$this->C_DATE_END->ViewValue = ew_FormatDateTime($this->C_DATE_END->ViewValue, 7);
		$this->C_DATE_END->CssStyle = "";
		$this->C_DATE_END->CssClass = "";
		$this->C_DATE_END->ViewCustomAttributes = "";

		// C_HOUR_END
		if (strval($this->C_HOUR_END->CurrentValue) <> "") {
			switch ($this->C_HOUR_END->CurrentValue) {
				case "0":
					$this->C_HOUR_END->ViewValue = "0";
					break;
				default:
					$this->C_HOUR_END->ViewValue = $this->C_HOUR_END->CurrentValue;
			}
		} else {
			$this->C_HOUR_END->ViewValue = NULL;
		}
		$this->C_HOUR_END->CssStyle = "";
		$this->C_HOUR_END->CssClass = "";
		$this->C_HOUR_END->ViewCustomAttributes = "";

		// C_MINUTES_END
		if (strval($this->C_MINUTES_END->CurrentValue) <> "") {
			switch ($this->C_MINUTES_END->CurrentValue) {
				case "0":
					$this->C_MINUTES_END->ViewValue = "0";
					break;
				case "1":
					$this->C_MINUTES_END->ViewValue = "1";
					break;
				default:
					$this->C_MINUTES_END->ViewValue = $this->C_MINUTES_END->CurrentValue;
			}
		} else {
			$this->C_MINUTES_END->ViewValue = NULL;
		}
		$this->C_MINUTES_END->CssStyle = "";
		$this->C_MINUTES_END->CssClass = "";
		$this->C_MINUTES_END->ViewCustomAttributes = "";

		// C_STATUS_END
		if (strval($this->C_STATUS_END->CurrentValue) <> "") {
			switch ($this->C_STATUS_END->CurrentValue) {
				case "0":
					$this->C_STATUS_END->ViewValue = "Khong xac dinh";
					break;
				default:
					$this->C_STATUS_END->ViewValue = $this->C_STATUS_END->CurrentValue;
			}
		} else {
			$this->C_STATUS_END->ViewValue = NULL;
		}
		$this->C_STATUS_END->CssStyle = "";
		$this->C_STATUS_END->CssClass = "";
		$this->C_STATUS_END->ViewCustomAttributes = "";

		// C_ORGANIZATION
		$this->C_ORGANIZATION->ViewValue = $this->C_ORGANIZATION->CurrentValue;
		$this->C_ORGANIZATION->CssStyle = "";
		$this->C_ORGANIZATION->CssClass = "";
		$this->C_ORGANIZATION->ViewCustomAttributes = "";

		// C_PARTICIPANTS_ID
		if (strval($this->C_PARTICIPANTS_ID->CurrentValue) <> "") {
			$arwrk = explode(",", $this->C_PARTICIPANTS_ID->CurrentValue);
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
				$this->C_PARTICIPANTS_ID->ViewValue = "";
				$ari = 0;
				while (!$rswrk->EOF) {
					$this->C_PARTICIPANTS_ID->ViewValue .= $rswrk->fields('C_TENCONGTY');
					$rswrk->MoveNext();
					if (!$rswrk->EOF) $this->C_PARTICIPANTS_ID->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
					$ari++;
				}
				$rswrk->Close();
			} else {
				$this->C_PARTICIPANTS_ID->ViewValue = $this->C_PARTICIPANTS_ID->CurrentValue;
			}
		} else {
			$this->C_PARTICIPANTS_ID->ViewValue = NULL;
		}
		$this->C_PARTICIPANTS_ID->CssStyle = "";
		$this->C_PARTICIPANTS_ID->CssClass = "";
		$this->C_PARTICIPANTS_ID->ViewCustomAttributes = "";

		// C_WHERE
		$this->C_WHERE->ViewValue = $this->C_WHERE->CurrentValue;
		$this->C_WHERE->CssStyle = "";
		$this->C_WHERE->CssClass = "";
		$this->C_WHERE->ViewCustomAttributes = "";

		// C_PREPARED
		$this->C_PREPARED->ViewValue = $this->C_PREPARED->CurrentValue;
		$this->C_PREPARED->CssStyle = "";
		$this->C_PREPARED->CssClass = "";
		$this->C_PREPARED->ViewCustomAttributes = "";

		// C_OPTION
		if (strval($this->C_OPTION->CurrentValue) <> "") {
			switch ($this->C_OPTION->CurrentValue) {
				case "0":
					$this->C_OPTION->ViewValue = "su kien cong khai";
					break;
				case "1":
					$this->C_OPTION->ViewValue = "su kien quan trong";
					break;
				default:
					$this->C_OPTION->ViewValue = $this->C_OPTION->CurrentValue;
			}
		} else {
			$this->C_OPTION->ViewValue = NULL;
		}
		$this->C_OPTION->CssStyle = "";
		$this->C_OPTION->CssClass = "";
		$this->C_OPTION->ViewCustomAttributes = "";

		// C_ACTIVE
		if (strval($this->C_ACTIVE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE->CurrentValue) {
				case "0":
					$this->C_ACTIVE->ViewValue = "Khong xuat ban levelsite";
					break;
				case "1":
					$this->C_ACTIVE->ViewValue = "Xuat ban level site";
					break;
				default:
					$this->C_ACTIVE->ViewValue = $this->C_ACTIVE->CurrentValue;
			}
		} else {
			$this->C_ACTIVE->ViewValue = NULL;
		}
		$this->C_ACTIVE->CssStyle = "";
		$this->C_ACTIVE->CssClass = "";
		$this->C_ACTIVE->ViewCustomAttributes = "";

		// C_DATETIME_ACTIVE
		$this->C_DATETIME_ACTIVE->ViewValue = $this->C_DATETIME_ACTIVE->CurrentValue;
		$this->C_DATETIME_ACTIVE->ViewValue = ew_FormatDateTime($this->C_DATETIME_ACTIVE->ViewValue, 7);
		$this->C_DATETIME_ACTIVE->CssStyle = "";
		$this->C_DATETIME_ACTIVE->CssClass = "";
		$this->C_DATETIME_ACTIVE->ViewCustomAttributes = "";

		// C_PUBLISH
		if (strval($this->C_PUBLISH->CurrentValue) <> "") {
			switch ($this->C_PUBLISH->CurrentValue) {
				case "0":
					$this->C_PUBLISH->ViewValue = "khong xuat ban mainsite";
					break;
				case "1":
					$this->C_PUBLISH->ViewValue = "xuat ban mainsite";
					break;
				default:
					$this->C_PUBLISH->ViewValue = $this->C_PUBLISH->CurrentValue;
			}
		} else {
			$this->C_PUBLISH->ViewValue = NULL;
		}
		$this->C_PUBLISH->CssStyle = "";
		$this->C_PUBLISH->CssClass = "";
		$this->C_PUBLISH->ViewCustomAttributes = "";

		// C_DATETIME_PUBLISH
		$this->C_DATETIME_PUBLISH->ViewValue = $this->C_DATETIME_PUBLISH->CurrentValue;
		$this->C_DATETIME_PUBLISH->ViewValue = ew_FormatDateTime($this->C_DATETIME_PUBLISH->ViewValue, 7);
		$this->C_DATETIME_PUBLISH->CssStyle = "";
		$this->C_DATETIME_PUBLISH->CssClass = "";
		$this->C_DATETIME_PUBLISH->ViewCustomAttributes = "";

		// C_FK_PUBLISH
		$this->C_FK_PUBLISH->ViewValue = $this->C_FK_PUBLISH->CurrentValue;
		$this->C_FK_PUBLISH->CssStyle = "";
		$this->C_FK_PUBLISH->CssClass = "";
		$this->C_FK_PUBLISH->ViewCustomAttributes = "";

		// FK_CONGTY
		$this->FK_CONGTY->HrefValue = "";
		$this->FK_CONGTY->TooltipValue = "";

		// FK_SB_ID
		$this->FK_SB_ID->HrefValue = "";
		$this->FK_SB_ID->TooltipValue = "";

		// C_TITLE
		$this->C_TITLE->HrefValue = "";
		$this->C_TITLE->TooltipValue = "";

		// C_DATE_STAR
		$this->C_DATE_STAR->HrefValue = "";
		$this->C_DATE_STAR->TooltipValue = "";

		// C_HOUR_START
		$this->C_HOUR_START->HrefValue = "";
		$this->C_HOUR_START->TooltipValue = "";

		// C_MINUTES_STAR
		$this->C_MINUTES_STAR->HrefValue = "";
		$this->C_MINUTES_STAR->TooltipValue = "";

		// C_STATUS_STAR
		$this->C_STATUS_STAR->HrefValue = "";
		$this->C_STATUS_STAR->TooltipValue = "";

		// C_DATE_END
		$this->C_DATE_END->HrefValue = "";
		$this->C_DATE_END->TooltipValue = "";

		// C_HOUR_END
		$this->C_HOUR_END->HrefValue = "";
		$this->C_HOUR_END->TooltipValue = "";

		// C_MINUTES_END
		$this->C_MINUTES_END->HrefValue = "";
		$this->C_MINUTES_END->TooltipValue = "";

		// C_STATUS_END
		$this->C_STATUS_END->HrefValue = "";
		$this->C_STATUS_END->TooltipValue = "";

		// C_ORGANIZATION
		$this->C_ORGANIZATION->HrefValue = "";
		$this->C_ORGANIZATION->TooltipValue = "";

		// C_PARTICIPANTS_ID
		$this->C_PARTICIPANTS_ID->HrefValue = "";
		$this->C_PARTICIPANTS_ID->TooltipValue = "";

		// C_WHERE
		$this->C_WHERE->HrefValue = "";
		$this->C_WHERE->TooltipValue = "";

		// C_PREPARED
		$this->C_PREPARED->HrefValue = "";
		$this->C_PREPARED->TooltipValue = "";

		// C_OPTION
		$this->C_OPTION->HrefValue = "";
		$this->C_OPTION->TooltipValue = "";

		// C_ACTIVE
		$this->C_ACTIVE->HrefValue = "";
		$this->C_ACTIVE->TooltipValue = "";

		// C_DATETIME_ACTIVE
		$this->C_DATETIME_ACTIVE->HrefValue = "";
		$this->C_DATETIME_ACTIVE->TooltipValue = "";

		// C_PUBLISH
		$this->C_PUBLISH->HrefValue = "";
		$this->C_PUBLISH->TooltipValue = "";

		// C_DATETIME_PUBLISH
		$this->C_DATETIME_PUBLISH->HrefValue = "";
		$this->C_DATETIME_PUBLISH->TooltipValue = "";

		// C_FK_PUBLISH
		$this->C_FK_PUBLISH->HrefValue = "";
		$this->C_FK_PUBLISH->TooltipValue = "";

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
                 global $t_lichcongtac; 
                   $first_day_of_week = date('Y-m-d', strtotime('Last Monday', time()));
                    $new_date = strtotime ( '+1 week' , strtotime ( $first_day_of_week ) ) ;
                    $first_day_of_week = date ( 'j/m/Y' , $new_date );
                    $last_day_of_week = date('Y-m-d', strtotime('Next Sunday', time()));
                    $new_date = strtotime ( '+1 week' , strtotime ( $last_day_of_week ) ) ;
                   $last_day_of_week =  date ( 'j/m/Y' , $new_date );
          
		//$MyTable->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
               	 if (!isset($this->C_DATE_STAR->AdvancedSearch->SearchValue) && !isset($this->C_DATE_STAR->AdvancedSearch->SearchValue2)) {
                    $this->C_DATE_STAR->AdvancedSearch->SearchValue = $first_day_of_week;
                    $this->C_DATE_STAR->AdvancedSearch->SearchOperator = 'BETWEEN';
                    $this->C_DATE_STAR->AdvancedSearch->SearchValue2 = $last_day_of_week;
                    }
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
