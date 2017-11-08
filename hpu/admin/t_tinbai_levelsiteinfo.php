<?php

// Global variable for table object
$t_tinbai_levelsite = NULL;

//
// Table class for t_tinbai_levelsite
//
class ct_tinbai_levelsite {
	var $TableVar = 't_tinbai_levelsite';
	var $TableName = 't_tinbai_levelsite';
	var $TableType = 'TABLE';
	var $PK_TINBAI_ID;
	var $FK_CONGTY_ID;
	var $FK_CHUYENMUC_ID;
	var $FK_DOITUONG_ID;
	var $C_TITLE;
	var $C_SUMARY;
	var $C_CONTENTS;
	var $C_VISITOR;
	var $C_SOURCE;
	var $C_HITS;
	var $C_FILEANH;
	var $C_COMENT;
	var $C_ORDER;
	var $C_ACTIVE;
	var $C_PUBLISH;
	var $C_TIMEPUBLISH;
        var $C_TIME_ACTIVE_MAINSITE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $FK_NGUOIDUNG_ID;
	var $C_STATUS;
	var $FK_EDITOR_ID;
	var $C_NOTE;
        var $C_SENDMAIL;
	var $C_CONTENTS_MAIL;
        var $C_SENDMAIL_LEVELSITE;
	var $C_FK_BROWSE;
	var $C_PIC_MAIN;
	var $C_PIC_SCIENCE;
	var $C_PIC_ROM;
	var $C_PIC_MASS;
	var $C_PIC_LIB;
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
	function ct_tinbai_levelsite() {
		global $Language;

		// PK_TINBAI_ID
		$this->PK_TINBAI_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_PK_TINBAI_ID', 'PK_TINBAI_ID', '`PK_TINBAI_ID`', 3, -1, FALSE, '`PK_TINBAI_ID`', FALSE);
		$this->PK_TINBAI_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_TINBAI_ID'] =& $this->PK_TINBAI_ID;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', '`FK_CONGTY_ID`', 3, -1, FALSE, '`FK_CONGTY_ID`', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// FK_CHUYENMUC_ID
		$this->FK_CHUYENMUC_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_FK_CHUYENMUC_ID', 'FK_CHUYENMUC_ID', '`FK_CHUYENMUC_ID`', 3, -1, FALSE, '`FK_CHUYENMUC_ID`', FALSE);
		$this->FK_CHUYENMUC_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CHUYENMUC_ID'] =& $this->FK_CHUYENMUC_ID;

		// FK_DOITUONG_ID
		$this->FK_DOITUONG_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_FK_DOITUONG_ID', 'FK_DOITUONG_ID', '`FK_DOITUONG_ID`', 3, -1, FALSE, '`FK_DOITUONG_ID`', FALSE);
		$this->FK_DOITUONG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DOITUONG_ID'] =& $this->FK_DOITUONG_ID;

		// C_TITLE
		$this->C_TITLE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_TITLE', 'C_TITLE', '`C_TITLE`', 200, -1, FALSE, '`C_TITLE`', FALSE);
		$this->fields['C_TITLE'] =& $this->C_TITLE;

		// C_SUMARY
		$this->C_SUMARY = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_SUMARY', 'C_SUMARY', '`C_SUMARY`', 201, -1, FALSE, '`C_SUMARY`', FALSE);
		$this->fields['C_SUMARY'] =& $this->C_SUMARY;

		// C_CONTENTS
		$this->C_CONTENTS = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_CONTENTS', 'C_CONTENTS', '`C_CONTENTS`', 201, -1, FALSE, '`C_CONTENTS`', FALSE);
		$this->C_CONTENTS->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENTS'] =& $this->C_CONTENTS;

		// C_VISITOR
		$this->C_VISITOR = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_VISITOR', 'C_VISITOR', '`C_VISITOR`', 3, -1, FALSE, '`C_VISITOR`', FALSE);
		$this->C_VISITOR->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_VISITOR'] =& $this->C_VISITOR;

		// C_SOURCE
		$this->C_SOURCE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_SOURCE', 'C_SOURCE', '`C_SOURCE`', 200, -1, FALSE, '`C_SOURCE`', FALSE);
		$this->fields['C_SOURCE'] =& $this->C_SOURCE;

		// C_HITS
		$this->C_HITS = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_HITS', 'C_HITS', '`C_HITS`', 3, -1, FALSE, '`C_HITS`', FALSE);
		$this->C_HITS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_HITS'] =& $this->C_HITS;

		// C_FILEANH
//		$this->C_FILEANH = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_FILEANH', 'C_FILEANH', '`C_FILEANH`', 200, -1, TRUE, '`C_FILEANH`', FALSE);
//		$this->C_FILEANH->UploadPath = '../upload/C_HIT';
//		$this->fields['C_FILEANH'] =& $this->C_FILEANH;
                
                // C_FILEANH
		$this->C_FILEANH = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_FILEANH', 'C_FILEANH', '`C_FILEANH`', 200, -1, FALSE, '`C_FILEANH`', FALSE);
		$this->fields['C_FILEANH'] =& $this->C_FILEANH;

		// C_COMENT
		$this->C_COMENT = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_COMENT', 'C_COMENT', '`C_COMENT`', 3, -1, FALSE, '`C_COMENT`', FALSE);
		$this->C_COMENT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_COMENT'] =& $this->C_COMENT;

		// C_ORDER
		$this->C_ORDER = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_ORDER', 'C_ORDER', '`C_ORDER`', 135, 7, FALSE, '`C_ORDER`', FALSE);
		$this->C_ORDER->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER'] =& $this->C_ORDER;

		// C_ACTIVE
		$this->C_ACTIVE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_ACTIVE', 'C_ACTIVE', '`C_ACTIVE`', 3, -1, FALSE, '`C_ACTIVE`', FALSE);
		$this->C_ACTIVE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE'] =& $this->C_ACTIVE;

		// C_PUBLISH
		$this->C_PUBLISH = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PUBLISH', 'C_PUBLISH', '`C_PUBLISH`', 3, -1, FALSE, '`C_PUBLISH`', FALSE);
		$this->C_PUBLISH->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_PUBLISH'] =& $this->C_PUBLISH;

		// C_TIMEPUBLISH
		$this->C_TIMEPUBLISH = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_TIMEPUBLISH', 'C_TIMEPUBLISH', '`C_TIMEPUBLISH`', 135, 7, FALSE, '`C_TIMEPUBLISH`', FALSE);
		$this->C_TIMEPUBLISH->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIMEPUBLISH'] =& $this->C_TIMEPUBLISH;
                
                // C_TIME_ACTIVE_MAINSITE
		$this->C_TIME_ACTIVE_MAINSITE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_TIME_ACTIVE_MAINSITE', 'C_TIME_ACTIVE_MAINSITE', '`C_TIME_ACTIVE_MAINSITE`', 135, 7, FALSE, '`C_TIMEPUBLISH`', FALSE);
		$this->C_TIME_ACTIVE_MAINSITE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVE_MAINSITE'] =& $this->C_TIME_ACTIVE_MAINSITE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_USER_ADD', 'C_USER_ADD', '`C_USER_ADD`', 3, -1, FALSE, '`C_USER_ADD`', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_ADD_TIME', 'C_ADD_TIME', '`C_ADD_TIME`', 135, 7, FALSE, '`C_ADD_TIME`', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_USER_EDIT', 'C_USER_EDIT', '`C_USER_EDIT`', 3, -1, FALSE, '`C_USER_EDIT`', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_EDIT_TIME', 'C_EDIT_TIME', '`C_EDIT_TIME`', 135, 7, FALSE, '`C_EDIT_TIME`', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_FK_NGUOIDUNG_ID', 'FK_NGUOIDUNG_ID', '`FK_NGUOIDUNG_ID`', 3, -1, FALSE, '`FK_NGUOIDUNG_ID`', FALSE);
		$this->FK_NGUOIDUNG_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_NGUOIDUNG_ID'] =& $this->FK_NGUOIDUNG_ID;

