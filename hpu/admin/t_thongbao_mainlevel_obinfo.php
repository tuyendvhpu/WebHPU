<?php

// Global variable for table object
$t_thongbao_mainlevel_ob = NULL;

//
// Table class for t_thongbao_mainlevel_ob
//
class ct_thongbao_mainlevel_ob {
	var $TableVar = 't_thongbao_mainlevel_ob';
	var $TableName = 't_thongbao_mainlevel_ob';
	var $TableType = 'CUSTOMVIEW';
	var $PK_THONGBAO_MAINLEVEL;
	var $PK_THONGBAO;
	var $FK_CONGTY_ID;
	var $FK_DOITUONG_ID;
	var $C_TITLE;
	var $C_CONTENT;
	var $C_PUBLISH;
	var $C_END_DATE;
	var $C_BEGIN_DATE;
	var $C_TIME_PUBLISH;
	var $C_ACTIVE;
	var $C_ORDER;
	var $C_KEYWORD;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $FK_NGUOIDUNG_ID;
	var $C_NOTICE_HIT;
	var $FK_CONGTY_SEND;
        var $PK_CHUYENMUC_ID;
	var $C_TYPE;
        var $C_FILEANH;
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
	function ct_thongbao_mainlevel_ob() {
		global $Language;

		// PK_THONGBAO_MAINLEVEL
		$this->PK_THONGBAO_MAINLEVEL = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_PK_THONGBAO_MAINLEVEL', 'PK_THONGBAO_MAINLEVEL', 't_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL', 3, -1, FALSE, 't_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL', FALSE);
		$this->PK_THONGBAO_MAINLEVEL->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_THONGBAO_MAINLEVEL'] =& $this->PK_THONGBAO_MAINLEVEL;

		// PK_THONGBAO
		$this->PK_THONGBAO = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_PK_THONGBAO', 'PK_THONGBAO', 't_thongbao_mainlevel.PK_THONGBAO', 3, -1, FALSE, 't_thongbao_mainlevel.PK_THONGBAO', FALSE);
		$this->PK_THONGBAO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_THONGBAO'] =& $this->PK_THONGBAO;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', 't_thongbao_mainlevel.FK_CONGTY_ID', 3, -1, FALSE, 't_thongbao_mainlevel.FK_CONGTY_ID', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// FK_DOITUONG_ID
		$this->FK_DOITUONG_ID = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_FK_DOITUONG_ID', 'FK_DOITUONG_ID', 't_thongbao_mainlevel.FK_DOITUONG_ID', 3, -1, FALSE, 't_thongbao_mainlevel.FK_DOITUONG_ID', FALSE);
		$this->FK_DOITUONG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DOITUONG_ID'] =& $this->FK_DOITUONG_ID;
                
                // PK_CHUYENMUC_ID
		$this->PK_CHUYENMUC_ID = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_PK_CHUYENMUC_ID', 'PK_CHUYENMUC_ID', 't_thongbao_mainlevel.PK_CHUYENMUC_ID', 3, -1, FALSE, 't_thongbao_mainlevel.PK_CHUYENMUC_ID', FALSE);
		$this->PK_CHUYENMUC_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_CHUYENMUC_ID'] =& $this->PK_CHUYENMUC_ID;

		// C_TITLE
		$this->C_TITLE = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_TITLE', 'C_TITLE', 't_thongbao_levelsite.C_TITLE', 200, -1, FALSE, 't_thongbao_levelsite.C_TITLE', FALSE);
		$this->fields['C_TITLE'] =& $this->C_TITLE;

		// C_CONTENT
		$this->C_CONTENT = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_CONTENT', 'C_CONTENT', 't_thongbao_levelsite.C_CONTENT', 201, -1, FALSE, 't_thongbao_levelsite.C_CONTENT', FALSE);
		$this->C_CONTENT->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENT'] =& $this->C_CONTENT;

		// C_PUBLISH
		$this->C_PUBLISH = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_PUBLISH', 'C_PUBLISH', 't_thongbao_mainlevel.C_PUBLISH', 3, -1, FALSE, 't_thongbao_mainlevel.C_PUBLISH', FALSE);
		$this->C_PUBLISH->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PUBLISH'] =& $this->C_PUBLISH;

		// C_END_DATE
		$this->C_END_DATE = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_END_DATE', 'C_END_DATE', 't_thongbao_mainlevel.C_END_DATE', 135, 7, FALSE, 't_thongbao_mainlevel.C_END_DATE', FALSE);
		$this->C_END_DATE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_END_DATE'] =& $this->C_END_DATE;

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_BEGIN_DATE', 'C_BEGIN_DATE', 't_thongbao_mainlevel.C_BEGIN_DATE', 135, 7, FALSE, 't_thongbao_mainlevel.C_BEGIN_DATE', FALSE);
		$this->C_BEGIN_DATE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_BEGIN_DATE'] =& $this->C_BEGIN_DATE;

		// C_TIME_PUBLISH
		$this->C_TIME_PUBLISH = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_TIME_PUBLISH', 'C_TIME_PUBLISH', 't_thongbao_mainlevel.C_TIME_PUBLISH', 135, 7, FALSE, 't_thongbao_mainlevel.C_TIME_PUBLISH', FALSE);
		$this->C_TIME_PUBLISH->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_PUBLISH'] =& $this->C_TIME_PUBLISH;

		// C_ACTIVE
		$this->C_ACTIVE = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_ACTIVE', 'C_ACTIVE', 't_thongbao_mainlevel.C_ACTIVE', 3, -1, FALSE, 't_thongbao_mainlevel.C_ACTIVE', FALSE);
		$this->C_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE'] =& $this->C_ACTIVE;

		// C_ORDER
		$this->C_ORDER = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_ORDER', 'C_ORDER', 't_thongbao_mainlevel.C_ORDER', 135, 7, FALSE, 't_thongbao_mainlevel.C_ORDER', FALSE);
		$this->C_ORDER->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER'] =& $this->C_ORDER;

		// C_KEYWORD
		$this->C_KEYWORD = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_KEYWORD', 'C_KEYWORD', 't_thongbao_mainlevel.C_KEYWORD', 200, -1, FALSE, 't_thongbao_mainlevel.C_KEYWORD', FALSE);
		$this->fields['C_KEYWORD'] =& $this->C_KEYWORD;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_USER_ADD', 'C_USER_ADD', 't_thongbao_mainlevel.C_USER_ADD', 3, -1, FALSE, 't_thongbao_mainlevel.C_USER_ADD', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_ADD_TIME', 'C_ADD_TIME', 't_thongbao_mainlevel.C_ADD_TIME', 135, 7, FALSE, 't_thongbao_mainlevel.C_ADD_TIME', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_USER_EDIT', 'C_USER_EDIT', 't_thongbao_mainlevel.C_USER_EDIT', 3, -1, FALSE, 't_thongbao_mainlevel.C_USER_EDIT', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_EDIT_TIME', 'C_EDIT_TIME', 't_thongbao_mainlevel.C_EDIT_TIME', 135, 7, FALSE, 't_thongbao_mainlevel.C_EDIT_TIME', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_FK_NGUOIDUNG_ID', 'FK_NGUOIDUNG_ID', 't_thongbao_mainlevel.FK_NGUOIDUNG_ID', 3, -1, FALSE, 't_thongbao_mainlevel.FK_NGUOIDUNG_ID', FALSE);
		$this->FK_NGUOIDUNG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_NGUOIDUNG_ID'] =& $this->FK_NGUOIDUNG_ID;

		// C_NOTICE_HIT
		$this->C_NOTICE_HIT = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_NOTICE_HIT', 'C_NOTICE_HIT', 't_thongbao_mainlevel.C_NOTICE_HIT', 3, -1, FALSE, 't_thongbao_mainlevel.C_NOTICE_HIT', FALSE);
		$this->C_NOTICE_HIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_NOTICE_HIT'] =& $this->C_NOTICE_HIT;

		// FK_CONGTY_SEND
		$this->FK_CONGTY_SEND = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_FK_CONGTY_SEND', 'FK_CONGTY_SEND', 't_thongbao_mainlevel.FK_CONGTY_SEND', 3, -1, FALSE, 't_thongbao_mainlevel.FK_CONGTY_SEND', FALSE);
		$this->FK_CONGTY_SEND->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_SEND'] =& $this->FK_CONGTY_SEND;

		// C_TYPE
		$this->C_TYPE = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_TYPE', 'C_TYPE', 't_thongbao_mainlevel.C_TYPE', 3, -1, FALSE, 't_thongbao_mainlevel.C_TYPE', FALSE);
		$this->C_TYPE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TYPE'] =& $this->C_TYPE;
                
                // C_FILEANH
		$this->C_FILEANH = new cField('t_thongbao_mainlevel_ob', 't_thongbao_mainlevel_ob', 'x_C_FILEANH', 'C_FILEANH', 't_thongbao_mainlevel.C_FILEANH', 200, -1, FALSE, 't_thongbao_mainlevel.C_FILEANH', FALSE);
		$this->fields['C_FILEANH'] =& $this->C_FILEANH;
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
		return "t_thongbao_mainlevel_ob_Highlight";
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
		return "t_thongbao_mainlevel Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO";
	}

