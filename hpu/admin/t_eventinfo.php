<?php

// Global variable for table object
$t_event = NULL;

//
// Table class for t_event
//
class ct_event {
	var $TableVar = 't_event';
	var $TableName = 't_event';
	var $TableType = 'TABLE';
	var $C_EVENT_ID;
	var $FK_CONGTY_ID;
	var $C_EVENT_NAME;
	var $C_TYPE_EVENT;
	var $C_POST;
	var $C_URL_IMAGES;
	var $C_URL_LINK;
	var $C_DATETIME_BEGIN;
	var $C_DATETIME_END;
	var $C_ODER;
	var $C_NOTE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $C_ACTIVE_LEVELSITE;
	var $C_TIME_ACTIVE;
	var $C_SEND_MAIL;
	var $C_CONTENT_MAIL;
	var $C_FK_BROWSE;
	var $FK_ARRAY_TINBAI;
	var $FK_ARRAY_CONGTY;
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
	function ct_event() {
		global $Language;

		// C_EVENT_ID
		$this->C_EVENT_ID = new cField('t_event', 't_event', 'x_C_EVENT_ID', 'C_EVENT_ID', '`C_EVENT_ID`', 3, -1, FALSE, '`C_EVENT_ID`', FALSE);
		$this->C_EVENT_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_EVENT_ID'] =& $this->C_EVENT_ID;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_event', 't_event', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', '`FK_CONGTY_ID`', 3, -1, FALSE, '`FK_CONGTY_ID`', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// C_EVENT_NAME
		$this->C_EVENT_NAME = new cField('t_event', 't_event', 'x_C_EVENT_NAME', 'C_EVENT_NAME', '`C_EVENT_NAME`', 201, -1, FALSE, '`C_EVENT_NAME`', FALSE);
		$this->fields['C_EVENT_NAME'] =& $this->C_EVENT_NAME;

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT = new cField('t_event', 't_event', 'x_C_TYPE_EVENT', 'C_TYPE_EVENT', '`C_TYPE_EVENT`', 3, -1, FALSE, '`C_TYPE_EVENT`', FALSE);
		$this->C_TYPE_EVENT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_TYPE_EVENT'] =& $this->C_TYPE_EVENT;

		// C_POST
		$this->C_POST = new cField('t_event', 't_event', 'x_C_POST', 'C_POST', '`C_POST`', 3, -1, FALSE, '`C_POST`', FALSE);
		$this->C_POST->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_POST'] =& $this->C_POST;

		// C_URL_IMAGES
		$this->C_URL_IMAGES = new cField('t_event', 't_event', 'x_C_URL_IMAGES', 'C_URL_IMAGES', '`C_URL_IMAGES`', 201, -1, FALSE, '`C_URL_IMAGES`', FALSE);
		$this->fields['C_URL_IMAGES'] =& $this->C_URL_IMAGES;

		// C_URL_LINK
		$this->C_URL_LINK = new cField('t_event', 't_event', 'x_C_URL_LINK', 'C_URL_LINK', '`C_URL_LINK`', 201, -1, FALSE, '`C_URL_LINK`', FALSE);
		$this->fields['C_URL_LINK'] =& $this->C_URL_LINK;

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN = new cField('t_event', 't_event', 'x_C_DATETIME_BEGIN', 'C_DATETIME_BEGIN', '`C_DATETIME_BEGIN`', 135, 7, FALSE, '`C_DATETIME_BEGIN`', FALSE);
		$this->C_DATETIME_BEGIN->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_BEGIN'] =& $this->C_DATETIME_BEGIN;

		// C_DATETIME_END
		$this->C_DATETIME_END = new cField('t_event', 't_event', 'x_C_DATETIME_END', 'C_DATETIME_END', '`C_DATETIME_END`', 135, 7, FALSE, '`C_DATETIME_END`', FALSE);
		$this->C_DATETIME_END->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_DATETIME_END'] =& $this->C_DATETIME_END;

		// C_ODER
		$this->C_ODER = new cField('t_event', 't_event', 'x_C_ODER', 'C_ODER', '`C_ODER`', 135, 7, FALSE, '`C_ODER`', FALSE);
		$this->C_ODER->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ODER'] =& $this->C_ODER;

		// C_NOTE
		$this->C_NOTE = new cField('t_event', 't_event', 'x_C_NOTE', 'C_NOTE', '`C_NOTE`', 201, -1, FALSE, '`C_NOTE`', FALSE);
		$this->fields['C_NOTE'] =& $this->C_NOTE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_event', 't_event', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_event', 't_event', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_event', 't_event', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_event', 't_event', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE = new cField('t_event', 't_event', 'x_C_ACTIVE_LEVELSITE', 'C_ACTIVE_LEVELSITE', '`C_ACTIVE_LEVELSITE`', 3, -1, FALSE, '`C_ACTIVE_LEVELSITE`', FALSE);
		$this->C_ACTIVE_LEVELSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE_LEVELSITE'] =& $this->C_ACTIVE_LEVELSITE;

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE = new cField('t_event', 't_event', 'x_C_TIME_ACTIVE', 'C_TIME_ACTIVE', '`C_TIME_ACTIVE`', 135, 7, FALSE, '`C_TIME_ACTIVE`', FALSE);
		$this->C_TIME_ACTIVE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVE'] =& $this->C_TIME_ACTIVE;

		// C_SEND_MAIL
		$this->C_SEND_MAIL = new cField('t_event', 't_event', 'x_C_SEND_MAIL', 'C_SEND_MAIL', '`C_SEND_MAIL`', 3, -1, FALSE, '`C_SEND_MAIL`', FALSE);
		$this->C_SEND_MAIL->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_SEND_MAIL'] =& $this->C_SEND_MAIL;

		// C_CONTENT_MAIL
		$this->C_CONTENT_MAIL = new cField('t_event', 't_event', 'x_C_CONTENT_MAIL', 'C_CONTENT_MAIL', '`C_CONTENT_MAIL`', 201, -1, FALSE, '`C_CONTENT_MAIL`', FALSE);
		$this->fields['C_CONTENT_MAIL'] =& $this->C_CONTENT_MAIL;

		// C_FK_BROWSE
		$this->C_FK_BROWSE = new cField('t_event', 't_event', 'x_C_FK_BROWSE', 'C_FK_BROWSE', '`C_FK_BROWSE`', 200, -1, FALSE, '`C_FK_BROWSE`', FALSE);
		$this->fields['C_FK_BROWSE'] =& $this->C_FK_BROWSE;

		// FK_ARRAY_TINBAI
		$this->FK_ARRAY_TINBAI = new cField('t_event', 't_event', 'x_FK_ARRAY_TINBAI', 'FK_ARRAY_TINBAI', '`FK_ARRAY_TINBAI`', 200, -1, FALSE, '`FK_ARRAY_TINBAI`', FALSE);
		$this->fields['FK_ARRAY_TINBAI'] =& $this->FK_ARRAY_TINBAI;

		// FK_ARRAY_CONGTY
		$this->FK_ARRAY_CONGTY = new cField('t_event', 't_event', 'x_FK_ARRAY_CONGTY', 'FK_ARRAY_CONGTY', '`FK_ARRAY_CONGTY`', 200, -1, FALSE, '`FK_ARRAY_CONGTY`', FALSE);
		$this->fields['FK_ARRAY_CONGTY'] =& $this->FK_ARRAY_CONGTY;
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
		return "t_event_Highlight";
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
	// return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
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
		return "`t_event`";
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
                  if (($Security->CurrentUserLevelID() == 12) || ($Security->CurrentUserLevelID() == 10)) $sWhere = "t_event.FK_CONGTY_ID = ".$Security->CurrentUserOption()." AND t_event.C_USER_ADD = ".$Security->CurrentUserID();
                  else $sWhere = "t_event.FK_CONGTY_ID = ".$Security->CurrentUserOption();
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
		return "C_ODER DESC";
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
		return "INSERT INTO `t_event` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_event` SET ";
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
		$SQL = "DELETE FROM `t_event` WHERE ";
		$SQL .= ew_QuotedName('C_EVENT_ID') . '=' . ew_QuotedValue($rs['C_EVENT_ID'], $this->C_EVENT_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`C_EVENT_ID` = @C_EVENT_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->C_EVENT_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@C_EVENT_ID@", ew_AdjustSql($this->C_EVENT_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_eventlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_eventlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_eventview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_eventadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_eventedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_eventadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_eventdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->C_EVENT_ID->CurrentValue)) {
			$sUrl .= "C_EVENT_ID=" . urlencode($this->C_EVENT_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_event" : "";
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
		$this->C_EVENT_ID->setDbValue($rs->fields('C_EVENT_ID'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->C_EVENT_NAME->setDbValue($rs->fields('C_EVENT_NAME'));
		$this->C_TYPE_EVENT->setDbValue($rs->fields('C_TYPE_EVENT'));
		$this->C_POST->setDbValue($rs->fields('C_POST'));
		$this->C_URL_IMAGES->setDbValue($rs->fields('C_URL_IMAGES'));
		$this->C_URL_LINK->setDbValue($rs->fields('C_URL_LINK'));
		$this->C_DATETIME_BEGIN->setDbValue($rs->fields('C_DATETIME_BEGIN'));
		$this->C_DATETIME_END->setDbValue($rs->fields('C_DATETIME_END'));
		$this->C_ODER->setDbValue($rs->fields('C_ODER'));
		$this->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->C_ACTIVE_LEVELSITE->setDbValue($rs->fields('C_ACTIVE_LEVELSITE'));
		$this->C_TIME_ACTIVE->setDbValue($rs->fields('C_TIME_ACTIVE'));
		$this->C_SEND_MAIL->setDbValue($rs->fields('C_SEND_MAIL'));
		$this->C_CONTENT_MAIL->setDbValue($rs->fields('C_CONTENT_MAIL'));
		$this->C_FK_BROWSE->setDbValue($rs->fields('C_FK_BROWSE'));
		$this->FK_ARRAY_TINBAI->setDbValue($rs->fields('FK_ARRAY_TINBAI'));
		$this->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// C_EVENT_ID

		$this->C_EVENT_ID->CellCssStyle = ""; $this->C_EVENT_ID->CellCssClass = "";
		$this->C_EVENT_ID->CellAttrs = array(); $this->C_EVENT_ID->ViewAttrs = array(); $this->C_EVENT_ID->EditAttrs = array();

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->CellCssStyle = ""; $this->FK_CONGTY_ID->CellCssClass = "";
		$this->FK_CONGTY_ID->CellAttrs = array(); $this->FK_CONGTY_ID->ViewAttrs = array(); $this->FK_CONGTY_ID->EditAttrs = array();

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT->CellCssStyle = ""; $this->C_TYPE_EVENT->CellCssClass = "";
		$this->C_TYPE_EVENT->CellAttrs = array(); $this->C_TYPE_EVENT->ViewAttrs = array(); $this->C_TYPE_EVENT->EditAttrs = array();

		// C_POST
		$this->C_POST->CellCssStyle = ""; $this->C_POST->CellCssClass = "";
		$this->C_POST->CellAttrs = array(); $this->C_POST->ViewAttrs = array(); $this->C_POST->EditAttrs = array();

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN->CellCssStyle = ""; $this->C_DATETIME_BEGIN->CellCssClass = "";
		$this->C_DATETIME_BEGIN->CellAttrs = array(); $this->C_DATETIME_BEGIN->ViewAttrs = array(); $this->C_DATETIME_BEGIN->EditAttrs = array();

		// C_DATETIME_END
		$this->C_DATETIME_END->CellCssStyle = ""; $this->C_DATETIME_END->CellCssClass = "";
		$this->C_DATETIME_END->CellAttrs = array(); $this->C_DATETIME_END->ViewAttrs = array(); $this->C_DATETIME_END->EditAttrs = array();

		// C_ODER
		$this->C_ODER->CellCssStyle = ""; $this->C_ODER->CellCssClass = "";
		$this->C_ODER->CellAttrs = array(); $this->C_ODER->ViewAttrs = array(); $this->C_ODER->EditAttrs = array();

		// C_USER_ADD
		$this->C_USER_ADD->CellCssStyle = ""; $this->C_USER_ADD->CellCssClass = "";
		$this->C_USER_ADD->CellAttrs = array(); $this->C_USER_ADD->ViewAttrs = array(); $this->C_USER_ADD->EditAttrs = array();

		// C_ADD_TIME
		$this->C_ADD_TIME->CellCssStyle = ""; $this->C_ADD_TIME->CellCssClass = "";
		$this->C_ADD_TIME->CellAttrs = array(); $this->C_ADD_TIME->ViewAttrs = array(); $this->C_ADD_TIME->EditAttrs = array();

		// C_USER_EDIT
		$this->C_USER_EDIT->CellCssStyle = ""; $this->C_USER_EDIT->CellCssClass = "";
		$this->C_USER_EDIT->CellAttrs = array(); $this->C_USER_EDIT->ViewAttrs = array(); $this->C_USER_EDIT->EditAttrs = array();

		// C_EDIT_TIME
		$this->C_EDIT_TIME->CellCssStyle = ""; $this->C_EDIT_TIME->CellCssClass = "";
		$this->C_EDIT_TIME->CellAttrs = array(); $this->C_EDIT_TIME->ViewAttrs = array(); $this->C_EDIT_TIME->EditAttrs = array();

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE->CellCssStyle = ""; $this->C_ACTIVE_LEVELSITE->CellCssClass = "";
		$this->C_ACTIVE_LEVELSITE->CellAttrs = array(); $this->C_ACTIVE_LEVELSITE->ViewAttrs = array(); $this->C_ACTIVE_LEVELSITE->EditAttrs = array();

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->CellCssStyle = ""; $this->C_TIME_ACTIVE->CellCssClass = "";
		$this->C_TIME_ACTIVE->CellAttrs = array(); $this->C_TIME_ACTIVE->ViewAttrs = array(); $this->C_TIME_ACTIVE->EditAttrs = array();

		// C_SEND_MAIL
		$this->C_SEND_MAIL->CellCssStyle = ""; $this->C_SEND_MAIL->CellCssClass = "";
		$this->C_SEND_MAIL->CellAttrs = array(); $this->C_SEND_MAIL->ViewAttrs = array(); $this->C_SEND_MAIL->EditAttrs = array();

		// C_FK_BROWSE
		$this->C_FK_BROWSE->CellCssStyle = ""; $this->C_FK_BROWSE->CellCssClass = "";
		$this->C_FK_BROWSE->CellAttrs = array(); $this->C_FK_BROWSE->ViewAttrs = array(); $this->C_FK_BROWSE->EditAttrs = array();

		// FK_ARRAY_TINBAI
		$this->FK_ARRAY_TINBAI->CellCssStyle = ""; $this->FK_ARRAY_TINBAI->CellCssClass = "";
		$this->FK_ARRAY_TINBAI->CellAttrs = array(); $this->FK_ARRAY_TINBAI->ViewAttrs = array(); $this->FK_ARRAY_TINBAI->EditAttrs = array();

		// FK_ARRAY_CONGTY
		$this->FK_ARRAY_CONGTY->CellCssStyle = ""; $this->FK_ARRAY_CONGTY->CellCssClass = "";
		$this->FK_ARRAY_CONGTY->CellAttrs = array(); $this->FK_ARRAY_CONGTY->ViewAttrs = array(); $this->FK_ARRAY_CONGTY->EditAttrs = array();

		// C_EVENT_ID
		$this->C_EVENT_ID->ViewValue = $this->C_EVENT_ID->CurrentValue;
		$this->C_EVENT_ID->CssStyle = "";
		$this->C_EVENT_ID->CssClass = "";
		$this->C_EVENT_ID->ViewCustomAttributes = "";

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

		// C_TYPE_EVENT
		if (strval($this->C_TYPE_EVENT->CurrentValue) <> "") {
			switch ($this->C_TYPE_EVENT->CurrentValue) {
				case "1":
					$this->C_TYPE_EVENT->ViewValue = "Loai Popup";
					break;
				case "2":
					$this->C_TYPE_EVENT->ViewValue = "Loai su kien theo bai viet";
					break;
				case "3":
					$this->C_TYPE_EVENT->ViewValue = "Loai su kien lien ket";
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

		// C_POST
		if (strval($this->C_POST->CurrentValue) <> "") {
			switch ($this->C_POST->CurrentValue) {
				case "1":
					$this->C_POST->ViewValue = "trang chu";
					break;
				case "2":
					$this->C_POST->ViewValue = "trang tuyen sinh";
					break;
				case "":
					$this->C_POST->ViewValue = "";
					break;
				default:
					$this->C_POST->ViewValue = $this->C_POST->CurrentValue;
			}
		} else {
			$this->C_POST->ViewValue = NULL;
		}
		$this->C_POST->CssStyle = "";
		$this->C_POST->CssClass = "";
		$this->C_POST->ViewCustomAttributes = "";

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

		// C_ODER
		$this->C_ODER->ViewValue = $this->C_ODER->CurrentValue;
		$this->C_ODER->ViewValue = ew_FormatDateTime($this->C_ODER->ViewValue, 7);
		$this->C_ODER->CssStyle = "";
		$this->C_ODER->CssClass = "";
		$this->C_ODER->ViewCustomAttributes = "";

		// C_USER_ADD
		$this->C_USER_ADD->ViewValue = $this->C_USER_ADD->CurrentValue;
		$this->C_USER_ADD->CssStyle = "";
		$this->C_USER_ADD->CssClass = "";
		$this->C_USER_ADD->ViewCustomAttributes = "";

		// C_ADD_TIME
		$this->C_ADD_TIME->ViewValue = $this->C_ADD_TIME->CurrentValue;
		$this->C_ADD_TIME->ViewValue = ew_FormatDateTime($this->C_ADD_TIME->ViewValue, 7);
		$this->C_ADD_TIME->CssStyle = "";
		$this->C_ADD_TIME->CssClass = "";
		$this->C_ADD_TIME->ViewCustomAttributes = "";

		// C_USER_EDIT
		$this->C_USER_EDIT->ViewValue = $this->C_USER_EDIT->CurrentValue;
		$this->C_USER_EDIT->CssStyle = "";
		$this->C_USER_EDIT->CssClass = "";
		$this->C_USER_EDIT->ViewCustomAttributes = "";

		// C_EDIT_TIME
		$this->C_EDIT_TIME->ViewValue = $this->C_EDIT_TIME->CurrentValue;
		$this->C_EDIT_TIME->ViewValue = ew_FormatDateTime($this->C_EDIT_TIME->ViewValue, 7);
		$this->C_EDIT_TIME->CssStyle = "";
		$this->C_EDIT_TIME->CssClass = "";
		$this->C_EDIT_TIME->ViewCustomAttributes = "";

		// C_ACTIVE_LEVELSITE
		if (strval($this->C_ACTIVE_LEVELSITE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE_LEVELSITE->CurrentValue) {
				case "0":
					$this->C_ACTIVE_LEVELSITE->ViewValue = "khong kich hoat";
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

		// C_SEND_MAIL
		if (strval($this->C_SEND_MAIL->CurrentValue) <> "") {
			switch ($this->C_SEND_MAIL->CurrentValue) {
				case "0":
					$this->C_SEND_MAIL->ViewValue = "khong gui mail";
					break;
				case "1":
					$this->C_SEND_MAIL->ViewValue = "gui mail";
					break;
				default:
					$this->C_SEND_MAIL->ViewValue = $this->C_SEND_MAIL->CurrentValue;
			}
		} else {
			$this->C_SEND_MAIL->ViewValue = NULL;
		}
		$this->C_SEND_MAIL->CssStyle = "";
		$this->C_SEND_MAIL->CssClass = "";
		$this->C_SEND_MAIL->ViewCustomAttributes = "";

		// C_FK_BROWSE
		if (strval($this->C_FK_BROWSE->CurrentValue) <> "") {
			$arwrk = explode(",", $this->C_FK_BROWSE->CurrentValue);
			$sFilterWrk = "";
			foreach ($arwrk as $wrk) {
				if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
				$sFilterWrk .= "`C_HOTEN` = '" . ew_AdjustSql(trim($wrk)) . "'";
			}	
		$sSqlWrk = "SELECT `C_EMAIL` FROM `t_nguoidung`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->C_FK_BROWSE->ViewValue = "";
				$ari = 0;
				while (!$rswrk->EOF) {
					$this->C_FK_BROWSE->ViewValue .= $rswrk->fields('C_EMAIL');
					$rswrk->MoveNext();
					if (!$rswrk->EOF) $this->C_FK_BROWSE->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
					$ari++;
				}
				$rswrk->Close();
			} else {
				$this->C_FK_BROWSE->ViewValue = $this->C_FK_BROWSE->CurrentValue;
			}
		} else {
			$this->C_FK_BROWSE->ViewValue = NULL;
		}
		$this->C_FK_BROWSE->CssStyle = "";
		$this->C_FK_BROWSE->CssClass = "";
		$this->C_FK_BROWSE->ViewCustomAttributes = "";

		// FK_ARRAY_TINBAI
		if (strval($this->FK_ARRAY_TINBAI->CurrentValue) <> "") {
			$arwrk = explode(",", $this->FK_ARRAY_TINBAI->CurrentValue);
			$sFilterWrk = "";
			foreach ($arwrk as $wrk) {
				if ($sFilterWrk <> "") $sFilterWrk .= " OR ";
				$sFilterWrk .= "`PK_TINBAI_ID` = " . ew_AdjustSql(trim($wrk)) . "";
			}	
		$sSqlWrk = "SELECT `C_TITLE` FROM `t_tinbai_levelsite`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_ARRAY_TINBAI->ViewValue = "";
				$ari = 0;
				while (!$rswrk->EOF) {
					$this->FK_ARRAY_TINBAI->ViewValue .= $rswrk->fields('C_TITLE');
					$rswrk->MoveNext();
					if (!$rswrk->EOF) $this->FK_ARRAY_TINBAI->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
					$ari++;
				}
				$rswrk->Close();
			} else {
				$this->FK_ARRAY_TINBAI->ViewValue = $this->FK_ARRAY_TINBAI->CurrentValue;
			}
		} else {
			$this->FK_ARRAY_TINBAI->ViewValue = NULL;
		}
		$this->FK_ARRAY_TINBAI->CssStyle = "";
		$this->FK_ARRAY_TINBAI->CssClass = "";
		$this->FK_ARRAY_TINBAI->ViewCustomAttributes = "";

		// FK_ARRAY_CONGTY
		if (strval($this->FK_ARRAY_CONGTY->CurrentValue) <> "") {
			$arwrk = explode(",", $this->FK_ARRAY_CONGTY->CurrentValue);
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
				$this->FK_ARRAY_CONGTY->ViewValue = "";
				$ari = 0;
				while (!$rswrk->EOF) {
					$this->FK_ARRAY_CONGTY->ViewValue .= $rswrk->fields('C_TENCONGTY');
					$rswrk->MoveNext();
					if (!$rswrk->EOF) $this->FK_ARRAY_CONGTY->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
					$ari++;
				}
				$rswrk->Close();
			} else {
				$this->FK_ARRAY_CONGTY->ViewValue = $this->FK_ARRAY_CONGTY->CurrentValue;
			}
		} else {
			$this->FK_ARRAY_CONGTY->ViewValue = NULL;
		}
		$this->FK_ARRAY_CONGTY->CssStyle = "";
		$this->FK_ARRAY_CONGTY->CssClass = "";
		$this->FK_ARRAY_CONGTY->ViewCustomAttributes = "";

		// C_EVENT_ID
		$this->C_EVENT_ID->HrefValue = "";
		$this->C_EVENT_ID->TooltipValue = "";

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->HrefValue = "";
		$this->FK_CONGTY_ID->TooltipValue = "";

		// C_TYPE_EVENT
		$this->C_TYPE_EVENT->HrefValue = "";
		$this->C_TYPE_EVENT->TooltipValue = "";

		// C_POST
		$this->C_POST->HrefValue = "";
		$this->C_POST->TooltipValue = "";

		// C_DATETIME_BEGIN
		$this->C_DATETIME_BEGIN->HrefValue = "";
		$this->C_DATETIME_BEGIN->TooltipValue = "";

		// C_DATETIME_END
		$this->C_DATETIME_END->HrefValue = "";
		$this->C_DATETIME_END->TooltipValue = "";

		// C_ODER
		$this->C_ODER->HrefValue = "";
		$this->C_ODER->TooltipValue = "";

		// C_USER_ADD
		$this->C_USER_ADD->HrefValue = "";
		$this->C_USER_ADD->TooltipValue = "";

		// C_ADD_TIME
		$this->C_ADD_TIME->HrefValue = "";
		$this->C_ADD_TIME->TooltipValue = "";

		// C_USER_EDIT
		$this->C_USER_EDIT->HrefValue = "";
		$this->C_USER_EDIT->TooltipValue = "";

		// C_EDIT_TIME
		$this->C_EDIT_TIME->HrefValue = "";
		$this->C_EDIT_TIME->TooltipValue = "";

		// C_ACTIVE_LEVELSITE
		$this->C_ACTIVE_LEVELSITE->HrefValue = "";
		$this->C_ACTIVE_LEVELSITE->TooltipValue = "";

		// C_TIME_ACTIVE
		$this->C_TIME_ACTIVE->HrefValue = "";
		$this->C_TIME_ACTIVE->TooltipValue = "";

		// C_SEND_MAIL
		$this->C_SEND_MAIL->HrefValue = "";
		$this->C_SEND_MAIL->TooltipValue = "";

		// C_FK_BROWSE
		$this->C_FK_BROWSE->HrefValue = "";
		$this->C_FK_BROWSE->TooltipValue = "";

		// FK_ARRAY_TINBAI
		$this->FK_ARRAY_TINBAI->HrefValue = "";
		$this->FK_ARRAY_TINBAI->TooltipValue = "";

		// FK_ARRAY_CONGTY
		$this->FK_ARRAY_CONGTY->HrefValue = "";
		$this->FK_ARRAY_CONGTY->TooltipValue = "";

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