		// C_STATUS
		$this->C_STATUS = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_STATUS', 'C_STATUS', '`C_STATUS`', 3, -1, FALSE, '`C_STATUS`', FALSE);
		$this->C_STATUS->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_STATUS'] =& $this->C_STATUS;

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_FK_EDITOR_ID', 'FK_EDITOR_ID', '`FK_EDITOR_ID`', 3, -1, FALSE, '`FK_EDITOR_ID`', FALSE);
		$this->FK_EDITOR_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_EDITOR_ID'] =& $this->FK_EDITOR_ID;

		// C_NOTE
		$this->C_NOTE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_NOTE', 'C_NOTE', '`C_NOTE`', 201, -1, FALSE, '`C_NOTE`', FALSE);
		$this->fields['C_NOTE'] =& $this->C_NOTE;
                
                // C_SENDMAIL
		$this->C_SENDMAIL = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_SENDMAIL', 'C_SENDMAIL', '`C_SENDMAIL`', 3, -1, FALSE, '`C_SENDMAIL`', FALSE);
		$this->C_SENDMAIL->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_SENDMAIL'] =& $this->C_SENDMAIL;

		// C_CONTENTS_MAIL
		$this->C_CONTENTS_MAIL = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_CONTENTS_MAIL', 'C_CONTENTS_MAIL', '`C_CONTENTS_MAIL`', 201, -1, FALSE, '`C_CONTENTS_MAIL`', FALSE);
		$this->fields['C_CONTENTS_MAIL'] =& $this->C_CONTENTS_MAIL;
                
