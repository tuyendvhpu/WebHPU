<?php

// Global variable for table object
$t_event_mainlevel = NULL;

//
// Table class for t_event_mainlevel
//
class ct_event_mainlevel {
	var $TableVar = 't_event_mainlevel';
	var $TableName = 't_event_mainlevel';
	var $TableType = 'TABLE';
	var $PK_EVENT_MAINLEVEL;
	var $FK_EVENT_ID;
	var $FK_CONGTY_ID;
	var $C_EVENT_NAME;
	var $C_TYPE_EVENT;
	var $C_POST;
	var $C_URL_IMAGES;
	var $C_URL_LINK;
	var $C_DATETIME_BEGIN;
	var $C_DATETIME_END;
	var $C_ORDER;
	var $C_NOTE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $C_ACTIVE_LEVELSITE;
	var $C_TIME_ACTIVE;
	var $FK_CONGTY_SEND;
	var $C_TYPE_ACTIVE;
	var $C_ARRAY_TINBAI;
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
	function ct_event_mainlevel() {
		global $Language;

		// PK_EVENT_MAINLEVEL
		$this->PK_EVENT_MAINLEVEL = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_PK_EVENT_MAINLEVEL', 'PK_EVENT_MAINLEVEL', '`PK_EVENT_MAINLEVEL`', 3, -1, FALSE, '`PK_EVENT_MAINLEVEL`', FALSE);
		$this->PK_EVENT_MAINLEVEL->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_EVENT_MAINLEVEL'] =& $this->PK_EVENT_MAINLEVEL;

		// FK_EVENT_ID
		$this->FK_EVENT_ID = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_FK_EVENT_ID', 'FK_EVENT_ID', '`FK_EVENT_ID`', 3, -1, FALSE, '`FK_EVENT_ID`', FALSE);
		$this->FK_EVENT_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_EVENT_ID'] =& $this->FK_EVENT_ID;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', '`FK_CONGTY_ID`', 3, -1, FALSE, '`FK_CONGTY_ID`', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// C_EVENT_NAME
		$this->C_EVENT_NAME = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_EVENT_NAME', 'C_EVENT_NAME', '`C_EVENT_NAME`', 201, -1, FALSE, '`C_EVENT_NAME`', FALSE);
		$this->fields['C_EVENT_NAME'] =& $this->C_EVENT_NAME;

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_TYPE_EVENT', 'C_TYPE_EVENT', '`C_TYPE_EVENT`', 3, -1, FALSE, '`C_TYPE_EVENT`', FALSE);
		$this->C_TYPE_EVENT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TYPE_EVENT'] =& $this->C_TYPE_EVENT;

		// C_POST
		$this->C_POST = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_POST', 'C_POST', '`C_POST`', 3, -1, FALSE, '`C_POST`', FALSE);
		$this->C_POST->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_POST'] =& $this->C_POST;

		// C_URL_IMAGES
		$this->C_URL_IMAGES = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_URL_IMAGES', 'C_URL_IMAGES', '`C_URL_IMAGES`', 201, -1, FALSE, '`C_URL_IMAGES`', FALSE);
		$this->fields['C_URL_IMAGES'] =& $this->C_URL_IMAGES;

		// C_URL_LINK
		$this->C_URL_LINK = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_URL_LINK', 'C_URL_LINK', '`C_URL_LINK`', 201, -1, FALSE, '`C_URL_LINK`', FALSE);
		$this->fields['C_URL_LINK'] =& $this->C_URL_LINK;

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_DATETIME_BEGIN', 'C_DATETIME_BEGIN', '`C_DATETIME_BEGIN`', 135, 7, FALSE, '`C_DATETIME_BEGIN`', FALSE);
		$this->C_DATETIME_BEGIN->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_BEGIN'] =& $this->C_DATETIME_BEGIN;

		// C_DATETIME_END
		$this->C_DATETIME_END = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_DATETIME_END', 'C_DATETIME_END', '`C_DATETIME_END`', 135, 7, FALSE, '`C_DATETIME_END`', FALSE);
		$this->C_DATETIME_END->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_END'] =& $this->C_DATETIME_END;

		// C_ORDER
		$this->C_ORDER = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_ORDER', 'C_ORDER', '`C_ORDER`', 135, 7, FALSE, '`C_ORDER`', FALSE);
		$this->C_ORDER->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER'] =& $this->C_ORDER;

		// C_NOTE
		$this->C_NOTE = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_NOTE', 'C_NOTE', '`C_NOTE`', 201, -1, FALSE, '`C_NOTE`', FALSE);
		$this->fields['C_NOTE'] =& $this->C_NOTE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_ACTIVE_LEVELSITE', 'C_ACTIVE_LEVELSITE', '`C_ACTIVE_LEVELSITE`', 3, -1, FALSE, '`C_ACTIVE_LEVELSITE`', FALSE);
		$this->C_ACTIVE_LEVELSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE_LEVELSITE'] =& $this->C_ACTIVE_LEVELSITE;

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_TIME_ACTIVE', 'C_TIME_ACTIVE', '`C_TIME_ACTIVE`', 135, 7, FALSE, '`C_TIME_ACTIVE`', FALSE);
		$this->C_TIME_ACTIVE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVE'] =& $this->C_TIME_ACTIVE;

		// FK_CONGTY_SEND
		$this->FK_CONGTY_SEND = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_FK_CONGTY_SEND', 'FK_CONGTY_SEND', '`FK_CONGTY_SEND`', 3, -1, FALSE, '`FK_CONGTY_SEND`', FALSE);
		$this->FK_CONGTY_SEND->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_SEND'] =& $this->FK_CONGTY_SEND;

		// C_TYPE_ACTIVE
		$this->C_TYPE_ACTIVE = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_TYPE_ACTIVE', 'C_TYPE_ACTIVE', '`C_TYPE_ACTIVE`', 3, -1, FALSE, '`C_TYPE_ACTIVE`', FALSE);
		$this->C_TYPE_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TYPE_ACTIVE'] =& $this->C_TYPE_ACTIVE;

		// C_ARRAY_TINBAI
		$this->C_ARRAY_TINBAI = new cField('t_event_mainlevel', 't_event_mainlevel', 'x_C_ARRAY_TINBAI', 'C_ARRAY_TINBAI', '`C_ARRAY_TINBAI`', 200, -1, FALSE, '`C_ARRAY_TINBAI`', FALSE);
		$this->fields['C_ARRAY_TINBAI'] =& $this->C_ARRAY_TINBAI;
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
		return "t_event_mainlevel_Highlight";
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
		return "`t_event_mainlevel`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		global $Security;
                $sWhere = "(t_event_mainlevel.FK_CONGTY_ID <> t_event_mainlevel.FK_CONGTY_SEND) AND (t_event_mainlevel.FK_CONGTY_ID = ".$Security->CurrentUserOption().")";
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
		return "INSERT INTO `t_event_mainlevel` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_event_mainlevel` SET ";
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
		$SQL = "DELETE FROM `t_event_mainlevel` WHERE ";
		$SQL .= ew_QuotedName('PK_EVENT_MAINLEVEL') . '=' . ew_QuotedValue($rs['PK_EVENT_MAINLEVEL'], $this->PK_EVENT_MAINLEVEL->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_EVENT_MAINLEVEL` = @PK_EVENT_MAINLEVEL@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_EVENT_MAINLEVEL->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_EVENT_MAINLEVEL@", ew_AdjustSql($this->PK_EVENT_MAINLEVEL->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_event_mainlevellist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_event_mainlevellist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_event_mainlevelview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_event_mainleveladd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_event_mainleveledit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_event_mainleveladd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_event_mainleveldelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_EVENT_MAINLEVEL->CurrentValue)) {
			$sUrl .= "PK_EVENT_MAINLEVEL=" . urlencode($this->PK_EVENT_MAINLEVEL->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_event_mainlevel" : "";
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
		$this->PK_EVENT_MAINLEVEL->setDbValue($rs->fields('PK_EVENT_MAINLEVEL'));
		$this->FK_EVENT_ID->setDbValue($rs->fields('FK_EVENT_ID'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$this->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$this->C_POST->setDbValue($rs->fields('C_POST'));
		$this->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$this->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$this->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$this->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$this->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$this->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$this->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$this->FK_CONGTY_SEND->setDbValue($rs->fields('FK_CONGTY_SEND'));
		$this->C_TYPE_ACTIVE->setDbValue($rs->fields('C_TYPE_ACTIVE'));
		$this->C_ARRAY_TINBAI->setDbValue($rs->fields('C_ARRAY_TINBAI'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// C_EVENT_NAME

		$this->C_EVENT_NAME->CellCssStyle = ""; $this->C_EVENT_NAME->CellCssClass = "";
		$this->C_EVENT_NAME->CellAttrs = array(); $this->C_EVENT_NAME->ViewAttrs = array(); $this->C_EVENT_NAME->EditAttrs = array();

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT->CellCssStyle = ""; $this->C_TYPE_EVENT->CellCssClass = "";
		$this->C_TYPE_EVENT->CellAttrs = array(); $this->C_TYPE_EVENT->ViewAttrs = array(); $this->C_TYPE_EVENT->EditAttrs = array();

		// C_URL_IMAGES
		$this->C_URL_IMAGES->CellCssStyle = ""; $this->C_URL_IMAGES->CellCssClass = "";
		$this->C_URL_IMAGES->CellAttrs = array(); $this->C_URL_IMAGES->ViewAttrs = array(); $this->C_URL_IMAGES->EditAttrs = array();

		// C_URL_LINK
		$this->C_URL_LINK->CellCssStyle = ""; $this->C_URL_LINK->CellCssClass = "";
		$this->C_URL_LINK->CellAttrs = array(); $this->C_URL_LINK->ViewAttrs = array(); $this->C_URL_LINK->EditAttrs = array();

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN->CellCssStyle = ""; $this->C_DATETIME_BEGIN->CellCssClass = "";
		$this->C_DATETIME_BEGIN->CellAttrs = array(); $this->C_DATETIME_BEGIN->ViewAttrs = array(); $this->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$this->C_DATETIME_END->CellCssStyle = ""; $this->C_DATETIME_END->CellCssClass = "";
		$this->C_DATETIME_END->CellAttrs = array(); $this->C_DATETIME_END->ViewAttrs = array(); $this->C_DATETIME_END->EditAttrs = array();

		// C_ORDER
		$this->C_ORDER->CellCssStyle = ""; $this->C_ORDER->CellCssClass = "";
		$this->C_ORDER->CellAttrs = array(); $this->C_ORDER->ViewAttrs = array(); $this->C_ORDER->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $this->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$this->C_ACTIVE_LEVELSITE->CellAttrs = array(); $this->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $this->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->CellCssStyle = ""; $this->C_TIME_ACTIVE->CellCssClass = "";
		$this->C_TIME_ACTIVE->CellAttrs = array(); $this->C_TIME_ACTIVE->ViewAttrs = array(); $this->C_TIME_ACTIVE->EditAttrs = array();

		// FK_CONGTY_SEND
		$this->FK_CONGTY_SEND->CellCssStyle = ""; $this->FK_CONGTY_SEND->CellCssClass = "";
		$this->FK_CONGTY_SEND->CellAttrs = array(); $this->FK_CONGTY_SEND->ViewAttrs = array(); $this->FK_CONGTY_SEND->EditAttrs = array();

		// C_EVENT_NAME
		$this->C_EVENT_NAME->ViewValue = $this->C_EVENT_NAME->CurrentValue;
		$this->C_EVENT_NAME->CssStyle = "";
		$this->C_EVENT_NAME->CssClass = "";
		$this->C_EVENT_NAME->ViewCustomAttributes = "";

		// C_TYPE_EVENT
		if (strval($this->C_TYPE_EVENT->CurrentValue) <> "") {
			switch ($this->C_TYPE_EVENT->CurrentValue) {
				case "1":
					$this->C_TYPE_EVENT->ViewValue = "Loai su kien popup";
					break;
				case "2":
					$this->C_TYPE_EVENT->ViewValue = "Loai su lien theo bai viet";
					break;
				case "3":
					$this->C_TYPE_EVENT->ViewValue = "Laoi su kien lien ket";
					break;
				default:
					$this->C_TYPE_EVENT->ViewValue = $this->C_TYPE_EVENT->CurrentValue;
			}
		} else {
			$this->C_TYPE_EVENT->ViewValue = NULL;
		}
		$this->C_TYPE_EVENT->CssStyle = "";
		$this->C_TYPE_EVENT->CssClass = "";
		$this->C_TYPE_EVENT->ViewCustomAttributes = "";

		// C_URL_IMAGES
		$this->C_URL_IMAGES->ViewValue = $this->C_URL_IMAGES->CurrentValue;
		$this->C_URL_IMAGES->CssStyle = "";
		$this->C_URL_IMAGES->CssClass = "";
		$this->C_URL_IMAGES->ViewCustomAttributes = "";

		// C_URL_LINK
		$this->C_URL_LINK->ViewValue = $this->C_URL_LINK->CurrentValue;
		$this->C_URL_LINK->CssStyle = "";
		$this->C_URL_LINK->CssClass = "";
		$this->C_URL_LINK->ViewCustomAttributes = "";

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN->ViewValue = $this->C_DATETIME_BEGIN->CurrentValue;
		$this->C_DATETIME_BEGIN->ViewValue = ew_FormatDateTime($this->C_DATETIME_BEGIN->ViewValue, 7);
		$this->C_DATETIME_BEGIN->CssStyle = "";
		$this->C_DATETIME_BEGIN->CssClass = "";
		$this->C_DATETIME_BEGIN->ViewCustomAttributes = "";

		// C_DATETIME_END
		$this->C_DATETIME_END->ViewValue = $this->C_DATETIME_END->CurrentValue;
		$this->C_DATETIME_END->ViewValue = ew_FormatDateTime($this->C_DATETIME_END->ViewValue, 7);
		$this->C_DATETIME_END->CssStyle = "";
		$this->C_DATETIME_END->CssClass = "";
		$this->C_DATETIME_END->ViewCustomAttributes = "";

		// C_ORDER
		$this->C_ORDER->ViewValue = $this->C_ORDER->CurrentValue;
		$this->C_ORDER->ViewValue = ew_FormatDateTime($this->C_ORDER->ViewValue, 7);
		$this->C_ORDER->CssStyle = "";
		$this->C_ORDER->CssClass = "";
		$this->C_ORDER->ViewCustomAttributes = "";

		// C_ACTIVE_LEVELSITE
		if (strval($this->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE_LEVELSITE->CurrentValue) {
				case "0":
					$this->C_ACTIVE_LEVELSITE->ViewValue = "Khong kich hoat";
					break;
				case "1":
					$this->C_ACTIVE_LEVELSITE->ViewValue = "Kich hoat";
					break;
				default:
					$this->C_ACTIVE_LEVELSITE->ViewValue = $this->C_ACTIVE_LEVELSITE->CurrentValue;
			}
		} else {
			$this->C_ACTIVE_LEVELSITE->ViewValue = NULL;
		}
		$this->C_ACTIVE_LEVELSITE->CssStyle = "";
		$this->C_ACTIVE_LEVELSITE->CssClass = "";
		$this->C_ACTIVE_LEVELSITE->ViewCustomAttributes = "";

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->ViewValue = $this->C_TIME_ACTIVE->CurrentValue;
		$this->C_TIME_ACTIVE->ViewValue = ew_FormatDateTime($this->C_TIME_ACTIVE->ViewValue, 7);
		$this->C_TIME_ACTIVE->CssStyle = "";
		$this->C_TIME_ACTIVE->CssClass = "";
		$this->C_TIME_ACTIVE->ViewCustomAttributes = "";

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

		// C_EVENT_NAME
		$this->C_EVENT_NAME->HrefValue = "";
		$this->C_EVENT_NAME->TooltipValue = "";

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT->HrefValue = "";
		$this->C_TYPE_EVENT->TooltipValue = "";

		// C_URL_IMAGES
		$this->C_URL_IMAGES->HrefValue = "";
		$this->C_URL_IMAGES->TooltipValue = "";

		// C_URL_LINK
		$this->C_URL_LINK->HrefValue = "";
		$this->C_URL_LINK->TooltipValue = "";

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN->HrefValue = "";
		$this->C_DATETIME_BEGIN->TooltipValue = "";

		// C_DATETIME_END
		$this->C_DATETIME_END->HrefValue = "";
		$this->C_DATETIME_END->TooltipValue = "";

		// C_ORDER
		$this->C_ORDER->HrefValue = "";
		$this->C_ORDER->TooltipValue = "";

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE->HrefValue = "";
		$this->C_ACTIVE_LEVELSITE->TooltipValue = "";

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->HrefValue = "";
		$this->C_TIME_ACTIVE->TooltipValue = "";

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
