<?php

// Global variable for table object
$t_lylich = NULL;

//
// Table class for t_lylich
//
class ct_lylich {
	var $TableVar = 't_lylich';
	var $TableName = 't_lylich';
	var $TableType = 'TABLE';
	var $PK_PROFILE_ID;
	var $FK_CONGTY_ID;
	var $C_PIC;
	var $C_FULLNAME;
	var $C_POSITION;
	var $C_WORK_ADDRESS;
	var $C_EMAIL;
	var $C_PHONE;
	var $C_BIRTHDAY;
	var $C_BLOG;
	var $C_PERSONAL_PROFILE;
	var $C_EDUCATIION;
	var $C_SKILLS;
	var $C_WORK_EXPERIENCE;
	var $C_SCIENTIFIC_RESEARCH;
	var $C_REFERENCES;
	var $C_HOBBIES;
	var $C_TEMPLATE;
	var $C_STATUS;
	var $C_NOTE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $C_ORDER_LEVEL;
	var $C_ACTIVE;
	var $C_TIME_ACTIVE;
	var $C_ACTIVE_MAINSITE;
	var $C_TIME_ACTIVEM;
	var $C_ORDER_MAIN;
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
	function ct_lylich() {
		global $Language;

		// PK_PROFILE_ID
		$this->PK_PROFILE_ID = new cField('t_lylich', 't_lylich', 'x_PK_PROFILE_ID', 'PK_PROFILE_ID', '`PK_PROFILE_ID`', 3, -1, FALSE, '`PK_PROFILE_ID`', FALSE);
		$this->PK_PROFILE_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_PROFILE_ID'] =& $this->PK_PROFILE_ID;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_lylich', 't_lylich', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', '`FK_CONGTY_ID`', 3, -1, FALSE, '`FK_CONGTY_ID`', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// C_PIC
		$this->C_PIC = new cField('t_lylich', 't_lylich', 'x_C_PIC', 'C_PIC', '`C_PIC`', 200, -1, TRUE, '`C_PIC`', FALSE);
		$this->C_PIC->UploadPath = '../upload/picprofile';
		$this->fields['C_PIC'] =& $this->C_PIC;

		// C_FULLNAME
		$this->C_FULLNAME = new cField('t_lylich', 't_lylich', 'x_C_FULLNAME', 'C_FULLNAME', '`C_FULLNAME`', 200, -1, FALSE, '`C_FULLNAME`', FALSE);
		$this->fields['C_FULLNAME'] =& $this->C_FULLNAME;

		// C_POSITION
		$this->C_POSITION = new cField('t_lylich', 't_lylich', 'x_C_POSITION', 'C_POSITION', '`C_POSITION`', 200, -1, FALSE, '`C_POSITION`', FALSE);
		$this->fields['C_POSITION'] =& $this->C_POSITION;

		// C_WORK_ADDRESS
		$this->C_WORK_ADDRESS = new cField('t_lylich', 't_lylich', 'x_C_WORK_ADDRESS', 'C_WORK_ADDRESS', '`C_WORK_ADDRESS`', 200, -1, FALSE, '`C_WORK_ADDRESS`', FALSE);
		$this->fields['C_WORK_ADDRESS'] =& $this->C_WORK_ADDRESS;

		// C_EMAIL
		$this->C_EMAIL = new cField('t_lylich', 't_lylich', 'x_C_EMAIL', 'C_EMAIL', '`C_EMAIL`', 200, -1, FALSE, '`C_EMAIL`', FALSE);
		$this->fields['C_EMAIL'] =& $this->C_EMAIL;

		// C_PHONE
		$this->C_PHONE = new cField('t_lylich', 't_lylich', 'x_C_PHONE', 'C_PHONE', '`C_PHONE`', 3, -1, FALSE, '`C_PHONE`', FALSE);
		$this->C_PHONE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PHONE'] =& $this->C_PHONE;

		// C_BIRTHDAY
		$this->C_BIRTHDAY = new cField('t_lylich', 't_lylich', 'x_C_BIRTHDAY', 'C_BIRTHDAY', '`C_BIRTHDAY`', 200, -1, FALSE, '`C_BIRTHDAY`', FALSE);
		$this->fields['C_BIRTHDAY'] =& $this->C_BIRTHDAY;

		// C_BLOG
		$this->C_BLOG = new cField('t_lylich', 't_lylich', 'x_C_BLOG', 'C_BLOG', '`C_BLOG`', 200, -1, FALSE, '`C_BLOG`', FALSE);
		$this->fields['C_BLOG'] =& $this->C_BLOG;

		// C_PERSONAL_PROFILE
		$this->C_PERSONAL_PROFILE = new cField('t_lylich', 't_lylich', 'x_C_PERSONAL_PROFILE', 'C_PERSONAL_PROFILE', '`C_PERSONAL_PROFILE`', 201, -1, FALSE, '`C_PERSONAL_PROFILE`', FALSE);
		$this->C_PERSONAL_PROFILE->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_PERSONAL_PROFILE'] =& $this->C_PERSONAL_PROFILE;

		// C_EDUCATIION
		$this->C_EDUCATIION = new cField('t_lylich', 't_lylich', 'x_C_EDUCATIION', 'C_EDUCATIION', '`C_EDUCATIION`', 201, -1, FALSE, '`C_EDUCATIION`', FALSE);
		$this->C_EDUCATIION->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_EDUCATIION'] =& $this->C_EDUCATIION;

		// C_SKILLS
		$this->C_SKILLS = new cField('t_lylich', 't_lylich', 'x_C_SKILLS', 'C_SKILLS', '`C_SKILLS`', 201, -1, FALSE, '`C_SKILLS`', FALSE);
		$this->C_SKILLS->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_SKILLS'] =& $this->C_SKILLS;

		// C_WORK_EXPERIENCE
		$this->C_WORK_EXPERIENCE = new cField('t_lylich', 't_lylich', 'x_C_WORK_EXPERIENCE', 'C_WORK_EXPERIENCE', '`C_WORK_EXPERIENCE`', 201, -1, FALSE, '`C_WORK_EXPERIENCE`', FALSE);
		$this->C_WORK_EXPERIENCE->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_WORK_EXPERIENCE'] =& $this->C_WORK_EXPERIENCE;

		// C_SCIENTIFIC_RESEARCH
		$this->C_SCIENTIFIC_RESEARCH = new cField('t_lylich', 't_lylich', 'x_C_SCIENTIFIC_RESEARCH', 'C_SCIENTIFIC_RESEARCH', '`C_SCIENTIFIC_RESEARCH`', 201, -1, FALSE, '`C_SCIENTIFIC_RESEARCH`', FALSE);
		$this->C_SCIENTIFIC_RESEARCH->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_SCIENTIFIC_RESEARCH'] =& $this->C_SCIENTIFIC_RESEARCH;

		// C_REFERENCES
		$this->C_REFERENCES = new cField('t_lylich', 't_lylich', 'x_C_REFERENCES', 'C_REFERENCES', '`C_REFERENCES`', 201, -1, FALSE, '`C_REFERENCES`', FALSE);
		$this->C_REFERENCES->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_REFERENCES'] =& $this->C_REFERENCES;

		// C_HOBBIES
		$this->C_HOBBIES = new cField('t_lylich', 't_lylich', 'x_C_HOBBIES', 'C_HOBBIES', '`C_HOBBIES`', 201, -1, FALSE, '`C_HOBBIES`', FALSE);
		$this->C_HOBBIES->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_HOBBIES'] =& $this->C_HOBBIES;

		// C_TEMPLATE
		$this->C_TEMPLATE = new cField('t_lylich', 't_lylich', 'x_C_TEMPLATE', 'C_TEMPLATE', '`C_TEMPLATE`', 3, -1, FALSE, '`C_TEMPLATE`', FALSE);
		$this->C_TEMPLATE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TEMPLATE'] =& $this->C_TEMPLATE;

		// C_STATUS
		$this->C_STATUS = new cField('t_lylich', 't_lylich', 'x_C_STATUS', 'C_STATUS', '`C_STATUS`', 3, -1, FALSE, '`C_STATUS`', FALSE);
		$this->C_STATUS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_STATUS'] =& $this->C_STATUS;

		// C_NOTE
		$this->C_NOTE = new cField('t_lylich', 't_lylich', 'x_C_NOTE', 'C_NOTE', '`C_NOTE`', 201, -1, FALSE, '`C_NOTE`', FALSE);
		$this->fields['C_NOTE'] =& $this->C_NOTE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_lylich', 't_lylich', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_lylich', 't_lylich', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_lylich', 't_lylich', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_lylich', 't_lylich', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// C_ORDER_LEVEL
		$this->C_ORDER_LEVEL = new cField('t_lylich', 't_lylich', 'x_C_ORDER_LEVEL', 'C_ORDER_LEVEL', '`C_ORDER_LEVEL`', 135, 7, FALSE, '`C_ORDER_LEVEL`', FALSE);
		$this->C_ORDER_LEVEL->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER_LEVEL'] =& $this->C_ORDER_LEVEL;

		// C_ACTIVE
		$this->C_ACTIVE = new cField('t_lylich', 't_lylich', 'x_C_ACTIVE', 'C_ACTIVE', '`C_ACTIVE`', 3, -1, FALSE, '`C_ACTIVE`', FALSE);
		$this->C_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE'] =& $this->C_ACTIVE;

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE = new cField('t_lylich', 't_lylich', 'x_C_TIME_ACTIVE', 'C_TIME_ACTIVE', '`C_TIME_ACTIVE`', 135, 7, FALSE, '`C_TIME_ACTIVE`', FALSE);
		$this->C_TIME_ACTIVE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVE'] =& $this->C_TIME_ACTIVE;

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE = new cField('t_lylich', 't_lylich', 'x_C_ACTIVE_MAINSITE', 'C_ACTIVE_MAINSITE', '`C_ACTIVE_MAINSITE`', 3, -1, FALSE, '`C_ACTIVE_MAINSITE`', FALSE);
		$this->C_ACTIVE_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE_MAINSITE'] =& $this->C_ACTIVE_MAINSITE;

		// C_TIME_ACTIVEM
		$this->C_TIME_ACTIVEM = new cField('t_lylich', 't_lylich', 'x_C_TIME_ACTIVEM', 'C_TIME_ACTIVEM', '`C_TIME_ACTIVEM`', 135, 7, FALSE, '`C_TIME_ACTIVEM`', FALSE);
		$this->C_TIME_ACTIVEM->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVEM'] =& $this->C_TIME_ACTIVEM;

		// C_ORDER_MAIN
		$this->C_ORDER_MAIN = new cField('t_lylich', 't_lylich', 'x_C_ORDER_MAIN', 'C_ORDER_MAIN', '`C_ORDER_MAIN`', 135, 7, FALSE, '`C_ORDER_MAIN`', FALSE);
		$this->C_ORDER_MAIN->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER_MAIN'] =& $this->C_ORDER_MAIN;
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
		return "t_lylich_Highlight";
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
		return "`t_lylich`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
	    global $Security;
	       $sWhere = "";
               if (IsAdmin()) $sWhere ="";
               else 
               {   
                  if (($Security->CurrentUserLevelID() == 12) || ($Security->CurrentUserLevelID() == 10)) $sWhere = "t_lylich.FK_CONGTY_ID = ".$Security->CurrentUserOption()." AND t_lylich.C_USER_ADD = ".$Security->CurrentUserID();
                  else $sWhere = "t_lylich.FK_CONGTY_ID = ".$Security->CurrentUserOption();
                  //  $sWhere = "t_tinbai_levelsite.FK_CONGTY_ID = ".$Security->CurrentUserOption();  
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
		return "INSERT INTO `t_lylich` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_lylich` SET ";
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
		$SQL = "DELETE FROM `t_lylich` WHERE ";
		$SQL .= ew_QuotedName('PK_PROFILE_ID') . '=' . ew_QuotedValue($rs['PK_PROFILE_ID'], $this->PK_PROFILE_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_PROFILE_ID` = @PK_PROFILE_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_PROFILE_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_PROFILE_ID@", ew_AdjustSql($this->PK_PROFILE_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_lylichlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_lylichlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_lylichview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_lylichadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_lylichedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_lylichadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_lylichdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_PROFILE_ID->CurrentValue)) {
			$sUrl .= "PK_PROFILE_ID=" . urlencode($this->PK_PROFILE_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_lylich" : "";
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
		$this->PK_PROFILE_ID->setDbValue($rs->fields('PK_PROFILE_ID'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->C_PIC->Upload->DbValue = $rs->fields('C_PIC');
		$this->C_FULLNAME->setDbValue($rs->fields('C_FULLNAME'));
		$this->C_POSITION->setDbValue($rs->fields('C_POSITION'));
		$this->C_WORK_ADDRESS->setDbValue($rs->fields('C_WORK_ADDRESS'));
		$this->C_EMAIL->setDbValue($rs->fields('C_EMAIL'));
		$this->C_PHONE->setDbValue($rs->fields('C_PHONE'));
		$this->C_BIRTHDAY->setDbValue($rs->fields('C_BIRTHDAY'));
		$this->C_BLOG->setDbValue($rs->fields('C_BLOG'));
		$this->C_PERSONAL_PROFILE->setDbValue($rs->fields('C_PERSONAL_PROFILE'));
		$this->C_EDUCATIION->setDbValue($rs->fields('C_EDUCATIION'));
		$this->C_SKILLS->setDbValue($rs->fields('C_SKILLS'));
		$this->C_WORK_EXPERIENCE->setDbValue($rs->fields('C_WORK_EXPERIENCE'));
		$this->C_SCIENTIFIC_RESEARCH->setDbValue($rs->fields('C_SCIENTIFIC_RESEARCH'));
		$this->C_REFERENCES->setDbValue($rs->fields('C_REFERENCES'));
		$this->C_HOBBIES->setDbValue($rs->fields('C_HOBBIES'));
		$this->C_TEMPLATE->setDbValue($rs->fields('C_TEMPLATE'));
		$this->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$this->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->C_ORDER_LEVEL->setDbValue($rs->fields('C_ORDER_LEVEL'));
		$this->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$this->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$this->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$this->C_TIME_ACTIVEM->setDbValue($rs->fields('C_TIME_ACTIVEM'));
		$this->C_ORDER_MAIN->setDbValue($rs->fields('C_ORDER_MAIN'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// FK_CONGTY_ID

		$this->FK_CONGTY_ID->CellCssStyle = ""; $this->FK_CONGTY_ID->CellCssClass = "";
		$this->FK_CONGTY_ID->CellAttrs = array(); $this->FK_CONGTY_ID->ViewAttrs = array(); $this->FK_CONGTY_ID->EditAttrs = array();

		// C_PIC
		$this->C_PIC->CellCssStyle = ""; $this->C_PIC->CellCssClass = "";
		$this->C_PIC->CellAttrs = array(); $this->C_PIC->ViewAttrs = array(); $this->C_PIC->EditAttrs = array();

		// C_FULLNAME
		$this->C_FULLNAME->CellCssStyle = ""; $this->C_FULLNAME->CellCssClass = "";
		$this->C_FULLNAME->CellAttrs = array(); $this->C_FULLNAME->ViewAttrs = array(); $this->C_FULLNAME->EditAttrs = array();

		// C_POSITION
		$this->C_POSITION->CellCssStyle = ""; $this->C_POSITION->CellCssClass = "";
		$this->C_POSITION->CellAttrs = array(); $this->C_POSITION->ViewAttrs = array(); $this->C_POSITION->EditAttrs = array();

		// C_WORK_ADDRESS
		$this->C_WORK_ADDRESS->CellCssStyle = ""; $this->C_WORK_ADDRESS->CellCssClass = "";
		$this->C_WORK_ADDRESS->CellAttrs = array(); $this->C_WORK_ADDRESS->ViewAttrs = array(); $this->C_WORK_ADDRESS->EditAttrs = array();

		// C_EMAIL
		$this->C_EMAIL->CellCssStyle = ""; $this->C_EMAIL->CellCssClass = "";
		$this->C_EMAIL->CellAttrs = array(); $this->C_EMAIL->ViewAttrs = array(); $this->C_EMAIL->EditAttrs = array();

		// C_PHONE
		$this->C_PHONE->CellCssStyle = ""; $this->C_PHONE->CellCssClass = "";
		$this->C_PHONE->CellAttrs = array(); $this->C_PHONE->ViewAttrs = array(); $this->C_PHONE->EditAttrs = array();

		// C_BIRTHDAY
		$this->C_BIRTHDAY->CellCssStyle = ""; $this->C_BIRTHDAY->CellCssClass = "";
		$this->C_BIRTHDAY->CellAttrs = array(); $this->C_BIRTHDAY->ViewAttrs = array(); $this->C_BIRTHDAY->EditAttrs = array();

		// C_TEMPLATE
		$this->C_TEMPLATE->CellCssStyle = ""; $this->C_TEMPLATE->CellCssClass = "";
		$this->C_TEMPLATE->CellAttrs = array(); $this->C_TEMPLATE->ViewAttrs = array(); $this->C_TEMPLATE->EditAttrs = array();

		// C_STATUS
		$this->C_STATUS->CellCssStyle = ""; $this->C_STATUS->CellCssClass = "";
		$this->C_STATUS->CellAttrs = array(); $this->C_STATUS->ViewAttrs = array(); $this->C_STATUS->EditAttrs = array();

		// C_ORDER_LEVEL
		$this->C_ORDER_LEVEL->CellCssStyle = ""; $this->C_ORDER_LEVEL->CellCssClass = "";
		$this->C_ORDER_LEVEL->CellAttrs = array(); $this->C_ORDER_LEVEL->ViewAttrs = array(); $this->C_ORDER_LEVEL->EditAttrs = array();

		// C_ACTIVE
		$this->C_ACTIVE->CellCssStyle = ""; $this->C_ACTIVE->CellCssClass = "";
		$this->C_ACTIVE->CellAttrs = array(); $this->C_ACTIVE->ViewAttrs = array(); $this->C_ACTIVE->EditAttrs = array();

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->CellCssStyle = ""; $this->C_TIME_ACTIVE->CellCssClass = "";
		$this->C_TIME_ACTIVE->CellAttrs = array(); $this->C_TIME_ACTIVE->ViewAttrs = array(); $this->C_TIME_ACTIVE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE->CellCssStyle = ""; $this->C_ACTIVE_MAINSITE->CellCssClass = "";
		$this->C_ACTIVE_MAINSITE->CellAttrs = array(); $this->C_ACTIVE_MAINSITE->ViewAttrs = array(); $this->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVEM
		$this->C_TIME_ACTIVEM->CellCssStyle = ""; $this->C_TIME_ACTIVEM->CellCssClass = "";
		$this->C_TIME_ACTIVEM->CellAttrs = array(); $this->C_TIME_ACTIVEM->ViewAttrs = array(); $this->C_TIME_ACTIVEM->EditAttrs = array();

		// FK_CONGTY_ID
		if (strval($this->FK_CONGTY_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($this->FK_CONGTY_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_CONGTY_ID->ViewValue = $rswrk->fields('C_TENCONGTY');
				$rswrk->Close();
			} else {
				$this->FK_CONGTY_ID->ViewValue = $this->FK_CONGTY_ID->CurrentValue;
			}
		} else {
			$this->FK_CONGTY_ID->ViewValue = NULL;
		}
		$this->FK_CONGTY_ID->CssStyle = "";
		$this->FK_CONGTY_ID->CssClass = "";
		$this->FK_CONGTY_ID->ViewCustomAttributes = "";

		// C_PIC
		if (!ew_Empty($this->C_PIC->Upload->DbValue)) {
			$this->C_PIC->ViewValue = $this->C_PIC->Upload->DbValue;
		} else {
			$this->C_PIC->ViewValue = "";
		}
		$this->C_PIC->CssStyle = "";
		$this->C_PIC->CssClass = "";
		$this->C_PIC->ViewCustomAttributes = "";

		// C_FULLNAME
		$this->C_FULLNAME->ViewValue = $this->C_FULLNAME->CurrentValue;
		$this->C_FULLNAME->CssStyle = "";
		$this->C_FULLNAME->CssClass = "";
		$this->C_FULLNAME->ViewCustomAttributes = "";

		// C_POSITION
		$this->C_POSITION->ViewValue = $this->C_POSITION->CurrentValue;
		$this->C_POSITION->CssStyle = "";
		$this->C_POSITION->CssClass = "";
		$this->C_POSITION->ViewCustomAttributes = "";

		// C_WORK_ADDRESS
		$this->C_WORK_ADDRESS->ViewValue = $this->C_WORK_ADDRESS->CurrentValue;
		$this->C_WORK_ADDRESS->CssStyle = "";
		$this->C_WORK_ADDRESS->CssClass = "";
		$this->C_WORK_ADDRESS->ViewCustomAttributes = "";

		// C_EMAIL
		$this->C_EMAIL->ViewValue = $this->C_EMAIL->CurrentValue;
		$this->C_EMAIL->CssStyle = "";
		$this->C_EMAIL->CssClass = "";
		$this->C_EMAIL->ViewCustomAttributes = "";

		// C_PHONE
		$this->C_PHONE->ViewValue = $this->C_PHONE->CurrentValue;
		$this->C_PHONE->CssStyle = "";
		$this->C_PHONE->CssClass = "";
		$this->C_PHONE->ViewCustomAttributes = "";

		// C_BIRTHDAY
		$this->C_BIRTHDAY->ViewValue = $this->C_BIRTHDAY->CurrentValue;
		$this->C_BIRTHDAY->CssStyle = "";
		$this->C_BIRTHDAY->CssClass = "";
		$this->C_BIRTHDAY->ViewCustomAttributes = "";

		// C_TEMPLATE
		if (strval($this->C_TEMPLATE->CurrentValue) <> "") {
			switch ($this->C_TEMPLATE->CurrentValue) {
				case "1":
					$this->C_TEMPLATE->ViewValue = "Template 1";
					break;
				case "2":
					$this->C_TEMPLATE->ViewValue = "Template 2";
					break;
				default:
					$this->C_TEMPLATE->ViewValue = $this->C_TEMPLATE->CurrentValue;
			}
		} else {
			$this->C_TEMPLATE->ViewValue = NULL;
		}
		$this->C_TEMPLATE->CssStyle = "";
		$this->C_TEMPLATE->CssClass = "";
		$this->C_TEMPLATE->ViewCustomAttributes = "";

		// C_STATUS
		if (strval($this->C_STATUS->CurrentValue) <> "") {
			switch ($this->C_STATUS->CurrentValue) {
				case "0":
					$this->C_STATUS->ViewValue = "Khong kich hoat";
					break;
				case "1":
					$this->C_STATUS->ViewValue = "Kich hoat";
					break;
				default:
					$this->C_STATUS->ViewValue = $this->C_STATUS->CurrentValue;
			}
		} else {
			$this->C_STATUS->ViewValue = NULL;
		}
		$this->C_STATUS->CssStyle = "";
		$this->C_STATUS->CssClass = "";
		$this->C_STATUS->ViewCustomAttributes = "";

		// C_ORDER_LEVEL
		$this->C_ORDER_LEVEL->ViewValue = $this->C_ORDER_LEVEL->CurrentValue;
		$this->C_ORDER_LEVEL->ViewValue = ew_FormatDateTime($this->C_ORDER_LEVEL->ViewValue, 7);
		$this->C_ORDER_LEVEL->CssStyle = "";
		$this->C_ORDER_LEVEL->CssClass = "";
		$this->C_ORDER_LEVEL->ViewCustomAttributes = "";

		// C_ACTIVE
		if (strval($this->C_ACTIVE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE->CurrentValue) {
				case "0":
					$this->C_ACTIVE->ViewValue = "khong kich hoat";
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

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->ViewValue = $this->C_TIME_ACTIVE->CurrentValue;
		$this->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($this->C_TIME_ACTIVE->ViewValue, 7);
		$this->C_TIME_ACTIVE->CssStyle = "";
		$this->C_TIME_ACTIVE->CssClass = "";
		$this->C_TIME_ACTIVE->ViewCustomAttributes = "";

		// C_ACTIVE_MAINSITE
		if (strval($this->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE_MAINSITE->CurrentValue) {
				case "0":
					$this->C_ACTIVE_MAINSITE->ViewValue = "Khong active mainsite";
					break;
				case "1":
					$this->C_ACTIVE_MAINSITE->ViewValue = "Active mainsite";
					break;
				case "2":
					$this->C_ACTIVE_MAINSITE->ViewValue = "Xac nhan";
					break;
				default:
					$this->C_ACTIVE_MAINSITE->ViewValue = $this->C_ACTIVE_MAINSITE->CurrentValue;
			}
		} else {
			$this->C_ACTIVE_MAINSITE->ViewValue = NULL;
		}
		$this->C_ACTIVE_MAINSITE->CssStyle = "";
		$this->C_ACTIVE_MAINSITE->CssClass = "";
		$this->C_ACTIVE_MAINSITE->ViewCustomAttributes = "";

		// C_TIME_ACTIVEM
		$this->C_TIME_ACTIVEM->ViewValue = $this->C_TIME_ACTIVEM->CurrentValue;
		$this->C_TIME_ACTIVEM->ViewValue = ew_FormatDateTime($this->C_TIME_ACTIVEM->ViewValue, 7);
		$this->C_TIME_ACTIVEM->CssStyle = "";
		$this->C_TIME_ACTIVEM->CssClass = "";
		$this->C_TIME_ACTIVEM->ViewCustomAttributes = "";

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->HrefValue = "";
		$this->FK_CONGTY_ID->TooltipValue = "";

		// C_PIC
		if (!ew_Empty($this->C_PIC->Upload->DbValue)) {
			$this->C_PIC->HrefValue = ew_UploadPathEx(FALSE, $this->C_PIC->UploadPath) . ((!empty($this->C_PIC->ViewValue)) ? $this->C_PIC->ViewValue : $this->C_PIC->CurrentValue);
			if ($this->Export <> "") $t_lylich->C_PIC->HrefValue = ew_ConvertFullUrl($this->C_PIC->HrefValue);
		} else {
			$this->C_PIC->HrefValue = "";
		}
		$this->C_PIC->TooltipValue = "";

		// C_FULLNAME
		$this->C_FULLNAME->HrefValue = "";
		$this->C_FULLNAME->TooltipValue = "";

		// C_POSITION
		$this->C_POSITION->HrefValue = "";
		$this->C_POSITION->TooltipValue = "";

		// C_WORK_ADDRESS
		$this->C_WORK_ADDRESS->HrefValue = "";
		$this->C_WORK_ADDRESS->TooltipValue = "";

		// C_EMAIL
		$this->C_EMAIL->HrefValue = "";
		$this->C_EMAIL->TooltipValue = "";

		// C_PHONE
		$this->C_PHONE->HrefValue = "";
		$this->C_PHONE->TooltipValue = "";

		// C_BIRTHDAY
		$this->C_BIRTHDAY->HrefValue = "";
		$this->C_BIRTHDAY->TooltipValue = "";

		// C_TEMPLATE
		$this->C_TEMPLATE->HrefValue = "";
		$this->C_TEMPLATE->TooltipValue = "";

		// C_STATUS
		$this->C_STATUS->HrefValue = "";
		$this->C_STATUS->TooltipValue = "";

		// C_ORDER_LEVEL
		$this->C_ORDER_LEVEL->HrefValue = "";
		$this->C_ORDER_LEVEL->TooltipValue = "";

		// C_ACTIVE
		$this->C_ACTIVE->HrefValue = "";
		$this->C_ACTIVE->TooltipValue = "";

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->HrefValue = "";
		$this->C_TIME_ACTIVE->TooltipValue = "";

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE->HrefValue = "";
		$this->C_ACTIVE_MAINSITE->TooltipValue = "";

		// C_TIME_ACTIVEM
		$this->C_TIME_ACTIVEM->HrefValue = "";
		$this->C_TIME_ACTIVEM->TooltipValue = "";

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
