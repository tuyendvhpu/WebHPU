<?php

// Global variable for table object
$t_ghichu_lich = NULL;

//
// Table class for t_ghichu_lich
//
class ct_ghichu_lich {
	var $TableVar = 't_ghichu_lich';
	var $TableName = 't_ghichu_lich';
	var $TableType = 'TABLE';
	var $SB_NOTE_ID;
	var $FK_CONG_TY;
	var $C_YEAR;
	var $C_WEEK;
	var $C_CONTENT;
	var $C_USER_ADD;
	var $C_TIME_ADD;
	var $C_USER_EDIT;
	var $C_TIME_EDIT;
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
	function ct_ghichu_lich() {
		global $Language;

		// SB_NOTE_ID
		$this->SB_NOTE_ID = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_SB_NOTE_ID', 'SB_NOTE_ID', '`SB_NOTE_ID`', 3, -1, FALSE, '`SB_NOTE_ID`', FALSE);
		$this->SB_NOTE_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['SB_NOTE_ID'] =& $this->SB_NOTE_ID;

		// FK_CONGTY
		$this->FK_CONG_TY = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_FK_CONG_TY', 'FK_CONGTY', '`FK_CONGTY`', 3, -1, FALSE, '`FK_CONGTY`', FALSE);
		$this->FK_CONG_TY->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY'] =& $this->FK_CONG_TY;

		// C_YEAR
		$this->C_YEAR = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_YEAR', 'C_YEAR', '`C_YEAR`', 200, -1, FALSE, '`C_YEAR`', FALSE);
		$this->fields['C_YEAR'] =& $this->C_YEAR;

		// C_WEEK
		$this->C_WEEK = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_WEEK', 'C_WEEK', '`C_WEEK`', 3, -1, FALSE, '`C_WEEK`', FALSE);
		$this->C_WEEK->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_WEEK'] =& $this->C_WEEK;

		// C_CONTENT
		$this->C_CONTENT = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_CONTENT', 'C_CONTENT', '`C_CONTENT`', 201, -1, FALSE, '`C_CONTENT`', FALSE);
		$this->C_CONTENT->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENT'] =& $this->C_CONTENT;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_TIME_ADD
		$this->C_TIME_ADD = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_TIME_ADD', 'C_TIME_ADD', '`C_TIME_ADD`', 135, 7, FALSE, '`C_TIME_ADD`', FALSE);
		$this->C_TIME_ADD->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ADD'] =& $this->C_TIME_ADD;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_TIME_EDIT
		$this->C_TIME_EDIT = new cField('t_ghichu_lich', 't_ghichu_lich', 'x_C_TIME_EDIT', 'C_TIME_EDIT', '`C_TIME_EDIT`', 135, 7, FALSE, '`C_TIME_EDIT`', FALSE);
		$this->C_TIME_EDIT->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_EDIT'] =& $this->C_TIME_EDIT;
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
		return "t_ghichu_lich_Highlight";
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
		return "`t_ghichu_lich`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
              global $Security;
		$sWhere = "";
                 if (IsAdmin()) $sWhere ="";
                 else $sWhere = "t_ghichu_lich.FK_CONGTY = ".$Security->CurrentUserOption();
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
		return "C_WEEK DESC";
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
		return "INSERT INTO `t_ghichu_lich` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_ghichu_lich` SET ";
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
		$SQL = "DELETE FROM `t_ghichu_lich` WHERE ";
		$SQL .= ew_QuotedName('SB_NOTE_ID') . '=' . ew_QuotedValue($rs['SB_NOTE_ID'], $this->SB_NOTE_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`SB_NOTE_ID` = @SB_NOTE_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->SB_NOTE_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@SB_NOTE_ID@", ew_AdjustSql($this->SB_NOTE_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_ghichu_lichlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_ghichu_lichlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_ghichu_lichview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_ghichu_lichadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_ghichu_lichedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_ghichu_lichadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_ghichu_lichdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->SB_NOTE_ID->CurrentValue)) {
			$sUrl .= "SB_NOTE_ID=" . urlencode($this->SB_NOTE_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_ghichu_lich" : "";
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
		$this->SB_NOTE_ID->setDbValue($rs->fields('SB_NOTE_ID'));
		$this->FK_CONG_TY->setDbValue($rs->fields('FK_CONGTY'));
		$this->C_YEAR->setDbValue($rs->fields('C_YEAR'));
		$this->C_WEEK->setDbValue($rs->fields('C_WEEK'));
		$this->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_TIME_ADD->setDbValue($rs->fields('C_TIME_ADD'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_TIME_EDIT->setDbValue($rs->fields('C_TIME_EDIT'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// FK_CONGTY

		$this->FK_CONG_TY->CellCssStyle = ""; $this->FK_CONG_TY->CellCssClass = "";
		$this->FK_CONG_TY->CellAttrs = array(); $this->FK_CONG_TY->ViewAttrs = array(); $this->FK_CONG_TY->EditAttrs = array();

		// C_YEAR
		$this->C_YEAR->CellCssStyle = ""; $this->C_YEAR->CellCssClass = "";
		$this->C_YEAR->CellAttrs = array(); $this->C_YEAR->ViewAttrs = array(); $this->C_YEAR->EditAttrs = array();

		// C_WEEK
		$this->C_WEEK->CellCssStyle = ""; $this->C_WEEK->CellCssClass = "";
		$this->C_WEEK->CellAttrs = array(); $this->C_WEEK->ViewAttrs = array(); $this->C_WEEK->EditAttrs = array();

		// C_CONTENT
		$this->C_CONTENT->CellCssStyle = ""; $this->C_CONTENT->CellCssClass = "";
		$this->C_CONTENT->CellAttrs = array(); $this->C_CONTENT->ViewAttrs = array(); $this->C_CONTENT->EditAttrs = array();

		// FK_CONGTY
		if (strval($this->FK_CONG_TY->CurrentValue) <> "") {
			$sFilterWrk = "`PK_MACONGTY` = " . ew_AdjustSql($this->FK_CONG_TY->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_TENCONGTY` FROM `t_congty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_CONG_TY->ViewValue = $rswrk->fields('C_TENCONGTY');
				$rswrk->Close();
			} else {
				$this->FK_CONG_TY->ViewValue = $this->FK_CONG_TY->CurrentValue;
			}
		} else {
			$this->FK_CONG_TY->ViewValue = NULL;
		}
		$this->FK_CONG_TY->CssStyle = "";
		$this->FK_CONG_TY->CssClass = "";
		$this->FK_CONG_TY->ViewCustomAttributes = "";

		// C_YEAR
		if (strval($this->C_YEAR->CurrentValue) <> "") {
			switch ($this->C_YEAR->CurrentValue) {
				case "0":
					$this->C_YEAR->ViewValue = "2013";
					break;
				case "1":
					$this->C_YEAR->ViewValue = "2014";
					break;
				default:
					$this->C_YEAR->ViewValue = $this->C_YEAR->CurrentValue;
			}
		} else {
			$this->C_YEAR->ViewValue = NULL;
		}
		$this->C_YEAR->CssStyle = "";
		$this->C_YEAR->CssClass = "";
		$this->C_YEAR->ViewCustomAttributes = "";

		// C_WEEK
		if (strval($this->C_WEEK->CurrentValue) <> "") {
			switch ($this->C_WEEK->CurrentValue) {
				case "1":
					$this->C_WEEK->ViewValue = "Tuan 1";
					break;
				default:
					$this->C_WEEK->ViewValue = $this->C_WEEK->CurrentValue;
			}
		} else {
			$this->C_WEEK->ViewValue = NULL;
		}
		$this->C_WEEK->CssStyle = "";
		$this->C_WEEK->CssClass = "";
		$this->C_WEEK->ViewCustomAttributes = "";

		// C_CONTENT
		$this->C_CONTENT->ViewValue = $this->C_CONTENT->CurrentValue;
		$this->C_CONTENT->CssStyle = "";
		$this->C_CONTENT->CssClass = "";
		$this->C_CONTENT->ViewCustomAttributes = "";

		// FK_CONGTY
		$this->FK_CONG_TY->HrefValue = "";
		$this->FK_CONG_TY->TooltipValue = "";

		// C_YEAR
		$this->C_YEAR->HrefValue = "";
		$this->C_YEAR->TooltipValue = "";

		// C_WEEK
		$this->C_WEEK->HrefValue = "";
		$this->C_WEEK->TooltipValue = "";

		// C_CONTENT
		$this->C_CONTENT->HrefValue = "";
		$this->C_CONTENT->TooltipValue = "";

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
