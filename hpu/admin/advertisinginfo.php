<?php

// Global variable for table object
$advertising = NULL;

//
// Table class for advertising
//
class cadvertising {
	var $TableVar = 'advertising';
	var $TableName = 'advertising';
	var $TableType = 'TABLE';
	var $advertising_id;
	var $advertising_desc;
	var $advertising_type;
	var $advertising_pos;
	var $advertising_link;
	var $advertising_url;
	var $advertising_order;
        var $advertising_name;
	var $create_time;
	var $edit_time;
	var $advertising_state;
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
	function cadvertising() {
		global $Language;

		// advertising_id
		$this->advertising_id = new cField('advertising', 'advertising', 'x_advertising_id', 'advertising_id', '`advertising_id`', 19, -1, FALSE, '`advertising_id`', FALSE);
		$this->advertising_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['advertising_id'] =& $this->advertising_id;

		// advertising_desc
		$this->advertising_desc = new cField('advertising', 'advertising', 'x_advertising_desc', 'advertising_desc', '`advertising_desc`', 200, -1, FALSE, '`advertising_desc`', FALSE);
		$this->fields['advertising_desc'] =& $this->advertising_desc;
                
                // advertising_name
		$this->advertising_name = new cField('advertising', 'advertising', 'x_advertising_name', 'advertising_name', '`advertising_name`', 200, -1, FALSE, '`advertising_name`', FALSE);
		$this->fields['advertising_name'] =& $this->advertising_name;

		// advertising_type
		$this->advertising_type = new cField('advertising', 'advertising', 'x_advertising_type', 'advertising_type', '`advertising_type`', 19, -1, FALSE, '`advertising_type`', FALSE);
		$this->advertising_type->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['advertising_type'] =& $this->advertising_type;

		// advertising_pos
		$this->advertising_pos = new cField('advertising', 'advertising', 'x_advertising_pos', 'advertising_pos', '`advertising_pos`', 19, -1, FALSE, '`advertising_pos`', FALSE);
		$this->advertising_pos->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['advertising_pos'] =& $this->advertising_pos;

		// advertising_link
		$this->advertising_link = new cField('advertising', 'advertising', 'x_advertising_link', 'advertising_link', '`advertising_link`', 200, -1, FALSE, '`advertising_link`', FALSE);
		$this->fields['advertising_link'] =& $this->advertising_link;

		// advertising_url
		$this->advertising_url = new cField('advertising', 'advertising', 'x_advertising_url', 'advertising_url', '`advertising_url`', 200, -1, TRUE, '`advertising_url`', FALSE);
		$this->advertising_url->UploadPath = "../upload/ad";
		$this->fields['advertising_url'] =& $this->advertising_url;

		// advertising_order
		$this->advertising_order = new cField('advertising', 'advertising', 'x_advertising_order', 'advertising_order', '`advertising_order`', 5, -1, FALSE, '`advertising_order`', FALSE);
		$this->advertising_order->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['advertising_order'] =& $this->advertising_order;

		// create_time
		$this->create_time = new cField('advertising', 'advertising', 'x_create_time', 'create_time', '`create_time`', 135, 7, FALSE, '`create_time`', FALSE);
		$this->create_time->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['create_time'] =& $this->create_time;

		// edit_time
		$this->edit_time = new cField('advertising', 'advertising', 'x_edit_time', 'edit_time', '`edit_time`', 135, 7, FALSE, '`edit_time`', FALSE);
		$this->edit_time->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['edit_time'] =& $this->edit_time;

		// advertising_state
		$this->advertising_state = new cField('advertising', 'advertising', 'x_advertising_state', 'advertising_state', '`advertising_state`', 19, -1, FALSE, '`advertising_state`', FALSE);
		$this->advertising_state->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['advertising_state'] =& $this->advertising_state;
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
		return "advertising_Highlight";
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
		return "`advertising`";
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
		return "create_time DESC";
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
		return "INSERT INTO `advertising` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `advertising` SET ";
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
		$SQL = "DELETE FROM `advertising` WHERE ";
		$SQL .= ew_QuotedName('advertising_id') . '=' . ew_QuotedValue($rs['advertising_id'], $this->advertising_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`advertising_id` = @advertising_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->advertising_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@advertising_id@", ew_AdjustSql($this->advertising_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "advertisinglist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "advertisinglist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("advertisingview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "advertisingadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("advertisingedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("advertisingadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("advertisingdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->advertising_id->CurrentValue)) {
			$sUrl .= "advertising_id=" . urlencode($this->advertising_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=advertising" : "";
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
		$this->advertising_id->setDbValue($rs->fields('advertising_id'));
		$this->advertising_desc->setDbValue($rs->fields('advertising_desc'));
		$this->advertising_type->setDbValue($rs->fields('advertising_type'));
		$this->advertising_pos->setDbValue($rs->fields('advertising_pos'));
		$this->advertising_link->setDbValue($rs->fields('advertising_link'));
		$this->advertising_url->Upload->DbValue = $rs->fields('advertising_url');
		$this->advertising_order->setDbValue($rs->fields('advertising_order'));
		$this->create_time->setDbValue($rs->fields('create_time'));
		$this->edit_time->setDbValue($rs->fields('edit_time'));
		$this->advertising_state->setDbValue($rs->fields('advertising_state'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// advertising_id

		$this->advertising_id->CellCssStyle = ""; $this->advertising_id->CellCssClass = "";
		$this->advertising_id->CellAttrs = array(); $this->advertising_id->ViewAttrs = array(); $this->advertising_id->EditAttrs = array();

		// advertising_desc
		$this->advertising_desc->CellCssStyle = ""; $this->advertising_desc->CellCssClass = "";
		$this->advertising_desc->CellAttrs = array(); $this->advertising_desc->ViewAttrs = array(); $this->advertising_desc->EditAttrs = array();

		// advertising_type
		$this->advertising_type->CellCssStyle = ""; $this->advertising_type->CellCssClass = "";
		$this->advertising_type->CellAttrs = array(); $this->advertising_type->ViewAttrs = array(); $this->advertising_type->EditAttrs = array();

		// advertising_pos
		$this->advertising_pos->CellCssStyle = ""; $this->advertising_pos->CellCssClass = "";
		$this->advertising_pos->CellAttrs = array(); $this->advertising_pos->ViewAttrs = array(); $this->advertising_pos->EditAttrs = array();

		// advertising_link
		$this->advertising_link->CellCssStyle = ""; $this->advertising_link->CellCssClass = "";
		$this->advertising_link->CellAttrs = array(); $this->advertising_link->ViewAttrs = array(); $this->advertising_link->EditAttrs = array();

		// advertising_url
		$this->advertising_url->CellCssStyle = ""; $this->advertising_url->CellCssClass = "";
		$this->advertising_url->CellAttrs = array(); $this->advertising_url->ViewAttrs = array(); $this->advertising_url->EditAttrs = array();

		// advertising_order
		$this->advertising_order->CellCssStyle = ""; $this->advertising_order->CellCssClass = "";
		$this->advertising_order->CellAttrs = array(); $this->advertising_order->ViewAttrs = array(); $this->advertising_order->EditAttrs = array();

		// create_time
		$this->create_time->CellCssStyle = ""; $this->create_time->CellCssClass = "";
		$this->create_time->CellAttrs = array(); $this->create_time->ViewAttrs = array(); $this->create_time->EditAttrs = array();

		// edit_time
		$this->edit_time->CellCssStyle = ""; $this->edit_time->CellCssClass = "";
		$this->edit_time->CellAttrs = array(); $this->edit_time->ViewAttrs = array(); $this->edit_time->EditAttrs = array();

		// advertising_state
		$this->advertising_state->CellCssStyle = ""; $this->advertising_state->CellCssClass = "";
		$this->advertising_state->CellAttrs = array(); $this->advertising_state->ViewAttrs = array(); $this->advertising_state->EditAttrs = array();

		// advertising_id
		$this->advertising_id->ViewValue = $this->advertising_id->CurrentValue;
		$this->advertising_id->CssStyle = "";
		$this->advertising_id->CssClass = "";
		$this->advertising_id->ViewCustomAttributes = "";

		// advertising_desc
		$this->advertising_desc->ViewValue = $this->advertising_desc->CurrentValue;
		$this->advertising_desc->CssStyle = "";
		$this->advertising_desc->CssClass = "";
		$this->advertising_desc->ViewCustomAttributes = "";

		// advertising_type
		if (strval($this->advertising_type->CurrentValue) <> "") {
			switch ($this->advertising_type->CurrentValue) {
				case "1":
					$this->advertising_type->ViewValue = "Anh";
					break;
				case "2":
					$this->advertising_type->ViewValue = "flash";
					break;
				case "3":
					$this->advertising_type->ViewValue = "Video";
					break;
				default:
					$this->advertising_type->ViewValue = $this->advertising_type->CurrentValue;
			}
		} else {
			$this->advertising_type->ViewValue = NULL;
		}
		$this->advertising_type->CssStyle = "";
		$this->advertising_type->CssClass = "";
		$this->advertising_type->ViewCustomAttributes = "";

		// advertising_pos
		if (strval($this->advertising_pos->CurrentValue) <> "") {
			switch ($this->advertising_pos->CurrentValue) {
				case "1":
					$this->advertising_pos->ViewValue = "Sinh vien tuong lai";
					break;
				case "2":
					$this->advertising_pos->ViewValue = "Cuu sinh vien";
					break;
				default:
					$this->advertising_pos->ViewValue = $this->advertising_pos->CurrentValue;
			}
		} else {
			$this->advertising_pos->ViewValue = NULL;
		}
		$this->advertising_pos->CssStyle = "";
		$this->advertising_pos->CssClass = "";
		$this->advertising_pos->ViewCustomAttributes = "";

		// advertising_link
		$this->advertising_link->ViewValue = $this->advertising_link->CurrentValue;
		$this->advertising_link->CssStyle = "";
		$this->advertising_link->CssClass = "";
		$this->advertising_link->ViewCustomAttributes = "";

		// advertising_url
		if (!ew_Empty($this->advertising_url->Upload->DbValue)) {
			$this->advertising_url->ViewValue = $this->advertising_url->Upload->DbValue;
		} else {
			$this->advertising_url->ViewValue = "";
		}
		$this->advertising_url->CssStyle = "";
		$this->advertising_url->CssClass = "";
		$this->advertising_url->ViewCustomAttributes = "";

		// advertising_order
		$this->advertising_order->ViewValue = $this->advertising_order->CurrentValue;
		$this->advertising_order->CssStyle = "";
		$this->advertising_order->CssClass = "";
		$this->advertising_order->ViewCustomAttributes = "";

		// create_time
		$this->create_time->ViewValue = $this->create_time->CurrentValue;
		$this->create_time->ViewValue = ew_FormatDateTime($this->create_time->ViewValue, 7);
		$this->create_time->CssStyle = "";
		$this->create_time->CssClass = "";
		$this->create_time->ViewCustomAttributes = "";

		// edit_time
		$this->edit_time->ViewValue = $this->edit_time->CurrentValue;
		$this->edit_time->ViewValue = ew_FormatDateTime($this->edit_time->ViewValue, 7);
		$this->edit_time->CssStyle = "";
		$this->edit_time->CssClass = "";
		$this->edit_time->ViewCustomAttributes = "";

		// advertising_state
		if (strval($this->advertising_state->CurrentValue) <> "") {
			switch ($this->advertising_state->CurrentValue) {
				case "0":
					$this->advertising_state->ViewValue = "Khong kich hoat";
					break;
				case "1":
					$this->advertising_state->ViewValue = "Kich hoat";
					break;
				default:
					$this->advertising_state->ViewValue = $this->advertising_state->CurrentValue;
			}
		} else {
			$this->advertising_state->ViewValue = NULL;
		}
		$this->advertising_state->CssStyle = "";
		$this->advertising_state->CssClass = "";
		$this->advertising_state->ViewCustomAttributes = "";

		// advertising_id
		$this->advertising_id->HrefValue = "";
		$this->advertising_id->TooltipValue = "";

		// advertising_desc
		$this->advertising_desc->HrefValue = "";
		$this->advertising_desc->TooltipValue = "";

		// advertising_type
		$this->advertising_type->HrefValue = "";
		$this->advertising_type->TooltipValue = "";

		// advertising_pos
		$this->advertising_pos->HrefValue = "";
		$this->advertising_pos->TooltipValue = "";

		// advertising_link
		$this->advertising_link->HrefValue = "";
		$this->advertising_link->TooltipValue = "";

		// advertising_url
		if (!ew_Empty($this->advertising_url->Upload->DbValue)) {
			$this->advertising_url->HrefValue = ew_UploadPathEx(FALSE, $this->advertising_url->UploadPath) . ((!empty($this->advertising_url->ViewValue)) ? $this->advertising_url->ViewValue : $this->advertising_url->CurrentValue);
			if ($this->Export <> "") $advertising->advertising_url->HrefValue = ew_ConvertFullUrl($this->advertising_url->HrefValue);
		} else {
			$this->advertising_url->HrefValue = "";
		}
		$this->advertising_url->TooltipValue = "";

		// advertising_order
		$this->advertising_order->HrefValue = "";
		$this->advertising_order->TooltipValue = "";

		// create_time
		$this->create_time->HrefValue = "";
		$this->create_time->TooltipValue = "";

		// edit_time
		$this->edit_time->HrefValue = "";
		$this->edit_time->TooltipValue = "";

		// advertising_state
		$this->advertising_state->HrefValue = "";
		$this->advertising_state->TooltipValue = "";

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