	function SqlSelect() { // Select
		return "SELECT t_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL, t_thongbao_mainlevel.PK_THONGBAO, t_thongbao_mainlevel.FK_CONGTY_ID, t_thongbao_mainlevel.FK_DOITUONG_ID, t_thongbao_mainlevel.PK_CHUYENMUC_ID, t_thongbao_levelsite.C_TITLE, t_thongbao_levelsite.C_CONTENT, t_thongbao_mainlevel.C_PUBLISH, t_thongbao_mainlevel.C_TIME_PUBLISH, t_thongbao_mainlevel.C_ACTIVE, t_thongbao_mainlevel.C_ORDER, t_thongbao_mainlevel.C_KEYWORD, t_thongbao_mainlevel.C_BEGIN_DATE, t_thongbao_mainlevel.C_END_DATE, t_thongbao_mainlevel.C_USER_ADD, t_thongbao_mainlevel.C_ADD_TIME, t_thongbao_mainlevel.FK_NGUOIDUNG_ID, t_thongbao_mainlevel.C_TYPE, t_thongbao_mainlevel.C_NOTICE_HIT, t_thongbao_mainlevel.C_USER_EDIT, t_thongbao_mainlevel.C_EDIT_TIME, t_thongbao_mainlevel.FK_CONGTY_SEND, t_thongbao_mainlevel.C_FILEANH FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
              global $Security;
		 if (IsAdmin()) $sWhere ="";
                  else $sWhere = "(t_thongbao_mainlevel.FK_CONGTY_ID = ".$Security->CurrentUserOption().") AND (C_TYPE = 1)";
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
		return "C_ORDER DESC";
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
		return "INSERT INTO t_thongbao_mainlevel Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE t_thongbao_mainlevel Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO SET ";
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
		$SQL = "DELETE FROM t_thongbao_mainlevel Inner Join t_thongbao_levelsite On t_thongbao_levelsite.PK_THONGBAO = t_thongbao_mainlevel.PK_THONGBAO WHERE ";
		$SQL .= ew_QuotedName('PK_THONGBAO_MAINLEVEL') . '=' . ew_QuotedValue($rs['PK_THONGBAO_MAINLEVEL'], $this->PK_THONGBAO_MAINLEVEL->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "t_thongbao_mainlevel.PK_THONGBAO_MAINLEVEL = @PK_THONGBAO_MAINLEVEL@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_THONGBAO_MAINLEVEL->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_THONGBAO_MAINLEVEL@", ew_AdjustSql($this->PK_THONGBAO_MAINLEVEL->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_thongbao_mainlevel_oblist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_thongbao_mainlevel_oblist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_thongbao_mainlevel_obview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_thongbao_mainlevel_obadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_thongbao_mainlevel_obedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_thongbao_mainlevel_obadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_thongbao_mainlevel_obdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_THONGBAO_MAINLEVEL->CurrentValue)) {
			$sUrl .= "PK_THONGBAO_MAINLEVEL=" . urlencode($this->PK_THONGBAO_MAINLEVEL->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_thongbao_mainlevel_ob" : "";
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
		$this->PK_THONGBAO_MAINLEVEL->setDbValue($rs->fields('PK_THONGBAO_MAINLEVEL'));
		$this->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$this->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$this->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$this->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$this->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$this->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$this->C_TIME_PUBLISH->setDbValue($rs->fields('C_TIME_PUBLISH'));
		$this->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$this->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$this->C_KEYWORD->setDbValue($rs->fields('C_KEYWORD'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$this->C_NOTICE_HIT->setDbValue($rs->fields('C_NOTICE_HIT'));
		$this->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$this->C_TYPE->setDbValue($rs->fields('C_TYPE'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// C_TITLE

		$this->C_TITLE->CellCssStyle = ""; $this->C_TITLE->CellCssClass = "";
		$this->C_TITLE->CellAttrs = array(); $this->C_TITLE->ViewAttrs = array(); $this->C_TITLE->EditAttrs = array();

		// C_END_DATE
		$this->C_END_DATE->CellCssStyle = ""; $this->C_END_DATE->CellCssClass = "";
		$this->C_END_DATE->CellAttrs = array(); $this->C_END_DATE->ViewAttrs = array(); $this->C_END_DATE->EditAttrs = array();

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->CellCssStyle = ""; $this->C_BEGIN_DATE->CellCssClass = "";
		$this->C_BEGIN_DATE->CellAttrs = array(); $this->C_BEGIN_DATE->ViewAttrs = array(); $this->C_BEGIN_DATE->EditAttrs = array();

		// C_ACTIVE
		$this->C_ACTIVE->CellCssStyle = ""; $this->C_ACTIVE->CellCssClass = "";
		$this->C_ACTIVE->CellAttrs = array(); $this->C_ACTIVE->ViewAttrs = array(); $this->C_ACTIVE->EditAttrs = array();

		// C_ORDER
		$this->C_ORDER->CellCssStyle = ""; $this->C_ORDER->CellCssClass = "";
		$this->C_ORDER->CellAttrs = array(); $this->C_ORDER->ViewAttrs = array(); $this->C_ORDER->EditAttrs = array();

		// C_KEYWORD
		$this->C_KEYWORD->CellCssStyle = ""; $this->C_KEYWORD->CellCssClass = "";
		$this->C_KEYWORD->CellAttrs = array(); $this->C_KEYWORD->ViewAttrs = array(); $this->C_KEYWORD->EditAttrs = array();

		// C_NOTICE_HIT
		$this->C_NOTICE_HIT->CellCssStyle = ""; $this->C_NOTICE_HIT->CellCssClass = "";
		$this->C_NOTICE_HIT->CellAttrs = array(); $this->C_NOTICE_HIT->ViewAttrs = array(); $this->C_NOTICE_HIT->EditAttrs = array();

		// FK_CONGTY_SEND
		$this->FK_CONGTY_SEND->CellCssStyle = ""; $this->FK_CONGTY_SEND->CellCssClass = "";
		$this->FK_CONGTY_SEND->CellAttrs = array(); $this->FK_CONGTY_SEND->ViewAttrs = array(); $this->FK_CONGTY_SEND->EditAttrs = array();

		// C_TITLE
		$this->C_TITLE->ViewValue = $this->C_TITLE->CurrentValue;
		$this->C_TITLE->CssStyle = "";
		$this->C_TITLE->CssClass = "";
		$this->C_TITLE->ViewCustomAttributes = "";

		// C_END_DATE
		$this->C_END_DATE->ViewValue = $this->C_END_DATE->CurrentValue;
		$this->C_END_DATE->ViewValue = ew_FormatDateTime($this->C_END_DATE->ViewValue, 7);
		$this->C_END_DATE->CssStyle = "";
		$this->C_END_DATE->CssClass = "";
		$this->C_END_DATE->ViewCustomAttributes = "";

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->ViewValue = $this->C_BEGIN_DATE->CurrentValue;
		$this->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($this->C_BEGIN_DATE->ViewValue, 7);
		$this->C_BEGIN_DATE->CssStyle = "";
		$this->C_BEGIN_DATE->CssClass = "";
		$this->C_BEGIN_DATE->ViewCustomAttributes = "";

		// C_ACTIVE
		if (strval($this->C_ACTIVE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE->CurrentValue) {
				case "0":
					$this->C_ACTIVE->ViewValue = "Khong kich hoat levelsite";
					break;
				case "1":
					$this->C_ACTIVE->ViewValue = "Kich hoat";
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

		// C_ORDER
		$this->C_ORDER->ViewValue = $this->C_ORDER->CurrentValue;
		$this->C_ORDER->ViewValue = ew_FormatDateTime($this->C_ORDER->ViewValue, 7);
		$this->C_ORDER->CssStyle = "";
		$this->C_ORDER->CssClass = "";
		$this->C_ORDER->ViewCustomAttributes = "";

		// C_KEYWORD
		$this->C_KEYWORD->ViewValue = $this->C_KEYWORD->CurrentValue;
		$this->C_KEYWORD->CssStyle = "";
		$this->C_KEYWORD->CssClass = "";
		$this->C_KEYWORD->ViewCustomAttributes = "";

		// C_NOTICE_HIT
		if (strval($this->C_NOTICE_HIT->CurrentValue) <> "") {
			switch ($this->C_NOTICE_HIT->CurrentValue) {
				case "0":
					$this->C_NOTICE_HIT->ViewValue = "Khong noi bat";
					break;
				case "1":
					$this->C_NOTICE_HIT->ViewValue = "Noi bat";
					break;
				default:
					$this->C_NOTICE_HIT->ViewValue = $this->C_NOTICE_HIT->CurrentValue;
			}
		} else {
			$this->C_NOTICE_HIT->ViewValue = NULL;
		}
		$this->C_NOTICE_HIT->CssStyle = "";
		$this->C_NOTICE_HIT->CssClass = "";
		$this->C_NOTICE_HIT->ViewCustomAttributes = "";

		// FK_CONGTY_SEND
		if (strval($this->FK_CONGTY_SEND->CurrentValue) <> "") {
			$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($this->FK_CONGTY_SEND->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_CONGTY_SEND->ViewValue = $rswrk->fields('C_TENCONGTY');
				$rswrk->Close();
			} else {
				$this->FK_CONGTY_SEND->ViewValue = $this->FK_CONGTY_SEND->CurrentValue;
			}
		} else {
			$this->FK_CONGTY_SEND->ViewValue = NULL;
		}
		$this->FK_CONGTY_SEND->CssStyle = "";
		$this->FK_CONGTY_SEND->CssClass = "";
		$this->FK_CONGTY_SEND->ViewCustomAttributes = "";

		// C_TITLE
		$this->C_TITLE->HrefValue = "";
		$this->C_TITLE->TooltipValue = "";

		// C_END_DATE
		$this->C_END_DATE->HrefValue = "";
		$this->C_END_DATE->TooltipValue = "";

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->HrefValue = "";
		$this->C_BEGIN_DATE->TooltipValue = "";

		// C_ACTIVE
		$this->C_ACTIVE->HrefValue = "";
		$this->C_ACTIVE->TooltipValue = "";

		// C_ORDER
		$this->C_ORDER->HrefValue = "";
		$this->C_ORDER->TooltipValue = "";

		// C_KEYWORD
		$this->C_KEYWORD->HrefValue = "";
		$this->C_KEYWORD->TooltipValue = "";

		// C_NOTICE_HIT
		$this->C_NOTICE_HIT->HrefValue = "";
		$this->C_NOTICE_HIT->TooltipValue = "";

		// FK_CONGTY_SEND
		$this->FK_CONGTY_SEND->HrefValue = "";
		$this->FK_CONGTY_SEND->TooltipValue = "";

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