                // C_SENDMAIL_LEVELSITE
		$this->C_SENDMAIL_LEVELSITE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_SENDMAIL_LEVELSITE', 'C_SENDMAIL_LEVELSITE', '`C_SENDMAIL_LEVELSITE`', 3, -1, FALSE, '`C_SENDMAIL_LEVELSITE`', FALSE);
		$this->C_SENDMAIL_LEVELSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_SENDMAIL_LEVELSITE'] =& $this->C_SENDMAIL_LEVELSITE;

		// C_FK_BROWSE
		$this->C_FK_BROWSE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_FK_BROWSE', 'C_FK_BROWSE', '`C_FK_BROWSE`', 200, -1, FALSE, '`C_FK_BROWSE`', FALSE);
		$this->fields['C_FK_BROWSE'] =& $this->C_FK_BROWSE;

		// C_PIC_MAIN
		$this->C_PIC_MAIN = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PIC_MAIN', 'C_PIC_MAIN', '`C_PIC_MAIN`', 200, -1, FALSE, '`C_PIC_MAIN`', FALSE);
		$this->fields['C_PIC_MAIN'] =& $this->C_PIC_MAIN;

		// C_PIC_SCIENCE
		$this->C_PIC_SCIENCE = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PIC_SCIENCE', 'C_PIC_SCIENCE', '`C_PIC_SCIENCE`', 200, -1, FALSE, '`C_PIC_SCIENCE`', FALSE);
		$this->fields['C_PIC_SCIENCE'] =& $this->C_PIC_SCIENCE;

		// C_PIC_ROM
		$this->C_PIC_ROM = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PIC_ROM', 'C_PIC_ROM', '`C_PIC_ROM`', 200, -1, FALSE, '`C_PIC_ROM`', FALSE);
		$this->fields['C_PIC_ROM'] =& $this->C_PIC_ROM;

		// C_PIC_MASS
		$this->C_PIC_MASS = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PIC_MASS', 'C_PIC_MASS', '`C_PIC_MASS`', 200, -1, FALSE, '`C_PIC_MASS`', FALSE);
		$this->fields['C_PIC_MASS'] =& $this->C_PIC_MASS;

