<?php

// Global variable for table object
$NhatKyGD = NULL;

//
// Table class for NhatKyGD
//
class cNhatKyGD {
	var $TableVar = 'NhatKyGD';
	var $TableName = 'NhatKyGD';
	var $TableType = 'TABLE';
	var $NhatKyGDID;
	var $NgayThangNhatKy;
	var $WeekOfYear;
	var $LopID;
	var $NhatKyGDBS;
	var $NhatKyGDBC;
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
	function cNhatKyGD() {
		global $Language;

		// NhatKyGDID
		$this->NhatKyGDID = new cField('NhatKyGD', 'NhatKyGD', 'x_NhatKyGDID', 'NhatKyGDID', '[NhatKyGDID]', 3, -1, FALSE, '[NhatKyGDID]', FALSE);
		$this->NhatKyGDID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['NhatKyGDID'] =& $this->NhatKyGDID;

		// NgayThangNhatKy
		$this->NgayThangNhatKy = new cField('NhatKyGD', 'NhatKyGD', 'x_NgayThangNhatKy', 'NgayThangNhatKy', '[NgayThangNhatKy]', 135, 7, FALSE, '[NgayThangNhatKy]', FALSE);
		$this->NgayThangNhatKy->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['NgayThangNhatKy'] =& $this->NgayThangNhatKy;

		// WeekOfYear
		$this->WeekOfYear = new cField('NhatKyGD', 'NhatKyGD', 'x_WeekOfYear', 'WeekOfYear', '[WeekOfYear]', 3, -1, FALSE, '[WeekOfYear]', FALSE);
		$this->WeekOfYear->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['WeekOfYear'] =& $this->WeekOfYear;

		// LopID
		$this->LopID = new cField('NhatKyGD', 'NhatKyGD', 'x_LopID', 'LopID', '[LopID]', 3, -1, FALSE, '[LopID]', FALSE);
		$this->LopID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['LopID'] =& $this->LopID;

		// NhatKyGDBS
		$this->NhatKyGDBS = new cField('NhatKyGD', 'NhatKyGD', 'x_NhatKyGDBS', 'NhatKyGDBS', '[NhatKyGDBS]', 203, -1, FALSE, '[NhatKyGDBS]', FALSE);
		$this->NhatKyGDBS->TruncateMemoRemoveHtml = TRUE;
		$this->fields['NhatKyGDBS'] =& $this->NhatKyGDBS;

		// NhatKyGDBC
		$this->NhatKyGDBC = new cField('NhatKyGD', 'NhatKyGD', 'x_NhatKyGDBC', 'NhatKyGDBC', '[NhatKyGDBC]', 203, -1, FALSE, '[NhatKyGDBC]', FALSE);
		$this->NhatKyGDBC->TruncateMemoRemoveHtml = TRUE;
		$this->fields['NhatKyGDBC'] =& $this->NhatKyGDBC;
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
		return "NhatKyGD_Highlight";
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
		return "[dbo].[NhatKyGD]";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
               $sWhere='';
              if (isset($_SESSION['LopID'])) $sWhere = "LopID = ".$_SESSION['LopID']; 
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
				return ;
			case "edit":
			case "update":
				return ;
			case "delete":
				return ;
			case "view":
				return ;
			case "search":
				return ;
			default:
				return ;
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
			if (in_array($this->fields[$name]->FldType, array(130, 202, 203)) && !is_null($value))
				$values .= 'N';
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO [dbo].[NhatKyGD] ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE [dbo].[NhatKyGD] SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=";
			if (in_array($this->fields[$name]->FldType, array(130, 202, 203)) && !is_null($value))
				$SQL .= 'N';
			$SQL .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM [dbo].[NhatKyGD] WHERE ";
		$SQL .= ew_QuotedName('NhatKyGDID') . '=' . ew_QuotedValue($rs['NhatKyGDID'], $this->NhatKyGDID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "[NhatKyGDID] = @NhatKyGDID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->NhatKyGDID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@NhatKyGDID@", ew_AdjustSql($this->NhatKyGDID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "NhatKyGDlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "NhatKyGDlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("NhatKyGDview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "NhatKyGDadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("NhatKyGDedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("NhatKyGDadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("NhatKyGDdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->NhatKyGDID->CurrentValue)) {
			$sUrl .= "NhatKyGDID=" . urlencode($this->NhatKyGDID->CurrentValue);
		} else {
			return "javascript:alert(ewLanguage.Phrase(\"InvalidRecord\"));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(141, 201, 203, 128, 204, 205))) { // Unsortable data type
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=NhatKyGD" : "";
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
		$this->NhatKyGDID->setDbValue($rs->fields('NhatKyGDID'));
		$this->NgayThangNhatKy->setDbValue($rs->fields('NgayThangNhatKy'));
		$this->WeekOfYear->setDbValue($rs->fields('WeekOfYear'));
		$this->LopID->setDbValue($rs->fields('LopID'));
		$this->NhatKyGDBS->setDbValue($rs->fields('NhatKyGDBS'));
		$this->NhatKyGDBC->setDbValue($rs->fields('NhatKyGDBC'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// NhatKyGDID

		$this->NhatKyGDID->CellCssStyle = ""; $this->NhatKyGDID->CellCssClass = "";
		$this->NhatKyGDID->CellAttrs = array(); $this->NhatKyGDID->ViewAttrs = array(); $this->NhatKyGDID->EditAttrs = array();

		// NgayThangNhatKy
		$this->NgayThangNhatKy->CellCssStyle = ""; $this->NgayThangNhatKy->CellCssClass = "";
		$this->NgayThangNhatKy->CellAttrs = array(); $this->NgayThangNhatKy->ViewAttrs = array(); $this->NgayThangNhatKy->EditAttrs = array();

		// WeekOfYear
		$this->WeekOfYear->CellCssStyle = ""; $this->WeekOfYear->CellCssClass = "";
		$this->WeekOfYear->CellAttrs = array(); $this->WeekOfYear->ViewAttrs = array(); $this->WeekOfYear->EditAttrs = array();

		// LopID
		$this->LopID->CellCssStyle = ""; $this->LopID->CellCssClass = "";
		$this->LopID->CellAttrs = array(); $this->LopID->ViewAttrs = array(); $this->LopID->EditAttrs = array();

		// NhatKyGDID
		$this->NhatKyGDID->ViewValue = $this->NhatKyGDID->CurrentValue;
		$this->NhatKyGDID->CssStyle = "";
		$this->NhatKyGDID->CssClass = "";
		$this->NhatKyGDID->ViewCustomAttributes = "";

		// NgayThangNhatKy
		$this->NgayThangNhatKy->ViewValue = $this->NgayThangNhatKy->CurrentValue;
		$this->NgayThangNhatKy->ViewValue = ew_FormatDateTime($this->NgayThangNhatKy->ViewValue, 7);
		$this->NgayThangNhatKy->CssStyle = "";
		$this->NgayThangNhatKy->CssClass = "";
		$this->NgayThangNhatKy->ViewCustomAttributes = "";

		// WeekOfYear
		$this->WeekOfYear->ViewValue = $this->WeekOfYear->CurrentValue;
		$this->WeekOfYear->CssStyle = "";
		$this->WeekOfYear->CssClass = "";
		$this->WeekOfYear->ViewCustomAttributes = "";

		// LopID
		if (strval($this->LopID->CurrentValue) <> "") {
			$sFilterWrk = "[LopID] = " . ew_AdjustSql($this->LopID->CurrentValue) . "";
		$sSqlWrk = "SELECT [MaSoLop] FROM [DMLop]";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->LopID->ViewValue = $rswrk->fields('MaSoLop');
				$rswrk->Close();
			} else {
				$this->LopID->ViewValue = $this->LopID->CurrentValue;
			}
		} else {
			$this->LopID->ViewValue = NULL;
		}
		$this->LopID->CssStyle = "";
		$this->LopID->CssClass = "";
		$this->LopID->ViewCustomAttributes = "";

		// NhatKyGDID
		$this->NhatKyGDID->HrefValue = "";
		$this->NhatKyGDID->TooltipValue = "";

		// NgayThangNhatKy
		$this->NgayThangNhatKy->HrefValue = "";
		$this->NgayThangNhatKy->TooltipValue = "";

		// WeekOfYear
		$this->WeekOfYear->HrefValue = "";
		$this->WeekOfYear->TooltipValue = "";

		// LopID
		$this->LopID->HrefValue = "";
		$this->LopID->TooltipValue = "";

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
                   global $NhatKyGD;
                    $first_day_of_week = date('Y-m-d', strtotime('Last Monday', time()));
                    $new_date = strtotime ( '+1 week' , strtotime ( $first_day_of_week ) ) ;
                    $first_day_of_week = date ( 'j/m/Y' , $new_date );
                    $last_day_of_week = date('Y-m-d', strtotime('Next Sunday', time()));
                    $new_date = strtotime ( '+1 week' , strtotime ( $last_day_of_week ) ) ;
                    $last_day_of_week =  date ( 'j/m/Y' , $new_date );
                    $notify ='';$t='';
                   if(isset($_GET['cmd'])){ $notify = $_GET['cmd']; }
                   if (isset($_GET['t']))  $t = $_GET['t'] ;
                   if (($notify <> 'reset') && ($t <> 'NhatKyGD'))
                    {
                        if (!isset($this->x_NgayThangNhatKy->AdvancedSearch->SearchValue) && !isset($this->y_NgayThangNhatKy->AdvancedSearch->SearchValue2)) {
                        $this->NgayThangNhatKy->AdvancedSearch->SearchValue = $first_day_of_week;
                        $this->NgayThangNhatKy->AdvancedSearch->SearchOperator = 'BETWEEN';
                        $this->NgayThangNhatKy->AdvancedSearch->SearchValue2 = $last_day_of_week;
                        }
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
