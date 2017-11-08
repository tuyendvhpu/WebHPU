<?php

// Global variable for table object
$t_thongbao_mainsite = NULL;

//
// Table class for t_thongbao_mainsite
//
class ct_thongbao_mainsite {
	var $TableVar = 't_thongbao_mainsite';
	var $TableName = 't_thongbao_mainsite';
	var $TableType = 'TABLE';
	var $PK_THONGBAO;
	var $FK_CONGTY_ID;
	var $C_TITLE;
	var $C_CONTENT;
	var $C_PUBLISH;
	var $C_ACTIVE;
	var $C_ORDER;
	var $C_BEGIN_DATE;
	var $C_END_DATE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $FK_NGUOIDUNG_ID;
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
	function ct_thongbao_mainsite() {
		global $Language;

		// PK_THONGBAO
		$this->PK_THONGBAO = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_PK_THONGBAO', 'PK_THONGBAO', '`PK_THONGBAO`', 3, -1, FALSE, '`PK_THONGBAO`', FALSE);
		$this->PK_THONGBAO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_THONGBAO'] =& $this->PK_THONGBAO;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', '`FK_CONGTY_ID`', 3, -1, FALSE, '`FK_CONGTY_ID`', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// C_TITLE
		$this->C_TITLE = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_TITLE', 'C_TITLE', '`C_TITLE`', 200, -1, FALSE, '`C_TITLE`', FALSE);
		$this->fields['C_TITLE'] =& $this->C_TITLE;

		// C_CONTENT
		$this->C_CONTENT = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_CONTENT', 'C_CONTENT', '`C_CONTENT`', 201, -1, FALSE, '`C_CONTENT`', FALSE);
		$this->C_CONTENT->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENT'] =& $this->C_CONTENT;

		// C_PUBLISH
		$this->C_PUBLISH = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_PUBLISH', 'C_PUBLISH', '`C_PUBLISH`', 3, -1, FALSE, '`C_PUBLISH`', FALSE);
		$this->C_PUBLISH->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PUBLISH'] =& $this->C_PUBLISH;

		// C_ACTIVE
		$this->C_ACTIVE = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_ACTIVE', 'C_ACTIVE', '`C_ACTIVE`', 3, -1, FALSE, '`C_ACTIVE`', FALSE);
		$this->C_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE'] =& $this->C_ACTIVE;

		// C_ORDER
		$this->C_ORDER = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_ORDER', 'C_ORDER', '`C_ORDER`', 135, 7, FALSE, '`C_ORDER`', FALSE);
		$this->C_ORDER->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER'] =& $this->C_ORDER;

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_BEGIN_DATE', 'C_BEGIN_DATE', '`C_BEGIN_DATE`', 135, 7, FALSE, '`C_BEGIN_DATE`', FALSE);
		$this->C_BEGIN_DATE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_BEGIN_DATE'] =& $this->C_BEGIN_DATE;

		// C_END_DATE
		$this->C_END_DATE = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_END_DATE', 'C_END_DATE', '`C_END_DATE`', 135, 7, FALSE, '`C_END_DATE`', FALSE);
		$this->C_END_DATE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_END_DATE'] =& $this->C_END_DATE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID = new cField('t_thongbao_mainsite', 't_thongbao_mainsite', 'x_FK_NGUOIDUNG_ID', 'FK_NGUOIDUNG_ID', '`FK_NGUOIDUNG_ID`', 3, -1, FALSE, '`FK_NGUOIDUNG_ID`', FALSE);
		$this->FK_NGUOIDUNG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_NGUOIDUNG_ID'] =& $this->FK_NGUOIDUNG_ID;
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
		return "t_thongbao_mainsite_Highlight";
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
		return "`t_thongbao_mainsite`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		 global $Security;
		$sWhere = "";
                  if (IsAdmin()) $sWhere ="";
                  else $sWhere = "t_thongbao_mainsite.FK_CONGTY_ID = ".$Security->CurrentUserOption();
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
		return "INSERT INTO `t_thongbao_mainsite` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_thongbao_mainsite` SET ";
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
		$SQL = "DELETE FROM `t_thongbao_mainsite` WHERE ";
		$SQL .= ew_QuotedName('PK_THONGBAO') . '=' . ew_QuotedValue($rs['PK_THONGBAO'], $this->PK_THONGBAO->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_THONGBAO` = @PK_THONGBAO@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_THONGBAO->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_THONGBAO@", ew_AdjustSql($this->PK_THONGBAO->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_thongbao_mainsitelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_thongbao_mainsitelist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_thongbao_mainsiteview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_thongbao_mainsiteadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_thongbao_mainsiteedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_thongbao_mainsiteadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_thongbao_mainsitedelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_THONGBAO->CurrentValue)) {
			$sUrl .= "PK_THONGBAO=" . urlencode($this->PK_THONGBAO->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_thongbao_mainsite" : "";
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
		$this->PK_THONGBAO->setDbValue($rs->fields('PK_THONGBAO'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$this->C_CONTENT->setDbValue($rs->fields('C_CONTENT'));
		$this->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$this->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$this->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$this->C_BEGIN_DATE->setDbValue($rs->fields('C_BEGIN_DATE'));
		$this->C_END_DATE->setDbValue($rs->fields('C_END_DATE'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
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

		// C_TITLE
		$this->C_TITLE->CellCssStyle = ""; $this->C_TITLE->CellCssClass = "";
		$this->C_TITLE->CellAttrs = array(); $this->C_TITLE->ViewAttrs = array(); $this->C_TITLE->EditAttrs = array();

		// C_PUBLISH
		$this->C_PUBLISH->CellCssStyle = ""; $this->C_PUBLISH->CellCssClass = "";
		$this->C_PUBLISH->CellAttrs = array(); $this->C_PUBLISH->ViewAttrs = array(); $this->C_PUBLISH->EditAttrs = array();

		// C_ACTIVE
		$this->C_ACTIVE->CellCssStyle = ""; $this->C_ACTIVE->CellCssClass = "";
		$this->C_ACTIVE->CellAttrs = array(); $this->C_ACTIVE->ViewAttrs = array(); $this->C_ACTIVE->EditAttrs = array();

		// C_ORDER
		$this->C_ORDER->CellCssStyle = ""; $this->C_ORDER->CellCssClass = "";
		$this->C_ORDER->CellAttrs = array(); $this->C_ORDER->ViewAttrs = array(); $this->C_ORDER->EditAttrs = array();

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->CellCssStyle = ""; $this->C_BEGIN_DATE->CellCssClass = "";
		$this->C_BEGIN_DATE->CellAttrs = array(); $this->C_BEGIN_DATE->ViewAttrs = array(); $this->C_BEGIN_DATE->EditAttrs = array();

		// C_END_DATE
		$this->C_END_DATE->CellCssStyle = ""; $this->C_END_DATE->CellCssClass = "";
		$this->C_END_DATE->CellAttrs = array(); $this->C_END_DATE->ViewAttrs = array(); $this->C_END_DATE->EditAttrs = array();

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

		// C_TITLE
		$this->C_TITLE->ViewValue = $this->C_TITLE->CurrentValue;
		$this->C_TITLE->CssStyle = "";
		$this->C_TITLE->CssClass = "";
		$this->C_TITLE->ViewCustomAttributes = "";

		// C_PUBLISH
		if (strval($this->C_PUBLISH->CurrentValue) <> "") {
			switch ($this->C_PUBLISH->CurrentValue) {
				case "0":
					$this->C_PUBLISH->ViewValue = "Khong active len levelsite";
					break;
				case "1":
					$this->C_PUBLISH->ViewValue = "Active len levelsite";
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

		// C_ACTIVE
		if (strval($this->C_ACTIVE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE->CurrentValue) {
				case "0":
					$this->C_ACTIVE->ViewValue = "Khong active len mainsite";
					break;
				case "1":
					$this->C_ACTIVE->ViewValue = "Active len mainsite";
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

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->ViewValue = $this->C_BEGIN_DATE->CurrentValue;
		$this->C_BEGIN_DATE->ViewValue = ew_FormatDateTime($this->C_BEGIN_DATE->ViewValue, 7);
		$this->C_BEGIN_DATE->CssStyle = "";
		$this->C_BEGIN_DATE->CssClass = "";
		$this->C_BEGIN_DATE->ViewCustomAttributes = "";

		// C_END_DATE
		$this->C_END_DATE->ViewValue = $this->C_END_DATE->CurrentValue;
		$this->C_END_DATE->ViewValue = ew_FormatDateTime($this->C_END_DATE->ViewValue, 7);
		$this->C_END_DATE->CssStyle = "";
		$this->C_END_DATE->CssClass = "";
		$this->C_END_DATE->ViewCustomAttributes = "";

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->HrefValue = "";
		$this->FK_CONGTY_ID->TooltipValue = "";

		// C_TITLE
		$this->C_TITLE->HrefValue = "";
		$this->C_TITLE->TooltipValue = "";

		// C_PUBLISH
		$this->C_PUBLISH->HrefValue = "";
		$this->C_PUBLISH->TooltipValue = "";

		// C_ACTIVE
		$this->C_ACTIVE->HrefValue = "";
		$this->C_ACTIVE->TooltipValue = "";

		// C_ORDER
		$this->C_ORDER->HrefValue = "";
		$this->C_ORDER->TooltipValue = "";

		// C_BEGIN_DATE
		$this->C_BEGIN_DATE->HrefValue = "";
		$this->C_BEGIN_DATE->TooltipValue = "";

		// C_END_DATE
		$this->C_END_DATE->HrefValue = "";
		$this->C_END_DATE->TooltipValue = "";

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