		// C_PIC_LIB
		$this->C_PIC_LIB = new cField('t_tinbai_levelsite', 't_tinbai_levelsite', 'x_C_PIC_LIB', 'C_PIC_LIB', '`C_PIC_LIB`', 200, -1, FALSE, '`C_PIC_LIB`', FALSE);
		$this->fields['C_PIC_LIB'] =& $this->C_PIC_LIB;
                
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
		return "t_tinbai_levelsite_Highlight";
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
		return "`t_tinbai_levelsite`";
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
                  if (($Security->CurrentUserLevelID() == 12) || ($Security->CurrentUserLevelID() == 10)) $sWhere = "t_tinbai_levelsite.FK_CONGTY_ID = ".$Security->CurrentUserOption()." AND t_tinbai_levelsite.C_USER_ADD = ".$Security->CurrentUserID();
                  else $sWhere = "t_tinbai_levelsite.FK_CONGTY_ID = ".$Security->CurrentUserOption();
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
		return "INSERT INTO `t_tinbai_levelsite` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `t_tinbai_levelsite` SET ";
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
		$SQL = "DELETE FROM `t_tinbai_levelsite` WHERE ";
		$SQL .= ew_QuotedName('PK_TINBAI_ID') . '=' . ew_QuotedValue($rs['PK_TINBAI_ID'], $this->PK_TINBAI_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`PK_TINBAI_ID` = @PK_TINBAI_ID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->PK_TINBAI_ID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@PK_TINBAI_ID@", ew_AdjustSql($this->PK_TINBAI_ID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "t_tinbai_levelsitelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_tinbai_levelsitelist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_tinbai_levelsiteview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_tinbai_levelsiteadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_tinbai_levelsiteedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_tinbai_levelsiteadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_tinbai_levelsitedelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->PK_TINBAI_ID->CurrentValue)) {
			$sUrl .= "PK_TINBAI_ID=" . urlencode($this->PK_TINBAI_ID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_tinbai_levelsite" : "";
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
		$this->PK_TINBAI_ID->setDbValue($rs->fields('PK_TINBAI_ID'));
		$this->FK_CONGTY_ID->setDbValue($rs->fields('FK_CONGTY_ID'));
		$this->FK_CHUYENMUC_ID->setDbValue($rs->fields('FK_CHUYENMUC_ID'));
		$this->FK_DOITUONG_ID->setDbValue($rs->fields('FK_DOITUONG_ID'));
		$this->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$this->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$this->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$this->C_VISITOR->setDbValue($rs->fields('C_VISITOR'));
		$this->C_SOURCE->setDbValue($rs->fields('C_SOURCE'));
		$this->C_HITS->setDbValue($rs->fields('C_HITS'));
		$this->C_FILEANH->Upload->DbValue = $rs->fields('C_FILEANH');
		$this->C_COMENT->setDbValue($rs->fields('C_COMENT'));
		$this->C_ORDER->setDbValue($rs->fields('C_ORDER'));
		$this->C_ACTIVE->setDbValue($rs->fields('C_ACTIVE'));
		$this->C_PUBLISH->setDbValue($rs->fields('C_PUBLISH'));
		$this->C_TIMEPUBLISH->setDbValue($rs->fields('C_TIMEPUBLISH'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->FK_NGUOIDUNG_ID->setDbValue($rs->fields('FK_NGUOIDUNG_ID'));
		$this->C_STATUS->setDbValue($rs->fields('C_STATUS'));
		$this->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
		$this->C_NOTE->setDbValue($rs->fields('C_NOTE'));
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

		// FK_CHUYENMUC_ID
		$this->FK_CHUYENMUC_ID->CellCssStyle = ""; $this->FK_CHUYENMUC_ID->CellCssClass = "";
		$this->FK_CHUYENMUC_ID->CellAttrs = array(); $this->FK_CHUYENMUC_ID->ViewAttrs = array(); $this->FK_CHUYENMUC_ID->EditAttrs = array();

		// FK_DOITUONG_ID
		$this->FK_DOITUONG_ID->CellCssStyle = ""; $this->FK_DOITUONG_ID->CellCssClass = "";
		$this->FK_DOITUONG_ID->CellAttrs = array(); $this->FK_DOITUONG_ID->ViewAttrs = array(); $this->FK_DOITUONG_ID->EditAttrs = array();

		// C_TITLE
		$this->C_TITLE->CellCssStyle = ""; $this->C_TITLE->CellCssClass = "";
		$this->C_TITLE->CellAttrs = array(); $this->C_TITLE->ViewAttrs = array(); $this->C_TITLE->EditAttrs = array();

		// C_VISITOR
		$this->C_VISITOR->CellCssStyle = ""; $this->C_VISITOR->CellCssClass = "";
		$this->C_VISITOR->CellAttrs = array(); $this->C_VISITOR->ViewAttrs = array(); $this->C_VISITOR->EditAttrs = array();

		// C_SOURCE
		$this->C_SOURCE->CellCssStyle = ""; $this->C_SOURCE->CellCssClass = "";
		$this->C_SOURCE->CellAttrs = array(); $this->C_SOURCE->ViewAttrs = array(); $this->C_SOURCE->EditAttrs = array();

		// C_HITS
		$this->C_HITS->CellCssStyle = ""; $this->C_HITS->CellCssClass = "";
		$this->C_HITS->CellAttrs = array(); $this->C_HITS->ViewAttrs = array(); $this->C_HITS->EditAttrs = array();

		// C_COMENT
		$this->C_COMENT->CellCssStyle = ""; $this->C_COMENT->CellCssClass = "";
		$this->C_COMENT->CellAttrs = array(); $this->C_COMENT->ViewAttrs = array(); $this->C_COMENT->EditAttrs = array();

		// C_ORDER
		$this->C_ORDER->CellCssStyle = ""; $this->C_ORDER->CellCssClass = "";
		$this->C_ORDER->CellAttrs = array(); $this->C_ORDER->ViewAttrs = array(); $this->C_ORDER->EditAttrs = array();

		// C_ACTIVE
		$this->C_ACTIVE->CellCssStyle = ""; $this->C_ACTIVE->CellCssClass = "";
		$this->C_ACTIVE->CellAttrs = array(); $this->C_ACTIVE->ViewAttrs = array(); $this->C_ACTIVE->EditAttrs = array();

		// C_PUBLISH
		$this->C_PUBLISH->CellCssStyle = ""; $this->C_PUBLISH->CellCssClass = "";
		$this->C_PUBLISH->CellAttrs = array(); $this->C_PUBLISH->ViewAttrs = array(); $this->C_PUBLISH->EditAttrs = array();

		// C_TIMEPUBLISH
		$this->C_TIMEPUBLISH->CellCssStyle = ""; $this->C_TIMEPUBLISH->CellCssClass = "";
		$this->C_TIMEPUBLISH->CellAttrs = array(); $this->C_TIMEPUBLISH->ViewAttrs = array(); $this->C_TIMEPUBLISH->EditAttrs = array();

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID->CellCssStyle = ""; $this->FK_NGUOIDUNG_ID->CellCssClass = "";
		$this->FK_NGUOIDUNG_ID->CellAttrs = array(); $this->FK_NGUOIDUNG_ID->ViewAttrs = array(); $this->FK_NGUOIDUNG_ID->EditAttrs = array();

		// C_STATUS
		$this->C_STATUS->CellCssStyle = ""; $this->C_STATUS->CellCssClass = "";
		$this->C_STATUS->CellAttrs = array(); $this->C_STATUS->ViewAttrs = array(); $this->C_STATUS->EditAttrs = array();

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->CellCssStyle = ""; $this->FK_EDITOR_ID->CellCssClass = "";
		$this->FK_EDITOR_ID->CellAttrs = array(); $this->FK_EDITOR_ID->ViewAttrs = array(); $this->FK_EDITOR_ID->EditAttrs = array();

		// C_NOTE
		$this->C_NOTE->CellCssStyle = ""; $this->C_NOTE->CellCssClass = "";
		$this->C_NOTE->CellAttrs = array(); $this->C_NOTE->ViewAttrs = array(); $this->C_NOTE->EditAttrs = array();

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

		// FK_CHUYENMUC_ID
		if (strval($this->FK_CHUYENMUC_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_CHUYENMUC` = " . ew_AdjustSql($this->FK_CHUYENMUC_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_chuyenmuc_levelsite`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_CHUYENMUC_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_CHUYENMUC_ID->ViewValue = $this->FK_CHUYENMUC_ID->CurrentValue;
			}
		} else {
			$this->FK_CHUYENMUC_ID->ViewValue = NULL;
		}
		$this->FK_CHUYENMUC_ID->CssStyle = "";
		$this->FK_CHUYENMUC_ID->CssClass = "";
		$this->FK_CHUYENMUC_ID->ViewCustomAttributes = "";

		// FK_DOITUONG_ID
		if (strval($this->FK_DOITUONG_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_DOITUONG` = " . ew_AdjustSql($this->FK_DOITUONG_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_levelsite`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DOITUONG_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DOITUONG_ID->ViewValue = $this->FK_DOITUONG_ID->CurrentValue;
			}
		} else {
			$this->FK_DOITUONG_ID->ViewValue = NULL;
		}
		$this->FK_DOITUONG_ID->CssStyle = "";
		$this->FK_DOITUONG_ID->CssClass = "";
		$this->FK_DOITUONG_ID->ViewCustomAttributes = "";

		// C_TITLE
		$this->C_TITLE->ViewValue = $this->C_TITLE->CurrentValue;
		$this->C_TITLE->CssStyle = "";
		$this->C_TITLE->CssClass = "";
		$this->C_TITLE->ViewCustomAttributes = "";

		// C_VISITOR
		$this->C_VISITOR->ViewValue = $this->C_VISITOR->CurrentValue;
		$this->C_VISITOR->CssStyle = "";
		$this->C_VISITOR->CssClass = "";
		$this->C_VISITOR->ViewCustomAttributes = "";

		// C_SOURCE
		$this->C_SOURCE->ViewValue = $this->C_SOURCE->CurrentValue;
		$this->C_SOURCE->CssStyle = "";
		$this->C_SOURCE->CssClass = "";
		$this->C_SOURCE->ViewCustomAttributes = "";

		// C_HITS
		if (strval($this->C_HITS->CurrentValue) <> "") {
			switch ($this->C_HITS->CurrentValue) {
				case "0":
					$this->C_HITS->ViewValue = "Khong la tin noi bat";
					break;
				case "1":
					$this->C_HITS->ViewValue = "Tin noi bat";
					break;
				default:
					$this->C_HITS->ViewValue = $this->C_HITS->CurrentValue;
			}
		} else {
			$this->C_HITS->ViewValue = NULL;
		}
		$this->C_HITS->CssStyle = "";
		$this->C_HITS->CssClass = "";
		$this->C_HITS->ViewCustomAttributes = "";

		// C_COMENT
		if (strval($this->C_COMENT->CurrentValue) <> "") {
			switch ($this->C_COMENT->CurrentValue) {
				case "0":
					$this->C_COMENT->ViewValue = "Khong cho phep coment facebook";
					break;
				case "1":
					$this->C_COMENT->ViewValue = "cho phep coment facebook";
					break;
				default:
					$this->C_COMENT->ViewValue = $this->C_COMENT->CurrentValue;
			}
		} else {
			$this->C_COMENT->ViewValue = NULL;
		}
		$this->C_COMENT->CssStyle = "";
		$this->C_COMENT->CssClass = "";
		$this->C_COMENT->ViewCustomAttributes = "";

		// C_ORDER
		$this->C_ORDER->ViewValue = $this->C_ORDER->CurrentValue;
		$this->C_ORDER->ViewValue = ew_FormatDateTime($this->C_ORDER->ViewValue, 7);
		$this->C_ORDER->CssStyle = "";
		$this->C_ORDER->CssClass = "";
		$this->C_ORDER->ViewCustomAttributes = "";

		// C_ACTIVE
		if (strval($this->C_ACTIVE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE->CurrentValue) {
				case "0":
					$this->C_ACTIVE->ViewValue = "Khong kich hoat len Level Site";
					break;
				case "1":
					$this->C_ACTIVE->ViewValue = "Kich hoat len Level sites ";
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

		// C_PUBLISH
		if (strval($this->C_PUBLISH->CurrentValue) <> "") {
			switch ($this->C_PUBLISH->CurrentValue) {
				case "0":
					$this->C_PUBLISH->ViewValue = "Khong kich hoat MainSite";
					break;
				case "1":
					$this->C_PUBLISH->ViewValue = "Kich hoat MainSite";
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

		// C_TIMEPUBLISH
		$this->C_TIMEPUBLISH->ViewValue = $this->C_TIMEPUBLISH->CurrentValue;
		$this->C_TIMEPUBLISH->ViewValue = ew_FormatDateTime($this->C_TIMEPUBLISH->ViewValue, 7);
		$this->C_TIMEPUBLISH->CssStyle = "";
		$this->C_TIMEPUBLISH->CssClass = "";
		$this->C_TIMEPUBLISH->ViewCustomAttributes = "";

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID->ViewValue = $this->FK_NGUOIDUNG_ID->CurrentValue;
		if (strval($this->FK_NGUOIDUNG_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($this->FK_NGUOIDUNG_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_NGUOIDUNG_ID->ViewValue = $rswrk->fields('C_HOTEN');
				$rswrk->Close();
			} else {
				$this->FK_NGUOIDUNG_ID->ViewValue = $this->FK_NGUOIDUNG_ID->CurrentValue;
			}
		} else {
			$this->FK_NGUOIDUNG_ID->ViewValue = NULL;
		}
		$this->FK_NGUOIDUNG_ID->CssStyle = "";
		$this->FK_NGUOIDUNG_ID->CssClass = "";
		$this->FK_NGUOIDUNG_ID->ViewCustomAttributes = "";

		// C_STATUS
		if (strval($this->C_STATUS->CurrentValue) <> "") {
			switch ($this->C_STATUS->CurrentValue) {
				case "0":
					$this->C_STATUS->ViewValue = "Chua duy?t main site";
					break;
				case "1":
					$this->C_STATUS->ViewValue = "Da duyet main site";
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

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->ViewValue = $this->FK_EDITOR_ID->CurrentValue;
		$this->FK_EDITOR_ID->CssStyle = "";
		$this->FK_EDITOR_ID->CssClass = "";
		$this->FK_EDITOR_ID->ViewCustomAttributes = "";

		// C_NOTE
		$this->C_NOTE->ViewValue = $this->C_NOTE->CurrentValue;
		$this->C_NOTE->CssStyle = "";
		$this->C_NOTE->CssClass = "";
		$this->C_NOTE->ViewCustomAttributes = "";

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->HrefValue = "";
		$this->FK_CONGTY_ID->TooltipValue = "";

		// FK_CHUYENMUC_ID
		$this->FK_CHUYENMUC_ID->HrefValue = "";
		$this->FK_CHUYENMUC_ID->TooltipValue = "";

		// FK_DOITUONG_ID
		$this->FK_DOITUONG_ID->HrefValue = "";
		$this->FK_DOITUONG_ID->TooltipValue = "";

		// C_TITLE
		$this->C_TITLE->HrefValue = "";
		$this->C_TITLE->TooltipValue = "";

		// C_VISITOR
		$this->C_VISITOR->HrefValue = "";
		$this->C_VISITOR->TooltipValue = "";

		// C_SOURCE
		$this->C_SOURCE->HrefValue = "";
		$this->C_SOURCE->TooltipValue = "";

		// C_HITS
		$this->C_HITS->HrefValue = "";
		$this->C_HITS->TooltipValue = "";

		// C_COMENT
		$this->C_COMENT->HrefValue = "";
		$this->C_COMENT->TooltipValue = "";

		// C_ORDER
		$this->C_ORDER->HrefValue = "";
		$this->C_ORDER->TooltipValue = "";

		// C_ACTIVE
		$this->C_ACTIVE->HrefValue = "";
		$this->C_ACTIVE->TooltipValue = "";

		// C_PUBLISH
		$this->C_PUBLISH->HrefValue = "";
		$this->C_PUBLISH->TooltipValue = "";

		// C_TIMEPUBLISH
		$this->C_TIMEPUBLISH->HrefValue = "";
		$this->C_TIMEPUBLISH->TooltipValue = "";

		// FK_NGUOIDUNG_ID
		$this->FK_NGUOIDUNG_ID->HrefValue = "";
		$this->FK_NGUOIDUNG_ID->TooltipValue = "";

		// C_STATUS
		$this->C_STATUS->HrefValue = "";
		$this->C_STATUS->TooltipValue = "";

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->HrefValue = "";
		$this->FK_EDITOR_ID->TooltipValue = "";

		// C_NOTE
		$this->C_NOTE->HrefValue = "";
		$this->C_NOTE->TooltipValue = "";

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
